-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 06, 2024 at 05:17 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `work`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobdetails`
--

CREATE TABLE `jobdetails` (
  `jobDetailID` int NOT NULL,
  `jobID` int NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `jobID` int NOT NULL,
  `nameJob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateStart` datetime NOT NULL,
  `dateEnd` datetime NOT NULL,
  `userID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`jobID`, `nameJob`, `dateStart`, `dateEnd`, `userID`) VALUES
(1, 'Code giao diện HTML/CSS', '2024-02-02 07:24:05', '2024-02-02 07:24:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nameUser` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nameCompany` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gander` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `email`, `password`, `avatar`, `phone`, `address`, `nameUser`, `nameCompany`, `gander`, `position`) VALUES
(1, 'nguyethue1905@gmail.com', '123456', '', '', '', 'Nguyệt Huế', 'Đông Tây Promotion', 'Female', 'Manager'),
(14, 'huevtn@gmail.com', '147', NULL, NULL, NULL, 'Huế 8', NULL, NULL, 'Staff'),
(16, 'trang@gmail.com', '12345', NULL, NULL, NULL, 'Phương Trang', NULL, NULL, 'Staff'),
(17, 'trang147@gmail.com', '123456789', NULL, NULL, NULL, 'Phương Trang 2', NULL, NULL, 'Staff'),
(18, 'vinh@gmail.com', '147', NULL, NULL, NULL, 'Vinh', NULL, NULL, 'Staff'),
(19, 'Tam@gmail.com', '12369', NULL, NULL, NULL, 'Tâm ', NULL, NULL, 'Staff'),
(24, 'nguyethue105@gmail.com', '123', NULL, NULL, NULL, 'van', NULL, NULL, 'Staff'),
(25, 'nguyethue15@gmail.com', 'zxcv', NULL, NULL, NULL, 'vanasdfghj', NULL, NULL, 'Staff'),
(26, 'vinh111@gmail.com', '123456789', NULL, NULL, NULL, 'Vinh123', NULL, NULL, 'Staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobdetails`
--
ALTER TABLE `jobdetails`
  ADD PRIMARY KEY (`jobDetailID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `jobID` (`jobID`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`jobID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobdetails`
--
ALTER TABLE `jobdetails`
  MODIFY `jobDetailID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `jobID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobdetails`
--
ALTER TABLE `jobdetails`
  ADD CONSTRAINT `jobdetails_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `jobdetails_ibfk_2` FOREIGN KEY (`jobID`) REFERENCES `jobs` (`jobID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
