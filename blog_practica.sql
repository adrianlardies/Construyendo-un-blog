-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 02-04-2024 a las 02:27:26
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blog_practica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `extracto` varchar(200) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `texto` text NOT NULL,
  `thumb` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `titulo`, `extracto`, `fecha`, `texto`, `thumb`) VALUES
(1, 'Título del primer post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eget odio non orci accumsan lacinia. Mauris dapibus malesuada mi at placerat. Nunc varius luctus pretium. Donec sit amet massa in leo faci', '2024-03-31 05:41:54', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed gravida aliquet mauris hendrerit aliquam. In vel purus sed neque sollicitudin hendrerit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum aliquam tellus ut rutrum condimentum. Cras finibus metus quis varius pulvinar. Maecenas egestas consectetur porta. Morbi varius fermentum eros, in suscipit tortor sagittis eu. Duis pretium imperdiet enim, vel ultricies felis ullamcorper ac. Sed placerat eros velit, sollicitudin gravida nisi fringilla id. Fusce vehicula arcu a risus sollicitudin dapibus. Quisque sed elit convallis, vehicula lectus et, cursus elit. Vivamus est sem, tincidunt at ligula id, mattis eleifend ex. Vestibulum efficitur sem faucibus, suscipit massa a, ullamcorper nibh. Donec magna ex, ullamcorper congue facilisis nec, mollis ut eros. Praesent nunc tortor, malesuada sit amet sagittis at, volutpat eget lorem.', '1.png'),
(2, 'Título del segundo post', 'Cras dui massa, elementum sed leo sed, dignissim venenatis arcu. Aliquam vitae nulla et est suscipit elementum. Pellentesque varius, nisi sed varius semper, diam odio accumsan ipsum, vel laoreet quam ', '2024-03-31 03:43:32', 'Quisque ut orci rutrum, fringilla justo id, bibendum ex. Aenean malesuada eu nunc eu tristique. Nullam nibh est, dictum maximus orci sodales, pulvinar tristique libero. Maecenas et dictum ligula. Curabitur vel massa in risus iaculis eleifend. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque hendrerit, justo at lacinia accumsan, justo nunc faucibus elit, vitae commodo libero sapien a augue. Duis sodales sem in nisi lobortis, vitae consectetur mi varius. Aenean et pharetra metus, et auctor risus. Etiam vel libero magna. Maecenas elementum quis dolor ullamcorper lobortis. Vivamus non mi non est pharetra ornare ut vel libero. Nulla scelerisque consectetur nisi ac semper. Suspendisse commodo consequat lorem in porttitor. Maecenas imperdiet mauris nulla, ut tincidunt lectus molestie vitae.', '2.png'),
(3, 'Título del tercer post', 'Curabitur iaculis, risus in ornare pharetra, quam nisi interdum dolor, a lacinia odio urna pretium purus. Nulla in tortor vitae orci bibendum tincidunt nec a odio. Proin pretium sem quis felis pretium', '2024-03-31 03:43:45', 'Pellentesque pretium iaculis risus. Mauris sit amet metus est. Nam laoreet orci tincidunt lorem fringilla ultricies. Fusce suscipit nec erat quis rhoncus. Curabitur ac risus eget nisl placerat gravida et et quam. Ut massa mauris, congue quis velit eget, laoreet aliquam nibh. Vestibulum eu elit et est tincidunt gravida. Quisque posuere tincidunt nisi id dapibus.', '3.png'),
(4, 'Título del cuarto post', 'Pellentesque ac interdum turpis. Ut interdum est at elementum gravida. Vestibulum semper tempus varius. Morbi auctor, ex ut finibus lobortis, quam nisi maximus urna, nec blandit elit odio vel elit. Pr', '2024-03-31 03:43:53', 'In fermentum facilisis molestie. In at libero vitae lorem porta congue. Vestibulum odio metus, aliquet eget felis a, luctus fringilla nisl. Proin vehicula eros nec diam hendrerit, vitae placerat ante interdum. Morbi turpis arcu, fermentum quis pellentesque sed, sagittis eget velit. Vivamus tristique sodales quam et posuere. Integer varius commodo arcu, sed tristique lorem feugiat vel. Vestibulum ultricies tellus purus, scelerisque scelerisque sapien fringilla eu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In ligula sapien, sodales non libero vulputate, consectetur fermentum urna. Nulla egestas, nisl id vehicula pretium, nibh turpis dictum tortor, ut congue odio purus ut leo. Curabitur tempus fermentum arcu. Proin convallis consectetur vestibulum. Quisque rhoncus magna sed odio dapibus sollicitudin. Vivamus lectus elit, imperdiet in lacus at, lobortis feugiat odio. Vivamus consectetur dolor imperdiet bibendum pharetra.', '4.png'),
(5, 'Título de prueba', 'Extracto de prueba.', '2024-04-01 22:22:07', 'Mi texto.\r\n\r\nHola mundo.\r\n\r\nQué tal a todos.', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
