-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 12 Okt 2024 pada 04.49
-- Versi server: 8.0.30
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `syihabpersada`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_berkas`
--

CREATE TABLE `tbl_berkas` (
  `id_berkas` int NOT NULL,
  `kode_booking` varchar(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `tanggal_booking` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `id_users` int NOT NULL,
  `id_rumah` int NOT NULL,
  `bi_checking` int NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `ceklis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_berkas`
--

INSERT INTO `tbl_berkas` (`id_berkas`, `kode_booking`, `nama`, `nik`, `pekerjaan`, `tanggal_booking`, `status`, `id_users`, `id_rumah`, `bi_checking`, `tanggal_selesai`, `ceklis`) VALUES
(1, '001', 'Faisal', '6371020402980006', 'Karyawan Swasta', '2024-10-12', 'Proses Pengumpulan', 1, 1, 1, NULL, '1,2,3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_berkas_admin`
--

CREATE TABLE `tbl_berkas_admin` (
  `id_berkas` int NOT NULL,
  `kode_booking` varchar(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `tanggal_booking` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `id_users` int NOT NULL,
  `bi_checking` varchar(50) DEFAULT NULL,
  `ceklis` text,
  `tanggal_selesai` date DEFAULT NULL,
  `id_rumah` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hak_akses`
--

CREATE TABLE `tbl_hak_akses` (
  `id` int NOT NULL,
  `id_user_level` int NOT NULL,
  `id_menu` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_hak_akses`
--

INSERT INTO `tbl_hak_akses` (`id`, `id_user_level`, `id_menu`) VALUES
(31, 1, 10),
(32, 2, 12),
(33, 2, 13),
(34, 2, 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_komplek`
--

CREATE TABLE `tbl_komplek` (
  `id_komplek` int NOT NULL,
  `nama_komplek` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_komplek`
--

INSERT INTO `tbl_komplek` (`id_komplek`, `nama_komplek`) VALUES
(1, 'SPI 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_main_menu` int NOT NULL,
  `is_aktif` enum('y','n') NOT NULL COMMENT 'y=yes,n=no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `title`, `url`, `icon`, `is_main_menu`, `is_aktif`) VALUES
(1, 'KELOLA MENU', 'kelolamenu', 'fa fa-server', 0, 'y'),
(2, 'KELOLA PENGGUNA', 'user', 'fa fa-user-o', 0, 'y'),
(3, 'level PENGGUNA', 'userlevel', 'fa fa-users', 0, 'y'),
(9, 'Contoh Form', 'welcome/form', 'fa fa-id-card', 0, 'y'),
(10, 'Data Berkas', 'tbl_berkas', 'fa fa-archive', 0, 'y'),
(11, 'Data Berkas', 'tbl_berkas_admin', 'fa fa-archive', 0, 'y'),
(12, 'Data Komplek', 'tbl_komplek', 'fa fa-tags', 0, 'y'),
(13, 'Data Rumah', 'tbl_rumah', 'fa fa-home', 0, 'y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rumah`
--

CREATE TABLE `tbl_rumah` (
  `id_rumah` int NOT NULL,
  `id_komplek` int NOT NULL,
  `blok` varchar(50) NOT NULL,
  `nomer` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_rumah`
--

INSERT INTO `tbl_rumah` (`id_rumah`, `id_komplek`, `blok`, `nomer`, `status`) VALUES
(1, 1, 'A', '1', '1'),
(2, 1, 'A', '2', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id_setting` int NOT NULL,
  `nama_setting` varchar(50) NOT NULL,
  `value` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_setting`
--

INSERT INTO `tbl_setting` (`id_setting`, `nama_setting`, `value`) VALUES
(1, 'Tampil Menu', 'ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_users` int NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `id_user_level` int NOT NULL,
  `is_aktif` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_users`, `full_name`, `email`, `password`, `images`, `id_user_level`, `is_aktif`) VALUES
(1, 'Marketing 1', 'marketing@gmail.com', '$2y$04$Wbyfv4xwihb..POfhxY5Y.jHOJqEFIG3dLfBYwAmnOACpH0EWCCdq', 'atomix_user31.png', 1, 'y'),
(3, 'Admin', 'admin@gmail.com', '$2y$04$Wbyfv4xwihb..POfhxY5Y.jHOJqEFIG3dLfBYwAmnOACpH0EWCCdq', 'atomix_user31.png', 2, 'y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_level`
--

CREATE TABLE `tbl_user_level` (
  `id_user_level` int NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user_level`
--

INSERT INTO `tbl_user_level` (`id_user_level`, `nama_level`) VALUES
(1, 'Marketing'),
(2, 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_berkas`
--
ALTER TABLE `tbl_berkas`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indeks untuk tabel `tbl_berkas_admin`
--
ALTER TABLE `tbl_berkas_admin`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indeks untuk tabel `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_komplek`
--
ALTER TABLE `tbl_komplek`
  ADD PRIMARY KEY (`id_komplek`);

--
-- Indeks untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tbl_rumah`
--
ALTER TABLE `tbl_rumah`
  ADD PRIMARY KEY (`id_rumah`);

--
-- Indeks untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_users`);

--
-- Indeks untuk tabel `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_berkas`
--
ALTER TABLE `tbl_berkas`
  MODIFY `id_berkas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_berkas_admin`
--
ALTER TABLE `tbl_berkas_admin`
  MODIFY `id_berkas` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `tbl_komplek`
--
ALTER TABLE `tbl_komplek`
  MODIFY `id_komplek` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_rumah`
--
ALTER TABLE `tbl_rumah`
  MODIFY `id_rumah` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id_setting` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_users` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `id_user_level` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
