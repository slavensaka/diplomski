-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2015 at 02:58 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `diplomski`
--

-- --------------------------------------------------------

--
-- Table structure for table `anwsers`
--

CREATE TABLE IF NOT EXISTS `anwsers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `answer` text COLLATE utf8_unicode_ci NOT NULL,
  `correct` tinyint(1) NOT NULL DEFAULT '0',
  `question_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `anwsers_question_id_foreign` (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=40 ;

--
-- Dumping data for table `anwsers`
--

INSERT INTO `anwsers` (`id`, `answer`, `correct`, `question_id`) VALUES
(1, '192', 1, 1),
(2, '52', 0, 1),
(3, '56', 1, 2),
(4, '23', 0, 2),
(5, '1', 0, 2),
(6, 'DA', 1, 3),
(7, 'NE', 0, 3),
(8, 'DA', 1, 4),
(9, 'NE', 0, 4),
(10, 'DA', 1, 5),
(11, 'NE', 0, 5),
(12, 'DA', 1, 6),
(13, 'NE', 0, 6),
(14, 'NE', 1, 7),
(15, 'DA', 0, 7),
(16, 'a library catalogue', 1, 8),
(17, 'an article index', 1, 8),
(18, 'a computerized warehouse inventory', 1, 8),
(19, 'the Internet', 0, 8),
(20, 'records', 1, 9),
(21, 'fields', 0, 9),
(22, 'fields', 0, 9),
(23, 'fields', 0, 9),
(24, 'false', 1, 10),
(25, 'true', 0, 10),
(26, 'facebook', 1, 11),
(27, 'twitter', 1, 11),
(28, 'linkedin', 1, 11),
(29, 'flickr', 0, 11),
(30, 'true', 1, 12),
(31, 'false', 0, 12),
(32, 'Fury', 1, 13),
(33, 'Apocalypse Now', 0, 13),
(34, 'Black Hawk Down', 0, 13),
(35, 'Platoon', 0, 13),
(36, 'Terminator', 1, 14),
(37, 'Gigli', 0, 14),
(38, 'Birdman', 1, 14),
(39, 'Interstellar', 1, 14);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_03_09_133650_create_tests_table', 1),
('2015_03_09_133651_create_anwsers_table', 1),
('2015_03_09_133651_create_questions_table', 1),
('2015_04_09_115028_create_student_table', 1),
('2015_04_09_141455_create_student_test_pivot_table', 1),
('2015_04_11_114605_create_user_test_pivot_table', 1),
('2015_05_09_142616_create_foreign_keys', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` text COLLATE utf8_unicode_ci NOT NULL,
  `points` int(11) NOT NULL,
  `question_image` varchar(400) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `shuffle_question` tinyint(1) NOT NULL DEFAULT '0',
  `type` enum('true_false','multiple_choice','multiple_response','fill_in') COLLATE utf8_unicode_ci NOT NULL,
  `test_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `questions_test_id_foreign` (`test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `points`, `question_image`, `shuffle_question`, `type`, `test_id`, `created_at`, `updated_at`) VALUES
(1, 'Koliko zajedno znamenaka ima prvih 100 prirodnih brojeva?', 5, '', 1, 'multiple_choice', 1, '2015-03-21 12:43:27', '2015-03-23 04:34:27'),
(2, 'Koliki je zbroj brojeva 37 i 19?', 4, '', 0, 'multiple_choice', 1, '2015-02-11 17:33:23', '2015-02-23 10:37:20'),
(3, 'Studentski zbor RGN fakulteta osnovan je u akademskoj godini 2007./2008.', 5, '', 1, 'true_false', 2, '2015-01-16 15:34:23', '2015-02-11 10:43:47'),
(4, 'Poskupljuje studentski život', 2, '', 1, 'true_false', 2, '2015-05-19 13:42:32', '2015-05-23 00:54:27'),
(5, 'Služite se engleskim jezikom', 1, '', 1, 'true_false', 2, '2015-04-20 08:21:22', '2015-05-23 17:43:57'),
(6, 'Živite bez barijera', 5, '', 0, 'true_false', 2, '2015-07-04 06:34:27', '2015-07-05 01:32:57'),
(7, 'Idete na studentske roštiljade', 2, '', 1, 'true_false', 2, '2015-06-05 11:34:18', '2015-07-13 09:24:27'),
(8, 'Example(s) of databases are (choose all that apply):', 3, '', 0, 'multiple_response', 3, '2015-08-02 13:43:56', '2015-10-23 13:54:07'),
(9, 'A database is divided into:', 4, '', 1, 'multiple_choice', 3, '2015-09-15 12:23:21', '2015-11-14 14:27:47'),
(10, 'Databases, software and hardware are the primary components of an information system.', 2, '', 1, 'true_false', 3, '2015-12-09 03:23:02', '2015-12-13 10:44:42'),
(11, 'Which are social medias', 2, '', 0, 'multiple_response', 4, '2015-11-07 04:45:43', '0000-00-00 00:00:00'),
(12, 'Laravel provides database migrations', 5, '', 1, 'true_false', 5, '2015-03-26 03:03:35', '2015-10-13 17:24:25'),
(13, 'from what movie was this qoute: Ideals are peaceful. History is violent.', 2, '', 1, 'multiple_choice', 6, '2015-11-17 22:02:13', '2015-12-23 02:24:47'),
(14, 'Great movies are?', 1, '', 0, 'multiple_response', 6, '2015-12-25 10:00:11', '2015-12-26 14:33:22');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `changed_password` tinyint(1) NOT NULL DEFAULT '0',
  `pass` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `students_student_name_unique` (`student_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_name`, `changed_password`, `pass`, `created_at`, `updated_at`) VALUES
(1, 'Slaven', 1, '$2y$10$S9lI2hXFfQA1/R57pySTYOxnogXHcNe.SZ9mmiuVvpZMxbpLSg1N.', '2015-04-22 10:16:20', '2015-04-22 10:16:20'),
(2, 'Pero', 1, '$2y$10$UuPLlxoNkpac.pMwgwk6su055V6bSZ5.HQPr/7cf4pVQNlll5oUCG', '2015-04-22 10:16:20', '2015-04-22 10:16:20'),
(3, 'Zoran', 1, '$2y$10$ZQjmSCHuQXh4qoebRN6II.Tjkijs87ovBagFD1GWR5h8pa0XPwsJW', '2015-04-22 10:16:20', '2015-04-22 10:16:20'),
(4, 'User1', 1, '$2y$10$mx7cgYZ3isoRzIaL0sCp2OXKk6ThHx7gjPirFREYHR7KD9fRfOfQi', '2015-04-22 10:16:20', '2015-04-22 10:16:20'),
(5, 'Novi', 1, '$2y$10$8RiZxi1uWWEnjEdhSRyfq.vbLIIlUqHHWxajRtv6G3QT31BUMiQYm', '2015-04-22 10:16:21', '2015-04-22 10:16:21'),
(6, 'Neko_Novi', 1, '$2y$10$KGjjEW.8eK1wyn/olZM8vubFO2s65WAjBbBYaDv6drQp.uq3JYOSC', '2015-04-22 10:16:21', '2015-04-22 10:16:21'),
(7, 'Rush', 1, '$2y$10$5oogEyDzq/6.FJWkDgNdnOU786eGEschdnpkZAhWhWqSi9LwLbL6e', '2015-04-22 10:16:21', '2015-04-22 10:16:21'),
(8, 'Loki', 1, '$2y$10$Bav3/6CWPuE1tjJO3GYjSO.b7hRDX0HDYmAW/5tAcw1y4tCge9u2C', '2015-04-22 10:16:21', '2015-04-22 10:16:21'),
(9, 'New User', 1, '$2y$10$zZFd4p/EOcPQjl1qDFwCbeazPTnOctJpbQKBbAujenq8amVWJtnf.', '2015-04-22 10:16:21', '2015-04-22 10:16:21'),
(10, 'User44', 1, '$2y$10$g2MuHdor3hWIQBcVylXZeuZAy0Ktj/7Zom6JHqMTLoCNSpyf2dCwC', '2015-04-22 10:16:21', '2015-04-22 10:16:21'),
(11, 'Slavica', 1, '$2y$10$8kDHpWzyT3YrnDCeVLFHwuMkgLob1GRWvCpeFEXubojOKz9XNXa3u', '2015-04-22 10:16:21', '2015-04-22 10:16:21'),
(12, 'Branimir', 1, '$2y$10$Kvqgts/m1wKbHPywE6NdgeWfk0xWxcfUOrY1lkq7rl0hzhz7.XenG', '2015-04-22 10:16:22', '2015-04-22 10:16:22'),
(13, 'Igor', 1, '$2y$10$OlLZO0dhjcH40eyQ8VLBJ.yAabpLFBR.KU2x2aLStnxLRuDKILnna', '2015-04-22 10:16:22', '2015-04-22 10:16:22'),
(14, 'Milić', 1, '$2y$10$rweTweN9sleFr1upofqaX.gsjw2MmbN/EQHSv6JjoHhKpMfaJNk3m', '2015-04-22 10:16:22', '2015-04-22 10:16:22'),
(15, 'Korisnik 3', 1, '$2y$10$se5xLMRaDZpHYpYvPXXvUOnvcXP3V2JfU2NgNqP3.lQOwfFP6NA3W', '2015-04-22 10:16:22', '2015-04-22 10:16:22'),
(16, 'QuizTaker', 1, '$2y$10$YcoCOC.BcEam6EKmmtJT3uWEGCBAkQ1io4f9gqEpsro3.4Vfa46iW', '2015-04-22 10:16:22', '2015-04-22 10:16:22'),
(17, 'Student Pero', 1, '$2y$10$EeR0ok77gdIHR/LBE00Us.25HuJxupmhku9v1ip2tvH/G5P/PUygO', '2015-04-22 10:16:22', '2015-04-22 10:16:22'),
(18, 'Student zoro', 1, '$2y$10$Fjpqhvxg6eK8FsVhX9ar1OeeBtNZ/5gyaR4Rb8ikK4UBjMdDx8LOe', '2015-04-22 10:16:23', '2015-04-22 10:16:23');

-- --------------------------------------------------------

--
-- Table structure for table `student_test`
--

CREATE TABLE IF NOT EXISTS `student_test` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(10) unsigned NOT NULL,
  `test_id` int(10) unsigned NOT NULL,
  `test_result` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `student_test_student_id_foreign` (`student_id`),
  KEY `student_test_test_id_foreign` (`test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `student_test`
--

INSERT INTO `student_test` (`id`, `student_id`, `test_id`, `test_result`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 12, '2015-04-22 10:16:23', '2015-04-22 10:16:23'),
(2, 1, 3, 3, '2015-04-22 10:16:23', '2015-04-22 10:16:23'),
(3, 1, 2, 10, '2015-04-22 10:16:23', '2015-04-22 10:16:23'),
(4, 1, 4, 9, '2015-04-22 10:16:23', '2015-04-22 10:16:23'),
(5, 1, 5, 0, '2015-04-22 10:16:23', '2015-04-22 10:16:23'),
(6, 1, 6, 1, '2015-04-22 10:16:23', '2015-04-22 10:16:23'),
(7, 1, 1, 3, '2015-04-22 10:16:23', '2015-04-22 10:16:23'),
(8, 2, 1, 10, '2015-04-22 10:16:23', '2015-04-22 10:16:23'),
(9, 3, 4, 13, '2015-04-22 10:16:24', '2015-04-22 10:16:24'),
(10, 4, 6, 3, '2015-04-22 10:16:24', '2015-04-22 10:16:24'),
(11, 4, 3, 9, '2015-04-22 10:16:24', '2015-04-22 10:16:24'),
(12, 4, 5, 25, '2015-04-22 10:16:24', '2015-04-22 10:16:24'),
(13, 5, 5, 23, '2015-04-22 10:16:24', '2015-04-22 10:16:24'),
(14, 5, 5, 12, '2015-04-22 10:16:24', '2015-04-22 10:16:24'),
(15, 5, 1, 23, '2015-04-22 10:16:24', '2015-04-22 10:16:24'),
(16, 3, 5, 23, '2015-04-22 10:16:24', '2015-04-22 10:16:24'),
(17, 6, 1, 32, '2015-04-22 10:16:24', '2015-04-22 10:16:24'),
(18, 7, 6, 16, '2015-04-22 10:16:24', '2015-04-22 10:16:24'),
(19, 8, 2, 23, '2015-04-22 10:16:24', '2015-04-22 10:16:24'),
(20, 9, 6, 21, '2015-04-22 10:16:24', '2015-04-22 10:16:24');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE IF NOT EXISTS `tests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `test_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intro` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `conclusion` text COLLATE utf8_unicode_ci NOT NULL,
  `passcode` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `intro_image` varchar(400) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `conclusion_image` varchar(400) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `counter_time` int(10) unsigned NOT NULL,
  `shuffle` tinyint(1) NOT NULL DEFAULT '0',
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `is_public` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tests_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `test_name`, `intro`, `conclusion`, `passcode`, `intro_image`, `conclusion_image`, `counter_time`, `shuffle`, `is_published`, `is_public`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Matematika test', 'Test o matematici', 'Završili ste test o matematici', '$2y$10$WWl8D9TXPIhL1zpOxNgZ3OCxec1lnHo557yDpXQ7adUSaGSx3CogW', 'tabeluaypeople-316506-1280.jpg', 'j9jgnqgyfile7071266529091.jpg', 900, 1, 1, 1, 1, '2015-04-22 10:16:17', '2015-04-22 10:16:17'),
(2, 'Kviz o studentskom životu', 'Ovo je kviz o životu studenata', 'Završen je kviz o životu studenata', '$2y$10$rhePBbbQRX9/3P4dI10ah.6KxG0Fl/XLnW2FVouoSQk61sQEmi6o2', 'rg0d7qyihomework-624735-1280.jpg', 'y3dddtdxf164kbfz95.jpg', 900, 1, 1, 1, 1, '2015-04-22 10:16:17', '2015-04-22 10:16:17'),
(3, 'Baza podataka', 'Test on how much you know about databases', 'You''ve completed the test on how much you know about databases. Congratulations!', '$2y$10$.yC84oY.RCLEsMKZF1YFD.VvPwdCnIlhqC64d5SI2EGyGVFapKV9u', 'ng4xbmka11122773785-8603e017b0.jpg', 'qgyeo20f382637881-0902bd880f.jpg', 600, 0, 1, 1, 2, '2015-04-22 10:16:17', '2015-04-22 10:16:17'),
(4, 'Test o društvenim mrežama', 'Šta mislite o društvenim mrežama', 'Završili ste test o društvenim mrežama', '$2y$10$.Tj9XenFY84j3GLCMQj49uJY0YyktI3kaDMxYAl9MYSY.q32oiVKa', 'p2d0tw17tree-200795-1280.jpg', '2pmrf5clword-cloud-661058-1280.png', 300, 1, 1, 0, 3, '2015-04-22 10:16:17', '2015-04-22 10:16:17'),
(5, 'Test o Laravelu', 'Šta znate o laravelu', 'Gotov test o laravelu', '$2y$10$VYU6pq2QO2vRuFmVd81SluIdt3.gaz67WEvf3G9IZ4R7kOSNGnZKa', 'fmro7rf0laravel.jpg', 'kigch4falaravel4-hello-72dpi.png', 300, 1, 0, 1, 3, '2015-04-22 10:16:17', '2015-04-22 10:16:17'),
(6, 'Kviz o popularnim filmovima', 'Sve o filmovima', 'Riješen kviz o popularnim filmovima', '$2y$10$F2hb2D8C9fQ3jc10tJnFleq5afcoeiCoi6qrzy8XiMcvlR4ma0sZm', 'rllntjtxfilm-596519-1280.jpg', '0j2troeiclapper-board-152088-1280.png', 500, 1, 1, 1, 3, '2015-04-22 10:16:17', '2015-04-22 10:16:17');

-- --------------------------------------------------------

--
-- Table structure for table `test_user`
--

CREATE TABLE IF NOT EXISTS `test_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `test_id` int(10) unsigned NOT NULL,
  `test_result` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `test_user_user_id_foreign` (`user_id`),
  KEY `test_user_test_id_foreign` (`test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `test_user`
--

INSERT INTO `test_user` (`id`, `user_id`, `test_id`, `test_result`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 12, '2015-04-22 10:16:24', '2015-04-22 10:16:24'),
(2, 1, 3, 3, '2015-04-22 10:16:24', '2015-04-22 10:16:24'),
(3, 1, 2, 10, '2015-04-22 10:16:24', '2015-04-22 10:16:24'),
(4, 1, 4, 9, '2015-04-22 10:16:24', '2015-04-22 10:16:24'),
(5, 1, 5, 0, '2015-04-22 10:16:24', '2015-04-22 10:16:24'),
(6, 1, 6, 1, '2015-04-22 10:16:25', '2015-04-22 10:16:25'),
(7, 1, 1, 3, '2015-04-22 10:16:25', '2015-04-22 10:16:25'),
(8, 2, 1, 10, '2015-04-22 10:16:25', '2015-04-22 10:16:25'),
(9, 3, 4, 13, '2015-04-22 10:16:25', '2015-04-22 10:16:25'),
(10, 4, 6, 3, '2015-04-22 10:16:25', '2015-04-22 10:16:25'),
(11, 4, 3, 9, '2015-04-22 10:16:25', '2015-04-22 10:16:25'),
(12, 4, 5, 25, '2015-04-22 10:16:25', '2015-04-22 10:16:25'),
(13, 5, 5, 23, '2015-04-22 10:16:25', '2015-04-22 10:16:25'),
(14, 5, 5, 12, '2015-04-22 10:16:25', '2015-04-22 10:16:25'),
(15, 5, 1, 23, '2015-04-22 10:16:25', '2015-04-22 10:16:25'),
(16, 3, 5, 23, '2015-04-22 10:16:25', '2015-04-22 10:16:25'),
(17, 6, 1, 32, '2015-04-22 10:16:25', '2015-04-22 10:16:25'),
(18, 7, 6, 16, '2015-04-22 10:16:25', '2015-04-22 10:16:25'),
(19, 8, 2, 23, '2015-04-22 10:16:25', '2015-04-22 10:16:25'),
(20, 9, 6, 21, '2015-04-22 10:16:25', '2015-04-22 10:16:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Slaven', 'slaven@net.hr', '$2y$10$XSySRIiXzfnnvfrRxOvXIOjremwRkZLx2E71KLUtWhm7duDU7LQoW', NULL, NULL, '2015-04-22 10:16:15', '2015-04-22 10:16:15'),
(2, 'Marin', 'marin@net.hr', '$2y$10$s1zYBp41.XSqCnYGPme/uO8S5aJvvPL6n2hqkjzui9P606ua1tovy', NULL, NULL, '2015-04-22 10:16:15', '2015-04-22 10:16:15'),
(3, 'Ivor', 'ivor@net.hr', '$2y$10$kmMClw0VLT9i.e49H2/F5uhWY5oqbPEkDZVKta4CEWHhu9ogTF4bi', NULL, NULL, '2015-04-22 10:16:15', '2015-04-22 10:16:15'),
(4, 'Erik', 'erik@net.hr', '$2y$10$qNeNqvr.RmMmtntLq4HT1uaFWdwj8UTK9FL3iRojG3VCh8Iqd/F/y', NULL, NULL, '2015-04-22 10:16:16', '2015-04-22 10:16:16'),
(5, 'Davor', 'davor@net.hr', '$2y$10$cfUgpVO2zsMIvNAQwdKF8uVZzIjmiUpqGIg4X1mdFwMtPLq61svvy', NULL, NULL, '2015-04-22 10:16:16', '2015-04-22 10:16:16'),
(6, 'Slavica', 'slavica@net.hr', '$2y$10$7L10USWev90CWPGbp8xhgOfDdnMGk7KXD451e9m20XsDiq4e7kQYS', NULL, NULL, '2015-04-22 10:16:16', '2015-04-22 10:16:16'),
(7, 'Dubravka', 'dubravka@net.hr', '$2y$10$eupmNncfUcMto5.utHhlPutsKuaHS3qxw4cLy8/AHUTfn4oNV4Xmu', NULL, NULL, '2015-04-22 10:16:16', '2015-04-22 10:16:16'),
(8, 'Igor', 'igor@net.hr', '$2y$10$3igkZiN2Dmz6SL4JkLK2FesURLmaiptUeTlBImde4wXrnTv2ELszW', NULL, NULL, '2015-04-22 10:16:16', '2015-04-22 10:16:16'),
(9, 'Josipa', 'josipa@net.hr', '$2y$10$rD7tSv4rCO6eNctSBhXMPuf7aXiz2AicnosOBtC2tBceQBArdcpby', NULL, NULL, '2015-04-22 10:16:16', '2015-04-22 10:16:16'),
(10, 'Stefica', 'stefica@net.hr', '$2y$10$yihC8qhcvGivRbveVkCGGuF55K0vedQdEpieUbSGYEFBsp36q6.72', NULL, NULL, '2015-04-22 10:16:16', '2015-04-22 10:16:16'),
(11, 'Srecko', 'srecko@net.hr', '$2y$10$PSouLvRrLef9Rh9M.eRMbe.J7fEPN3jgX9CgotOs0dMpvWxHhR.jG', NULL, NULL, '2015-04-22 10:16:17', '2015-04-22 10:16:17');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anwsers`
--
ALTER TABLE `anwsers`
  ADD CONSTRAINT `anwsers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_test`
--
ALTER TABLE `student_test`
  ADD CONSTRAINT `student_test_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_test_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tests`
--
ALTER TABLE `tests`
  ADD CONSTRAINT `tests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `test_user`
--
ALTER TABLE `test_user`
  ADD CONSTRAINT `test_user_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
