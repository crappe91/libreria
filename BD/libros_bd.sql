-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-03-2023 a las 02:12:08
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `libros_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `libros` varchar(255) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `fecha_pedido` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id`, `libros`, `total`, `usuario`, `fecha_pedido`) VALUES
(140, 'El Quijote', '25.99', 'Christian', '2023-03-02'),
(141, '100 años de soledad', '18.99', 'Christian', '2023-03-02'),
(142, 'La Odisea', '12.99', 'Christian', '2023-03-02'),
(143, 'Harry Potter y la piedra filosofal', '14.99', 'Christian', '2023-03-02'),
(146, 'Harry Potter y la piedra filosofal', '29.00', 'Antonio', '2023-03-02'),
(147, '100 años de soledad', '55.00', 'Antonio', '2023-03-02'),
(148, 'El Quijote', '25.99', 'Antonio', '2023-03-02'),
(149, 'La Odisea', '12.99', 'Antonio', '2023-03-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `editorial` varchar(255) NOT NULL,
  `fecha_publicacion` date NOT NULL,
  `genero` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id`, `titulo`, `autor`, `editorial`, `fecha_publicacion`, `genero`, `precio`, `imagen`, `descripcion`) VALUES
(5, 'El Quijote', 'Miguel de Cervantes', 'Editorial Planeta', '1605-01-16', 'Novela', '25.99', 'quijote', 'La obra cumbre de la literatura española'),
(6, '100 años de soledad', 'Gabriel García Márquez', 'Editorial Sudamericana', '1967-06-05', 'Realismo mágico', '18.99', '100anios', 'Una saga familiar en el pueblo ficticio de Macondo'),
(7, 'La Odisea', 'Homero', 'Ediciones Cátedra', '0000-00-00', 'Poesía épica', '12.99', 'odisea', 'El épico viaje de Odiseo hacia su hogar'),
(8, 'Harry Potter y la piedra filosofal', 'J.K. Rowling', 'Bloomsbury Publishing', '1997-06-26', 'Fantasía', '14.99', 'harrypotter1', 'La historia del niño mago más famoso del mundo'),
(9, '1984', 'George Orwell', 'Secker and Warburg', '1949-06-08', 'Distopía', '10.99', '1984', 'Una visión sombría y distópica del futuro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id` int(11) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `fecha` date NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `metodo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`id`, `monto`, `fecha`, `usuario`, `metodo`) VALUES
(1, '1.00', '2023-03-02', 'Christian', 'tarjeta'),
(2, '1.00', '2023-03-02', 'Christian', 'tarjeta'),
(3, '1.00', '2023-03-02', 'Christian', 'tarjeta'),
(4, '2.00', '2023-03-02', 'Christian', 'tarjeta'),
(5, '2.00', '2023-03-02', 'Christian', 'tarjeta'),
(6, '2.00', '2023-03-02', 'Christian', 'tarjeta'),
(7, '1.00', '2023-03-02', 'Christian', 'tarjeta'),
(8, '1.00', '2023-03-02', 'Christian', 'tarjeta'),
(9, '1.00', '2023-03-02', 'Antonio', 'tarjeta'),
(10, '1.00', '2023-03-02', 'Antonio', 'tarjeta'),
(11, '1.00', '2023-03-02', 'Antonio', 'tarjeta'),
(12, '1.00', '2023-03-02', 'Antonio', 'tarjeta'),
(13, '2.00', '2023-03-02', 'Antonio', 'tarjeta'),
(14, '1.00', '2023-03-02', 'Antonio', 'tarjeta'),
(15, '2.00', '2023-03-02', 'Antonio', 'tarjeta'),
(16, '2.00', '2023-03-02', 'Antonio', 'tarjeta'),
(17, '2.00', '2023-03-02', 'Antonio', 'tarjeta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `libros` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id`, `libros`, `precio`, `total`, `usuario`, `direccion`, `fecha`) VALUES
(105, 'El Quijote', '25.99', '1.00', 'Christian', 'Cueva de Menga', '2023-03-02'),
(106, '100 años de soledad', '18.99', '1.00', 'Christian', 'Cueva de Menga', '2023-03-02'),
(107, 'La Odisea', '12.99', '1.00', 'Christian', 'Cueva de Menga', '2023-03-02'),
(112, 'Harry Potter y la piedra filosofal', '58.00', '2.00', 'Antonio', 'Calle Blas Infante', '2023-03-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_registro` date NOT NULL,
  `direccion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `correo`, `password`, `fecha_registro`, `direccion`) VALUES
(1, 'Christian', 'crappe1991@gmail.com', '123456Aa', '2023-02-27', 'Cueva de Menga'),
(22, 'Manuel', 'c@gmail.com', '12345678Aa', '2023-02-27', 'ADFADA'),
(23, 'Antonio', 'antonio@gmail.com', 'Antonio23', '2023-03-02', 'Calle Blas Infante');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
