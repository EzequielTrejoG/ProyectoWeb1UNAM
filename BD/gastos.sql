-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-05-2025 a las 22:13:56
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gastos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `Activo` tinyint(4) NOT NULL DEFAULT 1,
  `fechaCreacion` datetime DEFAULT current_timestamp(),
  `fechaActualizacion` datetime DEFAULT current_timestamp(),
  `idEmpleado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `Descripcion`, `Activo`, `fechaCreacion`, `fechaActualizacion`, `idEmpleado`) VALUES
(1, 'Directivos', 0, '2025-05-14 19:52:00', '2025-05-14 19:52:00', 1),
(2, 'Técnicos', 0, '2025-05-14 19:52:14', '2025-05-14 19:52:14', 1),
(3, 'Administrativos', 1, '2025-05-14 19:52:30', '2025-05-14 19:52:30', 1),
(4, 'Operarios', 1, '2025-05-14 19:52:43', '2025-05-14 19:52:43', 1),
(5, 'Auxiliares', 1, '2025-05-14 19:52:49', '2025-05-14 19:52:49', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `idDepartamento` int(11) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `Activo` tinyint(4) NOT NULL DEFAULT 1,
  `fechaCreacion` datetime DEFAULT current_timestamp(),
  `fechaActualizacion` datetime DEFAULT current_timestamp(),
  `idEmpleado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`idDepartamento`, `Descripcion`, `Activo`, `fechaCreacion`, `fechaActualizacion`, `idEmpleado`) VALUES
(1, 'Recursos Humanos', 1, '2025-05-05 16:08:24', '2025-05-05 16:08:24', 1),
(2, 'Sistemas', 0, '2025-05-05 16:08:31', '2025-05-05 16:08:31', 1),
(3, 'Ventas 2', 1, '2025-05-05 16:08:41', '2025-05-08 05:42:16', 1),
(4, 'Marketing', 1, '2025-05-05 16:08:52', '2025-05-05 16:08:52', 1),
(5, 'Contabilidad', 1, '2025-05-05 16:09:00', '2025-05-08 05:39:00', 1),
(24, 'Planeación', 1, '2025-05-07 18:38:07', '2025-05-07 18:38:07', 1),
(25, 'Calidad', 0, '2025-05-07 19:57:11', '2025-05-07 21:45:07', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`idDepartamento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `idDepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
