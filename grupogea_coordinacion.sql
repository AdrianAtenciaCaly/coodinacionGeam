-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 25-06-2021 a las 16:20:27
-- Versión del servidor: 5.7.23-23
-- Versión de PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `grupogea_coordinacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `assistance`
--

CREATE TABLE `assistance` (
  `id_assistance` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `teacher_assistance` int(11) NOT NULL,
  `subject_assistance` int(11) NOT NULL,
  `socialized_material_assistance` varchar(500) NOT NULL,
  `main_theme_assistance` varchar(500) NOT NULL,
  `institution_assistance` varchar(500) NOT NULL,
  `group_assistance` int(10) NOT NULL,
  `observations_assistance` longtext,
  `evidence_assistance` varchar(500) NOT NULL,
  `last_modification_assistance` varchar(200) NOT NULL,
  `modified_by_assistance` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `assistance`
--

INSERT INTO `assistance` (`id_assistance`, `date`, `teacher_assistance`, `subject_assistance`, `socialized_material_assistance`, `main_theme_assistance`, `institution_assistance`, `group_assistance`, `observations_assistance`, `evidence_assistance`, `last_modification_assistance`, `modified_by_assistance`) VALUES
(1, '2021-06-23', 1, 3, 'materia socializado prueba', 'eje temático prueba ', 'MARIA INMACULADA', 1, '', '1624462798.jpeg', '2021-06-23 10:39:58', 'ADRIAN'),
(2, '2021-06-24', 1, 3, 'materia socializado prueba 2', 'eje temático prueba 2', 'INSTITUCION 2', 1, '', '1624477784.pdf', '2021-06-23 14:49:44', 'ADRIAN'),
(3, '2021-06-22', 1, 3, 'prueba', 'caja', 'san marcos', 1, '', '1624479695.jpeg', '2021-06-23 15:21:35', 'ADRIAN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `students`
--

CREATE TABLE `students` (
  `id_students` int(20) NOT NULL,
  `identification_students` int(11) NOT NULL,
  `names_students` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `group_students` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `students`
--

INSERT INTO `students` (`id_students`, `identification_students`, `names_students`, `group_students`) VALUES
(1, 1104256234, 'ADRIAN ESTEBAN GONGORA GALLON  ', 1),
(2, 1103740568, 'MARIA DEL PILAR AGUIRRE JIMENEZ  ', 1),
(3, 1103497972, 'BLANCA  MUNOZ DE LEON  ', 1),
(4, 1103858640, 'MARIA ALEJANDRA BARRIOS VERGARA  ', 1),
(5, 1103498053, 'DIANA CAROLINA ARROYO BITAR  ', 1),
(6, 1103497191, 'VALENTINA GUZMAN DE LAS SALAS  ', 1),
(7, 1118531631, 'ABDIEL EDUARDO  CASTANO ESPINOZA g  ', 1),
(8, 1048064246, 'MARIA MERCEDES  ARIZA MATUTE  ', 1),
(9, 1103497999, 'JUAN PABLO POLO CONTRERAS  ', 1),
(10, 1104256722, 'STELLA LUCIA PEREZ CONTRERAS  ', 1),
(11, 1104255855, 'MERARY ESTHER PADILLA MEJIA  ', 1),
(12, 1002492143, 'DAVIAN DE JESUS AGUAS SALCEDO  ', 1),
(13, 1011510542, 'ALEJANDRO FERIA GONZALEZ  ', 1),
(14, 1013108502, 'ANGEL ANDRES DIAZ VERGARA  ', 1),
(15, 1104257098, 'DEIMAR ANDRES OTERO AMOROCHO  ', 1),
(16, 1103859210, 'JESUS DAVID JIMENEZ ACUNA  ', 1),
(17, 1064606272, 'JAVIER ANDRES MENDEZ GUILLEN  ', 1),
(18, 1102802029, 'NATALIA SOFIA PATERNINA LONDONO  ', 1),
(19, 1031940308, 'MARIANA OSORIO FIGUEROA  ', 1),
(20, 1103497751, 'ROBERTH ANDRES  HERNANDEZ DAJER   ', 1),
(21, 1104255262, 'JULIANA ISABEL TOUS MARTINEZ  ', 1),
(22, 1011080999, 'ELSY MARIANA PACHECHO VERGARA  ', 1),
(23, 1103095494, 'VALENTINA GOMEZ MIRANDA  ', 1),
(24, 1102812045, 'SALEM PEREZ GOMEZ  ', 1),
(25, 1104257582, 'SANTIAGO STIVEN GIRALDO CONTRERAS   ', 1),
(26, 1023865980, 'JULIETH CAMILA NAVARRO PEREZ  ', 1),
(27, 1103497949, 'LUZ ANGELA  BANQUETH DEL TORO  ', 1),
(28, 1103739553, 'JACKELINE EUGENIA VALLE VOZA  ', 1),
(29, 1104255588, 'JUAN DAVID SIERRA VERGARA  ', 1),
(30, 1041976641, 'VALERY ASCENCIO BOLIVAR   ', 1),
(31, 1103739690, 'SAMIRA ISABEL  PATERNINA JULIO   ', 1),
(32, 1104255961, 'JULIANA  MORALES SOTO  ', 1),
(33, 1005660957, 'FABIANA DIAZ ANAYA  ', 1),
(34, 1102803310, 'KAROLINA ALEJANDRA MORALES RIOS  ', 1),
(35, 1193228226, 'SEBASTIAN TOBIAS  NEGRETE AHUMADA   ', 1),
(36, 1103097848, 'JOSE FERNANDO VILLALBA MORALES  ', 1),
(37, 1102807197, 'DANIELA YANEZ RUZ  ', 1),
(38, 1103498577, 'ISABELLA  MEDRANO ALMANZA  ', 1),
(39, 1103738730, 'MARIA CAMILA OTERO SAMUR  ', 1),
(40, 1104255977, 'EMMANUEL DAVID CAVADIA RIVERA  ', 1),
(41, 1103740736, 'ANGIE KARINA LOPEZ HERNANDEZ  ', 1),
(42, 1104256321, 'NATALIA CALDERON VEGA   ', 1),
(43, 1104255760, 'MARISELL   ACUNA PEREZ  ', 1),
(44, 1103739182, 'LUIS ENRIQUE  GRACIA ORDONEZ  ', 1),
(45, 1104256618, 'VALENTINA MARIA VILLALBA MONTES  ', 1),
(46, 1103498065, 'SAMIEL DAVID GOMEZ HERNANDEZ   ', 1),
(47, 1103859652, 'ALBERT LUIS BARRIGA  ', 1),
(48, 1043642027, 'SAMUEL  VERGARA MARZAN  ', 1),
(49, 1103497186, 'CRISTIAN CAMILO GUTIERREZ VERGARA  ', 1),
(50, 1103497288, 'MARIA ANGEL ANAYA SANTIS   ', 1),
(51, 1044608251, 'NATALIAS MARTINEZ PEREZ  ', 1),
(52, 1103498165, 'JUAN PABLO HERNANDEZ MADERO  ', 1),
(53, 1018406925, 'DYLAN ENRIQUE  PATERNINA AGUAS   ', 1),
(54, 1102806716, 'MARIA ISABELLA PAYARES ARRIETA  ', 1),
(55, 1103497713, 'VALENTINA SANDOVAL GONZELEZ  ', 1),
(56, 1103739881, 'CARLOS DANIEL AGUAS DIAZ  ', 1),
(57, 1137974854, 'EDWIN ANDRES ROCHA PACHECO  ', 1),
(58, 1103740227, 'LAUREN ESTHER  NOBLES SIERRA  ', 1),
(59, 1103740363, 'KATTY LORENA PONCE ALEMAN  ', 1),
(60, 1005605624, 'KEVIN DAVID REINA MARTINEZ  ', 1),
(61, 1103498593, 'KAREN SOFIA GONZALE RIOS  ', 1),
(62, 1103948903, 'JOSE DANIEL PUENTES ORTEGA  ', 1),
(63, 1104255307, 'LUZ ANGELA FERNANDEZ BENAVIDEZ  ', 1),
(64, 1100622705, 'SILVANA LUCIA ALMANZA MONTERROZA  ', 1),
(65, 1102884366, 'YUDITH GABRIELA APARISMO PINEDA  ', 1),
(66, 1102806589, 'SOFIA PEREZ VILORIA   ', 1),
(67, 1103497532, 'LEIDER DAVID GERMAN RIVERA  ', 1),
(68, 1103498135, 'JUAN DAVID MORENO DURANGO  ', 1),
(69, 1103749030, 'ESTEBAN DAVID  CHAMORRO FLOREZ   ', 1),
(70, 1102806323, 'DANIELA  DAVILA LONDONO  ', 1),
(71, 1103739481, 'ZHARICK JIMENA TORRES NAVARRO  ', 1),
(72, 1103739630, 'SARAY TUIRAN DIAZ  ', 1),
(73, 1103738945, 'ANGELLYN ARROYO ALVAREZ  ', 1),
(74, 1104257252, 'LUISA FERNANDA  CUELLO RODRIGUEZ   ', 1),
(75, 1044609431, 'PABLO ANDRES JOHSSON ARIAS DUQUE  ', 1),
(76, 1102805456, 'JOHANA MENDOZA MONTES  ', 1),
(77, 1103739218, 'LUCIA CAROLINA ARROYO FIGUEROA  ', 1),
(78, 1104255511, 'DANIEL DAVID ASSIA SANCHEZ  ', 1),
(79, 1102809307, 'EILEN ZHARICK  LAMBIS BLANCO  ', 1),
(80, 1103498038, 'SANTIAGO ROCHA RODRIGUEZ  ', 1),
(81, 1102801713, 'LUIS ANGEL  QUINTERO DIAZ  ', 1),
(82, 1042579017, 'ANGEL ANDRES BUELVAS CUELLO  ', 1),
(83, 1103740187, 'ENZO FRANCISCO BERMUDEZ VEGA  ', 1),
(84, 1005626959, 'GABRIELA LUCIA TUIRAN SALAZAR  ', 1),
(85, 1101124615, 'ANDREA CAROLINA PARRA BENITEZ  ', 1),
(86, 1103858991, 'MATEO TORRES TENORIO  ', 1),
(87, 1104255527, 'JOSE ANGEL PARRA PATERNINA  ', 1),
(88, 1103497009, 'JAVIER ALEXANDER  ROMERO MONTERROZA  ', 1),
(89, 1103497583, 'RAMIRO ANDRES  CARDENAS ATENCIA  ', 1),
(90, 1103509840, 'ANDREA SOFIA  REYES GARRIDO   ', 1),
(91, 1103740348, 'SEBASTIAN  HUERTOS DE LA OSSA   ', 1),
(92, 1099961201, 'ANGEL DAVID NAVARRO AGUILERA  ', 1),
(93, 1103741879, 'DAILETH CAROLINA VERGARA VILLAMIZAR  ', 1),
(94, 1104255518, 'EDUARDO ANDRES CARO SOLANO  ', 1),
(95, 1102818570, 'JULIANA  IDARRAGA RUZ  ', 1),
(96, 92499812, 'ANDRES FELIPE  GARCIA SIERRA  ', 1),
(97, 1102811404, 'SANTIAGO BARANDICA AGREDA  ', 1),
(98, 1102851009, 'GEANELLA ZOE FERREIRA CONTRERAS  ', 1),
(99, 1103740771, 'NATALY ORDOSGOITA CONTRERAS  ', 2),
(100, 1103498461, 'MARIA CATALINA GONZALEZ TEHERAN  ', 1),
(101, 1103498600, 'LEONARDO ALVAREZ BRAVO G6 ', 1),
(102, 1103739280, 'KARIN SOFIA  ARTETA GOMEZ  ', 1),
(103, 1103858956, 'JUAN PABLO GOMEZ SANCHEZ 1 ', 1),
(104, 1103511612, 'KATIA MARIA SUAREZ ALMANZA ', 1),
(105, 1103497246, 'ISAAC VERGARA DE LA OSSA ', 1),
(106, 1103497327, 'SOFHIA MARRUGO PEREZ  ', 2),
(107, 1103497792, 'BIANCA MUNOZ DE LEON ', 2),
(108, 1102881365, 'ADRIAN ANDRES ATENCIA CALY', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subject`
--

