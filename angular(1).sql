-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15 Sep 2016 pada 22.58
-- Versi Server: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `angular`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `city`
--

CREATE TABLE `city` (
  `id_city` int(11) NOT NULL,
  `nama_kota` varchar(10) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `dataY` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `city`
--

INSERT INTO `city` (`id_city`, `nama_kota`, `jenis`, `dataY`) VALUES
(1, 'berlin', 'male', 26),
(2, 'london', 'female', 32),
(3, 'sydney', 'male', 24),
(4, 'manchester', 'female', 18);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data`
--

CREATE TABLE `data` (
  `id_data` int(11) NOT NULL,
  `id_city` int(11) NOT NULL,
  `data` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data`
--

INSERT INTO `data` (`id_data`, `id_city`, `data`) VALUES
(1, 1, 2.5),
(2, 2, 4.5),
(3, 3, 4.1),
(4, 4, 3.2),
(5, 1, 2),
(6, 2, 1.9),
(7, 3, 3.3),
(8, 4, 2.6),
(9, 1, 5),
(10, 2, 6),
(11, 3, 6),
(12, 4, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_drill_down`
--

CREATE TABLE `data_drill_down` (
  `id_drill_down` int(11) NOT NULL,
  `id_city` int(11) NOT NULL,
  `nama_versi` varchar(20) NOT NULL,
  `data` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_drill_down`
--

INSERT INTO `data_drill_down` (`id_drill_down`, `id_city`, `nama_versi`, `data`) VALUES
(1, 1, 'berlin1', 14),
(2, 1, 'berlin2', 16),
(3, 1, 'berlin3', 6),
(4, 1, 'berlin4', 14),
(5, 2, 'london1', 35),
(6, 2, 'london2', 15),
(7, 2, 'london3', 45),
(8, 2, 'london4', 5),
(9, 3, 'sydney1', 20),
(10, 3, 'sydney2', 15),
(11, 4, 'manchester1', 16),
(12, 4, 'manchester2', 12),
(13, 4, 'manchester3', 24),
(14, 1, 'berlin5', 12),
(15, 1, 'berlin6', 18),
(16, 1, 'berlin7', 11),
(17, 1, 'berlin8', 9),
(18, 3, 'sydney3', 25),
(19, 3, 'sydney4', 15),
(20, 3, 'sydney5', 25),
(21, 4, 'manchester4', 18),
(22, 4, 'manchester5', 20),
(23, 4, 'manchester6', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id` int(2) NOT NULL,
  `nama_kota` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id`, `nama_kota`) VALUES
(1, 'solo'),
(2, 'jogja'),
(3, 'klaten'),
(4, 'kudus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pie`
--

CREATE TABLE `pie` (
  `id_pie` int(11) NOT NULL,
  `id_city` int(11) NOT NULL,
  `data` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pie`
--

INSERT INTO `pie` (`id_pie`, `id_city`, `data`) VALUES
(1, 1, 30),
(2, 2, 20),
(3, 3, 40),
(4, 4, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id_city`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id_data`);

--
-- Indexes for table `data_drill_down`
--
ALTER TABLE `data_drill_down`
  ADD PRIMARY KEY (`id_drill_down`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pie`
--
ALTER TABLE `pie`
  ADD PRIMARY KEY (`id_pie`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id_city` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `data_drill_down`
--
ALTER TABLE `data_drill_down`
  MODIFY `id_drill_down` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pie`
--
ALTER TABLE `pie`
  MODIFY `id_pie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
