-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-09-2023 a las 19:49:36
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `eduproject`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `names` varchar(255) NOT NULL,
  `lastnames` varchar(255) NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT 1,
  `phone_number` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `names`, `lastnames`, `state`, `phone_number`, `img`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Alexander', 'Florido', 1, '79374484', NULL, 'test@gmail.com', NULL, '$2y$10$bw.oZf.alShEHc.kte2uTOeOJqqdpK82Bta5dCeYUWnQFg.1kB7/6', NULL, '2023-04-27 01:43:21', '2023-04-27 01:43:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` longtext NOT NULL,
  `tipo_curso` varchar(255) NOT NULL,
  `max_personas` int(11) NOT NULL,
  `costo` double(8,2) NOT NULL,
  `duracion` int(11) NOT NULL,
  `unidad_duracion` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `titulo`, `descripcion`, `tipo_curso`, `max_personas`, `costo`, `duracion`, `unidad_duracion`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Semiario de Informatica I', 'Seminario de Prueba', 'seminario', 20, 120.00, 3, 'Días', NULL, '2023-04-28 00:07:04', '2023-04-28 00:07:04'),
(2, 'Taller de Informatica', 'Taller de ejemplo mucho mas largo para poder probar los elementos en el html', 'taller', 20, 50.00, 2, 'Meses', NULL, '2023-05-03 06:37:49', '2023-05-03 06:37:49'),
(3, 'Capacitacion de prueba', 'asdasdasd', 'capacitacion', 12, 45.00, 2, 'Años', NULL, '2023-05-03 19:53:03', '2023-05-03 19:53:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos_habilitados`
--

CREATE TABLE `cursos_habilitados` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_curso` bigint(20) UNSIGNED NOT NULL,
  `id_docente` bigint(20) UNSIGNED NOT NULL,
  `fecha_habilitacion` date NOT NULL,
  `fecha_culminacion` date NOT NULL,
  `total_inscritos` int(10) DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado` varchar(50) DEFAULT current_timestamp(),
  `dias` varchar(100) DEFAULT NULL,
  `horario` varchar(200) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cursos_habilitados`
--

INSERT INTO `cursos_habilitados` (`id`, `id_curso`, `id_docente`, `fecha_habilitacion`, `fecha_culminacion`, `total_inscritos`, `deleted_at`, `created_at`, `updated_at`, `estado`, `dias`, `horario`, `img`) VALUES
(1, 1, 1, '2023-04-28', '2023-05-01', 0, NULL, '2023-04-28 04:59:48', '2023-04-28 04:59:48', '2', 'lunes,martes', '08:07 - 09:36,08:07 - 09:36,08:07 - 09:36', 'Qg1xJMiSacIeKAEHOa47gYaOVok3WMp3uXtv8Mze.jpg'),
(3, 1, 1, '2023-05-02', '2023-05-05', 0, NULL, '2023-05-03 00:32:43', '2023-05-03 00:32:43', '1', 'martes,jueves,sabado', '08:07 - 09:36,08:07 - 09:36,08:07 - 09:36', 'Qg1xJMiSacIeKAEHOa47gYaOVok3WMp3uXtv8Mze.jpg'),
(4, 1, 1, '2023-05-03', '2023-05-06', 0, NULL, '2023-05-03 02:15:49', '2023-05-03 02:15:49', '1', 'lunes,martes', '08:07 - 09:36,08:07 - 09:36,08:07 - 09:36', 'j20rJu3WxqGcKMzPs7oWAuDo14yieYtq8Q5LUB61.jpg'),
(5, 2, 1, '2023-05-03', '2023-05-06', 0, NULL, '2023-05-03 06:50:37', '2023-05-03 06:50:37', '1', 'lunes,martes', '08:07 - 09:36,08:07 - 09:36,08:07 - 09:36', 'HRwr66Wq7Fh8S0cW8kPMQ2LiyeD5R0U658xQUVAj.jpg'),
(6, 3, 1, '2023-06-03', '2023-06-06', 0, NULL, '2023-05-03 19:58:01', '2023-05-03 19:58:01', '0', 'martes,jueves,sabado', '08:07 - 09:36,08:07 - 09:36,08:07 - 09:36', '6WHVMoIpPnvicVulIxeNmrD7KXmNJ5dAicxkuWFg.png'),
(7, 1, 1, '2023-07-07', '2023-07-10', 0, NULL, '2023-07-08 01:39:01', '2023-07-08 01:39:01', '0', 'lunes,martes', '02:58,02:58', 'ly7a2Rl5Nsok5UyVboK3Z4NXRSC8oEvGRCfXDtsI.png'),
(8, 1, 1, '2023-07-11', '2023-07-14', 0, NULL, '2023-07-10 23:33:59', '2023-07-10 23:33:59', '0', 'martes,jueves,sabado', '08:07 - 09:36,08:07 - 09:36,08:07 - 09:36', 'OHUlSRM0fztx2BvLQJi3P98M9kThXqlfqvk2kY7T.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `names` varchar(255) NOT NULL,
  `lastnames` varchar(255) NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT 1,
  `phone_number` varchar(255) NOT NULL,
  `CV` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `degree_lv` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `ci` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id`, `names`, `lastnames`, `state`, `phone_number`, `CV`, `img`, `degree_lv`, `birthdate`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `ci`) VALUES
