-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Nov 2021 pada 07.36
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
-- Database: `silp`
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
(274, '::1', 'admin@mwd.com', 1637114441),
(275, '::1', 'admin@mwd.com', 1637114450);

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
(1, '127.0.0.1', 'administrator', '$2y$12$2edg6y4lcqWG7eW2Nxs4POTfnWKQocdV2ozzonSD0Hfr/UyYEmJUW', 'admin@silp.com', NULL, NULL, NULL, NULL, NULL, '39e79522480917062487adb3b03056e6584399dd', '$2y$10$QBPo9hT/SRznki0byT0H7uWJ0XvuttdNymo9DyvlRlS.w9zH0XFvC', 1268889823, 1637129395, 1, 'Admin', 'Admin', 'ADMIN', 0, 0, 0, 0, 'Sudiang raya', 'Palu', '1987-12-12', '', '0', 'uPJcXax.jpg'),
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
(75, 1, 1),
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
-- AUTO_INCREMENT untuk tabel `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;

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
