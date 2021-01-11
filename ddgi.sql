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
DROP TABLE IF EXISTS `agents`;
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
DELETE FROM `agents`;
/*!40000 ALTER TABLE `agents` DISABLE KEYS */;
INSERT INTO `agents` (`id`, `user_id`, `surname`, `name`, `middle_name`, `dob`, `passport_number`, `passport_series`, `job`, `work_start_date`, `work_end_date`, `phone_number`, `address`, `profile_img`, `agent_agreement_img`, `labor_contract`, `firm_contract`, `license`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 4, 'Surname1', 'Name1', 'middlasdc', '2021-01-08', '1231321', 'asas', '2sdfvdsfv', '2020-12-31', '2021-01-07', '4234234234', 'ddfzvdsfvdsfv', NULL, NULL, NULL, NULL, NULL, 0, '2021-01-08', '2021-01-10', NULL);
/*!40000 ALTER TABLE `agents` ENABLE KEYS */;

-- Dumping structure for table ddgi.banks
DROP TABLE IF EXISTS `banks`;
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
DROP TABLE IF EXISTS `beneficiaries`;
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
DROP TABLE IF EXISTS `branches`;
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
DELETE FROM `branches`;
/*!40000 ALTER TABLE `branches` DISABLE KEYS */;
INSERT INTO `branches` (`id`, `parent_id`, `name`, `series`, `founded_date`, `region`, `user_id`, `address`, `phone_number`, `type`, `code_by_office`, `code_by_type`, `hierarchy`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, NULL, 'name', 'series', '2021-01-08', 'Бухарская область', 9, 'dfvsdv', '45235325', 'Тип 1', 'sdfvdv', 'sdfvdsv', '33', '2021-01-08', '2021-01-10', NULL);
/*!40000 ALTER TABLE `branches` ENABLE KEYS */;

