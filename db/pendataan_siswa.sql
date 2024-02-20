-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Feb 2024 pada 16.26
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendataan_siswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `datakepsek`
--

CREATE TABLE `datakepsek` (
  `id_kepsek` int(11) NOT NULL,
  `nama_kepsek` varchar(50) NOT NULL,
  `nomor_induk` varchar(25) NOT NULL,
  `ttd` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `datakepsek`
--

INSERT INTO `datakepsek` (`id_kepsek`, `nama_kepsek`, `nomor_induk`, `ttd`) VALUES
(6, 'Kepala Sekolah 1', '1610055', '65d452fc0f5d9.jpeg'),
(7, 'Kepsek Induk', '992384', '65d452fc0f5d9.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datasiswa`
--

CREATE TABLE `datasiswa` (
  `id` int(11) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `nis_nisn` varchar(30) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `agama` varchar(30) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `gambar` varchar(30) NOT NULL,
  `id_kepsek` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `datasiswa`
--

INSERT INTO `datasiswa` (`id`, `nama_siswa`, `nis_nisn`, `jenis_kelamin`, `agama`, `tempat_lahir`, `tgl_lahir`, `alamat`, `gambar`, `id_kepsek`) VALUES
(1, 'Karim', '11219', 'Laki-Laki', 'Islam', 'Palembang', '2005-10-16', 'Jl. Kebon Bawang, Jalannya Jalan Jalan Sama Dia, Dianya Ga tau kemana', '65d17ffc2ce76.jpg', 6),
(3, 'Kopi', '00001', 'Perempuan', 'Nothumans', 'Website', '2024-02-19', 'Internet', '65d2fb3249fb5.png', 6),
(4, 'Cuci Instan', '123456', 'Laki-Laki', 'Nothumans', 'Website', '0000-00-00', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt possimus atque, aut sapiente laudantium, minus eligendi sunt obcaecati, iure architecto voluptatibus est velit rerum unde fugiat repel', '65d4bfb823d33.png', 6),
(5, 'Manusia Kepsek', '222323', 'Laki-Laki', 'Nothumans', 'Website', '0000-00-00', 'Jl. Kebon Bawang, Rt.5/Rw.7, Kebon Bawang, Tanjung Priok, Jakarta Utara', '', 7);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `datakepsek`
--
ALTER TABLE `datakepsek`
  ADD PRIMARY KEY (`id_kepsek`);

--
-- Indeks untuk tabel `datasiswa`
--
ALTER TABLE `datasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kepsek` (`id_kepsek`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `datakepsek`
--
ALTER TABLE `datakepsek`
  MODIFY `id_kepsek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `datasiswa`
--
ALTER TABLE `datasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
