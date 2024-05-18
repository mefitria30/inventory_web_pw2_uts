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
  `status_barang` enum('1','0') NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mock_data`
--

INSERT INTO `master_data` (`id_barang`, `kode_barang`, `nama_barang`, `jumlah_barang`, `satuan_barang`, `harga_beli`, `status_barang`) VALUES
('1', '91625', 'Sage Ground Wiberg', '1', 'kg', '67318', 0),
('2', '44394', 'Tea - Honey Green Tea', '86', 'kg', '08475', 0),
('3', '7', 'Pumpkin - Seed', '60', 'pcs', '65107', 0),
('4', '222', 'Pastry - Raisin Muffin - Mini', '9', 'liter', '23467', 1),
('5', '906', 'Carbonated Water - Lemon Lime', '56', 'meter', '6', 0),
('6', '49002', 'Wine - Chenin Blanc K.w.v.', '56', 'kg', '36420', 1),
('7', '7', 'Prunes - Pitted', '8', 'meter', '510', 1),
('8', '192', 'Ice Cream Bar - Oreo Cone', '46', 'kg', '83786', 0),
('9', '07421', 'Vinegar - Champagne', '80', 'meter', '38', 0),
('10', '547', 'Wine - Red, Antinori Santa', '18', 'kg', '8', 0),
('11', '79', 'Towel - Roll White', '64', 'liter', '26', 0),
('12', '45300', 'Juice - Pineapple, 48 Oz', '6', 'pcs', '1', 1),
('13', '81645', 'Yogurt - Blueberry, 175 Gr', '3', 'liter', '36022', 1),
('14', '62964', 'Foam Espresso Cup Plain White', '50', 'kg', '975', 1),
('15', '2068', 'Pork Salted Bellies', '89', 'kg', '092', 0),
('16', '20', 'Bandage - Finger Cots', '31', 'meter', '6', 1),
('17', '78706', 'Creme De Cacao Mcguines', '39', 'liter', '768', 1),
('18', '5366', 'Crackers - Trio', '57', 'meter', '8', 0),
('19', '21769', 'Strawberries - California', '65', 'kg', '8738', 1),
('20', '635', 'Bread - Sour Sticks With Onion', '69', 'kg', '6', 0),
('21', '382', 'Cheese - Mozzarella, Buffalo', '34', 'kg', '6', 1),
('22', '4825', 'Energy Drink - Franks Original', '4', 'kg', '3674', 1),
('23', '934', 'Halibut - Whole, Fresh', '32', 'meter', '803', 1),
('24', '8319', 'Trueblue - Blueberry Cranberry', '34', 'kg', '798', 1),
('25', '5', 'Orange Roughy 4/6 Oz', '34', 'meter', '47', 0),
('26', '0827', 'Wine - Marlbourough Sauv Blanc', '94', 'kg', '9846', 0),
('27', '5', 'Appetizer - Veg Assortment', '2', 'kg', '6', 0),
('28', '17', 'Snapple - Iced Tea Peach', '71', 'kg', '0750', 0),
('29', '41', 'Paste - Black Olive', '36', 'pcs', '07', 1),
('30', '290', 'Sugar - Fine', '37', 'liter', '90372', 1),
('31', '2911', 'Cheese - Grie Des Champ', '18', 'liter', '7', 1),
('32', '7', 'Lamb - Bones', '29', 'pcs', '33799', 0),
('33', '0532', 'Cheese - Roquefort Pappillon', '47', 'meter', '5208', 1),
('34', '2', 'Pickles - Gherkins', '88', 'kg', '01963', 0),
('35', '94', 'Muffin Batt - Blueberry Passion', '85', 'kg', '04986', 0),
('36', '88278', 'Muffin Mix - Lemon Cranberry', '76', 'meter', '70023', 0),
('37', '670', 'Honey - Lavender', '73', 'liter', '498', 0),
('38', '3398', 'Amarula Cream', '45', 'liter', '5815', 0),
('39', '91735', 'Rum - Coconut, Malibu', '31', 'liter', '9536', 1),
('40', '5567', 'Soup - Boston Clam Chowder', '94', 'meter', '18532', 0),
('41', '6854', 'Pork - Chop, Frenched', '48', 'kg', '052', 0),
('42', '1953', 'Nantucket - Carrot Orange', '13', 'meter', '58732', 1),
('43', '1', 'Wine - White Cab Sauv.on', '62', 'kg', '59', 0),
('44', '0623', 'Rum - Light, Captain Morgan', '39', 'pcs', '06305', 1),
('45', '86', 'Garam Marsala', '15', 'kg', '0451', 0),
('46', '94313', 'Seaweed Green Sheets', '78', 'kg', '59', 0),
('47', '49', 'Vanilla Beans', '10', 'liter', '91557', 0),
('48', '1919', 'Veal - Knuckle', '34', 'kg', '31789', 1),
('49', '023', 'Garbage Bag - Clear', '8', 'meter', '80', 0),
('50', '16', 'Pork - Bacon, Sliced', '14', 'kg', '3797', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
