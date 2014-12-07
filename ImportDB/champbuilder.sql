-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 07 dec 2014 kl 18:20
-- Serverversion: 5.6.17
-- PHP-version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `champbuilder`
--

DELIMITER $$
--
-- Procedurer
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `AddBuild`(IN `_champID` INT, IN `_i1` INT, IN `_i2` INT, IN `_i3` INT, IN `_i4` INT, IN `_i5` INT, IN `_i6` INT, IN `_title` VARCHAR(50), IN `_desc` TEXT, IN `_level1` INT, IN `_level2` INT, IN `_level3` INT, IN `_level4` INT, IN `_level5` INT, IN `_level6` INT, IN `_level7` INT, IN `_level8` INT, IN `_level9` INT, IN `_level10` INT, IN `_level11` INT, IN `_level12` INT, IN `_level13` INT, IN `_level14` INT, IN `_level15` INT, IN `_level16` INT, IN `_level17` INT, IN `_level18` INT)
BEGIN
START TRANSACTION;
INSERT INTO builds VALUES(NULL,_champID, _title, _desc);
SET @ID = LAST_INSERT_ID();
INSERT INTO builditem VALUES(NULL,@ID,_i1);
INSERT INTO builditem VALUES(NULL,@ID,_i2);
INSERT INTO builditem VALUES(NULL,@ID,_i3);
INSERT INTO builditem VALUES(NULL,@ID,_i4);
INSERT INTO builditem VALUES(NULL,@ID,_i5);
INSERT INTO builditem VALUES(NULL,@ID,_i6);

INSERT INTO levels VALUES(null, @ID, 1 ,_level1);
INSERT INTO levels VALUES(null, @ID, 2 ,_level2);
INSERT INTO levels VALUES(null, @ID, 3 ,_level3);
INSERT INTO levels VALUES(null, @ID, 4 ,_level4);
INSERT INTO levels VALUES(null, @ID, 5 ,_level5);
INSERT INTO levels VALUES(null, @ID, 6 ,_level6);
INSERT INTO levels VALUES(null, @ID, 7 ,_level7);
INSERT INTO levels VALUES(null, @ID, 8 ,_level8);
INSERT INTO levels VALUES(null, @ID, 9 ,_level9);
INSERT INTO levels VALUES(null, @ID, 10,_level10);
INSERT INTO levels VALUES(null, @ID, 11,_level11);
INSERT INTO levels VALUES(null, @ID, 12,_level12);
INSERT INTO levels VALUES(null, @ID, 13,_level13);
INSERT INTO levels VALUES(null, @ID, 14,_level14);
INSERT INTO levels VALUES(null, @ID, 15,_level15);
INSERT INTO levels VALUES(null, @ID, 16,_level16);
INSERT INTO levels VALUES(null, @ID, 17,_level17);
INSERT INTO levels VALUES(null, @ID, 18,_level18);

COMMIT;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `AddComment`(IN `_buildid` INT, IN `_userid` INT, IN `_comment` TEXT)
BEGIN
INSERT INTO comments VALUES(null, _comment, _userid, _buildid);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllCommentsForID`(IN `_id` INT)
BEGIN
SELECT * FROM comments WHERE buildid = _id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetBuildByChampID`(IN `_ID` INT)
BEGIN 
SELECT * FROM builds WHERE CHAMPID = _ID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetBuildById`(IN `_ID` INT)
BEGIN
SELECT * FROM builds WHERE ID = _ID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetBuildItemsByID`(IN `_ID` INT)
BEGIN
SELECT * FROM builditem WHERE BuildID = _ID; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetChampByID`(IN `_ID` INT)
BEGIN
SELECT * FROM champions WHERE ID =_ID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetChamps`()
BEGIN
SELECT * FROM champions;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetItemByID`(IN `_ID` INT)
BEGIN 
SELECT * FROM items WHERE ID = _ID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetItems`()
BEGIN
SELECT * FROM items;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetLevelsByID`(IN `_ID` INT)
BEGIN
SELECT * FROM levels WHERE BUILDID = _ID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetUserFromUsername`(IN `_un` VARCHAR(50))
BEGIN
SELECT * FROM users WHERE Username = _un;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LoginUser`(IN `_username` VARCHAR(69), IN `_password` VARCHAR(50))
BEGIN

SELECT * FROM users WHERE Username = _username AND pass = _password;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RegisterUser`(IN `_un` VARCHAR(50), IN `_pass` VARCHAR(50))
BEGIN
INSERT INTO users VALUES(null, _un, _pass);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Tabellstruktur `builditem`
--

