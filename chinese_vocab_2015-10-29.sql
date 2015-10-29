# ************************************************************
# Sequel Pro SQL dump
# Version 4468
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.25)
# Database: chinese_vocab
# Generation Time: 2015-10-29 15:42:12 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table symbols
# ------------------------------------------------------------

DROP TABLE IF EXISTS `symbols`;

CREATE TABLE `symbols` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `symbol` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `symbols` WRITE;
/*!40000 ALTER TABLE `symbols` DISABLE KEYS */;

INSERT INTO `symbols` (`id`, `symbol`)
VALUES
	(1,'的'),
	(2,'是'),
	(3,'不'),
	(4,'我'),
	(5,'一'),
	(6,'有'),
	(7,'大'),
	(8,'在'),
	(9,'人'),
	(10,'了'),
	(11,'中'),
	(12,'到'),
	(13,'资'),
	(14,'要'),
	(15,'可'),
	(16,'以'),
	(17,'这'),
	(18,'个'),
	(19,'你'),
	(20,'会'),
	(21,'好'),
	(22,'为'),
	(23,'上'),
	(24,'来'),
	(25,'就'),
	(26,'学'),
	(27,'交'),
	(28,'也'),
	(29,'用'),
	(30,'能'),
	(31,'如'),
	(32,'文'),
	(33,'时'),
	(34,'没'),
	(35,'说'),
	(36,'他'),
	(37,'看'),
	(38,'提'),
	(39,'那'),
	(40,'问'),
	(41,'生'),
	(42,'过'),
	(43,'下'),
	(44,'请'),
	(45,'天'),
	(46,'们'),
	(47,'所'),
	(48,'多'),
	(49,'麽'),
	(50,'小'),
	(51,'想'),
	(52,'得'),
	(53,'之'),
	(54,'还'),
	(55,'电'),
	(56,'出'),
	(57,'工'),
	(58,'对'),
	(59,'都'),
	(60,'机'),
	(61,'自'),
	(62,'后'),
	(63,'子'),
	(64,'而'),
	(65,'讯'),
	(66,'站'),
	(67,'去'),
	(68,'心'),
	(69,'只'),
	(70,'家'),
	(71,'知'),
	(72,'国'),
	(73,'台'),
	(74,'很'),
	(75,'信'),
	(76,'成'),
	(77,'章'),
	(78,'何'),
	(79,'同'),
	(80,'道'),
	(81,'地'),
	(82,'发'),
	(83,'法'),
	(84,'无'),
	(85,'然'),
	(86,'但'),
	(87,'吗'),
	(88,'当'),
	(89,'于'),
	(90,'本'),
	(91,'现'),
	(92,'年'),
	(93,'前'),
	(94,'真'),
	(95,'最'),
	(96,'和'),
	(97,'新'),
	(98,'因'),
	(99,'果'),
	(100,'定');

/*!40000 ALTER TABLE `symbols` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
