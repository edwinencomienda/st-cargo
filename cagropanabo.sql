-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 14, 2021 at 07:56 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cagropanabo`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `when` date NOT NULL,
  `visual` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long` double DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `animalproduct`
--

CREATE TABLE `animalproduct` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `animal_program` int(11) NOT NULL,
  `products` varchar(88) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animalproduct`
--

INSERT INTO `animalproduct` (`id`, `animal_program`, `products`, `created_at`, `updated_at`) VALUES
(1, 1, 'Chicken', NULL, NULL),
(2, 2, 'Goat', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `animalrequest`
--

CREATE TABLE `animalrequest` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `farmer` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program` int(11) DEFAULT NULL,
  `products` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `approved` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_delivery` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animalrequest`
--

INSERT INTO `animalrequest` (`id`, `farmer`, `program`, `products`, `quantity`, `approved`, `status`, `date_delivery`, `created_at`, `updated_at`) VALUES
(1, 'e7fc52e6-62d3-11eb-ac76-8c1645215bba', 2, 2, 123, 'Approved', 'Checked', '2021-04-05', '2021-03-27 00:06:26', NULL),
(2, '6d9f7e74-5fe7-11eb-837a-8c1645215bba', 1, 1, 23, 'Approved', 'Checked', '2021-04-15', '2021-04-02 19:40:44', NULL),
(4, '1bd62451-62d4-11eb-ac76-8c1645215bba', 1, 1, 33, NULL, 'Uncheck', NULL, '2021-04-02 20:41:01', NULL),
(5, '39cf8c9d-7fda-11eb-b976-8c1645215bba', 2, 2, 55, 'Approved', 'Checked', '2021-04-15', '2021-04-03 02:04:09', NULL),
(6, '8b748f29-9492-11eb-adb7-8c1645215bba', 1, 1, 34, NULL, 'Uncheck', NULL, '2021-04-03 22:53:48', NULL),
(7, '8b748f29-9492-11eb-adb7-8c1645215bba', 1, 1, 34, NULL, 'Uncheck', NULL, '2021-04-03 22:54:44', NULL),
(8, 'fddf42cf-93b4-11eb-aad8-8c1645215bba', 1, 1, 69, NULL, 'Uncheck', NULL, '2021-04-04 11:36:12', NULL),
(9, 'fddf42cf-93b4-11eb-aad8-8c1645215bba', 2, 1, 1, NULL, 'Uncheck', NULL, '2021-04-04 11:37:16', NULL);

--
-- Triggers `animalrequest`
--
DELIMITER $$
CREATE TRIGGER `update_toinsert` AFTER UPDATE ON `animalrequest` FOR EACH ROW BEGIN

IF new.approved = "Approved" THEN 
   INSERT INTO livestockdispose(farmer,delivery_date,programs,products,quantity)
        VALUES(old.farmer, new.date_delivery, old.program,old.products,old.quantity);
END IF;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `animalservice`
--

CREATE TABLE `animalservice` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animalservice`
--

INSERT INTO `animalservice` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Poultry Farming', NULL, NULL),
(2, 'Livestock Farming', NULL, NULL),
(3, 'boucher farming', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `baranggay`
--

CREATE TABLE `baranggay` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brgy` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `baranggay`
--

