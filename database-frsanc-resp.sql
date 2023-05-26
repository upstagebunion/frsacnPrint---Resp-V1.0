-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 26-05-2023 a las 00:46:43
-- Versión del servidor: 10.5.16-MariaDB
-- Versión de PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id20729773_frsanc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuentos`
--

CREATE TABLE `descuentos` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_tipo` int(11) NOT NULL,
  `porcentaje` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `descuentos`
--

INSERT INTO `descuentos` (`id`, `id_producto`, `id_tipo`, `porcentaje`) VALUES
(2, 0, 3, 20),
(3, 0, 2, 40),
(4, 0, 7, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `autor_id` int(11) NOT NULL,
  `titulo` varchar(100) CHARACTER SET utf8 NOT NULL,
  `diseno` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `precio` smallint(6) NOT NULL,
  `ruta` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_tipo` tinyint(4) NOT NULL DEFAULT 1,
  `tag` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `privacidad` tinyint(1) NOT NULL DEFAULT 1,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `autor_id`, `titulo`, `diseno`, `descripcion`, `precio`, `ruta`, `id_tipo`, `tag`, `privacidad`, `fecha`) VALUES
(1, 0, 'Mousepad (Lilo y Stitch)', 'Diseño de muestra de Lilo y Stitch.\r\n\r\nEl diseño puede ser completamente personalizado por ti, puedes mandarnos tu diseño propio, foto o encargarnos un diseño en especial, nosotros lo elaboraremos y lo imprimiremos en el producto. c:\r\n\r\n(El precio es informativo, puede variar dependiendo de tu encargo, para saber cuanto saldría tu pedido mándanos un correo detallado con la información de tu pedido, nosotros lo cotizaremos y te responderemos a la brevedad).', 'Alfombrilla de ratón: ideal para amantes de los videojuegos, diseñadores gráficos o cualquiera que utilice un mouse y quiera personalizar su lugar de trabajo.\r\n\r\n¡Perfecto para regalar!\r\n\r\nLa superficie de tela de alta calidad promueve el deslizamiento suave del ratón y mejora la precisión.\r\n\r\nLa base estable, gruesa y de goma mantiene la almohadilla del mouse en su lugar.\r\n\r\nTamaño pequeño se adapta a casi cualquier espacio.\r\n\r\nMedidas: 20 cm de diámetro, 10 cm de radio.', 80, 'images/muestrario/mousepad-lilo.jpg', 3, 'Mousepad, Lilo y stitch, alfombrilla, animado, disney, ratón,', 1, '2020-12-02 04:28:32'),
(2, 0, 'Taza (Michi)', 'Diseño de muestra de un gato negro persiguiendo mariposas azules.\r\n\r\nPuedes mandarnos el diseño que tu quieras, foto o encargarnos hacerlo por ti, nosotros lo elaboraremos y lo imprimiremos en el producto.\r\n\r\n(El precio es informativo, puede variar dependiendo de tu encargo, para saber cuanto saldría tu pedido mándanos un correo detallado con la información de tu pedido, nosotros lo cotizaremos y te responderemos a la brevedad).\r\n', 'Taza de cerámica blanca de excelente calidad.\r\n\r\nTamaño/capacidad: 11 oz. (Aprox. 325ml.)', 100, 'images/muestrario/taza-michi.jpg', 2, 'Taza, gato, gatito, michi, mariposas, cerámica, café, mug', 1, '2020-12-02 04:37:24'),
(3, 0, 'Mousepad (The Beatles)', 'Diseño de muestra de la banda The Beatles.\r\n\r\nEl diseño puede ser completamente personalizado por ti, puedes mandarnos tu diseño propio, foto o encargarnos un diseño en especial, nosotros lo elaboraremos y lo imprimiremos en el producto. c:\r\n\r\n(El precio es informativo, puede variar dependiendo de tu encargo, para saber cuanto saldría tu pedido mándanos un correo detallado con la información de tu pedido, nosotros lo cotizaremos y te responderemos a la brevedad). ', 'Alfombrilla de ratón: ideal para amantes de los videojuegos, diseñadores gráficos o cualquiera que utilice un mouse y quiera personalizar su lugar de trabajo.\r\n\r\n¡Perfecto para regalar!\r\n\r\nLa superficie de tela de alta calidad promueve el deslizamiento suave del ratón y mejora la precisión.\r\n\r\nLa base estable, gruesa y de goma mantiene la almohadilla del mouse en su lugar.\r\n\r\nTamaño pequeño se adapta a casi cualquier espacio.\r\n\r\nMedidas: 20 cm de diámetro, 10 cm de radio. ', 80, 'images/muestrario/mousepad-beatles.jpg', 3, 'the beatles, los beatles, los bitles, rock, music, mousepad, alfombrilla, ratón', 1, '2020-12-02 17:49:25'),
(4, 0, 'Cheems Navideno UuU', 'Diseño de Cheems Navideno, Femliz Navimdad c:\r\n\r\nPuedes mandarnos el diseño que tu quieras, foto o encargarnos hacerlo por ti, nosotros lo elaboraremos y lo imprimiremos en el producto.\r\n\r\n(El precio es informativo, puede variar dependiendo de tu encargo, para saber cuanto saldría tu pedido mándanos un correo detallado con la información de tu pedido, nosotros lo cotizaremos y te responderemos a la brevedad).', 'Taza de cerámica, blanca, de excelente calidad.\r\n\r\nTamaño/capacidad: 11 oz. (Aprox. 325ml). ', 100, 'images/muestrario/cheems.jpg', 2, 'cheems, chems, taza roja, memes, feliz navidad,  rojo', 1, '2020-12-09 19:10:00'),
(5, 0, 'Taza Mágica Navidad', 'Diseño navideño de fondo guinda/vino y resaltes dorados que resaltan especialmente bien en este tipo de tazas térmicas/mágicas.\r\n\r\nPuedes mandarnos el diseño que tu quieras, foto o encargarnos hacerlo por ti, nosotros lo elaboraremos y lo imprimiremos en el producto.\r\n\r\n(El precio es informativo, puede variar dependiendo de tu encargo, para saber cuanto saldría tu pedido mándanos un correo detallado con la información de tu pedido, nosotros lo cotizaremos y te responderemos a la brevedad).', 'Taza de cerámica blanca de excelente calidad con recubrimiento térmico especial, se ve de color negro mate en temperatura ambiente pero al poner en ella liquido caliente se muestra el diseño impreso.\r\n\r\nTamaño/capacidad: 11 oz. (Aprox. 325ml.) ', 150, 'images/muestrario/Feliz navidad 2(Térmica).jpg', 7, 'Taza mágica, mate, feliz navidad, año nuevo, arbol de navidad, taza térmica, vino, negro', 1, '2020-12-09 19:52:19'),
(6, 0, 'Taza Snoopy', 'Diseño de Snoopy Navideño adornando un arbolito de navidad c: \r\n\r\nPuedes mandarnos el diseño que tu quieras, foto o encargarnos hacerlo por ti, nosotros lo elaboraremos y lo imprimiremos en el producto.\r\n\r\n(El precio es informativo, puede variar dependiendo de tu encargo, para saber cuanto saldría tu pedido mándanos un correo detallado con la información de tu pedido, nosotros lo cotizaremos y te responderemos a la brevedad).', 'Taza de cerámica blanca de excelente calidad.\r\n\r\nTamaño/capacidad: 11 oz. (Aprox. 325ml).', 100, 'images/muestrario/Snoopy.jpg', 2, 'snoopy, perro, doggo, animado, comic, taza blanca, charlie brown', 1, '2020-12-09 20:06:51'),
(7, 1, 'Playera Personalizada', '¡Diseño completamente personalizable con la imágen o fotografía que quieras!.', 'Playeras de poliester o algodón (Según desee) de alta calidad.\r\n\r\nColor: Blanco.\r\nTallas: Chica, Mediana, Grande, Extra-grande e infantil.\r\n\r\nPuede llevar vivo (lineas negras al final de las mangas y en el cuello) si así lo desea.', 210, 'images/muestrario/Playeras.jpg', 4, 'playera, personalizable, star wars, marshmello, gorillaz', 1, '2021-02-01 23:29:07'),
(8, 1, 'Playera Super Cool', 'Diseño propiedad del cliente, materializado por nosotros', 'Blusa Morada personalizada con estilo único', 150, 'images/muestrario/Girl.jpg', 4, 'Playera, morada, negra, negro, morado, única, unica', 1, '2023-05-26 00:35:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id` int(11) NOT NULL,
  `usuario` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` text CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `pedidos` int(11) NOT NULL DEFAULT 0,
  `likes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id`, `usuario`, `email`, `password`, `admin`, `pedidos`, `likes`, `fecha`) VALUES
(1, 'Francisco (el boss)', 'fco.garcia.solis@gmail.com', 'maF/tPuY3VA2E', 1, 0, '', '2020-12-01 05:53:52'),
(2, 'SaraMonjarazz', 'alexandramonjaraz@gmail.com', 'maT1iwKPbGzyA', 1, 0, '', '2020-12-02 18:12:22'),
(3, 'miateko8', 'mirigarcia118@gmail.com', 'maKoBy8Fx4I8g', 0, 0, '', '2021-04-01 16:55:06'),
(4, 'Prueba Ramirez', 'prueba@gmail.com', 'mabpqlQ1fV9CE', 0, 0, NULL, '2023-05-10 06:51:25'),
(5, 'Usuario Prueba', 'prueba1@gmail.com', 'maM50xBabOXqs', 0, 0, NULL, '2023-05-26 00:43:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `id` int(11) NOT NULL,
  `valor` tinytext CHARACTER SET utf32 COLLATE utf32_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id`, `valor`) VALUES
(1, 'Otros'),
(2, 'Taza'),
(3, 'Mousepad'),
(4, 'Playera'),
(5, 'Gorra'),
(6, 'Plato'),
(7, 'Mágica');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
