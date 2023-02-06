-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 06-02-2023 a las 19:47:09
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `huniversidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `usuario` varchar(50) NOT NULL,
  `passwd` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`usuario`, `passwd`, `nombre`) VALUES
('admin', 'admin', 'Hugo Enrique');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

DROP TABLE IF EXISTS `alumno`;
CREATE TABLE IF NOT EXISTS `alumno` (
  `idAlumno` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(15) NOT NULL,
  `passwd` varchar(15) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `grupo` varchar(5) NOT NULL,
  `materia` varchar(35) NOT NULL,
  `carnet` varchar(50) NOT NULL,
  `nacimiento` varchar(15) NOT NULL,
  `carrera` varchar(40) NOT NULL,
  `Matematicas` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Quimica` varchar(20) NOT NULL,
  `Sociales` varchar(20) NOT NULL,
  `Biologia` varchar(20) NOT NULL,
  PRIMARY KEY (`idAlumno`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`idAlumno`, `usuario`, `passwd`, `nombre`, `apellido`, `grupo`, `materia`, `carnet`, `nacimiento`, `carrera`, `Matematicas`, `Quimica`, `Sociales`, `Biologia`) VALUES
(1, 'hunAlexander', 'hunAlexander', 'Alexander', 'Ramirez Torres', 'C', 'Quimica', 'MAI1', '15/10/84', 'Informatica', '80', '99', '100', '100'),
(2, 'hunSergio', 'hunSergio', 'Segio', 'Savinas', 'B', 'Quimica', 'ASD2', '10/09/2001', 'Sociales', '12', '44', '44', '50'),
(3, 'hunGerardo', 'hunGerardo', 'Gerardo', 'Arias', 'A', 'Biologia', 'MNE10', '03/15/2001', 'Derecho', '10', '20', '30', '44'),
(6, 'hunJuan', 'hunJuan', 'Juan', 'Perez Leon', 'B', 'Sociales', 'JPS9', '2003', 'Derecho', '', '', '100', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestro`
--

DROP TABLE IF EXISTS `maestro`;
CREATE TABLE IF NOT EXISTS `maestro` (
  `idMaestro` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `passwd` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `materia` varchar(50) NOT NULL,
  `grupo` varchar(20) NOT NULL,
  PRIMARY KEY (`idMaestro`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `maestro`
--

INSERT INTO `maestro` (`idMaestro`, `usuario`, `passwd`, `nombre`, `apellido`, `materia`, `grupo`) VALUES
(1, 'hunAntonio', 'hunAntonio', 'Antonio', 'Ramirez Torres', 'Quimica', 'B'),
(2, 'hunJose Miguel', 'hunJose Miguel', 'Jose Miguel', 'Lopez Zepeda', 'matematias', 'A'),
(3, 'hunEnrique', 'hunEnrique', 'Enrique', 'Vazquez', 'Biologia', 'C'),
(4, 'hunVictor', 'hunVictor', 'Victor', 'Aviles', 'Sociales', 'D'),
(11, 'hunOlga', 'hunOlga', 'Olga', 'Flores', 'Biologia', 'A'),
(12, 'hunMarion', 'hunMarion', 'Marion', 'Ranirez Torres', 'Biologia', 'B');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

DROP TABLE IF EXISTS `notas`;
CREATE TABLE IF NOT EXISTS `notas` (
  `idAlumno` int NOT NULL,
  `matematias` int NOT NULL,
  `quimica` int NOT NULL,
  `sociales` int NOT NULL,
  `biologia` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
