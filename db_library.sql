-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2020 at 03:10 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(20) NOT NULL,
  `nama_admin` varchar(200) NOT NULL,
  `username_admin` varchar(20) NOT NULL,
  `password_admin` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(20) NOT NULL,
  `nama_buku` varchar(200) NOT NULL,
  `penulis_buku` varchar(200) NOT NULL,
  `penerbit_buku` varchar(200) NOT NULL,
  `url_cover` varchar(500) NOT NULL,
  `tahun` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` varchar(20) NOT NULL,
  `tanggal_pinjam` varchar(50) NOT NULL,
  `tanggal_kembali` varchar(50) NOT NULL,
  `status_peminjaman` varchar(20) NOT NULL,
  `id_buku` varchar(20) DEFAULT NULL,
  `nim_pengguna` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `nim_pengguna` varchar(9) NOT NULL,
  `nama_pengguna` varchar(200) NOT NULL,
  `email_pengguna` varchar(200) NOT NULL,
  `password_pengguna` varchar(100) NOT NULL,
  `phone_pengguna` varchar(13) NOT NULL,
  `address_pengguna` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`nim_pengguna`, `nama_pengguna`, `email_pengguna`, `password_pengguna`, `phone_pengguna`, `address_pengguna`) VALUES
('672018112', 'Sean Alessandro Pattirane', 'sean64971@gmail.com', 'seanales1234', '085244287435', 'Jl. Diponegoro No. 21, Salatiga');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_peminjaman`
--

CREATE TABLE `riwayat_peminjaman` (
  `id_riwayat_peminjaman` int(11) NOT NULL,
  `nim_pengguna` varchar(9) DEFAULT NULL,
  `id_buku` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `nim_pengguna` (`nim_pengguna`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`nim_pengguna`);

--
-- Indexes for table `riwayat_peminjaman`
--
ALTER TABLE `riwayat_peminjaman`
  ADD PRIMARY KEY (`id_riwayat_peminjaman`),
  ADD KEY `nim_pengguna` (`nim_pengguna`),
  ADD KEY `id_buku` (`id_buku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `riwayat_peminjaman`
--
ALTER TABLE `riwayat_peminjaman`
  MODIFY `id_riwayat_peminjaman` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`nim_pengguna`) REFERENCES `pengguna` (`nim_pengguna`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);

--
-- Constraints for table `riwayat_peminjaman`
--
ALTER TABLE `riwayat_peminjaman`
  ADD CONSTRAINT `riwayat_peminjaman_ibfk_1` FOREIGN KEY (`nim_pengguna`) REFERENCES `pengguna` (`nim_pengguna`),
  ADD CONSTRAINT `riwayat_peminjaman_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
