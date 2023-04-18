-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2023 at 07:20 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `complaint`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlog`
--

CREATE TABLE `adminlog` (
  `id` int(200) NOT NULL,
  `department` varchar(50) NOT NULL,
  `amail` varchar(50) NOT NULL,
  `pswd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminlog`
--

INSERT INTO `adminlog` (`id`, `department`, `amail`, `pswd`) VALUES
(1, 'Agriculture and Farmer Welfare', 'agri@gmail.com', 'agri'),
(2, 'Environment and Forest', 'envi@gmail.com', 'envi'),
(3, 'Education', 'edu@gmail.com', 'edu'),
(4, 'Municipal and Water Supply', 'municipal@gmail.com', 'muni'),
(5, 'Health', 'health@gmail.com', 'health'),
(6, 'Transport', 'trans@gmail.com', 'trans'),
(7, 'General', 'general@gmail.com', 'general');

-- --------------------------------------------------------

--
-- Table structure for table `afeed`
--

CREATE TABLE `afeed` (
  `id` int(250) NOT NULL,
  `umail` varchar(50) NOT NULL,
  `feedback` varchar(250) NOT NULL,
  `date` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `seen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `afeed`
--

INSERT INTO `afeed` (`id`, `umail`, `feedback`, `date`, `seen`) VALUES
(13, 'divya@gmail.com', 'thankyou', '2023-04-07 17:02:00.000000', 'seen');

-- --------------------------------------------------------

--
-- Table structure for table `agriculture`
--

