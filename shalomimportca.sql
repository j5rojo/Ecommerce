-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2016 a las 13:45:11
-- Versión del servidor: 10.0.17-MariaDB
-- Versión de PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `shalomimportca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_categorias`
--

CREATE TABLE `tbl_categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(50) NOT NULL,
  `tipo_categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_categorias`
--

INSERT INTO `tbl_categorias` (`id_categoria`, `nombre_categoria`, `tipo_categoria`) VALUES
(1, 'bolsos', 'bolsos'),
(2, 'carteras', 'bolsos'),
(3, 'zapatos bajos', 'zapatos'),
(4, 'tacones', 'zapatos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ordenpedidos`
--

CREATE TABLE `tbl_ordenpedidos` (
  `id_ordenPedido` int(11) NOT NULL,
  `codigo_pedido` varchar(255) NOT NULL,
  `status_pedido` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pedidos`
--

CREATE TABLE `tbl_pedidos` (
  `codigo_pedido` int(255) NOT NULL,
  `date_pedido` datetime NOT NULL,
  `usuario_pedido` int(11) NOT NULL,
  `producto_pedido` int(11) NOT NULL,
  `cantidadProducto_pedido` int(11) NOT NULL,
  `totalprecio_pedido` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_productos`
--

CREATE TABLE `tbl_productos` (
  `id_producto` int(11) NOT NULL COMMENT 'Clave Primaria, auto incrementada',
  `nombre_producto` varchar(100) NOT NULL COMMENT 'Nombre del Producto',
  `cantidad_producto` int(11) NOT NULL COMMENT 'Cantidad del Producto',
  `descripcion_producto` varchar(50) DEFAULT NULL COMMENT 'Descripcion del Producto',
  `precio_producto` double NOT NULL COMMENT 'Precio del Producto',
  `fecha_producto` date NOT NULL COMMENT 'Fecha del Producto',
  `fotoName_producto` varchar(50) NOT NULL COMMENT 'Nombre de la Foto del Producto',
  `fotoExtension_producto` varchar(10) NOT NULL COMMENT 'Extension de la Foto del Producto',
  `fotoBinario_producto` longblob NOT NULL COMMENT 'Binario de la Foto',
  `categoria_producto` int(11) NOT NULL COMMENT 'Categoria del Producto',
  `destacado_producto` int(1) NOT NULL COMMENT 'Destacar Producto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id_usuario` int(11) NOT NULL COMMENT 'Clave Primaria, auto incrementada',
  `cedula_usuario` varchar(20) NOT NULL COMMENT 'Cedula del Usuario',
  `nombre_usuario` varchar(100) NOT NULL COMMENT 'Nombre del Usuario',
  `apellido_usuario` varchar(100) NOT NULL COMMENT 'Apellido del Usuario',
  `telefono_usuario` varchar(50) NOT NULL COMMENT 'Telefono del Usuario',
  `correo_usuario` varchar(100) NOT NULL COMMENT 'Correo del Usuario',
  `username_usuario` varchar(50) NOT NULL COMMENT 'Username del Usuario',
  `contrasenia_usuario` varchar(100) NOT NULL COMMENT 'Contrasenia del Usuario',
  `nivel_usuario` int(1) NOT NULL COMMENT 'Nivel de Acceso del Usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_categorias`
--
ALTER TABLE `tbl_categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `tbl_ordenpedidos`
--
ALTER TABLE `tbl_ordenpedidos`
  ADD PRIMARY KEY (`id_ordenPedido`);

--
-- Indices de la tabla `tbl_pedidos`
--
ALTER TABLE `tbl_pedidos`
  ADD PRIMARY KEY (`codigo_pedido`);

--
-- Indices de la tabla `tbl_productos`
--
ALTER TABLE `tbl_productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_categorias`
--
ALTER TABLE `tbl_categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tbl_ordenpedidos`
--
ALTER TABLE `tbl_ordenpedidos`
  MODIFY `id_ordenPedido` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_productos`
--
ALTER TABLE `tbl_productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave Primaria, auto incrementada';
--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave Primaria, auto incrementada';
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
