-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 26, 2020 at 07:14 AM
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
(4, 'iSxpbvBFrotywUe', 'INV-2020-04-24-FU95', 'pembayaran_cucian', 'masuk', 69084, '2020-04-24 14:27:16', 'admin'),
(6, 'KESJTILfMqojYhb', '04-2020-UKB', 'pengeluaran_laundry', 'keluar', 50000, '2020-04-24 16:27:56', 'admin'),
(7, 'TdxSpvOXwDhmMUJ', '04-2020-QEJ', 'pengeluaran_laundry', 'keluar', 90000, '2020-04-24 16:28:20', 'admin'),
(8, 'alCQGLnvducxRDM', '04-2020-CYE', 'pengeluaran_laundry', 'keluar', 600000, '2020-04-24 16:28:42', 'admin'),
(9, 'TXhRFUbKyLPZnom', '04-2020-ZMW', 'pengeluaran_laundry', 'keluar', 900000, '2020-04-24 16:31:34', 'admin'),
(10, 'oQxLnXSBFbIspTg', 'INV-2020-04-25-DK02', 'pembayaran_cucian', 'masuk', 22500, '2020-04-24 18:54:01', 'admin'),
(11, 'lpqkdIcsKjBYrXw', 'INV-2020-04-25-VG31', 'pembayaran_cucian', 'masuk', 60000, '2020-04-24 19:03:02', 'admin'),
(12, 'tdgbTKAMOGfLNeh', 'INV-2020-04-26-TK30', 'pembayaran_cucian', 'masuk', 9500, '2020-04-26 01:17:13', 'admin'),
(13, 'UXlJLTnDjKHBzsv', 'INV-2020-04-27-CV50', 'pembayaran_cucian', 'masuk', 43434, '2020-04-27 01:30:02', 'admin'),
(14, 'gNbMYzoxLGCIVuW', 'INV-2020-04-27-IB89', 'pembayaran_cucian', 'masuk', 25650, '2020-04-27 01:33:12', 'admin'),
(15, 'BxqjkhYEDQIJmAV', 'INV-2020-04-27-BQ07', 'pembayaran_cucian', 'masuk', 47520, '2020-04-27 03:47:41', 'admin'),
(16, 'fPXkCgAFKsJLUSi', 'INV-2020-04-28-PM40', 'pembayaran_cucian', 'masuk', 9000, '2020-04-28 04:57:27', 'operator_1'),
(17, 'nfCIQHypUdGzRht', '04-2020-TFC', 'pengeluaran_laundry', 'keluar', 40000, '2020-04-28 04:58:21', 'admin'),
(18, 'XmPqSpfhekoGEyA', 'INV-2020-05-01-YP45', 'pembayaran_cucian', 'masuk', 117000, '2020-05-01 01:46:42', 'admin'),
(19, 'KLvgaiQTysljBZH', 'INV-2020-05-04-HZ87', 'pembayaran_cucian', 'masuk', 50018, '2020-05-04 04:01:04', 'admin'),
(20, 'BKCasNZblGwOnvF', 'INV-2020-05-04-GD15', 'pembayaran_cucian', 'masuk', 18810, '2020-05-04 04:02:00', 'admin'),
(21, 'dBSXteTjMgrGcim', '05-2020-JZF', 'pengeluaran_laundry', 'keluar', 50000, '2020-05-04 04:04:18', 'admin'),
(22, 'zeidcNhXfVLvlwq', 'INV-2020-05-06-PO16', 'pembayaran_cucian', 'masuk', 108000, '2020-05-06 05:18:05', 'admin'),
(23, 'SOwACnxErMWXmcH', 'INV-2020-05-10-BA51', 'pembayaran_cucian', 'masuk', 20000, '2020-05-10 14:55:25', 'admin'),
(24, 'HoPIEXRUzqmSskZ', 'INV-2020-05-10-VQ36', 'pembayaran_cucian', 'masuk', 13300, '2020-05-10 14:59:19', 'admin'),
(25, 'unFUXsRQHhMmwyL', 'INV-2020-05-10-FR58', 'pembayaran_cucian', 'masuk', 65880, '2020-05-10 15:31:55', 'admin'),
(26, 'zNeoctZlBGuTPDF', 'INV-2020-05-14-YN07', 'pembayaran_cucian', 'masuk', 36594, '2020-05-13 18:16:34', 'admin'),
(27, 'JRBvCXaAOdrMfWs', 'INV-2020-05-17-KV36', 'pembayaran_cucian', 'masuk', 23490, '2020-05-17 16:39:12', 'admin'),
(28, 'JRhdxQlwAeKYGBo', '05-2020-CNI', 'pengeluaran_laundry', 'keluar', 57000, '2020-05-17 17:30:18', 'admin'),
(29, 'sVgnBwJzRveDAtC', 'INV-2020-05-18-TJ82', 'pembayaran_cucian', 'masuk', 34200, '2020-05-18 13:24:19', 'admin'),
(30, 'xSfIXtFpnTzBGEm', 'INV-2020-05-19-MP70', 'pembayaran_cucian', 'masuk', 77520, '2020-05-18 18:21:41', 'admin'),
(31, 'jShOKTuZvedlsEQ', 'INV-2020-05-19-CV29', 'pembayaran_cucian', 'masuk', 182800, '2020-05-18 18:24:50', 'admin'),
(32, 'OaNzAEPnGiCXhmq', 'INV-2020-05-19-BY45', 'pembayaran_cucian', 'masuk', 22400, '2020-05-18 20:16:24', 'admin'),
(33, 'yJnMIDOdaPBfHXi', 'INV-2020-05-19-BK71', 'pembayaran_cucian', 'masuk', 171000, '2020-05-18 20:19:22', 'admin'),
(34, 'aIyJYjPSdoOwGAi', '05-2020-XBS', 'pengeluaran_laundry', 'keluar', 15000, '2020-05-18 20:32:58', 'admin'),
(35, 'mvgFzsLNQKdnPjY', 'INV-2020-05-19-BZ98', 'pembayaran_cucian', 'masuk', 32400, '2020-05-19 14:26:26', 'arafahmuldianty'),
(36, 'LMZKDEmFbrxckBt', 'INV-2020-05-19-NY59', 'pembayaran_cucian', 'masuk', 97200, '2020-05-19 15:39:20', 'admin'),
(37, 'jmQqvIiydKtpwGW', 'INV-2020-05-19-IP26', 'pembayaran_cucian', 'masuk', 43200, '2020-05-19 16:37:18', 'admin'),
(38, 'ZgXHGtdaqszWxpm', 'INV-2020-05-21-DF84', 'pembayaran_cucian', 'masuk', 22230, '2020-05-21 13:08:22', 'admin'),
(39, 'tkKNTRzhBmeFPrf', 'INV-2020-05-22-UJ58', 'pembayaran_cucian', 'masuk', 9000, '2020-05-22 10:05:58', 'admin'),
(40, 'moTjnKXRGHFiNPc', 'INV-2020-05-22-MO02', 'pembayaran_cucian', 'masuk', 20800, '2020-05-22 10:06:34', 'admin'),
(41, 'VTmErFgMZtRyzva', 'INV-2020-05-22-FB71', 'pembayaran_cucian', 'masuk', 8000, '2020-05-22 10:07:01', 'admin'),
(42, 'xtjzeFdMBuilkUR', 'INV-2020-05-26-YR81', 'pembayaran_cucian', 'masuk', 9000, '2020-05-26 03:08:19', 'admin');

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
(8, 'UX082654OETS', 'nauracha', '2020-04-17 21:38:17', '2020-04-22 18:53:23', '2020-05-06 05:12:37', 'selesai', 'admin', 'finishcuci'),
(9, 'CF461358OPTG', 'siskaaulia', '2020-04-17 21:42:49', '2020-04-17 22:51:50', '2020-04-17 22:54:35', 'selesai', 'admin', 'finishcuci'),
(10, 'MZ958743EXKV', 'hamidahkurnia', '2020-04-17 21:47:53', '2020-04-17 21:58:30', '2020-04-17 22:06:02', 'selesai', 'admin', 'finishcuci'),
(11, 'HJ756980UCAL', 'misbahulumami', '2020-04-17 21:52:37', '2020-04-17 21:58:49', '2020-04-18 18:14:34', 'selesai', 'admin', 'finishcuci'),
(12, 'HS581429KBPW', 'ulfazulfiana', '2020-04-17 22:57:29', '2020-04-24 19:02:19', '2020-05-06 05:13:04', 'selesai', 'admin', 'finishcuci'),
(13, 'YI867910JVKF', 'atikaoktananda', '2020-04-17 23:10:48', '2020-05-04 04:02:26', '2020-05-06 05:13:22', 'selesai', 'admin', 'finishcuci'),
(14, 'GF025849ULVA', 'aditiadarmanst', '2020-04-17 23:16:21', '2020-04-18 18:18:02', '2020-05-06 05:14:56', 'selesai', 'admin', 'finishcuci'),
(15, 'JY798043KPLW', 'misbahulumami', '2020-04-18 18:11:54', '2020-04-18 18:13:02', '2020-04-18 18:14:05', 'selesai', 'admin', 'finishcuci'),
(16, 'AC506129FAOG', 'pashasiregar', '2020-04-18 18:19:41', '2020-04-24 18:47:47', '2020-05-06 05:15:51', 'selesai', 'admin', 'finishcuci'),
(17, 'WN854736WKJU', 'niniasintia', '2020-04-18 18:19:49', '2020-05-01 01:42:29', '2020-05-06 05:15:39', 'selesai', 'admin', 'finishcuci'),
(18, 'NG479280AUJM', 'auliaasyifa', '2020-04-18 18:21:39', '2020-05-01 01:42:07', '2020-05-06 05:15:15', 'selesai', 'admin', 'finishcuci'),
(19, 'FU953482AMOZ', 'gunawan', '2020-04-18 18:21:46', '2020-04-24 18:46:59', '2020-05-06 05:14:09', 'selesai', 'admin', 'finishcuci'),
(20, 'IE654238AFUW', 'aditiadarmanst', '2020-04-18 21:42:49', '2020-04-18 21:43:53', '2020-04-22 18:30:41', 'selesai', 'admin', 'finishcuci'),
(21, 'SF416570WKEG', 'budiputranto', '2020-04-23 20:11:38', '2020-04-24 18:47:23', '2020-05-06 05:13:52', 'selesai', 'admin', 'finishcuci'),
(22, 'DK023895QLIT', 'niniasintia', '2020-04-23 20:11:44', '2020-05-01 01:41:54', '2020-05-04 04:03:33', 'selesai', 'admin', 'finishcuci'),
(23, 'VG316547FNGC', 'atikaoktananda', '2020-04-23 20:11:49', '2020-05-01 01:41:45', '2020-05-06 05:12:23', 'selesai', 'admin', 'finishcuci'),
(24, 'TK302684RFHG', 'hendrypurnomo', '2020-04-24 19:03:38', '2020-05-01 01:42:18', '2020-05-06 05:16:43', 'selesai', 'admin', 'finishcuci'),
(25, 'IB893456COLD', 'yusufamiruddin', '2020-04-26 00:27:25', '2020-04-28 04:48:04', '2020-05-01 01:44:23', 'selesai', 'admin', 'finishcuci'),
(26, 'CV504169JAHM', 'hendrypurnomo', '2020-04-27 01:28:47', '2020-04-27 03:46:59', '2020-05-06 05:16:30', 'selesai', 'admin', 'finishcuci'),
(27, 'BQ071642GPNY', 'atikaoktananda', '2020-04-27 01:28:53', '2020-04-28 04:44:00', '2020-05-06 05:16:18', 'selesai', 'admin', 'finishcuci'),
(28, 'PM405689CKRB', 'niniasintia', '2020-04-28 04:51:22', '2020-05-01 01:41:35', '2020-05-01 01:42:57', 'selesai', 'operator_1', 'finishcuci'),
(29, 'GD154327ATXB', 'hasnahnurardita', '2020-05-01 01:44:59', '2020-05-04 04:02:15', '2020-05-05 10:42:15', 'selesai', 'admin', 'finishcuci'),
(30, 'YP456870ASCF', 'mileasubedu', '2020-05-01 01:45:05', '2020-05-01 06:44:28', '2020-05-04 04:03:18', 'selesai', 'admin', 'finishcuci'),
(31, 'HZ874135DUCH', 'hamidahkurnia', '2020-05-01 01:45:11', '2020-05-04 04:01:22', '2020-05-04 04:03:05', 'selesai', 'admin', 'finishcuci'),
(32, 'VQ364798YGCD', 'auliaasyifa', '2020-05-05 12:27:26', '2020-05-10 15:29:59', '2020-05-22 10:07:29', 'selesai', 'admin', 'finishcuci'),
(33, 'BA513829VTUS', 'pricilialala', '2020-05-05 12:27:35', '2020-05-10 15:29:43', '0000-00-00 00:00:00', 'selesai', 'admin', 'finishcuci'),
(34, 'PO167359ZBJN', 'nauracha', '2020-05-06 05:17:01', '2020-05-10 14:54:53', '0000-00-00 00:00:00', 'selesai', 'admin', 'finishcuci'),
(35, 'TJ823574FHJZ', 'siskaaulia', '2020-05-06 05:17:09', '2020-05-18 18:22:29', '0000-00-00 00:00:00', 'selesai', 'admin', 'finishcuci'),
(36, 'FR580624IGLJ', 'misbahulumami', '2020-05-10 15:31:02', '2020-05-13 18:15:14', '0000-00-00 00:00:00', 'selesai', 'admin', 'finishcuci'),
(37, 'MP704325JBUV', 'hamidahkurnia', '2020-05-10 15:31:08', '2020-05-18 18:22:18', '0000-00-00 00:00:00', 'selesai', 'admin', 'finishcuci'),
(38, 'YN074639NTIX', 'auliaasyifa', '2020-05-13 18:15:32', '2020-05-18 13:24:35', '0000-00-00 00:00:00', 'selesai', 'admin', 'finishcuci'),
(39, 'KV368920AFSQ', 'gunawan', '2020-05-13 18:15:37', '2020-05-18 13:23:49', '2020-05-18 18:22:39', 'selesai', 'admin', 'finishcuci'),
(40, 'NY592361RJBK', 'gunawan', '2020-05-18 18:23:05', '2020-05-19 15:39:44', '0000-00-00 00:00:00', 'selesai', 'admin', 'finishcuci'),
(41, 'BK718640KIAF', 'mileasubedu', '2020-05-18 18:23:10', '2020-05-18 20:30:36', '0000-00-00 00:00:00', 'selesai', 'admin', 'finishcuci'),
(42, 'CV293781XGQC', 'misbahulumami', '2020-05-18 18:23:16', '2020-05-18 20:18:55', '0000-00-00 00:00:00', 'selesai', 'admin', 'finishcuci'),
(43, 'BY450796AFOS', 'atikaoktananda', '2020-05-18 18:24:14', '2020-05-18 20:18:51', '0000-00-00 00:00:00', 'selesai', 'admin', 'finishcuci'),
(44, 'BZ983421PTZV', 'gunawan', '2020-05-18 20:08:19', '2020-05-19 15:38:44', '2020-05-19 15:38:55', 'selesai', 'admin', 'finishcuci'),
(45, 'AG189054PQHO', 'niniasintia', '2020-05-18 20:30:54', '2020-05-18 20:32:04', '0000-00-00 00:00:00', 'pending', 'arafahmuldianty', 'finishcuci'),
(46, 'FB716034VNCA', 'dianavita', '2020-05-19 15:38:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'selesai', 'admin', 'cuci'),
(48, 'MO027846UXLZ', 'atikaoktananda', '2020-05-19 16:35:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'selesai', 'admin', 'cuci'),
(49, 'IP263081HPBJ', 'niniasintia', '2020-05-19 16:35:19', '2020-05-19 19:43:05', '0000-00-00 00:00:00', 'selesai', 'admin', 'finishcuci'),
(50, 'UJ589703MOSJ', 'gunawan', '2020-05-21 13:07:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'selesai', 'admin', 'cuci'),
(51, 'DF841235PKHV', 'rifkymuflidan', '2020-05-21 13:07:21', '2020-05-21 13:07:57', '2020-05-21 13:08:35', 'selesai', 'admin', 'finishcuci'),
(52, 'YR814723PFYA', 'aditiadarmanst', '2020-05-26 03:07:55', '2020-05-26 03:08:35', '0000-00-00 00:00:00', 'selesai', 'admin', 'finishcuci'),
(53, 'SB045291BGPD', 'aditiadarmanst', '2020-05-26 03:09:35', '2020-05-26 03:09:52', '0000-00-00 00:00:00', 'pending', 'admin', 'finishcuci'),
(54, 'BR609345WFMK', 'hasnahnurardita', '2020-05-26 03:11:56', '2020-05-26 03:12:11', '0000-00-00 00:00:00', 'pending', 'admin', 'finishcuci');

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
(8, 'AZ821506IADW', 'UX082654OETS', 16800, 'admin', 'finish'),
(9, 'VD503147WAKO', 'CF461358OPTG', 25200, 'admin', 'finish'),
(10, 'MQ397840NUPL', 'MZ958743EXKV', 21500, 'admin', 'finish'),
(11, 'AB295073RMZY', 'HJ756980UCAL', 138000, 'admin', 'finish'),
(12, 'BZ301627DPRA', 'HS581429KBPW', 39200, 'admin', 'finish'),
(13, 'JO976128LEUD', 'YI867910JVKF', 16000, 'admin', 'finish'),
(14, 'NR348705DTBU', 'GF025849ULVA', 48000, 'admin', 'finish'),
(15, 'XQ092137XMUO', 'JY798043KPLW', 30000, 'admin', 'finish'),
(16, 'FP734201BOGI', 'AC506129FAOG', 74400, 'admin', 'finish'),
(17, 'WM852716WKPR', 'WN854736WKJU', 41000, 'admin', 'finish'),
(18, 'DL278591PWIA', 'NG479280AUJM', 62000, 'admin', 'finish'),
(19, 'OW153748FTJS', 'FU953482AMOZ', 80800, 'admin', 'finish'),
(20, 'EG921038EPBO', 'IE654238AFUW', 16800, 'admin', 'finish'),
(21, 'MT046589TZNA', 'SF416570WKEG', 22500, 'admin', 'finish'),
(22, 'UZ631429XRCU', 'DK023895QLIT', 25000, 'admin', 'finish'),
(23, 'DV451209WQGN', 'VG316547FNGC', 60000, 'admin', 'finish'),
(24, 'AM739821RUTD', 'TK302684RFHG', 10000, 'admin', 'finish'),
(25, 'QB013825ERIK', 'IB893456COLD', 30000, 'admin', 'finish'),
(26, 'PF802659CLPE', 'CV504169JAHM', 50800, 'admin', 'finish'),
(27, 'XR347609TEBW', 'BQ071642GPNY', 52800, 'admin', 'finish'),
(28, 'UC751698WNJA', 'PM405689CKRB', 10000, 'admin', 'finish'),
(29, 'XL769238YSRZ', 'GD154327ATXB', 22000, 'admin', 'finish'),
(30, 'OU847105LMEX', 'YP456870ASCF', 130000, 'admin', 'finish'),
(31, 'TP639241JIMG', 'HZ874135DUCH', 58500, 'admin', 'finish'),
(32, 'QD409521JMTL', 'VQ364798YGCD', 14000, 'admin', 'finish'),
(33, 'MD029857LPEV', 'BA513829VTUS', 20000, 'admin', 'finish'),
(34, 'FA064531MUSP', 'PO167359ZBJN', 120000, 'admin', 'finish'),
(35, 'DR365982FQIC', 'TJ823574FHJZ', 38000, 'admin', 'finish'),
(36, 'ML896403DFAY', 'FR580624IGLJ', 73200, 'admin', 'finish'),
(37, 'IE709532MEGJ', 'MP704325JBUV', 81600, 'admin', 'finish'),
(38, 'SQ491508JTOW', 'YN074639NTIX', 42800, 'admin', 'finish'),
(39, 'YB256870TKJN', 'KV368920AFSQ', 29000, 'admin', 'finish'),
(40, 'YP209167GJSR', 'NY592361RJBK', 108000, 'admin', 'finish'),
(41, 'BZ850947RDBO', 'BK718640KIAF', 200000, 'admin', 'finish'),
(42, 'XV826419WJPD', 'CV293781XGQC', 182800, 'admin', 'finish'),
(43, 'YM503679VDLX', 'BY450796AFOS', 22400, 'admin', 'finish'),
(44, 'QK237850AUHB', 'BZ983421PTZV', 40000, 'admin', 'finish'),
(45, 'FK120649YQXH', 'AG189054PQHO', 50000, 'arafahmuldianty', 'finish'),
(46, 'SL953681JGKV', 'FB716034VNCA', 0, 'admin', 'cuci'),
(48, 'GH648291VKDO', 'MO027846UXLZ', 0, 'admin', 'cuci'),
(49, 'SZ463257UFAM', 'IP263081HPBJ', 48000, 'admin', 'finish'),
(50, 'SC497380BQSA', 'UJ589703MOSJ', 0, 'admin', 'cuci'),
(51, 'NL502793AQED', 'DF841235PKHV', 26000, 'admin', 'finish'),
(52, 'VZ190342BJVF', 'YR814723PFYA', 10000, 'admin', 'finish'),
(53, 'DO870423SDPU', 'SB045291BGPD', 20000, 'admin', 'finish'),
(54, 'WA042917YENT', 'BR609345WFMK', 10000, 'admin', 'finish');

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
(9, 'aditiadarmanst', 'Aditia Darma Nst', 'Perbaungan', '0822272177022', 'alditha.forum@gmail.com', 'Basic', 0, 15, '1', '2020-05-26 03:08:19'),
(10, 'hasnahnurardita', 'Hasnah Nur Ardita', 'Medan Sunggal', '087826771288', 'hi@nadha.id', 'Gold', 0, 10, '1', '2020-05-04 04:02:00'),
(12, 'dianavita', 'Diana Vita', 'Lima puluh', '08982788122', 'diana.vita@gmai.com', 'Basic', 0, 5, '1', '2020-05-22 10:07:01'),
(13, 'pashasiregar', 'Pasha Siregar', 'Melati II', '087822112211', 'pasha.siregar@gmail.com', 'Basic', 0, 10, '1', '2020-04-19 18:06:18'),
(14, 'siskaaulia', 'Siska Aulia', 'Medan Barat', '087822117822', 'siskaaulia@gmail.com', 'Basic', 0, 20, '1', '2020-05-18 13:24:19'),
(15, 'pricilialala', 'Prisilia Putri', 'Lubuk Pakam', '082154442322', 'lalaprici@gmail.com', 'Basic', 0, 10, '1', '2020-05-10 14:55:25'),
(16, 'hamidahkurnia', 'Hamidah Kurnia Putri', 'Perbaungan', '087812772211', 'hamidah.kurnia@gmail.com', 'Gold', 0, 40, '1', '2020-05-18 18:21:41'),
(17, 'misbahulumami', 'Misbahul Umami', 'Sei Buluh', '087822112278', 'misbahulumami@gmail.com', 'Basic', 0, 20, '1', '2020-05-18 18:24:50'),
(18, 'atikaoktananda', 'Atika Okta Nanda', 'Binjai', '087822112288', 'atikaokta@gmail.com', 'Basic', 0, 25, '1', '2020-05-22 10:06:34'),
(19, 'mileasubedu', 'Milea Putri Agustina', 'Jln. Gurilla', '087822117822', 'milea@gmail.com', 'Platinum', 0, 45, '1', '2020-05-18 20:19:22'),
(20, 'nauracha', 'Naura Khairunnisa', 'Medan Marelan', '087822117822', 'naura.kha@gmail.com', 'Basic', 0, 10, '1', '2020-05-06 05:18:05'),
(21, 'niniasintia', 'Narnia Yuli Kurnia', 'Lubuk Pakam', '087767228911', 'ninia@gmail.com', 'Basic', 0, 20, '1', '2020-05-19 16:37:18'),
(22, 'arafahmuldianty', 'Arafah Muldianty', 'Medan Perjuangan', '082289221277', 'erpahik@gmail.com', 'Gold', 0, 0, '1', '2020-04-10 10:51:54'),
(23, 'hendrypurnomo', 'Hendry Purnomo', 'Medan Marelan', '0821189221222', 'henry@gmail.com', 'Gold', 0, 20, '1', '2020-04-27 01:30:02'),
(24, 'gunawan', 'Gunawan', 'Tanjung Morawa', '087712882211', 'gunawan89@gmail.com', 'Platinum', 0, 75, '1', '2020-05-22 10:05:58'),
(25, 'ulfazulfiana', 'Ulfa Zulfiana Harahap', 'Tanjung Morawa', '0812902288822', 'ulfazz@gmail.com', 'Gold', 0, 10, '1', '2020-04-10 10:51:54'),
(26, 'budiputranto', 'Budi Ahmad Putranto', 'Jamin Ginting', '081290228922', 'budi12@gmail.com', 'Gold', 0, 10, '1', '2020-04-23 20:12:18'),
(27, 'yusufamiruddin', 'Yusuf Maulana Amiruddin', 'Medan Marelan', '082278221299', 'yusuf.maulana@gmail.com', 'Platinum', 0, 15, '1', '2020-04-27 01:33:12'),
(28, 'auliaasyifa', 'Aulia Asyifa Hasibuan', 'Lubuk Pakam', '0822781227822', 'auli.as@gmail.com', 'Gold', 0, 30, '1', '2020-05-13 18:16:34'),
(29, 'rifkymuflidan', 'Rifky Muflidan', 'Medan Marelan', '08227278112211', 'rifkymuflidan@gmail.com', 'Gold', 0, 10, '1', '2020-05-21 13:08:22'),
(30, 'rahminurullina', 'Rahmi Nurullina', 'Padang Panjang', '082212778922', 'rahminurullina@gmail.com', 'Basic', 0, 0, '1', '2020-05-18 13:25:24');

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
(6, 'INV-2020-04-18-MZ95', 'MZ958743EXKV', '2020-04-17 21:48:42', 21500, 3118, 'PROMOMHS', 18383, 20000, 'admin'),
(7, 'INV-2020-04-18-CF46', 'CF461358OPTG', '2020-04-17 22:27:39', 25200, 2520, 'PROMOMHS', 22680, 25000, 'admin'),
(8, 'INV-2020-04-18-UX08', 'UX082654OETS', '2020-04-17 22:54:05', 16800, 1680, 'PROMOMHS', 15120, 50000, 'admin'),
(9, 'INV-2020-04-18-HS58', 'HS581429KBPW', '2020-04-17 23:00:40', 39200, 5684, 'PROMOMHS', 33516, 50000, 'admin'),
(10, 'INV-2020-04-18-HJ75', 'HJ756980UCAL', '2020-04-17 23:18:59', 138000, 6900, 'PROMO30', 131100, 150000, 'admin'),
(11, 'INV-2020-04-19-JY79', 'JY798043KPLW', '2020-04-18 18:13:29', 30000, 3000, 'PROMOMHS', 27000, 30000, 'admin'),
(12, 'INV-2020-04-19-GF02', 'GF025849ULVA', '2020-04-18 18:17:22', 48000, 2400, 'PROMO30', 45600, 50000, 'admin'),
(13, 'INV-2020-04-19-NG47', 'NG479280AUJM', '2020-04-18 18:23:01', 62000, 3100, '', 58900, 100000, 'admin'),
(14, 'INV-2020-04-19-YI86', 'YI867910JVKF', '2020-04-18 19:32:52', 16000, 1600, 'PROMOMHS', 14400, 20000, 'admin'),
(15, 'INV-2020-04-19-IE65', 'IE654238AFUW', '2020-04-18 21:44:16', 16800, 1680, 'PROMOMHS', 15120, 20000, 'admin'),
(16, 'INV-2020-04-19-WN85', 'WN854736WKJU', '2020-04-19 16:03:33', 41000, 0, '', 41000, 50000, 'admin'),
(17, 'INV-2020-04-20-AC50', 'AC506129FAOG', '2020-04-19 18:06:18', 74400, 3720, 'PROMO30', 70680, 100000, 'admin'),
(18, 'INV-2020-04-24-SF41', 'SF416570WKEG', '2020-04-23 20:12:18', 22500, 3263, 'PROMOMHS', 19238, 50000, 'admin'),
(19, 'INV-2020-04-24-FU95', 'FU953482AMOZ', '2020-04-24 14:27:16', 80800, 11716, 'PROMO30', 69084, 100000, 'admin'),
(20, 'INV-2020-04-25-DK02', 'DK023895QLIT', '2020-04-24 18:54:01', 25000, 2500, 'PROMOMHS', 22500, 50000, 'admin'),
(21, 'INV-2020-04-25-VG31', 'VG316547FNGC', '2020-04-24 19:03:02', 60000, 0, '', 60000, 100000, 'admin'),
(22, 'INV-2020-04-26-TK30', 'TK302684RFHG', '2020-04-26 01:17:13', 10000, 500, '', 9500, 10000, 'admin'),
(23, 'INV-2020-04-27-CV50', 'CV504169JAHM', '2020-04-27 01:30:02', 50800, 7366, 'PROMOMHS', 43434, 50000, 'admin'),
(24, 'INV-2020-04-27-IB89', 'IB893456COLD', '2020-04-27 01:33:12', 30000, 4350, 'PROMO30', 25650, 30000, 'admin'),
(25, 'INV-2020-04-27-BQ07', 'BQ071642GPNY', '2020-04-27 03:47:41', 52800, 5280, 'PROMOMHS', 47520, 50000, 'admin'),
(26, 'INV-2020-04-28-PM40', 'PM405689CKRB', '2020-04-28 04:57:27', 10000, 1000, 'PROMOMHS', 9000, 10000, 'operator_1'),
(27, 'INV-2020-05-01-YP45', 'YP456870ASCF', '2020-05-01 01:46:42', 130000, 13000, '', 117000, 150000, 'admin'),
(28, 'INV-2020-05-04-HZ87', 'HZ874135DUCH', '2020-05-04 04:01:04', 58500, 8483, 'PROMOMHS', 50018, 60000, 'admin'),
(29, 'INV-2020-05-04-GD15', 'GD154327ATXB', '2020-05-04 04:02:00', 22000, 3190, 'PROMOMHS', 18810, 20000, 'admin'),
(30, 'INV-2020-05-06-PO16', 'PO167359ZBJN', '2020-05-06 05:18:05', 120000, 12000, 'PROMOMHS', 108000, 110000, 'admin'),
(31, 'INV-2020-05-10-BA51', 'BA513829VTUS', '2020-05-10 14:55:25', 20000, 0, '', 20000, 20000, 'admin'),
(32, 'INV-2020-05-10-VQ36', 'VQ364798YGCD', '2020-05-10 14:59:19', 14000, 700, '', 13300, 15000, 'admin'),
(33, 'INV-2020-05-10-FR58', 'FR580624IGLJ', '2020-05-10 15:31:55', 73200, 7320, 'PROMOMHS', 65880, 100000, 'admin'),
(34, 'INV-2020-05-14-YN07', 'YN074639NTIX', '2020-05-13 18:16:34', 42800, 6206, 'PROMOMHS', 36594, 40000, 'admin'),
(35, 'INV-2020-05-17-KV36', 'KV368920AFSQ', '2020-05-17 16:39:12', 29000, 5510, 'PROMOMHS', 23490, 40000, 'admin'),
(36, 'INV-2020-05-18-TJ82', 'TJ823574FHJZ', '2020-05-18 13:24:19', 38000, 3800, 'PROMOMHS', 34200, 50000, 'admin'),
(37, 'INV-2020-05-19-MP70', 'MP704325JBUV', '2020-05-18 18:21:41', 81600, 4080, '', 77520, 100000, 'admin'),
(38, 'INV-2020-05-19-CV29', 'CV293781XGQC', '2020-05-18 18:24:50', 182800, 0, '', 182800, 200000, 'admin'),
(39, 'INV-2020-05-19-BY45', 'BY450796AFOS', '2020-05-18 20:16:24', 22400, 0, '', 22400, 50000, 'admin'),
(40, 'INV-2020-05-19-BK71', 'BK718640KIAF', '2020-05-18 20:19:22', 200000, 29000, 'PROMO30', 171000, 200000, 'admin'),
(41, 'INV-2020-05-19-BZ98', 'BZ983421PTZV', '2020-05-19 14:26:26', 40000, 7600, 'PROMOMHS', 32400, 50000, 'arafahmuldianty'),
(42, 'INV-2020-05-19-NY59', 'NY592361RJBK', '2020-05-19 15:39:20', 108000, 10800, '', 97200, 100000, 'admin'),
(43, 'INV-2020-05-19-IP26', 'IP263081HPBJ', '2020-05-19 16:37:18', 48000, 4800, 'PROMOMHS', 43200, 50000, 'admin'),
(44, 'INV-2020-05-21-DF84', 'DF841235PKHV', '2020-05-21 13:08:22', 26000, 3770, 'PROMOMHS', 22230, 30000, 'admin'),
(45, 'INV-2020-05-22-UJ58', 'UJ589703MOSJ', '2020-05-22 10:05:58', 10000, 1000, '', 9000, 10000, 'admin'),
(46, 'INV-2020-05-22-MO02', 'MO027846UXLZ', '2020-05-22 10:06:34', 20800, 0, '', 20800, 25000, 'admin'),
(47, 'INV-2020-05-22-FB71', 'FB716034VNCA', '2020-05-22 10:07:01', 8000, 0, '', 8000, 10000, 'admin'),
(48, 'INV-2020-05-26-YR81', 'YR814723PFYA', '2020-05-26 03:08:19', 10000, 1000, 'PROMOMHS', 9000, 10000, 'admin');

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
(11, '04-2020-UKB', 'Listrik', 'Pembelian token listrik mingguan', '2020-04-24 00:00:00', 50000, 'admin'),
(12, '04-2020-QEJ', 'Pembelian Parfum', 'Pembelian parfum laundry', '2020-04-24 00:00:00', 90000, 'admin'),
(13, '04-2020-CYE', 'Sewa ruko', 'Pembayaran penyewaan ruko', '2020-04-24 00:00:00', 600000, 'admin'),
(14, '04-2020-ZMW', 'Gaji Karyawan', 'Pembayaran gaji karyawn laundry (mustika)', '2020-04-24 00:00:00', 900000, 'admin'),
(15, '04-2020-TFC', 'ATK Laundry', 'Pembelian alat tulis kantor laundry', '2020-04-28 00:00:00', 40000, 'operator_1'),
(16, '05-2020-JZF', 'Parfum', 'Pembelian parfum baru', '2020-05-04 00:00:00', 50000, 'admin'),
(17, '05-2020-CNI', 'Pembelian atk', 'Pembelian alat tulis kantor bulan mei 2020', '2020-05-18 00:00:00', 57000, 'admin'),
(18, '05-2020-XBS', 'Pembelian pulsa ', 'Pembelian pulsa karyawan laundry', '2020-05-19 00:00:00', 15000, 'admin');

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
(7, 'TAHUNBARU5', 'Promo tahun baru ', 5, '2020-05-22', '2020-05-22', 100, 'y');

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
(12, 'OUA28594JH', 'Cuci Jas', 'Cuci jas standar', 'Pcs', 50000, 'y');

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
(3, 'address', 'Alamat', 'Jln. Pantai Cermin, No. 59', '1'),
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
(16, 'email_host_password', 'Password email untuk notifikasi ke pelanggan', '-', '1');

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
(9, 'pUklOsMQZd', 'CF461358OPTG', 'TXP28695AC', 4000, 6.3, 25200),
(10, 'lKiEPbQSqm', 'MZ958743EXKV', 'ZVL17359WK', 5000, 4.3, 21500),
(11, 'bYKZBeWQHU', 'HJ756980UCAL', 'LCD87416QB', 30000, 4.6, 138000),
(12, 'PSNxtcBLUd', 'UX082654OETS', 'TXP28695AC', 4000, 4.2, 16800),
(13, 'haGMVgqmHb', 'HS581429KBPW', 'LCD87416QB', 30000, 1, 30000),
(14, 'tNcHkzXbrQ', 'HS581429KBPW', 'TXP28695AC', 4000, 2.3, 9200),
(15, 'smpnGRvMie', 'GF025849ULVA', 'LCD87416QB', 30000, 1, 30000),
(16, 'cXyPeSTmbL', 'GF025849ULVA', 'TXP28695AC', 4000, 4.5, 18000),
(17, 'KpcxkULlHa', 'YI867910JVKF', 'ZVL17359WK', 5000, 3.2, 16000),
(18, 'brkUNoJMCI', 'JY798043KPLW', 'LCD87416QB', 30000, 1, 30000),
(19, 'wOPTyMEAVg', 'NG479280AUJM', 'TXP28695AC', 4000, 8, 32000),
(20, 'UZYlITwCSf', 'NG479280AUJM', 'LCD87416QB', 30000, 1, 30000),
(21, 'ezVdnPWCfN', 'WN854736WKJU', 'ZVL17359WK', 5000, 8.2, 41000),
(22, 'QXEbBIrhtP', 'IE654238AFUW', 'TXP28695AC', 4000, 4.2, 16800),
(23, 'tQsJyPoUbN', 'AC506129FAOG', 'TXP28695AC', 4000, 6.1, 24400),
(24, 'oaHWJmSRLI', 'AC506129FAOG', 'OUA28594JH', 50000, 1, 50000),
(25, 'HrDXGpmLWT', 'SF416570WKEG', 'ZVL17359WK', 5000, 4.5, 22500),
(26, 'JxgwfQqjdD', 'FU953482AMOZ', 'LCD87416QB', 30000, 2, 60000),
(27, 'pWdAESJwnq', 'FU953482AMOZ', 'TXP28695AC', 4000, 5.2, 20800),
(28, 'BkZhDuqdfs', 'DK023895QLIT', 'ZVL17359WK', 5000, 5, 25000),
(29, 'MkwycamTEC', 'VG316547FNGC', 'LCD87416QB', 30000, 2, 60000),
(30, 'vAFXJrlSYP', 'TK302684RFHG', 'TXP28695AC', 4000, 2.5, 10000),
(31, 'rfyEzdRWCs', 'IB893456COLD', 'ZVL17359WK', 5000, 6, 30000),
(32, 'HKaPXUvTMz', 'CV504169JAHM', 'NTH65307BJ', 30000, 1, 30000),
(33, 'ZHukmwtXGf', 'CV504169JAHM', 'TXP28695AC', 4000, 5.2, 20800),
(34, 'DvtqOVFlWK', 'BQ071642GPNY', 'LCD87416QB', 30000, 1, 30000),
(35, 'oftDungOsb', 'BQ071642GPNY', 'TXP28695AC', 4000, 5.7, 22800),
(36, 'TBamkCVfUj', 'PM405689CKRB', 'ZVL17359WK', 5000, 2, 10000),
(37, 'RUlYktrOAu', 'YP456870ASCF', 'NTH65307BJ', 30000, 1, 30000),
(38, 'eiXnFklTmp', 'YP456870ASCF', 'OUA28594JH', 50000, 2, 100000),
(39, 'gFTJBXLNls', 'HZ874135DUCH', 'LCD87416QB', 30000, 1, 30000),
(40, 'PohLnwkmai', 'HZ874135DUCH', 'ZVL17359WK', 5000, 5.7, 28500),
(41, 'iLFXwzIvqa', 'GD154327ATXB', 'TXP28695AC', 4000, 5.5, 22000),
(42, 'IBRPQOehsj', 'BA513829VTUS', 'TXP28695AC', 4000, 5, 20000),
(43, 'wcrovxqTBp', 'PO167359ZBJN', 'NTH65307BJ', 30000, 2, 60000),
(44, 'ecnHDMGBrE', 'PO167359ZBJN', 'LCD87416QB', 30000, 2, 60000),
(45, 'cdubmYgalW', 'VQ364798YGCD', 'TXP28695AC', 4000, 3.5, 14000),
(46, 'iANquPKBkw', 'TJ823574FHJZ', 'TXP28695AC', 4000, 2, 8000),
(47, 'XciLOjdkIK', 'TJ823574FHJZ', 'LCD87416QB', 30000, 1, 30000),
(48, 'WtzhBFwJUS', 'FR580624IGLJ', 'TXP28695AC', 4000, 5.8, 23200),
(49, 'YKqAlSimJw', 'FR580624IGLJ', 'OUA28594JH', 50000, 1, 50000),
(50, 'ckovyEJMNj', 'YN074639NTIX', 'TXP28695AC', 4000, 5.7, 22800),
(51, 'woDOxbSyhd', 'YN074639NTIX', 'ZVL17359WK', 5000, 4, 20000),
(52, 'ymBqezInTZ', 'KV368920AFSQ', 'TXP28695AC', 4000, 2, 8000),
(53, 'lhStdiPmfx', 'KV368920AFSQ', 'ZVL17359WK', 5000, 4.2, 21000),
(54, 'iALRHoVgYD', 'MP704325JBUV', 'NTH65307BJ', 30000, 2, 60000),
(55, 'DAMWFtEuXn', 'MP704325JBUV', 'TXP28695AC', 4000, 5.4, 21600),
(56, 'HznFKZqIAh', 'CV293781XGQC', 'TXP28695AC', 4000, 8.2, 32800),
(57, 'rKOaWxlzUH', 'CV293781XGQC', 'NTH65307BJ', 30000, 5, 150000),
(58, 'HiUedSDlrn', 'BK718640KIAF', 'ZVL17359WK', 5000, 20, 100000),
(59, 'SYUaXWMxZm', 'BK718640KIAF', 'OUA28594JH', 50000, 2, 100000),
(60, 'xZCFubDgNk', 'BY450796AFOS', 'TXP28695AC', 4000, 5.6, 22400),
(61, 'GoEgrmHpLW', 'NY592361RJBK', 'TXP28695AC', 4000, 12, 48000),
(62, 'fhKeMXFoHO', 'NY592361RJBK', 'LCD87416QB', 30000, 2, 60000),
(63, 'WBUptfdwso', 'BZ983421PTZV', 'ZVL17359WK', 5000, 2, 10000),
(64, 'YoWGdgsSUq', 'BZ983421PTZV', 'NTH65307BJ', 30000, 1, 30000),
(65, 'MpYtELiTmD', 'AG189054PQHO', 'OUA28594JH', 50000, 1, 50000),
(66, 'vMFIBWtQon', 'FB716034VNCA', 'TXP28695AC', 4000, 2, 8000),
(67, 'YPMoKRSJNb', 'IP263081HPBJ', 'TXP28695AC', 4000, 4.5, 18000),
(68, 'AbuwMcXNKf', 'IP263081HPBJ', 'NTH65307BJ', 30000, 1, 30000),
(69, 'cpgOWzVIFf', 'DF841235PKHV', 'TXP28695AC', 4000, 6.5, 26000),
(70, 'CbdmjFDany', 'UJ589703MOSJ', 'ZVL17359WK', 5000, 2, 10000),
(71, 'xcuWVRQplh', 'MO027846UXLZ', 'TXP28695AC', 4000, 5.2, 20800),
(72, 'fYHFldELVb', 'YR814723PFYA', 'ZVL17359WK', 5000, 2, 10000),
(73, 'IuPMSZzLWl', 'SB045291BGPD', 'ZVL17359WK', 5000, 4, 20000),
(74, 'qLOezPTBSh', 'BR609345WFMK', 'ZVL17359WK', 5000, 2, 10000);

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
(7, 'isZBpbIVYNhLkTM', 'UX082654OETS', '2020-04-17 21:38:17', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(8, 'IwcYqhAaGxZtyXU', 'CF461358OPTG', '2020-04-17 21:42:49', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(9, 'ECfUHneMWpogvjJ', 'CF461358OPTG', '2020-04-17 21:44:33', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(10, 'LmwMNYbtWcJpPvq', 'MZ958743EXKV', '2020-04-17 21:47:53', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(11, 'yYbSdZovkqUwKEe', 'MZ958743EXKV', '2020-04-17 21:48:16', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(12, 'aIOTgbcvKmEisly', 'MZ958743EXKV', '2020-04-17 21:48:42', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(13, 'KawjYtqkVRfHQhy', 'HJ756980UCAL', '2020-04-17 21:52:37', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(14, 'MLNCnoiPpahuXgk', 'HJ756980UCAL', '2020-04-17 21:53:02', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(15, 'IVaGRJOThmiwbgS', 'MZ958743EXKV', '2020-04-17 21:58:30', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(16, 'uEVtaFXcNyGRhor', 'HJ756980UCAL', '2020-04-17 21:58:49', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(17, 'zXxlLFiGfMbsUBd', 'MZ958743EXKV', '2020-04-17 22:06:02', 'admin', 'pick_up', 'Cucian telah diambil'),
(18, 'PpjxlYCzTRcBeNw', 'CF461358OPTG', '2020-04-17 22:27:39', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(19, 'LmhqFwlyPtNdTRU', 'CF461358OPTG', '2020-04-17 22:51:50', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(20, 'nLfGHaAuPEiFyQZ', 'UX082654OETS', '2020-04-17 22:53:17', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(21, 'evYliKLMPuGrOcI', 'UX082654OETS', '2020-04-17 22:54:05', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(22, 'MRTuWpqyjvVoleQ', 'CF461358OPTG', '2020-04-17 22:54:35', 'admin', 'pick_up', 'Cucian telah diambil'),
(23, 'JbHLIoCjaRMYZxA', 'HS581429KBPW', '2020-04-17 22:57:29', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(24, 'NchZvpLXrqCFMtD', 'HS581429KBPW', '2020-04-17 22:57:49', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(25, 'xlXCGrWLvVaJZpN', 'HS581429KBPW', '2020-04-17 23:00:40', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(26, 'CGteckiSDXzMNnp', 'YI867910JVKF', '2020-04-17 23:10:48', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(27, 'NfjJvxLAKlDBqFa', 'GF025849ULVA', '2020-04-17 23:16:21', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(28, 'CLhziavOPBfjkrt', 'GF025849ULVA', '2020-04-17 23:16:31', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(29, 'UQxpGzyWAEicPsZ', 'HJ756980UCAL', '2020-04-17 23:18:59', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(30, 'AqrcTvumFiyfBJs', 'YI867910JVKF', '2020-04-17 23:31:39', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(31, 'AmURGiJIBOElxnM', 'JY798043KPLW', '2020-04-18 18:11:54', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(32, 'dARMxgtFiNsDayl', 'JY798043KPLW', '2020-04-18 18:12:16', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(33, 'jVPiGrfCAxEQZKv', 'JY798043KPLW', '2020-04-18 18:13:02', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(34, 'HaePASigVFXQvzo', 'JY798043KPLW', '2020-04-18 18:13:29', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(35, 'itnPdWSIOLVGaFB', 'JY798043KPLW', '2020-04-18 18:14:05', 'admin', 'pick_up', 'Cucian telah diambil'),
(36, 'owYKynqIXafWRhA', 'HJ756980UCAL', '2020-04-18 18:14:34', 'admin', 'pick_up', 'Cucian telah diambil'),
(37, 'EWuYeSPGhTgKwaV', 'GF025849ULVA', '2020-04-18 18:17:22', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(38, 'njKZAbRDhXWSGMa', 'GF025849ULVA', '2020-04-18 18:18:02', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(39, 'AEaimQrkVcgNsLF', 'AC506129FAOG', '2020-04-18 18:19:41', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(40, 'aPLEuNUfwtOgjYH', 'WN854736WKJU', '2020-04-18 18:19:49', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(41, 'ViGoZmcsfUhEFxO', 'NG479280AUJM', '2020-04-18 18:21:39', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(42, 'lXTjZqraJDiQVNO', 'FU953482AMOZ', '2020-04-18 18:21:46', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(43, 'poVUTrFeiYJCmIk', 'NG479280AUJM', '2020-04-18 18:22:15', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(44, 'ogawJcDMNyHpYEz', 'NG479280AUJM', '2020-04-18 18:23:01', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(45, 'qAcalSutiPpELUh', 'YI867910JVKF', '2020-04-18 19:32:52', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(46, 'uJetylDhxpPLmKd', 'WN854736WKJU', '2020-04-18 20:31:27', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(47, 'laiFepTDCKYREVN', 'IE654238AFUW', '2020-04-18 21:42:49', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(48, 'pAbMotXZhnVgYxN', 'IE654238AFUW', '2020-04-18 21:43:00', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(49, 'duRSpIJqDxagwKs', 'IE654238AFUW', '2020-04-18 21:43:53', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(50, 'lJdQvpiCsxXAMkI', 'IE654238AFUW', '2020-04-18 21:44:16', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(51, 'vKTLhnerbNSoixX', 'WN854736WKJU', '2020-04-19 16:03:33', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(52, 'pUgXHqQYVowKTIr', 'AC506129FAOG', '2020-04-19 18:05:49', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(53, 'DWqcwPlvRCoAkju', 'AC506129FAOG', '2020-04-19 18:06:18', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(54, 'djMIJHKtnBPNGkx', 'IE654238AFUW', '2020-04-22 18:30:41', 'admin', 'pick_up', 'Cucian telah diambil'),
(55, 'ovSnGuaPLpCXwMt', 'UX082654OETS', '2020-04-22 18:53:23', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(56, 'iBGOLvSWqYMcVEh', 'SF416570WKEG', '2020-04-23 20:11:38', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(57, 'FIkSRDPoBEzvNJi', 'DK023895QLIT', '2020-04-23 20:11:44', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(58, 'OLJgWxAYHEcZXja', 'VG316547FNGC', '2020-04-23 20:11:49', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(59, 'SkYbJgtClHzXwfF', 'SF416570WKEG', '2020-04-23 20:12:00', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(60, 'vhdjpbGgImOWxSK', 'SF416570WKEG', '2020-04-23 20:12:18', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(61, 'GWVuhIDfzwFtalM', 'FU953482AMOZ', '2020-04-24 14:26:45', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(62, 'bOVKkAuMeadYcJB', 'FU953482AMOZ', '2020-04-24 14:27:16', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(63, 'aJwHDyUZosfkOCI', 'FU953482AMOZ', '2020-04-24 18:46:59', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(64, 'TYClELHbZBqXKvt', 'SF416570WKEG', '2020-04-24 18:47:23', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(65, 'TrClQYFsZxOBqWa', 'AC506129FAOG', '2020-04-24 18:47:47', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(66, 'lDzajdLrcmfBJRH', 'DK023895QLIT', '2020-04-24 18:50:09', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(67, 'qPpeWmYZKJCutGT', 'DK023895QLIT', '2020-04-24 18:54:01', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(68, 'laBCTpiZVgDkyRL', 'HS581429KBPW', '2020-04-24 19:02:19', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(69, 'lAYeyVsmMPFKqWa', 'VG316547FNGC', '2020-04-24 19:02:34', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(70, 'WObCAdiuMYyTqvL', 'VG316547FNGC', '2020-04-24 19:03:02', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(71, 'LAUBvVKRGPMewFa', 'TK302684RFHG', '2020-04-24 19:03:38', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(72, 'qNAjgTbMDVlcxpo', 'TK302684RFHG', '2020-04-24 19:04:03', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(73, 'UmteSLPWIHzniVO', 'IB893456COLD', '2020-04-26 00:27:25', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(74, 'peRoSZQWvJchzwi', 'IB893456COLD', '2020-04-26 00:27:34', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(75, 'zcIswnjUJbkKQgX', 'TK302684RFHG', '2020-04-26 01:17:13', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(76, 'tJnaQcqwBbOsXhI', 'CV504169JAHM', '2020-04-27 01:28:47', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(77, 'qayGScIALZgbYxt', 'BQ071642GPNY', '2020-04-27 01:28:53', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(78, 'oevUytSwzPOCIsN', 'CV504169JAHM', '2020-04-27 01:29:13', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(79, 'hLTEVGWkcwZOmlS', 'CV504169JAHM', '2020-04-27 01:30:02', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(80, 'wbIKhJtLTrfpvEG', 'IB893456COLD', '2020-04-27 01:33:12', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(81, 'EHgwqbfycIYCpnU', 'CV504169JAHM', '2020-04-27 03:46:59', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(82, 'HvSsnZbkBmuyPTF', 'BQ071642GPNY', '2020-04-27 03:47:12', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(83, 'BHlADXYxLVSeKMp', 'BQ071642GPNY', '2020-04-27 03:47:41', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(84, 'syZItMdeCgxkunF', 'BQ071642GPNY', '2020-04-28 04:44:00', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(85, 'wzrysjGOCSixPab', 'IB893456COLD', '2020-04-28 04:48:04', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(86, 'mJbGdFXoUughStj', 'PM405689CKRB', '2020-04-28 04:51:22', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(87, 'HouJPqUvKCXTmbY', 'PM405689CKRB', '2020-04-28 04:57:07', 'operator_1', 'mulai_cuci', 'Cucian masuk laundry room'),
(88, 'MtJUfGoXrOYuzeV', 'PM405689CKRB', '2020-04-28 04:57:27', 'operator_1', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(89, 'RXfGJbMpmLvqhkK', 'PM405689CKRB', '2020-05-01 01:41:35', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(90, 'CXDctoepulMFQfg', 'VG316547FNGC', '2020-05-01 01:41:45', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(91, 'tgfhSIaqRTMFwrc', 'DK023895QLIT', '2020-05-01 01:41:54', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(92, 'uDEOUTIZiWyYwSR', 'NG479280AUJM', '2020-05-01 01:42:07', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(93, 'wHqlCgFjOAhtMYK', 'TK302684RFHG', '2020-05-01 01:42:18', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(94, 'KIxoiFRfnhwtvuq', 'WN854736WKJU', '2020-05-01 01:42:29', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(95, 'mKNQXTGRALWOvCY', 'PM405689CKRB', '2020-05-01 01:42:57', 'admin', 'pick_up', 'Cucian telah diambil'),
(96, 'PXLBfWjzeHyNqsd', 'IB893456COLD', '2020-05-01 01:44:23', 'admin', 'pick_up', 'Cucian telah diambil'),
(97, 'aIriSoqOceTtXNE', 'GD154327ATXB', '2020-05-01 01:44:59', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(98, 'VMOxyRrImBwgYNT', 'YP456870ASCF', '2020-05-01 01:45:05', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(99, 'QVItAjNzvZHEOhx', 'HZ874135DUCH', '2020-05-01 01:45:11', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(100, 'KkcRotFSVuQpDrP', 'YP456870ASCF', '2020-05-01 01:45:26', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(101, 'aUxplhEbuDTCGYy', 'YP456870ASCF', '2020-05-01 01:46:42', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(102, 'iOvNQFJGgpEdxyl', 'YP456870ASCF', '2020-05-01 06:44:28', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(103, 'kzumFOSRDKiYThA', 'HZ874135DUCH', '2020-05-01 06:44:45', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(104, 'doMCGQYcLpZxmaO', 'HZ874135DUCH', '2020-05-04 04:01:04', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(105, 'NUToVJBysLipHlq', 'HZ874135DUCH', '2020-05-04 04:01:22', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(106, 'nmKtVlpqYBkQgoG', 'GD154327ATXB', '2020-05-04 04:01:40', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(107, 'PQLqvpihXyaEWHx', 'GD154327ATXB', '2020-05-04 04:02:00', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(108, 'uCOZfmcobyXKLVJ', 'GD154327ATXB', '2020-05-04 04:02:15', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(109, 'SoCicpaqxmLBZQF', 'YI867910JVKF', '2020-05-04 04:02:26', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(110, 'fZnWovzmdtsKPIb', 'HZ874135DUCH', '2020-05-04 04:03:05', 'admin', 'pick_up', 'Cucian telah diambil'),
(111, 'vtoguDzenEcYZLA', 'YP456870ASCF', '2020-05-04 04:03:18', 'admin', 'pick_up', 'Cucian telah diambil'),
(112, 'vryGTfxOsEbtJZz', 'DK023895QLIT', '2020-05-04 04:03:33', 'admin', 'pick_up', 'Cucian telah diambil'),
(113, 'FyifgZHxjMkSpBz', 'GD154327ATXB', '2020-05-05 10:42:15', 'admin', 'pick_up', 'Cucian telah diambil'),
(114, 'AvdCFuIpNtLWyzP', 'VQ364798YGCD', '2020-05-05 12:27:26', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(115, 'ECqcdNaufQBJDTj', 'BA513829VTUS', '2020-05-05 12:27:35', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(116, 'FyfPXVkUgYbLmGq', 'BA513829VTUS', '2020-05-05 12:32:05', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(117, 'vbhYpmzDIOCEBwP', 'VG316547FNGC', '2020-05-06 05:12:23', 'admin', 'pick_up', 'Cucian telah diambil'),
(118, 'EmZnecVpDOSjtCi', 'UX082654OETS', '2020-05-06 05:12:37', 'admin', 'pick_up', 'Cucian telah diambil'),
(119, 'vjqpUPexwohFQaD', 'HS581429KBPW', '2020-05-06 05:13:04', 'admin', 'pick_up', 'Cucian telah diambil'),
(120, 'MNbrDIaAwLJqKGn', 'YI867910JVKF', '2020-05-06 05:13:22', 'admin', 'pick_up', 'Cucian telah diambil'),
(121, 'DcZMIPXWpmrgjSb', 'SF416570WKEG', '2020-05-06 05:13:52', 'admin', 'pick_up', 'Cucian telah diambil'),
(122, 'gXajMGBPbNpmvSI', 'FU953482AMOZ', '2020-05-06 05:14:09', 'admin', 'pick_up', 'Cucian telah diambil'),
(123, 'zCcEWTkwrIMOVbK', 'GF025849ULVA', '2020-05-06 05:14:56', 'admin', 'pick_up', 'Cucian telah diambil'),
(124, 'EZluBxbXaCSHiFe', 'NG479280AUJM', '2020-05-06 05:15:15', 'admin', 'pick_up', 'Cucian telah diambil'),
(125, 'LrXsBHfMQUpcvqT', 'WN854736WKJU', '2020-05-06 05:15:39', 'admin', 'pick_up', 'Cucian telah diambil'),
(126, 'mlEvxqGLfsahXrz', 'AC506129FAOG', '2020-05-06 05:15:51', 'admin', 'pick_up', 'Cucian telah diambil'),
(127, 'MhbBrAaQegGFOxn', 'BQ071642GPNY', '2020-05-06 05:16:18', 'admin', 'pick_up', 'Cucian telah diambil'),
(128, 'kKhQGIoDScFpaHu', 'CV504169JAHM', '2020-05-06 05:16:30', 'admin', 'pick_up', 'Cucian telah diambil'),
(129, 'uiGovJdysVAWrgY', 'TK302684RFHG', '2020-05-06 05:16:43', 'admin', 'pick_up', 'Cucian telah diambil'),
(130, 'TspfXDHQnJBAOwW', 'PO167359ZBJN', '2020-05-06 05:17:01', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(131, 'AoSQihZLElJxrMU', 'TJ823574FHJZ', '2020-05-06 05:17:09', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(132, 'MtmlRqsLIukQzpY', 'PO167359ZBJN', '2020-05-06 05:17:21', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(133, 'MCaDAeyJPfrGZht', 'PO167359ZBJN', '2020-05-06 05:18:05', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(134, 'JKDFIyBkifqMbtv', 'VQ364798YGCD', '2020-05-06 05:18:53', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(135, 'YZhAfbnSPodOrgB', 'PO167359ZBJN', '2020-05-10 14:54:53', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(136, 'UuaxWgqoCFZrsOT', 'BA513829VTUS', '2020-05-10 14:55:25', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(137, 'HyRGjqnaIeTtzhb', 'VQ364798YGCD', '2020-05-10 14:59:19', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(138, 'qUvWKcMnJtIieEg', 'BA513829VTUS', '2020-05-10 15:29:43', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(139, 'HOVWPzQrcFCduZv', 'VQ364798YGCD', '2020-05-10 15:29:59', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(140, 'mLEGQwyHUisSoNv', 'TJ823574FHJZ', '2020-05-10 15:30:36', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(141, 'QfcORzrsSMvpgBn', 'FR580624IGLJ', '2020-05-10 15:31:02', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(142, 'EFGtHVsyoCBRAWS', 'MP704325JBUV', '2020-05-10 15:31:08', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(143, 'xmvluOgWdrGoEti', 'FR580624IGLJ', '2020-05-10 15:31:18', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(144, 'YuvmctXUAInDEBo', 'FR580624IGLJ', '2020-05-10 15:31:55', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(145, 'felFUvIYrObJiDR', 'FR580624IGLJ', '2020-05-13 18:15:14', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(146, 'bldfroSyehsnBuk', 'YN074639NTIX', '2020-05-13 18:15:32', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(147, 'aOuLUkrKCdYPMhX', 'KV368920AFSQ', '2020-05-13 18:15:37', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(148, 'hIDnXSPLcfRQboC', 'YN074639NTIX', '2020-05-13 18:16:08', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(149, 'sqmxHYPvpXoMUlb', 'YN074639NTIX', '2020-05-13 18:16:34', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(150, 'sDpMcraHiNbjVoK', 'KV368920AFSQ', '2020-05-17 13:49:05', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(151, 'JvtpliHCAPugrmK', 'MP704325JBUV', '2020-05-17 13:49:23', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(152, 'tYIDAcQnUkHbFfq', 'KV368920AFSQ', '2020-05-17 16:39:12', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(153, 'YvutBfKIFEObkDp', 'KV368920AFSQ', '2020-05-18 13:23:49', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(154, 'VIUOMvnwgdEPqal', 'TJ823574FHJZ', '2020-05-18 13:24:19', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(155, 'heHzFWEQicAYRKn', 'YN074639NTIX', '2020-05-18 13:24:35', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(156, 'KrGiNYDJtugOCTW', 'MP704325JBUV', '2020-05-18 18:21:41', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(157, 'eNuCRZplFgwovhj', 'MP704325JBUV', '2020-05-18 18:22:18', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(158, 'MVgjPtqeJbrZOlp', 'TJ823574FHJZ', '2020-05-18 18:22:29', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(159, 'lbQLVgwXHGYeOAI', 'KV368920AFSQ', '2020-05-18 18:22:39', 'admin', 'pick_up', 'Cucian telah diambil'),
(160, 'ORHkhoLdCbWxlSp', 'NY592361RJBK', '2020-05-18 18:23:05', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(161, 'FlUcNePSMdWkgIG', 'BK718640KIAF', '2020-05-18 18:23:10', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(162, 'ZHJYuVGWrNsIvpz', 'CV293781XGQC', '2020-05-18 18:23:16', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(163, 'KsCSqtGlieNpjaA', 'CV293781XGQC', '2020-05-18 18:23:26', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(164, 'twrKmTsEvzHGoCk', 'BK718640KIAF', '2020-05-18 18:23:56', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(165, 'ngLoQPYxtHlZUOE', 'BY450796AFOS', '2020-05-18 18:24:14', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(166, 'hoHsMwdectIJNrF', 'BY450796AFOS', '2020-05-18 18:24:29', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(167, 'XpWIKqMVRemJQFn', 'CV293781XGQC', '2020-05-18 18:24:50', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(168, 'cqdRBVIDTjbmikZ', 'NY592361RJBK', '2020-05-18 18:55:12', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(169, 'FuofEjneiwOCTqc', 'BZ983421PTZV', '2020-05-18 20:08:19', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(170, 'JVFdPBXTSChiDfI', 'BY450796AFOS', '2020-05-18 20:16:24', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(171, 'RWzCXFxMLvkgpIK', 'BY450796AFOS', '2020-05-18 20:18:51', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(172, 'SeBFmkxwNrVzQsW', 'CV293781XGQC', '2020-05-18 20:18:55', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(173, 'DJuIwalrUTYpydQ', 'BK718640KIAF', '2020-05-18 20:19:22', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(174, 'WVtneIPKUmGsSug', 'BZ983421PTZV', '2020-05-18 20:29:38', 'arafahmuldianty', 'mulai_cuci', 'Cucian masuk laundry room'),
(175, 'cGLMIelhYpTiPEQ', 'BK718640KIAF', '2020-05-18 20:30:36', 'arafahmuldianty', 'cucian_selesai', 'Cucian telah selesai'),
(176, 'uWomLCkSOlBRzrs', 'AG189054PQHO', '2020-05-18 20:30:54', 'arafahmuldianty', 'registrasi_cucian', 'Cucian di registrasi'),
(177, 'ZMNeAsSQwDjyTxl', 'AG189054PQHO', '2020-05-18 20:31:52', 'arafahmuldianty', 'mulai_cuci', 'Cucian masuk laundry room'),
(178, 'NwVQCgrlzWfTkyZ', 'AG189054PQHO', '2020-05-18 20:32:04', 'arafahmuldianty', 'cucian_selesai', 'Cucian telah selesai'),
(179, 'EwNSgGDrVOlvHjm', 'BZ983421PTZV', '2020-05-19 14:26:26', 'arafahmuldianty', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(180, 'GomOKuJxYcLtfgy', 'FB716034VNCA', '2020-05-19 15:38:16', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(181, 'nMvJsLWbkwZcoES', 'ZV469173NLZW', '2020-05-19 15:38:36', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(182, 'brdNwUiqQYJEgyL', 'BZ983421PTZV', '2020-05-19 15:38:44', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(183, 'NKgElGvOnjqdsuQ', 'BZ983421PTZV', '2020-05-19 15:38:55', 'admin', 'pick_up', 'Cucian telah diambil'),
(184, 'TnPcuIbAysqENYR', 'NY592361RJBK', '2020-05-19 15:39:20', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(185, 'KnVOJstLyougjIX', 'NY592361RJBK', '2020-05-19 15:39:44', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(186, 'TKkMYcCxDLwXiGl', 'FB716034VNCA', '2020-05-19 15:51:33', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(187, 'joPLhCkXVDuaRgY', 'MO027846UXLZ', '2020-05-19 16:35:12', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(188, 'QVyRNJLKEcefwsv', 'IP263081HPBJ', '2020-05-19 16:35:19', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(189, 'DhvlRyQtrZdmnOI', 'IP263081HPBJ', '2020-05-19 16:36:47', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(190, 'rtCmdlXhNxWcGkK', 'IP263081HPBJ', '2020-05-19 16:37:18', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(191, 'fvTkowKVIuSaCmx', 'IP263081HPBJ', '2020-05-19 19:43:05', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(192, 'EVLWdFGHqXtrUKm', 'UJ589703MOSJ', '2020-05-21 13:07:16', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(193, 'VTKnAsCqbDGzHZp', 'DF841235PKHV', '2020-05-21 13:07:21', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(194, 'AlHxXcmTKNwBnvJ', 'DF841235PKHV', '2020-05-21 13:07:39', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(195, 'oRankcMfphXGutQ', 'UJ589703MOSJ', '2020-05-21 13:07:51', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(196, 'vKfkGxhljMnPBqV', 'DF841235PKHV', '2020-05-21 13:07:57', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(197, 'cYzLRAXwbtpsQUf', 'DF841235PKHV', '2020-05-21 13:08:22', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(198, 'gZGqPsatiAFCryY', 'DF841235PKHV', '2020-05-21 13:08:35', 'admin', 'pick_up', 'Cucian telah diambil'),
(199, 'sBLGeYUrESTActN', 'UJ589703MOSJ', '2020-05-22 10:05:58', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(200, 'UkWdmILSOYpBcVF', 'MO027846UXLZ', '2020-05-22 10:06:15', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(201, 'dItNxCHpOZWrqTl', 'MO027846UXLZ', '2020-05-22 10:06:34', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(202, 'aCVmBFbhIyDYixX', 'FB716034VNCA', '2020-05-22 10:07:01', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(203, 'xZYOsUSDkvFnIQR', 'VQ364798YGCD', '2020-05-22 10:07:29', 'admin', 'pick_up', 'Cucian telah diambil'),
(204, 'CJnjGipsxRoyNka', 'YR814723PFYA', '2020-05-26 03:07:55', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(205, 'aKCYbzxBlSvVOIs', 'YR814723PFYA', '2020-05-26 03:08:05', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(206, 'aBCRVpfrLzqjDuw', 'YR814723PFYA', '2020-05-26 03:08:19', 'admin', 'pembayaran_selesai', 'Pembayaran telah dilakukan'),
(207, 'LgHRxKIMqFipkNO', 'YR814723PFYA', '2020-05-26 03:08:35', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(208, 'JlXpYkmRVAdFyzc', 'SB045291BGPD', '2020-05-26 03:09:35', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(209, 'UOqHmIZhuaMDNvS', 'SB045291BGPD', '2020-05-26 03:09:44', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(210, 'eFoESAIUafuxQYL', 'SB045291BGPD', '2020-05-26 03:09:52', 'admin', 'cucian_selesai', 'Cucian telah selesai'),
(211, 'CERaXSywvpBFVOG', 'BR609345WFMK', '2020-05-26 03:11:56', 'admin', 'registrasi_cucian', 'Cucian di registrasi'),
(212, 'flCAIjnYSswREOJ', 'BR609345WFMK', '2020-05-26 03:12:05', 'admin', 'mulai_cuci', 'Cucian masuk laundry room'),
(213, 'aTRKzpUIGSnhOEC', 'BR609345WFMK', '2020-05-26 03:12:11', 'admin', 'cucian_selesai', 'Cucian telah selesai');

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
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2020-02-18 14:20:28', 'admin', '1'),
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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_kartu_laundry`
--
ALTER TABLE `tbl_kartu_laundry`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_laundry_room`
--
ALTER TABLE `tbl_laundry_room`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_level_user`
--
ALTER TABLE `tbl_level_user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tbl_pengeluaran`
--
ALTER TABLE `tbl_pengeluaran`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_promo_code`
--
ALTER TABLE `tbl_promo_code`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_remote_service`
--
ALTER TABLE `tbl_remote_service`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_setting_laundry`
--
ALTER TABLE `tbl_setting_laundry`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_temp_item_cucian`
--
ALTER TABLE `tbl_temp_item_cucian`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `tbl_timeline`
--
ALTER TABLE `tbl_timeline`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

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
