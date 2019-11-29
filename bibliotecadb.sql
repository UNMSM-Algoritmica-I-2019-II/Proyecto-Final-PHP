-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2019 a las 22:59:25
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bibliotecadb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `ID_ISBN` varchar(5) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Titulo` varchar(75) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Autor` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `EnPrestamo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`ID_ISBN`, `Titulo`, `Autor`, `EnPrestamo`) VALUES
('01111', 'Programación en C', 'Ignacio Zahonero - Joyanes Luis', 0),
('01122', 'Libro prueba', 'Alan', 0),
('02222', 'Fundamentos de programación', 'Luis Joyanes Aguilar', 0),
('03333', 'Fundamentos de Álgebra Lineal', 'Ron Larson  ', 0),
('04444', 'Tópicos de Cálculo', 'Máximo Mitacc - Luis Toro', 0),
('05555', 'Economía', 'Michael Parking Pearson', 0),
('06666', 'Python para todos', 'Raúl González Duque', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `ID_ISBN` varchar(5) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ID_Username` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL,
  `FechaSalida` date NOT NULL,
  `FechaRetorno` date NOT NULL,
  `Retornado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `prestamo`
--

INSERT INTO `prestamo` (`ID_ISBN`, `ID_Username`, `FechaSalida`, `FechaRetorno`, `Retornado`) VALUES
('01122', 'josue123', '2019-11-28', '2019-12-03', 1),
('04444', 'josue123', '2019-11-28', '2019-12-03', 1),
('05555', 'josue123', '2019-11-28', '2019-12-03', 1),
('06666', 'yopi123', '2019-11-28', '2019-12-03', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_Username` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_Username`, `Password`) VALUES
('alex123', 'alex'),
('elian123', 'elian'),
('josue123', 'josue'),
('lucas123', 'lucas'),
('yopi123', 'yopi');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`ID_ISBN`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`ID_ISBN`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
