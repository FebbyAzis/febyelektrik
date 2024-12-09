-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Des 2024 pada 00.12
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `febyelektrik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_barang`
--

CREATE TABLE `data_barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `banyaknya` bigint(255) NOT NULL,
  `harga_beli` bigint(255) NOT NULL,
  `harga_jual` bigint(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_barang`
--

INSERT INTO `data_barang` (`id`, `nama_barang`, `qty`, `banyaknya`, `harga_beli`, `harga_jual`, `created_at`, `updated_at`) VALUES
(1, 'Phillips Eternal 20 Watt', 'DUS', 25, 500000, 575000, '2024-12-02 11:51:05', '2024-12-02 12:23:58'),
(4, 'Phillips Eternal 25 Watt', 'DUS', 25, 600000, 680000, '2024-12-02 19:14:05', '2024-12-02 19:14:05'),
(5, 'Phillips Eternal 15 Watt', 'DUS', 25, 400000, 465000, '2024-12-02 19:15:39', '2024-12-02 19:15:39'),
(6, 'NJS Kairoz', 'DUS', 1, 550000, 600000, '2024-12-03 22:00:44', '2024-12-03 22:00:44'),
(7, 'NJS ZX-1', 'DUS', 1, 800000, 850000, '2024-12-03 22:01:27', '2024-12-03 22:01:27'),
(8, 'KYT TT-Course', 'DUS', 1, 1250000, 1350000, '2024-12-03 22:01:58', '2024-12-03 22:01:58'),
(9, 'KYT Kyoto', 'DUS', 1, 450000, 500000, '2024-12-03 22:02:31', '2024-12-03 22:02:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pelanggan`
--

CREATE TABLE `data_pelanggan` (
  `id` int(11) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_tlp` bigint(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pelanggan`
--

INSERT INTO `data_pelanggan` (`id`, `nama_toko`, `alamat`, `no_tlp`, `created_at`, `updated_at`) VALUES
(2, 'FEBY ELEKTRIK', 'CIPERNA', 87735030897, '2024-12-02 17:21:09', '2024-12-02 17:21:09'),
(3, 'FAJAR TOSERBA', 'Cilimus', 87735030897, '2024-12-03 21:58:11', '2024-12-03 21:58:11'),
(4, 'JB Variasi', 'Ciperna - Cirebon', 87735030897, '2024-12-03 22:03:14', '2024-12-03 22:03:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `faktur`
--

CREATE TABLE `faktur` (
  `id` int(11) NOT NULL,
  `data_pelanggan_id` int(11) NOT NULL,
  `no_faktur` bigint(255) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `faktur`
--

INSERT INTO `faktur` (`id`, `data_pelanggan_id`, `no_faktur`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, 2, 2024003, '2024-12-03', '2024-12-02 17:31:00', '2024-12-02 17:31:00'),
(2, 2, 2024004, '2024-12-03', '2024-12-02 20:10:10', '2024-12-02 20:10:10'),
(3, 3, 2024005, '2024-12-04', '2024-12-03 21:59:17', '2024-12-03 21:59:17'),
(4, 4, 2024006, '2024-12-04', '2024-12-03 22:03:50', '2024-12-03 22:03:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `faktur_id` int(11) NOT NULL,
  `data_barang_id` int(11) NOT NULL,
  `kuantitas` bigint(255) NOT NULL,
  `disc` double DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `invoice`
--

INSERT INTO `invoice` (`id`, `faktur_id`, `data_barang_id`, `kuantitas`, `disc`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 6, 0, '2024-12-02 18:49:32', '2024-12-02 19:30:29'),
(2, 1, 1, 5, 0, '2024-12-02 19:27:54', '2024-12-02 19:30:39'),
(4, 1, 5, 10, 0, '2024-12-03 14:14:41', '2024-12-03 14:14:41'),
(5, 4, 6, 10, 0, '2024-12-03 22:05:54', '2024-12-03 22:05:54'),
(6, 4, 7, 10, 5, '2024-12-03 22:06:09', '2024-12-03 22:06:09'),
(7, 4, 8, 10, 5, '2024-12-03 22:06:17', '2024-12-03 22:06:17'),
(8, 4, 9, 10, 5, '2024-12-03 22:06:27', '2024-12-03 22:06:27'),
(9, 4, 1, 2, NULL, '2024-12-09 13:23:41', '2024-12-09 13:23:41'),
(10, 4, 6, 3, NULL, '2024-12-09 13:23:58', '2024-12-09 13:23:58'),
(11, 4, 8, 25, NULL, '2024-12-09 13:24:10', '2024-12-09 13:24:10'),
(12, 4, 9, 30, NULL, '2024-12-09 13:24:20', '2024-12-09 13:24:20'),
(13, 4, 9, 50, NULL, '2024-12-09 13:24:29', '2024-12-09 13:24:29'),
(14, 4, 1, 100, NULL, '2024-12-09 13:24:40', '2024-12-09 13:24:40'),
(15, 4, 4, 4, NULL, '2024-12-09 13:25:40', '2024-12-09 13:25:40'),
(16, 4, 5, 5, NULL, '2024-12-09 13:25:50', '2024-12-09 13:25:50'),
(17, 4, 6, 2, NULL, '2024-12-09 13:25:57', '2024-12-09 13:25:57'),
(18, 4, 5, 6, NULL, '2024-12-09 13:26:03', '2024-12-09 13:26:03'),
(19, 4, 1, 1, NULL, '2024-12-09 13:26:40', '2024-12-09 13:26:40'),
(20, 4, 4, 2, NULL, '2024-12-09 13:26:48', '2024-12-09 13:26:48'),
(21, 4, 5, 3, NULL, '2024-12-09 13:27:01', '2024-12-09 13:27:01'),
(22, 4, 4, 6, NULL, '2024-12-09 14:55:30', '2024-12-09 14:55:30');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_pelanggan`
--
ALTER TABLE `data_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `faktur`
--
ALTER TABLE `faktur`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_barang`
--
ALTER TABLE `data_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `data_pelanggan`
--
ALTER TABLE `data_pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `faktur`
--
ALTER TABLE `faktur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
