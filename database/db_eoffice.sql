-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2019 at 04:20 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_eoffice`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bagian`
--

CREATE TABLE `tb_bagian` (
  `Kode_bagian` varchar(5) NOT NULL,
  `Nama_bagian` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bagian`
--

INSERT INTO `tb_bagian` (`Kode_bagian`, `Nama_bagian`) VALUES
('I', 'Bidang Destinasi Pariwisata'),
('II', 'Bidang Sumber Daya Pariwisata'),
('III', 'Bidang Pemasaran Pariwisata'),
('IV', 'Bidang Industri Pariwisata'),
('V', 'Sekretaris'),
('VI', 'Kepala Dinas'),
('VII', 'Sub Bagian Umum');

-- --------------------------------------------------------

--
-- Table structure for table `tb_disposisi`
--

CREATE TABLE `tb_disposisi` (
  `No_urut_disposisi` int(11) NOT NULL,
  `Kode_surat` varchar(5) NOT NULL,
  `Tanggal_penyelesaian_disposisi` date NOT NULL,
  `Nomor_surat_masuk` varchar(40) NOT NULL,
  `Tanggal_surat` date NOT NULL,
  `Asal_surat` varchar(40) NOT NULL,
  `Kode_bagian` varchar(5) NOT NULL,
  `Disposisi` varchar(30) NOT NULL,
  `Perihal` varchar(40) NOT NULL,
  `Catatan` varchar(100) NOT NULL,
  `Status_disposisi` varchar(40) NOT NULL,
  `No` int(11) NOT NULL,
  `No_urut_sekretaris` int(11) NOT NULL,
  `No_urut_kadis` int(11) NOT NULL,
  `No_urut_bidang` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_disposisi`
--

INSERT INTO `tb_disposisi` (`No_urut_disposisi`, `Kode_surat`, `Tanggal_penyelesaian_disposisi`, `Nomor_surat_masuk`, `Tanggal_surat`, `Asal_surat`, `Kode_bagian`, `Disposisi`, `Perihal`, `Catatan`, `Status_disposisi`, `No`, `No_urut_sekretaris`, `No_urut_kadis`, `No_urut_bidang`) VALUES
(2, '005', '2018-05-24', 'B-020/6.2/LPSK/2/2018', '2018-05-26', 'Lembaga Perlindungan Saksi dan Program', 'III', 'Untuk diketahui dan dipelajari', 'Permohonan Narasumber', 'S.Kasi P.SDP Tindak Lanjut', 'terima bidang', 2, 2, 2, 3),
(3, '500', '2018-05-24', '091.1/5129/apr.org', '2018-05-19', 'Sekretariat Daerah', 'III', 'Untuk diketahui dan dipelajari', 'Jadwal Apel Disiplin Tahun 2018', 'P. Kasi Pemasaran Pariwisata Tindak Lanjut', 'terima bidang', 3, 3, 3, 2),
(1, '005', '2018-05-24', '04/e/MABXII/FADBali/IV/2018', '2018-04-24', 'Jegeg Bagus Bali', 'II', 'Harap diwakili', 'Undangan Grand Final Pemilihan Duta Anak', 'S.Kasi P.SDP Hadiri bersama', 'terima bidang', 1, 1, 1, 1),
(4, '500', '2018-05-25', '499/G5.16/TU/2018', '2018-05-03', 'Kementrian pendidikan dan kebudayaan bal', 'II', 'Harap diwakili', 'Undangan Diskusi Kebahasan', 'S.Kasi P.SDP Hadiri bersama', 'terima bidang', 4, 4, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_surat`
--

CREATE TABLE `tb_jenis_surat` (
  `Id_jenis_surat` varchar(5) NOT NULL,
  `Nama_jenis_surat` varchar(50) NOT NULL,
  `Surat` varchar(20) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenis_surat`
--

INSERT INTO `tb_jenis_surat` (`Id_jenis_surat`, `Nama_jenis_surat`, `Surat`, `Status`) VALUES
('sk1', 'Surat Keluar ', 'surat keluar', 'aktif'),
('sk2', 'Surat Perintah Tugas', 'surat keluar', 'aktif'),
('sk3', 'Nota Dinas', 'Surat Keluar', 'aktif'),
('sm1', 'Dinas', 'Surat Masuk', 'aktif'),
('sm2', 'Undangan', 'Surat Masuk', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_notif`
--

CREATE TABLE `tb_notif` (
  `id` int(11) NOT NULL,
  `asal_hak_akses` varchar(50) NOT NULL,
  `tujuan_hak_akses` varchar(50) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `id_disposisi` int(11) NOT NULL,
  `tanggal_notif` date NOT NULL,
  `Status` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_notif`
--

INSERT INTO `tb_notif` (`id`, `asal_hak_akses`, `tujuan_hak_akses`, `judul`, `id_disposisi`, `tanggal_notif`, `Status`) VALUES
(74, 'Kepala Dinas', 'SDP', 'Undangan Diskusi Kebahasan', 4, '0000-00-00', 'terbaca'),
(73, 'Sekretaris', 'Kepala Dinas', 'Undangan Diskusi Kebahasan', 4, '0000-00-00', 'terbaca'),
(72, 'Sub Bagian Umum', 'Sekretaris', 'Undangan Diskusi Kebahasan', 4, '0000-00-00', 'terbaca'),
(71, 'Kepala Dinas', 'SDP', 'Jadwal Apel Disiplin Tahun 2018', 3, '0000-00-00', 'terbaca'),
(70, 'Kepala Dinas', 'SDP', 'Permohonan Narasumber', 2, '0000-00-00', 'terbaca'),
(69, 'Sekretaris', 'Kepala Dinas', 'Jadwal Apel Disiplin Tahun 2018', 3, '0000-00-00', 'terbaca'),
(68, 'Sub Bagian Umum', 'Sekretaris', 'Jadwal Apel Disiplin Tahun 2018', 3, '0000-00-00', 'terbaca'),
(67, 'Sekretaris', 'Kepala Dinas', 'Permohonan Narasumber', 2, '0000-00-00', 'terbaca'),
(66, 'Sub Bagian Umum', 'Sekretaris', 'Permohonan Narasumber', 2, '0000-00-00', 'terbaca'),
(65, 'Kepala Dinas', 'SDP', 'Undangan Grand Final Pemilihan Duta Anak', 1, '0000-00-00', 'terbaca'),
(64, 'Sekretaris', 'Kepala Dinas', 'Undangan Grand Final Pemilihan Duta Anak', 1, '0000-00-00', 'terbaca'),
(63, 'Sub Bagian Umum', 'Sekretaris', 'Undangan Grand Final Pemilihan Duta Anak', 1, '0000-00-00', 'terbaca'),
(62, 'Kepala Dinas', 'SDP', 'kuda', 12, '0000-00-00', 'terbaca'),
(61, 'Sekretaris', 'Kepala Dinas', 'kuda', 12, '0000-00-00', 'terbaca'),
(60, 'Sub Bagian Umum', 'Sekretaris', 'kuda', 12, '0000-00-00', 'terbaca'),
(59, 'Kepala Dinas', 'SDP', 'sapi', 11, '0000-00-00', 'terbaca'),
(58, 'Sekretaris', 'Kepala Dinas', 'sapi', 11, '0000-00-00', 'terbaca'),
(57, 'Sub Bagian Umum', 'Sekretaris', 'sapi', 11, '0000-00-00', 'terbaca'),
(56, 'Kepala Dinas', 'SDP', 'axax', 10, '0000-00-00', 'terbaca'),
(55, 'Sekretaris', 'Kepala Dinas', 'axax', 10, '0000-00-00', 'terbaca'),
(53, 'Kepala Dinas', 'SDP', 'xxx', 9, '0000-00-00', 'terbaca'),
(54, 'Sub Bagian Umum', 'Sekretaris', 'axax', 10, '0000-00-00', 'terbaca'),
(52, 'Sekretaris', 'Kepala Dinas', 'xxx', 9, '0000-00-00', 'terbaca'),
(51, 'Sub Bagian Umum', 'Sekretaris', 'xxx', 9, '0000-00-00', 'terbaca');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `NIP` varchar(18) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Alamat` text NOT NULL,
  `Hak_akses` varchar(30) NOT NULL,
  `Kode_bagian` varchar(50) NOT NULL,
  `No_telepon` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`NIP`, `Password`, `Nama`, `Alamat`, `Hak_akses`, `Kode_bagian`, `No_telepon`) VALUES
('140030363', '827ccb0eea8a706c4c34a16891f84e7b', 'Alit Arya Subagia, SE.,M.Si', 'Jalan Lembu Sura Denpasar', 'Sub Bagian Umum', 'VII', '085738174261'),
('140030399', '827ccb0eea8a706c4c34a16891f84e7b', 'Wardawan1', 'Denpasar', 'Sekretaris', 'V', '085738174261'),
('140030353', '827ccb0eea8a706c4c34a16891f84e7b', 'A.A. Gede Yuniartha Putra, SH,', 'Tabanan', 'Kepala Dinas', 'VI', '085738174261'),
('140030343', '827ccb0eea8a706c4c34a16891f84e7b', 'Ni Nyoman Ayu Andriani,SH,MH', 'Gianyar', 'SDP', 'II', '085738174261'),
('140030344', '827ccb0eea8a706c4c34a16891f84e7b', 'Sarasmita', 'Denpasar', 'Bidang Destinasi Pariwisata', 'I', '085738174261'),
('140030345', '827ccb0eea8a706c4c34a16891f84e7b', 'Anik Setiawati', 'Denpasar', 'Pemasaran Pariwisata', 'III', '085738174261');

-- --------------------------------------------------------

--
-- Table structure for table `tb_suratkeluar`
--

CREATE TABLE `tb_suratkeluar` (
  `Nomor_surat_keluar` varchar(30) NOT NULL,
  `Tujuan_surat` varchar(100) NOT NULL,
  `Ditugaskan_kepada` text NOT NULL,
  `Tanggal_surat` varchar(40) NOT NULL,
  `Tanggal_kirim` date NOT NULL,
  `Perihal` varchar(100) NOT NULL,
  `Asal_surat` varchar(50) NOT NULL,
  `Dasar_surat` text NOT NULL,
  `Isi_surat` text NOT NULL,
  `Sifat_surat` varchar(20) NOT NULL,
  `Id_jenis_surat` varchar(5) NOT NULL,
  `Lampiran` int(5) NOT NULL,
  `Dibuat_oleh` varchar(50) NOT NULL,
  `No_urut_surat` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_suratkeluar`
--

INSERT INTO `tb_suratkeluar` (`Nomor_surat_keluar`, `Tujuan_surat`, `Ditugaskan_kepada`, `Tanggal_surat`, `Tanggal_kirim`, `Perihal`, `Asal_surat`, `Dasar_surat`, `Isi_surat`, `Sifat_surat`, `Id_jenis_surat`, `Lampiran`, `Dibuat_oleh`, `No_urut_surat`) VALUES
('003/08/iv/2017', 'Kepala UPT Taman Budaya Provinsi Bali', '-', '2018-05-01', '0000-00-00', 'Bgaian sdp', '-', '-', '<p>bagian sdp</p>\r\n', '01', 'sk1', 0, 'Bidang Destinasi Pariwisata', 8),
('0012/07/iii/Dispar', 'Kepala UPT Taman Budaya Provinsi Bali', '-', '2018-05-01', '0000-00-00', 'umum', '-', '-', '<p>umum</p>\r\n', '01', 'sk1', 0, '', 7),
('700/06/I/Dispar', 'Kepala Dinas Kebudayaan Provinsi Bali', '-', '2018-05-02', '0000-00-00', 'AA', 'Kepala Bidang Sumber Daya Pariwisata Dinas Pariwis', '-', '<p>AAAAAAA</p>\r\n', '', 'sk3', 0, '', 6),
('700/05/IV/Dispar', 'Kepala UPT Taman Budaya Provinsi Bali', '-', '2018-05-01', '0000-00-00', 'Pinjam Tempat', '-', '-', '<p>PINJAM TEMAT</p>\r\n', '03', 'sk1', 0, '', 5),
('900/04/II/Dispar 2017', '', '<p>abcd</p>\r\n', '2018-05-04', '0000-00-00', 'bbbbb', '-', 'aaaaa', '', '', 'sk2', 0, '', 4),
('100/01/II/Dispar/2012', 'Sekretaris/Para Kepala Bidang Dinas Pariwisata Provinsi Bali', '-', '2018-05-01', '0000-00-00', 'Pinjam Tempat', '-', '-', '<p>tes tes</p>\r\n', '01', 'sk1', 0, 'Bidang Destinasi Pariwisata', 1),
('500/02/III/aspal', '', '<p>tes</p>\r\n', '2018-05-23', '0000-00-00', 'KAMU', '-', 'xaxa', '', '', 'sk2', 0, 'Bidang Destinasi Pariwisata', 2),
('600/03/iii/dispar', 'Kepala Dinas Kebudayaan Provinsi Bali', '-', '2018-04-30', '0000-00-00', 'Permohonan Pengerahan Personel Korpri Sebagai Peserta Upacara', '-', '-', '<p>tes lah</p>\r\n', '01', 'sk1', 0, 'Bidang Destinasi Pariwisata', 3),
('556/09/II/Dispar', 'Kepala Dinas Kebudayaan Provinsi Bali', '-', '2018-05-16', '0000-00-00', 'Mohon diagendakan Pada Acara Bali Mandara Mahalango Tahun 2018', '-', '-', '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dengan ini kami sampaikan bahwa Dinas Pariwisata Provinsi Bali akan melaksanakan Pemilihan Jegeg Bagus yang diawali dengan acara Malam Apresiasi dan Seni pada hari Kamis tanggal 26 Juli 2018 di Gedung Ksiarnawa, selanjutnya Grand Final Pemilihan Jegeg Bagus Bali 2018 pada hari Sabtu tanggal 28 Juli 2018 di Panggung Terbuka Ardha Chandra Taman Budaya Denpasar.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sehubungan dengan itu, kami mohon agar kegiatan tersebut dapat dimasukkan dalam Agenda Pementasan Seni Budaya Bali Mandara Mahalango tahun 2018.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Demikian kami sampaikan, atas perhatian dan kerjasamanya yang baik diucapkan terima kasih.</p>\r\n', '03', 'sk1', 0, '', 9),
('800/10/V/Dispar Tahun 2017', '', '<p>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; Niluh Herawati, S.S., M.Par.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pangkat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; Penata (III/c)</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; NIP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; 19740411 200902 2 002</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jabatan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; Staf Bidang Sumber Daya Pariwisata</p>\r\n', '2018-05-03', '0000-00-00', 'Untuk melaksanakan Diklat Pengadaan Barang/Jasa Pemerintah Tahun 2017, bertempat di Ruang Padma BPSD', '', 'Badan Pengembangan Sumber Daya Manusia Provinsi Bali, Nomor : 893.3/10702/PKT/BPSDM, tanggal  15 September 2017.', '', '', 'sk2', 0, '', 10),
('800/11/V/2018', 'Sekretaris/Para Kepala Bidang Dinas Pariwisata Provinsi Bali', '-', '2018-05-27', '0000-00-00', 'Permohonan Pengerahan Personel Korpri Sebagai Peserta Upacara', 'Kepala Dinas Pariwisata Provinsi Bali', '-', '<p>Sesuai Surat Komando Resor Militer 163/Wira Satya Nomor : B/838/VII/2016, tanggal 20 Juli 2016, perihal seperti di atas, sehubungan dengan hal tersebut, diharapkan agar Saudara dapat menugaskan staf di Sekretariat/Bidang sebanyak 10 (sepuluh) orang nanti pada :</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hari/tanggal&nbsp;&nbsp;&nbsp; : Senin, 1 mei 2018</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pukul&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :10.00 Wita (Upacara Pagi)</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 17.00 Wita (Upacara Sore)</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tempat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Lapangan Puputan Margarana Niti Mandala Renon Denpasar</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pakaian&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Seragam Korpri</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Geladi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :Hari Senin, tanggal 15 Agustus 2016, pukul. 09.00 Wita</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (mohon hadir 30 menit sebelumnya).</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Untuk mengikuti Upacara Peringatan HUT Kemerdekaan RI dan Upacara Penurunan Bendera Merah Putih (sesuai daftar terlampir).</p>\r\n', '', 'sk3', 0, '', 11),
('556/12/II/Dispar', 'Kepala UPT Taman Budaya Provinsi Bali', '-', '2018-05-27', '0000-00-00', 'Pinjam Tempat', '-', '-', '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dengan Hormat,</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dalam rangka pelaksanaan Grand Final Pemilihan Jegeg Bagus Bali Tahun 2018, yang akan dilaksanakan pada hari Sabtu, tanggal 28 Juli 2018. Sehubungan dengan kegiatan dimaksud, kami mohon dukungan dan partisipasinya untuk dapat memberikan ijin menggunakan Museum Bali, Panggung Terbuka Ardha Candra, Sound System, Lighting beserta kelengkapan lainnya.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Demikian disampaikan, atas perhatian dan kerjasamanya, diucapkan terima kasih.</p>\r\n', '03', 'sk1', 0, '', 12),
('556/13/II/Dispar', 'Dekan Fakultas Ilmu Sosial dan Politik Universitas Udayana', '-', '2018-05-19', '0000-00-00', 'Mohon Dispensasi', '-', '-', '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dengan Hormat,</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Berkenaan dengan keikutsertaan dalam Pemilihan Raka Raki Jawa Timur Tahun 2018 di Surabaya, bersama ini kami mohonkan dispensasi terkait pemilihan dimaksud, dari tanggal 27 Mei s/d 29 Mei 2018, untuk saudara :</p>\r\n\r\n<p>&nbsp; Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Ni Komang Ayu Budiayu</p>\r\n\r\n<p>&nbsp; NIM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 1712521001</p>\r\n\r\n<p>&nbsp; PRODI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Hubungan International</p>\r\n\r\n<p>&nbsp; Alamat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Banjar Dinas Tenganan, Pegringsingan Tenganan Manggis</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Karangasem</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Demikian kami sampaikan, atas perhatian dan kerjasamanya, diucapkan terima kasih.</p>\r\n', '03', 'sk1', 0, 'Bidang Destinasi Pariwisata', 13),
('800/14/II/Dispar 2018', 'Sekretaris Dinas Pariwisata Provinsi Bali', '-', '2018-05-22', '0000-00-00', 'Mohon Pinjam Kendaraan Dinas', 'Kepala Bidang Sumber Daya Pariwisata', '-', '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dalam rangka Penjajagan Pemilihan Jegeg Bagus Bali tahun 2018 ke Kabupaten/Kota kegiatan Pemilihan Jegeg Bagus Bali, bersama ini kami mohon dapat dipinjamkan 1 (satu) kendaraan dinas untuk membantu kelancaran kegiatan dimaksud, pada tanggal 22-23 Pebruari, 26 Pebruari- 2 Maret, 5 Maret, dan 9 Maret 2018.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Demikian kami sampaikan, atas bantuannya diucapkan terima kasih.</p>\r\n', '', 'sk3', 0, 'Bidang Destinasi Pariwisata', 14),
('800/ /15/V/Dispar Tahun 2017', '', '<p>1.&nbsp;&nbsp;&nbsp; Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; Alit Arya Subaga, SH., MH.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pangkat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; Penata Tingkat I (III/d)</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; NIP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; 19680911 199203 1 008</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jabatan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; Kepala Sub Bagian Umum dan Kepegawaian</p>\r\n', '2018-05-24', '0000-00-00', 'Untuk melaksanakan Monitoring dan Evaluasi Bantuan Dana Hibah Pemerintah Provinsi Bali Tahap II pada', '-', 'Surat Keputusan Sekretaris Daerah Provinsi Bali Nomor 973 / 957 / BKD, tanggal 24 Januari 2017 tentang Pembentukan dan Susunan Keanggotaan Tim Monitoring dan Evaluasi Bantuan Hibah Pemerintah Provinsi Bali Tahap II Kepada Badan / Lembaga / Organisasi Kemasyarakatan di Provinsi Bali Tahun Anggaran 2016.', '', '', 'sk2', 0, 'Bidang Destinasi Pariwisata', 15);

-- --------------------------------------------------------

--
-- Table structure for table `tb_suratmasuk`
--

CREATE TABLE `tb_suratmasuk` (
  `Nomor_surat_masuk` varchar(40) NOT NULL,
  `No_urut_surat` int(11) NOT NULL,
  `Tanggal_input` datetime NOT NULL,
  `Asal_surat` varchar(40) NOT NULL,
  `Tanggal_surat` date NOT NULL,
  `Perihal` text NOT NULL,
  `Lampiran` varchar(20) NOT NULL,
  `Id_jenis_surat` varchar(11) NOT NULL,
  `Sifat_surat` varchar(30) NOT NULL,
  `File_surat` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_suratmasuk`
--

INSERT INTO `tb_suratmasuk` (`Nomor_surat_masuk`, `No_urut_surat`, `Tanggal_input`, `Asal_surat`, `Tanggal_surat`, `Perihal`, `Lampiran`, `Id_jenis_surat`, `Sifat_surat`, `File_surat`) VALUES
('499/G5.16/TU/2018', 4, '2018-05-24 20:47:24', 'Kementrian pendidikan dan kebudayaan bal', '2018-05-03', 'Undangan Diskusi Kebahasan', '', 'sm2', 'Penting', '2018052420_susunan acara10001.pdf'),
('560/3680/V/Disnakeresdm', 5, '2018-05-24 21:18:50', 'Dinas Tenaga Kerja dan Energi Sumber Day', '2018-05-10', 'Kegiatan Penguatan Kerjasama Antar Lembaga Dalam Rangka Perluasan Cakupan Kepesertaan Jaminan Sosial.', '', 'sm1', 'Biasa', '2018052421_undangan0001.pdf'),
('091.1/5129/apr.org', 3, '2018-05-24 20:44:59', 'Sekretariat Daerah', '2018-05-19', 'Jadwal Apel Disiplin Tahun 2018', '', 'sm1', 'Biasa', '2018052420_undangan0001.pdf'),
('B-020/6.2/LPSK/2/2018', 2, '2018-05-24 20:41:08', 'Lembaga Perlindungan Saksi dan Program', '2018-05-26', 'Permohonan Narasumber', '', 'sm1', 'Biasa', '2018052420_susunan acara10001.pdf'),
('04/e/MABXII/FADBali/IV/2018', 1, '2018-05-24 18:54:17', 'Jegeg Bagus Bali', '2018-04-24', 'Undangan Grand Final Pemilihan Duta Anak Bali XII/2018', '', 'sm2', 'Penting', '2018052418_susunan acara10001.pdf'),
('556/Dispar-NGK/29/03/2018', 6, '2018-05-24 21:20:13', 'Sekretariat Daerah', '2018-05-02', 'Kegiatan Magang Pokdarwis', '', 'sm1', 'Penting', '2018052421_undangan0001.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bagian`
--
ALTER TABLE `tb_bagian`
  ADD PRIMARY KEY (`Kode_bagian`);

--
-- Indexes for table `tb_disposisi`
--
ALTER TABLE `tb_disposisi`
  ADD PRIMARY KEY (`No_urut_disposisi`);

--
-- Indexes for table `tb_jenis_surat`
--
ALTER TABLE `tb_jenis_surat`
  ADD PRIMARY KEY (`Id_jenis_surat`);

--
-- Indexes for table `tb_notif`
--
ALTER TABLE `tb_notif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `tb_suratkeluar`
--
ALTER TABLE `tb_suratkeluar`
  ADD PRIMARY KEY (`Nomor_surat_keluar`);

--
-- Indexes for table `tb_suratmasuk`
--
ALTER TABLE `tb_suratmasuk`
  ADD PRIMARY KEY (`Nomor_surat_masuk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_notif`
--
ALTER TABLE `tb_notif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
