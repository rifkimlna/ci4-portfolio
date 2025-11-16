-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 16 Nov 2025 pada 10.11
-- Versi server: 8.0.43-0ubuntu0.24.04.2
-- Versi PHP: 8.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `porto_iki`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `contacts`
--

CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
(7, 'Rifki Maulana', 'customer@test.com', 'hahahah hahahahahahah', 1, '2025-11-10 21:14:34', '2025-11-13 22:53:15'),
(8, 'Rifki Maulana', 'admin@portfolio.com', 'ahahaha ahahaha ahahahah', 1, '2025-11-10 21:17:38', '2025-11-13 22:53:13'),
(47, 'Rifki Maulana', 'rifki@email.com', ' abha aha hab aha ha aha  ha bah aha h', 0, '2025-11-16 02:46:15', '2025-11-16 02:46:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `educations`
--

CREATE TABLE `educations` (
  `id` int NOT NULL,
  `degree` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `field_of_study` varchar(255) DEFAULT NULL,
  `start_year` year NOT NULL,
  `end_year` year DEFAULT NULL,
  `is_current` tinyint(1) DEFAULT '0',
  `description` text,
  `grade` varchar(50) DEFAULT NULL,
  `activities` text,
  `is_active` tinyint(1) DEFAULT '1',
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `educations`
--

INSERT INTO `educations` (`id`, `degree`, `institution`, `field_of_study`, `start_year`, `end_year`, `is_current`, `description`, `grade`, `activities`, `is_active`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Sarjana Teknik Informatika', 'Universitas Contoh', 'Computer Science', '2019', '2023', 0, 'Fokus pada pengembangan perangkat lunak, algoritma, dan sistem basis data. Menyelesaikan proyek penelitian tentang machine learning dan pengembangan web modern.', '3.8/4.0', 'Ketua Himpunan Mahasiswa Teknik Informatika, Asisten Laboratorium Pemrograman', 1, 4, '2025-11-16 09:18:49', '2025-11-16 09:18:49'),
(2, 'Sertifikasi Full-Stack Development hahaha ahaha', 'Online Coding Bootcamp', 'Web Development', '2022', '2022', 0, 'Bootcamp intensif yang mencakup teknologi modern seperti React, Node.js, MongoDB, dan DevOps practices. Menyelesaikan 5 proyek real-world selama program.', 'Lulus dengan Predikat Memuaskan', 'Proyek akhir: E-commerce platform dengan fitur payment gateway', 1, 4, '2025-11-16 09:18:49', '2025-11-16 03:10:30'),
(3, 'Web Development Mastery', 'Online Course Platform', 'Frontend Development', '2021', '2021', 0, 'Kursus komprehensif tentang pengembangan web modern, responsive design, dan best practices. Mempelajari HTML5, CSS3, JavaScript ES6+, dan framework modern.', 'Sertifikat Penyelesaian', 'Membuat 10+ proyek website responsif', 1, 4, '2025-11-16 09:18:49', '2025-11-16 09:18:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `projects`
--

CREATE TABLE `projects` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `technologies` varchar(255) DEFAULT NULL,
  `demo_url` varchar(255) DEFAULT NULL,
  `source_code_url` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `technologies`, `demo_url`, `source_code_url`, `image_url`, `is_active`, `created_by`, `created_at`, `updated_at`) VALUES
(6, 'Portfolio Projects haha', 'My personal portfolio website built with CodeIgniter 4 and modern UI design.', 'Code Igniter', '', 'https://github.com/rifkimlna/ci4-portfolio', 'uploads/projects/1762679014_1a80a2cbc9d69f421ee8.png', 1, NULL, '2025-11-09 01:49:15', '2025-11-13 21:08:22'),
(7, 'Ubuntu Projects', 'Saya adalah seorang web developer yang aktif menggunakan Linux (Ubuntu) sebagai sistem utama untuk pengembangan. Terbiasa bekerja di lingkungan terminal, mengelola server, serta mengoptimalkan workflow menggunakan tool open-source seperti Git, Nginx, Node.js, dan ImageMagick. Fokus pada efisiensi, keamanan, dan performa tinggi dalam setiap proyek pengembangan web.', 'Linux', '', '', 'uploads/projects/1762679498_50437d9e57564dc2a56e.jpg', 1, NULL, '2025-11-09 02:11:38', '2025-11-09 02:11:38'),
(8, 'Mobile', 'Tugas', 'JS', 'http://localhost:8080/admin/projects', 'https://github.com/rifkimlna/ci4-portfolio', 'uploads/projects/1762760831_0bcc5121735e91f77f17.jpg', 1, NULL, '2025-11-10 00:47:11', '2025-11-10 00:47:11'),
(9, 'Gabut', 'hahaha', 'Laravel', '', '', 'uploads/projects/1762966292_ebdd7715df84f62baee8.png', 1, NULL, '2025-11-12 09:51:32', '2025-11-12 09:51:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `site_info`
--

CREATE TABLE `site_info` (
  `id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `bio` text,
  `about_description` text,
  `about_experience` text,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `site_info`
--

INSERT INTO `site_info` (`id`, `name`, `title`, `bio`, `about_description`, `about_experience`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Rifki Maulana', 'Pengembang Web Kreatif & Full-Stack', 'Membangun pengalaman digital yang intuitif, responsif, dan performatif.', 'Saya adalah Rifki Maulana, seorang pengembang web yang bersemangat dalam mengubah ide-ide kompleks menjadi antarmuka yang elegan dan fungsional. Dengan pengalaman lebih dari 5 tahun, saya berspesialisasi dalam ekosistem JavaScript modern.\r\n\r\nPendidikan\r\nSMK – Teknik Informatika\r\n\r\nFokus pada:\r\n\r\nDasar pemrograman\r\n\r\nJaringan komputer\r\n\r\nPembuatan website\r\n\r\nSistem informasi sederhana\r\n\r\nPembelajaran Mandiri\r\n\r\nMendalami:\r\n\r\nJavaScript modern\r\n\r\nReact & Next.js\r\n\r\nNode.js & API\r\n\r\nGit & deployment', 'Fokus utama saya adalah pada pengembangan front-end menggunakan React dan Vue.js, memastikan pengalaman pengguna (UX) yang mulus. Di sisi back-end, saya terampil menggunakan Node.js dan Express, serta mengelola basis data NoSQL seperti MongoDB atau Firestore.', 'rfkimaulana01@gmail.com', '+62 8960415703888', '2025-11-05 23:18:58', '2025-11-16 01:48:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skills`
--

CREATE TABLE `skills` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `skills`
--

INSERT INTO `skills` (`id`, `name`, `category`, `is_active`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Node.js', 'Database', 1, 4, '2025-11-06 01:15:57', '2025-11-14 09:02:33'),
(2, 'Python', 'Backend', 1, 4, '2025-11-06 03:40:53', '2025-11-14 09:02:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `social_links`
--

CREATE TABLE `social_links` (
  `id` int NOT NULL,
  `platform` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon_svg` text,
  `is_active` tinyint(1) DEFAULT '1',
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `social_links`
--

INSERT INTO `social_links` (`id`, `platform`, `url`, `icon_svg`, `is_active`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'GitHub', 'https://github.com/rifkimlna?tab=repositories', NULL, 0, NULL, '2025-11-05 23:18:58', '2025-11-14 08:53:17'),
(2, 'LinkedIn', 'https://linkedin.com/in/rifkimaulana', NULL, 0, NULL, '2025-11-05 23:18:58', '2025-11-14 08:53:17'),
(3, 'Dribbble', 'http://localhost:8080/admin/site-info', NULL, 0, NULL, '2025-11-13 21:41:34', '2025-11-14 08:53:17'),
(4, 'Instagram', 'http://localhost:8080/admin/site-info', NULL, 0, NULL, '2025-11-13 22:53:55', '2025-11-14 08:53:17'),
(5, 'YouTube', 'https://linkedin.com/in/rifkimaulana', NULL, 0, NULL, '2025-11-14 05:05:46', '2025-11-14 08:53:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','editor') DEFAULT 'admin',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(3, 'admin', 'admin@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', '2025-11-06 05:56:54', '2025-11-06 05:56:54'),
(4, 'Rifki', 'rfkimaulana01@gmail.com', '$2y$10$IeT6.SPuvoeyIq2uM0Bqd.4FFV5E4OBbWbcTCcN4xEW81Aat03WCm', 'admin', '2025-11-05 23:19:20', '2025-11-06 06:24:48'),
(5, 'oranglain', 'rifkimaulana23@ummi.ac.id', '$2y$10$kMerwwimT.VqY2nLPGGpdOIbxg4qbtTXwDo6K1kUcEvBI87yfl2N6', 'editor', '2025-11-05 23:27:31', '2025-11-05 23:27:31');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indeks untuk tabel `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indeks untuk tabel `site_info`
--
ALTER TABLE `site_info`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indeks untuk tabel `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `educations`
--
ALTER TABLE `educations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `site_info`
--
ALTER TABLE `site_info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `educations`
--
ALTER TABLE `educations`
  ADD CONSTRAINT `educations_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `social_links`
--
ALTER TABLE `social_links`
  ADD CONSTRAINT `social_links_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
