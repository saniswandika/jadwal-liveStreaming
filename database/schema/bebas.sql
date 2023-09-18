-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.28-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table harmoni.absensi
CREATE TABLE IF NOT EXISTS `absensi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `periode` varchar(255) NOT NULL,
  `tanggal_absen` date NOT NULL,
  `nama_acara` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bukti_absen` varchar(255) NOT NULL,
  `nama_pj` varchar(255) NOT NULL,
  `attendance` tinyint(1) NOT NULL DEFAULT 0,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table harmoni.absensi: ~2 rows (approximately)
INSERT INTO `absensi` (`id`, `periode`, `tanggal_absen`, `nama_acara`, `name`, `bukti_absen`, `nama_pj`, `attendance`, `keterangan`, `created_at`, `updated_at`) VALUES
	(1, 'July 2023', '2023-07-19', 'Podcast Serambi Berbintang', 'Rayhan', 'dsadad2.jpg', 'irfan', 1, 'sdadsad', '2023-07-19 01:25:20', '2023-07-19 01:25:20'),
	(2, 'July 2023', '2023-07-19', 'Kajian Majlis Ta\'lim Aria Jipang', 'Kadu', 'akhirr.png', 'ardi', 1, 'adasdads', '2023-07-19 01:37:01', '2023-07-19 01:37:01'),
	(3, 'July 2023', '2023-07-19', 'Talkshow Sosialisasi Muswil Alisa Khadijah ICMI Jabar', 'Nur', 'dsdsdsds.png', 'ardi', 1, 'hadir', '2023-07-19 07:42:43', '2023-07-19 07:42:43'),
	(4, 'July 2023', '2023-07-25', 'Pengajian Akbar Bulanan Majiddah', 'Rayhan', 'akhirr.png', 'dasdada', 0, 'jiji', '2023-07-25 03:15:00', '2023-07-25 03:15:00');
-- Dumping structure for table harmoni.calendar_events
CREATE TABLE IF NOT EXISTS `calendar_events` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `event_title` varchar(255) NOT NULL,
  `event_start` date NOT NULL,
  `event_end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table harmoni.calendar_events: ~0 rows (approximately)

-- Dumping structure for table harmoni.events
CREATE TABLE IF NOT EXISTS `events` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `start_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jam_acara` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table harmoni.events: ~16 rows (approximately)
INSERT INTO `events` (`id`, `title`, `description`, `start_date`, `created_at`, `updated_at`, `jam_acara`) VALUES
	(8, 'Podcast Serambi Berbintang', 'Live Streaming di Studio', '2023-01-04', '2023-02-26 07:25:40', '2023-02-26 07:25:40', '13:00:00'),
	(9, 'Goes To International MISS Teen Asia Facific', 'Live Streaming di Fifteen Cafe', '2023-01-04', '2023-02-26 07:29:12', '2023-02-26 07:29:12', '14:00:00'),
	(10, 'Kajian Online MT Ummahatul Qur\'ani', 'Live Streaming di Masjid Ummahatul Qur\'ani Cihanjuang', '2023-01-05', '2023-02-26 07:30:37', '2023-02-26 07:30:37', '07:30:00'),
	(11, 'Tholabul Ilmi dan Bazzar', 'Live Streaming di Miko Mall Bandung', '2023-01-06', '2023-02-26 07:31:56', '2023-02-26 07:31:56', '11:00:00'),
	(12, 'Pengajian Akbar Bulanan Majiddah', 'Live Streaming di Masjid Albarjah', '2023-01-07', '2023-02-26 07:36:27', '2023-02-26 07:36:27', '08:30:00'),
	(13, 'Tabligh Akbar, Rihlah Wisata Religi & Tholabul Ilmi', 'Live Streaming di Miko Mall Bandung', '2023-01-08', '2023-02-26 07:37:57', '2023-02-26 07:37:57', '08:00:00'),
	(14, 'Tabligh Akbar "Amalan yang akan mengantarkan ke Syurga"', 'Live Streaming di Masjid Raya Citapen', '2023-01-08', '2023-02-26 07:39:31', '2023-02-26 07:39:31', '08:00:00'),
	(15, 'Bincang Bisnis Kadin Jabar', 'Live Streaming di Kantor Kadin Jabar', '2023-01-09', '2023-02-26 07:40:33', '2023-02-26 07:40:33', '14:00:00'),
	(16, 'Ngopi "Mempersiapkan Anak ke Jenjang Pendidikan Lebih Tinggi"', 'Live Streaming di Studio', '2023-01-09', '2023-02-26 07:41:52', '2023-02-26 07:41:52', '16:00:00'),
	(17, 'Kajian Majlis Ta\'lim Aria Jipang', 'Live Streaming di Masjid Trans Studio Mall Bandung', '2023-01-10', '2023-02-26 07:42:57', '2023-02-26 07:42:57', '08:30:00'),
	(18, 'Harmoniaga bersama Nibras House', 'Live Streaming di Studio', '2023-01-10', '2023-02-26 07:43:45', '2023-02-26 07:43:45', '13:00:00'),
	(19, 'Talkshow Sosialisasi Muswil Alisa Khadijah ICMI Jabar', 'Live Streaming di Studio', '2023-01-10', '2023-02-26 07:45:23', '2023-02-26 07:45:23', '16:00:00'),
	(20, 'Podcast Serambi Kehidupan Berbintang, Cinta Lama Bersemi Kembali', 'Live Streaming di Studio', '2023-01-11', '2023-02-26 07:46:34', '2023-02-26 07:46:34', '13:00:00'),
	(21, 'Harmoniaga, Umroh Mudah dan Nyaman Bersama Rubi Travel', 'Live Streaming di Studio', '2023-01-11', '2023-02-26 07:48:42', '2023-02-26 07:48:42', '17:00:00'),
	(22, 'Harmoniaga Kedai Mapia dan Go Steak Cihanjuang', 'Live Streaming di Studio', '2023-01-13', '2023-02-26 07:50:04', '2023-02-26 07:50:04', '10:00:00'),
	(23, 'Menggerakan Ekonomi Masyarakat melalui Koperasi', 'Live Streaming di Studio', '2023-01-13', '2023-02-26 07:51:04', '2023-02-26 07:51:04', '16:00:00');

-- Dumping structure for table harmoni.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table harmoni.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table harmoni.inventaris
CREATE TABLE IF NOT EXISTS `inventaris` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `jenis_barang` varchar(255) NOT NULL,
  `nama_barang` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table harmoni.inventaris: ~3 rows (approximately)
INSERT INTO `inventaris` (`id`, `jenis_barang`, `nama_barang`, `created_at`, `updated_at`) VALUES
	(1, 'kamera', 'Broadcast A', '2023-02-25 22:35:57', '2023-02-25 22:35:57'),
	(2, 'kamera', 'mantap2131', '2023-02-25 22:36:09', '2023-02-25 22:36:09'),
	(4, 'kamera', 'canon', '2023-02-26 08:32:30', '2023-02-26 08:32:30');

-- Dumping structure for table harmoni.jadwals
CREATE TABLE IF NOT EXISTS `jadwals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `tanggal` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table harmoni.jadwals: ~0 rows (approximately)

