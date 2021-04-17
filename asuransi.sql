-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2021 at 03:54 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rendy`
--

-- --------------------------------------------------------

--
-- Table structure for table `criterias`
--

CREATE TABLE `criterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot` double(8,4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criterias`
--

INSERT INTO `criterias` (`id`, `nama`, `tipe`, `bobot`, `created_at`, `updated_at`) VALUES
(1, 'Tinggi Badan', 'Benefit', 0.0358, NULL, '2021-03-02 14:50:22'),
(2, 'Berat Badan', 'Benefit', 0.0411, NULL, '2021-03-02 14:50:22'),
(3, 'Usia', 'COST', 0.1290, NULL, '2021-03-02 14:50:22'),
(4, 'Pendapatan', 'Benefit', 0.0639, NULL, '2021-03-02 14:50:22'),
(5, 'Pengeluaran', 'Benefit', 0.1702, NULL, '2021-03-02 14:50:22'),
(6, 'Pekerjaan', 'Benefit', 0.1187, NULL, '2021-03-02 14:50:22'),
(7, 'Riwayat Penyakit Kronis', 'Benefit', 0.2210, NULL, '2021-03-02 14:50:22'),
(8, 'Jenis Kelamin', 'Benefit', 0.0565, NULL, '2021-03-02 14:50:22'),
(9, 'Status Perkawinan', 'Benefit', 0.0843, NULL, '2021-03-02 14:50:22'),
(10, 'Merokok', 'Benefit', 0.0796, NULL, '2021-03-02 14:50:22');

-- --------------------------------------------------------

--
-- Table structure for table `detail_produks`
--

CREATE TABLE `detail_produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `criterias_id` bigint(20) UNSIGNED NOT NULL,
  `products_id` bigint(20) UNSIGNED NOT NULL,
  `pembanding` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_produks`
--

