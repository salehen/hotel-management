-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2020 at 05:37 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospita1_hotel_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked`
--

CREATE TABLE `booked` (
  `id` int(10) UNSIGNED NOT NULL,
  `room_id` int(10) UNSIGNED NOT NULL,
  `reaservation_id` int(10) UNSIGNED NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `book_status` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booked`
--

INSERT INTO `booked` (`id`, `room_id`, `reaservation_id`, `sdate`, `edate`, `customer_id`, `amount`, `book_status`) VALUES
(30, 23, 56, '2020-03-04', '2020-03-09', 32, 12500, 0),
(33, 17, 59, '2020-03-02', '2020-03-04', 30, 2000, 0),
(35, 17, 61, '2020-03-25', '2020-03-25', 30, 5000, 1),
(47, 17, 55, '2020-03-05', '2020-03-09', 30, 4000, 0),
(50, 18, 58, '2020-03-18', '2020-03-20', 31, 3000, 0),
(51, 18, 69, '2020-03-24', '2020-03-26', 30, 3000, 1),
(53, 19, 71, '2020-03-26', '2020-03-31', 30, 10000, 1),
(54, 17, 72, '2020-03-29', '2020-03-31', 32, 2000, 1),
(55, 24, 73, '2020-04-02', '2020-04-06', 31, 6000, 1),
(56, 19, 74, '2020-04-03', '2020-04-09', 32, 12000, 1),
(57, 18, 75, '2020-04-05', '2020-04-07', 32, 3000, 1),
(58, 21, 76, '2020-04-25', '2020-04-30', 30, 7500, 1),
(59, 18, 77, '2020-04-01', '2020-04-06', 30, 7500, 1),
(60, 17, 78, '2020-11-20', '2020-11-23', 30, 3000, 1),
(65, 20, 85, '2020-11-09', '2020-11-23', 30, 28000, 1),
(66, 23, 86, '2020-11-18', '2020-11-20', 30, 5000, 0),
(67, 18, 87, '2020-11-22', '2020-11-27', 30, 7500, 1),
(68, 23, 88, '2020-11-20', '2020-11-26', 31, 15000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `citys`
--

CREATE TABLE `citys` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `citys`
--

INSERT INTO `citys` (`id`, `name`, `country_id`) VALUES
(2, 'Dinajpur', 2),
(3, 'Dhaka', 2),
(4, 'Khulna', 2),
(5, 'Kalkata', 4);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'Pakistan '),
(2, 'Bangladesh'),
(4, 'India');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `gender` tinyint(3) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `address` varchar(250) NOT NULL,
  `post_code` int(11) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `cpassword` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `f_name`, `l_name`, `email`, `contact`, `gender`, `country_id`, `city_id`, `address`, `post_code`, `nationality`, `cpassword`) VALUES
