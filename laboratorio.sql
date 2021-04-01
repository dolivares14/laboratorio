-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-04-2021 a las 12:44:40
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laboratorio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examenes`
--

CREATE TABLE `examenes` (
  `ID_examen` int(11) NOT NULL,
  `ID_paciente` int(11) NOT NULL,
  `ID_doctor` int(11) NOT NULL,
  `ID_lab` int(11) DEFAULT NULL,
  `tipo` varchar(30) NOT NULL,
  `pdf` varchar(40) DEFAULT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `examenes`
--

INSERT INTO `examenes` (`ID_examen`, `ID_paciente`, `ID_doctor`, `ID_lab`, `tipo`, `pdf`, `estado`) VALUES
(7, 4, 1, 3, 'Heces', 'pruebahecescod-7.pdf', 'Procesada'),
(8, 4, 1, 3, 'Bioquimica', 'pruebabioquimicacod-8.pdf', 'Procesada'),
(13, 4, 1, NULL, 'Hematologia', NULL, 'Cancelada'),
(14, 4, 1, NULL, 'Orina', NULL, 'Cancelada'),
(15, 25, 1, 3, 'Heces', 'pruebahecescod-15.pdf', 'Procesada'),
(16, 25, 1, NULL, 'Hematologia', NULL, 'En espera'),
(17, 4, 1, 3, 'Heces', 'pruebahecescod-17.pdf', 'Procesada'),
(18, 25, 1, NULL, 'Hematologia', NULL, 'En espera'),
(19, 25, 1, NULL, 'Orina', NULL, 'En espera'),
(20, 4, 1, 3, 'Bioquimica', 'pruebabioquimicacod-20.pdf', 'Procesada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `direccion` text DEFAULT NULL,
  `telefono` varchar(20) NOT NULL,
  `ci` bigint(20) NOT NULL,
  `correo` varchar(150) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`ID`, `nombre`, `apellido`, `direccion`, `telefono`, `ci`, `correo`, `edad`) VALUES
(4, 'david', 'goliath', 'la limpia', '04258666', 26858554, 'davner@gmail.com', 56),
(25, 'luis', 'felipe', 'wooow', '0245688', 23568789, 'help@please.com', 56);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `user` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telf` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` varchar(130) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `clase` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `user`, `nombre`, `apellido`, `telf`, `correo`, `password`, `clase`) VALUES
(1, 'prueba', 'daniel', 'olivares', '04424666555', 'dolivaresiturbe@gmail.com', '123', 'Doctor'),
(2, 'admin', 'luis', 'felipe', '04246589885', 'dalijkasjkkjaekd@', '321', 'admin'),
(3, 'dan1401', 'davidd', 'lopezzz', '1111111111', 'elainechitrbe@gmail.com', '564', 'Laboratorio'),
(4, 'aaaa', 'aspa', 'ventiladoraasdasdad', '564568989', 'dolio@mucho.com', '123456789', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `examenes`
--
ALTER TABLE `examenes`
  ADD PRIMARY KEY (`ID_examen`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `examenes`
--
ALTER TABLE `examenes`
  MODIFY `ID_examen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
