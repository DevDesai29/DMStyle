-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 27, 2020 at 09:16 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dm_style`
--
CREATE DATABASE IF NOT EXISTS `dm_style` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dm_style`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `admin_name`, `email_id`, `pwd`) VALUES
(1, 'admin', 'admin@dmstyle.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart_detail`
--

CREATE TABLE IF NOT EXISTS `cart_detail` (
  `cart_detail_id` int(10) NOT NULL,
  `cart_id` int(10) NOT NULL,
  `prod_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  PRIMARY KEY (`cart_detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_detail`
--

INSERT INTO `cart_detail` (`cart_detail_id`, `cart_id`, `prod_id`, `qty`, `price`) VALUES
(1, 1, 3, 1, 1200),
(2, 1, 9, 2, 1300),
(3, 2, 6, 1, 900),
(4, 2, 2, 1, 1400),
(5, 2, 5, 1, 1000),
(6, 3, 3, 1, 1200),
(7, 3, 9, 1, 1300);

-- --------------------------------------------------------

--
-- Table structure for table `cart_master`
--

CREATE TABLE IF NOT EXISTS `cart_master` (
  `cart_id` int(10) NOT NULL,
  `cart_date` date NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_master`
--

INSERT INTO `cart_master` (`cart_id`, `cart_date`) VALUES
(1, '2020-10-15'),
(2, '2020-10-24'),
(3, '2020-10-24');

-- --------------------------------------------------------

--
-- Table structure for table `cat_master`
--

CREATE TABLE IF NOT EXISTS `cat_master` (
  `cat_id` int(10) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat_master`
--

INSERT INTO `cat_master` (`cat_id`, `cat_name`) VALUES
(1, 'Men'),
(2, 'Women'),
(3, 'Kids');

-- --------------------------------------------------------

--
-- Table structure for table `customer_regis`
--

CREATE TABLE IF NOT EXISTS `customer_regis` (
  `cust_id` int(10) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_regis`
--

INSERT INTO `customer_regis` (`cust_id`, `cust_name`, `address`, `city`, `mobile_no`, `gender`, `email_id`, `pwd`) VALUES
(1, 'Dev', 'valsad pardi', 'valsad', '9874152630', 'MALE', 'dev@yahoo.com', '111111');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_master`
--

CREATE TABLE IF NOT EXISTS `invoice_master` (
  `invoice_id` int(10) NOT NULL,
  `invoice_date` date NOT NULL,
  `cust_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `cart_id` int(10) NOT NULL,
  `total_amt` int(10) NOT NULL,
  PRIMARY KEY (`invoice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_master`
--

INSERT INTO `invoice_master` (`invoice_id`, `invoice_date`, `cust_id`, `order_id`, `cart_id`, `total_amt`) VALUES
(1, '2020-11-27', 1, 1, 2, 4900);

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

CREATE TABLE IF NOT EXISTS `order_master` (
  `order_id` int(10) NOT NULL,
  `order_date` date NOT NULL,
  `cust_id` int(10) NOT NULL,
  `cart_id` int(10) NOT NULL,
  `delievery_add` varchar(200) NOT NULL,
  `delievery_city` varchar(50) NOT NULL,
  `delievery_mobile_no` varchar(10) NOT NULL,
  `total_amt` int(10) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_master`
--

INSERT INTO `order_master` (`order_id`, `order_date`, `cust_id`, `cart_id`, `delievery_add`, `delievery_city`, `delievery_mobile_no`, `total_amt`) VALUES
(1, '2020-10-24', 1, 2, 'valsad pardi', 'valsad', '7896543210', 4900),
(2, '2020-10-24', 1, 3, 'desai wad\r\nbillimora', 'billimora', '7412589630', 2500);

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

CREATE TABLE IF NOT EXISTS `product_detail` (
  `prod_id` int(10) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `sub_cat_id` int(10) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` int(10) NOT NULL,
  `prod_image` varchar(50) NOT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`prod_id`, `prod_name`, `cat_id`, `sub_cat_id`, `description`, `price`, `prod_image`) VALUES
(1, 'Levis casual shirt', 1, 2, 'Black solid casual shirt has a button down collar long sleeves button placket straight hem and 1 patch pocket', 2100, 'productimg/p1_1048.png'),
(2, 'WROGN casual shirt', 1, 2, 'White and grey striped casual shirt has a spread collar long sleeves curved hem', 1400, 'productimg/p2_1226.png'),
(3, 'Roadster casual shirt', 1, 2, 'Black and grey checked casual shirt has a spread collar a full button placket long sleeves with roll up tabs a patch pocket a curved hem', 1200, 'productimg/p3_7554.png'),
(4, 'HIGHLANDER Men Slim Fit', 1, 2, 'Black and charcoal grey printed casual shirt has a spread collar button placket 1 pocket long sleeves curved hem', 800, 'productimg/p4_7863.png'),
(5, 'Powerlook Denim Shirt', 1, 2, 'Pink color Long sleeves Plain Shirt Soft Denim fabric Shoulder Plackets Spread collar Chest pockets Button placket Relaxed fit\r\n', 1000, 'productimg/p5_3588.png'),
(6, 'HERENOW Slim Fit Chinos', 1, 2, 'Green solid mid rise chinos has a button closure four pockets', 900, 'productimg/p6_2665.png'),
(7, 'INVICTUS Regular Fit ', 1, 2, 'White solid mid rise chinos has a button closure closure 5 pockets', 1500, 'productimg/p7_593.png'),
(8, 'HIGHLANDER Fit Solid Chinos', 1, 2, 'Khaki solid mid rise chinos has a button closure closure 5 pockets', 1000, 'productimg/p8_5355.png'),
(9, 'HIGHLANDER Chinos', 1, 2, 'Blue solid mid rise chinos has a button closure closure 5 pockets', 1300, 'productimg/p9_9428.png'),
(10, 'INVICTUS Regular Fit ', 1, 2, 'Beige solid mid rise regular trousers button closure and 5 pockets', 1100, 'productimg/p10_8040.png'),
(11, 'Powerlook Full Sleeves ', 1, 1, 'Shirts are Best to wear on weekdays with Plain Trousers and Striped Pants', 1400, 'productimg/p11_3246.png'),
(12, 'Powerlook Full Sleeves', 1, 1, 'Black Formal Shirts for Men a Printed Shirt with Spread Collar and Full Sleeves having Curved hem made of Pure soft Cotton that is smooth sweatless and durable to wear in all seasons Semi Formal Shirt', 1200, 'productimg/p12_2819.png'),
(13, 'Powerlook Full Sleeves', 1, 1, 'Semi Formal Shirts for Men a Pink Tiny Floral Printed Shirts for Men with Spread Collar and Full Sleeves made of Pure Cotton Premium Fabric in a Regular Fit Mens Formal Printed Shirts are soft and kee', 1600, 'productimg/p13_4289.png'),
(14, 'Louis Philippe  Striped Formal', 1, 1, 'White striped formal shirt has a spread collar long sleeves button placket straight hem and 1 patch pocket', 1300, 'productimg/p14_2169.png'),
(15, 'Peter England Fit Self ', 1, 1, 'Charcoal grey self design formal shirt has a spread collar button placket 1 pocket long sleeves curved hem', 1000, 'productimg/p15_3773.png'),
(16, 'Pantaloons Trouser', 1, 1, 'Navy Blue striped mid rise trousers zip closure and 4 pockets', 1400, 'productimg/p16_3876.png'),
(17, 'INVICTUS Trouser', 1, 1, 'Navy blue checked mid rise formal trousers has a button closure four pockets', 900, 'productimg/p17_3091.png'),
(18, 'INVICTUS Trouser', 1, 1, 'White and black self design mid rise formal trousers has a button closure 5 pockets', 800, 'productimg/p18_3526.png'),
(19, 'INVICTUS Trouser', 1, 1, 'Charcoal grey checked mid rise formal trousers has a button closure four pockets', 1100, 'productimg/p19_5364.png'),
(20, 'SOJANYA Men Blue Smart Fit Solid Formal Trousers', 1, 1, 'Blue solid mid rise formal trousers button closure and five pockets', 1000, 'productimg/p20_244.png'),
(21, 'Indo Era Midnight Blue Foil Print Persian Mandala ', 2, 3, 'Kurta, Palazzos and Dupatta\r\n\r\nA festive piece with its own unique identity the Persian Mandala motifs and the dual toned checks are the perfect coming together of modern meets ethnic', 2300, 'productimg/p21_3267.png'),
(22, 'Mitera Mustard Silk Blend Woven Design Banarasi Sa', 2, 3, 'Mustard banarasi woven design saree and has a zari border\r\nBlouse Piece\r\nThe model is wearing the stitched version of the blouse', 2400, 'productimg/p22_2211.png'),
(23, 'Libas Blue Block Print Straight Viscose Kurta With', 2, 3, 'If you are looking for an undeniably feminine design then look no further This subtle classy viscose rayon straight kurta with keyhole neck block print with goldtone accents is simple and elegant this', 2800, 'productimg/p23_9348.png'),
(24, 'Chhabra Rust Orange Bohemian Printed Made to Measu', 2, 3, 'Rust orange and offwhite bohemian printed made to measure anarkali cocktail gown\r\nRust orange and offwhite bohemian printed made to measure woven cocktail gown with mirror work detail has a round neck', 3500, 'productimg/p24_953.png'),
(25, 'AKS Women OffWhite and Golden Printed Maxi Dress', 2, 3, 'Offwhite and golden printed woven maxi dress has a shirt collar short sleeves short button placket flared hem', 3100, 'productimg/p25_5555.png'),
(26, 'Nayo Women Grey and Black Colourblocked Maxi Dress', 2, 3, 'Grey and black colourblocked woven maxi dress has a round neck three-quarter sleeves flared hem', 2900, 'productimg/p26_2656.png'),
(27, 'Anouk Navy Blue Ready to Wear Lehenga and Blouse w', 2, 3, 'Navy Blue lehenga choli\r\nNavy Blue blouse short sleeves\r\nNavy Blue ready to wear lehenga, flared hem\r\n', 4200, 'productimg/p27_2555.png'),
(28, 'Satrani Teal Blue and Pink Solid Unstitched Leheng', 2, 3, 'Teal blue and pink lehenga choli\r\nPink blouse sleeveless\r\nTeal blue unstitched lehenga flared hem\r\nPink printed dupatta\r\n', 3700, 'productimg/p28_151.png'),
(29, 'Readiprint Fashions Navy Blue and Golden Semi Stit', 2, 3, 'Navy blue and golden zari embroidered lehenga choli with dupatta\r\nNavy blue and golden zari embroidered unstitched blouse with sequinned detail has a round neck short sleeves \r\nNavy blue and golden za', 6000, 'productimg/p29_7848.png'),
(30, 'Juniper Black and Gold Embroidered Dupatta', 2, 3, 'Black and Gold embroidered dupatta thread work and has embroidered border', 3300, 'productimg/p30_655.png'),
(31, 'SASSAFRAS Women Off White and Green Printed Maxi D', 2, 4, 'Off White and green printed woven maxi dress has an off shoulder neck short sleeves concealed zip closure an attached lining flared hem front slit\r\nComes with a belt', 2700, 'productimg/p31_7200.png'),
(32, 'SASSAFRAS Women Maroon Solid Accordion Pleats A Li', 2, 4, 'Maroon solid woven A line dress with pleats has an off shoulder neck  short sleeves and high low hem\r\nComes with a belt\r\n', 3100, 'productimg/p32_8031.png'),
(33, 'Mayra Women Multicoloured Striped Basic Jumpsuit', 2, 4, 'Burgundy and beige solid woven maxi dress with attached jacket has a mandarin collar three quarter sleeves an attached lining flared hem', 2100, 'productimg/p33_5406.png'),
(34, 'Athena Women Burgundy Solid Maxi Dress', 2, 4, 'Burgundy and beige solid woven maxi dress with attached jacket has a mandarin collar three quarter sleeves an attached lining flared hem', 2900, 'productimg/p34_241.png'),
(35, 'SASSAFRAS Women Maroon Solid Basic Jumpsuit', 2, 4, 'Maroon solid basic jumpsuit with waist tie ups and gathered detail has a round neck three quarter sleeves button closures two pockets', 2800, 'productimg/p35_2564.png'),
(36, 'SASSAFRAS Women Green Semi Sheer Printed Top', 2, 4, 'Green and purple semi sheer printed woven top woven top with ruched detail on the front has a V neck short sleeves tie up detail', 3100, 'productimg/p36_5435.png'),
(37, 'RANGMAYEE Women Black and Pink Printed Cotton Stra', 2, 4, 'A pair of Black and red printed woven straight fit palazzos has a partially elasticated waistband with slip on closure two pockets', 1800, 'productimg/p37_2591.png'),
(38, 'anayna Women Navy Blue and Off White Printed Strai', 2, 4, 'A pair of Navy Blue and Off white striped woven straight fit palazzos has a partially elasticated waistband with slip on closure', 1700, 'productimg/p38_1432.png'),
(39, 'ONLY Women Multicoloured Dyed Round Neck Tshirt Wi', 2, 4, 'Multicoloured dyed Tshirt has a round neck waist tie up and short sleeves', 1699, 'productimg/p39_6192.png'),
(40, 'HRX by Hrithik Roshan Women Teal Blue Solid Athlei', 2, 4, 'Athleisure Sweatshirt can be paired with tracks khakis or jeans\r\n', 1400, 'productimg/p40_5057.png'),
(41, 'VASTRAMAY Boys Blue and Beige Self Design Kurta wi', 3, 5, 'Blue and beige self design kurta with churidar\r\nBlue and beige straight knee length kurta, has a mandarin collar, long sleeves, straight hem, side slits\r\nBeige Self Design churidar, has elasticated wa', 1100, 'productimg/p41_5737.png'),
(42, 'SG YUVRAJ Boys Rust Orange and Beige Self Design K', 3, 5, 'Rust orange and beige self design kurta with pyjamas\r\nRust orange and beige straight above knee kurta has a mandarin collar long sleeves straight hem multiple slits\r\nRust orange and beige Solid pyjama', 2030, 'productimg/p42_9978.png');

-- --------------------------------------------------------

--
-- Table structure for table `sub_cat_master`
--

CREATE TABLE IF NOT EXISTS `sub_cat_master` (
  `sub_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `sub_cat` varchar(50) NOT NULL,
  PRIMARY KEY (`sub_cat_id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_cat_master`
--

INSERT INTO `sub_cat_master` (`sub_cat_id`, `cat_id`, `sub_cat`) VALUES
(1, 1, 'Formal'),
(2, 1, 'Casual'),
(3, 2, 'Traditional'),
(4, 2, 'Western'),
(5, 3, 'boys'),
(6, 3, 'girls');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sub_cat_master`
--
ALTER TABLE `sub_cat_master`
  ADD CONSTRAINT `fk_cat_id` FOREIGN KEY (`cat_id`) REFERENCES `cat_master` (`cat_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
