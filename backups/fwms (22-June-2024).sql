-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2024 at 12:17 PM
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
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `feedback_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `user_id`, `comment`, `rating`, `feedback_type`) VALUES
(1, 0, 'test', 0, ''),
(2, 24, 'test', 1, 'recipe_suggestions'),
(3, 24, 'testestsetsetestsetsettestestsetsetestsetsettestestsetsetestsetsettestestsetsetestsetsettestestsetsetestsetsettestestsetsetestsetsettestestsetsetestsetsettestestsetsetestsetsettestestsetsetestsetsettestestsetsetestsetsettestestsetsetestsetsettestestsetset', 5, 'recipe_suggestions'),
(4, 24, 'hassa', 6, 'overall_ux'),
(5, 24, 'ts', 2, 'storage_tips'),
(6, 24, 'ggdg', 1, 'recipe_suggestions'),
(7, 24, '', 3, 'recipe_suggestions');

-- --------------------------------------------------------

--
-- Table structure for table `fooditem`
--

CREATE TABLE `fooditem` (
  `item_id` int(11) NOT NULL,
  `sku` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `expiry_date` date NOT NULL,
  `storage_location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fooditem`
--

INSERT INTO `fooditem` (`item_id`, `sku`, `user_id`, `item_name`, `quantity`, `expiry_date`, `storage_location`) VALUES
(6, 2147483647, 24, 'juice box', 50, '2024-06-19', 'lhr_branch'),
(11, 539159491, 24, 'apples', 4654, '2024-06-13', 'lhr_branch'),
(12, 2147483647, 24, 'Chicken (500g)', 20, '2024-08-10', 'lhr_branch'),
(13, 2147483647, 24, 'Beef (1kg Packs)', 15, '2024-09-21', 'khi_branch'),
(14, 786312969, 24, 'Dough', 20, '2024-08-30', 'lhr_branch'),
(15, 2147483647, 24, 'Onion', 50, '2024-07-18', 'rwp_branch'),
(16, 2147483647, 24, 'Tomato', 25, '2024-07-23', 'rwp_branch'),
(17, 2147483647, 24, 'Shawarma Bread', 20, '2024-08-24', 'rwp_branch');

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `recipe_id` int(11) NOT NULL,
  `recipe_name` varchar(255) NOT NULL,
  `cuisine` varchar(255) NOT NULL,
  `meal_type` varchar(255) NOT NULL,
  `cooking_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `storage_tip`
--

CREATE TABLE `storage_tip` (
  `tip_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `food_category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `storage_tip`
--

INSERT INTO `storage_tip` (`tip_id`, `description`, `food_category`) VALUES
(1, 'Keep bananas at room temperature until they ripen. Once ripe, store them in the refrigerator to extend their shelf life by a few days.', 'fruits'),
(2, 'Store berries in a single layer in a shallow container lined with paper towels to absorb moisture. Do not wash until ready to eat.', 'fruits'),
(3, 'Keep bread in a cool, dry place, preferably in a bread box. Avoid storing it in the refrigerator, as it will dry out faster.', 'bakery_items'),
(4, 'Wrap cheese in wax paper or parchment paper and then place it in a loose plastic bag. Store in the vegetable drawer of the refrigerator.', 'dairy_items'),
(5, 'Store cucumbers at room temperature. Refrigeration can cause them to become waterlogged and develop pitting.', 'vegetables'),
(6, 'Store eggs in their original carton on a refrigerator shelf, not in the door, to maintain a consistent temperature.', 'dairy_items'),
(7, 'Keep garlic in a cool, dark place with good air circulation. A mesh bag or paper bag works well.', 'vegetables'),
(8, 'Store fresh herbs in the refrigerator with their stems submerged in water, covered loosely with a plastic bag. Change the water every few days.', 'vegetables'),
(9, 'Wrap washed and dried lettuce in paper towels and store in a plastic bag or container in the refrigerator to keep it crisp.', 'vegetables'),
(10, 'Store milk on a refrigerator shelf, not in the door, to keep it at a consistent, cold temperature.', 'dairy_items'),
(11, 'Keep mushrooms in a paper bag in the refrigerator to prevent moisture buildup, which can cause spoilage.', 'vegetables'),
(12, 'Store nuts in the refrigerator or freezer in an airtight container to prevent them from going rancid.', 'dry_fruits'),
(13, 'Store onions in a cool, dry, well-ventilated area away from potatoes, as they can cause each other to spoil faster.', 'vegetables'),
(14, 'Store tomatoes at room temperature away from direct sunlight. Refrigeration can alter their texture and flavor.', 'vegetables'),
(15, 'Keep yogurt in the coldest part of the refrigerator, typically on a shelf rather than in the door, to maintain its freshness.', 'dairy_items');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
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

INSERT INTO `users` (`user_id`, `username`, `f_name`, `l_name`, `dob`, `gender`, `email`, `password`, `dietary_preference`, `allergy_info`) VALUES
(1, 'admin', 'Super', 'Admin', '2000-01-01', 'Male', 'admin@admin.com', 'admin@123', 'none', 'none'),
(24, 'hassan', 'Hassan', 'Zahid', '2025-07-10', 'male', 'hassan@test.com', '123', 'gluten_free', 'lactose_intolerance'),
(25, 'female', 'female', '1', '2016-07-11', 'female', 'user@user.com', '123', 'vegan', 'egg_allergy'),
(26, 'farooq', 'M', 'Farooq', '2000-02-11', 'male', 'farooq@test.com', '123', 'vegan', 'egg_allergy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `fooditem`
--
ALTER TABLE `fooditem`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`recipe_id`);

--
-- Indexes for table `storage_tip`
--
ALTER TABLE `storage_tip`
  ADD PRIMARY KEY (`tip_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fooditem`
--
ALTER TABLE `fooditem`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `recipe_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `storage_tip`
--
ALTER TABLE `storage_tip`
  MODIFY `tip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
