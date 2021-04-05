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

-- Dumping structure for table ddgi_test.accompanying_people
CREATE TABLE IF NOT EXISTS `accompanying_people` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cargo_infos_id` bigint(20) unsigned NOT NULL,
  `fio_accompanying` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_accompanying` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `accompanying_people_cargo_infos_id_foreign` (`cargo_infos_id`),
  CONSTRAINT `accompanying_people_cargo_infos_id_foreign` FOREIGN KEY (`cargo_infos_id`) REFERENCES `cargo_infos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.accompanying_people: ~0 rows (approximately)
DELETE FROM `accompanying_people`;
/*!40000 ALTER TABLE `accompanying_people` DISABLE KEYS */;
/*!40000 ALTER TABLE `accompanying_people` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.agents
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

-- Dumping data for table ddgi_test.agents: ~2 rows (approximately)
DELETE FROM `agents`;
/*!40000 ALTER TABLE `agents` DISABLE KEYS */;
INSERT INTO `agents` (`id`, `user_id`, `surname`, `name`, `middle_name`, `dob`, `passport_number`, `passport_series`, `job`, `work_start_date`, `work_end_date`, `phone_number`, `address`, `profile_img`, `agent_agreement_img`, `labor_contract`, `firm_contract`, `license`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 4, 'Surname1', 'Name1', 'middlasdc', '2021-01-08', '1231321', 'asas', '2sdfvdsfv', '2020-12-31', '2021-01-07', '4234234234', 'ddfzvdsfvdsfv', NULL, NULL, NULL, NULL, NULL, 0, '2021-01-08 00:00:00', '2021-01-10 00:00:00', NULL),
	(2, 3, 'FotTestOnly', 'ahahah', 'asdcsdac', '2021-01-29', 'sdvfdvf', 'adscsadc', 'dascdd3', '2021-01-29', '2021-02-05', '5555551234', 'PO Box F', NULL, NULL, NULL, NULL, NULL, 1, '2021-01-29 00:00:00', '2021-02-16 14:34:49', NULL);
/*!40000 ALTER TABLE `agents` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.audit_infos
CREATE TABLE IF NOT EXISTS `audit_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `otvetsvennost_audit_id` bigint(20) unsigned NOT NULL,
  `number_polis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `series_polis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validity_period_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validity_period_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `polis_agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `polis_mark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `workExp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `polis_model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arriving_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost_of_insurance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sum_of_insurance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bonus_of_insurance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `audit_infos_otvetsvennost_audit_id_foreign` (`otvetsvennost_audit_id`),
  CONSTRAINT `audit_infos_otvetsvennost_audit_id_foreign` FOREIGN KEY (`otvetsvennost_audit_id`) REFERENCES `otvetsvennost_audits` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.audit_infos: ~0 rows (approximately)
