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
-- Cấu trúc bảng cho bảng `songs`
--

CREATE TABLE `songs` (
  `audio_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `audio_location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `songs`
--

INSERT INTO `songs` (`audio_id`, `user_id`, `title`, `category`, `thumbnail`, `audio_location`, `view`) VALUES
(1, 12, 'Bang Bang Bang', 'hip hop', 'Bang-Bang-Bang.jpg', 'Bang-Bang-Bang.mp3', 5),
(2, 12, 'Blue', 'hip hop', 'Blue.jpg', 'Blue.mp3', 0),
(3, 12, 'Haru Haru', 'hip hop', 'Haru-Haru.jpg', 'Haru-Haru.mp3', 0),
(4, 12, 'Last Dance', 'dance', 'Last-Dance.jpg', 'Last-Dance.mp3', 6),
(5, 12, 'Lies', 'dance', 'Lies.jpg', 'Lies.mp3', 2),
(6, 12, 'Sober', 'hip hop', 'Sober.jpg', 'Sober.mp3', 1),
(7, 12, 'Tonight', 'dance', 'tonight.jpg', 'tonight.mp3', 0),
(8, 13, 'Chocolate', 'K-pop', 'Chocolate-BOL4.jpg', 'Chocolate-BOL4.mp3', 2),
(9, 13, 'Galaxy', 'K-pop', 'Galaxy.jpg', 'Galaxy.mp3', 10),
(10, 13, 'Some', 'dance', 'Some.jpg', 'Some.mp3', 0),
(11, 13, 'Tell Me You Love Me', 'K-pop', 'Tell-Me-You-Love-Me.jpg', 'Tell-Me-You-Love-Me.mp3', 8),
(12, 13, 'To My Youth', 'K-pop', 'To-My-Youth.jpg', 'To-My-Youth.mp3', 0),
(13, 13, 'You', 'K-pop', 'You.jpg', 'You.mp3', 4),
(14, 14, 'BBIBBI', 'K-pop', 'BBIBBI.jpg', 'BBIBBI.mp3', 0),
(15, 14, 'Jam Jam', 'K-pop', 'Jam-Jam.jpg', 'Jam-Jam.mp3', 0),
(16, 14, 'Lilac', 'K-pop', 'Lilac.jpg', 'Lilac.mp3', 11),
(17, 14, 'Celebrity', 'K-pop', 'Celebrity.jpg', 'Celebrity.mp3', 1),
(18, 14, 'Strawberry moon', 'K-pop', 'strawberry-moon.jpg', 'strawberry-moon.mp3', 0),
(19, 14, 'The visitor', 'K-pop', 'The-visitor.jpg', 'The-visitor.mp3', 0),
(20, 14, 'You And I', 'K-pop', 'You-And-I-IU.jpg', 'You-And-I-IU.mp3', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`audio_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `songs`
--
ALTER TABLE `songs`
  MODIFY `audio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
