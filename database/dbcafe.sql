-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for dbcafe
CREATE DATABASE IF NOT EXISTS `dbcafe` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `dbcafe`;

-- Dumping structure for table dbcafe.articles
CREATE TABLE IF NOT EXISTS `articles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` bigint unsigned NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `articles_slug_unique` (`slug`),
  KEY `articles_author_id` (`author_id`),
  KEY `articles_category_id` (`category_id`),
  CONSTRAINT `articles_author_id` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`),
  CONSTRAINT `articles_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbcafe.articles: ~3 rows (approximately)
INSERT INTO `articles` (`id`, `title`, `image`, `author_id`, `category_id`, `slug`, `body`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Langkah Membuat Lavender Tea', '2wKx03TA8CWMgwHkiZ94X0nbp0w5Tvjte6yVhU6q.jpg', 1, 1, 'make-lavender-tea', 'Aroma teh lavender yang khas menjadikannya populer di kalangan penikmat teh atau peminum teh biasa. Teh ini bisa meningkat moodmu dan memberikan ketenangan. \r\n\r\n\r\nAyo simak cara untuk membuatnya! \r\n\r\n1. Pertama,  panaskan air isi teko berukuran sedang, jangan gunakan air keran loh ya. Gunakan air yang sudah dimurnikan dan disterilkan, air yang digunakan bisa mempengaruhi rasa. \r\n\r\n2. Kedua, seduh bunga lavender. Tambahkan bunga lavender kedalam bungkus teh lalu masukkan ke dalam teko. Tinggalkan selama 10 menit. \r\n\r\n3. Ketiga, keluarkan bunga dan tuangkan air seduhannya ke dalam cangkir teh. Nikmati rasa segar dari bunga teh Lavender.', '2024-11-03 01:27:29', '2024-11-03 01:27:29', NULL),
	(2, 'Membuat Omija Punch with Pear', '6VVRekW3nQ8q3iUhsjNfh9wx9q4srx2MVTlsBnde.jpg', 1, 2, 'make-omija-punch', 'Teh Omija, populer di kalangan penikmat teh. Terbuat dari buah omija yang disebut buah Schisandra atau buah lima rasa karena rasanya asam, asin, manis, pedas, dan pahit. Omija Punch ini memiliki rasa yang menyegarkan dan menghilangkan dahaga!\r\n\r\n\r\nIni langkah-langkah membuatnya, \r\n\r\n\r\n1. Pertama, masukkan omija kering dan air ke dalam toples kaca. Tutup dan rendam selama 24 jam.\r\n\r\n2. Kedua, saring di atas mangkuk besar atau toples kaca lainnya.\r\n\r\n3. Ketiga, tambahkan madu dan aduk rata dengan sendok kayu sampai madu larut sempurna.\r\n\r\n4. Keempat, dinginkan. Kupas buah pir dan potong-potong dengan cetakan bunga. \r\n\r\n5. Kelima, tuangkan sekitar 1 cangkir punch ke dalam mangkuk. Tambahkan 3 hingga 4 es batu dan 4 hingga 5 irisan pir. Aduk perlahan hingga dingin. Taburi dengan beberapa kacang pinus dan sajikan dengan sendok.', '2024-11-03 01:38:36', '2024-11-03 18:39:55', NULL),
	(3, 'Membuat Lemon Cake', '561QlyoOwffPKILModUe21owzkaOOSIG5ls5yXmm.jpg', 1, 3, 'make-lemon-cake', 'Lemon cake, rasa lemonnya yang menyegarkan disetiap gigitan. Dilapisi dengan sirup lemon dan krim. Teksturnya yang lembut cocok untuk dinikmati dengan teh apapun. \r\n\r\n\r\nBerikut langkah-langkahnya, \r\n\r\n1. Pertama, panaskan oven lalu olesi loyang kue bundar berukuran 20 cm (ukuran dasar). \r\n\r\n2. Kedua, gunakan whisk untuk mengocok mentega, gula, dan kulit lemon dalam mangkuk hingga pucat dan lembut. Tambahkan telur satu persatu, kocok dengan baik setelah setiap penambahan hingga tercampur rata.\r\n\r\n3. Ketiga, gunakan spatula untuk mencampur tepung ke dalam campuran mentega hingga hampir menyatu. Tambahkan air jeruk lemon dan campurkan ke dalam campuran hingga hampir menyatu. Pindahkan ke loyang yang sudah disiapkan. Ratakan permukaannya. \r\n\r\n4. Keempat, panggang selama 50 menit atau sampai berwarna keemasan dan kue mengembang kembali saat ditekan ringan. Sisihkan dalam loyang selama 10 menit hingga agak dingin sebelum dipindahkan ke rak kawat hingga benar-benar dingin.\r\n\r\n5. Kelima, untuk membuat lapisan gula, ayak gula bubuk ke dalam mangkuk. Tambahkan 1 sdm air jeruk lemon dan aduk hingga tercampur. (Tambahkan 1/2 sdm air jeruk lemon tambahan jika perlu untuk mendapatkan konsistensi yang halus dan mudah dioleskan). Oleskan di atas kue yang sudah dingin dan taburi dengan kulit lemon , jika menggunakan. Diamkan selama 2 jam atau hingga lapisan gula mengeras. Sajikan.', '2024-11-03 01:46:07', '2024-11-03 18:46:48', NULL),
	(4, 'Mari Membuat Teh Tarik', 'fceddad48108da534fc2e2ff128e8322.jpg', 1, 1, 'mari-membuat-teh-tarik', 'Teh Tarik, rasa tehnya yang manis dan lembut. Menghangatkan diri dari cuaca yang dingin. Membuatmu menjadi bahagia dan menenangkan pikiran. \r\n\r\n\r\nBerikut langkah-langkahnya, \r\n\r\n1. Pertama, seduh teh dengan air panas mendidih hingga kental dan hitam. \r\n\r\n2. Kedua, tambahkan susu evaporasi dan kental manis ke dalam teh yang sudah dimasak, aduk rata.\r\n\r\n3. Ketiga, siapkan satu gelas bergagang bukan dari bahan beling. Tuangkan campuran teh susu ke dalam gelas tersebut. \r\n\r\n4. Keempat, tuang cairan dan tarik gelas campuran teh susu ke gelas tinggi tersebut. Ulangi berkali-kali sampai teh berbusa.\r\n\r\n5. Kelima, Sajikan teh dalam kondisi hangat', '2024-11-03 19:03:48', '2024-11-03 19:09:52', NULL);

-- Dumping structure for table dbcafe.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbcafe.cache: ~0 rows (approximately)

-- Dumping structure for table dbcafe.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbcafe.cache_locks: ~0 rows (approximately)

-- Dumping structure for table dbcafe.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbcafe.categories: ~2 rows (approximately)
INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
	(1, 'Minuman Hangat', 'minuman-hangat', '2024-11-02 21:41:14', '2024-11-02 21:41:14'),
	(2, 'Minuman Dingin', 'minuman-dingin', '2024-11-02 21:41:14', '2024-11-02 21:41:14'),
	(3, 'Makanan Ringan', 'makanan-ringan', '2024-11-02 21:41:14', '2024-11-02 21:41:14');

-- Dumping structure for table dbcafe.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbcafe.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table dbcafe.galleries
CREATE TABLE IF NOT EXISTS `galleries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` bigint unsigned NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `galleries_author_id` (`author_id`),
  KEY `galleries_category_id` (`category_id`),
  CONSTRAINT `galleries_author_id` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`),
  CONSTRAINT `galleries_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbcafe.galleries: ~3 rows (approximately)
INSERT INTO `galleries` (`id`, `image`, `author_id`, `category_id`, `description`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'J8AcmCa8l3NcS3Cp0fYUoIrRCJDuaGH7si1djbz3.jpg', 1, 2, 'Menu baru yang akan hadir!!!', 'new-fruit-punch', '2024-11-03 01:51:59', '2024-11-03 01:51:59', NULL),
	(2, 'Pu74VOf5haD48QsDRZPdRmpwsyBzFi5cVsE8PuuE.jpg', 1, 3, 'Menu Halloween Baru!', 'new-halloween', '2024-11-03 01:59:20', '2024-11-03 01:59:20', NULL),
	(3, 'hscdbh7XSHXB834Xshbsc7.jpg', 1, 3, 'Ayo coba Strawberry Tart yang segar ini!', 'strawberry-tart-segar', '2024-11-03 19:19:52', '2024-11-03 19:19:52', NULL);

-- Dumping structure for table dbcafe.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbcafe.jobs: ~0 rows (approximately)

-- Dumping structure for table dbcafe.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbcafe.job_batches: ~0 rows (approximately)

-- Dumping structure for table dbcafe.menus
CREATE TABLE IF NOT EXISTS `menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint NOT NULL,
  `stock` int NOT NULL DEFAULT '0',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menus_category_id` (`category_id`),
  CONSTRAINT `menus_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbcafe.menus: ~3 rows (approximately)
INSERT INTO `menus` (`id`, `name`, `image`, `category_id`, `description`, `price`, `stock`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Masala Tea', 'URpliaHPZND8HAgFymZecNiYe8gzy9dU6gBG47bm.jpg', 1, 'Masala tea terbuat dari seduhan teh hitam dalam air hangat dan susu. Dicampur dengan rempah-rempah yang memperkaya rasa.', 28000, 26, 'masala-tea', '2024-11-02 21:43:14', '2024-11-03 04:51:12', NULL),
	(2, 'Iced Matcha Latte', 'lo2CyDAXFI8zYSRQ2JHeS1QJosMNkimPgbrud12Z.jpg', 2, 'Rasa matcha yang menenangkan jiwa dan pikiran. Rasanya yang creamy dan manis.', 27000, 27, 'matcha-latte', '2024-11-02 21:44:12', '2024-11-03 04:51:12', NULL),
	(3, 'Strawberry Tart', 'OS8mTXkiDRw5V9yLChfNG9TM5LEit8oS9lBbVJRp.jpg', 3, 'Teksturnya yang empuk dengan rasa yang menyegarkan dari buah stroberi, membuat mood naik.', 30000, 28, 'strawberry-tart', '2024-11-02 21:45:06', '2024-11-03 04:51:12', NULL),
	(4, 'Oolong Tea', 'tsoIqJa0bHtMUB84pwmE1CJc8JZDe93gwA3sQ8oU.jpg', 1, 'Terbuat dari seduhan teh hijau yang dikeringkan. Rasanya yang menghangatkan perut dari cuaca yang dingin.', 26000, 29, 'oolong-tea', '2024-11-03 03:08:36', '2024-11-03 19:58:37', NULL),
	(5, 'Iced Black Tea', '4yn35egILrjQP9MngPPVoGaqIIQBq1I3d1nqt412.jpg', 2, 'Terbuat dari seduhan teh hijau yang dikeringkan dan lebih lama dari proses dikeringkannya oolong tea. Rasanya yang unik dengan lemon yang menyegarkan.', 27000, 30, 'iced-black-tea', '2024-11-03 03:15:05', '2024-11-03 03:15:05', NULL),
	(6, 'Lavender Tea', 'hsbcsj34JSBC53JCsbcmjs8scsJcsbksn.png', 1, 'Rasa lavender yang unik serta menghangatkan. Wanginya yang harum dan segar.', 23000, 30, 'lavender-tea', '2024-11-03 18:29:26', '2024-11-03 18:29:26', NULL),
	(7, 'Lemon Tea', 'hscbjsnm4MH3H5Jscnsjbc35FJcbsjkNS.png', 2, 'Rasa lemon yang menyegarkan dan menaikkan mood.', 25000, 30, 'lemon-tea', '2024-11-03 18:29:26', '2024-11-03 18:29:26', NULL),
	(8, 'Chamomile Tea', '6Mscnsj563mcajjssvjsvksnHSC873jk.png', 1, 'Rasa teh chamomile yang unik membuatnya populer. Harum tehnya segar.', 26000, 29, 'chamomile-tea', '2024-11-03 18:29:26', '2024-11-03 19:58:37', NULL);

-- Dumping structure for table dbcafe.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbcafe.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2024_10_30_160923_create_categories_table', 1),
	(5, '2024_10_31_134954_create_articles_table', 1),
	(6, '2024_10_31_171036_create_galleries_table', 1),
	(7, '2024_11_02_034912_create_menus_table', 1),
	(8, '2024_11_02_092318_create_orders_table', 1),
	(9, '2024_11_02_092844_create_order_items_table', 1),
	(10, '2024_11_03_042031_create_transactions_table', 1);

-- Dumping structure for table dbcafe.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `user_order_id` int unsigned NOT NULL DEFAULT '1',
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `total_price` decimal(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbcafe.orders: ~2 rows (approximately)
INSERT INTO `orders` (`id`, `user_id`, `user_order_id`, `order_date`, `status`, `total_price`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 3, 1, '2024-11-02 21:47:10', 'completed', 88000.00, '2024-11-02 21:46:43', '2024-11-02 21:53:29', NULL),
	(2, 2, 1, '2024-11-02 21:48:03', 'completed', 55000.00, '2024-11-02 21:47:50', '2024-11-02 22:34:18', NULL),
	(3, 2, 2, '2024-11-02 22:39:11', 'completed', 84000.00, '2024-11-02 22:38:29', '2024-11-02 23:15:29', NULL),
	(4, 2, 3, '2024-11-02 22:47:36', 'completed', 58000.00, '2024-11-02 22:47:08', '2024-11-02 22:48:58', NULL),
	(5, 3, 2, '2024-11-03 00:48:41', 'completed', 57000.00, '2024-11-03 00:48:06', '2024-11-03 00:51:47', NULL),
	(6, 2, 4, '2024-11-03 03:01:42', 'completed', 83000.00, '2024-11-03 02:59:14', '2024-11-03 03:03:49', NULL),
	(7, 3, 3, '2024-11-03 04:51:12', 'completed', 113000.00, '2024-11-03 04:50:10', '2024-11-03 04:54:45', NULL),
	(8, 2, 5, '2024-11-03 19:58:37', 'completed', 52000.00, '2024-11-03 19:57:18', '2024-11-03 19:59:46', NULL);

-- Dumping structure for table dbcafe.order_items
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `menu_id` bigint unsigned NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_order_id_foreign` (`order_id`),
  KEY `order_items_menu_id_foreign` (`menu_id`),
  CONSTRAINT `order_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbcafe.order_items: ~4 rows (approximately)
INSERT INTO `order_items` (`id`, `order_id`, `menu_id`, `quantity`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 3, 2, 60000.00, '2024-11-02 21:46:43', '2024-11-02 21:46:43', NULL),
	(2, 1, 1, 1, 28000.00, '2024-11-02 21:47:00', '2024-11-02 21:47:00', NULL),
	(3, 2, 2, 1, 27000.00, '2024-11-02 21:47:50', '2024-11-02 21:47:50', NULL),
	(4, 2, 1, 1, 28000.00, '2024-11-02 21:47:57', '2024-11-02 21:47:57', NULL),
	(5, 3, 2, 2, 54000.00, '2024-11-02 22:38:29', '2024-11-02 22:38:29', NULL),
	(6, 3, 3, 1, 30000.00, '2024-11-02 22:38:36', '2024-11-02 22:38:36', NULL),
	(7, 4, 3, 1, 30000.00, '2024-11-02 22:47:08', '2024-11-02 22:47:08', NULL),
	(8, 4, 1, 1, 28000.00, '2024-11-02 22:47:17', '2024-11-02 22:47:17', NULL),
	(9, 5, 3, 1, 30000.00, '2024-11-03 00:48:07', '2024-11-03 00:48:07', NULL),
	(10, 5, 2, 1, 27000.00, '2024-11-03 00:48:15', '2024-11-03 00:48:15', NULL),
	(11, 6, 1, 2, 56000.00, '2024-11-03 02:59:15', '2024-11-03 02:59:15', NULL),
	(12, 6, 2, 1, 27000.00, '2024-11-03 03:01:32', '2024-11-03 03:01:32', NULL),
	(13, 7, 5, 2, 54000.00, '2024-11-03 04:50:10', '2024-11-03 04:50:49', '2024-11-03 04:50:49'),
	(14, 7, 3, 1, 30000.00, '2024-11-03 04:50:21', '2024-11-03 04:50:21', NULL),
	(15, 7, 2, 1, 27000.00, '2024-11-03 04:50:39', '2024-11-03 04:50:39', NULL),
	(16, 7, 1, 2, 56000.00, '2024-11-03 04:51:02', '2024-11-03 04:51:02', NULL),
	(17, 8, 8, 1, 26000.00, '2024-11-03 19:57:18', '2024-11-03 19:57:18', NULL),
	(18, 8, 4, 1, 26000.00, '2024-11-03 19:57:33', '2024-11-03 19:57:33', NULL);

-- Dumping structure for table dbcafe.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbcafe.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table dbcafe.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbcafe.sessions: ~1 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('MD98seegskUxYNFzTSmM8tT3Jzsj6bUHG410UoyU', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTlVabzVvbkhBcTZSN01COFVBSzBYQzYxVGlPaERXQUZrd2JqTDdsUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly9jYWZlbGFyYXZlbC50ZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1730689210);

-- Dumping structure for table dbcafe.transactions
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL,
  `change` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transactions_order_id_foreign` (`order_id`),
  CONSTRAINT `transactions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbcafe.transactions: ~2 rows (approximately)
INSERT INTO `transactions` (`id`, `order_id`, `amount_paid`, `change`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 100000.00, 12000.00, '2024-11-02 21:55:36', '2024-11-02 21:55:36', NULL),
	(2, 2, 60000.00, 5000.00, '2024-11-02 22:34:18', '2024-11-02 22:34:18', NULL),
	(3, 4, 100000.00, 42000.00, '2024-11-02 22:48:58', '2024-11-02 22:48:58', NULL),
	(4, 3, 100000.00, 16000.00, '2024-11-02 23:15:29', '2024-11-02 23:15:29', NULL),
	(5, 5, 100000.00, 43000.00, '2024-11-03 00:51:47', '2024-11-03 00:51:47', NULL),
	(6, 6, 100000.00, 17000.00, '2024-11-03 03:03:49', '2024-11-03 03:03:49', NULL),
	(7, 7, 115000.00, 2000.00, '2024-11-03 04:54:45', '2024-11-03 04:54:45', NULL),
	(8, 8, 100000.00, 48000.00, '2024-11-03 19:59:46', '2024-11-03 19:59:46', NULL);

-- Dumping structure for table dbcafe.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint NOT NULL DEFAULT '0',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbcafe.users: ~3 rows (approximately)
INSERT INTO `users` (`id`, `name`, `username`, `type`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'First Admin', 'fstadm595', 1, 'admin132@gmail.com', NULL, '$2y$12$eaMo32LBGLiOgF48cyjnQeIxNJNPOtVyZeI6pgXuUfJ420cYh4tVS', NULL, '2024-11-02 21:41:17', '2024-11-02 21:41:17', NULL),
	(2, 'Goi Rong', 'grngx121', 0, 'groxx132@gmail.com', NULL, '$2y$12$.fUycjHep6zxhiKU3DWJReWxTwAW.ytmU530p0IE/FF3wVjnhv4ea', NULL, '2024-11-02 21:41:17', '2024-11-03 04:52:42', NULL),
	(3, 'Chuang', 'chuangzzwas132@gmail.com', 0, 'chuangzzwas132@gmail.com', NULL, '$2y$12$vJ0zTsGU5leP1OINtuIgPO3sdRlteQxEszRU2ivlWLjEb6QdpNXkO', NULL, '2024-11-02 21:45:36', '2024-11-02 21:45:36', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
