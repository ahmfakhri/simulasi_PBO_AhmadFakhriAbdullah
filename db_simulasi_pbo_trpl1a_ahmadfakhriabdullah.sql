-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 19, 2026 at 02:32 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simulasi_pbo_trpl1a_ahmadfakhriabdullah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendaftaran`
--

CREATE TABLE `tabel_pendaftaran` (
  `id_pendaftaran` int NOT NULL,
  `nama_calon` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `nilai_ujian` decimal(5,2) NOT NULL,
  `biaya_pendaftaran_dasar` decimal(12,2) NOT NULL,
  `jalur_pendaftaran` enum('Reguler','Prestasi','Kedinasan') NOT NULL,
  `pilihan_prodi` varchar(100) DEFAULT NULL,
  `lokasi_kampus` varchar(100) DEFAULT NULL,
  `jenis_prestasi` varchar(100) DEFAULT NULL,
  `tingkat_prestasi` varchar(100) DEFAULT NULL,
  `sk_ikatan_dinas` varchar(100) DEFAULT NULL,
  `instansi_sponsor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_pendaftaran`
--

INSERT INTO `tabel_pendaftaran` (`id_pendaftaran`, `nama_calon`, `asal_sekolah`, `nilai_ujian`, `biaya_pendaftaran_dasar`, `jalur_pendaftaran`, `pilihan_prodi`, `lokasi_kampus`, `jenis_prestasi`, `tingkat_prestasi`, `sk_ikatan_dinas`, `instansi_sponsor`) VALUES
(1, 'Ahmad Rizky', 'SMAN 1 Jember', 82.50, 250000.00, 'Reguler', 'Teknologi Rekayasa Perangkat Lunak', 'Kampus Jember', NULL, NULL, NULL, NULL),
(2, 'Budi Santoso', 'SMKN 2 Jember', 78.00, 250000.00, 'Reguler', 'Teknologi Informasi', 'Kampus Jember', NULL, NULL, NULL, NULL),
(3, 'Citra Lestari', 'SMAN 3 Banyuwangi', 85.25, 250000.00, 'Reguler', 'Sistem Informasi Bisnis', 'Kampus Banyuwangi', NULL, NULL, NULL, NULL),
(4, 'Dewi Anggraini', 'SMAN 2 Bondowoso', 80.75, 250000.00, 'Reguler', 'Manajemen Informatika', 'Kampus Jember', NULL, NULL, NULL, NULL),
(5, 'Eko Pratama', 'SMKN 1 Lumajang', 76.50, 250000.00, 'Reguler', 'Teknik Komputer', 'Kampus Lumajang', NULL, NULL, NULL, NULL),
(6, 'Farhan Maulana', 'SMAN 1 Situbondo', 88.00, 250000.00, 'Reguler', 'Teknologi Rekayasa Komputer', 'Kampus Situbondo', NULL, NULL, NULL, NULL),
(7, 'Gita Permatasari', 'SMAN 4 Jember', 83.40, 250000.00, 'Reguler', 'Teknologi Rekayasa Perangkat Lunak', 'Kampus Jember', NULL, NULL, NULL, NULL),
(8, 'Hana Safitri', 'SMAN 1 Probolinggo', 91.50, 200000.00, 'Prestasi', NULL, NULL, 'Olimpiade Matematika', 'Kabupaten', NULL, NULL),
(9, 'Ilham Ramadhan', 'SMKN 3 Jember', 89.75, 200000.00, 'Prestasi', NULL, NULL, 'Lomba Kompetensi Siswa', 'Provinsi', NULL, NULL),
(10, 'Jihan Aulia', 'SMAN 2 Jember', 93.20, 200000.00, 'Prestasi', NULL, NULL, 'Debat Bahasa Inggris', 'Nasional', NULL, NULL),
(11, 'Kevin Saputra', 'SMAN 1 Banyuwangi', 90.00, 200000.00, 'Prestasi', NULL, NULL, 'Karya Tulis Ilmiah', 'Provinsi', NULL, NULL),
(12, 'Laras Wulandari', 'SMKN 1 Bondowoso', 87.60, 200000.00, 'Prestasi', NULL, NULL, 'Desain Grafis', 'Kabupaten', NULL, NULL),
(13, 'Mira Oktaviani', 'SMAN 5 Jember', 92.80, 200000.00, 'Prestasi', NULL, NULL, 'Olimpiade Informatika', 'Nasional', NULL, NULL),
(14, 'Naufal Hakim', 'SMAN 1 Lumajang', 88.90, 200000.00, 'Prestasi', NULL, NULL, 'Robotika', 'Provinsi', NULL, NULL),
(15, 'Olivia Putri', 'SMAN 2 Situbondo', 86.75, 150000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SKD-2025-001', 'Dinas Pendidikan'),
(16, 'Panji Nugroho', 'SMKN 2 Banyuwangi', 84.50, 150000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SKD-2025-002', 'Kementerian Perhubungan'),
(17, 'Qori Maulana', 'SMAN 3 Jember', 89.10, 150000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SKD-2025-003', 'Dinas Komunikasi dan Informatika'),
(18, 'Rani Febrianti', 'SMKN 1 Jember', 87.25, 150000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SKD-2025-004', 'Badan Kepegawaian Daerah'),
(19, 'Satria Wijaya', 'SMAN 1 Bondowoso', 85.90, 150000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SKD-2025-005', 'Dinas Kesehatan'),
(20, 'Tiara Maharani', 'SMAN 2 Lumajang', 90.40, 150000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SKD-2025-006', 'Pemerintah Kabupaten Lumajang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  MODIFY `id_pendaftaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
