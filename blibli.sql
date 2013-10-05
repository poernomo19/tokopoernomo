-- phpMyAdmin SQL Dump
-- version 2.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 11, 2013 at 02:57 PM
-- Server version: 5.0.45
-- PHP Version: 5.2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `blibli`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(80) collate latin1_general_ci NOT NULL,
  `password` varchar(80) collate latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) collate latin1_general_ci NOT NULL,
  `email` varchar(20) collate latin1_general_ci NOT NULL,
  `no_telp` varchar(20) collate latin1_general_ci NOT NULL,
  `level` varchar(20) collate latin1_general_ci NOT NULL,
  `blokir` enum('Y','N') collate latin1_general_ci NOT NULL,
  `status` varchar(50) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`, `blokir`, `status`) VALUES
('tono', 'tono', 'tono kurnia', 'tono@hotmail.com', '0873839383', 'user', 'N', '');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(10) NOT NULL auto_increment,
  `nama_bank` varchar(100) collate latin1_general_ci NOT NULL,
  `alamat_bank` text collate latin1_general_ci NOT NULL,
  `nama_rekening` varchar(60) collate latin1_general_ci NOT NULL,
  `no_rekening` varchar(70) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id_bank`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`, `alamat_bank`, `nama_rekening`, `no_rekening`) VALUES
(1, 'BCA', 'Jalan Buah Batu Bandung,Jawa Barat', 'PT TOKO SIP', '0930393039'),
(2, 'Mandiri', 'Jalan Merdeka No.33 Bandung', 'Acong', '0393839333');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(10) NOT NULL auto_increment,
  `id_jasa` int(20) NOT NULL,
  `username` varchar(80) collate latin1_general_ci NOT NULL default 'user biasa',
  `password` varchar(100) collate latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) collate latin1_general_ci NOT NULL,
  `alamat` varchar(100) collate latin1_general_ci NOT NULL,
  `alamat2` text collate latin1_general_ci NOT NULL,
  `email` varchar(20) collate latin1_general_ci NOT NULL,
  `telpon` varchar(20) collate latin1_general_ci NOT NULL,
  `status` enum('1','0') collate latin1_general_ci NOT NULL default '0',
  PRIMARY KEY  (`id_customer`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `id_jasa`, `username`, `password`, `nama_lengkap`, `alamat`, `alamat2`, `email`, `telpon`, `status`) VALUES
(1, 1, 'user biasa', '123456', 'acong', 'jalan burangrang	', 'jalan cikawao	', 'nadipure@yahoo.co.id', '083930393', '0'),
(2, 2, 'user biasa', '123456', 'acong iksan', 'jalan sunda	', 'jalan sunda	', 'nadipure@yahoo.co.id', '085 637363373', '0'),
(3, 2, 'user biasa', '123456', 'acong iksan', 'jalan sunda	', 'jalan sunda	', 'nadipure@yahoo.co.id', '085 637363373', '0'),
(4, 3, 'user biasa', '123456', 'raden', 'bandung	', 'bandung	', 'nadipure@yahoo.co.id', '089 83938393', '0'),
(5, 2, 'user biasa', '123456', 'tommy', 'bogor	', 'bandung	', 'nadipure@yahoo.co.id', '0837 383383', '0'),
(6, 2, 'user biasa', '123456', 'sdfsdf', '	sfsf', '	sfs', 'nadipure@yahoo.co.id', '3333333333333', '0'),
(7, 1, 'user biasa', '123456', 'barri', 'bandung	', 'bogor	', 'nadipure@yahoo.co.id', '089 38393839', '0'),
(8, 2, 'user biasa', '123456', 'nanda', 'bandung	', 'bogor	', 'nanda@live.com', '087 38373333', '0'),
(9, 2, 'user biasa', '123456', 'manda', 'bandung	', 'bandung	', 'bandung@gmail.com', '087 63363733', '0'),
(10, 2, 'user biasa', '123456', 'sony', 'bogor	', 'bandung	', 'bandung@gmail.com', '085 63738373', '0'),
(11, 3, 'user biasa', '123456', 'nanda', 'jalan burangrang	', 'jalan cikawao	', 'nanda@live.com', '089 83938393', '0'),
(12, 1, 'user biasa', '123456', 'john', 'bandung	', 'bandung	', 'iksankoes@gmail.com', '089 83938393', '0'),
(13, 2, 'user biasa', '123456', 'karno', 'bandung	', 'bandung	', 'iksankoes@gmail.com', '089 8393833', '0'),
(14, 2, 'user biasa', '123456', 'karno', 'bandung	', 'bandung	', 'iksankoes@gmail.com', '089 8393833', '0');

-- --------------------------------------------------------

--
-- Table structure for table `jasa_kirim`
--

CREATE TABLE `jasa_kirim` (
  `id_jasa` int(10) NOT NULL auto_increment,
  `nama` varchar(100) collate latin1_general_ci NOT NULL,
  `alamat` varchar(100) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id_jasa`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `jasa_kirim`
