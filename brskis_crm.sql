-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 20, 2017 at 01:11 PM
-- Server version: 10.0.28-MariaDB
-- PHP Version: 7.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brskis_crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `adwords`
--

CREATE TABLE IF NOT EXISTS `adwords` (
  `adwords_id` int(10) NOT NULL,
  `client_adwords_id` varchar(100) NOT NULL,
  `clicks` varchar(100) NOT NULL,
  `shows` varchar(100) NOT NULL,
  `avg_pos` varchar(100) NOT NULL,
  `conversions` varchar(100) NOT NULL,
  `conversion_proc` varchar(100) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `laikotarpis` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adwords`
--

INSERT INTO `adwords` (`adwords_id`, `client_adwords_id`, `clicks`, `shows`, `avg_pos`, `conversions`, `conversion_proc`, `payment`, `laikotarpis`) VALUES
(1, '256-134-545', '124', '654', '2.2', '100', '10', '30.18', 'MONTH'),
(2, '256-134-545', '32', '214', '2.2', '50', '10', '10.28', 'WEEK'),
(3, '256-134-545', '13', '30', '2', '5', '2', '2.15', 'YESTERDAY'),
(4, '256-134-545', '0', '0', '0', '0', '0', '0.00', 'TODAY');

-- --------------------------------------------------------

--
-- Table structure for table `agreements`
--

CREATE TABLE IF NOT EXISTS `agreements` (
  `agreement_id` int(10) NOT NULL,
  `client_agreement_id` int(10) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `path` varchar(256) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `agreements`
--

INSERT INTO `agreements` (`agreement_id`, `client_agreement_id`, `file_name`, `path`) VALUES
(32, 22, 'Grindų Šlifavimo Ekspertai-adwords-agreement.docx', 'http://crm.brazdauskis.eu/generatedWordFiles/Grindų Šlifavimo Ekspertai-adwords-agreement.docx'),
(31, 22, 'Grindų Šlifavimo Ekspertai-adwords-agreement.docx', 'http://crm.brazdauskis.eu/generatedWordFiles/Grindų Šlifavimo Ekspertai-adwords-agreement.docx'),
(29, 1, 'Brazdauskis ir ko-adwords-agreement.docx', 'http://crm.brazdauskis.eu/generatedWordFiles/Brazdauskis ir ko-adwords-agreement.docx'),
(30, 1, 'Brazdauskis ir ko-adwords-agreement.docx', 'http://crm.brazdauskis.eu/generatedWordFiles/Brazdauskis ir ko-adwords-agreement.docx'),
(33, 22, 'Grindų Šlifavimo Ekspertai-adwords-agreement.docx', 'http://crm.brazdauskis.eu/generatedWordFiles/Grindų Šlifavimo Ekspertai-adwords-agreement.docx'),
(34, 22, 'Grindų Šlifavimo Ekspertai-adwords-agreement.docx', 'http://crm.brazdauskis.eu/generatedWordFiles/Grindų Šlifavimo Ekspertai-adwords-agreement.docx'),
(35, 22, 'Grindų Šlifavimo Ekspertai-adwords-agreement.docx', 'http://crm.brazdauskis.eu/generatedWordFiles/Grindų Šlifavimo Ekspertai-adwords-agreement.docx'),
(36, 22, 'Grindų Šlifavimo Ekspertai-adwords-agreement.docx', 'http://crm.brazdauskis.eu/generatedWordFiles/Grindų Šlifavimo Ekspertai-adwords-agreement.docx');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE IF NOT EXISTS `bills` (
  `bill_id` int(10) NOT NULL,
  `client_bill_id` int(10) NOT NULL,
  `user_bill_id` int(10) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `path` varchar(256) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`bill_id`, `client_bill_id`, `user_bill_id`, `file_name`, `path`) VALUES
(35, 22, 1, 'Grindų Šlifavimo Ekspertai-bill-2017-01-17 08-01-43.docx', 'http://crm.brazdauskis.eu/generatedWordFiles/Grindų Šlifavimo Ekspertai-bill-2017-01-17 08-01-43.docx'),
(34, 1, 1, 'Brazdauskis ir ko-bill-2017-01-14 13-01-47.docx', 'http://crm.brazdauskis.eu/generatedWordFiles/Brazdauskis ir ko-bill-2017-01-14 13-01-47.docx'),
(33, 1, 1, 'Brazdauskis ir ko-bill-2017-01-14 13-01-17.docx', 'http://crm.brazdauskis.eu/generatedWordFiles/Brazdauskis ir ko-bill-2017-01-14 13-01-17.docx'),
(30, 22, 1, 'Grindų Šlifavimo Ekspertai-bill-2017-01-10 00-01-41.docx', 'http://crm.brazdauskis.eu/generatedWordFiles/Grindų Šlifavimo Ekspertai-bill-2017-01-10 00-01-41.docx'),
(29, 22, 1, 'Grindų Šlifavimo Ekspertai-bill-2017-01-09 19-01-39.docx', 'http://crm.brazdauskis.eu/generatedWordFiles/Grindų Šlifavimo Ekspertai-bill-2017-01-09 19-01-39.docx'),
(32, 22, 1, 'Grindų Šlifavimo Ekspertai-bill-2017-01-10 08-01-41.docx', 'http://crm.brazdauskis.eu/generatedWordFiles/Grindų Šlifavimo Ekspertai-bill-2017-01-10 08-01-41.docx'),
(28, 22, 1, 'Grindų Šlifavimo Ekspertai-bill-2017-01-09 17-01-08.docx', 'http://crm.brazdauskis.eu/generatedWordFiles/Grindų Šlifavimo Ekspertai-bill-2017-01-09 17-01-08.docx'),
(31, 22, 1, 'Grindų Šlifavimo Ekspertai-bill-2017-01-10 07-01-10.docx', 'http://crm.brazdauskis.eu/generatedWordFiles/Grindų Šlifavimo Ekspertai-bill-2017-01-10 07-01-10.docx'),
(24, 1, 1, 'Brazdauskis ir ko-bill-2017-01-05 23-01-31.docx', 'http://crm.brazdauskis.eu/generatedWordFiles/Brazdauskis ir ko-bill-2017-01-05 23-01-31.docx'),
(25, 20, 1, 'Mantas Brazdauskis-bill-2017-01-09 00-01-55.docx', 'http://crm.brazdauskis.eu/generatedWordFiles/Mantas Brazdauskis-bill-2017-01-09 00-01-55.docx');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(10) NOT NULL,
  `client_user_id` int(11) DEFAULT NULL,
  `name` varchar(256) NOT NULL,
  `imones_kodas` varchar(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `number` varchar(20) NOT NULL,
  `pvm_code` varchar(256) DEFAULT NULL,
  `contact_name` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `www` varchar(256) NOT NULL,
  `payment_due` int(50) NOT NULL,
  `adwords_company_code` varchar(30) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `client_user_id`, `name`, `imones_kodas`, `email`, `number`, `pvm_code`, `contact_name`, `address`, `www`, `payment_due`, `adwords_company_code`) VALUES
(1, 1, 'Brazdauskis ir ko', '123456789', 'dev@cet.lt', '+37062775294', '123456789', 'Mantas Brazdauskis', 'Viliotės 6', 'http://gosailpro.com', 15, ''),
(21, 2, 'ufue', 'dfospks', 'snufdiu@mfmfmf.lt', '862775294', 'ewfewk', 'Mantas Brazdauskis', 'oifjwefiwjoiefj', 'google.lt', 15, NULL),
(20, 1, 'Mantas Brazdauskis', '123', 'mantas.brazdauskis@gmail.com', '+37062775294', 'gsdk;jlnsdfkjgn', 'Mantas Brazdauskis', 'Viliotės 6', 'http://google.lt', 15, ''),
(22, 1, 'Grindų Šlifavimo Ekspertai', '1245789', 'dev@cet.lt', '862775294', '120475852', 'Mantas Brazdauskis', 'Savanorių Pr. 176C', 'http://grinduslifavimoekspertai.lt', 15, '256-134-545');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(10) NOT NULL,
  `client_comment_id` int(10) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` varchar(1000) NOT NULL,
  `color` varchar(20) DEFAULT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `client_comment_id`, `title`, `description`, `color`, `date`) VALUES
