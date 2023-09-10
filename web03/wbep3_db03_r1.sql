-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-09-10 18:51:08
-- 伺服器版本： 10.4.27-MariaDB
-- PHP 版本： 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `wbep3_db03_r1`
--

-- --------------------------------------------------------

--
-- 資料表結構 `movies`
--

CREATE TABLE `movies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `level` int(1) UNSIGNED NOT NULL,
  `length` int(10) UNSIGNED NOT NULL,
  `ondate` date NOT NULL,
  `publish` text NOT NULL,
  `director` text NOT NULL,
  `trailer` text NOT NULL,
  `poster` text NOT NULL,
  `intro` text NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL,
  `rank` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `movies`
--

INSERT INTO `movies` (`id`, `name`, `level`, `length`, `ondate`, `publish`, `director`, `trailer`, `poster`, `intro`, `sh`, `rank`) VALUES
(1, '院線片01', 1, 120, '2023-09-11', '院線片01發行商', '院線片01導演', '03B01v.mp4', '03B01.png', '院線片01劇情簡介院線片01劇情簡介', 1, 1),
(2, '院線片02', 2, 120, '2023-09-10', '院線片02發行商', '院線片02導演', '03B02v.mp4', '03B02.png', '院線片02劇情簡介院線片02劇情簡介', 1, 2),
(3, '院線片03', 3, 120, '2023-09-09', '院線片03發行商', '院線片03導演', '03B03v.mp4', '03B03.png', '院線片03劇情簡介院線片03劇情簡介', 1, 3),
(4, '院線片04', 4, 120, '2023-09-11', '院線片04發行商', '院線片04導演', '03B04v.mp4', '03B04.png', '院線片04劇情簡介院線片04劇情簡介', 1, 4),
(5, '院線片05', 1, 120, '2023-09-10', '院線片05發行商', '院線片05導演', '03B05v.mp4', '03B05.png', '院線片05劇情簡介院線片05劇情簡介', 1, 5),
(6, '院線片06', 2, 120, '2023-09-09', '院線片06發行商', '院線片06導演', '03B06v.mp4', '03B06.png', '院線片06劇情簡介院線片06劇情簡介', 1, 6),
(7, '院線片07', 3, 120, '2023-09-11', '院線片07發行商', '院線片07導演', '03B07v.mp4', '03B07.png', '院線片07劇情簡介院線片07劇情簡介', 1, 7),
(8, '院線片08', 4, 120, '2023-09-10', '院線片08發行商', '院線片08導演', '03B08v.mp4', '03B08.png', '院線片08劇情簡介院線片08劇情簡介', 1, 8),
(9, '院線片09', 1, 120, '2023-09-09', '院線片09發行商', '院線片09導演', '03B09v.mp4', '03B09.png', '院線片09劇情簡介院線片09劇情簡介', 1, 9);

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `no` text NOT NULL,
  `movie` text NOT NULL,
  `date` date NOT NULL,
  `session` text NOT NULL,
  `qt` int(10) UNSIGNED NOT NULL,
  `seats` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `orders`
--

INSERT INTO `orders` (`id`, `no`, `movie`, `date`, `session`, `qt`, `seats`) VALUES
(1, '202309090001', '院線片01', '2023-09-10', '14:00~16:00', 1, 'a:1:{i:0;i:0;}'),
(2, '202309090002', '院線片02', '2023-09-11', '16:00~18:00', 2, 'a:2:{i:0;i:2;i:1;i:3;}'),
(3, '202309090003', '院線片03', '2023-09-09', '18:00~20:00', 3, 'a:3:{i:0;i:4;i:1;i:5;i:2;i:6;}'),
(4, '202309090004', '院線片01', '2023-09-10', '14:00~16:00', 4, 'a:4:{i:0;i:10;i:1;i:11;i:2;i:12;i:3;i:13;}'),
(5, '202309090005', '院線片02', '2023-09-11', '16:00~18:00', 1, 'a:1:{i:0;i:1;}'),
(6, '202309090006', '院線片03', '2023-09-09', '18:00~20:00', 2, 'a:2:{i:0;i:11;i:1;i:12;}'),
(7, '202309090007', '院線片01', '2023-09-12', '14:00~16:00', 3, 'a:4:{i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;}'),
(8, '202309090008', '院線片02', '2023-09-13', '16:00~18:00', 4, 'a:4:{i:0;i:1;i:1;i:2;i:2;i:13;i:3;i:14;}'),
(9, '202309090009', '院線片03', '2023-09-13', '16:00~18:00', 1, 'a:4:{i:0;i:1;i:1;i:2;i:2;i:13;i:3;i:14;}');

-- --------------------------------------------------------

--
-- 資料表結構 `posters`
--

CREATE TABLE `posters` (
  `id` int(10) UNSIGNED NOT NULL,
  `img` text NOT NULL,
  `name` text NOT NULL,
  `rank` int(10) UNSIGNED NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL,
  `ani` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `posters`
--

INSERT INTO `posters` (`id`, `img`, `name`, `rank`, `sh`, `ani`) VALUES
(1, '03A01.jpg', '預告片01', 1, 1, 1),
(2, '03A02.jpg', '預告片02', 2, 1, 2),
(3, '03A03.jpg', '預告片03', 3, 1, 3),
(4, '03A04.jpg', '預告片04', 4, 1, 1),
(5, '03A05.jpg', '預告片05', 5, 1, 2),
(6, '03A06.jpg', '預告片06', 6, 1, 3),
(7, '03A07.jpg', '預告片07', 7, 1, 1),
(8, '03A08.jpg', '預告片08', 8, 1, 2),
(9, '03A09.jpg', '預告片09', 9, 1, 3);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `posters`
--
ALTER TABLE `posters`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `posters`
--
ALTER TABLE `posters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
