-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 20, 2019 at 11:26 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_03_02_103756_create_roles_table', 1),
(3, '2019_03_02_105220_create_promo_codes_table', 1),
(5, '2019_03_02_105609_create_project_details_table', 2),
(6, '2019_03_02_183826_alter_reference_email_users', 2);

-- --------------------------------------------------------

--
-- Table structure for table `project_details`
--

DROP TABLE IF EXISTS `project_details`;
CREATE TABLE IF NOT EXISTS `project_details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `project_title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_detail` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accept_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not_accept_yet',
  `work_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not_done',
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `advanced` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_details_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_details`
--

INSERT INTO `project_details` (`id`, `user_id`, `project_title`, `project_detail`, `accept_status`, `work_status`, `price`, `advanced`, `due`, `created_at`, `updated_at`) VALUES
(1, 2, 'Messi', 'Born and raised in central Argentina, Messi was diagnosed with a growth hormone deficiency as a child. At age 13, he relocated to Spain to join Barcelona, who agreed to pay for his medical treatment. After a fast progression through Barcelona\'s youth academy, Messi made his competitive debut aged 17 in October 2004. Despite being injury-prone during his early career, he established himself as an integral player for the club within the next three years, finishing 2007 as a finalist for both the Ballon d\'Or and FIFA World Player of the Year award, a feat he repeated the following year. His first uninterrupted campaign came in the 2008–09 season, during which he helped Barcelona achieve the first treble in Spanish football. At 22 years old, Messi won the Ballon d\'Or and FIFA World Player of the Year award by record voting margins.\r\n\r\nThree successful seasons followed, with Messi winning three consecutive FIFA Ballons d\'Or, including an unprecedented fourth. During the 2011–12 season, he set the La Liga and European records for most goals scored in a single season, while establishing himself as Barcelona\'s all-time top scorer in official competitions in March 2012. The following two seasons, Messi finished twice second for the Ballon d\'Or behind Cristiano Ronaldo, his perceived career rival. Messi regained his best form during the 2014–15 campaign, breaking the all-time goalscoring records in both La Liga and the Champions League in November 2014,[note 3] and leading Barcelona to a historic second treble.', 'Accepted', 'Done', '0', NULL, NULL, '2019-03-02 16:48:14', '2019-03-02 19:08:46'),
(33, 2, 'new', 'new', 'Rejected', 'Done', '0', NULL, NULL, '2019-03-04 14:39:21', '2019-03-04 14:39:41'),
(31, 2, 'Ronaldo', 'penaldu', 'Accepted', 'Done', '0', NULL, NULL, '2019-03-04 13:19:22', '2019-03-04 14:27:16'),
(30, 2, 'xfgsfdsxf', 'dgdsgfdxfg', 'Rejected', 'Done', '0', NULL, NULL, '2019-03-04 12:59:12', '2019-03-04 12:59:34'),
(28, 2, 'gdfg', 'sdfgsdfs', 'Accepted', 'Done', '0', NULL, NULL, '2019-03-04 12:33:53', '2019-03-04 14:27:33'),
(26, 2, 'sdfgsdfg', 'dsfgsdfg', 'Accepted', 'Done', '0', NULL, NULL, '2019-03-03 10:51:55', '2019-03-04 14:27:40'),
(25, 7, 'Line Follower', 'line foller', 'Accepted', 'Done', '0', NULL, NULL, '2019-03-03 10:46:17', '2019-03-04 13:36:34'),
(34, 2, 'beshjgs', 'jkhfbjs', 'Accepted', 'Done', '0', NULL, NULL, '2019-03-07 14:54:08', '2019-03-07 14:57:00'),
(35, 2, 'sjdfb\\sbfjsdb', 'jksnfkljasnfkljams', 'Accepted', 'not_done', '8', NULL, NULL, '2019-03-07 16:50:29', '2019-03-07 17:09:11'),
(36, 2, 'fakjnfkjanlkdsnaS', 'fakjsdnfkaNSlkjdas', 'Rejected', 'Done', NULL, NULL, NULL, '2019-03-07 17:09:53', '2019-03-07 17:10:52'),
(37, 2, 'jskdhnfks', 'fhnajkndkas', 'Rejected', 'Done', NULL, NULL, NULL, '2019-03-07 17:12:21', '2019-03-07 17:19:21'),
(38, 2, 'sdjknkasnf', 'sdfgsadfa', 'Rejected', 'Done', NULL, NULL, NULL, '2019-03-07 17:19:31', '2019-03-07 17:21:45'),
(39, 2, 'skjdhfkjsh', 'kjshnkfsnd', 'Accepted', 'not_done', '5000', '1000', '4000', '2019-03-07 17:21:54', '2019-03-07 17:22:31'),
(40, 2, 'aikfnk', 'fhsnfjds', 'Accepted', 'not_done', '500', '400', '100', '2019-03-07 17:45:54', '2019-03-07 17:46:36'),
(41, 2, 'i am', 'turzo', 'not_accept_yet', 'not_done', NULL, NULL, NULL, '2019-04-08 02:46:32', '2019-04-08 02:46:32');

-- --------------------------------------------------------

--
-- Table structure for table `promo_codes`
--

DROP TABLE IF EXISTS `promo_codes`;
CREATE TABLE IF NOT EXISTS `promo_codes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `promo_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `promo_codes_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'User', NULL, NULL),
(2, 'Admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phone_unique` (`phone`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `role_id`, `gender`, `birthday`, `reference_email`, `phone`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Abid', 'Turzo', 'tabidhasan003@gmail.com', '$2y$10$VcotRjhHjQJrNqhIUy51aOmnGlV2fSuulzwd34R9pAgMoa689iD/y', 1, 'Male', '2019-03-02', 'shakilur.nsu@gmail.com', '1923673254', NULL, 'y3iUhHxOKf3oevqzp8gCcFjT6qeHUnBJQZyDLYLMipQwcXFFscEgibHAfsUj', '2019-03-02 07:34:24', '2019-04-20 17:16:47'),
(3, 'bolbo na', 'na', 'shakilur.nsu@gmail.com', '$2y$10$xk2p3rZmSe8DcpCipMwxY.Ews5FSisFPYWosJl/NknYjg5Z0cKQmK', 2, 'Male', '2019-03-29', 'shakilur@gmail.com', '0900329', NULL, 'Oy2isUlykP1BGe0JcFPpKYf9FS35SyqSjkd4l5C31R05nVuyjzQSOrLSpBG4', '2019-03-02 12:00:26', '2019-03-07 18:49:55'),
(5, 'h', 'ferdous', 'h.ferdous@outlook.com', '$2y$10$E.5GODdhlu1CSt6NEWSH9uNTMNlddGAyFC.CIZPujbndBj6wADBLq', 2, 'Female', '2019-03-09', NULL, 'gsdfgsdfgdfg', NULL, 'eXYqYzJ3Pef02UdGHvBFimLup1ebx1tPXvQRXYHgFgAueqkx7Q9zlTMyNepW', '2019-03-02 12:43:28', '2019-03-07 18:58:49'),
(6, 'sdfsdf', 'dsdf', 'h.ferdous@gmail.com', '$2y$10$sMODC4nS/XM.ADhYk77V4OCRtKQNKVESiFBLo2xo8i0d5RzXQBT2u', 1, 'Female', '2019-03-26', NULL, 'fdsfsdfvsdv', NULL, 'sZjKYzmPpMQ15bgqTvnVUswmPGQ9BDlzTJPGFjh9EDbAdJu3VdWpwKQ182MR', '2019-03-02 12:45:09', '2019-03-02 12:45:09'),
(7, 'shakilur', 'rahman', 'shakilur157.nsu@gmail.com', '$2y$10$V6w9WQNuNzKDm34cGJTxCucM0NTY27EYea7.isOa4XvGf4eWV3S2u', 2, 'Male', '2019-03-29', NULL, '03940404', NULL, NULL, '2019-03-03 10:45:42', '2019-03-03 10:45:42');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
