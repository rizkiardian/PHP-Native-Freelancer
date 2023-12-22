-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 12:52 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_freelance`
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

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_user`, `username`, `password`, `nama`, `no_rek`) VALUES
(3, 'admin', '$2y$10$pxXSWEfK/wPw8NTG8igUCOxssrzTRj6vvleXulaztqVOmnRieT/7m', 'admin', '18278192');

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
  `incoming_msg_id` varchar(255) NOT NULL,
  `outgoing_msg_id` varchar(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `msg_time` timestamp NOT NULL DEFAULT current_timestamp(),
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
  `status` enum('menunggu','revisi','terima') NOT NULL,
  `id_pekerjaan` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil_pekerjaan`
--

INSERT INTO `hasil_pekerjaan` (`id_hasil_pekerjaan`, `tanggal`, `hasil_lampiran`, `keterangan`, `status`, `id_pekerjaan`) VALUES
(1, '2023-12-09 00:00:00', '1_17_hasil_lampiran.jpg', 'Ini bapak sudah bisa', 'menunggu', 17),
(2, '2023-12-09 00:00:00', '2_17_hasil_lampiran.jpg', 'Ini bapak sudah bisa', 'menunggu', 17);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_pekerja`
--

CREATE TABLE `kategori_pekerja` (
  `id_user` int(11) NOT NULL,
  `nama_kategori` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_pekerja`
--

INSERT INTO `kategori_pekerja` (`id_user`, `nama_kategori`) VALUES
(1, 'Design Grafis'),
(2, 'Voice Over'),
(3, 'Digital Marketing'),
(4, 'Video & Animation');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_request`
--

CREATE TABLE `kategori_request` (
  `id` int(20) NOT NULL,
  `nama_kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_request`
--

INSERT INTO `kategori_request` (`id`, `nama_kategori`) VALUES
(1, 'Graphics & Design'),
(2, 'Digital Marketing'),
(3, 'Writing & Translation'),
(4, 'Video & Animation'),
(5, 'Musik & Audio'),
(6, 'Programming'),
(7, 'Bussines'),
(8, 'Photography');

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
(5, '2023-12-08 11:29:37', 'https://github.com/jenssegers/laravel-mongodb', 'terima', 6, 17);

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan_request`
--

CREATE TABLE `pekerjaan_request` (
  `id_pekerjaan` int(20) NOT NULL,
  `nama_pekerjaan` varchar(25) NOT NULL,
  `deskripsi_pekerjaan` varchar(150) NOT NULL,
  `batas_waktu` datetime NOT NULL,
  `tanggal_request` datetime NOT NULL,
  `status` enum('belum dimulai','mulai','revisi','selesai') NOT NULL,
  `harga` int(20) NOT NULL,
  `id_umkm` int(20) NOT NULL,
  `id_kategori` int(20) NOT NULL,
  `id_pekerja_jasa` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pekerjaan_request`
--

INSERT INTO `pekerjaan_request` (`id_pekerjaan`, `nama_pekerjaan`, `deskripsi_pekerjaan`, `batas_waktu`, `tanggal_request`, `status`, `harga`, `id_umkm`, `id_kategori`, `id_pekerja_jasa`) VALUES
(17, 'Video untuk tahunan', 'Memberi tahu bahwa saya akan makan            ', '2023-12-12 00:00:00', '2023-12-08 00:00:00', 'selesai', 2000000, 1, 4, 6),
(19, 'Video Tentang Perpeajakan', 'Membuat video tentang perpajakan      ', '2023-12-15 00:00:00', '2023-12-12 00:00:00', 'belum dimulai', 200000, 1, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pekerja_jasa`
--

CREATE TABLE `pekerja_jasa` (
  `id_user` int(20) NOT NULL,
  `username` varchar(125) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama_pertama` varchar(25) NOT NULL,
  `nama_terakhir` varchar(25) NOT NULL,
  `no_rek` int(20) NOT NULL,
  `bank` enum('BNI','BRI','BCA','BSI','BTN','Mandiri','Sinarmas') NOT NULL,
  `profile_photo` varchar(125) DEFAULT NULL,
  `cv` varchar(225) NOT NULL,
  `status` enum('terima','tolak','menunggu') NOT NULL,
  `id_kategori_pekerja` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pekerja_jasa`
--

INSERT INTO `pekerja_jasa` (`id_user`, `username`, `email`, `password`, `nama_pertama`, `nama_terakhir`, `no_rek`, `bank`, `profile_photo`, `cv`, `status`, `id_kategori_pekerja`) VALUES
(6, 'Dimas', 'dimasdliyaurrahman@gmail.com', '$2y$10$rpxMkNOccpuP29dsOJhaL.c.IitBstRdeukczvbKNtCcvR2MJfQ3u', 'Dimas', 'Dliyaur Rahman', 2147483647, 'BRI', 'Dimas_pp.png', 'Dimas_cv.pdf', 'terima', 3),
(7, 'ismail', 'ismail@gmail.com', '$2y$10$9djSVV2dPFyhu3tc1NU4QeeiGYf5CTOmh2Z.04R/7j/DPRjNh9HjC', 'ismail', 'hada', 2147483647, 'BNI', 'ismail_pp.png', 'ismail_cv.pdf', 'terima', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(20) NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` enum('menunggu','gagal','berhasil') NOT NULL,
  `countdown` datetime NOT NULL,
  `foto` varchar(120) NOT NULL,
  `id_pekerjaan` int(20) NOT NULL,
  `id_admin` int(20) DEFAULT NULL,
  `id_umkm` int(20) NOT NULL,
  `id_pekerja_jasa` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `tanggal`, `status`, `countdown`, `foto`, `id_pekerjaan`, `id_admin`, `id_umkm`, `id_pekerja_jasa`) VALUES
(10, '2023-12-09 00:00:00', 'berhasil', '2023-12-10 00:00:00', 'beras_kencur@gmail.com_5_pembayaran.jpg', 17, NULL, 1, 6);

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

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `range_penilaian`, `deskripsi`, `tanggal`, `id_pekerjaan`) VALUES
(3, 5, 'Sangat membantu mas apalagi saya lagi melakukan bisnis', '2023-12-11 00:00:00', 17);

-- --------------------------------------------------------

--
-- Table structure for table `revisi`
--

CREATE TABLE `revisi` (
  `id_revisi` int(20) NOT NULL,
  `keterangan_revisi` text NOT NULL,
  `id_pekerjaan` int(20) NOT NULL,
  `id_hasil_pekerjaan` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `revisi`
--

INSERT INTO `revisi` (`id_revisi`, `keterangan_revisi`, `id_pekerjaan`, `id_hasil_pekerjaan`) VALUES
(1, 'Kurang bagus dikit mas', 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `umkm`
--

CREATE TABLE `umkm` (
  `id_user` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `NIB` varchar(20) DEFAULT NULL,
  `NPWP` varchar(20) DEFAULT NULL,
  `no_rek` int(20) NOT NULL,
  `profile_photo` varchar(125) DEFAULT NULL,
  `status` enum('terima','tolak','menunggu') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `umkm`
--

INSERT INTO `umkm` (`id_user`, `email`, `password`, `nama_perusahaan`, `NIB`, `NPWP`, `no_rek`, `profile_photo`, `status`) VALUES
(1, 'beras_kencur@gmail.com', '$2y$10$pBk2Kq.95iZ4ND8pA.cttehqRW8jyEmUIg1M2bCc2ezNuWHyNPvaq', 'PT Beras Kencur', '136172186', '81279127', 2147483647, 'PT Beras Kencur_pp.png', 'menunggu'),
(2, 'baik_sekali@gmail.com', '$2y$10$ei4lMvEQc5A1lpJdzok5H.aI7lbIWFJDY5QyxsyuBzELXcjgVvgPq', 'PT Baik sekali', '316721876', '7162781612761', 2147483647, 'PT Baik sekali_pp.png', 'menunggu');

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
  ADD PRIMARY KEY (`id_chat_detail`);

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
-- Indexes for table `kategori_request`
--
ALTER TABLE `kategori_request`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `id_umkm` (`id_umkm`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_pekerja_jasa` (`id_pekerja_jasa`);

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
  ADD KEY `id_umkm` (`id_umkm`),
  ADD KEY `id_pekerja_jasa` (`id_pekerja_jasa`);

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
-- Indexes for table `revisi`
--
ALTER TABLE `revisi`
  ADD PRIMARY KEY (`id_revisi`),
  ADD KEY `id_pekerjaan` (`id_pekerjaan`,`id_hasil_pekerjaan`),
  ADD KEY `id_hasil_pekerjaan` (`id_hasil_pekerjaan`);

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
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id_hasil_pekerjaan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori_request`
--
ALTER TABLE `kategori_request`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `menawarkan_jasa`
--
ALTER TABLE `menawarkan_jasa`
  MODIFY `id_menawar` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pekerjaan_request`
--
ALTER TABLE `pekerjaan_request`
  MODIFY `id_pekerjaan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pekerja_jasa`
--
ALTER TABLE `pekerja_jasa`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `revisi`
--
ALTER TABLE `revisi`
  MODIFY `id_revisi` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `umkm`
--
ALTER TABLE `umkm`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`id_umkm`) REFERENCES `umkm` (`id_user`);

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
  ADD CONSTRAINT `menawarkan_jasa_ibfk_2` FOREIGN KEY (`id_pekerjaan`) REFERENCES `pekerjaan_request` (`id_pekerjaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pekerjaan_request`
--
ALTER TABLE `pekerjaan_request`
  ADD CONSTRAINT `pekerjaan_request_ibfk_1` FOREIGN KEY (`id_umkm`) REFERENCES `umkm` (`id_user`),
  ADD CONSTRAINT `pekerjaan_request_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_request` (`id`),
  ADD CONSTRAINT `pekerjaan_request_ibfk_3` FOREIGN KEY (`id_pekerja_jasa`) REFERENCES `pekerja_jasa` (`id_user`);

--
-- Constraints for table `pekerja_jasa`
--
ALTER TABLE `pekerja_jasa`
  ADD CONSTRAINT `pekerja_jasa_ibfk_1` FOREIGN KEY (`id_kategori_pekerja`) REFERENCES `kategori_pekerja` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pekerjaan`) REFERENCES `pekerjaan_request` (`id_pekerjaan`),
  ADD CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`id_umkm`) REFERENCES `umkm` (`id_user`),
  ADD CONSTRAINT `pembayaran_ibfk_4` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_user`),
  ADD CONSTRAINT `pembayaran_ibfk_5` FOREIGN KEY (`id_pekerja_jasa`) REFERENCES `pekerja_jasa` (`id_user`);

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

--
-- Constraints for table `revisi`
--
ALTER TABLE `revisi`
  ADD CONSTRAINT `revisi_ibfk_2` FOREIGN KEY (`id_hasil_pekerjaan`) REFERENCES `hasil_pekerjaan` (`id_hasil_pekerjaan`) ON DELETE CASCADE,
  ADD CONSTRAINT `revisi_ibfk_3` FOREIGN KEY (`id_pekerjaan`) REFERENCES `pekerjaan_request` (`id_pekerjaan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
