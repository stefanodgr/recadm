-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2020 a las 06:48:47
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `recadm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `academiclevels`
--

CREATE TABLE `academiclevels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `academiclevels`
--

INSERT INTO `academiclevels` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Sin Estudios ', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2, 'Bachiller', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(3, 'Técnico Incompleto', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(4, 'Técnico Completo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(5, 'Universitario Imcompleto ', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(6, 'Universitario Completo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(7, 'Doctorado', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(8, 'Postgrado', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(9, 'Maestria', '2020-04-20 01:55:55', '2020-04-20 01:55:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centervotes`
--

CREATE TABLE `centervotes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_id` bigint(20) UNSIGNED NOT NULL,
  `municipio_id` bigint(20) UNSIGNED NOT NULL,
  `parroquia_id` bigint(20) UNSIGNED NOT NULL,
  `circuito_municipio` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_mesas` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `centro_acopio` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remoto` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tecnologia` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estrato` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `muestra` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `centervotes`
--

INSERT INTO `centervotes` (`id`, `codigo`, `descripcion`, `estado_id`, `municipio_id`, `parroquia_id`, `circuito_municipio`, `direccion`, `num_mesas`, `centro_acopio`, `remoto`, `tecnologia`, `estrato`, `muestra`, `users_id`, `status_id`, `created_at`, `updated_at`) VALUES
(1, '55555555', 'SANTA ROSALIA', 1, 101, 10122, 'miguel', 'frnte a liceo santa rosaliagggggg', '443434', '1', '1', 'mauqina 1232323', '512313', '4312313', 1, 1, '2020-05-19 01:06:14', '2020-05-19 01:06:14'),
(2, '5555', 'SANTA CECILIA', 2, 202, 20201, 'miguel', 'Estacion', '443434', '1', '1', 'mauqina 1232323', '512313', '4312313', 1, 1, '2020-06-01 07:53:09', '2020-06-01 07:53:09'),
(3, '44444', 'SANTA JUAN', 1, 101, 10121, 'miguel', 'frnte a liceo santa rosaliaadadadad', '23323', '1', '1', 'mauqina 1', '53434343', '4343434', 1, 1, '2020-06-04 02:23:45', '2020-06-04 02:23:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cnes`
--

CREATE TABLE `cnes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nacionalidad` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cedula` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_pr` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_seg` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_pr` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_seg` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `estado_id` bigint(20) UNSIGNED NOT NULL,
  `municipio_id` bigint(20) UNSIGNED NOT NULL,
  `parroquia_id` bigint(20) UNSIGNED NOT NULL,
  `center_votes_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cnes`
--

INSERT INTO `cnes` (`id`, `nacionalidad`, `cedula`, `apellido_pr`, `apellido_seg`, `nombre_pr`, `nombre_seg`, `sexo`, `fecha`, `estado_id`, `municipio_id`, `parroquia_id`, `center_votes_id`, `created_at`, `updated_at`) VALUES
(1, 'V', '22567890', 'DE GENARO', 'RODRIGUEZ', 'STEFANO', 'JOSE', 'M', '2018-01-09', 1, 101, 10122, 1, NULL, NULL),
(2, 'V', '22222222', 'PEREZ', 'FERNANDEZ', 'JOSE', 'PEPETO', 'M', '2020-05-13', 1, 101, 10122, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `divisions`
--

INSERT INTO `divisions` (`id`, `descripcion`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'CES', 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2, 'Sindical CES', 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(3, 'Agraria CES', 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(4, 'Femenina CES', 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(5, 'Educación CES', 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(6, 'Juvenil CES', 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(7, 'Profesionales y Tecnicos CES', 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(8, 'Asuntos Municipales y Comunales CES', 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(9, 'Cultura CES', 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(10, 'Comité Ejecutivo Municipal', 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(11, 'Sindical CEN', 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(12, 'Agraria CEN', 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(13, 'Femenina CEN', 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(14, 'Juvenil CEN', 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(15, 'Educación CEN', 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(16, 'Profesionales y Tecnicos CEN', 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(17, 'Asuntos Municipales y Comunales CEN', 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(18, 'Cultura CEN', 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(19, 'Comité Ejecutivo Parroquial ', 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(20, 'Comité Local ', 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `electoralcommissions`
--

CREATE TABLE `electoralcommissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `electoralcommissions`
--

INSERT INTO `electoralcommissions` (`id`, `descripcion`, `fecha`, `users_id`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'ELECCIONES 2011', '2020-05-12', 1, 1, '2020-05-16 20:11:22', '2020-05-16 20:11:22'),
(2, 'ELECCIONES 2012', '2020-05-19', 1, 1, '2020-05-19 01:30:09', '2020-05-19 01:30:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `electorallist`
--

CREATE TABLE `electorallist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `electorallists`
--

CREATE TABLE `electorallists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `electorallists`
--

INSERT INTO `electorallists` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Coordinador de Centro', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2, 'Testigo de Mesa', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(3, 'Responsable Galope', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(4, 'Responsable Mosca', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(5, 'Satelite', '2020-04-20 01:55:55', '2020-04-20 01:55:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'DISTRITO CAPITAL', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2, 'ANZOATEGUI', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(3, 'APURE', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(4, 'ARAGUA', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(5, 'BARINAS', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(6, 'BOLIVAR', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(7, 'CARABOBO', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(8, 'COJEDES', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(9, 'FALCON', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(10, 'GUARICO', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(11, 'LARA', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(12, 'MERIDA', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(13, 'MIRANDA', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(14, 'MONAGAS', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(15, 'NUEVA ESPARTA', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(16, 'PORTUGUESA', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(17, 'SUCRE', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(18, 'TACHIRA', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(19, 'TRUJILLO', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(20, 'YARACUY', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(21, 'ZULIA', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(22, 'AMAZONAS', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(23, 'DELTA AMACURO', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(24, 'LA GUAIRA', '2020-04-20 01:55:55', '2020-04-20 01:55:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localcommittees`
--

CREATE TABLE `localcommittees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_id` bigint(20) UNSIGNED NOT NULL,
  `municipio_id` bigint(20) UNSIGNED NOT NULL,
  `parroquia_id` bigint(20) UNSIGNED NOT NULL,
  `observaciones` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `localcommittees`
--

INSERT INTO `localcommittees` (`id`, `descripcion`, `estado_id`, `municipio_id`, `parroquia_id`, `observaciones`, `users_id`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'SANTA ROSALIA', 1, 101, 10122, NULL, 1, 1, '2020-05-19 00:40:21', '2020-05-19 00:40:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_03_09_010001_create_status_table', 1),
(2, '2020_03_12_010002_create_users_table', 1),
(3, '2020_03_12_010003_create_password_resets_table', 1),
(4, '2020_03_19_010004_create_failed_jobs_table', 1),
(5, '2020_04_09_020000_create_estados_table', 1),
(6, '2020_04_09_020001_create_municipios_table', 1),
(7, '2020_04_09_020003_create_parroquias_table', 1),
(9, '2020_04_09_020005_create_divisions_table', 1),
(10, '2020_04_09_020006_create_posts_table', 1),
(12, '2020_04_09_020008_create_centervotes_table', 1),
(14, '2020_04_31_113105_create_roles_table', 1),
(15, '2020_04_31_113548_create_role_user_table', 1),
(16, '2020_04_31_125005_create_permissions_table', 1),
(17, '2020_04_31_125249_create_permission_role_table', 1),
(18, '2020_05_02_080039_create_localcommittees_table', 1),
(19, '2020_05_04_160308_create_electorallists_table', 1),
(25, '2020_05_10_070107_create_electoralcomissions_table', 2),
(28, '2020_04_09_020007_create_positions_table', 4),
(32, '2020_05_09_113744_create_cnes_table', 6),
(37, '2020_04_09_020004_create_academiclevels_table', 7),
(38, '2020_04_09_020009_create_professions_table', 7),
(39, '2020_05_09_021958_create_people_table', 7),
(40, '2020_05_09_030000_create_personstructures_table', 7),
(42, '2020_05_09_085329_create_personcommittees_table', 7),
(43, '2020_05_04_160308_create_electorallist_table', 8),
(44, '2020_05_09_030001_create_personvotes_table', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`id`, `descripcion`, `estado_id`, `created_at`, `updated_at`) VALUES
(101, 'LIBERTADOR', 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(201, 'ANACO', 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(202, 'ARAGUA', 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(203, 'SIMON BOLIVAR', 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(204, 'MANUEL EZEQUIEL BRUZUAL', 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(205, 'JUAN MANUEL CAJIGAL', 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(206, 'PEDRO MARIA FREITES', 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(207, 'INDEPENDENCIA', 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(208, 'LIBERTAD', 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(209, 'FRANCISCO DE MIRANDA', 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210, 'JOSE GREGORIO MONAGAS', 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211, 'FERNANDO PEÑALVER', 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(212, 'SIMON RODRIGUEZ', 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(213, 'JUAN ANTONIO SOTILLO', 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(214, 'SAN JOSE DE GUANIPA', 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(215, 'GUANTA', 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(216, 'PIRITU', 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(217, 'DIEGO BAUTISTA URBANEJA', 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(218, 'FRANCISCO DEL CARMEN CARVAJAL', 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(219, 'SANTA ANA', 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(220, 'GENERAL SIR ARTHUR MCGREGOR', 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(221, 'SAN JUAN DE CAPISTRANO', 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(301, 'ACHAGUAS', 3, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(302, 'MUÑOZ', 3, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(303, 'PAEZ', 3, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(304, 'PEDRO CAMEJO', 3, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(305, 'ROMULO GALLEGOS', 3, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(306, 'SAN FERNANDO', 3, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(307, 'BIRUACA', 3, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(401, 'GIRARDOT', 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(402, 'SANTIAGO MARIÑO', 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(403, 'JOSE FELIX RIBAS', 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(404, 'SAN CASIMIRO', 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(405, 'SAN SEBASTIAN', 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(406, 'SUCRE', 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(407, 'URDANETA', 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(408, 'ZAMORA', 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(409, 'LIBERTADOR', 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(410, 'JOSE ANGEL LAMAS', 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(411, 'BOLIVAR', 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(412, 'SANTOS MICHELENA', 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(413, 'MARIO BRICEÑO IRAGORRY', 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(414, 'TOVAR', 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(415, 'CAMATAGUA', 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(416, 'JOSE RAFAEL REVENGA', 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(417, 'FRANCISCO LINARES ALCANTARA', 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(418, 'OCUMARE DE LA COSTA DE ORO', 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(501, 'ARISMENDI', 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(502, 'BARINAS', 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(503, 'BOLIVAR', 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(504, 'EZEQUIEL ZAMORA', 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(505, 'OBISPOS', 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(506, 'PEDRAZA', 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(507, 'ROJAS', 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(508, 'SOSA', 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(509, 'ALBERTO ARVELO TORREALBA', 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(510, 'ANTONIO JOSE DE SUCRE', 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(511, 'CRUZ PAREDES', 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(512, 'ANDRES ELOY BLANCO', 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(601, 'CARONI', 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(602, 'CEDEÑO', 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(603, 'HERES', 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(604, 'PIAR', 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(605, 'ROSCIO', 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(606, 'SUCRE', 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(607, 'SIFONTES', 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(608, 'ANGOSTURA', 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(609, 'GRAN SABANA', 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(610, 'EL CALLAO', 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(611, 'PADRE PEDRO CHIEN', 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(701, 'BEJUMA', 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(702, 'CARLOS ARVELO', 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(703, 'DIEGO IBARRA', 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(704, 'GUACARA', 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(705, 'MONTALBAN', 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(706, 'JUAN JOSE MORA', 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(707, 'PUERTO CABELLO', 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(708, 'SAN JOAQUIN', 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(709, 'VALENCIA', 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(710, 'MIRANDA', 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(711, 'LOS GUAYOS', 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(712, 'NAGUANAGUA', 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(713, 'SAN DIEGO', 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(714, 'LIBERTADOR', 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(801, 'ANZOATEGUI', 8, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(802, 'TINAQUILLO', 8, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(803, 'GIRARDOT', 8, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(804, 'PAO DE SAN JUAN BAUTISTA', 8, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(805, 'RICAURTE', 8, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(806, 'EZEQUIEL ZAMORA', 8, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(807, 'TINACO', 8, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(808, 'LIMA BLANCO', 8, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(809, 'ROMULO GALLEGOS', 8, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(901, 'ACOSTA', 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(902, 'BOLIVAR', 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(903, 'BUCHIVACOA', 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(904, 'CARIRUBANA', 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(905, 'COLINA', 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(906, 'DEMOCRACIA', 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(907, 'FALCON', 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(908, 'FEDERACION', 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(909, 'MAUROA', 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(910, 'MIRANDA', 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(911, 'PETIT', 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(912, 'JOSE LAURENCIO SILVA', 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(913, 'ZAMORA', 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(914, 'DABAJURO', 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(915, 'MONSEÑOR ITURRIZA', 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(916, 'LOS TAQUES', 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(917, 'PIRITU', 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(918, 'UNION', 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(919, 'SAN FRANCISCO', 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(920, 'JACURA', 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(921, 'CACIQUE MANAURE', 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(922, 'PALMASOLA', 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(923, 'SUCRE', 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(924, 'URUMACO', 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(925, 'TOCOPERO', 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1001, 'LEONARDO INFANTE', 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1002, 'JULIAN MELLADO', 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1003, 'FRANCISCO DE MIRANDA', 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1004, 'JOSE TADEO MONAGAS', 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1005, 'JOSE FELIX RIBAS', 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1006, 'JUAN GERMAN ROSCIO', 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1007, 'PEDRO ZARAZA', 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1008, 'CAMAGUAN', 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1009, 'SAN JOSE DE GUARIBE', 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1010, 'LAS MERCEDES', 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1011, 'EL SOCORRO', 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1012, 'ORTIZ', 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1013, 'SANTA MARIA DE IPIRE', 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1014, 'CHAGUARAMAS', 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1015, 'SAN GERONIMO DE GUAYABAL', 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1101, 'CRESPO', 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1102, 'IRIBARREN', 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1103, 'JIMENEZ', 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1104, 'MORAN', 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1105, 'PALAVECINO', 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1106, 'TORRES', 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1107, 'URDANETA', 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1108, 'ANDRES ELOY BLANCO', 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1109, 'SIMON PLANAS', 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1201, 'ALBERTO ADRIANI', 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1202, 'ANDRES BELLO', 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1203, 'ARZOBISPO CHACON', 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1204, 'CAMPO ELIAS', 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1205, 'GUARAQUE', 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1206, 'JULIO CESAR SALAS', 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1207, 'JUSTO BRICEÑO', 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1208, 'LIBERTADOR', 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1209, 'SANTOS MARQUINA', 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1210, 'MIRANDA', 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1211, 'ANTONIO PINTO SALINAS', 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1212, 'OBISPO RAMOS DE LORA', 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1213, 'CARACCIOLO PARRA OLMEDO', 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1214, 'CARDENAL QUINTERO', 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1215, 'PUEBLO LLANO', 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1216, 'RANGEL', 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1217, 'RIVAS DAVILA', 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1218, 'SUCRE', 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1219, 'TOVAR', 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1220, 'TULIO FEBRES CORDERO', 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1221, 'PADRE NOGUERA', 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1222, 'ARICAGUA', 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1223, 'ZEA', 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1301, 'ACEVEDO', 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1302, 'BRION', 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1303, 'GUAICAIPURO', 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1304, 'INDEPENDENCIA', 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1305, 'LANDER', 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1306, 'PAEZ', 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1307, 'PAZ CASTILLO', 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1308, 'PLAZA', 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1309, 'SUCRE', 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1310, 'URDANETA', 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1311, 'ZAMORA', 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1312, 'CRISTOBAL ROJAS', 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1313, 'LOS SALIAS', 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1314, 'ANDRES BELLO', 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1315, 'SIMON BOLIVAR', 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1316, 'BARUTA', 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1317, 'CARRIZAL', 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1318, 'CHACAO', 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1319, 'EL HATILLO', 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1320, 'BUROZ', 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1321, 'PEDRO GUAL', 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1401, 'ACOSTA', 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1402, 'BOLIVAR', 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1403, 'CARIPE', 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1404, 'CEDEÑO', 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1405, 'EZEQUIEL ZAMORA', 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1406, 'LIBERTADOR', 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1407, 'MATURIN', 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1408, 'PIAR', 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1409, 'PUNCERES', 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1410, 'SOTILLO', 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1411, 'AGUASAY', 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1412, 'SANTA BARBARA', 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1413, 'URACOA', 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1501, 'ARISMENDI', 15, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1502, 'DIAZ', 15, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1503, 'GOMEZ', 15, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1504, 'MANEIRO', 15, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1505, 'MARCANO', 15, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1506, 'MARIÑO', 15, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1507, 'MACANAO', 15, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1508, 'VILLALBA', 15, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1509, 'TUBORES', 15, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1510, 'ANTOLIN DEL CAMPO', 15, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1511, 'GARCIA', 15, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1601, 'ARAURE', 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1602, 'ESTELLER', 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1603, 'GUANARE', 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1604, 'GUANARITO', 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1605, 'OSPINO', 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1606, 'PAEZ', 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1607, 'SUCRE', 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1608, 'TUREN', 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1609, 'MONSEÑOR JOSE VICENTE DE UNDA', 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1610, 'AGUA BLANCA', 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1611, 'PAPELON', 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1612, 'SAN GENARO DE BOCONOITO', 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1613, 'SAN RAFAEL DE ONOTO', 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1614, 'SANTA ROSALIA', 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1701, 'ARISMENDI', 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1702, 'BENITEZ', 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1703, 'BERMUDEZ', 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1704, 'CAJIGAL', 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1705, 'MARIÑO', 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1706, 'MEJIA', 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1707, 'MONTES', 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1708, 'RIBERO', 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1709, 'SUCRE', 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1710, 'VALDEZ', 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1711, 'ANDRES ELOY BLANCO', 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1712, 'LIBERTADOR', 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1713, 'ANDRES MATA', 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1714, 'BOLIVAR', 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1715, 'CRUZ SALMERON ACOSTA', 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1801, 'AYACUCHO', 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1802, 'BOLIVAR', 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1803, 'INDEPENDENCIA', 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1804, 'CARDENAS', 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1805, 'JAUREGUI', 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1806, 'JUNIN', 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1807, 'LOBATERA', 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1808, 'SAN CRISTOBAL', 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1809, 'URIBANTE', 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1810, 'CORDOBA', 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1811, 'GARCIA DE HEVIA', 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1812, 'GUASIMOS', 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1813, 'MICHELENA', 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1814, 'LIBERTADOR', 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1815, 'PANAMERICANO', 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1816, 'PEDRO MARIA UREÑA', 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1817, 'SUCRE', 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1818, 'ANDRES BELLO', 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1819, 'FERNANDEZ FEO', 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1820, 'LIBERTAD', 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1821, 'SAMUEL DARIO MALDONADO', 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1822, 'SEBORUCO', 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1823, 'ANTONIO ROMULO COSTA', 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1824, 'FRANCISCO DE MIRANDA', 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1825, 'JOSE MARIA VARGAS', 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1826, 'RAFAEL URDANETA', 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1827, 'SIMON RODRIGUEZ', 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1828, 'TORBES', 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1829, 'SAN JUDAS TADEO', 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1901, 'RAFAEL RANGEL', 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1902, 'BOCONO', 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1903, 'CARACHE', 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1904, 'ESCUQUE', 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1905, 'TRUJILLO', 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1906, 'URDANETA', 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1907, 'VALERA', 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1908, 'CANDELARIA', 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1909, 'MIRANDA', 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1910, 'MONTE CARMELO', 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1911, 'MOTATAN', 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1912, 'PAMPAN', 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1913, 'SAN RAFAEL DE CARVAJAL', 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1914, 'SUCRE', 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1915, 'ANDRES BELLO', 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1916, 'BOLIVAR', 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1917, 'JOSE FELIPE MARQUEZ CAÑIZALES', 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1918, 'JUAN VICENTE CAMPO ELIAS', 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1919, 'LA CEIBA', 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(1920, 'PAMPANITO', 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2001, 'BOLIVAR', 20, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2002, 'BRUZUAL', 20, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2003, 'NIRGUA', 20, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2004, 'SAN FELIPE', 20, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2005, 'SUCRE', 20, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2006, 'URACHICHE', 20, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2007, 'PEÑA', 20, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2008, 'JOSE ANTONIO PAEZ', 20, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2009, 'LA TRINIDAD', 20, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2010, 'COCOROTE', 20, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2011, 'INDEPENDENCIA', 20, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2012, 'ARISTIDES BASTIDAS', 20, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2013, 'MANUEL MONGE', 20, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2014, 'JOSE JOAQUIN VEROES', 20, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2101, 'BARALT', 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2102, 'SANTA RITA', 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2103, 'COLON', 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2104, 'MARA', 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2105, 'MARACAIBO', 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2106, 'MIRANDA', 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2107, 'GUAJIRA', 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2108, 'MACHIQUES DE PERIJA', 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2109, 'SUCRE', 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2110, 'LA CAÑADA DE URDANETA', 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2111, 'LAGUNILLAS', 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2112, 'CATATUMBO', 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2113, 'ROSARIO DE PERIJA', 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2114, 'CABIMAS', 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2115, 'VALMORE RODRIGUEZ', 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2116, 'JESUS ENRIQUE LOSSADA', 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2117, 'ALMIRANTE PADILLA', 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2118, 'SAN FRANCISCO', 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2119, 'JESUS MARIA SEMPRUM', 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2120, 'FRANCISCO JAVIER PULGAR', 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2121, 'SIMON BOLIVAR', 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2201, 'ATURES', 22, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2202, 'ATABAPO', 22, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2203, 'MAROA', 22, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2204, 'RIO NEGRO', 22, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2205, 'AUTANA', 22, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2206, 'MANAPIARE', 22, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2207, 'ALTO ORINOCO', 22, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2301, 'TUCUPITA', 23, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2302, 'PEDERNALES', 23, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2303, 'ANTONIO DIAZ', 23, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2304, 'CASACOIMA', 23, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2401, 'LA GUAIRA', 24, '2020-04-20 01:55:55', '2020-04-20 01:55:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parroquias`
--

CREATE TABLE `parroquias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipio_id` bigint(20) UNSIGNED NOT NULL,
  `estado_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `parroquias`
--

INSERT INTO `parroquias` (`id`, `descripcion`, `municipio_id`, `estado_id`, `created_at`, `updated_at`) VALUES
(10101, 'ALTAGRACIA', 101, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(10102, 'CANDELARIA', 101, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(10103, 'CATEDRAL', 101, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(10104, 'LA PASTORA', 101, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(10105, 'SAN AGUSTIN', 101, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(10106, 'SAN JOSE', 101, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(10107, 'SAN JUAN', 101, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(10108, 'SANTA ROSALIA', 101, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(10109, 'SANTA TERESA', 101, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(10110, 'SUCRE', 101, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(10111, '23 DE ENERO', 101, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(10112, 'ANTIMANO', 101, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(10113, 'EL RECREO', 101, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(10114, 'EL VALLE', 101, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(10115, 'LA VEGA', 101, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(10116, 'MACARAO', 101, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(10117, 'CARICUAO', 101, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(10118, 'EL JUNQUITO', 101, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(10119, 'COCHE', 101, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(10120, 'SAN PEDRO', 101, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(10121, 'SAN BERNARDINO', 101, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(10122, 'EL PARAISO', 101, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(20101, 'ANACO', 201, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(20102, 'SAN JOAQUIN', 201, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(20201, 'ARAGUA DE BARCELONA', 202, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(20202, 'CACHIPO', 202, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(20301, 'EL CARMEN', 203, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(20302, 'SAN CRISTOBAL', 203, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(20303, 'BERGANTIN', 203, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(20304, 'CAIGUA', 203, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(20305, 'EL PILAR', 203, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(20306, 'NARICUAL', 203, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(20401, 'CLARINES', 204, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(20402, 'GUANAPE', 204, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(20403, 'SABANA DE UCHIRE', 204, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(20501, 'ONOTO', 205, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(20502, 'SAN PABLO', 205, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(20601, 'CANTAURA', 206, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(20602, 'LIBERTADOR', 206, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(20603, 'SANTA ROSA', 206, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(20604, 'URICA', 206, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(20701, 'SOLEDAD', 207, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(20702, 'MAMO', 207, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(20801, 'SAN MATEO', 208, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(20802, 'EL CARITO', 208, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(20803, 'SANTA INES', 208, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(20901, 'PARIAGUAN', 209, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(20902, 'ATAPIRIRE', 209, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(20903, 'BOCA DEL PAO', 209, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(20904, 'EL PAO', 209, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(21001, 'MAPIRE', 210, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(21002, 'PIAR', 210, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(21003, 'SAN DIEGO DE CABRUTICA', 210, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(21004, 'SANTA CLARA', 210, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(21005, 'UVERITO', 210, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(21006, 'ZUATA', 210, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(21101, 'PUERTO PIRITU', 211, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(21102, 'SAN MIGUEL', 211, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(21103, 'SUCRE', 211, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(21201, 'EDMUNDO BARRIOS', 212, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(21202, 'MIGUEL OTERO SILVA', 212, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(21301, 'POZUELOS', 213, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(21302, 'PUERTO LA CRUZ', 213, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(21401, 'SAN JOSE DE GUANIPA', 214, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(21501, 'GUANTA', 215, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(21502, 'CHORRERON', 215, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(21601, 'PIRITU', 216, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(21602, 'SAN FRANCISCO', 216, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(21701, 'LECHERIA', 217, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(21702, 'EL MORRO', 217, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(21801, 'VALLE DE GUANAPE', 218, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(21802, 'SANTA BARBARA', 218, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(21901, 'SANTA ANA', 219, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(21902, 'PUEBLO NUEVO', 219, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(22001, 'EL CHAPARRO', 220, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(22002, 'TOMAS ALFARO', 220, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(22101, 'BOCA DE UCHIRE', 221, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(22102, 'BOCA DE CHAVEZ', 221, 2, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(30101, 'ACHAGUAS', 301, 3, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(30102, 'APURITO', 301, 3, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(30103, 'EL YAGUAL', 301, 3, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(30104, 'GUACHARA', 301, 3, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(30105, 'MUCURITAS', 301, 3, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(30106, 'QUESERAS DEL MEDIO', 301, 3, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(30201, 'BRUZUAL', 302, 3, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(30202, 'MANTECAL', 302, 3, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(30203, 'QUINTERO', 302, 3, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(30204, 'SAN VICENTE', 302, 3, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(30205, 'RINCON HONDO', 302, 3, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(30301, 'GUASDUALITO', 303, 3, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(30302, 'ARAMENDI', 303, 3, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(30303, 'EL AMPARO', 303, 3, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(30304, 'SAN CAMILO', 303, 3, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(30305, 'URDANETA', 303, 3, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(30401, 'SAN JUAN DE PAYARA', 304, 3, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(30402, 'CODAZZI', 304, 3, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(30403, 'CUNAVICHE', 304, 3, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(30501, 'ELORZA', 305, 3, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(30502, 'LA TRINIDAD', 305, 3, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(30601, 'SAN FERNANDO', 306, 3, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(30602, 'PEÑALVER', 306, 3, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(30603, 'EL RECREO', 306, 3, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(30604, 'SN RAFAEL DE ATAMAICA', 306, 3, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(30701, 'BIRUACA', 307, 3, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(40101, 'LAS DELICIAS', 401, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(40102, 'CHORONI', 401, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(40103, 'MADRE MARIA DE SAN JOSE', 401, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(40104, 'JOAQUIN CRESPO', 401, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(40105, 'PEDRO JOSE OVALLES', 401, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(40106, 'JOSE CASANOVA GODOY', 401, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(40107, 'ANDRES ELOY BLANCO', 401, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(40108, 'LOS TACARIGUAS', 401, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(40201, 'TURMERO', 402, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(40202, 'SAMAN DE GUERE', 402, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(40203, 'ALFREDO PACHECO M', 402, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(40204, 'CHUAO', 402, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(40205, 'AREVALO APONTE', 402, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(40301, 'JUAN VICENTE BOLIVAR', 403, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(40302, 'ZUATA', 403, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(40303, 'PAO DE ZARATE', 403, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(40304, 'CASTOR NIEVES RIOS', 403, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(40305, 'LAS GUACAMAYAS', 403, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(40401, 'SAN CASIMIRO', 404, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(40402, 'VALLE MORIN', 404, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(40403, 'GUIRIPA', 404, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(40404, 'OLLAS DE CARAMACATE', 404, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(40501, 'SAN SEBASTIAN', 405, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(40601, 'CAGUA', 406, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(40602, 'BELLA VISTA', 406, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(40701, 'BARBACOAS', 407, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(40702, 'SAN FRANCISCO DE CARA', 407, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(40703, 'TAGUAY', 407, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(40704, 'LAS PEÑITAS', 407, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(40801, 'VILLA DE CURA', 408, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(40802, 'MAGDALENO', 408, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(40803, 'SAN FRANCISCO DE ASIS', 408, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(40804, 'VALLES DE TUCUTUNEMO', 408, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(40805, 'AUGUSTO MIJARES', 408, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(40901, 'PALO NEGRO', 409, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(40902, 'SAN MARTIN DE PORRES', 409, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(41001, 'SANTA CRUZ', 410, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(41101, 'SAN MATEO', 411, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(41201, 'LAS TEJERIAS', 412, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(41202, 'TIARA', 412, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(41301, 'EL LIMON', 413, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(41302, 'CAÑA DE AZUCAR', 413, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(41401, 'TOVAR', 414, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(41501, 'CAMATAGUA', 415, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(41502, 'CARMEN DE CURA', 415, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(41601, 'EL CONSEJO', 416, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(41701, 'SANTA RITA', 417, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(41702, 'FRANCISCO DE MIRANDA', 417, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(41703, 'MONS FELICIANO G', 417, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(41801, 'OCUMARE DE LA COSTA', 418, 4, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50101, 'ARISMENDI', 501, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50102, 'GUADARRAMA', 501, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50103, 'LA UNION', 501, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50104, 'SAN ANTONIO', 501, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50201, 'ALFREDO ARVELO LARRIVA', 502, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50202, 'BARINAS', 502, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50203, 'SAN SILVESTRE', 502, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50204, 'SANTA INES', 502, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50205, 'SANTA LUCIA', 502, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50206, 'TORUNOS', 502, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50207, 'EL CARMEN', 502, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50208, 'ROMULO BETANCOURT', 502, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50209, 'CORAZON DE JESUS', 502, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50210, 'RAMON IGNACIO MENDEZ', 502, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50211, 'ALTO BARINAS', 502, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50212, 'MANUEL PALACIO FAJARDO', 502, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50213, 'JUAN ANTONIO RODRIGUEZ DOMINGUEZ', 502, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50214, 'DOMINGA ORTIZ DE PAEZ', 502, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50301, 'ALTAMIRA DE CACERES', 503, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50302, 'BARINITAS', 503, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50303, 'CALDERAS', 503, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50401, 'SANTA BARBARA', 504, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50402, 'JOSE IGNACIO DEL PUMAR', 504, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50403, 'RAMON IGNACIO MENDEZ', 504, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50404, 'PEDRO BRICEÑO MENDEZ', 504, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50501, 'EL REAL', 505, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50502, 'LA LUZ', 505, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50503, 'OBISPOS', 505, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50504, 'LOS GUASIMITOS', 505, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50601, 'CIUDAD BOLIVIA', 506, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50602, 'JOSE IGNACIO BRICEÑO', 506, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50603, 'PAEZ', 506, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50604, 'JOSE FELIX RIBAS', 506, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50701, 'DOLORES', 507, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50702, 'LIBERTAD', 507, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50703, 'PALACIO FAJARDO', 507, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50704, 'SANTA ROSA', 507, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50705, 'SIMÓN RODRÍGUEZ', 507, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50801, 'CIUDAD DE NUTRIAS', 508, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50802, 'EL REGALO', 508, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50803, 'PUERTO DE NUTRIAS', 508, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50804, 'SANTA CATALINA', 508, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50805, 'SIMÓN BOLÍVAR', 508, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50901, 'RODRIGUEZ DOMINGUEZ', 509, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50902, 'SABANETA', 509, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(51001, 'TICOPORO', 510, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(51002, 'NICOLAS PULIDO', 510, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(51003, 'ANDRES BELLO', 510, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(51101, 'BARRANCAS', 511, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(51102, 'EL SOCORRO', 511, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(51103, 'MASPARRITO', 511, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(51201, 'EL CANTON', 512, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(51202, 'SANTA CRUZ DE GUACAS', 512, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(51203, 'PUERTO VIVAS', 512, 5, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60101, 'SIMON BOLIVAR', 601, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60102, 'ONCE DE ABRIL', 601, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60103, 'VISTA AL SOL', 601, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60104, 'CHIRICA', 601, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60105, 'DALLA COSTA', 601, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60106, 'CACHAMAY', 601, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60107, 'UNIVERSIDAD', 601, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60108, 'UNARE', 601, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60109, 'YOCOIMA', 601, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60110, 'POZO VERDE', 601, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60111, '5 DE JULIO', 601, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60201, 'CAICARA DEL ORINOCO', 602, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60202, 'ASCENSION FARRERAS', 602, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60203, 'ALTAGRACIA', 602, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60204, 'LA URBANA', 602, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60205, 'GUANIAMO', 602, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60206, 'PIJIGUAOS', 602, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60301, 'CATEDRAL', 603, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60302, 'AGUA SALADA', 603, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60303, 'LA SABANITA', 603, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60304, 'VISTA HERMOSA', 603, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60305, 'MARHUANTA', 603, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60306, 'JOSE ANTONIO PAEZ', 603, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60307, 'ORINOCO', 603, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60308, 'PANAPANA', 603, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60309, 'ZEA', 603, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60401, 'UPATA', 604, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60402, 'ANDRES ELOY BLANCO', 604, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60403, 'PEDRO COVA', 604, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60501, 'GUASIPATI', 605, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60502, 'SALOM', 605, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60601, 'MARIPA', 606, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60602, 'ARIPAO', 606, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60603, 'LAS MAJADAS', 606, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60604, 'MOITACO', 606, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60605, 'GUARATARO', 606, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60701, 'TUMEREMO', 607, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60702, 'DALLA COSTA', 607, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60703, 'SAN ISIDRO', 607, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60801, 'CIUDAD PIAR', 608, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60802, 'SAN FRANCISCO', 608, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60803, 'BARCELONETA', 608, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60804, 'SANTA BARBARA', 608, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60901, 'SANTA ELENA DE UAIREN', 609, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60902, 'IKABARU', 609, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(61001, 'EL CALLAO', 610, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(61101, 'EL PALMAR', 611, 6, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(70101, 'BEJUMA', 701, 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(70102, 'CANOABO', 701, 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(70103, 'SIMON BOLIVAR', 701, 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(70201, 'GUIGUE', 702, 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(70202, 'BELEN', 702, 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(70203, 'TACARIGUA', 702, 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(70301, 'MARIARA', 703, 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(70302, 'AGUAS CALIENTES', 703, 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(70401, 'GUACARA', 704, 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(70402, 'CIUDAD ALIANZA', 704, 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(70403, 'YAGUA', 704, 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(70501, 'MONTALBAN', 705, 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(70601, 'MORON', 706, 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(70602, 'URAMA', 706, 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(70701, 'DEMOCRACIA', 707, 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(70702, 'FRATERNIDAD', 707, 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(70703, 'GOAIGOAZA', 707, 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(70704, 'JUAN JOSE FLORES', 707, 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(70705, 'BARTOLOME SALOM', 707, 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(70706, 'UNION', 707, 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(70707, 'BORBURATA', 707, 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(70708, 'PATANEMO', 707, 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(70801, 'SAN JOAQUIN', 708, 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(70901, 'CANDELARIA', 709, 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(70902, 'CATEDRAL', 709, 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(70903, 'EL SOCORRO', 709, 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(70904, 'MIGUEL PEÑA', 709, 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(70905, 'SAN BLAS', 709, 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(70906, 'SAN JOSE', 709, 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(70907, 'SANTA ROSA', 709, 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(70908, 'RAFAEL URDANETA', 709, 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(70909, 'NEGRO PRIMERO', 709, 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(71001, 'MIRANDA', 710, 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(71101, 'LOS GUAYOS', 711, 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(71201, 'NAGUANAGUA', 712, 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(71301, 'SAN DIEGO', 713, 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(71401, 'TOCUYITO', 714, 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(71402, 'INDEPENDENCIA', 714, 7, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(80101, 'COJEDES', 801, 8, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(80102, 'JUAN DE MATA SUAREZ', 801, 8, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(80201, 'TINAQUILLO', 802, 8, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(80301, 'EL BAUL', 803, 8, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(80302, 'SUCRE', 803, 8, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(80401, 'EL PAO', 804, 8, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(80501, 'LIBERTAD DE COJEDES', 805, 8, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(80502, 'EL AMPARO', 805, 8, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(80601, 'SAN CARLOS DE AUSTRIA', 806, 8, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(80602, 'JUAN ANGEL BRAVO', 806, 8, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(80603, 'MANUEL MANRIQUE', 806, 8, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(80701, 'GENERAL EN JEFE JOSE LAURENCIO SILVA', 807, 8, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(80801, 'MACAPO', 808, 8, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(80802, 'LA AGUADITA', 808, 8, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(80901, 'ROMULO GALLEGOS', 809, 8, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90101, 'SAN JUAN DE LOS CAYOS', 901, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90102, 'CAPADARE', 901, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90103, 'LA PASTORA', 901, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90104, 'LIBERTADOR', 901, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90201, 'SAN LUIS', 902, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90202, 'ARACUA', 902, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90203, 'LA PEÑA', 902, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90301, 'CAPATARIDA', 903, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90302, 'BOROJO', 903, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90303, 'SEQUE', 903, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90304, 'ZAZARIDA', 903, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90305, 'BARIRO', 903, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90306, 'GUAJIRO', 903, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90401, 'NORTE', 904, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90402, 'CARIRUBANA', 904, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90403, 'PUNTA CARDON', 904, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90404, 'SANTA ANA', 904, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90501, 'LA VELA DE CORO', 905, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90502, 'ACURIGUA', 905, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90503, 'GUAIBACOA', 905, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90504, 'MACORUCA', 905, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90505, 'LAS CALDERAS', 905, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90601, 'PEDREGAL', 906, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90602, 'AGUA CLARA', 906, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90603, 'AVARIA', 906, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90604, 'PIEDRA GRANDE', 906, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90605, 'PURURECHE', 906, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90701, 'PUEBLO NUEVO', 907, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90702, 'ADICORA', 907, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90703, 'BARAIVED', 907, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90704, 'BUENA VISTA', 907, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90705, 'JADACAQUIVA', 907, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90706, 'MORUY', 907, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90707, 'EL VINCULO', 907, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90708, 'EL HATO', 907, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90709, 'ADAURE', 907, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90801, 'CHURUGUARA', 908, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90802, 'AGUA LARGA', 908, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90803, 'INDEPENDENCIA', 908, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90804, 'MAPARARI', 908, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90805, 'EL PAUJI', 908, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90901, 'MENE DE MAUROA', 909, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90902, 'CASIGUA', 909, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90903, 'SAN FELIX', 909, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(91001, 'SAN ANTONIO', 910, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(91002, 'SAN GABRIEL', 910, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(91003, 'SANTA ANA', 910, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(91004, 'GUZMAN GUILLERMO', 910, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(91005, 'MITARE', 910, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(91006, 'SABANETA', 910, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(91007, 'RIO SECO', 910, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(91101, 'CABURE', 911, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(91102, 'CURIMAGUA', 911, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(91103, 'COLINA', 911, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(91201, 'TUCACAS', 912, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(91202, 'BOCA DE AROA', 912, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(91301, 'PUERTO CUMAREBO', 913, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(91302, 'LA CIENAGA', 913, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(91303, 'LA SOLEDAD', 913, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(91304, 'PUEBLO CUMAREBO', 913, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(91305, 'ZAZARIDA', 913, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(91401, 'DABAJURO', 914, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(91501, 'CHICHIRIVICHE', 915, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(91502, 'BOCA DE TOCUYO', 915, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(91503, 'TOCUYO DE LA COSTA', 915, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(91601, 'LOS TAQUES', 916, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(91602, 'JUDIBANA', 916, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(91701, 'PIRITU', 917, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(91702, 'SAN JOSE DE LA COSTA', 917, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(91801, 'SANTA CRUZ DE BUCARAL', 918, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(91802, 'EL CHARAL', 918, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(91803, 'LAS VEGAS DEL TUY', 918, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(91901, 'MIRIMIRE', 919, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(92001, 'JACURA', 920, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(92002, 'AGUA LINDA', 920, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(92003, 'ARAURIMA', 920, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(92101, 'YARACAL', 921, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(92201, 'PALMA SOLA', 922, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(92301, 'SUCRE', 923, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(92302, 'PECAYA', 923, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(92401, 'URUMACO', 924, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(92402, 'BRUZUAL', 924, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(92501, 'TOCOPERO', 925, 9, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(100101, 'VALLE DE LA PASCUA', 1001, 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(100102, 'ESPINO', 1001, 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(100201, 'EL SOMBRERO', 1002, 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(100202, 'SOSA', 1002, 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(100301, 'CALABOZO', 1003, 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(100302, 'EL CALVARIO', 1003, 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(100303, 'EL RASTRO', 1003, 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(100304, 'GUARDATINAJAS', 1003, 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(100401, 'ALTAGRACIA DE ORITUCO', 1004, 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(100402, 'LEZAMA', 1004, 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(100403, 'LIBERTAD DE ORITUCO', 1004, 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(100404, 'SAN FCO DE MACAIRA', 1004, 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(100405, 'SAN RAFAEL DE ORITUCO', 1004, 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(100406, 'SOUBLETTE', 1004, 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(100407, 'PASO REAL DE MACAIRA', 1004, 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(100501, 'TUCUPIDO', 1005, 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(100502, 'SAN RAFAEL DE LAYA', 1005, 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(100601, 'SAN JUAN DE LOS MORROS', 1006, 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(100602, 'PARAPARA', 1006, 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(100603, 'CANTAGALLO', 1006, 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(100701, 'ZARAZA', 1007, 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(100702, 'SAN JOSE DE UNARE', 1007, 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(100801, 'CAMAGUAN', 1008, 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(100802, 'PUERTO MIRANDA', 1008, 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(100803, 'UVERITO', 1008, 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(100901, 'SAN JOSE DE GUARIBE', 1009, 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(101001, 'LAS MERCEDES', 1010, 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(101002, 'SANTA RITA DE MANAPIRE', 1010, 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(101003, 'CABRUTA', 1010, 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(101101, 'EL SOCORRO', 1011, 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(101201, 'ORTIZ', 1012, 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(101202, 'SAN FRANCISCO DE TIZNADOS', 1012, 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(101203, 'SAN JOSE DE TIZNADOS', 1012, 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(101204, 'S LORENZO DE TIZNADOS', 1012, 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(101301, 'SANTA MARIA DE IPIRE', 1013, 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(101302, 'ALTAMIRA', 1013, 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(101401, 'CHAGUARAMAS', 1014, 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(101501, 'GUAYABAL', 1015, 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(101502, 'CAZORLA', 1015, 10, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110101, 'FREITEZ', 1101, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110102, 'JOSE MARIA BLANCO', 1101, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110201, 'CATEDRAL', 1102, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110202, 'LA CONCEPCION', 1102, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110203, 'SANTA ROSA', 1102, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110204, 'UNION', 1102, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110205, 'EL CUJI', 1102, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110206, 'TAMACA', 1102, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110207, 'JUAN DE VILLEGAS', 1102, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110208, 'AGUEDO FELIPE ALVARADO', 1102, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110209, 'BUENA VISTA', 1102, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110210, 'JUAREZ', 1102, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110301, 'JUAN BAUTISTA RODRIGUEZ', 1103, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110302, 'DIEGO DE LOZADA', 1103, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110303, 'SAN MIGUEL', 1103, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110304, 'CUARA', 1103, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110305, 'PARAISO DE SAN JOSE', 1103, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110306, 'TINTORERO', 1103, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110307, 'JOSE BERNARDO DORANTE', 1103, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110308, 'CRNEL. MARIANO PERAZA', 1103, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110401, 'BOLIVAR', 1104, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110402, 'ANZOATEGUI', 1104, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110403, 'GUARICO', 1104, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110404, 'HUMOCARO ALTO', 1104, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110405, 'HUMOCARO BAJO', 1104, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110406, 'MORAN', 1104, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110407, 'HILARIO LUNA Y LUNA', 1104, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110408, 'LA CANDELARIA', 1104, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110501, 'CABUDARE', 1105, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110502, 'JOSE GREGORIO BASTIDAS', 1105, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110503, 'AGUA VIVA', 1105, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110601, 'TRINIDAD SAMUEL', 1106, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110602, 'ANTONIO DIAZ', 1106, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110603, 'CAMACARO', 1106, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110604, 'CASTAÑEDA', 1106, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110605, 'CHIQUINQUIRA', 1106, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110606, 'ESPINOZA DE LOS MONTEROS', 1106, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110607, 'LARA', 1106, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110608, 'MANUEL MORILLO', 1106, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110609, 'MONTES DE OCA', 1106, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110610, 'TORRES', 1106, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110611, 'EL BLANCO', 1106, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110612, 'MONTAÑA VERDE', 1106, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110613, 'HERIBERTO ARROYO', 1106, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110614, 'LAS MERCEDES', 1106, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110615, 'CECILIO ZUBILLAGA', 1106, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110616, 'REYES DE VARGAS', 1106, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110617, 'ALTAGRACIA', 1106, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110701, 'SIQUISIQUE', 1107, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110702, 'SAN MIGUEL', 1107, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110703, 'XAGUAS', 1107, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110704, 'MOROTURO', 1107, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110801, 'PIO TAMAYO', 1108, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110802, 'YACAMBU', 1108, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110803, 'QUEBRADA HONDA DE GUACHE', 1108, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110901, 'SARARE', 1109, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110902, 'GUSTAVO VEGAS LEON', 1109, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110903, 'BURIA', 1109, 11, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120101, 'GABRIEL PICON GONZALEZ', 1201, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120102, 'HECTOR AMABLE MORA', 1201, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120103, 'JOSE NUCETE SARDI', 1201, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120104, 'PULIDO MENDEZ', 1201, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120105, 'PRESIDENTE ROMULO GALLEGOS', 1201, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120106, 'PRESIDENTE BETANCOURT', 1201, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120107, 'PRESIDENTE PAEZ', 1201, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120201, 'LA AZULITA', 1202, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120301, 'CANAGUA', 1203, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120302, 'CAPURI', 1203, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120303, 'CHACANTA', 1203, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120304, 'EL MOLINO', 1203, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120305, 'GUAIMARAL', 1203, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120306, 'MUCUTUY', 1203, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120307, 'MUCUCHACHI', 1203, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120401, 'ACEQUIAS', 1204, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120402, 'JAJI', 1204, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120403, 'LA MESA', 1204, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120404, 'SAN JOSE', 1204, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120405, 'MONTALBAN', 1204, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120406, 'MATRIZ', 1204, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120407, 'FERNANDEZ PEÑA', 1204, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120501, 'GUARAQUE', 1205, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120502, 'MESA DE QUINTERO', 1205, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120503, 'RIO NEGRO', 1205, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120601, 'ARAPUEY', 1206, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120602, 'PALMIRA', 1206, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120701, 'TORONDOY', 1207, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120702, 'SAN CRISTOBAL DE T', 1207, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120801, 'ARIAS', 1208, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120802, 'SAGRARIO', 1208, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120803, 'MILLA', 1208, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120804, 'EL LLANO', 1208, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120805, 'JUAN RODRIGUEZ SUAREZ', 1208, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120806, 'JACINTO PLAZA', 1208, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120807, 'DOMINGO PEÑA', 1208, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120808, 'GONZALO PICON FEBRES', 1208, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120809, 'OSUNA RODRIGUEZ', 1208, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120810, 'LASSO DE LA VEGA', 1208, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120811, 'CARACCIOLO PARRA PEREZ', 1208, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120812, 'MARIANO PICON SALAS', 1208, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120813, 'ANTONIO SPINETTI DINI', 1208, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120814, 'EL MORRO', 1208, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120815, 'LOS NEVADOS', 1208, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120901, 'TABAY', 1209, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(121001, 'TIMOTES', 1210, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(121002, 'ANDRES ELOY BLANCO', 1210, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(121003, 'PIÑANGO', 1210, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(121004, 'LA VENTA', 1210, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(121101, 'SANTA CRUZ DE MORA', 1211, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(121102, 'MESA BOLIVAR', 1211, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(121103, 'MESA DE LAS PALMAS', 1211, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(121201, 'SANTA ELENA DE ARENALES', 1212, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(121202, 'ELOY PAREDES', 1212, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(121203, 'SAN RAFAEL DE ALZAZAR', 1212, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(121301, 'TUCANI', 1213, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(121302, 'FLORENCIO RAMIREZ', 1213, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(121401, 'SANTO DOMINGO', 1214, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(121402, 'LAS PIEDRAS', 1214, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(121501, 'PUEBLO LLANO', 1215, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(121601, 'MUCUCHIES', 1216, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(121602, 'MUCURUBA', 1216, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(121603, 'SAN RAFAEL', 1216, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(121604, 'CACUTE', 1216, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(121605, 'LA TOMA', 1216, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(121701, 'BAILADORES', 1217, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(121702, 'GERONIMO MALDONADO', 1217, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(121801, 'LAGUNILLAS', 1218, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(121802, 'CHIGUARA', 1218, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(121803, 'ESTANQUES', 1218, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(121804, 'SAN JUAN', 1218, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(121805, 'PUEBLO NUEVO DEL SUR', 1218, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(121806, 'LA TRAMPA', 1218, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(121901, 'EL LLANO', 1219, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(121902, 'TOVAR', 1219, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(121903, 'EL AMPARO', 1219, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(121904, 'SAN FRANCISCO', 1219, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(122001, 'NUEVA BOLIVIA', 1220, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(122002, 'INDEPENDENCIA', 1220, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(122003, 'MARIA C PALACIOS', 1220, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(122004, 'SANTA APOLONIA', 1220, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(122101, 'SANTA MARIA DE CAPARO', 1221, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(122201, 'ARICAGUA', 1222, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(122202, 'SAN ANTONIO', 1222, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(122301, 'ZEA', 1223, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(122302, 'CAÑO EL TIGRE', 1223, 12, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(130101, 'CAUCAGUA', 1301, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(130102, 'ARAGUITA', 1301, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(130103, 'AREVALO GONZALEZ', 1301, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(130104, 'CAPAYA', 1301, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(130105, 'PANAQUIRE', 1301, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(130106, 'RIBAS', 1301, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(130107, 'EL CAFE', 1301, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(130108, 'MARIZAPA', 1301, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(130201, 'HIGUEROTE', 1302, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(130202, 'CURIEPE', 1302, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(130203, 'TACARIGUA', 1302, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(130301, 'LOS TEQUES', 1303, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(130302, 'CECILIO ACOSTA', 1303, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(130303, 'PARACOTOS', 1303, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(130304, 'SAN PEDRO', 1303, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(130305, 'TACATA', 1303, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(130306, 'EL JARILLO', 1303, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(130307, 'ALTAGRACIA DE LA MONTAÑA', 1303, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(130401, 'SANTA TERESA DEL TUY', 1304, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(130402, 'EL CARTANAL', 1304, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(130501, 'OCUMARE DEL TUY', 1305, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(130502, 'LA DEMOCRACIA', 1305, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(130503, 'SANTA BARBARA', 1305, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(130601, 'RIO CHICO', 1306, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(130602, 'EL GUAPO', 1306, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(130603, 'TACARIGUA DE LA LAGUNA', 1306, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(130604, 'PAPARO', 1306, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(130605, 'SN FERNANDO DEL GUAPO', 1306, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(130701, 'SANTA LUCIA DEL TUY', 1307, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(130801, 'GUARENAS', 1308, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(130901, 'PETARE', 1309, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(130902, 'LEONCIO MARTINEZ', 1309, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(130903, 'CAUCAGUITA', 1309, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(130904, 'FILAS DE MARICHES', 1309, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(130905, 'LA DOLORITA', 1309, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(131001, 'CUA', 1310, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(131002, 'NUEVA CUA', 1310, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(131101, 'GUATIRE', 1311, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(131102, 'BOLIVAR', 1311, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(131201, 'CHARALLAVE', 1312, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(131202, 'LAS BRISAS', 1312, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(131301, 'SAN ANTONIO LOS ALTOS', 1313, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(131401, 'SAN JOSE DE BARLOVENTO', 1314, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(131402, 'CUMBO', 1314, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(131501, 'SAN FRANCISCO DE YARE', 1315, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(131502, 'SAN ANTONIO DE YARE', 1315, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(131601, 'NUESTRA SEÑORA DEL ROSARIO', 1316, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(131602, 'EL CAFETAL', 1316, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(131603, 'LAS MINAS', 1316, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(131701, 'CARRIZAL', 1317, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(131801, 'CHACAO', 1318, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(131901, 'EL HATILLO', 1319, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(132001, 'MAMPORAL', 1320, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(132101, 'CUPIRA', 1321, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(132102, 'MACHURUCUTO', 1321, 13, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(140101, 'SAN ANTONIO DE MATURIN', 1401, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(140102, 'SAN FRANCISCO DE MATURIN', 1401, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(140201, 'CARIPITO', 1402, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(140301, 'CARIPE', 1403, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(140302, 'TERESEN', 1403, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(140303, 'EL GUACHARO', 1403, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(140304, 'SAN AGUSTIN', 1403, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(140305, 'LA GUANOTA', 1403, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(140306, 'SABANA DE PIEDRA', 1403, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(140401, 'CAICARA', 1404, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(140402, 'AREO', 1404, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(140403, 'SAN FELIX', 1404, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(140404, 'VIENTO FRESCO', 1404, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(140501, 'PUNTA DE MATA', 1405, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(140502, 'EL TEJERO', 1405, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55');
INSERT INTO `parroquias` (`id`, `descripcion`, `municipio_id`, `estado_id`, `created_at`, `updated_at`) VALUES
(140601, 'TEMBLADOR', 1406, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(140602, 'TABASCA', 1406, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(140603, 'LAS ALHUACAS', 1406, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(140604, 'CHAGUARAMAS', 1406, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(140701, 'EL FURRIAL', 1407, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(140702, 'JUSEPIN', 1407, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(140703, 'EL COROZO', 1407, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(140704, 'SAN VICENTE', 1407, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(140705, 'LA PICA', 1407, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(140706, 'ALTO DE LOS GODOS', 1407, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(140707, 'BOQUERON', 1407, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(140708, 'LAS COCUIZAS', 1407, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(140709, 'SANTA CRUZ', 1407, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(140710, 'SAN SIMON', 1407, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(140711, 'C.M. MATURIN', 1407, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(140801, 'ARAGUA', 1408, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(140802, 'CHAGUARAMAL', 1408, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(140803, 'GUANAGUANA', 1408, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(140804, 'APARICIO', 1408, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(140805, 'TAGUAYA', 1408, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(140806, 'EL PINTO', 1408, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(140807, 'LA TOSCANA', 1408, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(140901, 'QUIRIQUIRE', 1409, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(140902, 'CACHIPO', 1409, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(141001, 'BARRANCAS', 1410, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(141002, 'LOS BARRANCOS DE FAJARDO', 1410, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(141101, 'AGUASAY', 1411, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(141201, 'SANTA BARBARA', 1412, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(141301, 'URACOA', 1413, 14, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(150101, 'LA ASUNCION', 1501, 15, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(150201, 'SAN JUAN BAUTISTA', 1502, 15, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(150202, 'ZABALA', 1502, 15, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(150301, 'SANTA ANA', 1503, 15, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(150302, 'GUEVARA', 1503, 15, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(150303, 'MATASIETE', 1503, 15, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(150304, 'BOLIVAR', 1503, 15, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(150305, 'SUCRE', 1503, 15, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(150401, 'PAMPATAR', 1504, 15, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(150402, 'AGUIRRE', 1504, 15, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(150501, 'JUAN GRIEGO', 1505, 15, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(150502, 'ADRIAN', 1505, 15, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(150601, 'PORLAMAR', 1506, 15, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(150701, 'BOCA DEL RIO', 1507, 15, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(150702, 'SAN FRANCISCO', 1507, 15, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(150801, 'SAN PEDRO DE COCHE', 1508, 15, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(150802, 'VICENTE FUENTES', 1508, 15, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(150901, 'PUNTA DE PIEDRAS', 1509, 15, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(150902, 'LOS BARALES', 1509, 15, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(151001, 'LA PLAZA DE PARAGUACHI', 1510, 15, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(151101, 'VALLE ESP SANTO', 1511, 15, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(151102, 'FRANCISCO FAJARDO', 1511, 15, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(160101, 'ARAURE', 1601, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(160102, 'RIO ACARIGUA', 1601, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(160201, 'PIRITU', 1602, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(160202, 'UVERAL', 1602, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(160301, 'GUANARE', 1603, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(160302, 'CORDOBA', 1603, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(160303, 'SAN JUAN GUANAGUANARE', 1603, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(160304, 'VIRGEN DE LA COROMOTO', 1603, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(160305, 'SAN JOSE DE LA MONTAÑA', 1603, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(160401, 'GUANARITO', 1604, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(160402, 'TRINIDAD DE LA CAPILLA', 1604, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(160403, 'DIVINA PASTORA', 1604, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(160501, 'OSPINO', 1605, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(160502, 'APARICION', 1605, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(160503, 'LA ESTACION', 1605, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(160601, 'ACARIGUA', 1606, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(160602, 'PAYARA', 1606, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(160603, 'PIMPINELA', 1606, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(160604, 'RAMON PERAZA', 1606, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(160701, 'BISCUCUY', 1607, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(160702, 'CONCEPCION', 1607, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(160703, 'SAN RAFAEL PALO ALZADO', 1607, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(160704, 'UVENCIO A VELASQUEZ', 1607, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(160705, 'SAN JOSE DE SAGUAZ', 1607, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(160706, 'VILLA ROSA', 1607, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(160801, 'VILLA BRUZUAL', 1608, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(160802, 'CANELONES', 1608, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(160803, 'SANTA CRUZ', 1608, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(160804, 'SAN ISIDRO LABRADOR', 1608, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(160901, 'CHABASQUEN', 1609, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(160902, 'PEÑA BLANCA', 1609, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(161001, 'AGUA BLANCA', 1610, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(161101, 'PAPELON', 1611, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(161102, 'CAÑO DELGADITO', 1611, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(161201, 'BOCONOITO', 1612, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(161202, 'ANTOLIN TOVAR AQUINO', 1612, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(161301, 'SAN RAFAEL DE ONOTO', 1613, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(161302, 'SANTA FE', 1613, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(161303, 'THERMO MORALES', 1613, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(161401, 'EL PLAYON', 1614, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(161402, 'FLORIDA', 1614, 16, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170101, 'RIO CARIBE', 1701, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170102, 'SAN JUAN GALDONAS', 1701, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170103, 'PUERTO SANTO', 1701, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170104, 'EL MORRO DE PUERTO SANTO', 1701, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170105, 'ANTONIO JOSE DE SUCRE', 1701, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170201, 'EL PILAR', 1702, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170202, 'EL RINCON', 1702, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170203, 'GUARAUNOS', 1702, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170204, 'TUNAPUICITO', 1702, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170205, 'UNION', 1702, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170206, 'GENERAL FRANCISCO ANTONIO VAZQUEZ', 1702, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170301, 'SANTA CATALINA', 1703, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170302, 'SANTA ROSA', 1703, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170303, 'SANTA TERESA', 1703, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170304, 'BOLIVAR', 1703, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170305, 'MACARAPANA', 1703, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170401, 'YAGUARAPARO', 1704, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170402, 'LIBERTAD', 1704, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170403, 'PAUJIL', 1704, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170501, 'IRAPA', 1705, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170502, 'CAMPO CLARO', 1705, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170503, 'SORO', 1705, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170504, 'SAN ANTONIO DE IRAPA', 1705, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170505, 'MARABAL', 1705, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170601, 'SAN ANT DEL GOLFO', 1706, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170701, 'CUMANACOA', 1707, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170702, 'ARENAS', 1707, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170703, 'ARICAGUA', 1707, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170704, 'COCOLLAR', 1707, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170705, 'SAN FERNANDO', 1707, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170706, 'SAN LORENZO', 1707, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170801, 'CARIACO', 1708, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170802, 'CATUARO', 1708, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170803, 'RENDON', 1708, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170804, 'SANTA CRUZ', 1708, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170805, 'SANTA MARIA', 1708, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170901, 'ALTAGRACIA', 1709, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170902, 'AYACUCHO', 1709, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170903, 'SANTA INES', 1709, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170904, 'VALENTIN VALIENTE', 1709, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170905, 'SAN JUAN', 1709, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170906, 'GRAN MARISCAL', 1709, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170907, 'RAUL LEONI', 1709, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(171001, 'GUIRIA', 1710, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(171002, 'CRISTOBAL COLON', 1710, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(171003, 'PUNTA DE PIEDRAS', 1710, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(171004, 'BIDEAU', 1710, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(171101, 'MARIÑO', 1711, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(171102, 'ROMULO GALLEGOS', 1711, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(171201, 'TUNAPUY', 1712, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(171202, 'CAMPO ELIAS', 1712, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(171301, 'SAN JOSE DE AREOCUAR', 1713, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(171302, 'TAVERA ACOSTA', 1713, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(171401, 'MARIGUITAR', 1714, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(171501, 'ARAYA', 1715, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(171502, 'MANICUARE', 1715, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(171503, 'CHACOPATA', 1715, 17, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(180101, 'COLON', 1801, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(180102, 'RIVAS BERTI', 1801, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(180103, 'SAN PEDRO DEL RIO', 1801, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(180201, 'SAN ANTONIO DEL TACHIRA', 1802, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(180202, 'PALOTAL', 1802, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(180203, 'JUAN VICENTE GOMEZ', 1802, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(180204, 'ISAIAS MEDINA ANGARITA', 1802, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(180301, 'CAPACHO NUEVO', 1803, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(180302, 'JUAN GERMAN ROSCIO', 1803, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(180303, 'ROMAN CARDENAS', 1803, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(180401, 'TARIBA', 1804, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(180402, 'LA FLORIDA', 1804, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(180403, 'AMENODORO RANGEL LAMUS', 1804, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(180501, 'LA GRITA', 1805, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(180502, 'EMILIO CONSTANTINO GUERRERO', 1805, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(180503, 'MONSEÑOR MIGUEL ANTONIO SALAS', 1805, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(180601, 'RUBIO', 1806, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(180602, 'BRAMON', 1806, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(180603, 'LA PETROLEA', 1806, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(180604, 'QUINIMARI', 1806, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(180701, 'LOBATERA', 1807, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(180702, 'CONSTITUCION', 1807, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(180801, 'LA CONCORDIA', 1808, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(180802, 'PEDRO MARIA MORANTES', 1808, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(180803, 'SN JUAN BAUTISTA', 1808, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(180804, 'SAN SEBASTIAN', 1808, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(180805, 'DR. FCO. ROMERO LOBO', 1808, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(180901, 'PREGONERO', 1809, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(180902, 'CARDENAS', 1809, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(180903, 'POTOSI', 1809, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(180904, 'JUAN PABLO PEÑALOZA', 1809, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(181001, 'SANTA ANA  DEL TACHIRA', 1810, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(181101, 'LA FRIA', 1811, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(181102, 'BOCA DE GRITA', 1811, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(181103, 'JOSE ANTONIO PAEZ', 1811, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(181201, 'PALMIRA', 1812, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(181301, 'MICHELENA', 1813, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(181401, 'ABEJALES', 1814, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(181402, 'SAN JOAQUIN DE NAVAY', 1814, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(181403, 'DORADAS', 1814, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(181404, 'EMETERIO OCHOA', 1814, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(181501, 'COLONCITO', 1815, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(181502, 'LA PALMITA', 1815, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(181601, 'UREÑA', 1816, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(181602, 'NUEVA ARCADIA', 1816, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(181701, 'QUENIQUEA', 1817, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(181702, 'SAN PABLO', 1817, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(181703, 'ELEAZAR LOPEZ CONTRERAS', 1817, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(181801, 'CORDERO', 1818, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(181901, 'SAN RAFAEL DEL PINAL', 1819, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(181902, 'SANTO DOMINGO', 1819, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(181903, 'ALBERTO ADRIANI', 1819, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(182001, 'CAPACHO VIEJO', 1820, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(182002, 'CIPRIANO CASTRO', 1820, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(182003, 'MANUEL FELIPE RUGELES', 1820, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(182101, 'LA TENDIDA', 1821, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(182102, 'BOCONO', 1821, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(182103, 'HERNANDEZ', 1821, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(182201, 'SEBORUCO', 1822, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(182301, 'LAS MESAS', 1823, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(182401, 'SAN JOSE DE BOLIVAR', 1824, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(182501, 'EL COBRE', 1825, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(182601, 'DELICIAS', 1826, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(182701, 'SAN SIMON', 1827, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(182801, 'SAN JOSECITO', 1828, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(182901, 'UMUQUENA', 1829, 18, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190101, 'BETIJOQUE', 1901, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190102, 'JOSE G HERNANDEZ', 1901, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190103, 'LA PUEBLITA', 1901, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190104, 'EL CEDRO', 1901, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190201, 'BOCONO', 1902, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190202, 'EL CARMEN', 1902, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190203, 'MOSQUEY', 1902, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190204, 'AYACUCHO', 1902, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190205, 'BURBUSAY', 1902, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190206, 'GENERAL RIVAS', 1902, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190207, 'MONSEÑOR JAUREGUI', 1902, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190208, 'RAFAEL RANGEL', 1902, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190209, 'SAN JOSE', 1902, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190210, 'SAN MIGUEL', 1902, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190211, 'GUARAMACAL', 1902, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190212, 'LA VEGA DE GUARAMACAL', 1902, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190301, 'CARACHE', 1903, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190302, 'LA CONCEPCION', 1903, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190303, 'CUICAS', 1903, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190304, 'PANAMERICANA', 1903, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190305, 'SANTA CRUZ', 1903, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190401, 'ESCUQUE', 1904, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190402, 'SABANA LIBRE', 1904, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190403, 'LA UNION', 1904, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190404, 'SANTA RITA', 1904, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190501, 'CRISTOBAL MENDOZA', 1905, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190502, 'CHIQUINQUIRA', 1905, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190503, 'MATRIZ', 1905, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190504, 'MONSEÑOR CARRILLO', 1905, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190505, 'CRUZ CARRILLO', 1905, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190506, 'ANDRES LINARES', 1905, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190507, 'TRES ESQUINAS', 1905, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190601, 'LA QUEBRADA', 1906, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190602, 'JAJO', 1906, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190603, 'LA MESA', 1906, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190604, 'SANTIAGO', 1906, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190605, 'CABIMBU', 1906, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190606, 'TUÑAME', 1906, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190701, 'MERCEDES DIAZ', 1907, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190702, 'JUAN IGNACIO MONTILLA', 1907, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190703, 'LA BEATRIZ', 1907, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190704, 'MENDOZA', 1907, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190705, 'LA PUERTA', 1907, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190706, 'SAN LUIS', 1907, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190801, 'CHEJENDE', 1908, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190802, 'CARRILLO', 1908, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190803, 'CEGARRA', 1908, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190804, 'BOLIVIA', 1908, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190805, 'MANUEL SALVADOR ULLOA', 1908, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190806, 'SAN JOSE', 1908, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190807, 'ARNOLDO GABALDON', 1908, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190901, 'EL DIVIDIVE', 1909, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190902, 'AGUA CALIENTE', 1909, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190903, 'EL CENIZO', 1909, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190904, 'AGUA SANTA', 1909, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190905, 'VALERITA', 1909, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(191001, 'MONTE CARMELO', 1910, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(191002, 'BUENA VISTA', 1910, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(191003, 'STA MARIA DEL HORCON', 1910, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(191101, 'MOTATAN', 1911, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(191102, 'EL BAÑO', 1911, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(191103, 'EL JALISCO', 1911, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(191201, 'PAMPAN', 1912, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(191202, 'SANTA ANA', 1912, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(191203, 'LA PAZ', 1912, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(191204, 'FLOR DE PATRIA', 1912, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(191301, 'CARVAJAL', 1913, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(191302, 'ANTONIO N BRICEÑO', 1913, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(191303, 'CAMPO ALEGRE', 1913, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(191304, 'JOSE LEONARDO SUAREZ', 1913, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(191401, 'SABANA DE MENDOZA', 1914, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(191402, 'JUNIN', 1914, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(191403, 'VALMORE RODRIGUEZ', 1914, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(191404, 'EL PARAISO', 1914, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(191501, 'SANTA ISABEL', 1915, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(191502, 'ARAGUANEY', 1915, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(191503, 'EL JAGUITO', 1915, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(191504, 'LA ESPERANZA', 1915, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(191601, 'SABANA GRANDE', 1916, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(191602, 'CHEREGUE', 1916, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(191603, 'GRANADOS', 1916, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(191701, 'EL SOCORRO', 1917, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(191702, 'LOS CAPRICHOS', 1917, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(191703, 'ANTONIO JOSE DE SUCRE', 1917, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(191801, 'CAMPO ELIAS', 1918, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(191802, 'ARNOLDO GABALDON', 1918, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(191901, 'SANTA APOLONIA', 1919, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(191902, 'LA CEIBA', 1919, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(191903, 'EL PROGRESO', 1919, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(191904, 'TRES DE FEBRERO', 1919, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(192001, 'PAMPANITO', 1920, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(192002, 'PAMPANITO II', 1920, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(192003, 'LA CONCEPCION', 1920, 19, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(200101, 'AROA', 2001, 20, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(200201, 'CHIVACOA', 2002, 20, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(200202, 'CAMPO ELIAS', 2002, 20, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(200301, 'NIRGUA', 2003, 20, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(200302, 'SALOM', 2003, 20, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(200303, 'TEMERLA', 2003, 20, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(200401, 'SAN FELIPE', 2004, 20, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(200402, 'ALBARICO', 2004, 20, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(200403, 'SAN JAVIER', 2004, 20, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(200501, 'GUAMA', 2005, 20, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(200601, 'URACHICHE', 2006, 20, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(200701, 'YARITAGUA', 2007, 20, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(200702, 'SAN ANDRES', 2007, 20, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(200801, 'SABANA DE PARRA', 2008, 20, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(200901, 'BORAURE', 2009, 20, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(201001, 'COCOROTE', 2010, 20, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(201101, 'INDEPENDENCIA', 2011, 20, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(201201, 'SAN PABLO', 2012, 20, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(201301, 'YUMARE', 2013, 20, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(201401, 'FARRIAR', 2014, 20, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(201402, 'EL GUAYABO', 2014, 20, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210101, 'GENERAL URDANETA', 2101, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210102, 'LIBERTADOR', 2101, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210103, 'MANUEL GUANIPA MATOS', 2101, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210104, 'MARCELINO BRICEÑO', 2101, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210105, 'SAN TIMOTEO', 2101, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210106, 'PUEBLO NUEVO', 2101, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210201, 'PEDRO LUCAS URRIBARRI', 2102, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210202, 'SANTA RITA', 2102, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210203, 'JOSE CENOVIO URRIBARRI', 2102, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210204, 'EL MENE', 2102, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210301, 'SANTA CRUZ DEL ZULIA', 2103, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210302, 'URRIBARRI', 2103, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210303, 'MORALITO', 2103, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210304, 'SAN CARLOS DEL ZULIA', 2103, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210305, 'SANTA BARBARA', 2103, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210401, 'LUIS DE VICENTE', 2104, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210402, 'RICAURTE', 2104, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210403, 'MONS.MARCOS SERGIO G', 2104, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210404, 'SAN RAFAEL', 2104, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210405, 'LAS PARCELAS', 2104, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210406, 'TAMARE', 2104, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210407, 'LA SIERRITA', 2104, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210501, 'BOLIVAR', 2105, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210502, 'COQUIVACOA', 2105, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210503, 'CRISTO DE ARANZA', 2105, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210504, 'CHIQUINQUIRA', 2105, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210505, 'SANTA LUCIA', 2105, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210506, 'OLEGARIO VILLALOBOS', 2105, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210507, 'JUANA DE AVILA', 2105, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210508, 'CARACCIOLO PARRA PEREZ', 2105, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210509, 'IDELFONZO VASQUEZ', 2105, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210510, 'CACIQUE MARA', 2105, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210511, 'CECILIO ACOSTA', 2105, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210512, 'RAUL LEONI', 2105, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210513, 'FRANCISCO EUGENIO BUSTAMANTE', 2105, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210514, 'MANUEL DAGNINO', 2105, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210515, 'LUIS HURTADO HIGUERA', 2105, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210516, 'VENANCIO PULGAR', 2105, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210517, 'ANTONIO BORJAS ROMERO', 2105, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210518, 'SAN ISIDRO', 2105, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210601, 'FARIA', 2106, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210602, 'SAN ANTONIO', 2106, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210603, 'ANA MARIA CAMPOS', 2106, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210604, 'SAN JOSE', 2106, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210605, 'ALTAGRACIA', 2106, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210701, 'GOAJIRA', 2107, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210702, 'ELIAS SANCHEZ RUBIO', 2107, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210703, 'SINAMAICA', 2107, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210704, 'ALTA GUAJIRA', 2107, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210801, 'SAN JOSE DE PERIJA', 2108, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210802, 'BARTOLOME DE LAS CASAS', 2108, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210803, 'LIBERTAD', 2108, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210804, 'RIO NEGRO', 2108, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210901, 'GIBRALTAR', 2109, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210902, 'HERAS', 2109, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210903, 'M.ARTURO CELESTINO A', 2109, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210904, 'ROMULO GALLEGOS', 2109, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210905, 'BOBURES', 2109, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210906, 'EL BATEY', 2109, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211001, 'ANDRES BELLO (KM 48)', 2110, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211002, 'POTRERITOS', 2110, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211003, 'EL CARMELO', 2110, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211004, 'CHIQUINQUIRA', 2110, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211005, 'CONCEPCION', 2110, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211101, 'ELEAZAR LOPEZ CONTRERAS', 2111, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211102, 'ALONSO DE OJEDA', 2111, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211103, 'VENEZUELA', 2111, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211104, 'CAMPO LARA', 2111, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211105, 'LIBERTAD', 2111, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211106, 'EL DANTO', 2111, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211201, 'UDON PEREZ', 2112, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211202, 'ENCONTRADOS', 2112, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211301, 'DONALDO GARCIA', 2113, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211302, 'SIXTO ZAMBRANO', 2113, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211303, 'EL ROSARIO', 2113, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211401, 'AMBROSIO', 2114, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211402, 'GERMAN RIOS LINARES', 2114, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211403, 'JORGE HERNANDEZ', 2114, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211404, 'LA ROSA', 2114, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211405, 'PUNTA GORDA', 2114, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211406, 'CARMEN HERRERA', 2114, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211407, 'SAN BENITO', 2114, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211408, 'ROMULO BETANCOURT', 2114, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211409, 'ARISTIDES CALVANI', 2114, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211501, 'RAUL CUENCA', 2115, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211502, 'LA VICTORIA', 2115, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211503, 'RAFAEL URDANETA', 2115, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211601, 'JOSE RAMON YEPEZ', 2116, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211602, 'LA CONCEPCION', 2116, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211603, 'SAN JOSE', 2116, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211604, 'MARIANO PARRA LEON', 2116, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211701, 'MONAGAS', 2117, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211702, 'ISLA DE TOAS', 2117, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211801, 'MARCIAL HERNANDEZ', 2118, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211802, 'FRANCISCO OCHOA', 2118, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211803, 'SAN FRANCISCO', 2118, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211804, 'EL BAJO', 2118, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211805, 'DOMITILA FLORES', 2118, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211806, 'LOS CORTIJOS', 2118, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211807, 'JOSE DOMINGO RUS', 2118, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211901, 'BARI', 2119, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211902, 'JESUS M SEMPRUN', 2119, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(212001, 'SIMON RODRIGUEZ', 2120, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(212002, 'CARLOS QUEVEDO', 2120, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(212003, 'FRANCISCO J PULGAR', 2120, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(212004, 'AGUSTIN CODAZZI', 2120, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(212101, 'RAFAEL MARIA BARALT', 2121, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(212102, 'MANUEL MANRIQUE', 2121, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(212103, 'RAFAEL URDANETA', 2121, 21, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(220101, 'FERNANDO GIRON TOVAR', 2201, 22, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(220102, 'LUIS ALBERTO GOMEZ', 2201, 22, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(220103, 'PARHUEÑA', 2201, 22, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(220104, 'PLATANILLAL', 2201, 22, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(220201, 'SAN FERNANDO DE ATABAPO', 2202, 22, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(220202, 'UCATA', 2202, 22, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(220203, 'YAPACANA', 2202, 22, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(220204, 'CANAME', 2202, 22, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(220301, 'MAROA', 2203, 22, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(220302, 'VICTORINO', 2203, 22, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(220303, 'COMUNIDAD', 2203, 22, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(220401, 'SAN CARLOS DE RIO NEGRO', 2204, 22, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(220402, 'SOLANO', 2204, 22, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(220403, 'CASIQUIARE', 2204, 22, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(220404, 'COCUY', 2204, 22, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(220501, 'ISLA DE RATON', 2205, 22, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(220502, 'SAMARIAPO', 2205, 22, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(220503, 'SIPAPO', 2205, 22, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(220504, 'MUNDUAPO', 2205, 22, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(220505, 'GUAYAPO', 2205, 22, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(220601, 'SAN JUAN DE MANAPIARE', 2206, 22, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(220602, 'ALTO VENTUARI', 2206, 22, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(220603, 'MEDIO VENTUARI', 2206, 22, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(220604, 'BAJO VENTUARI', 2206, 22, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(220701, 'LA ESMERALDA', 2207, 22, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(220702, 'HUACHAMACARE', 2207, 22, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(220703, 'MARAWAKA', 2207, 22, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(220704, 'MAVACA', 2207, 22, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(220705, 'SIERRA PARIMA', 2207, 22, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(230101, 'SAN JOSE', 2301, 23, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(230102, 'VIRGEN DEL VALLE', 2301, 23, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(230103, 'SAN RAFAEL', 2301, 23, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(230104, 'JOSE VIDAL MARCANO', 2301, 23, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(230105, 'LEONARDO RUIZ PINEDA', 2301, 23, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(230106, 'MONS. ARGIMIRO GARCIA', 2301, 23, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(230107, 'MCL. ANTONIO J DE SUCRE', 2301, 23, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(230108, 'JUAN MILLAN', 2301, 23, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(230201, 'PEDERNALES', 2302, 23, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(230202, 'LUIS B PRIETO FIGUERO', 2302, 23, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(230301, 'CURIAPO', 2303, 23, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(230302, 'SANTOS DE ABELGAS', 2303, 23, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(230303, 'MANUEL RENAUD', 2303, 23, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(230304, 'PADRE BARRAL', 2303, 23, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(230305, 'ANICETO LUGO', 2303, 23, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(230306, 'ALMIRANTE LUIS BRION', 2303, 23, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(230401, 'IMATACA', 2304, 23, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(230402, 'ROMULO GALLEGOS', 2304, 23, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(230403, 'JUAN BAUTISTA ARISMEN', 2304, 23, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(230404, 'MANUEL PIAR', 2304, 23, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(240101, 'CARABALLEDA', 2401, 24, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(240102, 'CARAYACA', 2401, 24, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(240103, 'CARUAO', 2401, 24, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(240104, 'CATIA LA MAR', 2401, 24, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(240105, 'LA GUAIRA', 2401, 24, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(240106, 'MACUTO', 2401, 24, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(240107, 'MAIQUETIA', 2401, 24, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(240108, 'NAIGUATA', 2401, 24, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(240109, 'EL JUNKO', 2401, 24, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(240110, 'URIMARE', 2401, 24, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(240111, 'CARLOS SOUBLETTE', 2401, 24, '2020-04-20 01:55:55', '2020-04-20 01:55:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `people`
--

CREATE TABLE `people` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nacionalidad` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cedula` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_pr` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_seg` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellido_pr` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_seg` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_nac` date NOT NULL,
  `genero` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telf_local` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telf_celular` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession_id` bigint(20) UNSIGNED NOT NULL,
  `academiclevel_id` bigint(20) UNSIGNED NOT NULL,
  `direccion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avenida` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calle` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_id` bigint(20) UNSIGNED NOT NULL,
  `municipio_id` bigint(20) UNSIGNED NOT NULL,
  `parroquia_id` bigint(20) UNSIGNED NOT NULL,
  `foto_img` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagina_web` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `people`
--

INSERT INTO `people` (`id`, `nacionalidad`, `cedula`, `nombre_pr`, `nombre_seg`, `apellido_pr`, `apellido_seg`, `fecha_nac`, `genero`, `email`, `telf_local`, `telf_celular`, `profession_id`, `academiclevel_id`, `direccion`, `avenida`, `calle`, `estado_id`, `municipio_id`, `parroquia_id`, `foto_img`, `twitter`, `facebook`, `instagram`, `pagina_web`, `users_id`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'V', '22567890', 'STEFANO', 'JOSE', 'DE GENARO', 'JOSE', '2018-01-09', 'M', 'nami@gmail.com', '02124849250', '04142544444', 13, 2, 'asdasd', 'Av San Martin', 'Calle San juan', 24, 2401, 240102, 'sin_foto.png', 'stefanoTwitter', NULL, NULL, NULL, 1, 1, '2020-05-28 08:24:51', '2020-05-28 08:24:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'List role', 'role.index', 'A user can list role', '2020-04-20 05:55:55', '2020-04-20 05:55:55'),
(2, 'Show role', 'role.show', 'A user can see role', '2020-04-20 05:55:55', '2020-04-20 05:55:55'),
(3, 'Create role', 'role.create', 'A user can create role', '2020-04-20 05:55:55', '2020-04-20 05:55:55'),
(4, 'Edit role', 'role.edit', 'A user can edit role', '2020-04-20 05:55:55', '2020-04-20 05:55:55'),
(5, 'Destroy role', 'role.destroy', 'A user can destroy role', '2020-04-20 05:55:55', '2020-04-20 05:55:55'),
(6, 'List user', 'user.index', 'A user can list user', '2020-04-20 05:55:55', '2020-04-20 05:55:55'),
(7, 'Show user', 'user.show', 'A user can see user', '2020-04-20 05:55:55', '2020-04-20 05:55:55'),
(8, 'Edit user', 'user.edit', 'A user can edit user', '2020-04-20 05:55:55', '2020-04-20 05:55:55'),
(9, 'Destroy user', 'user.destroy', 'A user can destroy user', '2020-04-20 05:55:55', '2020-04-20 05:55:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personcommittees`
--

CREATE TABLE `personcommittees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `person_id` bigint(20) UNSIGNED NOT NULL,
  `localcommitte_id` bigint(20) UNSIGNED NOT NULL,
  `position_id` bigint(20) UNSIGNED NOT NULL,
  `observaciones` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personstructures`
--

CREATE TABLE `personstructures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `person_id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `position_id` bigint(20) UNSIGNED NOT NULL,
  `observaciones` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado_id` bigint(20) UNSIGNED DEFAULT NULL,
  `municipio_id` bigint(20) UNSIGNED DEFAULT NULL,
  `parroquia_id` bigint(20) UNSIGNED DEFAULT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personvotes`
--

CREATE TABLE `personvotes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `person_id` bigint(20) UNSIGNED NOT NULL,
  `centervote_id` bigint(20) UNSIGNED NOT NULL,
  `observaciones` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `electorallist_id` bigint(20) UNSIGNED NOT NULL,
  `periodo_id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisions_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `positions`
--

INSERT INTO `positions` (`id`, `descripcion`, `divisions_id`, `status_id`, `created_at`, `updated_at`) VALUES
(1, '	SECRETARIO GENERAL	 ', 1, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2, '	SECRETARIA DE ORGANIZACIÓN	 ', 1, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(3, '	SECRETARIO SINDICAL	 ', 1, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(4, '	SECRETARIO AGRARIO	 ', 1, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(5, '	SECRETARIA FEMENINA	 ', 1, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(6, '	SECRETARIA JUVENIL	 ', 1, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(7, '	SECRETARIA DE EDUCACION	 ', 1, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(8, '	SECRETARIA DE PROFESIONALES Y TECNICOS	 ', 1, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(9, '	SECRETARIO DE ASUNTOS MUNICIPALES Y COMUNALES	 ', 1, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(10, '	SECRETARIO DE CULTURA	 ', 1, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(11, '	SECRETARIO POLITICO 1  (Sub Secretario General)	 ', 1, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(12, '	SECRETARIO POLITICO 2 (Sub Secretario de Organización)	 ', 1, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(13, '	SECRETARIO POLITICO 3	 ', 1, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(14, '	SECRETARIO POLITICO 4	 ', 1, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(15, '	SECRETARIO POLITICO 5	 ', 1, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(16, '	SECRETARIO POLITICO 6	 ', 1, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(17, '	SECRETARIO POLITICO 7	 ', 1, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(18, '	SECRETARIO POLITICO 8	 ', 1, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(19, '	SECRETARIO POLITICO 9	 ', 1, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(20, '	SECRETARIO POLITICO 10	 ', 1, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(21, '	SECRETARIO POLITICO 11	 ', 1, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(22, '	DELEGADO AL CDN	 ', 1, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(23, '	DELEGADO AL CDN	 ', 1, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(24, '	DELEGADO AL CDN	 ', 1, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(25, '	SECRETARIO EJECUTIVO	 ', 1, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(26, '	JEFE DIVISION DE  ACTIVISMO	 ', 1, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(27, '	JEFE DIVISION DE SISTEMATIZACION Y CONROL ELECTORAL	 ', 1, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(28, '	JEFE DIVISION DE REGISTRO Y ESTADISTICA	 ', 1, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(29, '	JEFE DIVISION DE AUDITORIA, CONTROL Y SEGUIMIENTO	 ', 1, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(30, '	DIRECTOR DEPARTAMENTO DE FINANZAS	 ', 1, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(31, '	DIRECTOR DEPARTAMENTO DE CAPACITACION Y DOCTRINA	 ', 1, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(32, '	DIRECTOR DEPARTAMENTO DE  PRENSA	 ', 1, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(33, '	SECRETARIO SECTORIAL	 ', 2, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(34, '	MIEMBRO 1 DEL BURO (SUBSECRETARIO DEL SECTOR)	 ', 2, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(35, '	MIEMBRO 2 DEL BURO 	 ', 2, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(36, '	MIEMBRO 3 DEL BURO 	 ', 2, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(37, '	MIEMBRO 4 DEL BURO 	 ', 2, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(38, '	MIEMBRO 5 DEL BURO 	 ', 2, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(39, '	MIEMBRO 6 DEL BURO 	 ', 2, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(40, '	MIEMBRO 7 DEL BURO 	 ', 2, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(41, '	MIEMBRO 8 DEL BURO 	 ', 2, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(42, '	MIEMBRO SUPLENTE 1 DEL BURO	 ', 2, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(43, '	MIEMBRO SUPLENTE  2 DEL BURO 	 ', 2, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(44, '	MIEMBRO SUPLENTE 3 DEL BURO 	 ', 2, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(45, '	MIEMBRO  SUPLENTE 4 DEL BURO 	 ', 2, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(46, '	MIEMBRO SUPLENTE 5 DEL BURO 	 ', 2, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(47, '	MIEMBRO  6 SUPLENTE DEL BURO 	 ', 2, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(48, '	MIEMBRO SUPLENTE 7 DEL BURO 	 ', 2, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(49, '	MIEMBRO SUPLENTE 8 DEL BURO 	 ', 2, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50, '	SECRETARIO SECTORIAL	 ', 3, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(51, '	MIEMBRO 1 DEL BURO (SUBSECRETARIO DEL SECTOR)	 ', 3, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(52, '	MIEMBRO 2 DEL BURO 	 ', 3, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(53, '	MIEMBRO 3 DEL BURO 	 ', 3, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(54, '	MIEMBRO 4 DEL BURO 	 ', 3, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(55, '	MIEMBRO 5 DEL BURO 	 ', 3, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(56, '	MIEMBRO 6 DEL BURO 	 ', 3, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(57, '	MIEMBRO 7 DEL BURO 	 ', 3, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(58, '	MIEMBRO 8 DEL BURO 	 ', 3, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(59, '	MIEMBRO SUPLENTE 1 DEL BURO	 ', 3, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60, '	MIEMBRO SUPLENTE  2 DEL BURO 	 ', 3, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(61, '	MIEMBRO SUPLENTE 3 DEL BURO 	 ', 3, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(62, '	MIEMBRO  SUPLENTE 4 DEL BURO 	 ', 3, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(63, '	MIEMBRO SUPLENTE 5 DEL BURO 	 ', 3, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(64, '	MIEMBRO  6 SUPLENTE DEL BURO 	 ', 3, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(65, '	MIEMBRO SUPLENTE 7 DEL BURO 	 ', 3, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(66, '	MIEMBRO SUPLENTE 8 DEL BURO 	 ', 3, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(67, '	SECRETARIO SECTORIAL	 ', 4, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(68, '	MIEMBRO 1 DEL BURO (SUBSECRETARIO DEL SECTOR)	 ', 4, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(69, '	MIEMBRO 2 DEL BURO 	 ', 4, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(70, '	MIEMBRO 3 DEL BURO 	 ', 4, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(71, '	MIEMBRO 4 DEL BURO 	 ', 4, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(72, '	MIEMBRO 5 DEL BURO 	 ', 4, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(73, '	MIEMBRO 6 DEL BURO 	 ', 4, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(74, '	MIEMBRO 7 DEL BURO 	 ', 4, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(75, '	MIEMBRO 8 DEL BURO 	 ', 4, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(76, '	MIEMBRO SUPLENTE 1 DEL BURO	 ', 4, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(77, '	MIEMBRO SUPLENTE  2 DEL BURO 	 ', 4, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(78, '	MIEMBRO SUPLENTE 3 DEL BURO 	 ', 4, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(79, '	MIEMBRO  SUPLENTE 4 DEL BURO 	 ', 4, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(80, '	MIEMBRO SUPLENTE 5 DEL BURO 	 ', 4, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(81, '	MIEMBRO  6 SUPLENTE DEL BURO 	 ', 4, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(82, '	MIEMBRO SUPLENTE 7 DEL BURO 	 ', 4, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(83, '	MIEMBRO SUPLENTE 8 DEL BURO 	 ', 4, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(84, '	SECRETARIO SECTORIAL	 ', 5, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(85, '	MIEMBRO 1 DEL BURO (SUBSECRETARIO DEL SECTOR)	 ', 5, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(86, '	MIEMBRO 2 DEL BURO 	 ', 5, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(87, '	MIEMBRO 3 DEL BURO 	 ', 5, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(88, '	MIEMBRO 4 DEL BURO 	 ', 5, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(89, '	MIEMBRO 5 DEL BURO 	 ', 5, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90, '	MIEMBRO 6 DEL BURO 	 ', 5, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(91, '	MIEMBRO 7 DEL BURO 	 ', 5, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(92, '	MIEMBRO 8 DEL BURO 	 ', 5, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(93, '	MIEMBRO SUPLENTE 1 DEL BURO	 ', 5, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(94, '	MIEMBRO SUPLENTE  2 DEL BURO 	 ', 5, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(95, '	MIEMBRO SUPLENTE 3 DEL BURO 	 ', 5, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(96, '	MIEMBRO  SUPLENTE 4 DEL BURO 	 ', 5, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(97, '	MIEMBRO SUPLENTE 5 DEL BURO 	 ', 5, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(98, '	MIEMBRO  6 SUPLENTE DEL BURO 	 ', 5, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(99, '	MIEMBRO SUPLENTE 7 DEL BURO 	 ', 5, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(100, '	MIEMBRO SUPLENTE 8 DEL BURO 	 ', 5, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(101, '	SECRETARIO SECTORIAL	 ', 6, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(102, '	MIEMBRO 1 DEL BURO (SUBSECRETARIO DEL SECTOR)	 ', 6, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(103, '	MIEMBRO 2 DEL BURO 	 ', 6, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(104, '	MIEMBRO 3 DEL BURO 	 ', 6, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(105, '	MIEMBRO 4 DEL BURO 	 ', 6, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(106, '	MIEMBRO 5 DEL BURO 	 ', 6, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(107, '	MIEMBRO 6 DEL BURO 	 ', 6, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(108, '	MIEMBRO 7 DEL BURO 	 ', 6, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(109, '	MIEMBRO 8 DEL BURO 	 ', 6, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(110, '	MIEMBRO SUPLENTE 1 DEL BURO	 ', 6, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(111, '	MIEMBRO SUPLENTE  2 DEL BURO 	 ', 6, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(112, '	MIEMBRO SUPLENTE 3 DEL BURO 	 ', 6, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(113, '	MIEMBRO  SUPLENTE 4 DEL BURO 	 ', 6, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(114, '	MIEMBRO SUPLENTE 5 DEL BURO 	 ', 6, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(115, '	MIEMBRO  6 SUPLENTE DEL BURO 	 ', 6, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(116, '	MIEMBRO SUPLENTE 7 DEL BURO 	 ', 6, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(117, '	MIEMBRO SUPLENTE 8 DEL BURO 	 ', 6, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(118, '	SECRETARIO SECTORIAL	 ', 7, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(119, '	MIEMBRO 1 DEL BURO (SUBSECRETARIO DEL SECTOR)	 ', 7, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120, '	MIEMBRO 2 DEL BURO 	 ', 7, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(121, '	MIEMBRO 3 DEL BURO 	 ', 7, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(122, '	MIEMBRO 4 DEL BURO 	 ', 7, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(123, '	MIEMBRO 5 DEL BURO 	 ', 7, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(124, '	MIEMBRO 6 DEL BURO 	 ', 7, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(125, '	MIEMBRO 7 DEL BURO 	 ', 7, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(126, '	MIEMBRO 8 DEL BURO 	 ', 7, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(127, '	MIEMBRO SUPLENTE 1 DEL BURO	 ', 7, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(128, '	MIEMBRO SUPLENTE  2 DEL BURO 	 ', 7, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(129, '	MIEMBRO SUPLENTE 3 DEL BURO 	 ', 7, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(130, '	MIEMBRO  SUPLENTE 4 DEL BURO 	 ', 7, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(131, '	MIEMBRO SUPLENTE 5 DEL BURO 	 ', 7, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(132, '	MIEMBRO  6 SUPLENTE DEL BURO 	 ', 7, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(133, '	MIEMBRO SUPLENTE 7 DEL BURO 	 ', 7, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(134, '	MIEMBRO SUPLENTE 8 DEL BURO 	 ', 7, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(135, '	SECRETARIO SECTORIAL	 ', 8, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(136, '	MIEMBRO 1 DEL BURO (SUBSECRETARIO DEL SECTOR)	 ', 8, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(137, '	MIEMBRO 2 DEL BURO 	 ', 8, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(138, '	MIEMBRO 3 DEL BURO 	 ', 8, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(139, '	MIEMBRO 4 DEL BURO 	 ', 8, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(140, '	MIEMBRO 5 DEL BURO 	 ', 8, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(141, '	MIEMBRO 6 DEL BURO 	 ', 8, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(142, '	MIEMBRO 7 DEL BURO 	 ', 8, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(143, '	MIEMBRO 8 DEL BURO 	 ', 8, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(144, '	MIEMBRO SUPLENTE 1 DEL BURO	 ', 8, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(145, '	MIEMBRO SUPLENTE  2 DEL BURO 	 ', 8, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(146, '	MIEMBRO SUPLENTE 3 DEL BURO 	 ', 8, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(147, '	MIEMBRO  SUPLENTE 4 DEL BURO 	 ', 8, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(148, '	MIEMBRO SUPLENTE 5 DEL BURO 	 ', 8, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(149, '	MIEMBRO  6 SUPLENTE DEL BURO 	 ', 8, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(150, '	MIEMBRO SUPLENTE 7 DEL BURO 	 ', 8, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(151, '	MIEMBRO SUPLENTE 8 DEL BURO 	 ', 8, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(152, '	SECRETARIO SECTORIAL	 ', 9, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(153, '	MIEMBRO 1 DEL BURO (SUBSECRETARIO DEL SECTOR)	 ', 9, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(154, '	MIEMBRO 2 DEL BURO 	 ', 9, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(155, '	MIEMBRO 3 DEL BURO 	 ', 9, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(156, '	MIEMBRO 4 DEL BURO 	 ', 9, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(157, '	MIEMBRO 5 DEL BURO 	 ', 9, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(158, '	MIEMBRO 6 DEL BURO 	 ', 9, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(159, '	MIEMBRO 7 DEL BURO 	 ', 9, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(160, '	MIEMBRO 8 DEL BURO 	 ', 9, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(161, '	MIEMBRO SUPLENTE 1 DEL BURO	 ', 9, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(162, '	MIEMBRO SUPLENTE  2 DEL BURO 	 ', 9, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(163, '	MIEMBRO SUPLENTE 3 DEL BURO 	 ', 9, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(164, '	MIEMBRO  SUPLENTE 4 DEL BURO 	 ', 9, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(165, '	MIEMBRO SUPLENTE 5 DEL BURO 	 ', 9, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(166, '	MIEMBRO  6 SUPLENTE DEL BURO 	 ', 9, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(167, '	MIEMBRO SUPLENTE 7 DEL BURO 	 ', 9, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(168, '	MIEMBRO SUPLENTE 8 DEL BURO 	 ', 9, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(169, '	SECRETARIO GENERAL	 ', 10, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(170, '	SECRETARIA DE ORGANIZACIÓN	 ', 10, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(171, '	SECRETARIO SINDICAL	 ', 10, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(172, '	SECRETARIO AGRARIO	 ', 10, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(173, '	SECRETARIA FEMENINA	 ', 10, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(174, '	SECRETARIA JUVENIL	 ', 10, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(175, '	SECRETARIA DE EDUCACION	 ', 10, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(176, '	SECRETARIA DE PROFESIONALES Y TECNICOS	 ', 10, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(177, '	SECRETARIO DE ASUNTOS MUNICIPALES Y COMUNALES	 ', 10, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(178, '	SECRETARIO DE CULTURA	 ', 10, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(179, '	SECRETARIO POLITICO 1 (Sub Secretario General)	 ', 10, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(180, '	SECRETARIO POLITICO 2 (Sub Secretario de Organización)	 ', 10, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(181, '	SECRETARIO POLITICO 3	 ', 10, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(182, '	SECRETARIO POLITICO 4	 ', 10, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(183, '	SECRETARIO POLITICO 5	 ', 10, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(184, '	SECRETARIO POLITICO 6	 ', 10, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(185, '	SECRETARIO POLITICO 7	 ', 10, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(186, '	SECRETARIO POLITICO 8 	 ', 10, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(187, '	DELEGADO AL CDS	 ', 10, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(188, '	DELEGADO AL CDS	 ', 10, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(189, '	DELEGADO AL CDS	 ', 10, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(190, '	SECRETARIO EJECUTIVO	 ', 10, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(191, '	JEFE DIVISION DE ACTIVISMO	 ', 10, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(192, '	JEFE DIVISION DE SISTEMATIZACION Y CONROL ELECTORAL	 ', 10, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(193, '	JEFE DIVISION DE REGISTRO Y ESTADISTICA	 ', 10, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(194, '	JEFE DIVISION DE AUDITORIA, CONTROL Y SEGUIMIENTO	 ', 10, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(195, '	DIRECTOR DEPARTAMENTO DE FINANZAS	 ', 10, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(196, '	DIRECTOR DEPARTAMENTO DE CAPACITACION Y DOCTRINA	 ', 10, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(197, '	DIRECTOR DEPARTAMENTO DE PRENSA	 ', 10, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(198, '	SECRETARIO SECTORIAL	 ', 11, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(199, '	MIEMBRO 1 DEL BURO (SUBSECRETARIO DEL SECTOR)	 ', 11, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(200, '	MIEMBRO 2 DEL BURO 	 ', 11, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(201, '	MIEMBRO 3 DEL BURO 	 ', 11, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(202, '	MIEMBRO 4 DEL BURO 	 ', 11, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(203, '	MIEMBRO 5 DEL BURO 	 ', 11, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(204, '	MIEMBRO 6 DEL BURO 	 ', 11, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(205, '	MIEMBRO SUPLENTE 1 DEL BURO	 ', 11, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(206, '	MIEMBRO SUPLENTE  2 DEL BURO 	 ', 11, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(207, '	MIEMBRO SUPLENTE 3 DEL BURO 	 ', 11, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(208, '	MIEMBRO  SUPLENTE 4 DEL BURO 	 ', 11, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(209, '	MIEMBRO SUPLENTE 5 DEL BURO 	 ', 11, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(210, '	MIEMBRO  6 SUPLENTE DEL BURO 	 ', 11, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(211, '	SECRETARIO SECTORIAL	 ', 11, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(212, '	MIEMBRO 1 DEL BURO (SUBSECRETARIO DEL SECTOR)	 ', 11, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(213, '	MIEMBRO 2 DEL BURO 	 ', 11, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(214, '	MIEMBRO 3 DEL BURO 	 ', 11, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(215, '	MIEMBRO 4 DEL BURO 	 ', 11, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(216, '	MIEMBRO 5 DEL BURO 	 ', 11, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(217, '	MIEMBRO 6 DEL BURO 	 ', 11, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(218, '	MIEMBRO SUPLENTE 1 DEL BURO	 ', 11, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(219, '	MIEMBRO SUPLENTE  2 DEL BURO 	 ', 11, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(220, '	MIEMBRO SUPLENTE 3 DEL BURO 	 ', 11, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(221, '	MIEMBRO  SUPLENTE 4 DEL BURO 	 ', 11, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(222, '	MIEMBRO SUPLENTE 5 DEL BURO 	 ', 11, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(223, '	MIEMBRO  6 SUPLENTE DEL BURO 	 ', 11, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(224, '	SECRETARIO SECTORIAL	 ', 11, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(225, '	MIEMBRO 1 DEL BURO (SUBSECRETARIO DEL SECTOR)	 ', 11, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(226, '	MIEMBRO 2 DEL BURO 	 ', 11, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(227, '	MIEMBRO 3 DEL BURO 	 ', 12, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(228, '	MIEMBRO 4 DEL BURO 	 ', 12, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(229, '	MIEMBRO 5 DEL BURO 	 ', 12, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(230, '	MIEMBRO 6 DEL BURO 	 ', 12, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(231, '	MIEMBRO SUPLENTE 1 DEL BURO	 ', 12, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(232, '	MIEMBRO SUPLENTE  2 DEL BURO 	 ', 12, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(233, '	MIEMBRO SUPLENTE 3 DEL BURO 	 ', 12, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(234, '	MIEMBRO  SUPLENTE 4 DEL BURO 	 ', 12, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(235, '	MIEMBRO SUPLENTE 5 DEL BURO 	 ', 12, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(236, '	MIEMBRO  6 SUPLENTE DEL BURO 	 ', 12, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(237, '	SECRETARIO SECTORIAL	 ', 12, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(238, '	MIEMBRO 1 DEL BURO (SUBSECRETARIO DEL SECTOR)	 ', 12, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(239, '	MIEMBRO 2 DEL BURO 	 ', 12, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(240, '	MIEMBRO 3 DEL BURO 	 ', 12, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(241, '	MIEMBRO 4 DEL BURO 	 ', 12, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(242, '	MIEMBRO 5 DEL BURO 	 ', 12, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(243, '	MIEMBRO 6 DEL BURO 	 ', 12, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(244, '	MIEMBRO SUPLENTE 1 DEL BURO	 ', 12, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(245, '	MIEMBRO SUPLENTE  2 DEL BURO 	 ', 12, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(246, '	MIEMBRO SUPLENTE 3 DEL BURO 	 ', 12, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(247, '	MIEMBRO  SUPLENTE 4 DEL BURO 	 ', 12, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(248, '	MIEMBRO SUPLENTE 5 DEL BURO 	 ', 12, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(249, '	MIEMBRO  6 SUPLENTE DEL BURO 	 ', 12, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(250, '	SECRETARIO SECTORIAL	 ', 12, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(251, '	MIEMBRO 1 DEL BURO (SUBSECRETARIO DEL SECTOR)	 ', 12, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(252, '	MIEMBRO 2 DEL BURO 	 ', 12, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(253, '	MIEMBRO 3 DEL BURO 	 ', 12, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(254, '	MIEMBRO 4 DEL BURO 	 ', 12, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(255, '	MIEMBRO 5 DEL BURO 	 ', 12, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(256, '	MIEMBRO 6 DEL BURO 	 ', 13, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(257, '	MIEMBRO SUPLENTE 1 DEL BURO	 ', 13, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(258, '	MIEMBRO SUPLENTE  2 DEL BURO 	 ', 13, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(259, '	MIEMBRO SUPLENTE 3 DEL BURO 	 ', 13, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(260, '	MIEMBRO  SUPLENTE 4 DEL BURO 	 ', 13, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(261, '	MIEMBRO SUPLENTE 5 DEL BURO 	 ', 13, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(262, '	MIEMBRO  6 SUPLENTE DEL BURO 	 ', 13, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(263, '	SECRETARIO SECTORIAL	 ', 13, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(264, '	MIEMBRO 1 DEL BURO (SUBSECRETARIO DEL SECTOR)	 ', 13, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(265, '	MIEMBRO 2 DEL BURO 	 ', 13, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(266, '	MIEMBRO 3 DEL BURO 	 ', 13, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(267, '	MIEMBRO 4 DEL BURO 	 ', 13, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(268, '	MIEMBRO 5 DEL BURO 	 ', 13, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(269, '	MIEMBRO 6 DEL BURO 	 ', 14, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(270, '	MIEMBRO SUPLENTE 1 DEL BURO	 ', 14, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(271, '	MIEMBRO SUPLENTE  2 DEL BURO 	 ', 14, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(272, '	MIEMBRO SUPLENTE 3 DEL BURO 	 ', 14, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(273, '	MIEMBRO  SUPLENTE 4 DEL BURO 	 ', 14, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(274, '	MIEMBRO SUPLENTE 5 DEL BURO 	 ', 14, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(275, '	MIEMBRO  6 SUPLENTE DEL BURO 	 ', 14, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(276, '	SECRETARIO SECTORIAL	 ', 14, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(277, '	MIEMBRO 1 DEL BURO (SUBSECRETARIO DEL SECTOR)	 ', 14, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(278, '	MIEMBRO 2 DEL BURO 	 ', 14, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(279, '	MIEMBRO 3 DEL BURO 	 ', 14, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(280, '	MIEMBRO 4 DEL BURO 	 ', 14, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(281, '	MIEMBRO 5 DEL BURO 	 ', 14, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(282, '	MIEMBRO 6 DEL BURO 	 ', 15, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(283, '	MIEMBRO SUPLENTE 1 DEL BURO	 ', 15, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(284, '	MIEMBRO SUPLENTE  2 DEL BURO 	 ', 15, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(285, '	MIEMBRO SUPLENTE 3 DEL BURO 	 ', 15, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(286, '	MIEMBRO  SUPLENTE 4 DEL BURO 	 ', 15, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(287, '	MIEMBRO SUPLENTE 5 DEL BURO 	 ', 15, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(288, '	MIEMBRO  6 SUPLENTE DEL BURO 	 ', 15, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(289, '	SECRETARIO SECTORIAL	 ', 15, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(290, '	MIEMBRO 1 DEL BURO (SUBSECRETARIO DEL SECTOR)	 ', 15, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(291, '	MIEMBRO 2 DEL BURO 	 ', 15, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(292, '	MIEMBRO 3 DEL BURO 	 ', 15, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(293, '	MIEMBRO 4 DEL BURO 	 ', 15, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(294, '	MIEMBRO 5 DEL BURO 	 ', 15, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(295, '	MIEMBRO 6 DEL BURO 	 ', 16, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(296, '	MIEMBRO SUPLENTE 1 DEL BURO	 ', 16, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(297, '	MIEMBRO SUPLENTE  2 DEL BURO 	 ', 16, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(298, '	MIEMBRO SUPLENTE 3 DEL BURO 	 ', 16, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(299, '	MIEMBRO  SUPLENTE 4 DEL BURO 	 ', 16, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(300, '	MIEMBRO SUPLENTE 5 DEL BURO 	 ', 16, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(301, '	MIEMBRO  6 SUPLENTE DEL BURO 	 ', 16, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(302, '	SECRETARIA DE ORGANIZACIÓN	 ', 16, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(303, '	SECRETARIO SINDICAL	 ', 16, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(304, '	SECRETARIO AGRARIO	 ', 16, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(305, '	SECRETARIA FEMENINA	 ', 16, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(306, '	SECRETARIA JUVENIL	 ', 16, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(307, '	SECRETARIA DE EDUCACION	 ', 16, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(308, '	SECRETARIA DE PROFESIONALES Y TECNICOS	 ', 17, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(309, '	SECRETARIO DE ASUNTOS MUNICIPALES Y COMUNALES	 ', 17, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(310, '	SECRETARIO DE CULTURA	 ', 17, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(311, '	SECRETARIO POLITICO 1 (Sub Secretario de Organización)	 ', 17, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(312, '	SECRETARIO POLITICO 2       	 ', 17, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(313, '	SECRETARIO POLITICO 3 	 ', 17, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(314, '	JEFE DIVISION DE ACTIVISMO	 ', 17, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(315, '	JEFE DIVISION DE SISTEMATIZACION Y CONROL ELECTORAL	 ', 17, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(316, '	JEFE DIVISION DE REGISTRO Y ESTADISTICA	 ', 17, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(317, '	JEFE DIVISION DE AUDITORIA, CONTROL Y SEGUIMIENTO	 ', 17, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(318, '	DIRECTOR DEPARTAMENTO DE FINANZAS	 ', 17, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(319, '	DIRECTOR DEPARTAMENTO DE CAPACITACION Y DOCTRINA	 ', 17, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(320, '	DIRECTOR DEPARTAMENTO DE PRENSA	 ', 17, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(321, '	SECRETARIA DE ORGANIZACIÓN	 ', 18, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(322, '	VOCAL 1 (PRINCIPAL)	 ', 18, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(323, '	VOCAL 2 (PRINCIPAL)	 ', 18, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(324, '	VOCAL 3 (PRINCIPAL)	 ', 18, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(325, '	VOCAL 4 (PRINCIPAL)	 ', 18, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(326, '	VOCAL SUPLENTE 1	 ', 18, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(327, '	VOCAL SUPLENTE 2	 ', 18, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(328, '	VOCAL SUPLENTE 3	 ', 18, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(329, '	VOCAL SUPLENTE 4	 ', 18, 1, '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(330, 'Jefe Parroquial', 19, 1, '2020-05-16 12:30:24', '2020-05-16 12:30:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `professions`
--

CREATE TABLE `professions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `professions`
--

INSERT INTO `professions` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Abogado', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2, 'Adjunto', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(3, 'Administrador', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(4, 'Agrónomo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(5, 'Alergólogo ', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(6, 'Almacenista', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(7, 'Anestesiólogo ', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(8, 'Antropólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(9, 'Archivero', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(10, 'Arqueólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(11, 'Arquitecto', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(12, 'Asesor', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(13, 'Asistente', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(14, 'Astrofísico', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(15, 'Astrólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(16, 'Astrónomo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(17, 'Atleta', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(18, 'Autor', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(19, 'Auxiliar', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(20, 'Avicultor', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(21, 'Bacteriólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(22, 'Bibliotecario', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(23, 'Biofísico', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(24, 'Biólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(25, 'Bioquímico', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(26, 'Botánico', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(27, 'Cardiólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(28, 'Cirujano', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(29, 'Climatólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(30, 'Consejero', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(31, 'Conserje', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(32, 'Coordinador', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(33, 'Criminalista', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(34, 'Cronólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(35, 'Decano', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(36, 'Decorador', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(37, 'Defensor ', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(38, 'Delegado', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(39, 'Demógrafo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(40, 'Dentista', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(41, 'Dermatólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(42, 'Dibujante ', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(43, 'Director', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(44, 'Dirigente', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(45, 'Doctor', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(46, 'Endocrinólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(47, 'Enfermero', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(48, 'Epidemiólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(49, 'Estadístico', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(50, 'Farmacéutico', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(51, 'Farmacólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(52, 'Filósofo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(53, 'Fiscal', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(54, 'Físico', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(55, 'Fisiólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(56, 'Fisioterapeuta', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(57, 'Fonetista', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(58, 'Foníatra', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(59, 'Fonólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(60, 'Forense ', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(61, 'Fotógrafo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(62, 'Geofísico', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(63, 'Geógrafo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(64, 'Geólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(65, 'Geoquímica', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(66, 'Geriatra', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(67, 'Grafólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(68, 'Gramático', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(69, 'Hematólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(70, 'Hepatólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(71, 'Historiador', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(72, 'Homeópata', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(73, 'Informático', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(74, 'Ingeniero', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(75, 'Ingeniero técnico', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(76, 'Inmunólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(77, 'Inspector', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(78, 'Investigador', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(79, 'Jardinero', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(80, 'Juez', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(81, 'Maestro', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(82, 'Matemático', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(83, 'Medico', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(84, 'Meteorólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(85, 'Micólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(86, 'Microbiológico', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(87, 'Microcirujano', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(88, 'Nefrólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(89, 'Neumólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(90, 'Neurobiólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(91, 'Neurocirujano', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(92, 'Neuroembriólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(93, 'Neurofisiólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(94, 'Neurólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(95, 'Nutrólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(96, 'Odontólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(97, 'Oftalmólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(98, 'Oncólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(99, 'Optometrista', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(100, 'Orientador', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(101, 'Ortopédico', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(102, 'Ortopedista', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(103, 'Otorrinolaringólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(104, 'Paleontólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(105, 'Patólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(106, 'Pedagogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(107, 'Pediatra ', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(108, 'Periodista', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(109, 'Perito ', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(111, 'Piscicultor', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(112, 'Podólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(113, 'Prehistoriador', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(114, 'Profesor', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(115, 'Programador', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(116, 'Psicoanalista', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(117, 'Psicólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(118, 'Psicofísico', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(119, 'Psicopedagogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(120, 'Psicoterapeuta', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(121, 'Psiquiatra', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(122, 'Publicista', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(123, 'Puericultor', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(124, 'Químico', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(125, 'Quiropráctico', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(126, 'Radiólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(127, 'Sexólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(128, 'Sismólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(129, 'Sociólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(130, 'Técnico', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(131, 'Teólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(132, 'Terapeuta', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(133, 'Toxicólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(134, 'Traductor', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(135, 'Traumatólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(136, 'Urólogo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(137, 'Veterinario', '2020-04-20 01:55:55', '2020-04-20 01:55:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full-access` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `full-access`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'Administrator', 'yes', '2020-04-20 05:55:55', '2020-04-20 05:55:55'),
(3, 'Solo Role', 'Role', 'Descripcion del rol', 'no', '2020-05-24 11:51:09', '2020-06-03 10:13:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-04-20 05:55:55', '2020-04-20 05:55:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Activo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(2, 'Inactivo', '2020-04-20 01:55:55', '2020-04-20 01:55:55'),
(3, 'Migrado', '2020-04-20 01:55:55', '2020-04-20 01:55:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `person_id` bigint(20) UNSIGNED NOT NULL,
  `estado_id` bigint(20) UNSIGNED NOT NULL,
  `municipio_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `person_id`, `estado_id`, `municipio_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'stefano', 'stefanodgr1994@gmail.com', 1, 1, 101, NULL, '$2y$10$OxZrd/c3Ghr58WCy5YPHheAmh7at9HGOcy0Bq.NB37Djwm5Hf5q5i', NULL, '2020-05-09 15:42:33', '2020-05-09 15:42:33');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `academiclevels`
--
ALTER TABLE `academiclevels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `academiclevels_descripcion_unique` (`descripcion`);

--
-- Indices de la tabla `centervotes`
--
ALTER TABLE `centervotes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `centervotes_estado_id_foreign` (`estado_id`),
  ADD KEY `centervotes_municipio_id_foreign` (`municipio_id`),
  ADD KEY `centervotes_parroquia_id_foreign` (`parroquia_id`),
  ADD KEY `centervotes_users_id_foreign` (`users_id`),
  ADD KEY `centervotes_status_id_foreign` (`status_id`);

--
-- Indices de la tabla `cnes`
--
ALTER TABLE `cnes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cnes_cedula_unique` (`cedula`);

--
-- Indices de la tabla `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `electoralcommissions`
--
ALTER TABLE `electoralcommissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `electorallist`
--
ALTER TABLE `electorallist`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `electorallist_descripcion_unique` (`descripcion`);

--
-- Indices de la tabla `electorallists`
--
ALTER TABLE `electorallists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `electorallist_descripcion_unique` (`descripcion`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `estados_descripcion_unique` (`descripcion`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `localcommittees`
--
ALTER TABLE `localcommittees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `localcommittees_descripcion_unique` (`descripcion`),
  ADD KEY `localcommittees_estado_id_foreign` (`estado_id`),
  ADD KEY `localcommittees_municipio_id_foreign` (`municipio_id`),
  ADD KEY `localcommittees_parroquia_id_foreign` (`parroquia_id`),
  ADD KEY `localcommittees_users_id_foreign` (`users_id`),
  ADD KEY `localcommittees_status_id_foreign` (`status_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `municipios_estado_id_foreign` (`estado_id`);

--
-- Indices de la tabla `parroquias`
--
ALTER TABLE `parroquias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parroquias_estado_id_foreign` (`estado_id`),
  ADD KEY `parroquias_municipio_id_foreign` (`municipio_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `people_cedula_unique` (`cedula`),
  ADD UNIQUE KEY `people_email_unique` (`email`),
  ADD UNIQUE KEY `people_telf_celular_unique` (`telf_celular`),
  ADD UNIQUE KEY `people_twitter_unique` (`twitter`),
  ADD UNIQUE KEY `people_facebook_unique` (`facebook`),
  ADD UNIQUE KEY `people_instagram_unique` (`instagram`),
  ADD UNIQUE KEY `people_pagina_web_unique` (`pagina_web`),
  ADD KEY `people_profession_id_foreign` (`profession_id`),
  ADD KEY `people_academiclevel_id_foreign` (`academiclevel_id`),
  ADD KEY `people_estado_id_foreign` (`estado_id`),
  ADD KEY `people_municipio_id_foreign` (`municipio_id`),
  ADD KEY `people_parroquia_id_foreign` (`parroquia_id`),
  ADD KEY `people_users_id_foreign` (`users_id`),
  ADD KEY `people_status_id_foreign` (`status_id`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`),
  ADD UNIQUE KEY `permissions_slug_unique` (`slug`);

--
-- Indices de la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`);

--
-- Indices de la tabla `personcommittees`
--
ALTER TABLE `personcommittees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personcommittees_localcommitte_id_unique` (`localcommitte_id`),
  ADD KEY `personcommittees_person_id_foreign` (`person_id`),
  ADD KEY `personcommittees_position_id_foreign` (`position_id`),
  ADD KEY `personcommittees_users_id_foreign` (`users_id`),
  ADD KEY `personcommittees_status_id_foreign` (`status_id`);

--
-- Indices de la tabla `personstructures`
--
ALTER TABLE `personstructures`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personstructures_division_id_unique` (`division_id`),
  ADD KEY `personstructures_person_id_foreign` (`person_id`),
  ADD KEY `personstructures_position_id_foreign` (`position_id`),
  ADD KEY `personstructures_users_id_foreign` (`users_id`),
  ADD KEY `personstructures_status_id_foreign` (`status_id`);

--
-- Indices de la tabla `personvotes`
--
ALTER TABLE `personvotes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personvotes_person_id_unique` (`person_id`),
  ADD KEY `personvotes_electorallist_id_foreign` (`electorallist_id`),
  ADD KEY `personvotes_centervote_id_foreign` (`centervote_id`),
  ADD KEY `personvotes_users_id_foreign` (`users_id`),
  ADD KEY `personvotes_status_id_foreign` (`status_id`),
  ADD KEY `personvotes_periodo_id_foreign` (`periodo_id`);

--
-- Indices de la tabla `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `positions_divisions_id_foreign` (`divisions_id`),
  ADD KEY `positions_status_id_foreign` (`status_id`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `professions`
--
ALTER TABLE `professions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `professions_descripcion_unique` (`descripcion`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `status_descripcion_unique` (`descripcion`);

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
-- AUTO_INCREMENT de la tabla `academiclevels`
--
ALTER TABLE `academiclevels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `centervotes`
--
ALTER TABLE `centervotes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cnes`
--
ALTER TABLE `cnes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `electoralcommissions`
--
ALTER TABLE `electoralcommissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `electorallist`
--
ALTER TABLE `electorallist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `electorallists`
--
ALTER TABLE `electorallists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `localcommittees`
--
ALTER TABLE `localcommittees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2402;

--
-- AUTO_INCREMENT de la tabla `parroquias`
--
ALTER TABLE `parroquias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240112;

--
-- AUTO_INCREMENT de la tabla `people`
--
ALTER TABLE `people`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personcommittees`
--
ALTER TABLE `personcommittees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `personstructures`
--
ALTER TABLE `personstructures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `personvotes`
--
ALTER TABLE `personvotes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=331;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `professions`
--
ALTER TABLE `professions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `centervotes`
--
ALTER TABLE `centervotes`
  ADD CONSTRAINT `centervotes_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `centervotes_municipio_id_foreign` FOREIGN KEY (`municipio_id`) REFERENCES `municipios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `centervotes_parroquia_id_foreign` FOREIGN KEY (`parroquia_id`) REFERENCES `parroquias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `centervotes_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `centervotes_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `localcommittees`
--
ALTER TABLE `localcommittees`
  ADD CONSTRAINT `localcommittees_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `localcommittees_municipio_id_foreign` FOREIGN KEY (`municipio_id`) REFERENCES `municipios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `localcommittees_parroquia_id_foreign` FOREIGN KEY (`parroquia_id`) REFERENCES `parroquias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `localcommittees_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `localcommittees_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD CONSTRAINT `municipios_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `parroquias`
--
ALTER TABLE `parroquias`
  ADD CONSTRAINT `parroquias_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `parroquias_municipio_id_foreign` FOREIGN KEY (`municipio_id`) REFERENCES `municipios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `people`
--
ALTER TABLE `people`
  ADD CONSTRAINT `people_academiclevel_id_foreign` FOREIGN KEY (`academiclevel_id`) REFERENCES `academiclevels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `people_cedula_foreign` FOREIGN KEY (`cedula`) REFERENCES `cnes` (`cedula`) ON DELETE CASCADE,
  ADD CONSTRAINT `people_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `people_municipio_id_foreign` FOREIGN KEY (`municipio_id`) REFERENCES `municipios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `people_parroquia_id_foreign` FOREIGN KEY (`parroquia_id`) REFERENCES `parroquias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `people_profession_id_foreign` FOREIGN KEY (`profession_id`) REFERENCES `professions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `people_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `people_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `personcommittees`
--
ALTER TABLE `personcommittees`
  ADD CONSTRAINT `personcommittees_localcommitte_id_foreign` FOREIGN KEY (`localcommitte_id`) REFERENCES `localcommittees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `personcommittees_person_id_foreign` FOREIGN KEY (`person_id`) REFERENCES `people` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `personcommittees_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `personcommittees_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `personcommittees_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `personstructures`
--
ALTER TABLE `personstructures`
  ADD CONSTRAINT `personstructures_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `personstructures_person_id_foreign` FOREIGN KEY (`person_id`) REFERENCES `people` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `personstructures_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `personstructures_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `personstructures_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `personvotes`
--
ALTER TABLE `personvotes`
  ADD CONSTRAINT `personvotes_centervote_id_foreign` FOREIGN KEY (`centervote_id`) REFERENCES `centervotes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `personvotes_electorallist_id_foreign` FOREIGN KEY (`electorallist_id`) REFERENCES `electorallists` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `personvotes_periodo_id_foreign` FOREIGN KEY (`periodo_id`) REFERENCES `electoralcommissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `personvotes_person_id_foreign` FOREIGN KEY (`person_id`) REFERENCES `people` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `personvotes_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `personvotes_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `positions`
--
ALTER TABLE `positions`
  ADD CONSTRAINT `positions_divisions_id_foreign` FOREIGN KEY (`divisions_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `positions_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Filtros para la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
