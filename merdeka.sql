-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Okt 2022 pada 12.06
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `merdeka`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(10) NOT NULL,
  `tahun` int(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `id_siswa` int(10) NOT NULL,
  `sakit` varchar(20) NOT NULL,
  `izin` varchar(20) NOT NULL,
  `apla` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `tahun`, `semester`, `id_kelas`, `id_siswa`, `sakit`, `izin`, `apla`) VALUES
(3, 1, 1, 9, 16, '1', '-', '-'),
(4, 1, 1, 9, 64, '3', '-', '-'),
(5, 1, 1, 16, 234, '1', '-', '-'),
(6, 1, 1, 16, 233, '3', '-', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `capaian`
--

CREATE TABLE `capaian` (
  `id_capaian` int(10) NOT NULL,
  `id_materi` int(10) NOT NULL,
  `id_elemen` int(10) NOT NULL,
  `id_sub_elemen` int(10) NOT NULL,
  `id_fase` int(10) NOT NULL,
  `capaian` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `capaian`
--

INSERT INTO `capaian` (`id_capaian`, `id_materi`, `id_elemen`, `id_sub_elemen`, `id_fase`, `capaian`) VALUES
(1, 1, 1, 1, 1, 'Mengenal adanya Tuhan Yang Maha Esa melalui sifat-sifat-Nya'),
(2, 1, 1, 2, 1, 'Mengenal simbolsimbol dan ekspresi keagamaan yang konkret'),
(3, 1, 1, 3, 1, 'Mulai mencontoh kebiasaan pelaksanaan ibadah sesuai agama/ kepercayaannya'),
(4, 1, 2, 4, 1, 'Mulai membiasakan bersikap jujur dan berani menyampaikan kebenaran atau fakta'),
(5, 1, 2, 5, 1, 'Membiasakan diri untuk membersihkan, merawat tubuh, serta menjaga kesehatan dan keselamatan/ keamanan diri dalam semua aktivitas kesehariannya'),
(6, 1, 3, 6, 1, 'Mengenali hal-hal yang sama dan berbeda yang dimiliki diri dan temannya dalam berbagai hal. Membiasakan mendengarkan pendapat temannya, baik itu sama ataupun berbeda dengan pendapatnya dan mengekspresikannya secara wajar.'),
(7, 1, 3, 7, 1, 'Mengenali emosi, minat, dan kebutuhan orang orang terdekat dan membiasakan meresponsnya secara positif.'),
(8, 1, 4, 8, 1, 'Mengenal berbagai ciptaan Tuhan'),
(9, 1, 4, 9, 1, 'Membiasakan bersyukur atas karunia lingkungan alam sekitar dengan menjaga kebersihan dan merawat lingkungan alam sekitarnya.'),
(10, 1, 5, 10, 1, 'Mengenali hak dan tanggungjawabnya di rumah dan sekolah, serta kaitannya dengan keimanan kepada Tuhan YME.'),
(11, 2, 6, 11, 1, 'Mengenali identitas diri dan kebiasaan kebiasaan budaya dalam keluarga'),
(12, 2, 6, 12, 1, 'Mengenal identitas orang lain dan kebiasaan kebiasaannya'),
(13, 2, 6, 13, 1, 'Membiasakan untuk menghormati budaya-budaya yang berbeda dari dirinya.'),
(14, 2, 7, 14, 1, 'Menggunakan berbagai macam cara yang bermakna untuk mengungkapkan perasaan dan pikiran.'),
(15, 2, 7, 15, 1, 'Menjalin interaksi sosial yang positif dalam lingkungan keluarga dan sekolah'),
(16, 2, 8, 16, 1, 'Menunjukkan kesadaran untuk menerima teman yang berbeda budaya dalam beberapa situasi.'),
(17, 2, 8, 17, 1, 'Mengenali orang orang di sekitarnya berdasarkan ciri-ciri atau atribut tertentu'),
(18, 2, 8, 18, 1, 'Mengetahui adanya budaya yang berbeda di lingkungan sekitar.'),
(19, 2, 9, 19, 1, 'Menjalin pertemanan tanpa memandang perbedaan diri dan temannya'),
(20, 2, 9, 20, 1, 'Mulai berpartisipasi menentukan beberapa pilihan untuk keperluan bersama dalam lingkungan kecil'),
(21, 2, 9, 21, 1, 'Mulai mengenali keberadaan dan perannya dalam lingkungan keluarga dan sekolah'),
(22, 3, 10, 22, 1, 'Terbiasa bekerja bersama dalam melakukah kegiatan dengan kelompok (melibatkan dua atau lebih orang).'),
(23, 3, 10, 23, 1, 'Menyimak informasi sederhana dan mengungkapkan nya dalam bahasa lisan'),
(24, 3, 10, 24, 1, 'Mengenali dan menyampaikan kebutuhan kebutuhan diri sendiri dan orang lain'),
(25, 3, 10, 25, 1, 'Melaksanakan aktivitas bermain sesuai dengan kesepakatan bersama dan saling mengingatkan adanya kesepakatan tersebut.'),
(26, 3, 11, 26, 1, 'Mulai mengenali dan mengapresiasi orang-orang di rumah dan sekolah, untuk merespon kebutuhan di rumah dan sekolah.'),
(27, 3, 11, 27, 1, 'Mengenali berbagai reaksi orang lain di lingkungan sekitar.'),
(28, 3, 12, 28, 1, 'Mulai membiasakan untuk berbagi kepada orang orang di sekitar.'),
(29, 4, 13, 29, 1, 'Mengenali kemampuan dan minat/kesukaan diri serta menerima keberadaaan dan keunikan diri sendiri'),
(30, 4, 13, 30, 1, 'Menceritakan pengalaman belajarnya di rumah maupun di sekolah.'),
(31, 4, 14, 31, 1, 'Mengenali emosi emosi yang dirasakan dan situasi yang menyebabkan-nya, serta mulai belajar mengeskpresikan emosi secara wajar'),
(32, 4, 14, 32, 1, 'Menceritakan aktivitas yang akan dilakukan untuk menyelesaikan tugas yang diberikan'),
(33, 4, 14, 33, 1, 'Mencoba mengerjakan berbagai tugas sederhana dengan pengawasan dan dukungan orang dewasa'),
(34, 4, 14, 34, 1, 'Mengatur diri agar dapat menyelesaikan kegiatannya hingga tuntas.'),
(35, 4, 14, 35, 1, 'Berani mencoba, adaptif dalam situasi baru, dan mencoba untuk tidak mudah menyerah saat mendapatkan tantangan'),
(36, 5, 15, 36, 1, 'Bertanya untuk memenuhi rasa ingin tahu terhadap diri dan lingkungannya.'),
(37, 5, 15, 37, 1, 'Mengidentifikasi danmengolah informasi dan gagasan sederhana.'),
(38, 5, 16, 38, 1, 'Menyebutkan alasan dari pilihan atau keputusannya'),
(39, 5, 17, 39, 1, 'Menyampaikan apa yang dipikirkan dengan singkat'),
(40, 6, 18, 40, 1, 'Menggabungkan beberapa gagasan menjadi ide atau gagasan sederhana yang bermakna untuk\nmengekspresikan\npikiran dan/atau\nperasaannya.'),
(41, 6, 19, 41, 1, 'Mengeksplorasi dan mengekspresikan pikiran dan/atau perasaannya dalam bentuk karya dan/atau tindakan sederhana serta mengapresiasi karya dan tindakan yang dihasilkan'),
(42, 6, 20, 42, 1, 'Menentukan pilihan dari beberapa alternatif yang diberikan'),
(43, 1, 1, 1, 2, 'Mengenal sifat-sifat utama Tuhan Yang Maha Esa bahwa Dia adalah Sang Pencipta yang Maha Pengasih dan Maha Penyayang dan mengenali kebaikan dirinya sebagai cerminan sifat Tuhan'),
(44, 1, 1, 2, 2, 'Mengenal unsurunsur utama agama/ kepercayaan (ajaran, ritual keagamaan, kitab suci, dan orang suci/ utusan Tuhan YME).'),
(45, 1, 1, 3, 2, 'Terbiasa melaksanakan ibadah sesuai ajaran agama/ kepercayaannya'),
(46, 1, 2, 4, 2, 'Membiasakan bersikap jujur terhadap diri sendiri dan orang lain dan berani menyampaikan kebenaran atau fakta'),
(47, 1, 2, 5, 2, 'Memiliki rutinitas sederhana yang diatur secara mandiri dan dijalankan sehari-hari serta menjaga kesehatan dan keselamatan/ keamanan diri dalam semua aktivitas kesehariannya.'),
(48, 1, 3, 6, 2, 'Mengenali hal-hal yang sama dan berbeda yang dimiliki diri dan temannya dalam berbagai hal, serta memberikan respons secara positif.'),
(49, 1, 3, 7, 2, 'Mengidentifikasi emosi, minat, dan kebutuhan orang orang terdekat dan meresponsnya secara positif.'),
(50, 1, 4, 8, 2, 'Mengidentifikasi berbagai ciptaan Tuhan'),
(51, 1, 4, 9, 2, 'Membiasakan bersyukur atas lingkungan alam sekitar dan berlatih untuk menjaganya'),
(52, 1, 5, 10, 2, 'Mengidentifikasi hak dan tanggung jawabnya di rumah, sekolah, dan lingkungan sekitar serta kaitannya dengan keimanan kepada Tuhan YME.'),
(53, 2, 6, 11, 2, 'Mengidentifikasi dan mendeskripsikan ide-ide tentang dirinya dan beberapa kelompok di lingkungan sekitarnya'),
(54, 2, 6, 12, 2, 'Mengidentifikasi dan mendeskripsikan praktik keseharian diri dan budayanya'),
(55, 2, 6, 13, 2, 'Mendeskripsikan pengalaman dan pemahaman hidup bersama-sama dalam kemajemukan.'),
(56, 2, 7, 14, 2, 'Mengenali bahwa diri dan orang lain menggunakan kata, gambar, dan bahasa tubuh yang dapat memiliki makna yang berbeda di lingkungan sekitarnya'),
(57, 2, 7, 15, 2, 'Mengekspresikan pandangannya terhadap topik yang umum dan mendengarkan sudut pandang orang lain yang berbeda dari dirinya dalam lingkungan keluarga dan sekolah'),
(58, 2, 8, 16, 2, 'Menyebutkan apa yang telah dipelajari tentang orang lain dari interaksinya dengan kemajemukan budaya di lingkungan sekolah dan rumah'),
(59, 2, 8, 17, 2, 'mengenali perbedaan tiap orang atau kelompok dan menyikapinya sebagai kewajaran'),
(60, 2, 8, 18, 2, 'Mengidentifikasi perbedaan budaya yang konkret di lingkungan sekitar'),
(61, 2, 9, 19, 2, 'Menjalin pertemanan tanpa memandang perbedaan agama, suku, ras, jenis kelamin, dan perbedaan lainnya, dan mengenal masalah-masalah sosial, ekonomi, dan lingkungan di lingkungan sekitarnya'),
(62, 2, 9, 20, 2, 'Mengidentifikasi pilihan-pilihan berdasarkan kebutuhan dirinya dan orang lain ketika membuat keputusan'),
(63, 2, 9, 21, 2, 'Mengidentifikasi peran, hak dan kewajiban warga dalam masyarakat demokratis'),
(64, 3, 10, 22, 2, 'Menerima dan melaksanakan tugas serta peran yang diberikan kelompok dalam sebuah kegiatan bersama.'),
(65, 3, 10, 23, 2, 'Memahami informasi sederhana dari orang lain dan menyampaikan informasi sederhana kepada orang lain menggunakan kata katanya sendiri.'),
(66, 3, 10, 24, 2, 'Mengenali kebutuhan kebutuhan diri sendiri yang memerlukan orang lain dalam pemenuhannya.'),
(67, 3, 10, 25, 2, 'Melaksanakan aktivitas kelompok sesuai dengan kesepakatan bersama dengan bimbingan, dan saling mengingatkan adanya kesepakatan tersebut.'),
(68, 3, 11, 26, 2, 'Peka dan mengapresiasi orang orang di lingkungan sekitar, kemudian melakukan tindakan sederhana untuk mengungkapkannya.'),
(69, 3, 11, 27, 2, 'Mengenali berbagai reaksi orang lain di lingkungan sekitar dan penyebabnya.'),
(70, 3, 12, 28, 2, 'Memberi dan menerima hal yang dianggap berharga dan penting kepada/dari orang orang di lingkungan sekitar.'),
(71, 4, 13, 29, 2, 'Mengidentifikasi dan menggambarkan kemampuan, prestasi, dan ketertarikannya secara subjektif'),
(72, 4, 13, 30, 2, 'Melakukan refleksi untuk mengidentifikasi kekuatan dan kelemahan, serta prestasi dirinya.'),
(73, 4, 14, 31, 2, 'Mengidentifikasi perbedaan emosi yang dirasakannya dan situasi-situasi yang menyebabkannya; serta mengekspresi kan secara wajar'),
(74, 4, 14, 32, 2, 'Menetapkan target belajar dan merencanakan waktu dan tindakan belajar yang akan dilakukannya.'),
(75, 4, 14, 33, 2, 'Berinisiatif untukmengerjakan tugas tugas rutin secara mandiri dibawah pengawasan dan dukungan orang dewasa'),
(76, 4, 14, 34, 2, 'Melaksanakankegiatan belajar di kelas dan menyelesaikan tugas tugas dalam waktu yang telah disepakati.'),
(77, 4, 14, 35, 2, 'Berani mencoba dan adaptif menghadapi situasi baru serta bertahan mengerjakan tugas tugas yang disepakati hingga tuntas'),
(78, 5, 15, 36, 2, 'Mengajukanpertanyaan untuk menjawab keingintahuannya dan untuk mengidentifikasi suatu permasalahan engenai dirinya dan lingkungan sekitarnya.'),
(79, 5, 15, 37, 2, 'Mengidentifikasi danmengolah informasi dan gagasan'),
(80, 5, 16, 38, 2, 'Melakukan penalarankonkret dan memberikan alasan dalam menyelesaikan masalah dan mengambil keputusan'),
(81, 5, 17, 39, 2, 'Menyampaikan apayang sedang dipikirkan secara terperinci'),
(82, 6, 18, 40, 2, 'Menggabungkanbeberapa gagasan menjadi ide atau gagasan imajinatif yang bermakna untuk mengekspresikan pikiran dan/atau perasaannya.'),
(83, 6, 19, 41, 2, 'Mengeksplorasi danmengekspresikan pikiran dan/atau perasaannya dalam bentuk karya dan/atau tindakan erta mengapresiasi karya dan tindakan yang dihasilkan'),
(84, 6, 20, 42, 2, 'Mengidentifikasi gagasan-gagasan kreatif untuk menghadapi situasi dan permasalahan.'),
(85, 1, 1, 1, 3, 'Memahami sifat-sifat Tuhan utama lainnya dan mengaitkan sifatsifat tersebut dengan konsep dirinya dan ciptaan-Nya'),
(86, 1, 1, 2, 3, 'Mengenal unsur-unsur utama agama/ kepercayaan (simbolsimbol keagamaan dan sejarah agama/ kepercayaan)'),
(87, 1, 1, 3, 3, 'Terbiasa melaksanakan ibadah wajib sesuai tuntunan agama/ kepercayaannya'),
(88, 1, 2, 4, 3, 'Membiasakan melakukan refleksi tentang pentingnya bersikap jujur dan berani menyampaikan kebenaran atau fakta'),
(89, 1, 2, 5, 3, 'Mulai membiasakan diri untuk disiplin, rapi, membersihkan dan merawat tubuh, menjaga tingkah laku dan perkataan dalam semua aktivitas kesehariannya'),
(90, 1, 3, 6, 3, 'Terbiasa mengidentifikasi hal-hal yang sama dan berbeda yang dimiliki diri dan temannya dalam berbagai hal serta memberikan respons secara positif.'),
(91, 1, 3, 7, 3, 'Terbiasa memberikan apresiasi di lingkungan sekolah dan masyarakat '),
(92, 1, 4, 8, 3, 'Memahami keterhubungan antara satu ciptaan dengan ciptaan Tuhan yang lainnya'),
(93, 1, 4, 9, 3, 'Terbiasa memahami tindakan-tindakan yang ramah dan tidak ramah lingkungan serta membiasakan diri untuk berperilaku ramah lingkungan'),
(94, 1, 5, 10, 3, 'Mengidentifikasi hak dan tanggung jawab orang-orang di sekitarnya serta kaitannya dengan keimanan kepada Tuhan YME.'),
(95, 2, 6, 11, 3, 'Mengidentifikasi dan mendeskripsikan ide ide tentang dirinya dan berbagai kelompok di lingkungan sekitarnya, serta cara orang lain berperilaku dan berkomunikasi dengannya.'),
(96, 2, 6, 12, 3, 'Mengidentifikasi dan membandingkan praktik keseharian diri dan budayanya dengan orang lain di tempat dan waktu/era yang berbeda.'),
(97, 2, 6, 13, 3, 'Memahami bahwa kemajemukan dapat memberikan kesempatan untuk memperoleh pengalaman dan pemahaman yang baru.'),
(98, 2, 7, 14, 3, 'Mendeskripsikan penggunaan kata, tulisan dan bahasa tubuh yang memiliki makna yang berbeda di lingkungan sekitarnya dan dalam suatu budaya tertentu.'),
(99, 2, 7, 15, 3, 'Mengekspresikan pandangannya terhadap topik yang umum dan dapat mengenal sudut pandang orang lain. Mendengarkan dan memperkirakan sudut pandang orang lain yang berbeda dari dirinya pada situasi di ranah sekolah, keluarga, dan lingkungan sekitar.'),
(100, 2, 8, 16, 3, 'Menyebutkan apayang telah dipelajari tentang orang lain dari interaksinya dengan kemajemukan budaya di lingkungan sekitar.'),
(101, 2, 8, 17, 3, 'Mengkonfirmasi danmengklarifikasi stereotip dan prasangka yang dimilikinya tentang  orang atau kelompok di sekitarnya untuk mendapatkan pemahaman yang lebih baik'),
(102, 2, 8, 18, 3, 'Mengenali bahwaperbedaan budaya mempengaruhi pemahaman antarindividu.  '),
(103, 2, 9, 19, 3, 'Mengidentifikasi cara berkontribusi terhadap lingkungan sekolah, rumah dan lingkungan sekitarnya yang inklusif, adil dan berkelanjutan'),
(104, 2, 9, 20, 3, 'Berpartisipasimenentukan beberapa pilihan untuk keperluan bersama berdasarkan kriteria sederhana'),
(105, 2, 9, 21, 3, 'Memahami konsephak dan kewajiban, serta implikasinya  terhadap perilakunya.'),
(106, 3, 10, 22, 3, 'Menampilkan tindakan yang sesuai dengan harapan dan tujuan kelompok.'),
(107, 3, 10, 23, 3, 'Memahami informasi yang disampaikan (ungkapan pikiran, perasaan, dan keprihatinan) orang lain dan menyampaikan informasi secara akurat menggunakan berbagai simbol dan media'),
(108, 3, 10, 24, 3, 'Menyadari bahwasetiap orang membutuhkan orang lain dalam memenuhi  kebutuhannya dan perlunya saling membantu'),
(109, 3, 10, 25, 3, 'Menyadari bahwadirinya memiliki peran yang berbeda dengan orang lain/temannya, serta mengetahui konsekuensi perannya terhadap ketercapaian tujuan.'),
(110, 3, 11, 26, 3, 'Peka dan mengapresiasi orang orang di lingkungan sekitar, kemudian melakukan tindakan untuk menjaga keselarasan dalam berelasi dengan orang lain.'),
(111, 3, 11, 27, 3, 'Memahami berbagai alasan orang lain menampilkan respon tertentu'),
(112, 3, 12, 28, 3, 'Memberi dan menerima hal yang dianggap penting dan berharga kepada/dari orang-orang di lingkungan sekitar baik yang dikenal maupun tidak dikenal. '),
(113, 4, 13, 29, 3, 'Mengidentifikasikemampuan, prestasi, dan ketertarikannya serta tantangan yang dihadapi berdasarkan kejadian-kejadian yang dialaminya dalam kehidupan sehari-hari.'),
(114, 4, 13, 30, 3, 'Melakukan refleksi untuk mengidentifikasi kekuatan, kelemahan, dan prestasi dirinya,  serta situasi yang dapat mendukung dan menghambat pembelajaran dan pengembangan dirinya'),
(115, 4, 14, 31, 3, 'Mengetahui adanya pengaruh orang lain, situasi, dan peristiwa yang terjadi terhadap emosi yang dirasakannya; serta berupaya untuk mengekspresikan emosi secara tepat dengan mempertimbangkan perasaan dan kebutuhan orang lain disekitarnya'),
(116, 4, 14, 32, 3, 'Menjelaskan pentingnya memiliki tujuan dan berkomitmen dalam mencapainya serta mengeksplorasi langkah-langkah yang sesuai untuk mencapainya'),
(117, 4, 14, 33, 3, 'Mempertimbangkan, memilih dan mengadopsi berbagai strategi dan mengidentifikasi sumber bantuan yang diperlukan serta berinisiatif menjalankannya untuk mendapatkan hasil belajar yang diinginkan.'),
(118, 4, 14, 34, 3, 'Menjelaskan pentingnya mengatur diri secara mandiri dan mulai menjalankan kegiatan dan tugas yang telah sepakati secara mandiri'),
(119, 4, 14, 35, 3, 'Tetap bertahan mengerjakan tugas ketika dihadapkan dengan tantangan dan berusaha menyesuaikan strateginya ketika upaya sebelumnya tidak berhasil.'),
(120, 5, 15, 36, 3, 'Mengajukanpertanyaan untuk mengidentifikasi suatu permasalahan dan mengkonfirmasi pemahaman terhadap suatu permasalahan mengenai dirinya dan lingkungan sekitarnya.'),
(121, 5, 15, 37, 3, 'Mengumpulkan,mengklasifikasikan, membandingkan dan  memilih informasi dan gagasan dari berbagai sumber.'),
(122, 5, 16, 38, 3, 'Menjelaskan alasan yang relevan dalam penyelesaian masalah dan pengambilan keputusan'),
(123, 5, 17, 39, 3, 'Menyampaikan apa yang sedang dipikirkan dan menjelaskan alasan dari hal yang dipikirkan'),
(124, 6, 18, 40, 3, 'Memunculkan gagasan imajinatif baru yang bermakna dari beberapa gagasan yang berbeda sebagai ekspresi pikiran dan/atau perasaannya.'),
(125, 6, 19, 41, 3, 'Mengeksplorasi dan mengekspresikan pikiran dan/atau perasaannya sesuai dengan minat dan kesukaannya dalam bentuk karya dan/atau tindakan serta mengapresiasi karya dan tindakan yang dihasilkan'),
(126, 6, 20, 42, 3, 'Membandingkan gagasan-gagasan kreatif untuk menghadapi situasi dan permasalahan.'),
(127, 1, 1, 1, 4, 'Memahami berbagai kualitas atau sifat-sifat Tuhan Yang Maha Esa yang diutarakan dalam kitab suci agama masing-masing dan menghubungkan kualitas-kualitas positif Tuhan dengan sikap pribadinya, serta meyakini firman Tuhan sebagai kebenaran.'),
(128, 1, 1, 2, 4, 'Memahami unsurunsur utama agama/ kepercayaan, dan mengenali peran agama/kepercayaan dalam kehidupan serta memahami ajaran moral agama.'),
(129, 1, 1, 3, 4, 'Melaksanakan ibadah secara rutin sesuai dengan tuntunan agama/kepercayaan, berdoa mandiri, merayakan, dan memahami makna harihari besar'),
(130, 1, 2, 4, 4, 'Berani dan konsisten menyampaikan kebenaran atau fakta serta memahami konsekuensikonsekuensinya untuk diri sendiri'),
(131, 1, 2, 5, 4, 'Memperhatikan kesehatan jasmani, mental, dan rohani dengan melakukan aktivitas fisik, sosial, dan ibadah.'),
(132, 1, 3, 6, 4, 'Mengidentifikasi kesamaan dengan orang lain sebagai perekat hubungan sosial dan mewujudkannya dalam aktivitas kelompok. Mulai mengenal berbagai kemungkinan interpretasi dan cara pandang yang berbeda ketika dihadapkan dengan dilema.'),
(133, 1, 3, 7, 4, 'Mulai memandang sesuatu dari perspektif orang lain serta mengidentifikasi kebaikan dan kelebihan orang sekitarnya.'),
(134, 1, 4, 8, 4, 'Memahami konsep harmoni dan mengidentifikasi adanya saling kebergantungan antara berbagai ciptaan Tuhan'),
(135, 1, 4, 9, 4, 'Mewujudkan rasasyukur dengan terbiasa berperilaku ramah lingkungan dan memahami akibat perbuatan tidak ramah lingkungan dalam lingkup kecil maupun besar.'),
(136, 1, 5, 10, 4, 'Mengidentifikasi dan memahami peran, hak, dan kewajiban dasar sebagai warga negara serta kaitannya dengan keimanan kepada Tuhan YME dan secara sadar mempraktikkannya  dalam kehidupan sehari-hari.'),
(137, 2, 6, 11, 4, 'Mengidentifikasi dan mendeskripsikan keragaman budaya di sekitarnya; serta menjelaskan peran budaya dan bahasa dalam membentuk identitas dirinya.'),
(138, 2, 6, 12, 4, 'Mendeskripsikan dan membandingkan pengetahuan, kepercayaan, dan praktik dari berbagai kelompok budaya. '),
(139, 2, 6, 13, 4, 'Mengidentifikasi peluang dan tantangan yang muncul dari keragaman budaya di Indonesia.'),
(140, 2, 7, 14, 4, 'Memahami persamaan dan perbedaan cara komunikasi baik di dalam maupun antarkelompok budaya.'),
(141, 2, 7, 15, 4, 'Membandingkan beragam perspektif untuk memahami ermasalahan sehari  hari. Memperkirakan dan mendeskripsikan situasi komunitas yang berbeda dengan dirinya ke dalam situasi dirinya dalam konteks lokal dan regional.'),
(142, 2, 8, 16, 4, 'Menjelaskan apa yang telah dipelajari dari interaksi dan pengalaman dirinya dalam lingkungan yang beragam.'),
(143, 2, 8, 17, 4, 'Mengkonfirmasi dan mengklarifikasi stereotip dan prasangka yang dimilikinya tentang orang atau kelompok di sekitarnya untuk mendapatkan pemahaman yang lebih baik serta mengidentifikasi pengaruhnya terhadap individu dan kelompok di lingkungan sekitarnya'),
(144, 2, 8, 18, 4, 'Mencari titik temu nilai budaya yang beragam untuk menyelesaikan permasalahan bersama.'),
(145, 2, 9, 19, 4, 'Membandingkanbeberapa tindakan dan praktik perbaikan lingkungan sekolah yang inklusif, adil, dan berkelanjutan, dengan mempertimbangkan dampaknya secara jangka panjang terhadap manusia, alam, dan masyarakat'),
(146, 2, 9, 20, 4, 'Berpartisipasi dalammenentukan kriteria yang disepakati bersama untuk menentukan pilihan dan keputusan untuk kepentingan bersama'),
(147, 2, 9, 21, 4, 'Memahami konsep hak dan kewajiban, serta implikasinya terhadap perilakunya. Menggunakan konsep ini untuk menjelaskan perilaku diri dan orang sekitarnya'),
(148, 3, 10, 22, 4, 'Menunjukkan ekspektasi (harapan) positif kepada orang lain dalam rangka mencapai tujuan kelompok di lingkungan sekitar (sekolah dan rumah).'),
(149, 3, 10, 23, 4, 'Memahami informasi dari berbagai sumber dan menyampaikan pesan menggunakan berbagai simbol dan media secara efektif kepada orang lain untuk mencapai tujuan bersama'),
(150, 3, 10, 24, 4, 'Menyadari bahwa meskipun setiap orang memiliki otonominya masing-masing, setiap orang membutuhkan orang lain dalam memenuhi kebutuhannya.'),
(151, 3, 10, 25, 4, 'Menyelaraskan tindakannya sesuai dengan perannya dan mempertimbangkan peran orang lain untuk mencapai tujuan bersama.'),
(152, 3, 11, 26, 4, 'Tanggap terhadap lingkungan sosial sesuai dengan tuntutan peran sosialnya dan menjaga keselarasan dalam berelasi dengan orang lain.'),
(153, 3, 11, 27, 4, 'Menerapkan pengetahuan mengenai berbagai reaksi orang lain dan penyebabnya dalam konteks keluarga, sekolah, serta pertemanan dengan sebaya.'),
(154, 3, 12, 28, 4, 'Memberi dan menerima hal yang dianggap penting dan berharga kepada/dari orang orang di lingkungan luas/masyarakat baik yang dikenal maupun tidak dikenal.'),
(155, 4, 13, 29, 4, 'Menggambarkan pengaruh kualitas dirinya terhadap pelaksanaan dan hasil belajar; serta mengidentifikasi kemampuan yang ingin dikembangkan dengan mempertimbangkan tantangan yang dihadapinya dan umpan balik dari orang dewasa'),
(156, 4, 13, 30, 4, 'Melakukan refleksi untuk mengidentifikasi faktor-faktor di dalam maupun di luar dirinya yang dapat mendukung/mengham batnya dalam belajar dan mengembangkan diri; serta mengidentifikasi cara cara untuk mengatasi kekurangannya.'),
(157, 4, 14, 31, 4, 'Memahami perbedaan emosi yang dirasakan dan dampaknya terhadap proses belajar dan interaksinya dengan orang lain; serta mencoba cara-cara yang sesuai untuk mengelola emosi agar dapat menunjang aktivitas belajar dan interaksinya dengan orang lain.'),
(158, 4, 14, 32, 4, 'Menilai faktor-faktor (kekuatan dan kelemahan) yang ada pada dirinya dalam upaya mencapai tujuan belajar, prestasi, dan pengembangan dirinya serta mencoba berbagai strategi untuk mencapainya.'),
(159, 4, 14, 33, 4, 'Memahami arti penting bekerja secara mandiri serta inisiatif untuk melakukannya dalam menunjang pembelajaran dan pengembangan dirinya'),
(160, 4, 14, 34, 4, 'Mengidentifikasi faktor faktor yang dapat mempengaruhi kemampuan dalam mengelola diri dalam pelaksanaan aktivitas belajar dan pengembangan dirinya.'),
(161, 4, 14, 35, 4, 'Menyusun, menyesuaikan, dan mengujicobakan berbagai strategi dan cara kerjanya untuk membantu dirinya dalam penyelesaian tugas yang menantang'),
(162, 5, 15, 36, 4, 'Mengajukan pertanyaan untuk membandingkan berbagai informasi dan untuk menambah pengetahuannya.'),
(163, 5, 15, 37, 4, 'Mengumpulkan, mengklasifikasikan, membandingkan, dan memilih informasi dari berbagai sumber, serta memperjelas informasi dengan bimbingan orang dewasa.'),
(164, 5, 16, 38, 4, 'Menjelaskan alasan yang relevan dan akurat dalam penyelesaian masalah dan pengambilan keputusan'),
(165, 5, 17, 39, 4, 'Memberikan alasan dari hal yang dipikirkan, serta menyadari kemungkinan adanya bias pada pemikirannya sendiri'),
(166, 6, 18, 40, 4, 'Mengembangkan gagasan yang ia miliki untuk membuat kombinasi hal yang baru dan imajinatif untuk mengekspresikan pikiran dan/atau perasaannya.'),
(167, 6, 19, 41, 4, 'Mengeksplorasi dan mengekspresikan pikiran dan/atau perasaannya sesuai dengan minat dan kesukaannya dalam bentuk karya dan/atau tindakan serta mengapresiasi dan mengkritisi karya dan tindakan yang dihasilkan'),
(168, 6, 20, 42, 4, 'berupaya mencari solusi alternatif saat pendekatan yang diambil tidak berhasil berdasarkan identifikasi terhadap situasi'),
(169, 1, 1, 1, 5, 'Memahami kehadiran Tuhan dalam kehidupan sehari-hari serta mengaitkan pemahamannya tentang kualitas atau sifat-sifat Tuhan dengan konsep peran manusia di bumi sebagai makhluk Tuhan yang bertanggung jawab.'),
(170, 1, 1, 2, 5, 'Memahami makna dan fungsi, unsurunsur utama agama / kepercayaan dalam konteks Indonesia, membaca kitab suci, serta memahami ajaran agama/ kepercayaan terkait hubungan sesama manusia dan alam semesta.'),
(171, 1, 1, 3, 5, 'Melaksanakan ibadah secara rutin dan mandiri sesuai dengan tuntunan agama/ kepercayaan, serta berpartisipasi pada perayaan hari-hari besar'),
(172, 1, 2, 4, 5, 'Berani dan konsisten menyampaikan kebenaran atau fakta serta memahami konsekuensikonsekuensinya untuk diri sendiri dan orang lain'),
(173, 1, 2, 5, 5, 'Mengidentifikasi pentingnya menjaga keseimbangan kesehatan jasmani, mental, dan rohani serta berupaya menyeimbangkan aktivitas fisik, sosial dan ibadah.'),
(174, 1, 3, 6, 5, 'Mengenal perspektif dan emosi/perasaan dari sudut pandang orang atau kelompok lain yang tidak pernah dijumpai atau dikenalnya. Mengutamakan persamaan dan menghargai perbedaan sebagai alat pemersatu dalam keadaan konflik atau perdebatan.'),
(175, 1, 3, 7, 5, 'Memahami perasaan dan sudut pandang orang dan/atau kelompok lain yang tidak pernah dikenalnya.'),
(176, 1, 4, 8, 5, 'Memahami konsep sebab akibat di antara berbagai ciptaan Tuhan dan mengidentifikasi berbagai sebab yang mempunyai dampak baik atau buruk, langsung maupun tidak langsung, terhadap alam semesta.'),
(177, 1, 4, 9, 5, 'Mewujudkan rasa syukur dengan berinisiatif untuk menyelesaikan permasalahan lingkungan alam sekitarnya dengan mengajukan alternatif solusi dan mulai menerapkan solusi tersebut.'),
(178, 1, 5, 10, 5, 'Menganalisis peran, hak, dan kewajiban sebagai warga negara, memahami perlunya mengutamakan kepentingan umum di atas kepentingan pribadi sebagai wujud dari keimanannya kepada Tuhan YME.'),
(179, 2, 6, 11, 5, 'memahami perubahan budaya seiring waktu dan sesuai konteks, baik dalam skala lokal, regional, dan nasional. Menjelaskan identitas diri yang terbentuk dari budaya bangsa.'),
(180, 2, 6, 12, 5, 'Memahami dinamika budaya yang mencakup pemahaman, kepercayaan, dan praktik keseharian dalam konteks personal dan sosial.'),
(181, 2, 6, 13, 5, 'Memahami pentingnya melestarikan dan merayakan tradisi budaya untuk mengembangkan identitas pribadi, sosial, dan bangsa Indonesia serta mulai berupaya melestarikan budaya dalam kehidupan sehari-hari.'),
(182, 2, 7, 14, 5, 'Mengeksplorasi pengaruh budaya terhadap penggunaan bahasa serta dapat mengenali risiko dalam berkomunikasi antar budaya.'),
(183, 2, 7, 15, 5, 'Menjelaskan asumsi asumsi yang mendasari perspektif tertentu. Memperkirakan dan mendeskripsikan perasaan serta motivasi komunitas yang berbeda dengan dirinya yang berada dalam situasi yang sulit.'),
(184, 2, 8, 16, 5, 'Merefleksikan secara kritis gambaran berbagai kelompok budaya yang ditemui dan cara meresponnya.'),
(185, 2, 8, 17, 5, 'Mengkonfirmasi, mengklarifikasi dan menunjukkan sikap menolak stereotip serta prasangka tentang gambaran identitas kelompok dan suku bangsa.'),
(186, 2, 8, 18, 5, 'Mengidentifikasi dan menyampaikan isu-isu tentang penghargaan terhadap keragaman dan kesetaraan budaya.'),
(187, 2, 9, 19, 5, 'Mengidentifikasi masalah yang ada di sekitarnya sebagai akibat dari pilihan yang dilakukan oleh manusia, serta dampak masalah tersebut terhadap sistem ekonomi, sosial dan lingkungan, serta mencari solusi yang memperhatikan prinsip-prinsip keadilan terhadap manusia, alam dan masyarakat'),
(188, 2, 9, 20, 5, 'Berpartisipasi dalam menentukan kriteria dan metode yang disepakati bersama untuk menentukan pilihan dan keputusan untuk kepentingan bersama melalui proses bertukar pikiran secara cermat dan terbuka dengan panduan pendidik'),
(189, 2, 9, 21, 5, 'Memahami konsep hak dan kewajiban serta implikasinya terhadap ekspresi dan perilakunya. Mulai aktif mengambil sikap dan langkah untuk melindungi hak orang/kelompok lain. '),
(190, 3, 10, 22, 5, 'Menyelaraskan tindakan sendiri dengan tindakan orang lain untuk melaksanakan kegiatan dan mencapai tujuan kelompok di lingkungan sekitar, serta memberi semangat kepada orang lain untuk bekerja efektif dan mencapai tujuan bersama.'),
(191, 3, 10, 23, 5, 'Memahami informasi, gagasan, emosi, keterampilan dan keprihatinan yang diungkapkan oleh orang lain menggunakan berbagai simbol dan  media secara efektif, serta  memanfaatkannya untuk  meningkatkan kualitas  hubungan interpersonal guna mencapai tujuan bersama.'),
(192, 3, 10, 24, 5, 'Mendemonstrasikan kegiatan kelompok yang menunjukkan bahwa anggota kelompok dengan kelebihan dan kekurangannya masing masing perlu dan dapat saling membantu memenuhi kebutuhan.'),
(193, 3, 10, 25, 5, 'Membagi peran dan menyelaraskan tindakan dalam kelompok serta menjaga tindakan agar selaras untuk mencapai tujuan bersama.'),
(194, 3, 11, 26, 5, 'Tanggap terhadap lingkungan sosial sesuai dengan tuntutan peran sosialnya dan berkontribusi sesuai dengan kebutuhan masyarakat.'),
(195, 3, 11, 27, 5, 'Menggunakan pengetahuan tentang sebab dan alasan orang lain menampilkan reaksi tertentu untuk menentukan tindakan yang tepat agar orang lain menampilkan respon yang diharapkan.'),
(196, 3, 12, 28, 5, 'Mengupayakan memberi hal yang dianggap penting dan berharga kepada masyarakat yang membutuhkan bantuan di sekitar tempat tinggal'),
(197, 4, 13, 29, 5, 'Membuat penilaian yang realistis terhadap kemampuan dan minat , serta prioritas pengembangan diri berdasarkan pengalaman belajar dan aktivitas lain yang dilakukannya. '),
(198, 4, 13, 30, 5, 'Memonitor kemajuan belajar yang dicapai serta memprediksi tantangan pribadi dan akademik yang akan muncul berlandaskan pada pengalamannya untuk mempertimbangkan strategi belajar yang sesuai.'),
(199, 4, 14, 31, 5, 'Memahami dan memprediksi konsekuensi dari emosi dan pengekspresiannya dan menyusun langkah langkah untuk mengelola emosinya dalam pelaksanaan belajar dan berinteraksi dengan orang lain.'),
(200, 4, 14, 32, 5, 'Merancang strategi yang sesuai untuk menunjang pencapaian tujuan belajar, prestasi, dan pengembangan diri dengan mempertimbangkan kekuatan dan kelemahan dirinya, serta situasi yang dihadapi.'),
(201, 4, 14, 33, 5, 'Mengkritisi efektivitas dirinya dalam bekerja secara mandiri dengan mengidentifikasi hal-hal yang menunjang maupun menghambat dalam mencapai tujuan.'),
(202, 4, 14, 34, 5, 'Berkomitmen dan menjaga konsistensi pencapaian tujuan yang telah direncanakannya untuk mencapai tujuan belajar dan pengembangan diri yang diharapkannya'),
(203, 4, 14, 35, 5, 'Membuat rencana barudengan mengadaptasi, dan memodifikasi strategi yang sudah dibuat ketika upaya sebelumnya tidak berhasil, serta menjalankan kembali  tugasnya dengan keyakinan baru.'),
(204, 5, 15, 36, 5, 'Mengajukan pertanyaan untuk klarifikasi dan interpretasi informasi, serta mencari tahu penyebab dan konsekuensi dari informasi tersebut.'),
(205, 5, 15, 37, 5, 'Mengidentifikasi, mengklarifikasi, dan menganalisis informasi yang relevan serta memprioritaskan beberapa gagasan tertentu.'),
(206, 5, 16, 38, 5, 'Menalar dengan berbagai argumen dalam mengambil suatu simpulan atau keputusan.'),
(207, 5, 17, 39, 5, 'Menjelaskan asumsi yang digunakan, menyadari kecenderungan dan konsekuensi bias pada pemikirannya, serta berusaha mempertimbangkan perspektif yang berbeda.'),
(208, 6, 18, 40, 5, 'Menghubungkan gagasan yang ia miliki dengan informasi atau gagasan baru untuk menghasilkan kombinasi gagasan baru dan imajinatif untuk mengekspresikan pikiran dan/atau perasaannya.'),
(209, 6, 19, 41, 5, 'Mengeksplorasi dan mengekspresikan pikiran dan/atau perasaannya dalam bentuk karya dan/atau tindakan, serta mengevaluasinya dan mempertimbangkan dampaknya bagi orang lain'),
(210, 6, 20, 42, 5, 'Menghasilkan solusialternatif dengan mengadaptasi berbagai gagasan dan umpan balik untuk menghadapi situasi dan permasalahan'),
(211, 1, 1, 1, 6, 'Menerapkan pemahamannya tentang kualitas atau sifat-sifat Tuhan dalam ritual ibadahnya baik ibadah yang bersifat personal maupun sosial.'),
(212, 1, 1, 2, 6, 'Memahami struktur organisasi, unsurunsur utama agama / kepercayaan dalam konteks Indonesia, memahami kontribusi agama/kepercayaan terhadap peradaban dunia.'),
(213, 1, 1, 3, 6, 'Melaksanakan ibadah secara rutin dan mandiri serta menyadari arti penting ibadah tersebut dan berpartisipasi aktif pada kegiatan keagamaan atau kepercayaan'),
(214, 1, 2, 4, 6, 'Menyadari bahwa aturan agama dan sosial merupakan aturan yang baik dan menjadi bagian dari diri sehingga bisa menerapkannya secara bijak dan kontekstual'),
(215, 1, 2, 5, 6, 'Melakukan aktivitas fisik, sosial, dan ibadah secara seimbang.'),
(216, 1, 3, 6, 6, 'Mengidentifikasi hal yang menjadi permasalahan bersama,memberikan alternatif solusi untuk menjembatani perbedaan dengan mengutamakan kemanusiaan.'),
(217, 1, 3, 7, 6, 'Memahami dan menghargai perasaan dan sudut pandang orang dan/atau kelompok lain.'),
(218, 1, 4, 8, 6, 'Mengidentifikasi masalah lingkungan  hidup di tempat ia tinggal dan melakukan langkah-langkah konkret yang bisa dilakukan untuk menghindari kerusakan dan menjaga keharmonisan ekosistem yang ada di lingkungannya.'),
(219, 1, 4, 9, 6, 'Mewujudkan rasa syukur dengan membangun kesadaran peduli lingkungan alam dengan menciptakan dan mengimplementasikan solusi dari permasalahan lingkungan yang ada.'),
(220, 1, 5, 10, 6, 'Menggunakan hak dan melaksanakan kewajiban kewarganegaraan dan terbiasa mendahulukan kepentingan umum di atas kepentingan pribadi sebagai wujud dari keimanannya kepada Tuhan YME.'),
(221, 2, 6, 11, 6, 'Menganalisis pengaruh keanggotaan kelompok lokal, regional, nasional, dan global terhadap pembentukan identitas, termasuk identitas dirinya. Mulai menginternalisasi identitas diri sebagai bagian dari budaya bangsa.'),
(222, 2, 6, 12, 6, 'Menganalisis dinamika budaya yang mencakup pemahaman, kepercayaan, dan praktik keseharian dalam rentang waktu yang panjang dan konteks yang luas.'),
(223, 2, 6, 13, 6, 'mempromosikan pertukaran budaya dan kolaborasi dalam dunia yang saling terhubung serta menunjukkannya dalam perilaku.'),
(224, 2, 7, 14, 6, 'Menganalisis hubungan antara bahasa, pikiran, dan konteks untuk memahami dan meningkatkan komunikasi antarbudaya yang berbeda-beda.'),
(225, 2, 7, 15, 6, 'Menyajikan pandangan yang seimbang mengenai permasalahan yang dapat menimbulkan pertentangan pendapat. Memosisikan orang lain dan budaya yang berbeda darinya secara setara, serta bersedia memberikan pertolongan ketika orang lain berada dalam  situasi sulit.'),
(226, 2, 8, 16, 6, 'Merefleksikan secara kritis dampak dari pengalaman hidup di lingkungan yang beragam terkait dengan perilaku, kepercayaan serta tindakannya terhadap orang lain.'),
(227, 2, 8, 17, 6, 'Mengkritik dan menolak stereotip serta prasangka tentang gambaran identitas kelompok dan suku bangsa serta berinisiatif mengajak orang lain untuk menolak stereotip dan prasangka.'),
(228, 2, 8, 18, 6, 'Mengetahui tantangan dan keuntungan hidup dalam lingkungan dengan budaya yang beragam, serta memahami pentingnya kerukunan antar budaya dalam kehidupan bersama yang harmonis.'),
(229, 2, 9, 19, 6, 'Berinisiatif melakukan suatu tindakan berdasarkan identifikasi masalah untuk mempromosikan keadilan, keamanan ekonomi, menopang ekologi dan demokrasi sambil menghindari kerugian jangka panjang terhadap manusia, alam ataupun masyarakat.'),
(230, 2, 9, 20, 6, 'Berpartisipasi menentukan pilihan dan keputusan untuk kepentingan bersama melalui proses bertukar pikiran secara cermat dan terbuka secara mandiri'),
(231, 2, 9, 21, 6, 'Memahami konsep hak dan kewajiban, serta implikasinya terhadap ekspresi dan perilakunya. Mulai mencari solusi untuk dilema terkait konsep hak dan kewajibannya.'),
(232, 3, 10, 22, 6, 'Membangun tim dan mengelola kerjasama untuk mencapai tujuan bersama sesuai dengan target yang sudah ditentukan.'),
(233, 3, 10, 23, 6, 'Aktif menyimak untuk memahami dan menganalisis informasi, gagasan, emosi, keterampilan dan keprihatinan yang disampaikan oleh orang lain dan kelompok menggunakan berbagai simbol dan media secara efektif, serta menggunakan berbagai strategi komunikasi untuk menyelesaikan masalah guna mencapai berbagai tujuan bersama.'),
(234, 3, 10, 24, 6, 'Menyelaraskan kapasitas kelompok agar para anggota kelompok dapat saling membantu satu sama lain memenuhi kebutuhan mereka baik secara individual maupun kolektif.'),
(235, 3, 10, 25, 6, 'Menyelaraskan dan menjaga tindakan diri dan anggota kelompok agar sesuai antara satu dengan lainnya serta menerima konsekuensi tindakannya dalam rangka mencapai tujuan bersama'),
(236, 3, 11, 26, 6, 'Tanggap terhadap lingkungan sosial sesuai dengan tuntutan peran sosialnya dan berkontribusi sesuai dengan kebutuhan masyarakat untuk menghasilkan keadaan yang lebih baik.'),
(237, 3, 11, 27, 6, 'Melakukan tindakan yang tepat agar orang lain merespon sesuai dengan yang diharapkan dalam rangka penyelesaian pekerjaan dan pencapaian tujuan. '),
(238, 3, 12, 28, 6, 'Mengupayakan memberi hal yang dianggap penting dan berharga kepada orang-orang yang membutuhkan di masyarakat yang lebih luas (negara, dunia)'),
(239, 4, 13, 29, 6, 'Mengidentifikasi kekuatan dan tantangan-tantangan yang akan dihadapi pada konteks pembelajaran, sosial dan pekerjaan yang akan dipilihnya di masa depan.'),
(240, 4, 13, 30, 6, 'Melakukan refleksi terhadap umpan balik dari teman, guru, dan orang dewasa lainnya, serta informasi-informasi karir yang akan dipilihnya untuk menganalisis karakteristik dan keterampilan yang dibutuhkan dalam menunjang atau menghambat karirnya di masa depan.'),
(241, 4, 14, 31, 6, 'Mengendalikan dan menyesuaikan emosi yang dirasakannya secara tepat ketika menghadapi situasi yang menantang dan menekan pada konteks belajar, relasi, dan pekerjaan.'),
(242, 4, 14, 32, 6, 'Mengevaluasi efektivitas strategi pembelajaran digunakannya, serta menetapkan tujuan belajar, prestasi, dan pengembangan diri secara spesifik dan merancang strategi yang sesuai untuk menghadapi tantangan tantangan yang akan dihadapi pada konteks pembelajaran, sosial dan pekerjaan yang akan dipilihnya di masa depan.'),
(243, 4, 14, 33, 6, 'Menentukan prioritas pribadi, berinisiatif mencari dan mengembangkan pengetahuan dan keterampilan yang spesifik sesuai tujuan di masa depan.'),
(244, 4, 14, 34, 6, 'Melakukan tindakan tindakan secara konsisten guna mencapai tujuan karir dan pengembangan dirinya di masa depan, serta berusaha mencari dan melakukan alternatif tindakan lain yang dapat dilakukan ketika menemui\nhambatan.'),
(245, 4, 14, 35, 6, 'Menyesuaikan dan mulai menjalankan rencana dan strategi pengembangan dirinya dengan mempertimbangkan minat dan tuntutan  pada konteks belajar maupun pekerjaan yang akan dijalaninya di masa depan, serta berusaha untuk mengatasi tantangan-tantangan yang ditemui.'),
(246, 5, 15, 36, 6, 'Mengajukan pertanyaan untuk menganalisis secara kritis permasalahan yang kompleks dan abstrak.'),
(247, 5, 15, 37, 6, 'Secara kritis mengklarifikasi serta menganalisis gagasan dan informasi yang kompleks dan abstrak dari berbagai sumber. Memprioritaskan suatu gagasan yang paling relevan dari hasil klarifikasi dan analisis.'),
(248, 5, 16, 38, 6, 'Menganalisis dan mengevaluasi penalaran yang digunakannya dalam menemukan dan mencari solusi serta mengambil keputusan.'),
(249, 5, 17, 39, 6, 'Menjelaskan alasan untuk mendukung pemikirannya dan memikirkan pandangan yang mungkin berlawanan dengan pemikirannya dan mengubah pemikirannya jika diperlukan.'),
(250, 6, 18, 40, 6, 'Menghasilkan gagasan yang beragam untuk mengekspresikan pikiran dan/atau perasaannya, menilai gagasannya, serta memikirkan segala risikonya dengan mempertimbangkan banyak perspektif seperti etika dan nilai kemanusiaan ketika gagasannya direalisasikan.'),
(251, 6, 19, 41, 6, 'Mengeksplorasi dan mengekspresikan pikiran dan/atau perasaannya dalam bentuk karya dan/atau tindakan, serta mengevaluasinya dan mempertimbangkan dampak dan risikonya bagi diri dan lingkungannya dengan menggunakan berbagai perspektif.'),
(252, 6, 20, 42, 6, 'Bereksperimen dengan berbagai pilihan secara kreatif untuk memodifikasi gagasan sesuai dengan perubahan situasi.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `capaian_pembelajaran`
--

CREATE TABLE `capaian_pembelajaran` (
  `id_capaian_pembelajaran` int(10) NOT NULL,
  `id_mapel` int(10) NOT NULL,
  `id_fase` int(10) NOT NULL,
  `capaian_pembelajaran` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `catatan_proses`
--

CREATE TABLE `catatan_proses` (
  `id_catatan_proses` int(10) NOT NULL,
  `id_project` int(10) NOT NULL,
  `id_siswa` int(10) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cp`
--

CREATE TABLE `cp` (
  `id_cp` int(10) NOT NULL,
  `kode_sekolah` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jenjang` int(10) NOT NULL,
  `id_tingkat` int(10) NOT NULL,
  `id_mapel` int(10) NOT NULL,
  `elemen` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cp`
--

INSERT INTO `cp` (`id_cp`, `kode_sekolah`, `id_jenjang`, `id_tingkat`, `id_mapel`, `elemen`, `cp`) VALUES
(1, '25d55ad283aa400af464c76d713c07ad', 4, 10, 10, 'Menyimak', 'Peserta didik mampu mengevaluasi dan mengkreasi informasi berupa gagasan, pikiran, perasaan, pandangan, arahan atau pesan yang akurat dari menyimak berbagai jenis teks (nonfiksi dan fiksi) dalam bentuk monolog, dialog, dan gelar wicara. '),
(2, '25d55ad283aa400af464c76d713c07ad', 4, 10, 10, 'Membaca dan Memirsa', 'Peserta didik mampu mengevaluasi informasi berupa gagasan,pikiran, pandangan, arahan atau pesan dari berbagai jenis teks, misalnya deskripsi, laporan, narasi, rekon, eksplanasi, eksposisi dan diskusi, dari teks\r\nvisual dan audiovisual untuk menemukan makna yang tersurat dan tersirat. Peserta didik menginterpretasi informasi untuk mengungkapkan gagasan dan perasaan simpati, peduli, empati dan/atau pendapat pro/kontra dari teks visual dan audiovisual secara kreatif. Peserta didik menggunakan sumber lain untuk menilai akurasi dan kualitas data serta membandingkan isi teks. '),
(3, '25d55ad283aa400af464c76d713c07ad', 4, 10, 10, 'Berbicara dan Mempresentasikan ', 'Peserta didik mampu mengolah dan menyajikan gagasan, pikiran, pandangan, arahan atau pesan untuk tujuan pengajuan usul, perumusan masalah, dan solusi dalam bentuk monolog, dialog, dan gelar wicara secara logis, runtut, kritis, dan kreatif. Peserta didik mampu mengkreasi ungkapan sesuai dengan norma\r\nkesopanan dalam berkomunikasi. Peserta didik berkontribusi lebih aktif dalam diskusi dengan mempersiapkan materi diskusi, melaksanakan tugas dan fungsi dalam diskusi. Peserta didik mampu\r\nmengungkapkan simpati, empati, peduli, perasaan, dan penghargaan secara kreatif dalam bentuk teks fiksi dan nonfiksi multimodal. '),
(4, '25d55ad283aa400af464c76d713c07ad', 4, 10, 10, 'Menulis', 'Peserta didik mampu menulis gagasan, pikiran, pandangan, arahan atau pesan tertulis untuk berbagai\r\ntujuan secara logis, kritis, dan kreatif dalam bentuk teks informasional dan/atau fiksi. Peserta didik mampu\r\nmenulis teks eksposisi hasil penelitian dan teks fungsional dunia kerja. Peserta didik mampu mengalihwahanakan satu teks ke teks lainnya untuk tujuan ekonomi kreatif. Peserta didik mampu menerbitkan hasil tulisan di media cetak maupun digital.'),
(5, 'd9b23060b2e35363ffc26a13ce882d2d', 4, 10, 15, 'contoh 1', 'COntoh 1'),
(8, '25d55ad283aa400af464c76d713c07ad', 2, 10, 11, 'Menyimak-Berbicara', 'peserta didik menggunakan bahasa Inggris sederhana untuk berinteraksi dalam situasi sosial maupun kelas yang sering digunakan sehari-hari. Peserta didik dapat menggunakan bahasa yang tersusun dalam kegiatan belajar seperti membuat pertanyaan sederhana. Peserta didik mengidentifikasi teks deskripsi sederhana.  '),
(9, '25d55ad283aa400af464c76d713c07ad', 2, 10, 11, 'Membaca-Memirsa Reading-Viewing', 'peserta didik memahami kata-kata yang sering digunakan sehari-hari dan memahami\r\nkata-kata baru dengan bantuan gambar/ilustrasi serta kalimat dalam konteks yang dipahami peserta didik. Peserta didik memahami kosakata akrab dan baru dengan dukungan dariisyarat visual atau petunjuk konteks. Mereka membaca dan menanggapi teks deskripsi sederhana dan familier dalam bentuk teks cetak atau digital, termasuk teks visual, multimodal atau interaktif. Mereka menemukan informasi dasar dalam sebuah kalimat dan menjelaskan topik dalam teks yang dibaca atau dilihat.'),
(12, '25d55ad283aa400af464c76d713c07ad', 2, 2, 11, 'asjdlasldas asdjklaksdasasnlk sadkjlasd', 'jkjsakdlklsadksa ajsdlkjaslkdas sajdlkasd asndlkasdsa kasjdlaskd asdjlkasjdas kajsdlasd asdjklasdlkas askjdlasd asdlasdlas askdjlkas'),
(13, '8cd2f186577678882bd0f01138511e7b', 4, 10, 1, 'aldlamdla amdlamlda amldamlda admlamdla admlamdlda admalmdla aqpepoqe qepqjpeq qelqqe ', 'ajldladla adlald adlmalmdla amdldamdla admlamda damldmla amdladm admamda '),
(14, '30d994152ab27782755bf4aa350af164', 2, 1, 2, 'ashjkahsjka aslkans asnklasn', 'ashaskjsa nsnaknlksa ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dimensi`
--

CREATE TABLE `dimensi` (
  `id_dimensi` int(10) NOT NULL,
  `dimensi` text NOT NULL,
  `sdimensi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dimensi`
--

INSERT INTO `dimensi` (`id_dimensi`, `dimensi`, `sdimensi`) VALUES
(1, 'Beriman, Bertakwa Kepada Tuhan Yang Maha Esa, dan Berakhlak Mulia', 'D1'),
(2, 'Berkebinekaan Global', 'D2'),
(3, 'Bergotong-Royong', 'D3'),
(4, 'Mandiri', 'D4'),
(5, 'Bernalar Kritis', 'D5'),
(6, 'Kreatif', 'D6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dimensi_project`
--

CREATE TABLE `dimensi_project` (
  `id_dimensi_project` int(10) NOT NULL,
  `id_project` int(10) NOT NULL,
  `id_dimensi` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dimensi_project`
--

INSERT INTO `dimensi_project` (`id_dimensi_project`, `id_project`, `id_dimensi`) VALUES
(15, 5, 2),
(16, 5, 2),
(17, 5, 2),
(18, 5, 2),
(19, 5, 6),
(20, 6, 1),
(21, 6, 3),
(22, 6, 6),
(23, 7, 1),
(24, 7, 5),
(25, 7, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ekstra`
--

CREATE TABLE `ekstra` (
  `id_ekstra` int(10) NOT NULL,
  `tahun` int(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `id_siswa` int(10) NOT NULL,
  `pramuka` text NOT NULL,
  `kesenian` text NOT NULL,
  `olahraga` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ekstra`
--

INSERT INTO `ekstra` (`id_ekstra`, `tahun`, `semester`, `id_kelas`, `id_siswa`, `pramuka`, `kesenian`, `olahraga`) VALUES
(3, 1, 1, 16, 234, 'tergabung dalam GUdep SMA Ngeri 1 Tanjung Kelor', '', ''),
(4, 1, 1, 16, 233, '-', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `elemen`
--

CREATE TABLE `elemen` (
  `id_elemen` int(10) NOT NULL,
  `id_dimensi` int(10) NOT NULL,
  `elemen` text NOT NULL,
  `selemen` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `elemen`
--

INSERT INTO `elemen` (`id_elemen`, `id_dimensi`, `elemen`, `selemen`) VALUES
(1, 1, 'Akhlak Beragama', 'D1-E1'),
(2, 1, 'Akhlak Pribadi', 'D1-E2'),
(3, 1, 'Akhlak Kepada Manusia', 'D1-E3'),
(4, 1, 'Akhlak Kepada Alam', 'D1-E4'),
(5, 1, 'Akhlak Bernegara', 'D1-E5'),
(6, 2, 'Mengenal Dan Menghargai Budaya', 'D2-E6'),
(7, 2, 'Komunikasi Dan Interaksi Antar Budaya', 'D2-E7'),
(8, 2, 'Refleksi Dan Bertanggung Jawab Terhadap Pengalaman Kebinekaan', 'D2-E8'),
(9, 2, 'Berkeadilan Sosial', 'D2-E9'),
(10, 3, 'Kolaborasi', 'D3-E10'),
(11, 3, 'Kepedulian', 'D3-E11'),
(12, 3, 'Berbagi', 'D3-E12'),
(13, 4, 'Pemahaman Diri Dan Situasi Yang Dihadapi', 'D4-E13'),
(14, 4, 'Regulasi Diri', 'D4-E14'),
(15, 5, 'Memperoleh Dan Memproses Informasi Dan Gagasan', 'D5-E15'),
(16, 5, 'Menganalisis Dan Mengevaluasi Penalaran Dan Prosedurnya', 'D5-E16'),
(17, 5, 'Refleksi Pemikiran Dan Proses Berpikir', 'D5-E17'),
(18, 6, 'Menghasilkan Gagasan Yang Orisinal', 'D6-E18'),
(19, 6, 'Menghasilkan Karya Dan Tindakan Yang Orisinal', 'D6-E19'),
(20, 6, 'Memiliki Keluwesan Berpikir Dalam Mencari Alternatif Solusi Permasalahan', 'D6-E20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `elemen_cp`
--

CREATE TABLE `elemen_cp` (
  `id_elemen_cp` int(10) NOT NULL,
  `id_cp` int(10) NOT NULL,
  `elemen_cp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `elemen_project`
--

CREATE TABLE `elemen_project` (
  `id_elemen_project` int(10) NOT NULL,
  `id_project` int(10) NOT NULL,
  `id_dimensi` int(10) NOT NULL,
  `id_elemen` int(10) NOT NULL,
  `id_sub_elemen` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `elemen_project`
--

INSERT INTO `elemen_project` (`id_elemen_project`, `id_project`, `id_dimensi`, `id_elemen`, `id_sub_elemen`) VALUES
(28, 5, 2, 6, 11),
(29, 5, 2, 6, 12),
(30, 5, 2, 6, 13),
(31, 5, 2, 7, 14),
(32, 5, 2, 7, 15),
(33, 5, 2, 8, 16),
(34, 5, 2, 8, 17),
(35, 5, 2, 8, 18),
(36, 5, 6, 18, 40),
(37, 5, 6, 19, 41),
(38, 5, 6, 20, 42),
(39, 6, 1, 1, 1),
(40, 6, 1, 1, 3),
(41, 6, 1, 2, 4),
(42, 6, 1, 2, 5),
(43, 6, 1, 4, 9),
(44, 6, 3, 10, 22),
(45, 6, 3, 10, 23),
(46, 6, 3, 12, 28),
(47, 6, 6, 18, 40),
(48, 6, 6, 19, 41),
(49, 6, 6, 20, 42),
(50, 7, 1, 1, 1),
(51, 7, 1, 2, 4),
(52, 7, 1, 4, 8),
(53, 7, 1, 4, 9),
(54, 7, 5, 15, 36),
(55, 7, 5, 16, 38),
(56, 7, 5, 17, 39),
(57, 7, 6, 18, 40),
(58, 7, 6, 19, 41);

-- --------------------------------------------------------

--
-- Struktur dari tabel `fase`
--

CREATE TABLE `fase` (
  `id_fase` int(10) NOT NULL,
  `id_jenjang` int(10) NOT NULL,
  `fase` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fase`
--

INSERT INTO `fase` (`id_fase`, `id_jenjang`, `fase`) VALUES
(1, 1, 'Fase PAUD'),
(2, 2, 'Fase A'),
(3, 2, 'Fase B'),
(4, 2, 'Fase C'),
(5, 3, 'Fase D'),
(6, 4, 'Fase E');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(10) NOT NULL,
  `kode_sekolah` varchar(250) NOT NULL,
  `kode_guru` varchar(250) NOT NULL,
  `nama_guru` text NOT NULL,
  `nip` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `pass` text NOT NULL,
  `password` varchar(250) NOT NULL,
  `penugasan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `kode_sekolah`, `kode_guru`, `nama_guru`, `nip`, `username`, `pass`, `password`, `penugasan`) VALUES
(7, 'd7dce64b93a7a99a9cfe6e796b8d7820', '69948028295967', 'EKA FIRNANDA, S.Pd', '-', '8CJ1JL', '8CJ1JL', '$2y$10$w4M49f6GrJv7lm3fiR.qyeHwJGDJkayg2ieVkJuJGIzoPl8jARmUC', 2),
(8, 'd7dce64b93a7a99a9cfe6e796b8d7820', '69948028416592', 'ERNA HAYATI, S.Pd', '-', 'GHWJBA', 'GHWJBA', '$2y$10$FG7oVW6.JOG9qbJYmvsRs.DOmdX1gPye/e2iA3uXQZoXGmvssvHPi', 2),
(9, '25d55ad283aa400af464c76d713c07ad', '12345678727214', 'SYAIFUL SANGA LIAT', '-', 'GS76O2', 'GS76O2', '$2y$10$7iD88rOEUk7.naRo9iy5OuZuhxFPAFkvdjN/WSgmAL9jCUB6O8X/C', 1),
(11, 'd9b23060b2e35363ffc26a13ce882d2d', '20232331496401', 'H. Asnawi, S.Ag', '-', 'JQPRUU', 'JQPRUU', '$2y$10$GM0NnmfilAF1.f6SqwB5aOrehUKyTxfsWp5q4vPafCmU9A2oDMVoW', 2),
(12, 'd9b23060b2e35363ffc26a13ce882d2d', '20232331274518', 'Ema Hermawati, SE', '-', 'FC4G71', 'FC4G71', '$2y$10$a1bO9DUbDPdTWB/YbMm8q.KMQHwuGS4Sls7PHt5uhaHgya7bZ/uMe', 2),
(13, 'd9b23060b2e35363ffc26a13ce882d2d', '20232331591478', 'Rahman Wahyudin, SH', '-', 'S97C4W', 'S97C4W', '$2y$10$sTORu3FHXEoTQ1KCPjjLGu8BnqPso78O7F6DRP9vtND/uTHPyJaaC', 1),
(14, 'd9b23060b2e35363ffc26a13ce882d2d', '20232331359979', 'Devita Merry K, S.Pd', '-', '6PBRX4', '6PBRX4', '$2y$10$vkcMP9TYJOBz98rd1nJh6ONoJcpf6Kpo7KMcl0xZIFnJH7W4sFSNq', 2),
(15, 'd9b23060b2e35363ffc26a13ce882d2d', '20232331741335', 'Miftahudin, M.Pd', '-', '3K1JLD', '3K1JLD', '$2y$10$U9WBMrlGNmlU3ysJluPEk.KNSzNkIVuYd2M7sz6uhcdqKWg6V28Me', 2),
(16, 'd9b23060b2e35363ffc26a13ce882d2d', '20232331756937', 'Rahman Hakim, S.Pd', '-', 'O1N2M5', 'O1N2M5', '$2y$10$fTeJ2TUupx/0t4GQwxTdSeZAbNoiUlY6Q2MvCb70uHTtLhmGoNWqm', 2),
(17, 'd9b23060b2e35363ffc26a13ce882d2d', '20232331329648', 'Zahid Ali Hamdi, S.Pd', '-', '8SM3KN', '8SM3KN', '$2y$10$b6miqCTqsYDWE/LjCmrTGeY8YNs1P71LU01LeECnPwi/Y5bAOT2ra', 2),
(18, 'd9b23060b2e35363ffc26a13ce882d2d', '20232331295340', 'Dira Destiantie, S.Ak', '-', 'BO54BW', 'BO54BW', '$2y$10$BuxC1hoEu.b6K8ji7xS9dOgg8zpV/4dzqHKoCVwtv7r5YMJhPW3mW', 1),
(19, 'd9b23060b2e35363ffc26a13ce882d2d', '20232331203147', 'Siti Nursipa, S.Si', '-', '3ZRPZF', '3ZRPZF', '$2y$10$7xsAk9J5LeAM/hlAUXNLWew1W87DsMQjexckQj8v6rb73Nx42cT5q', 2),
(20, 'd9b23060b2e35363ffc26a13ce882d2d', '20232331312232', 'Syifa Virda Nurafifah, S.Pd', '-', '6TR4WN', '6TR4WN', '$2y$10$NsImlD60qLl8KeFh01aW4uR9RCwk3aObwwTCLlil6nvhs670ezRqu', 2),
(21, 'd9b23060b2e35363ffc26a13ce882d2d', '20232331420634', 'Bima Purna Raharja, S.Pd', '-', '6NQB85', '6NQB85', '$2y$10$Zbai/smWBt7bXNUToVm4VuopXOzVkcW2bX3To2iV40DpclK.m1Lbu', 2),
(22, 'd9b23060b2e35363ffc26a13ce882d2d', '20232331672170', 'Siti Sopiah, S.Pd', '-', '1MUQFV', '1MUQFV', '$2y$10$bzHQ31uUpCdQHll2ga/IxOXVizosfpkn9dNSNXv3qjImAS6BNwiQW', 2),
(23, 'd9b23060b2e35363ffc26a13ce882d2d', '20232331035844', 'Abdul Aziz Affandi', '-', 'OEH9RU', 'OEH9RU', '$2y$10$zfY9zRE.W7KZK64DF/uZ9OnXOOxWg9xPk8OqmIRHUZGiNBFmP/uly', 2),
(24, 'd9b23060b2e35363ffc26a13ce882d2d', '20232331810750', 'Muhammad Fahri Harizona', '-', 'OS3STN', 'OS3STN', '$2y$10$zIMwcx16g0CWeaW9y7qhZut7gV5j/PFknz1y/E0uMydo6ix.G6/n2', 2),
(25, 'd9b23060b2e35363ffc26a13ce882d2d', '20232331599644', 'FIRMANSYAH', '-', 'JT4EFT', 'JT4EFT', '$2y$10$Rclhpi1zinbO.vafJN5pyuWRImlXHObHvtpT3VrO0wh0IhdscwS.q', 2),
(26, '25d55ad283aa400af464c76d713c07ad', '12345678435151', 'MOHAMAD LAMPARD, S.Pd', '-', '6G6SGB', '6G6SGB', '$2y$10$f/IipSS30lAAgsnpuBRdn.QArY0Nc3hQu.E3D4hIII9XcKk5dJEm.', 2),
(27, 'd7dce64b93a7a99a9cfe6e796b8d7820', '69948028111012', 'ERWINSYAH PUTRA, S.Pd', '198101152014101001', 'POLRNF', 'POLRNF', '$2y$10$Q.NABSOQ4ml1aH7TU0eCoeaRJljv92hofw6/uD/vqAp/7QUR8sCTi', 2),
(28, 'd7dce64b93a7a99a9cfe6e796b8d7820', '69948028560926', 'FITRI NOVIANTI, S.Pd.I', '-', 'D18A5D', 'D18A5D', '$2y$10$4qNw0wCbjEiBINR63GoYSuetAzut3APXzpyNyKaPNlRwnQJn8iCfS', 2),
(29, 'd7dce64b93a7a99a9cfe6e796b8d7820', '69948028587284', 'HARMADI, S.Pd.I', '-', '78CJ6B', '78CJ6B', '$2y$10$tfBloExP1YkfksBi9YBJD.jy2qBcBriCdVp4J00e.7CQCypGsDltS', 2),
(30, 'd7dce64b93a7a99a9cfe6e796b8d7820', '69948028085454', 'ISLAMIATI, S.Pd', '199207282022212008', '32RR3D', '32RR3D', '$2y$10$qpyDo/fmvDXTMsnsdEofSurxy1QNafaZBuEMetFhmk4Yf67Frm4U6', 2),
(31, 'd7dce64b93a7a99a9cfe6e796b8d7820', '69948028660020', 'MITA AGUSTINA, S.Pd', '199001072019032010', 'RP8L1Z', 'RP8L1Z', '$2y$10$1L4f4Yz.Te0SF4vQgvB65..BH8Z3AtFdV4Xfx3ieqGjTvjo3fpFuy', 2),
(32, 'd7dce64b93a7a99a9cfe6e796b8d7820', '69948028928828', 'MOHAMAD RIDWAN KHOLIL, S.Pd', '199302142022211003', 'YTXKKT', 'YTXKKT', '$2y$10$NeWmYg2.amK4cGYF7lCt2.R/O6.wGpoMAA.WJX8RLLui.RnrdX66W', 2),
(33, 'd7dce64b93a7a99a9cfe6e796b8d7820', '69948028793580', 'MUHAMMAD FADLI SURIADI, S.Pd', '199304182019031008', 'TA7725', 'TA7725', '$2y$10$.7Ybi1ylccJGurD0wixV.uFbJSuthfgduNS9EU1pAl/4YfJcccRUi', 2),
(34, 'd7dce64b93a7a99a9cfe6e796b8d7820', '69948028434728', 'NILA SARI, S.Pd.I', '-', 'NZTKYY', 'NZTKYY', '$2y$10$ZZHxJ5NMtfYyI6/LWa6/Fueqra1On.OlPwYPftXOCvNOZDL6Xg/1q', 2),
(35, 'd7dce64b93a7a99a9cfe6e796b8d7820', '69948028552863', 'NOVITA SARI, S.Pd', '199202212019032014', '916W1V', '916W1V', '$2y$10$0gfHOb8JpMPaM/2QbCGEIeWwZOLPUrln73vpRBuwqVb7JEYByLZe.', 2),
(36, 'd7dce64b93a7a99a9cfe6e796b8d7820', '69948028047640', 'RAHMADANIAR, S.Pd', '197808072010032002', '7XXJ41', '7XXJ41', '$2y$10$xwmfhs6IHzQ4VcVUYa.ql.lX9Ms9skkb/Xv6x.l.fHhg8rGO.B8ni', 2),
(37, 'd7dce64b93a7a99a9cfe6e796b8d7820', '69948028015447', 'RENI MUTIA, S.Pd.I', '198906242019032007', 'HMCGBP', 'HMCGBP', '$2y$10$B2EJou1vY4FMzajOjQYiWeczmZ18FnW20EGmmIZS7zNyuqEbyn8Ee', 2),
(38, 'd7dce64b93a7a99a9cfe6e796b8d7820', '69948028066777', 'SUCI RAHMADANI SIREGAR, S.Pd', '199303142019032009', '6OJRQY', '6OJRQY', '$2y$10$lqQ501sWQ1YNGVG1KMQewu.GwuBidGz3kjcpV47OEYSSKIN6dAAme', 2),
(39, 'd7dce64b93a7a99a9cfe6e796b8d7820', '69948028060593', 'SURIANA DEWI RAHAYU, S.Pd', '198311032022212009', '4MBOA6', '4MBOA6', '$2y$10$lP1T9a/Uk5rBzlmSq.KiDOpGnB2dUA4dyejQ0x28SzB/XUEGKALpC', 2),
(40, 'd7dce64b93a7a99a9cfe6e796b8d7820', '69948028213872', 'SITI HALIMAH, S.Pd', '-', '2UJ6K7', '2UJ6K7', '$2y$10$BfZekmR11ruYTTH0phF1ceTj15ZwKeOMJy0Bn6UOuIth1ZN2jLSDe', 2),
(41, 'd7dce64b93a7a99a9cfe6e796b8d7820', '69948028252449', 'SITI HALIMAH, S.Pd', '-', 'OTHLFA', 'OTHLFA', '$2y$10$9rcJ6GEjLnNFXyuZ6SueaOd24w/xpdzrBDokiVYtepMjEw7RitPD2', 1),
(42, 'd7dce64b93a7a99a9cfe6e796b8d7820', '69948028934094', 'SUCI RAHMADANI SIREGAR, S.Pd', '-', 'XOVVJ5', 'XOVVJ5', '$2y$10$CjqMmEcNF8/SwwRahCKXM.rUnQBlDGjctCIAEHUnXinnGCsNvvY.e', 1),
(43, '25d55ad283aa400af464c76d713c07ad', '12345678986417', 'ST. RAHMAH, S.Pd', '-', 'GWMB92', 'GWMB92', '$2y$10$Hs4vNIRs4hFmdV3V9ZevEeJZE.0M60.BtcQcGCLcJs16HwZB8PgEq', 1),
(44, '8cd2f186577678882bd0f01138511e7b', '729055', 'AMA B. MOHAMAD', '-', 'G3WGOE', 'G3WGOE', '$2y$10$6Y7Tj5qTDsOf6woAfqldhOMnTNVg2iCzWBLRp4.9W1fyMZGzNZOFa', 1),
(45, '30d994152ab27782755bf4aa350af164', '50307881404701', 'AMA', '-', 'N86S8Y', 'N86S8Y', '$2y$10$mFBQLdKsF74BuAGLNJg3W.Kq39aPB8GP9ZVRC5EsfcqqoRXoWrYZu', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenjang`
--

CREATE TABLE `jenjang` (
  `id_jenjang` int(10) NOT NULL,
  `jenjang` text NOT NULL,
  `jml_fase` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenjang`
--

INSERT INTO `jenjang` (`id_jenjang`, `jenjang`, `jml_fase`) VALUES
(1, 'PAUD', '1'),
(2, 'SD', '3'),
(3, 'SMP', '1'),
(4, 'SMA', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(10) NOT NULL,
  `kode_sekolah` varchar(250) NOT NULL,
  `tahun` int(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `id_tingkat` int(10) NOT NULL,
  `id_fase` int(10) NOT NULL,
  `nama_kelas` text NOT NULL,
  `id_guru` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kode_sekolah`, `tahun`, `semester`, `id_tingkat`, `id_fase`, `nama_kelas`, `id_guru`) VALUES
(17, '8cd2f186577678882bd0f01138511e7b', 1, 1, 10, 6, 'X - A', 44),
(18, '30d994152ab27782755bf4aa350af164', 1, 1, 1, 2, '1A', 45);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(10) NOT NULL,
  `kode_sekolah` varchar(250) NOT NULL,
  `nama_mapel` text NOT NULL,
  `smapel` text NOT NULL,
  `kategori` int(10) NOT NULL,
  `kelompok` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `kode_sekolah`, `nama_mapel`, `smapel`, `kategori`, `kelompok`) VALUES
(1, '8cd2f186577678882bd0f01138511e7b', 'BAHASA INDONESIA', 'BINDO', 0, 'A'),
(2, '30d994152ab27782755bf4aa350af164', 'BAHASA INDONESIA', 'BINDO', 0, 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel_kelas`
--

CREATE TABLE `mapel_kelas` (
  `id_mapel_kelas` int(10) NOT NULL,
  `kode_sekolah` varchar(250) NOT NULL,
  `tahun` int(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `id_mapel` int(10) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `id_guru` int(10) NOT NULL,
  `kkm_mapel` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mapel_kelas`
--

INSERT INTO `mapel_kelas` (`id_mapel_kelas`, `kode_sekolah`, `tahun`, `semester`, `id_mapel`, `id_kelas`, `id_guru`, `kkm_mapel`) VALUES
(117, '30d994152ab27782755bf4aa350af164', 1, 1, 2, 18, 45, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id_mata_pelajaran` int(10) NOT NULL,
  `id_jenjang` int(10) NOT NULL,
  `kode_mapel` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mata_pelajaran` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id_mata_pelajaran`, `id_jenjang`, `kode_mapel`, `mata_pelajaran`) VALUES
(1, 3, 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti*'),
(2, 3, 'PAKRIS', 'Pendidikan Agama Kristen dan Budi Pekerti*'),
(3, 3, 'PAK', 'Pendidikan Agama Katolik dan Budi Pekerti*'),
(4, 3, 'PABUD', 'Pendidikan Agama Buddha dan Budi Pekerti*'),
(5, 3, 'PAHIN', 'Pendidikan Agama Hindu dan Budi Pekerti*'),
(6, 3, 'PAKHONG', 'Pendidikan Agama Khonghucu dan Budi Pekerti*'),
(7, 3, 'PKn', 'Pendidikan Pancasila'),
(8, 3, 'BINDO', 'Bahasa Indonesia'),
(9, 3, 'MTK', 'Matematika'),
(10, 3, 'IPA', 'Ilmu Pengetahuan Alam'),
(11, 3, 'IPS', 'Ilmu Pengetahuan Sosial'),
(12, 3, 'BING', 'Bahasa Inggris'),
(13, 3, 'PJOK', 'Pendidikan Jasmani Olahraga dan Kesehatan'),
(14, 3, 'INFOR', 'Informatika'),
(15, 3, 'SNMS', 'Seni Musik'),
(16, 3, 'SNRP', 'Seni Rupa'),
(17, 3, 'SNTEA', 'Seni Teater'),
(18, 3, 'SNTR', 'Seni Tari'),
(19, 3, 'PRAKARYA', 'Prakarya'),
(20, 4, 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti*'),
(21, 4, 'PAKRIS', 'Pendidikan Agama Kristen dan Budi Pekerti*'),
(22, 4, 'PAK', 'Pendidikan Agama Katolik dan Budi Pekerti*'),
(23, 4, 'PABUD', 'Pendidikan Agama Buddha dan Budi Pekerti*'),
(24, 4, 'PAHIN', 'Pendidikan Agama Hindu dan Budi Pekerti*'),
(25, 4, 'PAKHONG', 'Pendidikan Agama Khonghucu dan Budi Pekerti*'),
(26, 4, 'PKn', 'Pendidikan Pancasila'),
(27, 4, 'BINDO', 'Bahasa Indonesia'),
(28, 4, 'MTK', 'Matematika'),
(29, 4, 'BING', 'Bahasa Inggris'),
(30, 4, 'PJOK', 'Pendidikan Jasmani Olahraga dan Kesehatan'),
(31, 4, 'SEJ', 'Sejarah'),
(32, 4, 'SNMS', 'Seni Musik'),
(33, 4, 'SNRP', 'Seni Rupa'),
(34, 4, 'SNTEA', 'Seni Teater'),
(35, 4, 'SNTR', 'Seni Tari'),
(36, 4, 'BIO', 'Biologi'),
(37, 4, 'KIM', 'Kimia'),
(38, 4, 'FIS', 'Fisika'),
(39, 4, 'INFOR', 'Informatika'),
(40, 4, 'MTK TL', 'Matematika TL'),
(41, 4, 'SOSIO', 'Sosiologi'),
(42, 4, 'EKON', 'Ekonomi'),
(43, 4, 'GEO', 'Geografi'),
(44, 4, 'ANTRO', 'Antropologi'),
(45, 4, 'BINDO TL', 'Bahasa Indonesia TL'),
(46, 4, 'BING TL', 'Bahasa Inggris TL'),
(47, 4, 'BKOREA', 'Bahasa Korea'),
(48, 4, 'BARAB', 'Bahasa Arab'),
(49, 4, 'BMAND', 'Bahasa Mandarin'),
(50, 4, 'BAJER', 'Bahasa Jerman'),
(51, 4, 'BPRAN', 'Bahasa Prancis'),
(52, 4, 'PRAKARYA', 'Prakarya'),
(53, 4, 'MULOK', 'Muatan Lokal'),
(54, 2, 'PAI', 'Pendidikan Agama Islam dan Budi Pekerti*'),
(55, 2, 'PAKRIS', 'Pendidikan Agama Kristen dan Budi Pekerti*'),
(56, 2, 'PAK', 'Pendidikan Agama Katolik dan Budi Pekerti*'),
(57, 2, 'PABUD', 'Pendidikan Agama Buddha dan Budi Pekerti*'),
(58, 2, 'PAHIN', 'Pendidikan Agama Hindu dan Budi Pekerti*'),
(59, 2, 'PAKHONG', 'Pendidikan Agama Khonghucu dan Budi Pekerti*'),
(60, 2, 'PKn', 'Pendidikan Pancasila'),
(61, 2, 'BINDO', 'Bahasa Indonesia'),
(62, 2, 'MTK', 'Matematika'),
(63, 2, 'IPA', 'Ilmu Pengetahuan Alam'),
(64, 2, 'IPS', 'Ilmu Pengetahuan Sosial'),
(65, 2, 'PJOK', 'Pendidikan Jasmani Olahraga dan Kesehatan'),
(66, 2, 'BING', 'Bahasa Inggris'),
(67, 2, 'SNMS', 'Seni Musik'),
(68, 2, 'SNRP', 'Seni Rupa'),
(69, 2, 'SNTEA', 'Seni Teater'),
(70, 2, 'SNTR', 'Seni Tari'),
(71, 2, 'MULOK', 'Muatan Lokal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(10) NOT NULL,
  `tahun` int(10) NOT NULL,
  `semester` int(11) NOT NULL,
  `id_mapel_kelas` int(10) NOT NULL,
  `materi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id_materi`, `tahun`, `semester`, `id_mapel_kelas`, `materi`) VALUES
(36, 1, 1, 77, ''),
(37, 1, 1, 77, ''),
(38, 1, 1, 85, ''),
(39, 1, 1, 113, ''),
(40, 1, 1, 113, ''),
(41, 1, 1, 113, ''),
(42, 1, 1, 116, ''),
(43, 1, 1, 116, ''),
(44, 1, 1, 116, ''),
(45, 1, 1, 116, ''),
(46, 1, 1, 116, ''),
(47, 1, 1, 116, ''),
(48, 1, 1, 116, ''),
(49, 1, 1, 117, ''),
(50, 1, 1, 117, ''),
(51, 1, 1, 117, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_akhir`
--

CREATE TABLE `nilai_akhir` (
  `id_nilai_akhir` int(10) NOT NULL,
  `tahun` int(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `id_mapel_kelas` int(10) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `id_siswa` int(10) NOT NULL,
  `nilai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai_akhir`
--

INSERT INTO `nilai_akhir` (`id_nilai_akhir`, `tahun`, `semester`, `id_mapel_kelas`, `id_kelas`, `id_siswa`, `nilai`) VALUES
(23, 1, 1, 117, 18, 4, '37'),
(24, 1, 1, 117, 18, 3, '32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_akhir_mid`
--

CREATE TABLE `nilai_akhir_mid` (
  `id_nilai_akhir_mid` int(10) NOT NULL,
  `tahun` int(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `id_mapel_kelas` int(10) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `id_siswa` int(10) NOT NULL,
  `nilai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai_akhir_mid`
--

INSERT INTO `nilai_akhir_mid` (`id_nilai_akhir_mid`, `tahun`, `semester`, `id_mapel_kelas`, `id_kelas`, `id_siswa`, `nilai`) VALUES
(9, 1, 1, 117, 18, 4, '55'),
(10, 1, 1, 117, 18, 3, '48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_proses`
--

CREATE TABLE `nilai_proses` (
  `id_nilai_proses` int(10) NOT NULL,
  `tahun` int(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `mapel_kelas` int(10) NOT NULL,
  `id_pembelajaran` int(10) NOT NULL,
  `id_siswa` int(10) NOT NULL,
  `n_formatif` varchar(20) NOT NULL,
  `n_sumatif` varchar(20) NOT NULL,
  `n_sas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai_proses`
--

INSERT INTO `nilai_proses` (`id_nilai_proses`, `tahun`, `semester`, `mapel_kelas`, `id_pembelajaran`, `id_siswa`, `n_formatif`, `n_sumatif`, `n_sas`) VALUES
(53, 1, 1, 117, 14, 4, '65', '45', ''),
(54, 1, 1, 117, 14, 3, '55', '40', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `n_formatif`
--

CREATE TABLE `n_formatif` (
  `id_nformatif` int(10) NOT NULL,
  `tahun` int(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `id_pembelajaran` int(10) NOT NULL,
  `id_tp` int(10) NOT NULL,
  `id_mapel_kelas` int(10) NOT NULL,
  `id_siswa` int(10) NOT NULL,
  `nilai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `n_formatif`
--

INSERT INTO `n_formatif` (`id_nformatif`, `tahun`, `semester`, `id_pembelajaran`, `id_tp`, `id_mapel_kelas`, `id_siswa`, `nilai`) VALUES
(7, 1, 1, 14, 13, 117, 4, '65'),
(8, 1, 1, 14, 13, 117, 3, '55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `n_sas`
--

CREATE TABLE `n_sas` (
  `id_nsas` int(10) NOT NULL,
  `tahun` int(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `id_pembelajaran` int(10) NOT NULL,
  `id_tp` int(10) NOT NULL,
  `id_mapel_kelas` int(10) NOT NULL,
  `id_siswa` int(10) NOT NULL,
  `nilai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `n_sumatif`
--

CREATE TABLE `n_sumatif` (
  `id_nsumatif` int(10) NOT NULL,
  `tahun` int(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `id_pembelajaran` int(10) NOT NULL,
  `id_tp` int(10) NOT NULL,
  `id_mapel_kelas` int(10) NOT NULL,
  `id_siswa` int(10) NOT NULL,
  `nilai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `n_sumatif`
--

INSERT INTO `n_sumatif` (`id_nsumatif`, `tahun`, `semester`, `id_pembelajaran`, `id_tp`, `id_mapel_kelas`, `id_siswa`, `nilai`) VALUES
(5, 1, 1, 14, 13, 117, 4, '45'),
(6, 1, 1, 14, 13, 117, 3, '40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelajaran`
--

CREATE TABLE `pembelajaran` (
  `id_pembelajaran` int(10) NOT NULL,
  `kode_sekolah` int(10) NOT NULL,
  `tahun` int(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `id_mapel` int(10) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `id_mapel_kelas` int(10) NOT NULL,
  `pembelajaran` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembelajaran`
--

INSERT INTO `pembelajaran` (`id_pembelajaran`, `kode_sekolah`, `tahun`, `semester`, `id_mapel`, `id_kelas`, `id_mapel_kelas`, `pembelajaran`) VALUES
(14, 30, 1, 1, 2, 18, 117, 'Mendeskripsikan Puisi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peniaian_sumatif`
--

CREATE TABLE `peniaian_sumatif` (
  `id_penilaian_sumatif` int(10) NOT NULL,
  `tahun` int(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `mapel_kelas` int(10) NOT NULL,
  `id_pembelajaran` int(10) NOT NULL,
  `id_tp` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peniaian_sumatif`
--

INSERT INTO `peniaian_sumatif` (`id_penilaian_sumatif`, `tahun`, `semester`, `mapel_kelas`, `id_pembelajaran`, `id_tp`) VALUES
(15, 1, 1, 117, 14, 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian_project`
--

CREATE TABLE `penilaian_project` (
  `id_penilaian_project` int(10) NOT NULL,
  `tahun` int(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `id_project` int(10) NOT NULL,
  `id_dimensi` int(10) NOT NULL,
  `id_elemen` int(10) NOT NULL,
  `id_sub_elemen` int(10) NOT NULL,
  `id_siswa` int(10) NOT NULL,
  `nilai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `project`
--

CREATE TABLE `project` (
  `id_project` int(10) NOT NULL,
  `tahun` int(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `nama_project` text NOT NULL,
  `deskripsi_project` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekolah`
--

CREATE TABLE `sekolah` (
  `id_sekolah` int(10) NOT NULL,
  `kode_sekolah` varchar(250) NOT NULL,
  `npsn` varchar(10) NOT NULL,
  `nama_sekolah` text NOT NULL,
  `alamat` text NOT NULL,
  `email` text NOT NULL,
  `website` text NOT NULL,
  `no_telepon` text NOT NULL,
  `username` text NOT NULL,
  `pass` text NOT NULL,
  `password` varchar(250) NOT NULL,
  `kepala_sekolah` text NOT NULL,
  `nip_kepala_sekolah` text NOT NULL,
  `aktif` int(10) NOT NULL,
  `desa` text NOT NULL,
  `kabupaten` text NOT NULL,
  `provinsi` text NOT NULL,
  `jenjang` int(10) NOT NULL,
  `tahun` int(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `logo` text NOT NULL,
  `sinc_lager` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `kode_sekolah`, `npsn`, `nama_sekolah`, `alamat`, `email`, `website`, `no_telepon`, `username`, `pass`, `password`, `kepala_sekolah`, `nip_kepala_sekolah`, `aktif`, `desa`, `kabupaten`, `provinsi`, `jenjang`, `tahun`, `semester`, `logo`, `sinc_lager`) VALUES
(19, '8cd2f186577678882bd0f01138511e7b', '5030182191', 'SMA NEGERI 1 PERCOBAAN', 'Jln. Taman Siswa No. 01', 'sugestion98@gmail.com', 'https://kurikulumkita.com', '081288348595', 'XI98OU', '20517589', '$2y$10$fZjlAIIW2gbEOgcAOHFIceP0uLXQ6s4s5g2AaPlK3wjupLgoPXbte', 'Burhanudin, S.Pd', '-', 1, 'Waiwerang Kota', 'Flores Timur', 'Nusa Tenggara Timur', 4, 1, 1, '', 1),
(21, '30d994152ab27782755bf4aa350af164', '50307881', 'SD PERCOBAA', '', 'sdcoba@gmail.com', '', '081288348590', '50307881', '50307881', '$2y$10$mo.jZspXEMio5.NTuPOKO.Z80lZCC8stXyCHbE7Kdl2zrjeH17msO', '', '', 1, '', '', '', 2, 1, 1, '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `semester`
--

CREATE TABLE `semester` (
  `id_semester` int(10) NOT NULL,
  `semester` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `semester`
--

INSERT INTO `semester` (`id_semester`, `semester`) VALUES
(1, 'Ganjil'),
(2, 'Genap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(10) NOT NULL,
  `kode_sekolah` varchar(250) NOT NULL,
  `nama_siswa` text NOT NULL,
  `nis` varchar(10) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `kelamin` text NOT NULL,
  `agama` text NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `kls` int(10) NOT NULL,
  `alamat_siswa` text NOT NULL,
  `kontak_siswa` varchar(20) NOT NULL,
  `nama_ayah` text NOT NULL,
  `nama_ibu` text NOT NULL,
  `pekerjaan_ayah` text NOT NULL,
  `pekerjaan_ibu` text NOT NULL,
  `alamat_orang_tua` text NOT NULL,
  `kontak_ortu` text NOT NULL,
  `hubungan_dalam_keluarga` text NOT NULL,
  `jumlah_saudara` text NOT NULL,
  `anak_ke` text NOT NULL,
  `nama_wali` text NOT NULL,
  `pekerjaan_wali` text NOT NULL,
  `alamat_wali` text NOT NULL,
  `kontak_wali` text NOT NULL,
  `sekolah_asal` text NOT NULL,
  `tanggal_terima` date NOT NULL,
  `terima_kelas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `kode_sekolah`, `nama_siswa`, `nis`, `nisn`, `kelamin`, `agama`, `tempat_lahir`, `tanggal_lahir`, `kls`, `alamat_siswa`, `kontak_siswa`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `alamat_orang_tua`, `kontak_ortu`, `hubungan_dalam_keluarga`, `jumlah_saudara`, `anak_ke`, `nama_wali`, `pekerjaan_wali`, `alamat_wali`, `kontak_wali`, `sekolah_asal`, `tanggal_terima`, `terima_kelas`) VALUES
(1, '8cd2f186577678882bd0f01138511e7b', 'Mohamad Lampard', '004', '0002817361', 'LAKI-LAKI', 'KONG HU CHU', 'Sukutokan', '2016-04-17', 1, 'Desa Sukutokan, Kec. Kelubagolit', '0', 'Usman Bin Muhamad', 'Siti Nuratika', '-', '-', '-', '-', 'ANAK KANDUNG', '3', '1', '-', '-', '-', '-', 'MTsN 2 Flores Timur', '2022-07-20', '17'),
(2, '8cd2f186577678882bd0f01138511e7b', 'Anggung Hidayatullah Tokan', '005', '0002364718', 'Perempuan', 'Islam', 'Lamablawa', '2016-07-22', 1, 'Desa Sukutokan, Kec. Kelubagolit', '', 'Hidatullah Kwenan Bala', 'Wora Duran', '', '', '', '', '', '3', '1', '', '', '', '', '', '0000-00-00', ''),
(3, '30d994152ab27782755bf4aa350af164', 'Mohamad Lampard', '004', '0002817361', 'Laki-laki', 'Islam', 'Sukutokan', '2016-04-17', 1, 'Desa Sukutokan, Kec. Kelubagolit', '', 'Usman Bin Muhamad', 'Siti Nuratika', '', '', '', '', '', '3', '1', '', '', '', '', 'MTsN 2 Flores Timur', '2022-07-20', 'X 1'),
(4, '30d994152ab27782755bf4aa350af164', 'Anggung Hidayatullah Tokan', '005', '0002364718', 'Perempuan', 'Islam', 'Lamablawa', '2016-07-22', 1, 'Desa Sukutokan, Kec. Kelubagolit', '', 'Hidatullah Kwenan Bala', 'Wora Duran', '', '', '', '', '', '3', '1', '', '', '', '', '', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa_kelas`
--

CREATE TABLE `siswa_kelas` (
  `id_siswa_kelas` int(10) NOT NULL,
  `kode_sekolah` varchar(250) NOT NULL,
  `tahun` int(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `id_siswa` int(10) NOT NULL,
  `id_kelas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa_kelas`
--

INSERT INTO `siswa_kelas` (`id_siswa_kelas`, `kode_sekolah`, `tahun`, `semester`, `id_siswa`, `id_kelas`) VALUES
(1, '8cd2f186577678882bd0f01138511e7b', 1, 1, 2, 17),
(2, '8cd2f186577678882bd0f01138511e7b', 1, 1, 1, 17),
(3, '30d994152ab27782755bf4aa350af164', 1, 1, 4, 18),
(4, '30d994152ab27782755bf4aa350af164', 1, 1, 3, 18);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa_keluar`
--

CREATE TABLE `siswa_keluar` (
  `id_siswa_keluar` int(10) NOT NULL,
  `kode_sekolah` varchar(250) NOT NULL,
  `tahun` int(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `id_siswa` int(10) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `alasan` text NOT NULL,
  `tanggal` date NOT NULL,
  `sekolah_tujuan` text NOT NULL,
  `no_surat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_elemen`
--

CREATE TABLE `sub_elemen` (
  `id_sub_elemen` int(10) NOT NULL,
  `id_dimensi` int(10) NOT NULL,
  `id_elemen` int(10) NOT NULL,
  `sub_elemen` text NOT NULL,
  `ssubelemen` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sub_elemen`
--

INSERT INTO `sub_elemen` (`id_sub_elemen`, `id_dimensi`, `id_elemen`, `sub_elemen`, `ssubelemen`) VALUES
(1, 1, 1, 'Mengenal dan Mencintai Tuhan Yang Maha Esa', 'SS1'),
(2, 1, 1, 'Pemahaman Agama/ Kepercayaan', 'SS2'),
(3, 1, 1, 'Pelaksanaan Ritual Ibadah', 'SS3'),
(4, 1, 2, 'Integritas ', 'SS4'),
(5, 1, 2, 'Merawat Diri secara Fisik, Mental, dan Spiritual', 'SS5'),
(6, 1, 3, 'Mengutamakan persamaan dengan orang lain dan menghargai perbedaan', 'SS6'),
(7, 1, 3, 'Berempati kepada orang lain', 'SS7'),
(8, 1, 4, 'Memahami Keterhubungan  Ekosistem Bumi', 'SS8'),
(9, 1, 4, 'Menjaga Lingkungan Alam Sekitar', 'SS9'),
(10, 1, 5, 'Melaksanakan Hak dan Kewajiban sebagai Warga Negara Indonesia', 'SS10'),
(11, 2, 6, 'Mendalami budaya dan identitas budaya', 'SS11'),
(12, 2, 6, 'Mengeksplorasi dan membandingkan pengetahuan budaya, kepercayaan, serta praktiknya', 'SS12'),
(13, 2, 6, 'Menumbuhkan rasa menghormati terhadap keanekaragaman budaya', 'SS13'),
(14, 2, 7, 'Berkomunikasi antar budaya', 'SS14'),
(15, 2, 7, 'Mempertimbangkan dan menumbuhkan berbagai perspektif', 'SS15'),
(16, 2, 8, 'Refleksi terhadap pengalaman kebinekaan.', 'SS16'),
(17, 2, 8, 'Menghilangkan stereotip dan prasangka', 'SS17'),
(18, 2, 8, 'Menyelaraskan perbedaan budaya', 'SS18'),
(19, 2, 9, 'Aktif membangun masyarakat yang inklusif, adil, dan berkelanjutan', 'SS19'),
(20, 2, 9, 'Berpartisipasi dalam proses pengambilan keputusan bersama', 'SS20'),
(21, 2, 9, 'Memahami peran individu dalam demokrasi', 'SS21'),
(22, 3, 10, 'Kerja sama ', 'SS22'),
(23, 3, 10, 'Komunikasi untuk mencapai tujuan bersama', 'SS23'),
(24, 3, 10, 'Saling ketergantungan positif', 'SS24'),
(25, 3, 10, 'Koordinasi Sosial', 'SS25'),
(26, 3, 11, 'Tanggap terhadap lingkungan Sosial', 'SS26'),
(27, 3, 11, 'Persepsi sosial', 'SS27'),
(28, 3, 12, 'Berbagi', 'SS28'),
(29, 4, 13, 'Mengenali kualitas dan minat diri serta tantangan yang dihadapi', 'SS29'),
(30, 4, 13, 'Mengembangkan refleksi diri', 'SS30'),
(31, 4, 14, 'Regulasi emosi', 'SS31'),
(32, 4, 14, 'Penetapan tujuan belajar, prestasi, dan pengembangan diri serta rencana strategis untuk mencapainya', 'SS32'),
(33, 4, 14, 'Menunjukkan inisiatif dan bekerja secara mandiri', 'SS33'),
(34, 4, 14, 'Mengembangkan pengendalian dan disiplin diri', 'SS34'),
(35, 4, 14, 'Percaya diri, tangguh (resilient), dan adaptif', 'SS35'),
(36, 5, 15, 'Mengajukan pertanyaan', 'SS36'),
(37, 5, 15, 'Mengidentifikasi, mengklarifikasi, dan mengolah informasi dan gagasan', 'SS37'),
(38, 5, 16, 'Menganalisis dan mengevaluasi penalaran dan prosedurnya', 'SS38'),
(39, 5, 17, 'Merefleksi dan mengevaluasi pemikirannya sendiri', 'SS39'),
(40, 6, 18, 'Menghasilkan gagasan yang orisinal', 'SS40'),
(41, 6, 19, 'Menghasilkan karya dan tindakan yang orisinal', 'SS41'),
(42, 6, 20, 'Memiliki keluwesan berpikir dalam mencari alternatif solusi permasalahan', 'SS42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_pelajaran`
--

CREATE TABLE `tahun_pelajaran` (
  `id_tahun_pelajaran` int(10) NOT NULL,
  `tahun_pelajaran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tahun_pelajaran`
--

INSERT INTO `tahun_pelajaran` (`id_tahun_pelajaran`, `tahun_pelajaran`) VALUES
(1, '2022-2023'),
(2, '2023-2024');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tingkat`
--

CREATE TABLE `tingkat` (
  `id_tingkat` int(10) NOT NULL,
  `tingkat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jenjang` int(10) NOT NULL,
  `id_fase` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tingkat`
--

INSERT INTO `tingkat` (`id_tingkat`, `tingkat`, `id_jenjang`, `id_fase`) VALUES
(1, '1', 2, 2),
(2, '2', 2, 2),
(3, '3', 2, 3),
(4, '4', 2, 3),
(5, '5', 2, 4),
(6, '6', 2, 4),
(7, '7', 3, 5),
(8, '8', 3, 5),
(9, '9', 3, 5),
(10, '10', 4, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tp`
--

CREATE TABLE `tp` (
  `id_tp` int(10) NOT NULL,
  `id_cp` int(10) NOT NULL,
  `kode_sekolah` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jenjang` int(10) NOT NULL,
  `id_tingkat` int(10) NOT NULL,
  `id_mapel` int(10) NOT NULL,
  `tp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `panjang_interval` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tp`
--

INSERT INTO `tp` (`id_tp`, `id_cp`, `kode_sekolah`, `id_jenjang`, `id_tingkat`, `id_mapel`, `tp`, `panjang_interval`) VALUES
(13, 14, '30d994152ab27782755bf4aa350af164', 2, 1, 2, 'sisaksaks am skaslkans amnsa ', '40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tp_pancasila`
--

CREATE TABLE `tp_pancasila` (
  `id_tp_pancasila` int(10) NOT NULL,
  `kode_sekolah` int(10) NOT NULL,
  `id_tingkat` int(10) NOT NULL,
  `id_dimensi` int(10) NOT NULL,
  `id_elemen` int(10) NOT NULL,
  `id_sub_elemen` int(10) NOT NULL,
  `tp_pancasila` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tp_pembelajaran`
--

CREATE TABLE `tp_pembelajaran` (
  `id_tp_pembelajaran` int(10) NOT NULL,
  `id_pembelajaran` int(10) NOT NULL,
  `id_cp` int(10) NOT NULL,
  `id_tp` int(10) NOT NULL,
  `id_mapel` int(10) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `id_mapel_kelas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tp_pembelajaran`
--

INSERT INTO `tp_pembelajaran` (`id_tp_pembelajaran`, `id_pembelajaran`, `id_cp`, `id_tp`, `id_mapel`, `id_kelas`, `id_mapel_kelas`) VALUES
(13, 14, 14, 13, 2, 18, 117);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tujuan_pembelajaran`
--

CREATE TABLE `tujuan_pembelajaran` (
  `id_tujuan` int(10) NOT NULL,
  `mapel_kelas` int(10) NOT NULL,
  `id_materi` int(10) NOT NULL,
  `tujuan_pembelajaran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indeks untuk tabel `capaian`
--
ALTER TABLE `capaian`
  ADD PRIMARY KEY (`id_capaian`);

--
-- Indeks untuk tabel `capaian_pembelajaran`
--
ALTER TABLE `capaian_pembelajaran`
  ADD PRIMARY KEY (`id_capaian_pembelajaran`);

--
-- Indeks untuk tabel `catatan_proses`
--
ALTER TABLE `catatan_proses`
  ADD PRIMARY KEY (`id_catatan_proses`);

--
-- Indeks untuk tabel `cp`
--
ALTER TABLE `cp`
  ADD PRIMARY KEY (`id_cp`);

--
-- Indeks untuk tabel `dimensi`
--
ALTER TABLE `dimensi`
  ADD PRIMARY KEY (`id_dimensi`);

--
-- Indeks untuk tabel `dimensi_project`
--
ALTER TABLE `dimensi_project`
  ADD PRIMARY KEY (`id_dimensi_project`);

--
-- Indeks untuk tabel `ekstra`
--
ALTER TABLE `ekstra`
  ADD PRIMARY KEY (`id_ekstra`);

--
-- Indeks untuk tabel `elemen`
--
ALTER TABLE `elemen`
  ADD PRIMARY KEY (`id_elemen`);

--
-- Indeks untuk tabel `elemen_cp`
--
ALTER TABLE `elemen_cp`
  ADD PRIMARY KEY (`id_elemen_cp`);

--
-- Indeks untuk tabel `elemen_project`
--
ALTER TABLE `elemen_project`
  ADD PRIMARY KEY (`id_elemen_project`);

--
-- Indeks untuk tabel `fase`
--
ALTER TABLE `fase`
  ADD PRIMARY KEY (`id_fase`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `jenjang`
--
ALTER TABLE `jenjang`
  ADD PRIMARY KEY (`id_jenjang`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `mapel_kelas`
--
ALTER TABLE `mapel_kelas`
  ADD PRIMARY KEY (`id_mapel_kelas`);

--
-- Indeks untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id_mata_pelajaran`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indeks untuk tabel `nilai_akhir`
--
ALTER TABLE `nilai_akhir`
  ADD PRIMARY KEY (`id_nilai_akhir`);

--
-- Indeks untuk tabel `nilai_akhir_mid`
--
ALTER TABLE `nilai_akhir_mid`
  ADD PRIMARY KEY (`id_nilai_akhir_mid`);

--
-- Indeks untuk tabel `nilai_proses`
--
ALTER TABLE `nilai_proses`
  ADD PRIMARY KEY (`id_nilai_proses`);

--
-- Indeks untuk tabel `n_formatif`
--
ALTER TABLE `n_formatif`
  ADD PRIMARY KEY (`id_nformatif`);

--
-- Indeks untuk tabel `n_sas`
--
ALTER TABLE `n_sas`
  ADD PRIMARY KEY (`id_nsas`);

--
-- Indeks untuk tabel `n_sumatif`
--
ALTER TABLE `n_sumatif`
  ADD PRIMARY KEY (`id_nsumatif`);

--
-- Indeks untuk tabel `pembelajaran`
--
ALTER TABLE `pembelajaran`
  ADD PRIMARY KEY (`id_pembelajaran`);

--
-- Indeks untuk tabel `peniaian_sumatif`
--
ALTER TABLE `peniaian_sumatif`
  ADD PRIMARY KEY (`id_penilaian_sumatif`);

--
-- Indeks untuk tabel `penilaian_project`
--
ALTER TABLE `penilaian_project`
  ADD PRIMARY KEY (`id_penilaian_project`);

--
-- Indeks untuk tabel `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`);

--
-- Indeks untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indeks untuk tabel `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `siswa_kelas`
--
ALTER TABLE `siswa_kelas`
  ADD PRIMARY KEY (`id_siswa_kelas`);

--
-- Indeks untuk tabel `siswa_keluar`
--
ALTER TABLE `siswa_keluar`
  ADD PRIMARY KEY (`id_siswa_keluar`);

--
-- Indeks untuk tabel `sub_elemen`
--
ALTER TABLE `sub_elemen`
  ADD PRIMARY KEY (`id_sub_elemen`);

--
-- Indeks untuk tabel `tahun_pelajaran`
--
ALTER TABLE `tahun_pelajaran`
  ADD PRIMARY KEY (`id_tahun_pelajaran`);

--
-- Indeks untuk tabel `tingkat`
--
ALTER TABLE `tingkat`
  ADD PRIMARY KEY (`id_tingkat`);

--
-- Indeks untuk tabel `tp`
--
ALTER TABLE `tp`
  ADD PRIMARY KEY (`id_tp`);

--
-- Indeks untuk tabel `tp_pancasila`
--
ALTER TABLE `tp_pancasila`
  ADD PRIMARY KEY (`id_tp_pancasila`);

--
-- Indeks untuk tabel `tp_pembelajaran`
--
ALTER TABLE `tp_pembelajaran`
  ADD PRIMARY KEY (`id_tp_pembelajaran`);

--
-- Indeks untuk tabel `tujuan_pembelajaran`
--
ALTER TABLE `tujuan_pembelajaran`
  ADD PRIMARY KEY (`id_tujuan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `capaian`
--
ALTER TABLE `capaian`
  MODIFY `id_capaian` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT untuk tabel `capaian_pembelajaran`
--
ALTER TABLE `capaian_pembelajaran`
  MODIFY `id_capaian_pembelajaran` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `catatan_proses`
--
ALTER TABLE `catatan_proses`
  MODIFY `id_catatan_proses` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `cp`
--
ALTER TABLE `cp`
  MODIFY `id_cp` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `dimensi`
--
ALTER TABLE `dimensi`
  MODIFY `id_dimensi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `dimensi_project`
--
ALTER TABLE `dimensi_project`
  MODIFY `id_dimensi_project` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `ekstra`
--
ALTER TABLE `ekstra`
  MODIFY `id_ekstra` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `elemen`
--
ALTER TABLE `elemen`
  MODIFY `id_elemen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `elemen_cp`
--
ALTER TABLE `elemen_cp`
  MODIFY `id_elemen_cp` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `elemen_project`
--
ALTER TABLE `elemen_project`
  MODIFY `id_elemen_project` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `fase`
--
ALTER TABLE `fase`
  MODIFY `id_fase` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `jenjang`
--
ALTER TABLE `jenjang`
  MODIFY `id_jenjang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `mapel_kelas`
--
ALTER TABLE `mapel_kelas`
  MODIFY `id_mapel_kelas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id_mata_pelajaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `nilai_akhir`
--
ALTER TABLE `nilai_akhir`
  MODIFY `id_nilai_akhir` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `nilai_akhir_mid`
--
ALTER TABLE `nilai_akhir_mid`
  MODIFY `id_nilai_akhir_mid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `nilai_proses`
--
ALTER TABLE `nilai_proses`
  MODIFY `id_nilai_proses` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `n_formatif`
--
ALTER TABLE `n_formatif`
  MODIFY `id_nformatif` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `n_sas`
--
ALTER TABLE `n_sas`
  MODIFY `id_nsas` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `n_sumatif`
--
ALTER TABLE `n_sumatif`
  MODIFY `id_nsumatif` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pembelajaran`
--
ALTER TABLE `pembelajaran`
  MODIFY `id_pembelajaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `peniaian_sumatif`
--
ALTER TABLE `peniaian_sumatif`
  MODIFY `id_penilaian_sumatif` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `penilaian_project`
--
ALTER TABLE `penilaian_project`
  MODIFY `id_penilaian_project` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT untuk tabel `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id_sekolah` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `semester`
--
ALTER TABLE `semester`
  MODIFY `id_semester` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `siswa_kelas`
--
ALTER TABLE `siswa_kelas`
  MODIFY `id_siswa_kelas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `siswa_keluar`
--
ALTER TABLE `siswa_keluar`
  MODIFY `id_siswa_keluar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sub_elemen`
--
ALTER TABLE `sub_elemen`
  MODIFY `id_sub_elemen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `tahun_pelajaran`
--
ALTER TABLE `tahun_pelajaran`
  MODIFY `id_tahun_pelajaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tingkat`
--
ALTER TABLE `tingkat`
  MODIFY `id_tingkat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tp`
--
ALTER TABLE `tp`
  MODIFY `id_tp` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tp_pancasila`
--
ALTER TABLE `tp_pancasila`
  MODIFY `id_tp_pancasila` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tp_pembelajaran`
--
ALTER TABLE `tp_pembelajaran`
  MODIFY `id_tp_pembelajaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tujuan_pembelajaran`
--
ALTER TABLE `tujuan_pembelajaran`
  MODIFY `id_tujuan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
