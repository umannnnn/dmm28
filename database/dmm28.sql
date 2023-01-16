-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2023 at 01:24 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dmm28`
--

-- --------------------------------------------------------

--
-- Table structure for table `datapelanggan`
--

CREATE TABLE `datapelanggan` (
  `id_pelanggan` int(30) NOT NULL,
  `pemesan` varchar(120) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `noKtp` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `noHp` varchar(50) NOT NULL,
  `tglPesan` varchar(50) NOT NULL,
  `tglBalik` varchar(50) NOT NULL,
  `fotoKtp` varchar(100) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `datapelanggan`
--

INSERT INTO `datapelanggan` (`id_pelanggan`, `pemesan`, `merk`, `nama`, `noKtp`, `alamat`, `noHp`, `tglPesan`, `tglBalik`, `fotoKtp`, `status`) VALUES
(62, 'bagus', 'Toyota Agya', 'USMAN PAMUNGKAS', '1232719362714421', 'Jalan Banjarbaru', '6285775144906', '16 January 2023', '19 January 2023', 'Ktp.pdf', 1),
(63, 'dias aji', 'Toyota Calya', 'Sesilyia Khalifatun', '1232719362714421', 'Bantarbolang, Peguyangan', '6282223507171', '16 January 2023', '19 January 2023', 'Ktp.pdf', 0),
(64, 'dias aji', 'Toyota Calya', 'lana danda', '1232719362714421', 'Perumahan hijau', '6282227974000', '16 January 2023', '17 January 2023', 'Ktp.pdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detailmobil`
--

