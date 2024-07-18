-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2024 at 05:35 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `father_id` varchar(500) DEFAULT NULL,
  `name` varchar(500) NOT NULL,
  `description` longtext DEFAULT NULL,
  `price` double DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `t` int(100) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `father_id`, `name`, `description`, `price`, `status`, `t`, `created_at`, `updated_at`) VALUES
(12, NULL, 'خدمات تمريضية', NULL, NULL, 1, 10, '2023-06-05 15:24:11', '2023-07-01 08:29:47'),
(20, NULL, 'العناية بالجروح', 'تساعد العناية الصحيحة بالجروح على حماية الجسم من العدوى ويمكنها تسريع الشفاء .  تطبيق ممرضي في خدمتك وسيكون معك منذ بداية العلاج حتى الوصول الى الشفاء التام وانت في المنزل .', NULL, 1, 8, '2023-06-06 21:19:32', '2023-06-06 21:20:46'),
(21, NULL, 'تحاليل طبية', 'يوفر تطبيق ممرضي سحب جميع انواع العينات من المنزل بوجود كادر طبي متميز .', NULL, 1, 7, '2023-06-07 08:33:33', '2023-07-09 18:56:55'),
(23, NULL, 'قسطره بولية', 'وذلك لضمان راحتك أكثر  تركيب الفولي أصبح اسهل واسرع مع تطبيق ممرضي , وأنت في المنزل نضمن لك تركيب الفولي بدقه وبدون مضاعفات', NULL, 1, 7, '2023-06-08 08:56:15', '2023-06-08 08:57:46'),
(24, NULL, 'حجامة عامة', 'ال', NULL, 1, 4, '2023-07-01 08:47:04', '2023-07-08 11:18:10'),
(28, '20', 'test', '0', 10, 1, 10, '2024-05-17 16:57:58', '2024-05-17 16:57:58');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `father_model` varchar(500) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `father_model`, `status`, `created_at`, `updated_at`) VALUES
('city_0c95b4c4cf6f3ecf10b9566c3fcf62f9__RoyalBoard', 'دهوك', 'countries_23910f78cb5262d4196af5a650acec61__RoyalBoard', 1, '2022-04-03 20:12:45', '2022-04-03 20:12:45'),
('city_0fe980e88a52b723b756508a80740ea8__RoyalBoard', 'النجف', 'countries_23910f78cb5262d4196af5a650acec61__RoyalBoard', 1, '2022-04-03 20:12:45', '2022-04-03 20:12:45'),
('city_15669a8a65252da670174b1c9c7fb555__RoyalBoard', 'كركوك', 'countries_23910f78cb5262d4196af5a650acec61__RoyalBoard', 1, '2022-04-03 20:12:45', '2022-04-03 20:12:45'),
('city_4a6ecc8d15c6e679bdeddc35674aef62__RoyalBoard', 'بغداد', 'countries_23910f78cb5262d4196af5a650acec61__RoyalBoard', 1, '2022-04-03 20:12:45', '2022-04-03 20:12:45'),
('city_5d77fea2fba2f851f2be5a6644aa623d__RoyalBoard', 'بابل', 'countries_23910f78cb5262d4196af5a650acec61__RoyalBoard', 1, '2022-04-03 20:12:45', '2022-04-03 20:12:45'),
('city_6572a7bcdc49a3701d416509eb855afd__RoyalBoard', 'تكريت', 'countries_23910f78cb5262d4196af5a650acec61__RoyalBoard', 1, '2022-04-03 20:12:45', '2022-04-03 20:12:45'),
('city_685b2c7fe95d124ed827c0e1746a6131__RoyalBoard', 'السليمانية', 'countries_23910f78cb5262d4196af5a650acec61__RoyalBoard', 1, '2022-04-03 20:12:45', '2022-04-03 20:12:45'),
('city_7685e1179a269f4f924c86a63aa38337__RoyalBoard', 'اربيل', 'countries_23910f78cb5262d4196af5a650acec61__RoyalBoard', 1, '2022-04-03 20:12:45', '2022-04-03 20:12:45'),
('city_98128dde14187cd59dbf64f37cdc6a4c__RoyalBoard', 'البصرة', 'countries_23910f78cb5262d4196af5a650acec61__RoyalBoard', 1, '2022-04-03 20:12:45', '2022-04-03 20:12:45'),
('city_98eff6e26acea9d5bf58faa411d7256f__RoyalBoard', 'الانبار', 'countries_23910f78cb5262d4196af5a650acec61__RoyalBoard', 1, '2022-04-03 20:12:45', '2022-04-03 20:12:45'),
('city_a24c6f817643309bcc678c4193525ba6__RoyalBoard', 'القادسية', 'countries_23910f78cb5262d4196af5a650acec61__RoyalBoard', 1, '2022-04-03 20:12:45', '2022-04-03 20:12:45'),
('city_b20f49e9190140149c89c8155896009b__RoyalBoard', 'المثنى', 'countries_23910f78cb5262d4196af5a650acec61__RoyalBoard', 1, '2022-04-03 20:12:45', '2022-04-03 20:12:45'),
('city_b249232d02cf7c1aca54e19cbf10c5c5__RoyalBoard', 'واسط', 'countries_23910f78cb5262d4196af5a650acec61__RoyalBoard', 1, '2022-04-03 20:12:45', '2022-04-03 20:12:45'),
('city_bf9a1191037ca6f12e5b58956a318dec__RoyalBoard', 'ذي قار', 'countries_23910f78cb5262d4196af5a650acec61__RoyalBoard', 1, '2022-04-03 20:12:45', '2022-04-03 20:12:45'),
('city_e977388346eab786904e02dcba101eff__RoyalBoard', 'ميسان', 'countries_23910f78cb5262d4196af5a650acec61__RoyalBoard', 1, '2022-04-03 20:12:45', '2022-04-03 20:12:45'),
('city_f7b9cffbc5fa6f3718df5d8e13e8b189__RoyalBoard', 'كربلاء', 'countries_23910f78cb5262d4196af5a650acec61__RoyalBoard', 1, '2022-04-03 20:12:45', '2022-04-03 20:12:45'),
('city_f7f4d1d5d1cdb1c9a0d3f7af78df586c__RoyalBoard', 'ديالى', 'countries_23910f78cb5262d4196af5a650acec61__RoyalBoard', 1, '2022-04-03 20:12:45', '2022-04-03 20:12:45'),
('city_fc4c890b3ebd19560ba44983fa0a5606__RoyalBoard', 'الموصل', 'countries_23910f78cb5262d4196af5a650acec61__RoyalBoard', 1, '2022-04-03 20:12:45', '2022-04-03 20:12:45');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'العراق', 1, '2022-04-03 07:11:27', '2022-04-03 07:11:27');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `phone` varchar(500) DEFAULT NULL,
  `password` varchar(500) NOT NULL,
  `google_id` varchar(500) DEFAULT NULL,
  `api_token` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL DEFAULT 1,
  `fcm` varchar(500) DEFAULT NULL,
  `notification` int(1) NOT NULL DEFAULT 1,
  `image_url` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `password`, `google_id`, `api_token`, `created_at`, `updated_at`, `status`, `fcm`, `notification`, `image_url`) VALUES
