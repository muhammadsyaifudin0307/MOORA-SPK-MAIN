-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2024 at 03:57 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_moora_spk`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akun`
--

CREATE TABLE `tbl_akun` (
  `id_akun` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_akun`
--

INSERT INTO `tbl_akun` (`id_akun`, `nama_lengkap`, `username`, `password`) VALUES
(1, 'Administrator', 'Admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alternatif`
--

CREATE TABLE `tbl_alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `nama_alternatif` varchar(30) NOT NULL,
  `nilai_moora` double NOT NULL,
  `rangking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_alternatif`
--

INSERT INTO `tbl_alternatif` (`id_alternatif`, `nama_alternatif`, `nilai_moora`, `rangking`) VALUES
(29, 'A1', 0.15252117484642, 1),
(30, 'A2', -0.21144267805104, 5),
(31, 'A3', -0.0057851722662243, 3),
(32, 'A4', -0.14653429341759, 4),
(33, 'A5', 0.004663083203001, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(30) NOT NULL,
  `bobot_kriteria` double NOT NULL,
  `tipe_kriteria` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`id_kriteria`, `nama_kriteria`, `bobot_kriteria`, `tipe_kriteria`) VALUES
(11, 'Penghasilan Orang Tua', 0.4, 'Cost'),
(12, 'Tanggungan Anak Sekolah', 0.2, 'Benefit'),
(13, 'Pekerjaan Orang Tua', 0.15, 'Benefit'),
(14, 'Nilai Raport', 0.05, 'Benefit'),
(18, 'Status Ortu', 0.2, 'Benefit'),
(20, 'Bantuan Pemerintah/ ket miskin', 0.3, 'Cost');

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
(70, 0, 1, 4),
(71, 0, 2, 1),
(72, 0, 4, 6),
(79, 0, 1, 2),
(80, 0, 2, 1),
(81, 0, 4, 6),
(145, 0, 1, 2),
(146, 0, 2, 1),
(147, 0, 4, 7),
(166, 3, 1, 4),
(167, 3, 2, 1),
(168, 3, 4, 7),
(169, 2, 1, 2),
(170, 2, 2, 1),
(171, 2, 4, 6),
(208, 12, 5, 10),
(209, 12, 6, 14),
(210, 12, 7, 18),
(211, 12, 8, 22),
(212, 12, 9, 24),
(218, 14, 5, 10),
(219, 14, 6, 13),
(220, 14, 7, 18),
(221, 14, 8, 22),
(222, 14, 9, 26),
(223, 15, 5, 11),
(224, 15, 6, 13),
(225, 15, 7, 17),
(226, 15, 8, 22),
(227, 15, 9, 26),
(228, 17, 5, 9),
(229, 17, 6, 14),
(230, 17, 7, 17),
(231, 17, 8, 20),
(232, 17, 9, 24),
(233, 18, 5, 10),
(234, 18, 6, 13),
(235, 18, 7, 18),
(236, 18, 8, 22),
(237, 18, 9, 25),
(243, 8, 5, 10),
(244, 8, 6, 13),
(245, 8, 7, 17),
(246, 8, 8, 23),
(247, 8, 9, 25),
(248, 9, 5, 9),
(249, 9, 6, 14),
(250, 9, 7, 16),
(251, 9, 8, 23),
(252, 9, 9, 25),
(253, 11, 5, 8),
(254, 11, 6, 13),
(255, 11, 7, 17),
(256, 11, 8, 22),
(257, 11, 9, 24),
(258, 10, 5, 8),
(259, 10, 6, 13),
(260, 10, 7, 17),
(261, 10, 8, 22),
(262, 10, 9, 24),
(263, 13, 5, 10),
(264, 13, 6, 15),
(265, 13, 7, 16),
(266, 13, 8, 22),
(267, 13, 9, 24),
(270, 19, 11, 30),
(271, 19, 12, 35),
(272, 19, 13, 40),
(273, 19, 14, 44),
(276, 20, 11, 33),
(277, 20, 12, 36),
(278, 20, 13, 39),
(279, 20, 14, 44),
(282, 21, 11, 30),
(283, 21, 12, 36),
(284, 21, 13, 41),
(285, 21, 14, 44),
(288, 22, 11, 32),
(289, 22, 12, 35),
(290, 22, 13, 41),
(291, 22, 14, 44),
(294, 23, 11, 30),
(295, 23, 12, 37),
(296, 23, 13, 40),
(297, 23, 14, 44),
(300, 0, 11, 30),
(301, 0, 12, 35),
(302, 0, 13, 40),
(303, 0, 14, 44),
(304, 0, 18, 56),
(306, 24, 11, 30),
(307, 24, 12, 35),
(308, 24, 13, 40),
(309, 24, 14, 44),
(310, 24, 18, 56),
(312, 25, 11, 33),
(313, 25, 12, 36),
(314, 25, 13, 39),
(315, 25, 14, 44),
(316, 25, 18, 54),
(318, 26, 11, 30),
(319, 26, 12, 36),
(320, 26, 13, 41),
(321, 26, 14, 44),
(322, 26, 18, 54),
(324, 27, 11, 32),
(325, 27, 12, 35),
(326, 27, 13, 41),
(327, 27, 14, 44),
(328, 27, 18, 54),
(330, 28, 11, 30),
(331, 28, 12, 37),
(332, 28, 13, 40),
(333, 28, 14, 44),
(334, 28, 18, 54),
(414, 29, 11, 30),
(415, 29, 12, 35),
(416, 29, 13, 40),
(417, 29, 14, 44),
(418, 29, 18, 56),
(419, 29, 20, 65),
(420, 30, 11, 33),
(421, 30, 12, 36),
(422, 30, 13, 39),
(423, 30, 14, 44),
(424, 30, 18, 54),
(425, 30, 20, 63),
(426, 31, 11, 30),
(427, 31, 12, 36),
(428, 31, 13, 41),
(429, 31, 14, 44),
(430, 31, 18, 54),
(431, 31, 20, 63),
(432, 32, 11, 32),
(433, 32, 12, 35),
(434, 32, 13, 41),
(435, 32, 14, 44),
(436, 32, 18, 54),
(437, 32, 20, 63),
(438, 33, 11, 30),
(439, 33, 12, 37),
(440, 33, 13, 40),
(441, 33, 14, 44),
(442, 33, 18, 54),
(443, 33, 20, 63);

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
(29, 11, '< 700.000', 1),
(30, 11, '701.000 - 1.000.000', 2),
(31, 11, '1.001.000 - 1.200.000', 3),
(32, 11, '1.201.000 - 1.500.000', 4),
(33, 11, '> 1.501.000', 5),
(34, 12, '1 anak', 1),
(35, 12, '2 anak', 2),
(36, 12, '3 anak', 3),
(37, 12, '>4 anak', 4),
(38, 13, 'PNS', 1),
(39, 13, 'Karyawan', 2),
(40, 13, 'Petani', 3),
(41, 13, 'Buruh', 4),
(42, 14, '< 70', 1),
(43, 14, '71 - 80', 2),
(44, 14, '81 - 90', 3),
(45, 14, '91 - 100', 4),
(54, 18, 'Masih Ada Keduanya', 1),
(55, 18, 'Piatu', 2),
(56, 18, 'Yatim', 3),
(57, 18, 'Yatim Piatu', 4),
(62, 20, 'Tidak Ada', 4),
(63, 20, 'Memliki SKTM', 3),
(64, 20, 'Terdaftar PKH', 2),
(65, 20, 'Terdaftar KPS', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD PRIMARY KEY (`id_akun`);

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
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tbl_subkriteria`
--
ALTER TABLE `tbl_subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_alternatif`
--
ALTER TABLE `tbl_alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=444;

--
-- AUTO_INCREMENT for table `tbl_subkriteria`
--
ALTER TABLE `tbl_subkriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