INSERT INTO `baranggay` (`id`, `brgy`, `created_at`, `updated_at`) VALUES
(1, 'New Pandan', NULL, NULL),
(2, 'New Visayas', NULL, NULL),
(3, 'A. O. Floirendo', NULL, NULL),
(4, 'Datu Abdul Dadia', NULL, NULL),
(5, 'Cacao', NULL, NULL),
(6, 'Cagangohan', NULL, NULL),
(7, 'Consolacion', NULL, NULL),
(8, 'Dapco', NULL, NULL),
(9, 'Gredu', NULL, NULL),
(10, 'J.P. Laurel', NULL, NULL),
(11, 'Kasilak', NULL, NULL),
(12, 'Katipunan', NULL, NULL),
(13, 'Katualan', NULL, NULL),
(14, 'Kauswagan', NULL, NULL),
(15, 'Kiotoy', NULL, NULL),
(16, 'Little Panay', NULL, NULL),
(17, 'Lower Panaga', NULL, NULL),
(18, 'Mabunao', NULL, NULL),
(19, 'Maduao', NULL, NULL),
(20, 'Malativas', NULL, NULL),
(21, 'Manay', NULL, NULL),
(22, 'Nanyo', NULL, NULL),
(23, 'New Malaga', NULL, NULL),
(24, 'New Malitbog', NULL, NULL),
(25, 'New Pandan', NULL, NULL),
(27, 'New Visayas', NULL, NULL),
(28, 'Quezon', NULL, NULL),
(29, 'Salvacion', NULL, NULL),
(30, 'San Francisco', NULL, NULL),
(31, 'San Nicolas', NULL, NULL),
(32, 'San Pedro', NULL, NULL),
(33, 'San Roque', NULL, NULL),
(34, 'San Vicente', NULL, NULL),
(35, 'Santa Cruz', NULL, NULL),
(36, 'Santo Niño', NULL, NULL),
(37, 'Sindaton', NULL, NULL),
(38, 'Southern Davao', NULL, NULL),
(39, 'Tagpore', NULL, NULL),
(40, 'Tibungol', NULL, NULL),
(41, 'Upper Licanan', NULL, NULL),
(42, 'Waterfall', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE `consultation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `farmer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `title` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `problem` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `visual` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reading` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consultation`
--

INSERT INTO `consultation` (`id`, `farmer`, `role`, `title`, `problem`, `visual`, `reading`, `created_at`, `updated_at`) VALUES
(6, '1bd62451-62d4-11eb-ac76-8c1645215bba', 1, 'jdfjpdksg', '<p>jbhv</p>\r\n\r\n<p>fgjdsjfnjksb&#39;a</p>\r\n\r\n<p>dsaff</p>', 'public/media/220321_16_02_00.jpg', 'Read', '2021-03-22 08:00:02', NULL),
(11, 'fddf42cf-93b4-11eb-aad8-8c1645215bba', 1, 'sd', 'sds', NULL, 'Read', '2021-04-04 03:55:38', NULL),
(12, '8b748f29-9492-11eb-adb7-8c1645215bba', 2, 'Flowershop', '<p>asd</p>', 'public/media/040421_04_19_33.jpg', 'Unread', '2021-04-03 20:33:19', NULL),
(13, '513b9036-9797-11eb-aec0-8c1645215bba', 4, 'Dfjjdk', 'Akdkkfckallf', NULL, 'Unread', '2021-04-07 12:05:13', NULL),
(16, 'd2f93b3d-9b57-11eb-8e62-8c1645215bba', 3, 'edsre', '<p>qwwqerr</p>', NULL, 'Read', '2021-04-11 23:30:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cropdispose`
--

CREATE TABLE `cropdispose` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `farmer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_date` timestamp NULL DEFAULT NULL,
  `programs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `products` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `rendered` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cropdispose`
--

INSERT INTO `cropdispose` (`id`, `farmer`, `delivery_date`, `programs`, `products`, `quantity`, `rendered`, `admin`, `created_at`, `updated_at`) VALUES
(1, '7cc29332-7fdd-11eb-b976-8c1645215bba', NULL, '1', '1', 12345, 'Delivered', 'f91df6b5-5162-11eb-ad23-8c1645215bba', '2021-03-31 04:12:34', NULL),
(2, 'e7fc52e6-62d3-11eb-ac76-8c1645215bba', '2021-04-09 16:00:00', '2', '3', 12, NULL, NULL, NULL, NULL),
(3, 'e7fc52e6-62d3-11eb-ac76-8c1645215bba', '2021-04-09 16:00:00', '2', '3', 12, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cropenrollment`
--

CREATE TABLE `cropenrollment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enrollment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cropinventory`
--

CREATE TABLE `cropinventory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `crop_program` int(11) DEFAULT NULL,
  `crop_product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cropinventory`
--

INSERT INTO `cropinventory` (`id`, `crop_program`, `crop_product`, `qty`, `admin`, `created_at`, `updated_at`) VALUES
(2, 1, '1', 123, 'f91df6b5-5162-11eb-ad23-8c1645215bba', '2021-03-31 00:44:55', NULL),
(3, 3, '2', 1255, 'f91df6b5-5162-11eb-ad23-8c1645215bba', '2021-03-31 01:05:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cropproduct`
--

CREATE TABLE `cropproduct` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `crop_program` int(11) NOT NULL,
  `products` varchar(88) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cropproduct`
--

INSERT INTO `cropproduct` (`id`, `crop_program`, `products`, `created_at`, `updated_at`) VALUES
(1, 1, 'Oats', '2021-03-26 00:42:01', NULL),
(2, 3, 'Gemelina', '2021-03-26 01:10:54', NULL),
(3, 2, 'Carrots', '2021-03-26 05:03:32', NULL),
(4, 4, 'Saba', '2021-03-26 05:03:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `croprequest`
--

CREATE TABLE `croprequest` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `farmer` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program` int(11) DEFAULT NULL,
  `products` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `approved` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(35) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `croprequest`
--

INSERT INTO `croprequest` (`id`, `farmer`, `program`, `products`, `quantity`, `approved`, `status`, `delivery_date`, `created_at`, `updated_at`) VALUES
(1, '2f5a2c71-5fe7-11eb-837a-8c1645215bba', 2, 3, 12345, 'Approved', 'Checked', '2021-04-01', '2021-03-26 06:58:46', NULL),
(2, '7cc29332-7fdd-11eb-b976-8c1645215bba', 1, 1, 123, 'Approved', 'Checked', '2021-04-07', '2021-03-26 06:59:11', NULL),
(4, 'ccd64dde-8f29-11eb-b8e0-8c1645215bba', 3, 2, 23, 'Approved', 'Checked', '2021-04-06', '2021-03-31 02:10:32', NULL),
(5, '393cdc71-8135-11eb-be32-8c1645215bba', 2, 3, 1552, 'Approved', 'Checked', '2021-04-07', '2021-03-31 02:17:50', NULL),
(6, '29d61ee8-7fdb-11eb-b976-8c1645215bba', 2, 3, 34, NULL, 'Uncheck', NULL, '2021-03-31 02:56:11', NULL),
(7, 'e7fc52e6-62d3-11eb-ac76-8c1645215bba', 2, 3, 12, 'Approved', 'Checked', '2021-04-10', '2021-03-31 02:57:34', NULL),
(8, '524838a4-62d4-11eb-ac76-8c1645215bba', 1, 1, 12, 'Approved', 'Checked', '2021-03-04', '2021-03-31 02:58:55', NULL),
(9, '8b748f29-9492-11eb-adb7-8c1645215bba', 1, 1, 23, NULL, 'Uncheck', NULL, '2021-04-03 22:42:27', NULL),
(10, 'fddf42cf-93b4-11eb-aad8-8c1645215bba', 4, 4, 99, NULL, 'Uncheck', NULL, '2021-04-04 12:59:48', NULL);

--
-- Triggers `croprequest`
--
DELIMITER $$
CREATE TRIGGER `after_update_crop` AFTER UPDATE ON `croprequest` FOR EACH ROW BEGIN

IF new.approved = "Approved" THEN 
   INSERT INTO cropdispose(farmer,delivery_date,programs,products,quantity)
        VALUES(old.farmer, new.delivery_date, old.program,old.products,old.quantity);
END IF;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cropservice`
--

CREATE TABLE `cropservice` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `crop_detail` varchar(85) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cropservice`
--

INSERT INTO `cropservice` (`id`, `crop_detail`, `created_at`, `updated_at`) VALUES
(1, 'Cereals', '2021-03-25 20:58:31', NULL),
(2, 'High Value Commercial Crops', '2021-03-25 20:59:51', NULL),
(3, 'Agroforestry', '2021-03-25 21:03:30', NULL),
(4, 'Banana', '2021-03-25 21:07:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `disposaltractor`
--

CREATE TABLE `disposaltractor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `farmer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_date` timestamp NULL DEFAULT NULL,
  `service_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tractor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tractor_status` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_ret` date DEFAULT NULL,
  `admin_ret` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `disposaltractor`
--

INSERT INTO `disposaltractor` (`id`, `farmer`, `delivery_date`, `service_type`, `tractor`, `quantity`, `admin`, `tractor_status`, `date_ret`, `admin_ret`, `created_at`, `updated_at`) VALUES
(1, NULL, '2021-04-07 16:00:00', '1', 'diskkkkee', 1, 'bc73f082-5109-11eb-8bee-8c1645215bba', 'Return', '2021-04-12', 'bc73f082-5109-11eb-8bee-8c1645215bba', NULL, NULL),
(2, NULL, NULL, '2', 'Harrow-21', 5, 'bc73f082-5109-11eb-8bee-8c1645215bba', 'Unreturn', NULL, '', NULL, NULL),
(5, 'bc73f082-5109-11eb-8bee-8c1645215bba', '2021-02-13 16:00:00', '1', 'Tractor-1', 1, 'bc73f082-5109-11eb-8bee-8c1645215bba', NULL, NULL, '', NULL, NULL),
(10, 'bc73f082-5109-11eb-8bee-8c1645215bba', '2021-02-13 16:00:00', '1', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL),
(11, 'bc73f082-5109-11eb-8bee-8c1645215bba', '2021-02-13 16:00:00', '1', 'Tractor-1', 1, 'bc73f082-5109-11eb-8bee-8c1645215bba', 'Return', '2021-04-12', 'bc73f082-5109-11eb-8bee-8c1645215bba', NULL, NULL),
(12, 'bc73f082-5109-11eb-8bee-8c1645215bba', '2021-04-06 16:00:00', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'bc73f082-5109-11eb-8bee-8c1645215bba', '2021-04-06 16:00:00', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, '8b748f29-9492-11eb-adb7-8c1645215bba', '2021-04-10 16:00:00', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employeeprofile`
--

CREATE TABLE `employeeprofile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date DEFAULT NULL,
  `undergrad` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `graduate` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postgrad` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employeeprofile`
--

INSERT INTO `employeeprofile` (`id`, `uuid`, `fname`, `mname`, `lname`, `birth_date`, `undergrad`, `graduate`, `postgrad`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Ayosin', 'Maharlika', 'Tilos', '1991-12-30', 'Bachelor of Science in Agriculture', 'None', 'None', NULL, NULL),
(3, 'f91df6b5-5162-11eb-ad23-8c1645215bba', 'dsghdghf', '112', 'lll', '2021-02-03', 'Bachelor of Science in Agriculture', 'None', 'Doctor of Anime', '2021-02-28 11:57:56', NULL),
(4, 'bc73f082-5109-11eb-8bee-8c1645215bba', 'Adriel', 'Balinang', 'Tilos', '1991-12-30', 'Bachelor of Science in Agriculture', 'Master of Science in Animal Science', 'Doctor of Science in Animal Science', '2021-03-26 03:43:52', NULL),
(5, 'a1f72fd5-9875-11eb-b0ac-8c1645215bba', 'Marshall', 'B.', 'Marshall', '1991-12-31', 'BSIT', 'MIT', 'DIT', '2021-04-08 14:23:57', NULL),
(6, 'cfa52190-9876-11eb-b0ac-8c1645215bba', 'Plant', 'Apias', 'Magtatanim', '1993-06-18', 'BS in Agriculture', 'NONE', 'NONE', '2021-04-08 14:31:45', NULL),
(7, 'd97b992f-9b48-11eb-8e62-8c1645215bba', 'Gold', 'D.', 'Roger', '2021-04-13', 'BSIT', 'NONE', 'NONE', '2021-04-12 04:38:54', NULL);

--
-- Triggers `employeeprofile`
--
DELIMITER $$
CREATE TRIGGER `beforeemployee` BEFORE INSERT ON `employeeprofile` FOR EACH ROW set NEW.created_at = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `farmer` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parcel` int(3) DEFAULT NULL,
  `program` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sources` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` varchar(115) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `markings` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latt` double DEFAULT NULL,
  `longi` double DEFAULT NULL,
  `parsid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`id`, `farmer`, `parcel`, `program`, `sources`, `approved`, `status`, `admin`, `created_at`, `updated_at`, `markings`, `latt`, `longi`, `parsid`) VALUES
(3, 'bdd76f0b-8f67-11eb-889d-8c1645215bba', NULL, '3', NULL, NULL, 'Uncheck', NULL, '2021-03-28 21:36:42', NULL, '', 0, NULL, NULL),
(4, 'bdd76f0b-8f67-11eb-889d-8c1645215bba', NULL, '3', NULL, 'Approved', 'Checked', 'ebd4457e-8e98-11eb-b8e0-8c1645215bba', '2021-03-28 21:40:37', NULL, 'Good', 7.2941728163641, 125.68906489251, NULL),
(6, 'bdd76f0b-8f67-11eb-889d-8c1645215bba', NULL, '4', NULL, NULL, 'Uncheck', NULL, '2021-03-28 21:49:24', NULL, '', 0, NULL, NULL),
(8, 'fddf42cf-93b4-11eb-aad8-8c1645215bba', 2, '3', NULL, NULL, 'Uncheck', NULL, '2021-04-04 04:37:41', NULL, 'Good', 7.2941728163641, 125.68906489251, NULL),
(9, 'fddf42cf-93b4-11eb-aad8-8c1645215bba', NULL, '3', NULL, NULL, 'Uncheck', NULL, '2021-04-04 04:50:05', NULL, '', 0, NULL, NULL),
(10, 'bdd76f0b-8f67-11eb-889d-8c1645215bba', NULL, '2', NULL, NULL, 'Uncheck', NULL, '2021-04-06 00:17:01', NULL, NULL, NULL, NULL, NULL),
(12, 'bdd76f0b-8f67-11eb-889d-8c1645215bba', 6, '3', 'Sea / Fish Cage', 'Approved', 'Checked', 'ebd4457e-8e98-11eb-b8e0-8c1645215bba', '2021-04-06 23:00:01', NULL, 'Good', 7.259219, 125.728023, NULL),
(13, 'bdd76f0b-8f67-11eb-889d-8c1645215bba', 7, '2', NULL, 'Approved', 'Checked', 'f91df6b5-5162-11eb-ad23-8c1645215bba', '2021-04-06 23:33:35', NULL, NULL, NULL, NULL, NULL),
(14, 'bdd76f0b-8f67-11eb-889d-8c1645215bba', 32, '3', 'Sea / Fish Cage', 'Approved', 'Checked', 'ebd4457e-8e98-11eb-b8e0-8c1645215bba', '2021-04-06 23:55:42', NULL, NULL, NULL, NULL, NULL),
(15, '513b9036-9797-11eb-aec0-8c1645215bba', NULL, '2', NULL, NULL, 'Uncheck', NULL, '2021-04-07 11:57:44', NULL, NULL, NULL, NULL, NULL),
(16, '513b9036-9797-11eb-aec0-8c1645215bba', NULL, '3', NULL, NULL, 'Uncheck', NULL, '2021-04-07 12:01:19', NULL, NULL, NULL, NULL, NULL),
(17, '513b9036-9797-11eb-aec0-8c1645215bba', NULL, '3', NULL, NULL, 'Uncheck', NULL, '2021-04-07 12:01:24', NULL, NULL, NULL, NULL, NULL),
(18, '513b9036-9797-11eb-aec0-8c1645215bba', NULL, '4', NULL, NULL, 'Uncheck', NULL, '2021-04-07 12:01:35', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `farmerparttwo`
--

CREATE TABLE `farmerparttwo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `livelihood` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `farmactivity` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `othercrop` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `livestock` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poultry` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kindwork` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otherwork` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fishwork` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otherfish` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `farmgross` double(10,2) NOT NULL,
  `nonfarmgrass` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `farmerparttwo`
--

INSERT INTO `farmerparttwo` (`id`, `uuid`, `livelihood`, `farmactivity`, `othercrop`, `livestock`, `poultry`, `kindwork`, `otherwork`, `fishwork`, `otherfish`, `farmgross`, `nonfarmgrass`, `created_at`, `updated_at`) VALUES
(1, '524838a4-62d4-11eb-ac76-8c1645215bba', 'Farmer', 'Rice', NULL, NULL, NULL, 'Planting/Transplanting', NULL, NULL, NULL, 233421.00, 12.00, NULL, NULL),
(3, '393cdc71-8135-11eb-be32-8c1645215bba', 'Farmworker/Laborer', NULL, NULL, NULL, NULL, 'Others', 'qwqe', NULL, NULL, 12134.00, 1.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `farmerpersonal`
--

CREATE TABLE `farmerpersonal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pwd` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `porpis` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aypis` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ayp_detail` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gov_id` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gov_detail` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `househead` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nohousehead` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `householdrel` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noofmen` int(11) DEFAULT NULL,
  `maleno` int(11) DEFAULT NULL,
  `femaleno` int(11) DEFAULT NULL,
  `coop` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coopdetail` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contactno` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `farmerpersonal`
--

INSERT INTO `farmerpersonal` (`id`, `uuid`, `education`, `pwd`, `porpis`, `aypis`, `ayp_detail`, `religion`, `status`, `spouse`, `mother`, `gov_id`, `gov_detail`, `househead`, `nohousehead`, `householdrel`, `noofmen`, `maleno`, `femaleno`, `coop`, `coopdetail`, `emergency`, `contactno`, `created_at`, `updated_at`) VALUES
(1, '524838a4-62d4-11eb-ac76-8c1645215bba', 'Elementary', 'No', 'No', 'Yes', NULL, 'Christian', 'Single', NULL, 'For H', 'No', NULL, 'Yes', NULL, NULL, 4, 2, 2, 'No', NULL, 'Tyygw', '123345', NULL, NULL),
(2, '393cdc71-8135-11eb-be32-8c1645215bba', 'College', 'No', 'No', 'No', NULL, 'Christian', 'Single', NULL, 'wrewr', 'Yes', 'PhilHealth', 'No', 'Gggsdghsf', 'Father', 6, 3, 3, 'No', NULL, 'Tyygw', '11344', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `farmerprofile`
--

CREATE TABLE `farmerprofile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `farm_exi` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_no` varchar(88) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idpicture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `houseno` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brgy` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `birthplace` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `farmerprofile`
--

INSERT INTO `farmerprofile` (`id`, `uuid`, `farm_exi`, `ref_no`, `idpicture`, `lname`, `fname`, `mname`, `exname`, `gender`, `houseno`, `street`, `brgy`, `city`, `province`, `contact`, `birthdate`, `birthplace`, `created_at`, `updated_at`) VALUES
(27, '6d9f7e74-5fe7-11eb-837a-8c1645215bba', NULL, NULL, 'public/media/270121_18_58_16.jpg', 'ggh', '62637', '12', 're', 'Male', '11223', '113', '1', 'Panabo', 'Davao del Norte', '21324', '2019-12-31', 'weewretryy', NULL, NULL),
(28, '2f5a2c71-5fe7-11eb-837a-8c1645215bba', NULL, NULL, 'public/media/060221_20_44_07.jpg', 'lppo', 'uuu', 'iiooio', 'll', 'Male', '13344', '113', '1', 'Panabo', 'Davao del Norte', '28782377246', '2021-12-31', '2335326', NULL, NULL),
(29, '524838a4-62d4-11eb-ac76-8c1645215bba', NULL, NULL, 'public/media/080221_03_19_09.jpg', 'Tilos', 'Adriel', 'B', 'Jr.', 'Male', '123', 'Kamia', '1', 'Panabo', 'Davao del Norte', '344556455', '2021-02-24', 'fwrqwrw', NULL, NULL),
(30, 'e7fc52e6-62d3-11eb-ac76-8c1645215bba', NULL, NULL, 'public/media/060321_05_29_24.jpg', 't', '1', '3', '23', 'Male', '123', '1', '1', 'Panabo', 'Davao del Norte', '1234556632', '2021-03-10', 'fwrqwrw', NULL, NULL),
(31, '393cdc71-8135-11eb-be32-8c1645215bba', 'Existing', 'qw133445ww13jjshf', 'public/media/150321_05_22_51.jpg', 'yyyeqew', 'qwqe', 'ehweyye', NULL, 'Male', '1234', '2ewe', '1', 'Panabo', 'Davao del Norte', '112334', '2021-03-05', '2134', NULL, NULL),
(32, '3c3d4a26-8f7a-11eb-b2cb-8c1645215bba', 'New', '25345253', 'public/media/280321_10_08_53.jpg', 'Maysala', 'Ako', 'Man', '23', 'Male', '123', '1', '1', 'Panabo', 'Davao del Norte', '1234556632', '1991-07-28', 'JHJHDqe', NULL, NULL),
(33, 'b9e5404e-8fe1-11eb-a353-8c1645215bba', NULL, NULL, NULL, 'dsd', 'sdsd', 'V', 'ds', 'Male', 'dsdss', 'dsds', 'dsds', 'sdsd', 'sds', '2323232323', '2021-03-04', 'dsdsddd', '2021-03-28 16:22:01', NULL),
(34, '568fc50e-93a9-11eb-aad8-8c1645215bba', NULL, NULL, NULL, 'Alibanggo', 'Alvin', 'V', 'null', 'Male', '546', 'Purok 2', 'Mabunao', 'Panabo', 'Davao Del Norte', '09098357153', '1995-09-05', 'Mabunao P.C.', '2021-04-02 11:48:30', NULL),
(35, 'fddf42cf-93b4-11eb-aad8-8c1645215bba', NULL, NULL, NULL, 'Sustituido', 'Allen', 'F', '', 'Male', 'we', 'eww', 'eww', 'ew', 'weww', '09098357153', '2021-03-12', 'P.C', '2021-04-02 13:11:55', NULL),
(36, '8b748f29-9492-11eb-adb7-8c1645215bba', NULL, NULL, 'public/media/030421_17_55_01.jpg', 'Tilos', 'Adriel', 'Balinang', NULL, 'Male', '2112', 'Yakal', '1', 'Panabo', 'Davao del Norte', '1234556632', '1991-12-30', 'New Pandan Panabo City', NULL, NULL),
(37, 'bdd76f0b-8f67-11eb-889d-8c1645215bba', NULL, NULL, 'public/media/060421_06_38_59.jpg', 'B', 'Agri', 'Ako', NULL, 'Male', '223', 'Yakal', '11', 'Panabo', 'Davao del Norte', '13444', '2021-04-13', '3er2', NULL, NULL),
(38, '513b9036-9797-11eb-aec0-8c1645215bba', NULL, NULL, NULL, 'Mendaros', 'Edwin', 'L', 'Jun', 'Male', '123', 'Purok 1', 'New loon', 'Asuncion', 'Davao del Norte', '09306342668', '1994-11-09', 'Asuncion davao del norte', '2021-04-07 11:49:32', NULL),
(39, '01d4c456-9798-11eb-aec0-8c1645215bba', NULL, NULL, NULL, 'Lubiano', 'Frann', 'P', '', 'Male', '134', 'Purok 4', 'Gabi', 'Compostela', 'Davao de Oro', '09995520183', '1999-05-25', 'Panabo ', '2021-04-07 11:54:29', NULL),
(40, '87ec8deb-9b49-11eb-8e62-8c1645215bba', 'New', '1234455', 'public/media/120421_04_17_46.jpg', 'Alpha', 'Bronze', NULL, NULL, 'Male', '1234', 'Paga', '31', 'Panabo', 'Davao del Norte', '1313445', '2021-03-28', 'Hahaha', NULL, NULL),
(41, 'd2f93b3d-9b57-11eb-8e62-8c1645215bba', NULL, NULL, 'public/media/120421_06_45_27.jpg', 'Ko', 'Ako', 'd', NULL, 'Male', '123', 'yakal', '31', 'Panabo', 'Davao del Norte', '7275630', '2021-04-07', 'ewrt', NULL, NULL),
(42, 'd99e6a7e-9cf1-11eb-8cb6-8c1645215bba', NULL, NULL, 'public/media/140421_07_59_23.jpg', 'Zone', 'Friend', 'M', 'Jr', 'Male', '2331', 'New Pandan', '6', 'Panabo', 'Davao del Norte', '23872464', '2020-12-08', 'qihuwuewr', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `farmparcel`
--

CREATE TABLE `farmparcel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agrarian` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hectare` double(8,5) NOT NULL,
  `ownership` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otherown` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tenant` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lesse` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `markings` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latt` double DEFAULT NULL,
  `longi` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `farmparcel`
--

INSERT INTO `farmparcel` (`id`, `uuid`, `agrarian`, `location`, `hectare`, `ownership`, `owner`, `otherown`, `tenant`, `lesse`, `created_at`, `updated_at`, `markings`, `latt`, `longi`) VALUES
(1, '393cdc71-8135-11eb-be32-8c1645215bba', 'Yes', '1', 126.00000, 'Registered Owner', '12344', NULL, NULL, NULL, NULL, NULL, 'Good', 7.296809901819685, 125.69237496959171),
(2, '393cdc71-8135-11eb-be32-8c1645215bba', 'No', '2', 341.00000, 'Registered Owner', '2134', NULL, NULL, NULL, NULL, NULL, 'Good', 7.291607272834597, 125.66764469711546),
(3, 'fddf42cf-93b4-11eb-aad8-8c1645215bba', 'Yes', '1', 1.00000, 'Registered Owner', '2344', NULL, NULL, NULL, NULL, NULL, 'Good', 7.289837544930393, 125.68391275241385),
(4, 'fddf42cf-93b4-11eb-aad8-8c1645215bba', NULL, '2', 1.00000, 'Tenant', '1334', NULL, 'Alvin', NULL, NULL, NULL, 'Good', 7.294172816364053, 125.68906489251307),
(5, 'bdd76f0b-8f67-11eb-889d-8c1645215bba', 'No', '6', 12.00000, 'Registered Owner', '212366381', NULL, NULL, NULL, NULL, NULL, 'Good', 7.259219, 125.728023),
(7, 'bdd76f0b-8f67-11eb-889d-8c1645215bba', NULL, '16', 4.00000, 'Lessee', '55656545', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'bdd76f0b-8f67-11eb-889d-8c1645215bba', NULL, '32', 3.00000, 'Others', '134551', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '87ec8deb-9b49-11eb-8e62-8c1645215bba', 'Yes', '31', 12.00000, 'Registered Owner', '21324455', NULL, NULL, NULL, NULL, NULL, 'Good', 7.256958, 125.622995);

-- --------------------------------------------------------

--
-- Table structure for table `fishdispose`
--

CREATE TABLE `fishdispose` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `farmer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_date` timestamp NULL DEFAULT NULL,
  `programs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `products` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `rendered` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fishdispose`
--

INSERT INTO `fishdispose` (`id`, `farmer`, `delivery_date`, `programs`, `products`, `quantity`, `rendered`, `admin`, `created_at`, `updated_at`) VALUES
(2, '757797c0-62fc-11eb-ac76-8c1645215bba', '2021-04-13 16:00:00', '1', '1', 444, 'Delivered', 'ebd4457e-8e98-11eb-b8e0-8c1645215bba', '2021-04-02 20:24:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fishinventory`
--

CREATE TABLE `fishinventory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program` int(11) DEFAULT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fishinventory`
--

INSERT INTO `fishinventory` (`id`, `program`, `product`, `qty`, `admin`, `created_at`, `updated_at`) VALUES
(1, 1, '1', 12, 'ebd4457e-8e98-11eb-b8e0-8c1645215bba', '2021-04-01 22:03:13', NULL),
(2, 2, '2', 123, 'ebd4457e-8e98-11eb-b8e0-8c1645215bba', '2021-04-01 22:14:08', NULL),
(3, 1, '1', 2, 'ebd4457e-8e98-11eb-b8e0-8c1645215bba', '2021-04-01 22:15:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fishproduct`
--

CREATE TABLE `fishproduct` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fish_program` int(11) NOT NULL,
  `products` varchar(88) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fishproduct`
--

INSERT INTO `fishproduct` (`id`, `fish_program`, `products`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bangus', NULL, NULL),
(2, 2, 'Tilapia', NULL, NULL),
(3, 3, 'Wooden Banca', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fishrequest`
--

CREATE TABLE `fishrequest` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `farmer` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program` int(11) DEFAULT NULL,
  `products` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `approved` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_delivery` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fishrequest`
--

INSERT INTO `fishrequest` (`id`, `farmer`, `program`, `products`, `quantity`, `approved`, `status`, `date_delivery`, `created_at`, `updated_at`) VALUES
(1, '90fe3d0c-5b35-11eb-8df9-8c1645215bba', 1, 1, 424, 'Approved', 'Checked', '2021-04-19', '2021-03-26 18:52:06', NULL),
(2, '757797c0-62fc-11eb-ac76-8c1645215bba', 1, 1, 123, 'Approved', 'Checked', '2021-04-14', '2021-03-31 09:56:07', NULL),
(4, '2f5a2c71-5fe7-11eb-837a-8c1645215bba', 3, 3, 1, NULL, 'Uncheck', NULL, '2021-03-31 11:00:16', NULL),
(5, '4cce1b54-7fdd-11eb-b976-8c1645215bba', 1, 1, 123, 'Approved', 'Checked', '2021-04-29', '2021-04-01 05:50:49', NULL),
(6, '8b748f29-9492-11eb-adb7-8c1645215bba', 1, 1, 12, NULL, 'Uncheck', NULL, '2021-04-03 23:01:06', NULL),
(7, 'fddf42cf-93b4-11eb-aad8-8c1645215bba', 3, 1, 5, NULL, 'Uncheck', NULL, '2021-04-04 13:09:59', NULL),
(8, 'fddf42cf-93b4-11eb-aad8-8c1645215bba', 3, 1, 99, NULL, 'Uncheck', NULL, '2021-04-04 13:10:51', NULL);

--
-- Triggers `fishrequest`
--
DELIMITER $$
CREATE TRIGGER `fish_request_todispose` AFTER UPDATE ON `fishrequest` FOR EACH ROW BEGIN

IF new.approved = "Approved" THEN 
   INSERT INTO fishdispose(farmer,delivery_date,programs,products,quantity)
        VALUES(old.farmer, new.date_delivery, old.program,old.products,old.quantity);
END IF;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `fishservice`
--

CREATE TABLE `fishservice` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fishservice`
--

INSERT INTO `fishservice` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Marine Fishing Program', NULL, NULL),
(2, 'Inland Fishing Program', NULL, NULL),
(3, 'Boat Service', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `livestockdispose`
--

CREATE TABLE `livestockdispose` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `farmer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_date` timestamp NULL DEFAULT NULL,
  `programs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `products` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `rendered` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `livestockinventory`
--

CREATE TABLE `livestockinventory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program` int(11) DEFAULT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `livestockinventory`
--

INSERT INTO `livestockinventory` (`id`, `program`, `product`, `qty`, `admin`, `created_at`, `updated_at`) VALUES
(1, 1, '1', 123, '06fd4904-8eab-11eb-b8e0-8c1645215bba', '2021-04-03 00:34:40', NULL),
(2, 1, '1', 12, '06fd4904-8eab-11eb-b8e0-8c1645215bba', '2021-04-03 00:35:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loanrequest`
--

CREATE TABLE `loanrequest` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `farmer` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) DEFAULT NULL,
  `amount` double(55,2) NOT NULL,
  `approved` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `approved_on` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loanrequest`
--

INSERT INTO `loanrequest` (`id`, `farmer`, `role`, `amount`, `approved`, `status`, `admin`, `created_at`, `updated_at`, `approved_on`) VALUES
(3, '757797c0-62fc-11eb-ac76-8c1645215bba', NULL, 888113.00, 'Approved', 'Checked', 'f91df6b5-5162-11eb-ad23-8c1645215bba', '2021-03-26 09:00:32', NULL, '2021-03-19'),
(4, '29d61ee8-7fdb-11eb-b976-8c1645215bba', NULL, 3455.00, NULL, 'Uncheck', NULL, '2021-03-31 05:36:48', NULL, NULL),
(5, '8b748f29-9492-11eb-adb7-8c1645215bba', NULL, 5546655.00, NULL, 'Uncheck', NULL, '2021-04-03 23:29:30', NULL, NULL),
(6, 'fddf42cf-93b4-11eb-aad8-8c1645215bba', NULL, 1000.00, NULL, 'Uncheck', NULL, '2021-04-04 13:25:44', NULL, NULL),
(7, '513b9036-9797-11eb-aec0-8c1645215bba', NULL, 1000.00, NULL, 'Uncheck', NULL, '2021-04-07 11:50:53', NULL, NULL),
(8, 'ccd64dde-8f29-11eb-b8e0-8c1645215bba', NULL, 2.00, NULL, 'Uncheck', NULL, '2021-04-11 21:56:10', NULL, NULL),
(9, '6d9f7e74-5fe7-11eb-837a-8c1645215bba', NULL, 1.00, 'Approved', 'Checked', '06fd4904-8eab-11eb-b8e0-8c1645215bba', '2021-04-11 21:57:35', NULL, '2021-04-12'),
(10, '524838a4-62d4-11eb-ac76-8c1645215bba', NULL, 5.00, NULL, 'Uncheck', NULL, '2021-04-11 21:58:55', NULL, NULL),
(11, 'e7fc52e6-62d3-11eb-ac76-8c1645215bba', NULL, 12345.00, 'Approved', 'Checked', 'ebd4457e-8e98-11eb-b8e0-8c1645215bba', '2021-04-11 22:12:55', NULL, '2021-04-12'),
(12, 'd2f93b3d-9b57-11eb-8e62-8c1645215bba', NULL, 58888.00, NULL, 'Uncheck', NULL, '2021-04-12 00:04:07', NULL, NULL),
(13, 'd2f93b3d-9b57-11eb-8e62-8c1645215bba', NULL, 5555566.00, NULL, 'Uncheck', NULL, '2021-04-12 00:04:17', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_01_11_072245_create_profilepicture_table', 2),
(5, '2021_01_11_125840_create_profpicture_table', 3),
(6, '2021_01_13_071038_create_employeeprofile_table', 4),
(7, '2021_01_26_143633_create_farmerprofiles_table', 5),
(8, '2021_01_26_143941_create_farmerprofile_table', 5),
(9, '2021_01_27_085758_create_baranggay_table', 6),
(10, '2021_01_27_182250_create_farmerpersonal_table', 7),
(11, '2021_01_28_070820_create_farmprofiletwotable', 8),
(12, '2021_01_28_071333_create_farmerparttwo_table', 8),
(13, '2021_01_29_021130_create_flights_table', 9),
(14, '2021_01_29_021428_create_tractorrequest_table', 9),
(15, '2021_01_29_030428_create_tractorservice_table', 10),
(16, '2021_01_29_030910_create_tractorinventory_table', 11),
(17, '2021_02_02_055049_create_noticenbills_table', 12),
(18, '2021_02_02_062927_create_disposaltractor_table', 12),
(19, '2021_02_02_082152_create_trinventory_table', 13),
(20, '2021_02_03_061240_create_consultation_table', 14),
(21, '2021_02_04_053335_create_reply_table', 15),
(22, '2021_02_06_013138_create_tutorials_table', 16),
(23, '2021_02_06_194845_create_activity_table', 17),
(24, '2021_02_07_070923_create_outlets_table', 18),
(25, '2021_02_07_201739_create_cropenrollment_table', 19),
(26, '2021_03_07_100354_create_referencing_table', 20),
(27, '2021_03_15_121729_create_farmparcel_table', 21),
(28, '2021_03_19_053542_create_parcelanimal_table', 22),
(29, '2021_03_21_085750_create_trashdetails_table', 23),
(30, '2021_03_22_100936_create_trashdelete_table', 24),
(31, '2021_03_26_042557_create_cropservice_table', 25),
(32, '2021_03_26_063423_create_cropproduct_table', 26),
(36, '2021_03_26_092105_create_croprequest_table', 27),
(37, '2021_03_26_092355_create_enrollment_table', 27),
(38, '2021_03_26_093844_create_loanrequest_table', 27),
(39, '2021_03_27_013105_create_fishservice_table', 28),
(40, '2021_03_27_013219_create_fishproduct_table', 28),
(41, '2021_03_27_013310_create_fishrequest_table', 28),
(42, '2021_03_27_025846_create_animalservice_table', 29),
(43, '2021_03_27_030405_create_animalproduct_table', 29),
(44, '2021_03_27_030451_create_animalrequest_table', 29),
(45, '2021_03_31_074241_create_cropinventory_table', 30),
(46, '2021_03_31_090941_create_cropdispose_table', 31),
(47, '2021_04_01_102522_create_fishdispose_table', 32),
(48, '2021_04_01_103212_create_fishinventory_table', 32),
(49, '2021_04_01_103553_create_livestockdispose_table', 32),
(50, '2021_04_01_103747_create_livestockinventory_table', 32);

-- --------------------------------------------------------

--
-- Table structure for table `noticenbills`
--

CREATE TABLE `noticenbills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `farmer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `requestrole` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noticeid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `noticenbills`
--

INSERT INTO `noticenbills` (`id`, `farmer`, `admin`, `requestrole`, `noticeid`, `approved`, `description`, `created_at`, `updated_at`) VALUES
(1, 'bc73f082-5109-11eb-8bee-8c1645215bba', NULL, 'Your Tractor Request has been Approved', '10', NULL, 'Please pay the amount of 103068.00into City Cashier\'s Office!', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `outlets`
--

CREATE TABLE `outlets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` int(11) DEFAULT NULL,
  `outlet_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `outlet_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `outlet_latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `outlet_longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `outlets`
--

INSERT INTO `outlets` (`id`, `role`, `outlet_name`, `outlet_address`, `outlet_latitude`, `outlet_longitude`, `created_at`, `updated_at`) VALUES
(1, NULL, 'qwqw`', 'Cagangohan Panabo City', '125.683258', '1', '2021-03-05 21:17:18', '2021-03-05 21:17:18');

-- --------------------------------------------------------

--
-- Table structure for table `parcelanimal`
--

CREATE TABLE `parcelanimal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(111) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parcel` int(11) NOT NULL,
  `animal` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` double(8,5) NOT NULL,
  `heads` int(11) NOT NULL,
  `farmtype` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organi` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parcelanimal`
--

INSERT INTO `parcelanimal` (`id`, `uuid`, `parcel`, `animal`, `size`, `heads`, `farmtype`, `organi`, `created_at`, `updated_at`) VALUES
(1, 'bdd76f0b-8f67-11eb-889d-8c1645215bba', 5, 'Bangus', 4.00000, 156, 'Irrigated', 'Y', NULL, NULL),
(2, '87ec8deb-9b49-11eb-8e62-8c1645215bba', 9, 'Dragon', 2.00000, 2, 'Irrigated', 'Y', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profpicture`
--

CREATE TABLE `profpicture` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profpic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profpicture`
--

INSERT INTO `profpicture` (`id`, `uuid`, `profpic`, `created_at`, `updated_at`) VALUES
(20, 'bc73f082-5109-11eb-8bee-8c1645215bba', 'public/media/130121_06_16_30.jpg', NULL, NULL),
(21, 'bc73f082-5109-11eb-8bee-8c1645215bba', 'public/media/130121_06_17_38.jpg', NULL, NULL),
(23, 'f1e76a23-5654-11eb-aca3-8c1645215bba', 'public/media/190121_13_36_49.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `referencing`
--

CREATE TABLE `referencing` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` varchar(188) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_ex` varchar(188) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_no` varchar(88) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_app` varchar(188) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `conid` int(11) DEFAULT NULL,
  `farmer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anstitle` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ansvisual` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ansproblem` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `reading` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`id`, `conid`, `farmer`, `anstitle`, `ansvisual`, `ansproblem`, `role`, `reading`, `admin`, `created_at`, `updated_at`) VALUES
(1, 6, '1bd62451-62d4-11eb-ac76-8c1645215bba', 'adjbshd', 'public/media/230321_13_43_31.jpg', '<p>sdsf</p>', 1, NULL, 'bc73f082-5109-11eb-8bee-8c1645215bba', '2021-03-23 05:31:44', NULL),
(2, NULL, 'bc73f082-5109-11eb-8bee-8c1645215bba', 'Admins Notifications', NULL, 'wjhwrt', 1, NULL, 'bc73f082-5109-11eb-8bee-8c1645215bba', '2021-03-25 17:18:59', NULL),
(3, 9, 'fddf42cf-93b4-11eb-aad8-8c1645215bba', 'TUBAG SA PROBLEMA', 'public/media/030421_16_34_41.jpg', '<p>PAGGYM LAGI!!</p>', 2, NULL, 'f91df6b5-5162-11eb-ad23-8c1645215bba', '2021-04-03 08:41:35', NULL),
(4, 10, '8b748f29-9492-11eb-adb7-8c1645215bba', 'Hello mao na ni', 'public/media/040421_03_10_31.jpg', '<p>Mao ni siya,,&nbsp;</p>', 2, NULL, 'f91df6b5-5162-11eb-ad23-8c1645215bba', '2021-04-03 19:31:10', NULL),
(9, 16, 'd2f93b3d-9b57-11eb-8e62-8c1645215bba', 'wewr', NULL, '<p>wrer</p>', 3, NULL, 'ebd4457e-8e98-11eb-b8e0-8c1645215bba', '2021-04-11 23:30:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE `title` (
  `id` int(11) NOT NULL,
  `det` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`id`, `det`) VALUES
(1, '<ol>\r\n	<li>Certificate of Land Transfer</li>\r\n	<li>Emancipation Patent</li>\r\n	<li>Individual Certificate of Land Ownership Award (CLOA)</li>\r\n	<li>Collective CLOA</li>\r\n	<li>Co-ownership CLOA</li>\r\n<ol>'),
(2, '<ol>\r\n<li>Agricultural sales patent</li>\r\n	<li>Homestead patent</li>\r\n	<li>Free Patent</li>\r\n	<li>Certificate of Title or Regular Title</li>\r\n	<li>Certificate of Ancestral Domain Title</li>\r\n	<li>Certificate of Ancestral Land Title</li>\r\n	<li>Tax Declaration</li>\r\n</ol>');

-- --------------------------------------------------------

--
-- Table structure for table `tractorrequest`
--

CREATE TABLE `tractorrequest` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tractor_service` int(11) NOT NULL,
  `brgylocation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payamount` double(8,2) NOT NULL,
  `hectare` double(5,2) NOT NULL,
  `approvedby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `approved` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tractorrequest`
--

INSERT INTO `tractorrequest` (`id`, `uuid`, `tractor_service`, `brgylocation`, `payamount`, `hectare`, `approvedby`, `created_at`, `updated_at`, `delivery_date`, `approved`, `status`) VALUES
(17, 'bc73f082-5109-11eb-8bee-8c1645215bba', 1, '1', 1213.00, 1.00, NULL, NULL, NULL, NULL, 'Approved', NULL),
(23, '8b748f29-9492-11eb-adb7-8c1645215bba', 1, '5', 34356.00, 1.00, NULL, '2021-04-03 23:49:00', NULL, '2021-04-11', 'Waiting', 'Uncheck'),
(24, '8b748f29-9492-11eb-adb7-8c1645215bba', 1, '5', 34356.00, 1.00, 'bc73f082-5109-11eb-8bee-8c1645215bba', '2021-04-03 23:50:13', NULL, '2021-04-11', 'Approved', 'Checked');

--
-- Triggers `tractorrequest`
--
DELIMITER $$
CREATE TRIGGER `after_update_tractor` AFTER UPDATE ON `tractorrequest` FOR EACH ROW BEGIN

IF new.approved = "Approved" THEN 
   INSERT INTO disposaltractor(farmer,delivery_date,service_type) VALUES(old.uuid, old.delivery_date, old.tractor_service);
END IF;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_insert` BEFORE INSERT ON `tractorrequest` FOR EACH ROW SET NEW.delivery_date = DATE_ADD(NEW.created_at, INTERVAL 7 DAY)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tractorservice`
--

CREATE TABLE `tractorservice` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tractorservice`
--

INSERT INTO `tractorservice` (`id`, `service`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Disk Plowing', 34356.00, '2021-01-28 22:43:18', NULL),
(2, 'Harrow Plowing', 13245.00, '2021-01-28 21:09:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trashdelete`
--

CREATE TABLE `trashdelete` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trashdelete`
--

INSERT INTO `trashdelete` (`id`, `trash`, `created_at`, `updated_at`) VALUES
(1, 'Deleted From  Reply: --> Farmer--->: 757797c0-62fc-11eb-ac76-8c1645215bbaTitle--->:  Mao na dapatVisual Name:---> public/media/080221_03_03_01.jpg Problem:---><p>hdh</p>Date Deleted--->2021-03-22 18:18:34', NULL, NULL),
(2, 'Deleted From  Reply: --> Farmer--->: 757797c0-62fc-11eb-ac76-8c1645215bbaTitle--->:  WertVisual Name:---> public/media/040221_17_55_03.jpg Problem:---><p>Please Save me.&nbsp;</p>Date Deleted--->2021-03-22 18:23:24', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trashdetails`
--

CREATE TABLE `trashdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `farmer` varchar(115) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trashdetails`
--

INSERT INTO `trashdetails` (`id`, `farmer`, `trash`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Farmer--->: 757797c0-62fc-11eb-ac76-8c1645215bbaTitle--->:  Bakit ganitoVisual Name:---> public/media/040221_12_09_20.jpg Problem:---><p>Sir, ngano inga ani mani?</p>Date Deleted--->2021-03-22 17:50:59', NULL, NULL),
(2, NULL, 'Farmer--->: 757797c0-62fc-11eb-ac76-8c1645215bbaTitle--->:  122334ewrVisual Name:---> public/media/030221_18_30_02.mp4 Problem:---><p>wewret</p>\r\n\r\n<p>gghre</p>\r\n\r\n<p>try</p>Date Deleted--->2021-03-22 18:19:13', NULL, NULL),
(3, NULL, 'Farmer--->: 393cdc71-8135-11eb-be32-8c1645215bbaTitle--->:  hrhjhrfVisual Name:---> public/media/220321_10_33_24.jpg Problem:---><p>jbbv</p>Date Deleted--->2021-03-22 23:41:41', NULL, NULL),
(4, NULL, 'Deleted From  Reply: --> Farmer--->: 393cdc71-8135-11eb-be32-8c1645215bbaTitle--->:  sdjshdjfVisual Name:---> public/media/220321_14_05_15.jpg Problem:---><p>nhhdnshdjsf</p>Date Deleted--->2021-03-22 23:46:47', NULL, NULL),
(5, NULL, 'Farmer--->: 393cdc71-8135-11eb-be32-8c1645215bbaTitle--->:  qeggrhrwggrVisual Name:---> public/media/220321_11_55_24.jpg Problem:---><p>dshdhewjfjef</p>Date Deleted--->2021-03-23 00:26:30', NULL, NULL),
(6, '8b748f29-9492-11eb-adb7-8c1645215bba', 'Farmer--->: 8b748f29-9492-11eb-adb7-8c1645215bbaTitle--->:  PleaseVisual Name:---> public/media/040421_03_17_12.jpg Problem:---><p>hello please help me about this.</p>Date Deleted--->2021-04-04 12:32:51', NULL, NULL),
(7, '8b748f29-9492-11eb-adb7-8c1645215bba', 'Farmer--->: 8b748f29-9492-11eb-adb7-8c1645215bbaTitle--->:  SDVisual Name:---> public/media/040421_05_53_07.jpg Problem:---><p>DDF</p>Date Deleted--->2021-04-04 13:08:03', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trinventory`
--

CREATE TABLE `trinventory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_type` int(11) DEFAULT NULL,
  `tractor_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tractor_model` varchar(88) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trinventory`
--

INSERT INTO `trinventory` (`id`, `service_type`, `tractor_name`, `tractor_model`, `qty`, `admin`, `created_at`, `updated_at`) VALUES
(1, 2, 'Hadjsfhhjf', 'ajsff', 3, 'bc73f082-5109-11eb-8bee-8c1645215bba', '2021-02-07 06:17:33', NULL),
(2, 1, 'diskkkkee', 'shahgdghH', 1, 'bc73f082-5109-11eb-8bee-8c1645215bba', '2021-02-07 06:25:13', NULL),
(3, 2, 'Harrow-21', 'Harrt', 1, 'bc73f082-5109-11eb-8bee-8c1645215bba', '2021-02-07 19:13:25', NULL),
(4, 2, 'wqe', 'huhwuerw', 5, 'bc73f082-5109-11eb-8bee-8c1645215bba', '2021-03-23 19:38:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tutorials`
--

CREATE TABLE `tutorials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` int(11) NOT NULL,
  `title` varchar(88) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(88) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visual` varchar(111) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uuid` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `uuid`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Cagro Applied Sector', 'appliedsector@gmail.com', 'bc73f082-5109-11eb-8bee-8c1645215bba', 1, NULL, '$2y$10$9UAtmEFutnlAYk6t1Rk4.uu2cLiML1H/6uacDhT/b8VC1YIztoLWG', '9WJxdq8NtBouwVZTGeNGPYqVXL4NqWpJu7iXGIfyceX02kYQdjhXeIUoWAcw', '2021-01-07 08:59:43', '2021-01-07 08:59:43'),
(2, 'Cagro Crop Sector', 'cropsector@gmail.com', 'f91df6b5-5162-11eb-ad23-8c1645215bba', 2, NULL, '$2y$10$6zVAMxv.CXnuwtqzeFAbTegKC/.K.sdH8cMolj4WFaF40meQyFwTe', 'HiztBCWHY9DsPMNnDK1K08Lz1nGyDWUGc10Ol9r3dXSXPHkljH4ejEEIfiuA', '2021-01-07 19:38:29', '2021-01-07 19:38:29'),
(3, 'I am Flattered', 'second@cagro.panabo', 'f1e76a23-5654-11eb-aca3-8c1645215bba', 1, NULL, '$2y$10$rE/Jmb1b//PJ6x8lZTZchedvn6a9fwkctZmOHTCkYCOTFdd2LoNPy', NULL, '2021-01-14 02:40:30', '2021-01-14 02:40:30'),
(4, 'ajhhgsfghf', 'farmers@cagro.ph', 'b95b3238-5a06-11eb-9b97-8c1645215bba', NULL, NULL, '$2y$10$fl3QmdORe857R.MvcFEMJOnc./7S.gCtAbMi3YmLhsZT8dAeyEaIa', NULL, NULL, NULL),
(5, 'gsgadghsg', 'qtfvd@g.com', '29f572f9-5a0c-11eb-9b97-8c1645215bba', NULL, NULL, '$2y$10$bNCUmCWtdvdWTBdOjwlg3eeAKNWqy7ZM.YYH0fGH3Bc1M1Jse4ZMG', NULL, NULL, NULL),
(6, 'dsafbfj', 'fasfagd@g.com', '3679bb4d-5a0c-11eb-9b97-8c1645215bba', NULL, NULL, '$2y$10$9GRtS4j6cYKk9GySUbNrl.MExJo2PiWXSSvx7XrS6dBlhKzXnf17C', NULL, NULL, NULL),
(7, 'world', 'adriel@j.com', '6a5d11bc-5a0c-11eb-9b97-8c1645215bba', 1, NULL, '$2y$10$A/D3P1r0OIWrrQ7iJtkLMOVeuhdQvE.RYeX/fN5GJnyc5K0oPl55u', NULL, NULL, NULL),
(8, 'gsaghdgghfgghfg', 'farmerko@jo.com', '2319cb5a-5b34-11eb-8df9-8c1645215bba', 1, NULL, '$2y$10$xQx5sBc8SLBXxXyMPeWuOuEZ4eeNvVwfb9BgsXC0KQr5IWOmDOHTG', NULL, '2021-01-20 15:28:24', NULL),
(9, 'dksfng', 'adhssfj@g.com', '90fe3d0c-5b35-11eb-8df9-8c1645215bba', 6, NULL, '$2y$10$2yGMuc1Zumd.GMVG1voxvetippKctdhlr5vnMZpxupgMuBGs3k9om', NULL, '2021-01-20 15:38:38', NULL),
(14, 'luha12', 'luha@gmail.com', '2f5a2c71-5fe7-11eb-837a-8c1645215bba', 6, NULL, '$2y$10$jXjzv3ebQEXHdfgbwPr8ouJCFhIM9efeJf.cDuiU.qeN9/iM0XthW', NULL, '2021-01-26 15:00:10', NULL),
(16, 'sad', 'akjkd@k.com', '6d9f7e74-5fe7-11eb-837a-8c1645215bba', 6, NULL, '$2y$10$V5T9M/EH3rVsOIKOKW5rBedEMY7NI1aUE9NtToKMfbUvQqz1YwjHi', NULL, '2021-01-26 15:01:54', NULL),
(18, 'yyy', 'dsf@g.com', 'e7fc52e6-62d3-11eb-ac76-8c1645215bba', 6, NULL, '$2y$10$JHB3J/Q9h69Fg8X3giB/wOnt1edp3gJW1yqKc6z.VMnYUOrzSjNGi', NULL, '2021-01-30 08:19:43', NULL),
(19, 'twteter', 'sjhad@g.com', '1bd62451-62d4-11eb-ac76-8c1645215bba', 6, NULL, '$2y$10$c/kiYug.M4QEIrUyfNwXg.xbZ2BudBpEGXQMOFnn64doHfeEx3a66', NULL, '2021-01-30 08:21:12', NULL),
(20, 'kulang', 'iiwue@g.com', '524838a4-62d4-11eb-ac76-8c1645215bba', 6, NULL, '$2y$10$LF2ocSySqB/UxoV6JQ86LOhZBhzd28nXEwmLe3FzlLIbeQzNTYGxm', NULL, '2021-01-30 08:22:43', NULL),
(22, 'hhdhsfh', 'qywtetyyt@j.com', '757797c0-62fc-11eb-ac76-8c1645215bba', 6, NULL, '$2y$10$xbkQVSwBeLtY0HsqrazFk.X83SkVwswHOa4vyYFJ0Qqe9svEQD3yG', NULL, '2021-01-30 13:10:02', NULL),
(24, 'hlop', 'jlop@g.com', '3d923414-7a4a-11eb-a678-8c1645215bba', 2, NULL, '$2y$10$Hfk.CcZzVJ8uUTeorVl2Iu1NLsBNYIs18dKoh.svwEca8286UKMym', NULL, '2021-03-01 04:54:44', NULL),
(30, 'nsdbbfbbfn', 'kdkjf@jq.com', '39cf8c9d-7fda-11eb-b976-8c1645215bba', 6, NULL, '$2y$10$ymaHXTcXssRE8bUOc85bE.0pNogaSMsvLzk18zwKdnBKpN4BzrKrW', NULL, '2021-03-08 06:47:52', NULL),
(32, 'asbbd', 'dahshshd@j.com', '706b75f4-7fda-11eb-b976-8c1645215bba', 6, NULL, '$2y$10$pRTtoD4/90DPL1aDh9J0Xe2yNGmgIgbUUb2X0tGSFrZ3upKAe1h/C', NULL, '2021-03-08 06:49:24', NULL),
(33, 'rqwrtrerrte kajshad', 'kdkjf@jq.comsad', '29d61ee8-7fdb-11eb-b976-8c1645215bba', 6, NULL, '$2y$10$TWm9ql3eoXFI9.8PO1QIP.ATK2o6.s63FHMcBUQtjEsaeT76vtU4m', NULL, '2021-03-08 06:54:35', NULL),
(34, 'gaggggfggfaq', 'sjgad@hhsd.com', '4cce1b54-7fdd-11eb-b976-8c1645215bba', 6, NULL, '$2y$10$8WXj4ztxhV0dAcnJbKQtgOFktHSQvuTLf6sWxasgN2fGU4gbe936K', NULL, '2021-03-08 07:09:52', NULL),
(35, 'qqwqewrtqwqe', 'qwerrtyuwwe@h.com', '7cc29332-7fdd-11eb-b976-8c1645215bba', 6, NULL, '$2y$10$65o2mWn4DRu4QCWGVUHLueUcePRXbL27RwW2SlAXU9MZ3hlyp.DUG', NULL, '2021-03-08 07:11:13', NULL),
(36, 'ggggsgd', 'gagd@j.com', '30fd932d-8134-11eb-be32-8c1645215bba', 6, NULL, '$2y$10$9/Oxm2PQSzg7XqtPRi.P8.MobU8uImMA9XQD8gCG8Uhn0O.owy0u6', NULL, '2021-03-10 00:04:32', NULL),
(37, 'dgsgdggsa', 'trrwerrwertgdgs@jd.com', '49e4e333-8134-11eb-be32-8c1645215bba', 6, NULL, '$2y$10$jPmCb9W4kfjBzjzwweHMeOStNlvM5FFHKt8SknTvnmb6aSkqa703a', NULL, '2021-03-10 00:05:14', NULL),
(38, 'dgsggggfa', 'fffsd@jdh.com', '393cdc71-8135-11eb-be32-8c1645215bba', 6, NULL, '$2y$10$KElH2sQ0gAYvRlkjjzJAxu0MJF2wYnq5RDwog6//TTwkh820JR64G', NULL, '2021-03-10 00:11:55', NULL),
(39, 'Cagro Fishery Sector', 'fisherysector@gmail.com', 'ebd4457e-8e98-11eb-b8e0-8c1645215bba', 3, NULL, '$2y$10$jpZXPgH6ZZMzP/AXhMMRHO4Lj4qfg3w/kkJO1GAIp8kXDSpDdTgtm', '7JOitUGIWjtbfsGrWOJqqzQKh5lNcskB7cxAoG5i5Cd6OhtkPbU8sObLaA7V', '2021-03-27 01:08:20', NULL),
(40, 'Cagro Livestock Sector', 'livestocksector@gmail.com', '06fd4904-8eab-11eb-b8e0-8c1645215bba', 4, NULL, '$2y$10$.poX8fY0ARCFiP9LRpo4qu4rN8yYAl9ZRuTZPJywm9MKBnElhBq7i', 'q4xBP23pHNqBe1i9VwY4tD0DYNHM5iwnvstNH1wMPDp24Izi7Mg8z2nVq5wn', '2021-03-27 03:17:57', NULL),
(41, 'ertyyewiu', 'er@jdh.com', 'c398ea2f-8ed6-11eb-b8e0-8c1645215bba', NULL, NULL, '$2y$10$v6TAiWb8CAAGr5J98aOfBOXBDkj.K4cIK5jAF4kUPn.7DjLTe3wwm', NULL, '2021-03-27 00:31:01', '2021-03-27 00:31:01'),
(42, 'juyyuyu', 'adsygf@g.com', '08288409-8efd-11eb-b8e0-8c1645215bba', NULL, NULL, '$2y$10$DbWmpbAF3vRf.RL2lM6DuesU855j1aeU1y1pJUGxMmCYH5CuPShKi', NULL, '2021-03-27 05:04:57', '2021-03-27 05:04:57'),
(43, 'sjhahhhgfhgh', 'jhdhsd@g.com', 'be5cffcf-8f08-11eb-b8e0-8c1645215bba', NULL, NULL, '$2y$10$UKIQccFSwxwRo4NBurfK1OFEIoc5R92tsMTupJs2ttXhDVJANLXhW', NULL, '2021-03-27 06:28:48', '2021-03-27 06:28:48'),
(44, 'hdegyrgew', '23@g.com', 'a3566a19-8f09-11eb-b8e0-8c1645215bba', NULL, NULL, '$2y$10$6kdNK7HqXEMqiG13pjCyPO68aoiq9hCRS0cc1P2p9lR8yE9aPw25a', NULL, '2021-03-27 06:35:12', '2021-03-27 06:35:12'),
(45, 'hhdhhgsf', 'asnvmd@h.com', 'd51a1ac1-8f0d-11eb-b8e0-8c1645215bba', NULL, NULL, '$2y$10$ycqN4i3QluwdDFsDMv3ZSOH.5w5tmVqwyJARo86oShNBVogRbvhWq', NULL, '2021-03-27 07:05:13', '2021-03-27 07:05:13'),
(46, 'ahghdgf', 'ueyrqw@lc.com', '7aa1dbd8-8f0e-11eb-b8e0-8c1645215bba', NULL, NULL, '$2y$10$Vnu7e4/5creBHM0b32sd3.AvfJ1I7u0htZzpovV5KRxaeRv8H4VdO', NULL, '2021-03-27 07:09:51', '2021-03-27 07:09:51'),
(52, 'whhdhw', 'asdajf@g.com', '9d309c1f-8f29-11eb-b8e0-8c1645215bba', 6, NULL, '$2y$10$MvE72t9j5WEN5f2QM2fruu2MUNTvFCRUB8ShMMDyCVUOjvL5nayWO', NULL, '2021-03-27 18:23:56', NULL),
(54, 'Adriel Balinang Tilos', 'hhsjhgf@g.com', 'ccd64dde-8f29-11eb-b8e0-8c1645215bba', 6, NULL, '$2y$10$70qX2QFJrI6ShL7/x88GDe6pLpLi8iu/xkaK3vvPGfeWVcNDbnhpW', NULL, '2021-03-27 18:25:16', NULL),
(55, 'qqeyey', 'yey32y@l.com', '6afec167-8f36-11eb-b8e0-8c1645215bba', 6, NULL, '$2y$10$1sXg3XlfkDQtleAbItjDcegkvfXDKmk2rkBTVmT3j9I/hi/Ndve1m', NULL, '2021-03-27 19:55:35', NULL),
(56, 'Adriieyh', 'jajd@f.fol', '1a024277-8f62-11eb-889d-8c1645215bba', NULL, NULL, '$2y$10$E32xAVUSSyJUITlxoajbiO8z4ZeIAQRtlj9XwCyKTCZRbVs2NZMxm', NULL, '2021-03-28 01:08:27', NULL),
(58, 'ehwhr', 'farmer@farmer.co', 'bdd76f0b-8f67-11eb-889d-8c1645215bba', 6, NULL, '$2y$10$WnNHlJRcJ4lQL8o/BspI.u7yAshMU2Fjc1DvtZFnIQ5fqtEUsC6K6', 'MTmwA1JGGkwp5AFLoFSfLY55vMALrQJ9geVFeiXwXaJtnGSApQpDG199WG0s', '2021-03-28 01:48:49', NULL),
(59, 'snadnejfjhe', 'farms@farms.com', '78f86609-8f6a-11eb-889d-8c1645215bba', NULL, NULL, '$2y$10$z8sfui69ulk7PNeJND1LWOeTHO2c5kauadDOOnPGFuQz.qTP2MISy', 'mR9UHm0lh6VGMizFLkd2tcVWg9vkvXJCdXMLr426TJ3D3x0B8y6ZaOay19mC', '2021-03-28 02:08:22', NULL),
(60, 'farmko@g.com', 'farmko@g.com', 'ed1519b5-8f6c-11eb-889d-8c1645215bba', 6, NULL, '$2y$10$7hTfcndPNBDldSKrwK/QPuBKjclem37p9g3zoWLnh4AZGFrt0p/KG', '3J0W046AuQZ9gxyKD0zKTOJbtsKvXVuy0rVNXvaiFA2CCbiNqOKeTUFlMF4r', '2021-03-28 02:25:56', NULL),
(61, 'nsabbkfbkg', 'gfarm@m.com', '7f25b5d7-8f6f-11eb-889d-8c1645215bba', NULL, NULL, '$2y$10$Eayc0/P776s/5H1M5SI4Ze76wg21/sUBcfQ1CJtNagUAV64h7T7S2', 'OelfiUhFWNoyv3C40fXmWdFdLOxiHpJxJISaoEpSxzExdLuvc6fZUooWVRpw', '2021-03-28 02:44:20', NULL),
(62, 'shjfdsjfhdjsg', 'akokay@k.com', '37a11760-8f72-11eb-889d-8c1645215bba', NULL, NULL, '$2y$10$Byt3EtQoMLWEAOju/n7DGuSiojdDx7lZDrgl00lhDMDffadNzy6OK', 'TzPRGO27cCvOXscQ30FIYVl7hM92S1V1VvAERg8N0yb55qWhollxJYIjoVTf', '2021-03-28 03:03:48', NULL),
(63, 'waa koy name', 'walakoemail@gmail.com', '24c1561f-8f78-11eb-b2cb-8c1645215bba', NULL, NULL, '$2y$10$RaoUfo3WF507lp1sP0ihNOAl3TOgWkMwCpNCXycPngkpCkmvwbASO', 'Nxkxwjo7YUVZyDUDYQLPrgbEMkh5kUptCBXUEVEMZ37nrH7s2IuRgD8yOH0j', '2021-03-28 03:46:13', NULL),
(64, 'dsjfhjfhjehr', 'walawala@g.com', '3c3d4a26-8f7a-11eb-b2cb-8c1645215bba', 6, NULL, '$2y$10$E6aVeRXRehrJT.a6PFxht.t.xgvAlAI5RInXAFBNt3zBGVVgSShaS', '1aSl7JcBDFgpWeHpw0ePO9JXvX86lmV3Q9TPmZsGNYm1BvGzr3U3vl5D2gK8', '2021-03-28 04:01:12', NULL),
(65, 'dbsdsgfhg', 'loop@gmail.com', '4b9b4600-8f7b-11eb-b2cb-8c1645215bba', NULL, NULL, '$2y$10$p/kQmTWVh5Qqg.nIUwqfzeH4I6m7pREwpq.G6hWDhejdochm3G5q2', 'FKsm2UbdEJYmVrKMISNIY0TCwqMj395yw9vlAxcgEOIfHuzdo0lExrfzF5EU', '2021-03-28 04:08:47', NULL),
(66, 'gsaghdgghfgghfg', 'gracelpraise@yahoo.com', '7ec4fbc5-8f7c-11eb-b2cb-8c1645215bba', 6, NULL, '$2y$10$TML2UHR9djTPoYtoWPKM2uHfs3etmnV/5UC2RPAZqkdtoPYOu.e9a', 'aWuLAlykpUotTD4kNOOQOQHldXJuWkSJlaMEXKjZk7EEhBbQEGsJMhdFmK8B', '2021-03-28 04:17:23', NULL),
(70, 'fdf', 'alvinyositap@gmail.com', 'b0d93764-8fde-11eb-a353-8c1645215bba', NULL, NULL, 'password', NULL, '2021-03-28 16:00:16', NULL),
(71, 'fdf', 'a1lvinyositap@gmail.com', 'be950dc5-8fde-11eb-a353-8c1645215bba', NULL, NULL, 'password', NULL, '2021-03-28 16:00:40', NULL),
(72, 'fdf', 'a1lv7inyositap@gmail.com', 'db2eb2bb-8fde-11eb-a353-8c1645215bba', NULL, NULL, 'password', NULL, '2021-03-28 16:01:27', NULL),
(73, 'fdf', 'a1lv76inyositap@gmail.com', 'fb8d2e06-8fde-11eb-a353-8c1645215bba', NULL, NULL, '$2y$10$vCNjoo3qYZ24.fr88YAbme0fGWQ..KcMXyO4vxV5BtH.N/zaEIReW', NULL, '2021-03-28 16:02:22', NULL),
(75, 'fdf', 'a1lv7786inyositap@gmail.com', '1f194bff-8fdf-11eb-a353-8c1645215bba', NULL, NULL, '$2y$10$ragd.uromy9apU1lmuezpOhh6dAk0hRzs4GS4EoXy/m.9UlITiadO', NULL, '2021-03-28 16:03:22', NULL),
(76, 'fdf', 'a1lv667786inyositap@gmail.com', '3e2c573c-8fdf-11eb-a353-8c1645215bba', NULL, NULL, '$2y$10$apIEQ6lRqc3mx0shq4Ytl.22oKScrzQxd52BCr3TYvfU4xJpu6wh6', NULL, '2021-03-28 16:04:14', NULL),
(77, 'fdf', 'a1lv667786i767nyositap@gmail.com', '8876396f-8fdf-11eb-a353-8c1645215bba', NULL, NULL, '$2y$10$sf8Q26eR2KsfLs/./nnMte0ApYQt6Gc4ii62A9ZUoI4ucdEezjMKi', NULL, '2021-03-28 16:06:19', NULL),
(78, 'fdf', 'a1lv667786i767n5656yositap@gmail.com', '9ba8c941-8fdf-11eb-a353-8c1645215bba', NULL, NULL, '$2y$10$o3o0xwYGi9AjtZRYYQendem5uuAZ1K3iyeee7fP7M.X/MIcYEpA8O', NULL, '2021-03-28 16:06:51', NULL),
(79, 'fdf', 'a1lv667786i732467n5656yositap@gmail.com', 'bb887b1a-8fdf-11eb-a353-8c1645215bba', NULL, NULL, '$2y$10$bc/KsIYf.hOpL3WYd2bu/u8Azef5tihmu4qGq4MbG9uBRmNU60tOu', NULL, '2021-03-28 16:07:44', NULL),
(80, 'sdsd', 'alasdsadesdsdsdsdsd@gmail.com', '70a0de0b-8fe1-11eb-a353-8c1645215bba', NULL, NULL, '$2y$10$bJRv.hX9t18bz4FDOtTgI.7vs2t12nmbPypeHmsPZMJC5s6XDyhMm', NULL, '2021-03-28 16:19:58', NULL),
(81, 'sdsd', 'alasdsajkkjkkdesdsdsdsdsd@gmail.com', 'b9e5404e-8fe1-11eb-a353-8c1645215bba', NULL, NULL, '$2y$10$HfL7CbvFOAYspGrI1MzfSeFrzCCGMyDukSJV41pMntFMfpYx9d7ja', NULL, '2021-03-28 16:22:01', NULL),
(82, 'Alvin', 'aln@gmail.com', '568fc50e-93a9-11eb-aad8-8c1645215bba', 6, NULL, '$2y$10$ONTaVxhyLAI9OwoEKudAT.WCBJsz/H0hmKZnz9mjMofwPS2G7U/HG', NULL, '2021-04-02 11:48:29', NULL),
(83, 'Allen', 'allen@gmail.com', 'fddf42cf-93b4-11eb-aad8-8c1645215bba', 6, NULL, '$2y$10$zgmkI07mQXbQvHMXsdihvOlwlG5fREOQoLx9MbjljVYyiQR5VuDYu', 'TdW5YlwrimhoBTl4jrlWdOpcHULRWmTBlZ5aKGv48Ib36B1nYoiqGMITm34q', '2021-04-02 13:11:55', NULL),
(84, 'asdfwewrtt', 'magnostat@gmail.com', '8b748f29-9492-11eb-adb7-8c1645215bba', 6, NULL, '$2y$10$fJDxVG/aZgLKYfKrfdvpxuQswBG/ZT/z6lCQvfMDHsZ5.x1RDsZMq', 'QX0Z3NgnzwBid7cyGRIBct17tQg1RIL5QIG2cuZpVnUOeKH5lQirmtyEloe5', '2021-04-03 15:37:37', NULL),
(85, 'Dweladsf', 'losser@loss.com', 'efbd5dcc-94a2-11eb-adb7-8c1645215bba', 6, NULL, '$2y$10$U3wGfcqylqfEYsHb3nvwROFkTuwXtwH1HFPar44hF/AegEXQqzi2K', 'GPJYlklCfoHmH7wtV0EauK63iLt4qKD7xRFW223uuPKh863iq5UDyo7qfq66', '2021-04-03 17:34:58', NULL),
(86, 'Cagro Research Sector', 'researchsector@gmail.com', '66bb2bc1-9553-11eb-8177-8c1645215bba', 5, NULL, '$2y$10$0d//DdiZ1KJbyoho6Y8GbO5HX8fAHTvH/rq2SF4Cj3ndQ0RN/g7pW', 'tkzGYOgBOQ886mPVH9yrycjlLTmET3nJ3cCyCjwsWgc7jAPHzZeYhGkyXXEM', '2021-04-04 14:38:20', NULL),
(87, 'Edwib', 'edgelao344@gmail.com', '513b9036-9797-11eb-aec0-8c1645215bba', 6, NULL, '$2y$10$qAIXpO17NpvMLwC58NHBCu/IGkfEb8iZeJOZbkx/zSjDAyMtPoT6a', NULL, '2021-04-07 11:49:31', NULL),
(88, 'Frann', 'Lubiano.franngreffin@gmail.com', '01d4c456-9798-11eb-aec0-8c1645215bba', 6, NULL, '$2y$10$ms9cZf0e2y29ip2.4N2/XeFFy0jHndYDY4H.6RhOwMUlBLvlChEu.', NULL, '2021-04-07 11:54:28', NULL),
(89, 'Marshall_me', 'newapplied@gmail.com', 'a1f72fd5-9875-11eb-b0ac-8c1645215bba', 1, NULL, '$2y$10$bIdX6VX4z2rCk35VgDvGN.WBmcjKF3WayGu9ahnGMJjNQE49IYbTy', NULL, '2021-04-08 14:20:55', NULL),
(90, 'Planter Ako', 'plant@gmail.com', 'cfa52190-9876-11eb-b0ac-8c1645215bba', 2, NULL, '$2y$10$K4if3g5Na5cRQgQBB4zbAOfxUoElprozGoT7XsPs2mO9KBe/jdsHu', NULL, '2021-04-08 14:29:22', NULL),
(91, 'gold_as12', 'gold@gmail.com', 'd97b992f-9b48-11eb-8e62-8c1645215bba', 1, NULL, '$2y$10$.SJ0T5WQN3WXuo/G5OW93erj/wH2NZLbVii9xLt7NnsxMrPsP.amS', NULL, '2021-04-12 04:37:55', NULL),
(92, 'Bronze Alpha', 'bronze.alpha@gmail.com', '87ec8deb-9b49-11eb-8e62-8c1645215bba', 6, NULL, '$2y$10$NzP55z0qH7jVC6qZprBeFOVKcO45n2u8Q3jyx5r3bxCkDeuYxQnue', NULL, '2021-04-12 04:42:48', NULL),
(93, 'Gold D. Roger', 'qwfhl@gmail.com', 'b6a5e400-9b57-11eb-8e62-8c1645215bba', 6, NULL, '$2y$10$Qp.2eJ4pBLE/D6KZX7I9lOlgI/spyt45z5s/d6dSYtPomrIK/xrKy', NULL, '2021-04-12 06:24:19', NULL),
(94, 'Ako kay', 'ako123@gmail.com', 'd2f93b3d-9b57-11eb-8e62-8c1645215bba', 6, NULL, '$2y$10$MR1WNYNNNT8cWWg6iKP1wOSigofyDyJ.7JuSk0Do/3toO5bbMADB.', '03KikIFmTlZli3Ypv4ir7quJoM8wbjOORb5ihNMyJVXgg9nhWkhKMSzhJKKq', '2021-04-12 06:25:06', NULL),
(95, 'Dandelion', 'dand@gmail.com', '714f9034-9cf1-11eb-8cb6-8c1645215bba', 6, NULL, '$2y$10$T6vI8y.6VAAkL1QWtKYMPe.bUiXDbWEBipkbSjwwHm2p9XB99G9Lq', NULL, '2021-04-14 07:17:16', NULL),
(96, 'Frienly Zone', 'friendzone@gmil.com', 'd99e6a7e-9cf1-11eb-8cb6-8c1645215bba', 6, NULL, '$2y$10$BZXrJ0hv1JDYukDUDBRbO.DL.x7WM7BaBvEPjQeO5O4pDMOEasg3O', 'rGGocjw2Sk0zqaxKc8BhAHYwFsX9urW03bxAjIplNW7jKNANdXSfGo65gEuD', '2021-04-14 07:20:02', NULL);

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `before_insert_user` BEFORE INSERT ON `users` FOR EACH ROW SET NEW.uuid =uuid()
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `animalproduct`
--
ALTER TABLE `animalproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `animalrequest`
--
ALTER TABLE `animalrequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `animalservice`
--
ALTER TABLE `animalservice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `baranggay`
--
ALTER TABLE `baranggay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cropdispose`
--
ALTER TABLE `cropdispose`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cropenrollment`
--
ALTER TABLE `cropenrollment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cropinventory`
--
ALTER TABLE `cropinventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cropproduct`
--
ALTER TABLE `cropproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `croprequest`
--
ALTER TABLE `croprequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cropservice`
--
ALTER TABLE `cropservice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disposaltractor`
--
ALTER TABLE `disposaltractor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employeeprofile`
--
ALTER TABLE `employeeprofile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `farmerparttwo`
--
ALTER TABLE `farmerparttwo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farmerpersonal`
--
ALTER TABLE `farmerpersonal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farmerprofile`
--
ALTER TABLE `farmerprofile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farmparcel`
--
ALTER TABLE `farmparcel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fishdispose`
--
ALTER TABLE `fishdispose`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fishinventory`
--
ALTER TABLE `fishinventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fishproduct`
--
ALTER TABLE `fishproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fishrequest`
--
ALTER TABLE `fishrequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fishservice`
--
ALTER TABLE `fishservice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `livestockdispose`
--
ALTER TABLE `livestockdispose`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `livestockinventory`
--
ALTER TABLE `livestockinventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loanrequest`
--
ALTER TABLE `loanrequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `noticenbills`
--
ALTER TABLE `noticenbills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outlets`
--
ALTER TABLE `outlets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parcelanimal`
--
ALTER TABLE `parcelanimal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `profpicture`
--
ALTER TABLE `profpicture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referencing`
--
ALTER TABLE `referencing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tractorrequest`
--
ALTER TABLE `tractorrequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tractorservice`
--
ALTER TABLE `tractorservice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trashdelete`
--
ALTER TABLE `trashdelete`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trashdetails`
--
ALTER TABLE `trashdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trinventory`
--
ALTER TABLE `trinventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutorials`
--
ALTER TABLE `tutorials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `animalproduct`
--
ALTER TABLE `animalproduct`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `animalrequest`
--
ALTER TABLE `animalrequest`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `animalservice`
--
ALTER TABLE `animalservice`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `baranggay`
--
ALTER TABLE `baranggay`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cropdispose`
--
ALTER TABLE `cropdispose`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cropenrollment`
--
ALTER TABLE `cropenrollment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cropinventory`
--
ALTER TABLE `cropinventory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cropproduct`
--
ALTER TABLE `cropproduct`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `croprequest`
--
ALTER TABLE `croprequest`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cropservice`
--
ALTER TABLE `cropservice`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `disposaltractor`
--
ALTER TABLE `disposaltractor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `employeeprofile`
--
ALTER TABLE `employeeprofile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farmerparttwo`
--
ALTER TABLE `farmerparttwo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `farmerpersonal`
--
ALTER TABLE `farmerpersonal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `farmerprofile`
--
ALTER TABLE `farmerprofile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `farmparcel`
--
ALTER TABLE `farmparcel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `fishdispose`
--
ALTER TABLE `fishdispose`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fishinventory`
--
ALTER TABLE `fishinventory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fishproduct`
--
ALTER TABLE `fishproduct`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fishrequest`
--
ALTER TABLE `fishrequest`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fishservice`
--
ALTER TABLE `fishservice`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `livestockdispose`
--
ALTER TABLE `livestockdispose`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `livestockinventory`
--
ALTER TABLE `livestockinventory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loanrequest`
--
ALTER TABLE `loanrequest`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `noticenbills`
--
ALTER TABLE `noticenbills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `outlets`
--
ALTER TABLE `outlets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parcelanimal`
--
ALTER TABLE `parcelanimal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profpicture`
--
ALTER TABLE `profpicture`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `referencing`
--
ALTER TABLE `referencing`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `title`
--
ALTER TABLE `title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tractorrequest`
--
ALTER TABLE `tractorrequest`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tractorservice`
--
ALTER TABLE `tractorservice`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trashdelete`
--
ALTER TABLE `trashdelete`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trashdetails`
--
ALTER TABLE `trashdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `trinventory`
--
ALTER TABLE `trinventory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tutorials`
--
ALTER TABLE `tutorials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
