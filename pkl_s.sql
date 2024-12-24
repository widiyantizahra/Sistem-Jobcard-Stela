-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 24 Des 2024 pada 15.54
-- Versi server: 8.0.30
-- Versi PHP: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkl_s`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobcard`
--

CREATE TABLE `jobcard` (
  `id` bigint UNSIGNED NOT NULL,
  `no_jobcard` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `kurs` int NOT NULL,
  `customer_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_po` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `po_date` date NOT NULL,
  `po_received` date NOT NULL,
  `totalbop` int DEFAULT NULL,
  `totalsp` int DEFAULT NULL,
  `totalbp` int DEFAULT NULL,
  `no_form` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `effective_date` date NOT NULL,
  `no_revisi` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jobcard`
--

INSERT INTO `jobcard` (`id`, `no_jobcard`, `date`, `kurs`, `customer_name`, `no_po`, `po_date`, `po_received`, `totalbop`, `totalsp`, `totalbp`, `no_form`, `effective_date`, `no_revisi`, `created_at`, `updated_at`) VALUES
(3, 'jobcard123', '2024-11-01', 15000, 'danuartha', 'po no123', '2024-11-01', '2024-11-01', 4000000, 6000000, 3200000, 'no 1', '2024-11-01', 2, '2024-11-01 00:17:50', '2024-11-16 09:10:24'),
(4, 'JC.16112024-001', '2024-11-16', 15000, 'PT.PJB UBJOB REMBANG', '0049006162', '2024-11-16', '2024-11-09', 27000000, 61200000, 16600000, '001', '2024-11-16', 1, '2024-11-16 07:35:40', '2024-12-23 13:26:29'),
(5, 'JC.19112024-002', '2024-11-19', 15000, 'PT.TAEKWANG INDONESIA', '1234567', '2024-11-19', '2024-11-19', 1000000, 2000000, 800000, '0111', '2024-11-19', 2, '2024-11-19 07:31:25', '2024-12-23 13:25:33'),
(6, 'JC.23122024-003', '2024-12-23', 23, 'PT.ONDASHI', '3224', '2024-12-23', '2024-12-23', 7000000, 14000000, 4000000, '12', '2024-12-23', 2, '2024-12-23 06:44:09', '2024-12-23 13:27:06'),
(7, 'JC.23122024-004', '2024-12-23', -1, 'PINDO DELI 3 KARAWANG', 'KRW-47514616', '2020-01-29', '2020-01-29', 22000000, 34500000, 13700000, '12', '2020-01-29', 1, '2024-12-23 07:18:30', '2024-12-23 07:28:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobcard_detail`
--

CREATE TABLE `jobcard_detail` (
  `id` bigint UNSIGNED NOT NULL,
  `jobcard_id` int NOT NULL,
  `qty` int NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_bop` int NOT NULL,
  `total_bop` int NOT NULL,
  `unit_sp` int NOT NULL,
  `total_sp` int NOT NULL,
  `unit_bp` int NOT NULL,
  `total_bp` int NOT NULL,
  `supplier` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jobcard_detail`
--

INSERT INTO `jobcard_detail` (`id`, `jobcard_id`, `qty`, `description`, `unit_bop`, `total_bop`, `unit_sp`, `total_sp`, `unit_bp`, `total_bp`, `supplier`, `remarks`, `created_at`, `updated_at`) VALUES
(3, 3, 2, 'cc', 1000000, 2000000, 1500000, 3000000, 800000, 1600000, 'cs', 'rt', '2024-11-05 08:53:06', '2024-11-05 08:53:06'),
(4, 3, 2, 'cc', 1000000, 2000000, 1500000, 3000000, 800000, 1600000, 'cs', NULL, '2024-11-05 08:53:20', '2024-11-05 08:53:20'),
(7, 4, 2, 'cc', 1000000, 2000000, 600000, 1200000, 800000, 1600000, 'cs', NULL, '2024-11-17 21:53:59', '2024-11-17 21:53:59'),
(8, 5, 1, 'cc', 1000000, 1000000, 2000000, 2000000, 800000, 800000, 'cs', NULL, '2024-11-19 07:35:52', '2024-11-19 07:35:52'),
(9, 6, 1, 'Material 12', 5000000, 5000000, 6000000, 6000000, 3000000, 3000000, 'cs', NULL, '2024-12-23 07:27:36', '2024-12-23 07:27:36'),
(10, 6, 2, 'Material 2', 1000000, 2000000, 4000000, 8000000, 500000, 1000000, 'cs', NULL, '2024-12-23 07:27:57', '2024-12-23 07:27:57'),
(11, 7, 4, 'cc', 1000000, 4000000, 3000000, 12000000, 800000, 3200000, 'cs', NULL, '2024-12-23 07:28:19', '2024-12-23 07:28:19'),
(12, 7, 3, 'Material 12', 5000000, 15000000, 6000000, 18000000, 3000000, 9000000, 'cs', NULL, '2024-12-23 07:28:37', '2024-12-23 07:28:37'),
(13, 7, 3, 'Material 2', 1000000, 3000000, 1500000, 4500000, 500000, 1500000, 'cs', NULL, '2024-12-23 07:28:57', '2024-12-23 07:28:57'),
(14, 4, 5, 'Material 12', 5000000, 25000000, 12000000, 60000000, 3000000, 15000000, 'cs', NULL, '2024-12-23 13:26:29', '2024-12-23 13:26:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `material`
--

CREATE TABLE `material` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int NOT NULL,
  `unit_price` int NOT NULL,
  `buying_price` int DEFAULT NULL,
  `supplier` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `material`
--

INSERT INTO `material` (`id`, `name`, `stok`, `unit_price`, `buying_price`, `supplier`, `created_at`, `updated_at`) VALUES
(1, 'Material 12', 41, 5000000, 3000000, 'cs', '2024-11-01 15:46:55', '2024-12-23 13:26:29'),
(2, 'Material 2', 45, 1000000, 500000, 'cs', '2024-11-01 15:46:55', '2024-12-23 07:28:57'),
(4, 'cc', 8, 1000000, 800000, 'cs', '2024-11-02 01:26:10', '2024-12-23 07:28:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_10_18_082501_create_jobcard_table', 2),
(5, '2024_10_18_083823_create_jobcard_detail_table', 2),
(6, '2024_11_01_145940_create_jobcard_detail_table', 3),
(7, '2024_11_01_153152_create_materials_table', 4),
(8, '2024_11_18_080728_create_notif_m_s_table', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notif`
--

CREATE TABLE `notif` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_jobcard` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_pengadaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `material_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `notif`
--

INSERT INTO `notif` (`id`, `judul`, `no_jobcard`, `jumlah_pengadaan`, `user_id`, `status`, `material_id`, `created_at`, `updated_at`) VALUES
(1, 'Pengadaan 12', '12', '4', '2', 1, '1', '2024-11-18 07:18:07', '2024-12-20 04:08:39'),
(3, 'Pengadaan Material 12', '12', '5', '2', 0, '1', '2024-11-18 07:36:54', '2024-11-18 07:36:54'),
(4, 'Pengadaan Material 2', 'JC.19112024-002', '9', '2', 0, '1', '2024-11-19 08:01:32', '2024-11-19 08:01:32'),
(5, 'Pengadaan cc', 'JC.16112024-001', '1234', '2', 1, '4', '2024-12-20 03:48:52', '2024-12-20 03:48:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('kdxClSKbMqsDKVzEMMDBwAm9m514yLmLJhUBRsKf', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiR21kNnIzVGFmWk1vS2gyc01MMUdGTzIwcWxDeEVFVG1TZEFKWEl5RyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMS9hZG1pbi9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6MTY6Imxhc3RBY3Rpdml0eVRpbWUiO086MjU6IklsbHVtaW5hdGVcU3VwcG9ydFxDYXJib24iOjM6e3M6NDoiZGF0ZSI7czoyNjoiMjAyNC0xMi0yNCAxMDoxOToyMy40NDE5NDMiO3M6MTM6InRpbWV6b25lX3R5cGUiO2k6MztzOjg6InRpbWV6b25lIjtzOjEyOiJBc2lhL0pha2FydGEiO319', 1735010364);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `role`, `active`, `profile`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'produksi', 'produksi', '1', '1', 'profile/produksi_IMG-20240902-WA0023.jpg', 'produksi@exaple.com', '2024-09-26 19:14:38', '$2y$12$rfn7ARiRk561WQ2SOqGTBefuCa3pSZumJenDbMzl3a13ruU/9Jk9O', 'wu9LwjxSINdKHqUZ41zfuoW02syTEryKa0PeiV9oL0y236ZBiVj2JMnEbY8U', '2024-09-26 19:14:39', '2024-12-20 03:37:50'),
(2, 'admin', 'admin', '0', '1', 'profile/admin_7.png', 'admin@cc.cc', '2024-09-26 19:14:39', '$2y$12$HA.04t.05t6CACQVWYSmVeoINurgnQG8yRPNz5dzysnUuI/Yfxw6y', 'ucfB8UuhleKriKLtJ86GTH3fnpmBo9ci0icigSV9Y3LItu6Lp0qPiIqd5Blh', '2024-09-26 19:14:39', '2024-11-02 01:47:07'),
(3, 'direktur', 'direktur', '2', '1', NULL, 'direktur@gmail.com', NULL, '$2y$12$ERfQtHoK0pJg28u5ZdOMhuk6SrDExsRh7VqIit8XeeLaKhfyAV8ti', NULL, NULL, '2024-11-26 14:12:11');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobcard`
--
ALTER TABLE `jobcard`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jobcard_no_jobcard_unique` (`no_jobcard`),
  ADD UNIQUE KEY `jobcard_no_po_unique` (`no_po`);

--
-- Indeks untuk tabel `jobcard_detail`
--
ALTER TABLE `jobcard_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobcard`
--
ALTER TABLE `jobcard`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jobcard_detail`
--
ALTER TABLE `jobcard_detail`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `material`
--
ALTER TABLE `material`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `notif`
--
ALTER TABLE `notif`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
