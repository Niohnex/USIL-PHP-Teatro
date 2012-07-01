

INSERT INTO `Obras` (`idObras`, `titulo`, `resena`, `autor`, `fecha_desde`, `fecha_hasta`, `puntaje`, `detalles_extra`, `numeroSitios`, `precio`, `duracion`, `director`, `afiche`) VALUES
(1, 'Lobo estepario', 'La mitica obra del genial Herman Hesse 1935', 'Herman Hesse', '2012-06-14', '2012-06-29', 100, 'Conflicto hombre-animal', '120', 45.00, 120, 1, 'obra1.png'),
(2, 'Andromaca', 'El incesto hecho mito', 'Racine', '2012-06-11', '2012-06-30', 1, 'Teseo en crisis', '140', 60.00, 145, 2, 'obra1.png'),
(3, 'Edipo Rey', 'La tragedia hecha comedia', 'Sofocles', '2012-06-05', '2012-06-22', 78, 'Otros detalles', '34', 67.00, 130, 1, 'obra1.png'),
(4, 'Sueno de una noche de verano', 'Obra de Shakespeare', 'William Shakespeare', '2012-06-06', '2012-06-22', 167, 'Otros detalles', '68', 34.00, 100, 1, 'obra1.png'),
(5, 'Mercader de Venecia', 'Vendiendo tragedias', 'William Shakespeare', '2012-06-03', '2012-06-30', 234, 'Teseo en crisis', '60', 56.00, 110, 1, 'obra1.png');

-- --------------------------------------------------------

INSERT INTO `Obras_has_Horarios` (`Obras_idObras`, `Horarios_idHorarios`, `dia`, `Salas_idSalas`) VALUES
(1, 1, '2012-06-14', 1),
(2, 1, '2012-06-12', 1),
(1, 2, '2012-06-23', 2),
(2, 2, '2012-06-30', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obras_has_participantes`
--

INSERT INTO `Obras_has_Participantes` (`Obras_idObras`, `Participantes_idParticipantes`, `personaje`) VALUES
(1, 1, 'Harry Haller'),
(1, 2, 'Maria'),
(2, 1, 'Teseo'),
(2, 2, 'Medea');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participantes`
--

INSERT INTO `Participantes` (`idParticipantes`, `nombre`, `apellido`, `cargo`, `Cargos_idCargos`) VALUES
(1, 'Herman', 'Hesse', '', 2),
(2, 'Harry', 'Haller', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

INSERT INTO `Roles` (`idRoles`, `nombre`, `descripcion`) VALUES
(1, 'Administrador', 'Administra'),
(2, 'Visitante', 'Visitante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salas`
--

INSERT INTO `Salas` (`idSalas`, `nombre`, `descripcion`) VALUES
(1, 'Sala 1', 'Mas grande sale'),
(2, 'Sala 2', 'Segunda mas grande ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporadas`
--


INSERT INTO `Temporadas` (`idTemporadas`, `nombre`, `descripcion`) VALUES
(1, 'Invierno 2012', 'En invierno'),
(2, 'Primavera 2012', 'En primavera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporadas_has_obras`
--

INSERT INTO `Temporadas_has_Obras` (`Temporadas_idTemporadas`, `Obras_idObras`) VALUES
(2, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

 

INSERT INTO `Usuarios` (`idUsuarios`, `nombre`, `apellido1`, `apellido2`, `usuario`, `clave`, `estado`, `correo`, `Roles_idRoles`) VALUES
(1, 'Alan', 'Barboza', 'Pastrana', 'somicyouth', 'e10adc3949ba59abbe56e057f20f883e', 1, 'alanbarboza@hotmail.com', 2),
(2, 'Reanio', 'Barboza', 'Cieza', 'reni', 'e10adc3949ba59abbe56e057f20f883e', 1, 'reanio@gmail.com', 1);

-- --------------------------------------------------------


INSERT INTO `Votaciones` (`Usuarios_idUsuarios`, `Obras_idObras`, `fecha`, `comentario`) VALUES
(1, 1, '2012-06-30', 'No me gusto'),
(1, 2, '2012-06-29', 'Me gusto'),
(2, 2, '2012-06-30', 'dsfasfsdafd');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categorias_obras`
--
