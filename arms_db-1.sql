-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2025 at 06:23 AM
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
-- Database: `arms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `activity_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `activity_type` varchar(50) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `barangay` varchar(50) DEFAULT NULL,
  `rsba_number` varchar(20) DEFAULT NULL,
  `activity_image` varchar(255) NOT NULL,
  `activity_caption` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`activity_id`, `user_id`, `activity_type`, `timestamp`, `barangay`, `rsba_number`, `activity_image`, `activity_caption`) VALUES
(6, 4, 'Fertilizing', '2025-01-10 10:17:28', 'Poblacion 3', '2021308459', 'Screenshot 2024-11-12 203353.png', 'asfva'),
(7, 4, 'Fertilizing', '2025-01-10 10:33:34', 'Poblacion 3', '2021308459', 'Screenshot 2024-11-12 203353.png', 'jhfjksncsa'),
(8, 4, 'Fertilizing', '2025-01-10 10:35:16', 'Poblacion 3', '2021308459', 'Screenshot 2024-11-12 230337.png', 'helloemknvknasv'),
(9, 4, 'Spraying', '2025-01-10 12:55:02', 'Poblacion 3', '2021308459', 'Screenshot 2024-11-12 203353.png', 'naaeasad'),
(10, 4, 'Spraying', '2025-01-10 13:19:04', 'Poblacion 3', '2021308459', 'Screenshot 2024-11-12 203353.png', 'jcajscjc'),
(11, 4, 'Fertilizing', '2025-01-10 13:58:25', 'Poblacion 3', '2021308459', 'Screenshot 2024-11-12 203353.png', 'dfwfwrf'),
(12, 4, 'Weeding', '2025-01-10 14:48:14', 'Poblacion 3', '2021308459', 'Screenshot 2024-11-12 203353.png', 'yes'),
(17, 4, 'Weeding', '2025-01-10 14:50:21', 'Poblacion 3', '2021308459', 'Screenshot 2024-11-12 203353.png', 'yes'),
(18, 4, 'Weeding', '2025-01-10 14:50:57', 'Poblacion 3', '2021308459', 'Screenshot 2024-11-12 203353.png', 'yes'),
(19, 4, 'Weeding', '2025-01-10 15:04:25', 'Poblacion 3', '2021308459', 'Screenshot 2024-11-12 203343.png', 'hhhhhh'),
(20, 4, 'Fertilizing', '2025-01-10 16:34:51', 'Poblacion 3', '2021308459', 'Screenshot 2024-11-12 203303.png', 'Ruthchelle'),
(21, 4, 'Fertilizing', '2025-01-10 16:35:15', 'Poblacion 3', '2021308459', 'Screenshot 2024-11-12 203303.png', 'Ruthchelle'),
(22, 4, 'Fertilizing', '2025-01-10 16:36:05', 'Poblacion 3', '2021308459', 'Screenshot 2024-11-12 203303.png', 'Ruthchelle'),
(23, 4, 'Harvesting', '2025-01-10 23:27:48', 'Poblacion 3', '2021308459', 'Screenshot 2024-11-12 203353.png', 'ikatulo nani'),
(24, 4, 'Fertilizing', '2025-01-11 02:51:41', 'Poblacion 3', '2021308459', 'Screenshot 2024-11-12 203353.png', 'Done'),
(25, 4, 'Harvesting', '2025-01-11 02:53:50', 'Poblacion 3', '2021308459', 'Screenshot 2024-11-12 203353.png', '10 sacks of kjaax'),
(26, 4, 'Harvesting', '2025-01-11 05:37:03', 'Poblacion 3', '2021308459', 'Screenshot 2024-11-12 203353.png', 'yesterday'),
(27, 4, 'Fertilizing', '2025-01-11 07:13:16', 'Poblacion 3', '2021308459', 'Screenshot 2024-11-12 203353.png', 'samokkk'),
(28, 4, 'Fertilizing', '2025-01-12 03:35:07', 'Poblacion 3', '2021308459', 'Screenshot 2024-11-12 203343.png', 'firts fertilizing'),
(29, 4, 'Harvesting', '2025-01-12 03:36:35', 'Poblacion 3', '2021308459', 'Screenshot 2024-11-12 202929.png', 'finallyyyy'),
(30, 4, 'Weeding', '2025-01-12 03:39:29', 'Poblacion 3', '2021308459', 'Screenshot 2024-11-12 083050.png', 'lastttt'),
(31, 4, 'Fertilizing', '2025-01-13 06:48:14', 'Poblacion 3', '2021308459', 'Screenshot 2024-11-12 203343.png', 'fineee'),
(32, 10, 'Weeding', '2025-01-14 21:33:26', 'Kimaya', '5647382910', 'Screenshot 2024-11-11 223448.png', 'jbhjew'),
(33, 10, 'Seeding', '2025-01-14 21:36:33', 'Kimaya', '5647382910', 'Screenshot (1).png', 'last harvest'),
(34, 4, 'Land Preparation', '2025-01-15 16:12:09', 'Poblacion 3', '2021308459', '678156fe-2ad7-4db4-982f-62efb5da99a0.jpg', 'shhhh'),
(35, 16, 'Land Preparation', '2025-01-17 08:32:25', 'Kimaya', '564738', 'Vero_Wallpaper_03_3840x2400.jpg', 'jfewkfke');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `password`, `created_at`) VALUES
(4, 'DA.gov@2024', '$2y$10$xdOvPHMPrTxDeLERu218ge0VbGa38BGr0J4F5atatLU.ptFqLIpP2', '2025-01-18 01:45:46');