(30, 'Reajuj', 'Salehen', 'customer@gmail.com', '01836307836', 1, 2, 3, 'NavigatorsIT Sarker Market(2nd floor) Road # 01, Sector # 10. Uttara, Dhaka 1230', 1230, 'Bangladeshi', '81dc9bdb52d04dc20036dbd8313ed055'),
(31, 'Shibli', 'Noman', 'shibli@gmail.com', '012555888', 1, 2, 3, 'Sarker Market(2nd floor) Road # 01, Sector # 10. Uttara, Dhaka 1230', 1230, 'Bangladeshi', '81dc9bdb52d04dc20036dbd8313ed055'),
(32, 'Tuhin', 'Islam', 'tuhin@gmail.com', '0125545877', 1, 2, 4, 'Sarker Market(2nd floor) Road # 01, Sector # 10. Uttara, Dhaka 1250', 1250, 'Bangladeshi', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `dining_items`
--

CREATE TABLE `dining_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL,
  `amount` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dining_items`
--

INSERT INTO `dining_items` (`id`, `name`, `description`, `amount`) VALUES
(1, 'Breakfast', 'Roti, porota , Vaji, ', 250),
(2, 'Lunch', 'kacchi, morgi plow , borhani ', 350),
(3, 'Evening Snacks', 'shomocha ludus , jhdgf  dfsjf jsdf dsf', 200),
(4, 'Dinner ', 'shada vat , fish vaji, kawa biriyanii', 400);

-- --------------------------------------------------------

--
-- Table structure for table `dining_logs`
--

CREATE TABLE `dining_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `reservation_id` int(10) UNSIGNED NOT NULL,
  `dianing_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dining_logs`
--

INSERT INTO `dining_logs` (`id`, `date`, `reservation_id`, `dianing_id`, `status`) VALUES
(201, '2020-03-05', 55, 2, 1),
(202, '2020-03-05', 55, 3, 0),
(203, '2020-03-05', 55, 4, 1),
(204, '2020-03-06', 55, 1, 1),
(205, '2020-03-06', 55, 2, 1),
(206, '2020-03-06', 55, 3, 1),
(207, '2020-03-06', 55, 4, 1),
(208, '2020-03-07', 55, 1, 1),
(209, '2020-03-07', 55, 2, 1),
(210, '2020-03-07', 55, 3, 1),
(211, '2020-03-07', 55, 4, 1),
(212, '2020-03-08', 55, 1, 1),
(213, '2020-03-08', 55, 2, 1),
(214, '2020-03-08', 55, 3, 1),
(215, '2020-03-08', 55, 4, 1),
(216, '2020-03-09', 55, 1, 1),
(217, '2020-03-04', 56, 2, 1),
(218, '2020-03-04', 56, 3, 1),
(219, '2020-03-04', 56, 4, 1),
(220, '2020-03-05', 56, 1, 1),
(221, '2020-03-05', 56, 2, 1),
(222, '2020-03-05', 56, 3, 1),
(223, '2020-03-05', 56, 4, 1),
(224, '2020-03-06', 56, 1, 1),
(225, '2020-03-06', 56, 2, 1),
(226, '2020-03-06', 56, 3, 1),
(227, '2020-03-06', 56, 4, 1),
(228, '2020-03-07', 56, 1, 1),
(229, '2020-03-07', 56, 2, 1),
(230, '2020-03-07', 56, 3, 1),
(231, '2020-03-07', 56, 4, 1),
(232, '2020-03-08', 56, 1, 1),
(233, '2020-03-08', 56, 2, 1),
(234, '2020-03-08', 56, 3, 1),
(235, '2020-03-08', 56, 4, 1),
(236, '2020-03-09', 56, 1, 1),
(245, '2020-03-18', 58, 2, 1),
(246, '2020-03-18', 58, 3, 1),
(247, '2020-03-18', 58, 4, 1),
(248, '2020-03-19', 58, 1, 1),
(249, '2020-03-19', 58, 2, 1),
(250, '2020-03-19', 58, 3, 1),
(251, '2020-03-19', 58, 4, 1),
(252, '2020-03-20', 58, 1, 1),
(253, '2020-03-02', 59, 2, 1),
(254, '2020-03-02', 59, 3, 1),
(255, '2020-03-02', 59, 4, 1),
(256, '2020-03-03', 59, 1, 1),
(257, '2020-03-03', 59, 2, 1),
(258, '2020-03-03', 59, 3, 1),
(259, '2020-03-03', 59, 4, 1),
(260, '2020-03-04', 59, 1, 1),
(277, '2020-03-20', 61, 2, 1),
(278, '2020-03-20', 61, 3, 1),
(279, '2020-03-20', 61, 4, 1),
(280, '2020-03-21', 61, 1, 1),
(281, '2020-03-21', 61, 2, 1),
(282, '2020-03-21', 61, 3, 1),
(283, '2020-03-21', 61, 4, 1),
(284, '2020-03-22', 61, 1, 1),
(285, '2020-03-22', 61, 2, 1),
(286, '2020-03-22', 61, 3, 1),
(287, '2020-03-22', 61, 4, 1),
(288, '2020-03-23', 61, 1, 1),
(289, '2020-03-23', 61, 2, 1),
(290, '2020-03-23', 61, 3, 1),
(291, '2020-03-23', 61, 4, 1),
(292, '2020-03-24', 61, 1, 1),
(293, '2020-03-24', 61, 2, 1),
(294, '2020-03-24', 61, 3, 1),
(295, '2020-03-24', 61, 4, 1),
(296, '2020-03-25', 61, 1, 1),
(588, '2020-03-24', 69, 2, 1),
(589, '2020-03-24', 69, 3, 1),
(590, '2020-03-24', 69, 4, 1),
(591, '2020-03-25', 69, 1, 1),
(592, '2020-03-25', 69, 2, 1),
(593, '2020-03-25', 69, 3, 1),
(594, '2020-03-25', 69, 4, 1),
(595, '2020-03-26', 69, 1, 1),
(616, '2020-03-26', 71, 2, 1),
(617, '2020-03-26', 71, 3, 1),
(618, '2020-03-26', 71, 4, 1),
(619, '2020-03-27', 71, 1, 1),
(620, '2020-03-27', 71, 2, 1),
(621, '2020-03-27', 71, 3, 1),
(622, '2020-03-27', 71, 4, 1),
(623, '2020-03-28', 71, 1, 1),
(624, '2020-03-28', 71, 2, 1),
(625, '2020-03-28', 71, 3, 1),
(626, '2020-03-28', 71, 4, 1),
(627, '2020-03-29', 71, 1, 1),
(628, '2020-03-29', 71, 2, 1),
(629, '2020-03-29', 71, 3, 1),
(630, '2020-03-29', 71, 4, 1),
(631, '2020-03-30', 71, 1, 1),
(632, '2020-03-30', 71, 2, 1),
(633, '2020-03-30', 71, 3, 1),
(634, '2020-03-30', 71, 4, 1),
(635, '2020-03-31', 71, 1, 1),
(672, '2020-03-29', 72, 2, 1),
(673, '2020-03-29', 72, 3, 1),
(674, '2020-03-29', 72, 4, 1),
(675, '2020-03-30', 72, 1, 1),
(676, '2020-03-30', 72, 2, 1),
(677, '2020-03-30', 72, 3, 1),
(678, '2020-03-30', 72, 4, 1),
(679, '2020-03-31', 72, 1, 1),
(680, '2020-04-02', 73, 2, 1),
(681, '2020-04-02', 73, 3, 1),
(682, '2020-04-02', 73, 4, 1),
(683, '2020-04-03', 73, 1, 1),
(684, '2020-04-03', 73, 2, 1),
(685, '2020-04-03', 73, 3, 1),
(686, '2020-04-03', 73, 4, 1),
(687, '2020-04-04', 73, 1, 1),
(688, '2020-04-04', 73, 2, 1),
(689, '2020-04-04', 73, 3, 1),
(690, '2020-04-04', 73, 4, 1),
(691, '2020-04-05', 73, 1, 1),
(692, '2020-04-05', 73, 2, 1),
(693, '2020-04-05', 73, 3, 1),
(694, '2020-04-05', 73, 4, 1),
(695, '2020-04-06', 73, 1, 1),
(696, '2020-04-03', 74, 2, 1),
(697, '2020-04-03', 74, 3, 1),
(698, '2020-04-03', 74, 4, 1),
(699, '2020-04-04', 74, 1, 1),
(700, '2020-04-04', 74, 2, 1),
(701, '2020-04-04', 74, 3, 1),
(702, '2020-04-04', 74, 4, 1),
(703, '2020-04-05', 74, 1, 1),
(704, '2020-04-05', 74, 2, 1),
(705, '2020-04-05', 74, 3, 1),
(706, '2020-04-05', 74, 4, 1),
(707, '2020-04-06', 74, 1, 1),
(708, '2020-04-06', 74, 2, 1),
(709, '2020-04-06', 74, 3, 1),
(710, '2020-04-06', 74, 4, 1),
(711, '2020-04-07', 74, 1, 1),
(712, '2020-04-07', 74, 2, 1),
(713, '2020-04-07', 74, 3, 1),
(714, '2020-04-07', 74, 4, 1),
(715, '2020-04-08', 74, 1, 1),
(716, '2020-04-08', 74, 2, 1),
(717, '2020-04-08', 74, 3, 1),
(718, '2020-04-08', 74, 4, 1),
(719, '2020-04-09', 74, 1, 1),
(732, '2020-04-01', 77, 2, 1),
(733, '2020-04-01', 77, 3, 1),
(734, '2020-04-01', 77, 4, 1),
(735, '2020-04-02', 77, 1, 1),
(736, '2020-04-02', 77, 2, 1),
(737, '2020-04-02', 77, 3, 1),
(738, '2020-04-02', 77, 4, 1),
(739, '2020-04-03', 77, 1, 1),
(740, '2020-04-03', 77, 2, 1),
(741, '2020-04-03', 77, 3, 1),
(742, '2020-04-03', 77, 4, 1),
(743, '2020-04-04', 77, 1, 1),
(744, '2020-04-04', 77, 2, 1),
(745, '2020-04-04', 77, 3, 1),
(746, '2020-04-04', 77, 4, 1),
(747, '2020-04-05', 77, 1, 1),
(748, '2020-04-05', 77, 2, 1),
(749, '2020-04-05', 77, 3, 1),
(750, '2020-04-05', 77, 4, 1),
(751, '2020-04-06', 77, 1, 1),
(752, '2020-04-05', 75, 2, 1),
(753, '2020-04-05', 75, 3, 1),
(754, '2020-04-05', 75, 4, 1),
(755, '2020-04-06', 75, 1, 1),
(756, '2020-04-06', 75, 2, 1),
(757, '2020-04-06', 75, 3, 1),
(758, '2020-04-06', 75, 4, 1),
(759, '2020-04-07', 75, 1, 1),
(760, '2020-04-25', 76, 2, 1),
(761, '2020-04-25', 76, 3, 1),
(762, '2020-04-25', 76, 4, 1),
(763, '2020-04-26', 76, 1, 1),
(764, '2020-04-26', 76, 2, 1),
(765, '2020-04-26', 76, 3, 1),
(766, '2020-04-26', 76, 4, 1),
(767, '2020-04-27', 76, 1, 1),
(768, '2020-04-27', 76, 2, 1),
(769, '2020-04-27', 76, 3, 1),
(770, '2020-04-27', 76, 4, 1),
(771, '2020-04-28', 76, 1, 1),
(772, '2020-04-28', 76, 2, 1),
(773, '2020-04-28', 76, 3, 1),
(774, '2020-04-28', 76, 4, 1),
(775, '2020-04-29', 76, 1, 1),
(776, '2020-04-29', 76, 2, 1),
(777, '2020-04-29', 76, 3, 1),
(778, '2020-04-29', 76, 4, 1),
(779, '2020-04-30', 76, 1, 1),
(780, '2020-11-20', 78, 2, 1),
(781, '2020-11-20', 78, 3, 1),
(782, '2020-11-20', 78, 4, 1),
(783, '2020-11-21', 78, 1, 1),
(784, '2020-11-21', 78, 2, 1),
(785, '2020-11-21', 78, 3, 1),
(786, '2020-11-21', 78, 4, 1),
(787, '2020-11-22', 78, 1, 1),
(788, '2020-11-22', 78, 2, 1),
(789, '2020-11-22', 78, 3, 1),
(790, '2020-11-22', 78, 4, 1),
(791, '2020-11-23', 78, 1, 1),
(864, '2020-11-09', 85, 2, 1),
(865, '2020-11-09', 85, 3, 1),
(866, '2020-11-09', 85, 4, 1),
(867, '2020-11-10', 85, 1, 1),
(868, '2020-11-10', 85, 2, 1),
(869, '2020-11-10', 85, 3, 1),
(870, '2020-11-10', 85, 4, 1),
(871, '2020-11-11', 85, 1, 1),
(872, '2020-11-11', 85, 2, 1),
(873, '2020-11-11', 85, 3, 1),
(874, '2020-11-11', 85, 4, 1),
(875, '2020-11-12', 85, 1, 1),
(876, '2020-11-12', 85, 2, 1),
(877, '2020-11-12', 85, 3, 1),
(878, '2020-11-12', 85, 4, 1),
(879, '2020-11-13', 85, 1, 1),
(880, '2020-11-13', 85, 2, 1),
(881, '2020-11-13', 85, 3, 1),
(882, '2020-11-13', 85, 4, 1),
(883, '2020-11-14', 85, 1, 1),
(884, '2020-11-14', 85, 2, 1),
(885, '2020-11-14', 85, 3, 1),
(886, '2020-11-14', 85, 4, 1),
(887, '2020-11-15', 85, 1, 1),
(888, '2020-11-15', 85, 2, 1),
(889, '2020-11-15', 85, 3, 1),
(890, '2020-11-15', 85, 4, 1),
(891, '2020-11-16', 85, 1, 1),
(892, '2020-11-16', 85, 2, 1),
(893, '2020-11-16', 85, 3, 1),
(894, '2020-11-16', 85, 4, 1),
(895, '2020-11-17', 85, 1, 1),
(896, '2020-11-17', 85, 2, 1),
(897, '2020-11-17', 85, 3, 1),
(898, '2020-11-17', 85, 4, 1),
(899, '2020-11-18', 85, 1, 1),
(900, '2020-11-18', 85, 2, 1),
(901, '2020-11-18', 85, 3, 1),
(902, '2020-11-18', 85, 4, 1),
(903, '2020-11-19', 85, 1, 1),
(904, '2020-11-19', 85, 2, 1),
(905, '2020-11-19', 85, 3, 1),
(906, '2020-11-19', 85, 4, 1),
(907, '2020-11-20', 85, 1, 1),
(908, '2020-11-20', 85, 2, 1),
(909, '2020-11-20', 85, 3, 1),
(910, '2020-11-20', 85, 4, 1),
(911, '2020-11-21', 85, 1, 1),
(912, '2020-11-21', 85, 2, 1),
(913, '2020-11-21', 85, 3, 1),
(914, '2020-11-21', 85, 4, 1),
(915, '2020-11-22', 85, 1, 1),
(916, '2020-11-22', 85, 2, 1),
(917, '2020-11-22', 85, 3, 1),
(918, '2020-11-22', 85, 4, 1),
(919, '2020-11-23', 85, 1, 1),
(920, '2020-11-18', 86, 2, 1),
(921, '2020-11-18', 86, 3, 1),
(922, '2020-11-18', 86, 4, 1),
(923, '2020-11-19', 86, 1, 1),
(924, '2020-11-19', 86, 2, 1),
(925, '2020-11-19', 86, 3, 1),
(926, '2020-11-19', 86, 4, 1),
(927, '2020-11-20', 86, 1, 1),
(936, '2020-11-20', 88, 2, 1),
(937, '2020-11-20', 88, 3, 1),
(938, '2020-11-20', 88, 4, 1),
(939, '2020-11-21', 88, 1, 1),
(940, '2020-11-21', 88, 2, 1),
(941, '2020-11-21', 88, 3, 1),
(942, '2020-11-21', 88, 4, 1),
(943, '2020-11-22', 88, 1, 1),
(944, '2020-11-22', 88, 2, 1),
(945, '2020-11-22', 88, 3, 1),
(946, '2020-11-22', 88, 4, 1),
(947, '2020-11-23', 88, 1, 1),
(948, '2020-11-23', 88, 2, 1),
(949, '2020-11-23', 88, 3, 0),
(950, '2020-11-23', 88, 4, 0),
(960, '2020-11-22', 87, 2, 1),
(961, '2020-11-22', 87, 3, 1),
(962, '2020-11-22', 87, 4, 1),
(963, '2020-11-23', 87, 1, 1),
(964, '2020-11-23', 87, 2, 1),
(965, '2020-11-23', 87, 3, 1),
(966, '2020-11-23', 87, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`) VALUES
(2, 'Projector TV in the bathrooms'),
(3, '4K TV screens'),
(4, 'Free Travailing Support  '),
(5, ' Amazing in-house restaurants '),
(7, ' Amazing in-house restaurants and bars'),
(8, '24 Hour Room Service aa'),
(9, 'Roof Top Pool'),
(10, 'AC Dulax');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(300) NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `room_id` int(10) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`) VALUES
(1, 'bkash'),
(2, 'mastercart'),
(3, 'paypal'),
(4, 'Rocket');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `room_id` int(10) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `adult` tinyint(4) NOT NULL,
  `child` tinyint(4) NOT NULL,
  `reservation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `customer_id`, `room_id`, `start_date`, `end_date`, `amount`, `adult`, `child`, `reservation_date`) VALUES
