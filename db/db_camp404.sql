-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Nov 2020 pada 06.15
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_camp404`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `slug_berita` varchar(255) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `isi_berita` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status_berita` enum('Publish','Draft','','') NOT NULL,
  `jenis_berita` varchar(20) NOT NULL,
  `keywords` varchar(500) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `id_user`, `id_kategori`, `slug_berita`, `judul_berita`, `isi_berita`, `gambar`, `status_berita`, `jenis_berita`, `keywords`, `tanggal_post`, `tanggal`) VALUES
(4, 3, 5, '3-jam-jago-javascript', '3 Jam Jago JavaScript', '<p>3 Jam Jago JavaScript</p>', 'js.png', 'Publish', 'Berita', '', '2020-11-06 14:36:47', '2020-11-06 14:30:50'),
(5, 3, 1, '3-jam-jago-html', '3 Jam Jago HTML', '<p>3 Jam Jago HTML</p>', 'html-5-icon.png', 'Publish', 'Berita', '3 Jam Jago HTML', '2020-11-06 15:35:58', '2020-11-06 14:35:58'),
(6, 3, 3, '3-jam-jago-css', '3 Jam Jago CSS', '<p>3 Jam Jago CSS</p>', 'css.png', 'Publish', 'Berita', '3 Jam Jago CSS', '2020-11-06 15:36:21', '2020-11-06 14:36:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul_galeri` varchar(255) NOT NULL,
  `isi_galeri` text NOT NULL,
  `website` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `posisi_galeri` varchar(20) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `id_user`, `judul_galeri`, `isi_galeri`, `website`, `gambar`, `posisi_galeri`, `tanggal_post`, `tanggal`) VALUES
(2, 3, 'Yahallow loseee', '<p>Yahallow</p>', 'http://camp414.com', 'owhPwPG3.jpg', 'Homepage', '2020-11-07 08:43:27', '2020-11-07 07:43:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `slug_kategori`, `nama_kategori`, `urutan`, `tanggal`) VALUES
(1, 'html', 'HTML', 1, '2020-11-05 11:09:58'),
(3, 'css', 'CSS', 3, '2020-11-05 10:04:31'),
(4, 'php', 'PHP', 2, '2020-11-05 10:11:12'),
(5, 'javascript', 'JavaScript', 4, '2020-11-05 11:10:04'),
(6, 'android', 'Android', 5, '2020-11-05 11:10:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `namaweb` varchar(50) NOT NULL,
  `tagline` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(300) DEFAULT NULL,
  `keywords` varchar(300) DEFAULT NULL,
  `metatext` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `id_user`, `namaweb`, `tagline`, `email`, `website`, `deskripsi`, `keywords`, `metatext`, `logo`, `icon`, `facebook`, `instagram`, `tanggal`) VALUES
(1, 0, 'Camp404', 'School of Web Proggraming', 'contact@camp404.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-07 07:55:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `slug_layanan` varchar(255) NOT NULL,
  `judul_layanan` varchar(255) NOT NULL,
  `isi_layanan` text NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status_layanan` varchar(20) NOT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `id_user`, `slug_layanan`, `judul_layanan`, `isi_layanan`, `harga`, `gambar`, `status_layanan`, `keywords`, `tanggal_post`, `tanggal`) VALUES
(2, 3, 'kelas-html', 'Kelas HTML', '<p>Kelas HTML</p>', 200000, 'html-5-icon1.png', 'Publish', 'Kelas HTML', '2020-11-07 03:07:59', '2020-11-07 02:07:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `tanggal`) VALUES
(2, 'Budi Budiman', 'budi@gmail.com', 'budi123', '30a96cdbc1205b1ed4ae399350fe8f6d839f32cc', 'User', '2020-11-05 05:27:26'),
(3, 'Muhamad Wahyu Alif', 'wahyualief1@gmail.com', 'wahyualif', '19d83bd82585f8e43ebc7c1365ca4d80bdadd7bd', 'Admin', '2020-11-05 07:27:45');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
