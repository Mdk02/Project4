CREATE DATABASE  IF NOT EXISTS `mydb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `mydb`;
-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: localhost    Database: mydb
-- ------------------------------------------------------
-- Server version	8.0.25

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
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `IdCategory` int NOT NULL AUTO_INCREMENT,
  `NameCategory` varchar(45) NOT NULL,
  PRIMARY KEY (`IdCategory`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order` (
  `IdOrder` int NOT NULL,
  `IdUser` int NOT NULL,
  `Sum` double NOT NULL,
  `DateOrder` date NOT NULL,
  `ArrivalDate` date DEFAULT NULL,
  `Status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`IdOrder`),
  KEY `User_idx` (`IdUser`),
  CONSTRAINT `User` FOREIGN KEY (`IdUser`) REFERENCES `users` (`idUsers`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `order_product`
--

DROP TABLE IF EXISTS `order_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_product` (
  `IdOrder` int NOT NULL,
  `IdProduct` int NOT NULL,
  `Count` int NOT NULL,
  `IdOrderProduct` int NOT NULL,
  PRIMARY KEY (`IdOrderProduct`),
  KEY `Product_idx` (`IdProduct`),
  KEY `Order_idx` (`IdOrder`),
  CONSTRAINT `FK_Orderproduct_product` FOREIGN KEY (`IdProduct`) REFERENCES `product` (`IdProduct`),
  CONSTRAINT `Order` FOREIGN KEY (`IdOrder`) REFERENCES `order` (`IdOrder`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `IdProduct` int NOT NULL AUTO_INCREMENT,
  `NameProduct` varchar(100) NOT NULL,
  `PriceProduct` double NOT NULL,
  `DescriptionProduct` varchar(1400) DEFAULT NULL,
  `CountInStock` int NOT NULL DEFAULT '0',
  `Discount` double NOT NULL DEFAULT '0',
  `IdCategory` int NOT NULL,
  `Score` decimal(2,1) DEFAULT '0.0',
  PRIMARY KEY (`IdProduct`),
  KEY `Category_idx` (`IdCategory`),
  CONSTRAINT `Category` FOREIGN KEY (`IdCategory`) REFERENCES `category` (`IdCategory`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `product_properties`
--

DROP TABLE IF EXISTS `product_properties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_properties` (
  `IdProductProperties` int NOT NULL AUTO_INCREMENT,
  `Value` varchar(400) NOT NULL,
  `IdCharacteristic` int NOT NULL,
  `IdProduct` int NOT NULL,
  PRIMARY KEY (`IdProductProperties`),
  KEY `Characteristic_idx` (`IdCharacteristic`),
  KEY `Product_idx` (`IdProduct`),
  CONSTRAINT `Characteristic` FOREIGN KEY (`IdCharacteristic`) REFERENCES `сharacteristic` (`IdСharacteristic`),
  CONSTRAINT `Product2` FOREIGN KEY (`IdProduct`) REFERENCES `product` (`IdProduct`)
) ENGINE=InnoDB AUTO_INCREMENT=6123 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role` (
  `NameRole` varchar(45) NOT NULL,
  `IdRole` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`IdRole`),
  UNIQUE KEY `NameRole_UNIQUE` (`NameRole`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sales_history`
--

DROP TABLE IF EXISTS `sales_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sales_history` (
  `IdSalesHistory` int NOT NULL,
  `IdProduct` int NOT NULL,
  `Count` int NOT NULL,
  `Price` double NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`IdSalesHistory`),
  KEY `Product_idx` (`IdProduct`),
  CONSTRAINT `Product1` FOREIGN KEY (`IdProduct`) REFERENCES `product` (`IdProduct`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `idUsers` int NOT NULL AUTO_INCREMENT,
  `SurnameUser` varchar(45) NOT NULL,
  `NameUser` varchar(45) NOT NULL,
  `LastnameUser` varchar(45) DEFAULT NULL,
  `BirthDay` date NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Login` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `IdRole` int DEFAULT NULL,
  PRIMARY KEY (`idUsers`),
  UNIQUE KEY `Email_UNIQUE` (`Email`),
  UNIQUE KEY `Login_UNIQUE` (`Login`),
  KEY `Role_idx` (`IdRole`),
  CONSTRAINT `Role` FOREIGN KEY (`IdRole`) REFERENCES `role` (`IdRole`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `сharacteristic`
--

DROP TABLE IF EXISTS `сharacteristic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `сharacteristic` (
  `IdСharacteristic` int NOT NULL AUTO_INCREMENT,
  `NameСharacteristic` varchar(100) NOT NULL,
  PRIMARY KEY (`IdСharacteristic`),
  UNIQUE KEY `NameСharacteristic_UNIQUE` (`NameСharacteristic`)
) ENGINE=InnoDB AUTO_INCREMENT=269 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `сomment`
--

DROP TABLE IF EXISTS `сomment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `сomment` (
  `IdСomment` int NOT NULL,
  `IdUser` int NOT NULL,
  `IdProduct` int NOT NULL,
  `DateOfCreate` date NOT NULL,
  `Score` float NOT NULL,
  `CommentText` mediumtext,
  PRIMARY KEY (`IdСomment`),
  KEY `User_idx` (`IdUser`),
  KEY `Product_idx` (`IdProduct`),
  CONSTRAINT `Product4` FOREIGN KEY (`IdProduct`) REFERENCES `product` (`IdProduct`),
  CONSTRAINT `User2` FOREIGN KEY (`IdUser`) REFERENCES `users` (`idUsers`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-02  9:54:07
