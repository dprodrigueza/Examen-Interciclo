-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2019 a las 02:40:26
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
  `suc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

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
(8, 4, 3, 1, 'CREADO'),
(11, 10, 3, 1, 'CREADO'),
(19, 4, 4, 1, 'CONFIRMADO'),
(20, 8, 4, 1, 'CREADO'),
(25, 8, 3, 1, 'CREADO'),
(30, 6, 3, 3, 'CREADO'),
(31, 10, 4, 1, 'CREADO');

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
(4, 'PC', 'PC DE ESCRITORIO I3 8VA', '1200.30', 30, 'juegos.jpg', ''),
(6, 'MEMORIA', 'MEMORIA KINGSTON 120 GB', '150.00', 89, 'torneosp.jpg', ''),
(7, 'COMPUTADORA', 'ACER PREDATOR HELIOS 300 GAMING LAPTOP PC, 15.6', '1700.00', 5, 'acerpredator.jpg', 'SI'),
(8, 'COMPUTADORA', 'ACER PREDATOR HELIOS 300 GAMING LAPTOP PC, 15.6\"', '1750.00', 6, 'acerpredator.jpg', 'NO'),
(9, 'COMPUTADORA', 'APPLE MACBOOK PRO (13\" RETINA, 2.3GHZ DUAL-CORE INTEL CORE I5, 8GB RAM, 128GB SSD)', '2000.00', 7, 'macbook.jpg', 'NO'),
(10, 'PC', 'CYBERPOWERPC GAMER XTREME VR GXIVR8060A7 GAMING PC (INTEL I5-9400F 2.9GHZ 8GB DDR4)', '1800.00', 4, 'cyberpower.jpg', 'NO'),
(11, 'COMPUTADORA', 'ASUS ROG ZEPHYRUS S ULTRA SLIM GAMING LAPTOP, 15.6â€ 144HZ IPS TYPE FHD, GEFORCE RTX 2070, INTEL CORE I7-9750H, 16GB DDR4', '1900.00', 5, 'asus.jpg', 'NO'),
(12, '', '', '0.00', 0, '', 'NO'),
(13, '', '', '0.00', 0, '', 'NO'),
(14, '', '', '0.00', 0, '', 'NO'),
(15, '', '', '0.00', 0, '', 'NO');

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
(1, 'PRINCIPAL', 'AV LOJA Y AMERICAS', 'cuenca', ''),
(2, 'MATRIZ QUITO', 'AV PRINCIPAL Y 24 DE MAYO', 'quito', ''),
(3, 'MATRIZ GUAYAQUIL', 'AV 13 DE ABRIL Y CENTRO', 'guayaquil', 'SI'),
(4, 'SUCURSAL GUAYAQUIL', 'AV. SNA BORONDON', 'GUAYAQUIL', 'NO');

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
  `usu_foto` varchar(200) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usu_id`, `usu_nombre`, `usu_apellido`, `usu_mail`, `usu_constrasena`, `usu_direccion`, `usu_rol`, `usu_foto`) VALUES
(1, 'DIEGO', 'RODRIGUEZ', 'drodrigueza@est.ups.edu.ec', 'cuenca', '', 'ADMIN', ''),
(2, 'MARCO', 'COBOS', 'mcobosf@est.ups.edu.ec', 'cuenca', '', 'USER', ''),
(3, 'GABRIEL', 'CHUCHUCA', 'gchuchuca@est.ups.edu.ec', 'cuenca', 'Pasaje Nicanor Cobos ', 'USER', ''),
(4, 'MALKI', 'YUPANKI', 'myupanki@est.ups.edu.ec', 'cuenca', '', 'USER', ''),
(5, 'ELISABETH', 'ALVARADO', 'ealvarado@est.ups.edu.ec', 'cuenca', '', 'USER', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `facturacab`
--
ALTER TABLE `facturacab`
  ADD PRIMARY KEY (`fcab_id`);

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
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `ped_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `suc_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
