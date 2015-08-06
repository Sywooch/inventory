-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 06, 2015 at 10:22 AM
-- Server version: 5.5.37-MariaDB-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dent.pcrh.go.th`
--

-- --------------------------------------------------------

--
-- Table structure for table `budget`
--

CREATE TABLE IF NOT EXISTS `budget` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'แหล่งจ่ายเงิน',
  `price` double NOT NULL COMMENT 'เงินงบประมาณ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `budget`
--

INSERT INTO `budget` (`id`, `name`, `price`) VALUES
(1, 'เงินบำรุง', 304000),
(3, 'เงินบำรุง (ฟันเทียม)', 120000),
(4, 'ค่าเสื่อม', 48000);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'หมวดหมู่รอง',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'วัสดุทันตกรรม'),
(2, 'เครื่องมือทันตกรรม'),
(3, 'ครุภัณฑ์ทันตกรรม');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(11) DEFAULT NULL COMMENT 'รหัสหน่วยงาน',
  `name` varchar(255) NOT NULL COMMENT 'ชื่อหน่วยงาน',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `code`, `name`) VALUES
(1, 1, 'ฝ่ายทันตกรรม'),
(2, 2, 'โรงพยาบาลส่งเสริมตำบลหนองหัวช้าง'),
(3, 3, 'โรงพยาบาลส่งเสริมตำบลป่าแฝก'),
(4, 4, 'โรงพยาบาลส่งเสริมตำบลดอนหญ้านาง'),
(5, 5, 'โรงพยาบาลส่งเสริมตำบลท่าสะอาด');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `id` varchar(255) NOT NULL COMMENT 'เลขที่ใบรับเข้า',
  `budget_id` int(11) NOT NULL COMMENT 'ประเภทการจ่ายเงิน',
  `productuser_id` int(11) DEFAULT NULL COMMENT 'เจ้าหน้าที่พัสดุ',
  `partner_id` int(11) DEFAULT NULL COMMENT 'บริษัทคู่ค้า',
  `department_id` int(11) DEFAULT NULL COMMENT 'หน่วยงาน',
  `bill_no` int(11) NOT NULL COMMENT 'เลขที่ใบส่งของ',
  `inventory` enum('i','o') NOT NULL,
  `d_date` date DEFAULT NULL COMMENT 'วันรับของ',
  `date_accept` date DEFAULT NULL COMMENT 'วันตรวจรับ',
  `file` varchar(255) NOT NULL COMMENT 'ไฟล์ประกอบ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `budget_id`, `productuser_id`, `partner_id`, `department_id`, `bill_no`, `inventory`, `d_date`, `date_accept`, `file`) VALUES
('20150805-1', 1, NULL, 1, NULL, 0, 'i', '2015-02-19', NULL, ''),
('20150805-2', 3, NULL, 5, NULL, 0, 'i', '2015-08-05', NULL, ''),
('20150806-3', 3, NULL, 3, NULL, 0, 'i', '2015-08-06', NULL, ''),
('20150806-4', 1, NULL, 7, NULL, 0, 'i', '2015-08-06', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `inventorydetail`
--

CREATE TABLE IF NOT EXISTS `inventorydetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inventory_id` varchar(255) NOT NULL COMMENT 'เลขที่ใบรับเข้า',
  `product_id` int(11) NOT NULL COMMENT 'วัสดุ',
  `price` double NOT NULL COMMENT 'ราคา',
  `qty` int(11) NOT NULL COMMENT 'จำนวน',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=133 ;

--
-- Dumping data for table `inventorydetail`
--

INSERT INTO `inventorydetail` (`id`, `inventory_id`, `product_id`, `price`, `qty`) VALUES
(121, '20150805-1', 7, 935, 2),
(122, '20150805-2', 3, 230, 2),
(123, '20150805-2', 9, 120, 3),
(124, '20150806-3', 3, 52, 4),
(125, '20150806-3', 1, 33, 52),
(126, '20150806-3', 2, 22, 2),
(127, '20150806-3', 5, 33, 52),
(128, '20150806-3', 12, 33, 2),
(129, '20150806-3', 10, 12, 4),
(130, '20150806-3', 9, 12, 2),
(131, '20150806-4', 4, 22, 1),
(132, '20150806-4', 3, 22, 2);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1437637658),
('m140209_132017_init', 1437637660),
('m140403_174025_create_account_table', 1437637660),
('m140504_113157_update_tables', 1437637661),
('m140504_130429_create_token_table', 1437637661),
('m140830_171933_fix_ip_field', 1437637661),
('m140830_172703_change_account_table_name', 1437637661),
('m141222_110026_update_ip_field', 1437637661);

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE IF NOT EXISTS `partner` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `code` varchar(4) DEFAULT NULL COMMENT 'รหัสบริษัท',
  `name` varchar(255) NOT NULL COMMENT 'ชื่อบริษัท',
  `address` text COMMENT 'ที่อยู่',
  `phone` varchar(11) DEFAULT NULL COMMENT 'โทรศัพท์',
  `fax` varchar(11) DEFAULT NULL COMMENT 'FAX',
  `vat` varchar(255) DEFAULT NULL COMMENT 'เลขที่ผู้เสียภาษีอาการ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`id`, `code`, `name`, `address`, `phone`, `fax`, `vat`) VALUES
(1, 'ACC1', 'บริษัท แอคคอร์ด คอร์ปอเรชั่น จำกัด', '33/2-8 ซอยรองเมือง 4 แขวงรองเมือง เขตปทุมวัน กรุงเทพฯ 10330', '02-6138081', NULL, '2147483647'),
(2, 'DEN1', 'บริษัท เดนท์สพลาย (ประเทศไทย) จำกัด', 'ชั้น 23 อาคารปัญจธานี 127/28 ถนนรัชดาภิเษก แขวงช่องนนทรี เขตยานนาวา กรุงเทพฯ 10120', '02-2953744', NULL, NULL),
(3, 'DKS1', 'บริษัท ดีเคเอสเอช (ประเทศไทย) จำกัด', '2106 ถนนสุขุมวิท แขวงบางจาก เขตพระโขนง กรุงเทพฯ 10260', '02-2209131', NULL, NULL),
(4, 'DEN2', 'บริษัท เด็นตัล วิชั่น จำกัด', '42 ซอยหัสดิเสวี สุทธิสาร ห้วยขวาง กรุงเทพฯ 10320', '02-6934061', NULL, NULL),
(5, 'NUD1', 'บริษัท นูเด้นท์ จำกัด', '365/23-25 ซอยพญานาค แขวงถนนเพชรบุรี เขตราชเทวี กรุงเทพฯ 10400', '02-6110153', NULL, NULL),
(6, 'KER1', 'บริษัท เอสดีเอส เคอร์ จำกัด', '10/29 ซอยลาดพร้าว 28 ถนนลาดพร้าว แขวงจอมพล เขตจตุจักร กรุงเทพฯ 10900', '02-5115242', NULL, NULL),
(7, 'EMI1', 'ห้างหุ้นส่วนจำกัด เอ็มมีเน้นซ์', '5 ซอยประชานุกูล 3 (รัชดา 66) ถนนรัชดาภิเษก บางซื่อ กรุงเทพฯ 10800', '02-9101252', NULL, NULL),
(8, 'DRI1', 'ห้างหุ้นส่วนจำกัด ไดรว์อินเด็นทั่ลซัพพลาย', '627 ซอยลาดพร้าว 101 ถนนลาดพร้าว แขวงคลองเจ้าคุณสิงห์ เขตวังทองหลาง กรุงเทพฯ 10310', '02-7310711', NULL, '2147483647'),
(9, 'DEN3', 'บริษัท เด็นท์-เมท จำกัด', '679/39-40 อิสรภาพ 31/1 แขงวัดอรุณฯ เขตบางกอกใหญ่ กรุงเทพฯ 10600', '024728111', NULL, NULL),
(10, 'SHA1', 'หจก. เซี่ยงไฮ้ทันตภัณฑ์', '605/13-15 ถนนอิสรภาพ แขวงบ้านช่างหล่อ เขตบางกอกน้อย กรุงเทพฯ 10700', '028663477', NULL, '2147483647'),
(11, 'KSD1', 'KS DENT KHONKAEN', '72/2 ม 2 ซอยโพธิ์ชัย ต.บ้านไผ่ อ.บ้านไผ่ จ.ขอนแก่น 40110', '096-6208837', NULL, '2147483647'),
(12, 'VRP1', 'บริษัท วี อาร์ พี เด้นท์ จำกัด', '314/28 ถนนศรีอยุธยา แขวงทุ่งพญาไท เขตราชเทวี กรุงเทพฯ 10400', '02-6129133', NULL, '2147483647'),
(13, 'SAI1', 'บริษัท สายน้ำทิพย์เด็นตอลแลบอราตอรี่ จำกัด', '777-777/1-2 หมู่ 3 ถนนพุทธรักษา ตำบลแพรกษา อำเภอเมืองสมุทรปราการ จังหวัดสมุทรปราการ 10280', '02-3826791', NULL, NULL),
(14, 'DAR1', 'บริษัท ดาร์ฟี่ (ประเทศไทย) จำกัด', '731/34-35 ถนนรัชดาภิเษก แขวงบางโพงพาง เขตยานนาวา กรุงเทพฯ 10120', '02-2931800', NULL, NULL),
(15, 'SDT1', 'บริษัท เอส.ดี.ทันตเวช (1988) จำกัด', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `productmain`
--

CREATE TABLE IF NOT EXISTS `productmain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'หมวดหมู่หลัก',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `productmain`
--

