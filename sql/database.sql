-- Database: mindcare_db

-- Table: users
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table: doctors
CREATE TABLE doctors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    specialization VARCHAR(255) NOT NULL,
    profile_image VARCHAR(255) DEFAULT 'placeholder_doctor.png',
    description TEXT,
    price DECIMAL(10, 2) NOT NULL DEFAULT 150000.00
);

-- Table: doctor_schedules
CREATE TABLE doctor_schedules (
    id INT AUTO_INCREMENT PRIMARY KEY,
    doctor_id INT NOT NULL,
    day_of_week VARCHAR(10) NOT NULL, -- e.g., 'Senin', 'Selasa'
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    FOREIGN KEY (doctor_id) REFERENCES doctors(id) ON DELETE CASCADE
);

-- Table: appointments
CREATE TABLE appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    doctor_id INT NOT NULL,
    appointment_date DATE NOT NULL,
    appointment_time TIME NOT NULL,
    status VARCHAR(50) DEFAULT 'Pending', -- e.g., 'Pending', 'Confirmed', 'Completed', 'Cancelled'
    payment_status VARCHAR(50) DEFAULT 'Pending', -- e.g., 'Pending', 'Paid'
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (doctor_id) REFERENCES doctors(id) ON DELETE CASCADE
);

-- Sample Data for doctors
INSERT INTO doctors (name, specialization, profile_image, description, price) VALUES
('dr. A. A. A. Putu Indah Pratiwi, Sp. A', 'Spesialis Anak', 'doctor1.jpg', 'Dokter spesialis anak dengan pengalaman lebih dari 10 tahun.', 200000.00),
('dr. A. Budi Marjono, Sp. O.G, Ph.D', 'Spesialis Obstetri dan Ginekologi', 'doctor2.jpg', 'Ahli dalam kesehatan wanita dan kehamilan.', 250000.00),
('dr. C. D. E. Fajar, Sp. KJ', 'Psikiater', 'doctor3.jpg', 'Fokus pada kesehatan mental dan terapi kognitif.', 180000.00),
('dr. G. H. I. Lestari, M.Psi., Psikolog', 'Psikolog Klinis', 'doctor4.jpg', 'Membantu mengatasi masalah emosional dan perilaku.', 170000.00);

-- Sample Data for doctor_schedules (example for doctor_id 3 - Psikiater)
INSERT INTO doctor_schedules (doctor_id, day_of_week, start_time, end_time) VALUES
(3, 'Senin', '09:00:00', '12:00:00'),
(3, 'Senin', '13:00:00', '16:00:00'),
(3, 'Rabu', '10:00:00', '13:00:00'),
(3, 'Jumat', '09:00:00', '12:00:00');