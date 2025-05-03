-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2024 at 05:57 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `podiatry`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `catid` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `usertype` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `catid`, `price`, `thumb`, `description`, `usertype`) VALUES
(28, 'Flower + Postcard', 4, '2500', 'uploads/happy-birthday-card-with-flowers-assortment (1).jpg', 'Regular package\r\n', 'met'),
(29, 'Flower + Postcard + Music', 4, '2500', 'uploads/5834880373933327015 (1).jpg', 'Big cake for gift', 'met'),
(30, 'Flower + Postcard + Cake + Richit', 4, '2500', 'uploads/burning-sparklers-night (1).jpg', '', 'met'),
(31, 'Flower + Postcard + Music + Cake + Richit', 4, '2500', 'uploads/low-angle-golden-firework-light-sky__1_-removebg-preview (1).jpg', 'Standard', 'met'),
(32, 'Big flower + Cake + Postcard with photo + richit + ballon ', 4, '2500', 'uploads/5834880373933327014.jpg', 'Luxury met met surprise package', 'met'),
(33, 'Big flower + Cake + Saxophone + Postcard with photo + richit + ballon', 4, '2500', 'uploads/saxophone-white-background (1).jpg', 'Luxury met surprise delivery package', 'met'),
(35, '0001, Bed', 6, '00', 'uploads/5778349473217494791.jpg', 'Beautiful bed', 'my'),
(36, '0002, Bed', 6, '00', 'uploads/5782765958023201890.jpg', 'beautiful bed', 'my'),
(37, '0003, Child bed', 6, '00', 'uploads/5868419455720210618.jpg', 'Simple and beautiful child bed', 'my'),
(38, '0004, Woody dining table', 9, '00', 'uploads/5787209118870782907.jpg', 'Beautiful and simple', 'my'),
(39, '0005, Simple Sofa', 7, '00', 'uploads/5812170511017427683.jpg', 'Simple and beautiful Sofa', 'my'),
(40, '0006, Greenish sofa', 7, '00', 'uploads/5814173524850492926.jpg', 'Beautiful greenish Sofa', 'my'),
(41, '0007, Comfortable sofa', 7, '00', 'uploads/5814173524850492931.jpg', 'Comfortable sofa', 'my'),
(42, '0008, Beautiful simple sofa', 7, '00', 'uploads/5814173524850492932.jpg', 'Beautiful and simple design', 'my'),
(43, '0009, Light sofa', 7, '00', 'uploads/5814173524850492934.jpg', 'Light colored', 'my'),
(44, '0010, Simple bed', 6, '00', 'uploads/5818695017311618467.jpg', 'light and simple bed', 'my'),
(45, '0011, Child bed', 6, '00', 'uploads/5864025227435033662.jpg', 'simple child bed with wardrobe', 'my'),
(49, '0015, Simple kids bed', 6, '00', 'uploads/5875361574569493779.jpg', 'Simple and small', 'my'),
(50, '0016, small bed', 6, '00', 'uploads/5875361574569493780.jpg', '', 'my'),
(51, '0017, Tiny child bed', 6, '00', 'uploads/5875361574569493781.jpg', '', 'my'),
(52, '0018, Movable childs bed', 6, '00', 'uploads/5875361574569493782.jpg', '', 'my'),
(53, '0019, Child bed', 6, '00', 'uploads/5875361574569493786.jpg', '', 'my'),
(54, '0020, Beautiful child bed', 6, '00', 'uploads/5875361574569493787.jpg', '', 'my'),
(55, '0021, Luxury child bed', 6, '00', 'uploads/5875361574569493789.jpg', '', 'my'),
(56, '0022, Child beds', 6, '00', 'uploads/5875361574569493790.jpg', '', 'my'),
(57, '0023, Simple bed', 6, '00', 'uploads/5875361574569493791.jpg', '', 'my'),
(58, '0024, Child bed', 6, '00', 'uploads/5875361574569493792.jpg', '', 'my'),
(59, '0025, Woody child bed', 6, '00', 'uploads/5875361574569493793.jpg', '', 'my'),
(60, '0026, Child bed', 6, '00', 'uploads/5875361574569493794.jpg', '', 'my'),
(61, '0027, Beautiful child bed', 6, '00', 'uploads/5875361574569493795.jpg', '', 'my'),
(62, '0028, Simple bed', 6, '00', 'uploads/5875361574569493796.jpg', '', 'my'),
(63, '0029, Child beds', 6, '00', 'uploads/5875361574569493797.jpg', '', 'my'),
(64, '0030, Simple bed', 6, '00', 'uploads/5875361574569493798.jpg', '', 'my'),
(65, '0031, Child bed', 6, '00', 'uploads/5875361574569493801.jpg', '', 'my'),
(66, '0032, Beautiful child bed', 6, '00', 'uploads/5875361574569493802.jpg', '', 'my'),
(68, '0034, Fancy child bed', 6, '00', 'uploads/5875361574569493804.jpg', '', 'my'),
(69, '0035, Simple bed', 6, '00', 'uploads/5875361574569493805.jpg', '', 'my'),
(70, '0036, Child bed', 6, '00', 'uploads/5877203235071181606.jpg', '', 'my'),
(77, '0043, Simple and beautiful bed', 6, '00', 'uploads/5877203235071181615.jpg', '', 'my'),
(78, '0044, Black bed', 6, '00', 'uploads/5877203235071181616.jpg', '', 'my'),
(81, '0047, Bed', 6, '00', 'uploads/5877203235071181619.jpg', '', 'my'),
(84, '0050, Simple bed', 6, '00', 'uploads/5877203235071181624.jpg', '', 'my'),
(85, '0051, Table', 9, '00', 'uploads/5877203235071181625.jpg', '', 'my'),
(86, '0052, Dining table', 9, '00', 'uploads/5877203235071181626.jpg', '', 'my'),
(88, '0054, Black dining table', 9, '00', 'uploads/5877203235071181632.jpg', '', 'my'),
(89, '0055, Simple Sofa', 7, '00', 'uploads/5877203235071181633.jpg', '', 'my'),
(91, '0057, Blue gray sofa', 7, '00', 'uploads/5877203235071181635.jpg', '', 'my'),
(92, '0058, Light sofa', 7, '00', 'uploads/5877203235071181636.jpg', '', 'my'),
(93, '0059, Brownie sofa', 7, '00', 'uploads/5877203235071181637.jpg', '', 'my'),
(94, '0060, Beautiful simple sofa', 7, '00', 'uploads/5877203235071181638.jpg', '', 'my'),
(95, '0061, Light pink Sofa', 7, '00', 'uploads/5877203235071181639.jpg', '', 'my'),
(96, '0062, Light gray sofa', 7, '00', 'uploads/5877203235071181640.jpg', '', 'my'),
(97, '0063, Light sofa', 7, '00', 'uploads/5877203235071181641.jpg', '', 'my'),
(98, '0064, Dining table', 9, '00', 'uploads/5877203235071181649.jpg', '', 'my'),
(99, '0065, Woody dining table', 9, '00', 'uploads/5877203235071181650.jpg', '', 'my'),
(100, '0066, Simple dining table', 9, '00', 'uploads/5877203235071181651.jpg', '', 'my'),
(101, '0067, Simple dining table', 9, '00', 'uploads/5877203235071181652.jpg', '', 'my'),
(102, '0068, Blue sofa', 7, '00', 'uploads/5877203235071181653.jpg', '', 'my'),
(103, '0069, Light sofa', 7, '00', 'uploads/5877203235071181654.jpg', '', 'my'),
(104, '0070, Simple Sofa', 7, '00', 'uploads/5877203235071181655.jpg', '', 'my'),
(105, '0071, Dining table', 9, '00', 'uploads/5877203235071181657.jpg', '', 'my'),
(106, '0072, Simple dining table', 9, '00', 'uploads/5877203235071181658.jpg', '', 'my'),
(107, '0073, Light blue dining table', 9, '00', 'uploads/5877203235071181660.jpg', '', 'my'),
(108, '0074, Simple Sofa', 7, '00', 'uploads/5877203235071181662.jpg', '', 'my'),
(110, '0076, Light greenish sofa', 7, '00', 'uploads/5877203235071181669.jpg', '', 'my'),
(111, '0077, White Sofa', 7, '00', 'uploads/5877203235071181671.jpg', '', 'my'),
(112, '0078, Simple Sofa', 7, '00', 'uploads/5877203235071181672.jpg', '', 'my'),
(113, '0079, Sofa', 7, '00', 'uploads/5985701668110582205.jpg', '', 'my'),
(114, '0080, Beautiful designed Sofa', 7, '00', 'uploads/5992329670231704321.jpg', '', 'my'),
(115, '0081, Light sofa', 7, '00', 'uploads/5992329670231704325.jpg', '', 'my'),
(116, '0082, Gray sofa', 7, '00', 'uploads/5992329670231704328.jpg', '', 'my'),
(117, '0083, Simple Sofa', 7, '00', 'uploads/5992329670231704332.jpg', '', 'my'),
(118, 'Yellow Audi', 17, '00', 'uploads/7da7a8927f1cb1f0df27ad4460365dfe.jpg', '', ''),
(119, 'Suzuki dezire', 0, '00', 'uploads/562b9a1c573488e7a326aeda9979ded2.jpg', '', ''),
(120, 'Gray Mazda', 17, '00', 'uploads/a4c091b2b9e1162aa8bf96f8aac21143.jpg', '', ''),
(121, 'Cadillac', 17, '00', 'uploads/c1254dc93c91e9acc6140aebba585eed.jpg', '', ''),
(122, 'Black BMW', 17, '00', 'uploads/d440281d63269f2040ce30db757130bf.jpg', '', ''),
(123, 'Hilux Invencible', 16, '00', 'uploads/4c964cab5143dfc1df70f34e7db61bdf.jpg', '', ''),
(124, 'Toyota Hilux', 16, '00', 'uploads/8d558a5deb76d822c13d1203456dee2b.jpg', '', ''),
(125, 'Mercedes', 16, '00', 'uploads/43d65c1a0e51fe22ff18b8b28e47845a.jpg', '', ''),
(126, 'Ford', 16, '00', 'uploads/59f18e92472db668fd3ec7c6946dc746.jpg', '', ''),
(127, 'RAM Dodge', 16, '00', 'uploads/61af89b549488e5a2f062c6b26605113.jpg', '', ''),
(128, 'Ford', 16, '00', 'uploads/a69cd7dc1e762a81a4f06d6e9565f088.jpg', '', ''),
(129, 'Ford', 16, '00', 'uploads/ff5c8a5b2d48da0ff87255e29e16de68.jpg', '', ''),
(130, 'Hyundia 2024', 15, '00', 'uploads/0cf3cfeb3d172f496cb4d930ce449c8d.jpg', '', ''),
(131, 'Cheverolet', 15, '00', 'uploads/1e50ba3ce79d907ce49f0ea6b74ccd5a.jpg', '', ''),
(132, 'Cadillac Escalade', 15, '00', 'uploads/899a9ba4bfbc2cd73c1fbaa5a71d42e4.jpg', '', ''),
(133, 'Toyota ', 15, '00', 'uploads/bfa0ca60f96dbae98aa40550ce754335.jpg', '', ''),
(134, 'Mercedes', 15, '00', 'uploads/ce85704a2ad380e0821bf826c8c83e9a.jpg', '', ''),
(135, 'Lexus Suv', 15, '00', 'uploads/d54bb97445381ef24f51d289c264872c.jpg', '', ''),
(136, 'Range rover', 15, '00', 'uploads/ebdf77b0d4ffa633f1440a01a85bf658.jpg', '', ''),
(137, 'Tucson', 15, '40000000', 'uploads/photo_2024-11-10_17-17-08.jpg', '2024', ''),
(138, 'Tucson', 15, '40000000', 'uploads/photo_2024-11-10_17-17-08.jpg', 'New 2024', ''),
(139, 'Tucson 2022  ', 15, '7,400,000', 'uploads/0cf3cfeb3d172f496cb4d930ce449c8d.jpg', 'Brand new', 'Abdu'),
(140, '', 17, '00', 'uploads/photo_2024-11-08_21-04-06.jpg', '2024', 'Abdu'),
(141, 'BYD e2', 17, '3,300,000', 'uploads/photo_2024-11-08_20-47-53.jpg', '2004 ', 'Abdu'),
(142, 'Toyota cross  2024 ', 15, '7,000,000', 'uploads/de.jpg', 'Brand new', 'Abdu'),
(143, 'Volkswagen ID6', 15, '7,000,000', 'uploads/photo_2024-11-02_10-19-12.jpg', 'Brand new', 'Abdu'),
(145, 'Mercedes', 15, '7,400,000', '', 'new', ''),
(151, 'T-shirts', 19, '00', 'uploads/1731680503_T.jpg', 'brand new', 'Yana'),
(152, '2 pieces', 20, '00', 'uploads/1731680548_Y7.jpg', 'Brand new', 'Yana'),
(153, 'Cape', 21, '00', 'uploads/1731680588_C.jpg', 'Brand new', 'Yana'),
(154, 'Shoes', 22, '00', 'uploads/1731680629_S.jpg', 'Brand new', 'Yana'),
(155, 'Socks', 23, '00', 'uploads/1731680817_Sc.jpg', 'Brand new', 'Yana'),
(157, 'Jackets', 25, '00', 'uploads/1731681183_J.jpg', 'Brand new', 'Yana'),
(158, 'Jersey', 26, '00', 'uploads/1731681223_Je.jpg', 'Brand new', 'Yana'),
(160, 'Sweatshirts', 28, '00', 'uploads/1731684579_ll.jpg', 'Brand new', 'Yana'),
(161, 'Trousers', 24, '00', 'uploads/1731685048_tjr.jpg,uploads/1731685048_tjr2.jpg', 'Brand new', 'Yana'),
(162, 'Hoodies', 27, '00', 'uploads/1731686949_Hip-Hop-Hoodies-Cactus-Jack-Swag.jpg', 'Brand new', 'Yana');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
