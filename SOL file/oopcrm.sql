-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 25 Kas 2020, 09:43:27
-- Sunucu sürümü: 5.7.24
-- PHP Sürümü: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `oopcrm`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(33) COLLATE utf8_unicode_ci NOT NULL,
  `info` text COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `info`, `date`) VALUES
(2, 'Cathee Bonas', 'cbonas1@netlog.com', '926-306-4961', '', '2020-11-24 15:48:28'),
(3, 'Hayyim Wolsey', 'hwolsey2@sakura.ne.jp', '497-939-5494', '', '2020-11-24 15:48:28'),
(4, 'Deanne Blawasdfas', 'dblaw3@google.co.uk', '412-361-2473', '', '2020-11-24 18:07:54'),
(5, 'Dmitri Weldrake', 'dweldrake4@bloglines.com', '842-995-8663', '', '2020-11-24 15:48:28'),
(6, 'Alasteir Boughton', 'aboughton5@xrea.com', '434-457-3685', '', '2020-11-24 15:48:28'),
(7, 'Oliy Decaze', 'odecaze6@craigslist.org', '428-132-5858', '', '2020-11-24 15:48:28'),
(10, 'Verla Crayton', 'vcrayton9@ehow.com', '339-409-3511', 'ffff', '2020-11-24 18:06:49'),
(11, 'Ezekiel Hasselby', 'ehasselbya@cafepress.com', '586-588-5647', 'dgg', '2020-11-24 18:06:41'),
(63, 'Hiram Galle', 'gypyso@mailinator.com', '+1 (774) 308-2804', 'öşö,öş,', '2020-11-24 18:47:50');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
