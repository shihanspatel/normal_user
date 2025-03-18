-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 18, 2025 at 11:13 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `noraml_user`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `mobilenumber` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `c_password` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `status` varchar(255) NOT NULL DEFAULT 'inactive',
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `title`, `firstname`, `lastname`, `gender`, `email`, `Address`, `mobilenumber`, `password`, `c_password`, `images`, `role`, `status`, `token`) VALUES
(33, 'Mr', 'shivlo', 'vadodariya', 'Male', 'abc@gmail.com', 'cvbnmuytdfvghjkl', '8780074890', 'Shivlo@123', '$2y$10$zFoaUKZN1xnJ1Ay0UHUOp.IHG928IQn5b/k63vW5z9qW9pNh7KabO', 'Screenshot 2025-03-12 193853.png', 'admin', 'active', '1742100555'),
(34, 'Mr', 'shivlo', 'vadodariya', 'Male', 'svadodariya358@rku.ac.in', 'hello my name is shihans ', '9924052001', 'Shihanspatel07@23', '$2y$10$YHSQBEGHdbeJY1xfunRfxOF.FfxyThWF2MtsIX8RRO3fUGluGxK4W', 'Screenshot 2025-03-12 193853.png', 'user', 'inactive', '1742104940'),
(37, 'Mr', 'shubham', 'patel', 'Male', 'shihanspatel07@gmail.com', 'kem palti lagbhaj done ho', '8780074890', 'Shihans@123', '$2y$10$1bfKaQKtyAfxxAtJNZuRi.5heQl9CMvMOAmUbSh0cnlKl3qGIlpJG', 'images (1).jpg', 'user', 'active', '1742225790'),
(38, 'Mr', 'shivlo', 'vadodariya', 'Male', 'shihanspatel07@gmail.comw', 'hello my name is shihans', '1234567898', 'SShhiihhaannss@123', '$2y$10$ZR71PWiHbdDD1hoIxG4/S.R09OwIayhCfVfqUpQngDwZXlAeIAq/O', 'Screenshot 2025-03-12 193853.png', 'admin', 'inactive', '1742230025');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