-- Dumping structure for table harmoni.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table harmoni.migrations: ~11 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_02_08_162309_create_permission_tables', 1),
	(6, '2023_02_08_162353_create_products_table', 1),
	(7, '2023_02_08_162430_create_pemakaian_table', 1),
	(8, '2023_02_16_074426_create_jadwals_table', 1),
	(9, '2023_02_19_174006_create_calendar_events_table', 1),
	(10, '2023_02_23_152617_create_inventaris_table', 1),
	(11, '2023_02_24_114116_create_events_table', 1),
	(12, '2023_07_07_161529_create_absensi_table', 2),
	(13, '2023_07_10_124631_modify_absensi_table', 2);



-- Dumping structure for table harmoni.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table harmoni.model_has_roles: ~5 rows (approximately)
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1),
	(2, 'App\\Models\\User', 2),
	(2, 'App\\Models\\User', 4),
	(2, 'App\\Models\\User', 5),
	(2, 'App\\Models\\User', 6);

-- Dumping structure for table harmoni.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table harmoni.password_resets: ~0 rows (approximately)

-- Dumping structure for table harmoni.pemakaian
CREATE TABLE IF NOT EXISTS `pemakaian` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Nama_Pemakaian` varchar(255) NOT NULL,
  `Keterangan` text NOT NULL,
  `tanggal_pakai` date NOT NULL,
  `Nama_barang` varchar(255) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pj_pemakaian` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table harmoni.pemakaian: ~0 rows (approximately)
INSERT INTO `pemakaian` (`id`, `Nama_Pemakaian`, `Keterangan`, `tanggal_pakai`, `Nama_barang`, `jam_mulai`, `jam_selesai`, `created_at`, `updated_at`, `pj_pemakaian`) VALUES
	(1, 'sasasasa', 'asddasd', '2023-02-26', '["Broadcast A","mantap2131"]', '22:22:00', '22:22:00', '2023-02-25 15:41:17', '2023-02-25 15:41:17', 'websolutionstuff');

