-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-10-2023 a las 17:44:31
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4
DROP DATABASE IF EXISTS pt02_elyass_jerari;
CREATE DATABASE IF NOT EXISTS pt02_elyass_jerari;
USE pt02_elyass_jerari;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pt02_elyass_jerari`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuaris`
--
DROP TABLE IF EXISTS usuaris;
CREATE TABLE `usuaris` (
  `dni` varchar(9) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `adreca` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuaris`
--

INSERT INTO `usuaris` (`dni`, `nom`, `adreca`) VALUES
('00000000A', 'Angel', 'Casa'),
('00000000B', 'Mario', 'Casa'),
('00000000C', 'Juan', 'Casa'),
('00000000D', 'Alex', 'Casa'),
('00000000Z', 'Elias', 'Casa');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuaris`
--
ALTER TABLE `usuaris`
  ADD PRIMARY KEY (`dni`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