(55, 30, 17, '2020-03-05', '2020-03-09', 4000, 2, 0, '2020-03-05'),
(56, 32, 23, '2020-03-04', '2020-03-09', 12500, 2, 1, '2020-03-05'),
(58, 31, 18, '2020-03-18', '2020-03-20', 3000, 3, 0, '2020-03-05'),
(59, 30, 17, '2020-03-02', '2020-03-04', 2000, 2, 0, '2020-03-05'),
(61, 30, 17, '2020-03-20', '2020-03-25', 5000, 2, 0, '2020-03-22'),
(69, 30, 18, '2020-03-24', '2020-03-26', 3000, 4, 0, '2020-03-24'),
(71, 30, 19, '2020-03-26', '2020-03-31', 10000, 3, 1, '2020-03-24'),
(72, 32, 17, '2020-03-29', '2020-03-31', 2000, 1, 0, '2020-03-24'),
(73, 31, 24, '2020-04-02', '2020-04-06', 6000, 2, 0, '2020-04-04'),
(74, 32, 19, '2020-04-03', '2020-04-09', 12000, 3, 0, '2020-04-04'),
(75, 32, 18, '2020-04-05', '2020-04-07', 3000, 4, 2, '2020-04-04'),
(76, 30, 21, '2020-04-25', '2020-04-30', 7500, 1, 0, '2020-04-04'),
(77, 30, 18, '2020-04-01', '2020-04-06', 7500, 3, 2, '2020-04-04'),
(78, 30, 17, '2020-11-20', '2020-11-23', 3000, 2, 0, '2020-11-22'),
(85, 30, 20, '2020-11-09', '2020-11-23', 28000, 1, 0, '2020-11-22'),
(86, 30, 23, '2020-11-18', '2020-11-20', 5000, 2, 0, '2020-11-22'),
(87, 30, 18, '2020-11-22', '2020-11-23', 7500, 3, 0, '2020-11-22'),
(88, 31, 23, '2020-11-20', '2020-11-23', 15000, 2, 2, '2020-11-23');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_payment_info`
--

CREATE TABLE `reservation_payment_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `reservation_id` int(10) UNSIGNED NOT NULL,
  `reservation_date` date NOT NULL,
  `payment_id` tinyint(3) UNSIGNED NOT NULL,
  `payment_details` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation_payment_info`
--

INSERT INTO `reservation_payment_info` (`id`, `reservation_id`, `reservation_date`, `payment_id`, `payment_details`) VALUES
(29, 55, '2020-03-05', 1, '2563kjjh12'),
(30, 56, '2020-03-05', 2, 'sd3456fghfgh'),
(32, 58, '2020-03-05', 3, 'pldd787sdjhsdf87sd'),
(33, 59, '2020-03-05', 1, 'sds3445fr'),
(35, 61, '2020-03-22', 1, '2454jtut'),
(43, 69, '2020-03-24', 3, 'dfgd45664rtghrt'),
(45, 71, '2020-03-24', 3, 'tyutjg567567cdgfd'),
(46, 72, '2020-03-24', 2, 'wer34der354rtf34'),
(47, 73, '2020-04-04', 1, 'swerfd45iop'),
(48, 74, '2020-04-04', 2, '245ljury55'),
(49, 75, '2020-04-04', 3, 'sdfwe45gee'),
(50, 76, '2020-04-04', 2, 'dfgderge45ge'),
(51, 77, '2020-04-04', 3, 'dfgfdg345fg'),
(52, 78, '2020-11-22', 1, 'bKash-x7iutagt9x'),
(57, 85, '2020-11-22', 2, 'master-zrei9dceyor'),
(58, 86, '2020-11-22', 3, 'paypal-qbsc7lxmjr'),
(59, 87, '2020-11-22', 1, 'bKash-7sp0fv7m8y3'),
(60, 88, '2020-11-23', 2, 'master-nrd8i3q2ei');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(300) NOT NULL,
  `serial` int(10) UNSIGNED NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `adult_number` tinyint(3) UNSIGNED NOT NULL,
  `child_number` tinyint(3) UNSIGNED NOT NULL,
  `category_id` tinyint(3) UNSIGNED NOT NULL,
  `picture1` varchar(4) DEFAULT NULL,
  `picture2` varchar(4) DEFAULT NULL,
  `picture3` varchar(4) DEFAULT NULL,
  `picture4` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `description`, `serial`, `price`, `adult_number`, `child_number`, `category_id`, `picture1`, `picture2`, `picture3`, `picture4`) VALUES
(17, 'All our guestrooms are elegantly furnished with handmade furniture include luxury en-suite facilities with complimentary amenities pack, flat screen LCD TV, tea/coffee making facilities, fan, hairdryer and the finest pure white linen and towels.\r\n', 102, 1000, 2, 0, 6, 'jpg', 'jpg', 'jpg', 'jpg'),
(18, 'This is a bast room This is a bast room This is a bast room This is a bast room', 105, 1500, 4, 2, 5, 'jpg', 'jpg', 'jpg', 'jpg'),
(19, 'This is a bast room This is a bast room This is a bast room This is a bast room', 110, 2000, 3, 2, 7, 'jpg', 'jpg', 'jpg', 'jpg'),
(20, 'All our guestrooms are elegantly furnished with handmade furniture include luxury en-suite facilities with complimentary amenities pack, flat screen LCD TV, tea/coffee making facilities, fan, hairdryer and the finest pure white linen and towels', 202, 2000, 4, 4, 5, 'jpg', 'jpg', 'jpg', 'jpg'),
(21, 'All our guestrooms are elegantly furnished with handmade furniture include luxury en-suite facilities with complimentary amenities pack, flat screen LCD TV, tea/coffee making facilities, fan, hairdryer and the finest pure white linen and towels.', 204, 1500, 2, 0, 4, 'jpg', 'jpg', 'jpg', 'jpg'),
(22, 'All our guestrooms are elegantly furnished with handmade furniture include luxury en-suite facilities with complimentary amenities pack, flat screen LCD TV, tea/coffee making facilities.', 214, 2000, 4, 4, 5, 'jpg', 'jpg', 'jpg', 'jpg'),
(23, 'All our guestrooms are elegantly furnished with handmade furniture include luxury en-suite facilities with complimentary amenities pack, flat screen LCD TV, tea/coffee making facilities, fan, hairdryer and the finest pure white linen and towels.', 306, 2500, 2, 2, 3, 'jpg', 'jpg', 'jpg', 'jpg'),
(24, 'All our guestrooms are elegantly furnished with handmade furniture include luxury en-suite facilities with complimentary amenities pack.', 305, 1500, 3, 1, 6, 'jpg', 'jpg', 'jpg', 'jpg');

-- --------------------------------------------------------

--
-- Table structure for table `room_categories`
--

CREATE TABLE `room_categories` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_categories`
--

