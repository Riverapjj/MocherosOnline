-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-05-2019 a las 04:03:11
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mocheritosdb`
--

CREATE DATABASE IF NOT EXISTS `mocheritosdb`;

USE `mocheritosdb`;

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertArticulos` (IN `categoria` INT, IN `nombre` VARCHAR(35), IN `preciounit` FLOAT, IN `cantidadart` INT)  NO SQL
INSERT INTO articulos VALUES(null, @categoria, @nombre, @preciounit, @cantidadart)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertEncabezado` (IN `usuario` INT, IN `fechaenc` DATE)  NO SQL
INSERT INTO encabezadopedidos VALUES(null, @usuario, @fechaenc)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `IdArticulos` int(11) NOT NULL,
  `IdCategoria` int(11) NOT NULL,
  `NomArticulo` varchar(35) NOT NULL,
  `DescripcionArt` varchar(200) NOT NULL,
  `PrecioUnitario` float NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Foto` varchar(50) NOT NULL,
  `Calificacion` int(11) DEFAULT NULL,
  `Comentario` varchar(200) DEFAULT NULL,
  `Estado` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`IdArticulos`, `IdCategoria`, `NomArticulo`, `DescripcionArt`, `PrecioUnitario`, `Cantidad`, `Foto`, `Calificacion`, `Comentario`, `Estado`) VALUES
