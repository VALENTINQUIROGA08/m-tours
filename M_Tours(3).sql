-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 05-09-2025 a las 19:31:29
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `M_Tours`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_compra`
--

CREATE TABLE `carrito_compra` (
  `id_carrito` int(10) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `precio` varchar(10) NOT NULL,
  `nombre_paquete` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito_compra`
--

INSERT INTO `carrito_compra` (`id_carrito`, `fecha_creacion`, `precio`, `nombre_paquete`) VALUES
(101, '2025-08-01', '550.00', 'Cataratas del Iguazú'),
(102, '2025-08-02', '300.50', 'Glaciar Perito Moreno'),
(103, '2025-08-03', '1200.75', 'Bariloche y la Patagonia'),
(104, '2025-08-04', '150.20', 'Quebrada de Humahuaca'),
(105, '2025-08-05', '850.99', 'Ushuaia, el Fin del Mundo'),
(106, '2025-08-06', '220.10', 'Valle de la Luna'),
(107, '2025-08-07', '2000.00', 'Península Valdés'),
(108, '2025-08-08', '450.60', 'El Calafate y El Chaltén'),
(109, '2025-08-09', '750.30', 'Salinas Grandes'),
(110, '2025-08-10', '900.00', 'Ciudad de Buenos Aires');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id_pago` int(10) NOT NULL,
  `metodo_pago` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `precio` varchar(10) NOT NULL,
  `id_carrito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`id_pago`, `metodo_pago`, `fecha`, `precio`, `id_carrito`) VALUES
(1, 'Tarjeta de crédito', '2025-08-01', '55.75', 101),
(2, 'PayPal', '2025-08-02', '30.50', 102),
(3, 'Transferencia bancaria', '2025-08-03', '120.00', 103),
(4, 'Tarjeta de débito', '2025-08-04', '15.20', 104),
(5, 'Tarjeta de crédito', '2025-08-05', '85.99', 105),
(6, 'PayPal', '2025-08-06', '22.10', 106),
(7, 'Transferencia bancaria', '2025-08-07', '200.00', 107),
(8, 'Tarjeta de débito', '2025-08-08', '45.60', 108),
(9, 'Tarjeta de crédito', '2025-08-09', '75.30', 109),
(10, 'PayPal', '2025-08-10', '90.00', 110);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `id_usuario` int(10) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telefono` varchar(14) NOT NULL,
  `edad` int(3) NOT NULL,
  `id_carrito` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`id_usuario`, `nombre`, `email`, `telefono`, `edad`, `id_carrito`) VALUES
(1, 'elio', 'dvbhuaisdhvu@gmail.com', '1234354566', 234, 1),
(2, 'mati', 'adfvghdasivghds@gmail.com', '1231211233', 4, 2),
(3, 'Ana García', 'ana.garcia@email.com', '555-123-4567', 30, 101),
(4, 'Juan Pérez', 'juan.perez@email.com', '555-987-6543', 25, 102),
(5, 'María López', 'maria.lopez@email.com', '555-111-2222', 42, 103),
(6, 'Carlos Ruiz', 'carlos.ruiz@email.com', '555-333-4444', 35, 104);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito_compra`
--
ALTER TABLE `carrito_compra`
  ADD PRIMARY KEY (`id_carrito`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id_pago`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito_compra`
--
ALTER TABLE `carrito_compra`
  MODIFY `id_carrito` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id_pago` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
