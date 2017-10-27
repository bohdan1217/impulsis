-- --------------------------------------------------------
-- Сервер:                       127.0.0.1
-- Версія сервера:               5.7.11 - MySQL Community Server (GPL)
-- ОС сервера:                   Win32
-- HeidiSQL Версія:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for impulsis
CREATE DATABASE IF NOT EXISTS `impulsis` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `impulsis`;


-- Dumping structure for таблиця impulsis.authors
CREATE TABLE IF NOT EXISTS `authors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `authors_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table impulsis.authors: ~2 rows (приблизно)
DELETE FROM `authors`;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Luke Welling', '2017-10-23 18:02:03', '2017-10-23 18:02:04'),
	(2, 'Laura Thomson', '2017-10-23 18:02:18', NULL),
	(3, 'David Sawyer', '2017-10-23 18:02:40', '2017-10-23 18:02:40');
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;


-- Dumping structure for таблиця impulsis.books
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication` int(11) NOT NULL,
  `isbn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `books_author_foreign` (`author`),
  KEY `books_genre_foreign` (`genre`),
  CONSTRAINT `books_author_foreign` FOREIGN KEY (`author`) REFERENCES `authors` (`name`),
  CONSTRAINT `books_genre_foreign` FOREIGN KEY (`genre`) REFERENCES `genres` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table impulsis.books: ~5 rows (приблизно)
DELETE FROM `books`;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` (`id`, `title`, `language`, `publication`, `isbn`, `image`, `created_at`, `updated_at`, `author`, `genre`) VALUES
	(14, 'Test1', 'Ru', 1999, '342-4234234234', 'li1.jpg', '2017-10-27 05:55:02', '2017-10-27 05:56:52', 'Laura Thomson', 'Romance'),
	(15, 'Book2', 'English', 2012, '312-3123123123', 'li2.jpg', '2017-10-27 05:55:27', '2017-10-27 05:55:27', 'David Sawyer', 'Fantasy'),
	(16, 'Test3', 'Ru', 2012, '123-1231231231', 'li3.jpg', '2017-10-27 05:55:46', '2017-10-27 05:55:46', 'Luke Welling', 'Romance'),
	(17, 'Book4', 'Uk', 1999, '200-0212123131', 'wl3.jpg', '2017-10-27 05:56:13', '2017-10-27 05:56:13', 'Laura Thomson', 'Programming'),
	(18, 'Test5', 'Ru', 2011, '111-1111111111', 'wl2.jpg', '2017-10-27 05:56:38', '2017-10-27 05:56:38', 'David Sawyer', 'Fantasy');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;


-- Dumping structure for таблиця impulsis.genres
CREATE TABLE IF NOT EXISTS `genres` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `genres_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table impulsis.genres: ~2 rows (приблизно)
DELETE FROM `genres`;
/*!40000 ALTER TABLE `genres` DISABLE KEYS */;
INSERT INTO `genres` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Programming', '2017-10-23 18:01:40', '2017-10-23 18:01:40'),
	(2, 'Fantasy', '2017-10-23 18:01:41', '2017-10-23 18:01:41'),
	(3, 'Romance', '2017-10-23 18:01:42', '2017-10-23 18:01:43');
/*!40000 ALTER TABLE `genres` ENABLE KEYS */;


-- Dumping structure for таблиця impulsis.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table impulsis.migrations: ~5 rows (приблизно)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2017_10_23_143204_create_table_books', 1),
	(4, '2017_10_23_143243_create_table_authors', 1),
	(5, '2017_10_23_143312_create_table_genres', 1),
	(6, '2017_10_23_145822_change_table_books', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


-- Dumping structure for таблиця impulsis.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table impulsis.password_resets: ~0 rows (приблизно)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;


-- Dumping structure for таблиця impulsis.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table impulsis.users: ~0 rows (приблизно)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
