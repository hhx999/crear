-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 06-05-2019 a las 12:02:19
-- Versión del servidor: 5.7.21-1ubuntu1
-- Versión de PHP: 7.2.3-1ubuntu1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crear_creditos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `AGENCIAS`
--

CREATE TABLE `AGENCIAS` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `AGENCIAS`
--

INSERT INTO `AGENCIAS` (`id`, `nombre`, `email`, `updated_at`, `created_at`) VALUES
(1, 'AGENCIA TEST 1', 'test1@mail.com', '2019-05-03', '2019-05-03'),
(2, 'AGENCIA TEST 2', 'test2@mail.com', '2019-05-03', '2019-05-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `BIENES_CAMBIO`
--

CREATE TABLE `BIENES_CAMBIO` (
  `id` int(11) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `monto` int(7) NOT NULL,
  `encargado` varchar(25) NOT NULL,
  `formulario_id` int(11) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `BIENES_USO`
--

CREATE TABLE `BIENES_USO` (
  `id` int(11) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `monto` int(7) NOT NULL,
  `encargado` varchar(25) NOT NULL,
  `formulario_id` int(11) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CLIENTES`
--

CREATE TABLE `CLIENTES` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `edad` varchar(45) DEFAULT NULL,
  `ubicacion` varchar(45) DEFAULT NULL,
  `nivelSocEconomico` varchar(45) DEFAULT NULL,
  `intereses` varchar(69) DEFAULT NULL,
  `formulario_id` int(11) DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `COMPETENCIA`
--

CREATE TABLE `COMPETENCIA` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `ubicacion` varchar(45) NOT NULL,
  `ofrece` varchar(69) NOT NULL,
  `formulario_id` int(11) DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CRED_TIPO`
--

CREATE TABLE `CRED_TIPO` (
  `id` int(11) NOT NULL,
  `monto` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `form_tipo_id` int(11) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `CRED_TIPO`
--

INSERT INTO `CRED_TIPO` (`id`, `monto`, `descripcion`, `form_tipo_id`, `updated_at`, `created_at`) VALUES
(1, 50000, '- Informales - Sin monotributo con garantía<br>\r\n- Con monotributo social - sin garantía a sola firma<br>\r\nTasa de interés: 15,3% fija anual*<br>\r\n36 meses de pago de crédito<br>\r\n6 meses de gracia con pago de intereses<br>\r\nPresentación: Proyecto + Presupuesto + Garante<br>', 1, NULL, NULL),
(2, 80000, '- Monotributista Social o Común a sola firma (sin garantía) - hasta 36 meses<br>\r\nTasa de interés: 15,3% fija anual*<br>\r\n6 meses de gracia con interés $1234,20<br>\r\n30 meses de pago de crédito $2960<br>\r\nPresentación: Proyecto + Presupuesto + documentación del emprendimiento<br>', 1, NULL, NULL),
(3, 125000, '- Monotributista común con garante<br>\r\nTasa de interés: 15,3% fija anual*<br>\r\n6 meses de gracia, pago solo interés $1928,44<br>\r\n30 meses de pago de crédito $4600<br>\r\nPresentación: Proyecto + Presupuesto + documentación del emprendimiento<br>', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DEUDAS_BANCARIAS`
--

CREATE TABLE `DEUDAS_BANCARIAS` (
  `id` int(11) NOT NULL,
  `tipo` varchar(65) NOT NULL,
  `monto` int(7) NOT NULL,
  `encargado` varchar(25) NOT NULL,
  `formulario_id` int(11) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DEUDAS_COMERCIALES`
--

CREATE TABLE `DEUDAS_COMERCIALES` (
  `id` int(11) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `monto` int(7) NOT NULL,
  `encargado` varchar(25) NOT NULL,
  `formulario_id` int(11) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DEUDAS_FISCALES`
--

CREATE TABLE `DEUDAS_FISCALES` (
  `id` int(11) NOT NULL,
  `tipo` varchar(65) NOT NULL,
  `monto` int(7) NOT NULL,
  `encargado` varchar(25) NOT NULL,
  `formulario_id` int(11) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DISPONIBILIDADES`
--

CREATE TABLE `DISPONIBILIDADES` (
  `id` int(11) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `monto` int(7) NOT NULL,
  `encargado` varchar(25) NOT NULL,
  `formulario_id` int(11) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DOCUMENTACION`
--

CREATE TABLE `DOCUMENTACION` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `formulario_id` int(11) DEFAULT NULL,
  `multimedia_id` int(11) DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `FORMULARIOS`
--

CREATE TABLE `FORMULARIOS` (
  `id` int(11) NOT NULL,
  `estado` int(1) DEFAULT NULL,
  `tituloProyecto` varchar(45) NOT NULL,
  `nombreSolicitante` varchar(45) NOT NULL,
  `localidadSolicitante` varchar(45) NOT NULL,
  `agenciaProyecto` varchar(45) NOT NULL,
  `numeroProyecto` varchar(45) DEFAULT NULL,
  `montoSolicitado` float NOT NULL,
  `fecPresentacionProyecto` datetime DEFAULT NULL,
  `descEmprendimiento` varchar(300) NOT NULL,
  `nombreEmprendedor` varchar(45) DEFAULT NULL,
  `dniEmprendedor` varchar(45) DEFAULT NULL,
  `localidadEmprendedor` varchar(45) DEFAULT NULL,
  `domicilioEmprendedor` varchar(45) DEFAULT NULL,
  `telefonoEmprendedor` varchar(20) NOT NULL,
  `emailEmprendedor` varchar(45) DEFAULT NULL,
  `facebookEmprendedor` varchar(45) DEFAULT NULL,
  `gradoInstruccion` varchar(45) DEFAULT NULL,
  `otraOcupacion` varchar(45) DEFAULT NULL,
  `ingresoMensual` int(11) DEFAULT NULL,
  `deseoCapacitacion` varchar(45) DEFAULT NULL,
  `actPrincipalEmprendimiento` varchar(120) DEFAULT NULL,
  `fecInicioEmprendimiento` date DEFAULT NULL,
  `antiguedadEmprendimiento` varchar(45) DEFAULT NULL,
  `cuitEmprendimiento` varchar(20) DEFAULT NULL,
  `ingresosBrutosEmprendimiento` float DEFAULT NULL,
  `domicilioEmprendimiento` varchar(45) DEFAULT NULL,
  `localidadEmprendimiento` varchar(45) DEFAULT NULL,
  `lugarEmprendimiento` varchar(45) DEFAULT NULL,
  `descProdServicios` varchar(255) DEFAULT NULL,
  `institucionAporte` varchar(45) DEFAULT NULL,
  `fecAporte` date DEFAULT NULL,
  `montoAporte` float DEFAULT NULL,
  `tipoAporte` varchar(45) DEFAULT NULL,
  `estadoAporte` varchar(45) DEFAULT NULL,
  `experienciaEmprendedores` varchar(255) DEFAULT NULL,
  `oportunidadMercado` text,
  `descFinanciamiento` varchar(255) DEFAULT NULL,
  `situacionLaboral` varchar(45) DEFAULT NULL,
  `aclaracionesGenerales` varchar(80) DEFAULT NULL,
  `ingresoGenerales` float DEFAULT NULL,
  `percepcionesSociales` varchar(45) DEFAULT NULL,
  `montoMesPercepciones` float DEFAULT NULL,
  `cantPersonasCargo` int(2) DEFAULT NULL,
  `lugarHabita` varchar(45) DEFAULT NULL,
  `ventajaCompetidores` varchar(255) DEFAULT NULL,
  `estrategiasPromocion` varchar(255) DEFAULT NULL,
  `puntosVenta` varchar(255) DEFAULT NULL,
  `materiasPrimas` varchar(255) DEFAULT NULL,
  `descHerramientas` varchar(255) DEFAULT NULL,
  `insumosCostos` float DEFAULT '0',
  `alquileresCostos` float DEFAULT '0',
  `serviciosCostos` float DEFAULT '0',
  `monotributoCostos` float DEFAULT '0',
  `ingresosBrutosCostos` float DEFAULT '0',
  `segurosCostos` float DEFAULT '0',
  `combustibleCostos` float DEFAULT '0',
  `sueldosCostos` float DEFAULT '0',
  `comercializacionCostos` float DEFAULT '0',
  `otrosCostos` float DEFAULT '0',
  `cuotaMensualCostos` float DEFAULT '0',
  `nombreMBE` varchar(45) DEFAULT NULL,
  `dniMBE` varchar(11) DEFAULT NULL,
  `cuitMBE` varchar(20) DEFAULT NULL,
  `localidadMBE` varchar(45) DEFAULT NULL,
  `domicilioMBE` varchar(45) DEFAULT NULL,
  `otrasDeudasMBE` int(11) DEFAULT NULL,
  `nombreMBG` varchar(45) DEFAULT NULL,
  `dniMBG` varchar(11) DEFAULT NULL,
  `cuitMBG` varchar(20) DEFAULT NULL,
  `localidadMBG` varchar(45) DEFAULT NULL,
  `domicilioMBG` varchar(45) DEFAULT NULL,
  `otrasDeudasMBG` int(11) DEFAULT NULL,
  `idUsuario` int(11) NOT NULL,
  `form_tipo_id` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `FORM_TIPO`
--

CREATE TABLE `FORM_TIPO` (
  `id` int(11) NOT NULL,
  `nombre` varchar(85) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `FORM_TIPO`
--

INSERT INTO `FORM_TIPO` (`id`, `nombre`, `updated_at`, `created_at`) VALUES
(1, 'Linea Emprendedor', NULL, NULL),
(2, 'Subsidio y Bonificación de tasas para las MiPymes', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `FORM_VALIDOS`
--

CREATE TABLE `FORM_VALIDOS` (
  `id` int(11) NOT NULL,
  `portada` tinyint(1) NOT NULL DEFAULT '0',
  `infoEmprendedor` tinyint(1) NOT NULL DEFAULT '0',
  `datosEmprendimiento` tinyint(1) NOT NULL DEFAULT '0',
  `aspectosSociales` tinyint(1) NOT NULL DEFAULT '0',
  `mercado` tinyint(1) NOT NULL DEFAULT '0',
  `prodCostResultados` tinyint(1) NOT NULL DEFAULT '0',
  `mbe` tinyint(1) NOT NULL DEFAULT '0',
  `mbg` tinyint(1) NOT NULL DEFAULT '0',
  `documentacion` tinyint(1) NOT NULL DEFAULT '0',
  `formulario_id` int(11) DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ITEMS_FINANCIAMIENTO`
--

CREATE TABLE `ITEMS_FINANCIAMIENTO` (
  `id` int(11) NOT NULL,
  `nombreItem` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precioUnitario` float NOT NULL,
  `formulario_id` int(11) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `LOCALIDADES`
--

CREATE TABLE `LOCALIDADES` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `agencia_id` int(11) DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `LOCALIDADES`
--

INSERT INTO `LOCALIDADES` (`id`, `nombre`, `agencia_id`, `updated_at`, `created_at`) VALUES
(1, 'LOCALIDAD A', 1, '2019-05-03', '2019-05-03'),
(2, 'LOCALIDAD B', 1, '2019-05-03', '2019-05-03'),
(3, 'LOCALIDAD D', 2, '2019-05-03', '2019-05-03'),
(4, 'LOCALIDAD E', 2, '2019-05-03', '2019-05-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `MULTIMEDIA`
--

CREATE TABLE `MULTIMEDIA` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `extension` varchar(5) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `OBSERVACIONES`
--

CREATE TABLE `OBSERVACIONES` (
  `id` int(11) NOT NULL,
  `hoja` varchar(45) DEFAULT NULL,
  `observacion` text,
  `form_valido_id` int(11) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PATRIMONIO_EMPRENDEDOR`
--

CREATE TABLE `PATRIMONIO_EMPRENDEDOR` (
  `id` int(11) NOT NULL,
  `grupo` varchar(45) DEFAULT NULL,
  `tipo` varchar(56) DEFAULT NULL,
  `esDeuda` tinyint(1) NOT NULL DEFAULT '0',
  `monto` int(11) DEFAULT NULL,
  `formulario_id` int(11) DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PATRIMONIO_GARANTE`
--

CREATE TABLE `PATRIMONIO_GARANTE` (
  `id` int(11) NOT NULL,
  `tipo` varchar(56) DEFAULT NULL,
  `esDeuda` tinyint(1) NOT NULL DEFAULT '0',
  `monto` int(11) DEFAULT NULL,
  `formulario_id` int(11) DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PROVEEDORES`
--

CREATE TABLE `PROVEEDORES` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `ubicacion` varchar(45) NOT NULL,
  `compra` varchar(45) NOT NULL,
  `formulario_id` int(11) DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `REFERENCIAS`
--

CREATE TABLE `REFERENCIAS` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `localidad` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `formulario_id` int(11) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `USUARIOS`
--

CREATE TABLE `USUARIOS` (
  `id` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(45) NOT NULL,
  `verificado` tinyint(1) NOT NULL DEFAULT '0',
  `rol` varchar(20) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `USUARIOS`
--

INSERT INTO `USUARIOS` (`id`, `dni`, `nombre`, `password`, `email`, `verificado`, `rol`, `updated_at`, `created_at`) VALUES
(1, 777, 'Administrador', '1234', 'mail@webmaster.com', 1, 'admin', '2019-04-17', '2019-04-09'),
(2, 39355458, 'BORJAS VEGA RIVERAS', 'borjas', 'BORJAS@GMAIL.COM', 1, 'user', '2019-04-17', '2019-04-09'),
(3, 36850243, 'JUAN LÓPEZ', 'borjas', 'MAIL@EMPRENDIMIENTO.COM', 1, 'user', '2019-04-17', '2019-04-09'),
(11, 66666666, 'TEST CREAR', 'borjas', 'TEST@MAIL.COM', 0, 'user', '2019-04-17', '2019-04-15'),
(12, 12312312, 'NOMBRE TEST', 'borjas', 'MAIL@MAIL.COM', 0, 'user', '2019-04-17', '2019-04-17'),
(13, 1111111, 'BERA', 'asdf', 'BERBAERRE', 0, 'user', '2019-04-26', '2019-04-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `VENTAS`
--

CREATE TABLE `VENTAS` (
  `id` int(11) NOT NULL,
  `producto` varchar(45) NOT NULL,
  `udMedida` varchar(45) NOT NULL,
  `cantAnio` int(11) DEFAULT NULL,
  `precio` float NOT NULL,
  `formulario_id` int(11) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `AGENCIAS`
--
ALTER TABLE `AGENCIAS`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `BIENES_CAMBIO`
--
ALTER TABLE `BIENES_CAMBIO`
  ADD PRIMARY KEY (`id`),
  ADD KEY `formulario_id` (`formulario_id`);

--
-- Indices de la tabla `BIENES_USO`
--
ALTER TABLE `BIENES_USO`
  ADD PRIMARY KEY (`id`),
  ADD KEY `formulario_id` (`formulario_id`);

--
-- Indices de la tabla `CLIENTES`
--
ALTER TABLE `CLIENTES`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_FormularioCli` (`formulario_id`);

--
-- Indices de la tabla `COMPETENCIA`
--
ALTER TABLE `COMPETENCIA`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_FormularioCompe` (`formulario_id`);

--
-- Indices de la tabla `CRED_TIPO`
--
ALTER TABLE `CRED_TIPO`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_TipoFormularioCredTipo` (`form_tipo_id`);

--
-- Indices de la tabla `DEUDAS_BANCARIAS`
--
ALTER TABLE `DEUDAS_BANCARIAS`
  ADD PRIMARY KEY (`id`),
  ADD KEY `formulario_id` (`formulario_id`);

--
-- Indices de la tabla `DEUDAS_COMERCIALES`
--
ALTER TABLE `DEUDAS_COMERCIALES`
  ADD PRIMARY KEY (`id`),
  ADD KEY `formulario_id` (`formulario_id`);

--
-- Indices de la tabla `DEUDAS_FISCALES`
--
ALTER TABLE `DEUDAS_FISCALES`
  ADD PRIMARY KEY (`id`),
  ADD KEY `formulario_id` (`formulario_id`);

--
-- Indices de la tabla `DISPONIBILIDADES`
--
ALTER TABLE `DISPONIBILIDADES`
  ADD PRIMARY KEY (`id`),
  ADD KEY `formulario_id` (`formulario_id`);

--
-- Indices de la tabla `DOCUMENTACION`
--
ALTER TABLE `DOCUMENTACION`
  ADD PRIMARY KEY (`id`),
  ADD KEY `formulario_id` (`formulario_id`),
  ADD KEY `multimedia_id` (`multimedia_id`);

--
-- Indices de la tabla `FORMULARIOS`
--
ALTER TABLE `FORMULARIOS`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_UsuarioFormulario` (`idUsuario`),
  ADD KEY `FK_TipoFormulario` (`form_tipo_id`);

--
-- Indices de la tabla `FORM_TIPO`
--
ALTER TABLE `FORM_TIPO`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `FORM_VALIDOS`
--
ALTER TABLE `FORM_VALIDOS`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_FormularioFormValidos` (`formulario_id`);

--
-- Indices de la tabla `ITEMS_FINANCIAMIENTO`
--
ALTER TABLE `ITEMS_FINANCIAMIENTO`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_FormularioItem` (`formulario_id`);

--
-- Indices de la tabla `LOCALIDADES`
--
ALTER TABLE `LOCALIDADES`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_AgenciaLoc` (`agencia_id`);

--
-- Indices de la tabla `MULTIMEDIA`
--
ALTER TABLE `MULTIMEDIA`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `OBSERVACIONES`
--
ALTER TABLE `OBSERVACIONES`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_validos_id` (`form_valido_id`);

--
-- Indices de la tabla `PATRIMONIO_EMPRENDEDOR`
--
ALTER TABLE `PATRIMONIO_EMPRENDEDOR`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_FormularioPatrimonioEMP` (`formulario_id`);

--
-- Indices de la tabla `PATRIMONIO_GARANTE`
--
ALTER TABLE `PATRIMONIO_GARANTE`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_FormularioPatrimonioGAR` (`formulario_id`);

--
-- Indices de la tabla `PROVEEDORES`
--
ALTER TABLE `PROVEEDORES`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_FormularioProveedor` (`formulario_id`);

--
-- Indices de la tabla `REFERENCIAS`
--
ALTER TABLE `REFERENCIAS`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_FormularioRef` (`formulario_id`);

--
-- Indices de la tabla `USUARIOS`
--
ALTER TABLE `USUARIOS`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- Indices de la tabla `VENTAS`
--
ALTER TABLE `VENTAS`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_FormularioVentas` (`formulario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `AGENCIAS`
--
ALTER TABLE `AGENCIAS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `BIENES_CAMBIO`
--
ALTER TABLE `BIENES_CAMBIO`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `BIENES_USO`
--
ALTER TABLE `BIENES_USO`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `CLIENTES`
--
ALTER TABLE `CLIENTES`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `COMPETENCIA`
--
ALTER TABLE `COMPETENCIA`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `CRED_TIPO`
--
ALTER TABLE `CRED_TIPO`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `DEUDAS_BANCARIAS`
--
ALTER TABLE `DEUDAS_BANCARIAS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `DEUDAS_COMERCIALES`
--
ALTER TABLE `DEUDAS_COMERCIALES`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `DEUDAS_FISCALES`
--
ALTER TABLE `DEUDAS_FISCALES`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `DISPONIBILIDADES`
--
ALTER TABLE `DISPONIBILIDADES`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `DOCUMENTACION`
--
ALTER TABLE `DOCUMENTACION`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `FORMULARIOS`
--
ALTER TABLE `FORMULARIOS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `FORM_TIPO`
--
ALTER TABLE `FORM_TIPO`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `FORM_VALIDOS`
--
ALTER TABLE `FORM_VALIDOS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ITEMS_FINANCIAMIENTO`
--
ALTER TABLE `ITEMS_FINANCIAMIENTO`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `LOCALIDADES`
--
ALTER TABLE `LOCALIDADES`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `MULTIMEDIA`
--
ALTER TABLE `MULTIMEDIA`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `OBSERVACIONES`
--
ALTER TABLE `OBSERVACIONES`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `PATRIMONIO_EMPRENDEDOR`
--
ALTER TABLE `PATRIMONIO_EMPRENDEDOR`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `PATRIMONIO_GARANTE`
--
ALTER TABLE `PATRIMONIO_GARANTE`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `PROVEEDORES`
--
ALTER TABLE `PROVEEDORES`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `REFERENCIAS`
--
ALTER TABLE `REFERENCIAS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `USUARIOS`
--
ALTER TABLE `USUARIOS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `VENTAS`
--
ALTER TABLE `VENTAS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `BIENES_CAMBIO`
--
ALTER TABLE `BIENES_CAMBIO`
  ADD CONSTRAINT `BIENES_CAMBIO_ibfk_1` FOREIGN KEY (`formulario_id`) REFERENCES `FORMULARIOS` (`id`);

--
-- Filtros para la tabla `BIENES_USO`
--
ALTER TABLE `BIENES_USO`
  ADD CONSTRAINT `BIENES_USO_ibfk_1` FOREIGN KEY (`formulario_id`) REFERENCES `FORMULARIOS` (`id`);

--
-- Filtros para la tabla `CLIENTES`
--
ALTER TABLE `CLIENTES`
  ADD CONSTRAINT `FK_FormularioCli` FOREIGN KEY (`formulario_id`) REFERENCES `FORMULARIOS` (`id`);

--
-- Filtros para la tabla `COMPETENCIA`
--
ALTER TABLE `COMPETENCIA`
  ADD CONSTRAINT `FK_FormularioCompe` FOREIGN KEY (`formulario_id`) REFERENCES `FORMULARIOS` (`id`);

--
-- Filtros para la tabla `CRED_TIPO`
--
ALTER TABLE `CRED_TIPO`
  ADD CONSTRAINT `FK_TipoFormularioCredTipo` FOREIGN KEY (`form_tipo_id`) REFERENCES `FORM_TIPO` (`id`);

--
-- Filtros para la tabla `DEUDAS_BANCARIAS`
--
ALTER TABLE `DEUDAS_BANCARIAS`
  ADD CONSTRAINT `DEUDAS_BANCARIAS_ibfk_1` FOREIGN KEY (`formulario_id`) REFERENCES `FORMULARIOS` (`id`);

--
-- Filtros para la tabla `DEUDAS_COMERCIALES`
--
ALTER TABLE `DEUDAS_COMERCIALES`
  ADD CONSTRAINT `DEUDAS_COMERCIALES_ibfk_1` FOREIGN KEY (`formulario_id`) REFERENCES `FORMULARIOS` (`id`);

--
-- Filtros para la tabla `DEUDAS_FISCALES`
--
ALTER TABLE `DEUDAS_FISCALES`
  ADD CONSTRAINT `DEUDAS_FISCALES_ibfk_1` FOREIGN KEY (`formulario_id`) REFERENCES `FORMULARIOS` (`id`);

--
-- Filtros para la tabla `DISPONIBILIDADES`
--
ALTER TABLE `DISPONIBILIDADES`
  ADD CONSTRAINT `DISPONIBILIDADES_ibfk_1` FOREIGN KEY (`formulario_id`) REFERENCES `FORMULARIOS` (`id`);

--
-- Filtros para la tabla `DOCUMENTACION`
--
ALTER TABLE `DOCUMENTACION`
  ADD CONSTRAINT `DOCUMENTACION_ibfk_1` FOREIGN KEY (`formulario_id`) REFERENCES `FORMULARIOS` (`id`),
  ADD CONSTRAINT `DOCUMENTACION_ibfk_2` FOREIGN KEY (`multimedia_id`) REFERENCES `MULTIMEDIA` (`id`);

--
-- Filtros para la tabla `FORMULARIOS`
--
ALTER TABLE `FORMULARIOS`
  ADD CONSTRAINT `FK_TipoFormulario` FOREIGN KEY (`form_tipo_id`) REFERENCES `FORM_TIPO` (`id`),
  ADD CONSTRAINT `FK_UsuarioFormulario` FOREIGN KEY (`idUsuario`) REFERENCES `USUARIOS` (`id`);

--
-- Filtros para la tabla `FORM_VALIDOS`
--
ALTER TABLE `FORM_VALIDOS`
  ADD CONSTRAINT `FK_FormularioFormValidos` FOREIGN KEY (`formulario_id`) REFERENCES `FORMULARIOS` (`id`);

--
-- Filtros para la tabla `ITEMS_FINANCIAMIENTO`
--
ALTER TABLE `ITEMS_FINANCIAMIENTO`
  ADD CONSTRAINT `FK_FormularioItem` FOREIGN KEY (`formulario_id`) REFERENCES `FORMULARIOS` (`id`);

--
-- Filtros para la tabla `LOCALIDADES`
--
ALTER TABLE `LOCALIDADES`
  ADD CONSTRAINT `FK_AgenciaLoc` FOREIGN KEY (`agencia_id`) REFERENCES `AGENCIAS` (`id`);

--
-- Filtros para la tabla `OBSERVACIONES`
--
ALTER TABLE `OBSERVACIONES`
  ADD CONSTRAINT `OBSERVACIONES_ibfk_1` FOREIGN KEY (`form_valido_id`) REFERENCES `FORM_VALIDOS` (`id`);

--
-- Filtros para la tabla `PATRIMONIO_EMPRENDEDOR`
--
ALTER TABLE `PATRIMONIO_EMPRENDEDOR`
  ADD CONSTRAINT `FK_FormularioPatrimonioEMP` FOREIGN KEY (`formulario_id`) REFERENCES `FORMULARIOS` (`id`);

--
-- Filtros para la tabla `PATRIMONIO_GARANTE`
--
ALTER TABLE `PATRIMONIO_GARANTE`
  ADD CONSTRAINT `FK_FormularioPatrimonioGAR` FOREIGN KEY (`formulario_id`) REFERENCES `FORMULARIOS` (`id`);

--
-- Filtros para la tabla `PROVEEDORES`
--
ALTER TABLE `PROVEEDORES`
  ADD CONSTRAINT `FK_FormularioProveedor` FOREIGN KEY (`formulario_id`) REFERENCES `FORMULARIOS` (`id`);

--
-- Filtros para la tabla `REFERENCIAS`
--
ALTER TABLE `REFERENCIAS`
  ADD CONSTRAINT `FK_FormularioRef` FOREIGN KEY (`formulario_id`) REFERENCES `FORMULARIOS` (`id`);

--
-- Filtros para la tabla `VENTAS`
--
ALTER TABLE `VENTAS`
  ADD CONSTRAINT `FK_FormularioVentas` FOREIGN KEY (`formulario_id`) REFERENCES `FORMULARIOS` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
