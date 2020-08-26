-- MySQL dump 10.13  Distrib 8.0.18, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: esportorgdb
-- ------------------------------------------------------
-- Server version	8.0.18

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL AUTO_INCREMENT,
  `adminLogin` varchar(20) NOT NULL,
  `adminPass` varchar(20) NOT NULL,
  PRIMARY KEY (`adminID`),
  UNIQUE KEY `adminID_UNIQUE` (`adminID`),
  UNIQUE KEY `adminLogin_UNIQUE` (`adminLogin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','admin');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `announcements`
--

DROP TABLE IF EXISTS `announcements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `announcements` (
  `announcementID` int(11) NOT NULL AUTO_INCREMENT,
  `announcementIssuerID` int(11) NOT NULL,
  `announcementText` mediumtext NOT NULL,
  `announcementTeamID` int(11) NOT NULL,
  PRIMARY KEY (`announcementID`),
  UNIQUE KEY `announcementID_UNIQUE` (`announcementID`),
  KEY `annoTeamLink_idx` (`announcementTeamID`),
  KEY `annoCoachLink_idx` (`announcementIssuerID`),
  CONSTRAINT `annoCoachLink` FOREIGN KEY (`announcementIssuerID`) REFERENCES `team_coaches` (`teamCoachID`) ON DELETE CASCADE,
  CONSTRAINT `annoTeamLink` FOREIGN KEY (`announcementTeamID`) REFERENCES `team` (`teamID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `announcements`
--

LOCK TABLES `announcements` WRITE;
/*!40000 ALTER TABLE `announcements` DISABLE KEYS */;
INSERT INTO `announcements` VALUES (1,6,'All players, welcome aboard! Effective today, all players must use face coverings to enter our training facility.',1),(2,6,'loreum ipsum',1),(3,6,'loooreummm ippsummm',1),(4,6,'Another announcement.',1);
/*!40000 ALTER TABLE `announcements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_individual`
--

DROP TABLE IF EXISTS `event_individual`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `event_individual` (
  `eventID` int(11) NOT NULL AUTO_INCREMENT,
  `eventStart` datetime NOT NULL,
  `eventEnd` datetime NOT NULL,
  `eventIssuerID` int(11) NOT NULL,
  `eventPlayerID` int(11) NOT NULL,
  `eventDesc` varchar(45) NOT NULL,
  PRIMARY KEY (`eventID`),
  KEY `indiIssuerLink_idx` (`eventIssuerID`),
  KEY `indiPlayerLink_idx` (`eventPlayerID`),
  CONSTRAINT `indiIssuerLink` FOREIGN KEY (`eventIssuerID`) REFERENCES `team_coaches` (`teamCoachID`),
  CONSTRAINT `indiPlayerLink` FOREIGN KEY (`eventPlayerID`) REFERENCES `team_players` (`teamPlayerID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_individual`
--

LOCK TABLES `event_individual` WRITE;
/*!40000 ALTER TABLE `event_individual` DISABLE KEYS */;
/*!40000 ALTER TABLE `event_individual` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_team`
--

DROP TABLE IF EXISTS `event_team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `event_team` (
  `eventID` int(11) NOT NULL AUTO_INCREMENT,
  `eventStart` datetime NOT NULL,
  `eventEnd` datetime NOT NULL,
  `eventIssuerID` int(11) NOT NULL,
  `eventTeamID` int(11) NOT NULL,
  `eventDesc` varchar(45) NOT NULL,
  PRIMARY KEY (`eventID`),
  KEY `teamIssuerLink_idx` (`eventIssuerID`),
  KEY `teamEventLink_idx` (`eventTeamID`),
  CONSTRAINT `teamEventLink` FOREIGN KEY (`eventTeamID`) REFERENCES `org_teams` (`orgTeamID`) ON DELETE CASCADE,
  CONSTRAINT `teamIssuerLink` FOREIGN KEY (`eventIssuerID`) REFERENCES `team_coaches` (`teamCoachID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_team`
--

LOCK TABLES `event_team` WRITE;
/*!40000 ALTER TABLE `event_team` DISABLE KEYS */;
/*!40000 ALTER TABLE `event_team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game`
--

DROP TABLE IF EXISTS `game`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `game` (
  `gameID` int(11) NOT NULL AUTO_INCREMENT,
  `gameTitle` varchar(45) NOT NULL,
  `gameDesc` text,
  PRIMARY KEY (`gameID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game`
--

LOCK TABLES `game` WRITE;
/*!40000 ALTER TABLE `game` DISABLE KEYS */;
INSERT INTO `game` VALUES (1,'Counter-Strike: Global Offensive',NULL),(2,'League of Legends',NULL);
/*!40000 ALTER TABLE `game` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game_mode`
--

DROP TABLE IF EXISTS `game_mode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `game_mode` (
  `gamemodeID` int(11) NOT NULL AUTO_INCREMENT,
  `gameID` int(11) NOT NULL,
  `gamemodeName` varchar(45) NOT NULL,
  PRIMARY KEY (`gamemodeID`),
  UNIQUE KEY `gamemodeDesc_UNIQUE` (`gamemodeName`),
  KEY `gamemodeLink_idx` (`gameID`),
  KEY `gameModeGameLink_idx` (`gameID`),
  CONSTRAINT `gameModeGameLink` FOREIGN KEY (`gameID`) REFERENCES `game` (`gameID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game_mode`
--

LOCK TABLES `game_mode` WRITE;
/*!40000 ALTER TABLE `game_mode` DISABLE KEYS */;
INSERT INTO `game_mode` VALUES (1,1,'Competitive Pickup Game'),(2,1,'Casual Pickup Game');
/*!40000 ALTER TABLE `game_mode` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game_mode_stats`
--

DROP TABLE IF EXISTS `game_mode_stats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `game_mode_stats` (
  `gamemodeID` int(11) NOT NULL,
  `gameStatTypeID` int(11) NOT NULL,
  KEY `gameStatLink_idx1` (`gameStatTypeID`),
  KEY `gamemodeLink_idx` (`gamemodeID`),
  CONSTRAINT `gameModeLink` FOREIGN KEY (`gamemodeID`) REFERENCES `game_mode` (`gamemodeID`),
  CONSTRAINT `gameStatTypeLink` FOREIGN KEY (`gameStatTypeID`) REFERENCES `stattype` (`stattypeID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game_mode_stats`
--

LOCK TABLES `game_mode_stats` WRITE;
/*!40000 ALTER TABLE `game_mode_stats` DISABLE KEYS */;
INSERT INTO `game_mode_stats` VALUES (1,1),(1,2),(1,3),(1,4),(1,5),(1,6),(2,1),(2,2),(2,3),(2,4),(2,5);
/*!40000 ALTER TABLE `game_mode_stats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gaming_session`
--

DROP TABLE IF EXISTS `gaming_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gaming_session` (
  `gamingSessionID` int(11) NOT NULL AUTO_INCREMENT,
  `gamingSessionStart` datetime NOT NULL,
  `gamingSessionEnd` datetime NOT NULL,
  `gamingsessionPlayerComments` varchar(60) DEFAULT NULL,
  `gamingsessionPlayerID` int(11) NOT NULL,
  PRIMARY KEY (`gamingSessionID`),
  UNIQUE KEY `gamingSessionID_UNIQUE` (`gamingSessionID`),
  KEY `gamePlayerLink_idx` (`gamingsessionPlayerID`),
  CONSTRAINT `gamePlayerLink` FOREIGN KEY (`gamingsessionPlayerID`) REFERENCES `team_players` (`teamPlayerID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gaming_session`
--

LOCK TABLES `gaming_session` WRITE;
/*!40000 ALTER TABLE `gaming_session` DISABLE KEYS */;
INSERT INTO `gaming_session` VALUES (1,'2020-08-26 01:41:20','2020-08-26 01:41:23',NULL,1),(2,'2020-08-26 01:49:19','2020-08-26 01:49:22',NULL,1),(3,'2020-08-26 01:50:03','2020-08-26 01:50:05',NULL,1),(4,'2020-08-26 01:53:46','2020-08-26 01:53:53',NULL,1),(5,'2020-08-26 02:00:57','2020-08-26 02:01:00',NULL,1),(6,'2020-08-26 02:04:12','2020-08-26 02:04:16',NULL,1),(7,'2020-08-26 02:10:00','2020-08-26 02:10:05',NULL,1),(8,'2020-08-26 02:11:15','2020-08-26 02:11:18',NULL,1),(9,'2020-08-26 02:19:49','2020-08-26 02:19:51',NULL,1),(10,'2020-08-26 02:23:26','2020-08-26 02:23:29',NULL,1),(11,'2020-08-26 02:27:54','2020-08-26 02:27:57',NULL,1),(12,'2020-08-26 02:35:46','2020-08-26 02:35:51',NULL,1);
/*!40000 ALTER TABLE `gaming_session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `objective`
--

DROP TABLE IF EXISTS `objective`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `objective` (
  `objectiveID` int(11) NOT NULL AUTO_INCREMENT,
  `objectiveGoal` varchar(45) NOT NULL,
  `objectiveStatTypeID` int(11) NOT NULL,
  `objectiveDeadline` date DEFAULT NULL,
  `objectivePlayerID` int(11) NOT NULL,
  `objectiveStatus` varchar(20) NOT NULL,
  PRIMARY KEY (`objectiveID`),
  UNIQUE KEY `objectiveID_UNIQUE` (`objectiveID`),
  KEY `objStatLink_idx` (`objectiveStatTypeID`),
  KEY `objPlayerLink_idx` (`objectivePlayerID`),
  CONSTRAINT `objPlayerLink` FOREIGN KEY (`objectivePlayerID`) REFERENCES `team_players` (`teamPlayerID`) ON DELETE CASCADE,
  CONSTRAINT `objStatLink` FOREIGN KEY (`objectiveStatTypeID`) REFERENCES `game_mode_stats` (`gameStatTypeID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `objective`
--

LOCK TABLES `objective` WRITE;
/*!40000 ALTER TABLE `objective` DISABLE KEYS */;
INSERT INTO `objective` VALUES (1,'Acheive 20 frags in a single game.',1,'2020-08-29',1,'Active');
/*!40000 ALTER TABLE `objective` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `org_admins`
--

DROP TABLE IF EXISTS `org_admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `org_admins` (
  `orgID` int(11) NOT NULL,
  `orgAdminID` int(11) NOT NULL,
  KEY `orgAdminLink_idx` (`orgID`),
  KEY `orgAdminIDLink_idx` (`orgAdminID`),
  CONSTRAINT `orgAdminIDLink` FOREIGN KEY (`orgAdminID`) REFERENCES `admin` (`adminID`) ON DELETE CASCADE,
  CONSTRAINT `orgAdminLink` FOREIGN KEY (`orgID`) REFERENCES `organization` (`orgID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `org_admins`
--

LOCK TABLES `org_admins` WRITE;
/*!40000 ALTER TABLE `org_admins` DISABLE KEYS */;
/*!40000 ALTER TABLE `org_admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `org_teams`
--

DROP TABLE IF EXISTS `org_teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `org_teams` (
  `orgID` int(11) NOT NULL,
  `orgTeamID` int(11) NOT NULL,
  KEY `orgID_idx` (`orgID`),
  KEY `orgTeamID_idx` (`orgTeamID`),
  CONSTRAINT `orgTeamID` FOREIGN KEY (`orgTeamID`) REFERENCES `team` (`teamID`) ON DELETE CASCADE,
  CONSTRAINT `orgTeamLink` FOREIGN KEY (`orgID`) REFERENCES `organization` (`orgID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `org_teams`
--

LOCK TABLES `org_teams` WRITE;
/*!40000 ALTER TABLE `org_teams` DISABLE KEYS */;
/*!40000 ALTER TABLE `org_teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organization`
--

DROP TABLE IF EXISTS `organization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organization` (
  `orgID` int(11) NOT NULL AUTO_INCREMENT,
  `orgName` varchar(45) NOT NULL,
  PRIMARY KEY (`orgID`),
  UNIQUE KEY `orgName_UNIQUE` (`orgName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organization`
--

LOCK TABLES `organization` WRITE;
/*!40000 ALTER TABLE `organization` DISABLE KEYS */;
/*!40000 ALTER TABLE `organization` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statistic`
--

DROP TABLE IF EXISTS `statistic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `statistic` (
  `statID` int(11) NOT NULL AUTO_INCREMENT,
  `statSessionID` int(11) NOT NULL,
  `statTypeID` int(11) NOT NULL,
  `statValue` float NOT NULL,
  PRIMARY KEY (`statID`),
  UNIQUE KEY `statID_UNIQUE` (`statID`),
  KEY `statTypeLink_idx` (`statTypeID`),
  KEY `statSessionLink_idx` (`statSessionID`),
  CONSTRAINT `statSessionLink` FOREIGN KEY (`statSessionID`) REFERENCES `gaming_session` (`gamingSessionID`),
  CONSTRAINT `statTypeLink` FOREIGN KEY (`statTypeID`) REFERENCES `stattype` (`stattypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statistic`
--

LOCK TABLES `statistic` WRITE;
/*!40000 ALTER TABLE `statistic` DISABLE KEYS */;
INSERT INTO `statistic` VALUES (1,8,1,1),(2,8,2,1),(3,8,3,1),(4,8,4,1),(5,8,5,1),(6,8,6,1),(7,9,1,1),(8,9,2,1),(9,9,3,1),(10,9,4,1),(11,9,5,1),(12,9,6,1),(13,10,1,1),(14,10,2,1),(15,10,3,1),(16,10,4,1),(17,10,5,1),(18,10,6,1),(19,11,1,1),(20,11,2,1),(21,11,3,1),(22,11,4,1),(23,11,5,1),(24,11,6,1),(25,12,1,12),(26,12,2,1),(27,12,3,3),(28,12,4,4),(29,12,5,3),(30,12,6,1);
/*!40000 ALTER TABLE `statistic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stattype`
--

DROP TABLE IF EXISTS `stattype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stattype` (
  `stattypeID` int(11) NOT NULL AUTO_INCREMENT,
  `statName` varchar(30) NOT NULL,
  `statDesc` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`stattypeID`),
  UNIQUE KEY `stattypeID_UNIQUE` (`stattypeID`),
  UNIQUE KEY `statName_UNIQUE` (`statName`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stattype`
--

LOCK TABLES `stattype` WRITE;
/*!40000 ALTER TABLE `stattype` DISABLE KEYS */;
INSERT INTO `stattype` VALUES (1,'Kill/Frag',NULL),(2,'Death',NULL),(3,'Headshot',NULL),(4,'Bomb Plants',NULL),(5,'Rounds won',NULL),(6,'Game Win? (0/1)',NULL);
/*!40000 ALTER TABLE `stattype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `team` (
  `teamID` int(11) NOT NULL AUTO_INCREMENT,
  `teamName` varchar(45) NOT NULL,
  `teamGameID` int(11) NOT NULL,
  PRIMARY KEY (`teamID`),
  UNIQUE KEY `teamName_UNIQUE` (`teamName`),
  UNIQUE KEY `teamID_UNIQUE` (`teamID`),
  KEY `gameID_idx` (`teamGameID`),
  CONSTRAINT `gameteamID` FOREIGN KEY (`teamGameID`) REFERENCES `game` (`gameID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team`
--

LOCK TABLES `team` WRITE;
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
INSERT INTO `team` VALUES (1,'A-Team',1),(2,'League Team',2);
/*!40000 ALTER TABLE `team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_coaches`
--

DROP TABLE IF EXISTS `team_coaches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `team_coaches` (
  `teamID` int(11) NOT NULL AUTO_INCREMENT,
  `teamCoachID` int(11) NOT NULL,
  KEY `coachPlayerID_idx` (`teamCoachID`),
  KEY `teamCoachLink_idx` (`teamID`),
  CONSTRAINT `coachUserID` FOREIGN KEY (`teamCoachID`) REFERENCES `user` (`userID`),
  CONSTRAINT `teamCoachLink` FOREIGN KEY (`teamID`) REFERENCES `team` (`teamID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_coaches`
--

LOCK TABLES `team_coaches` WRITE;
/*!40000 ALTER TABLE `team_coaches` DISABLE KEYS */;
INSERT INTO `team_coaches` VALUES (1,6);
/*!40000 ALTER TABLE `team_coaches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_players`
--

DROP TABLE IF EXISTS `team_players`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `team_players` (
  `teamID` int(11) NOT NULL,
  `teamPlayerID` int(11) NOT NULL,
  KEY `teamPlayerLink_idx` (`teamID`),
  KEY `teamUserLink_idx` (`teamPlayerID`),
  CONSTRAINT `teamPlayerLink` FOREIGN KEY (`teamID`) REFERENCES `team` (`teamID`),
  CONSTRAINT `teamUserLink` FOREIGN KEY (`teamPlayerID`) REFERENCES `user` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_players`
--

LOCK TABLES `team_players` WRITE;
/*!40000 ALTER TABLE `team_players` DISABLE KEYS */;
INSERT INTO `team_players` VALUES (1,1),(1,2),(1,3),(1,4),(1,5);
/*!40000 ALTER TABLE `team_players` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `userLogin` varchar(20) NOT NULL,
  `userPass` varchar(20) NOT NULL,
  `userName` varchar(45) NOT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `userLogin_UNIQUE` (`userLogin`),
  UNIQUE KEY `userID_UNIQUE` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'koszanski','letmein','Maciej Koszanski'),(2,'appleseed','apple123','Johnnie Appleseed'),(3,'kowalski','polska1984','Janusz Kowalski'),(4,'stardust','manwhosoldtheworld','Ziggy Stardust'),(5,'snake','snake_eater','John Doe'),(6,'blackmamba','bill','Beatrix Kiddo');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'esportorgdb'
--

--
-- Dumping routines for database 'esportorgdb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-08-26  2:48:53
