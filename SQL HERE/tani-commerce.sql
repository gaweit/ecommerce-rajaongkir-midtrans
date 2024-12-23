-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table tani-commerce.ekspedisis
CREATE TABLE IF NOT EXISTS `ekspedisis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tani-commerce.ekspedisis: ~3 rows (approximately)
/*!40000 ALTER TABLE `ekspedisis` DISABLE KEYS */;
INSERT INTO `ekspedisis` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(1, 'JNE', NULL, NULL);
INSERT INTO `ekspedisis` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(2, 'TIKI', NULL, NULL);
INSERT INTO `ekspedisis` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(3, 'Pos Indonesia', NULL, NULL);
INSERT INTO `ekspedisis` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(4, 'J&T', '2024-08-01 04:33:54', '2024-08-01 04:33:54');
/*!40000 ALTER TABLE `ekspedisis` ENABLE KEYS */;

-- Dumping structure for table tani-commerce.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tani-commerce.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table tani-commerce.kategoris
CREATE TABLE IF NOT EXISTS `kategoris` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tani-commerce.kategoris: ~3 rows (approximately)
/*!40000 ALTER TABLE `kategoris` DISABLE KEYS */;
INSERT INTO `kategoris` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(1, 'Sayuran', NULL, NULL);
INSERT INTO `kategoris` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(2, 'Buah-Buahan', NULL, NULL);
INSERT INTO `kategoris` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(3, 'Biji-Bijian', NULL, NULL);
INSERT INTO `kategoris` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(4, 'KAYU', '2024-08-01 04:36:28', '2024-08-01 04:36:28');
/*!40000 ALTER TABLE `kategoris` ENABLE KEYS */;

-- Dumping structure for table tani-commerce.kontaks
CREATE TABLE IF NOT EXISTS `kontaks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tani-commerce.kontaks: ~4 rows (approximately)
/*!40000 ALTER TABLE `kontaks` DISABLE KEYS */;
INSERT INTO `kontaks` (`id`, `nama`, `icon`, `deskripsi`, `created_at`, `updated_at`) VALUES
	(1, 'https://wa.me/082180181958', 'mai-logo-whatsapp', '082180181958', NULL, NULL);
INSERT INTO `kontaks` (`id`, `nama`, `icon`, `deskripsi`, `created_at`, `updated_at`) VALUES
	(2, 'mail:totani@gmail.com', 'mai-logo-google-plus-g', 'totani@gmail.com', NULL, NULL);
INSERT INTO `kontaks` (`id`, `nama`, `icon`, `deskripsi`, `created_at`, `updated_at`) VALUES
	(3, 'totani@gmail.com', 'mai-logo-map-maker', 'Perumahan Anugrah Mandiri 8, Blok AL No.5, Mendalo Darat, Kec. Jambi Luar Kota, Kabupaten Muaro Jambi, Jambi 36361', NULL, NULL);
INSERT INTO `kontaks` (`id`, `nama`, `icon`, `deskripsi`, `created_at`, `updated_at`) VALUES
	(4, 'NOREK', 'BRI', '346-8651-6843-543-546-5', '2024-09-09 17:18:27', '2024-09-09 17:18:27');
/*!40000 ALTER TABLE `kontaks` ENABLE KEYS */;

-- Dumping structure for table tani-commerce.kotas
CREATE TABLE IF NOT EXISTS `kotas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya_ongkir` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tani-commerce.kotas: ~3 rows (approximately)
/*!40000 ALTER TABLE `kotas` DISABLE KEYS */;
INSERT INTO `kotas` (`id`, `nama`, `biaya_ongkir`, `created_at`, `updated_at`) VALUES
	(1, 'Jakarta', 10000.00, NULL, NULL);
INSERT INTO `kotas` (`id`, `nama`, `biaya_ongkir`, `created_at`, `updated_at`) VALUES
	(2, 'Bandung', 8000.00, NULL, NULL);
INSERT INTO `kotas` (`id`, `nama`, `biaya_ongkir`, `created_at`, `updated_at`) VALUES
	(3, 'Surabaya', 12000.00, NULL, NULL);
INSERT INTO `kotas` (`id`, `nama`, `biaya_ongkir`, `created_at`, `updated_at`) VALUES
	(4, 'Jambi', 30000.00, '2024-08-01 04:34:32', '2024-08-01 04:34:32');
/*!40000 ALTER TABLE `kotas` ENABLE KEYS */;

