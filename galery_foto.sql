-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Feb 2024 pada 02.47
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
-- Database: `galery_foto`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `album`
--

CREATE TABLE `album` (
  `albumid` int(11) NOT NULL,
  `cover_album` varchar(255) NOT NULL,
  `nama_album` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal_dibuat` date NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `album`
--

INSERT INTO `album` (`albumid`, `cover_album`, `nama_album`, `deskripsi`, `tanggal_dibuat`, `userid`) VALUES
(42, '1708969076_7b69b408ed8569e4a952.jpg', 'the flowers', 'love flowers', '2024-02-27', 28);

-- --------------------------------------------------------

--
-- Struktur dari tabel `albumsave`
--

CREATE TABLE `albumsave` (
  `albumsaveid` int(11) NOT NULL,
  `albumid` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `albumsave`
--

INSERT INTO `albumsave` (`albumsaveid`, `albumid`, `fotoid`, `userid`) VALUES
(25, 42, 43, 28);

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `fotoid` int(11) NOT NULL,
  `judul_foto` varchar(255) NOT NULL,
  `deskripsi_foto` text NOT NULL,
  `tanggal_unggah` date NOT NULL,
  `foto` varchar(255) NOT NULL,
  `lokasi_file` varchar(255) NOT NULL,
  `albumid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`fotoid`, `judul_foto`, `deskripsi_foto`, `tanggal_unggah`, `foto`, `lokasi_file`, `albumid`, `userid`) VALUES
