-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2024 at 11:45 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `mock_data`
--

CREATE TABLE IF NOT EXISTS `master_data` (
  `id_barang` int(10) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah_barang` int(10) NOT NULL,
  `satuan_barang` varchar(20) NOT NULL,
  `harga_beli` double NOT NULL,
  `status_barang` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mock_data`
--

INSERT INTO `master_data` (`id_barang`, `kode_barang`, `nama_barang`, `jumlah_barang`, `satuan_barang`, `harga_beli`, `status_barang`) VALUES
('1', '91625', 'Sage Ground Wiberg', '1', 'M', '67318', 'false'),
('2', '44394', 'Tea - Honey Green Tea', '86', '2XL', '08475', 'false'),
('3', '7', 'Pumpkin - Seed', '60', 'XS', '65107', 'false'),
('4', '222', 'Pastry - Raisin Muffin - Mini', '9', 'S', '23467', 'true'),
('5', '906', 'Carbonated Water - Lemon Lime', '56', 'L', '6', 'false'),
('6', '49002', 'Wine - Chenin Blanc K.w.v.', '56', 'M', '36420', 'true'),
('7', '7', 'Prunes - Pitted', '8', 'L', '510', 'true'),
('8', '192', 'Ice Cream Bar - Oreo Cone', '46', 'M', '83786', 'false'),
('9', '07421', 'Vinegar - Champagne', '80', 'L', '38', 'false'),
('10', '547', 'Wine - Red, Antinori Santa', '18', '2XL', '8', 'false'),
('11', '79', 'Towel - Roll White', '64', 'S', '26', 'false'),
('12', '45300', 'Juice - Pineapple, 48 Oz', '6', 'XS', '1', 'true'),
('13', '81645', 'Yogurt - Blueberry, 175 Gr', '3', 'S', '36022', 'true'),
('14', '62964', 'Foam Espresso Cup Plain White', '50', '2XL', '975', 'true'),
('15', '2068', 'Pork Salted Bellies', '89', '2XL', '092', 'false'),
('16', '20', 'Bandage - Finger Cots', '31', 'L', '6', 'true'),
('17', '78706', 'Creme De Cacao Mcguines', '39', 'S', '768', 'true'),
('18', '5366', 'Crackers - Trio', '57', 'L', '8', 'false'),
('19', '21769', 'Strawberries - California', '65', 'M', '8738', 'true'),
('20', '635', 'Bread - Sour Sticks With Onion', '69', 'M', '6', 'false'),
('21', '382', 'Cheese - Mozzarella, Buffalo', '34', '3XL', '6', 'true'),
('22', '4825', 'Energy Drink - Franks Original', '4', '3XL', '3674', 'true'),
('23', '934', 'Halibut - Whole, Fresh', '32', 'XL', '803', 'true'),
('24', '8319', 'Trueblue - Blueberry Cranberry', '34', 'M', '798', 'true'),
('25', '5', 'Orange Roughy 4/6 Oz', '34', 'XL', '47', 'false'),
('26', '0827', 'Wine - Marlbourough Sauv Blanc', '94', 'M', '9846', 'false'),
('27', '5', 'Appetizer - Veg Assortment', '2', 'M', '6', 'false'),
('28', '17', 'Snapple - Iced Tea Peach', '71', '3XL', '0750', 'false'),
('29', '41', 'Paste - Black Olive', '36', 'XS', '07', 'true'),
('30', '290', 'Sugar - Fine', '37', 'S', '90372', 'true'),
('31', '2911', 'Cheese - Grie Des Champ', '18', 'S', '7', 'true'),
('32', '7', 'Lamb - Bones', '29', 'XS', '33799', 'false'),
('33', '0532', 'Cheese - Roquefort Pappillon', '47', 'L', '5208', 'true'),
('34', '2', 'Pickles - Gherkins', '88', '3XL', '01963', 'false'),
('35', '94', 'Muffin Batt - Blueberry Passion', '85', '3XL', '04986', 'false'),
('36', '88278', 'Muffin Mix - Lemon Cranberry', '76', 'L', '70023', 'false'),
('37', '670', 'Honey - Lavender', '73', 'S', '498', 'false'),
('38', '3398', 'Amarula Cream', '45', 'S', '5815', 'false'),
('39', '91735', 'Rum - Coconut, Malibu', '31', 'S', '9536', 'true'),
('40', '5567', 'Soup - Boston Clam Chowder', '94', 'L', '18532', 'false'),
('41', '6854', 'Pork - Chop, Frenched', '48', '2XL', '052', 'false'),
('42', '1953', 'Nantucket - Carrot Orange', '13', 'XL', '58732', 'true'),
('43', '1', 'Wine - White Cab Sauv.on', '62', 'M', '59', 'false'),
('44', '0623', 'Rum - Light, Captain Morgan', '39', 'XS', '06305', 'true'),
('45', '86', 'Garam Marsala', '15', 'M', '0451', 'false'),
('46', '94313', 'Seaweed Green Sheets', '78', '3XL', '59', 'false'),
('47', '49', 'Vanilla Beans', '10', 'S', '91557', 'false'),
('48', '1919', 'Veal - Knuckle', '34', '3XL', '31789', 'true'),
('49', '023', 'Garbage Bag - Clear', '8', 'XL', '80', 'false'),
('50', '16', 'Pork - Bacon, Sliced', '14', '3XL', '3797', 'true');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
