-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2023 at 11:03 PM
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
-- Database: `houseofcuisines`
--
Create Database if Not exists `houseofcuisines` DEFAULT CHARACTER SET utf8mb4 collate utf8mb4_general_ci;
use `houseofcuisines`;

-- --------------------------------------------------------

--
-- Table structure for table `kat`
--

CREATE TABLE `kat` (
  `kategoriaID` int(11) NOT NULL,
  `emriKategoris` varchar(255) NOT NULL,
  `pershkrimiKategoris` varchar(255) DEFAULT NULL,
  `fotoKategoris` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kat`
--

INSERT INTO `kat` (`kategoriaID`, `emriKategoris`, `pershkrimiKategoris`, `fotoKategoris`) VALUES
(1, 'Supa', 'Supa te ndryshme, te ngrohta dhe te ftohta te te gjitha llojove porositni te i provoni dhe nuk do e nderroni', 'soup1.jpg'),
(2, 'Pasta', 'Pasta is made from an unleavened dough of wheat flour mixed with water or eggs, and formed into sheets or other shapes.', 'pasta.png'),
(3, 'Salad', 'One of the easiest ways to get a healthy, wholesome weeknight meal without much effort is a big salad with a little protein.', 'salad3.jpg'),
(4, 'Beef', 'A good steak is juicy, tender, loaded with flavor, and has a minimum amount of fat. Lean is the cherry-red part of the meat', 'meat.png');

-- --------------------------------------------------------

--
-- Table structure for table `menuja`
--

CREATE TABLE `menuja` (
  `produktiMID` int(11) NOT NULL,
  `emri` varchar(255) NOT NULL,
  `kategoria` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `qmimi` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menuja`
--

INSERT INTO `menuja` (`produktiMID`, `emri`, `kategoria`, `foto`, `qmimi`) VALUES
(1, 'Lentil Soup', 'soup', 'soup1.jpg', '2.00'),
(2, 'Tomato Soup', 'soup', 'soup2.jpg', '3.00'),
(3, 'Italian Soup', 'soup', 'soup3.jpg', '4.00'),
(4, 'Neapolitan Pizza', 'soup', 'pizza1.jpg', '3.00'),
(5, 'Sushi', 'soup', 'specialities1.png', '20.00'),
(6, 'Lobster Salad', 'salads', 'salad5.jpg', '50.00'),
(7, 'Cheesecakes', 'desserts', 'd4.jpg', '4.00');

-- --------------------------------------------------------

--
-- Table structure for table `porosit`
--

CREATE TABLE `porosit` (
  `nrPorosis` int(11) NOT NULL,
  `idKlienti` int(11) DEFAULT NULL,
  `dataPorosis` date NOT NULL DEFAULT current_timestamp(),
  `TotaliPorosis` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tedhenatporosis`
--

CREATE TABLE `tedhenatporosis` (
  `idPorosia` int(11) DEFAULT NULL,
  `idProdukti` int(11) DEFAULT NULL,
  `qmimiProd` double(10,2) NOT NULL,
  `sasiaPorositur` int(5) NOT NULL,
  `qmimiTotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `emri` varchar(20) NOT NULL,
  `mbiemri` varchar(30) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `aksesi` int(1) NOT NULL DEFAULT 0,
  `email` varchar(50) DEFAULT NULL,
  `nrTel` int(10) DEFAULT NULL,
  `Adresa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `emri`, `mbiemri`, `username`, `password`, `aksesi`, `email`, `nrTel`, `Adresa`) VALUES
(1, 'Ilire', 'JEzerci', 'admin', 'admin', 1, 'user@email.com', 045111222, 'Agim Bajrami, Kacanik,  71000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kat`
--
ALTER TABLE `kat`
  ADD PRIMARY KEY (`kategoriaID`);

--
-- Indexes for table `menuja`
--
ALTER TABLE `menuja`
  ADD PRIMARY KEY (`produktiMID`);

--
-- Indexes for table `porosit`
--
ALTER TABLE `porosit`
  ADD PRIMARY KEY (`nrPorosis`),
  ADD KEY `FK_KlientiPorosia` (`idKlienti`);

--
-- Indexes for table `tedhenatporosis`
--
ALTER TABLE `tedhenatporosis`
  ADD KEY `FK_PorosiaTeDhenatPorosis` (`idPorosia`),
  ADD KEY `FK_PorosiaProdukti` (`idProdukti`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kat`
--
ALTER TABLE `kat`
  MODIFY `kategoriaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menuja`
--
ALTER TABLE `menuja`
  MODIFY `produktiMID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `porosit`
--
ALTER TABLE `porosit`
  MODIFY `nrPorosis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `porosit`
--
ALTER TABLE `porosit`
  ADD CONSTRAINT `FK_KlientiPorosia` FOREIGN KEY (`idKlienti`) REFERENCES `user` (`userID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tedhenatporosis`
--
ALTER TABLE `tedhenatporosis`
  ADD CONSTRAINT `FK_PorosiaProdukti` FOREIGN KEY (`idProdukti`) REFERENCES `menuja` (`produktiMID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_PorosiaTeDhenatPorosis` FOREIGN KEY (`idPorosia`) REFERENCES `porosit` (`nrPorosis`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
