-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04 Jul 2016 pada 06.32
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siskkm`
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
(2, 'up2kk', 'Anggota UP2KK Politeknik Negeri Bali'),
(3, 'mahasiswa', 'Mahasiswa Politeknik Negeri Bali');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `jenis`) VALUES
(1, 'Pengurus Organisasi Mahasiswa'),
(2, 'Kepanitiaan'),
(3, 'Kegiatan Ilmiah Mahasiswa (Seminar, Karya Ilmiah)'),
(4, 'Prestasi Bidang Penalaran Mahasiswa'),
(5, 'Pengabdian Kepada Masyarakat'),
(6, 'Peserta Pelatihan Bidang Penalaran, Minat dan Bakat'),
(7, 'Prestasi Bidang Minat dan Bakat'),
(8, 'Lankka'),
(9, 'Baksosma'),
(10, 'Aksosma');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama_jurusan`) VALUES
(1, 'Teknik Elektro'),
(2, 'Pariwisata'),
(3, 'Akuntansi'),
(4, 'Teknik Mesin'),
(5, 'Teknik Sipil'),
(6, 'Administrasi Niaga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `kelas` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `kelas`) VALUES
(1, 'A'),
(2, 'B'),
(5, 'C');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `isi_pengumuman` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_user` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `nama_prodi` varchar(255) NOT NULL,
  `jenjang` char(2) NOT NULL,
  `id_jurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id`, `nama_prodi`, `jenjang`, `id_jurusan`) VALUES
(11, 'Teknik Sipil', 'D3', 5),
(12, 'Manajemen Proyek Konstruksi', 'D4', 5),
(21, 'Teknik Mesin', 'D3', 4),
(22, 'Tata Pendingin dan Tata Udara', 'D3', 4),
(31, 'Teknik Listrik', 'D3', 1),
(32, 'Manajemen Informatika', 'D3', 1),
(61, 'Akuntansi', 'D3', 3),
(64, 'Akuntansi Manajerial', 'D4', 3),
(71, 'Administrasi Bisnis', 'D3', 6),
(74, 'Manajemen Bisnis Internasional', 'D4', 6),
(81, 'Usaha Perjalanan Wisata', 'D3', 2),
(82, 'Perhotelan', 'D3', 2),
(83, 'Manajemen Bisnis Pariwisata', 'D4', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sebagai`
--

CREATE TABLE `sebagai` (
  `id_sebagai` int(11) NOT NULL,
  `id_tingkat_fk` int(11) NOT NULL,
  `sebagai` varchar(255) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `sebagai`
--

INSERT INTO `sebagai` (`id_sebagai`, `id_tingkat_fk`, `sebagai`, `bobot`) VALUES
(1, 1, 'Ketua', 5),
(2, 1, 'BPH Lainnya', 4),
(3, 1, 'Anggota', 1),
(4, 2, 'Ketua', 5),
(5, 2, 'BPH Lainnya', 4),
(6, 2, 'Anggota', 3),
(7, 3, 'Ketua', 6),
(8, 3, 'BPH Lainnya', 5),
(9, 3, 'Anggota', 4),
(10, 4, 'Ketua', 6),
(11, 4, 'BPH Lainnya', 5),
(12, 4, 'Anggota', 4),
(13, 5, 'Ketua', 8),
(14, 5, 'BPH Lainnya', 6),
(15, 5, 'Anggota', 5),
(16, 6, 'Ketua', 10),
(17, 6, 'BPH Lainnya', 8),
(18, 6, 'Anggota', 6),
(19, 12, 'Ketua/Penanggung Jawab/SC', 6),
(20, 12, 'BPH Lainnya', 5),
(21, 12, 'Anggota', 3),
(22, 11, 'Ketua/Penanggung Jawab/SC', 5),
(23, 11, 'BPH Lainnya', 4),
(24, 11, 'Anggota', 2),
(25, 10, 'Ketua/Penanggung Jawab/SC', 5),
(26, 10, 'BPH Lainnya', 4),
(27, 10, 'Anggota', 2),
(28, 9, 'Ketua/Penanggung Jawab/SC', 4),
(29, 9, 'BPH Lainnya', 3),
(30, 9, 'Anggota', 2),
(31, 8, 'Ketua/Penanggung Jawab/SC', 4),
(32, 8, 'BPH Lainnya', 3),
(33, 8, 'Anggota', 2),
(34, 13, 'Ketua/Penanggung Jawab/SC', 8),
(35, 13, 'BPH Lainnya', 6),
(36, 13, 'Anggota', 5),
(37, 15, 'Ketua/Penyaji', 8),
(38, 15, 'Anggota', 4),
(39, 15, 'Peserta', 3),
(40, 14, 'Ketua/Penyaji', 6),
(41, 14, 'Anggota', 3),
(42, 14, 'Peserta', 2),
(43, 7, 'Ketua/Penyaji', 4),
(44, 7, 'Anggota', 2),
(45, 7, 'Peserta', 1),
(46, 16, 'Juara I', 5),
(47, 16, 'Juara II', 4),
(48, 16, 'Juara III', 3),
(49, 16, 'Juara Harapan', 2),
(50, 16, 'Peserta', 1),
(51, 17, 'Juara I', 6),
(52, 17, 'Juara II', 5),
(53, 17, 'Juara III', 4),
(54, 17, 'Juara Harapan', 3),
(55, 17, 'Peserta', 2),
(56, 18, 'Juara I', 8),
(57, 18, 'Juara II', 6),
(58, 18, 'Juara III', 5),
(59, 18, 'Juara Harapan', 4),
(60, 18, 'Peserta', 3),
(61, 19, 'Ketua', 4),
(62, 19, 'BPH Lainnya', 3),
(63, 19, 'Anggota', 2),
(64, 19, 'Peserta', 1),
(65, 20, 'Ketua', 6),
(66, 20, 'BPH Lainnya', 4),
(67, 20, 'Anggota', 3),
(68, 20, 'Peserta', 2),
(69, 21, 'Ketua', 8),
(70, 21, 'BPH Lainnya', 6),
(71, 21, 'Anggota', 5),
(72, 21, 'Peserta', 4),
(73, 24, 'Peserta', 3),
(74, 23, 'Peserta', 2),
(75, 22, 'Peserta', 1),
(76, 25, 'Juara I', 5),
(77, 25, 'Juara II', 4),
(78, 25, 'Juara III', 3),
(79, 25, 'Juara Harapan', 2),
(80, 25, 'Peserta', 1),
(81, 26, 'Juara I', 6),
(82, 26, 'Juara II', 5),
(83, 26, 'Juara III', 4),
(84, 26, 'Juara Harapan', 3),
(85, 26, 'Peserta', 2),
(86, 27, 'Juara I', 8),
(87, 27, 'Juara II', 6),
(88, 27, 'Juara III', 5),
(89, 27, 'Juara Harapan', 4),
(90, 27, 'Peserta', 3),
(91, 28, 'Peserta', 5),
(92, 35, 'Peserta', 5),
(93, 36, 'Peserta', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `semester` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `semester`
--

INSERT INTO `semester` (`id`, `semester`) VALUES
(1, 'I'),
(2, 'II'),
(3, 'III'),
(4, 'IV'),
(5, 'V'),
(6, 'VI'),
(7, 'VII'),
(8, 'VIII');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skkm`
--

CREATE TABLE `skkm` (
  `id_user` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `filefoto` text NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_tingkat` int(11) NOT NULL,
  `id_sebagai` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `standar`
--

CREATE TABLE `standar` (
  `id` int(11) NOT NULL,
  `jenjang` char(2) NOT NULL,
  `standar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `standar`
--

INSERT INTO `standar` (`id`, `jenjang`, `standar`) VALUES
(1, 'D3', 24),
(2, 'D4', 28);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tingkat`
--

CREATE TABLE `tingkat` (
  `id_tingkat` int(11) NOT NULL,
  `id_jenis_fk` int(11) NOT NULL,
  `tingkat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tingkat`
--

INSERT INTO `tingkat` (`id_tingkat`, `id_jenis_fk`, `tingkat`) VALUES
(1, 1, 'Pengurus Organisasi UKM'),
(2, 1, 'Pengurus Organisasi Jurusan'),
(3, 1, 'Pengurus Organisasi BEM'),
(4, 1, 'Pengurus Organisasi MPM'),
(5, 1, 'Pengurus Organisasi Nasional'),
(6, 1, 'Pengurus Organisasi Internasional'),
(7, 3, 'Kegiatan Ilmiah Politeknik'),
(8, 2, 'Kepanitiaan UKM'),
(9, 2, 'Kepanitiaan Jurusan'),
(10, 2, 'Kepanitiaan BEM'),
(11, 2, 'Kepanitiaan MPM'),
(12, 2, 'Kepanitiaan Nasional'),
(13, 2, 'Kepanitiaan Internasional'),
(14, 3, 'Kegiatan Ilmiah Nasional'),
(15, 3, 'Kegiatan Ilmiah Internasional'),
(16, 4, 'Prestasi Penalaran Politeknik'),
(17, 4, 'Prestasi Penalaran Nasional'),
(18, 4, 'Prestasi Penalaran Internasional'),
(19, 5, 'Pengabdian Politeknik'),
(20, 5, 'Pengabdian Nasional'),
(21, 5, 'Pengabdian Internasional'),
(22, 6, 'Pelatihan Politeknik'),
(23, 6, 'Pelatihan Nasional'),
(24, 6, 'Pelatihan Internasional'),
(25, 7, 'Prestasi Minat Bakat Politeknik'),
(26, 7, 'Prestasi Minat Bakat Nasional'),
(27, 7, 'Prestasi Minat Bakat Internasional'),
(28, 8, 'Lankka Politeknik'),
(35, 9, 'Baksosma Politeknik'),
(36, 10, 'Aksosma Politeknik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `nama_depan` varchar(50) DEFAULT NULL,
  `nama_belakang` varchar(50) DEFAULT NULL,
  `nim` varchar(10) DEFAULT NULL,
  `nip` varchar(21) DEFAULT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  `id_prodi` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_semester` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `nama_depan`, `nama_belakang`, `nim`, `nip`, `id_jurusan`, `id_prodi`, `id_kelas`, `id_semester`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1467583316, 1, 'Admin', 'istrator', '', '12345678960', NULL, NULL, NULL, NULL),
(3, '::1', NULL, '$2y$08$gxicTaM8gyqf6HzEmXTptO/7p2/1YRZHiq8snTI.8vc1SVm5DVGxO', NULL, 'satyakresna6295@gmail.com', NULL, NULL, NULL, NULL, 1467583344, 1467590482, 1, 'Satya', 'Kresna', '1315323051', NULL, 1, 32, 5, 6),
(4, '::1', NULL, '$2y$08$blQgLi.0auwMWg3QgIBYJu/SUhRlWwuDWmOH6.D1fNgpNxzojkTXq', NULL, 'indahcpt@gmail.com', NULL, NULL, NULL, NULL, 1467583389, 1467601367, 1, 'Indah', 'Ciptayani', NULL, '12345678987659', 1, NULL, NULL, NULL);

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
(1, 1, 1),
(2, 1, 2),
(5, 3, 3),
(4, 4, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_prodi_jurusan` (`id_jurusan`);

--
-- Indexes for table `sebagai`
--
ALTER TABLE `sebagai`
  ADD PRIMARY KEY (`id_sebagai`),
  ADD KEY `id_tingkat` (`id_tingkat_fk`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skkm`
--
ALTER TABLE `skkm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standar`
--
ALTER TABLE `standar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tingkat`
--
ALTER TABLE `tingkat`
  ADD PRIMARY KEY (`id_tingkat`),
  ADD KEY `id_jenis` (`id_jenis_fk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sebagai`
--
ALTER TABLE `sebagai`
  MODIFY `id_sebagai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `skkm`
--
ALTER TABLE `skkm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `standar`
--
ALTER TABLE `standar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tingkat`
--
ALTER TABLE `tingkat`
  MODIFY `id_tingkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
