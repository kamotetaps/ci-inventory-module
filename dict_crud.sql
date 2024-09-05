-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2024 at 07:33 PM
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
-- Database: `dict_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `inv_categories`
--

CREATE TABLE `inv_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inv_categories`
--

INSERT INTO `inv_categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(8, 'Office Supply', 'Description', '2024-09-02 01:56:29', '2024-09-02 06:21:54'),
(9, 'Computers', 'Monitor, mouse, keyboard', '2024-09-02 01:57:25', '2024-09-02 01:57:25'),
(10, 'Maintenance', 'Shovel, Gasoline, broom etc', '2024-09-02 01:58:31', '2024-09-02 01:58:31'),
(12, 'Appliances', 'TV, Fan,', '2024-09-02 06:17:29', '2024-09-02 06:17:29');

-- --------------------------------------------------------

--
-- Table structure for table `inv_inventory_transactions`
--

CREATE TABLE `inv_inventory_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_type` enum('purchase','sale','adjustment') NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `date` date DEFAULT NULL,
  `supplier_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inv_inventory_transactions`
--

INSERT INTO `inv_inventory_transactions` (`id`, `item_id`, `transaction_type`, `quantity`, `price`, `date`, `supplier_id`, `created_at`, `updated_at`) VALUES
(4, 7, 'sale', 2, 23.00, '2024-09-02', NULL, '2024-09-02 01:11:15', '2024-09-02 01:11:15'),
(5, 7, 'purchase', 1, 1.00, '2024-09-25', NULL, '2024-09-02 01:11:49', '2024-09-02 01:11:49'),
(7, 11, 'purchase', 10, 160.00, '2024-09-01', 4, '2024-09-02 02:39:53', '2024-09-06 08:16:25'),
(8, 13, 'sale', 23, 16.00, '2024-08-20', 5, '2024-09-02 02:42:14', '2024-09-02 02:42:32'),
(9, 17, 'purchase', 50, 10.00, '2024-09-01', 5, '2024-09-02 06:59:22', '2024-09-02 06:59:22');

-- --------------------------------------------------------

--
-- Table structure for table `inv_items`
--

CREATE TABLE `inv_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inv_items`
--

