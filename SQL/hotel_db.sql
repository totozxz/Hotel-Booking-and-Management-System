-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2019 at 11:35 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `BookingID` int(6) NOT NULL,
  `GuestName` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TotalGuest` int(2) NOT NULL,
  `TotalCar` int(1) DEFAULT NULL,
  `BookTimestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Username` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CheckIn` date NOT NULL,
  `CheckOut` date NOT NULL,
  `Cancel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Subtotal` float NOT NULL,
  `TotalPrice` float NOT NULL,
  `PaymentMethod` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `CreditCardNo` int(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`BookingID`, `GuestName`, `TotalGuest`, `TotalCar`, `BookTimestamp`, `Username`, `CheckIn`, `CheckOut`, `Cancel`, `Subtotal`, `TotalPrice`, `PaymentMethod`, `CreditCardNo`) VALUES
(000001, 'Phuri', 2, 1, '2018-01-01 02:00:00', 'phuri123', '2018-07-02', '2018-07-03', 'N', 950, 950, 'Credit card', 2147483647),
(000002, 'Pasuk', 3, 1, '2018-01-01 09:00:00', 'pasukpat11', '2018-08-02', '2018-08-04', 'N', 2400, 2400, 'Tranfer', 0),
(000003, 'Warith', 4, 1, '2018-01-02 12:00:00', 'yachttt', '2018-10-16', '2018-10-17', 'N', 1600, 1600, 'Tranfer', 0),
(000004, 'Bank', 4, 2, '2018-01-03 01:00:00', 'kiratyeiei', '2018-05-16', '2018-05-17', 'N', 1600, 1600, 'Credit card', 2147483647),
(000005, 'Warit', 1, 1, '2018-01-04 01:00:00', 'markza', '2018-03-16', '2018-03-17', 'N', 1100, 1100, 'Tranfer', 0),
(000006, 'Catty', 2, 0, '2018-01-05 07:00:00', 'maewseesom', '2018-11-20', '2018-11-22', 'Y', 2000, 2000, 'Cash', 0),
(000007, 'Kridchasa', 2, 1, '2018-01-07 04:00:00', 'perrypreme', '2018-03-22', '2018-03-23', 'Y', 1100, 1100, 'Tranfer', 0),
(000008, 'Kittima', 4, 1, '2018-01-11 05:00:00', 'pinployyy', '2018-06-01', '2018-06-01', 'N', 1500, 1500, 'Credit card', 2147483647),
(000009, 'Nattanicha', 1, 1, '2018-01-15 01:00:00', 'yyyyyp', '2018-08-08', '2018-08-10', 'Y', 1700, 1700, 'Tranfer', 0),
(000010, 'Pakka', 4, 2, '2018-01-18 06:00:00', 'bowpakka', '2018-08-14', '2018-08-15', 'N', 1500, 1500, 'Tranfer', 0),
(000011, 'Mongkol', 1, 0, '2018-01-21 07:00:00', 'molkong', '2018-12-14', '2018-12-15', 'N', 850, 850, 'Tranfer', 0),
(000012, 'Peemai', 3, 1, '2018-01-25 08:00:00', 'peemaingai', '2018-12-14', '2018-12-15', 'N', 1200, 1200, 'Credit card', 2147483647),
(000013, 'Koi', 2, 1, '2018-01-27 04:00:00', 'Koicha', '2018-12-14', '2001-12-16', 'N', 2000, 2000, 'Tranfer', 0),
(000014, 'Kridchasa', 2, 1, '2018-01-31 12:00:00', 'perrypreme', '2018-06-14', '2018-06-16', 'N', 2400, 2400, 'Credit card', 2147483647),
(000015, 'Kaewkai', 3, 2, '2018-02-02 12:00:00', 'kaikookkook', '2018-03-14', '2018-03-15', 'N', 1100, 1100, 'Tranfer', 0),
(000016, 'Moowan', 5, 1, '2018-02-05 12:00:00', 'moowanna', '2018-02-14', '2018-02-16', 'Y', 3100, 3100, 'Tranfer', 0),
(000017, 'Minto', 2, 0, '2018-02-05 06:00:00', 'mmminto', '2018-02-14', '2018-02-15', 'Y', 850, 850, 'Tranfer', 0),
(000018, 'Khet', 2, 1, '2018-02-10 10:15:00', 'khettty', '2018-02-27', '2018-02-28', 'Y', 850, 850, 'Tranfer', 0),
(000019, 'Mhoo', 1, 1, '2018-02-16 11:00:00', 'mhoohed', '2018-02-27', '2018-02-27', 'N', 950, 950, 'Tranfer', 0),
(000020, 'Khem', 2, 1, '2018-02-17 12:00:00', 'khemm', '2018-03-05', '2018-03-06', 'N', 950, 950, 'Credit card', 2147483647),
(000021, 'Khaothang', 3, 1, '2018-02-20 06:26:00', 'khaothangg', '2018-05-14', '2018-05-17', 'N', 3600, 3600, 'Credit card', 2147483647),
(000022, 'Nongpho', 2, 1, '2018-02-23 02:52:00', 'nomnongpho', '2018-06-11', '2018-06-12', 'N', 1000, 1000, 'Tranfer', 0),
(000023, 'Pong', 2, 1, '2018-02-26 03:30:00', 'pongpeera', '2018-04-13', '2018-04-15', 'N', 2200, 2200, 'Tranfer', 0),
(000024, 'Pok', 3, 1, '2018-02-28 06:32:00', 'pokmindset', '2018-04-13', '2018-04-16', 'N', 3600, 3600, 'Tranfer', 0),
(000025, 'Pang', 2, 1, '2018-03-01 07:25:00', 'panggie', '2018-08-03', '2018-08-05', 'N', 2200, 2200, 'Tranfer', 0),
(000026, 'Yayyoy', 5, 1, '2018-03-05 01:02:00', 'khunyay', '2018-12-11', '2018-12-12', 'Y', 1700, 1700, 'Credit card', 2147483647),
(000027, 'Pensri', 4, 1, '2018-03-10 11:00:00', 'pensrisiri', '2018-12-06', '2018-12-10', 'N', 6400, 6400, 'Credit card', 2147483647),
(000028, 'Phuttha', 2, 2, '2018-03-14 10:52:00', 'phutthaaa', '2018-09-06', '2018-09-07', 'N', 1050, 1050, 'Tranfer', 0),
(000029, 'Phenkae', 2, 2, '2018-03-16 03:55:00', 'phenkaeka', '2018-09-10', '2018-09-12', 'N', 2400, 2400, 'Tranfer', 0),
(000030, 'Nobluk', 3, 1, '2018-03-20 09:42:00', 'noonnobluk', '2018-04-30', '2018-05-01', 'N', 1050, 1050, 'Tranfer', 0),
(000031, 'Icepadie', 3, 1, '2018-03-23 08:54:00', 'iceicepadie', '2018-09-13', '2018-09-15', 'N', 2100, 2100, 'Tranfer', 0),
(000032, 'Mintchy', 4, 1, '2018-03-30 05:39:00', 'mintchyyy', '2018-07-13', '2018-07-15', 'N', 1600, 1600, 'Tranfer', 0);

