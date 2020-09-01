-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: localhost    Database: tanteemmadb
-- ------------------------------------------------------
-- Server version	8.0.21

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
-- Table structure for table `angebot`
--

DROP TABLE IF EXISTS `angebot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `angebot` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `visual` varchar(255) NOT NULL,
  `kalender_woche` int NOT NULL,
  `detail_link` varchar(255) NOT NULL,
  `filiale_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `filiale_id` (`filiale_id`),
  CONSTRAINT `angebot_ibfk_1` FOREIGN KEY (`filiale_id`) REFERENCES `filiale` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `angebot`
--

LOCK TABLES `angebot` WRITE;
/*!40000 ALTER TABLE `angebot` DISABLE KEYS */;
INSERT INTO `angebot` VALUES (30,'Lawn Defender Ad 1','@web/angebotVisuals/Lawn Defender Ad 1_1.png',36,'https://finnbossen.itch.io/lawn-defender',1),(31,'Lawn Defender Ad 2','@web/angebotVisuals/Cool ad 2_2.png',36,'https://finnbossen.itch.io/lawn-defender',1),(32,'Rewind Slab Ad 1','@web/angebotVisuals/Cool ad 3_StartBildschirm.png',36,'https://finnbossen.itch.io/rewind-slab',1),(33,'Rewind Slab Ad 2','@web/angebotVisuals/Cool ad 4_Screenshot 1.png',36,'https://finnbossen.itch.io/rewind-slab',1),(34,'Mole Escape Ad1','@web/angebotVisuals/Mole Escape Ad1_nk61kn.png',36,'https://finnbossen.itch.io/mole-escape',1),(35,'Mole Escape Ad2','@web/angebotVisuals/Mole Escape Ad2_J4ZHua.png',36,'https://finnbossen.itch.io/mole-escape',1),(36,'Random ad 1','https://via.placeholder.com/300x250.png',36,'http://minecraftstal.com/',1),(37,'Random ad 2','https://via.placeholder.com/300x250.png',36,'http://www.riddlydiddly.com/',1),(38,'Random ad 3','https://via.placeholder.com/300x250.png',36,'http://leekspin.com/',1),(39,'Random ad 4','https://via.placeholder.com/300x250.png',36,'http://www.electricboogiewoogie.com/',1),(40,'Random ad 5','https://via.placeholder.com/300x250.png',36,'http://www.trypap.com/',1),(41,'Random ad 6','https://via.placeholder.com/300x250.png',36,'http://www.trypap.com/',1),(43,'fafas','https://via.placeholder.com/300x250.png',36,'http://www.wutdafuk.com/',14),(44,'asff','https://via.placeholder.com/300x250.png',36,'http://www.koalastothemax.com/',3),(45,'fsaf','https://via.placeholder.com/300x250.png',36,'http://imaninja.com/',14),(46,'affsa','https://via.placeholder.com/300x250.png',2,'http://www.ismycomputeron.com/',3),(47,'faf','https://via.placeholder.com/300x250.png',35,'http://burymewithmymoney.com/',16),(48,'fsaf','https://via.placeholder.com/300x250.png',35,'http://noot.space/',14),(49,'Random ad 7','https://via.placeholder.com/300x250.png',35,'http://www.staggeringbeauty.com/',1),(50,'Random ad 6','https://via.placeholder.com/300x250.png',35,'http://www.staggeringbeauty.com/',1),(51,'Cool ad','@web/angebotVisuals/Cool ad_Screenshot 3.png',35,'https://finnbossen.itch.io/rewind-slab',1),(52,'random title','https://via.placeholder.com/300x250.png',35,'http://crouton.net/',14),(53,'random title 1','https://via.placeholder.com/300x250.png',35,'http://www.ouaismaisbon.ch/',14),(54,'random title 2','https://via.placeholder.com/300x250.png',35,'http://www.pointerpointer.com/',16),(55,'random title 4','https://via.placeholder.com/300x250.png',35,'http://giantbatfarts.com/',16),(56,'random title 3','https://via.placeholder.com/300x250.png',35,'http://beesbeesbees.com/',3),(57,'random title 5','https://via.placeholder.com/300x250.png',35,'http://heeeeeeeey.com/',3),(58,'random title 9','https://via.placeholder.com/300x250.png',35,'http://zombo.com',15),(59,'random title 11','https://via.placeholder.com/300x250.png',35,'http://www.muchbetterthanthis.com/',15),(60,'random title 12','https://via.placeholder.com/300x250.png',35,'http://www.ismycomputeron.com/',13),(61,'random title 13','https://via.placeholder.com/300x250.png',35,'http://www.pleasedonate.biz/',13),(62,'Cool ad','@web/angebotVisuals/Cool ad_Screenshot 4.png',35,'https://finnbossen.itch.io/rewind-slab',9);
/*!40000 ALTER TABLE `angebot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `filiale`
--

DROP TABLE IF EXISTS `filiale`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `filiale` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `titel` varchar(55) NOT NULL,
  `standort` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filiale`
--

LOCK TABLES `filiale` WRITE;
/*!40000 ALTER TABLE `filiale` DISABLE KEYS */;
INSERT INTO `filiale` VALUES (1,'flt','Flensburg'),(2,'sln','Schleswig'),(3,'efz','Eckernförde'),(4,'nft','Niebüll'),(5,'syr','Sylt'),(6,'inb','Wyk auf Föhr'),(7,'hun','Husum'),(8,'lza','Rendsburg'),(9,'hoc','Neumünster'),(10,'nra','Itzehoe'),(11,'nrg','Glücksstadt'),(12,'wiz','Wilster'),(13,'oha','Eutin'),(14,'stt','Bad Oldesloe'),(15,'eln','Elmshorn'),(16,'baz','Barmstedt'),(17,'pit','Pinneberg'),(18,'qbt','Quickborn'),(19,'sft','Schenefeld'),(20,'wet','Wedel'),(21,'slb','Lübz'),(22,'spa','Parchim'),(23,'sgu','Güstrow'),(24,'sga','Gadebusch'),(25,'sha','Hagenow'),(26,'slu','Ludwigslust'),(27,'pri','Perlenberg'),(28,'sst','Sternberg'),(29,'ssn','Schwerin'),(30,'nnn','Rostock');
/*!40000 ALTER TABLE `filiale` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth_key` varchar(255) NOT NULL,
  `access_token` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (4,'coolGuy','$2y$13$OnMupjfJCNudxja0BivSb.Bd4g9/MiDQCsH2lraDy.CaPdtahebDK','OVuZJ7149E4tcUUxuHtOy8joCvyElVjt','rutLJ8QlzsrapWj-lXZLdWUiLXNAUQVh'),(5,'admin','$2y$13$dBY7Gl0fzgaBbwKl0ucorOzOTOKe/7eCvyB39OnTY4HzN6026tjua','rdPeVwYCyCMrgvi1sYvTXmK4leXm6-k9','NbpUOBwSkl7n9lZrmKXu7jXU_NHXhfkZ');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-01  6:35:26
