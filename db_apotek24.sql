-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2020 at 04:23 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_apotek24`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `id_access` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `access` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`id_access`, `id_user`, `access`) VALUES
(1, 1, 'admin'),
(4, 5, 'pendata'),
(5, 4, 'kasir');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `dosis` varchar(100) NOT NULL,
  `expire_date` date NOT NULL,
  `komposisi` varchar(100) NOT NULL,
  `indikasi` varchar(100) NOT NULL,
  `aturan_pakai` varchar(100) NOT NULL,
  `harga` int(6) NOT NULL,
  `id_supplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `jenis`, `dosis`, `expire_date`, `komposisi`, `indikasi`, `aturan_pakai`, `harga`, `id_supplier`) VALUES
(1, 'Panas Dingin Setamol', 'Jelly', '1000', '2020-04-19', 'Air, Gelatin, Gula', 'Apaan si?', 'Coba makan aja', 1000, 1),
(2, 'uc 1000', 'muniman', '1000', '2022-10-07', 'jeruk 1kg', 'paan tu ?\r\n', 'sesuka hati', 6000, 1),
(3, 'paracetamol', 'pereda nyeri', '80', '2022-10-14', 'obat-obatan', 'sakit panas', 'sampai sembuh', 500, 1);

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `id_resep` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_resep` date NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(25) NOT NULL,
  `data_transaksi` varchar(400) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `data_transaksi`, `tanggal_transaksi`, `total`) VALUES
('TR-5ea1a24d8cdd8', '1,Panas Dingin Setamol,1000,1,2,uc 1000,6000,1,3,paracetamol,500,4', '2020-04-23', 16000),
('TR-5ea1a2a5b3904', '1,Panas Dingin Setamol,1000,2,3,paracetamol,500,2', '2020-04-23', -4000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `alamat`, `no_hp`, `username`, `password`) VALUES
(1, 'Rakha Dzaky', 'Laki-laki', 'Purwokerto', '2000-10-19', 'Pesona Bali Blok B9 19', '085801730223', 'rakhadzaky', 'efe6398127928f1b2e9ef3207fb82663'),
(2, 'Tsany Rakha', 'Laki-laki', 'Bandung', '2020-01-01', 'Pesona Bali', '085801730223', 'tsanyrakha', 'efe6398127928f1b2e9ef3207fb82663'),
(3, 'adiwidyananda', 'Laki-laki', 'Singaraja', '1998-09-22', 'Singaraja, Bali', '0888228822', 'adiwid', '800f98176685d6ca67187a1a60a6562c'),
(4, 'hilmiha', 'Laki-laki', 'bjm', '1999-04-25', 'sada', '082140186233', 'hilmiha', '5b36ac0723ba4f25f0bc1d4e531995a6'),
(5, 'sadlh', 'Laki-laki', 'sadw', '1999-04-25', 'sadwda', '082137482733', 'hilmiha2', 'd9f4a1efd5f8c21a9f3806093dd8c67a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id_access`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id_resep`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
  MODIFY `id_access` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `resep`
--
ALTER TABLE `resep`
  MODIFY `id_resep` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
