-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2023 at 08:29 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customer`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(110) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `password` varchar(100) NOT NULL,
  `userLevel` varchar(100) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `phone`, `password`, `userLevel`) VALUES
(1, 'ceciliawong', 'cecilia', 'cecilia_wg@gmail.com', '0196683624', '123456', 'admin'),
(2, 'AnnaShay', 'Anna', 'annashay01@gmail.com', '0168823674', '123', 'admin'),
(17, 'Tai Zhen Yu', 'Zhen Yu', 'zy@gmail.com', '0192105764', 'zhenyu11', 'user'),
(18, 'Edison Lim', 'Edison', 'edison@gmail.com', '0174413576', '123', 'user'),
(19, 'Jay Chao', 'Jay', 'jay@gmail.com', '0175564782', 'jay224', 'user'),
(20, 'Jackson', 'Jack', 'jack@gmail.com', '0197763478', 'jay45', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` blob NOT NULL,
  `sku` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price`, `quantity`, `image`, `sku`) VALUES
(65, 10, 46, 'BCD (buoyancy compensator device)', 55, 1, 0x4243442e6a706567, 'BCD45767567'),
(66, 10, 43, 'Scuba Cylinder', 15, 1, 0x534355424143594c494e4445522e6a7067, 'SC5656464'),
(67, 10, 43, 'Scuba Cylinder', 15, 1, 0x534355424143594c494e4445522e6a7067, 'SC5656464'),
(68, 10, 46, 'BCD (buoyancy compensator device)', 55, 1, 0x4243442e6a706567, 'BCD45767567'),
(72, 17, 45, 'Regulator', 55, 1, 0x524547554c41544f522e6a7067, 'RG12736273'),
(73, 17, 43, 'Scuba Cylinder', 15, 1, 0x534355424143594c494e4445522e6a7067, 'SC5656464'),
(74, 17, 49, 'Wetsuit', 20, 1, 0x77657473756974312e6a7067, 'WT7349837'),
(75, 17, 48, 'Air Refill(twin tanks)', 90, 1, 0x61697220726566696c6c6572312e6a7067, 'AR6798457');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` int(11) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(28, 15, 'John Nick', 'John@gmail.com', 1233, 'asddd');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `rent_duration` varchar(100) NOT NULL,
  `collect_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `type` varchar(100) NOT NULL,
  `method` varchar(100) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` date NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `rental_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `username`, `name`, `number`, `email`, `rent_duration`, `collect_date`, `type`, `method`, `total_products`, `total_price`, `placed_on`, `payment_status`, `rental_status`) VALUES
(11, 1, 'huberman_00', 'Andrew Huberman', '0165348997', 'andrewhub@gmail.com', '0', '2023-11-22 06:58:01', 'FullPayment', 'Online Banking', 'Car Grounding Cable (100 x 1) - (25MM) Conduit Fittings (10 x 10) - CCTV SPD-POE1000E Network Surge Protector (70 x 1) - ', 270, '2023-11-10', 'fullfilled', 'pending'),
(13, 10, '', '123', '123456789', '123@gmail.com', '2 week', '2023-11-21 17:47:35', 'paylater', 'onlinebank', 'Regulator (55 x 1) - ', 55, '0000-00-00', 'onlydeposit', 'pending'),
(14, 18, '', 'Edison Lim', '0174413576', 'edison@gmail.com', '2 week', '2023-11-22 06:16:50', 'fullpayment', 'epay', 'Corrective Lens (50 x 1) - Scuba Cylinder (15 x 2) - Scuba Mask & Snorkel (15 x 1) - ', 95, '0000-00-00', 'fullfilled', 'pending'),
(15, 19, '', 'Jay Chao', '0175564782', 'jay@gmail.com', '2 week', '2023-11-22 06:36:14', 'fullpayment', 'epay', 'Regulator (55 x 1) - Fins (15 x 1) - Wetsuit (20 x 1) - ', 90, '0000-00-00', 'onlydeposit', 'pending'),
(16, 19, '', 'Jay Chao', '0175564782', 'jay@gmail.com', '1 week', '2023-11-22 06:36:22', 'paylater', 'epay', 'Scuba Cylinder (15 x 1) - Air Refill(twin tanks) (90 x 1) - BCD (buoyancy compensator device) (55 x 1) - Fins (15 x 1) - ', 175, '0000-00-00', 'fullfilled', 'pending'),
(17, 19, '', 'Jay Chao', '0175564782', 'jay@gmail.com', '1 week', '2023-11-22 07:07:32', 'paylater', 'onlinebank', 'Regulator (55 x 1) - Wetsuit (20 x 1) - Scuba Mask & Snorkel (15 x 1) - Weight Belt (8 x 1) - ', 98, '0000-00-00', 'fullfilled', 'completed'),
(18, 20, '', 'Jackson', '0197763478', 'jack@gmail.com', '1 week', '2023-11-30 07:01:00', 'fullpayment', 'epay', 'Regulator (55 x 1) - Wetsuit (20 x 1) - Fins (15 x 1) - ', 90, '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `sku` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `details` varchar(300) NOT NULL,
  `price` int(100) DEFAULT NULL,
  `image_01` blob NOT NULL,
  `image_02` blob NOT NULL,
  `image_03` blob NOT NULL,
  `availability` enum('available','unavailable') NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sku`, `name`, `details`, `price`, `image_01`, `image_02`, `image_03`, `availability`) VALUES