(20, 'kucing', 'kucing\r\n', '2024-01-30', '1706578753_f281367874798c7380a7.jpg', '', 0, 28),
(21, 'laut', 'laut', '2024-01-30', '1706579080_73cc9cdaf6af2abd8725.jpg', '', 0, 29),
(22, 'kebun teh', 'alam dan segala keindahannya\r\n', '2024-01-30', '1706594160_3096b7b1ce7e94179c44.jpg', '', 0, 32),
(23, 'moon', 'sky and the moon, so beautiful ❤️', '2024-01-30', '1706623839_99c52ce30a5bf87b7ea4.jpg', '', 0, 28),
(31, 'healing', 'haii ><', '2024-02-01', '1706806699_fbaefff0ac34172d0478.jpg', '', 43, 28),
(32, 'my boy', 'i love u  so much❤️', '2024-02-01', '1707894918_28d6b19902f0535be952.jpg', '', 0, 28),
(36, 'girlfriend', 'she\'s cute????', '2024-02-05', '1707139458_e94b8c817407c5628dc0.jpg', '', 0, 36),
(38, 'sunset', 'Senja diatas laut adalah lukisan perpisahan', '2024-02-05', '1707140147_fd492cf820eb3ffa612c.jpg', '', 0, 30),
(42, 'yearbook', 'black ????', '2024-02-05', '1707143018_dc32f3f4e3929fdefcb5.jpeg', '', 0, 28),
(43, 'haiii', 'haii', '2024-02-05', '1707143344_4d15c2828db9df011f64.jpg', '', 42, 28),
(44, 'bandung', 'bandung', '2024-02-05', '1707143433_425ce0b8877834a161b6.jpg', '', 0, 30),
(45, 'art', 'art\r\n', '2024-02-06', '1707190770_5b02f02945a45f19b5b7.jpg', '', 0, 37),
(46, 'p', 'p', '2024-02-06', '1707192463_885297023b332afe67ac.jpg', '', 0, 38),
(47, 'g', 'Haloo, kenalin akuu galang. Salam kenal yaa', '2024-02-06', '1707193834_361775f723f313e94e56.jpg', '', 0, 38);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `komentarid` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `isi_komentar` text NOT NULL,
  `tgl_komentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`komentarid`, `fotoid`, `userid`, `isi_komentar`, `tgl_komentar`) VALUES
(11, 21, 30, 'keren', '2024-02-05'),
(12, 34, 30, 'trhanks', '2024-02-05'),
(13, 32, 30, '❤️❤️????', '2024-02-05'),
(14, 35, 36, 'happy day!', '2024-02-05'),
(15, 36, 30, '❤️', '2024-02-05'),
(16, 47, 28, 'haii', '2024-02-09'),
(25, 45, 28, 'love it!', '2024-02-10'),
(26, 36, 28, 'haloo', '2024-02-10'),
(27, 22, 28, 'hai haii', '2024-02-10'),
(28, 36, 36, 'cantikk', '2024-02-10'),
(31, 46, 28, 'haii', '2024-02-14'),
(37, 42, 28, 'alooo', '2024-02-24'),
(38, 31, 28, 'cantikk', '2024-02-24'),
(39, 49, 28, 'haooooo', '2024-02-25'),
(40, 43, 28, 'xaxmxnsxn', '2024-02-25'),
(51, 51, 38, 'jswswjsw', '2024-02-25'),
(53, 51, 38, 'xbdjxbdjcbejcxcnedcm', '2024-02-25'),
(56, 51, 36, 'hbabah', '2024-02-25'),
(57, 51, 36, 'anbbaka', '2024-02-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `like`
--

CREATE TABLE `like` (
  `likeid` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `tanggal_like` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `like`
--

INSERT INTO `like` (`likeid`, `fotoid`, `userid`, `tanggal_like`) VALUES
(7, 47, 28, '2024-02-12'),
(9, 45, 28, '2024-02-12'),
(15, 43, 38, '2024-02-13'),
(16, 20, 38, '2024-02-13'),
(20, 31, 28, '2024-02-24'),
(21, 43, 28, '2024-02-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(255) NOT NULL,
  `foto_profil` varchar(255) NOT NULL,
  `namalengkap` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  `active` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `email`, `foto_profil`, `namalengkap`, `alamat`, `created_at`, `updated_at`, `deleted_at`, `active`) VALUES
(28, 'amell', 'bae5e3208a3c700e3db642b6631e95b9', 'amelia@gmail.com', '1707886298_5951312ce9acc2a19007.jpg', 'amelia dian melinda', 'pppppp', '2024-01-30 00:52:48', '2024-02-27 00:29:32', '0000-00-00 00:00:00', 'true'),
(29, 'dewi', '1bbd886460827015e5d605ed44252251', '', '1707368702_d500ef02cabe02a01bc5.jpg', '', '', '2024-01-30 01:44:10', '2024-02-08 05:05:02', '0000-00-00 00:00:00', 'true'),
(30, 'rehan', '1bbd886460827015e5d605ed44252251', '', '1707368763_278ade6e2d9fd80c938f.jpg', '', '', '2024-01-30 04:10:51', '2024-02-08 05:06:03', '0000-00-00 00:00:00', 'true'),
(31, 'Amelia Dian Melinda', '1bbd886460827015e5d605ed44252251', '', 'default_profil.jpg', '', '', '2024-01-30 04:40:44', '2024-01-30 04:40:44', '0000-00-00 00:00:00', 'true'),
(32, 'mahadewi sabrina ', '1bbd886460827015e5d605ed44252251', '', '1707369235_ee90f4f6dd4706285d1e.jpg', '', '', '2024-01-30 04:42:28', '2024-02-08 05:13:55', '0000-00-00 00:00:00', 'true'),
(33, 'dianaaa', '1bbd886460827015e5d605ed44252251', '', 'default_profil.jpg', '', '', '2024-02-03 03:06:44', '2024-02-03 03:06:44', '0000-00-00 00:00:00', 'true'),
(34, 'nashril', '1bbd886460827015e5d605ed44252251', '', 'default_profil.jpg', '', '', '2024-02-05 01:52:29', '2024-02-05 01:52:29', '0000-00-00 00:00:00', 'true'),
(35, 'ttcutctu', '1bbd886460827015e5d605ed44252251', '', 'default_profil.jpg', '', '', '2024-02-05 01:54:29', '2024-02-05 01:54:29', '0000-00-00 00:00:00', 'true'),
(36, 'juna', '1bbd886460827015e5d605ed44252251', '', '1707369354_e85d8eb43b6f50e3bc1e.jpg', '', '', '2024-02-05 07:40:53', '2024-02-08 05:15:54', '0000-00-00 00:00:00', 'true'),
(37, 'ahlul', '1bbd886460827015e5d605ed44252251', '', '1707309271_25a03322016091a25c80.jpg', '', '', '2024-02-06 03:37:18', '2024-02-09 16:35:30', '0000-00-00 00:00:00', 'true'),
(38, 'kiiaaraa', '1bbd886460827015e5d605ed44252251', '', '1707369270_6bcad2301c4e381347c5.jpg', '', '', '2024-02-06 03:57:19', '2024-02-08 05:14:30', '0000-00-00 00:00:00', 'true'),
(43, 'h', '1bbd886460827015e5d605ed44252251', '1@gmail.com', 'default_profil.jpg', '', '', '2024-02-15 13:41:12', '2024-02-15 13:41:12', '0000-00-00 00:00:00', 'true'),
(56, 'gabutt ', '1bbd886460827015e5d605ed44252251', '', 'default_profil.jpg', '', '', '2024-02-22 17:49:38', '2024-02-22 17:49:59', '0000-00-00 00:00:00', 'true');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`albumid`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `albumsave`
--
ALTER TABLE `albumsave`
  ADD PRIMARY KEY (`albumsaveid`),
  ADD KEY `albumid` (`albumid`,`fotoid`,`userid`);

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`fotoid`),
  ADD KEY `albumid` (`albumid`,`userid`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`komentarid`),
  ADD KEY `fotoid` (`fotoid`,`userid`);

--
-- Indeks untuk tabel `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`likeid`),
  ADD KEY `fotoid` (`fotoid`,`userid`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `album`
--
ALTER TABLE `album`
  MODIFY `albumid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `albumsave`
--
ALTER TABLE `albumsave`
  MODIFY `albumsaveid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `fotoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `komentarid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `like`
--
ALTER TABLE `like`
  MODIFY `likeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
