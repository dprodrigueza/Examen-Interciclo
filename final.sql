-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2019 a las 22:49:50
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
  `fcab_fecha` date NOT NULL,
  `fcab_direccion` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `fcab_cedula` varchar(13) COLLATE latin1_spanish_ci NOT NULL,
  `suc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `facturacab`
--

INSERT INTO `facturacab` (`fcab_id`, `fcab_fecha`, `fcab_direccion`, `fcab_cedula`, `suc_id`) VALUES
(1, '2019-05-24', 'CULEBRILLAS Y MANTENSE', '0106630999', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturadet`
--

CREATE TABLE `facturadet` (
  `fdet_id` int(11) NOT NULL,
  `fdet_cantidad` int(11) NOT NULL,
  `fdet_total` decimal(10,2) NOT NULL,
  `fcab_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `facturadet`
--

INSERT INTO `facturadet` (`fdet_id`, `fdet_cantidad`, `fdet_total`, `fcab_id`, `prod_id`) VALUES
(1, 1, '1250.99', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `ped_id` int(11) NOT NULL,
  `ped_estado` text COLLATE latin1_spanish_ci NOT NULL,
  `ped_fechaEmi` date NOT NULL,
  `ped_fechaEnv` date NOT NULL,
  `ped_fechaFin` date NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `fac_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`ped_id`, `ped_estado`, `ped_fechaEmi`, `ped_fechaEnv`, `ped_fechaFin`, `cod_usuario`, `fac_id`) VALUES
(1, 'CREADO', '2019-05-24', '0000-00-00', '0000-00-00', 1, 1);

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
  `prod_foto` varchar(200) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`prod_id`, `prod_descripcion`, `prod_caracteristica`, `prod_precio`, `prod_stock`, `prod_foto`) VALUES
(1, 'MACBOOK AIR', 'Macbook Air Retina, Macbook Pro, Macbook 12 Nuevas Selladas', '1250.99', 20, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `suc_id` int(11) NOT NULL,
  `suc_sucursal` varchar(250) COLLATE latin1_spanish_ci NOT NULL,
  `suc_ciudad` varchar(100) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`suc_id`, `suc_sucursal`, `suc_ciudad`) VALUES
(1, 'TOTORACOCHA', 'CUENCA');

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
(3, 'GABRIEL', 'CHUCHUCA', 'gchuchuca@est.ups.edu.ec', 'cuenca', '', 'USER', ''),
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
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usu_id`),
  ADD UNIQUE KEY `user_email_uk` (`usu_mail`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