INSERT INTO `inv_items` (`id`, `category_id`, `name`, `description`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(11, 9, 'Keyboard', '', 20, 150.00, '2024-09-02 01:58:55', '2024-09-02 01:58:55'),
(12, 9, 'Monitor', '', 150, 3000.00, '2024-09-02 01:59:27', '2024-09-02 01:59:27'),
(13, 9, 'System Unit', '', 150, 15000.00, '2024-09-02 02:00:06', '2024-09-02 02:00:06'),
(14, 10, 'Shovel', '', 10, 250.00, '2024-09-02 02:00:30', '2024-09-02 02:00:30'),
(15, 10, 'Walis tambo', '', 30, 95.00, '2024-09-02 02:00:59', '2024-09-02 02:00:59'),
(16, 8, 'Electric Fans', 'Stand Fan', 2, 980.00, '2024-09-02 06:08:26', '2024-09-02 06:27:16'),
(18, 8, 'Mug', '', 23, 56564.00, '2024-09-06 08:05:59', '2024-09-06 08:05:59');

-- --------------------------------------------------------

--
-- Table structure for table `inv_item_assignments`
--

CREATE TABLE `inv_item_assignments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `serial_number` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `assigned_at` date DEFAULT NULL,
  `status` enum('assigned','in_use','returned','in_repair','damaged') NOT NULL DEFAULT 'assigned',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inv_item_assignments`
--

INSERT INTO `inv_item_assignments` (`id`, `item_id`, `user_id`, `serial_number`, `photo`, `assigned_at`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 16, 'asd232', '11', '2024-08-14', 'returned', '2024-08-21 23:59:14', '2024-08-21 23:59:14', NULL),
(3, 9, 22, '34534', '', '2024-10-06', 'assigned', '2024-08-31 16:52:04', '2024-08-31 16:52:04', NULL),
(7, 11, 20, '1212121212', 'None', '2024-09-01', 'assigned', '2024-09-02 02:28:16', '2024-09-02 06:44:45', NULL),
(9, 12, 20, '4154-0456-', '', '2024-09-01', 'returned', '2024-09-02 02:32:52', '2024-09-06 08:17:36', NULL),
(10, 15, 23, '324354-34534', '', '2024-09-01', 'assigned', '2024-09-02 02:33:39', '2024-09-02 02:33:39', NULL),
(11, 14, 23, 'qe4234-3423d34', '', '2024-09-01', 'in_repair', '2024-09-02 02:36:13', '2024-09-02 02:36:13', NULL),
(13, 17, 20, '12121-343', '', '2024-09-01', 'in_use', '2024-09-02 06:52:54', '2024-09-02 06:52:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inv_item_locations`
--

CREATE TABLE `inv_item_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `location` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inv_item_locations`
--

INSERT INTO `inv_item_locations` (`id`, `item_id`, `location`, `quantity`, `created_at`, `updated_at`) VALUES
(4, 11, '2nd Floor, Administration Bldg. room 24', 50, '2024-09-02 02:19:20', '2024-09-02 06:42:11'),
(5, 12, 'Maintenance Office', 60, '2024-09-02 02:20:07', '2024-09-06 08:10:46'),
(8, 18, 'TVET Bldg. rm22', 23, '2024-09-06 08:10:07', '2024-09-06 08:10:07');

-- --------------------------------------------------------

--
-- Table structure for table `inv_suppliers`
--

CREATE TABLE `inv_suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inv_suppliers`
--

INSERT INTO `inv_suppliers` (`id`, `name`, `contact`, `phone`, `email`, `address`, `created_at`, `updated_at`) VALUES
(4, 'XYZ Gardening Inc', '064-123454-55', '09123456789', 'xyzgardening@xyx.com', 'Silingan ra nimos', '2024-09-02 02:13:06', '2024-09-05 06:12:29'),
(5, '711 Store', '064-4587-51', '090000000', '711@store.com', '711 street', '2024-09-02 02:15:14', '2024-09-02 02:15:14');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `UserID` bigint(20) UNSIGNED NOT NULL,
  `LastName` varchar(100) DEFAULT NULL,
  `FirstName` varchar(100) DEFAULT NULL,
  `MiddleName` varchar(100) DEFAULT NULL,
  `Username` varchar(20) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `EntryDate` datetime DEFAULT current_timestamp(),
  `LastUpdatingDate` datetime DEFAULT NULL,
  `DateDeleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`UserID`, `LastName`, `FirstName`, `MiddleName`, `Username`, `Password`, `EntryDate`, `LastUpdatingDate`, `DateDeleted`) VALUES
(16, 'Bond', 'James', '007', 'agent007', '$2y$10$A.XnGw9X5XJD4PHKkHCmsuUZNQU3XZmI3XTcsNw0lVvdhAtpdZLhq', '2024-08-30 04:20:37', '2024-08-30 05:30:02', '2024-08-30 05:30:02'),
(17, 'asasasasasasasasasasasas', 'assss', '32323', '11111', '$2y$10$1zynF3G8pxtXCSEgpWjdKegimM9OfW5aGSwv27.ta5GJA2y.muABW', '2024-08-30 04:32:15', '2024-08-30 06:42:12', '2024-08-30 06:42:12'),
(18, 'Woman11', 'Wonder', 'a', 'a', '$2y$10$uffn4U5AmvWm/gSnKCIa9eFRolaYPGMlu.E65In2Aenj7y5AerQ9.', '2024-08-30 05:54:40', '2024-08-31 16:06:43', '2024-08-31 16:06:43'),
(19, 'Batman', 'Robin', 'and', 'BatRob', '$2y$10$0Fl3g10xeD9liORLfbtpcOhBsoKa28odjwK8xKJ4eOx4VrjpOnQiq', '2024-08-30 05:57:00', '2024-08-30 06:06:51', '2024-08-30 06:06:51'),
(20, 'Bond', 'Agent James', 'Agent', '007', '$2y$10$iXRyG04WdCRzlEnvacxYG.3f0ispnV7yjyjx6tF.bgyrLOBE9wzXW', '2024-08-30 23:09:04', '2024-09-04 23:11:44', NULL),
(21, '1212', '1212', '212', '1212', '$2y$10$2aLx9xEX8sxO65MOK1nII.RSnNU3U/7gc8CBtzUWh8uiVB9LF93KC', '2024-08-31 16:07:13', '2024-08-31 16:07:20', '2024-08-31 16:07:20'),
(22, 'Robin', 'Batman', 'M', 'batman', '$2y$10$dq3bbMaRpabfyhbvm6q5wuvVxK.fyT45dABMISuQ50sblnnPVi7dK', '2024-08-31 16:09:20', '2024-09-02 09:54:43', NULL),
(23, 'Woman', 'Wonder', 'M', 'Diana', '$2y$10$LTunVAz5EnsFaqHdvfI0bOFRTJEnkouijl9we9s3NRaO4ATNWCODK', '2024-09-02 09:55:45', '2024-09-02 09:55:45', NULL),
(24, 'Ben', 'Ben', '&', 'ben&ben', '$2y$10$AbOCPWXN074Qv5HU/cEDxOSqXSH6y/jYH8cn1S5YcRaWtaqOcn43y', '2024-09-02 13:49:00', '2024-09-02 14:02:07', '2024-09-02 14:02:07'),
(25, 'Last Name', 'First Name', 'Middle Name', 'Username', '$2y$10$Cwam7TzivAltUVnnRF7PjuvCpGrdPWlwfdWvbLecMhElM35yGpRzG', '2024-09-02 13:51:55', '2024-09-02 13:59:26', '2024-09-02 13:59:26'),
(26, 'Tapulayan', 'Mark John', 'M.', 'kamotetaps', '$2y$10$Q76eAN1EItY1eaWi028ioOL3xVbi9GH/H59FOvJppLpNuBh/2hkTK', '2024-09-04 22:41:11', '2024-09-06 01:00:02', '2024-09-06 01:00:02'),
(27, 'sd', 'Mark', 'M', 'kamoteatps', '$2y$10$AdHlbdEHu2Rx/SsDEa1BPu6a7Ikmvfmvozqm9A.LxqtSxMYR.wdeu', '2024-09-06 00:53:39', '2024-09-06 00:55:01', '2024-09-06 00:55:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inv_categories`
--
ALTER TABLE `inv_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inv_inventory_transactions`
--
ALTER TABLE `inv_inventory_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inv_inventory_transactions_item_id_foreign` (`item_id`),
  ADD KEY `inv_inventory_transactions_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `inv_items`
--
ALTER TABLE `inv_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inv_items_category_id_foreign` (`category_id`);

--
-- Indexes for table `inv_item_assignments`
--
ALTER TABLE `inv_item_assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inv_item_assignments_item_id_foreign` (`item_id`),
  ADD KEY `inv_item_assignments_user_id_foreign` (`user_id`);

--
-- Indexes for table `inv_item_locations`
--
ALTER TABLE `inv_item_locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inv_item_locations_item_id_foreign` (`item_id`);

--
-- Indexes for table `inv_suppliers`
--
ALTER TABLE `inv_suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inv_categories`
--
ALTER TABLE `inv_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `inv_inventory_transactions`
--
ALTER TABLE `inv_inventory_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `inv_items`
--
ALTER TABLE `inv_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `inv_item_assignments`
--
ALTER TABLE `inv_item_assignments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `inv_item_locations`
--
ALTER TABLE `inv_item_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `inv_suppliers`
--
ALTER TABLE `inv_suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `UserID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inv_inventory_transactions`
--
ALTER TABLE `inv_inventory_transactions`
  ADD CONSTRAINT `inv_inventory_transactions_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `inv_suppliers` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `inv_items`
--
ALTER TABLE `inv_items`
  ADD CONSTRAINT `inv_items_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `inv_categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `inv_item_locations`
--
ALTER TABLE `inv_item_locations`
  ADD CONSTRAINT `inv_item_locations_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `inv_items` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
