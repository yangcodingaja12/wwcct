-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jun 2023 pada 05.26
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wwcct`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `sementara`
--

CREATE TABLE `sementara` (
  `id` int(11) NOT NULL,
  `data_sensor` decimal(10,2) NOT NULL,
  `data_sensor2` decimal(10,2) NOT NULL,
  `waktu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sementara`
--

INSERT INTO `sementara` (`id`, `data_sensor`, `data_sensor2`, `waktu`) VALUES
(1, '2.00', '5.00', 1685780154),
(2, '3.00', '6.00', 1686819859),
(3, '3.00', '0.00', 1686990932),
(4, '3.00', '3.00', 1686990942),
(5, '2.00', '0.00', 1686990953),
(6, '2.00', '0.00', 1686990963),
(7, '2.00', '0.00', 1686990973),
(8, '2.00', '0.00', 1686990984),
(9, '2.00', '0.00', 1686990994),
(10, '2.00', '0.00', 1686991005),
(11, '2.00', '0.00', 1686991022),
(12, '2.00', '0.00', 1686991033),
(13, '5.00', '5.00', 1686991043),
(14, '3.00', '0.00', 1686991054),
(15, '3.00', '0.00', 1686991064),
(16, '3.00', '0.00', 1686991075),
(17, '0.00', '80.00', 1686991649),
(18, '80.00', '80.00', 1686991660),
(19, '80.00', '80.00', 1686991670),
(20, '81.00', '80.00', 1686991681),
(21, '55.00', '35.00', 1686991691),
(22, '79.00', '79.00', 1686991702),
(23, '78.00', '78.00', 1686991712),
(24, '56.00', '56.00', 1686991723),
(25, '55.00', '37.00', 1686991733),
(26, '66.00', '55.00', 1686991744),
(27, '49.00', '40.00', 1686991754),
(28, '55.00', '36.00', 1686991765),
(29, '75.00', '74.00', 1686991775),
(30, '81.00', '81.00', 1686991786),
(31, '58.00', '77.00', 1686991796),
(32, '78.00', '78.00', 1686991806),
(33, '62.00', '63.00', 1686991817),
(34, '28.00', '0.00', 1686992353),
(35, '5.00', '5.00', 1686992363),
(36, '10.00', '5.00', 1686992374),
(37, '3.00', '3.00', 1686992384),
(38, '3.00', '2.00', 1686992395),
(39, '3.00', '1.00', 1686992405),
(40, '3.00', '0.00', 1686992416),
(41, '3.00', '0.00', 1686992426),
(42, '3.00', '0.00', 1686992437),
(43, '3.00', '3.00', 1686992447),
(44, '2.00', '3.00', 1686992458),
(45, '60.00', '0.00', 1687226855),
(46, '5.00', '43.00', 1687226866),
(47, '5.00', '5.00', 1687226876),
(48, '3.00', '3.00', 1687226887),
(49, '6.00', '5.00', 1687226897),
(50, '3.00', '3.00', 1687226908),
(51, '2.00', '0.00', 1687226919),
(52, '2.00', '0.00', 1687226931),
(53, '3.00', '3.00', 1687226941),
(54, '2.00', '0.00', 1687226952),
(55, '3.00', '1.00', 1687226962),
(56, '3.00', '1.00', 1687226973),
(57, '5.00', '0.00', 1687226984),
(58, '45.00', '0.00', 1687226995),
(59, '26.00', '0.00', 1687227005),
(60, '4.00', '0.00', 1687227017),
(61, '5.00', '4.00', 1687227027),
(62, '5.00', '4.00', 1687227038),
(63, '30.00', '0.00', 1687227048),
(64, '23.00', '0.00', 1687227059),
(65, '4.00', '4.00', 1687227069);

-- --------------------------------------------------------

--
-- Struktur dari tabel `text`
--

CREATE TABLE `text` (
  `id` int(11) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `part` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `length` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `volume` int(11) NOT NULL,
  `weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `text`
--

INSERT INTO `text` (`id`, `supplier`, `part`, `quantity`, `length`, `width`, `height`, `volume`, `weight`) VALUES
(1, 'Budi Setiawan', '898898', 35, 34, 28, 30, 2500, 45),
(2, 'Budi Setiawan', '212122', 20, 42, 32, 11, 233, 24),
(3, 'PT.Ilham Jaya', 'P098AK46S', 3, 3, 6, 0, 18, 0),
(10, 'dasd', 'asdaw', 2, 4, 4, 0, 16, 0),
(11, 'dasdw', 'sdaw', 3, 3, 0, 0, 0, 0),
(12, 'dawers', 'are', 2, 3, 6, 0, 0, 0),
(13, 'dsdaffd', 'adwdsd', 3, 3, 6, 0, 18, 0),
(14, 'dasdawer', 'are', 2, 3, 6, 0, 18, 0),
(15, 'sdfghgfdsa', 'sdaw', 3, 3, 6, 0, 18, 0),
(16, 'iokoi', 'adklnlajdw', 2, 4, 4, 0, 16, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `unit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `unit`) VALUES
(1, 'citra', '123', 'Informatika'),
(2, 'nurlita', '1234', 'Informatika');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `sementara`
--
ALTER TABLE `sementara`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `text`
--
ALTER TABLE `text`
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
-- AUTO_INCREMENT untuk tabel `sementara`
--
ALTER TABLE `sementara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT untuk tabel `text`
--
ALTER TABLE `text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
