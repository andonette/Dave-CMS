# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.26)
# Database: davecms
# Generation Time: 2020-04-17 18:47:24 +0000
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
	(2,'Work Life'),
	(3,'WordPress');

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
	(5,1,'Ben Tennant','ben@madebyfactory.com','Thats Ace News That Is!','approved','2020-04-10'),
	(6,1,'Ben Tennant','ben@madebyfactory.com','Thats Ace News That Is!','approved','2020-04-10'),
	(7,2,'Matt Wilkinson','wilko997@me.com','Wow this is so cool','approved','2020-04-17'),
	(8,2,'Andi Wilkinson','andonette@mac.com','Nice post','approved','2020-04-17');

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
  `post_status` varchar(355) DEFAULT 'Draft',
  `post_image` text,
  `post_content` text,
  `post_author_id` int(11) DEFAULT NULL,
  `post_tags` varchar(255) DEFAULT NULL,
  `post_comment_count` int(11) DEFAULT NULL,
  `post_author` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;

INSERT INTO `posts` (`post_id`, `post_title`, `post_date`, `post_category_id`, `post_status`, `post_image`, `post_content`, `post_author_id`, `post_tags`, `post_comment_count`, `post_author`)
VALUES
	(1,'Ive joined the board of Manchester Digital','2020-04-17 14:56:12',1,'Published','CreativJam-Event-23.jpg','<p>So this year I will join the <a href=\"https://www.manchesterdigital.com/news/two-new-members-elected-manchester-digital-board-2019\">2019 board of Manchester Digital</a>. They are the largest specialist trade body in the North of England.</p><p>I was one of two new members elected to the board last week. Manchester Digital Members voted from a choice of candidates across the region. There were 22 nominees/</p><p>I know i have mentioned it before but my <a href=\"https://andiwilkinson.co.uk/www.madebyfactory.com\">digital agency</a> is Factory. We were named by <a href=\"https://madebyfactory.com/hand-picked-google-elevator/\">Google</a> as one of the top 30 high potential growth agencies in the UK. Google help ambitious companies with their digital marketing campaigns which accelerates their growth.<br>&nbsp;</p><blockquote><p>“The tech and digital sector is providing some fantastic growth opportunities. I’m keen to see these shared across the region,” Andi said. “I also want to break down barriers for women and ensure our industry is more diverse and more accessible to people from all backgrounds.”</p></blockquote><h3>Feelings about Manchester Digital</h3><p>I’m delighted to be joining the Manchester Digital Board at a time when the region is fast becoming a major driving force in the UK’s digital and tech sector.</p><p>I’m honoured to be on the Board of Manchester Digital and I’d like to thank everyone who voted for me. It’s an incredibly exciting time for our sector. I want to help promote tech as a force for good, support inclusive growth and help our region develop a stronger digital identity.</p><p>As the sector continued to grow, it was important that towns across the region were able to benefit from growth opportunities.</p><p>A bit about me. I have a great passion for the digital sector and <a href=\"https://madebyfactory.com/how-do-we-remove-barriers-for-women-in-business-the-answer-lies-closer-to-home/\">women in tech</a>. Last year I served as a digital Advisor for <a href=\"https://madebyfactory.com/helping-business-go-grow-online/\">Enterprise Nation</a>, helping small business grow online. This year as well as helping Manchester Digital, I have offered my services to TSB as a digital advisor to the SME Sector. I have over 15 years of experience in <a href=\"https://madebyfactory.com/projects/consistently-high-roi-for-fr-jones-son/\">marketing</a>&nbsp;and the&nbsp;<a href=\"https://madebyfactory.com/projects/\">digital industry</a>.</p>',1,'Speaking. Digital',4,''),
	(2,'Designing WordCamp Manchester 2018','2020-04-16 17:55:55',1,'Published','LanyardMock-up-badge.jpg','<p>I love a good WordCamp and I have been happy to have been part of the organiser team for Manchester for several years. The WordPress Community is a fantastic group of people and I have made lots of friends there.</p><p>This year I was proud to be asked to lead the design team for the 2018 Manchester Event. After the 2017 Event, I sat down with this year’s Lead Organiser in Mackie Mayor &amp; we started to thrash out ideas for the design.</p><p>This year WordPress turned 15, so I decided to give this years design a theme celebrating just that: Retro tech. Sure, being a woman of a certain age, means I recall things like pac man, the Sony Walkman, Ataris and more, and lets face it, we are looking at 30 years more than 15, but when it comes to colourful graphics no one is counting, It was all in the spirit of cool old stuff that makes us feel warm and fuzzy. I wanted to somehow combine this idea with an overall ‘pop art’ look.</p><p>The design was created with a series of hand drawn doodles, from a quick brain dump of any old gadgets I could think of. This year I put my hands on a new piece of tech, the iPad Pro and apple pencil, so I used the cool new pro-create app to create the little doodles for the final design.</p><p>To tie the design together, I chose bright blue, red and black with a halftone screen effect to create the pop art look and feel. The result was the ensuing colourful design we ended up with. I paired the graphics with the gorgeous BARO typeface; a multi layered font that allows you to create unique and stylistic lettering.</p><p>Manchesters cute little bumble bee wapuu, which I created a few years earlier and has become one of the more popular wapuus of the world, was given a pop-art makeover for this year to match the brand, making the whole event bright and colourful.</p><p>Being part of a wordcamp is a way to give back to the open source community, and a great way to have your artwork seen by a worldwide audience. I’m proud to be a part of it and grateful for the acknowledgment of my skills.</p><p>This year I have been asked to head up London’s Design Team, so watch this space!</p>',4,'Design, WordCamp',2,''),
	(3,'Im a finalist for business person of the year!','2020-04-17 14:53:17',1,'Published','andi.jpg','<p>This year I’m a finalist for this year’s business person of the year in the Rochdale Borough.</p><p>This is my second time in the finals in this category. Made by Factory was also best upcoming business&nbsp; in 2016.</p><p>My nomination was largely due to my efforts in the borough to bring small business up to date with digital.</p><p>I’ve been serving as a digital advisor for enterprise nation in the last twelve months, and have also been selected by TSB to become a business advisor in digital for the North West. Cool Eh?</p><p>With the help of my business partner in crime, Ben Tennant, our Agency Factory&nbsp; has orchestrated free training and workshops around Rochdale, helping business owners discover the skills they need to go and grow online.</p><p>The borough of Rochdale comprises three towns. Rochdale, Middleton and Heywood. It’s famously known as the birthplace of the cooperative. It has some of the largest commercial and industrial spaces in the North and is largely known for its manufacturing and distribution. The awards are a celebration of the hard work of the business community and categories look to honour everyone from apprentices and employees and businesses from micro to massive!</p><p>I really do think I deserve a medal after reading back my entry but it does remain to be seen</p>',2,'Awards',0,''),
	(4,'WordPress Contributor Day For Dummies','2020-04-16 17:53:26',1,'Published','IMG_0628.jpg','<p>I want to demystify WordPress Contributor Day. I’m currently working on organising and shouting out about the WordPress contributor day for WordCamp Manchester so I thought I would come to Paris and see the biggest WordCamp Contributor Day in Action.</p><p>When I first heard the term ‘WordPress contributor day’ I imagined it was a day for all the volunteers and speakers to get together. I’m not sure to what purpose, I didn’t think that far. But in case you did have any strange notions like me, here’s what it is. A contributor is anyone who wants to contribute to WordPress.</p><p>When I learned this, I thought I would have to know how to code the hard stuff and I don’t have that level of proficiency. This is not the case at all. l. In fact there are a dozen or so ways you can be a <a href=\"https://andiwilkinson.co.uk/wordcamp-europe-mancunian-paris/\">contributor</a>.</p><h2><strong>Contribution isn’t</strong> limited<strong> to WordPress Contributor Day</strong></h2><p>Joining the slack community first is always a good idea. That way you can see all the different things going on every day. Contributions aren’t just limited to WordCamps. Do get yourself a wordpress.org account if you haven’t already and sign up to slack to join the dialogue like thousands of others. <a href=\"https://make.wordpress.org/chat/\">Here’s how to do that!</a></p><h3><strong>WordPress</strong> Core</h3><p>Although you need to know some code, you don’t have to be an expert. There are contributions available at all levels. you can report bugs, test patches and fix bugs. There are even a list of newbie bugs available for you to look at if you are just getting started. You can see them <a href=\"https://core.trac.wordpress.org/tickets/good-first-bugs\">here</a>. For more reading see the <a href=\"https://make.wordpress.org/core/handbook/\">contributor handbook</a>&nbsp;on WordPress.org.</p><h3>Design</h3><p>Has core spooked you a little? You are more of a front-end type of person right? Why not join the design team where you will be able to input on how the user intarface of WordPress is shaped. This includes user testing. Remember, developers can make everything work, but&nbsp;without an intuitive user journey, it won’t be that great. That’s why thousands of designers have contributed to make the UI what it is today. So you can see just how far WordPress has come,&nbsp;this <a href=\"https://www.google.co.uk/search?q=wordpress+dashboard+through+the+ages&amp;oq=wordpress+dashboard+through+the+ages&amp;aqs=chrome..69i57j69i64l3.6149j0j4&amp;sourceid=chrome&amp;ie=UTF-8#q=wordpress+dashboard+screenshots+through+time\">blog post</a> shows 8 years of WordPress Dashboards and how it evolved</p><h3>Mobile</h3><p>This is suitable for Java, Objective-C or Swift Developers. Again, it’s good for anyone with an eye for UX design too. Mobile also needs testers, especially on Android, See the call for testers <a href=\"https://make.wordpress.org/mobile/2017/06/06/call-for-testing-wordpress-for-android-7-6/\">here</a>.</p><h3>Accessibility</h3><p>As you may have guessed this team work on making WordPress as accessible to all as it can possibly be. This includes coding standards, audits, testing and also accessibility of the handbook and other resources. This group meets weekly on Slack.</p><h3>Polyglots</h3><p>You may not know a shred of code, but you may be able to speak and write more than one language. If so, The WordPress Community need you! Aside from joining in at WordCamps, there is also a&nbsp;<a href=\"http://wptranslationday.org/\">global translation day</a>&nbsp;you can join online.</p><h3>Support</h3><p>You can join the forums on Slack. Everyone knows how do to something, so from supporting users up to developers. Here is a <a href=\"https://make.wordpress.org/support/handbook/\">quick start guide</a> to what the support forums are all about.</p><h3>Themes</h3><p>If you create themes for WordPress, there is a team dedicated to reviewing themes that are submitted to the theme repository. This group is open to anyone who wants to help out. Read more about them <a href=\"https://make.wordpress.org/themes/handbook/get-involved/become-a-reviewer/\">here</a>.</p><h3>Documentation</h3><p>Everything needs documenting and in a way that people understand. The documentation team make this possible. This could be contributor documents, developer documentation or the WordPress Codex. Again they have their own slack channel and regular meetings.</p><h3>Training</h3><p>If you know how to use WordPress, then the community would love to have you! It doesn’t matter where your skill level lies. There is the need to edit, write, audit, copywrite, teach and even review lesson plans for content. The team meet regularly in slack.</p><h3>Meta</h3><p>It’s the meta team that keep the wordpress.org websites up to date. This team work on a <a href=\"https://make.wordpress.org/meta/projects/\">number of projects</a>&nbsp;so the best way forward is to have a look and see if any of them match your skills and interest.</p><h3>TV</h3><p>All things video, A lot of learning, announcements, talks and training is available on <a href=\"http://wordpress.tv/\">wordpress.tv</a>. The WordPress TV Team keep this maintained. If you know anything about video, join this team, but If you don’t, well they need captioners and translators too.</p><h3>Flow</h3><p>As the name suggests, this team are responsible for the whole WordPress experience, across all platforms, ensuring user experience is synchronous, seamless and well, flows. Because their description is a little arty, I would join in the Slack channel and see what’s involved! Details of how to do that are <a href=\"https://make.wordpress.org/test/\">here</a>.</p><h3>CLI</h3><p>WordPress-CLI for anyone who doesn’t know is the Command Line Interface. Making installation, automation, staging and deployment much breezier. So If you are intrigued, check out their <a href=\"https://make.wordpress.org/cli/handbook/contributing/\">contributing guide</a> for more information.</p><h3>Marketing</h3><p>Last but not least, The best product in the world is nothing without an audience. Even WordPress in all it’s ubiquitous glory still looks for ways to reach more people. If you are an ideas person this group could be for you. WordPress are looking for ways to market to agencies, the end user, and the community at large. So many users and developers still don’t realise there is an active communitu out there and what it is that they do. Hence this post. So if you&nbsp;have some marketing skills, it could be on the sales side, or the data analytics side, <a href=\"https://make.wordpress.org/marketing/\">this team</a> needs your help!</p><h3>Join the next WordPress Contributor Day</h3><p>Not all WordCamp contributor days involve all teams so the best way to get involved with WordPress at any stage is to join the <a href=\"https://make.wordpress.org/chat/\">slack team</a> and jump right in!</p>',1,'WordPress',0,''),
	(7,'Exploring Trade In South East Asia','2020-04-16 18:03:49',1,'Published','trade.jpg','<p>Enterprise nation to be part of mission exploring trade in Southeast Asia. The mission will take a delegation of twenty five businesses to Singapore to look at international trade options.</p><p>&nbsp;</p><p>It’s a three-day event, from Thursday 21st to Saturday 23rd of September. We will learn all about how the digital sector do business out there.</p><h2>Trade In Southeast Asia. What’s the programme?</h2><p>Thursday’s programme will include talks from experts working at HSBC, the UK-ASEAN Business Council and more. They tell me we are going to learn all about Singapore &amp; how it can be used as a base to explore many markets in Asia.</p><p>Next we go to the KPMG Digital Village where they will teach us about the ins-and-outs of tax and legal stuff. (Is it wrong of me to nod off at the tax bit?) Thursday’s business will conclude with an evening reception! That’s the bit I look forward to!</p><p>On Friday we start with tours of Singtel Innov8, Spring start-up-space followed by a look around Level3. The afternoon will kick off with a talk from the Economic Development Board &amp; GeBIZ.&nbsp;Next I&nbsp;join the other missionaries in a <i>Creative Afternoon </i>with Iris Worldwide, where we have to solve a challenge with one of the world’s most creative agencies!</p><p>On the third &amp; final day of this mission to southeast Asia begins with a talk from local entrepreneurs. l get to hear the advice from experienced people, who’ve been there &amp; done it.&nbsp; Hopefully I will gain some top tips &amp; advice on how to business in Singapore. The group of entrepreneurs includes:</p><ul><li>Margaret Manning, Adelphi Digital</li><li>Tim Webb, Sequebb</li><li>Andrew Pickup, Microsoft</li><li>Steve Melhuish, founder, Propertyguru.com</li></ul><p>So! when I’m not gallivanting, I work as a creative designer and web developer at<a href=\"http://www.madebyfactory.com/\"> Made By Factory</a>. We are a Manchester Digital Marketing agency. I co-direct with it my mate Danny. You can get in touch with me at <a href=\"mailto:hi@andiwilkinson.co.uk\">hi@andiwilkinson.co.uk</a>.</p><p>\"&gt;</p>',2,'Trade',0,''),
	(10,'WordCamp Manchester, A Mancunian In Paris','2020-04-17 17:14:50',1,'Published','IMG_0529.jpg','<figure class=\"image\"><img src=\"https://i1.wp.com/andiwilkinson.co.uk/wp-content/uploads/2017/10/IMG_0529.jpg?resize=640%2C360&amp;ssl=1\" alt=\"ZOMBIES\" srcset=\"https://i1.wp.com/andiwilkinson.co.uk/wp-content/uploads/2017/10/IMG_0529.jpg?w=960&amp;ssl=1 960w, https://i1.wp.com/andiwilkinson.co.uk/wp-content/uploads/2017/10/IMG_0529.jpg?resize=300%2C169&amp;ssl=1 300w, https://i1.wp.com/andiwilkinson.co.uk/wp-content/uploads/2017/10/IMG_0529.jpg?resize=768%2C432&amp;ssl=1 768w\" sizes=\"100vw\" width=\"640\"></figure><p>WordCamp Europe&nbsp;was in <a href=\"https://2017.europe.wordcamp.org/\">Paris</a>. Uniting 1900 attendees from around 80 countries. There were another 1000 or so who joined via livestream. It was something amazing to behold.</p><p>I embarked on my journey. The first time I had ever abroad travelled alone, I felt so intrepid!</p><h2>Where have I come to?</h2><p>Arriving in Paris, I saw my first glimpse of my hotel. Where had I gone to? Aubervilliers is where WordCamp was held. It was rough as hell! Although my hotel was considered ’boutique’, my bathroom was in the hall. There was a combo lock from the outside and nothing on the inside. The combo lock had 4 numbers: 1234. My combo was 4321. I did not feel safe.</p><p>Regardless I had some new friends to meet up with, and Uber is everywhere. So, I jumped in a taxi and made my way out.</p><figure class=\"image\"><img src=\"https://i0.wp.com/andiwilkinson.co.uk/wp-content/uploads/2017/10/IMG_0619.jpg?resize=640%2C480&amp;ssl=1\" alt=\"\" srcset=\"https://i0.wp.com/andiwilkinson.co.uk/wp-content/uploads/2017/10/IMG_0619.jpg?w=1200&amp;ssl=1 1200w, https://i0.wp.com/andiwilkinson.co.uk/wp-content/uploads/2017/10/IMG_0619.jpg?resize=300%2C225&amp;ssl=1 300w, https://i0.wp.com/andiwilkinson.co.uk/wp-content/uploads/2017/10/IMG_0619.jpg?resize=768%2C576&amp;ssl=1 768w, https://i0.wp.com/andiwilkinson.co.uk/wp-content/uploads/2017/10/IMG_0619.jpg?resize=1024%2C768&amp;ssl=1 1024w\" sizes=\"100vw\" width=\"640\"></figure><p>The first day was contributor day. If you don’t know what a contributor day is, read this <a href=\"https://andiwilkinson.co.uk/wordpress-contributor-day-for-dummies/\">post</a>.</p><p>After a hard day’s work and some new friends made, we went into Paris for a few drinks. At least I felt better after a drink or two. I spent a happy hour in a kebab shop with two Israelis, chatting about nothing. See, this is what I love about WordCamp. My list of conversations with people around the world was growing.</p><figure class=\"image\"><img src=\"https://i0.wp.com/andiwilkinson.co.uk/wp-content/uploads/2017/10/IMG_0645.jpg?resize=300%2C225&amp;ssl=1\" alt=\"\" srcset=\"https://i0.wp.com/andiwilkinson.co.uk/wp-content/uploads/2017/10/IMG_0645.jpg?resize=300%2C225&amp;ssl=1 300w, https://i0.wp.com/andiwilkinson.co.uk/wp-content/uploads/2017/10/IMG_0645.jpg?resize=768%2C576&amp;ssl=1 768w, https://i0.wp.com/andiwilkinson.co.uk/wp-content/uploads/2017/10/IMG_0645.jpg?resize=1024%2C768&amp;ssl=1 1024w, https://i0.wp.com/andiwilkinson.co.uk/wp-content/uploads/2017/10/IMG_0645.jpg?w=1200&amp;ssl=1 1200w\" sizes=\"100vw\" width=\"300\"></figure><figure class=\"image\"><img src=\"https://i1.wp.com/andiwilkinson.co.uk/wp-content/uploads/2017/10/IMG_0644.jpg?resize=300%2C225&amp;ssl=1\" alt=\"\" srcset=\"https://i1.wp.com/andiwilkinson.co.uk/wp-content/uploads/2017/10/IMG_0644.jpg?resize=300%2C225&amp;ssl=1 300w, https://i1.wp.com/andiwilkinson.co.uk/wp-content/uploads/2017/10/IMG_0644.jpg?resize=768%2C576&amp;ssl=1 768w, https://i1.wp.com/andiwilkinson.co.uk/wp-content/uploads/2017/10/IMG_0644.jpg?resize=1024%2C768&amp;ssl=1 1024w, https://i1.wp.com/andiwilkinson.co.uk/wp-content/uploads/2017/10/IMG_0644.jpg?w=1200&amp;ssl=1 1200w\" sizes=\"100vw\" width=\"300\"></figure><h3>Onwards to WordCamp Europe</h3><p>The next day was WordCamp in earnest. My first stop, the Swag hall because we all love swag. I made a point of chatting to everyone I could and cramming my JetPack bag with stickers, bags, sunglasses, fidget spinners and anything else I could lay my hands on.</p><p>It was a hot day. I hadn’t considered this. Everybody filtered outside for lunch and sat in the grass. So, I decided to mooch around and speak to new people. I met a couple of guys from Lisbon, who told me all about the city which was great. I’m off to web summit in November so it was good to get the heads up.</p><p>That night, I was still unhappy with the hotel. So I moved to the budget Ibis Aubervilliers. It was like a hospital room in prison. But at least it had AC!!</p><p>That evening, I went for a steak and a couple of mojitos, with Dave and Steph, a couple I met at <a href=\"https://andiwilkinson.co.uk/wordcamp-manchester-2016/\">WordCamp Manchester</a>. I had the nicest night, just chilling outside a restaurant in a Parisienne street.</p><figure class=\"image\"><img src=\"https://i0.wp.com/andiwilkinson.co.uk/wp-content/uploads/2017/10/IMG_0680-e1507720099675-225x300.jpg?resize=225%2C300&amp;ssl=1\" alt=\"\" srcset=\"https://i1.wp.com/andiwilkinson.co.uk/wp-content/uploads/2017/10/IMG_0680-e1507720099675.jpg?resize=225%2C300&amp;ssl=1 225w, https://i1.wp.com/andiwilkinson.co.uk/wp-content/uploads/2017/10/IMG_0680-e1507720099675.jpg?resize=768%2C1024&amp;ssl=1 768w, https://i1.wp.com/andiwilkinson.co.uk/wp-content/uploads/2017/10/IMG_0680-e1507720099675.jpg?w=900&amp;ssl=1 900w\" sizes=\"100vw\" width=\"225\"></figure><p>&nbsp;</p><figure class=\"image\"><img src=\"https://i0.wp.com/andiwilkinson.co.uk/wp-content/uploads/2017/10/IMG_0674.jpg?resize=399%2C299&amp;ssl=1\" alt=\"\" srcset=\"https://i0.wp.com/andiwilkinson.co.uk/wp-content/uploads/2017/10/IMG_0674.jpg?resize=300%2C225&amp;ssl=1 300w, https://i0.wp.com/andiwilkinson.co.uk/wp-content/uploads/2017/10/IMG_0674.jpg?resize=768%2C576&amp;ssl=1 768w, https://i0.wp.com/andiwilkinson.co.uk/wp-content/uploads/2017/10/IMG_0674.jpg?resize=1024%2C768&amp;ssl=1 1024w, https://i0.wp.com/andiwilkinson.co.uk/wp-content/uploads/2017/10/IMG_0674.jpg?w=1200&amp;ssl=1 1200w\" sizes=\"100vw\" width=\"399\"></figure><h3>What were my highlights?</h3><p>It was fantastic to meet <a href=\"https://mor10.com/\">Morten Rand-Hendrikson</a>. Someone who taught me how to use WordPress via <a href=\"https://www.lynda.com/\">Lynda.com</a>. Also <a href=\"http://zacgordon.com/\">Zac Gordon</a>, who did the same via <a href=\"https://teamtreehouse.com/home\">Treehouse</a>.&nbsp; I was developer starstruck! It was also great to watch a talk on the history of WordPress by Mike Little and Matt Mullenwegg.</p><h3>The After Party.</h3><p>After the final day, it was time for the after party. I’m sorry WordCamp Europe but this was a huge disappointment. The twitter feed of people wanting to leave said it all. Because the food was sparse, and it took an hour to get it. When i say sparse, we had a hot dog so it was a bit of a let down.</p><p>\"&gt;</p>',1,'WordPress',0,'');

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
	(1,'Andonette','james123','Andonette','Wilkinson','andi@madebyfactory.com','andi.jpg ','Administrator',NULL),
	(2,'Wilko997','matt','Matt ','Wilkinson','ben@madebyfactory.com','matt.jpeg   ','Administrator',NULL),
	(3,'BenTen1','ben10123','Ben','Tennant','ben@madebyfactory.com','Ben.jpg ','Administrator',NULL),
	(4,'JustDave','Dave123','Dave','Lewis','justdavelewis@live.co.uk','dave.jpg ','Administrator',NULL),
	(5,'Jimbob','James123','James','Lewis','jimbob81@live.co.uk','james.jpg ','Administrator',NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
