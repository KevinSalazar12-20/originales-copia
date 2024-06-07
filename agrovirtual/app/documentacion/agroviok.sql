-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para agrovirtual
CREATE DATABASE IF NOT EXISTS `agrovirtual` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `agrovirtual`;

-- Volcando estructura para tabla agrovirtual.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` int(18) NOT NULL,
  `nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) DEFAULT '0',
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla agrovirtual.categoria: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`id_categoria`, `nombre`, `descripcion`, `estado`) VALUES
	(1, 'Agricolas', 'Productos enfocados en el campo', 0),
	(2, 'Artesanias', 'Productos enfocados en las manualidades de las personas', 0),
	(3, 'Turismo', 'Desarrollar actividades turisticas en espacios naturales', 0),
	(4, 'Pecuario', 'Desarrollo de actividades con especies menores para su comercialización y aprovechamiento económico.', 0),
	(5, 'Agroindustrial', 'Transformación de productos primarios.', 0),
	(6, 'aaa', 'aa', 1),
	(7, 'Alimenticios', 'Productos para alimentarse', 0);
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;

-- Volcando estructura para tabla agrovirtual.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `cedula` int(15) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(17) NOT NULL,
  `estado` int(13) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla agrovirtual.cliente: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`cedula`, `nombre`, `apellidos`, `direccion`, `telefono`, `estado`) VALUES
	(31496911, 'Leidy', 'Restrepo', 'ManzanaGCasa13LosRosales', 2147483647, 0),
	(108800775, 'Danny Alejandro', 'Villegas Ocampo', 'Calle40#13-67DosquebradasRisaraldaColombia', 2147483647, 0);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Volcando estructura para tabla agrovirtual.emprendedor
