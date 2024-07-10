-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-06-2024 a las 04:04:52
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
-- Base de datos: `flexia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lecciones`
--

CREATE TABLE `lecciones` (
  `id` int(11) NOT NULL,
  `rutina_id` int(11) DEFAULT NULL,
  `ejercicio` varchar(255) DEFAULT NULL,
  `objetivo` int(11) DEFAULT NULL,
  `instrucciones` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lecciones`
--

INSERT INTO `lecciones` (`id`, `rutina_id`, `ejercicio`, `objetivo`, `instrucciones`, `imagen`) VALUES
(1, 1, 'Sentadillas', 15, 'Baja las caderas manteniendo la espalda recta y las rodillas alineadas con los pies.', 'sentadilla.jpg'),
(2, 1, 'Flexiones', 10, 'Mantén el cuerpo recto y baja el pecho hasta casi tocar el suelo, luego empuja hacia arriba.', 'flexiones.jpg'),
(3, 1, 'Zancadas', 12, 'Da un paso adelante y flexiona ambas rodillas hasta que la rodilla trasera casi toque el suelo. Alterna las piernas.', 'zancadas.jpg'),
(4, 1, 'Plancha', 30, 'Mantén el cuerpo recto apoyado en antebrazos y puntas de pies.', 'plancha.jpg'),
(5, 1, 'Abdominales crunch', 20, 'Eleva la parte superior del cuerpo contrayendo los abdominales.', 'abdominales.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `progreso`
--

CREATE TABLE `progreso` (
  `id` int(11) NOT NULL,
  `usuario_id` int(10) UNSIGNED DEFAULT NULL,
  `rutina_id` int(11) DEFAULT NULL,
  `leccion_actual` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `progreso`
--

INSERT INTO `progreso` (`id`, `usuario_id`, `rutina_id`, `leccion_actual`) VALUES
(1, 2, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutinas`
--

CREATE TABLE `rutinas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rutinas`
--

INSERT INTO `rutinas` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Fuerza Total', 'Rutina para ganar fuerza y resistencia muscular en todo el cuerpo.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(6) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `genero` varchar(10) NOT NULL,
  `numero` int(11) NOT NULL,
  `numero_aux` int(11) NOT NULL,
  `nombre_completo` varchar(520) NOT NULL,
  `fecha_nac` date NOT NULL,
  `edad` int(11) NOT NULL,
  `cedula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `email`, `reg_date`, `genero`, `numero`, `numero_aux`, `nombre_completo`, `fecha_nac`, `edad`, `cedula`) VALUES
(1, 'juanff1012', '$2y$10$K6zMzwi6GlgfF5MaJ9YXjudcqRB9rlxkThYn2zN9C83/vUV85fbuO', 'juanfervilla0@gmail.com', '2024-04-09 05:42:48', '', 0, 0, '0', '0000-00-00', 0, 0),
(2, 'root', '$2y$10$iBKhGNzFEUoqofh5xhvy2OQpvI49bo9Bxlg0CA3n6M8BC1ncNkcJa', 'root@root.com', '2024-06-04 12:39:03', '', 0, 0, '', '0000-00-00', 0, 0),
(3, 'juan', '$2y$10$sXdBskVFBATJXK04/70jf.aGLZZ2WanLjb1oWQYT10lEJT9WcxPYy', 'juan@gmail.com', '2024-06-08 02:04:34', '', 0, 0, '', '0000-00-00', 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `lecciones`
--
ALTER TABLE `lecciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rutina_id` (`rutina_id`);

--
-- Indices de la tabla `progreso`
--
ALTER TABLE `progreso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `rutina_id` (`rutina_id`);

--
-- Indices de la tabla `rutinas`
--
ALTER TABLE `rutinas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `lecciones`
--
ALTER TABLE `lecciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `progreso`
--
ALTER TABLE `progreso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `rutinas`
--
ALTER TABLE `rutinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `lecciones`
--
ALTER TABLE `lecciones`
  ADD CONSTRAINT `lecciones_ibfk_1` FOREIGN KEY (`rutina_id`) REFERENCES `rutinas` (`id`);

--
-- Filtros para la tabla `progreso`
--
ALTER TABLE `progreso`
  ADD CONSTRAINT `progreso_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `progreso_ibfk_2` FOREIGN KEY (`rutina_id`) REFERENCES `rutinas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
