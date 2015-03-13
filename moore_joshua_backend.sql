-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2015 at 07:17 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `moore_joshua_db`
--
CREATE DATABASE IF NOT EXISTS `moore_joshua_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `moore_joshua_db`;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `filePath` varchar(300) NOT NULL,
  `Items_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`filePath`, `Items_id`) VALUES
('./images/apple2.jpg', 22),
('./images/apples.jpg', 24),
('./images/arrows.jpg', 21),
('./images/bow.jpg', 21),
('./images/brook.jpg', 19),
('./images/brook2.jpg', 19),
('./images/deagle.jpg', 20),
('./images/kit2.jpg', 17),
('./images/quadcopt.jpg', 16),
('./images/redGuitar.jpg', 11),
('./images/redGuitar2.jpg', 11),
('./images/salsa.jpg', 15),
('./images/salsa2.jpg', 15),
('./images/shelbyGT.png', 12),
('./images/spoon.jpg', 18),
('./images/spoon2.jpg', 18),
('./images/spoon3.jpg', 18),
('./images/starrynight.jpg', 13),
('./images/tsat.png', 10),
('./images/window.jpg', 23),
('./images/windows2.jpg', 23),
('./images/xwing.jpg', 25);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL,
  `Users_email` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL DEFAULT 'Item',
  `dateAdded` datetime NOT NULL DEFAULT '2015-03-05 04:04:04',
  `description` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `Users_email`, `name`, `dateAdded`, `description`) VALUES
