-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2017 a las 02:44:15
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mika`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `idarticulo` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `imagen` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `material` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `subcategoria` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `etiqueta` varchar(80) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`idarticulo`, `idcategoria`, `nombre`, `descripcion`, `imagen`, `estado`, `tipo`, `material`, `subcategoria`, `etiqueta`) VALUES
(1, 4, 'Fleco de antelina doble cara', 'Fleco de antelina de grosor medio a doble cara, sin pie destacado y de 5cm de ancho. Este precioso fleco está disponible en varios colores. ', 'foto.png', 'Activo', 'doble cara', 'antelina', 'Fleco', 'abc'),
(3, 4, 'Cordón de Seda Trenzado', 'Cordón trenzado de seda o rayón mostaza con dorado y disponible en 6mm y 8mm de diámetro. ', 'ft.PNG', 'Activo', 'Trenzado', 'Seda', 'Cordones', 'abc'),
(4, 4, 'Lentejuelas Metalizado Cuve', 'lentejuelas en varios colores', '16147.jpg', 'Activo', 'Cuve', 'Metalizado', 'Lentejuelas', 'abcd..'),
(5, 2, 'Hilos de Perle -', 'Hilo de perlé 100% algodón egipcio;para trabajos de bordados gruesos y crochet o ganchillo', 'hl.jpg', 'Activo', '-', 'Perle', 'Hilos', 'Hilos Perle '),
(6, 2, 'Hilos - TREN', 'Son hilos de 100% algodon ...', 'IMG909914.JPG', 'Activo', 'TREN', '-', 'Hilos', 'Hilos Tren');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(256) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `condicion` tinyint(1) NOT NULL,
  `estado` varchar(12) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nombre`, `descripcion`, `condicion`, `estado`) VALUES