DELETE FROM `audit_infos`;
/*!40000 ALTER TABLE `audit_infos` DISABLE KEYS */;
/*!40000 ALTER TABLE `audit_infos` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.audit_turnovers
CREATE TABLE IF NOT EXISTS `audit_turnovers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `polis_premium` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `turnover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `net_profit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_polis_premium` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_turnover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_net_profit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.audit_turnovers: ~0 rows (approximately)
DELETE FROM `audit_turnovers`;
/*!40000 ALTER TABLE `audit_turnovers` DISABLE KEYS */;
/*!40000 ALTER TABLE `audit_turnovers` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.banks
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

-- Dumping data for table ddgi_test.banks: ~6 rows (approximately)
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

-- Dumping structure for table ddgi_test.beneficiaries
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

-- Dumping data for table ddgi_test.beneficiaries: ~0 rows (approximately)
DELETE FROM `beneficiaries`;
/*!40000 ALTER TABLE `beneficiaries` DISABLE KEYS */;
/*!40000 ALTER TABLE `beneficiaries` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.bonded
CREATE TABLE IF NOT EXISTS `bonded` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `policy_beneficiary_id` int(10) unsigned NOT NULL DEFAULT '0',
  `policy_id` int(10) unsigned NOT NULL DEFAULT '0',
  `policy_series_id` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `policy_from_date` date DEFAULT NULL,
  `policy_holder_id` int(10) unsigned NOT NULL DEFAULT '0',
  `insurance_premium_payment_type` int(10) unsigned NOT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `volume` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insurance_premium_currency_rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insurance_premium_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unique_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume_measure` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock_date` date DEFAULT NULL COMMENT 'Период нахождения товара на данном складе',
  `total_insured_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Общая страховая сумма',
  `total_insured_closed_stock_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Страховая сумма для закрытого склада с общим объемом',
  `total_insured_open_stock_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Страховая сумма для открытого склада с общим площадью',
  `insurance_premium` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settlement_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Валюта взаиморасчетов',
  `premium_terms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.bonded: ~5 rows (approximately)
DELETE FROM `bonded`;
/*!40000 ALTER TABLE `bonded` DISABLE KEYS */;
INSERT INTO `bonded` (`id`, `type`, `product_id`, `policy_beneficiary_id`, `policy_id`, `policy_series_id`, `user_id`, `policy_from_date`, `policy_holder_id`, `insurance_premium_payment_type`, `from_date`, `to_date`, `volume`, `insurance_premium_currency_rate`, `insurance_premium_currency`, `unique_number`, `volume_measure`, `total_price`, `stock_date`, `total_insured_price`, `total_insured_closed_stock_price`, `total_insured_open_stock_price`, `insurance_premium`, `settlement_currency`, `premium_terms`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(9, '0', 2, 15, 1, 1, 4, '2021-03-06', 20, 2, '2021-03-03', '2021-03-03', 'sdfsdfgsdf', NULL, 'USD', '0100/0201/2/2100001', 'tonna', '235235', '2021-03-04', '2021-03-04', '234525', '25252345', '234542535', 'UZS', NULL, '2021-03-03 02:59:46', '2021-03-03 04:20:31', NULL),
	(10, '0', 2, 16, 2, 1, 4, '2021-03-06', 21, 1, '2021-03-04', '2021-03-04', 'sdfvdsvf', NULL, 'UZS', '0100/0201/1/2100002', 'shtuka', 'vsdvfdsvff', '2021-03-11', '2021-03-11', '452352345', '23452523', '4542345', 'UZS', NULL, '2021-03-03 05:13:10', '2021-03-03 05:13:10', NULL),
	(12, '0', 2, 18, 4, 1, 4, '2021-03-06', 23, 1, '2021-03-05', '2021-03-10', '5345', NULL, 'UZS', '0100/0201/1/2100003', 'tonna', '34543', '2021-03-18', '2021-03-18', '345', '345345', '35345', 'UZS', NULL, '2021-03-03 06:13:29', '2021-03-03 06:14:25', NULL),
	(13, '0', 2, 19, 11, 0, 4, '2021-03-06', 24, 1, '2021-03-14', '2021-03-05', 'dsfvdsfvsdfv', NULL, 'UZS', '0100/0201/1/2100004', 'litr', 'sdfvsdvf', '2021-03-13', 'sdfvsdv', 'dsfvsdfvsd', 'vsdfvsdfv', 'sdfvsdfvsdvf', 'UZS', NULL, '2021-03-03 08:45:31', '2021-03-03 08:45:31', NULL),
	(14, '0', 2, 20, 12, 0, 4, '2021-03-26', 25, 2, '2021-03-06', '2021-04-01', '5345', NULL, '69', '0100/0201/2/2100005', 'litr', '34', '2021-03-28', '43523', '345', '2555', '35345', 'UZS', NULL, '2021-03-06 09:14:43', '2021-03-24 06:41:54', '2021-03-24 06:41:54');
/*!40000 ALTER TABLE `bonded` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.bonded_policy_informations
CREATE TABLE IF NOT EXISTS `bonded_policy_informations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `bonded_id` int(10) unsigned NOT NULL,
  `policy_series_id` int(10) unsigned NOT NULL,
  `policy_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `from_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.bonded_policy_informations: ~4 rows (approximately)
DELETE FROM `bonded_policy_informations`;
/*!40000 ALTER TABLE `bonded_policy_informations` DISABLE KEYS */;
INSERT INTO `bonded_policy_informations` (`id`, `bonded_id`, `policy_series_id`, `policy_id`, `user_id`, `from_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(2, 9, 1, 1, 4, '2021-03-04', '2021-03-03 02:59:46', '2021-03-03 04:20:31', NULL),
	(3, 10, 1, 2, 4, '2021-03-05', '2021-03-03 05:13:10', '2021-03-03 05:13:10', NULL),
	(4, 12, 1, 4, 4, '2021-03-10', '2021-03-03 06:13:29', '2021-03-03 06:13:29', NULL),
	(5, 13, 0, 11, 4, '2021-03-05', '2021-03-03 08:45:31', '2021-03-03 08:45:31', NULL);
/*!40000 ALTER TABLE `bonded_policy_informations` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.borrower_sportsman_infos
CREATE TABLE IF NOT EXISTS `borrower_sportsman_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `borrower_sportsman_id` bigint(20) unsigned NOT NULL,
  `policy_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_series` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_chronic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `polis_fio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `polis_date_birth` date DEFAULT NULL,
  `polis_passport_series` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `polis_usable_period` date DEFAULT NULL,
  `polis_benefit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `polis_overall_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `borrower_sportsman_infos_borrower_sportsman_id_foreign` (`borrower_sportsman_id`),
  CONSTRAINT `borrower_sportsman_infos_borrower_sportsman_id_foreign` FOREIGN KEY (`borrower_sportsman_id`) REFERENCES `borrower_sportsmen` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.borrower_sportsman_infos: ~0 rows (approximately)
DELETE FROM `borrower_sportsman_infos`;
/*!40000 ALTER TABLE `borrower_sportsman_infos` DISABLE KEYS */;
/*!40000 ALTER TABLE `borrower_sportsman_infos` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.borrower_sportsman_others
CREATE TABLE IF NOT EXISTS `borrower_sportsman_others` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `borrower_sportsman_id` bigint(20) unsigned NOT NULL,
  `other_mark_model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_name_tools` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_series_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_insurance_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_cover_terror_attacks_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_cover_terror_attacks_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_terror_attacks_insured_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_cover_terror_attacks_insured_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_coverage_evacuation_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_coverage_evacuation_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_insurance_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `one_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `one_premia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `one_franshiza` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tho_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_preim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver_one_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver_total_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver_preim_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passenger_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passenger_one_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passenger_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passenger_total_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passenger_preim_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `limit_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `limit_one_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `limit_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `limit_total_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `limit_preim_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_liability_limit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_liability_limit_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_form_policy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_from_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_totally_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `borrower_sportsman_others_borrower_sportsman_id_foreign` (`borrower_sportsman_id`),
  CONSTRAINT `borrower_sportsman_others_borrower_sportsman_id_foreign` FOREIGN KEY (`borrower_sportsman_id`) REFERENCES `borrower_sportsmen` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.borrower_sportsman_others: ~0 rows (approximately)
DELETE FROM `borrower_sportsman_others`;
/*!40000 ALTER TABLE `borrower_sportsman_others` DISABLE KEYS */;
/*!40000 ALTER TABLE `borrower_sportsman_others` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.borrower_sportsmen
CREATE TABLE IF NOT EXISTS `borrower_sportsmen` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `policy_holder_id` bigint(20) unsigned NOT NULL,
  `insurance_from` date DEFAULT NULL,
  `insurance_to` date DEFAULT NULL,
  `polis_series` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `polis_giving_date` date DEFAULT NULL,
  `litso` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insurance_premium_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_term` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `all_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insurance_bonus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.borrower_sportsmen: ~0 rows (approximately)
DELETE FROM `borrower_sportsmen`;
/*!40000 ALTER TABLE `borrower_sportsmen` DISABLE KEYS */;
/*!40000 ALTER TABLE `borrower_sportsmen` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.branches
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
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi_test.branches: ~4 rows (approximately)
DELETE FROM `branches`;
/*!40000 ALTER TABLE `branches` DISABLE KEYS */;
INSERT INTO `branches` (`id`, `parent_id`, `name`, `is_center`, `series`, `founded_date`, `user_id`, `region_id`, `address`, `phone_number`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, NULL, 'Головной офис', 0, 'серия', '2021-02-15', 9, 1, 'Ташкент', '23452352345', '2021-02-15', '2021-02-15', NULL),
	(2, NULL, 'name', 0, 'series', '2021-01-08', 9, 1, 'dfvsdv', '45235325', '2021-01-08', '2021-01-10', NULL),
	(3, 3, 'FotTestOnly', 0, 'vfdv', '2021-02-18', 17, 1, 'PO Box F', '5555551234', '2021-02-18', '2021-02-18', NULL),
	(4, 4, 'rgwergewrg', 0, 'xcv', '2021-02-19', 20, 1, 'PO Box F', '5555551234', '2021-02-18', '2021-02-18', NULL);
/*!40000 ALTER TABLE `branches` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.cargo_infos
CREATE TABLE IF NOT EXISTS `cargo_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `policy_holder_id` bigint(20) unsigned NOT NULL,
  `policy_beneficiary_id` bigint(20) unsigned NOT NULL,
  `client_type_radio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dogovor_lizing_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insurance_from` date DEFAULT NULL,
  `steamer_point` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appointment_point` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `geo_zone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `overloads_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_of_insurance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_of_cargo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_of_cargo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_of_cargo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_packaging` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight_of_cargo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_of_cargo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_of_transport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qualities_of_cargo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fio_accompanying` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_accompanying` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_of_cargo_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transporter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_of_shipper` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_shipper` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_consignee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_consignee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insurance_period_from` date DEFAULT NULL,
  `insurance_to` date DEFAULT NULL,
  `packaging_period_from` date DEFAULT NULL,
  `packaging_period_to` date DEFAULT NULL,
  `condition_insurance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accompanying_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insurance_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insurance_bonus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `franchise` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insurance_premium_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_term` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_sum_main` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_from_main` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_series` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_giving_insurance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `responsible_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `application_form` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.cargo_infos: ~0 rows (approximately)
DELETE FROM `cargo_infos`;
/*!40000 ALTER TABLE `cargo_infos` DISABLE KEYS */;
/*!40000 ALTER TABLE `cargo_infos` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.cargo_payment_terms
CREATE TABLE IF NOT EXISTS `cargo_payment_terms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cargo_infos_id` bigint(20) unsigned NOT NULL,
  `payment_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cargo_payment_terms_cargo_infos_id_foreign` (`cargo_infos_id`),
  CONSTRAINT `cargo_payment_terms_cargo_infos_id_foreign` FOREIGN KEY (`cargo_infos_id`) REFERENCES `cargo_infos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.cargo_payment_terms: ~0 rows (approximately)
DELETE FROM `cargo_payment_terms`;
/*!40000 ALTER TABLE `cargo_payment_terms` DISABLE KEYS */;
/*!40000 ALTER TABLE `cargo_payment_terms` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.clients
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

-- Dumping data for table ddgi_test.clients: ~3 rows (approximately)
DELETE FROM `clients`;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` (`id`, `type`, `name`, `middle_name`, `surname`, `address`, `phone_number`, `mfo`, `inn`, `bank_id`, `raschetniy_schet`, `passport_series`, `passport_number`, `passport_given_date`, `passport_given_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 0, 'name', 'middle', 'surname', 'fsvdvf', 'sdfvfdv', 'sdfvsdfv', 'sdfvsdvf', 2, 'sdvfdfsv', 'sdfvdsvf', 'sdfvsdvf', '2021-01-21', 'sdfvsdv', '2021-01-21 02:24:07', '2021-01-21 02:24:07', NULL),
	(2, 1, 'sdfvdsfdsfv', NULL, NULL, 'sdvfdsfv', '454353', NULL, NULL, 4, 'sdfvdsvf', NULL, NULL, NULL, NULL, '2021-01-21 02:33:49', '2021-01-21 02:33:49', NULL),
	(3, 1, 'sfdvsdfv', NULL, NULL, 'vsdfvdsfv', '23553', NULL, NULL, 4, 'dsfvdsfvdsf', NULL, NULL, NULL, NULL, '2021-01-21 02:35:53', '2021-01-21 05:10:26', '2021-01-21 05:10:26');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.cmp
CREATE TABLE IF NOT EXISTS `cmp` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'тип юр.= 1; физ = 0',
  `product_id` int(11) unsigned DEFAULT NULL,
  `policy_id` int(11) unsigned DEFAULT NULL,
  `policy_series_id` int(11) unsigned DEFAULT NULL,
  `policy_holder_id` int(11) unsigned NOT NULL,
  `object_info_dogov_stoy` varchar(200) DEFAULT NULL,
  `holder_from_date` date DEFAULT NULL,
  `holder_to_date` date DEFAULT NULL,
  `object_stroy_mont` varchar(200) DEFAULT NULL,
  `object_location` varchar(200) DEFAULT NULL,
  `object_insurance_sum` varchar(200) DEFAULT NULL,
  `object_from_date` date DEFAULT NULL,
  `object_to_date` date DEFAULT NULL,
  `object_tel_povr` varchar(200) DEFAULT NULL,
  `object_material` varchar(200) DEFAULT NULL,
  `stroy_mont_sum` varchar(200) DEFAULT NULL,
  `stroy_sum` varchar(200) DEFAULT NULL,
  `obor_sum` varchar(200) DEFAULT NULL,
  `stroy_mash_sum` varchar(200) DEFAULT NULL,
  `rasx_sum` varchar(200) DEFAULT NULL,
  `insurance_prem_sum` varchar(200) DEFAULT NULL,
  `franchise_sum` varchar(200) DEFAULT NULL,
  `insurence_currency` varchar(200) DEFAULT NULL,
  `insurence_currency_rate` varchar(200) DEFAULT NULL,
  `insurance_premium_payment_type` int(10) unsigned DEFAULT NULL,
  `unique_number` varchar(200) DEFAULT NULL,
  `polic_given_date` varchar(200) DEFAULT NULL,
  `payment_term` varchar(200) DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi_test.cmp: ~1 rows (approximately)
DELETE FROM `cmp`;
/*!40000 ALTER TABLE `cmp` DISABLE KEYS */;
INSERT INTO `cmp` (`id`, `type`, `product_id`, `policy_id`, `policy_series_id`, `policy_holder_id`, `object_info_dogov_stoy`, `holder_from_date`, `holder_to_date`, `object_stroy_mont`, `object_location`, `object_insurance_sum`, `object_from_date`, `object_to_date`, `object_tel_povr`, `object_material`, `stroy_mont_sum`, `stroy_sum`, `obor_sum`, `stroy_mash_sum`, `rasx_sum`, `insurance_prem_sum`, `franchise_sum`, `insurence_currency`, `insurence_currency_rate`, `insurance_premium_payment_type`, `unique_number`, `polic_given_date`, `payment_term`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(5, 0, 3, 6, 1, 37, 'Сведения о договоре строительного порядка', NULL, NULL, 'Объект стриотельно-монтажных работ', 'Расположение объекта', '100000', '2021-03-26', '2021-03-24', 'Телесные повреждения', 'Материальный ущерб', '234242', '33333', '444444', '555555', '222222', '44444', '23', 'UZS', NULL, 1, '0100/0303/1/2100001', '2021-03-11', '1', 4, '2021-03-07 07:35:00', '2021-03-07 07:54:59', NULL);
/*!40000 ALTER TABLE `cmp` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.credit_fin_risk_nepogashen_avtocredits
CREATE TABLE IF NOT EXISTS `credit_fin_risk_nepogashen_avtocredits` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `dogovor_lizing_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Кредитный договор',
  `insurance_from` date NOT NULL COMMENT 'Срок кредитования С',
  `insurance_to` date NOT NULL COMMENT 'Срок кредитования До',
  `credit_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit_purpose` text COLLATE utf8mb4_unicode_ci COMMENT 'Цель получения кредита',
  `franchise` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_issue_policy` date DEFAULT NULL COMMENT 'Срок действия договора',
  `total_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_award` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_terms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Условия оплаты',
  `serial_number_policy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_delivery_policy` date NOT NULL COMMENT 'Дата выдачи страхового полиса',
  `policy_holder_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `zaemshik_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `credit_fin_risk_nepogashen_avtocredits_policy_holder_id_index` (`policy_holder_id`),
  KEY `credit_fin_risk_nepogashen_avtocredits_agent_id_index` (`agent_id`),
  KEY `credit_fin_risk_nepogashen_avtocredits_zaemshik_id_index` (`zaemshik_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.credit_fin_risk_nepogashen_avtocredits: ~0 rows (approximately)
DELETE FROM `credit_fin_risk_nepogashen_avtocredits`;
/*!40000 ALTER TABLE `credit_fin_risk_nepogashen_avtocredits` DISABLE KEYS */;
/*!40000 ALTER TABLE `credit_fin_risk_nepogashen_avtocredits` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.credit_fin_risk_nepogashen_credits
CREATE TABLE IF NOT EXISTS `credit_fin_risk_nepogashen_credits` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `dogovor_lizing_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Кредитный договор',
  `insurance_from` date NOT NULL COMMENT 'Срок кредитования С',
  `insurance_to` date NOT NULL COMMENT 'Срок кредитования До',
  `credit_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit_purpose` text COLLATE utf8mb4_unicode_ci COMMENT 'Цель получения кредита',
  `date_issue_policy` date DEFAULT NULL COMMENT 'Срок действия договора',
  `other_forms` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_award` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_terms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Условия оплаты',
  `serial_number_policy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_delivery_policy` date NOT NULL COMMENT 'Дата выдачи страхового полиса',
  `policy_holder_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `zaemshik_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `credit_fin_risk_nepogashen_credits_policy_holder_id_index` (`policy_holder_id`),
  KEY `credit_fin_risk_nepogashen_credits_agent_id_index` (`agent_id`),
  KEY `credit_fin_risk_nepogashen_credits_zaemshik_id_index` (`zaemshik_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.credit_fin_risk_nepogashen_credits: ~0 rows (approximately)
DELETE FROM `credit_fin_risk_nepogashen_credits`;
/*!40000 ALTER TABLE `credit_fin_risk_nepogashen_credits` DISABLE KEYS */;
/*!40000 ALTER TABLE `credit_fin_risk_nepogashen_credits` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.credit_nepogashens
CREATE TABLE IF NOT EXISTS `credit_nepogashens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `dogovor_credit_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit_from` date NOT NULL,
  `credit_to` date NOT NULL,
  `credit_validity_period` date NOT NULL,
  `credit_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit_purpose` text COLLATE utf8mb4_unicode_ci,
  `other_forms` text COLLATE utf8mb4_unicode_ci,
  `total_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_award` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_terms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_number_policy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_issue_policy` date DEFAULT NULL,
  `otvet_litso` int(11) NOT NULL,
  `policy_holder_id` int(11) NOT NULL,
  `zaemshik_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `credit_nepogashens_otvet_litso_index` (`otvet_litso`),
  KEY `credit_nepogashens_policy_holder_id_index` (`policy_holder_id`),
  KEY `credit_nepogashens_zaemshik_id_index` (`zaemshik_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.credit_nepogashens: ~0 rows (approximately)
DELETE FROM `credit_nepogashens`;
/*!40000 ALTER TABLE `credit_nepogashens` DISABLE KEYS */;
/*!40000 ALTER TABLE `credit_nepogashens` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.currencies
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

-- Dumping data for table ddgi_test.currencies: ~2 rows (approximately)
DELETE FROM `currencies`;
/*!40000 ALTER TABLE `currencies` DISABLE KEYS */;
INSERT INTO `currencies` (`id`, `name`, `code`, `rate`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Euro', 'EUR', '12000', '2021-01-21 08:42:56', '2021-01-21 08:42:56', NULL),
	(2, 'US Dollar', 'USD', '10000', '2021-01-21 09:12:41', '2021-01-21 09:12:41', NULL);
/*!40000 ALTER TABLE `currencies` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.currency_terms
CREATE TABLE IF NOT EXISTS `currency_terms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `otvetsvennost_audit_id` bigint(20) unsigned NOT NULL,
  `payment_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `currency_terms_otvetsvennost_audit_id_foreign` (`otvetsvennost_audit_id`),
  CONSTRAINT `currency_terms_otvetsvennost_audit_id_foreign` FOREIGN KEY (`otvetsvennost_audit_id`) REFERENCES `otvetsvennost_audits` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.currency_terms: ~0 rows (approximately)
DELETE FROM `currency_terms`;
/*!40000 ALTER TABLE `currency_terms` DISABLE KEYS */;
/*!40000 ALTER TABLE `currency_terms` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.currency_terms_transhes
CREATE TABLE IF NOT EXISTS `currency_terms_transhes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `borrower_id` bigint(20) unsigned NOT NULL,
  `payment_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `currency_terms_transhes_borrower_id_foreign` (`borrower_id`),
  CONSTRAINT `currency_terms_transhes_borrower_id_foreign` FOREIGN KEY (`borrower_id`) REFERENCES `neshchastka_borrowers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.currency_terms_transhes: ~0 rows (approximately)
DELETE FROM `currency_terms_transhes`;
/*!40000 ALTER TABLE `currency_terms_transhes` DISABLE KEYS */;
/*!40000 ALTER TABLE `currency_terms_transhes` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.directors
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table ddgi_test.directors: ~5 rows (approximately)
DELETE FROM `directors`;
/*!40000 ALTER TABLE `directors` DISABLE KEYS */;
INSERT INTO `directors` (`id`, `user_id`, `surname`, `name`, `middle_name`, `dob`, `passport_number`, `passport_series`, `work_start_date`, `work_end_date`, `phone_number`, `address`, `profile_img`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(2, 9, 'FotTestOnly3', 'sdfv', 'sdfv', '2021-01-07', '12341234', 'adscsadc', '2021-01-14', NULL, '5555551234', 'PO Box F', 'directors/9/VSYsPtW06DQR5UNFHE7eLzGaWABhsSZkSyGPEMzh.jpg', 1, '2021-01-08', '2021-03-29', NULL),
	(4, 17, 'Another', 'Name', 'Surname', '2021-02-11', 'sdfvsdv', 'AA', '2021-02-17', NULL, '5555551234', 'PO Box F', 'C:\\Users\\User\\AppData\\Local\\Temp\\phpF1C4.tmp', 1, '2021-02-18', '2021-03-28', NULL),
	(5, 20, 'Another 2', 'Name 2', 'Surname', '2021-02-11', 'sdfvsdv', 'AA', '2021-02-17', NULL, '5555551234', 'PO Box F', NULL, 1, '2021-02-18', '2021-02-18', NULL),
	(6, 21, 'Иванов', 'Иван', 'Иванович', '1980-03-11', '12341234', 'AA', '2021-03-30', NULL, '5555551234', 'Ташкент, Узбекистан', 'directors/21/xnq6daN1XHHD3KiNa3x7MqL46pMSwbkmMYeIaQu7.jpg', 1, '2021-03-29', '2021-03-29', NULL),
	(7, 22, 'test', 'test', 'test', '2021-03-06', 'trrtrtr', 'AA', '2021-03-31', NULL, '5555551234', 'PO Box F', 'directors/22/52e0q1HgnBdOndyUREFqjtFtWpvYDtLKyRhPEUtu.png', 1, '2021-03-29', '2021-03-29', '2021-03-29');
/*!40000 ALTER TABLE `directors` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.dobrovolka_avto
CREATE TABLE IF NOT EXISTS `dobrovolka_avto` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `period_insurance_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `period_insurance_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ispolzovaniya_TS_na_osnovanii` int(11) DEFAULT NULL,
  `geograficheskaya_zona` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `defects` int(11) DEFAULT NULL,
  `defects_images` text COLLATE utf8mb4_unicode_ci,
  `cel_ispolzovaniya` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valyuta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poryadok_oplaty_premii` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sposob_rascheta` int(11) DEFAULT NULL,
  `strahovaya_summa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `strahovaya_premiya` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `franshiza` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anketa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dogovor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `polis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.dobrovolka_avto: ~0 rows (approximately)
DELETE FROM `dobrovolka_avto`;
/*!40000 ALTER TABLE `dobrovolka_avto` DISABLE KEYS */;
/*!40000 ALTER TABLE `dobrovolka_avto` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.dobrovolka_avto_info
CREATE TABLE IF NOT EXISTS `dobrovolka_avto_info` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `seriya_polisa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `period_dejstviya_polisa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vybor_agenta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_stroku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marka` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modificacia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gos_nomer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomer_tex_passport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomer_dvigatelya` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gryzopodemnost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colichestvo_posadochnix_mest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `strahovaya_stoimost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `straxovay_premiya` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gibel_avto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `neschastnuy_slushau` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avto_otvetstvennost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zastrahovanu_avto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.dobrovolka_avto_info: ~0 rows (approximately)
DELETE FROM `dobrovolka_avto_info`;
/*!40000 ALTER TABLE `dobrovolka_avto_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `dobrovolka_avto_info` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.dobrovolka_avto_poryadok_oplaty
CREATE TABLE IF NOT EXISTS `dobrovolka_avto_poryadok_oplaty` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `dobrovolka_avto_id` int(11) NOT NULL,
  `poryadok_oplaty_summa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poryadok_oplaty_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.dobrovolka_avto_poryadok_oplaty: ~0 rows (approximately)
DELETE FROM `dobrovolka_avto_poryadok_oplaty`;
/*!40000 ALTER TABLE `dobrovolka_avto_poryadok_oplaty` DISABLE KEYS */;
/*!40000 ALTER TABLE `dobrovolka_avto_poryadok_oplaty` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.dobrovolka_teztools
CREATE TABLE IF NOT EXISTS `dobrovolka_teztools` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.dobrovolka_teztools: ~0 rows (approximately)
DELETE FROM `dobrovolka_teztools`;
/*!40000 ALTER TABLE `dobrovolka_teztools` DISABLE KEYS */;
/*!40000 ALTER TABLE `dobrovolka_teztools` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.franchise_type
CREATE TABLE IF NOT EXISTS `franchise_type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table ddgi_test.franchise_type: ~3 rows (approximately)
DELETE FROM `franchise_type`;
/*!40000 ALTER TABLE `franchise_type` DISABLE KEYS */;
INSERT INTO `franchise_type` (`id`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'нет', NULL, NULL, NULL),
	(2, 'условная', NULL, NULL, NULL),
	(3, 'безусловная', NULL, NULL, NULL);
/*!40000 ALTER TABLE `franchise_type` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.from_site_orders
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

-- Dumping data for table ddgi_test.from_site_orders: ~3 rows (approximately)
DELETE FROM `from_site_orders`;
/*!40000 ALTER TABLE `from_site_orders` DISABLE KEYS */;
INSERT INTO `from_site_orders` (`id`, `order_id`, `title`, `object_title`, `status`, `amount`, `prize`, `timestamp`, `term`, `inventory_number`, `total_area`, `city_property`, `street`, `type_property`, `matches_registration_address`, `username`, `first_name`, `last_name`, `middle_name`, `is_active`, `avatar`, `birth_day`, `serial_number`, `passport_number`, `date_issue`, `issued_by`, `phone`, `email_index`, `city`, `district`, `user_street`, `apartment_number`, `home_number`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Страхование инфекционных заболеваний', 'Человек', 'Успешно проведен', '0', '10000', '2021-02-03 12:49:32', '2021-08-31 17:22:34', '', '', '', '', '', '0', 'adminddgi', 'Sardor', 'Maxmudov', 'Maxmudovich', 1, 'http://ddgi.uz/media/profile/2021/02/08/mac.jpg', '2020-09-08', 'AA', '4799722', '2000-02-22', 'IIB Yunusobod Tumani', '998977008055', '10000800', 'Ташкент', 'Юнусабад', '18', '17', '9', '2021-02-08 15:51:34', '2021-03-31 08:55:11'),
	(2, 2, 'Страхование инфекционных заболеваний', 'Человек', 'Расторгнут', '8340000', '41700', '2021-02-08 10:25:34', '2021-08-08 10:25:34', '', '', '', '', '', '1', 'adminddgi', 'Sardor', 'Maxmudov', 'Maxmudovich', 1, 'http://ddgi.uz/media/profile/2021/02/08/mac.jpg', '2020-09-08', 'AA', '4799722', '2000-02-22', 'IIB Yunusobod Tumani', '998977008055', '10000800', 'Ташкент', 'Юнусабад', '18', '17', '9', '2021-02-08 15:51:34', '2021-03-31 08:55:11'),
	(3, 3, 'Страхование имущество', 'Квартира', 'Забракован', '32650000000', '3874750.0', '2021-02-08 10:43:47', '2021-08-08 10:43:47', '44766554114777', '120', 'Ташкент', '18', '2', '0', 'adminddgi', 'Sardor', 'Maxmudov', 'Maxmudovich', 1, 'http://ddgi.uz/media/profile/2021/02/08/mac.jpg', '2020-09-08', 'AA', '4799722', '2000-02-22', 'IIB Yunusobod Tumani', '998977008055', '10000800', 'Ташкент', 'Юнусабад', '18', '17', '9', '2021-02-08 15:52:08', '2021-03-31 08:55:11');
/*!40000 ALTER TABLE `from_site_orders` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.groups
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi_test.groups: ~2 rows (approximately)
DELETE FROM `groups`;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'group 1', '2021-02-12 04:04:42', '2021-02-12 02:16:45', NULL),
	(2, 'group 2', '2021-02-12 02:19:32', '2021-02-12 02:19:45', NULL);
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.kasco_strah_premiya
CREATE TABLE IF NOT EXISTS `kasco_strah_premiya` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kasco_id` int(11) NOT NULL,
  `strah_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strah_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.kasco_strah_premiya: ~0 rows (approximately)
DELETE FROM `kasco_strah_premiya`;
/*!40000 ALTER TABLE `kasco_strah_premiya` DISABLE KEYS */;
/*!40000 ALTER TABLE `kasco_strah_premiya` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.kasko
CREATE TABLE IF NOT EXISTS `kasko` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `insurance_from` date NOT NULL,
  `insurance_to` date NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `geo_zone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strahovaya_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strahovaya_purpose` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `franshiza` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insurance_premium_currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_term` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sposob_rascheta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `polis_series` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insurance_from_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `policy_holder_id` int(11) NOT NULL,
  `policy_beneficiary_id` int(11) NOT NULL,
  `otvet_litso` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.kasko: ~0 rows (approximately)
DELETE FROM `kasko`;
/*!40000 ALTER TABLE `kasko` DISABLE KEYS */;
/*!40000 ALTER TABLE `kasko` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.kasko_policy_beneficiaries
CREATE TABLE IF NOT EXISTS `kasko_policy_beneficiaries` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `policy_beneficiary_id` int(11) unsigned NOT NULL,
  `kasko_id` int(11) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table ddgi_test.kasko_policy_beneficiaries: ~5 rows (approximately)
DELETE FROM `kasko_policy_beneficiaries`;
/*!40000 ALTER TABLE `kasko_policy_beneficiaries` DISABLE KEYS */;
INSERT INTO `kasko_policy_beneficiaries` (`id`, `policy_beneficiary_id`, `kasko_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 4, 13, NULL, NULL, NULL),
	(2, 6, 14, NULL, NULL, NULL),
	(3, 2, 15, NULL, NULL, NULL),
	(4, 7, 20, NULL, NULL, NULL),
	(5, 8, 21, NULL, NULL, NULL);
/*!40000 ALTER TABLE `kasko_policy_beneficiaries` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.kasko_policy_holders
CREATE TABLE IF NOT EXISTS `kasko_policy_holders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `policy_holders_id` int(11) unsigned NOT NULL,
  `kasko_id` int(11) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi_test.kasko_policy_holders: ~6 rows (approximately)
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

-- Dumping structure for table ddgi_test.kasko_policy_informations
CREATE TABLE IF NOT EXISTS `kasko_policy_informations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `polis_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `polis_god_vupyska` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `polis_date_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `polis_date_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `polis_marka` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `polis_model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `polis_gos_nomer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `polis_nomer_tex_passporta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `polis_nomer_dvigatelya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `polis_nomer_kuzova` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `polis_gruzopodoemnost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `polis_strah_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `polis_strah_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `polis_strah_premia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mark_model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `series_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insurance_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_terror_attacks_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_terror_attacks_currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_terror_attacks_insured_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_terror_attacks_insured_currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coverage_evacuation_cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coverage_evacuation_currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_insurance_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `one_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `one_premia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `one_franshiza` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tho_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_preim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver_one_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver_total_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver_preim_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passenger_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passenger_one_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passenger_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passenger_total_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `limit_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `limit_one_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `limit_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `limit_total_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `limit_preim_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_liability_limit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_liability_limit_currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_date` date NOT NULL,
  `policy_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `overall_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_series_id` int(11) NOT NULL,
  `policy_agent_id` int(11) NOT NULL,
  `kasko_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.kasko_policy_informations: ~0 rows (approximately)
DELETE FROM `kasko_policy_informations`;
/*!40000 ALTER TABLE `kasko_policy_informations` DISABLE KEYS */;
/*!40000 ALTER TABLE `kasko_policy_informations` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.klass
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi_test.klass: ~5 rows (approximately)
DELETE FROM `klass`;
/*!40000 ALTER TABLE `klass` DISABLE KEYS */;
INSERT INTO `klass` (`id`, `group_id`, `code`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, '01', 'Страхование наземных транспортных средств', 'Class 1 has been created just for test', '2021-01-21 09:56:18', '2021-01-21 09:56:18', NULL),
	(2, 1, '02', 'name', 'descr', NULL, NULL, NULL),
	(3, 1, '03', 'СМР класс', 'desc', NULL, NULL, NULL),
	(4, 1, '04', 'Ответственность подрядчика класс', 'Описание', NULL, NULL, NULL),
	(5, 1, '05', 'Таможенный платеж класс', 'Описание', NULL, NULL, NULL);
/*!40000 ALTER TABLE `klass` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.lising_product
CREATE TABLE IF NOT EXISTS `lising_product` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_type_radio` text COLLATE utf8mb4_unicode_ci,
  `fio_insurer` text COLLATE utf8mb4_unicode_ci,
  `address_insurer` text COLLATE utf8mb4_unicode_ci,
  `tel_insurer` text COLLATE utf8mb4_unicode_ci,
  `address_schet` text COLLATE utf8mb4_unicode_ci,
  `inn_insurer` text COLLATE utf8mb4_unicode_ci,
  `mfo_insurer` text COLLATE utf8mb4_unicode_ci,
  `bank_insurer` text COLLATE utf8mb4_unicode_ci,
  `okonh_insurer` text COLLATE utf8mb4_unicode_ci,
  `fio_beneficiary` text COLLATE utf8mb4_unicode_ci,
  `address_beneficiary` text COLLATE utf8mb4_unicode_ci,
  `tel_beneficiary` text COLLATE utf8mb4_unicode_ci,
  `beneficiary_schet` text COLLATE utf8mb4_unicode_ci,
  `inn_beneficiary` text COLLATE utf8mb4_unicode_ci,
  `mfo_beneficiary` text COLLATE utf8mb4_unicode_ci,
  `bank_beneficiary` text COLLATE utf8mb4_unicode_ci,
  `okonh_beneficiary` text COLLATE utf8mb4_unicode_ci,
  `dogovor_lizing_num` text COLLATE utf8mb4_unicode_ci,
  `insurance_from` date DEFAULT NULL,
  `insurance_to` date DEFAULT NULL,
  `geo_zone` text COLLATE utf8mb4_unicode_ci,
  `polis_series_0` text COLLATE utf8mb4_unicode_ci,
  `polis_mark_0` text COLLATE utf8mb4_unicode_ci,
  `polis_model_0` text COLLATE utf8mb4_unicode_ci,
  `polis_modification_0` text COLLATE utf8mb4_unicode_ci,
  `polis_gos_num_0` text COLLATE utf8mb4_unicode_ci,
  `polis_teh_passport_0` text COLLATE utf8mb4_unicode_ci,
  `polis_num_engine_0` text COLLATE utf8mb4_unicode_ci,
  `polis_num_body_0` text COLLATE utf8mb4_unicode_ci,
  `polis_payload_0` text COLLATE utf8mb4_unicode_ci,
  `polis_places_0` text COLLATE utf8mb4_unicode_ci,
  `overall_polis_sum_0` text COLLATE utf8mb4_unicode_ci,
  `polis_premium_0` text COLLATE utf8mb4_unicode_ci,
  `mark_model` text COLLATE utf8mb4_unicode_ci,
  `name` text COLLATE utf8mb4_unicode_ci,
  `series_number` text COLLATE utf8mb4_unicode_ci,
  `insurance_sum` text COLLATE utf8mb4_unicode_ci,
  `total` text COLLATE utf8mb4_unicode_ci,
  `cover_terror_attacks_sum` text COLLATE utf8mb4_unicode_ci,
  `cover_terror_attacks_currency` text COLLATE utf8mb4_unicode_ci,
  `cover_terror_attacks_insured_sum` text COLLATE utf8mb4_unicode_ci,
  `cover_terror_attacks_insured_currency` text COLLATE utf8mb4_unicode_ci,
  `coverage_evacuation_cost` text COLLATE utf8mb4_unicode_ci,
  `coverage_evacuation_currency` text COLLATE utf8mb4_unicode_ci,
  `strtahovka_0` text COLLATE utf8mb4_unicode_ci,
  `other_insurance_info` text COLLATE utf8mb4_unicode_ci,
  `vehicle_damage` text COLLATE utf8mb4_unicode_ci,
  `one_sum` text COLLATE utf8mb4_unicode_ci,
  `one_premia` text COLLATE utf8mb4_unicode_ci,
  `one_franshiza` text COLLATE utf8mb4_unicode_ci,
  `civil_liability` text COLLATE utf8mb4_unicode_ci,
  `tho_sum` text COLLATE utf8mb4_unicode_ci,
  `two_preim` text COLLATE utf8mb4_unicode_ci,
  `accidents` text COLLATE utf8mb4_unicode_ci,
  `driver_quantity` text COLLATE utf8mb4_unicode_ci,
  `driver_one_sum` text COLLATE utf8mb4_unicode_ci,
  `driver_currency` text COLLATE utf8mb4_unicode_ci,
  `driver_total_sum` text COLLATE utf8mb4_unicode_ci,
  `driver_preim_sum` text COLLATE utf8mb4_unicode_ci,
  `passenger_quantity` text COLLATE utf8mb4_unicode_ci,
  `passenger_one_sum` text COLLATE utf8mb4_unicode_ci,
  `passenger_currency` text COLLATE utf8mb4_unicode_ci,
  `passenger_total_sum` text COLLATE utf8mb4_unicode_ci,
  `passenger_preim_sum` text COLLATE utf8mb4_unicode_ci,
  `limit_quantity` text COLLATE utf8mb4_unicode_ci,
  `limit_one_sum` text COLLATE utf8mb4_unicode_ci,
  `limit_currency` text COLLATE utf8mb4_unicode_ci,
  `limit_total_sum` text COLLATE utf8mb4_unicode_ci,
  `limit_preim_sum` text COLLATE utf8mb4_unicode_ci,
  `total_liability_limit_0` text COLLATE utf8mb4_unicode_ci,
  `total_liability_limit_currency_0` text COLLATE utf8mb4_unicode_ci,
  `policy` text COLLATE utf8mb4_unicode_ci,
  `from_date` date DEFAULT NULL,
  `agent` text COLLATE utf8mb4_unicode_ci,
  `payment` text COLLATE utf8mb4_unicode_ci,
  `payment_order` text COLLATE utf8mb4_unicode_ci,
  `insurance_premium_currency` text COLLATE utf8mb4_unicode_ci,
  `payment_term` text COLLATE utf8mb4_unicode_ci,
  `payment_sum_0_0` text COLLATE utf8mb4_unicode_ci,
  `payment_from_0_0` text COLLATE utf8mb4_unicode_ci,
  `polis_series` text COLLATE utf8mb4_unicode_ci,
  `litso` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.lising_product: ~0 rows (approximately)
DELETE FROM `lising_product`;
/*!40000 ALTER TABLE `lising_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `lising_product` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.managers
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

-- Dumping data for table ddgi_test.managers: ~0 rows (approximately)
DELETE FROM `managers`;
/*!40000 ALTER TABLE `managers` DISABLE KEYS */;
/*!40000 ALTER TABLE `managers` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.migrations: ~55 rows (approximately)
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
	(9, '2016_06_01_000005_create_oauth_personal_access_clients_table', 3),
	(10, '2021_02_25_034415_create_bonded_table', 4),
	(11, '2021_02_26_041906_create_bonded_policy_informations_table', 4),
	(12, '2021_03_05_141851_create_lising_product_table', 5),
	(13, '2021_03_06_093314_create_property_lising_zalog_table', 5),
	(14, '2021_03_15_180000_create_credit_nepogashens_table', 5),
	(15, '2021_03_16_163407_create_zaemshiks_table', 5),
	(16, '2021_03_16_201246_create_credit_fin_risk_nepogashen_avtocredits_table', 5),
	(17, '2021_03_17_153120_add_policy_holders_ogrn', 5),
	(18, '2021_03_17_161026_create_otvetstvennost_podryadchiks_table', 5),
	(19, '2021_03_17_165903_create_otvetstvennost_podryadchik_strah_premiyas_table', 5),
	(20, '2021_03_17_183423_create_credit_fin_risk_nepogashen_credits_table', 5),
	(21, '2021_03_18_161244_edit_policy_beneficiaries_table', 5),
	(22, '2021_03_18_161306_create_dobrovolka_teztools_table', 5),
	(23, '2021_03_19_154950_create_tamozhnya_add_legals_table', 5),
	(24, '2021_03_19_161618_create_tamozhnya_add_legal_strah_premiyas_table', 5),
	(25, '2021_03_19_161806_create_dobrovolka_avto_table', 5),
	(26, '2021_03_19_173007_create_dobrovolka_avto_poryadok_oplaty_table', 5),
	(27, '2021_03_19_174250_create_dobrovolka_avto_info_table', 5),
	(28, '2021_03_19_183829_create_tamozhnya_adds_table', 5),
	(29, '2021_03_19_184019_create_tamozhnya_add_strah_premiyas_table', 5),
	(30, '2021_03_11_220938_create_product3777s_table', 6),
	(31, '2021_03_15_171358_create_borrower_sportsmen_table', 6),
	(32, '2021_03_15_203028_create_borrower_sportsman_infos_table', 6),
	(33, '2021_03_17_190347_create_borrower_sportsman_others_table', 6),
	(34, '2021_03_23_140405_create_audit_infos_table', 7),
	(35, '2021_03_24_092850_create_audit_turnovers_table', 7),
	(36, '2021_03_24_191054_create_currency_terms_table', 7),
	(37, '2021_03_25_194857_create_otvetsvennost_audits_table', 8),
	(38, '2021_03_26_113024_create_otvetstvennost_natarius_info_table', 8),
	(39, '2021_03_27_111032_create_otvetstvennost_otsenshiki_table', 8),
	(40, '2021_03_27_121227_create_otvetstvennost_otsenshiki_info_table', 8),
	(41, '2021_03_27_124901_create_otvetstvennost_natarius_grey_table', 8),
	(42, '2021_03_27_125631_create_otvetstvennost_realtors_table', 8),
	(43, '2021_03_27_130926_create_otvetstvennost_natarius_table', 8),
	(44, '2021_03_27_152349_create_notary_payment_term_table', 8),
	(45, '2021_03_28_071118_create_cargo_infos_table', 8),
	(46, '2021_03_28_083414_create_accompanying_people_table', 8),
	(47, '2021_03_28_083440_create_cargo_payment_terms_table', 8),
	(48, '2021_03_28_105718_create_otvetstvennost_realtor_infos_table', 8),
	(49, '2021_03_28_121440_create_otvetstvennost_realtor_strah_premiyas_table', 8),
	(50, '2021_03_28_143738_create_kasko_table', 8),
	(51, '2021_03_28_145956_create_kasko_policy_informations_table', 8),
	(52, '2021_03_29_154948_create_kasco_strah_premiya_table', 8),
	(53, '2021_04_01_091645_create_neshchastka_borrowers_table', 8),
	(54, '2021_04_01_104753_create_currency_terms_transhes_table', 8),
	(55, '2021_04_03_180636_create_request_overviews_table', 8);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.model_has_permissions: ~1 rows (approximately)
DELETE FROM `model_has_permissions`;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\User', 3);
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.model_has_roles: ~0 rows (approximately)
DELETE FROM `model_has_roles`;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.neshchastka_borrowers
CREATE TABLE IF NOT EXISTS `neshchastka_borrowers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `policy_holder_id` bigint(20) unsigned NOT NULL,
  `policy_beneficiaries_id` bigint(20) unsigned NOT NULL,
  `fio_insured` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_insured` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel_insured` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_series_insured` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_num_insured` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credit_contract` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credit_contract_to` date DEFAULT NULL,
  `insurance_from` date DEFAULT NULL,
  `insurance_to` date DEFAULT NULL,
  `tariff` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percent_of_tariff` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insurance_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insurance_bonus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `franchise` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insurance_premium_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_term` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `way_of_calculation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_sum_main` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_from_main` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_series` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_insurance_from` date DEFAULT NULL,
  `person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `application_form_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.neshchastka_borrowers: ~0 rows (approximately)
DELETE FROM `neshchastka_borrowers`;
/*!40000 ALTER TABLE `neshchastka_borrowers` DISABLE KEYS */;
/*!40000 ALTER TABLE `neshchastka_borrowers` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.notary_payment_term
CREATE TABLE IF NOT EXISTS `notary_payment_term` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `payment_sum` text COLLATE utf8mb4_unicode_ci,
  `payment_from` text COLLATE utf8mb4_unicode_ci,
  `notary_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notary_payment_term_notary_id_foreign` (`notary_id`),
  CONSTRAINT `notary_payment_term_notary_id_foreign` FOREIGN KEY (`notary_id`) REFERENCES `otvetstvennost_natarius` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.notary_payment_term: ~0 rows (approximately)
DELETE FROM `notary_payment_term`;
/*!40000 ALTER TABLE `notary_payment_term` DISABLE KEYS */;
/*!40000 ALTER TABLE `notary_payment_term` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.oauth_access_tokens
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

-- Dumping data for table ddgi_test.oauth_access_tokens: ~4 rows (approximately)
DELETE FROM `oauth_access_tokens`;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
	('029d24cfbd7a254cb9e930bc7e7c779c061bf351b61ee93ad95ab665ac21e75272396c80d69eefd6', 3, 1, 'MyApp', '[]', 1, '2021-02-24 02:10:39', '2021-02-24 02:10:39', '2022-02-24 02:10:39'),
	('1057116abbbfcdfe8650b5b11162838249ba9dce3fdf79800a0b7e84ba960a69e6498662a8a4955d', 3, 1, 'MyApp', '[]', 0, '2021-02-24 07:44:59', '2021-02-24 07:44:59', '2022-02-24 07:44:59'),
	('8dd1ecbeee3f449c9e9e13827a73ae8ed733a18ebfded0bccf76cd13dcb6667b41438138c5edef7b', 3, 1, 'MyApp', '[]', 1, '2021-02-24 02:43:10', '2021-02-24 02:43:10', '2022-02-24 02:43:10'),
	('e272069d3e74f4eb6cb253c8171f4b1ec835b742f3804a4db51e16e430ffff6d2a8267cb9e8fb980', 3, 1, 'MyApp', '[]', 0, '2021-02-24 02:35:53', '2021-02-24 02:35:53', '2022-02-24 02:35:53');
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.oauth_auth_codes
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

-- Dumping data for table ddgi_test.oauth_auth_codes: ~0 rows (approximately)
DELETE FROM `oauth_auth_codes`;
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.oauth_clients
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

-- Dumping data for table ddgi_test.oauth_clients: ~2 rows (approximately)
DELETE FROM `oauth_clients`;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
	(1, NULL, 'Laravel Personal Access Client', 'A1kLwsS888H9z1xr3WJnCEzn8lGbs3Tc6c3EZFXu', NULL, 'http://localhost', 1, 0, 0, '2021-02-24 02:07:59', '2021-02-24 02:07:59'),
	(2, NULL, 'Laravel Password Grant Client', '6G3UGpjGLSmvosoMQw4p46TM75t7rAmktKhIZTGe', 'users', 'http://localhost', 0, 1, 0, '2021-02-24 02:07:59', '2021-02-24 02:07:59');
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.oauth_personal_access_clients
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.oauth_personal_access_clients: ~1 rows (approximately)
DELETE FROM `oauth_personal_access_clients`;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
	(1, 1, '2021-02-24 02:07:59', '2021-02-24 02:07:59');
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.oauth_refresh_tokens
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.oauth_refresh_tokens: ~0 rows (approximately)
DELETE FROM `oauth_refresh_tokens`;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.otvetstvennost_brokers
CREATE TABLE IF NOT EXISTS `otvetstvennost_brokers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `informaciya_o_personale` text COLLATE utf8mb4_unicode_ci,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `geo_zone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_term` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currencies` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `strahovaya_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strahovaya_purpose` text COLLATE utf8mb4_unicode_ci,
  `serial_number_policy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_issue_policy` date DEFAULT NULL,
  `otvet_litso` int(11) NOT NULL,
  `policy_holder_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table ddgi_test.otvetstvennost_brokers: ~0 rows (approximately)
DELETE FROM `otvetstvennost_brokers`;
/*!40000 ALTER TABLE `otvetstvennost_brokers` DISABLE KEYS */;
/*!40000 ALTER TABLE `otvetstvennost_brokers` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.otvetstvennost_natarius
CREATE TABLE IF NOT EXISTS `otvetstvennost_natarius` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `info_personal` text COLLATE utf8mb4_unicode_ci,
  `insurance_from` date DEFAULT NULL,
  `insurance_to` date DEFAULT NULL,
  `geo_zone` text COLLATE utf8mb4_unicode_ci,
  `year` json DEFAULT NULL,
  `turnover` json DEFAULT NULL,
  `earnings` json DEFAULT NULL,
  `activity_period_from` date DEFAULT NULL,
  `activity_period_to` date DEFAULT NULL,
  `acted` tinyint(1) DEFAULT NULL,
  `public_sector_comment` text COLLATE utf8mb4_unicode_ci,
  `private_sector_comment` text COLLATE utf8mb4_unicode_ci,
  `riski` text COLLATE utf8mb4_unicode_ci,
  `other_insurance_0` text COLLATE utf8mb4_unicode_ci,
  `reason_case` text COLLATE utf8mb4_unicode_ci,
  `administrative_case` tinyint(1) DEFAULT NULL,
  `reason_administrative_case` text COLLATE utf8mb4_unicode_ci,
  `sphereOfActivity` text COLLATE utf8mb4_unicode_ci,
  `profInsuranceServices` text COLLATE utf8mb4_unicode_ci,
  `retransferAktFile` text COLLATE utf8mb4_unicode_ci,
  `wallet` text COLLATE utf8mb4_unicode_ci,
  `sum_insured` text COLLATE utf8mb4_unicode_ci,
  `franchise` text COLLATE utf8mb4_unicode_ci,
  `insurance_premium` text COLLATE utf8mb4_unicode_ci,
  `polis_series` text COLLATE utf8mb4_unicode_ci,
  `insurance_policy_from` text COLLATE utf8mb4_unicode_ci,
  `anketaFile` text COLLATE utf8mb4_unicode_ci,
  `dogovorFile` text COLLATE utf8mb4_unicode_ci,
  `polisFile` text COLLATE utf8mb4_unicode_ci,
  `litso` text COLLATE utf8mb4_unicode_ci,
  `payment_term` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.otvetstvennost_natarius: ~0 rows (approximately)
DELETE FROM `otvetstvennost_natarius`;
/*!40000 ALTER TABLE `otvetstvennost_natarius` DISABLE KEYS */;
/*!40000 ALTER TABLE `otvetstvennost_natarius` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.otvetstvennost_natarius_grey
CREATE TABLE IF NOT EXISTS `otvetstvennost_natarius_grey` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `number` text COLLATE utf8mb4_unicode_ci,
  `director` text COLLATE utf8mb4_unicode_ci,
  `qualified` text COLLATE utf8mb4_unicode_ci,
  `other` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.otvetstvennost_natarius_grey: ~0 rows (approximately)
DELETE FROM `otvetstvennost_natarius_grey`;
/*!40000 ALTER TABLE `otvetstvennost_natarius_grey` DISABLE KEYS */;
/*!40000 ALTER TABLE `otvetstvennost_natarius_grey` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.otvetstvennost_natarius_info
CREATE TABLE IF NOT EXISTS `otvetstvennost_natarius_info` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `period_polis` text COLLATE utf8mb4_unicode_ci,
  `polis_id` text COLLATE utf8mb4_unicode_ci,
  `validity_period_from` date DEFAULT NULL,
  `validity_period_to` date DEFAULT NULL,
  `polis_agent` text COLLATE utf8mb4_unicode_ci,
  `polis_mark` text COLLATE utf8mb4_unicode_ci,
  `specialty` text COLLATE utf8mb4_unicode_ci,
  `workExp` text COLLATE utf8mb4_unicode_ci,
  `polis_model` text COLLATE utf8mb4_unicode_ci,
  `polis_modification` text COLLATE utf8mb4_unicode_ci,
  `polis_gos_num` text COLLATE utf8mb4_unicode_ci,
  `polis_teh_passport` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.otvetstvennost_natarius_info: ~0 rows (approximately)
DELETE FROM `otvetstvennost_natarius_info`;
/*!40000 ALTER TABLE `otvetstvennost_natarius_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `otvetstvennost_natarius_info` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.otvetstvennost_otsenshiki
CREATE TABLE IF NOT EXISTS `otvetstvennost_otsenshiki` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `info_personal` text COLLATE utf8mb4_unicode_ci,
  `insurance_from` date NOT NULL,
  `insurance_to` date NOT NULL,
  `geo_zone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_turnover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_turnover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_turnover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_profit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_profit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_profit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sfera_deyatelnosti` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `limit_otvetstvennosti` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `documents` text COLLATE utf8mb4_unicode_ci,
  `insurance_premium_currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poryadok_oplaty_premii` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strahovaya_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `strahovaya_purpose` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `franshiza` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_number_policy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_issue_policy` date NOT NULL,
  `otvet_litso` int(11) NOT NULL,
  `anketa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dogovor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `polis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `public_sector_comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `private_sector_comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason_case` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason_administrative_case` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_holder_id` int(11) NOT NULL,
  `prof_riski` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.otvetstvennost_otsenshiki: ~0 rows (approximately)
DELETE FROM `otvetstvennost_otsenshiki`;
/*!40000 ALTER TABLE `otvetstvennost_otsenshiki` DISABLE KEYS */;
/*!40000 ALTER TABLE `otvetstvennost_otsenshiki` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.otvetstvennost_otsenshiki_info
CREATE TABLE IF NOT EXISTS `otvetstvennost_otsenshiki_info` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `insurer_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insurer_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insurer_premium` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_stay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insurer_fio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_date_polis` date NOT NULL,
  `to_date_polis` date NOT NULL,
  `otvetstvennost_otsenshiki_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `policy_series_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.otvetstvennost_otsenshiki_info: ~0 rows (approximately)
DELETE FROM `otvetstvennost_otsenshiki_info`;
/*!40000 ALTER TABLE `otvetstvennost_otsenshiki_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `otvetstvennost_otsenshiki_info` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.otvetstvennost_otsenshiki_strah_premiyas
CREATE TABLE IF NOT EXISTS `otvetstvennost_otsenshiki_strah_premiyas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `prem_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prem_from` date NOT NULL,
  `otvetstvennost_otsenshiki_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.otvetstvennost_otsenshiki_strah_premiyas: ~0 rows (approximately)
DELETE FROM `otvetstvennost_otsenshiki_strah_premiyas`;
/*!40000 ALTER TABLE `otvetstvennost_otsenshiki_strah_premiyas` DISABLE KEYS */;
/*!40000 ALTER TABLE `otvetstvennost_otsenshiki_strah_premiyas` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.otvetstvennost_podryadchiks
CREATE TABLE IF NOT EXISTS `otvetstvennost_podryadchiks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT 'тип юр.= 1; физ = 0',
  `informaciya_o_personale` text COLLATE utf8mb4_unicode_ci,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `geo_zone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unique_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_term` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currencies` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `strahovaya_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial_number_policy` int(11) unsigned DEFAULT NULL,
  `strahovaya_purpose` text COLLATE utf8mb4_unicode_ci,
  `policy_id` int(11) unsigned DEFAULT NULL,
  `product_id` int(11) unsigned DEFAULT NULL,
  `insurance_premium_payment_type` int(11) unsigned DEFAULT NULL,
  `date_issue_policy` date DEFAULT NULL,
  `otvet_litso` int(11) NOT NULL,
  `policy_holder_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `otvetstvennost_podryadchiks_otvet_litso_index` (`otvet_litso`),
  KEY `otvetstvennost_podryadchiks_policy_holder_id_index` (`policy_holder_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.otvetstvennost_podryadchiks: ~1 rows (approximately)
DELETE FROM `otvetstvennost_podryadchiks`;
/*!40000 ALTER TABLE `otvetstvennost_podryadchiks` DISABLE KEYS */;
INSERT INTO `otvetstvennost_podryadchiks` (`id`, `type`, `informaciya_o_personale`, `from_date`, `to_date`, `geo_zone`, `unique_number`, `payment_term`, `currencies`, `strahovaya_sum`, `serial_number_policy`, `strahovaya_purpose`, `policy_id`, `product_id`, `insurance_premium_payment_type`, `date_issue_policy`, `otvet_litso`, `policy_holder_id`, `created_at`, `updated_at`) VALUES
	(3, 0, 'Информация о персонале', '2021-03-01', '2021-04-09', 'Географическая зона:', '0100/0404/1/2100003', 'other', 'UZS', '234234', 1, '345', 8, 4, 1, '2021-03-23', 4, 42, '2021-03-24 03:57:26', '2021-03-24 04:01:45');
/*!40000 ALTER TABLE `otvetstvennost_podryadchiks` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.otvetstvennost_podryadchik_strah_premiyas
CREATE TABLE IF NOT EXISTS `otvetstvennost_podryadchik_strah_premiyas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `prem_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prem_from` date NOT NULL,
  `otvetstvennost_podryadchik_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.otvetstvennost_podryadchik_strah_premiyas: ~2 rows (approximately)
DELETE FROM `otvetstvennost_podryadchik_strah_premiyas`;
/*!40000 ALTER TABLE `otvetstvennost_podryadchik_strah_premiyas` DISABLE KEYS */;
INSERT INTO `otvetstvennost_podryadchik_strah_premiyas` (`id`, `prem_sum`, `prem_from`, `otvetstvennost_podryadchik_id`, `created_at`, `updated_at`) VALUES
	(1, '234242', '2021-03-17', 1, '2021-03-24 03:20:17', '2021-03-24 03:20:17'),
	(2, '234242', '2021-03-17', 3, '2021-03-24 03:57:26', '2021-03-24 03:57:26');
/*!40000 ALTER TABLE `otvetstvennost_podryadchik_strah_premiyas` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.otvetstvennost_realtors
CREATE TABLE IF NOT EXISTS `otvetstvennost_realtors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `info_personal` text COLLATE utf8mb4_unicode_ci,
  `insurance_from` date NOT NULL,
  `insurance_to` date NOT NULL,
  `geo_zone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_turnover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_turnover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_turnover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_profit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_profit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_profit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sfera_deyatelnosti` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `limit_otvetstvennosti` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `documents` text COLLATE utf8mb4_unicode_ci,
  `insurance_premium_currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poryadok_oplaty_premii` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strahovaya_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strahovaya_purpose` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `franshiza` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial_number_policy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_issue_policy` date NOT NULL,
  `otvet_litso` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `activity_period_from` date DEFAULT NULL,
  `activity_period_to` date DEFAULT NULL,
  `activity_period_all` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acted` tinyint(1) NOT NULL DEFAULT '0',
  `public_sector_comment` text COLLATE utf8mb4_unicode_ci,
  `private_sector_comment` text COLLATE utf8mb4_unicode_ci,
  `cases` tinyint(1) NOT NULL DEFAULT '0',
  `reason_case` text COLLATE utf8mb4_unicode_ci,
  `administrative_case` tinyint(1) NOT NULL DEFAULT '0',
  `reason_administrative_case` text COLLATE utf8mb4_unicode_ci,
  `prof_riski` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anketa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dogovor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `polis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_holder_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.otvetstvennost_realtors: ~0 rows (approximately)
DELETE FROM `otvetstvennost_realtors`;
/*!40000 ALTER TABLE `otvetstvennost_realtors` DISABLE KEYS */;
/*!40000 ALTER TABLE `otvetstvennost_realtors` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.otvetstvennost_realtor_infos
CREATE TABLE IF NOT EXISTS `otvetstvennost_realtor_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `insurer_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insurer_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insurer_premium` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_stay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insurer_fio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_date_polis` date NOT NULL,
  `to_date_polis` date NOT NULL,
  `otvetstvennost_realtor_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `policy_series_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.otvetstvennost_realtor_infos: ~0 rows (approximately)
DELETE FROM `otvetstvennost_realtor_infos`;
/*!40000 ALTER TABLE `otvetstvennost_realtor_infos` DISABLE KEYS */;
/*!40000 ALTER TABLE `otvetstvennost_realtor_infos` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.otvetstvennost_realtor_strah_premiyas
CREATE TABLE IF NOT EXISTS `otvetstvennost_realtor_strah_premiyas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `prem_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prem_from` date NOT NULL,
  `otvetstvennost_realtor_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.otvetstvennost_realtor_strah_premiyas: ~0 rows (approximately)
DELETE FROM `otvetstvennost_realtor_strah_premiyas`;
/*!40000 ALTER TABLE `otvetstvennost_realtor_strah_premiyas` DISABLE KEYS */;
/*!40000 ALTER TABLE `otvetstvennost_realtor_strah_premiyas` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.otvetsvennost_audits
CREATE TABLE IF NOT EXISTS `otvetsvennost_audits` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `policy_holder_id` bigint(20) unsigned NOT NULL,
  `audit_turnover_id` bigint(20) unsigned NOT NULL,
  `insurance_from` date DEFAULT NULL,
  `insurance_to` date DEFAULT NULL,
  `geo_zone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_period_from` date DEFAULT NULL,
  `active_period_to` date DEFAULT NULL,
  `questionnaire` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `polis_series` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `polis_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `litso` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insurance_premium_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_term` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `all_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `franchise` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insurance_bonus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_sum_main` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_from_main` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acted` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `public_sector_comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `private_sector_comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `risk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cases` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason_case` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `administrative_case` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason_administrative_case` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sphere_of_activity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prof_insurance_services` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `liability_limit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `retransfer_akt_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_polis_main` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `series_polis_main` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validity_period_from_main` date DEFAULT NULL,
  `validity_period_to_main` date DEFAULT NULL,
  `polis_agent_main` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `polis_mark_main` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialty_main` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `workExp_main` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `polis_model_main` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arriving_time_main` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost_of_insurance_main` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sum_of_insurance_main` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bonus_of_insurance_main` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `otvetsvennost_audits_audit_turnover_id_foreign` (`audit_turnover_id`),
  CONSTRAINT `otvetsvennost_audits_audit_turnover_id_foreign` FOREIGN KEY (`audit_turnover_id`) REFERENCES `audit_turnovers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.otvetsvennost_audits: ~0 rows (approximately)
DELETE FROM `otvetsvennost_audits`;
/*!40000 ALTER TABLE `otvetsvennost_audits` DISABLE KEYS */;
/*!40000 ALTER TABLE `otvetsvennost_audits` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.permissions: ~1 rows (approximately)
DELETE FROM `permissions`;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'show pretensii', 'web', NULL, NULL);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.policies
CREATE TABLE IF NOT EXISTS `policies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `number` int(11) unsigned NOT NULL,
  `act_number` varchar(50) NOT NULL,
  `policy_series_id` int(11) unsigned DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `branch_id` int(11) unsigned DEFAULT '1',
  `user_id` int(11) unsigned DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=521 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi_test.policies: ~470 rows (approximately)
DELETE FROM `policies`;
/*!40000 ALTER TABLE `policies` DISABLE KEYS */;
INSERT INTO `policies` (`id`, `number`, `act_number`, `policy_series_id`, `status`, `branch_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 141, 'asdvvd', 1, 'in_use', 2, 9, '2021-01-09 00:00:00', '2021-03-24 06:13:42', NULL),
	(2, 142, 'asdvvd', 1, 'in_use', 2, 9, '2021-01-09 00:00:00', '2021-03-03 05:13:10', NULL),
	(3, 143, 'asdvvd', 1, 'in_use', 2, 9, '2021-01-09 00:00:00', '2021-03-03 06:13:03', NULL),
	(4, 144, 'asdvvd', 1, 'in_use', 2, 9, '2021-01-09 00:00:00', '2021-03-03 06:13:29', NULL),
	(5, 145, 'asdvvd', 1, 'in_use', 2, 9, '2021-01-09 00:00:00', '2021-03-07 07:27:38', NULL),
	(6, 146, 'asdvvd', 1, 'in_use', 2, 9, '2021-01-09 00:00:00', '2021-03-07 07:35:00', NULL),
	(7, 147, 'asdvvd', 1, 'in_use', 0, 0, '2021-01-09 00:00:00', '2021-03-24 03:51:44', NULL),
	(8, 148, 'asdvvd', 1, 'in_use', 0, 0, '2021-01-09 00:00:00', '2021-03-24 03:57:26', NULL),
	(9, 149, 'asdvvd', 1, 'in_use', 0, 0, '2021-01-09 00:00:00', '2021-03-24 06:11:27', NULL),
	(10, 150, 'asdvvd', 1, 'in_use', 2, 9, '2021-01-09 00:00:00', '2021-01-09 00:00:00', NULL),
	(11, 141, 'asdvvd', 0, 'in_use', 0, 0, '2021-01-09 00:00:00', '2021-03-03 08:45:31', NULL),
	(12, 142, 'asdvvd', 0, 'in_use', 0, 0, '2021-01-09 00:00:00', '2021-03-06 09:14:43', NULL),
	(13, 143, 'asdvvd', 0, 'new', 0, 0, '2021-01-09 00:00:00', '2021-01-09 00:00:00', NULL),
	(14, 144, 'asdvvd', 0, 'new', 0, 0, '2021-01-09 00:00:00', '2021-01-09 00:00:00', NULL),
	(15, 145, 'asdvvd', 0, 'new', 0, 0, '2021-01-09 00:00:00', '2021-01-09 00:00:00', NULL),
	(16, 146, 'asdvvd', 0, 'new', 0, 0, '2021-01-09 00:00:00', '2021-01-09 00:00:00', NULL),
	(17, 147, 'asdvvd', 0, 'new', 0, 0, '2021-01-09 00:00:00', '2021-01-09 00:00:00', NULL),
	(18, 148, 'asdvvd', 0, 'new', 0, 0, '2021-01-09 00:00:00', '2021-01-09 00:00:00', NULL),
	(19, 149, 'asdvvd', 0, 'new', 0, 0, '2021-01-09 00:00:00', '2021-01-09 00:00:00', NULL),
	(20, 150, 'asdvvd', 0, 'new', 0, 0, '2021-01-09 00:00:00', '2021-03-29 03:12:54', '2021-03-29 03:12:54'),
	(71, 200, 'asdvvd', 1, 'in_use', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:26:23', NULL),
	(72, 201, 'asdvvd', 1, 'in_use', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:33:22', NULL),
	(73, 202, 'asdvvd', 1, 'in_use', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:35:15', NULL),
	(74, 203, 'asdvvd', 1, 'in_use', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:36:01', NULL),
	(75, 204, 'asdvvd', 1, 'in_use', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:36:19', NULL),
	(76, 205, 'asdvvd', 1, 'in_use', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:39:01', NULL),
	(77, 206, 'asdvvd', 1, 'in_use', 1, 0, '2021-04-01 01:18:27', '2021-04-05 03:16:33', NULL),
	(78, 207, 'asdvvd', 1, 'in_use', 1, 0, '2021-04-01 01:18:27', '2021-04-05 03:19:22', NULL),
	(79, 208, 'asdvvd', 1, 'in_use', 1, 0, '2021-04-01 01:18:27', '2021-04-05 03:26:43', NULL),
	(80, 209, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(81, 210, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(82, 211, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(83, 212, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(84, 213, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(85, 214, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(86, 215, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(87, 216, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(88, 217, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(89, 218, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(90, 219, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(91, 220, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(92, 221, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(93, 222, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(94, 223, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(95, 224, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(96, 225, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(97, 226, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(98, 227, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(99, 228, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(100, 229, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(101, 230, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(102, 231, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(103, 232, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(104, 233, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(105, 234, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(106, 235, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(107, 236, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(108, 237, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(109, 238, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(110, 239, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(111, 240, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(112, 241, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(113, 242, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(114, 243, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(115, 244, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(116, 245, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(117, 246, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(118, 247, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(119, 248, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(120, 249, 'asdvvd', 1, 'new', 1, 0, '2021-04-01 01:18:27', '2021-04-01 01:18:27', NULL),
	(121, 800, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:39', '2021-04-04 00:37:39', NULL),
	(122, 801, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:39', '2021-04-04 00:37:39', NULL),
	(123, 802, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:39', '2021-04-04 00:37:39', NULL),
	(124, 803, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:39', '2021-04-04 00:37:39', NULL),
	(125, 804, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:39', '2021-04-04 00:37:39', NULL),
	(126, 805, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:39', '2021-04-04 00:37:39', NULL),
	(127, 806, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(128, 807, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(129, 808, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(130, 809, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(131, 810, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(132, 811, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(133, 812, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(134, 813, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(135, 814, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(136, 815, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(137, 816, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(138, 817, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(139, 818, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(140, 819, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(141, 820, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(142, 821, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(143, 822, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(144, 823, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(145, 824, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(146, 825, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(147, 826, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(148, 827, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(149, 828, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(150, 829, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(151, 830, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(152, 831, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(153, 832, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(154, 833, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(155, 834, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(156, 835, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(157, 836, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(158, 837, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(159, 838, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(160, 839, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(161, 840, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(162, 841, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(163, 842, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(164, 843, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(165, 844, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(166, 845, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(167, 846, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(168, 847, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(169, 848, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(170, 849, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(171, 850, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(172, 851, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(173, 852, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(174, 853, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(175, 854, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(176, 855, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(177, 856, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(178, 857, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(179, 858, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(180, 859, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(181, 860, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(182, 861, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(183, 862, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(184, 863, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(185, 864, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(186, 865, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(187, 866, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(188, 867, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(189, 868, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(190, 869, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(191, 870, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(192, 871, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(193, 872, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(194, 873, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(195, 874, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(196, 875, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(197, 876, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(198, 877, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(199, 878, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(200, 879, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(201, 880, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(202, 881, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(203, 882, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(204, 883, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(205, 884, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(206, 885, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(207, 886, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(208, 887, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(209, 888, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(210, 889, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(211, 890, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(212, 891, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(213, 892, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(214, 893, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(215, 894, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(216, 895, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(217, 896, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(218, 897, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(219, 898, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(220, 899, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:37:40', '2021-04-04 00:37:40', NULL),
	(221, 800, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(222, 801, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(223, 802, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(224, 803, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(225, 804, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(226, 805, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(227, 806, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(228, 807, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(229, 808, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(230, 809, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(231, 810, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(232, 811, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(233, 812, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(234, 813, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(235, 814, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(236, 815, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(237, 816, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(238, 817, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(239, 818, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(240, 819, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(241, 820, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(242, 821, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(243, 822, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(244, 823, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(245, 824, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(246, 825, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(247, 826, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(248, 827, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(249, 828, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(250, 829, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(251, 830, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(252, 831, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(253, 832, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(254, 833, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(255, 834, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(256, 835, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(257, 836, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(258, 837, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(259, 838, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(260, 839, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(261, 840, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(262, 841, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(263, 842, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(264, 843, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(265, 844, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(266, 845, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(267, 846, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(268, 847, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(269, 848, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(270, 849, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(271, 850, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(272, 851, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(273, 852, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(274, 853, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(275, 854, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(276, 855, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(277, 856, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(278, 857, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(279, 858, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(280, 859, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(281, 860, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(282, 861, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(283, 862, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(284, 863, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(285, 864, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(286, 865, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(287, 866, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(288, 867, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(289, 868, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(290, 869, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(291, 870, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(292, 871, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(293, 872, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(294, 873, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(295, 874, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(296, 875, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(297, 876, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(298, 877, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(299, 878, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(300, 879, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(301, 880, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(302, 881, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(303, 882, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(304, 883, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(305, 884, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(306, 885, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(307, 886, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(308, 887, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(309, 888, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(310, 889, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(311, 890, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(312, 891, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(313, 892, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(314, 893, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(315, 894, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(316, 895, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(317, 896, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(318, 897, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(319, 898, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(320, 899, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:38:06', '2021-04-04 00:38:06', NULL),
	(321, 900, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(322, 901, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(323, 902, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(324, 903, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(325, 904, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(326, 905, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(327, 906, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(328, 907, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(329, 908, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(330, 909, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(331, 910, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(332, 911, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(333, 912, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(334, 913, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(335, 914, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(336, 915, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(337, 916, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(338, 917, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(339, 918, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(340, 919, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(341, 920, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(342, 921, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(343, 922, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(344, 923, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(345, 924, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(346, 925, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(347, 926, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(348, 927, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(349, 928, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(350, 929, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(351, 930, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(352, 931, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(353, 932, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(354, 933, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(355, 934, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(356, 935, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(357, 936, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(358, 937, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(359, 938, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(360, 939, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(361, 940, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:56', '2021-04-04 00:41:56', NULL),
	(362, 941, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(363, 942, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(364, 943, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(365, 944, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(366, 945, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(367, 946, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(368, 947, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(369, 948, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(370, 949, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(371, 950, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(372, 951, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(373, 952, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(374, 953, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(375, 954, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(376, 955, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(377, 956, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(378, 957, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(379, 958, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(380, 959, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(381, 960, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(382, 961, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(383, 962, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(384, 963, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(385, 964, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(386, 965, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(387, 966, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(388, 967, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(389, 968, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(390, 969, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(391, 970, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(392, 971, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(393, 972, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(394, 973, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(395, 974, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(396, 975, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(397, 976, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(398, 977, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(399, 978, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(400, 979, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(401, 980, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(402, 981, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(403, 982, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(404, 983, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(405, 984, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(406, 985, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(407, 986, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(408, 987, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(409, 988, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(410, 989, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(411, 990, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(412, 991, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(413, 992, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(414, 993, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(415, 994, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(416, 995, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(417, 996, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(418, 997, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(419, 998, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(420, 999, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:41:57', '2021-04-04 00:41:57', NULL),
	(421, 900, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(422, 901, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(423, 902, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(424, 903, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(425, 904, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(426, 905, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(427, 906, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(428, 907, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(429, 908, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(430, 909, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(431, 910, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(432, 911, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(433, 912, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(434, 913, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(435, 914, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(436, 915, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(437, 916, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(438, 917, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(439, 918, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(440, 919, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(441, 920, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(442, 921, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(443, 922, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(444, 923, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(445, 924, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(446, 925, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(447, 926, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(448, 927, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(449, 928, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(450, 929, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(451, 930, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(452, 931, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(453, 932, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(454, 933, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(455, 934, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(456, 935, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(457, 936, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(458, 937, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(459, 938, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(460, 939, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(461, 940, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(462, 941, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(463, 942, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(464, 943, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(465, 944, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(466, 945, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(467, 946, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(468, 947, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(469, 948, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(470, 949, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(471, 950, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(472, 951, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(473, 952, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(474, 953, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(475, 954, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(476, 955, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(477, 956, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(478, 957, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(479, 958, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(480, 959, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(481, 960, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(482, 961, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(483, 962, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(484, 963, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(485, 964, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(486, 965, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(487, 966, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(488, 967, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(489, 968, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(490, 969, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(491, 970, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(492, 971, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(493, 972, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(494, 973, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(495, 974, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(496, 975, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(497, 976, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(498, 977, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(499, 978, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(500, 979, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(501, 980, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(502, 981, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(503, 982, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(504, 983, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(505, 984, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(506, 985, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(507, 986, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(508, 987, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(509, 988, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(510, 989, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(511, 990, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(512, 991, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(513, 992, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(514, 993, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(515, 994, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(516, 995, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(517, 996, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(518, 997, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(519, 998, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL),
	(520, 999, 'asdvvd', 1, 'new', 1, 0, '2021-04-04 00:42:36', '2021-04-04 00:42:36', NULL);
/*!40000 ALTER TABLE `policies` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.policies_policy_retransfer
CREATE TABLE IF NOT EXISTS `policies_policy_retransfer` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `policy_retransfer_id` int(11) unsigned NOT NULL,
  `policy_id` int(11) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table ddgi_test.policies_policy_retransfer: ~2 rows (approximately)
DELETE FROM `policies_policy_retransfer`;
/*!40000 ALTER TABLE `policies_policy_retransfer` DISABLE KEYS */;
INSERT INTO `policies_policy_retransfer` (`id`, `policy_retransfer_id`, `policy_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(17, 3, 1, NULL, NULL, NULL),
	(18, 3, 2, NULL, NULL, NULL);
/*!40000 ALTER TABLE `policies_policy_retransfer` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.policies_policy_transfer
CREATE TABLE IF NOT EXISTS `policies_policy_transfer` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `policy_transfer_id` int(11) unsigned NOT NULL,
  `policy_id` int(11) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table ddgi_test.policies_policy_transfer: ~6 rows (approximately)
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

-- Dumping structure for table ddgi_test.policy_beneficiaries
CREATE TABLE IF NOT EXISTS `policy_beneficiaries` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `FIO` varchar(250) NOT NULL,
  `address` varchar(150) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `checking_account` varchar(50) NOT NULL,
  `inn` varchar(50) NOT NULL,
  `mfo` varchar(50) NOT NULL,
  `okonx` varchar(255) DEFAULT NULL,
  `bank_id` int(11) unsigned NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `seria_passport` varchar(255) DEFAULT NULL,
  `nomer_passport` varchar(255) DEFAULT NULL,
  `oked` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='страхователи';

-- Dumping data for table ddgi_test.policy_beneficiaries: ~21 rows (approximately)
DELETE FROM `policy_beneficiaries`;
/*!40000 ALTER TABLE `policy_beneficiaries` DISABLE KEYS */;
INSERT INTO `policy_beneficiaries` (`id`, `FIO`, `address`, `phone_number`, `checking_account`, `inn`, `mfo`, `okonx`, `bank_id`, `updated_at`, `created_at`, `deleted_at`, `seria_passport`, `nomer_passport`, `oked`) VALUES
	(1, 'gbebfgb', 'dfgbfdb', 'fdgbdfgb', 'gbdfgbdf', 'gbdfgb', 'dfgbdf', 'gbdfbg', 1, '2021-01-11 00:00:00', '2021-01-11 00:00:00', NULL, NULL, NULL, NULL),
	(2, 'gbebfgb', 'dfgbfdb', 'fdgbdfgb', 'gbdfgbdf', 'gbdfgb', 'dfgbdf', 'gbdfbg', 1, '2021-01-11 00:00:00', '2021-01-11 00:00:00', NULL, NULL, NULL, NULL),
	(3, 'ФИО выгодоприобретателя', 'Юр адрес выгодоприобретателя', 'Телефон', 'Расчетный счет', 'ИНН', 'МФО', 'ОКОНХ', 1, '2021-01-11 00:00:00', '2021-01-11 00:00:00', NULL, NULL, NULL, NULL),
	(4, 'ФИО выгодоприобретателя', 'Юр адрес выгодоприобретателя', 'Телефон', 'Расчетный счет', 'ИНН', 'МФО', 'ОКОНХ', 1, '2021-01-11 00:00:00', '2021-01-11 00:00:00', NULL, NULL, NULL, NULL),
	(5, 'ФИО выгодоприобретателя', 'Юр адрес выгодоприобретателя', 'Телефон', 'Расчетный счет', 'ИНН', 'МФО', 'ОКОНХ', 1, '2021-01-11 00:00:00', '2021-01-11 00:00:00', NULL, NULL, NULL, NULL),
	(6, 'ФИО выгодоприобретателя', 'Юр адрес выгодоприобретателя', 'Телефон', 'Расчетный счет', 'ИНН', 'МФО', 'ОКОНХ', 1, '2021-01-11 00:00:00', '2021-01-11 00:00:00', NULL, NULL, NULL, NULL),
	(7, 'ФИО выгодоприобретателя', 'Юр адрес выгодоприобретателя', 'Телефон', 'Расчетный счет', 'ИНН', 'МФО', 'ОКОНХ', 1, '2021-01-11 00:00:00', '2021-01-11 00:00:00', NULL, NULL, NULL, NULL),
	(8, 'ФИО выгодоприобретателя', 'PO Box F', '5555551234', 'Расчетный счет', 'ИНН', 'МФО', 'ОКОНХ', 1, '2021-02-15 00:00:00', '2021-02-15 00:00:00', NULL, NULL, NULL, NULL),
	(9, 'sdfvsdfvdsfv', 'svdfvsdf', 'vsdfvsdf', 'vsdfvsdf', 'vsdfvsdf', 'vsdfvsdf', 'sdfvsdfv', 2, '2021-03-03 02:46:16', '2021-03-03 02:46:16', NULL, NULL, NULL, NULL),
	(10, 'sdfvsdfvdsfv', 'svdfvsdf', 'vsdfvsdf', 'vsdfvsdf', 'vsdfvsdf', 'vsdfvsdf', 'sdfvsdfv', 2, '2021-03-03 02:48:37', '2021-03-03 02:48:37', NULL, NULL, NULL, NULL),
	(11, 'sdfvsdfvdsfv', 'svdfvsdf', 'vsdfvsdf', 'vsdfvsdf', 'vsdfvsdf', 'vsdfvsdf', 'sdfvsdfv', 2, '2021-03-03 02:52:20', '2021-03-03 02:52:20', NULL, NULL, NULL, NULL),
	(12, 'sdfvsdfvdsfv', 'svdfvsdf', 'vsdfvsdf', 'vsdfvsdf', 'vsdfvsdf', 'vsdfvsdf', 'sdfvsdfv', 2, '2021-03-03 02:53:44', '2021-03-03 02:53:44', NULL, NULL, NULL, NULL),
	(13, 'sdfvsdfvdsfv', 'svdfvsdf', 'vsdfvsdf', 'vsdfvsdf', 'vsdfvsdf', 'vsdfvsdf', 'sdfvsdfv', 2, '2021-03-03 02:55:29', '2021-03-03 02:55:29', NULL, NULL, NULL, NULL),
	(14, 'sdfgsd', 'gsdgdsg', 'gsdgsdg', 'sdgsdf', 'gsdgsdg', 'dsfgsdg', 'sdfgsdfg', 2, '2021-03-03 02:58:28', '2021-03-03 02:58:28', NULL, NULL, NULL, NULL),
	(15, 'sdfgsd', 'gsdgdsg', 'gsdgsdg', 'sdgsdf', 'gsdgsdg', 'dsfgsdg', 'sdfgsdfg', 2, '2021-03-03 02:59:46', '2021-03-03 02:59:46', NULL, NULL, NULL, NULL),
	(16, 'dfvdsfvsdf', 'vsdfvdsfv', 'dsfvsdfv', 'sdfvsdfvsd', 'sdfvsdfv', 'sdfvdsfv', 'dsfvsdfv', 2, '2021-03-03 05:13:10', '2021-03-03 05:13:10', NULL, NULL, NULL, NULL),
	(17, 'dfbgdfgbdf', 'bgdfgb', 'dfgbdg', 'bdfgb', 'dfgbdf', 'gbdfgb', 'dfgbdfgbdfgb', 2, '2021-03-03 06:13:03', '2021-03-03 06:13:03', NULL, NULL, NULL, NULL),
	(18, 'ФИО выгодоприобретателя', 'bgdfgb', 'dfgbdg', 'bdfgb', 'dfgbdf', 'gbdfgb', 'dfgbdfgbdfgb', 2, '2021-03-03 06:16:20', '2021-03-03 06:13:29', NULL, NULL, NULL, NULL),
	(19, 'sdfvsdfvds', 'vfsdfvdsfv', 'vsdfvds', 'fvsdvfsd', 'sdfvsdfvsdfv', 'sdvsdfvsdfv', 'sdfvsdfvsdvf', 2, '2021-03-03 08:45:31', '2021-03-03 08:45:31', NULL, NULL, NULL, NULL),
	(20, 'sdfvsdfvdsfv', 'PO Box F', '5555551234', 'vsdfvsdf', 'vsdfvsdf', 'vsdfvsdf', 'sdfvsdfv', 2, '2021-03-06 09:14:42', '2021-03-06 09:14:42', NULL, NULL, NULL, NULL),
	(21, 'sdfvsdfvdsfv', 'PO Box F', '5555551234', 'vsdfvsdf', '23', '234', NULL, 2, '2021-03-23 15:20:25', '2021-03-23 15:20:25', NULL, NULL, NULL, '234234');
/*!40000 ALTER TABLE `policy_beneficiaries` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.policy_flows
CREATE TABLE IF NOT EXISTS `policy_flows` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `act_number` varchar(50) DEFAULT NULL,
  `act_date` date DEFAULT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `branch_id` int(11) DEFAULT NULL,
  `to_user_id` int(11) DEFAULT NULL,
  `from_user_id` int(11) DEFAULT NULL,
  `policy_series_id` int(11) DEFAULT NULL,
  `policy_from` varchar(50) DEFAULT NULL,
  `policy_to` varchar(50) DEFAULT NULL,
  `act_file` varchar(250) DEFAULT NULL,
  `transfer_given` varchar(150) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table ddgi_test.policy_flows: ~2 rows (approximately)
DELETE FROM `policy_flows`;
/*!40000 ALTER TABLE `policy_flows` DISABLE KEYS */;
INSERT INTO `policy_flows` (`id`, `act_number`, `act_date`, `status`, `branch_id`, `to_user_id`, `from_user_id`, `policy_series_id`, `policy_from`, `policy_to`, `act_file`, `transfer_given`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(4, 'asdvvd', '2021-04-16', 0, NULL, NULL, NULL, NULL, '800', '899', 'C:\\Users\\User\\AppData\\Local\\Temp\\php889E.tmp', NULL, '2021-04-04', '2021-04-04', NULL),
	(5, 'asdvvd', '2021-04-02', 0, NULL, 3, NULL, 1, '900', '999', 'document/PolicyFlow/7AGuQf9sR3LZ6wBKC2YmEDPOPVJlUt2JydMO43Kz.docx', NULL, '2021-04-04', '2021-04-04', NULL);
/*!40000 ALTER TABLE `policy_flows` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.policy_holders
CREATE TABLE IF NOT EXISTS `policy_holders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `FIO` varchar(250) NOT NULL,
  `address` varchar(150) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `checking_account` varchar(50) NOT NULL,
  `inn` varchar(50) NOT NULL,
  `mfo` varchar(50) NOT NULL,
  `okonx` varchar(255) DEFAULT NULL,
  `bank_id` int(11) unsigned NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `oked` varchar(255) DEFAULT NULL,
  `vid_deyatelnosti` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 COMMENT='страхователи';

-- Dumping data for table ddgi_test.policy_holders: ~62 rows (approximately)
DELETE FROM `policy_holders`;
/*!40000 ALTER TABLE `policy_holders` DISABLE KEYS */;
INSERT INTO `policy_holders` (`id`, `FIO`, `address`, `phone_number`, `checking_account`, `inn`, `mfo`, `okonx`, `bank_id`, `updated_at`, `created_at`, `deleted_at`, `oked`, `vid_deyatelnosti`) VALUES
	(1, 'dfgbdf', 'gbdfgbdf', 'gbdfgbf', 'dgbgdfb', 'dfgbdfbfdgb', 'dfgbdf', 'dfgb', 1, '2021-01-10 00:00:00', '2021-01-10 00:00:00', NULL, NULL, NULL),
	(2, 'dfgbdf', 'gbdfgbdf', 'gbdfgbf', 'dgbgdfb', 'dfgbdfbfdgb', 'dfgbdf', 'dfgb', 1, '2021-01-10 00:00:00', '2021-01-10 00:00:00', NULL, NULL, NULL),
	(3, 'gbebfgb', 'dfgbfdb', 'fdgbdfgb', 'gbdfgbdf', 'gbdfgb', 'dfgbdf', 'gbdfbg', 1, '2021-01-10 00:00:00', '2021-01-10 00:00:00', NULL, NULL, NULL),
	(4, 'dfgbdf', 'gbdfgbdf', 'gbdfgbf', 'dgbgdfb', 'dfgbdfbfdgb', 'dfgbdf', 'dfgb', 1, '2021-01-10 00:00:00', '2021-01-10 00:00:00', NULL, NULL, NULL),
	(5, 'gbebfgb', 'dfgbfdb', 'fdgbdfgb', 'gbdfgbdf', 'gbdfgb', 'dfgbdf', 'gbdfbg', 1, '2021-01-10 00:00:00', '2021-01-10 00:00:00', NULL, NULL, NULL),
	(6, 'dfgbdf', 'gbdfgbdf', 'gbdfgbf', 'dgbgdfb', 'dfgbdfbfdgb', 'dfgbdf', 'dfgb', 1, '2021-01-11 00:00:00', '2021-01-11 00:00:00', NULL, NULL, NULL),
	(7, 'dfgbdf', 'gbdfgbdf', 'gbdfgbf', 'dgbgdfb', 'dfgbdfbfdgb', 'dfgbdf', 'dfgb', 1, '2021-01-11 00:00:00', '2021-01-11 00:00:00', NULL, NULL, NULL),
	(8, 'ФИО страхователя', 'Юр адрес страхователя', 'Телефон', 'Расчетный счет', 'ИНН', 'МФО', 'ОКОНХ', 1, '2021-01-11 00:00:00', '2021-01-11 00:00:00', NULL, NULL, NULL),
	(9, 'ФИО страхователя', 'Юр адрес страхователя', 'Телефон', 'Расчетный счет', 'ИНН', 'МФО', 'ОКОНХ', 1, '2021-01-11 00:00:00', '2021-01-11 00:00:00', NULL, NULL, NULL),
	(10, 'ФИО страхователя', 'Юр адрес страхователя', 'Телефон', 'Расчетный счет', 'ИНН', 'МФО', 'ОКОНХ', 1, '2021-01-11 00:00:00', '2021-01-11 00:00:00', NULL, NULL, NULL),
	(11, 'ФИО страхователя', 'Юр адрес страхователя', 'Телефон', 'Расчетный счет', 'ИНН', 'МФО', 'ОКОНХ', 1, '2021-01-11 00:00:00', '2021-01-11 00:00:00', NULL, NULL, NULL),
	(12, 'ФИО страхователя', 'Юр адрес страхователя', 'Телефон', 'Расчетный счет', 'ИНН', 'МФО', 'ОКОНХ', 1, '2021-01-11 00:00:00', '2021-01-11 00:00:00', NULL, NULL, NULL),
	(13, 'ФИО страхователя', 'PO Box F', '5555551234', 'Расчетный счет', 'ИНН', 'МФО', 'ОКОНХ', 1, '2021-02-15 00:00:00', '2021-02-15 00:00:00', NULL, NULL, NULL),
	(14, 'sdvfvsvdf', 'sdfvsdvsdfv', 'sdfvsdvf', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', 'sdfvsdvf', 2, '2021-03-03 02:46:16', '2021-03-03 02:46:16', NULL, NULL, NULL),
	(15, 'sdvfvsvdf', 'sdfvsdvsdfv', 'sdfvsdvf', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', 'sdfvsdvf', 2, '2021-03-03 02:48:37', '2021-03-03 02:48:37', NULL, NULL, NULL),
	(16, 'sdvfvsvdf', 'sdfvsdvsdfv', 'sdfvsdvf', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', 'sdfvsdvf', 2, '2021-03-03 02:52:20', '2021-03-03 02:52:20', NULL, NULL, NULL),
	(17, 'sdvfvsvdf', 'sdfvsdvsdfv', 'sdfvsdvf', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', 'sdfvsdvf', 2, '2021-03-03 02:53:44', '2021-03-03 02:53:44', NULL, NULL, NULL),
	(18, 'sdvfvsvdf', 'sdfvsdvsdfv', 'sdfvsdvf', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', 'sdfvsdvf', 2, '2021-03-03 02:55:29', '2021-03-03 02:55:29', NULL, NULL, NULL),
	(19, 'rtgetr', 'ertgertgertgg', 'fsdfgsd', 'fgsdfgsd', 'gsdgsd', 'sdgsdg', 'gsdfgsdgf', 2, '2021-03-03 02:58:28', '2021-03-03 02:58:28', NULL, NULL, NULL),
	(20, 'rtgetr', 'ertgertgertgg', 'fsdfgsd', 'fgsdfgsd', 'gsdgsd', 'sdgsdg', 'gsdfgsdgf', 2, '2021-03-03 02:59:46', '2021-03-03 02:59:46', NULL, NULL, NULL),
	(21, 'sdfvsdvf', 'sdfvsdfvsd', 'sdfvdsfv', 'sdfvdsfv', 'fvsdfvsdfv', 'sdfvdsfv', 'sdfvsdv', 2, '2021-03-03 05:13:10', '2021-03-03 05:13:10', NULL, NULL, NULL),
	(22, 'dfgbg', 'dfgbdfgbdgb', 'dfgbdf', 'gbdfgb', 'dfgbdfgb', 'fdgbdf', 'dfgbdfgb', 2, '2021-03-03 06:13:03', '2021-03-03 06:13:03', NULL, NULL, NULL),
	(23, 'dfgbg', 'dfgbdfgbdgb', 'dfgbdf', 'gbdfgb', 'dfgbdfgb', 'fdgbdf', 'dfgbdfgb', 2, '2021-03-03 06:13:29', '2021-03-03 06:13:29', NULL, NULL, NULL),
	(24, 'vdfvsdfv', 'sdvsdvfds', 'vsdvdfv', 'sdfvsdvf', 'sdvfsdfv', 'sdvfsdfvdsf', 'sdfvsdfv', 2, '2021-03-03 08:45:31', '2021-03-03 08:45:31', NULL, NULL, NULL),
	(25, 'sdvfvsvdf', 'PO Box F', '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', 'sdfvsdvf', 2, '2021-03-06 09:14:42', '2021-03-06 09:14:42', NULL, NULL, NULL),
	(26, 'sdsdfvfdsv', 'sdfvsdfv', '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', 'sdfvsdvf', 2, '2021-03-07 07:05:34', '2021-03-07 07:05:34', NULL, NULL, NULL),
	(27, 'sdsdfvfdsv', 'sdfvsdfv', '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', 'sdfvsdvf', 2, '2021-03-07 07:06:12', '2021-03-07 07:06:12', NULL, NULL, NULL),
	(28, 'sdsdfvfdsv', 'sdfvsdfv', '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', 'sdfvsdvf', 2, '2021-03-07 07:07:13', '2021-03-07 07:07:13', NULL, NULL, NULL),
	(29, 'sdsdfvfdsv', 'sdfvsdfv', '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', 'sdfvsdvf', 2, '2021-03-07 07:07:46', '2021-03-07 07:07:46', NULL, NULL, NULL),
	(30, 'sdsdfvfdsv', 'sdfvsdfv', '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', 'sdfvsdvf', 2, '2021-03-07 07:08:38', '2021-03-07 07:08:38', NULL, NULL, NULL),
	(31, 'sdsdfvfdsv', 'sdfvsdfv', '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', 'sdfvsdvf', 2, '2021-03-07 07:09:54', '2021-03-07 07:09:54', NULL, NULL, NULL),
	(32, 'sdsdfvfdsv', 'sdfvsdfv', '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', 'sdfvsdvf', 2, '2021-03-07 07:10:58', '2021-03-07 07:10:58', NULL, NULL, NULL),
	(33, 'sdsdfvfdsv', 'sdfvsdfv', '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', 'sdfvsdvf', 2, '2021-03-07 07:11:32', '2021-03-07 07:11:32', NULL, NULL, NULL),
	(34, 'ФИО страхователя', 'Юр адрес страхователя', '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'sdfvdsfv', 'sdfvsdv', 2, '2021-03-07 07:23:11', '2021-03-07 07:23:11', NULL, NULL, NULL),
	(35, 'ФИО страхователя', 'Юр адрес страхователя', '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'sdfvdsfv', 'sdfvsdv', 2, '2021-03-07 07:23:43', '2021-03-07 07:23:43', NULL, NULL, NULL),
	(36, 'sdvfvsvdf', 'Юр адрес страхователя', '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'fdgbdf', 'sfvsdfv', 2, '2021-03-07 07:27:38', '2021-03-07 07:27:38', NULL, NULL, NULL),
	(37, 'ФИО страхователя', 'Юр адрес страхователя', '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', 'sdfvsdvf', 2, '2021-03-07 07:35:00', '2021-03-07 07:35:00', NULL, NULL, NULL),
	(38, 'ФИО страхователя', 'Юр адрес страхователя', '23423432', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 2, '2021-03-22 19:34:57', '2021-03-22 19:34:57', NULL, 'dvdsvf', NULL),
	(39, 'ФИО страхователя', 'PO Box F', '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 4, '2021-03-23 15:20:25', '2021-03-23 15:20:25', NULL, 'dvdsvf', NULL),
	(40, 'ФИО страхователя', 'Юр адрес страхователя', '5555551234', '345235235', '234232', '2342', 'okonx', 2, '2021-03-24 03:20:16', '2021-03-24 03:20:16', NULL, 'oked', 'Вид деятельности'),
	(41, 'ФИО страхователя', 'Юр адрес страхователя', '5555551234', 'sdfvsdfv', '3113132', 'sdgsdg', 'okonx', 4, '2021-03-24 03:51:44', '2021-03-24 03:51:44', NULL, 'oked', 'sdfvdsfv'),
	(42, 'ФИО страхователя', 'Юр адрес страхователя', '5555551234', '345235235', '234232', '2342', 'okonx', 2, '2021-03-24 03:57:26', '2021-03-24 03:57:26', NULL, 'oked', 'Вид деятельности'),
	(43, 'ФИО страхователя', 'Юр адрес страхователя', '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 2, '2021-03-24 06:10:43', '2021-03-24 06:10:43', NULL, 'dvdsvf', NULL),
	(44, 'ФИО страхователя', 'Юр адрес страхователя', '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 2, '2021-03-24 06:11:27', '2021-03-24 06:11:27', NULL, 'dvdsvf', NULL),
	(45, 'ФИО страхователя', 'Юр адрес страхователя', '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 2, '2021-03-24 06:13:42', '2021-03-24 06:13:42', NULL, 'dvdsvf', NULL),
	(46, 'ФИО страхователя', 'Юр адрес страхователя', '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 2, '2021-04-01 01:19:48', '2021-04-01 01:19:48', NULL, 'dsfvsdfv', NULL),
	(47, 'ФИО страхователя', 'Юр адрес страхователя', '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 2, '2021-04-01 01:22:50', '2021-04-01 01:22:50', NULL, 'dsfvsdfv', NULL),
	(48, 'ФИО страхователя', 'Юр адрес страхователя', '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 2, '2021-04-01 01:26:23', '2021-04-01 01:26:23', NULL, 'dsfvsdfv', NULL),
	(49, 'ФИО страхователя', 'Юр адрес страхователя', '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 2, '2021-04-01 01:31:01', '2021-04-01 01:31:01', NULL, 'dsfvsdfv', NULL),
	(50, 'ФИО страхователя', 'Юр адрес страхователя', '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 2, '2021-04-01 01:31:13', '2021-04-01 01:31:13', NULL, 'dsfvsdfv', NULL),
	(51, 'ФИО страхователя', 'Юр адрес страхователя', '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 2, '2021-04-01 01:31:32', '2021-04-01 01:31:32', NULL, 'dsfvsdfv', NULL),
	(52, 'ФИО страхователя', 'Юр адрес страхователя', '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 2, '2021-04-01 01:33:03', '2021-04-01 01:33:03', NULL, 'dsfvsdfv', NULL),
	(53, 'ФИО страхователя', 'Юр адрес страхователя', '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 2, '2021-04-01 01:33:22', '2021-04-01 01:33:22', NULL, 'dsfvsdfv', NULL),
	(54, 'ФИО страхователя', 'Юр адрес страхователя', '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 2, '2021-04-01 01:35:14', '2021-04-01 01:35:14', NULL, 'dsfvsdfv', NULL),
	(55, 'ФИО страхователя', 'Юр адрес страхователя', '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 2, '2021-04-01 01:36:01', '2021-04-01 01:36:01', NULL, 'dsfvsdfv', NULL),
	(56, 'ФИО страхователя', 'Юр адрес страхователя', '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 2, '2021-04-01 01:36:19', '2021-04-01 01:36:19', NULL, 'dsfvsdfv', NULL),
	(57, 'ФИО страхователя', 'Юр адрес страхователя', '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 2, '2021-04-01 01:39:01', '2021-04-01 01:39:01', NULL, 'dsfvsdfv', NULL),
	(58, 'ФИО страхователя', 'Юр адрес страхователя', '34235243235', '25235235', '235425', '234525', NULL, 2, '2021-04-05 03:16:33', '2021-04-05 03:16:33', NULL, '245234525', NULL),
	(59, 'ФИО страхователя', 'PO Box F', '5555551234', 'sdfvsdfv', 'dfgbdfgb', 'dfvsdvsdfv', NULL, 2, '2021-04-05 03:19:22', '2021-04-05 03:19:22', NULL, 'dvdsvf', NULL),
	(60, 'sdvfvsvdf', 'PO Box F', '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 4, '2021-04-05 03:26:02', '2021-04-05 03:26:02', NULL, 'dvdsvf', NULL),
	(61, 'sdvfvsvdf', 'PO Box F', '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 4, '2021-04-05 03:26:36', '2021-04-05 03:26:36', NULL, 'dvdsvf', NULL),
	(62, 'sdvfvsvdf', 'PO Box F', '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 4, '2021-04-05 03:26:43', '2021-04-05 03:26:43', NULL, 'dvdsvf', NULL);
/*!40000 ALTER TABLE `policy_holders` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.policy_registrations
CREATE TABLE IF NOT EXISTS `policy_registrations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `act_number` varchar(50) NOT NULL,
  `act_date` date DEFAULT NULL,
  `from_number` varchar(50) DEFAULT NULL,
  `to_number` varchar(50) DEFAULT NULL,
  `policy_series_id` int(11) unsigned DEFAULT NULL,
  `document` varchar(150) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi_test.policy_registrations: ~4 rows (approximately)
DELETE FROM `policy_registrations`;
/*!40000 ALTER TABLE `policy_registrations` DISABLE KEYS */;
INSERT INTO `policy_registrations` (`id`, `act_number`, `act_date`, `from_number`, `to_number`, `policy_series_id`, `document`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'asdvvd', '2021-01-09', '101', '140', 1, 'C:\\Users\\User\\AppData\\Local\\Temp\\php1FD7.tmp', '2021-01-09', '2021-01-09', NULL),
	(2, 'asdvvd', '2021-01-09', '141', '150', 1, 'C:\\Users\\User\\AppData\\Local\\Temp\\php251F.tmp', '2021-01-09', '2021-01-09', NULL),
	(3, 'asdvvd', '2021-01-09', '141', '150', 0, 'C:\\Users\\User\\AppData\\Local\\Temp\\php2D49.tmp', '2021-01-09', '2021-01-09', NULL),
	(4, 'asdvvd', '2021-04-02', '200', '249', 1, 'C:\\Users\\User\\AppData\\Local\\Temp\\php9BEC.tmp', '2021-04-01', '2021-04-01', NULL);
/*!40000 ALTER TABLE `policy_registrations` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.policy_retransfer
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

-- Dumping data for table ddgi_test.policy_retransfer: ~1 rows (approximately)
DELETE FROM `policy_retransfer`;
/*!40000 ALTER TABLE `policy_retransfer` DISABLE KEYS */;
INSERT INTO `policy_retransfer` (`id`, `act_number`, `act_date`, `branch_id`, `user_id`, `policy_series_id`, `policy_from`, `policy_to`, `retransfer_distribution`, `act_file`, `transfer_given`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(3, 'asdvvd', '2021-02-23', 1, 4, 1, '141', '142', '2021-02-23', NULL, 'wefwef', '2021-02-23', '2021-02-23', NULL);
/*!40000 ALTER TABLE `policy_retransfer` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.policy_series
CREATE TABLE IF NOT EXISTS `policy_series` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi_test.policy_series: ~3 rows (approximately)
DELETE FROM `policy_series`;
/*!40000 ALTER TABLE `policy_series` DISABLE KEYS */;
INSERT INTO `policy_series` (`id`, `code`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '2342345555AA', '2021-01-08', '2021-01-21', NULL),
	(2, 'AA', '2021-02-08', '2021-02-08', NULL),
	(3, 'new', NULL, NULL, NULL);
/*!40000 ALTER TABLE `policy_series` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.policy_transfer
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

-- Dumping data for table ddgi_test.policy_transfer: ~1 rows (approximately)
DELETE FROM `policy_transfer`;
/*!40000 ALTER TABLE `policy_transfer` DISABLE KEYS */;
INSERT INTO `policy_transfer` (`id`, `act_number`, `act_date`, `branch_id`, `user_id`, `policy_series_id`, `policy_from`, `policy_to`, `retransfer_distribution`, `act_file`, `transfer_given`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(2, 'asdvvd', '2021-01-11', 2, NULL, 1, '141', '146', '2021-01-11', 'C:\\Users\\User\\AppData\\Local\\Temp\\php40F.tmp', 'sdfvdsfv', '2021-01-11', '2021-01-11', NULL);
/*!40000 ALTER TABLE `policy_transfer` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.pretensii
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

-- Dumping data for table ddgi_test.pretensii: ~1 rows (approximately)
DELETE FROM `pretensii`;
/*!40000 ALTER TABLE `pretensii` DISABLE KEYS */;
INSERT INTO `pretensii` (`id`, `pretensii_status_id`, `case_number`, `policy_id`, `insurer`, `branch_id`, `insurance_contract`, `client_type`, `insurence_type`, `insurence_period`, `insured_sum`, `payable_by_agreement`, `actually_paid`, `last_payment_date`, `franchise_type_id`, `deductible_amount`, `franchise_percentage`, `reinsurance`, `date_applications`, `date_of_the_insured_event`, `event_description`, `object_description`, `region`, `district`, `claimed_loss_sum`, `refund_paid_sum`, `currency_exchange_rate`, `total_amount_in_sums`, `date_of_payment_compensation`, `final_settlement_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 2, 1, 7, 'insured', 1, 'insurance-contract', 1, 'kasko', NULL, '5000', '5000', '3000', NULL, '1', '3000', '50', 'vsdvsdvf', NULL, NULL, 'description-of-the-insured-event', 'description-of-the-insurance-object', 'pretensii-region 2', 'pretensii-district 2', '5000', '5000', '5000', '5000', NULL, NULL, '2021-01-29 08:42:22', '2021-02-01 06:26:57', NULL);
/*!40000 ALTER TABLE `pretensii` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.pretensii_overview
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

-- Dumping data for table ddgi_test.pretensii_overview: ~2 rows (approximately)
DELETE FROM `pretensii_overview`;
/*!40000 ALTER TABLE `pretensii_overview` DISABLE KEYS */;
INSERT INTO `pretensii_overview` (`id`, `pretensii_id`, `user_id`, `passed`, `comment`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 4, 1, 'comment here', '2021-02-01 04:49:15', '2021-02-01 04:49:15', NULL),
	(2, 1, 3, 0, 'comment here 3', '2021-02-01 05:52:03', '2021-02-01 06:15:44', NULL);
/*!40000 ALTER TABLE `pretensii_overview` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.pretensii_status
CREATE TABLE IF NOT EXISTS `pretensii_status` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(50) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi_test.pretensii_status: ~3 rows (approximately)
DELETE FROM `pretensii_status`;
/*!40000 ALTER TABLE `pretensii_status` DISABLE KEYS */;
INSERT INTO `pretensii_status` (`id`, `status`, `code`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'на рассмотрении', 'in progress', NULL, NULL, NULL),
	(2, 'отклонен', 'declined', NULL, NULL, NULL),
	(3, 'принят', 'accepted', NULL, NULL, NULL);
/*!40000 ALTER TABLE `pretensii_status` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.product3777s
CREATE TABLE IF NOT EXISTS `product3777s` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `policy_holder_id` bigint(20) unsigned NOT NULL,
  `zaemshik_id` bigint(20) unsigned NOT NULL,
  `dogovor_lizing_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insurance_from` date NOT NULL,
  `insurance_to` date NOT NULL,
  `insurance_aim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insurance_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `franshiza` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `object_from_date` date NOT NULL,
  `object_to_date` date NOT NULL,
  `other_info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insurance_total_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insurance_gift` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_term` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `polis_series` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `polis_from` date NOT NULL,
  `litso` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_copy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dogovor_copy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spravka_copy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product3777s_zaemshik_id_foreign` (`zaemshik_id`),
  CONSTRAINT `product3777s_zaemshik_id_foreign` FOREIGN KEY (`zaemshik_id`) REFERENCES `zaemshiks` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.product3777s: ~0 rows (approximately)
DELETE FROM `product3777s`;
/*!40000 ALTER TABLE `product3777s` DISABLE KEYS */;
/*!40000 ALTER TABLE `product3777s` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `klass_id` int(11) unsigned NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `tarif` varchar(50) DEFAULT NULL,
  `agency` varchar(50) DEFAULT NULL,
  `max_acceptable_amount` varchar(50) DEFAULT NULL,
  `min_acceptable_amount` varchar(50) DEFAULT NULL,
  `franshiza` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi_test.products: ~5 rows (approximately)
DELETE FROM `products`;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `klass_id`, `name`, `code`, `tarif`, `agency`, `max_acceptable_amount`, `min_acceptable_amount`, `franshiza`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 'Каско', '03', '10', NULL, '3463456', '34563465', '43', '2021-02-12 02:51:21', '2021-02-12 02:51:21', NULL),
	(2, 2, 'Таможенный склад', '01', '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 3, 'СМР', '03', '4', NULL, '5434543', '3453', '4', NULL, NULL, NULL),
	(4, 4, 'Ответственность подрядчик', '04', '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(5, 5, 'Таможенный платеж', '05', '10', NULL, '100000', '50000', '4500', NULL, '2021-04-01 01:54:37', NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.property_lising_zalog
CREATE TABLE IF NOT EXISTS `property_lising_zalog` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_type_radio` text COLLATE utf8mb4_unicode_ci,
  `product_id` text COLLATE utf8mb4_unicode_ci,
  `fio_insurer` text COLLATE utf8mb4_unicode_ci,
  `address_insurer` text COLLATE utf8mb4_unicode_ci,
  `tel_insurer` text COLLATE utf8mb4_unicode_ci,
  `address_schet` text COLLATE utf8mb4_unicode_ci,
  `inn_insurer` text COLLATE utf8mb4_unicode_ci,
  `mfo_insurer` text COLLATE utf8mb4_unicode_ci,
  `bank_insurer` text COLLATE utf8mb4_unicode_ci,
  `okonh_insurer` text COLLATE utf8mb4_unicode_ci,
  `fio_beneficiary` text COLLATE utf8mb4_unicode_ci,
  `address_beneficiary` text COLLATE utf8mb4_unicode_ci,
  `tel_beneficiary` text COLLATE utf8mb4_unicode_ci,
  `beneficiary_schet` text COLLATE utf8mb4_unicode_ci,
  `inn_beneficiary` text COLLATE utf8mb4_unicode_ci,
  `mfo_beneficiary` text COLLATE utf8mb4_unicode_ci,
  `bank_beneficiary` text COLLATE utf8mb4_unicode_ci,
  `okonh_beneficiary` text COLLATE utf8mb4_unicode_ci,
  `dogovor_lizing_num` text COLLATE utf8mb4_unicode_ci,
  `insurance_from` date DEFAULT NULL,
  `insurance_to` date DEFAULT NULL,
  `geo_zone` text COLLATE utf8mb4_unicode_ci,
  `polis_series_0` text COLLATE utf8mb4_unicode_ci,
  `polis_mark_0` text COLLATE utf8mb4_unicode_ci,
  `polis_model_0` text COLLATE utf8mb4_unicode_ci,
  `polis_modification_0` text COLLATE utf8mb4_unicode_ci,
  `overall_polis_sum_0` text COLLATE utf8mb4_unicode_ci,
  `polis_premium_0` text COLLATE utf8mb4_unicode_ci,
  `cover_terror_attacks_currency` text COLLATE utf8mb4_unicode_ci,
  `cover_terror_attacks_insured_currency` text COLLATE utf8mb4_unicode_ci,
  `coverage_evacuation_currency` text COLLATE utf8mb4_unicode_ci,
  `driver_quantity` text COLLATE utf8mb4_unicode_ci,
  `driver_currency` text COLLATE utf8mb4_unicode_ci,
  `passenger_currency` text COLLATE utf8mb4_unicode_ci,
  `limit_currency` text COLLATE utf8mb4_unicode_ci,
  `total_liability_limit_currency_0` text COLLATE utf8mb4_unicode_ci,
  `agent` text COLLATE utf8mb4_unicode_ci,
  `payment` text COLLATE utf8mb4_unicode_ci,
  `payment_order` text COLLATE utf8mb4_unicode_ci,
  `payment_term` text COLLATE utf8mb4_unicode_ci,
  `polis_series` text COLLATE utf8mb4_unicode_ci,
  `litso` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.property_lising_zalog: ~0 rows (approximately)
DELETE FROM `property_lising_zalog`;
/*!40000 ALTER TABLE `property_lising_zalog` DISABLE KEYS */;
/*!40000 ALTER TABLE `property_lising_zalog` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.regions
CREATE TABLE IF NOT EXISTS `regions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi_test.regions: ~7 rows (approximately)
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

-- Dumping structure for table ddgi_test.requests
CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `status` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` int(10) unsigned DEFAULT '0',
  `is_underwritting_request` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `is_perestrahovaniya_request` tinyint(3) unsigned NOT NULL DEFAULT '0',
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.requests: ~3 rows (approximately)
DELETE FROM `requests`;
/*!40000 ALTER TABLE `requests` DISABLE KEYS */;
INSERT INTO `requests` (`id`, `user_id`, `status`, `state`, `is_underwritting_request`, `is_perestrahovaniya_request`, `comments`, `file`, `act_number`, `limit_reason`, `policy_id`, `policy_series_id`, `polis_quantity`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 3, 'underwritting', 0, 0, 0, 'comment', 'request_file/0QsWi20mDJhe2MEb4y1ly7XPoGSVa2urgQm5dpjL.docx', NULL, 'some reason', 76, 1, NULL, '2021-04-01 21:17:45', '2021-04-05 00:48:38', NULL),
	(3, 3, 'underwritting', 2, 0, 0, 'Comment here', 'request_file/vfmNZght7538tCRako0I5ZsPPM8tGCkFJeHiYNk0.docx', NULL, 'some reason', 77, 1, NULL, '2021-04-05 02:53:09', '2021-04-05 02:53:09', NULL),
	(4, 3, 'underwritting', 1, 0, 0, 'asdvsadv', '', NULL, 'asvasdvsadv', 10, 1, NULL, '2021-04-05 07:03:44', '2021-04-05 07:03:44', NULL);
/*!40000 ALTER TABLE `requests` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.request_overviews
CREATE TABLE IF NOT EXISTS `request_overviews` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `request_id` bigint(20) unsigned NOT NULL,
  `passed` tinyint(1) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.request_overviews: ~3 rows (approximately)
DELETE FROM `request_overviews`;
/*!40000 ALTER TABLE `request_overviews` DISABLE KEYS */;
INSERT INTO `request_overviews` (`id`, `user_id`, `request_id`, `passed`, `comment`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 3, 1, 1, 'some comment d', '2021-04-04 01:01:35', '2021-04-04 18:05:30', NULL),
	(2, 4, 1, 1, 'some comment', '2021-04-04 01:03:29', '2021-04-04 01:03:29', NULL),
	(3, 3, 3, 1, 'No comments', '2021-04-05 03:14:00', '2021-04-05 03:14:00', NULL);
/*!40000 ALTER TABLE `request_overviews` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.roles: ~0 rows (approximately)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.role_has_permissions: ~0 rows (approximately)
DELETE FROM `role_has_permissions`;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.tamozhnya_adds
CREATE TABLE IF NOT EXISTS `tamozhnya_adds` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `warehouse_volume` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_volume` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_volume_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `na_sklade_from_date` date DEFAULT NULL,
  `na_sklade_to_date` date DEFAULT NULL,
  `payment_term` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currencies` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sposob_rascheta` int(11) DEFAULT NULL,
  `strahovaya_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strahovaya_purpose` text COLLATE utf8mb4_unicode_ci,
  `franshiza` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_number_policy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_issue_policy` date DEFAULT NULL,
  `otvet_litso` int(11) NOT NULL,
  `policy_holder_id` int(11) NOT NULL,
  `policy_beneficiary_id` int(11) NOT NULL,
  `anketa_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dogovor_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `polis_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tamozhnya_adds_otvet_litso_index` (`otvet_litso`),
  KEY `tamozhnya_adds_policy_holder_id_index` (`policy_holder_id`),
  KEY `tamozhnya_adds_policy_beneficiary_id_index` (`policy_beneficiary_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.tamozhnya_adds: ~1 rows (approximately)
DELETE FROM `tamozhnya_adds`;
/*!40000 ALTER TABLE `tamozhnya_adds` DISABLE KEYS */;
INSERT INTO `tamozhnya_adds` (`id`, `from_date`, `to_date`, `warehouse_volume`, `product_volume`, `product_volume_unit`, `total_sum`, `na_sklade_from_date`, `na_sklade_to_date`, `payment_term`, `currencies`, `sposob_rascheta`, `strahovaya_sum`, `strahovaya_purpose`, `franshiza`, `serial_number_policy`, `date_issue_policy`, `otvet_litso`, `policy_holder_id`, `policy_beneficiary_id`, `anketa_img`, `dogovor_img`, `polis_img`, `created_at`, `updated_at`) VALUES
	(1, '2021-03-18', '2021-03-18', '2343', '3', 'Литр', '4', '2021-03-06', '2021-04-02', '1', 'UZS', 1, '343', '34', '34', '34', '2021-03-04', 1, 39, 21, NULL, NULL, NULL, '2021-03-23 15:20:25', '2021-03-23 15:20:25');
/*!40000 ALTER TABLE `tamozhnya_adds` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.tamozhnya_add_legals
CREATE TABLE IF NOT EXISTS `tamozhnya_add_legals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8mb4_unicode_ci,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `prof_riski` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pretenzii_in_ruz` tinyint(1) NOT NULL DEFAULT '0',
  `prichina_pretenzii` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tarif` float unsigned DEFAULT NULL,
  `payment_term` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currencies` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unique_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sposob_rascheta` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `policy_id` int(11) DEFAULT NULL,
  `type` tinyint(3) DEFAULT NULL,
  `strahovaya_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strahovaya_purpose` text COLLATE utf8mb4_unicode_ci,
  `franshiza` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_number_policy` int(11) DEFAULT NULL,
  `date_issue_policy` date DEFAULT NULL,
  `otvet_litso` int(11) NOT NULL,
  `policy_holder_id` int(11) NOT NULL,
  `anketa_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dogovor_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `polis_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tamozhnya_add_legals_otvet_litso_index` (`otvet_litso`),
  KEY `tamozhnya_add_legals_policy_holder_id_index` (`policy_holder_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.tamozhnya_add_legals: ~3 rows (approximately)
DELETE FROM `tamozhnya_add_legals`;
/*!40000 ALTER TABLE `tamozhnya_add_legals` DISABLE KEYS */;
INSERT INTO `tamozhnya_add_legals` (`id`, `description`, `from_date`, `to_date`, `prof_riski`, `pretenzii_in_ruz`, `prichina_pretenzii`, `tarif`, `payment_term`, `currencies`, `unique_number`, `sposob_rascheta`, `product_id`, `policy_id`, `type`, `strahovaya_sum`, `strahovaya_purpose`, `franshiza`, `serial_number_policy`, `date_issue_policy`, `otvet_litso`, `policy_holder_id`, `anketa_img`, `dogovor_img`, `polis_img`, `created_at`, `updated_at`) VALUES
	(3, 'dfsdvdsfv', '2021-03-05', '2021-03-18', '2322423', 0, NULL, 10, '1', 'UZS', '0100/0505/1/2100001', 1, 5, 10, 0, '234234', '34', '3433', 1, '2021-03-04', 1, 45, NULL, NULL, NULL, '2021-03-24 06:13:42', '2021-03-28 20:29:14'),
	(15, 'gbsbbfsbgsfsfbsfgbsfgbsfbfsgb', '2021-04-15', '2021-04-30', '2322423', 1, 'sdfvdvf', 15, 'transh', 'UZS', '0100/0505/1/2100013', 1, 5, 77, 0, '11234234', '1685135.1', '23424', 1, '2021-04-09', 1, 57, NULL, NULL, NULL, '2021-04-01 01:39:01', '2021-04-05 02:20:36'),
	(17, 'rtherthrth', '2021-04-16', '2021-04-08', '2322423', 0, NULL, 10, '1', 'UZS', '0100/0505/1/2100004', 1, 5, 78, 0, '234234455454', '23423445545.4', '454545', 1, '2021-04-09', 1, 59, NULL, NULL, NULL, '2021-04-05 03:19:22', '2021-04-05 03:23:45');
/*!40000 ALTER TABLE `tamozhnya_add_legals` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.tamozhnya_add_legal_strah_premiyas
CREATE TABLE IF NOT EXISTS `tamozhnya_add_legal_strah_premiyas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `prem_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prem_from` date NOT NULL,
  `tamozhnya_add_legal_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.tamozhnya_add_legal_strah_premiyas: ~1 rows (approximately)
DELETE FROM `tamozhnya_add_legal_strah_premiyas`;
/*!40000 ALTER TABLE `tamozhnya_add_legal_strah_premiyas` DISABLE KEYS */;
INSERT INTO `tamozhnya_add_legal_strah_premiyas` (`id`, `prem_sum`, `prem_from`, `tamozhnya_add_legal_id`, `created_at`, `updated_at`) VALUES
	(1, '234242', '2021-03-29', 15, '2021-04-02 03:44:34', '2021-04-02 03:44:34');
/*!40000 ALTER TABLE `tamozhnya_add_legal_strah_premiyas` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.tamozhnya_add_strah_premiyas
CREATE TABLE IF NOT EXISTS `tamozhnya_add_strah_premiyas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `prem_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prem_from` date NOT NULL,
  `tamozhnya_add_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.tamozhnya_add_strah_premiyas: ~0 rows (approximately)
DELETE FROM `tamozhnya_add_strah_premiyas`;
/*!40000 ALTER TABLE `tamozhnya_add_strah_premiyas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tamozhnya_add_strah_premiyas` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) unsigned DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.users: ~7 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `branch_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(3, 1, 'Admin', 'admin@admin.com', NULL, '$2y$10$a7pUCw5TuXkwkDZ7Z8TgJubAwqkH60RD8s8gDTU2O8EdRrwRnf1La', NULL, '2021-01-29 06:24:33', '2021-02-18 02:49:00', NULL),
	(4, 1, 'Name1', 'agent@agent.com', NULL, '$2y$10$S6bTdfHW7SAS8A3OU1cCDeWOS7E8TmsyI2QYb8qG41nkqqO9C/Pr2', NULL, '2021-01-08 04:47:43', '2021-04-04 01:02:21', NULL),
	(9, 1, 'sdfv', 'directo3r@director.com', NULL, '$2y$10$gct4miLEu4b7s6XOK9deXeGg1X.hWUokcoeTqnKxxFgDSpIVUk.6W', NULL, '2021-01-08 13:10:10', '2021-03-29 01:34:48', NULL),
	(17, 1, 'Name', 'directo7r@director.com', NULL, '$2y$10$/qBHL6LNkuZdJA61fHpNNeLCrQiEXhqFExULUTxtoPY7O9twgj3De', NULL, '2021-02-18 03:59:55', '2021-03-28 20:28:11', NULL),
	(20, 1, 'dfgbdfb', 'directo00r@director.com', NULL, '$2y$10$2BeRT0YCJVZv8pOSArLOl.Nj1XvtPgv/cpdvpsOWGvtlp.TCMRsZ2', NULL, '2021-02-18 03:59:55', '2021-02-18 04:00:03', NULL),
	(21, NULL, 'Иван', 'mario@mail.ru', NULL, '$2y$10$alm2j/eP04rgfPWjbMmn/OSgtV7o0itjWfMip9rSgU/kSgk9c/Dta', NULL, '2021-03-29 02:26:44', '2021-03-29 02:30:51', NULL),
	(22, NULL, 'test', 'bbr@mail.ru', NULL, '$2y$10$QZXD1hqlKVlspYI2V5S7dumowKHB03xe6OTg3NtPC6WCaJGK58MaC', NULL, '2021-03-29 02:29:08', '2021-03-29 02:29:26', '2021-03-29 02:29:26');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.views
CREATE TABLE IF NOT EXISTS `views` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table ddgi_test.views: ~0 rows (approximately)
DELETE FROM `views`;
/*!40000 ALTER TABLE `views` DISABLE KEYS */;
/*!40000 ALTER TABLE `views` ENABLE KEYS */;

-- Dumping structure for table ddgi_test.zaemshiks
CREATE TABLE IF NOT EXISTS `zaemshiks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `z_fio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `z_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `z_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_series` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_issued` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_when_issued` date NOT NULL,
  `z_checking_account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `z_inn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `z_mfo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_id` int(11) NOT NULL,
  `z_okonx` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `z_oked` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.zaemshiks: ~0 rows (approximately)
DELETE FROM `zaemshiks`;
/*!40000 ALTER TABLE `zaemshiks` DISABLE KEYS */;
/*!40000 ALTER TABLE `zaemshiks` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