CREATE TABLE IF NOT EXISTS `builditem` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `BuildID` int(11) NOT NULL,
  `ItemID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=247 ;

--
-- Dumpning av Data i tabell `builditem`
--

INSERT INTO `builditem` (`ID`, `BuildID`, `ItemID`) VALUES
(235, 49, 1),
(236, 49, 1),
(237, 49, 1),
(238, 49, 1),
(239, 49, 1),
(240, 49, 1),
(241, 50, 1),
(242, 50, 1),
(243, 50, 2),
(244, 50, 1),
(245, 50, 2),
(246, 50, 2);

-- --------------------------------------------------------

--
-- Tabellstruktur `builds`
--

CREATE TABLE IF NOT EXISTS `builds` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CHAMPID` int(11) NOT NULL,
  `titel` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumpning av Data i tabell `builds`
--

INSERT INTO `builds` (`ID`, `CHAMPID`, `titel`, `description`) VALUES
(49, 1, 'First Ahri Build', 'The first build for Ahri'),
(50, 2, 'ULTI OP!', 'Nerf please!');

-- --------------------------------------------------------

--
-- Tabellstruktur `champions`
--

CREATE TABLE IF NOT EXISTS `champions` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumpning av Data i tabell `champions`
--

INSERT INTO `champions` (`ID`, `NAME`) VALUES
(1, 'Ahri'),
(2, 'Xerath');

-- --------------------------------------------------------

--
-- Tabellstruktur `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `userid` int(11) NOT NULL,
  `buildid` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumpning av Data i tabell `comments`
--

INSERT INTO `comments` (`ID`, `comment`, `userid`, `buildid`) VALUES
(1, 'hej', 1, 23),
(2, '0', 1, 23),
(3, 'nu då', 1, 23),
(4, 'Kalle anka		', 1, 23),
(5, 'FÃ¶rst				', 1, 23),
(6, 'Good one brah			', 1, 24),
(7, '			fdfdfd', 1, 23),
(8, '		ffffffffffffff		', 1, 23),
(9, '	tiihii			', 1, 23),
(10, '		dcdv		', 1, 23),
(11, '	bÃ¶g anja			', 1, 25),
(12, '	lÃ¶lkÃ¶lÃ¶l			', 7, 25),
(13, '	gfhgf			', 7, 25),
(14, '	gfhgf			', 7, 25),
(15, '	gfhgf			', 7, 25),
(16, '	gfhgf			', 7, 25),
(17, '	gfhgf			', 7, 25),
(18, '	gfhgf			', 7, 25),
(19, '	gfhgf			', 7, 25),
(20, '		hgfh		', 7, 23),
(21, '		hgfh		', 7, 23),
(22, '		hgfh		', 7, 23),
(23, '			poÃ¥	', 7, 25),
(24, '			poÃ¥	', 7, 25),
(25, '			poÃ¥	', 7, 25),
(26, '			poÃ¥	', 7, 25),
(27, '			poÃ¥	', 7, 25),
(28, '		ghjghjhgj		', 7, 25),
(29, '		jhjhjhjjhjh		', 7, 25),
(30, '		jhjhjhjjhjh		', 7, 25),
(31, '	jhjj			', 7, 23),
(32, '	hfghgf\r\nfghfghgf\r\nhfghfgh\r\nhf  hfgh h hfg h			', 7, 33),
(33, 'It sure is				', 7, 50),
(34, 'I can comment?', 7, 50);

-- --------------------------------------------------------

--
-- Tabellstruktur `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(30) NOT NULL,
  `URL` varchar(535) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumpning av Data i tabell `items`
--

INSERT INTO `items` (`ID`, `NAME`, `URL`) VALUES
(1, 'Deathfire Grasp', 'http://img2.wikia.nocookie.net/__cb20130731230043/leagueoflegends/images/a/a8/Deathfire_Grasp_item.png'),
(2, 'Athenes Unholy Grail', 'http://img3.wikia.nocookie.net/__cb20130111231157/leagueoflegends/images/c/cc/Athene%27s_Unholy_Grail_item.png');

-- --------------------------------------------------------

--
-- Tabellstruktur `levels`
--

