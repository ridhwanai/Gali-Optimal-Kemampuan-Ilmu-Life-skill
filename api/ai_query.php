<?php
require_once __DIR__ . '/../config.php';

if (!isset($_SESSION['user_id']) || !isset($_SESSION['chat_session_id'])) {
    http_response_code(403);
    echo "Sesi tidak valid.";
    exit();
}

// **PENTING: Ganti dengan API Key OpenAI Anda**
$apiKey = 'GANTI_DENGAN_API_KEY_OPENAI_ANDA';
$apiUrl = 'https://api.openai.com/v1/chat/completions';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $session_id = $_SESSION['chat_session_id'];
    $user_prompt = $_POST['prompt'] ?? '';

    if (empty($user_prompt)) {
        http_response_code(400);
        echo "Prompt tidak boleh kosong.";
        exit();
    }
    
    // Simpan pesan pengguna ke database
    $stmt = $conn->prepare("INSERT INTO ai_chat_history (user_id, session_id, role, content) VALUES (?, ?, 'user', ?)");
    $stmt->bind_param("iss", $user_id, $session_id, $user_prompt);
    $stmt->execute();

    // Bangun histori percakapan untuk dikirim ke OpenAI
    $messages = [
        ['role' => 'system', 'content' => 'Anda adalah asisten pemrograman yang ramah bernama GoKill AI. Berikan jawaban dalam format teks sederhana, atau gunakan format markdown untuk blok kode.']
    ];
    
    // Ambil 10 pesan terakhir dari sesi ini untuk konteks
    $history_stmt = $conn->prepare("SELECT role, content FROM (SELECT * FROM ai_chat_history WHERE session_id = ? ORDER BY created_at DESC LIMIT 10) AS sub ORDER BY created_at ASC");
    $history_stmt->bind_param("s", $session_id);
    $history_stmt->execute();
    $result = $history_stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $messages[] = ['role' => $row['role'], 'content' => $row['content']];
    }

    $data = ['model' => 'gpt-3.5-turbo', 'messages' => $messages];

    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json', 'Authorization: Bearer ' . $apiKey]);
    $response = curl_exec($ch);
    curl_close($ch);

    $responseData = json_decode($response, true);
    $ai_response = $responseData['choices'][0]['message']['content'] ?? "Maaf, saya tidak dapat memproses permintaan Anda saat ini.";

    // Simpan respons AI ke database
    $stmt = $conn->prepare("INSERT INTO ai_chat_history (user_id, session_id, role, content) VALUES (?, ?, 'assistant', ?)");
    $stmt->bind_param("iss", $user_id, $session_id, $ai_response);
    $stmt->execute();
    
    echo $ai_response;
}
?>