-- Dumping structure for table tani-commerce.medsos
CREATE TABLE IF NOT EXISTS `medsos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tani-commerce.medsos: ~3 rows (approximately)
/*!40000 ALTER TABLE `medsos` DISABLE KEYS */;
INSERT INTO `medsos` (`id`, `nama`, `icon`, `link`, `created_at`, `updated_at`) VALUES
	(1, 'Facebook', 'mai-logo-facebook-f', 'https://facebook.com', NULL, NULL);
INSERT INTO `medsos` (`id`, `nama`, `icon`, `link`, `created_at`, `updated_at`) VALUES
	(2, 'Twitter', 'mai-logo-twitter', 'https://twitter.com', NULL, NULL);
INSERT INTO `medsos` (`id`, `nama`, `icon`, `link`, `created_at`, `updated_at`) VALUES
	(3, 'Instagram', 'mai-logo-instagram', 'https://instagram.com', NULL, NULL);
INSERT INTO `medsos` (`id`, `nama`, `icon`, `link`, `created_at`, `updated_at`) VALUES
	(4, 'Youtube', 'mai-logo-youtube', 'https://youtube.com', NULL, NULL);
/*!40000 ALTER TABLE `medsos` ENABLE KEYS */;

-- Dumping structure for table tani-commerce.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tani-commerce.migrations: ~18 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(5, '2024_07_30_062439_create_kontaks_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(6, '2024_07_30_062825_create_medsos_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(7, '2024_07_30_062921_create_slides_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(8, '2024_07_30_063008_create_kategoris_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(9, '2024_07_30_063119_create_kotas_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(10, '2024_07_30_063208_create_ekspedisis_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(11, '2024_07_30_063316_create_produks_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(12, '2024_07_30_063413_create_orders_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(13, '2024_07_30_065910_create_permission_tables', 2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(14, '2024_07_30_085851_add_field_to_orders_table', 3);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(15, '2024_07_31_065341_add_field_to_users_table', 4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(16, '2024_07_31_065615_add_field_to_users_table', 5);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(17, '2024_07_31_071538_add_field_to_orders_table', 6);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(18, '2024_07_31_074358_add_field_to_orders_table', 7);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(19, '2024_07_31_163018_add_field_to_orders_table', 8);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(20, '2024_09_09_164212_add_field_to_orders_table', 9);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table tani-commerce.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tani-commerce.model_has_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;

-- Dumping structure for table tani-commerce.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tani-commerce.model_has_roles: ~0 rows (approximately)
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;

-- Dumping structure for table tani-commerce.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `produk_id` bigint(20) unsigned NOT NULL,
  `kota_id` bigint(20) unsigned NOT NULL,
  `ekspedisi_id` bigint(20) unsigned NOT NULL,
  `metode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transfer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orders_produk_id_foreign` (`produk_id`),
  KEY `orders_kota_id_foreign` (`kota_id`),
  KEY `orders_ekspedisi_id_foreign` (`ekspedisi_id`),
  CONSTRAINT `orders_ekspedisi_id_foreign` FOREIGN KEY (`ekspedisi_id`) REFERENCES `ekspedisis` (`id`) ON DELETE CASCADE,
  CONSTRAINT `orders_kota_id_foreign` FOREIGN KEY (`kota_id`) REFERENCES `kotas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `orders_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE CASCADE,
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tani-commerce.orders: ~5 rows (approximately)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`, `kode`, `user_id`, `produk_id`, `kota_id`, `ekspedisi_id`, `metode`, `transfer`, `alamat`, `jumlah_order`, `total`, `status`, `created_at`, `updated_at`) VALUES
	(6, 'ORDERIJc', 3, 2, 1, 3, 'COD', NULL, 'Jl.Jambi Simpang III Sipin Kota Baru Kota Jambi', '1', '30.000', 'Cancel', '2024-07-31 09:03:53', '2024-08-01 04:33:12');
INSERT INTO `orders` (`id`, `kode`, `user_id`, `produk_id`, `kota_id`, `ekspedisi_id`, `metode`, `transfer`, `alamat`, `jumlah_order`, `total`, `status`, `created_at`, `updated_at`) VALUES
	(7, 'ORDERJ2q', 3, 1, 3, 3, 'COD', NULL, 'Jl.Jambi Simpang III Sipin Kota Baru Kota Jambi', '1', '27.000', 'Diterima', '2024-07-31 14:58:57', '2024-07-31 15:00:51');