CREATE TABLE IF NOT EXISTS `levels` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `BUILDID` int(11) NOT NULL,
  `LEVELID` int(11) NOT NULL,
  `ABILITYID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=410 ;

--
-- Dumpning av Data i tabell `levels`
--

INSERT INTO `levels` (`ID`, `BUILDID`, `LEVELID`, `ABILITYID`) VALUES
(20, 23, 1, 0),
(21, 23, 2, 1),
(22, 23, 3, 2),
(23, 23, 4, 3),
(24, 23, 5, 1),
(25, 23, 6, 1),
(26, 23, 7, 2),
(27, 23, 8, 3),
(28, 23, 9, 2),
(29, 23, 10, 1),
(30, 23, 11, 1),
(31, 23, 11, 2),
(32, 23, 12, 3),
(33, 23, 13, 1),
(34, 23, 14, 0),
(35, 23, 15, 1),
(36, 23, 16, 1),
(37, 23, 17, 1),
(38, 23, 18, 0),
(39, 24, 1, 3),
(40, 24, 2, 3),
(41, 24, 3, 3),
(42, 24, 4, 3),
(43, 24, 5, 3),
(44, 24, 6, 3),
(45, 24, 7, 3),
(46, 24, 8, 2),
(47, 24, 9, 1),
(48, 24, 10, 1),
(49, 24, 11, 2),
(50, 24, 11, 1),
(51, 24, 12, 0),
(52, 24, 13, 1),
(53, 24, 14, 2),
(54, 24, 15, 1),
(55, 24, 16, 3),
(56, 24, 17, 0),
(57, 24, 18, 3),
(58, 25, 1, 0),
(59, 25, 2, 1),
(60, 25, 3, 2),
(61, 25, 4, 3),
(62, 25, 5, 2),
(63, 25, 6, 1),
(64, 25, 7, 0),
(65, 25, 8, 1),
(66, 25, 9, 2),
(67, 25, 10, 3),
(68, 25, 11, 2),
(69, 25, 11, 1),
(70, 25, 12, 1),
(71, 25, 13, 1),
(72, 25, 14, 1),
(73, 25, 15, 1),
(74, 25, 16, 1),
(75, 25, 17, 1),
(76, 25, 18, 0),
(77, 26, 1, 0),
(78, 26, 2, 0),
(79, 26, 3, 0),
(80, 26, 4, 0),
(81, 26, 5, 0),
(82, 26, 6, 0),
(83, 26, 7, 0),
(84, 26, 8, 0),
(85, 26, 9, 0),
(86, 26, 10, 0),
(87, 26, 11, 0),
(88, 26, 11, 0),
(89, 26, 12, 0),
(90, 26, 13, 0),
(91, 26, 14, 0),
(92, 26, 15, 0),
(93, 26, 16, 0),
(94, 26, 17, 0),
(95, 26, 18, 0),
(96, 27, 1, 0),
(97, 27, 2, 0),
(98, 27, 3, 0),
(99, 27, 4, 0),
(100, 27, 5, 0),
(101, 27, 6, 0),
(102, 27, 7, 0),
(103, 27, 8, 0),
(104, 27, 9, 0),
(105, 27, 10, 0),
(106, 27, 11, 0),
(107, 27, 11, 0),
(108, 27, 12, 0),
(109, 27, 13, 0),
(110, 27, 14, 0),
(111, 27, 15, 0),
(112, 27, 16, 0),
(113, 27, 17, 0),
(114, 27, 18, 0),
(115, 28, 1, 0),
(116, 28, 2, 0),
(117, 28, 3, 0),
(118, 28, 4, 0),
(119, 28, 5, 0),
(120, 28, 6, 0),
(121, 28, 7, 0),
(122, 28, 8, 0),
(123, 28, 9, 0),
(124, 28, 10, 0),
(125, 28, 11, 0),
(126, 28, 11, 0),
(127, 28, 12, 0),
(128, 28, 13, 0),
(129, 28, 14, 0),
(130, 28, 15, 0),
(131, 28, 16, 0),
(132, 28, 17, 0),
(133, 28, 18, 0),
(134, 29, 1, 0),
(135, 29, 2, 1),
(136, 29, 3, 2),
(137, 29, 4, 3),
(138, 29, 5, 2),
(139, 29, 6, 1),
(140, 29, 7, 0),
(141, 29, 8, 1),
(142, 29, 9, 2),
(143, 29, 10, 3),
(144, 29, 11, 2),
(145, 29, 11, 1),
(146, 29, 12, 0),
(147, 29, 13, 1),
(148, 29, 14, 2),
(149, 29, 15, 3),
(150, 29, 16, 2),
(151, 29, 17, 1),
(152, 29, 18, 0),
(153, 30, 1, 0),
(154, 30, 2, 0),
(155, 30, 3, 0),
(156, 30, 4, 0),
(157, 30, 5, 0),
(158, 30, 6, 0),
(159, 30, 7, 0),
(160, 30, 8, 0),
(161, 30, 9, 0),
(162, 30, 10, 0),
(163, 30, 11, 0),
(164, 30, 11, 0),
(165, 30, 12, 0),
(166, 30, 13, 0),
(167, 30, 14, 0),
(168, 30, 15, 0),
(169, 30, 16, 0),
(170, 30, 17, 0),
(171, 30, 18, 0),
(172, 31, 1, 0),
(173, 31, 2, 0),
(174, 31, 3, 0),
(175, 31, 4, 0),
(176, 31, 5, 0),
(177, 31, 6, 0),
(178, 31, 7, 0),
(179, 31, 8, 0),
(180, 31, 9, 0),
(181, 31, 10, 0),
(182, 31, 11, 0),
(183, 31, 11, 0),
(184, 31, 12, 0),
(185, 31, 13, 0),
(186, 31, 14, 0),
(187, 31, 15, 0),
(188, 31, 16, 0),
(189, 31, 17, 0),
(190, 31, 18, 0),
(191, 32, 1, 0),
(192, 32, 2, 0),
(193, 32, 3, 0),
(194, 32, 4, 0),
(195, 32, 5, 0),
(196, 32, 6, 0),
(197, 32, 7, 0),
(198, 32, 8, 0),
(199, 32, 9, 0),
(200, 32, 10, 0),
(201, 32, 11, 0),
(202, 32, 11, 0),
(203, 32, 12, 0),
(204, 32, 13, 0),
(205, 32, 14, 0),
(206, 32, 15, 0),
(207, 32, 16, 0),
(208, 32, 17, 0),
(209, 32, 18, 0),
(210, 33, 1, 3),
(211, 33, 2, 3),
(212, 33, 3, 3),
(213, 33, 4, 3),
(214, 33, 5, 3),
(215, 33, 6, 3),
(216, 33, 7, 3),
(217, 33, 8, 3),
(218, 33, 9, 3),
(219, 33, 10, 3),
(220, 33, 11, 3),
(221, 33, 11, 3),
(222, 33, 12, 3),
(223, 33, 13, 3),
(224, 33, 14, 3),
(225, 33, 15, 3),
(226, 33, 16, 3),
(227, 33, 17, 3),
(228, 33, 18, 3),
(229, 34, 1, 0),
(230, 34, 2, 0),
(231, 34, 3, 0),
(232, 34, 4, 0),
(233, 34, 5, 0),
(234, 34, 6, 0),
(235, 34, 7, 0),
(236, 34, 8, 0),
(237, 34, 9, 0),
(238, 34, 10, 0),
(239, 34, 11, 0),
(240, 34, 11, 0),
(241, 34, 12, 0),
(242, 34, 13, 0),
(243, 34, 14, 0),
(244, 34, 15, 0),
(245, 34, 16, 0),
(246, 34, 17, 0),
(247, 34, 18, 0),
(248, 46, 1, 0),
(249, 46, 2, 0),
(250, 46, 3, 0),
(251, 46, 4, 0),
(252, 46, 5, 0),
(253, 46, 6, 0),
(254, 46, 7, 0),
(255, 46, 8, 0),
(256, 46, 9, 0),
(257, 46, 10, 0),
(258, 46, 11, 0),
(259, 46, 12, 0),
(260, 46, 13, 0),
(261, 46, 14, 0),
(262, 46, 15, 0),
(263, 46, 16, 0),
(264, 46, 17, 0),
(265, 46, 18, 0),
(266, 47, 1, 0),
(267, 47, 2, 0),
(268, 47, 3, 0),
(269, 47, 4, 0),
(270, 47, 5, 0),
(271, 47, 6, 0),
(272, 47, 7, 0),
(273, 47, 8, 0),
(274, 47, 9, 0),
(275, 47, 10, 0),
(276, 47, 11, 0),
(277, 47, 12, 0),
(278, 47, 13, 0),
(279, 47, 14, 0),
(280, 47, 15, 0),
(281, 47, 16, 0),
(282, 47, 17, 0),
(283, 47, 18, 0),
(284, 48, 1, 3),
(285, 48, 2, 3),
(286, 48, 3, 3),
(287, 48, 4, 3),
(288, 48, 5, 3),
(289, 48, 6, 2),
(290, 48, 7, 2),
(291, 48, 8, 1),
(292, 48, 9, 1),
(293, 48, 10, 1),
(294, 48, 11, 2),
(295, 48, 12, 3),
(296, 48, 13, 3),
(297, 48, 14, 1),
(298, 48, 15, 1),
(299, 48, 16, 2),
(300, 48, 17, 3),
(301, 48, 18, 3),
(302, 49, 1, 0),
(303, 49, 2, 1),
(304, 49, 3, 1),
(305, 49, 4, 2),
(306, 49, 5, 2),
(307, 49, 6, 1),
(308, 49, 7, 1),
(309, 49, 8, 1),
(310, 49, 9, 2),
(311, 49, 10, 2),
(312, 49, 11, 1),
(313, 49, 12, 1),
(314, 49, 13, 0),
(315, 49, 14, 1),
(316, 49, 15, 1),
(317, 49, 16, 0),
(318, 49, 17, 1),
(319, 49, 18, 1),
(320, 50, 1, 0),
(321, 50, 2, 1),
(322, 50, 3, 2),
(323, 50, 4, 3),
(324, 50, 5, 3),
(325, 50, 6, 3),
(326, 50, 7, 3),
(327, 50, 8, 3),
(328, 50, 9, 3),
(329, 50, 10, 3),
(330, 50, 11, 3),
(331, 50, 12, 3),
(332, 50, 13, 3),
(333, 50, 14, 3),
(334, 50, 15, 3),
(335, 50, 16, 3),
(336, 50, 17, 3),
(337, 50, 18, 3),
(338, 51, 1, 0),
(339, 51, 2, 0),
(340, 51, 3, 0),
(341, 51, 4, 0),
(342, 51, 5, 0),
(343, 51, 6, 0),
(344, 51, 7, 0),
(345, 51, 8, 1),
(346, 51, 9, 2),
(347, 51, 10, 3),
(348, 51, 11, 0),
(349, 51, 12, 0),
(350, 51, 13, 0),
(351, 51, 14, 0),
(352, 51, 15, 0),
(353, 51, 16, 0),
(354, 51, 17, 0),
(355, 51, 18, 0),
(356, 52, 1, 0),
(357, 52, 2, 0),
(358, 52, 3, 0),
(359, 52, 4, 0),
(360, 52, 5, 0),
(361, 52, 6, 0),
(362, 52, 7, 0),
(363, 52, 8, 0),
(364, 52, 9, 0),
(365, 52, 10, 0),
(366, 52, 11, 0),
(367, 52, 12, 0),
(368, 52, 13, 0),
(369, 52, 14, 0),
(370, 52, 15, 0),
(371, 52, 16, 0),
(372, 52, 17, 0),
(373, 52, 18, 0),
(374, 53, 1, 1),
(375, 53, 2, 1),
(376, 53, 3, 1),
(377, 53, 4, 1),
(378, 53, 5, 1),
(379, 53, 6, 1),
(380, 53, 7, 1),
(381, 53, 8, 1),
(382, 53, 9, 1),
(383, 53, 10, 1),
(384, 53, 11, 1),
(385, 53, 12, 1),
(386, 53, 13, 1),
(387, 53, 14, 1),
(388, 53, 15, 1),
(389, 53, 16, 1),
(390, 53, 17, 1),
(391, 53, 18, 1),
(392, 54, 1, 3),
(393, 54, 2, 3),
(394, 54, 3, 3),
(395, 54, 4, 3),
(396, 54, 5, 3),
(397, 54, 6, 3),
(398, 54, 7, 3),
(399, 54, 8, 3),
(400, 54, 9, 3),
(401, 54, 10, 3),
(402, 54, 11, 3),
(403, 54, 12, 3),
(404, 54, 13, 3),
(405, 54, 14, 3),
(406, 54, 15, 3),
(407, 54, 16, 3),
(408, 54, 17, 3),
(409, 54, 18, 3);

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`ID`, `Username`, `pass`) VALUES
(1, 'Admin', '4608e255f0d5791fd73af76a519ebe45'),
(5, 'KalleAnka', '4608e255f0d5791fd73af76a519ebe45'),
(6, 'KalleAnkaIgen', '4608e255f0d5791fd73af76a519ebe45'),
(7, 'hejsan', '07902293083a8ea460af3386a8684347'),
(8, 'Ã¶Ã¤Ã¶lÃ¤l', 'c84da2c3ce367f35fa5c507eab83e457'),
(9, 'benjolina', '0efac41e34750f8de166b544ecf608de');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
