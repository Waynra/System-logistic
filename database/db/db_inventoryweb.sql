/*
SQLyog Professional v12.5.1 (64 bit)
MySQL - 10.4.27-MariaDB : Database - db_inventoryweb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_inventoryweb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `db_inventoryweb`;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2019_08_19_000000_create_failed_jobs_table',1),
(2,'2019_12_14_000001_create_personal_access_tokens_table',1),
(3,'2022_10_31_061811_create_menu_table',1),
(4,'2022_11_01_041110_create_table_role',1),
(5,'2022_11_01_083314_create_table_user',1),
(6,'2022_11_03_023905_create_table_submenu',1),
(7,'2022_11_03_064417_create_tbl_akses',1),
(8,'2022_11_08_024215_create_tbl_web',1),
(9,'2022_11_15_131148_create_tbl_jenisbarang',2),
(10,'2022_11_15_173700_create_tbl_satuan',3),
(11,'2022_11_15_180434_create_tbl_merk',4),
(12,'2022_11_16_120018_create_tbl_appreance',5),
(13,'2022_11_25_141731_create_tbl_barang',6),
(14,'2022_11_26_011349_create_tbl_customer',7),
(16,'2022_11_28_151108_create_tbl_barangmasuk',8),
(17,'2022_11_30_115904_create_tbl_barangkeluar',9);

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `tbl_akses` */

DROP TABLE IF EXISTS `tbl_akses`;