(1, 1, 'Testas', 'Testas', 'red', '2016-11-23 13:19'),
(2, 1, 'TEST1', 'TEST1', 'blue', '2016-11-23 13:49'),
(3, 1, 'null', 'mfskgmlskdfm', 'blue', '2016-12-08 00:00:06'),
(4, 1, 'null', 'mfskgmlskdfm', 'blue', '2016-12-08 00:00:51'),
(5, 1, 'null', 'mfskgmlskdfm', 'blue', '2016-12-08 00:01:56'),
(6, 18, 'null', 'Neatsiliepia\r\n', 'blue', '2016-12-08 00:03:23'),
(7, 18, 'null', 'Nenori kalb4ti \r\n', 'blue', '2016-12-08 00:20:41'),
(8, 1, 'null', 'Dabar yra 02:22 ir aš bandau pabaigt klientus WOOHOO\r\n', 'blue', '2016-12-08 00:23:03'),
(9, 1, 'null', 'nesišneka\r\n', 'blue', '2016-12-09 01:45:33'),
(10, 1, 'null', 'Asdfgj\r\n', 'blue', '2016-12-10 21:04:55'),
(11, 21, NULL, 'Skambinau nieko gero \r\n', NULL, '2017-01-04 23:23:24'),
(12, 22, NULL, 'Atsiliepė viskas tvarkoj\r\n', NULL, '2017-01-05 15:05:13');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `file_id` int(10) NOT NULL,
  `file_task_id` int(10) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `path` varchar(256) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pagespeed`
--

CREATE TABLE IF NOT EXISTS `pagespeed` (
  `id` int(100) NOT NULL,
  `client_pagespeed_id` int(100) NOT NULL,
  `score` int(3) NOT NULL,
  `description` text NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pagespeed`
