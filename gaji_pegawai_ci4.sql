-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2024 at 02:23 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gaji_pegawai_ci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_gaji`
--

CREATE TABLE `data_gaji` (
  `id_gaji` int(11) NOT NULL,
  `bulan` int(15) NOT NULL,
  `tahun` int(15) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama_pegawai` varchar(225) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `gaji_pokok` int(50) NOT NULL,
  `tj_transport` int(50) NOT NULL,
  `uang_makan` int(50) NOT NULL,
  `pbpjsk` int(50) NOT NULL,
  `pbpjskk` int(50) NOT NULL,
  `pph` int(50) NOT NULL,
  `total_gaji` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_gaji`
--

INSERT INTO `data_gaji` (`id_gaji`, `bulan`, `tahun`, `nik`, `nama_pegawai`, `jenis_kelamin`, `nama_jabatan`, `gaji_pokok`, `tj_transport`, `uang_makan`, `pbpjsk`, `pbpjskk`, `pph`, `total_gaji`) VALUES
(161, 1, 2024, '628376473472', 'rina', 'Perempuan', 'ceo', 3000000, 30000000, 3000000, 150000, 150000, 0, 35700000),
(162, 1, 2024, '567892431432', 'joni', 'Laki-Laki', 'manager', 100000000, 300000, 4000000, 5000000, 5000000, 0, 94300000),
(171, 2, 2024, '628376473472', 'rina', 'Perempuan', 'ceo', 3000000, 30000000, 3000000, 150000, 150000, 321429, 35378571),
(172, 2, 2024, '567892431432', 'joni', 'Laki-Laki', 'manager', 100000000, 300000, 4000000, 5000000, 5000000, 0, 94300000),
(173, 1, 2022, '628376473472', 'rina', 'Perempuan', 'ceo', 3000000, 30000000, 3000000, 150000, 150000, 0, 35700000),
(174, 1, 2022, '567892431432', 'joni', 'Laki-Laki', 'manager', 100000000, 300000, 4000000, 5000000, 5000000, 0, 94300000),
(175, 1, 2022, '123457412412424643', 'lukman', 'Laki-Laki', 'sekertaris', 12000000, 200000, 1000000, 600000, 600000, 0, 12000000);

-- --------------------------------------------------------

--
-- Table structure for table `data_jabatan`
--

CREATE TABLE `data_jabatan` (
  `id_jabatan` int(5) UNSIGNED NOT NULL,
  `nama_jabatan` varchar(120) NOT NULL,
  `gaji_pokok` varchar(50) NOT NULL,
  `tj_transport` varchar(50) NOT NULL,
  `uang_makan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `data_jabatan`
--

INSERT INTO `data_jabatan` (`id_jabatan`, `nama_jabatan`, `gaji_pokok`, `tj_transport`, `uang_makan`) VALUES
(14, 'Pegawai Tetap', '3000000', '1000000', '500000'),
(15, 'manager', '100000000', '300000', '4000000'),
(16, 'ceo', '3000000', '30000000', '3000000'),
(17, 'sekertaris', '12000000', '200000', '1000000');

-- --------------------------------------------------------

--
-- Table structure for table `data_kehadiran`
--

