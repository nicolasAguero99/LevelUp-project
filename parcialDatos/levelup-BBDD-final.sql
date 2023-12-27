-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-08-2023 a las 20:27:10
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `levelup`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desarrolladores`
--

CREATE TABLE `desarrolladores` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `desarrolladores`
--

INSERT INTO `desarrolladores` (`id`, `nombre`) VALUES
(0, 'Toys for Bob'),
(1, 'Blizzard'),
(2, 'Naughty Dog'),
(4, 'Dimps'),
(5, 'SIE Santa Monica Studio'),
(6, 'Bungie'),
(7, 'Blind Squirrel Games'),
(8, 'Ubisoft'),
(9, 'Bethesda'),
(10, 'Endnight Games'),
(11, 'Mojang Studios'),
(12, 'Steel Wool Studios'),
(13, 'Studio Wildcard'),
(14, 'Mediatonic'),
(15, 'No Brakes Games'),
(16, 'Boneloaf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

CREATE TABLE `juegos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `precio` float(6,2) NOT NULL,
  `descripcion` text NOT NULL,
  `desarrollador_id` int(10) UNSIGNED NOT NULL,
  `publicacion` year(4) NOT NULL,
  `genero` enum('accion','disparo','supervivencia','lucha','plataformas','terror','estrategia') NOT NULL,
  `portada` varchar(255) NOT NULL,
  `categoria` enum('playstation','xbox','computadora') NOT NULL,
  `top` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`id`, `nombre`, `precio`, `descripcion`, `desarrollador_id`, `publicacion`, `genero`, `portada`, `categoria`, `top`) VALUES
