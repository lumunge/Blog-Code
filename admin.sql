-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2019 at 07:24 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `type` text NOT NULL,
  `mpesa` varchar(10) NOT NULL,
  `amount` int(5) NOT NULL,
  `password` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `type`, `mpesa`, `amount`, `password`, `date`) VALUES
(18, 'Bandle', 'user', 'dgdhgjds', 100, '$2y$10$0HZ7TK7Fv51y4gIn16F2T.NuUzMyZraV3pB0S76Ygv46ofRIw7lNW', '2019-11-14 08:29:28'),
(19, 'Lumunge', 'user', 'dgdhgjds', 100, '$2y$10$DU2loOHvicD6r.x6XI2fWusNkg4OoQgU4zd1Pf6ySXkhuF4qvnyIG', '2019-11-14 08:31:36'),
(23, 'Mafundi', 'user', 'Mwssyusda', 100, '$2y$10$6T2CL70xLb.1s5FeHi5E7.gs0XKH1QrzXzYvxlfR9YoK4vqtD7X8e', '2019-11-15 07:44:32'),
(32, 'Registration', 'user', 'msdnsmdns', 100, '$2y$10$9J8qkM6wR1YVaFb3WY534uc4HAiLJiry/3On00nX5XcrlgCa1E/dG', '2019-11-23 08:43:31'),
(33, 'Joni', 'user', 'MAQww34', 100, '$2y$10$vF7lgB69ar.PDLRWWqNrl.cAGrKY1gxt.22PwV9enp0LNhdup0M3C', '2019-11-26 08:57:52'),
(34, 'Play', 'user', 'MAss456', 100, '$2y$10$hN047EOG1u75pNcX.jqHYutEF.dCQwlP2NyAJC1re7yj.m2hEseva', '2019-11-28 09:58:48'),
(35, 'James', 'user', 'MAER34', 100, '$2y$10$MTUUItkdQM/X3A8D.vtfluBWrtdbAsYMcCRwUwTrUKM3jQhthApPy', '2019-12-06 13:38:48'),
(36, 'Warm', 'user', 'FTTR4556', 100, '$2y$10$0feyHtqxfuMSQV2oJgPV4OotHyAiOE0k4GuLYfPZBQpeXZ8HN94oS', '2019-11-28 08:09:51'),
(37, 'Day', 'user', 'MADDErt45', 100, '$2y$10$Qcufr/oK78UjXnE0IeJFkO86w88Ke6zylrOq9meI3NnDjuH7JYpfa', '2019-11-28 08:14:28');

-- --------------------------------------------------------

--
-- Table structure for table `adminmessages`
--

