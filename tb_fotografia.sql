-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 03, 2020 at 02:37 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `camerarooster`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_fotografia`
--

CREATE TABLE `tb_fotografia` (
  `id_fotografia` int(100) NOT NULL,
  `id_participante` int(100) NOT NULL,
  `cantidad_votos` bigint(20) NOT NULL,
  `fecha_publicacion` date NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` varchar(140) NOT NULL,
  `estado_participante` varchar(100) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `imagen` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_fotografia`
--

INSERT INTO `tb_fotografia` (`id_fotografia`, `id_participante`, `cantidad_votos`, `fecha_publicacion`, `titulo`, `descripcion`, `estado_participante`, `categoria`, `imagen`) VALUES
(10, 1, 1, '2020-11-30', 'cfghn', 'cfgn', 'pendiente', 'cfnc', 'rs40382bkhuo9jld5mwzya6pif.jpg'),
(11, 1, 2, '2020-11-30', 'asdf', 'xmhf', 'pendiente', 'asdf', 'dl30c14riafk6n8qmzvsj2u59e.jpg'),
(12, 1, 3, '2020-11-30', 'asdf', ' gvcnhm', 'pendiente', 'sdfg', 'g4ja03bno18psd95qru7cyt2xi.jpg'),
(13, 1, 4, '2020-11-30', 'sdfg', 'mcfghm', 'pendiente', 'sdfg', 'kn4gya5i3u7t6m0owsj89xdvrf.jpg'),
(14, 1, 10, '2020-11-30', 'dfghn', 'fxhmn', 'pendiente', 'sdfg', 'iyhgrazop5swnu403vekd697qj.jpg'),
(15, 1, 6, '2020-11-30', 'asdf', 'chgm', 'pendiente', 'sdfg', '87xzndf0vb5m36i4hces91gtyl.jpg'),
(16, 1, 7, '2020-11-30', 'asdf', 'chgm', 'pendiente', 'asdf', 'sd3gnjulorze2cvqmh01kya8tx.jpg'),
(17, 1, 8, '2020-11-30', 'sdfg', 'xhfgm', 'pendiente', 'sdfg', 'p0lqrw2djftos796xavuychgb1.jpg'),
(23, 1, 300, '2020-12-01', 'asdf', 'yjhfsr', 'pendiente', 'asdf', 'enqkrdigcxzb9v40stm6lh17aw.jpg'),
(24, 1, 200, '2020-12-01', 'sdfg', 'kuvg', 'pendiente', 'cfnc', 'mo5z1txjcufh09kp4y3ilbgn2r.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_fotografia`
--
ALTER TABLE `tb_fotografia`
  ADD PRIMARY KEY (`id_fotografia`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_fotografia`
--
ALTER TABLE `tb_fotografia`
  MODIFY `id_fotografia` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