-- --------------------------------------------------------

--
-- Table structure for table `distribution_batches`
--

CREATE TABLE `distribution_batches` (
  `batch_id` varchar(20) NOT NULL,
  `batch_name` varchar(50) DEFAULT NULL,
  `batch_number` varchar(20) DEFAULT NULL,
  `total_quantity` int(11) DEFAULT NULL,
  `remaining_quantity` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `distribution_batches`
--

INSERT INTO `distribution_batches` (`batch_id`, `batch_name`, `batch_number`, `total_quantity`, `remaining_quantity`, `created_at`) VALUES
('', 'Seeds', '1', 200000, 200000, '2025-01-18 00:02:21'),
('BATCH-1737079251', 'Seeds', '5', 1000, 1000, '2025-01-18 00:02:21'),
('BATCH-1737079341', 'Seeds', '9', 1000, 1000, '2025-01-18 00:02:21'),
('BATCH-1737079549', 'Seeds', '20', 100, 100, '2025-01-18 00:02:21'),
('BATCH-1737079577', 'Seeds', '1', 123, 123, '2025-01-18 00:02:21'),
('BATCH-1737079652', 'Fertilizer', '3', 1900, 1900, '2025-01-18 00:02:21'),
('BATCH-1737084646', 'Fertilizer', '1', 12, 12, '2025-01-18 00:02:21'),
('BATCH-1737084843', 'Seeds', '1', 9000, 9000, '2025-01-18 00:02:21'),
('BATCH-1737085176', 'Seeds', '5', 9000, 9000, '2025-01-18 00:02:21'),
('BATCH-1737085996', 'Seeds', '12', 346, 346, '2025-01-18 00:02:21'),
('BATCH-1737086126', 'Pesticide', '5', 34, 34, '2025-01-18 00:02:21'),
('BATCH-1737130259', 'Cash', '1', 900, 900, '2025-01-18 00:10:59');

-- --------------------------------------------------------

--
-- Table structure for table `distribution_records`
--

CREATE TABLE `distribution_records` (
  `record_id` int(11) NOT NULL,
  `batch_id` varchar(20) DEFAULT NULL,
  `distributed_quantity` int(11) DEFAULT NULL,
  `distributed_to` varchar(100) DEFAULT NULL,
  `date_distributed` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `farmers`
--

CREATE TABLE `farmers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `rsba_no` varchar(50) DEFAULT NULL,
  `contact_no` varchar(15) DEFAULT NULL,
  `barangay` varchar(100) DEFAULT NULL,
  `home_address` varchar(255) DEFAULT NULL,
  `farm_size` decimal(10,2) DEFAULT NULL,
  `farm_location` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `farmers_records`
--

CREATE TABLE `farmers_records` (
  `record_id` int(11) NOT NULL,
  `rsba_number` varchar(20) DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `home_address` varchar(100) DEFAULT NULL,
  `contact_number` varchar(15) DEFAULT NULL,
  `farm_location` varchar(100) DEFAULT NULL,
  `farm_size` decimal(10,2) DEFAULT NULL,
  `barangay` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `middle_initial` char(1) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `rsba_number` varchar(20) DEFAULT NULL,
  `contact_number` varchar(15) DEFAULT NULL,
  `barangay` varchar(50) DEFAULT NULL,
  `home_address` varchar(100) DEFAULT NULL,
  `farm_size` decimal(10,2) DEFAULT NULL,
  `farm_unit` enum('hectares','sqm','acres') DEFAULT NULL,
  `farm_location` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` enum('pending','approved','denied') DEFAULT 'pending',
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `middle_initial`, `last_name`, `rsba_number`, `contact_number`, `barangay`, `home_address`, `farm_size`, `farm_unit`, `farm_location`, `password`, `status`, `profile_picture`) VALUES
(2, 'Andrea', 'A', 'Ellorin', '2021308332112', '+639123412214', 'Dayawan', 'Purronksamcksmc', 12.00, 'sqm', '1345', '$2y$10$id3Lwr/5tTqVl638vTSAAO5/6.CgsEIoef0HWOUgeza6MZs/BBP2e', 'approved', NULL),
(3, 'Ruthchelle', 'A', 'Hambre', '202130833277', '+639123412233', 'Dayawan', 'Purok 12', 13.00, 'sqm', '134', '$2y$10$CrUbEY009yUxAHjfoBKmKuU0BeI8bviIvKCVkLbL1ba3O4PSu/BCO', 'approved', NULL),
(4, 'Ruthchelle', 'A', 'Hambre', '2021308459', '+639919242754', 'Poblacion 3', 'Purok 12', 242352.00, 'hectares', 'Dayawan', '$2y$10$fESw7rFPTHWIR.ezVo89fOIOkYbhWG.fks2IlwrWA3BbOH8jO8KwG', 'approved', 'IMG_20240825_133527_348.jpg'),
(6, 'Ginarose ', 'b', 'Beligolo', '2021308455', '+639919242754', 'Poblacion 1', 'Purok 12', 10.00, 'acres', 'Dayawan', '$2y$10$5jQjTvA8rjz7EuzXXfFvjO4m8/pS0yMAX.ytUZF5cM8blhnvouk32', 'pending', NULL),
(7, 'Ginarose ', 'F', 'Beligolo', '202130833270', '+639123412214', 'San Martin', 'vaa', 12.00, 'hectares', '123', '$2y$10$5RFh9SAPXl/XnZ7VwZ.2pOGVrhuLbkhT9fVIrBZhPYoPYa/pbvgOq', 'pending', NULL),
(8, 'Fely', 'A', 'HAmbre', '3456728', '+639123412214', 'Balacanas', 'vaa', 242352.00, 'sqm', 'Gusa Carmen', '$2y$10$qh/tG.f0SDjI.eosFzU1ruWzhUxmLVINezgG7GRaaezOm1x.vNd9m', 'pending', NULL),
(9, 'Regie Lyn ', 'A', 'Hambre', '2021300', '2345', 'Tambobong', 'dsjnejnkkkkedsc', 242352.00, 'sqm', '123', '$2y$10$lqOIreOtzAenJ/TpU/.3MeU6ZXiSLzPYkXYro90D4RqUBfab9AOBy', 'pending', NULL),
(10, 'John Paul', 'H', 'Elarcosa', '5647382910', '1243', 'Kimaya', 'kmldkmckccs', 12.00, 'sqm', 'Dayawan', '$2y$10$ztvNsDRKbC2IKOBFRPdlTu8hhI573lpExI0MuEOTtZoXKqAcg3OXi', 'approved', 'DALL__E_2025-01-06_18.56.45_-_A_detailed_Entity-Relationship_Diagram__ERD__for_an_Agriculture_Registry_and_Monitoring_System__ARMS_._The_diagram_should_include_entities_such_as_Adm.webp'),
(11, 'John Michael', 'R', 'Cosmiano', '098765', '477482', 'Poblacion 2', 'Purronksamcksmc', 242352.00, 'sqm', 'Purok-4 A Dayawan', '$2y$10$65yEnKvB/QxsEzmfIQPRl..Dly4qdYTKc6TO64iHRxh6nP.fmuEKm', 'pending', NULL),
(12, 'Alfred ', 'A', 'Damas', '67898765', '+630956473829', 'Katipunan', 'Purronksamcksmc', 1.00, 'sqm', 'rrrr', '$2y$10$9cAE998t2A4whkv9PqCvT.8ah60lDY01tiXa7/9lCuSujaTpwTkIC', 'approved', NULL),
(13, 'Ellen Rose', 'R', 'Sanchez', '20213083', '0909123412214', 'Imelda', 'dsjnejnkkkkedsc', 242352.00, 'sqm', '12', '$2y$10$E6XxS6HxvEinelYF46ciT.LYlsJXN1tsc8ieuDNJHs7s.Vp0TPDNe', 'pending', NULL),
(14, 'Marlou', 'F', 'Dalapag', '202222', '1243', 'Dayawan', 'dsjnejnkkkkedsc', 242352.00, 'hectares', 'Purok-4 A Dayawan', '$2y$10$60x64QcE6iI9RQMu20DzWejvHQnCu0HIEE72nd7YVEbTe/VCb7g1S', 'pending', NULL),
(15, 'Mary Lyn ', 'A', 'Hambre', '11516', '09919242754', 'Poblacion 2', 'Purok 12', 242352.00, 'sqm', '34', '$2y$10$bIYUx.1A.EoHuI.j9j55Y.uzaXkGD0VALPcwnafZCEYMJXqRvE3bC', 'approved', NULL),
(16, 'Kyline', 's', 'Alcantara', '564738', '0909123412214', 'Kimaya', 'dsjnejnkkkkedsc', 1.00, 'hectares', 'dayawandnjenjwedwe', '$2y$10$gQqhoZXYz3L97GfHC13rMOCQMQ856mgyVze8tVSqppvv4KhTq.uIO', 'approved', 'Screenshot__1_.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`activity_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `distribution_batches`
--
ALTER TABLE `distribution_batches`
  ADD PRIMARY KEY (`batch_id`);

--
-- Indexes for table `distribution_records`
--
ALTER TABLE `distribution_records`
  ADD PRIMARY KEY (`record_id`),
  ADD KEY `batch_id` (`batch_id`);

--
-- Indexes for table `farmers`
--
ALTER TABLE `farmers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rsba_no` (`rsba_no`);

--
-- Indexes for table `farmers_records`
--
ALTER TABLE `farmers_records`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `distribution_records`
--
ALTER TABLE `distribution_records`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farmers`
--
ALTER TABLE `farmers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farmers_records`
--
ALTER TABLE `farmers_records`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `distribution_records`
--
ALTER TABLE `distribution_records`
  ADD CONSTRAINT `distribution_records_ibfk_1` FOREIGN KEY (`batch_id`) REFERENCES `distribution_batches` (`batch_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
