-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 26, 2021 at 01:58 AM
-- Server version: 10.4.14-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u942710605_sihukum`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(40) DEFAULT NULL,
  `level` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `nama` varchar(100) NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `level`, `created_at`, `nama`, `kontak`, `alamat`) VALUES
(1, 'admin', 'e804d27d903eb1c3bd922cb01bfffed8', 'admin', '2020-12-26 07:00:58', 'Administrator', '1234', 'Makassar');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `permalink` text NOT NULL,
  `judul_berita` varchar(100) NOT NULL,
  `kategori_berita` enum('Hukum','Politik','Teknologi','Umum') NOT NULL,
  `penulis_berita` varchar(40) NOT NULL,
  `isi_berita` text NOT NULL,
  `hari_berita` enum('Senin','Selasa','Rabu','Kamis','Jum''at','Sabtu','Minggu') DEFAULT NULL,
  `tanggal_berita` date DEFAULT NULL,
  `foto_berita` varchar(100) DEFAULT NULL,
  `status_berita` enum('Publish','Unpublish') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `permalink`, `judul_berita`, `kategori_berita`, `penulis_berita`, `isi_berita`, `hari_berita`, `tanggal_berita`, `foto_berita`, `status_berita`) VALUES
(20, 'kalimat-lorem-lpsum', 'Kalimat Lorem Ipsumaaaaaaaaaaaa', 'Hukum', 'Si A', '<p></p><div style=\"text-align: justify;\"><span style=\"color: rgb(51, 51, 51); font-family: CNNSansW04-Regular, Arial, Helvetica, Tahoma; font-size: 0.875rem;\">Lorem ipsum pertama kali dipakai saat seorang tukang cetak yang tak dikenal mengambil sebuah kumpulan teks. Dia mengacak teks tersebut menjadi sebuah buku contoh huruf.</span></div><div style=\"text-align: justify;\"><span style=\"font-size: 0.875rem; color: rgb(51, 51, 51); font-family: CNNSansW04-Regular, Arial, Helvetica, Tahoma;\">Namun teks ini baru populer pada 1960 dengan diluncurkannya lembaran letraset yang menggunakan kalimat tersebut. Popularitasnya makin menanjak seiring munculnya software publishing di komputer dekstop.</span></div><span style=\"color: rgb(51, 51, 51); font-family: CNNSansW04-Regular, Arial, Helvetica, Tahoma;\"><div style=\"text-align: justify;\"><span style=\"font-size: 0.875rem;\">Menurut seorang profesor bahasa latin dari Hampden-Sidney College di Virginia, Richard McClintock, kalimat ini disinyalir diambil dari dalam naskah karya sastra latin klasik yang ditulis oleh Cicero, de Finibus Bonorum et Malorum (sisi Ekstrem dari kebaikan dan kejahatan).</span></div></span><span style=\"color: rgb(51, 51, 51); font-family: CNNSansW04-Regular, Arial, Helvetica, Tahoma;\"><div style=\"text-align: justify;\"><span style=\"font-size: 0.875rem;\">Hanya saja dalam penggunaannya sekarang, teks lipsum memiliki sedikit perbedaan dengan yang ada dalam naskah asli CIcero.</span></div><div style=\"text-align: justify;\"><span style=\"font-size: 0.875rem;\"><br></span></div></span><span style=\"color: rgb(51, 51, 51); font-family: CNNSansW04-Regular, Arial, Helvetica, Tahoma;\"><div style=\"text-align: justify;\"><span style=\"font-size: 0.875rem;\">Saat ini, teks yang digunakan adalah:</span></div></span><em style=\"-webkit-font-smoothing: antialiased; backface-visibility: hidden; color: rgb(51, 51, 51); font-family: CNNSansW04-Regular, Arial, Helvetica, Tahoma;\"><div style=\"text-align: justify;\"><em style=\"font-size: 0.875rem; -webkit-font-smoothing: antialiased; backface-visibility: hidden;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</em></div></em><div style=\"text-align: justify;\"><font color=\"#333333\" face=\"CNNSansW04-Regular, Arial, Helvetica, Tahoma\"><br></font></div><span style=\"color: rgb(51, 51, 51); font-family: CNNSansW04-Regular, Arial, Helvetica, Tahoma;\"><div style=\"text-align: justify;\"><span style=\"font-size: 0.875rem;\">Dalam bahasa Indonesia, teks tersebut diterjemahkan dengan:</span></div></span><span style=\"color: rgb(51, 51, 51); font-family: CNNSansW04-Regular, Arial, Helvetica, Tahoma;\"><div style=\"text-align: justify;\"><span style=\"font-size: 0.875rem;\">\"</span><em style=\"font-size: 0.875rem; -webkit-font-smoothing: antialiased; backface-visibility: hidden;\">Demikian pula, tidak adakah orang yang mencintai atau mengejar atau ingin mengalami penderitaan, bukan semata-mata karena penderitaan itu sendiri, tetapi karena sesekali terjadi keadaan di mana susah-payah dan penderitaan dapat memberikan kepadanya kesenangan yang besar. Sebagai contoh sederhana, siapakah di antara kita yang pernah melakukan pekerjaan fisik yang berat, selain untuk memperoleh manfaat daripadanya? Tetapi siapakah yang berhak untuk mencari kesalahan pada diri orang yang memilih untuk menikmati kesenangan yang tidak menimbulkan akibat-akibat yang mengganggu, atau orang yang menghindari penderitaan yang tidak menghasilkan kesenangan?\"</em></div></span><div style=\"text-align: justify;\"><font color=\"#333333\" face=\"CNNSansW04-Regular, Arial, Helvetica, Tahoma\"><br></font></div><span style=\"color: rgb(51, 51, 51); font-family: CNNSansW04-Regular, Arial, Helvetica, Tahoma;\"><div style=\"text-align: justify;\"><span style=\"font-size: 0.875rem;\">Kalimat dalam bahasa Inggris tersebut diterjemahkan oleh H. Rackham.</span></div></span><div style=\"text-align: justify;\"><font color=\"#333333\" face=\"CNNSansW04-Regular, Arial, Helvetica, Tahoma\"><br></font></div><span style=\"color: rgb(51, 51, 51); font-family: CNNSansW04-Regular, Arial, Helvetica, Tahoma;\"><div style=\"text-align: justify;\"><span style=\"font-size: 0.875rem;\">Mengapa dipakai jadi teks standar?</span></div></span><div style=\"text-align: justify;\"><font color=\"#333333\" face=\"CNNSansW04-Regular, Arial, Helvetica, Tahoma\"><br></font></div><span style=\"color: rgb(51, 51, 51); font-family: CNNSansW04-Regular, Arial, Helvetica, Tahoma;\"><div style=\"text-align: justify;\"><span style=\"font-size: 0.875rem;\">Ada alasan mengapa teks ini dijadikan sebagai menjadi sebuah naskah standar layout desain. Pasalnya teks ini memiliki penyebaran huruf normal dan merata. Teks ini juga diibaratkan sebagai sebuah naskah bahasa Inggris yang bisa dibaca dan punya arti.</span></div></span><div style=\"text-align: justify;\"><font color=\"#333333\" face=\"CNNSansW04-Regular, Arial, Helvetica, Tahoma\"><br></font></div><span style=\"color: rgb(51, 51, 51); font-family: CNNSansW04-Regular, Arial, Helvetica, Tahoma;\"><div style=\"text-align: justify;\"><span style=\"font-size: 0.875rem;\">Teks Lorem Ipsum sendiri bukanlah sebuah teks acak tanpa makna dan fungsi.</span></div></span><div style=\"text-align: justify;\"><font color=\"#333333\" face=\"CNNSansW04-Regular, Arial, Helvetica, Tahoma\"><br></font></div><span style=\"color: rgb(51, 51, 51); font-family: CNNSansW04-Regular, Arial, Helvetica, Tahoma;\"><div style=\"text-align: justify;\"><span style=\"font-size: 0.875rem;\">Teks ini berfungsi untuk menghindari terganggunya fokus atau perhatian seseorang ketika sedang membuat layout desain. Dengan teks ini mereka diharapkan tak akan memperhatikan isi teks lipsum yang panjang. Teks lorem ipsum ini hanyalah </span><em style=\"font-size: 0.875rem; -webkit-font-smoothing: antialiased; backface-visibility: hidden;\">dummy</em><span style=\"font-size: 0.875rem;\"> (contoh). </span><b style=\"font-size: 0.875rem; font-weight: bold; -webkit-font-smoothing: antialiased; backface-visibility: hidden;\">(chs/chs)</b></div></span><p></p>', 'Selasa', '2020-09-07', 'lorem.png', 'Publish');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_pmohon` int(100) NOT NULL,
  `id_kasus` int(100) NOT NULL,
  `nm_pmohon` varchar(50) NOT NULL,
  `jd_kasus` varchar(100) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `tgl_jadwal` date NOT NULL,
  `id_kontan` int(100) NOT NULL,
  `nm_kontan` varchar(50) NOT NULL,
  `departemen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_pmohon`, `id_kasus`, `nm_pmohon`, `jd_kasus`, `hari`, `tgl_jadwal`, `id_kontan`, `nm_kontan`, `departemen`) VALUES
