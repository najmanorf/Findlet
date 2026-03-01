-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jul 2025 pada 07.19
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `findlet`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$zzx14bZlJQjckMn09RDHI.jCeOZS5.p0/tVcpKEBabh8KU8MZ6okm');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `created_at`) VALUES
(12, 'Najma Noorfitri Syarifah', 'najmanoorfitri14@gmail.com', '+6285524922995', '$2y$10$pQd5EuFduucJoU7oYLE64OdwG6vI1wb9stzGVllvbXnY0w.tRQX/i', '0000-00-00 00:00:00'),
(13, 'Elis Siti Rokayah', 'elis.s104@gmail.com', '+6281394460352', '$2y$10$c4VYR4SkN34hzSJh3q5lLeWJz2UHa4x9THg3RPDV3SoIXn9Ujd7KS', '0000-00-00 00:00:00'),
(14, 'Kamaludin', 'kamaludin@gmail.com', '+6281234567890', '$2y$10$qsDx8H8oPvOEr3wl1cp2keAjdUHZGDBFF6G5v7/uJRd3AZJQgi9Z.', '0000-00-00 00:00:00'),
(15, 'Harry Edward Styles', 'harry@gmail.com', '+6285524922994', '$2y$10$5IBDXUyqIpHFqGoKzJ1krO.xS0M82/6IlsXPe3QWkQQLDACks.II6', '0000-00-00 00:00:00'),
(16, 'Maulana ', 'maulana@gmail.com', '+6285524922993', '$2y$10$oxWGhB56Nj7x2RgtaozA4uLzLsVQOPC5du4EPtoTRhfwrqtnLEW6u', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wallet_claims`
--

CREATE TABLE `wallet_claims` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_number` varchar(50) DEFAULT NULL,
  `id_type` enum('KTP','SIM') DEFAULT NULL,
  `name_on_id` varchar(100) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `birth_place` varchar(100) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `address` text DEFAULT NULL,
  `wallet_appearance` varchar(255) DEFAULT NULL,
  `chronology` varchar(255) DEFAULT NULL,
  `status` enum('Pending','Approved','Rejected') DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `wallet_claims`
--

INSERT INTO `wallet_claims` (`id`, `id_user`, `id_number`, `id_type`, `name_on_id`, `gender`, `birth_place`, `birth_date`, `address`, `wallet_appearance`, `chronology`, `status`, `created_at`) VALUES
(9, 13, '1234567812345678', 'KTP', 'Elis Siti Rokayah', 'Female', 'Cimahi', '2003-02-15', 'Cimahi Jawa Barat', 'Dompet biru dongker eiger', 'Saya kehilangan dompet ini di sekitaran Cihanjuang', 'Rejected', '2025-07-12 18:03:42'),
(10, 12, '1234567890', 'SIM', 'Olivia Rodrigo', 'Female', 'California', '2003-02-15', 'Cikutra Bandung', 'dompet pink berbulu merk dior', 'saya hilang di area kampus sangga buana gedung B', 'Approved', '2025-07-12 18:30:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wallet_reports`
--

CREATE TABLE `wallet_reports` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_number` varchar(50) DEFAULT NULL,
  `id_type` enum('KTP','SIM') DEFAULT NULL,
  `name_on_id` varchar(100) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `birth_place` varchar(100) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `address` text DEFAULT NULL,
  `card_image` varchar(255) DEFAULT NULL,
  `wallet_image` varchar(255) DEFAULT NULL,
  `status` enum('Pending','Approved','Rejected') DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `wallet_reports`
--

INSERT INTO `wallet_reports` (`id`, `id_user`, `id_number`, `id_type`, `name_on_id`, `gender`, `birth_place`, `birth_date`, `address`, `card_image`, `wallet_image`, `status`, `created_at`) VALUES
(13, 14, '1234567812345678', 'KTP', 'Elis Siti Rokayah', 'Female', 'Cimahi', '2003-02-15', 'Cimahi', 'idcard.png', 'wallet.png', 'Approved', '2025-07-12 18:04:33'),
(14, 15, '1234567890', 'SIM', 'Olivia Rodrigo', 'Female', 'California', '2003-02-15', 'Cikutra', 'idcard.png', 'wallet.png', 'Approved', '2025-07-12 18:53:19'),
(16, 16, '1234567812345677', 'KTP', 'Rudy Sofian', 'Male', 'Bandung', '2000-07-10', 'Antapani', 'idcard.png', 'wallet.png', 'Pending', '2025-07-13 00:03:58'),
(17, 13, '1111111111111111', 'KTP', 'lala lolo lulu', 'Female', 'lala land', '2025-07-10', 'trans studio', 'idcard.png', 'wallet.png', 'Rejected', '2025-07-13 00:07:18');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `wallet_claims`
--
ALTER TABLE `wallet_claims`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_wallet_claim` (`id_user`);

--
-- Indeks untuk tabel `wallet_reports`
--
ALTER TABLE `wallet_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `wallet_claims`
--
ALTER TABLE `wallet_claims`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `wallet_reports`
--
ALTER TABLE `wallet_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `wallet_claims`
--
ALTER TABLE `wallet_claims`
  ADD CONSTRAINT `fk_user_wallet_claim` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `wallet_reports`
--
ALTER TABLE `wallet_reports`
  ADD CONSTRAINT `wallet_reports_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
