-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-09-2020 a las 16:59:20
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_master`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(255) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Manga corta'),
(2, 'Tirantes'),
(3, 'Manga larga'),
(4, 'Sudaderas'),
(17, 'Poleras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas_pedidos`
--

CREATE TABLE `lineas_pedidos` (
  `id` int(255) NOT NULL,
  `pedido_id` int(255) NOT NULL,
  `producto_id` int(255) NOT NULL,
  `unidades` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(255) NOT NULL,
  `usuario_id` int(255) NOT NULL,
  `provincia` varchar(100) NOT NULL,
  `localidad` varchar(100) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `coste` float(200,2) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(255) NOT NULL,
  `categoria_id` int(255) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` float(100,2) NOT NULL,
  `stock` int(255) NOT NULL,
  `oferta` varchar(2) DEFAULT NULL,
  `fecha` date NOT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `categoria_id`, `nombre`, `descripcion`, `precio`, `stock`, `oferta`, `fecha`, `imagen`) VALUES
(1, 1, 'galleta oreo', 'galletas oreo muy sabrosas', 0.80, 20, '', '2020-06-10', 'galleta_oreo.jpg'),
(10, 1, 'galletas tentacion', 'galletas tentacion', 0.60, 30, '', '2020-06-10', 'tentacion-galleta.jpg'),
(11, 1, 'galleta margarita', 'margarita', 23.00, 3, '', '2020-06-10', 'galleta_margarita.jpg'),
(17, 17, 'galletas salticas', 'saladitas', 1.00, 20, '', '2020-06-10', 'saltica.jpg'),
(18, 3, 'chocolate sublime', 'dulce y rico', 1.50, 20, '', '2020-06-10', 'sublime_donofrio.jpg'),
(19, 17, 'triangulo', 'de chocolate', 2.00, 10, '', '2020-06-10', 'donofrio-triangulo.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(255) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` varchar(20) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `email`, `password`, `rol`, `imagen`) VALUES
(1, 'Admin', 'Admin', 'admin@admin.com', 'contraseña', 'admin', NULL),
(2, 'ewqewq', 'eqweqwe', 'wqeqwe', '$2y$10$2t0ssRuNlusqVCZT5zWYpuMBr4v5pRYY24Bm79sb7xolwdtUvfnwS', 'user', NULL),
(3, 'edgar wilson', 'vasquez c', 'coronadoew18@gmail.com', '$2y$10$RZadjCFhYx6UmyBc3d1Bf.VeZuogxi.yqDdRbTiwjUWWVYshIxDPG', 'user', NULL),
(8, 'eqw', 'ewqe', 'wqe@gmail.com', '$2y$10$cBtcuA5NploxBfgW2weOD.1kGBX5M0tfPoonIgn968Z2kOLIUaaqe', 'user', NULL),
(18, 'wilson', 'vasquez', 'coronadoew1@gmail.com', '$2y$10$y4Cvl4plRRX4Bi9cIdl5yuH7ndp1aoUOFSnvSzQuf7KV2EBdx2wOK', 'user', NULL),
(19, 'wilson', 'vasquez', 'coronadoew2@gmail.com', '$2y$10$ky.WRsGY/AEWQztbOYp8CO8SiZMrAacolYddR3YYEtT4NjtIGkdt.', 'user', NULL),
(20, 'wilson', 'vasquez', 'coronadoew3@gmail.com', '$2y$10$TumaRKyav3S.mZIWVK.8CO8ODe78h/JbWkEmurj2FpFhFjvLy1Uzq', 'user', NULL),
(21, 'wilson', 'vasquez', 'coronadoew5@gmail.com', '$2y$10$3gJml8FlCo14fVfgQSF7P.pkZ/Eob4VfLhUV2mtWJhTmA13GDzlGq', 'user', NULL),
(22, 'wilso', 'vasquez', 'coronadoew6@gmail.com', '$2y$10$mvnlgnrSXmTXOr2ajMfNteHAPNp/JjTCZqBq35rG13UkY4U133uCO', 'user', NULL),
(23, 'wilson', 'vasquez', 'coronadoew4@gmail.com', '$2y$10$kwpwd3bLSszvyo5lvJhHOu1.FM17xF0fW6kuKlvqJMVncf/RKvYYe', 'user', NULL),
(24, 'wilson', 'vasquez', 'coronadoew19@gmail.com', '$2y$10$K178HyiptePkUbjT5N5x8u0.sUEMhwPE5sxA9v.2/wsSUvOkswq4S', 'user', NULL),
(25, 'wilson', 'vasquez', 'coronadoew20@gmail.com', '$2y$10$P.alZQ/7.sQxjMMMTkESeOxhTYsKpiL6BOsV12usQcAuT70BlVDh6', 'user', NULL),
(26, 'wilson', 'vasquez', 'coronadoew21@gmail.com', '$2y$10$drdBHtigjU/csciZty3vEOGqir3jgFjbTFEx0qwCU28aOFoihXvKq', 'user', NULL),
(27, 'ewqewqe', 'ewqeqw', 'coronadoew22@gmail.com', '$2y$10$yuGRNgo21z2/kdC4S6yAF.9P0xE/a//daGB..JEIBWRciY8vLfWY6', 'user', NULL),
(28, 'wilson', 'vasquez', 'coronadoew23@gmail.com', '$2y$10$wAaxIuroC9dz84Rj83L2ouWmWdVbJhlonVT8cpAFweUyv5HOeAuai', 'user', NULL),
(29, 'ewqeqw', 'ewqeqw', 'coronadoew24@gmail.com', '$2y$10$3UDkdnNicgocijV6S.67Xea48i2DDFNvPTI3/0YclToh2tH9zG1oi', 'user', NULL),
(30, 'eqw', 'ewq', 'coronadoew25@gmail.com', '$2y$10$4sSMBQXjt1jFpV.orNSyhOpbfah26t3QOjjPVFEngB.fbUV4xsujm', 'user', NULL),
(31, 'wilson e', 'vasquez coronado', 'coronadoew1890@gmail.com', '$2y$10$AQcorGZZzxpee/ZZcmX13O/Wrq1jInfzFQnr9w18vP970tcPtc1g.', 'admin', NULL),
(32, 'rosita solano', 'celis', 'ce@gmail.com', '$2y$10$dAkihacOlYu1kimeLXDpneXltxolFGbf6u/tboRmLIRFlhzz7tHHe', 'user', NULL),
(33, 'www', 'www', 'co@gmail.com', '$2y$10$41lmtz9/a/rm7I8jDhdgXucjPvWS8k8dsdpVrOlxwkPnPWRE7ahfC', 'user', NULL),
(34, 'khhkjhkhkj', 'jkljjl', 'coronadoew1222@gmail.com', '$2y$10$wfjnrIYMwrWEKQDRWN1KNOsOvEQwFYfhxw0z1tWCz4XZVpAPF3OzO', 'user', NULL),
(35, 'wilson', 'vasquez', 'wvc@gmail.com', '$2y$10$.8S5HDPB7f3c1NbvCY2BA.cD3v3sl8B5mKZrDUH7AA0TZ9dbTINWm', 'user', NULL),
(36, 'wilson', 'vas', 'vc@gmail.com', '$2y$10$vb7vZeUtEGTWwPIsmeRaJeiNtjYt2kh/8EWi3WFBnjCPCw4arzyci', 'user', NULL),
(37, 'wqeqw', 'eqwe', 'qqw@gmail.com', '$2y$10$QatDnRgrqlVRQSM1dthI6ee1lYQ3JimlkhJKuao2ZNdaH4BDhaqcO', 'user', NULL),
(38, 'eqweqwe', 'qweqwe', 'qweqwe@gmail.com', '$2y$10$4uxFresky0dU8bENIQ2OeesnXNigOGjSAvzPXeY5ffXWjX3t.L1PC', 'user', NULL),
(39, 'ewqeq', 'eqwe', 'eqwe@gmail.com', '$2y$10$eWY0gRwpLDdyAd8.4CuQpuBoYOl7VwmK1lUOA6s82qpJFivmyydby', 'user', NULL),
(40, 'wilson', 'vasquez', 'coronado@gmail.com', '$2y$10$.c3mpsq.VOkDF4T7HHKq8eOse0EAX9jO/rinmVIK3scMOaDE0zcLa', 'admin', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lineas_pedidos`
--
ALTER TABLE `lineas_pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_linea_pedido` (`pedido_id`),
  ADD KEY `fk_linea_producto` (`producto_id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pedido_usuario` (`usuario_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_producto_categoria` (`categoria_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `lineas_pedidos`
--
ALTER TABLE `lineas_pedidos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `lineas_pedidos`
--
ALTER TABLE `lineas_pedidos`
  ADD CONSTRAINT `fk_linea_pedido` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`),
  ADD CONSTRAINT `fk_linea_producto` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_pedido_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