(1, 'Botones', 'Contiene todo lo relacionado...', 1, 'Inactivo'),
(2, 'Costura', 'Contiene todo lo relacionado..', 1, 'Activo'),
(3, 'Cintas', 'Tiene todo lo relacionado.....', 1, 'Activo'),
(4, 'Adornos', 'Tiene todo lo relacionado a...', 1, 'Activo'),
(5, 'Bordados', 'Tiene todo lo relacionado a..', 1, 'Activo'),
(6, 'Accesorios', 'Tiene todo lo relacionado a ...', 0, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `club`
--

CREATE TABLE `club` (
  `idclub` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `club`
--

INSERT INTO `club` (`idclub`, `nombre`, `estado`) VALUES
(1, '-', 'Activo'),
(2, 'Real Madrid', 'Activo'),
(3, 'FC Barcelona', 'Activo'),
(4, 'Bolognesi', 'Inactivo'),
(5, 'Milan', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credito`
--

CREATE TABLE `credito` (
  `idcredito` int(11) NOT NULL,
  `idventa` int(11) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `estado` varchar(12) NOT NULL,
  `resto` decimal(11,2) NOT NULL,
  `fecha_px` date NOT NULL,
  `idsucursal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credito_proveedor`
--

CREATE TABLE `credito_proveedor` (
  `idcredito` int(11) NOT NULL,
  `idcompra` int(11) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `estado` varchar(15) NOT NULL,
  `resto` decimal(11,2) NOT NULL,
  `fecha_px` date NOT NULL,
  `cant_letras` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `credito_proveedor`
--

INSERT INTO `credito_proveedor` (`idcredito`, `idcompra`, `total`, `estado`, `resto`, `fecha_px`, `cant_letras`) VALUES
(1, 2, '58.62', 'Pagado', '0.00', '0000-00-00', 3),
(2, 4, '233.64', 'Por Cobrar', '233.64', '2017-09-11', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_articulo`
--

CREATE TABLE `detalle_articulo` (
  `iddetalle_articulo` int(11) NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `codigo` varchar(15) NOT NULL,
  `tam_tx` varchar(30) NOT NULL,
  `tam_nro1` decimal(11,1) NOT NULL,
  `color` varchar(30) NOT NULL,
  `medida_stock_gn` varchar(11) NOT NULL,
  `num_stock_gn` int(11) NOT NULL,
  `medida_stock_det` varchar(11) NOT NULL,
  `stockmin` int(11) NOT NULL,
  `precio_normal_u` decimal(11,2) NOT NULL,
  `precio_det_u` decimal(11,2) NOT NULL,
  `precio_vol1` decimal(11,2) NOT NULL,
  `cantidad_vol1` int(11) NOT NULL,
  `num_stock_det` int(11) NOT NULL,
  `tam_nro2` decimal(11,1) NOT NULL,
  `UN1` varchar(3) NOT NULL,
  `UN2` varchar(3) NOT NULL,
  `etiqueta` varchar(70) NOT NULL,
  `estado` varchar(12) NOT NULL,
  `cantidad_vol2` int(11) NOT NULL,
  `cantidad_vol3` int(11) NOT NULL,
  `precio_vol2` decimal(11,2) NOT NULL,
  `precio_vol3` decimal(11,2) NOT NULL,
  `precio_compra` decimal(11,2) NOT NULL,
  `precio_real` decimal(11,2) NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_articulo`
--

INSERT INTO `detalle_articulo` (`iddetalle_articulo`, `idarticulo`, `codigo`, `tam_tx`, `tam_nro1`, `color`, `medida_stock_gn`, `num_stock_gn`, `medida_stock_det`, `stockmin`, `precio_normal_u`, `precio_det_u`, `precio_vol1`, `cantidad_vol1`, `num_stock_det`, `tam_nro2`, `UN1`, `UN2`, `etiqueta`, `estado`, `cantidad_vol2`, `cantidad_vol3`, `precio_vol2`, `precio_vol3`, `precio_compra`, `precio_real`, `imagen`) VALUES
(1, 1, 'FAD1', 'Ancho/Largo', '6.0', 'CRIMSON', 'Rollo', 6, 'm', 1, '80.00', '4.00', '3.00', 1, 4, '60.0', 'mm', 'm', 'Crimsom', 'Activo', 2, 5, '2.00', '1.50', '75.00', '25.96', 'fleco-de-antelina-de-5cm-granate.jpg'),
(2, 1, 'FAD2', 'Ancho/Largo', '6.0', 'CHOCOLATE ', 'Rollo', 6, 'm', 1, '80.00', '4.00', '3.00', 1, 0, '50.0', 'mm', 'm', 'Chocolate', 'Activo', 2, 5, '3.00', '2.50', '78.00', '81.00', 'fleco-de-antelina-de-5cm-camel.jpg'),
(3, 3, 'CST3', 'Ancho/Largo', '2.0', 'TEAL', 'Rollo', 3, 'm', 3, '80.00', '3.00', '2.00', 1, 0, '80.0', 'mm', 'm', 'Teal', 'Activo', 2, 4, '3.00', '2.00', '79.00', '93.22', 'cordon-grueso-seda-trenzado-8mm.jpg'),
(4, 3, 'CST4', 'Ancho/Largo', '6.0', 'BICOLOR17', 'Rollo', 3, 'm', 1, '60.00', '2.00', '1.00', 1, 0, '70.0', 'mm', 'm', 'Cafe y Dorado', 'Activo', 2, 3, '3.00', '2.50', '55.00', '0.00', 'cordon-seda-mostaza-trenzado-con-dorado.jpg'),
(5, 1, 'FAD5', 'Ancho/Largo', '7.0', 'LIGHTGRAY', 'Rollo', 3, 'm', 1, '60.00', '2.00', '1.50', 1, 0, '80.0', 'mm', 'm', 'Gris', 'Activo', 2, 3, '2.00', '1.60', '57.00', '67.26', 'fleco-de-antelina-de-10cm-azul-paris.jpg'),
(6, 1, 'FAD6', 'Ancho/Largo', '5.0', 'OLIVE', 'Rollo', 5, 'm', 1, '60.00', '3.00', '2.50', 1, 0, '60.0', 'mm', 'm', 'Olivo', 'Activo', 2, 5, '3.00', '1.80', '59.00', '69.62', 'fleco-de-antelina-de-5cm-verde-aceituna.jpg'),
(7, 4, 'LMC7', 'Numero/Peso', '6.0', 'PLATEADO', 'Bolsa', 42, 'gr', 3, '6.00', '2.00', '5.00', 12, 0, '500.0', 'N°', 'gr', 'Plateado', 'Activo', 20, 30, '4.00', '3.50', '4.50', '0.41', 'len1.png'),
(8, 4, 'LMC8', 'Numero/Peso', '6.0', 'CRIMSON', 'Bolsa', 1, 'gr', 3, '6.00', '2.00', '5.50', 12, 0, '500.0', 'N°', 'gr', 'Crimson', 'Activo', 20, 30, '5.00', '4.50', '4.40', '5.19', 'len2.png'),
(9, 4, 'LMC9', 'Numero/Peso', '6.0', 'BLUEVIOLET', 'Bolsa', 10, 'gr', 3, '6.00', '2.00', '5.50', 12, 0, '500.0', 'N°', 'gr', 'Azul-Violeta', 'Activo', 24, 30, '5.00', '4.00', '4.60', '0.00', 'len3.png'),
(10, 5, 'HP-10', 'Numero/Peso', '5.0', 'LAVENDER', 'Unidades', 21, '-', 10, '5.50', '0.00', '5.30', 12, 0, '10.0', 'N°', 'gr', 'Gris Claro', 'Activo', 20, 30, '5.20', '5.00', '8.00', '9.44', 'perle1.jpg'),
(11, 6, 'H-T11', 'Numero/Peso', '5.0', 'LAVENDER', 'Unidades', 18, '-', 3, '8.50', '0.00', '8.40', 12, 0, '100.0', 'N°', 'gr', 'Lavanda', 'Activo', 24, 50, '8.30', '8.20', '8.00', '9.44', ''),
(12, 6, 'H-T12', 'Numero/Peso', '5.0', 'CRIMSON', 'Unidades', 18, '-', 3, '8.50', '0.00', '8.40', 12, 0, '100.0', 'N°', 'gr', 'Crimson', 'Activo', 24, 50, '8.30', '8.20', '8.00', '0.69', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_credito`
--

CREATE TABLE `detalle_credito` (
  `iddetalle_credito` int(11) NOT NULL,
  `idcredito` int(11) NOT NULL,
  `fecha_pago` datetime NOT NULL,
  `monto` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_credito_proveedor`
--

CREATE TABLE `detalle_credito_proveedor` (
  `idcredito_detalle` int(11) NOT NULL,
  `fecha_pago` datetime NOT NULL,
  `monto` decimal(11,2) NOT NULL,
  `idcredito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_credito_proveedor`
--

INSERT INTO `detalle_credito_proveedor` (`idcredito_detalle`, `fecha_pago`, `monto`, `idcredito`) VALUES
(1, '2017-09-10 23:29:07', '0.00', 1),
(2, '2017-09-11 09:36:19', '20.00', 1),
(6, '2017-09-11 10:27:25', '10.00', 1),
(8, '2017-09-11 10:39:09', '28.62', 1),
(9, '2017-09-11 16:51:31', '0.00', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ingreso`
--

CREATE TABLE `detalle_ingreso` (
  `iddetalle_ingreso` int(11) NOT NULL,
  `idingreso` int(11) NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_compra` decimal(11,2) NOT NULL,
  `importe` decimal(11,2) NOT NULL,
  `tipo_igv` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `descuento` decimal(11,2) NOT NULL,
  `precio_real` decimal(11,2) NOT NULL,
  `cantidad_detalle` int(11) NOT NULL,
  `medida` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `precio_real_uni` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `detalle_ingreso`
--

INSERT INTO `detalle_ingreso` (`iddetalle_ingreso`, `idingreso`, `idarticulo`, `cantidad`, `precio_compra`, `importe`, `tipo_igv`, `descuento`, `precio_real`, `cantidad_detalle`, `medida`, `precio_real_uni`) VALUES
(1, 1, 11, 2, '8.00', '14.08', 'Gravada', '12.00', '8.31', 12, 'BX', '0.69'),
(2, 1, 12, 5, '8.00', '35.20', 'Gravada', '12.00', '8.31', 12, 'BX', '0.69'),
(3, 2, 7, 12, '4.50', '49.68', 'Gravada', '8.00', '4.89', 12, 'Bolsa', '0.41'),
(4, 3, 11, 2, '8.00', '14.08', 'Gravada', '12.00', '8.31', 12, 'BX', '0.69'),
(5, 3, 12, 5, '8.00', '35.20', 'Gravada', '12.00', '8.31', 12, 'BX', '0.69'),
(6, 4, 1, 3, '75.00', '198.00', 'Gravada', '12.00', '77.88', 3, 'Rollo', '25.96'),
(7, 5, 6, 1, '59.00', '59.00', 'Gravada', '0.00', '69.62', 1, 'Pieza', '69.62'),
(8, 6, 3, 1, '79.00', '79.00', 'Gravada', '0.00', '93.22', 1, 'Pieza', '93.22'),
(9, 7, 6, 1, '59.00', '59.00', 'Gravada', '0.00', '69.62', 1, 'Rollo', '69.62'),
(10, 7, 11, 1, '8.00', '8.00', 'Gravada', '0.00', '9.44', 1, 'BX', '9.44');

--
-- Disparadores `detalle_ingreso`
--
DELIMITER $$
CREATE TRIGGER `tr_updStockIngreso` AFTER INSERT ON `detalle_ingreso` FOR EACH ROW BEGIN
	UPDATE detalle_articulo SET num_stock_gn = num_stock_gn + NEW.cantidad_detalle 
	WHERE detalle_articulo.iddetalle_articulo = NEW.idarticulo;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `iddetalle_pedido` int(11) NOT NULL,
  `idnotificacion_pedido` int(11) NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `pp` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_proveedor`
--

CREATE TABLE `detalle_proveedor` (
  `iddetalle_proveedor` int(11) NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `idproveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_proveedor`
--

INSERT INTO `detalle_proveedor` (`iddetalle_proveedor`, `idarticulo`, `idproveedor`) VALUES
(3, 2, 2),
(4, 3, 2),
(6, 1, 2),
(7, 3, 4),
(8, 8, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_traslado`
--

CREATE TABLE `detalle_traslado` (
  `iddetalle_traslado` int(11) NOT NULL,
  `idnotificacion_tras` int(11) NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` decimal(11,2) NOT NULL,
  `cantidad_volumen1` int(11) NOT NULL,
  `precio_mayor1` decimal(11,2) NOT NULL,
  `cantidad_volumen2` int(11) NOT NULL,
  `precio_mayor2` decimal(11,2) NOT NULL,
  `precio_mayor3` decimal(11,2) NOT NULL,
  `cantidad_volumen3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `iddetalle_venta` int(11) NOT NULL,
  `idventa` int(11) NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descuento` decimal(11,2) NOT NULL,
  `precio_venta` decimal(11,2) NOT NULL,
  `subtotal` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Disparadores `detalle_venta`
--
DELIMITER $$
CREATE TRIGGER `tr_updStockVenta` AFTER INSERT ON `detalle_venta` FOR EACH ROW BEGIN
	UPDATE articulo SET stock = stock - NEW.cantidad 
	WHERE articulo.idarticulo = NEW.idarticulo;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edad`
--

CREATE TABLE `edad` (
  `idedad` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `estado` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `edad`
--

INSERT INTO `edad` (`idedad`, `nombre`, `estado`) VALUES
(1, 'Pieza', 'Activo'),
(2, 'Paquete', 'Activo'),
(3, 'Bolsa', 'Activo'),
(4, 'Caja', 'Activo'),
(5, 'Rollo', 'Activo'),
(6, 'Caja Pequeña', 'Activo'),
(7, 'Unidades', 'Activo'),
(8, 'BX', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso`
--

CREATE TABLE `ingreso` (
  `idingreso` int(11) NOT NULL,
  `idproveedor` int(11) NOT NULL,
  `tipo_comprobante` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `serie_comprobante` varchar(7) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `num_comprobante` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_hora` date NOT NULL,
  `impuesto` decimal(11,2) NOT NULL,
  `estado` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo_pago` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `subtotal` decimal(11,2) NOT NULL,
  `nota` text COLLATE utf8_spanish2_ci NOT NULL,
  `exonerado` decimal(11,2) NOT NULL,
  `inafecto` decimal(11,2) NOT NULL,
  `gratuito` decimal(11,2) NOT NULL,
  `descuento` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ingreso`
--

INSERT INTO `ingreso` (`idingreso`, `idproveedor`, `tipo_comprobante`, `serie_comprobante`, `num_comprobante`, `fecha_hora`, `impuesto`, `estado`, `tipo_pago`, `total`, `subtotal`, `nota`, `exonerado`, `inafecto`, `gratuito`, `descuento`) VALUES
(1, 2, 'Factura', 'F067', '0000578', '2017-08-10', '8.87', 'Aceptado', 'Contado', '58.15', '56.00', 'ninguna en particular', '0.00', '0.00', '0.00', '6.72'),
(2, 2, 'Factura', 'F054', '0000567', '2017-05-10', '8.94', 'Pagado', 'Crédito', '58.62', '54.00', '', '0.00', '0.00', '0.00', '4.32'),
(3, 2, 'Factura', '0001', 'F0056', '2017-09-11', '8.87', 'Aceptado', 'Contado', '58.15', '56.00', '', '0.00', '0.00', '0.00', '6.72'),
(4, 3, 'Factura', '00001', 'F00090', '2017-09-11', '35.64', 'Por Pagar', 'Crédito', '233.64', '225.00', 'Ninguna en Particular', '0.00', '0.00', '0.00', '27.00'),
(5, 2, 'Factura', '0003', '98793', '2017-09-18', '10.62', 'Aceptado', 'Contado', '69.62', '59.00', '', '0.00', '0.00', '0.00', '0.00'),
(6, 4, 'Boleta', 'FF11', '00056', '2017-09-20', '14.22', 'Aceptado', 'Contado', '93.22', '79.00', '', '0.00', '0.00', '0.00', '0.00'),
(7, 2, 'Boleta', 'FF014', '00045', '2017-09-20', '12.06', 'Aceptado', 'Contado', '148.68', '67.00', '', '0.00', '0.00', '0.00', '0.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `idmarca` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`idmarca`, `nombre`, `estado`) VALUES
(1, 'Athenas', 'Activo'),
(2, 'Santa Ana', 'Activo'),
(3, 'Peru', 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `idmaterial` int(11) NOT NULL,
  `idsubcategoria` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`idmaterial`, `idsubcategoria`, `nombre`, `estado`) VALUES
(1, 3, 'Acrílicos', 'Activo'),
(3, 3, 'Impliel', 'Activo'),
(4, 3, 'Seda', 'Activo'),
(5, 3, 'Elastico', 'Activo'),
(6, 3, 'Metalizados', 'Activo'),
(7, 3, 'Simil', 'Activo'),
(8, 2, 'Plumas', 'Activo'),
(9, 2, 'Guipur', 'Activo'),
(10, 2, 'Algodón-Acrílico', 'Activo'),
(11, 2, 'Metalizados', 'Activo'),
(12, 4, 'Plastico', 'Activo'),
(13, 4, 'Elástico', 'Activo'),
(14, 4, 'Termoadhesivo', 'Activo'),
(15, 6, 'Metalizado', 'Activo'),
(16, 19, 'Perle', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento`
--

CREATE TABLE `movimiento` (
  `idmovimiento` int(11) NOT NULL,
  `tipo_movimiento` varchar(50) NOT NULL,
  `motivo` varchar(40) NOT NULL,
  `idsucursal` int(11) NOT NULL,
  `nota` text NOT NULL,
  `estado` varchar(12) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_mov` datetime NOT NULL,
  `idarticulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `movimiento`
--

INSERT INTO `movimiento` (`idmovimiento`, `tipo_movimiento`, `motivo`, `idsucursal`, `nota`, `estado`, `cantidad`, `fecha_mov`, `idarticulo`) VALUES
(1, 'Salida', 'Perdidas', 3, 'Se rompieron .... ', 'Activo', 3, '2017-08-24 09:21:25', 7),
(2, 'Entrada', 'Compra', 3, 'Un cliente pidio 22.. ', 'Activo', 2, '2017-08-24 09:30:58', 7),
(3, 'Entrada', 'Inventario Inicial', 3, '-', 'Activo', 10, '2017-08-24 10:18:08', 9),
(4, 'Salida', 'Devolucion al Proveedor', 3, 'por ,mgrhjg', 'Activo', 4, '2017-08-24 19:38:31', 7),
(5, 'Entrada', 'Inventario Inicial', 3, '-', 'Activo', 20, '2017-09-06 06:43:04', 10),
(6, 'Entrada', 'Inventario Inicial', 3, '-', 'Activo', 7, '2017-09-07 08:46:02', 11),
(7, 'Entrada', 'Inventario Inicial', 3, '-', 'Activo', 10, '2017-09-07 08:48:54', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion_pedido`
--

CREATE TABLE `notificacion_pedido` (
  `idnotificacion_pedido` int(11) NOT NULL,
  `idemisor` int(11) NOT NULL,
  `idreceptor` int(11) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `nota` text NOT NULL,
  `estado` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion_traslado`
--

CREATE TABLE `notificacion_traslado` (
  `idemisor` int(11) NOT NULL,
  `idreceptor` int(11) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `nota` text NOT NULL,
  `estado` varchar(12) NOT NULL,
  `nuevo` tinyint(1) NOT NULL,
  `idnotificacion_traslado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL,
  `tipo_persona` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo_documento` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `num_documento` varchar(15) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `direccion` varchar(70) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ruc` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `idsucursal` int(11) NOT NULL,
  `estado` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `cuenta` varchar(25) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `tipo_persona`, `nombre`, `tipo_documento`, `num_documento`, `direccion`, `telefono`, `email`, `ruc`, `idsucursal`, `estado`, `cuenta`) VALUES
(2, 'Proveedor', 'Sonia Rosales', NULL, '47889954', 'Av. los Robles #344', '(052)-5678', 'rosales123@hotmail.com', '234543234556', 3, 'Activo', '45897765544'),
(3, 'Proveedor', 'Nino Arisawa', NULL, '56778894', 'Av. Los Geraneos #578', '(063) 67890', 'nino@gmail.com', '456777898786', 3, 'Activo', '4567654567888'),
(4, 'Proveedor', 'Alejandro Vasquez ', NULL, '67889945', 'Av. los Granados #56', '(054)-898765', 'alejo@gmail.com', '561341758', 3, 'Activo', '5688-8736-765446'),
(5, 'Proveedor', 'Carmen Soto', NULL, '78990067', 'Pasj. los Olivos #456', '(054)-78781', 'soto@gmail.com', '76218328873', 3, 'Activo', '536412465329');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

CREATE TABLE `subcategoria` (
  `idsubcategoria` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `estado` varchar(20) NOT NULL,
  `idcategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subcategoria`
--

INSERT INTO `subcategoria` (`idsubcategoria`, `nombre`, `estado`, `idcategoria`) VALUES
(1, 'Borlas', 'Activo', 4),
(2, 'Fleco', 'Activo', 4),
(3, 'Cordón', 'Activo', 4),
(4, 'Strass', 'Activo', 4),
(5, 'Alamares', 'Activo', 4),
(6, 'Lentejuelas', 'Activo', 4),
(7, 'Cadenas', 'Activo', 4),
(8, 'Carnaval', 'Activo', 1),
(9, 'Fantasía', 'Activo', 1),
(10, 'Clasico', 'Activo', 1),
(11, 'Cortina', 'Activo', 3),
(12, 'Ondulina', 'Activo', 3),
(13, 'Velcro', 'Activo', 3),
(14, 'Plisados-Fruncidos', 'Activo', 3),
(15, 'Valenciene', 'Activo', 5),
(16, 'Guipur', 'Activo', 5),
(17, 'Puntillas-Bolillos', 'Activo', 5),
(18, 'Tira Bordada', 'Activo', 5),
(19, 'Hilos', 'Activo', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `idsucursal` int(11) NOT NULL,
  `razon` varchar(70) NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `ruc` varchar(12) NOT NULL,
  `representante` varchar(60) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `logo` varchar(20) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `moneda` varchar(10) NOT NULL,
  `num_maquina` varchar(20) NOT NULL,
  `tipo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`idsucursal`, `razon`, `direccion`, `ruc`, `representante`, `telefono`, `email`, `logo`, `estado`, `moneda`, `num_maquina`, `tipo`) VALUES
(1, 'Sucursal-Central', 'Av. Leguia N° 1050', '34567543234', 'Nadia Choque Rivera', '966266600', 'nadia_14@hotmai.com', '', 'Activo', 'S/.', '', 'Sucursal'),
(2, 'Sucursal-1', 'CC. Tacna Centro A8-A9', '5678766789', 'Mirian Choque Rivera', '996009887', 'mirian_123@gmail.com', '', 'Activo', 'S/.', '', 'Sucursal'),
(3, 'Almacen-Administración', 'Av. Leguia N° 1050', '5679654', 'Nadia Choque Rivera', '34567897', 'nadia_14@hotmai.com', '', 'Activo', 'S/.', '', 'Almacen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talla`
--

CREATE TABLE `talla` (
  `idtalla` int(11) NOT NULL,
  `idsubcategoria` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `talla`
--

INSERT INTO `talla` (`idtalla`, `idsubcategoria`, `nombre`, `estado`) VALUES
(1, 1, 'XL', 'Activo'),
(2, 1, 'L', 'Activo'),
(3, 1, 'M', 'Activo'),
(4, 1, '910A', 'Activo'),
(5, 2, 'US1', 'Activo'),
(6, 2, 'US2', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `idtipo` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `idsubcategoria` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`idtipo`, `nombre`, `idsubcategoria`, `estado`) VALUES
(1, 'Simple', 2, 'Activo'),
(2, 'Cadena', 2, 'Inactivo'),
(3, 'Rizado', 2, 'Activo'),
(4, 'Madroño', 2, 'Activo'),
(5, 'abalorios', 2, 'Activo'),
(6, 'Retorcido', 3, 'Activo'),
(7, 'Trenzado', 3, 'Activo'),
(8, 'Brillo', 3, 'Activo'),
(9, 'Con base', 4, 'Activo'),
(10, 'Plano', 3, 'Activo'),
(11, 'Cenefe', 4, 'Activo'),
(12, 'Rectangulos', 4, 'Activo'),
(13, 'Flecha', 4, 'Activo'),
(14, 'Dibujo de Ondas', 4, 'Activo'),
(15, 'prue', 5, 'Activo'),
(16, 'Cuve', 6, 'Activo'),
(17, 'TREN', 19, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_movimiento`
--

CREATE TABLE `tipo_movimiento` (
  `idtipo_movimiento` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tipo_mov` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_movimiento`
--

INSERT INTO `tipo_movimiento` (`idtipo_movimiento`, `nombre`, `tipo_mov`) VALUES
(1, 'Devolucion del Cliente', 'Salida'),
(2, 'Ajuste de entrada', 'Entrada'),
(3, 'Compra', 'Entrada'),
(4, 'Venta', 'Salida'),
(5, 'Ajuste de Salida', 'Salida'),
(6, 'Devolucion al Proveedor', 'Salida'),
(7, 'Perdidas', 'Salida'),
(8, 'Trasferencia a Sucursal', 'Salida'),
(9, 'Transferencia de Sucursal', 'Entrada'),
(10, 'Reparación', 'Salida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `traslado`
--

CREATE TABLE `traslado` (
  `idarticulo` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `estado` varchar(11) NOT NULL,
  `stockmin` int(11) NOT NULL,
  `precio_venta` decimal(11,2) NOT NULL,
  `cantidad_volumen1` int(11) NOT NULL,
  `precio_mayor1` decimal(11,2) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `idsucursal` int(11) NOT NULL,
  `idtraslado` int(11) NOT NULL,
  `precio_mayor2` decimal(11,2) NOT NULL,
  `precio_mayor3` decimal(11,2) NOT NULL,
  `cantidad_volumen2` int(11) NOT NULL,
  `cantidad_volumen3` int(11) NOT NULL,
  `cantidad_detalle` decimal(11,2) NOT NULL,
  `precio_detalle` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `traslado`
--

INSERT INTO `traslado` (`idarticulo`, `stock`, `estado`, `stockmin`, `precio_venta`, `cantidad_volumen1`, `precio_mayor1`, `fecha_hora`, `idsucursal`, `idtraslado`, `precio_mayor2`, `precio_mayor3`, `cantidad_volumen2`, `cantidad_volumen3`, `cantidad_detalle`, `precio_detalle`) VALUES
(7, 7, 'Activo', 2, '6.00', 12, '5.90', '2017-09-19 00:00:00', 2, 1, '5.80', '5.70', 20, 50, '0.00', '1.00'),
(10, 120, 'Activo', 6, '5.50', 12, '5.30', '2017-10-12 08:54:09', 2, 2, '5.20', '5.00', 20, 30, '0.00', '0.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dni` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `s_actual` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rol_actual` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_s` int(11) DEFAULT NULL,
  `m_almacen` tinyint(1) DEFAULT NULL,
  `m_compras` tinyint(1) DEFAULT NULL,
  `m_traslado` tinyint(1) DEFAULT NULL,
  `m_pedido` tinyint(1) DEFAULT NULL,
  `m_movimiento` tinyint(1) DEFAULT NULL,
  `m_caja` tinyint(1) DEFAULT NULL,
  `m_kardex` tinyint(1) DEFAULT NULL,
  `m_venta` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `dni`, `direccion`, `telefono`, `foto`, `estado`, `s_actual`, `rol_actual`, `id_s`, `m_almacen`, `m_compras`, `m_traslado`, `m_pedido`, `m_movimiento`, `m_caja`, `m_kardex`, `m_venta`) VALUES
(1, 'Yovana Velasquez', 'yovana.otaku@gmail.com', '$2y$10$iwehfATjzcbq8r0mpnAY7uJJcpx0E9yM8t36cWN2fCgIo/t2rMhI.', 'Kju4c7qR4WdpIV7609R8S77zO4wmyLFEFU5udj1nUq7TAMG3JgLyGULLfmcM', '2016-10-24 21:33:02', '2017-08-24 20:10:19', '4799332', 'Av. los Robles #452', '996008391', NULL, 'Activo', 'Sucursal', 'Administrador', 2, 0, 0, 1, 1, 1, 1, 1, 1),
(3, 'Luis', 'luis.pad7@gmail.com', '$2y$10$aNkfXGczdX/sYxHfH2vZb.MrZyJA/xFkHiizaX7Sddl7SUQoaAEpe', NULL, '2016-10-25 00:37:20', '2016-10-25 00:37:20', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_sucursal`
--

CREATE TABLE `user_sucursal` (
  `iduser_sucursal` int(11) NOT NULL,
  `iduser` int(10) UNSIGNED NOT NULL,
  `idsucursal` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` varchar(20) NOT NULL,
  `tipo_user` varchar(20) NOT NULL,
  `m_almacen` tinyint(1) NOT NULL,
  `m_compras` tinyint(1) NOT NULL,
  `m_traslado` tinyint(1) NOT NULL,
  `m_pedido` tinyint(1) NOT NULL,
  `m_movimiento` tinyint(1) NOT NULL,
  `m_caja` tinyint(1) NOT NULL,
  `m_kardex` tinyint(1) NOT NULL,
  `m_venta` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_sucursal`
--

INSERT INTO `user_sucursal` (`iduser_sucursal`, `iduser`, `idsucursal`, `fecha`, `estado`, `tipo_user`, `m_almacen`, `m_compras`, `m_traslado`, `m_pedido`, `m_movimiento`, `m_caja`, `m_kardex`, `m_venta`) VALUES
(1, 1, 1, '2017-08-11 00:00:00', 'Activo', 'Administrador', 0, 0, 1, 1, 1, 1, 1, 1),
(2, 1, 2, '2017-08-11 00:00:00', 'Activo', 'Administrador', 0, 0, 1, 1, 1, 1, 1, 1),
(3, 1, 3, '2017-08-13 00:00:00', 'Activo', 'Administrador', 1, 1, 1, 1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idventa` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `tipo_comprobante` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `serie_comprobante` varchar(7) COLLATE utf8_spanish2_ci NOT NULL,
  `num_comprobante` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `impuesto` decimal(4,2) NOT NULL,
  `total_venta` decimal(11,2) NOT NULL,
  `estado` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`idarticulo`),
  ADD KEY `fk_articulo_categoria_idx` (`idcategoria`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`idclub`);

--
-- Indices de la tabla `credito`
--
ALTER TABLE `credito`
  ADD PRIMARY KEY (`idcredito`),
  ADD KEY `idventa` (`idventa`),
  ADD KEY `idsucursal` (`idsucursal`);

--
-- Indices de la tabla `credito_proveedor`
--
ALTER TABLE `credito_proveedor`
  ADD PRIMARY KEY (`idcredito`),
  ADD KEY `idcompra` (`idcompra`);

--
-- Indices de la tabla `detalle_articulo`
--
ALTER TABLE `detalle_articulo`
  ADD PRIMARY KEY (`iddetalle_articulo`),
  ADD KEY `idarticulo` (`idarticulo`);

--
-- Indices de la tabla `detalle_credito`
--
ALTER TABLE `detalle_credito`
  ADD PRIMARY KEY (`iddetalle_credito`),
  ADD KEY `idcredito` (`idcredito`);

--
-- Indices de la tabla `detalle_credito_proveedor`
--
ALTER TABLE `detalle_credito_proveedor`
  ADD PRIMARY KEY (`idcredito_detalle`),
  ADD KEY `idcredito` (`idcredito`);

--
-- Indices de la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  ADD PRIMARY KEY (`iddetalle_ingreso`),
  ADD KEY `fk_detalle_ingreso_idx` (`idingreso`),
  ADD KEY `fk_detalle_ingreso_articulo_idx` (`idarticulo`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`iddetalle_pedido`),
  ADD KEY `idnotificacion_pedido` (`idnotificacion_pedido`),
  ADD KEY `idarticulo` (`idarticulo`);

--
-- Indices de la tabla `detalle_proveedor`
--
ALTER TABLE `detalle_proveedor`
  ADD PRIMARY KEY (`iddetalle_proveedor`),
  ADD KEY `idarticulo` (`idarticulo`),
  ADD KEY `idproveedor` (`idproveedor`);

--
-- Indices de la tabla `detalle_traslado`
--
ALTER TABLE `detalle_traslado`
  ADD PRIMARY KEY (`iddetalle_traslado`),
  ADD KEY `idnotificacion_tras` (`idnotificacion_tras`),
  ADD KEY `idarticulo` (`idarticulo`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`iddetalle_venta`),
  ADD KEY `fk_detalle_venta_articulo_idx` (`idarticulo`),
  ADD KEY `fk_detalle_venta_idx` (`idventa`);

--
-- Indices de la tabla `edad`
--
ALTER TABLE `edad`
  ADD PRIMARY KEY (`idedad`);

--
-- Indices de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD PRIMARY KEY (`idingreso`),
  ADD KEY `fk_ingreso_persona_idx` (`idproveedor`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`idmarca`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`idmaterial`),
  ADD KEY `idsubcategoria` (`idsubcategoria`);

--
-- Indices de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD PRIMARY KEY (`idmovimiento`),
  ADD KEY `idsucursal` (`idsucursal`),
  ADD KEY `idarticulo` (`idarticulo`);

--
-- Indices de la tabla `notificacion_pedido`
--
ALTER TABLE `notificacion_pedido`
  ADD PRIMARY KEY (`idnotificacion_pedido`),
  ADD KEY `idemisor` (`idemisor`),
  ADD KEY `idreceptor` (`idreceptor`);

--
-- Indices de la tabla `notificacion_traslado`
--
ALTER TABLE `notificacion_traslado`
  ADD PRIMARY KEY (`idnotificacion_traslado`),
  ADD KEY `idemisor` (`idemisor`),
  ADD KEY `idreceptor` (`idreceptor`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`),
  ADD KEY `idsucursal` (`idsucursal`);

--
-- Indices de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`idsubcategoria`),
  ADD KEY `idcategoria` (`idcategoria`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`idsucursal`);

--
-- Indices de la tabla `talla`
--
ALTER TABLE `talla`
  ADD PRIMARY KEY (`idtalla`),
  ADD KEY `idcategoria` (`idsubcategoria`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`idtipo`),
  ADD KEY `idsubcategoria` (`idsubcategoria`);

--
-- Indices de la tabla `tipo_movimiento`
--
ALTER TABLE `tipo_movimiento`
  ADD PRIMARY KEY (`idtipo_movimiento`);

--
-- Indices de la tabla `traslado`
--
ALTER TABLE `traslado`
  ADD PRIMARY KEY (`idtraslado`),
  ADD KEY `idarticulo` (`idarticulo`),
  ADD KEY `idsucursal` (`idsucursal`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `user_sucursal`
--
ALTER TABLE `user_sucursal`
  ADD PRIMARY KEY (`iduser_sucursal`),
  ADD KEY `iduser` (`iduser`),
  ADD KEY `idsucursal` (`idsucursal`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idventa`),
  ADD KEY `fk_venta_cliente_idx` (`idcliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `idarticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `club`
--
ALTER TABLE `club`
  MODIFY `idclub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `credito`
--
ALTER TABLE `credito`
  MODIFY `idcredito` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `credito_proveedor`
--
ALTER TABLE `credito_proveedor`
  MODIFY `idcredito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `detalle_articulo`
--
ALTER TABLE `detalle_articulo`
  MODIFY `iddetalle_articulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `detalle_credito`
--
ALTER TABLE `detalle_credito`
  MODIFY `iddetalle_credito` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `detalle_credito_proveedor`
--
ALTER TABLE `detalle_credito_proveedor`
  MODIFY `idcredito_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  MODIFY `iddetalle_ingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `iddetalle_pedido` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `detalle_proveedor`
--
ALTER TABLE `detalle_proveedor`
  MODIFY `iddetalle_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `detalle_traslado`
--
ALTER TABLE `detalle_traslado`
  MODIFY `iddetalle_traslado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `iddetalle_venta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `edad`
--
ALTER TABLE `edad`
  MODIFY `idedad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  MODIFY `idingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `idmarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `idmaterial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  MODIFY `idmovimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `notificacion_pedido`
--
ALTER TABLE `notificacion_pedido`
  MODIFY `idnotificacion_pedido` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `notificacion_traslado`
--
ALTER TABLE `notificacion_traslado`
  MODIFY `idnotificacion_traslado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `idsubcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `idsucursal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `talla`
--
ALTER TABLE `talla`
  MODIFY `idtalla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `idtipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `tipo_movimiento`
--
ALTER TABLE `tipo_movimiento`
  MODIFY `idtipo_movimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `traslado`
--
ALTER TABLE `traslado`
  MODIFY `idtraslado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `user_sucursal`
--
ALTER TABLE `user_sucursal`
  MODIFY `iduser_sucursal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `fk_articulo_categoria` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `credito`
--
ALTER TABLE `credito`
  ADD CONSTRAINT `credito_ibfk_1` FOREIGN KEY (`idventa`) REFERENCES `venta` (`idventa`) ON UPDATE CASCADE,
  ADD CONSTRAINT `credito_ibfk_2` FOREIGN KEY (`idsucursal`) REFERENCES `sucursal` (`idsucursal`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `credito_proveedor`
--
ALTER TABLE `credito_proveedor`
  ADD CONSTRAINT `credito_proveedor_ibfk_1` FOREIGN KEY (`idcompra`) REFERENCES `ingreso` (`idingreso`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_articulo`
--
ALTER TABLE `detalle_articulo`
  ADD CONSTRAINT `detalle_articulo_ibfk_1` FOREIGN KEY (`idarticulo`) REFERENCES `articulo` (`idarticulo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_credito`
--
ALTER TABLE `detalle_credito`
  ADD CONSTRAINT `detalle_credito_ibfk_1` FOREIGN KEY (`idcredito`) REFERENCES `credito` (`idcredito`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_credito_proveedor`
--
ALTER TABLE `detalle_credito_proveedor`
  ADD CONSTRAINT `detalle_credito_proveedor_ibfk_1` FOREIGN KEY (`idcredito`) REFERENCES `credito_proveedor` (`idcredito`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  ADD CONSTRAINT `detalle_ingreso_ibfk_1` FOREIGN KEY (`idarticulo`) REFERENCES `detalle_articulo` (`iddetalle_articulo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detalle_ingreso` FOREIGN KEY (`idingreso`) REFERENCES `ingreso` (`idingreso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `detalle_pedido_ibfk_1` FOREIGN KEY (`idnotificacion_pedido`) REFERENCES `notificacion_pedido` (`idnotificacion_pedido`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_pedido_ibfk_2` FOREIGN KEY (`idarticulo`) REFERENCES `articulo` (`idarticulo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_proveedor`
--
ALTER TABLE `detalle_proveedor`
  ADD CONSTRAINT `detalle_proveedor_ibfk_2` FOREIGN KEY (`idproveedor`) REFERENCES `persona` (`idpersona`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_proveedor_ibfk_3` FOREIGN KEY (`idarticulo`) REFERENCES `detalle_articulo` (`iddetalle_articulo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_traslado`
--
ALTER TABLE `detalle_traslado`
  ADD CONSTRAINT `detalle_traslado_ibfk_1` FOREIGN KEY (`idnotificacion_tras`) REFERENCES `notificacion_traslado` (`idnotificacion_traslado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_traslado_ibfk_2` FOREIGN KEY (`idarticulo`) REFERENCES `detalle_articulo` (`iddetalle_articulo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `fk_detalle_venta` FOREIGN KEY (`idventa`) REFERENCES `venta` (`idventa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_venta_articulo` FOREIGN KEY (`idarticulo`) REFERENCES `articulo` (`idarticulo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD CONSTRAINT `fk_ingreso_persona` FOREIGN KEY (`idproveedor`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `material_ibfk_1` FOREIGN KEY (`idsubcategoria`) REFERENCES `subcategoria` (`idsubcategoria`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD CONSTRAINT `movimiento_ibfk_1` FOREIGN KEY (`idarticulo`) REFERENCES `detalle_articulo` (`iddetalle_articulo`) ON DELETE CASCADE;

--
-- Filtros para la tabla `notificacion_pedido`
--
ALTER TABLE `notificacion_pedido`
  ADD CONSTRAINT `notificacion_pedido_ibfk_1` FOREIGN KEY (`idemisor`) REFERENCES `sucursal` (`idsucursal`) ON UPDATE CASCADE,
  ADD CONSTRAINT `notificacion_pedido_ibfk_2` FOREIGN KEY (`idreceptor`) REFERENCES `sucursal` (`idsucursal`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `notificacion_traslado`
--
ALTER TABLE `notificacion_traslado`
  ADD CONSTRAINT `notificacion_traslado_ibfk_1` FOREIGN KEY (`idemisor`) REFERENCES `sucursal` (`idsucursal`) ON UPDATE CASCADE,
  ADD CONSTRAINT `notificacion_traslado_ibfk_2` FOREIGN KEY (`idreceptor`) REFERENCES `sucursal` (`idsucursal`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD CONSTRAINT `subcategoria_ibfk_1` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `talla`
--
ALTER TABLE `talla`
  ADD CONSTRAINT `talla_ibfk_1` FOREIGN KEY (`idsubcategoria`) REFERENCES `subcategoria` (`idsubcategoria`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD CONSTRAINT `tipo_ibfk_1` FOREIGN KEY (`idsubcategoria`) REFERENCES `subcategoria` (`idsubcategoria`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `traslado`
--
ALTER TABLE `traslado`
  ADD CONSTRAINT `traslado_ibfk_2` FOREIGN KEY (`idsucursal`) REFERENCES `sucursal` (`idsucursal`) ON UPDATE CASCADE,
  ADD CONSTRAINT `traslado_ibfk_3` FOREIGN KEY (`idarticulo`) REFERENCES `detalle_articulo` (`iddetalle_articulo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `user_sucursal`
--
ALTER TABLE `user_sucursal`
  ADD CONSTRAINT `user_sucursal_ibfk_1` FOREIGN KEY (`idsucursal`) REFERENCES `sucursal` (`idsucursal`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_sucursal_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `fk_venta_cliente` FOREIGN KEY (`idcliente`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
