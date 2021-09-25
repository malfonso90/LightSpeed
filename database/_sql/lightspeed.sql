-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 25, 2021 at 11:00 PM
-- Server version: 8.0.24
-- PHP Version: 7.3.29-to-be-removed-in-future-macOS

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lightspeed`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `con_id` int UNSIGNED NOT NULL,
  `con_nombre` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `con_direccion` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `con_distrito` int DEFAULT NULL,
  `con_canton` int DEFAULT NULL,
  `con_provincia` int DEFAULT NULL,
  `con_pais` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT 'CR',
  `con_telefono1` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `con_telefono2` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `con_correo1` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `con_correo2` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `con_website` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `con_facebook` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `con_notas` text COLLATE utf8mb4_unicode_ci,
  `con_estado` int DEFAULT NULL,
  `con_creado` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `con_vencimiento` datetime DEFAULT NULL,
  `con_categoria` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `con_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `con_usu_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`con_id`, `con_nombre`, `con_direccion`, `con_distrito`, `con_canton`, `con_provincia`, `con_pais`, `con_telefono1`, `con_telefono2`, `con_correo1`, `con_correo2`, `con_website`, `con_facebook`, `con_notas`, `con_estado`, `con_creado`, `con_vencimiento`, `con_categoria`, `con_logo`, `con_usu_id`, `created_at`, `updated_at`) VALUES
(5, 'LightSpeed Voice', '123 Main Street', 11802, 118, 1, 'US', '40017887', '', 'info@lightspeed.com', '', 'http://www.lightspeedvoice.com/', NULL, '', 1, '2018-11-23 23:04:17', '2100-12-31 00:00:00', '1', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `mensajes`
--

CREATE TABLE `mensajes` (
  `men_id` int UNSIGNED NOT NULL,
  `men_envia` int NOT NULL,
  `men_recibe` int NOT NULL,
  `men_creado` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `men_notas` text COLLATE utf8mb4_unicode_ci,
  `men_leido` int DEFAULT '0',
  `men_subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `men_envia_del` int DEFAULT NULL,
  `men_recibe_del` int DEFAULT NULL,
  `men_reply_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_06_19_025217_create_notificaciones_table', 1),
(6, '2021_06_19_034720_create_mensajes_table', 1),
(7, '2021_09_14_142852_create_usuarios_table', 1),
(8, '2021_09_14_145934_create_companies_table', 1),
(9, '2021_09_22_223609_create_projects_table', 2),
(10, '2021_09_22_225244_create_tasks_table', 3),
(11, '2021_09_24_141524_create_tests_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `notificaciones`
--

CREATE TABLE `notificaciones` (
  `not_id` int UNSIGNED NOT NULL,
  `not_recibe` int NOT NULL,
  `not_creado` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `not_subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `not_notas` text COLLATE utf8mb4_unicode_ci,
  `not_leido` int DEFAULT '0',
  `not_del` int DEFAULT NULL,
  `not_tipo` int DEFAULT NULL,
  `not_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `pro_id` int UNSIGNED NOT NULL,
  `pro_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_usu_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`pro_id`, `pro_name`, `pro_usu_id`, `created_at`, `updated_at`) VALUES
(1, 'E-Commerce Website', '1,3', NULL, NULL),
(2, 'Websocket Updates', '2', NULL, NULL),
(3, 'Angular Upgrade', '2,4', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `tas_id` int UNSIGNED NOT NULL,
  `tas_usu_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tas_pro_id` int NOT NULL,
  `tas_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tas_hours` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`tas_id`, `tas_usu_id`, `tas_pro_id`, `tas_name`, `tas_hours`, `created_at`, `updated_at`) VALUES
(1, '1', 1, 'Product Pages', 5, NULL, NULL),
(2, '3', 1, 'Shopping Cart', 10, NULL, NULL),
(3, '1', 1, 'My Account', 5, NULL, NULL),
(4, '2', 2, 'Add to Socket IO', 2, NULL, NULL),
(5, '2', 2, 'Enable Broadcasting', 5, NULL, NULL),
(6, '2', 2, 'Adjust INterface', 3, NULL, NULL),
(7, '4', 3, 'Upgrade Angular', 15, NULL, NULL),
(8, '2', 3, 'Fix Broken Things', 10, NULL, NULL),
(9, '4', 3, 'Test', 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `tas_id` int UNSIGNED NOT NULL,
  `tas_usu_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tas_pro_id` int NOT NULL,
  `tas_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tas_hours` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`tas_id`, `tas_usu_id`, `tas_pro_id`, `tas_name`, `tas_hours`, `created_at`, `updated_at`) VALUES