--

INSERT INTO `pagespeed` (`id`, `client_pagespeed_id`, `score`, `description`, `date`) VALUES
(1, 1, 85, 'Enable compression<br/>Leverage browser caching<br/>Eliminate render-blocking JavaScript and CSS in above-the-fold content<br/>Optimize images<br/>', '2016-12-15 09:12:46'),
(2, 1, 85, 'Enable compression<br/>Leverage browser caching<br/>Eliminate render-blocking JavaScript and CSS in above-the-fold content<br/>Optimize images<br/>', '2016-12-15 09:12:00'),
(3, 1, 85, 'Enable compression<br/>Leverage browser caching<br/>Eliminate render-blocking JavaScript and CSS in above-the-fold content<br/>Optimize images<br/>', '2016-12-15 09:12:03'),
(4, 1, 85, 'Enable compression<br/>Leverage browser caching<br/>Eliminate render-blocking JavaScript and CSS in above-the-fold content<br/>Optimize images<br/>', '2016-12-15 09:12:00'),
(5, 1, 85, 'Enable compression<br/>Leverage browser caching<br/>Eliminate render-blocking JavaScript and CSS in above-the-fold content<br/>Optimize images<br/>', '2016-12-15 09:12:27'),
(6, 1, 85, 'Enable compression<br/>Leverage browser caching<br/>Eliminate render-blocking JavaScript and CSS in above-the-fold content<br/>Optimize images<br/>', '2016-12-15 09:12:25'),
(7, 1, 85, 'Enable compression<br/>Leverage browser caching<br/>Eliminate render-blocking JavaScript and CSS in above-the-fold content<br/>Optimize images<br/>', '2016-12-15 09:12:29'),
(8, 1, 85, 'Enable compression<br/>Leverage browser caching<br/>Eliminate render-blocking JavaScript and CSS in above-the-fold content<br/>Optimize images<br/>', '2016-12-15 14:12:47'),
(9, 1, 84, 'Enable compression<br/>Leverage browser caching<br/>Eliminate render-blocking JavaScript and CSS in above-the-fold content<br/>Optimize images<br/>', '2017-01-05 14:01:19'),
(10, 22, 44, 'Leverage browser caching<br/>Reduce server response time<br/>Minify CSS<br/>Minify JavaScript<br/>Eliminate render-blocking JavaScript and CSS in above-the-fold content<br/>Optimize images<br/>', '2017-01-05 14:01:07'),
(11, 22, 44, 'Leverage browser caching<br/>Reduce server response time<br/>Minify CSS<br/>Minify JavaScript<br/>Eliminate render-blocking JavaScript and CSS in above-the-fold content<br/>Optimize images<br/>', '2017-01-05 14:01:13'),
(12, 1, 85, 'Enable compression<br/>Leverage browser caching<br/>Eliminate render-blocking JavaScript and CSS in above-the-fold content<br/>Optimize images<br/>', '2017-01-05 14:01:11'),
(13, 22, 44, 'Leverage browser caching<br/>Reduce server response time<br/>Minify CSS<br/>Minify JavaScript<br/>Eliminate render-blocking JavaScript and CSS in above-the-fold content<br/>Optimize images<br/>', '2017-01-05 14:01:24'),
(14, 22, 44, 'Leverage browser caching<br/>Reduce server response time<br/>Minify CSS<br/>Minify JavaScript<br/>Eliminate render-blocking JavaScript and CSS in above-the-fold content<br/>Optimize images<br/>', '2017-01-05 15:01:27'),
(15, 20, 100, '', '2017-01-05 15:01:41'),
(16, 20, 100, '', '2017-01-05 15:01:46'),
(17, 22, 44, 'Leverage browser caching<br/>Reduce server response time<br/>Minify CSS<br/>Minify JavaScript<br/>Eliminate render-blocking JavaScript and CSS in above-the-fold content<br/>Optimize images<br/>', '2017-01-05 15:01:23'),
(18, 22, 44, 'Leverage browser caching<br/>Reduce server response time<br/>Minify CSS<br/>Minify JavaScript<br/>Eliminate render-blocking JavaScript and CSS in above-the-fold content<br/>Optimize images<br/>', '2017-01-05 15:01:09'),
(19, 1, 85, 'Enable compression<br/>Leverage browser caching<br/>Eliminate render-blocking JavaScript and CSS in above-the-fold content<br/>Optimize images<br/>', '2017-01-05 15:01:16'),
(20, 1, 85, 'Enable compression<br/>Leverage browser caching<br/>Eliminate render-blocking JavaScript and CSS in above-the-fold content<br/>Optimize images<br/>', '2017-01-05 15:01:08'),
(21, 1, 85, 'Enable compression<br/>Leverage browser caching<br/>Eliminate render-blocking JavaScript and CSS in above-the-fold content<br/>Optimize images<br/>', '2017-01-05 15:01:29'),
(22, 1, 85, 'Enable compression<br/>Leverage browser caching<br/>Eliminate render-blocking JavaScript and CSS in above-the-fold content<br/>Optimize images<br/>', '2017-01-05 15:01:53'),
(23, 1, 85, 'Enable compression<br/>Leverage browser caching<br/>Eliminate render-blocking JavaScript and CSS in above-the-fold content<br/>Optimize images<br/>', '2017-01-05 23:01:32'),
(24, 1, 85, 'Enable compression<br/>Leverage browser caching<br/>Eliminate render-blocking JavaScript and CSS in above-the-fold content<br/>Optimize images<br/>', '2017-01-06 00:01:56'),
(25, 22, 48, 'Leverage browser caching<br/>Reduce server response time<br/>Minify CSS<br/>Minify JavaScript<br/>Eliminate render-blocking JavaScript and CSS in above-the-fold content<br/>Optimize images<br/>', '2017-01-06 14:01:58'),
(26, 1, 85, 'Enable compression<br/>Leverage browser caching<br/>Eliminate render-blocking JavaScript and CSS in above-the-fold content<br/>Optimize images<br/>', '2017-01-09 00:01:40'),
(27, 20, 100, '', '2017-01-09 00:01:27'),
(28, 1, 85, 'Enable compression<br/>Leverage browser caching<br/>Eliminate render-blocking JavaScript and CSS in above-the-fold content<br/>Optimize images<br/>', '2017-01-09 16:01:14'),
(29, 1, 85, 'Leverage browser caching<br/>Eliminate render-blocking JavaScript and CSS in above-the-fold content<br/>Optimize images<br/>', '2017-01-20 13:01:03'),
(30, 20, 100, '', '2017-01-20 13:01:33');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `task_id` int(10) NOT NULL,
  `task_user_id` int(10) NOT NULL,
  `task_user_id_pri` int(10) NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `checklist` varchar(1000) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `task_user_id`, `task_user_id_pri`, `title`, `description`, `checklist`) VALUES