(59, 55, 43, 'Wahyudin Nur', 'Kasus Suap ', 'Selasa', '2020-12-28', 2, 'Maxi Sondakh ', 'Sekretaris'),
(61, 61, 48, 'Ardy Putra', 'Pemabuk Di RW 000 Meresahkan', 'Kamis', '2020-12-31', 7, 'Burhan Kamma M., S.H., M.H.', 'Dept. Bankum & Pemb. Perkara'),
(62, 60, 49, 'Indah Puspita Sari', 'Kasus Waris', 'Selasa', '2018-11-27', 1, 'Andi Walinga Yahya, S.H.', 'Ketua Umum');

-- --------------------------------------------------------

--
-- Table structure for table `kasus`
--

CREATE TABLE `kasus` (
  `id_kasus` int(11) NOT NULL,
  `id_pmohon` int(100) NOT NULL,
  `nm_pmohon` varchar(50) NOT NULL,
  `jd_kasus` varchar(100) NOT NULL,
  `dk_kasus` text NOT NULL,
  `bk_kasus` varchar(250) NOT NULL,
  `tgl_kasus` date NOT NULL,
  `st_kasus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kasus`
--

INSERT INTO `kasus` (`id_kasus`, `id_pmohon`, `nm_pmohon`, `jd_kasus`, `dk_kasus`, `bk_kasus`, `tgl_kasus`, `st_kasus`) VALUES
(43, 55, 'Wahyudin Nur', 'Kasus Suap ', 'Penyuapan (atau suap saja) adalah tindakan memberikan uang, barang atau bentuk lain dari pembalasan dari pemberi suap kepada penerima suap yang dilakukan untuk mengubah sikap penerima atas kepentingan/minat si pemberi, walaupun sikap tersebut berlawanan dengan penerima.', 'suap.jpg', '2020-12-25', 'Disetujui'),
(44, 55, 'Wahyudin Nur', 'Kasus Sengketa Tanah', 'Penyelesaian sengketa adalah suatu penyelesaian perkara yang dilakukan antara salah satu pihak dengan pihak yang lainnya. Penyelesaian sengketa terdiri dari dua cara yaitu melalui litigasi (pengadilan) dan non litigasi (luar pengadilan). Dalam proses penyelesaian sengketa melalui litigasi merupakan sarana terakhir (ultimum remidium) bagi para pihak yang bersengketa setelah proses penyelesaian melalui non litigasi tidak membuahkan hasil.', 'sengketa.jpg', '2014-03-02', 'Disetujui'),
(48, 61, 'Ardy Putra', 'Pemabuk Di RW 000 Meresahkan', 'Pemabuk Di RW 000 Meresahkan sekitar, bahkan saya dipukul sewaktu lewat, saya apakah bisa dibantu untuk melakukan laporan penganiyaan? mohon kesediaannya', 'mabuk.jpg', '2020-12-20', 'Ditolak'),
(49, 60, 'Indah Puspita Sari', 'Kasus Waris', 'Perempuan berusia 78 tahun bernama Cicih warga Jalan Embah Jaksa Kecamatan 01 Kota A. Merupakan tetangga yang sedang mempunyai permasalahn terkait tanah waris yang mau di infaqkan untuk pembangunan. tapi muncul seseorang tak dikenal hingga melakukan perusakan pada rumah dari nenek tersbut. apakah bisa dibantu?\r\n', 'waris.jpg', '2018-02-20', 'Disetujui'),
(50, 68, 'Achmad Fachrul', 'KECELAKAAN LALULINTAS', 'Peristiwa kecelakaan tersebut terjadi pada 1 Agustus 2020 sekitar pukul 02.55 WIB, Pelaku melarikan diri. Harap Bantuannya\r\n', '2397776504.jpg', '2020-08-01', 'Disetujui'),
(51, 70, 'Muhammad Nasir Dg. Pabilla', 'Kasus Perkebunan', 'Waktu itu kami dibagi kelompok, kelompok saya ada 105 keluarga. Satu keluarga dikasi lahan garapan dua hektar. Itulah yang kami kelola.', 'sert_tanah.jpg', '2019-10-08', 'Disetujui'),
(52, 75, 'Pemohon Satu', 'Warisan Keluarga', 'Warisan adalah peninggalan yang ditinggalkan pewaris kepada ahli waris. Waris dalam pengertian bahasa Indonesia kebanyakan tidaklah sama dengan waris dalam islam. Waris dalam budaya arab & Islam memiliki makna yang lebih luas.', 'images (17).jpeg', '2021-06-09', 'Disetujui'),
(53, 75, 'Pemohon Satu', 'Tanah perkebunan', 'Tessss', 'images (18).jpeg', '2021-06-08', 'Diajukan');

-- --------------------------------------------------------

--
-- Table structure for table `konsultan`
--

CREATE TABLE `konsultan` (
  `id_kontan` int(11) NOT NULL,
  `level` varchar(100) NOT NULL,
  `nik` bigint(30) DEFAULT NULL,
  `nm_kontan` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tp_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') NOT NULL,
  `agama` varchar(40) NOT NULL,
  `departemen` varchar(100) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsultan`
--

INSERT INTO `konsultan` (`id_kontan`, `level`, `nik`, `nm_kontan`, `alamat`, `tp_lahir`, `tgl_lahir`, `jk`, `agama`, `departemen`, `foto`, `username`, `password`) VALUES
(1, 'konsultan', 7371071106790001, 'Andi Walinga Yahya, S.H.', 'Jl. Pallangga', '', '2020-06-30', 'Laki-Laki', 'Islam', 'Ketua Umum', 'b-1.png', 'andiwalinga', '37f8f2020c3b9251a4c9e918730fc866'),
(2, 'konsultan', 7371071465790001, 'Maxi Sondakh ', 'Jl. Beruang', 'Ujung Pandang', '2020-11-23', 'Laki-Laki', '', 'Sekretaris', 'maxi.jpg', 'maxi', 'd197d50e9453f5107af377ca8729684d'),
(4, 'konsultan', 7371043056690002, 'Efandi Ali ', '', '', '2020-11-02', 'Laki-Laki', '', 'Bendahara', 'user.png', 'efandi', '484b2e35acd06568893b4dac5d862f67'),
(7, 'konsultan', 7371072308780001, 'Burhan Kamma M., S.H., M.H.', '', '', '1968-11-01', 'Laki-Laki', 'Islam', 'Dept. Bankum & Pemb. Perkara', 'man.jpg', 'burhan', '484b2e35acd06568893b4dac5d862f67'),
(8, 'konsultan', 7371115412690003, 'Andi Sainal Walinono, S.H.', '', '', '2020-11-01', 'Laki-Laki', '', 'Dept. Reclasseering & HAM ', 'user.png', 'sainal', 'f56b53e412e87751f665cb9f9061e50b'),
(9, 'konsultan', 7371113412610003, 'Johny F. Tehwuh', '', '', '2020-11-01', 'Laki-Laki', '', 'Dept. Intelijen Masyarakat', 'user.png', 'johny', '484b2e35acd06568893b4dac5d862f67'),
(10, 'konsultan', 7371117610580006, 'Yakobus', '', '', '2020-11-01', 'Laki-Laki', '', 'Dept. Investigasi & Monitoring', 'user.png', 'yakobus', '484b2e35acd06568893b4dac5d862f67'),
(11, 'konsultan', 7371113612710002, 'Fransiscus Alexander, S.E.', '', '', '2020-11-01', 'Laki-Laki', '', 'Dept. Wirausaha & Tenaga Kerja', 'user.png', 'fransiscus', '484b2e35acd06568893b4dac5d862f67'),
(12, 'konsultan', 7371111011870001, 'Akhmad Yani, S.H.', '', '', '2020-11-01', 'Laki-Laki', '', 'Dept. Teknologi & Informatika', 'user.png', 'akhmad', '484b2e35acd06568893b4dac5d862f67'),
(14, 'konsultan', 7371111112710002, 'Selfiani S.Pd', '', '', '2020-11-01', 'Perempuan', '', 'Dept. Pemb.  & Perlindungan Anak', 'user.png', 'selfiani', '484b2e35acd06568893b4dac5d862f67'),
(15, 'konsultan', 737359987970002, 'Muh. Nasri', '', '', '2020-11-01', 'Laki-Laki', '', 'Dept. Lingk. Hidup & SDA', 'user.png', 'nasri', '0ec4bdd4d854f50cc3f6bdcd1a97ca60'),
(16, 'konsultan', 73767867860001, 'Sulaeman Situju H.', '', '', '2020-11-01', 'Laki-Laki', '', 'Dept. SDM & Teknologi', 'user.png', 'sulaeman', 'cdbb3ceb3a9ca73bd12dc4c85e044365'),
(17, 'konsultan', 767454565450002, 'M. Nur Garaki', '', '', '2020-11-01', 'Laki-Laki', '', 'Dept. Organisasi & Kaderisasi', 'user.png', 'garaki', '6ea83d55ae76f7e53c4b877dc98ef145'),
(18, 'konsultan', 7271103260630002, 'Ir. Baharuddin Andi', '', '', '2020-11-01', 'Laki-Laki', '', 'Dept. Pemerintahan & Otonomi Daerah', 'user.png', 'baharuddin', '484b2e35acd06568893b4dac5d862f67'),
(20, 'konsultan', 8767756324240001, 'A. Mappatunru', '', '', '2020-11-01', 'Laki-Laki', '', 'Dept. humas & Kerja Sama Lembaga ', 'user.png', 'mappatunru', '0a07252c74d5126ec3e59ffd44416054'),
(21, 'konsultan', 421321312312312312, 'Junaedy', '', '', '2020-11-01', 'Laki-Laki', '', 'Dept. Pers & Media Informasi', 'user.png', 'junaedy', 'dc138bc49ba352fa3ac075ba0c526cde'),
(22, 'konsultan', 7370022463840003, 'Topan R.', '', '', '2020-11-01', 'Laki-Laki', '', 'Dept. Pendidikan, Kesehatan & Sosbud', 'user.png', 'topan', '484b2e35acd06568893b4dac5d862f67'),
(23, 'konsultan', 7371102209540001, 'Djamaluddin Lawe', '', '', '2020-11-01', 'Laki-Laki', '', 'Dept. Kerohanian & Mental Spiritual', 'user.png', 'lawe', '484b2e35acd06568893b4dac5d862f67'),
(24, 'konsultan', 7371115612630016, 'Rukli Rasyid', '', '', '2020-11-02', 'Laki-Laki', '', 'Dept. Pertanahan & Reformasi Agraria', 'user.png', 'rukli', '484b2e35acd06568893b4dac5d862f67'),
(55, 'konsultan', 7301032106980001, 'Yudi', '', '', '1998-06-21', 'Laki-Laki', '', 'Operator', 'wahyu.jpg', 'nur', '74c4ea2f797d5fa88568b043b5186863');

-- --------------------------------------------------------

--
-- Table structure for table `pemohon`
--

CREATE TABLE `pemohon` (
  `id_pmohon` int(11) NOT NULL,
  `level` varchar(100) NOT NULL,
  `nik` bigint(30) DEFAULT NULL,
  `nm_pmohon` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tp_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(100) NOT NULL,
  `agama` varchar(40) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemohon`
--

INSERT INTO `pemohon` (`id_pmohon`, `level`, `nik`, `nm_pmohon`, `alamat`, `tp_lahir`, `tgl_lahir`, `jk`, `agama`, `pekerjaan`, `foto`, `username`, `password`) VALUES
(55, 'pemohon', 7301032106980001, 'Wahyudin Nur', 'Mallengkeri', 'Bontodatara', '1998-06-21', 'Laki-Laki', 'Islam', 'Mahasiswa', 'wahyu.jpg', 'wahyu', 'bed271e062c2e06969f962bc976dad5f'),
(58, 'pemohon', 7370980919000121, 'Nasrun Nur', '', 'Ujung Pandang', '1982-07-02', 'Laki-Laki', '', 'Wiraswasta', 'user.png', 'nasrun', '841a6352c849e89beb6087eca7fe7add'),
(60, 'pemohon', 7301030102220001, 'Indah Puspita Sari', '', 'Selayar', '2000-02-22', 'Perempuan', '', 'Pelajar', 'user.png', 'indah', 'e27eb90775de3160a58a7a5a11109d7b'),
(63, 'pemohon', 7371070108520001, 'Purnama', '', 'Ujung Pandang', '1952-08-01', 'Perempuan', '', 'Wiraswasta', 'b-3.png', 'sari', '841a6352c849e89beb6087eca7fe7add'),
(64, 'pemohon', 7301010304550002, 'Muhammad Ardy Rustamto', '', 'Palopo', '1955-04-05', 'Laki-Laki', '', 'Wiraswasta', 'b-3.png', 'rustamto', '841a6352c849e89beb6087eca7fe7add'),
(65, 'pemohon', 7301020512910002, 'Nurul Fadhila', '', 'Antang', '1991-05-02', 'Perempuan', '', 'Pelajar/Mahasiswa', 'b-3.png', 'fadhila', '841a6352c849e89beb6087eca7fe7add'),
(66, 'pemohon', 7301012308640001, 'Basri A.', '', 'Pattallassang', '1964-08-23', 'Laki-Laki', '', 'Petani', 'b-3.png', 'basri', '841a6352c849e89beb6087eca7fe7add'),
(67, 'pemohon', 7371075205120002, 'Ramdjan S', '', 'Ujung Pandang', '1962-12-05', 'Laki-Laki', '', 'Wiraswasta', 'b-3.png', 'ramdjan', '841a6352c849e89beb6087eca7fe7add'),
(68, 'pemohon', 7371075601980002, 'Achmad Fachrul', 'Antang', 'Palopo', '1998-01-06', 'Laki-Laki', 'Islam', 'Pelajar/Mahasiswa', 'b-3.png', 'fachrul', '841a6352c849e89beb6087eca7fe7add'),
(69, 'pemohon', 7371100604760001, 'Syahrir', '', 'Ujung Pandang', '1976-06-04', 'Laki-Laki', '', 'Wiraswasta', 'b-3.png', 'syahrir', '37f8f2020c3b9251a4c9e918730fc866'),
(70, 'pemohon', 7371072203680002, 'Muhammad Nasir Dg. Pabilla', 'Malili', 'Luwu', '1968-03-22', 'Laki-Laki', 'Islam', 'Petani', 'b-3.png', 'nasirpabilla', '841a6352c849e89beb6087eca7fe7add'),
(71, 'pemohon', 7300000000000000, 'Oktaviani', '', 'Makassar', '1998-06-08', 'Perempuan', '', 'Mahasiswa', 'b-3.png', 'okta', 'e27eb90775de3160a58a7a5a11109d7b'),
(72, 'pemohon', 7301114105750001, 'Julia E Sah Latua', '', 'Ujung Pandang', '1972-02-15', 'Perempuan', '', 'IRT', 'b-3.png', 'julia', '61c1df24c77c4cad915a0a9b808f0eb9'),
(73, 'pemohon', 7371113126820002, 'M Alief Yanto', '', 'Gowa', '1992-03-11', 'Laki-Laki', '', 'Petani', 'b-3.png', 'alifyanto', 'e27eb90775de3160a58a7a5a11109d7b'),
(74, 'pemohon', 2245566777777777, 'ICT Center', '', 'Makassar', '2021-06-02', 'Laki-Laki', '', 'Wiraswasta', 'IMG_20210607_011109_063.jpg', 'ictcenter', '195092107ed5b1c5d8434a725a7c63e6'),
(75, 'pemohon', 1122334455661212, 'Pemohon Satu', '', 'Makassar', '2020-11-01', 'Laki-Laki', '', 'Wiraswasta', 'b-3.png', 'Pemohon1', '6535a6f4e8c753511b69763bf69079e9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `kasus`
--
ALTER TABLE `kasus`
  ADD PRIMARY KEY (`id_kasus`);

--
-- Indexes for table `konsultan`
--
ALTER TABLE `konsultan`
  ADD PRIMARY KEY (`id_kontan`);

--
-- Indexes for table `pemohon`
--
ALTER TABLE `pemohon`
  ADD PRIMARY KEY (`id_pmohon`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `kasus`
--
ALTER TABLE `kasus`
  MODIFY `id_kasus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `konsultan`
--
ALTER TABLE `konsultan`
  MODIFY `id_kontan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `pemohon`
--
ALTER TABLE `pemohon`
  MODIFY `id_pmohon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
