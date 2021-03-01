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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi.agents: ~2 rows (approximately)
DELETE FROM `agents`;
/*!40000 ALTER TABLE `agents` DISABLE KEYS */;
INSERT INTO `agents` (`id`, `user_id`, `surname`, `name`, `middle_name`, `dob`, `passport_number`, `passport_series`, `job`, `work_start_date`, `work_end_date`, `phone_number`, `address`, `profile_img`, `agent_agreement_img`, `labor_contract`, `firm_contract`, `license`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 4, 'Surname1', 'Name1', 'middlasdc', '2021-01-08', '1231321', 'asas', '2sdfvdsfv', '2020-12-31', '2021-01-07', '4234234234', 'ddfzvdsfvdsfv', NULL, NULL, NULL, NULL, NULL, 0, '2021-01-08 00:00:00', '2021-01-10 00:00:00', NULL),
	(2, 3, 'FotTestOnly', 'ahahah', 'asdcsdac', '2021-01-29', 'sdvfdvf', 'adscsadc', 'dascdd3', '2021-01-29', '2021-02-05', '5555551234', 'PO Box F', NULL, NULL, NULL, NULL, NULL, 1, '2021-01-29 00:00:00', '2021-02-16 14:34:49', NULL);
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
DELETE FROM `banks`;
/*!40000 ALTER TABLE `banks` DISABLE KEYS */;
INSERT INTO `banks` (`id`, `code`, `name`, `filial`, `address`, `inn`, `raschetniy_schet`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
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
DELETE FROM `beneficiaries`;
/*!40000 ALTER TABLE `beneficiaries` DISABLE KEYS */;
/*!40000 ALTER TABLE `beneficiaries` ENABLE KEYS */;

-- Dumping structure for table ddgi.branches
CREATE TABLE IF NOT EXISTS `branches` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) unsigned DEFAULT '0',
  `name` varchar(150) NOT NULL,
  `is_center` tinyint(3) unsigned DEFAULT '0',
  `series` varchar(150) NOT NULL,
  `founded_date` date NOT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `region_id` int(11) unsigned NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi.branches: ~3 rows (approximately)
DELETE FROM `branches`;
/*!40000 ALTER TABLE `branches` DISABLE KEYS */;
INSERT INTO `branches` (`id`, `parent_id`, `name`, `is_center`, `series`, `founded_date`, `user_id`, `region_id`, `address`, `phone_number`, `type`, `code_by_office`, `code_by_type`, `hierarchy`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, NULL, 'Головной офис', 0, 'серия', '2021-02-15', 9, 1, 'Ташкент', '23452352345', 'Тип 2', 'code', 'code 2', '1', '2021-02-15', '2021-02-15', NULL),
	(2, NULL, 'name', 0, 'series', '2021-01-08', 9, 1, 'dfvsdv', '45235325', 'Тип 1', 'sdfvdv', 'sdfvdsv', '33', '2021-01-08', '2021-01-10', NULL),
	(3, 3, 'FotTestOnly', 0, 'vfdv', '2021-02-18', 17, 1, 'PO Box F', '5555551234', 'type-1', 'sdfvdv', 'sdfvdsv', '33', '2021-02-18', '2021-02-18', NULL),
	(4, 4, 'rgwergewrg', 0, 'xcv', '2021-02-19', 20, 1, 'PO Box F', '5555551234', 'type-1', 'sdfvdve', 'rr', '44', '2021-02-18', '2021-02-18', NULL);
/*!40000 ALTER TABLE `branches` ENABLE KEYS */;

-- Dumping structure for table ddgi.clients
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0 - физ лицо, 1 - юр лицо',
  `name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `mfo` varchar(100) DEFAULT NULL,
  `inn` varchar(100) DEFAULT NULL,
  `bank_id` int(11) unsigned DEFAULT NULL,
  `raschetniy_schet` varchar(100) NOT NULL,
  `passport_series` varchar(100) DEFAULT NULL,
  `passport_number` varchar(100) DEFAULT NULL,
  `passport_given_date` date DEFAULT NULL,
  `passport_given_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi.clients: ~3 rows (approximately)
DELETE FROM `clients`;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` (`id`, `type`, `name`, `middle_name`, `surname`, `address`, `phone_number`, `mfo`, `inn`, `bank_id`, `raschetniy_schet`, `passport_series`, `passport_number`, `passport_given_date`, `passport_given_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 0, 'name', 'middle', 'surname', 'fsvdvf', 'sdfvfdv', 'sdfvsdfv', 'sdfvsdvf', 2, 'sdvfdfsv', 'sdfvdsvf', 'sdfvsdvf', '2021-01-21', 'sdfvsdv', '2021-01-21 02:24:07', '2021-01-21 02:24:07', NULL),
	(2, 1, 'sdfvdsfdsfv', NULL, NULL, 'sdvfdsfv', '454353', NULL, NULL, 4, 'sdfvdsvf', NULL, NULL, NULL, NULL, '2021-01-21 02:33:49', '2021-01-21 02:33:49', NULL),
	(3, 1, 'sfdvsdfv', NULL, NULL, 'vsdfvdsfv', '23553', NULL, NULL, 4, 'dsfvdsfvdsf', NULL, NULL, NULL, NULL, '2021-01-21 02:35:53', '2021-01-21 05:10:26', '2021-01-21 05:10:26');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;

-- Dumping structure for table ddgi.currencies
CREATE TABLE IF NOT EXISTS `currencies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `rate` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi.currencies: ~2 rows (approximately)
DELETE FROM `currencies`;
/*!40000 ALTER TABLE `currencies` DISABLE KEYS */;
INSERT INTO `currencies` (`id`, `name`, `code`, `rate`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Euro', 'EUR', '12000', '2021-01-21 08:42:56', '2021-01-21 08:42:56', NULL),
	(2, 'US Dollar', 'USD', '10000', '2021-01-21 09:12:41', '2021-01-21 09:12:41', NULL);
/*!40000 ALTER TABLE `currencies` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table ddgi.directors: ~3 rows (approximately)
DELETE FROM `directors`;
/*!40000 ALTER TABLE `directors` DISABLE KEYS */;
INSERT INTO `directors` (`id`, `user_id`, `surname`, `name`, `middle_name`, `dob`, `passport_number`, `passport_series`, `work_start_date`, `work_end_date`, `phone_number`, `address`, `profile_img`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(2, 9, 'FotTestOnly3', 'sdfv', 'sdfv', '2021-01-07', '12341234', 'adscsadc', '2021-01-14', NULL, '5555551234', 'PO Box F', NULL, 1, '2021-01-08', '2021-01-10', NULL),
	(4, 17, 'Another', 'Name', 'Surname', '2021-02-11', 'sdfvsdv', 'AA', '2021-02-17', NULL, '5555551234', 'PO Box F', NULL, 1, '2021-02-18', '2021-02-18', NULL),
	(5, 20, 'Another 2', 'Name 2', 'Surname', '2021-02-11', 'sdfvsdv', 'AA', '2021-02-17', NULL, '5555551234', 'PO Box F', NULL, 1, '2021-02-18', '2021-02-18', NULL);
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
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table ddgi.franchise_type
CREATE TABLE IF NOT EXISTS `franchise_type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table ddgi.franchise_type: ~3 rows (approximately)
DELETE FROM `franchise_type`;
/*!40000 ALTER TABLE `franchise_type` DISABLE KEYS */;
INSERT INTO `franchise_type` (`id`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'нет', NULL, NULL, NULL),
	(2, 'условная', NULL, NULL, NULL),
	(3, 'безусловная', NULL, NULL, NULL);
