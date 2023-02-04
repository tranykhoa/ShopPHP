-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2023 at 03:38 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_customer`
--

CREATE TABLE `account_customer` (
  `idac` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `images` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `tel` varchar(12) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_customer`
--

INSERT INTO `account_customer` (`idac`, `fullname`, `images`, `email`, `pass`, `tel`, `status`) VALUES
(24, 'Qi Bánh Bao', '1670576837-1663813807-1.jpg', 'banhbao@domain.com', '202cb962ac59075b964b07152d234b70', '0374537453', 1),
(25, 'Qi', '1671006106-23.jpg', 'Qibanhbao@gmail.com', '202cb962ac59075b964b07152d234b70', '0374537453', 0),
(26, 'Trần Trường Sinh', 'defaul-2.jpg', 'truongsinh@gmail.com', '202cb962ac59075b964b07152d234b70', '0375963699', 1),
(27, 'Kim jun Hun', 'defaul-2.jpg', 'kim@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0397391424', 1),
(28, 'Trần Y Khoa', 'defaul-2.jpg', 'tykhoa_20th@student.agu.edu.vn', '202cb962ac59075b964b07152d234b70', '123', 1),
(29, 'Trần Văn Khoa', 'defaul-2.jpg', 'vkhoa@domain.com', '202cb962ac59075b964b07152d234b70', '0397391424', 1),
(30, 'Y khoa', 'defaul-2.jpg', 'ykhoadeptrai@gmail.com', '202cb962ac59075b964b07152d234b70', '0375963699', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `idbill` int(11) NOT NULL,
  `idac` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(12) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `pttt` tinyint(2) NOT NULL DEFAULT 1 COMMENT '1. Credit Card  2. Payment on delivery',
  `orderdate` varchar(50) NOT NULL,
  `total` double(20,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(2) NOT NULL DEFAULT 1 COMMENT '1. Đơn hàng mới  2. Đang xử lý  3. Đang giao hàng 4. Đã giao hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`idbill`, `idac`, `email`, `tel`, `address`, `pttt`, `orderdate`, `total`, `status`) VALUES
(17, 24, 'banhbao@domain.com', '0397391424', 'Long Xuyên, An Giang', 2, '10:23:19am 09/12/2022', 2460010.00, 4),
(18, 24, 'banhbao@domain.com', '0375963699', 'Cần Thơ', 2, '08:41:49am 12/12/2022', 492010.00, 4),
(19, 27, 'kim@gmail.com', '0397391424', 'Long Xuyên, An Giang', 2, '02:48:30am 21/12/2022', 370010.00, 4),
(20, 27, 'kim@gmail.com', '0397391424', '', 2, '02:53:35am 21/12/2022', 320010.00, 4),
(21, 24, 'banhbao@domain.com', '0374537453', 'Long An', 2, '05:54:40am 21/12/2022', 555010.00, 3),
(22, 24, 'banhbao@domain.com', '0374537453', '', 2, '06:07:22am 21/12/2022', 230010.00, 3),
(23, 24, 'banhbao@domain.com', '0374537453', 'Cà Mau', 2, '06:17:04am 21/12/2022', 614010.00, 3),
(24, 28, 'tykhoa_20th@student.agu.edu.vn', '123', 'Hà Nội', 2, '06:18:58am 21/12/2022', 900010.00, 3),
(25, 28, 'tykhoa_20th@student.agu.edu.vn', '123', 'An Giang', 2, '06:22:15am 21/12/2022', 190010.00, 2),
(26, 28, 'tykhoa_20th@student.agu.edu.vn', '123', 'China', 2, '06:24:45am 21/12/2022', 1440010.00, 1),
(27, 28, 'tykhoa_20th@student.agu.edu.vn', '123', 'An Giang', 2, '06:27:05am 21/12/2022', 660010.00, 3),
(28, 28, 'tykhoa_20th@student.agu.edu.vn', '123', 'Long Xuyên, An Giang', 2, '06:29:19am 21/12/2022', 921010.00, 2),
(29, 28, 'tykhoa_20th@student.agu.edu.vn', '123', 'An Giang', 2, '07:20:03am 21/12/2022', 1350010.00, 1),
(30, 28, 'tykhoa_20th@student.agu.edu.vn', '123', 'Long An', 2, '07:22:11am 21/12/2022', 921010.00, 3),
(31, 28, 'tykhoa_20th@student.agu.edu.vn', '123', 'An Giang', 2, '07:22:31am 21/12/2022', 960010.00, 3),
(32, 30, 'ykhoadeptrai@gmail.com', '0375963699', 'An Giang', 2, '07:53:14am 21/12/2022', 570010.00, 1),
(33, 30, 'ykhoadeptrai@gmail.com', '0375963699', 'An Giang', 2, '07:53:18am 21/12/2022', 570010.00, 4);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `idcart` int(11) NOT NULL,
  `idp` int(11) NOT NULL,
  `namep` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `price` double(10,2) NOT NULL DEFAULT 0.00,
  `quantity` int(5) NOT NULL,
  `thanhtien` double(20,2) NOT NULL DEFAULT 0.00,
  `idbill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`idcart`, `idp`, `namep`, `img`, `price`, `quantity`, `thanhtien`, `idbill`) VALUES
(26, 42, 'Gối Ôm OniChan', 'product-4.jpg', 1230000.00, 2, 2460000.00, 17),
(27, 44, 'Kale  Sia', 'product-5.jpg', 123000.00, 4, 492000.00, 18),
(28, 44, 'Áo Thun King', '1670910511-7.png', 185000.00, 9, 370000.00, 19),
(29, 76, 'Balo / Túi Sách 012', 'sadsa-600x600.gif', 160000.00, 2, 320000.00, 20),
(30, 44, 'Áo Thun King', '1670910511-7.png', 185000.00, 3, 555000.00, 21),
(31, 47, 'Áo Thể Thao AT10', '1670911298-RQT.png', 230000.00, 1, 230000.00, 22),
(32, 59, 'Áo Thể Thao GR02', 'Untitled-3-Recovered.png', 307000.00, 2, 614000.00, 23),
(33, 53, 'Áo Thun GUGGI', '1-29.png', 450000.00, 2, 900000.00, 24),
(34, 77, 'Áo Thể Thao Blades', 'aothethaoAT10.png', 190000.00, 1, 190000.00, 25),
(35, 45, 'Áo Thun Dark', '1670910454-5-5.png', 360000.00, 4, 1440000.00, 26),
(36, 70, 'Balo / Túi Sách 007', '1514-600x600.gif', 220000.00, 3, 660000.00, 27),
(37, 59, 'Áo Thể Thao GR02', 'Untitled-3-Recovered.png', 307000.00, 3, 921000.00, 28),
(38, 53, 'Áo Thun GUGGI', '1-29.png', 450000.00, 3, 1350000.00, 29),
(39, 59, 'Áo Thể Thao GR02', 'Untitled-3-Recovered.png', 307000.00, 3, 921000.00, 30),
(40, 52, 'Áo Thun MoTop', '20-5.png', 320000.00, 3, 960000.00, 31),
(41, 77, 'Áo Thể Thao Blades', 'aothethaoAT10.png', 190000.00, 3, 570000.00, 32);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `idcg` int(11) NOT NULL,
  `namecg` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`idcg`, `namecg`, `status`) VALUES
(36, 'Phụ Kiện', 1),
(37, 'Áo Thun', 1),
(38, 'Đồng Phục Thể Thao', 1),
(39, 'Găng Tay', 0),
(40, 'Đồng hồ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `idp` int(11) NOT NULL,
  `namep` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL DEFAULT 0.00,
  `quantity` int(20) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `info` text DEFAULT NULL,
  `view` int(20) NOT NULL DEFAULT 0,
  `idcg` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`idp`, `namep`, `price`, `quantity`, `img`, `info`, `view`, `idcg`, `status`) VALUES
(42, 'Áo Thun Darling', 178000.00, 7, '1670911177-27.png', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 0, 37, 1),
(44, 'Áo Thun King', 185000.00, 4, '1670910511-7.png', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 0, 37, 1),
(45, 'Áo Thun Dark', 360000.00, 5, '1670910454-5-5.png', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 1, 37, 1),
(46, 'Áo Thun ACT06', 257000.00, 8, '1670911237-8-3.png', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 0, 38, 1),
(47, 'Áo Thể Thao AT10', 230000.00, 5, '1670911298-RQT.png', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 2, 37, 1),
(48, 'Áo Thun Puma', 360000.00, 24, '24-1.png', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 0, 37, 1),
(50, 'Áo Thun AllColor', 210000.00, 15, '5-6.png', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 0, 37, 1),
(51, 'Áo Thun Open 2019', 167000.00, 12, '9-5.png', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 2, 37, 1),
(52, 'Áo Thun MoTop', 320000.00, 34, '20-5.png', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 2, 37, 1),
(53, 'Áo Thun GUGGI', 450000.00, 23, '1-29.png', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 4, 37, 1),
(54, 'Áo Thể Thao Juventus', 380000.00, 17, 'AdaS.png', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 0, 38, 1),
(55, 'Áo Thể Thao AL02', 290000.00, 16, 'aaaaaaaaaasas.png', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 0, 38, 1),
(57, 'Áo Thun Star', 201000.00, 17, 'FG.png', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 0, 38, 1),
(58, 'Áo Thể Thao Black', 302000.00, 19, 'asa.png', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 0, 38, 1),
(59, 'Áo Thể Thao GR02', 307000.00, 21, 'Untitled-3-Recovered.png', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 3, 38, 1),
(60, 'Áo Thể Thao Reven', 420000.00, 36, 'Untitled-3-Recovered-Recovered.png65.png', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 0, 38, 1),
(61, 'Áo Thể Thao NT02', 280000.00, 15, 'Untitled-3-Recovered-Recovered-Recovered.png23.png', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 0, 38, 1),
(63, 'Áo Thể Thao X-01', 200000.00, 13, 'Untitled-3-Recovered-Recovered-Recovered.pngsdsdas.png', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 0, 38, 1),
(64, 'Balo / Túi Sách 001', 240000.00, 14, '1671012010-12-600x600.gif', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 0, 36, 1),
(65, 'Balo / Túi Sách 002', 260000.00, 14, '54-600x600.gif', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 0, 36, 1),
(66, 'Balo / Túi Sách 003', 340000.00, 23, '415-600x600.gif', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 0, 36, 1),
(67, 'Balo / Túi Sách 004', 210000.00, 23, 'ffghgfh-600x600.gif', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 0, 36, 1),
(68, 'Balo / Túi Sách 005', 89000.00, 34, 'adf-600x600.gif', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 0, 36, 1),
(69, 'Balo / Túi Sách 006', 66000.00, 24, 'd-600x600.gif', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 0, 36, 1),
(70, 'Balo / Túi Sách 007', 220000.00, 24, '1514-600x600.gif', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 1, 36, 1),
(71, 'Balo / Túi Sách 007', 205000.00, 21, 'dsf-600x600.gif', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 0, 36, 1),
(72, 'Balo / Túi Sách 008', 209000.00, 23, 'ghj-600x600.gif', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 0, 36, 1),
(73, 'Balo / Túi Sách 009', 223000.00, 11, 'gh-600x600.gif', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 0, 36, 1),
(74, 'Balo / Túi Sách 010', 260000.00, 14, 'qsasds-600x600.gif', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 0, 36, 1),
(75, 'Balo / Túi Sách 011', 260000.00, 15, 'sds-600x600.gif', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 0, 36, 1),
(76, 'Balo / Túi Sách 012', 160000.00, 23, '1671605537-aothethaoAT10.png', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 0, 36, 1),
(77, 'Áo Thể Thao Blades', 190000.00, 8, 'aothethaoAT10.png', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 2, 38, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `tel` varchar(12) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1. kích hoạt, 0. chưa kích hoạt',
  `rule` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0. quyền lớn nhất 1. quyền nhỏ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `img`, `email`, `pass`, `tel`, `status`, `rule`) VALUES
(7, 'Trần Y Khoa', 'anhdagia.jpg', 'ykhoa@admin.com', '202cb962ac59075b964b07152d234b70', '0375963699', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_customer`
--
ALTER TABLE `account_customer`
  ADD PRIMARY KEY (`idac`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`idbill`),
  ADD KEY `idac` (`idac`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`idcart`),
  ADD KEY `idp` (`idp`),
  ADD KEY `idbill` (`idbill`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idcg`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idp`),
  ADD KEY `lk_category_product` (`idcg`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_customer`
--
ALTER TABLE `account_customer`
  MODIFY `idac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `idbill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `idcart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `idcg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `idp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`idac`) REFERENCES `account_customer` (`idac`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`idp`) REFERENCES `product` (`idp`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`idbill`) REFERENCES `bill` (`idbill`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `lk_category_product` FOREIGN KEY (`idcg`) REFERENCES `category` (`idcg`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