CREATE TABLE IF NOT EXISTS `emprendedor` (
  `cedula` int(15) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(17) NOT NULL,
  `nombre_unidadp` varchar(72) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_unidadp` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `logo` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `foto_personal` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `municipio_id_municipio` int(15) NOT NULL,
  `estado` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cedula`),
  KEY `FK_municipio` (`municipio_id_municipio`),
  CONSTRAINT `FK_municipio` FOREIGN KEY (`municipio_id_municipio`) REFERENCES `municipio` (`id_municipio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla agrovirtual.emprendedor: ~29 rows (aproximadamente)
/*!40000 ALTER TABLE `emprendedor` DISABLE KEYS */;
INSERT INTO `emprendedor` (`cedula`, `nombre`, `apellidos`, `direccion`, `telefono`, `nombre_unidadp`, `descripcion_unidadp`, `logo`, `foto_personal`, `fecha_nacimiento`, `municipio_id_municipio`, `estado`) VALUES
	(5973206, 'Uriel', 'Cardenas Garcia', 'Producion de flores y follajes orgnicos artesanal y productos reciclables.', 2147483647, 'Producam', 'Producción de flores y follajes orgánicos , artesanal y productos reciclables.', 'logo5973206.jpg', 'nombrepersonal5973206.jpg', '1977-11-12', 10, 0),
	(6349296, 'Luis Rubio', 'Serna Lopez', 'Unidad productiva unifamiliar elabora cafe los demaz y queso criollo en forma de cintura', 2147483647, 'Cafeteria y panaderia la central', 'Unidad productiva unifamiliar, elaboración buñuelos de maíz y queso criollo en forma de cintura', 'logo6349296.jpg', 'nombrepersonal6349296.jpg', '1949-09-02', 10, 0),
	(6352434, 'Gerardo', 'Saavedra Tamayo', 'UnidadProductivaqueproduceaceitederomeroycitronela100%pueroyOrganico.', 2147483647, 'Tierra Verde Agroecologico del Valle', 'Unidad Productiva que produce aceite de romero y citronela, 100% puero y Organico.', 'logo6352434.png', 'nombrepersonal6352434.png', '1967-03-17', 6, 0),
	(6526931, 'Carlos andres', 'Buitrago Tangarife', 'Elaboracion de Panela artesanal por 45 familias paneleras.', 2147483647, 'Copaver', 'Elaboración de Panela artesanal por 45 familias paneleras.', 'logo6526931.jpg', 'nombrepersonal6526931.jpg', '1985-09-15', 10, 0),
	(16208901, 'Jose Dawer', 'Murillo Marin', 'UnidadProductivaqueproducePulpasdefrutasharinasparasopasenvueltosyarepasdechoclo', 2147483647, 'Finca Campestre Altos del Sol', 'Unidad Productiva que produce Pulpas de frutas, harinas para sopas, envueltos y arepas de choclo', 'logo16208901.png', 'nombrepersonal16208901.png', '1954-06-05', 6, 0),
	(29153970, 'Edelid', 'Rios Gil', 'Productos de aseo domestico', 2147483647, 'Productos de limpieza Ede', 'Productos de aseo doméstico', 'logo29153970.jpeg', 'nombrepersonal29153970.jpeg', '1950-03-04', 15, 0),
	(29159385, 'Ana Leticia', 'Suaza Manso', 'Reposteria', 2147483647, 'Delitorta', 'Reposteria ', 'logo29159385.jpeg', 'nombrepersonal29159385.jpeg', '1979-09-03', 15, 0),
	(29159527, 'Linis leydi', 'Ceballos Gallón', 'Productores de elementos de aseo', 2147483647, 'Multiaromas del valle ', 'Productores de elementos de aseo', 'logo29159527.jpeg', 'nombrepersonal29159527.jpeg', '1982-12-17', 15, 0),
	(29447809, 'Elaine del socorro', 'Serna Gonzalez', 'Producion de anturios.', 2147483647, 'Primavera versallense', 'Producción de anturios.', 'logo29447809.jpg', 'nombrepersonal29447809.jpg', '1964-05-02', 10, 0),
	(29598605, 'Omaira de Jesus', 'Valencia', 'Elaboracion de productos de aseo artesanales.', 2147483647, 'Puriti', 'Elaboración de productos de aseo artesanales.', 'logo29598605.jpg', 'nombrepersonal29598605.jpg', '1951-10-30', 10, 0),
	(29605531, 'Luz Marina', 'Poveda Murillo', 'Unidad Productiva que realiza confecciones de cobijas blusas toallas conformada por mujeres cabeza de familia del municipio de la victoria.', 2147483647, 'confecciones Victorianas', 'Unidad Productiva que realiza confecciones de cobijas, blusas, toallas etc, conformada por mujeres cabeza de familia del municipio de la victoria.', 'logo29605531.png', 'nombrepersonal29605531.png', '1966-09-15', 6, 0),
	(29621728, 'Consuelo', 'Gonzalez Agudelo', 'Finca Agroturistica 3H Servicio de Restaurante piscina de agua natural pesca deportiva Bar Zona verde y Zona de camping.', 2147483647, 'Finca Agroturistica', 'Finca Agroturistica 3H, Servicio de Restaurante,piscina de agua natural, pesca deportiva, Bar, Zona verde y Zona de camping.', 'logo29621728.jpg', 'nombrepersonal29621728.jpg', '1962-10-25', 10, 0),
	(29915539, 'Diana Lorena', 'Estrada Bedoya', 'Producion de cafe especial', 2147483647, 'Café ángel ', 'Producción de café especial', 'logo29915539.jpeg', 'nombrepersonal29915539.jpeg', '1969-12-06', 13, 0),
	(29934696, 'Maria Yenny', 'Peláez Alzate', 'Productores de elementos de aseo', 2147483647, 'Ecoaseo', 'Productores de elementos de aseo ', 'logo29934696.jpeg', 'nombrepersonal29934696.jpeg', '2019-10-13', 15, 0),
	(31415210, 'Alciriam', 'Rodas Aristizabal', 'Cooperativa de caficultores y paneleros del cañon de catarina', 2147483647, 'Coopacaña', 'Cooperativa de cañicultores y paneleros del cañón de catarina', 'logo31415210.jpeg', 'nombrepersonal31415210.jpeg', '1970-04-20', 15, 0),
	(31495579, 'Isidura', 'Manzano', 'Unidad Productiva que produce dulces artesanales de arequipe cortado breva y papaya.Conformado por mujeres emprendedoras del municipio de la victoria.', 2147483647, 'Delicias las quince letras', 'Unidad Productiva que produce dulces artesanales de arequipe, cortado, breva y papaya. Conformado por mujeres emprendedoras del municipio de la victoria.', 'logo31495579.png', 'nombrepersonal31495579.png', '1952-04-21', 6, 0),
	(31495671, 'Rosa Elvira', 'Garcia Torres', 'Productos de Artesanas elaborados manualmente y diseños personalizados', 2147483647, 'Artesanias Rosita', 'Productos de Artesanías, elaborados manualmente y diseños personalizados', 'logo31495671.jpg', 'nombrepersonal31495671.jpg', '1961-10-14', 6, 0),
	(31496285, 'Gloria Elvira', 'Rivera Garcia', 'Villa Hermi la casa 34 segunda etapa', 2147483647, 'El Porvenir', 'Producción de Plantas Ornamentales y Medicinales', 'logo31496285.jpg', 'nombrepersonal31496285.jpg', '1964-05-16', 6, 0),
	(31497294, 'Olga Beatriz', 'Ortiz Ortiz', 'Unidad Productiva que realiza confecciones de productos de la cultura wuayu y sombreos voltados de la cultura zinu', 2147483647, 'Artesanias Olguita', 'Unidad Productiva que realiza confecciones de productos de la cultura wuayu y sombreos voltados de la cultura zinu', 'logo31497294.png', 'nombrepersonal31497294.png', '1970-07-14', 6, 0),
	(31498400, 'Paola Andrea', 'Chaverra Hernandez', 'Unidad Productiva que produce Pulpas de frutas harinas para sopas envueltos y arepas de choclo', 2147483647, 'Conservalle', 'Unidad Productiva que produce Pulpas de frutas, harinas para sopas, envueltos y arepas de choclo', 'logo31498400.png', 'nombrepersonal31498400.png', '1978-01-14', 6, 0),
	(38894948, 'Yamileth', 'Arredondo Cardona', 'Asociacion de mujeres emprendedoras del municipio de versalles elaboracion de bolso biodegrables', 2147483647, 'Asomugemver', 'Asociación de mujeres emprendedoras del municipio de versalles, elaboracion de bolso biodegrables', 'logo38894948.jpg', 'nombrepersonal38894948.jpg', '1975-07-20', 10, 0),
	(41104351, 'Monica', 'Tobar Mera', 'Productores de elementos de aseo', 2147483647, 'Fabymon', 'Productores de elementos de aseo', 'logo41104351.jpeg', 'nombrepersonal41104351.jpeg', '1969-02-09', 15, 0),
	(43083123, 'Liliana Patricia', 'Molina Rodríguez', 'Restaurante', 2147483647, 'Mr Café', 'Restaurante', 'logo43083123.jpeg', 'nombrepersonal43083123.jpeg', '1962-01-09', 13, 0),
	(65829613, 'Gladimir', 'Reinoso Mendoza', 'Productores de elementos de aseo', 2147483647, 'Gladquimicos', 'Productores de elementos de aseo', 'logo65829613.jpeg', 'nombrepersonal65829613.jpeg', '1979-05-15', 15, 0),
	(1006593485, 'Andres Felipe', 'Florian Gonzalez', 'calle 9 # 15 b 11 libraida', 2147483647, 'prueba', '', '', '', '2000-11-10', 1, 0),
	(1007372223, 'Jean Carlo', 'Milllan Castaño', 'Prueba ejemplo', 2208890, 'prueba', 'Prueba ejemplo', 'logo1007372223.jpg', 'nombrepersonal1007372223.jpg', '2000-07-12', 4, 1),
	(1054916045, 'Darly Esperanza', 'Vargas Cifuentes', 'Productores de elementos de aseo', 2147483647, 'Paasgi', 'Productores de elementos de aseo', 'logo1054916045.jpeg', 'nombrepersonal1054916045.jpeg', '1985-11-16', 15, 0),
	(1112618026, 'Carol Melisa', 'Cadavid reyes', 'Artesanas y bisutera condiseños personalizados', 2147483647, 'Sueños de Colores', 'Artesanías y bisutería  con diseños personalizados', 'logo1112618026.jpg', 'nombrepersonal1112618026.jpg', '1986-09-05', 10, 0),
	(1114088585, 'Dora Enith', 'Gomez Salgado', 'Productores delacteos y derivados', 317885884, 'Las delicias de Dorita', 'Productores de lácteos y derivados', 'logo1114088585.jpeg', 'nombrepersonal1114088585.jpeg', '1986-05-19', 15, 0);
/*!40000 ALTER TABLE `emprendedor` ENABLE KEYS */;

-- Volcando estructura para tabla agrovirtual.ficha_comercial
CREATE TABLE IF NOT EXISTS `ficha_comercial` (
  `id_fichacomercial` int(25) NOT NULL,
  `nombre_producto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_contacto` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `telefono1` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `telefono2` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `caracteristicas_producto` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `unidad_medida` varchar(222) COLLATE utf8_spanish_ci NOT NULL,
  `peso` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `precio` int(18) NOT NULL,
  `Ingredientes` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `fotografia` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `foto1` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `foto2` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `foto3` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `foto4` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `producto_cod_producto` int(15) NOT NULL,
  PRIMARY KEY (`id_fichacomercial`),
  KEY `FK_producto_cod_producto` (`producto_cod_producto`),
  CONSTRAINT `FK_producto_cod_producto` FOREIGN KEY (`producto_cod_producto`) REFERENCES `producto` (`cod_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla agrovirtual.ficha_comercial: ~43 rows (aproximadamente)
/*!40000 ALTER TABLE `ficha_comercial` DISABLE KEYS */;
INSERT INTO `ficha_comercial` (`id_fichacomercial`, `nombre_producto`, `nombre_contacto`, `direccion`, `telefono1`, `telefono2`, `caracteristicas_producto`, `unidad_medida`, `peso`, `precio`, `Ingredientes`, `descripcion`, `fotografia`, `foto1`, `foto2`, `foto3`, `foto4`, `producto_cod_producto`) VALUES
	(1, 'piña', 'piña', 'calle gorgona', '1', '1', 'Piña oro miel', '1', '2100', 2100, 'no aplica', 'no aplica', '10073722231.jpg', 'agro100737222311.jpg', 'agro100737222321.jpg', 'agro100737222331.jpg', 'agro100737222341.jpg', 1),
	(2, 'Plantas Ornamentales y Medicinales', 'El Porvenir', 'Villa Hermila Casa 34 segunda Etapa', '1', '1', 'Producción de Plantas Ornamentales y Medicinales ', '5', '500', 8000, 'Cactus \r\nTierra \r\nAbono', 'Plantas Ornamentales y Medicinales', '314962851.jpg', 'agro3149628511.jpg', 'agro3149628521.jpg', 'agro3149628531.jpg', 'agro3149628541.jpg', 2),
	(3, 'Artesanías Manuales', 'Artesanías Rosita', 'Calle 10 # 8-30 B/ occidental', '1', '1', 'Artesanías Manuales con diseños personalizados', '6', '1', 15000, 'Piedra Sencilla\r\nPiedra en Murano\r\nnailon', 'Artesanías Manuales con diseños personalizados', '314956711.jpg', 'agro3149567111.jpg', 'agro3149567121.jpg', 'agro3149567131.jpg', 'agro3149567141.jpg', 3),
	(4, 'Finca Agrturistica 3H', 'Consuelo Gonzalez Agudelo', 'Finca 3H, la florida Versalles', '2147483647', '1', 'Finca Agroturistica, Alojamiento para 10 personas, sevicio de restaurante, piscina, pesca deportiva, bar, zona verde y zona de camping.', '1', '', 40000, 'N/A', 'Finca Agroturistica, Alojamiento para 10 personas, sevicio de restaurante, piscina, pesca deportiva, bar, zona verde y zona de camping.', '296217281.jpg', 'agro2962172811.JPG', 'agro2962172821.jpg', 'agro2962172831.jpg', 'agro2962172841.jpg', 4),
	(5, 'Suculentas', 'Uriel Cardenas Garcia', 'Vereda el silencia, corregimiento de la florida', '2147483647', '1', 'Flores y follajes orgánicos, artesanales y reciclables.', '5', '3', 20000, 'Tierra\r\nenvase \r\ntierra', 'Flores y follajes orgánicos, artesanales y reciclables.', '59732061.jpg', 'agro597320611.jpg', 'agro597320621.jpg', 'agro597320631.jpg', 'agro597320641.jpg', 5),
	(6, 'Artesanías y Bisutería artesanal', 'Carol Melisa Cadavid', 'cra 5 # 5-55', '2147483647', '1', 'Artesanías y bisutería artesanal.', '3', '15', 20000, '.', 'Producto realizado con mostacilla checa', '11126180261.jpg', 'agro111261802611.jpg', 'agro111261802621.jpg', 'agro111261802631.jpg', 'agro111261802641.jpg', 6),
	(7, 'Yogurth Griego', 'Carol Melisa Cadavid', 'Cra 5 # 5-55', '2147483647', '1', 'Yogurth preparado artesanal mente con alto contenido de pro-bioticos, cero grasa y azúcar.', '3', '1000', 10000, 'Leche\r\nProbioticos', 'Yogurth preparado artesanal mente con alto contenido de pro-bioticos, cero grasa y azúcar.', '11126180262.jpg', 'agro111261802612.jpg', 'agro111261802622.jpg', 'agro111261802632.jpg', 'agro111261802642.jpg', 7),
	(8, 'Productos de aseo', 'Omaira de jesus Valencia', 'Cra 6 # 11-10', '2147483647', '1', 'Productos de aseo elaborados artesanal mente ', '3', '300', 3000, 'Aceite Usado\r\nSoda Caustica\r\nAlcohol', 'Productos de aseo elaborados artesanal mente', '295986051.jpg', 'agro2959860511.jpg', 'agro2959860521.jpg', 'agro2959860531.jpg', 'agro2959860541.jpg', 8),
	(9, 'Bolsos estampados  biodegradables', 'Yamileth Arredondo', 'Guayabito', '2147483647', '1', 'Productos elaborados artesanal mente.', '3', '1', 1000, 'Sublimación', 'Productos elaborados artesanal mente.', '388949481.jpg', 'agro3889494811.jpg', 'agro3889494821.jpg', 'agro3889494831.jpg', 'agro3889494841.jpg', 9),
	(10, 'Anturios, Eucalipto', 'Primavera Versallense', 'Vereda Batambal', '2147483647', '1', 'Producción de anturios y eucalipto', '3', '250', 7000, 'Semillas\r\nAbonos', 'Producción de anturios y eucalipto', '294478091.jpg', 'agro2944780911.jpg', 'agro2944780921.jpg', 'agro2944780931.jpg', 'agro2944780941.jpg', 10),
	(11, 'Mora Castilla Sin tuna', 'Elaine del socorro serna', 'Vereda Batambal', '2147483647', '1', 'producción de mora castilla sin tuna', '3', '500', 2000, 'Semillas\r\nabonos', 'producción de mora castilla sin tuna', '294478092.jpg', 'agro2944780912.jpg', 'agro2944780922.jpg', 'agro2944780932.jpg', 'agro2944780942.jpg', 11),
	(12, 'Maiz y Queso criollo en forma de cintura', 'Luis Rubio Serna', 'Cra 6 # 8-24', '2147483647', '1', 'Maiz y Queso criollo en forma de cintura', '3', '40', 400, 'Maíz\r\nQueso', 'Maiz y Queso criollo en forma de cintura', '63492961.jpg', 'agro634929611.jpg', 'agro634929621.jpg', 'agro634929631.jpg', 'agro634929641.jpg', 12),
	(13, 'Panela Organica', 'Copaver', 'Calle 8 # 5-20', '2147483647', '1', 'Panela orgánica artesanal', '3', '1000', 2500, 'Jugo de Caña', 'Panela orgánica artesanal', '65269311.jpg', 'agro652693111.jpg', 'agro652693121.jpg', 'agro652693131.jpg', 'agro652693141.jpg', 13),
	(14, 'Ambientador para piso', 'Edelid Ríos', 'Calle 1 norte #17-76', '3172931981', '3172931981', 'Ambientador para piso', '6', '1000', 2500, 'Glicerina, urea, jabón líquido, aroma artificial', 'Ambientador para piso con aromas artificiales', '291539701.jpeg', 'agro2915397011.jpeg', '', '', '', 14),
	(15, 'Jabón líquido lavaloza', 'Edelid Ríos', 'Calle 1 norte #17-76', '3172931981', '3172931981', 'Jabón líquido lavaloza ', '6', '500', 3000, 'Glicerina, urea, jabón líquido, aroma artificial', 'jabón líquido lavaloza con aromas personalizados', '291539702.jpeg', 'agro2915397012.jpeg', '', '', '', 15),
	(16, 'Jabón líquido lavaloza', 'Edelid Ríos', 'Calle 1 norte #17-76', '3172931981', '3172931981', 'Jabón líquido para manos', '6', '400', 3500, 'Glicerina, urea, jabón líquido, aroma artificial', 'jabón líquido para manos con aromas personalizados', '291539703.jpeg', 'agro2915397013.jpeg', '', '', '', 16),
	(17, 'Yogurt artesanal', 'Dora Enith Gomez', 'Cra7 #11-04 vivienda obrera', '3173885884', '3173885884', 'Yogurt artesanal', '6', '1000', 6000, 'Leche líquida entera, fruta, azúcar, probioticos, colorantes naturales', 'Yogurt artesanal de consistencia espesa cargado de frutas naturales', '11140885851.jpeg', 'agro111408858511.jpeg', '', '', '', 17),
	(18, 'Natilla', 'Dora Enith Gomez', 'Cra7 #11-04 vivienda obrera', '3173885884', '3173885884', 'Natilla', '3', '500', 4000, 'Leche líquida entera, harina, esencia de vainilla, uvas pasas, coco rayado y mantequilla', 'Natilla de suave sabor baja en azucar', '11140885852.jpeg', 'agro111408858512.jpeg', '', '', '', 18),
	(19, 'Manillas', 'Dora Enith Gomez', 'Cra7 #11-04 vivienda obrera', '3173885884', '3173885884', 'Manillas tejidas a mano', '3', '50', 8000, 'Cintas y accesorios de bisutería', 'manillas tejidas a mano con elementos naturales y artificiales', '11140885853.jpeg', 'agro111408858513.jpeg', '', '', '', 19),
	(20, 'Correas tejidas', 'Dora Enith Gomez', 'Cra7 #11-04 vivienda obrera', '3173885884', '3173885884', 'Correas tejidas a mano', '3', '200', 20000, 'Cintas y accesorios de bisutería', 'Correas tejidas a mano con elementos naturales y artificiales', '11140885854.jpeg', 'agro111408858514.jpeg', '', '', '', 20),
	(21, 'Shampoo medicinal en barra', 'Darly Esperanza Vargas Cifuentes', 'Calle 3 #1a-61', '3122910509', '3122910509', 'Shampoo en barra', '3', '200', 4500, 'Arroz, Savila y romero', 'shampoo en barra anticaspa que da brillo y crecimiento al cabello a base de plantas medicinales', '10549160451.jpeg', 'agro105491604511.jpeg', '', '', '', 21),
	(22, 'Jabón azul', 'Darly Esperanza Vargas Cifuentes', 'Calle 3 #1a-61', '3122910509', '3122910509', 'Jabón azul tipo rey ', '3', '300', 1500, 'Aceite vegetal reciclado, soda cáustica, colorantes artificiales', 'Jabón para limpieza general del hogar, fabricado con elementos reciclados', '10549160452.jpeg', 'agro105491604512.jpeg', '', '', '', 22),
	(23, 'Talco para pies', 'Darly Esperanza Vargas Cifuentes', 'Calle 3 #1a-61', '3122910509', '3122910509', 'Talco para pies', '3', '176', 3500, 'acido bórico, plantas medicinales, talco', 'Talco medicinal para pies de uso personal, ataca los hongos y genera sensación de frescura', '10549160453.jpeg', 'agro105491604513.jpeg', '', '', '', 23),
	(24, 'Ambientador para el hogar', 'Darly Esperanza Vargas Cifuentes', 'Calle 3 #1a-61', '3122910509', '3122910509', 'Ambientador para el hogar', '6', '500', 3000, 'Alcohol, soda cáustica, aromas y colorantes artificiales', 'Ambientador desinfectante con fragancia a lavanda', '10549160454.jpeg', 'agro105491604514.jpeg', '', '', '', 24),
	(25, 'Crema para manos y cuerpo', 'Gladimir Reinoso Mendoza', 'Barrio bolivar cra1 #1-76', '3117712836', '3117712836', 'Crema para manos y cuerpo', '6', '1000', 23000, 'Aceite de almendras, glicerina, aceite cristal, vitamina E', 'crema para manos y cuerpo con aroma a victoria secret, pepino, melón y kiwi', '658296131.jpeg', 'agro6582961311.jpeg', '', '', '', 25),
	(26, 'jabon líquido para manos', 'Gladimir Reinoso Mendoza', 'Barrio bolivar cra1 #1-76', '3117712836', '3117712836', 'jabon líquido para manos', '6', '500', 5500, 'texapon, aromas artificiales frutales, espesantes', 'jabon líquido para manos con fragancia perdurable, antibacterial', '658296132.jpeg', 'agro6582961312.jpeg', '', '', '', 26),
	(27, 'crema analgésica', 'Gladimir Reinoso Mendoza', 'Barrio bolivar cra1 #1-76', '3117712836', '3117712836', 'crema analgésica ', '3', '50', 2500, 'baselina, caléndula, marihuana, fragancias naturales', 'crema analgésica, ideal para los dolores articulares y musculares, relájate y refrescante', '658296133.jpeg', 'agro6582961313.jpeg', '', '', '', 27),
	(28, 'Jabón tipo rey', 'Monica Tobar Mera', 'Cra1 #7-24', '3136690009', '3136690009', 'Jabón tipo rey', '3', '250', 1400, 'aceite de cocina reciclado, agua, soda cáustica, fragancia y colorantes artificiales', 'jabón tipo rey con propiedades blanqueadoras y desmanchadoras', '411043511.jpeg', 'agro4110435111.jpeg', '', '', '', 28),
	(29, 'Silicona líquida', 'Monica Tobar Mera', 'Cra1 #7-24', '3136690009', '3136690009', 'Silicona líquida ', '6', '500', 1400, 'Silicona al 60%, agua, fragancia, mergal', 'Silicona para brillo con protección UV, especial para madera y automotores', '411043512.jpeg', 'agro4110435112.jpeg', '', '', '', 29),
	(30, 'Limpido color', 'Links Leydi Ceballos Gallón', 'Calle 9 #3-66', '3113966703', '3113966703', 'Limpido color', '6', '1000', 4000, 'Agua, soda cáustica, hipoclorito de sodio, cloruro de sodio, fragancia', 'limpido color para limpieza de prendas de vestir, pisos y paredes', '291595271.jpeg', 'agro2915952711.jpeg', '', '', '', 30),
	(31, 'Jabón lavaloza', 'Linis Leydi Ceballos Gallón', 'Calle 9 #3-66', '3113966703', '3113966703', 'Jabón lavaloza ', '6', '500', 3000, 'Agua, texapon, propilparabeno, glicerina, cocoamida, fragancia', 'Jabón lavaloza con características multiusos suave con las manos', '291595272.jpeg', 'agro2915952712.jpeg', '', '', '', 31),
	(32, 'Perfume', 'Linis Leydi Ceballos Gallón', 'Calle 9 #3-66', '3113966703', '3113966703', 'Perfume', '6', '30', 25000, 'alcohol, feromonas, pachuli, fragancias personalizadas', 'Perfume con fragancia suave y duradera', '291595273.jpeg', 'agro2915952713.jpeg', 'agro2915952723.jpeg', '', '', 32),
	(33, 'Jabón azul', 'Maria Yenny Peláez Alzate', 'Barrio grama lote vía al brasil', '3148718205', '3148718205', 'Jabón azul tipo Rey ', '3', '260', 1400, 'aceite reciclado, soda cáustica, agua, citronela, colorante', 'Janon azul para blanquear ropa y sacar manchas de grasa y desodorante', '299346961.jpeg', 'agro2993469611.jpeg', 'agro2993469621.jpeg', '', '', 33),
	(34, 'Cace Angel', 'Diana Lorena Estrada Bedoya', 'Cra3 #5-37', '3136779969', '3136779969', 'Café especial tostion media', '3', '500', 12000, 'Café tostado y molido', 'Café especial tostion media con sabores cítricos', '299155391.jpeg', 'agro2991553911.jpeg', '', '', '', 34),
	(35, 'Sándwich gratinado', 'Liliana Patricia Molina Rodríguez', 'Cra3 #6-92', '3215415435', '3215415435', 'Sándwich gratinado', '3', '500', 8000, 'Pan artesanal, jamón, queso mozzarella, pollo, champiñones piña calada', 'Delicioso sándwich gratinado', '430831231.jpeg', 'agro4308312311.jpeg', '', '', '', 35),
	(36, 'Desgranado pollo', 'Liliana Patricia Molina Rodríguez', 'Cra3 #6-92', '3215415435', '3215415435', 'Desgranado de pollo', '3', '500', 8000, 'maiz, pollo, cebolla, aceita de oliva, jamón, pimienta tomate cherry, en cama de lechuga con queso gratinado', 'Desgranado gourmet', '430831232.jpeg', 'agro4308312312.jpeg', '', '', '', 36),
	(37, 'Dulces Artesanales', 'Delicias las quince letras', 'Cra 7 # 4-64', '3117653314', '2202767', 'producto realizado artesanalmente totalmente natural, realizado en fogon de leña, \r\nbajo en azucar.', '4', '250', 4000, 'Leche, azucar, arroz', 'producto realizado artesanalmente totalmente natural, realizado en fogon de leña, \r\nbajo en azucar.', '314955791.png', 'agro3149557911.png', 'agro3149557921.png', 'agro3149557931.png', 'agro3149557941.png', 37),
	(38, 'Pulpas Victorianas', 'Pulpas Victorianas', 'Calle 5 # 9-26', '31498400', '31498400', 'producto realizado artesanalmente totalmente natural.', '3', '250', 1000, 'frutas', 'producto realizado artesanalmente totalmente natural.', '314984001.png', 'agro3149840011.png', 'agro3149840021.png', 'agro3149840031.png', 'agro3149840041.png', 38),
	(39, 'Confecciones', 'Artesanias Olguita', 'Cra 2 # 8-38', '3168149738', '3168149738', 'producto tejido manualmente', '4', '200', 20000, 'Hilos y vena de caña flecha', 'producto tejido manualmente', '314972941.png', 'agro3149729411.png', 'agro3149729421.png', 'agro3149729431.png', 'agro3149729441.png', 39),
	(40, 'Confecciones', 'confecciones Victorianas', 'Cra 2 # 8-38', '3168149738', '3168149738', 'producto realizado manualmente y bordados realizados punto de cruz, macrame y puntada española', '4', '500', 10000, 'hilos', 'producto realizado manualmente y bordados realizados punto de cruz, macrame y puntada española', '296055311.png', 'agro2960553111.png', 'agro2960553121.png', 'agro2960553131.png', 'agro2960553141.png', 40),
	(41, 'chorizo', 'Delicarnes Victorianas', 'Cra 2 # 8-38', '3168149738', '3168149738', 'producto realizado artesanalmente totalmente natural, ahumado en  leña, hecho con carne de cerdo.', '4', '500', 10000, 'carne de cerdo', 'producto realizado artesanalmente totalmente natural, ahumado en fogon de leña', '296055312.png', 'agro2960553112.png', 'agro2960553122.png', 'agro2960553132.png', 'agro2960553142.png', 41),
	(42, 'ACEITE ESENCIALES', 'Tierra Verde', 'Unidad Productiva que produce aceite de romero y citronela, 100% puero y Organico.', '3218102872', '3147957474', 'romero 100% natural', '6', '5', 160000, 'romero 100% natural', 'Extraccion del romero por medio de arrastre por vapor.', '63524341.png', 'agro635243411.png', 'agro635243421.png', 'agro635243431.png', 'agro635243441.png', 42),
	(43, 'Finca Campestre Altos del Sol', 'Finca Campestre Altos del Sol', 'Finca Campestre Altos del Sol', '3182667338', '3182667338', 'Finca ubicada en el muncipio de la victoria, con piscina con agua salada, jacuzzi con agua caliente y salada, turco, habitaciones,bar y restaurante', '3', '250', 1000, 'Finca Campestre Altos del Sol', 'Finca ubicada en el muncipio de la victoria, con piscina con agua salada, jacuzzi con agua caliente y salada, turco, habitaciones,bar y restaurante', '162089011.png', 'agro1620890111.png', 'agro1620890121.png', 'agro1620890131.png', 'agro1620890141.png', 43);
/*!40000 ALTER TABLE `ficha_comercial` ENABLE KEYS */;

-- Volcando estructura para tabla agrovirtual.ficha_tecnica
CREATE TABLE IF NOT EXISTS `ficha_tecnica` (
  `id_fichatecnica` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_presentacion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `contenido_presentacion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `tipos_presentaciones` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `costo` int(50) NOT NULL,
  `nombre_producto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `volumen_produccion` int(100) NOT NULL,
  `variedad_producto` int(100) NOT NULL,
  `nombre_cientifico` int(50) NOT NULL,
  `temperatura_requerida_envio` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `ntc_relacionada` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `normas_vinculadas` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `lotes_promocion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `caracteristicas_propias` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `telefono1` int(18) NOT NULL,
  `telefono2` int(18) NOT NULL,
  `direccion` int(45) NOT NULL,
  `producto_cod_producto` int(15) NOT NULL,
  PRIMARY KEY (`id_fichatecnica`),
  KEY `FK_producto_cod_producto_tecnico` (`producto_cod_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla agrovirtual.ficha_tecnica: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ficha_tecnica` DISABLE KEYS */;
/*!40000 ALTER TABLE `ficha_tecnica` ENABLE KEYS */;

-- Volcando estructura para tabla agrovirtual.municipio
CREATE TABLE IF NOT EXISTS `municipio` (
  `id_municipio` int(18) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `departamento` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(4) NOT NULL,
  PRIMARY KEY (`id_municipio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla agrovirtual.municipio: ~15 rows (aproximadamente)
/*!40000 ALTER TABLE `municipio` DISABLE KEYS */;
INSERT INTO `municipio` (`id_municipio`, `nombre`, `departamento`, `estado`) VALUES
	(1, 'Zarzal', 'Valle del cauca', 1),
	(2, 'Alcala', 'Valle del cauca', 0),
	(3, 'Argelia', 'Valle del cauca', 0),
	(4, 'Cairo', 'Valle del cauca', 1),
	(5, 'Union', 'Valle del cauca', 1),
	(6, 'La victoria', 'Valle del cauca', 0),
	(7, 'Obando', 'Valle del cauca', 0),
	(8, 'Roldanillo', 'Valle del cauca', 0),
	(9, 'Cartago', 'Valle del cauca', 0),
	(10, 'Versalles', 'Valle del cauca', 0),
	(11, 'El Cairo', 'Valle del cauca', 0),
	(12, 'El aguila', 'Valle del cauca', 0),
	(13, 'Ulloa', 'Valle del cauca', 0),
	(14, 'Toro', 'Valle del cauca', 0),
	(15, 'Ansermanuevo', 'Valle del cauca', 0);
/*!40000 ALTER TABLE `municipio` ENABLE KEYS */;

-- Volcando estructura para tabla agrovirtual.negocio
CREATE TABLE IF NOT EXISTS `negocio` (
  `id_negocio` int(18) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL,
  `estado` int(4) NOT NULL,
  `cliente_cedula` int(18) NOT NULL,
  `emprendedor_cedula` int(18) NOT NULL,
  PRIMARY KEY (`id_negocio`),
  KEY `FK_cliente` (`cliente_cedula`),
  KEY `FK_emprendedor` (`emprendedor_cedula`),
  CONSTRAINT `FK_cliente` FOREIGN KEY (`cliente_cedula`) REFERENCES `cliente` (`cedula`),
  CONSTRAINT `FK_emprendedor` FOREIGN KEY (`emprendedor_cedula`) REFERENCES `emprendedor` (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla agrovirtual.negocio: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `negocio` DISABLE KEYS */;
/*!40000 ALTER TABLE `negocio` ENABLE KEYS */;

-- Volcando estructura para tabla agrovirtual.producto
CREATE TABLE IF NOT EXISTS `producto` (
  `cod_producto` int(18) NOT NULL,
  `producto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `promocion_cod_descuento` int(18) NOT NULL,
  `emprendedor_cedula` int(18) NOT NULL,
  `categorias_id_categorias` int(18) NOT NULL,
  `estado` int(4) NOT NULL,
  PRIMARY KEY (`cod_producto`),
  KEY `FK_promocion` (`promocion_cod_descuento`),
  KEY `FK_emprendedor_cedula` (`emprendedor_cedula`),
  KEY `FK_categoria` (`categorias_id_categorias`),
  CONSTRAINT `FK_categoria` FOREIGN KEY (`categorias_id_categorias`) REFERENCES `categoria` (`id_categoria`),
  CONSTRAINT `FK_emprendedor_cedula` FOREIGN KEY (`emprendedor_cedula`) REFERENCES `emprendedor` (`cedula`),
  CONSTRAINT `FK_promocion` FOREIGN KEY (`promocion_cod_descuento`) REFERENCES `promocion` (`id_descuento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla agrovirtual.producto: ~43 rows (aproximadamente)
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` (`cod_producto`, `producto`, `promocion_cod_descuento`, `emprendedor_cedula`, `categorias_id_categorias`, `estado`) VALUES
	(1, 'piña', 1, 1007372223, 1, 0),
	(2, 'Plantas Ornamentales y Medicinales', 1, 31496285, 1, 0),
	(3, 'Artesanías Manuales', 1, 31495671, 1, 0),
	(4, 'Finca Agrturistica 3H', 1, 29621728, 1, 0),
	(5, 'Suculentas', 1, 5973206, 1, 0),
	(6, 'Artesanías y Bisutería artesanal', 1, 1112618026, 1, 0),
	(7, 'Yogurth Griego', 1, 1112618026, 1, 0),
	(8, 'Productos de aseo', 1, 29598605, 1, 0),
	(9, 'Bolsos estampados  biodegradables', 1, 38894948, 1, 0),
	(10, 'Anturios, Eucalipto', 1, 29447809, 1, 0),
	(11, 'Mora Castilla Sin tuna', 1, 29447809, 1, 0),
	(12, 'Maiz y Queso criollo en forma de cintura', 1, 6349296, 1, 0),
	(13, 'Panela Organica', 1, 6526931, 1, 0),
	(14, 'Ambientador para piso', 1, 29153970, 5, 0),
	(15, 'Jabón líquido lavaloza', 1, 29153970, 5, 0),
	(16, 'Jabón líquido lavaloza', 1, 29153970, 5, 0),
	(17, 'Yogurt artesanal', 1, 1114088585, 1, 0),
	(18, 'Natilla', 1, 1114088585, 5, 0),
	(19, 'Manillas', 1, 1114088585, 2, 0),
	(20, 'Correas tejidas', 1, 1114088585, 2, 0),
	(21, 'Shampoo medicinal en barra', 1, 1054916045, 5, 0),
	(22, 'Jabón azul', 1, 1054916045, 5, 0),
	(23, 'Talco para pies', 1, 1054916045, 5, 0),
	(24, 'Ambientador para el hogar', 1, 1054916045, 5, 0),
	(25, 'Crema para manos y cuerpo', 1, 65829613, 5, 0),
	(26, 'jabon líquido para manos', 1, 65829613, 5, 0),
	(27, 'crema analgésica', 1, 65829613, 5, 0),
	(28, 'Jabón tipo rey', 1, 41104351, 5, 0),
	(29, 'Silicona líquida', 1, 41104351, 5, 0),
	(30, 'Limpido color', 1, 29159527, 5, 0),
	(31, 'Jabón lavaloza', 1, 29159527, 5, 0),
	(32, 'Perfume', 1, 29159527, 5, 0),
	(33, 'Jabón azul', 1, 29934696, 5, 0),
	(34, 'Cafe Ángel', 1, 29915539, 1, 0),
	(35, 'Sándwich gratinado', 1, 43083123, 5, 0),
	(36, 'Desgranado pollo', 1, 43083123, 5, 0),
	(37, 'Dulces Artesanales', 1, 31495579, 2, 0),
	(38, 'Pulpas Victorianas', 1, 31498400, 7, 0),
	(39, 'Confecciones', 1, 31497294, 2, 0),
	(40, 'Confecciones', 1, 29605531, 2, 0),
	(41, 'chorizo', 1, 29605531, 7, 0),
	(42, 'ACEITE ESENCIALES', 1, 6352434, 2, 0),
	(43, 'Finca Campestre Altos del Sol', 1, 16208901, 3, 0);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;

-- Volcando estructura para tabla agrovirtual.promocion
CREATE TABLE IF NOT EXISTS `promocion` (
  `id_descuento` int(18) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `descuento` int(11) NOT NULL,
  `fecha inicial` date NOT NULL,
  `fecha_final` date NOT NULL,
  PRIMARY KEY (`id_descuento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla agrovirtual.promocion: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `promocion` DISABLE KEYS */;
INSERT INTO `promocion` (`id_descuento`, `nombre`, `descripcion`, `descuento`, `fecha inicial`, `fecha_final`) VALUES
	(1, 'sin descuento', 'no existe descuento', 0, '2019-04-01', '2022-08-26');
/*!40000 ALTER TABLE `promocion` ENABLE KEYS */;

-- Volcando estructura para tabla agrovirtual.rol
CREATE TABLE IF NOT EXISTS `rol` (
  `id_rol` int(18) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla agrovirtual.rol: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` (`id_rol`, `nombre`) VALUES
	(1, 'admin'),
	(2, 'emprendedor'),
	(3, 'cliente');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;

-- Volcando estructura para tabla agrovirtual.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(18) NOT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(56) CHARACTER SET utf32 COLLATE utf32_spanish2_ci NOT NULL,
  `cedula` int(18) NOT NULL,
  `rol_idrol` int(18) NOT NULL,
  `estado` int(4) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `FK_rol` (`rol_idrol`),
  CONSTRAINT `FK_rol` FOREIGN KEY (`rol_idrol`) REFERENCES `rol` (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla agrovirtual.usuario: ~42 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id_usuario`, `usuario`, `clave`, `nombre`, `apellidos`, `direccion`, `correo`, `cedula`, `rol_idrol`, `estado`) VALUES
	(1, 'pipe', '$argon2i$v=19$m=1024,t=2,p=2$cklFVlFFbnZUTm5SYWFTaA$a1LCY9BBqArmFapB6haxtYBxmdhDqptSI9CysO+uqkc', 'Andres', 'Felipe Florian', 'calle8#15b88', 'afloriangonzales@gmail.com', 1006593485, 2, 0),
	(2, 'admin', '$argon2i$v=19$m=1024,t=2,p=2$U2Q2b21jaFU3SzlYN3VSNg$wukNGBsNEccM3UYNJCXBW9WmvkWg8eGy6yZ1o8nbcNo', 'admin', 'admin', 'admin', 'admin@gmail.com', 1, 1, 0),
	(3, 'jean', '$argon2i$v=19$m=65536,t=4,p=1$Z1NCLlRMUHlXZm8vSzhpUA$jnQV8AFKfEGGCMJ+Y94Ti9AvCH4/WQI6T/wH3ggNN2w', 'Jean Carlo', 'Milllan Castaño', 'Pruebaejemplo', 'ctrljean@gmail.com', 1007372223, 2, 0),
	(4, 'Gloria', '$argon2i$v=19$m=65536,t=4,p=1$VTZvZm5vc0xOQlgwLy5TMw$LW+JQW8kxbAjX+06rE2zJ5Zy+E1nY6am7LdscQFjSQ8', 'Gloria Elvira', 'Rivera Garcia', 'ProduccindePlantasOrnamentalesyMedicinales', 'notiene@gmail.com', 31496285, 2, 0),
	(5, 'Rosa Elvira', '$argon2i$v=19$m=65536,t=4,p=1$RHUxcWNRbXRQRzdaUUZDLw$7NIbTw07Ial91vzJj1Lu3iqxSLKkbQ53BVJyI8T4U6A', 'Rosa Elvira', 'Garcia Torres', 'ProductosdeArtesanaselaboradosmanualmenteydiseospersonalizados', 'notiene@gmail.com', 31495671, 2, 0),
	(6, 'Consuelo', '$argon2i$v=19$m=65536,t=4,p=1$YnBGQUhWLlU0UGx1OXBIdg$1a/Mm4dpwsPJkNaAD+WswRf6QkYr7dQnmi1j7cSUaAo', 'Consuelo', 'Gonzalez Agudelo', 'FincaAgroturistica3HServiciodeRestaurantepiscinadeaguanaturalpescadeportivaBarZonaverdeyZonadecamping.', 'finca3h@gmail.com', 29621728, 2, 0),
	(7, 'Uriel', '$argon2i$v=19$m=65536,t=4,p=1$WVVySndBV1hoR2ZjSHlpLg$hfhXaDs6zC3a79d86fV1vPLSsIltuMHBTb0EOv09Od8', 'Uriel', 'Cardenas Garcia', 'Produccindefloresyfollajesorgnicosartesanalyproductosreciclables.', '', 5973206, 2, 0),
	(8, 'Carol', '$argon2i$v=19$m=65536,t=4,p=1$MWVna0QzZVJGOUVOZHZuZw$f2HAn0RvsCJLkK1U9jYrpNGN1toqmCW4dJRaK9XLCa8', 'Carol Melisa', 'Cadavid reyes', 'Artesanasybisuteracondiseospersonalizados', 'carolmelisacadavidreyes@gmail.com', 1112618026, 2, 0),
	(9, 'Omaira', '$argon2i$v=19$m=65536,t=4,p=1$Rk4xLlF4dm8xeERxM1VhMw$fxR9Z4GmZD+4HihSk7TItIiDvJRzgwoiP/f9wbMCWNc', 'Omaira de Jesus', 'Valencia', 'Elaboracindeproductosdeaseoartesanales.', '', 29598605, 2, 0),
	(10, 'Yamileth', '$argon2i$v=19$m=65536,t=4,p=1$VVBMVjNLNTZta1hDVi9uVA$kSWHALRSMawPfvBsC5WluuTlF9+V7rzv/A4KfeHoA60', 'Yamileth', 'Arredondo Cardona', 'Asociacindemujeresemprendedorasdelmunicipiodeversalleselaboraciondebolsobiodegrables', 'yamiletharredondo@gmail.com', 38894948, 2, 0),
	(11, 'Elaine', '$argon2i$v=19$m=65536,t=4,p=1$eXh2UFhDWGx2ZzNQVHNuUA$Pt5jhHVHfRMTC6od9ViQ617rGaRP7h5Y8mYVbmrU4o4', 'Elaine del socorro', 'Serna Gonzalez', 'Produccindeanturios.', '', 29447809, 2, 0),
	(12, 'Luis', '$argon2i$v=19$m=65536,t=4,p=1$QVp3SWQvSnpUalRWZnBLeA$Vo5eOUuCs4v7gw9d9jX794CSGQSOjPDM34LTlhvInIc', 'Luis Rubio', 'Serna Lopez', 'Unidadproductivaunifamiliarelaboracinbuuelosdemazyquesocriolloenformadecintura', '', 6349296, 2, 0),
	(13, 'Carlos', '$argon2i$v=19$m=65536,t=4,p=1$d0daS0Z3cjdOOVlpWHJ4RA$yltTj/tLf+N4+3AIF9v2V4ZbXNXkIwrUdj+XRrsnuQY', 'Carlos andres', 'Buitrago Tangarife', 'ElaboracindePanelaartesanalpor45familiaspaneleras.', 'andresbuitrago03@hotmail.es', 6526931, 2, 0),
	(14, 'Adolfo Fernando Carvajal Estrada', '$argon2i$v=19$m=65536,t=4,p=1$NU5tRkxRc2xTbnVnVWRTbQ$lI7TnCyfsTefIqVeLDaB83IvtU8M8Y7GRibzmqHSL5o', 'Maria José', 'Carvajal Pomeo', 'AromasdelAmanecerseencuetraubicadaenelmunicipiodeUlloaeneldepartamentodelNortedelValle', 'carvajalmariajose8@gmail.com', 19480896, 2, 0),
	(15, 'Gladis Pomeo Salcedo', '$argon2i$v=19$m=65536,t=4,p=1$bHBiZ3RENFlXS25qLzVSMQ$2BxJZLLn+OZgTP9l/KN36WO8RLDmfWpZeWI5glGlvj8', 'Gladis', 'Pomeo Salcedo', 'Productoresdecaforgnico', 'carvajalmariajose8@gmail.com', 66776203, 2, 0),
	(16, 'walter', '$argon2i$v=19$m=65536,t=4,p=1$cW4uMzNtQUtaczdaTWZSeA$njKou5F/M09Vg/cCcr5WXdOAMaHjtoF2sgrrY/0S4as', 'walter', 'arias', 'dddd', 'dsdasd@gmail.com', 16757697, 2, 0),
	(17, 'Mariajcp', '$argon2i$v=19$m=65536,t=4,p=1$UVpqeVliZU9UYW1wU1A1dQ$pEuvfVHVfFkQg9OdS1S7M2dLNDgRMiAXevgM3Yaz9aw', 'Maria Jose', 'Carvajal Pomeo', 'Produccindecaforgnico', 'carvajalmariajose8@gmail.com', 1003530080, 2, 0),
	(18, 'Mayomiel', '$argon2i$v=19$m=65536,t=4,p=1$VDNnU3ZoSHZyOHZPMGV3cA$XiWBjzL+xWhq6/RdiRjfs87dRI6GGLJ1uwKdWC2zcHg', 'Edher daniel', 'Mayoral milan', 'Diseadorindustrial', 'daniel.mayoral.m@gmail.com', 1088257582, 2, 0),
	(19, 'lol', '$argon2i$v=19$m=65536,t=4,p=1$cFFBYzZuSGE4d1lTaFpxNg$tqs0UDgA+39PM6NFpyoxUySHniV/+jhfeyxw/wFqxlc', 'jean ejemplo', 'Castaño', 'descrpdka', 'cr@gmail.com', 1006593434, 2, 0),
	(20, 'yedis', '$argon2i$v=19$m=65536,t=4,p=1$WmZVSmNabHBNaVR6dVVjVA$NBTFPzDR1WCB5BX2Gg12GenD1VBMoP8eBfytVfsMcVc', 'Yesid', 'Uribe', 'Descripciondelproducto', 'yesid@gmail.com', 1114095708, 2, 0),
	(21, 'ctrljean', '$argon2i$v=19$m=65536,t=4,p=1$R2VaRDBzLnV6VTVYaWJxLw$H/+OQM5jJuOxW8+1LESfXz5+ua93urDuBQDMhXdqBWM', 'Jean Carlo', 'Castaño Millan', 'descripcin', 'ctrljean@gmail.con', 1007372229, 2, 0),
	(22, 'julio', '$argon2i$v=19$m=65536,t=4,p=1$WXhIdW9KcXJkekhycnhPTg$z1UTWUGLicx1tKKQviWimLDxQ70CRp6mtFG4acHOSFY', 'jean carlo', 'castaño millan', 'khkhjkbjhdrhjkmfdsghj', 'ctrljean@gmail.com', 12399817, 2, 0),
	(23, 'Edelidrios', '$argon2i$v=19$m=65536,t=4,p=1$Z1NnVy9sTzBXOElmenNtbw$zzUo8xPVulIsz7ptOs2kHPrtaDDDGbsSy3t4G+fQ+GI', 'Edelid', 'Rios Gil', 'Productosdeaseodomstico', 'ederiosgil2019@outlook.es', 29153970, 2, 0),
	(24, 'Coopacaña2019', '$argon2i$v=19$m=65536,t=4,p=1$bjdZbnF1ZnpmU3F3YVhuQw$ia6z0RRGZpaVytR8uw9e5s4iL7GfqpyZjvvnHz/emUM', 'Alciriam', 'Rodas Aristizabal', 'Cooperativadecaicultoresypanelerosdelcandecatarina', 'coopaca@hotmail.com', 31415210, 2, 0),
	(25, 'Doraenith', '$argon2i$v=19$m=65536,t=4,p=1$REppd1N2WUdoaDM0dzBhbw$kKckVBBo1d3cyAEJ8UAbaaTF+o5k/cxWSvbKM8/4yGs', 'Dora Enith', 'Gomez Salgado', 'Productoresdelcteosyderivados', 'doritagomes2019@gmail.com', 1114088585, 2, 0),
	(26, 'Paasgi2019', '$argon2i$v=19$m=65536,t=4,p=1$dUV1Z1lzS0lhRnpaUS9WNQ$GRykOVbFlGCUeePxIHvli5D9OikUNP3rBlKW4KfO9pk', 'Darly Esperanza', 'Vargas Cifuentes', 'Productoresdeelementosdeaseo', 'darlyvargas76@gmail.com', 1054916045, 2, 0),
	(27, 'Gladquimicos2019', '$argon2i$v=19$m=65536,t=4,p=1$LzN0MUxXYWY3eDg3NW9NLw$to/U5GlMCDBTfPu8BydZQpj9Xl1++a3+rYf5VN+eey0', 'Gladimir', 'Reinoso Mendoza', 'Productoresdeelementosdeaseo', 'gladyreinoso@gmail.com', 65829613, 2, 0),
	(28, 'Fabymon2019', '$argon2i$v=19$m=65536,t=4,p=1$V1ZZR1JZVEdHa21MRElhWQ$wHu90FzhSZ3PC0Xl35UrWC7Sg+bbDO9dXEKS0v2clD4', 'Monica', 'Tobar Mera', 'Productoresdeelementosdeaseo', 'monicatobarmera@hotmail.com', 41104351, 2, 0),
	(29, 'p', '$argon2i$v=19$m=65536,t=4,p=1$Q0dNeHY5RzBWWGtEdS5rMA$ghSVSpCGM6xSCNjV9SUr95T3x9UvMBcDGpaUsgBBkiw', 'p', 'p', 'p', 'p@gmail.com', 651651, 2, 0),
	(30, 'Multiaromas2019', '$argon2i$v=19$m=65536,t=4,p=1$YXZ2b2hUbmZobW8xeTIzbw$p5Bc9ahfuBkHgzf/JoCTJKvBLGyPPiHNqqQvUWoZtqs', 'Linis leydi', 'Ceballos Gallón', 'Productoresdeelementosdeaseo', 'ceballosgallonlinisleydi@gmail.com', 29159527, 2, 0),
	(31, 'Ecoaseo2019', '$argon2i$v=19$m=65536,t=4,p=1$T2Zsbmo3N3pWNGxOSWNKdQ$FO4N+KCLz67U01zIM8Ije2o9LN8vR9wnQ+PIlOALobk', 'Maria Yenny', 'Peláez Alzate', 'Productoresdeelementosdeaseo', 'yenny13pelaez@gmail.com', 29934696, 2, 0),
	(32, 'Delitorta2019', '$argon2i$v=19$m=65536,t=4,p=1$S1VzQlN3dWxBVjZaWThzTg$7rKWAXcM2W3kGGzlUEMpyoHrCNsSBd8N6NG7b+X6hPE', 'Ana Leticia', 'Suaza Manso', 'Reposteria', '', 29159385, 2, 0),
	(33, 'Cafeangel', '$argon2i$v=19$m=65536,t=4,p=1$OHUuTVdkcEJjR2FzSnFnZw$OzfQqP1kF6XbeOu73y+C6LLvPpbhUFJbnnq5gH9kYZ4', 'Diana Lorena', 'Estrada Bedoya', 'Produccindecafespecial', 'diloesbe@gmail.com', 29915539, 2, 0),
	(34, 'Mistercafe', '$argon2i$v=19$m=65536,t=4,p=1$alhFdmNaN2NXeHY3Wm01Nw$CW+dJeU+4mfZwylnyXvJncQszCsgrSJ40VoR7OD+iEs', 'Liliana Patricia', 'Molina Rodríguez', 'Restaurante', 'maleceli92@hotmail.com', 43083123, 2, 0),
	(35, 'Isidura', '$argon2i$v=19$m=65536,t=4,p=1$UEpaS2Y5VHVuLmdSUXhkVw$r6xjzN8mjXtDenbLVH2Wjv9mLNHc/hmv4DZXqavMoGo', 'Isidura', 'Manzano', 'UnidadProductivaqueproducedulcesartesanalesdearequipecortadobrevaypapaya.Conformadopormujeresemprendedorasdelmunicipiodelavictoria.', 'tierraverdeagro@outlook.es', 31495579, 2, 0),
	(36, 'Paola', '$argon2i$v=19$m=65536,t=4,p=1$UzdWUkZOVm8yUFh4MElvNA$1tulnhU3m+w++KjbhLzmHV7ZrPEJbfKJ+SmnZpdxxqI', 'Paola Andrea', 'Chaverra Hernandez', 'UnidadProductivaqueproducePulpasdefrutasharinasparasopasenvueltosyarepasdechoclo', 'millanchaverravalentina@gmail.com', 31498400, 2, 0),
	(37, 'Olguita', '$argon2i$v=19$m=65536,t=4,p=1$TlV5QnFGcVdKZjJ3UThFMg$Rtjf7LqsjDyVpc9K6l7IbOO3o6ldRMnPpTqBcpzONO8', 'Olga Beatriz', 'Ortiz Ortiz', 'UnidadProductivaquerealizaconfeccionesdeproductosdelaculturawuayuysombreosvoltadosdelaculturazinu', 'olbeor500@hotmail.com', 31497294, 2, 0),
	(38, 'Luz marina', '$argon2i$v=19$m=65536,t=4,p=1$eElaeHF4S04xR0MxR2xkUA$Q/18nlspgvxOIlN4+tlYAYEo7NS2TlAXOz88XqywFvk', 'Luz Marina', 'Poveda Murillo', 'UnidadProductivaquerealizaconfeccionesdecobijasblusastoallasetcconformadapormujerescabezadefamiliadelmunicipiodelavictoria.', 'marinapoveda@hotmail.com', 29605531, 2, 0),
	(39, 'Gerardo', '$argon2i$v=19$m=65536,t=4,p=1$T3QxeTBaaFhIclo0bjJyYQ$HLxs8+Y7mLAibPvTl4+QBMxEG2iXFwlJwILxeyR/9i4', 'Gerardo', 'Saavedra Tamayo', 'UnidadProductivaqueproduceaceitederomeroycitronela100%pueroyOrganico.', 'tierraverdeagro@outlook.es', 6352434, 2, 0),
	(40, 'AltosSol', '$argon2i$v=19$m=65536,t=4,p=1$aHk3eEppYVo3Wm9KWEd0MQ$38I19ZZRUHK30yogKZ6RmkdViN4TDh8XLaiVNayuR9M', 'Jose Dawer', 'Murillo Marin', 'UnidadProductivaqueproducePulpasdefrutasharinasparasopasenvueltosyarepasdechoclo', 'dawermu@hotmail.com', 16208901, 2, 0),
	(41, '31496911', '$argon2i$v=19$m=65536,t=4,p=1$TFNJekFSMmp1YnliRk9DSQ$jZmHfJzGjSTPD9FzEZagKcgzVotI1dKo2/l1wwWUk5A', 'Leidy', 'Restrepo', 'ManzanaGCasa13LosRosales', 'elcosturero1968@gamail.com', 31496911, 3, 0),
	(42, 'villegaso', '$argon2i$v=19$m=65536,t=4,p=1$WXdnTmlPVC5VSDZ6eFEvcQ$H1xPAcgqAhmTJqrJeLonhVWtIasm2raxOluu0H0+lxg', 'Danny Alejandro', 'Villegas Ocampo', 'Calle40#13-67DosquebradasRisaraldaColombia', 'danny.villegas91@gmail.com', 108800775, 3, 0);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