CREATE TABLE `adminmessages` (
  `msg_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminmessages`
--

INSERT INTO `adminmessages` (`msg_id`, `username`, `message`, `date`) VALUES
(5, 'Registration', 'Hello Admin it is the client i wanted to know how to  login to my system.', '2019-11-21 12:01:26'),
(9, 'Registration', 'I did not seem to find a solution. pease help.', '2019-11-21 12:53:49'),
(11, 'Joni', 'Out of africa came everything.', '2019-11-26 05:59:20'),
(12, 'Registration', 'My feedback is here', '2019-11-27 11:49:14'),
(13, 'Play', 'Today is friday', '2019-11-28 07:04:57'),
(14, 'Play', 'The right way', '2019-11-28 07:07:52'),
(15, 'Play', 'Coming you rway', '2019-11-28 07:08:22'),
(16, 'Play', 'know now how\r\n', '2019-11-28 07:11:11'),
(17, 'Play', 'know now how\r\n', '2019-11-28 07:11:23'),
(19, 'Play', 'know now how\r\n', '2019-11-28 07:12:24'),
(22, 'Registration', 'sdfghjkl', '2019-12-08 06:34:27');

-- --------------------------------------------------------

--
-- Table structure for table `admintechnicianmessages`
--

CREATE TABLE `admintechnicianmessages` (
  `msg_id` int(11) NOT NULL,
  `admin` text NOT NULL,
  `technician` text NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admintechnicianmessages`
--

INSERT INTO `admintechnicianmessages` (`msg_id`, `admin`, `technician`, `message`, `date`) VALUES
(4, 'kibz@gmail.com', 'Davido', 'sdfghjkl', '2019-12-08 10:10:33'),
(8, 'kibz@gmail.com', 'Davido', 'dfghjkl', '2019-12-08 10:12:09'),
(9, 'kibz@gmail.com', 'Davido', 'sdfghjkl;', '2019-12-08 11:44:23'),
(10, 'kibz@gmail.com', 'Davido', 'sdfghjkl', '2019-12-08 11:44:59'),
(11, 'kibz@gmail.com', 'Saty', 'This is the administrator please bear with us.', '2019-12-08 11:59:15');

-- --------------------------------------------------------

--
-- Table structure for table `approvedpayments`
--

CREATE TABLE `approvedpayments` (
  `pend_id` int(11) NOT NULL,
  `phone` int(10) NOT NULL,
  `service` text NOT NULL,
  `mpesa` varchar(10) NOT NULL,
  `amount` int(6) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approvedpayments`
--

INSERT INTO `approvedpayments` (`pend_id`, `phone`, `service`, `mpesa`, `amount`, `date`) VALUES
(19, 722334455, 'Metal Works', 'MWSSDtt56', 4556, '2019-11-19 04:50:03'),
(20, 722334455, 'Showers', 'MWSSDtt56', 256, '2019-11-19 04:49:47'),
(21, 712345678, 'DoorLock Breaking', 'MAQWEr45', 650, '2019-11-20 11:53:58'),
(25, 744589996, 'Hanging Lines', 'MWWRS', 2569, '2019-11-27 12:43:08'),
(26, 712345678, 'Electrician', 'MAER34', 790, '2019-12-06 13:49:00'),
(27, 712345678, 'Plumbing', 'MAER34', 800, '2019-12-06 13:52:53'),
(28, 722334455, 'Plumbing', 'MASW56tTY', 250, '2019-12-07 10:28:14'),
(29, 722334455, 'Plumbing', 'MASW56tTY', 1589, '2019-12-07 10:29:46');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `book_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `service` varchar(20) NOT NULL,
  `location` varchar(30) NOT NULL,
  `house_name` varchar(30) NOT NULL,
  `house_number` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  `bookdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `addDescription` varchar(100) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`book_id`, `username`, `service`, `location`, `house_name`, `house_number`, `email`, `phone`, `bookdate`, `addDescription`, `status`) VALUES
(133, 'Play', 'Hanging Lines', 'PoshMart', 'Glass House', 15, 'play@gmail.com', 712345678, '2019-11-28 07:03:30', 'sdfghjkl', ''),
(134, 'James', 'Electrician', 'PoshMart', 'Joshua\'s Place', 15, 'jamo@gmail', 712345678, '2019-12-06 10:41:29', 'no deesc', ''),
(135, 'James', 'Plumbing', 'Meru Town', 'Orange House', 15, 'jamo@gmail', 712345678, '2019-12-06 10:52:26', 'Located in 1st f;lorr', ''),
(140, 'Registration', 'DoorLock Breaking', 'Mathare', 'HillTop', 15, 'reg@gmail.com', 723030589, '2019-12-08 13:36:17', 'Jigger for lunch.', ''),
(144, 'Registration', 'Painting', 'Runogone', 'HillTop', 15, 'reg@gmail.com', 723030589, '2019-12-08 13:46:50', 'fghjkl', ''),
(145, 'James', 'Inner Decorations', 'Makutano', 'Yellow House', 10, 'reg@gmail.com', 723030589, '2019-12-08 13:48:04', 'sdfghjkl;', '');

-- --------------------------------------------------------

--
-- Table structure for table `custmessages`
--

CREATE TABLE `custmessages` (
  `msg_id` int(11) NOT NULL,
  `admin` text NOT NULL,
  `client` text NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `custmessages`
--

INSERT INTO `custmessages` (`msg_id`, `admin`, `client`, `message`, `date`) VALUES
(4, 'admin', 'Registration', 'There isno end', '2019-11-21 09:12:16'),
(10, 'admin', 'David', 'You dont demand you ask politely.', '2019-11-21 12:56:05'),
(11, 'Admin', 'Joni', 'Yes that was true.', '2019-11-26 06:00:57'),
(12, 'admin', 'Registration', 'Go to the dashboard.', '2019-11-27 11:50:14'),
(13, 'admin', 'Play', 'dfghjklf', '2019-11-28 09:29:51');

-- --------------------------------------------------------

--
-- Table structure for table `emaillist`
--

CREATE TABLE `emaillist` (
  `id` int(11) NOT NULL,
  `emailaddress` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emaillist`
--

INSERT INTO `emaillist` (`id`, `emailaddress`, `timestamp`) VALUES
(1, 'Nyash@gmail.com', '2019-11-06 08:04:52'),
(2, 'Balance@gmail.com', '2019-11-06 08:05:14');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `phone` int(10) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `comment` varchar(300) DEFAULT NULL,
  `date&time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `username`, `phone`, `email`, `comment`, `date&time`) VALUES
(38, 'marleyBob', 741254789, 'marleybob@gmail.com', 'I dont hav any for now but there is so mushtrouble in the world', '2019-10-05 10:40:19'),
(39, 'linkup', 744215889, 'treaty@gmail', 'dfghjk', '2019-10-05 15:07:54'),
(44, 'Angola', 744586999, 'ngola@gmail.com', 'No thoughts For now', '2019-11-06 10:31:35'),
(45, 'David', 712345678, 'davy@gmail.com', 'No thoughts\r\n', '2019-11-20 08:57:33'),
(46, 'Davido', NULL, NULL, 'no thoughts', '2019-12-08 06:42:16');

-- --------------------------------------------------------

--
-- Table structure for table `partialpayments`
--

CREATE TABLE `partialpayments` (
  `id` int(11) NOT NULL,
  `phone` int(10) NOT NULL,
  `service` text NOT NULL,
  `mpesa` varchar(10) NOT NULL,
  `amount` int(6) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partialpayments`
--

INSERT INTO `partialpayments` (`id`, `phone`, `service`, `mpesa`, `amount`, `date`) VALUES
(41, 712358965, 'Plumbing', 'bbgfddfhg', 230, '2019-11-17 08:30:25'),
(63, 71245678, 'Plumbing', 'MASW56tTY', 250, '2019-12-07 07:27:20');

-- --------------------------------------------------------

--
-- Table structure for table `refunds`
--

CREATE TABLE `refunds` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `phone` int(10) NOT NULL,
  `email` text NOT NULL,
  `claim` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `refunds`
--

INSERT INTO `refunds` (`id`, `username`, `phone`, `email`, `claim`) VALUES
(1, 'Registration', 722334455, 'reggy@gmail.com', 'Poor Service Quality.'),
(2, 'David', 712345678, 'davy@gmail.com', 'Poor Service Quality.');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `email`, `password`, `usertype`) VALUES
(1, 'lumunge', 'lumungep12@gmail.com', '123456', 'admin'),
(2, 'mwabe', 'mwabejohn@gmail.com', '12456', 'admin'),
(4, 'Ethan', 'kibz@gmail.com', '2015', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `date` datetime NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `techaccounts`
--

CREATE TABLE `techaccounts` (
  `id` int(11) NOT NULL,
  `techusername` text NOT NULL,
  `phone` int(10) NOT NULL,
  `email` text NOT NULL,
  `location` text NOT NULL,
  `profession` text NOT NULL,
  `password` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `techaccounts`
--

INSERT INTO `techaccounts` (`id`, `techusername`, `phone`, `email`, `location`, `profession`, `password`, `date`) VALUES
(1, '', 744589663, 'tet@gmail.com', 'Runogone', 'Plumber', '', '2019-11-14 11:50:38'),
(2, 'Beep', 744589663, 'tet@gmail.com', 'Mathare', 'Wood Works', '', '2019-11-14 15:52:47'),
(4, 'fundiwapili', 712345678, 'fundiwapili@gmail', 'Runogone', 'DoorLock Breaking', '$2y$10$rcGjaektmpebdJcymBskKOWDEjycWHS5nQB9Wr9ywMobI34yXiXem', '2019-12-07 07:49:26'),
(5, 'Davido', 712345678, 'davi@gmail.com', 'Runogone', 'Plumber', '$2y$10$x8POyqdZs1J0Q/e.ivXUr.ioSglZzcsgTFU3z5LmEHUtd6KOp0YSK', '2019-12-08 06:40:21'),
(6, 'Saty', 723030588, 'saty@gmail.com', 'Mejjas', 'Electrician', '$2y$10$TrjGWRx/bH9uhZXudGmqoezIM.lqflu0oifdDOK5EYxx2CAlGQu.y', '2019-12-07 08:20:19'),
(7, 'Day', 723030588, 'day@hotmail.com', 'Mathare', 'Mobile Repairer', '$2y$10$keaXl22sJGwGk6bYVeWHWuxEFUA9GVrDDD6MvLIszQvRoz0d/pOSG', '2019-12-07 08:24:19');

-- --------------------------------------------------------

--
-- Table structure for table `technician`
--

CREATE TABLE `technician` (
  `id` int(11) NOT NULL,
  `techusername` text NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `location` varchar(30) NOT NULL,
  `profession` varchar(30) NOT NULL,
  `password` varchar(500) NOT NULL,
  `addDescription` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `technician`
--

INSERT INTO `technician` (`id`, `techusername`, `phone`, `email`, `location`, `profession`, `password`, `addDescription`, `date`) VALUES
(64, 'Mwabe', 725369854, 'mwabs@gmail.com', 'JoyLand', 'Hanging Lines', '$2y$10$lQBSCbdEYe9HwvzjD00TMOxzCwS578BOViOFycc0..7ax41inZqt.', '', '2019-11-17 08:36:04'),
(65, 'Fundi', 745869999, 'fundi@gmail.com', 'Mejjas', 'Painting', '$2y$10$eYqQ/Dv4E/NilC0sGJD1w.C3FeMTakDLubJ1nWZFTL04eMEDDuGiK', '', '2019-11-28 07:16:06'),
(70, 'cutty', 722334455, 'maily@g', 'Mejjas', 'Mobile Repairer', '$2y$10$BN7c93UhEODYuLRlL5Zv3uOEG51z.fXKHqmgvtcxyiNGwXJZqn74a', '', '2019-12-08 06:05:24'),
(71, 'Rescue', 712345673, 'mail@gmail.com', 'Runogone', 'Plumber', '$2y$10$vFxY4wM/hRNExFlzI.Zb/O6ii4TqCZlcAhqun3O2Ku0wdosPEooUi', '', '2019-12-08 06:24:28');

-- --------------------------------------------------------

--
-- Table structure for table `technicianadminmessages`
--

CREATE TABLE `technicianadminmessages` (
  `msg_id` int(11) NOT NULL,
  `techusername` text NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `technicianadminmessages`
--

INSERT INTO `technicianadminmessages` (`msg_id`, `techusername`, `message`, `date`) VALUES
(6, 'Davido', 'working for the next dsay', '2019-12-08 06:58:10'),
(7, 'Saty', 'dfghjkfghjkl', '2019-12-08 06:59:13'),
(8, 'Saty', 'i am saty and today is sunday', '2019-12-08 11:58:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `type` text NOT NULL,
  `mpesa` varchar(20) NOT NULL,
  `amount` int(5) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `type`, `mpesa`, `amount`, `password`, `date`) VALUES
(104, 'Dun', '', 'MADDErt45', 100, '$2y$10$H18lztxUvqb46J4dseUiqe8Quvj.C5nyU3MlmwLxd3nHzcII.V/SS', '2019-11-28 08:20:37'),
(105, 'Off', '', 'Ma34Qst', 100, '$2y$10$.hW9aI/M.7mHEXHSVMbrZOYFb1TK3CzYtkygav6ftOApbedNLLwz.', '2019-11-28 08:25:59'),
(106, 'Brother', '', 'Ma34Qst', 100, '$2y$10$W5JKkfB1M6RxuzvgjYZXLethtAf8ICsUwcSO0qOD8qfdILfx/4PB2', '2019-11-28 08:28:46'),
(107, 'ThisYa', '', 'Ma34Qst', 100, '$2y$10$im4rccYqe9Mq91ygMz6LPegvBMGPzNfpRk3f2kQAmzcsntmgLN0D6', '2019-11-28 08:29:34'),
(108, 'Over', '', 'Ma34Qst', 100, '$2y$10$LGarNtMBrdJAj4rdfzw50ejatn/vvg/Ivpp90QayTLJ1ymRuMc24.', '2019-11-28 08:32:30'),
(109, 'Treaty', '', 'Ma34Qst', 100, '$2y$10$I4T76dPsBaNRxyQsCm1a6.59HU65XS7rGAbDadAN.FRsULWdEI5F2', '2019-11-28 08:34:39'),
(110, 'Dutch', '', 'Ma34Qst', 100, '$2y$10$pT36Bb95n9QIIX5s.Jqat.ttY9ikmHL59E3VX37ITPgQFPmCP6IZS', '2019-11-28 08:35:42'),
(111, 'Dren', '', 'Ma34Qst', 100, '$2y$10$O.lCosKCMT1wZeADlJEke.vedNueV2AnZcmk0qe1EQemv9eDGmgQ.', '2019-11-28 08:42:50'),
(112, 'Culture', '', 'Ma34Qst', 100, '$2y$10$uV8l2LsOpZm5x8..CMih0eFk3qw5tWWyXEh6Ws0pgRwxVH2vsjObS', '2019-11-28 08:48:28'),
(113, 'Culture2', '', 'Ma34Qst', 100, '$2y$10$BgsWuwvUErnFb3E1bddTOu7.1Wk6DrWoFG3IcokSMKps.QgQbm.3S', '2019-11-28 08:49:36'),
(114, 'Culture6', '', 'Ma34Qst', 100, '$2y$10$yNDunE0/M4EStyotuIPm2ucpxECqSfv6t.hXwWe3ZXMs1HGQlrPPO', '2019-11-28 08:51:51'),
(115, 'Shine', '', 'MAss456', 100, '$2y$10$IBm4ze51Bt6dRozacC2y/.JsnyP4WlCrsEk9iscN1OCtOeTbmFyw2', '2019-11-28 09:40:38'),
(116, 'togo', '', 'MAss456', 100, '$2y$10$VHZm8oqgCzqoes690rNW3e.nuLFU9S4qmev04NtVZ.RgnSDpCdOA.', '2019-11-28 09:55:12'),
(117, 'selector', '', 'MAss456', 100, '$2y$10$MqmO6HGQ7CBsyFKefFaHnuoOo0SlgVoS1sDg69NtVTVq72kpugR6y', '2019-11-28 09:55:41'),
(118, 'selector2', '', 'MAss456', 100, '$2y$10$sz.huqGH.TG5L3uOIdfr../nRuAyZp3Z5sIgZ06CVcTNn4ZCSibcO', '2019-11-28 09:56:35'),
(119, 'selector6', '', 'MAss456', 100, '$2y$10$mDVZszJGbvba2oY9josf3e4.1FJxRrNN052EKJZcWZ66OPZdYfdbS', '2019-11-28 09:56:58'),
(120, 'foreign', '', 'MAss456', 100, '$2y$10$vVznrU2wcLfFyI7ibpCPE.lQ4ZdqikdlrkrktYDanFytPxDDdwu4i', '2019-11-28 09:57:48'),
(122, 'Anyway', '', 'MAss456', 100, '$2y$10$mGD/4PCl65XHrIybQD3cu.H3Fcxaqc2Wj8VdhF89cgaZCoFY64dkS', '2019-11-28 10:13:35'),
(124, 'uzer', '', 'MASW56tTY', 100, '$2y$10$boOWoahEYSLvIGjEtfxcDuYJYpzqBIvQvUDUqx0rivRJ/u6CMyAvy', '2019-12-07 10:47:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminmessages`
--
ALTER TABLE `adminmessages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `admintechnicianmessages`
--
ALTER TABLE `admintechnicianmessages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `approvedpayments`
--
ALTER TABLE `approvedpayments`
  ADD PRIMARY KEY (`pend_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `custmessages`
--
ALTER TABLE `custmessages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `emaillist`
--
ALTER TABLE `emaillist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partialpayments`
--
ALTER TABLE `partialpayments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refunds`
--
ALTER TABLE `refunds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `techaccounts`
--
ALTER TABLE `techaccounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technician`
--
ALTER TABLE `technician`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technicianadminmessages`
--
ALTER TABLE `technicianadminmessages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `adminmessages`
--
ALTER TABLE `adminmessages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `admintechnicianmessages`
--
ALTER TABLE `admintechnicianmessages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `approvedpayments`
--
ALTER TABLE `approvedpayments`
  MODIFY `pend_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `custmessages`
--
ALTER TABLE `custmessages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `emaillist`
--
ALTER TABLE `emaillist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `partialpayments`
--
ALTER TABLE `partialpayments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `refunds`
--
ALTER TABLE `refunds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `techaccounts`
--
ALTER TABLE `techaccounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `technician`
--
ALTER TABLE `technician`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `technicianadminmessages`
--
ALTER TABLE `technicianadminmessages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
