-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2021 at 01:09 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mancave`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `ip_add` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`) VALUES
(1, 'Games'),
(2, 'Consoles'),
(3, 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `ord_date` date NOT NULL,
  `order_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `invoice_no`, `ord_date`, `order_status`) VALUES
(1, 1, 2351, '2021-06-26', 'unfulfilled'),
(2, 1, 3696, '2021-06-27', 'unfulfilled'),
(3, 1, 1511, '2021-06-27', 'unfulfilled'),
(4, 1, 3846, '2021-06-27', 'unfulfilled'),
(5, 3, 3297, '2021-06-27', 'unfulfilled'),
(6, 3, 3793, '2021-06-27', 'unfulfilled'),
(7, 3, 4546, '2021-06-27', 'unfulfilled'),
(8, 2, 1691, '2021-06-27', 'unfulfilled'),
(9, 2, 682, '2021-06-27', 'unfulfilled'),
(10, 2, 3499, '2021-06-27', 'unfulfilled'),
(11, 2, 4076, '2021-06-28', 'unfulfilled'),
(12, 2, 3218, '2021-06-28', 'unfulfilled'),
(13, 2, 2683, '2021-06-28', 'unfulfilled'),
(14, 2, 1867, '2021-06-28', 'unfulfilled'),
(15, 2, 1437, '2021-06-28', 'unfulfilled'),
(16, 2, 4276, '2021-06-28', 'unfulfilled'),
(17, 1, 3662, '2021-06-28', 'unfulfilled'),
(18, 3, 1672, '2021-06-28', 'unfulfilled'),
(19, 3, 2624, '2021-06-28', 'unfulfilled'),
(20, 6, 662, '2021-06-28', 'unfulfilled'),
(21, 6, 4115, '2021-06-28', 'unfulfilled'),
(22, 6, 4156, '2021-06-28', 'unfulfilled'),
(23, 6, 2924, '2021-06-28', 'unfulfilled'),
(24, 6, 1343, '2021-06-28', 'unfulfilled'),
(25, 6, 1070, '2021-06-28', 'unfulfilled'),
(26, 6, 1702, '2021-07-01', 'unfulfilled');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `product_id`, `qty`, `status`) VALUES
(1, 10, 1, 'fulfilled'),
(1, 9, 1, 'fulfilled'),
(2, 8, 1, 'fulfilled'),
(3, 6, 1, 'fulfilled'),
(4, 13, 1, 'unfulfilled'),
(4, 5, 1, 'fulfilled'),
(5, 13, 1, 'unfulfilled'),
(6, 8, 1, 'fulfilled'),
(7, 17, 1, 'fulfilled'),
(8, 24, 1, 'unfulfilled'),
(9, 6, 1, 'unfulfilled'),
(10, 6, 1, 'unfulfilled'),
(11, 6, 1, 'unfulfilled'),
(12, 6, 1, 'unfulfilled'),
(13, 6, 1, 'unfulfilled'),
(14, 6, 1, 'unfulfilled'),
(15, 6, 1, 'fulfilled'),
(16, 6, 1, 'fulfilled'),
(17, 6, 2, 'unfulfilled'),
(18, 22, 1, 'unfulfilled'),
(18, 8, 1, 'unfulfilled'),
(19, 5, 1, 'unfulfilled'),
(20, 6, 1, 'unfulfilled'),
(21, 5, 1, 'unfulfilled'),
(22, 8, 1, 'unfulfilled'),
(23, 27, 1, 'fulfilled'),
(24, 11, 1, 'unfulfilled'),
(25, 6, 1, 'unfulfilled'),
(26, 27, 3, 'fulfilled');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `amount`, `customer_id`, `order_id`, `currency`, `payment_date`) VALUES
(14, 350, 6, 20, 'GHC', '2021-06-28'),
(15, 15, 6, 21, 'GHC', '2021-06-28'),
(16, 200, 6, 22, 'GHC', '2021-06-28'),
(17, 800, 6, 23, 'GHC', '2021-06-28'),
(18, 500, 6, 24, 'GHC', '2021-06-28'),
(19, 350, 6, 25, 'GHC', '2021-06-28'),
(20, 2400, 6, 26, 'GHC', '2021-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_cat` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_price` double NOT NULL,
  `product_desc` varchar(2000) NOT NULL,
  `product_img` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_cat`, `seller_id`, `product_name`, `product_price`, `product_desc`, `product_img`, `stock`) VALUES
