-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 12 2021 г., 08:02
-- Версия сервера: 10.3.22-MariaDB-log
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ddgi`
--

-- --------------------------------------------------------

--
-- Структура таблицы `agents`
--

CREATE TABLE `agents` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
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
  `status` tinyint(3) UNSIGNED NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `agents`
--

INSERT INTO `agents` (`id`, `user_id`, `surname`, `name`, `middle_name`, `dob`, `passport_number`, `passport_series`, `job`, `work_start_date`, `work_end_date`, `phone_number`, `address`, `profile_img`, `agent_agreement_img`, `labor_contract`, `firm_contract`, `license`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 'Surname1', 'Name1', 'middlasdc', '2021-01-08', '1231321', 'asas', '2sdfvdsfv', '2020-12-31', '2021-01-07', '4234234234', 'ddfzvdsfvdsfv', NULL, NULL, NULL, NULL, NULL, 0, '2021-01-08', '2021-01-10', NULL),
(2, 3, 'FotTestOnly', 'ahahah', 'asdcsdac', '2021-01-29', 'sdvfdvf', 'adscsadc', 'dascdd', '2021-01-29', '2021-02-05', '5555551234', 'PO Box F', NULL, NULL, NULL, NULL, NULL, 1, '2021-01-29', '2021-01-29', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `banks`
--

CREATE TABLE `banks` (
  `id` int(11) UNSIGNED NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` varchar(150) NOT NULL,
  `filial` varchar(150) NOT NULL,
  `address` varchar(150) NOT NULL,
  `inn` varchar(150) NOT NULL,
  `raschetniy_schet` varchar(150) NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `banks`
--

INSERT INTO `banks` (`id`, `code`, `name`, `filial`, `address`, `inn`, `raschetniy_schet`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'sdfvdsvf', 'sdvfdsvf', 'sdfvdsvf', 'dsfvvdf', 'dsfvdsfv', 'sdfvdv', 1, '2021-01-06 09:54:01', '2021-01-07 20:34:20', '2021-01-07 20:34:20'),
(2, 'sdfvdsvf', 'sdvfdsvf', 'sdfvdsvf', 'dsfvvdf', 'dsfvdsfv', 'sdfvdv', 0, '2021-01-06 09:54:48', '2021-01-06 09:54:48', NULL),
(3, '53543', 'afgsdfg', 'sdgsd', 'sdfgvdsf', 'sdfgsdf', 'sdfgsd', 0, '2021-01-06 10:27:14', '2021-01-07 20:34:04', '2021-01-07 20:34:04'),
(4, 'dfsvsdfv', 'sdvdsvf', 'sdvfdv', 'sdfv', 'sdfv', 'sdfv', 0, '2021-01-06 10:30:15', '2021-02-09 07:38:29', '2021-02-09 07:38:29'),
(5, 'sdfvdsfv', 'sdfv', 'sdvf', 'sdvf', 'sdvf', 'sdvf', 1, '2021-01-06 10:30:39', '2021-01-07 20:33:21', '2021-01-07 20:33:21'),
(6, 'dsfv', 'vsdf', 'sdfv', 'svfvfd', 'sdfv', 'sdvf', 0, '2021-01-06 10:44:45', '2021-01-07 20:32:56', '2021-01-07 20:32:56');

-- --------------------------------------------------------

--
-- Структура таблицы `beneficiaries`
--