INSERT INTO `productmain` (`id`, `name`) VALUES
(1, 'เวชภัณฑ์มิใช่ยา'),
(2, 'ครุภัณฑ์การแพทย์');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productmain_id` int(11) NOT NULL COMMENT 'หมวดหมู่หลัก',
  `category_id` int(11) NOT NULL COMMENT 'หมวดหมู่รอง',
  `sub_qty` int(11) NOT NULL COMMENT 'หน่วยนับ',
  `unit_id` int(11) NOT NULL COMMENT 'ชื่อหน่วยนับ',
  `name` varchar(255) NOT NULL COMMENT 'ชื่อวัสดุ',
  `detail` text NOT NULL COMMENT 'คุณสมบัตเฉพาะ',
  `qty` int(11) NOT NULL COMMENT 'จำนวนคงเหลือ',
  `price` double NOT NULL COMMENT 'ราคา',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productmain_id`, `category_id`, `sub_qty`, `unit_id`, `name`, `detail`, `qty`, `price`) VALUES
(1, 1, 1, 1, 1, '2% Mepivacaine with 1:100,000 epinephrine', 'Local anesthesia\r\nMepivacaineHCL 2 g.\r\nAdrinaline 1.02 mg.\r\nPotassium metabisulfite 107 mg. (in SO2 form 62 mg.)\r\nDisodium edetate 25 mg.\r\nSodium chloride 0.645 g.', 52, 0),
(2, 1, 1, 1, 13, 'Amalgam', 'Filling material', 2, 0),
(3, 1, 1, 1, 14, 'Acrylic resin for denture base', 'Acrylic resin\r\nDenture base material', 2, 0),
(4, 2, 2, 1, 7, 'Air motor set', 'Handpiece set', 1, 0),
(5, 2, 2, 1, 8, 'Airotor', 'Handpiece joint', 52, 0),
(6, 1, 1, 1, 10, 'Alginate', 'Impression material', 0, 0),
(7, 1, 1, 1, 2, 'Alvogyl', 'Haemostatic surgical dressing ;\r\nPenghawar djambi\r\nEugenol\r\nSodium lauryl sulfate\r\nCalcium carbonate\r\nExcipients', 2, 0),
(8, 1, 2, 1, 8, 'Amalgam carrier', 'Dental instrument', 0, 0),
(9, 1, 1, 1, 15, 'Applicator tips', 'to apply etching, bonding, sealant or fluride varnish', 2, 0),
(10, 1, 1, 1, 14, 'Haemostatic solution agent', 'Haemostatic solution  agent for gingival retraction ;\r\nHexahydrated aluminium chloride 25% m/V\r\nOxyquinol\r\nHydroalcoholic excipient', 4, 0),
(11, 1, 1, 1, 1, 'U-shape articulating paper', 'non', 0, 0),
(12, 1, 1, 1, 14, 'Bonding refill', 'Bonding material', 2, 0),
(13, 1, 1, 1, 2, 'Cavit', 'temporary filling material', 0, 0),
(14, 1, 1, 1, 15, 'Composite resin A2', 'Filling material', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `productuser`
--

CREATE TABLE IF NOT EXISTS `productuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL COMMENT 'ชื่อ',
  `lname` varchar(255) NOT NULL COMMENT 'นามสกุล',
  `position_name` varchar(255) NOT NULL COMMENT 'ตำแหน่ง',
  `position_name1` varchar(255) NOT NULL COMMENT 'ตำแหน่ง',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `productuser`
--

INSERT INTO `productuser` (`id`, `fname`, `lname`, `position_name`, `position_name1`) VALUES
(1, 'นายประเสริฐศักดิ์', 'ปัดมะริด', 'หัวหน้าพัสดุ', ''),
(2, 'นางสาวพิมพ์ภาพ', 'ฉกามาพจร', 'เจ้าหน้าที่พัสดุ', ''),
(3, 'นางสาวสายฝน', 'วาเสนัง', 'ประธานกรรมการตรวจรับ', ''),
(4, 'นายศุภชัย', 'โล่ห์คำ', 'กรรมการตรวจรับ', ''),
(5, 'นางสาวนงลักษณ์', 'ไชยเลิศ', 'กรรมการตรวจรับ', ''),
(6, 'นายภมร', 'ดรุณ', 'ผู้อำนวยการโรงพยาบาลพรเจริญ', '');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `public_email` varchar(255) DEFAULT NULL,
  `gravatar_email` varchar(255) DEFAULT NULL,
  `gravatar_id` varchar(32) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `bio` text,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`) VALUES
