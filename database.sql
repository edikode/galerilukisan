-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2018 at 02:35 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lukisan`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `link` varchar(110) DEFAULT NULL,
  `teks` text,
  `tanggal` date DEFAULT NULL,
  `gambar` varchar(110) DEFAULT NULL,
  `penulis` varchar(45) DEFAULT NULL,
  `kategori` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `nama`, `link`, `teks`, `tanggal`, `gambar`, `penulis`, `kategori`) VALUES
(3, 'Sejarah umum seni lukis', 'sejarah-umum-seni-lukis', '<p><strong>Seni lukis</strong><span style="color:rgb(57, 57, 57)">&nbsp;adalah salah satu cabang dari&nbsp;</span><strong>seni rupa</strong><span style="color:rgb(57, 57, 57)">. Dengan dasar pengertian yang sama, seni lukis adalah sebuah pengembangan yang lebih utuh dari menggambar.</span><br />\r\n<br />\r\n<span style="color:rgb(57, 57, 57)">Melukis adalah kegiatan mengolah medium dua dimensi atau permukaan dari objek tiga dimensi untuk mendapat kesan tertentu. Medium lukisan bisa berbentuk apa saja,&nbsp;</span><strong>seperti kanvas, kertas, papan, dan bahkan film di dalam&nbsp;<a href="http://zirakarisma.blogspot.com/search/label/Photographer" style="border: 0px; padding: 0px; font: inherit; vertical-align: baseline; color: rgb(34, 34, 34); text-decoration-line: none; margin: 0px auto; -webkit-tap-highlight-color: rgb(255, 94, 153);">fotografi</a>&nbsp;bisa dianggap sebagai media lukisan</strong><span style="color:rgb(57, 57, 57)">. Alat yang digunakan juga bisa bermacam-macam, dengan syarat bisa memberikan imaji tertentu kepada media yang digunakan.</span></p>\r\n\r\n<p><br />\r\n<strong>Sejarah umum seni lukis </strong></p>\r\n\r\n<p><span style="text-align:justify">Secara historis, seni lukis sangat terkait dengan gambar. Peninggalan-peninggalan prasejarah memperlihatkan bahwa sejak ribuan tahun yang lalu, nenek moyang manusia telah mulai membuat gambar pada dinding-dinding gua untuk mencitrakan bagian-bagian penting dari kehidupan. Sebuah lukisan atau gambar bisa dibuat hanya dengan menggunakan materi yang sederhana seperti arang, kapur, atau bahan lainnya. Salah satu teknik terkenal gambar prasejarah yang dilakukan orang-orang gua adalah dengan menempelkan tangan di dinding gua, lalu menyemburnya dengan kunyahan dedaunan atau batu mineral berwarna. Hasilnya adalah jiplakan tangan berwana-warni di dinding-dinding gua yang masih bisa dilihat hingga saat ini. Kemudahan ini memungkinkan gambar (dan selanjutnya lukisan) untuk berkembang lebih cepat daripada cabang seni rupa lain seperti seni patung dan seni keramik.</span></p>\r\n\r\n<p style="text-align:justify">Seperti gambar, lukisan kebanyakan dibuat di atas bidang datar seperti dinding, lantai, kertas, atau kanvas. Dalam pendidikan seni rupa modern di Indonesia, sifat ini disebut juga dengan dwi-matra (dua dimensi, dimensi datar).</p>\r\n\r\n<p style="text-align:justify">Objek yang sering muncul dalam karya-karya purbakala adalah manusia, binatang, dan objek-objek alam lain seperti pohon, bukit, gunung, sungai, dan laut. Bentuk dari objek yang digambar tidak selalu serupa dengan aslinya. Ini disebut citra dan itu sangat dipengaruhi oleh pemahaman si pelukis terhadap objeknya. Misalnya, gambar seekor banteng dibuat dengan proporsi tanduk yang luar biasa besar dibandingkan dengan ukuran tanduk asli. Pencitraan ini dipengaruhi oleh pemahaman si pelukis yang menganggap tanduk adalah bagian paling mengesankan dari seekor banteng. Karena itu, citra mengenai satu macam objek menjadi berbeda-beda tergantung dari pemahaman budaya masyarakat di daerahnya.</p>\r\n\r\n<p style="text-align:justify">Pada satu titik, ada orang-orang tertentu dalam satu kelompok masyarakat prasejarah yang lebih banyak menghabiskan waktu untuk menggambar daripada mencari makanan. Mereka mulai mahir membuat gambar dan mulai menemukan bahwa bentuk dan susunan rupa tertentu, bila diatur sedemikian rupa, akan nampak lebih menarik untuk dilihat daripada biasanya. Mereka mulai menemukan semacam cita-rasa keindahan dalam kegiatannya dan terus melakukan hal itu sehingga mereka menjadi semakin ahli. Mereka adalah seniman-seniman yang pertama di muka bumi dan pada saat itulah kegiatan menggambar dan melukis mulai condong menjadi kegiatan seni.</p>\r\n\r\n<p style="text-align:justify"><strong>Seni lukis zaman klasik</strong></p>\r\n\r\n<p style="text-align:justify"><span style="color:rgb(57, 57, 57)">Seni lukis zaman klasik kebanyakan dimaksudkan untuk tujuan:</span></p>\r\n\r\n<ul>\r\n	<li style="text-align:justify">Mistisme (sebagai akibat belum berkembangnya agama)</li>\r\n	<li style="text-align:justify">Propaganda (sebagai contoh grafiti di reruntuhan kota Pompeii),</li>\r\n</ul>\r\n\r\n<div style="border: 0px; padding: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial; vertical-align: baseline; color: rgb(57, 57, 57); text-align: justify;">Di zaman ini lukisan dimaksudkan untuk meniru semirip mungkin bentuk-bentuk yang ada di alam. Hal ini sebagai akibat berkembangnya ilmu pengetahuan dan dimulainya kesadaran bahwa seni lukis mampu berkomunikasi lebih baik daripada kata-kata dalam banyak hal.</div>\r\n', '2018-07-15', 'Sejarah_umum_seni_lukis-7442.PNG', 'Administrator', NULL),
(4, 'PENGERTIAN MURAL, SEJARAH, PERKEMBANGAN DAN PERBEDAAN MURAL DENGAN SENI LUKIS LAINNYA', 'pengertian-mural-sejarah-perkembangan-dan-perbedaan-mural-dengan-seni-lukis-lainnya', '<h2>Pengertian Mural</h2>\r\n\r\n<h2><img alt="" src="/lukisan/upload/kcfinder/images/Capture.PNG" style="height:583px; width:681px" /></h2>\r\n\r\n<p>Apa itu Mural? Apa sebenarnya yang dimaksud dengan mural? Mural merupakan sebuah kata yang cukup asing di dengar bagi sebagian orang khususnya orang awam.</p>\r\n\r\n<p>Namun sebenarnya kebanyakan dari orang-orang tersebut sebenarnya telah melihat secara langsung apa itu mural bahkan bisa jadi sering.</p>\r\n\r\n<p>Pengertian mural menurut bahasa yaitu mural berasal dari bahasa latin yaitu dari kata &ldquo;Murus&rdquo; yang berarti dinding. Secara luas pengertian mural adalah menggambar atau melukis di atas media dinding, tembok atau media luas lainnya yang bersifat permanen.</p>\r\n\r\n<p>Nah, dari pengertian mural atau arti mural di atas sudah cukup memberi pencerahan kan mengenai apa itu mural sebenarnya? Jadi, lukisan atau gambar apapun yang dibuat pada media permanen seperti lantai, meja, langit-langit itu juga termasuk ke dalam mural.</p>\r\n\r\n<h2>Sejarah Seni Mural</h2>\r\n\r\n<p><img alt="" src="/lukisan/upload/kcfinder/images/Capture1.PNG" style="height:312px; width:685px" /></p>\r\n\r\n<p>Seni mural sebenarnya sudah ada sejak jaman dahulu kala. Bahkan jika ditilik dari sejarah mural, mural sudah ada sejak 31.500 tahun yang lalu tepatnya pada masa prasejarah.</p>\r\n\r\n<p>Pada masa itu terdapat sebuah lukisan yang menggambarkan sebuah gua di Lascaux yaitu daerah Selatan Prancis. Mural yang dibuat pada masa prasejarah tersebut menggunakan sari buah sebagai cat air (karena pada masa prasejarah belum ada cat).</p>\r\n\r\n<p>Pada masa prasejarah, negara yang paling banyak memiliki lukisan dinding atau mural tidak lain yaitu Prancis. Salah satu mural atau lukisan dinding yang paling terkenal pada saat itu yaitu mural karya Pablo Picasso.</p>\r\n\r\n<p>Pablo Picasso membuat sebuah mural yang dinamakan Guernica atau Guernica y Luno. Mural ini dibuat pada saat terjadinya peristiwa perang sipil di Spanyol pada tahun 1937.</p>\r\n\r\n<p>Tujuan dibuatnya mural ini yaitu untuk memperingati peristiwa pengeboman oleh tentara Jerman yang terjadi di sebuah desa kecil dimana kebanyakan diantara mereka yaitu masyarakat Spanyol.</p>\r\n\r\n<h2>Perbedaan Seni Mural Dengan Graffiti</h2>\r\n\r\n<p><img alt="" src="/lukisan/upload/kcfinder/images/12.PNG" style="height:509px; width:679px" /></p>\r\n\r\n<p>Banyak diantara kita yang masih bingung apa perbedaan mural dan graffiti. Jika dilihat secara media, biasanya mural dan graffiti memang sering dibuat di atas media dinding.</p>\r\n\r\n<p>Khususnya di jalanan, mungkin banyak diantara kalian yang melihat lukisan dinding dengan berbagai macam karakter atau pun bentuk tulisan lainnya.</p>\r\n\r\n<p>Lalu, apa perbedaan dari mural dan graffiti?</p>\r\n\r\n<p>Sebelum kita membandingkan mural dan graffiti, akan lebih baik jika kita sama-sama mengetahui apa arti atau pengertian daripada Graffiti.</p>\r\n\r\n<p>Graffiti&nbsp;(juga dieja graffity atau graffiti) adalah coretan-coretan pada dinding yang menggunakan komposisi warna, garis, bentuk, dan volume untuk menuliskan kata, simbol, atau kalimat tertentu.</p>\r\n\r\n<p>Alat yang digunakan pada masa kini biasanya cat semprot kaleng. Sebelum cat semprot tersedia, grafiti umumnya dibuat dengan sapuan cat menggunakan kuas atau kapur.</p>\r\n\r\n<p>Jadi, perbedaan mural dengan graffiti yaitu jika mural gambar yang dibuat lebih bebas dan luas, sedangkan untuk graffiti berupa tulisan atau kata-kata. Dan biasanya untuk jaman sekarang graffiti lebih sering dibuat dengan menggunakan cat semprot.</p>\r\n\r\n<h2>Perkembangan Seni Mural</h2>\r\n\r\n<p><img alt="" src="/lukisan/upload/kcfinder/images/23.PNG" style="height:554px; width:677px" /></p>\r\n\r\n<p>Jika dulu mural hanya sebagai bentuk ungkapan, mengkritisi masalah sosial lewat gambar dan tulisan di dinding jalanan, trotoar, kini mural menjadi &quot;bisnis manis seni lukis&quot;.</p>\r\n\r\n<p>Bisa Anda lihat sekarang, mural menjadi salah satu pilihan untuk mempercantik interior. Bahkan mural juga menjadi daya tarik tersendiri sebagai spot foto yang menarik.</p>\r\n\r\n<p>Tidak heran jika kini banyak sekali cafe, restoran, hotel, apartemen hingga rumah menggunakan lukisan dinding atau mural sebagai&nbsp;<em>Point of View</em>&nbsp;dari sebuah ruangan.</p>\r\n\r\n<p>Mural menjadi daya tarik bagi pengunjung untuk datang ke cafe atau resto. Mural yang dibuat disesuaikan dengan selera, konsep cafe/restonya sendiri hingga menjadi media branding secara tidak langsung.</p>\r\n', '2018-08-18', 'PENGERTIAN_MURAL,_SEJARAH,_PERKEMBANGAN_DAN_PERBEDAAN_MURAL_DENGAN_SENI_LUKIS_LAINNYA-2297.jpg', 'Administrator', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detailpembelian`
--

