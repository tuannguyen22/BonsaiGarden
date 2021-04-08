-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2021 at 02:25 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bonsaigarden`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--
create database if not EXISTS bonsaigarden ;
use bonsaigarden;
CREATE TABLE `address` (
  `address_id` smallint(5) UNSIGNED NOT NULL,
  `address` varchar(50) NOT NULL,
  `district` varchar(20) NOT NULL,
  `city_id` smallint(5) UNSIGNED NOT NULL,
  `postal_code` varchar(10) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) NOT NULL,
  `userId` bigint(20) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 0,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userId`, `status`, `content`) VALUES
(1, 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `id` bigint(20) NOT NULL,
  `productId` bigint(20) NOT NULL,
  `cartId` bigint(20) NOT NULL,
  `price` float NOT NULL DEFAULT 0,
  `discount` float NOT NULL DEFAULT 0,
  `quantity` smallint(6) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_item`
--

INSERT INTO `cart_item` (`id`, `productId`, `cartId`, `price`, `discount`, `quantity`, `active`, `content`) VALUES
(2, 1, 1, 0, 0, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) NOT NULL,
  `title` varchar(75) NOT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--


-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `content`) VALUES
(1, 'Indoor plants', 'Dùng để trang trí trong nhà'),
(2, 'Garden plants', 'Dùng để trang trí ngoài vườn'),
(3, 'Bonsai air', 'Dùng để trang trí trong nhà'),
(4, 'Post jar', 'Lọ dùng để đựng hoa');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` smallint(5) UNSIGNED NOT NULL,
  `city` varchar(50) NOT NULL,
  `country_id` smallint(5) UNSIGNED NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` smallint(5) UNSIGNED NOT NULL,
  `country` varchar(50) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` bigint(20) NOT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image`
--

insert into image (image) values('https://thietkesanvuonviet.com/wp-content/uploads/2019/12/cay-xanh-trong-nha_216.jpg');
insert into image (image) values('https://thietkesanvuonviet.com/wp-content/uploads/2019/12/cay-xanh-trong-nha_216.jpg');
insert into image (image) values('https://thietkesanvuonviet.com/wp-content/uploads/2019/12/cay-xanh-trong-nha_216.jpg');

insert into image (image) values('https://cayxanhhadong.com/wp-content/uploads/2018/01/cay-cau-vang-cay-xanh-ha-dong-600x600.jpg');
insert into image (image) values('https://cayxanhhadong.com/wp-content/uploads/2018/01/cay-cau-vang-cay-xanh-ha-dong-600x600.jpg');
insert into image (image) values('https://cayxanhhadong.com/wp-content/uploads/2018/01/cay-cau-vang-cay-xanh-ha-dong-600x600.jpg');

insert into image (image) values('https://9xgarden.com/wp-content/uploads/2020/04/cay-khong-khi-gia-re-tphcm-9xgarden-4.jpg');
insert into image (image) values('https://9xgarden.com/wp-content/uploads/2020/04/cay-khong-khi-gia-re-tphcm-9xgarden-4.jpg');
insert into image (image) values('https://9xgarden.com/wp-content/uploads/2020/04/cay-khong-khi-gia-re-tphcm-9xgarden-4.jpg');


insert into image (image) values('https://quangcanhxanh.vn/wp-content/uploads/2020/07/chau-dat-nung-mau-basic-6.jpg');
insert into image (image) values('https://kenh14cdn.com/thumb_w/600/LJ9BRCA2SwO2i2yoqIMzIMq9QI2QMI/Image/2015/04/c1-3c368.jpg');
insert into image (image) values('https://lh3.googleusercontent.com/proxy/RcjnMP8fp0NcmaeQeLoIHTFA9sE45kMuA3U07SG1sMOFpnZMAEJPVyVTAxYHvOamlS5XgEodJf_-rs9DdMG7sveZubihqw5d_5Djbe8w6oeMS2BGKm5z1n95lGka_VoL8lmgNvM1aaqD5xEqW2j73Rzv');

--
-- Table structure for table `notify`
--

CREATE TABLE `notify` (
  `id` bigint(20) NOT NULL,
  `userName` varchar(30) DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `productId` bigint(20) NOT NULL,
  `cartItemId` bigint(20) NOT NULL,
  `status1` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `productId`, `cartItemId`, `status1`) VALUES
(2, 1, 2, 0),
(3, 1, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `userName` varchar(30) DEFAULT NULL,
  `subtitle` varchar(75) NOT NULL,
  `summary` tinytext DEFAULT NULL,
  `type` varchar(6) NOT NULL DEFAULT '0',
  `price` float NOT NULL DEFAULT 0,
  `discount` float NOT NULL DEFAULT 0,
  `quantity` smallint(6) NOT NULL DEFAULT 0,
  `content` text DEFAULT NULL,
  `categoryId` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--
insert into product(name,subtitle,summary,type,price,discount,quantity,content,categoryId)
 values('Cây lan ý','Ban gi day','San pham nay dung de','L',20000,20.5,5,'Chuc nang san pham nay dung de','1'),
('Cây dừa cảnh','Ban gi day','San pham nay dung de','L',25000,20.5,5,'Chuc nang san pham nay dung de','2'),
('Chi dứa','Ban gi day','San pham nay dung de','L',22000,20.5,5,'Chuc nang san pham nay dung de','3'),
('Chậu đất nung','Ban gi day','San pham nay dung de','L',150000,20.5,5,'Chuc nang san pham nay dung de','4');

insert into product(name,subtitle,summary,type,price,discount,quantity,content,categoryId) values('Cây lan ý','Ban gi day','San pham nay dung de','L',20000,20.5,5,'Chuc nang san pham nay dung de','4');
insert into product(name,subtitle,summary,type,price,discount,quantity,content,categoryId) values('Cây lan ý','Ban gi day','San pham nay dung de','L',20000,20.5,5,'Chuc nang san pham nay dung de','4');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `id_product` bigint(20) NOT NULL,
  `id_image` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `id_product`, `id_image`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 4),
(5, 2, 5),
(6, 2, 6),
(7, 3, 7),
(8, 3, 8),
(9, 3, 9),
(10, 4, 10),
(11, 4, 11),
(12, 4, 12),
(13, 5, 12);

-- --------------------------------------------------------

--
-- Stand-in structure for view `product_view`
-- (See below for the actual view)
--
CREATE TABLE `product_view` (
`id` bigint(20)
,`name` varchar(255)
,`subtitle` varchar(75)
,`price` float
,`discount` float
,`quantity` smallint(6)
,`type` varchar(6)
,`content` text
,`image` text
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE bonsaigarden.`user` (
  `id` bigint(20) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `job_title` varchar(30) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `age` int(11) NOT NULL,
  `userName` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO bonsaigarden.`user` (`id`, `name`, `phone`, `job_title`, `email`, `age`, `userName`, `password`, `address`, `status`) VALUES
(1, 'long', '099999999', 'IT', 'longnguyen22', 10, 'admin', '123456', 'Quang Binh', 1),
(2, 'long2', '099999999', 'IT', 'longnguyen22', 10, 'admin2', '123456', 'Quang Binh', 1);

-- --------------------------------------------------------

--
-- Structure for view `product_view`
--
DROP TABLE IF EXISTS `product_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_view`  AS SELECT `product`.`id` AS `id`, `product`.`name` AS `name`, `product`.`subtitle` AS `subtitle`, `product`.`price` AS `price`, `product`.`discount` AS `discount`, `product`.`quantity` AS `quantity`, `product`.`type` AS `type`, `product`.`content` AS `content`, `image`.`image` AS `image` FROM ((`product` join `product_image` on(`product_image`.`id_product` = `product`.`id`)) join `image` on(`image`.`id` = `product_image`.`id_image`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productId` (`productId`),
  ADD KEY `cartId` (`cartId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notify`
--
ALTER TABLE `notify`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productId` (`productId`),
  ADD KEY `cartItemId` (`cartItemId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryId` (`categoryId`);
ALTER TABLE `product` ADD FULLTEXT KEY `name` (`name`,`content`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_product` (`id_product`,`id_image`),
  ADD KEY `id_image` (`id_image`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notify`
--
ALTER TABLE `notify`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`userId`) REFERENCES bonsaigarden.`user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD CONSTRAINT `cart_item_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cart_item_ibfk_2` FOREIGN KEY (`cartId`) REFERENCES `cart` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`) ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`cartItemId`) REFERENCES `cart_item` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `product_image_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_image_ibfk_2` FOREIGN KEY (`id_image`) REFERENCES `image` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
