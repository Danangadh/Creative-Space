-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jan 2025 pada 11.41
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `creative_space`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `judul` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `isi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `gambar` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `article`
--

INSERT INTO `article` (`id`, `judul`, `isi`, `gambar`, `tanggal`, `username`) VALUES
(1, 'Poster dengan konsep kabinet Progressive', 'ini adalah hasil design saya ketika saya berada di devisi medkref', 'poster.jpg', '2024-12-01 12:00:00', 'admin'),
(2, 'Foto devisi BEM FIK', 'ini adalah hasil Photography saya ketika memotret foto Divisi untuk kebutuhan feeds intagram BEM FIK', 'foto.jpg', '2024-12-01 12:10:00', 'admin'),
(3, 'Teaser Oprec BEM FIK', 'Proses pembuatan video teaser OPREC BEM FIK Udinus. Disini saya diposisikan sebagai penanggung jawab pembuatan video teaser dari kepanitiaan publikasi dan dokumentasi OPREC BEM FIK', 'teaser.jpg', '2024-12-01 12:20:00', 'admin'),
(5, 'Poster FIK FAIR 2024', 'ini adalah hasil kerja saya ketika di amanahkan sebagai Koordinator Publikasi dan Dokumentasi FIK FAIR 2024', '20250112150953.png', '2025-01-12 15:09:53', 'admin'),
(6, 'Teaser Fixcup 5.0', 'Ini adalah teaser yang telah saya buat untuk event FIXCUP 5.0', '20250112145848.png', '2025-01-12 14:58:48', 'admin'),
(7, 'Teaser LKMM-TD FIK', 'Ini Teaser LKMM-TD FIK yang telah saya buat pada bulan kemarin. Teaser ini bertema Game Zelda yang dimana sekelompok mahasiswa sedang mencari permasalahn pada berkas yang tertolak.', '20250112150049.png', '2025-01-12 15:00:49', 'admin'),
(8, 'Poster Promosi Tenant FIK FAIR', 'Ini juga salah satu hasil saya pada saat menjadi Koordinator Publikasi dan Dokumentasi di FIK FAIR 2024. Poster ini merupakan poster promosi tenan/stand jualan pada FIK FAIR 2024', '20250112150640.png', '2025-01-12 15:06:40', 'admin'),
(9, 'Feeds Pribadi', 'Feeds personal yang menceritakan tentang keluarga', '20250112173243.png', '2025-01-12 17:32:43', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id`, `nama`, `deskripsi`, `tanggal`) VALUES
(1, 'Poster', 'Ini adalah hasil design saya ketika saya berada di devisi medkref', '2024-12-01 12:00:00'),
(2, 'Foto', 'ini adalah hasil Photography saya ketika memotret foto Divisi untuk kebutuhan feeds intagram BEM FIK', '2024-12-01 12:10:00'),
(3, 'Teaser', 'Proses pembuatan video teaser OPREC BEM FIK Udinus. Disini saya diposisikan sebagai penanggung jawab pembuatan video teaser dari kepanitiaan publikasi dan dokumentasi OPREC BEM FIK', '2024-12-01 12:20:00'),
(4, 'Workshop', NULL, '2025-01-12 10:58:36'),
(5, 'Special Perfom', NULL, '2025-01-12 11:00:22'),
(6, 'Fik School battle', NULL, '2025-01-12 11:00:50'),
(7, 'Foto kabinet', NULL, '2025-01-12 11:01:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id`, `username`, `foto`, `password`) VALUES
(1, 'dudung', 'DSC06971.JPG', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'admin', 'spiderman.jpeg', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile`
--

CREATE TABLE `profile` (
  `Ganti password` int(11) NOT NULL,
  `Ganti foto Profile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `foto`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