(1, 'Uncharted 4: A thief\'s end', 1800.00, 'Es un videojuego de acción y aventuras desarrollado por Naughty Dog y publicado por Sony Computer Entertainment. Es la cuarta entrega de la serie Uncharted y sigue las aventuras del cazador de tesoros Nathan Drake mientras se embarca en una última búsqueda para encontrar un tesoro perdido en Libertalia, un reino pirata en Madagascar', 2, '2016', 'disparo', 'uncharted-4.jpg', 'playstation', 1),
(2, 'Dragon Ball Xenoverse 2', 1600.00, 'Es un videojuego de acción y lucha desarrollado por Dimps y publicado por Bandai Namco Entertainment. El juego es una continuación de Dragon Ball Xenoverse y presenta una historia completamente nueva en el universo de Dragon Ball. Los jugadores pueden crear su propio personaje personalizado, eligiendo entre cinco razas diferentes: humano, saiyan, namekiano, freezeriano y majin', 4, '2016', 'lucha', 'dragon-ball-xenoverse-2.jpg', 'playstation', 0),
(3, 'God of War: Ragnarök', 2200.00, 'Es un videojuego de acción y aventura que está siendo desarrollado por Sony Santa Monica y será publicado por Sony Interactive Entertainment. El juego es una secuela directa de God of War del 2018 y seguirá la historia de Kratos y su hijo Atreus mientras exploran los reinos nórdicos y se enfrentan a los peligros del Ragnarok, la batalla apocalíptica entre los dioses nórdicos', 5, '2022', 'accion', 'god-of-war-ragnarok.jpg', 'playstation', 1),
(4, 'Crash Bandicoot 4: It\'s About Time', 1400.00, 'Es un videojuego de plataformas desarrollado por Toys for Bob y publicado por Activision. Es la cuarta entrega principal de la serie Crash Bandicoot y sigue la historia de Crash y su hermana Coco mientras intentan detener a su archienemigo Neo Cortex y sus secuaces de conquistar el multiverso. Los protagonistas deben saltar, girar y deslizarse a través de niveles llenos de obstáculos, enemigos y peligros ambientales, utilizando habilidades especiales y power-ups para avanzar', 0, '2020', 'plataformas', 'crash-bandicoot-4.jpg', 'playstation', 0),
(5, 'Halo: The master chief collection', 1750.00, 'Es un es una recopilación de videojuegos de disparos en primera persona, desarrollados por 343 Industries y publicados por Microsoft Studios para la consola Xbox One y la plataforma de PC. La colección incluye los cuatro primeros juegos de la serie Halo protagonizados por el icónico personaje Master Chief: Halo: Combat Evolved, Halo 2, Halo 3 y Halo 4', 6, '2014', 'disparo', 'halo.jpg', 'xbox', 1),
(6, 'Borderlands: Game of the Year Edition', 1400.00, 'Borderlands: Game of the Year Edition es un videojuego de rol y disparos en primera persona desarrollado por Gearbox Software y publicado por 2K Games. Es una versión remasterizada del juego original Borderlands lanzado en 2009, con gráficos mejorados y contenido adicional. El juego se desarrolla en el planeta Pandora, un lugar peligroso y desolado lleno de criaturas peligrosas y tesoros. Los jugadores toman el papel de uno de los cuatro cazadores de la bóveda', 7, '2019', 'accion', 'borderlands.jpg', 'xbox', 0),
(7, 'Assassin\'s Creed Valhalla', 2100.00, 'Es un videojuego de acción y aventura lanzado en noviembre de 2020. El juego se desarrolla en la época vikinga y sigue la historia de Eivor, un guerrero vikingo que lidera a su clan en una búsqueda para establecer un asentamiento en Inglaterra. El juego presenta un mundo abierto y una jugabilidad que combina elementos de combate, exploración y sigilo', 8, '2018', 'accion', 'assassins-creed-valhalla.jpg', 'xbox', 0),
(8, 'Fallout 4', 1450.00, 'Es un videojuego de rol y acción de mundo abierto desarrollado por Bethesda Game Studios y lanzado en 2015. El juego está ambientado en un mundo post-apocalíptico en el año 2287, aproximadamente 210 años después de una guerra nuclear que devastó el mundo. El jugador asume el papel de un personaje predefinido llamado \"Sole Survivor\", quien emerge de una bóveda subterránea después de haber sido congelado criogénicamente', 9, '2015', 'accion', 'fallout-4.jpg', 'xbox', 1),
(9, 'Sons of the forest', 2550.00, 'Es un videojuego de terror y supervivencia en primera persona desarrollado por Endnight Games. Es la secuela de \"The Forest\", que fue lanzado en 2018. El juego sigue a un hombre que se estrella en un bosque misterioso con su hijo. A medida que exploran el bosque, descubren que está lleno de peligrosos mutantes y criaturas extrañas. El objetivo principal del juego es sobrevivir en el bosque mientras se descubre la verdad detrás de lo que está sucediendo allí', 10, '2023', 'supervivencia', 'sons-of-the-forest.jpg', 'computadora', 1),
(10, 'Minecraft', 1000.00, 'Es un videojuego de aventuras y construcción lanzado por primera vez en 2011 por Mojang Studios. El juego se centra en la exploración y la creación de estructuras y mundos virtuales utilizando bloques de diferentes materiales. El jugador comienza en un mundo generado aleatoriamente y puede recolectar recursos como madera, piedra y mineral para crear herramientas y construir refugios. El objetivo del juego es sobrevivir y prosperar en un mundo lleno de peligros, como monstruos y otros jugadores hostiles', 11, '2009', 'supervivencia', 'minecraft.jpg', 'computadora', 1),
(11, 'Five Nights at Freddy\'s: Security Breach', 1950.00, 'Es un videojuego de Five Nights at Freddy\'s: Security Breach es un juego de terror de supervivencia en el que el jugador asume el papel de una joven llamada Vanessa, quien se encuentra atrapada en un centro comercial llamado Freddy Fazbear\'s Mega Pizzaplex después de horas de operación. El lugar está lleno de animatrónicos peligrosos que han sido programados para atacar a cualquier persona que encuentren después del cierre. El objetivo principal del jugador es escapar del centro comercial antes de que los animatrónicos los atrapen', 12, '2021', 'terror', 'fnaf-security-breach.jpg', 'computadora', 1),
(12, 'Ark: Survival Evolved', 1300.00, 'Es un videojuego de supervivencia y aventura en el que el jugador se despierta en una isla misteriosa y peligrosa poblada por dinosaurios y otras criaturas prehistóricas. El objetivo del juego es sobrevivir en este entorno hostil mientras se busca la manera de escapar de la isla. El jugador debe recolectar recursos como madera, piedra y comida para construir refugios y herramientas, y también puede domesticar y montar dinosaurios para ayudarlo en su supervivencia', 13, '2017', 'supervivencia', 'ark.jpg', 'computadora', 0),
(13, 'Overwatch 2', 2200.00, 'Es un videojuego de disparos en equipo en línea desarrollado por Blizzard Entertainment. Es la secuela del exitoso juego de 2016, Overwatch. Al igual que su predecesor, Overwatch 2 se centra en partidas en línea 6 contra 6 en las que los jugadores eligen personajes de una lista diversa de héroes con habilidades y roles únicos. Una de las principales características de Overwatch 2 es su modo de historia cooperativa, en el que los jugadores pueden unirse para enfrentarse a desafiantes misiones en todo el mundo', 1, '2022', 'disparo', 'overwatch-2.jpg', 'computadora', 0),
(14, 'Fall Guys: Ultimate Knockout', 1850.00, 'Es un videojuego en línea desarrollado por Mediatonic y publicado por Devolver Digital. El objetivo del juego es simple: ser el último jugador en pie después de superar una serie de desafíos y obstáculos en una carrera frenética llena de coloridos personajes y divertidos escenarios. Los jugadores controlan a pequeñas criaturas redondas y con forma de frijol llamadas fall guys y compiten en rondas que van desde carreras de obstáculos hasta juegos de equipo cooperativos', 14, '2020', 'plataformas', 'fall-guys.jpg', 'computadora', 0),
(15, 'Human: Fall Flat', 1450.00, 'Es un videojuego de plataformas y puzles en tercera persona lanzado en 2016. El juego se desarrolla en un mundo surrealista en el que los jugadores controlan a un personaje humano personalizable, cuyo objetivo es superar una serie de niveles y desafíos que requieren habilidades de plataformas, lógica y resolución de problemas. La mecánica de juego principal de Human: Fall Flat se centra en el movimiento y la manipulación del personaje del jugador para superar obstáculos', 15, '2016', 'plataformas', 'human-fall-flat.jpg', 'computadora', 0),
(16, 'Gang Beasts', 1300.00, 'Es un videojuego de lucha multijugador en el que los jugadores controlan a personajes luchadores gelatinosos y coloridos que intentan derrotar a sus oponentes en una variedad de escenarios peligrosos. Los personajes pueden golpear, patear, empujar y agarrar a otros jugadores para intentar sacarlos del escenario o hacer que caigan en trampas mortales. El juego se desarrolla en entornos tridimensionales coloridos y caricaturescos', 16, '2014', 'lucha', 'gang-beast.jpg', 'computadora', 0),
(17, 'Rainbow Six Siege', 1500.00, 'Es un videojuego de disparos táctico en primera persona desarrollado por Ubisoft. El juego se centra en enfrentamientos entre equipos de atacantes y defensores, donde se deben llevar a cabo misiones estratégicas en entornos destructibles y realistas. Cada jugador selecciona un operador, cada uno con habilidades y roles únicos, y trabaja en equipo para completar los objetivos.', 8, '2015', 'disparo', 'rainbow-six.jpg', 'playstation', 0),
(18, 'Hearthstone', 1250.00, 'Es un videojuego de cartas coleccionables en línea desarrollado y publicado por Blizzard Entertainment. En este juego, los jugadores asumen el papel de un poderoso hechicero conocido como \"héroe\" y utilizan un mazo personalizado de cartas para enfrentarse a otros jugadores en emocionantes batallas.\nCada jugador comienza con 30 puntos de vida y un mazo de cartas que representa sus hechizos, criaturas y habilidades especiales.', 1, '2014', 'estrategia', 'hearthstone.jpg', 'computadora', 1),
(20, 'The Last of Us Part II', 2200.00, 'Es un videojuego de acción y aventura desarrollado por Naughty Dog y publicado por Sony Interactive Entertainment. Es la secuela del aclamado juego The Last of Us y continúa la historia de los personajes principales, Ellie y Joel, en un mundo postapocalíptico infestado de criaturas infectadas y peligrosos grupos de supervivientes. El juego se desarrolla en un escenario desolado y hostil, donde los jugadores asumen el control de Ellie.', 2, '2020', 'supervivencia', 'the-last-of-us-2.jpg', 'playstation', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos_x_desarrollador`
--

CREATE TABLE `juegos_x_desarrollador` (
  `id` int(10) UNSIGNED NOT NULL,
  `desarrollador_id` int(10) UNSIGNED NOT NULL,
  `juego_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `juegos_x_desarrollador`
--

INSERT INTO `juegos_x_desarrollador` (`id`, `desarrollador_id`, `juego_id`) VALUES
(1, 0, 4),
(2, 1, 18),
(3, 2, 1),
(4, 4, 2),
(5, 5, 3),
(6, 6, 5),
(7, 7, 6),
(8, 8, 7),
(9, 8, 17),
(10, 9, 8),
(11, 10, 9),
(12, 11, 10),
(13, 12, 11),
(14, 13, 12),
(15, 14, 14),
(16, 15, 15),
(17, 16, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos_x_usuario`
--

CREATE TABLE `juegos_x_usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `juego_id` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_compra` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `juegos_x_usuario`
--

INSERT INTO `juegos_x_usuario` (`id`, `usuario_id`, `juego_id`, `cantidad`, `fecha_compra`) VALUES
(1, 1, 12, 2, '2023-07-14'),
(2, 2, 1, 3, '2023-08-01'),
(3, 1, 3, 1, '2023-03-16'),
(4, 2, 2, 2, '2023-02-12'),
(5, 1, 7, 4, '2023-06-14'),
(6, 2, 8, 2, '2023-05-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `roles` enum('usuario','admin','superadmin') NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `roles`, `foto`) VALUES
(1, 'usuario', 'usuario@gmail.com', '$2y$10$WOWqAuYqrG39DA2Ehi//t.V/i1y3I7iIjGOSjmQgBsuP.yyp0ExfS', 'usuario', 'perfil-default.png'),
(2, 'admin', 'admin@gmail.com', '$2y$10$WvjDhDTcKN2CAOvG6uOEzeIOhdacuLQbHsPHdox.oobSSvraaUcru', 'admin', 'perfil-default.png'),
(3, 'superadmin', 'superadmin@gmail.com', '$2y$10$VSnKv6/lOYTld9X.rOTK2ehhyHP1B2Je.UFYa2x2PSpxPFbj2gJze', 'superadmin', 'perfil-default.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `desarrolladores`
--
ALTER TABLE `desarrolladores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `desarrollador_id` (`desarrollador_id`);

--
-- Indices de la tabla `juegos_x_desarrollador`
--
ALTER TABLE `juegos_x_desarrollador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `desarrollador_id` (`desarrollador_id`),
  ADD KEY `juego_id` (`juego_id`);

--
-- Indices de la tabla `juegos_x_usuario`
--
ALTER TABLE `juegos_x_usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `juego_id` (`juego_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `desarrolladores`
--
ALTER TABLE `desarrolladores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `juegos`
--
ALTER TABLE `juegos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `juegos_x_desarrollador`
--
ALTER TABLE `juegos_x_desarrollador`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `juegos_x_usuario`
--
ALTER TABLE `juegos_x_usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD CONSTRAINT `juegos_ibfk_1` FOREIGN KEY (`desarrollador_id`) REFERENCES `desarrolladores` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `juegos_x_desarrollador`
--
ALTER TABLE `juegos_x_desarrollador`
  ADD CONSTRAINT `juegos_x_desarrollador_ibfk_3` FOREIGN KEY (`juego_id`) REFERENCES `juegos` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `juegos_x_desarrollador_ibfk_4` FOREIGN KEY (`desarrollador_id`) REFERENCES `desarrolladores` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `juegos_x_usuario`
--
ALTER TABLE `juegos_x_usuario`
  ADD CONSTRAINT `juegos_x_usuario_ibfk_1` FOREIGN KEY (`juego_id`) REFERENCES `juegos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `juegos_x_usuario_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
