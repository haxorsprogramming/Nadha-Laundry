-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 14, 2020 at 11:57 PM
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

--
-- Dumping data for table `tbl_arus_kas`
--

INSERT INTO `tbl_arus_kas` (`id`, `kd_kas`, `kd_tracking`, `asal`, `arus`, `jumlah`, `waktu`, `operator`) VALUES
(1, 'viwhykecgCPHIfA', 'INV-2020-05-30-UP49', 'pembayaran_cucian', 'masuk', 27000, '2020-05-30 02:55:02', 'admin'),
(2, 'VHUaAWjXkDilhvg', '05-2020-OEN', 'pengeluaran_laundry', 'keluar', 100000, '2020-05-31 14:32:21', 'admin'),
(4, 'gofjyvBDEXdabYG', 'INV-2020-06-09-UO70', 'pembayaran_cucian', 'masuk', 56160, '2020-06-08 18:10:16', 'admin'),
(5, 'fbFLQHDEUNZgzGa', 'INV-2020-06-09-NL64', 'pembayaran_cucian', 'masuk', 57800, '2020-06-08 18:14:09', 'admin'),
(6, 'cJatfMQSPbvGVkD', '06-2020-NNK', 'pengeluaran_laundry', 'keluar', 50000, '2020-06-08 18:15:38', 'admin'),
(7, 'GQqmiMDsHuNrxTL', 'INV-2020-06-14-ED16', 'pembayaran_cucian', 'masuk', 7200, '2020-06-14 15:48:31', 'admin'),
(8, 'xlJgTIRuhpzLUCr', 'INV-2020-06-15-OZ19', 'pembayaran_cucian', 'masuk', 25200, '2020-06-14 21:31:43', 'admin');

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
(3, 'VSJUsOxHzw', 'Promo mahasiswa', 'Halo {pelanggan}, kita lagi ada promo buat mahasiswa nih, silahkan masukkan kode promo PROMOMHS untuk mendapatkan promo 5%, ditunggu ya ... ', 'langsung', '2020-06-14 21:45:44', 'sukses'),
(4, 'XvfzybYmWO', 'Promo mahasiswa 2021', 'Halo {pelanggan}, kita lagi ada promo buat mahasiswa nih, silahkan masukkan kode promo PROMOMHS untuk mendapatkan promo 5%, ditunggu ya ...', 'terjadwal', '2020-06-23 17:00:00', 'pending');

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

--
-- Dumping data for table `tbl_kartu_laundry`
--

INSERT INTO `tbl_kartu_laundry` (`id`, `kode_service`, `pelanggan`, `waktu_masuk`, `waktu_selesai`, `waktu_diambil`, `pembayaran`, `operator`, `status`) VALUES
(1, 'UP495278MYKJ', 'dianavita', '2020-05-26 11:08:20', '2020-06-14 15:44:02', '0000-00-00 00:00:00', 'selesai', 'admin', 'finishcuci'),
(2, 'EJ965740HZJN', 'dianavita', '2020-05-30 02:47:50', '2020-06-14 15:42:41', '0000-00-00 00:00:00', 'pending', 'admin', 'finishcuci'),
(3, 'UO703981FUCB', 'dianavita', '2020-06-08 16:33:07', '2020-06-14 15:33:49', '2020-06-14 15:42:01', 'selesai', 'admin', 'finishcuci'),
(4, 'ED167940XSWB', 'adityadarmanst', '2020-06-08 18:07:53', '2020-06-14 15:46:25', '2020-06-14 15:48:51', 'selesai', 'admin', 'finishcuci'),
(5, 'NL647130OGXS', 'kurniawan', '2020-06-08 18:12:50', '2020-06-08 18:14:47', '2020-06-08 18:14:56', 'selesai', 'admin', 'finishcuci'),
(6, 'OZ196502IFPU', 'adityadarmanst', '2020-06-14 16:25:10', '2020-06-14 21:31:56', '0000-00-00 00:00:00', 'selesai', 'admin', 'finishcuci');

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

--
-- Dumping data for table `tbl_laundry_room`
--

