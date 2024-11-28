-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 28-11-2024 a las 12:02:04
-- Versión del servidor: 8.0.40
-- Versión de PHP: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_voyagesMachado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Cliente`
--

CREATE TABLE `Cliente` (
  `dni` varchar(10) NOT NULL COMMENT 'dni cliente',
  `nombre` varchar(100) NOT NULL COMMENT 'nombre completo',
  `email` varchar(254) NOT NULL COMMENT 'email cliente',
  `telefono` varchar(15) NOT NULL COMMENT 'telefono con la extension del pais',
  `direccion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Cliente`
--

INSERT INTO `Cliente` (`dni`, `nombre`, `email`, `telefono`, `direccion`) VALUES
('11111111A', 'Pablito', 'pablo@gmail.com', '+34-678898989', 'Atenea nº11, Sevilla'),
('12345678B', 'Angel', 'angel@ejemplo.com', '+34-666666666', 'Carmone to lejo illo'),
('44444444A', 'Aaaa', 'aaaa@ejemplo.com', '+34-777777777', 'Carrer Ali Bei, Barcelona'),
('53771360M', 'Luis Martín Gimeno', 'luuis995gmail.com', '+34-677803434', 'C:/ Manzanilla 11'),
('98798798A', 'Pepelu', 'pepe@pepe.com', '+34-677803430', 'C:/ Manzanilla 11'),
('99887766M', 'Manuel', 'manue@ejemplo.com', '+34-678898989', 'Dos hermanas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Cliente_Paquete`
--

CREATE TABLE `Cliente_Paquete` (
  `dni_cliente` varchar(10) NOT NULL,
  `id_paquete` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Relación NM Cliente_Paquete';

--
-- Volcado de datos para la tabla `Cliente_Paquete`
--

INSERT INTO `Cliente_Paquete` (`dni_cliente`, `id_paquete`) VALUES
('53771360M', 3),
('12345678B', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Paquete`
--

CREATE TABLE `Paquete` (
  `id` int NOT NULL COMMENT 'id paquete autoincrementado',
  `nombre` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'nombre del paquete',
  `tipopaquete` varchar(10) NOT NULL COMMENT '{aventura, relax, cultura, romántico, familiar } ',
  `tipoalojamiento` varchar(20) NOT NULL COMMENT '{hotel 5 estrellas, hotel 4 estrellas, hostal, apartamento, camping } ',
  `fechainicio` varchar(100) NOT NULL,
  `fechafin` varchar(100) NOT NULL,
  `transporte` varchar(10) NOT NULL COMMENT '{ aéreo, terrestre, maritimo }',
  `viaje_id` int NOT NULL COMMENT 'fk_paquete_viaje'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='1:N entre viaje y paquete, N:M entre paquete y cliente';

--
-- Volcado de datos para la tabla `Paquete`
--

INSERT INTO `Paquete` (`id`, `nombre`, `tipopaquete`, `tipoalojamiento`, `fechainicio`, `fechafin`, `transporte`, `viaje_id`) VALUES
(3, 'Paquete3', 'Romántico', 'Hotel 5 estrellas', '14/11/2024', '17/11/2024', 'Marítimo', 2),
(4, 'Paquete4', 'Aventura', 'Hostal', '14/11/2024', '24/11/2024', 'Aéreo', 1),
(5, 'Paquete5', 'Aventura', 'Hotel 5 estrellas', '14/11/2024', '19/11/2024', 'Terrestre', 2),
(6, 'Paquete6', 'Relax', 'Apartamento', '14/11/2024', '30/11/2024', 'Terrestre', 1),
(10, 'Pack 111', 'Aventura', 'Hotel 5 estrellas', '2024-11-24', '2024-11-28', '', 1),
(11, 'Pack 2', 'romántico', 'hostal', '2024-11-20', '2024-11-23', 'terrestre', 2),
(12, '112233', 'Aventura', 'Hotel 5 estrellas', '2024-11-28', '2024-11-29', 'terrestre', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Viaje`
--

CREATE TABLE `Viaje` (
  `id` int NOT NULL COMMENT 'id viaje autoincrementable',
  `origen` varchar(100) NOT NULL COMMENT 'origen viaje',
  `destino` varchar(100) NOT NULL COMMENT 'destino viaje',
  `fechainicio` datetime NOT NULL,
  `fechafin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='1N entre viaje y paquete';

--
-- Volcado de datos para la tabla `Viaje`
--

INSERT INTO `Viaje` (`id`, `origen`, `destino`, `fechainicio`, `fechafin`) VALUES
(1, 'Madrid', 'Paris', '2024-11-17 12:55:04', '2024-11-26 11:54:56'),
(2, 'Barcelona', 'Roma', '2024-11-17 12:55:04', '2024-11-26 11:54:56');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Cliente`
--
ALTER TABLE `Cliente`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `Cliente_Paquete`
--
ALTER TABLE `Cliente_Paquete`
  ADD PRIMARY KEY (`dni_cliente`,`id_paquete`),
  ADD KEY `FK_PAQUETE` (`id_paquete`);

--
-- Indices de la tabla `Paquete`
--
ALTER TABLE `Paquete`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Viaje`
--
ALTER TABLE `Viaje`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Paquete`
--
ALTER TABLE `Paquete`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'id paquete autoincrementado', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `Viaje`
--
ALTER TABLE `Viaje`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'id viaje autoincrementable', AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Cliente_Paquete`
--
ALTER TABLE `Cliente_Paquete`
  ADD CONSTRAINT `FK_CLIENTE` FOREIGN KEY (`dni_cliente`) REFERENCES `Cliente` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_PAQUETE` FOREIGN KEY (`id_paquete`) REFERENCES `Paquete` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
