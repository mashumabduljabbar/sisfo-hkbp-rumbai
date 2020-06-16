-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 20, 2019 at 01:52 AM
-- Server version: 10.0.38-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mule7148_hkbp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_galeri`
--

CREATE TABLE `tbl_galeri` (
  `galeri_id` varchar(50) NOT NULL,
  `galeri_judul` varchar(50) NOT NULL,
  `galeri_keterangan` text NOT NULL,
  `galeri_foto` varchar(50) NOT NULL,
  `galeri_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_galeri`
--

INSERT INTO `tbl_galeri` (`galeri_id`, `galeri_judul`, `galeri_keterangan`, `galeri_foto`, `galeri_created`) VALUES
('2', 'Foto', 'Mengadakan Family Gathering bersama guru-guru, yayasan dan pendeta', '156186762047b77f774cc9d9afcc44cb9ec7997757.jpg', '2019-05-24 13:39:56'),
('3', 'Foto', 'Melaksanakan Upacara Bendera dan yang bertugas pembawa upacara adalah guru-guru', '156186757225fc18447bad1466f375a98e772349b5.jpg', '2019-05-24 13:39:56'),
('4', 'Videotron', 'okekeoko', '155868048307ef95146e3fb011fb0d8df87cb6c206.mp4', '2019-05-24 13:48:03'),
('5', 'Foto', 'Pelaksanaan Upaca mempenringati HUT RI', '1561867673af38fdfba810f1afeecc8978ebdda707.jpg', '2019-06-30 11:07:53'),
('6', 'Foto', 'Serangkaian Perlombaan dalam rangka HUT-RI', '156186772588c4e8fd7fb73cfd18f243fe9b8c986d.jpg', '2019-06-30 11:08:45'),
('7', 'Foto', 'PERINGATAN HARI SUMPAH PEMUDA DIISI DENGAN KEGIATAN PERLOMBAAN PARADE PAKAIAN ADAT ANTAR KELAS DAN PAWAI DISEKITAR SEKOLAH', '1561867779241512f982515ddbe0509da2972727c8.jpg', '2019-06-30 11:09:39'),
('8', 'Foto', 'Pembelajaran di awali dengan berdoa bersama', '1561869572c165adae081edcad86bb3d3633d0e429.jpg', '2019-06-30 11:39:32'),
('9', 'voto', 'Kegiatan Diskusi dalam proses pembelajaran', '15618696415bdedb9af0740c329829bee237803b38.jpg', '2019-06-30 11:40:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `guru_id` varchar(50) NOT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `guru_namalengkap` varchar(50) NOT NULL,
  `guru_tempatlahir` varchar(50) DEFAULT NULL,
  `guru_tanggallahir` date DEFAULT NULL,
  `guru_nuptk` varchar(50) NOT NULL,
  `guru_nrg` varchar(50) NOT NULL,
  `guru_jeniskelamin` varchar(50) NOT NULL,
  `guru_pendidikanterakhir` varchar(50) DEFAULT NULL,
  `guru_tahunpendidikan` varchar(50) DEFAULT NULL,
  `guru_jurusan` varchar(50) DEFAULT NULL,
  `guru_jabatan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_guru`
--

INSERT INTO `tbl_guru` (`guru_id`, `user_id`, `guru_namalengkap`, `guru_tempatlahir`, `guru_tanggallahir`, `guru_nuptk`, `guru_nrg`, `guru_jeniskelamin`, `guru_pendidikanterakhir`, `guru_tahunpendidikan`, `guru_jurusan`, `guru_jabatan`) VALUES
('1', '4', 'Diani Rosmauli Manurung, M.Pd', 'Pekanbaru', '1981-04-18', '4750759460300052', '131801652004', 'P', 'S2', '2015', 'Kimia', 'Kepala Sekolah'),
('10', '14', 'Tiesmin Tampubolon', 'Simarhompa', '1988-02-10', '', '', 'P', 'Diploma I', '2008', 'Informatika', 'Tata Usaha'),
('11', '15', 'lastiardo Manik', 'Sijarango', '1977-01-25', '', '', 'P', 'SMA', '1995', '', 'Janitor'),
('2', '4', 'Meloney Cisca Purba, S.Pd', 'Pem. Siantar', '1984-07-19', '9051762663300093', '', 'P', 'S1', '2007', 'Kimia', 'Wakil Kurikulum'),
('3', '6', 'Ranti Rismaulita pasaribu, S.Pd', 'Bakaran Batu', '1983-05-24', '7856761662300102', '', 'P', 'S1', '2006', 'Agama', 'Guru'),
('4', '7', 'Halasan Siahaan, S.Pd', 'Pematang Nibung', '1983-12-07', '', '', 'L', 'S1', '2011', 'B. Inggris', 'Wakil Sapra'),
('5', '8', 'Nelly Saragih, S.Pd', 'Pekanbaru', '1978-04-14', '7746756658300082', '', 'P', 'S1', '2012', 'Ekonomi', 'Guru mapel'),
('6', '9', 'Fransiska Mariance, S.Pd', 'Sibolga', '1986-07-24', '', '', 'P', 'S1', '2011', 'B. Indonesia', 'Guru mapel'),
('7', '10', 'Rosmita Simanjuntak, S.Pd', 'Pekanbaru', '1987-06-08', '', '', 'P', 'S1', '2011', 'Matematika', 'Guru mapel'),
('8', '11', 'Monang Simanjuntak, S.Pd', 'Lobunauli', '1991-02-14', '', '', 'L', 'S1', '2015', 'B. Indonesia', 'Guru mapel'),
('9', '12', 'Yudha Swandy, M.Pd', 'Pekanbaru', '1991-06-02', '', '', 'L', 'S2', '2018', 'Penjas', 'Guru mapel');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_informasi`
--

