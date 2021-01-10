-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table ddgi.agents
CREATE TABLE IF NOT EXISTS `agents` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `surname` varchar(150) NOT NULL DEFAULT '',
  `name` varchar(150) NOT NULL DEFAULT '',
  `middle_name` varchar(150) NOT NULL DEFAULT '',
  `dob` date NOT NULL,
  `passport_number` varchar(50) NOT NULL DEFAULT '',
  `passport_series` varchar(50) NOT NULL DEFAULT '',
  `job` varchar(250) NOT NULL DEFAULT '',
  `work_start_date` date DEFAULT NULL,
  `work_end_date` date DEFAULT NULL,
  `phone_number` varchar(70) NOT NULL DEFAULT '',
  `address` varchar(250) NOT NULL DEFAULT '',
  `profile_img` varchar(250) DEFAULT '',
  `agent_agreement_img` varchar(250) DEFAULT '',
  `labor_contract` varchar(250) DEFAULT '',
  `firm_contract` varchar(250) DEFAULT '',
  `license` varchar(250) DEFAULT '',
  `status` tinyint(3) unsigned NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi.agents: ~1 rows (approximately)
/*!40000 ALTER TABLE `agents` DISABLE KEYS */;
REPLACE INTO `agents` (`id`, `user_id`, `surname`, `name`, `middle_name`, `dob`, `passport_number`, `passport_series`, `job`, `work_start_date`, `work_end_date`, `phone_number`, `address`, `profile_img`, `agent_agreement_img`, `labor_contract`, `firm_contract`, `license`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 4, 'Surname', 'Name', 'middlasdc', '2021-01-08', '1231321', 'asas', '2sdfvdsfv', '2020-12-31', '2021-01-07', '4234234234', 'ddfzvdsfvdsfv', '1066be21e9b238f2ef167372166fe978.jpg', NULL, NULL, NULL, '1066be21e9b238f2ef167372166fe978.jpg', 0, '2021-01-08', '2021-01-08', NULL);
/*!40000 ALTER TABLE `agents` ENABLE KEYS */;

