-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2016 a las 23:56:43
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.5.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bookstore`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `descripcion`) VALUES
(1, 'terror'),
(2, 'drama'),
(3, 'Juvenil'),
(4, 'Ciencia Ficcion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
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
  `fecha` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `usuario`, `clave`, `apellido`, `nombre`, `domicilio`, `telefono`, `mail`, `id_localidad`, `foto`, `rol`, `fecha`) VALUES
(7, 'nati', '1234', 'lopez leiva', 'natali', 'gorriti', '1111111', 'nati6029@gmail.com', 1, 'fotos/clientes/2016-06-02023300_44514.jpeg', 'admi', ''),
(8, 'nati2', '1234', 'gomez', 'ana', 'gorriti', '1111111', 'nati6029@gmail.com', 1, 'fotos/clientes/2016-06-01033637_52314.jpeg', 'cli', ''),
(9, 'pablo', '1234', 'dante', 'pablo', 'gorriti', '1111111', 'pablo@gmail.com', 1, 'fotos/clientes/2016-06-01033756_99565', 'cli', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editoriales`
--

CREATE TABLE `editoriales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `sitioWeb` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

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

CREATE TABLE `libros` (
  `id` int(11) NOT NULL,
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
  `archivo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `ISBN`, `titulo`, `descripcion`, `nroEdicion`, `cantPaginas`, `precio`, `existencia`, `id_editorial`, `id_categoria`, `foto`, `archivo`) VALUES
(30, '9788466644174', 'Hush Hush', 'Nora Grey, una alumna aplicada en busca de una beca para la universidad, vive con su madre viuda en una granja a las afueras de PÃ³rtland, Maine. Cuando Patch se convierte en su nuevo compaÃ±ero de instituto, Nora siente a la vez atracciÃ³n y repulsiÃ³n hacia este extraÃ±o personaje que parece tener acceso a sus pensamientos. Luego se entera de que Patch es un Ã¡ngel caÃ­do que quiere convertirse en humano. Nora estÃ¡ bajo su control, pero hay tambiÃ©n otras fuerzas en juego y de repente se encuentra viviendo hechos inexplicables y en medio de una situaciÃ³n muy peligrosa.', 1, 369, 295, 10, 3, 3, 'fotos/2016-05-15053552_84888.jpeg', ''),
(31, '9789871783489', 'Destino', 'Cuando todo parece perdido, a veces, el azar nos concede segundas oportunidades. Pero Ever y Damen saben que su condena no tiene remedio: pasarÃ¡n la eternidad juntos y sin poder tocarse. Sin embargo, un giro del destino les ofrece una salida... a cambio de un gran sacrificio: Ever debe escoger entre liberar Damen o buscar el Ãrbol de la Vida, cuyo fruto podrÃ­a salvar al resto de inmortales.Â¿SerÃ¡ capaz Ever de sacrificar el destino de cientos de almas por egoÃ­smo? Â¿Se arriesgarÃ¡ a perder su amor por un fin superior?', 2, 368, 219, 10, 5, 3, 'fotos/2016-05-15054849_103713.jpeg', ''),
(33, '7798168772428', 'Ciudad de Huesos', 'En el Pandemonium, la discoteca de moda de Nueva York, Clary sigue a un atractivo chico de pelo azul hasta que presencia su muerte a manos de tres jÃ³venes cubiertos de extraÃ±os tatuajes. Desde esa noche, su destino se une al de esos tres cazadores de sombras, guerreros dedicados a liberar la tierra de demonios y, sobre todo, al de Jace, un chico con aspecto de Ã¡ngel y tendencia a actuar como un idiota....', 1, 369, 295, 10, 3, 3, 'fotos/2016-05-15055315_28797.jpeg', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidades`
--

CREATE TABLE `localidades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `codigoPostal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `localidades`
--

INSERT INTO `localidades` (`id`, `nombre`, `codigoPostal`) VALUES
(1, 'Rosario', 2000),
(2, 'cordoba', 0),
(3, 'corrientes', 1111),
(4, 'san luis', 0),
(5, 'Buenos aires', 1111);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `fechaPedido` datetime NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_libro` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` double NOT NULL,
  `id_tarjeta` int(11) NOT NULL,
  `domicilio` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `fechaPedido`, `id_cliente`, `id_libro`, `cantidad`, `subtotal`, `id_tarjeta`, `domicilio`) VALUES
(76, '2016-06-05 18:01:42', 7, 31, 1, 219, 53, 'gorriti1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `cuit` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombre`, `cuit`, `email`) VALUES
(1, 'naa', '21322', 'asdsd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjeta`
--

CREATE TABLE `tarjeta` (
  `id` int(11) NOT NULL,
  `numero_Tarjeta` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `titular` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `codigo_seguridad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tarjeta`
--

INSERT INTO `tarjeta` (`id`, `numero_Tarjeta`, `titular`, `codigo_seguridad`) VALUES
(53, '123456789', 'nati', 787);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `editoriales`
--
ALTER TABLE `editoriales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `localidades`
--
ALTER TABLE `localidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tarjeta`
--
ALTER TABLE `tarjeta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `editoriales`
--
ALTER TABLE `editoriales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de la tabla `localidades`
--
ALTER TABLE `localidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tarjeta`
--
ALTER TABLE `tarjeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
