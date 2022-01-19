-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 19, 2022 lúc 02:58 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `music_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `stagename` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `type` int(1) NOT NULL DEFAULT 2,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `image` varchar(100) DEFAULT NULL,
  `occupation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `stagename`, `username`, `password`, `type`, `date_created`, `image`, `occupation`) VALUES
(1, 'Adminstrator', 'admin', '0192023a7bbd73250516f069df18b500', 1, '2020-11-18 16:50:06', '102180073.jpg', ''),
(12, 'Bigbang', 'bigbang', '4297f44b13955235245b2497399d7a93', 3, '2022-01-18 22:45:37', 'avatar.jpg', 'group music'),
(13, 'Bol4', 'bol4', '4297f44b13955235245b2497399d7a93', 3, '2022-01-18 22:46:33', 'avatar1.jpg', 'singer'),
(14, 'IU', 'iu', '4297f44b13955235245b2497399d7a93', 3, '2022-01-18 22:46:56', 'avatar2.jpg', 'singer'),
(27, 'Nghệ sĩ', 'nghesi', '202cb962ac59075b964b07152d234b70', 2, '2022-01-08 23:21:17', '375px-Son_Tung_M-TP_1_(2017).png', ''),
(28, 'Đen Vâu', 'den', '202cb962ac59075b964b07152d234b70', 3, '2022-01-08 23:23:10', 'unnamed.jpg', 'rapper'),
(32, 'Vũ', 'vu', '202cb962ac59075b964b07152d234b70', 2, '2022-01-14 15:15:01', 'channels4_profile.jpg', ''),
(33, 'Phan Thế Hòa', 'hoa', '202cb962ac59075b964b07152d234b70', 2, '2022-01-14 22:55:22', '150453142_1747434955437056_2121695984279547353_n.jpg', ''),
(34, 'Phạm Van Khải', 'khai', '202cb962ac59075b964b07152d234b70', 2, '2022-01-14 23:12:33', '120558211_2736361186632562_4970587914790807685_n.jpg', ''),
(35, 'Nguyễn Trung Thịnh', 'thinh', '202cb962ac59075b964b07152d234b70', 2, '2022-01-17 00:42:15', 'anh-nen-4k-dep-cho-may-tinh_060252595.jpg', ''),
(37, 'Kaneki-ken', 'anhcuxin', '202cb962ac59075b964b07152d234b70', 2, '2022-01-18 15:28:46', '007.jpg', ''),
(39, 'Cúc Tịnh Y', 'yy', '202cb962ac59075b964b07152d234b70', 2, '2022-01-18 17:20:48', 'CucTinhY.jpg', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;