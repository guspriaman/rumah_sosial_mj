-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2022 at 01:00 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumah_sosial`
--

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE `keuangan` (
  `id_keuangan` int(11) NOT NULL,
  `nama_admin_k` varchar(100) NOT NULL,
  `nama_pic` varchar(100) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `bayar` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keuangan`
--

INSERT INTO `keuangan` (`id_keuangan`, `nama_admin_k`, `nama_pic`, `nama_pelanggan`, `tgl_pembayaran`, `jumlah`, `bayar`, `status`) VALUES
(1, 'Rani', 'gus', 'raga', '2022-06-10', '100 KG', '100000', 'sudah dibayar'),
(2, 'Rani', 'gus', 'raga', '2022-06-10', '100 KG', '100000', 'sudah dibayar'),
(3, 'Rani', 'raga', 'Raihan', '2022-06-04', '100 KG', '100000', 'Sudah Dibayar'),
(4, 'Rani', 'gus', 'raihan ', '2022-06-09', '100 KG', '100000', 'Sudah Dibayar');

-- --------------------------------------------------------

--
-- Table structure for table `lokasih`
--

CREATE TABLE `lokasih` (
  `id` int(11) NOT NULL,
  `lokasih` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lokasih`
--

INSERT INTO `lokasih` (`id`, `lokasih`) VALUES
(15, 'tebet  timur barat'),
(16, 'tebet  timun dalam'),
(17, 'jakarta selatan dalam timur'),
(18, 'tebet  timur makan'),
(19, 'jakarta barat');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(200) NOT NULL,
  `id_lokasih` varchar(200) NOT NULL,
  `no_tlp` varchar(200) NOT NULL,
  `tgl_gabung` date NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `id_lokasih`, `no_tlp`, `tgl_gabung`, `image`) VALUES
(15, 'Raihan', 'tebet  timu', '0864532562332', '2022-06-03', ''),
(16, 'raga', 'tebet  timu', '0864532562332', '2022-06-17', ''),
(17, 'raihan ', 'jakarta sel', '0864532562332', '2022-06-16', ''),
(21, 'Michelle', 'jakarta barat', '0864532562332', '2022-06-03', ''),
(22, 'Rien', 'tebet  timun dalam', '086453252324', '2022-06-15', '');

-- --------------------------------------------------------

--
-- Table structure for table `penjemputan`
--

CREATE TABLE `penjemputan` (
  `id_penjemputan` int(11) NOT NULL,
  `nama_admin_g` varchar(200) NOT NULL,
  `nama_pic` varchar(200) NOT NULL,
  `nama_pelanggan` varchar(200) NOT NULL,
  `tgl_penjemputan` date NOT NULL,
  `lokasih` varchar(200) NOT NULL,
  `jumlah` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjemputan`
--

INSERT INTO `penjemputan` (`id_penjemputan`, `nama_admin_g`, `nama_pic`, `nama_pelanggan`, `tgl_penjemputan`, `lokasih`, `jumlah`, `status`) VALUES
(6, 'Pakde', 'gus', 'Michelle', '2022-06-18', 'jakarta barat', '100 KG', 'Sudah Dijemput'),
(7, 'Pakde', 'gus', 'Raihan', '2022-06-16', 'tebet  timur barat', '100 KG', 'Sudah Dijemput');

-- --------------------------------------------------------

--
-- Table structure for table `permintaan`
--

CREATE TABLE `permintaan` (
  `id_permintaan` int(11) NOT NULL,
  `nama_pic` varchar(200) NOT NULL,
  `nama_pelanggan` varchar(200) NOT NULL,
  `lokasih` varchar(200) NOT NULL,
  `jumlah` varchar(200) NOT NULL,
  `tgl_permintaan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permintaan`
--

INSERT INTO `permintaan` (`id_permintaan`, `nama_pic`, `nama_pelanggan`, `lokasih`, `jumlah`, `tgl_permintaan`) VALUES
(1, 'raga', 'raga', 'jakarta selatan dalam timur', '100 kg', '2022-06-15'),
(4, 'gus', 'Raihan', 'jakarta barat', '100 KG', '2022-06-18'),
(5, 'gus', 'raihan ', 'tebet  timur barat', '100 KG', '2022-06-25');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'admministrator'),
(2, 'member'),
(3, 'Keuangan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `tanggal_input` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `alamat`, `email`, `image`, `password`, `role_id`, `is_active`, `tanggal_input`) VALUES
(49, 'Guspriaman warasi', '', 'guspriaman@gmail.com', 'default.jpg', '$2y$10$r/wWVfwTQytGG8o2K1aVFOUP/PjwCRPyWhUWwFzlgSF4wbcANdkUC', 2, 1, 1653658125),
(50, 'admin', '', 'admin@gmail.com', 'default.jpg', '$2y$10$8KHl.yVHDeJ/wrvg4.YlhOuM2RG44tBulbPv1etLN70k5.TI1UCNi', 1, 1, 1653714052),
(52, 'dia', '', 'gus@gmail.com', 'default.jpg', '$2y$10$.Li9DqASrd3DesfwVYyl0u5NRQ7FxcEoSSM/jZHlGemZDcwPkfGQq', 2, 1, 1653901726),
(53, 'Admin Gudang', '', 'gudang@gmail.com', 'default.jpg', '$2y$10$Bk8SjQo3z5KlWg8XSKkLOuVetlvwRTCjgDHs0Lon6Frc9SptQOu3C', 4, 1, 1654107740),
(54, 'Keuangan', '', 'Keuangan@gmail.com', 'default.jpg', '$2y$10$4tBu4neMhIWLZyjWCHj.1ucUWRcu/H3sIzRazTe7vPxw7VNOrYFR6', 5, 1, 1654107798),
(55, 'pic ', '', 'pic@gmail.com', 'default.jpg', '$2y$10$Y8kOGOPJO7h.t2OqbkMC7efmm3W8.G3uD174S4/J8Nh4K4WQKjjDO', 2, 1, 1654256338);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3),
(6, 3, 3),
(8, 1, 4),
(9, 1, 5),
(10, 5, 5),
(11, 4, 4),
(12, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'PIC'),
(4, 'Admin Gudang'),
(5, 'Keuangan'),
(6, 'Laporan');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(0, 3, 'menu management', 'menu', 'fas fa-fw fa-book', 1),
(1, 1, 'Dashboard', 'Admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'my profil', 'user', 'fas  fa-fw fa-user', 1),
(3, 2, 'Data Pelanggan', 'pelanggan', 'fas fa-fw fa-address-card', 1),
(4, 2, 'Permintaan Penjemputan', 'permintaan', 'fas fa-fw fa-book', 1),
(5, 6, 'Laporan Data MJ', 'lokasih', 'fas fa-fw fa-address-book', 0),
(6, 6, 'Lapaoran Data user', 'Admin', 'fas fa-fw fa-address-card', 1),
(7, 6, 'Laporan Data Keuangan', 'laporan/laporan_keuangan', 'fas fa-fw fa-solid fa-file-invoice-dollar', 1),
(8, 6, 'Laporan Data penjamputan', 'laporan/laporan_penjemputan', 'fas fa-fw fa-warehouse', 1),
(11, 1, 'Data lokasih', 'lokasih', 'fas fa-fw fa-globe', 1),
(13, 4, 'Data Penjemputan ', 'penjemputan', 'fas fa-fw fa-truck', 1),
(14, 5, 'Data Pembayaran MJ', 'keuangan', 'fas fa-fw fa-solid fa-file-invoice-dollar', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id_keuangan`);

--
-- Indexes for table `lokasih`
--
ALTER TABLE `lokasih`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `penjemputan`
--
ALTER TABLE `penjemputan`
  ADD PRIMARY KEY (`id_penjemputan`);

--
-- Indexes for table `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`id_permintaan`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id_keuangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lokasih`
--
ALTER TABLE `lokasih`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `penjemputan`
--
ALTER TABLE `penjemputan`
  MODIFY `id_penjemputan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permintaan`
--
ALTER TABLE `permintaan`
  MODIFY `id_permintaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
