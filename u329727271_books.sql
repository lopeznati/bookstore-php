
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 08-06-2016 a las 04:27:02
-- Versión del servidor: 10.0.20-MariaDB
-- Versión de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `u329727271_books`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `descripcion`) VALUES
(1, 'terror'),
(2, 'drama'),
(3, 'Juvenil'),
(4, 'Ciencia Ficcion'),
(5, 'romance');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `clave` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `domicilio` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `id_localidad` int(11) NOT NULL,
  `foto` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `rol` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `usuario`, `clave`, `apellido`, `nombre`, `domicilio`, `telefono`, `mail`, `id_localidad`, `foto`, `rol`, `fecha`) VALUES
(7, 'nati', '1234', 'lopez leiva', 'natali', 'gorriti', '1111111', 'nati6029@gmail.com', 1, 'fotos/clientes/2016-06-02023300_44514.jpeg', 'admi', ''),
(8, 'nati2', '1234', 'gomez', 'ana', 'gorriti', '1111111', 'nati6029@gmail.com', 1, 'fotos/clientes/2016-06-08022408_47947.jpeg', 'cli', ''),
(9, 'pablo', '1234', 'dante', 'pablo', 'gorriti', '1111111', 'pablo@gmail.com', 1, 'fotos/clientes/2016-06-01033756_99565', 'cli', ''),
(10, 'juan', '1234', 'lel', 'juan', 'cordoba 111', '43243', 'nati6029@gmail.com', 4, '', 'cli', '29/06/2016'),
(11, 'vane18410', '1234', 'lopez', 'vanesa', 'gorriti', '11111112', 'vane_18410@hotmail.com', 1, '', 'cli', ''),
(12, 'yoa94', 'yoana94', 'Kim', 'Yoana', 'Zeballos 15', '4256315', 'yoanakim1@gmail.com', 1, '', 'cli', '03/08/1994'),
(13, 'maria', '1234', 'l', 'maria', 'gorriti', '23432', 'nati6029@gmail.com', 4, '', 'cli', '26/04/2016'),
(14, 'nati9', '1234', 'h', 'k', 'hk', '98', 'nati6029@gmail.com', 5, '', 'cli', '05/06/2016');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editoriales`
--

CREATE TABLE IF NOT EXISTS `editoriales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `sitioWeb` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `editoriales`
--

INSERT INTO `editoriales` (`id`, `nombre`, `sitioWeb`) VALUES
(1, 'editorial1', 'www.editorial1.com'),
(2, 'editorial2', ''),
(3, 'Ediciones b', ''),
(4, 'Booket', ''),
(5, 'Montena', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE IF NOT EXISTS `libros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ISBN` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `titulo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci NOT NULL,
  `nroEdicion` int(11) NOT NULL,
  `cantPaginas` int(11) NOT NULL,
  `precio` double NOT NULL,
  `existencia` int(11) NOT NULL,
  `id_editorial` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `foto` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `archivo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=38 ;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `ISBN`, `titulo`, `descripcion`, `nroEdicion`, `cantPaginas`, `precio`, `existencia`, `id_editorial`, `id_categoria`, `foto`, `archivo`) VALUES
