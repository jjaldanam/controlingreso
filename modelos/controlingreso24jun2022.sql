-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2022 a las 00:27:00
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `controlingreso`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistentes`
--

CREATE TABLE `asistentes` (
  `nidentidad` decimal(10,0) UNSIGNED ZEROFILL NOT NULL,
  `nomyape` varchar(100) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `dependencia` varchar(50) NOT NULL,
  `fechacreacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historico`
--

CREATE TABLE `historico` (
  `nidentidad` decimal(10,0) UNSIGNED ZEROFILL NOT NULL,
  `tipoevento` varchar(7) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `cod_libro` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombrelibro` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha_apertura` date NOT NULL,
  `fecha_cierre` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`cod_libro`, `nombrelibro`, `fecha_apertura`, `fecha_cierre`) VALUES
('BA00000001', 'BAUTISMOS TOMO 1', '2015-05-12', '2018-08-15'),
('BA00000002', 'BAUTISMOS TOMO 2', '2018-08-16', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parroquia`
--

CREATE TABLE `parroquia` (
  `cod-parroquia` int(11) NOT NULL,
  `nombre-parroquia` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `direccion` text COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `ciudad` text COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `nit` tinytext COLLATE utf8mb4_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `parroquia`
--

INSERT INTO `parroquia` (`cod-parroquia`, `nombre-parroquia`, `direccion`, `ciudad`, `nit`) VALUES
(1, 'La Valvanera', 'Carrera 2 Calle 2', 'Pitalito', '123456789-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidasbautismos`
--

CREATE TABLE `partidasbautismos` (
  `numpartida` smallint(4) UNSIGNED ZEROFILL NOT NULL,
  `codlibro` smallint(4) UNSIGNED ZEROFILL NOT NULL,
  `folio` smallint(4) NOT NULL,
  `fechacelebracion` date NOT NULL,
  `fechanacimiento` date DEFAULT NULL,
  `lugarbautismo` text COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `celebrante` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `bautizado` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `bautizadosexo` tinytext COLLATE utf8mb4_spanish2_ci NOT NULL,
  `bautizadotipodoc` tinytext COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `bautizadonumdoc` tinytext COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `tipofiliacion` tinytext COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `madre` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `madreestadocivil` tinytext COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `padre` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `padreestadocivil` tinytext COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `padrino` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `madrina` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `abuelamaterna` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `abuelomaterno` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `abuelapaterna` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `abuelopaterno` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `estado` tinyint(1) NOT NULL,
  `fechacreacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `partidasbautismos`
--

INSERT INTO `partidasbautismos` (`numpartida`, `codlibro`, `folio`, `fechacelebracion`, `fechanacimiento`, `lugarbautismo`, `celebrante`, `bautizado`, `bautizadosexo`, `bautizadotipodoc`, `bautizadonumdoc`, `tipofiliacion`, `madre`, `madreestadocivil`, `padre`, `padreestadocivil`, `padrino`, `madrina`, `abuelamaterna`, `abuelomaterno`, `abuelapaterna`, `abuelopaterno`, `estado`, `fechacreacion`) VALUES
(0001, 0001, 25, '1984-06-13', '1984-05-13', 'Ibague Tolima', 'TITO PUENTE', 'maria', 'F', NULL, NULL, NULL, 'GEORGINA MONTEALEGRE CARDENAS', NULL, 'TOBIAS ALDANA CASTRO', NULL, 'JORGE MONTEALEGRE CARDENAS', 'madrina1', 'Abuela Materna 4 4', 'ABUELO MATERNO 88', 'Abuela Paterna 2 2', 'abuelo paterno 1 1', 1, '2022-04-20 10:45:55'),
(0018, 0023, 87, '1989-07-20', '1989-06-20', 'BOGOTA', 'MAURICIO TORRES', 'MARTIN FIERRO', 'M', NULL, NULL, NULL, 'morticia salamanca', NULL, 'carlos lopez', NULL, 'fabricio guzman', 'carolina andrade', 'Josefina Páez Salamanca', 'Jorge Emilio Cárdenas Casanarez', 'Mariela del Socorro Bermúdez', 'Gabriel Darío Agatón', 1, '2021-05-14 10:28:12'),
(0040, 4170, 39, '2021-05-05', '2021-04-05', 'Pitalito', 'Padre Jhon Jairo Aldana', 'Mauricio Casanova Vásquez', 'M', NULL, NULL, NULL, 'Natalia del Socorro Vásquez Barrera', NULL, 'Jorge Enrique Casanova Agatón', NULL, 'Ruben Aguirre perez', 'Diana Lopez turbay', 'Josefina maría Martinez parra', 'Hector mauricio Gomez urbano', 'Catalina Lopera Fernandez', 'Pedro Castro Ramírez', 1, '2021-05-08 10:21:46'),
(0172, 0085, 863, '1990-02-11', NULL, 'Coyaima Tolima', 'Juan Manuel Gonzalez', 'GABRIEL DARIO AGATON M', 'M', NULL, NULL, NULL, 'JOSEFINA MENESES', NULL, 'ALBERTO AGATON', NULL, 'JULIAN SUAREZ', 'PEPITA PEREZ', NULL, NULL, NULL, NULL, 1, '2020-08-14 10:34:11'),
(0172, 0444, 232, '2016-06-22', NULL, 'La Plata Huila', 'luis miguel El Cantante', 'NORMA YAMILE SONS CABRERA', 'F', NULL, NULL, NULL, 'OLGA CABRERA', NULL, 'PABLO SONS', NULL, '', 'MARIA LA DE LA NARIZ FRIA', NULL, NULL, NULL, NULL, 1, '2020-06-26 19:09:14'),
(0555, 0003, 66, '1990-07-19', NULL, 'ibague', 'JOSE URIEL ALDANA CASTRO', 'Romualdo Torres', 'M', NULL, NULL, NULL, 'tiburcia lopez', NULL, 'JOSE ALFREDO JIMENEZ', NULL, 'HENRY LOAIZA', 'NINGUNA', NULL, NULL, NULL, NULL, 1, '2021-04-23 09:56:44'),
(0768, 0035, 434, '2020-10-05', '2020-03-22', 'PITALITO HUILA', 'JOSE URIEL ALDANA CASTRO', 'NICOLAS ALDANA SONS', 'M', NULL, NULL, NULL, 'NORMA YAMILE SONS CABRERA', NULL, 'JHON JAIRO ALDANA MONTEALEGRE', NULL, 'ANDRES AGUILAR', 'NINGUNA', NULL, NULL, NULL, NULL, 1, '2021-05-03 11:01:47'),
(0777, 0999, 888, '2018-08-08', NULL, 'ibague', 'olimpo cardenas', 'CARL SAGAN', 'M', NULL, NULL, NULL, 'LETICIA SAGAN', NULL, 'JOSE SAGAN SAGAN', NULL, 'JUAN JACOBO RUSO', 'MARIA DE LAS CRUCES IBARRA', NULL, NULL, NULL, NULL, 1, '2020-06-24 12:36:34'),
(0841, 0023, 30, '1985-09-12', '1984-05-28', 'Garzon Huila', 'Padre Tiburcio', 'Jhon Jairo Aldana Montealegre', 'M', NULL, NULL, NULL, 'Georgina Montealegre de Aldana', NULL, 'Tobias Aldana Castro', NULL, 'Jorge Montealegre', 'no tengo', 'Fidelita Cárdenas', 'No me acuerdo', 'Teodomina Castro', 'No me acuerdo', 1, '2020-06-27 11:37:33'),
(0983, 0787, 3105, '2019-05-27', NULL, 'Ibague Tolima', 'Gustavo Vasquez', 'Juan José Ordoñez', 'M', NULL, NULL, NULL, 'Isabel Lopez', NULL, 'Carlos Losada', NULL, 'Jose Luis Perales', 'Maria Antonieta', NULL, NULL, NULL, NULL, 0, '2021-04-23 09:56:59'),
(2987, 0018, 123, '2021-05-07', '2021-04-07', 'Pitalito', 'Padre Jhon Jairo Aldana', 'Chirivico Cárdenas', 'M', NULL, NULL, NULL, 'Natalia Paris', NULL, 'Juan Felipe Castro Lopera', NULL, 'Ruben Aguirre', 'Diana Lopez', NULL, NULL, 'Catalina Lopera Fernandez', 'Pedro Castro Ramírez', 1, '2021-05-08 10:06:58'),
(4444, 5432, 2345, '2021-04-29', '2021-03-10', 'Pitalito', 'Yo Jhon Jairo', 'Federico Cárdenas', 'M', NULL, NULL, NULL, 'Natalia Paris', NULL, 'Juan Felipe Castro', NULL, 'Ruben Aguirre', 'Diana Lopez', NULL, NULL, NULL, NULL, 1, '2021-04-30 11:02:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id` int(11) NOT NULL,
  `token` text NOT NULL,
  `nombre` text NOT NULL,
  `email` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `intentos_fallidos` int(11) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id`, `token`, `nombre`, `email`, `password`, `intentos_fallidos`, `fecha`) VALUES
(22, 'b37ddb79f94ac5daf82ca252bccf2cd0', 'lucas Paez p', 'lucas@gmail.com', '$2a$07$JuanSebastianNicolasAe5o6n2FbsAY0NS3LT4333GUxfdBwVnUi', 0, '2020-05-09 11:17:16'),
(23, 'cc26715dfab9d2a403aef1059d393b24', 'juanito gomez paez', 'juan@gmail.com', '$2a$07$JuanSebastianNicolasAeGW6aP2yHG5cK4A0vXuQwsw5Jd0MAwP6', 0, '2020-05-06 11:26:45'),
(24, '040f9e542bed1ec3a2f78f55c150c3eb', 'Norma Yamile Sons', 'normanysc@hotmail.com', '$2a$07$JuanSebastianNicolasAeGW6aP2yHG5cK4A0vXuQwsw5Jd0MAwP6', 0, '2020-05-02 10:22:10'),
(25, 'a3d08a86cf3c8d4b300a1ec8a6955c68', 'Nicolas Aldana Sons', 'nicolas@gmail.com', '$2a$07$JuanSebastianNicolasAe5o6n2FbsAY0NS3LT4333GUxfdBwVnUi', 0, '2020-05-01 12:10:22'),
(26, '16a1885653956c37740a31a181ae97cd', 'Jhon Jairo Aldana Montealegre', 'jjaldana@gmail.com', '$2a$07$JuanSebastianNicolasAe5o6n2FbsAY0NS3LT4333GUxfdBwVnUi', NULL, '2020-04-30 17:07:12'),
(27, 'ba7b48d5e876de82c0cd1d8ae47b288f', 'Tobias Aldana Castro', 'tobias@gmail.com', '$2a$07$JuanSebastianNicolasAe5o6n2FbsAY0NS3LT4333GUxfdBwVnUi', NULL, '2020-05-02 10:22:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(1, 'Administrador', 'admin', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'Administrador', 'vistas/img/usuarios/admin/191.jpg', 1, '2022-06-24 09:41:25', '2022-06-24 14:41:25'),
(57, 'Juan Fernando Urrego', 'juan', '$2a$07$asxx54ahjppf45sd87a5auwRi.z6UsW7kVIpm0CUEuCpmsvT2sG6O', 'Vendedor', 'vistas/img/usuarios/juan/461.jpg', 1, '2017-12-21 12:07:24', '2020-06-24 12:35:40'),
(58, 'Julio Gómez', 'julio', '$2a$07$asxx54ahjppf45sd87a5auQhldmFjGsrgUipGlmQgDAcqevQZSAAC', 'Especial', 'vistas/img/usuarios/julio/100.png', 1, '2017-12-21 12:07:39', '2020-06-24 12:35:39'),
(59, 'Ana Gonzalez', 'ana', '$2a$07$asxx54ahjppf45sd87a5auLd2AxYsA/2BbmGKNk2kMChC3oj7V0Ca', 'Vendedor', 'vistas/img/usuarios/ana/260.png', 1, '2017-12-21 12:07:47', '2020-06-24 12:35:34'),
(60, 'Jhon Jairo Aldana Montealegre', 'jjaldana', '$2a$07$asxx54ahjppf45sd87a5autNU23xWQHN4fpkIkHbtc9gjHUN95uvi', 'Administrador', 'vistas/img/usuarios/jjaldana/948.jpg', 1, '2022-06-24 15:57:46', '2022-06-24 20:57:46'),
(62, 'Guardas de Seguridad', 'guardas', '$2a$07$asxx54ahjppf45sd87a5auE93ifzDszbekIhX7jJQinKNsytKpNNS', 'Especial', '', 1, '0000-00-00 00:00:00', '2022-06-24 21:08:26');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistentes`
--
ALTER TABLE `asistentes`
  ADD PRIMARY KEY (`nidentidad`);

--
-- Indices de la tabla `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`nidentidad`,`tipoevento`,`fecha`,`hora`);

--
-- Indices de la tabla `parroquia`
--
ALTER TABLE `parroquia`
  ADD PRIMARY KEY (`cod-parroquia`);

--
-- Indices de la tabla `partidasbautismos`
--
ALTER TABLE `partidasbautismos`
  ADD PRIMARY KEY (`numpartida`,`codlibro`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
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
-- AUTO_INCREMENT de la tabla `parroquia`
--
ALTER TABLE `parroquia`
  MODIFY `cod-parroquia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