(1, 'اوس راسم جميل', 'test3@gmail.com', '07715623061', '$2y$10$DbSy/FLWM6r9JDbDZSjmk.TDgaHb6FwxXw8ld75vNcpCmkuosAI/2', '', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xOTIuMTY4LjAuMTcyXC9Sb3lhbEpvYlwvcHVibGljXC9TZWNyZXRSb3lhbEZpcnN0ZXJcL2xvZ2luIiwiaWF0IjoxNjQ3NDIxMjM3LCJleHAiOjE2NDc0MjQ4MzcsIm5iZiI6MTY0NzQyMTIzNywianRpIjoiRDE4SVNOTmptUWt1MU9HQSIsInN1YiI6ImN1c3RvbWVyczQzYjUzNTVlMmY5YjFiYjY3NjFjMzM4ZjY2ODE5OTMzX1JveWFsQm9hcmQiLCJwcnYiOiI4MjJkZjIwZWExZjA3NTcwNzEzNTgxYzI3MjI4ZWE0ZGUyZTZlNWFmIn0.URIS2rGgYCaYXBbOTo1TcI7vKQtpySJbgwL0vS6xlW0', '2021-10-17 21:59:23', '2022-03-16 19:00:37', 1, 'dHHCoh0zQK25XrDn9wLeSy:APA91bER_z0HZOTdcDIzMfLSFb1PUMzQrI-mP6L2KvQQ4Nzd3nb1TuvRitINGWpOgB-CZZHAGdIhvvH8M3h3WZnc9haXsgGv6YMuewp28FtC9OGJPZVARFpERkEpwh3zHUKW7JxYEoyy', 1, NULL),
(2, ' محمد راسم جميل', 'test1@gmail.com', '078534234520', '$2y$10$DbSy/FLWM6r9JDbDZSjmk.TDgaHb6FwxXw8ld75vNcpCmkuosAI/2', '', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL215X2dvbGRcL3B1YmxpY1wvUm95YWxGaXJzdGVyXC9sb2dpbiIsImlhdCI6MTY1MDA1MTU0NiwiZXhwIjoxNjUwMDU1MTQ2LCJuYmYiOjE2NTAwNTE1NDYsImp0aSI6ImdJQ1Bzb3pvS0VoajRlVTEiLCJzdWIiOiJjdXN0b21lcnM0M2I1MzVmc2RmZjliMWJiNjc2MWMzMzhmNjY4MTk5MzNfUm95YWxCb2FyZCIsInBydiI6IjUzYTJjYjEyZDZlNTEyZDY3OGRhNGU5YzE0MWE0YWI5MTYxM2E4YjcifQ.OEaon5ZPHhzQ-EWD_6Z7D11YXzlrraRElKV_YuyprsI', '2021-10-17 21:59:23', '2022-04-16 02:39:06', 1, 'dHHCoh0zQK25XrDn9wLeSy:APA91bER_z0HZOTdcDIzMfLSFb1PUMzQrI-mP6L2KvQQ4Nzd3nb1TuvRitINGWpOgB-CZZHAGdIhvvH8M3h3WZnc9haXssdfgGv6YMuewp28FtC9OGJPZVARFpERkEpwh3zHUKW7JxYEoyy', 1, NULL),
(3, 'Azel Mohammed', 'ft47fc@gmail.com', '+9642', '$2y$10$DbSy/FLWM6r9JDbDZSjmk.TDgaHb6FwxXw8ld75vNcpCmkuosAI/2', '', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xOTIuMTY4LjAuMTkwXC9kZXZcL2dlbmVyYWxcL3B1YmxpY1wvUm95YWxGaXJzdGVyXC9sb2dpbiIsImlhdCI6MTcxODA3Mzc2NSwiZXhwIjoxNzE4MDc3MzY1LCJuYmYiOjE3MTgwNzM3NjUsImp0aSI6IklMQldKYnY3WVFldVBhcjYiLCJzdWIiOjMsInBydiI6IjUzYTJjYjEyZDZlNTEyZDY3OGRhNGU5YzE0MWE0YWI5MTYxM2E4YjcifQ.PXjWG1W9MNV7LoN76wsWLU38e2BY5HrJiGvkR8AFMZw', '2022-04-14 04:28:54', '2024-06-10 23:42:45', 1, NULL, 1, 'https://lh3.googleusercontent.com/a-/AOh14GgaSDdX9f3k-WbS0B1RfimvyYoxcKETEbAA98yH=s96-c'),
(10, 'test', NULL, '+9647807832184', '$2y$10$4QsRtiNgyYUs7gGj2qvkx.EZOgImp4l/uWPZqE0Czp647kyqzipHK', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xOTIuMTY4LjAuMTkwXC9kZXZcL2dlbmVyYWxcL3B1YmxpY1wvUm95YWxGaXJzdGVyXC9mb3JnZXQiLCJpYXQiOjE3MTgwNzM5MDYsImV4cCI6MTcxODA3NzUwNiwibmJmIjoxNzE4MDczOTA2LCJqdGkiOiJWblAzS0g4U0FHMkhmc2hpIiwic3ViIjoxMCwicHJ2IjoiNTNhMmNiMTJkNmU1MTJkNjc4ZGE0ZTljMTQxYTRhYjkxNjEzYThiNyJ9.HiY7vYcaxGkhRQz2wwHhuPxcfoS4b63st3Z0HTnCfLI', '2024-06-10 23:43:37', '2024-06-10 23:45:06', 1, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `type` varchar(500) NOT NULL,
  `father_model` varchar(500) NOT NULL,
  `path` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `type`, `father_model`, `path`, `created_at`, `updated_at`) VALUES
(42, 'subcategory', '19', 'image_subcategory_d1c9fef7eb96bbd4a1bf1860a665ca2f.png', '2023-07-02 20:07:24', '2023-07-02 20:07:24'),
(43, 'subcategory', '20', 'image_subcategory_e4a3859150a85a6834337a9e4ae160a5.png', '2023-07-02 20:12:08', '2023-07-02 20:12:08'),
(44, 'subcategory', '17', 'image_subcategory_0d0141fee09e77cb80f8c8fd2b7efe7d.png', '2023-07-02 20:15:08', '2023-07-02 20:15:08'),
(45, 'subcategory', '16', 'image_subcategory_2c7702fa49f003d01a88ae441394f67b.png', '2023-07-02 20:16:57', '2023-07-02 20:16:57'),
(47, 'subcategory', '26', 'image_subcategory_b1064d09d12fb9c75e6f5c6c43cd114f.png', '2023-07-02 20:19:37', '2023-07-02 20:19:37'),
(49, 'subcategory', '25', 'image_subcategory_72fd4ffe299a4f26b76c5f9874fea923.png', '2023-07-02 20:25:27', '2023-07-02 20:25:27'),
(55, 'subcategory', '18', 'image_subcategory_94bcb16513a518c9acca124e644b678d.png', '2023-07-02 20:40:09', '2023-07-02 20:40:09'),
(56, 'subcategory', '23', 'image_subcategory_f42d59fbc67172fd0d384e2b51bcfae8.png', '2023-07-02 20:43:12', '2023-07-02 20:43:12'),
(57, 'subcategory', '27', 'image_subcategory_495cf004b7892d409850fb2f49173d1a.png', '2023-07-02 20:44:14', '2023-07-02 20:44:14'),
(58, 'subcategory', '21', 'image_subcategory_7d21299c3d227e5c8b4fc04ccdd163c5.png', '2023-07-02 20:45:39', '2023-07-02 20:45:39'),
(59, 'subcategory', '12', 'image_subcategory_da60533882e00d41f1d359b5fea89235.png', '2023-07-02 20:46:43', '2023-07-02 20:46:43'),
(62, 'subcategory', '29', 'image_subcategory_f7c2395b1d57859c106616a1ce513455.png', '2023-07-02 20:50:56', '2023-07-02 20:50:56'),
(71, 'category', '23', 'image_category_bdb84626317677cbfa72874de4862042.png', '2023-07-07 21:17:50', '2023-07-07 21:17:50'),
(73, 'subcategory', '15', 'image_subcategory_6cee16374dbfe9bc047458bf85938074.png', '2023-07-07 21:28:16', '2023-07-07 21:28:16'),
(74, 'subcategory', '28', 'image_subcategory_be7e25241cdc15c63c123077e6c8773a.png', '2023-07-07 21:29:27', '2023-07-07 21:29:27'),
(83, 'category', '21', 'image_category_1d0da484eda2dbda643dd80813df2d4f.png', '2023-07-09 19:54:20', '2023-07-09 19:54:20'),
(92, 'category', '24', 'image_category_f203c5ef7fbba2c0810c5bdfb3203094.png', '2023-07-09 23:57:50', '2023-07-09 23:57:50'),
(95, 'category', '20', 'image_category_84a541d8bb7808a1c44e659df584033b.png', '2023-07-10 00:04:10', '2023-07-10 00:04:10'),
(96, 'category', '12', 'image_category_d0c04c893a221673eb5b9f3528cbe419.png', '2023-07-10 00:05:08', '2023-07-10 00:05:08'),
(97, 'category', '28', 'image_category_f46bb1a9d3fdf5e85006c28328dd57e9.jpg', '2024-05-17 16:57:58', '2024-05-17 16:57:58');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `model_type` varchar(150) DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  `title` varchar(300) NOT NULL,
  `body` text DEFAULT NULL,
  `type` varchar(100) NOT NULL,
  `metadata` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `royal_app_debug_monitor`
--

CREATE TABLE `royal_app_debug_monitor` (
  `id` varchar(500) NOT NULL,
  `msg` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `device_info` longtext NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` varchar(700) DEFAULT NULL,
  `creator` varchar(500) NOT NULL,
  `longitude` varchar(500) NOT NULL,
  `latitude` varchar(500) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test1@gmail.com', NULL, '$2y$10$51Og.gbRiagp1bXOghSKMu/t3lLblJf9Mfp7pEQAffZi70z/GxFjO', 'KKZvpPNvS7V5SxvTEeNajk1fE0EXzVaVg2EmtahKRiSJhjHAqcTJuuRcTzfg', '2022-04-02 22:27:08', '2022-04-02 22:27:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `model_type` (`model_type`),
  ADD KEY `model_id` (`model_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `royal_app_debug_monitor`
--
ALTER TABLE `royal_app_debug_monitor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
