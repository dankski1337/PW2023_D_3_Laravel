-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2023 at 03:58 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `DB_D_3`
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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_08_032942_create_users_table', 2),
(6, '2023_12_12_164635_create_user_table', 3),
(7, '2023_12_14_051444_create_ulasans_table', 4),
(8, '2023_12_14_054323_create_ulasan', 5),
(13, '2023_12_14_064409_create_mobils_table', 6),
(14, '2023_12_15_172745_create_rental_transaksis_table', 6),
(15, '2023_12_20_015918_create_ulasan_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `mobils`
--

CREATE TABLE `mobils` (
  `id_mobil` bigint(20) UNSIGNED NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `bahan_bakar` varchar(255) NOT NULL,
  `transmisi` varchar(255) NOT NULL,
  `jumlah_kursi` int(11) NOT NULL,
  `tahun_produksi` int(11) NOT NULL,
  `warna` varchar(255) NOT NULL,
  `tarif` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mobils`
--

INSERT INTO `mobils` (`id_mobil`, `gambar`, `model`, `bahan_bakar`, `transmisi`, `jumlah_kursi`, `tahun_produksi`, `warna`, `tarif`, `status`, `created_at`, `updated_at`) VALUES
(1, 'gle400.png', 'Mercedes GLE 400', 'Bensin', 'Automatic', 5, 2015, 'Putih', 200000, 'Tersedia', '2020-12-31 17:00:00', '2023-12-19 19:23:21'),
(2, 'mobil1.png', 'Toyota Avanza', 'Bensin', 'Manual', 7, 2019, 'Hitam', 200000, 'Tersedia', '2020-12-31 17:00:00', '2023-12-19 19:23:20'),
(3, 'fortuner.png', 'Toyota Fortuner', 'Bensin', 'Manual', 7, 2015, 'Putih', 250000, 'Tersedia', '2020-12-31 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
-- Table structure for table `rental_transaksis`
--

CREATE TABLE `rental_transaksis` (
  `id_rental_transaksi` bigint(20) UNSIGNED NOT NULL,
  `id_mobil` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `lokasi_pengambilan` varchar(255) NOT NULL,
  `tanggal_pengambilan` date NOT NULL,
  `jam_pengambilan` time NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `jam_pengembalian` time NOT NULL,
  `status` varchar(255) NOT NULL,
  `denda` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `deadline_pembayaran` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rental_transaksis`
--

INSERT INTO `rental_transaksis` (`id_rental_transaksi`, `id_mobil`, `id_user`, `lokasi_pengambilan`, `tanggal_pengambilan`, `jam_pengambilan`, `tanggal_pengembalian`, `jam_pengembalian`, `status`, `denda`, `total_harga`, `deadline_pembayaran`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 'test1', '2023-12-20', '06:00:00', '2023-12-25', '08:00:00', 'Sudah Dibayar', 0, 1000000, '2023-12-28', '2023-12-19 19:20:27', '2023-12-19 19:21:09'),
(2, 1, 2, 'test2', '2023-12-20', '06:00:00', '2023-12-24', '06:00:00', 'Belum Dibayar', 100000, 900000, '2023-12-27', '2023-12-19 19:21:42', '2023-12-19 19:26:49');

-- --------------------------------------------------------

--
-- Table structure for table `ulasans`
--

CREATE TABLE `ulasans` (
  `id_ulasan` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `rating` varchar(255) NOT NULL,
  `ulasan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ulasans`
--

INSERT INTO `ulasans` (`id_ulasan`, `id_user`, `tanggal`, `rating`, `ulasan`, `created_at`, `updated_at`) VALUES
(1, 2, '2021-01-01', 'Cukup', 'Pelayanan cukup baik, tapi mobilnya kurang bagus', '2020-12-31 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `verify_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `photo`, `role`, `status`, `nama`, `username`, `email`, `password`, `alamat`, `no_telp`, `verify_key`) VALUES
(1, NULL, 'admin', 1, 'admin', 'admin123', 'a@gmail.com', '$2y$10$JP8cT2zOoTeWuPpKyYODYuygJa1kaehAncMT4lYP63aoNlXJ4Oxti', 'jl. a', '081', '22aa'),
(2, 'stDPJvnn7S6A64RXRZNk1FN7JrWqH9SOf7Rovdm5.jpg', 'customer', 1, 'c', 'c', 'c@gmail.com', '$2y$10$yKHIFFIoyJ7igY45CDX/A.gIY0FCEN2Yme94SB7P/HR7296bGwjfK', 'jl. c', '081', '22aa');

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobils`
--
ALTER TABLE `mobils`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rental_transaksis`
--
ALTER TABLE `rental_transaksis`
  ADD PRIMARY KEY (`id_rental_transaksi`),
  ADD KEY `rental_transaksis_id_mobil_foreign` (`id_mobil`),
  ADD KEY `rental_transaksis_id_user_foreign` (`id_user`);

--
-- Indexes for table `ulasans`
--
ALTER TABLE `ulasans`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `ulasans_id_user_foreign` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mobils`
--
ALTER TABLE `mobils`
  MODIFY `id_mobil` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rental_transaksis`
--
ALTER TABLE `rental_transaksis`
  MODIFY `id_rental_transaksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ulasans`
--
ALTER TABLE `ulasans`
  MODIFY `id_ulasan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rental_transaksis`
--
ALTER TABLE `rental_transaksis`
  ADD CONSTRAINT `rental_transaksis_id_mobil_foreign` FOREIGN KEY (`id_mobil`) REFERENCES `mobils` (`id_mobil`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rental_transaksis_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ulasans`
--
ALTER TABLE `ulasans`
  ADD CONSTRAINT `ulasans_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