/*!40000 ALTER TABLE `franchise_type` ENABLE KEYS */;

-- Dumping structure for table ddgi.from_site_orders
CREATE TABLE IF NOT EXISTS `from_site_orders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) unsigned NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `object_title` varchar(200) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `prize` varchar(100) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT NULL,
  `term` timestamp NULL DEFAULT NULL,
  `inventory_number` varchar(100) DEFAULT NULL,
  `total_area` varchar(100) DEFAULT NULL,
  `city_property` varchar(100) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `type_property` varchar(100) DEFAULT NULL,
  `matches_registration_address` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `birth_day` date DEFAULT NULL,
  `serial_number` varchar(100) DEFAULT NULL,
  `passport_number` varchar(100) DEFAULT NULL,
  `date_issue` date DEFAULT NULL,
  `issued_by` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email_index` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `user_street` varchar(100) DEFAULT NULL,
  `apartment_number` varchar(100) DEFAULT NULL,
  `home_number` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi.from_site_orders: ~4 rows (approximately)
DELETE FROM `from_site_orders`;
/*!40000 ALTER TABLE `from_site_orders` DISABLE KEYS */;
INSERT INTO `from_site_orders` (`id`, `order_id`, `title`, `object_title`, `status`, `amount`, `prize`, `timestamp`, `term`, `inventory_number`, `total_area`, `city_property`, `street`, `type_property`, `matches_registration_address`, `username`, `first_name`, `last_name`, `middle_name`, `is_active`, `avatar`, `birth_day`, `serial_number`, `passport_number`, `date_issue`, `issued_by`, `phone`, `email_index`, `city`, `district`, `user_street`, `apartment_number`, `home_number`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Страхование инфекционных заболеваний', 'Человек', 'Успешно проведен', '0', '10000', '2021-02-03 12:49:32', '2021-08-31 17:22:34', '', '', '', '', '', '0', 'adminddgi', 'Sardor', 'Maxmudov', 'Maxmudovich', 1, 'http://ddgi.uz/media/profile/2021/02/08/mac.jpg', '2020-09-08', 'AA', '4799722', '2000-02-22', 'IIB Yunusobod Tumani', '998977008055', '10000800', 'Ташкент', 'Юнусабад', '18', '17', '9', '2021-02-08 15:51:34', '2021-02-12 12:18:37'),
	(2, 2, 'Страхование инфекционных заболеваний', 'Человек', 'Расторгнут', '8340000', '41700', '2021-02-08 10:25:34', '2021-08-08 10:25:34', '', '', '', '', '', '1', 'adminddgi', 'Sardor', 'Maxmudov', 'Maxmudovich', 1, 'http://ddgi.uz/media/profile/2021/02/08/mac.jpg', '2020-09-08', 'AA', '4799722', '2000-02-22', 'IIB Yunusobod Tumani', '998977008055', '10000800', 'Ташкент', 'Юнусабад', '18', '17', '9', '2021-02-08 15:51:34', '2021-02-12 12:18:37'),
	(3, 3, 'Страхование имущество', 'Квартира', 'Забракован', '32650000000', '3874750.0', '2021-02-08 10:43:47', '2021-08-08 10:43:47', '44766554114777', '120', 'Ташкент', '18', '2', '0', 'adminddgi', 'Sardor', 'Maxmudov', 'Maxmudovich', 1, 'http://ddgi.uz/media/profile/2021/02/08/mac.jpg', '2020-09-08', 'AA', '4799722', '2000-02-22', 'IIB Yunusobod Tumani', '998977008055', '10000800', 'Ташкент', 'Юнусабад', '18', '17', '9', '2021-02-08 15:52:08', '2021-02-12 12:18:37');
/*!40000 ALTER TABLE `from_site_orders` ENABLE KEYS */;

-- Dumping structure for table ddgi.groups
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi.groups: ~2 rows (approximately)
DELETE FROM `groups`;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'group 1', '2021-02-12 04:04:42', '2021-02-12 02:16:45', NULL),
	(2, 'group 2', '2021-02-12 02:19:32', '2021-02-12 02:19:45', NULL);
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;

-- Dumping structure for table ddgi.kasko
CREATE TABLE IF NOT EXISTS `kasko` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(3) unsigned NOT NULL COMMENT '0 - физ лицо; 1 - юр лицо',
  `product_id` int(11) unsigned DEFAULT '0',
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `reason` varchar(250) DEFAULT NULL COMMENT 'Использование транспортного средства на основании:',
  `unique_number` varchar(150) DEFAULT NULL,
  `geo_zone` varchar(250) DEFAULT NULL COMMENT 'Географическая зона',
  `defect_img` varchar(250) DEFAULT NULL,
  `purpose` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi.kasko: ~3 rows (approximately)
