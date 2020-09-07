-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Sep 2020 pada 20.41
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sk_covid`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` char(6) NOT NULL,
  `nama` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `nama`) VALUES
('140901', 'Kuantan Mudik'),
('140902', 'Kuantan Tengah'),
('140903', 'Singingi'),
('140904', 'Kuantan Hilir'),
('140905', 'Cerenti'),
('140906', 'Benai'),
('140907', 'Gunungtoar'),
('140908', 'Singingi Hilir'),
('140909', 'Pangean'),
('140910', 'Logas Tanah Darat'),
('140911', 'Inuman'),
('140912', 'Hulu Kuantan'),
('140913', 'Kuantan Hilir Seberang'),
('140914', 'Sentajo Raya'),
('140915', 'Pucuk Rantau');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pp`
--

CREATE TABLE `pp` (
  `nik` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(1000) NOT NULL,
  `umur` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `kabupaten` varchar(500) NOT NULL,
  `kecamatan` int(11) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `riwayat_perjalanan` varchar(100) NOT NULL,
  `kondisi_saat_ini` varchar(100) NOT NULL,
  `isolasi_dirumah` date NOT NULL,
  `selesai_isolasi` date NOT NULL,
  `ket` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pp`
--

INSERT INTO `pp` (`nik`, `tgl_masuk`, `nama`, `alamat`, `umur`, `jenis_kelamin`, `kabupaten`, `kecamatan`, `no_hp`, `riwayat_perjalanan`, `kondisi_saat_ini`, `isolasi_dirumah`, `selesai_isolasi`, `ket`) VALUES
(983457834, '2020-09-02', 'kabdsfks', 'sdnf', '54', 'Laki-Laki', 'sdknf', 140914, '98789', 'sdbf', 'sdkjf', '2020-09-25', '2020-09-25', 'sdkjfhkj'),
(2147483647, '2020-08-08', 'Panji anugrah', 'koto', '12', 'Laki-Laki', 'kuansing', 140904, '082288199999', 'jerman', 'baik', '2020-08-27', '2020-08-29', 'yuu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `puskesmas`
--

CREATE TABLE `puskesmas` (
  `kode_akses` int(11) NOT NULL,
  `kode_pukesmas` varchar(100) NOT NULL,
  `nama_puskesma` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `alamat` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sp`
--

CREATE TABLE `sp` (
  `id` int(11) NOT NULL,
  `tgl_masuk_rs` date NOT NULL,
  `nama_kasus` varchar(500) NOT NULL,
  `jenis_kelamin` varchar(500) NOT NULL,
  `umur` varchar(500) NOT NULL,
  `pekerjaan` varchar(500) NOT NULL,
  `nik` varchar(500) NOT NULL,
  `no_telpon` varchar(500) NOT NULL,
  `kabupaten` varchar(500) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `kecamatan` varchar(500) NOT NULL,
  `rs_rawatan` varchar(500) NOT NULL,
  `konfirmasi_simptomatik` varchar(500) NOT NULL,
  `konfirmasi_asimptomatik` varchar(500) NOT NULL,
  `komfirmasi_perjalanan` varchar(500) NOT NULL,
  `konfirmasi_konta_erak` varchar(500) NOT NULL,
  `komorbid` varchar(500) NOT NULL,
  `tgl_pengambilan_swap1` date DEFAULT NULL,
  `tgl_pengambilan_swap2` date DEFAULT NULL,
  `tgl_pengambilan_swap3` date DEFAULT NULL,
  `hasil_swap1` varchar(500) DEFAULT NULL,
  `hasil_swap2` varchar(500) DEFAULT NULL,
  `hasil_swap3` varchar(500) DEFAULT NULL,
  `keterangan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sp`
--

INSERT INTO `sp` (`id`, `tgl_masuk_rs`, `nama_kasus`, `jenis_kelamin`, `umur`, `pekerjaan`, `nik`, `no_telpon`, `kabupaten`, `alamat`, `kecamatan`, `rs_rawatan`, `konfirmasi_simptomatik`, `konfirmasi_asimptomatik`, `komfirmasi_perjalanan`, `konfirmasi_konta_erak`, `komorbid`, `tgl_pengambilan_swap1`, `tgl_pengambilan_swap2`, `tgl_pengambilan_swap3`, `hasil_swap1`, `hasil_swap2`, `hasil_swap3`, `keterangan`) VALUES
(1, '2020-09-09', 'ew', 'Laki-Laki', '12', 'sera', '12345678', '34545345', 'ssgsgs', 'koto kari', 'dgdgdg', 'dfgdfgd', 'dfgdfgdg', 'dfsfsfsdfbbb', 'ersdfsdf', 'sdfwe23', 'dsd', '2020-09-08', '2020-09-15', '2020-09-02', 'efgbdc', 'xcvcxx', 'hgfds', 'qwertg'),
(2, '2020-10-02', 'popopo', 'Perempuan', '23', 'guru', '4569776778', '09886', 'kuansing', 'koto benai', 'benai', 'rs tluk', 'ui', 'oi', 'huhu', 'koko', 'yui', '2020-09-26', '2020-09-28', '2020-09-27', 'oioioio', 'hiu', 'ytr', 'lkljhghggd'),
(3, '2020-09-10', 'ferdi ramahdan', 'Perempuan', '23', 'tani', '958693893', '878787878', 'kuansing', 'benai', 'benai', 'rs tluk', 'ytyt', 'hfhfhd', 'fgdfgdgfdf', 'dfgdfgd', 'dfgdfgd', '2020-09-24', '2020-09-14', '2020-09-22', 'dfgdfg', 'dfgdfgddfg', 'hukuykuy', 'utyjytjrs'),
(4, '2020-09-17', 'ego oktafanda', 'Laki-Laki', '23', 'tani', '90932323', '093563452', 'kuansing', 'pangean', 'pangean', 'rs tluk', 'ytyt', 'dfsfsfsdfbbb', 'dfgdfg', 'dfgdgd', 'dsd', '2020-09-08', '2020-09-08', '2020-09-08', 'ojgdghd', 'fgsgs', 'sdfa', 'ghdjrtj');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `role`) VALUES
(1, 'yogo', 'panji', 'qwer', 'Admin'),
(2, 'Panji anugrah', 'panji99999', '12345678', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pp`
--
ALTER TABLE `pp`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `puskesmas`
--
ALTER TABLE `puskesmas`
  ADD PRIMARY KEY (`kode_akses`);

--
-- Indeks untuk tabel `sp`
--
ALTER TABLE `sp`
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
-- AUTO_INCREMENT untuk tabel `puskesmas`
--
ALTER TABLE `puskesmas`
  MODIFY `kode_akses` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sp`
--
ALTER TABLE `sp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
