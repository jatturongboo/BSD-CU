-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2018 at 03:32 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fishing_equipment_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `BRAND_ID` int(5) NOT NULL,
  `BRAND_NAME` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`BRAND_ID`, `BRAND_NAME`) VALUES
(1, 'Berkley'),
(2, 'Daiwa'),
(3, 'Shimano'),
(4, 'Rapala');

-- --------------------------------------------------------

--
-- Table structure for table `fish_type`
--

CREATE TABLE `fish_type` (
  `fish_id` int(11) NOT NULL,
  `WaterID` int(2) NOT NULL,
  `fish_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `line_rang` varchar(50) COLLATE utf8_bin NOT NULL,
  `weight_rang` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `fish_type`
--

INSERT INTO `fish_type` (`fish_id`, `WaterID`, `fish_name`, `line_rang`, `weight_rang`) VALUES
(2, 1, 'ปลากราย', '10-20', '15'),
(3, 1, 'ปลาสลาด', '4-6', ''),
(4, 1, 'ปลาตะโกก', '> 12', '7'),
(5, 1, 'ปลายี่สก', '> 20', '18'),
(6, 1, 'ปลาตะเพียนขาว', '4-12', '3'),
(7, 1, 'ปลาไน', '6-12', '2'),
(8, 1, 'ปลาซ่ง', '6-12', '7'),
(9, 1, 'ปลาเฉา', '8 - 15', '3'),
(10, 1, 'ปลาค้าว', '> 16', '1'),
(11, 1, 'ปลาเทโพ', '10 - 20', ''),
(12, 1, 'ปลาสวาย', '6 - 20', '10'),
(13, 1, 'ปลาสร้อยนกเขา', '4 - 12', '4'),
(14, 1, 'ปลาเสือตอ', '6 - 12', '4'),
(15, 1, 'ปลาแรด', '6 - 20', '10'),
(16, 1, 'ปลาช่อน', '6 - 15', '1'),
(17, 1, 'ปลาชะโด', '10-20', '70'),
(18, 1, 'ปลากระพงขาว', '> 10', '60'),
(19, 1, 'ปลานิล', '4 - 8', '4'),
(20, 1, 'ปลากระสูบ', '8 - 16', '5'),
(21, 1, 'ปลาเวียน', '> 10', '10'),
(22, 1, 'ปลากดคัง', '> 10', '1.2');

-- --------------------------------------------------------

--
-- Table structure for table `fish_type_ref`
--

CREATE TABLE `fish_type_ref` (
  `fish_type_ref` int(11) NOT NULL,
  `lure_type_id` int(11) NOT NULL,
  `fish_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `fish_type_ref`
--

INSERT INTO `fish_type_ref` (`fish_type_ref`, `lure_type_id`, `fish_id`) VALUES
(1, 2, 16),
(2, 3, 16),
(3, 7, 16),
(4, 1, 2),
(5, 2, 2),
(6, 3, 2),
(7, 4, 2),
(8, 5, 2),
(9, 6, 2),
(10, 7, 2),
(11, 8, 2),
(12, 1, 3),
(13, 2, 3),
(14, 3, 3),
(15, 4, 3),
(16, 5, 3),
(17, 6, 3),
(18, 7, 3),
(19, 8, 3),
(20, 1, 4),
(21, 2, 4),
(22, 3, 4),
(23, 4, 4),
(24, 5, 4),
(25, 6, 4),
(26, 7, 4),
(27, 8, 4),
(28, 1, 5),
(29, 2, 5),
(30, 3, 5),
(31, 4, 5),
(32, 5, 5),
(33, 6, 5),
(34, 7, 5),
(35, 8, 5),
(36, 1, 6),
(37, 2, 6),
(38, 3, 6),
(39, 4, 6),
(40, 5, 6),
(41, 6, 6),
(42, 7, 6),
(43, 8, 6),
(44, 1, 7),
(45, 2, 7),
(46, 3, 7),
(47, 4, 7),
(48, 5, 7),
(49, 6, 7),
(50, 7, 7),
(51, 8, 7),
(52, 1, 8),
(53, 2, 8),
(54, 3, 8),
(55, 4, 8),
(56, 5, 8),
(57, 6, 8),
(58, 7, 8),
(59, 8, 8);

-- --------------------------------------------------------

--
-- Table structure for table `lines`
--

CREATE TABLE `lines` (
  `line_id` int(11) NOT NULL,
  `line_type_id` int(11) NOT NULL,
  `model` varchar(50) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin,
  `size` decimal(10,2) NOT NULL,
  `diameter` decimal(10,2) NOT NULL,
  `strenght_lb` decimal(10,2) DEFAULT NULL,
  `strenght_kg` decimal(10,2) DEFAULT NULL,
  `color` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `lenght` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `lines`
--

INSERT INTO `lines` (`line_id`, `line_type_id`, `model`, `description`, `size`, `diameter`, `strenght_lb`, `strenght_kg`, `color`, `lenght`, `price`, `image`) VALUES
(1, 1, 'TOMMY SNOW X8', 'สาย PE ถัก 8 เส้น ( X8 ) ผลิตจากวัสดุจากญี่ปุ่น ( Material From Japan )  พร้อมเคลือบ แบบ Double Coat คือ เคลือบแต่ละเส้นก่อนถัก และเคลือบอีกครั้งหลังจากถักแล้ว ช่วยให้สายลื่น', '1.00', '0.14', '16.00', '7.00', '', '100.00', '250.00', 'images\\lines\\TOMMYSNOW_X8.jpg'),
(2, 1, 'TOMMY SNOW X8', 'สาย PE ถัก 8 เส้น ( X8 ) ผลิตจากวัสดุจากญี่ปุ่น ( Material From Japan )  พร้อมเคลือบ แบบ Double Coat คือ เคลือบแต่ละเส้นก่อนถัก และเคลือบอีกครั้งหลังจากถักแล้ว ช่วยให้สายลื่น นุ่ม ไม่อมน้ำ และลดการเป็นขุยได้ดีขึ้น ยีดอายุการใช้งานของสาย สายมีขนาดหน้าตัดเล็กมาตราฐานญีปุ่น เหมาะสำหรับผู้ที่ต้องการสายมีคุณภาพสูง คุ้มราคา ', '2.00', '0.16', '23.00', '10.00', '', '100.00', '250.00', 'images\\lines\\TOMMYSNOW_X8.jpg'),
(3, 1, 'TOMMY SNOW X8', 'สาย PE ถัก 8 เส้น ( X8 ) ผลิตจากวัสดุจากญี่ปุ่น ( Material From Japan )  พร้อมเคลือบ แบบ Double Coat คือ เคลือบแต่ละเส้นก่อนถัก และเคลือบอีกครั้งหลังจากถักแล้ว ช่วยให้สายลื่น นุ่ม ไม่อมน้ำ และลดการเป็นขุยได้ดีขึ้น ยีดอายุการใช้งานของสาย สายมีขนาดหน้าตัดเล็กมาตราฐานญีปุ่น เหมาะสำหรับผู้ที่ต้องการสายมีคุณภาพสูง คุ้มราคา ', '2.00', '0.18', '29.00', '13.00', '', '100.00', '250.00', 'images\\lines\\TOMMYSNOW_X8.jpg'),
(4, 1, 'TOMMY SNOW X8', 'สาย PE ถัก 8 เส้น ( X8 ) ผลิตจากวัสดุจากญี่ปุ่น ( Material From Japan )  พร้อมเคลือบ แบบ Double Coat คือ เคลือบแต่ละเส้นก่อนถัก และเคลือบอีกครั้งหลังจากถักแล้ว ช่วยให้สายลื่น นุ่ม ไม่อมน้ำ และลดการเป็นขุยได้ดีขึ้น ยีดอายุการใช้งานของสาย สายมีขนาดหน้าตัดเล็กมาตราฐานญีปุ่น เหมาะสำหรับผู้ที่ต้องการสายมีคุณภาพสูง คุ้มราคา ', '3.00', '0.25', '41.00', '18.00', '', '100.00', '250.00', 'images\\lines\\TOMMYSNOW_X8.jpg'),
(5, 1, 'BERKLEY VANISH (Leader Material)', '', '4.00', '0.22', '0.00', '1.80', '', '45.00', '120.00', '\''),
(6, 2, 'STREN MONOFILAMENT', '', '4.00', '0.20', '0.00', '1.80', '', '91.00', '100.00', '\''),
(7, 1, 'BERKLEY VANISH (Leader Material)', '', '6.00', '0.25', '0.00', '2.70', '', '45.00', '120.00', '\''),
(8, 2, 'STREN MONOFILAMENT', '', '6.00', '0.22', '0.00', '2.70', '', '91.00', '100.00', '\''),
(9, 2, 'STREN MONOFILAMENT', '', '8.00', '0.27', '0.00', '3.60', '', '91.00', '100.00', '\''),
(10, 2, 'STREN MONOFILAMENT', '', '10.00', '0.30', '0.00', '4.50', '', '91.00', '100.00', '\''),
(11, 1, 'MUSTAD PROSELECT', '', '12.00', '0.26', '0.00', '5.44', '', '1.00', '288.00', '\''),
(12, 1, 'MUSTAD PROSELECT', '', '15.00', '0.30', '0.00', '6.80', '', '1.00', '288.00', '\''),
(13, 1, 'LUREFACTORY Fluorocarbon', '', '15.00', '0.30', '0.00', '6.82', '', '50.00', '100.00', '\''),
(14, 1, 'MUSTAD THOR HARD FLOUROCARBON- LEADER X 5', '', '16.00', '0.35', '0.00', '7.28', '', '25.00', '300.00', '\''),
(15, 1, 'Powerleader Fluorocarbon', '', '20.00', '0.37', '0.00', '9.00', '', '50.00', '150.00', '\''),
(16, 1, 'BERKLEY VANISH (Leader Material)', '', '20.00', '0.45', '0.00', '9.07', '', '36.00', '150.00', '\''),
(17, 1, 'H.D.CARBON FUNE LEADER ', '', '20.00', '0.37', '0.00', '9.07', '', '100.00', '200.00', '\''),
(18, 1, 'MUSTAD PROSELECT', '', '20.00', '0.37', '0.00', '9.07', '', '928.00', '288.00', '\''),
(19, 1, 'MUSTAD THOR HARD FLOUROCARBON- LEADER X 5', '', '20.00', '0.40', '0.00', '9.10', '', '25.00', '300.00', '\''),
(20, 1, 'MUSTAD PROSELECT', '', '25.00', '0.40', '0.00', '11.30', '', '700.00', '288.00', '\''),
(21, 1, 'BERKLEY VANISH (Leader Material)', '', '25.00', '0.50', '0.00', '11.33', '', '36.00', '150.00', '\''),
(22, 1, 'Powerleader Fluorocarbon', '', '30.00', '0.47', '0.00', '13.00', '', '50.00', '150.00', '\''),
(23, 1, 'BERKLEY VANISH (Leader Material)', '', '30.00', '0.55', '0.00', '13.60', '', '27.00', '150.00', '\''),
(24, 1, 'H.D.CARBON FUNE LEADER ', '', '30.00', '0.47', '0.00', '13.60', '', '100.00', '200.00', '\''),
(25, 1, 'MUSTAD SHOCK Leader Material', '', '30.00', '0.50', '0.00', '13.60', '', '50.00', '400.00', '\''),
(26, 3, 'MUSTAD SHOCK Leader Soft', '', '30.00', '0.40', '0.00', '13.60', '', '100.00', '400.00', '\''),
(27, 1, 'LUREFACTORY Fluorocarbon', '', '30.00', '0.42', '0.00', '13.64', '', '50.00', '100.00', '\''),
(28, 1, 'MUSTAD THOR HARD FLOUROCARBON- LEADER X 5', '', '30.00', '0.50', '0.00', '13.65', '', '25.00', '300.00', '\''),
(29, 1, 'MUSTAD PROSELECT', '', '40.00', '0.52', '0.00', '18.10', '', '464.00', '288.00', '\''),
(30, 1, 'BERKLEY VANISH (Leader Material)', '', '40.00', '0.60', '0.00', '18.14', '', '22.00', '150.00', '\''),
(31, 1, 'H.D.CARBON FUNE LEADER ', '', '40.00', '0.57', '0.00', '18.14', '', '100.00', '200.00', '\''),
(32, 1, 'MUSTAD SHOCK Leader Material', '', '40.00', '0.55', '0.00', '18.14', '', '50.00', '400.00', '\''),
(33, 3, 'MUSTAD SHOCK Leader Soft', '', '40.00', '0.50', '0.00', '18.14', '', '100.00', '300.00', '\''),
(34, 1, 'LUREFACTORY Fluorocarbon', '', '40.00', '0.50', '0.00', '18.18', '', '50.00', '100.00', '\''),
(35, 1, 'Powerleader Fluorocarbon', '', '40.00', '0.57', '0.00', '19.00', '', '50.00', '150.00', '\''),
(36, 1, 'MUSTAD THOR HARD FLOUROCARBON- LEADER X 5', '', '45.00', '0.60', '0.00', '20.48', '', '25.00', '300.00', '\''),
(37, 1, 'MUSTAD SHOCK Leader Material', '', '50.00', '0.65', '0.00', '22.60', '', '50.00', '400.00', '\''),
(38, 3, 'MUSTAD SHOCK Leader Soft', '', '50.00', '0.55', '0.00', '22.67', '', '100.00', '300.00', '\''),
(39, 1, 'MUSTAD THOR HARD FLOUROCARBON- LEADER X 5', '', '55.00', '0.70', '0.00', '25.03', '', '25.00', '300.00', '\''),
(40, 1, 'MUSTAD SHOCK Leader Material', '', '60.00', '0.75', '0.00', '27.21', '', '50.00', '400.00', '\''),
(41, 1, 'H.D.CARBON FUNE LEADER ', '', '80.00', '0.84', '0.00', '36.28', '', '50.00', '200.00', '\''),
(42, 1, 'MUSTAD SHOCK Leader Material', '', '80.00', '0.85', '0.00', '36.28', '', '50.00', '400.00', '\''),
(43, 1, 'H.D.CARBON FUNE LEADER ', '', '110.00', '1.05', '0.00', '49.89', '', '50.00', '200.00', '\'');

-- --------------------------------------------------------

--
-- Table structure for table `line_type`
--

CREATE TABLE `line_type` (
  `line_type_id` int(11) NOT NULL,
  `line_type_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `line_type_desc` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `line_type`
--

INSERT INTO `line_type` (`line_type_id`, `line_type_name`, `line_type_desc`) VALUES
(1, 'Fluorocarbon', 'สาย PE'),
(2, 'Monofilament', 'สายเอ็น'),
(3, 'Superline', ''),
(4, 'Uni-filament', '');

-- --------------------------------------------------------

--
-- Table structure for table `lures`
--

CREATE TABLE `lures` (
  `lure_id` int(11) NOT NULL,
  `model` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `brand_id` int(2) NOT NULL,
  `description` text COLLATE utf8_bin,
  `lenght` decimal(10,2) DEFAULT NULL,
  `running_depth` varchar(20) COLLATE utf8_bin NOT NULL,
  `weight` decimal(10,0) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `lure_type` int(1) DEFAULT NULL,
  `image` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `lures`
--

INSERT INTO `lures` (`lure_id`, `model`, `brand_id`, `description`, `lenght`, `running_depth`, `weight`, `qty`, `price`, `lure_type`, `image`) VALUES
(1, 'SDRS07-HLW', 4, 'SHADOW RAP 07', '7.00', '0.7', '5', 100, '350', 14, 'img/lure/RAPALA_SHADOW RAP07_72.jpg'),
(2, 'SDRS07-P', 4, 'SHADOW RAP 07', '7.00', '0.7', '5', 100, '350', 14, 'img/lure/RAPALA_SHADOW RAP07_72.jpg'),
(3, 'SDRS07-ROL', 4, 'SHADOW RAP 07', '7.00', '0.7', '5', 100, '350', 14, 'img/lure/RAPALA_SHADOW RAP07_72.jpg'),
(4, 'SDRS07-SML', 4, 'SHADOW RAP 07', '7.00', '0.7', '5', 100, '350', 14, 'img/lure/RAPALA_SHADOW RAP07_72.jpg'),
(5, 'SDRS07-HH', 4, 'SHADOW RAP 07', '7.00', '0.7', '5', 100, '350', 14, 'img/lure/RAPALA_SHADOW RAP07_72.jpg'),
(6, 'SDRS07-OG', 4, 'SHADOW RAP 07', '7.00', '0.7', '5', 100, '350', 7, 'img/lure/RAPALA_SHADOW RAP07_72.jpg'),
(7, 'SDRS07-GAU', 4, 'SHADOW RAP 07', '7.00', '0.7', '5', 100, '350', 14, 'img/lure/RAPALA_SHADOW RAP07_72.jpg'),
(8, 'SDRS07-S', 4, 'SHADOW RAP 07', '7.00', '0.7', '5', 100, '350', 14, 'img/lure/RAPALA_SHADOW RAP07_72.jpg'),
(9, 'SR-5', 4, 'SHAD RAP', '5.00', '4-9', '6', 100, '330', 7, 'img/lure/SHAD RAP.jpg'),
(10, 'SR-7', 4, 'SHAD RAP', '7.00', '5-11', '8', 100, '350', 17, 'img/lure/SHAD RAP.jpg'),
(11, 'SSR-5', 4, 'SHAD RAP', '5.00', '3-6', '5', 100, '330', 17, 'img/lure/SHAD RAP.jpg'),
(12, 'SSR-7', 4, 'SHAD RAP', '7.00', '4-6', '7', 100, '350', 3, 'img/lure/SHAD RAP.jpg'),
(13, 'SDD-4', 4, 'SHAD DANCER ', '4.00', '7-10', '5', 100, '320', 2, 'img/lure/SHAD DANCER.jpg'),
(14, 'SDD-5', 4, 'SHAD DANCER ', '5.00', '7-10', '8', 100, '320', 9, 'img/lure/SHAD DANCER.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `lure_type`
--

CREATE TABLE `lure_type` (
  `lure_type_id` int(1) NOT NULL,
  `lure_type` int(1) NOT NULL COMMENT '1 = แยกประเภทต่างลักษณะรูปร่างของเหยื่อปลอม 2 = แยกประเภทตามลักษณะการใช้งานและรูปแบบในการตกปลา',
  `lure_name_th` varchar(100) COLLATE utf8_bin NOT NULL,
  `lure_name_en` varchar(100) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `lure_type`
--

INSERT INTO `lure_type` (`lure_type_id`, `lure_type`, `lure_name_th`, `lure_name_en`, `description`) VALUES
(1, 1, 'เหยื่อจิ๊กส์', 'Jigs', ''),
(2, 1, 'เหยื่อสปินเนอร์', 'Spinners', ''),
(3, 1, 'เหยื่อสปูน', 'Spoons', ''),
(4, 1, 'เหยื่อปลอมประเภทที่เป็นยางประเภทต่างๆ', 'Soft plastic baits', ''),
(5, 1, 'เหยื่อไวเบรกชั่นปลั๊ก', 'Plugs', ''),
(6, 1, 'เหยื่อสปินเนอร์เบทส์ หรือบัซเบทส์', 'Spinerbaits, Buzzbaits', ''),
(7, 1, 'เหยื่อปลั๊กผิวน้ำ', 'Top Water', ''),
(8, 1, 'เหยื่อฟลาย', 'Flies', ''),
(9, 2, 'Floating', 'Floating', 'ลอย'),
(10, 2, 'Sinking', 'Sinking', 'จม'),
(11, 2, 'Suspending', 'Suspending', 'แขวนลอย หรือเวลาตีลงไปแล้วจะค่อยๆจม ถึงระดับหนึ่ง'),
(12, 2, 'Shallow Runner', 'Shallow Runner', 'ดำตื้น'),
(13, 2, 'Extra Sinking', 'Extra Sinking', 'จมเร็ว'),
(14, 2, 'Slow Sinking', 'Slow Sinking', 'ค่อยๆ จม'),
(15, 2, 'Slow Floating', 'Slow Floating', 'ค่อยๆ ลอย'),
(16, 2, 'Fast Singking', 'Fast Singking', 'จมเร็ว'),
(17, 2, 'Deep Runner', 'Deep Runner', 'ดำลึก'),
(18, 2, 'Super Shallow Runner', 'Super Shallow Runner', 'ดำตื้นมาก');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `ORDER_ID` int(11) NOT NULL,
  `CUSTOMER_ID` varchar(10) COLLATE utf8_bin NOT NULL,
  `ORDER_DATE` date NOT NULL,
  `PRICE_AMOUNT` decimal(10,0) NOT NULL,
  `SEND_STATUS` varchar(10) COLLATE utf8_bin NOT NULL,
  `TRACK_NO` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `ORDER_DETAIL_ID` int(11) NOT NULL,
  `ORDER_ID` int(11) NOT NULL,
  `PRODUCT_ID` int(11) NOT NULL,
  `AMOUNT` int(11) NOT NULL,
  `PRICE` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PAYMENT_ID` int(11) NOT NULL,
  `ORDER_ID` int(11) NOT NULL,
  `STAFF_ID` int(11) NOT NULL,
  `PAY_DATE` date NOT NULL,
  `PAY_STATUS` varchar(1) COLLATE utf8_bin NOT NULL,
  `BANK_NAME` varchar(50) COLLATE utf8_bin NOT NULL,
  `PRICE_AMOUNT` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `PRODUCT_ID` int(11) NOT NULL,
  `PRODUCT_TYPE_ID` int(11) NOT NULL,
  `PRODUCT_DETAIL_ID` int(11) NOT NULL,
  `BRAND_ID` int(11) NOT NULL,
  `PRODUCT_NAME` varchar(20) COLLATE utf8_bin NOT NULL,
  `PRODUCT_CODE` varchar(50) COLLATE utf8_bin NOT NULL,
  `COLOR_ID` int(11) NOT NULL,
  `PRICE` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `reels`
--

CREATE TABLE `reels` (
  `id` int(11) NOT NULL,
  `Model` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `Description` text COLLATE utf8_bin,
  `BRAND_ID` int(1) DEFAULT NULL,
  `Bearing` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `Handle` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `Ratio` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `Wt_oz` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `wt_g` int(11) DEFAULT NULL,
  `Line` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `line_lb` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `MaxDrag` decimal(10,2) DEFAULT NULL,
  `Price` decimal(10,0) DEFAULT NULL,
  `Images` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `reels`
--

INSERT INTO `reels` (`id`, `Model`, `Description`, `BRAND_ID`, `Bearing`, `Handle`, `Ratio`, `Wt_oz`, `wt_g`, `Line`, `line_lb`, `MaxDrag`, `Price`, `Images`) VALUES
(1, 'TEK 500HG', 'SHIMANO TEKOTA', 3, '3+1', 'Both', '6.3:1', '', 440, '', '14/340', '11.00', '4500', 'A'),
(2, 'TEK 600HG', '', 3, '3+1', 'Both', '6.3:1', '', 465, '', '20/300', '11.00', '4500', 'A'),
(3, 'TR 100G', 'Shimano TR ', 3, '1', 'Both', '4.3:1', '', 350, '', '17/250', '0.00', '0', 'A'),
(4, 'TR 200G', '', 3, '1', 'Both', '4.3:1', '', 375, '', '20/300', '0.00', '0', 'A'),
(5, 'TLD15', 'Shimano  TLD', 3, '4', 'Both', '4.0:1', '', 530, '', '30/300', '0.00', '3800', 'A'),
(6, 'TLD20', '', 3, '4', 'Both', '3.6:1', '', 669, '', '40/330', '0.00', '4200', 'A'),
(7, 'TLD25', '', 3, '4', 'Both', '3.6:1', '', 695, '', '50/350', '0.00', '4400', 'A'),
(8, 'TR 1000LD', 'Shimano  Charter Special ', 3, '4', 'Both', '4.2:1', '', 490, '', '17/250', '0.00', '0', 'A'),
(9, 'TR 2000LD', '', 3, '4', 'Both', '4.2:1', '', 490, '', '20/300', '0.00', '0', 'A'),
(10, '1500HG', 'OCEA JIGGER', 3, '8+1', 'Right', '6.3:1', '', 390, '3/320', '', '7.00', '15500', 'A'),
(11, '1501HG', '', 3, '8+1', 'Left', '6.3:1', '', 390, '3/320', '', '7.00', '15500', 'A'),
(12, '2000NRGS', '', 3, '8+1', 'Right', '6.2:1', '', 555, '5/220', '', '10.00', '17000', 'A'),
(13, '2001NRPG', '', 3, '8+1', 'Left', '5.1:1', '', 555, '5/220', '', '10.00', '17000', 'A'),
(14, '100(2014)', 'CONQUEST 2014', 3, '12+1', 'Right', '5.2:1', '', 215, '', '10/110', '4.50', '15000', 'A'),
(15, '101(2014)', '', 3, '12+1', 'Left', '5.2:1', '', 215, '', '10/110', '4.50', '15000', 'A'),
(16, '200(2014)', '', 3, '12+1', 'Right', '4.8:1', '', 240, '', '12/145', '6.00', '16000', 'A'),
(17, '201(2014)', '', 3, '12+1', 'Left', '4.8:1', '', 240, '', '12/145', '6.00', '16000', 'A'),
(18, '201HG', ' OCEAN CALCUTTA', 3, '5+1', 'Left', '6.7:1', '', 285, 'PE2/200', '', '4.00', '11500', 'A'),
(19, '300F', 'CALCUTTA  F', 3, '4+1', 'Right', '5.9:1', '', 0, 'PE3/100', '', '4.00', '10500', 'A'),
(20, '301F', '', 3, '4+1', 'Left', '5.9:1', '', 0, 'PE3/100', '', '4.00', '10500', 'A'),
(21, '400F', '', 3, '5+1', 'Right', '5.7:1', '', 0, 'PE3/130', '', '5.00', '11500', 'A'),
(22, '401F', '', 3, '5+1', 'Left', '5.7:1', '', 0, 'PE3/130', '', '5.00', '11500', 'A'),
(23, '300HG', 'OCEAN CALCUTTA', 3, '5+1', 'Right', '6.0:1', '', 350, 'PE3/200', '', '6.00', '12500', 'A'),
(24, '301HG', '', 3, '5+1', 'Left', '6.0:1', '', 350, 'PE3/200', '', '6.00', '12500', 'A'),
(25, '800F', '', 3, '5+1', 'Right', '5.1:1', '', 350, 'PE4/180', '', '6.00', '12500', 'A'),
(26, '801F', '', 3, '5+1', 'Left', '5.1:1', '', 350, 'PE4/180', '', '6.00', '12500', 'A'),
(27, 'COR200', 'CORVALUS 200', 3, '3+1', 'Both', '', '', 305, '', '14/120', '5.00', '2200', 'A'),
(28, 'CTE200GT', 'Calcutta TE200GT   ', 3, '10+1', 'Right', '5.0:1', '10.2', 0, '', '12/150', '0.00', '10000', 'A'),
(29, 'CTE201', 'Calcutta TE', 3, '6+1', 'Left', '5.0:1', '10.4', 0, '', '12/150', '0.00', '9000', 'A'),
(30, 'CTE300', '', 3, '4+1', 'Right', '5.0:1', '12.5', 0, '', '15/170', '0.00', '10500', 'A'),
(31, '2001NRPG', 'OCEA JIGGER  ( Promotion )', 3, '8+1', 'Left', '5.1:1', '', 555, 'PE5/220', '', '0.00', '17500', 'A'),
(32, '200D', 'CALCUTTA D (Export Model)', 3, '4+1', 'Right', '', '', 265, '', '10/180', '0.00', '7700', 'A'),
(33, '201D', '', 3, '4+1', 'Left', '', '', 265, '', '10/180', '0.00', '7700', 'A'),
(34, 'CQ SUMI IKA', 'CONQUEST SUMI IKA', 3, '8+1', 'Both', '5.0:1', '', 290, '', 'PE3/100', '0.00', '12500', 'A'),
(35, 'CT100(2012)', 'CALCUTTA 2012', 3, '5+1', 'Right', '5.9:1', '', 225, '', '10/140', '0.00', '11900', 'A'),
(36, 'CT101(2012)', '', 3, '5+1', 'Left', '5.9:1', '', 225, '', '10/140', '0.00', '11900', 'A'),
(37, 'CT200(2012)', '', 3, '5+1', 'Right', '5.7:1', '', 255, '', '10/180', '0.00', '12600', 'A'),
(38, 'CT201(2012)', '', 3, '5+1', 'Left', '5.7:1', '', 255, '', '10/180', '0.00', '12600', 'A'),
(39, 'CT800F', '', 3, '5+1', 'Right', '5.1:1', '', 350, '', 'PE4/180', '0.00', '12500', 'A'),
(40, 'CT801F', '', 3, '5+1', 'Left', '5.1:1', '', 350, '', 'PE4/180', '0.00', '12500', 'A'),
(41, '50DC', 'CONQUEST DC(2011)', 3, '11+1', 'Right', '6.2:1', '', 230, '10/7', '', '0.00', '0', 'A'),
(42, '51DC', '', 3, '11+1', 'Left', '6.2:1', '', 230, '10/7', '', '0.00', '0', 'A'),
(43, '100DC', '', 3, '10+1', 'Right', '5.8:1', '', 240, '12/100', '', '0.00', '22500', 'A'),
(44, '101DC', '', 3, '10+1', 'Left', '5.8:1', '', 240, '12/100', '', '0.00', '22500', 'A'),
(45, 'TOR14', 'TORIUM', 3, '3+1', 'Both', '6.2:1', '15.7', 0, '', '16/270', '13.00', '5500', 'A'),
(46, 'TOR16', '', 3, '3+1', 'Both', '6.2:1', '22.4', 0, '', '20/320', '22.00', '5500', 'A'),
(47, 'TOR20', '', 3, '3+1', 'Both', '6.2:1', '22.8', 0, '', '25/300', '22.00', '5500', 'A'),
(48, 'TAC10', ' TALICA  II', 3, '6', 'Both', '6.2:1', ' 16.4', 0, ' 25/215', '', '0.00', '11000', 'A'),
(49, 'TAC8II', '', 3, '6', 'Both', ' 6.2:1/ 4.1:1', ' 18.2', 0, ' 20/200', '', '0.00', '0', 'A'),
(50, 'TAC10II', '', 3, '6', 'Both', ' 6.2:1/ 4.1:1', ' 18.6', 0, ' 25/215', '', '0.00', '0', 'A'),
(51, 'TAC12II', '', 3, '6', 'Both', ' 5.7:1/ 3.1:1', ' 25.7', 0, ' 30/230', '', '0.00', '0', 'A'),
(52, 'TAC16II', '', 3, '6', 'Both', ' 5.7:1/ 3.1:1', ' 26.5', 0, ' 30/300', '', '0.00', '0', 'A'),
(53, ' 2000', '   JIGGER LD', 3, ' 7', 'Both', ' 6.2/4.1:1', '', 0, '', ' 20/230', '0.00', '0', 'A'),
(54, ' 4000', '', 3, ' 7', 'Both', ' 5.7/3.1:1', '', 0, '', ' 25/350', '0.00', '0', 'A'),
(55, 'TN10A', 'TRINIDAD @ A', 3, '8+1', 'Both', ' 6.3:1', ' 13.6', 0, ' 12/250', '', '0.00', '0', 'A'),
(56, 'TN12A', '', 3, '8+1', 'Both', ' 6.3:1', ' 13.8', 0, ' 16/220', '', '0.00', '0', 'A'),
(57, 'TN14A', '', 3, '8+1', 'Both', ' 6.3:1', ' 14.7', 0, ' 20/200', '', '0.00', '0', 'A'),
(58, 'TN16A', '', 3, '8+1', 'Both', ' 6.2:1', ' 19.3', 0, ' 20/320', '', '0.00', '0', 'A'),
(59, 'TN20A', '', 3, '8+1', 'Both', ' 6.2:1', ' 19.8', 0, ' 25/300', '', '0.00', '0', 'A'),
(60, 'Tynos8', '', 3, '4', 'Both', '6.0:1', '', 530, '', '20/170', '0.00', '7000', 'A'),
(61, 'Tynos10', '', 3, '4', 'Both', '6.0:1', '', 540, '', '20/230', '0.00', '7000', 'A'),
(62, 'Tynos 8 II', '', 3, '4', 'Both', '6.0:1/3.5:1', '', 615, '', '20/170', '0.00', '9000', 'A'),
(63, 'Tynos10 II', '', 3, '4', 'Both', '6.0:1/3.5:1', '', 625, '', '20/230', '0.00', '9000', 'A'),
(64, 'Tynos12 II', '', 3, '4', 'Both', '5.0:1/2.0:1', '', 850, '', '25/250', '0.00', '9000', 'A'),
(65, 'CDF200A', 'CARDIFF  ', 3, '3+1', 'Both', '5.8:1', '8.6', 0, '14lb/120y', '', '0.00', '0', 'A'),
(66, 'CDF201A', '', 3, '3+1', 'Both', '5.8:1', '8.6', 0, '14lb/120y', '', '0.00', '0', 'A'),
(67, 'CDF400A', '', 3, '3+1', 'Both', '5.2:1', '11.9', 0, '20lb/165y', '', '0.00', '0', 'A'),
(68, 'CDF401A', '', 3, '3+1', 'Both', '5.2:1', '11.9', 0, '20lb/165y', '', '0.00', '0', 'A'),
(69, 'CVL400', 'CORVALUS', 3, '3+1', 'Both', '5.2:1', '11.8', 0, '20lb/165y', '', '0.00', '2600', 'A'),
(70, 'CVL401', '', 3, '3+1', 'Both', '5.2:1', '11.8', 0, '20lb/165y', '', '0.00', '2600', 'A'),
(71, 'CQ 200DC', '', 3, '10+1', 'Both', '5.0:1', '', 260, '12lb/150y', '', '0.00', '22500', 'A'),
(72, 'CQ 201DC', '', 3, '10+1', 'Both', '5.0:1', '', 260, '12lb/150y', '', '0.00', '22500', 'A'),
(73, 'TEK300', 'Shimano  TEKOTA', 3, '3+1', 'Both', '4.2:1', '', 376, '', '16/185', '18.00', '0', 'A'),
(74, 'TEK500', '', 3, '3+1', 'Both', '4.2:1', '', 435, '', '20/200', '18.00', '0', 'A'),
(75, 'TEK600', '', 3, '3+1', 'Both', '4.2:1', '', 450, '', '25/240', '18.00', '0', 'A'),
(76, 'CT50B', 'Shimano CALCUTTA B Series', 3, '3+1', 'Both', '5.0:1', '7.9', 0, '', '8/130', '0.00', '0', 'A'),
(77, 'CT100B', '', 3, '3+1', 'Both', '5.8:1', '9', 0, '', '12/120', '0.00', '0', 'A'),
(78, 'CT101B', '', 3, '3+1', 'Both', '5.8:1', '9', 0, '', '12/120', '0.00', '0', 'A'),
(79, 'CT400B', '', 3, '3+1', 'Both', '5.0:1', '11.7', 0, '', '20/160', '0.00', '0', 'A'),
(80, 'CT400BSV', '', 3, '3+1', 'Both', '5.0:1', '11.9', 0, '', '20/160', '0.00', '0', 'A'),
(81, 'CT700B', '', 3, '3+1', 'Both', '4.7:1', '18.2', 0, '', '30/200', '0.00', '0', 'A'),
(82, 'CT700BSV', '', 3, '3+1', 'Both', '4.7:1', '19.2', 0, '', '30/200', '0.00', '0', 'A'),
(83, 'CQ 50', '', 3, '11+1', 'Both', '6.2:1', '', 205, '10lb/91y', '', '3.50', '0', 'A'),
(84, 'CQ 51', '', 3, '11+1', 'Both', '6.2:1', '', 205, '10lb/91y', '', '3.50', '0', 'A'),
(85, 'CQ 100', '', 3, '10+1', 'Both', '5.8:1', '', 225, '12lb/115y', '', '4.00', '0', 'A'),
(86, 'CQ 101', '', 3, '10+1', 'Both', '5.8:1', '', 225, '12lb/115y', '', '4.00', '0', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `rods`
--

CREATE TABLE `rods` (
  `rod_id` int(11) NOT NULL,
  `Model` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `Description` text COLLATE utf8_bin,
  `BRAND_ID` int(11) DEFAULT NULL,
  `Lenght` decimal(10,2) DEFAULT NULL,
  `section` int(1) DEFAULT NULL,
  `Guide` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `Type` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `Action` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `wt` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `Power` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `Lure_Wt` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `LINE_Wt` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `Price` decimal(10,0) DEFAULT NULL,
  `image` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `rods`
--

INSERT INTO `rods` (`rod_id`, `Model`, `Description`, `BRAND_ID`, `Lenght`, `section`, `Guide`, `Type`, `Action`, `wt`, `Power`, `Lure_Wt`, `LINE_Wt`, `Price`, `image`) VALUES
(2, 'SLCR902MH', 'LIGHTNING LIMITED EDITION ', 9, '2.00', 0, '', '1', 'MH', '', '', '15-55', '12-25', '7400', ''),
(3, 'SLS902MH', 'LIGHTNING LIMITED EDITION ', 8, '2.00', 0, '', '2', 'MH', '', '', '15-55', '12-25', '6800', ''),
(4, 'SLS902MH', 'LIGHTNING LIMITED EDITION ', 9, '2.00', 0, '', '2', 'MH', '', '', '15-55', '12-25', '7100', ''),
(5, 'SLS1002MH', 'LIGHTNING LIMITED EDITION ', 10, '2.00', 0, '', '2', 'MH', '', '', '15-55', '12-25', '7700', ''),
(7, 'BSEMO661ML', 'BERKLEY E.MOTION  ', 7, '1.00', 0, '', '2', 'ML', '', '', '1.77-10.63', '4-10', '1700', ''),
(8, 'BSEMO691M', 'BERKLEY E.MOTION  ', 7, '1.00', 0, '', '2', 'M', '', '', '3.54-14.17', '6-12', '1700', ''),
(9, 'BCEMO671MH', 'BERKLEY E.MOTION  ', 7, '1.00', 0, '', '1', 'MH', '', '', '3.54-21.26', '12-20', '1700', ''),
(1671, 'DV166M', 'DEPORTIVO ', 3, '6.60', NULL, NULL, '2', NULL, NULL, 'M', '7-28', '10-20', '6000', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rod_action`
--

CREATE TABLE `rod_action` (
  `Rod_Action_ID` varchar(2) COLLATE utf8_bin NOT NULL,
  `Rod_Action_NAME` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `rod_action`
--

INSERT INTO `rod_action` (`Rod_Action_ID`, `Rod_Action_NAME`) VALUES
('F', 'Fast'),
('M', 'Moderate'),
('MF', 'Medium Fast'),
('S', 'Slow'),
('XF', 'Extra Fast');

-- --------------------------------------------------------

--
-- Table structure for table `rod_power`
--

CREATE TABLE `rod_power` (
  `Rod_Power_ID` varchar(2) COLLATE utf8_bin NOT NULL,
  `Rod_Power_NAME` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `rod_power`
--

INSERT INTO `rod_power` (`Rod_Power_ID`, `Rod_Power_NAME`) VALUES
('H', 'Heavy'),
('L', 'Light'),
('M', 'Medium'),
('MH', 'Medium Heavy'),
('UL', 'Ultra Light'),
('XH', 'Extra Heavy');

-- --------------------------------------------------------

--
-- Table structure for table `rod_type`
--

CREATE TABLE `rod_type` (
  `rod_type_id` int(2) NOT NULL,
  `rod_type_name` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `rod_type`
--

INSERT INTO `rod_type` (`rod_type_id`, `rod_type_name`) VALUES
(1, 'Spinning'),
(2, 'Casting');

-- --------------------------------------------------------

--
-- Table structure for table `tensile_strength`
--

CREATE TABLE `tensile_strength` (
  `ID` int(1) NOT NULL,
  `strength_kg` int(2) NOT NULL,
  `strength_pound` double NOT NULL,
  `strength_pound_old` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tensile_strength`
--

INSERT INTO `tensile_strength` (`ID`, `strength_kg`, `strength_pound`, `strength_pound_old`) VALUES
(1, 1, 2.2, 2),
(2, 2, 4.4, 4),
(3, 4, 8.81, 8),
(4, 6, 13.22, 12),
(5, 8, 17.63, 16),
(6, 10, 22.04, 20),
(7, 15, 33.06, 30),
(8, 24, 52.91, 50),
(9, 37, 81.57, 80),
(10, 60, 132.27, 130);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(3) UNSIGNED ZEROFILL NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(150) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Status` enum('ADMIN','USER') NOT NULL DEFAULT 'USER'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Password`, `Name`, `Status`) VALUES
(002, 'admin', 'admin', 'admin', 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `water_source`
--

CREATE TABLE `water_source` (
  `water_source_id` int(2) NOT NULL,
  `water_id` int(1) NOT NULL,
  `water_source_name` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `water_source`
--

INSERT INTO `water_source` (`water_source_id`, `water_id`, `water_source_name`) VALUES
(1, 2, 'ทะเล'),
(2, 1, 'น้ำตก'),
(3, 1, 'บ่อตกปลา'),
(4, 1, 'แม่น้ำ ลำคลองต่างๆ'),
(5, 1, 'ลำธาร');

-- --------------------------------------------------------

--
-- Table structure for table `water_type`
--

CREATE TABLE `water_type` (
  `WaterID` int(1) NOT NULL,
  `WaterType` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `water_type`
--

INSERT INTO `water_type` (`WaterID`, `WaterType`) VALUES
(1, 'น้ำจืด'),
(2, 'น้ำเค็ม');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`BRAND_ID`);

--
-- Indexes for table `fish_type`
--
ALTER TABLE `fish_type`
  ADD PRIMARY KEY (`fish_id`);

--
-- Indexes for table `fish_type_ref`
--
ALTER TABLE `fish_type_ref`
  ADD PRIMARY KEY (`fish_type_ref`);

--
-- Indexes for table `lines`
--
ALTER TABLE `lines`
  ADD PRIMARY KEY (`line_id`);

--
-- Indexes for table `line_type`
--
ALTER TABLE `line_type`
  ADD PRIMARY KEY (`line_type_id`);

--
-- Indexes for table `lures`
--
ALTER TABLE `lures`
  ADD PRIMARY KEY (`lure_id`);

--
-- Indexes for table `lure_type`
--
ALTER TABLE `lure_type`
  ADD PRIMARY KEY (`lure_type_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`ORDER_ID`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`ORDER_DETAIL_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PAYMENT_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PRODUCT_ID`);

--
-- Indexes for table `reels`
--
ALTER TABLE `reels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rods`
--
ALTER TABLE `rods`
  ADD PRIMARY KEY (`rod_id`);

--
-- Indexes for table `rod_action`
--
ALTER TABLE `rod_action`
  ADD PRIMARY KEY (`Rod_Action_ID`);

--
-- Indexes for table `rod_power`
--
ALTER TABLE `rod_power`
  ADD PRIMARY KEY (`Rod_Power_ID`);

--
-- Indexes for table `rod_type`
--
ALTER TABLE `rod_type`
  ADD PRIMARY KEY (`rod_type_id`);

--
-- Indexes for table `tensile_strength`
--
ALTER TABLE `tensile_strength`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `water_source`
--
ALTER TABLE `water_source`
  ADD PRIMARY KEY (`water_source_id`);

--
-- Indexes for table `water_type`
--
ALTER TABLE `water_type`
  ADD PRIMARY KEY (`WaterID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fish_type`
--
ALTER TABLE `fish_type`
  MODIFY `fish_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `fish_type_ref`
--
ALTER TABLE `fish_type_ref`
  MODIFY `fish_type_ref` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `lines`
--
ALTER TABLE `lines`
  MODIFY `line_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `line_type`
--
ALTER TABLE `line_type`
  MODIFY `line_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lures`
--
ALTER TABLE `lures`
  MODIFY `lure_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `lure_type`
--
ALTER TABLE `lure_type`
  MODIFY `lure_type_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `reels`
--
ALTER TABLE `reels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `rods`
--
ALTER TABLE `rods`
  MODIFY `rod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1672;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
