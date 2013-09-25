-- MySQL dump 10.13  Distrib 5.5.29, for osx10.6 (i386)
--
-- Host: localhost    Database: lamp_final_project
-- ------------------------------------------------------
-- Server version	5.5.29
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Category`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Category` (
  `Category_ID` int(11) NOT NULL,
  `CategoryName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Category_ID`)
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` VALUES (1,'For Sales');
INSERT INTO `Category` VALUES (2,'Services');
INSERT INTO `Category` VALUES (3,'Jobs');

--
-- Table structure for table `Location`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Location` (
  `Location_ID` int(11) NOT NULL,
  `Region_ID` int(11) DEFAULT NULL,
  `LocationName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Location_ID`),
  KEY `Region_ID` (`Region_ID`),
  CONSTRAINT `Location_ibfk_1` FOREIGN KEY (`Region_ID`) REFERENCES `Region` (`Region_ID`)
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Location`
--

INSERT INTO `Location` VALUES (1,1,'Cupertino');
INSERT INTO `Location` VALUES (2,2,'Mumbai');
INSERT INTO `Location` VALUES (3,3,'Stockholm');

--
-- Table structure for table `Region`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Region` (
  `Region_ID` int(11) NOT NULL,
  `RegionName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Region_ID`)
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Region`
--

INSERT INTO `Region` VALUES (1,'USA');
INSERT INTO `Region` VALUES (2,'India');
INSERT INTO `Region` VALUES (3,'Sweden');

--
-- Table structure for table `SubCategory`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SubCategory` (
  `SubCategory_ID` int(11) NOT NULL,
  `Category_ID` int(11) DEFAULT NULL,
  `SubCategoryName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`SubCategory_ID`),
  KEY `Category_ID` (`Category_ID`),
  CONSTRAINT `SubCategory_ibfk_1` FOREIGN KEY (`Category_ID`) REFERENCES `Category` (`Category_ID`)
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SubCategory`
--

INSERT INTO `SubCategory` VALUES (1,1,'Books');
INSERT INTO `SubCategory` VALUES (2,1,'Electronics');
INSERT INTO `SubCategory` VALUES (3,1,'Household');
INSERT INTO `SubCategory` VALUES (4,2,'Computer');
INSERT INTO `SubCategory` VALUES (5,2,'Financial');
INSERT INTO `SubCategory` VALUES (6,2,'Lessons');
INSERT INTO `SubCategory` VALUES (7,3,'Full-Time');
INSERT INTO `SubCategory` VALUES (8,3,'Part-Time');
INSERT INTO `SubCategory` VALUES (9,3,'Volunteering');

--
-- Table structure for table `login`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `ID` mediumint(9) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

INSERT INTO `login` VALUES (0,'as','9003d1df22eb4d3820015070385194c8','as@b.com');

--
-- Table structure for table `posts`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `POST_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(50) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Description` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Agreement` varchar(50) DEFAULT NULL,
  `TimeStamp` int(11) DEFAULT NULL,
  `Image_1` blob,
  `Image_2` blob,
  `Image_3` blob,
  `Image_4` blob,
  `Subcategory_ID` int(11) DEFAULT NULL,
  `Location_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`POST_ID`),
  KEY `Subcategory_ID` (`Subcategory_ID`),
  KEY `Location_ID` (`Location_ID`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`Subcategory_ID`) REFERENCES `SubCategory` (`SubCategory_ID`),
  CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`Location_ID`) REFERENCES `Location` (`Location_ID`)
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` VALUES (1,'Dell Laptop ',2000,'Excellent condition','a@b.com',NULL,NULL,'dell.jpg','dell.jpg','dell.jpg','dell.jpg',2,3);
INSERT INTO `posts` VALUES (4,'Harry porter',2000,'Excellent condition','a@b.com',NULL,NULL,'harryPorter1.jpeg','harryPorter1.jpeg','harryPorter1.jpeg','harryPorter1.jpeg',1,2);
INSERT INTO `posts` VALUES (5,'Harry porter',2000,'Excellent condition','a@b.com',NULL,NULL,'harryPorter1.jpeg','harryPorter1.jpeg','harryPorter1.jpeg','harryPorter1.jpeg',1,2);
INSERT INTO `posts` VALUES (6,'Lord of the Rings',200,'Excelllent Condition','a@b.com',NULL,NULL,'lotr.jpeg','lotr.jpeg','lotr.jpeg','lotr.jpeg',1,3);
INSERT INTO `posts` VALUES (7,'Issav Assimov',250,'Excelllent Condition','a@b.com',NULL,NULL,'20-7.jpg','20-7.jpg','20-7.jpg','20-7.jpg',1,1);
INSERT INTO `posts` VALUES (8,'iMAC',1200,'Superb condition','a@b.com',NULL,NULL,'mac_2.jpg','mac_2.jpg','pink-apple-mac-laptop.gif','pink-apple-mac-laptop.gif',2,3);
INSERT INTO `posts` VALUES (9,'iPAD',600,'3 months old iPAD ','c@d.com',NULL,NULL,'ipad_1.jpeg','ipad_2.png','ipad_1.jpeg','ipad_1.jpeg',2,2);
INSERT INTO `posts` VALUES (10,'USed Chairs',30,'Rarely used , No cracks','d@e.com',NULL,NULL,'Chair_1.jpg','Chair_2.jpg','Chair_2.jpg','Chair_1.jpg',3,2);
INSERT INTO `posts` VALUES (11,'coffee Table ',38,'used table for sale','a@c.com',NULL,NULL,'Table_1.jpg','Table_2.jpg','Table_1.jpg','Table_2.jpg',3,3);
INSERT INTO `posts` VALUES (12,'Lamp shades for living room',100,'Rarely used , working condition','x@y.com',NULL,NULL,'Lamp_1.jpg','Lamp_2.jpg','Lamp_1.jpg','Lamp_2.jpg',3,1);
INSERT INTO `posts` VALUES (13,'Used Iphone 5',300,'Minor scrathes, but works well','f@g.com',NULL,NULL,'iph_5s.jpeg','iph5_1.jpg','iph_5s.jpeg','iph5_1.jpg',2,1);
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-09-10 22:13:28
