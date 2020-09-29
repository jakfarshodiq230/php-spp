-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07 Feb 2020 pada 03.40
-- Versi Server: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pembayaran_spp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_fakultas`
--

CREATE TABLE `tb_fakultas` (
  `kode_fakultas` varchar(50) NOT NULL,
  `nama_fakultas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_fakultas`
--

INSERT INTO `tb_fakultas` (`kode_fakultas`, `nama_fakultas`) VALUES
('F0001', 'TEKNIK'),
('F0002', 'SOSIAL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_identitas`
--

CREATE TABLE `tb_identitas` (
  `kode_universitas` varchar(50) NOT NULL,
  `nama_universitas` varchar(250) NOT NULL,
  `sk_universitas` varchar(250) NOT NULL,
  `alamat_universitas` varchar(250) NOT NULL,
  `alamat_universitas_2` varchar(250) NOT NULL,
  `no_hp` int(13) NOT NULL,
  `pimpinan_universitas` varchar(50) NOT NULL,
  `bendahara_universitas` varchar(50) NOT NULL,
  `kordinator_universitas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_identitas`
--

INSERT INTO `tb_identitas` (`kode_universitas`, `nama_universitas`, `sk_universitas`, `alamat_universitas`, `alamat_universitas_2`, `no_hp`, `pimpinan_universitas`, `bendahara_universitas`, `kordinator_universitas`) VALUES
('0008', 'sekolah tinggi ilmu tarbiyah (STIT) al-kifayah riau', 'izin sk dirjen pendis no. 1926 tahun 2017', 'jalan uka perumahan mutiara garuda sakti blok h.15 kelurahan air putih kec. tampan kota pekanbaru , provinsi riau - indonesia', 'jalan kartini, kelurahan simpang empat, kecamatan pekanbaru kota, kota pekanbaru, provinsi riau - indonesia', 987654321, 'AHMAD IBNU HAJAR., S.T., M.T.,Eng', 'MURTADHO., S.Pdi', 'JAKFAR SHODIQ., S.T');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_spp`
--

CREATE TABLE `tb_jenis_spp` (
  `kode_jenis_spp` varchar(50) NOT NULL,
  `keterangan_spp` varchar(50) NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jenis_spp`
--

INSERT INTO `tb_jenis_spp` (`kode_jenis_spp`, `keterangan_spp`, `harga`) VALUES
('S0001', 'SPP Dasar', 2000000),
('S0002', 'UJIAN ', 2000000),
('S0003', 'Pembangunan', 1500000),
('S0004', 'SEMINAR', 1500000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `kode_jurusan` varchar(50) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL,
  `kode_fakultas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`kode_jurusan`, `nama_jurusan`, `kode_fakultas`) VALUES
('J0001', 'Teknik Informatika', 'F0001'),
('J0002', 'PISIPOL', 'F0002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `nim` varchar(50) NOT NULL,
  `nirm` varchar(50) NOT NULL,
  `nama_mahasiswa` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `kode_jurusan` varchar(50) NOT NULL,
  `kode_fakultas` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tahun_angkatan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`nim`, `nirm`, `nama_mahasiswa`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `kode_jurusan`, `kode_fakultas`, `alamat`, `email`, `no_hp`, `password`, `tahun_angkatan`) VALUES
('1234567890', '33333333', 'yani', 'Mengkirau', '2020-02-03', 'Perempuan', 'J0002', 'F0002', 'aaaaaaaaas', 'jakfarshodiq@student.uir.ac.id', '0987654321', 'd50172dd13307346dd1e213d4ad5c31b', '2020'),
('1234567890988', '33333333', 'yani', 'Mengkirau', '2020-02-07', 'Laki-Laki', 'J0002', 'F0002', 'lllllllll', 'jakfarshodiq230@mail.com', '0987654321', '3908fbf923e9b863ba39328eda9199b8', '2020'),
('153510357', '33333333', 'jakfar shodiq', 'Mengkirau', '2020-02-08', 'Laki-Laki', 'J0001', 'F0001', 'lllllllllll', 'jakfarshodiq@student.uir.ac.id', '0987654321', '21232f297a57a5a743894a0e4a801fc3', '2020'),
('81245677', '33333333', 'jakfar89', 'Mengkirau', '2020-02-05', 'Laki-Laki', 'J0002', 'F0002', 'zzzzzzz', 'jakfarshodiq@student.uir.ac.id', '0987654321', 'fbe64d2489bc8f9eeb158f47cb7f43e8', '2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `kode_pembayaran` varchar(50) NOT NULL,
  `kode_tagihan` varchar(50) NOT NULL,
  `jumlah_bayar` double NOT NULL,
  `keterangan_pembayaran` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`kode_pembayaran`, `kode_tagihan`, `jumlah_bayar`, `keterangan_pembayaran`, `tanggal`) VALUES
('P0001', '74', 1000000, 'BELUM LUNAS', '2020-02-06 07:29:32'),
('P0002', '74', 500000, 'BELUM LUNAS', '2020-02-06 07:29:51'),
('P0003', '77', 500000, 'BELUM LUNAS', '2020-02-06 07:38:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_spp`
--

CREATE TABLE `tb_spp` (
  `kode_spp` varchar(50) NOT NULL,
  `kode_jenis_spp` varchar(50) NOT NULL,
  `kode_tahun_ajaran` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_spp`
--

INSERT INTO `tb_spp` (`kode_spp`, `kode_jenis_spp`, `kode_tahun_ajaran`, `status`, `tanggal`) VALUES
('T0001', 'S0003', 'T0002', 'aktif', '2020-02-06 07:29:01'),
('T0002', 'S0004', 'T0002', 'aktif', '2020-02-06 07:37:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tagihan_spp`
--

CREATE TABLE `tb_tagihan_spp` (
  `kode_tagihan` int(50) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `kode_spp` varchar(50) NOT NULL,
  `total` double NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL,
  `tanggal_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tagihan_spp`
--

INSERT INTO `tb_tagihan_spp` (`kode_tagihan`, `nim`, `kode_spp`, `total`, `keterangan`, `status`, `tanggal`, `tanggal_update`) VALUES
(73, '1234567890', 'T0001', 0, '', 'aktif', '2020-02-06 07:29:01', '0000-00-00 00:00:00'),
(74, '153510357', 'T0001', 1500000, 'LUNAS', 'aktif', '2020-02-06 07:29:01', '2020-02-06 07:29:51'),
(75, '81245677', 'T0001', 0, '', 'aktif', '2020-02-06 07:29:01', '0000-00-00 00:00:00'),
(76, '1234567890', 'T0002', 0, '', 'aktif', '2020-02-06 07:37:59', '0000-00-00 00:00:00'),
(77, '153510357', 'T0002', 500000, 'BELUM LUNAS', 'aktif', '2020-02-06 07:37:59', '2020-02-06 07:38:28'),
(78, '81245677', 'T0002', 0, '', 'aktif', '2020-02-06 07:37:59', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tahun_ajaran`
--

CREATE TABLE `tb_tahun_ajaran` (
  `kode_tahun_ajaran` varchar(50) NOT NULL,
  `tahun_ajaran` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tahun_ajaran`
--

INSERT INTO `tb_tahun_ajaran` (`kode_tahun_ajaran`, `tahun_ajaran`, `semester`) VALUES
('T0002', '2018', 'ganjil'),
('T0003', '2018', 'genap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `kode_user` int(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  `tanggal_insert` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`kode_user`, `nama_user`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `no_hp`, `email`, `username`, `password`, `level`, `tanggal_insert`) VALUES
(1, 'jakfar shodiq', 'mengkirau', '2020-02-01', 'Laki-Laki', '0987654321', 'jakfarshodiq230@mail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '0000-00-00 00:00:00'),
(2, 'Bendahara', 'mengkirau', '2020-02-01', 'Laki-Laki', '0987654321', 'jakfarshodiq230@mail.com', 'bendahara', 'c9ccd7f3c1145515a9d3f7415d5bcbea', 'bendahara', '2020-02-01 10:26:25'),
(7, 'jakfar shodiq', 'Mengkirau', '2020-02-02', 'Perempuan', '0987654321', 'jakfarshodiq@student.uir.ac.id', 'oprator', 'd41d8cd98f00b204e9800998ecf8427e', 'pimpinan', '0000-00-00 00:00:00'),
(8, 'jakfar shodiq', 'Mengkirau', '2020-02-07', 'Laki-Laki', '0987654321', 'jakfarshodiq@student.uir.ac.id', 'mkui', 'e807f1fcf82d132f9bb018ca6738a19f', 'bendahara', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_fakultas`
--
ALTER TABLE `tb_fakultas`
  ADD PRIMARY KEY (`kode_fakultas`);

--
-- Indexes for table `tb_identitas`
--
ALTER TABLE `tb_identitas`
  ADD PRIMARY KEY (`kode_universitas`);

--
-- Indexes for table `tb_jenis_spp`
--
ALTER TABLE `tb_jenis_spp`
  ADD PRIMARY KEY (`kode_jenis_spp`);

--
-- Indexes for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`kode_jurusan`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`kode_pembayaran`);

--
-- Indexes for table `tb_spp`
--
ALTER TABLE `tb_spp`
  ADD PRIMARY KEY (`kode_spp`);

--
-- Indexes for table `tb_tagihan_spp`
--
ALTER TABLE `tb_tagihan_spp`
  ADD PRIMARY KEY (`kode_tagihan`);

--
-- Indexes for table `tb_tahun_ajaran`
--
ALTER TABLE `tb_tahun_ajaran`
  ADD PRIMARY KEY (`kode_tahun_ajaran`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`kode_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_tagihan_spp`
--
ALTER TABLE `tb_tagihan_spp`
  MODIFY `kode_tagihan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `kode_user` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
