-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
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

-- Volcando datos para la tabla proyecto-laravel.categories: ~2 rows (aproximadamente)
DELETE FROM `categories`;
INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(6, 'Tecnologia', 'Avances tecnologicos.', '2023-03-26 22:36:10', '2023-03-26 22:36:10'),
	(7, 'Frameworks', 'Laravel', '2023-03-26 22:58:48', '2023-03-26 22:58:48');

-- Volcando datos para la tabla proyecto-laravel.failed_jobs: ~0 rows (aproximadamente)
DELETE FROM `failed_jobs`;

-- Volcando datos para la tabla proyecto-laravel.migrations: ~8 rows (aproximadamente)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(24, '2023_03_22_192839_create_post_table', 1),
	(33, '2014_10_12_000000_create_users_table', 2),
	(34, '2014_10_12_100000_create_password_reset_tokens_table', 2),
	(35, '2019_08_19_000000_create_failed_jobs_table', 2),
	(36, '2019_12_14_000001_create_personal_access_tokens_table', 2),
	(37, '2023_03_22_192844_create_categories_table', 2),
	(38, '2023_03_23_180620_create_posts_table', 2),
	(39, '2023_03_24_185650_create_permission_tables', 3);

-- Volcando datos para la tabla proyecto-laravel.model_has_permissions: ~0 rows (aproximadamente)
DELETE FROM `model_has_permissions`;

-- Volcando datos para la tabla proyecto-laravel.model_has_roles: ~0 rows (aproximadamente)
DELETE FROM `model_has_roles`;

-- Volcando datos para la tabla proyecto-laravel.password_reset_tokens: ~0 rows (aproximadamente)
DELETE FROM `password_reset_tokens`;

-- Volcando datos para la tabla proyecto-laravel.permissions: ~0 rows (aproximadamente)
DELETE FROM `permissions`;

-- Volcando datos para la tabla proyecto-laravel.personal_access_tokens: ~0 rows (aproximadamente)
DELETE FROM `personal_access_tokens`;

-- Volcando datos para la tabla proyecto-laravel.posts: ~16 rows (aproximadamente)
DELETE FROM `posts`;
INSERT INTO `posts` (`id`, `name`, `category_id`, `description`, `state`, `created_at`, `updated_at`) VALUES
	(5, 'Frameworks', 5, 'Laravel, php', 'post', '2023-03-23 23:47:20', '2023-03-26 22:39:54'),
	(6, 'Frameworks', NULL, 'Laravel, php', 'post', '2023-03-23 23:48:00', '2023-03-23 23:48:00'),
	(9, 'Frame', 6, 'Lar... avel', 'post', '2023-03-23 23:50:09', '2023-03-26 22:58:20'),
	(10, 'Frameworks', NULL, 'Lar...', 'post', '2023-03-23 23:51:22', '2023-03-23 23:51:22'),
	(12, 'Saludo', NULL, 'Cordial saludo', 'post', '2023-03-23 23:57:49', '2023-03-23 23:57:49'),
	(13, 'Hola', NULL, 'Cordial', 'post', '2023-03-23 23:58:30', '2023-03-23 23:58:30'),
	(14, 'Hola', NULL, 'Cordial', 'post', '2023-03-23 23:59:05', '2023-03-23 23:59:05'),
	(16, 'Hugo', NULL, 'Holis', 'post', '2023-03-24 01:35:13', '2023-03-24 01:35:13'),
	(17, 'lui', NULL, 'lui', 'post', '2023-03-24 02:19:00', '2023-03-24 02:19:00'),
	(18, 'hugo', NULL, 'hugo', 'post', '2023-03-24 02:32:32', '2023-03-24 02:32:32'),
	(21, 'Sol Solecito', NULL, 'Sol solecito', 'post', '2023-03-24 22:11:15', '2023-03-24 22:11:15'),
	(22, 'Soñar', NULL, 'Los sueños...', 'post', '2023-03-25 20:32:09', '2023-03-25 20:32:09'),
	(26, 'Hola', NULL, 'holis', 'post', '2023-03-26 21:15:53', '2023-03-26 21:15:53'),
	(27, 'Hola', 4, 'hhool', 'post', '2023-03-26 21:16:55', '2023-03-26 21:16:55'),
	(28, 'Frameworks', 4, 'hhghgg', 'post', '2023-03-26 22:11:58', '2023-03-26 22:11:58'),
	(29, 'Nada nadita', 5, 'nadita nada...', 'post', '2023-03-26 22:57:04', '2023-03-26 22:57:31');

-- Volcando datos para la tabla proyecto-laravel.roles: ~0 rows (aproximadamente)
DELETE FROM `roles`;

-- Volcando datos para la tabla proyecto-laravel.role_has_permissions: ~0 rows (aproximadamente)
DELETE FROM `role_has_permissions`;

-- Volcando datos para la tabla proyecto-laravel.users: ~1 rows (aproximadamente)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Luisa Carvajal', 'luisa.carvajal@est.iudigital.edu.co', NULL, '$2y$10$Ffq1HjuhSEMnFRO9BAmfB.uU1dSko./IrE48Y9ZcfJPrnQVxAqY.K', NULL, '2023-03-24 22:57:06', '2023-03-24 22:57:06');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