-- --------------------------------------------------------

--
-- Table structure for table `code_using`
--

CREATE TABLE `code_using` (
  `Username` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Code` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `code_using`
--

INSERT INTO `code_using` (`Username`, `Code`) VALUES
('committed008', 'SUMMER60_20'),
('committed008', 'WINTER60_15'),
('bigza007', 'WINTER60_15'),
('yachtzaza', 'SUMMER60_20'),
('yachtzaza', 'WINTER60_15'),
('bigza007', 'THNY60_15'),
('kittimaew', 'SUMMER60_20'),
('yyyyyok', 'NY60_10'),
('cattymaew', 'NY60_10');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Username` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FirstName` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LastName` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Username`, `FirstName`, `LastName`, `Email`, `Phone`, `Password`) VALUES
('bowpakka', 'Pakka', 'bowwy', 'tonza@gmail.com', '0926257171', 'aaaazaaa'),
('iceicepadie', 'Icepadie', 'Salsa', 'padielovesalsa@hotmail.com', '0966588746', 'icepd408063'),
('kaikookkook', 'Kaewkai', 'Kookkook', 'kookkookkai@live.com', '0844755469', '14725836'),
('khaothangg', 'Khaothang', 'Phothong', 'kaokhao9@gmail.com', '0899655858', 'kao999999999'),
('khemm', 'Khem', 'Onjira', 'khemthong@gmail.com', '0811455446', '66811455446'),
('khettty', 'Khet', 'Thanthup', 'khetthan@gmail.com', '0655877465', 'kk123456'),
('khunyay', 'Yayyoi', 'Wilailuk', 'yayyoyy@hotmail.com', '0844755744', '24252627'),
('kiratyeiei', 'Bank', 'Kiraty', 'bankintheair@live.com', '0864822254', 'bank7350'),
('Koicha', 'Koi', 'Chakaimook', 'chanom@gmail.com', '0655844478', '12345678'),
('maewseesom', 'Catty', 'Orange', 'catty-maew@gmail.com', '0819414150', 'maeworange'),
('markza', 'Warit', 'Chokchai', 'mark.waritt@gmail.com', '0855474662', 'lovepopo55'),
('mhoohed', 'Mhoo', 'Hedpedkai', 'moohedpedkai@live.com', '0655122214', '78945613'),
('mintchyyy', 'Mintchy', 'Snowball', 'mintchyy@gmail.com', '0645477752', 'mn5555555'),
('mmminto', 'Minto', 'Thana', 'minto@hotmail.com', '0855633255', 'mintototo5'),
('molkong', 'Mongkol', 'Pon-d', 'mongkol@hotmail.com', '0955877715', '12347896'),
('moowanna', 'Moowan', 'Tukcom', 'moo@gmail.com', '0877822444', 'moo123456'),
('nomnongpho', 'Nongpho', 'Nomkho', 'nomnongpho@hotmail.com', '0655254432', '11112222'),
('noonnobluk', 'Nobluk', 'Phonkol', 'nobluck@gmail.com', '0885521462', '4155pp22'),
('panggie', 'Pang', 'Hirun', 'panghirun@gmail.com', '0965584475', 'pangwenmin'),
('pasukpat11', 'Pasuk', 'Pattana', 'bigza007@hotmail.com', '0897475369', '123444561'),
('peemaingai', 'Peemai', 'Bonanza', 'peemaibo@hotmail.com', '0865223333', '2555555555'),
('pensrisiri', 'Pensri', 'Siri', 'pensiri@hotmail.com', '0855744766', '14555122'),
('phenkaeka', 'Phenkae', 'Kananon', 'phen@gmail.com', '0855477445', '123444444'),
('phuri123', 'Phuri', 'Chathirun', 'phuri-puri@gmail.com', '0855657442', '12345666'),
('phutthaaa', 'Phutta', 'Siri', 'phuttasi@gmail.com', '0855477474', '12345678'),
('pinployyy', 'Kittima', 'Pinkky', 'kitti-maew@hotmail.com', '0803604550', 'ploy123456'),
('pokmindset', 'Pok', 'Mindset', 'pokmindset@gmail.com', '0855477745', '123444555'),
('pongpeera', 'Pongpeera', 'Kingsuwan', 'pongking@gmail.com', '0877589965', 'pongking123'),
('yachttt', 'Warith', 'Anan', 'yachtzaza@hotmail.com', '0877822654', '11234444'),
('yyyyyp', 'Nattanicha', 'Pengpol', 'yyyyyok@yahoo.co.th', '0648752552', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `date_year`
--

CREATE TABLE `date_year` (
  `date_count` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `date_year`
--

INSERT INTO `date_year` (`date_count`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39),
(40),
(41),
(42),
(43),
(44),
(45),
(46),
(47),
(48),
(49),
(50),
(51),
(52),
(53),
(54),
(55),
(56),
(57),
(58),
(59),
(60),
(61),
(62),
(63),
(64),
(65),
(66),
(67),
(68),
(69),
(70),
(71),
(72),
(73),
(74),
(75),
(76),
(77),
(78),
(79),
(80),
(81),
(82),
(83),
(84),
(85),
(86),
(87),
(88),
(89),
(90),
(91),
(92),
(93),
(94),
(95),
(96),
(97),
(98),
(99),
(100),
(101),
(102),
(103),
(104),
(105),
(106),
(107),
(108),
(109),
(110),
(111),
(112),
(113),
(114),
(115),
(116),
(117),
(118),
(119),
(120),
(121),
(122),
(123),
(124),
(125),
(126),
(127),
(128),
(129),
(130),
(131),
(132),
(133),
(134),
(135),
(136),
(137),
(138),
(139),
(140),
(141),
(142),
(143),
(144),
(145),
(146),
(147),
(148),
(149),
(150),
(151),
(152),
(153),
(154),
(155),
(156),
(157),
(158),
(159),
(160),
(161),
(162),
(163),
(164),
(165),
(166),
(167),
(168),
(169),
(170),
(171),
(172),
(173),
(174),
(175),
(176),
(177),
(178),
(179),
(180),
(181),
(182),
(183),
(184),
(185),
(186),
(187),
(188),
(189),
(190),
(191),
(192),
(193),
(194),
(195),
(196),
(197),
(198),
(199),
(200),
(201),
(202),
(203),
(204),
(205),
(206),
(207),
(208),
(209),
(210),
(211),
(212),
(213),
(214),
(215),
(216),
(217),
(218),
(219),
(220),
(221),
(222),
(223),
(224),
(225),
(226),
(227),
(228),
(229),
(230),
(231),
(232),
(233),
(234),
(235),
(236),
(237),
(238),
(239),
(240),
(241),
(242),
(243),
(244),
(245),
(246),
(247),
(248),
(249),
(250),
(251),
(252),
(253),
(254),
(255),
(256),
(257),
(258),
(259),
(260),
(261),
(262),
(263),
(264),
(265),
(266),
(267),
(268),
(269),
(270),
(271),
(272),
(273),
(274),
(275),
(276),
(277),
(278),
(279),
(280),
(281),
(282),
(283),
(284),
(285),
(286),
(287),
(288),
(289),
(290),
(291),
(292),
(293),
(294),
(295),
(296),
(297),
(298),
(299),
(300),
(301),
(302),
(303),
(304),
(305),
(306),
(307),
(308),
(309),
(310),
(311),
(312),
(313),
(314),
(315),
(316),
(317),
(318),
(319),
(320),
(321),
(322),
(323),
(324),
(325),
(326),
(327),
(328),
(329),
(330),
(331),
(332),
(333),
(334),
(335),
(336),
(337),
(338),
(339),
(340),
(341),
(342),
(343),
(344),
(345),
(346),
(347),
(348),
(349),
(350),
(351),
(352),
(353),
(354),
(355),
(356),
(357),
(358),
(359),
(360),
(361),
(362),
(363),
(364),
(365),
(366);

-- --------------------------------------------------------

--
-- Table structure for table `discount_code`
--

CREATE TABLE `discount_code` (
  `Code` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ExpDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `discount_code`
--

INSERT INTO `discount_code` (`Code`, `ExpDate`) VALUES
('NY60_10', '2019-01-10'),
('SUMMER60_20', '2018-05-31'),
('THNY60_15', '2018-04-20'),
('WINTER60_15', '2018-12-20');

-- --------------------------------------------------------

--
-- Table structure for table `expense_account`
--

CREATE TABLE `expense_account` (
  `ExpenseID` int(6) NOT NULL,
  `PayedDate` date NOT NULL,
  `StaffID` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_account`
--

INSERT INTO `expense_account` (`ExpenseID`, `PayedDate`, `StaffID`) VALUES
(1, '2018-01-01', 'MN01'),
(2, '2018-01-03', 'MD01'),
(3, '2018-01-06', 'MD01'),
(4, '2018-01-09', 'MD01'),
(5, '2018-01-12', 'MD01'),
(6, '2018-01-18', 'MD01'),
(7, '2018-01-21', 'MD01'),
(8, '2018-01-22', 'ST01'),
(9, '2018-01-23', 'MD01'),
(10, '2018-01-26', 'ST03'),
(11, '2018-02-01', 'MN01'),
(12, '2018-02-03', 'MD01'),
(13, '2018-02-07', 'MD01'),
(14, '2018-02-11', 'MD01'),
(15, '2018-02-16', 'MD01'),
(16, '2018-02-21', 'MD01'),
(17, '2018-03-01', 'MN01'),
(18, '2018-03-04', 'MD07'),
(19, '2018-03-08', 'MD07'),
(20, '2018-03-11', 'MD07'),
(21, '2018-03-18', 'ST03'),
(22, '2018-03-25', 'MD07'),
(23, '2018-04-16', 'MN01'),
(24, '2018-04-16', 'MD07'),
(25, '2018-04-20', 'MD07'),
(26, '2018-04-20', 'ST03'),
(27, '2018-04-25', 'MD07'),
(28, '2018-04-30', 'MD07'),
(29, '2018-05-01', 'MN01'),
(30, '2018-05-03', 'MD02'),
(31, '2018-05-07', 'MD02'),
(32, '2018-05-11', 'MD02'),
(33, '2018-05-16', 'MD02'),
(34, '2018-05-21', 'MD02'),
(35, '2018-06-01', 'MN01'),
(36, '2018-06-04', 'MD07'),
(37, '2018-06-08', 'MD07'),
(38, '2018-06-11', 'MD07'),
(39, '2018-06-18', 'ST03'),
(40, '2018-06-25', 'MD07'),
(41, '2018-04-16', 'MN01'),
(42, '2018-07-16', 'MD07'),
(43, '2018-07-20', 'MD07'),
(44, '2018-07-20', 'ST03'),
(45, '2018-07-25', 'MD07'),
(46, '2018-07-30', 'MD07'),
(47, '2018-09-01', 'MN01'),
(48, '2018-09-03', 'MD02'),
(49, '2018-09-07', 'MD02'),
(50, '2018-09-11', 'MD02'),
(51, '2018-09-16', 'MD02'),
(52, '2018-09-21', 'MD02');

-- --------------------------------------------------------

--
-- Table structure for table `expense_item`
--

CREATE TABLE `expense_item` (
  `ExpenseID` int(6) NOT NULL,
  `ExpenseItem` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ExpenseType` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_item`
--

INSERT INTO `expense_item` (`ExpenseID`, `ExpenseItem`, `ExpenseType`, `Price`) VALUES
(1, 'Paid Salary', 'Salary', 160000),
(2, 'Food', 'Food', 3400),
(3, 'Food', 'Food', 4000),
(4, 'Food', 'Food', 3800),
(5, 'Food', 'Food', 3200),
(6, 'Food', 'Food', 4000),
(7, 'Food', 'Food', 4000),
(8, 'For cleansing', 'Utility', 5600),
(9, 'Food', 'Food', 4000),
(10, 'Change light bulb', 'Maintainnance', 900),
(11, 'Paid Salary', 'Salary', 160000),
(12, 'Food', 'Food', 4000),
(13, 'Food', 'Food', 3500),
(14, 'Food', 'Food', 4000),
(15, 'Food', 'Food', 3600),
(16, 'Food', 'Food', 5000),
(17, 'Paid Salary', 'Salary', 160000),
(18, 'Food', 'Food', 3500),
(19, 'Food', 'Food', 4000),
(20, 'Food', 'Food', 3600),
(21, 'Change mirror', 'Maintainnance', 1500),
(22, 'Food', 'Food', 5000),
(23, 'Holidays bonus', 'Salary', 18500),
(24, 'Food', 'Food', 2000),
(25, 'Food', 'Food', 3500),
(26, 'Repair bathroom', 'Maintainnance', 1500),
(27, 'Food', 'Food', 3500),
(28, 'Food', 'Food', 4000),
(29, 'Paid Salary', 'Salary', 160000),
(30, 'Food', 'Food', 3400),
(31, 'Food', 'Food', 1900),
(32, 'Food', 'Food', 2400),
(33, 'Food', 'Food', 2600),
(34, 'Food', 'Food', 2000),
(35, 'Change mirror', 'Maintainnance', 1500),
(36, 'Food', 'Food', 5000),
(37, 'Holidays bonus', 'Salary', 18500),
(38, 'Food', 'Food', 2000),
(39, 'Food', 'Food', 3500),
(40, 'Repair bathroom', 'Maintainnance', 1500),
(41, 'Food', 'Food', 3500),
(42, 'Food', 'Food', 4000),
(43, 'Paid Salary', 'Salary', 160000),
(44, 'Food', 'Food', 3400),
(45, 'Food', 'Food', 1900),
(46, 'Food', 'Food', 2400),
(47, 'Food', 'Food', 2600),
(48, 'Food', 'Food', 2000);
-- --------------------------------------------------------

--
-- Table structure for table `facility_type`
--

CREATE TABLE `facility_type` (
  `FacilityID` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FacilityType` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Price` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facility_type`
--

INSERT INTO `facility_type` (`FacilityID`, `FacilityType`, `Price`) VALUES
('F01', 'Breakfast', 100),
('F02', 'Extra bed', 200),
('F03', 'Car Service', 200),
('F04', 'Lunch', 500);

-- --------------------------------------------------------

--
-- Table structure for table `rooms_book`
--

CREATE TABLE `rooms_book` (
  `BookingID` int(6) NOT NULL,
  `RoomID` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GuestName` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SpecialRequest` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms_book`
--

INSERT INTO `rooms_book` (`BookingID`, `RoomID`, `GuestName`, `SpecialRequest`) VALUES
(000001, 'STD01', 'Phuri', 'Breakfast'),
(000002, 'DLX01', 'Pasuk', 'Extra bed'),
(000003, 'FMY01', 'Warith', 'Breakfast'),
(000004, 'FMY02', 'Bank', 'Car Service'),
(000005, 'DLX02', 'Warit', 'Breakfast'),
(000006, 'DLX01', 'Catty', ''),
(000007, 'DLX05', 'Kridchasa', 'Breakfast'),
(000008, 'FMY03', 'Kittima', ''),
(000009, 'STD02', 'Nattanicha', ''),
(000010, 'FMY01', 'Pakka', ''),
(000011, 'STD01', 'Mongkol', ''),
(000012, 'DLX01', 'Peemai', 'Extra bed'),
(000013, 'DLX02', 'Koi', ''),
(000014, 'DLX03', 'Kridchasa', 'Car Service'),
(000015, 'DLX04', 'Kaewkai', 'Breakfast'),
(000016, 'FML02', 'Moowan', 'Breakfast'),
(000017, 'STD02', 'Minto', ''),
(000018, 'STD11', 'Khet', ''),
(000019, 'STD12', 'Mhoo', 'Breakfast'),
(000020, 'STD13', 'Khem', 'Breakfast'),
(000021, 'DLX11', 'Khaothang', 'Extra bed'),
(000022, 'DLX12', 'Nongpho', ''),
(000023, 'DLX13', 'Pong', 'Breakfast'),
(000024, 'DLX16', 'Pok', 'Extra bed'),
(000025, 'DLX20', 'Pang', 'Breakfast'),
(000026, 'FML06', 'Yayyoy', 'Extra bed'),
(000027, 'FML07', 'Pensri', 'Breakfast'),
(000028, 'STD01', 'Phuttha', 'Car Service'),
(000029, 'DLX11', 'Phenkae', 'Car Service'),
(000030, 'STD30', 'Nobluk', 'Extra bed'),
(000031, 'STD21', 'Icepadie', 'Extra bed'),
(000032, 'FML10', 'Mintchy', 'Breakfast');

-- --------------------------------------------------------

--
-- Table structure for table `room_cleaning`
--

CREATE TABLE `room_cleaning` (
  `StaffID` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RoomID` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `BookingID` int(6) NOT NULL,
  `Status` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Significance` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_cleaning`
--

INSERT INTO `room_cleaning` (`StaffID`, `RoomID`, `BookingID`, `Status`, `Significance`) VALUES
('MD04', 'DLX01', 0, 'VC', 0),
('MD04', 'DLX02', 0, 'VD', 2),
('MD04', 'DLX03', 0, 'VD', 2),
('MD04', 'DLX04', 0, 'VC', 0),
('MD04', 'DLX05', 0, 'VC', 0),
('MD04', 'DLX06', 0, 'VC', 0),
('MD04', 'DLX07', 0, 'VC', 0),
('MD05', 'DLX08', 0, 'VD', 2),
('MD05', 'DLX09', 0, 'VD', 2),
('MD05', 'DLX10', 0, 'VC', 0),
('MD05', 'DLX11', 0, 'VC', 0),
('MD05', 'DLX12', 0, 'VC', 0),
('MD05', 'DLX13', 0, 'VC', 0),
('MD05', 'DLX14', 0, 'VC', 0),
('MD06', 'DLX15', 0, 'VC', 0),
('MD06', 'DLX16', 0, 'VC', 0),
('MD06', 'DLX17', 0, 'VC', 0),
('MD06', 'DLX18', 0, 'VD', 2),
('MD06', 'DLX19', 0, 'VD', 2),
('MD06', 'DLX20', 0, 'VC', 0),
('MD06', 'FMY01', 0, 'VC', 0),
('MD07', 'FMY02', 0, 'VC', 0),
('MD07', 'FMY03', 0, 'VC', 0),
('MD07', 'FMY04', 0, 'VC', 0),
('MD07', 'FMY05', 0, 'VC', 0),
('MD07', 'FMY06', 0, 'VD', 2),
('MD07', 'FMY07', 0, 'VD', 2),
('MD07', 'FMY08', 0, 'VC', 0),
('MD07', 'FMY09', 0, 'VC', 0),
('MD07', 'FMY10', 0, 'VC', 0),
('MD03', 'SDT30', 0, 'VC', 0),
('MD01', 'STD01', 1, 'OD', 2),
('MD01', 'STD02', 0, 'VD', 2),
('MD01', 'STD03', 0, 'VD', 2),
('MD01', 'STD04', 0, 'VD', 2),
('MD01', 'STD05', 0, 'VD', 2),
('MD01', 'STD06', 0, 'VC', 0),
('MD01', 'STD07', 0, 'VC', 0),
('MD01', 'STD08', 0, 'VC', 0),
('MD01', 'STD09', 0, 'VC', 0),
('MD01', 'STD10', 0, 'VC', 0),
('MD02', 'STD11', 0, 'VD', 2),
('MD02', 'STD12', 0, 'VD', 2),
('MD02', 'STD13', 0, 'VD', 2),
('MD02', 'STD14', 0, 'VC', 0),
('MD02', 'STD15', 0, 'VC', 0),
('MD02', 'STD16', 0, 'VC', 0),
('MD02', 'STD17', 0, 'VC', 0),
('MD02', 'STD18', 0, 'VC', 0),
('MD02', 'STD19', 0, 'VC', 0),
('MD02', 'STD20', 0, 'VD', 2),
('MD03', 'STD21', 0, 'VC', 0),
('MD03', 'STD22', 0, 'VC', 0),
('MD03', 'STD23', 0, 'VC', 0),
('MD03', 'STD24', 0, 'VC', 0),
('MD03', 'STD25', 0, 'VC', 0),
('MD03', 'STD26', 0, 'VD', 2),
('MD03', 'STD27', 0, 'VD', 2),
('MD03', 'STD28', 0, 'VD', 2),
('MD03', 'STD29', 0, 'VC', 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_detail`
--

CREATE TABLE `room_detail` (
  `RoomType` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaxPerson` int(2) NOT NULL,
  `RoomPrice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_detail`
--

INSERT INTO `room_detail` (`RoomType`, `MaxPerson`, `RoomPrice`) VALUES
('Deluxe', 2, 1000),
('Family', 4, 1500),
('Standard', 2, 850);

-- --------------------------------------------------------

--
-- Table structure for table `room_facility`
--

CREATE TABLE `room_facility` (
  `BookingID` int(6) NOT NULL,
  `RoomID` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FacilityID` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_facility`
--

INSERT INTO `room_facility` (`BookingID`, `RoomID`, `FacilityID`) VALUES
(000001, 'STD01', 'F01'),
(000002, 'DLX01', 'F02'),
(000003, 'FMY01', 'F01'),
(000004, 'FMY02', 'F03'),
(000005, 'DLX02', 'F01'),
(000007, 'DLX05', 'F01'),
(000012, 'DLX01', 'F02'),
(000014, 'DLX03', 'F03'),
(000015, 'DLX04', 'F01'),
(000016, 'FML02', 'F01'),
(000019, 'STD12', 'F01'),
(000020, 'STD13', 'F01'),
(000021, 'DLX11', 'F02'),
(000023, 'DLX13', 'F01'),
(000024, 'DLX16', 'F02'),
(000025, 'DLX20', 'F01'),
(000026, 'FML06', 'F02'),
(000027, 'FML07', 'F01'),
(000028, 'STD01', 'F03'),
(000029, 'DLX11', 'F03'),
(000030, 'STD30', 'F02'),
(000031, 'STD21', 'F02'),
(000032, 'FML10', 'F01');

-- --------------------------------------------------------

--
-- Table structure for table `room_list`
--

CREATE TABLE `room_list` (
  `RoomID` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RoomType` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_list`
--

INSERT INTO `room_list` (`RoomID`, `RoomType`) VALUES
('DLX01', 'Deluxe'),
('DLX02', 'Deluxe'),
('DLX03', 'Deluxe'),
('DLX04', 'Deluxe'),
('DLX05', 'Deluxe'),
('DLX06', 'Deluxe'),
('DLX07', 'Deluxe'),
('DLX08', 'Deluxe'),
('DLX09', 'Deluxe'),
('DLX10', 'Deluxe'),
('DLX11', 'Deluxe'),
('DLX12', 'Deluxe'),
('DLX13', 'Deluxe'),
('DLX14', 'Deluxe'),
('DLX15', 'Deluxe'),
('DLX16', 'Deluxe'),
('DLX17', 'Deluxe'),
('DLX18', 'Deluxe'),
('DLX19', 'Deluxe'),
('DLX20', 'Deluxe'),
('FMY01', 'Family'),
('FMY02', 'Family'),
('FMY03', 'Family'),
('FMY04', 'Family'),
('FMY05', 'Family'),
('FMY06', 'Family'),
('FMY07', 'Family'),
('FMY08', 'Family'),
('FMY09', 'Family'),
('FMY10', 'Family'),
('STD01', 'Standard'),
('STD02', 'Standard'),
('STD03', 'Standard'),
('STD04', 'Standard'),
('STD05', 'Standard'),
('STD06', 'Standard'),
('STD07', 'Standard'),
('STD08', 'Standard'),
('STD09', 'Standard'),
('STD10', 'Standard'),
('STD11', 'Standard'),
('STD12', 'Standard'),
('STD13', 'Standard'),
('STD14', 'Standard'),
('STD15', 'Standard'),
('STD16', 'Standard'),
('STD17', 'Standard'),
('STD18', 'Standard'),
('STD19', 'Standard'),
('STD20', 'Standard'),
('STD21', 'Standard'),
('STD22', 'Standard'),
('STD23', 'Standard'),
('STD24', 'Standard'),
('STD25', 'Standard'),
('STD26', 'Standard'),
('STD27', 'Standard'),
('STD28', 'Standard'),
('STD29', 'Standard'),
('STD30', 'Standard');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffID` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Position` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FirstName` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LastName` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Gender` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CitizenID` int(13) NOT NULL,
  `Salary` float NOT NULL,
  `Account` int(10) NOT NULL,
  `Password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `Position`, `FirstName`, `LastName`, `Gender`, `Phone`, `Email`, `Address`, `CitizenID`, `Salary`, `Account`, `Password`) VALUES
('MD01', 'Maid', 'Somying', 'Marcie', 'F', '0842649535', 'somying14@gmail.com', '79/55 M.15 Baan ped district Muang Khonkean', 40140, 10000, 2128672234, '1234566'),
('MD02', 'Maid', 'Somsri', 'Matt', 'F', '0877422425', 'somsri11@hotmail.com', '30/122 M.1 KhoakKham distrint Muang Samutsakorn', 74000, 10000, 2147483647, '1234566'),
('MD03', 'Maid', 'Sa-morn', 'Genie', 'F', '0809365565', 'sa_morn55@gmail.com', '19/60 Sukumvit13 KlongtoeyNua Wattana Bkk', 10110, 10000, 2147483647, '1234566'),
('MD04', 'Maid', 'Wilai', 'Damian', 'F', '0945655003', 'wilai_wiwi@gmail.com', '14/45 Sukumvit 52 Onnut Klongtoey Bkk', 10110, 10000, 2147483647, '1234566'),
('MD05', 'Maid', 'Juntra', 'Christopher', 'F', '0907471620', 'jjuntra_wong@hotmail.com', 'Leelawadee Apartment Soi Pahonyothin45 Ladyao Jatujak Bkk', 10900, 10000, 2147483647, '1234566'),
('MD06', 'Maid', 'Duangdao', 'Janie', 'F', '0822114658', 'star_duangdaoo@gmail.com', '324/6 M.7 KlongGiw Distrint Baanbung Chonburi', 20220, 10000, 2147483647, '1234566'),
('MD07', 'Maid', 'Junpen', 'Stephanie', 'F', '0922743595', 'junpen.khumkeaw@hotmail.com', '162/49 M.7 Bangsaothong Distrint BangSaoThong Samutprakarn', 10570, 10000, 2147483647, '1234566'),
('MN01', 'Manager', 'Kirati', 'Pauline', 'M', '0909406350', 'kiratibankblank@hotmail.com', '403/4 M.3 Surasuk Sriracha Chonburi ', 20110, 30000, 123123123, '1234566'),
('ST01', 'Staff', 'Yupin', 'Sean', 'F', '0865651444', 'yupin.h10@gmail.com', '95/417 Soi Sukhumvit64 Bangjak Prakhanong BKK', 10260, 20000, 1532241898, '1234566'),
('ST02', 'Staff', 'Nutsurang', 'Roberta', 'F', '0902657092', 'frong1995@gmail.com', '15/6 Life Sukumvit48 Prakhanong Klongtoey Bkk', 10110, 20000, 2147483647, '1234566'),
('ST03', 'Staff', 'Suttisuk', 'Nikol', 'M', '0877822996', 'pok.suttisuk@gmail.com', '19/60 Sukumvit13 KlongtoeyNua Wattana Bkk', 10110, 20000, 2147483647, '1234566');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`BookingID`),
  ADD KEY `Username` (`Username`);

--
-- Indexes for table `code_using`
--
ALTER TABLE `code_using`
  ADD KEY `Username` (`Username`),
  ADD KEY `Code` (`Code`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `discount_code`
--
ALTER TABLE `discount_code`
  ADD PRIMARY KEY (`Code`);

--
-- Indexes for table `expense_account`
--
ALTER TABLE `expense_account`
  ADD PRIMARY KEY (`ExpenseID`),
  ADD KEY `StaffID` (`StaffID`);

--
-- Indexes for table `expense_item`
--
ALTER TABLE `expense_item`
  ADD KEY `ExpenseID` (`ExpenseID`);

--
-- Indexes for table `facility_type`
--
ALTER TABLE `facility_type`
  ADD PRIMARY KEY (`FacilityID`);

--
-- Indexes for table `rooms_book`
--
ALTER TABLE `rooms_book`
  ADD PRIMARY KEY (`BookingID`,`RoomID`),
  ADD KEY `RoomID` (`RoomID`);

--
-- Indexes for table `room_cleaning`
--
ALTER TABLE `room_cleaning`
  ADD PRIMARY KEY (`RoomID`,`BookingID`),
  ADD KEY `BookingID` (`BookingID`),
  ADD KEY `StaffID` (`StaffID`);

--
-- Indexes for table `room_detail`
--
ALTER TABLE `room_detail`
  ADD PRIMARY KEY (`RoomType`);

--
-- Indexes for table `room_facility`
--
ALTER TABLE `room_facility`
  ADD PRIMARY KEY (`BookingID`,`RoomID`,`FacilityID`),
  ADD KEY `RoomID` (`RoomID`),
  ADD KEY `FacilityID` (`FacilityID`);

--
-- Indexes for table `room_list`
--
ALTER TABLE `room_list`
  ADD PRIMARY KEY (`RoomID`),
  ADD KEY `RoomType` (`RoomType`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`StaffID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `BookingID` int(6) NOT NULL AUTO_INCREMENT;

ALTER TABLE `expense_account`
  MODIFY `ExpenseID` int(6) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `customer` (`Username`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `code_using`
--
ALTER TABLE `code_using`
  ADD CONSTRAINT `code_using_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `customer` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `code_using_ibfk_2` FOREIGN KEY (`Code`) REFERENCES `discount_code` (`Code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `expense_account`
--
ALTER TABLE `expense_account`
  ADD CONSTRAINT `expense_account_ibfk_1` FOREIGN KEY (`StaffID`) REFERENCES `staff` (`StaffID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `expense_account_ibfk_2` FOREIGN KEY (`StaffID`) REFERENCES `staff` (`StaffID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `expense_account_ibfk_3` FOREIGN KEY (`StaffID`) REFERENCES `staff` (`StaffID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `expense_account_ibfk_4` FOREIGN KEY (`StaffID`) REFERENCES `staff` (`StaffID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `expense_item`
--
ALTER TABLE `expense_item`
  ADD CONSTRAINT `expense_item_ibfk_1` FOREIGN KEY (`ExpenseID`) REFERENCES `expense_account` (`ExpenseID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rooms_book`
--
ALTER TABLE `rooms_book`
  ADD CONSTRAINT `rooms_book_ibfk_1` FOREIGN KEY (`BookingID`) REFERENCES `booking` (`BookingID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rooms_book_ibfk_2` FOREIGN KEY (`RoomID`) REFERENCES `room_list` (`RoomID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room_cleaning`
--
ALTER TABLE `room_cleaning`
  ADD CONSTRAINT `room_cleaning_ibfk_1` FOREIGN KEY (`BookingID`) REFERENCES `booking` (`BookingID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `room_cleaning_ibfk_2` FOREIGN KEY (`StaffID`) REFERENCES `staff` (`StaffID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `room_cleaning_ibfk_3` FOREIGN KEY (`RoomID`) REFERENCES `room_list` (`RoomID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room_facility`
--
ALTER TABLE `room_facility`
  ADD CONSTRAINT `room_facility_ibfk_1` FOREIGN KEY (`BookingID`) REFERENCES `booking` (`BookingID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `room_facility_ibfk_2` FOREIGN KEY (`RoomID`) REFERENCES `rooms_book` (`RoomID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `room_facility_ibfk_3` FOREIGN KEY (`FacilityID`) REFERENCES `facility_type` (`FacilityID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room_list`
--
ALTER TABLE `room_list`
  ADD CONSTRAINT `room_list_ibfk_1` FOREIGN KEY (`RoomType`) REFERENCES `room_detail` (`RoomType`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
