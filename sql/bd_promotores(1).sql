-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 18, 2018 at 03:07 AM
-- Server version: 5.5.55-0+deb8u1
-- PHP Version: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bd_promotores`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas_objetivas`
--

CREATE TABLE IF NOT EXISTS `areas_objetivas` (
`id` int(11) NOT NULL,
  `id_periodo` int(11) NOT NULL,
  `id_colegio` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `id_grado` int(11) NOT NULL,
  `libro` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `areas_objetivas`
--

INSERT INTO `areas_objetivas` (`id`, `id_periodo`, `id_colegio`, `id_materia`, `id_grado`, `libro`) VALUES
(1, 1, 1, 1, 1, 'tales'),
(2, 1, 2, 3, 1, 'otro'),
(3, 1, 16, 8, 12, '2121');

-- --------------------------------------------------------

--
-- Table structure for table `cargos`
--

CREATE TABLE IF NOT EXISTS `cargos` (
`id` int(11) NOT NULL,
  `cargo` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `cargos`
--

INSERT INTO `cargos` (`id`, `cargo`) VALUES
(1, 'Propietario'),
(2, 'Rector'),
(3, 'Coordinador académico'),
(4, 'Coordinador de convivencia'),
(5, 'Jefe de área'),
(6, 'Profesor');

-- --------------------------------------------------------

--
-- Table structure for table `colegios`
--

CREATE TABLE IF NOT EXISTS `colegios` (
`id` int(11) NOT NULL,
  `codigo` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `colegio` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `barrio` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `web` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cumpleaños` date NOT NULL,
  `cod_zona` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `colegios`
--

INSERT INTO `colegios` (`id`, `codigo`, `colegio`, `direccion`, `barrio`, `telefono`, `web`, `cumpleaños`, `cod_zona`, `id_usuario`, `fecha_creacion`) VALUES
(22, '1-85208554', 'dsadsa', 'dasdas', 'dasdsa', '3232', '', '0000-00-00', '12345678', 2, '2018-05-18 07:04:32');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `color`, `start`, `end`) VALUES
(1, 'Evento Azul', '#0071c5', '2017-08-01 00:00:00', '2017-08-02 00:00:00'),
(2, 'Eventos 2', '#40E0D0', '2018-04-17 04:30:00', '2018-04-17 05:00:00'),
(3, 'Doble click para editar evento', '#008000', '2018-04-18 08:00:00', '2018-04-18 09:00:00'),
(4, 'pruebaR', '#0071c5', '2018-04-18 06:00:00', '2018-04-18 06:30:00'),
(6, 'prueba10', '', '2018-04-03 00:00:00', '2018-04-04 00:00:00'),
(8, '', '', '2018-03-28 18:00:00', '2018-03-29 20:00:00'),
(9, 'colegio san luis', '', '2018-04-15 01:15:00', '2018-04-15 01:15:00'),
(10, 'colegio madre emilia', '#40E0D0', '2018-03-31 16:20:00', '2018-04-01 00:00:00'),
(13, 'Hola', '', '2018-05-10 00:00:00', '2018-05-11 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `grados`
--

CREATE TABLE IF NOT EXISTS `grados` (
`id` int(11) NOT NULL,
  `grado` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `grados`
--

INSERT INTO `grados` (`id`, `grado`) VALUES
(1, 'Pre jardín'),
(2, 'Jardín'),
(3, 'Transicional'),
(4, 'Primero (1)'),
(5, 'Segundo (2)'),
(6, 'Tercero (3)'),
(7, 'Cuarto(4)'),
(8, 'Quinto (5)'),
(9, 'Sexto (6)'),
(10, 'Séptimo (7)'),
(11, 'Octavo (8)'),
(12, 'Noveno (9)'),
(13, 'Décimo (10)'),
(14, 'Once (11)'),
(15, 'Primaria'),
(16, 'Secundaria');

-- --------------------------------------------------------

--
-- Table structure for table `grados_materias`
--

CREATE TABLE IF NOT EXISTS `grados_materias` (
`id` int(11) NOT NULL,
  `id_periodo` int(11) NOT NULL,
  `id_grado` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `cod_profesor` int(10) NOT NULL,
  `libro` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `editorial` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `grados_materias`
--

INSERT INTO `grados_materias` (`id`, `id_periodo`, `id_grado`, `id_materia`, `cod_profesor`, `libro`, `editorial`) VALUES
(3, 0, 4, 2, 2674779, '', ''),
(4, 0, 3, 3, 8287216, '', ''),
(5, 0, 6, 2, 5304494, '', ''),
(6, 0, 7, 3, 6326325, '', ''),
(7, 0, 2, 2, 15246469, '', ''),
(8, 0, 2, 3, 47399688, '', ''),
(9, 0, 5, 4, 7131142, '', ''),
(10, 0, 2, 2, 1216313, '', ''),
(11, 0, 3, 1, 1607414, '', ''),
(12, 0, 3, 3, 2674779, '', ''),
(13, 0, 3, 4, 2674779, '', ''),
(14, 0, 5, 4, 1607414, '', ''),
(15, 0, 3, 2, 3106356, '', ''),
(16, 0, 3, 2, 33113454, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `grados_paralelos`
--

CREATE TABLE IF NOT EXISTS `grados_paralelos` (
`id` int(11) NOT NULL,
  `id_periodo` int(11) NOT NULL,
  `id_colegio` int(11) NOT NULL,
  `id_grado` int(11) NOT NULL,
  `paralelos` int(11) NOT NULL,
  `alumnos` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `grados_paralelos`
--

INSERT INTO `grados_paralelos` (`id`, `id_periodo`, `id_colegio`, `id_grado`, `paralelos`, `alumnos`) VALUES
(15, 1, 2, 1, 1, 1),
(16, 1, 2, 2, 2, 2),
(17, 1, 2, 3, 3, 3),
(18, 1, 2, 4, 4, 4),
(19, 1, 2, 5, 5, 5),
(20, 1, 2, 6, 6, 6),
(21, 1, 2, 7, 7, 7),
(22, 1, 2, 8, 8, 8),
(23, 1, 2, 9, 9, 9),
(24, 1, 2, 10, 10, 10),
(25, 1, 2, 11, 11, 11),
(26, 1, 2, 12, 12, 12),
(27, 1, 2, 13, 13, 13),
(28, 1, 2, 14, 14, 14),
(29, 1, 21, 1, 1, 1),
(30, 1, 21, 2, 2, 2),
(31, 1, 21, 3, 3, 3),
(32, 1, 21, 4, 4, 4),
(33, 1, 21, 5, 5, 5),
(34, 1, 21, 6, 6, 6),
(35, 1, 21, 7, 7, 7),
(36, 1, 21, 8, 8, 8),
(37, 1, 21, 9, 9, 9),
(38, 1, 21, 10, 0, 0),
(39, 1, 21, 11, 1, 1),
(40, 1, 21, 12, 2, 2),
(41, 1, 21, 13, 3, 0),
(42, 1, 21, 14, 4, 4),
(43, 1, 16, 1, 1, 1),
(44, 1, 16, 2, 2, 23),
(45, 1, 16, 3, 3, 4),
(46, 1, 16, 4, 4, 43),
(47, 1, 16, 5, 5, 43),
(48, 1, 16, 6, 6, 43),
(49, 1, 16, 7, 7, 43),
(50, 1, 16, 8, 8, 43),
(51, 1, 16, 9, 9, 43),
(52, 1, 16, 10, 0, 43),
(53, 1, 16, 11, 1, 34),
(54, 1, 16, 12, 0, 0),
(55, 1, 16, 13, 3, 34),
(56, 1, 16, 14, 4, 34);

-- --------------------------------------------------------

--
-- Table structure for table `materias`
--

CREATE TABLE IF NOT EXISTS `materias` (
`id` int(11) NOT NULL,
  `materia` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `materias`
--

INSERT INTO `materias` (`id`, `materia`) VALUES
(1, 'Preescolar'),
(2, 'Matemáticas'),
(3, 'Lenguaje'),
(4, 'Comprensión lectora'),
(5, 'Ciencias naturales'),
(6, 'Ciencias sociales'),
(7, 'IngleS'),
(8, 'Artística'),
(9, 'Plan lector'),
(10, 'Informática'),
(11, 'Dibujo');

-- --------------------------------------------------------

--
-- Table structure for table `mercado_editorial`
--

CREATE TABLE IF NOT EXISTS `mercado_editorial` (
`id` int(11) NOT NULL,
  `id_periodo` int(11) NOT NULL,
  `id_colegio` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `id_grado` int(11) NOT NULL,
  `editorial` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `libro` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `mercado_editorial`
--

INSERT INTO `mercado_editorial` (`id`, `id_periodo`, `id_colegio`, `id_materia`, `id_grado`, `editorial`, `libro`) VALUES
(1, 1, 1, 1, 1, 'sm tal', 'dasda'),
(2, 1, 2, 1, 4, 'sm tal', 'prueba conecta'),
(5, 1, 2, 4, 9, 'sm tal2', 'conecta3'),
(6, 1, 2, 0, 0, '', ''),
(7, 1, 16, 7, 6, 'rara', 'dada');

-- --------------------------------------------------------

--
-- Table structure for table `objetivos`
--

CREATE TABLE IF NOT EXISTS `objetivos` (
`id` int(11) NOT NULL,
  `objetivo` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `objetivos`
--

INSERT INTO `objetivos` (`id`, `objetivo`) VALUES
(1, 'Contacto'),
(2, 'Muestreo'),
(3, 'Presentación'),
(4, 'Seguimiento'),
(5, 'Definición anticipada'),
(6, 'Definición final'),
(7, 'Otro');

-- --------------------------------------------------------

--
-- Table structure for table `paralelos`
--

CREATE TABLE IF NOT EXISTS `paralelos` (
`id` int(11) NOT NULL,
  `paralelos` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `periodos`
--

CREATE TABLE IF NOT EXISTS `periodos` (
`id` int(11) NOT NULL,
  `periodo` varchar(6) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `periodos`
--

INSERT INTO `periodos` (`id`, `periodo`) VALUES
(1, '2018');

-- --------------------------------------------------------

--
-- Table structure for table `plan_trabajo`
--

CREATE TABLE IF NOT EXISTS `plan_trabajo` (
`id` int(11) NOT NULL,
  `id_periodo` int(11) NOT NULL,
  `id_promotor` int(11) NOT NULL,
  `id_colegio` int(11) NOT NULL,
  `cod_profesor` varchar(110) COLLATE utf8_spanish_ci NOT NULL,
  `id_objetivo` int(11) NOT NULL,
  `resultado` int(11) NOT NULL,
  `color` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `plan_trabajo`
--

INSERT INTO `plan_trabajo` (`id`, `id_periodo`, `id_promotor`, `id_colegio`, `cod_profesor`, `id_objetivo`, `resultado`, `color`, `start`, `end`) VALUES
(1, 1, 1, 1, 'marcos', 1, 0, '#0071c5', '2018-04-17 00:00:00', '2018-04-18 00:00:00'),
(2, 1, 1, 2, 'liliana', 2, 0, '#0071c5', '2018-04-17 07:30:00', '2018-04-17 08:00:00'),
(3, 1, 1, 1, '', 0, 0, '#0071c5', '2018-04-18 08:00:00', '2018-04-18 08:30:00'),
(4, 1, 1, 2, 'tal', 5, 0, '#0071c5', '2018-04-18 06:00:00', '2018-04-18 06:30:00'),
(5, 1, 1, 1, 'alejandro', 6, 0, '#0071c5', '2018-04-20 06:00:00', '2018-04-20 06:30:00'),
(6, 1, 1, 1, 'Guillermo', 2, 0, '#0071c5', '2018-04-15 07:00:00', '2018-04-15 07:30:00'),
(7, 1, 1, 0, '', 0, 0, '#0071c5', '2018-04-15 14:30:00', '2018-04-15 14:30:00'),
(8, 1, 1, 2, 'Guillermo ', 1, 0, '#0071c5', '2018-04-16 09:00:00', '2018-04-16 09:30:00'),
(10, 1, 1, 1, '', 0, 0, '#0071c5', '2018-04-16 01:45:00', '2018-04-16 02:00:00'),
(11, 1, 1, 2, 'liliana', 1, 0, '#0071c5', '2018-04-18 01:30:00', '2018-04-18 02:00:00'),
(12, 1, 1, 2, 'Guillermo amaya ', 4, 0, '#0071c5', '2018-04-26 16:30:00', '2018-04-26 17:00:00'),
(23, 1, 1, 1, '1216313', 1, 0, '#0071c5', '2018-05-02 02:00:00', '2018-05-02 03:00:00'),
(24, 1, 1, 2, '1607414', 1, 1, '#008000', '2018-05-01 03:00:00', '2018-05-01 04:00:00'),
(25, 1, 1, 1, '', 2, 0, '#0071c5', '2018-05-09 05:00:00', '2018-05-09 06:00:00'),
(27, 1, 1, 1, '2674779', 1, 0, '#0071c5', '2018-05-09 04:00:00', '2018-05-09 05:00:00'),
(28, 1, 1, 1, '1607414', 1, 0, '#0071c5', '2018-05-10 02:00:00', '2018-05-10 03:00:00'),
(29, 1, 1, 1, '3106356', 1, 0, '#0071c5', '2018-05-11 00:00:00', '2018-05-11 01:00:00'),
(30, 1, 1, 2, '6326325', 1, 0, '#0071c5', '2018-05-11 04:00:00', '2018-05-11 05:00:00'),
(31, 1, 1, 2, '33113454', 1, 1, '#008000', '2018-05-12 02:00:00', '2018-05-12 03:00:00'),
(32, 1, 1, 2, '6326325', 0, 0, '#0071c5', '2018-05-14 00:00:00', '2018-05-14 01:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `trabajadores_colegios`
--

CREATE TABLE IF NOT EXISTS `trabajadores_colegios` (
`id` int(11) NOT NULL,
  `codigo` int(10) NOT NULL,
  `id_colegio` int(11) NOT NULL,
  `cargo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `area` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cumpleaños` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `trabajadores_colegios`
--

INSERT INTO `trabajadores_colegios` (`id`, `codigo`, `id_colegio`, `cargo`, `nombre`, `area`, `telefono`, `email`, `cumpleaños`) VALUES
(1, 0, 0, '1', 't1', '', '1', '1@1.com', '2018-04-26'),
(2, 0, 0, '2', 't2', '', '2', '2@2.com', '2018-04-27'),
(3, 0, 0, '3', 't3', '', '2', '3@3.com', '2018-04-28'),
(4, 0, 0, '5', 't5', '3', '2', '4@4.com', '2018-04-29'),
(5, 0, 0, '5', 't5', '2', '2', '5@5.com', '2018-04-30'),
(6, 0, 0, '5', 't6', '6', '2', '6@6.com', '2018-04-25'),
(7, 0, 0, '5', 't7', '7', '2', '7@7.com', '2018-04-24'),
(8, 0, 12, '1', 'ttt', '', '7', '7@7.com', '2018-04-24'),
(9, 0, 12, '2', 't6', '', '6', '6@6.com', '2018-04-25'),
(10, 0, 12, '3', 't5', '', '5', '5@5.com', '2018-04-30'),
(11, 0, 12, '5', 't41', '3', '41', '41@41.com', '2018-05-01'),
(12, 0, 12, '5', 't3', '2', '3', '3@3.com', '2018-04-29'),
(13, 0, 12, '5', 't2', '6', '2', '2@2.com', '2018-04-28'),
(14, 0, 12, '5', 't1', '7', '1', '1@1.com', '2018-05-05'),
(21, 2674779, 1, '6', 'jose rangel', '', '', '', '0000-00-00'),
(22, 8287216, 2, '6', 'dsadas', '', '', '', '0000-00-00'),
(23, 5304494, 1, '6', 'tales', '', '', '', '0000-00-00'),
(24, 6326325, 2, '6', 'alejandro', '', '', '', '0000-00-00'),
(25, 15246469, 0, '6', 'tales', '', '', '', '0000-00-00'),
(26, 47399688, 1, '6', 'dsadas', '', '', '', '0000-00-00'),
(27, 7131142, 12, '6', 'alejandro', '', '', '', '0000-00-00'),
(28, 1216313, 1, '6', 'alejandro', '', '', '', '0000-00-00'),
(29, 1607414, 2, '6', 'jose rangel', '', '', '', '0000-00-00'),
(30, 308900, 1, '6', 'no existe', '', '', '', '0000-00-00'),
(31, 3106356, 1, '6', 'no existe2', '', '', '', '0000-00-00'),
(32, 33113454, 2, '6', 'liliana', '', '', '', '0000-00-00'),
(33, 0, 21, '1', 't1', '', '1', 'gerencia@ink-store.com.co', '0000-00-00'),
(34, 0, 21, '2', 't2', '', '2', '2@2.com', '0000-00-00'),
(35, 0, 21, '3', 't3', '', '2', '3@3.com', '0000-00-00'),
(36, 0, 21, '5', 't5', '3', '2', '41@41.com', '0000-00-00'),
(37, 0, 21, '5', 't5', '2', '2', '5@5.com', '0000-00-00'),
(38, 0, 21, '5', 't6', '6', '2', '6@6.com', '0000-00-00'),
(39, 0, 21, '5', 't7', '7', '1', '7@7.com', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `cedula` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `id_zona` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `tipo`, `cedula`, `nombres`, `apellidos`, `telefono`, `direccion`, `correo`, `clave`, `id_zona`) VALUES
(1, 2, '12345678', 'alejandro', 'rangel', '3115274827', '', 'ale.ran92@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(2, 3, '', 'Ruben Dario\r\n', 'Cruz Perez', '', '', 'rcruz@eurekalibros.com.co', '000a769aa0d6c93ce5945066c1f7bef9', 1),
(3, 3, '', 'Andres Mauricio', 'Serna Moreno', '', '', 'aserna@eurekalibros.com.co', '629c348fbe0e98b143bb66c0656cee10', 2),
(4, 3, '', 'Gloria Patricia', 'Camacho Garzon', '', '', 'pcamacho@eurekalibros.com.co', 'd8353f308b2b1efd856e28e33018dd3a', 3),
(5, 3, '', 'Cecilia', 'Velazco Perez', '', '', 'cvelazco@eurekalibros.com.co', '1afe15ff5a2d126388ca47b36265f3f5', 5),
(6, 3, '', 'Wilson Eduardo', 'Peñaloza', '', '', 'wpenaloza@eurekalibros.com.co', 'bf5605a8ec2a9eeb24f7560abb6e56be', 6),
(7, 3, '', 'Julio Hernando', 'Benavides Cabrera', '', '', 'jbenavides@eurekalibros.com.co', '8c71478dbe0803e8c0e0847a63de8529', 4),
(8, 3, '', 'Yeimy Katherine', 'Montenegro Hernandez', '', '', 'ymontenegro@eurekalibros.com.co', '0419ee1c69e56a69fe7babd98d19155d', 7),
(9, 3, '', 'Alexander', 'Neira Conde', '', '', 'gerenciapyv@eurekalibros.com.co', '211da92144e736d24b8d87f6f1d49f8a', 8);

-- --------------------------------------------------------

--
-- Table structure for table `visitas`
--

CREATE TABLE IF NOT EXISTS `visitas` (
`id` int(11) NOT NULL,
  `id_periodo` int(11) NOT NULL,
  `id_plan_trabajo` int(11) NOT NULL,
  `observaciones` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `latitud` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `longitud` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `visitas`
--

INSERT INTO `visitas` (`id`, `id_periodo`, `id_plan_trabajo`, `observaciones`, `fecha`, `latitud`, `longitud`) VALUES
(2, 1, 19, '', '2018-05-03 05:00:00', '4.7210412', '-74.1185565'),
(3, 1, 14, 'comentarios', '2018-05-03 05:05:44', '4.7210208', '-74.1185571'),
(4, 1, 24, 'hola', '2018-05-03 05:38:06', '4.7210085', '-74.1183583'),
(5, 1, 31, 'm,m', '2018-05-10 22:40:25', '4.6265566', '-74.0749961');

-- --------------------------------------------------------

--
-- Table structure for table `zonas`
--

CREATE TABLE IF NOT EXISTS `zonas` (
`id` int(11) NOT NULL,
  `codigo` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `zona` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `zonas`
--

INSERT INTO `zonas` (`id`, `codigo`, `zona`) VALUES
(1, '12345678', 'Oriente'),
(2, '87654321', 'Suroriente'),
(3, '3463252', 'Nororiente'),
(4, '03736282', 'Occidente'),
(5, '83028202', 'Noroccidente'),
(6, '02038200', 'Suroccidente'),
(7, '4589030', 'Pueblos'),
(8, '72636282', 'Gerencia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas_objetivas`
--
ALTER TABLE `areas_objetivas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cargos`
--
ALTER TABLE `cargos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colegios`
--
ALTER TABLE `colegios`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grados`
--
ALTER TABLE `grados`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grados_materias`
--
ALTER TABLE `grados_materias`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grados_paralelos`
--
ALTER TABLE `grados_paralelos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materias`
--
ALTER TABLE `materias`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mercado_editorial`
--
ALTER TABLE `mercado_editorial`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `objetivos`
--
ALTER TABLE `objetivos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paralelos`
--
ALTER TABLE `paralelos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periodos`
--
ALTER TABLE `periodos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan_trabajo`
--
ALTER TABLE `plan_trabajo`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trabajadores_colegios`
--
ALTER TABLE `trabajadores_colegios`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitas`
--
ALTER TABLE `visitas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zonas`
--
ALTER TABLE `zonas`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areas_objetivas`
--
ALTER TABLE `areas_objetivas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cargos`
--
ALTER TABLE `cargos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `colegios`
--
ALTER TABLE `colegios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `grados`
--
ALTER TABLE `grados`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `grados_materias`
--
ALTER TABLE `grados_materias`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `grados_paralelos`
--
ALTER TABLE `grados_paralelos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `materias`
--
ALTER TABLE `materias`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `mercado_editorial`
--
ALTER TABLE `mercado_editorial`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `objetivos`
--
ALTER TABLE `objetivos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `paralelos`
--
ALTER TABLE `paralelos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `periodos`
--
ALTER TABLE `periodos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `plan_trabajo`
--
ALTER TABLE `plan_trabajo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `trabajadores_colegios`
--
ALTER TABLE `trabajadores_colegios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `visitas`
--
ALTER TABLE `visitas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `zonas`
--
ALTER TABLE `zonas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
