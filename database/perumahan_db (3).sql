-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13 Okt 2018 pada 17.13
-- Versi Server: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perumahan_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `no_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(75) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password_pegawai` varchar(75) NOT NULL,
  `status` enum('Administrasi','Marketing') NOT NULL,
  `alamat_karyawan` varchar(75) NOT NULL,
  `no_telephone` varchar(13) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`no_pegawai`, `nama_pegawai`, `email`, `password_pegawai`, `status`, `alamat_karyawan`, `no_telephone`, `jenis_kelamin`, `photo`) VALUES
(3, 'chaerur rozikin', '1@gmail.com', '$2y$10$M5Cx.aDW7j5/Kwl4VJhLBeTZoOWLk3i4bZj8pU0234KhaWkDfjujy', 'Administrasi', 'Jl.Raya karawang raya', '0812413141', 'Laki-laki', 'http://192.168.43.207/perumahanServer/profile_image/3.jpeg'),
(4, 'Galang Pratama s', 'b@gmail.com', '$2y$10$S3FMwHotHaJkz6MfiwbUZOsj/hSQFv6VcbdZ1XccIuYbQorQGlUwO', 'Marketing', 'Jl. serangkai no.5', '0852134692', 'Laki-laki', 'http://192.168.43.207/perumahanServer/profile_image/4.jpeg'),
(5, 'Yusuf Eka', 'yusuf@gmail.com', '$2y$10$tA6BGCvc46WnllK0zl9XOednPXKQofcOz1oewWBvlsBtM6SvA8XHW', 'Administrasi', 'Jl.raya cengkaringan', '082131231', 'laki-laki', ''),
(6, 'Yusuf Eka', 'yusuf@gmail.com', '$2y$10$X3lDm6EE32TWoN/gI/YMeeg/gwE4IC6.772z6rCdHeDi897Sznv9e', '', 'Jl.raya cengkaringan', '082131231', 'laki-laki', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `no_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(75) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat_pelanggan` varchar(75) NOT NULL,
  `no_telephone` varchar(13) NOT NULL,
  `email` varchar(40) NOT NULL,
  `status_perkawinan` varchar(15) NOT NULL,
  `pekerjaan` varchar(40) NOT NULL,
  `pemesanan_rumah` varchar(10) NOT NULL,
  `progres_pembelian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`no_pelanggan`, `nama_pelanggan`, `jenis_kelamin`, `alamat_pelanggan`, `no_telephone`, `email`, `status_perkawinan`, `pekerjaan`, `pemesanan_rumah`, `progres_pembelian`) VALUES
(1, 'Chaerur rozikin', 'Laki-laki', 'Jl. lamaran karawang', '08212224443', 'cr@gmail.com', 'menikah', 'dosen', 'Blok A1No1', 'lunas langsung ambil kunci'),
(2, 'Erwin Daria', 'Laki-laki', 'jl. pakuan no 8\nkecamatan purwasaka', '0811234567', 'erwin@gmail.com', 'belum menikah', 'musisi', '', ''),
(3, 'Lazuardi iman', 'Laki-laki', 'Perum griya asih blok.5 no 8', '0852884413', 'lzriman@gmail.com', 'menikah', 'Karyawan swasta', 'Kosong', ''),
(4, 'Via valen', 'Perempuan', 'Jl. bandung raya no 7 \nkec. bandung asih', '0892316475', 'valenvia@mail.com', 'belum menikah', 'penyanyi', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembayaran_bookingfee`
--

CREATE TABLE `tbl_pembayaran_bookingfee` (
  `no_booking_fee` int(11) NOT NULL,
  `tanggal` varchar(13) NOT NULL,
  `nama_penyetor` varchar(60) NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  `penerima` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembayaran_downpayment`
--

CREATE TABLE `tbl_pembayaran_downpayment` (
  `no_downpayment` int(11) NOT NULL,
  `no_pelanggan` int(11) NOT NULL,
  `tanggal` varchar(13) NOT NULL,
  `nama_penyetor` varchar(60) NOT NULL,
  `jumlah` varchar(15) NOT NULL,
  `penerima` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pembayaran_downpayment`
--

INSERT INTO `tbl_pembayaran_downpayment` (`no_downpayment`, `no_pelanggan`, `tanggal`, `nama_penyetor`, `jumlah`, `penerima`) VALUES
(1, 2, '29/9/2018', 'Erwin Daria', '215000000', ''),
(2, 2, '29/9/2018', 'Erwin Daria', '215000000', ''),
(3, 1, '19/12/2018', 'Chaerur rozikin', '30000000', ''),
(4, 1, '19/12/2018', 'Chaerur rozikin', '30000000', '4'),
(5, 2, '29/9/2018', 'Erwin Daria', '215000000', '4'),
(6, 7, '1/10/2018', 'Argus hidayat', '226000000', '4'),
(7, 7, '1/10/2018', 'Argus hidayat', '226000000', '4'),
(8, 7, '1/10/2018', 'Argus hidayat', '226000000', '4'),
(9, 3, '3/9/2018', 'Lazuardi iman', '215000000', '4'),
(10, 3, '3/9/2018', 'Lazuardi iman', '215000000', '4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rumah`
--

CREATE TABLE `tbl_rumah` (
  `no_rumah` int(11) NOT NULL,
  `blok_lokasi` varchar(20) NOT NULL,
  `tipe_rumah` int(10) NOT NULL,
  `harga_rumah` varchar(20) NOT NULL,
  `status_rumah` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_rumah`
--

INSERT INTO `tbl_rumah` (`no_rumah`, `blok_lokasi`, `tipe_rumah`, `harga_rumah`, `status_rumah`) VALUES
(1, 'A1No1', 36, '278000000', 'Terjual'),
(2, 'A1No2', 34, '215000000', 'Terjual'),
(3, 'B1No1', 32, '345000000', 'Tersedia'),
(4, 'B1No2', 32, '226000000', 'Terjual');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi_rumah`
--

CREATE TABLE `tbl_transaksi_rumah` (
  `no_transaksi` int(11) NOT NULL,
  `no_marketing` int(11) NOT NULL,
  `no_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(75) NOT NULL,
  `cash` varchar(13) NOT NULL,
  `tanggal` varchar(15) NOT NULL,
  `no_rumah` int(11) NOT NULL,
  `scanKTP` text NOT NULL,
  `scanKK` text NOT NULL,
  `scanNPWP` text NOT NULL,
  `scanDOMISILI` text NOT NULL,
  `scanREKOR` text NOT NULL,
  `scanSlipGaji` text NOT NULL,
  `scanSKKerja` text NOT NULL,
  `scanSPT` text NOT NULL,
  `scanPasFoto` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_transaksi_rumah`
--

INSERT INTO `tbl_transaksi_rumah` (`no_transaksi`, `no_marketing`, `no_pelanggan`, `nama_pelanggan`, `cash`, `tanggal`, `no_rumah`, `scanKTP`, `scanKK`, `scanNPWP`, `scanDOMISILI`, `scanREKOR`, `scanSlipGaji`, `scanSKKerja`, `scanSPT`, `scanPasFoto`, `status`) VALUES
(1, 4, 2, 'Erwin Daria', '215000000', '29/9/2018', 2, 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/2/KTP_2.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/2/KK_2.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/2/NPWP_2.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/2/SK_DOMISILI_2.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/2/REKKOR_2.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/2/SLIP_GAJI_2.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/2/SK_KERJA_2.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/2/SPT_2.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/2/PAS_FOTO_2.jpeg', 'kredit'),
(2, 4, 1, 'Chaerur rozikin', '278000000', '30/9/2018', 1, 'http://192.168.43.207/perumahanServer/pembelian_rumah/cash/1/KTP_1.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/cash/1/KK_1.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/cash/1/NPWP_1.jpeg', '', '', '', '', '', '', 'cash'),
(3, 4, 7, 'Argus hidayat', '226000000', '1/10/2018', 4, 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/7/KTP_7.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/7/KK_7.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/7/NPWP_7.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/7/SK_DOMISILI_7.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/7/REKKOR_7.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/7/SLIP_GAJI_7.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/7/SK_KERJA_7.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/7/SPT_7.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/7/PAS_FOTO_7.jpeg', 'kredit'),
(4, 4, 7, 'Argus hidayat', '226000000', '1/10/2018', 4, 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/7/KTP_7.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/7/KK_7.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/7/NPWP_7.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/7/SK_DOMISILI_7.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/7/REKKOR_7.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/7/SLIP_GAJI_7.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/7/SK_KERJA_7.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/7/SPT_7.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/7/PAS_FOTO_7.jpeg', 'kredit'),
(5, 4, 7, 'Argus hidayat', '226000000', '1/10/2018', 4, 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/7/KTP_7.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/7/KK_7.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/7/NPWP_7.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/7/SK_DOMISILI_7.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/7/REKKOR_7.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/7/SLIP_GAJI_7.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/7/SK_KERJA_7.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/7/SPT_7.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/7/PAS_FOTO_7.jpeg', 'kredit'),
(6, 4, 3, 'Lazuardi iman', '215000000', '3/9/2018', 2, 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/3/KTP_3.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/3/KK_3.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/3/NPWP_3.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/3/SK_DOMISILI_3.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/3/REKKOR_3.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/3/SLIP_GAJI_3.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/3/SK_KERJA_3.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/3/SPT_3.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/3/PAS_FOTO_3.jpeg', 'kredit'),
(7, 4, 3, 'Lazuardi iman', '215000000', '3/9/2018', 2, 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/3/KTP_3.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/3/KK_3.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/3/NPWP_3.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/3/SK_DOMISILI_3.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/3/REKKOR_3.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/3/SLIP_GAJI_3.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/3/SK_KERJA_3.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/3/SPT_3.jpeg', 'http://192.168.43.207/perumahanServer/pembelian_rumah/kredit/3/PAS_FOTO_3.jpeg', 'kredit');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`no_pegawai`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`no_pelanggan`);

--
-- Indexes for table `tbl_pembayaran_bookingfee`
--
ALTER TABLE `tbl_pembayaran_bookingfee`
  ADD PRIMARY KEY (`no_booking_fee`);

--
-- Indexes for table `tbl_pembayaran_downpayment`
--
ALTER TABLE `tbl_pembayaran_downpayment`
  ADD PRIMARY KEY (`no_downpayment`);

--
-- Indexes for table `tbl_rumah`
--
ALTER TABLE `tbl_rumah`
  ADD PRIMARY KEY (`no_rumah`);

--
-- Indexes for table `tbl_transaksi_rumah`
--
ALTER TABLE `tbl_transaksi_rumah`
  ADD PRIMARY KEY (`no_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  MODIFY `no_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `no_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_pembayaran_downpayment`
--
ALTER TABLE `tbl_pembayaran_downpayment`
  MODIFY `no_downpayment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_rumah`
--
ALTER TABLE `tbl_rumah`
  MODIFY `no_rumah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_transaksi_rumah`
--
ALTER TABLE `tbl_transaksi_rumah`
  MODIFY `no_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
