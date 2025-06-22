-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2025 at 06:10 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `p4c`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hasil_ujians`
--

CREATE TABLE `hasil_ujians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ujian_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `materi_id` bigint(20) UNSIGNED NOT NULL,
  `total_nilai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hasil_ujians`
--

INSERT INTO `hasil_ujians` (`id`, `ujian_id`, `user_id`, `materi_id`, `total_nilai`, `created_at`, `updated_at`) VALUES
(2, 3, 2, 1, 150, '2025-06-21 21:08:01', '2025-06-21 21:08:16');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_ujian_details`
--

CREATE TABLE `hasil_ujian_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hasil_ujian_id` bigint(20) UNSIGNED NOT NULL,
  `pertanyaan` text NOT NULL DEFAULT '1',
  `jawaban` text NOT NULL DEFAULT '1',
  `nilai` int(11) NOT NULL,
  `alasan` text NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hasil_ujian_details`
--

INSERT INTO `hasil_ujian_details` (`id`, `hasil_ujian_id`, `pertanyaan`, `jawaban`, `nilai`, `alasan`, `created_at`, `updated_at`) VALUES
(1, 2, 'Jelaskan latar belakang dibentuknya BPUPKI oleh Jepang dan siapa saja tokoh penting di dalamnya!', 'BPUPKI dibentuk oleh Jepang pada tanggal 29 April 1945', 65, 'Jawaban menyebutkan tanggal pembentukan BPUPKI oleh Jepang. Namun kurang lengkap. Seharusnya, jawaban ideal mencakup:\n\n1.  **Latar Belakang Pembentukan:**\n *   Kekalahan Jepang dalam Perang Pasifik dan upaya menarik simpati bangsa Indonesia.\n *   Janji Jepang untuk memberikan kemerdekaan sebagai siasat politik.\n *   Kondisi sosial-politik dan ekonomi Indonesia saat itu.\n\n2.  **Tokoh Penting:**\n *   Menyebutkan ketua BPUPKI (Dr. K.R.T. Radjiman Wedyodiningrat) dan wakil ketua (Ichibangase Yosio dan R.P. Soeroso).\n *   Menyebutkan beberapa tokoh penting lainnya seperti Soekarno, Hatta, Muhammad Yamin, Soepomo, dan lainnya (walaupun tidak mungkin menyebutkan semuanya).\n\n3. Detail proses pembentukan (janji jepang direalisasikan pada tanggal 29 April 1945 bertepatan dengan hari ulang tahun Kaisar Hirohito.)', '2025-06-21 21:08:09', '2025-06-21 21:08:09'),
(2, 2, 'Sebutkan rumusan dasar negara versi Ir. Soekarno dan peran Panitia Sembilan dalam pembentukan Piagam Jakarta!', 'Rumusan dasar negara versi Ir. Soekarno yang disampaikan pada 1 Juni 1945 meliputi:\r\n\r\n    Kebangsaan Indonesia,\r\n\r\n    Internasionalisme atau peri kemanusiaan,\r\n\r\n    Mufakat atau demokrasi,\r\n\r\n    Kesejahteraan sosial, dan\r\n\r\n    Ketuhanan yang berkebudayaan.\r\n    Panitia Sembilan, yang dibentuk setelah sidang pertama BPUPKI, bertugas menyusun rumusan dasar negara dan berhasil merumuskan Piagam Jakarta pada 22 Juni 1945 yang menjadi cikal bakal Pembukaan UUD 1945.', 85, 'Jawaban telah menyebutkan dengan tepat rumusan dasar negara versi Ir. Soekarno dan peran Panitia Sembilan dalam menghasilkan Piagam Jakarta. Namun, bisa ditingkatkan dengan memberikan sedikit detail tambahan mengenai bagaimana Piagam Jakarta menjadi cikal bakal Pembukaan UUD 1945 dan poin-poin utama dalam piagam tersebut (meskipun tidak diminta secara spesifik).', '2025-06-21 21:08:16', '2025-06-21 21:08:16');

-- --------------------------------------------------------

--
-- Table structure for table `materis`
--

