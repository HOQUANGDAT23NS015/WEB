-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 14, 2024 lúc 04:28 PM
-- Phiên bản máy phục vụ: 8.0.39
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `SoThuTu` int NOT NULL,
  `MaHoaDon` varchar(50) NOT NULL,
  `masanpham` varchar(50) NOT NULL,
  `soluong` int NOT NULL,
  `ngaylap` date NOT NULL,
  `TrangThai` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dangky`
--

CREATE TABLE `dangky` (
  `uname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `dangky`
--

INSERT INTO `dangky` (`uname`, `email`, `pass`) VALUES
('hkhkj', 'nfjdsfakjnf@gmail.com', '$2y$10$FI.54.tvxwLNhIbZdRpeJeKbnpBiiyIOeRe58KV0zAjHquf1PIEv6'),
('kim1234', 'kim1234@vku.udn.vn', '$2y$10$gC61OWfEXrG8mQ4l6gtM.eVCg4carq7Lfn7V4ZbxhUcP/ntuJXnIe'),
('kim12345', 'kim1234@gmail.com', '$2y$10$11/bpGSicXEzUaCWkr/1xORuX6LC/riytnAb.TTvvmQL7R0Lm9K46'),
('kimdt', 'kimph.23ns@vku.udn.vn', '$2y$10$q/6pOBTJMG9a.d.NG5RkeeHYjKFguzNH.0jlaVluz3QNOasaenNXy'),
('kimdth', 'kimph.23ns@vku.udn.vn', '$2y$10$q/6pOBTJMG9a.d.NG5RkeeHYjKFguzNH.0jlaVluz3QNOasaenNXy'),
('kkkk', 'dhfknsj@gmail.com', '$2y$10$EDnFqy3j.Lthz/QDD1XVoO5QkLyoGxPT7zMeM8d2Cm0zsh2yc6.GO'),
('nxd', 'ducnx.23et@vku.udn.vn', '$2y$10$pKpbeH38Kp1tpO06YXDraeR.ZKM29cVa2DFMBQF7I0kTBAaqXI2r2'),
('phamhoang', 'phamhoang@vku.udn.vn', '$2y$10$8EQNLi1z7CUydVjfbaF3/euz5fcKohMACOVvqpkakcSv7vfR.SsPC'),
('phamhoangk', 'phamhoangkim252005@gmail.com', '12345'),
('phk', 'phk@gmail.com', '$2y$10$H3S1T.6oWGmBDSA78ylC.eSv.TYw.RlXGdDydvbK.ZNbVvEvWw3kG'),
('th123', 'jkadcnkankqj@gmail.com', '$2y$10$GUyqPc9ce7L.Ab2z.lJpCO1/X4g0F3ahzmwZchbgQ7ywuy67Ei1WK'),
('tktk', 'tk@vku.udn.vn', '$2y$10$l1PdJqFpedakxS7h.QjnlusNWoyjUfP6YzHPLN1UKtu/vWS8f/QRO'),
('tukhanh', 'dhskja@gmail.com', '$2y$10$HYjfObfDqQJNtsoIE9JJhOrsG5iGXYWAEC5qPfJuMtDHgeUcoz.u6'),
('yeu', 'fhjkjfhgj@gmail.com', '$2y$10$ENw76OevkzaEifieN57pNOzB8zEEUida2dEq9LB/Gws6.tQxCB/fW');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHoaDon` varchar(50) NOT NULL,
  `TenTaiKhoan` int NOT NULL,
  `TongTien` int NOT NULL,
  `diachigiaohang` int NOT NULL,
  `sodienthoaigiaohang` text NOT NULL,
  `ngaylap` date NOT NULL,
  `trangthai` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `MaLoaiSanPham` varchar(50) NOT NULL,
  `TenLoaisanpham` varchar(50) NOT NULL,
  `trangthai` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`MaLoaiSanPham`, `TenLoaisanpham`, `trangthai`) VALUES
('Loai1', 'Trí Tuệ', 1),
('Loai2', 'Con Trai', 1),
('loại 3', 'Con gái', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaitaikhoan`
--

