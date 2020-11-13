-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-11-05 04:18:36
-- 伺服器版本： 10.4.14-MariaDB
-- PHP 版本： 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `firstdb`
--

-- --------------------------------------------------------

--
-- 資料表結構 `students`
--

CREATE TABLE `abc` (
  `id` int(11) UNSIGNED NOT NULL COMMENT '序號',
  `name` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '姓名',
  `national_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '身分證字號',
  `seat_num` int(2) UNSIGNED NOT NULL COMMENT '座號',
  `classes` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '班級',
  `gender` tinyint(1) UNSIGNED NOT NULL COMMENT '性別',
  `birthday` date NOT NULL COMMENT '生日',
  `student_id` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '學號',
  `tel` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '電話',
  `addr` varchar(127) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '地址'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `students`
--

INSERT INTO `abc` (`id`, `name`, `national_id`, `seat_num`, `classes`, `gender`, `birthday`, `student_id`, `tel`, `addr`) VALUES
(NULL, '葉昱顯', 'I123123123', 13, '一年一班', 1, '1998-06-28', '110507123', '0912345678', '花蓮市信義區'),
(NULL, '葉廣德', 'I456123123', 3, '一年一班', 5, '1965-01-31', '110402123', '0945645678', '桃園市市官田區信義路5號'),
(NULL, '葉王', 'I456123456', 3, '一年一班', 17, '1945-01-04', '110402456', '0945645123', '台東市松山區忠孝東路75號'),
(NULL, '葉昱顯', 'I123123123', 13, '一年一班', 1, '1998-06-28', '110507123', '0912345678', '花蓮市信義區'),
(NULL, '葉廣德', 'I456123123', 3, '一年一班', 5, '1965-01-31', '110402123', '0945645678', '桃園市市官田區信義路5號'),
(NULL, '葉王', 'I456123456', 3, '一年一班', 17, '1945-01-04', '110402456', '0945645123', '台東市松山區忠孝東路75號'),
(NULL, '葉昱顯', 'I123123123', 13, '一年一班', 1, '1998-06-28', '110507123', '0912345678', '花蓮市信義區'),
(NULL, '葉廣德', 'I456123123', 3, '一年一班', 5, '1965-01-31', '110402123', '0945645678', '桃園市市官田區信義路5號'),
(NULL, '葉王', 'I456123456', 3, '一年一班', 17, '1945-01-04', '110402456', '0945645123', '台東市松山區忠孝東路75號'),
(NULL, '葉昱顯', 'I123123123', 13, '一年一班', 1, '1998-06-28', '110507123', '0912345678', '花蓮市信義區'),
(NULL, '葉廣德', 'I456123123', 3, '一年一班', 5, '1965-01-31', '110402123', '0945645678', '桃園市市官田區信義路5號'),
(NULL, '葉王', 'I456123456', 3, '一年一班', 17, '1945-01-04', '110402456', '0945645123', '台東市松山區忠孝東路75號');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`NULL`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '序號', AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