--

INSERT INTO `jasa_kirim` (`id_jasa`, `nama`, `alamat`) VALUES
(1, 'Fedex', 'New York USA'),
(2, 'JNE', 'Jakarta'),
(3, 'TIKI', 'Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL auto_increment,
  `nama_kategori` varchar(60) collate latin1_general_ci NOT NULL,
  `seo` varchar(100) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id_kategori`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `seo`) VALUES
(1, 'Laptop', 'Laptop,Kompi,Komputer'),
(2, 'PC', 'PC,Kompi,Toko Laptop'),
(3, 'Accessoris', 'Laptop,PC'),
(4, 'Buku', 'Buku Komputer,Laptop');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(20) NOT NULL auto_increment,
  `id_produk` int(20) NOT NULL,
  `nama` varchar(100) collate latin1_general_ci NOT NULL,
  `gambar` varchar(100) collate latin1_general_ci NOT NULL default 'default.png',
  `email` varchar(30) collate latin1_general_ci NOT NULL,
  `isi` text collate latin1_general_ci NOT NULL,
  `tgl` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id_komentar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_produk`, `nama`, `gambar`, `email`, `isi`, `tgl`) VALUES
(1, 2, 'acong', 'default.png', 'acong@dodot.com', 'I am on Hot Feed screen\r\nI tap refresh icon\r\nI should see the refresh icon is rotated while data loads\r\nI am on Hot Feed screen\r\nI tap refresh icon\r\nI should see the refresh icon is rotated while data loads\r\n', '2013-04-10 13:07:59'),
(2, 4, 'adi purnomo', 'default.png', 'acong@dodot.com', 'I am on Hot Feed screen\r\nI tap refresh icon\r\nI should see the refresh icon is rotated while data loads\r\n', '2013-04-10 13:20:27'),
(3, 4, 'ahmad', 'default.png', 'acong@dodot.com', 'this is truly product', '2013-04-10 14:13:21'),
(4, 5, 'Anggi', 'default.png', 'bandung@gmail.com', 'this is cool', '2013-04-10 14:20:21'),
(5, 6, 'manda', 'default.png', 'iksankoes@gmail.com', 'this is awesome', '2013-04-10 14:47:22');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(10) NOT NULL auto_increment,
  `nama_kota` varchar(80) collate latin1_general_ci NOT NULL,
  `ongkos_kirim` int(30) NOT NULL,
  PRIMARY KEY  (`id_kota`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `kota`
--


-- --------------------------------------------------------

--
-- Table structure for table `order_pesan`
--

CREATE TABLE `order_pesan` (
  `id_order` int(20) NOT NULL auto_increment,
  `no_order` int(100) NOT NULL,
  `status_order` enum('0','1','2','3') collate latin1_general_ci NOT NULL default '0',
  `tgl_order` date NOT NULL,
  `jam_order` time NOT NULL,
  `id_produk` int(20) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `id_customer` int(20) NOT NULL,
  PRIMARY KEY  (`id_order`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `order_pesan`
--

INSERT INTO `order_pesan` (`id_order`, `no_order`, `status_order`, `tgl_order`, `jam_order`, `id_produk`, `jumlah`, `id_customer`) VALUES
(1, 1212885628, '0', '2013-04-09', '13:40:25', 6, 1, 1),
(2, 1339775150, '0', '2013-04-09', '13:46:04', 7, 1, 2),
(3, 319744968, '0', '2013-04-09', '14:42:54', 6, 1, 4),
(4, 1203304615, '0', '2013-04-09', '14:44:34', 2, 1, 5),
(5, 1243517705, '0', '2013-04-09', '14:47:15', 7, 1, 6),
(6, 993199414, '0', '2013-04-09', '15:35:24', 6, 1, 7),
(7, 336206049, '0', '2013-04-09', '15:41:15', 4, 1, 8),
(8, 1022494955, '0', '2013-04-09', '15:45:26', 2, 2, 9),
(9, 1226602299, '0', '2013-04-09', '15:46:40', 5, 1, 10),
(10, 1088290162, '0', '2013-04-11', '09:52:37', 6, 1, 11),
(11, 9002066, '0', '2013-04-11', '10:13:18', 7, 1, 12),
(12, 130196534, '0', '2013-04-11', '10:16:26', 7, 1, 13);

-- --------------------------------------------------------

--
-- Table structure for table `order_temp`
--

CREATE TABLE `order_temp` (
  `id_order_temp` int(5) NOT NULL auto_increment,
  `id_produk` int(5) NOT NULL,
  `id_session` varchar(100) collate latin1_general_ci NOT NULL,
  `qty` int(5) NOT NULL,
  `tgl_order_temp` date NOT NULL,
  `jam_order_temp` time NOT NULL,
  `stok_temp` int(5) NOT NULL,
  PRIMARY KEY  (`id_order_temp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `order_temp`
--

INSERT INTO `order_temp` (`id_order_temp`, `id_produk`, `id_session`, `qty`, `tgl_order_temp`, `jam_order_temp`, `stok_temp`) VALUES
(13, 6, 'ac7dfaeb97247e995a73537daa7e81d2', 1, '2013-04-10', '16:18:59', 10);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_bayar` int(10) NOT NULL auto_increment,
  `no_order` varchar(40) collate latin1_general_ci NOT NULL,
  `id_bank` int(20) NOT NULL,
  `bank_anda` varchar(50) collate latin1_general_ci NOT NULL,
  `rekening_nama` varchar(100) collate latin1_general_ci NOT NULL,
  `nominal` float NOT NULL,
  `no_rekening` varchar(50) collate latin1_general_ci NOT NULL,
  `tgl_transfer` date NOT NULL,
  `bukti_gambar` varchar(100) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id_bayar`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `pembayaran`
--


-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(5) NOT NULL auto_increment,
  `id_kategori` int(5) NOT NULL,
  `nama_produk` varchar(80) collate latin1_general_ci NOT NULL,
  `produk_seo` varchar(100) collate latin1_general_ci NOT NULL,
  `deskripsi` text collate latin1_general_ci NOT NULL,
  `harga` int(20) NOT NULL,
  `stok` int(5) NOT NULL,
  `berat` decimal(5,2) unsigned NOT NULL default '0.00',
  `tgl_masuk` date NOT NULL,
  `gambar` varchar(100) collate latin1_general_ci NOT NULL,
  `dibeli` int(5) NOT NULL,
  `diskon` int(5) NOT NULL,
  PRIMARY KEY  (`id_produk`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `produk_seo`, `deskripsi`, `harga`, `stok`, `berat`, `tgl_masuk`, `gambar`, `dibeli`, `diskon`) VALUES
(1, 1, 'Laptop Acer', 'Laptop Acer 478Z', 'Laptop ini telah teruji di segala kondisi', 5000000, 50, 1.50, '2013-04-04', 'default.png', 0, 5),
(2, 2, 'Kompi Sony', 'Komputer,Sony,Toko Laptop', 'Komputer ini keluaran terbaru harga standar kualitas ok', 10000000, 50, 2.00, '2013-04-04', 'default.png', 0, 0),
(3, 3, 'Keyboard', 'Keyboard Laptop,Komputer', 'Keyboard keluaran baru merk dunia', 40000, 0, 1.00, '2013-04-04', 'default.png', 0, 0),
(4, 3, 'RAM', 'RAM,PC,laptop', 'RAM 4 GB mendukung kualitas gambar tinggi', 200000, 20, 0.50, '2013-04-04', 'default.png', 0, 0),
(5, 3, 'Coolpad', 'Coolpad laptop,toko sip', 'Coolpad laptop produk terbaru siap untuk digunakan', 40000, 30, 0.40, '2013-04-04', 'default.png', 0, 10),
(6, 3, 'Motherboard', 'Motherboard laptop', 'laptop', 1000000, 10, 0.30, '2013-04-04', 'default.png', 0, 0),
(7, 1, 'Laptop Apple', 'Laptop Baru Apple', 'Laptop apple keren', 1000000, 10, 2.00, '2013-04-04', 'default.png', 0, 0),
(8, 2, 'Kompi Mini', 'Komputer mini', 'Komputer mini baru buatan anak negeri ini dirancang khusus untuk pengguna anak-anak yang ingin kenyaman saat menggunakan.baik untuk mata', 5000000, 20, 0.20, '2013-04-04', 'default.png', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(100) collate latin1_general_ci NOT NULL,
  `password` varchar(100) collate latin1_general_ci NOT NULL,
  `email` varchar(20) collate latin1_general_ci NOT NULL,
  `status` varchar(100) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `email`, `status`) VALUES
('admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@live.com', '1');
