-- Elyass Jerari

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pt03_elyass_jerari`
--
CREATE DATABASE IF NOT EXISTS `pt03_elyass_jerari` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pt03_elyass_jerari`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articles`
--

INSERT INTO `articles` (`id`, `article`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
(2, 'Massa tincidunt nunc pulvinar sapien et ligula ullamcorper.'),
(3, 'Ultrices tincidunt arcu non sodales neque sodales ut.'),
(4, 'Mauris ultrices eros in cursus turpis massa tincidunt dui ut.'),
(5, 'Morbi quis commodo odio aenean. Tincidunt id aliquet risus feugiat in ante metus dictum at.'),
(6, 'Gravida quis blandit turpis cursus in hac habitasse platea dictumst.'),
(7, 'Iaculis eu non diam phasellus vestibulum lorem sed. Phasellus faucibus scelerisque eleifend donec pretium vulputate sapien nec.'),
(8, 'Cursus turpis massa tincidunt dui ut ornare lectus. Dictum fusce ut placerat orci nulla pellentesque dignissim enim sit.'),
(9, 'Massa tincidunt dui ut ornare lectus sit. Eu turpis egestas pretium aenean pharetra magna ac placerat.'),
(10, 'Aenean pharetra magna ac placerat. Sit amet consectetur adipiscing elit ut.'),
(11, 'Quis varius quam quisque id diam vel. Feugiat in ante metus dictum.'),
(12, 'Ornare arcu dui vivamus arcu felis bibendum ut tristique et.'),
(13, 'Usto nec ultrices dui sapien eget mi proin sed libero. Pulvinar sapien et ligula ullamcorper malesuada proin libero.'),
(14, 'Laoreet non curabitur gravida arcu ac tortor. Scelerisque felis imperdiet proin fermentum leo.'),
(15, 'Habitant morbi tristique senectus et netus et. Interdum consectetur libero id faucibus nisl tincidunt eget nullam non.'),
(16, 'Tempus urna et pharetra pharetra massa massa ultricies. Diam ut venenatis tellus in metus vulputate eu.'),
(17, 'Et netus et malesuada fames ac turpis. Libero id faucibus nisl tincidunt eget. Justo donec enim diam vulputate ut pharetra sit amet aliquam.'),
(18, 'Cras fermentum odio eu feugiat pretium. Augue mauris augue neque gravida in fermentum et sollicitudin.'),
(19, 'Pharetra massa massa ultricies mi quis hendrerit dolor magna eget.'),
(20, 'Augue neque gravida in fermentum et sollicitudin. Laoreet suspendisse interdum consectetur libero id faucibus.'),
(21, 'Tellus mauris a diam maecenas. Porttitor lacus luctus accumsan tortor posuere.'),
(22, 'Integer feugiat scelerisque varius morbi enim nunc faucibus. Accumsan tortor posuere ac ut consequat semper.'),
(23, 'Feugiat in ante metus dictum at tempor. Consectetur adipiscing elit pellentesque habitant morbi.'),
(24, 'Integer malesuada nunc vel risus. Non diam phasellus vestibulum lorem sed risus.'),
(25, 'Enim praesent elementum facilisis leo vel fringilla est ullamcorper eget. Feugiat scelerisque varius morbi enim. Ligula ullamcorper malesuada proin libero nunc.'),
(26, 'Adipiscing at in tellus integer feugiat scelerisque varius.'),
(27, 'Placerat in egestas erat imperdiet sed euismod nisi porta. A cras semper auctor neque vitae tempus quam pellentesque nec.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
