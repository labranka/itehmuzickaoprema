-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2020 at 10:11 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `muzickaoprema`
--

-- --------------------------------------------------------

--
-- Table structure for table `admini`
--

CREATE TABLE `admini` (
  `admin_id` int(10) NOT NULL,
  `admin_ime` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admini`
--

INSERT INTO `admini` (`admin_id`, `admin_ime`, `admin_email`, `admin_pass`, `admin_image`) VALUES
(1, 'Branka', 'b@gmail.com', 'branka', 'brankafoto.jpg'),
(2, 'Tijana', 't@gmail.com', 'tijana', 'tijanafoto.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE `kategorije` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`cat_id`, `cat_title`, `cat_desc`) VALUES
(1, 'Muzički instrumenti', 'Pogledajte naš raznolik asortiman muzičkih instrumenata i izaberite neki o kom ste oduvek sanjali.'),
(2, 'Muzički dodaci', 'Pogledajte naš raznolik asortiman muzičkih dodataka i izaberite neki o kom ste oduvek sanjali. '),
(3, 'Kablovi', 'Pogledajte naš raznolik asortiman muzičkih dodataka i izaberite neki o kom ste oduvek sanjali. '),
(4, 'Ostalo', 'Pogledajte naš raznolik asortiman muzičkih dodataka i izaberite neki o kom ste oduvek sanjali. ');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `korisnik_id` int(10) NOT NULL,
  `korisnik_ime` varchar(255) NOT NULL,
  `korisnik_email` varchar(255) NOT NULL,
  `korisnik_pass` varchar(255) NOT NULL,
  `korisnik_drzava` text NOT NULL,
  `korisnik_grad` text NOT NULL,
  `korisnik_kontakt` varchar(255) NOT NULL,
  `korisnik_adresa` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`korisnik_id`, `korisnik_ime`, `korisnik_email`, `korisnik_pass`, `korisnik_drzava`, `korisnik_grad`, `korisnik_kontakt`, `korisnik_adresa`, `customer_image`, `customer_ip`) VALUES
(1, 'Branka', 'branka@gmail.com', 'aaaaaa', 'Srbija', 'Beograd', '0659730239', 'IV crnogorska', 'IMG-20181223-WA0039.jpg', '::1'),
(3, 'Vesna Lakicevic', 'vesnaveja98@gmail.com', 'uzivajuzivotu', 'Srbija', 'Beograd', '0653753991', 'Tosin Bunar', 'WhatsApp Image 2019-10-15 at 12.23.47 AM.jpeg', '::1'),
(4, 'Tijana', 't@gmail.com', 'tttttt', 'Srbija', 'Beograd', '555555', 'Tosin Bunar', 'IMG-20181223-WA0042.jpg', '::1'),
(5, 'Nenad', 'n@gmail.com', 'aaaaaa', 'Srbija', 'Beograd', '999999', 'Tosin Bunar', 'IMG-20180921-WA0002.jpg', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE `proizvodi` (
  `proizvod_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `proizvod_naziv` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `proizvod_cena` int(10) NOT NULL,
  `product_keywords` text NOT NULL,
  `proizvod_opis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`proizvod_id`, `p_cat_id`, `cat_id`, `datum`, `proizvod_naziv`, `product_img1`, `product_img2`, `product_img3`, `proizvod_cena`, `product_keywords`, `proizvod_opis`) VALUES
(2, 5, 2, '2020-02-03 18:32:53', 'Zvučnici P253 9000w', 'boys-Puffer-Coat-With-Detachable-Hood-1.jpg', 'boys-Puffer-Coat-With-Detachable-Hood-2.jpg', 'boys-Puffer-Coat-With-Detachable-Hood-3.jpg', 10000, 'zvucnici', '<p>Muzički zvučnici jačine 8000w crne boje. Priključak na kabl.</p>'),
(3, 5, 2, '2020-02-03 18:41:03', 'Zvučnici proi3 900w', 'g-polos-tshirt-1.jpg', 'g-polos-tshirt-2.jpg', '', 5000, 'zvucnici', '<p>Zvučnici proi3 jačine 900w. Detalji su od prirodnog materijala. Priključak na kabl.</p>'),
(4, 4, 1, '2020-02-03 18:42:51', 'Violina', 'High Heels Women Pantofel Brukat-1.jpg', 'grey-man-2.jpg', 'grey-man-3.jpg', 30000, 'violina', '<p>Violina od prirodnog materijala. Izradjena je od najfinijeg drveta hrasta. Violina je tipa V-999.</p>'),
(5, 1, 1, '2020-02-03 18:44:40', 'Gitara', 'Man-Adidas-Suarez-Slop-On-1.jpg', 'Man-Adidas-Suarez-Slop-On-2.jpg', 'Man-Adidas-Suarez-Slop-On-3.jpg', 15000, 'gitara', '<p>Akustična gitara OD-5555-vps. Gitara izradjena od prirodnih materijala crne boje.</p>'),
(6, 1, 1, '2020-02-03 18:46:56', 'Gitara e-pro5', 'Man-Geox-Winter-jacket-1.jpg', 'Man-Geox-Winter-jacket-2.jpg', 'Man-Geox-Winter-jacket-3.jpg', 60000, 'gitara', '<p>Električna crna gitara. Gitara je izradjena od izuzetnog materijala. Jačina gitare je 9000w. Priključak na struju.</p>'),
(7, 1, 0, '2020-02-03 18:48:35', 'Gitara eg999', 'Man-Polo-1.jpg', 'Man-Polo-2.jpg', 'Man-Polo-3.jpg', 90000, 'gitara', '<p>Električna gitara marke eg999 jačine 10000w. Uz gitaru dolazi i kablovi kao i postolje.</p>'),
(8, 2, 1, '2020-02-03 18:50:13', 'Bubnjevi', 'Mont-Blanc-Belt-man-1.jpg', 'Mont-Blanc-Belt-man-2.jpg', 'Mont-Blanc-Belt-man-3.jpg', 90000, 'bubnjevi', '<p>Bubnjevi izradjeni od prirodnog drveta. Komplet bubnjeva sa pomoćnim materijalom dolazi u paketu.</p>'),
(10, 2, 1, '2020-02-03 18:52:57', 'Bubnjevi električni', 'Red-Winter-jacket-1.jpg', 'Red-Winter-jacket-2.jpg', 'Red-Winter-jacket-3.jpg', 120000, 'bubnjevi', '<p>Bubnjevi električni. Marka mal-99f, jačine 8000w. Uz bubnjeve dolaze i svi propratni delovi.</p>'),
(11, 2, 1, '2020-02-03 18:54:22', 'Bubnjevi', 'waxed-cotton-coat-woman-1.jpg', 'waxed-cotton-coat-woman-2.jpg', 'waxed-cotton-coat-woman-3.jpg', 99000, 'bubnjevi', '<p>Bubnjevi električni izradjeni od prirodnih materijala. U pitanju je marka po-9999</p>'),
(12, 3, 3, '2020-02-06 20:12:47', 'Priključni kabl', 'women-diamond-heart-ring-1.jpg', 'women-diamond-heart-ring-2.jpg', 'women-diamond-heart-ring-3.jpg', 1500, 'kabl', '<p>Priključni kabl. Priključak sa obe strane.</p>'),
(13, 4, 1, '2020-02-04 01:01:49', 'Violina v8', 'grey-man-1.jpg', 'grey-man-2.jpg', 'grey-man-3.jpg', 90000, 'violina', '<p>Violina v8. Violina sa gudalom izradjena od 100% prirodnih materijala izuzetnog kvaliteta.</p>'),
(14, 3, 3, '2020-02-07 01:37:04', 'Kabl za klavir', 'polos-tshirt-1.jpg', 'polos-tshirt-2.jpg', 'polos-tshirt-2.jpg', 600, 'kabl', '<p>Priključak dužine 10m za klavir. Izradjen od izuzetno kvalitetnog materijala crne boje. Garancija godinu dana.</p>'),
(15, 1, 1, '2020-02-07 19:50:49', 'Elektricna gitara', 'slika2 (1).jpg', 'slika3.jpg', 'slika3.jpg', 90500, 'gitara', '<p>Elektricna gitara snage 5000w sa prikljucnim kablom. Gitara je izradjena od izuzetno kvalitetnog materijala.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `proizvod_kategorije`
--

CREATE TABLE `proizvod_kategorije` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proizvod_kategorije`
--

INSERT INTO `proizvod_kategorije` (`p_cat_id`, `p_cat_title`, `p_cat_desc`) VALUES
(1, 'Gitare', 'Naše gitare su izradjene od najkvalitetnijih materijala. U proizvodnji se koriste samo prirodni materijali i vodi se računa o svakom detalju muzičkog instrumenta.'),
(2, 'Bubnjevi', 'Naš bubnjevi su izradjeni od najkvalitetnijih materijala. U proizvodnji se koriste samo prirodni materijali i vodi se računa o svakom detalju muzičkog instrumenta. Odaberite savršen instrument iz vaše omiljene kategorije.'),
(3, 'Muzički kablovi', 'Naši kablovi su izradjeni od najkvalitetnijih materijala. U proizvodnji se koriste samo provereni materijali i vodi se računa o svakom detalju proizvoda. Odaberite savršen proizvod iz vaše omiljene kategorije. Uz svaki proizvod dobijate garanciju.'),
(4, 'Violine', 'Naše violine su izradjeni od najkvalitetnijih materijala. U proizvodnji se koriste samo prirodni materijali i vodi se računa o svakom detalju muzičkog instrumenta. Odaberite savršen instrument iz vaše omiljene kategorije.'),
(5, 'Zvučnici', 'Naši zvučnici su izradjeni od najkvalitetnijih materijala. U proizvodnji se koriste samo prirodni materijali i vodi se računa o svakom detalju proizvoda. Odaberite savršene muzičke zvučnike iz asortimana naših proizvoda.');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slide_id` int(10) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_image`) VALUES
(1, 'Slide broj 1', 'slide-1.jpg'),
(2, 'Slide broj 2', 'slide-2.jpg'),
(3, 'Slide broj 3', 'slide-3.jpg'),
(4, 'Slide broj 4', 'slide-4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sopingkartica`
--

CREATE TABLE `sopingkartica` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `kolicina` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sopingkartica`
--

INSERT INTO `sopingkartica` (`p_id`, `ip_add`, `kolicina`) VALUES
(3, '::1', 1),
(7, '::1', 1),
(15, '::1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admini`
--
ALTER TABLE `admini`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `kategorije`
--
ALTER TABLE `kategorije`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`korisnik_id`);

--
-- Indexes for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD PRIMARY KEY (`proizvod_id`);

--
-- Indexes for table `proizvod_kategorije`
--
ALTER TABLE `proizvod_kategorije`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `sopingkartica`
--
ALTER TABLE `sopingkartica`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admini`
--
ALTER TABLE `admini`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategorije`
--
ALTER TABLE `kategorije`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `korisnik_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `proizvodi`
--
ALTER TABLE `proizvodi`
  MODIFY `proizvod_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `proizvod_kategorije`
--
ALTER TABLE `proizvod_kategorije`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
