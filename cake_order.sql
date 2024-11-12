-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 12, 2024 at 11:59 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cake_order`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cakes`
--

DROP TABLE IF EXISTS `cakes`;
CREATE TABLE IF NOT EXISTS `cakes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=277 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cakes`
--

INSERT INTO `cakes` (`id`, `name`, `price`) VALUES
(1, 'Chocolate cake with wafers (1/2 kg)', 325.00),
(2, 'Chocolate cake with wafers (1 kg)', 650.00),
(3, 'Chocolate cake with wafers (2 kg)', 1300.00),
(4, 'Chocolate cake with wafers (3 kg)', 1950.00),
(5, 'Chocolate cake with wafers (4 kg)', 2600.00),
(6, 'Square chocolate cake (1/2 kg)', 300.00),
(7, 'Square chocolate cake (1 kg)', 600.00),
(8, 'Square chocolate cake (2 kg)', 1200.00),
(9, 'Square chocolate cake (3 kg)', 1800.00),
(10, 'Square chocolate cake (4 kg)', 2400.00),
(11, 'Heart chocolate cake (1/2 kg)', 350.00),
(12, 'Heart chocolate cake (1 kg)', 700.00),
(13, 'Heart chocolate cake (2 kg)', 1400.00),
(14, 'Heart chocolate cake (3 kg)', 2100.00),
(15, 'Heart chocolate cake (4 kg)', 2800.00),
(16, 'Wafer chocolate cake (1/2 kg)', 300.00),
(17, 'Wafer chocolate cake (1 kg)', 600.00),
(18, 'Wafer chocolate cake (2 kg)', 1200.00),
(19, 'Wafer chocolate cake (3 kg)', 1800.00),
(20, 'Wafer chocolate cake (4 kg)', 2400.00),
(21, 'Creamy chocolate cake (1/2 kg)', 280.00),
(22, 'Creamy chocolate cake (1 kg)', 560.00),
(23, 'Creamy chocolate cake (2 kg)', 1120.00),
(24, 'Creamy chocolate cake (3 kg)', 1680.00),
(25, 'Creamy chocolate cake (4 kg)', 2240.00),
(26, 'Fruit chocolate cake (1/2 kg)', 350.00),
(27, 'Fruit chocolate cake (1 kg)', 700.00),
(28, 'Fruit chocolate cake (2 kg)', 1400.00),
(29, 'Fruit chocolate cake (3 kg)', 2100.00),
(30, 'Fruit chocolate cake (4 kg)', 2800.00),
(31, '3 layer birthday cake (1/2 kg)', 575.00),
(32, '3 layer birthday cake (1 kg)', 1150.00),
(33, '3 layer birthday cake (2 kg)', 2300.00),
(34, '3 layer birthday cake (3 kg)', 3450.00),
(35, '3 layer birthday cake (4 kg)', 4600.00),
(36, '3 layer birthday cake (5 kg)', 5750.00),
(37, 'Purple birthday cake (1/2 kg)', 375.00),
(38, 'Purple birthday cake (1 kg)', 750.00),
(39, 'Purple birthday cake (2 kg)', 1500.00),
(40, 'Purple birthday cake (3 kg)', 2250.00),
(41, 'Purple birthday cake (4 kg)', 3000.00),
(42, 'Purple birthday cake (5 kg)', 3750.00),
(43, 'Colourful birthday cake (1/2 kg)', 375.00),
(44, 'Colourful birthday cake (1 kg)', 750.00),
(45, 'Colourful birthday cake (2 kg)', 1500.00),
(46, 'Colourful birthday cake (3 kg)', 2250.00),
(47, 'Colourful birthday cake (4 kg)', 3000.00),
(48, 'Colourful birthday cake (5 kg)', 3750.00),
(49, 'White ribbon birthday cake (1/2 kg)', 375.00),
(50, 'White ribbon birthday cake (1 kg)', 750.00),
(51, 'White ribbon birthday cake (2 kg)', 1500.00),
(52, 'White ribbon birthday cake (3 kg)', 2250.00),
(53, 'White ribbon birthday cake (4 kg)', 3000.00),
(54, 'White ribbon birthday cake (5 kg)', 3750.00),
(55, 'Red ribbon birthday cake (1/2 kg)', 400.00),
(56, 'Red ribbon birthday cake (1 kg)', 800.00),
(57, 'Red ribbon birthday cake (2 kg)', 1600.00),
(58, 'Red ribbon birthday cake (3 kg)', 2400.00),
(59, 'Red ribbon birthday cake (4 kg)', 3200.00),
(60, 'Red ribbon birthday cake (5 kg)', 4000.00),
(61, 'Green birthday cake (1/2 kg)', 375.00),
(62, 'Green birthday cake (1 kg)', 750.00),
(63, 'Green birthday cake (2 kg)', 1500.00),
(64, 'Green birthday cake (3 kg)', 2250.00),
(65, 'Green birthday cake (4 kg)', 3000.00),
(66, 'Green birthday cake (5 kg)', 3750.00),
(67, 'Colourful cupcakes(6)', 150.00),
(68, 'Colourful cupcakes(12)', 300.00),
(69, 'Colourful cupcakes(18)', 450.00),
(70, 'Colourful cupcakes(24)', 600.00),
(71, 'Colourful cupcakes(30)', 750.00),
(72, 'Love cupcakes(6)', 150.00),
(73, 'Love cupcakes(12)', 300.00),
(74, 'Love cupcakes(18)', 450.00),
(75, 'Love cupcakes(24)', 600.00),
(76, 'Love cupcakes(30)', 750.00),
(77, 'Choco cupcakes(3)', 45.00),
(78, 'Choco cupcakes(6)', 90.00),
(79, 'Choco cupcakes(9)', 135.00),
(80, 'Choco cupcakes(12)', 180.00),
(81, 'Choco cupcakes(15)', 225.00),
(82, 'Choco chip cupcakes(3)', 45.00),
(83, 'Choco chip cupcakes(6)', 90.00),
(84, 'Choco chip cupcakes(9)', 135.00),
(85, 'Choco chip cupcakes(12)', 180.00),
(86, 'Choco chip cupcakes(15)', 225.00),
(87, 'Strawberry cupcakes(6)', 150.00),
(88, 'Strawberry cupcakes(12)', 300.00),
(89, 'Strawberry cupcakes(18)', 450.00),
(90, 'Strawberry cupcakes(24)', 600.00),
(91, 'Strawberry cupcakes(30)', 750.00),
(92, 'Butter cupcakes(3)', 45.00),
(93, 'Butter cupcakes(6)', 90.00),
(94, 'Butter cupcakes(9)', 135.00),
(95, 'Butter cupcakes(12)', 180.00),
(96, 'Butter cupcakes(15)', 225.00),
(97, 'Pink theme cake (1 kg)', 1500.00),
(98, 'Pink theme cake (2 kg)', 3000.00),
(99, 'Pink theme cake (3 kg)', 4500.00),
(100, 'Pink theme cake (4 kg)', 6000.00),
(101, 'Pink theme cake (5 kg)', 7500.00),
(102, 'Blue theme cake (1 kg)', 1500.00),
(103, 'Blue theme cake (2 kg)', 3000.00),
(104, 'Blue theme cake (3 kg)', 4500.00),
(105, 'Blue theme cake (4 kg)', 6000.00),
(106, 'Blue theme cake (5 kg)', 7500.00),
(107, 'Jumbo theme cake (1 kg)', 1500.00),
(108, 'Jumbo theme cake (2 kg)', 3000.00),
(109, 'Jumbo theme cake (3 kg)', 4500.00),
(110, 'Jumbo theme cake (4 kg)', 6000.00),
(111, 'Jumbo theme cake (5 kg)', 7500.00),
(112, 'Minnie theme cake (1 kg)', 1500.00),
(113, 'Minnie theme cake (2 kg)', 3000.00),
(114, 'Minnie theme cake (3 kg)', 4500.00),
(115, 'Minnie theme cake (4 kg)', 6000.00),
(116, 'Minnie theme cake (5 kg)', 7500.00),
(117, 'Pooh theme cake (1 kg)', 1500.00),
(118, 'Pooh theme cake (2 kg)', 3000.00),
(119, 'Pooh theme cake (3 kg)', 4500.00),
(120, 'Pooh theme cake (4 kg)', 6000.00),
(121, 'Pooh theme cake (5 kg)', 7500.00),
(122, 'Princess theme cake (1 kg)', 1500.00),
(123, 'Princess theme cake (2 kg)', 3000.00),
(124, 'Princess theme cake (3 kg)', 4500.00),
(125, 'Princess theme cake (4 kg)', 6000.00),
(126, 'Princess theme cake (5 kg)', 7500.00),
(127, 'Butter fruit cake (1/2 kg)', 600.00),
(128, 'Butter fruit cake (1 kg)', 1200.00),
(129, 'Butter fruit cake (2 kg)', 2400.00),
(130, 'Butter fruit cake (3 kg)', 3600.00),
(131, 'Butter fruit cake (4 kg)', 4800.00),
(132, 'Love fruit cake (1/2 kg)', 600.00),
(133, 'Love fruit cake (1 kg)', 1200.00),
(134, 'Love fruit cake (2 kg)', 2400.00),
(135, 'Love fruit cake (3 kg)', 3600.00),
(136, 'Love fruit cake (4 kg)', 4800.00),
(137, 'Cashewnut cake (1/2 kg)', 600.00),
(138, 'Cashewnut cake (1 kg)', 1200.00),
(139, 'Cashewnut cake (2 kg)', 2400.00),
(140, 'Cashewnut cake (3 kg)', 3600.00),
(141, 'Cashewnut cake (4 kg)', 4800.00),
(142, 'Dry fruits cake (1/2 kg)', 600.00),
(143, 'Dry fruits cake (1 kg)', 1200.00),
(144, 'Dry fruits cake (2 kg)', 2400.00),
(145, 'Dry fruits cake (3 kg)', 3600.00),
(146, 'Dry fruits cake (4 kg)', 4800.00),
(147, 'Mixed fruit cake (1/2 kg)', 600.00),
(148, 'Mixed fruit cake (1 kg)', 1200.00),
(149, 'Mixed fruit cake (2 kg)', 2400.00),
(150, 'Mixed fruit cake (3 kg)', 3600.00),
(151, 'Mixed fruit cake (4 kg)', 4800.00),
(152, 'Strawberry cake (1/2 kg)', 600.00),
(153, 'Strawberry cake (1 kg)', 1200.00),
(154, 'Strawberry cake (2 kg)', 2400.00),
(155, 'Strawberry cake (3 kg)', 3600.00),
(156, 'Strawberry cake (4 kg)', 4800.00),
(157, 'Butterscotch eggless cake (1/2 kg)', 350.00),
(158, 'Butterscotch eggless cake (1 kg)', 700.00),
(159, 'Butterscotch eggless cake (2 kg)', 1400.00),
(160, 'Butterscotch eggless cake (3 kg)', 2100.00),
(161, 'Butterscotch eggless cake (4 kg)', 2800.00),
(162, 'Chocolate eggless cake (1/2 kg)', 300.00),
(163, 'Chocolate eggless cake (1 kg)', 600.00),
(164, 'Chocolate eggless cake (2 kg)', 1200.00),
(165, 'Chocolate eggless cake (3 kg)', 1800.00),
(166, 'Chocolate eggless cake (4 kg)', 2400.00),
(167, 'Red velvet eggless cake (1/2 kg)', 300.00),
(168, 'Red velvet eggless cake (1 kg)', 600.00),
(169, 'Red velvet eggless cake (2 kg)', 1200.00),
(170, 'Red velvet eggless cake (3 kg)', 1800.00),
(171, 'Red velvet eggless cake (4 kg)', 2400.00),
(172, 'Yellow eggless cake (1/2 kg)', 350.00),
(173, 'Yellow eggless cake (1 kg)', 700.00),
(174, 'Yellow eggless cake (2 kg)', 1400.00),
(175, 'Yellow eggless cake (3 kg)', 2100.00),
(176, 'Yellow eggless cake (4 kg)', 2800.00),
(177, 'Purple eggless cake (1/2 kg)', 350.00),
(178, 'Purple eggless cake (1 kg)', 700.00),
(179, 'Purple eggless cake (2 kg)', 1400.00),
(180, 'Purple eggless cake (3 kg)', 2100.00),
(181, 'Purple eggless cake (4 kg)', 2800.00),
(182, 'Choco eggless cake (1/2 kg)', 300.00),
(183, 'Choco eggless cake (1 kg)', 600.00),
(184, 'Choco eggless cake (2 kg)', 1200.00),
(185, 'Choco eggless cake (3 kg)', 1800.00),
(186, 'Choco eggless cake (4 kg)', 2400.00),
(187, '4 layer wedding cake (1 kg)', 1500.00),
(188, '4 layer wedding cake (2 kg)', 3000.00),
(189, '4 layer wedding cake (3 kg)', 4500.00),
(190, '4 layer wedding cake (4 kg)', 6000.00),
(191, '4 layer wedding cake (5 kg)', 7500.00),
(192, 'Heart wedding cake (1 kg)', 1500.00),
(193, 'Heart wedding cake (2 kg)', 3000.00),
(194, 'Heart wedding cake (3 kg)', 4500.00),
(195, 'Heart wedding cake (4 kg)', 6000.00),
(196, 'Heart wedding cake (5 kg)', 7500.00),
(197, 'Yellow wedding cake (1 kg)', 1500.00),
(198, 'Yellow wedding cake (2 kg)', 3000.00),
(199, 'Yellow wedding cake (3 kg)', 4500.00),
(200, 'Yellow wedding cake (4 kg)', 6000.00),
(201, 'Yellow wedding cake (5 kg)', 7500.00),
(202, 'Unique wedding cake (1 kg)', 1500.00),
(203, 'Unique wedding cake (2 kg)', 3000.00),
(204, 'Unique wedding cake (3 kg)', 4500.00),
(205, 'Unique wedding cake (4 kg)', 6000.00),
(206, 'Unique wedding cake (5 kg)', 7500.00),
(207, 'Purple wedding cake (1 kg)', 1500.00),
(208, 'Purple wedding cake (2 kg)', 3000.00),
(209, 'Purple wedding cake (3 kg)', 4500.00),
(210, 'Purple wedding cake (4 kg)', 6000.00),
(211, 'Purple wedding cake (5 kg)', 7500.00),
(212, 'Elegant wedding cake (1 kg)', 1500.00),
(213, 'Elegant wedding cake (2 kg)', 3000.00),
(214, 'Elegant wedding cake (3 kg)', 4500.00),
(215, 'Elegant wedding cake (4 kg)', 6000.00),
(216, 'Elegant wedding cake (5 kg)', 7500.00),
(217, 'Yummy red velvet (1/2 kg)', 400.00),
(218, 'Yummy red velvet (1 kg)', 800.00),
(219, 'Yummy red velvet (2 kg)', 1600.00),
(220, 'Yummy red velvet (3 kg)', 2400.00),
(221, 'Yummy red velvet (4 kg)', 3200.00),
(222, 'Fruit red velvet (1/2 kg)', 425.00),
(223, 'Fruit red velvet (1 kg)', 850.00),
(224, 'Fruit red velvet (2 kg)', 1700.00),
(225, 'Fruit red velvet (3 kg)', 2550.00),
(226, 'Fruit red velvet (4 kg)', 3400.00),
(227, 'Love red velvet (1/2 kg)', 425.00),
(228, 'Love red velvet (1 kg)', 850.00),
(229, 'Love red velvet (2 kg)', 1700.00),
(230, 'Love red velvet (3 kg)', 2550.00),
(231, 'Love red velvet (4 kg)', 3400.00),
(232, 'Creamy red velvet (1/2 kg)', 400.00),
(233, 'Creamy red velvet (1 kg)', 800.00),
(234, 'Creamy red velvet (2 kg)', 1600.00),
(235, 'Creamy red velvet (3 kg)', 2400.00),
(236, 'Creamy red velvet (4 kg)', 3200.00),
(237, 'Round red velvet (1/2 kg)', 400.00),
(238, 'Round red velvet (1 kg)', 800.00),
(239, 'Round red velvet (2 kg)', 1600.00),
(240, 'Round red velvet (3 kg)', 2400.00),
(241, 'Round red velvet (4 kg)', 3200.00),
(242, 'Layered red velvet (1/2 kg)', 425.00),
(243, 'Layered red velvet (1 kg)', 850.00),
(244, 'Layered red velvet (2 kg)', 1700.00),
(245, 'Layered red velvet (3 kg)', 2550.00),
(246, 'Layered red velvet (4 kg)', 3400.00),
(247, 'Round black & white forest (1/2 kg)', 400.00),
(248, 'Round black & white forest (1 kg)', 800.00),
(249, 'Round black & white forest (2 kg)', 1600.00),
(250, 'Round black & white forest (3 kg)', 2400.00),
(251, 'Round black & white forest (4 kg)', 3200.00),
(252, '3 layer white forest (1 kg)', 860.00),
(253, '3 layer white forest (2 kg)', 1720.00),
(254, '3 layer white forest (3 kg)', 2580.00),
(255, '3 layer white forest (4 kg)', 3440.00),
(256, '3 layer white forest (5 kg)', 4300.00),
(257, 'Choco white forest (1/2 kg)', 400.00),
(258, 'Choco white forest (1 kg)', 800.00),
(259, 'Choco white forest (2 kg)', 1600.00),
(260, 'Choco white forest (3 kg)', 2400.00),
(261, 'Choco white forest (4 kg)', 3200.00),
(262, 'Choco black forest (1/2 kg)', 400.00),
(263, 'Choco black forest (1 kg)', 800.00),
(264, 'Choco black forest (2 kg)', 1600.00),
(265, 'Choco black forest (3 kg)', 2400.00),
(266, 'Choco black forest (4 kg)', 3200.00),
(267, 'Love black & white forest (1/2 kg)', 400.00),
(268, 'Love black & white forest (1 kg)', 800.00),
(269, 'Love black & white forest (2 kg)', 1600.00),
(270, 'Love black & white forest (3 kg)', 2400.00),
(271, 'Love black & white forest (4 kg)', 3200.00),
(272, 'Fruit black forest (1/2 kg)', 400.00),
(273, 'Fruit black forest (1 kg)', 800.00),
(274, 'Fruit black forest (2 kg)', 1600.00),
(275, 'Fruit black forest (3 kg)', 2400.00),
(276, 'Fruit black forest (4 kg)', 3200.00);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cake_id` int NOT NULL,
  `order_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL,
  `status` enum('pending','delivered') DEFAULT 'pending',
  PRIMARY KEY (`id`),
  KEY `cake_id` (`cake_id`),
  KEY `fk_user` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `cake_id`, `order_date`, `user_id`, `status`) VALUES
(1, 143, '2024-09-29 16:25:15', 2, 'delivered'),
(2, 114, '2024-09-29 16:26:42', 1, 'delivered'),
(3, 229, '2024-10-09 10:10:32', 1, 'pending'),
(4, 158, '2024-10-12 15:50:49', 1, 'pending'),
(5, 119, '2024-10-24 08:23:53', 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'Liveyana', '$2y$10$YcSyp0Tso8ZTe2ijZc7U2.sl.Uu56mxAGGJXNb2yCyc63BCckp8e.', '2024-08-11 14:23:16'),
(2, 'Joshua', '$2y$10$HgOW8ikO17.gkus8Vt/71.lvtOjXS9YUV4mr6YDmqglRH0an4JCIe', '2024-09-28 17:51:28');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
