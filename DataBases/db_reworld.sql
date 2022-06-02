-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Bulan Mei 2022 pada 17.29
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_reworld`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'role-admin'),
(2, 'user', 'role-user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 1),
(1, 4),
(2, 1),
(2, 2),
(2, 3),
(2, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'admin@rethree.com', 1, '2022-01-27 08:18:15', 1),
(2, '::1', 'admin@rethree.com', 1, '2022-02-04 21:46:51', 1),
(3, '::1', 'admin@rethree.com', 1, '2022-02-05 02:55:26', 1),
(4, '::1', 'admin@rethree.com', 1, '2022-02-06 08:43:38', 1),
(5, '::1', 'admin@rethree.com', 1, '2022-02-06 18:05:33', 1),
(6, '::1', 'admin@rethree.com', 1, '2022-02-07 06:36:00', 1),
(7, '::1', 'admin@rethree.com', 1, '2022-02-07 20:01:57', 1),
(8, '::1', 'admin@rethree.com', 1, '2022-02-08 00:03:05', 1),
(9, '::1', 'admin@rethree.com', 1, '2022-02-08 01:13:21', 1),
(10, '::1', 'pebrianadi05@gmail.com', 2, '2022-02-08 01:40:57', 1),
(11, '::1', 'hhe123iseng@gmail.com', NULL, '2022-02-08 02:25:35', 0),
(12, '::1', 'hhe123iseng@gmail.com', 3, '2022-02-08 02:25:49', 0),
(13, '::1', 'hhe123iseng@gmail.com', 3, '2022-02-08 02:31:54', 1),
(14, '::1', 'admin@rethree.com', 1, '2022-02-11 07:09:30', 1),
(15, '::1', 'pebrianadi05@gmail.com', 2, '2022-02-11 08:10:04', 1),
(16, '::1', 'pebrianadi05@gmail.com', 2, '2022-02-11 23:58:44', 1),
(17, '::1', 'admin@rethree.com', 1, '2022-02-12 00:01:20', 1),
(18, '::1', 'admin@rethree.com', 1, '2022-02-12 21:57:32', 1),
(19, '::1', 'admin@rethree.com', 1, '2022-03-17 05:14:07', 1),
(20, '::1', 'admin@rethree.com', 1, '2022-03-17 05:45:36', 1),
(21, '::1', 'admin@rethree.com', 1, '2022-03-18 08:54:39', 1),
(22, '::1', 'admin@rethree.com', 1, '2022-03-18 22:09:25', 1),
(23, '::1', 'admin@reworld.com', 4, '2022-03-18 23:17:55', 1),
(24, '::1', 'admin@reworld.com', 4, '2022-03-19 11:42:22', 1),
(25, '::1', 'admin@reworld.com', 4, '2022-03-19 22:59:34', 1),
(26, '::1', 'admin@reworld.com', 4, '2022-03-20 04:33:23', 1),
(27, '::1', 'admin@reworld.com', 4, '2022-03-22 03:49:37', 1),
(28, '::1', 'admin@reworld.com', 4, '2022-03-23 03:42:45', 1),
(29, '::1', 'admin@reworld.com', 4, '2022-03-23 22:20:15', 1),
(30, '::1', 'pebrianadi05@gmail.com', 2, '2022-03-23 22:29:11', 1),
(31, '::1', 'pebrianadi05@gmail.com', 2, '2022-03-30 20:08:13', 1),
(32, '::1', 'pebrianadi05@gmail.com', 2, '2022-03-30 20:13:10', 1),
(33, '::1', 'admin@reworld.com', 4, '2022-03-30 20:19:48', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'manage-all', 'admin'),
(2, 'manage-user', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_users_permissions`
--

