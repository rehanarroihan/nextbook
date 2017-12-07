-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2017 at 12:52 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nextbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `card_id` varchar(20) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `card_name` varchar(128) NOT NULL,
  `card_desc` text NOT NULL,
  `color` varchar(10) NOT NULL,
  `card_dt` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`card_id`, `uid`, `card_name`, `card_desc`, `color`, `card_dt`, `status`) VALUES
('crd001', 'usr00317111', 'Class', '19.50 at hall C', 'green', '2017-11-27', 'active'),
('crd002', 'usr00417112', 'k', 'q', 'red', '2017-11-30', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `chngpassreq`
--

CREATE TABLE `chngpassreq` (
  `changeid` int(11) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `dte_req` date NOT NULL,
  `token` varchar(64) NOT NULL,
  `status` enum('unmodified','modified') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `classid` varchar(7) NOT NULL,
  `created_by` varchar(15) NOT NULL,
  `name` varchar(225) NOT NULL,
  `descript` varchar(225) NOT NULL,
  `dt_created` date NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'group.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`classid`, `created_by`, `name`, `descript`, `dt_created`, `photo`) VALUES
('D0fdtTo', 'usr00317111', 'XIIRPL4 - SIRA', 'SMK Telkom Malang 2017/2018', '2017-12-13', 'group.png'),
('Ioj20xc', 'usr00417112', 'Kelasku Rek', 'Pokok e kelasku', '2017-12-09', 'group.png');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `file_id` varchar(225) NOT NULL,
  `card_id` varchar(128) NOT NULL,
  `file_name` text NOT NULL,
  `filetype` enum('img','pdf','docx','pptx','txt','link') NOT NULL,
  `dte_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`file_id`, `card_id`, `file_name`, `filetype`, `dte_added`) VALUES
('fle001', 'crd001', 'https://www.msn.com/id-id/?ocid=wispr&pc=u477', 'link', '2017-11-27');

-- --------------------------------------------------------

--
-- Table structure for table `frnd`
--

CREATE TABLE `frnd` (
  `frndid` varchar(128) NOT NULL,
  `dia` varchar(128) NOT NULL,
  `dgdia` varchar(128) NOT NULL,
  `met` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `scheduleid` varchar(10) NOT NULL,
  `classid` varchar(7) NOT NULL,
  `lesson` varchar(225) NOT NULL,
  `day` int(1) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `teacher` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` varchar(11) NOT NULL,
  `oauth_provider` varchar(255) NOT NULL,
  `oauth_id` varchar(255) NOT NULL,
  `dspname` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `classid` varchar(7) DEFAULT NULL,
  `picture_url` varchar(255) NOT NULL,
  `profile_url` varchar(255) NOT NULL,
  `password` varchar(128) NOT NULL,
  `last_login` varchar(128) NOT NULL,
  `status` varchar(128) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `locale` varchar(10) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `oauth_provider`, `oauth_id`, `dspname`, `username`, `email`, `classid`, `picture_url`, `profile_url`, `password`, `last_login`, `status`, `gender`, `locale`, `created`, `modified`) VALUES
('usr00117111', 'facebook', '1440510312685448', 'Rehan Arroihan', '', 'rehanarroihan@ymail.com', 'D0fdtTo', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/23561819_1445678905501922_1151820693594942317_n.jpg?oh=407ad8e8048ce956aa740b9d2cd63da6&oe=5A8FDBEB', 'https://www.facebook.com/1440510312685448', '', '2017-12-01 12:00:17', 'virified', 'male', 'en_US', '2017-11-10 18:55:14', '2017-12-01 12:00:17'),
('usr00217111', 'facebook', '1980913935482603', 'Setiawan Dwi Prasetiyo', '', 'N/A', NULL, 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/12524197_1694557744118225_6384740092753644236_n.jpg?_nc_eui2=v1%3AAeE19-0ERsGMHcH1yLRXMXtTqLMa-ZIj8TAlHIy2bW3ZbljLW0-vIJ8Mn-gJUm8GOKNp971K-Sl29dVRksj17TRC&oh=f672e84e239abd1a69521c4924e421de&oe=5AABF0D9', 'https://www.facebook.com/1980913935482603', '', '2017-11-13 12:33:48', 'virified', 'male', 'id_ID', '2017-11-13 12:26:09', '2017-11-13 12:33:48'),
('usr00317111', 'email', '', 'Rehan Arroihan', 'rehan', 'third2014project@gmail.com', 'D0fdtTo', '', '', 'rehans', '2017/12/07 06:51:25', 'verified', '', '', '2017-11-17 05:01:57', '0000-00-00 00:00:00'),
('usr00417112', '', '', 'Hanhan', 'hanhan', 'multazamgsd@gmail.com', NULL, '', '', 'menjadikan', '2017/12/07 00:24:33', 'verified', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`card_id`),
  ADD KEY `FK_USER_CREATE_CARD` (`uid`);

--
-- Indexes for table `chngpassreq`
--
ALTER TABLE `chngpassreq`
  ADD PRIMARY KEY (`changeid`),
  ADD KEY `FK_USER_REQ_PASS` (`uid`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`classid`),
  ADD KEY `FK_USER_CREATE_CLASS` (`created_by`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`file_id`),
  ADD KEY `FK_CARD_HAVE_FILE` (`card_id`);

--
-- Indexes for table `frnd`
--
ALTER TABLE `frnd`
  ADD PRIMARY KEY (`frndid`),
  ADD KEY `FK_USER_BERTEMAN` (`dia`),
  ADD KEY `FK_USER_PNYTEMAN` (`dgdia`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`scheduleid`),
  ADD KEY `FK_CLASS_HAVE_SCHEDULE` (`classid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
