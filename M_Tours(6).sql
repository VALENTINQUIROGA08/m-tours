-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 17-10-2025 a las 19:39:23
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
-- Estructura de tabla para la tabla `paquetes`
--

CREATE TABLE `paquetes` (
  `id_paquete` int(11) NOT NULL,
  `nombre_paquete` varchar(50) NOT NULL,
  `descripcion_breve` varchar(50) NOT NULL,
  `descripcion_detallada` varchar(500) NOT NULL,
  `precio` int(10) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `estado` varchar(10) NOT NULL,
  `limite` int(10) NOT NULL,
  `disponible` varchar(10) NOT NULL,
  `estado_paquete` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paquetes`
--

INSERT INTO `paquetes` (`id_paquete`, `nombre_paquete`, `descripcion_breve`, `descripcion_detallada`, `precio`, `fecha_inicio`, `fecha_fin`, `estado`, `limite`, `disponible`, `estado_paquete`) VALUES
(1, 'Cataratas del Iguazú', 'Viaje a las impresionantes Cataratas del Iguazú', 'Un viaje de 5 días y 4 noches para explorar las majestuosas Cataratas del Iguazú, con paseos en lancha y recorridos por los senderos de los Parques Nacionales de Argentina y Brasil.', 550, '2025-09-01', '2025-09-05', 'Disponible', 20, '15', ''),
(2, 'Glaciar Perito Moreno', 'Explora la belleza del Glaciar Perito Moreno', 'Un paquete de 4 días y 3 noches para conocer el imponente Glaciar Perito Moreno en El Calafate, con minitrekking sobre el hielo y navegación frente al glaciar.', 621, '2025-10-15', '2025-10-18', 'Disponible', 15, '12', ''),
(3, 'Bariloche y la Patagonia', 'Aventura en los lagos de la Patagonia', 'Un tour de 7 días y 6 noches por la región de Bariloche, visitando el Circuito Chico, el Cerro Campanario, y disfrutando de actividades de montaña y deportes de invierno.', 891, '2025-11-01', '2025-11-07', 'Disponible', 25, '20', ''),
(4, 'Quebrada de Humahuaca', 'Colores y cultura en el norte argentino', 'Un viaje de 3 días y 2 noches para descubrir la Quebrada de Humahuaca, conociendo Purmamarca, Tilcara y Humahuaca, y sumergiéndote en la cultura andina.', 350, '2025-12-05', '2025-12-07', 'Disponible', 18, '10', ''),
(5, 'Ushuaia, el Fin del Mundo', 'El encanto de la ciudad más austral', 'Un paquete de 6 días y 5 noches en Ushuaia, incluyendo una navegación por el Canal Beagle, una visita al Parque Nacional Tierra del Fuego y el Tren del Fin del Mundo.', 781, '2026-01-10', '2026-01-15', 'Disponible', 10, '8', ''),
(6, 'Valle de la Luna y Talampaya', 'Maravillas geológicas de San Juan y La Rioja', 'Un recorrido de 4 días y 3 noches por el Parque Provincial Ischigualasto (Valle de la Luna) y el Parque Nacional Talampaya, con impresionantes formaciones rocosas y yacimientos paleontológicos.', 450, '2026-02-20', '2026-02-23', 'Disponible', 14, '11', ''),
(7, 'Península Valdés', 'Encuentro con la fauna marina', 'Un viaje de 5 días y 4 noches a la Península Valdés para avistar ballenas, lobos marinos, elefantes marinos y pingüinos, en su hábitat natural.', 950, '2026-03-15', '2026-03-19', 'Disponible', 22, '19', ''),
(8, 'El Calafate y El Chaltén', 'Trekking en la capital nacional del trekking', 'Un paquete de 6 días y 5 noches que combina la visita al Glaciar Perito Moreno en El Calafate con caminatas en los senderos de El Chaltén, a los pies del Cerro Fitz Roy.', 701, '2026-04-01', '2026-04-06', 'Disponible', 17, '13', ''),
(9, 'Salinas Grandes', 'Un desierto de sal en las alturas', 'Una excursión de 2 días y 1 noche para visitar las Salinas Grandes en Jujuy, un vasto desierto de sal a más de 3000 metros de altura, con paisajes increíbles.', 250, '2026-05-10', '2026-05-11', 'Disponible', 20, '15', ''),
(10, 'City Tour Buenos Aires', 'Explora la capital de Argentina', 'Un tour de 3 días y 2 noches para conocer los principales atractivos de Buenos Aires: La Boca, San Telmo, Recoleta, Puerto Madero y el Teatro Colón.', 420, '2026-06-01', '2026-06-03', 'Disponible', 30, '25', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan`
--

CREATE TABLE `plan` (
  `id_servicio` int(11) NOT NULL,
  `id_paquete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id_servicio` int(10) NOT NULL,
  `tipo` text NOT NULL,
  `nombre_servicio` varchar(100) NOT NULL,
  `precio` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id_servicio`, `tipo`, `nombre_servicio`, `precio`) VALUES
(1, 'Alojamiento', 'Hotel de 4 estrellas con desayuno', 86.00),
(2, 'Transporte', 'Vuelo doméstico ida y vuelta', 150.00),
(3, 'Excursión', 'Tour guiado por la ciudad histórica', 35.00),
(4, 'Alojamiento', 'Hostal económico compartido', 18.00),
(5, 'Transporte', 'Alquiler de coche por día (gama media)', 46.00),
(6, 'Excursión', 'Ruta de senderismo y picnic', 26.00),
(7, 'Alojamiento', 'Apartamento vacacional con cocina', 61.00),
(8, 'Transporte', 'Billete de tren de alta velocidad', 92.00),
(9, 'Excursión', 'Cata de vinos y visita a viñedo', 55.00),
(10, 'Alojamiento', 'Resort de playa todo incluido', 120.00),
(11, 'Transporte', 'Servicio de traslado privado al aeropuerto', 30.00),
(12, 'Excursión', 'Entrada a parque temático', 75.00),
(13, 'Alojamiento', 'Cabaña rústica en la montaña', 50.00),
(14, 'Transporte', 'Crucero por el Mediterráneo (7 días)', 799.00),
(15, 'Excursión', 'Clase de cocina local', 40.00);

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
-- Indices de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  ADD PRIMARY KEY (`id_paquete`);

--
-- Indices de la tabla `plan`
--
ALTER TABLE `plan`
  ADD KEY `fk_paquete_servicio` (`id_paquete`),
  ADD KEY `fk_servicio_paquete` (`id_servicio`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id_servicio`);

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
-- AUTO_INCREMENT de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  MODIFY `id_paquete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id_servicio` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `plan`
--
ALTER TABLE `plan`
  ADD CONSTRAINT `fk_paquete_servicio` FOREIGN KEY (`id_paquete`) REFERENCES `paquetes` (`id_paquete`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_servicio_paquete` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`id_servicio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