CREATE TABLE `tbl_akses` (
  `akses_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` varchar(255) DEFAULT NULL,
  `submenu_id` varchar(255) DEFAULT NULL,
  `othermenu_id` varchar(255) DEFAULT NULL,
  `role_id` varchar(255) NOT NULL,
  `akses_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`akses_id`)
) ENGINE=InnoDB AUTO_INCREMENT=932 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_akses` */

insert  into `tbl_akses`(`akses_id`,`menu_id`,`submenu_id`,`othermenu_id`,`role_id`,`akses_type`,`created_at`,`updated_at`) values 
(368,'1667444041',NULL,NULL,'3','view','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(369,'1667444041',NULL,NULL,'3','create','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(370,'1667444041',NULL,NULL,'3','update','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(371,'1667444041',NULL,NULL,'3','delete','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(372,'1668509889',NULL,NULL,'3','view','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(373,'1668509889',NULL,NULL,'3','create','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(374,'1668509889',NULL,NULL,'3','update','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(375,'1668509889',NULL,NULL,'3','delete','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(376,'1668510437',NULL,NULL,'3','view','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(377,'1668510437',NULL,NULL,'3','create','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(378,'1668510437',NULL,NULL,'3','update','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(379,'1668510437',NULL,NULL,'3','delete','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(381,'1668510568',NULL,NULL,'3','create','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(382,'1668510568',NULL,NULL,'3','update','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(383,'1668510568',NULL,NULL,'3','delete','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(384,NULL,'9',NULL,'3','view','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(385,NULL,'9',NULL,'3','create','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(386,NULL,'9',NULL,'3','update','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(387,NULL,'9',NULL,'3','delete','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(392,NULL,'17',NULL,'3','view','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(393,NULL,'17',NULL,'3','create','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(394,NULL,'17',NULL,'3','update','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(395,NULL,'17',NULL,'3','delete','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(396,NULL,'10',NULL,'3','view','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(397,NULL,'10',NULL,'3','create','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(398,NULL,'10',NULL,'3','update','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(399,NULL,'10',NULL,'3','delete','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(404,NULL,'18',NULL,'3','view','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(405,NULL,'18',NULL,'3','create','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(406,NULL,'18',NULL,'3','update','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(407,NULL,'18',NULL,'3','delete','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(408,NULL,'19',NULL,'3','view','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(409,NULL,'19',NULL,'3','create','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(410,NULL,'19',NULL,'3','update','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(411,NULL,'19',NULL,'3','delete','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(412,NULL,'20',NULL,'3','view','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(413,NULL,'20',NULL,'3','create','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(414,NULL,'20',NULL,'3','update','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(415,NULL,'20',NULL,'3','delete','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(417,NULL,NULL,'2','3','view','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(418,NULL,NULL,'3','3','view','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(419,NULL,NULL,'4','3','view','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(420,NULL,NULL,'5','3','view','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(421,NULL,NULL,'6','3','view','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(422,NULL,NULL,'1','3','create','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(423,NULL,NULL,'2','3','create','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(424,NULL,NULL,'3','3','create','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(425,NULL,NULL,'4','3','create','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(426,NULL,NULL,'5','3','create','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(427,NULL,NULL,'6','3','create','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(428,NULL,NULL,'1','3','update','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(429,NULL,NULL,'2','3','update','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(430,NULL,NULL,'3','3','update','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(431,NULL,NULL,'4','3','update','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(432,NULL,NULL,'5','3','update','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(433,NULL,NULL,'6','3','update','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(434,NULL,NULL,'1','3','delete','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(435,NULL,NULL,'2','3','delete','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(436,NULL,NULL,'3','3','delete','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(437,NULL,NULL,'4','3','delete','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(438,NULL,NULL,'5','3','delete','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(439,NULL,NULL,'6','3','delete','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(448,'1669390641',NULL,NULL,'3','view','2022-11-25 15:38:49','2022-11-25 15:38:49'),
(449,'1669390641',NULL,NULL,'3','create','2022-11-25 15:38:55','2022-11-25 15:38:55'),
(450,'1669390641',NULL,NULL,'3','update','2022-11-25 15:38:55','2022-11-25 15:38:55'),
(451,'1669390641',NULL,NULL,'3','delete','2022-11-25 15:38:57','2022-11-25 15:38:57'),
(488,'1667444041',NULL,NULL,'4','view','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(489,'1667444041',NULL,NULL,'4','create','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(490,'1667444041',NULL,NULL,'4','update','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(491,'1667444041',NULL,NULL,'4','delete','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(493,'1668509889',NULL,NULL,'4','create','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(494,'1668509889',NULL,NULL,'4','update','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(495,'1668509889',NULL,NULL,'4','delete','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(497,'1669390641',NULL,NULL,'4','create','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(498,'1669390641',NULL,NULL,'4','update','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(499,'1669390641',NULL,NULL,'4','delete','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(501,'1668510437',NULL,NULL,'4','create','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(502,'1668510437',NULL,NULL,'4','update','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(503,'1668510437',NULL,NULL,'4','delete','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(504,'1668510568',NULL,NULL,'4','view','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(505,'1668510568',NULL,NULL,'4','create','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(506,'1668510568',NULL,NULL,'4','update','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(507,'1668510568',NULL,NULL,'4','delete','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(508,NULL,'9',NULL,'4','view','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(509,NULL,'9',NULL,'4','create','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(510,NULL,'9',NULL,'4','update','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(511,NULL,'9',NULL,'4','delete','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(512,NULL,'17',NULL,'4','view','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(513,NULL,'17',NULL,'4','create','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(514,NULL,'17',NULL,'4','update','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(515,NULL,'17',NULL,'4','delete','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(520,NULL,'10',NULL,'4','view','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(521,NULL,'10',NULL,'4','create','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(522,NULL,'10',NULL,'4','update','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(523,NULL,'10',NULL,'4','delete','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(524,NULL,'18',NULL,'4','view','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(525,NULL,'18',NULL,'4','create','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(526,NULL,'18',NULL,'4','update','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(527,NULL,'18',NULL,'4','delete','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(532,NULL,'19',NULL,'4','view','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(533,NULL,'19',NULL,'4','create','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(534,NULL,'19',NULL,'4','update','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(535,NULL,'19',NULL,'4','delete','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(540,NULL,'20',NULL,'4','view','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(541,NULL,'20',NULL,'4','create','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(542,NULL,'20',NULL,'4','update','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(543,NULL,'20',NULL,'4','delete','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(545,NULL,NULL,'2','4','view','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(546,NULL,NULL,'3','4','view','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(547,NULL,NULL,'4','4','view','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(548,NULL,NULL,'5','4','view','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(549,NULL,NULL,'6','4','view','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(550,NULL,NULL,'1','4','create','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(551,NULL,NULL,'2','4','create','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(552,NULL,NULL,'3','4','create','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(553,NULL,NULL,'4','4','create','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(554,NULL,NULL,'5','4','create','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(555,NULL,NULL,'6','4','create','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(556,NULL,NULL,'1','4','update','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(557,NULL,NULL,'2','4','update','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(558,NULL,NULL,'3','4','update','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(559,NULL,NULL,'4','4','update','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(560,NULL,NULL,'5','4','update','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(561,NULL,NULL,'6','4','update','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(562,NULL,NULL,'1','4','delete','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(563,NULL,NULL,'2','4','delete','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(564,NULL,NULL,'3','4','delete','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(565,NULL,NULL,'4','4','delete','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(566,NULL,NULL,'5','4','delete','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(567,NULL,NULL,'6','4','delete','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(736,'1719026271',NULL,NULL,'3','view','2024-06-22 03:20:41','2024-06-22 03:20:41'),
(737,'1719026271',NULL,NULL,'3','create','2024-06-22 03:20:56','2024-06-22 03:20:56'),
(738,'1719026271',NULL,NULL,'3','update','2024-06-22 03:20:57','2024-06-22 03:20:57'),
(739,'1719026271',NULL,NULL,'3','delete','2024-06-22 03:20:58','2024-06-22 03:20:58'),
(740,'1667444041',NULL,NULL,'1','view','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(741,'1667444041',NULL,NULL,'1','create','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(742,'1667444041',NULL,NULL,'1','update','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(743,'1667444041',NULL,NULL,'1','delete','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(744,'1668509889',NULL,NULL,'1','view','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(745,'1668509889',NULL,NULL,'1','create','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(746,'1668509889',NULL,NULL,'1','update','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(747,'1668509889',NULL,NULL,'1','delete','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(748,'1669390641',NULL,NULL,'1','view','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(749,'1669390641',NULL,NULL,'1','create','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(750,'1669390641',NULL,NULL,'1','update','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(751,'1669390641',NULL,NULL,'1','delete','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(752,'1668510437',NULL,NULL,'1','view','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(753,'1668510437',NULL,NULL,'1','create','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(754,'1668510437',NULL,NULL,'1','update','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(755,'1668510437',NULL,NULL,'1','delete','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(756,'1719026271',NULL,NULL,'1','view','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(757,'1719026271',NULL,NULL,'1','create','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(758,'1719026271',NULL,NULL,'1','update','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(759,'1719026271',NULL,NULL,'1','delete','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(760,'1668510568',NULL,NULL,'1','view','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(761,'1668510568',NULL,NULL,'1','create','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(762,'1668510568',NULL,NULL,'1','update','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(763,'1668510568',NULL,NULL,'1','delete','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(764,NULL,'9',NULL,'1','view','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(765,NULL,'9',NULL,'1','create','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(766,NULL,'9',NULL,'1','update','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(767,NULL,'9',NULL,'1','delete','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(768,NULL,'17',NULL,'1','view','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(769,NULL,'17',NULL,'1','create','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(770,NULL,'17',NULL,'1','update','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(771,NULL,'17',NULL,'1','delete','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(772,NULL,'24',NULL,'1','view','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(773,NULL,'24',NULL,'1','create','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(774,NULL,'24',NULL,'1','update','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(775,NULL,'24',NULL,'1','delete','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(776,NULL,'10',NULL,'1','view','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(777,NULL,'10',NULL,'1','create','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(778,NULL,'10',NULL,'1','update','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(779,NULL,'10',NULL,'1','delete','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(780,NULL,'18',NULL,'1','view','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(781,NULL,'18',NULL,'1','create','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(782,NULL,'18',NULL,'1','update','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(783,NULL,'18',NULL,'1','delete','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(784,NULL,'25',NULL,'1','view','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(785,NULL,'25',NULL,'1','create','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(786,NULL,'25',NULL,'1','update','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(787,NULL,'25',NULL,'1','delete','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(788,NULL,'19',NULL,'1','view','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(789,NULL,'19',NULL,'1','create','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(790,NULL,'19',NULL,'1','update','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(791,NULL,'19',NULL,'1','delete','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(792,NULL,'26',NULL,'1','view','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(793,NULL,'26',NULL,'1','create','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(794,NULL,'26',NULL,'1','update','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(795,NULL,'26',NULL,'1','delete','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(796,NULL,'20',NULL,'1','view','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(797,NULL,'20',NULL,'1','create','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(798,NULL,'20',NULL,'1','update','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(799,NULL,'20',NULL,'1','delete','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(800,NULL,'27',NULL,'1','view','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(801,NULL,'27',NULL,'1','create','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(802,NULL,'27',NULL,'1','update','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(803,NULL,'27',NULL,'1','delete','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(804,NULL,NULL,'1','1','view','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(805,NULL,NULL,'2','1','view','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(806,NULL,NULL,'3','1','view','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(807,NULL,NULL,'4','1','view','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(808,NULL,NULL,'5','1','view','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(809,NULL,NULL,'6','1','view','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(810,NULL,NULL,'1','1','create','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(811,NULL,NULL,'2','1','create','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(812,NULL,NULL,'3','1','create','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(813,NULL,NULL,'4','1','create','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(814,NULL,NULL,'5','1','create','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(815,NULL,NULL,'6','1','create','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(816,NULL,NULL,'1','1','update','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(817,NULL,NULL,'2','1','update','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(818,NULL,NULL,'3','1','update','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(819,NULL,NULL,'4','1','update','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(820,NULL,NULL,'5','1','update','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(821,NULL,NULL,'6','1','update','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(822,NULL,NULL,'1','1','delete','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(823,NULL,NULL,'2','1','delete','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(824,NULL,NULL,'3','1','delete','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(825,NULL,NULL,'4','1','delete','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(826,NULL,NULL,'5','1','delete','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(827,NULL,NULL,'6','1','delete','2024-06-22 04:08:01','2024-06-22 04:08:01'),
(828,'1667444041',NULL,NULL,'2','view','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(829,'1667444041',NULL,NULL,'2','create','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(830,'1667444041',NULL,NULL,'2','update','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(831,'1667444041',NULL,NULL,'2','delete','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(832,'1668509889',NULL,NULL,'2','view','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(833,'1668509889',NULL,NULL,'2','create','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(834,'1668509889',NULL,NULL,'2','update','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(835,'1668509889',NULL,NULL,'2','delete','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(836,'1669390641',NULL,NULL,'2','view','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(837,'1669390641',NULL,NULL,'2','create','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(838,'1669390641',NULL,NULL,'2','update','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(839,'1669390641',NULL,NULL,'2','delete','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(840,'1668510437',NULL,NULL,'2','view','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(841,'1668510437',NULL,NULL,'2','create','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(842,'1668510437',NULL,NULL,'2','update','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(843,'1668510437',NULL,NULL,'2','delete','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(844,'1719026271',NULL,NULL,'2','view','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(845,'1719026271',NULL,NULL,'2','create','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(846,'1719026271',NULL,NULL,'2','update','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(847,'1719026271',NULL,NULL,'2','delete','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(848,'1668510568',NULL,NULL,'2','view','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(849,'1668510568',NULL,NULL,'2','create','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(850,'1668510568',NULL,NULL,'2','update','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(851,'1668510568',NULL,NULL,'2','delete','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(852,NULL,'9',NULL,'2','view','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(853,NULL,'9',NULL,'2','create','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(854,NULL,'9',NULL,'2','update','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(855,NULL,'9',NULL,'2','delete','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(856,NULL,'17',NULL,'2','view','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(857,NULL,'17',NULL,'2','create','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(858,NULL,'17',NULL,'2','update','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(859,NULL,'17',NULL,'2','delete','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(860,NULL,'24',NULL,'2','view','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(861,NULL,'24',NULL,'2','create','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(862,NULL,'24',NULL,'2','update','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(863,NULL,'24',NULL,'2','delete','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(864,NULL,'10',NULL,'2','view','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(865,NULL,'10',NULL,'2','create','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(866,NULL,'10',NULL,'2','update','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(867,NULL,'10',NULL,'2','delete','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(868,NULL,'18',NULL,'2','view','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(869,NULL,'18',NULL,'2','create','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(870,NULL,'18',NULL,'2','update','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(871,NULL,'18',NULL,'2','delete','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(872,NULL,'25',NULL,'2','view','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(873,NULL,'25',NULL,'2','create','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(874,NULL,'25',NULL,'2','update','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(875,NULL,'25',NULL,'2','delete','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(876,NULL,'19',NULL,'2','view','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(877,NULL,'19',NULL,'2','create','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(878,NULL,'19',NULL,'2','update','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(879,NULL,'19',NULL,'2','delete','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(880,NULL,'26',NULL,'2','view','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(881,NULL,'26',NULL,'2','create','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(882,NULL,'26',NULL,'2','update','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(883,NULL,'26',NULL,'2','delete','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(884,NULL,'20',NULL,'2','view','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(885,NULL,'20',NULL,'2','create','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(886,NULL,'20',NULL,'2','update','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(887,NULL,'20',NULL,'2','delete','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(888,NULL,'27',NULL,'2','view','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(889,NULL,'27',NULL,'2','create','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(890,NULL,'27',NULL,'2','update','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(891,NULL,'27',NULL,'2','delete','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(892,NULL,NULL,'1','2','view','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(893,NULL,NULL,'2','2','view','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(894,NULL,NULL,'3','2','view','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(895,NULL,NULL,'4','2','view','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(897,NULL,NULL,'6','2','view','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(898,NULL,NULL,'1','2','create','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(899,NULL,NULL,'2','2','create','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(900,NULL,NULL,'3','2','create','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(901,NULL,NULL,'4','2','create','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(902,NULL,NULL,'5','2','create','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(903,NULL,NULL,'6','2','create','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(904,NULL,NULL,'1','2','update','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(905,NULL,NULL,'2','2','update','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(906,NULL,NULL,'3','2','update','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(907,NULL,NULL,'4','2','update','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(908,NULL,NULL,'5','2','update','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(909,NULL,NULL,'6','2','update','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(910,NULL,NULL,'1','2','delete','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(911,NULL,NULL,'2','2','delete','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(912,NULL,NULL,'3','2','delete','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(913,NULL,NULL,'4','2','delete','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(914,NULL,NULL,'5','2','delete','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(915,NULL,NULL,'6','2','delete','2024-06-22 04:09:10','2024-06-22 04:09:10'),
(916,NULL,'25',NULL,'4','view','2024-06-22 04:09:56','2024-06-22 04:09:56'),
(917,NULL,'26',NULL,'4','view','2024-06-22 04:09:56','2024-06-22 04:09:56'),
(918,NULL,'27',NULL,'4','view','2024-06-22 04:09:57','2024-06-22 04:09:57'),
(919,NULL,'24',NULL,'4','view','2024-06-22 04:10:11','2024-06-22 04:10:11'),
(920,NULL,'24',NULL,'4','create','2024-06-22 04:10:26','2024-06-22 04:10:26'),
(921,NULL,'25',NULL,'4','create','2024-06-22 04:10:28','2024-06-22 04:10:28'),
(922,NULL,'26',NULL,'4','create','2024-06-22 04:10:29','2024-06-22 04:10:29'),
(923,NULL,'27',NULL,'4','create','2024-06-22 04:10:31','2024-06-22 04:10:31'),
(924,NULL,'27',NULL,'4','update','2024-06-22 04:10:32','2024-06-22 04:10:32'),
(925,NULL,'26',NULL,'4','update','2024-06-22 04:10:32','2024-06-22 04:10:32'),
(926,NULL,'25',NULL,'4','update','2024-06-22 04:10:33','2024-06-22 04:10:33'),
(927,NULL,'24',NULL,'4','update','2024-06-22 04:10:34','2024-06-22 04:10:34'),
(928,NULL,'24',NULL,'4','delete','2024-06-22 04:10:35','2024-06-22 04:10:35'),
(929,NULL,'25',NULL,'4','delete','2024-06-22 04:10:35','2024-06-22 04:10:35'),
(930,NULL,'26',NULL,'4','delete','2024-06-22 04:10:36','2024-06-22 04:10:36'),
(931,NULL,'27',NULL,'4','delete','2024-06-22 04:10:36','2024-06-22 04:10:36');

/*Table structure for table `tbl_appreance` */

DROP TABLE IF EXISTS `tbl_appreance`;

CREATE TABLE `tbl_appreance` (
  `appreance_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `appreance_layout` varchar(255) DEFAULT NULL,
  `appreance_theme` varchar(255) DEFAULT NULL,
  `appreance_menu` varchar(255) DEFAULT NULL,
  `appreance_header` varchar(255) DEFAULT NULL,
  `appreance_sidestyle` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`appreance_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_appreance` */

insert  into `tbl_appreance`(`appreance_id`,`user_id`,`appreance_layout`,`appreance_theme`,`appreance_menu`,`appreance_header`,`appreance_sidestyle`,`created_at`,`updated_at`) values 
(2,'1','sidebar-mini','light-mode','light-menu','header-light','default-menu','2022-11-22 09:45:47','2022-11-24 13:00:20');

/*Table structure for table `tbl_barang` */

DROP TABLE IF EXISTS `tbl_barang`;

CREATE TABLE `tbl_barang` (
  `barang_id` int(255) NOT NULL AUTO_INCREMENT,
  `jenisbarang_id` varchar(255) DEFAULT NULL,
  `satuan_id` varchar(255) DEFAULT NULL,
  `merk_id` varchar(255) DEFAULT NULL,
  `barang_kode` varchar(255) NOT NULL,
  `barang_nama` varchar(255) NOT NULL,
  `barang_slug` varchar(255) DEFAULT NULL,
  `barang_harga` varchar(255) NOT NULL,
  `barang_stok` varchar(255) NOT NULL,
  `barang_gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`barang_id`,`barang_kode`,`barang_nama`,`barang_harga`,`barang_stok`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tbl_barang` */

insert  into `tbl_barang`(`barang_id`,`jenisbarang_id`,`satuan_id`,`merk_id`,`barang_kode`,`barang_nama`,`barang_slug`,`barang_harga`,`barang_stok`,`barang_gambar`,`created_at`,`updated_at`) values 
(5,'12','7','2','BRG-1669390175622','Motherboard','motherboard','4000000','0','image.png','2022-11-25 15:30:12','2022-11-25 15:30:12'),
(6,'13','1','7','BRG-1669390220236','Baut 24mm','baut-24mm','1000000','0','image.png','2022-11-25 15:30:50','2022-11-29 14:30:37');

/*Table structure for table `tbl_barangkeluar` */

DROP TABLE IF EXISTS `tbl_barangkeluar`;

CREATE TABLE `tbl_barangkeluar` (
  `bk_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bk_kode` varchar(255) NOT NULL,
  `barang_kode` varchar(255) NOT NULL,
  `bk_tanggal` varchar(255) NOT NULL,
  `bk_tujuan` varchar(255) DEFAULT NULL,
  `bk_jumlah` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`bk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_barangkeluar` */

insert  into `tbl_barangkeluar`(`bk_id`,`bk_kode`,`barang_kode`,`bk_tanggal`,`bk_tujuan`,`bk_jumlah`,`created_at`,`updated_at`) values 
(2,'BK-1669811950758','BRG-1669390220236','2022-11-01','Gudang Tasikmalaya','20','2022-11-30 12:39:22','2022-11-30 12:47:14'),
(3,'BK-1669812439198','BRG-1669390175622','2022-11-02','Gudang Prindapan','5','2022-11-30 12:47:39','2023-07-26 04:18:25');

/*Table structure for table `tbl_barangmasuk` */

DROP TABLE IF EXISTS `tbl_barangmasuk`;

CREATE TABLE `tbl_barangmasuk` (
  `bm_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bm_kode` varchar(255) NOT NULL,
  `barang_kode` varchar(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `bm_tanggal` varchar(255) NOT NULL,
  `bm_jumlah` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`bm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_barangmasuk` */

insert  into `tbl_barangmasuk`(`bm_id`,`bm_kode`,`barang_kode`,`customer_id`,`bm_tanggal`,`bm_jumlah`,`created_at`,`updated_at`) values 
(1,'BM-1669730554623','BRG-1669390220236','2','2022-11-01','50','2022-11-29 14:02:43','2022-11-29 14:20:13'),
(2,'BM-1669731639801','BRG-1669390175622','2','2022-11-30','10','2022-11-29 14:20:55','2022-11-29 14:20:55');

/*Table structure for table `tbl_customer` */

DROP TABLE IF EXISTS `tbl_customer`;

CREATE TABLE `tbl_customer` (
  `customer_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_nama` varchar(255) NOT NULL,
  `customer_slug` varchar(255) NOT NULL,
  `customer_alamat` text DEFAULT NULL,
  `customer_notelp` varchar(255) DEFAULT NULL,
  `customer_status` enum('Belum Bayar','Bayar') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_customer` */

insert  into `tbl_customer`(`customer_id`,`customer_nama`,`customer_slug`,`customer_alamat`,`customer_notelp`,`customer_status`,`created_at`,`updated_at`) values 
(2,'Radhian Sobarna','radhian-sobarna','Sumedang','087817379229','Bayar','2022-11-26 01:36:34','2024-06-22 04:22:59');

/*Table structure for table `tbl_jenisbarang` */

DROP TABLE IF EXISTS `tbl_jenisbarang`;

CREATE TABLE `tbl_jenisbarang` (
  `jenisbarang_id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `jenisbarang_nama` varchar(255) NOT NULL,
  `jenisbarang_slug` varchar(255) NOT NULL,
  `jenisbarang_ket` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`jenisbarang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_jenisbarang` */

insert  into `tbl_jenisbarang`(`jenisbarang_id`,`jenisbarang_nama`,`jenisbarang_slug`,`jenisbarang_ket`,`created_at`,`updated_at`) values 
(11,'Elektronik','elektronik',NULL,'2022-11-25 15:24:18','2022-11-25 15:25:39'),
(12,'Perangkat Komputer','perangkat-komputer',NULL,'2022-11-25 15:26:15','2022-11-25 15:27:16'),
(13,'Besi','besi',NULL,'2022-11-25 15:27:33','2022-11-25 15:27:33');

/*Table structure for table `tbl_menu` */

DROP TABLE IF EXISTS `tbl_menu`;

CREATE TABLE `tbl_menu` (
  `menu_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_judul` varchar(255) NOT NULL,
  `menu_slug` varchar(255) NOT NULL,
  `menu_icon` varchar(255) NOT NULL,
  `menu_redirect` varchar(255) NOT NULL,
  `menu_sort` varchar(255) NOT NULL,
  `menu_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1719026272 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_menu` */

insert  into `tbl_menu`(`menu_id`,`menu_judul`,`menu_slug`,`menu_icon`,`menu_redirect`,`menu_sort`,`menu_type`,`created_at`,`updated_at`) values 
(1667444041,'Dashboard','dashboard','home','/dashboard','1','1','2022-11-15 10:51:04','2022-11-15 10:51:04'),
(1668509889,'Master Barang','master-barang','package','-','2','2','2022-11-15 10:58:09','2022-11-15 11:03:15'),
(1668510437,'Transaksi','transaksi','repeat','-','4','2','2022-11-15 11:07:17','2022-11-25 15:37:36'),
(1668510568,'Laporan','laporan','printer','-','6','2','2022-11-15 11:09:28','2024-06-22 03:18:08'),
(1669390641,'Customer','customer','user','/customer','3','1','2022-11-25 15:37:21','2022-11-25 15:37:36'),
(1719026271,'Supir','supir','truck','/supir','5','1','2024-06-22 03:17:51','2024-06-22 03:18:08');

/*Table structure for table `tbl_merk` */

DROP TABLE IF EXISTS `tbl_merk`;

CREATE TABLE `tbl_merk` (
  `merk_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `merk_nama` varchar(255) NOT NULL,
  `merk_slug` varchar(255) NOT NULL,
  `merk_keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`merk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_merk` */

insert  into `tbl_merk`(`merk_id`,`merk_nama`,`merk_slug`,`merk_keterangan`,`created_at`,`updated_at`) values 
(1,'Huawei','huawei',NULL,'2022-11-15 18:14:09','2022-11-15 18:14:09'),
(2,'Lenovo','lenovo',NULL,'2022-11-15 18:14:33','2022-11-15 18:14:45'),
(7,'Steel','steel',NULL,'2022-11-25 15:29:27','2022-11-25 15:29:27');

/*Table structure for table `tbl_role` */

DROP TABLE IF EXISTS `tbl_role`;

CREATE TABLE `tbl_role` (
  `role_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_title` varchar(255) NOT NULL,
  `role_slug` varchar(255) NOT NULL,
  `role_desc` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_role` */

insert  into `tbl_role`(`role_id`,`role_title`,`role_slug`,`role_desc`,`created_at`,`updated_at`) values 
(1,'Super Admin','super-admin','-','2022-11-15 10:51:04','2022-11-15 10:51:04'),
(2,'Admin','admin','-','2022-11-15 10:51:04','2022-11-15 10:51:04'),
(3,'Operator','operator','-','2022-11-15 10:51:04','2022-11-15 10:51:04'),
(4,'Manajer','manajer',NULL,'2022-12-06 09:33:27','2022-12-06 09:33:27');

/*Table structure for table `tbl_satuan` */

DROP TABLE IF EXISTS `tbl_satuan`;

CREATE TABLE `tbl_satuan` (
  `satuan_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `satuan_nama` varchar(255) NOT NULL,
  `satuan_slug` varchar(255) NOT NULL,
  `satuan_keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`satuan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_satuan` */

insert  into `tbl_satuan`(`satuan_id`,`satuan_nama`,`satuan_slug`,`satuan_keterangan`,`created_at`,`updated_at`) values 
(1,'Kg','kg',NULL,'2022-11-15 17:50:38','2022-11-24 12:39:04'),
(5,'Pcs','pcs',NULL,'2022-11-24 12:39:15','2022-11-24 12:39:21'),
(7,'Qty','qty',NULL,'2022-11-24 12:39:59','2022-11-24 12:39:59');

/*Table structure for table `tbl_submenu` */

DROP TABLE IF EXISTS `tbl_submenu`;

CREATE TABLE `tbl_submenu` (
  `submenu_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` varchar(255) NOT NULL,
  `submenu_judul` varchar(255) NOT NULL,
  `submenu_slug` varchar(255) NOT NULL,
  `submenu_redirect` varchar(255) NOT NULL,
  `submenu_sort` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`submenu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_submenu` */

insert  into `tbl_submenu`(`submenu_id`,`menu_id`,`submenu_judul`,`submenu_slug`,`submenu_redirect`,`submenu_sort`,`created_at`,`updated_at`) values 
(9,'1668510437','Barang Masuk','barang-masuk','/barang-masuk','1','2022-11-15 11:08:19','2022-11-15 11:08:19'),
(10,'1668510437','Barang Keluar','barang-keluar','/barang-keluar','2','2022-11-15 11:08:19','2022-11-15 11:08:19'),
(17,'1668509889','Jenis','jenis','/jenisbarang','1','2022-11-24 12:06:48','2022-11-24 12:06:48'),
(18,'1668509889','Satuan','satuan','/satuan','2','2022-11-24 12:06:48','2022-11-24 12:06:48'),
(19,'1668509889','Merk','merk','/merk','3','2022-11-24 12:06:48','2022-11-24 12:06:48'),
(20,'1668509889','Barang','barang','/barang','4','2022-11-24 12:06:48','2022-11-24 12:06:48'),
(24,'1668510568','Lap Barang Masuk','lap-barang-masuk','/lap-barang-masuk','1','2024-06-22 04:06:37','2024-06-22 04:06:37'),
(25,'1668510568','Lap Barang Keluar','lap-barang-keluar','/lap-barang-keluar','2','2024-06-22 04:06:37','2024-06-22 04:06:37'),
(26,'1668510568','Lap Stok Barang','lap-stok-barang','/lap-stok-barang','3','2024-06-22 04:06:37','2024-06-22 04:06:37'),
(27,'1668510568','Lap Supir','lap-supir','/lap-supir','4','2024-06-22 04:06:37','2024-06-22 04:06:37');

/*Table structure for table `tbl_supir` */

DROP TABLE IF EXISTS `tbl_supir`;

CREATE TABLE `tbl_supir` (
  `supir_id` int(255) NOT NULL AUTO_INCREMENT,
  `supir_kode` varchar(255) DEFAULT NULL,
  `supir_tgl` date DEFAULT NULL,
  `supir_nama` varchar(255) DEFAULT NULL,
  `supir_asal` varchar(255) DEFAULT NULL,
  `supir_tujuan` varchar(255) DEFAULT NULL,
  `supir_tagihan` int(255) DEFAULT NULL,
  `supir_bayar` int(255) DEFAULT NULL,
  `supir_sisa` int(255) DEFAULT NULL,
  `supir_status` enum('Belum Lunas','Lunas') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`supir_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_supir` */

insert  into `tbl_supir`(`supir_id`,`supir_kode`,`supir_tgl`,`supir_nama`,`supir_asal`,`supir_tujuan`,`supir_tagihan`,`supir_bayar`,`supir_sisa`,`supir_status`,`created_at`,`updated_at`) values 
(3,'24-00001','2024-06-22','Radhian','Jakarta','Bandung',4000000,0,4000000,'Belum Lunas','2024-06-22 03:48:51','2024-06-22 03:48:51'),
(4,'24-00002','2024-06-23','Jhon','Jakarta','Surabaya',7000000,7000000,0,'Lunas','2024-06-22 03:51:11','2024-06-22 04:00:01');

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` varchar(255) NOT NULL,
  `user_nmlengkap` varchar(255) NOT NULL,
  `user_nama` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_foto` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`user_id`,`role_id`,`user_nmlengkap`,`user_nama`,`user_email`,`user_foto`,`user_password`,`created_at`,`updated_at`) values 
(1,'1','Super Administrator','superadmin','superadmin@gmail.com','undraw_profile.svg','25d55ad283aa400af464c76d713c07ad','2022-11-15 10:51:04','2022-11-15 10:51:04'),
(2,'2','Administrator','admin','admin@gmail.com','undraw_profile.svg','25d55ad283aa400af464c76d713c07ad','2022-11-15 10:51:04','2022-11-15 10:51:04'),
(3,'3','Operator','operator','operator@gmail.com','undraw_profile.svg','25d55ad283aa400af464c76d713c07ad','2022-11-15 10:51:04','2022-11-15 10:51:04'),
(4,'4','Manajer','manajer','manajer@gmail.com','undraw_profile.svg','25d55ad283aa400af464c76d713c07ad','2022-12-06 09:33:54','2022-12-06 09:33:54');

/*Table structure for table `tbl_web` */

DROP TABLE IF EXISTS `tbl_web`;

CREATE TABLE `tbl_web` (
  `web_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `web_nama` varchar(255) NOT NULL,
  `web_logo` varchar(255) NOT NULL,
  `web_deskripsi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`web_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_web` */

insert  into `tbl_web`(`web_id`,`web_nama`,`web_logo`,`web_deskripsi`,`created_at`,`updated_at`) values 
(1,'Inventoryweb','default.png','Mengelola Data Barang Masuk & Barang Keluar','2022-11-15 10:51:04','2022-11-22 09:41:39');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