INSERT INTO `orders` (`id`, `kode`, `user_id`, `produk_id`, `kota_id`, `ekspedisi_id`, `metode`, `transfer`, `alamat`, `jumlah_order`, `total`, `status`, `created_at`, `updated_at`) VALUES
	(8, 'ORDERLyD', 3, 1, 3, 3, 'COD', NULL, 'Jl.Jambi Simpang III Sipin Kota Baru Kota Jambi', '2', '42.000', 'Dikirim', '2024-07-31 16:35:15', '2024-07-31 16:44:20');
INSERT INTO `orders` (`id`, `kode`, `user_id`, `produk_id`, `kota_id`, `ekspedisi_id`, `metode`, `transfer`, `alamat`, `jumlah_order`, `total`, `status`, `created_at`, `updated_at`) VALUES
	(9, 'ORDERmRd', 4, 3, 1, 1, 'COD', NULL, 'Jl.Jambi Simpang III Sipin Kota Baru Kota Jambi', '2', '110.000', 'Diterima', '2024-08-01 04:25:57', '2024-08-01 04:30:20');
INSERT INTO `orders` (`id`, `kode`, `user_id`, `produk_id`, `kota_id`, `ekspedisi_id`, `metode`, `transfer`, `alamat`, `jumlah_order`, `total`, `status`, `created_at`, `updated_at`) VALUES
	(11, 'ORDERIFM', 4, 8, 1, 4, 'TRANSFER', 'transfer/F7wfeJEcT2J211wLAdTa39EHX3vWQpbjBp7sWEQY.png', 'Jl.Jambi Simpang III Sipin Kota Baru Kota Jambi', '2', '44.000', 'Diterima', '2024-09-09 17:25:57', '2024-09-09 17:27:52');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table tani-commerce.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tani-commerce.password_reset_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;

