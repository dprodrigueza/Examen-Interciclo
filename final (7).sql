-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2019 a las 10:43:56
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `final`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturacab`
--

CREATE TABLE `facturacab` (
  `fcab_id` int(11) NOT NULL,
  `cod_id` int(11) NOT NULL,
  `fcab_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fcab_subtotal` double(11,2) NOT NULL,
  `fcab_iva` double(11,2) NOT NULL,
  `fcab_total` double(11,2) NOT NULL,
  `suc_id` int(11) NOT NULL,
  `fac_estado` varchar(500) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `facturacab`
--

INSERT INTO `facturacab` (`fcab_id`, `cod_id`, `fcab_fecha`, `fcab_subtotal`, `fcab_iva`, `fcab_total`, `suc_id`, `fac_estado`) VALUES
(1, 4, '2019-06-03 00:53:52', 3550.00, 426.00, 3976.00, 0, ''),
(2, 4, '2019-06-03 00:55:43', 3550.00, 426.00, 3976.00, 0, ''),
(3, 4, '2019-06-03 00:56:49', 3550.00, 426.00, 3976.00, 0, ''),
(4, 4, '2019-06-03 00:59:14', 3550.00, 426.00, 3976.00, 0, ''),
(5, 4, '2019-06-03 01:05:34', 3550.00, 426.00, 3976.00, 0, ''),
(6, 4, '2019-06-03 01:06:02', 3550.00, 426.00, 3976.00, 0, ''),
(7, 4, '2019-06-03 01:11:04', 3550.00, 426.00, 3976.00, 0, ''),
(8, 4, '2019-06-03 01:13:51', 3550.00, 426.00, 3976.00, 0, 'CONFIRMADO'),
(9, 4, '2019-06-03 01:55:04', 3550.00, 426.00, 3976.00, 0, 'CONFIRMADO'),
(10, 4, '2019-06-03 01:58:41', 3550.00, 426.00, 3976.00, 0, 'CONFIRMADO'),
(11, 4, '2019-06-03 02:00:22', 3550.00, 426.00, 3976.00, 0, 'CONFIRMADO'),
(12, 4, '2019-06-03 02:07:14', 3550.00, 426.00, 3976.00, 0, 'CONFIRMADO'),
(13, 4, '2019-06-03 02:14:58', 3550.00, 426.00, 3976.00, 0, 'CONFIRMADO'),
(14, 4, '2019-06-03 02:16:49', 3550.00, 426.00, 3976.00, 0, 'CONFIRMADO'),
(15, 4, '2019-06-03 02:19:33', 3550.00, 426.00, 3976.00, 0, 'CONFIRMADO'),
(16, 4, '2019-06-03 02:19:58', 1750.00, 210.00, 1960.00, 0, 'CONFIRMADO'),
(17, 4, '2019-06-03 02:20:44', 3900.00, 468.00, 4368.00, 0, 'CONFIRMADO'),
(18, 4, '2019-06-03 02:21:56', 6000.00, 720.00, 6720.00, 0, 'CONFIRMADO'),
(19, 4, '2019-06-03 02:22:32', 5400.00, 648.00, 6048.00, 0, 'CONFIRMADO'),
(20, 3, '2019-06-03 02:31:46', 5200.30, 624.04, 5824.34, 0, 'CANCELADO'),
(21, 3, '2019-06-04 01:26:42', 8900.00, 1068.00, 9968.00, 0, 'CONFIRMADO'),
(22, 3, '2019-06-04 06:09:29', 5500.00, 660.00, 6160.00, 0, 'CONFIRMADO'),
(23, 3, '2019-06-04 06:12:01', 1800.00, 216.00, 2016.00, 0, 'CONFIRMADO'),
(24, 3, '2019-06-04 06:14:17', 4000.00, 480.00, 4480.00, 4, 'CONFIRMADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturadet`
--

