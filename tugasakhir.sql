-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jul 2022 pada 10.38
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugasakhir`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_jabatan` (IN `in_id` INT(11), IN `in_nama_jabatan` VARCHAR(25), IN `tipe` VARCHAR(11))  BEGIN
    IF (tipe='post') THEN 
	BEGIN
             insert INTO jabatan VALUES(
             in_id,
             in_nama_jabatan,
             NOW(),
	     now()
             );
	END;
	ELSE
	BEGIN
            replace INTO jabatan VALUES(
             in_id,
             in_nama_jabatan,
             NOW(),
	     NOW()
             );
        END;
        END IF;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_user` (IN `in_id` INT(11), IN `in_nama` VARCHAR(25), IN `in_username` VARCHAR(25), IN `in_jabatan` VARCHAR(25), IN `in_nip` VARCHAR(25), IN `in_alamat` VARCHAR(25), IN `in_tanggal_lahir` DATE, IN `in_email` VARCHAR(25), IN `in_password` VARCHAR(10), IN `tipe` VARCHAR(10))  BEGIN
    IF (tipe='post') THEN 
	BEGIN
             insert INTO users(
		id, nama, username, jabatan,nip,alamat,tanggal_lahir,email,password,  created_at, updated_at
             ) VALUES(
             in_id,in_nama,
             in_username,
             in_jabatan,
             in_nip,
             in_alamat,    
             in_tanggal_lahir,
             in_email,
             in_password,
             NOW(),
             NOW() 
             );
	END;
	ELSE
	BEGIN
             REPLACE INTO users(
		id, nama, username, jabatan,nip,alamat,tanggal_lahir,email,password,  created_at, updated_at
             ) VALUES(
             in_id,in_nama,
             in_username,
             in_jabatan,
             in_nip,
             in_alamat,    
             in_tanggal_lahir,
             in_email,
             in_password,
             NOW(),
             NOW() 
             );
        END;
        END IF;
	END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen`
--

CREATE TABLE `absen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `absen`
--

INSERT INTO `absen` (`id`, `user_id`, `tanggal`, `status`, `kondisi`, `foto`, `created_at`, `updated_at`) VALUES
(1, 2, '2022-07-02', 'WFO', 'Sehat', 'Infografic__MI_2C_Ayu3_Erni11_Masykur19_Zamron27.jpg', '2022-07-02 08:01:48', '2022-07-02 08:02:13'),
(2, 2, '2022-07-02', 'WFO', 'Sehat', 'ERD FIX!!!.jpg', '2022-07-02 10:29:09', '2022-07-02 10:29:09'),
(3, 3, '2022-07-02', 'WFO', 'Sehat', 'Internal_AyuAriestaWandari.jpg', '2022-07-02 11:38:59', '2022-07-02 11:38:59'),
(4, 2, '2022-07-02', 'WFO', 'Sakit', 'jurnalmengajar.jpg', '2022-07-02 16:00:37', '2022-07-02 16:00:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal`
--

CREATE TABLE `jurnal` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `rpp_id` int(10) UNSIGNED DEFAULT NULL,
  `hasil` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kendala` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tindak_lanjut` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum divalidasi',
  `pesan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jurnal`
--

INSERT INTO `jurnal` (`id`, `user_id`, `rpp_id`, `hasil`, `kendala`, `tindak_lanjut`, `foto_kegiatan`, `tanggal`, `status`, `pesan`, `created_at`, `updated_at`) VALUES
(1, 3, 1, NULL, NULL, NULL, NULL, '2022-07-02', 'belum divalidasi', NULL, '2022-07-02 12:48:57', '2022-07-02 12:48:57'),
(4, 2, 3, NULL, NULL, NULL, NULL, '2022-07-03', 'belum divalidasi', NULL, '2022-07-03 02:09:23', '2022-07-03 02:09:23'),
(5, 3, 1, 'murid mendengarkan dengan baik', 'beberapa siswa tidak hadir', NULL, 'Capture 5.jpg', '2022-07-03', 'belum divalidasi', NULL, '2022-07-03 02:42:56', '2022-07-03 04:40:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(72, '2022_05_07_033152_create_absens_table', 1),
(105, '2014_10_12_000000_create_users_table', 2),
(106, '2014_10_12_100000_create_password_resets_table', 2),
(107, '2019_08_19_000000_create_failed_jobs_table', 2),
(108, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(109, '2022_03_21_235405_create_absen_table', 2),
(110, '2022_03_21_235425_create_rpp_table', 2),
(111, '2022_03_21_235426_create_jurnal_table', 2),
(112, '2022_03_22_002523_create_jabatan_table', 2),
(113, '2022_06_02_073515_create_absen_datang_table', 2),
(114, '2022_06_02_073657_create_absen_pulang_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rpp`
--

CREATE TABLE `rpp` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `mata_pelajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kompetensi_inti` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penjelasan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rpp`
--

INSERT INTO `rpp` (`id`, `user_id`, `mata_pelajaran`, `kompetensi_inti`, `penjelasan`, `created_at`, `updated_at`) VALUES
(1, 3, 'bahasa', '2.1', 'bahasa indonesia', '2022-07-02 12:47:28', '2022-07-02 12:47:28'),
(2, 3, 'ipa', '2.3', 'biologi', '2022-07-02 12:48:37', '2022-07-02 12:48:37'),
(3, 2, 'bahasa', '2.1', 'bahasa', '2022-07-02 13:30:30', '2022-07-02 13:30:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','kepsek','guru') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'guru',
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mapel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `nip`, `jabatan`, `kelas`, `mapel`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'rima', 'rima@gmail.com', NULL, '$2y$10$UwqloCX7PFLM3aQvgQxh6e9UgifqwQOZiF1zdogtLF6iVDR7Yr7IW', 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'ayu', 'ayu@gmail.com', NULL, '$2y$10$og00q28o6fDS3/lhIg7lte5dgUfWMibNGJIRhHLCqipg2BaqZE4MO', 'guru', NULL, NULL, NULL, NULL, NULL, '2022-07-02 07:57:40', '2022-07-02 07:57:40'),
(3, 'masykur', 'masykur@gmail.com', NULL, '$2y$10$3YvJDW9liCPdTmQJz/LdVeoZU0gpBjjNtf9mk./bly3fmPuYjmQaq', 'kepsek', NULL, 'Guru Kelas', '5', NULL, NULL, '2022-07-02 11:33:21', '2022-07-03 03:27:48');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absen_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jurnal_user_id_foreign` (`user_id`),
  ADD KEY `jurnal_rpp_id_foreign` (`rpp_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `rpp`
--
ALTER TABLE `rpp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rpp_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT untuk tabel `absen`
--
ALTER TABLE `absen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rpp`
--
ALTER TABLE `rpp`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD CONSTRAINT `absen_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jurnal`
--
ALTER TABLE `jurnal`
  ADD CONSTRAINT `jurnal_rpp_id_foreign` FOREIGN KEY (`rpp_id`) REFERENCES `rpp` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jurnal_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rpp`
--
ALTER TABLE `rpp`
  ADD CONSTRAINT `rpp_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
