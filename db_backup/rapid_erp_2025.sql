-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: rapid_erp_2025
-- ------------------------------------------------------
-- Server version	8.0.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `activity_logs`
--

DROP TABLE IF EXISTS `activity_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activity_logs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `row_id` bigint DEFAULT NULL,
  `data` json DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `activity_logs_user_id_foreign` (`user_id`),
  CONSTRAINT `activity_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_logs`
--

LOCK TABLES `activity_logs` WRITE;
/*!40000 ALTER TABLE `activity_logs` DISABLE KEYS */;
INSERT INTO `activity_logs` VALUES (1,NULL,'Country Deleted','Country','Country',45,'{\"code\": \"BY\", \"name\": \"Belarus\"}','127.0.0.1','2025-01-31 09:14:45'),(2,NULL,'Country Update','Country','Country',53,'{\"name\": \"Georgias\"}','127.0.0.1','2025-01-31 09:14:59'),(3,NULL,'Country Deleted','Country','Country',36,'{\"code\": \"RO\", \"name\": \"Romania\"}','127.0.0.1','2025-01-31 10:50:07'),(4,NULL,'Country Deleted','Country','Country',54,'{\"code\": \"MN\", \"name\": \"Mongolia\"}','127.0.0.1','2025-01-31 11:31:31'),(5,NULL,'Country Updated','Country','Country',4,'{\"code\": \"US\", \"name\": \"United States\"}','127.0.0.1','2025-01-31 11:35:28'),(6,NULL,'Country Updated','Country','Country',5,'{\"code\": \"CA\", \"name\": \"Canada\"}','127.0.0.1','2025-01-31 11:35:29'),(7,NULL,'Country Updated','Country','Country',5,'{\"code\": \"CA\", \"name\": \"Canada\"}','127.0.0.1','2025-01-31 11:35:30'),(8,NULL,'Country Updated','Country','Country',5,'{\"code\": \"CA\", \"name\": \"Canadas\"}','127.0.0.1','2025-01-31 11:35:33'),(9,NULL,'Country Updated','Country','Country',5,'{\"code\": \"CA\", \"name\": \"Canada\"}','127.0.0.1','2025-01-31 11:35:36'),(10,NULL,'Country Update','Country','Country',48,'{\"name\": \"Kyrgyzstan\"}','127.0.0.1','2025-01-31 12:11:38'),(11,NULL,'Country Update','Country','Country',28,'{\"name\": \"Netherlands\"}','127.0.0.1','2025-01-31 12:11:53'),(12,NULL,'Country Update','Country','Country',68,'{\"name\": \"Bangladesh\"}','127.0.0.1','2025-01-31 12:36:12'),(13,NULL,'Country Update','Country','Country',4,'{\"name\": \"United States Of America\"}','127.0.0.1','2025-01-31 12:37:33'),(14,NULL,'Country Update','Country','Country',68,'{\"name\": \"Bangladesh\"}','127.0.0.1','2025-01-31 13:15:05'),(15,NULL,'Country Update','Country','Country',4,'{\"name\": \"United States Of America\"}','127.0.0.1','2025-01-31 17:28:20'),(16,NULL,'Country Update','Country','Country',26,'{\"name\": \"Denmarks\"}','127.0.0.1','2025-01-31 17:28:44');
/*!40000 ALTER TABLE `activity_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assets`
--

DROP TABLE IF EXISTS `assets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assets`
--

LOCK TABLES `assets` WRITE;
/*!40000 ALTER TABLE `assets` DISABLE KEYS */;
/*!40000 ALTER TABLE `assets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `countries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `draft` tinyint(1) NOT NULL DEFAULT '0',
  `drafted_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `flag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (4,'USA','United States Of America',0,1,'2025-01-31 11:28:20',1,'flag_679cc40dd36b97.66819571.png',NULL,'2025-01-31 11:28:20',NULL),(5,'CA','Canada',0,0,NULL,0,NULL,NULL,'2025-01-31 05:35:36',NULL),(6,'GB','United Kingdom',0,0,NULL,0,NULL,NULL,'2025-01-27 03:47:47',NULL),(7,'AU','Australia',0,0,NULL,0,NULL,NULL,'2025-01-27 03:46:40',NULL),(8,'IN','India',0,0,NULL,0,NULL,NULL,'2025-01-27 03:37:59',NULL),(9,'DE','Germany',0,0,NULL,0,NULL,NULL,'2025-01-27 03:47:13',NULL),(10,'FR','France',0,0,NULL,0,NULL,NULL,'2025-01-27 03:53:39',NULL),(11,'IT','Italy',0,0,NULL,0,NULL,NULL,'2025-01-27 03:50:45',NULL),(12,'ES','Spain',0,0,NULL,0,NULL,NULL,'2025-01-27 03:53:43',NULL),(13,'BR','Brazil',0,0,NULL,0,NULL,NULL,'2025-01-27 03:50:51',NULL),(14,'JP','Japan',0,0,NULL,0,NULL,NULL,'2025-01-27 03:55:34',NULL),(15,'MX','Mexico',0,0,NULL,0,NULL,NULL,'2025-01-27 04:00:43',NULL),(16,'CN','China',0,0,NULL,0,NULL,NULL,'2025-01-27 03:38:24',NULL),(17,'RU','Russia',0,0,NULL,0,NULL,NULL,'2025-01-27 04:12:12',NULL),(18,'ZA','South Africa',0,0,NULL,0,NULL,NULL,'2025-01-27 04:13:20',NULL),(19,'KR','South Korea',0,0,NULL,0,NULL,NULL,'2025-01-27 03:39:03',NULL),(20,'NG','Nigeria',0,0,NULL,0,NULL,NULL,'2025-01-27 04:16:06',NULL),(21,'EG','Egypt',0,0,NULL,0,NULL,NULL,'2025-01-27 04:00:58',NULL),(22,'TR','Turkey',0,0,NULL,0,NULL,NULL,'2025-01-27 04:12:47',NULL),(23,'SE','Sweden',0,0,NULL,0,NULL,NULL,'2025-01-28 03:03:20',NULL),(24,'NOs','Norway',0,0,NULL,0,'flag_6798b2c8335555.70275217.jpg',NULL,'2025-01-30 11:24:43',NULL),(25,'FI','Finland',0,0,NULL,0,NULL,NULL,'2025-01-27 04:16:34',NULL),(26,'DK','Denmarks',0,0,NULL,0,'flag_679c91b172dd86.43135825.png',NULL,'2025-01-31 03:02:41',NULL),(27,'PL','Poland',0,0,NULL,0,NULL,NULL,'2025-01-30 06:59:35',NULL),(28,'NL','Netherlands',0,0,NULL,0,NULL,NULL,'2025-01-31 06:11:53','2025-01-31 06:11:53'),(29,'BE','Belgium',0,0,NULL,0,NULL,NULL,NULL,NULL),(30,'AT','Austria',0,0,NULL,0,NULL,NULL,'2025-01-27 12:21:40',NULL),(31,'CH','Switzerland',0,0,NULL,0,NULL,NULL,NULL,NULL),(32,'LU','Luxembourg',0,0,NULL,0,NULL,NULL,'2025-01-27 12:21:22',NULL),(33,'IE','Ireland',0,0,NULL,0,NULL,NULL,'2025-01-27 03:40:31',NULL),(34,'PT','Portugal',0,0,NULL,0,NULL,NULL,'2025-01-27 12:22:10',NULL),(35,'GR','Greece',0,0,NULL,0,NULL,NULL,'2025-01-28 12:04:29',NULL),(36,'RO','Romania',0,0,NULL,0,NULL,NULL,'2025-01-31 04:50:07','2025-01-31 04:50:07'),(37,'HU','Hungary',0,0,NULL,0,NULL,NULL,'2025-01-30 11:25:29',NULL),(38,'CZ','Czech Republic',0,0,NULL,0,NULL,NULL,NULL,NULL),(39,'SK','Slovakia',0,0,NULL,0,NULL,NULL,'2025-01-30 11:26:07',NULL),(40,'BG','Bulgaria',0,0,NULL,0,NULL,NULL,'2025-01-28 03:03:26',NULL),(41,'SI','Slovenia',0,0,NULL,0,NULL,NULL,NULL,NULL),(42,'HR','Croatia',0,0,NULL,0,NULL,NULL,NULL,NULL),(43,'RS','Serbia',0,0,NULL,0,NULL,NULL,NULL,NULL),(44,'UA','Ukraine',0,0,NULL,0,NULL,NULL,NULL,NULL),(45,'BY','Belarus',0,0,NULL,0,NULL,NULL,'2025-01-31 03:14:45','2025-01-31 03:14:45'),(46,'MD','Moldovas',0,0,NULL,0,NULL,NULL,'2025-01-27 03:36:04',NULL),(47,'KZ','Kazakhstan',0,0,NULL,0,NULL,NULL,NULL,NULL),(48,'KG','Kyrgyzstan',0,0,NULL,0,NULL,NULL,'2025-01-31 06:11:38','2025-01-31 06:11:38'),(49,'TJ','Tajikistan',0,0,NULL,0,NULL,NULL,NULL,NULL),(50,'TM','Turkmenistan',0,0,NULL,0,NULL,NULL,NULL,NULL),(51,'UZs','Uzbekistans',0,0,NULL,0,'flag_6798b25734b544.91608383.jpg',NULL,'2025-01-28 04:33:10',NULL),(52,'AMss','Armenia',0,0,NULL,0,NULL,NULL,'2025-01-27 03:37:02',NULL),(53,'GEs','Georgias',0,0,NULL,0,NULL,NULL,'2025-01-31 03:14:59',NULL),(54,'MN','Mongolia',0,0,NULL,0,NULL,NULL,'2025-01-31 05:31:31','2025-01-31 05:31:31'),(55,'AF','Afghanistanss',0,0,NULL,0,NULL,NULL,'2025-01-28 06:22:22',NULL),(56,'BDD','Bangladesh',0,0,NULL,0,NULL,'2025-01-27 04:17:32','2025-01-27 04:32:50',NULL),(57,'test','Test',0,0,NULL,0,NULL,'2025-01-27 04:22:24','2025-01-27 04:32:46',NULL),(58,'Test 02','Test country Nmae',0,1,NULL,0,NULL,'2025-01-27 04:22:48','2025-01-27 04:23:32',NULL),(64,'Test  004','Test  --4',0,0,NULL,0,'flag_679762549f96b2.72384951.png','2025-01-27 04:39:16','2025-01-28 03:03:12',NULL),(65,'Test 003','Test 0034',1,1,'2025-01-27 05:05:26',1,'flag_67989ec50aa361.06999169.png','2025-01-27 05:05:26','2025-01-28 04:31:35',NULL),(67,'TCs','Test Country 001s',1,0,NULL,1,'flag_6798b199b54459.13613005.jpg','2025-01-28 03:09:25','2025-01-28 04:31:53',NULL),(68,'BD','Bangladesh',1,0,NULL,1,'flag_679cc3bc808705.30033899.png','2025-01-30 07:09:05','2025-01-31 06:36:12',NULL);
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `currencies`
--

DROP TABLE IF EXISTS `currencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `currencies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `draft` tinyint(1) NOT NULL DEFAULT '0',
  `drafted_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `system` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exchange_rate` double DEFAULT NULL,
  `symbols` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currencies`
