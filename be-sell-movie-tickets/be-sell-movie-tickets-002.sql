-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 14, 2024 lúc 02:36 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `be-sell-movie-tickets`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan`
--

CREATE TABLE `binh_luan` (
  `id` int(11) NOT NULL,
  `noi_dung` varchar(200) NOT NULL,
  `id_film` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binh_luan`
--

INSERT INTO `binh_luan` (`id`, `noi_dung`, `id_film`, `id_user`, `time`) VALUES
(18, 's12', 10, 2, '2024-11-09 20:03:46'),
(20, 'ssss', 10, 2, '2024-11-09 20:10:57'),
(21, 'đã', 6, 2, '2024-11-10 00:19:19'),
(24, 'cuto2', 5, 2, '2024-11-11 22:33:23'),
(25, '123', 5, 2, '2024-11-11 22:38:57'),
(26, '111', 5, 1, '2024-11-11 22:39:12'),
(27, '1234', 5, 4, '2024-11-11 22:40:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_gia`
--

CREATE TABLE `danh_gia` (
  `id` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `star` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_gia`
--

INSERT INTO `danh_gia` (`id`, `id_film`, `id_user`, `time`, `star`) VALUES
(1, 10, 2, '2024-11-09 20:59:11', 3),
(2, 6, 2, '2024-11-10 00:19:28', 5),
(3, 10, 1, '2024-11-11 19:56:49', 5),
(4, 5, 2, '2024-11-11 22:29:34', 5),
(5, 5, 4, '2024-11-11 22:40:21', 3),
(6, 9, 4, '2024-11-11 23:14:01', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lich_trinh`
--

CREATE TABLE `lich_trinh` (
  `id` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lich_trinh`
--

INSERT INTO `lich_trinh` (`id`, `id_film`, `time_start`, `time_end`, `date`) VALUES
(5, 6, '19:00:10', '22:00:10', '2024-11-16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_phim`
--

CREATE TABLE `loai_phim` (
  `id` int(11) NOT NULL,
  `ten` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_phim`
--

INSERT INTO `loai_phim` (`id`, `ten`) VALUES
(5, 'Marvel'),
(6, '18+');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_film`
--

CREATE TABLE `order_film` (
  `id` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `cho_ngoi` varchar(200) NOT NULL,
  `gia` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `hinh_thuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phim`
--

CREATE TABLE `phim` (
  `id` int(11) NOT NULL,
  `ngay_start` date NOT NULL,
  `ngay_end` date NOT NULL,
  `giave` int(11) NOT NULL,
  `noi_dung` varchar(200) NOT NULL,
  `ten` varchar(200) NOT NULL,
  `id_danhgia` int(11) NOT NULL,
  `thoi_luong` int(11) NOT NULL,
  `hinh_thuc` int(11) NOT NULL,
  `id_the_loai` int(11) NOT NULL,
  `anh` varchar(200) NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `createAt` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phim`
--

INSERT INTO `phim` (`id`, `ngay_start`, `ngay_end`, `giave`, `noi_dung`, `ten`, `id_danhgia`, `thoi_luong`, `hinh_thuc`, `id_the_loai`, `anh`, `view`, `createAt`) VALUES
(5, '2024-11-08', '2024-11-21', 100000, 'Người Nhện là một bộ phim siêu anh hùng năm 2002 của Mỹ, là phim đầu tiên trong loạt phim Người Nhện dựa trên các nhân vật hư cấu Người Nhện của Marvel Comics. Phim được đạo diễn bởi Sam Raimi và kịch', 'Spider-man 1', 0, 120, 1, 5, 'nhen1_1731146713.jpg', 0, '2024-11-09'),
(6, '2024-11-08', '2024-11-26', 10000, 'Marvels Spider-Man 2 là một trò chơi phiêu lưu hành động năm 2023 được phát triển bởi Insomniac Games và được Sony Interactive Entertainment xuất bản.', 'Spider-man 2', 0, 120, 1, 5, 'nhen2_1731146939.jpg', 0, '2024-11-09'),
(7, '2024-11-22', '2024-11-24', 10000, 'Spider Man 3 là phần tiếp theo của series phim Spider Man. Lần này, tưởng như Peter Parker đã tìm được bình yên trong cuộc sống bên cạnh người anh yêu. Nhưng cậu bạn cũ Harry Osborn khám phá ra bí mật', 'Spider-man 3', 0, 120, 2, 5, 'nhen3_1731147005.jpg', 0, '2024-11-09'),
(8, '2024-11-21', '2024-11-22', 100000, 'Thor là hoàng tử, con vua Odin trong vương quốc Asgard, nhưng vì bản chất kiêu ngạo và gây ra nhiều sai lầm nên bị tước hết sức mạnh và đày xuống trái đất làm người phàm. Tại trái đất, Thor làm quen v', 'Thor - Thần Sấm 1', 0, 120, 2, 5, 'thor1_1731147083.jpg', 0, '2024-11-09'),
(9, '2024-11-14', '2024-11-26', 100000, 'Thor: Thế giới bóng tối là một bộ phim siêu anh hùng của Mỹ năm 2013 dựa trênnhân vật Thor của Marvel Comics , do Marvel Studios sản xuất và Walt Disney Studios Motion Pictures phân phối. Đây là phần ', 'Thor - Thần Sấm 2', 0, 120, 2, 5, 'thor2_1731147166.jpg', 0, '2024-11-09'),
(10, '2024-11-14', '2024-11-27', 100000, 'Ragnarok ám chỉ Sự tận cùng của vũ trụ, đồng nghĩa với trận chiến sống còn của chín cõi. Sau khi Loki soán ngôi Odin, vị thần tinh quái này tiếp tục mở đường nhiễu loạn tiến từ cầu Bifrost vào trong A', 'Thor - Thần Sấm 3', 0, 120, 1, 5, 'thor3_1731147220.png', 0, '2024-11-09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `ten` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `permission` varchar(200) DEFAULT NULL,
  `ngay_sinh` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `ten`, `email`, `pass`, `permission`, `ngay_sinh`) VALUES
(1, 'Nguyễn Văn A', 'vana@xxx.com', '123456', 'MANAGER_LICH_TRINH_ADD.MANAGER_LICH_TRINH_EDIT', '2002-11-20'),
(2, 'administrator', 'admin@ad.com', '123456', 'ADMIN', '0000-00-00'),
(3, 'Kiều dj', 'kieu@dj.com', '123456', NULL, '0000-00-00'),
(4, 'Quỳnh aka', 'quynh@aka.com', '123456', NULL, '0000-00-00');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lich_trinh`
--
ALTER TABLE `lich_trinh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loai_phim`
--
ALTER TABLE `loai_phim`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_film`
--
ALTER TABLE `order_film`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phim`
--
ALTER TABLE `phim`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `lich_trinh`
--
ALTER TABLE `lich_trinh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `loai_phim`
--
ALTER TABLE `loai_phim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `order_film`
--
ALTER TABLE `order_film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phim`
--
ALTER TABLE `phim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