CREATE TABLE `loaitaikhoan` (
  `MaLoai` int NOT NULL,
  `TenLoai` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `loaitaikhoan`
--

INSERT INTO `loaitaikhoan` (`MaLoai`, `TenLoai`) VALUES
(0, 'Khách hàng'),
(1, 'Admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lsthidau`
--

CREATE TABLE `lsthidau` (
  `hoten` varchar(60) NOT NULL,
  `thoigianthidau` date NOT NULL,
  `ketqua` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `HoTen` varchar(50) NOT NULL,
  `Emai` varchar(255) NOT NULL,
  `TenTaiKhoan` varchar(50) NOT NULL,
  `MatKhau` varchar(50) NOT NULL,
  `TrangThai` tinyint(1) NOT NULL,
  `LoaiTaiKhoan` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`HoTen`, `Emai`, `TenTaiKhoan`, `MatKhau`, `TrangThai`, `LoaiTaiKhoan`) VALUES
('Phạm Kim', 'tk@gmail.com', 'kimph123', '12345', 1, 0),
('Pham Hoang Kim', 'kim@gmail.com', 'hoangkim@', '1234', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `mancc` varchar(10) NOT NULL,
  `tenncc` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`mancc`, `tenncc`) VALUES
('NCC1', 'Việt Nam'),
('NCC2', 'Nhật Bản'),
('NCC3', 'Hàn Quốc'),
('NCC4', 'Trung Quốc'),
('NCC5', 'Hoa Kỳ'),
('NCC6', 'Thái Lan');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `masanpham` varchar(50) NOT NULL,
  `tensanpham` varchar(50) NOT NULL,
  `mota` varchar(500) NOT NULL,
  `hinhanh` varchar(500) NOT NULL,
  `soluong` int NOT NULL,
  `dongia` int NOT NULL,
  `loaisanpham` varchar(50) NOT NULL,
  `trangthaisanpham` tinyint(1) NOT NULL,
  `Mancc` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`masanpham`, `tensanpham`, `mota`, `hinhanh`, `soluong`, `dongia`, `loaisanpham`, `trangthaisanpham`, `Mancc`) VALUES
('3', 'Máy bay cảm ứng điều khiển bằng tay', '', '../HinhAnh/maybay.png', 7652, 87000, 'Loai2', 1, 'NCC6'),
('2', 'Đồ chơi trí tuệ Bi house', '', '../HinhAnh/dochoitritue.png', 654, 105000, 'Loai1', 1, 'NCC1'),
('1', 'Rút kiếm hải tặc', 'Rút kiếm hải tặc là một trò chơi gây lại sóng gió cho mọi lứa tuổi.', '../HinhAnh/th.png', 2148, 56000, 'Loai1', 1, 'NCC4'),
('4', 'Đồ chơi Pop It', '', '../HinhAnh/bopit.png', 12424, 43000, 'Loai2', 1, 'NCC4'),
('5', 'Mèo Tom thông minh', '', '../HinhAnh/phat-hoang-khi-do-choi-meo-tom-lai-tai-xuattren-shopee_1.png', 566, 155000, 'Loai1', 1, 'NCC3'),
('6', 'Piano', '', '../HinhAnh/dan-piano-do-choi-cho-be-3206-2.png', 234, 89000, 'loại 3', 1, 'NCC4'),
('7', 'Rút gỗ', '', '../HinhAnh/rutgo.png', 2443, 77000, 'Loai1', 1, 'NCC2'),
('8', 'Bộ cân bằng ếch', '', '../HinhAnh/canbangech.png', 2412, 25000, 'Loai1', 1, 'NCC1'),
('9', 'Bộ bida', '', '../HinhAnh/bida.png', 2332, 12000, 'Loai2', 1, 'NCC4'),
('10', 'Uno ', '', '../HinhAnh/uno.png', 2212, 80000, 'Loai2', 1, 'NCC1'),
('11', 'Uno ', '', '../HinhAnh/uno.png', 2212, 80000, 'loại 3', 1, 'NCC1'),
('12', 'Súng bắn dính người', '', '../HinhAnh/sungban.png', 246, 53000, 'Loai2', 1, 'NCC1'),
('13', 'Bộ cờ tỷ phú', '', '../HinhAnh/bo-co-ty-phu-here-and-now1.png', 2434, 67000, 'Loai1', 1, 'NCC1'),
('14', 'Thử thách sự thật', '', '../HinhAnh/dare.png', 6147, 178000, 'Loai1', 1, 'NCC1'),
('15', 'Pokemon', '', '../HinhAnh/pokemon.png', 2452, 87000, 'Loai2', 1, 'NCC5'),
('16', 'Chim cánh cụt trên băng', '', '../HinhAnh/chimcanhcut.png', 224, 72000, 'Loai2', 1, 'NCC1'),
('17', 'Chim cánh cụt trên băng', '', '../HinhAnh/chimcanhcut.png', 234, 72000, 'loại 3', 1, 'NCC1'),
('18', 'Trang điểm', '', '../HinhAnh/botrangdiem.png', 543, 199000, 'loại 3', 1, 'NCC6'),
('19', 'Lắp ráp gấu dâu', '', '../HinhAnh/gaudau.png', 244, 54000, 'Loai1', 1, 'NCC5'),
('20', 'Cần câu cá', '', '../HinhAnh/cancau.png', 442, 50000, 'Loai2', 1, 'NCC1'),
('21', 'Cầu trượt con vịt', '', '../HinhAnh/cautruot.png', 346, 237000, 'Loai2', 1, 'NCC1'),
('22', 'Cầu trượt con vịt', '', '../HinhAnh/cautruot.png', 2212, 237000, 'loại 3', 1, 'NCC1'),
('23', 'Con quay zozo', '', '../HinhAnh/conquay.png', 345, 69500, 'Loai2', 1, 'NCC2'),
('24', 'Đính cườm', '', '../HinhAnh/dinhcuom.png', 344, 35000, 'loại 3', 1, 'NCC4'),
('25', 'Kiếm lazel', '', '../HinhAnh/kiemlazel.png', 26, 167000, 'Loai2', 1, 'NCC4'),
('26', 'Lồng đèn con thỏ', '', '../HinhAnh/longden.png', 5254, 15000, 'loại 3', 1, 'NCC1'),
('27', 'pikachu', '', '../HinhAnh/pikachu.png', 123, 65700, 'Loai2', 1, 'NCC4'),
('28', 'Nấu ăn', '', '../HinhAnh/nauan.png', 343, 289000, 'loại 3', 1, 'NCC4'),
('29', 'Bộ kem keo dán the Gô', '', '../HinhAnh/p-826-bo-kem-keo-dan-the-goo-cho-be-lam-qua-tang-nguoi-than-kem-hop-3-tang-2-1.png', 142, 467000, 'loại 3', 1, 'NCC4');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`SoThuTu`,`MaHoaDon`,`masanpham`);

--
-- Chỉ mục cho bảng `dangky`
--
ALTER TABLE `dangky`
  ADD PRIMARY KEY (`uname`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHoaDon`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`MaLoaiSanPham`);

--
-- Chỉ mục cho bảng `loaitaikhoan`
--
ALTER TABLE `loaitaikhoan`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`TenTaiKhoan`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`mancc`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masanpham`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