CREATE TABLE `subject` (
  `id_subject` int(11) NOT NULL,
  `name_subject` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `observations_subject` longtext CHARACTER SET utf8mb4
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `subject`
--

INSERT INTO `subject` (`id_subject`, `name_subject`, `observations_subject`) VALUES
(3, 'MATEMATICAS ', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teacher`
--

CREATE TABLE `teacher` (
  `id_teacher` int(11) NOT NULL,
  `names_teacher` varchar(100) NOT NULL,
  `surnames_teacher` varchar(100) NOT NULL,
  `fullname_teacher` varchar(500) NOT NULL,
  `subject_teacher` int(11) NOT NULL,
  `observations_teacher` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `teacher`
--

INSERT INTO `teacher` (`id_teacher`, `names_teacher`, `surnames_teacher`, `fullname_teacher`, `subject_teacher`, `observations_teacher`) VALUES
(2, 'ADRIAN ANDRES', 'CALY', 'ADRIAN ANDRES CALY', 3, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `troop`
--

CREATE TABLE `troop` (
  `id_group` int(11) NOT NULL,
  `cod_group` varchar(200) NOT NULL,
  `name_group` varchar(200) NOT NULL,
  `grade_group` varchar(100) NOT NULL,
  `observation_group` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `troop`
--

INSERT INTO `troop` (`id_group`, `cod_group`, `name_group`, `grade_group`, `observation_group`) VALUES
(1, 'G-52217cqbta', 'GRUPO DE SAN  LORENZO ', '11', ''),
(2, 'G-0900m7opb6', 'GRUPO DE SAN MARCOS', '11', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `iduser` varchar(50) NOT NULL,
  `campus` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT 'no_image.jpg',
  `tipo` enum('ADMINISTRADOR','CORDINADOR','DOCENTE') DEFAULT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `iduser`, `campus`, `password`, `image`, `tipo`, `last_login`) VALUES
(1, 'ADRIAN', 'ADMINISTRADOR', '', '8cb2237d0679ca88db6464eac60da96345513964', 'avatar_default.webp', 'ADMINISTRADOR', '2021-06-24 15:48:02');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `assistance`
--
ALTER TABLE `assistance`
  ADD PRIMARY KEY (`id_assistance`),
  ADD KEY `teacher_assistance` (`teacher_assistance`),
  ADD KEY `subject_assistance` (`subject_assistance`),
  ADD KEY `group_assistance` (`group_assistance`);

--
-- Indices de la tabla `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id_students`),
  ADD KEY `group_students` (`group_students`);

--
-- Indices de la tabla `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id_subject`);

--
-- Indices de la tabla `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id_teacher`),
  ADD KEY `subject_teacher` (`subject_teacher`),
  ADD KEY `subject_teacher_2` (`subject_teacher`);

--
-- Indices de la tabla `troop`
--
ALTER TABLE `troop`
  ADD PRIMARY KEY (`id_group`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `assistance`
--
ALTER TABLE `assistance`
  MODIFY `id_assistance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `students`
--
ALTER TABLE `students`
  MODIFY `id_students` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT de la tabla `subject`
--
ALTER TABLE `subject`
  MODIFY `id_subject` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id_teacher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `troop`
--
ALTER TABLE `troop`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`group_students`) REFERENCES `troop` (`id_group`);

--
-- Filtros para la tabla `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`subject_teacher`) REFERENCES `subject` (`id_subject`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