CREATE TABLE `facturadet` (
  `fdet_id` int(11) NOT NULL,
  `fdet_cantidad` int(11) NOT NULL,
  `fdet_total` double(11,2) NOT NULL,
  `fcab_id` int(11) NOT NULL,
  `pro_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `facturadet`
--

INSERT INTO `facturadet` (`fdet_id`, `fdet_cantidad`, `fdet_total`, `fcab_id`, `pro_Id`) VALUES
(1, 1, 1750.00, 7, 8),
(2, 1, 1800.00, 7, 10),
(3, 1, 1750.00, 8, 8),
(4, 1, 1800.00, 8, 10),
(5, 1, 1750.00, 9, 8),
(6, 1, 1800.00, 9, 10),
(7, 1, 1750.00, 10, 8),
(8, 1, 1800.00, 10, 10),
(9, 1, 1750.00, 11, 8),
(10, 1, 1800.00, 11, 10),
(11, 1, 1750.00, 12, 8),
(12, 1, 1800.00, 12, 10),
(13, 1, 1750.00, 13, 8),
(14, 1, 1800.00, 13, 10),
(15, 1, 1750.00, 14, 8),
(16, 1, 1800.00, 14, 10),
(17, 1, 1750.00, 15, 8),
(18, 1, 1800.00, 15, 10),
(19, 2, 3500.00, 16, 8),
(20, 3, 6000.00, 17, 9),
(21, 1, 1900.00, 17, 11),
(22, 3, 6000.00, 18, 9),
(23, 3, 5400.00, 19, 10),
(24, 1, 1200.30, 20, 4),
(25, 1, 1800.00, 20, 10),
(26, 1, 1750.00, 20, 8),
(27, 3, 450.00, 20, 6),
(28, 2, 3500.00, 21, 8),
(29, 3, 5400.00, 21, 10),
(30, 2, 3500.00, 22, 8),
(31, 1, 2000.00, 22, 9),
(32, 1, 1800.00, 23, 10),
(33, 2, 4000.00, 24, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `ped_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `ped_cantidad` int(11) NOT NULL,
  `ped_estado` varchar(11) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`ped_id`, `pro_id`, `cod_usuario`, `ped_cantidad`, `ped_estado`) VALUES
(8, 4, 3, 1, 'CONFIRMADO'),
(11, 10, 3, 1, 'CONFIRMADO'),
(19, 4, 4, 1, 'CONFIRMADO'),
(20, 8, 4, 1, 'CONFIRMADO'),
(25, 8, 3, 1, 'CONFIRMADO'),
(30, 6, 3, 3, 'CONFIRMADO'),
(31, 10, 4, 1, 'CONFIRMADO'),
(32, 8, 4, 2, 'CONFIRMADO'),
(33, 9, 4, 3, 'CONFIRMADO'),
(34, 11, 4, 1, 'CONFIRMADO'),
(35, 9, 4, 3, 'CONFIRMADO'),
(36, 10, 4, 3, 'CONFIRMADO'),
(38, 8, 3, 2, 'CONFIRMADO'),
(39, 10, 3, 3, 'CONFIRMADO'),
(40, 8, 0, 0, 'CREADO'),
(41, 8, 3, 2, 'CONFIRMADO'),
(42, 9, 3, 1, 'CONFIRMADO'),
(43, 10, 3, 1, 'CONFIRMADO'),
(44, 9, 3, 2, 'CONFIRMADO'),
(45, 4, 3, 2, 'CREADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `prod_id` int(11) NOT NULL,
  `prod_descripcion` varchar(250) COLLATE latin1_spanish_ci NOT NULL,
  `prod_caracteristica` varchar(250) COLLATE latin1_spanish_ci NOT NULL,
  `prod_precio` decimal(10,2) NOT NULL,
  `prod_stock` int(11) NOT NULL,
  `prod_foto` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `prod_eliminado` varchar(100) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`prod_id`, `prod_descripcion`, `prod_caracteristica`, `prod_precio`, `prod_stock`, `prod_foto`, `prod_eliminado`) VALUES
