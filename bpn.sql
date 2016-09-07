-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2016 at 01:06 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bpn`
--

-- --------------------------------------------------------

--
-- Table structure for table `berkas_buku_tanah`
--

CREATE TABLE `berkas_buku_tanah` (
  `id_berkas` int(11) NOT NULL,
  `no_buku` char(20) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `lokasi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buku_tanah`
--

CREATE TABLE `buku_tanah` (
  `no_buku` char(20) NOT NULL,
  `barcode` varchar(15) NOT NULL,
  `id_desa_kel` int(11) NOT NULL,
  `id_loker` int(11) NOT NULL,
  `asal_hak` varchar(500) NOT NULL,
  `nama_pemegang_hak` varchar(100) NOT NULL,
  `jenis_hak` varchar(50) NOT NULL,
  `nomor_hak` varchar(5) NOT NULL,
  `d_i_307` varchar(20) NOT NULL,
  `d_i_208` varchar(20) NOT NULL,
  `surat_ukur` varchar(100) NOT NULL,
  `tgl_surat_ukur` date NOT NULL,
  `luas` int(11) NOT NULL,
  `tgl_terbit` date NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `penunjuk` varchar(700) NOT NULL,
  `status_pinjam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku_tanah`
--

INSERT INTO `buku_tanah` (`no_buku`, `barcode`, `id_desa_kel`, `id_loker`, `asal_hak`, `nama_pemegang_hak`, `jenis_hak`, `nomor_hak`, `d_i_307`, `d_i_208`, `surat_ukur`, `tgl_surat_ukur`, `luas`, `tgl_terbit`, `penerbit`, `penunjuk`, `status_pinjam`) VALUES
('10.05.05.07.1.00533', '02081000533', 1, 1, 'Pengakuan Hak/Penegasan Hak Bekas Tanah adat', 'Endang Mulyani', 'Milik', '533', '4392/SIS/1998', '4392/SIS/1998', '10.05.05.07.02081', '1998-02-24', 107, '1998-02-28', 'IR. WIMBO CAHYONO', 'NOMOR IDENTIFIKASI BIDANG TANAH (NIB) 10.05.02.08.02081', 1),
('3213414', '4141414134', 2, 1, 'warisan', 'rahasia ah', 'Hak Milik', '90131', '312324', '4141', 'dadasd2312', '2016-08-02', 120, '2016-08-23', 'Petugas', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `desa_kelurahan`
--

CREATE TABLE `desa_kelurahan` (
  `id_desa_kel` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama_desa_kel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `desa_kelurahan`
--

INSERT INTO `desa_kelurahan` (`id_desa_kel`, `id_kecamatan`, `kode`, `nama_desa_kel`) VALUES
(1, 1, '03', 'Desa Tersembunyi'),
(2, 3, '01', 'desa bebas'),
(3, 7, '02', 'Desa pisan');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama_kecamatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `kode`, `nama_kecamatan`) VALUES
(1, '12', 'Kedung Waringin'),
(2, '123401', 'Bojong Mangu'),
(3, '03', 'Tambun'),
(4, '01', 'Jatiwangi'),
(5, '05', 'Batujajar'),
(6, '01', 'Babelan'),
(7, '07', 'Cikarang Utara'),
(8, '08', 'Cikarang Barat');

-- --------------------------------------------------------

--
-- Table structure for table `loker`
--

CREATE TABLE `loker` (
  `id_loker` int(11) NOT NULL,
  `kode_loker` varchar(20) NOT NULL,
  `keterangan` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loker`
--

INSERT INTO `loker` (`id_loker`, `kode_loker`, `keterangan`) VALUES
(1, '01', 'loker sertifikat'),
(2, '02', 'loker rahasia');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `no_buku` char(20) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `status_peminjaman` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `proses` varchar(500) NOT NULL,
  `keterangan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `tanggal_pengembalian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nip` varchar(30) NOT NULL,
  `password` char(64) NOT NULL,
  `status` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nip`, `password`, `status`, `nama_lengkap`) VALUES