INSERT INTO `detail_produks` (`id`, `criterias_id`, `products_id`, `pembanding`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '<150', 2, '2021-03-02 13:27:09', '2021-03-02 13:27:09'),
(2, 1, 1, '<170', 3, '2021-03-02 13:27:09', '2021-03-02 13:27:09'),
(3, 1, 1, '>170', 4, '2021-03-02 13:27:09', '2021-03-02 13:27:09'),
(4, 2, 1, '<40', 4, '2021-03-02 13:27:09', '2021-03-02 13:27:09'),
(5, 2, 1, '<70', 3, '2021-03-02 13:27:09', '2021-03-02 13:27:09'),
(6, 2, 1, '>70', 2, '2021-03-02 13:27:09', '2021-03-02 13:27:09'),
(7, 3, 1, '<15', 1, '2021-03-02 13:27:09', '2021-03-02 13:27:09'),
(8, 3, 1, '<25', 2, '2021-03-02 13:27:09', '2021-03-02 13:27:09'),
(9, 3, 1, '<35', 3, '2021-03-02 13:27:09', '2021-03-02 13:27:09'),
(10, 3, 1, '<65', 4, '2021-03-02 13:27:09', '2021-03-02 13:27:09'),
(11, 3, 1, '>=65', 5, '2021-03-02 13:27:09', '2021-03-02 13:27:09'),
(12, 4, 1, '<1000000', 5, '2021-03-02 13:27:09', '2021-03-02 13:27:09'),
(13, 4, 1, '<3000000', 4, '2021-03-02 13:27:09', '2021-03-02 13:27:09'),
(14, 4, 1, '<7000000', 3, '2021-03-02 13:27:09', '2021-03-02 13:27:09'),
(15, 4, 1, '<15000000', 2, '2021-03-02 13:27:09', '2021-03-02 13:27:09'),
(16, 4, 1, '>=15000000', 1, '2021-03-02 13:27:09', '2021-03-02 13:27:09'),
(17, 5, 1, '<1000000', 5, '2021-03-02 13:27:09', '2021-03-02 13:27:09'),
(18, 5, 1, '<5000000', 4, '2021-03-02 13:27:09', '2021-03-02 13:27:09'),
(19, 5, 1, '<7000000', 3, '2021-03-02 13:27:09', '2021-03-02 13:27:09'),
(20, 5, 1, '<15000000', 2, '2021-03-02 13:27:09', '2021-03-02 13:27:09'),
(21, 5, 1, '>=15000000', 1, '2021-03-02 13:27:09', '2021-03-02 13:27:09'),
(22, 6, 1, 'profesional', 5, '2021-03-02 13:27:09', '2021-03-02 13:27:09'),
(23, 6, 1, 'karyawan', 5, '2021-03-02 13:27:09', '2021-03-02 13:27:09'),
(24, 6, 1, 'wiraswasta', 3, '2021-03-02 13:27:09', '2021-03-02 13:27:09'),
(25, 6, 1, 'pelajar', 4, '2021-03-02 13:27:09', '2021-03-02 13:27:09'),
(26, 6, 1, 'pns', 4, '2021-03-02 13:27:09', '2021-03-02 13:27:09'),
(27, 7, 1, 'tidak ada', 0, '2021-03-02 13:27:09', '2021-03-02 13:27:09'),
(28, 7, 1, 'ada', 2, '2021-03-02 13:27:09', '2021-03-02 13:27:09'),
(29, 8, 1, 'laki laki', 1, '2021-03-02 13:27:09', '2021-03-02 13:27:09'),
(30, 8, 1, 'perempuan', 2, '2021-03-02 13:27:09', '2021-03-02 13:27:09'),
(31, 9, 1, 'sudah menikah', 1, '2021-03-02 13:27:09', '2021-03-02 13:27:09'),
(32, 9, 1, 'belum menikah', 0, '2021-03-02 13:27:09', '2021-03-02 13:27:09'),
(33, 10, 1, 'aktif', 1, '2021-03-02 13:27:09', '2021-03-02 13:27:09'),
(34, 10, 1, 'pasif', 0, '2021-03-02 13:27:09', '2021-03-02 13:27:09'),
(35, 1, 2, '<150', 3, '2021-03-02 13:50:20', '2021-03-02 13:50:20'),
(36, 1, 2, '<170', 3, '2021-03-02 13:50:20', '2021-03-02 13:50:20'),
(37, 1, 2, '>170', 3, '2021-03-02 13:50:20', '2021-03-02 13:50:20'),
(38, 2, 2, '<40', 3, '2021-03-02 13:50:20', '2021-03-02 13:50:20'),
(39, 2, 2, '<70', 3, '2021-03-02 13:50:20', '2021-03-02 13:50:20'),
(40, 2, 2, '>70', 3, '2021-03-02 13:50:20', '2021-03-02 13:50:20'),
(41, 3, 2, '<15', 5, '2021-03-02 13:50:20', '2021-03-02 13:50:20'),
(42, 3, 2, '<25', 4, '2021-03-02 13:50:20', '2021-03-02 13:50:20'),
(43, 3, 2, '<35', 3, '2021-03-02 13:50:20', '2021-03-02 13:50:20'),
(44, 3, 2, '<65', 2, '2021-03-02 13:50:20', '2021-03-02 13:50:20'),
(45, 3, 2, '>=65', 1, '2021-03-02 13:50:20', '2021-03-02 13:50:20'),
(46, 4, 2, '<1000000', 2, '2021-03-02 13:50:20', '2021-03-02 13:50:20'),
(47, 4, 2, '<3000000', 4, '2021-03-02 13:50:20', '2021-03-02 13:50:20'),
(48, 4, 2, '<7000000', 5, '2021-03-02 13:50:20', '2021-03-02 13:50:20'),
(49, 4, 2, '<15000000', 3, '2021-03-02 13:50:20', '2021-03-02 13:50:20'),
(50, 4, 2, '>=15000000', 1, '2021-03-02 13:50:20', '2021-03-02 13:50:20'),
(51, 5, 2, '<1000000', 2, '2021-03-02 13:50:20', '2021-03-02 13:50:20'),
(52, 5, 2, '<5000000', 4, '2021-03-02 13:50:20', '2021-03-02 13:50:20'),
(53, 5, 2, '<7000000', 5, '2021-03-02 13:50:20', '2021-03-02 13:50:20'),
(54, 5, 2, '<15000000', 3, '2021-03-02 13:50:20', '2021-03-02 13:50:20'),
(55, 5, 2, '>=15000000', 1, '2021-03-02 13:50:20', '2021-03-02 13:50:20'),
(56, 6, 2, 'profesional', 5, '2021-03-02 13:50:20', '2021-03-02 13:50:20'),
(57, 6, 2, 'karyawan', 5, '2021-03-02 13:50:20', '2021-03-02 13:50:20'),
(58, 6, 2, 'wiraswasta', 4, '2021-03-02 13:50:20', '2021-03-02 13:50:20'),
(59, 6, 2, 'pelajar', 3, '2021-03-02 13:50:20', '2021-03-02 13:50:20'),
(60, 6, 2, 'pns', 4, '2021-03-02 13:50:20', '2021-03-02 13:50:20'),
(61, 7, 2, 'tidak ada', 0, '2021-03-02 13:50:20', '2021-03-02 13:50:20'),
(62, 7, 2, 'ada', 1, '2021-03-02 13:50:20', '2021-03-02 13:50:20'),
(63, 8, 2, 'laki laki', 1, '2021-03-02 13:50:20', '2021-03-02 13:50:20'),
(64, 8, 2, 'perempuan', 2, '2021-03-02 13:50:20', '2021-03-02 13:50:20'),
(65, 9, 2, 'sudah menikah', 1, '2021-03-02 13:50:20', '2021-03-02 13:50:20'),
(66, 9, 2, 'belum menikah', 1, '2021-03-02 13:50:20', '2021-03-02 13:50:20'),
(67, 10, 2, 'aktif', 0, '2021-03-02 13:50:20', '2021-03-02 13:50:20'),
(68, 10, 2, 'pasif', 1, '2021-03-02 13:50:20', '2021-03-02 13:50:20'),
(69, 1, 10, '<150', 4, '2021-03-02 14:14:01', '2021-03-02 14:14:01'),
(70, 1, 10, '<170', 3, '2021-03-02 14:14:01', '2021-03-02 14:14:01'),
(71, 1, 10, '>170', 2, '2021-03-02 14:14:01', '2021-03-02 14:14:01'),
(72, 2, 10, '<40', 2, '2021-03-02 14:14:01', '2021-03-02 14:14:01'),
(73, 2, 10, '<70', 3, '2021-03-02 14:14:01', '2021-03-02 14:14:01'),
(74, 2, 10, '>70', 4, '2021-03-02 14:14:01', '2021-03-02 14:14:01'),
(75, 3, 10, '<15', 1, '2021-03-02 14:14:01', '2021-03-02 14:14:01'),
(76, 3, 10, '<25', 2, '2021-03-02 14:14:01', '2021-03-02 14:14:01'),
(77, 3, 10, '<35', 3, '2021-03-02 14:14:01', '2021-03-02 14:14:01'),
(78, 3, 10, '<65', 4, '2021-03-02 14:14:01', '2021-03-02 14:14:01'),
(79, 3, 10, '>=65', 5, '2021-03-02 14:14:01', '2021-03-02 14:14:01'),
(80, 4, 10, '<1000000', 1, '2021-03-02 14:14:01', '2021-03-02 14:14:01'),
(81, 4, 10, '<3000000', 2, '2021-03-02 14:14:01', '2021-03-02 14:14:01'),
(82, 4, 10, '<7000000', 3, '2021-03-02 14:14:01', '2021-03-02 14:14:01'),
(83, 4, 10, '<15000000', 4, '2021-03-02 14:14:01', '2021-03-02 14:14:01'),
(84, 4, 10, '>=15000000', 5, '2021-03-02 14:14:01', '2021-03-02 14:14:01'),
(85, 5, 10, '<1000000', 1, '2021-03-02 14:14:01', '2021-03-02 14:14:01'),
(86, 5, 10, '<5000000', 2, '2021-03-02 14:14:01', '2021-03-02 14:14:01'),
(87, 5, 10, '<7000000', 3, '2021-03-02 14:14:01', '2021-03-02 14:14:01'),
(88, 5, 10, '<15000000', 4, '2021-03-02 14:14:01', '2021-03-02 14:14:01'),
(89, 5, 10, '>=15000000', 5, '2021-03-02 14:14:01', '2021-03-02 14:14:01'),
(90, 6, 10, 'profesional', 5, '2021-03-02 14:14:01', '2021-03-02 14:14:01'),
(91, 6, 10, 'karyawan', 2, '2021-03-02 14:14:01', '2021-03-02 14:14:01'),
(92, 6, 10, 'wiraswasta', 5, '2021-03-02 14:14:01', '2021-03-02 14:14:01'),
(93, 6, 10, 'pelajar', 0, '2021-03-02 14:14:01', '2021-03-02 14:14:01'),
(94, 6, 10, 'pns', 1, '2021-03-02 14:14:01', '2021-03-02 14:14:01'),
(95, 7, 10, 'tidak ada', 0, '2021-03-02 14:14:01', '2021-03-02 14:14:01'),
(96, 7, 10, 'ada', 1, '2021-03-02 14:14:01', '2021-03-02 14:14:01'),
(97, 8, 10, 'laki laki', 1, '2021-03-02 14:14:01', '2021-03-02 14:14:01'),
(98, 8, 10, 'perempuan', 2, '2021-03-02 14:14:01', '2021-03-02 14:14:01'),
(99, 9, 10, 'sudah menikah', 1, '2021-03-02 14:14:01', '2021-03-02 14:14:01'),
(100, 9, 10, 'belum menikah', 0, '2021-03-02 14:14:01', '2021-03-02 14:14:01'),
(101, 10, 10, 'aktif', 3, '2021-03-02 14:14:01', '2021-03-02 14:14:01'),
(102, 10, 10, 'pasif', 0, '2021-03-02 14:14:01', '2021-03-02 14:14:01');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_02_08_062052_create_products_table', 1),
(5, '2021_02_09_052002_create_criterias_table', 1),
(6, '2021_02_10_053019_create_perbandingan_kriterias_table', 1),
(7, '2021_03_02_094727_create_detail_produks_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perbandingan_kriterias`
--

CREATE TABLE `perbandingan_kriterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kriteria1_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria2_id` bigint(20) UNSIGNED NOT NULL,
  `nilai` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perbandingan_kriterias`
--

INSERT INTO `perbandingan_kriterias` (`id`, `kriteria1_id`, `kriteria2_id`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1.00, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(2, 1, 2, 0.50, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(3, 1, 3, 0.33, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(4, 1, 4, 0.33, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(5, 1, 5, 0.33, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(6, 1, 6, 0.33, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(7, 1, 7, 0.33, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(8, 1, 8, 0.50, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(9, 1, 9, 0.50, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(10, 1, 10, 0.33, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(11, 2, 1, 2.00, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(12, 2, 2, 1.00, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(13, 2, 3, 0.33, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(14, 2, 4, 0.33, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(15, 2, 5, 0.33, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(16, 2, 6, 0.33, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(17, 2, 7, 0.33, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(18, 2, 8, 0.50, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(19, 2, 9, 0.50, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(20, 2, 10, 0.33, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(21, 3, 1, 3.00, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(22, 3, 2, 3.00, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(23, 3, 3, 1.00, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(24, 3, 4, 0.50, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(25, 3, 5, 0.50, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(26, 3, 6, 3.00, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(27, 3, 7, 0.33, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(28, 3, 8, 3.00, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(29, 3, 9, 3.00, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(30, 3, 10, 3.00, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(31, 4, 1, 3.00, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(32, 4, 2, 3.00, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(33, 4, 3, 2.00, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(34, 4, 4, 1.00, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(35, 4, 5, 0.50, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(36, 4, 6, 0.33, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(37, 4, 7, 0.50, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(38, 4, 8, 0.33, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(39, 4, 9, 0.33, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(40, 4, 10, 0.33, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(41, 5, 1, 3.00, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(42, 5, 2, 3.00, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(43, 5, 3, 2.00, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(44, 5, 4, 2.00, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(45, 5, 5, 1.00, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(46, 5, 6, 3.00, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(47, 5, 7, 0.33, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(48, 5, 8, 3.00, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(49, 5, 9, 3.00, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(50, 5, 10, 3.00, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(51, 6, 1, 3.00, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(52, 6, 2, 3.00, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(53, 6, 3, 0.33, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(54, 6, 4, 3.00, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(55, 6, 5, 0.33, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(56, 6, 6, 1.00, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(57, 6, 7, 0.33, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(58, 6, 8, 3.00, '2021-03-02 14:50:20', '2021-03-02 14:50:20'),
(59, 6, 9, 3.00, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(60, 6, 10, 3.00, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(61, 7, 1, 3.00, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(62, 7, 2, 3.00, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(63, 7, 3, 3.00, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(64, 7, 4, 2.00, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(65, 7, 5, 3.00, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(66, 7, 6, 3.00, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(67, 7, 7, 1.00, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(68, 7, 8, 3.00, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(69, 7, 9, 3.00, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(70, 7, 10, 3.00, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(71, 8, 1, 2.00, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(72, 8, 2, 2.00, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(73, 8, 3, 0.33, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(74, 8, 4, 3.00, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(75, 8, 5, 0.33, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(76, 8, 6, 0.33, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(77, 8, 7, 0.33, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(78, 8, 8, 1.00, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(79, 8, 9, 0.33, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(80, 8, 10, 0.33, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(81, 9, 1, 2.00, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(82, 9, 2, 2.00, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(83, 9, 3, 0.33, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(84, 9, 4, 3.00, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(85, 9, 5, 0.33, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(86, 9, 6, 0.33, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(87, 9, 7, 0.33, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(88, 9, 8, 3.00, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(89, 9, 9, 1.00, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(90, 9, 10, 2.00, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(91, 10, 1, 3.00, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(92, 10, 2, 3.00, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(93, 10, 3, 0.33, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(94, 10, 4, 3.00, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(95, 10, 5, 0.33, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(96, 10, 6, 0.33, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(97, 10, 7, 0.33, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(98, 10, 8, 3.00, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(99, 10, 9, 0.50, '2021-03-02 14:50:21', '2021-03-02 14:50:21'),
(100, 10, 10, 1.00, '2021-03-02 14:50:21', '2021-03-02 14:50:21');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `nama`, `slug`, `deskripsi`, `cover`, `created_at`, `updated_at`) VALUES
(1, 'AIA CRITICAL PROTECTION', 'aia-critical-protection-1', 'A1', '', NULL, '2021-03-02 14:01:56'),
(2, 'AIA PROLINK ASSURANCE', 'aia-prolink-assurance', 'A2', '', NULL, '2021-03-02 14:02:29'),
(3, 'AIA POWERPRO LIFE', 'aia-powerpro-life', 'A3', '', NULL, '2021-03-02 14:02:50'),
(4, 'AIA PROTEKSI PRIMA PLUS', 'aia-proteksi-prima-plus-1', 'A4', 'product-cover-1614693640.jpg', '2021-03-02 14:00:40', '2021-03-02 14:03:15'),
(5, 'AIA PROTECTION INCOME PLAN', 'aia-protection-income-plan', 'A5', 'product-cover-1614693696.jpg', '2021-03-02 14:01:36', '2021-03-02 14:01:36'),
(6, 'AIA PROLINK PLATINUM ASSURANCE', 'aia-prolink-platinum-assurance', 'A6', 'product-cover-1614693831.jpg', '2021-03-02 14:03:51', '2021-03-02 14:04:14'),
(7, 'AIA PROTERM PROTECTION', 'aia-proterm-protection', 'A7', 'product-cover-1614693877.jpg', '2021-03-02 14:04:37', '2021-03-02 14:04:37'),
(8, 'AIA PRIORITY PLUS ASSURANCE', 'aia-priority-plus-assurance', 'A8', 'product-cover-1614693901.jpg', '2021-03-02 14:05:01', '2021-03-02 14:05:01'),
(9, 'AIA INFINITE PLUS ASSURANCE', 'aia-infinite-plus-assurance', 'A9', 'product-cover-1614693920.jpg', '2021-03-02 14:05:20', '2021-03-02 14:05:20'),
(10, 'AIA INFINITE LINK ASSURANCE', 'aia-infinite-link-assurance', 'A10', 'product-cover-1614693978.jpg', '2021-03-02 14:06:18', '2021-03-02 14:06:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', 'admin', NULL, '$2y$10$blDrSZFW91H66ZJRx9/6zO0Bv6k3iobgfdBj3tUoaOPuKyQY40kmC', NULL, NULL, NULL),
(2, 'Daus', 'dauzic99@gmail.com', 'customer', NULL, '$2y$10$4oQMv5xcIiCJIxhK5cz.ruHOryX1xoGVnqHEfasczwfQ.otprwRDO', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `criterias`
--
ALTER TABLE `criterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_produks`
--
ALTER TABLE `detail_produks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_produks_criterias_id_foreign` (`criterias_id`),
  ADD KEY `detail_produks_products_id_foreign` (`products_id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `perbandingan_kriterias`
--
ALTER TABLE `perbandingan_kriterias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perbandingan_kriterias_kriteria1_id_foreign` (`kriteria1_id`),
  ADD KEY `perbandingan_kriterias_kriteria2_id_foreign` (`kriteria2_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `criterias`
--
ALTER TABLE `criterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `detail_produks`
--
ALTER TABLE `detail_produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `perbandingan_kriterias`
--
ALTER TABLE `perbandingan_kriterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_produks`
--
ALTER TABLE `detail_produks`
  ADD CONSTRAINT `detail_produks_criterias_id_foreign` FOREIGN KEY (`criterias_id`) REFERENCES `criterias` (`id`),
  ADD CONSTRAINT `detail_produks_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `perbandingan_kriterias`
--
ALTER TABLE `perbandingan_kriterias`
  ADD CONSTRAINT `perbandingan_kriterias_kriteria1_id_foreign` FOREIGN KEY (`kriteria1_id`) REFERENCES `criterias` (`id`),
  ADD CONSTRAINT `perbandingan_kriterias_kriteria2_id_foreign` FOREIGN KEY (`kriteria2_id`) REFERENCES `criterias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
