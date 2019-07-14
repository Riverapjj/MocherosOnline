-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-07-2019 a las 07:40:08
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
  `IdEstado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`IdArticulos`, `IdCategoria`, `NomArticulo`, `DescripcionArt`, `PrecioUnitario`, `Cantidad`, `Foto`, `IdEstado`) VALUES
(1, 1, 'Mochila con diseño de héroes', '', 35.99, 50, 'tumblr_leald8jntg1qziwcjo1_500.gif', 1),
(2, 1, 'Mochila con diseño de Barbies', '', 38.99, 50, 'tumblr_leald8jntg1qziwcjo1_500.gif', 2),
(3, 2, 'Mochila de viaje para acampar', '', 70.99, 50, 'tumblr_leald8jntg1qziwcjo1_500.gif', 1),
(4, 2, 'Mochila de viaje para montaña', '', 74.99, 50, 'tumblr_leald8jntg1qziwcjo1_500.gif', 2),
(5, 1, 'Lonchera color básico', 'hola', 15.99, 50, '5d1b77f4a5eda.gif', 1),
(6, 1, 'Lonchera con diseño', 'jeje', 19, 50, '', 2),
(7, 5, 'Mochila con diseño predeterminado', '', 45.99, 50, 'tumblr_leald8jntg1qziwcjo1_500.gif', 1),
(8, 5, 'Mochila con diseño perzonalizado', '', 60.99, 50, 'tumblr_leald8jntg1qziwcjo1_500.gif', 2),
(9, 4, 'Monedero', '', 5.99, 50, 'tumblr_leald8jntg1qziwcjo1_500.gif', 1),
(10, 1, 'Billetera', 'Billetera para hombre', 9.99, 40, '5d1b7748a6168.jpg', 2),
(11, 1, 'Mochila escolar', 'Esta es una mochila escolar', 40.99, 100, 'tumblr_leald8jntg1qziwcjo1_500.gif', 1),
(13, 1, 'Mochilas simples', 'Mochilas basicas', 9, 10, '5d1b7df79ba39.gif', 1),
(16, 1, 'Mochilas colores simples', 'Mochilas basicas', 9, 9, '5d1b7ebeceb35.gif', 1),
(17, 5, 'Mochilas simples', 'Mochilas basicas', 10, 10, '5d1b7f2137231.gif', 1);

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
(5, 19, 'Insert', '2019-03-03'),
(6, 21, 'Insert', '2019-05-06'),
(7, 25, 'Insert', '2019-05-07'),
(8, 26, 'Insert', '2019-05-07'),
(9, 27, 'Insert', '2019-05-07'),
(10, 28, 'Insert', '2019-05-07'),
(11, 29, 'Insert', '2019-05-07'),
(12, 30, 'Insert', '2019-05-07'),
(13, 31, 'Insert', '2019-05-12'),
(14, 32, 'Insert', '2019-05-13'),
(15, 33, 'Insert', '2019-05-13'),
(16, 34, 'Insert', '2019-05-13'),
(17, 35, 'Insert', '2019-05-13'),
(18, 36, 'Insert', '2019-05-13'),
(19, 37, 'Insert', '2019-07-01'),
(20, 38, 'Insert', '2019-07-02'),
(21, 39, 'Insert', '2019-07-02'),
(22, 40, 'Insert', '2019-07-02'),
(23, 27, 'Insert', '2019-07-07'),
(24, 27, 'Insert', '2019-07-07'),
(25, 27, 'Insert', '2019-07-07'),
(26, 27, 'Insert', '2019-07-07'),
(27, 27, 'Insert', '2019-07-07'),
(28, 27, 'Insert', '2019-07-07'),
(29, 27, 'Insert', '2019-07-07'),
(30, 27, 'Insert', '2019-07-07'),
(31, 27, 'Insert', '2019-07-07'),
(32, 27, 'Insert', '2019-07-07'),
(33, 27, 'Insert', '2019-07-07'),
(34, 27, 'Insert', '2019-07-07'),
(35, 27, 'Insert', '2019-07-07'),
(36, 27, 'Insert', '2019-07-07'),
(37, 27, 'Insert', '2019-07-07'),
(38, 27, 'Insert', '2019-07-07'),
(39, 27, 'Insert', '2019-07-07'),
(40, 27, 'Insert', '2019-07-07'),
(41, 27, 'Insert', '2019-07-07'),
(42, 27, 'Insert', '2019-07-07'),
(43, 27, 'Insert', '2019-07-07'),
(44, 27, 'Insert', '2019-07-07'),
(45, 27, 'Insert', '2019-07-07'),
(46, 27, 'Insert', '2019-07-07'),
(47, 27, 'Insert', '2019-07-07'),
(48, 27, 'Insert', '2019-07-07'),
(49, 27, 'Insert', '2019-07-07'),
(50, 27, 'Insert', '2019-07-07'),
(51, 27, 'Insert', '2019-07-07'),
(52, 27, 'Insert', '2019-07-07'),
(53, 27, 'Insert', '2019-07-07'),
(54, 27, 'Insert', '2019-07-07'),
(55, 27, 'Insert', '2019-07-07'),
(56, 27, 'Insert', '2019-07-07'),
(57, 27, 'Insert', '2019-07-07'),
(58, 27, 'Insert', '2019-07-07'),
(59, 27, 'Insert', '2019-07-07'),
(60, 27, 'Insert', '2019-07-07'),
(61, 27, 'Insert', '2019-07-07'),
(62, 27, 'Insert', '2019-07-07'),
(63, 27, 'Insert', '2019-07-07'),
(64, 27, 'Insert', '2019-07-07'),
(65, 27, 'Insert', '2019-07-07'),
(66, 27, 'Insert', '2019-07-07'),
(67, 27, 'Insert', '2019-07-07'),
(68, 27, 'Insert', '2019-07-07'),
(69, 27, 'Insert', '2019-07-07'),
(70, 27, 'Insert', '2019-07-07'),
(71, 27, 'Insert', '2019-07-07'),
(72, 27, 'Insert', '2019-07-07'),
(73, 27, 'Insert', '2019-07-07'),
(74, 27, 'Insert', '2019-07-07'),
(75, 27, 'Insert', '2019-07-07'),
(76, 27, 'Insert', '2019-07-07'),
(77, 27, 'Insert', '2019-07-08'),
(78, 27, 'Insert', '2019-07-08'),
(79, 27, 'Insert', '2019-07-08'),
(80, 27, 'Insert', '2019-07-08'),
(81, 27, 'Insert', '2019-07-08'),
(82, 27, 'Insert', '2019-07-08'),
(83, 27, 'Insert', '2019-07-08'),
(84, 27, 'Insert', '2019-07-08'),
(85, 27, 'Insert', '2019-07-08'),
(86, 27, 'Insert', '2019-07-08'),
(87, 27, 'Insert', '2019-07-08'),
(88, 27, 'Insert', '2019-07-08'),
(89, 27, 'Insert', '2019-07-08'),
(90, 27, 'Insert', '2019-07-08'),
(91, 27, 'Insert', '2019-07-08'),
(92, 27, 'Insert', '2019-07-08'),
(93, 27, 'Insert', '2019-07-08'),
(94, 27, 'Insert', '2019-07-08'),
(95, 27, 'Insert', '2019-07-08'),
(96, 27, 'Insert', '2019-07-08'),
(97, 27, 'Insert', '2019-07-08'),
(98, 27, 'Insert', '2019-07-08'),
(99, 27, 'Insert', '2019-07-08'),
(100, 27, 'Insert', '2019-07-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `IdCalificacion` int(11) NOT NULL,
  `IdArticulo` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `Calificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`IdCalificacion`, `IdArticulo`, `IdUsuario`, `Calificacion`) VALUES
