-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jan 2022 pada 05.10
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sapi_potong`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diagnosa`
--

CREATE TABLE `diagnosa` (
  `id` int(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelamin` char(10) NOT NULL,
  `umur` char(3) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kd_penyakit` char(4) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `diagnosa`
--

INSERT INTO `diagnosa` (`id`, `nama`, `kelamin`, `umur`, `alamat`, `kd_penyakit`, `tanggal`) VALUES
(424, 'Farid', 'Laki-laki', '21', 'Padang', 'P001', '2022-01-27 11:03:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `kd_gejala` char(4) NOT NULL,
  `gejala` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`kd_gejala`, `gejala`) VALUES
('G034', 'Pada pemeriksaan ulas darah hanya ditemukan sedikit\r\nanaplasma pada sejumlah sel darah merahnya'),
('G033', 'Sapi depresi '),
('G031', 'Hewan ternak letih '),
('G032', 'Hewan membuat gerakan berputar – putar tanpa arah '),
('G030', 'Bulu rontok, kulit terlihat kotor dan kering'),
('G029', 'Dibawah dagu dan kaki bengkak'),
('G028', 'Badan kurus '),
('G027', 'Muka pucat kurang darah '),
('G026', 'Demam berselang seling'),
('G024', 'Mulut berbuih'),
('G025', 'Sulit bernafas'),
('G023', 'Lidah bengkak dan menjulur keluar'),
('G022', 'Kesulitan menelan'),
('G021', 'Kebengkakan dan busung terlihat di kepala, bawah\r\ndada, kaki atau pangkal ekor'),
('G019', 'Tinja berdarah'),
('G020', 'Timbul rasa sakit pada bagian dalam tubuh'),
('G018', 'Diare '),
('G017', 'Kematian Mendadak'),
('G016', 'Timbul bengkak di daerah leher dan dada'),
('G015', 'Mendengkur atau mengeluarkan suara seperti ngorok '),
('G014', 'Kornea mata berubah menjadi putih'),
('G013', 'Radang cair dan kental pada mata'),
('G012', 'Air ludah meleleh dari mulut '),
('G011', 'Mencret terus menerus sehingga tinja sangat berair'),
('G010', 'Batuk kering '),
('G009', 'Tidak nafsu makan'),
('G008', 'Terjadi kepincangan pada satu atau kedua kakinya'),
('G007', 'Kepucatan selaput lendir mulut, mata dan alat kelamin '),
('G006', 'Bercak – bercak darah pada kulit (keringat darah)'),
('G005', 'Kematian secara mendadak'),
('G004', 'Diare yang kadang – kadang bercampur dengan darah'),
('G003', 'Pembesaran kelenjar limfe yang menonjol, terlihat pada\r\ndaerah bahu, perut, lutut, dan daerah bawah telinga'),
('G002', 'Demam tinggi yang berlangsung 5-12 hari (rata-rata 7 hari)'),
('G001', 'Suhu badan tinggi antara 40-42oC '),
('G035', 'Gejala Anemia'),
('G036', 'Badan lemah '),
('G037', 'Berat badan turun 7% dalam waktu 10-12 hari'),
('G038', 'Sembelit dengan tinja bercampur darah dan lendir'),
('G039', 'Selaput lendir pucat atau bahkafn dapat menguning'),
('G040', 'Pernafasan cepat dan berat '),
('G041', 'Air kencing berwarna gelap'),
('G042', 'Kelenjar limfe membengkak '),
('G043', 'Disekitar mata, punggung dan leher terjadi busung'),
('G044', 'Suhu badan menjadi lebih tinggi dalam kurun waktu 8-\r\n17 hari'),
('G045', 'Sapi lesu'),
('G046', ' Warna tinja coklat kekuningan'),
('G047', 'Denyut jantung sangat kuat dan cepat'),
('G048', 'Urine berwarna merah'),
('G049', 'Mengalami kematian dalam waktu 2-3 hari jika tidak\r\ndiberi pengobatan'),
('G050', 'Terjadi keguguran pada pertengahan kebuntingan'),
('G051', 'Pada sapi jantan terjadi peradangan pada buah pelirnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit_solusi`
--

CREATE TABLE `penyakit_solusi` (
  `kd_penyakit` char(4) NOT NULL,
  `nama_penyakit` varchar(30) DEFAULT NULL,
  `definisi` text DEFAULT NULL,
  `solusi` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyakit_solusi`
--

INSERT INTO `penyakit_solusi` (`kd_penyakit`, `nama_penyakit`, `definisi`, `solusi`) VALUES
('P001', 'Jembrana Disease', 'Penyakit Jembrana atau Jembrana Disease adalah penyakit viral pada sapi, terutama pada sapi Bali. Penyakit ini disebabkan oleh virus dari famili Retrovirus, sub famili Lentivirinae dan bersifat fatal pada sapi Bali', 'Pencegahan Penyakit :\r\n- Vaksinasi dengan vaksin runderpest, dan melakukan penyemprotan vektor di kandang sapi.\r\n\r\nPengobatan penyakit :\r\n- Sapi yang terserang penyakit jembrana dapat ditolong dengan penyuntikan antibiotik yang berdaya kerja luas.\r\n- Konsultasi dengan dokter hewan'),
('P002', 'Bovine Viral Diarhoea (BVD)', 'Bovine Viral Diarhoe (BVD) adalah penyakit infeksius pada sapi yang disebabkan oleh virus dan secara klinis terlihat adanya stomatitis erosif akut, gastroenteritis dan diare.', 'Pencegahan Penyakit :\r\n- Sanitasi lingkungan kandang sehingga penularan tidak berlanjut\r\n- Mengisolasi sapi sakit untuk mencegah penularan\r\n\r\nPengobatan Penyakit :\r\n- Pengobatan terhadap penyakit ini tidak efektif\r\n- Konsultasi dengan dokter hewan'),
('P003', 'Ngorok', 'Penyakit Ngorok adalah suatu penyakit infeksi akut atau menahun pada sapi dan kerbau yang terjadi secara septikemik. Sesuai dengan namanya, pada sapi dalam stadium terminal akan menunjukkan gejala-gejala ngorok (mendengkur), disamping adanya kebengkakan busung pada daerah-daerah submandibula dan leher bagian bawah.', 'Pencegahan Penyakit :\r\n- Melaksanakan vaksinasi dengan vaksin SE setiap selang 6 bulan\r\n- Pemberian antibiotika atau sulfa\r\n\r\nPengobatan penyakit :\r\n- Bisa menggunakan obat – obatan antiobiotika lewat air minum atau suntikan\r\n- Konsultasi dengan dokter hewan'),
('P004', 'Surra', 'Penyakit surra merupakan penyakit parasit yang menular pada hewan dan disebabkan oleh protozoa berflagella yang tersirkulasi dalam darah secara ekstraseluler yang bernama Trypanosoma evansi. Penyakit ini dapat bersifat akut maupun kronis, tergantung pada inangnya.', 'Pencegahan Penyakit :\r\n- Untuk mengusir lalat dapat digunakan campuran minyak tanah, tir dan minyak kelapa dengan perbandingan 1:1:300 yang  dilumaskan pada kulit sapi\r\n\r\nPengobatan Penyakit : \r\n- Meletakkan sapi yang sakit dalam kandang yang gelap supaya tidak didatangi pilek\r\n- Konsultasi dengan dokter hewan'),
('P005', 'Anaplasmosis', 'Anaplamosis adalah penyakit menular yang tidak ditularkan secara kontaok (non-contagious) dan bersifat perakut sampai kronik. Penyakit ini ditandai demam tinggi, anemia yang profresif dan ikterus tanpa hemoglobiniruia. Umumnya sapi tua lebih rentan dari pada sapi muda. Sapi yang berumur lebih dari 6 bulan sangat peka terhadap penyakit ini. Sapi muda yang mendapat infeksi\r\nringan nantinya akan bertindak sebagai pembawa penyakit. Masa inkubasi Anaplasmosis adalah 6-38 hari. Penyakit ini dapat bersifat perakut, akut, subakut, dan kronik terganung dari umur dan status imunitasnya. ', 'Pencegahan Penyakit :\r\n- Melakukan pemberantasan vektor berupa caplak maupun lalat dengan cara disemprot maupun direndam dalam larutan insektisida\r\n- Pemberian vaksinasi menggunakan vaksin A.\r\nmarginale inaktif sebanyak dua kali dengan interval 6 -12 minggu dan diulang setiap tahun\r\n- Bila sapi sudah terserang penyakit maka harus diisolasi\r\n\r\nPengobatan Penyakit :\r\n- Bila sapi sudah terserang penyakit maka sapi diberi chlortetracyklin dosis 10 mg/kg berat badan selama 4 - 6 hari. Dapat juga diberikan dengan dosis 250 – 500 mg/hari selama 5 hari\r\n- Konsultasi dengan dokter hewan'),
('P006', 'Babesiosis', 'Babesiosis adalah penyakit hewan menular yang dapat besifat akut sampai menahun yang ditandai dengan gejala demam, anemia, ikhterus dan haemoglobinuria. Disebabkan oleh parasit protozoa dari genus Babesia sp dan penularannya dilakukan terutama oleh caplak. Babesia bigemina dapat minimbulkan kematian 80-90% pada ternak dewasa yang tidak diobati, sedangkan pada ternak muda umur 1-2 tahun kematian yang ditimbulkan 10-15%.', 'Pencegahan Penyakit :\r\n- Pemberantasan vektor ceplak \r\n\r\nPengobatan Penyakit :\r\n- Pengobatan dilakukan dengan Berenil (Squib) dengan ijeksi intra muskuler dosis 0,5 mg/kg berat badan\r\n- Pemberian obat inizol dengan dosis 1 ml/ 100 kg berat badan.\r\n- Konsultasi dengan dokter hewan '),
('P007', 'Brucellosis', 'Brucellosis adalah penyakit yang dapat menyebabkan abortus atau keguguran. Penyakit ini disebabkan oleh bakteri Brucella abortus, bakteri yang merukan alat reproduksi seperti radang pada dinding rahim, janin beserta selaput lendirnya dan ambing pada sapi jantan. Penularan penyakit ini terjadi melalui lendir pada vulva, urine sapi, feses, dan air susu.', 'Pencegahan Penyakit :\r\n- Memberikan vaksin brucellosis\r\n- Menjaga kebersihan sapi dan kandang sapi\r\n- Semua alat – alat makan dan minum bekas terak yang sakit tidak boleh diberikan atau diperuntukkan untuk ternak yang sehat\r\n\r\nPengobatan Penyakit :\r\n- Pengobatan penyakit ini tidak efektif dilakukan karena tingkat kesembuhanya rendah dan biaya untuk pengobatanya cukup mahal.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `relasi`
--

CREATE TABLE `relasi` (
  `id_relasi` int(4) NOT NULL,
  `kd_gejala` char(4) NOT NULL,
  `kd_penyakit` char(4) NOT NULL,
  `bobot` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `relasi`
--

INSERT INTO `relasi` (`id_relasi`, `kd_gejala`, `kd_penyakit`, `bobot`) VALUES
(56, 'G001', 'P001', 2),
(57, 'G002', 'P001', 2),
(62, 'G005', 'P001', 3),
(60, 'G003', 'P001', 2),
(61, 'G004', 'P001', 2),
(63, 'G006', 'P001', 2),
(64, 'G007', 'P001', 2),
(65, 'G008', 'P001', 1),
(66, 'G009', 'P002', 1),
(67, 'G010', 'P002', 1),
(68, 'G011', 'P002', 3),
(69, 'G013', 'P002', 1),
(70, 'G012', 'P002', 1),
(71, 'G014', 'P002', 1),
(72, 'G001', 'P003', 2),
(73, 'G015', 'P003', 3),
(74, 'G016', 'P003', 3),
(75, 'G017', 'P003', 1),
(76, 'G018', 'P003', 1),
(77, 'G019', 'P003', 1),
(80, 'G020', 'P003', 2),
(81, 'G021', 'P003', 3),
(82, 'G022', 'P003', 3),
(83, 'G023', 'P003', 3),
(84, 'G024', 'P003', 3),
(85, 'G025', 'P003', 3),
(86, 'G026', 'P004', 1),
(87, 'G027', 'P004', 2),
(88, 'G028', 'P004', 2),
(89, 'G029', 'P004', 1),
(90, 'G030', 'P004', 1),
(91, 'G031', 'P004', 2),
(92, 'G032', 'P004', 3),
(93, 'G001', 'P005', 2),
(94, 'G009', 'P005', 1),
(95, 'G033', 'P005', 1),
(96, 'G034', 'P005', 2),
(97, 'G035', 'P005', 1),
(98, 'G036', 'P005', 1),
(99, 'G037', 'P005', 1),
(100, 'G038', 'P005', 2),
(101, 'G039', 'P005', 2),
(102, 'G040', 'P005', 2),
(103, 'G041', 'P005', 2),
(104, 'G042', 'P005', 2),
(105, 'G043', 'P005', 2),
(106, 'G001', 'P006', 2),
(107, 'G009', 'P006', 1),
(108, 'G028', 'P006', 2),
(109, 'G035', 'P006', 1),
(110, 'G040', 'P006', 2),
(111, 'G044', 'P006', 2),
(112, 'G039', 'P006', 2),
(113, 'G045', 'P006', 1),
(114, 'G046', 'P006', 2),
(115, 'G048', 'P006', 2),
(116, 'G049', 'P006', 2),
(117, 'G001', 'P007', 2),
(118, 'G009', 'P007', 1),
(119, 'G050', 'P007', 3),
(120, 'G051', 'P007', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_analisa`
--

CREATE TABLE `tmp_analisa` (
  `noip` varchar(30) NOT NULL,
  `kd_penyakit` char(4) NOT NULL,
  `kd_gejala` char(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_gejala`
--

CREATE TABLE `tmp_gejala` (
  `noip` int(3) NOT NULL,
  `kd_gejala` char(4) NOT NULL,
  `bobot` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tmp_gejala`
--

INSERT INTO `tmp_gejala` (`noip`, `kd_gejala`, `bobot`) VALUES
(249, 'G005', 0),
(250, 'G004', 0),
(251, 'G003', 0),
(252, 'G002', 0),
(253, 'G001', 0),
(254, 'G035', 0),
(255, 'G038', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_pasien`
--

CREATE TABLE `tmp_pasien` (
  `id` int(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelamin` char(10) NOT NULL,
  `umur` int(3) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `noip` varchar(30) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tmp_pasien`
--

INSERT INTO `tmp_pasien` (`id`, `nama`, `kelamin`, `umur`, `alamat`, `noip`, `tanggal`) VALUES
(143, 'Farid', 'Laki-laki', 21, 'Padang', '::1', '2022-01-27 11:03:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_penyakit`
--

CREATE TABLE `tmp_penyakit` (
  `noip` varchar(30) NOT NULL,
  `kd_penyakit` char(4) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tmp_penyakit`
--

INSERT INTO `tmp_penyakit` (`noip`, `kd_penyakit`, `nilai`) VALUES
('', 'P001', 0.6875),
('', 'P002', 0),
('', 'P003', 0.071428571428571),
('', 'P004', 0),
('', 'P005', 0.23809523809524),
('', 'P006', 0.15789473684211),
('', 'P007', 0.25);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`kd_gejala`);

--
-- Indeks untuk tabel `penyakit_solusi`
--
ALTER TABLE `penyakit_solusi`
  ADD PRIMARY KEY (`kd_penyakit`);

--
-- Indeks untuk tabel `relasi`
--
ALTER TABLE `relasi`
  ADD PRIMARY KEY (`id_relasi`);

--
-- Indeks untuk tabel `tmp_analisa`
--
ALTER TABLE `tmp_analisa`
  ADD PRIMARY KEY (`noip`);

--
-- Indeks untuk tabel `tmp_gejala`
--
ALTER TABLE `tmp_gejala`
  ADD PRIMARY KEY (`noip`);

--
-- Indeks untuk tabel `tmp_pasien`
--
ALTER TABLE `tmp_pasien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `diagnosa`
--
ALTER TABLE `diagnosa`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=427;

--
-- AUTO_INCREMENT untuk tabel `relasi`
--
ALTER TABLE `relasi`
  MODIFY `id_relasi` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT untuk tabel `tmp_gejala`
--
ALTER TABLE `tmp_gejala`
  MODIFY `noip` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT untuk tabel `tmp_pasien`
--
ALTER TABLE `tmp_pasien`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
