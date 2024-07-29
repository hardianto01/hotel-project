-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jul 2024 pada 07.40
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_news` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `deskripsi` varchar(128) NOT NULL,
  `tombol` varchar(20) NOT NULL,
  `link` varchar(128) NOT NULL,
  `urutan` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_news`, `judul`, `deskripsi`, `tombol`, `link`, `urutan`, `gambar`, `tanggal`) VALUES
(2, 'Hotel Santika Makassar Menyediakan Paket Staycation Menarik', 'Dari Indonesia, Malaysia Hingga Palestina: “Aksi Pemimpin Muda Global”', 'jamal', 'https://newscom.id/2024/07/20/dari-indonesia-malaysia-hingga-palestina-aksi-pemimpin-muda-global/', 1, '1722154732.jpg', '2024-07-28'),
(3, 'How sober bars are redefining nightlife', 'How sober bars are redefining nightlife', 'jamal', 'https://edition.cnn.com/2024/07/27/us/sober-bars-mocktails-alcohol-free-wellness-cec/index.html', 2, '1722156886.png', '2024-07-28'),
(4, 'jamal pecahkan rekor pengangguran', 'sadas safdas asfa sa asfas fa as afa fafafaf', 'jamal', 'https://edition.cnn.com/2024/07/27/us/sober-bars-mocktails-alcohol-free-wellness-cec/index.html', 3, '1722157409.png', '2024-07-02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `fasilitas` varchar(20) NOT NULL,
  `deskripsi` varchar(128) NOT NULL,
  `icon` varchar(20) NOT NULL,
  `urutan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `fasilitas`, `deskripsi`, `icon`, `urutan`) VALUES
(1, 'Wellness & Spa', 'Rejuvenate your mind and body at our state-of-the-art wellness center. Our spa offers a range of treatments, including massages,', 'bx bx-spa', 2),
(2, 'Accommodation', 'Our spacious and elegantly furnished rooms and suites are designed to cater to your every need. Enjoy plush bedding, modern amen', 'bx bx-bed', 1),
(3, 'Dinning', 'Indulge in a culinary journey at our on-site restaurants. From international cuisine to local delicacies, our chefs prepare a va', 'bx bx-coffee', 3),
(4, 'Meeting & Event Spac', 'Host your next business meeting or special event in our versatile event spaces. Our conference rooms are equipped with modern au', 'bx bx-briefcase-alt', 4),
(5, 'Convenience & Servic', 'At Pleasure Hotel, we prioritize your comfort and convenience. Our 24-hour front desk, concierge service, and room service are a', 'bx bx-transfer', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `galery`
--

CREATE TABLE `galery` (
  `id` int(11) NOT NULL,
  `file` varchar(128) NOT NULL,
  `urutan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `galery`
--

INSERT INTO `galery` (`id`, `file`, `urutan`) VALUES
(4, '1722161791.mp4', 2),
(5, '1722161934.png', 1),
(6, '1722162596.mp4', 1),
(7, '1722162647.mp4', 3),
(8, '1722162659.mp4', 4),
(9, '1722162659.mp4', 4),
(12, '1722162987.png', 3),
(13, '1722162997.jpeg', 4),
(14, '1722163020.jpg', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id_pengaturan` int(11) NOT NULL,
  `appname` varchar(50) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `copyright` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `author` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengaturan`
--

INSERT INTO `pengaturan` (`id_pengaturan`, `appname`, `logo`, `copyright`, `description`, `keyword`, `author`) VALUES
(1, 'Pleasure Hotel', '1722150441.jpeg', '2024 || Pleasure Hotel', 'melayani hotel dan pijat +++', 'php, css, js, bootstrap', 'jamal squad');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `tentang` text NOT NULL,
  `visimisi` text NOT NULL,
  `struktur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id_profil`, `tentang`, `visimisi`, `struktur`) VALUES
(1, '<p>Selamat datang di Pleasure Hotel, sebuah hotel bintang 5 yang bergengsi yang terletak di Jalan Perintis Kemerdekaan, Makassar. Sejak berdiri pada tahun 2011, kami telah berkomitmen untuk menyediakan pelayanan yang luar biasa dan akomodasi mewah bagi tamu-tamu kami yang terhormat dari seluruh Indonesia.</p>\r\n<p>Hotel kami berdiri sebagai mercusuar elegansi dan kenyamanan, menawarkan pengalaman perhotelan yang tiada duanya. Setiap aspek dari Pleasure Hotel dirancang dengan cermat untuk memenuhi standar tertinggi, memastikan tamu kami menikmati masa inap yang ditandai dengan kecanggihan dan keunggulan.</p>\r\n<p>Di Pleasure Hotel, kami bangga dengan perhatian kami terhadap detail dan pelayanan yang dipersonalisasi. Apakah Anda berada di sini untuk keperluan bisnis atau liburan, tim kami yang berdedikasi siap melayani setiap kebutuhan Anda, memastikan pengalaman menginap yang mengesankan dan menyenangkan.</p>\r\n<p>Terima kasih telah memilih Pleasure Hotel. Kami menantikan kehadiran Anda dan membuat masa inap Anda bersama kami benar-benar luar biasa.</p>', '', '1722167370.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slide`
--

CREATE TABLE `slide` (
  `id_slide` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `deskripsi` varchar(128) NOT NULL,
  `tombol` varchar(20) NOT NULL,
  `link` varchar(128) NOT NULL,
  `urutan` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `slide`
--

INSERT INTO `slide` (`id_slide`, `judul`, `deskripsi`, `tombol`, `link`, `urutan`, `gambar`) VALUES
(3, 'Fitness center', 'Pusat kebugaran kami dilengkapi dengan peralatan fitness terbaru dan terbaik, termasuk treadmill, sepeda statis dll', 'LOGIN', 'https://siakad.akba.ac.id/', 2, '1722169433.jpeg'),
(4, 'Swimming pool', 'Nikmati kemewahan dan relaksasi di kolam renang eksklusif kami di Pleasure Hotel', 'ool', 'kkk.com', 3, '1722168515.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `role` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `role`, `foto`) VALUES
(1, '12345678', '$2y$10$HVa49IQ4hVKPRoHUnaf5tO5FRptzIiu.SCRDQLJ5688exp9ew7RLa', 'Brandon Lee', 1, '1718044731.jpg'),
(6, 'mimin', '$2y$10$RVums3DO0/k4IhHiFixz7uvN29mJzQ0wkbaFOudHMA8GrHS/Cq5OW', 'Anton', 2, '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_news`);

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indeks untuk tabel `galery`
--
ALTER TABLE `galery`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id_pengaturan`);

--
-- Indeks untuk tabel `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indeks untuk tabel `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id_slide`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `galery`
--
ALTER TABLE `galery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id_pengaturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `slide`
--
ALTER TABLE `slide`
  MODIFY `id_slide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
