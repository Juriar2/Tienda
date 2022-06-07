-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-01-2022 a las 00:54:23
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_online`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id` int(11) NOT NULL,
  `id_transaccion` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_cliente` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id`, `id_transaccion`, `fecha`, `status`, `email`, `id_cliente`, `total`) VALUES
(1, '987068383R766110V', '2022-01-28 00:19:57', 'COMPLETED', 'yuriar2000@hotmail.com', 'QBQAZ3Q2N7ES4', '149663'),
(2, '3K785495J9654502H', '2022-01-28 00:34:23', 'COMPLETED', 'yuriar2000@hotmail.com', 'HGB24572K9JVU', '1337705'),
(3, '3F9964477E2340620', '2022-01-28 00:47:06', 'COMPLETED', 'yuria20@hotmail.com', '58ADEJT78DTZQ', '14784'),
(4, '4GB67015348996219', '2022-01-28 00:51:36', 'COMPLETED', 'sb-fpoiz10919217@personal.example.com', 'XYBY2JJG9CQ3U', '91105');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_compra`
--

INSERT INTO `detalle_compra` (`id`, `id_compra`, `id_producto`, `nombre`, `precio`, `cantidad`) VALUES
(1, 1, 14, 'Xiaomi Desbloqueado Redmi 10 128 GB Azul', '14784', 1),
(2, 1, 15, 'Portatil Mac Book Air Oro Rosado 8gb Ram 128ssd', '91105', 1),
(3, 1, 16, 'Laptop HP 240 G7 Intel Corei5-1035G1 8G RAM 1TB Windows', '13599', 1),
(4, 1, 17, 'Samsung Galaxy Watch Active 2 reloj inteligente', '30175', 1),
(5, 2, 14, 'Xiaomi Desbloqueado Redmi 10 128 GB Azul', '14784', 10),
(6, 2, 15, 'Portatil Mac Book Air Oro Rosado 8gb Ram 128ssd', '91105', 10),
(7, 2, 16, 'Laptop HP 240 G7 Intel Corei5-1035G1 8G RAM 1TB Windows', '13599', 9),
(8, 2, 17, 'Samsung Galaxy Watch Active 2 reloj inteligente', '30175', 5),
(9, 2, 19, 'Mouse Gamer Binden Óptico M371, Alámbrico', '150', 5),
(10, 2, 18, 'Teclado Alámbrico con Letras Grandes Spectra FK3309L,Windows,Mac OS ', '480', 10),
(11, 3, 14, 'Xiaomi Desbloqueado Redmi 10 128 GB Azul', '14784', 1),
(12, 4, 15, 'Portatil Mac Book Air Oro Rosado 8gb Ram 128ssd', '91105', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `descuento` tinyint(3) NOT NULL DEFAULT 0,
  `id_categoria` int(11) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `descuento`, `id_categoria`, `activo`) VALUES
(14, 'Xiaomi Desbloqueado Redmi 10 128 GB Azul', '<p>Mantente en onda y actualiza tu smartphone con este increíble Xiaomi Redmi Note 10, perfecto para que disfrutes y compartas tu experiencias en redes sociales.</p> <br>\r\n<p><b>Descripción</b></p> \r\n<p><b>Se trata de un equipo con sistema operativo Android 11 integrado, tecnología de red 4.5 G y conexión wi-fi; si de fotografía se trata, integra una cámara trasera de 50 + 8 + 2 + 2 MP y cámara frontal de 8 MP. Cuenta con pantalla de 6.55”, memoria interna de 128 GB expandible a 512 GB y 4 GB de memoria RAM en complemento con procesador Octa Core 2.0 ghz. Funciona con batería de 5,000 mah de alto rendimiento.</b></p> <br>\r\n\r\n<p><b>Dale un giro a tu forma de comunicarte con el smartphone Xiaomi Redmi Note 10. ¡Pídelo en línea!\r\n</b></p> <br>\r\n\r\n', '16800', 12, 1, 1),
(15, 'Portatil Mac Book Air Oro Rosado 8gb Ram 128ssd', '\r\n<p>Descripción</p>\r\n\r\n<p><b>MacBook Air\r\nLiviano como siempre. Poderoso como nunca.\r\nEl notebook Mac más querido de todos está de vuelta para que te vuelvas a enamorar. El nuevo MacBook Air, disponible en color oro, es aún más delgado y liviano, y tiene una espectacular pantalla Retina con tecnología True Tone, Touch ID, teclado de última generación.</b></p> \r\n<br>\r\n\r\n<p><b>Especificaciones</b></p>\r\n\r\n<p><b> PANTALLA Panel LCD IPS Retina (2.560 x 1.600 puntos) con 227 ppp, 13,3 pulgadas, retroiluminación LED y relación de aspecto 16:10\r\nMICROPROCESADOR Intel Core i5 de doble núcleo a 1,6 GHz (Turbo Boost de hasta 3,6 GHz) y 4 MB de caché de nivel 3\r\nRAM 8 GB de memoria LPDDR3 integrada a 2.133 MHz\r\nALMACENAMIENTO SECUNDARIO SSD PCIe de 128 GB.\r\nGRÁFICOS Intel UHD Graphics 617. Compatible con procesadores gráficos externos (eGPU) con tecnología Thunderbolt 3\r\nCÁMARA FaceTime HD a 720p\r\nCONECTIVIDAD INALÁMBRICA Conexión inalámbrica WiFi 802.11ac\r\nBluetooth 4.2</b></p> \r\n<br>\r\n\r\n<p><b>SONIDO\r\nAltavoces estéreo\r\nTres micrófonos\r\nToma para auriculares de 3,5 mm\r\n\r\nTECLADO Y TRACKPAD\r\n79 teclas retroiluminadas por LED de forma individual, entre ellas 12 de función y 4 de flecha. Sensor de luz ambiental. Trackpad Force Touch con control preciso del cursor y sensibilidad a la presión. Permite activar el clic fuerte, los aceleradores, el trazo sensible a la presión y los gestos Multi Touch</b></p> \r\n<br>\r\n<p><b>OTRAS CARACTERÍSTICAS Sensor Touch ID integrado. Salida de vídeo digital Thunderbolt 3. Salida DisplayPort nativa a través de USB C. Salidas VGA, HDMI y Thunderbolt 2 mediante adaptadores (se </b></p> \r\n<br>\r\n\r\n\r\n', '95900', 5, 1, 1),
(16, 'Laptop HP 240 G7 Intel Corei5-1035G1 8G RAM 1TB Windows', '<p><b>• Pantalla de 14\"\r\n• Procesador  Intel Core  i5-1035G1\r\n• RAM de 8 GB\r\n• HDD de  1 TB\r\n• Windows 10 Home</b></p> <br>\r\n\r\n<p><b>Distribuidor	\r\nModelo	240\r\nSerie	G7\r\nProcesador	Intel Core i5-1035G1\r\nPantalla	14\" HD\r\nMemoria	8 GB DE SDRAM DDR4-2666 (1 X 8 GB)\r\nAlmacenamiento	SATA DE 1 TB Y 5400 RPM\r\nAudio	Audio HD con altavoces estéreo\r\nConectividad	Wi-Fi (802.11ac), Bluetooth\r\nPuertos	2 Puertos USB 3.1 Gen 1, 1 Puerto USB 2.0\r\nConectores de Video	1 Puerto VGA, 1 Puerto HDMI 1.4\r\nSistema Operativo	Windows 10 Home\r\nPeso	1,85 kg\r\nDimensiones	Altura 23,7 mm, Ancho 340 mm, Profundidad 240 mm</b></p> <br>\r\n\r\n<p>Pídelo en la tienda Kika</p>\r\n\r\n\r\n\r\n', '15999', 15, 1, 1),
(17, 'Samsung Galaxy Watch Active 2 reloj inteligente', 'Samsung Galaxy Watch Active 2 reloj inteligente\r\nControl\r\nIntegra un procesador Exynos 9110 de doble núcleo y 1 GB de memoria RAM, lo que permite que las transiciones entre menús y la apertura de apps sean bastante rápidas. Sus 4 GB de almacenamiento interno pueden usarse para la descarga de nuevas aplicaciones o el almacenamiento de\r\n', '35500', 15, 1, 1),
(18, 'Teclado Alámbrico con Letras Grandes Spectra FK3309L,Windows,Mac OS ', '<p>El Teclado Alámbrico Spectra FK3309L es la opción perfecta y completa que ha llegado a revolucionar la manera con la que trabajas.</p> <br>\r\n    <h1>Descripción</h1>\r\n<b>\r\n<li>Olvídate de pasar horas pegado a la computadora y equivocándote por teclear la letra que no es, su innovador diseño presenta letras grandes de fácil identificación, así como números superiores que te ayudarán a poner</li><br> \r\n\r\n<li>Su diseño y retroiluminación LED cuenta con 13 teclas multimedia para que avances, pongas pausa, controles el volumen o el brillo de tu computadora con la seguridad de seguir tus preferencias.</li>\r\n<b/><br>\r\n', '505', 5, 1, 1),
(19, 'Mouse Gamer Binden Óptico M371, Alámbrico', 'Iluminación	Si\r\nColor del producto	Negro\r\nFactor de forma	Ambidiestro\r\nMateriales	ABS sintéticos', '150', 0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_comentarios`
--

