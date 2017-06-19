-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 17. jun 2017 ob 15.30
-- Različica strežnika: 10.1.21-MariaDB
-- Različica PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `odesk`
--

-- --------------------------------------------------------

--
-- Struktura tabele `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `short` varchar(10) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `countries`
--

INSERT INTO `countries` (`id`, `title`, `short`) VALUES
(1, 'SLOVENIJA', 'SVN'),
(11, 'Italija', 'ITA'),
(10, 'Avstrija', 'AVT'),
(9, 'Hrvaška', 'HRV'),
(8, 'Hrvaška', 'HRV');

-- --------------------------------------------------------

--
-- Struktura tabele `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `description` text COLLATE utf8_slovenian_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `file` varchar(100) COLLATE utf8_slovenian_ci NOT NULL DEFAULT '/'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `files`
--

INSERT INTO `files` (`id`, `message_id`, `file`) VALUES
(2, 19, 'messages/60114-14256527_1855005674730818_2053884831_n.jpg'),
(3, 22, 'messages/67153-Iceland.JPG'),
(4, 23, 'messages/58307-Iceland.JPG'),
(9, 28, 'messages/57597-Motivacijsko_pismo_Anze_Grintal_Ugovsek.docx');

-- --------------------------------------------------------

--
-- Struktura tabele `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `tuser_id` int(11) NOT NULL,
  `fuser_id` int(11) NOT NULL,
  `subject` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `content` text COLLATE utf8_slovenian_ci NOT NULL,
  `seen` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `messages`
--

INSERT INTO `messages` (`id`, `tuser_id`, `fuser_id`, `subject`, `content`, `seen`, `date`) VALUES
(3, 2, 3, 'aaa', 'AAA', 0, '2017-06-15 09:20:40'),
(4, 3, 4, 'Aharo', 'Simple geometry!', 1, '2017-06-15 10:37:05'),
(8, 3, 4, 'RE:RE:Aharo', 'cmooooooooon', 1, '2017-06-17 07:58:15'),
(9, 3, 4, 'RE:RE:Aharo', 'asasfsfdbdfhfghfdt', 1, '2017-06-17 07:57:57'),
(11, 3, 4, 'ajdeeeeee', 'asasfasfasfasf', 1, '2017-06-17 07:57:54'),
(12, 3, 4, 'ininininin', 'IAJOAISGJAOIDG', 1, '2017-06-17 07:58:13'),
(18, 3, 4, 'CMON', 'delajjajaja', 1, '2017-06-17 07:57:51'),
(19, 3, 4, 'šeenkt', 'šeenktšeenktšeenkt', 1, '2017-06-17 07:49:31'),
(22, 3, 4, 'asfsafasfasf', 'asfasfasfasfasfasfasfasfasf', 1, '2017-06-17 07:43:42'),
(23, 3, 4, 'asfsafasfasf', 'asfasfasfasfasfasfasfasfasf', 1, '2017-06-17 07:41:34'),
(24, 4, 3, 'eyo', 'wasdsuuuuuuuuuuuup', 1, '2017-06-17 09:01:50'),
(25, 4, 3, 'to be', 'or not to b', 1, '2017-06-17 09:01:57'),
(26, 3, 4, 'docfile', 'test', 0, '2017-06-17 09:11:27'),
(28, 3, 4, 'zdj bo', 'i belif', 0, '2017-06-17 09:19:20');

-- --------------------------------------------------------

--
-- Struktura tabele `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(150) COLLATE utf8_slovenian_ci NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `description` text COLLATE utf8_slovenian_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `description` text COLLATE utf8_slovenian_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `skills`
--

INSERT INTO `skills` (`id`, `title`, `description`) VALUES
(5, 'CSS', ''),
(6, 'HTML 5', ''),
(7, 'JavaScript', '');

-- --------------------------------------------------------

--
-- Struktura tabele `skills_users`
--

CREATE TABLE `skills_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `rank` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `skills_users`
--

INSERT INTO `skills_users` (`id`, `user_id`, `skill_id`, `rank`) VALUES
(4, 2, 5, 0),
(3, 2, 2, 0),
(5, 4, 4, 0),
(6, 4, 5, 0),
(7, 4, 6, 0),
(8, 4, 7, 0);

-- --------------------------------------------------------

--
-- Struktura tabele `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `first_name` varchar(200) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `last_name` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `date_birth` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `description` text COLLATE utf8_slovenian_ci,
  `avatar` varchar(255) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `hashcode` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `users`
--

INSERT INTO `users` (`id`, `country_id`, `first_name`, `last_name`, `email`, `pass`, `date_birth`, `description`, `avatar`, `hashcode`, `active`) VALUES
(1, 1, 'Islam', 'Mušić', 'islam.music@gmail.com', '7f667781432ac3c11c9c281c4ecb1a11690b729f', '2015-02-12 17:43:36', NULL, NULL, '', 0),
(2, 10, 'Islam', 'Mušić', 'islam@scv.si', 'c27d05b6a544f7329442c4580963ba85abb93874', '2015-02-26 17:48:21', 'Tole ', 'slike/20150226063119602Penguins.jpg', '', 0),
(3, 1, 'Anže', 'GU', 'npr.pat@gmail.com', '63c09eb198138b42983c0e92571f75fa2c89cec4', '2017-06-08 10:29:08', NULL, NULL, '', 0),
(4, 1, 'Gal', 'G', 'gg@gmail.com', '63c09eb198138b42983c0e92571f75fa2c89cec4', '2017-06-15 10:06:40', NULL, NULL, '', 0);

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksi tabele `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_id` (`message_id`);

--
-- Indeksi tabele `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tuser_id` (`tuser_id`),
  ADD KEY `fuser_id` (`fuser_id`),
  ADD KEY `tuser_id_2` (`tuser_id`);

--
-- Indeksi tabele `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksi tabele `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `skills_users`
--
ALTER TABLE `skills_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `skill_id` (`skill_id`);

--
-- Indeksi tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `country_id` (`country_id`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT tabele `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT tabele `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT tabele `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT tabele `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT tabele `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT tabele `skills_users`
--
ALTER TABLE `skills_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Omejitve tabel za povzetek stanja
--

--
-- Omejitve za tabelo `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