CREATE TABLE `agriculture` (
  `id` int(250) NOT NULL,
  `umail` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `cat` varchar(50) NOT NULL,
  `ctitle` varchar(250) NOT NULL,
  `cdetail` varchar(250) NOT NULL,
  `cdoc` varchar(250) NOT NULL,
  `district` varchar(50) NOT NULL,
  `place` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `seen` varchar(50) NOT NULL,
  `cseen` varchar(10) NOT NULL,
  `cimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agriculture`
--

INSERT INTO `agriculture` (`id`, `umail`, `department`, `cat`, `ctitle`, `cdetail`, `cdoc`, `district`, `place`, `status`, `date`, `seen`, `cseen`, `cimage`) VALUES
(20, 'divya@gmail.com', 'Agriculture and Farmer Welfare', 'unreliable rainfall', 'sdfghjkl', 'ertyuiop', 'Final Report -1.docx', 'Ariyalur', 'sdfghjkl', 'closed', '2023-04-14 05:24:17.000000', 'seen', 'not_seen', 'flood.jpg'),
(21, 'divya@gmail.com', 'Agriculture and Farmer Welfare', 'Soil erosion', 'wrtyuiop', 'we567890', 'Final Report -1.docx', 'Ariyalur', 'sdfghjkl', 'not yet processed', '2023-04-14 17:24:25.000000', 'not_seen', 'not_seen', 'Global temperatures highest in 1400 years.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `agri_add`
--

CREATE TABLE `agri_add` (
  `id` int(250) NOT NULL,
  `cat` varchar(50) NOT NULL,
  `date` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agri_add`
--

INSERT INTO `agri_add` (`id`, `cat`, `date`) VALUES
(1, 'Soil erosion', '2023-03-24 07:58:23.000000'),
(2, 'unreliable rainfall', '2023-03-26 08:41:44.000000');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(200) NOT NULL,
  `cat` varchar(50) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `edfeed`
--

CREATE TABLE `edfeed` (
  `id` int(250) NOT NULL,
  `umail` varchar(50) NOT NULL,
  `feedback` varchar(250) NOT NULL,
  `date` datetime(6) NOT NULL,
  `seen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(250) NOT NULL,
  `umail` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `cat` varchar(50) NOT NULL,
  `ctitle` varchar(250) NOT NULL,
  `cdetail` varchar(250) NOT NULL,
  `cdoc` varchar(250) NOT NULL,
  `district` varchar(50) NOT NULL,
  `place` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `seen` varchar(50) NOT NULL,
  `cseen` varchar(10) NOT NULL,
  `cimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `umail`, `department`, `cat`, `ctitle`, `cdetail`, `cdoc`, `district`, `place`, `status`, `date`, `seen`, `cseen`, `cimage`) VALUES
(18, 'divya@gmail.com', 'Education', 'Fees', 'high', 'fees', 'DIVYA T Resume (1).docx', 'Ariyalur', 'dfghj', 'closed', '2023-04-14 06:31:19.000000', 'seen', 'not_seen', 'WhatsApp Image 2023-04-10 at 10.04.08 AM.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `edu_add`
--

CREATE TABLE `edu_add` (
  `id` int(250) NOT NULL,
  `cat` varchar(50) NOT NULL,
  `date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `edu_add`
--

INSERT INTO `edu_add` (`id`, `cat`, `date`) VALUES
(1, 'Fees', '2023-03-25 14:11:50.000000'),
(2, 'Corruption', '2023-04-04 15:21:52.000000');

-- --------------------------------------------------------

--
-- Table structure for table `enfeed`
--

CREATE TABLE `enfeed` (
  `id` int(250) NOT NULL,
  `umail` varchar(50) NOT NULL,
  `feedback` varchar(250) NOT NULL,
  `date` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `seen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enfeed`
--

INSERT INTO `enfeed` (`id`, `umail`, `feedback`, `date`, `seen`) VALUES
(2, 'thiva@gmail.com', 'Service was really good and done within a week.Thankyou fro your active service', '2023-04-09 13:06:14.000000', 'seen'),
(3, 'divya@gmail.com', 'Good service', '2023-04-09 13:07:17.000000', 'seen'),
(4, 'thiru@gmail.com', 'Satisfied.Thankyou', '2023-04-09 13:08:02.000000', 'not_seen');

-- --------------------------------------------------------

--
-- Table structure for table `environment`
--

CREATE TABLE `environment` (
  `id` int(250) NOT NULL,
  `umail` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `cat` varchar(50) NOT NULL,
  `ctitle` varchar(250) NOT NULL,
  `cdetail` varchar(250) NOT NULL,
  `cdoc` varchar(200) NOT NULL,
  `district` varchar(50) NOT NULL,
  `place` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `seen` varchar(50) NOT NULL,
  `cseen` varchar(10) NOT NULL,
  `cimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `environment`
--

INSERT INTO `environment` (`id`, `umail`, `department`, `cat`, `ctitle`, `cdetail`, `cdoc`, `district`, `place`, `status`, `date`, `seen`, `cseen`, `cimage`) VALUES
(18, 'divya@gmail.com', 'Environment and Forest', 'Waste disposal', 'fghjk', 'ertyui', 'DIVYA+T+Resume.docx', 'Ariyalur', '56789', 'closed', '2023-04-09 11:43:17.000000', 'seen', 'not_seen', 'flood.jpg'),
(20, 'divya@gmail.com', 'Environment and Forest', 'Air Pollution', 'Factory smoke', 'factory leaks the smoke.It causes the air pollution in our village.', 'DIVYA T Resume.docx', 'Ariyalur', 'theppakulam', 'closed', '2023-04-09 12:56:54.000000', 'seen', 'not_seen', 'What is Eco-Anxiety_ And 11 Tips to Help Manage.jpg'),
(21, 'thiva@gmail.com', 'Environment and Forest', 'Water Pollution', 'Plastic', 'People throw the used plastics on river.River fully covered with plastic wastages.', 'Batch-05  Final Review.pptx', 'Salem', 'vazhapadi', 'not yet processed', '2023-04-09 12:58:44.000000', 'not_seen', 'not_seen', 'Water and Air Pollution.jpg'),
(22, 'thiva@gmail.com', 'Environment and Forest', 'Land Pollution', 'Plastics', 'Throwing over pplastics on land near railwaystation.', 'Presentation doc.docx', 'Nilgiris', 'nilgiri', 'not yet processed', '2023-04-09 12:59:56.000000', 'not_seen', 'not_seen', 'download.jpg'),
(23, 'divya@gmail.com', 'Environment and Forest', 'Waste disposal', 'rtyui', 'ertyui', 'ISPC2018-SmartComplaintManagement.pdf', 'Ariyalur', 'ertyu8i', 'not yet processed', '2023-04-14 17:38:54.000000', 'not_seen', 'not_seen', 'What is Eco-Anxiety_ And 11 Tips to Help Manage.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `envi_add`
--

CREATE TABLE `envi_add` (
  `id` int(250) NOT NULL,
  `cat` varchar(50) NOT NULL,
  `date` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `envi_add`
--

INSERT INTO `envi_add` (`id`, `cat`, `date`) VALUES
(1, 'Waste disposal', '2023-03-24 15:03:16.000000'),
(3, 'Air Pollution', '2023-04-09 11:55:35.000000'),
(4, 'Water Pollution', '0000-00-00 00:00:00.000000'),
(5, 'Land Pollution', '2023-04-09 11:56:16.000000'),
(6, 'Climate Change', '2023-04-09 11:56:32.000000');

-- --------------------------------------------------------

--
-- Table structure for table `general`
--

CREATE TABLE `general` (
  `id` int(250) NOT NULL,
  `umail` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `cat` varchar(50) NOT NULL,
  `ctitle` varchar(200) NOT NULL,
  `cdetail` varchar(250) NOT NULL,
  `cdoc` varchar(250) NOT NULL,
  `district` varchar(50) NOT NULL,
  `place` varchar(250) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `seen` varchar(50) NOT NULL,
  `cseen` varchar(10) NOT NULL,
  `cimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `general`
--

INSERT INTO `general` (`id`, `umail`, `department`, `cat`, `ctitle`, `cdetail`, `cdoc`, `district`, `place`, `status`, `date`, `seen`, `cseen`, `cimage`) VALUES
(5, 'divya@gmail.com', 'General', 'Poverty', 'sggkj', 'sjflksjmcnx', 'Final Report -1 (1).docx', 'Ariyalur', 'iuerjsbc', 'closed', '2023-04-14 06:58:49.000000', 'seen', 'not_seen', 'download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `general_add`
--

CREATE TABLE `general_add` (
  `id` int(250) NOT NULL,
  `cat` varchar(50) NOT NULL,
  `date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `general_add`
--

INSERT INTO `general_add` (`id`, `cat`, `date`) VALUES
(1, 'Poverty', '2023-04-03 17:05:48.000000');

-- --------------------------------------------------------

--
-- Table structure for table `gfeed`
--

CREATE TABLE `gfeed` (
  `id` int(250) NOT NULL,
  `umail` varchar(50) NOT NULL,
  `feedback` varchar(250) NOT NULL,
  `date` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `seen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `health`
--

CREATE TABLE `health` (
  `id` int(250) NOT NULL,
  `umail` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `cat` varchar(50) NOT NULL,
  `ctitle` varchar(250) NOT NULL,
  `cdetail` varchar(250) NOT NULL,
  `cdoc` varchar(250) NOT NULL,
  `district` varchar(50) NOT NULL,
  `place` varchar(250) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `seen` varchar(50) NOT NULL,
  `cseen` varchar(10) NOT NULL,
  `cimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `health`
--

INSERT INTO `health` (`id`, `umail`, `department`, `cat`, `ctitle`, `cdetail`, `cdoc`, `district`, `place`, `status`, `date`, `seen`, `cseen`, `cimage`) VALUES
(6, 'divya@gmail.com', 'Health', 'Long Wait Times', 'fghjikl', 'dfghujki', 'ISPC2018-SmartComplaintManagement.pdf', 'Ariyalur', 'vbn', 'closed', '2023-04-14 06:36:00.000000', 'seen', 'not_seen', 'WhatsApp Image 2023-02-10 at 9.21.37 AM.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `health_add`
--

CREATE TABLE `health_add` (
  `id` int(250) NOT NULL,
  `cat` varchar(50) NOT NULL,
  `date` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `health_add`
--

INSERT INTO `health_add` (`id`, `cat`, `date`) VALUES
(1, 'Long Wait Times', '2023-04-03 16:34:58.000000');

-- --------------------------------------------------------

--
-- Table structure for table `hfeed`
--

CREATE TABLE `hfeed` (
  `id` int(250) NOT NULL,
  `umail` varchar(50) NOT NULL,
  `feedback` varchar(250) NOT NULL,
  `date` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `seen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mfeed`
--

CREATE TABLE `mfeed` (
  `id` int(250) NOT NULL,
  `umail` varchar(50) NOT NULL,
  `feedback` varchar(250) NOT NULL,
  `date` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `seen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `municipal`
--

CREATE TABLE `municipal` (
  `id` int(250) NOT NULL,
  `umail` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `cat` varchar(50) NOT NULL,
  `ctitle` varchar(250) NOT NULL,
  `cdetail` varchar(250) NOT NULL,
  `cdoc` varchar(250) NOT NULL,
  `district` varchar(50) NOT NULL,
  `place` varchar(250) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `seen` varchar(50) NOT NULL,
  `cseen` varchar(10) NOT NULL,
  `cimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `municipal`
--

INSERT INTO `municipal` (`id`, `umail`, `department`, `cat`, `ctitle`, `cdetail`, `cdoc`, `district`, `place`, `status`, `date`, `seen`, `cseen`, `cimage`) VALUES
(5, 'divya@gmail.com', 'Municipal and Water Supply', 'Electricity', 'sdfghjk', 'ertyuio', 'Final Report -1 (1).docx', 'Ariyalur', 'rtyuio', 'closed', '2023-04-14 06:33:49.000000', 'seen', 'not_seen', 'WhatsApp Image 2023-03-18 at 9.38.25 AM.jpeg'),
(6, 'divya@gmail.com', 'Municipal and Water Supply', 'Electricity', 'dfghjkl', 'ertyuio', 'Final Report -1 (1).docx', 'Ariyalur', 'werty', 'not yet processed', '2023-04-15 09:02:35.000000', 'not_seen', 'not_seen', 'WhatsApp Image 2023-04-14 at 9.04.30 PM.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `muni_add`
--

CREATE TABLE `muni_add` (
  `id` int(250) NOT NULL,
  `cat` varchar(50) NOT NULL,
  `date` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `muni_add`
--

INSERT INTO `muni_add` (`id`, `cat`, `date`) VALUES
(1, 'Electricity', '2023-03-24 17:13:48.000000');

-- --------------------------------------------------------

--
-- Table structure for table `regcomplaint`
--

CREATE TABLE `regcomplaint` (
  `id` int(250) NOT NULL,
  `umail` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `cat` varchar(50) NOT NULL,
  `ctitle` varchar(200) NOT NULL,
  `cdetail` varchar(250) NOT NULL,
  `cdoc` varchar(250) NOT NULL,
  `district` varchar(50) NOT NULL,
  `place` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `seen` varchar(50) NOT NULL,
  `cseen` varchar(10) NOT NULL,
  `cimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `regcomplaint`
--

INSERT INTO `regcomplaint` (`id`, `umail`, `department`, `cat`, `ctitle`, `cdetail`, `cdoc`, `district`, `place`, `status`, `date`, `seen`, `cseen`, `cimage`) VALUES
(69, 'divya@gmail.com', 'Environment and Forest', 'Waste disposal', 'fghjk', 'ertyui', 'DIVYA+T+Resume.docx', 'Ariyalur', '56789', 'closed', '2023-04-09 11:43:17.000000', 'seen', 'not_seen', 'flood.jpg'),
(72, 'divya@gmail.com', 'Environment and Forest', 'Air Pollution', 'Factory smoke', 'factory leaks the smoke.It causes the air pollution in our village.', '', 'Ariyalur', 'theppakulam', 'closed', '2023-04-09 12:56:54.000000', 'not_seen', 'not_seen', ''),
(73, 'thiva@gmail.com', 'Environment and Forest', 'Water Pollution', 'Plastic', 'People throw the used plastics on river.River fully covered with plastic wastages.', 'Batch-05  Final Review.pptx', 'Salem', 'vazhapadi', 'not yet processed', '2023-04-09 12:58:44.000000', 'not_seen', 'not_seen', 'Water and Air Pollution.jpg'),
(74, 'thiva@gmail.com', 'Environment and Forest', 'Land Pollution', 'Plastics', 'Throwing over pplastics on land near railwaystation.', 'Presentation doc.docx', 'Nilgiris', 'nilgiri', 'not yet processed', '2023-04-09 12:59:56.000000', 'not_seen', 'not_seen', 'download.jpg'),
(75, 'divya@gmail.com', 'Agriculture and Farmer Welfare', 'unreliable rainfall', 'sdfghjkl', 'ertyuiop', 'Final Report -1.docx', 'Ariyalur', 'sdfghjkl', 'closed', '2023-04-14 05:24:17.000000', 'not_seen', 'not_seen', 'flood.jpg'),
(76, 'divya@gmail.com', 'Education', 'Fees', 'high', 'fees', 'DIVYA T Resume (1).docx', 'Ariyalur', 'dfghj', 'closed', '2023-04-14 06:31:19.000000', 'not_seen', 'not_seen', 'WhatsApp Image 2023-04-10 at 10.04.08 AM.jpeg'),
(77, 'divya@gmail.com', 'Municipal and Water Supply', 'Electricity', 'sdfghjk', 'ertyuio', 'Final Report -1 (1).docx', 'Ariyalur', 'rtyuio', 'closed', '2023-04-14 06:33:49.000000', 'not_seen', 'not_seen', 'WhatsApp Image 2023-03-18 at 9.38.25 AM.jpeg'),
(78, 'divya@gmail.com', 'Health', 'Long Wait Times', 'fghjikl', 'dfghujki', 'ISPC2018-SmartComplaintManagement.pdf', 'Ariyalur', 'vbn', 'closed', '2023-04-14 06:36:00.000000', 'not_seen', 'not_seen', 'WhatsApp Image 2023-02-10 at 9.21.37 AM.jpeg'),
(79, 'divya@gmail.com', 'Transport', 'vehicle maintenance', 'dlshf', 'oiirtuhejd', 'Final Report -1.docx', 'Ariyalur', 'cmnvbslkd', 'closed', '2023-04-14 06:38:33.000000', 'not_seen', 'not_seen', 'Girl Dies Waiting In Queue At Gurgaon Hospital, Probe Ordered.jpg'),
(80, 'divya@gmail.com', 'General', 'Poverty', 'sggkj', 'sjflksjmcnx', 'Final Report -1 (1).docx', 'Ariyalur', 'iuerjsbc', 'closed', '2023-04-14 06:58:49.000000', 'not_seen', 'not_seen', 'download.jpg'),
(81, 'divya@gmail.com', 'Agriculture and Farmer Welfare', 'Soil erosion', 'wrtyuiop', 'we567890', '', 'Ariyalur', 'sdfghjkl', 'not yet processed', '2023-04-14 17:24:25.000000', 'not_seen', 'not_seen', ''),
(82, 'divya@gmail.com', 'Environment and Forest', 'Waste disposal', 'rtyui', 'ertyui', 'ISPC2018-SmartComplaintManagement.pdf', 'Ariyalur', 'ertyu8i', 'not yet processed', '2023-04-14 17:38:54.000000', 'not_seen', 'not_seen', 'What is Eco-Anxiety_ And 11 Tips to Help Manage.jpg'),
(83, 'divya@gmail.com', 'Municipal and Water Supply', 'Electricity', 'dfghjkl', 'ertyuio', 'Final Report -1 (1).docx', 'Ariyalur', 'werty', 'not yet processed', '2023-04-15 09:02:35.000000', 'not_seen', 'not_seen', 'WhatsApp Image 2023-04-14 at 9.04.30 PM.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tfeed`
--

CREATE TABLE `tfeed` (
  `id` int(250) NOT NULL,
  `umail` varchar(50) NOT NULL,
  `feedback` varchar(250) NOT NULL,
  `date` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `seen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE `transport` (
  `id` int(250) NOT NULL,
  `umail` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `cat` varchar(50) NOT NULL,
  `ctitle` varchar(250) NOT NULL,
  `cdetail` varchar(250) NOT NULL,
  `cdoc` varchar(250) NOT NULL,
  `district` varchar(50) NOT NULL,
  `place` varchar(250) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `seen` varchar(50) NOT NULL,
  `cseen` varchar(10) NOT NULL,
  `cimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transport`
--

INSERT INTO `transport` (`id`, `umail`, `department`, `cat`, `ctitle`, `cdetail`, `cdoc`, `district`, `place`, `status`, `date`, `seen`, `cseen`, `cimage`) VALUES
(5, 'divya@gmail.com', 'Transport', 'vehicle maintenance', 'dlshf', 'oiirtuhejd', 'Final Report -1.docx', 'Ariyalur', 'cmnvbslkd', 'closed', '2023-04-14 06:38:33.000000', 'seen', 'not_seen', 'Girl Dies Waiting In Queue At Gurgaon Hospital, Probe Ordered.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `trans_add`
--

CREATE TABLE `trans_add` (
  `id` int(250) NOT NULL,
  `cat` varchar(50) NOT NULL,
  `date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trans_add`
--

INSERT INTO `trans_add` (`id`, `cat`, `date`) VALUES
(1, 'vehicle maintenance', '2023-04-03 16:46:19.000000');

-- --------------------------------------------------------

--
-- Table structure for table `userreg`
--

CREATE TABLE `userreg` (
  `id` int(200) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `umail` varchar(50) NOT NULL,
  `pswd` varchar(50) NOT NULL,
  `cpswd` varchar(50) NOT NULL,
  `pno` bigint(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `reg_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `district` varchar(50) NOT NULL,
  `place` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userreg`
--

INSERT INTO `userreg` (`id`, `uname`, `umail`, `pswd`, `cpswd`, `pno`, `address`, `reg_date`, `district`, `place`) VALUES
(2, 'divya', 'divya@gmail.com', '123', '123', 1212121223, '12/29, wiihwit q , 2wdiug  ,trichy', '2023-04-14 02:34:08.244420', 'Trichy', 'Siruganur'),
(22, 'shone', 'shone@gmail.com', '12', '12', 9234567890, 'adress', '2023-04-08 12:19:42.000000', 'select', 'none'),
(23, 'Thiva', 'thiva@gmail.com', '12', '12', 9715162538, 'pennadam', '2023-04-09 06:04:22.000000', 'cuddalore', 'pennadam'),
(24, 'Thiru', 'thiru@gmail.com', '12', '12', 9723232323, 'pennadam', '2023-04-09 06:04:01.992043', 'cuddalore', 'pennadam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlog`
--
ALTER TABLE `adminlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `afeed`
--
ALTER TABLE `afeed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agriculture`
--
ALTER TABLE `agriculture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agri_add`
--
ALTER TABLE `agri_add`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edfeed`
--
ALTER TABLE `edfeed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edu_add`
--
ALTER TABLE `edu_add`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enfeed`
--
ALTER TABLE `enfeed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `environment`
--
ALTER TABLE `environment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `envi_add`
--
ALTER TABLE `envi_add`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general`
--
ALTER TABLE `general`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_add`
--
ALTER TABLE `general_add`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gfeed`
--
ALTER TABLE `gfeed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `health`
--
ALTER TABLE `health`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `health_add`
--
ALTER TABLE `health_add`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hfeed`
--
ALTER TABLE `hfeed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mfeed`
--
ALTER TABLE `mfeed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `municipal`
--
ALTER TABLE `municipal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `muni_add`
--
ALTER TABLE `muni_add`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regcomplaint`
--
ALTER TABLE `regcomplaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tfeed`
--
ALTER TABLE `tfeed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_add`
--
ALTER TABLE `trans_add`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userreg`
--
ALTER TABLE `userreg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlog`
--
ALTER TABLE `adminlog`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `afeed`
--
ALTER TABLE `afeed`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `agriculture`
--
ALTER TABLE `agriculture`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `agri_add`
--
ALTER TABLE `agri_add`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `edfeed`
--
ALTER TABLE `edfeed`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `edu_add`
--
ALTER TABLE `edu_add`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `enfeed`
--
ALTER TABLE `enfeed`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `environment`
--
ALTER TABLE `environment`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `envi_add`
--
ALTER TABLE `envi_add`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `general`
--
ALTER TABLE `general`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `general_add`
--
ALTER TABLE `general_add`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gfeed`
--
ALTER TABLE `gfeed`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `health`
--
ALTER TABLE `health`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `health_add`
--
ALTER TABLE `health_add`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hfeed`
--
ALTER TABLE `hfeed`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mfeed`
--
ALTER TABLE `mfeed`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `municipal`
--
ALTER TABLE `municipal`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `muni_add`
--
ALTER TABLE `muni_add`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `regcomplaint`
--
ALTER TABLE `regcomplaint`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `tfeed`
--
ALTER TABLE `tfeed`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transport`
--
ALTER TABLE `transport`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trans_add`
--
ALTER TABLE `trans_add`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userreg`
--
ALTER TABLE `userreg`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
