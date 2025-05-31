-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 27, 2025 at 04:00 AM
-- Server version: 10.11.10-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u861878335_db_penyirman_`
--

-- --------------------------------------------------------

--
-- Table structure for table `cek`
--

CREATE TABLE `cek` (
  `id` int(11) NOT NULL,
  `kelembaban` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL COMMENT 'ID unik untuk setiap admin',
  `nama` varchar(100) NOT NULL COMMENT 'Nama lengkap admin',
  `username` varchar(50) NOT NULL COMMENT 'Username yang digunakan untuk login',
  `password` varchar(255) NOT NULL COMMENT 'Password yang sudah di-hash untuk keamanan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabel untuk menyimpan data admin sistem';

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Siti Aisyah', 'aisyah', '0192023a7bbd73250516f069df18b500'),
(2, 'Dewi Lestari', 'dewi', '0192023a7bbd73250516f069df18b500'),
(3, 'Nurul Hidayah', 'nurul', '0192023a7bbd73250516f069df18b500'),
(4, 'Intan Permata', 'intan', '0192023a7bbd73250516f069df18b500'),
(5, 'Fitriani Zahra', 'fitri', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `tb_log_aksi`
--

CREATE TABLE `tb_log_aksi` (
  `id` int(11) NOT NULL COMMENT 'ID unik log aksi',
  `lokasi_id` int(11) NOT NULL COMMENT 'ID lokasi dari tb_lokasi',
  `jenis_aksi` enum('penyiraman','pemupukan') NOT NULL COMMENT 'Jenis aksi yang dilakukan',
  `sumber_aksi` enum('penjadwalan','sensor') NOT NULL COMMENT 'Sumber pemicu aksi',
  `waktu_aksi` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Waktu aksi dilakukan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Log aksi penyiraman/pemupukan berdasarkan sumber';

-- --------------------------------------------------------

--
-- Table structure for table `tb_lokasi`
--

CREATE TABLE `tb_lokasi` (
  `id` int(11) NOT NULL COMMENT 'ID unik untuk setiap lokasi',
  `nama` varchar(100) NOT NULL COMMENT 'Nama lokasi',
  `jona` varchar(50) NOT NULL COMMENT 'Kode lokasi yang digunakan sebagai identitas',
  `deskripsi` text DEFAULT NULL COMMENT 'Deskripsi tambahan mengenai lokasi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabel untuk menyimpan data lokasi';

--
-- Dumping data for table `tb_lokasi`
--

INSERT INTO `tb_lokasi` (`id`, `nama`, `jona`, `deskripsi`) VALUES
(20, 'Cabai jona satu', 'JONA-C0001', 'Cabai jona satu ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjadwalan`
--