CREATE TABLE `detailpembelian` (
  `id` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `produk_id` int(11) NOT NULL,
  `pemesanan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detailpembelian`
--

INSERT INTO `detailpembelian` (`id`, `jumlah`, `subtotal`, `produk_id`, `pemesanan_id`) VALUES
(1, 1, 500000, 16, 1),
(2, 1, 500000, 16, 2),
(3, 1, 700000, 15, 3),
(4, 1, 700000, 15, 4),
(5, 1, 1500000, 18, 5),
(6, 1, 600000, 17, 6),
(7, 3, 1800000, 17, 7),
(8, 1, 600000, 17, 8),
(9, 1, 500000, 16, 9),
(10, 1, 600000, 17, 10),
(11, 1, 500000, 16, 11),
(12, 3, 2100000, 15, 12),
(13, 1, 600000, 17, 13),
(14, 1, 700000, 15, 14),
(15, 1, 500000, 16, 15),
(16, 1, 600000, 17, 16),
(17, 1, 500000, 16, 17),
(18, 1, 600000, 17, 18),
(19, 1, 700000, 15, 19),
(20, 1, 600000, 17, 20),
(21, 1, 700000, 15, 21);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id`, `nama`, `link`) VALUES
(1, 'Alam', 'alam'),
(2, 'Buah', 'buah'),
(3, 'Hewan', 'hewan'),
(4, 'Bunga', 'bunga'),
(5, 'Kaligrafi dan Kakbah', 'kaligrafi-dan-kakbah'),
(6, 'Bentuk Badan full', 'pahlawan-bentuk-badan'),
(7, 'Bentuk Wajah', 'bentuk-wajah');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `l_harga`
--

CREATE TABLE `l_harga` (
  `id` int(5) NOT NULL,
  `harga` int(11) NOT NULL,
  `kategori_id` int(2) NOT NULL,
  `ukuran_id` int(2) NOT NULL,
  `lama_pembuatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `l_harga`
--

INSERT INTO `l_harga` (`id`, `harga`, `kategori_id`, `ukuran_id`, `lama_pembuatan`) VALUES
(1, 250000, 1, 1, 'Kurang lebih 1 bulan'),
(2, 300000, 1, 2, 'Kurang lebih 1 bulan'),
(3, 350000, 1, 3, 'Kurang lebih 1 bulan'),
(4, 700000, 1, 4, 'Kurang lebih 1 bulan'),
(5, 800000, 1, 5, 'Kurang lebih 1 bulan'),
(6, 1500000, 1, 6, 'Kurang lebih 1 bulan'),
(7, 150000, 2, 1, 'Kurang lebih 1 bulan'),
(8, 200000, 2, 2, 'Kurang lebih 1 bulan'),
(9, 250000, 2, 3, 'Kurang lebih 1 bulan'),
(10, 500000, 2, 4, 'Kurang lebih 1 bulan'),
(11, 600000, 2, 5, 'Kurang lebih 1 bulan'),
(12, 1000000, 2, 6, 'Kurang lebih 1 bulan'),
(13, 200000, 3, 1, 'Kurang lebih 1 bulan'),
(14, 250000, 3, 2, 'Kurang lebih 1 bulan'),
(15, 300000, 3, 3, 'Kurang lebih 1 bulan'),
(16, 600000, 3, 4, 'Kurang lebih 1 bulan'),
(17, 700000, 3, 5, 'Kurang lebih 1 bulan'),
(18, 1250000, 3, 6, 'Kurang lebih 1 bulan'),
(19, 150000, 4, 1, 'Kurang lebih 1 bulan'),
(20, 200000, 4, 2, 'Kurang lebih 1 bulan'),
(21, 250000, 4, 3, 'Kurang lebih 1 bulan'),
(22, 500000, 4, 4, 'Kurang lebih 1 bulan'),
(23, 600000, 4, 5, 'Kurang lebih 1 bulan'),
(24, 1000000, 4, 6, 'Kurang lebih 1 bulan'),
(25, 250000, 5, 1, 'Kurang lebih 1 bulan'),
(26, 300000, 5, 2, 'Kurang lebih 1 bulan'),
(27, 350000, 5, 3, 'Kurang lebih 1 bulan'),
(28, 700000, 5, 4, 'Kurang lebih 1 bulan'),
(29, 800000, 5, 5, 'Kurang lebih 1 bulan'),
(30, 1500000, 5, 6, 'Kurang lebih 1 bulan'),
(31, 150000, 6, 1, 'Kurang lebih 1 bulan'),
(32, 200000, 6, 2, 'Kurang lebih 1 bulan'),
(33, 250000, 6, 3, 'Kurang lebih 1 bulan'),
(34, 500000, 6, 4, 'Kurang lebih 1 bulan'),
(35, 600000, 6, 5, 'Kurang lebih 1 bulan'),
(36, 1000000, 6, 6, 'Kurang lebih 1 bulan'),
(37, 225000, 7, 2, 'Kurang lebih 1 bulan'),
(38, 275000, 7, 3, 'Kurang lebih 1 bulan'),
(39, 550000, 7, 4, 'Kurang lebih 1 bulan'),
(40, 650000, 7, 5, 'Kurang lebih 1 bulan'),
(41, 1200000, 7, 6, 'Kurang lebih 1 bulan');

-- --------------------------------------------------------

--
-- Table structure for table `l_ukuran`
--

CREATE TABLE `l_ukuran` (
  `id` int(2) NOT NULL,
  `ukuran` varchar(20) NOT NULL,
  `berat` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `l_ukuran`
--

INSERT INTO `l_ukuran` (`id`, `ukuran`, `berat`) VALUES
(1, '40x50', 1),
(2, '40x60', 1.5),
(3, '50x70', 2),
(4, '100x80', 3),
(5, '80x125', 3.5),
(6, '100x130', 5);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `nama_pengirim` varchar(45) DEFAULT NULL,
  `jumlah_transfer` int(11) DEFAULT NULL,
  `gambar` varchar(45) DEFAULT NULL,
  `penjualan_id` int(11) NOT NULL,
  `pemesanan_id` int(11) NOT NULL,
  `pengiriman_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `invoice` varchar(20) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `pembeli_id` int(11) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `kurir` varchar(20) NOT NULL,
  `layanan` varchar(40) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `invoice`, `tanggal`, `pembeli_id`, `provinsi`, `kabupaten`, `alamat`, `kode_pos`, `kurir`, `layanan`, `ongkir`, `total`, `status`, `gambar`) VALUES
(2, '3551', '2018-07-15', 17, 'Bali', 'Denpasar', 'Denpasar', '67854', 'jne', 'REG(Layanan Reguler)', 39000, 539000, 3, 'gambar-pembelian21.jpg'),
(4, '5696', '2018-07-15', 17, 'Kalimantan Barat', 'Sintang', 'sintang', '23456', 'pos', 'Paketpos Biasa(Paketpos Biasa)', 48500, 748500, 1, 'gambar-pembelian19.jpg'),
(5, '2303', '2018-07-15', 17, 'Jambi', 'Jambi', 'jambi', '67854', 'jne', 'YES(Yakin Esok Sampai)', 370000, 1870000, 2, 'gambar-pembelian20.jpg'),
(8, '7210', '2018-07-15', 17, 'Bali', 'Denpasar', 'Denpasar', '67854', 'jne', 'OKE(Ongkos Kirim Ekonomis)', 33000, 633000, 1, 'gambar-pembelian22.jpg'),
(9, '6871', '2018-07-16', 17, 'Nanggroe Aceh Darussalam (NAD)', 'Aceh Barat', 'Aceh', '3456', 'jne', 'OKE(Ongkos Kirim Ekonomis)', 198000, 698000, 1, 'gambar-pembelian23.jpg'),
(10, '5141', '2018-07-16', 17, 'Lampung', 'Bandar Lampung', 'lampung', '12345', 'pos', 'Paketpos Biasa(Paketpos Biasa)', 27500, 627500, 1, 'gambar-pembelian24.jpg'),
(11, '2897', '2018-07-16', 17, 'Bengkulu', 'Bengkulu', 'bengkulu', '2345', 'jne', 'OKE(Ongkos Kirim Ekonomis)', 87000, 587000, 1, 'gambar-pembelian25.jpg'),
(12, '1560', '2018-07-16', 17, 'Maluku', 'Ambon', 'ambon', '68465', 'jne', 'OKE(Ongkos Kirim Ekonomis)', 450000, 2550000, 1, 'gambar-pembelian26.jpg'),
(13, '4419', '2018-07-16', 17, 'Maluku', 'Ambon', 'ambon', '12345', 'jne', 'OKE(Ongkos Kirim Ekonomis)', 150000, 750000, 2, 'gambar-pembelian28.jpg'),
(14, '9231', '2018-07-26', 17, 'Gorontalo', 'Boalemo', 'Boalemo', '123456', 'jne', 'OKE(Ongkos Kirim Ekonomis)', 198000, 898000, 1, 'gambar-pembelian29.jpg'),
(19, '9328', '2018-08-18', 17, 'Maluku', 'Ambon', 'ambon', '12345', 'pos', 'Paketpos Biasa(Paketpos Biasa)', 41000, 741000, 0, ''),
(20, '8209', '2018-08-18', 17, 'Bali', 'Badung', 'Badung', '23458', 'pos', 'Paketpos Biasa(Paketpos Biasa)', 26000, 626000, 0, ''),
(21, '7856', '2018-08-23', 17, 'Bali', 'Badung', 'badung', '68465', 'pos', 'Paketpos Biasa(Paketpos Biasa)', 26000, 726000, 1, 'gambar-pembelian33.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `invoice` varchar(20) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `ukuran_id` int(5) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `pembeli_id` int(11) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `kurir` varchar(20) NOT NULL,
  `layanan` varchar(40) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `invoice`, `tanggal`, `total`, `ukuran_id`, `kategori_id`, `harga`, `gambar`, `jumlah`, `keterangan`, `pembeli_id`, `provinsi`, `kabupaten`, `alamat`, `kode_pos`, `kurir`, `layanan`, `ongkir`, `status`) VALUES
(1, '6458', '2018-07-15', 406000, 3, 1, 350000, 'gambar-pemesanan4.jpg', 1, 'ada', 17, 'Jawa Barat', 'Subang', 'subang', '2345', 'jne', 'OKE(Ongkos Kirim Ekonomis)', 56000, 2),
(3, '9768', '2018-07-15', 1508000, 5, 3, 1400000, 'gambar-pemesanan3.jpg', 2, 'ada', 17, 'Kalimantan Timur', 'Balikpapan', 'balikpapan', '23456', 'jne', 'OKE(Ongkos Kirim Ekonomis)', 108000, 1),
(4, '9450', '2018-07-16', 217000, 1, 2, 150000, 'gambar-pemesanan5.jpg', 1, 'ada', 17, 'Kalimantan Timur', 'Balikpapan', 'balikpapan', '2345', 'pos', 'Express Next Day Barang(Express Next Day', 67000, 1),
(11, '7936', '2018-07-16', 1204000, 5, 5, 800000, 'gambar-pemesanan6.jpg', 1, 'ada', 17, 'Lampung', 'Bandar Lampung', 'ambon', '68465', 'jne', 'REG(Layanan Reguler)', 404000, 1),
(13, '7248', '2018-07-16', 315000, 3, 2, 250000, 'gambar-pemesanan7.jpg', 1, 'ada', 17, 'Lampung', 'Bandar Lampung', 'lampung', '12345', 'pos', 'Paket Kilat Khusus(Paket Kilat Khusus)', 65000, 1),
(14, '9852', '2018-07-16', 407000, 2, 5, 300000, 'gambar-pemesanan8.jpg', 1, 'ada', 17, 'Sulawesi Tenggara', 'Kolaka', 'kolaka', '3456', 'pos', 'Paket Kilat Khusus(Paket Kilat Khusus)', 107000, 1),
(21, '7657', '2018-07-28', 1465000, 6, 7, 1200000, 'gambar-pemesanan9.jpg', 1, 'tes', 17, 'DKI Jakarta', 'Jakarta Barat', 'jakarta', '68465', 'pos', 'Express Next Day Barang(Express Next Day', 265000, 1),
(22, '1565', '2018-07-30', 275000, 1, 1, 250000, 'gambar-pemesanan10.jpg', 1, 'data', 5, 'Bali', 'Badung', 'Genteng', '68465', 'pos', 'Paket Kilat Khusus(Paket Kilat Khusus)', 25000, 1),
(23, '4624', '2018-07-30', 317000, 1, 1, 250000, 'gambar-pemesanan11.jpg', 1, 'adaaaaa', 5, 'Kalimantan Timur', 'Balikpapan', 'Dsn.Temurejo Ds. Kembiritan', '68465', 'pos', 'Express Next Day Barang(Express Next Day', 67000, 1),
(24, '7898', '2018-07-30', 302500, 1, 1, 250000, 'gambar-pemesanan12.jpg', 1, 'adaadadada', 5, 'Kalimantan Utara', 'Nunukan', 'Genteng', '68465', 'pos', 'Paket Kilat Khusus(Paket Kilat Khusus)', 52500, 1),
(25, '7917', '2018-07-30', 282500, 1, 1, 250000, 'gambar-pemesanan13.jpg', 1, 'ada', 5, 'Lampung', 'Bandar Lampung', 'Genteng', '68465', 'pos', 'Paket Kilat Khusus(Paket Kilat Khusus)', 32500, 2),
(26, '9779', '2018-07-30', 284000, 1, 1, 250000, 'gambar-pemesanan14.jpg', 1, 'adaa', 5, 'Bangka Belitung', 'Bangka', 'Genteng', '68465', 'pos', 'Paket Kilat Khusus(Paket Kilat Khusus)', 34000, 2),
(27, '348', '2018-08-18', 1285000, 6, 3, 1250000, 'gambar-pemesanan15.jpg', 1, 'tambah 1 bayi harimau', 17, 'Jawa Timur', 'Lumajang', 'lumajang', '3456', 'jne', 'OKE(Ongkos Kirim Ekonomis)', 35000, 1),
(28, '8074', '2018-08-18', 1567000, 6, 1, 1500000, 'gambar-pemesanan16.jpg', 1, 'tes', 17, 'Kalimantan Selatan', 'Banjar', 'Badung', '12345', 'pos', 'Paketpos Biasa(Paketpos Biasa)', 67000, 1),
(29, '7071', '2018-08-18', 1725000, 6, 1, 1500000, 'gambar-pemesanan17.jpg', 1, 'wer', 17, 'Kalimantan Tengah', 'Barito Selatan', 'Genteng', '68465', 'pos', 'Paket Kilat Khusus(Paket Kilat Khusus)', 225000, 2),
(30, '9424', '2018-08-23', 1541000, 6, 1, 1500000, 'gambar-pemesanan18.jpg', 1, 'tes', 17, 'Bali', 'Badung', 'Genteng', '12345', 'pos', 'Paketpos Biasa(Paketpos Biasa)', 41000, 1),
(31, '8169', '2018-08-27', NULL, 6, 1, 1500000, 'gambar-gambar57.jpg', 1, 'tes', 17, '', '', '', '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `link` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `teks` text NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `ukuran_id` int(5) DEFAULT NULL,
  `gambar` varchar(45) DEFAULT NULL,
  `kategori_id` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `link`, `tanggal`, `teks`, `harga`, `ukuran_id`, `gambar`, `kategori_id`, `stok`) VALUES
(15, 'Panen Raya', 'panen-raya', '2018-08-17', '<p><span style="color:rgb(58, 58, 58); font-size:17px">Dengan segenap tenaganya para petani memanen padi yang selama ini mereka tanam dan mereka rawat.</span></p>\r\n', 700000, 4, 'Panen_Raya-4763.jpg', 1, 1),
(16, 'Bunga sepatu', 'bunga-sepatu', '2018-08-17', '<p><span style="color:rgb(58, 58, 58); font-size:17px">Lukisan bunga sepatu yang menghiasi dinding rumah&nbsp;sungguh memanjakan mata</span></p>\r\n', 500000, 4, 'bunga_sepatu-1061.jpg', 4, 2),
(17, '9 koi berlafad Allah', '9-koi-berlafad-allah', '2018-09-01', '<p><span style="color:rgb(58, 58, 58); font-size:17px">Menggambarkan kebesaran tuhan, 9 ikan koi yang sedang berenang dengan berlafadkan Allah.</span></p>\r\n', 600000, 4, '9_koi_berlafad_Allah-8353.jpg', 3, 2),
(18, 'Al-Ikhlas', 'alikhlas', '2018-07-15', '', 1500000, 6, 'Al-Ikhlas-8526.jpg', 5, 2),
(19, 'Buah Segar', 'buah-segar', '2018-07-15', '', 500000, 4, 'Buah_Segar-289.jpg', 2, 2),
(20, 'Wali Allah', 'wali-allah', '2018-07-15', '', 250000, 3, 'Wali_Allah-6049.jpg', 6, 2),
(21, 'Bayi kecilku', 'bayi-kecilku', '2018-07-15', '', 275000, 3, 'Bayi_kecilku-5898.jpg', 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` text,
  `teks` text,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `facebook` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `nama`, `deskripsi`, `teks`, `alamat`, `telepon`, `email`, `facebook`, `website`, `gambar`) VALUES
(1, 'Lukisan Store', 'Butik Aficha Melayani penjualan  Busana Bagus  Modern, Aman dan terpercaya.  Butik Aficha bertempat di sanggar kabupaten Banyuwangi.', '<p>Galeri Lukis Cahaya Pelangi&nbsp;merupakan usaha mandiri&nbsp;yang bergerak dibidang Penjualan Lukisan. Yang terletak di Dusun Gantung, Desa Gendoh, RT.01 RW.01, Kecamatan Sempu, Kabupaten Banyuwangi. Didirikan pada tahun 2011&nbsp;oleh pelukis yang bernama Suwito yang biasa dipanggil wito. Ia berprofesi sebagai pelukis sejak SD. Pengalamannya sebagai pelukis sudah cukup banyak, sehingga produk-produk yang diciptakan dipastikan sangat berkualitas dan mengikuti perkembangan zaman terkini. Galeri ini menyediakan lukisan dengan berbagai kategori yaitu: Alam, Buah, Hewan, Bunga, Kaligrafi, Full Body, Sketsa Wajah. Selain itu Galeri Lukis Cahaya Pelangi ini juga menyediakan jasa mural atau biasa disebut melukis diatas media dinding,&nbsp; tembok atau permukaan luas lainnya&nbsp;yang sifatnya permanen. Dan&nbsp;melayani khursus lukis untuk para pelajar, mahasiswa dan masyarakat umum.</p>\r\n', 'Dusun Gantung, Desa Gendoh, RT.01 RW.01, Kecamatan Sempu, Kabupaten Banyuwangi.', '081123456789', 'cahayapelangi@gmail.com', 'Wieto Painter', 'afichastore.com', 'Lukisan_Store-4761.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `group_id` int(11) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `group_id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `gambar`) VALUES
(1, 1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1535762043, 1, 'Admin', 'istrator', 'Kembiritan - Banyuwangi', '081123456789', 'Admin-854.jpeg'),
(5, 2, '::1', 'kursuswebid@gmail.com', '$2y$08$XLnxKjZiNfoma3cwoEuL6utxJTB4nOC/A1QPL7M/wCLgeqiZ0Q7cS', NULL, 'kursuswebid@gmail.com', 'da7adf88ab205919773ca1a54c6461720e0ba650', NULL, NULL, NULL, 1529103243, 1532923926, 1, 'Yulia', 'Oktavianti', 'Srono - Banyuwangi', '081123456789', ''),
(13, 2, '::1', 'edisiswanto.ti8.poliwangi@gmail.com', '$2y$08$sYV4K146yJAIPDWeZiClq.YUEx9JKssPDgLrJerkM7ddFn69cNFVm', NULL, 'edisiswanto.ti8.poliwangi@gmail.com', NULL, NULL, NULL, NULL, 1529990828, 1529990891, 1, 'edisis', 'wanto', 'toyamas - banyuwangi', '081123456789', ''),
(16, 1, '::1', 'edi@mail.com', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', NULL, 'edi@mail.com', NULL, NULL, NULL, NULL, 0, 1530896730, 1, 'edi', NULL, NULL, NULL, ''),
(17, 2, '::1', 'ayunuroktavianti.ti8.poliwangi@gmail.com', '$2y$08$twgHTBX8E8loR7aHKTJzD.sXGTH0JfI2Rd1.5Uf5oXeytTh/uoxPa', NULL, 'ayunuroktavianti.ti8.poliwangi@gmail.com', NULL, NULL, NULL, NULL, 1531639854, 1535339498, 1, 'Ayu', 'Nur', 'Genteng-Banyuwangi', '087802123331', ''),
(18, 2, '::1', 'dwinur@gmail.com', '$2y$08$jBJ9vQ2aaxgFueZClABQ2.vlFO/EQfCfvrWB9oXPyQI2FYRvmRiDK', NULL, 'dwinur@gmail.com', 'bbfb5ae1a68206d937fb5fc9c508bac08fa2aaa4', NULL, NULL, NULL, 1534531940, NULL, 0, 'Dwi', 'Nur', 'Sanggar-Banyuwangi', '087802123331', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(6, 5, 2),
(14, 13, 2),
(15, 17, 2),
(16, 18, 2);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `nama` varchar(110) NOT NULL,
  `link` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `nama`, `link`) VALUES
(1, 'ada', 'ada-1296.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detailpembelian`
--
ALTER TABLE `detailpembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `l_harga`
--
ALTER TABLE `l_harga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `l_ukuran`
--
ALTER TABLE `l_ukuran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`) USING BTREE;

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `detailpembelian`
--
ALTER TABLE `detailpembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `l_harga`
--
ALTER TABLE `l_harga`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `l_ukuran`
--
ALTER TABLE `l_ukuran`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
