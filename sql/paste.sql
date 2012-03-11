-- MySQL dump 10.13  Distrib 5.5.15, for osx10.6 (i386)
--
-- Host: localhost    Database: paste
-- ------------------------------------------------------
-- Server version	5.5.15

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
-- Table structure for table `code`
--

DROP TABLE IF EXISTS `code`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `code` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `source` longblob,
  `language_id` int(15) NOT NULL,
  `created` datetime NOT NULL,
  `finish` datetime NOT NULL,
  `status` int(3) DEFAULT '1',
  `url` varchar(15) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `code`
--

LOCK TABLES `code` WRITE;
/*!40000 ALTER TABLE `code` DISABLE KEYS */;
/*!40000 ALTER TABLE `code` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `language`
--

DROP TABLE IF EXISTS `language`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `language` (
  `id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `value` varchar(45) NOT NULL,
  `count` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `language`
--

LOCK TABLES `language` WRITE;
/*!40000 ALTER TABLE `language` DISABLE KEYS */;
INSERT INTO `language` VALUES (1,'unknow','none',0),(2,'ABAP','abap',0),(3,'ActionScript','actionscript',0),(4,'&nbsp;&nbsp;ActionScript (French Doc Links)','actionscript-french',0),(5,'Ada','ada',0),(6,'Apache Log File','apache',0),(7,'AppleScript','applescript',0),(8,'ASM (NASM based)','asm',0),(9,'AutoIT','autoit',0),(10,'Bash','bash',0),(11,'BlitzBasic','blitzbasic',0),(12,'Backus-Naur form','bnf',0),(13,'C','c',0),(14,'C for Macs','c_mac',0),(15,'CAD DCL','caddcl',0),(16,'CAD Lisp','cadlisp',0),(17,'CFDG','cfdg',0),(18,'ColdFusion','cfm',0),(19,'C++','cpp',0),(20,'&nbsp;&nbsp;C++/QT','cpp-qt',0),(21,'C#','csharp',0),(22,'CSS','css',0),(23,'D','d',0),(24,'Delphi','delphi',0),(25,'Diff','diff',0),(26,'DIV','div',0),(27,'DOS','dos',0),(28,'GraphViz','dot',0),(29,'Eiffel','eiffel',0),(30,'Fortran','fortran',0),(31,'FreeBasic','freebasic',0),(32,'Genero (4GL)','genero',0),(33,'glSlang','glsl',0),(34,'GML','gml',0),(35,'Groovy','groovy',0),(36,'Haskell','haskell',0),(37,'HTML (4.0.1)','html4strict',0),(38,'Uno IDL','idl',0),(39,'Inno','inno',0),(40,'IO','io',0),(41,'Java','java',0),(42,'&nbsp;&nbsp;Java 5','java5',0),(43,'Javascript','javascript',0),(44,'LaTeX','latex',0),(45,'Lisp','lisp',0),(46,'Lua','lua',0),(47,'Matlab','matlab',0),(48,'mIRC','mirc',0),(49,'MPASM','mpasm',0),(50,'MySQL','mysql',0),(51,'NullSoft Installer','nsis',0),(52,'Objective C','objc',0),(53,'&nbsp;&nbsp;OCaml (Brief)','ocaml-brief',0),(54,'Pascal','pascal',0),(55,'Per (4GL)','per',0),(56,'Perl','perl',0),(57,'PHP','php',0),(58,'&nbsp;&nbsp;PHP (Brief version)','php-brief',0),(59,'PL/SQL','plsql',0),(60,'Python','python',0),(61,'QBasic/QuickBASIC','qbasic',0),(62,'Rails','rails',0),(63,'Windows Registry','reg',0),(64,'robots.txt','robots',0),(65,'Ruby','ruby',0),(66,'SAS','sas',0),(67,'Scheme','scheme',0),(68,'SDLBasic','sdlbasic',0),(69,'Smalltalk','smalltalk',0),(70,'Smarty','smarty',0),(71,'SQL','sql',0),(72,'TCL','tcl',0),(73,'Plain text','text',0),(74,'thinBasic','thinbasic',0),(75,'T-SQL','tsql',0),(76,'VisualBasic','vb',0),(77,'VB.NET','vbnet',0),(78,'VHDL','vdhl',0),(79,'VisualFoxPro','visualfoxpro',0),(80,'Winbatch','winbatch',0),(81,'XML','xml',0),(82,'X++','xpp',0),(83,'Z80 Assembler','z80',0);
/*!40000 ALTER TABLE `language` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-03-11 15:51:53
