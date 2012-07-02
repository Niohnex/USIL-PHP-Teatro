-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-07-2012 a las 21:57:47
-- Versión del servidor: 5.5.25
-- Versión de PHP: 5.3.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `504116db2`
--
CREATE DATABASE `504116db2` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `504116db2`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE IF NOT EXISTS `cargos` (
  `idCargos` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCargos`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`idCargos`, `nombre`, `descripcion`) VALUES
(1, 'Actor', 'Participa en la obra'),
(2, 'Staff', 'Colaborador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `idCategorias` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCategorias`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategorias`, `nombre`, `descripcion`) VALUES
(1, 'DRAMA', 'Drama en todo sentido'),
(2, 'Comedia', 'Mate de risa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_obras`
--

CREATE TABLE IF NOT EXISTS `categorias_obras` (
  `Categorias_idCategorias` int(11) NOT NULL,
  `Obras_idObras` int(11) NOT NULL,
  PRIMARY KEY (`Categorias_idCategorias`,`Obras_idObras`),
  KEY `fk_Categorias_obras_Obras1` (`Obras_idObras`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias_obras`
--

INSERT INTO `categorias_obras` (`Categorias_idCategorias`, `Obras_idObras`) VALUES
(2, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE IF NOT EXISTS `horarios` (
  `idHorarios` int(11) NOT NULL,
  `horaInicio` time DEFAULT NULL,
  `horaFin` time DEFAULT NULL,
  PRIMARY KEY (`idHorarios`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`idHorarios`, `horaInicio`, `horaFin`) VALUES
(1, '20:00:00', '22:00:00'),
(2, '00:00:21', '00:00:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obras`
--

CREATE TABLE IF NOT EXISTS `obras` (
  `idObras` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) DEFAULT NULL,
  `resena` varchar(150) DEFAULT NULL,
  `autor` varchar(45) DEFAULT NULL,
  `fecha_desde` date DEFAULT NULL,
  `fecha_hasta` date DEFAULT NULL,
  `puntaje` int(11) DEFAULT NULL,
  `detalles_extra` varchar(120) DEFAULT NULL,
  `numeroSitios` varchar(45) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `duracion` int(11) DEFAULT NULL,
  `director` int(11) NOT NULL,
  `afiche` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idObras`),
  KEY `fk_Obras_Participantes1` (`director`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `obras`
--

INSERT INTO `obras` (`idObras`, `titulo`, `resena`, `autor`, `fecha_desde`, `fecha_hasta`, `puntaje`, `detalles_extra`, `numeroSitios`, `precio`, `duracion`, `director`, `afiche`) VALUES
(1, 'Lobo estepario', 'La mitica obra del genial Herman Hesse 1935', 'Herman Hesse', '2012-06-14', '2012-06-29', 94, 'Conflicto hombre-animal', '120', 45.00, 120, 1, 'obra1.png'),
(2, 'Andromaca', 'El incesto hecho mito', 'Racine', '2012-06-11', '2012-06-30', 16, 'Teseo en crisis', '140', 60.00, 145, 2, 'obra1.png'),
(3, 'Edipo Rey', 'La tragedia hecha comedia', 'Sofocles', '2012-06-05', '2012-06-22', 83, 'Otros detalles', '34', 67.00, 130, 1, 'obra1.png'),
(4, 'Sueno de una noche de verano', 'Obra de Shakespeare', 'William Shakespeare', '2012-06-06', '2012-06-22', 167, 'Otros detalles', '68', 34.00, 100, 1, 'obra1.png'),
(5, 'Mercader de Venecia', 'Vendiendo tragedias', 'William Shakespeare', '2012-06-03', '2012-06-30', 231, 'Teseo en crisis', '60', 56.00, 110, 1, 'obra1.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obras_has_horarios`
--

CREATE TABLE IF NOT EXISTS `obras_has_horarios` (
  `Obras_idObras` int(11) NOT NULL,
  `Horarios_idHorarios` int(11) NOT NULL,
  `dia` date NOT NULL,
  `Salas_idSalas` int(11) NOT NULL,
  PRIMARY KEY (`Obras_idObras`,`Horarios_idHorarios`,`dia`,`Salas_idSalas`),
  KEY `fk_Obras_has_Horarios_Horarios1` (`Horarios_idHorarios`),
  KEY `fk_Obras_has_Horarios_Obras1` (`Obras_idObras`),
  KEY `fk_Obras_has_Horarios_Salas1` (`Salas_idSalas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `obras_has_horarios`
--

INSERT INTO `obras_has_horarios` (`Obras_idObras`, `Horarios_idHorarios`, `dia`, `Salas_idSalas`) VALUES
(1, 1, '2012-06-14', 1),
(2, 1, '2012-06-12', 1),
(1, 2, '2012-06-23', 2),
(2, 2, '2012-06-30', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obras_has_participantes`
--

CREATE TABLE IF NOT EXISTS `obras_has_participantes` (
  `Obras_idObras` int(11) NOT NULL,
  `Participantes_idParticipantes` int(11) NOT NULL,
  `personaje` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Obras_idObras`,`Participantes_idParticipantes`),
  KEY `fk_Obras_has_Participantes_Participantes1` (`Participantes_idParticipantes`),
  KEY `fk_Obras_has_Participantes_Obras1` (`Obras_idObras`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `obras_has_participantes`
--

INSERT INTO `obras_has_participantes` (`Obras_idObras`, `Participantes_idParticipantes`, `personaje`) VALUES
(1, 1, 'Harry Haller'),
(1, 2, 'Maria'),
(2, 1, 'Teseo'),
(2, 2, 'Medea');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participantes`
--

CREATE TABLE IF NOT EXISTS `participantes` (
  `idParticipantes` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `cargo` varchar(45) DEFAULT NULL,
  `Cargos_idCargos` int(11) NOT NULL,
  PRIMARY KEY (`idParticipantes`),
  KEY `fk_Participantes_Cargos1` (`Cargos_idCargos`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `participantes`
--

INSERT INTO `participantes` (`idParticipantes`, `nombre`, `apellido`, `cargo`, `Cargos_idCargos`) VALUES
(1, 'Herman', 'Hesse', '', 2),
(2, 'Harry', 'Haller', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `idRoles` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idRoles`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idRoles`, `nombre`, `descripcion`) VALUES
(1, 'Administrador', 'Administra'),
(2, 'Visitante', 'Visitante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salas`
--

CREATE TABLE IF NOT EXISTS `salas` (
  `idSalas` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idSalas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `salas`
--

INSERT INTO `salas` (`idSalas`, `nombre`, `descripcion`) VALUES
(1, 'Sala 1', 'Mas grande sale'),
(2, 'Sala 2', 'Segunda mas grande ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporadas`
--

CREATE TABLE IF NOT EXISTS `temporadas` (
  `idTemporadas` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTemporadas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `temporadas`
--

INSERT INTO `temporadas` (`idTemporadas`, `nombre`, `descripcion`) VALUES
(1, 'Invierno 2012', 'En invierno'),
(2, 'Primavera 2012', 'En primavera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporadas_has_obras`
--

CREATE TABLE IF NOT EXISTS `temporadas_has_obras` (
  `Temporadas_idTemporadas` int(11) NOT NULL,
  `Obras_idObras` int(11) NOT NULL,
  PRIMARY KEY (`Temporadas_idTemporadas`,`Obras_idObras`),
  KEY `fk_Temporadas_has_Obras_Obras1` (`Obras_idObras`),
  KEY `fk_Temporadas_has_Obras_Temporadas1` (`Temporadas_idTemporadas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `temporadas_has_obras`
--

INSERT INTO `temporadas_has_obras` (`Temporadas_idTemporadas`, `Obras_idObras`) VALUES
(2, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `email` varchar(120) NOT NULL,
  `oauth_uid` varchar(120) NOT NULL,
  `oauth_provider` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `twitter_oauth_token` varchar(120) NOT NULL,
  `twitter_oauth_token_secret` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `oauth_uid`, `oauth_provider`, `username`, `twitter_oauth_token`, `twitter_oauth_token_secret`) VALUES
(0, '', '100000042599434', 'facebook', 'Om Be', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuarios` bigint(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido1` varchar(45) DEFAULT NULL,
  `apellido2` varchar(45) DEFAULT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `clave` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `Roles_idRoles` int(11) NOT NULL,
  PRIMARY KEY (`idUsuarios`),
  KEY `fk_Usuarios_Roles1` (`Roles_idRoles`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuarios`, `nombre`, `apellido1`, `apellido2`, `usuario`, `clave`, `estado`, `correo`, `Roles_idRoles`) VALUES
(1, 'Alan', 'Barboza', 'Pastrana', 'somicyouth', 'e10adc3949ba59abbe56e057f20f883e', 1, 'alanbarboza@hotmail.com', 2),
(2, 'Reanio', 'Barboza', 'Cieza', 'reni', 'e10adc3949ba59abbe56e057f20f883e', 1, 'reanio@gmail.com', 1),
(5980, 'nouveau', 'nouveau', '', 'nouveau', 'b7ede464fdac97e896bb72c67369be17', 1, 'nouveau@nouveau.com', 1),
(6809, 'atarashii', 'atarashii', '', 'atarashii', 'fc1298feeff74b52cea6d7b544ccc9f1', 1, 'atarashii@atarashii.com', 1),
(16487, 'new', 'new', '', 'new', '21232f297a57a5a743894a0e4a801fc3', 1, 'new@new.com', 1),
(112284526, NULL, NULL, NULL, 'Joel Ibaceta', NULL, NULL, NULL, 0),
(595677923, NULL, NULL, NULL, 'omar barboza', NULL, NULL, NULL, 0),
(1207084774, NULL, NULL, NULL, 'Jl Neoh', NULL, NULL, NULL, 0),
(100000042599434, NULL, NULL, NULL, 'Om Be', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votaciones`
--

CREATE TABLE IF NOT EXISTS `votaciones` (
  `Usuarios_idUsuarios` bigint(11) NOT NULL,
  `Obras_idObras` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `comentario` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`Usuarios_idUsuarios`,`Obras_idObras`),
  KEY `fk_Votaciones_Obras1` (`Obras_idObras`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `votaciones`
--

INSERT INTO `votaciones` (`Usuarios_idUsuarios`, `Obras_idObras`, `fecha`, `comentario`) VALUES
(1, 1, '2012-06-30', 'No me gusto'),
(1, 2, '2012-06-29', 'Me gusto'),
(2, 2, '2012-06-30', 'dsfasfsdafd'),
(5980, 2, '2012-07-01', 'Voto de nouveau'),
(595677923, 1, '2012-07-01', 'Voto del lobo estepario'),
(595677923, 2, '2012-07-01', 'dsfasdfdsaf'),
(100000042599434, 1, '2012-07-01', 'Probando usuario facebook'),
(100000042599434, 3, '2012-07-01', ''),
(100000042599434, 5, '2012-07-01', '');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categorias_obras`
--
ALTER TABLE `categorias_obras`
  ADD CONSTRAINT `fk_Categorias_obras_Categorias` FOREIGN KEY (`Categorias_idCategorias`) REFERENCES `categorias` (`idCategorias`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Categorias_obras_Obras1` FOREIGN KEY (`Obras_idObras`) REFERENCES `obras` (`idObras`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `obras`
--
ALTER TABLE `obras`
  ADD CONSTRAINT `fk_Obras_Participantes1` FOREIGN KEY (`director`) REFERENCES `participantes` (`idParticipantes`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `obras_has_horarios`
--
ALTER TABLE `obras_has_horarios`
  ADD CONSTRAINT `fk_Obras_has_Horarios_Horarios1` FOREIGN KEY (`Horarios_idHorarios`) REFERENCES `horarios` (`idHorarios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Obras_has_Horarios_Obras1` FOREIGN KEY (`Obras_idObras`) REFERENCES `obras` (`idObras`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Obras_has_Horarios_Salas1` FOREIGN KEY (`Salas_idSalas`) REFERENCES `salas` (`idSalas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `obras_has_participantes`
--
ALTER TABLE `obras_has_participantes`
  ADD CONSTRAINT `fk_Obras_has_Participantes_Obras1` FOREIGN KEY (`Obras_idObras`) REFERENCES `obras` (`idObras`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Obras_has_Participantes_Participantes1` FOREIGN KEY (`Participantes_idParticipantes`) REFERENCES `participantes` (`idParticipantes`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `participantes`
--
ALTER TABLE `participantes`
  ADD CONSTRAINT `fk_Participantes_Cargos1` FOREIGN KEY (`Cargos_idCargos`) REFERENCES `cargos` (`idCargos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
