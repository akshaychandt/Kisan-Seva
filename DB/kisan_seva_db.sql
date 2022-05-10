-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2022 at 09:27 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kisan_seva_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tb`
--

CREATE TABLE `admin_tb` (
  `id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `record_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_tb`
--

INSERT INTO `admin_tb` (`id`, `login_id`, `name`, `email`, `phone`, `record_status`) VALUES
(2, 1, 'Akshay', 'akshay@gmail.com', '89895623588', 1),
(3, 6, '', '', '', 1),
(4, 7, '', '', '', 1),
(5, 8, '', '', '', 1),
(6, 9, '', '', '', 1),
(7, 10, 'Dheeraj', 'dheeraj@gmail.com', '8985684788', 1);

-- --------------------------------------------------------

--
-- Table structure for table `agriculture_officer_tb`
--

CREATE TABLE `agriculture_officer_tb` (
  `id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `record_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agriculture_officer_tb`
--

INSERT INTO `agriculture_officer_tb` (`id`, `login_id`, `name`, `email`, `phone`, `record_status`) VALUES
(1, 2, 'Arun', 'arun@gmail.com', '6258963214', 1),
(2, 4, 'Varun', 'varun@gmail.com', '8985684788', 1),
(3, 16, 'Dheeraj', 'dheeraj@gmail.com', '0098787666', 1);

-- --------------------------------------------------------

--
-- Table structure for table `complaints_tb`
--

CREATE TABLE `complaints_tb` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `complaint` varchar(500) NOT NULL,
  `reply` varchar(500) NOT NULL,
  `record_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints_tb`
--

INSERT INTO `complaints_tb` (`id`, `user_id`, `complaint`, `reply`, `record_status`) VALUES
(1, 1, 'Error', 'Solved', 1),
(2, 4, 'Error', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `crops_tb`
--

CREATE TABLE `crops_tb` (
  `id` int(11) NOT NULL,
  `crops` varchar(500) NOT NULL,
  `Photo` varchar(500) NOT NULL,
  `season` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `record_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crops_tb`
--

INSERT INTO `crops_tb` (`id`, `crops`, `Photo`, `season`, `description`, `record_status`) VALUES
(1, 'Wheat', '1378069181.jpg', 'Rabi', 'Help control your weight: The fiber found in many carbohydrates helps you feel full.\r\nProtect against some diseases: Whole grains can help lower your risk of cardiovascular disease.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doubts_tb`
--

CREATE TABLE `doubts_tb` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `doubts` varchar(500) NOT NULL,
  `solution` varchar(500) NOT NULL,
  `record_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doubts_tb`
--

INSERT INTO `doubts_tb` (`id`, `user_id`, `doubts`, `solution`, `record_status`) VALUES
(1, 5, 'treyy', 'wfwfiohj', 1);

-- --------------------------------------------------------

--
-- Table structure for table `farmers_tb`
--

CREATE TABLE `farmers_tb` (
  `id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `record_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmers_tb`
--

INSERT INTO `farmers_tb` (`id`, `login_id`, `name`, `email`, `phone`, `record_status`) VALUES
(1, 5, 'Jyothis', 'jyothis@gmail.com', '6856321475', 1),
(2, 0, '$name', '$email', '$phone', 1),
(3, 15, 'Bemal', 'bemal@gmail.com', '9855885685', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks_tb`
--

CREATE TABLE `feedbacks_tb` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `feedbacks` varchar(500) NOT NULL,
  `reply` varchar(500) NOT NULL,
  `record_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedbacks_tb`
--

INSERT INTO `feedbacks_tb` (`id`, `user_id`, `feedbacks`, `reply`, `record_status`) VALUES
(1, 1, 'Good', 'Thanks\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fertilizer_tb`
--

CREATE TABLE `fertilizer_tb` (
  `id` int(11) NOT NULL,
  `fertilizer` varchar(500) NOT NULL,
  `usage` varchar(500) NOT NULL,
  `record_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fertilizer_tb`
--

INSERT INTO `fertilizer_tb` (`id`, `fertilizer`, `usage`, `record_status`) VALUES
(1, 'Espoma Organic Plant Tone', 'Espoma Organic fertilizers contain the inorganic minerals nitrogen, phosphorus, and potassium in lower amounts (5-3-3) and organic materials derived from plants and animals. The organic matter helps improve water movement within the soil and feeds beneficial microbes. Since organic fertilizers are less potent, it reduces the risk of burning plants from over-fertilization.', 1),
(2, 'Dr. Earth Home Grown Organic Tomato, Vegetable, & Herb Fertilizer', 'Dr. Earth’s organic fertilizer can help you achieve the results you desire for tomatoes. The 4-6-3 NPK formula includes calcium for proper new growth development and fish-based organic matter. The 4-pound bag will cover up to 60-square-feet (that’s lots of tomatoes!) and is also excellent for berries, leafy greens, and root vegetables.', 1),
(3, 'Hyponex All-Purpose 10-10-10 Garden Fertilizer', 'While it’s best to test the soil every year, a fast-release granular inorganic fertilizer like Hyponex with an NPK of 10-10-10 will give the seeds and seedlings a good boost toward maturity and vegetable production. Because it is fast-release, it will need to be reapplied every two weeks and watered in well. The usage rate is 2.5-pounds per 100-square-feet so the 40-pound bag may be all you need for the entire season.', 1),
(4, 'Hyponex All-Purpose 10-10-10 Garden Fertilizer', 'While it’s best to test the soil every year, a fast-release granular inorganic fertilizer like Hyponex with an NPK of 10-10-10 will give the seeds and seedlings a good boost toward maturity and vegetable production. Because it is fast-release, it will need to be reapplied every two weeks and watered in well. The usage rate is 2.5-pounds per 100-square-feet so the 40-pound bag may be all you need for the entire season.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ideas_tb`
--

CREATE TABLE `ideas_tb` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `ideas` varchar(500) NOT NULL,
  `record_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ideas_tb`
--

INSERT INTO `ideas_tb` (`id`, `date`, `ideas`, `record_status`) VALUES
(1, '2022-05-06', 'dqww', 1),
(2, '2022-05-06', 'wgw5', 0);

-- --------------------------------------------------------

--
-- Table structure for table `login_tb`
--

CREATE TABLE `login_tb` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_tb`
--

INSERT INTO `login_tb` (`id`, `username`, `password`, `role`) VALUES
(1, 'akshay', 'test', 'Admin'),
(2, 'arun', 'test', 'Agriculture_Officer'),
(3, 'ritwik', 'test', 'Technical_Staff'),
(4, 'varun', 'test', 'Agriculture_Officer'),
(5, 'jyothis', 'test', 'Farmer'),
(6, '', '', 'Admin'),
(7, '', '', 'Admin'),
(8, '', '', 'Admin'),
(9, '', '', 'Admin'),
(10, 'dheeraj', 'test', 'Admin'),
(11, '', '', 'Farmer'),
(12, '', '', 'Farmer'),
(13, 'bemal', 'test', 'Farmer'),
(14, '$username', '$password', 'Farmer'),
(15, 'bemal', 'test', 'Farmer'),
(16, 'dheeraj', 'test', 'Agriculture_Officer');

-- --------------------------------------------------------

--
-- Table structure for table `notifications_tb`
--

CREATE TABLE `notifications_tb` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `notification` varchar(500) NOT NULL,
  `record_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pesticides_tb`
--

CREATE TABLE `pesticides_tb` (
  `id` int(11) NOT NULL,
  `pesticides` varchar(500) NOT NULL,
  `usage` varchar(500) NOT NULL,
  `record_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesticides_tb`
--

INSERT INTO `pesticides_tb` (`id`, `pesticides`, `usage`, `record_status`) VALUES
(1, 'Alachlor', '‐Herbicide on corn, soybeans, dry beans, and sunflowers\n‐Threat to drinking water through runoff\n‐Many formulations Cancelled\n‐Restricted Use Pesticide (RUP)***', 1);

-- --------------------------------------------------------

--
-- Table structure for table `request_tb`
--

CREATE TABLE `request_tb` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `request_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_tb`
--

INSERT INTO `request_tb` (`id`, `user_id`, `request_status`) VALUES
(1, 2, 2),
(2, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stock_tb`
--

CREATE TABLE `stock_tb` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `stock` varchar(500) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `record_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_tb`
--

INSERT INTO `stock_tb` (`id`, `date`, `stock`, `quantity`, `record_status`) VALUES
(1, '2022-05-05', 'Tractor', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `technicalstaff_tb`
--

CREATE TABLE `technicalstaff_tb` (
  `id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `record_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `technicalstaff_tb`
--

INSERT INTO `technicalstaff_tb` (`id`, `login_id`, `name`, `email`, `phone`, `record_status`) VALUES
(1, 3, 'Ritwik', 'ritwik@gmail.com', '9685987456', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tb`
--
ALTER TABLE `admin_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agriculture_officer_tb`
--
ALTER TABLE `agriculture_officer_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints_tb`
--
ALTER TABLE `complaints_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crops_tb`
--
ALTER TABLE `crops_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doubts_tb`
--
ALTER TABLE `doubts_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farmers_tb`
--
ALTER TABLE `farmers_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks_tb`
--
ALTER TABLE `feedbacks_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fertilizer_tb`
--
ALTER TABLE `fertilizer_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ideas_tb`
--
ALTER TABLE `ideas_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_tb`
--
ALTER TABLE `login_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications_tb`
--
ALTER TABLE `notifications_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesticides_tb`
--
ALTER TABLE `pesticides_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_tb`
--
ALTER TABLE `request_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_tb`
--
ALTER TABLE `stock_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technicalstaff_tb`
--
ALTER TABLE `technicalstaff_tb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tb`
--
ALTER TABLE `admin_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `agriculture_officer_tb`
--
ALTER TABLE `agriculture_officer_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `complaints_tb`
--
ALTER TABLE `complaints_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `crops_tb`
--
ALTER TABLE `crops_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doubts_tb`
--
ALTER TABLE `doubts_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `farmers_tb`
--
ALTER TABLE `farmers_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedbacks_tb`
--
ALTER TABLE `feedbacks_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fertilizer_tb`
--
ALTER TABLE `fertilizer_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ideas_tb`
--
ALTER TABLE `ideas_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_tb`
--
ALTER TABLE `login_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notifications_tb`
--
ALTER TABLE `notifications_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesticides_tb`
--
ALTER TABLE `pesticides_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `request_tb`
--
ALTER TABLE `request_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stock_tb`
--
ALTER TABLE `stock_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `technicalstaff_tb`
--
ALTER TABLE `technicalstaff_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