(1, 1, 27, 5),
(2, 11, 27, 5),
(3, 3, 27, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `IdCategoria` int(11) NOT NULL,
  `NomCategoria` varchar(30) NOT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `IdEstado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`IdCategoria`, `NomCategoria`, `Descripcion`, `IdEstado`) VALUES
(1, 'Mochilas escolares', 'Mochilas de calidad media', 1),
(2, 'Mochilas de viaje', 'Mochilas de calidad alta', 1),
(3, 'Loncheras', 'Loncheras varias', 1),
(4, 'Accesorios', 'Billeteras, monederos', 1),
(5, 'Productos personalizados', 'Editable', 1),
(6, 'Mochilas simples', 'Mochilas basicas', 2),
(7, 'Mochilas simples', 'Mochilas basicas 2', NULL),
(8, 'Mochilas simples', 'Mochilas basicas 3', 1),
(9, 'Mochilas simples', 'Mochilas basicas 3', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedidos`
--

CREATE TABLE `detallepedidos` (
  `IdDetallePedido` int(11) NOT NULL,
  `IdEncabezado` int(11) DEFAULT NULL,
  `IdArticulos` int(11) DEFAULT NULL,
  `CantidadArticulo` int(11) NOT NULL,
  `PrecioDetalle` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detallepedidos`
--

INSERT INTO `detallepedidos` (`IdDetallePedido`, `IdEncabezado`, `IdArticulos`, `CantidadArticulo`, `PrecioDetalle`) VALUES
(2, 1, NULL, 5, 179.95),
(3, 1, NULL, 3, 116.97),
(4, 1, NULL, 2, 141.98),
(5, 1, NULL, 3, 299.96),
(6, 2, NULL, 5, 179.95),
(7, 2, NULL, 3, 116.97),
(8, 2, NULL, 2, 141.98),
(9, 1, NULL, 2, 141.98),
(10, 2, NULL, 3, 224.97),
(11, 2, NULL, 5, 119.94),
(12, 2, NULL, 7, 41.93),
(13, 2, NULL, 13, 168.87),
(14, 2, NULL, 1, 74.99),
(15, 2, NULL, 5, 79.95),
(16, 2, NULL, 3, 182.97),
(17, 2, NULL, 2, 71.98),
(108, 2, NULL, 6, 425.94),
(109, 2, NULL, 5, 194.95),
(110, 2, NULL, 3, 212.97),
(111, 2, NULL, 2, 91.98),
(112, 2, NULL, 1, 60.99),
(113, 2, NULL, 3, 59.97),
(114, 2, NULL, 4, 23.96),
(115, 1, NULL, 4, 183.96),
(116, 1, NULL, 1, 74.99),
(117, 1, NULL, 2, 39.98),
(118, 1, NULL, 5, 179.95),
(119, 1, NULL, 4, 155.96),
(120, 1, NULL, 1, 70.99),
(121, 1, NULL, 3, 224.97),
(122, 1, NULL, 1, 15.99),
(123, 1, NULL, 3, 59.97),
(124, 1, NULL, 3, 137.97),
(125, 1, NULL, 2, 121.98),
(126, 1, NULL, 2, 11.98),
(127, 1, NULL, 6, 77.94),
(128, 1, NULL, 3, 47.97),
(129, 1, NULL, 4, 183.96),
(130, 1, NULL, 2, 11.98),
(131, 2, NULL, 5, 64.95),
(132, 2, NULL, 5, 179.95),
(133, 1, NULL, 5, 99.95),
(134, 2, NULL, 4, 299.96),
(135, 2, NULL, 1, 60.99),
(136, 1, NULL, 1, 74.99),
(137, 1, NULL, 2, 71.98),
(138, 1, NULL, 5, 0),
(139, 1, NULL, 5, 0),
(140, 1, NULL, 5, 0),
(141, NULL, NULL, 2, 20),
(142, NULL, NULL, 2, 21),
(143, NULL, NULL, 1, 22),
(144, NULL, NULL, 2, 23),
(145, NULL, NULL, 1, 24),
(146, NULL, NULL, 3, 25),
(147, NULL, NULL, 2, 26),
(148, 5, 5, 3, 19.9),
(149, 70, 7, 1, 45.99),
(150, 81, 7, 1, 45.99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encabezadopedidos`
--

CREATE TABLE `encabezadopedidos` (
  `IdEncabezado` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `Fecha` datetime NOT NULL,
  `IdEstadoPedido` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `encabezadopedidos`
--

INSERT INTO `encabezadopedidos` (`IdEncabezado`, `IdUsuario`, `Fecha`, `IdEstadoPedido`) VALUES
(1, 15, '2019-03-02 00:00:00', NULL),
(2, 15, '2019-03-02 00:00:00', NULL),
(3, 14, '2019-03-03 00:00:00', NULL),
(4, 27, '2019-07-07 00:00:00', 2),
(5, 27, '2019-07-07 00:00:00', 2),
(6, 27, '2019-07-07 00:00:00', 2),
(7, 27, '2019-07-07 00:00:00', 2),
(8, 27, '2019-07-07 00:00:00', 2),
(9, 27, '2019-07-07 00:00:00', 2),
(10, 27, '2019-07-07 00:00:00', 2),
(11, 27, '2019-07-07 00:00:00', 2),
(12, 27, '2019-07-07 00:00:00', 2),
(13, 27, '2019-07-07 00:00:00', 2),
(14, 27, '2019-07-07 17:33:53', 2),
(15, 27, '2019-07-07 19:48:55', 2),
(16, 27, '2019-07-07 20:14:24', 2),
(17, 27, '2019-07-07 20:19:56', 2),
(18, 27, '2019-07-07 20:20:35', 2),
(19, 27, '2019-07-07 20:21:13', 2),
(20, 27, '2019-07-07 20:35:02', 2),
(21, 27, '2019-07-07 20:36:46', 2),
(22, 27, '2019-07-07 20:44:40', 2),
(23, 27, '2019-07-07 20:47:00', 2),
(24, 27, '2019-07-07 20:48:50', 2),
(25, 27, '2019-07-07 20:51:43', 2),
(26, 27, '2019-07-07 20:55:24', 2),
(27, 27, '2019-07-07 21:06:18', 2),
(28, 27, '2019-07-07 21:16:34', 2),
(29, 27, '2019-07-07 21:17:06', 2),
(30, 27, '2019-07-07 21:30:21', 2),
(31, 27, '2019-07-07 21:31:05', 2),
(32, 27, '2019-07-07 21:31:39', 2),
(33, 27, '2019-07-07 21:55:28', 2),
(34, 27, '2019-07-07 22:03:44', 2),
(35, 27, '2019-07-07 22:25:42', 2),
(36, 27, '2019-07-07 22:25:43', 2),
(37, 27, '2019-07-07 22:25:44', 2),
(38, 27, '2019-07-07 22:25:44', 2),
(39, 27, '2019-07-07 22:25:44', 2),
(40, 27, '2019-07-07 22:25:44', 2),
(41, 27, '2019-07-07 22:25:45', 2),
(42, 27, '2019-07-07 22:25:45', 2),
(43, 27, '2019-07-07 22:25:45', 2),
(44, 27, '2019-07-07 22:25:45', 2),
(45, 27, '2019-07-07 22:25:45', 2),
(46, 27, '2019-07-07 22:25:45', 2),
(47, 27, '2019-07-07 22:25:45', 2),
(48, 27, '2019-07-07 22:25:45', 2),
(49, 27, '2019-07-07 22:25:45', 2),
(50, 27, '2019-07-07 22:25:45', 2),
(51, 27, '2019-07-07 22:25:45', 2),
(52, 27, '2019-07-07 22:25:45', 2),
(53, 27, '2019-07-07 22:25:46', 2),
(54, 27, '2019-07-07 22:26:13', 2),
(55, 27, '2019-07-07 22:39:47', 2),
(56, 27, '2019-07-07 22:47:28', 2),
(57, 27, '2019-07-07 22:48:59', 2),
(58, 27, '2019-07-08 08:38:58', 2),
(59, 27, '2019-07-08 09:05:46', 2),
(60, 27, '2019-07-08 09:21:54', 2),
(61, 27, '2019-07-08 09:22:11', 2),
(62, 27, '2019-07-08 09:35:17', 2),
(63, 27, '2019-07-08 09:40:23', 2),
(64, 27, '2019-07-08 09:42:23', 2),
(65, 27, '2019-07-08 09:43:19', 2),
(66, 27, '2019-07-08 09:47:10', 2),
(67, 27, '2019-07-08 09:49:00', 2),
(68, 27, '2019-07-08 09:49:27', 2),
(69, 27, '2019-07-08 09:54:13', 2),
(70, 27, '2019-07-08 09:54:49', 2),
(71, 27, '2019-07-08 10:05:19', 2),
(72, 27, '2019-07-08 10:13:31', 2),
(73, 27, '2019-07-08 10:13:32', 2),
(74, 27, '2019-07-08 10:13:34', 2),
(75, 27, '2019-07-08 10:16:32', 2),
(76, 27, '2019-07-08 10:17:22', 2),
(77, 27, '2019-07-08 10:19:01', 2),
(78, 27, '2019-07-08 10:21:04', 2),
(79, 27, '2019-07-08 10:22:07', 2),
(80, 27, '2019-07-08 10:23:02', 2),
(81, 27, '2019-07-08 10:23:31', 2);

--
-- Disparadores `encabezadopedidos`
--
DELIMITER $$
CREATE TRIGGER `insertEncabezado` BEFORE INSERT ON `encabezadopedidos` FOR EACH ROW INSERT INTO bitacora VALUES(null, NEW.IdUsuario, 'Insert', NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadopedidos`
--

CREATE TABLE `estadopedidos` (
  `IdEstadoPedido` int(11) NOT NULL,
  `TipoEstado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estadopedidos`
--

INSERT INTO `estadopedidos` (`IdEstadoPedido`, `TipoEstado`) VALUES
(1, 'Pendiente'),
(2, 'Entregado'),
(3, 'Anulado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `IdEstado` int(11) NOT NULL,
  `Estado` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`IdEstado`, `Estado`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prepedidos`
--

CREATE TABLE `prepedidos` (
  `IdPrePedido` int(11) NOT NULL,
  `IdCliente` int(11) NOT NULL,
  `IdArticulos` int(11) DEFAULT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `IdRol` int(11) NOT NULL,
  `TipoRol` varchar(20) NOT NULL,
  `IdEstado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`IdRol`, `TipoRol`, `IdEstado`) VALUES
(1, 'Admin', 1),
(2, 'Empleado', 1),
(3, 'Gerente', 1),
(6, 'Cliente', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuario` int(11) NOT NULL,
  `IdRol` int(11) NOT NULL,
  `IdEstado` int(11) DEFAULT NULL,
  `NomUsuario` varchar(30) NOT NULL,
  `Nombre` varchar(25) NOT NULL,
  `Apellido` varchar(30) NOT NULL,
  `Direccion` varchar(300) NOT NULL,
  `Telefono` varchar(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Clave` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `IdRol`, `IdEstado`, `NomUsuario`, `Nombre`, `Apellido`, `Direccion`, `Telefono`, `Email`, `Clave`) VALUES
(2, 2, 1, 'CR07', 'Carlos Federico', 'Ramirez Soriano', 'San Salvador', '75123068', 'carlos@gmail.com', ''),
(5, 3, 2, 'NJ11', 'Jefferson Joel', 'Novoa Lopez', 'Cima IV', '77497179', 'joel@gmail.com', ''),
(7, 6, 1, 'KF06', 'Francisco Stanley', 'Vasconcelos Zelaya', 'San Salvador', '79203651', 'francisco@gmail.com', ''),
(9, 2, 2, 'AB08', 'Bryan Alejandro', 'Amaya Flores', 'San Jacinto', '75321692', 'bryan@gmail.com', ''),
(10, 2, 1, 'PJ02', 'Juan Alberto', 'Perez Salguero', 'San Miguel', '76215493', 'juan@gmai.com', ''),
(11, 2, 2, 'RC05', 'Carlos Hector', 'Rodriguez Garcia', 'Santa Ana', '79621354', 'hector@gmail.com', ''),
(12, 2, 1, 'LP09', 'Pablo Javier', 'Lozano Gomez', 'Sonsonate', '76215936', 'pablo@gmail.com', ''),
(13, 6, 2, 'LJ0', 'Jorge Luis', 'Lopez Martinez', 'San Jacinto', '75369212', 'jorge@gmail.com', '1234567'),
(14, 6, 1, 'UC08', 'Carlos Jose', 'Urrutia Ramirez', 'Mejicanos', '76215369', 'carlos@gmail.com', ''),
(15, 6, 2, 'AF06', 'Felix Alejandro', 'Arias Palacios', 'La Libertad', '72156324', 'felix@gmail.com', ''),
(16, 6, 1, 'GO05', 'Oswaldo Narciso', 'Gomez Orellana', 'La Paz', '63215489', 'oswaldo@gmail.com', ''),
(18, 1, 2, 'PG02', 'Gloria Belén', 'Palacios Beltrán', 'San Salvador', '78521436', 'belen@gmail.com', ''),
(19, 1, 1, 'PG02', 'Gloria Belén', 'Palacios Beltrán', 'San Salvador', '78521436', 'belen@gmail.com', ''),
(21, 6, 1, 'RF01', 'Fede', 'Ramírez', 'San Salvador', '12345678', 'fede@gmail.com', '$2y$10$T0Kn8bUyBNOOWex55EVdm.OuN3JlCrldFWlESumNksj.FTGYtJjLW'),
(25, 6, 1, 'RJ01', 'Josué', 'Rivera', 'San Salvador', '22455465', 'josue@gmail.com', '$2y$10$1tS9ZEOVR8ebQnD9cQGs0eIy0WoY93s6aoRyQHHXjNEdG5jlGVmtW'),
(26, 6, 2, 'RJ01', 'Josué', 'Rivera', 'San Salvador', '22455465', 'josue@gmail.com', '$2y$10$04mjtAuAWYlYtVfIz2jgWuPTlLQepEC13MCGxx9Hhf7wKmnQ/HNzC'),
(27, 6, 1, 'federamirez', 'Federico', 'Ramírez', 'San Salvador', '22455465', 'fede@gmail.com', '$2y$10$/tRIkhUUMzAfFsNL/ECkOuINBgIAVq5pZVb0vMvYv/bkI2KP6P8ES'),
(28, 6, 2, 'riverapj', 'Josué', 'Rivera', 'San Salvador', '22455465', 'josue@gmail.com', '$2y$10$FMhym5rIfE0GdK9kjcUSk.CN8HHxIkObRSTuT/DURJSgDI3cY5eIu'),
(29, 6, 1, 'Marcelou', 'Marburi', 'Mayorga', 'San Salvador', '22455465', 'marburi@gmail.com', '$2y$10$dvC7EBjl4ONoabuVoaA/buEmfcZ57xJ5VfaGj/0./Af9wbbjuTK3.'),
(30, 6, 2, 'Figueroa', 'Gabriel', 'Figueroa', 'Mi casa', '22736000', 'gabriel@figueroa.com', '$2y$10$pzJNfmRow8XWX1iDrcLaFuLL2wMHC7Fz3kIP9oyz.QQtKwPuScdwa'),
(31, 1, 1, 'AJ07', 'Jose Alberto', 'Soriano Palacios', 'San Salvador', '78965412', 'jose@gmail.com', '$2y$10$VGgjYO2WYUSwczPuHWBjcOcvcfMIeonoUkgbORlZWuFi/JqvGpZMy'),
(32, 1, 1, 'JJ09', 'Joel Jeff', 'Novoa Lopez', 'San Salvador', '74589632', 'joel@gmail.com', '$2y$10$Kf.LY2grNMBnZIxTZOWczun0j5kJc0XFm4Xe3UcInOqdjMsaHW8G6'),
(33, 1, 1, 'NF01', 'Fabiola Nicole', 'Martinez Ramirez', 'San Salvador', '78965412', 'fab@gmail.com', '$2y$10$8t9LjTzc6fsfPCtuW8OsXOY/8Q.MZbQPsrHj2YB9N8wc.f7oAOXR.'),
(34, 2, 1, 'AA09', 'Amber Antonio', 'Lopez Dante', 'San Salvador', '78965412', 'am@gmail.com', '$2y$10$61owKoelSRnFD773L5ePTOK2JJTx7/X68a5YaIlFid128i/0lfNyq'),
(35, 1, 1, 'EG08', 'Gloria Elizabeth', 'Belen Palacios', 'San Salvador', '78965412', 'bel@gmail.com', '$2y$10$PJPTbNVz6VZWvogG61aeQufblWKJD3z6S64KIIxztrPC8v84up3be'),
(36, 1, 1, 'AJ06', 'John Alfredo', 'Rivera Amaya', 'San Salvador', '78965412', 'jo@gmail.com', '$2y$10$1NUhHV0Zd8y0eeWw3jMHEumYBT.LyhkCIOQJ7xILbC3m.j3oM2jym'),
(37, 1, 2, 'AA08', 'Antonio Alberto', 'Andrade Amaya', 'San Salvador', '78965412', 'aa@gmail.com', '$2y$10$xmKFJ7AGw2OGbJMlne6cpOErrHlMF1p66Bvo8HeUQB1IdaHFaZBQK'),
(38, 1, 1, 'AJ08', 'Alexander Josué', 'Palacios Rivera', 'San Salvador', '78965412', 'aj@gmail.com', '$2y$10$nqAzE0RNgGKmuDSSTQjpp.ytJP7b.qu7.8uemIdSsOITqhqRmWKnK'),
(39, 1, 1, 'AJ03', 'Alexander Josué', 'Palacios Rivera', 'San Salvador', '78965412', 'aj@gmail.com', '$2y$10$Q6fPYBEKIagjxa6LoE3jc.HMN.gf3SkEcKllUwVIVnSS3M2srunLm'),
(40, 1, 1, 'AA09', 'Alvaro Alberto', 'Palacios Rivera', 'San Salvador', '78965412', 'aa@gmail.com', '$2y$10$g0CjB3OzLiRAybYqwgIeRuS4rIyHGEiZ3NIqX2kvQx3tiPaw39/A.');

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
  ADD KEY `IdCategoria` (`IdCategoria`),
  ADD KEY `IdEstado` (`IdEstado`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`IdBitacora`),
  ADD KEY `IdUsuario` (`IdUsuario`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`IdCalificacion`),
  ADD KEY `IdUsuario` (`IdUsuario`),
  ADD KEY `IdArticulo` (`IdArticulo`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`IdCategoria`),
  ADD KEY `IdEstado` (`IdEstado`);

--
-- Indices de la tabla `detallepedidos`
--
ALTER TABLE `detallepedidos`
  ADD PRIMARY KEY (`IdDetallePedido`),
  ADD KEY `IdEncabezado` (`IdEncabezado`),
  ADD KEY `IdArticulos` (`IdArticulos`);

--
-- Indices de la tabla `encabezadopedidos`
--
ALTER TABLE `encabezadopedidos`
  ADD PRIMARY KEY (`IdEncabezado`),
  ADD KEY `IdUsuario` (`IdUsuario`),
  ADD KEY `IdEstadoPedido` (`IdEstadoPedido`);

--
-- Indices de la tabla `estadopedidos`
--
ALTER TABLE `estadopedidos`
  ADD PRIMARY KEY (`IdEstadoPedido`),
  ADD KEY `IdEstadoPedido` (`IdEstadoPedido`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`IdEstado`);

--
-- Indices de la tabla `prepedidos`
--
ALTER TABLE `prepedidos`
  ADD PRIMARY KEY (`IdPrePedido`),
  ADD KEY `IdCliente` (`IdCliente`),
  ADD KEY `IdArticulos` (`IdArticulos`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`IdRol`),
  ADD KEY `IdEstado` (`IdEstado`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD KEY `IdRol` (`IdRol`),
  ADD KEY `usuarios_ibfk_2` (`IdEstado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `IdArticulos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `IdBitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `IdCalificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `IdCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `detallepedidos`
--
ALTER TABLE `detallepedidos`
  MODIFY `IdDetallePedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT de la tabla `encabezadopedidos`
--
ALTER TABLE `encabezadopedidos`
  MODIFY `IdEncabezado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `estadopedidos`
--
ALTER TABLE `estadopedidos`
  MODIFY `IdEstadoPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `IdEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `prepedidos`
--
ALTER TABLE `prepedidos`
  MODIFY `IdPrePedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `IdRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `articulos_ibfk_1` FOREIGN KEY (`IdCategoria`) REFERENCES `categorias` (`IdCategoria`),
  ADD CONSTRAINT `articulos_ibfk_2` FOREIGN KEY (`IdEstado`) REFERENCES `estados` (`IdEstado`);

--
-- Filtros para la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD CONSTRAINT `bitacora_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`IdUsuario`);

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `calificaciones_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`IdUsuario`),
  ADD CONSTRAINT `calificaciones_ibfk_2` FOREIGN KEY (`IdArticulo`) REFERENCES `articulos` (`IdArticulos`);

--
-- Filtros para la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `categorias_ibfk_1` FOREIGN KEY (`IdEstado`) REFERENCES `estados` (`IdEstado`);

--
-- Filtros para la tabla `detallepedidos`
--
ALTER TABLE `detallepedidos`
  ADD CONSTRAINT `detallepedidos_ibfk_2` FOREIGN KEY (`IdEncabezado`) REFERENCES `encabezadopedidos` (`IdEncabezado`),
  ADD CONSTRAINT `detallepedidos_ibfk_3` FOREIGN KEY (`IdArticulos`) REFERENCES `articulos` (`IdArticulos`);

--
-- Filtros para la tabla `encabezadopedidos`
--
ALTER TABLE `encabezadopedidos`
  ADD CONSTRAINT `encabezadopedidos_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`IdUsuario`),
  ADD CONSTRAINT `encabezadopedidos_ibfk_2` FOREIGN KEY (`IdEstadoPedido`) REFERENCES `estadopedidos` (`IdEstadoPedido`);

--
-- Filtros para la tabla `prepedidos`
--
ALTER TABLE `prepedidos`
  ADD CONSTRAINT `prepedidos_ibfk_2` FOREIGN KEY (`IdCliente`) REFERENCES `usuarios` (`IdUsuario`),
  ADD CONSTRAINT `prepedidos_ibfk_3` FOREIGN KEY (`IdArticulos`) REFERENCES `articulos` (`IdArticulos`);

--
-- Filtros para la tabla `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`IdEstado`) REFERENCES `estados` (`IdEstado`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`IdRol`) REFERENCES `roles` (`IdRol`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`IdEstado`) REFERENCES `estados` (`IdEstado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
