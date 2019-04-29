-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2019 at 06:26 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `linfox`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(11) NOT NULL,
  `main_component_name` varchar(255) DEFAULT NULL,
  `main_component_descriptioin` varchar(255) DEFAULT NULL,
  `main_component_material_type` varchar(255) DEFAULT NULL,
  `sub_component_1_name` varchar(255) DEFAULT NULL,
  `sub_component_1_description` varchar(255) DEFAULT NULL,
  `sub_component_1_material_type` varchar(255) DEFAULT NULL,
  `sub_component_2_name` varchar(255) DEFAULT NULL,
  `sub_component_2_description` varchar(255) DEFAULT NULL,
  `sub_component_2_material_type` varchar(255) DEFAULT NULL,
  `sub_component_3_name` varchar(255) DEFAULT NULL,
  `sub_component_3_description` varchar(255) DEFAULT NULL,
  `sub_component_3_material_type` varchar(255) DEFAULT NULL,
  `opt_field_1` varchar(255) DEFAULT NULL,
  `opt_field_2` varchar(255) DEFAULT NULL,
  `opt_field_3` varchar(255) DEFAULT NULL,
  `attach_photo` varchar(255) DEFAULT NULL,
  `attach_document` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `main_component_name`, `main_component_descriptioin`, `main_component_material_type`, `sub_component_1_name`, `sub_component_1_description`, `sub_component_1_material_type`, `sub_component_2_name`, `sub_component_2_description`, `sub_component_2_material_type`, `sub_component_3_name`, `sub_component_3_description`, `sub_component_3_material_type`, `opt_field_1`, `opt_field_2`, `opt_field_3`, `attach_photo`, `attach_document`, `link`, `img`) VALUES