INSERT INTO `tbl_laundry_room` (`id`, `kd_room`, `kd_kartu`, `total_harga`, `operator`, `status`) VALUES
(1, 'ND542601WEVN', 'UP495278MYKJ', 27000, 'admin', 'finish'),
(2, 'DS862514AIGY', 'EJ965740HZJN', 15000, 'admin', 'finish'),
(3, 'HZ182736ERMS', 'UO703981FUCB', 62400, 'admin', 'finish'),
(4, 'SM724983IUSN', 'ED167940XSWB', 8000, 'admin', 'finish'),
(5, 'CD169028TKJZ', 'NL647130OGXS', 68000, 'admin', 'finish'),
(6, 'CF409382VAGS', 'OZ196502IFPU', 28000, 'admin', 'finish');

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
(2, 'kurniawan', 'Kurniawan Putra', 'Medan Barat', '082370940928', 'kurniawanputra@gmail.com', 'Basic', 0, 5, '1', '2020-06-14 16:04:19'),
(3, 'adityadarmanst', 'Aditia Darma Nst', 'Perbaungan', '082272177022', 'alditha.forum@gmail.com', 'Basic', 0, 10, '1', '2020-06-14 21:31:43'),
(5, 'akhyarie', 'Akhyarie', 'Medan', '082323026919', 'akhyarie@gmail.com', 'Gold', 0, 0, '1', '2020-06-14 21:44:24');

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

