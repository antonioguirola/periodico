-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 11, 2013 at 11:10 AM
-- Server version: 5.1.69
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `x25601566`
--

-- --------------------------------------------------------

--
-- Table structure for table `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
  `usuario` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `atajoNoticia` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cuerpo_comentario` longtext COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`usuario`,`atajoNoticia`,`fecha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `comentario`
--

INSERT INTO `comentario` (`usuario`, `atajoNoticia`, `fecha`, `cuerpo_comentario`) VALUES
('antonio', 'plan-reformas-millones-20130501.php', '2013-07-03 12:02:21', 'escribiendo comentario'),
('user1', 'bayern-humilla-barsa-20130501.php', '2013-06-11 14:23:17', 'probando comentarios'),
('user1', 'bayern-humilla-barsa-20130501.php', '2013-06-11 14:24:53', 'pues parece que esto de los comentarios funciona bien'),
('user2', 'mayo-lluvias-cuatro-provincias-20130501.php', '2013-06-11 14:32:40', 'Comentando....'),
('user2', 'mayo-lluvias-cuatro-provincias-20130501.php', '2013-06-11 14:32:52', 'Y volviendo a comentar....'),
('user2', 'normalmente-jerez-pista-mejor-20130501.php', '2013-06-11 14:28:58', 'Escribiendo un comentario');

-- --------------------------------------------------------

--
-- Table structure for table `noticia`
--

CREATE TABLE IF NOT EXISTS `noticia` (
  `titulo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `cuerpo` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=34 ;

--
-- Dumping data for table `noticia`
--

INSERT INTO `noticia` (`titulo`, `cuerpo`, `id`, `fecha`) VALUES
('NecrolÃ³gicas', 'La muerte acaba con la vida de dos personas', 28, '2013-06-08 22:48:58'),
('Comunicado OMS', 'La OMS pide a los polÃ­ticos espaÃ±oles que no mezclen alcohol y polÃ­tica', 29, '2013-06-08 22:49:24'),
('PrÃ­ncipe de Asturias', 'El PrÃ­ncipe de Asturias se declara harto de premiar siempre â€œal mismo tipo de peÃ±aâ€', 30, '2013-06-08 22:50:40'),
('probando', 'noticia de prueba', 31, '2013-06-09 16:50:54'),
('Prueba', 'Probando noticia', 32, '2013-07-03 12:01:02'),
('hola', 'hola', 33, '2013-07-26 18:14:46');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `nombreUsuario` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` int(11) DEFAULT NULL,
  `fechaNacimiento` date NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`nombreUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`nombreUsuario`, `password`, `nombre`, `apellidos`, `telefono`, `fechaNacimiento`, `email`) VALUES
('a', 'a', 'a', 'a', 666555444, '2000-06-25', 'aADF@fada.com'),
('admin', 'admin', 'administrador', 'administrador', NULL, '2013-06-11', ''),
('antonio', 'antonio', 'antonio', 'guirola', 666666666, '1995-01-31', 'antonio@antonio.com'),
('user1', 'pass1', 'usuario1', 'apusuario1', NULL, '2013-06-11', ''),
('user2', 'pass2', 'nombre2', 'ap2', NULL, '0000-00-00', ''),
('user3', 'pass3', 'nombre3', 'ap3', NULL, '0000-00-00', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `usuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`nombreUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
