<?php
require_once __DIR__ . '/config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
// Buat session ID unik untuk setiap kali halaman dimuat
$_SESSION['chat_session_id'] = 'chat_' . uniqid();
require_once __DIR__ . '/includes/header.php';
?>
<main class="container py-5">
    <div class="chat-container">
        <div class="chat-header">
            <i class="fas fa-robot text-primary"></i> Asisten AI GoKill
        </div>
        <div class="chat-box" id="chat-box">
            <div class="chat-message assistant">Halo! Saya Asisten AI GoKill. Apa yang bisa saya bantu hari ini?</div>
        </div>
        <form class="chat-input-form" id="ai-form">
            <input type="text" class="form-control" id="ai-prompt" placeholder="Ketik pesan Anda di sini..." autocomplete="off">
            <button type="submit" class="btn btn-primary" id="ai-submit-btn"><i class="fas fa-paper-plane"></i></button>
        </form>
    </div>
</main>
<script>
$(document).ready(function() {
    const chatBox = $('#chat-box');
    const form = $('#ai-form');
    const promptInput = $('#ai-prompt');
    const submitBtn = $('#ai-submit-btn');

    form.on('submit', function(e) {
        e.preventDefault();
        const userMessage = promptInput.val().trim();
        if (userMessage === '') return;

        // Tampilkan pesan pengguna
        chatBox.append('<div class="chat-message user">' + userMessage + '</div>');
        promptInput.val('');
        chatBox.scrollTop(chatBox[0].scrollHeight);

        // Tampilkan indikator "mengetik" dari AI
        const typingIndicator = $('<div class="chat-message assistant typing">Asisten AI sedang mengetik...</div>');
        chatBox.append(typingIndicator);
        chatBox.scrollTop(chatBox[0].scrollHeight);
        submitBtn.prop('disabled', true);

        // Kirim ke API
        $.ajax({
            url: 'api/ai_query.php',
            type: 'POST',
            data: { prompt: userMessage },
            success: function(response) {
                // Hapus indikator "mengetik" dan tampilkan respons AI
                typingIndicator.remove();
                chatBox.append('<div class="chat-message assistant">' + response + '</div>');
                chatBox.scrollTop(chatBox[0].scrollHeight);
            },
            error: function() {
                typingIndicator.remove();
                chatBox.append('<div class="chat-message assistant">Maaf, terjadi kesalahan. Saya tidak bisa merespons saat ini.</div>');
                chatBox.scrollTop(chatBox[0].scrollHeight);
            },
            complete: function() {
                submitBtn.prop('disabled', false);
            }
        });
    });
});
</script>
<?php require_once __DIR__ . '/includes/footer.php'; ?> 