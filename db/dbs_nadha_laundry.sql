-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 15, 2020 at 10:50 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbs_nadha_laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_arus_kas`
--

CREATE TABLE `tbl_arus_kas` (
  `id` int(5) NOT NULL,
  `kd_kas` varchar(50) NOT NULL,
  `kd_tracking` varchar(50) NOT NULL,
  `asal` varchar(50) NOT NULL,
  `arus` varchar(50) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `operator` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bantuan`
--

CREATE TABLE `tbl_bantuan` (
  `id` int(3) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bantuan`
--

INSERT INTO `tbl_bantuan` (`id`, `judul`, `deks`) VALUES
(1, 'Cara mendaftarkan cucian', 'Proses mendaftrkan cucian yaitu dengan cara melakukan registrasi melalui menu \"Kartu Laundry\" kemudian tambahkan'),
(2, 'Email notifikasi tidak terkirim', 'Pastikan email_host yang digunakan telah diaktifkan untuk menerima pengiriman melalui pihak ketiga'),
(3, 'Notifikasi ke whatsapp pelanggan tidak terkirim', 'Pastikan Api_Key yang anda masukkan valid, silahkan kunjungi <a href=\'https://waresponder.co.id/\'>waresponder.co.id</a> untuk mendapatkan Api_Key yang valid. Pastikan juga nomor handphone pelanggan valid'),
(4, 'Bagaimana melakukan proses pembayaran laundry?', 'Untuk melakukan proses pembayaran, silahkan masuk ke menu laundry room(apabila cucian belum selesai), klik cucian, kemudian klik tombol \"Bayar\"'),
(5, 'Bagaimana alur lengkap operasional laundry dari awal hingga akhir?', 'Pertama, lakukan registrasi cucian melalui menu <b>Kartu Laundry</b>, kemudian masuk ke menu laundry room dan pilih cucian untuk menambahkan item cucian. Setelah menambahkan item cucian, pelanggan dapat memilih apakah pembayaran langsung atau pada saat mengambil cucian yang sudah selesai. Setelah cucian selesai, set status cucian ke \'selesai\' di laundry room, cucian yang sudah di set ke selesai tidak akan ditampilkan di laundry room. Apabila pelanggan sudah mengambil cucian, pembayaran dapat dilakukan melalui menu <b>Kartu Laundry</b>, silahkan lakukan pembayaran, dan update status cucian ke \'sudah di ambil\'');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_broadcast_pesan`
--

CREATE TABLE `tbl_broadcast_pesan` (
  `id` int(5) NOT NULL,
  `id_pesan` varchar(50) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `isi` text NOT NULL,
  `sistem` varchar(50) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_broadcast_pesan`
--

INSERT INTO `tbl_broadcast_pesan` (`id`, `id_pesan`, `judul`, `isi`, `sistem`, `waktu`, `status`) VALUES
(6, 'qLikTvjJKr', 'Promo mahasiswa', 'Halo {pelanggan}, kita lagi ada promo buat mahasiswa nih, silahkan masukkan kode promo PROMOMHS untuk mendapatkan diskon 5%, ditunggu ya..', 'terjadwal', '2020-06-17 17:00:00', 'pending'),
(7, 'azSnPsVyCF', 'Promo mahasiswa', 'Halo {pelanggan}, kita lagi ada promo buat mahasiswa nih, silahkan masukkan kode promo PROMOMHS untuk mendapatkan diskon 5%, ditunggu ya..', 'langsung', '2020-06-15 20:38:33', 'sukses');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kartu_laundry`
--

CREATE TABLE `tbl_kartu_laundry` (
  `id` int(10) NOT NULL,
  `kode_service` varchar(50) NOT NULL,
  `pelanggan` varchar(111) NOT NULL,
  `waktu_masuk` timestamp NOT NULL DEFAULT current_timestamp(),
  `waktu_selesai` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `waktu_diambil` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pembayaran` varchar(10) NOT NULL,
  `operator` varchar(55) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_laundry_room`
--

CREATE TABLE `tbl_laundry_room` (
  `id` int(8) NOT NULL,
  `kd_room` varchar(50) NOT NULL,
  `kd_kartu` varchar(50) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `operator` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_level_user`
--

CREATE TABLE `tbl_level_user` (
  `id` int(5) NOT NULL,
  `kd_level` varchar(12) NOT NULL,
  `level` varchar(111) NOT NULL,
  `keterangan` text NOT NULL,
  `bonus_point_cuci` int(5) NOT NULL,
  `diskon_cuci` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_level_user`
--

INSERT INTO `tbl_level_user` (`id`, `kd_level`, `level`, `keterangan`, `bonus_point_cuci`, `diskon_cuci`) VALUES
(1, 'Basic', 'Basic', 'Level user biasa', 5, 0),
(2, 'Gold', 'Gold', 'User level gold', 10, 5),
(3, 'Platinum', 'Platinum', 'Level user platinum', 15, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id` int(5) NOT NULL,
  `username` varchar(111) NOT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(20) NOT NULL,
  `email` varchar(55) NOT NULL,
  `level` varchar(20) NOT NULL,
  `poin_commit` int(50) NOT NULL,
  `poin_real` int(10) NOT NULL,
  `aktif` varchar(1) NOT NULL,
  `waktu_join` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id`, `username`, `nama_lengkap`, `alamat`, `hp`, `email`, `level`, `poin_commit`, `poin_real`, `aktif`, `waktu_join`) VALUES
(6, 'adityadarmanst', 'Aditia Darma Nst', 'Perbaungan', '082272177022', 'alditha.forum@gmail.com', 'Basic', 0, 0, '1', '2020-06-15 20:32:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id` int(10) NOT NULL,
  `kd_pembayaran` varchar(50) NOT NULL,
  `kd_kartu` varchar(50) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_cuci` int(20) NOT NULL,
  `diskon` int(20) NOT NULL,
  `kode_promo` varchar(50) NOT NULL,
  `total_final` int(20) NOT NULL,
  `tunai` int(50) NOT NULL,
  `operator` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengeluaran`
--

CREATE TABLE `tbl_pengeluaran` (
  `id` int(5) NOT NULL,
  `kd_pengeluaran` varchar(20) NOT NULL,
  `pengeluaran` varchar(200) NOT NULL,
  `keterangan` text NOT NULL,
  `waktu` datetime NOT NULL,
  `jumlah` int(20) NOT NULL,
  `operator` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promo_code`
--

CREATE TABLE `tbl_promo_code` (
  `id` int(10) NOT NULL,
  `kd_promo` varchar(50) NOT NULL,
  `deks` varchar(255) NOT NULL,
  `disc` int(10) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_habis` date NOT NULL,
  `kuota` int(8) NOT NULL,
  `aktif` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_promo_code`
--

INSERT INTO `tbl_promo_code` (`id`, `kd_promo`, `deks`, `disc`, `tgl_mulai`, `tgl_habis`, `kuota`, `aktif`) VALUES
(1, 'PROMO30', 'Promo pembukaan laundry', 5, '2020-04-03', '2020-04-08', 100, 'y'),
(2, 'PROMOLEBARAN', 'Promo hari raya idul fitri', 15, '2020-04-01', '2020-04-03', 100, 'y'),
(3, 'PROMOMHS', 'Promo mahasiswa', 10, '2020-04-03', '2020-04-13', 100, 'y'),
(6, 'TAHUNBARU10', 'Promo tahun baru', 10, '2020-05-22', '2020-05-22', 100, 'y'),
(7, 'TAHUNBARU5', 'Promo tahun baru ', 5, '2020-05-22', '2020-05-22', 100, 'n'),
(8, 'PROMOADH', 'Promo suka suka kita', 20, '2020-05-22', '2020-05-22', 100, 'n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_remote_service`
--

CREATE TABLE `tbl_remote_service` (
  `id` int(3) NOT NULL,
  `token` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `time` datetime NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `id` int(5) NOT NULL,
  `kd_service` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `deks` text NOT NULL,
  `satuan` varchar(112) NOT NULL,
  `harga` int(20) NOT NULL,
  `aktif` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`id`, `kd_service`, `nama`, `deks`, `satuan`, `harga`, `aktif`) VALUES
(7, 'TXP28695AC', 'Cuci Biasa', 'Service cuci biasa tanpa setrika', 'Kg', 4000, 'y'),
(8, 'ZVL17359WK', 'Cuci Bersih & Rapi ', 'Cuci biasa + setrika', 'Kg', 5000, 'y'),
(9, 'LCD87416QB', 'Cuci Kebaya', 'Service cuci kebaya', 'Pcs', 30000, 'y'),
(10, 'ISG53972GH', 'Cuci Ambal', 'Service cuci ambal', 'Pcs', 25000, 'y'),
(11, 'NTH65307BJ', 'Cuci Karpet', 'Service cuci karpet', 'Pcs', 30000, 'y'),
(12, 'OUA28594JH', 'Cuci Jas', 'Cuci jas standar', 'Pcs', 50000, 'y'),
(13, 'jeU40701jp', 'Cuci Sepatu', 'Cuci sepatu', 'Pcs', 35000, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting_laundry`
--

CREATE TABLE `tbl_setting_laundry` (
  `id` int(5) NOT NULL,
  `kd_setting` varchar(100) NOT NULL,
  `caption` varchar(200) NOT NULL,
  `value` varchar(200) NOT NULL,
  `active` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_setting_laundry`
--

INSERT INTO `tbl_setting_laundry` (`id`, `kd_setting`, `caption`, `value`, `active`) VALUES
(1, 'main_color', 'Warna utama', '#0ab59e', '1'),
(2, 'laundry_name', 'Nama Laundry', 'Nadha Laundry', '1'),
(3, 'address', 'Alamat', 'Jln. Pantai Cermin, No. 59, Indomaret', '1'),
(4, 'email', 'Email', '-', '1'),
(5, 'hp', 'Nomor Handhone', '-', '1'),
(6, 'kota', 'Kota', 'Perbaungan', '1'),
(7, 'provinsi', 'Provinsi', 'Sumatera Utara', '1'),
(8, 'kabupaten', 'Kabupaten', 'Serdang Bedagai', '1'),
(9, 'kode_pos', 'Kode Pos', '20986', '1'),
(10, 'auto_redeem', 'Otomatis redeem point ', '1000', '1'),
(11, 'saldo_awal', 'Saldo awal laundry', '3000000', '1'),
(12, 'tahun_release', 'Tahun pembukuan awal laundry', '2020', '1'),
(13, 'server_backup', 'Alamat API server untuk backup data data laundry', 'http://service.haxors.or.id/backup', '1'),
(14, 'api_key', 'API key yang digunakan sebagai penanda client ke server NadhaMedia. Digunakan untuk backup/restore data ke aplikasi client', '-', '1'),
(15, 'email_host', 'Email untuk pengiriman notifikasi ke pelanggan', '-', '1'),
(16, 'email_host_password', 'Password email untuk notifikasi ke pelanggan', '-', '1'),
(17, 'api_key_wa', 'API Key Whatsapp, dapatkan di waresponder.co.id', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_temp_item_cucian`
--

CREATE TABLE `tbl_temp_item_cucian` (
  `id` int(10) NOT NULL,
  `kd_temp` varchar(50) NOT NULL,
  `kd_room` varchar(30) NOT NULL,
  `kd_item` varchar(30) NOT NULL,
  `harga_at` int(20) NOT NULL,
  `qt` double NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_timeline`
--

CREATE TABLE `tbl_timeline` (
  `id` int(10) NOT NULL,
  `kd_timeline` varchar(50) DEFAULT NULL,
  `kd_service` varchar(20) DEFAULT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `admin` varchar(50) DEFAULT NULL,
  `kd_event` varchar(50) DEFAULT NULL,
  `caption` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi_point`
--

CREATE TABLE `tbl_transaksi_point` (
  `id` int(5) NOT NULL,
  `token` varchar(11) NOT NULL,
  `username` varchar(111) NOT NULL,
  `waktu_pick` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `point` int(5) NOT NULL,
  `operator` varchar(51) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tipe_user` varchar(20) NOT NULL,
  `active` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `last_login`, `tipe_user`, `active`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2020-06-15 19:53:58', 'admin', '1'),
(4, 'aditia', '21232f297a57a5a743894a0e4a801fc3', '2020-04-25 20:20:52', 'admin', '1'),
(5, 'arafahmuldianty', '21232f297a57a5a743894a0e4a801fc3', '2020-04-26 00:41:33', 'operator', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_arus_kas`
--
ALTER TABLE `tbl_arus_kas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bantuan`
--
ALTER TABLE `tbl_bantuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_broadcast_pesan`
--
ALTER TABLE `tbl_broadcast_pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kartu_laundry`
--
ALTER TABLE `tbl_kartu_laundry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_laundry_room`
--
ALTER TABLE `tbl_laundry_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_level_user`
--
ALTER TABLE `tbl_level_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pengeluaran`
--
ALTER TABLE `tbl_pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_promo_code`
--
ALTER TABLE `tbl_promo_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_remote_service`
--
ALTER TABLE `tbl_remote_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_setting_laundry`
--
ALTER TABLE `tbl_setting_laundry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_temp_item_cucian`
--
ALTER TABLE `tbl_temp_item_cucian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_timeline`
--
ALTER TABLE `tbl_timeline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transaksi_point`
--
ALTER TABLE `tbl_transaksi_point`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_arus_kas`
--
ALTER TABLE `tbl_arus_kas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_bantuan`
--
ALTER TABLE `tbl_bantuan`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_broadcast_pesan`
--
ALTER TABLE `tbl_broadcast_pesan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_kartu_laundry`
--
ALTER TABLE `tbl_kartu_laundry`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_laundry_room`
--
ALTER TABLE `tbl_laundry_room`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_level_user`
--
ALTER TABLE `tbl_level_user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_pengeluaran`
--
ALTER TABLE `tbl_pengeluaran`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_promo_code`
--
ALTER TABLE `tbl_promo_code`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_remote_service`
--
ALTER TABLE `tbl_remote_service`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_setting_laundry`
--
ALTER TABLE `tbl_setting_laundry`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_temp_item_cucian`
--
ALTER TABLE `tbl_temp_item_cucian`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_timeline`
--
ALTER TABLE `tbl_timeline`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_transaksi_point`
--
ALTER TABLE `tbl_transaksi_point`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