INSERT INTO `auth_users_permissions` (`user_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(4, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_berat`
--

CREATE TABLE `data_berat` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `berat` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_berat`
--

INSERT INTO `data_berat` (`id`, `name`, `berat`) VALUES
(1, 'waste', 100),
(2, 'pohon', 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_event`
--

CREATE TABLE `data_event` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `pukul` int(128) NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `biaya` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `image` varchar(256) NOT NULL,
  `user_id` int(128) NOT NULL,
  `content` text NOT NULL,
  `tiket` int(255) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_event`
--

INSERT INTO `data_event` (`id`, `title`, `pukul`, `tempat`, `biaya`, `tanggal`, `image`, `user_id`, `content`, `tiket`, `date_created`) VALUES
(9, 'Tanam', 8, 'Desa Cisaat', 'Free', '2022-03-19', '', 4, 'test', 0, '2022-03-19 17:31:25'),
(10, 'Tanam', 8, 'Alun Alun Kejaksan', 'Free', '2020-12-12', '', 4, 'test', 0, '2022-03-19 19:19:05'),
(11, 'Tanam123', 8, 'Alun Alun Kejaksan', 'Free', '2020-12-12', '1647709524_4942aacaaea75a469d72.png', 4, 'test', 1, '2022-03-20 00:05:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_gogreen`
--

CREATE TABLE `data_gogreen` (
  `id` int(11) NOT NULL,
  `user_id` int(128) NOT NULL,
  `event_id` int(128) NOT NULL,
  `tiket_id` int(255) NOT NULL,
  `bukti` varchar(255) NOT NULL,
  `status_konfirmasi` int(2) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_gogreen`
--

INSERT INTO `data_gogreen` (`id`, `user_id`, `event_id`, `tiket_id`, `bukti`, `status_konfirmasi`, `date_created`) VALUES
(1, 4, 11, 0, '1647775988_c3fd263a0eb956b10664.png', 2, '2022-03-20'),
(2, 4, 11, 0, '1648029429_72494debfc7b66130490.png', 1, '2022-03-23'),
(3, 4, 11, 0, '1648030611_25a79a62a3066c09edaf.png', 1, '2022-03-23'),
(4, 4, 11, 0, '1648030714_4968dd75990d7364ae73.png', 1, '2022-03-23'),
(5, 4, 11, 32819, '1648033053_bddb3fd9e2c31e91bfc8.png', 1, '2022-03-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_poin`
--

CREATE TABLE `data_poin` (
  `id` int(11) NOT NULL,
  `user_id` int(128) NOT NULL,
  `safote_id` int(128) NOT NULL,
  `poin` int(128) NOT NULL,
  `status_poin` int(2) NOT NULL,
  `date_created_poin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_poin`
--

INSERT INTO `data_poin` (`id`, `user_id`, `safote_id`, `poin`, `status_poin`, `date_created_poin`) VALUES
(1, 1, 1, 10, 1, '2022-02-13 11:17:31'),
(2, 1, 4, -10, 1, '2022-02-13 11:18:40'),
(3, 4, 3, 10, 1, '2022-03-22 20:36:34'),
(4, 4, 3, 10, 1, '2022-03-22 20:36:35'),
(5, 4, 8, -10, 1, '2022-03-22 20:48:23'),
(6, 4, 8, -10, 1, '2022-03-22 20:48:29'),
(7, 4, 8, -10, 1, '2022-03-22 21:05:03'),
(8, 4, 8, -10, 1, '2022-03-22 21:07:30'),
(9, 4, 8, -10, 1, '2022-03-22 21:07:40'),
(10, 4, 8, -10, 1, '2022-03-22 21:08:03'),
(11, 4, 7, -10, 1, '2022-03-22 21:08:23'),
(12, 4, 9, 10, 1, '2022-03-22 21:21:21'),
(13, 4, 10, 10, 1, '2022-03-22 21:22:07'),
(14, 4, 11, 10, 1, '2022-03-23 18:38:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_poin_user`
--

CREATE TABLE `data_poin_user` (
  `id` int(11) NOT NULL,
  `user_id` int(128) NOT NULL,
  `poin` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_poin_user`
--

INSERT INTO `data_poin_user` (`id`, `user_id`, `poin`) VALUES
(2, 1, 10),
(3, 4, 1040);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_safoture`
--

CREATE TABLE `data_safoture` (
  `id` int(11) NOT NULL,
  `user_id` int(128) NOT NULL,
  `name` varchar(255) NOT NULL,
  `jenis_makanan` varchar(255) NOT NULL,
  `berat` int(128) NOT NULL,
  `maps` varchar(255) DEFAULT NULL,
  `status_makanan` int(2) NOT NULL,
  `status_konfirmasi` int(2) NOT NULL,
  `status_order` int(2) NOT NULL,
  `date_created` datetime NOT NULL,
  `catatan` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_safoture`
--

INSERT INTO `data_safoture` (`id`, `user_id`, `name`, `jenis_makanan`, `berat`, `maps`, `status_makanan`, `status_konfirmasi`, `status_order`, `date_created`, `catatan`, `image`) VALUES
(1, 1, 'Tempe', 'Makanan Olahan', 1, 'https://goo.gl/maps/oViQo49odyJPAuMF7', 1, 1, 0, '2022-02-13 11:17:06', 'test123', '1644725826_53df737546c393d770f1.jpg'),
(3, 4, 'seblak', 'Makanan Olahan', 1, 'https://goo.gl/maps/oViQo49odyJPAuMF7', 1, 1, 0, '2022-03-22 20:26:08', 'test123', '1647955568_e63f54b3c8a894e111ea.png'),
(4, 4, 'hhe iseng', 'Makanan Olahan', 1, 'a', 1, 2, 0, '2022-03-22 20:38:17', 'test1', '1647956297_55002c4969a9bea3f5e9.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_shop`
--

CREATE TABLE `data_shop` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `berat` int(128) NOT NULL,
  `poin` int(128) NOT NULL,
  `date_created_shop` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_shop`
--

INSERT INTO `data_shop` (`id`, `name`, `jenis`, `image`, `berat`, `poin`, `date_created_shop`) VALUES
(1, 'tomat', 'Buah', '1644241829_7ce01a76b96d60df8c3a.png', 1, 10, '2022-02-07 20:50:29'),
(2, 'Wortel', 'Sayur', '1644585564_84b21f1bc48bb4db9f49.png', 1, 1000, '2022-02-11 20:19:22'),
(3, 'Cabai', 'Sayur', '1644585818_acee2633774a4e760df4.png', 1, 1000, '2022-02-11 20:23:38'),
(4, 'Jeruk', 'Buah', '1644585875_5022938046e8292b3511.png', 1, 1000, '2022-02-11 20:24:35'),
(5, 'Brokoli', 'Sayur', '1644585912_de03261d5e9a997813be.png', 1, 1000, '2022-02-11 20:25:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_shop_list`
--

CREATE TABLE `data_shop_list` (
  `id` int(11) NOT NULL,
  `shop_id` int(128) NOT NULL,
  `user_id` int(128) NOT NULL,
  `status_shop` int(2) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_shop_list`
--

INSERT INTO `data_shop_list` (`id`, `shop_id`, `user_id`, `status_shop`, `date_created`) VALUES
(4, 1, 1, 2, '2022-02-13 11:18:08'),
(5, 1, 4, 2, '2022-03-22 19:16:47'),
(6, 2, 4, 2, '2022-03-22 19:19:25'),
(7, 1, 4, 1, '2022-03-22 19:20:52'),
(8, 1, 4, 1, '2022-03-22 20:08:47'),
(9, 1, 4, 2, '2022-03-22 21:21:01'),
(10, 1, 4, 2, '2022-03-22 21:21:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1643288723, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `image`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin@rethree.com', 'admin', 'adi.jpg', '$2y$10$6NM/bmfo..SKZEkpqKM6vuNOES4mynBbRHOFRv8eugVQvSCcEoB86', NULL, NULL, NULL, '5e9274af7a3021630a825631e1e45e2d', NULL, NULL, 1, 0, '2022-01-27 08:16:48', '2022-01-27 08:16:48', NULL),
(2, 'pebrianadi05@gmail.com', 'adi', 'adi.jpg', '$2y$10$u5EiqvsfuXCOoZQ1QsHzYuk0GXY6/A6dFst37tVj/KC/POL6GNPA2', NULL, NULL, NULL, '23ac7d9708198d421776c3c593feba41', NULL, NULL, 1, 0, '2022-02-08 01:40:09', '2022-02-08 01:40:09', NULL),
(3, 'hhe123iseng@gmail.com', 'senku', 'default.png', '$2y$10$EKU/bBBvtbKup77CmkOGves9tnv/cV0SR3EdwozcI5NE9o5XwAA86', NULL, NULL, NULL, '9d573dd00241fdae0e9d97b15c737fa9', NULL, NULL, 1, 0, '2022-02-08 02:24:55', '2022-02-08 02:24:55', NULL),
(4, 'admin@reworld.com', 'adminreworld', 'adi.jpg', '$2y$10$BwlKKKVlHpnXDoajJIdZnOjsK2EBCIHezMqlcBffVsN/8GBMEy3Ra', NULL, NULL, NULL, '8c94281819750f380312922310dcabca', NULL, NULL, 1, 0, '2022-03-18 23:16:07', '2022-03-18 23:16:07', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indeks untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indeks untuk tabel `data_berat`
--
ALTER TABLE `data_berat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_event`
--
ALTER TABLE `data_event`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_gogreen`
--
ALTER TABLE `data_gogreen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_poin`
--
ALTER TABLE `data_poin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_poin_user`
--
ALTER TABLE `data_poin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_safoture`
--
ALTER TABLE `data_safoture`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_shop`
--
ALTER TABLE `data_shop`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_shop_list`
--
ALTER TABLE `data_shop_list`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_berat`
--
ALTER TABLE `data_berat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_event`
--
ALTER TABLE `data_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `data_gogreen`
--
ALTER TABLE `data_gogreen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `data_poin`
--
ALTER TABLE `data_poin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `data_poin_user`
--
ALTER TABLE `data_poin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `data_safoture`
--
ALTER TABLE `data_safoture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `data_shop`
--
ALTER TABLE `data_shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `data_shop_list`
--
ALTER TABLE `data_shop_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
