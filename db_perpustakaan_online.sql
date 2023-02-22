-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2022 at 12:02 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama_anggota` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_telepon` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_anggota`, `jenis_kelamin`, `alamat`, `no_telepon`, `email`) VALUES
(1, 'Silmi Aulia ', 'Perempuan', 'Cianjur', '082731937193', 'silmiaulia@gmail.com'),
(2, 'wildan', 'Laki-laki', 'Bandung', '09839139138', 'wildan@gmail.com'),
(6, 'Laura', 'Perempuan', 'Jakarta', '0897865543', 'lauran12@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `bibliografi`
--

CREATE TABLE `bibliografi` (
  `id_bibliografi` int(11) NOT NULL,
  `isbn` varchar(50) DEFAULT NULL,
  `call_number` varchar(50) NOT NULL DEFAULT '',
  `judul` varchar(100) DEFAULT NULL,
  `edisi` varchar(50) DEFAULT NULL,
  `penulis` varchar(100) DEFAULT NULL,
  `penerbit` varchar(100) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah_stok` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bibliografi`
--

INSERT INTO `bibliografi` (`id_bibliografi`, `isbn`, `call_number`, `judul`, `edisi`, `penulis`, `penerbit`, `tahun`, `kategori`, `harga`, `jumlah_stok`, `foto`) VALUES
(1, '0764541668', 'B00001', 'PHP 5 for dummies', '', 'Valade, Janet', '', 2004, 'Guide', 78000, 3, 'php_5_for_dummies1.jpg'),
(2, '23232323s68', 'B00002', 'Harry Potter and the Sorcerer\'s Stone', '', 'J.K. Rowling', '', 1991, 'Fiction', 69000, 2, 'harry_potter_ss1.png'),
(9, '93481984194', 'B00003', 'Marmut Merah Jambu', '4', 'Raditya Dika', 'Gramedia', 2014, 'Komedi', 50000, 0, 'Desain_tanpa_judul_(3)11.png'),
(15, '9789791685252', 'B00004', 'Romeo and Juliet', '-', 'Pustaka Narasi', 'Pustaka Narasi', 2018, 'Romance', 78000, 4, 'romeo_juliet.png'),
(16, '98768728313', 'B00005', 'introduction to Algorithms', '2', 'Thomas H. Cormen', 'Gramedia', 1989, 'Buku teks', 140000, 1, 'algoritm.png');

-- --------------------------------------------------------

--
-- Table structure for table `koleksi`
--

CREATE TABLE `koleksi` (
  `id_koleksi` int(11) NOT NULL,
  `kode_koleksi` varchar(50) DEFAULT NULL,
  `call_number` varchar(50) NOT NULL,
  `nomor_register` varchar(50) DEFAULT '',
  `status` int(5) DEFAULT NULL,
  `id_rak` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `koleksi`
--

INSERT INTO `koleksi` (`id_koleksi`, `kode_koleksi`, `call_number`, `nomor_register`, `status`, `id_rak`) VALUES
(1, 'KB10001', 'B00001', '8391831983', 0, 1),
(2, 'KB10002', 'B00002', '9829428948', 0, 1),
(3, 'KB10003', 'B00001', '9103810381', 1, 1),
(10, 'KB10004', 'B00002', '9000000000', 0, 1),
(44, 'J0001', 'B00004', '87318361831', 0, 1),
(45, 'J0002', 'B00004', '1391038103', 0, 1),
(46, 'J0003', 'B00004', '134252131', 1, 1),
(47, 'J0004', 'B00004', '133454646', 0, 1),
(48, 'AL0001', 'B00005', '9829084290', 0, 1),
(49, 'KB20001', 'B00001', '02428842942', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_telepon` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `alamat`, `no_telepon`, `email`, `password`) VALUES
(1, 'silmia', 'Cianjur', '0823173913', 'silmi@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `rak`
--

CREATE TABLE `rak` (
  `id_rak` int(11) NOT NULL,
  `nama_rak` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rak`
--

INSERT INTO `rak` (`id_rak`, `nama_rak`) VALUES
(1, 'R-01');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode_koleksi` varchar(50) DEFAULT NULL,
  `id_anggota` int(11) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_jatuh_tempo` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `is_lent` int(11) DEFAULT NULL,
  `is_return` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_koleksi`, `id_anggota`, `tanggal_pinjam`, `tanggal_jatuh_tempo`, `tanggal_kembali`, `is_lent`, `is_return`) VALUES
(4, 'KB10001', 1, '2022-06-17', '2022-06-22', '2022-06-17', 0, 1),
(19, 'KB10003', 1, '2022-06-17', '2022-06-22', '2022-06-17', 0, 1),
(20, 'KB10001', 2, '2022-06-17', '2022-06-22', '2022-06-17', 0, 1),
(21, 'KB10002', 2, '2022-06-17', '2022-06-22', '2022-06-18', 0, 1),
(22, 'KB10001', 1, '2022-06-17', '2022-06-22', '2022-06-18', 0, 1),
(23, 'KB10003', 2, '2022-06-18', '2022-06-23', '2022-06-18', 0, 1),
(26, 'KB10002', 1, '2022-06-18', '2022-06-23', '2022-06-18', 0, 1),
(27, 'J0003', 6, '2022-06-18', '2022-06-23', NULL, 1, 0),
(29, 'KB10003', 1, '2022-06-18', '2022-06-23', NULL, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `bibliografi`
--
ALTER TABLE `bibliografi`
  ADD PRIMARY KEY (`id_bibliografi`,`call_number`),
  ADD UNIQUE KEY `acll_number` (`call_number`);

--
-- Indexes for table `koleksi`
--
ALTER TABLE `koleksi`
  ADD PRIMARY KEY (`id_koleksi`,`call_number`),
  ADD UNIQUE KEY `kode_koleksi` (`kode_koleksi`),
  ADD KEY `fk_call_number` (`call_number`),
  ADD KEY `fk_id_rak` (`id_rak`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_kode_koleksi` (`kode_koleksi`),
  ADD KEY `fk_id_anggota` (`id_anggota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `bibliografi`
--
ALTER TABLE `bibliografi`
  MODIFY `id_bibliografi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `koleksi`
--
ALTER TABLE `koleksi`
  MODIFY `id_koleksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rak`
--
ALTER TABLE `rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `koleksi`
--
ALTER TABLE `koleksi`
  ADD CONSTRAINT `fk_call_number` FOREIGN KEY (`call_number`) REFERENCES `bibliografi` (`call_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_rak` FOREIGN KEY (`id_rak`) REFERENCES `rak` (`id_rak`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_id_anggota` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kode_koleksi` FOREIGN KEY (`kode_koleksi`) REFERENCES `koleksi` (`kode_koleksi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
