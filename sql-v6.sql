-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: collab
-- ------------------------------------------------------
-- Server version	5.7.17-log

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
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classes` (
  `class_id` int(11) NOT NULL,
  `class_deptid` int(11) NOT NULL,
  `class_name` varchar(200) NOT NULL,
  `class_desc` varchar(500) NOT NULL,
  `class_code` varchar(7) NOT NULL,
  PRIMARY KEY (`class_id`),
  KEY `class_deptid_idx` (`class_deptid`),
  CONSTRAINT `class_deptid` FOREIGN KEY (`class_deptid`) REFERENCES `department` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classes`
--

LOCK TABLES `classes` WRITE;
/*!40000 ALTER TABLE `classes` DISABLE KEYS */;
INSERT INTO `classes` VALUES (1,9,'Basic Computer Concepts ','This course provides an overview of computers, number systems, data types and representations, digital logic systems, assembly and machine language, compilers and translators, operating systems, internetworking, human computer interactions, and intelligent systems','BASICON'),(2,9,'Basic Electronic Circuits ','This course introduces the student to the analysis and design of circuits using the basic electronic devices employed in computer hardware applications. A supervised group project provides the student with an opportunity to experience hands-on electronic circuit design and fabrication of real-world applications.','BASELEC'),(3,9,'Fundamentals of Computer Organization and Architecture','This course covers design considerations for implementing components of the von neumann computer, namely, the central processing unit, memory and I/O peripherals.','COMORGA'),(4,9,'Computer Architecture','This course covers design issues of computer architecture specifically on pipeline and instruction set design.','COMPARC'),(5,9,'Computer Programming in Assembly Language','This is a lecture course on Assembly language programming and the supplementary introduction on interfacing assembly code with C language programs.','COMPASM'),(6,9,'The PIC Microcontrollers and Applications','This course introduces the student to the PIC range of microcontrollers and goes into the specifics of the Microchip PIC16F84 and 16F877 microcontrollers to ensure understanding and familiarization. Projects will ensure that students will be able to interface and apply these microcontrollers to small-scale, real-time requirements that abound today.','PICCTRL'),(7,9,'Digital Image Processing','This course covers the fundamental concepts and practical application of Digital Signal Processing.','IMAGPRO'),(8,9,'Mathematics for CSE/NE','This course covers background mathematical skills for computer systems design, and engineering.','CT-MATH'),(9,9,'Computer Systems Engineering Research Methods','A course on methods of research where students learn the steps on how to do a research projects; a thesis proposal should be produced at the end of the course.','CTRESME'),(10,9,'Introduction to Feedback Control Systems','This course covers classical techniques for designing continuous-time feedback control systems. It covers system modeling, analysis, as well as compensation. Analysis of stability of feedback systems using root-locus, bode diagrams, nyquist plots, as well as the use of computer-aided design tools are also discussed. ','FBKCTRL'),(11,9,'Digital Electronics ','This Course is on the design and analysis of digital circuits. This course covers both combinational and sequential (synchronous and asynchronous) logic circuits with emphasis on solving digital problems using hardwired structures of the complexity of medium and large-scale integration.','DIGITAL'),(12,9,'Basic Digital Signal Processing','This course covers the fundamental concepts and practical applications of Digital Signal Processing.','BASCDSP'),(13,9,'Basic Electronic Communications System','Presents the general principles of electronic communication systems at a circuit and systems level. Emphasis is given on signal processing functions of various modulation and demodulation operations.','ELECOMM');
/*!40000 ALTER TABLE `classes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `college`
--

DROP TABLE IF EXISTS `college`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `college` (
  `college_id` int(11) NOT NULL,
  `college_code` varchar(45) NOT NULL,
  `college_name` varchar(45) NOT NULL,
  PRIMARY KEY (`college_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `college`
--

LOCK TABLES `college` WRITE;
/*!40000 ALTER TABLE `college` DISABLE KEYS */;
INSERT INTO `college` VALUES (1,'COB','Business'),(2,'CCS','Computer Studies'),(3,'CED','Education'),(4,'COE','Engineering'),(5,'CLA','Liberal Arts'),(6,'COL','Law'),(7,'COS','Science'),(8,'SOE','Economics');
/*!40000 ALTER TABLE `college` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_threadid` int(11) NOT NULL,
  `comment_desc` varchar(300) NOT NULL,
  `comment_datesub` varchar(45) NOT NULL,
  `comment_acctid` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,1,'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.','2017-03-2903:30:30',1),(2,1,'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.','2017-03-30 03:30:30',1);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_collegeid` int(11) NOT NULL,
  `department` varchar(45) NOT NULL,
  PRIMARY KEY (`dept_id`),
  KEY `collegeid_idx` (`dept_collegeid`),
  CONSTRAINT `collegeid` FOREIGN KEY (`dept_collegeid`) REFERENCES `college` (`college_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (1,1,'Accountancy'),(2,5,'Behavioral Sciences'),(3,7,'Biology'),(4,4,'Chemical Engineering'),(5,7,'Chemistry'),(6,4,'Civil Engineering'),(7,1,'Commercial Law'),(8,5,'Communication'),(9,2,'Computer Technology'),(10,3,'Counseling and Educational Psychology'),(11,1,'Decision Sciences and Innovation'),(12,8,'Economics'),(13,3,'Educational Leadership and Management'),(14,4,'Electronics and Communications Engineering'),(15,3,'English and Applied Linguistics'),(16,5,'Filipino'),(17,1,'Financial Management'),(18,5,'History'),(19,4,'Industrial Engineering'),(20,2,'Information Technology'),(21,5,'International Studies'),(22,6,'Law'),(23,5,'Literature'),(24,1,'Management and Organization'),(25,4,'Manufacturing Engineering and Management'),(26,1,'Marketing Management'),(27,7,'Mathematics'),(28,4,'Mechanical Engineering'),(29,5,'Philosophy'),(30,3,'Physical Education'),(31,7,'Physics'),(32,5,'Political Science'),(33,5,'Psychology'),(34,3,'Science Education'),(35,2,'Software Technology'),(36,5,'Theology and Religious Studies');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `followedclass`
--

DROP TABLE IF EXISTS `followedclass`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `followedclass` (
  `follow_classid` int(11) NOT NULL,
  `follow_acctid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `followedclass`
--

LOCK TABLES `followedclass` WRITE;
/*!40000 ALTER TABLE `followedclass` DISABLE KEYS */;
INSERT INTO `followedclass` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1);
/*!40000 ALTER TABLE `followedclass` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `followedthread`
--

DROP TABLE IF EXISTS `followedthread`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `followedthread` (
  `follow_threadid` int(11) NOT NULL,
  `follow_acctid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `followedthread`
--

LOCK TABLES `followedthread` WRITE;
/*!40000 ALTER TABLE `followedthread` DISABLE KEYS */;
/*!40000 ALTER TABLE `followedthread` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thread`
--

DROP TABLE IF EXISTS `thread`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `thread` (
  `thread_id` int(11) NOT NULL AUTO_INCREMENT,
  `thread_classid` int(11) NOT NULL,
  `thread_title` varchar(200) NOT NULL,
  `thread_desc` varchar(300) NOT NULL,
  `thread_datesub` datetime NOT NULL,
  `thread_acctid` int(11) NOT NULL,
  PRIMARY KEY (`thread_id`),
  KEY `thread_acctid_idx` (`thread_acctid`),
  KEY `thread_classid_idx` (`thread_classid`),
  CONSTRAINT `thread_classid` FOREIGN KEY (`thread_classid`) REFERENCES `classes` (`class_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thread`
--

LOCK TABLES `thread` WRITE;
/*!40000 ALTER TABLE `thread` DISABLE KEYS */;
INSERT INTO `thread` VALUES (1,4,'The quick brown fox jumps over the lazy dog','Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. ','2017-03-28 03:30:30',1),(2,5,'Twinkle Twinkle Little Star','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','2017-03-28 03:50:40',1),(3,2,'aaa','aaaa','2017-03-30 18:54:06',2),(4,3,'aaa','aaaaa','2017-03-30 18:57:56',2),(5,3,'aaa','aaaaa','2017-03-30 18:57:56',2),(6,1,'abc','asa','2017-03-30 18:59:39',2),(7,1,'a','a','2017-03-30 19:02:49',2),(8,3,'a','a','2017-03-31 13:59:35',2);
/*!40000 ALTER TABLE `thread` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `threadview`
--

DROP TABLE IF EXISTS `threadview`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `threadview` (
  `view_threadid` int(11) NOT NULL AUTO_INCREMENT,
  `view_date` datetime NOT NULL,
  `view_acctid` int(11) NOT NULL,
  KEY `threadid_idx` (`view_threadid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `threadview`
--

LOCK TABLES `threadview` WRITE;
/*!40000 ALTER TABLE `threadview` DISABLE KEYS */;
/*!40000 ALTER TABLE `threadview` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_acct`
--

DROP TABLE IF EXISTS `user_acct`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_acct` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `idnumber` varchar(8) NOT NULL,
  `degree` varchar(45) NOT NULL,
  `college` varchar(45) NOT NULL,
  `lastlogin` datetime DEFAULT NULL,
  `Fullname` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_acct`
--

LOCK TABLES `user_acct` WRITE;
/*!40000 ALTER TABLE `user_acct` DISABLE KEYS */;
INSERT INTO `user_acct` VALUES (2,'mary@dlsu.edu.ph','abcdefgh','11111111','CS-NE','SOE','2017-04-01 23:36:21','Test Lang'),(6,'test@dlsu.edu.ph','testest','11111111','CS-ST','COB','2017-04-01 15:26:51','Test 1');
/*!40000 ALTER TABLE `user_acct` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-02  0:07:53