INSERT INTO `room_categories` (`id`, `name`) VALUES
(1, 'Single Economy'),
(2, 'Single Deluxe'),
(3, 'Double Deluxe'),
(4, 'Honeymoon Suit'),
(5, 'Double Economy '),
(6, 'Standard suite'),
(7, 'Executive suite');

-- --------------------------------------------------------

--
-- Table structure for table `room_dining`
--

CREATE TABLE `room_dining` (
  `id` int(10) UNSIGNED NOT NULL,
  `room_id` int(10) UNSIGNED NOT NULL,
  `reservation_id` int(10) UNSIGNED NOT NULL,
  `dining_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room_features`
--

CREATE TABLE `room_features` (
  `id` int(10) UNSIGNED NOT NULL,
  `room_id` int(10) UNSIGNED NOT NULL,
  `feature_id` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_features`
--

INSERT INTO `room_features` (`id`, `room_id`, `feature_id`) VALUES
(96, 18, 7),
(97, 18, 3),
(98, 18, 10),
(99, 18, 9),
(100, 18, 4),
(101, 19, 5),
(102, 19, 7),
(103, 19, 3),
(104, 19, 8),
(105, 19, 2),
(110, 17, 5),
(111, 17, 7),
(112, 17, 9),
(113, 17, 10),
(114, 20, 5),
(115, 20, 8),
(116, 20, 3),
(117, 20, 4),
(118, 21, 7),
(119, 21, 8),
(120, 21, 3),
(121, 21, 10),
(122, 21, 9),
(123, 22, 5),
(124, 22, 8),
(125, 22, 3),
(126, 22, 4),
(127, 23, 7),
(128, 23, 8),
(129, 23, 3),
(130, 23, 10),
(131, 23, 2),
(132, 23, 9),
(133, 24, 5),
(134, 24, 8),
(135, 24, 3),
(136, 24, 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `contact` varchar(25) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `gender` tinyint(3) UNSIGNED NOT NULL,
  `address` varchar(250) NOT NULL,
  `upassword` char(32) NOT NULL,
  `Picture` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contact`, `category_id`, `gender`, `address`, `upassword`, `Picture`) VALUES
(1, 'Salehen', 'admin@gmail.com', '01836307836', 1, 1, '43 new eskaton road dhaka 1000', '81dc9bdb52d04dc20036dbd8313ed055', 'jpg'),
(7, 'sub admin', 'sub@gmail.com', '01836302145', 3, 1, 'as aisdua sdi asdius', 'e10adc3949ba59abbe56e057f20f883e', ''),
(8, 'ruku', 'ruku@gmail.com', '01255688865', 3, 2, 'asda adsd s', 'e10adc3949ba59abbe56e057f20f883e', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_categories`
--

CREATE TABLE `user_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_categories`
--

INSERT INTO `user_categories` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'customer'),
(3, 'Sub Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booked`
--
ALTER TABLE `booked`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `booked_ibfk_3` (`reaservation_id`);

--
-- Indexes for table `citys`
--
ALTER TABLE `citys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `contact` (`contact`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `dining_items`
--
ALTER TABLE `dining_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dining_logs`
--
ALTER TABLE `dining_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservation_id` (`reservation_id`),
  ADD KEY `dianing_id` (`dianing_id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `start_date` (`start_date`),
  ADD KEY `end_date` (`end_date`),
  ADD KEY `amount` (`amount`);

--
-- Indexes for table `reservation_payment_info`
--
ALTER TABLE `reservation_payment_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_id` (`payment_id`),
  ADD KEY `reservation_id` (`reservation_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `serial` (`serial`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `room_categories`
--
ALTER TABLE `room_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_dining`
--
ALTER TABLE `room_dining`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `dining_id` (`dining_id`),
  ADD KEY `reservation_id` (`reservation_id`);

--
-- Indexes for table `room_features`
--
ALTER TABLE `room_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `feature_id` (`feature_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `contact` (`contact`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `user_categories`
--
ALTER TABLE `user_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booked`
--
ALTER TABLE `booked`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `citys`
--
ALTER TABLE `citys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `dining_items`
--
ALTER TABLE `dining_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dining_logs`
--
ALTER TABLE `dining_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=980;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `reservation_payment_info`
--
ALTER TABLE `reservation_payment_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `room_categories`
--
ALTER TABLE `room_categories`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `room_dining`
--
ALTER TABLE `room_dining`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `room_features`
--
ALTER TABLE `room_features`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_categories`
--
ALTER TABLE `user_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booked`
--
ALTER TABLE `booked`
  ADD CONSTRAINT `booked_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booked_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booked_ibfk_3` FOREIGN KEY (`reaservation_id`) REFERENCES `reservations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `citys`
--
ALTER TABLE `citys`
  ADD CONSTRAINT `citys_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `customers_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `citys` (`id`);

--
-- Constraints for table `dining_logs`
--
ALTER TABLE `dining_logs`
  ADD CONSTRAINT `dining_logs_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dining_logs_ibfk_2` FOREIGN KEY (`dianing_id`) REFERENCES `dining_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation_payment_info`
--
ALTER TABLE `reservation_payment_info`
  ADD CONSTRAINT `reservation_payment_info_ibfk_1` FOREIGN KEY (`payment_id`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_payment_info_ibfk_2` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `room_categories` (`id`);

--
-- Constraints for table `room_dining`
--
ALTER TABLE `room_dining`
  ADD CONSTRAINT `room_dining_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `room_dining_ibfk_2` FOREIGN KEY (`dining_id`) REFERENCES `dining_items` (`id`),
  ADD CONSTRAINT `room_dining_ibfk_3` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`);

--
-- Constraints for table `room_features`
--
ALTER TABLE `room_features`
  ADD CONSTRAINT `room_features_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `room_features_ibfk_2` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `user_categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
