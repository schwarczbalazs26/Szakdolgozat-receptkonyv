-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2024 at 09:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `receptkonyv`
--

-- --------------------------------------------------------

--
-- Table structure for table `alapanyagok`
--

CREATE TABLE `alapanyagok` (
  `alapanyag_id` int(11) NOT NULL,
  `recept_id` int(11) DEFAULT NULL,
  `alapanyag_nev` varchar(100) NOT NULL,
  `mertekegyseg` enum('mokkáskanál','kávéskanál','teáskanál','evőkanál','pohár','csésze','bögre','gerezd','g','dkg','kg','ml','dl','l') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `alapanyagok`
--

INSERT INTO `alapanyagok` (`alapanyag_id`, `recept_id`, `alapanyag_nev`, `mertekegyseg`) VALUES
(1, 1, 'tejföl', 'mokkáskanál');

-- --------------------------------------------------------

--
-- Table structure for table `allergenek`
--

CREATE TABLE `allergenek` (
  `allergen_id` int(20) NOT NULL,
  `recept_id` int(11) DEFAULT NULL,
  `allergen_nev` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `user_id` int(11) NOT NULL,
  `nev` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jelszo` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `felhasznalok`
--

INSERT INTO `felhasznalok` (`user_id`, `nev`, `email`, `jelszo`) VALUES
(2, 'teszt', 'teszt@gmail.com', '34228a532093278fcdc65c3a1338482e8bdc44f6'),
(3, 'teszt2', 'csakkomment@gmail.com', 'eecdb46d81ee7a0e28efaf9b0e35efd9fac63ddd');

-- --------------------------------------------------------

--
-- Table structure for table `hozzaszolasok`
--

CREATE TABLE `hozzaszolasok` (
  `hozzaszolas_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `recept_id` int(11) DEFAULT NULL,
  `szoveg` varchar(1000) NOT NULL,
  `datum` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `hozzaszolasok`
--

INSERT INTO `hozzaszolasok` (`hozzaszolas_id`, `user_id`, `recept_id`, `szoveg`, `datum`) VALUES
(2, 2, 1, 'asdasdasdasd', '2024-01-07 17:10:03'),
(3, 3, 1, 'teszteszteszt', '2024-01-07 17:21:22');

-- --------------------------------------------------------

--
-- Table structure for table `receptek`
--

CREATE TABLE `receptek` (
  `recept_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `cim` varchar(100) NOT NULL,
  `leiras` varchar(5000) NOT NULL,
  `nehezseg` tinyint(2) NOT NULL,
  `elkeszitesi_ido` smallint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `receptek`
--

INSERT INTO `receptek` (`recept_id`, `user_id`, `cim`, `leiras`, `nehezseg`, `elkeszitesi_ido`) VALUES
(1, 2, 'Krumplistészta', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean at erat pellentesque, maximus libero vitae, scelerisque arcu. Fusce lacus erat, venenatis eu volutpat sit amet, rhoncus at dui. Etiam turpis sapien, malesuada at libero sed, elementum imperdiet lectus. Aliquam scelerisque ante et quam sagittis, imperdiet hendrerit eros imperdiet. Morbi fermentum augue nec nisl pretium porta. Nullam id leo cursus, pellentesque tortor a, elementum arcu. Suspendisse nec ex consequat, facilisis nisl in, varius quam. Proin volutpat leo malesuada lectus maximus, id dapibus augue finibus. Aenean vulputate mi eget tortor sollicitudin aliquam at sit amet lorem. Morbi malesuada risus sed turpis convallis, facilisis facilisis odio suscipit. Aliquam elementum urna sed nisi imperdiet, dictum porttitor odio vehicula.\r\n\r\nCurabitur id nunc ipsum. Integer non feugiat mi. Ut vitae tortor lacinia, ornare lorem sed, tempor urna. Sed gravida nisi sit amet nisl cursus, semper ullamcorper augue euismod. Cras sed augue sed enim maximus lacinia vitae egestas sapien. Duis quis fringilla felis. Vestibulum consequat elit ac ligula tempor accumsan. Duis condimentum nunc massa. Aenean lobortis sagittis dolor id laoreet. Sed malesuada congue efficitur.\r\n\r\nNulla bibendum dapibus quam vitae malesuada. Vivamus ac rhoncus velit. Aenean lectus diam, varius non finibus quis, dictum ac orci. Maecenas lobortis lectus sed ligula ultrices ultrices. Ut tempus tincidunt tortor vitae feugiat. Fusce convallis eu sem quis pellentesque. Integer varius fermentum ultrices. Proin rhoncus risus sit amet urna ullamcorper, vel tristique turpis finibus. Morbi at pulvinar justo. Suspendisse porta vestibulum sapien, sed condimentum arcu varius et. Duis ac risus felis. Fusce tempus iaculis diam eget vulputate. Pellentesque non metus sit amet arcu condimentum elementum bibendum a nulla. Phasellus nec tellus massa. Cras aliquam nibh nec ligula convallis, convallis sollicitudin diam gravida. ', 5, 60);

-- --------------------------------------------------------

--
-- Table structure for table `recept_alapanyag kapcsolotabla`
--

CREATE TABLE `recept_alapanyag kapcsolotabla` (
  `recept_alapanyag_id` int(11) NOT NULL,
  `recept_id` int(11) NOT NULL,
  `alapanyag_id` int(11) NOT NULL,
  `mennyiseg` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recept_allergen kapcsolotabla`
--

CREATE TABLE `recept_allergen kapcsolotabla` (
  `recept_allergen_id` int(11) NOT NULL,
  `recept_id` int(11) NOT NULL,
  `allergen_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alapanyagok`
--
ALTER TABLE `alapanyagok`
  ADD PRIMARY KEY (`alapanyag_id`);

--
-- Indexes for table `allergenek`
--
ALTER TABLE `allergenek`
  ADD PRIMARY KEY (`allergen_id`),
  ADD UNIQUE KEY `recept_id` (`recept_id`);

--
-- Indexes for table `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `hozzaszolasok`
--
ALTER TABLE `hozzaszolasok`
  ADD PRIMARY KEY (`hozzaszolas_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `recept_id` (`recept_id`);

--
-- Indexes for table `receptek`
--
ALTER TABLE `receptek`
  ADD PRIMARY KEY (`recept_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `recept_alapanyag kapcsolotabla`
--
ALTER TABLE `recept_alapanyag kapcsolotabla`
  ADD PRIMARY KEY (`recept_alapanyag_id`);

--
-- Indexes for table `recept_allergen kapcsolotabla`
--
ALTER TABLE `recept_allergen kapcsolotabla`
  ADD PRIMARY KEY (`recept_allergen_id`),
  ADD KEY `recept_id` (`recept_id`),
  ADD KEY `allergen_id` (`allergen_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alapanyagok`
--
ALTER TABLE `alapanyagok`
  MODIFY `alapanyag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hozzaszolasok`
--
ALTER TABLE `hozzaszolasok`
  MODIFY `hozzaszolas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `receptek`
--
ALTER TABLE `receptek`
  MODIFY `recept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `recept_alapanyag kapcsolotabla`
--
ALTER TABLE `recept_alapanyag kapcsolotabla`
  MODIFY `recept_alapanyag_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recept_allergen kapcsolotabla`
--
ALTER TABLE `recept_allergen kapcsolotabla`
  MODIFY `recept_allergen_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allergenek`
--
ALTER TABLE `allergenek`
  ADD CONSTRAINT `allergenek_ibfk_1` FOREIGN KEY (`recept_id`) REFERENCES `receptek` (`recept_id`);

--
-- Constraints for table `hozzaszolasok`
--
ALTER TABLE `hozzaszolasok`
  ADD CONSTRAINT `hozzaszolasok_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `felhasznalok` (`user_id`),
  ADD CONSTRAINT `hozzaszolasok_ibfk_2` FOREIGN KEY (`recept_id`) REFERENCES `receptek` (`recept_id`);

--
-- Constraints for table `receptek`
--
ALTER TABLE `receptek`
  ADD CONSTRAINT `receptek_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `felhasznalok` (`user_id`);

--
-- Constraints for table `recept_alapanyag kapcsolotabla`
--
ALTER TABLE `recept_alapanyag kapcsolotabla`
  ADD CONSTRAINT `fk_alapanyag` FOREIGN KEY (`alapanyag_id`) REFERENCES `alapanyagok` (`alapanyag_id`),
  ADD CONSTRAINT `fk_recept` FOREIGN KEY (`recept_id`) REFERENCES `receptek` (`recept_id`),
  ADD CONSTRAINT `recept_alapanyag kapcsolotabla_ibfk_1` FOREIGN KEY (`recept_id`) REFERENCES `alapanyagok` (`recept_id`),
  ADD CONSTRAINT `recept_alapanyag kapcsolotabla_ibfk_2` FOREIGN KEY (`alapanyag_id`) REFERENCES `alapanyagok` (`alapanyag_id`);

--
-- Constraints for table `recept_allergen kapcsolotabla`
--
ALTER TABLE `recept_allergen kapcsolotabla`
  ADD CONSTRAINT `recept_allergen kapcsolotabla_ibfk_1` FOREIGN KEY (`recept_id`) REFERENCES `alapanyagok` (`recept_id`),
  ADD CONSTRAINT `recept_allergen kapcsolotabla_ibfk_2` FOREIGN KEY (`allergen_id`) REFERENCES `allergenek` (`allergen_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
