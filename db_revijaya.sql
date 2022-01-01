-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 06 Okt 2021 pada 02.53
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_revijaya`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumentasi`
--

CREATE TABLE `dokumentasi` (
  `id` int(11) NOT NULL,
  `id_maintenance` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokumentasi`
--

INSERT INTO `dokumentasi` (`id`, `id_maintenance`, `foto`, `keterangan`) VALUES
(5, 1, '05102021204519_jpg', 'Pemasangan Kabel'),
(6, 1, '05102021204539_png', 'perbaikan Router'),
(7, 1, '05102021205247_jpg', 'Perbaikan Selesai'),
(8, 2, '06102021015129_jpg', 'Pemasangan Kabel'),
(9, 2, '06102021015205_jpg', 'Hasil Pemasangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `maintenance`
--

CREATE TABLE `maintenance` (
  `id` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `jenis_pekerjaan` varchar(15) NOT NULL,
  `lap_survey` varchar(255) NOT NULL,
  `surat_kerja` varchar(255) NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `keluhan` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `id_teknisi1` int(11) NOT NULL,
  `id_teknisi2` int(11) NOT NULL,
  `id_teknisi3` int(11) NOT NULL,
  `id_teknisi4` int(11) NOT NULL,
  `id_teknisi5` int(11) NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `status` varchar(15) NOT NULL,
  `alat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `maintenance`
--

INSERT INTO `maintenance` (`id`, `id_pelanggan`, `jenis_pekerjaan`, `lap_survey`, `surat_kerja`, `tgl_masuk`, `tgl_mulai`, `tgl_selesai`, `keluhan`, `keterangan`, `id_teknisi1`, `id_teknisi2`, `id_teknisi3`, `id_teknisi4`, `id_teknisi5`, `instansi`, `status`, `alat`) VALUES
(1, 15, 'Perbaikan', 'Tue-Oct-2021 22:05:17_lap_survey_PT.pdf', 'Tue-Oct-2021 22:24:19_surat_kerja_PT.pdf', '2021-10-04 03:54:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Jaringan Lemot', 'Jl.Sungai Manggis', 10, 11, 0, 0, 0, 'PT. Push Turent', 'Proses', 'Tangga, Kabel'),
(2, 14, 'Pemasangan Baru', 'Wed-Oct-2021 01:49:12_lap_survey_Gramediapdf', 'Wed-Oct-2021 01:49:47_surat_kerja_Gramediapdf', '2021-10-05 22:41:38', '2021-10-06 01:51:01', '2021-10-06 01:52:35', ' Instalasi Jaringan WLAN', 'Jl. Sungai Dareh, Kab.Dharmasraya', 11, 13, 16, 12, 10, 'Gramedia', 'Selesai', 'Kabel RJ 45, Tangga, Tang Crimping'),
(3, 17, 'Perbaikan', '', '', '2021-10-06 07:53:19', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Perbaikan Jaringan Yang Lambat', 'Jl.Adi Sucipto, No.36', 12, 13, 0, 0, 0, 'PT. Maju Jaya', 'Baru', 'Kabel, Tang Crimping');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `foto`, `email`, `password`, `no_telp`, `alamat`, `jk`, `level`) VALUES
(8, 'Hajir Mujib', '03102021114129_Hajir.jpg', 'hajirmujib@gmail.com', '202cb962ac59075b964b07152d234b70', '082377425464', 'Dharmasraya', 'Laki-Laki', 'Admin'),
(9, 'Supriadi', '03102021140432_Supriadi.jpg', 'supriadi@gmail.com', 'caf1a3dfb505ffed0d024130f58c5cfa', '082377425464', 'Jambi', 'Laki-Laki', 'Admin'),
(10, 'Nanda Gusti', '03102021140653_Nanda.svg', 'nandagusti@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '-', 'Jambi', 'Laki-Laki', 'Teknisi'),
(11, 'Meldi', '03102021140822_Meldi.svg', 'meldi@gmail.com', '202cb962ac59075b964b07152d234b70', '-', 'Jambi', 'Laki-Laki', 'Teknisi'),
(12, 'Ian Saputra', '03102021140849_Ian.svg', 'ian@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '-', 'Jambi', 'Laki-Laki', 'Teknisi'),
(13, 'Rudi Setiawan', '03102021140913_Rudi.svg', 'rudi@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '-', 'Jambi', 'Laki-Laki', 'Teknisi'),
(14, 'Robby', '', '', '', '085467362', 'Sungai Puar', 'Perempuan', 'Customer'),
(15, 'Wahyuni', '', '', '', '087637384', 'Kota Baru', 'Perempuan', 'Customer'),
(16, 'Ilham Satria', '05102021195928_Ilham.png', 'ilham@gmail.com', 'c8837b23ff8aaa8a2dde915473ce0991', '0987628361', 'Jambi', 'Laki-Laki', 'Teknisi'),
(17, 'bayu suprianto', '', '', '', '082377425464', 'Jambi Sebrang', 'Laki-Laki', 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dokumentasi`
--
ALTER TABLE `dokumentasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dokumentasi`
--
ALTER TABLE `dokumentasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
