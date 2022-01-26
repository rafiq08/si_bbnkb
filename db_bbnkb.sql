-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2022 at 05:18 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bbnkb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bbnkb`
--

CREATE TABLE `tb_bbnkb` (
  `id_bbnkb` int(11) NOT NULL,
  `id_petugas_bbnkb` int(11) NOT NULL,
  `jenis_pelayanan` int(11) NOT NULL,
  `nopol_lama` varchar(15) CHARACTER SET latin1 NOT NULL,
  `nopol_baru` varchar(15) CHARACTER SET latin1 NOT NULL,
  `nama_lama` varchar(50) CHARACTER SET latin1 NOT NULL,
  `nama_baru` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tgl_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bbnkb`
--

INSERT INTO `tb_bbnkb` (`id_bbnkb`, `id_petugas_bbnkb`, `jenis_pelayanan`, `nopol_lama`, `nopol_baru`, `nama_lama`, `nama_baru`, `tgl_daftar`) VALUES
(14, 5, 1, 'DA 3350 VJ', 'DA 3904 AY', 'M. Riza. R', 'Mirza', '2021-11-13'),
(15, 5, 1, 'DA 6206 ACy', 'DA 4101 AA', 'Isti Ayudita', 'Suriansyah', '2021-11-15'),
(16, 5, 1, 'DA 3476 CG', 'DA 4143 AA', 'M. Nofarani', 'Frimaya Sari', '2021-11-16'),
(17, 5, 1, 'DA 6798 ACB', 'DA 3901 AY', 'M. Rifani', 'Muhammad', '2021-11-16'),
(18, 5, 1, 'DA 3473 ID', 'DA 4152 AA', 'Zaenal F', 'Hairullah', '2021-11-17');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelayanan`
--

CREATE TABLE `tb_pelayanan` (
  `id_pelayanan` int(11) NOT NULL,
  `bidang_pelayanan` varchar(30) CHARACTER SET latin1 NOT NULL,
  `waktu_penyelesaian` varchar(35) CHARACTER SET latin1 NOT NULL,
  `jam_pelayanan` varchar(35) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pelayanan`
--

INSERT INTO `tb_pelayanan` (`id_pelayanan`, `bidang_pelayanan`, `waktu_penyelesaian`, `jam_pelayanan`) VALUES
(1, 'BBNII', '20-60 Menit', '9.00-13.00 WITA'),
(2, 'Pengurusan Pindah', '10-30 Menit', '9.00-13.00 WITA'),
(3, 'Kasir', '5-15 Menit', '9.00-13.00 WITA'),
(7, 'Mutasi', '30-60 Menit', '9.00-13.00 WITA'),
(9, 'Pajak Online', '05-15 Menit', '9.00-13.00 WITA');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemutihan`
--

CREATE TABLE `tb_pemutihan` (
  `id_pemutihan` int(11) NOT NULL,
  `id_petugas_bbnkb` int(11) NOT NULL,
  `nopol` varchar(10) CHARACTER SET latin1 NOT NULL,
  `nama_stnk` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tanggal` date NOT NULL,
  `no_antri` varchar(5) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pemutihan`
--

INSERT INTO `tb_pemutihan` (`id_pemutihan`, `id_petugas_bbnkb`, `nopol`, `nama_stnk`, `tanggal`, `no_antri`) VALUES
(4, 5, 'DA 3648 VF', 'Murhan', '2021-11-03', 'D001'),
(5, 5, 'DA 1801 ID', 'Badransyah', '2021-11-03', 'D002'),
(7, 5, 'DA 6121 AD', 'M.Husairi', '2021-11-04', 'D001'),
(8, 5, 'DA 6926 NF', 'Lili Suryani', '2021-11-04', 'D002'),
(9, 5, 'DA 3530 AA', 'Kasmiah.HJ', '2021-11-05', 'D001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas_bbnkb`
--

