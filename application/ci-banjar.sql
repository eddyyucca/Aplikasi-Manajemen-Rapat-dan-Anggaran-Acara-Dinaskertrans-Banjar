-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2022 at 01:49 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci-banjar`
--

-- --------------------------------------------------------

--
-- Table structure for table `broadcast`
--

CREATE TABLE `broadcast` (
  `id_broadcast` int(11) NOT NULL,
  `no_telepon` char(200) NOT NULL,
  `pesan` char(200) NOT NULL,
  `tgl` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `broadcast`
--

INSERT INTO `broadcast` (`id_broadcast`, `no_telepon`, `pesan`, `tgl`) VALUES
(1, '082157876927', 'oke\r\n', '2022-05-15'),
(2, '082157876927,085849658066', 'berhasil', '2022-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `no_telepon` char(100) NOT NULL,
  `pesan` char(200) NOT NULL,
  `id_surat` char(100) NOT NULL,
  `tgl` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `no_telepon`, `pesan`, `id_surat`, `tgl`) VALUES
(1, '082157876927', 'mantap', '00006', '2021-03-08'),
(2, '082157876927', 'baik', '00006', '2021-03-08'),
(3, '082157876927', 'tes hari ini kita ada rapat', '00006', '2021-03-08'),
(4, '082157876927', 'maxdev', '00002', '2021-03-08'),
(5, '082157876927', 'tesss', '00002', '2021-03-08'),
(6, '082157876927', 'mohon hadiri rapat', '00006', '2021-03-08'),
(7, '082157876927', 'testing ok', '00006', '2022-05-15'),
(9, '082157876927', 'coba lagi\r\n', '00006', '2022-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detil_surat`
--

