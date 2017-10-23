-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: trail_sharing_project
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `albums`
--

DROP TABLE IF EXISTS `albums`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `albums` (
  `album_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `author_id` int(11) NOT NULL,
  `discription` varchar(50) NOT NULL,
  `pictures` set('Value A','Value B') NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `dislikes` int(11) NOT NULL DEFAULT '0',
  `loves` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`album_id`),
  KEY `author_album_FK1` (`author_id`),
  CONSTRAINT `author_album_FK1` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `albums`
--

LOCK TABLES `albums` WRITE;
/*!40000 ALTER TABLE `albums` DISABLE KEYS */;
/*!40000 ALTER TABLE `albums` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `short_content` tinytext NOT NULL,
  `content` mediumtext NOT NULL,
  `create_date` set('Value A','Value B') NOT NULL,
  `pictures` set('Value A','Value B') DEFAULT NULL,
  `comments` set('Value A','Value B') DEFAULT NULL,
  `likes` int(10) NOT NULL DEFAULT '0',
  `dislakes` int(10) NOT NULL DEFAULT '0',
  `loves` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`article_id`),
  KEY `article_author_FK1` (`author_id`),
  CONSTRAINT `article_author_FK1` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `about` varchar(20) NOT NULL,
  `about_id` int(11) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `dislakes` int(11) NOT NULL DEFAULT '0',
  `loves` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_id`),
  KEY `author_comment_FK1` (`author_id`),
  CONSTRAINT `author_comment_FK1` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum`
--

DROP TABLE IF EXISTS `forum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `discription` varchar(50) NOT NULL,
  `posts` set('Value A','Value B') NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `dislakes` int(11) NOT NULL DEFAULT '0',
  `loves` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum`
--

LOCK TABLES `forum` WRITE;
/*!40000 ALTER TABLE `forum` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `picture`
--

DROP TABLE IF EXISTS `picture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `picture` (
  `picture_id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `path` varchar(250) NOT NULL,
  `about` varchar(30) NOT NULL,
  `about_id` int(11) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `dislikes` int(11) NOT NULL DEFAULT '0',
  `loves` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`picture_id`),
  KEY `author_picture_FK1` (`author_id`),
  CONSTRAINT `author_picture_FK1` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `picture`
--

LOCK TABLES `picture` WRITE;
/*!40000 ALTER TABLE `picture` DISABLE KEYS */;
/*!40000 ALTER TABLE `picture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(50) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` mediumtext NOT NULL,
  `author_id` int(11) NOT NULL,
  `comments` set('Value A','Value B') NOT NULL,
  `likes` int(10) NOT NULL DEFAULT '0',
  `dislakes` int(10) NOT NULL DEFAULT '0',
  `loves` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`post_id`),
  KEY `post_author_FK1` (`author_id`),
  KEY `post_subject_FK2` (`subject_id`),
  CONSTRAINT `post_author_FK1` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `post_subject_FK2` FOREIGN KEY (`subject_id`) REFERENCES `forum` (`subject_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trails`
--

DROP TABLE IF EXISTS `trails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trails` (
  `trail_id` int(11) NOT NULL AUTO_INCREMENT,
  `trail_name` varchar(50) DEFAULT NULL,
  `coutry` varchar(50) NOT NULL,
  `author_id` int(11) NOT NULL,
  `region` varchar(50) NOT NULL,
  `location` varchar(250) NOT NULL,
  `approaches` text NOT NULL,
  `difficulty` varchar(50) NOT NULL,
  `discription` text NOT NULL,
  `pictures` set('Value A','Value B') DEFAULT NULL,
  `likes` int(10) NOT NULL DEFAULT '0',
  `dislakes` int(10) NOT NULL DEFAULT '0',
  `loves` int(10) NOT NULL DEFAULT '0',
  `comments` set('Value A','Value B') NOT NULL,
  PRIMARY KEY (`trail_id`),
  KEY `author_trail_FK1` (`author_id`),
  CONSTRAINT `author_trail_FK1` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trails`
--

LOCK TABLES `trails` WRITE;
/*!40000 ALTER TABLE `trails` DISABLE KEYS */;
/*!40000 ALTER TABLE `trails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_roles` (
  `role_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `dislikes` int(11) NOT NULL DEFAULT '0',
  `loves` int(11) NOT NULL DEFAULT '0',
  `user_name` varchar(20) NOT NULL,
  `photo_path` varchar(50) DEFAULT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `create_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `age` int(11) DEFAULT NULL,
  `gender` enum('Y','N') DEFAULT NULL,
  `birth_date` datetime DEFAULT NULL,
  `country` varchar(25) DEFAULT NULL,
  `town` varchar(25) DEFAULT NULL,
  `favorite_styles` tinytext,
  `participations` text,
  `records` text,
  `about_me` text,
  `articles_id` set('Value A','Value B') DEFAULT NULL,
  `forum_posts_id` set('Value A','Value B') DEFAULT NULL,
  `trails_id` set('Value A','Value B') DEFAULT NULL,
  `comments` set('Value A','Value B') DEFAULT NULL,
  `albums` set('Value A','Value B') DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id` (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  KEY `role_id_FK1` (`role_id`),
  CONSTRAINT `role_id_FK1` FOREIGN KEY (`role_id`) REFERENCES `user_roles` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2017-10-23 18:00:35