CREATE TABLE `tbl_informasi` (
  `informasi_id` varchar(50) NOT NULL,
  `informasi_judul` varchar(50) NOT NULL,
  `informasi_keterangan` text NOT NULL,
  `informasi_foto` varchar(50) NOT NULL,
  `kategori_id` varchar(50) DEFAULT NULL,
  `informasi_created` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_informasi`
--

INSERT INTO `tbl_informasi` (`informasi_id`, `informasi_judul`, `informasi_keterangan`, `informasi_foto`, `kategori_id`, `informasi_created`) VALUES
('1', 'KEGIATAN EKSTRAKURIKULER ', 'Seni Musik', '15618668392219a6b83e4c197a3b9a99a225419cb9.jpg', '2', '2019-05-21 00:11:29'),
('2', 'FUN FESTIVAL', 'Datangllah beramai-ramai di Fun Festival Sekolah Daniel pasti seru dan mengesankan apalagi kalau ikut tampil, buruan daftar....', '15618670855a00550d1bf07846dc15b5b3eb1d0ee5.jpg', '3', '2019-05-22 00:11:29'),
('5', 'KEGIATAN PERKEMAHAN', 'Diawali dengan upacara pembukaan yang di pimpin oleh kepala sekolah sebagai pembina upacara dan didhadiri pihak komite dan kepolisian', '1561867283a4af3e79f08e1a3b753d5c808de4cee0.jpg', '2', '2019-05-23 00:11:29'),
('6', 'PERAYAAN NATAL SMP DANIEL HKBP RUMBAI ', 'Kegiatan diisi dengan pentas seni peserta didik', '1561867410e4594d0f812d3bcbe371c9ee5c18e8f4.jpg', '2', '2019-06-30 11:03:30'),
('7', 'PERINGATAN HARI GURU NASIONAL', 'Mengikuti Seminar Nasional ', '15618674998b4723296ab697530768f18b1378b269.jpg', '2', '2019-06-30 11:04:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `jadwal_id` varchar(50) NOT NULL,
  `kelas_id` varchar(50) DEFAULT NULL,
  `mapel_id` varchar(50) DEFAULT NULL,
  `jadwal_hari` int(11) DEFAULT NULL,
  `jadwal_jam` time DEFAULT NULL,
  `jadwal_tahunajaran` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`jadwal_id`, `kelas_id`, `mapel_id`, `jadwal_hari`, `jadwal_jam`, `jadwal_tahunajaran`) VALUES
('29', '2', '7', 0, '10:00:00', '2019-2020'),
('30', '1', '6', 0, '08:30:00', '2019-2020'),
('31', '1', '2', 1, '10:00:00', '2019-2020'),
('32', '2', '1', 1, '12:00:00', '2019-2020'),
('33', '2', '10', 1, '08:30:00', '2019-2020'),
('34', '2', '11', 4, '08:00:00', '2019-2020'),
('35', '1', '13', 5, '09:00:00', '2019-2020'),
('36', '1', '2', 3, '13:00:00', '2019-2020'),
('37', '1', '1', 0, '14:00:00', '2019-2020'),
('38', '1', '12', 5, '12:00:00', '2019-2020'),
('39', '2', '14', 0, '10:00:00', '2019-2020'),
('40', '2', '6', 1, '08:00:00', '2019-2020'),
('41', '2', '2', 2, '10:00:00', '2019-2020'),
('42', '2', '1', 2, '09:30:00', '2019-2020'),
('43', '2', '10', 3, '11:30:00', '2019-2020'),
('44', '2', '8', 0, '12:30:00', '2019-2020'),
('45', '3', '24', 0, '10:30:00', '2019-2020'),
('46', '4', '6', 0, '11:30:00', '2019-2020'),
('47', '3', '25', 2, '10:00:00', '2019-2020'),
('48', '3', '26', 2, '20:00:00', '2019-2020'),
('49', '2', '27', 1, '10:00:00', '2019-2020'),
('50', '3', '28', 3, '09:00:00', '2019-2020'),
('51', '3', '29', 5, '22:00:00', '2019-2020'),
('52', '1', '30', 0, '10:30:00', '2019-2020'),
('53', '4', '24', 3, '10:00:00', '2019-2020'),
('54', '2', '31', 4, '12:00:00', '2019-2020'),
('55', '4', '26', 0, '09:00:00', '2019-2020'),
('56', '4', '33', 5, '08:30:00', '2019-2020'),
('57', '4', '34', 5, '00:00:00', '2019-2020'),
('58', '4', '31', 3, '11:30:00', '2019-2020'),
('59', '4', '32', 4, '11:00:00', '2019-2020'),
('60', '4', '27', 1, '13:00:00', '2019-2020'),
('61', '4', '30', 0, '09:00:00', '2019-2020'),
('62', '3', '34', 5, '08:00:00', '2019-2020'),
('63', '3', '32', 4, '22:00:00', '2019-2020'),
('64', '3', '30', 3, '14:00:00', '2019-2020'),
('65', '3', '29', 1, '01:00:00', '2019-2020'),
('66', '1', '13', 4, '08:00:00', '2019-2020'),
('67', '1', '2', 4, '22:00:00', '2019-2020'),
('68', '1', '12', 0, '12:00:00', '2019-2020'),
('69', '1', '1', 2, '20:30:00', '2019-2020'),
('70', '1', '3', 4, '13:00:00', '2019-2020'),
('71', '1', '1', 2, '21:30:00', '2019-2020'),
('72', '1', '2', 2, '23:00:00', '2019-2020'),
('73', '1', '1', 1, '14:00:00', '2019-2020'),
('74', '1', '10', 1, '15:00:00', '2019-2020'),
('75', '1', '6', 3, '21:00:00', '2019-2020'),
('76', '1', '8', 3, '13:00:00', '2019-2020');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `kategori_id` varchar(50) NOT NULL,
  `kategori_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`kategori_id`, `kategori_nama`) VALUES
