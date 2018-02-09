-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2018 at 06:04 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buku`
--

-- --------------------------------------------------------

--
-- Table structure for table `bukus`
--

CREATE TABLE `bukus` (
  `id` int(11) NOT NULL,
  `buku` varchar(100) NOT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bukus`
--

INSERT INTO `bukus` (`id`, `buku`, `photo`, `created_at`, `updated_at`) VALUES
(2, 'Matematika', NULL, '2018-02-03 17:22:53', '2018-02-03 17:22:53'),
(3, 'irkham', NULL, '2018-02-03 17:26:28', '2018-02-03 17:26:28'),
(4, 'Buku', 'larabuku786806530.jpg', '2018-02-03 17:31:57', '2018-02-03 17:31:57'),
(5, 'korea', NULL, '2018-02-03 20:08:47', '2018-02-03 20:08:47'),
(6, 'Dilan', NULL, '2018-02-04 01:53:42', '2018-02-04 01:53:42'),
(7, 'Melia', NULL, '2018-02-04 01:53:56', '2018-02-04 01:53:56'),
(8, 'Matematika', 'larabuku225638565.jpg', '2018-02-05 17:38:56', '2018-02-05 17:38:56');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','activated') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `level`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(15, 'Yuslup', 'yusufbachtiar@gmail.com', '$2y$10$tfSeV/RwogsOcJobRwVV9OAPDGZ61yFrxumJqVP6.k8W0ll7Cuq9S', '2', 'avfYDBv8wN3cYNNcrK2iurAvkH85QH39HsqYyGgWGylo5IcjOmNreshtrD4T', 'activated', '2018-02-04 01:57:30', '2018-02-04 17:53:35'),
(51, 'faleh jamaluddin', 'falehjamaluddin@gmail.com', '$2y$10$591Lxtw/AiITK2fjNGDNM.4sgxgH352Z5zx1OWzXOlOoqNXr0NRn2', '2', 'H2QAU5O8GaNU6T4Jm0yzaIycdPzc0bb3bXOqbqXbajY1fHva3E7LSOpVQSmo', 'activated', '2018-02-07 19:46:59', '2018-02-07 19:47:21'),
(52, 'lutfi alkavasany', 'lutfimochamad442@gmail.com', '$2y$10$hPRCAeTjTLC6xv2lFFohNujnVzM1ob8jZdGowQxzfX/OtZvioeZL2', '2', '6Lp5WcruJv43QAP4gzmHMLuM5HpPhfwV3mnGp2CPBZPuxwNADlD9J61WAVMd', 'pending', '2018-02-08 08:34:54', '2018-02-08 09:47:59'),
(947586745, 'admin', 'admin@admin.com', '$2y$10$nRyW1F3EhWNANMKUVhNase8KCLpCR1PBgZRaM/nKVvjX5Gubg3xeq', '1', 'zyiQr4dTPdvXgiARsQQN4GSOo1c9xcFfnPd1cukmXVlriNFE0sJ7drDWw87B', 'pending', '2018-02-08 08:37:12', '2018-02-08 09:42:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bukus`
--
ALTER TABLE `bukus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bukus`
--
ALTER TABLE `bukus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=947586746;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
