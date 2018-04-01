-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17 Nov 2016 pada 16.39
-- Versi Server: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adsdecals`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about`
--

CREATE TABLE `about` (
  `id_about` int(11) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `isi_about` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `about`
--

INSERT INTO `about` (`id_about`, `judul`, `isi_about`) VALUES
(1, 'Tentang ADS Decals', '<p>\r\nPerusahaan yang bergerak dalam bidang jasa pembuatan sticker, dalam hal ini adalah decal motor, garskin, dan skin laptop ini didirikan pada tahun 2014, dimana semua anggota atau karyawannya berasal dari satu alamamater sekolah menengah atas yang sama. Sejak SMA para anggota aktif pada komunitas motor. Para anggota komunitas akan menunjukan kretifitas untuk motor pribadi mereka, oleh karena itu para anggota ini mencoba mendesain motor mereka dengan decal buatan mereka sendiri. Karena minat teman-teman komunitas motor ini sangat tinggi, akhirnya dibentuklah usaha tersebut untuk menyalurkan bakat dan ide-ide creatif untuk mengekspresikan gaya anggota para komunitas tersebut.\r\n</p>\r\n<p>\r\nDengan dukungan dijaman yang luarbiasa ini dimana perkembangan teknologi sangat pesat dan kebutuhan akan hal hal yang creatif serta inovatif semakin tinggi, ADS Decals sangat optimis jika usaha ini sangat dibutuhkan untuk memuaskan kebutuhan gaya dan seni sekarang ini semakin hari semakin biasa biasa saja. Kerja keras serta komunikasi yang kuat adalah kunci ADS Decals sangat Solid dapat berjalan selama 3 tahun ini yang sekarang mencakup wilayang produksi pusat di Sukoharjo dan di Solo.\r\n</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id_category` int(10) NOT NULL,
  `nama_category` varchar(10) NOT NULL,
  `size` varchar(3) NOT NULL,
  `harga` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id_category`, `nama_category`, `size`, `harga`) VALUES
(1, 'decal', 'S', 250000),
(2, 'decal', 'M', 300000),
(3, 'decal', 'L', 350000),
(4, 'decal', 'XL', 400000),
(5, 'garskin', 'S', 15000),
(6, 'garskin', 'M', 20000),
(7, 'garskin', 'L', 30000),
(8, 'garskin', 'XL', 35000),
(9, 'skinlaptop', 'S', 40000),
(10, 'skinlaptop', 'M', 45000),
(11, 'skinlaptop', 'L', 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(10) NOT NULL,
  `no_hp` char(12) NOT NULL,
  `pinbbm` char(8) NOT NULL,
  `fb` varchar(20) NOT NULL,
  `twitter` varchar(20) NOT NULL,
  `gmail` varchar(30) NOT NULL,
  `pinterest` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `contact`
--

INSERT INTO `contact` (`id_contact`, `no_hp`, `pinbbm`, `fb`, `twitter`, `gmail`, `pinterest`) VALUES
(1, '087812764768', '5A552AA3', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hp`
--

CREATE TABLE `hp` (
  `id_hp` int(20) NOT NULL,
  `nama_hp` varchar(30) NOT NULL,
  `id_category` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hp`
--

INSERT INTO `hp` (`id_hp`, `nama_hp`, `id_category`) VALUES
(1, 'Xiaomi Mi4', 6),
(2, 'Meizu M2 Note', 6),
(3, 'Samsung J1', 5),
(4, 'Microsoft Lumnia 520', 5),
(5, 'Xiaomi Redmi 2', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi_bayar`
--

CREATE TABLE `konfirmasi_bayar` (
  `id_konfirmasi` int(11) NOT NULL,
  `id_pelanggan` int(20) NOT NULL,
  `Jumlah_bayar` int(11) NOT NULL,
  `status_pembayaran` enum('menunggu konfirmasi','diterima','ditolak') NOT NULL,
  `bank` varchar(20) NOT NULL,
  `nama_rekening` varchar(20) NOT NULL,
  `tanggal_konfirmasi` date NOT NULL,
  `bukti_pebayaran` varchar(200) NOT NULL,
  `info_admin` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfirmasi_bayar`
--

INSERT INTO `konfirmasi_bayar` (`id_konfirmasi`, `id_pelanggan`, `Jumlah_bayar`, `status_pembayaran`, `bank`, `nama_rekening`, `tanggal_konfirmasi`, `bukti_pebayaran`, `info_admin`) VALUES
(12, 3, 270000, 'diterima', 'bni', 'arjo', '2016-10-04', '2016-10-04-arjo-99136-transfer.jpg', ''),
(14, 3, 360000, 'menunggu konfirmasi', 'BRI', 'TIA PUTRI', '2016-11-16', '2016-11-16-TIA PUTRI-73268-1455593078844.jpg', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(10) NOT NULL,
  `nama_kota` varchar(20) NOT NULL,
  `ongkir` int(10) NOT NULL,
  `status_cod` enum('yes','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`, `ongkir`, `status_cod`) VALUES
(1, 'klaten', 0, 'yes'),
(2, 'Surakarta', 0, 'yes'),
(3, 'Semarang', 18000, 'no'),
(4, 'Yogyakarta', 17000, 'no');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laptop`
--

CREATE TABLE `laptop` (
  `id_laptop` int(20) NOT NULL,
  `nama_laptop` varchar(30) NOT NULL,
  `id_category` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laptop`
--

INSERT INTO `laptop` (`id_laptop`, `nama_laptop`, `id_category`) VALUES
(1, 'Laptop 10-12 inch', 9),
(2, 'Laptop 13 inch', 10),
(3, 'Laptop 15 inch', 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `motor`
--

CREATE TABLE `motor` (
  `id_motor` int(20) NOT NULL,
  `nama_motor` varchar(30) NOT NULL,
  `id_category` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `motor`
--

INSERT INTO `motor` (`id_motor`, `nama_motor`, `id_category`) VALUES
(1, 'Kawasaki old KLX', 2),
(2, 'Yamaha RX-King', 1),
(3, 'Yamaha MX-King', 3),
(4, 'Suzuki Satria F 2013', 2),
(8, 'Yamaha N-MAX', 4),
(10, 'Yamah old VEGA R', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `id_kota` int(5) DEFAULT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `foto` varchar(20) DEFAULT NULL,
  `gender` char(10) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `username`, `password`, `nama`, `id_kota`, `alamat`, `no_hp`, `foto`, `gender`, `email`) VALUES
(3, 'atmauki', '3f981ab8638753a4d1da011898534f96', 'Atmaja Basuki', 1, 'Karangwuni, Gondangsari, Klaten', '087812764768', 'member1.jpg', 'Laki-laki', 'atmauki@gmail.com'),
(4, 'bagus', '17b38fc02fd7e92f3edeb6318e3066d8', 'Bagus Fernando', NULL, 'Trucuk, Pacitan', '087812654723', 'member2.jpg', 'Laki-laki', 'fernandoernan@gmail.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(10) NOT NULL,
  `id_pelanggan` int(10) NOT NULL,
  `id_motor` int(20) DEFAULT NULL,
  `id_hp` int(20) DEFAULT NULL,
  `id_laptop` int(20) DEFAULT NULL,
  `tanggal_pemesanan` date DEFAULT NULL,
  `gambar_1` varchar(200) DEFAULT NULL,
  `gambar_2` varchar(200) DEFAULT NULL,
  `id_konfirmasi` int(11) DEFAULT NULL,
  `deskripsi_pemesanan` varchar(500) DEFAULT NULL,
  `status_pemesanan` enum('dalam proses','gambar dikonfirmasi','dicetak','selesai') DEFAULT NULL,
  `pesan_admin` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_pelanggan`, `id_motor`, `id_hp`, `id_laptop`, `tanggal_pemesanan`, `gambar_1`, `gambar_2`, `id_konfirmasi`, `deskripsi_pemesanan`, `status_pemesanan`, `pesan_admin`) VALUES
(5, 3, 0, 2, 0, '2016-10-12', '14juni2013_960_057.jpg', 'konfirmasi-27034-Albert1.jpg', 12, 'asdasd\r\nasdas\r\nasdasdasdasgergr', 'gambar dikonfirmasi', 'dicoba kirim pesan hp coba script                                                                   '),
(8, 3, 2, NULL, NULL, '2016-10-12', 'Atmaja Basuki-5562images.jpg', 'konfirmasi-44947-adityaT.jpg', 12, 'warna dan tema mirip dengan heli kopter tersebut', 'gambar dikonfirmasi', 'coba kirim pesan                                            '),
(10, 3, 1, 0, 0, '2016-10-31', '2016-10-31-Atmaja Basuki-12731-9iz7ABpzT.png', '', 14, 'asdasdasdasdasd a', '', ''),
(11, 3, 0, 0, 1, '2016-11-02', '2016-11-02-Atmaja Basuki-73700-il_570xN.747157845_nteu.jpg', '', 14, 'dsfdsfsdf a', '', ''),
(12, 3, 0, 2, 0, '2016-11-02', '2016-11-02-Atmaja Basuki-63739-mobil.jpg', '', 14, 'afadasdsad a																					', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id_product` int(10) NOT NULL,
  `judul_product` varchar(50) NOT NULL,
  `gambar_product` varchar(100) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `tanggal_upload` date NOT NULL,
  `id_category` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id_product`, `judul_product`, `gambar_product`, `deskripsi`, `tanggal_upload`, `id_category`) VALUES
(1, 'V-ixion monster tech', 'img-square1.jpg', 'yamaha v-ixion full body decals dengan tema monster tech', '2016-05-02', 2),
(2, 'Suzuki Satria lightning thunder', 'img-square3.jpg', 'Suzuki satria full body decals dengan tema lightning ', '2016-11-17', 2),
(3, 'Meizu M2 Note IronMan face', 'img-square4.jpg', 'garskin meizu m2 note dengan tema wajah ironman', '2016-05-02', 6),
(4, 'Xiaomi redmi 3 gold dragon', 'img-square5.jpg', 'garskin xiaomi redmi 3 dengan tema naga emas', '2016-05-02', 6),
(5, 'Acer v5 131 tribal tatto', 'img-square7.jpg', 'stiker laptop full body dengan tema tribal', '2016-05-02', 10),
(6, 'New D-Tracker 150 Fusion Orange', '2016-11-17-20266-Albert1.jpg', 'simple orange, go go go', '2016-11-17', 2),
(7, 'OLD KLX/D-Tracker Red Bull Livery', '2016-11-17-13275-Arie3.jpg', 'Blue line strip Red Bull Livery', '2016-11-17', 2),
(8, 'MID white Jupiter MX', '2016-11-17-78477-mxblueice.jpg', 'blue white own livery', '2016-11-17', 3),
(9, 'OLD KLX/D-Tracker Monster Energy', '2016-11-17-49693-mulwan.jpg', 'Monster Energy Livery tracker', '2016-11-17', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `proposal`
--

CREATE TABLE `proposal` (
  `id_proposal` int(11) NOT NULL,
  `nama_proposal` varchar(30) NOT NULL,
  `tanggal_proposal` date NOT NULL,
  `keterangan_proposal` varchar(100) DEFAULT NULL,
  `file_proposal` varchar(200) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `status_proposal` enum('Menunggu Konfirmasi','Diterima','Ditolak') DEFAULT NULL,
  `keterangan_admin` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `proposal`
--

INSERT INTO `proposal` (`id_proposal`, `nama_proposal`, `tanggal_proposal`, `keterangan_proposal`, `file_proposal`, `id_pelanggan`, `status_proposal`, `keterangan_admin`) VALUES
(2, 'uji coba proposal e', '2016-10-20', 'uji coba keterangan e', '2016-10-20-Atmaja Basuki-26052-ksksksksks.pdf', 3, 'Diterima', 'uji coba balas keterangan proposal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testimoni` int(10) NOT NULL,
  `judul_testimoni` varchar(20) NOT NULL,
  `tanggal_testimoni` date NOT NULL,
  `isi_testimoni` varchar(500) NOT NULL,
  `id_pelanggan` int(10) NOT NULL,
  `status_testimoni` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `testimoni`
--

INSERT INTO `testimoni` (`id_testimoni`, `judul_testimoni`, `tanggal_testimoni`, `isi_testimoni`, `id_pelanggan`, `status_testimoni`) VALUES
(1, 'Finishing mantap', '2016-05-23', 'finishing mantap. lapisan doffnya keren gan. harga terjangkau bisa dapet kualitas jempolan. TOP dah!!!																									', 3, 2),
(2, 'Skin handsphone', '2016-05-23', 'Skin buat handphone sangat presisi gan, hasil cetak juga oke sangat. Mantap banget.', 4, 2),
(3, 'Skin Laptop', '2016-05-23', 'bingung milih gambar digaleri, bagus-bagus semua. malah ditawarin gambar custom sesuai tema yang diinginkan. hebat ADS Decals.', 5, 2),
(4, 'dicoaba', '2016-11-15', 'dicoba									', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id_about`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indexes for table `hp`
--
ALTER TABLE `hp`
  ADD PRIMARY KEY (`id_hp`),
  ADD UNIQUE KEY `nama_hp` (`nama_hp`);

--
-- Indexes for table `konfirmasi_bayar`
--
ALTER TABLE `konfirmasi_bayar`
  ADD PRIMARY KEY (`id_konfirmasi`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`),
  ADD UNIQUE KEY `nama_kota` (`nama_kota`);

--
-- Indexes for table `laptop`
--
ALTER TABLE `laptop`
  ADD PRIMARY KEY (`id_laptop`),
  ADD UNIQUE KEY `nama_laptop` (`nama_laptop`);

--
-- Indexes for table `motor`
--
ALTER TABLE `motor`
  ADD PRIMARY KEY (`id_motor`),
  ADD UNIQUE KEY `nama_motor` (`nama_motor`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id_proposal`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testimoni`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id_about` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hp`
--
ALTER TABLE `hp`
  MODIFY `id_hp` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `konfirmasi_bayar`
--
ALTER TABLE `konfirmasi_bayar`
  MODIFY `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `laptop`
--
ALTER TABLE `laptop`
  MODIFY `id_laptop` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `motor`
--
ALTER TABLE `motor`
  MODIFY `id_motor` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id_proposal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_testimoni` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