CREATE TABLE `tbl_comentarios` (
  `co_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `comentarios` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `comentario_nombre` varchar(40) CHARACTER SET utf8 NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_comentarios`
--

INSERT INTO `tbl_comentarios` (`co_id`, `parent_id`, `comentarios`, `comentario_nombre`, `fecha`) VALUES
(22, 0, 'ESTUPENDO VIDEO 😊👍', 'Andrés Gutiérrez Mendoza', '2021-11-03 06:26:18'),
(23, 22, 'TIENES RAZÓN 😊👍', 'Fuente Web', '2021-11-03 06:26:47'),
(24, 0, 'ESTA ES UNA SECCIÓN DE COMENTARIOS', 'Fuente Web', '2021-11-03 06:27:21'),
(25, 22, 'me quires o n me quires😡😡😡😡', 'que va ser eso', '2022-01-11 04:36:44'),
(26, 0, 'no me llego bien lo que pedi👺', 'juriar', '2022-01-11 04:37:16'),
(27, 0, 'hola como esta\r\n', 'hola', '2022-01-11 05:50:30'),
(28, 27, 'qqq', 'ggg', '2022-01-11 05:50:48'),
(29, 26, 'como esta', 'hola', '2022-01-11 06:39:12'),
(30, 0, 'como estaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'peres', '2022-01-11 06:39:34');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_comentarios`
--
ALTER TABLE `tbl_comentarios`
  ADD PRIMARY KEY (`co_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tbl_comentarios`
--
ALTER TABLE `tbl_comentarios`
  MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