(43, 'SC5656464', 'Scuba Cylinder', 'A gas cylinder used to store and transport high pressure gas used in diving operations. This may be breathing gas used with a scuba set, in which case the cylinder may also be referred to as a scuba cylinder, scuba tank, or diving tank.', 15, 0x534355424143594c494e4445522e6a7067, 0x7363626163796c64722e6a7067, 0x7363626163796c6472322e6a7067, 'available'),
(45, 'RG12736273', 'Regulator', 'In automatic control, a regulator is a device which has the function of maintaining a designated characteristic. It performs the activity of managing or maintaining a range of values in a machine.', 55, 0x524547554c41544f522e6a7067, 0x726567756c61746f72322e77656270, 0x726567756c61746f72332e6a7067, 'available'),
(46, 'BCD45767567', 'BCD (buoyancy compensator device)', 'A buoyancy compensator, also called a buoyancy control device, stabilizer, stabilisor, stab jacket, wing or adjustable buoyancy life jacket, depending on design, is a type of diving equipment which is worn by divers to establish neutral buoyancy underwater and positive buoyancy at the surface, when ', 55, 0x4243442e6a706567, 0x646976652d73686f702d626364732e6a7067, 0x6263642d6d61696e74656e616e63652d70617274732e6a7067, 'available'),
(47, 'SM7955257', 'Scuba Mask & Snorkel', 'Masks add an air space between your eyes and the water.', 15, 0x73637562616d61736b5f332e706e67, 0x73637562616d61736b5f312e706e67, 0x73637562616d61736b5f322e706e67, 'available'),
(48, 'AR6798457', 'Air Refill(twin tanks)', 'Refilling air tanks for scuba diving involves inspecting the tank for damage, attaching it to a special compressor, and filling it with clean, contaminant-free air, usually to about 3000 psi.', 90, 0x61697220726566696c6c6572312e6a7067, 0x576861747341707020496d61676520323032332d31312d32322061742031332e31322e33335f38323065323662322e6a7067, 0x61697220726566696c6c6572332e6a7067, 'available'),
(49, 'WT7349837', 'Wetsuit', 'A wetsuit is a garment, usually made of neoprene, worn by surfers, divers, and other water sports enthusiasts to provide thermal insulation, abrasion resistance, and buoyancy.', 20, 0x77657473756974312e6a7067, 0x77656973756974322e6a7067, 0x7765747375697420332e6a7067, 'available'),
(50, 'FS83409630', 'Fins', 'Fins are swimming aids worn on the feet, used by scuba divers, snorkelers, and swimmers to enhance mobility and efficiency in the water.', 15, 0x66696e73312e6a7067, 0x66696e73322e6a7067, 0x66696e73332e6a7067, 'available'),
(51, 'WB7539470', 'Weight Belt', 'A weight belt is a piece of diving equipment used to help divers maintain neutral buoyancy underwater.', 8, 0x7762312e6a7067, 0x7762322e6a7067, 0x7762332e6a7067, 'available'),
(52, 'CL79472934', 'Corrective Lens', 'Corrective lenses, commonly known as eyeglasses or contact lenses, are optical devices used to improve and correct vision problems, such as nearsightedness (myopia), farsightedness (hyperopia), astigmatism, and presbyopia.', 50, 0x636c312e6a7067, 0x636c322e6a7067, 0x636c332e6a7067, 'available'),
(53, 'DT5984849', 'Dive Torch without batteries', 'A dive torch without batteries typically relies on alternative power sources to provide illumination underwater.', 25, 0x6474312e6a7067, 0x6474322e6a7067, 0x6474332e6a7067, 'available'),
(54, 'DC6749057', 'Dive Computer', 'Dive computers are essential tools for scuba divers, enhancing safety by providing accurate real-time information and reducing the need for manual dive planning and tables.', 35, 0x6463312e6a7067, 0x6463322e6a7067, 0x6463332e6a7067, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `name`, `username`, `email`, `password`, `phone`) VALUES
(1, 'Andrew Huberman', 'huberman_00', 'andrewhub@gmail.com', '123', '0165348997');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `pid`, `name`, `price`, `image`) VALUES
(44, 14, 40, 'Car Grounding Cable', '100', 0x4361722047726f756e64696e67204361626c652e312e4a5047),
(45, 15, 40, 'Car Grounding Cable', '100', 0x4361722047726f756e64696e67204361626c652e312e4a5047);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
