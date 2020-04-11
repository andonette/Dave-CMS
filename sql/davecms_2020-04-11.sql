# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.26)
# Database: davecms
# Generation Time: 2020-04-11 16:11:45 +0000
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
	(1,'WordCamp'),
	(2,'Work Life');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `comment_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_id` int(11) DEFAULT NULL,
  `comment_author` varchar(255) DEFAULT NULL,
  `comment_email` varchar(255) DEFAULT NULL,
  `comment_content` varchar(255) DEFAULT NULL,
  `comment_status` varchar(255) DEFAULT NULL,
  `comment_date` date DEFAULT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`)
VALUES
	(1,1,'Andi Wilkinson','andonette@mac.com','Great post, thanks for sharing','approved','2020-04-10'),
	(2,1,'Matt Wilkinson','wilko997@me.com','It was great to hear this news, congratulations!','approved','2020-04-10'),
	(3,2,'Andi Wilkinson','andonette@mac.com','Wow I love this design, so retro!','approved','2020-04-10'),
	(5,1,'Ben Tennant','ben@madebyfactory.com','Thats Ace News That Is!','unapproved','2020-04-10'),
	(6,1,'Ben Tennant','ben@madebyfactory.com','Thats Ace News That Is!','unapproved','2020-04-10');

/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `post_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `post_title` varchar(255) DEFAULT NULL,
  `post_date` text,
  `post_category_id` int(11) DEFAULT NULL,
  `post_author` varchar(255) DEFAULT NULL,
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

INSERT INTO `posts` (`post_id`, `post_title`, `post_date`, `post_category_id`, `post_author`, `post_image`, `post_content`, `post_author_image`, `post_tags`, `post_comment_count`, `post_status`)
VALUES
	(1,'Ive joined the board of Manchester Digital','2020-04-10 10:24:00',2,'Andonette Wilkinson','CreativJam-Event-23.jpg','So this year I will join the 2019 board of Manchester Digital. They are the largest specialist trade body in the North of England.\r\n\r\nI was one of two new members elected to the board last week. Manchester Digital Members voted from a choice of candidates across the region. There were 22 nominees/\r\n\r\nI know i have mentioned it before but my digital agency is Factory. We were named by Google as one of the top 30 high potential growth agencies in the UK. Google help ambitious companies with their digital marketing campaigns which accelerates their growth.',NULL,'Speaking',6,'Published'),
	(2,'Designing WordCamp Manchester 2018','2020-04-10 10:24:46',1,'Andonette Wilkinson','LanyardMock-up-badge.jpg','I love a good WordCamp and I have been happy to have been part of the organiser team for Manchester for several years. The WordPress Community is a fantastic group of people and I have made lots of friends there.\r\n\r\nThis year I was proud to be asked to lead the design team for the 2018 Manchester Event. After the 2017 Event, I sat down with this year’s Lead Organiser in Mackie Mayor & we started to thrash out ideas for the design.\r\n\r\nThis year WordPress turned 15, so I decided to give this years design a theme celebrating just that: Retro tech. Sure, being a woman of a certain age, means I recall things like pac man, the Sony Walkman, Ataris and more, and lets face it, we are looking at 30 years more than 15, but when it comes to colourful graphics no one is counting, It was all in the spirit of cool old stuff that makes us feel warm and fuzzy. I wanted to somehow combine this idea with an overall pop art look.',NULL,'Design, WordCamp',4,'Published'),
	(3,'Im a finalist for business person of the year!','2020-04-11 16:49:40',1,'Andonette Wilkinson','andi.jpg','This year Im a finalist for this year’s business person of the year in the Rochdale Borough.\r\n\r\nThis is my second time in the finals in this category. Made by Factory was also best upcoming business  in 2016.\r\n\r\nMy nomination was largely due to my efforts in the borough to bring small business up to date with digital.\r\n\r\nI’ve been serving as a digital advisor for enterprise nation in the last twelve months, and have also been selected by TSB to become a business advisor in digital for the North West. Cool Eh?',NULL,'Awards',NULL,'Draft');

/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_firstname` varchar(255) DEFAULT NULL,
  `user_lastname` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_image` text,
  `user_role` varchar(255) DEFAULT NULL,
  `randSalt` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`)
VALUES
	(1,'andonette','james123','Andonette','Wilkinson','andonette@mac.com',NULL,'Admin',NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