(3, 'PC-GAMER', 'I3', '1200.00', 30, 'perfil.jpg', 'SI'),
(4, 'PC', 'PC DE ESCRITORIO I3 8VA', '1200.30', 29, 'juegos.jpg', ''),
(6, 'MEMORIA', 'MEMORIA KINGSTON 120 GB', '150.00', 86, 'torneosp.jpg', ''),
(7, 'COMPUTADORA', 'ACER PREDATOR HELIOS 300 GAMING LAPTOP PC, 15.6', '1700.00', 5, 'acerpredator.jpg', 'SI'),
(8, 'COMPUTADORA', 'ACER PREDATOR HELIOS 300 GAMING LAPTOP PC, 15.6\"', '1750.00', 21, 'acerpredator.jpg', 'NO'),
(9, 'COMPUTADORA', 'APPLE MACBOOK PRO (13\" RETINA, 2.3GHZ DUAL-CORE INTEL CORE I5, 8GB RAM, 128GB SSD)', '2000.00', 48, 'macbook.jpg', 'NO'),
(10, 'PC', 'CYBERPOWERPC GAMER XTREME VR GXIVR8060A7 GAMING PC (INTEL I5-9400F 2.9GHZ 8GB DDR4)', '1800.00', 50, 'cyberpower.jpg', 'NO'),
(11, 'COMPUTADORA', 'ASUS ROG ZEPHYRUS S ULTRA SLIM GAMING LAPTOP, 15.6â€ 144HZ IPS TYPE FHD, GEFORCE RTX 2070, INTEL CORE I7-9750H, 16GB DDR4', '1900.00', 4, 'asus.jpg', 'NO'),
(16, 'COMPUTADORA', 'ASUS ZENBOOK UX410UA-GV036 - PORTÃTIL DE 14\" FHD (INTEL CORE I7-7500U, 8 GB RAM, 256 GB SSD, INTEL HD GRAPHICS 620, SIN SISTEMA OPERATIVO) GRIS CUARTZO - TECLADO QWERTY ESPAÃ‘OL', '700.00', 10, 'asuszenbook.jpg', 'SI'),
(17, 'COMPUTADORA', 'ASUS ZENBOOK UX410UA-GV036 - PORTÃTIL DE 14', '900.00', 10, 'asuszenbook.jpg', 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `suc_id` int(10) NOT NULL,
  `suc_nombre` varchar(100) NOT NULL,
  `suc_direccion` varchar(100) NOT NULL,
  `suc_ciudad` varchar(100) NOT NULL,
  `suc_eliminado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`suc_id`, `suc_nombre`, `suc_direccion`, `suc_ciudad`, `suc_eliminado`) VALUES
(1, 'PRINCIPAL', 'AV LOJA Y AMERICAS', 'cuenca', 'NO'),
(2, 'MATRIZ QUITO', 'AV PRINCIPAL Y 24 DE MAYO', 'quito', 'NO'),
(3, 'MATRIZ GUAYAQUIL', 'AV 13 DE ABRIL Y CENTRO', 'guayaquil', 'NO'),
(4, 'SUCURSAL GUAYAQUIL', 'AV. SNA BORONDON', 'guayaquil', 'NO'),
(5, 'SUCURSAL BAÃ‘OS', 'BAÃ‘OS Y ALADO DE LA ILESIA-', 'cuenca', 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usu_id` int(11) NOT NULL,
  `usu_nombre` varchar(500) COLLATE latin1_spanish_ci NOT NULL,
  `usu_apellido` varchar(500) COLLATE latin1_spanish_ci NOT NULL,
  `usu_mail` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `usu_constrasena` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `usu_direccion` varchar(2500) COLLATE latin1_spanish_ci NOT NULL,
  `usu_rol` varchar(7) COLLATE latin1_spanish_ci NOT NULL,
  `usu_foto` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `usu_eliminado` varchar(3) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usu_id`, `usu_nombre`, `usu_apellido`, `usu_mail`, `usu_constrasena`, `usu_direccion`, `usu_rol`, `usu_foto`, `usu_eliminado`) VALUES
(1, 'DIEGO', 'RODRIGUEZ', 'drodrigueza@est.ups.edu.ec', 'cuenca', '', 'ADMIN', '', 'NO'),
(2, 'MARCO', 'COBOS', 'mcobosf@est.ups.edu.ec', 'cuenca', '', 'USER', '', 'NO'),
(3, 'GABRIEL', 'CHUCHUCA ', 'gchuchuca@est.ups.edu.ec', 'cuenca', 'Pasaje Nicanor Cobos', 'USER', 'hola.jpg', 'NO'),
(4, 'MALKI', 'YUPANKI', 'myupanki@est.ups.edu.ec', 'cuenca', '', 'USER', '', 'NO'),
(5, 'ELISABETH', 'ALVARADO', 'ealvarado@est.ups.edu.ec', 'cuenca', '', 'USER', '', 'NO'),
(6, 'MAURICIO', 'HERNANDEZ', 'mauhernandez@est.ups.edu.ec', 'cuenca', 'Vega Munoz', 'USER', 'Aczino_1920x1080.jpg', 'SI');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `facturacab`
--
ALTER TABLE `facturacab`
  ADD PRIMARY KEY (`fcab_id`);

--
-- Indices de la tabla `facturadet`
--
ALTER TABLE `facturadet`
  ADD PRIMARY KEY (`fdet_id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`ped_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`suc_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usu_id`),
  ADD UNIQUE KEY `user_email_uk` (`usu_mail`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `facturacab`
--
ALTER TABLE `facturacab`
  MODIFY `fcab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `facturadet`
--
ALTER TABLE `facturadet`
  MODIFY `fdet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `ped_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `suc_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