(1, '70', 12, 'Laurence Schiller', 20, '2021-09-25 01:53:55', '2021-09-25 01:53:55'),
(2, '53', 73, 'Prof. Everett Fahey Jr.', 26, '2021-09-25 01:53:55', '2021-09-25 01:53:55'),
(3, '47', 93, 'Mariam Rippin', 73, '2021-09-25 01:53:55', '2021-09-25 01:53:55'),
(4, '61', 11, 'Stephania Shields', 40, '2021-09-25 01:53:55', '2021-09-25 01:53:55'),
(5, '74', 81, 'Davion Jaskolski', 95, '2021-09-25 01:53:55', '2021-09-25 01:53:55'),
(6, '24', 56, 'Mrs. Sasha Prohaska Sr.', 54, '2021-09-25 01:53:55', '2021-09-25 01:53:55'),
(7, '21', 17, 'Abbigail Ullrich', 31, '2021-09-25 01:53:55', '2021-09-25 01:53:55'),
(8, '41', 12, 'Dortha Kiehn', 69, '2021-09-25 01:53:55', '2021-09-25 01:53:55'),
(9, '77', 39, 'Shyann Beahan', 28, '2021-09-25 01:53:55', '2021-09-25 01:53:55'),
(10, '04', 97, 'Jennifer Purdy', 96, '2021-09-25 01:53:55', '2021-09-25 01:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `usu_id` int UNSIGNED NOT NULL,
  `usu_pnombre` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usu_snombre` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usu_papellido` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usu_sapellido` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usu_correo` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usu_telefono` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usu_contrasena` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usu_estado` int DEFAULT NULL,
  `usu_fcreado` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `usu_foto` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usu_sexo` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usu_tipo` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usu_company` int DEFAULT NULL,
  `usu_role` int DEFAULT NULL,
  `usu_vence` datetime DEFAULT NULL,
  `usu_master` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`usu_id`, `usu_pnombre`, `usu_snombre`, `usu_papellido`, `usu_sapellido`, `usu_correo`, `usu_telefono`, `usu_contrasena`, `usu_estado`, `usu_fcreado`, `usu_foto`, `usu_sexo`, `usu_tipo`, `usu_company`, `usu_role`, `usu_vence`, `usu_master`, `created_at`, `updated_at`) VALUES
(1, 'Adam', NULL, NULL, '', 'adam@lightspeed.com', '12345678', 'SElQdExqRXgxZTY2ZGdGQXY1MGp5dz09', 1, '2021-09-22 12:02:42', '/../Usuarios/fotos/5.jpg', '1', 'con', 5, 0, '2099-02-28 00:00:00', 1, NULL, NULL),
(2, 'Stuart', NULL, NULL, NULL, 'stuart@lightspeed.com', '12345678', 'SElQdExqRXgxZTY2ZGdGQXY1MGp5dz09', 1, '2021-09-22 12:02:42', '/../Usuarios/fotos/1.jpg', '1', 'con', 5, 0, '2099-02-28 00:00:00', 1, NULL, NULL),
(3, 'Tyler', NULL, NULL, NULL, 'tyler@lightspeed.com', '12345678', 'SElQdExqRXgxZTY2ZGdGQXY1MGp5dz09', 1, '2021-09-22 12:02:42', '/../Usuarios/fotos/10.jpg', '1', 'con', 5, 0, '2099-02-28 00:00:00', 1, NULL, NULL),
(4, 'Lan', NULL, NULL, NULL, 'lan@lightspeed.com', '12345678', 'SElQdExqRXgxZTY2ZGdGQXY1MGp5dz09', 1, '2021-09-22 12:02:42', '/../Usuarios/fotos/17.jpg', '1', 'con', 5, 0, '2099-02-28 00:00:00', 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`men_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`not_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`tas_id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`tas_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usu_id`),
  ADD UNIQUE KEY `usuarios_usu_correo_unique` (`usu_correo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `con_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `men_id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `not_id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `pro_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `tas_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `tas_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usu_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