CREATE TABLE `detailmobil` (
  `id_mobil` int(11) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `detail` varchar(1000) NOT NULL,
  `namaMobil` varchar(50) NOT NULL,
  `biayaSewa` varchar(50) NOT NULL,
  `tampilMobil` varchar(100) NOT NULL,
  `interMobil1` varchar(100) NOT NULL,
  `interMobil2` varchar(100) NOT NULL,
  `interMobil3` varchar(100) NOT NULL,
  `exterMobil1` varchar(100) NOT NULL,
  `exterMobil2` varchar(100) NOT NULL,
  `exterMobil3` varchar(100) NOT NULL,
  `transmisiMobil` varchar(50) NOT NULL,
  `bahanBakar` varchar(50) NOT NULL,
  `mesinMobil` varchar(50) NOT NULL,
  `tempatDuduk` varchar(50) NOT NULL,
  `gambarReview` varchar(100) NOT NULL,
  `reviewMobil` varchar(500) NOT NULL,
  `linkReviewUser` varchar(100) NOT NULL,
  `videoReview1` varchar(500) NOT NULL,
  `videoReview2` varchar(500) NOT NULL,
  `videoReview3` varchar(500) NOT NULL,
  `videoReview4` varchar(500) NOT NULL,
  `textReview1` varchar(200) NOT NULL,
  `textReview2` varchar(200) NOT NULL,
  `textReview3` varchar(200) NOT NULL,
  `textReview4` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detailmobil`
--

INSERT INTO `detailmobil` (`id_mobil`, `gambar`, `detail`, `namaMobil`, `biayaSewa`, `tampilMobil`, `interMobil1`, `interMobil2`, `interMobil3`, `exterMobil1`, `exterMobil2`, `exterMobil3`, `transmisiMobil`, `bahanBakar`, `mesinMobil`, `tempatDuduk`, `gambarReview`, `reviewMobil`, `linkReviewUser`, `videoReview1`, `videoReview2`, `videoReview3`, `videoReview4`, `textReview1`, `textReview2`, `textReview3`, `textReview4`) VALUES
(1, 'Agya.png', 'Jenis Transmisi Otomatis dan Bahan Bakar Bensin', 'Toyota Agya', '350.000', 'tampilAgya.jpg', 'InteriorAgya-1.jpg', 'InteriorAgya-2.jpg', 'InteriorAgya-3.jpg', 'ExteriorAgya-1.jpg', 'ExteriorAgya-2.jpg', 'ExteriorAgya-3.jpg', 'Otomatis', 'Bensin', '1200 ', '4', 'reviewAgya.jpg', 'PT Toyota Astra Motor (TAM) selaku Agen Pemegang Merek Toyota di Indonesia resmi meluncurkan salah satu mobil LCGC (Low Cost Green Car) mereka, yaitu Toyota Agya versi facelift.  Mobil ini diluncurkan pada tahun 2013 lalu dan telah mendapatkan pembaruan pada beberapa bagian, seperti pada sisi eksterior dan interiornya yang kini tampak lebih modern, serta fitur-fitur yang disematkan pun juga lebih canggih. Toyota Agya terbaru ini dinilai dapat terus meningkatkan penjualan kendaraan mobil Toyota k', 'https://www.oto.com/mobil-baru/toyota/agya/review-pengguna', 'style=\"height: 150px;\" src=\"https://www.youtube.com/embed/8k_oB1keFJg\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen', 'style=\"height: 150px;\" src=\"https://www.youtube.com/embed/_cOsmgq6N_I\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen', 'style=\"height: 150px;\" src=\"https://www.youtube.com/embed/bNdo3Q6wC4Y\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen', 'style=\"height: 150px;\" src=\"https://www.youtube.com/embed/JKdFmbNi010\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen', 'Toyota Agya 2020 | Review Indonesia | OtoDriver by Oto Driver', 'Toyota Agya TRD S 2018 Review Indonesia | OtoDriver | Supported by MBtech', 'Toyota AGYA 2020 jadi modern', 'Review Toyota Agya 1.200 cc test drive by AutonetMagz'),
(2, 'Calya.png', 'Jenis Transmisi Manual dan Bahan Bakar Bensin', 'Toyota Calya', '350.000 ', 'tampilCalya.jfif', 'interiorCalya-1.jfif', 'interiorCalya-2.jfif', 'interiorCalya-3.jfif', 'exteriorCalya-1.jfif', 'exteriorCalya-2.jfif', 'exteriorCalya-3.jfif', 'Manual', 'Bensin', '1197', '7', 'reviewCalya.jfif', 'Setelah sukses dengan Kijang dan Avanza, PT Toyota Astra Motor (TAM) resmi meluncurkan mobil MPV (Multi Purpose Vehicle), yaitu Toyota Calya pada tahun 2016 lalu. Mobil ini termasuk kategori mobil murah berkapasitas 7 penumpang yang menjadi penerus dari Toyota Avanza sebagai mobil sejuta umat. Pada tahun 2019, pihak Toyota kembali meluncurkan Calya terbaru versi facelift, bersamaan dengan peluncuran Daihatsu Sigra versi facelift. Jika melihat kedua mobil ini, terdapat pembaruan yang cukup signif', 'https://www.oto.com/mobil-baru/toyota/calya/review-pengguna', 'style=\"height: 150px;\" src=\"https://www.youtube.com/embed/eJcRjDSF66E\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen', 'style=\"height: 150px;\" src=\"https://www.youtube.com/embed/-yi0z_mBDN8\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen', 'style=\"height: 150px;\" src=\"https://www.youtube.com/embed/pZzsJM4XHII\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen', 'style=\"height: 150px;\" src=\"https://www.youtube.com/embed/F_van08y0EY\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen', 'Toyota Calya Review by AutonetMagz', 'Toyota Calya (Facelift 2019) FULL REVIEW: Alasan Bisa Sangat Laku', 'Ga Ada Lawan, 7 Seater TERMURAH Toyota Makin Keren! Ini Bedanya Calya Facelift 2022!', 'Bongkar !! Toyota New Calya Facelift 2022 Tipe G || Review Exterior & Interior Terbaru');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `userType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `userType`) VALUES
(1, 'Usman Pamungkas', 'usmanpamungkas30@gmail.com', '$2y$10$Ee6Nglf4anNQpV002v/N4Oo8vQ2V1KREg9mkRdjPBEifbrd45Z8Iy', 'admin'),
(2, 'dias aji', 'dias@gmail.com', '$2y$10$jf41HXcemEvmNVNpmyf50ujCcipDUc0qHBZmlio7/fPpjjkDvsYeO', 'user'),
(4, 'ayu', 'ayu@gmail.com', '$2y$10$TXUj574UPB66OSIQvLbB5uzTVSgu47Bdl3glsqpcNyJUruGSWmfzq', 'user'),
(5, 'citra ani', 'citraani21@gmail.com', '$2y$10$/IXzxtqs.LZx/tWWLokz0.UOuyjl1qfr3Djo7j.EdgvPodfDFiK8S', 'user'),
(7, 'bagus', 'bagus@gmail.com', '$2y$10$zuQ5f00F/oY3tI/ZV/vaoeQBuGnl3NFte5usakWqyX1cC12sufvee', 'user'),
(16, 'usman', 'jokitiktok001@gmail.com', '$2y$10$jckdeiWy7RRHJ5yq9z5TlODg1n5rdG/zYoB45q2Ix6TqEmfRDZRDa', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datapelanggan`
--
ALTER TABLE `datapelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `detailmobil`
--
ALTER TABLE `detailmobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datapelanggan`
--
ALTER TABLE `datapelanggan`
  MODIFY `id_pelanggan` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `detailmobil`
--
ALTER TABLE `detailmobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
