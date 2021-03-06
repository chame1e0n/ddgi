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

-- Dumping structure for table ddgi_test_2.accompanying_people
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

-- Dumping data for table ddgi_test_2.accompanying_people: ~0 rows (approximately)
DELETE FROM `accompanying_people`;
/*!40000 ALTER TABLE `accompanying_people` DISABLE KEYS */;
/*!40000 ALTER TABLE `accompanying_people` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.agents
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

-- Dumping data for table ddgi_test_2.agents: ~2 rows (approximately)
DELETE FROM `agents`;
/*!40000 ALTER TABLE `agents` DISABLE KEYS */;
INSERT INTO `agents` (`id`, `user_id`, `surname`, `name`, `middle_name`, `dob`, `passport_number`, `passport_series`, `job`, `work_start_date`, `work_end_date`, `phone_number`, `address`, `profile_img`, `agent_agreement_img`, `labor_contract`, `firm_contract`, `license`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 4, 'Surname1', 'Name1', 'middlasdc', '2021-01-08', '1231321', 'asas', '2sdfvdsfv', '2020-12-31', '2021-01-07', '4234234234', 'ddfzvdsfvdsfv', NULL, NULL, NULL, NULL, NULL, 0, '2021-01-07 21:00:00', '2021-01-09 21:00:00', NULL),
	(2, 2, 'FotTestOnly', 'ahahah', 'asdcsdac', '2021-01-29', 'sdvfdvf', 'adscsadc', 'dascdd3', '2021-01-29', '2021-02-05', '5555551234', 'PO Box F', NULL, NULL, NULL, NULL, NULL, 0, '2021-01-28 21:00:00', '2021-02-16 11:34:49', NULL);
