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
  `type` varchar(50) NOT NULL,
  `code_by_office` varchar(100) NOT NULL,
  `code_by_type` varchar(100) NOT NULL,
  `hierarchy` varchar(50) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi_test.branches: ~4 rows (approximately)
DELETE FROM `branches`;
/*!40000 ALTER TABLE `branches` DISABLE KEYS */;
INSERT INTO `branches` (`id`, `parent_id`, `name`, `is_center`, `series`, `founded_date`, `user_id`, `region_id`, `address`, `phone_number`, `type`, `code_by_office`, `code_by_type`, `hierarchy`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, NULL, 'Головной офис', 0, 'серия', '2021-02-15', 9, 1, 'Ташкент', '23452352345', 'Тип 2', 'code', 'code 2', '1', '2021-02-15', '2021-02-15', NULL),
	(2, NULL, 'name', 0, 'series', '2021-01-08', 9, 1, 'dfvsdv', '45235325', 'Тип 1', 'sdfvdv', 'sdfvdsv', '33', '2021-01-08', '2021-01-10', NULL),
	(3, 3, 'FotTestOnly', 0, 'vfdv', '2021-02-18', 17, 1, 'PO Box F', '5555551234', 'type-1', 'sdfvdv', 'sdfvdsv', '33', '2021-02-18', '2021-02-18', NULL),
	(4, 4, 'rgwergewrg', 0, 'xcv', '2021-02-19', 20, 1, 'PO Box F', '5555551234', 'type-1', 'sdfvdve', 'rr', '44', '2021-02-18', '2021-02-18', NULL);
/*!40000 ALTER TABLE `branches` ENABLE KEYS */;

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