DELETE FROM `kasko`;
/*!40000 ALTER TABLE `kasko` DISABLE KEYS */;
INSERT INTO `kasko` (`id`, `type`, `product_id`, `from_date`, `to_date`, `reason`, `unique_number`, `geo_zone`, `defect_img`, `purpose`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(19, 1, 1, '2021-01-06', '2021-01-13', 'fvsdfv', NULL, 'sdfvdsvf', NULL, 'fvdfsgsdfgfgdfgdfg', '2021-01-11 00:00:00', '2021-01-11 00:00:00', NULL),
	(20, 1, 1, '2021-01-06', '2021-01-13', 'fvsdfv', NULL, 'sdfvdsvf', NULL, 'fvdfsgsdfgfgdfgdfg', '2021-01-11 00:00:00', '2021-02-01 00:00:00', '2021-02-01 00:00:00'),
	(21, 0, 1, '2021-02-16', '2021-02-18', 'dfgbdfbg', '0202/0103/1/2100002', 'dfgbdfgb', NULL, 'gbfdbdfbgfd', '2021-02-15 00:00:00', '2021-02-15 00:00:00', NULL);
/*!40000 ALTER TABLE `kasko` ENABLE KEYS */;

-- Dumping structure for table ddgi.kasko_policy_beneficiaries
CREATE TABLE IF NOT EXISTS `kasko_policy_beneficiaries` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `policy_beneficiary_id` int(11) unsigned NOT NULL,
  `kasko_id` int(11) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table ddgi.kasko_policy_beneficiaries: ~5 rows (approximately)
DELETE FROM `kasko_policy_beneficiaries`;
/*!40000 ALTER TABLE `kasko_policy_beneficiaries` DISABLE KEYS */;
INSERT INTO `kasko_policy_beneficiaries` (`id`, `policy_beneficiary_id`, `kasko_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 4, 13, NULL, NULL, NULL),
	(2, 6, 14, NULL, NULL, NULL),
	(3, 2, 15, NULL, NULL, NULL),
	(4, 7, 20, NULL, NULL, NULL),
	(5, 8, 21, NULL, NULL, NULL);
/*!40000 ALTER TABLE `kasko_policy_beneficiaries` ENABLE KEYS */;

-- Dumping structure for table ddgi.kasko_policy_holders
CREATE TABLE IF NOT EXISTS `kasko_policy_holders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `policy_holders_id` int(11) unsigned NOT NULL,
  `kasko_id` int(11) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi.kasko_policy_holders: ~6 rows (approximately)
DELETE FROM `kasko_policy_holders`;
/*!40000 ALTER TABLE `kasko_policy_holders` DISABLE KEYS */;
INSERT INTO `kasko_policy_holders` (`id`, `policy_holders_id`, `kasko_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(2, 2, 12, NULL, NULL, NULL),
	(3, 4, 13, NULL, NULL, NULL),
	(4, 6, 14, NULL, NULL, NULL),
	(5, 7, 15, NULL, NULL, NULL),
	(6, 12, 20, NULL, NULL, NULL),
	(7, 13, 21, NULL, NULL, NULL);
/*!40000 ALTER TABLE `kasko_policy_holders` ENABLE KEYS */;

-- Dumping structure for table ddgi.kasko_policy_informations
CREATE TABLE IF NOT EXISTS `kasko_policy_informations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `policy_id` int(11) unsigned NOT NULL,
  `kasko_id` int(11) unsigned NOT NULL,
  `policy_series_id` int(11) unsigned NOT NULL,
  `period` varchar(50) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `line_id` varchar(50) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `modification` varchar(100) NOT NULL,
  `gov_number` varchar(100) NOT NULL,
  `tech_passport` varchar(100) NOT NULL,
  `engine_number` varchar(100) NOT NULL,
  `carcase_number` varchar(100) NOT NULL,
  `payload` varchar(100) NOT NULL,
  `seats_number` varchar(25) NOT NULL,
  `polnaya_strahovaya_stoimost` varchar(100) NOT NULL,
  `polnaya_strahovaya_summa` varchar(100) NOT NULL,
  `polnaya_strahovaya_premiya` varchar(100) DEFAULT NULL,
  `additional_brand` varchar(100) DEFAULT NULL,
  `additional_equipment` varchar(100) DEFAULT NULL,
  `additional_serial_number` varchar(100) DEFAULT NULL,
  `additional_strahovaya_summa` varchar(100) DEFAULT NULL,
  `additional_terr_vehical` varchar(100) DEFAULT NULL,
  `additional_terr_insured` varchar(100) DEFAULT NULL,
  `additional_terr_evacuation` varchar(100) DEFAULT NULL,
  `additional_is_vihecal_insured` tinyint(3) unsigned DEFAULT NULL,
  `additional_other_insurence_info` varchar(150) DEFAULT NULL,
  `additional_is_death` tinyint(3) unsigned DEFAULT NULL,
  `additional_death_strahovaya_summa` varchar(50) DEFAULT NULL,
  `additiona_death_strahovaya_premiya` varchar(50) DEFAULT NULL,
  `additional_death_franchise` varchar(50) DEFAULT NULL,
  `additional_is_civil` tinyint(3) unsigned DEFAULT NULL,
  `additional_civil_strahovaya_summa` varchar(50) DEFAULT NULL,
  `additional_civil_strahovaya_premiya` varchar(50) DEFAULT NULL,
  `additional_is_accident` tinyint(3) unsigned DEFAULT NULL,
  `additional_accident_driver_strahovaya_summa` varchar(50) DEFAULT NULL,
  `additional_accident_driver_strahovaya_premiya` varchar(50) DEFAULT NULL,
  `additional_accident_pessanger_number` varchar(50) DEFAULT NULL,
  `additional_accident_pessanger_strahovaya_summa_per` varchar(50) DEFAULT NULL,
  `additional_accident_pessanger_strahovaya_summa` varchar(50) DEFAULT NULL,
  `additional_accident_pessanger_strahovaya_premiya` varchar(50) DEFAULT NULL,
  `additional_accident_limit_number` varchar(50) DEFAULT NULL,
  `additional_accident_limit_strahovaya_summa_per` varchar(50) DEFAULT NULL,
  `additional_accident_limit_strahovaya_summa` varchar(50) DEFAULT NULL,
  `additional_accident_limit_strahovaya_premiya` varchar(50) DEFAULT NULL,
  `additional_limit` varchar(50) DEFAULT NULL,
  `additional_policy_from_date` date DEFAULT NULL,
  `additional_strahovaya_premiya_currency` varchar(50) DEFAULT NULL,
  `additional_poryadok_oplati_currency` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi.kasko_policy_informations: ~2 rows (approximately)
DELETE FROM `kasko_policy_informations`;
/*!40000 ALTER TABLE `kasko_policy_informations` DISABLE KEYS */;
INSERT INTO `kasko_policy_informations` (`id`, `policy_id`, `kasko_id`, `policy_series_id`, `period`, `user_id`, `line_id`, `brand`, `model`, `modification`, `gov_number`, `tech_passport`, `engine_number`, `carcase_number`, `payload`, `seats_number`, `polnaya_strahovaya_stoimost`, `polnaya_strahovaya_summa`, `polnaya_strahovaya_premiya`, `additional_brand`, `additional_equipment`, `additional_serial_number`, `additional_strahovaya_summa`, `additional_terr_vehical`, `additional_terr_insured`, `additional_terr_evacuation`, `additional_is_vihecal_insured`, `additional_other_insurence_info`, `additional_is_death`, `additional_death_strahovaya_summa`, `additiona_death_strahovaya_premiya`, `additional_death_franchise`, `additional_is_civil`, `additional_civil_strahovaya_summa`, `additional_civil_strahovaya_premiya`, `additional_is_accident`, `additional_accident_driver_strahovaya_summa`, `additional_accident_driver_strahovaya_premiya`, `additional_accident_pessanger_number`, `additional_accident_pessanger_strahovaya_summa_per`, `additional_accident_pessanger_strahovaya_summa`, `additional_accident_pessanger_strahovaya_premiya`, `additional_accident_limit_number`, `additional_accident_limit_strahovaya_summa_per`, `additional_accident_limit_strahovaya_summa`, `additional_accident_limit_strahovaya_premiya`, `additional_limit`, `additional_policy_from_date`, `additional_strahovaya_premiya_currency`, `additional_poryadok_oplati_currency`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 1, 1, 'regreb', 1, 'ertgretg', 'ertgre', 'grtg', 'ertgrt', 'rt', 'tgtertger', 'ertgretg', 'ertgetr', 'ertgertg', '252352345', '2343455', '12572901', NULL, 'vrfvdf', 'dsfvdfv', 'sdfvdsfv', '34523', '23452', '2345', '2345245', 1, 'fvdsvdfvsdfv', 1, '234523', '3245235', '3245235', 1, '2345235', '234525', 1, '2345235', '345', '2345', '1', '2345', '234', '1234', '1234', '1522756', '213', '1314124124', NULL, 'Сум', 'Сум', '2021-01-11 00:00:00', '2021-01-11 00:00:00', NULL),
	(2, 7, 21, 1, 'regreb', 4, 'ertgretg', '46', '47', 'tyh', 'rthy', 'rthy', 'rthy', 'rthy', 'ertgertg', '4', '7', '6', NULL, 'vrfvdf', 'dsfvdfv', 'sdfvdsfv', '34523', '23452', '2345', '2345245', 0, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1314124124', NULL, 'Сум', 'Сум', '2021-02-15 00:00:00', '2021-02-15 00:00:00', NULL);
/*!40000 ALTER TABLE `kasko_policy_informations` ENABLE KEYS */;

-- Dumping structure for table ddgi.klass
CREATE TABLE IF NOT EXISTS `klass` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(11) unsigned NOT NULL,
  `code` varchar(200) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi.klass: ~1 rows (approximately)
DELETE FROM `klass`;
/*!40000 ALTER TABLE `klass` DISABLE KEYS */;
INSERT INTO `klass` (`id`, `group_id`, `code`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, '01', 'Страхование наземных транспортных средств', 'Class 1 has been created just for test', '2021-01-21 09:56:18', '2021-01-21 09:56:18', NULL);
/*!40000 ALTER TABLE `klass` ENABLE KEYS */;

-- Dumping structure for table ddgi.managers
CREATE TABLE IF NOT EXISTS `managers` (
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
  `manager_agreement_img` varchar(250) DEFAULT '',
  `labor_contract` varchar(250) DEFAULT '',
  `firm_contract` varchar(250) DEFAULT '',
  `license` varchar(250) DEFAULT '',
  `status` tinyint(3) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table ddgi.managers: ~0 rows (approximately)
DELETE FROM `managers`;
/*!40000 ALTER TABLE `managers` DISABLE KEYS */;
/*!40000 ALTER TABLE `managers` ENABLE KEYS */;

-- Dumping structure for table ddgi.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi.migrations: ~9 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2019_08_19_000000_create_failed_jobs_table', 1),
	(3, '2021_01_27_043302_create_permission_tables', 2),
	(4, '2014_10_12_100000_create_password_resets_table', 3),
	(5, '2016_06_01_000001_create_oauth_auth_codes_table', 3),
	(6, '2016_06_01_000002_create_oauth_access_tokens_table', 3),
	(7, '2016_06_01_000003_create_oauth_refresh_tokens_table', 3),
	(8, '2016_06_01_000004_create_oauth_clients_table', 3),
	(9, '2016_06_01_000005_create_oauth_personal_access_clients_table', 3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table ddgi.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi.model_has_permissions: ~1 rows (approximately)
DELETE FROM `model_has_permissions`;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\User', 3);
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;

-- Dumping structure for table ddgi.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi.model_has_roles: ~0 rows (approximately)
DELETE FROM `model_has_roles`;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;

-- Dumping structure for table ddgi.oauth_access_tokens
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi.oauth_access_tokens: ~0 rows (approximately)
DELETE FROM `oauth_access_tokens`;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
	('029d24cfbd7a254cb9e930bc7e7c779c061bf351b61ee93ad95ab665ac21e75272396c80d69eefd6', 3, 1, 'MyApp', '[]', 1, '2021-02-24 02:10:39', '2021-02-24 02:10:39', '2022-02-24 02:10:39'),
	('8dd1ecbeee3f449c9e9e13827a73ae8ed733a18ebfded0bccf76cd13dcb6667b41438138c5edef7b', 3, 1, 'MyApp', '[]', 0, '2021-02-24 02:43:10', '2021-02-24 02:43:10', '2022-02-24 02:43:10'),
	('e272069d3e74f4eb6cb253c8171f4b1ec835b742f3804a4db51e16e430ffff6d2a8267cb9e8fb980', 3, 1, 'MyApp', '[]', 0, '2021-02-24 02:35:53', '2021-02-24 02:35:53', '2022-02-24 02:35:53');
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;

-- Dumping structure for table ddgi.oauth_auth_codes
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi.oauth_auth_codes: ~0 rows (approximately)
DELETE FROM `oauth_auth_codes`;
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;

-- Dumping structure for table ddgi.oauth_clients
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi.oauth_clients: ~2 rows (approximately)
DELETE FROM `oauth_clients`;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
	(1, NULL, 'Laravel Personal Access Client', 'A1kLwsS888H9z1xr3WJnCEzn8lGbs3Tc6c3EZFXu', NULL, 'http://localhost', 1, 0, 0, '2021-02-24 02:07:59', '2021-02-24 02:07:59'),
	(2, NULL, 'Laravel Password Grant Client', '6G3UGpjGLSmvosoMQw4p46TM75t7rAmktKhIZTGe', 'users', 'http://localhost', 0, 1, 0, '2021-02-24 02:07:59', '2021-02-24 02:07:59');
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;

-- Dumping structure for table ddgi.oauth_personal_access_clients
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi.oauth_personal_access_clients: ~1 rows (approximately)
DELETE FROM `oauth_personal_access_clients`;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
	(1, 1, '2021-02-24 02:07:59', '2021-02-24 02:07:59');
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;

-- Dumping structure for table ddgi.oauth_refresh_tokens
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi.oauth_refresh_tokens: ~0 rows (approximately)
DELETE FROM `oauth_refresh_tokens`;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;

-- Dumping structure for table ddgi.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table ddgi.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi.permissions: ~0 rows (approximately)
DELETE FROM `permissions`;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'show pretensii', 'web', NULL, NULL);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping structure for table ddgi.policies
CREATE TABLE IF NOT EXISTS `policies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `number` int(11) unsigned NOT NULL,
  `act_number` varchar(50) NOT NULL,
  `client_type` tinyint(3) unsigned NOT NULL,
  `policy_series_id` int(11) unsigned DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `branch_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi.policies: ~20 rows (approximately)
DELETE FROM `policies`;
/*!40000 ALTER TABLE `policies` DISABLE KEYS */;
INSERT INTO `policies` (`id`, `number`, `act_number`, `client_type`, `policy_series_id`, `status`, `branch_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 141, 'asdvvd', 0, 1, 'retransferred', 2, 9, '2021-01-09 00:00:00', '2021-02-23 06:03:52', NULL),
	(2, 142, 'asdvvd', 0, 1, 'retransferred', 2, 9, '2021-01-09 00:00:00', '2021-02-23 06:03:52', NULL),
	(3, 143, 'asdvvd', 0, 1, 'transferred', 2, 9, '2021-01-09 00:00:00', '2021-01-11 00:00:00', NULL),
	(4, 144, 'asdvvd', 0, 1, 'transferred', 2, 9, '2021-01-09 00:00:00', '2021-01-11 00:00:00', NULL),
	(5, 145, 'asdvvd', 0, 1, 'transferred', 2, 9, '2021-01-09 00:00:00', '2021-01-11 00:00:00', NULL),
	(6, 146, 'asdvvd', 0, 1, 'transferred', 2, 9, '2021-01-09 00:00:00', '2021-01-11 00:00:00', NULL),
	(7, 147, 'asdvvd', 0, 1, 'new', 0, 0, '2021-01-09 00:00:00', '2021-01-09 00:00:00', NULL),
	(8, 148, 'asdvvd', 0, 1, 'new', 0, 0, '2021-01-09 00:00:00', '2021-01-09 00:00:00', NULL),
	(9, 149, 'asdvvd', 0, 1, 'new', 0, 0, '2021-01-09 00:00:00', '2021-01-09 00:00:00', NULL),
	(10, 150, 'asdvvd', 0, 1, 'new', 0, 0, '2021-01-09 00:00:00', '2021-01-09 00:00:00', NULL),
	(11, 141, 'asdvvd', 0, 0, 'new', 0, 0, '2021-01-09 00:00:00', '2021-01-09 00:00:00', NULL),
	(12, 142, 'asdvvd', 0, 0, 'new', 0, 0, '2021-01-09 00:00:00', '2021-01-09 00:00:00', NULL),
	(13, 143, 'asdvvd', 0, 0, 'new', 0, 0, '2021-01-09 00:00:00', '2021-01-09 00:00:00', NULL),
	(14, 144, 'asdvvd', 0, 0, 'new', 0, 0, '2021-01-09 00:00:00', '2021-01-09 00:00:00', NULL),
	(15, 145, 'asdvvd', 0, 0, 'new', 0, 0, '2021-01-09 00:00:00', '2021-01-09 00:00:00', NULL),
	(16, 146, 'asdvvd', 0, 0, 'new', 0, 0, '2021-01-09 00:00:00', '2021-01-09 00:00:00', NULL),
	(17, 147, 'asdvvd', 0, 0, 'new', 0, 0, '2021-01-09 00:00:00', '2021-01-09 00:00:00', NULL),
	(18, 148, 'asdvvd', 0, 0, 'new', 0, 0, '2021-01-09 00:00:00', '2021-01-09 00:00:00', NULL),
	(19, 149, 'asdvvd', 0, 0, 'new', 0, 0, '2021-01-09 00:00:00', '2021-01-09 00:00:00', NULL),
	(20, 150, 'asdvvd', 0, 0, 'new', 0, 0, '2021-01-09 00:00:00', '2021-01-09 00:00:00', NULL);
/*!40000 ALTER TABLE `policies` ENABLE KEYS */;

-- Dumping structure for table ddgi.policies_policy_retransfer
CREATE TABLE IF NOT EXISTS `policies_policy_retransfer` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `policy_retransfer_id` int(11) unsigned NOT NULL,
  `policy_id` int(11) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table ddgi.policies_policy_retransfer: ~2 rows (approximately)
DELETE FROM `policies_policy_retransfer`;
/*!40000 ALTER TABLE `policies_policy_retransfer` DISABLE KEYS */;
INSERT INTO `policies_policy_retransfer` (`id`, `policy_retransfer_id`, `policy_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(17, 3, 1, NULL, NULL, NULL),
	(18, 3, 2, NULL, NULL, NULL);
/*!40000 ALTER TABLE `policies_policy_retransfer` ENABLE KEYS */;

-- Dumping structure for table ddgi.policies_policy_transfer
CREATE TABLE IF NOT EXISTS `policies_policy_transfer` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `policy_transfer_id` int(11) unsigned NOT NULL,
  `policy_id` int(11) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table ddgi.policies_policy_transfer: ~6 rows (approximately)
DELETE FROM `policies_policy_transfer`;
/*!40000 ALTER TABLE `policies_policy_transfer` DISABLE KEYS */;
INSERT INTO `policies_policy_transfer` (`id`, `policy_transfer_id`, `policy_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(11, 2, 1, NULL, NULL, NULL),
	(12, 2, 2, NULL, NULL, NULL),
	(13, 2, 3, NULL, NULL, NULL),
	(14, 2, 4, NULL, NULL, NULL),
	(15, 2, 5, NULL, NULL, NULL),
	(16, 2, 6, NULL, NULL, NULL);
/*!40000 ALTER TABLE `policies_policy_transfer` ENABLE KEYS */;

-- Dumping structure for table ddgi.policy_beneficiaries
CREATE TABLE IF NOT EXISTS `policy_beneficiaries` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `FIO` varchar(250) NOT NULL,
  `address` varchar(150) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `checking_account` varchar(50) NOT NULL,
  `inn` varchar(50) NOT NULL,
  `mfo` varchar(50) NOT NULL,
  `okonx` varchar(50) NOT NULL,
  `bank_id` int(11) unsigned NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='страхователи';

-- Dumping data for table ddgi.policy_beneficiaries: ~8 rows (approximately)
DELETE FROM `policy_beneficiaries`;
/*!40000 ALTER TABLE `policy_beneficiaries` DISABLE KEYS */;
INSERT INTO `policy_beneficiaries` (`id`, `FIO`, `address`, `phone_number`, `checking_account`, `inn`, `mfo`, `okonx`, `bank_id`, `updated_at`, `created_at`, `deleted_at`) VALUES
	(1, 'gbebfgb', 'dfgbfdb', 'fdgbdfgb', 'gbdfgbdf', 'gbdfgb', 'dfgbdf', 'gbdfbg', 1, '2021-01-11 00:00:00', '2021-01-11 00:00:00', NULL),
	(2, 'gbebfgb', 'dfgbfdb', 'fdgbdfgb', 'gbdfgbdf', 'gbdfgb', 'dfgbdf', 'gbdfbg', 1, '2021-01-11 00:00:00', '2021-01-11 00:00:00', NULL),
	(3, 'ФИО выгодоприобретателя', 'Юр адрес выгодоприобретателя', 'Телефон', 'Расчетный счет', 'ИНН', 'МФО', 'ОКОНХ', 1, '2021-01-11 00:00:00', '2021-01-11 00:00:00', NULL),
	(4, 'ФИО выгодоприобретателя', 'Юр адрес выгодоприобретателя', 'Телефон', 'Расчетный счет', 'ИНН', 'МФО', 'ОКОНХ', 1, '2021-01-11 00:00:00', '2021-01-11 00:00:00', NULL),
	(5, 'ФИО выгодоприобретателя', 'Юр адрес выгодоприобретателя', 'Телефон', 'Расчетный счет', 'ИНН', 'МФО', 'ОКОНХ', 1, '2021-01-11 00:00:00', '2021-01-11 00:00:00', NULL),
	(6, 'ФИО выгодоприобретателя', 'Юр адрес выгодоприобретателя', 'Телефон', 'Расчетный счет', 'ИНН', 'МФО', 'ОКОНХ', 1, '2021-01-11 00:00:00', '2021-01-11 00:00:00', NULL),
	(7, 'ФИО выгодоприобретателя', 'Юр адрес выгодоприобретателя', 'Телефон', 'Расчетный счет', 'ИНН', 'МФО', 'ОКОНХ', 1, '2021-01-11 00:00:00', '2021-01-11 00:00:00', NULL),
	(8, 'ФИО выгодоприобретателя', 'PO Box F', '5555551234', 'Расчетный счет', 'ИНН', 'МФО', 'ОКОНХ', 1, '2021-02-15 00:00:00', '2021-02-15 00:00:00', NULL);
/*!40000 ALTER TABLE `policy_beneficiaries` ENABLE KEYS */;

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='страхователи';

-- Dumping data for table ddgi.policy_holders: ~13 rows (approximately)
DELETE FROM `policy_holders`;
/*!40000 ALTER TABLE `policy_holders` DISABLE KEYS */;
INSERT INTO `policy_holders` (`id`, `FIO`, `address`, `phone_number`, `checking_account`, `inn`, `mfo`, `okonx`, `bank_id`, `updated_at`, `created_at`, `deleted_at`) VALUES
	(1, 'dfgbdf', 'gbdfgbdf', 'gbdfgbf', 'dgbgdfb', 'dfgbdfbfdgb', 'dfgbdf', 'dfgb', 1, '2021-01-10 00:00:00', '2021-01-10 00:00:00', NULL),
	(2, 'dfgbdf', 'gbdfgbdf', 'gbdfgbf', 'dgbgdfb', 'dfgbdfbfdgb', 'dfgbdf', 'dfgb', 1, '2021-01-10 00:00:00', '2021-01-10 00:00:00', NULL),
	(3, 'gbebfgb', 'dfgbfdb', 'fdgbdfgb', 'gbdfgbdf', 'gbdfgb', 'dfgbdf', 'gbdfbg', 1, '2021-01-10 00:00:00', '2021-01-10 00:00:00', NULL),
	(4, 'dfgbdf', 'gbdfgbdf', 'gbdfgbf', 'dgbgdfb', 'dfgbdfbfdgb', 'dfgbdf', 'dfgb', 1, '2021-01-10 00:00:00', '2021-01-10 00:00:00', NULL),
	(5, 'gbebfgb', 'dfgbfdb', 'fdgbdfgb', 'gbdfgbdf', 'gbdfgb', 'dfgbdf', 'gbdfbg', 1, '2021-01-10 00:00:00', '2021-01-10 00:00:00', NULL),
	(6, 'dfgbdf', 'gbdfgbdf', 'gbdfgbf', 'dgbgdfb', 'dfgbdfbfdgb', 'dfgbdf', 'dfgb', 1, '2021-01-11 00:00:00', '2021-01-11 00:00:00', NULL),
	(7, 'dfgbdf', 'gbdfgbdf', 'gbdfgbf', 'dgbgdfb', 'dfgbdfbfdgb', 'dfgbdf', 'dfgb', 1, '2021-01-11 00:00:00', '2021-01-11 00:00:00', NULL),
	(8, 'ФИО страхователя', 'Юр адрес страхователя', 'Телефон', 'Расчетный счет', 'ИНН', 'МФО', 'ОКОНХ', 1, '2021-01-11 00:00:00', '2021-01-11 00:00:00', NULL),
	(9, 'ФИО страхователя', 'Юр адрес страхователя', 'Телефон', 'Расчетный счет', 'ИНН', 'МФО', 'ОКОНХ', 1, '2021-01-11 00:00:00', '2021-01-11 00:00:00', NULL),
	(10, 'ФИО страхователя', 'Юр адрес страхователя', 'Телефон', 'Расчетный счет', 'ИНН', 'МФО', 'ОКОНХ', 1, '2021-01-11 00:00:00', '2021-01-11 00:00:00', NULL),
	(11, 'ФИО страхователя', 'Юр адрес страхователя', 'Телефон', 'Расчетный счет', 'ИНН', 'МФО', 'ОКОНХ', 1, '2021-01-11 00:00:00', '2021-01-11 00:00:00', NULL),
	(12, 'ФИО страхователя', 'Юр адрес страхователя', 'Телефон', 'Расчетный счет', 'ИНН', 'МФО', 'ОКОНХ', 1, '2021-01-11 00:00:00', '2021-01-11 00:00:00', NULL),
	(13, 'ФИО страхователя', 'PO Box F', '5555551234', 'Расчетный счет', 'ИНН', 'МФО', 'ОКОНХ', 1, '2021-02-15 00:00:00', '2021-02-15 00:00:00', NULL);
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

-- Dumping data for table ddgi.policy_registrations: ~2 rows (approximately)
DELETE FROM `policy_registrations`;
/*!40000 ALTER TABLE `policy_registrations` DISABLE KEYS */;
INSERT INTO `policy_registrations` (`id`, `act_number`, `act_date`, `from_number`, `to_number`, `policy_series_id`, `document`, `client_type`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'asdvvd', '2021-01-09', '101', '140', 1, 'C:\\Users\\User\\AppData\\Local\\Temp\\php1FD7.tmp', 0, '2021-01-09', '2021-01-09', NULL),
	(2, 'asdvvd', '2021-01-09', '141', '150', 1, 'C:\\Users\\User\\AppData\\Local\\Temp\\php251F.tmp', 0, '2021-01-09', '2021-01-09', NULL),
	(3, 'asdvvd', '2021-01-09', '141', '150', 0, 'C:\\Users\\User\\AppData\\Local\\Temp\\php2D49.tmp', 0, '2021-01-09', '2021-01-09', NULL);
/*!40000 ALTER TABLE `policy_registrations` ENABLE KEYS */;

-- Dumping structure for table ddgi.policy_retransfer
CREATE TABLE IF NOT EXISTS `policy_retransfer` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `act_number` varchar(50) DEFAULT NULL,
  `act_date` date NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `policy_series_id` int(11) DEFAULT NULL,
  `policy_from` varchar(50) DEFAULT NULL,
  `policy_to` varchar(50) DEFAULT NULL,
  `retransfer_distribution` date DEFAULT NULL,
  `act_file` varchar(50) DEFAULT NULL,
  `transfer_given` varchar(150) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table ddgi.policy_retransfer: ~1 rows (approximately)
DELETE FROM `policy_retransfer`;
/*!40000 ALTER TABLE `policy_retransfer` DISABLE KEYS */;
INSERT INTO `policy_retransfer` (`id`, `act_number`, `act_date`, `branch_id`, `user_id`, `policy_series_id`, `policy_from`, `policy_to`, `retransfer_distribution`, `act_file`, `transfer_given`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(3, 'asdvvd', '2021-02-23', 1, 4, 1, '141', '142', '2021-02-23', NULL, 'wefwef', '2021-02-23', '2021-02-23', NULL);
/*!40000 ALTER TABLE `policy_retransfer` ENABLE KEYS */;

-- Dumping structure for table ddgi.policy_series
CREATE TABLE IF NOT EXISTS `policy_series` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi.policy_series: ~0 rows (approximately)
DELETE FROM `policy_series`;
/*!40000 ALTER TABLE `policy_series` DISABLE KEYS */;
INSERT INTO `policy_series` (`id`, `code`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '2342345555AA', '2021-01-08', '2021-01-21', NULL),
	(2, 'AA', '2021-02-08', '2021-02-08', NULL);
/*!40000 ALTER TABLE `policy_series` ENABLE KEYS */;

-- Dumping structure for table ddgi.policy_transfer
CREATE TABLE IF NOT EXISTS `policy_transfer` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `act_number` varchar(50) DEFAULT NULL,
  `act_date` date NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `policy_series_id` int(11) DEFAULT NULL,
  `policy_from` varchar(50) DEFAULT NULL,
  `policy_to` varchar(50) DEFAULT NULL,
  `retransfer_distribution` date DEFAULT NULL,
  `act_file` varchar(50) DEFAULT NULL,
  `transfer_given` varchar(150) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi.policy_transfer: ~1 rows (approximately)
DELETE FROM `policy_transfer`;
/*!40000 ALTER TABLE `policy_transfer` DISABLE KEYS */;
INSERT INTO `policy_transfer` (`id`, `act_number`, `act_date`, `branch_id`, `user_id`, `policy_series_id`, `policy_from`, `policy_to`, `retransfer_distribution`, `act_file`, `transfer_given`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(2, 'asdvvd', '2021-01-11', 2, NULL, 1, '141', '146', '2021-01-11', 'C:\\Users\\User\\AppData\\Local\\Temp\\php40F.tmp', 'sdfvdsfv', '2021-01-11', '2021-01-11', NULL);
/*!40000 ALTER TABLE `policy_transfer` ENABLE KEYS */;

-- Dumping structure for table ddgi.pretensii
CREATE TABLE IF NOT EXISTS `pretensii` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pretensii_status_id` int(11) unsigned DEFAULT NULL,
  `case_number` int(11) unsigned NOT NULL,
  `policy_id` int(11) unsigned DEFAULT NULL,
  `insurer` varchar(50) DEFAULT NULL,
  `branch_id` int(11) unsigned DEFAULT NULL,
  `insurance_contract` varchar(50) DEFAULT NULL,
  `client_type` tinyint(4) DEFAULT NULL,
  `insurence_type` varchar(50) DEFAULT NULL,
  `insurence_period` date DEFAULT NULL,
  `insured_sum` varchar(50) DEFAULT NULL,
  `payable_by_agreement` varchar(50) DEFAULT NULL,
  `actually_paid` varchar(50) DEFAULT NULL,
  `last_payment_date` date DEFAULT NULL,
  `franchise_type_id` varchar(50) DEFAULT NULL,
  `deductible_amount` varchar(50) DEFAULT NULL,
  `franchise_percentage` varchar(50) DEFAULT NULL,
  `reinsurance` varchar(50) DEFAULT NULL,
  `date_applications` date DEFAULT NULL,
  `date_of_the_insured_event` date DEFAULT NULL,
  `event_description` varchar(100) DEFAULT NULL,
  `object_description` varchar(100) DEFAULT NULL,
  `region` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `claimed_loss_sum` varchar(100) DEFAULT NULL,
  `refund_paid_sum` varchar(100) DEFAULT NULL,
  `currency_exchange_rate` varchar(100) DEFAULT NULL,
  `total_amount_in_sums` varchar(100) DEFAULT NULL,
  `date_of_payment_compensation` date DEFAULT NULL,
  `final_settlement_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi.pretensii: ~1 rows (approximately)
DELETE FROM `pretensii`;
/*!40000 ALTER TABLE `pretensii` DISABLE KEYS */;
INSERT INTO `pretensii` (`id`, `pretensii_status_id`, `case_number`, `policy_id`, `insurer`, `branch_id`, `insurance_contract`, `client_type`, `insurence_type`, `insurence_period`, `insured_sum`, `payable_by_agreement`, `actually_paid`, `last_payment_date`, `franchise_type_id`, `deductible_amount`, `franchise_percentage`, `reinsurance`, `date_applications`, `date_of_the_insured_event`, `event_description`, `object_description`, `region`, `district`, `claimed_loss_sum`, `refund_paid_sum`, `currency_exchange_rate`, `total_amount_in_sums`, `date_of_payment_compensation`, `final_settlement_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 2, 1, 7, 'insured', 1, 'insurance-contract', 1, 'kasko', NULL, '5000', '5000', '3000', NULL, '1', '3000', '50', 'vsdvsdvf', NULL, NULL, 'description-of-the-insured-event', 'description-of-the-insurance-object', 'pretensii-region 2', 'pretensii-district 2', '5000', '5000', '5000', '5000', NULL, NULL, '2021-01-29 08:42:22', '2021-02-01 06:26:57', NULL);
/*!40000 ALTER TABLE `pretensii` ENABLE KEYS */;

-- Dumping structure for table ddgi.pretensii_overview
CREATE TABLE IF NOT EXISTS `pretensii_overview` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pretensii_id` int(11) unsigned NOT NULL DEFAULT '0',
  `user_id` int(11) unsigned NOT NULL DEFAULT '0',
  `passed` tinyint(3) unsigned NOT NULL COMMENT '1 - прошел ; 0 - не прошел',
  `comment` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='рассмотр претензии';

-- Dumping data for table ddgi.pretensii_overview: ~2 rows (approximately)
DELETE FROM `pretensii_overview`;
/*!40000 ALTER TABLE `pretensii_overview` DISABLE KEYS */;
INSERT INTO `pretensii_overview` (`id`, `pretensii_id`, `user_id`, `passed`, `comment`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 4, 1, 'comment here', '2021-02-01 04:49:15', '2021-02-01 04:49:15', NULL),
	(2, 1, 3, 0, 'comment here 3', '2021-02-01 05:52:03', '2021-02-01 06:15:44', NULL);
/*!40000 ALTER TABLE `pretensii_overview` ENABLE KEYS */;

-- Dumping structure for table ddgi.pretensii_status
CREATE TABLE IF NOT EXISTS `pretensii_status` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(50) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi.pretensii_status: ~3 rows (approximately)
DELETE FROM `pretensii_status`;
/*!40000 ALTER TABLE `pretensii_status` DISABLE KEYS */;
INSERT INTO `pretensii_status` (`id`, `status`, `code`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'на рассмотрении', 'in progress', NULL, NULL, NULL),
	(2, 'отклонен', 'declined', NULL, NULL, NULL),
	(3, 'принят', 'accepted', NULL, NULL, NULL);
/*!40000 ALTER TABLE `pretensii_status` ENABLE KEYS */;

-- Dumping structure for table ddgi.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `klass_id` int(11) unsigned NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `tarif` varchar(50) DEFAULT NULL,
  `max_acceptable_amount` varchar(50) DEFAULT NULL,
  `min_acceptable_amount` varchar(50) DEFAULT NULL,
  `franshiza` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi.products: ~0 rows (approximately)
DELETE FROM `products`;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `klass_id`, `name`, `code`, `tarif`, `max_acceptable_amount`, `min_acceptable_amount`, `franshiza`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 'Каско', '03', '4534566', '3463456', '34563465', '43', '2021-02-12 02:51:21', '2021-02-12 02:51:21', NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table ddgi.regions
CREATE TABLE IF NOT EXISTS `regions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi.regions: ~6 rows (approximately)
DELETE FROM `regions`;
/*!40000 ALTER TABLE `regions` DISABLE KEYS */;
INSERT INTO `regions` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Ташкент', '2021-02-18 05:32:23', '2021-02-18 05:32:24', NULL),
	(2, 'Ташкентская область', NULL, NULL, NULL),
	(3, 'Республика Каракалпакстан', NULL, NULL, NULL),
	(4, 'Ферганская область', NULL, NULL, NULL),
	(5, 'Андижанская область', NULL, NULL, NULL),
	(6, 'Бухарская область', NULL, NULL, NULL),
	(7, 'Джизакская область', NULL, NULL, NULL);
/*!40000 ALTER TABLE `regions` ENABLE KEYS */;

-- Dumping structure for table ddgi.requests
CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `status` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `act_number` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `limit_reason` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_id` int(11) unsigned DEFAULT NULL,
  `policy_series_id` int(11) unsigned DEFAULT NULL,
  `polis_quantity` int(11) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi.requests: ~0 rows (approximately)
DELETE FROM `requests`;
/*!40000 ALTER TABLE `requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `requests` ENABLE KEYS */;

-- Dumping structure for table ddgi.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi.roles: ~0 rows (approximately)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table ddgi.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi.role_has_permissions: ~0 rows (approximately)
DELETE FROM `role_has_permissions`;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;

-- Dumping structure for table ddgi.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi.users: ~5 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `branch_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(3, 1, 'ahahah', 'admin@admin.com', NULL, '$2y$10$a7pUCw5TuXkwkDZ7Z8TgJubAwqkH60RD8s8gDTU2O8EdRrwRnf1La', NULL, '2021-01-29 06:24:33', '2021-02-18 02:49:00', NULL),
	(4, 1, 'Name1', 'bobur_moscow1@mail.ru', NULL, '$2y$10$3CzSOxHcSQn6HJOm.ahdHORb50aYP.vJN31VSubEMla8QM7UhZV.a', NULL, '2021-01-08 04:47:43', '2021-01-10 15:01:35', NULL),
	(9, 0, 'sdfv', 'directo3r@director.com', NULL, '$2y$10$OYljKvaiPrLd8i9V1Ms4f.PX6SjBouTvqzdbFFGSb9uBbNLHfOCLm', NULL, '2021-01-08 13:10:10', '2021-01-10 16:26:47', NULL),
	(17, 1, 'dfgbdfb', 'directo7r@director.com', NULL, '$2y$10$2BeRT0YCJVZv8pOSArLOl.Nj1XvtPgv/cpdvpsOWGvtlp.TCMRsZ2', NULL, '2021-02-18 03:59:55', '2021-02-18 04:00:03', NULL),
	(20, 1, 'dfgbdfb', 'directo00r@director.com', NULL, '$2y$10$2BeRT0YCJVZv8pOSArLOl.Nj1XvtPgv/cpdvpsOWGvtlp.TCMRsZ2', NULL, '2021-02-18 03:59:55', '2021-02-18 04:00:03', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table ddgi.views
CREATE TABLE IF NOT EXISTS `views` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table ddgi.views: ~0 rows (approximately)
DELETE FROM `views`;
/*!40000 ALTER TABLE `views` DISABLE KEYS */;
/*!40000 ALTER TABLE `views` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