('10110163', 'eb0a191797624dd3a48fa681d3061212', 1, 'Mia Septi');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_desa_kecamatan`
--
CREATE TABLE `v_desa_kecamatan` (
`id_desa_kel` int(11)
,`id_kecamatan` int(11)
,`kode_desa` varchar(20)
,`nama_desa_kel` varchar(50)
,`kode` varchar(20)
,`nama_kecamatan` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_detail_buku_tanah`
--
CREATE TABLE `v_detail_buku_tanah` (
`no_buku` char(20)
,`barcode` varchar(15)
,`asal_hak` varchar(500)
,`nama_pemegang_hak` varchar(100)
,`jenis_hak` varchar(50)
,`nomor_hak` varchar(5)
,`d_i_307` varchar(20)
,`d_i_208` varchar(20)
,`surat_ukur` varchar(100)
,`tgl_surat_ukur` date
,`luas` int(11)
,`tgl_terbit` date
,`penerbit` varchar(50)
,`penunjuk` varchar(700)
,`status_pinjam` int(11)
,`nama_desa_kel` varchar(50)
,`kode_loker` varchar(20)
,`nama_kecamatan` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `v_desa_kecamatan`
--
DROP TABLE IF EXISTS `v_desa_kecamatan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_desa_kecamatan`  AS  select `desa_kelurahan`.`id_desa_kel` AS `id_desa_kel`,`desa_kelurahan`.`id_kecamatan` AS `id_kecamatan`,`desa_kelurahan`.`kode` AS `kode_desa`,`desa_kelurahan`.`nama_desa_kel` AS `nama_desa_kel`,`kecamatan`.`kode` AS `kode`,`kecamatan`.`nama_kecamatan` AS `nama_kecamatan` from (`desa_kelurahan` join `kecamatan` on((`desa_kelurahan`.`id_kecamatan` = `kecamatan`.`id_kecamatan`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_detail_buku_tanah`
--
DROP TABLE IF EXISTS `v_detail_buku_tanah`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_detail_buku_tanah`  AS  select `buku_tanah`.`no_buku` AS `no_buku`,`buku_tanah`.`barcode` AS `barcode`,`buku_tanah`.`asal_hak` AS `asal_hak`,`buku_tanah`.`nama_pemegang_hak` AS `nama_pemegang_hak`,`buku_tanah`.`jenis_hak` AS `jenis_hak`,`buku_tanah`.`nomor_hak` AS `nomor_hak`,`buku_tanah`.`d_i_307` AS `d_i_307`,`buku_tanah`.`d_i_208` AS `d_i_208`,`buku_tanah`.`surat_ukur` AS `surat_ukur`,`buku_tanah`.`tgl_surat_ukur` AS `tgl_surat_ukur`,`buku_tanah`.`luas` AS `luas`,`buku_tanah`.`tgl_terbit` AS `tgl_terbit`,`buku_tanah`.`penerbit` AS `penerbit`,`buku_tanah`.`penunjuk` AS `penunjuk`,`buku_tanah`.`status_pinjam` AS `status_pinjam`,`desa_kelurahan`.`nama_desa_kel` AS `nama_desa_kel`,`loker`.`kode_loker` AS `kode_loker`,`kecamatan`.`nama_kecamatan` AS `nama_kecamatan` from (((`buku_tanah` join `desa_kelurahan` on((`buku_tanah`.`id_desa_kel` = `desa_kelurahan`.`id_desa_kel`))) join `kecamatan` on((`desa_kelurahan`.`id_kecamatan` = `kecamatan`.`id_kecamatan`))) join `loker` on((`buku_tanah`.`id_loker` = `loker`.`id_loker`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berkas_buku_tanah`
--
ALTER TABLE `berkas_buku_tanah`
  ADD PRIMARY KEY (`id_berkas`),
  ADD KEY `FK_berkas` (`no_buku`);

--
-- Indexes for table `buku_tanah`
--
ALTER TABLE `buku_tanah`
  ADD PRIMARY KEY (`no_buku`),
  ADD KEY `FK_lokasi_desa` (`id_desa_kel`),
  ADD KEY `FK_loker_penyimpanan` (`id_loker`);

--
-- Indexes for table `desa_kelurahan`
--
ALTER TABLE `desa_kelurahan`
  ADD PRIMARY KEY (`id_desa_kel`),
  ADD KEY `FK_lokasi_kecamatan` (`id_kecamatan`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `loker`
--
ALTER TABLE `loker`
  ADD PRIMARY KEY (`id_loker`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `FK_buku_dipinjam` (`no_buku`),
  ADD KEY `FK_peminjam_buku` (`nip`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD KEY `FK_pengembalian_buku` (`id_peminjaman`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berkas_buku_tanah`
--
ALTER TABLE `berkas_buku_tanah`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `desa_kelurahan`
--
ALTER TABLE `desa_kelurahan`
  MODIFY `id_desa_kel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `loker`
--
ALTER TABLE `loker`
  MODIFY `id_loker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `berkas_buku_tanah`
--
ALTER TABLE `berkas_buku_tanah`
  ADD CONSTRAINT `FK_berkas` FOREIGN KEY (`no_buku`) REFERENCES `buku_tanah` (`no_buku`);

--
-- Constraints for table `buku_tanah`
--
ALTER TABLE `buku_tanah`
  ADD CONSTRAINT `FK_lokasi_desa` FOREIGN KEY (`id_desa_kel`) REFERENCES `desa_kelurahan` (`id_desa_kel`),
  ADD CONSTRAINT `FK_loker_penyimpanan` FOREIGN KEY (`id_loker`) REFERENCES `loker` (`id_loker`);

--
-- Constraints for table `desa_kelurahan`
--
ALTER TABLE `desa_kelurahan`
  ADD CONSTRAINT `FK_lokasi_kecamatan` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `FK_buku_dipinjam` FOREIGN KEY (`no_buku`) REFERENCES `buku_tanah` (`no_buku`),
  ADD CONSTRAINT `FK_peminjam_buku` FOREIGN KEY (`nip`) REFERENCES `user` (`nip`);

--
-- Constraints for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `FK_pengembalian_buku` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
