-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2024 at 08:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fwms`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dietary_preference` varchar(255) NOT NULL,
  `allergy_info` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `f_name`, `l_name`, `dob`, `gender`, `email`, `password`, `dietary_preference`, `allergy_info`) VALUES
(1, '', '', '0000-00-00', 'option1', '', '', 'Vegan', 'Egg_Allergy'),
(2, '', '', '0000-00-00', 'option1', '', '', 'Vegan', 'Egg_Allergy'),
(3, 'Hassan', 'Zahid', '2018-07-08', 'option2', 'hassan@hassan.com', 'hkdshdjhjdksa', 'Vegetarian', 'Lactose_Intolerance'),
(4, 'Hassan', 'Zahid', '2018-07-08', 'option2', 'hassan@hassan.com', 'hkdshdjhjdksa', 'Vegetarian', 'Lactose_Intolerance'),
(5, 'has', 'jl', '0000-00-00', 'option1', '', '', 'Vegan', 'Egg_Allergy'),
(6, '', '', '0000-00-00', 'option1', '', '', 'Vegan', 'Egg_Allergy'),
(7, 'f', '', '0000-00-00', 'option1', '', '', 'Vegan', 'Egg_Allergy'),
(8, 'd', '', '0000-00-00', 'option1', '', '', 'Vegan', 'Egg_Allergy'),
(9, 'd', '', '0000-00-00', 'option1', '', '', 'Vegan', 'Egg_Allergy'),
(10, 'd', '', '0000-00-00', 'option1', '', '', 'Vegan', 'Egg_Allergy'),
(11, '', '', '0000-00-00', 'option1', '', '', 'Vegan', 'Egg_Allergy'),
(12, 'sfsdfsdfsdfs', '', '0000-00-00', 'option1', '', '', 'Vegan', 'Egg_Allergy'),
(13, 'sfsdfsdfsdfs', '', '0000-00-00', 'option1', '', '', 'Vegan', 'Egg_Allergy'),
(14, '', '', '0000-00-00', 'option1', '', '', 'Vegan', 'Egg_Allergy'),
(15, '', '', '0000-00-00', 'option1', '', '', 'Vegan', 'Egg_Allergy'),
(16, 'as', '', '0000-00-00', 'option2', '', '', 'Vegan', 'Egg_Allergy'),
(17, 'hassan', 'zhaid', '2024-06-06', 'female', '', '', 'Vegan', 'Egg_Allergy'),
(18, 'hassan', 'zahid', '2000-01-01', 'male', 'hassan@hassan.com', 'hassan123_', 'vegan', 'egg_allergy'),
(19, 'hassan', 'zahid', '2024-01-02', 'male', 'admin@f.c', 'NC9Hy!88^&F[', 'vegan', 'none'),
(20, 'hassan', 'zhaid', '2024-06-19', 'male', 'fdsfsd@fsdf.fsdfsd', 'q465465', 'vegetarian', 'egg_allergy'),
(21, 'hassanzahid', 'hassanzahid', '2000-07-05', 'male', 'hassan@test.com', '123', 'vegan', 'egg_allergy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