(1, 'Inclined tunnel conv. - F102', 'Inclined rubber conveyor belt', 'Rubber conveyor belt', 'Gearmotor - F102M', 'GEAR MOTOR RF27 DTE90L4', 'Gearmotor', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 'Horizontal tunnel conv. -F104', 'Horizontal tunnel conv. -F104', 'Rubber conveyor belt', 'Gearmotor- F104M', 'GEAR MOTOR RF27 DTE90L4', 'Gearmotor', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, '75 Curve conveyor infeed - F106', '75 Curve Conveyor', 'Curve Belt', 'Drive Pulley - F106P', 'Drive Pulley Assmebly- 75C', 'Drive Pulley', '75 Curve conveyor infeed - F106', 'GEAR MOTOR SA47 DRE90M4BE1', 'Gearmotor', '', '', '', '', '', '', '', '', '', ''),
(4, 'Wall infeed conveyor Top - F008', 'Wall mounted rubber conveyor', 'Rubber conveyor belt', 'Gearmotor- F008M', 'GEAR MOTOR RF27 DTE90L4', 'Gearmotor', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 'Wall roller bed Top - F010', 'Wall mounted roller bed', 'SRF tilted roller conveyor', 'Gearmotor- F010M', 'GEAR MOTOR FH67 CM90M', 'Gearmotor', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, '90 Curve conv, Pre-decline - F012', '90 Curve Conveyor', 'Curve Belt', 'Drive Pulley - F012P', 'Drive Pulley Assmebly - 90C', 'Drive Pulley', '90 Curve conv, Pre-decline - F012', 'GEAR MOTOR SA47 DRE90M4BE1', 'Gearmotor', '', '', '', '', '', '', '', '', '', ''),
(7, 'Decline infeed conveyor - F104', 'Inclined rubber conveyor belt', 'Rubber conveyor belt', 'Gearmotor - F014M', 'GEAR MOTOR RF27 DTE90L4', 'Gearmotor', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, 'Infeed accumulation roller bed - F016', 'Accumulation Roller Bed', 'Powered roller bed', 'Gearmotor - F016M', 'TBC', 'Gearmotor', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, 'Gapping conveyor 1  infeed - F018', 'Green gapping conveyor', 'Rubber conveyor belt', 'Gearmotor - F018M', 'GEAR MOTOR RF27 CM71M', 'Gearmotor', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, 'Gapping conveyor 2 infeed - F020', 'Green gapping conveyor', 'Rubber conveyor belt', 'Gearmotor - F020M', 'GEAR MOTOR RF27 CM71M', 'Gearmotor', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, 'Merge conveyor- S002', 'Merge conveyor- S002', 'Rubber conveyor belt', 'Gearmotor S002M', 'GEAR MOTOR RF37 DTE90K4', 'Gearmotor', 'Merge conveyor- S002', 'GEAR MOTOR RF07 DR63L4', 'Gearmotor', '', '', '', '', '', '', '', '', '', ''),
(12, 'Post-merge roller bed - S004V', 'Powered Roller Bed', 'SRF tilted roller conveyor', 'Gearmotor', 'HELICAL GEAR MOTOR M3 180/2', 'Gearmotor', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, '90 Curve conv. Post-merge- S006', '90 Curve Conveyor', 'Curve Belt', 'Drive Pulley - S006P', 'Drive Pulley Assmebly - 90C', 'Drive Pulley', '90 Curve conv. Post-merge- S006', 'GEAR MOTOR SA47 DRE90M4BE1', 'Gearmotor', '', '', '', '', '', '', '', '', '', ''),
(14, 'Mezzanine longitudinal conveyor- S008', 'Mezzanine longitudinal conveyor- S008', 'Rubber conveyor belt', 'Gearmotor - S008M', 'GEAR MOTOR RF27 DTE90L4', 'Gearmotor', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(15, 'Gapping conveyor 3 pre-sort - S010', 'Rubber Gapping Conveyor', 'Rubber conveyor belt', 'Gearmotor - S010M', 'SA 47 DRE90m4BE1/mm15 (44913)', 'Gearmotor', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(16, 'Gapping conveyor 4 pre-sort - S012', 'Rubber Gapping Conveyor', 'Rubber conveyor belt', 'Gearmotor - S012M', 'SA 47 DRE90m4BE1/mm15 (44913)', 'Gearmotor', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, '90 Curved conv. Pre-sort - S014', '90 Curve Conveyor', 'Curve Belt', 'Drive Pulley - S014P', 'Drive Pulley Assmebly - 90C', 'Drive Pulley', '90 Curved conv. Pre-sort - S014', 'GEAR MOTOR SA47 DRE90M4BE1', 'Gearmotor', '', '', '', '', '', '', '', '', '', ''),
(18, 'Gapping conveyor 5 pre-sort - S016', 'Rubber Gapping Conveyor', 'Rubber conveyor belt', 'Gearmotor - S016M', 'SA 47 DRE90m4BE1/mm15 (44913)', 'Gearmotor', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(19, 'Pre-sort conveyor- S018', 'Sorter rubber conveyor', 'Rubber conveyor belt', 'Gearmotor - S018M', 'SA 47 DRE90m4BE1/mm15 (44913)', 'Gearmotor', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(20, 'Shoe-sorter- S020', 'TGW Natrix Shoe Sorter', 'Shoe Sorter', 'Lubrication System - S020L', 'Sorter Lubrication', 'Lubrication', 'Shoe-sorter- S020', 'GEAR MOTOR KH67  DVE100L4', 'Gearmotor', 'PC Control Hardware - S020PC', 'Dexion Control RDS', 'Hardware', '', '', '', '', '', '', ''),
(21, 'Post-sort conveyor - S022', 'Sorter rubber conveyor', 'Rubber conveyor belt', 'Gearmotor', 'SA 47 DRE90m4BE1/mm15 (44913)', 'Gearmotor', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(22, 'Curved conveyor Post-sort - S024', '90 Curve Conveyor', 'Curve Belt', 'Drive Pulley - S024P', 'Drive Pulley Assmebly - 90C', 'Drive Pulley', 'Curved conveyor Post-sort - S024', 'GEAR MOTOR SA47 DRE90M4BE1', 'Gearmotor', '', '', '', '', '', '', '', '', '', ''),
(23, 'Wall recirc. conveyor Bottom -S026', 'Wall mounted rubber conveyor', 'Rubber conveyor belt', 'Gearmotor - S026M', 'GEAR MOTOR RF27 DTE90L4', 'Gearmotor', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(24, 'Wall roller bed  Bottom - S028', 'Wall mounted roller bed', 'SRF tilted roller conveyor', 'Gearmotor - S028M', 'SPUR GEAR MOTOR M3 180/2', 'Gearmotor', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(25, 'Curved conveyor Recirc.- S030', '90 Curve Conveyor', 'Curve Belt', 'Drive Pulley - S030P', 'Drive Pulley Assmebly - 90C', 'Drive Pulley', 'Curved conveyor Recirc.- S030', 'GEAR MOTOR SA47 DRE90M4BE1', 'Gearmotor', '', '', '', '', '', '', '', '', '', ''),
(26, 'Recirc. rubber conveyor - S032', 'Recirc Rubber conveyor', 'Rubber conveyor belt', 'Gearmotor - S032M', 'GEAR MOTOR RF27 DTE90L4', 'Gearmotor', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(27, 'Recirc. accumulation roller bed - S034', 'Accumulation Roller Bed', 'Powered roller bed', 'Gearmotor - S034M', 'TBC', 'Gearmotor', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(28, 'Gapping conveyor 3 Recirc. - S036', 'Green gapping conveyor', 'Rubber conveyor belt', 'Gearmotor - S036M', 'GEAR MOTOR RF27 CM71M', 'Gearmotor', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(29, 'Gapping conveyor 4 Recirc. - S038', 'Green gapping conveyor', 'Rubber conveyor belt', 'Gearmotor - S038M', 'GEAR MOTOR RF27 CM71M', 'Gearmotor', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `mobile` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `postcode` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
