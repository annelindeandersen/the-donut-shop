-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 08, 2019 at 07:40 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `webshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `user_fk` bigint(20) UNSIGNED NOT NULL,
  `product_fk` bigint(20) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `quantity` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_fk`, `product_fk`, `date`, `quantity`) VALUES
(38, 9, 6, '2019-06-01 15:32:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category`) VALUES
(1, 'Single Donuts'),
(2, 'Beverages'),
(3, 'Many Donuts');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_fk` bigint(20) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pickup_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_fk`, `date`, `pickup_time`) VALUES
(1, 8, '2019-06-17 20:36:20', '12:00:00'),
(2, 8, '2019-06-17 21:30:14', '13:00:00'),
(6, 8, '2019-06-17 22:17:44', '14:00:00'),
(8, 10, '2019-06-19 10:15:53', '13:45:00'),
(10, 10, '2019-06-19 10:58:39', '14:15:00'),
(11, 8, '2019-06-19 11:23:40', '13:15:00'),
(12, 8, '2019-07-15 12:49:40', '12:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_fk` bigint(20) UNSIGNED NOT NULL,
  `cart_fk` bigint(20) UNSIGNED NOT NULL,
  `user_fk` bigint(20) UNSIGNED NOT NULL,
  `product_fk` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_fk`, `cart_fk`, `user_fk`, `product_fk`) VALUES
(1, 1, 8, 2),
(1, 1, 8, 5),
(1, 1, 8, 3),
(1, 1, 8, 9),
(2, 2, 8, 6),
(6, 51, 8, 9),
(8, 39, 10, 5),
(8, 48, 10, 4),
(8, 49, 10, 9),
(10, 50, 10, 3),
(10, 51, 10, 8),
(11, 41, 8, 3),
(11, 46, 8, 5),
(11, 47, 8, 6),
(12, 54, 8, 4),
(12, 55, 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `price_id` bigint(20) UNSIGNED NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`price_id`, `price`) VALUES
(1, 30),
(2, 40),
(3, 225),
(4, 150);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_fk` bigint(20) NOT NULL,
  `price_fk` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product`, `category_fk`, `price_fk`, `description`, `img`, `stock`) VALUES
(1, 'Blueberry Donut', 1, 1, 'This Donut has it all. Blueberry frosting, dried raspberry crumble and white chocolate. Delightful!', '1.jpg', 10),
(2, 'Licorice Donut', 1, 1, 'This Donut calls all licorice lovers. Raspberry frosting with licorice flavoured bits. Delightful!', '2.jpg', 10),
(3, 'Dreamy Daim', 1, 1, 'This Donut is a Daim lover\'s dream come true. Crunchy Daim crumble on a creamy glaze. How yummy?!', '3.jpg', 10),
(4, 'Dark Chocolate', 1, 1, 'This Donut is for chocolate lovers with a desire for dark goodness. Filled with a creamy, rich chocolate you can only dream of. Insane!', '4.jpg', 10),
(5, 'Raspberry Donut', 1, 1, 'This Donut screams raspberry. Glazed with raspberry frosting and dried raspberry crumbles. So fresh!', '5.jpg', 10),
(6, 'Caramel Crunch', 1, 1, 'This Donut is a crunchy caramel delight. Stuffed with rich caramel cream and topped off with more. Can you handle it?', '6.jpg', 10),
(7, 'Coffee 2 Go', 2, 2, 'In need for coffee? Do not worry. We brew all day long. ', 'coffee.jpg', 10),
(8, 'Donuts Times 9', 3, 3, 'One is never enough, but we won\'t tell. Get 9 different, amazing flavours. Sharing is caring!', 'donutsx9.jpg', 10),
(9, 'Donuts Times 6', 3, 4, 'The perfect treat. One is never enough, but we won\'t tell. Get these 6 different delights and indulge!!', 'donutsx6.jpg', 10);

-- --------------------------------------------------------

--
-- Stand-in structure for view `productsinuserscart`
-- (See below for the actual view)
--
CREATE TABLE `productsinuserscart` (
`product_id` bigint(20) unsigned
,`img` varchar(100)
,`product` varchar(50)
,`quantity` smallint(6)
,`price` double
,`user_fk` bigint(20) unsigned
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varbinary(100) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `email`, `phone`, `password`, `status`) VALUES
(8, 'A', 'anne_linde@yahoo.dk', '29647715', 0x2432792431302461647250372f61637866674f654c41352e56524774753461395548506f41416c4f6b334f7276616f786e5a79504f465147526f5a36, 0),
(9, 'admin', 'admin@admin.com', '12345678', 0x24327924313024344c387852536d2f786e354374542e746d685448647567786f305072596f4e6b754778417576733879766c4f4239385567676e7647, 0),
(10, 'Betty Bee', 'betty@bee.com', '12345555', 0x243279243130244d6e644e35365859754c75354333754b6348367235753569597153307a436867646675576d5a436f4f36514b6b72322e5350325447, 0),
(11, 'Cal Carlson', 'cal@carlson.com', '22222222', 0x243279243130245377466a6139324f33765546454143496237646b2e6548363168596e50746e765838386b564d345565633377503045556e4d504d43, 0),
(12, 'Dennis Day', 'dennis@day.com', '33333333', 0x24327924313024546b433150796131674f2e496578305942342e6345656e7a5a734f763141355561705a5a6c546961596c4937636a6e67725059504b, 0);

-- --------------------------------------------------------

--
-- Structure for view `productsinuserscart`
--
DROP TABLE IF EXISTS `productsinuserscart`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `productsinuserscart`  AS  select `products`.`product_id` AS `product_id`,`products`.`img` AS `img`,`products`.`product` AS `product`,`cart`.`quantity` AS `quantity`,`prices`.`price` AS `price`,`cart`.`user_fk` AS `user_fk` from (((`cart` join `users` on((`cart`.`user_fk` = `users`.`user_id`))) join `products` on((`cart`.`product_fk` = `products`.`product_id`))) join `prices` on((`products`.`price_fk` = `prices`.`price_id`))) order by `products`.`img` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD UNIQUE KEY `cart_id` (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `id` (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD KEY `order_fk` (`order_fk`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD UNIQUE KEY `id` (`price_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD UNIQUE KEY `id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `id` (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `price_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
