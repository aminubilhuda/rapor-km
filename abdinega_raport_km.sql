-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2022 at 01:31 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abdinega_raport_km`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
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

-- --------------------------------------------------------

--
-- Table structure for table `capaian`
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
-- Dumping data for table `capaian`
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
-- Table structure for table `capaian_pembelajaran`
--

CREATE TABLE `capaian_pembelajaran` (
  `id_capaian_pembelajaran` int(10) NOT NULL,
  `id_mapel` int(10) NOT NULL,
  `id_fase` int(10) NOT NULL,
  `capaian_pembelajaran` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catatan_proses`
--

CREATE TABLE `catatan_proses` (
  `id_catatan_proses` int(10) NOT NULL,
  `id_project` int(10) NOT NULL,
  `id_siswa` int(10) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cp`
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

-- --------------------------------------------------------

--
-- Table structure for table `dimensi`
--

CREATE TABLE `dimensi` (
  `id_dimensi` int(10) NOT NULL,
  `dimensi` text NOT NULL,
  `sdimensi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dimensi`
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
-- Table structure for table `dimensi_project`
--

CREATE TABLE `dimensi_project` (
  `id_dimensi_project` int(10) NOT NULL,
  `id_project` int(10) NOT NULL,
  `id_dimensi` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ekstra`
--

CREATE TABLE `ekstra` (
  `id_ekstra` int(10) NOT NULL,
  `tahun` int(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `id_siswa` int(10) NOT NULL,
  `pramuka` text NOT NULL,
  `kesenian` text NOT NULL,
  `olahraga` text NOT NULL,
  `id_ekstrakurikuler` int(10) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ekstrakurikuler`
--

CREATE TABLE `ekstrakurikuler` (
  `id_ekstrakurikuler` int(10) NOT NULL,
  `nama_ekstrakurikuler` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ekstrakurikuler`
--

INSERT INTO `ekstrakurikuler` (`id_ekstrakurikuler`, `nama_ekstrakurikuler`) VALUES
(1, 'Pramuka'),
(2, 'Futsal'),
(3, 'Volly'),
(4, 'Musik'),
(5, 'Paskibra'),
(6, 'Jurnalistik'),
(7, 'Tari'),
(8, 'Paduan Suara'),
(9, 'Basket');

-- --------------------------------------------------------

--
-- Table structure for table `elemen`
--

CREATE TABLE `elemen` (
  `id_elemen` int(10) NOT NULL,
  `id_dimensi` int(10) NOT NULL,
  `elemen` text NOT NULL,
  `selemen` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `elemen`
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
-- Table structure for table `elemen_cp`
--

CREATE TABLE `elemen_cp` (
  `id_elemen_cp` int(10) NOT NULL,
  `id_cp` int(10) NOT NULL,
  `elemen_cp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `elemen_project`
--

CREATE TABLE `elemen_project` (
  `id_elemen_project` int(10) NOT NULL,
  `id_project` int(10) NOT NULL,
  `id_dimensi` int(10) NOT NULL,
  `id_elemen` int(10) NOT NULL,
  `id_sub_elemen` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fase`
--

CREATE TABLE `fase` (
  `id_fase` int(10) NOT NULL,
  `id_jenjang` int(10) NOT NULL,
  `fase` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fase`
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
-- Table structure for table `guru`
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
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `kode_sekolah`, `kode_guru`, `nama_guru`, `nip`, `username`, `pass`, `password`, `penugasan`) VALUES
(1, '27f413fac59df2a61af2d488cd55ae06', 'utql', 'Nanang Slamet Mulyono, S.Pd', '-', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 1),
(2, '27f413fac59df2a61af2d488cd55ae06', 'ntjj', 'Sri Djumandani, BA', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(3, '27f413fac59df2a61af2d488cd55ae06', 'rrfd', 'Susmiyati, S.Pd', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(4, '27f413fac59df2a61af2d488cd55ae06', 'qnkh', 'Uswatun Hasanah, S.Pd', '-', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 1),
(5, '27f413fac59df2a61af2d488cd55ae06', 'jkaa', 'Dasa Eka Nugroho, A.Md. Par', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(6, '27f413fac59df2a61af2d488cd55ae06', 'mkwx', 'Agung Pribadi, ST', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(7, '27f413fac59df2a61af2d488cd55ae06', 'xiqr', 'Lia Puji Astutik, S.Pd', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(8, '27f413fac59df2a61af2d488cd55ae06', 'uwtw', 'Novis Eka Prayuda, M.Pd', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(9, '27f413fac59df2a61af2d488cd55ae06', 'kuqd', 'Dra. Tutik Rahayu', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(10, '27f413fac59df2a61af2d488cd55ae06', 'smon', 'Hendra Tonik Geolistianto, S.Pd', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(11, '27f413fac59df2a61af2d488cd55ae06', 'prng', 'Miftakul Huda', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(12, '27f413fac59df2a61af2d488cd55ae06', 'utqh', 'Wibowo Hery Sunaryanto, S.Pd', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(13, '27f413fac59df2a61af2d488cd55ae06', 'rondi', 'Masrondi, S.Sn', '-', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 1),
(14, '27f413fac59df2a61af2d488cd55ae06', 'dbvm', 'Nuriska Qodriyawanti, S.Pd', '-', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 1),
(15, '27f413fac59df2a61af2d488cd55ae06', 'mqvn', 'Nuzulul Nurhayati, S.Si', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(16, '27f413fac59df2a61af2d488cd55ae06', 'mmkl', 'Muhari, SH', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(17, '27f413fac59df2a61af2d488cd55ae06', 'rklg', 'Eko Setia Budi, S.Pd', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(18, '27f413fac59df2a61af2d488cd55ae06', 'xnao', 'Fahmi Rahmawati, S.Pd.I', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(19, '27f413fac59df2a61af2d488cd55ae06', 'pyupyupyu', 'Dyah Ayu Maulidina Munitasari, S.Pd', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(20, '27f413fac59df2a61af2d488cd55ae06', 'abcde', 'Suryawanto, S.Pd', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(21, '27f413fac59df2a61af2d488cd55ae06', 'jiua', 'Nurul Khoiriyah, S.Pd', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(22, '27f413fac59df2a61af2d488cd55ae06', 'msdj', 'Samiadi, S.Pd', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(23, '27f413fac59df2a61af2d488cd55ae06', 'notq', 'Agus Tyas Ferry Firmansyah, S.Pd', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(24, '27f413fac59df2a61af2d488cd55ae06', 'tguk', 'Herlina Faizah, S.PdI', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(25, '27f413fac59df2a61af2d488cd55ae06', 'sonymurdianto', 'Sony Murdianto, S.Kom', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(26, '27f413fac59df2a61af2d488cd55ae06', 'erfin', 'Erfin Midhiawati Sani Putranti, S.Farm, Apt', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(27, '27f413fac59df2a61af2d488cd55ae06', 'valen', 'Valentino C., S.Farm, Apt', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(28, '27f413fac59df2a61af2d488cd55ae06', 'qonis', 'Konis Zaitun, Amd. Keb', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(29, '27f413fac59df2a61af2d488cd55ae06', 'iwan', 'Setiawan, S.Pd', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(30, '27f413fac59df2a61af2d488cd55ae06', 'huda', 'Moch. Nurul Huda, S.Kom', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(31, '27f413fac59df2a61af2d488cd55ae06', 'rista', 'Rista Yuli Astuti, S.Pd', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(32, '27f413fac59df2a61af2d488cd55ae06', 'mobb', 'Siti Ely Noviyanti, S.Pd.I', '-', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 1),
(33, '27f413fac59df2a61af2d488cd55ae06', 'yanni', 'Yanny Husain Kusuma, S.Pd', '-', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 1),
(34, '27f413fac59df2a61af2d488cd55ae06', 'sisca', 'Sisca Silviana, S.Pd', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(35, '27f413fac59df2a61af2d488cd55ae06', 'destri', 'Destri Cahyono, S.Pd', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(36, '27f413fac59df2a61af2d488cd55ae06', 'retno', 'Retno Dewi Rengganis, S.Sn', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(37, '27f413fac59df2a61af2d488cd55ae06', 'inez', 'Inez Galuh Aprilian, S.Pd', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(38, '27f413fac59df2a61af2d488cd55ae06', 'oktia', 'Oktia Sulistyorini, S.Pd', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(39, '27f413fac59df2a61af2d488cd55ae06', 'agus', 'Agustian Franciska A.W, S.ST.Par', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(40, '27f413fac59df2a61af2d488cd55ae06', 'hanif', 'Hanif Arifani Akbar, S.Farm.Apt', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(41, '27f413fac59df2a61af2d488cd55ae06', 'ami', 'Siti Aminur Rohmawati, S.Pd', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(42, '27f413fac59df2a61af2d488cd55ae06', 'eko', 'Eko Puji Santoso, S.Pd', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(43, '27f413fac59df2a61af2d488cd55ae06', 'zaeni', 'Zaeni, S.Th', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(44, '27f413fac59df2a61af2d488cd55ae06', 'kpjt', 'Tarno', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(45, '27f413fac59df2a61af2d488cd55ae06', 'hanik', 'Umu Hanik, S.Ak', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(46, '27f413fac59df2a61af2d488cd55ae06', 'fitri', 'Nur Laili Fitria', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(47, '27f413fac59df2a61af2d488cd55ae06', 'frdv', 'Sonny Wahyu FA, SE', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(48, '27f413fac59df2a61af2d488cd55ae06', 'votv', 'Kuspriyono, S.Pd', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(49, '27f413fac59df2a61af2d488cd55ae06', 'gmxo', 'Adi Aryo', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(50, '27f413fac59df2a61af2d488cd55ae06', 'anto', 'Tri Sulisyanto, S.Pd', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(51, '27f413fac59df2a61af2d488cd55ae06', 'kamallita', 'Kamallita Wahyu S, S.Farm, Apt', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(52, '27f413fac59df2a61af2d488cd55ae06', 'lina', 'Lin Ningsih Agustina, S.Pd', '-', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 1),
(53, '27f413fac59df2a61af2d488cd55ae06', 'hendrik', 'Hendrik Dwi Cahyono, S.Pd', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(54, '27f413fac59df2a61af2d488cd55ae06', 'roziqin', 'Drs. Roziqin', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(55, '27f413fac59df2a61af2d488cd55ae06', 'aminu', 'Aminu Bil Huda', '-', '12345678', '12345678', '$2y$10$7TFk8c5suMtQ8ta3UZwNsO7jbEUpgLk4csusurQ9ITPZG31i5tFaa', 1),
(56, '27f413fac59df2a61af2d488cd55ae06', 'joko', 'Joko', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(57, '27f413fac59df2a61af2d488cd55ae06', 'akbar', 'Nur Akbar Ashomad', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(58, '27f413fac59df2a61af2d488cd55ae06', 'danang', 'Danang Dwi Putra', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2),
(59, '27f413fac59df2a61af2d488cd55ae06', 'piket', 'Input Absensi Piket Semua', '', '12345678', '12345678', '$2y$10$Stb7XK7d9Psf57TVXnerUeBGoKwLDc4y65B9u1Ycp.6AgJRGoxXk6', 2);

-- --------------------------------------------------------

--
-- Table structure for table `jenjang`
--

CREATE TABLE `jenjang` (
  `id_jenjang` int(10) NOT NULL,
  `jenjang` text NOT NULL,
  `jml_fase` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenjang`
--

INSERT INTO `jenjang` (`id_jenjang`, `jenjang`, `jml_fase`) VALUES
(1, 'PAUD', '1'),
(2, 'SD', '3'),
(3, 'SMP', '1'),
(4, 'SMA', '1');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
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

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(10) NOT NULL,
  `kode_sekolah` varchar(250) NOT NULL,
  `nama_mapel` text NOT NULL,
  `smapel` text NOT NULL,
  `kategori` int(10) NOT NULL,
  `kelompok` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mapel_kelas`
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

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id_mata_pelajaran` int(10) NOT NULL,
  `id_jenjang` int(10) NOT NULL,
  `kode_mapel` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mata_pelajaran` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(10) NOT NULL,
  `tahun` int(10) NOT NULL,
  `semester` int(11) NOT NULL,
  `id_mapel_kelas` int(10) NOT NULL,
  `materi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_akhir`
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

-- --------------------------------------------------------

--
-- Table structure for table `nilai_akhir_mid`
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

-- --------------------------------------------------------

--
-- Table structure for table `nilai_proses`
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

-- --------------------------------------------------------

--
-- Table structure for table `n_formatif`
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

-- --------------------------------------------------------

--
-- Table structure for table `n_sas`
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
-- Table structure for table `n_sumatif`
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

-- --------------------------------------------------------

--
-- Table structure for table `pembelajaran`
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

-- --------------------------------------------------------

--
-- Table structure for table `peniaian_sumatif`
--

CREATE TABLE `peniaian_sumatif` (
  `id_penilaian_sumatif` int(10) NOT NULL,
  `tahun` int(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `mapel_kelas` int(10) NOT NULL,
  `id_pembelajaran` int(10) NOT NULL,
  `id_tp` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_project`
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
-- Table structure for table `project`
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
-- Table structure for table `sekolah`
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
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `kode_sekolah`, `npsn`, `nama_sekolah`, `alamat`, `email`, `website`, `no_telepon`, `username`, `pass`, `password`, `kepala_sekolah`, `nip_kepala_sekolah`, `aktif`, `desa`, `kabupaten`, `provinsi`, `jenjang`, `tahun`, `semester`, `logo`, `sinc_lager`) VALUES
(1, '27f413fac59df2a61af2d488cd55ae06', '20505005', 'SMK ABDI NEGARA TUBAN', 'Jl. Dr Wahidin Sudirohusodo No. 798, Tuban', 'smk.abdinegara798@gmail.com', 'smkabdinegara.sch.id', '+6285707357080', '20505005', '20505005', '$2y$10$NR0AYtIRMiHZfj7yFoju9OkK4lnvrJoW5qBlGXgdWvMq3sXuSoe4G', 'NANANG SLAMET MULYONO., S.Pd., M.Pd.', '-', 1, 'Sidorejo', 'Tuban', 'Jawa Timur', 4, 1, 1, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id_semester` int(10) NOT NULL,
  `semester` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id_semester`, `semester`) VALUES
(1, 'Ganjil'),
(2, 'Genap');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(10) NOT NULL,
  `kode_sekolah` varchar(250) NOT NULL,
  `nama_siswa` text NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nisn` varchar(20) NOT NULL,
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
  `terima_kelas` text NOT NULL,
  `aktif` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `siswa_kelas`
--

CREATE TABLE `siswa_kelas` (
  `id_siswa_kelas` int(10) NOT NULL,
  `kode_sekolah` varchar(250) NOT NULL,
  `tahun` int(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `id_siswa` int(10) NOT NULL,
  `id_kelas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `siswa_keluar`
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
-- Table structure for table `sub_elemen`
--

CREATE TABLE `sub_elemen` (
  `id_sub_elemen` int(10) NOT NULL,
  `id_dimensi` int(10) NOT NULL,
  `id_elemen` int(10) NOT NULL,
  `sub_elemen` text NOT NULL,
  `ssubelemen` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_elemen`
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
-- Table structure for table `tahun_pelajaran`
--

CREATE TABLE `tahun_pelajaran` (
  `id_tahun_pelajaran` int(10) NOT NULL,
  `tahun_pelajaran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahun_pelajaran`
--

INSERT INTO `tahun_pelajaran` (`id_tahun_pelajaran`, `tahun_pelajaran`) VALUES
(1, '2022-2023'),
(2, '2023-2024');

-- --------------------------------------------------------

--
-- Table structure for table `tingkat`
--

CREATE TABLE `tingkat` (
  `id_tingkat` int(10) NOT NULL,
  `tingkat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jenjang` int(10) NOT NULL,
  `id_fase` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tingkat`
--

INSERT INTO `tingkat` (`id_tingkat`, `tingkat`, `id_jenjang`, `id_fase`) VALUES
(1, 'SMK', 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tp`
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

-- --------------------------------------------------------

--
-- Table structure for table `tp_pancasila`
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
-- Table structure for table `tp_pembelajaran`
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

-- --------------------------------------------------------

--
-- Table structure for table `tujuan_pembelajaran`
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
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `capaian`
--
ALTER TABLE `capaian`
  ADD PRIMARY KEY (`id_capaian`),
  ADD KEY `id_materi` (`id_materi`),
  ADD KEY `id_elemen` (`id_elemen`),
  ADD KEY `id_sub_elemen` (`id_sub_elemen`),
  ADD KEY `id_fase` (`id_fase`);

--
-- Indexes for table `capaian_pembelajaran`
--
ALTER TABLE `capaian_pembelajaran`
  ADD PRIMARY KEY (`id_capaian_pembelajaran`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_fase` (`id_fase`);

--
-- Indexes for table `catatan_proses`
--
ALTER TABLE `catatan_proses`
  ADD PRIMARY KEY (`id_catatan_proses`),
  ADD KEY `id_project` (`id_project`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `cp`
--
ALTER TABLE `cp`
  ADD PRIMARY KEY (`id_cp`),
  ADD KEY `id_jenjang` (`id_jenjang`),
  ADD KEY `id_tingkat` (`id_tingkat`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indexes for table `dimensi`
--
ALTER TABLE `dimensi`
  ADD PRIMARY KEY (`id_dimensi`);

--
-- Indexes for table `dimensi_project`
--
ALTER TABLE `dimensi_project`
  ADD PRIMARY KEY (`id_dimensi_project`),
  ADD KEY `id_project` (`id_project`),
  ADD KEY `id_dimensi` (`id_dimensi`);

--
-- Indexes for table `ekstra`
--
ALTER TABLE `ekstra`
  ADD PRIMARY KEY (`id_ekstra`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_ekstrakurikuler` (`id_ekstrakurikuler`);

--
-- Indexes for table `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
  ADD PRIMARY KEY (`id_ekstrakurikuler`);

--
-- Indexes for table `elemen`
--
ALTER TABLE `elemen`
  ADD PRIMARY KEY (`id_elemen`),
  ADD KEY `id_dimensi` (`id_dimensi`);

--
-- Indexes for table `elemen_cp`
--
ALTER TABLE `elemen_cp`
  ADD PRIMARY KEY (`id_elemen_cp`),
  ADD KEY `id_cp` (`id_cp`);

--
-- Indexes for table `elemen_project`
--
ALTER TABLE `elemen_project`
  ADD PRIMARY KEY (`id_elemen_project`),
  ADD KEY `id_project` (`id_project`),
  ADD KEY `id_dimensi` (`id_dimensi`),
  ADD KEY `id_elemen` (`id_elemen`),
  ADD KEY `id_sub_elemen` (`id_sub_elemen`);

--
-- Indexes for table `fase`
--
ALTER TABLE `fase`
  ADD PRIMARY KEY (`id_fase`),
  ADD KEY `id_jenjang` (`id_jenjang`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `jenjang`
--
ALTER TABLE `jenjang`
  ADD PRIMARY KEY (`id_jenjang`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_tingkat` (`id_tingkat`),
  ADD KEY `id_fase` (`id_fase`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `mapel_kelas`
--
ALTER TABLE `mapel_kelas`
  ADD PRIMARY KEY (`id_mapel_kelas`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id_mata_pelajaran`),
  ADD KEY `id_jenjang` (`id_jenjang`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `id_mapel_kelas` (`id_mapel_kelas`);

--
-- Indexes for table `nilai_akhir`
--
ALTER TABLE `nilai_akhir`
  ADD PRIMARY KEY (`id_nilai_akhir`),
  ADD KEY `id_mapel_kelas` (`id_mapel_kelas`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `nilai_akhir_mid`
--
ALTER TABLE `nilai_akhir_mid`
  ADD PRIMARY KEY (`id_nilai_akhir_mid`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_mapel_kelas` (`id_mapel_kelas`);

--
-- Indexes for table `nilai_proses`
--
ALTER TABLE `nilai_proses`
  ADD PRIMARY KEY (`id_nilai_proses`),
  ADD KEY `id_pembelajaran` (`id_pembelajaran`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `n_formatif`
--
ALTER TABLE `n_formatif`
  ADD PRIMARY KEY (`id_nformatif`),
  ADD KEY `id_pembelajaran` (`id_pembelajaran`),
  ADD KEY `id_tp` (`id_tp`),
  ADD KEY `id_mapel_kelas` (`id_mapel_kelas`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `n_sas`
--
ALTER TABLE `n_sas`
  ADD PRIMARY KEY (`id_nsas`),
  ADD KEY `id_pembelajaran` (`id_pembelajaran`),
  ADD KEY `id_tp` (`id_tp`),
  ADD KEY `id_mapel_kelas` (`id_mapel_kelas`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `n_sumatif`
--
ALTER TABLE `n_sumatif`
  ADD PRIMARY KEY (`id_nsumatif`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_mapel_kelas` (`id_mapel_kelas`),
  ADD KEY `id_tp` (`id_tp`),
  ADD KEY `id_pembelajaran` (`id_pembelajaran`);

--
-- Indexes for table `pembelajaran`
--
ALTER TABLE `pembelajaran`
  ADD PRIMARY KEY (`id_pembelajaran`),
  ADD KEY `id_mapel_kelas` (`id_mapel_kelas`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `peniaian_sumatif`
--
ALTER TABLE `peniaian_sumatif`
  ADD PRIMARY KEY (`id_penilaian_sumatif`),
  ADD KEY `id_pembelajaran` (`id_pembelajaran`),
  ADD KEY `id_tp` (`id_tp`);

--
-- Indexes for table `penilaian_project`
--
ALTER TABLE `penilaian_project`
  ADD PRIMARY KEY (`id_penilaian_project`),
  ADD KEY `id_project` (`id_project`),
  ADD KEY `id_dimensi` (`id_dimensi`),
  ADD KEY `id_elemen` (`id_elemen`),
  ADD KEY `id_sub_elemen` (`id_sub_elemen`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `siswa_kelas`
--
ALTER TABLE `siswa_kelas`
  ADD PRIMARY KEY (`id_siswa_kelas`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `siswa_keluar`
--
ALTER TABLE `siswa_keluar`
  ADD PRIMARY KEY (`id_siswa_keluar`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `sub_elemen`
--
ALTER TABLE `sub_elemen`
  ADD PRIMARY KEY (`id_sub_elemen`),
  ADD KEY `id_dimensi` (`id_dimensi`),
  ADD KEY `id_elemen` (`id_elemen`);

--
-- Indexes for table `tahun_pelajaran`
--
ALTER TABLE `tahun_pelajaran`
  ADD PRIMARY KEY (`id_tahun_pelajaran`);

--
-- Indexes for table `tingkat`
--
ALTER TABLE `tingkat`
  ADD PRIMARY KEY (`id_tingkat`),
  ADD KEY `id_jenjang` (`id_jenjang`),
  ADD KEY `id_fase` (`id_fase`);

--
-- Indexes for table `tp`
--
ALTER TABLE `tp`
  ADD PRIMARY KEY (`id_tp`),
  ADD KEY `id_cp` (`id_cp`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_tingkat` (`id_tingkat`),
  ADD KEY `id_jenjang` (`id_jenjang`);

--
-- Indexes for table `tp_pancasila`
--
ALTER TABLE `tp_pancasila`
  ADD PRIMARY KEY (`id_tp_pancasila`),
  ADD KEY `id_tingkat` (`id_tingkat`),
  ADD KEY `id_dimensi` (`id_dimensi`),
  ADD KEY `id_elemen` (`id_elemen`),
  ADD KEY `id_sub_elemen` (`id_sub_elemen`);

--
-- Indexes for table `tp_pembelajaran`
--
ALTER TABLE `tp_pembelajaran`
  ADD PRIMARY KEY (`id_tp_pembelajaran`),
  ADD KEY `id_pembelajaran` (`id_pembelajaran`),
  ADD KEY `id_mapel_kelas` (`id_mapel_kelas`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_tp` (`id_tp`),
  ADD KEY `id_cp` (`id_cp`);

--
-- Indexes for table `tujuan_pembelajaran`
--
ALTER TABLE `tujuan_pembelajaran`
  ADD PRIMARY KEY (`id_tujuan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `capaian`
--
ALTER TABLE `capaian`
  MODIFY `id_capaian` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `capaian_pembelajaran`
--
ALTER TABLE `capaian_pembelajaran`
  MODIFY `id_capaian_pembelajaran` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `catatan_proses`
--
ALTER TABLE `catatan_proses`
  MODIFY `id_catatan_proses` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cp`
--
ALTER TABLE `cp`
  MODIFY `id_cp` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dimensi`
--
ALTER TABLE `dimensi`
  MODIFY `id_dimensi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dimensi_project`
--
ALTER TABLE `dimensi_project`
  MODIFY `id_dimensi_project` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ekstra`
--
ALTER TABLE `ekstra`
  MODIFY `id_ekstra` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
  MODIFY `id_ekstrakurikuler` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `elemen`
--
ALTER TABLE `elemen`
  MODIFY `id_elemen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `elemen_cp`
--
ALTER TABLE `elemen_cp`
  MODIFY `id_elemen_cp` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `elemen_project`
--
ALTER TABLE `elemen_project`
  MODIFY `id_elemen_project` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `fase`
--
ALTER TABLE `fase`
  MODIFY `id_fase` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `jenjang`
--
ALTER TABLE `jenjang`
  MODIFY `id_jenjang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mapel_kelas`
--
ALTER TABLE `mapel_kelas`
  MODIFY `id_mapel_kelas` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id_mata_pelajaran` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai_akhir`
--
ALTER TABLE `nilai_akhir`
  MODIFY `id_nilai_akhir` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai_akhir_mid`
--
ALTER TABLE `nilai_akhir_mid`
  MODIFY `id_nilai_akhir_mid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai_proses`
--
ALTER TABLE `nilai_proses`
  MODIFY `id_nilai_proses` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `n_formatif`
--
ALTER TABLE `n_formatif`
  MODIFY `id_nformatif` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `n_sas`
--
ALTER TABLE `n_sas`
  MODIFY `id_nsas` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `n_sumatif`
--
ALTER TABLE `n_sumatif`
  MODIFY `id_nsumatif` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembelajaran`
--
ALTER TABLE `pembelajaran`
  MODIFY `id_pembelajaran` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peniaian_sumatif`
--
ALTER TABLE `peniaian_sumatif`
  MODIFY `id_penilaian_sumatif` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penilaian_project`
--
ALTER TABLE `penilaian_project`
  MODIFY `id_penilaian_project` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id_sekolah` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id_semester` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa_kelas`
--
ALTER TABLE `siswa_kelas`
  MODIFY `id_siswa_kelas` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa_keluar`
--
ALTER TABLE `siswa_keluar`
  MODIFY `id_siswa_keluar` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_elemen`
--
ALTER TABLE `sub_elemen`
  MODIFY `id_sub_elemen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tahun_pelajaran`
--
ALTER TABLE `tahun_pelajaran`
  MODIFY `id_tahun_pelajaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tingkat`
--
ALTER TABLE `tingkat`
  MODIFY `id_tingkat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tp`
--
ALTER TABLE `tp`
  MODIFY `id_tp` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tp_pancasila`
--
ALTER TABLE `tp_pancasila`
  MODIFY `id_tp_pancasila` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tp_pembelajaran`
--
ALTER TABLE `tp_pembelajaran`
  MODIFY `id_tp_pembelajaran` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tujuan_pembelajaran`
--
ALTER TABLE `tujuan_pembelajaran`
  MODIFY `id_tujuan` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `absensi_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `capaian`
--
ALTER TABLE `capaian`
  ADD CONSTRAINT `capaian_ibfk_1` FOREIGN KEY (`id_fase`) REFERENCES `fase` (`id_fase`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `capaian_ibfk_2` FOREIGN KEY (`id_elemen`) REFERENCES `elemen` (`id_elemen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `capaian_pembelajaran`
--
ALTER TABLE `capaian_pembelajaran`
  ADD CONSTRAINT `capaian_pembelajaran_ibfk_1` FOREIGN KEY (`id_fase`) REFERENCES `fase` (`id_fase`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `capaian_pembelajaran_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `catatan_proses`
--
ALTER TABLE `catatan_proses`
  ADD CONSTRAINT `catatan_proses_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `catatan_proses_ibfk_2` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cp`
--
ALTER TABLE `cp`
  ADD CONSTRAINT `cp_ibfk_1` FOREIGN KEY (`id_jenjang`) REFERENCES `jenjang` (`id_jenjang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cp_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cp_ibfk_3` FOREIGN KEY (`id_tingkat`) REFERENCES `tingkat` (`id_tingkat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dimensi_project`
--
ALTER TABLE `dimensi_project`
  ADD CONSTRAINT `dimensi_project_ibfk_1` FOREIGN KEY (`id_dimensi`) REFERENCES `dimensi` (`id_dimensi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dimensi_project_ibfk_2` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ekstra`
--
ALTER TABLE `ekstra`
  ADD CONSTRAINT `ekstra_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ekstra_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ekstra_ibfk_3` FOREIGN KEY (`id_ekstrakurikuler`) REFERENCES `ekstrakurikuler` (`id_ekstrakurikuler`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `elemen`
--
ALTER TABLE `elemen`
  ADD CONSTRAINT `elemen_ibfk_1` FOREIGN KEY (`id_dimensi`) REFERENCES `dimensi` (`id_dimensi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `elemen_cp`
--
ALTER TABLE `elemen_cp`
  ADD CONSTRAINT `elemen_cp_ibfk_1` FOREIGN KEY (`id_cp`) REFERENCES `cp` (`id_cp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `elemen_project`
--
ALTER TABLE `elemen_project`
  ADD CONSTRAINT `elemen_project_ibfk_1` FOREIGN KEY (`id_dimensi`) REFERENCES `dimensi` (`id_dimensi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `elemen_project_ibfk_2` FOREIGN KEY (`id_elemen`) REFERENCES `elemen` (`id_elemen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `elemen_project_ibfk_3` FOREIGN KEY (`id_sub_elemen`) REFERENCES `sub_elemen` (`id_sub_elemen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `elemen_project_ibfk_4` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fase`
--
ALTER TABLE `fase`
  ADD CONSTRAINT `fase_ibfk_1` FOREIGN KEY (`id_jenjang`) REFERENCES `jenjang` (`id_jenjang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_tingkat`) REFERENCES `tingkat` (`id_tingkat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_ibfk_2` FOREIGN KEY (`id_fase`) REFERENCES `fase` (`id_fase`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mapel_kelas`
--
ALTER TABLE `mapel_kelas`
  ADD CONSTRAINT `mapel_kelas_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mapel_kelas_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD CONSTRAINT `mata_pelajaran_ibfk_1` FOREIGN KEY (`id_jenjang`) REFERENCES `jenjang` (`id_jenjang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`id_mapel_kelas`) REFERENCES `mapel_kelas` (`id_mapel_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai_akhir`
--
ALTER TABLE `nilai_akhir`
  ADD CONSTRAINT `nilai_akhir_ibfk_1` FOREIGN KEY (`id_mapel_kelas`) REFERENCES `mapel_kelas` (`id_mapel_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_akhir_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_akhir_ibfk_3` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai_akhir_mid`
--
ALTER TABLE `nilai_akhir_mid`
  ADD CONSTRAINT `nilai_akhir_mid_ibfk_1` FOREIGN KEY (`id_mapel_kelas`) REFERENCES `mapel_kelas` (`id_mapel_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_akhir_mid_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_akhir_mid_ibfk_3` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai_proses`
--
ALTER TABLE `nilai_proses`
  ADD CONSTRAINT `nilai_proses_ibfk_1` FOREIGN KEY (`id_pembelajaran`) REFERENCES `pembelajaran` (`id_pembelajaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_proses_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `n_formatif`
--
ALTER TABLE `n_formatif`
  ADD CONSTRAINT `n_formatif_ibfk_1` FOREIGN KEY (`id_mapel_kelas`) REFERENCES `mapel_kelas` (`id_mapel_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `n_formatif_ibfk_2` FOREIGN KEY (`id_tp`) REFERENCES `tp` (`id_tp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `n_formatif_ibfk_3` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `n_sas`
--
ALTER TABLE `n_sas`
  ADD CONSTRAINT `n_sas_ibfk_1` FOREIGN KEY (`id_mapel_kelas`) REFERENCES `mapel_kelas` (`id_mapel_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `n_sas_ibfk_2` FOREIGN KEY (`id_pembelajaran`) REFERENCES `pembelajaran` (`id_pembelajaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `n_sas_ibfk_3` FOREIGN KEY (`id_tp`) REFERENCES `tp` (`id_tp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `n_sas_ibfk_4` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `n_sumatif`
--
ALTER TABLE `n_sumatif`
  ADD CONSTRAINT `n_sumatif_ibfk_1` FOREIGN KEY (`id_mapel_kelas`) REFERENCES `mapel_kelas` (`id_mapel_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `n_sumatif_ibfk_2` FOREIGN KEY (`id_pembelajaran`) REFERENCES `pembelajaran` (`id_pembelajaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `n_sumatif_ibfk_3` FOREIGN KEY (`id_tp`) REFERENCES `tp` (`id_tp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `n_sumatif_ibfk_4` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembelajaran`
--
ALTER TABLE `pembelajaran`
  ADD CONSTRAINT `pembelajaran_ibfk_1` FOREIGN KEY (`id_mapel_kelas`) REFERENCES `mapel_kelas` (`id_mapel_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembelajaran_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembelajaran_ibfk_3` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peniaian_sumatif`
--
ALTER TABLE `peniaian_sumatif`
  ADD CONSTRAINT `peniaian_sumatif_ibfk_1` FOREIGN KEY (`id_pembelajaran`) REFERENCES `pembelajaran` (`id_pembelajaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peniaian_sumatif_ibfk_2` FOREIGN KEY (`id_tp`) REFERENCES `tp` (`id_tp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian_project`
--
ALTER TABLE `penilaian_project`
  ADD CONSTRAINT `penilaian_project_ibfk_1` FOREIGN KEY (`id_dimensi`) REFERENCES `dimensi` (`id_dimensi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_project_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_project_ibfk_3` FOREIGN KEY (`id_elemen`) REFERENCES `elemen` (`id_elemen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_project_ibfk_4` FOREIGN KEY (`id_sub_elemen`) REFERENCES `sub_elemen` (`id_sub_elemen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_project_ibfk_5` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa_kelas`
--
ALTER TABLE `siswa_kelas`
  ADD CONSTRAINT `siswa_kelas_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_kelas_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa_keluar`
--
ALTER TABLE `siswa_keluar`
  ADD CONSTRAINT `siswa_keluar_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_keluar_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_elemen`
--
ALTER TABLE `sub_elemen`
  ADD CONSTRAINT `sub_elemen_ibfk_1` FOREIGN KEY (`id_dimensi`) REFERENCES `dimensi` (`id_dimensi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sub_elemen_ibfk_2` FOREIGN KEY (`id_elemen`) REFERENCES `elemen` (`id_elemen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tingkat`
--
ALTER TABLE `tingkat`
  ADD CONSTRAINT `tingkat_ibfk_1` FOREIGN KEY (`id_fase`) REFERENCES `fase` (`id_fase`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tingkat_ibfk_2` FOREIGN KEY (`id_jenjang`) REFERENCES `jenjang` (`id_jenjang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tp`
--
ALTER TABLE `tp`
  ADD CONSTRAINT `tp_ibfk_1` FOREIGN KEY (`id_jenjang`) REFERENCES `jenjang` (`id_jenjang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tp_ibfk_2` FOREIGN KEY (`id_cp`) REFERENCES `cp` (`id_cp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tp_ibfk_3` FOREIGN KEY (`id_tingkat`) REFERENCES `tingkat` (`id_tingkat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tp_pancasila`
--
ALTER TABLE `tp_pancasila`
  ADD CONSTRAINT `tp_pancasila_ibfk_1` FOREIGN KEY (`id_dimensi`) REFERENCES `dimensi` (`id_dimensi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tp_pancasila_ibfk_2` FOREIGN KEY (`id_tingkat`) REFERENCES `tingkat` (`id_tingkat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tp_pancasila_ibfk_3` FOREIGN KEY (`id_elemen`) REFERENCES `elemen` (`id_elemen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tp_pancasila_ibfk_4` FOREIGN KEY (`id_sub_elemen`) REFERENCES `sub_elemen` (`id_sub_elemen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tp_pembelajaran`
--
ALTER TABLE `tp_pembelajaran`
  ADD CONSTRAINT `tp_pembelajaran_ibfk_1` FOREIGN KEY (`id_mapel_kelas`) REFERENCES `mapel_kelas` (`id_mapel_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tp_pembelajaran_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tp_pembelajaran_ibfk_3` FOREIGN KEY (`id_pembelajaran`) REFERENCES `pembelajaran` (`id_pembelajaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tp_pembelajaran_ibfk_4` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tp_pembelajaran_ibfk_5` FOREIGN KEY (`id_tp`) REFERENCES `tp` (`id_tp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tp_pembelajaran_ibfk_6` FOREIGN KEY (`id_cp`) REFERENCES `cp` (`id_cp`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
