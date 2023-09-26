-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2022 at 03:14 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kreasiaiweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(25) NOT NULL,
  `token` varchar(255) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama_lengkap`, `email`, `token`, `last_login`) VALUES
(1, 'shofiudin_wafa', '$2y$10$tGV0.sL2t1.L6HUNE2U0TO1xrSMricioHm01cEIuo0Sup73MUXbUi', 'Shofiudin Wafa', 'shofiudinwafa@gmail.com', '', '2022-08-17 05:37:46');

-- --------------------------------------------------------

--
-- Table structure for table `galeri_layanan`
--

CREATE TABLE `galeri_layanan` (
  `id_gambar` int(11) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `nama_gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galeri_layanan`
--

INSERT INTO `galeri_layanan` (`id_gambar`, `id_layanan`, `nama_gambar`) VALUES
(7, 1, '1661957687_b51f10f7990f4c02db20.png'),
(8, 1, '1661957687_d599c8957b1f40eb7ab5.jpg'),
(9, 1, '1661957687_dd61f08b86a4d7251e1b.png'),
(10, 2, '1662992052_d6b86c9322174a67faff.jpg'),
(11, 2, '1662992052_4598ec6ccea51a483cd0.png'),
(12, 2, '1662992052_9a1643e10888a7310869.jpg'),
(13, 2, '1662992052_958ad97b11de72075547.jpg'),
(14, 19, '1663337577_19cec7d897f2969593df.png'),
(15, 19, '1663337577_58d0cc63f07e7f576d51.jpg'),
(16, 19, '1663337577_b91e03c080f30de15f85.png'),
(17, 19, '1663337577_7eb05fcff4beac54df6e.jpg'),
(18, 19, '1663337577_61672d4417093380d00c.png');

-- --------------------------------------------------------

--
-- Table structure for table `klien`
--

CREATE TABLE `klien` (
  `id_klien` int(25) NOT NULL,
  `nama_klien` varchar(255) NOT NULL,
  `logo_klien` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `klien`
--

INSERT INTO `klien` (`id_klien`, `nama_klien`, `logo_klien`) VALUES
(2, 'wafa cafe', '1663978445_4e0e07e5549e5779aaaa.jpg'),
(4, 'Wafa Krapu', '1663978986_97ef46c6e034f73713ff.jpg'),
(5, 'AI Studio', '1663979004_eb8621845a6ba26b3f6e.png'),
(6, 'kreasi ai', '1663979036_2ed6264f9d54e07a8d57.jpg'),
(7, 'shofiana store', '1663979059_64418fcf60bdd402994c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(11) NOT NULL,
  `detail_layanan` varchar(225) NOT NULL,
  `deskripsi_layanan` varchar(255) NOT NULL,
  `gambar_layanan` varchar(255) NOT NULL,
  `nama_layanan` varchar(25) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `detail_layanan`, `deskripsi_layanan`, `gambar_layanan`, `nama_layanan`, `created_at`, `updated_at`) VALUES
(19, 'Website Merupakan Elemen Penting Bagi Aktivitas Digital Marketing & Strategi Digital Business.\r\n\r\nWebsite Anda Lebih Dari Sekadar URL. Saatnya Memilih Developer Website Yang Memiliki Kualitas Kerja Menakjubkan. Dan Kami, Posi', 'Pembuatan website kami mulai dari harga Rp,6 Juta, website anda akan selesai sesuai yang anda inginkan', '1666937321_49727275b84b56dbe844.png', 'Jasa Pembuatan Website', NULL, NULL),
(20, 'Sekarang Waktu Yang Tepat! Dengan menggunakan Social Media Management(SMM) dapat meningkatkan Brand Awareness dalam bisnis yang Anda geluti saat ini.', 'Layanan ini mulai dari harga Rp. 1 Juta. sudah mencakup tim profesional', '1663258205_70a2091b8000b12d0805.png', 'Jasa Social Media Managem', NULL, NULL),
(21, '<p>logo yang unik dan menarik merupakan langkah awal yang membuat brand anda dapat diingat oleh customer serta efektif untuk membedakan brand anda ditengah ramainya persaingan bisnis dalam era digital.</p>', '<p>layanan ini mulai dari harga Rp.100k</p>\r\n', '1666996151_d403be11e647a49108ea.png', 'Jasa Pembuatan Desain Log', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2022-08-17-053626', 'App\\Database\\Migrations\\Admin', 'default', 'App', 1660714615, 1);

-- --------------------------------------------------------

--
-- Table structure for table `paket_layanan`
--

CREATE TABLE `paket_layanan` (
  `id_paket` int(25) NOT NULL,
  `nama_paket` varchar(255) NOT NULL,
  `detail_paket` varchar(900) NOT NULL,
  `harga_paket` varchar(255) NOT NULL,
  `id_layanan` int(25) NOT NULL,
  `diskon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket_layanan`
--

INSERT INTO `paket_layanan` (`id_paket`, `nama_paket`, `detail_paket`, `harga_paket`, `id_layanan`, `diskon`) VALUES
(1, 'Basic', '<p>  &#10004;1 GB SSD Storage</p>\r\n<p> &#10004; Professional Design</p>\r\n<p>  &#10004;Tombol Whatsapp </p>\r\n<p>  &#10004;Domain & Hosting </p>\r\n<p><s> &#10060SSL </s></p>\r\n<p><s> &#10060Request Fitur </s></p>\r\n<p><s> &#10060Unlimited Email </s> </p>', 'Rp. 2.000K,-', 19, 'Rp.2.500K,-'),
(2, 'Profesional', '<p>&#10004; 1 GB SSD Storage </p>\r\n<p> &#10004;Professional Design </p>\r\n<p>&#10004; Tombol Whatsapp </p>\r\n<p> &#10004;Domain & Hosting </p>\r\n<p>&#10004 SSL </p>\r\n<p> &#10004Request Fitur </p>\r\n<p>&#10060<s> Unlimited Email </s> </p>', 'Rp. 3.000K,-', 19, 'Rp.3.500K,-'),
(6, 'paket 2 edit 1', '<p>sdsdvf dsfdsfsdfsd</p><ul><li>jhjghhjhh</li></ul>', '2323', 6, '24000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `galeri_layanan`
--
ALTER TABLE `galeri_layanan`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `klien`
--
ALTER TABLE `klien`
  ADD PRIMARY KEY (`id_klien`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket_layanan`
--
ALTER TABLE `paket_layanan`
  ADD PRIMARY KEY (`id_paket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `galeri_layanan`
--
ALTER TABLE `galeri_layanan`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `klien`
--
ALTER TABLE `klien`
  MODIFY `id_klien` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paket_layanan`
--
ALTER TABLE `paket_layanan`
  MODIFY `id_paket` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