(1, 1, 'Mochila con diseño de héroes', '', 35.99, 50, '', NULL, NULL, 1),
(2, 1, 'Mochila con diseño de Barbies', '', 38.99, 50, '', NULL, NULL, 1),
(3, 2, 'Mochila de viaje para acampar', '', 70.99, 50, '', NULL, NULL, 1),
(4, 2, 'Mochila de viaje para montaña', '', 74.99, 50, '', NULL, NULL, 1),
(5, 3, 'Lonchera color básico', '', 15.99, 50, '', NULL, NULL, 1),
(6, 3, 'Lonchera con diseño', '', 19.99, 50, '', NULL, NULL, 1),
(7, 5, 'Mochila con diseño predeterminado', '', 45.99, 50, '', NULL, NULL, 1),
(8, 5, 'Mochila con diseño perzonalizado', '', 60.99, 50, '', NULL, NULL, 1),
(9, 4, 'Monedero', '', 5.99, 50, '', NULL, NULL, 1),
(10, 4, 'Billetera', 'Billetera para hombre', 12.99, 50, '', NULL, NULL, 1),
(11, 1, 'Mochila escolar', 'Esta es una mochila escolar', 40.99, 100, '', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `IdBitacora` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `Accion` varchar(20) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`IdBitacora`, `IdUsuario`, `Accion`, `Fecha`) VALUES
(4, 18, 'Insert', '2019-03-03'),
(5, 19, 'Insert', '2019-03-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `IdCategoria` int(11) NOT NULL,
  `NomCategoria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`IdCategoria`, `NomCategoria`) VALUES
(1, 'Mochilas escolares'),
(2, 'Mochilas de viaje'),
(3, 'Loncheras'),
(4, 'Accesorios'),
(5, 'Productos personalizados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedidos`
--

CREATE TABLE `detallepedidos` (
  `IdDetallePedido` int(11) NOT NULL,
  `IdEncabezado` int(11) DEFAULT NULL,
  `IdArticulo` int(11) NOT NULL,
  `CantidadArticulo` int(11) NOT NULL,
  `PrecioDetalle` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detallepedidos`
--

INSERT INTO `detallepedidos` (`IdDetallePedido`, `IdEncabezado`, `IdArticulo`, `CantidadArticulo`, `PrecioDetalle`) VALUES
(2, 1, 1, 5, 179.95),
(3, 1, 2, 3, 116.97),
(4, 1, 3, 2, 141.98),
(5, 1, 4, 3, 299.96),
(6, 2, 1, 5, 179.95),
(7, 2, 2, 3, 116.97),
(8, 2, 3, 2, 141.98),
(9, 1, 3, 2, 141.98),
(10, 2, 4, 3, 224.97),
(11, 2, 6, 5, 119.94),
(12, 2, 9, 7, 41.93),
(13, 2, 10, 13, 168.87),
(14, 2, 4, 1, 74.99),
(15, 2, 5, 5, 79.95),
(16, 2, 8, 3, 182.97),
(17, 2, 1, 2, 71.98),
(108, 2, 4, 6, 425.94),
(109, 2, 2, 5, 194.95),
(110, 2, 3, 3, 212.97),
(111, 2, 7, 2, 91.98),
(112, 2, 8, 1, 60.99),
(113, 2, 6, 3, 59.97),
(114, 2, 9, 4, 23.96),
(115, 1, 7, 4, 183.96),
(116, 1, 4, 1, 74.99),
(117, 1, 6, 2, 39.98),
(118, 1, 1, 5, 179.95),
(119, 1, 2, 4, 155.96),
(120, 1, 3, 1, 70.99),
(121, 1, 4, 3, 224.97),
(122, 1, 5, 1, 15.99),
(123, 1, 6, 3, 59.97),
(124, 1, 7, 3, 137.97),
(125, 1, 8, 2, 121.98),
(126, 1, 9, 2, 11.98),
(127, 1, 10, 6, 77.94),
(128, 1, 5, 3, 47.97),
(129, 1, 7, 4, 183.96),
(130, 1, 9, 2, 11.98),
(131, 2, 10, 5, 64.95),
(132, 2, 1, 5, 179.95),
(133, 1, 6, 5, 99.95),
(134, 2, 4, 4, 299.96),
(135, 2, 8, 1, 60.99),
(136, 1, 4, 1, 74.99),
(137, 1, 1, 2, 71.98),
(138, 1, 1, 5, 0),
(139, 1, 1, 5, 0),
(140, 1, 1, 5, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encabezadopedidos`
--

CREATE TABLE `encabezadopedidos` (
  `IdEncabezado` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `encabezadopedidos`
--

INSERT INTO `encabezadopedidos` (`IdEncabezado`, `IdUsuario`, `Fecha`) VALUES
(1, 15, '2019-03-02'),
(2, 15, '2019-03-02'),
(3, 14, '2019-03-03');

--
-- Disparadores `encabezadopedidos`
--
DELIMITER $$
CREATE TRIGGER `insertEncabezado` BEFORE INSERT ON `encabezadopedidos` FOR EACH ROW INSERT INTO bitacora VALUES(null, NEW.IdUsuario, 'Insert', NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `IdRol` int(11) NOT NULL,
  `TipoRol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`IdRol`, `TipoRol`) VALUES
(1, 'Admin'),
(2, 'Empleado'),
(3, 'Gerente'),
(6, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuario` int(11) NOT NULL,
  `IdRol` int(11) NOT NULL,
  `NomUsuario` varchar(30) NOT NULL,
  `Nombre` varchar(25) NOT NULL,
  `Apellido` varchar(30) NOT NULL,
  `Direccion` varchar(300) NOT NULL,
  `Telefono` varchar(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Clave` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `IdRol`, `NomUsuario`, `Nombre`, `Apellido`, `Direccion`, `Telefono`, `Email`, `Clave`) VALUES
(1, 1, 'RJ01', 'Josue Alexander', 'Rivera Palacios', 'Mejicanos', '75413965', 'josue@gmai.com', ''),
(2, 2, 'CR07', 'Carlos Federico', 'Ramirez Soriano', 'San Salvador', '75123068', 'carlos@gmail.com', ''),
(5, 3, 'NJ11', 'Jefferson Joel', 'Novoa Lopez', 'Cima IV', '77497179', 'joel@gmail.com', ''),
(7, 6, 'KF06', 'Francisco Stanley', 'Vasconcelos Zelaya', 'San Salvador', '79203651', 'francisco@gmail.com', ''),
(9, 2, 'AB08', 'Bryan Alejandro', 'Amaya Flores', 'San Jacinto', '75321692', 'bryan@gmail.com', ''),
(10, 2, 'PJ02', 'Juan Alberto', 'Perez Salguero', 'San Miguel', '76215493', 'juan@gmai.com', ''),
(11, 2, 'RC05', 'Carlos Hector', 'Rodriguez Garcia', 'Santa Ana', '79621354', 'hector@gmail.com', ''),
(12, 2, 'LP09', 'Pablo Javier', 'Lozano Gomez', 'Sonsonate', '76215936', 'pablo@gmail.com', ''),
(13, 6, 'LJ0', 'Jorge Luis', 'Lopez Martinez', 'San Jacinto', '75369212', 'jorge@gmail.com', ''),
(14, 6, 'UC08', 'Carlos Jose', 'Urrutia Ramirez', 'Mejicanos', '76215369', 'carlos@gmail.com', ''),
(15, 6, 'AF06', 'Felix Alejandro', 'Arias Palacios', 'La Libertad', '72156324', 'felix@gmail.com', ''),
(16, 6, 'GO05', 'Oswaldo Narciso', 'Gomez Orellana', 'La Paz', '63215489', 'oswaldo@gmail.com', ''),
(17, 6, 'PA08', 'Anuel Manuel', 'Perez Brr', 'Bebesiitaaa', '78541236', 'bbsita@gmail.com', ''),
(18, 1, 'PG02', 'Gloria Belén', 'Palacios Beltrán', 'San Salvador', '78521436', 'belen@gmail.com', ''),
(19, 1, 'PG02', 'Gloria Belén', 'Palacios Beltrán', 'San Salvador', '78521436', 'belen@gmail.com', '');

--
-- Disparadores `usuarios`
--
DELIMITER $$
CREATE TRIGGER `insertUsuarios` AFTER INSERT ON `usuarios` FOR EACH ROW INSERT INTO bitacora VALUES(null, NEW.IdUsuario, 'Insert', NOW())
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`IdArticulos`),
  ADD KEY `IdCategoria` (`IdCategoria`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`IdBitacora`),
  ADD KEY `IdUsuario` (`IdUsuario`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`IdCategoria`);

--
-- Indices de la tabla `detallepedidos`
--
ALTER TABLE `detallepedidos`
  ADD PRIMARY KEY (`IdDetallePedido`),
  ADD KEY `IdArticulo` (`IdArticulo`),
  ADD KEY `IdEncabezado` (`IdEncabezado`);

--
-- Indices de la tabla `encabezadopedidos`
--
ALTER TABLE `encabezadopedidos`
  ADD PRIMARY KEY (`IdEncabezado`),
  ADD KEY `IdUsuario` (`IdUsuario`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`IdRol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD KEY `IdRol` (`IdRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `IdArticulos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `IdBitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `IdCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detallepedidos`
--
ALTER TABLE `detallepedidos`
  MODIFY `IdDetallePedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT de la tabla `encabezadopedidos`
--
ALTER TABLE `encabezadopedidos`
  MODIFY `IdEncabezado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `IdRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `articulos_ibfk_1` FOREIGN KEY (`IdCategoria`) REFERENCES `categorias` (`IdCategoria`);

--
-- Filtros para la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD CONSTRAINT `bitacora_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`IdUsuario`);

--
-- Filtros para la tabla `detallepedidos`
--
ALTER TABLE `detallepedidos`
  ADD CONSTRAINT `detallepedidos_ibfk_1` FOREIGN KEY (`IdArticulo`) REFERENCES `articulos` (`IdArticulos`),
  ADD CONSTRAINT `detallepedidos_ibfk_2` FOREIGN KEY (`IdEncabezado`) REFERENCES `encabezadopedidos` (`IdEncabezado`);

--
-- Filtros para la tabla `encabezadopedidos`
--
ALTER TABLE `encabezadopedidos`
  ADD CONSTRAINT `encabezadopedidos_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`IdUsuario`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`IdRol`) REFERENCES `roles` (`IdRol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