-- Dumping structure for table ddgi.directors
DROP TABLE IF EXISTS `directors`;
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
DELETE FROM `directors`;
/*!40000 ALTER TABLE `directors` DISABLE KEYS */;
INSERT INTO `directors` (`id`, `user_id`, `surname`, `name`, `middle_name`, `dob`, `passport_number`, `passport_series`, `work_start_date`, `work_end_date`, `phone_number`, `address`, `profile_img`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(2, 9, 'FotTestOnly3', 'sdfv', 'sdfv', '2021-01-07', '12341234', 'adscsadc', '2021-01-14', NULL, '5555551234', 'PO Box F', NULL, 1, '2021-01-08', '2021-01-10', NULL);
/*!40000 ALTER TABLE `directors` ENABLE KEYS */;

-- Dumping structure for table ddgi.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
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

-- Dumping structure for table ddgi.kasko
DROP TABLE IF EXISTS `kasko`;
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi.kasko: ~2 rows (approximately)
DELETE FROM `kasko`;
/*!40000 ALTER TABLE `kasko` DISABLE KEYS */;
INSERT INTO `kasko` (`id`, `type`, `product_id`, `from_date`, `to_date`, `reason`, `geo_zone`, `defect_img`, `purpose`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(19, 1, 1, '2021-01-06', '2021-01-13', 'fvsdfv', 'sdfvdsvf', NULL, 'fvdfsgsdfgfgdfgdfg', '2021-01-11', '2021-01-11', NULL),
	(20, 1, 1, '2021-01-06', '2021-01-13', 'fvsdfv', 'sdfvdsvf', NULL, 'fvdfsgsdfgfgdfgdfg', '2021-01-11', '2021-01-11', NULL);
/*!40000 ALTER TABLE `kasko` ENABLE KEYS */;

-- Dumping structure for table ddgi.kasko_policy_beneficiaries
DROP TABLE IF EXISTS `kasko_policy_beneficiaries`;
CREATE TABLE IF NOT EXISTS `kasko_policy_beneficiaries` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `policy_beneficiary_id` int(11) unsigned NOT NULL,
  `kasko_id` int(11) unsigned NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table ddgi.kasko_policy_beneficiaries: ~4 rows (approximately)
DELETE FROM `kasko_policy_beneficiaries`;
/*!40000 ALTER TABLE `kasko_policy_beneficiaries` DISABLE KEYS */;
INSERT INTO `kasko_policy_beneficiaries` (`id`, `policy_beneficiary_id`, `kasko_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 4, 13, NULL, NULL, NULL),
	(2, 6, 14, NULL, NULL, NULL),
	(3, 2, 15, NULL, NULL, NULL),
	(4, 7, 20, NULL, NULL, NULL);
/*!40000 ALTER TABLE `kasko_policy_beneficiaries` ENABLE KEYS */;

-- Dumping structure for table ddgi.kasko_policy_holders
DROP TABLE IF EXISTS `kasko_policy_holders`;
CREATE TABLE IF NOT EXISTS `kasko_policy_holders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `policy_holders_id` int(11) unsigned NOT NULL,
  `kasko_id` int(11) unsigned NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi.kasko_policy_holders: ~5 rows (approximately)
DELETE FROM `kasko_policy_holders`;
/*!40000 ALTER TABLE `kasko_policy_holders` DISABLE KEYS */;
INSERT INTO `kasko_policy_holders` (`id`, `policy_holders_id`, `kasko_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(2, 2, 12, NULL, NULL, NULL),
	(3, 4, 13, NULL, NULL, NULL),
	(4, 6, 14, NULL, NULL, NULL),
	(5, 7, 15, NULL, NULL, NULL),
	(6, 12, 20, NULL, NULL, NULL);
/*!40000 ALTER TABLE `kasko_policy_holders` ENABLE KEYS */;

-- Dumping structure for table ddgi.kasko_policy_informations
DROP TABLE IF EXISTS `kasko_policy_informations`;
CREATE TABLE IF NOT EXISTS `kasko_policy_informations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `policy_information_id` int(11) unsigned NOT NULL,
  `kasko_id` int(11) unsigned NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table ddgi.kasko_policy_informations: ~1 rows (approximately)
DELETE FROM `kasko_policy_informations`;
/*!40000 ALTER TABLE `kasko_policy_informations` DISABLE KEYS */;
INSERT INTO `kasko_policy_informations` (`id`, `policy_information_id`, `kasko_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 20, NULL, NULL, NULL);
/*!40000 ALTER TABLE `kasko_policy_informations` ENABLE KEYS */;

-- Dumping structure for table ddgi.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi.migrations: ~2 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2019_08_19_000000_create_failed_jobs_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table ddgi.policies
DROP TABLE IF EXISTS `policies`;
CREATE TABLE IF NOT EXISTS `policies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `number` int(11) unsigned NOT NULL,
  `act_number` varchar(50) NOT NULL,
  `client_type` tinyint(3) unsigned NOT NULL,
  `policy_series_id` int(11) unsigned DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `branch_id` int(11) unsigned DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi.policies: ~20 rows (approximately)
DELETE FROM `policies`;
/*!40000 ALTER TABLE `policies` DISABLE KEYS */;
INSERT INTO `policies` (`id`, `number`, `act_number`, `client_type`, `policy_series_id`, `status`, `branch_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 141, 'asdvvd', 0, 1, 'transferred', NULL, NULL, '2021-01-09', '2021-01-11', NULL),
	(2, 142, 'asdvvd', 0, 1, 'transferred', NULL, NULL, '2021-01-09', '2021-01-11', NULL),
	(3, 143, 'asdvvd', 0, 1, 'transferred', NULL, NULL, '2021-01-09', '2021-01-11', NULL),
	(4, 144, 'asdvvd', 0, 1, 'transferred', NULL, NULL, '2021-01-09', '2021-01-11', NULL),
	(5, 145, 'asdvvd', 0, 1, 'transferred', NULL, NULL, '2021-01-09', '2021-01-11', NULL),
	(6, 146, 'asdvvd', 0, 1, 'transferred', NULL, NULL, '2021-01-09', '2021-01-11', NULL),
	(7, 147, 'asdvvd', 0, 1, 'new', NULL, NULL, '2021-01-09', '2021-01-09', NULL),
	(8, 148, 'asdvvd', 0, 1, 'new', NULL, NULL, '2021-01-09', '2021-01-09', NULL),
	(9, 149, 'asdvvd', 0, 1, 'new', NULL, NULL, '2021-01-09', '2021-01-09', NULL),
	(10, 150, 'asdvvd', 0, 1, 'new', NULL, NULL, '2021-01-09', '2021-01-09', NULL),
	(11, 141, 'asdvvd', 0, 0, 'new', NULL, NULL, '2021-01-09', '2021-01-09', NULL),
	(12, 142, 'asdvvd', 0, 0, 'new', NULL, NULL, '2021-01-09', '2021-01-09', NULL),
	(13, 143, 'asdvvd', 0, 0, 'new', NULL, NULL, '2021-01-09', '2021-01-09', NULL),
	(14, 144, 'asdvvd', 0, 0, 'new', NULL, NULL, '2021-01-09', '2021-01-09', NULL),
	(15, 145, 'asdvvd', 0, 0, 'new', NULL, NULL, '2021-01-09', '2021-01-09', NULL),
	(16, 146, 'asdvvd', 0, 0, 'new', NULL, NULL, '2021-01-09', '2021-01-09', NULL),
	(17, 147, 'asdvvd', 0, 0, 'new', NULL, NULL, '2021-01-09', '2021-01-09', NULL),
	(18, 148, 'asdvvd', 0, 0, 'new', NULL, NULL, '2021-01-09', '2021-01-09', NULL),
	(19, 149, 'asdvvd', 0, 0, 'new', NULL, NULL, '2021-01-09', '2021-01-09', NULL),
	(20, 150, 'asdvvd', 0, 0, 'new', NULL, NULL, '2021-01-09', '2021-01-09', NULL);
/*!40000 ALTER TABLE `policies` ENABLE KEYS */;

-- Dumping structure for table ddgi.policies_policy_transfer
DROP TABLE IF EXISTS `policies_policy_transfer`;
CREATE TABLE IF NOT EXISTS `policies_policy_transfer` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `policy_transfer_id` int(11) unsigned NOT NULL,
  `policy_id` int(11) unsigned NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table ddgi.policies_policy_transfer: ~4 rows (approximately)
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
DROP TABLE IF EXISTS `policy_beneficiaries`;
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
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='страхователи';

-- Dumping data for table ddgi.policy_beneficiaries: ~7 rows (approximately)
DELETE FROM `policy_beneficiaries`;
/*!40000 ALTER TABLE `policy_beneficiaries` DISABLE KEYS */;
INSERT INTO `policy_beneficiaries` (`id`, `FIO`, `address`, `phone_number`, `checking_account`, `inn`, `mfo`, `okonx`, `bank_id`, `updated_at`, `created_at`, `deleted_at`) VALUES
	(1, 'gbebfgb', 'dfgbfdb', 'fdgbdfgb', 'gbdfgbdf', 'gbdfgb', 'dfgbdf', 'gbdfbg', 1, '2021-01-11', '2021-01-11', NULL),
	(2, 'gbebfgb', 'dfgbfdb', 'fdgbdfgb', 'gbdfgbdf', 'gbdfgb', 'dfgbdf', 'gbdfbg', 1, '2021-01-11', '2021-01-11', NULL),
	(3, 'ФИО выгодоприобретателя', 'Юр адрес выгодоприобретателя', 'Телефон', 'Расчетный счет', 'ИНН', 'МФО', 'ОКОНХ', 1, '2021-01-11', '2021-01-11', NULL),
	(4, 'ФИО выгодоприобретателя', 'Юр адрес выгодоприобретателя', 'Телефон', 'Расчетный счет', 'ИНН', 'МФО', 'ОКОНХ', 1, '2021-01-11', '2021-01-11', NULL),
	(5, 'ФИО выгодоприобретателя', 'Юр адрес выгодоприобретателя', 'Телефон', 'Расчетный счет', 'ИНН', 'МФО', 'ОКОНХ', 1, '2021-01-11', '2021-01-11', NULL),
	(6, 'ФИО выгодоприобретателя', 'Юр адрес выгодоприобретателя', 'Телефон', 'Расчетный счет', 'ИНН', 'МФО', 'ОКОНХ', 1, '2021-01-11', '2021-01-11', NULL),
	(7, 'ФИО выгодоприобретателя', 'Юр адрес выгодоприобретателя', 'Телефон', 'Расчетный счет', 'ИНН', 'МФО', 'ОКОНХ', 1, '2021-01-11', '2021-01-11', NULL);
/*!40000 ALTER TABLE `policy_beneficiaries` ENABLE KEYS */;

-- Dumping structure for table ddgi.policy_holders
DROP TABLE IF EXISTS `policy_holders`;
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='страхователи';

-- Dumping data for table ddgi.policy_holders: ~12 rows (approximately)
DELETE FROM `policy_holders`;
/*!40000 ALTER TABLE `policy_holders` DISABLE KEYS */;
INSERT INTO `policy_holders` (`id`, `FIO`, `address`, `phone_number`, `checking_account`, `inn`, `mfo`, `okonx`, `bank_id`, `updated_at`, `created_at`, `deleted_at`) VALUES
	(1, 'dfgbdf', 'gbdfgbdf', 'gbdfgbf', 'dgbgdfb', 'dfgbdfbfdgb', 'dfgbdf', 'dfgb', 1, '2021-01-10', '2021-01-10', NULL),
	(2, 'dfgbdf', 'gbdfgbdf', 'gbdfgbf', 'dgbgdfb', 'dfgbdfbfdgb', 'dfgbdf', 'dfgb', 1, '2021-01-10', '2021-01-10', NULL),
	(3, 'gbebfgb', 'dfgbfdb', 'fdgbdfgb', 'gbdfgbdf', 'gbdfgb', 'dfgbdf', 'gbdfbg', 1, '2021-01-10', '2021-01-10', NULL),
	(4, 'dfgbdf', 'gbdfgbdf', 'gbdfgbf', 'dgbgdfb', 'dfgbdfbfdgb', 'dfgbdf', 'dfgb', 1, '2021-01-10', '2021-01-10', NULL),
	(5, 'gbebfgb', 'dfgbfdb', 'fdgbdfgb', 'gbdfgbdf', 'gbdfgb', 'dfgbdf', 'gbdfbg', 1, '2021-01-10', '2021-01-10', NULL),
	(6, 'dfgbdf', 'gbdfgbdf', 'gbdfgbf', 'dgbgdfb', 'dfgbdfbfdgb', 'dfgbdf', 'dfgb', 1, '2021-01-11', '2021-01-11', NULL),
	(7, 'dfgbdf', 'gbdfgbdf', 'gbdfgbf', 'dgbgdfb', 'dfgbdfbfdgb', 'dfgbdf', 'dfgb', 1, '2021-01-11', '2021-01-11', NULL),
	(8, 'ФИО страхователя', 'Юр адрес страхователя', 'Телефон', 'Расчетный счет', 'ИНН', 'МФО', 'ОКОНХ', 1, '2021-01-11', '2021-01-11', NULL),
	(9, 'ФИО страхователя', 'Юр адрес страхователя', 'Телефон', 'Расчетный счет', 'ИНН', 'МФО', 'ОКОНХ', 1, '2021-01-11', '2021-01-11', NULL),
	(10, 'ФИО страхователя', 'Юр адрес страхователя', 'Телефон', 'Расчетный счет', 'ИНН', 'МФО', 'ОКОНХ', 1, '2021-01-11', '2021-01-11', NULL),
	(11, 'ФИО страхователя', 'Юр адрес страхователя', 'Телефон', 'Расчетный счет', 'ИНН', 'МФО', 'ОКОНХ', 1, '2021-01-11', '2021-01-11', NULL),
	(12, 'ФИО страхователя', 'Юр адрес страхователя', 'Телефон', 'Расчетный счет', 'ИНН', 'МФО', 'ОКОНХ', 1, '2021-01-11', '2021-01-11', NULL);
/*!40000 ALTER TABLE `policy_holders` ENABLE KEYS */;

-- Dumping structure for table ddgi.policy_informations
DROP TABLE IF EXISTS `policy_informations`;
CREATE TABLE IF NOT EXISTS `policy_informations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `policy_id` int(11) unsigned NOT NULL,
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
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi.policy_informations: ~1 rows (approximately)
DELETE FROM `policy_informations`;
/*!40000 ALTER TABLE `policy_informations` DISABLE KEYS */;
INSERT INTO `policy_informations` (`id`, `policy_id`, `policy_series_id`, `period`, `user_id`, `line_id`, `brand`, `model`, `modification`, `gov_number`, `tech_passport`, `engine_number`, `carcase_number`, `payload`, `seats_number`, `polnaya_strahovaya_stoimost`, `polnaya_strahovaya_summa`, `polnaya_strahovaya_premiya`, `additional_brand`, `additional_equipment`, `additional_serial_number`, `additional_strahovaya_summa`, `additional_terr_vehical`, `additional_terr_insured`, `additional_terr_evacuation`, `additional_is_vihecal_insured`, `additional_other_insurence_info`, `additional_is_death`, `additional_death_strahovaya_summa`, `additiona_death_strahovaya_premiya`, `additional_death_franchise`, `additional_is_civil`, `additional_civil_strahovaya_summa`, `additional_civil_strahovaya_premiya`, `additional_is_accident`, `additional_accident_driver_strahovaya_summa`, `additional_accident_driver_strahovaya_premiya`, `additional_accident_pessanger_number`, `additional_accident_pessanger_strahovaya_summa_per`, `additional_accident_pessanger_strahovaya_summa`, `additional_accident_pessanger_strahovaya_premiya`, `additional_accident_limit_number`, `additional_accident_limit_strahovaya_summa_per`, `additional_accident_limit_strahovaya_summa`, `additional_accident_limit_strahovaya_premiya`, `additional_limit`, `additional_policy_from_date`, `additional_strahovaya_premiya_currency`, `additional_poryadok_oplati_currency`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 1, 'regreb', 1, 'ertgretg', 'ertgre', 'grtg', 'ertgrt', 'rt', 'tgtertger', 'ertgretg', 'ertgetr', 'ertgertg', '252352345', '2343455', '12572901', NULL, 'vrfvdf', 'dsfvdfv', 'sdfvdsfv', '34523', '23452', '2345', '2345245', 1, 'fvdsvdfvsdfv', 1, '234523', '3245235', '3245235', 1, '2345235', '234525', 1, '2345235', '345', '2345', '1', '2345', '234', '1234', '1234', '1522756', '213', '1314124124', NULL, 'Сум', 'Сум', '2021-01-11', '2021-01-11', NULL);
/*!40000 ALTER TABLE `policy_informations` ENABLE KEYS */;

-- Dumping structure for table ddgi.policy_registrations
DROP TABLE IF EXISTS `policy_registrations`;
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
DELETE FROM `policy_registrations`;
/*!40000 ALTER TABLE `policy_registrations` DISABLE KEYS */;
INSERT INTO `policy_registrations` (`id`, `act_number`, `act_date`, `from_number`, `to_number`, `policy_series_id`, `document`, `client_type`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'asdvvd', '2021-01-09', '101', '140', 1, 'C:\\Users\\User\\AppData\\Local\\Temp\\php1FD7.tmp', 0, '2021-01-09', '2021-01-09', NULL),
	(2, 'asdvvd', '2021-01-09', '141', '150', 1, 'C:\\Users\\User\\AppData\\Local\\Temp\\php251F.tmp', 0, '2021-01-09', '2021-01-09', NULL),
	(3, 'asdvvd', '2021-01-09', '141', '150', 0, 'C:\\Users\\User\\AppData\\Local\\Temp\\php2D49.tmp', 0, '2021-01-09', '2021-01-09', NULL);
/*!40000 ALTER TABLE `policy_registrations` ENABLE KEYS */;

-- Dumping structure for table ddgi.policy_series
DROP TABLE IF EXISTS `policy_series`;
CREATE TABLE IF NOT EXISTS `policy_series` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi.policy_series: ~1 rows (approximately)
DELETE FROM `policy_series`;
/*!40000 ALTER TABLE `policy_series` DISABLE KEYS */;
INSERT INTO `policy_series` (`id`, `code`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '2342345555AA', '2021-01-08', '2021-01-08', NULL);
/*!40000 ALTER TABLE `policy_series` ENABLE KEYS */;

-- Dumping structure for table ddgi.policy_transfer
DROP TABLE IF EXISTS `policy_transfer`;
CREATE TABLE IF NOT EXISTS `policy_transfer` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `act_number` varchar(50) DEFAULT NULL,
  `act_date` date NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
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

-- Dumping data for table ddgi.policy_transfer: ~0 rows (approximately)
DELETE FROM `policy_transfer`;
/*!40000 ALTER TABLE `policy_transfer` DISABLE KEYS */;
INSERT INTO `policy_transfer` (`id`, `act_number`, `act_date`, `branch_id`, `policy_series_id`, `policy_from`, `policy_to`, `retransfer_distribution`, `act_file`, `transfer_given`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(2, 'asdvvd', '2021-01-11', 1, 1, '141', '146', '2021-01-11', 'C:\\Users\\User\\AppData\\Local\\Temp\\php40F.tmp', 'sdfvdsfv', '2021-01-11', '2021-01-11', NULL);
/*!40000 ALTER TABLE `policy_transfer` ENABLE KEYS */;

-- Dumping structure for table ddgi.users
DROP TABLE IF EXISTS `users`;
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
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(4, 'Name1', 'bobur_moscow1@mail.ru', NULL, '$2y$10$3CzSOxHcSQn6HJOm.ahdHORb50aYP.vJN31VSubEMla8QM7UhZV.a', NULL, '2021-01-08 04:47:43', '2021-01-10 15:01:35'),
	(9, 'sdfv', 'directo3r@director.com', NULL, '$2y$10$OYljKvaiPrLd8i9V1Ms4f.PX6SjBouTvqzdbFFGSb9uBbNLHfOCLm', NULL, '2021-01-08 13:10:10', '2021-01-10 16:26:47');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
