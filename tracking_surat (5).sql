-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2023 at 03:53 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tracking_surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `disposisi_item`
--

CREATE TABLE `disposisi_item` (
  `disposisi_id` varchar(30) NOT NULL,
  `A17` tinyint(2) NOT NULL,
  `A18` tinyint(2) NOT NULL,
  `A19` tinyint(2) NOT NULL,
  `A20` tinyint(2) NOT NULL,
  `A21` tinyint(2) NOT NULL,
  `A22` tinyint(2) NOT NULL,
  `A23` tinyint(2) NOT NULL,
  `A24` tinyint(2) NOT NULL,
  `A25` tinyint(2) NOT NULL,
  `A26` tinyint(2) NOT NULL,
  `A27` tinyint(2) NOT NULL,
  `A28` tinyint(2) NOT NULL,
  `A29` tinyint(2) NOT NULL,
  `A30` tinyint(2) NOT NULL,
  `A31` tinyint(2) NOT NULL,
  `A32` tinyint(2) NOT NULL,
  `A33` tinyint(2) NOT NULL,
  `A34` tinyint(2) NOT NULL,
  `F17` tinyint(2) NOT NULL,
  `F19` tinyint(2) NOT NULL,
  `F20` tinyint(2) NOT NULL,
  `F21` tinyint(2) NOT NULL,
  `F22` tinyint(2) NOT NULL,
  `F23` tinyint(2) NOT NULL,
  `F24` tinyint(2) NOT NULL,
  `F25` tinyint(2) NOT NULL,
  `F26` tinyint(2) NOT NULL,
  `F27` tinyint(2) NOT NULL,
  `F28` tinyint(2) NOT NULL,
  `F29` tinyint(2) NOT NULL,
  `F30` tinyint(2) NOT NULL,
  `F31` tinyint(2) NOT NULL,
  `F32` tinyint(2) NOT NULL,
  `F33` tinyint(2) NOT NULL,
  `F34` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `disposisi_item`
--

INSERT INTO `disposisi_item` (`disposisi_id`, `A17`, `A18`, `A19`, `A20`, `A21`, `A22`, `A23`, `A24`, `A25`, `A26`, `A27`, `A28`, `A29`, `A30`, `A31`, `A32`, `A33`, `A34`, `F17`, `F19`, `F20`, `F21`, `F22`, `F23`, `F24`, `F25`, `F26`, `F27`, `F28`, `F29`, `F30`, `F31`, `F32`, `F33`, `F34`) VALUES
('20231690113262', 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('20231690114678', 1, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('20231690119648', 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_aktivitas`
--

CREATE TABLE `tb_aktivitas` (
  `id_aktivitas` int(11) NOT NULL,
  `surat_id` varchar(50) NOT NULL,
  `penerima` varchar(50) NOT NULL,
  `tanggal_aktivitas` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_aktivitas`
--

INSERT INTO `tb_aktivitas` (`id_aktivitas`, `surat_id`, `penerima`, `tanggal_aktivitas`) VALUES
(1, 'SURAT_101020230717', 'intel', '2023-07-17 13:54:00'),
(2, 'SURAT_100120230717', 'persuratan', '2023-07-17 14:48:00'),
(3, 'SURAT_101120230718', 'pm', '2023-07-18 13:58:00'),
(4, 'SURAT_100320230719', 'asisten pidana militer', '2023-07-19 13:56:00'),
(5, 'SURAT_414120230721', 'koordinator', '2023-07-21 21:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_disposisi`
--

CREATE TABLE `tb_disposisi` (
  `id_disposisi` varchar(30) NOT NULL,
  `nomor_agenda` varchar(255) DEFAULT NULL,
  `tanggal_penerimaan` date DEFAULT NULL,
  `tanggal_surat` date DEFAULT NULL,
  `dari` varchar(255) DEFAULT NULL,
  `ringkasan_surat` text DEFAULT NULL,
  `lampiran` text DEFAULT NULL,
  `tanggal_penyelesaian` date DEFAULT NULL,
  `tingkat_keamanan` varchar(255) DEFAULT NULL,
  `disposisi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`disposisi`)),
  `diteruskan_kepada` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_disposisi`
--

INSERT INTO `tb_disposisi` (`id_disposisi`, `nomor_agenda`, `tanggal_penerimaan`, `tanggal_surat`, `dari`, `ringkasan_surat`, `lampiran`, `tanggal_penyelesaian`, `tingkat_keamanan`, `disposisi`, `diteruskan_kepada`) VALUES
('20231690113262', 'surat1234', '2023-07-23', '2023-07-23', 'rijal', 'testing', 'testing', '2023-07-30', 'SR', NULL, NULL),
('20231690114678', 'surat0921', '2023-07-24', '2023-07-21', 'Kapolda', 'Berkas Penting', 'Berkas Penting', '2023-07-26', 'SR', NULL, NULL),
('20231690119648', 'surat0924', '2023-07-20', '2023-07-18', 'BUMN', 'Penting', 'Penting', '2023-07-26', 'T', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `level_access` varchar(255) NOT NULL,
  `terdaftar` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_user`, `username`, `password`, `nama`, `status`, `level_access`, `terdaftar`) VALUES
(10, 'rijal', '$2y$10$aes5s5n5YSyXAXvYxSEKRO6fJYH0EFFUmOLAvfTz6konMPRuJisJW', 'rijal', '', 'piket', ''),
(11, 'akri', '$2y$10$AUuoSv04Il8ac1FVxTPsguMLG6992QtkPD3NldV8zzmulPJCYTKWi', 'akri', '', 'persuratan', ''),
(17, 'admin', '$2y$10$QmwT30viiY540kRMIY3zM.28hwgFYF8hKWFacwZCxwdZeEuxkLJF6', 'admin', '', 'admin', ''),
(18, 'admin', '$2y$10$QmwT30viiY540kRMIY3zM.28hwgFYF8hKWFacwZCxwdZeEuxkLJF6', 'admin', '', 'admin', ''),
(23, 'chairani', '$2y$10$aMHYI7v2U50Sin9QJFuoWeH3o2iCq3XJYcgKtQQhg7BYfhumsbs.q', 'chairani', '', 'persuratan', ''),
(24, 'john', '$2y$10$cQSG8FwbArYFwI86crsYc.sJ0.0cMwHObct8JW.TwrcMwDgLpIje6', 'john', '', 'pimpinan', ''),
(25, 'master', '$2y$10$NONF.UvjhXW9B9fsyRWk6ekvxf2PZOa/Lw02xcy.qO2LKzf37vUKO', 'master', '', 'admin', ''),
(26, 'zia', '$2y$10$5ISK4QT3N30oeEhhSKQx5uUsVmW6x5lkofIJAYTNKcfDy4ZLts3.m', 'ziaul kamal', 'Aktif', 'pimpinan', '2023-07-09'),
(28, 'super', '$2y$10$h/Ej5DW3MQ8dTp37bH1wU.MewzNFw0EjoNHtTGBj1vPqoSy2EsBgG', 'super', 'Aktif', 'admin', '2023-07-10'),
(29, 'kamal', '$2y$10$Q5fKccfsNQJa99wQ.o6A4O90pqOTaNMduxHuwlVT/KM8VHBPwZNZ.', 'kamal', 'Aktif', 'piket', '2023-07-11'),
(34, 'aulia', '$2y$10$hsYqoMoxNx9hnuj2D.olce3h1DPKCcOQLMCUslfBpDSjtdkpmH1rm', 'aulia', 'Aktif', 'piket', '2023-07-15'),
(35, 'dziya', '$2y$10$//csotUH/qrP7hTRX5F4Ue16LOSEv3VTPgPHNUBiX.7.4bTeouP7K', 'dziya', 'Aktif', 'persuratan', '2023-07-15'),
(36, 'ronald', '$2y$10$mSBU.VzQLBD6MiFefGdvBuCYLITkufou.ZfGZBsdEE8OjCYJIFHcu', 'ronald', 'Aktif', 'persuratan', '2023-07-21');

-- --------------------------------------------------------

--
-- Table structure for table `tb_persuratan`
--

CREATE TABLE `tb_persuratan` (
  `tiket_unique` varchar(50) NOT NULL,
  `id_persuratan` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kode_status_persuratan` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_piket`
--

CREATE TABLE `tb_piket` (
  `tiket_unique` varchar(50) NOT NULL,
  `id_piket` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kode_status_piket` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pimpinan`
--

CREATE TABLE `tb_pimpinan` (
  `tiket_unique` varchar(50) NOT NULL,
  `id_pimpinan` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kode_status_pimpinan` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `unique_tiket` varchar(50) NOT NULL,
  `surat_id` varchar(50) NOT NULL,
  `piket` tinyint(2) NOT NULL,
  `persuratan` tinyint(2) NOT NULL,
  `pimpinan` tinyint(2) NOT NULL,
  `tembusan` varchar(255) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `notifikasi` varchar(255) NOT NULL,
  `tanggal_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`unique_tiket`, `surat_id`, `piket`, `persuratan`, `pimpinan`, `tembusan`, `tujuan`, `notifikasi`, `tanggal_update`) VALUES
('1689576225', 'SURAT_100820230729', 1, 0, 0, '', '', '', '2023-07-29'),
('1689576901', 'SURAT_101020230717', 1, 0, 0, '', 'intel', '', '2023-07-17'),
('1689580141', 'SURAT_100120230717', 1, 0, 0, '', 'persuratan', '', '2023-07-17'),
('1689663555', 'SURAT_101120230718', 1, 0, 0, '', 'pm', '', '2023-07-18'),
('1689749774', 'SURAT_100320230719', 1, 0, 0, '', 'asisten pidana militer', '', '2023-07-19'),
('1689949248', 'SURAT_414120230721', 1, 0, 0, '', 'koordinator', '', '2023-07-21');

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat`
--

CREATE TABLE `tb_surat` (
  `id_surat` varchar(50) NOT NULL,
  `nomor_surat` varchar(255) NOT NULL,
  `judul_surat` varchar(255) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `keterangan_surat` text NOT NULL,
  `lampiran` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_surat`
--

INSERT INTO `tb_surat` (`id_surat`, `nomor_surat`, `judul_surat`, `tanggal_surat`, `keterangan_surat`, `lampiran`) VALUES
('SURAT_100120230717', '1001', 'Presentasi', '2023-07-17', 'Template presentasi', 0x433a5c78616d70705c6874646f63735c4170702d53697061735c6c616d706972616e2f47616f6c657220c2b720536c696465734361726e6976616c2e70707478),
('SURAT_100320230719', '1003', 'MongoDB Query', '2023-07-19', 'Belajar MongoDB', 0x433a5c78616d70705c6874646f63735c4170702d53697061735c6c616d706972616e2f3036204d6f6e676f444220517565726965732e706466),
('SURAT_101020230717', '1010', 'Portal data USK', '2023-07-17', 'Portal data USK 2023', 0x433a5c78616d70705c6874646f63735c4170702d53697061735c6c616d706972616e2f506f7274616c20446174612020556e697665727369746173205379696168204b75616c61202832292e786c7378),
('SURAT_101120230718', '1011', 'Tugas Pemograman I', '2023-07-18', 'testing pertama', 0x433a5c78616d70705c6874646f63735c4170702d53697061735c6c616d706972616e2f547567617320312d50656d726f6772616d616e5f322e706466),
('SURAT_414120230721', '4141', 'Linux', '2023-07-21', 'hello', 0x433a5c78616d70702d38315c6874646f63735c4170702d53697061735c6c616d706972616e2f736572746966696b61745f6f73696d7075732e706466);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposisi_item`
--
ALTER TABLE `disposisi_item`
  ADD PRIMARY KEY (`disposisi_id`);

--
-- Indexes for table `tb_aktivitas`
--
ALTER TABLE `tb_aktivitas`
  ADD PRIMARY KEY (`id_aktivitas`);

--
-- Indexes for table `tb_disposisi`
--
ALTER TABLE `tb_disposisi`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_persuratan`
--
ALTER TABLE `tb_persuratan`
  ADD PRIMARY KEY (`id_persuratan`),
  ADD UNIQUE KEY `tiket_unique` (`tiket_unique`);

--
-- Indexes for table `tb_piket`
--
ALTER TABLE `tb_piket`
  ADD PRIMARY KEY (`id_piket`),
  ADD UNIQUE KEY `tiket_unique` (`tiket_unique`);

--
-- Indexes for table `tb_pimpinan`
--
ALTER TABLE `tb_pimpinan`
  ADD PRIMARY KEY (`id_pimpinan`),
  ADD UNIQUE KEY `tiket_unique` (`tiket_unique`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD UNIQUE KEY `unique_tiket` (`unique_tiket`);

--
-- Indexes for table `tb_surat`
--
ALTER TABLE `tb_surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_aktivitas`
--
ALTER TABLE `tb_aktivitas`
  MODIFY `id_aktivitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tb_persuratan`
--
ALTER TABLE `tb_persuratan`
  MODIFY `id_persuratan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_piket`
--
ALTER TABLE `tb_piket`
  MODIFY `id_piket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pimpinan`
--
ALTER TABLE `tb_pimpinan`
  MODIFY `id_pimpinan` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
