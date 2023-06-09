-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.32 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para gsdegollado
CREATE DATABASE IF NOT EXISTS `gsdegollado`;
USE `gsdegollado`;

-- Volcando estructura para tabla gsdegollado.actividades
CREATE TABLE IF NOT EXISTS `actividades` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archivo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grupo_id` bigint unsigned NOT NULL,
  `materia_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `actividades_grupo_id_foreign` (`grupo_id`),
  KEY `actividades_materia_id_foreign` (`materia_id`),
  CONSTRAINT `actividades_grupo_id_foreign` FOREIGN KEY (`grupo_id`) REFERENCES `grupos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `actividades_materia_id_foreign` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla gsdegollado.actividades: ~0 rows (aproximadamente)

-- Volcando estructura para tabla gsdegollado.contenidos
CREATE TABLE IF NOT EXISTS `contenidos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenido` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grupo_id` bigint unsigned NOT NULL,
  `materia_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contenidos_grupo_id_foreign` (`grupo_id`),
  KEY `contenidos_materia_id_foreign` (`materia_id`),
  CONSTRAINT `contenidos_grupo_id_foreign` FOREIGN KEY (`grupo_id`) REFERENCES `grupos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `contenidos_materia_id_foreign` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla gsdegollado.contenidos: ~1 rows (aproximadamente)
INSERT INTO `contenidos` (`id`, `titulo`, `contenido`, `imagen`, `grupo_id`, `materia_id`, `created_at`, `updated_at`) VALUES
	(1, 'suma', 'descripcion', 'uploads/Mq4WUj6HP9q0ryo34aNL2KRUlf2pNCNf1a4bpNyi.jpg', 2, 1, NULL, NULL);

-- Volcando estructura para tabla gsdegollado.entregadeactividades
CREATE TABLE IF NOT EXISTS `entregadeactividades` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archivo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calificacion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint unsigned NOT NULL,
  `actividade_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `entregadeactividades_user_id_foreign` (`user_id`),
  KEY `entregadeactividades_actividade_id_foreign` (`actividade_id`),
  CONSTRAINT `entregadeactividades_actividade_id_foreign` FOREIGN KEY (`actividade_id`) REFERENCES `actividades` (`id`) ON DELETE CASCADE,
  CONSTRAINT `entregadeactividades_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla gsdegollado.entregadeactividades: ~0 rows (aproximadamente)

-- Volcando estructura para tabla gsdegollado.examenes
CREATE TABLE IF NOT EXISTS `examenes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `grupo_id` bigint unsigned NOT NULL,
  `materia_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `examenes_grupo_id_foreign` (`grupo_id`),
  KEY `examenes_materia_id_foreign` (`materia_id`),
  CONSTRAINT `examenes_grupo_id_foreign` FOREIGN KEY (`grupo_id`) REFERENCES `grupos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `examenes_materia_id_foreign` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla gsdegollado.examenes: ~0 rows (aproximadamente)

-- Volcando estructura para tabla gsdegollado.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla gsdegollado.failed_jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla gsdegollado.grupos
CREATE TABLE IF NOT EXISTS `grupos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `grado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `periodo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla gsdegollado.grupos: ~2 rows (aproximadamente)
INSERT INTO `grupos` (`id`, `grado`, `periodo`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'sin periodo', '2023-06-06 07:20:46', '2023-06-06 07:20:46'),
	(2, '1A', 'junio - julio 2023', '2023-06-06 07:27:10', '2023-06-06 07:27:10');

-- Volcando estructura para tabla gsdegollado.materias
CREATE TABLE IF NOT EXISTS `materias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `materia` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla gsdegollado.materias: ~3 rows (aproximadamente)
INSERT INTO `materias` (`id`, `materia`, `created_at`, `updated_at`) VALUES
	(1, 'MATEMATICAS', '2023-06-06 07:27:24', '2023-06-06 07:27:24'),
	(2, 'ESPAÑOL', '2023-06-06 07:27:28', '2023-06-06 07:27:28'),
	(3, 'RESIDENCIA', '2023-06-06 07:27:42', '2023-06-06 07:27:42');

-- Volcando estructura para tabla gsdegollado.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla gsdegollado.migrations: ~12 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2013_03_31_015346_create_grupos_table', 1),
	(2, '2013_05_25_013121_create_materias_table', 1),
	(3, '2014_10_12_000000_create_users_table', 1),
	(4, '2014_10_12_100000_create_password_resets_table', 1),
	(5, '2019_08_19_000000_create_failed_jobs_table', 1),
	(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(7, '2023_03_28_183153_create_permission_tables', 1),
	(8, '2023_03_28_184212_create_contenidos_table', 1),
	(9, '2023_04_24_204004_create_actividades_table', 1),
	(10, '2023_04_28_004432_create_entregadeactividades_table', 1),
	(11, '2023_06_06_005600_create_examenes_table', 1),
	(12, '2023_06_06_005624_create_preguntas_table', 1);

-- Volcando estructura para tabla gsdegollado.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla gsdegollado.model_has_permissions: ~0 rows (aproximadamente)

-- Volcando estructura para tabla gsdegollado.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla gsdegollado.model_has_roles: ~3 rows (aproximadamente)
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 2),
	(2, 'App\\Models\\User', 3),
	(3, 'App\\Models\\User', 4);

-- Volcando estructura para tabla gsdegollado.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla gsdegollado.password_resets: ~0 rows (aproximadamente)