-- Dumping structure for table ddgi.banks
CREATE TABLE IF NOT EXISTS `banks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `name` varchar(150) NOT NULL,
  `filial` varchar(150) NOT NULL,
  `address` varchar(150) NOT NULL,
  `inn` varchar(150) NOT NULL,
  `raschetniy_schet` varchar(150) NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi.banks: ~6 rows (approximately)
/*!40000 ALTER TABLE `banks` DISABLE KEYS */;
REPLACE INTO `banks` (`id`, `code`, `name`, `filial`, `address`, `inn`, `raschetniy_schet`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'sdfvdsvf', 'sdvfdsvf', 'sdfvdsvf', 'dsfvvdf', 'dsfvdsfv', 'sdfvdv', 1, '2021-01-06 14:54:01', '2021-01-08 01:34:20', '2021-01-08 01:34:20'),
	(2, 'sdfvdsvf', 'sdvfdsvf', 'sdfvdsvf', 'dsfvvdf', 'dsfvdsfv', 'sdfvdv', 0, '2021-01-06 14:54:48', '2021-01-06 14:54:48', NULL),
	(3, '53543', 'afgsdfg', 'sdgsd', 'sdfgvdsf', 'sdfgsdf', 'sdfgsd', 0, '2021-01-06 15:27:14', '2021-01-08 01:34:04', '2021-01-08 01:34:04'),
	(4, 'dfsvsdfv', 'sdvdsvf', 'sdvfdv', 'sdfv', 'sdfv', 'sdfv', 0, '2021-01-06 15:30:15', '2021-01-06 15:30:15', NULL),
	(5, 'sdfvdsfv', 'sdfv', 'sdvf', 'sdvf', 'sdvf', 'sdvf', 1, '2021-01-06 15:30:39', '2021-01-08 01:33:21', '2021-01-08 01:33:21'),
	(6, 'dsfv', 'vsdf', 'sdfv', 'svfvfd', 'sdfv', 'sdvf', 0, '2021-01-06 15:44:45', '2021-01-08 01:32:56', '2021-01-08 01:32:56');
/*!40000 ALTER TABLE `banks` ENABLE KEYS */;

-- Dumping structure for table ddgi.beneficiaries
CREATE TABLE IF NOT EXISTS `beneficiaries` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `FIO` varchar(250) NOT NULL,
  `address` varchar(150) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `checking_account` varchar(50) NOT NULL,
  `inn` varchar(50) NOT NULL,
  `mfo` varchar(50) NOT NULL,
  `okonx` varchar(50) NOT NULL,
  `bank_id` int(11) unsigned NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='страхователи';

-- Dumping data for table ddgi.beneficiaries: ~0 rows (approximately)
/*!40000 ALTER TABLE `beneficiaries` DISABLE KEYS */;
/*!40000 ALTER TABLE `beneficiaries` ENABLE KEYS */;

-- Dumping structure for table ddgi.branches
CREATE TABLE IF NOT EXISTS `branches` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) unsigned DEFAULT '0',
  `name` varchar(150) NOT NULL,
  `series` varchar(150) NOT NULL,
  `founded_date` date NOT NULL,
  `region` varchar(150) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `address` varchar(150) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `code_by_office` varchar(100) NOT NULL,
  `code_by_type` varchar(100) NOT NULL,
  `hierarchy` varchar(50) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi.branches: ~0 rows (approximately)
/*!40000 ALTER TABLE `branches` DISABLE KEYS */;
REPLACE INTO `branches` (`id`, `parent_id`, `name`, `series`, `founded_date`, `region`, `user_id`, `address`, `phone_number`, `type`, `code_by_office`, `code_by_type`, `hierarchy`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, NULL, 'fdvfdz', 'vfdv', '2021-01-08', 'Бухарская область', 9, 'dfvsdv', '45235325', 'type-1', 'sdfvdv', 'sdfvdsv', '34', '2021-01-08', '2021-01-08', NULL);
/*!40000 ALTER TABLE `branches` ENABLE KEYS */;

-- Dumping structure for table ddgi.directors
CREATE TABLE IF NOT EXISTS `directors` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `surname` varchar(150) NOT NULL DEFAULT '',
  `name` varchar(150) NOT NULL DEFAULT '',
  `middle_name` varchar(150) NOT NULL DEFAULT '',
  `dob` date NOT NULL,
  `passport_number` varchar(50) NOT NULL DEFAULT '',
  `passport_series` varchar(50) NOT NULL DEFAULT '',
  `work_start_date` date DEFAULT NULL,
  `work_end_date` date DEFAULT NULL,
  `phone_number` varchar(70) NOT NULL DEFAULT '',
  `address` varchar(250) NOT NULL DEFAULT '',
  `profile_img` varchar(250) DEFAULT '',
  `status` tinyint(3) unsigned NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table ddgi.directors: ~1 rows (approximately)
/*!40000 ALTER TABLE `directors` DISABLE KEYS */;
REPLACE INTO `directors` (`id`, `user_id`, `surname`, `name`, `middle_name`, `dob`, `passport_number`, `passport_series`, `work_start_date`, `work_end_date`, `phone_number`, `address`, `profile_img`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(2, 9, 'FotTestOnly', 'sdfv', 'sdfv', '2021-01-07', '12341234', 'adscsadc', '2021-01-14', NULL, '5555551234', 'PO Box F', '1066be21e9b238f2ef167372166fe978.jpg', 1, '2021-01-08', '2021-01-08', NULL);
/*!40000 ALTER TABLE `directors` ENABLE KEYS */;

-- Dumping structure for table ddgi.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table ddgi.kasko
CREATE TABLE IF NOT EXISTS `kasko` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(3) unsigned NOT NULL COMMENT '0 - физ лицо; 1 - юр лицо',
  `product_id` int(11) unsigned DEFAULT '0',
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `reason` varchar(250) DEFAULT NULL COMMENT 'Использование транспортного средства на основании:',
  `geo_zone` varchar(250) DEFAULT NULL COMMENT 'Географическая зона',
  `defect_img` varchar(250) DEFAULT NULL,
  `purpose` varchar(250) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi.kasko: ~0 rows (approximately)
/*!40000 ALTER TABLE `kasko` DISABLE KEYS */;
/*!40000 ALTER TABLE `kasko` ENABLE KEYS */;

-- Dumping structure for table ddgi.kasko_policy_holders
CREATE TABLE IF NOT EXISTS `kasko_policy_holders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `policy_holder_id` int(11) unsigned NOT NULL,
  `kasko_id` int(11) unsigned NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi.kasko_policy_holders: ~0 rows (approximately)
/*!40000 ALTER TABLE `kasko_policy_holders` DISABLE KEYS */;
/*!40000 ALTER TABLE `kasko_policy_holders` ENABLE KEYS */;

