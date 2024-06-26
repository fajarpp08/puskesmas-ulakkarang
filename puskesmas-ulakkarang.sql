-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 28 Bulan Mei 2024 pada 02.15
-- Versi server: 8.0.30
-- Versi PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `puskesmas-ulakkarang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alurs`
--

CREATE TABLE `alurs` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_alur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_alur` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_alur` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `alurs`
--

INSERT INTO `alurs` (`id`, `nama_alur`, `deskripsi_alur`, `gambar_alur`, `created_at`, `updated_at`) VALUES
(1, 'Alur Pendaftaran', 'Deskripsi Alur Pendaftaran', '1716852079_alur-pendaftaran.png', '2024-05-27 16:21:19', '2024-05-27 16:21:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `beritas`
--

CREATE TABLE `beritas` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_berita` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_berita` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_berita` date NOT NULL,
  `gambar_berita` text COLLATE utf8mb4_unicode_ci,
  `lama_berita` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `beritas`
--

INSERT INTO `beritas` (`id`, `nama_berita`, `deskripsi_berita`, `tanggal_berita`, `gambar_berita`, `lama_berita`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Sosialisasi Vaksinasi Anak Sekolah “Vaksinasi Bagus Untuk Memulai Sekolah Tatap Muka\"', 'Deskripsi Berita Sosialisasi Vaksinasi Anak Sekolah “Vaksinasi Bagus Untuk Memulai Sekolah Tatap Muka\"', '2024-05-21', '1716852255_berita-1.jpeg', '6', 'sosialisasi-vaksinasi-anak-sekolah-vaksinasi-bagus-untuk-memulai-sekolah-tatap-muka', '2024-05-27 16:24:15', '2024-05-27 16:24:15'),
(2, 'Berita 1', 'Deskripsi Berita 1', '2024-05-16', '1716853041_galeri-kegiatan-senam.jpg', '5', 'berita-1', '2024-05-27 16:37:21', '2024-05-27 16:37:21'),
(3, 'Berita 2', 'Deskripsi Berita 2', '2024-05-09', '1716853083_fasilitas-ruang-tunggu.jpeg', '7', 'berita-2', '2024-05-27 16:38:05', '2024-05-27 16:38:05'),
(4, 'Berita 3', 'Deskripsi Berita 3', '2024-05-23', '1716853119_puskesmas-home.jpg', '4', 'berita-3', '2024-05-27 16:38:39', '2024-05-27 16:38:39'),
(5, 'Pembinaan Sekolah Sehat di Wilayah Kerja Puskesmas Alai', 'Deskripsi Pembinaan Sekolah Sehat di Wilayah Kerja Puskesmas Alai', '2024-05-28', '1716853160_puskesmas-bg.jpg', '15', 'pembinaan-sekolah-sehat-di-wilayah-kerja-puskesmas-alai', '2024-05-27 16:39:20', '2024-05-27 16:39:20'),
(6, 'Berita 4', 'Deskripsi Berita 4', '2024-05-27', '1716853217_instalasi-rawat-jalan.png', '9', 'berita-4', '2024-05-27 16:40:17', '2024-05-27 16:40:17'),
(7, 'Berita 5', 'Deskripsi Berita 5', '2024-05-21', '1716853268_poli-anak.jpg', '5', 'berita-5', '2024-05-27 16:41:08', '2024-05-27 16:41:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_fasilitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_fasilitas` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_fasilitas` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `nama_fasilitas`, `deskripsi_fasilitas`, `gambar_fasilitas`, `created_at`, `updated_at`) VALUES
(1, 'Ruang tunggu', 'Deskripsi Ruang Tunggu', '1716852017_fasilitas-ruang-tunggu.jpeg', '2024-05-27 16:20:17', '2024-05-27 16:20:17'),
(2, 'Ruang 1', 'Deskripsi Ruang 1', '1716856973_logo-padang.png', '2024-05-27 17:42:54', '2024-05-27 17:42:54'),
(3, 'Ruang 2', 'Deskripsi Ruang 2', '1716857011_berita-1.jpeg', '2024-05-27 17:43:31', '2024-05-27 17:43:31'),
(4, 'Ruang 3', 'Deskripsi Ruang 3', '1716857069_galeri-kegiatan-senam.jpg', '2024-05-27 17:44:29', '2024-05-27 17:44:29'),
(5, 'Ruang 4', 'Deskripsi Ruang 4', '1716857099_puskesmas-home.jpg', '2024-05-27 17:44:59', '2024-05-27 17:44:59'),
(6, 'Ruang 5', 'Deskripsi Ruang 5', '1716857123_instalasi-rawat-jalan.png', '2024-05-27 17:45:23', '2024-05-27 17:45:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeris`
--

CREATE TABLE `galeris` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_galeri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_galeri` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_galeri` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `galeris`
--

INSERT INTO `galeris` (`id`, `nama_galeri`, `deskripsi_galeri`, `gambar_galeri`, `created_at`, `updated_at`) VALUES
(1, 'Kegiatan Senam Bersama', 'Deskripsi Kegiatan Senam Bersama', '1716852129_galeri-kegiatan-senam.jpg', '2024-05-27 16:22:11', '2024-05-27 16:22:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `instalasis`
--

CREATE TABLE `instalasis` (
  `id` bigint UNSIGNED NOT NULL,
  `jenis_instalasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `instalasis`
--

INSERT INTO `instalasis` (`id`, `jenis_instalasi`, `created_at`, `updated_at`) VALUES
(1, 'Rawat Jalan', '2024-05-27 16:20:40', '2024-05-27 16:20:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_05_13_122531_create_polis_table', 1),
(5, '2024_05_18_190724_create_instalasis_table', 1),
(6, '2024_05_23_194448_create_fasilitas_table', 1),
(7, '2024_05_23_194507_create_strukturs_table', 1),
(8, '2024_05_23_194551_create_galeris_table', 1),
(9, '2024_05_23_194601_create_pengumuman_table', 1),
(10, '2024_05_23_194609_create_beritas_table', 1),
(11, '2024_05_23_194620_create_alurs_table', 1),
(12, '2024_05_27_194103_create_programs_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_pengumuman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_pengumuman` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pengumuman` date NOT NULL,
  `gambar_pengumuman` text COLLATE utf8mb4_unicode_ci,
  `lama_pengumuman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `nama_pengumuman`, `deskripsi_pengumuman`, `tanggal_pengumuman`, `gambar_pengumuman`, `lama_pengumuman`, `created_at`, `updated_at`) VALUES
(1, 'Pengumuman 1', 'asd', '2024-05-26', '1716845063_galeri-kegiatan-senam.jpg', '5', '2024-05-27 14:24:24', '2024-05-27 14:24:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `polis`
--

CREATE TABLE `polis` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_poli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_poli` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_poli` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `polis`
--

INSERT INTO `polis` (`id`, `nama_poli`, `deskripsi_poli`, `gambar_poli`, `created_at`, `updated_at`) VALUES
(1, 'Poli Umum', 'Deskripsi Poli Umum', '1716851829_poli-umum.jpg', '2024-05-27 16:17:09', '2024-05-27 16:17:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `programs`
--

CREATE TABLE `programs` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_program` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_program` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_program` text COLLATE utf8mb4_unicode_ci,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `lokasi_program` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `programs`
--

INSERT INTO `programs` (`id`, `nama_program`, `deskripsi_program`, `gambar_program`, `tanggal_mulai`, `tanggal_akhir`, `lokasi_program`, `created_at`, `updated_at`) VALUES
(1, 'Program Ibu dan Anak', 'Program Ibu dan Anak sehat', '1716847060_berita-1.jpeg', '2024-05-09', '2024-05-27', 'Puskesmas Ulak Karang', '2024-05-27 14:57:40', '2024-05-27 14:57:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('taZjiOkwa0xL5O5ZFfL9mAgxJ5Z8nIGf2sLGB4Qi', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiN1BTS0hWRVRMM2J5ZlZEeWp3SmJYRHZJTXB1dzAwZkZUNDh3enBMWSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2RhdGEtcGVuZ3VtdW1hbiI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjIxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1716860943);

-- --------------------------------------------------------

--
-- Struktur dari tabel `strukturs`
--

CREATE TABLE `strukturs` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_struktur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_struktur` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_struktur` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `strukturs`
--

INSERT INTO `strukturs` (`id`, `nama_struktur`, `deskripsi_struktur`, `gambar_struktur`, `created_at`, `updated_at`) VALUES
(1, 'Struktur Puskesmas Ulak Karang', 'Deskripsi Struktur Puskesmas Ulak Karang', '1716851993_struktur-puskesmas.png', '2024-05-27 16:19:53', '2024-05-27 16:19:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Admin',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '$2y$12$BPZ32JPPh528Zzgm61Lpo.eV9.iBH4BuL1N5xB2qw0X5euvibxTVm', 'Admin', NULL, '2024-05-27 14:02:45', '2024-05-27 14:02:45'),
(2, 'Admin1', 'admin1', '$2y$12$DV4ddFH7nqAbN1Ia.lx61u9Mv3o6kHLbxAm1bJ5iVTPHU9pHSiWJe', 'Admin', NULL, '2024-05-27 16:22:51', '2024-05-27 16:23:07');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alurs`
--
ALTER TABLE `alurs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeris`
--
ALTER TABLE `galeris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `instalasis`
--
ALTER TABLE `instalasis`
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
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `polis`
--
ALTER TABLE `polis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `strukturs`
--
ALTER TABLE `strukturs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alurs`
--
ALTER TABLE `alurs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `galeris`
--
ALTER TABLE `galeris`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `instalasis`
--
ALTER TABLE `instalasis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `polis`
--
ALTER TABLE `polis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `strukturs`
--
ALTER TABLE `strukturs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
