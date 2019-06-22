-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 21, 2018 at 07:18 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magazine`
--

-- --------------------------------------------------------

--
-- Table structure for table `ms_kategori`
--

CREATE TABLE `ms_kategori` (
  `kategori_id` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_menu`
--

CREATE TABLE `ms_menu` (
  `menu_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(255) NOT NULL,
  `position_number` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `menu_status` int(2) NOT NULL,
  `table_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_menu`
--

INSERT INTO `ms_menu` (`menu_id`, `name`, `link`, `position_number`, `description`, `created_date`, `modified_date`, `menu_status`, `table_name`) VALUES
(1, 'Menu', 'admin/menu', 1, 'test', '2017-07-13 00:00:00', '2017-07-13 00:00:00', 1, 'ms_menu'),
(2, 'Content Pos', 'admin/content_pos', 2, 'descrip', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'ms_event'),
(3, 'Event Host', 'admin/eventhost', 3, 'desc', '2017-07-26 00:00:00', '2017-07-26 00:00:00', 1, 'ms_host'),
(4, 'Event Type', 'admin/event_type', 4, 'desc', '2017-07-26 00:00:00', '2017-07-26 00:00:00', 1, 'ms_event_type'),
(5, 'Role', 'admin/role', 5, 'desc', '2017-07-26 00:00:00', '2017-07-26 00:00:00', 1, 'ms_role'),
(6, 'Slide', 'admin/slide', 6, 'desc', '2017-07-26 00:00:00', '2017-07-26 00:00:00', 1, 'ms_slide'),
(7, 'User', 'admin/user', 7, 'Menu User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'ms_user'),
(8, 'Transaction Header', 'admin/transactionheader', 8, 'Transaction Header Menu', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 't_transaction'),
(9, 'Event Attendance', 'admin/Eventattendance', 9, 'Event Attendance', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 't_attendance'),
(10, 'Certificate Management', 'admin/certificate', 10, 'Certificate Management', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 't_certificate'),
(11, 'Payment', 'admin/payment', 11, 'Payment Menu', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 't_payment'),
(12, 'Registration', 'admin/registration', 12, 'Registration Menu', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 't_ticket'),
(16, 'About', 'admin/about', 2, 'menu about', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'ms_content'),
(17, 'Contact', 'admin/contact', 2, '-', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'ms_content'),
(18, 'Information', 'admin/information', 2, '-', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'ms_content'),
(19, 'FAQ', 'admin/faq', 2, '-', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'ms_content'),
(20, 'Privacy', 'admin/privacy', 2, '-', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'ms_content'),
(21, 'Term', 'admin/term', 2, '-', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'ms_content'),
(22, 'Report Attendance', 'admin/report_attendance', 13, 'Menu Report Attendance', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, ''),
(23, 'Report Event', 'admin/report_event', 14, 'Menu Report Event', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, ''),
(24, 'Promo Code', 'admin/promocode', 15, 'Menu Promo Code', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `ms_post`
--

CREATE TABLE `ms_post` (
  `post_id` int(10) NOT NULL,
  `judul_post` varchar(255) NOT NULL,
  `isi_post` text NOT NULL,
  `gambar_judul` varchar(255) NOT NULL,
  `gambar_banner` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `kategori_post` int(11) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_role`
--

CREATE TABLE `ms_role` (
  `role_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `description` varchar(255) NOT NULL,
  `name` varchar(20) NOT NULL,
  `role_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_role`
--

INSERT INTO `ms_role` (`role_id`, `created_date`, `modified_date`, `description`, `name`, `role_status`) VALUES
(1, '0000-00-00 00:00:00', '2018-01-20 04:13:26', 'admin', 'admin', 1),
(6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'operator1', 'operator1', 0),
(8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'op sertifikat', 'op sertifikat', 0),
(9, '2018-03-13 01:18:46', '2018-03-13 01:18:46', 'maintenance sisi content', 'operator web', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ms_role_detail`
--

CREATE TABLE `ms_role_detail` (
  `role_detail_id` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `modified_date` date NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `add` tinyint(1) DEFAULT NULL,
  `edit` tinyint(1) DEFAULT NULL,
  `delete` tinyint(1) DEFAULT NULL,
  `view` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_role_detail`
--

INSERT INTO `ms_role_detail` (`role_detail_id`, `created_date`, `modified_date`, `role_id`, `menu_id`, `add`, `edit`, `delete`, `view`) VALUES
(5, '0000-00-00', '0000-00-00', 7, 6, 1, NULL, 1, NULL),
(534, '0000-00-00', '0000-00-00', 1, 1, NULL, NULL, NULL, NULL),
(535, '0000-00-00', '0000-00-00', 1, 2, NULL, NULL, NULL, NULL),
(536, '0000-00-00', '0000-00-00', 1, 3, NULL, NULL, NULL, NULL),
(537, '0000-00-00', '0000-00-00', 1, 4, NULL, NULL, NULL, NULL),
(538, '0000-00-00', '0000-00-00', 1, 5, NULL, NULL, NULL, NULL),
(539, '0000-00-00', '0000-00-00', 1, 6, NULL, NULL, NULL, NULL),
(540, '0000-00-00', '0000-00-00', 1, 7, NULL, NULL, NULL, NULL),
(541, '0000-00-00', '0000-00-00', 1, 8, NULL, NULL, NULL, NULL),
(542, '0000-00-00', '0000-00-00', 1, 9, NULL, NULL, NULL, NULL),
(543, '0000-00-00', '0000-00-00', 1, 10, NULL, NULL, NULL, NULL),
(544, '0000-00-00', '0000-00-00', 1, 11, NULL, NULL, NULL, NULL),
(545, '0000-00-00', '0000-00-00', 1, 12, NULL, NULL, NULL, NULL),
(546, '0000-00-00', '0000-00-00', 1, 16, NULL, NULL, NULL, NULL),
(547, '0000-00-00', '0000-00-00', 1, 17, NULL, NULL, NULL, NULL),
(548, '0000-00-00', '0000-00-00', 1, 18, NULL, NULL, NULL, NULL),
(549, '0000-00-00', '0000-00-00', 1, 19, NULL, NULL, NULL, NULL),
(550, '0000-00-00', '0000-00-00', 1, 20, NULL, NULL, NULL, NULL),
(551, '0000-00-00', '0000-00-00', 1, 21, NULL, NULL, NULL, NULL),
(552, '0000-00-00', '0000-00-00', 1, 22, NULL, NULL, NULL, NULL),
(553, '0000-00-00', '0000-00-00', 1, 23, NULL, NULL, NULL, NULL),
(554, '0000-00-00', '0000-00-00', 1, 24, NULL, NULL, NULL, NULL),
(555, '0000-00-00', '0000-00-00', 9, 2, NULL, NULL, NULL, NULL),
(556, '0000-00-00', '0000-00-00', 9, 3, NULL, NULL, NULL, NULL),
(557, '0000-00-00', '0000-00-00', 9, 4, NULL, NULL, NULL, NULL),
(558, '0000-00-00', '0000-00-00', 9, 6, NULL, NULL, NULL, NULL),
(559, '0000-00-00', '0000-00-00', 9, 7, NULL, NULL, NULL, NULL),
(560, '0000-00-00', '0000-00-00', 9, 16, NULL, NULL, NULL, NULL),
(561, '0000-00-00', '0000-00-00', 9, 17, NULL, NULL, NULL, NULL),
(562, '0000-00-00', '0000-00-00', 9, 18, NULL, NULL, NULL, NULL),
(563, '0000-00-00', '0000-00-00', 9, 19, NULL, NULL, NULL, NULL),
(564, '0000-00-00', '0000-00-00', 9, 20, NULL, NULL, NULL, NULL),
(565, '0000-00-00', '0000-00-00', 9, 21, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ms_slide`
--

CREATE TABLE `ms_slide` (
  `slide_id` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_slide`
--

INSERT INTO `ms_slide` (`slide_id`, `name`, `detail`) VALUES
(1, 'file_1511250607.jpg', '<h1 style="text-align: center;">&nbsp;</h1>\r\n<h1 style="text-align: center;">&nbsp;</h1>\r\n<h1 style="text-align: center;">&nbsp;<strong>INDONESIAN HOSPITAL EXPO XXX</strong></h1>\r\n<h3 style="text-align: center;">18 - 21 Oct 2017, Jakarta Convention Center</h3>'),
(2, 'file_1511250784.jpg', '<h1 style="text-align: center;">&nbsp;</h1>\r\n<h1 style="text-align: center;">&nbsp;</h1>\r\n<h1 style="text-align: center;"><strong>The Biggest Hospital Event in Indonesia</strong></h1>\r\n<h3 style="text-align: center;">Convention &amp; Exhibition</h3>'),
(3, 'file_1511250559.jpg', '<h2 style="text-align: center;">&nbsp;</h2>\r\n<h2 style="text-align: center;">&nbsp;</h2>\r\n<h2 style="text-align: center;">Learn best practice and viewing&nbsp;the latest emerging technologies in medical field</h2>'),
(4, 'file_1511250559.jpg', '<h2 style="text-align: center;">&nbsp;</h2>\r\n<h2 style="text-align: center;">&nbsp;</h2>\r\n<h2 style="text-align: center;">Learn best practice and viewing&nbsp;the latest emerging technologies in medical field</h2>'),
(5, 'file_1511250559.jpg', '<h2 style="text-align: center;">&nbsp;</h2>\r\n<h2 style="text-align: center;">&nbsp;</h2>\r\n<h2 style="text-align: center;">Learn best practice and viewing&nbsp;the latest emerging technologies in medical field</h2>');

-- --------------------------------------------------------

--
-- Table structure for table `ms_user`
--

CREATE TABLE `ms_user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `date_birth` date NOT NULL,
  `gender` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `modified_date` date NOT NULL,
  `role_id` int(11) NOT NULL,
  `profession` varchar(150) NOT NULL,
  `job_position` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `city` varchar(30) NOT NULL,
  `pos_code` varchar(30) NOT NULL,
  `region` varchar(10) NOT NULL,
  `country` varchar(30) NOT NULL,
  `work_address` varchar(300) NOT NULL,
  `user_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_user`
--

INSERT INTO `ms_user` (`user_id`, `first_name`, `last_name`, `email`, `password`, `phone`, `date_birth`, `gender`, `create_date`, `modified_date`, `role_id`, `profession`, `job_position`, `company`, `city`, `pos_code`, `region`, `country`, `work_address`, `user_status`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '083823134569', '2017-07-01', 0, '2017-07-11', '2018-05-23', 1, '', 'Doctor', 'St. Carolus Hospital', 'Ujung Gading', '15332', 'ID', 'ID', 'Jl. Gading Golf Boulevard Kav. 08, Gading Serpong', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_pages`
--

CREATE TABLE `m_pages` (
  `id_pages` int(11) NOT NULL,
  `name_pages` varchar(100) NOT NULL,
  `content_pages` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ms_kategori`
--
ALTER TABLE `ms_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `ms_menu`
--
ALTER TABLE `ms_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `ms_post`
--
ALTER TABLE `ms_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `ms_role`
--
ALTER TABLE `ms_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `ms_role_detail`
--
ALTER TABLE `ms_role_detail`
  ADD PRIMARY KEY (`role_detail_id`);

--
-- Indexes for table `ms_slide`
--
ALTER TABLE `ms_slide`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `ms_user`
--
ALTER TABLE `ms_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `m_pages`
--
ALTER TABLE `m_pages`
  ADD PRIMARY KEY (`id_pages`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ms_kategori`
--
ALTER TABLE `ms_kategori`
  MODIFY `kategori_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ms_menu`
--
ALTER TABLE `ms_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `ms_post`
--
ALTER TABLE `ms_post`
  MODIFY `post_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ms_role`
--
ALTER TABLE `ms_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ms_role_detail`
--
ALTER TABLE `ms_role_detail`
  MODIFY `role_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=566;
--
-- AUTO_INCREMENT for table `ms_slide`
--
ALTER TABLE `ms_slide`
  MODIFY `slide_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ms_user`
--
ALTER TABLE `ms_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `m_pages`
--
ALTER TABLE `m_pages`
  MODIFY `id_pages` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
