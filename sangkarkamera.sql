-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 20 Des 2014 pada 01.27
-- Versi Server: 5.6.14
-- Versi PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `sangkarkamera`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(100) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `id_kategori` varchar(6) NOT NULL,
  `stok` int(3) NOT NULL,
  `harga` int(15) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `jenis`, `merk`, `photo`, `id_kategori`, `stok`, `harga`, `keterangan`, `tanggal`) VALUES
(23, 'Nikon Series TAA001', 'Nikon Series', '8611_10152008481352713_2024244525_n.jpg', 'KAT004', 1, 120000, '<div style="text-align: justify;">Nikon Series TAA001 adalah asdf asdfasdf asd fasdf asdf asd fas dfa sd fasdfa sd fasdfa sd fasdf asd fasdfasdfas df asd fasdf as df as dfa sdf as df asd fsa sd fa sd f as dfasdfas dfasd&nbsp;asdf asdfasdf asd fasdf asdf asd fas dfa sd fasdfa sd fasdfa sd fasdf asd fasdfasdfas df asd fasdf as df as dfa sdf as df asd fsa sd fa sd f as dfasdfas dfasd&nbsp;asdf asdfasdf asd fasdf asdf asd fas dfa sd fasdfa sd fasdfa sd fasdf asd fasdfasdfas df asd fasdf as df as dfa sdf as df asd fsa sd fa sd f as dfasdfas dfasd&nbsp;asdf asdfasdf asd fasdf asdf asd fas dfa sd fasdfa sd fasdfa sd fasdf asd fasdfasdfas df asd fasdf as df as dfa sdf as df asd fsa sd fa sd f as dfasdfas dfasd&nbsp;asdf asdfasdf asd fasdf asdf asd fas dfa sd fasdfa sd fasdfa sd fasdf asd fasdfasdfas df asd fasdf as df as dfa sdf as df asd fsa sd fa sd f as dfasdfas dfasd&nbsp;asdf asdfasdf asd fasdf asdf asd fas dfa sd fasdfa sd fasdfa sd fasdf asd fasdfasdfas df asd fasdf as df as dfa sdf as df asd fsa sd fa sd f as dfasdfas dfasd&nbsp;asdf asdfasdf asd fasdf asdf asd fas dfa sd fasdfa sd fasdfa sd fasdf asd fasdfasdfas df asd fasdf as df as dfa sdf as df asd fsa sd fa sd f as dfasdfas dfasd&nbsp;asdf asdfasdf asd fasdf asdf asd fas dfa sd fasdfa sd fasdfa sd fasdf asd fasdfasdfas df asd fasdf as df as dfa sdf as df asd fsa sd fa sd f as dfasdfas dfasd</div>', '2014-12-18 15:43:46'),
(24, 'AS Sony T2', 'Sony', 'facebook-default.jpg', 'KAT003', 0, 100000, 'Asdasd asd asd asdas das as dasd asdasdas asd asda sdas da sadas asda sdasdasd&nbsp;&nbsp;asd asd asdas das as dasd asdasdas asd asda sdas da sadas asda sdasdasd&nbsp;&nbsp;asd asd asdas das as dasd asdasdas asd asda sdas da sadas asda sdasdasd', '2014-11-18 14:26:05'),
(26, 'AADC', 'Ada', 'arsenal_1886_2011_logo.png_480_480_0_64000_0_1_0.png', 'KAT002', 1, 85000, 'AADC adalah aadc cdaa cddc cdcdcdc asadc asdcasdc asd csdca sdc', '2014-11-19 08:38:03'),
(27, 'QWERTY', 'Aasas', 'REV-300-x-1200-landscape-01.jpg', 'KAT003', 1, 75000, 'QWerty', '2014-11-19 08:39:57'),
(28, 'GHJKL', 'Sony', 'Katalog1.png', 'KAT004', 2, 30000, 'Asdf sdfasd fa dfa sdf sdfasdfasd', '2014-12-19 23:32:41'),
(29, 'ERte63', 'REkme', 'Penguins.jpg', 'KAT003', 3, 120000, 'sdfgsdf fghfgh fdg hdfg hdfgh fg', '2014-12-19 23:08:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpesan`
--

CREATE TABLE IF NOT EXISTS `detailpesan` (
  `id_pesan` int(5) NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status_pesan` varchar(50) NOT NULL DEFAULT 'Baru',
  `tanggal_pesan` datetime NOT NULL,
  `id_kota` varchar(6) NOT NULL,
  `idtransaksi` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pesan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data untuk tabel `detailpesan`
--

INSERT INTO `detailpesan` (`id_pesan`, `nama_pelanggan`, `alamat`, `telepon`, `email`, `status_pesan`, `tanggal_pesan`, `id_kota`, `idtransaksi`) VALUES
(17, 'Syihab', 'Bekasi', '0854646465', 'syihab@mail.com', 'Sudah Dikirim', '2014-12-19 11:19:36', 'CTY010', '141219031422'),
(18, 'Nafisa', 'Jambi', '09767677888', 'nafisa@gmail.com', 'Baru', '2014-12-19 13:46:07', 'CTY025', '141219074535'),
(19, 'Saya', 'Kediri', '08578582828', 'saya@mail.com', 'Baru', '2014-12-19 13:55:50', 'CTY029', '141219075101'),
(20, 'aaa', 'sss', '085848484145', 'aaa@mail.com', 'Sudah Dikirim', '2014-12-19 13:56:27', 'CTY003', '141219075555'),
(22, 'Muthi Nafisa', 'Bogor', '085743305083', 'muthinafisa@gmail.com', 'Sudah Dikirim', '2014-12-19 21:55:19', 'CTY014', '141219155415'),
(23, 'Muhamad Syihabudin', 'Kp. Cinyosog RT 002/002 No. 16 Ds. Burangkeng Setu Bekasi 17324', '081281969710', 'shb@hotmail.co.id', 'Sudah Dikirim', '2014-12-19 22:51:09', 'CTY010', '141219164615'),
(24, 'Ade', 'Jakarta Timur', '081282828282', 'ade@gmail.com', 'Baru', '2014-12-19 23:09:05', 'CTY001', '141219170733');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` varchar(6) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `id` int(4) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `id`) VALUES
('KAT002', 'Nikon', 2),
('KAT003', 'Sony', 4),
('KAT004', 'Backpack', 6),
('KAT005', 'Slempang', 7),
('KAT006', 'Ransel', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
  `id_kota` varchar(6) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `ongkos_kirim` int(10) NOT NULL,
  `id` int(5) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`, `ongkos_kirim`, `id`) VALUES
('CTY001', 'Jakarta', 8000, 2),
('CTY002', 'Ambon', 52000, 5),
('CTY003', 'Ampana Kota', 58000, 6),
('CTY004', 'Balikpapan', 36000, 7),
('CTY005', 'Banda Aceh', 33000, 8),
('CTY006', 'Bandar Lampung', 17000, 9),
('CTY007', 'Bandung', 10000, 10),
('CTY008', 'Banjarmasin', 30000, 11),
('CTY009', 'Batam', 25000, 12),
('CTY010', 'Bekasi', 8000, 13),
('CTY011', 'Bengkulu', 22000, 14),
('CTY012', 'Benteng', 49000, 15),
('CTY013', 'Blangpidie', 48000, 16),
('CTY014', 'Bogor', 8000, 17),
('CTY015', 'Bontang', 49000, 18),
('CTY016', 'Burmeso', 203000, 19),
('CTY017', 'Cilacap', 15000, 20),
('CTY018', 'Cilegon', 9000, 21),
('CTY019', 'Cirebon', 10000, 22),
('CTY020', 'Denpasar', 20000, 23),
('CTY021', 'Depok', 8000, 24),
('CTY022', 'FAK-FAK', 115000, 25),
('CTY023', 'Gorontalo', 45000, 26),
('CTY024', 'Jakarta', 8000, 27),
('CTY025', 'Jambi', 20000, 28),
('CTY026', 'Jayapura', 80000, 29),
('CTY027', 'Jayapura-Jember', 20000, 30),
('CTY028', 'Karawang', 9000, 31),
('CTY029', 'Kediri', 20000, 32),
('CTY030', 'Kendari', 45000, 33),
('CTY031', 'Kupang', 50000, 34),
('CTY032', 'Madiun', 20000, 35),
('CTY033', 'Magelang', 18000, 36),
('CTY034', 'Malang', 20000, 37),
('CTY035', 'Manado', 42000, 38),
('CTY036', 'Mataram', 25000, 39),
('CTY037', 'Medan', 27000, 40),
('CTY038', 'Mojokerto', 20000, 41),
('CTY039', 'Nabire', 98000, 42),
('CTY040', 'Ngamprah', 10000, 43),
('CTY041', 'Padang', 25000, 44),
('CTY042', 'Palangkaraya', 30000, 45),
('CTY043', 'Palembang', 20000, 46),
('CTY044', 'Palopo', 49000, 47),
('CTY045', 'Palu', 40000, 48),
('CTY046', 'Pandaan', 20000, 49),
('CTY047', 'Pangkal Pinang', 20000, 50),
('CTY048', 'Pangkalan Balai', 31000, 51),
('CTY049', 'Pangkalan Kerinci', 37000, 52),
('CTY050', 'Pekanbaru', 25000, 53),
('CTY051', 'Pemalang', 20000, 54),
('CTY052', 'Pontianak', 27000, 55),
('CTY053', 'Probolinggo', 20000, 56),
('CTY054', 'Ratahan', 58000, 57),
('CTY055', 'Samarinda', 41000, 58),
('CTY056', 'Sambas', 42000, 59),
('CTY057', 'Semarang', 16000, 60),
('CTY058', 'Solo', 16000, 61),
('CTY059', 'Sorong', 80000, 62),
('CTY060', 'Sukabumi', 9000, 63),
('CTY061', 'Sukadana-Lampung Timur', 35000, 64),
('CTY062', 'Surabaya', 17000, 65),
('CTY063', 'Tais', 35000, 66),
('CTY064', 'Tangerang', 8000, 67),
('CTY065', 'Tanjung Pandan', 23000, 68),
('CTY066', 'Tanjung Pinang', 32000, 69),
('CTY067', 'Tarakan', 49000, 70),
('CTY068', 'Tarutung', 38000, 71),
('CTY069', 'Ternate', 55000, 72),
('CTY070', 'Timika', 85000, 73),
('CTY071', 'Trenggalek', 22000, 74),
('CTY072', 'Tulungagung', 22000, 75),
('CTY073', 'Ujung Pandang', 32000, 76),
('CTY074', 'Waingapu', 65000, 77),
('CTY075', 'Waris', 108000, 78),
('CTY076', 'Yogyakarta', 16000, 79);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `idtransaksi` varchar(20) NOT NULL,
  `status_pembayaran` varchar(20) NOT NULL DEFAULT 'Belum Lunas',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `idtransaksi`, `status_pembayaran`) VALUES
(1, '141219031422', 'Sudah Lunas'),
(2, '141219074535', 'Belum Lunas'),
(3, '141219075101', 'Belum Lunas'),
(4, '141219075555', 'Sudah Lunas'),
(6, '141219155415', 'Sudah Lunas'),
(7, '141219164615', 'Sudah Lunas'),
(8, '141219170733', 'Belum Lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabelpesan`
--

CREATE TABLE IF NOT EXISTS `tabelpesan` (
  `nomor` int(10) NOT NULL AUTO_INCREMENT,
  `idtransaksi` varchar(20) NOT NULL,
  `id` int(5) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `harga` double NOT NULL,
  PRIMARY KEY (`nomor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data untuk tabel `tabelpesan`
--

INSERT INTO `tabelpesan` (`nomor`, `idtransaksi`, `id`, `jumlah`, `harga`) VALUES
(14, '141219031422', 28, 1, 30000),
(15, '141219074535', 29, 1, 120000),
(16, '141219075101', 23, 1, 120000),
(17, '141219075555', 27, 1, 75000),
(19, '141219155415', 26, 1, 85000),
(20, '141219164615', 26, 1, 85000),
(21, '141219164615', 23, 1, 120000),
(22, '141219170733', 29, 2, 240000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `namalengkap` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `blokir` enum('N','Y') NOT NULL,
  `level` varchar(15) NOT NULL,
  `keyword` varchar(16) NOT NULL DEFAULT 'Copyright-syihab',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `namalengkap`, `username`, `password`, `email`, `blokir`, `level`, `keyword`) VALUES
(1, 'Muhamad Syihabudin', 'admin', 'syihab', 'muhamads0509@bsi.ac.id', 'N', 'All-Privileges', 'Copyright-syihab'),
(3, 'Ahmad Alfian KY', 'alfian', 'pian', 'pian@mail.com', 'N', 'User', 'Copyright-syihab'),
(4, 'Ade Angga', 'Angga', 'ade', 'ade@mail.com', 'Y', 'User', 'Copyright-syihab');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