(5, 1, 1, 'Hellblade', 15, 'Hellblade: Senuas Sacrifice is a dark fantasy action-adventure game developed and published by the British video game development studio Ninja Theory.', 'images/products/220px-Hellblade_-_Senuas_Sacrifice.jpg', 2),
(6, 1, 1, 'Spiderman: Miles Morales', 350, 'Sequel to the amazing spiderman', 'images/products/71dtn2ZMs7L._SL1361_.jpg', 46),
(8, 1, 1, 'Nier: Automata', 200, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'images/products/nier.jpg', 1),
(9, 1, 1, 'Borderlands 3', 130, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'images/products/Borderlands_3_cover_art.jpg', 4),
(10, 2, 1, 'PS5', 1000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'images/products/skynews-playstation-ps5-sony_5011393.jpg', 5),
(11, 3, 1, 'XBOX One Controller', 500, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'images/products/41LO2OX6pRL.jpg', 2),
(12, 1, 1, 'AC: Valhalla', 400, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'images/products/ACValhalla (1).jpg', 4),
(13, 1, 2, 'Cyberpunk 2077', 400, 'Cyberpunk 2077 is an upcoming action role-playing video game developed and published by CD Projekt. It is scheduled to be released for Microsoft Windows, PlayStation 4, Stadia, and Xbox One on 10 December 2020, and for PlayStation 5 and Xbox Series X/S in 2021. The story takes place in Night City, an open world set in the Cyberpunk universe. Players assume the first-person perspective of a customisable mercenary known as V, who can acquire skills in hacking and machinery with options for melee and ranged combat.', 'images/products/cyberpunk.jpg', 5),
(15, 2, 2, 'PS4 Pro (used)', 750, 'PS4 Pro but slightly used. Comes with God of war', 'images/products/2PKmd7vwWHENGmJusbM49b-1200-80.jpg', 2),
(16, 2, 2, 'Nintendo Switch', 1000, 'Brand new Nintendo Switch. Price is negotiable ', 'images/products/140007-games-review-nintendo-switch-review-image1-lp6zy9awm0.jpg', 5),
(17, 2, 2, 'Xbox Series X', 3000, 'Xbox Series X is compatible with thousands of games across four generations of Xbox. And, with Smart Delivery games, you buy a game once and get the best version of that game for the console you are playing on.', 'images/products/microsoft-xbox-series-x-1tb.jpg', 10),
(18, 3, 2, 'Bose Headphones', 1500, 'Experience best-in-class noise-cancelling headphones from Bose. Choose from around-ear or in-ear, wired and wireless Bluetooth products.', 'images/products/1559119825_1475153.jpg', 5),
(19, 3, 2, 'DualSense Wireless Controller', 500, 'Discover a deeper gaming experience1 with the innovative new PS5â„¢ controller. The DualSense wireless controller for PS5 offers immersive haptic feedback2, dynamic adaptive triggers2 and a built-in microphone, all integrated into an iconic design.', 'images/products/sony_dualsense_controller.jpg', 15),
(20, 3, 2, ' Thermaltake X-Fit Black-Red Gaming Chair', 6000, 'The X Fit Series gaming chairs are constructed with high-density padding and a contoured backrest to bring unparalleled comfort and adjustability to your gaming.', 'images/products/xfit_black-white01.jpg', 5),
(21, 1, 2, 'God of War', 50, 'The new God of War', 'images/products/687474703a2f2f692e696d6775722e636f6d2f476c537665734d2e6a7067.jpg', 5),
(22, 1, 2, 'The Last of Us 1', 85, 'The Last of Us is a 2013 action-adventure game developed by Naughty Dog and published by Sony Computer Entertainment. Players control Joel, a smuggler tasked with escorting a teenage girl, Ellie, across a post-apocalyptic United States.', 'images/products/Video_Game_Cover_-_The_Last_of_Us.jpg', 2),
(23, 1, 2, 'The Last of Us 2', 300, 'The critically acclaimed sequel to The Last of Us 1', 'images/products/81OFTUvFX4L._AC_SL1500_.jpg', 15),
(24, 1, 2, 'Gears V', 2, 'Gears 5 is a third-person shooter video game developed by The Coalition and published by Xbox Game Studios for Xbox One, Microsoft Windows and Xbox Series X/S. It is the fifth installment of the Gears of War series and the sequel to Gears of War 4.', 'images/products/capsule_616x353.jpg', 14),
(25, 1, 1, 'Ghost of Tsushima', 300, 'Ghost of Tsushima is a 2020 action-adventure game developed by Sucker Punch Productions and published by Sony Interactive Entertainment. Featuring an open world, it follows Jin Sakai, a samurai on a quest to protect Tsushima Island during the first Mongol invasion of Japan.', 'images/products/ghost-of-tsushima-ps4-smartcdkeys-cheap-cd-key-cover.jpg', 5),
(26, 1, 1, 'FIFA 21', 350, 'FIFA 21 is a football simulation video game published by Electronic Arts as part of the FIFA series. It is the 28th installment in the FIFA series, and was released 9 October 2020 for Microsoft Windows, Nintendo Switch, PlayStation 4 and Xbox One.', 'images/products/fifa-21-cover-standard-edition.jpg', 20),
(27, 2, 6, 'Sony PlayStation 4', 800, 'Enjoy the Sony PlayStation 4 console with a controller', 'images/products/ps4.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `seller_payment`
--

CREATE TABLE `seller_payment` (
  `user_id` int(11) NOT NULL,
  `acc_name` varchar(100) NOT NULL,
  `acc_number` int(20) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `amt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller_payment`
--

INSERT INTO `seller_payment` (`user_id`, `acc_name`, `acc_number`, `bank_name`, `amt`) VALUES
(6, 'Kwasi Asiedu-Mensah', 2147483647, 'Ecobank', 2880);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `street_name` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `user_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `country`, `city`, `street_name`, `contact`, `user_role`) VALUES
(1, 'ManCave Gaming', 'mancave@gmail.com', '123456', 'Ghana', 'Accra', 'University Avenue', '0274091726', 1),
(2, 'Man Sales', 'sales@gmail.com', '7c8b10694698f0188542acdd38313d9d', 'Ghana', 'Accra', 'Adjiringanor', '0557335284', 2),
(3, 'Man Test', 'test@gmail.com', '7c8b10694698f0188542acdd38313d9d', 'Ghana', 'Accra', 'Adjirn', '0557335281', 3),
(5, 'Kwasi', 'kshugah1@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', 'Ghana', 'Accra', 'Akosombo road', '0544349601', 2),
(6, 'Victor', 'victor@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Ghana', 'Accra', 'Nii Laryea Street', '0202766120', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_cat` (`product_cat`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Indexes for table `seller_payment`
--
ALTER TABLE `seller_payment`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`product_cat`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `seller_payment`
--
ALTER TABLE `seller_payment`
  ADD CONSTRAINT `seller_payment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
