-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 11 Jun 2023 pada 10.16
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_litrecipe`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(70, 'INDONESIAN'),
(71, 'JAPANESE'),
(72, 'AMERICAN'),
(73, 'KOREAN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int NOT NULL,
  `kategori_id` int NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `harga` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `detail` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `kategori_id`, `nama`, `harga`, `foto`, `detail`) VALUES
(54, 71, 'Sushi', '1', 'GV7VG2jlXf8vCEurKA7p.jpeg', '                    tes                '),
(55, 71, 'Ramen', '1', 'nB2a2NskEJ7UMuVCoZGg.jpeg', '                    tes                '),
(56, 71, 'Chicken Katsu', '1', 'jvHQet39mH4qswQRkA5L.jpeg', '                    tes                '),
(57, 72, 'Sandwich', '1', '3HGJairBqkMw2njXYz17.jpeg', '                    tes                '),
(58, 72, 'Hamburger', '1', '9T9YPrIbZ0mDR7CZB1QX.png', 'tes'),
(59, 72, 'Hotdog', '1', 'wXHKAIu9ahOgHGQFMSlk.jpeg', '                    tes                '),
(60, 72, 'Tteokbokki', '1', 'ytVKZoLDAGcJ35Yww8mS.png', 'tes'),
(61, 73, 'Kogo', '1', 'lUwTwIapTplybqPWLg7f.jpeg', '                    tes                '),
(62, 73, 'Mandu', '1', 'AGU1IWAnJmI51EKHGrvk.jpeg', '                    tes                '),
(63, 70, 'Rendang', '1', 'lMQVYJgQ4wR2ucUkjUcf.jpeg', '                                        tes                                '),
(64, 70, 'Chicken Satay', '1', 'd6euZqMVYZ3OxwKyZWOM.png', 'tes'),
(65, 70, 'Gulai Nangka', '1', 'lyalF43bGgSVRxVYSCop.jpeg', '                    tes                ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `role` enum('user','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(41, 'z', '$2y$10$VpQHu4x9J9YsdH6vXp7aQulN/7XcrMV4XggTetazwDzgldoMrdoGi', 'user'),
(42, 'x', '$2y$10$lEZoAv3SqU8Grol0yyWfAelG4bwve1BN.AOvPWILiqtiNtmoLW9jG', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`),
  ADD KEY `kategori_produk` (`kategori_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `kategori_produk` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