-- Dumping structure for table harmoni.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table harmoni.permissions: ~20 rows (approximately)
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'jadwal-list', 'web', '2023-02-25 15:24:35', '2023-02-25 15:24:35'),
	(2, 'jadwal-create', 'web', '2023-02-25 15:24:35', '2023-02-25 15:24:35'),
	(3, 'jadwal-edit', 'web', '2023-02-25 15:24:35', '2023-02-25 15:24:35'),
	(4, 'jadwal-delete', 'web', '2023-02-25 15:24:35', '2023-02-25 15:24:35'),
	(5, 'pemakaian-list', 'web', '2023-02-25 15:24:35', '2023-02-25 15:24:35'),
	(6, 'pemakaian-create', 'web', '2023-02-25 15:24:35', '2023-02-25 15:24:35'),
	(7, 'pemakaian-edit', 'web', '2023-02-25 15:24:35', '2023-02-25 15:24:35'),
	(8, 'pemakaian-delete', 'web', '2023-02-25 15:24:35', '2023-02-25 15:24:35'),
	(9, 'inventaris-list', 'web', '2023-02-25 15:24:35', '2023-02-25 15:24:35'),
	(10, 'inventaris-create', 'web', '2023-02-25 15:24:35', '2023-02-25 15:24:35'),
	(11, 'inventaris-edit', 'web', '2023-02-25 15:24:35', '2023-02-25 15:24:35'),
	(12, 'inventaris-delete', 'web', '2023-02-25 15:24:35', '2023-02-25 15:24:35'),
	(13, 'role-list', 'web', '2023-02-25 15:24:35', '2023-02-25 15:24:35'),
	(14, 'role-create', 'web', '2023-02-25 15:24:35', '2023-02-25 15:24:35'),
	(15, 'role-edit', 'web', '2023-02-25 15:24:35', '2023-02-25 15:24:35'),
	(16, 'role-delete', 'web', '2023-02-25 15:24:35', '2023-02-25 15:24:35'),
	(17, 'user-list', 'web', '2023-02-25 15:24:35', '2023-02-25 15:24:35'),
	(18, 'user-create', 'web', '2023-02-25 15:24:35', '2023-02-25 15:24:35'),
	(19, 'user-edit', 'web', '2023-02-25 15:24:35', '2023-02-25 15:24:35'),
	(20, 'user-delete', 'web', '2023-02-25 15:24:35', '2023-02-25 15:24:35');

-- Dumping structure for table harmoni.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table harmoni.personal_access_tokens: ~0 rows (approximately)
-- Dumping structure for table harmoni.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table harmoni.model_has_permissions: ~0 rows (approximately)
-- Dumping structure for table harmoni.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table harmoni.products: ~0 rows (approximately)

-- Dumping structure for table harmoni.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
-- Dumping structure for table harmoni.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table harmoni.roles: ~3 rows (approximately)
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'web', '2023-02-25 15:24:49', '2023-02-25 15:24:49'),
	(2, 'magang', 'web', '2023-02-25 15:42:44', '2023-02-25 15:42:44');

-- Dumping structure for table harmoni.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table harmoni.role_has_permissions: ~25 rows (approximately)
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(1, 2),
	(2, 1),
	(3, 1),
	(4, 1),
	(5, 1),
	(5, 2),
	(6, 1),
	(7, 1),
	(8, 1),
	(9, 1),
	(9, 2),
	(10, 1),
	(11, 1),
	(12, 1),
	(13, 1),
	(13, 2),
	(14, 1),
	(15, 1),
	(16, 1),
	(17, 1),
	(17, 2),
	(18, 1),
	(19, 1),
	(20, 1);

-- Dumping structure for table harmoni.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table harmoni.users: ~5 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'websolutionstuff', 'test@gmail.com', NULL, '$2y$10$3C3hkS5PtnuKHGNQJ7TtreM0lh4FxOKTUlzETTZ/M7hSKeO7ZQBeG', NULL, '2023-02-25 15:24:49', '2023-02-25 15:24:49'),
	(2, 'magang', 'testmagang@gmail.com', NULL, '$2y$10$6yGiKeP6lsKZVQwya8ALl.vPBYiz6Gidv8hSDA9h..r1Umo0K6A96', NULL, '2023-02-25 15:43:36', '2023-02-25 15:43:36'),
	(4, 'Rayhan', 'admin@gmail.com', NULL, '$2y$10$FJQl6RIbTOIEnESv5Yj.XOhBBc3nEkJVgHAdDN5dhPSgSzPLja7IS', NULL, '2023-07-19 01:23:01', '2023-07-19 01:23:01'),
	(5, 'Kadu', 'admin@example.com', NULL, '$2y$10$s6VXKyWy339XoFVchZjiQOCGX7uLVgSOjIM1v5fPtPnsPhG4jabxG', NULL, '2023-07-19 01:31:53', '2023-07-19 01:31:53'),
	(6, 'Nur', 'nurfit@gmail.com', NULL, '$2y$10$425nLdQdYg0sqQLWgt7S5.fsIAiBCglNxDR6EIQywUJsO9o/6H28.', NULL, '2023-07-19 07:41:42', '2023-07-19 07:41:42');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
