-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 18, 2024 at 06:23 PM
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
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Start',
  `StaffID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobdetails`
--

INSERT INTO `jobdetails` (`jobDetailID`, `jobID`, `status`, `StaffID`) VALUES
(2, 71, 'Start', 19),
(3, 72, 'Start', 17),
(4, 73, 'Progressing', 27),
(5, 74, 'Start', 19);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `jobID` int NOT NULL,
  `nameJob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateStart` datetime NOT NULL,
  `dateEnd` datetime NOT NULL,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `userID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`jobID`, `nameJob`, `dateStart`, `dateEnd`, `file`, `note`, `userID`) VALUES
(71, 'Vẽ sơ đồ usecase', '2024-02-18 10:18:00', '2024-02-20 10:18:00', '20240218101916.png', 'ví dụ như file ảnh', 1),
(72, 'Thiết kế UI/UX', '2024-02-18 11:13:00', '2024-02-20 11:13:00', '20240218111403.png', 'Màu chủ đạo theo logo ảnh', 1),
(73, 'Vẽ sơ đồ usecase', '2024-02-17 11:18:00', '2024-02-19 11:18:00', '20240218111838.', '', 1),
(74, 'Tạo danh sách người dùng', '2024-02-18 21:41:00', '2024-02-20 21:43:00', '20240218214300.sql', ' dữ liệu nằm trong  file sql', 1);

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
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nameUser` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nameCompany` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `email`, `password`, `avatar`, `phone`, `position`, `nameUser`, `nameCompany`, `status`) VALUES
(1, 'nguyethue1905@gmail.com', 'huevan', '', '0785797648', 'Trưởng nhóm thiết kế', 'Nguyệt Huế', 'Đông Tây Promotion', 'Manager'),
(14, 'diemvtn@gmail.com', '147', NULL, '0147965656', 'Chuyên viên marketting', 'Ngọc Diểm', 'Đông Tây Promotion', 'Staff'),
(16, 'trang@gmail.com', '12345', NULL, '0325974569', 'FrontEnd development', 'Phương Trang', 'Đông Tây Promotion', 'Manager'),
(17, 'yenkinh147@gmail.com', '123456789', NULL, '0258369147', 'Backend Development', 'Yến Kính', 'Đông Tây Promotion', 'Staff'),
(18, 'vinh@gmail.com', '147', NULL, '0147258321', 'Backend Development', 'Phước Vinh', 'Đông Tây Promotion', 'Staff'),
(19, 'Tam@gmail.com', '12369', NULL, '0258931476', 'Designer', 'Thành Tâm ', 'Đông Tây Promotion', 'Staff'),
(24, 'tinh123@gmail.com', '123', NULL, '0578675697', 'Design UI/UX', 'Hữu Tình', 'Đông Tây Promotion', 'Staff'),
(27, 'minhtam@gmail.com', '0147', NULL, '0235869145', 'fullstack', 'Minh Tâm', 'Đông Tây Promotion', 'Staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobdetails`
--
ALTER TABLE `jobdetails`
  ADD PRIMARY KEY (`jobDetailID`),
  ADD KEY `userID` (`StaffID`),
  ADD KEY `jobID` (`jobID`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`jobID`),
  ADD KEY `userID1` (`userID`);

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
  MODIFY `jobDetailID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `jobID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobdetails`
--
ALTER TABLE `jobdetails`
  ADD CONSTRAINT `jobdetails_ibfk_1` FOREIGN KEY (`StaffID`) REFERENCES `users` (`userID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
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