-- Volcando estructura para tabla gsdegollado.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla gsdegollado.permissions: ~21 rows (aproximadamente)
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'ver-actividade', 'web', '2023-06-06 07:20:32', '2023-06-06 07:20:32'),
	(2, 'crear-actividade', 'web', '2023-06-06 07:20:32', '2023-06-06 07:20:32'),
	(3, 'editar-actividade', 'web', '2023-06-06 07:20:32', '2023-06-06 07:20:32'),
	(4, 'borrar-actividade', 'web', '2023-06-06 07:20:32', '2023-06-06 07:20:32'),
	(5, 'calificar-actividade', 'web', '2023-06-06 07:20:32', '2023-06-06 07:20:32'),
	(6, 'ver-grupo', 'web', '2023-06-06 07:20:32', '2023-06-06 07:20:32'),
	(7, 'crear-grupo', 'web', '2023-06-06 07:20:32', '2023-06-06 07:20:32'),
	(8, 'editar-grupo', 'web', '2023-06-06 07:20:32', '2023-06-06 07:20:32'),
	(9, 'borrar-grupo', 'web', '2023-06-06 07:20:32', '2023-06-06 07:20:32'),
	(10, 'ver-rol', 'web', '2023-06-06 07:20:32', '2023-06-06 07:20:32'),
	(11, 'crear-rol', 'web', '2023-06-06 07:20:32', '2023-06-06 07:20:32'),
	(12, 'editar-rol', 'web', '2023-06-06 07:20:32', '2023-06-06 07:20:32'),
	(13, 'borrar-rol', 'web', '2023-06-06 07:20:32', '2023-06-06 07:20:32'),
	(14, 'ver-contenido', 'web', '2023-06-06 07:20:32', '2023-06-06 07:20:32'),
	(15, 'crear-contenido', 'web', '2023-06-06 07:20:32', '2023-06-06 07:20:32'),
	(16, 'editar-contenido', 'web', '2023-06-06 07:20:32', '2023-06-06 07:20:32'),
	(17, 'borrar-contenido', 'web', '2023-06-06 07:20:32', '2023-06-06 07:20:32'),
	(18, 'ver-materia', 'web', '2023-06-06 07:20:32', '2023-06-06 07:20:32'),
	(19, 'crear-materia', 'web', '2023-06-06 07:20:32', '2023-06-06 07:20:32'),
	(20, 'editar-materia', 'web', '2023-06-06 07:20:32', '2023-06-06 07:20:32'),
	(21, 'borrar-materia', 'web', '2023-06-06 07:20:32', '2023-06-06 07:20:32');

-- Volcando estructura para tabla gsdegollado.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla gsdegollado.personal_access_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla gsdegollado.preguntas
CREATE TABLE IF NOT EXISTS `preguntas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `incisoa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `incisob` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `incisoc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `respuesta` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `examene_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `preguntas_examene_id_foreign` (`examene_id`),
  CONSTRAINT `preguntas_examene_id_foreign` FOREIGN KEY (`examene_id`) REFERENCES `examenes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla gsdegollado.preguntas: ~0 rows (aproximadamente)

-- Volcando estructura para tabla gsdegollado.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla gsdegollado.roles: ~3 rows (aproximadamente)
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'Administrador', 'web', '2023-06-06 07:25:26', '2023-06-06 07:25:26'),
	(2, 'Docente', 'web', '2023-06-06 07:25:54', '2023-06-06 07:25:54'),
	(3, 'Alumno', 'web', '2023-06-06 07:26:14', '2023-06-06 07:26:14');

-- Volcando estructura para tabla gsdegollado.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla gsdegollado.role_has_permissions: ~32 rows (aproximadamente)
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 1),
	(5, 1),
	(6, 1),
	(7, 1),
	(8, 1),
	(9, 1),
	(10, 1),
	(11, 1),
	(12, 1),
	(13, 1),
	(14, 1),
	(15, 1),
	(16, 1),
	(17, 1),
	(18, 1),
	(19, 1),
	(20, 1),
	(21, 1),
	(1, 2),
	(2, 2),
	(3, 2),
	(4, 2),
	(5, 2),
	(14, 2),
	(15, 2),
	(16, 2),
	(17, 2),
	(1, 3),
	(14, 3);

-- Volcando estructura para tabla gsdegollado.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grupo_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_grupo_id_foreign` (`grupo_id`),
  CONSTRAINT `users_grupo_id_foreign` FOREIGN KEY (`grupo_id`) REFERENCES `grupos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla gsdegollado.users: ~4 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `apellido`, `email`, `email_verified_at`, `password`, `remember_token`, `grupo_id`, `created_at`, `updated_at`) VALUES
	(1, 'Administrador', 'admin', 'admin@gmail.com', NULL, '$2y$10$cPltQ0f6fvN0vgIiaeOii.o0ItE1I53ydIuD/aIrxE7in7kYYkUQ.', NULL, 1, '2023-06-06 07:24:15', '2023-06-06 07:24:15'),
	(2, 'Administrador', 'admin admin', 'admin2@gmail.com', NULL, '$2y$10$5Z.S.joR8oJVvcj2UYiRoOiZPkiz3F0yt9gYbKc81fRt3Id7Mwtx6', NULL, 1, '2023-06-06 07:26:46', '2023-06-06 07:26:46'),
	(3, 'miguel', 'santos cruz', 'miguelsantos@gmail.com', NULL, '$2y$10$Culd2ujSu4E3Q1w9N5MZmu7w1MsIb1bzhs4QQhIPHEpa5glcPgOae', NULL, 2, '2023-06-06 07:28:59', '2023-06-06 07:28:59'),
	(4, 'elias', 'mendez lopez', 'elias@gmail.com', NULL, '$2y$10$LEwBO11Ux9/KsgsmyuxG5uaDy1RQ2RG6qYCw8saZ7qMOandQfKNeC', NULL, 2, '2023-06-06 07:29:20', '2023-06-06 07:29:20');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
