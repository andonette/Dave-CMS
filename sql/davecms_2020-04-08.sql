# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.26)
# Database: davecms
# Generation Time: 2020-04-08 13:37:47 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `cat_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`cat_id`, `cat_title`)
VALUES
	(10,'Vulcan Space Missions To Die For In Space'),
	(11,'The United Federation Of Planets!'),
	(12,'Intergalactic Klingon Warfare'),
	(13,'The Borg Cube'),
	(23,'Romulan Secrets I know of');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `post_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `post_category_id` int(11) DEFAULT NULL,
  `post_title` varchar(255) DEFAULT NULL,
  `post_author` varchar(255) DEFAULT NULL,
  `post_date` date DEFAULT NULL,
  `post_image` text,
  `post_content` text,
  `post_author_image` text,
  `post_tags` varchar(255) DEFAULT NULL,
  `post_comment_count` int(11) DEFAULT NULL,
  `post_status` varchar(355) DEFAULT 'Draft',
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_author_image`, `post_tags`, `post_comment_count`, `post_status`)
VALUES
	(1,NULL,'Smooth As An Android\'s Bottom','Data','0001-01-01','space-1','Eh, Data? A surprise party? Mr. Worf, I hate surprise parties. I would *never* do that to you. For an android with no feelings, he sure managed to evoke them in others. Fear is the true enemy, the only enemy. This is not about revenge. This is about justice. What? We\'re not at all alike! I think you\'ve let your personal feelings cloud your judgement. Is it my imagination, or have tempers become a little frayed on the ship lately? In all trust, there is the possibility for betrayal. My oath is between Captain Kargan and myself. Your only concern is with how you obey my orders. Or do you prefer the rank of prisoner to that of lieutenant? The Enterprise computer system is controlled by three primary main processor cores, cross-linked with a redundant melacortz ramistat, fourteen kiloquad interface modules.',NULL,'Androids, Enterprise',NULL,'Draft'),
	(2,NULL,'I Guess It\'s Better To Be Lucky Than Good.','Wesley Crusher','0001-01-20','space-2','Maybe if we felt any human loss as keenly as we feel one of those close to us, human history would be far less bloody. I am your worst nightmare! Maybe we better talk out here; the observation lounge has turned into a swamp. Mr. Worf, you do remember how to fire phasers? You enjoyed that. Mr. Crusher, ready a collision course with the Borg ship. Wait a minute - you\'ve been declared dead. You can\'t give orders around here. The game\'s not big enough unless it scares you a little. Why don\'t we just give everybody a promotion and call it a night - \'Commander\'? I think you\'ve let your personal feelings cloud your judgement. And blowing into maximum warp speed, you appeared for an instant to be in two places at once.',NULL,'Warp Speed, Borg',NULL,'Draft'),
	(3,NULL,'Dealing In Stolen Ore','Quark','0001-01-21','space-3',' But I wanna talk about the assassination attempt on Lieutenant Worf. Sorry, Data. But the probability of making a six is no greater than that of rolling a seven. What? We\'re not at all alike! Some days you get the bear, and some days the bear gets you. Maybe if we felt any human loss as keenly as we feel one of those close to us, human history would be far less bloody. We finished our first sensor sweep of the neutral zone. Some days you get the bear, and some days the bear gets you. A surprise party? Mr. Worf, I hate surprise parties. I would *never* do that to you.',NULL,'Cardassians, Parties',NULL,'Draft');

/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
