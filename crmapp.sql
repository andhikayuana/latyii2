-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 28, 2015 at 01:22 
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crmapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
`address_id` int(11) NOT NULL,
  `purpose` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `building` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apartment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reciever_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '2', 1445416713),
('manager', '3', 1445416713),
('user', '1', 1445416713);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'untuk admin yang login', NULL, NULL, 1445416713, 1445416713),
('guest', 1, 'Nobody', NULL, NULL, 1445416713, 1445416713),
('manager', 1, 'untuk manager yang login', NULL, NULL, 1445416713, 1445416713),
('user', 1, 'untuk user yang login', NULL, NULL, 1445416713, 1445416713);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('user', 'guest'),
('admin', 'manager'),
('manager', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`customer_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` date DEFAULT NULL,
  `notes` text COLLATE utf8_unicode_ci,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `birth_date`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', '1985-10-22', '', 2147483647, 1445485485),
(2, 'Spongebob', '1987-10-12', '', 1445487398, 1445487572),
(3, 'Bima X', '2010-02-12', '', 1445493121, 1445493121),
(4, 'Jones', '1990-07-03', '', 1445493689, 1445493689);

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE IF NOT EXISTS `email` (
`email_id` int(11) NOT NULL,
  `purpose` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1445333028),
('m140506_102106_rbac_init', 1445408154),
('m151020_084218_init_customer_table', 1445333029),
('m151020_085031_init_customer_phone', 1445333030),
('m151020_101538_init_service_table', 1445336427),
('m151020_103929_init_user_table', 1445337670),
('m151021_012658_tambah_kolom_auth', 1445390922),
('m151022_021043_init_address_table', 1445480295),
('m151022_022328_init_email_table', 1445480792);

-- --------------------------------------------------------

--
-- Table structure for table `phone`
--

CREATE TABLE IF NOT EXISTS `phone` (
`phone_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `phone`
--

INSERT INTO `phone` (`phone_id`, `customer_id`, `number`, `created_at`, `updated_at`) VALUES
(1, 1, '085123456789', 1445492510, 1445493435),
(2, 3, '085789456123', 1445493147, 1445493147),
(3, 4, '085753159486', 1445493706, 1445493706);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
`service_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hourly_rate` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `name`, `hourly_rate`, `created_at`, `updated_at`) VALUES
(5, 'jarjit', 8, 2147483647, 2147483647),
(6, 'Upin', 7, 2147483647, 2147483647),
(7, 'Ipin', 9, 2147483647, 2147483647),
(8, 'Mail', 8, 2147483647, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `auth_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `created_at`, `updated_at`, `auth_key`) VALUES
(1, 'andhika', '$2y$13$UDTqlBOREhpvapyOUDY4MuErnGnZdiledu/nQN6fm5QCFtbHsrmF.', 0, 1445666313, 'W85QdzTPZfqf4IgmRhrfvLu7xj2KE3jh75_TrGAv5rLcQcJIJ0qF415dOEfoG7MsDNZ0NQHhuT2crTJsyJorb4-QqhGAhkfReaXfYxzU9JL3VkgnOf7uO5zdQHMqrH6GJ7ATZOtP5YglXBUWUjugtPlWPxH_v8kvXueOF1JJ_Vhemp9F3jBjvdb18FJ4pJmWRoodM8U3DlULMbp4N0glPADjjOyfAN-53GiMLVo-hF5HXtcuGi7sYBC5K0R7Dcp'),
(2, 'admin', '$2y$13$pSZoUQd/Q8yz9/AyssvS6u4no7ucVM9sKh7nN8HQDtFu5yJGkEhLm', 0, 1445486443, 'HFGawhqBjuDi50q7LCPRb7XCEvdvjq1WOKsUnr73xnLH1ofD4qYlbNAPa_XuNxdxEtmOuU2yOJ6ken4dCXZDk_V9B-YZBNexz4ypdt9S6qz75IPxxowWfpO-WEezNkXdpdAXpWJNR71G3MqyGU5IgoXsxuMCTVxR9HN19J4EjbGsJIp7Qc4kXqnSeVpmwrLkLiEQNs0nIU-U1NsuqiVHSZQW10sjewlL7vUVypk1i5myaoj12rtLEbYWeG0GP1c'),
(3, 'manager', '$2y$13$8j83KEdREgRg2c/V627tyuPQT4NUjvKLYkzBKFVUGqwOY/gfO0.2u', 0, 1445486451, '4qLB-SeZwrx93JgnnIKodd9Fx9UNOUgoef9dz58WCHVRmz99jayB-fZDxB8NA23HKisDgGvE1SAAD8y2PgUaSsFpwf3I5JKnuXzXkoxIs1ugg56tGSFH0R5vaQLz46iKMdyamkvA_IJMPR4ZiGgQAynKOo3W7qYdROWPfoy3X6MqvsGOaIrX__uuyXOysEeF7Z26rRtAA7XgvMSL2nArQ13Ki3NebS0JYuhEaEqgzIwJuMw3uXMJTeEDRL9znBi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
 ADD PRIMARY KEY (`address_id`), ADD KEY `customer_address` (`customer_id`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
 ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
 ADD PRIMARY KEY (`name`), ADD KEY `rule_name` (`rule_name`), ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
 ADD PRIMARY KEY (`parent`,`child`), ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
 ADD PRIMARY KEY (`name`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
 ADD PRIMARY KEY (`email_id`), ADD KEY `customer_email` (`customer_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
 ADD PRIMARY KEY (`version`);

--
-- Indexes for table `phone`
--
ALTER TABLE `phone`
 ADD PRIMARY KEY (`phone_id`), ADD UNIQUE KEY `customer_id` (`customer_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
 ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `phone`
--
ALTER TABLE `phone`
MODIFY `phone_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
ADD CONSTRAINT `customer_address` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `email`
--
ALTER TABLE `email`
ADD CONSTRAINT `customer_email` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `phone`
--
ALTER TABLE `phone`
ADD CONSTRAINT `customer_phone_number` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
