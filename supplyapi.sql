-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2023 at 08:57 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supplyapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `username`, `email`, `password`, `fullname`, `avatar`, `role`) VALUES
(1, 'Super', 'super@gmail.com', '12345', 'Pintu Debnath', '/src/assets/images/portrait/small/avatar-s-11.jpg', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cartdata`
--

CREATE TABLE `cartdata` (
  `id` int(11) NOT NULL,
  `productid` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `cartno` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cartdata`
--

INSERT INTO `cartdata` (`id`, `productid`, `name`, `price`, `size`, `qty`, `cartno`) VALUES
(1, '1', 'Key', '889', 'M', '1', '1'),
(2, '7', 'Min', '799', 'S', '1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `categoryimage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `categoryimage`) VALUES
(28, 'Men', '1694691808.png'),
(29, 'women', '1694692780.png');

-- --------------------------------------------------------

--
-- Table structure for table `featuredimages`
--

CREATE TABLE `featuredimages` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `lastid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `featuredimages`
--

INSERT INTO `featuredimages` (`id`, `image`, `lastid`) VALUES
(67, '1694692602_multiple.jpg', '3'),
(68, '1694692602_mulp.jpg', '3'),
(69, '1694692510_1.jpg', '4'),
(70, '1694692510_2.jpg', '4'),
(71, '1694692510_3.jpg', '4'),
(74, '1694692602_multiple.jpg', '5'),
(75, '1694692602_mulp.jpg', '5'),
(85, '1694692510_1.jpg', '8'),
(86, '1694692510_2.jpg', '8'),
(87, '1694692510_3.jpg', '8'),
(118, '1694699264_hoo.jpg', '1'),
(119, '1694699264_hooo.jpg', '1'),
(124, '1694700515_d.jpg', '7'),
(125, '1694700515_o.jpg', '7'),
(126, '1694701159_l.jpg', '6'),
(127, '1694701159_-473Wx593H-460535585-black-MODEL2.jpg', '6'),
(130, '1694701356_41GO+-i5v8L._AC_UY1100_.jpg', '2'),
(131, '1694701356_download (1).jpg', '2'),
(132, '1694700515_d.jpg', '9'),
(133, '1694700515_o.jpg', '9'),
(136, '1694700515_d.jpg', '10'),
(137, '1694700515_o.jpg', '10'),
(139, '1694757577_11.png', '12'),
(140, '1694757577_3.png', '12'),
(141, '1694713769_material.png', '11'),
(142, '1694757780_Ecommerce.png', '11'),
(143, '1694713769_material.png', '13'),
(144, '1694757780_Ecommerce.png', '13'),
(145, '1694713769_material.png', '14'),
(146, '1694757780_Ecommerce.png', '14'),
(147, '1694700515_d.jpg', '15'),
(148, '1694700515_o.jpg', '15');

-- --------------------------------------------------------

--
-- Table structure for table `mywishlist`
--

CREATE TABLE `mywishlist` (
  `id` int(11) NOT NULL,
  `userid` varchar(255) DEFAULT NULL,
  `productid` varchar(255) DEFAULT NULL,
  `isliked` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mywishlist`
--

INSERT INTO `mywishlist` (`id`, `userid`, `productid`, `isliked`) VALUES
(1, '1', '1', 'remove');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `paymentid` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `aptsuite` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `postalcode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `paymentid`, `firstname`, `lastname`, `address`, `aptsuite`, `city`, `state`, `postalcode`) VALUES
(1, 'pay_Mczb4bOOakUWRR', 'Ana', 'Roy', 'Siliguri', '451', 'Siliguri', 'WB', '734006'),
(2, 'pay_MczcrBHSrn5gUf', 'Pintu', 'Deb', 'Siliguri', '965', 'Siliguri', 'WB', '734006');

-- --------------------------------------------------------

--
-- Table structure for table `party_accounts`
--

CREATE TABLE `party_accounts` (
  `id` int(11) NOT NULL,
  `supplier_form_id` text DEFAULT NULL,
  `account_no` text DEFAULT NULL,
  `ifsc` text DEFAULT NULL,
  `customer_id` text DEFAULT NULL,
  `customer_res` text DEFAULT NULL,
  `fundaccount_id` text DEFAULT NULL,
  `fundaccount_res` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `party_accounts`
--

INSERT INTO `party_accounts` (`id`, `supplier_form_id`, `account_no`, `ifsc`, `customer_id`, `customer_res`, `fundaccount_id`, `fundaccount_res`) VALUES
(1, '1', '7894561233', 'SBI012478', 'cont_MgepN7tuOS1KO8', '{\"id\":\"cont_MgepN7tuOS1KO8\",\"entity\":\"contact\",\"name\":\"Dipak\",\"contact\":\"7894561233\",\"email\":\"\",\"type\":\"customer\",\"reference_id\":\"Acme Contact ID 12345\",\"batch_id\":null,\"active\":true,\"notes\":{\"notes_key_1\":\"Tea, Earl Grey, Hot\",\"notes_key_2\":\"Tea, Earl Grey\\u2026 decaf.\"},\"created_at\":1695664371}', NULL, NULL),
(2, '1', '78945813555', 'SBI012478', 'cont_MgepN7tuOS1KO8', '{\"id\":\"cont_MgepN7tuOS1KO8\",\"entity\":\"contact\",\"name\":\"Dipak\",\"contact\":\"7894561233\",\"email\":\"\",\"type\":\"customer\",\"reference_id\":\"Acme Contact ID 12345\",\"batch_id\":null,\"active\":true,\"notes\":{\"notes_key_1\":\"Tea, Earl Grey, Hot\",\"notes_key_2\":\"Tea, Earl Grey\\u2026 decaf.\"},\"created_at\":1695664371}', NULL, NULL),
(3, '2', '32323', 'dsdsds', NULL, NULL, NULL, NULL),
(4, '3', '32323', '23232', NULL, NULL, NULL, NULL),
(5, '4', '123459799779797', 'SBIN0005704', 'cont_Mgf0xceHPgcfos', '{\"id\":\"cont_Mgf0xceHPgcfos\",\"entity\":\"contact\",\"name\":\"Rosan\",\"contact\":\"7894561232\",\"email\":\"\",\"type\":\"customer\",\"reference_id\":\"Acme Contact ID 12345\",\"batch_id\":null,\"active\":true,\"notes\":{\"notes_key_1\":\"Tea, Earl Grey, Hot\",\"notes_key_2\":\"Tea, Earl Grey\\u2026 decaf.\"},\"created_at\":1695665029}', 'fa_MgfVC3AJpLZljl', '{\"id\":\"fa_MgfVC3AJpLZljl\",\"entity\":\"fund_account\",\"contact_id\":\"cont_Mgf0xceHPgcfos\",\"account_type\":\"bank_account\",\"bank_account\":{\"ifsc\":\"SBIN0005704\",\"bank_name\":\"State Bank of India\",\"name\":\"Rosan\",\"notes\":[],\"account_number\":\"123459799779797\"},\"batch_id\":null,\"active\":true,\"created_at\":1695666746}'),
(6, '4', '123459799779795', 'SBIN0005704', 'cont_Mgf0xceHPgcfos', '{\"id\":\"cont_Mgf0xceHPgcfos\",\"entity\":\"contact\",\"name\":\"Rosan\",\"contact\":\"7894561232\",\"email\":\"\",\"type\":\"customer\",\"reference_id\":\"Acme Contact ID 12345\",\"batch_id\":null,\"active\":true,\"notes\":{\"notes_key_1\":\"Tea, Earl Grey, Hot\",\"notes_key_2\":\"Tea, Earl Grey\\u2026 decaf.\"},\"created_at\":1695665029}', 'fa_MgfWLHQxremtDK', '{\"id\":\"fa_MgfWLHQxremtDK\",\"entity\":\"fund_account\",\"contact_id\":\"cont_Mgf0xceHPgcfos\",\"account_type\":\"bank_account\",\"bank_account\":{\"ifsc\":\"SBIN0005704\",\"bank_name\":\"State Bank of India\",\"name\":\"Rosan\",\"notes\":[],\"account_number\":\"123459799779795\"},\"batch_id\":null,\"active\":true,\"created_at\":1695666811}');

-- --------------------------------------------------------

--
-- Table structure for table `payment_init`
--

CREATE TABLE `payment_init` (
  `id` int(11) NOT NULL,
  `customer_id` text DEFAULT NULL,
  `fundaccount_id` text DEFAULT NULL,
  `date` text DEFAULT NULL,
  `supplyid` text DEFAULT NULL,
  `account_id` text DEFAULT NULL,
  `account_no` text DEFAULT NULL,
  `ifsc_number` text DEFAULT NULL,
  `timeis` text DEFAULT NULL,
  `amount` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `payoutid` text DEFAULT NULL,
  `partyname` text DEFAULT NULL,
  `partyaadharnumber` text DEFAULT NULL,
  `partyphonenumber` text DEFAULT NULL,
  `selectpayment_typeid` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payment_init`
--

INSERT INTO `payment_init` (`id`, `customer_id`, `fundaccount_id`, `date`, `supplyid`, `account_id`, `account_no`, `ifsc_number`, `timeis`, `amount`, `status`, `payoutid`, `partyname`, `partyaadharnumber`, `partyphonenumber`, `selectpayment_typeid`) VALUES
(1, 'cont_Mgf0xceHPgcfos', 'fa_MgfVC3AJpLZljl', '25-09-2023', '4', '5', '123459799779797', 'SBIN0005704', '1695667814', '10', '2', 'pout_Mgfo1uDXDAOnmf', 'Rosan', '7894598956', '7894561232', '1');

-- --------------------------------------------------------

--
-- Table structure for table `payout_log`
--

CREATE TABLE `payout_log` (
  `id` int(11) NOT NULL,
  `payment_id` text DEFAULT NULL,
  `date` text DEFAULT NULL,
  `account_table_id` text DEFAULT NULL,
  `fund_id` text DEFAULT NULL,
  `supply_table_id` text DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `time` text DEFAULT NULL,
  `payout_res` text DEFAULT NULL,
  `init_id` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payout_log`
--

INSERT INTO `payout_log` (`id`, `payment_id`, `date`, `account_table_id`, `fund_id`, `supply_table_id`, `amount`, `time`, `payout_res`, `init_id`) VALUES
(1, 'pout_Mgfo1uDXDAOnmf', '25-09-2023', '5', 'fa_MgfVC3AJpLZljl', '4', 1000, '1695667816', '{\"id\":\"pout_Mgfo1uDXDAOnmf\",\"entity\":\"payout\",\"fund_account_id\":\"fa_MgfVC3AJpLZljl\",\"amount\":1000,\"currency\":\"INR\",\"notes\":{\"notes_key_1\":\"Tea, Earl Grey, Hot\",\"notes_key_2\":\"Tea, Earl Grey\\u2026 decaf.\"},\"fees\":0,\"tax\":0,\"status\":\"processing\",\"purpose\":\"payout\",\"utr\":null,\"mode\":\"IMPS\",\"reference_id\":\"Acme Transaction ID 12345\",\"narration\":\"Acme Corp Fund Transfer\",\"batch_id\":null,\"failure_reason\":null,\"created_at\":1695667816,\"fee_type\":\"free_payout\",\"status_details\":{\"reason\":null,\"description\":null,\"source\":null},\"merchant_id\":\"E9m5M3ZlKfeeFK\",\"status_details_id\":null,\"error\":{\"source\":null,\"reason\":null,\"description\":null,\"code\":\"NA\",\"step\":\"NA\",\"metadata\":{}}}', '1');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `pname` varchar(255) DEFAULT NULL,
  `oprice` int(255) DEFAULT NULL,
  `sprice` int(255) DEFAULT NULL,
  `bdescription` varchar(255) DEFAULT NULL,
  `ddescription` varchar(255) DEFAULT NULL,
  `slength` varchar(255) DEFAULT NULL,
  `armhole` varchar(255) DEFAULT NULL,
  `chest` varchar(255) DEFAULT NULL,
  `metatitle` varchar(255) DEFAULT NULL,
  `metades` varchar(255) DEFAULT NULL,
  `metaimage` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `categoryid` varchar(255) DEFAULT NULL,
  `categoryname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `pname`, `oprice`, `sprice`, `bdescription`, `ddescription`, `slength`, `armhole`, `chest`, `metatitle`, `metades`, `metaimage`, `image`, `categoryid`, `categoryname`) VALUES
(1, 'Rey nylon backpack', 599, 299, 'perfect mint green', 'Fashion is a form of self-expression and autonomy at a particular period and place and in a specific context, of clothing, footwear, lifestyle, accessories, makeup, hairstyle, and body posture.', 'undefined', 'undefined', 'undefined', 'seam titie', 'seam titie', '1694699078.jpg', '1694699078.jpg', '28', 'Men'),
(2, 'Marvel Sky Bag', 1999, 1199, 'Classic Black', 'Fashion is a form of self-expression and autonomy at a particular period and place and in a specific context, of clothing, footwear, lifestyle, accessories, makeup, hairstyle, and body posture.', 'undefined', 'undefined', 'undefined', 'Marvel Sky Bag', 'Fashion is a form of self-expression and autonomy at a particular period and place and in a specific context, of clothing, footwear, lifestyle, accessories, makeup, hairstyle, and body posture.', '1694701484.jpg', '1694701484.jpg', '28', 'Men'),
(6, 'Puma Cap', 599, 299, 'New black style', 'Buy Caps & Hats for Men. Huge collection of men\'s caps & hats at low offer ... Men Baseball Cap with Brand Logo.', 'undefined', 'undefined', 'undefined', 'Puma Cap', 'Puma Cap', '1694701159.jpg', '1694701159.jpg', '28', 'Men'),
(7, 'Jordan shoes', 10850, 9050, 'Black & White', 'Trending and Stylist Jordan Sneakers For Men', 'undefined', 'undefined', 'undefined', 'Jordan shoes', 'Trending and Stylist Jordan Sneakers For Men', '1694700515.jpg', '1694700515.jpg', '28', 'Men'),
(11, 'Kurthi set', 1900, 799, 'some', 'some', 'undefined', 'undefined', 'undefined', 'new kurthi', 'kurthi', '1694757780.png', '1694713769.jpg', '28', 'Men');

-- --------------------------------------------------------

--
-- Table structure for table `selectedsizes`
--

CREATE TABLE `selectedsizes` (
  `id` int(11) NOT NULL,
  `size` varchar(255) DEFAULT NULL,
  `lastid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `selectedsizes`
--

INSERT INTO `selectedsizes` (`id`, `size`, `lastid`) VALUES
(1, 'XS', '4'),
(2, 'M', '4'),
(3, 'L', '4'),
(4, 'XXL', '4'),
(50, 'XS', '5'),
(51, 'S', '5'),
(52, 'M', '5'),
(53, 'L', '5'),
(58, 'XS', '8'),
(59, 'S', '8'),
(60, 'M', '8'),
(61, 'L', '8'),
(62, 'XS', '9'),
(63, 'S', '9'),
(64, 'M', '9'),
(65, 'L', '9'),
(76, 'XS', '13'),
(77, 'S', '13'),
(78, 'M', '13'),
(79, 'L', '13'),
(87, 'XS', '3'),
(88, 'S', '3'),
(89, 'M', '3'),
(90, 'L', '3'),
(91, 'XL', '3'),
(92, 'M', '4'),
(98, 'XS', '5'),
(99, 'S', '5'),
(100, 'M', '5'),
(101, 'L', '5'),
(102, 'XL', '5'),
(110, 'M', '8'),
(172, 'M', '1'),
(173, 'L', '1'),
(174, 'XL', '1'),
(175, 'S', '1'),
(176, 'XXL', '1'),
(191, 'XS', '7'),
(192, 'S', '7'),
(193, 'M', '7'),
(194, 'L', '7'),
(195, 'M', '7'),
(196, 'S', '7'),
(197, 'L', '7'),
(198, 'XL', '7'),
(199, 'XXL', '7'),
(200, 'M', '6'),
(206, 'XS', '2'),
(207, 'S', '2'),
(208, 'M', '2'),
(209, 'L', '2'),
(210, 'XL', '2'),
(211, 'XS', '9'),
(212, 'S', '9'),
(213, 'M', '9'),
(214, 'L', '9'),
(215, 'M', '9'),
(216, 'S', '9'),
(217, 'L', '9'),
(218, 'XL', '9'),
(219, 'XXL', '9'),
(229, 'XS', '10'),
(230, 'S', '10'),
(231, 'M', '10'),
(232, 'L', '10'),
(233, 'XS', '10'),
(234, 'S', '10'),
(235, 'M', '10'),
(236, 'L', '10'),
(237, 'M', '10'),
(238, 'S', '10'),
(239, 'L', '10'),
(240, 'XL', '10'),
(241, 'XXL', '10'),
(247, 'S', '12'),
(248, 'L', '12'),
(249, 'XXL', '12'),
(250, 'M', '12'),
(251, 'XS', '11'),
(252, 'S', '11'),
(253, 'M', '11'),
(254, 'L', '11'),
(255, 'XL', '11'),
(256, 'XS', '13'),
(257, 'S', '13'),
(258, 'M', '13'),
(259, 'L', '13'),
(260, 'XL', '13'),
(261, 'XS', '14'),
(262, 'S', '14'),
(263, 'M', '14'),
(264, 'L', '14'),
(265, 'XL', '14'),
(266, 'XS', '15'),
(267, 'S', '15'),
(268, 'M', '15'),
(269, 'L', '15'),
(270, 'M', '15'),
(271, 'S', '15'),
(272, 'L', '15'),
(273, 'XL', '15'),
(274, 'XXL', '15');

-- --------------------------------------------------------

--
-- Table structure for table `slip`
--

CREATE TABLE `slip` (
  `id` int(11) NOT NULL,
  `supply_id` text DEFAULT NULL,
  `trno` text DEFAULT NULL,
  `vehicleno` text DEFAULT NULL,
  `typeofmaterial` text DEFAULT NULL,
  `datein` text DEFAULT NULL,
  `timein` text DEFAULT NULL,
  `dateout` text DEFAULT NULL,
  `timeout` text DEFAULT NULL,
  `grossweight` text DEFAULT NULL,
  `tareweight` text DEFAULT NULL,
  `netweight` text DEFAULT NULL,
  `created_data` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `aadhar_no` text DEFAULT NULL,
  `phone_number` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `remark` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slip`
--

INSERT INTO `slip` (`id`, `supply_id`, `trno`, `vehicleno`, `typeofmaterial`, `datein`, `timein`, `dateout`, `timeout`, `grossweight`, `tareweight`, `netweight`, `created_data`, `name`, `aadhar_no`, `phone_number`, `address`, `remark`) VALUES
(2, '3', '1254', '5454', '45454', '05/09/2023', '06:51 AM', '18/09/2023', '12:51 AM', '454', '10', '454', '19-09-2023', 'test', '3434', '3434', 'sdsd', 'sds'),
(3, '2', '5345', '345', '5345', '28/09/2023', '07:22 PM', '27/09/2023', '07:22 PM', '34534', '34', '345', '19-09-2023', 'sds', '23434', '3434', 'dsds', 'wwew'),
(4, '3', '9823749', '87676', '9879', '20/09/2023', '12:25 AM', '20/09/2023', '12:25 AM', '87676', '77', '7788', '20-09-2023', 'undefined', '656678990122', '9177378205', 'Hyderabad, Telagana,50019 India', 'undefined');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'Success'),
(2, 'Pending'),
(3, 'Failed');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_form`
--

CREATE TABLE `supplier_form` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `aadhar_no` text DEFAULT NULL,
  `date` text DEFAULT NULL,
  `phone_number` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `customer_id` text DEFAULT NULL,
  `customer_res` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier_form`
--

INSERT INTO `supplier_form` (`id`, `name`, `aadhar_no`, `date`, `phone_number`, `address`, `remark`, `photo`, `customer_id`, `customer_res`) VALUES
(1, 'Dipak', '7894561230', '25-09-2023', '7894561233', 'test', 'test', NULL, 'cont_MgepN7tuOS1KO8', '{\"id\":\"cont_MgepN7tuOS1KO8\",\"entity\":\"contact\",\"name\":\"Dipak\",\"contact\":\"7894561233\",\"email\":\"\",\"type\":\"customer\",\"reference_id\":\"Acme Contact ID 12345\",\"batch_id\":null,\"active\":true,\"notes\":{\"notes_key_1\":\"Tea, Earl Grey, Hot\",\"notes_key_2\":\"Tea, Earl Grey\\u2026 decaf.\"},\"created_at\":1695664371}'),
(2, 'sds', '434', '25-09-2023', '34343', '343', 'wwew', NULL, NULL, NULL),
(3, 'wewe', '23232', '25-09-2023', '2323', 'weew', 'wewe', NULL, NULL, NULL),
(4, 'Rosan', '7894598956', '25-09-2023', '7894561232', 'test', 'test', NULL, 'cont_Mgf0xceHPgcfos', '{\"id\":\"cont_Mgf0xceHPgcfos\",\"entity\":\"contact\",\"name\":\"Rosan\",\"contact\":\"7894561232\",\"email\":\"\",\"type\":\"customer\",\"reference_id\":\"Acme Contact ID 12345\",\"batch_id\":null,\"active\":true,\"notes\":{\"notes_key_1\":\"Tea, Earl Grey, Hot\",\"notes_key_2\":\"Tea, Earl Grey\\u2026 decaf.\"},\"created_at\":1695665029}');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `number`, `email`, `password`) VALUES
(1, 'Ana', '6382320931', 'ana@gmail.com', '12345'),
(2, 'dhananjoy barman', '6294657174', 'dhananjoyb25@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cartdata`
--
ALTER TABLE `cartdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `featuredimages`
--
ALTER TABLE `featuredimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mywishlist`
--
ALTER TABLE `mywishlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `party_accounts`
--
ALTER TABLE `party_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_init`
--
ALTER TABLE `payment_init`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payout_log`
--
ALTER TABLE `payout_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selectedsizes`
--
ALTER TABLE `selectedsizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slip`
--
ALTER TABLE `slip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_form`
--
ALTER TABLE `supplier_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cartdata`
--
ALTER TABLE `cartdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `featuredimages`
--
ALTER TABLE `featuredimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `mywishlist`
--
ALTER TABLE `mywishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `party_accounts`
--
ALTER TABLE `party_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment_init`
--
ALTER TABLE `payment_init`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payout_log`
--
ALTER TABLE `payout_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `selectedsizes`
--
ALTER TABLE `selectedsizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=275;

--
-- AUTO_INCREMENT for table `slip`
--
ALTER TABLE `slip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier_form`
--
ALTER TABLE `supplier_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
