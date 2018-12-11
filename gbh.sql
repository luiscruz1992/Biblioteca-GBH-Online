-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 10, 2018 at 10:16 PM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 5.6.38-3+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gbh`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `img` varchar(200) DEFAULT NULL,
  `name` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `author` varchar(45) DEFAULT NULL,
  `year` int(11) NOT NULL,
  `file` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `img`, `name`, `description`, `author`, `year`, `file`, `created_at`, `updated_at`) VALUES
(1, 'the_mechanical_orange.jpg', 'La naranja mecánica', 'Un criminal en la Inglaterra del futuro pasa una serie de procesos experimentales para corregir sus impulsos violentos.', 'Anthony Burgess', 1971, 'the_mechanical_orange.pdf', '2018-12-10 00:49:35', '2018-12-10 00:49:35'),
(2, 'the_alchemist.jpg', 'El alquimista', 'El alquimista es un libro escrito por el brasileño Paulo Coelho que ha sido traducido a más de 63 lenguas y publicado en 150 países, y que ha vendido 65 millones de copias en todo el mundo.', 'Paulo Coelho', 1988, 'the_alchemist.pdf', '2018-12-10 01:41:30', '2018-12-10 01:41:30'),
(3, 'the_lord_of_the_rings.jpg', 'El Señor de los Anillos', 'El Señor de los Anillos es una novela de fantasía épica escrita por el filólogo y escritor británico J. R. R. Tolkien.', 'J. R. R. Tolkien', 1954, 'the_lord_of_the_rings.pdf', '2018-12-10 01:42:23', '2018-12-10 01:42:23'),
(4, 'the_knight_in_the_rusty_armor.jpg', 'El caballero de la armadura oxidada', 'El Caballero de la armadura oxidada es una novela del escritor estadounidense Robert Fisher y en el género de autoayuda y motivación por elementos de humor que emplea en sus obras. Es una obra superventa de la que se han vendido más de un millón de copias en todo el mundo.', 'Robert Fisher', 1987, 'the_knight_in_the_rusty_armor.pdf', '2018-12-10 03:25:06', '2018-12-10 03:25:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