CREATE TABLE `tb_petugas_bbnkb` (
  `id_petugas_bbnkb` int(11) NOT NULL,
  `kode_petugas` varchar(25) CHARACTER SET latin1 NOT NULL,
  `nama_petugas` varchar(50) CHARACTER SET latin1 NOT NULL,
  `id_pelayanan` int(11) NOT NULL,
  `tahun_kerja` varchar(4) CHARACTER SET latin1 NOT NULL,
  `status_kerja` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_petugas_bbnkb`
--

INSERT INTO `tb_petugas_bbnkb` (`id_petugas_bbnkb`, `kode_petugas`, `nama_petugas`, `id_pelayanan`, `tahun_kerja`, `status_kerja`) VALUES
(5, 'P001REG', 'Fitri', 1, '2018', 'Kontrak'),
(7, 'P001PDH', 'Gani', 2, '2021', 'Honorer'),
(8, 'P001KSR', 'Ina ', 3, '2018', 'Kontrak'),
(9, 'P001OOL', 'Nida', 9, '2018', 'Kontrak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pindah_bjm_i`
--

CREATE TABLE `tb_pindah_bjm_i` (
  `id_pindah` int(11) NOT NULL,
  `id_petugas_bbnkb` int(11) NOT NULL,
  `nopol` varchar(15) CHARACTER SET latin1 NOT NULL,
  `nama_stnk` varchar(50) CHARACTER SET latin1 NOT NULL,
  `alamat_lama` varchar(100) CHARACTER SET latin1 NOT NULL,
  `alamat_baru` varchar(100) CHARACTER SET latin1 NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pindah_bjm_i`
--

INSERT INTO `tb_pindah_bjm_i` (`id_pindah`, `id_petugas_bbnkb`, `nopol`, `nama_stnk`, `alamat_lama`, `alamat_baru`, `tgl`) VALUES
(24, 7, 'DA 6327 SG', 'Akh. Syahril', 'Komp. K. H. Dewantara No.119 GG.IV RT.019 RW.008. Karang Mekar. Banjar Timur', 'Jl. Angsana Raya No. 10 Blok V Prumnas Kayutangi RT.024 RW.003 Kel. Sungai Miai Kec. Banjarmasin Uta', '2021-10-26'),
(25, 7, 'DA 6114 SH', 'Sofianoor', 'Jl. Veteran KM. 5,5 GG. Gusti Seman RT. 004 RW.001 Sungai Lulut, Banjar Timur', 'Jl. Pekapuran A No. 22 RT. 011 RW. 002 Kel. Sungai Baru Kec. Banjarmasin Tengah', '2021-10-15'),
(26, 7, 'DA 1290 AM', 'PT.PALMINA ADHIKARYA SEJATI', 'Jl. Komp. Dharma Bakti I No. 79 RT. 012 RW. 001. Pemurus Luar. Banjar Timur', 'Jl. Alalak Utara RT. 016 RW. 001 Kel. Alalak Utara Kec. Banjarmasin Utara', '2021-11-04'),
(27, 7, 'DA 6809 SE', 'Triyono', 'Jl. Veteran Komp. A. Yani 2 RT. 32 RW. 08 Pengambangan. Banjar Timur', 'Jl. Ampera III Ujung No. 90 RT. 038 RW. 003 Kel. Basirih Kec. Banjarmasin Barat', '2021-10-13'),
(28, 7, 'DA 7235 CB', 'Kopel Bulog Divre Kalsel', 'Jl. A. Yani KM. 6 No. 561 Pemurus Luar. Banjar Timur', 'Komplek Purnasakti Jalur Utama II RT. 036 RW. 003 Kel. Basirih Kec. Banjarmasin Barat', '2021-10-14');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pindah_bjm_ii`
--

CREATE TABLE `tb_pindah_bjm_ii` (
  `id_pindah` int(11) NOT NULL,
  `id_petugas_bbnkb` int(11) NOT NULL,
  `nopol` varchar(15) CHARACTER SET latin1 NOT NULL,
  `nama_stnk` varchar(30) CHARACTER SET latin1 NOT NULL,
  `alamat_lama` varchar(100) CHARACTER SET latin1 NOT NULL,
  `alamat_baru` varchar(100) CHARACTER SET latin1 NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pindah_bjm_ii`
--

INSERT INTO `tb_pindah_bjm_ii` (`id_pindah`, `id_petugas_bbnkb`, `nopol`, `nama_stnk`, `alamat_lama`, `alamat_baru`, `tgl`) VALUES
(7, 7, 'DA 6490 SJ', 'Yudi Hidayatullah', 'Jl. Kurma Komp. Herlina P. Blok. III/107 RT. 015 Sungai Andai Banjarmasin Utara', 'Jl. Veteran GG. Tanjung Raya No. 51 RT. 025 RW. 002 Kel. Sungai Bilu Kec. Banjarmasin Timur', '2021-11-01'),
(8, 7, 'DA 1094 IJ', 'Rini Herliyani', 'Jl. Haryono MT No. 011 RT.006/002 Kertak Baru Uluu Banjarmasin Tengah', 'Jl. R. K. Ilir No. 41 RT. 016 RW. 001 Kel. Pekauman Kec. Banjarmasin Selatan', '2021-11-01'),
(9, 7, 'DA 6569 SK', 'Nofi Arianto', 'Jl. AIS Nasution GG.Samudin RT. 11 RW. 02 Gedang Banjarmasin Tengah', 'Jl.  Tembus Mantuil Lokasi III RT.002 RW.001 Kel. Basirih Selatan Kec. Banjarmasin Selatan', '2021-11-02'),
(10, 7, 'DA 6712 ACU', 'Mahdalena', 'Kayu TAngi Jl. Simpang Gusti V/75 RT. 032 RW. 003 Kel. Alalak Utara Kec. Banjarmasin Utara', 'Jl. Manggis Pasar Batuah RT. 012 RW. 001 Kel. Kuripan Kec. Banjarmasin Timur ', '2021-11-03'),
(11, 7, 'DA 6900 SH', 'Nurcholis Setia Budi', 'Jl. Banyiur Luar Kel. Basirih Kec.B.Masin Utara', 'Jl. Pramuka Melati Indah Komp.Griya Hamparan No. 5A RT. 029 RW. 002 Kel. Sungai Lulut Kec. Banjarmas', '2021-11-04');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) CHARACTER SET latin1 NOT NULL,
  `username` varchar(20) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `level` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
(1, 'Gani', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator'),
(2, 'H. Rudy Irawan Baktie', 'rudy', 'cfce9735de7c3873a55331a4e74b70fc', 'Pimpinan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bbnkb`
--
ALTER TABLE `tb_bbnkb`
  ADD PRIMARY KEY (`id_bbnkb`),
  ADD KEY `id_petugas_bbnkb` (`id_petugas_bbnkb`),
  ADD KEY `jenis_pelayanan` (`jenis_pelayanan`);

--
-- Indexes for table `tb_pelayanan`
--
ALTER TABLE `tb_pelayanan`
  ADD PRIMARY KEY (`id_pelayanan`);

--
-- Indexes for table `tb_pemutihan`
--
ALTER TABLE `tb_pemutihan`
  ADD PRIMARY KEY (`id_pemutihan`),
  ADD KEY `id_petugas_bbnkb` (`id_petugas_bbnkb`);

--
-- Indexes for table `tb_petugas_bbnkb`
--
ALTER TABLE `tb_petugas_bbnkb`
  ADD PRIMARY KEY (`id_petugas_bbnkb`),
  ADD KEY `id_pelayanan` (`id_pelayanan`);

--
-- Indexes for table `tb_pindah_bjm_i`
--
ALTER TABLE `tb_pindah_bjm_i`
  ADD PRIMARY KEY (`id_pindah`),
  ADD KEY `id_petugas_bbnkb` (`id_petugas_bbnkb`);

--
-- Indexes for table `tb_pindah_bjm_ii`
--
ALTER TABLE `tb_pindah_bjm_ii`
  ADD PRIMARY KEY (`id_pindah`),
  ADD KEY `id_petugas_bbnkb` (`id_petugas_bbnkb`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bbnkb`
--
ALTER TABLE `tb_bbnkb`
  MODIFY `id_bbnkb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_pelayanan`
--
ALTER TABLE `tb_pelayanan`
  MODIFY `id_pelayanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_pemutihan`
--
ALTER TABLE `tb_pemutihan`
  MODIFY `id_pemutihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_petugas_bbnkb`
--
ALTER TABLE `tb_petugas_bbnkb`
  MODIFY `id_petugas_bbnkb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_pindah_bjm_i`
--
ALTER TABLE `tb_pindah_bjm_i`
  MODIFY `id_pindah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_pindah_bjm_ii`
--
ALTER TABLE `tb_pindah_bjm_ii`
  MODIFY `id_pindah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_bbnkb`
--
ALTER TABLE `tb_bbnkb`
  ADD CONSTRAINT `jenis_pelayanan` FOREIGN KEY (`jenis_pelayanan`) REFERENCES `tb_pelayanan` (`id_pelayanan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `kode_petugas_bbnkb` FOREIGN KEY (`id_petugas_bbnkb`) REFERENCES `tb_petugas_bbnkb` (`id_petugas_bbnkb`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_pemutihan`
--
ALTER TABLE `tb_pemutihan`
  ADD CONSTRAINT `kode_petugas_pemutihan` FOREIGN KEY (`id_petugas_bbnkb`) REFERENCES `tb_petugas_bbnkb` (`id_petugas_bbnkb`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_petugas_bbnkb`
--
ALTER TABLE `tb_petugas_bbnkb`
  ADD CONSTRAINT `bidang_pelayanan` FOREIGN KEY (`id_pelayanan`) REFERENCES `tb_pelayanan` (`id_pelayanan`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_pindah_bjm_i`
--
ALTER TABLE `tb_pindah_bjm_i`
  ADD CONSTRAINT `kode_petugas` FOREIGN KEY (`id_petugas_bbnkb`) REFERENCES `tb_petugas_bbnkb` (`id_petugas_bbnkb`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_pindah_bjm_ii`
--
ALTER TABLE `tb_pindah_bjm_ii`
  ADD CONSTRAINT `kode_petugas_ii` FOREIGN KEY (`id_petugas_bbnkb`) REFERENCES `tb_petugas_bbnkb` (`id_petugas_bbnkb`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
