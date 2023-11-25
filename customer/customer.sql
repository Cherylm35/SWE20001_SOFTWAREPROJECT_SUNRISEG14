-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2023 at 06:40 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

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
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `password`) VALUES
(3, 'admin', 'admin', 'admin@gmail.com', '333'),
(4, '123', '123', '123@123', '123');

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
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES
(52, 11, 40, 'Car Grounding Cable', 100, 1, 0x4361722047726f756e64696e67204361626c652e312e4a5047);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(100) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` date NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `address` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `total_products`, `total_price`, `placed_on`, `payment_status`, `address`) VALUES
(8, 12, 'Carlie Ng', '01785647599', 'Carlie@hotmail.com', 'credit card', 'Car Grounding Cable (100 x 3) - CCTV SPD-POE1000E Network Surge Protector (70 x 3) - ', 510, '0000-00-00', 'completed', 'flat no. 168, Jalan Bukit Bintang, Kuala Lumpur, Selangor, Malaysia - 55100'),
(9, 14, 'John Wick', '01576485686', 'Wick@gmail.com', 'paytm', 'CCTV SPD-POE1000E Network Surge Protector (70 x 10) - Car Grounding Cable (100 x 3) - ', 1000, '0000-00-00', 'completed', 'flat no. 2, Persiaran Jalil 8,, Bukit Jalil, Kuala Lumpur, Selangor, Malaysia - 57000'),
(10, 11, 'Roger', '01586643748', 'Roger@gmail.com', 'paypal', 'CCTV SPD-POE1000E Network Surge Protector (70 x 1) - ', 70, '0000-00-00', 'pending', 'flat no. 10, Bukit Jalil, Kuala Lumpur, Selangor, Malaysia - 192734'),
(11, 15, '123', '12333', '123@asd', 'cash on delivery', 'Car Grounding Cable (100 x 1) - (25MM) Conduit Fittings (10 x 10) - CCTV SPD-POE1000E Network Surge Protector (70 x 1) - ', 270, '0000-00-00', '', 'flat no. 13, asd, asd, asd, asd - 12333');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `details` varchar(300) NOT NULL,
  `price` int(100) NOT NULL,
  `image_01` blob NOT NULL,
  `image_02` blob NOT NULL,
  `image_03` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `details`, `price`, `image_01`, `image_02`, `image_03`) VALUES
(39, 'CCTV SPD-POE1000E Network Surge Protector', '10/100/1000Mbps RJ45 Gigabit PoE Network Data Surge Protector', 70, 0x537572676550726f746563746f722e4a5047, 0x537572676550726f746563746f722e312e4a5047, 0x537572676550726f746563746f722e332e4a5047),
(40, 'Car Grounding Cable', '300amp Set 5Point Pure Cooper Blue Cable Universal Size', 100, 0x4361722047726f756e64696e67204361626c652e312e4a5047, 0x4361722047726f756e64696e67204361626c652e322e4a5047, 0x4361722047726f756e64696e67204361626c652e332e4a5047),
(41, '(25MM) Conduit Fittings', 'PVC CROSS TEE, PVC 3 WAY ELBOW, PVC 4 WAY ELBOW, PVC 5 WAY ELBOW, PVC ELBOW, PVC TEE are sold together and each PVC got 3 pieces\r\n\r\n\r\n\r\nSpecifications of (25MM) DIY PVC White Pipe Fitting Connector Joint Furniture Grade Conduit Cross 3 4 5 Way Elbow Tee Socket\r\nBrandNo BrandSKU2912595649_MY-14134708', 10, 0x436f6e647569742046697474696e67732e312e4a5047, 0x436f6e647569742046697474696e67732e322e4a5047, 0x436f6e647569742046697474696e67732e332e4a5047),
(42, 'Cake', '122', 12, 0x4d722074616e6720746573742e4a5047, 0x50696374757265312e6a7067, 0x53656d20342046696e616c204578616d2e4a5047);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `name`, `username`, `email`, `password`) VALUES
(11, 'John Nick', 'John', 'John@gmail.com', '123'),
(12, 'Carlie Ng', 'Carlie', 'Carlie@hotmail.com', '123'),
(14, 'John Wick', 'Wick', 'Wick@gmail.com', '123'),
(15, '123', '123', '123@gmail.com', '123');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `pid`, `name`, `price`, `image`) VALUES
(41, 11, 40, 'Car Grounding Cable', '100', 0x4361722047726f756e64696e67204361626c652e312e4a5047),
(43, 11, 41, '(25MM) Conduit Fittings', '10', 0x436f6e647569742046697474696e67732e312e4a5047),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