CREATE TABLE `tb_penjadwalan` (
  `id` int(11) NOT NULL COMMENT 'ID unik jadwal',
  `lokasi_id` int(11) NOT NULL COMMENT 'Lokasi target penyiraman/pemupukan',
  `type` enum('penyiraman','pemupukan') NOT NULL DEFAULT 'penyiraman' COMMENT 'Jenis jadwal',
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') DEFAULT NULL COMMENT 'Jadwal mingguan',
  `tanggal` date DEFAULT NULL COMMENT 'Jadwal sekali jalan',
  `waktu` time NOT NULL COMMENT 'Waktu pelaksanaan',
  `is_aktif` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Status aktif atau tidak',
  `keterangan` text DEFAULT NULL COMMENT 'Catatan tambahan',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabel jadwal penyiraman atau pemupukan berdasarkan waktu';

--
-- Dumping data for table `tb_penjadwalan`
--

INSERT INTO `tb_penjadwalan` (`id`, `lokasi_id`, `type`, `hari`, `tanggal`, `waktu`, `is_aktif`, `keterangan`, `created_at`, `updated_at`) VALUES
(13, 20, 'pemupukan', NULL, '2025-05-10', '07:00:00', 1, 'Pemupukan satu kali untuk tanaman C', '2025-05-04 05:35:09', '2025-05-04 05:35:09'),
(14, 20, 'penyiraman', 'Jumat', NULL, '05:45:00', 1, 'Penyiraman cepat sebelum matahari terbit', '2025-05-04 05:35:09', '2025-05-04 05:35:09'),
(15, 20, 'pemupukan', NULL, '2025-05-15', '08:00:00', 0, 'Jadwal pemupukan non-aktif sementara', '2025-05-04 05:35:09', '2025-05-04 05:35:09'),
(36, 20, 'penyiraman', 'Rabu', '2025-05-14', '11:18:00', 0, 'x', '2025-05-14 04:14:24', '2025-05-14 04:14:24'),
(47, 20, 'penyiraman', 'Senin', NULL, '20:05:00', 1, 'Penyiraman malam Senin', '2025-05-26 13:08:43', '2025-05-26 13:08:43'),
(48, 20, 'pemupukan', 'Selasa', NULL, '20:07:00', 1, 'Pemupukan ringan Selasa', '2025-05-26 13:08:43', '2025-05-26 13:08:43'),
(49, 20, 'penyiraman', 'Rabu', NULL, '20:09:00', 1, 'Penyiraman malam Rabu', '2025-05-26 13:08:43', '2025-05-26 13:08:43'),
(50, 20, 'penyiraman', 'Kamis', NULL, '20:11:00', 1, 'Penyiraman lanjut Kamis', '2025-05-26 13:08:43', '2025-05-26 13:08:43'),
(51, 20, 'pemupukan', 'Jumat', NULL, '20:13:00', 1, 'Pemupukan malam Jumat', '2025-05-26 13:08:43', '2025-05-26 13:08:43'),
(52, 20, 'penyiraman', 'Sabtu', NULL, '20:15:00', 1, 'Penyiraman Sabtu malam', '2025-05-26 13:08:43', '2025-05-26 13:08:43'),
(53, 20, 'pemupukan', 'Minggu', NULL, '20:17:00', 1, 'Pemupukan akhir pekan', '2025-05-26 13:08:43', '2025-05-26 13:08:43'),
(54, 20, 'penyiraman', 'Senin', NULL, '20:19:00', 1, 'Penyiraman ekstra Senin', '2025-05-26 13:08:43', '2025-05-26 13:08:43'),
(55, 20, 'pemupukan', 'Selasa', NULL, '20:21:00', 1, 'Pemupukan Selasa malam', '2025-05-26 13:08:43', '2025-05-26 13:08:43'),
(56, 20, 'penyiraman', 'Rabu', NULL, '20:23:00', 1, 'Penyiraman malam akhir', '2025-05-26 13:08:43', '2025-05-26 13:08:43'),
(57, 20, 'penyiraman', 'Senin', NULL, '20:27:00', 1, 'Penyiraman malam Senin', '2025-05-26 13:28:27', '2025-05-26 13:28:27'),
(58, 20, 'pemupukan', 'Selasa', NULL, '20:30:00', 1, 'Pemupukan malam Selasa', '2025-05-26 13:28:27', '2025-05-26 13:28:27'),
(59, 20, 'penyiraman', 'Rabu', NULL, '20:33:00', 1, 'Penyiraman malam Rabu', '2025-05-26 13:28:27', '2025-05-26 13:28:27'),
(60, 20, 'pemupukan', 'Kamis', NULL, '20:36:00', 1, 'Pemupukan malam Kamis', '2025-05-26 13:28:27', '2025-05-26 13:28:27'),
(61, 20, 'penyiraman', 'Jumat', NULL, '20:39:00', 1, 'Penyiraman malam Jumat', '2025-05-26 13:28:27', '2025-05-26 13:28:27'),
(62, 20, 'pemupukan', 'Sabtu', NULL, '20:42:00', 1, 'Pemupukan malam Sabtu', '2025-05-26 13:28:27', '2025-05-26 13:28:27'),
(63, 20, 'penyiraman', 'Minggu', NULL, '20:45:00', 1, 'Penyiraman malam Minggu', '2025-05-26 13:28:27', '2025-05-26 13:28:27'),
(64, 20, 'pemupukan', 'Senin', NULL, '20:48:00', 1, 'Pemupukan malam Senin', '2025-05-26 13:28:27', '2025-05-26 13:28:27'),
(65, 20, 'penyiraman', 'Selasa', NULL, '20:51:00', 1, 'Penyiraman malam Selasa', '2025-05-26 13:28:27', '2025-05-26 13:28:27'),
(66, 20, 'pemupukan', 'Rabu', NULL, '20:54:00', 1, 'Pemupukan malam Rabu', '2025-05-26 13:28:27', '2025-05-26 13:28:27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_soil_moisture`
--

CREATE TABLE `tb_soil_moisture` (
  `id` int(11) NOT NULL COMMENT 'ID unik untuk setiap catatan kelembaban',
  `lokasi_id` int(11) NOT NULL COMMENT 'ID lokasi dari tb_lokasi',
  `kelembaban` int(11) NOT NULL COMMENT 'Nilai kelembaban tanah (dalam persen atau satuan ADC)',
  `waktu_pencatatan` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Waktu saat data dicatat'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabel untuk menyimpan data kelembaban tanah berdasarkan lokasi';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cek`
--
ALTER TABLE `cek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_log_aksi`
--
ALTER TABLE `tb_log_aksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lokasi_id` (`lokasi_id`);

--
-- Indexes for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penjadwalan`
--
ALTER TABLE `tb_penjadwalan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lokasi_id` (`lokasi_id`);

--
-- Indexes for table `tb_soil_moisture`
--
ALTER TABLE `tb_soil_moisture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lokasi_id` (`lokasi_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cek`
--
ALTER TABLE `cek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID unik untuk setiap admin', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_log_aksi`
--
ALTER TABLE `tb_log_aksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID unik log aksi';

--
-- AUTO_INCREMENT for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID unik untuk setiap lokasi', AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_penjadwalan`
--
ALTER TABLE `tb_penjadwalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID unik jadwal', AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tb_soil_moisture`
--
ALTER TABLE `tb_soil_moisture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID unik untuk setiap catatan kelembaban';

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_log_aksi`
--
ALTER TABLE `tb_log_aksi`
  ADD CONSTRAINT `fk_log_aksi_lokasi_min` FOREIGN KEY (`lokasi_id`) REFERENCES `tb_lokasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_penjadwalan`
--
ALTER TABLE `tb_penjadwalan`
  ADD CONSTRAINT `tb_penjadwalan_ibfk_1` FOREIGN KEY (`lokasi_id`) REFERENCES `tb_lokasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_soil_moisture`
--
ALTER TABLE `tb_soil_moisture`
  ADD CONSTRAINT `fk_soil_moisture_lokasi` FOREIGN KEY (`lokasi_id`) REFERENCES `tb_lokasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
