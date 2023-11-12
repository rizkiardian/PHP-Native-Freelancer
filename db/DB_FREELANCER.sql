-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2023 at 02:21 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_user` int(20) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `no_rek` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id_chat` int(20) NOT NULL,
  `id_umkm` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chat_detail`
--

CREATE TABLE `chat_detail` (
  `id_chat_detail` int(20) NOT NULL,
  `isi` varchar(20) NOT NULL,
  `waktu` datetime NOT NULL,
  `id_chat` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hasil_pekerjaan`
--

CREATE TABLE `hasil_pekerjaan` (
  `id_hasil_pekerjaan` int(20) NOT NULL,
  `tanggal` datetime NOT NULL,
  `hasil_lampiran` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `status` enum('revisi','terima') NOT NULL,
  `id_pekerjaan` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_pekerja`
--

CREATE TABLE `kategori_pekerja` (
  `id_user` int(20) NOT NULL,
  `nama_kategori` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_rek` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_pekerja`
--

INSERT INTO `kategori_pekerja` (`id_user`, `nama_kategori`, `password`, `no_rek`) VALUES
(1, 'Designer', 'designer123', '1203219191');

-- --------------------------------------------------------

--
-- Table structure for table `menawarkan_jasa`
--

CREATE TABLE `menawarkan_jasa` (
  `id_menawar` int(20) NOT NULL,
  `tanggal` datetime NOT NULL,
  `fortofolio` varchar(100) NOT NULL,
  `status` enum('tolak','terima','menunggu') NOT NULL,
  `id_pekerja_jasa` int(20) NOT NULL,
  `id_pekerjaan` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menawarkan_jasa`
--

INSERT INTO `menawarkan_jasa` (`id_menawar`, `tanggal`, `fortofolio`, `status`, `id_pekerja_jasa`, `id_pekerjaan`) VALUES
(1, '2023-11-30 00:00:00', 'a', 'terima', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan_request`
--

CREATE TABLE `pekerjaan_request` (
  `id_pekerjaan` int(20) NOT NULL,
  `nama_pekerjaan` varchar(25) NOT NULL,
  `deskripsi_pekerjaan` varchar(150) NOT NULL,
  `batas_waktu` datetime NOT NULL,
  `foto` varchar(250) NOT NULL,
  `status` enum('belum dimulai','mulai','revisi','selesai') NOT NULL,
  `harga` int(20) NOT NULL,
  `id_umkm` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pekerjaan_request`
--

INSERT INTO `pekerjaan_request` (`id_pekerjaan`, `nama_pekerjaan`, `deskripsi_pekerjaan`, `batas_waktu`, `foto`, `status`, `harga`, `id_umkm`) VALUES
(1, 'Desain Logo', 'Desain Logo PT Gacor', '2023-11-30 00:00:00', '', 'mulai', 15000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pekerja_jasa`
--

CREATE TABLE `pekerja_jasa` (
  `id_user` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama_pertama` varchar(25) NOT NULL,
  `nama_terakhir` varchar(25) NOT NULL,
  `no_rek` int(20) NOT NULL,
  `cv` varchar(250) NOT NULL,
  `status` enum('terima','tolak','menunggu') NOT NULL,
  `id_kategori_pekerja` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pekerja_jasa`
--

INSERT INTO `pekerja_jasa` (`id_user`, `email`, `password`, `nama_pertama`, `nama_terakhir`, `no_rek`, `cv`, `status`, `id_kategori_pekerja`) VALUES
(1, 'blabla@gmail.com', 'admin123', 'RIzki', 'Khoirifa', 1203219191, 'a', 'terima', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(20) NOT NULL,
  `tanngal` datetime NOT NULL,
  `status` enum('menunggu','gagal','berhasil') NOT NULL,
  `countdown` datetime NOT NULL,
  `foto` blob NOT NULL,
  `id_pekerjaan` int(20) NOT NULL,
  `id_admin` int(20) NOT NULL,
  `id_umkm` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penghasilan`
--

CREATE TABLE `penghasilan` (
  `id_penghasilan` int(20) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('belum','lunas') NOT NULL,
  `pemasukan` decimal(30,0) NOT NULL,
  `id_pembayaran` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(20) NOT NULL,
  `range_penilaian` int(10) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_pekerjaan` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `umkm`
--

CREATE TABLE `umkm` (
  `id_user` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `NIB` int(20) NOT NULL,
  `NPWP` int(20) NOT NULL,
  `no_rek` int(20) NOT NULL,
  `status` enum('terima','tolak','menunggu') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `umkm`
--

INSERT INTO `umkm` (`id_user`, `email`, `password`, `nama_perusahaan`, `NIB`, `NPWP`, `no_rek`, `status`) VALUES
(1, 'blabla@gmail.com', 'admin123', 'PT Gacor', 12302102, 2131203292, 1203219191, 'terima');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`),
  ADD KEY `id_umkm` (`id_umkm`);

--
-- Indexes for table `chat_detail`
--
ALTER TABLE `chat_detail`
  ADD PRIMARY KEY (`id_chat_detail`),
  ADD KEY `id_chat` (`id_chat`);

--
-- Indexes for table `hasil_pekerjaan`
--
ALTER TABLE `hasil_pekerjaan`
  ADD PRIMARY KEY (`id_hasil_pekerjaan`),
  ADD KEY `id_pekerjaan` (`id_pekerjaan`);

--
-- Indexes for table `kategori_pekerja`
--
ALTER TABLE `kategori_pekerja`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `menawarkan_jasa`
--
ALTER TABLE `menawarkan_jasa`
  ADD PRIMARY KEY (`id_menawar`),
  ADD KEY `id_pekerja_jasa` (`id_pekerja_jasa`),
  ADD KEY `id_pekerjaan` (`id_pekerjaan`);

--
-- Indexes for table `pekerjaan_request`
--
ALTER TABLE `pekerjaan_request`
  ADD PRIMARY KEY (`id_pekerjaan`),
  ADD KEY `id_umkm` (`id_umkm`);

--
-- Indexes for table `pekerja_jasa`
--
ALTER TABLE `pekerja_jasa`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_kategori_pekerja` (`id_kategori_pekerja`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_pekerjaan` (`id_pekerjaan`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_umkm` (`id_umkm`);

--
-- Indexes for table `penghasilan`
--
ALTER TABLE `penghasilan`
  ADD KEY `id_pembayaran` (`id_pembayaran`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `id_pekerjaan` (`id_pekerjaan`);

--
-- Indexes for table `umkm`
--
ALTER TABLE `umkm`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chat` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_detail`
--
ALTER TABLE `chat_detail`
  MODIFY `id_chat_detail` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hasil_pekerjaan`
--
ALTER TABLE `hasil_pekerjaan`
  MODIFY `id_hasil_pekerjaan` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_pekerja`
--
ALTER TABLE `kategori_pekerja`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menawarkan_jasa`
--
ALTER TABLE `menawarkan_jasa`
  MODIFY `id_menawar` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pekerjaan_request`
--
ALTER TABLE `pekerjaan_request`
  MODIFY `id_pekerjaan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pekerja_jasa`
--
ALTER TABLE `pekerja_jasa`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `umkm`
--
ALTER TABLE `umkm`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`id_umkm`) REFERENCES `umkm` (`id_user`);

--
-- Constraints for table `chat_detail`
--
ALTER TABLE `chat_detail`
  ADD CONSTRAINT `chat_detail_ibfk_1` FOREIGN KEY (`id_chat`) REFERENCES `chat` (`id_chat`);

--
-- Constraints for table `hasil_pekerjaan`
--
ALTER TABLE `hasil_pekerjaan`
  ADD CONSTRAINT `hasil_pekerjaan_ibfk_1` FOREIGN KEY (`id_pekerjaan`) REFERENCES `pekerjaan_request` (`id_pekerjaan`);

--
-- Constraints for table `menawarkan_jasa`
--
ALTER TABLE `menawarkan_jasa`
  ADD CONSTRAINT `menawarkan_jasa_ibfk_1` FOREIGN KEY (`id_pekerja_jasa`) REFERENCES `pekerja_jasa` (`id_user`),
  ADD CONSTRAINT `pekerjaan` FOREIGN KEY (`id_pekerjaan`) REFERENCES `pekerjaan_request` (`id_pekerjaan`);

--
-- Constraints for table `pekerjaan_request`
--
ALTER TABLE `pekerjaan_request`
  ADD CONSTRAINT `pekerjaan_request_ibfk_1` FOREIGN KEY (`id_umkm`) REFERENCES `umkm` (`id_user`);

--
-- Constraints for table `pekerja_jasa`
--
ALTER TABLE `pekerja_jasa`
  ADD CONSTRAINT `pekerja_jasa_ibfk_1` FOREIGN KEY (`id_kategori_pekerja`) REFERENCES `kategori_pekerja` (`id_user`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pekerjaan`) REFERENCES `pekerjaan_request` (`id_pekerjaan`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_user`),
  ADD CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`id_umkm`) REFERENCES `umkm` (`id_user`);

--
-- Constraints for table `penghasilan`
--
ALTER TABLE `penghasilan`
  ADD CONSTRAINT `penghasilan_ibfk_1` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id_pembayaran`);

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`id_pekerjaan`) REFERENCES `pekerjaan_request` (`id_pekerjaan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
