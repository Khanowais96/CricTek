-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: crictek
-- ------------------------------------------------------
-- Server version	8.0.19

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
-- Table structure for table `ct_admin`
--

DROP TABLE IF EXISTS `ct_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ct_admin` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(55) COLLATE utf8_bin DEFAULT NULL,
  `admin_email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `admin_password` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ct_admin`
--

LOCK TABLES `ct_admin` WRITE;
/*!40000 ALTER TABLE `ct_admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `ct_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ct_fixtures`
--

DROP TABLE IF EXISTS `ct_fixtures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ct_fixtures` (
  `fixtures_id` int NOT NULL AUTO_INCREMENT,
  `fixture_date` datetime DEFAULT NULL,
  `team_score` int DEFAULT NULL,
  PRIMARY KEY (`fixtures_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ct_fixtures`
--

LOCK TABLES `ct_fixtures` WRITE;
/*!40000 ALTER TABLE `ct_fixtures` DISABLE KEYS */;
/*!40000 ALTER TABLE `ct_fixtures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ct_ground`
--

DROP TABLE IF EXISTS `ct_ground`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ct_ground` (
  `ground_id` int NOT NULL AUTO_INCREMENT,
  `ground_name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `ground_location` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`ground_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ct_ground`
--

LOCK TABLES `ct_ground` WRITE;
/*!40000 ALTER TABLE `ct_ground` DISABLE KEYS */;
/*!40000 ALTER TABLE `ct_ground` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ct_ground_has_ct_ground_owner`
--

DROP TABLE IF EXISTS `ct_ground_has_ct_ground_owner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ct_ground_has_ct_ground_owner` (
  `ground_id` int NOT NULL,
  `ground_owner_id` int NOT NULL,
  KEY `fk_ct_ground_has_ct_ground_owner_ct_ground_owner1_idx` (`ground_owner_id`),
  KEY `fk_ct_ground_has_ct_ground_owner_ct_ground1_idx` (`ground_id`),
  CONSTRAINT `fk_ct_ground_has_ct_ground_owner_ct_ground1` FOREIGN KEY (`ground_id`) REFERENCES `ct_ground` (`ground_id`),
  CONSTRAINT `fk_ct_ground_has_ct_ground_owner_ct_ground_owner1` FOREIGN KEY (`ground_owner_id`) REFERENCES `ct_ground_owner` (`ground_owner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ct_ground_has_ct_ground_owner`
--

LOCK TABLES `ct_ground_has_ct_ground_owner` WRITE;
/*!40000 ALTER TABLE `ct_ground_has_ct_ground_owner` DISABLE KEYS */;
/*!40000 ALTER TABLE `ct_ground_has_ct_ground_owner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ct_ground_images`
--

DROP TABLE IF EXISTS `ct_ground_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ct_ground_images` (
  `image_id` int NOT NULL AUTO_INCREMENT,
  `image_url` longtext COLLATE utf8_bin,
  `ground_id` int NOT NULL,
  PRIMARY KEY (`image_id`),
  KEY `fk_ct_ground_images_ct_ground1_idx` (`ground_id`),
  CONSTRAINT `fk_ct_ground_images_ct_ground1` FOREIGN KEY (`ground_id`) REFERENCES `ct_ground` (`ground_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ct_ground_images`
--

LOCK TABLES `ct_ground_images` WRITE;
/*!40000 ALTER TABLE `ct_ground_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `ct_ground_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ct_ground_owner`
--

DROP TABLE IF EXISTS `ct_ground_owner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ct_ground_owner` (
  `ground_owner_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  PRIMARY KEY (`ground_owner_id`),
  KEY `fk_ct_ground_owner_ct_user1_idx` (`user_id`),
  CONSTRAINT `fk_ct_ground_owner_ct_user1` FOREIGN KEY (`user_id`) REFERENCES `ct_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ct_ground_owner`
--

LOCK TABLES `ct_ground_owner` WRITE;
/*!40000 ALTER TABLE `ct_ground_owner` DISABLE KEYS */;
/*!40000 ALTER TABLE `ct_ground_owner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ct_match`
--

DROP TABLE IF EXISTS `ct_match`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ct_match` (
  `match_id` int NOT NULL AUTO_INCREMENT,
  `match_name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `team_id` int NOT NULL,
  `team2_id` int NOT NULL,
  `match_date` date DEFAULT NULL,
  `match_result` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `match_toss` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `category_id` int NOT NULL,
  `scorer_id` int DEFAULT NULL,
  `ct_umpire_umpire_id` int DEFAULT NULL,
  `tournament_id` int DEFAULT NULL,
  `fixtures_id` int DEFAULT NULL,
  PRIMARY KEY (`match_id`),
  KEY `fk_ct_match_ct_match_category1_idx` (`category_id`),
  KEY `fk_ct_match_ct_scorer1_idx` (`scorer_id`),
  KEY `fk_ct_match_ct_umpire1_idx` (`ct_umpire_umpire_id`),
  KEY `fk_ct_match_ct_tournament1_idx` (`tournament_id`),
  KEY `fk_ct_match_ct_fixtures1_idx` (`fixtures_id`),
  KEY `fk_ct_match_ct_team1_idx` (`team_id`),
  KEY `fk_ct_match_ct_team2_idx` (`team2_id`),
  CONSTRAINT `fk_ct_match_ct_fixtures1` FOREIGN KEY (`fixtures_id`) REFERENCES `ct_fixtures` (`fixtures_id`),
  CONSTRAINT `fk_ct_match_ct_match_category1` FOREIGN KEY (`category_id`) REFERENCES `ct_match_category` (`category_id`),
  CONSTRAINT `fk_ct_match_ct_scorer1` FOREIGN KEY (`scorer_id`) REFERENCES `ct_scorer` (`scorer_id`),
  CONSTRAINT `fk_ct_match_ct_team1` FOREIGN KEY (`team_id`) REFERENCES `ct_team` (`team_id`),
  CONSTRAINT `fk_ct_match_ct_team2` FOREIGN KEY (`team2_id`) REFERENCES `ct_team` (`team_id`),
  CONSTRAINT `fk_ct_match_ct_tournament1` FOREIGN KEY (`tournament_id`) REFERENCES `ct_tournament` (`tournament_id`),
  CONSTRAINT `fk_ct_match_ct_umpire1` FOREIGN KEY (`ct_umpire_umpire_id`) REFERENCES `ct_umpire` (`umpire_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ct_match`
--

LOCK TABLES `ct_match` WRITE;
/*!40000 ALTER TABLE `ct_match` DISABLE KEYS */;
/*!40000 ALTER TABLE `ct_match` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ct_match_category`
--

DROP TABLE IF EXISTS `ct_match_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ct_match_category` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `No_of_overs` int DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ct_match_category`
--

LOCK TABLES `ct_match_category` WRITE;
/*!40000 ALTER TABLE `ct_match_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `ct_match_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ct_match_status`
--

DROP TABLE IF EXISTS `ct_match_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ct_match_status` (
  `status_id` int NOT NULL AUTO_INCREMENT,
  `player_id` int DEFAULT NULL,
  `bat_run` int DEFAULT '0',
  `played_ball` int DEFAULT '0',
  `hitted_fours` int DEFAULT '0',
  `hitted_sixes` int DEFAULT '0',
  `bowl_runs` int DEFAULT '0',
  `bowled_overs` int DEFAULT '0',
  `wicket` int DEFAULT '0',
  `extras` int DEFAULT '0',
  `out_type` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `toss` int DEFAULT NULL,
  `no_ball` int DEFAULT '0',
  `wide_ball` int DEFAULT '0',
  `match_id` int NOT NULL,
  PRIMARY KEY (`status_id`),
  KEY `player_ibfk_idx` (`player_id`),
  KEY `fk_ct_match_status_ct_match1_idx` (`match_id`),
  CONSTRAINT `fk_ct_match_status_ct_match1` FOREIGN KEY (`match_id`) REFERENCES `ct_match` (`match_id`),
  CONSTRAINT `player_ibfk` FOREIGN KEY (`player_id`) REFERENCES `ct_player` (`player_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ct_match_status`
--

LOCK TABLES `ct_match_status` WRITE;
/*!40000 ALTER TABLE `ct_match_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `ct_match_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ct_notification`
--

DROP TABLE IF EXISTS `ct_notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ct_notification` (
  `notification_id` int NOT NULL,
  `notification_message` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `notificaion_date` datetime DEFAULT NULL,
  PRIMARY KEY (`notification_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ct_notification`
--

LOCK TABLES `ct_notification` WRITE;
/*!40000 ALTER TABLE `ct_notification` DISABLE KEYS */;
/*!40000 ALTER TABLE `ct_notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ct_player`
--

DROP TABLE IF EXISTS `ct_player`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ct_player` (
  `player_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `player_father_name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `player_dateofbirth` date DEFAULT NULL,
  `player_age` int DEFAULT NULL,
  `player_playing_roll` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `player_batting_style` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `player_bowling_style` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `team_id` int DEFAULT NULL,
  PRIMARY KEY (`player_id`),
  KEY `fk_ct_player_ct_team1_idx` (`team_id`),
  KEY `fk_ct_player_ct_user1_idx` (`user_id`),
  CONSTRAINT `fk_ct_player_ct_team1` FOREIGN KEY (`team_id`) REFERENCES `ct_team` (`team_id`),
  CONSTRAINT `fk_ct_player_ct_user1` FOREIGN KEY (`user_id`) REFERENCES `ct_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ct_player`
--

LOCK TABLES `ct_player` WRITE;
/*!40000 ALTER TABLE `ct_player` DISABLE KEYS */;
/*!40000 ALTER TABLE `ct_player` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ct_scorer`
--

DROP TABLE IF EXISTS `ct_scorer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ct_scorer` (
  `scorer_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  PRIMARY KEY (`scorer_id`),
  KEY `fk_ct_scorer_ct_user1_idx` (`user_id`),
  CONSTRAINT `fk_ct_scorer_ct_user1` FOREIGN KEY (`user_id`) REFERENCES `ct_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ct_scorer`
--

LOCK TABLES `ct_scorer` WRITE;
/*!40000 ALTER TABLE `ct_scorer` DISABLE KEYS */;
/*!40000 ALTER TABLE `ct_scorer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ct_team`
--

DROP TABLE IF EXISTS `ct_team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ct_team` (
  `team_id` int NOT NULL AUTO_INCREMENT,
  `team_name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `team_owner_id` int NOT NULL,
  PRIMARY KEY (`team_id`),
  KEY `fk_ct_team_ct_team_owner1_idx` (`team_owner_id`),
  CONSTRAINT `fk_ct_team_ct_team_owner1` FOREIGN KEY (`team_owner_id`) REFERENCES `ct_team_owner` (`team_owner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ct_team`
--

LOCK TABLES `ct_team` WRITE;
/*!40000 ALTER TABLE `ct_team` DISABLE KEYS */;
/*!40000 ALTER TABLE `ct_team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ct_team_owner`
--

DROP TABLE IF EXISTS `ct_team_owner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ct_team_owner` (
  `team_owner_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  PRIMARY KEY (`team_owner_id`),
  KEY `fk_ct_team_owner_ct_user1_idx` (`user_id`),
  CONSTRAINT `fk_ct_team_owner_ct_user1` FOREIGN KEY (`user_id`) REFERENCES `ct_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ct_team_owner`
--

LOCK TABLES `ct_team_owner` WRITE;
/*!40000 ALTER TABLE `ct_team_owner` DISABLE KEYS */;
/*!40000 ALTER TABLE `ct_team_owner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ct_tournament`
--

DROP TABLE IF EXISTS `ct_tournament`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ct_tournament` (
  `tournament_id` int NOT NULL AUTO_INCREMENT,
  `tournament_name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `total_matches` int DEFAULT NULL,
  `starting_date` date DEFAULT NULL,
  `ending_date` date DEFAULT NULL,
  `tournament_winner` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `tournament_runner_up` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`tournament_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ct_tournament`
--

LOCK TABLES `ct_tournament` WRITE;
/*!40000 ALTER TABLE `ct_tournament` DISABLE KEYS */;
/*!40000 ALTER TABLE `ct_tournament` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ct_umpire`
--

DROP TABLE IF EXISTS `ct_umpire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ct_umpire` (
  `umpire_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  PRIMARY KEY (`umpire_id`),
  KEY `fk_ct_umpire_ct_user1_idx` (`user_id`),
  CONSTRAINT `fk_ct_umpire_ct_user1` FOREIGN KEY (`user_id`) REFERENCES `ct_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ct_umpire`
--

LOCK TABLES `ct_umpire` WRITE;
/*!40000 ALTER TABLE `ct_umpire` DISABLE KEYS */;
/*!40000 ALTER TABLE `ct_umpire` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ct_user`
--

DROP TABLE IF EXISTS `ct_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ct_user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `user_email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `user_password` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `user_contact` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `user_address` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `user_cnic` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ct_user`
--

LOCK TABLES `ct_user` WRITE;
/*!40000 ALTER TABLE `ct_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `ct_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ct_user_has_ct_notification`
--

DROP TABLE IF EXISTS `ct_user_has_ct_notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ct_user_has_ct_notification` (
  `user_id` int NOT NULL,
  `notification_id` int NOT NULL,
  PRIMARY KEY (`user_id`,`notification_id`),
  KEY `fk_ct_user_has_ct_notification_ct_notification1_idx` (`notification_id`),
  KEY `fk_ct_user_has_ct_notification_ct_user1_idx` (`user_id`),
  CONSTRAINT `fk_ct_user_has_ct_notification_ct_notification1` FOREIGN KEY (`notification_id`) REFERENCES `ct_notification` (`notification_id`),
  CONSTRAINT `fk_ct_user_has_ct_notification_ct_user1` FOREIGN KEY (`user_id`) REFERENCES `ct_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ct_user_has_ct_notification`
--

LOCK TABLES `ct_user_has_ct_notification` WRITE;
/*!40000 ALTER TABLE `ct_user_has_ct_notification` DISABLE KEYS */;
/*!40000 ALTER TABLE `ct_user_has_ct_notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ground_booking`
--

DROP TABLE IF EXISTS `ground_booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ground_booking` (
  `booking_id` int NOT NULL AUTO_INCREMENT,
  `ground_id` int NOT NULL,
  `ct_user_user_id` int NOT NULL,
  `booking_date` date DEFAULT NULL,
  `booking_umpire` tinyint DEFAULT NULL,
  `booking_scorer` tinyint DEFAULT NULL,
  `booking_half` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `booking_confirmed` tinyint DEFAULT NULL,
  `booking_timing` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`booking_id`),
  KEY `fk_ct_user_has_ct_ground_ct_ground1_idx` (`ground_id`),
  KEY `fk_ground_booking_ct_user1_idx` (`ct_user_user_id`),
  CONSTRAINT `fk_ct_user_has_ct_ground_ct_ground1` FOREIGN KEY (`ground_id`) REFERENCES `ct_ground` (`ground_id`),
  CONSTRAINT `fk_ground_booking_ct_user1` FOREIGN KEY (`ct_user_user_id`) REFERENCES `ct_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ground_booking`
--

LOCK TABLES `ground_booking` WRITE;
/*!40000 ALTER TABLE `ground_booking` DISABLE KEYS */;
/*!40000 ALTER TABLE `ground_booking` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-23  0:26:25