(10, 'guy@mail.com', '2011 Toshiba Satelite', '2015-01-01 09:05:04', 'Used Laptop, good condtition. Has an intel i5 processor and 4GB of ram'),
(11, 'sadpanda7@mail.com', '2001 Epiphone SG Guitar', '2013-03-12 04:04:04', 'Epiphone SG electric guitar, red. A few scratches, but still plays great.'),
(12, 'hottie93@mail.com', '1969 Shelby Mustang GT', '2015-03-05 04:04:04', 'Classic Mustang GT, mint condition. Original engine and tranny.'),
(13, 'snoopdog@mail.com', '1889 ''The Starry Night'' painting by Van Gogh', '2012-10-05 04:04:04', 'Original Van Gogh painting. It''s ok I guess, not too valuable.'),
(14, 'snoopdog@mail.com', '2012 Rollex Watch', '2015-02-12 23:59:59', 'Nice, watch. Probablt not fake.'),
(15, 'guy@mail.com', 'Salsa', '2015-03-12 22:18:24', ' Spicy and great for chips.'),
(16, 'hottie93@mail.com', 'QuadCopter', '2015-03-12 22:20:21', ' Great for scaring the neighbors. Add a camera and instant spy drone. Mint condition'),
(17, 'guy@mail.com', 'Kitten', '2015-03-12 22:24:17', 'Who does love kittens. Am I right? '),
(18, 'guy@mail.com', 'Spoon', '2015-03-12 22:25:51', 'Slightly used silverware. Godsend if you want to eat soup or cereal or something. Also decent for an improvised weapon. '),
(19, 'hottie93@mail.com', 'Brooklyn Bridge', '2015-03-12 22:33:32', 'Great Bridge. Historic and all that. Good Condition. '),
(20, 'guy@mail.com', 'Pistol', '2015-03-12 22:36:11', 'Desert Eagle .50 cal pistol.'),
(21, 'lcroft@mail.com', 'Bow and Arrows', '2015-03-12 22:37:53', ' Real nice wooden bow with 2 dozen arrows.'),
(22, 'sjobs@mail.com', 'Apple 2 Computer', '2015-03-12 22:40:46', 'Vintage computer history. '),
(23, 'bgates@mail.com', 'Windows', '2015-03-12 22:48:53', 'A collection of old windows. '),
(24, 'sjobs@mail.com', 'Apple 1', '2015-03-12 22:51:16', ' Delicious. And it keeps the doctors away. May not keep away cancer though (too soon?)'),
(25, 'bobm@mail.com', 'X-wing', '2015-03-12 23:11:44', ' Self explanatory.');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL DEFAULT 'Selling Item',
  `dateCreated` datetime NOT NULL DEFAULT '2015-03-05 04:04:04',
  `description` varchar(300) DEFAULT NULL,
  `seller_item_id` int(11) NOT NULL,
  `buyer_item_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `dateCreated`, `description`, `seller_item_id`, `buyer_item_id`) VALUES
(20, 'Trading Guitar for Literally anything else.', '2015-02-10 12:30:30', 'I don''t use this guitar anymore. I will trade it for just about anything.', 11, NULL),
(21, 'Trading Shelby Mustang GT for Bugatti', '2015-02-10 12:30:30', 'I have a great Shelby GT, but I''d like to trade it in, preferably for a Bugatti Veyron.', 12, NULL),
(22, 'Trading Painting for other art', '2015-02-10 12:30:30', 'I''d like to get some new art, and I''m board of this one.', 13, NULL),
(23, 'Trading Spoon for smaller spoon', '2015-03-12 22:26:56', 'My spoon is too big! I want a smaller one. plz.', 18, 20),
(24, 'Tradding quadcopter', '2015-03-12 22:28:53', ' I''m legally required to get rid my quadcopter after the incident with my neighbors. But my misfortune is your opportunity!', 16, 10),
(25, 'Quires salsa?', '2015-03-12 22:30:57', '  I have salsa, but I''m craving Italian. Any takers? I''ll take some pizza or linguine. ', 15, NULL),
(26, 'Trading the Brooklyn Bridge', '2015-03-12 22:34:33', ' Recently acquired the Brooklyn Bridge for a steal. I''ll take the best offer.', 19, 25),
(27, 'Getting Rid of Old Bow and Arrows', '2015-03-12 22:39:10', ' Any one interested? I would prefer a trade for other weapons, but will accept other offers.', 21, NULL),
(28, 'Collectors item Apple 2 Computer for trade', '2015-03-12 22:42:11', 'Trading this old hunk of junk for another hunk of junk or something idk', 22, NULL),
(29, 'Trading Windows', '2015-03-12 22:49:57', '  I have a lot of old windows lying around anyone want them', 23, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `email` varchar(64) NOT NULL,
  `dateCreated` datetime NOT NULL DEFAULT '2015-03-05 04:04:04',
  `password` varchar(45) NOT NULL DEFAULT 'password'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `dateCreated`, `password`) VALUES
('bgates@mail.com', '2015-03-12 22:47:04', 'windows'),
('bobm@mail.com', '2015-03-12 22:31:41', 'onelove'),
('guy@mail.com', '2015-03-12 22:17:44', 'hello'),
('hottie93@mail.com', '2014-01-01 23:59:59', 'password'),
('lcroft@mail.com', '2015-03-12 22:35:15', 'guns'),
('sadpanda7@mail.com', '2015-04-12 12:13:45', '1234'),
('sjobs@mail.com', '2015-03-12 22:40:02', 'apple'),
('snoopdog@mail.com', '1995-04-20 04:20:00', 'foshizzle');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
 ADD PRIMARY KEY (`filePath`(75),`Items_id`), ADD KEY `fk_Images_Items1_idx` (`Items_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_Items_Users_idx` (`Users_email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_Posts_Items1_idx` (`seller_item_id`), ADD KEY `fk_Posts_Items2_idx` (`buyer_item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
ADD CONSTRAINT `fk_Images_Items1` FOREIGN KEY (`Items_id`) REFERENCES `items` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
ADD CONSTRAINT `fk_Items_Users` FOREIGN KEY (`Users_email`) REFERENCES `users` (`email`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
ADD CONSTRAINT `fk_Posts_Items1` FOREIGN KEY (`seller_item_id`) REFERENCES `items` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Posts_Items2` FOREIGN KEY (`buyer_item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
