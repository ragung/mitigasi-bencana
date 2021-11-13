-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jul 2021 pada 11.54
-- Versi server: 10.1.40-MariaDB
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mitban`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `reg_date`, `updation_date`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '2021-04-04 20:31:45', '2021-07-02'),
(2, 'agung', 'agung', 'agung', '0000-00-00 00:00:00', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `adminlog`
--

CREATE TABLE `adminlog` (
  `id` int(11) NOT NULL,
  `adminid` int(11) NOT NULL,
  `ip` varbinary(16) NOT NULL,
  `logintime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dinas`
--

CREATE TABLE `dinas` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dinas`
--

INSERT INTO `dinas` (`id`, `username`, `email`, `password`, `reg_date`, `updation_date`) VALUES
(1, 'dinas', 'dinas@gmail.com', 'dinas', '2021-07-02 04:48:52', '2021-07-02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lapor`
--

CREATE TABLE `lapor` (
  `id_lapor` int(10) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `foto` varchar(255) NOT NULL,
  `bencana` text NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `waktu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lapor`
--

INSERT INTO `lapor` (`id_lapor`, `user_id`, `foto`, `bencana`, `alamat`, `status`, `waktu`) VALUES
(9, 2, '879626ca7ee-5284-4b4c-bab4-5660e684a938_169.jpeg', 'alam', 'jalan jalan', 'DONE', '2021-06-28'),
(10, 1, '400sm_5a1ad63f21109.png', 'alam', 'jalan jalan', 'ON PROGRESS', '2021-07-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sms_phonebook`
--

CREATE TABLE `sms_phonebook` (
  `noTelp` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `idgroup` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sms_phonebook`
--

INSERT INTO `sms_phonebook` (`noTelp`, `nama`, `idgroup`) VALUES
('085842316951', 'agung', '|1|'),
('083147142783', 'Ghani', 'tes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_komentar`
--

CREATE TABLE `tbl_komentar` (
  `komentar_id` int(11) NOT NULL,
  `id_lapor` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `komentar` varchar(200) CHARACTER SET utf8 NOT NULL,
  `nama_pengirim` varchar(40) CHARACTER SET utf8 NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_komentar`
--

INSERT INTO `tbl_komentar` (`komentar_id`, `id_lapor`, `id`, `komentar`, `nama_pengirim`, `date`) VALUES
(1, 9, 0, 'segera ditangani', 'risky', '2021-06-21 05:44:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userIp` varbinary(16) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `userlog`
--

INSERT INTO `userlog` (`id`, `userId`, `userEmail`, `userIp`, `loginTime`) VALUES
(7, 21, 'risky.agungm53@gmail.com', 0x3a3a31, '2021-06-03 07:46:04'),
(8, 21, 'risky.agungm53@gmail.com', 0x3a3a31, '2021-06-03 09:49:16'),
(9, 21, 'risky.agungm53@gmail.com', 0x3a3a31, '2021-06-03 10:03:24'),
(10, 21, 'risky.agungm53@gmail.com', 0x3a3a31, '2021-06-21 20:43:10'),
(11, 21, 'risky.agungm53@gmail.com', 0x3a3a31, '2021-06-23 12:47:17'),
(12, 21, 'risky.agungm53@gmail.com', 0x3a3a31, '2021-06-23 18:56:46'),
(13, 21, 'risky.agungm53@gmail.com', 0x3a3a31, '2021-06-25 19:04:02'),
(14, 21, 'risky.agungm53@gmail.com', 0x3a3a31, '2021-06-26 13:28:15'),
(15, 21, 'risky.agungm53@gmail.com', 0x3a3a31, '2021-06-26 13:46:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `userregistration`
--

CREATE TABLE `userregistration` (
  `id` int(11) NOT NULL,
  `regNo` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contactNo` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(45) NOT NULL,
  `passUdateDate` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `userregistration`
--

INSERT INTO `userregistration` (`id`, `regNo`, `firstName`, `middleName`, `lastName`, `gender`, `contactNo`, `email`, `password`, `regDate`, `updationDate`, `passUdateDate`) VALUES
(1, '1090', 'risky', 'agung', 'mud', 'male', 1312312, 'risky.agungm53@gmail.com', 'sakkarepmu', '2021-06-03 07:44:46', '', ''),
(2, '123456789', 'Tes', 'e', 's', 'male', 1234567890, 'mail@demo.com', '1234567890', '2021-06-12 06:36:30', '', ''),
(3, '1000', 'Wah', 'Ki', 'di', 'others', 123456789, 'wakidi@gmail.com', 'wakidi', '2021-06-27 18:15:20', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dinas`
--
ALTER TABLE `dinas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lapor`
--
ALTER TABLE `lapor`
  ADD PRIMARY KEY (`id_lapor`);

--
-- Indeks untuk tabel `sms_phonebook`
--
ALTER TABLE `sms_phonebook`
  ADD PRIMARY KEY (`noTelp`);

--
-- Indeks untuk tabel `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  ADD PRIMARY KEY (`komentar_id`) USING BTREE;

--
-- Indeks untuk tabel `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `userregistration`
--
ALTER TABLE `userregistration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `dinas`
--
ALTER TABLE `dinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `lapor`
--
ALTER TABLE `lapor`
  MODIFY `id_lapor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  MODIFY `komentar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `userregistration`
--
ALTER TABLE `userregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