--
-- Dumping data for table `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`id`, `kd_pembayaran`, `kd_kartu`, `waktu`, `total_cuci`, `diskon`, `kode_promo`, `total_final`, `tunai`, `operator`) VALUES
(1, 'INV-2020-05-30-UP49', 'UP495278MYKJ', '2020-05-30 02:55:02', 27000, 0, '', 27000, 30000, 'admin'),
(2, 'INV-2020-06-09-UO70', 'UO703981FUCB', '2020-06-08 18:10:16', 62400, 6240, 'PROMOMHS', 56160, 60000, 'admin'),
(3, 'INV-2020-06-09-NL64', 'NL647130OGXS', '2020-06-08 18:14:09', 68000, 10200, 'PROMOLEBARAN', 57800, 60000, 'admin'),
(4, 'INV-2020-06-14-ED16', 'ED167940XSWB', '2020-06-14 15:48:31', 8000, 800, 'PROMOMHS', 7200, 10000, 'admin'),
(5, 'INV-2020-06-15-OZ19', 'OZ196502IFPU', '2020-06-14 21:31:43', 28000, 2800, 'PROMOMHS', 25200, 30000, 'admin');

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

--
-- Dumping data for table `tbl_pengeluaran`
--

INSERT INTO `tbl_pengeluaran` (`id`, `kd_pengeluaran`, `pengeluaran`, `keterangan`, `waktu`, `jumlah`, `operator`) VALUES
(1, '05-2020-OEN', 'Listrik', 'Pembelian token listrik mingguan', '2020-05-31 00:00:00', 100000, 'admin'),
(3, '06-2020-NNK', 'Listrik', 'Pembelian token listrik mingguan', '2020-06-09 00:00:00', 50000, 'admin');

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
(7, 'TAHUNBARU5', 'Promo tahun baru ', 5, '2020-05-22', '2020-05-22', 100, 'y'),
(8, 'PROMOADH', 'Promo suka suka kita', 20, '2020-05-22', '2020-05-22', 100, 'y');

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

--
-- Dumping data for table `tbl_temp_item_cucian`
--

INSERT INTO `tbl_temp_item_cucian` (`id`, `kd_temp`, `kd_room`, `kd_item`, `harga_at`, `qt`, `total`) VALUES
(1, 'Kxkqovudcg', 'UP495278MYKJ', 'ZVL17359WK', 5000, 5.4, 27000),
(2, 'DYTBflcyZi', 'EJ965740HZJN', 'ZVL17359WK', 5000, 3, 15000),
(3, 'SNmuIthPeZ', 'UO703981FUCB', 'OUA28594JH', 50000, 1, 50000),
(4, 'umlcvsyJRG', 'UO703981FUCB', 'TXP28695AC', 4000, 3.1, 12400),
(5, 'vQJANIcBVO', 'NL647130OGXS', 'TXP28695AC', 4000, 9.5, 38000),
(6, 'ChSwcFpgRa', 'NL647130OGXS', 'LCD87416QB', 30000, 1, 30000),
(7, 'zWUPKYOgRb', 'ED167940XSWB', 'TXP28695AC', 4000, 2, 8000),
(8, 'sqVTWoNrmd', 'OZ196502IFPU', 'ZVL17359WK', 5000, 5.6, 28000);

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

--
-- Dumping data for table `tbl_timeline`
--

INSERT INTO `tbl_timeline` (`id`, `kd_timeline`, `kd_service`, `waktu`, `admin`, `kd_event`, `caption`) VALUES
(1, 'uCWvBxXoYhPAsNT', 'UP495278MYKJ', '2020-05-26 11:08:20', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(2, 'zesEPDtYrmuxIFq', 'UP495278MYKJ', '2020-05-26 11:08:31', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(3, 'VCtpPeUAujrRkGn', 'EJ965740HZJN', '2020-05-30 02:47:50', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(4, 'GVNcXSHdkjmbhas', 'UP495278MYKJ', '2020-05-30 02:55:02', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(5, 'tGTESiWQRlOFdkg', 'UO703981FUCB', '2020-06-08 16:33:07', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(6, 'FpXyithDuSMaAkT', 'EJ965740HZJN', '2020-06-08 17:49:23', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(7, 'ncFWyrCPRExgpBZ', 'UO703981FUCB', '2020-06-08 17:49:36', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(8, 'jctvMwZdSHepAOU', 'ED167940XSWB', '2020-06-08 18:07:53', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(9, 'tOGxQBZnrCIwdmM', 'UO703981FUCB', '2020-06-08 18:10:16', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(10, 'wcgklLdNSfHMZUe', 'NL647130OGXS', '2020-06-08 18:12:50', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(11, 'wOdkavGMYxfLgUt', 'NL647130OGXS', '2020-06-08 18:13:18', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(12, 'MboZfqjpJrgxXUG', 'NL647130OGXS', '2020-06-08 18:14:09', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(13, 'tgCIjpkbGimUxal', 'NL647130OGXS', '2020-06-08 18:14:47', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(14, 'WnwjPcxMHvsfTUa', 'NL647130OGXS', '2020-06-08 18:14:56', 'admin', 'pick_up', 'Cucian telah diambil'),
(15, 'fMsxYiQcaNIyRpO', 'UO703981FUCB', '2020-06-14 15:33:49', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(16, 'eZEDBJpLSHtRawK', 'UO703981FUCB', '2020-06-14 15:42:01', 'admin', 'pick_up', 'Cucian telah diambil'),
(17, 'nbHVBqJvRtTXMLk', 'EJ965740HZJN', '2020-06-14 15:42:41', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(18, 'kMJhzsyALoETHYB', 'UP495278MYKJ', '2020-06-14 15:44:02', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(19, 'PtyclzGgRSVKhZq', 'ED167940XSWB', '2020-06-14 15:44:30', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(20, 'ZeJyiaAsXnWObdQ', 'ED167940XSWB', '2020-06-14 15:46:25', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(21, 'fpyShXoIMmWxswj', 'ED167940XSWB', '2020-06-14 15:48:31', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(22, 'CuOfRSFjxevBgGH', 'ED167940XSWB', '2020-06-14 15:48:51', 'admin', 'pick_up', 'Cucian telah diambil'),
(23, 'tHcrdqnPgphMOvU', 'OZ196502IFPU', '2020-06-14 16:25:10', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(24, 'adOrEqeCZmBPFVz', 'OZ196502IFPU', '2020-06-14 21:31:23', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(25, 'GOKucMCbTNpmYvj', 'OZ196502IFPU', '2020-06-14 21:31:43', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(26, 'bwYvCDJBgjlutxa', 'OZ196502IFPU', '2020-06-14 21:31:56', 'admin', 'cucian_selesai', 'Cucian telah selesai');

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
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2020-06-14 14:52:29', 'admin', '1'),
(2, 'operator_1', '21232f297a57a5a743894a0e4a801fc3', '2020-02-18 14:26:36', 'operator', '1'),
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
-- AUTO_INCREMENT for table `tbl_broadcast_pesan`
--
ALTER TABLE `tbl_broadcast_pesan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