--

LOCK TABLES `currencies` WRITE;
/*!40000 ALTER TABLE `currencies` DISABLE KEYS */;
INSERT INTO `currencies` VALUES (1,'USD','Bangladeshs',1,0,NULL,1,'Global',1,NULL,'2025-01-21 04:36:44','2025-01-26 11:52:53',NULL),(2,'EUR','Euro',0,0,NULL,1,'Global',0.36,NULL,'2025-01-21 04:36:44','2025-01-21 08:20:36',NULL),(3,'GBP','British Pound',0,0,NULL,1,'Global',0.75,NULL,'2025-01-21 04:36:44','2025-01-21 08:22:32',NULL),(4,'TK','United Statessss',0,0,NULL,1,NULL,100,NULL,'2025-01-21 06:44:48','2025-01-26 15:00:02',NULL),(5,'TKK','test',1,0,NULL,1,NULL,33,NULL,'2025-01-21 07:20:22','2025-01-21 14:39:40','2025-01-21 14:39:40'),(6,'Test','Test',0,0,NULL,0,NULL,200,NULL,'2025-01-21 08:01:27','2025-01-21 08:17:48',NULL),(7,'SAR','Dubai Money',0,0,NULL,0,NULL,250,NULL,'2025-01-21 08:02:36','2025-01-21 08:02:36',NULL),(8,'Lira','Italiyan Coin',0,0,NULL,0,NULL,100,'files/images/currency/symbol_678fae25e67536.30766661.png','2025-01-21 08:24:37','2025-01-21 08:24:37',NULL),(9,'NEWTK','Test NEWTK',0,0,NULL,0,NULL,120,NULL,'2025-01-21 09:55:28','2025-01-21 14:39:25','2025-01-21 14:39:25'),(10,'TTTT','test',0,0,NULL,0,NULL,20,NULL,'2025-01-22 02:19:59','2025-01-22 02:19:59',NULL);
/*!40000 ALTER TABLE `currencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2025_01_21_101747_create_currencies_table',2),(9,'2025_01_22_173406_create_assets_name',3),(10,'2025_01_21_101747_create_country_table',4),(13,'2025_01_28_175217_create_activity_logs_table',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('cMUh2a4RzE20KcwgfMtUZDoXE6gJpJphfz1RbmL1',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUkRzYTVvbDI3UTBBTU8xa04wQldSaEwwMkpYZ2RQMVpzY2x6cG5pRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jcm0iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1738340389),('hMzWzLKgrMxhe6cnHYOlDgRn9DacJSf2uOKGqqEz',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiRnh1VWRSS0lYS202SFoxWldMOTB0bXlSN2RHcXEyUFducXZxdlVSViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9jb3VudHJpZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1738347097);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Test User','test@example.com','2025-01-22 11:45:51','$2y$12$zIhACwqcxqETkHsg0BKf/.AFXlf1k6HuWqrtJ7VFIjZ9hBOn/sR8G','kBWnCy7rkv','2025-01-22 11:45:51','2025-01-22 11:45:51');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-02-01 15:48:03
