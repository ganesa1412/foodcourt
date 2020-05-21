-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 21, 2020 at 07:49 PM
-- Server version: 10.3.22-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pojokmed_foodcourt`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id_menu` int(11) NOT NULL,
  `id_menu_category` int(11) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id_menu`, `id_menu_category`, `menu_name`, `price`, `img`) VALUES
(1, 1, 'Es Teler', 5000, '20200521012926_resep-es-teler-mewah.jpg'),
(2, 2, 'Tempe Mendoan', 1000, '20200521012853_Resep-Tempe-Mendoan.jpg'),
(3, 4, 'Es Cao', 5000, '20200519232927_download.jpg'),
(4, 4, 'Es Tebu', 5000, '20200519233007_tebu gan.jpg'),
(5, 5, 'Sate kelinci Original', 10000, '20200519233441_diagram.jpg'),
(6, 1, 'Es Kopyor', 3000, '20200521012914_resep-es-kopyor-cara-membuat-es-kopyor.jpg'),
(7, 2, 'Tahu Berontak', 1000, '20200521012944_unnamed.jpg'),
(8, 2, 'Weci', 1000, '20200521013000_weci-malang-foto-resep-utama.jpg'),
(9, 1, 'Es Teh', 2500, '20200521013017_ice-tea-liptoncom-2-92ddac61a4c17ace3c55aaf553738d30_600x400.png'),
(10, 6, 'Mie Goreng Special', 15000, '20200521021037_Mie-Goreng-Ayam.png'),
(11, 6, 'Mie Geprek Pedas', 18000, '20200521021142_5096337_7e3fb5ef-7797-4aa5-9128-a3a7ec6e39a9_756_756.jpg'),
(12, 6, 'Mie Kuah Special', 15000, '20200521021322_Mie-Ayam-Tumini-di-Jogja-Sang-Legenda-dengan-Kuah-Kental-yang-Menggugah-Selera-3.jpg'),
(13, 7, 'Es Teh Poci', 3500, '20200521021445_es-teh-manis-1.jpg'),
(14, 7, 'Es Jeruk', 4000, '20200521021539_5073465_883456c2-4b44-41f6-b654-d3ad4b172b28_700_700.jpg'),
(15, 7, 'Air Mineral', 2000, '20200521021637_2729665_b64df501-5328-427e-8d98-5d7f31bfe237_1000_929.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu_category`
--

CREATE TABLE `tb_menu_category` (
  `id_menu_category` int(11) NOT NULL,
  `id_stand` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_menu_category`
--

INSERT INTO `tb_menu_category` (`id_menu_category`, `id_stand`, `category_name`) VALUES
(1, 6, 'Aneka Es'),
(2, 6, 'Aneka Gorengan'),
(4, 4, 'Drinks'),
(5, 4, 'Bar-bar size'),
(6, 5, 'Makanan'),
(7, 5, 'Minuman');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` int(11) NOT NULL,
  `id_stand` int(11) NOT NULL,
  `id_table` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_order_item`
--

CREATE TABLE `tb_order_item` (
  `id_order_item` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_table`
--

CREATE TABLE `tb_table` (
  `id_table` int(11) NOT NULL,
  `table_no` varchar(11) NOT NULL,
  `floor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_table`
--

INSERT INTO `tb_table` (`id_table`, `table_no`, `floor`) VALUES
(1, '01', 1),
(2, '02', 1),
(3, '03', 1),
(4, '04A', 2),
(5, '04B', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `name`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(4, 'Sate Kelinci Mas Husby', 'husby', '5952ee859ea443a77ff8cdd791077c6d', 2),
(5, 'Elwinoodles', 'wino', '9252fe5d140e19d308f2037404a0536a', 2),
(6, 'Es(a) Teler', 'es', '12470fe406d44017d96eab37dd65fc14', 2),
(7, 'Nana Mori', 'nana', '518d5f3401534f5c6c21977f12f60989', 3),
(9, 'Mas Kasir', 'kasir', 'c7911af3adbd12a035b289556d96470a', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tb_menu_category`
--
ALTER TABLE `tb_menu_category`
  ADD PRIMARY KEY (`id_menu_category`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `tb_order_item`
--
ALTER TABLE `tb_order_item`
  ADD PRIMARY KEY (`id_order_item`);

--
-- Indexes for table `tb_table`
--
ALTER TABLE `tb_table`
  ADD PRIMARY KEY (`id_table`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_menu_category`
--
ALTER TABLE `tb_menu_category`
  MODIFY `id_menu_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_order_item`
--
ALTER TABLE `tb_order_item`
  MODIFY `id_order_item` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_table`
--
ALTER TABLE `tb_table`
  MODIFY `id_table` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