('2', 'Mading'),
('3', 'Informasi Sekolah');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `kelas_id` varchar(50) NOT NULL,
  `kelas_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`kelas_id`, `kelas_nama`) VALUES
('1', 'VII'),
('2', 'VIII'),
('3', 'IX A'),
('4', 'IX B');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konsultasi`
--

CREATE TABLE `tbl_konsultasi` (
  `konsultasi_id` varchar(50) NOT NULL,
  `konsultasi_namapengirim` varchar(50) NOT NULL,
  `konsutasi_nopengirim` varchar(50) NOT NULL,
  `konsultasi_alamatpengirim` text NOT NULL,
  `konsultasi_pesan` text NOT NULL,
  `konsultasi_balasan` text NOT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `konsultasi_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `konsultasi_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_konsultasi`
--

INSERT INTO `tbl_konsultasi` (`konsultasi_id`, `konsultasi_namapengirim`, `konsutasi_nopengirim`, `konsultasi_alamatpengirim`, `konsultasi_pesan`, `konsultasi_balasan`, `user_id`, `konsultasi_created`, `konsultasi_updated`) VALUES
('21', 'Budiman', '085264375688', 'Jl. Berdikari', 'selamat Pagi. Apa saja Persyaratan Pendaftaran Siswa Baru...?', 'persyaratanya : Fc KK 2 lembar, Fc KTP Orang Tua (ayah& Ibu) 2 lembar pas Foto 3*4 4 lembar, Ijazah ', '1', '2019-06-30 11:24:11', '2019-06-30 11:33:41'),
('22', 'Agusman', '081275689370', 'Jl. Riau', 'kapan pendaftaran penerimaan siswa baru gelombang ke dua...?', 'Penerimaan siswa baru mulai tanggal 15 - 19 Juni 2019', '1', '2019-06-30 11:26:54', '2019-06-30 11:29:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mapel`
--

CREATE TABLE `tbl_mapel` (
  `mapel_id` varchar(50) NOT NULL,
  `mapel_nama` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mapel`
--

INSERT INTO `tbl_mapel` (`mapel_id`, `mapel_nama`) VALUES
('1', 'MP104 - Matematika'),
('10', 'MP105 - Ilmu Pengetahuan Alam'),
('11', 'MP109 - Pendidikan jasmani, Olah Raga dan Kesehata'),
('12', 'MP108 - Seni Budaya'),
('13', 'MP110 - Prakarya'),
('14', 'MP201 - Pendidikan Agama'),
('15', 'MP202 - Pendidikan pancasilan dan kewarganegaraan'),
('16', 'MP203 - Bahasa Indonesia'),
('17', 'MP204 - Matematika'),
('18', 'MP205 - Biologi'),
('19', 'Mp206 - Sejarah'),
('2', 'MP103 - Bahasa Indonesia'),
('20', 'MP207 - Bahasa Inggris'),
('21', 'MP208- Seni Budaya'),
('22', 'Mp209 - Pendidikan Jasmani Olah Raga dan Kesehatan'),
('23', 'Mp210 - Prakarya'),
('24', 'MP301 - Pendidikan Agama'),
('25', 'MP302 - Pendidikan Pancasila dan Kewarganegaraan'),
('26', 'MP303 - Bahasa Indonesia'),
('27', 'MP304 - Matematika'),
('28', 'MP305 - Biologi'),
('29', 'MP306 - Sejarah'),
('3', 'MP107 - Bahasa Inggris'),
('30', 'MP307 - Bahasa Inggris'),
('31', 'MP308 - Fisika'),
('32', 'MP309 - Seni Budaya'),
('33', 'MP310 - Pendidikan Jasmani Olah Raga dan Kesehatan'),
('34', 'MP311 - Prakarya'),
('6', 'MP102 - Pendidikan pancasilan dan kewarganegaraan'),
('7', 'MP101 - Pendidikan Agama'),
('8', 'MP106 - Ilmu Pengetahuan Sosial');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_materi`
--

CREATE TABLE `tbl_materi` (
  `materi_id` varchar(50) NOT NULL,
  `materi_nama` varchar(50) NOT NULL,
  `materi_file` varchar(50) NOT NULL,
  `kelas_id` varchar(50) DEFAULT NULL,
  `mapel_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_materi`
--

INSERT INTO `tbl_materi` (`materi_id`, `materi_nama`, `materi_file`, `kelas_id`, `mapel_id`) VALUES
('1', 'Puisi', '1558505070a4d76e588d292340581e7ec5b9b9e929.pdf', '1', '2'),
('3', 'Aljabar', '1561868247787d60d5ab06818739f8b344613615e2.jpg', '2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `nilai_id` varchar(50) NOT NULL,
  `mapel_id` varchar(50) DEFAULT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `nilai_semester` int(11) NOT NULL,
  `nilai_value` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`nilai_id`, `mapel_id`, `user_id`, `nilai_semester`, `nilai_value`) VALUES
('1', '10', '2', 1, 80),
('10', '1', '2', 1, 70),
('11', '13', '2', 1, 70),
('12', '7', '3', 1, 75),
('13', '6', '3', 1, 70),
('14', '2', '3', 1, 75),
('15', '1', '3', 1, 65),
('16', '10', '3', 1, 80),
('17', '8', '3', 1, 75),
('18', '3', '3', 1, 65),
('19', '12', '3', 1, 70),
('2', '7', '2', 1, 85),
('20', '11', '3', 1, 70),
('21', '13', '3', 1, 90),
('22', '7', '13', 1, 80),
('23', '6', '13', 1, 70),
('24', '2', '13', 1, 90),
('25', '1', '13', 1, 85),
('26', '10', '13', 1, 65),
('27', '8', '13', 1, 70),
('28', '3', '13', 1, 75),
('29', '12', '13', 1, 80),
('30', '11', '13', 1, 70),
('31', '13', '13', 1, 70),
('32', '6', '2', 1, 70),
('33', '3', '2', 1, 60),
('34', '7', '16', 1, 90),
('35', '6', '16', 1, 80),
('36', '2', '16', 1, 75),
('37', '1', '16', 1, 70),
('38', '10', '16', 1, 65),
('39', '8', '16', 1, 70),
('4', '4', '19', 1, 79),
('40', '3', '16', 1, 75),
('41', '12', '16', 1, 80),
('42', '11', '16', 1, 90),
('43', '13', '16', 1, 70),
('5', '2', '2', 1, 80),
('6', '5', '20', 1, 90),
('7', '11', '2', 1, 89),
('8', '12', '2', 1, 70),
('9', '8', '2', 1, 87);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `siswa_id` varchar(50) NOT NULL,
  `user_id` varchar(50) DEFAULT '1',
  `siswa_namalengkap` varchar(50) NOT NULL,
  `siswa_alamat` text,
  `siswa_nisn` varchar(50) NOT NULL,
  `siswa_tempatlahir` varchar(50) DEFAULT NULL,
  `siswa_tanggallahir` date DEFAULT NULL,
  `siswa_nis` varchar(50) NOT NULL,
  `siswa_pekerjaanorangtua` varchar(50) DEFAULT NULL,
  `siswa_namaayah` varchar(50) DEFAULT NULL,
  `siswa_namaibu` varchar(50) DEFAULT NULL,
  `siswa_jeniskelamin` varchar(50) NOT NULL,
  `siswa_agama` varchar(50) NOT NULL,
  `siswa_nohporangtua` varchar(50) DEFAULT NULL,
  `kelas_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`siswa_id`, `user_id`, `siswa_namalengkap`, `siswa_alamat`, `siswa_nisn`, `siswa_tempatlahir`, `siswa_tanggallahir`, `siswa_nis`, `siswa_pekerjaanorangtua`, `siswa_namaayah`, `siswa_namaibu`, `siswa_jeniskelamin`, `siswa_agama`, `siswa_nohporangtua`, `kelas_id`) VALUES
('1', '13', 'Aurura mellsaria', 'Jl. Baung Induk No.3', '0065849334', 'batam', '2006-05-07', '307', 'karyawan Swasta', 'Afrizal', 'Renita', 'P', 'Kristen', '082173334379', '1'),
('10', '22', 'Putri Tesalonika Simanjuntak', 'Palas', '0059662951', 'Pekanbaru', '2005-01-05', '314', 'Buruh', 'A. Simanjuntak Alm', 'Yohana Panggabean', 'P', 'Kristen', '', '1'),
('11', '23', 'Rafael Ivan Rio', 'Jl. Toman', '0055556677', 'Pekabaru', '2005-06-07', '314', 'karyawan Swasta', 'Hotman Hasialon', 'Ribka Br Sinaga', 'L', 'Kristen', '085365597799', '1'),
('12', '24', 'Riduan Siregar', 'Jl. Semarang', '00511184166', 'Pekanbaru', '2005-11-13', '316', 'Wiraswasta', 'Jhony Paul Siregar', 'Emma Hasibuan', 'L', 'Kristen', '081268898273', '1'),
('13', '25', 'Roy Doli Fernando Siregar', 'Jl. Umbansari Atas', '0052479396', 'Pekanbaru', '2005-06-06', '317', 'karyawan Swasta', 'maroga Siregar', 'Sumarni Br Saragih', 'L', 'Kristen', '081270053375', '1'),
('14', '26', 'Ryan Fernando', 'Jl. mekar Sari', '0052059866', 'Pekanbaru', '2005-10-26', '318', 'karyawan Swasta', 'Rihat Sibagariang', 'rauli Br Pasaribu', 'L', 'Kristen', '082392956620', '1'),
('15', '27', 'Samuel Alexander Manalu', 'Jl. Yossudarso', '0051988219', 'Pekanbaru', '2005-06-25', '319', '', 'Lambok manalu', '', 'L', 'Kristen', '', '1'),
('16', '29', 'theresia Anita Afriani Simanulang', 'palas', '0068551816', 'Pekanbaru', '2006-04-20', '321', 'Wiraswasta', 'Sumiran SimanulLang', 'Rosdiana Sibagariang', 'P', 'Katolik', '082387924209', '1'),
('17', '30', 'Juang Felix Tampubolon', 'Jl Embun Pagi', '', 'bagan Siapi-api', '2005-09-03', '322', 'karyawan Swasta', 'Dimpos linton tampubolon', 'Dermince harianja', 'L', 'Kristen', '', '1'),
('18', '28', 'Samuel Parlinggoman', 'Jl. Yossudarso', '0069219059', 'Pekanbaru', '2006-01-28', '320', '', 'Trihardo Ramli parsaoran', 'Ropesta magdalena Siahaan', 'L', 'Kristen', '081365317491', '1'),
('2', '3', 'Andrian Michael Natipulu', 'Jl. Toma', '0054262530', 'Pekanbaru', '2005-12-24', '306', 'buruh', 'panahatan Napitupulu', '', 'L', 'Kristen', '', '1'),
('3', '2', 'Andreas Rivaldo Sihite', 'Jl. Putih pungguk', '0052454666', 'pekanbaru', '2005-10-20', '305', 'Sopir', 'Dolok Sihite', 'Maja Marlina', 'L', 'kristen', '085271530477', '1'),
('4', '16', 'bunga Ria Friskilah Simanjuntak', 'Muara fajar', '0054576957', 'Muara Fajar', '2005-10-03', '308', 'Buruh', 'Momos Mauli Simanjuntak', 'Erpina Sianturi', 'P', 'Kristen', '082390911677', '1'),
('5', '17', 'Effraem Naibaho', 'Jl. Rimbungan', '0066081672', 'Pekanbaru', '2006-04-18', '309', 'Buruh', 'Nardus Robinson Hasoloa', 'Rolina Br Simanjuntak', 'L', 'Kristen', '085278717118', '1'),
('6', '18', 'Enda Hertina Situmorang', 'Jl. teratai Indah', '0067779574', 'Pekanbaru', '2006-05-02', '310', 'Wiraswasta', 'Pittor Situmorang', 'Nurlenta Tinambunan', 'P', 'kristen', '081261990699', '1'),
('7', '19', 'Glori Asina Sihombing', 'Jl. Pintas Sari Rumbai', '0069173408', 'pekanbaru', '2006-03-09', '311', '', 'Bostang Tiopan Sihombing', '', 'P', 'kristen', '081268777211', '1'),
('8', '20', 'Joyce Junpradli Sianipar', 'Jl. Teratai Indah', '00680352225', 'Pekanbaru', '2006-06-04', '312', '', 'joel Sianipar', 'Merliana Tampubolon', 'L', 'Kristen', '081270880677', '1'),
('9', '21', 'Markus Angga Britama', 'Jl. Toma Muara Fajar', '0068676479', 'Pekanbaru', '2006-03-03', '313', 'karyawan Swasta', 'Sokhi Ziduhu Tafonao', 'Masilina mendrefa', 'L', 'Kristen', '081275595663', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tugas`
--

CREATE TABLE `tbl_tugas` (
  `tugas_id` varchar(50) NOT NULL,
  `tugas_nama` varchar(50) NOT NULL,
  `tugas_file` varchar(50) NOT NULL,
  `kelas_id` varchar(50) DEFAULT NULL,
  `mapel_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tugas`
--

INSERT INTO `tbl_tugas` (`tugas_id`, `tugas_nama`, `tugas_file`, `kelas_id`, `mapel_id`) VALUES
('1', 'Pidato', '15618684345a00550d1bf07846dc15b5b3eb1d0ee5.jpg', '1', '2'),
('2', 'Puisi', '1561869332862a058797487e1b80fcc22b31819e6d.jpg', '1', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL COMMENT 'No Induk Murid / No Induk Guru',
  `user_password` varchar(50) NOT NULL,
  `user_level` varchar(50) NOT NULL COMMENT 'admin, guru, siswa',
  `user_foto` varchar(50) DEFAULT NULL,
  `user_namalengkap` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_password`, `user_level`, `user_foto`, `user_namalengkap`) VALUES
('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'default/user.png', 'Setiaro Waruwu'),
('10', 'guru7', '21232f297a57a5a743894a0e4a801fc3', 'guru', '1561864179862a058797487e1b80fcc22b31819e6d.jpg', 'Rosmita Simanjuntak, S.Pd'),
('11', 'guru8', '21232f297a57a5a743894a0e4a801fc3', 'guru', '1561879933787d60d5ab06818739f8b344613615e2.jpg', 'Monang Simanjuntak, S.Pd'),
('12', 'guru9', '21232f297a57a5a743894a0e4a801fc3', 'guru', '1561879963787d60d5ab06818739f8b344613615e2.jpg', 'Yudha Swandy, S,Pd'),
('13', 'siswa307', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '15618959215d6b6fa77c129ffd8feb8303e68296cc.jpg', 'aurura mellsaria'),
('14', 'guru10', '21232f297a57a5a743894a0e4a801fc3', 'guru', '1561880078862a058797487e1b80fcc22b31819e6d.jpg', 'Tiesmin Tampubolon'),
('15', 'guru11', '21232f297a57a5a743894a0e4a801fc3', 'guru', '1561880370862a058797487e1b80fcc22b31819e6d.jpg', 'Lastiardo Manik'),
('16', 'siswa308', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '15618960115d6b6fa77c129ffd8feb8303e68296cc.jpg', 'bunga Ria Friskilah Simanjuntak'),
('17', 'siswa309', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '15618965365d6b6fa77c129ffd8feb8303e68296cc.jpg', 'Effraem Naibaho'),
('18', 'siswa310', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '15618966725d6b6fa77c129ffd8feb8303e68296cc.jpg', 'Enda Hertina Situmorang'),
('19', 'siswa311', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '15618967425d6b6fa77c129ffd8feb8303e68296cc.jpg', 'Glori Asina Sihombing'),
('2', 'siswa305', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '15618648615d6b6fa77c129ffd8feb8303e68296cc.jpg', 'Andreas Rivaldo sihite'),
('20', 'siswa312', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '15618968255d6b6fa77c129ffd8feb8303e68296cc.jpg', 'Joyce Junpradli Sianipar'),
('21', 'siswa313', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '15618968715d6b6fa77c129ffd8feb8303e68296cc.jpg', 'Markus Angga Britama'),
('22', 'siswa314', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '15618969235d6b6fa77c129ffd8feb8303e68296cc.jpg', 'Putri Tesalonika Simanjuntak'),
('23', 'siswa315', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '15618969795d6b6fa77c129ffd8feb8303e68296cc.jpg', 'Rafael Ivan Rio'),
('24', 'siswa316', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '15618970305d6b6fa77c129ffd8feb8303e68296cc.jpg', 'Riduan Siregar'),
('25', 'siswa317', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '15618971195d6b6fa77c129ffd8feb8303e68296cc.jpg', 'Roy Doli Fernando Siregar'),
('26', 'siswa318', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '15618972635d6b6fa77c129ffd8feb8303e68296cc.jpg', 'Ryan Fernando'),
('27', 'siswa319', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '15618973655d6b6fa77c129ffd8feb8303e68296cc.jpg', 'Samuel Alexander manalu'),
('28', 'siswa320', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '15618974135d6b6fa77c129ffd8feb8303e68296cc.jpg', 'Samuel Parlinggoman'),
('29', 'siswa321', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '15618975355d6b6fa77c129ffd8feb8303e68296cc.jpg', 'Theresia Anita Afriani Simanullang'),
('3', 'siswa306', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '15618650505d6b6fa77c129ffd8feb8303e68296cc.jpg', 'andrian Michael Natipulu'),
('30', 'siswa322', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '15618976025d6b6fa77c129ffd8feb8303e68296cc.jpg', 'Juang Felix Tampubolon'),
('31', 'alvin267', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '15619967995d6b6fa77c129ffd8feb8303e68296cc.jpg', 'Alvin Krisna Nainggolan'),
('32', 'Arfan269', '21232f297a57a5a743894a0e4a801fc3', 'siswa', '15619968595d6b6fa77c129ffd8feb8303e68296cc.jpg', 'Arfan wahyudi'),
('4', 'guru1', '21232f297a57a5a743894a0e4a801fc3', 'guru', '1561863824862a058797487e1b80fcc22b31819e6d.jpg', 'Diani Rosmauli manurung, M.Pd'),
('5', 'guru2', '21232f297a57a5a743894a0e4a801fc3', 'guru', '1561863799862a058797487e1b80fcc22b31819e6d.jpg', 'Meloney Ciska Purba, S.Pd'),
('6', 'guru3', '21232f297a57a5a743894a0e4a801fc3', 'guru', '1561863758862a058797487e1b80fcc22b31819e6d.jpg', 'Ranti Rismaulita Pasaribu, S.Pd'),
('7', 'guru4', '21232f297a57a5a743894a0e4a801fc3', 'guru', '1561863950787d60d5ab06818739f8b344613615e2.jpg', 'Halasan Siahaan, S.Pd'),
('8', 'guru5', '21232f297a57a5a743894a0e4a801fc3', 'guru', '1561864038862a058797487e1b80fcc22b31819e6d.jpg', 'Nelly Saragih, S.Pd'),
('9', 'guru6', '21232f297a57a5a743894a0e4a801fc3', 'guru', '1561864107862a058797487e1b80fcc22b31819e6d.jpg', 'Fransiska Mariance, S.Pd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_galeri`
--
ALTER TABLE `tbl_galeri`
  ADD PRIMARY KEY (`galeri_id`);

--
-- Indexes for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`guru_id`),
  ADD KEY `FK_user_id_guru` (`user_id`);

--
-- Indexes for table `tbl_informasi`
--
ALTER TABLE `tbl_informasi`
  ADD PRIMARY KEY (`informasi_id`),
  ADD KEY `FK_kategori_id_informasi` (`kategori_id`);

--
-- Indexes for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`jadwal_id`),
  ADD KEY `FK_kelas_id_jadwal` (`kelas_id`),
  ADD KEY `FK_mapel_id_jadwal` (`mapel_id`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`kelas_id`);

--
-- Indexes for table `tbl_konsultasi`
--
ALTER TABLE `tbl_konsultasi`
  ADD PRIMARY KEY (`konsultasi_id`),
  ADD KEY `FK_user_id_konsultasi` (`user_id`);

--
-- Indexes for table `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  ADD PRIMARY KEY (`mapel_id`);

--
-- Indexes for table `tbl_materi`
--
ALTER TABLE `tbl_materi`
  ADD PRIMARY KEY (`materi_id`),
  ADD KEY `FK_kelas_id_materi` (`kelas_id`),
  ADD KEY `FK_mapel_id_materi` (`mapel_id`);

--
-- Indexes for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`nilai_id`),
  ADD KEY `FK_mapel_id_nilai` (`mapel_id`),
  ADD KEY `FK_user_id_nilai` (`user_id`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`siswa_id`),
  ADD KEY `FK_kelas_id_user` (`kelas_id`),
  ADD KEY `FK_user_id_siswa` (`user_id`);

--
-- Indexes for table `tbl_tugas`
--
ALTER TABLE `tbl_tugas`
  ADD PRIMARY KEY (`tugas_id`),
  ADD KEY `FK_kelas_id_tugas` (`kelas_id`),
  ADD KEY `FK_mapel_id_tugas` (`mapel_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD CONSTRAINT `FK_user_id_guru` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tbl_informasi`
--
ALTER TABLE `tbl_informasi`
  ADD CONSTRAINT `FK_kategori_id_informasi` FOREIGN KEY (`kategori_id`) REFERENCES `tbl_kategori` (`kategori_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD CONSTRAINT `FK_kelas_id_jadwal` FOREIGN KEY (`kelas_id`) REFERENCES `tbl_kelas` (`kelas_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_mapel_id_jadwal` FOREIGN KEY (`mapel_id`) REFERENCES `tbl_mapel` (`mapel_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tbl_konsultasi`
--
ALTER TABLE `tbl_konsultasi`
  ADD CONSTRAINT `FK_user_id_konsultasi` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tbl_materi`
--
ALTER TABLE `tbl_materi`
  ADD CONSTRAINT `FK_kelas_id_materi` FOREIGN KEY (`kelas_id`) REFERENCES `tbl_kelas` (`kelas_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_mapel_id_materi` FOREIGN KEY (`mapel_id`) REFERENCES `tbl_mapel` (`mapel_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD CONSTRAINT `FK_user_id_nilai` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD CONSTRAINT `FK_kelas_id_siswa` FOREIGN KEY (`kelas_id`) REFERENCES `tbl_kelas` (`kelas_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_user_id_siswa` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tbl_tugas`
--
ALTER TABLE `tbl_tugas`
  ADD CONSTRAINT `FK_kelas_id_tugas` FOREIGN KEY (`kelas_id`) REFERENCES `tbl_kelas` (`kelas_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_mapel_id_tugas` FOREIGN KEY (`mapel_id`) REFERENCES `tbl_mapel` (`mapel_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
