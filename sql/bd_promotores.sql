-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 27, 2018 at 12:58 AM
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
  `codigo` int(11) NOT NULL,
  `colegio` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `barrio` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `representante` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `web` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cumpleaños` date NOT NULL,
  `id_zona` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `colegios`
--

INSERT INTO `colegios` (`id`, `codigo`, `colegio`, `direccion`, `barrio`, `representante`, `telefono`, `web`, `cumpleaños`, `id_zona`) VALUES
(1, 2121, 'Madre Emilia', 'Cra XX Nro XX-XX', 'La soledad', 'alejandro', '3115274827', 'solucionesartech.com', '2018-06-05', 1),
(2, 323, 'San luis', 'dasdas', 'dasdsa', 'dadas', '323232', 'dsadasdsa', '2018-04-04', 1),
(12, 3232, 'colegio prueba1', 'cra 112 bis 81-51', 'ciudadela', 'alejandro', '3115274827', 'solucionesartech.com', '2008-02-14', 0),
(13, 22222, 'validacion1', '2222ds', 'tal', 'dadsadas', '323232', 'dasdas.com', '2018-04-26', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

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
(13, 'Hola', '', '2018-05-03 00:00:00', '2018-05-04 00:00:00'),
(14, 'hola', '', '2018-04-17 00:00:00', '2018-04-17 00:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `grados`
--

CREATE TABLE IF NOT EXISTS `grados` (
`id` int(11) NOT NULL,
  `grado` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
(14, 'Décimo primero (11)');

-- --------------------------------------------------------

--
-- Table structure for table `grados_materias`
--

CREATE TABLE IF NOT EXISTS `grados_materias` (
`id` int(11) NOT NULL,
  `id_periodo` int(11) NOT NULL,
  `id_grado` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `libro` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `editorial` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grados_paralelos`
--

CREATE TABLE IF NOT EXISTS `grados_paralelos` (
`id` int(11) NOT NULL,
  `id_periodo` int(11) NOT NULL,
  `id_grado` int(11) NOT NULL,
  `paralelos` int(11) NOT NULL,
  `alumnos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
  `paralelo` varchar(10) COLLATE utf8_spanish_ci NOT NULL
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
  `id_profesor` varchar(110) COLLATE utf8_spanish_ci NOT NULL,
  `id_objetivo` int(11) NOT NULL,
  `resultado` int(11) NOT NULL,
  `color` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `plan_trabajo`
--

INSERT INTO `plan_trabajo` (`id`, `id_periodo`, `id_promotor`, `id_colegio`, `id_profesor`, `id_objetivo`, `resultado`, `color`, `start`, `end`) VALUES
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
(12, 1, 1, 2, 'Guillermo amaya ', 4, 0, '#0071c5', '2018-04-26 16:30:00', '2018-04-26 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `trabajadores_colegios`
--

CREATE TABLE IF NOT EXISTS `trabajadores_colegios` (
`id` int(11) NOT NULL,
  `id_colegio` int(11) NOT NULL,
  `cargo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `area` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cumpleaños` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `trabajadores_colegios`
--

INSERT INTO `trabajadores_colegios` (`id`, `id_colegio`, `cargo`, `nombre`, `area`, `telefono`, `email`, `cumpleaños`) VALUES
(1, 0, '1', 't1', '', '1', '1@1.com', '2018-04-26'),
(2, 0, '2', 't2', '', '2', '2@2.com', '2018-04-27'),
(3, 0, '3', 't3', '', '2', '3@3.com', '2018-04-28'),
(4, 0, '5', 't5', '3', '2', '4@4.com', '2018-04-29'),
(5, 0, '5', 't5', '2', '2', '5@5.com', '2018-04-30'),
(6, 0, '5', 't6', '6', '2', '6@6.com', '2018-04-25'),
(7, 0, '5', 't7', '7', '2', '7@7.com', '2018-04-24'),
(8, 12, '1', 'ttt', '', '7', '7@7.com', '2018-04-24'),
(9, 12, '2', 't6', '', '6', '6@6.com', '2018-04-25'),
(10, 12, '3', 't5', '', '5', '5@5.com', '2018-04-30'),
(11, 12, '5', 't41', '3', '41', '41@41.com', '2018-05-01'),
(12, 12, '5', 't3', '2', '3', '3@3.com', '2018-04-29'),
(13, 12, '5', 't2', '6', '2', '2@2.com', '2018-04-28'),
(14, 12, '5', 't1', '7', '1', '1@1.com', '2018-05-05');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visitas`
--

CREATE TABLE IF NOT EXISTS `visitas` (
`id` int(11) NOT NULL,
  `id_periodo` int(11) NOT NULL,
  `id_plan_trabajo` int(11) NOT NULL,
  `observaciones` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` date NOT NULL,
  `longitud` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `latitud` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zonas`
--

CREATE TABLE IF NOT EXISTS `zonas` (
`id` int(11) NOT NULL,
  `zona` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `zonas`
--

INSERT INTO `zonas` (`id`, `zona`) VALUES
(1, 'Zona 1');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `cargos`
--
ALTER TABLE `cargos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `colegios`
--
ALTER TABLE `colegios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `grados`
--
ALTER TABLE `grados`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `grados_materias`
--
ALTER TABLE `grados_materias`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `grados_paralelos`
--
ALTER TABLE `grados_paralelos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `materias`
--
ALTER TABLE `materias`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `trabajadores_colegios`
--
ALTER TABLE `trabajadores_colegios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `visitas`
--
ALTER TABLE `visitas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `zonas`
--
ALTER TABLE `zonas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
