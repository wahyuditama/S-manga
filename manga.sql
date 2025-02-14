-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2025 at 05:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manga`
--

-- --------------------------------------------------------

--
-- Table structure for table `main`
--

CREATE TABLE `main` (
  `id` int(11) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `price` int(100) NOT NULL,
  `description` text NOT NULL,
  `images` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_At` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `main`
--

INSERT INTO `main` (`id`, `title`, `price`, `description`, `images`, `create_at`, `update_At`) VALUES
(1, 'Tearmoon Empire', 2233, ' Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat unde delectus nam quod dolores soluta quos eveniet nobis mollitia  necessitatibus maxime ratione saepe, nemo eligendi illo distinctio, optio itaque, eaque impedit illum! Obcaecati eius vero suscipit  illum consequatur dolorum numquam accusamus autem? Debitis, voluptate quae?', 'Tearmoon_Empire.jpg', '2025-02-05 05:19:09', '2025-02-11 15:41:47'),
(2, 'Classroom Of the Elite', 5100000, ' Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat unde delectus nam quod dolores soluta quos eveniet nobis mollitia necessitatibus maxime ratione saepe, nemo eligendi illo distinctio, optio itaque, eaque impedit illum! Obcaecati eius vero suscipit illum consequatur dolorum numquam accusamus autem? Debitis, voluptate quae?', 'Classroom Of The Elite.jpg', '2025-02-05 06:21:00', '2025-02-11 10:06:06'),
(3, 'Majo No Tabi-Tabi', 5100000, '  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat unde delectus nam quod dolores soluta quos eveniet nobis mollitia\r\n                    necessitatibus maxime ratione saepe, nemo eligendi illo distinctio, optio itaque, eaque impedit illum! Obcaecati eius vero suscipit\r\n                    illum consequatur dolorum numquam accusamus autem? Debitis, voluptate quae?', '1114172.jpg', '2025-02-05 06:22:40', '2025-02-11 09:51:38'),
(6, 'Tensai Ouji No Akaji', 50000, 'Raja Natra jatuh sakit, meninggalkan satu-satunya harapan bagi kerajaannya kepada putranya, Pangeran Wein Salema Arbalest. Dikenal sebagai orang yang cakap dan bijaksana, ia adalah kandidat yang sempurna untuk menjadi pangeran bupati. Namun, jika sang pangeran memiliki sesuatu untuk dikatakan tentang masalah ini, ia lebih suka menjual Kerajaan Natra kepada penawar tertinggi! Karena ia memegang otoritas takhta, tidak seorang pun dapat menghentikan Wein dari melelang negara dan menggunakan keuntungannya untuk pensiun dengan nyaman. Yang perlu ia lakukan adalah menaikkan nilai kerajaan kecil itu untuk memaksimalkan keuntungannya. Namun apakah rencana besar Wein akan berhasil masih harus dilihat, karena kecerdasannya sering kali melampaui harapannya sendiri—sangat menguntungkan warga Natra yang tidak menyadari hal ini.', 'tensai ouji no akaji.png', '2025-02-06 13:56:47', '2025-02-13 14:38:15'),
(8, 'Kimi No Nawa', 0, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat unde delectus nam quod dolores soluta quos eveniet nobis mollitia&nbsp; necessitatibus maxime ratione saepe, nemo eligendi illo distinctio, optio itaque, eaque impedit illum! Obcaecati eius vero suscipit&nbsp; illum consequatur dolorum numquam accusamus autem? Debitis, voluptate quae?', 'Your_Name_poster.png', '2025-02-06 13:59:52', '2025-02-11 15:47:08'),
(9, '6 Lorem ipsum, dolor sit amet consectetur adipisicing elit.', 50000, '&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat unde delectus nam quod dolores soluta quos eveniet nobis mollitia&nbsp;necessitatibus maxime ratione saepe, nemo eligendi illo distinctio, optio itaque, eaque impedit illum! Obcaecati eius vero suscipit&nbsp;illum consequatur dolorum numquam accusamus autem? Debitis, voluptate quae?', 'picture6.jpg', '2025-02-06 14:00:40', '2025-02-06 14:07:32'),
(10, '7 Lorem ipsum, dolor sit amet consectetur adipisicing elit.', 50000, '&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat unde delectus nam quod dolores soluta quos eveniet nobis mollitia&nbsp;necessitatibus maxime ratione saepe, nemo eligendi illo distinctio, optio itaque, eaque impedit illum! Obcaecati eius vero suscipit&nbsp;illum consequatur dolorum numquam accusamus autem? Debitis, voluptate quae?', 'picture7.jpg', '2025-02-06 14:01:24', '2025-02-06 14:07:40'),
(11, '8 Lorem ipsum, dolor sit amet consectetur adipisicing elit.', 50000, '&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat unde delectus nam quod dolores soluta quos eveniet nobis mollitia&nbsp;necessitatibus maxime ratione saepe, nemo eligendi illo distinctio, optio itaque, eaque impedit illum! Obcaecati eius vero suscipit&nbsp;illum consequatur dolorum numquam accusamus autem? Debitis, voluptate quae?', 'picture8.jpg', '2025-02-06 14:02:11', '2025-02-06 14:07:48'),
(12, '9 Lorem ipsum, dolor sit amet consectetur adipisicing elit.', 50000, '&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat unde delectus nam quod dolores soluta quos eveniet nobis mollitia&nbsp;necessitatibus maxime ratione saepe, nemo eligendi illo distinctio, optio itaque, eaque impedit illum! Obcaecati eius vero suscipit&nbsp;illum consequatur dolorum numquam accusamus autem? Debitis, voluptate quae?', 'picture9.jpg', '2025-02-06 14:03:13', '2025-02-06 14:08:02'),
(13, '10 Lorem ipsum, dolor sit amet consectetur adipisicing elit.', 60000, '&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat unde delectus nam quod dolores soluta quos eveniet nobis mollitia&nbsp;necessitatibus maxime ratione saepe, nemo eligendi illo distinctio, optio itaque, eaque impedit illum! Obcaecati eius vero suscipit&nbsp;illum consequatur dolorum numquam accusamus autem? Debitis, voluptate quae?', 'picture10.jpg', '2025-02-06 14:03:52', '2025-02-06 14:08:08');

-- --------------------------------------------------------

--
-- Table structure for table `sub_main`
--

CREATE TABLE `sub_main` (
  `id` int(12) NOT NULL,
  `main_id` int(12) NOT NULL,
  `chapter` varchar(50) NOT NULL,
  `detail` varchar(1000) NOT NULL,
  `file_content` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_At` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_main`
--

INSERT INTO `sub_main` (`id`, `main_id`, `chapter`, `detail`, `file_content`, `create_at`, `update_At`) VALUES
(1, 6, 'Chapter 1', 'Tensai ouji no akaji Vol.5 sub indo', '[Bakadame.com] Pangeran Nolep Aku Banget Vol.5.pdf', '2025-02-09 15:22:39', '2025-02-14 03:44:25'),
(34, 3, 'Chapter 4', '  wandering witch the journey of elaina Volume. 4', '[Bakadame.com] Majo no Tabitabi Vol 4.pdf', '2025-02-11 09:56:29', '2025-02-14 04:06:58'),
(35, 2, 'Chapter 1 Second Years', ' Youkoso Jitsuryoku Shijou Shugi no Kyoushitsu e 2nd Year Volume 1', 'Youkoso Jitsuryoku Shijou Shugi no Kyoushitsu e 2nd Year Vol 1.pdf', '2025-02-11 10:07:44', '2025-02-14 04:06:10'),
(36, 1, 'Chapter 2', 'Tearmoon Teikoku Monogatari . volume-2', 'Tearmoon Empire_ Volume 2.pdf', '2025-02-11 15:42:55', '2025-02-14 04:05:19'),
(37, 6, '', 'Tensai ouji no akaji Vol.6 sub indo', '[Bakadame.com] Pangeran Nolep Aku Banget Vol.6.pdf', '2025-02-13 13:04:10', '2025-02-14 03:42:45');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(12) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_At` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `create_at`, `update_At`) VALUES
(1, 'admin', 'admin@gmail.com', '123', '2025-02-12 05:52:56', '2025-02-12 05:52:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `main`
--
ALTER TABLE `main`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_main`
--
ALTER TABLE `sub_main`
  ADD PRIMARY KEY (`id`),
  ADD KEY `main_id` (`main_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `main`
--
ALTER TABLE `main`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sub_main`
--
ALTER TABLE `sub_main`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sub_main`
--
ALTER TABLE `sub_main`
  ADD CONSTRAINT `sub_main_ibfk_1` FOREIGN KEY (`main_id`) REFERENCES `main` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
