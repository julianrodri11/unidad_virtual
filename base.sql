-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-11-2014 a las 01:54:10
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `base`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(350) NOT NULL,
  `imagen` int(5) NOT NULL,
  `fondo` int(5) NOT NULL,
  `color` varchar(6) NOT NULL,
  `tamano` int(11) NOT NULL,
  `fuente` int(3) NOT NULL,
  `idPer` bigint(12) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `imagen` (`imagen`),
  KEY `fondo` (`fondo`),
  KEY `idPer` (`idPer`),
  KEY `idopc` (`color`),
  KEY `fuente` (`fuente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `banners`
--

INSERT INTO `banners` (`id`, `titulo`, `imagen`, `fondo`, `color`, `tamano`, `fuente`, `idPer`) VALUES
(12, 'Este es el titulo de un banner', 1, 2, '000000', 15, 7, 1088591501),
(13, 'Contaduria PÃºblica', 1, 1, 'ff8080', 16, 4, 1088591501),
(14, 'ingenieria de sistemas a su servicio', 1, 1, '0099F', 11, 3, 1088591501),
(15, 'hola', 1, 1, '000000', 30, 1, 1088591501);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas`
--

CREATE TABLE IF NOT EXISTS `etiquetas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` int(11) NOT NULL,
  `idPer` bigint(12) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idPer` (`idPer`),
  KEY `imagen` (`imagen`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `etiquetas`
--

INSERT INTO `etiquetas` (`id`, `titulo`, `imagen`, `idPer`) VALUES
(1, 'Julian  Rodriguez V', 1, 1088591501),
(2, 'actividadesss', 1, 1088591501);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eti_imagen`
--

CREATE TABLE IF NOT EXISTS `eti_imagen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagen` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `idPer` bigint(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `eti_imagen`
--

INSERT INTO `eti_imagen` (`id`, `imagen`, `idPer`) VALUES
(1, 'eti1.png', 1088591501);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fondo`
--

CREATE TABLE IF NOT EXISTS `fondo` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `fondo` varchar(100) NOT NULL,
  `idPer` bigint(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `fondo`
--

INSERT INTO `fondo` (`id`, `fondo`, `idPer`) VALUES
(1, 'danzant.png', 1088591501),
(2, 'convivencias.png', 1088591501),
(3, 'estudioradio.png', 1088591501);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fuentes`
--

CREATE TABLE IF NOT EXISTS `fuentes` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `fuente` text NOT NULL,
  `categoria` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `fuentes`
--

INSERT INTO `fuentes` (`id`, `fuente`, `categoria`) VALUES
(1, 'Lobster', 'cursive'),
(2, 'Indie+Flower', 'cursive'),
(3, 'Shadows+Into+Light', 'cursive'),
(4, 'Pacifico', 'cursive'),
(5, 'Dancing+Script', 'cursive'),
(6, 'Sancreek', 'cursive'),
(7, 'Roboto+Slab', 'serif');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE IF NOT EXISTS `imagen` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `imagen` varchar(100) NOT NULL,
  `idPer` bigint(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id`, `imagen`, `idPer`) VALUES
(1, '4.png', 1088591501),
(2, '6.png', 1088591501);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idPer` bigint(12) NOT NULL,
  `nomPer` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nom2Per` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apePer` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ape2Per` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `celPer` bigint(15) NOT NULL,
  `corPer` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `conPer` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `facPer` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `tipPer` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idPer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idPer`, `nomPer`, `nom2Per`, `apePer`, `ape2Per`, `celPer`, `corPer`, `conPer`, `facPer`, `tipPer`) VALUES
(98334523, 'Felipe', 'andres', 'Criollo', '', 0, 'crifean@gmail.com', 'dbef5b08916412542cc98be20db9e2dd1f82a3e0', 'Derecho', 'Administrador'),
(98397453, 'John ', 'Jairo', 'Dominguez', 'de la Rosa ', 0, 'j_j_domi@hotmail.com', 'a54b9dcc8dbda19453aeea08826d1b73ecdcc5c7', '', 'Administrador '),
(108859159, 'Jonatan', 'Martinez', 'Garces', '', 0, 'jmg2189@misena.edu.co', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Unidad Virtual', 'Administrador'),
(1088591501, 'Julian', 'enri', 'Rodriguez_Admin', 'Vale', 31118592191, 'jrodriguezv@umariana.edu.co', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Ing Sistemas', 'Administrador'),
(1088591515, 'Julian', 'Enrique', 'Rodriguez_SUA', 'Valenzuela', 3118592191, 'julianrodri11@umariana.edu.co', '4bc292d9d95f60130b08d597e08cf2e2797d7911', 'Ing Sistemas', 'SuperUserAdmin'),
(1088591517, 'Magda', 'yis', 'Solarte', '', 0, 'lilianamage7@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Unidad Virtual', 'Administrador'),
(1088591518, 'Monica', '', 'Ceron', '', 0, 'monpati@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Unidad Virtual', 'Docente');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `banners`
--
ALTER TABLE `banners`
  ADD CONSTRAINT `banners_ibfk_1` FOREIGN KEY (`imagen`) REFERENCES `imagen` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `banners_ibfk_2` FOREIGN KEY (`fondo`) REFERENCES `fondo` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `banners_ibfk_3` FOREIGN KEY (`idPer`) REFERENCES `usuarios` (`idPer`) ON UPDATE CASCADE,
  ADD CONSTRAINT `banners_ibfk_4` FOREIGN KEY (`fuente`) REFERENCES `fuentes` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  ADD CONSTRAINT `etiquetas_ibfk_1` FOREIGN KEY (`idPer`) REFERENCES `usuarios` (`idPer`) ON UPDATE CASCADE,
  ADD CONSTRAINT `etiquetas_ibfk_2` FOREIGN KEY (`imagen`) REFERENCES `eti_imagen` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
