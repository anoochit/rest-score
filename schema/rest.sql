-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- โฮสต์: localhost
-- เวลาในการสร้าง: 18 พ.ย. 2012  01:42น.
-- รุ่นของเซิร์ฟเวอร์: 5.5.8
-- รุ่นของ PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- ฐานข้อมูล: `rest`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `score_applications`
--

CREATE TABLE IF NOT EXISTS `score_applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `appname` varchar(45) NOT NULL,
  `package` varchar(60) NOT NULL,
  `appkey` varchar(45) NOT NULL,
  `users_id` int(11) NOT NULL,
  `create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_applications_users_idx` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- dump ตาราง `score_applications`
--

INSERT INTO `score_applications` (`id`, `appname`, `package`, `appkey`, `users_id`, `create`) VALUES
(1, 'Foo', 'net.redlinesoft.app.foo', '50a6fb652de6350a6fb652dea8', 1, '2012-11-17 09:50:13'),
(2, 'Foo', 'net.redlinesoft.app.foo', '50a6fbb163b7a50a6fbb163bc6', 1, '2012-11-17 09:51:29'),
(3, 'Foo2', 'net.redlinesoft.app.foo', '50a6fbf03d06e50a6fbf03d106', 1, '2012-11-17 09:52:32');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `score_scores`
--

CREATE TABLE IF NOT EXISTS `score_scores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `score` int(11) NOT NULL,
  `applications_id` int(11) NOT NULL,
  `appkey` varchar(45) NOT NULL,
  `create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_score_score_score_applications1_idx` (`applications_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- dump ตาราง `score_scores`
--

INSERT INTO `score_scores` (`id`, `name`, `score`, `applications_id`, `appkey`, `create`) VALUES
(1, 'Foo Name', 12, 3, '50a6fbf03d06e50a6fbf03d106', '2012-11-17 15:13:14'),
(2, 'Foo Name', 126, 3, '50a6fbf03d06e50a6fbf03d106', '2012-11-17 15:14:03'),
(3, 'Foo Bar', 200, 3, '50a6fbf03d06e50a6fbf03d106', '2012-11-17 15:14:13'),
(4, 'Foo Bar', 56, 3, '50a6fbf03d06e50a6fbf03d106', '2012-11-17 15:14:18'),
(5, 'Foo Reg', 568, 3, '50a6fbf03d06e50a6fbf03d106', '2012-11-17 15:14:31'),
(6, 'Foo Reg', 400, 3, '50a6fbf03d06e50a6fbf03d106', '2012-11-17 16:43:53');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `score_users`
--

CREATE TABLE IF NOT EXISTS `score_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `pubkey` varchar(45) NOT NULL,
  `create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- dump ตาราง `score_users`
--

INSERT INTO `score_users` (`id`, `email`, `password`, `pubkey`, `create`) VALUES
(1, 'anoochit@gmail.com', 'iopqwer', '50a6d4009c90c', '2012-11-18 07:42:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `score_applications`
--
ALTER TABLE `score_applications`
  ADD CONSTRAINT `fk_applications_users` FOREIGN KEY (`users_id`) REFERENCES `score_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `score_scores`
--
ALTER TABLE `score_scores`
  ADD CONSTRAINT `fk_score_score_score_applications1` FOREIGN KEY (`applications_id`) REFERENCES `score_applications` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