CREATE TABLE `data_kehadiran` (
  `id_kehadiran` int(5) UNSIGNED NOT NULL,
  `bulan` varchar(25) NOT NULL,
  `tahun` int(25) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama_pegawai` varchar(225) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `hadir` int(11) NOT NULL,
  `sakit` int(11) NOT NULL,
  `alpha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `data_kehadiran`
--

INSERT INTO `data_kehadiran` (`id_kehadiran`, `bulan`, `tahun`, `nik`, `nama_pegawai`, `jenis_kelamin`, `nama_jabatan`, `hadir`, `sakit`, `alpha`) VALUES
(111, '01', 2024, '628376473472', 'rina', 'Perempuan', 'ceo', 25, 3, 1),
(112, '01', 2024, '567892431432', 'joni', 'Laki-Laki', 'manager', 0, 0, 0),
(113, '02', 2024, '628376473472', 'rina', 'Perempuan', 'ceo', 26, 2, 1),
(114, '02', 2024, '567892431432', 'joni', 'Laki-Laki', 'manager', 0, 0, 0),
(115, '01', 2022, '628376473472', 'rina', 'Perempuan', 'ceo', 0, 0, 0),
(116, '01', 2022, '567892431432', 'joni', 'Laki-Laki', 'manager', 0, 0, 0),
(117, '01', 2022, '123457412412424643', 'lukman', 'Laki-Laki', 'sekertaris', 0, 0, 2),
(118, '02', 2022, '628376473472', 'rina', 'Perempuan', 'ceo', 0, 0, 0),
(119, '02', 2022, '567892431432', 'joni', 'Laki-Laki', 'manager', 0, 0, 0),
(120, '02', 2022, '123457412412424643', 'lukman', 'Laki-Laki', 'sekertaris', 0, 0, 0),
(121, '02', 2020, '628376473472', 'rina', 'Perempuan', 'ceo', 0, 0, 0),
(122, '02', 2020, '567892431432', 'joni', 'Laki-Laki', 'manager', 0, 0, 0),
(123, '02', 2020, '123457412412424643', 'lukman', 'Laki-Laki', 'sekertaris', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `id_pegawai` int(5) UNSIGNED NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama_pegawai` varchar(225) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `telpon` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `photo` varchar(225) NOT NULL,
  `hak_akses` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `data_pegawai`
--

INSERT INTO `data_pegawai` (`id_pegawai`, `nik`, `nama_pegawai`, `username`, `password`, `jenis_kelamin`, `tgl_lahir`, `alamat`, `telpon`, `email`, `jabatan`, `tanggal_masuk`, `status`, `photo`, `hak_akses`) VALUES
(20, '628376473472', 'rina', 'rina', 'rina123', 'Perempuan', '2024-01-19', 'Jambi', '0897465234', 'rezawijaya6924@gmail.com', 'ceo', '2024-01-10', 'aktif', 'Screenshot 2023-05-26 083301.png', 1),
(22, '567892431432', 'joni', 'joni', 'joni123', 'Laki-Laki', '2024-01-19', 'Bengkulu', '0897465234', 'rezawijaya0906@gmail.com', 'manager', '2024-01-18', 'aktif', 'Screenshot 2023-05-26 085914.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `hakakses` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id`, `keterangan`, `hakakses`) VALUES
(1, 'Admin', 1),
(2, 'Pegawai', 2);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-01-15-073157', 'App\\Database\\Migrations\\DataPegawai', 'default', 'App', 1705304189, 1),
(2, '2024-01-15-073319', 'App\\Database\\Migrations\\DataJabatan', 'default', 'App', 1705304189, 1),
(3, '2024-01-15-073329', 'App\\Database\\Migrations\\DataKehadiran', 'default', 'App', 1705304189, 1),
(4, '2024-01-16-164155', 'App\\Database\\Migrations\\CreatePotonganGaji', 'default', 'App', 1705423328, 2),
(5, '2024-01-16-182537', 'App\\Database\\Migrations\\CreateDataGaji', 'default', 'App', 1705429554, 3),
(6, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1705742552, 4);

-- --------------------------------------------------------

--
-- Table structure for table `potongan_gaji`
--

CREATE TABLE `potongan_gaji` (
  `id` int(11) NOT NULL,
  `potongan` varchar(120) NOT NULL,
  `jml_potongan_bpjsk` int(50) NOT NULL,
  `jml_potongan_bpjskk` int(50) NOT NULL,
  `jml_potongan_pph` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `potongan_gaji`
--

INSERT INTO `potongan_gaji` (`id`, `potongan`, `jml_potongan_bpjsk`, `jml_potongan_bpjskk`, `jml_potongan_pph`) VALUES
(16, 'ceo', 150000, 150000, 107143),
(17, 'Pegawai Tetap', 150000, 150000, 107143),
(18, 'manager', 5000000, 5000000, 3571429),
(19, 'sekertaris', 600000, 600000, 428571);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_gaji`
--
ALTER TABLE `data_gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `data_jabatan`
--
ALTER TABLE `data_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `data_kehadiran`
--
ALTER TABLE `data_kehadiran`
  ADD PRIMARY KEY (`id_kehadiran`) USING BTREE;

--
-- Indexes for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `potongan_gaji`
--
ALTER TABLE `potongan_gaji`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_gaji`
--
ALTER TABLE `data_gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `data_jabatan`
--
ALTER TABLE `data_jabatan`
  MODIFY `id_jabatan` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `data_kehadiran`
--
ALTER TABLE `data_kehadiran`
  MODIFY `id_kehadiran` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  MODIFY `id_pegawai` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `potongan_gaji`
--
ALTER TABLE `potongan_gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