-- Dumping structure for table ddgi.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi.migrations: ~2 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2019_08_19_000000_create_failed_jobs_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table ddgi.policies
CREATE TABLE IF NOT EXISTS `policies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `number` int(11) unsigned NOT NULL,
  `act_number` varchar(50) NOT NULL,
  `client_type` tinyint(3) unsigned NOT NULL,
  `policy_series_id` int(11) unsigned DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi.policies: ~20 rows (approximately)
/*!40000 ALTER TABLE `policies` DISABLE KEYS */;
REPLACE INTO `policies` (`id`, `number`, `act_number`, `client_type`, `policy_series_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 141, 'asdvvd', 0, 1, 'new', '2021-01-09', '2021-01-09', NULL),
	(2, 142, 'asdvvd', 0, 1, 'new', '2021-01-09', '2021-01-09', NULL),
	(3, 143, 'asdvvd', 0, 1, 'new', '2021-01-09', '2021-01-09', NULL),
	(4, 144, 'asdvvd', 0, 1, 'new', '2021-01-09', '2021-01-09', NULL),
	(5, 145, 'asdvvd', 0, 1, 'new', '2021-01-09', '2021-01-09', NULL),
	(6, 146, 'asdvvd', 0, 1, 'new', '2021-01-09', '2021-01-09', NULL),
	(7, 147, 'asdvvd', 0, 1, 'new', '2021-01-09', '2021-01-09', NULL),
	(8, 148, 'asdvvd', 0, 1, 'new', '2021-01-09', '2021-01-09', NULL),
	(9, 149, 'asdvvd', 0, 1, 'new', '2021-01-09', '2021-01-09', NULL),
	(10, 150, 'asdvvd', 0, 1, 'new', '2021-01-09', '2021-01-09', NULL),
	(11, 141, 'asdvvd', 0, 0, 'new', '2021-01-09', '2021-01-09', NULL),
	(12, 142, 'asdvvd', 0, 0, 'new', '2021-01-09', '2021-01-09', NULL),
	(13, 143, 'asdvvd', 0, 0, 'new', '2021-01-09', '2021-01-09', NULL),
	(14, 144, 'asdvvd', 0, 0, 'new', '2021-01-09', '2021-01-09', NULL),
	(15, 145, 'asdvvd', 0, 0, 'new', '2021-01-09', '2021-01-09', NULL),
	(16, 146, 'asdvvd', 0, 0, 'new', '2021-01-09', '2021-01-09', NULL),
	(17, 147, 'asdvvd', 0, 0, 'new', '2021-01-09', '2021-01-09', NULL),
	(18, 148, 'asdvvd', 0, 0, 'new', '2021-01-09', '2021-01-09', NULL),
	(19, 149, 'asdvvd', 0, 0, 'new', '2021-01-09', '2021-01-09', NULL),
	(20, 150, 'asdvvd', 0, 0, 'new', '2021-01-09', '2021-01-09', NULL);
/*!40000 ALTER TABLE `policies` ENABLE KEYS */;

-- Dumping structure for table ddgi.policy_holders
CREATE TABLE IF NOT EXISTS `policy_holders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `FIO` varchar(250) NOT NULL,
  `address` varchar(150) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `checking_account` varchar(50) NOT NULL,
  `inn` varchar(50) NOT NULL,
  `mfo` varchar(50) NOT NULL,
  `okonx` varchar(50) NOT NULL,
  `bank_id` int(11) unsigned NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='страхователи';

-- Dumping data for table ddgi.policy_holders: ~0 rows (approximately)
/*!40000 ALTER TABLE `policy_holders` DISABLE KEYS */;
/*!40000 ALTER TABLE `policy_holders` ENABLE KEYS */;

-- Dumping structure for table ddgi.policy_registrations
CREATE TABLE IF NOT EXISTS `policy_registrations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `act_number` varchar(50) NOT NULL,
  `act_date` date DEFAULT NULL,
  `from_number` varchar(50) DEFAULT NULL,
  `to_number` varchar(50) DEFAULT NULL,
  `policy_series_id` int(11) unsigned DEFAULT NULL,
  `document` varchar(150) DEFAULT NULL,
  `client_type` tinyint(3) unsigned NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi.policy_registrations: ~3 rows (approximately)
/*!40000 ALTER TABLE `policy_registrations` DISABLE KEYS */;
REPLACE INTO `policy_registrations` (`id`, `act_number`, `act_date`, `from_number`, `to_number`, `policy_series_id`, `document`, `client_type`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'asdvvd', '2021-01-09', '101', '140', 1, 'C:\\Users\\User\\AppData\\Local\\Temp\\php1FD7.tmp', 0, '2021-01-09', '2021-01-09', NULL),
	(2, 'asdvvd', '2021-01-09', '141', '150', 1, 'C:\\Users\\User\\AppData\\Local\\Temp\\php251F.tmp', 0, '2021-01-09', '2021-01-09', NULL),
	(3, 'asdvvd', '2021-01-09', '141', '150', 0, 'C:\\Users\\User\\AppData\\Local\\Temp\\php2D49.tmp', 0, '2021-01-09', '2021-01-09', NULL);
/*!40000 ALTER TABLE `policy_registrations` ENABLE KEYS */;

-- Dumping structure for table ddgi.policy_series
CREATE TABLE IF NOT EXISTS `policy_series` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi.policy_series: ~1 rows (approximately)
/*!40000 ALTER TABLE `policy_series` DISABLE KEYS */;
REPLACE INTO `policy_series` (`id`, `code`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '2342345555AA', '2021-01-08', '2021-01-08', NULL);
/*!40000 ALTER TABLE `policy_series` ENABLE KEYS */;

-- Dumping structure for table ddgi.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(4, 'Name', 'bobur_moscow@mail.ru', NULL, '$2y$10$xogD55RJ1YcsARNn/6uze.t9.6i5pLcSyXtBTuXjEo33xTaEcLfBC', NULL, '2021-01-08 04:47:43', '2021-01-08 04:47:43'),
	(9, 'sdfv', 'director@director.com', NULL, '$2y$10$hZOx3aztDah9AsOpxbLFiumkOGecJh46VfXQC7NMr6x7mbICIUbsa', NULL, '2021-01-08 13:10:10', '2021-01-08 13:10:10');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
