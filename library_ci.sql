-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 26, 2025 at 12:04 PM
-- Server version: 10.4.28-MariaDB-log
-- PHP Version: 8.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `penerbit` varchar(100) DEFAULT NULL,
  `tahun_terbit` year(4) DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `cover`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `kategori_id`, `deskripsi`, `created_at`, `updated_at`) VALUES
(16, '1753417069_86a6c67a6422476d8f1a.jpg', ' 25 Dongeng Anak Favorit dari Seluruh Dunia', 'Kak Adit, Kak Arin, dan Kak Latif', 'Trans Idea Publishing', '2020', 9, 'Buku 25 Dongeng Anak Favorit dari Seluruh Dunia ini berisi kumpulan dongeng berjumlah 25 cerita yang berasal dari seluruh antero dunia ini. Dengan adanya buku ini, diharapkan menambah wawasan anak terhadap dunia sosial dan memperkokoh jiwa moral anak.', '2025-07-24 21:08:50', '2025-07-24 21:17:49'),
(18, '1753417227_910d202ff58abc86d981.png', ' Antologi Cerpen Jimat Terkutuk', 'Chaerul Sabara', 'Deepublish', '2020', 5, 'Pembahasan buku ini mengenai (1) selayang pandang kebijakan publik, (2) advokasi kebijakan, (3) elemen penting advokasi kebijakan (4) advokasi kebijakan dalam perspektif goverance, (5) sudut pandang teori dan strategi advokasi kebijakan, (6) best practice advokasi kebijakan, serta yang terakhir (7) policy change dan policy oriented learning.', '2025-07-24 21:20:27', NULL),
(19, '1753417305_e3f5aefe86c2772a87a8.jpg', '30 Cerita Teladan Islami', 'Mahmudah Mastur', 'Noktah', '2019', 9, 'Buku ini memuat 30 kisah keteladanan yang beragam. Ada cerita tentang nenek yang suka menolong, cerita seorang budak yang sangat mencintai Al-Qur’an, seorang anak yang berbakti kepada orang tuanya, dan banyak cerita lainnya.', '2025-07-24 21:21:45', NULL),
(20, '1753417368_a81cd7ce581921763d37.png', 'Antologi Puisi Secangkir Teh untuk Berdua', 'Warastri Kurniati', 'Deepublish', '2020', 8, 'Buku kumpulan puisi ini merupakan kisah perjalanan hati yang seringkali dialami oleh siapapun. Hati selalu mengalami perubahan suasana yang menghadirkan perasaan yang terkadang muncul begitu saja.', '2025-07-24 21:22:48', NULL),
(21, '1753417428_025ff32eaaf6fc4c4ae2.jpg', 'D.H. Lawrence Kumpulan Cerita Pendek Terbaik', 'D.H. Lawrence', 'Indoliterasi', '2018', 5, 'Buku ini berisi sekira 11 cerita terbaik dari karya D.H. Lawrence. Tujuan kehadiran buku ini adalah agar para pembaca mengenal dan menikmati kumpulan cerpen terbaik dari penulis asal Eastwood, Inggris ini. Akhirnya selamat membaca dan nikmatilah karya-karya cerita terbaik dari D.H. Lawrence.', '2025-07-24 21:23:48', NULL),
(22, '1753417501_8632ff84f65eb4880265.jpg', 'Jalan Lain ke Majapahit', 'Dadang Ari Murtono', 'Diva Press', '2019', 8, 'Buku ini mengkaji amalan-amalan yang dapat menyejukkan alam kubur orangtua yang sudah meninggal, yakni dengan cara membuatkan rumah untuk orangtua di surga. Sejumlah 14 amalan dibahas dengan detail oleh penulis. Dengan adanya buku ini diharapkan dapat dipahami sehingga semua orang dapat melaksanakan amalan-amalan tersebut.', '2025-07-24 21:25:01', NULL),
(23, '1753417603_d3300067965759e74ee3.jpg', 'Kita, Kata, Cinta', 'Khrisna Pabichara', 'Diva Press', '2019', 7, 'Kita, Kata, dan Cinta dapat berlaku sebagai buku pelajaran bahasa Indonesia yang mengembangkan kalimat demi kalimat sampai menjadi sebuah novel, dengan bahasa Indonesia yang tidak sekadar diterapkan sebetul mungkin, tetapi juga menjadi subjek maupun objek novel ini sendiri.', '2025-07-24 21:26:43', NULL),
(24, '1753417677_f5d243567a23ac403890.jpg', 'Negeri Daging', 'A. Mustofa Bisri', 'Diva Press', '2020', 8, 'Antologi puisi Negeri Daging adalah sebentuk “keistiqomahan” penulisnya dalam mengikuti perjalanan kehidupan makhluk Tuhan yang ia cintai: manusia dan Indonesia. Apa yang tertuang di dalamnya secara langsung, jernih, dan benderang mampu mengungkap sikap dan gerak hati penulisnya. Tak ada lagi beban untuk memilih-milih dan memacak kata yang indah, agung, dan “puitis”.', '2025-07-24 21:27:57', NULL),
(25, '1753417760_55c70b099c7f214e69f8.jpg', 'Petualangan Don Quixote', 'Miguel De Cervantes', 'Immortal Publisher', '2017', 7, 'Novel Petualangan Don Quixote ini berkisah tentang kegilaan Alonzo Quinjano akibat terlalu banyak membaca buku-buku petualangan para kesatria. Gagasan-gagasan kepahlawanan dan kehebatan para kesatria yang ada di buku-buku yang dibaca itu membuat tuan tanah ini terkagum-kagum. Ia memutuskan untuk menjadi kesatria yang membela kebenaran melalui peristiwa-peristiwa yang heroik. Dalam novel pendek ini Cerpantes menceritakan petualangan Don Quixote yang sangat absurd.', '2025-07-24 21:29:20', NULL),
(26, '1753417821_615a19ca4e4d749914ef.jpg', ' Ranselo dan Galang', 'Kak Thifa', 'Laksana', '2020', 9, '“Pus pus pus…,” panggil Galang, “hmmm, rupanya kakinya terluka.” Galang segera menggendong si anak kucing.\r\n“Bawa pulang saja, Galang,” kata Ranselo. Galang menggendong si anak kucing dan membawanya pulang.', '2025-07-24 21:30:21', NULL),
(27, '1753417889_bd03f78126f177e95a1f.jpg', 'Romeo Juliet', 'William Shakespeare', 'Buku Bijak', '2020', 7, 'Apa artinya sebuah nama bagi seorang pencinta. Ketulusan adalah poin yang paling utama. Bagi Juliet, Romeo akan tetap menjadi Romeo dengan pribadi yang disukainya, kekasih yang dicintainya, meski namanya bukan lagi Romeo Montague. Seperti mawar yang akan tetap wangi meskipun disebut dengan nama lainnya. Bagi seorang pencinta seperti Juliet, sebuah nama tiada artinya.', '2025-07-24 21:31:29', NULL),
(28, '1753417970_d08c06c8c1e25aa7ab04.jpg', ' Sketsa Gaza', 'Kirana Sulaeman', 'Diva Press', '2020', 7, '“Pahit, sedih, ngilu bersamaan dengan harapan di tanah Gaza dalam satu waktu, menjadi cerita yang indah dalam fiksi berbasis riset ilmiah karya Kirana. Saya getir, tapi anehnya juga tersenyum. Saya ngeri, tapi anehnya, saya sekaligus merasa tenang.\" -Kalis Mardiasih, penulis buku Muslimah yang Diperdebatkan dan aktivis perempuan', '2025-07-24 21:32:50', NULL),
(30, '1753471116_2daf60bd088c813420c9.jpg', 'Instalasi Pandangan Yang Miring', 'Astrajingga Asmasubrata', 'Basa Basi', '2018', 8, 'test', '2025-07-25 12:15:39', '2025-07-25 23:43:38');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(5, 'Cerpen', '2025-07-23 03:52:05', NULL),
(7, 'Novel', '2025-07-24 20:23:26', NULL),
(8, 'Antologi Puisi', '2025-07-24 20:23:50', NULL),
(9, 'Buku Fiksi untuk Anak', '2025-07-24 20:24:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pinjam_buku`
--

CREATE TABLE `pinjam_buku` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `buku_id` int(11) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `status` enum('accepted','process','rejected') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pinjam_buku`
--

INSERT INTO `pinjam_buku` (`id`, `user_id`, `buku_id`, `tanggal_mulai`, `tanggal_selesai`, `status`) VALUES
(17, 5, 18, '2025-07-24', '2025-07-31', 'rejected'),
(18, 5, 21, '2025-08-01', '2025-08-07', 'accepted'),
(19, 5, 23, '2025-07-10', '2025-07-17', 'process');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(4, 'Administrator', 'admin', '$2y$10$tfzBaRBeuOh80VY41jb0guUW2uKP2YulzkRRLKCeeSmlteMuO/5nu', 'admin', '2025-07-23 21:30:23', NULL),
(5, 'User Default', 'user', '$2y$10$xJncXOBGLIypn5Elxwz4AeoRcqwJMSFkLgSxGOLJdskyRkXu96giS', 'user', '2025-07-23 21:30:24', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_buku_kategori` (`kategori_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pinjam_buku`
--
ALTER TABLE `pinjam_buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_buku_pinjambuku` (`buku_id`),
  ADD KEY `fk_user_pinjambuku` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pinjam_buku`
--
ALTER TABLE `pinjam_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `fk_buku_kategori` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `pinjam_buku`
--
ALTER TABLE `pinjam_buku`
  ADD CONSTRAINT `fk_buku_pinjambuku` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_pinjambuku` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
