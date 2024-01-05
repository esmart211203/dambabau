-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 05, 2024 lúc 05:16 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `electronic_sales`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `user_email` varchar(255) NOT NULL,
  `maHangHoa` varchar(255) NOT NULL,
  `soLuong` int(11) NOT NULL,
  `tongTienGio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`user_email`, `maHangHoa`, `soLuong`, `tongTienGio`) VALUES
('admin@gmail.com', 'Hàng hóa 1', 4, 55555),
('admin@gmail.com', 'hh0005', 1, 100000),
('quanly@gmail.com', 'Hàng hóa 1', 1, 55555),
('quanly@gmail.com', 'ESPOIR', 1, 55555),
('quanly@gmail.com', 'HERA ', 1, 100000),
('quanly@gmail.com', 'ESPOIR ', 1, 100000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `maHangHoa` varchar(255) NOT NULL,
  `tenHangHoa` varchar(2552) NOT NULL,
  `donViTinh` varchar(255) NOT NULL,
  `donGia` int(255) NOT NULL,
  `hinh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`maHangHoa`, `tenHangHoa`, `donViTinh`, `donGia`, `hinh`) VALUES
('Hàng hóa 1', 'HERA - Đầm bầu thiết kế cho mẹ bầu và sau sinh thương hiệu MEGAU', 'klg', 55555, 'vaybau1.png'),
('hh0005', 'Áo dài thiết kế Cát Tường, áo dài cách tân tết 2024', 'klg', 100000, 'vaybau1.png'),
('ESPOIR', 'Váy đầm bầu đi tiệc thiết kế cho mẹ bầu và sau sinh thương hiệu MEGAU', 'klg', 55555, 'vn-11134207-7r98o-lp8tdfxwx3da5a.jpg'),
('LAMIA ', 'Đầm bầu hai dây sang trọng thương hiệu MEGAU', 'klg', 100000, 'vn-11134207-7qukw-lj24n92xx8sy4a.jpg'),
('SWEET ', 'Váy bầu thiết kế cho mẹ bầu và sau sinh thương hiệu MEGAU', 'klg', 599900, 'vaybau1.png'),
('ESPOIR ', 'Đầm bầu đi tiệc thiết kế cho mẹ bầu và sau sinh ', 'klg', 100000, 'vn-11134207-7r98o-lkq2j51za8pc55.jpg'),
('DARCY ', 'Đầm bầu hiện đại thiết kế thương hiệu MEGAU', 'klg', 100000, 'vn-11134207-7qukw-lj2yuv54rvnwd5.jpg'),
('HERA ', '( SALE ) Đầm bầu Babydoll Hinata DB020', 'klg', 100000, 'dam-bau-baby-doll-dep-de-thuong-1.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `hoTen` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `soDienThoai` varchar(11) NOT NULL,
  `matKhau` varchar(255) NOT NULL,
  `quyen` varchar(255) NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`hoTen`, `email`, `soDienThoai`, `matKhau`, `quyen`) VALUES
('đỗ xuân trọng', 'admin@gmail.com', '0989748659', 'adadad', 'customer'),
('Đậu quốc lợi', 'quanly@gmail.com', '0989748659', 'adadad', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