(1, 'Alexander', 'Florido Docente', 1, '79374484', '5299072.pdf', '5299072.jpg', 'Magister en Nada', '1997-09-08', 'alexanderruslan@hotmail.com', NULL, '$2y$10$18iFiXkqA/7eVk568aN85ezjLs1aiTv3Nyx/PSWjyREQHNZqROrtm', NULL, '2023-04-28 00:09:37', '2023-04-28 00:09:37', NULL, 5299072);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `names` varchar(255) NOT NULL,
  `lastnames` varchar(255) NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT 1,
  `phone_number` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `names`, `lastnames`, `state`, `phone_number`, `birthdate`, `img`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `address`) VALUES
(1, 'Gregorian', 'Quiroga', 1, '79374484', '1997-09-08', NULL, 'alexanderruslan@hotmail.com', NULL, '$2y$10$x9GB7JCDHdUJmM7FONxMDelX6KL0DlGmEvEjQlycM47fZVPgf8Lxq', NULL, '2023-05-09 02:00:50', '2023-05-09 02:00:50', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes_inscritos`
--

CREATE TABLE `estudiantes_inscritos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_ch` bigint(20) UNSIGNED NOT NULL,
  `id_est` bigint(20) UNSIGNED NOT NULL,
  `fecha_inscripcion` date NOT NULL,
  `monto_pagado` float NOT NULL DEFAULT 0,
  `comprobante` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estudiantes_inscritos`
--

INSERT INTO `estudiantes_inscritos` (`id`, `id_ch`, `id_est`, `fecha_inscripcion`, `monto_pagado`, `comprobante`, `deleted_at`, `created_at`, `updated_at`) VALUES
(7, 1, 1, '2023-07-03', 7.24, NULL, NULL, '2023-07-04 00:13:47', '2023-07-04 00:13:47'),
(8, 6, 1, '2023-07-03', 6.52, NULL, NULL, '2023-07-04 00:20:16', '2023-07-04 00:20:16'),
(9, 4, 1, '2023-07-03', 17.39, NULL, NULL, '2023-07-04 00:20:50', '2023-07-04 00:20:50'),
(10, 7, 1, '2023-07-07', 17.34, NULL, NULL, '2023-07-08 01:41:27', '2023-07-08 01:41:27'),
(11, 8, 1, '2023-07-10', 17.39, NULL, NULL, '2023-07-10 23:34:54', '2023-07-10 23:34:54'),
(12, 5, 1, '2023-08-01', 7.21, NULL, NULL, '2023-08-01 06:54:55', '2023-08-01 06:54:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
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
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(16, '2023_03_24_222222_create_table_cursos', 6),
(19, '2014_10_12_000000_create_users_table', 7),
(20, '2014_10_12_100000_create_password_resets_table', 7),
(21, '2019_08_19_000000_create_failed_jobs_table', 7),
(22, '2019_12_14_000001_create_personal_access_tokens_table', 7),
(23, '2023_03_14_215407_create_table_estudiantes', 7),
(24, '2023_03_14_215603_create_docentes', 7),
(25, '2023_03_14_220134_create_administradores', 7),
(26, '2023_03_21_191402_add_soft_delete_to_estudiantes', 7),
(27, '2023_03_22_152845_add_soft_delete_to_docentes', 8),
(28, '2023_04_03_214528_create_cursos', 8),
(29, '2023_04_26_211113_create_cursos_habilitados_table', 8),
(30, '2023_06_28_205204_create_estudiantes_inscritos_table', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
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
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `names` varchar(255) NOT NULL,
  `lastnames` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `administradores_email_unique` (`email`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cursos_habilitados`
--
ALTER TABLE `cursos_habilitados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cursos_habilitados_curso_id_foreign` (`id_curso`),
  ADD KEY `cursos_habilitados_docente_id_foreign` (`id_docente`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `docentes_email_unique` (`email`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `estudiantes_email_unique` (`email`);

--
-- Indices de la tabla `estudiantes_inscritos`
--
ALTER TABLE `estudiantes_inscritos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estudiantes_inscritos_id_ch_foreign` (`id_ch`),
  ADD KEY `estudiantes_inscritos_id_est_foreign` (`id_est`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cursos_habilitados`
--
ALTER TABLE `cursos_habilitados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estudiantes_inscritos`
--
ALTER TABLE `estudiantes_inscritos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cursos_habilitados`
--
ALTER TABLE `cursos_habilitados`
  ADD CONSTRAINT `cursos_habilitados_curso_id_foreign` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id`),
  ADD CONSTRAINT `cursos_habilitados_docente_id_foreign` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`id`);

--
-- Filtros para la tabla `estudiantes_inscritos`
--
ALTER TABLE `estudiantes_inscritos`
  ADD CONSTRAINT `estudiantes_inscritos_id_ch_foreign` FOREIGN KEY (`id_ch`) REFERENCES `cursos_habilitados` (`id`),
  ADD CONSTRAINT `estudiantes_inscritos_id_est_foreign` FOREIGN KEY (`id_est`) REFERENCES `estudiantes` (`id`);

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `update_CH_estado_encurso` ON SCHEDULE EVERY 1 DAY STARTS '2023-05-03 07:00:38' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE cursos_habilitados as ch SET ch.estado = 1 WHERE NOW() BETWEEN ch.fecha_habilitacion and ch.fecha_culminacion$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
