CREATE TABLE reservation (
    number INT AUTO_INCREMENT PRIMARY KEY,
    reservation_number VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    date DATE NOT NULL,
    time TIME NOT NULL,
    phone_number VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