CREATE TABLE `tb_detil_surat` (
  `id_surat` varchar(128) NOT NULL,
  `nip` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detil_surat`
--

INSERT INTO `tb_detil_surat` (`id_surat`, `nip`) VALUES
('00003', '16630001'),
('00005', '16630001'),
('00005', '16630002'),
('00005', '16630003'),
('00005', '16630004'),
('00005', '16630009');

-- --------------------------------------------------------

--
-- Table structure for table `tb_honor`
--

CREATE TABLE `tb_honor` (
  `id_honor` int(11) NOT NULL,
  `id_surat` varchar(128) NOT NULL,
  `no_honor` varchar(128) NOT NULL,
  `tgl_honor` varchar(128) NOT NULL,
  `nominal` varchar(128) NOT NULL,
  `jml_penerima` varchar(128) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  `bukti` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_honor`
--

INSERT INTO `tb_honor` (`id_honor`, `id_surat`, `no_honor`, `tgl_honor`, `nominal`, `jml_penerima`, `keterangan`, `bukti`) VALUES
(1, '00001', 'HNR111', '2020-05-19', '500000', '2', 'Bayar', 'Bukti_Penerimaan_Honor-1.png'),
(2, '00002', 'HNR222', '2020-05-18', '250000', '5', 'Bayar', 'Bukti_Penerimaan_Honor-2.png'),
(3, '00003', '123456789', '2020-07-22', '500000', '5', 'sip', 'Bukti_Penerimaan_Honor-3.jpg'),
(4, '00004', '1112/458', '2020-07-22', '1000000', '10', 'dibagi Rata', 'Bukti_Penerimaan_Honor-4.pdf'),
(5, '00008', '0009', '2020-07-24', '500000', '5', 'bagi rata', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `nip` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` varchar(128) NOT NULL,
  `bagian` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`nip`, `nama`, `password`, `role`, `bagian`) VALUES
('1122', 'Ismail Marzuki', '$2y$10$vPl4IRJ2dysu7lJ8XTAG5e.IMFyh8NG6EYV.p4nLn3GCENn85jFaq', 'kadis', 'Kadis'),
('12345', 'syarif', '$2y$10$UnWNbnJe/i5/PqmC9i05Bee43qsz.Tzntjo5BrQxik9pk0LlkQuh2', 'admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengirim`
--

CREATE TABLE `tb_pengirim` (
  `id_pengirim` int(11) NOT NULL,
  `nm_pengirim` varchar(128) NOT NULL,
  `alamat_pengirim` varchar(128) NOT NULL,
  `notelp_pengirim` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengirim`
--

INSERT INTO `tb_pengirim` (`id_pengirim`, `nm_pengirim`, `alamat_pengirim`, `notelp_pengirim`) VALUES
(1, 'BPN Banjarbaru', 'Jl. P. Batur', '01299748543'),
(2, 'Dinas Kesehatan Prov. Kalsel', 'Jl. A. Yani', '08131213442');

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat`
--

CREATE TABLE `tb_surat` (
  `id_surat` varchar(128) NOT NULL,
  `no_surat` varchar(128) NOT NULL,
  `tanggal` varchar(128) NOT NULL,
  `perihal` varchar(128) NOT NULL,
  `id_pengirim` int(11) NOT NULL,
  `tempat` varchar(128) NOT NULL,
  `tgl_acara` varchar(128) NOT NULL,
  `waktu_acara` varchar(128) NOT NULL,
  `catatan` varchar(128) NOT NULL,
  `lampiran` varchar(128) NOT NULL,
  `tujuan` varchar(128) NOT NULL,
  `jenis_surat` varchar(128) NOT NULL,
  `notulensi` text NOT NULL,
  `daftar_hadir` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_surat`
--

INSERT INTO `tb_surat` (`id_surat`, `no_surat`, `tanggal`, `perihal`, `id_pengirim`, `tempat`, `tgl_acara`, `waktu_acara`, `catatan`, `lampiran`, `tujuan`, `jenis_surat`, `notulensi`, `daftar_hadir`) VALUES
('00001', '333', '2020-07-18', 'Rapat Tahun Baru', 1, 'Roditha', '-', '-', '', 'Masuk-333.jpg', '-', 'Masuk', '', ''),
('00002', 'M12345', '2020-07-18', 'Rapat Tahun Baru', 2, 'Roditha', '2020-07-23', '10:00', '', 'TTD-Keluar-M12345.jpg', 'Kantor', 'Keluar', '', 'Daftar_Hadir-M12345.pdf'),
('00003', 'dinkes/112/567', '2020-07-22', 'covid 19', 2, 'BAPELKES BANJARBARU', '2020-07-22', '10:00', 'VIA TELECONFRENCE', 'Masuk-dinkes112567.jpg', '-', 'Masuk', '', ''),
('00004', 'banjar/1112/458', '2020-07-22', 'Penanganan Covid 19', 0, 'Dinas kesehatan kabupaten', '2020-07-22', '09:00', 'Via zoom', 'TTD-Keluar-banjar1112458.jpg', 'Kab. Banjar', 'Keluar', 'Penyakit virus corona (COVID-19) adalah penyakit menular yang disebabkan oleh virus corona yang baru-baru ini ditemukan.\r\nSebagian besar orang yang tertular COVID-19 akan mengalami gejala ringan hingga sedang dan akan pulih tanpa penanganan khusus.', 'Daftar_Hadir-banjar1112458.pdf'),
('00005', '9049/bjb/8390', '2020-07-22', 'Penanganan Covid 19', 2, 'BAPELKES BANJARBARU', '2020-07-24', '13:44', 'on time', 'Masuk-9049bjb8390.pdf', '-', 'Masuk', '', ''),
('00006', '7837/mtp/4783', '2020-07-22', 'Penanganan Covid 19', 0, 'sekretariat daerah', '2020-07-22', '12:45', 'hadir tepat waktu', 'TTD-Keluar-7837mtp4783.png', 'Kantor', 'Keluar', 'Notulen adalah catatan tertulis resmi dari sebuah kegiatan pertemuan. Mereka biasanya berisi pernyataan masalah yang dibahas oleh peserta dan tanggapan atau keputusan terhadap isu-isu tersebut, serta daftar peserta. Ini bukan rekaman kata demi kata (transkrip) dari pertemuan, yang biasanya tidak diperlukan', 'Daftar_Hadir-7837mtp4783.png'),
('00007', '5634/mtp/3478', '2020-07-22', 'covid 19', 0, 'sekretariat daerah', '2020-07-25', '11:00', 'on time', '', 'Provinsi', 'Keluar', '', 'Daftar_Hadir-5634mtp3478.jpg'),
('00008', '6738/bjb/4362', '2020-07-22', 'covid 19', 0, 'BAPELKES BANJARBARU', '2020-07-23', '11:10', 'hadir', '', 'Provinsi', 'Keluar', '', 'Daftar_Hadir-6738bjb4362.jpg'),
('00009', 'banjar/1114/450', '2020-07-24', 'Penanganan Covid 19', 0, 'BAPELKES BANJARBARU', '2020-07-25', '11:15', 'hadir', '', 'Kab. Banjar', 'Keluar', '', ''),
('00010', '3764/mtp/3678', '2020-07-22', 'undangan', 0, 'BAPELKES BANJARBARU', '2020-07-22', '11:57', 'hadir', '', 'Provinsi', 'Keluar', 'COVID-19 adalah penyakit yang disebabkan oleh virus severe acute respiratory syndrome coronavirus 2 (SARS-CoV-2). COVID-19 dapat menyebabkan gangguan sistem pernapasan, mulai dari gejala yang ringan seperti flu, hingga infeksi paru-paru, seperti pneumonia.', 'Daftar_Hadir-3764mtp3678.png'),
('00011', '7846/mtp/897', '2020-07-22', 'undangan rpt', 0, 'ruang serbaguna', '2020-07-23', '12:17', 'on time', '', 'Provinsi', 'Keluar', '', ''),
('00012', '6523/bjb/7832', '2020-07-22', 'covid 19', 0, 'murjani', '2020-07-22', '12:19', 'on time', '', 'Kab. Banjar', 'Keluar', '', ''),
('00013', 'bjb/78923/3783', '2020-07-23', 'undangan', 0, 'sekretariat daerah', '2020-07-23', '12:23', 'on time', '', 'Kab. Banjar', 'Keluar', '', 'Daftar_Hadir-bjb789233783.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `broadcast`
--
ALTER TABLE `broadcast`
  ADD PRIMARY KEY (`id_broadcast`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `tb_honor`
--
ALTER TABLE `tb_honor`
  ADD PRIMARY KEY (`id_honor`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tb_pengirim`
--
ALTER TABLE `tb_pengirim`
  ADD PRIMARY KEY (`id_pengirim`);

--
-- Indexes for table `tb_surat`
--
ALTER TABLE `tb_surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `broadcast`
--
ALTER TABLE `broadcast`
  MODIFY `id_broadcast` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_honor`
--
ALTER TABLE `tb_honor`
  MODIFY `id_honor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pengirim`
--
ALTER TABLE `tb_pengirim`
  MODIFY `id_pengirim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