(1, NULL, NULL, 'patjawat@gmail.com', 'e8bcaf995f99c22c05a4eacb8394e99b', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `social_account`
--

CREATE TABLE IF NOT EXISTS `social_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `data` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_unique` (`provider`,`client_id`),
  KEY `fk_user_account` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`) VALUES
(1, 'rrr'),
(2, 'uuu'),
(3, 'yyy'),
(4, 'ooo');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE IF NOT EXISTS `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL,
  UNIQUE KEY `token_unique` (`user_id`,`code`,`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE IF NOT EXISTS `unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'หน่วยนับ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `name`) VALUES
(1, 'กล่อง'),
(2, 'กระปุก'),
(3, 'ตัว'),
(4, 'ลิตร'),
(5, 'มิลลิลิตร'),
(6, 'เมตร'),
(7, 'ชุด'),
(8, 'ด้าม'),
(9, 'ซอง'),
(10, 'ถุง'),
(11, 'กิโลกรัม'),
(12, 'เครื่อง'),
(13, 'แคปซูล'),
(14, 'ขวด'),
(15, 'หลอด');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(60) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_unique_username` (`username`),
  UNIQUE KEY `user_unique_email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`) VALUES
(1, 'admin', 'patjawat@gmail.com', '$2y$10$xQ/Ao8vzCab.ohng/TW4Ju9qdmQdKLX5G0DVArW9Q63cgp.q5V.3e', 'uCTE0qV77cyqYRdjQxzmapvr92uzMw6Y', 1437638803, NULL, NULL, '1.179.182.83', 1437638768, 1437638803, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