CREATE TABLE `materis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `attachment` text DEFAULT NULL,
  `guru_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materis`
--

INSERT INTO `materis` (`id`, `judul`, `deskripsi`, `attachment`, `guru_id`, `created_at`, `updated_at`) VALUES
(1, 'PKn SD', 'PKn SD', 'materi/1750562036_kelas-7-ppkn-bs-press-compressed.pdf', 1, '2025-06-21 19:35:59', '2025-06-21 20:13:56');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_05_03_105955_add_role_to_users_table', 1),
(6, '2025_05_03_110125_create_materis_table', 1),
(7, '2025_05_03_110227_create_soals_table', 1),
(8, '2025_05_03_110356_create_ujians_table', 1),
(9, '2025_06_22_013635_create_hasil_ujians_table', 1),
(10, '2025_06_22_014449_create_hasil_ujian_details_table', 1),
(11, '2025_06_22_020733_create_ujian_details_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `soals`
--

CREATE TABLE `soals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `materi_id` bigint(20) UNSIGNED NOT NULL,
  `pertanyaan` text NOT NULL DEFAULT '1',
  `pilihan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '1' CHECK (json_valid(`pilihan`)),
  `jawaban_benar` varchar(255) NOT NULL DEFAULT '1',
  `jenis` enum('essay','pilgan') NOT NULL DEFAULT 'essay',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `soals`
--

INSERT INTO `soals` (`id`, `materi_id`, `pertanyaan`, `pilihan`, `jawaban_benar`, `jenis`, `created_at`, `updated_at`) VALUES
(1, 1, 'Jelaskan latar belakang dibentuknya BPUPKI oleh Jepang dan siapa saja tokoh penting di dalamnya!', '\"{\\\"A\\\":\\\"3\\\",\\\"B\\\":\\\"4\\\",\\\"C\\\":\\\"5\\\",\\\"D\\\":\\\"6\\\"}\"', 'B', 'essay', '2025-06-21 19:35:59', '2025-06-21 20:14:59'),
(2, 1, 'Sebutkan rumusan dasar negara versi Ir. Soekarno dan peran Panitia Sembilan dalam pembentukan Piagam Jakarta!', '\"{\\\"A\\\":\\\"1\\\",\\\"B\\\":\\\"2\\\",\\\"C\\\":\\\"3\\\",\\\"D\\\":\\\"4\\\"}\"', 'B', 'essay', '2025-06-21 19:35:59', '2025-06-21 20:15:08');

-- --------------------------------------------------------

--
-- Table structure for table `ujians`
--

CREATE TABLE `ujians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_ujian` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `materi_id` bigint(20) UNSIGNED NOT NULL,
  `waktu_mulai` timestamp NULL DEFAULT NULL,
  `waktu_selesai` timestamp NULL DEFAULT NULL,
  `kkm` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ujians`
--

INSERT INTO `ujians` (`id`, `nama_ujian`, `deskripsi`, `materi_id`, `waktu_mulai`, `waktu_selesai`, `kkm`, `created_at`, `updated_at`) VALUES
(3, 'Latihan PPKn 2', 'Latihan PPKn 2', 1, '2025-06-21 18:01:00', '2025-06-21 20:03:00', 75, '2025-06-21 20:26:02', '2025-06-21 20:26:02');

-- --------------------------------------------------------

--
-- Table structure for table `ujian_details`
--

CREATE TABLE `ujian_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ujian_id` bigint(20) UNSIGNED NOT NULL,
  `soal_id` bigint(20) UNSIGNED NOT NULL,
  `pertanyaan` text NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ujian_details`
--

INSERT INTO `ujian_details` (`id`, `ujian_id`, `soal_id`, `pertanyaan`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Berapakah 2 + 2?', '2025-06-21 20:06:42', '2025-06-21 20:06:42'),
(2, 2, 2, 'Berapakah 5 - 3?', '2025-06-21 20:06:42', '2025-06-21 20:06:42'),
(3, 2, 3, 'Berapakah 3 x 3?', '2025-06-21 20:06:42', '2025-06-21 20:06:42'),
(4, 3, 1, 'Jelaskan latar belakang dibentuknya BPUPKI oleh Jepang dan siapa saja tokoh penting di dalamnya!', '2025-06-21 20:26:02', '2025-06-21 20:26:02'),
(5, 3, 2, 'Sebutkan rumusan dasar negara versi Ir. Soekarno dan peran Panitia Sembilan dalam pembentukan Piagam Jakarta!', '2025-06-21 20:26:02', '2025-06-21 20:26:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('guru','siswa') NOT NULL DEFAULT 'siswa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Pak Guru', 'guru@example.com', NULL, '$2y$10$B8fpzb.VJkwsG1mCUAFhQ.HyUV13LWWXM3EvJyQ3ykxQG7O.9eNV2', NULL, '2025-06-21 19:35:59', '2025-06-21 19:35:59', 'guru'),
(2, 'Budi Siswa', 'siswa@example.com', NULL, '$2y$10$unKTnuMWZ9sGME3Ed.FtJO0ogzZcIQPsgtxUnkjOMVwkklSAUZjYe', NULL, '2025-06-21 19:35:59', '2025-06-21 19:35:59', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hasil_ujians`
--
ALTER TABLE `hasil_ujians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil_ujian_details`
--
ALTER TABLE `hasil_ujian_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materis`
--
ALTER TABLE `materis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `soals`
--
ALTER TABLE `soals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ujians`
--
ALTER TABLE `ujians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ujian_details`
--
ALTER TABLE `ujian_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hasil_ujians`
--
ALTER TABLE `hasil_ujians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hasil_ujian_details`
--
ALTER TABLE `hasil_ujian_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `materis`
--
ALTER TABLE `materis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `soals`
--
ALTER TABLE `soals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ujians`
--
ALTER TABLE `ujians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ujian_details`
--
ALTER TABLE `ujian_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