-- Dumping structure for table tani-commerce.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tani-commerce.permissions: ~114 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'view_ekspedisi', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(2, 'view_any_ekspedisi', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(3, 'create_ekspedisi', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(4, 'update_ekspedisi', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(5, 'restore_ekspedisi', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(6, 'restore_any_ekspedisi', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(7, 'replicate_ekspedisi', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(8, 'reorder_ekspedisi', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(9, 'delete_ekspedisi', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(10, 'delete_any_ekspedisi', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(11, 'force_delete_ekspedisi', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(12, 'force_delete_any_ekspedisi', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(13, 'view_kategori', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(14, 'view_any_kategori', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(15, 'create_kategori', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(16, 'update_kategori', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(17, 'restore_kategori', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(18, 'restore_any_kategori', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(19, 'replicate_kategori', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(20, 'reorder_kategori', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(21, 'delete_kategori', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(22, 'delete_any_kategori', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(23, 'force_delete_kategori', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(24, 'force_delete_any_kategori', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(25, 'view_kontak', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(26, 'view_any_kontak', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(27, 'create_kontak', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(28, 'update_kontak', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(29, 'restore_kontak', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(30, 'restore_any_kontak', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(31, 'replicate_kontak', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(32, 'reorder_kontak', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(33, 'delete_kontak', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(34, 'delete_any_kontak', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(35, 'force_delete_kontak', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(36, 'force_delete_any_kontak', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(37, 'view_kota', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(38, 'view_any_kota', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(39, 'create_kota', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(40, 'update_kota', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(41, 'restore_kota', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(42, 'restore_any_kota', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(43, 'replicate_kota', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(44, 'reorder_kota', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(45, 'delete_kota', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(46, 'delete_any_kota', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(47, 'force_delete_kota', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(48, 'force_delete_any_kota', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(49, 'view_medsos', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(50, 'view_any_medsos', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(51, 'create_medsos', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(52, 'update_medsos', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(53, 'restore_medsos', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(54, 'restore_any_medsos', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(55, 'replicate_medsos', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(56, 'reorder_medsos', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(57, 'delete_medsos', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(58, 'delete_any_medsos', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(59, 'force_delete_medsos', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(60, 'force_delete_any_medsos', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(61, 'view_order', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(62, 'view_any_order', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(63, 'create_order', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(64, 'update_order', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(65, 'restore_order', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(66, 'restore_any_order', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(67, 'replicate_order', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(68, 'reorder_order', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(69, 'delete_order', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(70, 'delete_any_order', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(71, 'force_delete_order', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(72, 'force_delete_any_order', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(73, 'view_produk', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(74, 'view_any_produk', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(75, 'create_produk', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(76, 'update_produk', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(77, 'restore_produk', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(78, 'restore_any_produk', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(79, 'replicate_produk', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(80, 'reorder_produk', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(81, 'delete_produk', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(82, 'delete_any_produk', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(83, 'force_delete_produk', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(84, 'force_delete_any_produk', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(85, 'view_role', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(86, 'view_any_role', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(87, 'create_role', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(88, 'update_role', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(89, 'delete_role', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(90, 'delete_any_role', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(91, 'view_slide', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(92, 'view_any_slide', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(93, 'create_slide', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(94, 'update_slide', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(95, 'restore_slide', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(96, 'restore_any_slide', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(97, 'replicate_slide', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(98, 'reorder_slide', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(99, 'delete_slide', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(100, 'delete_any_slide', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(101, 'force_delete_slide', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(102, 'force_delete_any_slide', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(103, 'view_user', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(104, 'view_any_user', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(105, 'create_user', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(106, 'update_user', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(107, 'restore_user', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(108, 'restore_any_user', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(109, 'replicate_user', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(110, 'reorder_user', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(111, 'delete_user', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(112, 'delete_any_user', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(113, 'force_delete_user', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(114, 'force_delete_any_user', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping structure for table tani-commerce.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tani-commerce.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table tani-commerce.produks
CREATE TABLE IF NOT EXISTS `produks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kategori_id` bigint(20) unsigned NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produks_kategori_id_foreign` (`kategori_id`),
  CONSTRAINT `produks_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tani-commerce.produks: ~7 rows (approximately)
/*!40000 ALTER TABLE `produks` DISABLE KEYS */;
INSERT INTO `produks` (`id`, `kategori_id`, `judul`, `slug`, `harga`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Tomat Segarrrrrrrr', 'tomat-segar', '15000', 'Tomat segar dari kebun kami.', '01J419PSFKD6JXW5NX76XME4GM.png', '2024-07-30 07:47:04', '2024-07-30 07:47:04');
INSERT INTO `produks` (`id`, `kategori_id`, `judul`, `slug`, `harga`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
	(2, 2, 'Apel Hijau', 'apel-hijau', '20000', 'Apel hijau segar dan manis.', '01J419PSFKD6JXW5NX76XME4GM.png', NULL, '2024-07-30 07:47:04');
INSERT INTO `produks` (`id`, `kategori_id`, `judul`, `slug`, `harga`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
	(3, 3, 'Beras Organik', 'beras-organik', '50000', 'Beras organik berkualitas tinggi.', '01J419PSFKD6JXW5NX76XME4GM.png', NULL, '2024-07-30 07:47:04');
INSERT INTO `produks` (`id`, `kategori_id`, `judul`, `slug`, `harga`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
	(4, 3, 'asddasdsd', 'asddasdsd', '3123123', '<p>asdasdasd</p><ol><li>asda</li><li>sda</li><li>sdas</li><li>d</li></ol>', '01J419PSFKD6JXW5NX76XME4GM.png', '2024-07-30 07:47:04', '2024-07-30 07:47:45');
INSERT INTO `produks` (`id`, `kategori_id`, `judul`, `slug`, `harga`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
	(5, 3, 'asddasdsd', 'asddasdasdsd', '3123123', '<p>asdasdasd</p><ol><li>asda</li><li>sda</li><li>sdas</li><li>d</li></ol>', '01J419PSFKD6JXW5NX76XME4GM.png', '2024-07-30 07:47:04', '2024-07-30 07:47:45');
INSERT INTO `produks` (`id`, `kategori_id`, `judul`, `slug`, `harga`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
	(6, 3, 'asddasdsd', 'a', '3123123', '<p>asdasdasd</p><ol><li>asda</li><li>sda</li><li>sdas</li><li>d</li></ol>', '01J419PSFKD6JXW5NX76XME4GM.png', '2024-07-30 07:47:04', '2024-07-30 07:47:45');
INSERT INTO `produks` (`id`, `kategori_id`, `judul`, `slug`, `harga`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
	(7, 3, 'asddasdsd', 'v', '3123123', '<p>asdasdasd</p><ol><li>asda</li><li>sda</li><li>sdas</li><li>d</li></ol>', '01J419PSFKD6JXW5NX76XME4GM.png', '2024-07-30 07:47:04', '2024-07-30 07:47:45');
INSERT INTO `produks` (`id`, `kategori_id`, `judul`, `slug`, `harga`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
	(8, 2, 'semangka', 'semangka', '12000', '<p>harga per kilo.</p><ol><li>dlll contoh&nbsp;</li></ol>', '01J463N2HP3960BK9412Q18NQ7.png', '2024-08-01 04:37:28', '2024-08-01 04:37:28');
/*!40000 ALTER TABLE `produks` ENABLE KEYS */;

-- Dumping structure for table tani-commerce.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tani-commerce.roles: ~0 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'super_admin', 'web', '2024-07-30 06:59:12', '2024-07-30 06:59:12');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table tani-commerce.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tani-commerce.role_has_permissions: ~114 rows (approximately)
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(1, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(2, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(3, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(4, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(5, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(6, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(7, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(8, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(9, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(10, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(11, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(12, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(13, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(14, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(15, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(16, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(17, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(18, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(19, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(20, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(21, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(22, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(23, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(24, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(25, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(26, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(27, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(28, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(29, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(30, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(31, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(32, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(33, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(34, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(35, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(36, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(37, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(38, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(39, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(40, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(41, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(42, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(43, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(44, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(45, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(46, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(47, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(48, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(49, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(50, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(51, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(52, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(53, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(54, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(55, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(56, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(57, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(58, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(59, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(60, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(61, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(62, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(63, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(64, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(65, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(66, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(67, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(68, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(69, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(70, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(71, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(72, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(73, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(74, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(75, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(76, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(77, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(78, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(79, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(80, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(81, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(82, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(83, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(84, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(85, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(86, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(87, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(88, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(89, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(90, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(91, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(92, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(93, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(94, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(95, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(96, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(97, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(98, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(99, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(100, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(101, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(102, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(103, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(104, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(105, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(106, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(107, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(108, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(109, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(110, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(111, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(112, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(113, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(114, 1);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;

-- Dumping structure for table tani-commerce.slides
CREATE TABLE IF NOT EXISTS `slides` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tani-commerce.slides: ~1 rows (approximately)
/*!40000 ALTER TABLE `slides` DISABLE KEYS */;
INSERT INTO `slides` (`id`, `gambar`, `created_at`, `updated_at`) VALUES
	(1, 'padi.png', NULL, NULL);
/*!40000 ALTER TABLE `slides` ENABLE KEYS */;

-- Dumping structure for table tani-commerce.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `kode_pos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tani-commerce.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `jenis_kelamin`, `alamat`, `kode_pos`, `provinsi`, `kota`, `kecamatan`, `nomor_whatsapp`, `gambar`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin@contoh.com', '2024-07-30 06:39:05', '$2y$10$FAOZOfj3wkeZTP7QmDWb4eaijkF4Cl9n15vr/Ob7u1YeX6byv/ja6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-30 06:39:05', '2024-07-30 06:39:05');
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `jenis_kelamin`, `alamat`, `kode_pos`, `provinsi`, `kota`, `kecamatan`, `nomor_whatsapp`, `gambar`, `remember_token`, `created_at`, `updated_at`) VALUES
	(2, 'Pelanggan', 'pelanggan@contoh.com', '2024-07-30 06:39:05', '$2y$10$6sL7p4IaX9wWP2gtzQ0/xeJ2kE8JnIkPfv6XageglpWhD12dJQ1TK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-30 06:39:06', '2024-07-30 06:39:06');
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `jenis_kelamin`, `alamat`, `kode_pos`, `provinsi`, `kota`, `kecamatan`, `nomor_whatsapp`, `gambar`, `remember_token`, `created_at`, `updated_at`) VALUES
	(3, 'MUHAMMAD LUKMAN SARIP', 'lukman@contoh.com', NULL, '$2y$10$D3mPDSXLQEGY6dOkql5UmuQB6OOpfzokHHAg11HfPBm5uZmrKa2Pa', 'Laki-laki', 'Jl.Jambi Simpang III Sipin Kota Baru Kota Jambi', '36361', 'Jambi', 'Kota Jambi', 'Jambi', '0812548787', 'gambar/p23Ul6kutC8EjfSwCI6kSw6aa9ZVaOnYkifDaytX.jpg', NULL, '2024-07-31 07:01:19', '2024-07-31 07:01:19');
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `jenis_kelamin`, `alamat`, `kode_pos`, `provinsi`, `kota`, `kecamatan`, `nomor_whatsapp`, `gambar`, `remember_token`, `created_at`, `updated_at`) VALUES
	(4, 'Web Jasa', 'arieflukman557@gmail.com', NULL, '$2y$10$qsWvO5xTMTb.QV2FZg9fVua6nEk20Hl0u1EzCHYpJnUvfW0XpK1h6', 'Laki-laki', 'Jl.Jambi Simpang III Sipin Kota Baru Kota Jambi', '36361', 'Jambi', 'Kota Jambi', 'Jambi', '0812548787', 'gambar/lieiuRAXQcCbX9MkjreQE8MZcn91id58vtBmuWX4.jpg', NULL, '2024-08-01 04:24:13', '2024-08-01 04:24:13');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