CREATE TABLE `beneficiaries` (
  `id` int(11) UNSIGNED NOT NULL,
  `FIO` varchar(250) NOT NULL,
  `address` varchar(150) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `checking_account` varchar(50) NOT NULL,
  `inn` varchar(50) NOT NULL,
  `mfo` varchar(50) NOT NULL,
  `okonx` varchar(50) NOT NULL,
  `bank_id` int(11) UNSIGNED NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='страхователи' ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Структура таблицы `branches`
--

CREATE TABLE `branches` (
  `id` int(11) UNSIGNED NOT NULL,
  `parent_id` int(11) UNSIGNED DEFAULT 0,
  `name` varchar(150) NOT NULL,
  `series` varchar(150) NOT NULL,
  `founded_date` date NOT NULL,
  `region` varchar(150) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `address` varchar(150) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `code_by_office` varchar(100) NOT NULL,
  `code_by_type` varchar(100) NOT NULL,
  `hierarchy` varchar(50) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `branches`
--

INSERT INTO `branches` (`id`, `parent_id`, `name`, `series`, `founded_date`, `region`, `user_id`, `address`, `phone_number`, `type`, `code_by_office`, `code_by_type`, `hierarchy`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'name', 'series', '2021-01-08', 'Бухарская область', 9, 'dfvsdv', '45235325', 'Тип 1', 'sdfvdv', 'sdfvdsv', '33', '2021-01-08', '2021-01-10', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '0 - физ лицо, 1 - юр лицо',
  `name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `mfo` varchar(100) DEFAULT NULL,
  `inn` varchar(100) DEFAULT NULL,
  `bank_id` int(11) UNSIGNED DEFAULT NULL,
  `raschetniy_schet` varchar(100) NOT NULL,
  `passport_series` varchar(100) DEFAULT NULL,
  `passport_number` varchar(100) DEFAULT NULL,
  `passport_given_date` date DEFAULT NULL,
  `passport_given_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `type`, `name`, `middle_name`, `surname`, `address`, `phone_number`, `mfo`, `inn`, `bank_id`, `raschetniy_schet`, `passport_series`, `passport_number`, `passport_given_date`, `passport_given_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 'name', 'middle', 'surname', 'fsvdvf', 'sdfvfdv', 'sdfvsdfv', 'sdfvsdvf', 2, 'sdvfdfsv', 'sdfvdsvf', 'sdfvsdvf', '2021-01-21', 'sdfvsdv', '2021-01-20 21:24:07', '2021-01-20 21:24:07', NULL),
(2, 1, 'sdfvdsfdsfv', NULL, NULL, 'sdvfdsfv', '454353', NULL, NULL, 4, 'sdfvdsvf', NULL, NULL, NULL, NULL, '2021-01-20 21:33:49', '2021-01-20 21:33:49', NULL),
(3, 1, 'sfdvsdfv', NULL, NULL, 'vsdfvdsfv', '23553', NULL, NULL, 4, 'dsfvdsfvdsf', NULL, NULL, NULL, NULL, '2021-01-20 21:35:53', '2021-01-21 00:10:26', '2021-01-21 00:10:26');

-- --------------------------------------------------------

--
-- Структура таблицы `currencies`
--

CREATE TABLE `currencies` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `rate` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `code`, `rate`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Euro', 'EUR', '12000', '2021-01-21 03:42:56', '2021-01-21 03:42:56', NULL),
(2, 'US Dollar', 'USD', '10000', '2021-01-21 04:12:41', '2021-01-21 04:12:41', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `directors`
--

CREATE TABLE `directors` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
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
  `status` tinyint(3) UNSIGNED NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `directors`
--

INSERT INTO `directors` (`id`, `user_id`, `surname`, `name`, `middle_name`, `dob`, `passport_number`, `passport_series`, `work_start_date`, `work_end_date`, `phone_number`, `address`, `profile_img`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 9, 'FotTestOnly3', 'sdfv', 'sdfv', '2021-01-07', '12341234', 'adscsadc', '2021-01-14', NULL, '5555551234', 'PO Box F', NULL, 1, '2021-01-08', '2021-01-10', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `franchise_type`
--

CREATE TABLE `franchise_type` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `franchise_type`
--

INSERT INTO `franchise_type` (`id`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'нет', NULL, NULL, NULL),
(2, 'условная', NULL, NULL, NULL),
(3, 'безусловная', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `group_klass`
--

CREATE TABLE `group_klass` (
  `id` int(11) UNSIGNED NOT NULL,
  `group_id` int(11) UNSIGNED NOT NULL,
  `klass_id` int(11) UNSIGNED NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `group_klass`
--

INSERT INTO `group_klass` (`id`, `group_id`, `klass_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 13, NULL, NULL, NULL),
(2, 6, 14, NULL, NULL, NULL),
(3, 2, 15, NULL, NULL, NULL),
(4, 7, 20, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `kasko`
--

CREATE TABLE `kasko` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` tinyint(3) UNSIGNED NOT NULL COMMENT '0 - физ лицо; 1 - юр лицо',
  `product_id` int(11) UNSIGNED DEFAULT 0,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `reason` varchar(250) DEFAULT NULL COMMENT 'Использование транспортного средства на основании:',
  `geo_zone` varchar(250) DEFAULT NULL COMMENT 'Географическая зона',
  `defect_img` varchar(250) DEFAULT NULL,
  `purpose` varchar(250) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `kasko`
--

INSERT INTO `kasko` (`id`, `type`, `product_id`, `from_date`, `to_date`, `reason`, `geo_zone`, `defect_img`, `purpose`, `created_at`, `updated_at`, `deleted_at`) VALUES
(19, 1, 1, '2021-01-06', '2021-01-13', 'fvsdfv', 'sdfvdsvf', NULL, 'fvdfsgsdfgfgdfgdfg', '2021-01-11', '2021-01-11', NULL),
(20, 1, 1, '2021-01-06', '2021-01-13', 'fvsdfv', 'sdfvdsvf', NULL, 'fvdfsgsdfgfgdfgdfg', '2021-01-11', '2021-01-11', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `kasko_policy_beneficiaries`
--

CREATE TABLE `kasko_policy_beneficiaries` (
  `id` int(11) UNSIGNED NOT NULL,
  `policy_beneficiary_id` int(11) UNSIGNED NOT NULL,
  `kasko_id` int(11) UNSIGNED NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `kasko_policy_beneficiaries`
--

INSERT INTO `kasko_policy_beneficiaries` (`id`, `policy_beneficiary_id`, `kasko_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 13, NULL, NULL, NULL),
(2, 6, 14, NULL, NULL, NULL),
(3, 2, 15, NULL, NULL, NULL),
(4, 7, 20, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `kasko_policy_holders`
--

CREATE TABLE `kasko_policy_holders` (
  `id` int(11) UNSIGNED NOT NULL,
  `policy_holders_id` int(11) UNSIGNED NOT NULL,
  `kasko_id` int(11) UNSIGNED NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `kasko_policy_holders`
--

INSERT INTO `kasko_policy_holders` (`id`, `policy_holders_id`, `kasko_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 2, 12, NULL, NULL, NULL),
(3, 4, 13, NULL, NULL, NULL),
(4, 6, 14, NULL, NULL, NULL),
(5, 7, 15, NULL, NULL, NULL),
(6, 12, 20, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `kasko_policy_informations`
--

CREATE TABLE `kasko_policy_informations` (
  `id` int(11) UNSIGNED NOT NULL,
  `policy_information_id` int(11) UNSIGNED NOT NULL,
  `kasko_id` int(11) UNSIGNED NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `kasko_policy_informations`
--

INSERT INTO `kasko_policy_informations` (`id`, `policy_information_id`, `kasko_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 20, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `klass`
--

CREATE TABLE `klass` (
  `id` int(11) UNSIGNED NOT NULL,
  `code` varchar(200) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `klass`
--

INSERT INTO `klass` (`id`, `code`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '23332', 'Class 1', 'Class 1 has been created just for test', '2021-01-21 04:56:18', '2021-01-21 04:56:18', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2021_01_27_043302_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'show pretensii', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `policies`
--

CREATE TABLE `policies` (
  `id` int(11) UNSIGNED NOT NULL,
  `number` int(11) UNSIGNED NOT NULL,
  `act_number` varchar(50) NOT NULL,
  `client_type` tinyint(3) UNSIGNED NOT NULL,
  `policy_series_id` int(11) UNSIGNED DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `branch_id` int(11) UNSIGNED DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `policies`
--

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

-- --------------------------------------------------------

--
-- Структура таблицы `policies_policy_transfer`
--

CREATE TABLE `policies_policy_transfer` (
  `id` int(11) UNSIGNED NOT NULL,
  `policy_transfer_id` int(11) UNSIGNED NOT NULL,
  `policy_id` int(11) UNSIGNED NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `policies_policy_transfer`
--

INSERT INTO `policies_policy_transfer` (`id`, `policy_transfer_id`, `policy_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 2, 1, NULL, NULL, NULL),
(12, 2, 2, NULL, NULL, NULL),
(13, 2, 3, NULL, NULL, NULL),
(14, 2, 4, NULL, NULL, NULL),
(15, 2, 5, NULL, NULL, NULL),
(16, 2, 6, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `policy_beneficiaries`
--

CREATE TABLE `policy_beneficiaries` (
  `id` int(11) UNSIGNED NOT NULL,
  `FIO` varchar(250) NOT NULL,
  `address` varchar(150) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `checking_account` varchar(50) NOT NULL,
  `inn` varchar(50) NOT NULL,
  `mfo` varchar(50) NOT NULL,
  `okonx` varchar(50) NOT NULL,
  `bank_id` int(11) UNSIGNED NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='страхователи' ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `policy_beneficiaries`
--

INSERT INTO `policy_beneficiaries` (`id`, `FIO`, `address`, `phone_number`, `checking_account`, `inn`, `mfo`, `okonx`, `bank_id`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 'gbebfgb', 'dfgbfdb', 'fdgbdfgb', 'gbdfgbdf', 'gbdfgb', 'dfgbdf', 'gbdfbg', 1, '2021-01-11', '2021-01-11', NULL),
(2, 'gbebfgb', 'dfgbfdb', 'fdgbdfgb', 'gbdfgbdf', 'gbdfgb', 'dfgbdf', 'gbdfbg', 1, '2021-01-11', '2021-01-11', NULL),
(3, 'ФИО выгодоприобретателя', 'Юр адрес выгодоприобретателя', 'Телефон', 'Расчетный счет', 'ИНН', 'МФО', 'ОКОНХ', 1, '2021-01-11', '2021-01-11', NULL),
(4, 'ФИО выгодоприобретателя', 'Юр адрес выгодоприобретателя', 'Телефон', 'Расчетный счет', 'ИНН', 'МФО', 'ОКОНХ', 1, '2021-01-11', '2021-01-11', NULL),
(5, 'ФИО выгодоприобретателя', 'Юр адрес выгодоприобретателя', 'Телефон', 'Расчетный счет', 'ИНН', 'МФО', 'ОКОНХ', 1, '2021-01-11', '2021-01-11', NULL),
(6, 'ФИО выгодоприобретателя', 'Юр адрес выгодоприобретателя', 'Телефон', 'Расчетный счет', 'ИНН', 'МФО', 'ОКОНХ', 1, '2021-01-11', '2021-01-11', NULL),
(7, 'ФИО выгодоприобретателя', 'Юр адрес выгодоприобретателя', 'Телефон', 'Расчетный счет', 'ИНН', 'МФО', 'ОКОНХ', 1, '2021-01-11', '2021-01-11', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `policy_holders`
--

CREATE TABLE `policy_holders` (
  `id` int(11) UNSIGNED NOT NULL,
  `FIO` varchar(250) NOT NULL,
  `address` varchar(150) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `checking_account` varchar(50) NOT NULL,
  `inn` varchar(50) NOT NULL,
  `mfo` varchar(50) NOT NULL,
  `okonx` varchar(50) NOT NULL,
  `bank_id` int(11) UNSIGNED NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='страхователи';

--
-- Дамп данных таблицы `policy_holders`
--

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

-- --------------------------------------------------------

--
-- Структура таблицы `policy_informations`
--

CREATE TABLE `policy_informations` (
  `id` int(11) UNSIGNED NOT NULL,
  `policy_id` int(11) UNSIGNED NOT NULL,
  `policy_series_id` int(11) UNSIGNED NOT NULL,
  `period` varchar(50) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
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
  `additional_is_vihecal_insured` tinyint(3) UNSIGNED DEFAULT NULL,
  `additional_other_insurence_info` varchar(150) DEFAULT NULL,
  `additional_is_death` tinyint(3) UNSIGNED DEFAULT NULL,
  `additional_death_strahovaya_summa` varchar(50) DEFAULT NULL,
  `additiona_death_strahovaya_premiya` varchar(50) DEFAULT NULL,
  `additional_death_franchise` varchar(50) DEFAULT NULL,
  `additional_is_civil` tinyint(3) UNSIGNED DEFAULT NULL,
  `additional_civil_strahovaya_summa` varchar(50) DEFAULT NULL,
  `additional_civil_strahovaya_premiya` varchar(50) DEFAULT NULL,
  `additional_is_accident` tinyint(3) UNSIGNED DEFAULT NULL,
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
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `policy_informations`
--

INSERT INTO `policy_informations` (`id`, `policy_id`, `policy_series_id`, `period`, `user_id`, `line_id`, `brand`, `model`, `modification`, `gov_number`, `tech_passport`, `engine_number`, `carcase_number`, `payload`, `seats_number`, `polnaya_strahovaya_stoimost`, `polnaya_strahovaya_summa`, `polnaya_strahovaya_premiya`, `additional_brand`, `additional_equipment`, `additional_serial_number`, `additional_strahovaya_summa`, `additional_terr_vehical`, `additional_terr_insured`, `additional_terr_evacuation`, `additional_is_vihecal_insured`, `additional_other_insurence_info`, `additional_is_death`, `additional_death_strahovaya_summa`, `additiona_death_strahovaya_premiya`, `additional_death_franchise`, `additional_is_civil`, `additional_civil_strahovaya_summa`, `additional_civil_strahovaya_premiya`, `additional_is_accident`, `additional_accident_driver_strahovaya_summa`, `additional_accident_driver_strahovaya_premiya`, `additional_accident_pessanger_number`, `additional_accident_pessanger_strahovaya_summa_per`, `additional_accident_pessanger_strahovaya_summa`, `additional_accident_pessanger_strahovaya_premiya`, `additional_accident_limit_number`, `additional_accident_limit_strahovaya_summa_per`, `additional_accident_limit_strahovaya_summa`, `additional_accident_limit_strahovaya_premiya`, `additional_limit`, `additional_policy_from_date`, `additional_strahovaya_premiya_currency`, `additional_poryadok_oplati_currency`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'regreb', 1, 'ertgretg', 'ertgre', 'grtg', 'ertgrt', 'rt', 'tgtertger', 'ertgretg', 'ertgetr', 'ertgertg', '252352345', '2343455', '12572901', NULL, 'vrfvdf', 'dsfvdfv', 'sdfvdsfv', '34523', '23452', '2345', '2345245', 1, 'fvdsvdfvsdfv', 1, '234523', '3245235', '3245235', 1, '2345235', '234525', 1, '2345235', '345', '2345', '1', '2345', '234', '1234', '1234', '1522756', '213', '1314124124', NULL, 'Сум', 'Сум', '2021-01-11', '2021-01-11', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `policy_registrations`
--

CREATE TABLE `policy_registrations` (
  `id` int(11) UNSIGNED NOT NULL,
  `act_number` varchar(50) NOT NULL,
  `act_date` date DEFAULT NULL,
  `from_number` varchar(50) DEFAULT NULL,
  `to_number` varchar(50) DEFAULT NULL,
  `policy_series_id` int(11) UNSIGNED DEFAULT NULL,
  `document` varchar(150) DEFAULT NULL,
  `client_type` tinyint(3) UNSIGNED NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `policy_registrations`
--

INSERT INTO `policy_registrations` (`id`, `act_number`, `act_date`, `from_number`, `to_number`, `policy_series_id`, `document`, `client_type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'asdvvd', '2021-01-09', '101', '140', 1, 'C:\\Users\\User\\AppData\\Local\\Temp\\php1FD7.tmp', 0, '2021-01-09', '2021-01-09', NULL),
(2, 'asdvvd', '2021-01-09', '141', '150', 1, 'C:\\Users\\User\\AppData\\Local\\Temp\\php251F.tmp', 0, '2021-01-09', '2021-01-09', NULL),
(3, 'asdvvd', '2021-01-09', '141', '150', 0, 'C:\\Users\\User\\AppData\\Local\\Temp\\php2D49.tmp', 0, '2021-01-09', '2021-01-09', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `policy_series`
--

CREATE TABLE `policy_series` (
  `id` int(11) UNSIGNED NOT NULL,
  `code` varchar(50) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `policy_series`
--

INSERT INTO `policy_series` (`id`, `code`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2342345555AA', '2021-01-08', '2021-01-21', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `policy_transfer`
--

CREATE TABLE `policy_transfer` (
  `id` int(11) UNSIGNED NOT NULL,
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
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `policy_transfer`
--

INSERT INTO `policy_transfer` (`id`, `act_number`, `act_date`, `branch_id`, `policy_series_id`, `policy_from`, `policy_to`, `retransfer_distribution`, `act_file`, `transfer_given`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'asdvvd', '2021-01-11', 1, 1, '141', '146', '2021-01-11', 'C:\\Users\\User\\AppData\\Local\\Temp\\php40F.tmp', 'sdfvdsfv', '2021-01-11', '2021-01-11', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `pretensii`
--

CREATE TABLE `pretensii` (
  `id` int(11) UNSIGNED NOT NULL,
  `pretensii_status_id` int(11) UNSIGNED DEFAULT NULL,
  `case_number` int(11) UNSIGNED NOT NULL,
  `insurer` varchar(50) DEFAULT NULL,
  `branch_id` int(11) UNSIGNED DEFAULT NULL,
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
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pretensii`
--

INSERT INTO `pretensii` (`id`, `pretensii_status_id`, `case_number`, `insurer`, `branch_id`, `insurance_contract`, `client_type`, `insurence_type`, `insurence_period`, `insured_sum`, `payable_by_agreement`, `actually_paid`, `last_payment_date`, `franchise_type_id`, `deductible_amount`, `franchise_percentage`, `reinsurance`, `date_applications`, `date_of_the_insured_event`, `event_description`, `object_description`, `region`, `district`, `claimed_loss_sum`, `refund_paid_sum`, `currency_exchange_rate`, `total_amount_in_sums`, `date_of_payment_compensation`, `final_settlement_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, 'insured', 1, 'insurance-contract', 1, 'kasko', NULL, '5000', '5000', '3000', NULL, '1', '3000', '50', 'vsdvsdvf', NULL, NULL, 'description-of-the-insured-event', 'description-of-the-insurance-object', 'pretensii-region 2', 'pretensii-district 2', '5000', '5000', '5000', '5000', NULL, NULL, '2021-01-29 03:42:22', '2021-02-01 01:26:57', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `pretensii_overview`
--

CREATE TABLE `pretensii_overview` (
  `id` int(11) UNSIGNED NOT NULL,
  `pretensii_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `passed` tinyint(3) UNSIGNED NOT NULL COMMENT '1 - прошел ; 0 - не прошел',
  `comment` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='рассмотр претензии';

--
-- Дамп данных таблицы `pretensii_overview`
--

INSERT INTO `pretensii_overview` (`id`, `pretensii_id`, `user_id`, `passed`, `comment`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 4, 1, 'comment here', '2021-01-31 23:49:15', '2021-01-31 23:49:15', NULL),
(2, 1, 3, 0, 'comment here 3', '2021-02-01 00:52:03', '2021-02-01 01:15:44', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `pretensii_status`
--

CREATE TABLE `pretensii_status` (
  `id` int(11) UNSIGNED NOT NULL,
  `status` varchar(50) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pretensii_status`
--

INSERT INTO `pretensii_status` (`id`, `status`, `code`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'на рассмотрении', 'in progress', NULL, NULL, NULL),
(2, 'отклонен', 'declined', NULL, NULL, NULL),
(3, 'принят', 'accepted', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `requests`
--

CREATE TABLE `requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_whom` int(11) NOT NULL,
  `status` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_of_request` datetime NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `series` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `act_number` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `limit_reason` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_blank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `polis_quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `requests`
--

INSERT INTO `requests` (`id`, `from_whom`, `status`, `comments`, `data_of_request`, `file`, `series`, `act_number`, `limit_reason`, `policy_blank`, `polis_quantity`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 11, 'defective', 'Sit earum ullamco si', '2021-02-11 06:57:56', '', 'Deleniti ut maxime m', '386', NULL, NULL, 3434, '2021-02-11 13:43:42', '2021-02-11 13:57:56', NULL),
(2, 11, 'policy_transfer', 'Libero quae quia sin', '2021-02-11 06:54:07', '', 'Cum temporibus in ex', '169', NULL, NULL, 58, '2021-02-11 13:54:07', '2021-02-11 13:54:07', NULL),
(3, 11, 'policy_transfer', 'Qui saepe ipsam aspe', '2021-02-11 07:06:36', '', 'Et sed nobis nostrum', '3444443', 'Quo non quod ut ut p', '1', 3434, '2021-02-11 14:03:15', '2021-02-11 14:06:36', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test', '2021-02-24 13:18:59', '2021-02-12 13:18:59');

-- --------------------------------------------------------

--
-- Структура таблицы `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'ahahah', 'agent@agent.com', NULL, '$2y$10$Y/DkxsEvpZ0aDlAb7uBSGuQlDiBZWvo0UBiY9KMf.iZiNAzH2./Fa', NULL, '2021-01-29 01:24:33', '2021-01-29 01:36:54'),
(4, 'Name1', 'bobur_moscow1@mail.ru', NULL, '$2y$10$3CzSOxHcSQn6HJOm.ahdHORb50aYP.vJN31VSubEMla8QM7UhZV.a', NULL, '2021-01-07 23:47:43', '2021-01-10 10:01:35'),
(9, 'sdfv', 'directo3r@director.com', NULL, '$2y$10$OYljKvaiPrLd8i9V1Ms4f.PX6SjBouTvqzdbFFGSb9uBbNLHfOCLm', NULL, '2021-01-08 08:10:10', '2021-01-10 11:26:47'),
(11, 'Test', 'admin@admin.com', NULL, '$2y$10$GGooGRuJypB/VHkXsbTIGuv4EPl.6Ckir7DsKOJTW/hsEU9hGN9Si', NULL, '2021-02-08 04:29:48', '2021-02-08 04:29:48');

-- --------------------------------------------------------

--
-- Структура таблицы `views`
--

CREATE TABLE `views` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `beneficiaries`
--
ALTER TABLE `beneficiaries`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `franchise_type`
--
ALTER TABLE `franchise_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `group_klass`
--
ALTER TABLE `group_klass`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `kasko`
--
ALTER TABLE `kasko`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `kasko_policy_beneficiaries`
--
ALTER TABLE `kasko_policy_beneficiaries`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `kasko_policy_holders`
--
ALTER TABLE `kasko_policy_holders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `kasko_policy_informations`
--
ALTER TABLE `kasko_policy_informations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `klass`
--
ALTER TABLE `klass`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Индексы таблицы `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Индексы таблицы `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `policies_policy_transfer`
--
ALTER TABLE `policies_policy_transfer`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `policy_beneficiaries`
--
ALTER TABLE `policy_beneficiaries`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `policy_holders`
--
ALTER TABLE `policy_holders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `policy_informations`
--
ALTER TABLE `policy_informations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `policy_registrations`
--
ALTER TABLE `policy_registrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `policy_series`
--
ALTER TABLE `policy_series`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `policy_transfer`
--
ALTER TABLE `policy_transfer`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pretensii`
--
ALTER TABLE `pretensii`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pretensii_overview`
--
ALTER TABLE `pretensii_overview`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pretensii_status`
--
ALTER TABLE `pretensii_status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `beneficiaries`
--
ALTER TABLE `beneficiaries`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `directors`
--
ALTER TABLE `directors`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `franchise_type`
--
ALTER TABLE `franchise_type`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `group_klass`
--
ALTER TABLE `group_klass`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `kasko`
--
ALTER TABLE `kasko`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `kasko_policy_beneficiaries`
--
ALTER TABLE `kasko_policy_beneficiaries`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `kasko_policy_holders`
--
ALTER TABLE `kasko_policy_holders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `kasko_policy_informations`
--
ALTER TABLE `kasko_policy_informations`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `klass`
--
ALTER TABLE `klass`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `policies`
--
ALTER TABLE `policies`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `policies_policy_transfer`
--
ALTER TABLE `policies_policy_transfer`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `policy_beneficiaries`
--
ALTER TABLE `policy_beneficiaries`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `policy_holders`
--
ALTER TABLE `policy_holders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `policy_informations`
--
ALTER TABLE `policy_informations`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `policy_registrations`
--
ALTER TABLE `policy_registrations`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `policy_series`
--
ALTER TABLE `policy_series`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `policy_transfer`
--
ALTER TABLE `policy_transfer`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `pretensii`
--
ALTER TABLE `pretensii`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `pretensii_overview`
--
ALTER TABLE `pretensii_overview`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `pretensii_status`
--
ALTER TABLE `pretensii_status`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `requests`
--
ALTER TABLE `requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `views`
--
ALTER TABLE `views`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
