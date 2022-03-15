-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2022 at 12:56 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipilis`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama_anggota` varchar(255) DEFAULT NULL,
  `kelas` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `sandi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_anggota`, `kelas`, `no_hp`, `username`, `sandi`) VALUES
(1, 'Syaroful AInur Rokhim', 'XII RPL 2', '098867654611', 'syaroff', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'Iskandar', 'XII RPL 2', '09867431234', 'iskandar1', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Table structure for table `hak_pilih`
--

CREATE TABLE `hak_pilih` (
  `id_hak` int(11) NOT NULL,
  `id_anggota` int(11) DEFAULT NULL,
  `status_pilih` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hak_pilih`
--

INSERT INTO `hak_pilih` (`id_hak`, `id_anggota`, `status_pilih`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `paslon`
--

CREATE TABLE `paslon` (
  `id_paslon` int(11) NOT NULL,
  `nama_paslon` varchar(255) DEFAULT NULL,
  `visi` longtext DEFAULT NULL,
  `misi` longtext DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paslon`
--

INSERT INTO `paslon` (`id_paslon`, `nama_paslon`, `visi`, `misi`, `foto`) VALUES
(1, 'Alexander Pierce', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla adipisci, illo non optio, quasi neque aperiam atque voluptate vitae recusandae architecto corrupti maxime. Quos accusamus repellat libero corporis eos magni.\n\n\n', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla adipisci, illo non optio, quasi neque aperiam atque voluptate vitae recusandae architecto corrupti maxime. Quos accusamus repellat libero corporis eos magni.', 'paslon.jpg'),
(2, 'John Smith', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla adipisci, illo non optio, quasi neque aperiam atque voluptate vitae recusandae architecto corrupti maxime. Quos accusamus repellat libero corporis eos magni.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla adipisci, illo non optio, quasi neque aperiam atque voluptate vitae recusandae architecto corrupti maxime. Quos accusamus repellat libero corporis eos magni.', 'paslon.jpg'),
(3, 'Ariana Grande', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla adipisci, illo non optio, quasi neque aperiam atque voluptate vitae recusandae architecto corrupti maxime. Quos accusamus repellat libero corporis eos magni.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla adipisci, illo non optio, quasi neque aperiam atque voluptate vitae recusandae architecto corrupti maxime. Quos accusamus repellat libero corporis eos magni.', 'paslon.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pengurus`
--

CREATE TABLE `pengurus` (
  `id_pengurus` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `sandi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengurus`
--

INSERT INTO `pengurus` (`id_pengurus`, `nama`, `username`, `sandi`) VALUES
(1, 'Bagaskara Manjer Kawuryan', 'kara404', '45d6c19acb2dd6640918882b99d46f17');

-- --------------------------------------------------------

--
-- Table structure for table `pilihan`
--

CREATE TABLE `pilihan` (
  `id_pilihan` int(11) NOT NULL,
  `id_hak` int(11) NOT NULL,
  `id_paslon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `hak_pilih`
--
ALTER TABLE `hak_pilih`
  ADD PRIMARY KEY (`id_hak`),
  ADD KEY `fk_anggota` (`id_anggota`);

--
-- Indexes for table `paslon`
--
ALTER TABLE `paslon`
  ADD PRIMARY KEY (`id_paslon`);

--
-- Indexes for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`id_pengurus`);

--
-- Indexes for table `pilihan`
--
ALTER TABLE `pilihan`
  ADD PRIMARY KEY (`id_pilihan`),
  ADD UNIQUE KEY `fk_hak` (`id_hak`) USING BTREE,
  ADD KEY `fk_paslon` (`id_paslon`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hak_pilih`
--
ALTER TABLE `hak_pilih`
  MODIFY `id_hak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `paslon`
--
ALTER TABLE `paslon`
  MODIFY `id_paslon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `id_pengurus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pilihan`
--
ALTER TABLE `pilihan`
  MODIFY `id_pilihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hak_pilih`
--
ALTER TABLE `hak_pilih`
  ADD CONSTRAINT `fk_anggota` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pilihan`
--
ALTER TABLE `pilihan`
  ADD CONSTRAINT `fk_hak` FOREIGN KEY (`id_hak`) REFERENCES `hak_pilih` (`id_hak`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_paslon` FOREIGN KEY (`id_paslon`) REFERENCES `paslon` (`id_paslon`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
