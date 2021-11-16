-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Nov 2021 pada 00.23
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mwd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasmasjid`
--

CREATE TABLE `kasmasjid` (
  `id_keuangan` int(11) NOT NULL,
  `tgl_keuangan` date NOT NULL DEFAULT current_timestamp(),
  `aktifitas_keuangan` varchar(300) NOT NULL,
  `nominal_keuangan` bigint(20) NOT NULL,
  `jenis_keuangan` enum('Debet','Kredit','Saldo') NOT NULL,
  `file_lampiran` varchar(200) NOT NULL,
  `keterangan` text NOT NULL,
  `terlapor` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, 'sisfo-agenda-raker', 1, 0, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(273, '::1', 'admin@admin.com', 1623991925);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_agama`
--

CREATE TABLE `tb_agama` (
  `id_agama` int(11) NOT NULL,
  `nama_agama` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_agama`
--

INSERT INTO `tb_agama` (`id_agama`, `nama_agama`) VALUES
(1, 'Islam'),
(2, 'Kristen Protestan'),
(3, 'Katolik'),
(4, 'Hindu'),
(5, 'Buddha'),
(6, 'Kong Hu Cu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_agenda`
--

CREATE TABLE `tb_agenda` (
  `id_agenda` int(11) NOT NULL,
  `nama_agenda` varchar(200) NOT NULL,
  `waktu_agenda` datetime NOT NULL,
  `status_agenda` enum('vote','undangan','terlaksana','agenda_pribadi') NOT NULL,
  `deskripsi_agenda` text NOT NULL,
  `tempat` varchar(200) NOT NULL,
  `img_agenda` varchar(200) NOT NULL,
  `draft_agenda` varchar(200) NOT NULL DEFAULT current_timestamp(),
  `hasil_agenda` varchar(200) NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_agenda`
--

INSERT INTO `tb_agenda` (`id_agenda`, `nama_agenda`, `waktu_agenda`, `status_agenda`, `deskripsi_agenda`, `tempat`, `img_agenda`, `draft_agenda`, `hasil_agenda`, `created_at`, `updated_at`) VALUES
(36, 'pembahasan anggaran', '2020-12-22 13:30:00', 'undangan', '<p>\n	diharapkan kehadiran bapak ibu untuk hadir dalam pembahasan anggaran prov sulteng</p>\n<p>\n	diharapkan membawa data data yang diperlukan</p>\n', 'Ruang Rapat DPRD', '', 'a1c3f-undangan-evaluasi-rb-dan-sakip.pdf', '', '2020-12-22 01:00:12', '2021-01-03 22:57:51'),
(38, 'paripurna', '2020-12-22 16:00:00', 'vote', '<p>\n	mohon melakukan voting atas hasil rapat ini, tes</p>\n', 'Ruang Rapat DPRD', 'vote.jpg', '', '7c625-screenshot-203-.png', '2020-12-22 01:03:06', '2021-04-18 20:10:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_agendapribadi`
--

CREATE TABLE `tb_agendapribadi` (
  `id_kegiatan` int(11) NOT NULL,
  `user_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(200) NOT NULL,
  `waktu_kegiatan` datetime NOT NULL,
  `tempat_kegiatan` varchar(400) NOT NULL,
  `catatan` text NOT NULL,
  `gambar_kegiatan` varchar(300) NOT NULL,
  `hasil_kegiatan` varchar(300) NOT NULL,
  `notif` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_agendapribadi`
--

INSERT INTO `tb_agendapribadi` (`id_kegiatan`, `user_kegiatan`, `nama_kegiatan`, `waktu_kegiatan`, `tempat_kegiatan`, `catatan`, `gambar_kegiatan`, `hasil_kegiatan`, `notif`) VALUES
(0, 25, 'Jalan-jalan ke daya, cari ikan', '2020-12-24 09:00:18', 'Pasar Daya', '<p>\n	Coba jalan-jalan ki&nbsp; di daya, cari ikan bolu..</p>\n', '', '', 25),
(2, 25, 'Tes', '2020-11-21 04:36:14', 'mks', 'catatan', '', 'tes', 0),
(3, 1, 'Jalan-jalan ke daya, cari ikan', '2020-12-24 09:00:18', 'Pasar Daya', '', '', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bgevote`
--

CREATE TABLE `tb_bgevote` (
  `id_bg` int(11) NOT NULL,
  `nama_bg` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bgevote`
--

INSERT INTO `tb_bgevote` (`id_bg`, `nama_bg`) VALUES
(1, 'vote.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dapil`
--

CREATE TABLE `tb_dapil` (
  `id_dapil` int(11) NOT NULL,
  `nama_dapil` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_dapil`
--

INSERT INTO `tb_dapil` (`id_dapil`, `nama_dapil`) VALUES
(1, 'I'),
(2, 'II');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_file`
--

CREATE TABLE `tb_file` (
  `id_file` int(11) NOT NULL,
  `agenda_file` int(11) NOT NULL,
  `link_file` varchar(200) NOT NULL,
  `user_file` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_file`
--

INSERT INTO `tb_file` (`id_file`, `agenda_file`, `link_file`, `user_file`) VALUES
(2, 23, '99b2f-aktifity.jpg', 1),
(3, 24, '4d45e-interview-ahmad-robbani.docx', 1),
(4, 23, 'a54eb-wmti-2020-nh161186.pdf', 1),
(5, 23, 'a106f-118524305_2754479798206944_8570133615773718666_n.jpg', 1),
(6, 23, '5f076-1608079745055..jpg', 1),
(11, 19, '2fb44-fb_img_1607940641555.jpg', 1),
(13, 19, 'ed766-fb_img_1607980480344.jpg', 1),
(10, 20, '67ad0-fb_img_1608004380181.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_fraksi`
--

CREATE TABLE `tb_fraksi` (
  `id_fraksi` int(11) NOT NULL,
  `nama_fraksi` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_fraksi`
--

INSERT INTO `tb_fraksi` (`id_fraksi`, `nama_fraksi`) VALUES
(1, 'Golkar'),
(2, 'HANURA'),
(3, 'Nasdem');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hadir`
--

CREATE TABLE `tb_hadir` (
  `id_invite` int(11) NOT NULL,
  `createdat_hadir` timestamp NOT NULL DEFAULT current_timestamp(),
  `agenda_hadir` int(11) NOT NULL,
  `user_hadir` int(11) NOT NULL,
  `notif` tinyint(1) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_history`
--

CREATE TABLE `tb_history` (
  `id_history` int(11) NOT NULL,
  `waktu_history` timestamp NOT NULL DEFAULT current_timestamp(),
  `nama_history` varchar(200) NOT NULL,
  `agenda_history` int(11) NOT NULL,
  `user_history` int(11) NOT NULL,
  `viewed_history` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_history`
--

INSERT INTO `tb_history` (`id_history`, `waktu_history`, `nama_history`, `agenda_history`, `user_history`, `viewed_history`) VALUES
(1, '2020-11-28 08:08:52', 'Vote Ya', 1, 1, 0),
(3, '2020-11-28 10:46:58', 'Vote Ya', 2, 1, 0),
(4, '2020-12-01 01:29:23', 'Vote Ya', 1, 1, 0),
(5, '2020-12-01 01:29:23', 'Vote Ya', 1, 1, 0),
(6, '2020-12-01 01:29:23', 'Vote Ya', 1, 1, 0),
(7, '2020-12-01 01:29:29', 'Vote Ya', 1, 1, 0),
(8, '2020-12-01 01:29:29', 'Vote Ya', 1, 1, 0),
(9, '2020-12-01 01:29:29', 'Vote No', 1, 1, 0),
(10, '2020-12-01 01:29:29', 'Vote Ya', 1, 1, 0),
(11, '2020-12-02 12:42:28', 'Vote No', 16, 27, 0),
(12, '2020-12-03 01:12:25', 'Vote Ya', 20, 1, 0),
(13, '2020-12-03 01:12:25', 'Vote Ya', 20, 1, 0),
(14, '2020-12-04 03:44:22', 'Vote Ya', 21, 1, 0),
(15, '2020-12-04 03:45:33', 'Vote Ya', 20, 1, 0),
(16, '2020-12-04 14:20:51', 'Vote Ya', 20, 27, 0),
(17, '2020-12-06 00:31:08', 'Vote Ya', 31, 1, 0),
(18, '2020-12-06 08:14:43', 'Vote Ya', 20, 1, 0),
(19, '2020-12-06 08:16:22', 'Vote No', 20, 1, 0),
(20, '2020-12-06 08:16:22', 'Vote No', 20, 1, 0),
(21, '2020-12-06 08:17:00', 'Vote Ya', 20, 1, 0),
(22, '2020-12-06 08:17:01', 'Vote Ya', 20, 1, 0),
(23, '2020-12-06 08:17:05', 'Vote No', 20, 1, 0),
(24, '2020-12-06 08:35:14', 'Akan Hadir', 28, 1, 0),
(25, '2020-12-07 02:54:50', 'Vote No', 31, 1, 0),
(26, '2020-12-07 02:54:51', 'Vote No', 31, 1, 0),
(27, '2020-12-07 02:54:56', 'Vote Ya', 31, 1, 0),
(28, '2020-12-09 00:54:35', 'Akan Hadir', 22, 1, 0),
(29, '2020-12-10 21:51:02', 'Vote Ya', 20, 1, 0),
(30, '2020-12-10 21:51:05', 'Vote No', 20, 1, 0),
(31, '2020-12-11 08:49:11', 'Vote Ya', 20, 1, 0),
(32, '2020-12-11 08:49:11', 'Vote Ya', 20, 1, 0),
(33, '2020-12-11 08:49:12', 'Vote No', 20, 1, 0),
(34, '2020-12-11 08:49:14', 'Vote Ya', 20, 1, 0),
(35, '2020-12-11 08:49:16', 'Vote No', 20, 1, 0),
(36, '2020-12-11 08:49:17', 'Vote No', 20, 1, 0),
(37, '2020-12-11 08:49:17', 'Vote No', 20, 1, 0),
(38, '2020-12-11 08:49:23', 'Vote No', 20, 1, 0),
(39, '2020-12-11 08:49:24', 'Vote No', 20, 1, 0),
(40, '2020-12-22 05:04:04', 'Akan Hadir', 36, 1, 0),
(41, '2020-12-22 09:16:47', 'Vote Ya', 38, 1, 0),
(42, '2021-04-20 01:36:26', 'Vote No', 38, 1, 0),
(43, '2021-04-20 01:36:34', 'Vote Ya', 38, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_invite`
--

CREATE TABLE `tb_invite` (
  `id_invite` int(11) NOT NULL,
  `createdat_invite` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `agenda_invite` int(11) NOT NULL,
  `presence_invite` enum('','0','1') NOT NULL DEFAULT '',
  `user_invite` int(11) NOT NULL,
  `notif` tinyint(1) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_invite`
--

INSERT INTO `tb_invite` (`id_invite`, `createdat_invite`, `agenda_invite`, `presence_invite`, `user_invite`, `notif`, `priority`) VALUES
(1, '2020-12-02 08:29:48', 1, '1', 1, 1, 2),
(3, '2020-12-02 08:26:03', 1, '1', 25, 0, 0),
(4, '2020-12-02 08:29:53', 1, '0', 24, 0, 1),
(36, '2020-12-03 00:17:31', 22, '', 26, 0, 3),
(35, '2020-12-03 00:17:31', 22, '', 25, 0, 2),
(34, '2020-12-09 00:54:35', 22, '1', 1, 1, 1),
(33, '2020-12-03 00:19:56', 22, '', 27, 1, 0),
(49, '2020-12-03 01:48:01', 24, '', 26, 0, 4),
(45, '2020-12-03 01:48:01', 24, '', 27, 0, 0),
(59, '2020-12-06 00:23:37', 30, '', 26, 0, 2),
(58, '2020-12-06 00:27:04', 30, '1', 1, 1, 1),
(16, '2020-11-26 08:03:00', 7, '', 26, 0, 0),
(53, '2020-12-04 03:52:05', 28, '', 26, 0, 0),
(57, '2020-12-06 00:23:37', 30, '', 27, 0, 0),
(20, '2020-11-27 04:09:18', 10, '', 1, 1, 0),
(21, '2020-11-27 03:56:12', 10, '', 26, 0, 1),
(47, '2020-12-03 01:48:01', 24, '', 25, 0, 2),
(46, '2020-12-03 01:48:01', 24, '', 1, 0, 1),
(40, '2020-12-03 00:35:48', 23, '', 26, 0, 3),
(48, '2020-12-03 01:48:01', 24, '', 24, 0, 3),
(38, '2020-12-04 03:32:41', 23, '1', 1, 1, 1),
(37, '2020-12-03 00:46:54', 23, '', 27, 1, 0),
(54, '2020-12-06 08:35:14', 28, '1', 1, 1, 1),
(39, '2020-12-03 00:35:48', 23, '', 25, 0, 2),
(55, '2020-12-04 03:55:43', 29, '', 26, 0, 0),
(56, '2020-12-04 05:22:47', 29, '0', 1, 1, 1),
(60, '2020-12-22 06:11:00', 36, '', 1, 1, 0),
(61, '2021-01-10 11:31:29', 36, '1', 30, 0, 1),
(62, '2020-12-22 01:00:12', 36, '', 31, 0, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `proker` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `nama_jabatan`, `proker`) VALUES
(17, 'Wakil Ketua', 1),
(16, 'Ketua', 1),
(18, 'Anggota', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_musyawarah`
--

CREATE TABLE `tb_jenis_musyawarah` (
  `id_jenis_musyawarah` int(11) NOT NULL,
  `nama_jenis_musyawarah` varchar(200) NOT NULL,
  `prioritas` int(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jenis_musyawarah`
--

INSERT INTO `tb_jenis_musyawarah` (`id_jenis_musyawarah`, `nama_jenis_musyawarah`, `prioritas`, `deskripsi`) VALUES
(1, 'Rapat Santri', 0, ''),
(2, 'Rapat Divisi', 0, ''),
(3, 'Rapat Panitia', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_notif`
--

CREATE TABLE `tb_notif` (
  `id_notif` int(11) NOT NULL,
  `user_notif` int(11) NOT NULL,
  `isi_notif` varchar(100) NOT NULL,
  `read_notif` int(11) NOT NULL,
  `createdat_notif` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_presensimusyawarah`
--

CREATE TABLE `tb_presensimusyawarah` (
  `id_presensimusyawarah` int(11) NOT NULL,
  `musyawarah` int(11) NOT NULL,
  `santri` int(11) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_token`
--

CREATE TABLE `tb_token` (
  `id_token` int(11) NOT NULL,
  `device_token` varchar(200) NOT NULL,
  `nomor_token` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_token`
--

INSERT INTO `tb_token` (`id_token`, `device_token`, `nomor_token`, `created_at`, `updated_at`) VALUES
(5, 'Redmi Note 7', 'ExponentPushToken[_gLhfjDP1E9UhcGX7YXp3D]', '2020-12-02 05:53:27', '2020-12-02 05:53:27'),
(6, 'Redmi Note 7', 'ExponentPushToken[hKprxsNHDjIUkz9uHbJ5p1]', '2020-12-02 06:47:34', '2020-12-02 06:47:34'),
(7, 'Galaxy A10s', 'ExponentPushToken[Hh6oFuA7q6qzxIQY9WDUHk]', '2020-12-02 12:27:58', '2020-12-02 12:27:58'),
(8, 'OPPO A5s', 'ExponentPushToken[UFduYoPnzQlILbwT4r5ntI]', '2020-12-02 12:48:49', '2020-12-02 12:48:49'),
(9, 'Redmi', 'ExponentPushToken[GhDV_jH7XRz04wdjWsCsqD]', '2020-12-02 12:54:19', '2020-12-02 12:54:19'),
(10, 'Redmi Note 7', 'ExponentPushToken[cczmoEF7iWJ5QhSlsfIfwK]', '2020-12-02 14:45:44', '2020-12-02 14:45:44'),
(11, 'Galaxy A10s', 'ExponentPushToken[LmIy4hIcnSOwMDcHxT2Ia7]', '2020-12-02 23:32:51', '2020-12-02 23:32:51'),
(12, 'Redmi', 'ExponentPushToken[PJ2T14KmtTbgYrCL-WsqcU]', '2020-12-02 23:47:46', '2020-12-02 23:47:46'),
(13, 'QCOM-BTD', 'ExponentPushToken[tXk1FlHdet0NfX_jouq6m1]', '2020-12-03 00:25:00', '2020-12-03 00:25:00'),
(14, 'OPPO A5s', 'ExponentPushToken[wlQWqTIr2aTwdRuTqhMw1V]', '2020-12-03 01:09:09', '2020-12-03 01:09:09'),
(15, 'OPPO A5s', 'ExponentPushToken[37s0lXJi_7330da1WfQPvZ]', '2020-12-03 01:43:18', '2020-12-03 01:43:18'),
(16, 'Galaxy A10s', 'ExponentPushToken[oypH6AMNRYv2dLkeBSE0V4]', '2020-12-03 01:46:48', '2020-12-03 01:46:48'),
(17, 'OPPO A5s', 'ExponentPushToken[dxQPP-FL8YNDGP8vt6U-Vv]', '2020-12-03 01:47:17', '2020-12-03 01:47:17'),
(18, 'Redmi', 'ExponentPushToken[bY7oWlChfcZfv_oSqMKhGL]', '2020-12-03 02:30:23', '2020-12-03 02:30:23'),
(19, 'QCOM-BTD', 'ExponentPushToken[iBlyHIA2LSf3ECJek04n5t]', '2020-12-03 05:07:00', '2020-12-03 05:07:00'),
(20, 'SM-N976N', 'ExponentPushToken[LKBI-ACFS0y5wkgNvtPF39]', '2020-12-04 03:29:54', '2020-12-04 03:29:54'),
(46, 'Galaxy J6', 'ExponentPushToken[lpscPME5S3rRnztZf-KNYe]', '2020-12-26 05:41:41', '2020-12-26 05:41:41'),
(47, 'Mi Phone', 'ExponentPushToken[zzh8bOOo2lsSdWTl0y18EQ]', '2021-01-11 07:20:29', '2021-01-11 07:20:29'),
(48, 'OPPO F1s', 'ExponentPushToken[CN2MFxFXNNF-4PB0-tOXeY]', '2021-01-20 03:17:36', '2021-01-20 03:17:36'),
(49, 'iPhone', 'ExponentPushToken[UZ2n7PMqYv3TOMKFn6NXe4]', '2021-02-03 07:14:27', '2021-02-03 07:14:27'),
(50, 'iPhone', 'ExponentPushToken[7yFIofGUZXNW6lBxhshj2p]', '2021-02-03 13:30:06', '2021-02-03 13:30:06'),
(51, 'iPhone', 'ExponentPushToken[wkMuF6EeieVgsK08HCcQLU]', '2021-02-04 01:48:53', '2021-02-04 01:48:53'),
(52, 'iPad', 'ExponentPushToken[54gx_LP6N8RFtCzOjOWq75]', '2021-02-17 16:46:38', '2021-02-17 16:46:38'),
(53, 'iPhone', 'ExponentPushToken[dL35WKHWz8v_Ipg4iaZC1L]', '2021-03-12 02:59:16', '2021-03-12 02:59:16'),
(54, 'iPhone', 'ExponentPushToken[mVvUBNFoOzaK8elKYceafV]', '2021-03-12 03:23:41', '2021-03-12 03:23:41'),
(55, 'OPPO A5s', 'ExponentPushToken[80GBY1ErIxEqkltlIExti6]', '2021-04-18 20:21:29', '2021-04-18 20:21:29'),
(56, 'Redmi Note 8', 'ExponentPushToken[4re-SwK0nckAldGWoxz_cN]', '2021-04-18 22:26:13', '2021-04-18 22:26:13'),
(38, 'ALE-L23', 'ExponentPushToken[2r5luDInjlLhwFgrwnhhJe]', '2020-12-11 13:14:57', '2020-12-11 13:14:57'),
(39, 'SM-N976N', 'ExponentPushToken[HImlonAvtf1VSYOBzTaMBg]', '2020-12-13 14:56:11', '2020-12-13 14:56:11'),
(40, 'Galaxy J2 Pro', 'ExponentPushToken[krIlzdDZfKFHBXc2XArwgx]', '2020-12-14 09:27:02', '2020-12-14 09:27:02'),
(41, 'Redmi', 'ExponentPushToken[SXAPnGEo0SJNERkw2CxUGu]', '2020-12-16 04:39:49', '2020-12-16 04:39:49'),
(42, 'Redmi', 'ExponentPushToken[4okkjIIuFVGokMvgE3EOtn]', '2020-12-16 12:44:44', '2020-12-16 12:44:44'),
(43, 'SW5TaG90X0JUXy9BbmRyb2lkU2hhcmVfODIxMi9tb3RvX2U1X3BsYXkvNA==', 'ExponentPushToken[zjdKO8LBMyM8_cMwJqePmK]', '2020-12-21 13:20:51', '2020-12-21 13:20:51'),
(44, 'Galaxy S9', 'ExponentPushToken[wjLg5tG0IWQbdw9z3ur2kI]', '2020-12-21 14:33:25', '2020-12-21 14:33:25'),
(45, 'OPPO Reno4', 'ExponentPushToken[6p2S8JBVJ5-JZM4CpvTWaM]', '2020-12-22 01:21:19', '2020-12-22 01:21:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_vote`
--

CREATE TABLE `tb_vote` (
  `id_vote` int(11) NOT NULL,
  `createdat_vote` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `agenda_vote` int(11) NOT NULL,
  `user_vote` int(11) NOT NULL,
  `is_vote` enum('','0','1') NOT NULL,
  `notif` tinyint(1) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_vote`
--

INSERT INTO `tb_vote` (`id_vote`, `createdat_vote`, `agenda_vote`, `user_vote`, `is_vote`, `notif`, `priority`) VALUES
(62, '2020-12-04 14:17:32', 20, 24, '', 0, 3),
(65, '2020-12-04 14:20:51', 20, 27, '1', 1, 0),
(56, '2020-12-03 04:52:03', 21, 24, '', 0, 3),
(4, '2020-11-20 14:11:59', 5, 27, '', 0, 0),
(55, '2020-12-03 04:52:03', 21, 25, '', 0, 2),
(57, '2020-12-03 04:52:03', 21, 26, '', 0, 4),
(64, '2020-12-11 08:49:23', 20, 1, '', 1, 1),
(61, '2020-12-04 14:17:32', 20, 25, '', 0, 2),
(54, '2020-12-04 03:44:22', 21, 1, '1', 1, 1),
(52, '2020-12-04 14:17:32', 20, 26, '', 0, 4),
(63, '2020-12-03 04:52:58', 21, 27, '', 1, 0),
(66, '2020-12-07 02:54:56', 31, 1, '1', 1, 0),
(67, '2020-12-06 00:30:11', 31, 26, '', 0, 1),
(68, '2020-12-21 07:10:39', 34, 1, '', 0, 0),
(69, '2020-12-21 07:10:39', 34, 27, '', 0, 1),
(70, '2020-12-21 07:10:39', 34, 25, '', 0, 2),
(71, '2020-12-21 07:10:39', 34, 29, '', 0, 3),
(72, '2020-12-21 07:10:39', 34, 24, '', 0, 4),
(73, '2020-12-21 07:10:39', 34, 26, '', 0, 5),
(74, '2020-12-21 07:11:14', 35, 1, '', 0, 0),
(75, '2020-12-21 07:11:14', 35, 27, '', 0, 1),
(76, '2020-12-21 07:11:14', 35, 25, '', 0, 2),
(77, '2020-12-21 07:11:14', 35, 29, '', 0, 3),
(78, '2020-12-21 07:11:14', 35, 24, '', 0, 4),
(79, '2020-12-21 07:11:14', 35, 26, '', 0, 5),
(80, '2021-04-20 01:36:34', 38, 1, '1', 1, 0),
(81, '2020-12-22 01:03:06', 38, 30, '', 0, 1),
(82, '2020-12-22 01:03:06', 38, 31, '', 0, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `telepon`
--

CREATE TABLE `telepon` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nomor` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `telepon`
--

INSERT INTO `telepon` (`id`, `nama`, `nomor`) VALUES
(1, 'Orion', '08576666762'),
(2, 'Mars', '08576666770'),
(7, 'Alpha', '08576666765');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL DEFAULT '$2y$10$Cnw75fxTxzFCKe6c.VSv9e2eJj5oV6AkQ5QocLgagyFotY46RP3we',
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `agama` int(11) NOT NULL,
  `dapil` int(11) NOT NULL,
  `fraksi` int(11) NOT NULL,
  `jabatan` int(11) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `riwayat` text NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `photo` varchar(300) NOT NULL DEFAULT 'lysOjKt.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `agama`, `dapil`, `fraksi`, `jabatan`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `riwayat`, `phone`, `photo`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$10$aQ4CezI8mbJFpRXHIdXB1uvVHwrJdTu1EUYY9hHy5AyViA19WodjC', 'admin@dprd.com', NULL, NULL, NULL, NULL, NULL, 'ccf06895450f5532ada27e9773f1cc67b8649459', '$2y$10$5zTPIN2scf6Ibyajt/yDb.8qL2Kj.bJAL0rdDhtCoQlvczqkleAH.', 1268889823, 1624018257, 1, 'Admin', 'Admin', 'ADMIN', 0, 0, 0, 0, 'Sudiang raya', 'Palu', '1987-12-12', '', '0', 'uPJcXax.jpg'),
(30, '', 'operator', '$2y$10$Cnw75fxTxzFCKe6c.VSv9e2eJj5oV6AkQ5QocLgagyFotY46RP3we', 'dimas@admin.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 'dimas', 'lahay', NULL, 0, 1, 1, 18, 'mamboro', 'Dongko', '2020-12-22', '', '0451', 'lysOjKt.png'),
(31, '', 'user', '$2y$10$Cnw75fxTxzFCKe6c.VSv9e2eJj5oV6AkQ5QocLgagyFotY46RP3we', 'nilam@admin.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 'Nilam Sari', 'Lawira', NULL, 1, 2, 3, 16, 'palu', 'palu', '1965-08-25', '', '0451', 'lysOjKt.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(75, 30, 1),
(76, 30, 2),
(77, 31, 1),
(78, 31, 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kasmasjid`
--
ALTER TABLE `kasmasjid`
  ADD PRIMARY KEY (`id_keuangan`);

--
-- Indeks untuk tabel `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_agama`
--
ALTER TABLE `tb_agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indeks untuk tabel `tb_agenda`
--
ALTER TABLE `tb_agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indeks untuk tabel `tb_agendapribadi`
--
ALTER TABLE `tb_agendapribadi`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indeks untuk tabel `tb_bgevote`
--
ALTER TABLE `tb_bgevote`
  ADD PRIMARY KEY (`id_bg`);

--
-- Indeks untuk tabel `tb_dapil`
--
ALTER TABLE `tb_dapil`
  ADD PRIMARY KEY (`id_dapil`);

--
-- Indeks untuk tabel `tb_file`
--
ALTER TABLE `tb_file`
  ADD PRIMARY KEY (`id_file`);

--
-- Indeks untuk tabel `tb_fraksi`
--
ALTER TABLE `tb_fraksi`
  ADD PRIMARY KEY (`id_fraksi`);

--
-- Indeks untuk tabel `tb_hadir`
--
ALTER TABLE `tb_hadir`
  ADD PRIMARY KEY (`id_invite`);

--
-- Indeks untuk tabel `tb_history`
--
ALTER TABLE `tb_history`
  ADD PRIMARY KEY (`id_history`);

--
-- Indeks untuk tabel `tb_invite`
--
ALTER TABLE `tb_invite`
  ADD PRIMARY KEY (`id_invite`);

--
-- Indeks untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `tb_jenis_musyawarah`
--
ALTER TABLE `tb_jenis_musyawarah`
  ADD PRIMARY KEY (`id_jenis_musyawarah`);

--
-- Indeks untuk tabel `tb_notif`
--
ALTER TABLE `tb_notif`
  ADD PRIMARY KEY (`id_notif`);

--
-- Indeks untuk tabel `tb_token`
--
ALTER TABLE `tb_token`
  ADD PRIMARY KEY (`id_token`);

--
-- Indeks untuk tabel `tb_vote`
--
ALTER TABLE `tb_vote`
  ADD PRIMARY KEY (`id_vote`);

--
-- Indeks untuk tabel `telepon`
--
ALTER TABLE `telepon`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indeks untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kasmasjid`
--
ALTER TABLE `kasmasjid`
  MODIFY `id_keuangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;

--
-- AUTO_INCREMENT untuk tabel `tb_agama`
--
ALTER TABLE `tb_agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_agenda`
--
ALTER TABLE `tb_agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `tb_agendapribadi`
--
ALTER TABLE `tb_agendapribadi`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_bgevote`
--
ALTER TABLE `tb_bgevote`
  MODIFY `id_bg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_dapil`
--
ALTER TABLE `tb_dapil`
  MODIFY `id_dapil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_file`
--
ALTER TABLE `tb_file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_fraksi`
--
ALTER TABLE `tb_fraksi`
  MODIFY `id_fraksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_hadir`
--
ALTER TABLE `tb_hadir`
  MODIFY `id_invite` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_history`
--
ALTER TABLE `tb_history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `tb_invite`
--
ALTER TABLE `tb_invite`
  MODIFY `id_invite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_jenis_musyawarah`
--
ALTER TABLE `tb_jenis_musyawarah`
  MODIFY `id_jenis_musyawarah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_notif`
--
ALTER TABLE `tb_notif`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_token`
--
ALTER TABLE `tb_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `tb_vote`
--
ALTER TABLE `tb_vote`
  MODIFY `id_vote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT untuk tabel `telepon`
--
ALTER TABLE `telepon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