/*!40000 ALTER TABLE `agents` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.all_products
CREATE TABLE IF NOT EXISTS `all_products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `policy_holder_id` bigint(20) DEFAULT NULL,
  `policy_beneficiaries_id` bigint(20) DEFAULT NULL,
  `zaemshik_id` bigint(20) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `unique_number` text COLLATE utf8mb4_unicode_ci,
  `fio_insured` text COLLATE utf8mb4_unicode_ci,
  `address_insured` text COLLATE utf8mb4_unicode_ci,
  `client_type_radio` text COLLATE utf8mb4_unicode_ci,
  `product_id` text COLLATE utf8mb4_unicode_ci,
  `steamer_point` text COLLATE utf8mb4_unicode_ci,
  `appointment_point` text COLLATE utf8mb4_unicode_ci,
  `geo_zone` text COLLATE utf8mb4_unicode_ci,
  `overloads_place` text COLLATE utf8mb4_unicode_ci,
  `country_of_insurance` text COLLATE utf8mb4_unicode_ci,
  `location_of_cargo` text COLLATE utf8mb4_unicode_ci,
  `location` text COLLATE utf8mb4_unicode_ci,
  `property_name` text COLLATE utf8mb4_unicode_ci,
  `fire_alarm_file` text COLLATE utf8mb4_unicode_ci,
  `security_file` text COLLATE utf8mb4_unicode_ci,
  `franshize_percent_1` text COLLATE utf8mb4_unicode_ci,
  `franshize_percent_2` text COLLATE utf8mb4_unicode_ci,
  `franshize_percent_3` text COLLATE utf8mb4_unicode_ci,
  `name_of_cargo` text COLLATE utf8mb4_unicode_ci,
  `type_of_cargo` text COLLATE utf8mb4_unicode_ci,
  `type_packaging` text COLLATE utf8mb4_unicode_ci,
  `weight_of_cargo` text COLLATE utf8mb4_unicode_ci,
  `amount_of_cargo` text COLLATE utf8mb4_unicode_ci,
  `type_of_transport` text COLLATE utf8mb4_unicode_ci,
  `qualities_of_cargo` text COLLATE utf8mb4_unicode_ci,
  `fio_accompanying` text COLLATE utf8mb4_unicode_ci,
  `position_accompanying` text COLLATE utf8mb4_unicode_ci,
  `amount_of_cargo_place` text COLLATE utf8mb4_unicode_ci,
  `transporter` text COLLATE utf8mb4_unicode_ci,
  `name_of_shipper` text COLLATE utf8mb4_unicode_ci,
  `address_shipper` text COLLATE utf8mb4_unicode_ci,
  `name_consignee` text COLLATE utf8mb4_unicode_ci,
  `address_consignee` text COLLATE utf8mb4_unicode_ci,
  `insurance_period_from` date DEFAULT NULL,
  `packaging_period_from` date DEFAULT NULL,
  `packaging_period_to` date DEFAULT NULL,
  `term_from` date DEFAULT NULL,
  `term_to` date DEFAULT NULL,
  `waiting_period_from` date DEFAULT NULL,
  `waiting_period_to` date DEFAULT NULL,
  `loan_sum` text COLLATE utf8mb4_unicode_ci,
  `loan_reason` text COLLATE utf8mb4_unicode_ci,
  `condition_insurance` text COLLATE utf8mb4_unicode_ci,
  `accompanying_file` text COLLATE utf8mb4_unicode_ci,
  `date_giving_insurance` text COLLATE utf8mb4_unicode_ci,
  `responsible_person` text COLLATE utf8mb4_unicode_ci,
  `application_form` text COLLATE utf8mb4_unicode_ci,
  `contract` text COLLATE utf8mb4_unicode_ci,
  `policy` text COLLATE utf8mb4_unicode_ci,
  `tel_insured` text COLLATE utf8mb4_unicode_ci,
  `passport_series_insured` text COLLATE utf8mb4_unicode_ci,
  `passport_num_insured` text COLLATE utf8mb4_unicode_ci,
  `credit_contract` text COLLATE utf8mb4_unicode_ci,
  `credit_contract_to` date DEFAULT NULL,
  `insurance_from` date DEFAULT NULL,
  `insurance_to` date DEFAULT NULL,
  `sum_of_insurance` text COLLATE utf8mb4_unicode_ci,
  `bonus` text COLLATE utf8mb4_unicode_ci,
  `tariff` text COLLATE utf8mb4_unicode_ci,
  `percent_of_tariff` text COLLATE utf8mb4_unicode_ci,
  `ocenka_osnovaniya` text COLLATE utf8mb4_unicode_ci,
  `nomer_dogovor_strah_vigod` text COLLATE utf8mb4_unicode_ci,
  `date_dogovor_strah_vigod` date DEFAULT NULL,
  `insurance_sum` text COLLATE utf8mb4_unicode_ci,
  `insurance_bonus` text COLLATE utf8mb4_unicode_ci,
  `franchise` text COLLATE utf8mb4_unicode_ci,
  `insurance_premium_currency` text COLLATE utf8mb4_unicode_ci,
  `payment_term` text COLLATE utf8mb4_unicode_ci,
  `sposob_rascheta` int(11) DEFAULT NULL,
  `tarif_other` double(8,2) DEFAULT NULL,
  `preim` text COLLATE utf8mb4_unicode_ci,
  `premiya_other` double(8,2) DEFAULT NULL,
  `payment_sum_main` text COLLATE utf8mb4_unicode_ci,
  `payment_from_main` text COLLATE utf8mb4_unicode_ci,
  `way_of_calculation` text COLLATE utf8mb4_unicode_ci,
  `application_form_file` text COLLATE utf8mb4_unicode_ci,
  `contract_file` text COLLATE utf8mb4_unicode_ci,
  `policy_file` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint(20) DEFAULT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci,
  `dogovor_lizing_num` text COLLATE utf8mb4_unicode_ci,
  `insurance_aim` text COLLATE utf8mb4_unicode_ci,
  `currency` text COLLATE utf8mb4_unicode_ci,
  `credit_dogovor_number` text COLLATE utf8mb4_unicode_ci,
  `credit_dogovor_from_date` date DEFAULT NULL,
  `object_from_date` date DEFAULT NULL,
  `object_to_date` date DEFAULT NULL,
  `vid_zalog_obespech` text COLLATE utf8mb4_unicode_ci,
  `product_desc` text COLLATE utf8mb4_unicode_ci,
  `sum_zalog_obespech` text COLLATE utf8mb4_unicode_ci,
  `using_tc` text COLLATE utf8mb4_unicode_ci,
  `other_info` text COLLATE utf8mb4_unicode_ci,
  `insurance_total_sum` text COLLATE utf8mb4_unicode_ci,
  `insurance_gift` text COLLATE utf8mb4_unicode_ci,
  `payment_currency` text COLLATE utf8mb4_unicode_ci,
  `polis_series` text COLLATE utf8mb4_unicode_ci,
  `polis_from` date DEFAULT NULL,
  `litso` text COLLATE utf8mb4_unicode_ci,
  `passport_copy` text COLLATE utf8mb4_unicode_ci,
  `dogovor_copy` text COLLATE utf8mb4_unicode_ci,
  `spravka_copy` text COLLATE utf8mb4_unicode_ci,
  `spravka_rabota_copy` text COLLATE utf8mb4_unicode_ci,
  `other_copy` text COLLATE utf8mb4_unicode_ci,
  `other` text COLLATE utf8mb4_unicode_ci,
  `file` text COLLATE utf8mb4_unicode_ci,
  `policy_id` text COLLATE utf8mb4_unicode_ci,
  `policy_series_id` text COLLATE utf8mb4_unicode_ci,
  `state` text COLLATE utf8mb4_unicode_ci,
  `year_one` text COLLATE utf8mb4_unicode_ci,
  `annual_turnover_one` text COLLATE utf8mb4_unicode_ci,
  `net_profit_one` text COLLATE utf8mb4_unicode_ci,
  `year_two` text COLLATE utf8mb4_unicode_ci,
  `annual_turnover_two` text COLLATE utf8mb4_unicode_ci,
  `net_profit_two` text COLLATE utf8mb4_unicode_ci,
  `acted` text COLLATE utf8mb4_unicode_ci,
  `public_sector_comment` text COLLATE utf8mb4_unicode_ci,
  `private_sector_comment` text COLLATE utf8mb4_unicode_ci,
  `professional_risks` text COLLATE utf8mb4_unicode_ci,
  `cases` text COLLATE utf8mb4_unicode_ci,
  `reason_case` text COLLATE utf8mb4_unicode_ci,
  `administrative_case` text COLLATE utf8mb4_unicode_ci,
  `reason_administrative_case` text COLLATE utf8mb4_unicode_ci,
  `sphereOfActivity` text COLLATE utf8mb4_unicode_ci,
  `profInsuranceServices` text COLLATE utf8mb4_unicode_ci,
  `liabilityLimit` text COLLATE utf8mb4_unicode_ci,
  `retransferAktFile` text COLLATE utf8mb4_unicode_ci,
  `activity_period_from` text COLLATE utf8mb4_unicode_ci,
  `activity_period_to` text COLLATE utf8mb4_unicode_ci,
  `credit_from` text COLLATE utf8mb4_unicode_ci,
  `credit_to` text COLLATE utf8mb4_unicode_ci,
  `sum_of_credit` text COLLATE utf8mb4_unicode_ci,
  `insurance_until` text COLLATE utf8mb4_unicode_ci,
  `credit_franchise` text COLLATE utf8mb4_unicode_ci,
  `currency_of_settlement` text COLLATE utf8mb4_unicode_ci,
  `insurance_date_from` text COLLATE utf8mb4_unicode_ci,
  `contract_agreement` text COLLATE utf8mb4_unicode_ci,
  `beneficiary_geo_zone` text COLLATE utf8mb4_unicode_ci,
  `construct_object` text COLLATE utf8mb4_unicode_ci,
  `work_exp` text COLLATE utf8mb4_unicode_ci,
  `beneficiary_insurance_from` text COLLATE utf8mb4_unicode_ci,
  `beneficiary_insurance_to` text COLLATE utf8mb4_unicode_ci,
  `geograph_zone` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `dogovor_date_from` date DEFAULT NULL,
  `dogovor_date_to` date DEFAULT NULL,
  `dogovor_zalog_date_from` date DEFAULT NULL,
  `dogovor_zalog_date_to` date DEFAULT NULL,
  `credit_insurance_from` date DEFAULT NULL,
  `credit_insurance_to` date DEFAULT NULL,
  `defect_comment` text COLLATE utf8mb4_unicode_ci,
  `defect_image` text COLLATE utf8mb4_unicode_ci,
  `products_by_contract` text COLLATE utf8mb4_unicode_ci,
  `select_products_by_contract` text COLLATE utf8mb4_unicode_ci,
  `reason` text COLLATE utf8mb4_unicode_ci,
  `country_insurance_coverings` text COLLATE utf8mb4_unicode_ci,
  `date_shipment` text COLLATE utf8mb4_unicode_ci,
  `cost_of_shipment` text COLLATE utf8mb4_unicode_ci,
  `payment_for_buyer` text COLLATE utf8mb4_unicode_ci,
  `debt` text COLLATE utf8mb4_unicode_ci,
  `date_summary` text COLLATE utf8mb4_unicode_ci,
  `short_sum_overdue` text COLLATE utf8mb4_unicode_ci,
  `tall_sum_overdue` text COLLATE utf8mb4_unicode_ci,
  `description_reason` text COLLATE utf8mb4_unicode_ci,
  `payed` text COLLATE utf8mb4_unicode_ci,
  `payed_bonus` text COLLATE utf8mb4_unicode_ci,
  `penalty` text COLLATE utf8mb4_unicode_ci,
  `penalties` text COLLATE utf8mb4_unicode_ci,
  `sum_from_all` text COLLATE utf8mb4_unicode_ci,
  `payed_sum_shipment` text COLLATE utf8mb4_unicode_ci,
  `cost_invoice` text COLLATE utf8mb4_unicode_ci,
  `invoice_price` text COLLATE utf8mb4_unicode_ci,
  `spends` text COLLATE utf8mb4_unicode_ci,
  `spending` text COLLATE utf8mb4_unicode_ci,
  `invoices` text COLLATE utf8mb4_unicode_ci,
  `experience_with_buyer` text COLLATE utf8mb4_unicode_ci,
  `overhead` text COLLATE utf8mb4_unicode_ci,
  `checkout_from_bank` text COLLATE utf8mb4_unicode_ci,
  `payment_document` text COLLATE utf8mb4_unicode_ci,
  `demand_document` text COLLATE utf8mb4_unicode_ci,
  `correspondence` text COLLATE utf8mb4_unicode_ci,
  `book_sales` text COLLATE utf8mb4_unicode_ci,
  `unpaid_invoices` text COLLATE utf8mb4_unicode_ci,
  `details_warranty` text COLLATE utf8mb4_unicode_ci,
  `damages` text COLLATE utf8mb4_unicode_ci,
  `disputes` text COLLATE utf8mb4_unicode_ci,
  `problems` text COLLATE utf8mb4_unicode_ci,
  `period_condition` text COLLATE utf8mb4_unicode_ci,
  `warranty_of_trust` text COLLATE utf8mb4_unicode_ci,
  `reimbursement` text COLLATE utf8mb4_unicode_ci,
  `claim` text COLLATE utf8mb4_unicode_ci,
  `agree_with` text COLLATE utf8mb4_unicode_ci,
  `carried_out` text COLLATE utf8mb4_unicode_ci,
  `carried_out_info` text COLLATE utf8mb4_unicode_ci,
  `changes_on_date` text COLLATE utf8mb4_unicode_ci,
  `dispose_changes` text COLLATE utf8mb4_unicode_ci,
  `securing_data` text COLLATE utf8mb4_unicode_ci,
  `requested` text COLLATE utf8mb4_unicode_ci,
  `received` text COLLATE utf8mb4_unicode_ci,
  `insurer_warranty` text COLLATE utf8mb4_unicode_ci,
  `reimbursement_insurer` text COLLATE utf8mb4_unicode_ci,
  `claim_of_buyer` text COLLATE utf8mb4_unicode_ci,
  `bank_of_credit` text COLLATE utf8mb4_unicode_ci,
  `bank_confirm` text COLLATE utf8mb4_unicode_ci,
  `form_of_credit` text COLLATE utf8mb4_unicode_ci,
  `type_of_credit` text COLLATE utf8mb4_unicode_ci,
  `sending_point` text COLLATE utf8mb4_unicode_ci,
  `point_destination` text COLLATE utf8mb4_unicode_ci,
  `point_overloads` text COLLATE utf8mb4_unicode_ci,
  `insurance_countries` text COLLATE utf8mb4_unicode_ci,
  `period_expectation` text COLLATE utf8mb4_unicode_ci,
  `strtahovka_comment` text COLLATE utf8mb4_unicode_ci,
  `zalog_unique_number` text COLLATE utf8mb4_unicode_ci,
  `zalogodatel_id` int(11) DEFAULT NULL,
  `dogovor_lizing_number` text COLLATE utf8mb4_unicode_ci,
  `dogovor_period_from` date DEFAULT NULL,
  `dogovor_period_to` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.all_products: ~41 rows (approximately)
DELETE FROM `all_products`;
/*!40000 ALTER TABLE `all_products` DISABLE KEYS */;
INSERT INTO `all_products` (`id`, `policy_holder_id`, `policy_beneficiaries_id`, `zaemshik_id`, `type`, `unique_number`, `fio_insured`, `address_insured`, `client_type_radio`, `product_id`, `steamer_point`, `appointment_point`, `geo_zone`, `overloads_place`, `country_of_insurance`, `location_of_cargo`, `location`, `property_name`, `fire_alarm_file`, `security_file`, `franshize_percent_1`, `franshize_percent_2`, `franshize_percent_3`, `name_of_cargo`, `type_of_cargo`, `type_packaging`, `weight_of_cargo`, `amount_of_cargo`, `type_of_transport`, `qualities_of_cargo`, `fio_accompanying`, `position_accompanying`, `amount_of_cargo_place`, `transporter`, `name_of_shipper`, `address_shipper`, `name_consignee`, `address_consignee`, `insurance_period_from`, `packaging_period_from`, `packaging_period_to`, `term_from`, `term_to`, `waiting_period_from`, `waiting_period_to`, `loan_sum`, `loan_reason`, `condition_insurance`, `accompanying_file`, `date_giving_insurance`, `responsible_person`, `application_form`, `contract`, `policy`, `tel_insured`, `passport_series_insured`, `passport_num_insured`, `credit_contract`, `credit_contract_to`, `insurance_from`, `insurance_to`, `sum_of_insurance`, `bonus`, `tariff`, `percent_of_tariff`, `ocenka_osnovaniya`, `nomer_dogovor_strah_vigod`, `date_dogovor_strah_vigod`, `insurance_sum`, `insurance_bonus`, `franchise`, `insurance_premium_currency`, `payment_term`, `sposob_rascheta`, `tarif_other`, `preim`, `premiya_other`, `payment_sum_main`, `payment_from_main`, `way_of_calculation`, `application_form_file`, `contract_file`, `policy_file`, `user_id`, `comments`, `dogovor_lizing_num`, `insurance_aim`, `currency`, `credit_dogovor_number`, `credit_dogovor_from_date`, `object_from_date`, `object_to_date`, `vid_zalog_obespech`, `product_desc`, `sum_zalog_obespech`, `using_tc`, `other_info`, `insurance_total_sum`, `insurance_gift`, `payment_currency`, `polis_series`, `polis_from`, `litso`, `passport_copy`, `dogovor_copy`, `spravka_copy`, `spravka_rabota_copy`, `other_copy`, `other`, `file`, `policy_id`, `policy_series_id`, `state`, `year_one`, `annual_turnover_one`, `net_profit_one`, `year_two`, `annual_turnover_two`, `net_profit_two`, `acted`, `public_sector_comment`, `private_sector_comment`, `professional_risks`, `cases`, `reason_case`, `administrative_case`, `reason_administrative_case`, `sphereOfActivity`, `profInsuranceServices`, `liabilityLimit`, `retransferAktFile`, `activity_period_from`, `activity_period_to`, `credit_from`, `credit_to`, `sum_of_credit`, `insurance_until`, `credit_franchise`, `currency_of_settlement`, `insurance_date_from`, `contract_agreement`, `beneficiary_geo_zone`, `construct_object`, `work_exp`, `beneficiary_insurance_from`, `beneficiary_insurance_to`, `geograph_zone`, `created_at`, `updated_at`, `deleted_at`, `dogovor_date_from`, `dogovor_date_to`, `dogovor_zalog_date_from`, `dogovor_zalog_date_to`, `credit_insurance_from`, `credit_insurance_to`, `defect_comment`, `defect_image`, `products_by_contract`, `select_products_by_contract`, `reason`, `country_insurance_coverings`, `date_shipment`, `cost_of_shipment`, `payment_for_buyer`, `debt`, `date_summary`, `short_sum_overdue`, `tall_sum_overdue`, `description_reason`, `payed`, `payed_bonus`, `penalty`, `penalties`, `sum_from_all`, `payed_sum_shipment`, `cost_invoice`, `invoice_price`, `spends`, `spending`, `invoices`, `experience_with_buyer`, `overhead`, `checkout_from_bank`, `payment_document`, `demand_document`, `correspondence`, `book_sales`, `unpaid_invoices`, `details_warranty`, `damages`, `disputes`, `problems`, `period_condition`, `warranty_of_trust`, `reimbursement`, `claim`, `agree_with`, `carried_out`, `carried_out_info`, `changes_on_date`, `dispose_changes`, `securing_data`, `requested`, `received`, `insurer_warranty`, `reimbursement_insurer`, `claim_of_buyer`, `bank_of_credit`, `bank_confirm`, `form_of_credit`, `type_of_credit`, `sending_point`, `point_destination`, `point_overloads`, `insurance_countries`, `period_expectation`, `strtahovka_comment`, `zalog_unique_number`, `zalogodatel_id`, `dogovor_lizing_number`, `dogovor_period_from`, `dogovor_period_to`) VALUES
	(1, 106, 51, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '656565', '233223423423', '11111', NULL, 'transh', NULL, NULL, NULL, NULL, '25242252', '2021-05-20', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'selected', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-07 10:34:41', '2021-05-07 10:34:41', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(2, 107, 52, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '656565', '233223423423', '11111', NULL, 'transh', NULL, NULL, NULL, NULL, '25242252', '2021-05-20', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'selected', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-07 10:36:54', '2021-05-07 10:36:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 108, 53, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '656565', '233223423423', '11111', NULL, 'transh', NULL, NULL, NULL, NULL, '25242252', '2021-05-20', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'selected', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-07 10:37:22', '2021-05-07 10:37:22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(4, 109, 54, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '656565', '233223423423', '11111', NULL, 'transh', NULL, NULL, NULL, NULL, '25242252', '2021-05-20', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'selected', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-07 10:44:37', '2021-05-07 10:44:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(5, 110, 55, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '656565', '233223423423', '11111', NULL, 'transh', NULL, NULL, NULL, NULL, '25242252', '2021-05-20', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'selected', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-07 10:45:34', '2021-05-07 10:45:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(6, 111, 56, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '656565', '233223423423', '11111', NULL, 'transh', NULL, NULL, NULL, NULL, '25242252', '2021-05-20', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'selected', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-07 10:46:42', '2021-05-07 10:46:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(7, 112, 57, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '656565', '233223423423', '11111', NULL, 'transh', NULL, NULL, NULL, NULL, '25242252', '2021-05-20', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'selected', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-07 10:46:59', '2021-05-07 10:46:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(8, 113, 58, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '656565', '233223423423', '11111', NULL, 'transh', NULL, NULL, NULL, NULL, '25242252', '2021-05-20', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'selected', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-07 10:47:25', '2021-05-07 10:47:25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(9, 114, 59, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????????????????????????? ????????', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-08', '2021-05-20', NULL, NULL, 'on', NULL, NULL, NULL, NULL, '656565', '233223423423', '????????????????', NULL, 'transh', NULL, 4.00, 'on', 6.00, '25252536', '2021-05-23', '3', 'documents_teztools/3RILwkqmGQ1ZrUUodaYEfPEQgiyXEI25jYckM8Rh.jpg', 'documents_teztools/dUnmQgAn8aLExuCfYnUPDKlj3F46XnxiT9nT5ydS.jpg', 'documents_teztools/tO1OoWeOkSFYCBqz7aXdn6SKnJHDTFPCtyMcAS4H.webp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-07 10:51:25', '2021-05-07 10:51:25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(10, 115, 60, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Atlantika', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-08', '2021-05-15', NULL, NULL, 'tariff', NULL, NULL, NULL, NULL, 'goallllll', '11111', '11111', NULL, 'transh', NULL, 5.00, 'preim', 5.00, 'sASAS', '2021-05-27', '3', 'documents_teztools/wm7EdlH1PybcgaLy0oGPXmvXNM57w0IKXlx0AAlU.jpg', 'documents_teztools/J9pILDOAKaKyGZSMsXhJXBBHEdMR0GZGjjoPiLbf.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-07 11:01:21', '2021-05-07 14:46:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(11, 117, 61, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'on', NULL, NULL, NULL, NULL, '00000000000000000', '233223423423', '00000000000', NULL, 'transh', NULL, 7.00, 'on', 7.00, '4444444444444', '2021-05-11', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'selected', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-07 15:37:34', '2021-05-07 15:37:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(12, 119, 62, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????????????????????????? ????????', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-09', '2021-05-13', NULL, NULL, 'on', NULL, NULL, NULL, NULL, '656565', '233223423423', '????????????????', 'EUR', 'transh', NULL, 6.00, 'on', 4.00, '25242252', '2021-04-28', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-08 06:53:47', '2021-05-08 06:53:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(13, 120, 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdccdscds', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-21', '2021-05-21', NULL, NULL, 'tariff', NULL, NULL, NULL, NULL, '000000000000', '00000000000', '000000000', 'CZK', 'transh', NULL, 12333.00, 'preim', 12333.00, '1111111111111111', '2021-05-29', '4', 'documents_teztools/yuiBKQWGJWHQ6ecV5YYv45KKPvAUF9eJVLzYrtjs.jpg', 'documents_teztools/9Kr3Blri7Fn0jizhOXA9EMb45a6Vcj3P46U8skl4.jpg', 'documents_teztools/XPbdrsIT8FDtKE3rzCUILQw3cLeLICc96IzLGc1W.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-08 07:03:08', '2021-05-08 07:18:12', '2021-05-08 07:18:12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(14, 121, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????????????????????????? ????????', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-19', '2021-05-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '656565', '58558', '58585858', 'CHF', 'transh', NULL, NULL, NULL, NULL, '588558', '2021-05-27', '3', 'documents_broker/LYeRNUET6MMT7E95FaWeNnPcxrFwap5AFQAAowJn.jpg', 'documents_broker/ZmqphcH2FuDmfk4NISReNDki3aB0l2liStW5AiXZ.jpg', 'documents_broker/dnF16ourLLIHrmwDZh5Ai175ZgQVfN5n325KEi0P.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2525', '2525', '54635635', '2525', '252545', '563563', '1', 'dfzvsz', 'szcdszdc', 'dcszcs', '1', 'cdscsd', '1', 'dscsdc', '2', '3', '1', 'documents_broker/4VrMcq2jadEbVnfLPGqR1U56gPYXBW92AftgqEiG.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-09 16:29:07', '2021-05-09 16:29:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(15, 123, 64, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'xxsxxxx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-20', '2021-05-15', NULL, NULL, 'tariff', NULL, NULL, NULL, NULL, '656565', '11111', '????????????????', 'UZS', 'transh', NULL, 4.00, 'preim', 6.00, '25252536', '2021-05-19', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-09 16:39:14', '2021-05-09 16:39:14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(16, 124, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-21', '2021-05-10', NULL, NULL, 'tariff', NULL, NULL, NULL, NULL, '656565', '233223423423', '????????????????', '1', 'transh', NULL, 12.00, 'preim', 16.00, '22222222', '2021-05-26', '3', 'documents_broker/NWnlBZeN4uIBobFe6RfqdcnRLNue9okmKh0G8VZp.jpg', NULL, 'documents_broker/r1dHmE2K63dPkhJ6YncMHswh9RaDhwzfUjUyGvSH.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dasda', '2525', 'adsdas', 'aDasd', 'asdas', '25252', 'false', 'asasasx', 'asasasx', 'sxaxsaxsa', '1', 'xsaxsaxsa', 'false', 'sxaxsaxsa', '3', '3', '1', 'documents_broker/V7hfr8BULVJyAyY9Lkj6CRlElAO6MprRAmr8RM6o.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-09 16:48:44', '2021-05-09 18:07:06', '2021-05-09 18:07:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(17, 128, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-15', NULL, NULL, NULL, 'tariff', NULL, NULL, NULL, NULL, '656565', '233223423423', '????????????????', '1', 'transh', NULL, 6.00, 'preim', 8.00, '4444444444444444444444', '2021-06-01', '3', 'documents_avtocredit/y6oukNWFXB31k8od8uvMWSaVVsMCNPgEzeBkO2vn.jpg', 'documents_avtocredit/8aWUa8RplA7xvvo8r1DX0hmMQiVyegu4pMd9EKSN.webp', 'documents_avtocredit/rDCjpJFvc0e7OjHB0I1rlejxPdY8Mo9tYKerOdVs.jpg', NULL, NULL, '00000000000000000000000000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-22', '2021-05-17', 'sdasd', '2021-05-06', '25555555555555555555', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-10 16:12:46', '2021-05-10 17:19:57', '2021-05-10 17:19:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(18, 129, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-12', NULL, NULL, NULL, 'tariff', NULL, NULL, NULL, NULL, '656565', '233223423423', '11111', '1', 'transh', NULL, 9.00, 'preim', 7.00, '242424524', '2021-05-19', '4', NULL, NULL, NULL, NULL, NULL, '1665656', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-12', '2021-05-13', 'sdasd', '2021-05-12', '????????????????', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-11 15:17:08', '2021-05-12 06:22:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(19, 130, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tariff', NULL, NULL, NULL, NULL, '656565', '233223423423', NULL, '1', 'transh', NULL, 3.00, 'preim', 0.00, '222222222222222222222', NULL, '1', NULL, NULL, NULL, NULL, NULL, '1665656', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdasd', NULL, '25555555555555555555', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-11 15:26:01', '2021-05-12 15:17:55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(20, 131, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '656565', '233223423423', NULL, '1', 'transh', NULL, NULL, NULL, NULL, '222222222222222222222', NULL, '1', NULL, NULL, NULL, NULL, NULL, '1665656', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdasd', NULL, '25555555555555555555', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-11 15:26:55', '2021-05-12 06:34:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(21, 132, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-04', NULL, NULL, NULL, 'tariff', NULL, NULL, NULL, NULL, '656565', '233223423423', '????????????????', '1', 'transh', NULL, 25.00, 'preim', 25.00, '000000000000000', '2021-05-06', '3', NULL, NULL, NULL, NULL, NULL, '4545', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-15', '2021-05-15', '224', '2021-05-15', '22452', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-12 06:37:47', '2021-05-12 07:44:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(22, 133, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, '1', 'documents_avtocredit/EuCan0xZshhou7rqD6yYGXVG5xiEjtdB7SYX2S4o.jpg', 'documents_avtocredit/Tq2vxj7veREKvQ2eOUqhGvPEYNgtPAOqDHrqulk9.jpg', 'documents_avtocredit/I5jH7kOyXr9dVLgaejxRUUjrQ0mWgn7muTdHJJzI.jpg', NULL, NULL, '25424', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-14', '2021-05-21', 'sdasd', '2021-05-05', '25555555555555555555', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-12 13:11:47', '2021-05-12 13:11:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(23, 134, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'transh', NULL, NULL, NULL, NULL, '25242252', NULL, '1', NULL, NULL, NULL, NULL, NULL, '254525', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-22', '2021-05-13', '45', '2021-05-10', '25552', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-12 13:24:39', '2021-05-12 13:50:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(24, 135, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-13', NULL, NULL, NULL, 'tariff', NULL, NULL, NULL, NULL, 'goallllll', '233223423423', NULL, 'CZK', 'transh', NULL, 25.00, 'preim', 25.00, '242224', '2021-05-19', '1', NULL, NULL, NULL, NULL, NULL, '25424', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-27', '2021-05-18', 'sdasd', '2021-05-05', '25555555555555555555', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-12 15:23:50', '2021-05-12 15:23:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(25, 136, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '656565', '233223423423', '????????????????', 'EUR', 'transh', NULL, NULL, NULL, NULL, '25252536', '2021-05-15', '3', NULL, NULL, NULL, NULL, NULL, '25424', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-22', '2021-05-14', 'sdasd', '2021-05-15', '25555555555555555555', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-12 15:30:45', '2021-05-12 15:30:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(26, 137, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-08', NULL, NULL, NULL, 'tariff', NULL, NULL, NULL, NULL, '656565', '11111', '????????????????', '1', 'transh', NULL, 5.00, 'preim', 555.00, '25252536', '2021-05-08', '3', NULL, NULL, NULL, NULL, NULL, '25424', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-22', '2021-05-13', '542525', '2021-05-13', '25555555555555555555', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-12 15:50:14', '2021-05-12 15:52:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(27, 138, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '25424', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-14', 'sdasd', '2021-05-01', '25555555555555555555', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-12 16:08:40', '2021-05-12 16:08:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(28, 139, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-08', NULL, NULL, NULL, 'tariff', NULL, NULL, NULL, NULL, 'dscdcs', '62265', '25252', '1', 'transh', NULL, 52.00, 'preim', 57.00, '222222222222222222222', '2021-06-03', '4', NULL, NULL, NULL, NULL, NULL, '1665656', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-08', '2021-05-15', 'sdasd', '2021-05-07', '25555555555555555555', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-14 09:15:35', '2021-05-14 09:17:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(29, 140, 65, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-28', NULL, NULL, 'tariff', NULL, NULL, NULL, NULL, 'goallllll', '11111', '651', '1', 'transh', NULL, 2222.00, 'preim', 22.00, '25252536', '2021-05-19', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-18', NULL, 'dggdgdf', 'fsfsdf', '5', '2021-05-27', '2021-05-19', 'fszfsdf', '2021-05-16 17:15:46', '2021-05-16 19:33:54', '2021-05-16 19:33:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(30, 146, 71, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????????????????????????? ????????', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-28', NULL, NULL, 'tariff', NULL, NULL, NULL, NULL, '222222222222222222222222', '233223423423', '????????????????', '1', 'transh', NULL, 6.00, 'preim', 8.00, '111111111111111111', '2021-05-28', '4', 'documents_podraydchik/3W7xY3QWq4WapkXGdsa4dJGcSJhPXoP7otlkWcML.jpg', 'documents_podraydchik/YYBdy3E230FkroQkQYGWQZtWFgLw8iNV6RgOV5Jp.jpg', 'documents_podraydchik/5FHT9YPHwcbFHLoGLZyFIPKgyVAwJm4lp59SC0zh.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-02', 'documents_podraydchik/ZnD7Zrc1q3slfne7n5lzR1jO804cw0FwoAm8w7F0.jpg', 'dggdgdf', 'fsfsdf', '5', '2021-05-30', '2021-05-19', 'fszfsdf', '2021-05-16 17:32:26', '2021-05-16 19:11:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(31, 147, NULL, NULL, NULL, NULL, '?????? ????????????????', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5656565', '656565', 'on', '9', NULL, NULL, NULL, '656565', '11111', '11111', NULL, 'transh', NULL, NULL, NULL, NULL, '25252536', '2021-05-19', '3', 'documents_mejd/gLi48eFbGNAQhpeyc6sFulInVTvrriGyKiLZLnS1.jpg', 'documents_mejd/roV2jf3OZXqBe9g4JLyZZuF4klupUZSJUXWcETjS.jpg', 'documents_mejd/tgrLvs74u7DnIZW3XTCUbkwrhEJ2efPV3nHyo7ew.webp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-17 15:26:01', '2021-05-17 15:26:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(32, 148, NULL, NULL, NULL, NULL, '?????? ????????????????', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5656565', '656565', 'on', '7', NULL, NULL, NULL, '656565', '11111', '????????????????', NULL, 'transh', NULL, NULL, NULL, NULL, '25252536', '2021-05-28', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-17 15:41:53', '2021-05-17 15:41:53', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(33, 149, NULL, NULL, NULL, NULL, '?????? ????????????????', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5656565', '656565', 'on', '7', NULL, NULL, NULL, '656565', '233223423423', '????????????????', NULL, 'transh', NULL, NULL, NULL, NULL, '25252536', '2021-05-26', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-17 15:46:20', '2021-05-17 15:46:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(34, 151, 72, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-20', NULL, NULL, 'tariff', NULL, NULL, NULL, NULL, '656565', '11111', '????????????????', 'CNY', 'transh', NULL, 6.00, 'preim', 5.00, '25252536', '2021-05-14', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-28', 'documents_podraydchik/XmP07cBXp8JRofzpHw7lZ6v8dECZoiIUrDxxax6t.jpg', 'dggdgdf', 'fsfsdf', '5', NULL, '2021-05-26', 'fszfsdf', '2021-05-17 17:00:57', '2021-05-17 17:00:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(35, 152, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????????????????????????? ????????', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tariff', NULL, NULL, NULL, NULL, '656565', '233223423423', '????????????????', 'EUR', 'transh', NULL, 25.00, 'preim', 25.00, '222222222222222222222', '2021-05-21', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5354', '2525', '422', 'asdadsads', '2542', '242', '1', 'fasdffs', 'dfsdfsf', 'fsdfsdf', '1', 'sfsdf', '1', 'fsdfsdf', '4', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-17 17:12:06', '2021-05-17 17:12:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(36, 153, 73, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdccdscds', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-19', '2021-05-20', NULL, NULL, 'tariff', NULL, NULL, NULL, NULL, '656565', '11111', '????????????????', 'CNY', 'transh', NULL, 5.00, 'preim', 7.00, '25252536', '2021-05-19', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-17 17:19:46', '2021-05-17 17:19:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(37, 156, NULL, NULL, NULL, NULL, '?????? ????????????????', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5656565', '656565', 'on', '6', NULL, NULL, NULL, 'goallllll', '233223423423', '????????????????', NULL, 'transh', NULL, NULL, NULL, NULL, '222222222222222222222', '2021-05-07', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-17 19:33:59', '2021-05-17 19:33:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(38, 157, NULL, NULL, NULL, NULL, '?????? ????????????????', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5656565', '656565', 'on', '6', NULL, NULL, NULL, '656565', '233223423423', '????????????????', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-17 19:34:45', '2021-05-17 19:34:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(39, 158, NULL, NULL, NULL, NULL, '?????? ????????????????', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5656565', '656565', 'on', '6', NULL, NULL, NULL, '656565', '233223423423', '11111', NULL, 'transh', NULL, NULL, NULL, NULL, '25252536', '2021-05-21', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-17 19:37:33', '2021-05-17 19:37:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(40, 159, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'xxsxxxx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-19', '2021-05-06', NULL, NULL, 'tariff', NULL, NULL, NULL, NULL, '25452', '4524', '58585858', 'GBP', 'transh', NULL, 5.00, 'preim', 5.00, '2525', '2021-05-08', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '245', '2452', '452', '2452', '245', '2', '1', 'css', 'cdscdc', 'dscdsc', '1', 'csdcds', '1', 'cdscsd', '2', '3', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-18 10:51:19', '2021-05-18 10:51:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(41, 160, 75, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dgffggfdgf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-15', '2021-05-21', NULL, NULL, 'tariff', NULL, NULL, NULL, NULL, '452453453', '45345345', '4534534', 'USD', 'transh', NULL, 7.00, 'preim', 8.00, '354345345', '2021-05-21', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-18 11:32:47', '2021-05-18 11:32:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `all_products` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.all_products_terms_transhes
CREATE TABLE IF NOT EXISTS `all_products_terms_transhes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `all_products_id` bigint(20) unsigned DEFAULT NULL,
  `payment_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `all_products_terms_transhes_all_products_id_foreign` (`all_products_id`),
  CONSTRAINT `all_products_terms_transhes_all_products_id_foreign` FOREIGN KEY (`all_products_id`) REFERENCES `all_products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.all_products_terms_transhes: ~41 rows (approximately)
DELETE FROM `all_products_terms_transhes`;
/*!40000 ALTER TABLE `all_products_terms_transhes` DISABLE KEYS */;
INSERT INTO `all_products_terms_transhes` (`id`, `all_products_id`, `payment_sum`, `payment_from`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 8, NULL, NULL, '2021-05-07 10:47:25', '2021-05-07 10:47:25', NULL),
	(2, 9, '["213245"]', '["2021-05-15"]', '2021-05-07 10:51:25', '2021-05-07 10:51:25', NULL),
	(3, 10, '["213245"]', '["2021-05-26"]', '2021-05-07 11:01:21', '2021-05-07 14:39:54', NULL),
	(4, 11, '["44444444444444","888888888888888"]', '["2021-05-13","2021-05-08"]', '2021-05-07 15:37:34', '2021-05-07 15:37:34', NULL),
	(5, 12, '["uhuhuh"]', '["2021-05-06"]', '2021-05-08 06:53:47', '2021-05-08 06:53:47', NULL),
	(6, 13, '["000000000000"]', '["2021-05-06"]', '2021-05-08 07:03:08', '2021-05-08 07:18:12', '2021-05-08 07:18:12'),
	(7, 14, '["588585"]', '["2021-05-22"]', '2021-05-09 16:29:07', '2021-05-09 16:29:07', NULL),
	(8, 16, '["213245"]', '["2021-05-12"]', '2021-05-09 17:49:52', '2021-05-09 18:07:06', '2021-05-09 18:07:06'),
	(9, 16, '["213245"]', '["2021-05-12"]', '2021-05-09 17:51:55', '2021-05-09 18:07:06', '2021-05-09 18:07:06'),
	(10, 16, '["213245"]', '["2021-05-12"]', '2021-05-09 17:52:04', '2021-05-09 18:07:06', '2021-05-09 18:07:06'),
	(11, 16, '["213245"]', '["2021-05-12"]', '2021-05-09 18:06:07', '2021-05-09 18:07:06', '2021-05-09 18:07:06'),
	(12, 17, '["11111111111111"]', '["2021-05-15"]', '2021-05-10 16:12:46', '2021-05-10 17:19:57', '2021-05-10 17:19:57'),
	(13, 17, '["uhuhuh","213245"]', '["2021-05-15","2021-05-20"]', '2021-05-10 17:09:45', '2021-05-10 17:19:57', '2021-05-10 17:19:57'),
	(14, 17, '["1111111111111111111111"]', '["2021-06-02"]', '2021-05-10 17:14:10', '2021-05-10 17:19:57', '2021-05-10 17:19:57'),
	(15, 17, '["1111111111111"]', '["2021-05-15"]', '2021-05-10 17:17:53', '2021-05-10 17:19:57', '2021-05-10 17:19:57'),
	(16, 21, '["255555555555"]', '["2021-05-21"]', '2021-05-12 06:37:47', '2021-05-12 07:46:36', NULL),
	(17, 21, '["000000000000"]', '["2021-05-21"]', '2021-05-12 07:44:59', '2021-05-12 07:44:59', NULL),
	(18, 23, '["uhuhuh"]', '[null]', '2021-05-12 13:50:33', '2021-05-12 13:50:33', NULL),
	(19, 23, '["uhuhuh"]', '[null]', '2021-05-12 13:51:32', '2021-05-12 13:51:32', NULL),
	(20, 23, '["uhuhuh"]', '[null]', '2021-05-12 13:52:45', '2021-05-12 13:52:45', NULL),
	(21, 21, '["255555555555"]', '["2021-05-21"]', '2021-05-12 15:15:00', '2021-05-12 15:15:00', NULL),
	(22, 19, '["000000000000000000000000"]', '[null]', '2021-05-12 15:17:55', '2021-05-12 15:17:55', NULL),
	(23, 24, '["2454245"]', '["2021-05-18"]', '2021-05-12 15:23:50', '2021-05-12 15:23:50', NULL),
	(24, 25, '["213245"]', '["2021-05-07"]', '2021-05-12 15:30:45', '2021-05-12 15:30:45', NULL),
	(25, 26, '["213245"]', '["2021-05-09"]', '2021-05-12 15:50:14', '2021-05-12 15:50:14', NULL),
	(26, 26, '["213245"]', '["2021-05-09"]', '2021-05-12 15:52:15', '2021-05-12 15:52:15', NULL),
	(27, 26, '["213245"]', '["2021-05-09"]', '2021-05-12 15:52:34', '2021-05-12 15:52:34', NULL),
	(28, 26, '["213245"]', '["2021-05-09"]', '2021-05-12 15:59:59', '2021-05-12 15:59:59', NULL),
	(29, 28, '["edwedwed"]', '["2021-06-02"]', '2021-05-14 09:15:35', '2021-05-14 09:15:35', NULL),
	(30, 28, '["edwedwed"]', '["2021-06-02"]', '2021-05-14 09:24:35', '2021-05-14 09:24:35', NULL),
	(31, 28, '["edwedwed"]', '["2021-06-02"]', '2021-05-14 09:31:52', '2021-05-14 09:31:52', NULL),
	(32, 28, '["edwedwed"]', '["2021-06-02"]', '2021-05-14 09:34:44', '2021-05-14 09:34:44', NULL),
	(33, 28, '["edwedwed"]', '["2021-06-02"]', '2021-05-14 09:38:53', '2021-05-14 09:38:53', NULL),
	(34, 28, '["edwedwed"]', '["2021-06-02"]', '2021-05-14 09:46:55', '2021-05-14 09:46:55', NULL),
	(35, 28, '["edwedwed"]', '["2021-06-02"]', '2021-05-14 09:50:09', '2021-05-14 09:50:09', NULL),
	(36, 30, '["11111111111111","0000000000"]', '["2021-05-29","2021-05-14"]', '2021-05-16 17:32:27', '2021-05-16 19:11:59', NULL),
	(39, 29, '["0000000000000000","213245"]', '["2021-05-19","2021-05-20"]', '2021-05-16 19:32:50', '2021-05-16 19:33:54', '2021-05-16 19:33:54'),
	(40, 38, NULL, NULL, '2021-05-17 19:34:45', '2021-05-17 19:34:45', NULL),
	(41, 39, '["213245"]', '["2021-05-08"]', '2021-05-17 19:37:33', '2021-05-17 19:37:33', NULL),
	(42, 40, '["252525","254225"]', '["2021-06-03","2021-05-26"]', '2021-05-18 10:51:19', '2021-05-18 10:51:19', NULL),
	(43, 41, '["453453453"]', '["2021-05-15"]', '2021-05-18 11:32:47', '2021-05-18 11:32:47', NULL);
/*!40000 ALTER TABLE `all_products_terms_transhes` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.all_product_followers
CREATE TABLE IF NOT EXISTS `all_product_followers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `all_products_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.all_product_followers: ~0 rows (approximately)
DELETE FROM `all_product_followers`;
/*!40000 ALTER TABLE `all_product_followers` DISABLE KEYS */;
/*!40000 ALTER TABLE `all_product_followers` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.all_product_imushestvo_infos
CREATE TABLE IF NOT EXISTS `all_product_imushestvo_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `all_product_id` int(11) NOT NULL,
  `name_property` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_property` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_issue_property` date NOT NULL,
  `count_property` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `units_property` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `insurance_cost` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `insurance_sum` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `insurance_premium` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.all_product_imushestvo_infos: ~0 rows (approximately)
DELETE FROM `all_product_imushestvo_infos`;
/*!40000 ALTER TABLE `all_product_imushestvo_infos` DISABLE KEYS */;
/*!40000 ALTER TABLE `all_product_imushestvo_infos` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.all_product_information
CREATE TABLE IF NOT EXISTS `all_product_information` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `all_products_id` bigint(20) unsigned DEFAULT NULL,
  `policy_series` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'need to delete',
  `policy_id` bigint(20) DEFAULT NULL COMMENT 'policy_id',
  `otvet_litso` bigint(20) DEFAULT NULL COMMENT 'agent_id',
  `policy_insurance_from` date DEFAULT NULL,
  `mark_model` text COLLATE utf8mb4_unicode_ci,
  `polis_number` text COLLATE utf8mb4_unicode_ci,
  `god_vipuska` text COLLATE utf8mb4_unicode_ci,
  `data_vidachi` text COLLATE utf8mb4_unicode_ci,
  `mark` text COLLATE utf8mb4_unicode_ci,
  `model` text COLLATE utf8mb4_unicode_ci,
  `gos_nomer` text COLLATE utf8mb4_unicode_ci,
  `nomer_teh_pasporta` text COLLATE utf8mb4_unicode_ci,
  `nomer_dvigatelya` text COLLATE utf8mb4_unicode_ci,
  `nomer_kuzova` text COLLATE utf8mb4_unicode_ci,
  `strah_stoimost` text COLLATE utf8mb4_unicode_ci,
  `strah_summa` text COLLATE utf8mb4_unicode_ci,
  `strah_premiya` text COLLATE utf8mb4_unicode_ci,
  `name` text COLLATE utf8mb4_unicode_ci,
  `series_number` text COLLATE utf8mb4_unicode_ci,
  `insurance_sum_of_transport` text COLLATE utf8mb4_unicode_ci,
  `cover_terror_attacks_sum` text COLLATE utf8mb4_unicode_ci,
  `cover_terror_attacks_currency` text COLLATE utf8mb4_unicode_ci,
  `cover_terror_attacks_insured_sum` text COLLATE utf8mb4_unicode_ci,
  `cover_terror_attacks_insured_currency` text COLLATE utf8mb4_unicode_ci,
  `coverage_evacuation_cost` text COLLATE utf8mb4_unicode_ci,
  `coverage_evacuation_currency` text COLLATE utf8mb4_unicode_ci,
  `strtahovka` text COLLATE utf8mb4_unicode_ci,
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
  `limit_one_sum` text COLLATE utf8mb4_unicode_ci,
  `limit_currency` text COLLATE utf8mb4_unicode_ci,
  `limit_total_sum` text COLLATE utf8mb4_unicode_ci,
  `limit_preim_sum` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.all_product_information: ~96 rows (approximately)
DELETE FROM `all_product_information`;
/*!40000 ALTER TABLE `all_product_information` DISABLE KEYS */;
INSERT INTO `all_product_information` (`id`, `all_products_id`, `policy_series`, `policy_id`, `otvet_litso`, `policy_insurance_from`, `mark_model`, `polis_number`, `god_vipuska`, `data_vidachi`, `mark`, `model`, `gos_nomer`, `nomer_teh_pasporta`, `nomer_dvigatelya`, `nomer_kuzova`, `strah_stoimost`, `strah_summa`, `strah_premiya`, `name`, `series_number`, `insurance_sum_of_transport`, `cover_terror_attacks_sum`, `cover_terror_attacks_currency`, `cover_terror_attacks_insured_sum`, `cover_terror_attacks_insured_currency`, `coverage_evacuation_cost`, `coverage_evacuation_currency`, `strtahovka`, `other_insurance_info`, `vehicle_damage`, `one_sum`, `one_premia`, `one_franshiza`, `civil_liability`, `tho_sum`, `two_preim`, `accidents`, `driver_quantity`, `driver_one_sum`, `driver_currency`, `driver_total_sum`, `driver_preim_sum`, `passenger_quantity`, `passenger_one_sum`, `passenger_currency`, `passenger_total_sum`, `passenger_preim_sum`, `limit_one_sum`, `limit_currency`, `limit_total_sum`, `limit_preim_sum`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, '2342342', NULL, 1, '2021-04-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-19 06:12:27', '2021-04-19 06:12:27', NULL),
	(2, 2, '2342342', NULL, 1, '2021-04-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-19 06:13:24', '2021-04-19 06:13:24', NULL),
	(3, 3, '451165', NULL, 1, '2021-05-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-07 10:37:22', '2021-05-07 10:37:22', NULL),
	(4, 4, '451165', NULL, 1, '2021-05-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-07 10:44:37', '2021-05-07 10:44:37', NULL),
	(5, 5, '451165', NULL, 1, '2021-05-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-07 10:45:34', '2021-05-07 10:45:34', NULL),
	(6, 6, '451165', NULL, 1, '2021-05-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-07 10:46:42', '2021-05-07 10:46:42', NULL),
	(7, 7, '451165', NULL, 1, '2021-05-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-07 10:46:59', '2021-05-07 10:46:59', NULL),
	(8, 8, '451165', NULL, 1, '2021-05-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-07 10:47:25', '2021-05-07 10:47:25', NULL),
	(9, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-07 10:47:25', '2021-05-07 10:47:25', NULL),
	(10, 9, '451165', NULL, 1, '2021-05-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-07 10:51:25', '2021-05-07 10:51:25', NULL),
	(11, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-07 10:51:25', '2021-05-07 10:51:25', NULL),
	(12, 10, '451165', NULL, 1, '2021-05-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-07 11:01:21', '2021-05-07 14:56:03', NULL),
	(13, 11, '451165', NULL, 1, '2021-05-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-07 15:37:34', '2021-05-07 15:37:34', NULL),
	(14, 12, '451165', NULL, 1, '2021-05-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-08 06:53:47', '2021-05-08 06:53:47', NULL),
	(15, 13, '1111111111111111111', NULL, 1, '2021-05-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-08 07:03:08', '2021-05-08 07:18:12', '2021-05-08 07:18:12'),
	(16, 14, '58588558', NULL, 1, '2021-05-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-09 16:29:07', '2021-05-09 16:29:07', NULL),
	(17, 15, '451165', NULL, 1, '2021-05-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-09 16:39:14', '2021-05-09 16:39:14', NULL),
	(18, 16, '11111111111111', NULL, 1, '2021-05-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-09 16:48:44', '2021-05-09 18:07:06', '2021-05-09 18:07:06'),
	(19, 17, '111111111111111111', NULL, 1, '2021-05-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-10 16:12:46', '2021-05-10 17:19:57', '2021-05-10 17:19:57'),
	(20, 18, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-11 15:17:08', '2021-05-12 06:28:17', NULL),
	(21, 18, NULL, NULL, 1, NULL, '"544225"', '"vfdv"', '"2021-05-13"', '"2021-05-19"', '"gttgr"', '"rgtgrt"', '"rgtgr"', '"5225452"', '"42245452"', '"252"', '"245452"', '"2225"', '"22445"', '"225"', '"454525"', '"6"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-11 15:17:08', '2021-05-11 15:17:08', NULL),
	(22, 19, '00000000000000000000000', NULL, 1, '2021-05-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-11 15:26:01', '2021-05-12 15:17:55', NULL),
	(23, 19, NULL, NULL, 1, NULL, '"\\u041c\\u0430\\u0440\\u043a\\u0430, \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c, \\u043c\\u043e\\u0434\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f \\u0422\\u0421"', NULL, NULL, NULL, NULL, NULL, NULL, '"ghfgfh"', NULL, '"fghfgh"', '"fgh"', NULL, '"fgh2fgf"', '"sdad"', NULL, '"6"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-11 15:26:01', '2021-05-11 15:26:01', NULL),
	(24, 19, NULL, NULL, 1, NULL, '"gffghfg"', '"vfdv"', NULL, NULL, '"gttgr"', NULL, NULL, '"fhgfgh"', '"fghfg"', '"hfh"', '"fghfgh"', NULL, NULL, '"hfgh"', '"fg2hfgh2"', '"5"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-11 15:26:01', '2021-05-11 15:26:01', NULL),
	(25, 20, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-11 15:26:55', '2021-05-12 06:34:36', NULL),
	(26, 20, NULL, NULL, 1, NULL, '"\\u041c\\u0430\\u0440\\u043a\\u0430, \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c, \\u043c\\u043e\\u0434\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f \\u0422\\u0421"', NULL, NULL, NULL, NULL, NULL, NULL, '"ghfgfh"', NULL, '"fghfgh"', '"fgh"', NULL, '"fgh2fgf"', '"sdad"', NULL, '"6"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-11 15:26:55', '2021-05-11 15:26:55', NULL),
	(27, 20, NULL, NULL, 1, NULL, '"gffghfg"', '"vfdv"', NULL, NULL, '"gttgr"', NULL, NULL, '"fhgfgh"', '"fghfg"', '"hfh"', '"fghfgh"', NULL, NULL, '"hfgh"', '"fg2hfgh2"', '"5"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-11 15:26:55', '2021-05-11 15:26:55', NULL),
	(28, 21, '00000000000000000000', NULL, 1, '2021-05-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-12 06:37:47', '2021-05-12 15:15:00', '2021-05-12 15:15:00'),
	(29, 21, '524252', NULL, 1, '2021-05-21', '"ghjghjg"', '"ghghjg"', NULL, NULL, '"gjghj"', NULL, NULL, '"ghjghj"', '"ghjgh"', '"ghjgh"', NULL, NULL, NULL, '"hjghj"', '"ghjghj"', '"6"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-12 06:37:47', '2021-05-12 15:15:00', '2021-05-12 15:15:00'),
	(30, 22, '365363636', NULL, 1, '2021-05-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-12 13:11:47', '2021-05-12 15:11:39', '2021-05-12 15:11:39'),
	(31, 22, NULL, NULL, 1, NULL, '"\\u041c\\u0430\\u0440\\u043a\\u0430, \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c, \\u043c\\u043e\\u0434\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f \\u0422\\u0421"', '"vfdv"', '"2021-05-15"', '"2021-05-22"', '"gttgr"', '"rgtgrt"', '"335563"', '"653"', '"36363"', '"3336"', '"65336"', '"33"', '"3336"', '"sdad"', '"\\u0421\\u0435\\u0440\\u0438\\u0439\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-12 13:11:47', '2021-05-12 15:11:39', '2021-05-12 15:11:39'),
	(32, 23, '451165', NULL, 1, '2021-05-14', '{"32":null}', '{"33":"0","34":"1"}', '{"33":null,"34":null}', '{"33":null,"34":null}', '{"33":null,"34":null}', '{"33":null,"34":null}', '{"33":null,"34":null}', '{"33":null,"34":null}', '{"33":null,"34":null}', '{"33":null,"34":null}', '{"33":null,"34":null}', '{"33":null,"34":null}', '{"33":null,"34":null}', '{"32":null}', '{"32":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-12 13:24:39', '2021-05-12 13:52:45', NULL),
	(33, 23, NULL, NULL, 1, NULL, '"1"', '"2"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-12 13:24:39', '2021-05-12 13:24:39', NULL),
	(34, 23, NULL, NULL, 1, NULL, '"2"', '"1"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-12 13:24:39', '2021-05-12 13:24:39', NULL),
	(35, 22, NULL, NULL, 1, NULL, NULL, '"00000000000"', '"2021-05-15"', '"2021-05-22"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-12 15:10:50', '2021-05-12 15:11:39', '2021-05-12 15:11:39'),
	(36, 22, NULL, NULL, 1, NULL, NULL, '"00000000000"', '"2021-05-15"', '"2021-05-22"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-12 15:11:39', '2021-05-12 15:11:39', NULL),
	(37, 21, NULL, NULL, 1, NULL, NULL, '"111111111111111"', NULL, NULL, '"gjghj"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-12 15:15:00', '2021-05-12 15:15:00', NULL),
	(38, 21, NULL, NULL, 1, NULL, NULL, '"11111111"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-12 15:15:00', '2021-05-12 15:15:00', NULL),
	(39, 19, NULL, NULL, 1, NULL, NULL, '"000000000000000"', NULL, NULL, '"gttgr"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-12 15:17:55', '2021-05-12 15:17:55', NULL),
	(40, 24, '451165', NULL, 1, '2021-05-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-12 15:23:50', '2021-05-12 15:23:50', NULL),
	(41, 24, NULL, NULL, 1, NULL, '[null]', '["vfdv"]', '[null]', '[null]', '["gttgr"]', '["rgtgrt"]', '["rgtgr"]', '["5225452"]', '[null]', '[null]', '[null]', '[null]', '[null]', '[null]', '[null]', '"goallllll"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-12 15:23:50', '2021-05-12 15:23:50', NULL),
	(42, 25, '6568974', NULL, 1, '2021-05-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-12 15:30:45', '2021-05-12 15:30:45', NULL),
	(43, 25, NULL, NULL, 1, NULL, '[null]', '["25"]', '["2021-05-13"]', '["2021-05-20"]', '["gttgr"]', '["rgtgrt"]', '["335563"]', '["5225452"]', '["42245452"]', '["252"]', '["245452"]', '["2225"]', '["22445"]', '[null]', '[null]', '"656565"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-12 15:30:45', '2021-05-12 15:30:45', NULL),
	(44, 26, '2121212', NULL, 1, '2021-05-16', '{"44":null}', '{"45":"11111"}', '{"45":"2021-05-22"}', '{"45":"2021-05-18"}', '{"45":"gttgr"}', '{"45":null}', '{"45":"rgtgr"}', '{"45":"5225452"}', '{"45":"42245452"}', '{"45":"252"}', '{"45":"245452"}', '{"45":"2225"}', '{"45":"2225"}', '{"44":null}', '{"44":null}', '"656565"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-12 15:50:14', '2021-05-12 15:59:59', NULL),
	(45, 26, NULL, NULL, 1, NULL, '"\\u041c\\u0430\\u0440\\u043a\\u0430, \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c, \\u043c\\u043e\\u0434\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f \\u0422\\u0421"', '"vfdv"', '"2021-05-22"', '"2021-05-18"', '"gttgr"', NULL, '"rgtgr"', '"5225452"', '"42245452"', '"252"', '"245452"', '"2225"', '"22445"', '"sdad"', '"\\u0421\\u0435\\u0440\\u0438\\u0439\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440"', '"6"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-12 15:50:14', '2021-05-12 15:50:14', NULL),
	(46, 27, '451165', NULL, 1, '2021-06-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-12 16:08:40', '2021-05-12 16:50:03', '2021-05-12 16:50:03'),
	(47, 27, NULL, NULL, 1, NULL, '"\\u041c\\u0430\\u0440\\u043a\\u0430, \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c, \\u043c\\u043e\\u0434\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f \\u0422\\u0421"', '"sfsdfsf"', NULL, NULL, '"sdfsd"', '"fsdf"', '"sdf"', '"sdfsdf"', '"sdfsd"', NULL, NULL, NULL, NULL, '"sdad"', '"\\u0421\\u0435\\u0440\\u0438\\u0439\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-12 16:08:40', '2021-05-12 16:50:03', '2021-05-12 16:50:03'),
	(48, 27, NULL, NULL, 1, NULL, '"\\u041c\\u0430\\u0440\\u043a\\u0430, \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c, \\u043c\\u043e\\u0434\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f \\u0422\\u0421"', '"sfsdfsf"', NULL, NULL, '"sdfsd"', '"fsdf"', '"sdf"', '"sdfsdf"', '"sdfsd"', NULL, NULL, NULL, NULL, '"sdadsdcds"', '"\\u0421\\u0435\\u0440\\u0438\\u0439\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440"', NULL, '"cdscdsdcscds"', '"1"', '"cdscdscdscds"', '"1"', NULL, '"UZS"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '"1"', NULL, '"1"', NULL, NULL, NULL, NULL, '"1"', NULL, NULL, NULL, '"1"', NULL, NULL, '2021-05-12 16:17:34', '2021-05-12 16:50:03', '2021-05-12 16:50:03'),
	(49, 27, NULL, NULL, 1, NULL, '"\\u041c\\u0430\\u0440\\u043a\\u0430, \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c, \\u043c\\u043e\\u0434\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f \\u0422\\u0421"', '"sfsdfsf"', NULL, NULL, '"sdfsd"', '"fsdf"', '"sdf"', '"sdfsdf"', '"sdfsd"', NULL, NULL, NULL, NULL, '"sdad"', '"\\u0421\\u0435\\u0440\\u0438\\u0439\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440"', NULL, NULL, '"1"', NULL, '"1"', NULL, '"UZS"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '"1"', NULL, '"1"', NULL, NULL, NULL, NULL, '"1"', NULL, NULL, NULL, '"1"', NULL, NULL, '2021-05-12 16:23:27', '2021-05-12 16:50:03', '2021-05-12 16:50:03'),
	(50, 27, '1656565', 1, 1, NULL, '"\\u041c\\u0430\\u0440\\u043a\\u0430, \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c, \\u043c\\u043e\\u0434\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f \\u0422\\u0421"', '"11111111111111111111111111"', NULL, NULL, '"sdfsd"', '"fsdf"', '"sdf"', '"sdfsdf"', '"sdfsd"', NULL, NULL, NULL, NULL, '"sdadsdcds"', '"\\u0421\\u0435\\u0440\\u0438\\u0439\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440"', NULL, '"cdscdsdcscds"', '"1"', '"cdscdscdscds"', '"1"', NULL, '"USD"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '"1"', NULL, '"1"', NULL, NULL, NULL, NULL, '"1"', NULL, NULL, NULL, '"1"', NULL, NULL, '2021-05-12 16:23:27', '2021-05-12 16:50:03', '2021-05-12 16:50:03'),
	(51, 27, NULL, NULL, 1, NULL, '"\\u041c\\u0430\\u0440\\u043a\\u0430, \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c, \\u043c\\u043e\\u0434\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f \\u0422\\u0421"', '"sfsdfsf"', NULL, NULL, '"sdfsd"', '"fsdf"', '"sdf"', '"sdfsdf"', '"sdfsd"', NULL, NULL, NULL, NULL, '"sdad"', '"\\u0421\\u0435\\u0440\\u0438\\u0439\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440"', NULL, NULL, '"1"', NULL, '"1"', NULL, '"UZS"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '"1"', NULL, '"1"', NULL, NULL, NULL, NULL, '"1"', NULL, NULL, NULL, '"1"', NULL, NULL, '2021-05-12 16:47:59', '2021-05-12 16:50:03', '2021-05-12 16:50:03'),
	(52, 27, NULL, NULL, 1, NULL, '"\\u041c\\u0430\\u0440\\u043a\\u0430, \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c, \\u043c\\u043e\\u0434\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f \\u0422\\u0421"', '"11111111111111111"', NULL, NULL, '"sdfsd"', '"fsdf"', '"sdf"', '"sdfsdf"', '"sdfsd"', NULL, NULL, NULL, NULL, '"sdadsdcds"', '"\\u0421\\u0435\\u0440\\u0438\\u0439\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440"', NULL, '"cdscdsdcscds"', '"1"', '"cdscdscdscds"', '"1"', NULL, '"USD"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '"1"', NULL, '"1"', NULL, NULL, NULL, NULL, '"1"', NULL, NULL, NULL, '"1"', NULL, NULL, '2021-05-12 16:47:59', '2021-05-12 16:50:03', '2021-05-12 16:50:03'),
	(53, 27, NULL, NULL, 1, NULL, '"\\u041c\\u0430\\u0440\\u043a\\u0430, \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c, \\u043c\\u043e\\u0434\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f \\u0422\\u0421"', '"sfsdfsf"', NULL, NULL, '"sdfsd"', '"fsdf"', '"sdf"', '"sdfsdf"', '"sdfsd"', NULL, NULL, NULL, NULL, '"sdad"', '"\\u0421\\u0435\\u0440\\u0438\\u0439\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440"', NULL, NULL, '"1"', NULL, '"1"', NULL, '"UZS"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '"1"', NULL, '"1"', NULL, NULL, NULL, NULL, '"1"', NULL, NULL, NULL, '"1"', NULL, NULL, '2021-05-12 16:48:45', '2021-05-12 16:50:03', '2021-05-12 16:50:03'),
	(54, 27, NULL, NULL, 1, NULL, '"\\u041c\\u0430\\u0440\\u043a\\u0430, \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c, \\u043c\\u043e\\u0434\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f \\u0422\\u0421"', '"11111111111111111"', NULL, NULL, '"sdfsd"', '"fsdf"', '"sdf"', '"sdfsdf"', '"sdfsd"', NULL, NULL, NULL, NULL, '"sdadsdcds"', '"\\u0421\\u0435\\u0440\\u0438\\u0439\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440"', NULL, '"cdscdsdcscds"', '"1"', '"cdscdscdscds"', '"1"', NULL, '"USD"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '"1"', NULL, '"1"', NULL, NULL, NULL, NULL, '"1"', NULL, NULL, NULL, '"1"', NULL, NULL, '2021-05-12 16:48:45', '2021-05-12 16:50:03', '2021-05-12 16:50:03'),
	(55, 27, NULL, NULL, 1, NULL, '"\\u041c\\u0430\\u0440\\u043a\\u0430, \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c, \\u043c\\u043e\\u0434\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f \\u0422\\u0421"', '"sfsdfsf"', NULL, NULL, '"sdfsd"', '"fsdf"', '"sdf"', '"sdfsdf"', '"sdfsd"', NULL, NULL, NULL, NULL, '"sdad"', '"\\u0421\\u0435\\u0440\\u0438\\u0439\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440"', NULL, NULL, '"1"', NULL, '"1"', NULL, '"UZS"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '"1"', NULL, '"1"', NULL, NULL, NULL, NULL, '"1"', NULL, NULL, NULL, '"1"', NULL, NULL, '2021-05-12 16:48:59', '2021-05-12 16:50:03', '2021-05-12 16:50:03'),
	(56, 27, NULL, NULL, 1, NULL, '"\\u041c\\u0430\\u0440\\u043a\\u0430, \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c, \\u043c\\u043e\\u0434\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f \\u0422\\u0421"', '"sfsdfsf"', NULL, NULL, '"sdfsd"', '"fsdf"', '"sdf"', '"sdfsdf"', '"sdfsd"', NULL, NULL, NULL, NULL, '"sdadsdcds"', '"\\u0421\\u0435\\u0440\\u0438\\u0439\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440"', NULL, '"cdscdsdcscds"', '"1"', '"cdscdscdscds"', '"1"', NULL, '"USD"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '"1"', NULL, '"1"', NULL, NULL, NULL, NULL, '"1"', NULL, NULL, NULL, '"1"', NULL, NULL, '2021-05-12 16:48:59', '2021-05-12 16:50:03', '2021-05-12 16:50:03'),
	(57, 27, NULL, NULL, 1, NULL, '"\\u041c\\u0430\\u0440\\u043a\\u0430, \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c, \\u043c\\u043e\\u0434\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f \\u0422\\u0421"', '"sfsdfsf"', NULL, NULL, '"sdfsd"', '"fsdf"', '"sdf"', '"sdfsdf"', '"sdfsd"', NULL, NULL, NULL, NULL, '"sdad"', '"\\u0421\\u0435\\u0440\\u0438\\u0439\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440"', NULL, NULL, '"1"', NULL, '"1"', NULL, '"USD"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '"1"', NULL, '"1"', NULL, NULL, NULL, NULL, '"1"', NULL, NULL, NULL, '"1"', NULL, NULL, '2021-05-12 16:48:59', '2021-05-12 16:50:03', '2021-05-12 16:50:03'),
	(58, 27, NULL, NULL, 1, NULL, '"\\u041c\\u0430\\u0440\\u043a\\u0430, \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c, \\u043c\\u043e\\u0434\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f \\u0422\\u0421"', '"11111111111111111111111111"', NULL, NULL, '"sdfsd"', '"fsdf"', '"sdf"', '"sdfsdf"', '"sdfsd"', NULL, NULL, NULL, NULL, '"sdadsdcds"', '"\\u0421\\u0435\\u0440\\u0438\\u0439\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440"', NULL, '"cdscdsdcscds"', '"1"', '"cdscdscdscds"', '"1"', NULL, '"USD"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '"1"', NULL, '"1"', NULL, NULL, NULL, NULL, '"1"', NULL, NULL, NULL, '"1"', NULL, NULL, '2021-05-12 16:48:59', '2021-05-12 16:50:03', '2021-05-12 16:50:03'),
	(59, 27, NULL, NULL, 1, NULL, '"\\u041c\\u0430\\u0440\\u043a\\u0430, \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c, \\u043c\\u043e\\u0434\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f \\u0422\\u0421"', '"sfsdfsf"', NULL, NULL, '"sdfsd"', '"fsdf"', '"sdf"', '"sdfsdf"', '"sdfsd"', NULL, NULL, NULL, NULL, '"sdad"', '"\\u0421\\u0435\\u0440\\u0438\\u0439\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440"', NULL, NULL, '"1"', NULL, '"1"', NULL, '"USD"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '"1"', NULL, '"1"', NULL, NULL, NULL, NULL, '"1"', NULL, NULL, NULL, '"1"', NULL, NULL, '2021-05-12 16:48:59', '2021-05-12 16:50:03', '2021-05-12 16:50:03'),
	(60, 27, NULL, NULL, 1, NULL, '"\\u041c\\u0430\\u0440\\u043a\\u0430, \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c, \\u043c\\u043e\\u0434\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f \\u0422\\u0421"', '"11111111111111111"', NULL, NULL, '"sdfsd"', '"fsdf"', '"sdf"', '"sdfsdf"', '"sdfsd"', NULL, NULL, NULL, NULL, '"sdadsdcds"', '"\\u0421\\u0435\\u0440\\u0438\\u0439\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440"', NULL, '"cdscdsdcscds"', '"1"', '"cdscdscdscds"', '"1"', NULL, '"USD"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '"1"', NULL, '"1"', NULL, NULL, NULL, NULL, '"1"', NULL, NULL, NULL, '"1"', NULL, NULL, '2021-05-12 16:48:59', '2021-05-12 16:50:03', '2021-05-12 16:50:03'),
	(61, 27, NULL, NULL, 1, NULL, '"\\u041c\\u0430\\u0440\\u043a\\u0430, \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c, \\u043c\\u043e\\u0434\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f \\u0422\\u0421"', '"sfsdfsf"', NULL, NULL, '"sdfsd"', '"fsdf"', '"sdf"', '"sdfsdf"', '"sdfsd"', NULL, NULL, NULL, NULL, '"sdad"', '"\\u0421\\u0435\\u0440\\u0438\\u0439\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440"', NULL, NULL, '"1"', NULL, '"1"', NULL, '"USD"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '"1"', NULL, '"1"', NULL, NULL, NULL, NULL, '"1"', NULL, NULL, NULL, '"1"', NULL, NULL, '2021-05-12 16:48:59', '2021-05-12 16:50:03', '2021-05-12 16:50:03'),
	(62, 27, NULL, NULL, 1, NULL, '"\\u041c\\u0430\\u0440\\u043a\\u0430, \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c, \\u043c\\u043e\\u0434\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f \\u0422\\u0421"', '"11111111111111111"', NULL, NULL, '"sdfsd"', '"fsdf"', '"sdf"', '"sdfsdf"', '"sdfsd"', NULL, NULL, NULL, NULL, '"sdadsdcds"', '"\\u0421\\u0435\\u0440\\u0438\\u0439\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440"', NULL, '"cdscdsdcscds"', '"1"', '"cdscdscdscds"', '"1"', NULL, '"USD"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '"1"', NULL, '"1"', NULL, NULL, NULL, NULL, '"1"', NULL, NULL, NULL, '"1"', NULL, NULL, '2021-05-12 16:48:59', '2021-05-12 16:50:03', '2021-05-12 16:50:03'),
	(63, 27, NULL, NULL, 1, NULL, '"\\u041c\\u0430\\u0440\\u043a\\u0430, \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c, \\u043c\\u043e\\u0434\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f \\u0422\\u0421"', '"sfsdfsf"', NULL, NULL, '"sdfsd"', '"fsdf"', '"sdf"', '"sdfsdf"', '"sdfsd"', NULL, NULL, NULL, NULL, '"sdad"', '"\\u0421\\u0435\\u0440\\u0438\\u0439\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440"', NULL, NULL, '"1"', NULL, '"1"', NULL, '"UZS"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '"1"', NULL, '"1"', NULL, NULL, NULL, NULL, '"1"', NULL, NULL, NULL, '"1"', NULL, NULL, '2021-05-12 16:50:03', '2021-05-12 16:50:03', NULL),
	(64, 27, NULL, NULL, 1, NULL, '"\\u041c\\u0430\\u0440\\u043a\\u0430, \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c, \\u043c\\u043e\\u0434\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f \\u0422\\u0421"', '"sfsdfsf"', NULL, NULL, '"sdfsd"', '"fsdf"', '"sdf"', '"sdfsdf"', '"sdfsd"', NULL, NULL, NULL, NULL, '"sdadsdcds"', '"\\u0421\\u0435\\u0440\\u0438\\u0439\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440"', NULL, '"cdscdsdcscds"', '"1"', '"cdscdscdscds"', '"1"', NULL, '"USD"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '"1"', NULL, '"1"', NULL, NULL, NULL, NULL, '"1"', NULL, NULL, NULL, '"1"', NULL, NULL, '2021-05-12 16:50:03', '2021-05-12 16:50:03', NULL),
	(65, 27, NULL, NULL, 1, NULL, '"\\u041c\\u0430\\u0440\\u043a\\u0430, \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c, \\u043c\\u043e\\u0434\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f \\u0422\\u0421"', '"sfsdfsf"', NULL, NULL, '"sdfsd"', '"fsdf"', '"sdf"', '"sdfsdf"', '"sdfsd"', NULL, NULL, NULL, NULL, '"sdad"', '"\\u0421\\u0435\\u0440\\u0438\\u0439\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440"', NULL, NULL, '"1"', NULL, '"1"', NULL, '"USD"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '"1"', NULL, '"1"', NULL, NULL, NULL, NULL, '"1"', NULL, NULL, NULL, '"1"', NULL, NULL, '2021-05-12 16:50:03', '2021-05-12 16:50:03', NULL),
	(66, 27, NULL, NULL, 1, NULL, '"\\u041c\\u0430\\u0440\\u043a\\u0430, \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c, \\u043c\\u043e\\u0434\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f \\u0422\\u0421"', '"11111111111111111111111111"', NULL, NULL, '"sdfsd"', '"fsdf"', '"sdf"', '"sdfsdf"', '"sdfsd"', NULL, NULL, NULL, NULL, '"sdadsdcds"', '"\\u0421\\u0435\\u0440\\u0438\\u0439\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440"', NULL, '"cdscdsdcscds"', '"1"', '"cdscdscdscds"', '"1"', NULL, '"USD"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '"1"', NULL, '"1"', NULL, NULL, NULL, NULL, '"1"', NULL, NULL, NULL, '"1"', NULL, NULL, '2021-05-12 16:50:03', '2021-05-12 16:50:03', NULL),
	(67, 27, NULL, NULL, 1, NULL, '"\\u041c\\u0430\\u0440\\u043a\\u0430, \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c, \\u043c\\u043e\\u0434\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f \\u0422\\u0421"', '"sfsdfsf"', NULL, NULL, '"sdfsd"', '"fsdf"', '"sdf"', '"sdfsdf"', '"sdfsd"', NULL, NULL, NULL, NULL, '"sdad"', '"\\u0421\\u0435\\u0440\\u0438\\u0439\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440"', NULL, NULL, '"1"', NULL, '"1"', NULL, '"USD"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '"1"', NULL, '"1"', NULL, NULL, NULL, NULL, '"1"', NULL, NULL, NULL, '"1"', NULL, NULL, '2021-05-12 16:50:03', '2021-05-12 16:50:03', NULL),
	(68, 27, NULL, NULL, 1, NULL, '"\\u041c\\u0430\\u0440\\u043a\\u0430, \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c, \\u043c\\u043e\\u0434\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f \\u0422\\u0421"', '"11111111111111111"', NULL, NULL, '"sdfsd"', '"fsdf"', '"sdf"', '"sdfsdf"', '"sdfsd"', NULL, NULL, NULL, NULL, '"sdadsdcds"', '"\\u0421\\u0435\\u0440\\u0438\\u0439\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440"', NULL, '"cdscdsdcscds"', '"1"', '"cdscdscdscds"', '"1"', NULL, '"USD"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '"1"', NULL, '"1"', NULL, NULL, NULL, NULL, '"1"', NULL, NULL, NULL, '"1"', NULL, NULL, '2021-05-12 16:50:03', '2021-05-12 16:50:03', NULL),
	(69, 27, NULL, NULL, 1, NULL, '"\\u041c\\u0430\\u0440\\u043a\\u0430, \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c, \\u043c\\u043e\\u0434\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f \\u0422\\u0421"', '"sfsdfsf"', NULL, NULL, '"sdfsd"', '"fsdf"', '"sdf"', '"sdfsdf"', '"sdfsd"', NULL, NULL, NULL, NULL, '"sdad"', '"\\u0421\\u0435\\u0440\\u0438\\u0439\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440"', NULL, NULL, '"1"', NULL, '"1"', NULL, '"USD"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '"1"', NULL, '"1"', NULL, NULL, NULL, NULL, '"1"', NULL, NULL, NULL, '"1"', NULL, NULL, '2021-05-12 16:50:03', '2021-05-12 16:50:03', NULL),
	(70, 27, NULL, NULL, 1, NULL, '"\\u041c\\u0430\\u0440\\u043a\\u0430, \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c, \\u043c\\u043e\\u0434\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f \\u0422\\u0421"', '"11111111111111111"', NULL, NULL, '"sdfsd"', '"fsdf"', '"sdf"', '"sdfsdf"', '"sdfsd"', NULL, NULL, NULL, NULL, '"sdadsdcds"', '"\\u0421\\u0435\\u0440\\u0438\\u0439\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440"', NULL, '"cdscdsdcscds"', '"1"', '"cdscdscdscds"', '"1"', NULL, '"USD"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '"1"', NULL, '"1"', NULL, NULL, NULL, NULL, '"1"', NULL, NULL, NULL, '"1"', NULL, NULL, '2021-05-12 16:50:03', '2021-05-12 16:50:03', NULL),
	(71, 27, NULL, NULL, 1, NULL, '"\\u041c\\u0430\\u0440\\u043a\\u0430, \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c, \\u043c\\u043e\\u0434\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f \\u0422\\u0421"', '"sfsdfsf"', NULL, NULL, '"sdfsd"', '"fsdf"', '"sdf"', '"sdfsdf"', '"sdfsd"', NULL, NULL, NULL, NULL, '"sdad"', '"\\u0421\\u0435\\u0440\\u0438\\u0439\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440"', NULL, NULL, '"1"', NULL, '"1"', NULL, '"USD"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '"1"', NULL, '"1"', NULL, NULL, NULL, NULL, '"1"', NULL, NULL, NULL, '"1"', NULL, NULL, '2021-05-12 16:50:03', '2021-05-12 16:50:03', NULL),
	(72, 27, NULL, NULL, 1, NULL, '"\\u041c\\u0430\\u0440\\u043a\\u0430, \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c, \\u043c\\u043e\\u0434\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f \\u0422\\u0421"', '"sfsdfsf"', NULL, NULL, '"sdfsd"', '"fsdf"', '"sdf"', '"sdfsdf"', '"sdfsd"', NULL, NULL, NULL, NULL, '"sdadsdcds"', '"\\u0421\\u0435\\u0440\\u0438\\u0439\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440"', NULL, '"cdscdsdcscds"', '"1"', '"cdscdscdscds"', '"1"', NULL, '"USD"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '"1"', NULL, '"1"', NULL, NULL, NULL, NULL, '"1"', NULL, NULL, NULL, '"1"', NULL, NULL, '2021-05-12 16:50:03', '2021-05-12 16:50:03', NULL),
	(73, 27, NULL, NULL, 1, NULL, '"\\u041c\\u0430\\u0440\\u043a\\u0430, \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c, \\u043c\\u043e\\u0434\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f \\u0422\\u0421"', '"sfsdfsf"', NULL, NULL, '"sdfsd"', '"fsdf"', '"sdf"', '"sdfsdf"', '"sdfsd"', NULL, NULL, NULL, NULL, '"sdad"', '"\\u0421\\u0435\\u0440\\u0438\\u0439\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440"', NULL, NULL, '"1"', NULL, '"1"', NULL, '"USD"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '"1"', NULL, '"1"', NULL, NULL, NULL, NULL, '"1"', NULL, NULL, NULL, '"1"', NULL, NULL, '2021-05-12 16:50:03', '2021-05-12 16:50:03', NULL),
	(74, 27, NULL, NULL, 1, NULL, '"\\u041c\\u0430\\u0440\\u043a\\u0430, \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c, \\u043c\\u043e\\u0434\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f \\u0422\\u0421"', '"11111111111111111111111111"', NULL, NULL, '"sdfsd"', '"fsdf"', '"sdf"', '"sdfsdf"', '"sdfsd"', NULL, NULL, NULL, NULL, '"sdadsdcds"', '"\\u0421\\u0435\\u0440\\u0438\\u0439\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440"', NULL, '"cdscdsdcscds"', '"1"', '"cdscdscdscds"', '"1"', NULL, '"USD"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '"1"', NULL, '"1"', NULL, NULL, NULL, NULL, '"1"', NULL, NULL, NULL, '"1"', NULL, NULL, '2021-05-12 16:50:03', '2021-05-12 16:50:03', NULL),
	(75, 27, NULL, NULL, 1, NULL, '"\\u041c\\u0430\\u0440\\u043a\\u0430, \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c, \\u043c\\u043e\\u0434\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f \\u0422\\u0421"', '"sfsdfsf"', NULL, NULL, '"sdfsd"', '"fsdf"', '"sdf"', '"sdfsdf"', '"sdfsd"', NULL, NULL, NULL, NULL, '"sdad"', '"\\u0421\\u0435\\u0440\\u0438\\u0439\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440"', NULL, NULL, '"1"', NULL, '"1"', NULL, '"USD"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '"1"', NULL, '"1"', NULL, NULL, NULL, NULL, '"1"', NULL, NULL, NULL, '"1"', NULL, NULL, '2021-05-12 16:50:03', '2021-05-12 16:50:03', NULL),
	(76, 27, NULL, NULL, 1, NULL, '"\\u041c\\u0430\\u0440\\u043a\\u0430, \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c, \\u043c\\u043e\\u0434\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f \\u0422\\u0421"', '"11111111111111111"', NULL, NULL, '"sdfsd"', '"fsdf"', '"sdf"', '"sdfsdf"', '"sdfsd"', NULL, NULL, NULL, NULL, '"sdadsdcds"', '"\\u0421\\u0435\\u0440\\u0438\\u0439\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440"', NULL, '"cdscdsdcscds"', '"1"', '"cdscdscdscds"', '"1"', NULL, '"USD"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '"1"', NULL, '"1"', NULL, NULL, NULL, NULL, '"1"', NULL, NULL, NULL, '"1"', NULL, NULL, '2021-05-12 16:50:03', '2021-05-12 16:50:03', NULL),
	(77, 27, NULL, NULL, 1, NULL, '"\\u041c\\u0430\\u0440\\u043a\\u0430, \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c, \\u043c\\u043e\\u0434\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f \\u0422\\u0421"', '"sfsdfsf"', NULL, NULL, '"sdfsd"', '"fsdf"', '"sdf"', '"sdfsdf"', '"sdfsd"', NULL, NULL, NULL, NULL, '"sdad"', '"\\u0421\\u0435\\u0440\\u0438\\u0439\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440"', NULL, NULL, '"1"', NULL, '"1"', NULL, '"USD"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '"1"', NULL, '"1"', NULL, NULL, NULL, NULL, '"1"', NULL, NULL, NULL, '"1"', NULL, NULL, '2021-05-12 16:50:03', '2021-05-12 16:50:03', NULL),
	(78, 27, NULL, NULL, 1, NULL, '"\\u041c\\u0430\\u0440\\u043a\\u0430, \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c, \\u043c\\u043e\\u0434\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f \\u0422\\u0421"', '"11111111111111111"', NULL, NULL, '"sdfsd"', '"fsdf"', '"sdf"', '"sdfsdf"', '"sdfsd"', NULL, NULL, NULL, NULL, '"sdadsdcds"', '"\\u0421\\u0435\\u0440\\u0438\\u0439\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440"', NULL, '"cdscdsdcscds"', '"1"', '"cdscdscdscds"', '"1"', NULL, '"USD"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '"1"', NULL, '"1"', NULL, NULL, NULL, NULL, '"1"', NULL, NULL, NULL, '"1"', NULL, NULL, '2021-05-12 16:50:03', '2021-05-12 16:50:03', NULL),
	(79, 28, '0000000000000000000000', NULL, 1, '2021-05-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-14 09:15:35', '2021-05-14 09:24:35', '2021-05-14 09:24:35'),
	(80, 28, NULL, NULL, 1, NULL, '"\\u041c\\u0430\\u0440\\u043a\\u0430, \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c, \\u043c\\u043e\\u0434\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f \\u0422\\u0421"', '"vfdv"', '"2021-05-07"', '"2021-05-15"', '"gttgr"', '"rgtgrt"', '"rgtgr"', '"5225452"', '"42245452"', '"252"', '"245452"', '"2225"', '"22445"', '"sdad"', '"\\u0421\\u0435\\u0440\\u0438\\u0439\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440"', '"d"', '"adasd"', '"2"', '"sd"', '"2"', '"dsdas"', '["2"]', NULL, '"dasds"', '"1"', '"453453"', '"453345"', '"453435"', '"1"', '"435354"', '"543345"', '"1"', '"1"', '"3535453"', '"UZS"', '"3535453"', '"10"', '"7"', '"35353"', '"2"', '"247471"', '"54445"', '"2525"', '"1"', '"132625625"', '"555"', '2021-05-14 09:15:35', '2021-05-14 09:24:35', '2021-05-14 09:24:35'),
	(81, 28, '451165', NULL, 1, '2021-05-15', '"0000000000000000000000000"', '"vfdv"', '"2021-05-07"', '"2021-05-15"', '"gttgr"', '"rgtgrt"', '"rgtgr"', '"5225452"', '"42245452"', '"252"', '"245452"', '"2225"', '"2225"', '"sdad"', '"\\u0421\\u0435\\u0440\\u0438\\u0439\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440"', '000000000', '"adasd"', '"2"', '"sd"', '"2"', '"dsdas"', '"UZS"', NULL, '"dasds"', '"1"', '"453453"', NULL, NULL, '"1"', '"435354"', NULL, '"1"', '"1"', '"3535453"', '"1"', '"3535453"', '"10"', '"7"', '"35353"', '"2"', NULL, '"54445"', '"2525"', '"1"', '"132625625"', '"555"', '2021-05-14 09:24:35', '2021-05-14 09:31:52', '2021-05-14 09:31:52'),
	(82, 28, '451165', NULL, 1, '2021-05-15', '"0000000000000000000000000"', '"vfdv"', '"2021-05-07"', '"2021-05-15"', '"gttgr"', '"rgtgrt"', '"rgtgr"', '"5225452"', '"42245452"', '"252"', '"245452"', '"2225"', '"2225"', '"sdad"', '"\\u0421\\u0435\\u0440\\u0438\\u0439\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440"', '000000000', '"adasd"', '"2"', '"sd"', '"2"', '"dsdas"', '"UZS"', NULL, '"dasds"', '"1"', '"453453"', NULL, NULL, '"1"', '"435354"', NULL, '"1"', '"1"', '"3535453"', '"1"', '"3535453"', '"10"', '"7"', '"35353"', '"2"', NULL, '"54445"', '"2525"', '"1"', '"132625625"', '"555"', '2021-05-14 09:31:52', '2021-05-14 09:34:44', '2021-05-14 09:34:44'),
	(83, 28, '451165', NULL, 1, '2021-05-15', '"0000000000000000000000000"', '"vfdv"', '"2021-05-07"', '"2021-05-15"', '"gttgr"', '"rgtgrt"', '"rgtgr"', '"5225452"', '"42245452"', '"252"', '"245452"', '"2225"', '"2225"', '"sdad"', '"\\u0421\\u0435\\u0440\\u0438\\u0439\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440"', '000000000', '"adasd"', '"2"', '"sd"', '"2"', '"dsdas"', '"UZS"', NULL, '"dasds"', '"1"', '"453453"', NULL, NULL, '"1"', '"435354"', NULL, '"1"', '"1"', '"3535453"', '"1"', '"3535453"', '"10"', '"7"', '"35353"', '"2"', NULL, '"54445"', '"2525"', '"1"', '"132625625"', '"555"', '2021-05-14 09:34:44', '2021-05-14 09:38:53', '2021-05-14 09:38:53'),
	(84, 28, '451165', NULL, 1, '2021-05-15', '"0000000000000000000000000"', '"000000000000000"', '"2021-05-07"', '"2021-05-15"', '"gttgr"', '"rgtgrt"', '"rgtgr"', '"5225452"', '"42245452"', '"252"', '"245452"', '"2225"', '"2225"', '"0000000000000000"', '"00000000000000000000"', '000000000', '"adasd"', '"2"', '"sd"', '"2"', '"dsdas"', '"UZS"', NULL, '"dasds"', '"1"', '"453453"', '"0000000000000000000"', '"0000000000000"', '"1"', '"435354"', NULL, '"1"', '"1"', '"3535453"', '"1"', '"3535453"', '"10"', '"7"', '"35353"', '"2"', NULL, '"54445"', '"2525"', '"1"', '"132625625"', '"555"', '2021-05-14 09:38:53', '2021-05-14 09:46:55', '2021-05-14 09:46:55'),
	(85, 28, '451165', NULL, 1, '2021-05-15', '"0000000000000000000000000"', '"000000000000000"', '"2021-05-07"', '"2021-05-15"', '"gttgr"', '"rgtgrt"', '"rgtgr"', '"5225452"', '"42245452"', '"252"', '"245452"', '"2225"', '"2225"', '"0000000000000000"', '"00000000000000000000"', '000000000', '"adasd"', '"2"', '"sd"', '"2"', '"dsdas"', '"UZS"', '"1"', '"0000000000000000"', '"1"', '"453453"', '"0000000000000000000"', '"0000000000000"', '"1"', '"435354"', '"00000000"', '"1"', '"1"', '"3535453"', '"1"', '"3535453"', '"10"', '"7"', '"35353"', '"2"', NULL, '"54445"', '"2525"', '"1"', '"132625625"', '"555"', '2021-05-14 09:46:55', '2021-05-14 09:50:09', '2021-05-14 09:50:09'),
	(86, 28, '451165', NULL, 1, '2021-05-15', '"0000000000000000000000000"', '"000000000000000"', '"2021-05-07"', '"2021-05-15"', '"gttgr"', '"rgtgrt"', '"rgtgr"', '"5225452"', '"42245452"', '"252"', '"245452"', '"2225"', '"2225"', '"0000000000000000"', '"00000000000000000000"', '000000000', '"adasd"', '"2"', '"sd"', '"2"', '"dsdas"', '"UZS"', '"1"', '"0000000000000000"', '"1"', '"453453"', '"0000000000000000000"', '"0000000000000"', '"1"', '"435354"', '"00000000"', '"1"', '"1"', '"3535453"', '"1"', '"3535453"', '"10"', '"7"', '"35353"', '"2"', NULL, '"54445"', '"2525"', '"1"', '"132625625"', '"555"', '2021-05-14 09:50:09', '2021-05-14 09:50:09', NULL),
	(87, 29, '01010101010101', NULL, 1, '2021-05-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-16 17:15:46', '2021-05-16 19:33:54', '2021-05-16 19:33:54'),
	(88, 30, '00000000000000000000', NULL, 1, '2021-05-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-16 17:32:26', '2021-05-16 19:11:59', NULL),
	(89, 34, '451165', NULL, 1, '2021-05-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-17 17:00:57', '2021-05-17 17:00:57', NULL),
	(90, 35, '451165', NULL, 1, '2021-05-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-17 17:12:06', '2021-05-17 17:12:06', NULL),
	(91, 36, '6568974', NULL, 1, '2021-05-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-17 17:19:46', '2021-05-17 17:19:46', NULL),
	(92, 37, '6568974', NULL, 2, '2021-05-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-17 19:33:59', '2021-05-17 19:33:59', NULL),
	(93, 38, '451165', NULL, 2, '2021-05-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-17 19:34:45', '2021-05-17 19:34:45', NULL),
	(94, 39, '451165', NULL, 2, '2021-05-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-17 19:37:33', '2021-05-17 19:37:33', NULL),
	(95, 40, '451165', NULL, 2, '2021-05-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-18 10:51:19', '2021-05-18 10:51:19', NULL),
	(96, 41, '3545354345', NULL, 2, '2021-05-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-18 11:32:47', '2021-05-18 11:32:47', NULL);
/*!40000 ALTER TABLE `all_product_information` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.all_product_information_transports
CREATE TABLE IF NOT EXISTS `all_product_information_transports` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `all_products_id` bigint(20) unsigned NOT NULL,
  `polis_mark` text COLLATE utf8mb4_unicode_ci,
  `polis_model` text COLLATE utf8mb4_unicode_ci,
  `polis_gos_num` text COLLATE utf8mb4_unicode_ci,
  `polis_teh_passport` text COLLATE utf8mb4_unicode_ci,
  `polis_num_engine` text COLLATE utf8mb4_unicode_ci,
  `agents` text COLLATE utf8mb4_unicode_ci,
  `polis_payload` text COLLATE utf8mb4_unicode_ci,
  `modification` text COLLATE utf8mb4_unicode_ci,
  `state_num` text COLLATE utf8mb4_unicode_ci,
  `num_tech_passport` text COLLATE utf8mb4_unicode_ci,
  `num_engine` text COLLATE utf8mb4_unicode_ci,
  `num_carcase` text COLLATE utf8mb4_unicode_ci,
  `carrying_capacity` text COLLATE utf8mb4_unicode_ci,
  `insurance_cost` text COLLATE utf8mb4_unicode_ci,
  `overall_polis_sum` text COLLATE utf8mb4_unicode_ci,
  `polis_premium` text COLLATE utf8mb4_unicode_ci,
  `policy_num` text COLLATE utf8mb4_unicode_ci,
  `policy_series_id` text COLLATE utf8mb4_unicode_ci,
  `from_date_polis` text COLLATE utf8mb4_unicode_ci,
  `date_polis_from` text COLLATE utf8mb4_unicode_ci,
  `date_polis_to` text COLLATE utf8mb4_unicode_ci,
  `insurer_fio` text COLLATE utf8mb4_unicode_ci,
  `specialty` text COLLATE utf8mb4_unicode_ci,
  `experience` text COLLATE utf8mb4_unicode_ci,
  `position` text COLLATE utf8mb4_unicode_ci,
  `time_stay` text COLLATE utf8mb4_unicode_ci,
  `insurer_price` text COLLATE utf8mb4_unicode_ci,
  `insurer_sum` text COLLATE utf8mb4_unicode_ci,
  `insurer_premium` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.all_product_information_transports: ~4 rows (approximately)
DELETE FROM `all_product_information_transports`;
/*!40000 ALTER TABLE `all_product_information_transports` DISABLE KEYS */;
INSERT INTO `all_product_information_transports` (`id`, `all_products_id`, `polis_mark`, `polis_model`, `polis_gos_num`, `polis_teh_passport`, `polis_num_engine`, `agents`, `polis_payload`, `modification`, `state_num`, `num_tech_passport`, `num_engine`, `num_carcase`, `carrying_capacity`, `insurance_cost`, `overall_polis_sum`, `polis_premium`, `policy_num`, `policy_series_id`, `from_date_polis`, `date_polis_from`, `date_polis_to`, `insurer_fio`, `specialty`, `experience`, `position`, `time_stay`, `insurer_price`, `insurer_sum`, `insurer_premium`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 14, NULL, NULL, NULL, NULL, NULL, '["1"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '"cdscds"', '["dcsdcs"]', '["2021-05-06"]', '["2021-05-12"]', '["2021-05-12"]', '["dscdcs"]', '["Specialty"]', '["work experience"]', '["dsccd"]', '["dcsdcs"]', '["252525"]', '["252525"]', '["252525"]', '2021-05-09 16:29:07', '2021-05-09 16:29:07', NULL),
	(2, 16, NULL, NULL, NULL, NULL, NULL, '["1","1"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '["addas","asdasda"]', '["vfdfv","vfdfv"]', '["2021-05-13","2021-05-13"]', '["2021-05-19","2021-05-11"]', '["2021-05-13","2021-05-04"]', '["adsads","adsads"]', '["Specialty","Specialty"]', '["work experience","work experience"]', '["asdasxc","asdasxc"]', '["adsdas","adsdas"]', '["adsdas","adsdas"]', '["adsads","adsads"]', '["252525","252525"]', '2021-05-09 16:48:44', '2021-05-09 18:07:06', '2021-05-09 18:07:06'),
	(3, 36, '["25252"]', '["2525"]', '["12324"]', '["2021-04-28"]', '["2021-05-04"]', '["1"]', '["2525"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '["31232132"]', '["12222"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-17 17:19:46', '2021-05-17 17:19:46', NULL),
	(4, 41, '["42254"]', '["254254"]', '["255"]', '["2021-04-29"]', '["2021-05-20"]', '["1"]', '["\\u041c\\u0430\\u0440\\u043a\\u0430 \\u0438 \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c"]', '["\\u041c\\u043e\\u0434\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f"]', '["\\u0413\\u043e\\u0441. \\u043d\\u043e\\u043c\\u0435\\u0440"]', '["\\u041d\\u043e\\u043c\\u0435\\u0440 \\u0442\\u0435\\u0445 \\u043f\\u0430\\u0441\\u043f\\u043e\\u0440\\u0442\\u0430"]', '["\\u041d\\u043e\\u043c\\u0435\\u0440 \\u0434\\u0432\\u0438\\u0433\\u0430\\u0442\\u0435\\u043b\\u044f"]', '["\\u041d\\u043e\\u043c\\u0435\\u0440 \\u043a\\u0443\\u0437\\u043e\\u0432\\u0430"]', '["xsasx"]', '["46546565"]', '["31232132"]', '["12222"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-18 11:32:47', '2021-05-18 12:00:40', NULL);
/*!40000 ALTER TABLE `all_product_information_transports` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.audit_infos
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

-- Dumping data for table ddgi_test_2.audit_infos: ~0 rows (approximately)
DELETE FROM `audit_infos`;
/*!40000 ALTER TABLE `audit_infos` DISABLE KEYS */;
/*!40000 ALTER TABLE `audit_infos` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.audit_turnovers
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

-- Dumping data for table ddgi_test_2.audit_turnovers: ~0 rows (approximately)
DELETE FROM `audit_turnovers`;
/*!40000 ALTER TABLE `audit_turnovers` DISABLE KEYS */;
/*!40000 ALTER TABLE `audit_turnovers` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.banks
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi_test_2.banks: ~7 rows (approximately)
DELETE FROM `banks`;
/*!40000 ALTER TABLE `banks` DISABLE KEYS */;
INSERT INTO `banks` (`id`, `code`, `name`, `filial`, `address`, `inn`, `raschetniy_schet`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'sdfvdsvf', 'sdvfdsvf', 'sdfvdsvf', 'dsfvvdf', 'dsfvdsfv', 'sdfvdv', 1, '2021-01-06 11:54:01', '2021-01-07 22:34:20', '2021-01-07 22:34:20'),
	(2, 'sdfvdsvf', 'sdvfdsvf', 'sdfvdsvf', 'dsfvvdf', 'dsfvdsfv', 'sdfvdv', 1, '2021-01-06 11:54:48', '2021-04-22 04:18:09', NULL),
	(3, '53543', 'afgsdfg', 'sdgsd', 'sdfgvdsf', 'sdfgsdf', 'sdfgsd', 0, '2021-01-06 12:27:14', '2021-01-07 22:34:04', '2021-01-07 22:34:04'),
	(4, 'dfsvsdfv', 'sdvdsvf', 'sdvfdv', 'sdfv', 'sdfv', 'sdfv', 1, '2021-01-06 12:30:15', '2021-04-22 04:18:04', NULL),
	(5, 'sdfvdsfv', 'sdfv', 'sdvf', 'sdvf', 'sdvf', 'sdvf', 1, '2021-01-06 12:30:39', '2021-01-07 22:33:21', '2021-01-07 22:33:21'),
	(6, 'dsfv', 'vsdf', 'sdfv', 'svfvfd', 'sdfv', 'sdvf', 0, '2021-01-06 12:44:45', '2021-01-07 22:32:56', '2021-01-07 22:32:56'),
	(7, 'en', '?????????? ????????', 'asdcsdc', 'PO Box F', 'sdfv', 'sdvf', 1, '2021-04-22 04:17:56', '2021-04-22 04:18:11', '2021-04-22 04:18:11');
/*!40000 ALTER TABLE `banks` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.beneficiaries
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='????????????????????????';

-- Dumping data for table ddgi_test_2.beneficiaries: ~0 rows (approximately)
DELETE FROM `beneficiaries`;
/*!40000 ALTER TABLE `beneficiaries` DISABLE KEYS */;
/*!40000 ALTER TABLE `beneficiaries` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.bonded
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
  `stock_date` date DEFAULT NULL COMMENT '???????????? ???????????????????? ???????????? ???? ???????????? ????????????',
  `total_insured_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '?????????? ?????????????????? ??????????',
  `total_insured_closed_stock_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '?????????????????? ?????????? ?????? ?????????????????? ???????????? ?? ?????????? ??????????????',
  `total_insured_open_stock_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '?????????????????? ?????????? ?????? ?????????????????? ???????????? ?? ?????????? ????????????????',
  `insurance_premium` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settlement_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '???????????? ????????????????????????????',
  `premium_terms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.bonded: ~5 rows (approximately)
DELETE FROM `bonded`;
/*!40000 ALTER TABLE `bonded` DISABLE KEYS */;
INSERT INTO `bonded` (`id`, `type`, `product_id`, `policy_beneficiary_id`, `policy_id`, `policy_series_id`, `user_id`, `policy_from_date`, `policy_holder_id`, `insurance_premium_payment_type`, `from_date`, `to_date`, `volume`, `insurance_premium_currency_rate`, `insurance_premium_currency`, `unique_number`, `volume_measure`, `total_price`, `stock_date`, `total_insured_price`, `total_insured_closed_stock_price`, `total_insured_open_stock_price`, `insurance_premium`, `settlement_currency`, `premium_terms`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(9, '0', 2, 15, 1, 1, 4, '2021-03-06', 20, 2, '2021-03-03', '2021-03-03', 'sdfsdfgsdf', NULL, 'USD', '0100/0201/2/2100001', 'tonna', '235235', '2021-03-04', '2021-03-04', '234525', '25252345', '234542535', 'UZS', NULL, '2021-03-02 23:59:46', '2021-03-03 01:20:31', NULL),
	(10, '0', 2, 16, 2, 1, 4, '2021-03-06', 21, 1, '2021-03-04', '2021-03-04', 'sdfvdsvf', NULL, 'UZS', '0100/0201/1/2100002', 'shtuka', 'vsdvfdsvff', '2021-03-11', '2021-03-11', '452352345', '23452523', '4542345', 'UZS', NULL, '2021-03-03 02:13:10', '2021-03-03 02:13:10', NULL),
	(12, '0', 2, 18, 4, 1, 4, '2021-03-06', 23, 1, '2021-03-05', '2021-03-10', '5345', NULL, 'UZS', '0100/0201/1/2100003', 'tonna', '34543', '2021-03-18', '2021-03-18', '345', '345345', '35345', 'UZS', NULL, '2021-03-03 03:13:29', '2021-03-03 03:14:25', NULL),
	(13, '0', 2, 19, 11, 0, 4, '2021-03-06', 24, 1, '2021-03-14', '2021-03-05', 'dsfvdsfvsdfv', NULL, 'UZS', '0100/0201/1/2100004', 'litr', 'sdfvsdvf', '2021-03-13', 'sdfvsdv', 'dsfvsdfvsd', 'vsdfvsdfv', 'sdfvsdfvsdvf', 'UZS', NULL, '2021-03-03 05:45:31', '2021-03-03 05:45:31', NULL),
	(14, '0', 2, 20, 12, 0, 4, '2021-03-26', 25, 2, '2021-03-06', '2021-04-01', '5345', NULL, '69', '0100/0201/2/2100005', 'litr', '34', '2021-03-28', '43523', '345', '2555', '35345', 'UZS', NULL, '2021-03-06 06:14:43', '2021-03-24 03:41:54', '2021-03-24 03:41:54');
/*!40000 ALTER TABLE `bonded` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.bonded_policy_informations
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

-- Dumping data for table ddgi_test_2.bonded_policy_informations: ~4 rows (approximately)
DELETE FROM `bonded_policy_informations`;
/*!40000 ALTER TABLE `bonded_policy_informations` DISABLE KEYS */;
INSERT INTO `bonded_policy_informations` (`id`, `bonded_id`, `policy_series_id`, `policy_id`, `user_id`, `from_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(2, 9, 1, 1, 4, '2021-03-04', '2021-03-02 23:59:46', '2021-03-03 01:20:31', NULL),
	(3, 10, 1, 2, 4, '2021-03-05', '2021-03-03 02:13:10', '2021-03-03 02:13:10', NULL),
	(4, 12, 1, 4, 4, '2021-03-10', '2021-03-03 03:13:29', '2021-03-03 03:13:29', NULL),
	(5, 13, 0, 11, 4, '2021-03-05', '2021-03-03 05:45:31', '2021-03-03 05:45:31', NULL);
/*!40000 ALTER TABLE `bonded_policy_informations` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.borrower_sportsman_infos
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

-- Dumping data for table ddgi_test_2.borrower_sportsman_infos: ~0 rows (approximately)
DELETE FROM `borrower_sportsman_infos`;
/*!40000 ALTER TABLE `borrower_sportsman_infos` DISABLE KEYS */;
/*!40000 ALTER TABLE `borrower_sportsman_infos` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.borrower_sportsman_others
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

-- Dumping data for table ddgi_test_2.borrower_sportsman_others: ~0 rows (approximately)
DELETE FROM `borrower_sportsman_others`;
/*!40000 ALTER TABLE `borrower_sportsman_others` DISABLE KEYS */;
/*!40000 ALTER TABLE `borrower_sportsman_others` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.borrower_sportsmen
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

-- Dumping data for table ddgi_test_2.borrower_sportsmen: ~0 rows (approximately)
DELETE FROM `borrower_sportsmen`;
/*!40000 ALTER TABLE `borrower_sportsmen` DISABLE KEYS */;
/*!40000 ALTER TABLE `borrower_sportsmen` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.branches
CREATE TABLE IF NOT EXISTS `branches` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) unsigned DEFAULT '0',
  `name` varchar(150) NOT NULL,
  `is_center` tinyint(3) unsigned DEFAULT '0',
  `founded_date` date NOT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `region_id` int(11) unsigned NOT NULL,
  `address` varchar(150) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi_test_2.branches: ~5 rows (approximately)
DELETE FROM `branches`;
/*!40000 ALTER TABLE `branches` DISABLE KEYS */;
INSERT INTO `branches` (`id`, `parent_id`, `name`, `is_center`, `founded_date`, `user_id`, `region_id`, `address`, `phone_number`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, NULL, '???????????????? ????????', 0, '2021-02-15', 9, 1, '??????????????', '23452352345', '2021-02-15', '2021-02-15', NULL),
	(2, NULL, '???????????????????? ????????????', 0, '2021-01-08', 9, 1, 'dfvsdv', '45235325', '2021-01-08', '2021-01-10', NULL),
	(3, NULL, 'FotTestOnly', 0, '2021-02-18', 17, 1, 'PO Box F', '5555551234', '2021-02-18', '2021-02-18', NULL),
	(4, NULL, 'rgwergewrg', 0, '2021-02-19', 20, 1, 'PO Box F', '5555551234', '2021-02-18', '2021-02-18', NULL),
	(5, NULL, '?????????????????????? ????????????', 0, '2000-03-29', 21, 5, '??????????????', '5555551234', '2021-04-08', '2021-04-08', NULL);
/*!40000 ALTER TABLE `branches` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.buyers
CREATE TABLE IF NOT EXISTS `buyers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `all_products_id` bigint(20) unsigned NOT NULL,
  `field_of_activity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checking_account` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mfo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oked` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.buyers: ~0 rows (approximately)
DELETE FROM `buyers`;
/*!40000 ALTER TABLE `buyers` DISABLE KEYS */;
/*!40000 ALTER TABLE `buyers` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.cargo_infos
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

-- Dumping data for table ddgi_test_2.cargo_infos: ~0 rows (approximately)
DELETE FROM `cargo_infos`;
/*!40000 ALTER TABLE `cargo_infos` DISABLE KEYS */;
/*!40000 ALTER TABLE `cargo_infos` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.cargo_payment_terms
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

-- Dumping data for table ddgi_test_2.cargo_payment_terms: ~0 rows (approximately)
DELETE FROM `cargo_payment_terms`;
/*!40000 ALTER TABLE `cargo_payment_terms` DISABLE KEYS */;
/*!40000 ALTER TABLE `cargo_payment_terms` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.clients
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0 - ?????? ????????, 1 - ???? ????????',
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

-- Dumping data for table ddgi_test_2.clients: ~3 rows (approximately)
DELETE FROM `clients`;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` (`id`, `type`, `name`, `middle_name`, `surname`, `address`, `phone_number`, `mfo`, `inn`, `bank_id`, `raschetniy_schet`, `passport_series`, `passport_number`, `passport_given_date`, `passport_given_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 0, 'name', 'middle', 'surname', 'fsvdvf', 'sdfvfdv', 'sdfvsdfv', 'sdfvsdvf', 2, 'sdvfdfsv', 'sdfvdsvf', 'sdfvsdvf', '2021-01-21', 'sdfvsdv', '2021-01-20 23:24:07', '2021-01-20 23:24:07', NULL),
	(2, 1, 'sdfvdsfdsfv', NULL, NULL, 'sdvfdsfv', '454353', NULL, NULL, 4, 'sdfvdsvf', NULL, NULL, NULL, NULL, '2021-01-20 23:33:49', '2021-01-20 23:33:49', NULL),
	(3, 1, 'sfdvsdfv', NULL, NULL, 'vsdfvdsfv', '23553', NULL, NULL, 4, 'dsfvdsfvdsf', NULL, NULL, NULL, NULL, '2021-01-20 23:35:53', '2021-01-21 02:10:26', '2021-01-21 02:10:26');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.cmp
CREATE TABLE IF NOT EXISTS `cmp` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '?????? ????.= 1; ?????? = 0',
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

-- Dumping data for table ddgi_test_2.cmp: ~1 rows (approximately)
DELETE FROM `cmp`;
/*!40000 ALTER TABLE `cmp` DISABLE KEYS */;
INSERT INTO `cmp` (`id`, `type`, `product_id`, `policy_id`, `policy_series_id`, `policy_holder_id`, `object_info_dogov_stoy`, `holder_from_date`, `holder_to_date`, `object_stroy_mont`, `object_location`, `object_insurance_sum`, `object_from_date`, `object_to_date`, `object_tel_povr`, `object_material`, `stroy_mont_sum`, `stroy_sum`, `obor_sum`, `stroy_mash_sum`, `rasx_sum`, `insurance_prem_sum`, `franchise_sum`, `insurence_currency`, `insurence_currency_rate`, `insurance_premium_payment_type`, `unique_number`, `polic_given_date`, `payment_term`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(5, 0, 3, 6, 1, 37, '???????????????? ?? ???????????????? ?????????????????????????? ??????????????', NULL, NULL, '???????????? ??????????????????????-?????????????????? ??????????', '???????????????????????? ??????????????', '100000', '2021-03-26', '2021-03-24', '???????????????? ??????????????????????', '???????????????????????? ??????????', '234242', '33333', '444444', '555555', '222222', '44444', '23', 'UZS', NULL, 1, '0100/0303/1/2100001', '2021-03-11', '1', 4, '2021-03-07 04:35:00', '2021-03-07 04:54:59', NULL);
/*!40000 ALTER TABLE `cmp` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.covids
CREATE TABLE IF NOT EXISTS `covids` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `insurance_from` date NOT NULL,
  `insurance_to` date NOT NULL,
  `strahovaya_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strahovaya_purpose` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `franshiza` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currencies` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poryadok_oplaty_premii` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sposob_rascheta` int(11) NOT NULL,
  `serial_number_policy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_issue_policy` date NOT NULL,
  `otvet_litso` int(11) NOT NULL,
  `anketa_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dogovor_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `polis_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_holder_id` int(11) NOT NULL,
  `policy_beneficiary_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.covids: ~2 rows (approximately)
DELETE FROM `covids`;
/*!40000 ALTER TABLE `covids` DISABLE KEYS */;
INSERT INTO `covids` (`id`, `insurance_from`, `insurance_to`, `strahovaya_sum`, `strahovaya_purpose`, `franshiza`, `currencies`, `poryadok_oplaty_premii`, `sposob_rascheta`, `serial_number_policy`, `date_issue_policy`, `otvet_litso`, `anketa_img`, `dogovor_img`, `polis_img`, `policy_holder_id`, `policy_beneficiary_id`, `created_at`, `updated_at`) VALUES
	(1, '2021-04-10', '2021-04-24', '234234', '23423', '234', 'UZS', 'transh', 1, '234234', '2021-04-10', 1, 'img/PolicyHolder/eLkc2zGKlxtyoPfCoBAYhrcVqJNy344OmnZkuWjT.pdf', NULL, NULL, 66, 25, '2021-04-09 14:19:25', '2021-04-09 14:34:44'),
	(2, '2021-04-06', '2021-04-15', '234234', '4234234', '23424', 'UZS', '1', 1, '234234', '2021-04-09', 1, 'img/PolicyHolder/A0NL6kviJjWHfgMWwlfyzsy09aD8elkdFAOWnHoV.png', NULL, NULL, 73, 30, '2021-04-10 09:38:53', '2021-04-10 09:40:08');
/*!40000 ALTER TABLE `covids` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.covid_policy_information
CREATE TABLE IF NOT EXISTS `covid_policy_information` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `covid_id` int(11) NOT NULL,
  `person_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `person_surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `person_lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `series_and_number_passport` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_of_issue_passport` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_issue_passport` date NOT NULL,
  `policy_series_id` int(11) NOT NULL,
  `insurance_cost` int(11) NOT NULL,
  `insurance_sum` int(11) NOT NULL,
  `insurance_premium` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.covid_policy_information: ~2 rows (approximately)
DELETE FROM `covid_policy_information`;
/*!40000 ALTER TABLE `covid_policy_information` DISABLE KEYS */;
INSERT INTO `covid_policy_information` (`id`, `covid_id`, `person_name`, `person_surname`, `person_lastname`, `series_and_number_passport`, `place_of_issue_passport`, `date_of_issue_passport`, `policy_series_id`, `insurance_cost`, `insurance_sum`, `insurance_premium`, `created_at`, `updated_at`) VALUES
	(2, 1, 'sdc', 'sdc', 'sdc', 'sdc', 'sdc', '2021-04-29', 1, 23, 4, 5, '2021-04-09 14:34:44', '2021-04-09 14:34:44'),
	(5, 2, 'sdc', 'sdc', 'sdc', 'sdc', 'sdc', '2021-04-08', 1, 23, 4, 5, '2021-04-10 09:40:08', '2021-04-10 09:40:08');
/*!40000 ALTER TABLE `covid_policy_information` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.covid_strah_premiyas
CREATE TABLE IF NOT EXISTS `covid_strah_premiyas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `prem_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prem_from` date NOT NULL,
  `covid_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.covid_strah_premiyas: ~2 rows (approximately)
DELETE FROM `covid_strah_premiyas`;
/*!40000 ALTER TABLE `covid_strah_premiyas` DISABLE KEYS */;
INSERT INTO `covid_strah_premiyas` (`id`, `prem_sum`, `prem_from`, `covid_id`, `created_at`, `updated_at`) VALUES
	(3, '234242', '2021-04-03', 1, '2021-04-09 14:34:44', '2021-04-09 14:34:44'),
	(4, '34', '2021-04-08', 1, '2021-04-09 14:34:44', '2021-04-09 14:34:44');
/*!40000 ALTER TABLE `covid_strah_premiyas` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.credit_fin_risk_nepogashen_avtocredits
CREATE TABLE IF NOT EXISTS `credit_fin_risk_nepogashen_avtocredits` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `dogovor_lizing_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '?????????????????? ??????????????',
  `insurance_from` date NOT NULL COMMENT '???????? ???????????????????????? ??',
  `insurance_to` date NOT NULL COMMENT '???????? ???????????????????????? ????',
  `credit_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit_purpose` text COLLATE utf8mb4_unicode_ci COMMENT '???????? ?????????????????? ??????????????',
  `franchise` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_issue_policy` date DEFAULT NULL COMMENT '???????? ???????????????? ????????????????',
  `total_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_award` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_terms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '?????????????? ????????????',
  `serial_number_policy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_delivery_policy` date NOT NULL COMMENT '???????? ???????????? ???????????????????? ????????????',
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

-- Dumping data for table ddgi_test_2.credit_fin_risk_nepogashen_avtocredits: ~0 rows (approximately)
DELETE FROM `credit_fin_risk_nepogashen_avtocredits`;
/*!40000 ALTER TABLE `credit_fin_risk_nepogashen_avtocredits` DISABLE KEYS */;
/*!40000 ALTER TABLE `credit_fin_risk_nepogashen_avtocredits` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.credit_fin_risk_nepogashen_credits
CREATE TABLE IF NOT EXISTS `credit_fin_risk_nepogashen_credits` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `dogovor_lizing_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '?????????????????? ??????????????',
  `insurance_from` date NOT NULL COMMENT '???????? ???????????????????????? ??',
  `insurance_to` date NOT NULL COMMENT '???????? ???????????????????????? ????',
  `credit_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit_purpose` text COLLATE utf8mb4_unicode_ci COMMENT '???????? ?????????????????? ??????????????',
  `date_issue_policy` date DEFAULT NULL COMMENT '???????? ???????????????? ????????????????',
  `other_forms` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_award` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_terms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '?????????????? ????????????',
  `serial_number_policy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_delivery_policy` date NOT NULL COMMENT '???????? ???????????? ???????????????????? ????????????',
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

-- Dumping data for table ddgi_test_2.credit_fin_risk_nepogashen_credits: ~0 rows (approximately)
DELETE FROM `credit_fin_risk_nepogashen_credits`;
/*!40000 ALTER TABLE `credit_fin_risk_nepogashen_credits` DISABLE KEYS */;
/*!40000 ALTER TABLE `credit_fin_risk_nepogashen_credits` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.credit_nepogashens
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

-- Dumping data for table ddgi_test_2.credit_nepogashens: ~0 rows (approximately)
DELETE FROM `credit_nepogashens`;
/*!40000 ALTER TABLE `credit_nepogashens` DISABLE KEYS */;
/*!40000 ALTER TABLE `credit_nepogashens` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.currencies
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

-- Dumping data for table ddgi_test_2.currencies: ~2 rows (approximately)
DELETE FROM `currencies`;
/*!40000 ALTER TABLE `currencies` DISABLE KEYS */;
INSERT INTO `currencies` (`id`, `name`, `code`, `rate`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Euro', 'EUR', '12000', '2021-01-21 05:42:56', '2021-01-21 05:42:56', NULL),
	(2, 'US Dollar', 'USD', '10000', '2021-01-21 06:12:41', '2021-01-21 06:12:41', NULL);
/*!40000 ALTER TABLE `currencies` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.currency_terms
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

-- Dumping data for table ddgi_test_2.currency_terms: ~0 rows (approximately)
DELETE FROM `currency_terms`;
/*!40000 ALTER TABLE `currency_terms` DISABLE KEYS */;
/*!40000 ALTER TABLE `currency_terms` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.currency_terms_transhes
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

-- Dumping data for table ddgi_test_2.currency_terms_transhes: ~0 rows (approximately)
DELETE FROM `currency_terms_transhes`;
/*!40000 ALTER TABLE `currency_terms_transhes` DISABLE KEYS */;
/*!40000 ALTER TABLE `currency_terms_transhes` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.directors
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

-- Dumping data for table ddgi_test_2.directors: ~5 rows (approximately)
DELETE FROM `directors`;
/*!40000 ALTER TABLE `directors` DISABLE KEYS */;
INSERT INTO `directors` (`id`, `user_id`, `surname`, `name`, `middle_name`, `dob`, `passport_number`, `passport_series`, `work_start_date`, `work_end_date`, `phone_number`, `address`, `profile_img`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(2, 9, 'FotTestOnly3', 'sdfv', 'sdfv', '2021-01-07', '12341234', 'adscsadc', '2021-01-14', NULL, '5555551234', 'PO Box F', 'directors/9/VSYsPtW06DQR5UNFHE7eLzGaWABhsSZkSyGPEMzh.jpg', 1, '2021-01-08', '2021-03-29', NULL),
	(4, 17, 'Another', 'Name', 'Surname', '2021-02-11', 'sdfvsdv', 'AA', '2021-02-17', NULL, '5555551234', 'PO Box F', 'C:\\Users\\User\\AppData\\Local\\Temp\\phpF1C4.tmp', 1, '2021-02-18', '2021-03-28', NULL),
	(5, 20, 'Another 2', 'Name 2', 'Surname', '2021-02-11', 'sdfvsdv', 'AA', '2021-02-17', NULL, '5555551234', 'PO Box F', NULL, 1, '2021-02-18', '2021-02-18', NULL),
	(6, 21, '????????????', '????????', '????????????????', '1980-03-11', '12341234', 'AA', '2021-03-30', NULL, '5555551234', '??????????????, ????????????????????', 'directors/21/xnq6daN1XHHD3KiNa3x7MqL46pMSwbkmMYeIaQu7.jpg', 1, '2021-03-29', '2021-03-29', NULL),
	(7, 22, 'test', 'test', 'test', '2021-03-06', 'trrtrtr', 'AA', '2021-03-31', NULL, '5555551234', 'PO Box F', 'directors/22/52e0q1HgnBdOndyUREFqjtFtWpvYDtLKyRhPEUtu.png', 1, '2021-03-29', '2021-03-29', '2021-03-29');
/*!40000 ALTER TABLE `directors` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.dobrovolka_avto
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

-- Dumping data for table ddgi_test_2.dobrovolka_avto: ~0 rows (approximately)
DELETE FROM `dobrovolka_avto`;
/*!40000 ALTER TABLE `dobrovolka_avto` DISABLE KEYS */;
/*!40000 ALTER TABLE `dobrovolka_avto` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.dobrovolka_avto_info
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

-- Dumping data for table ddgi_test_2.dobrovolka_avto_info: ~0 rows (approximately)
DELETE FROM `dobrovolka_avto_info`;
/*!40000 ALTER TABLE `dobrovolka_avto_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `dobrovolka_avto_info` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.dobrovolka_avto_poryadok_oplaty
CREATE TABLE IF NOT EXISTS `dobrovolka_avto_poryadok_oplaty` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `dobrovolka_avto_id` int(11) NOT NULL,
  `poryadok_oplaty_summa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poryadok_oplaty_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.dobrovolka_avto_poryadok_oplaty: ~0 rows (approximately)
DELETE FROM `dobrovolka_avto_poryadok_oplaty`;
/*!40000 ALTER TABLE `dobrovolka_avto_poryadok_oplaty` DISABLE KEYS */;
/*!40000 ALTER TABLE `dobrovolka_avto_poryadok_oplaty` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.dobrovolka_teztools
CREATE TABLE IF NOT EXISTS `dobrovolka_teztools` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.dobrovolka_teztools: ~0 rows (approximately)
DELETE FROM `dobrovolka_teztools`;
/*!40000 ALTER TABLE `dobrovolka_teztools` DISABLE KEYS */;
/*!40000 ALTER TABLE `dobrovolka_teztools` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.franchise_type
CREATE TABLE IF NOT EXISTS `franchise_type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table ddgi_test_2.franchise_type: ~3 rows (approximately)
DELETE FROM `franchise_type`;
/*!40000 ALTER TABLE `franchise_type` DISABLE KEYS */;
INSERT INTO `franchise_type` (`id`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '??????', NULL, NULL, NULL),
	(2, '????????????????', NULL, NULL, NULL),
	(3, '??????????????????????', NULL, NULL, NULL);
/*!40000 ALTER TABLE `franchise_type` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.from_site_orders
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

-- Dumping data for table ddgi_test_2.from_site_orders: ~3 rows (approximately)
DELETE FROM `from_site_orders`;
/*!40000 ALTER TABLE `from_site_orders` DISABLE KEYS */;
INSERT INTO `from_site_orders` (`id`, `order_id`, `title`, `object_title`, `status`, `amount`, `prize`, `timestamp`, `term`, `inventory_number`, `total_area`, `city_property`, `street`, `type_property`, `matches_registration_address`, `username`, `first_name`, `last_name`, `middle_name`, `is_active`, `avatar`, `birth_day`, `serial_number`, `passport_number`, `date_issue`, `issued_by`, `phone`, `email_index`, `city`, `district`, `user_street`, `apartment_number`, `home_number`, `created_at`, `updated_at`) VALUES
	(1, 1, '?????????????????????? ???????????????????????? ??????????????????????', '??????????????', '?????????????? ????????????????', '0', '10000', '2021-02-03 09:49:32', '2021-08-31 15:22:34', '', '', '', '', '', '0', 'adminddgi', 'Sardor', 'Maxmudov', 'Maxmudovich', 1, 'http://ddgi.uz/media/profile/2021/02/08/mac.jpg', '2020-09-08', 'AA', '4799722', '2000-02-22', 'IIB Yunusobod Tumani', '998977008055', '10000800', '??????????????', '????????????????', '18', '17', '9', '2021-02-08 12:51:34', '2021-03-31 06:55:11'),
	(2, 2, '?????????????????????? ???????????????????????? ??????????????????????', '??????????????', '????????????????????', '8340000', '41700', '2021-02-08 07:25:34', '2021-08-08 08:25:34', '', '', '', '', '', '1', 'adminddgi', 'Sardor', 'Maxmudov', 'Maxmudovich', 1, 'http://ddgi.uz/media/profile/2021/02/08/mac.jpg', '2020-09-08', 'AA', '4799722', '2000-02-22', 'IIB Yunusobod Tumani', '998977008055', '10000800', '??????????????', '????????????????', '18', '17', '9', '2021-02-08 12:51:34', '2021-03-31 06:55:11'),
	(3, 3, '?????????????????????? ??????????????????', '????????????????', '????????????????????', '32650000000', '3874750.0', '2021-02-08 07:43:47', '2021-08-08 08:43:47', '44766554114777', '120', '??????????????', '18', '2', '0', 'adminddgi', 'Sardor', 'Maxmudov', 'Maxmudovich', 1, 'http://ddgi.uz/media/profile/2021/02/08/mac.jpg', '2020-09-08', 'AA', '4799722', '2000-02-22', 'IIB Yunusobod Tumani', '998977008055', '10000800', '??????????????', '????????????????', '18', '17', '9', '2021-02-08 12:52:08', '2021-03-31 06:55:11');
/*!40000 ALTER TABLE `from_site_orders` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.groups
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi_test_2.groups: ~2 rows (approximately)
DELETE FROM `groups`;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'group 1', '2021-02-12 01:04:42', '2021-02-11 23:16:45', NULL),
	(2, 'group 2', '2021-02-11 23:19:32', '2021-02-11 23:19:45', NULL);
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.kasco_strah_premiya
CREATE TABLE IF NOT EXISTS `kasco_strah_premiya` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kasco_id` int(11) NOT NULL,
  `strah_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strah_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.kasco_strah_premiya: ~0 rows (approximately)
DELETE FROM `kasco_strah_premiya`;
/*!40000 ALTER TABLE `kasco_strah_premiya` DISABLE KEYS */;
/*!40000 ALTER TABLE `kasco_strah_premiya` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.kasko
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
  `anketa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dogovor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `polis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.kasko: ~11 rows (approximately)
DELETE FROM `kasko`;
/*!40000 ALTER TABLE `kasko` DISABLE KEYS */;
INSERT INTO `kasko` (`id`, `insurance_from`, `insurance_to`, `reason`, `geo_zone`, `strahovaya_sum`, `strahovaya_purpose`, `franshiza`, `insurance_premium_currency`, `payment_term`, `sposob_rascheta`, `polis_series`, `insurance_from_date`, `policy_holder_id`, `policy_beneficiary_id`, `otvet_litso`, `created_at`, `updated_at`, `anketa`, `dogovor`, `polis`) VALUES
	(1, '2021-04-08', '2021-04-18', 'dfgbdfbg', 'dfgbdfgb', '234234', '4234234', '23423', 'UZS', '1', '1', '234234', '2021-04-02', 71, 28, 3, '2021-04-09 17:00:08', '2021-04-09 17:00:08', '', '', ''),
	(2, '2021-04-08', '2021-04-18', 'dfgbdfbg', 'dfgbdfgb', '234234', '4234234', '23423', 'UZS', '1', '1', '234234', '2021-04-02', 72, 29, 3, '2021-04-09 17:00:42', '2021-04-09 17:00:42', '', '', ''),
	(3, '2021-04-23', '2021-04-29', 'dfgbdfbg', 'dsfvdfsv', '234234', '3', '23424', 'UZS', '1', '1', '1', '2021-04-09', 79, 34, 4, '2021-04-10 10:03:26', '2021-04-10 10:03:26', '', '', ''),
	(4, '2021-04-23', '2021-04-29', 'dfgbdfbg', 'dsfvdfsv', '234234', '3', '23424', 'UZS', '1', '1', '1', '2021-04-09', 80, 35, 4, '2021-04-10 10:04:16', '2021-04-10 10:04:16', '', '', ''),
	(5, '2021-04-23', '2021-04-29', 'dfgbdfbg', 'dsfvdfsv', '234234', '3', '23424', 'UZS', '1', '1', '1', '2021-04-13', 81, 36, 4, '2021-04-10 10:06:05', '2021-04-10 10:06:05', '', '', ''),
	(6, '2021-04-23', '2021-04-29', 'dfgbdfbg', 'dsfvdfsv', '234234', '3', '23424', 'UZS', '1', '1', '1', '2021-04-13', 82, 37, 4, '2021-04-10 10:06:20', '2021-04-10 10:06:20', '', '', ''),
	(7, '2021-04-16', '2021-04-29', 'dfgbdfbg', 'dfgbdfgb', '234234', '23424', '23434', 'UZS', '1', '1', '1', '2021-04-01', 88, 40, 4, '2021-04-11 14:01:38', '2021-04-11 14:01:38', '', '', ''),
	(8, '2021-04-16', '2021-04-29', 'dfgbdfbg', 'dfgbdfgb', '234234', '23424', '23434', 'UZS', '1', '1', '1', '2021-04-01', 89, 41, 4, '2021-04-11 14:02:27', '2021-04-11 14:02:27', '', '', ''),
	(9, '2021-04-09', '2021-04-28', 'dfgbdfbg', 'dfgbdfgb', '234234', '3', '23424', 'UZS', '1', '2', '1', '2021-04-02', 95, 46, 4, '2021-04-18 08:53:40', '2021-04-18 08:53:40', 'kasko/PtX1NMCYsZf23ZAIE0tD2nyEibNbHkZzFReQI8e5.docx', 'kasko/qNOLBIyhrdCATZfCDylT5QmBgHOUiGoaLpHWgGsJ.docx', 'kasko/zrj6gGKDQmGEgyJG6uMcEY1iH5ILpFIvgYVsgLIp.docx'),
	(10, '2021-04-09', '2021-04-28', 'dfgbdfbg', 'dfgbdfgb', '234234', '3', '23424', 'UZS', '1', '2', '1', '2021-04-02', 96, 47, 4, '2021-04-18 08:54:52', '2021-04-18 08:54:52', 'kasko/BDG1yXfqOlpZTO12zy3REZgMINfA9j9NLTXuBLvQ.docx', 'kasko/bWf5zwi40SIjlqZu9ZOVSoCX73nnSZSxOom8OUOY.docx', 'kasko/R2G60clsB5IwuyMrvtGYWAOdQ22uWk6wNAoMHtfq.docx'),
	(11, '2021-04-09', '2021-04-28', 'dfgbdfbg', 'dfgbdfgb', '234234', '3', '23424', 'UZS', '1', '2', '1', '2021-04-02', 97, 48, 4, '2021-04-18 08:56:32', '2021-04-18 08:56:32', 'kasko/ON7FOvbunFsKMCMaZnsEOaE3lceXJfA7UAX6wJjI.docx', 'kasko/OaJvP2PBk2rSAOB8bMPfc57Lh6mvbTnrRPiCqQFY.docx', 'kasko/3iKuFlXEfdLhb15SSooSqNPQtTqeGSWunRtKF3hy.docx');
/*!40000 ALTER TABLE `kasko` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.kasko_policy_beneficiaries
CREATE TABLE IF NOT EXISTS `kasko_policy_beneficiaries` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `policy_beneficiary_id` int(11) unsigned NOT NULL,
  `kasko_id` int(11) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table ddgi_test_2.kasko_policy_beneficiaries: ~5 rows (approximately)
DELETE FROM `kasko_policy_beneficiaries`;
/*!40000 ALTER TABLE `kasko_policy_beneficiaries` DISABLE KEYS */;
INSERT INTO `kasko_policy_beneficiaries` (`id`, `policy_beneficiary_id`, `kasko_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 4, 13, NULL, NULL, NULL),
	(2, 6, 14, NULL, NULL, NULL),
	(3, 2, 15, NULL, NULL, NULL),
	(4, 7, 20, NULL, NULL, NULL),
	(5, 8, 21, NULL, NULL, NULL);
/*!40000 ALTER TABLE `kasko_policy_beneficiaries` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.kasko_policy_holders
CREATE TABLE IF NOT EXISTS `kasko_policy_holders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `policy_holders_id` int(11) unsigned NOT NULL,
  `kasko_id` int(11) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi_test_2.kasko_policy_holders: ~6 rows (approximately)
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

-- Dumping structure for table ddgi_test_2.kasko_policy_informations
CREATE TABLE IF NOT EXISTS `kasko_policy_informations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `insurance_sum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.kasko_policy_informations: ~1 rows (approximately)
DELETE FROM `kasko_policy_informations`;
/*!40000 ALTER TABLE `kasko_policy_informations` DISABLE KEYS */;
INSERT INTO `kasko_policy_informations` (`id`, `polis_god_vupyska`, `polis_date_from`, `polis_date_to`, `polis_marka`, `polis_model`, `polis_gos_nomer`, `polis_nomer_tex_passporta`, `polis_nomer_dvigatelya`, `polis_nomer_kuzova`, `polis_gruzopodoemnost`, `polis_strah_value`, `polis_strah_sum`, `polis_strah_premia`, `mark_model`, `name`, `series_number`, `insurance_sum`, `cover_terror_attacks_sum`, `cover_terror_attacks_currency`, `cover_terror_attacks_insured_sum`, `cover_terror_attacks_insured_currency`, `coverage_evacuation_cost`, `coverage_evacuation_currency`, `other_insurance_info`, `one_sum`, `one_premia`, `one_franshiza`, `tho_sum`, `two_preim`, `driver_quantity`, `driver_one_sum`, `driver_currency`, `driver_total_sum`, `driver_preim_sum`, `passenger_quantity`, `passenger_one_sum`, `passenger_currency`, `passenger_total_sum`, `limit_quantity`, `limit_one_sum`, `limit_currency`, `limit_total_sum`, `limit_preim_sum`, `total_liability_limit`, `total_liability_limit_currency`, `from_date`, `policy_id`, `agent_id`, `payment`, `payment_order`, `overall_sum`, `policy_series_id`, `policy_agent_id`, `kasko_id`, `created_at`, `updated_at`) VALUES
	(1, '2423', '2021-04-21', '2021-04-27', '????????????', 'grtg', '????????', '??????????????', '3245', '23424', '23', '32', '34', '44', '??????????????????', '????????????', '????????????', 'FotTestOnly', '2345', 'U', '23453254', 'U', '32452', 'U', 'PO Box F', NULL, NULL, NULL, '2345235', '2345235', '1', NULL, 'UZS', NULL, NULL, NULL, NULL, 'UZS', NULL, NULL, NULL, 'UZS', NULL, NULL, '234234', 'UZS', '2021-04-14', 2, 4, '??????', '??????', NULL, 2, 3, 11, '2021-04-18 08:56:32', '2021-04-18 08:56:32');
/*!40000 ALTER TABLE `kasko_policy_informations` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.klass
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi_test_2.klass: ~6 rows (approximately)
DELETE FROM `klass`;
/*!40000 ALTER TABLE `klass` DISABLE KEYS */;
INSERT INTO `klass` (`id`, `group_id`, `code`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, '01', '?????????????????????? ???????????????? ???????????????????????? ??????????????', 'Class 1 has been created just for test', '2021-01-21 06:56:18', '2021-01-21 06:56:18', NULL),
	(2, 1, '02', 'name', 'descr', NULL, NULL, NULL),
	(3, 1, '03', '?????? ??????????', 'desc', NULL, NULL, NULL),
	(4, 1, '04', '?????????????????????????????? ???????????????????? ??????????', '????????????????', NULL, NULL, NULL),
	(5, 1, '05', '???????????????????? ???????????? ??????????', '????????????????', NULL, NULL, NULL),
	(6, 1, '06', '???????????????????? ??????????', '????????????????', NULL, NULL, NULL);
/*!40000 ALTER TABLE `klass` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.lising_product
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

-- Dumping data for table ddgi_test_2.lising_product: ~0 rows (approximately)
DELETE FROM `lising_product`;
/*!40000 ALTER TABLE `lising_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `lising_product` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.managers
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

-- Dumping data for table ddgi_test_2.managers: ~0 rows (approximately)
DELETE FROM `managers`;
/*!40000 ALTER TABLE `managers` DISABLE KEYS */;
/*!40000 ALTER TABLE `managers` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.mejd_currency_terms_transhes
CREATE TABLE IF NOT EXISTS `mejd_currency_terms_transhes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `all_products_id` bigint(20) unsigned NOT NULL,
  `payment_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mejd_currency_terms_transhes_all_products_id_foreign` (`all_products_id`),
  CONSTRAINT `mejd_currency_terms_transhes_all_products_id_foreign` FOREIGN KEY (`all_products_id`) REFERENCES `all_products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.mejd_currency_terms_transhes: ~0 rows (approximately)
DELETE FROM `mejd_currency_terms_transhes`;
/*!40000 ALTER TABLE `mejd_currency_terms_transhes` DISABLE KEYS */;
/*!40000 ALTER TABLE `mejd_currency_terms_transhes` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.migrations: ~84 rows (approximately)
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
	(55, '2021_04_03_180636_create_request_overviews_table', 8),
	(56, '2021_03_22_194857_create_otvetsvennost_audits_table', 9),
	(57, '2021_04_01_164849_create_covids_table', 10),
	(58, '2021_04_01_180721_add_column_policy_holder', 10),
	(59, '2021_04_03_121950_create_covid_policy_information_table', 10),
	(60, '2021_04_03_161746_create_zalog_imushestvos_table', 10),
	(61, '2021_04_03_173227_create_zalog_imushestvo_infos_table', 10),
	(62, '2021_04_04_080037_create_zalog_imushestvo_strah_premiyas_table', 10),
	(63, '2021_04_04_090607_create_covid_strah_premiyas_table', 10),
	(64, '2021_04_03_080451_create_neshchastka24_times_table', 11),
	(65, '2021_04_03_090336_create_neshchastka24time_information_table', 11),
	(66, '2021_04_04_212642_create_perestrahovaniyas_table', 12),
	(67, '2021_04_04_232831_create_perestrahovaniya_overviews_table', 12),
	(68, '2021_04_10_151242_add_geo_zone_24time', 13),
	(70, '2021_04_17_103320_create_mejd_currency_terms_transhes_table', 14),
	(71, '2021_04_17_103641_create_all_product_information_table', 14),
	(74, '2021_04_17_101150_create_all_products_table', 15),
	(75, '2021_04_23_171723_create_all_products_terms_transhes_table', 15),
	(76, '2021_04_27_144230_create_zalogodatels_table', 16),
	(79, '2021_05_07_171046_create_all_product_information_transports_table', 17),
	(80, '2021_04_17_131311_add_fields_informatiosn', 18),
	(81, '2021_04_24_110348_add_field_administrative_case', 18),
	(82, '2021_04_27_145218_add_extra_fields_all_products_table', 18),
	(83, '2021_04_27_160721_create_all_product_imushestvo_infos_table', 18),
	(84, '2021_04_29_180314_add_column_zalog_all_products', 18),
	(85, '2021_04_30_151420_add_field_all_product_informatopn_table', 19),
	(86, '2021_05_03_180342_create_buyers_table', 20),
	(87, '2021_05_03_191919_create_poruchitels_table', 20),
	(88, '2021_05_03_222020_create_all_product_followers_table', 20),
	(89, '2021_05_20_151919_add_additional_fields_to_all_products_table', 21);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.model_has_permissions: ~1 rows (approximately)
DELETE FROM `model_has_permissions`;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\User', 3);
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.model_has_roles: ~0 rows (approximately)
DELETE FROM `model_has_roles`;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.neshchastka24time_information
CREATE TABLE IF NOT EXISTS `neshchastka24time_information` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `neshchastka24_time_id` int(11) NOT NULL,
  `polis_id` int(11) NOT NULL,
  `agents` int(11) NOT NULL,
  `period_polis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `polis_agent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `polis_model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `polis_modification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `polis_teh_passport` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `polis_num_engine` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `polis_num_body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `polis_payload` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `polis_gos_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.neshchastka24time_information: ~3 rows (approximately)
DELETE FROM `neshchastka24time_information`;
/*!40000 ALTER TABLE `neshchastka24time_information` DISABLE KEYS */;
INSERT INTO `neshchastka24time_information` (`id`, `neshchastka24_time_id`, `polis_id`, `agents`, `period_polis`, `polis_agent`, `polis_model`, `polis_modification`, `polis_teh_passport`, `polis_num_engine`, `polis_num_body`, `polis_payload`, `created_at`, `updated_at`, `polis_gos_num`) VALUES
	(1, 2, 76, 1, '76', '1', 'grtg', 'ertgrt', 'tgtertger', 'ertgretg', '66', '77', '2021-04-09 16:43:47', '2021-04-09 16:43:47', NULL),
	(2, 4, 2, 1, '76', '1', '47', '23', 'tgtertger', 'ertgretg', '4', '5', '2021-04-10 09:58:02', '2021-04-10 09:58:02', NULL),
	(3, 6, 3, 1, '76', '1', '4', '43', 'rthy', 'ertgretg', '33', '44', '2021-04-18 08:36:53', '2021-04-18 08:36:53', NULL);
/*!40000 ALTER TABLE `neshchastka24time_information` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.neshchastka24_times
CREATE TABLE IF NOT EXISTS `neshchastka24_times` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `insurance_from` date NOT NULL,
  `insurance_to` date NOT NULL,
  `strah_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strah_prem` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `franshiza` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insurance_premium_currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_term` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sposob_rascheta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `polis_series` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `geo_zone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_vidachi_polisa` date NOT NULL,
  `otvet_litso` int(11) NOT NULL,
  `anketa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dogovor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `polis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_holder_id` int(11) NOT NULL,
  `policy_beneficiary_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.neshchastka24_times: ~6 rows (approximately)
DELETE FROM `neshchastka24_times`;
/*!40000 ALTER TABLE `neshchastka24_times` DISABLE KEYS */;
INSERT INTO `neshchastka24_times` (`id`, `insurance_from`, `insurance_to`, `strah_sum`, `strah_prem`, `franshiza`, `insurance_premium_currency`, `payment_term`, `sposob_rascheta`, `polis_series`, `geo_zone`, `data_vidachi_polisa`, `otvet_litso`, `anketa`, `dogovor`, `polis`, `policy_holder_id`, `policy_beneficiary_id`, `created_at`, `updated_at`) VALUES
	(1, '2021-04-08', '2021-04-18', '34232234', '234234', '2342342', 'UZS', 'transh', '1', '234234', 'dfgbdfgb', '2021-04-03', 4, 'payment (10).pdf', NULL, NULL, 69, 26, '2021-04-09 16:43:08', '2021-04-09 16:43:08'),
	(2, '2021-04-08', '2021-04-18', '34232234', '234234', '2342342', 'UZS', 'transh', '1', '234234', 'dfgbdfgb', '2021-04-03', 4, NULL, NULL, NULL, 70, 27, '2021-04-09 16:43:47', '2021-04-09 16:46:58'),
	(3, '2021-04-04', '2021-04-15', '34232234', '234234', '23424', 'UZS', 'transh', '1', '2', 'dfgbdfgb', '2021-04-14', 3, '240_screenshots_20200919205313_1.jpg', NULL, NULL, 77, 32, '2021-04-10 09:56:44', '2021-04-10 09:56:44'),
	(4, '2021-04-04', '2021-04-15', '34232234', '234234', '23424', 'UZS', 'transh', '1', '3', 'dfgbdfgb', '2021-04-14', 3, NULL, NULL, NULL, 78, 33, '2021-04-10 09:58:02', '2021-04-10 09:58:43'),
	(5, '2021-04-16', '2021-04-22', '34232234', '234234', '23423', 'UZS', '1', '1', '1', 'dfgbdfgb', '2021-04-10', 4, 'time/YNIznpbCEAWYazbkvT4uF85dIoMJD0N3o6zu5HV7.docx', NULL, NULL, 86, 38, '2021-04-11 13:40:04', '2021-04-11 13:40:04'),
	(6, '2021-04-14', '2021-04-29', '34232234', '234234', '23424', 'UZS', '1', '1', '2', 'dfgbdfgb', '2021-04-09', 3, 'time/TdOf7DgcmBLagItjol8toiAoFFgTWIWEeBkI3Ssq.docx', 'time/e67yO0tWIOwuCJZnFzeOXtIQIhgQDKi768Pqa3tm.docx', 'time/2AdktyCD2R3MCFhPtGFSNwAnAAr7GgMDmHZHdaFB.docx', 91, 42, '2021-04-18 08:36:53', '2021-04-18 08:36:53');
/*!40000 ALTER TABLE `neshchastka24_times` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.neshchastka24_times_strah_premiya
CREATE TABLE IF NOT EXISTS `neshchastka24_times_strah_premiya` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `neshchastka24_time_id` int(11) NOT NULL,
  `payment_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_from` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.neshchastka24_times_strah_premiya: ~3 rows (approximately)
DELETE FROM `neshchastka24_times_strah_premiya`;
/*!40000 ALTER TABLE `neshchastka24_times_strah_premiya` DISABLE KEYS */;
INSERT INTO `neshchastka24_times_strah_premiya` (`id`, `neshchastka24_time_id`, `payment_sum`, `payment_from`, `created_at`, `updated_at`) VALUES
	(1, 1, '343224', '2021-04-08', '2021-04-09 16:43:08', '2021-04-09 16:43:08'),
	(2, 1, '24234234', '2021-05-08', '2021-04-09 16:43:08', '2021-04-09 16:43:08'),
	(4, 3, '234242', '2021-04-20', '2021-04-10 09:56:44', '2021-04-10 09:56:44');
/*!40000 ALTER TABLE `neshchastka24_times_strah_premiya` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.neshchastka_borrowers
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

-- Dumping data for table ddgi_test_2.neshchastka_borrowers: ~0 rows (approximately)
DELETE FROM `neshchastka_borrowers`;
/*!40000 ALTER TABLE `neshchastka_borrowers` DISABLE KEYS */;
/*!40000 ALTER TABLE `neshchastka_borrowers` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.notary_payment_term
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

-- Dumping data for table ddgi_test_2.notary_payment_term: ~0 rows (approximately)
DELETE FROM `notary_payment_term`;
/*!40000 ALTER TABLE `notary_payment_term` DISABLE KEYS */;
/*!40000 ALTER TABLE `notary_payment_term` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.oauth_access_tokens
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

-- Dumping data for table ddgi_test_2.oauth_access_tokens: ~4 rows (approximately)
DELETE FROM `oauth_access_tokens`;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
	('029d24cfbd7a254cb9e930bc7e7c779c061bf351b61ee93ad95ab665ac21e75272396c80d69eefd6', 3, 1, 'MyApp', '[]', 1, '2021-02-23 23:10:39', '2021-02-23 23:10:39', '2022-02-24 02:10:39'),
	('1057116abbbfcdfe8650b5b11162838249ba9dce3fdf79800a0b7e84ba960a69e6498662a8a4955d', 3, 1, 'MyApp', '[]', 0, '2021-02-24 04:44:59', '2021-02-24 04:44:59', '2022-02-24 07:44:59'),
	('8dd1ecbeee3f449c9e9e13827a73ae8ed733a18ebfded0bccf76cd13dcb6667b41438138c5edef7b', 3, 1, 'MyApp', '[]', 1, '2021-02-23 23:43:10', '2021-02-23 23:43:10', '2022-02-24 02:43:10'),
	('e272069d3e74f4eb6cb253c8171f4b1ec835b742f3804a4db51e16e430ffff6d2a8267cb9e8fb980', 3, 1, 'MyApp', '[]', 0, '2021-02-23 23:35:53', '2021-02-23 23:35:53', '2022-02-24 02:35:53');
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.oauth_auth_codes
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

-- Dumping data for table ddgi_test_2.oauth_auth_codes: ~0 rows (approximately)
DELETE FROM `oauth_auth_codes`;
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.oauth_clients
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

-- Dumping data for table ddgi_test_2.oauth_clients: ~2 rows (approximately)
DELETE FROM `oauth_clients`;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
	(1, NULL, 'Laravel Personal Access Client', 'A1kLwsS888H9z1xr3WJnCEzn8lGbs3Tc6c3EZFXu', NULL, 'http://localhost', 1, 0, 0, '2021-02-23 23:07:59', '2021-02-23 23:07:59'),
	(2, NULL, 'Laravel Password Grant Client', '6G3UGpjGLSmvosoMQw4p46TM75t7rAmktKhIZTGe', 'users', 'http://localhost', 0, 1, 0, '2021-02-23 23:07:59', '2021-02-23 23:07:59');
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.oauth_personal_access_clients
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.oauth_personal_access_clients: ~1 rows (approximately)
DELETE FROM `oauth_personal_access_clients`;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
	(1, 1, '2021-02-23 23:07:59', '2021-02-23 23:07:59');
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.oauth_refresh_tokens
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.oauth_refresh_tokens: ~0 rows (approximately)
DELETE FROM `oauth_refresh_tokens`;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.otvetstvennost_brokers
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

-- Dumping data for table ddgi_test_2.otvetstvennost_brokers: ~0 rows (approximately)
DELETE FROM `otvetstvennost_brokers`;
/*!40000 ALTER TABLE `otvetstvennost_brokers` DISABLE KEYS */;
/*!40000 ALTER TABLE `otvetstvennost_brokers` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.otvetstvennost_natarius
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

-- Dumping data for table ddgi_test_2.otvetstvennost_natarius: ~0 rows (approximately)
DELETE FROM `otvetstvennost_natarius`;
/*!40000 ALTER TABLE `otvetstvennost_natarius` DISABLE KEYS */;
/*!40000 ALTER TABLE `otvetstvennost_natarius` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.otvetstvennost_natarius_grey
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

-- Dumping data for table ddgi_test_2.otvetstvennost_natarius_grey: ~0 rows (approximately)
DELETE FROM `otvetstvennost_natarius_grey`;
/*!40000 ALTER TABLE `otvetstvennost_natarius_grey` DISABLE KEYS */;
/*!40000 ALTER TABLE `otvetstvennost_natarius_grey` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.otvetstvennost_natarius_info
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

-- Dumping data for table ddgi_test_2.otvetstvennost_natarius_info: ~0 rows (approximately)
DELETE FROM `otvetstvennost_natarius_info`;
/*!40000 ALTER TABLE `otvetstvennost_natarius_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `otvetstvennost_natarius_info` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.otvetstvennost_otsenshiki
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
  `administrative_case` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.otvetstvennost_otsenshiki: ~1 rows (approximately)
DELETE FROM `otvetstvennost_otsenshiki`;
/*!40000 ALTER TABLE `otvetstvennost_otsenshiki` DISABLE KEYS */;
INSERT INTO `otvetstvennost_otsenshiki` (`id`, `info_personal`, `insurance_from`, `insurance_to`, `geo_zone`, `first_year`, `second_year`, `first_turnover`, `second_turnover`, `total_turnover`, `first_profit`, `second_profit`, `total_profit`, `sfera_deyatelnosti`, `limit_otvetstvennosti`, `documents`, `insurance_premium_currency`, `poryadok_oplaty_premii`, `strahovaya_sum`, `strahovaya_purpose`, `franshiza`, `serial_number_policy`, `date_issue_policy`, `otvet_litso`, `anketa`, `dogovor`, `polis`, `public_sector_comment`, `private_sector_comment`, `reason_case`, `reason_administrative_case`, `policy_holder_id`, `prof_riski`, `created_at`, `updated_at`, `administrative_case`) VALUES
	(1, '??????????????????', '2021-04-02', '2021-04-23', '23asdf', '2323', '34', '34', '34', '68', '23', '23', '46', '3', '1', 'a:1:{i:0;s:71:"otvetstvennost_otsenshiki/EYc7kwXV0yvKuDHATOWCe0fqYbOfcFfA4gQPwBu2.docx";}', 'UZS', '1', '234234', '777', '234234', '234', '2021-03-31', 4, 'otvetstvennost_otsenshiki/cv64fDB5KsmRYC7szENSEWeaz5G8KRz7JtDvN6CP.png', 'otvetstvennost_otsenshiki/gP7AFHBl6zhE6ZI1PCNSm0jlYJHU6En271H6cDRx.png', 'otvetstvennost_otsenshiki/z9b2YWbdPem3F649MYAH52fpLU0Qpf8CBLtGBiFH.png', '23141234', '1234214', '1234214', '1234214', 1, '12341242', '2021-04-10 10:19:46', '2021-04-18 09:05:26', NULL);
/*!40000 ALTER TABLE `otvetstvennost_otsenshiki` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.otvetstvennost_otsenshiki_info
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.otvetstvennost_otsenshiki_info: ~1 rows (approximately)
DELETE FROM `otvetstvennost_otsenshiki_info`;
/*!40000 ALTER TABLE `otvetstvennost_otsenshiki_info` DISABLE KEYS */;
INSERT INTO `otvetstvennost_otsenshiki_info` (`id`, `insurer_price`, `insurer_sum`, `insurer_premium`, `time_stay`, `position`, `experience`, `specialty`, `insurer_fio`, `from_date_polis`, `to_date_polis`, `otvetstvennost_otsenshiki_id`, `agent_id`, `policy_series_id`, `created_at`, `updated_at`) VALUES
	(2, '23', '6', '5', '????????', '????????', 'work experience', 'Specialty', '??????????????', '2021-04-01', '2021-04-22', 1, 3, 1, '2021-04-18 09:05:26', '2021-04-18 09:05:26');
/*!40000 ALTER TABLE `otvetstvennost_otsenshiki_info` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.otvetstvennost_otsenshiki_strah_premiyas
CREATE TABLE IF NOT EXISTS `otvetstvennost_otsenshiki_strah_premiyas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `prem_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prem_from` date NOT NULL,
  `otvetstvennost_otsenshiki_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.otvetstvennost_otsenshiki_strah_premiyas: ~0 rows (approximately)
DELETE FROM `otvetstvennost_otsenshiki_strah_premiyas`;
/*!40000 ALTER TABLE `otvetstvennost_otsenshiki_strah_premiyas` DISABLE KEYS */;
/*!40000 ALTER TABLE `otvetstvennost_otsenshiki_strah_premiyas` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.otvetstvennost_podryadchiks
CREATE TABLE IF NOT EXISTS `otvetstvennost_podryadchiks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '?????? ????.= 1; ?????? = 0',
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

-- Dumping data for table ddgi_test_2.otvetstvennost_podryadchiks: ~1 rows (approximately)
DELETE FROM `otvetstvennost_podryadchiks`;
/*!40000 ALTER TABLE `otvetstvennost_podryadchiks` DISABLE KEYS */;
INSERT INTO `otvetstvennost_podryadchiks` (`id`, `type`, `informaciya_o_personale`, `from_date`, `to_date`, `geo_zone`, `unique_number`, `payment_term`, `currencies`, `strahovaya_sum`, `serial_number_policy`, `strahovaya_purpose`, `policy_id`, `product_id`, `insurance_premium_payment_type`, `date_issue_policy`, `otvet_litso`, `policy_holder_id`, `created_at`, `updated_at`) VALUES
	(3, 0, '???????????????????? ?? ??????????????????', '2021-03-01', '2021-04-09', '???????????????????????????? ????????:', '0100/0404/1/2100003', 'other', 'UZS', '234234', 1, '345', 8, 4, 1, '2021-03-23', 4, 42, '2021-03-24 00:57:26', '2021-03-24 01:01:45');
/*!40000 ALTER TABLE `otvetstvennost_podryadchiks` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.otvetstvennost_podryadchik_strah_premiyas
CREATE TABLE IF NOT EXISTS `otvetstvennost_podryadchik_strah_premiyas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `prem_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prem_from` date NOT NULL,
  `otvetstvennost_podryadchik_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.otvetstvennost_podryadchik_strah_premiyas: ~2 rows (approximately)
DELETE FROM `otvetstvennost_podryadchik_strah_premiyas`;
/*!40000 ALTER TABLE `otvetstvennost_podryadchik_strah_premiyas` DISABLE KEYS */;
INSERT INTO `otvetstvennost_podryadchik_strah_premiyas` (`id`, `prem_sum`, `prem_from`, `otvetstvennost_podryadchik_id`, `created_at`, `updated_at`) VALUES
	(1, '234242', '2021-03-17', 1, '2021-03-24 00:20:17', '2021-03-24 00:20:17'),
	(2, '234242', '2021-03-17', 3, '2021-03-24 00:57:26', '2021-03-24 00:57:26');
/*!40000 ALTER TABLE `otvetstvennost_podryadchik_strah_premiyas` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.otvetstvennost_realtors
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.otvetstvennost_realtors: ~2 rows (approximately)
DELETE FROM `otvetstvennost_realtors`;
/*!40000 ALTER TABLE `otvetstvennost_realtors` DISABLE KEYS */;
INSERT INTO `otvetstvennost_realtors` (`id`, `info_personal`, `insurance_from`, `insurance_to`, `geo_zone`, `first_year`, `second_year`, `first_turnover`, `second_turnover`, `total_turnover`, `first_profit`, `second_profit`, `total_profit`, `sfera_deyatelnosti`, `limit_otvetstvennosti`, `documents`, `insurance_premium_currency`, `poryadok_oplaty_premii`, `strahovaya_sum`, `strahovaya_purpose`, `franshiza`, `serial_number_policy`, `date_issue_policy`, `otvet_litso`, `activity_period_from`, `activity_period_to`, `activity_period_all`, `acted`, `public_sector_comment`, `private_sector_comment`, `cases`, `reason_case`, `administrative_case`, `reason_administrative_case`, `prof_riski`, `anketa`, `dogovor`, `polis`, `policy_holder_id`, `created_at`, `updated_at`) VALUES
	(1, 'sdfgsdg', '2021-04-23', '2021-04-22', 'dsfv', '2323', '34', '34', '34', '68', '23', '23', '46', '1', '1', 'a:1:{i:0;s:68:"otvetstvennost_realtor/kArcOY3ZjEhbisTylzUZFvTZ1LBk7mItktJnMsii.docx";}', 'UZS', '1', '234234', '3', '23424', '1', '2021-04-21', 1, '2021-04-03', '2021-04-13', '10 ????????', 1, 'some data', 'some data', 1, 'some data', 0, NULL, '2322423', 'otvetstvennost_realtor/7CoOeLjR33go2i4tBpVDHaSh499QAg4dIAqq08Tb.docx', NULL, NULL, 85, '2021-04-11 13:16:54', '2021-04-19 09:17:40'),
	(2, 'fghjkl,', '2021-04-07', '2021-04-22', 'dfgbdfgb', '2323', '23452345', '34', '3223', '3257', '23', '3452345', '3452368', '1', '1', 'a:1:{i:0;s:67:"otvetstvennost_realtor/R8EudnvAwU4zFXeuyOiwCHHe9OiMTLmCfCy9oGZu.png";}', 'UZS', '1', '555', '777', '23424', '1', '2021-04-07', 1, '2021-04-09', '2021-05-01', '22 ????????', 0, NULL, NULL, 0, NULL, 0, NULL, '2322423', 'otvetstvennost_realtor/MV3MbdgI8nVJqkBVsRClLp2vKx3svj0TxDhGFF2K.docx', NULL, NULL, 90, '2021-04-13 05:42:26', '2021-04-13 05:57:35');
/*!40000 ALTER TABLE `otvetstvennost_realtors` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.otvetstvennost_realtor_infos
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.otvetstvennost_realtor_infos: ~2 rows (approximately)
DELETE FROM `otvetstvennost_realtor_infos`;
/*!40000 ALTER TABLE `otvetstvennost_realtor_infos` DISABLE KEYS */;
INSERT INTO `otvetstvennost_realtor_infos` (`id`, `insurer_price`, `insurer_sum`, `insurer_premium`, `time_stay`, `position`, `experience`, `specialty`, `insurer_fio`, `from_date_polis`, `to_date_polis`, `otvetstvennost_realtor_id`, `agent_id`, `policy_series_id`, `created_at`, `updated_at`) VALUES
	(5, '4', '5', '6', '????????', '????????', 'work experience', 'Specialty', '??????????????', '2021-04-22', '2021-04-29', 2, 3, 1, '2021-04-13 05:57:35', '2021-04-13 05:57:35'),
	(10, '23', '6', '5', '????????', '????????', 'work experience', 'Specialty', '??????????????', '2021-04-22', '2021-04-14', 1, 3, 1, '2021-04-19 09:17:40', '2021-04-19 09:17:40');
/*!40000 ALTER TABLE `otvetstvennost_realtor_infos` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.otvetstvennost_realtor_strah_premiyas
CREATE TABLE IF NOT EXISTS `otvetstvennost_realtor_strah_premiyas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `prem_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prem_from` date NOT NULL,
  `otvetstvennost_realtor_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.otvetstvennost_realtor_strah_premiyas: ~0 rows (approximately)
DELETE FROM `otvetstvennost_realtor_strah_premiyas`;
/*!40000 ALTER TABLE `otvetstvennost_realtor_strah_premiyas` DISABLE KEYS */;
/*!40000 ALTER TABLE `otvetstvennost_realtor_strah_premiyas` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.otvetsvennost_audits
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

-- Dumping data for table ddgi_test_2.otvetsvennost_audits: ~0 rows (approximately)
DELETE FROM `otvetsvennost_audits`;
/*!40000 ALTER TABLE `otvetsvennost_audits` DISABLE KEYS */;
/*!40000 ALTER TABLE `otvetsvennost_audits` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.perestrahovaniyas
CREATE TABLE IF NOT EXISTS `perestrahovaniyas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `comments` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_series_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `perestrahovaniyas_user_id_foreign` (`user_id`),
  CONSTRAINT `perestrahovaniyas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.perestrahovaniyas: ~2 rows (approximately)
DELETE FROM `perestrahovaniyas`;
/*!40000 ALTER TABLE `perestrahovaniyas` DISABLE KEYS */;
INSERT INTO `perestrahovaniyas` (`id`, `user_id`, `comments`, `file`, `policy_id`, `policy_series_id`, `state`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 3, 'asDSDas', 'request_file/dae0jMVPrYC1sk3oCzPLOn1wS30Zqf12DUxqmGY0.jpg', '1', '1', '1', '2021-05-17 17:22:40', '2021-05-17 17:23:32', '2021-05-17 17:23:32'),
	(2, 3, 'aDaSDas', 'request_file/MWOSiWgC3DGIZq4ZRaD2xbWBKBfrwNkhjvF8Xu2Y.jpg', '1', '1', '1', '2021-05-17 17:23:29', '2021-05-17 17:23:29', NULL);
/*!40000 ALTER TABLE `perestrahovaniyas` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.perestrahovaniya_overviews
CREATE TABLE IF NOT EXISTS `perestrahovaniya_overviews` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `perestrahivaniya_id` bigint(20) unsigned NOT NULL,
  `passed` tinyint(1) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.perestrahovaniya_overviews: ~0 rows (approximately)
DELETE FROM `perestrahovaniya_overviews`;
/*!40000 ALTER TABLE `perestrahovaniya_overviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `perestrahovaniya_overviews` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.permissions: ~1 rows (approximately)
DELETE FROM `permissions`;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'show pretensii', 'web', NULL, NULL);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.policies
CREATE TABLE IF NOT EXISTS `policies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `number` int(11) unsigned NOT NULL,
  `polis_unique_number` varchar(50) DEFAULT NULL,
  `act_number` varchar(50) NOT NULL,
  `polis_name` varchar(100) NOT NULL,
  `policy_series_id` int(11) DEFAULT '0',
  `a_reg` varchar(50) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `branch_id` int(11) unsigned DEFAULT '0',
  `user_id` int(11) unsigned DEFAULT '0',
  `polis_from_date` date DEFAULT NULL,
  `polis_to_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=569 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi_test_2.policies: ~518 rows (approximately)
DELETE FROM `policies`;
/*!40000 ALTER TABLE `policies` DISABLE KEYS */;
INSERT INTO `policies` (`id`, `number`, `polis_unique_number`, `act_number`, `polis_name`, `policy_series_id`, `a_reg`, `price`, `status`, `branch_id`, `user_id`, `polis_from_date`, `polis_to_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 141, NULL, 'asdvvd', '', 1, NULL, NULL, 'in_use', 2, 9, NULL, NULL, '2021-01-08 21:00:00', '2021-03-24 03:13:42', NULL),
	(2, 142, NULL, 'asdvvd', '', 1, NULL, NULL, 'in_use', 2, 9, NULL, NULL, '2021-01-08 21:00:00', '2021-03-03 02:13:10', NULL),
	(3, 143, NULL, 'asdvvd', '', 1, NULL, NULL, 'in_use', 2, 9, NULL, NULL, '2021-01-08 21:00:00', '2021-03-03 03:13:03', NULL),
	(4, 144, NULL, 'asdvvd', '', 1, NULL, NULL, 'in_use', 2, 9, NULL, NULL, '2021-01-08 21:00:00', '2021-03-03 03:13:29', NULL),
	(5, 145, NULL, 'asdvvd', '', 1, NULL, NULL, 'in_use', 2, 9, NULL, NULL, '2021-01-08 21:00:00', '2021-03-07 04:27:38', NULL),
	(6, 146, NULL, 'asdvvd', '', 1, NULL, NULL, 'in_use', 2, 9, NULL, NULL, '2021-01-08 21:00:00', '2021-03-07 04:35:00', NULL),
	(7, 147, NULL, 'asdvvd', '', 1, NULL, NULL, 'in_use', 0, 0, NULL, NULL, '2021-01-08 21:00:00', '2021-03-24 00:51:44', NULL),
	(8, 148, NULL, 'asdvvd', '', 1, NULL, NULL, 'in_use', 0, 0, NULL, NULL, '2021-01-08 21:00:00', '2021-03-24 00:57:26', NULL),
	(9, 149, NULL, 'asdvvd', '', 1, NULL, NULL, 'in_use', 0, 0, NULL, NULL, '2021-01-08 21:00:00', '2021-03-24 03:11:27', NULL),
	(10, 150, NULL, 'asdvvd', '', 1, NULL, NULL, 'in_use', 2, 9, NULL, NULL, '2021-01-08 21:00:00', '2021-01-08 21:00:00', NULL),
	(11, 141, NULL, 'asdvvd', '', 0, NULL, NULL, 'in_use', 0, 0, NULL, NULL, '2021-01-08 21:00:00', '2021-03-03 05:45:31', NULL),
	(12, 142, NULL, 'asdvvd', '', 0, NULL, NULL, 'in_use', 0, 0, NULL, NULL, '2021-01-08 21:00:00', '2021-03-06 06:14:43', NULL),
	(13, 143, NULL, 'asdvvd', '', 0, NULL, NULL, 'new', 0, 0, NULL, NULL, '2021-01-08 21:00:00', '2021-01-08 21:00:00', NULL),
	(14, 144, NULL, 'asdvvd', '', 0, NULL, NULL, 'new', 0, 0, NULL, NULL, '2021-01-08 21:00:00', '2021-01-08 21:00:00', NULL),
	(15, 145, NULL, 'asdvvd', '', 0, NULL, NULL, 'new', 0, 0, NULL, NULL, '2021-01-08 21:00:00', '2021-01-08 21:00:00', NULL),
	(16, 146, NULL, 'asdvvd', '', 0, NULL, NULL, 'new', 0, 0, NULL, NULL, '2021-01-08 21:00:00', '2021-01-08 21:00:00', NULL),
	(17, 147, NULL, 'asdvvd', '', 0, NULL, NULL, 'new', 0, 0, NULL, NULL, '2021-01-08 21:00:00', '2021-01-08 21:00:00', NULL),
	(18, 148, NULL, 'asdvvd', '', 0, NULL, NULL, 'new', 0, 0, NULL, NULL, '2021-01-08 21:00:00', '2021-01-08 21:00:00', NULL),
	(19, 149, NULL, 'asdvvd', '', 0, NULL, NULL, 'new', 0, 0, NULL, NULL, '2021-01-08 21:00:00', '2021-01-08 21:00:00', NULL),
	(20, 150, NULL, 'asdvvd', '', 0, NULL, NULL, 'new', 0, 0, NULL, NULL, '2021-01-08 21:00:00', '2021-03-29 01:12:54', '2021-03-29 01:12:54'),
	(71, 200, NULL, 'asdvvd', '', 1, NULL, NULL, 'in_use', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:26:23', NULL),
	(72, 201, NULL, 'asdvvd', '', 1, NULL, NULL, 'in_use', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:33:22', NULL),
	(73, 202, NULL, 'asdvvd', '', 1, NULL, NULL, 'in_use', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:35:15', NULL),
	(74, 203, NULL, 'asdvvd', '', 1, NULL, NULL, 'in_use', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:36:01', NULL),
	(75, 204, NULL, 'asdvvd', '', 1, NULL, NULL, 'in_use', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:36:19', NULL),
	(76, 205, NULL, 'asdvvd', '', 1, NULL, NULL, 'in_use', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:39:01', NULL),
	(77, 206, NULL, 'asdvvd', '', 1, NULL, NULL, 'in_use', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-04-05 01:16:33', NULL),
	(78, 207, NULL, 'asdvvd', '', 1, NULL, NULL, 'in_use', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-04-05 01:19:22', NULL),
	(79, 208, NULL, 'asdvvd', '', 1, NULL, NULL, 'in_use', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-04-05 01:26:43', NULL),
	(80, 209, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(81, 210, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(82, 211, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(83, 212, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(84, 213, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(85, 214, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(86, 215, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(87, 216, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(88, 217, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(89, 218, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(90, 219, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(91, 220, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(92, 221, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(93, 222, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(94, 223, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(95, 224, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(96, 225, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(97, 226, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(98, 227, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(99, 228, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(100, 229, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(101, 230, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(102, 231, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(103, 232, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(104, 233, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(105, 234, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(106, 235, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(107, 236, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(108, 237, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(109, 238, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(110, 239, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(111, 240, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(112, 241, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(113, 242, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(114, 243, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(115, 244, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(116, 245, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(117, 246, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(118, 247, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(119, 248, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(120, 249, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-03-31 23:18:27', '2021-03-31 23:18:27', NULL),
	(121, 800, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:39', '2021-04-03 22:37:39', NULL),
	(122, 801, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:39', '2021-04-03 22:37:39', NULL),
	(123, 802, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:39', '2021-04-03 22:37:39', NULL),
	(124, 803, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:39', '2021-04-03 22:37:39', NULL),
	(125, 804, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:39', '2021-04-03 22:37:39', NULL),
	(126, 805, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:39', '2021-04-03 22:37:39', NULL),
	(127, 806, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(128, 807, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(129, 808, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(130, 809, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(131, 810, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(132, 811, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(133, 812, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(134, 813, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(135, 814, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(136, 815, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(137, 816, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(138, 817, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(139, 818, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(140, 819, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(141, 820, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(142, 821, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(143, 822, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(144, 823, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(145, 824, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(146, 825, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(147, 826, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(148, 827, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(149, 828, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(150, 829, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(151, 830, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(152, 831, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(153, 832, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(154, 833, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(155, 834, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(156, 835, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(157, 836, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(158, 837, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(159, 838, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(160, 839, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(161, 840, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(162, 841, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(163, 842, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(164, 843, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(165, 844, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(166, 845, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(167, 846, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(168, 847, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(169, 848, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(170, 849, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(171, 850, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(172, 851, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(173, 852, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(174, 853, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(175, 854, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(176, 855, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(177, 856, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(178, 857, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(179, 858, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(180, 859, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(181, 860, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(182, 861, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(183, 862, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(184, 863, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(185, 864, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(186, 865, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(187, 866, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(188, 867, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(189, 868, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(190, 869, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(191, 870, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(192, 871, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(193, 872, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(194, 873, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(195, 874, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(196, 875, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(197, 876, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(198, 877, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(199, 878, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(200, 879, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(201, 880, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(202, 881, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(203, 882, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(204, 883, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(205, 884, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(206, 885, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(207, 886, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(208, 887, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(209, 888, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(210, 889, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(211, 890, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(212, 891, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(213, 892, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(214, 893, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(215, 894, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(216, 895, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(217, 896, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(218, 897, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(219, 898, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(220, 899, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:37:40', '2021-04-03 22:37:40', NULL),
	(221, 800, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(222, 801, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(223, 802, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(224, 803, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(225, 804, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(226, 805, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(227, 806, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(228, 807, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(229, 808, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(230, 809, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(231, 810, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(232, 811, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(233, 812, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(234, 813, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(235, 814, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(236, 815, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(237, 816, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(238, 817, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(239, 818, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(240, 819, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(241, 820, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(242, 821, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(243, 822, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(244, 823, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(245, 824, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(246, 825, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(247, 826, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(248, 827, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(249, 828, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(250, 829, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(251, 830, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(252, 831, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(253, 832, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(254, 833, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(255, 834, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(256, 835, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(257, 836, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(258, 837, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(259, 838, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(260, 839, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(261, 840, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(262, 841, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(263, 842, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(264, 843, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(265, 844, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(266, 845, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(267, 846, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(268, 847, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(269, 848, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(270, 849, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(271, 850, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(272, 851, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(273, 852, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(274, 853, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(275, 854, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(276, 855, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(277, 856, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(278, 857, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(279, 858, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(280, 859, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(281, 860, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(282, 861, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(283, 862, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(284, 863, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(285, 864, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(286, 865, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(287, 866, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(288, 867, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(289, 868, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(290, 869, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(291, 870, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(292, 871, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(293, 872, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(294, 873, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(295, 874, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(296, 875, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(297, 876, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(298, 877, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(299, 878, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(300, 879, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(301, 880, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(302, 881, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(303, 882, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(304, 883, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(305, 884, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(306, 885, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(307, 886, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(308, 887, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(309, 888, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(310, 889, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(311, 890, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(312, 891, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(313, 892, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(314, 893, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(315, 894, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(316, 895, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(317, 896, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(318, 897, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(319, 898, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(320, 899, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:38:06', '2021-04-03 22:38:06', NULL),
	(321, 900, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(322, 901, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(323, 902, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(324, 903, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(325, 904, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(326, 905, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(327, 906, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(328, 907, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(329, 908, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(330, 909, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(331, 910, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(332, 911, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(333, 912, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(334, 913, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(335, 914, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(336, 915, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(337, 916, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(338, 917, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(339, 918, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(340, 919, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(341, 920, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(342, 921, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(343, 922, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(344, 923, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(345, 924, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(346, 925, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(347, 926, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(348, 927, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(349, 928, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(350, 929, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(351, 930, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(352, 931, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(353, 932, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(354, 933, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(355, 934, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(356, 935, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(357, 936, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(358, 937, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(359, 938, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(360, 939, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(361, 940, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:56', '2021-04-03 22:41:56', NULL),
	(362, 941, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(363, 942, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(364, 943, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(365, 944, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(366, 945, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(367, 946, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(368, 947, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(369, 948, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(370, 949, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(371, 950, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(372, 951, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(373, 952, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(374, 953, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(375, 954, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(376, 955, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(377, 956, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(378, 957, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(379, 958, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(380, 959, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(381, 960, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(382, 961, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(383, 962, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(384, 963, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(385, 964, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(386, 965, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(387, 966, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(388, 967, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(389, 968, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(390, 969, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(391, 970, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(392, 971, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(393, 972, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(394, 973, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(395, 974, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(396, 975, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(397, 976, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(398, 977, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(399, 978, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(400, 979, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(401, 980, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(402, 981, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(403, 982, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(404, 983, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(405, 984, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(406, 985, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(407, 986, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(408, 987, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(409, 988, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(410, 989, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(411, 990, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(412, 991, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(413, 992, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(414, 993, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(415, 994, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(416, 995, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(417, 996, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(418, 997, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(419, 998, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(420, 999, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:41:57', '2021-04-03 22:41:57', NULL),
	(421, 900, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(422, 901, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(423, 902, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(424, 903, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(425, 904, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(426, 905, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(427, 906, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(428, 907, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(429, 908, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(430, 909, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(431, 910, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(432, 911, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(433, 912, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(434, 913, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(435, 914, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(436, 915, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(437, 916, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(438, 917, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(439, 918, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(440, 919, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(441, 920, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(442, 921, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(443, 922, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(444, 923, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(445, 924, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(446, 925, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(447, 926, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(448, 927, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(449, 928, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(450, 929, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(451, 930, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(452, 931, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(453, 932, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(454, 933, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(455, 934, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(456, 935, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(457, 936, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(458, 937, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(459, 938, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(460, 939, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(461, 940, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(462, 941, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(463, 942, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(464, 943, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(465, 944, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(466, 945, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(467, 946, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(468, 947, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(469, 948, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(470, 949, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(471, 950, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(472, 951, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(473, 952, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(474, 953, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(475, 954, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(476, 955, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(477, 956, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(478, 957, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(479, 958, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(480, 959, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(481, 960, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(482, 961, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(483, 962, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(484, 963, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(485, 964, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(486, 965, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(487, 966, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(488, 967, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(489, 968, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(490, 969, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(491, 970, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(492, 971, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(493, 972, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(494, 973, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(495, 974, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(496, 975, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(497, 976, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(498, 977, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(499, 978, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(500, 979, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(501, 980, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(502, 981, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(503, 982, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(504, 983, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(505, 984, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(506, 985, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(507, 986, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(508, 987, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(509, 988, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(510, 989, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(511, 990, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(512, 991, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(513, 992, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(514, 993, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(515, 994, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(516, 995, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(517, 996, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(518, 997, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(519, 998, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(520, 999, NULL, 'asdvvd', '', 1, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-03 22:42:36', '2021-04-03 22:42:36', NULL),
	(521, 1, NULL, 'asdvvd', '', 0, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-20 17:20:02', '2021-04-20 17:20:02', NULL),
	(522, 2, NULL, 'asdvvd', '', 0, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-20 17:20:02', '2021-04-20 17:20:02', NULL),
	(523, 3, NULL, 'asdvvd', '', 0, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-20 17:20:02', '2021-04-20 17:20:02', NULL),
	(524, 4, NULL, 'asdvvd', '', 0, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-20 17:20:02', '2021-04-20 17:20:02', NULL),
	(525, 5, NULL, 'asdvvd', '', 0, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-20 17:20:02', '2021-04-20 17:20:02', NULL),
	(526, 6, NULL, 'asdvvd', '', 0, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-20 17:20:02', '2021-04-20 17:20:02', NULL),
	(527, 7, NULL, 'asdvvd', '', 0, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-20 17:20:02', '2021-04-20 17:20:02', NULL),
	(528, 8, NULL, 'asdvvd', '', 0, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-20 17:20:02', '2021-04-20 17:20:02', NULL),
	(529, 9, NULL, 'asdvvd', '', 0, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-20 17:20:02', '2021-04-20 17:20:02', NULL),
	(530, 10, NULL, 'asdvvd', '', 0, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-20 17:20:02', '2021-04-20 17:20:02', NULL),
	(531, 11, NULL, 'asdvvd', '', 0, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-20 17:20:02', '2021-04-20 17:20:02', NULL),
	(532, 12, NULL, 'asdvvd', '', 0, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-20 17:20:02', '2021-04-20 17:20:02', NULL),
	(533, 13, NULL, 'asdvvd', '', 0, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-20 17:20:02', '2021-04-20 17:20:02', NULL),
	(534, 14, NULL, 'asdvvd', '', 0, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-20 17:20:02', '2021-04-20 17:20:02', NULL),
	(535, 15, NULL, 'asdvvd', '', 0, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-20 17:20:02', '2021-04-20 17:20:02', NULL),
	(536, 16, NULL, 'asdvvd', '', 0, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-20 17:20:02', '2021-04-20 17:20:02', NULL),
	(537, 17, NULL, 'asdvvd', '', 0, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-20 17:20:02', '2021-04-20 17:20:02', NULL),
	(538, 18, NULL, 'asdvvd', '', 0, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-20 17:20:02', '2021-04-20 17:20:02', NULL),
	(539, 19, NULL, 'asdvvd', '', 0, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-20 17:20:02', '2021-04-20 17:20:02', NULL),
	(540, 20, NULL, 'asdvvd', '', 0, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-20 17:20:02', '2021-04-20 17:20:02', NULL),
	(541, 21, NULL, 'asdvvd', '', 0, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-20 17:20:02', '2021-04-20 17:20:02', NULL),
	(542, 22, NULL, 'asdvvd', '', 0, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-20 17:20:02', '2021-04-20 17:20:02', NULL),
	(543, 23, NULL, 'asdvvd', '', 0, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-20 17:20:02', '2021-04-20 17:20:02', NULL),
	(544, 24, NULL, 'asdvvd', '', 0, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-20 17:20:02', '2021-04-20 17:20:02', NULL),
	(545, 25, NULL, 'asdvvd', '', 0, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-20 17:20:02', '2021-04-20 17:20:02', NULL),
	(546, 26, NULL, 'asdvvd', '', 0, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-20 17:20:02', '2021-04-20 17:20:02', NULL),
	(547, 27, NULL, 'asdvvd', '', 0, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-20 17:20:02', '2021-04-20 17:20:02', NULL),
	(548, 28, NULL, 'asdvvd', '', 0, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-20 17:20:02', '2021-04-20 17:20:02', NULL),
	(549, 29, NULL, 'asdvvd', '', 0, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-20 17:20:02', '2021-04-20 17:20:02', NULL),
	(550, 30, NULL, 'asdvvd', '', 0, NULL, NULL, 'new', 1, 0, NULL, NULL, '2021-04-20 17:20:02', '2021-04-20 17:20:02', NULL),
	(551, 1000, NULL, 'gggg', 'AA', 0, NULL, NULL, 'new', 0, 0, NULL, NULL, '2021-04-21 07:37:52', '2021-04-21 07:41:38', '2021-04-21 07:41:38'),
	(552, 1001, NULL, 'gggg', 'AA', 0, NULL, NULL, 'new', 0, 0, NULL, NULL, '2021-04-21 07:37:52', '2021-04-21 07:41:38', '2021-04-21 07:41:38'),
	(553, 1000, NULL, 'ggg31', 'AA', 0, NULL, NULL, 'new', 0, 0, NULL, NULL, '2021-04-21 07:41:38', '2021-04-21 07:44:49', '2021-04-21 07:44:49'),
	(554, 1001, NULL, 'ggg31', 'AA', 0, NULL, NULL, 'new', 0, 0, NULL, NULL, '2021-04-21 07:41:38', '2021-04-21 07:44:49', '2021-04-21 07:44:49'),
	(555, 1000, NULL, 'gdfff', 'AA', 0, NULL, NULL, 'new', 0, 3, NULL, NULL, '2021-04-21 07:44:49', '2021-04-21 07:45:08', '2021-04-21 07:45:08'),
	(556, 1001, NULL, 'gdfff', 'AA', 0, NULL, NULL, 'new', 0, 0, NULL, NULL, '2021-04-21 07:44:49', '2021-04-21 07:45:08', '2021-04-21 07:45:08'),
	(557, 1000, NULL, 'gdfff', 'AA', 0, NULL, NULL, 'new', 0, 3, NULL, NULL, '2021-04-21 07:45:08', '2021-04-21 07:46:19', '2021-04-21 07:46:19'),
	(558, 1001, NULL, 'gdfff', 'AA', 0, NULL, NULL, 'new', 0, 3, NULL, NULL, '2021-04-21 07:45:08', '2021-04-21 07:46:19', '2021-04-21 07:46:19'),
	(559, 1000, NULL, 'gdfff', 'AA', 0, NULL, NULL, 'retransferred', 1, 4, NULL, NULL, '2021-04-21 07:46:19', '2021-04-22 04:11:14', NULL),
	(560, 1001, NULL, 'gdfff', 'AA', 0, NULL, NULL, 'retransferred', 1, 4, NULL, NULL, '2021-04-21 07:46:19', '2021-04-22 04:11:14', NULL),
	(561, 1002, NULL, 'gdfff', 'AA', 0, NULL, NULL, 'new', 1, 9, NULL, NULL, '2021-04-21 07:46:19', '2021-04-27 06:56:46', NULL),
	(562, 1003, NULL, 'gdfff', 'AA', 0, NULL, NULL, 'new', 1, 9, NULL, NULL, '2021-04-21 07:46:19', '2021-04-27 06:56:46', NULL),
	(563, 1004, NULL, 'gdfff', 'AA', 0, NULL, NULL, 'new', 0, 3, NULL, NULL, '2021-04-21 07:46:19', '2021-04-21 07:46:19', NULL),
	(564, 1005, NULL, 'gdfff', 'AA', 0, NULL, NULL, 'new', 0, 3, NULL, NULL, '2021-04-21 07:46:19', '2021-04-21 07:46:19', NULL),
	(565, 1000, NULL, 'dfgbdfgbdfb', 'AA', 0, NULL, NULL, 'new', 0, 3, NULL, NULL, '2021-04-22 03:30:26', '2021-04-22 03:30:26', NULL),
	(566, 1001, NULL, 'dfgbdfgbdfb', 'AA', 0, NULL, NULL, 'new', 0, 3, NULL, NULL, '2021-04-22 03:30:26', '2021-04-22 03:30:26', NULL),
	(567, 2001, NULL, '2001GG42', 'BB', 0, 'a5', '4000', 'pending_transfer', 1, 9, NULL, NULL, '2021-04-27 07:09:53', '2021-04-27 07:46:57', NULL),
	(568, 2002, NULL, '2001GG42', 'BB', 0, 'a5', '4000', 'new', 0, 3, NULL, NULL, '2021-04-27 07:09:53', '2021-04-27 07:09:53', NULL);
/*!40000 ALTER TABLE `policies` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.policies_policy_retransfer
CREATE TABLE IF NOT EXISTS `policies_policy_retransfer` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `policy_retransfer_id` int(11) unsigned NOT NULL,
  `policy_id` int(11) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table ddgi_test_2.policies_policy_retransfer: ~2 rows (approximately)
DELETE FROM `policies_policy_retransfer`;
/*!40000 ALTER TABLE `policies_policy_retransfer` DISABLE KEYS */;
INSERT INTO `policies_policy_retransfer` (`id`, `policy_retransfer_id`, `policy_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(17, 3, 1, NULL, NULL, NULL),
	(18, 3, 2, NULL, NULL, NULL);
/*!40000 ALTER TABLE `policies_policy_retransfer` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.policies_policy_transfer
CREATE TABLE IF NOT EXISTS `policies_policy_transfer` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `policy_transfer_id` int(11) unsigned NOT NULL,
  `policy_id` int(11) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table ddgi_test_2.policies_policy_transfer: ~6 rows (approximately)
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

-- Dumping structure for table ddgi_test_2.policy_beneficiaries
CREATE TABLE IF NOT EXISTS `policy_beneficiaries` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `FIO` varchar(250) NOT NULL,
  `address` varchar(150) NOT NULL,
  `email_beneficiary` text,
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
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='??????????????????????????????????????';

-- Dumping data for table ddgi_test_2.policy_beneficiaries: ~73 rows (approximately)
DELETE FROM `policy_beneficiaries`;
/*!40000 ALTER TABLE `policy_beneficiaries` DISABLE KEYS */;
INSERT INTO `policy_beneficiaries` (`id`, `FIO`, `address`, `email_beneficiary`, `phone_number`, `checking_account`, `inn`, `mfo`, `okonx`, `bank_id`, `updated_at`, `created_at`, `deleted_at`, `seria_passport`, `nomer_passport`, `oked`) VALUES
	(1, 'gbebfgb', 'dfgbfdb', NULL, 'fdgbdfgb', 'gbdfgbdf', 'gbdfgb', 'dfgbdf', 'gbdfbg', 1, '2021-01-10 21:00:00', '2021-01-10 21:00:00', NULL, NULL, NULL, NULL),
	(2, 'gbebfgb', 'dfgbfdb', NULL, 'fdgbdfgb', 'gbdfgbdf', 'gbdfgb', 'dfgbdf', 'gbdfbg', 1, '2021-01-10 21:00:00', '2021-01-10 21:00:00', NULL, NULL, NULL, NULL),
	(3, '?????? ??????????????????????????????????????', '???? ?????????? ??????????????????????????????????????', NULL, '??????????????', '?????????????????? ????????', '??????', '??????', '??????????', 1, '2021-01-10 21:00:00', '2021-01-10 21:00:00', NULL, NULL, NULL, NULL),
	(4, '?????? ??????????????????????????????????????', '???? ?????????? ??????????????????????????????????????', NULL, '??????????????', '?????????????????? ????????', '??????', '??????', '??????????', 1, '2021-01-10 21:00:00', '2021-01-10 21:00:00', NULL, NULL, NULL, NULL),
	(5, '?????? ??????????????????????????????????????', '???? ?????????? ??????????????????????????????????????', NULL, '??????????????', '?????????????????? ????????', '??????', '??????', '??????????', 1, '2021-01-10 21:00:00', '2021-01-10 21:00:00', NULL, NULL, NULL, NULL),
	(6, '?????? ??????????????????????????????????????', '???? ?????????? ??????????????????????????????????????', NULL, '??????????????', '?????????????????? ????????', '??????', '??????', '??????????', 1, '2021-01-10 21:00:00', '2021-01-10 21:00:00', NULL, NULL, NULL, NULL),
	(7, '?????? ??????????????????????????????????????', '???? ?????????? ??????????????????????????????????????', NULL, '??????????????', '?????????????????? ????????', '??????', '??????', '??????????', 1, '2021-01-10 21:00:00', '2021-01-10 21:00:00', NULL, NULL, NULL, NULL),
	(8, '?????? ??????????????????????????????????????', 'PO Box F', NULL, '5555551234', '?????????????????? ????????', '??????', '??????', '??????????', 1, '2021-02-14 21:00:00', '2021-02-14 21:00:00', NULL, NULL, NULL, NULL),
	(9, 'sdfvsdfvdsfv', 'svdfvsdf', NULL, 'vsdfvsdf', 'vsdfvsdf', 'vsdfvsdf', 'vsdfvsdf', 'sdfvsdfv', 2, '2021-03-02 23:46:16', '2021-03-02 23:46:16', NULL, NULL, NULL, NULL),
	(10, 'sdfvsdfvdsfv', 'svdfvsdf', NULL, 'vsdfvsdf', 'vsdfvsdf', 'vsdfvsdf', 'vsdfvsdf', 'sdfvsdfv', 2, '2021-03-02 23:48:37', '2021-03-02 23:48:37', NULL, NULL, NULL, NULL),
	(11, 'sdfvsdfvdsfv', 'svdfvsdf', NULL, 'vsdfvsdf', 'vsdfvsdf', 'vsdfvsdf', 'vsdfvsdf', 'sdfvsdfv', 2, '2021-03-02 23:52:20', '2021-03-02 23:52:20', NULL, NULL, NULL, NULL),
	(12, 'sdfvsdfvdsfv', 'svdfvsdf', NULL, 'vsdfvsdf', 'vsdfvsdf', 'vsdfvsdf', 'vsdfvsdf', 'sdfvsdfv', 2, '2021-03-02 23:53:44', '2021-03-02 23:53:44', NULL, NULL, NULL, NULL),
	(13, 'sdfvsdfvdsfv', 'svdfvsdf', NULL, 'vsdfvsdf', 'vsdfvsdf', 'vsdfvsdf', 'vsdfvsdf', 'sdfvsdfv', 2, '2021-03-02 23:55:29', '2021-03-02 23:55:29', NULL, NULL, NULL, NULL),
	(14, 'sdfgsd', 'gsdgdsg', NULL, 'gsdgsdg', 'sdgsdf', 'gsdgsdg', 'dsfgsdg', 'sdfgsdfg', 2, '2021-03-02 23:58:28', '2021-03-02 23:58:28', NULL, NULL, NULL, NULL),
	(15, 'sdfgsd', 'gsdgdsg', NULL, 'gsdgsdg', 'sdgsdf', 'gsdgsdg', 'dsfgsdg', 'sdfgsdfg', 2, '2021-03-02 23:59:46', '2021-03-02 23:59:46', NULL, NULL, NULL, NULL),
	(16, 'dfvdsfvsdf', 'vsdfvdsfv', NULL, 'dsfvsdfv', 'sdfvsdfvsd', 'sdfvsdfv', 'sdfvdsfv', 'dsfvsdfv', 2, '2021-03-03 02:13:10', '2021-03-03 02:13:10', NULL, NULL, NULL, NULL),
	(17, 'dfbgdfgbdf', 'bgdfgb', NULL, 'dfgbdg', 'bdfgb', 'dfgbdf', 'gbdfgb', 'dfgbdfgbdfgb', 2, '2021-03-03 03:13:03', '2021-03-03 03:13:03', NULL, NULL, NULL, NULL),
	(18, '?????? ??????????????????????????????????????', 'bgdfgb', NULL, 'dfgbdg', 'bdfgb', 'dfgbdf', 'gbdfgb', 'dfgbdfgbdfgb', 2, '2021-03-03 03:16:20', '2021-03-03 03:13:29', NULL, NULL, NULL, NULL),
	(19, 'sdfvsdfvds', 'vfsdfvdsfv', NULL, 'vsdfvds', 'fvsdvfsd', 'sdfvsdfvsdfv', 'sdvsdfvsdfv', 'sdfvsdfvsdvf', 2, '2021-03-03 05:45:31', '2021-03-03 05:45:31', NULL, NULL, NULL, NULL),
	(20, 'sdfvsdfvdsfv', 'PO Box F', NULL, '5555551234', 'vsdfvsdf', 'vsdfvsdf', 'vsdfvsdf', 'sdfvsdfv', 2, '2021-03-06 06:14:42', '2021-03-06 06:14:42', NULL, NULL, NULL, NULL),
	(21, 'sdfvsdfvdsfv', 'PO Box F', NULL, '5555551234', 'vsdfvsdf', '23', '234', NULL, 2, '2021-03-23 12:20:25', '2021-03-23 12:20:25', NULL, NULL, NULL, '234234'),
	(22, 'ssdvfsdfv', 'sdfvsdfv', NULL, '2342424', 'dsfvdsfv', '234234', 'sdvfdsvf', NULL, 2, '2021-04-09 14:10:55', '2021-04-09 14:08:18', NULL, NULL, NULL, 'ewrgwegr'),
	(23, '?????? ?????????????????????????????????????? 2', '?????????? ?????????????????????????????????????? 2', NULL, '?????????????? 2', '?????????????????? ???????? 2', '2342424', '?????? 2', NULL, 2, '2021-04-09 14:14:21', '2021-04-09 14:14:21', NULL, '?????????? ???????????????? 2', '?????????? ???????????????? 2', 'dsdvsdv232323'),
	(24, '?????? ?????????????????????????????????????? 2', '?????????? ?????????????????????????????????????? 2', NULL, '?????????????? 2', '?????????????????? ???????? 2', '343434', '?????? 2', NULL, 2, '2021-04-09 14:15:12', '2021-04-09 14:15:12', NULL, '?????????? ???????????????? 2', '?????????? ???????????????? 2', 'dsdvsdv232323'),
	(25, '?????? ?????????????????????????????????????? 2', '?????????? ?????????????????????????????????????? 2', NULL, '?????????????? 2', '?????????????????? ???????? 2', '343434', '?????? 2', NULL, 2, '2021-04-09 14:34:44', '2021-04-09 14:19:25', NULL, '?????????? ???????????????? 2', '?????????? ???????????????? 2', '????????'),
	(26, '?????? ??????????????????????????????????????', '???? ?????????? ??????????????????????????????????????', NULL, '555555123443', '?????????????????? ???????? 2', 'dfgbdf', 'vsdfvsdf', 'egverv', 2, '2021-04-09 16:43:08', '2021-04-09 16:43:08', NULL, NULL, NULL, '???????? 3'),
	(27, '?????? ??????????????????????????????????????', '???? ?????????? ??????????????????????????????????????', NULL, '555555123443', '?????????????????? ???????? 2', 'dfgbdf', 'vsdfvsdf', 'egverv', 2, '2021-04-09 16:46:58', '2021-04-09 16:43:47', NULL, NULL, NULL, '????????'),
	(28, '?????? ??????????????????????????????????????', '???? ?????????? ??????????????????????????????????????', NULL, '5555551234', '?????????????????? ???????? 2', 'vsdfvsdf', 'vsdfvsdf', 'egverv', 2, '2021-04-09 17:00:08', '2021-04-09 17:00:08', NULL, NULL, NULL, NULL),
	(29, '?????? ??????????????????????????????????????', '???? ?????????? ??????????????????????????????????????', NULL, '5555551234', '?????????????????? ???????? 2', 'vsdfvsdf', 'vsdfvsdf', 'egverv', 2, '2021-04-09 17:00:42', '2021-04-09 17:00:42', NULL, NULL, NULL, NULL),
	(30, '?????? ??????????????????????????????????????', 'PO Box F', NULL, '5555551234', '?????????????????? ???????? 2', '234234234234', 'vsdfvsdf', NULL, 2, '2021-04-10 09:40:00', '2021-04-10 09:38:52', NULL, '?????????? ???????????????? 2', '?????????? ???????????????? 2', 'dsfvsdfv'),
	(31, '?????? ??????????????????????????????????????', 'PO Box F', NULL, '5555551234', '?????????????????? ???????? 2', '353535', 'vsdfvsdf', NULL, 2, '2021-04-10 09:52:29', '2021-04-10 09:51:20', NULL, NULL, NULL, '????????'),
	(32, '?????? ??????????????????????????????????????', 'PO Box F', NULL, '5555551234', 'sdfvsdfvsd', 'vsdfvdfsvsd', 'vsdfvsdf', 'egverv', 2, '2021-04-10 09:56:44', '2021-04-10 09:56:44', NULL, NULL, NULL, 'dsdvsdv232323'),
	(33, '?????? ??????????????????????????????????????', 'PO Box F', NULL, '5555551234', 'sdfvsdfvsd', 'vsdfvdfsvsd', 'vsdfvsdf', 'egverv', 2, '2021-04-10 09:58:43', '2021-04-10 09:58:02', NULL, NULL, NULL, '????????'),
	(34, '?????? ??????????????????????????????????????', 'PO Box F', NULL, '5555551234', '?????????????????? ???????? 2', 'vsdfvsdf', 'vsdfvsdf', 'egverv', 2, '2021-04-10 10:03:26', '2021-04-10 10:03:26', NULL, NULL, NULL, NULL),
	(35, '?????? ??????????????????????????????????????', 'PO Box F', NULL, '5555551234', '?????????????????? ???????? 2', 'vsdfvsdf', 'vsdfvsdf', 'egverv', 2, '2021-04-10 10:04:16', '2021-04-10 10:04:16', NULL, NULL, NULL, NULL),
	(36, '?????? ??????????????????????????????????????', 'PO Box F', NULL, '5555551234', '?????????????????? ???????? 2', 'vsdfvsdf', 'vsdfvsdf', 'egverv', 2, '2021-04-10 10:06:05', '2021-04-10 10:06:05', NULL, NULL, NULL, NULL),
	(37, '?????? ??????????????????????????????????????', 'PO Box F', NULL, '5555551234', '?????????????????? ???????? 2', 'vsdfvsdf', 'vsdfvsdf', 'egverv', 2, '2021-04-10 10:06:20', '2021-04-10 10:06:20', NULL, NULL, NULL, NULL),
	(38, '?????? ??????????????????????????????????????', '???? ?????????? ??????????????????????????????????????', NULL, '5555551234', '?????????????????? ????????', '??????', '??????', '??????????', 2, '2021-04-11 13:40:04', '2021-04-11 13:40:04', NULL, NULL, NULL, '????????'),
	(39, '?????? ??????????????????????????????????????', 'PO Box F', NULL, '5555551234', '?????????????????? ???????? 2', 'vsdfvsdf', 'gbdfgb', '??????????', 2, '2021-04-11 13:54:31', '2021-04-11 13:54:31', NULL, NULL, NULL, NULL),
	(40, '?????? ??????????????????????????????????????', 'PO Box F', NULL, '5555551234', '?????????????????? ???????? 2', 'vsdfvsdf', 'gbdfgb', '??????????', 2, '2021-04-11 14:01:38', '2021-04-11 14:01:38', NULL, NULL, NULL, NULL),
	(41, '?????? ??????????????????????????????????????', 'PO Box F', NULL, '5555551234', '?????????????????? ???????? 2', 'vsdfvsdf', 'gbdfgb', '??????????', 2, '2021-04-11 14:02:27', '2021-04-11 14:02:27', NULL, NULL, NULL, NULL),
	(42, '?????? ??????????????????????????????????????', 'PO Box F', NULL, '5555551234', '?????????????????? ???????? 2', 'vsdfvsdf', 'vsdfvsdf', 'egverv', 2, '2021-04-18 08:42:03', '2021-04-18 08:36:53', NULL, NULL, NULL, '????????'),
	(43, '?????? ??????????????????????????????????????', 'PO Box F', NULL, '5555551234', '?????????????????? ???????? 2', 'vsdfvsdf', 'vsdfvsdf', 'egverv', 2, '2021-04-18 08:48:45', '2021-04-18 08:48:45', NULL, NULL, NULL, NULL),
	(44, '?????? ??????????????????????????????????????', 'PO Box F', NULL, '5555551234', '?????????????????? ???????? 2', 'vsdfvsdf', 'vsdfvsdf', 'egverv', 2, '2021-04-18 08:52:41', '2021-04-18 08:52:41', NULL, NULL, NULL, NULL),
	(45, '?????? ??????????????????????????????????????', 'PO Box F', NULL, '5555551234', '?????????????????? ???????? 2', 'vsdfvsdf', 'vsdfvsdf', 'egverv', 2, '2021-04-18 08:53:23', '2021-04-18 08:53:23', NULL, NULL, NULL, NULL),
	(46, '?????? ??????????????????????????????????????', 'PO Box F', NULL, '5555551234', '?????????????????? ???????? 2', 'vsdfvsdf', 'vsdfvsdf', 'egverv', 2, '2021-04-18 08:53:40', '2021-04-18 08:53:40', NULL, NULL, NULL, NULL),
	(47, '?????? ??????????????????????????????????????', 'PO Box F', NULL, '5555551234', '?????????????????? ???????? 2', 'vsdfvsdf', 'vsdfvsdf', 'egverv', 2, '2021-04-18 08:54:52', '2021-04-18 08:54:52', NULL, NULL, NULL, NULL),
	(48, '?????? ??????????????????????????????????????', 'PO Box F', NULL, '5555551234', '?????????????????? ???????? 2', 'vsdfvsdf', 'vsdfvsdf', 'egverv', 2, '2021-04-18 08:56:32', '2021-04-18 08:56:32', NULL, NULL, NULL, NULL),
	(49, '????????????????????????', '?????????? ????????????????????????', NULL, '5565656565', '21326', '655665', '666655', '??????????', 1, '2021-05-07 10:32:49', '2021-05-07 10:32:49', NULL, 'xc x', '656565', '????????'),
	(50, '????????????????????????', '?????????? ????????????????????????', NULL, '5565656565', '21326', '655665', '666655', '??????????', 1, '2021-05-07 10:33:36', '2021-05-07 10:33:36', NULL, 'xc x', '656565', '????????'),
	(51, '????????????????????????', '?????????? ????????????????????????', NULL, '5565656565', '21326', '655665', '666655', '??????????', 1, '2021-05-07 10:34:41', '2021-05-07 10:34:41', NULL, 'xc x', '656565', '????????'),
	(52, '????????????????????????', '?????????? ????????????????????????', NULL, '5565656565', '21326', '655665', '666655', '??????????', 1, '2021-05-07 10:36:54', '2021-05-07 10:36:54', NULL, 'xc x', '656565', '????????'),
	(53, '????????????????????????', '?????????? ????????????????????????', NULL, '5565656565', '21326', '655665', '666655', '??????????', 1, '2021-05-07 10:37:22', '2021-05-07 10:37:22', NULL, 'xc x', '656565', '????????'),
	(54, '????????????????????????', '?????????? ????????????????????????', NULL, '5565656565', '21326', '655665', '666655', '??????????', 1, '2021-05-07 10:44:37', '2021-05-07 10:44:37', NULL, 'xc x', '656565', '????????'),
	(55, '????????????????????????', '?????????? ????????????????????????', NULL, '5565656565', '21326', '655665', '666655', '??????????', 1, '2021-05-07 10:45:34', '2021-05-07 10:45:34', NULL, 'xc x', '656565', '????????'),
	(56, '????????????????????????', '?????????? ????????????????????????', NULL, '5565656565', '21326', '655665', '666655', '??????????', 1, '2021-05-07 10:46:42', '2021-05-07 10:46:42', NULL, 'xc x', '656565', '????????'),
	(57, '????????????????????????', '?????????? ????????????????????????', NULL, '5565656565', '21326', '655665', '666655', '??????????', 1, '2021-05-07 10:46:59', '2021-05-07 10:46:59', NULL, 'xc x', '656565', '????????'),
	(58, '????????????????????????', '?????????? ????????????????????????', NULL, '5565656565', '21326', '655665', '666655', '??????????', 1, '2021-05-07 10:47:25', '2021-05-07 10:47:25', NULL, 'xc x', '656565', '????????'),
	(59, '????????????????????????', '?????????? ????????????????????????', NULL, '5565656565', '21326', '655665', '??????', '??????????', 1, '2021-05-07 10:51:25', '2021-05-07 10:51:25', NULL, 'xc x', '656565', '????????'),
	(60, '????????????????????????dsad', '00000000000000000000000', NULL, '5565656565', '21326', '655665', '??????', '??????????', 1, '2021-05-07 11:01:21', '2021-05-07 11:01:21', NULL, 'jack', '656565', '????????'),
	(61, '????????????????????????', '?????????? ????????????????????????', NULL, '5565656565', '21326', '655665', '??????', '??????????', 1, '2021-05-07 15:37:34', '2021-05-07 15:37:34', NULL, 'xc x', '656565', '????????'),
	(62, '????????????????????????', '?????????? ????????????????????????', NULL, '5565656565', '21326', '655665', '666655', '??????????', 1, '2021-05-08 06:53:47', '2021-05-08 06:53:47', NULL, 'xc x', '656565', '????????'),
	(64, '????????????????????????', '?????????? ????????????????????????', NULL, '5565656565', '21326', '655665', '666655', '??????????', 1, '2021-05-09 16:39:14', '2021-05-09 16:39:14', NULL, 'xc x', '656565', '????????'),
	(66, '????????????????????????', '???? ?????????? ????????????????', NULL, '5565656565', '254524', '655665', '666655', NULL, 1, '2021-05-16 17:24:10', '2021-05-16 17:24:10', NULL, NULL, NULL, '????????'),
	(67, '????????????????????????', '???? ?????????? ????????????????', NULL, '5565656565', '254524', '655665', '666655', NULL, 1, '2021-05-16 17:26:50', '2021-05-16 17:26:50', NULL, NULL, NULL, '????????'),
	(68, '????????????????????????', '?????????? ????????????????????????', NULL, '5565656565', '254524', '655665', '4522', NULL, 1, '2021-05-16 17:30:01', '2021-05-16 17:30:01', NULL, NULL, NULL, '????????'),
	(69, '????????????????????????', '?????????? ????????????????????????', NULL, '5565656565', '254524', '655665', '4522', NULL, 1, '2021-05-16 17:30:26', '2021-05-16 17:30:26', NULL, NULL, NULL, '????????'),
	(70, '????????????????????????', '?????????? ????????????????????????', NULL, '5565656565', '254524', '655665', '4522', NULL, 1, '2021-05-16 17:30:56', '2021-05-16 17:30:56', NULL, NULL, NULL, '????????'),
	(71, ';;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;', '???? ?????????? ????????????????', NULL, '5565656565', '254524', '655665', '5742542', NULL, 1, '2021-05-16 19:11:59', '2021-05-16 17:32:26', NULL, NULL, NULL, '????????'),
	(72, '????????????????????????', '?????????? ????????????????????????', NULL, '5565656565', '254524', '486565', '5354', NULL, 1, '2021-05-17 17:00:57', '2021-05-17 17:00:57', NULL, NULL, NULL, '????????'),
	(73, '????????????????????????dsad', '?????????? ????????????????????????', NULL, '5565656565', '21326', '655665', '666655', '??????????', 1, '2021-05-17 17:19:46', '2021-05-17 17:19:46', NULL, 'xc x', '656565', '????????'),
	(74, '????????????????????????dsad', '???? ?????????? ????????????????', NULL, '5565656565', '21326889', '655665', '666655', '??????????', 1, '2021-05-17 17:21:18', '2021-05-17 17:21:18', NULL, NULL, NULL, '????????'),
	(75, '????????????????????????', '?????????? ????????????????????????', NULL, '5565656565', '21326', '655665', '666655', '??????????', 1, '2021-05-18 11:32:47', '2021-05-18 11:32:47', NULL, 'xc x', '656565', '????????');
/*!40000 ALTER TABLE `policy_beneficiaries` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.policy_flows
CREATE TABLE IF NOT EXISTS `policy_flows` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `act_number` varchar(50) DEFAULT NULL,
  `act_date` date DEFAULT NULL,
  `a_reg` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `to_user_id` int(11) DEFAULT NULL,
  `from_user_id` int(11) DEFAULT NULL,
  `policy_from` int(11) DEFAULT NULL,
  `policy_to` int(11) DEFAULT NULL,
  `polis_name` varchar(100) DEFAULT NULL,
  `price_per_policy` varchar(100) DEFAULT NULL,
  `polis_given_by_user_id` int(11) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table ddgi_test_2.policy_flows: ~9 rows (approximately)
DELETE FROM `policy_flows`;
/*!40000 ALTER TABLE `policy_flows` DISABLE KEYS */;
INSERT INTO `policy_flows` (`id`, `act_number`, `act_date`, `a_reg`, `status`, `branch_id`, `to_user_id`, `from_user_id`, `policy_from`, `policy_to`, `polis_name`, `price_per_policy`, `polis_given_by_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(6, 'asdvvd', '2021-04-15', 'on', 'registered', NULL, 3, NULL, 1, 30, 'AA', NULL, NULL, '2021-04-19 22:00:00', '2021-04-19 22:00:00', NULL),
	(7, 'asdvvd', '2021-04-01', 'on', 'registered', NULL, 3, NULL, 100, 101, 'AA', NULL, NULL, '2021-04-19 22:00:00', '2021-04-19 22:00:00', NULL),
	(8, 'asdvvd', '2021-04-15', 'a4', 'registered', NULL, 3, NULL, 141, 142, 'AA', '5444', NULL, '2021-04-19 22:00:00', '2021-04-19 22:00:00', NULL),
	(9, 'gdfff', '2021-04-16', 'a5', 'registered', NULL, 3, NULL, 1000, 1005, 'AA', '4000', NULL, '2021-04-20 22:00:00', '2021-04-20 22:00:00', NULL),
	(11, 'vsdvfdfsv', '2021-04-21', 'a4', 'transferred', NULL, 3, NULL, 1000, 1001, 'AA', '4000', NULL, '2021-04-21 22:00:00', '2021-04-21 22:00:00', NULL),
	(12, 'asdvvd', '2021-04-16', 'a4', 'rejected_transfer', 1, 3, 9, 1002, 1003, 'AA', '4000', NULL, '2021-04-21 22:00:00', '2021-04-27 06:56:46', NULL),
	(13, 'asdvvd', '2021-04-22', 'a4', 'retransferred', 1, 4, 9, 1000, 1001, 'AA', '4000', NULL, '2021-04-21 22:00:00', '2021-04-21 22:00:00', NULL),
	(14, '2001GG42', '2021-04-27', 'a5', 'registered', NULL, 3, NULL, 2001, 2002, 'BB', '5000', NULL, '2021-04-27 07:09:53', '2021-04-27 07:09:53', NULL),
	(15, 'svhdfvAA', '2021-04-27', 'a5', 'pending_transfer', 1, 9, 3, 2001, 2001, 'BB', '4000', NULL, '2021-04-27 07:46:57', '2021-04-27 07:51:17', NULL);
/*!40000 ALTER TABLE `policy_flows` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.policy_flow_files
CREATE TABLE IF NOT EXISTS `policy_flow_files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `policy_flow_id` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi_test_2.policy_flow_files: ~0 rows (approximately)
DELETE FROM `policy_flow_files`;
/*!40000 ALTER TABLE `policy_flow_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `policy_flow_files` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.policy_holders
CREATE TABLE IF NOT EXISTS `policy_holders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `FIO` varchar(250) NOT NULL,
  `address` varchar(150) NOT NULL,
  `email_insurer` text,
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
  `info_personal` text,
  `passport_series` varchar(255) DEFAULT NULL,
  `passport_number` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=162 DEFAULT CHARSET=utf8 COMMENT='????????????????????????';

-- Dumping data for table ddgi_test_2.policy_holders: ~158 rows (approximately)
DELETE FROM `policy_holders`;
/*!40000 ALTER TABLE `policy_holders` DISABLE KEYS */;
INSERT INTO `policy_holders` (`id`, `FIO`, `address`, `email_insurer`, `phone_number`, `checking_account`, `inn`, `mfo`, `okonx`, `bank_id`, `updated_at`, `created_at`, `deleted_at`, `oked`, `vid_deyatelnosti`, `info_personal`, `passport_series`, `passport_number`) VALUES
	(1, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', '??????????', 4, '2021-04-18 09:05:26', '2021-01-09 21:00:00', NULL, 'werfwerf', 'sdfvdsfv', NULL, NULL, NULL),
	(2, 'dfgbdf', 'gbdfgbdf', NULL, 'gbdfgbf', 'dgbgdfb', 'dfgbdfbfdgb', 'dfgbdf', 'dfgb', 1, '2021-01-09 21:00:00', '2021-01-09 21:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 'gbebfgb', 'dfgbfdb', NULL, 'fdgbdfgb', 'gbdfgbdf', 'gbdfgb', 'dfgbdf', 'gbdfbg', 1, '2021-01-09 21:00:00', '2021-01-09 21:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
	(4, 'dfgbdf', 'gbdfgbdf', NULL, 'gbdfgbf', 'dgbgdfb', 'dfgbdfbfdgb', 'dfgbdf', 'dfgb', 1, '2021-01-09 21:00:00', '2021-01-09 21:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
	(5, 'gbebfgb', 'dfgbfdb', NULL, 'fdgbdfgb', 'gbdfgbdf', 'gbdfgb', 'dfgbdf', 'gbdfbg', 1, '2021-01-09 21:00:00', '2021-01-09 21:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
	(6, 'dfgbdf', 'gbdfgbdf', NULL, 'gbdfgbf', 'dgbgdfb', 'dfgbdfbfdgb', 'dfgbdf', 'dfgb', 1, '2021-01-10 21:00:00', '2021-01-10 21:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
	(7, 'dfgbdf', 'gbdfgbdf', NULL, 'gbdfgbf', 'dgbgdfb', 'dfgbdfbfdgb', 'dfgbdf', 'dfgb', 1, '2021-01-10 21:00:00', '2021-01-10 21:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
	(8, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '??????????????', '?????????????????? ????????', '??????', '??????', '??????????', 1, '2021-01-10 21:00:00', '2021-01-10 21:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
	(9, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '??????????????', '?????????????????? ????????', '??????', '??????', '??????????', 1, '2021-01-10 21:00:00', '2021-01-10 21:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
	(10, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '??????????????', '?????????????????? ????????', '??????', '??????', '??????????', 1, '2021-01-10 21:00:00', '2021-01-10 21:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
	(11, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '??????????????', '?????????????????? ????????', '??????', '??????', '??????????', 1, '2021-01-10 21:00:00', '2021-01-10 21:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
	(12, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '??????????????', '?????????????????? ????????', '??????', '??????', '??????????', 1, '2021-01-10 21:00:00', '2021-01-10 21:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
	(13, '?????? ????????????????????????', 'PO Box F', NULL, '5555551234', '?????????????????? ????????', '??????', '??????', '??????????', 1, '2021-02-14 21:00:00', '2021-02-14 21:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
	(14, 'sdvfvsvdf', 'sdfvsdvsdfv', NULL, 'sdfvsdvf', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', 'sdfvsdvf', 2, '2021-03-02 23:46:16', '2021-03-02 23:46:16', NULL, NULL, NULL, NULL, NULL, NULL),
	(15, 'sdvfvsvdf', 'sdfvsdvsdfv', NULL, 'sdfvsdvf', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', 'sdfvsdvf', 2, '2021-03-02 23:48:37', '2021-03-02 23:48:37', NULL, NULL, NULL, NULL, NULL, NULL),
	(16, 'sdvfvsvdf', 'sdfvsdvsdfv', NULL, 'sdfvsdvf', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', 'sdfvsdvf', 2, '2021-03-02 23:52:20', '2021-03-02 23:52:20', NULL, NULL, NULL, NULL, NULL, NULL),
	(17, 'sdvfvsvdf', 'sdfvsdvsdfv', NULL, 'sdfvsdvf', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', 'sdfvsdvf', 2, '2021-03-02 23:53:44', '2021-03-02 23:53:44', NULL, NULL, NULL, NULL, NULL, NULL),
	(18, 'sdvfvsvdf', 'sdfvsdvsdfv', NULL, 'sdfvsdvf', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', 'sdfvsdvf', 2, '2021-03-02 23:55:29', '2021-03-02 23:55:29', NULL, NULL, NULL, NULL, NULL, NULL),
	(19, 'rtgetr', 'ertgertgertgg', NULL, 'fsdfgsd', 'fgsdfgsd', 'gsdgsd', 'sdgsdg', 'gsdfgsdgf', 2, '2021-03-02 23:58:28', '2021-03-02 23:58:28', NULL, NULL, NULL, NULL, NULL, NULL),
	(20, 'rtgetr', 'ertgertgertgg', NULL, 'fsdfgsd', 'fgsdfgsd', 'gsdgsd', 'sdgsdg', 'gsdfgsdgf', 2, '2021-03-02 23:59:46', '2021-03-02 23:59:46', NULL, NULL, NULL, NULL, NULL, NULL),
	(21, 'sdfvsdvf', 'sdfvsdfvsd', NULL, 'sdfvdsfv', 'sdfvdsfv', 'fvsdfvsdfv', 'sdfvdsfv', 'sdfvsdv', 2, '2021-03-03 02:13:10', '2021-03-03 02:13:10', NULL, NULL, NULL, NULL, NULL, NULL),
	(22, 'dfgbg', 'dfgbdfgbdgb', NULL, 'dfgbdf', 'gbdfgb', 'dfgbdfgb', 'fdgbdf', 'dfgbdfgb', 2, '2021-03-03 03:13:03', '2021-03-03 03:13:03', NULL, NULL, NULL, NULL, NULL, NULL),
	(23, 'dfgbg', 'dfgbdfgbdgb', NULL, 'dfgbdf', 'gbdfgb', 'dfgbdfgb', 'fdgbdf', 'dfgbdfgb', 2, '2021-03-03 03:13:29', '2021-03-03 03:13:29', NULL, NULL, NULL, NULL, NULL, NULL),
	(24, 'vdfvsdfv', 'sdvsdvfds', NULL, 'vsdvdfv', 'sdfvsdvf', 'sdvfsdfv', 'sdvfsdfvdsf', 'sdfvsdfv', 2, '2021-03-03 05:45:31', '2021-03-03 05:45:31', NULL, NULL, NULL, NULL, NULL, NULL),
	(25, 'sdvfvsvdf', 'PO Box F', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', 'sdfvsdvf', 2, '2021-03-06 06:14:42', '2021-03-06 06:14:42', NULL, NULL, NULL, NULL, NULL, NULL),
	(26, 'sdsdfvfdsv', 'sdfvsdfv', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', 'sdfvsdvf', 2, '2021-03-07 04:05:34', '2021-03-07 04:05:34', NULL, NULL, NULL, NULL, NULL, NULL),
	(27, 'sdsdfvfdsv', 'sdfvsdfv', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', 'sdfvsdvf', 2, '2021-03-07 04:06:12', '2021-03-07 04:06:12', NULL, NULL, NULL, NULL, NULL, NULL),
	(28, 'sdsdfvfdsv', 'sdfvsdfv', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', 'sdfvsdvf', 2, '2021-03-07 04:07:13', '2021-03-07 04:07:13', NULL, NULL, NULL, NULL, NULL, NULL),
	(29, 'sdsdfvfdsv', 'sdfvsdfv', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', 'sdfvsdvf', 2, '2021-03-07 04:07:46', '2021-03-07 04:07:46', NULL, NULL, NULL, NULL, NULL, NULL),
	(30, 'sdsdfvfdsv', 'sdfvsdfv', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', 'sdfvsdvf', 2, '2021-03-07 04:08:38', '2021-03-07 04:08:38', NULL, NULL, NULL, NULL, NULL, NULL),
	(31, 'sdsdfvfdsv', 'sdfvsdfv', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', 'sdfvsdvf', 2, '2021-03-07 04:09:54', '2021-03-07 04:09:54', NULL, NULL, NULL, NULL, NULL, NULL),
	(32, 'sdsdfvfdsv', 'sdfvsdfv', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', 'sdfvsdvf', 2, '2021-03-07 04:10:58', '2021-03-07 04:10:58', NULL, NULL, NULL, NULL, NULL, NULL),
	(33, 'sdsdfvfdsv', 'sdfvsdfv', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', 'sdfvsdvf', 2, '2021-03-07 04:11:32', '2021-03-07 04:11:32', NULL, NULL, NULL, NULL, NULL, NULL),
	(34, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'sdfvdsfv', 'sdfvsdv', 2, '2021-03-07 04:23:11', '2021-03-07 04:23:11', NULL, NULL, NULL, NULL, NULL, NULL),
	(35, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'sdfvdsfv', 'sdfvsdv', 2, '2021-03-07 04:23:43', '2021-03-07 04:23:43', NULL, NULL, NULL, NULL, NULL, NULL),
	(36, 'sdvfvsvdf', '???? ?????????? ????????????????????????', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'fdgbdf', 'sfvsdfv', 2, '2021-03-07 04:27:38', '2021-03-07 04:27:38', NULL, NULL, NULL, NULL, NULL, NULL),
	(37, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', 'sdfvsdvf', 2, '2021-03-07 04:35:00', '2021-03-07 04:35:00', NULL, NULL, NULL, NULL, NULL, NULL),
	(38, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '23423432', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 2, '2021-03-22 16:34:57', '2021-03-22 16:34:57', NULL, 'dvdsvf', NULL, NULL, NULL, NULL),
	(39, '?????? ????????????????????????', 'PO Box F', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 4, '2021-03-23 12:20:25', '2021-03-23 12:20:25', NULL, 'dvdsvf', NULL, NULL, NULL, NULL),
	(40, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '5555551234', '345235235', '234232', '2342', 'okonx', 2, '2021-03-24 00:20:16', '2021-03-24 00:20:16', NULL, 'oked', '?????? ????????????????????????', NULL, NULL, NULL),
	(41, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '5555551234', 'sdfvsdfv', '3113132', 'sdgsdg', 'okonx', 4, '2021-03-24 00:51:44', '2021-03-24 00:51:44', NULL, 'oked', 'sdfvdsfv', NULL, NULL, NULL),
	(42, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '5555551234', '345235235', '234232', '2342', 'okonx', 2, '2021-03-24 00:57:26', '2021-03-24 00:57:26', NULL, 'oked', '?????? ????????????????????????', NULL, NULL, NULL),
	(43, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 2, '2021-03-24 03:10:43', '2021-03-24 03:10:43', NULL, 'dvdsvf', NULL, NULL, NULL, NULL),
	(44, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 2, '2021-03-24 03:11:27', '2021-03-24 03:11:27', NULL, 'dvdsvf', NULL, NULL, NULL, NULL),
	(45, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 2, '2021-03-24 03:13:42', '2021-03-24 03:13:42', NULL, 'dvdsvf', NULL, NULL, NULL, NULL),
	(46, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 2, '2021-03-31 23:19:48', '2021-03-31 23:19:48', NULL, 'dsfvsdfv', NULL, NULL, NULL, NULL),
	(47, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 2, '2021-03-31 23:22:50', '2021-03-31 23:22:50', NULL, 'dsfvsdfv', NULL, NULL, NULL, NULL),
	(48, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 2, '2021-03-31 23:26:23', '2021-03-31 23:26:23', NULL, 'dsfvsdfv', NULL, NULL, NULL, NULL),
	(49, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 2, '2021-03-31 23:31:01', '2021-03-31 23:31:01', NULL, 'dsfvsdfv', NULL, NULL, NULL, NULL),
	(50, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 2, '2021-03-31 23:31:13', '2021-03-31 23:31:13', NULL, 'dsfvsdfv', NULL, NULL, NULL, NULL),
	(51, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 2, '2021-03-31 23:31:32', '2021-03-31 23:31:32', NULL, 'dsfvsdfv', NULL, NULL, NULL, NULL),
	(52, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 2, '2021-03-31 23:33:03', '2021-03-31 23:33:03', NULL, 'dsfvsdfv', NULL, NULL, NULL, NULL),
	(53, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 2, '2021-03-31 23:33:22', '2021-03-31 23:33:22', NULL, 'dsfvsdfv', NULL, NULL, NULL, NULL),
	(54, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 2, '2021-03-31 23:35:14', '2021-03-31 23:35:14', NULL, 'dsfvsdfv', NULL, NULL, NULL, NULL),
	(55, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 2, '2021-03-31 23:36:01', '2021-03-31 23:36:01', NULL, 'dsfvsdfv', NULL, NULL, NULL, NULL),
	(56, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 2, '2021-03-31 23:36:19', '2021-03-31 23:36:19', NULL, 'dsfvsdfv', NULL, NULL, NULL, NULL),
	(57, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 2, '2021-03-31 23:39:01', '2021-03-31 23:39:01', NULL, 'dsfvsdfv', NULL, NULL, NULL, NULL),
	(58, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '34235243235', '25235235', '235425', '234525', NULL, 2, '2021-04-05 01:16:33', '2021-04-05 01:16:33', NULL, '245234525', NULL, NULL, NULL, NULL),
	(59, '?????? ????????????????????????', 'PO Box F', NULL, '5555551234', 'sdfvsdfv', 'dfgbdfgb', 'dfvsdvsdfv', NULL, 2, '2021-04-05 01:19:22', '2021-04-05 01:19:22', NULL, 'dvdsvf', NULL, NULL, NULL, NULL),
	(60, 'sdvfvsvdf', 'PO Box F', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 4, '2021-04-05 01:26:02', '2021-04-05 01:26:02', NULL, 'dvdsvf', NULL, NULL, NULL, NULL),
	(61, 'sdvfvsvdf', 'PO Box F', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 4, '2021-04-05 01:26:36', '2021-04-05 01:26:36', NULL, 'dvdsvf', NULL, NULL, NULL, NULL),
	(62, 'sdvfvsvdf', 'PO Box F', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 4, '2021-04-05 01:26:43', '2021-04-05 01:26:43', NULL, 'dvdsvf', NULL, NULL, NULL, NULL),
	(63, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '??????????????', '?????????????????? ????????', '??????', '3ewrgwerg', NULL, 2, '2021-04-09 14:08:18', '2021-04-09 14:08:18', NULL, 'ewrgwegr', NULL, NULL, NULL, NULL),
	(64, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '234234234', '?????????????????? ????????', '??????', '??????', NULL, 2, '2021-04-09 14:14:21', '2021-04-09 14:14:21', NULL, '????????', NULL, NULL, '?????????? ????????????????', '?????????? ????????????????'),
	(65, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '234234234', '?????????????????? ????????', '??????', '??????', NULL, 2, '2021-04-09 14:15:12', '2021-04-09 14:15:12', NULL, '????????', NULL, NULL, '?????????? ????????????????', '?????????? ????????????????'),
	(66, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '234234234', '?????????????????? ????????', '??????', '??????', NULL, 2, '2021-04-09 14:19:25', '2021-04-09 14:19:25', NULL, '????????', NULL, NULL, '?????????? ????????????????', '?????????? ????????????????'),
	(67, '????????????????????????', '???? ?????????? ????????????????????????', NULL, '23423432', 'sdfvsdfv', '??????', '??????', '??????????', 2, '2021-04-09 16:14:32', '2021-04-09 16:14:32', NULL, '????????', 'sdfvdsfv', NULL, NULL, NULL),
	(68, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', 'okonx', 4, '2021-04-09 16:16:21', '2021-04-09 16:16:21', NULL, '????????', 'sdfvdsfv', NULL, NULL, NULL),
	(69, '?????? ????????????????????????', '?????????? ????????????????????????', NULL, '5555551234', '?????????????????? ????????', '??????', '??????', '??????????', 2, '2021-04-09 16:43:08', '2021-04-09 16:43:08', NULL, '????????', '?????? ????????????????????????', NULL, NULL, NULL),
	(70, '4534355', '?????????? ????????????????????????', NULL, '5555551234', '?????????????????? ????????', '??????', '??????', '??????????', 2, '2021-04-09 16:46:58', '2021-04-09 16:43:47', NULL, '????????', '?????? ????????????????????????', NULL, NULL, NULL),
	(71, '?????? ????????????????????????', 'PO Box F', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', '??????????', 2, '2021-04-09 17:00:08', '2021-04-09 17:00:08', NULL, NULL, NULL, NULL, NULL, NULL),
	(72, '?????? ????????????????????????', 'PO Box F', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', '??????????', 2, '2021-04-09 17:00:42', '2021-04-09 17:00:42', NULL, NULL, NULL, NULL, NULL, NULL),
	(73, '?????? ????????????????????????', 'PO Box F', NULL, '5555551234', 'sdfvsdfv', 'gsdgsd', 'dfvsdvsdfv', NULL, 2, '2021-04-10 09:38:52', '2021-04-10 09:38:52', NULL, 'dsfvsdfv', NULL, NULL, '5555551234', '12341234'),
	(74, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '5555551234', 'sdfvsdfv', 'dsfvsdfv', 'sdfvdsfv', '??????????', 2, '2021-04-10 09:45:03', '2021-04-10 09:45:03', NULL, '????????', 'sdfvdsfv', NULL, NULL, NULL),
	(75, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '5555551234', 'sdfvsdfv', 'dsfvsdfv', 'sdfvdsfv', '??????????', 2, '2021-04-10 09:45:51', '2021-04-10 09:45:51', NULL, '????????', 'sdfvdsfv', NULL, NULL, NULL),
	(76, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', NULL, 2, '2021-04-10 09:51:20', '2021-04-10 09:51:20', NULL, '????????', NULL, NULL, NULL, NULL),
	(77, '?????? ????????????????????????', 'PO Box F', NULL, '5555551234', 'sdfvsdfv', 'gsdgsd', 'sdgsdg', '??????????', 4, '2021-04-10 09:56:44', '2021-04-10 09:56:44', NULL, '????????', 'sdfvdsfv', NULL, NULL, NULL),
	(78, '?????? ????????????????????????', 'PO Box F', NULL, '5555551234', 'sdfvsdfv', 'gsdgsd', 'sdgsdg', '??????????', 4, '2021-04-10 09:58:02', '2021-04-10 09:58:02', NULL, '????????', 'sdfvdsfv', NULL, NULL, NULL),
	(79, '?????? ????????????????????????', 'PO Box F', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', '??????????', 2, '2021-04-10 10:03:26', '2021-04-10 10:03:26', NULL, NULL, NULL, NULL, NULL, NULL),
	(80, '?????? ????????????????????????', 'PO Box F', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', '??????????', 2, '2021-04-10 10:04:16', '2021-04-10 10:04:16', NULL, NULL, NULL, NULL, NULL, NULL),
	(81, '?????? ????????????????????????', 'PO Box F', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', '??????????', 2, '2021-04-10 10:06:05', '2021-04-10 10:06:05', NULL, NULL, NULL, NULL, NULL, NULL),
	(82, '?????? ????????????????????????', 'PO Box F', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', '??????????', 2, '2021-04-10 10:06:20', '2021-04-10 10:06:20', NULL, NULL, NULL, NULL, NULL, NULL),
	(83, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', '??????????', 4, '2021-04-10 10:19:46', '2021-04-10 10:19:46', NULL, 'werfwerf', 'sdfvdsfv', NULL, NULL, NULL),
	(84, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '5555551234', '?????????????????? ????????', 'dfgbdfgb', 'fdgbdf', 'dfgh', 2, '2021-04-11 13:13:04', '2021-04-11 13:13:04', NULL, 'sdfvdsfv', 'sdfvdsfv', NULL, NULL, NULL),
	(85, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '5555551234', '?????????????????? ????????', 'dfgbdfgb', 'fdgbdf', 'dfgh', 2, '2021-04-11 13:16:54', '2021-04-11 13:16:54', NULL, 'sdfvdsfv', 'sdfvdsfv', NULL, NULL, NULL),
	(86, '?????? ????????????????????????', '?????????? ????????????????????????', NULL, '5555551234', 'sdfvsdfv', '??????', '??????', '??????????', 2, '2021-04-11 13:40:04', '2021-04-11 13:40:04', NULL, '????????', 'sdfvdsfv', NULL, NULL, NULL),
	(87, '?????? ????????????????????????', 'PO Box F', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'fdgbdf', '??????????', 2, '2021-04-11 13:54:31', '2021-04-11 13:54:31', NULL, NULL, NULL, NULL, NULL, NULL),
	(88, '?????? ????????????????????????', 'PO Box F', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'fdgbdf', '??????????', 2, '2021-04-11 14:01:38', '2021-04-11 14:01:38', NULL, NULL, NULL, NULL, NULL, NULL),
	(89, '?????? ????????????????????????', 'PO Box F', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'fdgbdf', '??????????', 2, '2021-04-11 14:02:27', '2021-04-11 14:02:27', NULL, NULL, NULL, NULL, NULL, NULL),
	(90, '????????????????????????', '???? ?????????? ????????????????????????', NULL, '5555551234', 'sdfvsdfv', 'gsdgsd', 'sdgsdg', 'dfgh', 2, '2021-04-13 05:42:26', '2021-04-13 05:42:26', NULL, '????????', 'sdfvdsfv', NULL, NULL, NULL),
	(91, '?????? ????????????????????????', 'PO Box F', NULL, '5555551234', 'sdfvsdfv', 'dsfvsdfv', 'sd23', 'okonx', 2, '2021-04-18 08:36:53', '2021-04-18 08:36:53', NULL, '????????', 'sdfvdsfv', NULL, NULL, NULL),
	(92, '?????? ????????????????????????', 'PO Box F', NULL, '5555551234', 'gbdfgb', 'dfgbdfgb', 'dfvsdvsdfv', '??????????', 4, '2021-04-18 08:48:45', '2021-04-18 08:48:45', NULL, NULL, NULL, NULL, NULL, NULL),
	(93, '?????? ????????????????????????', 'PO Box F', NULL, '5555551234', 'gbdfgb', 'dfgbdfgb', 'dfvsdvsdfv', '??????????', 4, '2021-04-18 08:52:41', '2021-04-18 08:52:41', NULL, NULL, NULL, NULL, NULL, NULL),
	(94, '?????? ????????????????????????', 'PO Box F', NULL, '5555551234', 'gbdfgb', 'dfgbdfgb', 'dfvsdvsdfv', '??????????', 4, '2021-04-18 08:53:23', '2021-04-18 08:53:23', NULL, NULL, NULL, NULL, NULL, NULL),
	(95, '?????? ????????????????????????', 'PO Box F', NULL, '5555551234', 'gbdfgb', 'dfgbdfgb', 'dfvsdvsdfv', '??????????', 4, '2021-04-18 08:53:40', '2021-04-18 08:53:40', NULL, NULL, NULL, NULL, NULL, NULL),
	(96, '?????? ????????????????????????', 'PO Box F', NULL, '5555551234', 'gbdfgb', 'dfgbdfgb', 'dfvsdvsdfv', '??????????', 4, '2021-04-18 08:54:52', '2021-04-18 08:54:52', NULL, NULL, NULL, NULL, NULL, NULL),
	(97, '?????? ????????????????????????', 'PO Box F', NULL, '5555551234', 'gbdfgb', 'dfgbdfgb', 'dfvsdvsdfv', '??????????', 4, '2021-04-18 08:56:32', '2021-04-18 08:56:32', NULL, NULL, NULL, NULL, NULL, NULL),
	(98, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', 'asdvasdv', 1, '2021-04-19 06:08:35', '2021-04-19 06:08:35', NULL, 'asdvasdv', NULL, NULL, NULL, NULL),
	(99, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', 'asdvasdv', 1, '2021-04-19 06:10:56', '2021-04-19 06:10:56', NULL, 'asdvasdv', NULL, NULL, NULL, NULL),
	(100, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', 'asdvasdv', 1, '2021-04-19 06:12:26', '2021-04-19 06:12:26', NULL, 'asdvasdv', NULL, NULL, NULL, NULL),
	(101, '?????? ????????????????????????', '???? ?????????? ????????????????????????', NULL, '5555551234', 'sdfvsdfv', 'sdvfsdfvs', 'dfvsdvsdfv', 'asdvasdv', 1, '2021-04-19 06:13:24', '2021-04-19 06:13:24', NULL, 'asdvasdv', NULL, NULL, NULL, NULL),
	(102, '????????????????????????', '?????????? ????????????????????????', NULL, '12324242', '221212', '1111111', '??????', '??????????', 1, '2021-05-07 10:28:04', '2021-05-07 10:28:04', NULL, '????????', NULL, NULL, NULL, NULL),
	(103, '????????????????????????', '?????????? ????????????????????????', NULL, '12324242', '221212', '1111111', '??????', '??????????', 1, '2021-05-07 10:29:13', '2021-05-07 10:29:13', NULL, '????????', NULL, NULL, NULL, NULL),
	(104, 'dsdsd', '?????????? ????????????????????????', NULL, '12324242', '221212', '1111111', '??????', '??????????', 1, '2021-05-07 10:32:49', '2021-05-07 10:32:49', NULL, '????????', NULL, NULL, NULL, NULL),
	(105, 'dsdsd', '?????????? ????????????????????????', NULL, '12324242', '221212', '1111111', '??????', '??????????', 1, '2021-05-07 10:33:36', '2021-05-07 10:33:36', NULL, '????????', NULL, NULL, NULL, NULL),
	(106, 'dsdsd', '?????????? ????????????????????????', NULL, '12324242', '221212', '1111111', '??????', '??????????', 1, '2021-05-07 10:34:41', '2021-05-07 10:34:41', NULL, '????????', NULL, NULL, NULL, NULL),
	(107, 'dsdsd', '?????????? ????????????????????????', NULL, '12324242', '221212', '1111111', '??????', '??????????', 1, '2021-05-07 10:36:54', '2021-05-07 10:36:54', NULL, '????????', NULL, NULL, NULL, NULL),
	(108, 'dsdsd', '?????????? ????????????????????????', NULL, '12324242', '221212', '1111111', '??????', '??????????', 1, '2021-05-07 10:37:22', '2021-05-07 10:37:22', NULL, '????????', NULL, NULL, NULL, NULL),
	(109, 'dsdsd', '?????????? ????????????????????????', NULL, '12324242', '221212', '1111111', '??????', '??????????', 1, '2021-05-07 10:44:37', '2021-05-07 10:44:37', NULL, '????????', NULL, NULL, NULL, NULL),
	(110, 'dsdsd', '?????????? ????????????????????????', NULL, '12324242', '221212', '1111111', '??????', '??????????', 1, '2021-05-07 10:45:34', '2021-05-07 10:45:34', NULL, '????????', NULL, NULL, NULL, NULL),
	(111, 'dsdsd', '?????????? ????????????????????????', NULL, '12324242', '221212', '1111111', '??????', '??????????', 1, '2021-05-07 10:46:42', '2021-05-07 10:46:42', NULL, '????????', NULL, NULL, NULL, NULL),
	(112, 'dsdsd', '?????????? ????????????????????????', NULL, '12324242', '221212', '1111111', '??????', '??????????', 1, '2021-05-07 10:46:59', '2021-05-07 10:46:59', NULL, '????????', NULL, NULL, NULL, NULL),
	(113, 'dsdsd', '?????????? ????????????????????????', NULL, '12324242', '221212', '1111111', '??????', '??????????', 1, '2021-05-07 10:47:25', '2021-05-07 10:47:25', NULL, '????????', NULL, NULL, NULL, NULL),
	(114, '????????????????????????', '?????????? ????????????????????????', NULL, '12324242', '221212', '1111111', '??????', '??????????', 1, '2021-05-07 10:51:25', '2021-05-07 10:51:25', NULL, '????????', NULL, NULL, NULL, NULL),
	(115, 'dsdsd', '?????????? ????????????????????????', NULL, '212121', '212121', '1111111', '??????', '??????????', 1, '2021-05-07 14:39:54', '2021-05-07 11:01:21', NULL, '????????', NULL, NULL, NULL, NULL),
	(116, 'dsdsd', '?????????? ????????????????????????', NULL, '12324242', 'sxsxsxsx', '1111111', '??????', '??????????', 1, '2021-05-07 15:32:09', '2021-05-07 15:32:09', NULL, '????????', NULL, NULL, NULL, NULL),
	(117, '????????????????????????', 'dssdsd', NULL, '12324242', '221212', '1111111', '??????', '??????????', 1, '2021-05-07 15:37:34', '2021-05-07 15:37:34', NULL, '????????', NULL, NULL, NULL, NULL),
	(118, 'aszasc', '?????????? ????????????????????????', NULL, '12324242', '221212', '1111111', '??????', '??????????', 1, '2021-05-08 06:50:42', '2021-05-08 06:50:42', NULL, '????????', NULL, NULL, NULL, NULL),
	(119, 'qqed', '?????????? ????????????????????????', NULL, '12324242', '221212', '1111111', '??????', '??????????', 1, '2021-05-08 06:53:47', '2021-05-08 06:53:47', NULL, '????????', NULL, NULL, NULL, NULL),
	(121, 'sdsdds', '?????????? ????????????????????????', NULL, 'sdcsdc', 'asddas', '1111111', 'cdcdsc', 'dscsdc', 1, '2021-05-09 16:29:07', '2021-05-09 16:29:07', NULL, 'sdcsdc', 'sdasas', 'dscsdcs', NULL, NULL),
	(122, 'ssa', '?????????? ????????????????????????', NULL, '12324242', '221212', '1111111', '??????', '??????????', 1, '2021-05-09 16:38:54', '2021-05-09 16:38:54', NULL, '????????', NULL, NULL, NULL, NULL),
	(123, 'ssa', '?????????? ????????????????????????', NULL, '12324242', '221212', '1111111', '??????', '??????????', 1, '2021-05-09 16:39:14', '2021-05-09 16:39:14', NULL, '????????', NULL, NULL, NULL, NULL),
	(124, 'dsdsd', '?????????? ????????????????????????', NULL, '465465', '221212', '1111111', '??????', NULL, 1, '2021-05-10 16:06:31', '2021-05-10 16:06:31', NULL, '????????', NULL, NULL, NULL, NULL),
	(125, 'sdfsdfs', '?????????? ????????????????????????', NULL, '5424524', '221212', '1111111', '24242', NULL, 1, '2021-05-10 16:09:44', '2021-05-10 16:09:44', NULL, '????????', NULL, NULL, NULL, NULL),
	(126, 'sdfsdfs', '?????????? ????????????????????????', NULL, '5424524', '221212', '1111111', '24242', NULL, 1, '2021-05-10 16:10:04', '2021-05-10 16:10:04', NULL, '????????', NULL, NULL, NULL, NULL),
	(127, 'sdfsdfs', '?????????? ????????????????????????', NULL, '5424524', '221212', '1111111', '24242', NULL, 1, '2021-05-10 16:10:53', '2021-05-10 16:10:53', NULL, '????????', NULL, NULL, NULL, NULL),
	(129, 'dsdsddfdfd', '?????????? ????????????????????????', NULL, '452245', '454242', '2424', '452452545', NULL, 1, '2021-05-11 15:17:08', '2021-05-11 15:17:08', NULL, '????????', NULL, NULL, NULL, NULL),
	(130, 'daada', '?????????? ????????????????????????', NULL, 'asdasda', '221212', '1111111', '??????', NULL, 1, '2021-05-11 15:26:01', '2021-05-11 15:26:01', NULL, '????????', NULL, NULL, NULL, NULL),
	(131, 'daada', '?????????? ????????????????????????', NULL, 'asdasda', '221212', '1111111', '??????', NULL, 1, '2021-05-11 15:26:55', '2021-05-11 15:26:55', NULL, '????????', NULL, NULL, NULL, NULL),
	(132, 'daada', '?????????? ????????????????????????', NULL, '465465', '221212', '1111111', '??????', NULL, 1, '2021-05-12 06:37:47', '2021-05-12 06:37:47', NULL, '????????', NULL, NULL, NULL, NULL),
	(133, 'dsdsd', 'dssdsd', NULL, '465465', '221212', '1111111', 'cdcdsc', NULL, 1, '2021-05-12 13:11:47', '2021-05-12 13:11:47', NULL, '????????', NULL, NULL, NULL, NULL),
	(134, 'erfrefre', '?????????? ????????????????????????', NULL, 'frfrfr', 'sxsxsxsx', '54422', 'xzczxc', NULL, 1, '2021-05-12 13:24:39', '2021-05-12 13:24:39', NULL, '????????', NULL, NULL, NULL, NULL),
	(135, 'swfesrfe', 'fesrferf', NULL, '465465', '221212', '1111111', '??????', NULL, 1, '2021-05-12 15:23:50', '2021-05-12 15:23:50', NULL, '????????', NULL, NULL, NULL, NULL),
	(136, 'fdfvdvfd', 'dssdsd', NULL, '525', '221212', '1111111', '2525', NULL, 1, '2021-05-12 15:30:45', '2021-05-12 15:30:45', NULL, '????????', NULL, NULL, NULL, NULL),
	(137, 'feff', '?????????? ????????????????????????', NULL, '465465', '221212', '1111111', '??????', NULL, 1, '2021-05-12 15:50:14', '2021-05-12 15:50:14', NULL, '????????', NULL, NULL, NULL, NULL),
	(138, 'dsdsd', 'dssdsd', NULL, 'asdasda', '221212', '1111111', '??????', NULL, 1, '2021-05-12 16:08:40', '2021-05-12 16:08:40', NULL, '????????', NULL, NULL, NULL, NULL),
	(139, 'dfxgdg', '?????????? ????????????????????????', NULL, '5424524', '454242', '2424', '24242', NULL, 1, '2021-05-14 09:15:35', '2021-05-14 09:15:35', NULL, 'sdcsdc', NULL, NULL, NULL, NULL),
	(141, 'asdas', '?????????? ????????????????????????', NULL, '465465', '4524524', '245245', '??????', NULL, 1, '2021-05-16 17:24:10', '2021-05-16 17:24:10', NULL, '????????', NULL, NULL, NULL, NULL),
	(142, 'asdas', '?????????? ????????????????????????', NULL, '465465', '4524524', '245245', '??????', NULL, 1, '2021-05-16 17:26:50', '2021-05-16 17:26:50', NULL, '????????', NULL, NULL, NULL, NULL),
	(143, 'dsdsd', '?????????? ????????????????????????', NULL, 'asdasda', 'asddas', '1111111', '??????', NULL, 1, '2021-05-16 17:30:01', '2021-05-16 17:30:01', NULL, '????????', NULL, NULL, NULL, NULL),
	(144, 'dsdsd', '?????????? ????????????????????????', NULL, 'asdasda', 'asddas', '1111111', '??????', NULL, 1, '2021-05-16 17:30:26', '2021-05-16 17:30:26', NULL, '????????', NULL, NULL, NULL, NULL),
	(145, 'dsdsd', '?????????? ????????????????????????', NULL, 'asdasda', 'asddas', '1111111', '??????', NULL, 1, '2021-05-16 17:30:56', '2021-05-16 17:30:56', NULL, '????????', NULL, NULL, NULL, NULL),
	(146, 'lllllllllllllllllllllllllll', '?????????? ????????????????????????', NULL, '465465', '2452452', '45245245', '??????', NULL, 1, '2021-05-16 19:11:59', '2021-05-16 17:32:26', NULL, '????????', NULL, NULL, NULL, NULL),
	(147, 'dsdsd', '?????????? ????????????????????????', NULL, '12324242', 'sxsxsxsx', '1111111', '??????', '??????????', 1, '2021-05-17 15:26:01', '2021-05-17 15:26:01', NULL, '????????', NULL, NULL, NULL, NULL),
	(148, 'dsdsd', 'dssdsd', NULL, '12324242', '221212', '1111111', '??????', '??????????', 1, '2021-05-17 15:41:53', '2021-05-17 15:41:53', NULL, '????????', NULL, NULL, NULL, NULL),
	(149, 'dsdsd', '?????????? ????????????????????????', NULL, '212121', '221212', '1111111', 'xzczxc', '??????????', 1, '2021-05-17 15:46:20', '2021-05-17 15:46:20', NULL, '????????', NULL, NULL, NULL, NULL),
	(150, 'dsdsd', '?????????? ????????????????????????', NULL, '12324242', '221212', '1111111', '??????', NULL, 1, '2021-05-17 15:57:23', '2021-05-17 15:57:23', NULL, NULL, NULL, NULL, NULL, NULL),
	(151, 'asd', '?????????? ????????????????????????', NULL, '465465', 'ADaSd', '1111111', '??????', '??????????', 1, '2021-05-17 17:00:55', '2021-05-17 17:00:55', NULL, '????????', NULL, NULL, NULL, NULL),
	(152, 'csdcsd', '?????????? ????????????????????????', NULL, '465465', '424524', '1111111', '??????', 'fds', 1, '2021-05-17 17:12:06', '2021-05-17 17:12:06', NULL, '????????', 'sdasas', 'cdscdds', NULL, NULL),
	(153, 'asdas', 'dssdsd', NULL, '12324242', '221212', '1111111', '??????', '????????', 1, '2021-05-17 17:19:46', '2021-05-17 17:19:46', NULL, '????????', NULL, NULL, NULL, NULL),
	(154, 'dsdsd', '?????????? ????????????????????????', NULL, '212121', 'sxsxsxsx', '1111111', '??????', '??????????', 1, '2021-05-17 17:21:18', '2021-05-17 17:21:18', NULL, '????????', NULL, NULL, NULL, NULL),
	(155, 'dsdsd', '?????????? ????????????????????????', NULL, '12324242', '221212', '1111111', 'sdsaa', NULL, 1, '2021-05-17 17:26:37', '2021-05-17 17:26:37', NULL, NULL, NULL, NULL, NULL, NULL),
	(156, 'ssaas', 'dssdsd', NULL, '12324242', '221212', '1111111', '??????', '??????????', 1, '2021-05-17 19:33:59', '2021-05-17 19:33:59', NULL, '????????', NULL, NULL, NULL, NULL),
	(157, 'zxz', '?????????? ????????????????????????', NULL, '12324242', '221212', '1111111', '??????', '??????????', 1, '2021-05-17 19:34:45', '2021-05-17 19:34:45', NULL, '????????', NULL, NULL, NULL, NULL),
	(158, 'aaaaaaaaaaaaaaaaaaaaaaaaaaa', '?????????? ????????????????????????', NULL, '12324242', 'sxsxsxsx', '1111111', '??????', '??????????', 1, '2021-05-17 19:37:33', '2021-05-17 19:37:33', NULL, '????????', NULL, NULL, NULL, NULL),
	(159, 'asasx', 'dssdsd', NULL, '465465', 'asddas', '1111111', '??????', '4524524', 1, '2021-05-18 10:51:19', '2021-05-18 10:51:19', NULL, '452452', 'sdasas', 'xsaXasx', NULL, NULL),
	(160, 'dfdfdfdf', '?????????? ????????????????????????', NULL, '12324242', '12324242', '1111111', '??????', '??????????', 1, '2021-05-18 11:59:43', '2021-05-18 11:32:47', NULL, '????????', NULL, NULL, NULL, NULL),
	(161, 'dfdd', '?????????? ????????????????????????', 'asds@asd.asdas', '12324242', '221212', '1111111', '??????', NULL, 1, '2021-05-18 18:12:56', '2021-05-18 18:12:56', NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `policy_holders` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.policy_registrations
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

-- Dumping data for table ddgi_test_2.policy_registrations: ~4 rows (approximately)
DELETE FROM `policy_registrations`;
/*!40000 ALTER TABLE `policy_registrations` DISABLE KEYS */;
INSERT INTO `policy_registrations` (`id`, `act_number`, `act_date`, `from_number`, `to_number`, `policy_series_id`, `document`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'asdvvd', '2021-01-09', '101', '140', 1, 'C:\\Users\\User\\AppData\\Local\\Temp\\php1FD7.tmp', '2021-01-09', '2021-01-09', NULL),
	(2, 'asdvvd', '2021-01-09', '141', '150', 1, 'C:\\Users\\User\\AppData\\Local\\Temp\\php251F.tmp', '2021-01-09', '2021-01-09', NULL),
	(3, 'asdvvd', '2021-01-09', '141', '150', 0, 'C:\\Users\\User\\AppData\\Local\\Temp\\php2D49.tmp', '2021-01-09', '2021-01-09', NULL),
	(4, 'asdvvd', '2021-04-02', '200', '249', 1, 'C:\\Users\\User\\AppData\\Local\\Temp\\php9BEC.tmp', '2021-04-01', '2021-04-01', NULL);
/*!40000 ALTER TABLE `policy_registrations` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.policy_retransfer
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

-- Dumping data for table ddgi_test_2.policy_retransfer: ~1 rows (approximately)
DELETE FROM `policy_retransfer`;
/*!40000 ALTER TABLE `policy_retransfer` DISABLE KEYS */;
INSERT INTO `policy_retransfer` (`id`, `act_number`, `act_date`, `branch_id`, `user_id`, `policy_series_id`, `policy_from`, `policy_to`, `retransfer_distribution`, `act_file`, `transfer_given`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(3, 'BB44321', '2021-02-23', 1, 4, 1, '141', '142', '2021-02-23', NULL, 'admin', '2021-02-23', '2021-02-23', NULL);
/*!40000 ALTER TABLE `policy_retransfer` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.policy_series
CREATE TABLE IF NOT EXISTS `policy_series` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi_test_2.policy_series: ~3 rows (approximately)
DELETE FROM `policy_series`;
/*!40000 ALTER TABLE `policy_series` DISABLE KEYS */;
INSERT INTO `policy_series` (`id`, `code`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '2342345555AA', '2021-01-08', '2021-01-21', NULL),
	(2, 'AA', '2021-02-08', '2021-02-08', NULL),
	(3, 'new', NULL, NULL, NULL);
/*!40000 ALTER TABLE `policy_series` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.policy_transfer
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

-- Dumping data for table ddgi_test_2.policy_transfer: ~1 rows (approximately)
DELETE FROM `policy_transfer`;
/*!40000 ALTER TABLE `policy_transfer` DISABLE KEYS */;
INSERT INTO `policy_transfer` (`id`, `act_number`, `act_date`, `branch_id`, `user_id`, `policy_series_id`, `policy_from`, `policy_to`, `retransfer_distribution`, `act_file`, `transfer_given`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(2, 'AA4432', '2021-01-11', 2, NULL, 1, '141', '146', '2021-01-11', 'C:\\Users\\User\\AppData\\Local\\Temp\\php40F.tmp', 'admin', '2021-01-11', '2021-01-11', NULL);
/*!40000 ALTER TABLE `policy_transfer` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.poruchitels
CREATE TABLE IF NOT EXISTS `poruchitels` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `all_products_id` bigint(20) unsigned NOT NULL,
  `legal_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_guarantor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone_guarantor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guarantor_schet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inn_guarantor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mfo_guarantor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_guarantor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oked_guarantor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.poruchitels: ~0 rows (approximately)
DELETE FROM `poruchitels`;
/*!40000 ALTER TABLE `poruchitels` DISABLE KEYS */;
/*!40000 ALTER TABLE `poruchitels` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.pretensii
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi_test_2.pretensii: ~2 rows (approximately)
DELETE FROM `pretensii`;
/*!40000 ALTER TABLE `pretensii` DISABLE KEYS */;
INSERT INTO `pretensii` (`id`, `pretensii_status_id`, `case_number`, `policy_id`, `insurer`, `branch_id`, `insurance_contract`, `client_type`, `insurence_type`, `insurence_period`, `insured_sum`, `payable_by_agreement`, `actually_paid`, `last_payment_date`, `franchise_type_id`, `deductible_amount`, `franchise_percentage`, `reinsurance`, `date_applications`, `date_of_the_insured_event`, `event_description`, `object_description`, `region`, `district`, `claimed_loss_sum`, `refund_paid_sum`, `currency_exchange_rate`, `total_amount_in_sums`, `date_of_payment_compensation`, `final_settlement_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 2, 1, 7, 'insured', 1, 'insurance-contract', 1, 'kasko', NULL, '5000', '5000', '3000', NULL, '1', '3000', '50', 'vsdvsdvf', NULL, NULL, 'description-of-the-insured-event', 'description-of-the-insurance-object', 'pretensii-region 2', 'pretensii-district 2', '5000', '5000', '5000', '5000', NULL, NULL, '2021-01-29 05:42:22', '2021-02-01 03:26:57', NULL),
	(2, 2, 1, 10, '?????? ????????????????????????', 1, '0100/0505/1/2100001', 0, '???????????????????? ????????????	', '2021-04-07', '234234', '234234', '234234', '2021-04-06', '2', '3433', '10', 'fdbgdfb', '2021-03-31', '2021-04-08', '???????????????? ???????????????????? ??????????????', '???????????????? ???????????????????? ??????????????', 'pretensii-region 1', 'pretensii-district 2', '5000', '6000', '1', '6000', '2021-04-07', '2022-04-09', '2021-04-07 14:02:20', '2021-04-07 14:02:20', NULL);
/*!40000 ALTER TABLE `pretensii` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.pretensii_overview
CREATE TABLE IF NOT EXISTS `pretensii_overview` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pretensii_id` int(11) unsigned NOT NULL DEFAULT '0',
  `user_id` int(11) unsigned NOT NULL DEFAULT '0',
  `passed` tinyint(3) unsigned NOT NULL COMMENT '1 - ???????????? ; 0 - ???? ????????????',
  `comment` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='???????????????? ??????????????????';

-- Dumping data for table ddgi_test_2.pretensii_overview: ~2 rows (approximately)
DELETE FROM `pretensii_overview`;
/*!40000 ALTER TABLE `pretensii_overview` DISABLE KEYS */;
INSERT INTO `pretensii_overview` (`id`, `pretensii_id`, `user_id`, `passed`, `comment`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 4, 1, 'comment here', '2021-02-01 01:49:15', '2021-02-01 01:49:15', NULL),
	(2, 1, 3, 0, 'comment here 3', '2021-02-01 02:52:03', '2021-02-01 03:15:44', NULL);
/*!40000 ALTER TABLE `pretensii_overview` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.pretensii_status
CREATE TABLE IF NOT EXISTS `pretensii_status` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(50) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi_test_2.pretensii_status: ~3 rows (approximately)
DELETE FROM `pretensii_status`;
/*!40000 ALTER TABLE `pretensii_status` DISABLE KEYS */;
INSERT INTO `pretensii_status` (`id`, `status`, `code`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '???? ????????????????????????', 'in progress', NULL, NULL, NULL),
	(2, '????????????????', 'declined', NULL, NULL, NULL),
	(3, '????????????', 'accepted', NULL, NULL, NULL);
/*!40000 ALTER TABLE `pretensii_status` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.product3777s
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

-- Dumping data for table ddgi_test_2.product3777s: ~0 rows (approximately)
DELETE FROM `product3777s`;
/*!40000 ALTER TABLE `product3777s` DISABLE KEYS */;
/*!40000 ALTER TABLE `product3777s` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `klass_id` int(11) unsigned NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `route` varchar(250) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `tarif` varchar(50) DEFAULT NULL,
  `agency` varchar(50) DEFAULT NULL,
  `max_acceptable_amount` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi_test_2.products: ~8 rows (approximately)
DELETE FROM `products`;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `klass_id`, `name`, `route`, `code`, `tarif`, `agency`, `max_acceptable_amount`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, '??????????', NULL, '01', '10', NULL, '3463456', '2021-02-11 23:51:21', '2021-02-11 23:51:21', NULL),
	(2, 2, '???????????????????? ??????????', NULL, '02', '8', NULL, NULL, NULL, NULL, NULL),
	(3, 3, '??????', NULL, '03', '4', NULL, '5434543', NULL, NULL, NULL),
	(4, 4, '?????????????????????????????? ??????????????????', NULL, '04', '12', NULL, NULL, NULL, NULL, NULL),
	(5, 5, '???????????????????? ????????????', NULL, '05', '10', NULL, '100000', NULL, '2021-03-31 23:54:37', NULL),
	(6, 6, '???????????????????? ??????????????????', 'dobrovolka_imushestvo', '06', '1', NULL, NULL, NULL, NULL, NULL),
	(7, 6, '???????????? ???? 3777', NULL, '07', NULL, NULL, NULL, NULL, NULL, NULL),
	(8, 6, '?????????????????? ??????????????????????', NULL, '08', NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.property_lising_zalog
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

-- Dumping data for table ddgi_test_2.property_lising_zalog: ~0 rows (approximately)
DELETE FROM `property_lising_zalog`;
/*!40000 ALTER TABLE `property_lising_zalog` DISABLE KEYS */;
/*!40000 ALTER TABLE `property_lising_zalog` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.regions
CREATE TABLE IF NOT EXISTS `regions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table ddgi_test_2.regions: ~7 rows (approximately)
DELETE FROM `regions`;
/*!40000 ALTER TABLE `regions` DISABLE KEYS */;
INSERT INTO `regions` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '??????????????', '2021-02-18 02:32:23', '2021-02-18 02:32:24', NULL),
	(2, '?????????????????????? ??????????????', NULL, NULL, NULL),
	(3, '???????????????????? ????????????????????????????', NULL, NULL, NULL),
	(4, '???????????????????? ??????????????', NULL, NULL, NULL),
	(5, '?????????????????????? ??????????????', NULL, NULL, NULL),
	(6, '?????????????????? ??????????????', NULL, NULL, NULL),
	(7, '???????????????????? ??????????????', NULL, NULL, NULL);
/*!40000 ALTER TABLE `regions` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.requests
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

-- Dumping data for table ddgi_test_2.requests: ~3 rows (approximately)
DELETE FROM `requests`;
/*!40000 ALTER TABLE `requests` DISABLE KEYS */;
INSERT INTO `requests` (`id`, `user_id`, `status`, `state`, `is_underwritting_request`, `is_perestrahovaniya_request`, `comments`, `file`, `act_number`, `limit_reason`, `policy_id`, `policy_series_id`, `polis_quantity`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 3, 'underwritting', 0, 0, 0, 'comment', 'request_file/0QsWi20mDJhe2MEb4y1ly7XPoGSVa2urgQm5dpjL.docx', NULL, 'some reason', 76, 1, NULL, '2021-04-01 19:17:45', '2021-04-04 22:48:38', NULL),
	(3, 3, 'underwritting', 2, 0, 0, 'Comment here', 'request_file/vfmNZght7538tCRako0I5ZsPPM8tGCkFJeHiYNk0.docx', NULL, 'some reason', 77, 1, NULL, '2021-04-05 00:53:09', '2021-04-05 00:53:09', NULL),
	(4, 3, 'underwritting', 1, 0, 0, 'asdvsadv', '', NULL, 'asvasdvsadv', 10, 1, NULL, '2021-04-05 05:03:44', '2021-04-05 05:03:44', NULL);
/*!40000 ALTER TABLE `requests` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.request_overviews
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

-- Dumping data for table ddgi_test_2.request_overviews: ~3 rows (approximately)
DELETE FROM `request_overviews`;
/*!40000 ALTER TABLE `request_overviews` DISABLE KEYS */;
INSERT INTO `request_overviews` (`id`, `user_id`, `request_id`, `passed`, `comment`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 3, 1, 1, 'some comment d', '2021-04-03 23:01:35', '2021-04-04 16:05:30', NULL),
	(2, 4, 1, 1, 'some comment', '2021-04-03 23:03:29', '2021-04-03 23:03:29', NULL),
	(3, 3, 3, 1, 'No comments', '2021-04-05 01:14:00', '2021-04-05 01:14:00', NULL);
/*!40000 ALTER TABLE `request_overviews` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.roles: ~0 rows (approximately)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.role_has_permissions: ~0 rows (approximately)
DELETE FROM `role_has_permissions`;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.tamozhnya_adds
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

-- Dumping data for table ddgi_test_2.tamozhnya_adds: ~1 rows (approximately)
DELETE FROM `tamozhnya_adds`;
/*!40000 ALTER TABLE `tamozhnya_adds` DISABLE KEYS */;
INSERT INTO `tamozhnya_adds` (`id`, `from_date`, `to_date`, `warehouse_volume`, `product_volume`, `product_volume_unit`, `total_sum`, `na_sklade_from_date`, `na_sklade_to_date`, `payment_term`, `currencies`, `sposob_rascheta`, `strahovaya_sum`, `strahovaya_purpose`, `franshiza`, `serial_number_policy`, `date_issue_policy`, `otvet_litso`, `policy_holder_id`, `policy_beneficiary_id`, `anketa_img`, `dogovor_img`, `polis_img`, `created_at`, `updated_at`) VALUES
	(1, '2021-03-18', '2021-03-18', '2343', '3', '????????', '4', '2021-03-06', '2021-04-02', '1', 'UZS', 1, '343', '34', '34', '34', '2021-03-04', 1, 39, 21, NULL, NULL, NULL, '2021-03-23 12:20:25', '2021-03-23 12:20:25');
/*!40000 ALTER TABLE `tamozhnya_adds` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.tamozhnya_add_legals
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.tamozhnya_add_legals: ~3 rows (approximately)
DELETE FROM `tamozhnya_add_legals`;
/*!40000 ALTER TABLE `tamozhnya_add_legals` DISABLE KEYS */;
INSERT INTO `tamozhnya_add_legals` (`id`, `description`, `from_date`, `to_date`, `prof_riski`, `pretenzii_in_ruz`, `prichina_pretenzii`, `tarif`, `payment_term`, `currencies`, `unique_number`, `sposob_rascheta`, `product_id`, `policy_id`, `type`, `strahovaya_sum`, `strahovaya_purpose`, `franshiza`, `serial_number_policy`, `date_issue_policy`, `otvet_litso`, `policy_holder_id`, `anketa_img`, `dogovor_img`, `polis_img`, `created_at`, `updated_at`) VALUES
	(3, 'dfsdvdsfv', '2021-03-05', '2021-03-18', '2322423', 0, NULL, 10, '1', 'UZS', '0100/0505/1/2100001', 1, 5, 10, 0, '234234', '34', '3433', 1, '2021-03-04', 1, 45, NULL, NULL, NULL, '2021-03-24 03:13:42', '2021-03-28 18:29:14'),
	(15, 'gbsbbfsbgsfsfbsfgbsfgbsfbfsgb', '2021-04-15', '2021-04-30', '2322423', 1, 'sdfvdvf', 15, 'transh', 'UZS', '0100/0505/1/2100013', 1, 5, 77, 0, '11234234', '1685135.1', '23424', 1, '2021-04-09', 1, 57, NULL, NULL, NULL, '2021-03-31 23:39:01', '2021-04-05 00:20:36'),
	(17, 'rtherthrth', '2021-04-16', '2021-04-08', '2322423', 0, NULL, 10, '1', 'UZS', '0100/0505/1/2100004', 1, 5, 78, 0, '234234455454', '23423445545.4', '454545', 1, '2021-04-09', 1, 59, NULL, NULL, NULL, '2021-04-05 01:19:22', '2021-04-05 01:23:45');
/*!40000 ALTER TABLE `tamozhnya_add_legals` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.tamozhnya_add_legal_strah_premiyas
CREATE TABLE IF NOT EXISTS `tamozhnya_add_legal_strah_premiyas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `prem_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prem_from` date NOT NULL,
  `tamozhnya_add_legal_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.tamozhnya_add_legal_strah_premiyas: ~1 rows (approximately)
DELETE FROM `tamozhnya_add_legal_strah_premiyas`;
/*!40000 ALTER TABLE `tamozhnya_add_legal_strah_premiyas` DISABLE KEYS */;
INSERT INTO `tamozhnya_add_legal_strah_premiyas` (`id`, `prem_sum`, `prem_from`, `tamozhnya_add_legal_id`, `created_at`, `updated_at`) VALUES
	(1, '234242', '2021-03-29', 15, '2021-04-02 01:44:34', '2021-04-02 01:44:34');
/*!40000 ALTER TABLE `tamozhnya_add_legal_strah_premiyas` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.tamozhnya_add_strah_premiyas
CREATE TABLE IF NOT EXISTS `tamozhnya_add_strah_premiyas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `prem_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prem_from` date NOT NULL,
  `tamozhnya_add_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.tamozhnya_add_strah_premiyas: ~0 rows (approximately)
DELETE FROM `tamozhnya_add_strah_premiyas`;
/*!40000 ALTER TABLE `tamozhnya_add_strah_premiyas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tamozhnya_add_strah_premiyas` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.users
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

-- Dumping data for table ddgi_test_2.users: ~8 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `branch_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(2, 1, 'ahaha', 'user@user.com', NULL, '$2y$10$a7pUCw5TuXkwkDZ7Z8TgJubAwqkH60RD8s8gDTU2O8EdRrwRnf1La', NULL, '2021-01-29 03:24:33', '2021-02-17 23:49:00', NULL),
	(3, 1, 'Admin', 'admin@admin.com', NULL, '$2y$10$a7pUCw5TuXkwkDZ7Z8TgJubAwqkH60RD8s8gDTU2O8EdRrwRnf1La', NULL, '2021-01-29 03:24:33', '2021-02-17 23:49:00', NULL),
	(4, 1, 'Name1', 'agent@agent.com', NULL, '$2y$10$S6bTdfHW7SAS8A3OU1cCDeWOS7E8TmsyI2QYb8qG41nkqqO9C/Pr2', NULL, '2021-01-08 01:47:43', '2021-04-03 23:02:21', NULL),
	(9, 1, 'sdfv', 'directo3r@director.com', NULL, '$2y$10$gct4miLEu4b7s6XOK9deXeGg1X.hWUokcoeTqnKxxFgDSpIVUk.6W', NULL, '2021-01-08 10:10:10', '2021-03-28 23:34:48', NULL),
	(17, 1, 'Name', 'directo7r@director.com', NULL, '$2y$10$/qBHL6LNkuZdJA61fHpNNeLCrQiEXhqFExULUTxtoPY7O9twgj3De', NULL, '2021-02-18 00:59:55', '2021-03-28 18:28:11', NULL),
	(20, 1, 'dfgbdfb', 'directo00r@director.com', NULL, '$2y$10$2BeRT0YCJVZv8pOSArLOl.Nj1XvtPgv/cpdvpsOWGvtlp.TCMRsZ2', NULL, '2021-02-18 00:59:55', '2021-02-18 01:00:03', NULL),
	(21, NULL, '????????', 'mario@mail.ru', NULL, '$2y$10$alm2j/eP04rgfPWjbMmn/OSgtV7o0itjWfMip9rSgU/kSgk9c/Dta', NULL, '2021-03-29 00:26:44', '2021-03-29 00:30:51', NULL),
	(22, NULL, 'test', 'bbr@mail.ru', NULL, '$2y$10$QZXD1hqlKVlspYI2V5S7dumowKHB03xe6OTg3NtPC6WCaJGK58MaC', NULL, '2021-03-29 00:29:08', '2021-03-29 00:29:26', '2021-03-29 00:29:26');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.views
CREATE TABLE IF NOT EXISTS `views` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table ddgi_test_2.views: ~0 rows (approximately)
DELETE FROM `views`;
/*!40000 ALTER TABLE `views` DISABLE KEYS */;
/*!40000 ALTER TABLE `views` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.zaemshiks
CREATE TABLE IF NOT EXISTS `zaemshiks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `z_fio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `z_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `z_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_series` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_issued` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_when_issued` date DEFAULT NULL,
  `z_checking_account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `z_inn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `z_mfo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_id` int(11) NOT NULL,
  `z_okonx` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `z_oked` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.zaemshiks: ~11 rows (approximately)
DELETE FROM `zaemshiks`;
/*!40000 ALTER TABLE `zaemshiks` DISABLE KEYS */;
INSERT INTO `zaemshiks` (`id`, `z_fio`, `z_address`, `z_phone`, `passport_series`, `passport_number`, `passport_issued`, `passport_when_issued`, `z_checking_account`, `z_inn`, `z_mfo`, `bank_id`, `z_okonx`, `created_at`, `updated_at`, `z_oked`) VALUES
	(2, '????????????????????????', '?????????? ????????????????????????', '5588745', 'gfgf', '245242', NULL, NULL, '424524', '655665', '4545', 1, NULL, '2021-05-11 15:17:08', '2021-05-11 15:17:08', '????????'),
	(3, '????????????????????????', '???? ?????????? ????????????????', '5565656565', 'xasxas', '245242', NULL, NULL, '21326', '655665', '5525225', 1, NULL, '2021-05-11 15:26:01', '2021-05-11 15:26:01', '????????'),
	(4, '????????????????????????', '???? ?????????? ????????????????', '5565656565', 'xasxas', '245242', NULL, NULL, '21326', '655665', '5525225', 1, NULL, '2021-05-11 15:26:55', '2021-05-11 15:26:55', '????????'),
	(5, '????????????????????????dsad', 'dgfgff', '5565656565', 'dfg', '6535', NULL, NULL, '21326', '655665', '353556', 1, NULL, '2021-05-12 06:37:47', '2021-05-12 06:37:47', '????????'),
	(6, '????????????????????????dsad', '???? ?????????? ????????????????', '5565656565', 'xasxas', '24452', NULL, NULL, '21326', '655665', '5525225', 1, NULL, '2021-05-12 13:11:47', '2021-05-12 13:11:47', '????????'),
	(7, '????????????????????????', '???? ?????????? ????????????????', '5565656565', 'xasxas', '245242', NULL, NULL, '565165', '655665', '25452', 1, NULL, '2021-05-12 13:24:39', '2021-05-12 13:24:39', '????????'),
	(8, 'fersfferf', 'fesfesf', '5242452', 'huk', '656565', NULL, NULL, '52252', '25224525', '25252525', 1, NULL, '2021-05-12 15:23:50', '2021-05-12 15:23:50', '????????'),
	(9, '????????????????????????dsad', '?????????? ????????????????????????', '5565656565', 'gfgf', '245242', NULL, NULL, '21326', '486565', '5525225', 1, NULL, '2021-05-12 15:30:45', '2021-05-12 15:30:45', '????????'),
	(10, '????????????????????????', '???? ?????????? ????????????????', '5588745', 'xasxas', '245242', NULL, NULL, '21326889', '655665', '5742542', 1, NULL, '2021-05-12 15:50:14', '2021-05-12 15:50:14', '????????'),
	(11, '????????????????????????dsad', '?????????? ????????????????????????', '5565656565', 'xasxas', '245242', NULL, NULL, '25424', '655665', '52552', 1, NULL, '2021-05-12 16:08:40', '2021-05-12 16:08:40', '????????'),
	(12, '????????????????????????dsad', '?????????? ????????????????????????', '5242452', 'xasxas', '245242', NULL, NULL, '52252', '655665', '666655', 1, NULL, '2021-05-14 09:15:35', '2021-05-14 09:15:35', '????????');
/*!40000 ALTER TABLE `zaemshiks` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.zalogodatels
CREATE TABLE IF NOT EXISTS `zalogodatels` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checking_account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mfo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_id` int(11) NOT NULL,
  `oked` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.zalogodatels: ~0 rows (approximately)
DELETE FROM `zalogodatels`;
/*!40000 ALTER TABLE `zalogodatels` DISABLE KEYS */;
/*!40000 ALTER TABLE `zalogodatels` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.zalog_imushestvos
CREATE TABLE IF NOT EXISTS `zalog_imushestvos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `dogovor_lizing_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insurance_from` date NOT NULL,
  `insurance_to` date NOT NULL,
  `plans` tinyint(1) NOT NULL DEFAULT '0',
  `plans_percent` int(11) DEFAULT NULL,
  `total_insurance_cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '?????????? ?????????????????? ??????????????????',
  `zalog_otvet_litso` int(11) NOT NULL COMMENT '?????????????????????????? ????????',
  `date_of_issue_police` date NOT NULL COMMENT '???????? ???????????? ???????????????????? ???????????? (??????????????)',
  `policy_series_id` int(11) NOT NULL COMMENT '???????????????? ?????????? ???????????? ?????????????????????? (????????)',
  `place_of_insurance` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '?????????? ??????????????????????',
  `currency_of_mutual` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '???????????? ????????????????????????????',
  `insurance_amount_for_closed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '?????????????????? ?????????? ?????? ?????????????????? ???????????? ?? ?????????? ??????????????',
  `insurance_amount_for_open` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '?????????????????? ?????????? ?????? ?????????????????? ???????????? ?? ?????????? ??????????????',
  `strahovaya_purpose_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '?????????????????? ???????????? (????????)',
  `poryadok_oplaty_premii_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '?????????????? ???????????? ?????????????????? ???????????? (????????)',
  `franshiza_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '% ???? ?????????????????? ?????????? ???? ?????????? ?????????????????????????? ?? ???????????? ???? ?????????????? ???????????? ??/?????? ???? ???????? ?????????????? ?? ???????????????????? ?????????????? ???????????????????? ????????????',
  `franshiza_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '% ???? ?????????????????? ?????????? ???? ?????????? ???????????????????????????? ???????????????? ?????????????? ?????? ???? ?????????????? ???????????? ??/?????? ???? ???????? ?????????????? ?? ???????????????????? ?????????????? ???????????????????? ????????????',
  `franshiza_3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '% ???? ?????????????????? ?????????? ???? ???????????? ???????????? ???? ?????????????? ???????????? ??/?????? ???? ???????? ?????????????? ?? ???????????????????? ?????????????? ???????????????????? ????????????',
  `strahovaya_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strahovaya_purpose` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `franshiza` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currencies` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poryadok_oplaty_premii` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sposob_rascheta` int(11) NOT NULL,
  `serial_number_policy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_issue_policy` date NOT NULL,
  `otvet_litso` int(11) NOT NULL,
  `anketa_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dogovor_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `polis_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_holder_id` int(11) NOT NULL,
  `policy_beneficiary_id` int(11) NOT NULL,
  `copy_passport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copy_dogovor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copy_spravki` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copy_drugie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.zalog_imushestvos: ~2 rows (approximately)
DELETE FROM `zalog_imushestvos`;
/*!40000 ALTER TABLE `zalog_imushestvos` DISABLE KEYS */;
INSERT INTO `zalog_imushestvos` (`id`, `dogovor_lizing_num`, `insurance_from`, `insurance_to`, `plans`, `plans_percent`, `total_insurance_cost`, `zalog_otvet_litso`, `date_of_issue_police`, `policy_series_id`, `place_of_insurance`, `currency_of_mutual`, `insurance_amount_for_closed`, `insurance_amount_for_open`, `strahovaya_purpose_1`, `poryadok_oplaty_premii_1`, `franshiza_1`, `franshiza_2`, `franshiza_3`, `strahovaya_sum`, `strahovaya_purpose`, `franshiza`, `currencies`, `poryadok_oplaty_premii`, `sposob_rascheta`, `serial_number_policy`, `date_issue_policy`, `otvet_litso`, `anketa_img`, `dogovor_img`, `polis_img`, `policy_holder_id`, `policy_beneficiary_id`, `copy_passport`, `copy_dogovor`, `copy_spravki`, `copy_drugie`, `created_at`, `updated_at`) VALUES
	(1, 'sdvdfvdsvf', '2021-04-06', '2021-04-15', 0, NULL, 'fvsdvdsfv', 1, '2021-04-10', 1, 'sdfvsdvf', 'UZS', 'dsfvsdvfdsfv', 'sdfvdsvf', 'sdfvdfv', '1', '434', '34', '234', '234234234', '234243', '234234', 'UZS', 'transh', 1, '1', '2021-04-10', 1, NULL, NULL, NULL, 63, 22, 'img/ZalogImushestvo/1di0QWAgODRmtFoK9RE35rIrdyxyNtxLqQjnyQo2.pdf', NULL, NULL, NULL, '2021-04-09 14:08:18', '2021-04-09 14:10:55'),
	(2, 'sdvdfvdsvf', '2021-04-08', '2021-04-22', 0, NULL, 'fvsdvdsfv', 2, '2021-04-15', 2, 'sdfvsdvf', 'UZS', '345345', '34534', '345345', '1', '54', '14', '45', '55544544', '324234', '234', 'UZS', 'transh', 1, '1', '2021-04-07', 1, 'img/PolicyHolder/i8AduSZAiZCTUreKa0oxW0OWmUrwsFGFUN1JPs9W.png', 'img/PolicyHolder/bDPyuCeLKjeZ9MMBUyueBjUFLj9SYJl8405KYPIu.jpg', 'img/PolicyHolder/3UD3zbdQNFp8UtFDfeodgb5hGk29qwFKcWFvgkeV.png', 76, 31, 'img/ZalogImushestvo/sFwUtbIUb31UT8MA4jp5msqI0zHSpRpyehSXKsVy.png', 'img/ZalogImushestvo/KzWYBQFlFQoIAjiSj0GqOdQjiL2Hdg5QcscpTuS7.png', 'img/ZalogImushestvo/HIpyEHUe9XYJjEO4Vm5R0puibqoyxuDp2AbbUyVQ.png', 'img/ZalogImushestvo/FVaf9ncwAMLT0Ai0LSijt65Y8TXKkVUiMoqyUcgy.png', '2021-04-10 09:51:20', '2021-04-10 09:52:29');
/*!40000 ALTER TABLE `zalog_imushestvos` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.zalog_imushestvo_infos
CREATE TABLE IF NOT EXISTS `zalog_imushestvo_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name_property` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '???????????????????????? ??????????????????',
  `place_property` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '?????????????????????????????? ??????????????????',
  `date_of_issue_property` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '???????? ????????????',
  `count_property` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '??????-???? ????.',
  `units_property` int(11) NOT NULL COMMENT '?????????????? ??????????????????',
  `insurance_cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '?????????????????? ??????????????????',
  `insurance_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '?????????????????? ??????????',
  `insurance_premium` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '?????????????????? ????????????',
  `zalog_imushestvo_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.zalog_imushestvo_infos: ~2 rows (approximately)
DELETE FROM `zalog_imushestvo_infos`;
/*!40000 ALTER TABLE `zalog_imushestvo_infos` DISABLE KEYS */;
INSERT INTO `zalog_imushestvo_infos` (`id`, `name_property`, `place_property`, `date_of_issue_property`, `count_property`, `units_property`, `insurance_cost`, `insurance_sum`, `insurance_premium`, `zalog_imushestvo_id`, `created_at`, `updated_at`) VALUES
	(3, 'werfrwe', 'fwerfwerfewf', '2021-04-08', '2', 1, '3', '5', '7', 1, '2021-04-09 14:10:55', '2021-04-09 14:10:55'),
	(5, 'werfrwe', 'fwerfwerfewf', '2021-04-09', 'FotTestOnly', 1, '23', '4', '5', 2, '2021-04-10 09:52:29', '2021-04-10 09:52:29');
/*!40000 ALTER TABLE `zalog_imushestvo_infos` ENABLE KEYS */;

-- Dumping structure for table ddgi_test_2.zalog_imushestvo_strah_premiyas
CREATE TABLE IF NOT EXISTS `zalog_imushestvo_strah_premiyas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `prem_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prem_from` date NOT NULL,
  `zalog_imushestvo_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ddgi_test_2.zalog_imushestvo_strah_premiyas: ~3 rows (approximately)
DELETE FROM `zalog_imushestvo_strah_premiyas`;
/*!40000 ALTER TABLE `zalog_imushestvo_strah_premiyas` DISABLE KEYS */;
INSERT INTO `zalog_imushestvo_strah_premiyas` (`id`, `prem_sum`, `prem_from`, `zalog_imushestvo_id`, `created_at`, `updated_at`) VALUES
	(3, '234234', '2021-04-07', 1, '2021-04-09 14:10:55', '2021-04-09 14:10:55'),
	(4, '5555', '2021-04-22', 1, '2021-04-09 14:10:55', '2021-04-09 14:10:55'),
	(6, '234242', '2021-04-23', 2, '2021-04-10 09:52:29', '2021-04-10 09:52:29');
/*!40000 ALTER TABLE `zalog_imushestvo_strah_premiyas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
