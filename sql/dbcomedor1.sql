-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-07-2015 a las 09:26:11
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `dbcomedor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE IF NOT EXISTS `asistencia` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `comensal_id` int(10) unsigned NOT NULL,
  `turno_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `asistencia_comensal_id_foreign` (`comensal_id`),
  KEY `asistencia_turno_id_foreign` (`turno_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`id`, `fecha`, `comensal_id`, `turno_id`) VALUES
(1, '2015-06-01', 4, 1),
(2, '2015-06-01', 4, 2),
(3, '2015-06-01', 4, 3),
(4, '2015-06-02', 4, 1),
(5, '2015-06-02', 4, 2),
(6, '2015-06-03', 4, 1),
(7, '2015-06-03', 4, 2),
(8, '2015-06-03', 4, 3),
(9, '2015-06-04', 4, 1),
(10, '2015-06-04', 4, 3),
(11, '2015-06-05', 4, 1),
(12, '2015-06-05', 4, 2),
(13, '2015-06-05', 4, 3),
(14, '2015-06-06', 4, 2),
(15, '2015-06-06', 4, 3),
(16, '2015-06-07', 4, 1),
(17, '2015-06-07', 4, 2),
(19, '2015-06-07', 4, 3),
(20, '2015-06-08', 4, 1),
(21, '2015-06-08', 4, 2),
(22, '2015-06-08', 3, 2),
(23, '2015-06-17', 3, 3),
(24, '2015-07-03', 2, 1),
(25, '2015-07-03', 14, 1),
(26, '2015-07-06', 13, 1),
(27, '2015-07-06', 14, 1),
(28, '2015-07-06', 2, 1),
(29, '2015-07-06', 18, 1),
(30, '2015-07-06', 23, 1),
(31, '2015-07-06', 31, 1),
(32, '2015-07-06', 32, 1),
(33, '2015-07-06', 33, 1),
(34, '2015-07-06', 16, 1),
(35, '2015-07-06', 4, 1),
(36, '2015-07-06', 22, 1),
(37, '2015-07-06', 14, 2),
(38, '2015-07-06', 4, 3),
(39, '2015-07-06', 40, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comensales`
--

CREATE TABLE IF NOT EXISTS `comensales` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dni` char(8) NOT NULL,
  `ape_paterno` varchar(50) NOT NULL,
  `ape_maerno` varchar(50) NOT NULL,
  `nombre` varchar(75) NOT NULL,
  `codigo_comensal` char(10) NOT NULL,
  `institucion_id` int(10) unsigned NOT NULL,
  `tipocomensal_id` int(10) unsigned NOT NULL,
  `facultad` varchar(75) DEFAULT NULL,
  `escuela` varchar(75) DEFAULT NULL,
  `num_matricula` char(10) DEFAULT NULL,
  `programa_id` int(10) unsigned NOT NULL,
  `fecha_exp` date NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `comensales_institucion_id_foreign` (`institucion_id`),
  KEY `comensales_tipocomensal_id_foreign` (`tipocomensal_id`),
  KEY `comensales_programa_id_foreign` (`programa_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Volcado de datos para la tabla `comensales`
--

INSERT INTO `comensales` (`id`, `dni`, `ape_paterno`, `ape_maerno`, `nombre`, `codigo_comensal`, `institucion_id`, `tipocomensal_id`, `facultad`, `escuela`, `num_matricula`, `programa_id`, `fecha_exp`, `estado`, `created_at`, `updated_at`) VALUES
(1, '74051801', 'Altamirano', 'Guevara', 'Neyder', '12345', 1, 1, 'Ingenieria', 'Sistemas', '1023300611', 1, '2015-06-30', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '70662924', 'CRUZ', 'CRUZ', 'JERSSON EDUARDO', '0000000002', 1, 3, NULL, NULL, NULL, 1, '2015-06-01', 1, '2015-06-01 05:00:00', '2015-06-01 05:00:00'),
(3, '4567890', 'Valderrama', 'Valderrama', 'Edgar', '0000000001', 1, 3, NULL, NULL, NULL, 2, '2015-06-01', 1, '2015-06-01 05:00:00', '2015-06-01 05:00:00'),
(4, '12345689', 'huaman', 'huaman', 'luis', '0000012345', 1, 3, NULL, NULL, NULL, 2, '2015-06-01', 1, '2015-06-01 05:00:00', '2015-06-01 05:00:00'),
(13, '41526387', 'IBAÃ‘EZ', 'IBAÃ‘EZ', 'Ivette', '1000000003', 1, 3, NULL, NULL, NULL, 3, '2015-06-05', 1, '2015-06-05 05:00:00', '2015-06-05 05:00:00'),
(14, '41526387', 'GONZALES', 'GONZALES', 'GRECIA', '1000000004', 1, 3, NULL, NULL, NULL, 3, '2015-06-05', 1, '2015-06-05 05:00:00', '2015-06-05 05:00:00'),
(15, '74859632', 'PASCO', 'PASCO', 'FABIOLA', '1000000005', 1, 3, NULL, NULL, NULL, 3, '2015-06-05', 1, '2015-06-05 05:00:00', '2015-06-05 05:00:00'),
(16, '70660925', 'Cruz', 'Cruz', 'Jersson Eduardo', '1000000006', 1, 3, NULL, NULL, NULL, 3, '2015-06-07', 1, '2015-06-07 05:00:00', '2015-07-08 05:00:00'),
(17, '19033305', 'Cruz', 'Reyes', 'Angelita', '1000000007', 1, 3, NULL, NULL, NULL, 3, '2015-06-07', 1, '2015-06-07 05:00:00', '2015-06-07 05:00:00'),
(18, '70665520', 'Garcia', 'Pelaes', 'Oscar', '1100000009', 1, 3, NULL, NULL, NULL, 3, '2015-06-08', 1, '2015-06-08 05:00:00', '2015-06-08 05:00:00'),
(19, '70665520', 'Garcia', 'Pelaes', 'Oscar', '1000000008', 1, 3, NULL, NULL, NULL, 3, '2015-06-08', 1, '2015-06-08 05:00:00', '2015-06-08 05:00:00'),
(20, '70665520', 'Garcia', 'Pelaes', 'Oscar', '1000000009', 1, 3, NULL, NULL, NULL, 3, '2015-06-08', 1, '2015-06-08 05:00:00', '2015-06-08 05:00:00'),
(21, '70665521', 'bac', 'jers', 'jejej', '1000000011', 1, 3, NULL, NULL, NULL, 3, '2015-06-08', 1, '2015-06-08 05:00:00', '2015-06-08 05:00:00'),
(22, '70665529', 'Salazar', 'Sanchez', 'Eduardo', '1000000012', 1, 3, NULL, NULL, NULL, 3, '2015-06-08', 1, '2015-06-08 05:00:00', '2015-06-08 05:00:00'),
(23, '74859632', 'Altamirano', 'Guevara', 'Neyder', '1000000013', 1, 3, NULL, NULL, NULL, 3, '2015-06-08', 1, '2015-06-08 05:00:00', '2015-06-08 05:00:00'),
(24, '19032574', 'Vega', 'Santos', 'jOrge', '1000000012', 1, 3, NULL, NULL, NULL, 3, '2015-06-17', 1, '2015-06-17 05:00:00', '2015-06-17 05:00:00'),
(29, '19033605', 'Carmona', 'Gutierez', 'Jaqueline', '1000000014', 1, 3, NULL, NULL, NULL, 3, '2015-06-29', 1, '2015-06-29 05:00:00', '2015-06-29 05:00:00'),
(30, '17033305', 'Zavaleta', 'Bacilio', 'Jefersson', '1000000015', 1, 3, NULL, NULL, NULL, 3, '2015-06-29', 1, '2015-06-29 05:00:00', '2015-06-29 05:00:00'),
(31, '19253684', 'Cabrera', 'Gonzales', 'Roberto', '1000000016', 2, 3, NULL, NULL, NULL, 3, '2015-06-29', 1, '2015-06-29 05:00:00', '2015-06-29 05:00:00'),
(32, '19023645', 'Guzman', 'Pasco', 'Fabi', '1000000017', 1, 3, NULL, NULL, NULL, 3, '2015-06-30', 1, '2015-06-30 05:00:00', '2015-06-30 05:00:00'),
(33, '19023665', 'Montoya', 'Rodriguez', 'Roxana', '1000000018', 1, 3, NULL, NULL, NULL, 3, '2015-06-30', 1, '2015-06-30 05:00:00', '2015-06-30 05:00:00'),
(34, '70556389', 'Estrada', 'Iglesias', 'Cesar', '1000000019', 1, 3, NULL, NULL, NULL, 3, '2015-06-30', 1, '2015-06-30 05:00:00', '2015-06-30 05:00:00'),
(35, '74856321', 'Guzman', 'Sanche', 'Karen', '1000000020', 1, 3, NULL, NULL, NULL, 3, '2015-06-30', 1, '2015-06-30 05:00:00', '2015-06-30 05:00:00'),
(36, '78456321', 'Sanchez', 'Carranza', 'Karito', '1000000021', 1, 3, NULL, NULL, NULL, 3, '2015-06-30', 1, '2015-06-30 05:00:00', '2015-06-30 05:00:00'),
(37, '74758410', 'Perez', 'Zavaleta', 'Jeniffer', '1000000022', 1, 3, NULL, NULL, NULL, 2, '2015-06-30', 1, '2015-06-30 05:00:00', '2015-06-30 05:00:00'),
(38, '78192536', 'Ruiz', 'Vera', 'Geovani', '1000000023', 1, 3, NULL, NULL, NULL, 1, '2015-06-30', 1, '2015-06-30 05:00:00', '2015-06-30 05:00:00'),
(39, '47242029', 'Mantilla ', 'Quijano', 'John', '4564567898', 1, 3, NULL, NULL, NULL, 1, '2015-07-06', 1, '2015-07-06 05:00:00', '2015-07-06 05:00:00'),
(40, '47242029', 'CHAVEZ', 'GONZALES', 'GRECIA ESTHER', '6666666666', 1, 3, NULL, NULL, NULL, 1, '2015-07-06', 1, '2015-07-06 05:00:00', '2015-07-06 05:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cronogramas_comensal`
--

CREATE TABLE IF NOT EXISTS `cronogramas_comensal` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dias_habiles` int(11) NOT NULL,
  `estado_pago` tinyint(1) DEFAULT NULL,
  `comensal_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `cronogramas_comensal_comensal_id_foreign` (`comensal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `cronogramas_comensal`
--

INSERT INTO `cronogramas_comensal` (`id`, `dias_habiles`, `estado_pago`, `comensal_id`, `created_at`, `updated_at`) VALUES
(1, 30, 1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cronogramas_servicio`
--

CREATE TABLE IF NOT EXISTS `cronogramas_servicio` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `comensal_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cronogramas_servicio_comensal_id_foreign` (`comensal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=188 ;

--
-- Volcado de datos para la tabla `cronogramas_servicio`
--

INSERT INTO `cronogramas_servicio` (`id`, `fecha`, `estado`, `comensal_id`) VALUES
(1, '2015-06-01', 1, 4),
(2, '2015-07-01', 1, 13),
(3, '2015-07-02', 1, 13),
(4, '2015-07-03', 1, 13),
(5, '2015-07-04', 1, 13),
(6, '2015-07-05', 1, 13),
(7, '2015-07-06', 1, 13),
(8, '2015-07-07', 1, 13),
(9, '2015-07-08', 1, 13),
(10, '2015-07-09', 1, 13),
(11, '2015-07-10', 1, 13),
(12, '2015-07-11', 1, 13),
(13, '2015-07-12', 1, 13),
(14, '2015-07-13', 1, 13),
(15, '2015-07-14', 1, 13),
(16, '2015-07-15', 1, 13),
(17, '2015-07-16', 1, 13),
(18, '2015-07-17', 1, 13),
(19, '2015-07-18', 1, 13),
(20, '2015-07-19', 1, 13),
(21, '2015-07-20', 1, 13),
(22, '2015-07-21', 1, 13),
(23, '2015-07-22', 1, 13),
(24, '2015-07-23', 1, 13),
(25, '2015-07-24', 1, 13),
(26, '2015-07-25', 1, 13),
(27, '2015-07-26', 1, 13),
(28, '2015-07-27', 1, 13),
(29, '2015-07-28', 1, 13),
(30, '2015-07-29', 1, 13),
(31, '2015-07-30', 1, 13),
(32, '2015-07-31', 1, 13),
(33, '2015-07-01', 1, 14),
(34, '2015-07-02', 1, 14),
(35, '2015-07-03', 1, 14),
(36, '2015-07-04', 1, 14),
(37, '2015-07-05', 1, 14),
(38, '2015-07-06', 1, 14),
(39, '2015-07-07', 1, 14),
(40, '2015-07-08', 1, 14),
(41, '2015-07-09', 1, 14),
(42, '2015-07-10', 1, 14),
(43, '2015-07-11', 1, 14),
(44, '2015-07-12', 1, 14),
(45, '2015-07-13', 1, 14),
(46, '2015-07-14', 1, 14),
(47, '2015-07-15', 1, 14),
(48, '2015-07-16', 1, 14),
(49, '2015-07-17', 1, 14),
(50, '2015-07-18', 1, 14),
(51, '2015-07-19', 1, 14),
(52, '2015-07-20', 1, 14),
(53, '2015-07-21', 1, 14),
(54, '2015-07-22', 1, 14),
(55, '2015-07-23', 1, 14),
(56, '2015-07-24', 1, 14),
(57, '2015-07-25', 1, 14),
(58, '2015-07-26', 1, 14),
(59, '2015-07-27', 1, 14),
(60, '2015-07-28', 1, 14),
(61, '2015-07-29', 1, 14),
(62, '2015-07-30', 1, 14),
(63, '2015-07-31', 1, 14),
(64, '2015-07-01', 1, 15),
(65, '2015-07-02', 1, 15),
(66, '2015-07-03', 1, 15),
(67, '2015-07-04', 1, 15),
(68, '2015-07-05', 1, 15),
(69, '2015-07-06', 1, 15),
(70, '2015-07-07', 1, 15),
(71, '2015-07-08', 1, 15),
(72, '2015-07-09', 1, 15),
(73, '2015-07-10', 1, 15),
(74, '2015-07-11', 1, 15),
(75, '2015-07-12', 1, 15),
(76, '2015-07-13', 1, 15),
(77, '2015-07-14', 1, 15),
(78, '2015-07-15', 1, 15),
(79, '2015-07-16', 1, 15),
(80, '2015-07-17', 1, 15),
(81, '2015-07-18', 1, 15),
(82, '2015-07-19', 1, 15),
(83, '2015-07-20', 1, 15),
(84, '2015-07-21', 1, 15),
(85, '2015-07-22', 1, 15),
(86, '2015-07-23', 1, 15),
(87, '2015-07-24', 1, 15),
(88, '2015-07-25', 1, 15),
(89, '2015-07-26', 1, 15),
(90, '2015-07-27', 1, 15),
(91, '2015-07-28', 1, 15),
(92, '2015-07-29', 1, 15),
(93, '2015-07-30', 1, 15),
(94, '2015-07-31', 1, 15),
(95, '2015-07-01', 1, 16),
(96, '2015-07-02', 1, 16),
(97, '2015-07-03', 1, 16),
(98, '2015-07-04', 1, 16),
(99, '2015-07-05', 1, 16),
(100, '2015-07-06', 1, 16),
(101, '2015-07-07', 1, 16),
(102, '2015-07-08', 1, 16),
(103, '2015-07-09', 1, 16),
(104, '2015-07-10', 1, 16),
(105, '2015-07-11', 1, 16),
(106, '2015-07-12', 1, 16),
(107, '2015-07-13', 1, 16),
(108, '2015-07-14', 1, 16),
(109, '2015-07-15', 1, 16),
(110, '2015-07-16', 1, 16),
(111, '2015-07-17', 1, 16),
(112, '2015-07-18', 1, 16),
(113, '2015-07-19', 1, 16),
(114, '2015-07-20', 1, 16),
(115, '2015-07-21', 1, 16),
(116, '2015-07-22', 1, 16),
(117, '2015-07-23', 1, 16),
(118, '2015-07-24', 1, 16),
(119, '2015-07-25', 1, 16),
(120, '2015-07-26', 1, 16),
(121, '2015-07-27', 1, 16),
(122, '2015-07-28', 1, 16),
(123, '2015-07-29', 1, 16),
(124, '2015-07-30', 1, 16),
(125, '2015-07-31', 1, 16),
(126, '2015-07-01', 1, 4),
(127, '2015-07-02', 1, 4),
(128, '2015-07-03', 1, 4),
(129, '2015-07-04', 1, 4),
(130, '2015-07-05', 1, 4),
(131, '2015-07-06', 1, 4),
(132, '2015-07-07', 1, 4),
(133, '2015-07-08', 1, 4),
(134, '2015-07-09', 1, 4),
(135, '2015-07-10', 1, 4),
(136, '2015-07-11', 1, 4),
(137, '2015-07-12', 1, 4),
(138, '2015-07-13', 0, 4),
(139, '2015-07-14', 0, 4),
(140, '2015-07-15', 0, 4),
(141, '2015-07-16', 0, 4),
(142, '2015-07-17', 0, 4),
(143, '2015-07-18', 0, 4),
(144, '2015-07-19', 0, 4),
(145, '2015-07-20', 0, 4),
(146, '2015-07-21', 1, 4),
(147, '2015-07-22', 0, 4),
(148, '2015-07-23', 0, 4),
(149, '2015-07-24', 0, 4),
(150, '2015-07-25', 0, 4),
(151, '2015-07-26', 0, 4),
(152, '2015-07-27', 0, 4),
(153, '2015-07-28', 0, 4),
(154, '2015-07-29', 0, 4),
(155, '2015-07-30', 0, 4),
(156, '2015-07-31', 1, 4),
(157, '2015-07-01', 0, 40),
(158, '2015-07-02', 0, 40),
(159, '2015-07-03', 0, 40),
(160, '2015-07-04', 0, 40),
(161, '2015-07-05', 0, 40),
(162, '2015-07-06', 1, 40),
(163, '2015-07-07', 1, 40),
(164, '2015-07-08', 1, 40),
(165, '2015-07-09', 1, 40),
(166, '2015-07-10', 1, 40),
(167, '2015-07-11', 1, 40),
(168, '2015-07-12', 1, 40),
(169, '2015-07-13', 0, 40),
(170, '2015-07-14', 0, 40),
(171, '2015-07-15', 0, 40),
(172, '2015-07-16', 0, 40),
(173, '2015-07-17', 0, 40),
(174, '2015-07-18', 0, 40),
(175, '2015-07-19', 0, 40),
(176, '2015-07-20', 0, 40),
(177, '2015-07-21', 0, 40),
(178, '2015-07-22', 0, 40),
(179, '2015-07-23', 0, 40),
(180, '2015-07-24', 0, 40),
(181, '2015-07-25', 0, 40),
(182, '2015-07-26', 0, 40),
(183, '2015-07-27', 0, 40),
(184, '2015-07-28', 0, 40),
(185, '2015-07-29', 0, 40),
(186, '2015-07-30', 0, 40),
(187, '2015-07-31', 0, 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escuela`
--

CREATE TABLE IF NOT EXISTS `escuela` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(60) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `facultad_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `facultad_id` (`facultad_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `escuela`
--

INSERT INTO `escuela` (`id`, `descripcion`, `estado`, `facultad_id`) VALUES
(1, 'Ingeniería Civil', 1, 1),
(2, 'Ingeniería Industrial', 1, 1),
(3, 'Ingeniería de Materiales', 1, 1),
(4, 'Ingeniería Mecánica', 1, 1),
(5, 'Ingeniería de Sisemas', 1, 1),
(6, 'Educación Inicial', 1, 2),
(7, 'Eduación Primaria', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE IF NOT EXISTS `facultad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(60) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`id`, `descripcion`, `estado`) VALUES
(1, 'Ingenieria', 1),
(2, 'Educación y Ciencias de la Comunicación', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instituciones`
--

CREATE TABLE IF NOT EXISTS `instituciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `instituciones`
--

INSERT INTO `instituciones` (`id`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'UNIVERSIDAD NACIONAL DE TRUJILLO', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'CIDUNT', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'CEPUNT', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'NARVAEZ CADENILLAS', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `padre` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`id`, `padre`, `nombre`, `url`, `estado`, `created_at`, `updated_at`) VALUES
(1, 2, 'ADMINISTRAR', 'vista/administrar', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 0, 'OPERACIONES', '#', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 2, 'REGULARIZAR', 'vista/regularizar', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 2, 'CRONOGRAMA', 'vista/cronograma', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 2, 'REGISTRAR ASISTENCIA', 'vista/registarAsistencia', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 3, 'HISTORIAL POR ALUMNO', 'vista/historialAlumno', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 2, 'Registro Comensal', 'vista/registrocomensal', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 3, 'Comensales Registrados', 'vista/comensalesregistrados', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 2, 'PARAMETROS', 'vista/adminparametros', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 3, 'REPORTES', 'vista/reportes', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_06_01_043024_crear_tabla_usuarios', 1),
('2015_06_01_043154_crear_tabla_roles', 1),
('2015_06_01_043320_crear_tabla_menus', 1),
('2015_06_01_043408_crear_tabla_programas', 1),
('2015_06_01_043449_crear_tabla_instituciones', 1),
('2015_06_01_043558_crear_tabla_tipocomensales', 1),
('2015_06_01_043942_crear_tabla_turnos', 1),
('2015_06_01_043116_crear_tabla_usuario_rol', 2),
('2015_06_01_043238_crear_tabla_rol_menu', 2),
('2015_06_01_043640_crear_tabla_comensales', 2),
('2015_06_01_043730_crear_tabla_cronogramas_comensal', 2),
('2015_06_01_043903_crear_tabla_cronogramaservicio', 2),
('2015_06_01_044425_crear_tabla_asistencia', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametros`
--

CREATE TABLE IF NOT EXISTS `parametros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` int(11) NOT NULL,
  `anio` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_termino` date NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE IF NOT EXISTS `programas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `programas`
--

INSERT INTO `programas` (`id`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'BECA', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'MEDIA BECA', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'PROGRAMA A', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regularizaciones`
--

CREATE TABLE IF NOT EXISTS `regularizaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comensal_id` int(11) NOT NULL,
  `fecha_registro` date NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `img_voucher` varchar(45) NOT NULL,
  `img_ficham` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comensal_id` (`comensal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(60) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Registrador', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Comensal', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_menu`
--

CREATE TABLE IF NOT EXISTS `rol_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rol_id` int(10) unsigned NOT NULL,
  `menu_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rol_menu_rol_id_foreign` (`rol_id`),
  KEY `rol_menu_menu_id_foreign` (`menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `rol_menu`
--

INSERT INTO `rol_menu` (`id`, `rol_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(6, 2, 2),
(8, 3, 6),
(9, 1, 7),
(10, 1, 8),
(11, 1, 9),
(12, 1, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_comensal`
--

CREATE TABLE IF NOT EXISTS `tipos_comensal` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tipos_comensal`
--

INSERT INTO `tipos_comensal` (`id`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Administrativo', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Docente', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Alumno', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--

CREATE TABLE IF NOT EXISTS `trabajador` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dni` char(8) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `trabajador`
--

INSERT INTO `trabajador` (`id`, `dni`, `apellidos`, `nombres`, `correo`, `estado`, `created_at`, `updated_at`) VALUES
(1, '74859632', 'Sanchez Diaz', 'Carlos Eduardo', 'satarete@htomail.com', 1, '2015-06-08 05:00:00', '2015-06-17 05:00:00'),
(2, '74853254', 'LarousÃ© Femerou', 'Geraldine', 'geraldine@hotmail.com', 1, '2015-06-17 05:00:00', '2015-06-17 05:00:00'),
(3, '34567892', 'Chavez Gonzales', 'favio', 'favioc@gmail.com', 1, '2015-07-06 05:00:00', '2015-07-06 05:00:00'),
(4, '12345678', 'Campos Gutierrez', 'Melisa', 'mellisa3@hotmail.com', 1, '2015-07-06 05:00:00', '2015-07-06 05:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE IF NOT EXISTS `turnos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `hora_inicio` int(11) NOT NULL,
  `hora_fin` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`id`, `descripcion`, `hora_inicio`, `hora_fin`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Turno mañana', 6, 8, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Turno tarde', 12, 14, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Turno noche', 18, 19, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universitario_unt`
--

CREATE TABLE IF NOT EXISTS `universitario_unt` (
  `comensal_id` int(11) NOT NULL,
  `escuela_id` int(11) NOT NULL,
  `cod_matricula` char(10) NOT NULL,
  PRIMARY KEY (`comensal_id`),
  KEY `escuela_id` (`escuela_id`),
  KEY `comensal_id` (`comensal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `universitario_unt`
--

INSERT INTO `universitario_unt` (`comensal_id`, `escuela_id`, `cod_matricula`) VALUES
(29, 5, ''),
(30, 5, ''),
(36, 5, ''),
(37, 5, ''),
(39, 5, ''),
(40, 5, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `id_comensal` int(11) DEFAULT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  `id_trabajador` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `estado`, `created_at`, `updated_at`, `id_comensal`, `imagen`, `id_trabajador`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL),
(3, 'Carlos', '123456', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL),
(4, 'ivette', '123456', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 13, NULL, NULL),
(5, 'grecia', '123', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 14, NULL, NULL),
(6, 'fabi', '123', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 15, NULL, NULL),
(7, 'jersson', '123456', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 16, NULL, NULL),
(8, 'angelita', '123456', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 17, NULL, NULL),
(9, 'oscar', '123', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 18, NULL, NULL),
(10, 'jerss', '123', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 18, NULL, NULL),
(11, 'edu', '123', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 18, 'foto11', NULL),
(12, 'edu1', '123', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 21, 'foto12', NULL),
(13, 'edu10', '123', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 22, NULL, NULL),
(14, 'sarate', 'd41d8cd98f00b204e9800998ecf8427e', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, 1),
(15, 'Luis', '202cb962ac59075b964b07152d234b70', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 4, NULL, NULL),
(16, 'geraldine', 'd41d8cd98f00b204e9800998ecf8427e', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, 2),
(17, 'jorge', '202cb962ac59075b964b07152d234b70', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 22, NULL, NULL),
(18, 'jaqui', '202cb962ac59075b964b07152d234b70', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 29, NULL, NULL),
(19, 'jeferson', '202cb962ac59075b964b07152d234b70', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 30, NULL, NULL),
(20, 'roberto', '202cb962ac59075b964b07152d234b70', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 31, NULL, NULL),
(21, 'fabicita', '202cb962ac59075b964b07152d234b70', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 32, NULL, NULL),
(22, 'roxi', '202cb962ac59075b964b07152d234b70', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 33, NULL, NULL),
(23, 'cesar', '202cb962ac59075b964b07152d234b70', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 34, NULL, NULL),
(24, 'karen', '202cb962ac59075b964b07152d234b70', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 35, NULL, NULL),
(25, 'karito', '202cb962ac59075b964b07152d234b70', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 36, NULL, NULL),
(26, 'jeni', '202cb962ac59075b964b07152d234b70', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 37, NULL, NULL),
(27, 'geo', '202cb962ac59075b964b07152d234b70', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 38, NULL, NULL),
(28, 'fchav', '202cb962ac59075b964b07152d234b70', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, 3),
(29, 'rmelisa', '202cb962ac59075b964b07152d234b70', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, 4),
(30, 'jmantilla', '202cb962ac59075b964b07152d234b70', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 39, NULL, NULL),
(31, 'wachos', '202cb962ac59075b964b07152d234b70', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 40, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_rol`
--

CREATE TABLE IF NOT EXISTS `usuario_rol` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_id` int(10) unsigned NOT NULL,
  `rol_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_rol_usuario_id_foreign` (`usuario_id`),
  KEY `usuario_rol_rol_id_foreign` (`rol_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Volcado de datos para la tabla `usuario_rol`
--

INSERT INTO `usuario_rol` (`id`, `usuario_id`, `rol_id`) VALUES
(2, 1, 1),
(3, 3, 2),
(4, 7, 3),
(5, 8, 3),
(6, 9, 3),
(7, 10, 3),
(8, 11, 3),
(9, 12, 3),
(10, 13, 3),
(11, 14, 1),
(12, 15, 3),
(13, 16, 2),
(14, 17, 3),
(15, 18, 3),
(16, 19, 3),
(17, 20, 3),
(18, 21, 3),
(19, 22, 3),
(20, 23, 3),
(21, 24, 3),
(22, 25, 3),
(23, 26, 3),
(24, 27, 3),
(25, 28, 2),
(26, 29, 2),
(27, 30, 3),
(28, 31, 3);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asistencia_comensal_id_foreign` FOREIGN KEY (`comensal_id`) REFERENCES `comensales` (`id`),
  ADD CONSTRAINT `asistencia_turno_id_foreign` FOREIGN KEY (`turno_id`) REFERENCES `turnos` (`id`);

--
-- Filtros para la tabla `comensales`
--
ALTER TABLE `comensales`
  ADD CONSTRAINT `comensales_institucion_id_foreign` FOREIGN KEY (`institucion_id`) REFERENCES `instituciones` (`id`),
  ADD CONSTRAINT `comensales_programa_id_foreign` FOREIGN KEY (`programa_id`) REFERENCES `programas` (`id`),
  ADD CONSTRAINT `comensales_tipocomensal_id_foreign` FOREIGN KEY (`tipocomensal_id`) REFERENCES `tipos_comensal` (`id`);

--
-- Filtros para la tabla `cronogramas_comensal`
--
ALTER TABLE `cronogramas_comensal`
  ADD CONSTRAINT `cronogramas_comensal_comensal_id_foreign` FOREIGN KEY (`comensal_id`) REFERENCES `comensales` (`id`);

--
-- Filtros para la tabla `cronogramas_servicio`
--
ALTER TABLE `cronogramas_servicio`
  ADD CONSTRAINT `cronogramas_servicio_comensal_id_foreign` FOREIGN KEY (`comensal_id`) REFERENCES `comensales` (`id`);

--
-- Filtros para la tabla `escuela`
--
ALTER TABLE `escuela`
  ADD CONSTRAINT `escuela_ibfk_1` FOREIGN KEY (`facultad_id`) REFERENCES `facultad` (`id`);

--
-- Filtros para la tabla `rol_menu`
--
ALTER TABLE `rol_menu`
  ADD CONSTRAINT `rol_menu_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`),
  ADD CONSTRAINT `rol_menu_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);

--
-- Filtros para la tabla `universitario_unt`
--
ALTER TABLE `universitario_unt`
  ADD CONSTRAINT `uunt_ecuela_id_foreign` FOREIGN KEY (`escuela_id`) REFERENCES `escuela` (`id`);

--
-- Filtros para la tabla `usuario_rol`
--
ALTER TABLE `usuario_rol`
  ADD CONSTRAINT `usuario_rol_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `usuario_rol_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