(13, 4, 1, 'Užduotis neatlikta', 'Užduotis', '0'),
(15, 1, 1, '', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `name` varchar(256) NOT NULL,
  `surname` varchar(256) NOT NULL,
  `allow` int(1) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `user_name`, `user_email`, `user_password`, `name`, `surname`, `allow`, `type`) VALUES
(1, 'demo', 'mantas.brazdauskis@gmail.com', 'demo', 'Mantas', 'Brazdauskis', 1, ''),
(2, 'admin', 'mantas.brazdauskis@gmail.com', 'admin', 'Remigija', 'Mockutė', 1, 'admin'),
(3, 'mantulis88', 'mantas.brazdauskis@gmail.com', 'niekaas', 'Test', 'test', 1, 'admin'),
(4, 'Testinis', 'testinis@testinis.lt', 'mantas', 'Mantas Brazdauskis', 'Brazdauskis', 1, ''),
(5, 'Testiniss', 'mantas.brazdauskis@gmail.com', '123', 'Mantas Brazdauskis', 'Brazdauskis', 1, ''),
(6, 'mantas.andrikis', 'mantas.brazdauskis@gmail.com', 'mantas', 'Mantas Brazdauskis', 'Brazdauskis', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adwords`
--
ALTER TABLE `adwords`
  ADD PRIMARY KEY (`adwords_id`);

--
-- Indexes for table `agreements`
--
ALTER TABLE `agreements`
  ADD PRIMARY KEY (`agreement_id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `pagespeed`
--
ALTER TABLE `pagespeed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adwords`
--
ALTER TABLE `adwords`
  MODIFY `adwords_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `agreements`
--
ALTER TABLE `agreements`
  MODIFY `agreement_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `bill_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `pagespeed`
--
ALTER TABLE `pagespeed`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
