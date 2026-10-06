-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 07, 2026 at 12:55 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `metode_saw`
--

-- --------------------------------------------------------

--
-- Table structure for table `hasil_saw`
--

CREATE TABLE `hasil_saw` (
  `id` int(11) NOT NULL,
  `nama_santri` varchar(100) DEFAULT NULL,
  `nilai_akhir` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akun`
--

CREATE TABLE `tbl_akun` (
  `kode_akun` char(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_akun`
--

INSERT INTO `tbl_akun` (`kode_akun`, `nama_lengkap`, `username`, `password`, `level`) VALUES
('A01', 'Administrator', 'Admin', '12345', 'Admin'),
('A02', 'Bagas Kusuma', 'bagasksm', '12345', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alternatif`
--

CREATE TABLE `tbl_alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `nama_alternatif` varchar(50) NOT NULL,
  `nilai_saw` double NOT NULL,
  `ranking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_alternatif`
--

INSERT INTO `tbl_alternatif` (`id_alternatif`, `nama_alternatif`, `nilai_saw`, `ranking`) VALUES
(26, 'Ahmad Fauzan', 0.6805, 5),
(27, 'Muhammad Rizki', 0.705, 4),
(28, 'Abdul Rahman', 0.7605, 2),
(29, 'Ali Akbar', 0.715, 3),
(30, 'Hasan Basri', 0.9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `bobot_kriteria` double NOT NULL,
  `tipe_kriteria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`id_kriteria`, `nama_kriteria`, `bobot_kriteria`, `tipe_kriteria`) VALUES
(1, 'Hafalan Al-Quran', 30, 'benefit'),
(2, 'Nilai Akademik', 25, 'benefit'),
(3, 'Akhlak', 20, 'benefit'),
(4, 'Kedisiplinan', 15, 'cost'),
(5, 'Keaktifan', 10, 'benefit');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`id_nilai`, `id_alternatif`, `id_kriteria`, `id_subkriteria`) VALUES
(61, 26, 1, 18),
(62, 26, 2, 26),
(63, 26, 3, 7),
(64, 26, 4, 30),
(65, 26, 5, 32),
(66, 27, 1, 25),
(67, 27, 2, 20),
(68, 27, 3, 7),
(69, 27, 4, 21),
(70, 27, 5, 23),
(71, 28, 1, 18),
(72, 28, 2, 26),
(73, 28, 3, 29),
(74, 28, 4, 30),
(75, 28, 5, 32),
(76, 29, 1, 24),
(77, 29, 2, 26),
(78, 29, 3, 28),
(79, 29, 4, 21),
(80, 29, 5, 22),
(81, 30, 1, 24),
(82, 30, 2, 27),
(83, 30, 3, 28),
(84, 30, 4, 31),
(85, 30, 5, 33);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subkriteria`
--

CREATE TABLE `tbl_subkriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nama_subkriteria` varchar(50) NOT NULL,
  `nilai_subkriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_subkriteria`
--

INSERT INTO `tbl_subkriteria` (`id_subkriteria`, `id_kriteria`, `nama_subkriteria`, `nilai_subkriteria`) VALUES
(1, 1, 'Sangat Rendah', 1),
(2, 1, 'Rendah', 2),
(4, 2, 'Sangat Rendah', 1),
(5, 3, 'Sangat Buruk', 1),
(6, 3, 'Buruk', 2),
(7, 3, 'Cukup', 3),
(13, 5, 'Sangat Rendah', 1),
(16, 4, 'Tidak Disiplin', 5),
(18, 1, 'Cukup', 3),
(19, 2, 'Rendah', 2),
(20, 2, 'Cukup', 3),
(21, 4, 'Cukup', 4),
(22, 5, 'Rendah', 2),
(23, 5, 'Cukup', 3),
(24, 1, 'Baik', 4),
(25, 1, 'Sangat Baik', 5),
(26, 2, 'Baik', 4),
(27, 2, 'Sangat Baik', 5),
(28, 3, 'Baik', 4),
(29, 3, 'Sangat Baik', 5),
(30, 4, 'Disiplin', 3),
(31, 4, 'Sangat Disiplin', 2),
(32, 5, 'Baik', 4),
(33, 5, 'Sangat Baik', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hasil_saw`
--
ALTER TABLE `hasil_saw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD PRIMARY KEY (`kode_akun`);

--
-- Indexes for table `tbl_alternatif`
--
ALTER TABLE `tbl_alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_alternatif` (`id_alternatif`),
  ADD KEY `idx_id_alternatif` (`id_alternatif`);

--
-- Indexes for table `tbl_subkriteria`
--
ALTER TABLE `tbl_subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasil_saw`
--
ALTER TABLE `hasil_saw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_alternatif`
--
ALTER TABLE `tbl_alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `tbl_subkriteria`
--
ALTER TABLE `tbl_subkriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD CONSTRAINT `fk_tbl_nilai_alternatif` FOREIGN KEY (`id_alternatif`) REFERENCES `tbl_alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