(30, '9788466644174', 'Hush Hush', 'Nora Grey, una alumna aplicada en busca de una beca para la universidad, vive con su madre viuda en una granja a las afueras de Portland, Maine. Cuando Patch se convierte en su nuevo compañero de instituto, Nora siente a la vez atracción y repulsión hacia este extraño personaje que parece tener acceso a sus pensamientos. Luego se entera de que Patch es un ángel caído que quiere convertirse en humano. Nora está bajo su control, pero hay también otras fuerzas en juego y de repente se encuentra viviendo hechos inexplicables y en medio de una situación muy peligrosa.', 1, 369, 295, 10, 3, 3, 'fotos/2016-05-15053552_84888.jpeg', ''),
(31, '9789871783489', 'Destino', 'Cuando todo parece perdido, a veces, el azar nos concede segundas oportunidades. Pero Ever y Damen saben que su condena no tiene remedio: pasarán la eternidad juntos y sin poder tocarse. Sin embargo, un giro del destino les ofrece una salida... a cambio de un gran sacrificio: Ever debe escoger entre liberar Damen o buscar el Árbol de la Vida, cuyo fruto podrÃ­a salvar al resto de inmortales.¿Será capaz Ever de sacrificar el destino de cientos de almas por egoísmo? ¿Se arriesgará a perder su amor por un fin superior?', 2, 368, 219, 10, 5, 3, 'fotos/2016-05-15054849_103713.jpeg', ''),
(33, '7798168772428', 'Ciudad de Huesos', 'En el Pandemonium, la discoteca de moda de Nueva York, Clary sigue a un atractivo chico de pelo azul hasta que presencia su muerte a manos de tres jóvenes cubiertos de extraños tatuajes. Desde esa noche, su destino se une al de esos tres cazadores de sombras, guerreros dedicados a liberar la tierra de demonios y, sobre todo, al de Jace, un chico con aspecto de ángel y tendencia a actuar como un idiota....', 1, 369, 295, 10, 3, 3, 'fotos/2016-05-15055315_28797.jpeg', 'pdf/2016-06-05015623_114944'),
(34, '9788492955299', 'Los Juegos del Hambre', 'GANAR SIGNIFICA FAMA Y RIQUEZA. PERDER SIGNIFICA UNA MUERTE SEGURA. En una oscura version del futuro proximo, doce chicos y doce chicas se ven obligados a participar en un reality show llamado Los juegos del hambre. Solo hay una regla matar o morir. Cuando Katniss Everdeen, una joven de dieciseis anos se presenta voluntaria para ocupar el lugar de su hermana en los juegos, lo entiende como una condena a muerte. Sin embargo, Katniss ya ha visto la muerte de cerca y la supervivencia forma parte de su naturaleza. iQue empiecen los septuagesimo cuartos juegos del hambre!', 2, 402, 395, 10, 4, 4, 'fotos/2016-06-07233044_120483.jpeg', ''),
(35, '9781471118166', 'Black Ice', 'Britt Pfeiffer ha entrenado para poder ir al Tenton Range, pero no se espera que su ex novio, del que no puede olvidarse, quiera unirse a ella. Antes de que Britt pueda saber cuáles son sus sentimientos por Calvin, una inesperada ventisca hace que busque refugio en una cabina y que acepte la hospitalidad de sus guapos ocupantes, pero esos hombres resultan ser fugitivos, y la secuestran. \r\nA cambio de su vida, Britt accede a sacarlos de la montaña. Mientras se preparan, Britt sabe que debe estar viva el tiempo suficiente para que Calvin la encuentre. Las cosas se complican aún más cuando Britt descubre una serie de pruebas relacionadas con asesinatos que tuvieron lugar en esa montaña, un descubrimiento que puede hacer que se convierta en el próximo objetivo del asesino.\r\nPero nada es como parece en las montañas, y todo el mundo oculta algo, incluido Mason, uno de sus secuestradores. Su amabilidad confunde a Britt. ¿Es un enemigo o un aliado?', 3, 416, 200, 10, 5, 1, 'fotos/2016-06-07233645_46897.jpeg', ''),
(36, '9789875807761', 'Ángel Mecánico- Los originales', 'Nueva trilogía que precede la historia de Cazadores de sombras y nos cuenta sus orígenes Tessa Gray está dispuesta a encontrar a su hermano, del que no recibe noticias desde hace tiempo. Para ello, se dirige a Londres, donde será raptada por las Hermanas Oscuras, miembros de una organización secreta llamada el Club Pande, y rescatada por los Cazadores de Sombras. Tessa se sentirá atraída en seguida por Jem y Will, y deberá elegir quién de ellos ganará su corazón mientras los tres siguen en busca de su hermano y descubren que alguien trama acabar con ellos.', 1, 448, 215, 10, 4, 5, 'fotos/2016-06-07234143_38074.jpeg', ''),
(37, '9788466644175', 'Bloodlines', 'Sydney es una alquimista, parte de un grupo de humanos versados en magia que sirven como puente entre el mundo de los humanos y los vampiros. Ellos protegen los secretos de los vampiros - y las vidas de los humanos. Cuando Sydney es sacada de su cama en medio de la noche, al principio piensa que va a seguir siendo castigada por su complicada alianza con la dhampir Rose Hathaway. Pero lo que ocurre es mucho peor. Jill Dragomir - la hermana de la reina Moroi Lissa Dragomir- está en peligro de muerte, y los Moroi deben esconderla.Para evitar una guerra civil, Sydney es llamada para actuar como la guardiana y protectora de Jill, actuando como su compañera de habitación en el último lugar en el que alguien pensaría encontrar un miembro de la realeza vampirica - un internado en Palm Springs, California. Pero en lugar de emcontrar seguridad en la preparatoria Amberwood, Sydney descubre que el drama está apenas comenzando.', 1, 450, 350, 10, 5, 4, 'fotos/2016-06-07234807_32290.jpeg', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidades`
--

CREATE TABLE IF NOT EXISTS `localidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `codigoPostal` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `localidades`
--

INSERT INTO `localidades` (`id`, `nombre`, `codigoPostal`) VALUES
(1, 'santa fe', 2000),
(2, 'cordoba', 0),
(3, 'corrientes', 1111),
(4, 'san luis', 0),
(5, 'Buenos aires', 1111);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fechaPedido` datetime NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_libro` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` double NOT NULL,
  `id_tarjeta` int(11) NOT NULL,
  `domicilio` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=84 ;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `fechaPedido`, `id_cliente`, `id_libro`, `cantidad`, `subtotal`, `id_tarjeta`, `domicilio`) VALUES
(1, '2016-05-11 00:00:00', 1, 30, 2, 12, 0, ''),
(2, '0000-00-00 00:00:00', 7, 31, 5, 1095, 0, ''),
(3, '0000-00-00 00:00:00', 7, 31, 6, 1314, 0, ''),
(4, '0000-00-00 00:00:00', 7, 31, 7, 1533, 0, ''),
(5, '0000-00-00 00:00:00', 0, 30, 3, 885, 0, ''),
(6, '0000-00-00 00:00:00', 0, 30, 4, 1180, 0, ''),
(7, '0000-00-00 00:00:00', 0, 30, 5, 1475, 0, ''),
(8, '0000-00-00 00:00:00', 7, 30, 1, 295, 0, ''),
(9, '0000-00-00 00:00:00', 7, 30, 1, 295, 0, ''),
(10, '0000-00-00 00:00:00', 7, 30, 1, 295, 0, ''),
(11, '0000-00-00 00:00:00', 7, 30, 1, 295, 0, ''),
(12, '0000-00-00 00:00:00', 7, 30, 1, 295, 0, ''),
(13, '0000-00-00 00:00:00', 7, 30, 1, 295, 0, ''),
(14, '0000-00-00 00:00:00', 7, 30, 1, 295, 0, ''),
(15, '0000-00-00 00:00:00', 7, 30, 1, 295, 0, ''),
(16, '0000-00-00 00:00:00', 7, 30, 1, 295, 0, ''),
(17, '0000-00-00 00:00:00', 7, 30, 1, 295, 0, ''),
(18, '0000-00-00 00:00:00', 7, 30, 1, 295, 0, ''),
(19, '0000-00-00 00:00:00', 7, 30, 4, 1180, 0, 'gorriti2095'),
(20, '0000-00-00 00:00:00', 7, 30, 5, 1475, 0, 'gorriti111'),
(21, '0000-00-00 00:00:00', 7, 30, 5, 1475, 0, 'gorriti111'),
(22, '0000-00-00 00:00:00', 7, 30, 5, 1475, 0, 'gorriti111'),
(23, '0000-00-00 00:00:00', 7, 30, 6, 1770, 1, 'gorriti111'),
(24, '0000-00-00 00:00:00', 7, 30, 6, 1770, 1, 'gorriti111'),
(25, '0000-00-00 00:00:00', 7, 30, 6, 1770, 4, 'gorriti111'),
(26, '0000-00-00 00:00:00', 7, 30, 6, 1770, 5, 'gorriti111'),
(27, '0000-00-00 00:00:00', 7, 30, 6, 1770, 6, 'gorriti111'),
(28, '0000-00-00 00:00:00', 7, 30, 6, 1770, 7, 'cordoba4444'),
(29, '0000-00-00 00:00:00', 7, 30, 6, 1770, 8, 'cordoba4444'),
(30, '0000-00-00 00:00:00', 7, 30, 6, 1770, 8, 'cordoba4444'),
(31, '2016-05-28 23:12:26', 7, 30, 6, 1770, 9, 'cordoba4444'),
(32, '2016-05-28 23:13:33', 7, 30, 6, 1770, 10, 'cordoba4444'),
(33, '2016-05-28 23:14:16', 7, 30, 6, 1770, 11, 'cordoba4444'),
(34, '2016-05-28 23:15:44', 7, 30, 6, 1770, 12, 'cordoba4444'),
(35, '2016-05-28 23:16:16', 7, 30, 6, 1770, 13, 'cordoba4444'),
(36, '2016-05-28 23:16:33', 7, 30, 6, 1770, 14, 'cordoba4444'),
(37, '2016-05-28 23:17:41', 7, 30, 6, 1770, 15, 'cordoba4444'),
(38, '2016-05-28 23:18:30', 7, 30, 6, 1770, 16, 'cordoba4444'),
(39, '2016-05-28 23:20:53', 7, 30, 6, 1770, 17, 'cordoba4444'),
(40, '2016-05-28 23:21:15', 7, 30, 6, 1770, 18, 'cordoba4444'),
(41, '2016-05-28 23:23:30', 7, 30, 6, 1770, 19, 'cordoba4444'),
(42, '2016-05-28 23:24:15', 7, 30, 6, 1770, 20, 'cordoba4444'),
(43, '2016-05-28 23:24:38', 7, 30, 6, 1770, 21, 'cordoba4444'),
(44, '2016-05-28 23:26:05', 7, 30, 6, 1770, 22, 'cordoba4444'),
(45, '2016-05-28 23:26:38', 7, 30, 6, 1770, 23, 'cordoba4444'),
(46, '2016-05-28 23:26:50', 7, 30, 6, 1770, 24, 'cordoba4444'),
(47, '2016-05-28 23:27:20', 7, 30, 6, 1770, 25, 'cordoba4444'),
(48, '2016-05-28 23:27:58', 7, 30, 6, 1770, 26, 'cordoba4444'),
(49, '2016-05-28 23:28:25', 7, 30, 6, 1770, 27, 'cordoba4444'),
(50, '2016-05-28 23:28:43', 7, 30, 6, 1770, 28, 'cordoba4444'),
(51, '2016-05-28 23:29:01', 7, 30, 6, 1770, 29, 'cordoba4444'),
(52, '2016-05-28 23:29:28', 7, 30, 6, 1770, 30, 'cordoba4444'),
(53, '2016-05-28 23:29:43', 7, 30, 6, 1770, 31, 'cordoba4444'),
(54, '2016-05-28 23:30:05', 7, 30, 6, 1770, 32, 'cordoba4444'),
(55, '2016-05-28 23:30:52', 7, 30, 6, 1770, 33, 'cordoba4444'),
(56, '2016-05-28 23:31:20', 7, 30, 6, 1770, 34, 'cordoba4444'),
(57, '2016-05-28 23:31:51', 7, 30, 6, 1770, 35, 'cordoba4444'),
(58, '2016-05-28 23:32:03', 7, 30, 6, 1770, 36, 'cordoba4444'),
(59, '2016-05-28 23:32:13', 7, 30, 6, 1770, 37, 'cordoba4444'),
(60, '2016-05-28 23:32:41', 7, 30, 6, 1770, 38, 'cordoba4444'),
(61, '2016-05-28 23:33:54', 7, 30, 6, 1770, 39, 'cordoba4444'),
(62, '2016-05-28 23:34:19', 7, 30, 6, 1770, 40, 'cordoba4444'),
(63, '2016-05-28 23:35:17', 7, 30, 6, 1770, 41, 'cordoba4444'),
(64, '2016-05-28 23:35:43', 7, 30, 6, 1770, 42, 'cordoba4444'),
(65, '2016-05-28 23:36:23', 7, 30, 6, 1770, 43, 'cordoba4444'),
(66, '2016-05-28 23:36:50', 7, 30, 6, 1770, 44, 'cordoba4444'),
(67, '2016-05-28 23:37:25', 7, 30, 6, 1770, 45, 'san luis123'),
(68, '2016-05-28 23:38:32', 7, 30, 6, 1770, 46, 'san luis123'),
(69, '2016-05-28 23:38:53', 7, 30, 6, 1770, 47, 'san luis123'),
(70, '2016-05-28 23:39:12', 7, 30, 6, 1770, 48, 'san luis123'),
(71, '2016-05-28 23:39:39', 7, 30, 6, 1770, 49, 'san luis123'),
(72, '2016-05-28 23:42:10', 7, 30, 7, 2065, 50, 'zzeballos11111'),
(73, '2016-05-28 23:43:37', 7, 30, 7, 2065, 51, 'zzeballos11111'),
(74, '2016-05-31 00:18:16', 8, 31, 2, 438, 52, 'cordoba123'),
(75, '2016-05-31 00:18:16', 8, 30, 1, 295, 52, 'cordoba123'),
(76, '2016-06-07 00:52:01', 12, 33, 2, 590, 53, 'Zeballos15'),
(77, '2016-06-07 02:13:01', 12, 33, 2, 590, 54, 'Zeballos15'),
(78, '2016-06-07 15:10:17', 12, 30, 3, 885, 55, 'Zeballos15'),
(79, '2016-06-08 03:25:57', 7, 30, 2, 590, 56, 'gorriti2095'),
(80, '2016-06-08 03:26:39', 7, 30, 2, 590, 57, 'gorriti234'),
(81, '2016-06-08 03:27:31', 7, 30, 2, 590, 58, 'j2'),
(82, '2016-06-08 03:29:23', 7, 30, 2, 590, 59, 'j7'),
(83, '2016-06-08 03:30:19', 7, 30, 3, 885, 60, 'hjh78');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjeta`
--

CREATE TABLE IF NOT EXISTS `tarjeta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_Tarjeta` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `titular` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `codigo_seguridad` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=61 ;

--
-- Volcado de datos para la tabla `tarjeta`
--

INSERT INTO `tarjeta` (`id`, `numero_Tarjeta`, `titular`, `codigo_seguridad`) VALUES
(1, '12345678', 'natalileiva', 123),
(2, '87654321', 'natalileiva', 123),
(3, '87654321', 'natalileiva', 123),
(4, '87654321', 'natalileiva', 123),
(5, '87654321', 'natalileiva', 123),
(6, '11111111', 'natalileiva', 111),
(7, '11111111', 'natalileiva', 111),
(8, '11111111', 'natalileiva', 111),
(9, '11111111', 'natalileiva', 111),
(10, '11111111', 'natalileiva', 111),
(11, '11111111', 'natalileiva', 111),
(12, '11111111', 'natalileiva', 111),
(13, '11111111', 'natalileiva', 111),
(14, '11111111', 'natalileiva', 111),
(15, '11111111', 'natalileiva', 111),
(16, '11111111', 'natalileiva', 111),
(17, '11111111', 'natalileiva', 111),
(18, '11111111', 'natalileiva', 111),
(19, '11111111', 'natalileiva', 111),
(20, '11111111', 'natalileiva', 111),
(21, '11111111', 'natalileiva', 111),
(22, '11111111', 'natalileiva', 111),
(23, '11111111', 'natalileiva', 111),
(24, '11111111', 'natalileiva', 111),
(25, '11111111', 'natalileiva', 111),
(26, '11111111', 'natalileiva', 111),
(27, '11111111', 'natalileiva', 111),
(28, '11111111', 'natalileiva', 111),
(29, '11111111', 'natalileiva', 111),
(30, '11111111', 'natalileiva', 111),
(31, '11111111', 'natalileiva', 111),
(32, '11111111', 'natalileiva', 111),
(33, '11111111', 'natalileiva', 111),
(34, '11111111', 'natalileiva', 111),
(35, '11111111', 'natalileiva', 111),
(36, '11111111', 'natalileiva', 111),
(37, '11111111', 'natalileiva', 111),
(38, '11111111', 'natalileiva', 111),
(39, '11111111', 'natalileiva', 111),
(40, '11111111', 'natalileiva', 111),
(41, '11111111', 'natalileiva', 111),
(42, '11111111', 'natalileiva', 111),
(43, '11111111', 'natalileiva', 111),
(44, '11111111', 'natalileiva', 111),
(45, '222222222', 'anagomez', 222),
(46, '222222222', 'anagomez', 222),
(47, '222222222', 'anagomez', 222),
(48, '222222222', 'anagomez', 222),
(49, '222222222', 'anagomez', 222),
(50, '23124222', 'dadsds', 111),
(51, '23124222', 'dadsds', 111),
(52, '24343223', 'sads', 123),
(53, '2564', 'Kim Yoana', 3),
(54, '2564', 'Kim Yoana', 3),
(55, '2564', 'Kim Yoana', 3),
(56, '1234566', 'natali', 234),
(57, '243252', 'natali', 345),
(58, '8', 'natali', 8),
(59, '87878', 'nasa', 778),
(60, '87897', 'jjkhkj', 787);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
