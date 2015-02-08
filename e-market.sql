-- phpMyAdmin SQL Dump
-- version 4.0.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 14, 2014 at 04:25 PM
-- Server version: 5.5.33
-- PHP Version: 5.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e-market`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
  `id_bank` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bank` varchar(20) NOT NULL,
  PRIMARY KEY (`id_bank`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Handphone'),
(2, 'Komputer'),
(3, 'Pakaian'),
(4, 'Buku'),
(5, 'Kendaraan'),
(6, 'Makanan');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(50) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `keterangan_produk` text NOT NULL,
  `gambar_produk` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `id_kategori`, `id_toko`, `keterangan_produk`, `gambar_produk`, `stok`) VALUES
(1, 'Samsung Galaxy Wonder', 1600000, 1, 1, 'OS: Jelly Bean (Upgraded)', '', 5),
(2, 'Brownies Cake', 10000, 6, 5, 'Brownies Cake Full Love', '', 10),
(3, 'Sony Expreria M', 2200000, 1, 1, 'OS: Froyo', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE IF NOT EXISTS `rekening` (
  `id_rekening` int(11) NOT NULL AUTO_INCREMENT,
  `nomer_rekening` varchar(50) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  PRIMARY KEY (`id_rekening`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE IF NOT EXISTS `toko` (
  `id_toko` int(11) NOT NULL AUTO_INCREMENT,
  `nama_toko` varchar(50) NOT NULL,
  `alamat_toko` varchar(100) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  PRIMARY KEY (`id_toko`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `alamat_toko`, `no_telp`, `nama_pemilik`) VALUES
(1, 'Mart Phone', 'Jalan Bima 1 no. F4 Semarang', '081915160170', 'Erwin'),
(2, 'Imam Butik', 'Jalan Poncowolo Barat no. 69 Semarang', '085642743334', 'Imam'),
(3, 'MSF Comp', 'Jalan Banowati no. 69 Semarang', '085640603114', 'Muhammad Syarif'),
(4, 'Camel Book', 'Jalan Sadewa no. 69 Semarang', '081915160170', 'Fadhel'),
(5, 'Garten Cake', 'Jalan Nakula 1 no. 4 Semarang', '081915160170', 'Rizki Dwi Kelimutu');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