-- Dumping data for table ddgi_test.cmp: ~0 rows (approximately)
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table ddgi_test.directors: ~3 rows (approximately)
DELETE FROM `directors`;
/*!40000 ALTER TABLE `directors` DISABLE KEYS */;
INSERT INTO `directors` (`id`, `user_id`, `surname`, `name`, `middle_name`, `dob`, `passport_number`, `passport_series`, `work_start_date`, `work_end_date`, `phone_number`, `address`, `profile_img`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(2, 9, 'FotTestOnly3', 'sdfv', 'sdfv', '2021-01-07', '12341234', 'adscsadc', '2021-01-14', NULL, '5555551234', 'PO Box F', NULL, 1, '2021-01-08', '2021-01-10', NULL),
	(4, 17, 'Another', 'Name', 'Surname', '2021-02-11', 'sdfvsdv', 'AA', '2021-02-17', NULL, '5555551234', 'PO Box F', NULL, 1, '2021-02-18', '2021-02-18', NULL),
	(5, 20, 'Another 2', 'Name 2', 'Surname', '2021-02-11', 'sdfvsdv', 'AA', '2021-02-17', NULL, '5555551234', 'PO Box F', NULL, 1, '2021-02-18', '2021-02-18', NULL);
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
	(1, 1, 'Страхование инфекционных заболеваний', 'Человек', 'Успешно проведен', '0', '10000', '2021-02-03 12:49:32', '2021-08-31 17:22:34', '', '', '', '', '', '0', 'adminddgi', 'Sardor', 'Maxmudov', 'Maxmudovich', 1, 'http://ddgi.uz/media/profile/2021/02/08/mac.jpg', '2020-09-08', 'AA', '4799722', '2000-02-22', 'IIB Yunusobod Tumani', '998977008055', '10000800', 'Ташкент', 'Юнусабад', '18', '17', '9', '2021-02-08 15:51:34', '2021-02-12 12:18:37'),
	(2, 2, 'Страхование инфекционных заболеваний', 'Человек', 'Расторгнут', '8340000', '41700', '2021-02-08 10:25:34', '2021-08-08 10:25:34', '', '', '', '', '', '1', 'adminddgi', 'Sardor', 'Maxmudov', 'Maxmudovich', 1, 'http://ddgi.uz/media/profile/2021/02/08/mac.jpg', '2020-09-08', 'AA', '4799722', '2000-02-22', 'IIB Yunusobod Tumani', '998977008055', '10000800', 'Ташкент', 'Юнусабад', '18', '17', '9', '2021-02-08 15:51:34', '2021-02-12 12:18:37'),
	(3, 3, 'Страхование имущество', 'Квартира', 'Забракован', '32650000000', '3874750.0', '2021-02-08 10:43:47', '2021-08-08 10:43:47', '44766554114777', '120', 'Ташкент', '18', '2', '0', 'adminddgi', 'Sardor', 'Maxmudov', 'Maxmudovich', 1, 'http://ddgi.uz/media/profile/2021/02/08/mac.jpg', '2020-09-08', 'AA', '4799722', '2000-02-22', 'IIB Yunusobod Tumani', '998977008055', '10000800', 'Ташкент', 'Юнусабад', '18', '17', '9', '2021-02-08 15:52:08', '2021-02-12 12:18:37');
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

-- Dumping structure for table ddgi_test.kasko
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

-- Dumping data for table ddgi_test.kasko: ~3 rows (approximately)
DELETE FROM `kasko`;
/*!40000 ALTER TABLE `kasko` DISABLE KEYS */;
INSERT INTO `kasko` (`id`, `type`, `product_id`, `from_date`, `to_date`, `reason`, `unique_number`, `geo_zone`, `defect_img`, `purpose`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(19, 1, 1, '2021-01-06', '2021-01-13', 'fvsdfv', NULL, 'sdfvdsvf', NULL, 'fvdfsgsdfgfgdfgdfg', '2021-01-11 00:00:00', '2021-01-11 00:00:00', NULL),
	(20, 1, 1, '2021-01-06', '2021-01-13', 'fvsdfv', NULL, 'sdfvdsvf', NULL, 'fvdfsgsdfgfgdfgdfg', '2021-01-11 00:00:00', '2021-02-01 00:00:00', '2021-02-01 00:00:00'),
	(21, 0, 1, '2021-02-16', '2021-02-18', 'dfgbdfbg', '0202/0103/1/2100002', 'dfgbdfgb', NULL, 'gbfdbdfbgfd', '2021-02-15 00:00:00', '2021-02-15 00:00:00', NULL);
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

-- Dumping data for table ddgi_test.kasko_policy_informations: ~2 rows (approximately)
DELETE FROM `kasko_policy_informations`;
/*!40000 ALTER TABLE `kasko_policy_informations` DISABLE KEYS */;
INSERT INTO `kasko_policy_informations` (`id`, `policy_id`, `kasko_id`, `policy_series_id`, `period`, `user_id`, `line_id`, `brand`, `model`, `modification`, `gov_number`, `tech_passport`, `engine_number`, `carcase_number`, `payload`, `seats_number`, `polnaya_strahovaya_stoimost`, `polnaya_strahovaya_summa`, `polnaya_strahovaya_premiya`, `additional_brand`, `additional_equipment`, `additional_serial_number`, `additional_strahovaya_summa`, `additional_terr_vehical`, `additional_terr_insured`, `additional_terr_evacuation`, `additional_is_vihecal_insured`, `additional_other_insurence_info`, `additional_is_death`, `additional_death_strahovaya_summa`, `additiona_death_strahovaya_premiya`, `additional_death_franchise`, `additional_is_civil`, `additional_civil_strahovaya_summa`, `additional_civil_strahovaya_premiya`, `additional_is_accident`, `additional_accident_driver_strahovaya_summa`, `additional_accident_driver_strahovaya_premiya`, `additional_accident_pessanger_number`, `additional_accident_pessanger_strahovaya_summa_per`, `additional_accident_pessanger_strahovaya_summa`, `additional_accident_pessanger_strahovaya_premiya`, `additional_accident_limit_number`, `additional_accident_limit_strahovaya_summa_per`, `additional_accident_limit_strahovaya_summa`, `additional_accident_limit_strahovaya_premiya`, `additional_limit`, `additional_policy_from_date`, `additional_strahovaya_premiya_currency`, `additional_poryadok_oplati_currency`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 1, 1, 'regreb', 1, 'ertgretg', 'ertgre', 'grtg', 'ertgrt', 'rt', 'tgtertger', 'ertgretg', 'ertgetr', 'ertgertg', '252352345', '2343455', '12572901', NULL, 'vrfvdf', 'dsfvdfv', 'sdfvdsfv', '34523', '23452', '2345', '2345245', 1, 'fvdsvdfvsdfv', 1, '234523', '3245235', '3245235', 1, '2345235', '234525', 1, '2345235', '345', '2345', '1', '2345', '234', '1234', '1234', '1522756', '213', '1314124124', NULL, 'Сум', 'Сум', '2021-01-11 00:00:00', '2021-01-11 00:00:00', NULL),
	(2, 7, 21, 1, 'regreb', 4, 'ertgretg', '46', '47', 'tyh', 'rthy', 'rthy', 'rthy', 'rthy', 'ertgertg', '4', '7', '6', NULL, 'vrfvdf', 'dsfvdfv', 'sdfvdsfv', '34523', '23452', '2345', '2345245', 0, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1314124124', NULL, 'Сум', 'Сум', '2021-02-15 00:00:00', '2021-02-15 00:00:00', NULL);
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

-- Dumping data for table ddgi_test.klass: ~4 rows (approximately)
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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.migrations: ~29 rows (approximately)
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
	(29, '2021_03_19_184019_create_tamozhnya_add_strah_premiyas_table', 5);
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

-- Dumping data for table ddgi_test.model_has_permissions: ~0 rows (approximately)
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

-- Dumping data for table ddgi_test.oauth_personal_access_clients: ~0 rows (approximately)
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

-- Dumping data for table ddgi_test.permissions: ~0 rows (approximately)
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

-- Dumping data for table ddgi_test.policies: ~20 rows (approximately)
DELETE FROM `policies`;
/*!40000 ALTER TABLE `policies` DISABLE KEYS */;
INSERT INTO `policies` (`id`, `number`, `act_number`, `client_type`, `policy_series_id`, `status`, `branch_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 141, 'asdvvd', 0, 1, 'in_use', 2, 9, '2021-01-09 00:00:00', '2021-03-24 06:13:42', NULL),
	(2, 142, 'asdvvd', 0, 1, 'in_use', 2, 9, '2021-01-09 00:00:00', '2021-03-03 05:13:10', NULL),
	(3, 143, 'asdvvd', 0, 1, 'in_use', 2, 9, '2021-01-09 00:00:00', '2021-03-03 06:13:03', NULL),
	(4, 144, 'asdvvd', 0, 1, 'in_use', 2, 9, '2021-01-09 00:00:00', '2021-03-03 06:13:29', NULL),
	(5, 145, 'asdvvd', 0, 1, 'in_use', 2, 9, '2021-01-09 00:00:00', '2021-03-07 07:27:38', NULL),
	(6, 146, 'asdvvd', 0, 1, 'in_use', 2, 9, '2021-01-09 00:00:00', '2021-03-07 07:35:00', NULL),
	(7, 147, 'asdvvd', 0, 1, 'in_use', 0, 0, '2021-01-09 00:00:00', '2021-03-24 03:51:44', NULL),
	(8, 148, 'asdvvd', 0, 1, 'in_use', 0, 0, '2021-01-09 00:00:00', '2021-03-24 03:57:26', NULL),
	(9, 149, 'asdvvd', 0, 1, 'in_use', 0, 0, '2021-01-09 00:00:00', '2021-03-24 06:11:27', NULL),
	(10, 150, 'asdvvd', 0, 1, 'in_use', 2, 9, '2021-01-09 00:00:00', '2021-01-09 00:00:00', NULL),
	(11, 141, 'asdvvd', 0, 0, 'in_use', 0, 0, '2021-01-09 00:00:00', '2021-03-03 08:45:31', NULL),
	(12, 142, 'asdvvd', 0, 0, 'in_use', 0, 0, '2021-01-09 00:00:00', '2021-03-06 09:14:43', NULL),
	(13, 143, 'asdvvd', 0, 0, 'new', 0, 0, '2021-01-09 00:00:00', '2021-01-09 00:00:00', NULL),
	(14, 144, 'asdvvd', 0, 0, 'new', 0, 0, '2021-01-09 00:00:00', '2021-01-09 00:00:00', NULL),
	(15, 145, 'asdvvd', 0, 0, 'new', 0, 0, '2021-01-09 00:00:00', '2021-01-09 00:00:00', NULL),
	(16, 146, 'asdvvd', 0, 0, 'new', 0, 0, '2021-01-09 00:00:00', '2021-01-09 00:00:00', NULL),
	(17, 147, 'asdvvd', 0, 0, 'new', 0, 0, '2021-01-09 00:00:00', '2021-01-09 00:00:00', NULL),
	(18, 148, 'asdvvd', 0, 0, 'new', 0, 0, '2021-01-09 00:00:00', '2021-01-09 00:00:00', NULL),
	(19, 149, 'asdvvd', 0, 0, 'new', 0, 0, '2021-01-09 00:00:00', '2021-01-09 00:00:00', NULL),
	(20, 150, 'asdvvd', 0, 0, 'new', 0, 0, '2021-01-09 00:00:00', '2021-01-09 00:00:00', NULL);
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

-- Dumping data for table ddgi_test.policy_beneficiaries: ~20 rows (approximately)
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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COMMENT='страхователи';

-- Dumping data for table ddgi_test.policy_holders: ~45 rows (approximately)
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
	(45, 'ФИО страхователя', 'Юр адрес страхователя', '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 2, '2021-03-24 06:13:42', '2021-03-24 06:13:42', NULL, 'dvdsvf', NULL);
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
  `client_type` tinyint(3) unsigned NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi_test.policy_registrations: ~3 rows (approximately)
DELETE FROM `policy_registrations`;
/*!40000 ALTER TABLE `policy_registrations` DISABLE KEYS */;
INSERT INTO `policy_registrations` (`id`, `act_number`, `act_date`, `from_number`, `to_number`, `policy_series_id`, `document`, `client_type`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'asdvvd', '2021-01-09', '101', '140', 1, 'C:\\Users\\User\\AppData\\Local\\Temp\\php1FD7.tmp', 0, '2021-01-09', '2021-01-09', NULL),
	(2, 'asdvvd', '2021-01-09', '141', '150', 1, 'C:\\Users\\User\\AppData\\Local\\Temp\\php251F.tmp', 0, '2021-01-09', '2021-01-09', NULL),
	(3, 'asdvvd', '2021-01-09', '141', '150', 0, 'C:\\Users\\User\\AppData\\Local\\Temp\\php2D49.tmp', 0, '2021-01-09', '2021-01-09', NULL);
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

-- Dumping data for table ddgi_test.policy_retransfer: ~0 rows (approximately)
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

-- Dumping data for table ddgi_test.policy_transfer: ~0 rows (approximately)
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

-- Dumping data for table ddgi_test.pretensii: ~0 rows (approximately)
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

-- Dumping structure for table ddgi_test.products
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi_test.products: ~5 rows (approximately)
DELETE FROM `products`;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `klass_id`, `name`, `code`, `tarif`, `max_acceptable_amount`, `min_acceptable_amount`, `franshiza`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 'Каско', '03', '4534566', '3463456', '34563465', '43', '2021-02-12 02:51:21', '2021-02-12 02:51:21', NULL),
	(2, 2, 'Таможенный склад', '01', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 3, 'СМР', '03', '345345', '5434543', '3453', '4', NULL, NULL, NULL),
	(4, 4, 'Ответственность подрядчик', '04', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(5, 5, 'Таможенный платеж', '05', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
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

-- Dumping data for table ddgi_test.requests: ~0 rows (approximately)
DELETE FROM `requests`;
/*!40000 ALTER TABLE `requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `requests` ENABLE KEYS */;

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

-- Dumping data for table ddgi_test.tamozhnya_adds: ~0 rows (approximately)
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.tamozhnya_add_legals: ~1 rows (approximately)
DELETE FROM `tamozhnya_add_legals`;
/*!40000 ALTER TABLE `tamozhnya_add_legals` DISABLE KEYS */;
INSERT INTO `tamozhnya_add_legals` (`id`, `description`, `from_date`, `to_date`, `prof_riski`, `pretenzii_in_ruz`, `prichina_pretenzii`, `payment_term`, `currencies`, `unique_number`, `sposob_rascheta`, `product_id`, `policy_id`, `type`, `strahovaya_sum`, `strahovaya_purpose`, `franshiza`, `serial_number_policy`, `date_issue_policy`, `otvet_litso`, `policy_holder_id`, `anketa_img`, `dogovor_img`, `polis_img`, `created_at`, `updated_at`) VALUES
	(3, 'dfsdvdsfv', '2021-03-05', '2021-03-18', '2322423', 0, NULL, '1', 'UZS', '0100/0505/1/2100001', 1, 5, 10, 0, '234234', '34', '3433', 1, '2021-03-04', 4, 45, NULL, NULL, NULL, '2021-03-24 06:13:42', '2021-03-24 06:13:43');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test.tamozhnya_add_legal_strah_premiyas: ~0 rows (approximately)
DELETE FROM `tamozhnya_add_legal_strah_premiyas`;
/*!40000 ALTER TABLE `tamozhnya_add_legal_strah_premiyas` DISABLE KEYS */;
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

-- Dumping data for table ddgi_test.users: ~5 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `branch_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(3, 1, 'ahahah', 'admin@admin.com', NULL, '$2y$10$a7pUCw5TuXkwkDZ7Z8TgJubAwqkH60RD8s8gDTU2O8EdRrwRnf1La', NULL, '2021-01-29 06:24:33', '2021-02-18 02:49:00', NULL),
	(4, 1, 'Name1', 'bobur_moscow1@mail.ru', NULL, '$2y$10$3CzSOxHcSQn6HJOm.ahdHORb50aYP.vJN31VSubEMla8QM7UhZV.a', NULL, '2021-01-08 04:47:43', '2021-01-10 15:01:35', NULL),
	(9, 1, 'sdfv', 'directo3r@director.com', NULL, '$2y$10$OYljKvaiPrLd8i9V1Ms4f.PX6SjBouTvqzdbFFGSb9uBbNLHfOCLm', NULL, '2021-01-08 13:10:10', '2021-01-10 16:26:47', NULL),
	(17, 1, 'dfgbdfb', 'directo7r@director.com', NULL, '$2y$10$2BeRT0YCJVZv8pOSArLOl.Nj1XvtPgv/cpdvpsOWGvtlp.TCMRsZ2', NULL, '2021-02-18 03:59:55', '2021-02-18 04:00:03', NULL),
	(20, 1, 'dfgbdfb', 'directo00r@director.com', NULL, '$2y$10$2BeRT0YCJVZv8pOSArLOl.Nj1XvtPgv/cpdvpsOWGvtlp.TCMRsZ2', NULL, '2021-02-18 03:59:55', '2021-02-18 04:00:03', NULL);
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
