-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 03-06-2025 a las 12:26:10
-- Versión del servidor: 10.11.10-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u203037805_favs`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `categoryID` varchar(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`categoryID`) VALUES
('3D'),
('Access'),
('accion'),
('AI'),
('amigos'),
('API'),
('aplicación'),
('aplicaciones'),
('azotador'),
('barcelona'),
('BBDD'),
('blog'),
('borrando'),
('business'),
('cartografía'),
('certificación'),
('cloud'),
('CMS'),
('code'),
('CPanel'),
('CSS'),
('cursos'),
('desarrollo'),
('diseño'),
('Doctorado'),
('documentos'),
('drm'),
('dukan'),
('ebook'),
('ebooks'),
('eDNI'),
('ehealth'),
('English'),
('escribir'),
('Excel'),
('fablab'),
('fitbit'),
('fletes'),
('fotos'),
('futuro'),
('Gamification'),
('gastronomía'),
('hardware'),
('HCI'),
('healthcare'),
('Herramientas'),
('Hosting'),
('Hostinger'),
('howto'),
('html'),
('icebreaker'),
('Indonesia'),
('internet'),
('Investigación'),
('iPad'),
('jardineria'),
('java'),
('JavaScript'),
('js'),
('kindle'),
('laboral'),
('Lenovo'),
('LetsEncrypt'),
('linux'),
('MachineLearning'),
('makers'),
('materiales'),
('México'),
('MySQL'),
('nas'),
('negocios'),
('Node'),
('Nook'),
('OpenSource'),
('pandas'),
('PHP'),
('pi'),
('postoperatorio'),
('privacidad'),
('programación'),
('publicación'),
('quantifiedSelf'),
('recursos'),
('renfe'),
('Resarch'),
('Resources'),
('robótica'),
('salud'),
('skills'),
('software'),
('SSL'),
('startups'),
('tecnología'),
('Thailand'),
('TIC'),
('toolkit'),
('traducción'),
('turismo'),
('Ubuntu'),
('UX'),
('viajes'),
('vida'),
('volar'),
('Wave'),
('WD'),
('WDMyCloud'),
('web'),
('wifi'),
('wii'),
('wiki'),
('windows'),
('wordpress');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catlink`
--

CREATE TABLE `catlink` (
  `categoryId` varchar(16) NOT NULL,
  `linkId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `catlink`
--

INSERT INTO `catlink` (`categoryId`, `linkId`) VALUES
('3D', 280),
('Access', 254),
('Access', 282),
('Access', 283),
('accion', 230),
('accion', 260),
('AI', 285),
('amigos', 202),
('API', 279),
('aplicación', 101),
('aplicación', 102),
('aplicaciones', 235),
('azotador', 70),
('azotador', 71),
('azotador', 80),
('azotador', 89),
('barcelona', 278),
('BBDD', 121),
('blog', 51),
('blog', 52),
('blog', 220),
('business', 274),
('cartografía', 188),
('certificación', 205),
('certificación', 206),
('cloud', 215),
('cloud', 217),
('cloud', 235),
('CMS', 129),
('CMS', 130),
('CMS', 131),
('CPanel', 290),
('CSS', 126),
('CSS', 127),
('CSS', 284),
('cursos', 222),
('desarrollo', 208),
('desarrollo', 237),
('desarrollo', 279),
('desarrollo', 282),
('desarrollo', 283),
('diseño', 148),
('diseño', 238),
('Doctorado', 270),
('documentos', 94),
('drm', 231),
('drm', 289),
('dukan', 123),
('ebook', 231),
('ebook', 245),
('ebook', 289),
('ebooks', 271),
('eDNI', 257),
('ehealth', 208),
('English', 132),
('English', 190),
('escribir', 256),
('escribir', 286),
('Excel', 128),
('fablab', 224),
('fablab', 225),
('fitbit', 266),
('fitbit', 267),
('fletes', 94),
('fletes', 95),
('fletes', 96),
('fletes', 97),
('fotos', 86),
('futuro', 276),
('Gamification', 269),
('gastronomía', 207),
('hardware', 261),
('HCI', 238),
('healthcare', 191),
('healthcare', 221),
('Herramientas', 198),
('Herramientas', 223),
('Herramientas', 263),
('Herramientas', 277),
('Hosting', 290),
('Hostinger', 290),
('howto', 232),
('howto', 233),
('howto', 234),
('html', 183),
('icebreaker', 236),
('Indonesia', 108),
('Indonesia', 109),
('internet', 77),
('internet', 79),
('internet', 80),
('internet', 84),
('Investigación', 270),
('iPad', 226),
('jardineria', 204),
('java', 205),
('java', 206),
('JavaScript', 210),
('JavaScript', 288),
('js', 288),
('kindle', 231),
('kindle', 289),
('laboral', 200),
('Lenovo', 232),
('Lenovo', 233),
('Lenovo', 234),
('Lenovo', 275),
('LetsEncrypt', 290),
('linux', 214),
('linux', 232),
('linux', 233),
('linux', 234),
('MachineLearning', 240),
('makers', 224),
('makers', 225),
('makers', 249),
('materiales', 271),
('México', 23),
('México', 54),
('México', 70),
('México', 71),
('México', 72),
('México', 74),
('México', 80),
('México', 85),
('México', 150),
('MySQL', 149),
('nas', 214),
('negocios', 203),
('Node', 288),
('Nook', 245),
('OpenSource', 188),
('pandas', 264),
('pandas', 265),
('PHP', 21),
('PHP', 112),
('PHP', 113),
('PHP', 118),
('PHP', 119),
('PHP', 135),
('PHP', 136),
('PHP', 137),
('PHP', 138),
('PHP', 139),
('PHP', 151),
('PHP', 281),
('pi', 214),
('pi', 218),
('pi', 228),
('postoperatorio', 273),
('privacidad', 19),
('programación', 21),
('programación', 77),
('programación', 133),
('programación', 188),
('programación', 193),
('programación', 194),
('programación', 196),
('programación', 205),
('programación', 206),
('programación', 210),
('programación', 211),
('programación', 216),
('programación', 226),
('programación', 229),
('programación', 238),
('publicación', 286),
('quantifiedSelf', 266),
('quantifiedSelf', 267),
('recursos', 65),
('recursos', 237),
('renfe', 278),
('Resarch', 270),
('Resources', 190),
('Resources', 199),
('robótica', 41),
('robótica', 66),
('robótica', 249),
('robótica', 258),
('salud', 230),
('salud', 260),
('salud', 273),
('skills', 64),
('skills', 134),
('software', 192),
('software', 213),
('software', 215),
('software', 239),
('SSL', 290),
('startups', 222),
('tecnología', 54),
('Thailand', 115),
('TIC', 199),
('toolkit', 235),
('traducción', 287),
('turismo', 264),
('turismo', 265),
('Ubuntu', 87),
('Ubuntu', 103),
('Ubuntu', 197),
('Ubuntu', 232),
('Ubuntu', 233),
('Ubuntu', 234),
('Ubuntu', 242),
('Ubuntu', 243),
('Ubuntu', 244),
('Ubuntu', 257),
('Ubuntu', 268),
('Ubuntu', 275),
('UX', 238),
('viajes', 67),
('viajes', 69),
('viajes', 255),
('vida', 219),
('volar', 255),
('Wave', 211),
('WD', 244),
('WD', 248),
('WDMyCloud', 246),
('WDMyCloud', 247),
('WDMyCloud', 248),
('web', 125),
('web', 183),
('web', 193),
('web', 198),
('web', 210),
('web', 212),
('web', 237),
('web', 238),
('web', 262),
('web', 284),
('wifi', 233),
('wifi', 234),
('wii', 216),
('wiki', 209),
('windows', 239),
('windows', 241),
('windows', 272),
('wordpress', 220);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `link`
--

CREATE TABLE `link` (
  `linkId` int(11) NOT NULL,
  `userId` varchar(8) NOT NULL,
  `title` varchar(127) NOT NULL,
  `URL` varchar(127) NOT NULL,
  `comment` longtext DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `link`
--

INSERT INTO `link` (`linkId`, `userId`, `title`, `URL`, `comment`, `date`) VALUES
(19, 'eva', '¿Quién vigila al vigilante?', 'http://www.lavigilanta.info/wordpress', 'Mi blog', '2009-01-28 08:10:02'),
(21, 'eva', 'Tizag.com tutorial de PHP', 'http://www.tizag.com/phpT/', 'Tutorial de PHP bastante útil por básico y claro', '2009-01-28 08:23:19'),
(23, 'eva', 'Náhuatl interactivo', 'http://www.elosiodelosantos.com/nahuatl.html', 'Recurso para aprender náhuatl', '2009-01-28 08:00:27'),
(192, 'eva', 'PDF Creator, para generar PDFs desde cualquier doc a través de menú impresión', 'http://sourceforge.net/projects/pdfcreator/', '', '2012-01-17 10:05:28'),
(151, 'eva', 'A favor de Yii, mucha información', 'http://erickennedy.org/Drupal-7-Reasons-to-Switch', '', '2012-01-04 23:55:44'),
(64, 'eva', 'Peka kucha, técnica para presentaciones altamente productivas e informales', 'http://es.wikipedia.org/wiki/Pecha_Kucha', 'Se trata de exponer de manera informal y luego conducir un debate creativo y sin límites aparentes, pero a la vez bien estructurado. No sé si me explico :)', '2009-02-11 12:00:08'),
(51, 'eva', 'Viviane Reding freedom of speech in the internet speech', 'http://ec.europa.eu/commission_barroso/reding/docs/speeches/2009/strasbourg-20090203.pdf', 'Para que lo leas, lo analices, y le dediques un post en la vigi', '2009-02-08 09:27:36'),
(52, 'eva', 'i2010 factsheet', 'http://ec.europa.eu/information_society/doc/factsheets/035-i2010-en.pdf', 'Factsheet sobre el i2010, sobre el cual hay que hablar, no hay más remedio.', '2009-02-08 09:32:16'),
(134, '', 'OpenBTS - Open-source cell phone network could cut costs to $2 per month  ', 'https://www.engineeringforchange.org/news/2010/06/21/open_source_cell_phone_network_could_cut_costs_to_2_per_month.html', 'Para montar redes de telefonía sin necesitar a una operadora.', '2011-12-16 15:30:29'),
(54, 'eva', 'Artículo sobre agencia aeroespacial mexicana y aplicaciones para la salud', 'http://alt1040.com/2009/02/tecnologia-agencia-espacial-mexicana-tendria-aplicaciones-medicas', '', '2009-02-10 09:56:46'),
(70, 'eva', 'Rediseño web gobierno México', 'http://alt1040.com/2009/02/gobierno-federal-mexicano-redisena-su-web-y-enfatiza-el-apartado-multimedia', '', '2009-02-23 14:10:19'),
(65, 'eva', 'Oil Reserves per country', 'http://www.nationmaster.com/graph/ene_oil_res-energy-oil-reserves', '', '2009-02-17 20:59:05'),
(66, 'eva', 'las 3 leyes de la robótica, versión militar Y DE VERDAD', 'http://www.elmundo.es/elmundo/2009/02/18/ciencia/1234986788.html', '', '2009-02-19 10:31:48'),
(67, 'eva', 'Viaje por el Mekong', 'http://www.ocholeguas.com/2009/02/19/asia/1235062852.html', '', '2009-02-21 13:54:07'),
(148, 'eva', 'Herramientas de diseño gratuitas', 'http://sachagreif.com/the-design-freebies-list/', '', '2012-01-04 11:33:45'),
(69, 'eva', 'Jaisalmer', 'http://101lugares.blogspot.com/2009/02/una-ciudad-dorada-en-la-india.html', 'Buenas fotos de Jaisalmer. Para refrescar la memoria y ayudar a la hora de montar el álbum... dos años después...', '2009-02-23 10:55:46'),
(41, 'eva', 'Robot autosuficiente que busca su fuente de energía entre la biomasa, es decir... COME', 'http://www.networkworld.com/community/node/37896', '', '2009-02-06 09:58:43'),
(71, 'eva', 'Exposición Pixar en México (MARCO)', 'http://alt1040.com/2009/02/la-exposicion-pixar-20-anos-de-animacion-llega-a-mexico', '', '2009-02-24 11:10:15'),
(72, 'eva', 'Universidad Nacional Abierta a Distancia', 'http://alt1040.com/2009/02/universidad-nacional-abierta-a-distancia-en-septiembre', '', '2009-02-25 11:29:58'),
(194, 'eva', 'Lista de libros para desarrolladores', 'http://www.codinghorror.com/blog/2004/02/recommended-reading-for-developers.html', '', '2012-01-18 14:27:07'),
(74, 'eva', 'Historia de la telefonía en México', 'http://www.ahciet.net/historia/pais.aspx?id=10145&ids=10677', '', '2009-02-28 00:42:26'),
(193, 'eva', 'Cómo documentar una aplicación Web con API pública', 'http://ffeathers.wordpress.com/2012/01/12/rest-api-documentation-embedded-in-the-application/', '', '2012-01-18 09:15:30'),
(77, 'eva', 'Diseño de aplicaciones Web, caso de éxito con cambiar un botón', 'http://www.uie.com/articles/three_hund_million_button', '', '2009-03-04 12:14:27'),
(190, 'br', 'English grammar', 'http://www.englisch-hilfen.de/en/grammar/if_type1.htm', 'Sitio web alemán para aprender Inglés.', '2012-01-13 09:28:06'),
(79, 'eva', 'El API de last.fm', 'http://www.devx.com/VisualStudio/Article/40158', '', '2009-03-09 16:16:12'),
(80, 'eva', 'Aprender maya por internet', 'http://alt1040.com/2009/03/promoviendo-la-lengua-maya-por-internet', '', '2009-03-11 16:41:04'),
(103, 'eva', 'gmount-iso para montar imágenes ISO en el Ubuntu', 'http://hacktivision.com/index.php/2008/02/24/how-to-mount-iso-images-in-ubuntu-the-ea?blog=2', '', '2009-08-31 23:24:24'),
(195, 'eva', 'Tip para arreglar la UI de la última versión de Ubuntu', 'http://www.haxney.org/2012/02/ongoing-saga-of-making-ubuntu-1110.html?utm_source=feedburner&utm_medium=feed&utm_campaign=Feed%3', '', '2012-03-02 08:37:00'),
(84, 'eva', 'Freedom to surf: workers more productive if allowed to use the internet for leisure ', 'http://uninews.unimelb.edu.au/news/5750/', '', '2009-04-07 09:42:38'),
(85, 'eva', 'ordenador de hidrógeno, invento mexicano', 'http://www.eluniversal.com.mx/articulos/53832.html', '', '2009-05-08 14:19:47'),
(86, 'eva', 'Los puentes más peligrosos del mundo', 'http://www.dirjournal.com/info/most-dangerous-bridges-in-the-world-rope-hanging-bridges/', '', '2009-05-12 09:25:05'),
(87, 'eva', 'Solucionar problemas de audio con Skype y Ubuntu', 'http://axiacore.com/blog/2008/06/problema-audio-skype-20-en-ubuntu-solucionado/', '', '2009-05-14 08:51:36'),
(89, 'eva', 'Fibra óptica de la CFE', 'http://alt1040.com/2009/05/uso-de-fibra-optica-de-la-cfe-para-telecomunicaciones-en-mexico', '', '2009-05-21 14:30:04'),
(94, 'eva', 'Documentos de transporte (página de transportista USA con...)', 'http://www.kindersleytransport.com/', '', '2009-07-27 14:40:38'),
(95, 'eva', 'Mudanzas y Fletes, S.A. ', 'http://www.mudanzasyfletes.com/index.htm', 'Simple y clara, muy buena seccion mostrando sus vehiculos', '2009-07-27 14:43:53'),
(96, 'eva', 'Go Daddy como configurar la mailer form', 'http://help.godaddy.com/topic/317/article/22', '', '2009-07-29 11:58:10'),
(97, 'eva', 'Go daddy USAR mailer forms', 'http://help.godaddy.com/article/510', '', '2009-07-29 12:46:19'),
(200, 'eva', 'Contratas y subcontratas', 'http://www.elergonomista.com/dtr16.html', '', '2012-06-11 14:36:13'),
(198, 'eva', 'Herramienta para alargar URLs acortadas', 'http://demo.midnightprogrammer.net/ASPNET/ReverseURL/Default.aspx', '', '2012-03-28 08:37:41'),
(199, 'br', 'Video tutoriales (Excel, Acces, Flash, otros)', 'http://www.teach-ict.com/videohome.htm', 'Colección de materiales en Ingles, para enseñar o estudiar TIC', '2012-05-04 22:26:08'),
(101, 'eva', 'Proteger contra SQL injection', 'http://www.metatitan.com/php/16/protecting-your-phpmysql-queries-from-sql-injection.html', '', '2009-08-31 21:57:15'),
(102, 'eva', 'Foreign Keys en MySQL', 'http://www.databasejournal.com/features/mysql/article.php/2248101/Referential-Integrity-in-MySQL.htm', '', '2009-08-31 22:42:32'),
(183, 'br', 'Learn to create websites', 'http://www.w3schools.com/', 'Free tutorials in all web development technologies.', '2012-01-05 13:27:38'),
(191, 'eva', 'The Human Biodigital es una plataforma con tecnología HTML5 para estudiantes de profesiones sanitarias', 'http://www.biodigitalhuman.com/default.html', '', '2012-01-13 11:14:10'),
(188, 'eva', 'Cartografía Open Source - artículo con las referencias a todos los productos necesarios para montar una solución que tire de Op', 'https://plus.google.com/u/0/118383351194421484817/posts/foj5A1fURGt', '', '2012-01-12 08:38:38'),
(108, 'eva', 'Borobudur en YogYes', 'http://www.yogyes.com/en/yogyakarta-tourism-object/candi/borobudur/', 'Descripcion del sitio unesco indonesio Borobudur', '2011-05-08 21:54:37'),
(109, 'eva', 'Prambanan en YogYes', 'http://www.yogyes.com/en/yogyakarta-tourism-object/candi/prambanan/', 'Explicacion sobre el sitio unesco Prambanan', '2011-05-08 21:55:47'),
(201, 'eva', 'instrucciones para eliminar el DRM de los libros digitales', 'http://apprenticealf.wordpress.com/2011/01/13/ebooks-formats-drm-and-you-%E2%80%94-a-guide-for-the-perplexed/', 'Para quitar el DRM de los libros que puedas llegar a comprar en Amazon.', '2012-10-23 09:01:53'),
(196, 'eva', 'Github y eclipse', 'https://github.com/blog/232-github-and-eclipse', 'Para configurar github y eclipse', '2012-03-21 21:06:10'),
(112, 'eva', 'listas en PHP - la solucion a mis problemas', 'http://technosophos.com/content/set-objects-php-arrays-vs-splobjectstorage', 'SplObjectStorage versus normal arrays', '2011-05-10 15:34:25'),
(113, 'eva', 'Class SplObjectStorage, para hacer listas en php', 'http://www.php.net/~helly/php/ext/spl/classSplObjectStorage.html', '', '2011-05-10 15:46:08'),
(132, 'eva', 'Past participle pronunciation ', 'http://www.englishclub.com/pronunciation/-ed.htm', '', '2011-11-03 18:47:08'),
(133, 'eva', 'Excelente video sobre JavaScript', 'http://yuiblog.com/blog/2007/01/24/video-crockford-tjpl/', 'Es un video en un blog,muy buena explicación sobre JavaScript.', '2011-11-08 15:25:50'),
(115, 'eva', 'Kanchanaburi info, sitio oficial del ayuntamiento', 'http://www.kanchanaburi-info.com', '', '2011-05-15 19:54:57'),
(197, 'eva', 'Gnomad2 y Creative Zen Micro', 'http://www.void.gr/kargig/blog/2007/06/23/gnomad2-usb_set_configuration-operation-not-permitted-fix/', '', '2012-03-25 11:34:52'),
(149, 'eva', 'Colaciones, character sets... clarito para MySQL', 'http://www.guebs.com/manuales/mysql-5.0/charset.html', '', '2012-01-04 16:55:38'),
(118, 'eva', 'PHP Design Patterns', 'http://www.fluffycat.com/PHP-Design-Patterns/', '', '2011-05-24 14:01:10'),
(119, 'eva', 'Codificación geográfica de direcciones en Google Maps con PHP y MySQL', 'http://code.google.com/intl/es/apis/maps/articles/phpsqlgeocode.html', '', '2011-05-25 10:23:22'),
(150, 'eva', 'Stay.com guia personalizada DF', 'http://www.stay.com/mexico-city/', '', '2012-01-04 23:49:09'),
(121, 'eva', 'Guia de PyTables para gente SQL como yo', 'http://www.pytables.org/moin/HintsForSQLUsers', 'Para aprender a utilizar bases de datos no relacionales sin tener que desaprenderlo todo.', '2011-06-05 11:47:40'),
(123, 'eva', 'Recetas dieta Dukan', 'http://ladietadukan.es/', '', '2011-08-15 21:20:21'),
(125, 'eva', 'Aplicaciones, Marketing y Noticias en la web', 'http://wwwhatsnew.com/', 'Muy buena compilación de actualidad en TIC. Mucha información. Buena selección de artículos. ', '2011-09-22 19:23:04'),
(126, 'eva', 'Manual de CSS en español', 'http://www.manualdecss.com/', 'No es completo pero está bien el tema de formateo del texto', '2011-10-17 10:40:07'),
(127, 'eva', 'Styling Basics (pero en realidad intermediate)', 'http://www.goer.org/HTML/intermediate/', 'Me gusta mucho cómo explica el CSS', '2011-10-17 11:14:28'),
(128, 'eva', 'Drop down lists en Excel 2007', 'http://spreadsheets.about.com/od/datamanagementinexcel/qt/20071113_drpdwn.htm', 'Instrucciones paso a paso para crear desplegables en Excel.', '2011-11-03 10:59:20'),
(129, 'eva', 'Comparador de CMS con links Drupal, Joomla, WordPress', 'http://blog.andy21.com/2011/wordpress-vs-joomla-vs-drupal/', '', '2011-11-03 11:11:56'),
(130, 'eva', 'Comparación Joomla y Drupal, más en detalle', 'http://www.pcpro.co.uk/blogs/2011/02/02/joomla-1-6-vs-drupal-7-0/', 'en inglés', '2011-11-03 11:13:23'),
(131, 'eva', 'Comparación Joomla y Drupal, más en detalle', 'http://www.pcpro.co.uk/blogs/2011/02/02/joomla-1-6-vs-drupal-7-0/', 'en inglés', '2011-11-03 11:19:57'),
(135, 'eva', 'Manual de Reflection para PHP5', 'http://tuxradar.com/practicalphp/16/4/0', '', '2012-01-02 22:47:01'),
(136, 'eva', 'Sobre PHP frameworks 1', 'http://www.phpclasses.org/blog/post/52-Recommended-PHP-frameworks.html', '', '2012-01-02 22:51:44'),
(137, 'eva', 'Sobre PHP frameworks 2', 'http://wonko.com/post/a_simple_and_elegant_phpmysql_web_application_framework_part_2_g', '', '2012-01-02 22:52:12'),
(138, 'eva', 'Sobre PHP frameworks 3', 'http://stackoverflow.com/questions/6404840/mysql-php-class-recommendation', '', '2012-01-02 22:52:36'),
(139, 'eva', 'Yii Framework', 'http://www.yiiframework.com/', '', '2012-01-02 22:55:19'),
(204, 'eva', 'Cuetlaxochitl o Poinsetia, cuidados', 'http://blogs.lavanguardia.com/plantas/cuetlaxochitl-71364', '', '2013-01-14 08:34:40'),
(202, 'eva', 'Ching Wei', 'http://www-o.ntust.edu.tw/~cweiwang/', '', '2012-11-28 11:05:42'),
(203, 'eva', '100 dollar startup', 'http://100startup.com/', 'Negocios con pequeña inversión', '2013-01-10 16:09:33'),
(205, 'eva', 'Java Programmer Level 1', 'http://docs.oracle.com/javase/tutorial/extra/certification/javase-7-programmer1.html', '', '2013-01-14 10:09:49'),
(206, 'eva', 'Java Programmer todos niveles', 'http://docs.oracle.com/javase/tutorial/extra/certification/index.html', '', '2013-01-14 10:10:58'),
(207, 'eva', 'Food Thinking', 'http://www.food-thinking.com/', 'Estudio y análisis de las tendencias gastronómicas en 4 países incl. UK y España', '2013-01-23 17:04:20'),
(208, 'eva', 'Concurso gobierno EEUU sobre interfaces de usuario para apps médicas', 'http://healthdesignchallenge.com/', '', '2013-01-29 08:07:39'),
(209, 'eva', 'Media Wiki insertar fotos instrucciones', 'http://www.siteground.com/tutorials/mediawiki/mediawiki_images.htm', '', '2013-02-16 22:37:26'),
(210, 'eva', 'Como funcionan los menus super rapidos de Amazon', 'http://bjk5.com/post/44698559168/breaking-down-amazons-mega-dropdown', 'incluye script js para lograrlo.', '2013-03-07 12:34:06'),
(211, 'eva', 'Rizzoma, retomando Wave', 'http://rizzoma.com/', '', '2013-03-19 10:19:15'),
(212, 'eva', 'If This Then That libre: Huginn', 'http://www.wired.com/wiredenterprise/2013/03/hugin/', '', '2013-03-19 10:30:41'),
(213, 'eva', 'Arreglar Skype para Ubuntu 12.04', 'http://askubuntu.com/questions/126765/skype-video-not-working-after-upgrade-from-11-10-to-12-04', 'Problemas con el video, parece que esto los soluciona.', '2013-04-11 12:28:51'),
(214, 'eva', 'Montar un NAS con Raspberry Pi', 'http://www.smallnetbuilder.com/nas/nas-howto/32053-make-your-own-raspberry-pi-nas', '', '2013-04-12 16:20:13'),
(215, 'eva', 'Owncloud, para montarnos nuestro Dropbox en el hosting sin límite de espacio', 'http://doc.owncloud.org/server/4.5/admin_manual/installation.html', '', '2013-05-06 09:28:03'),
(216, 'eva', 'Conectar la Wii Fit con un Android', 'http://www.theverge.com/2013/5/2/4292712/fitscales-wii-fit-balance-board-connected-scale', '', '2013-05-06 12:31:43'),
(217, 'eva', 'Trial grautito para Amazon Web Services', 'http://aws.amazon.com/free/', '', '2013-05-11 22:37:36'),
(218, 'eva', 'SSH para Raspberry Pi', 'http://learn.adafruit.com/adafruits-raspberry-pi-lesson-6-using-ssh/overview', '', '2013-05-20 14:31:58'),
(219, 'eva', 'TicTrac, plataforma de trazabilidad de actividad', 'https://tictrac.com/', 'Para evaluarla y copiar su funcionalidad.', '2013-05-22 09:41:20'),
(220, 'eva', 'Responsive Theme for WordPress', 'http://themeid.com/responsive-theme/', '', '2013-06-10 13:47:52'),
(221, 'eva', 'Healthcare Metrics for Evaluation', 'http://www.healthmetricsandevaluation.org/gbd/visualizations/gbd-cause-patterns', '', '2013-06-10 14:08:20'),
(222, 'eva', 'Course on Startups', 'http://blakemasters.com/peter-thiels-cs183-startup', '', '2013-06-10 14:15:09'),
(223, 'eva', 'Número provincial a partir de número 901', 'http://www.preguntasfrecuentes.net/2010/09/13/telefonos-901-funcionamiento-y-tarifas/', '', '2013-08-01 08:02:17'),
(224, 'eva', '3DLab próximamente en el DF', 'http://www.3dlab-fabcafe.com/en/', '', '2013-11-13 09:03:20'),
(225, 'eva', 'Fab Lab Barcelona (del ayuntamiento)', 'http://fablab.fikket.es/event/open-days--2', '', '2013-11-13 09:46:47'),
(226, 'eva', 'Apps de programación para iPad', 'http://www.techwithintent.com/2012/07/5-best-ipad-apps-to-teach-programming/', '', '2013-11-19 21:47:04'),
(230, 'eva', 'Hipercolesterolemia familiar', 'http://elpais.com/m/elpais/2015/01/04/ciencia/1420329861_182601.html', '', '2015-01-05 09:18:11'),
(228, 'eva', 'Adafruit aprende Raspberry Pi', 'http://learn.adafruit.com/', '', '2014-03-12 21:25:52'),
(229, 'eva', 'Cheat sheets o chuletas de lenguajes de programación', 'http://www.cheat-sheets.org/', 'Imprescindibles para los que programamos de peras a uvas, tenemos claro el algoritmo pero la barrera de entrada a primera compilación por temas de sintaxis básica es demasiado dolorosa!!!', '2014-04-06 17:01:24'),
(231, 'eva', 'Quitar DRM del Kindle', 'http://www.howtogeek.com/162994/how-to-strip-the-drm-from-your-kindle-ebooks-for-cross-device-enjoyment-and-archiving/', 'Instrucciones para quitar DRM de los ebooks que \r\ncompras en amazon.\r\nNecesitas tener Kindle for PC y el Calibre \r\ninstalado.', '2015-01-26 09:24:38'),
(232, 'eva', 'Instalar Nvidia 840M en Ubuntu 14.04', 'http://askubuntu.com/questions/518985/ubuntu-14-04-and-nvidia-geforce-840m-compatability-on-64-bit-laptop', 'instrucciones para instalar el driver de la NVidia \r\n840 de mi Lenovo nuevo.', '2015-01-26 09:40:12'),
(233, 'eva', 'Arreglar problemas de la Wifi en tarjeta Realtek RTL8723BE', 'http://doc.kubuntu-fr.org/clevo_w310cz#realtek_rtl8723be1', 'Este problema se manifiesta actualmente en el DELL \r\ny posiblemente en el Lenovo', '2015-01-26 10:14:55'),
(234, '', 'Arreglar problemas de la Wifi en tarjeta Realtek RTL8723BE', 'http://doc.kubuntu-fr.org/clevo_w310cz#realtek_rtl8723be1', 'Este problema se manifiesta actualmente en el DELL \r\ny posiblemente en el Lenovo', '2015-01-26 14:58:44'),
(235, 'eva', 'Herramientas para Startups', 'http://www.online.com.es/21981/internet/herramientas-para-startups/', 'Muchas herramientas en cloud, muchas gratuitas, que \r\nse pueden usar en equipos pequeños de trabajo', '2015-01-30 12:30:00'),
(236, 'eva', 'Es azul o dorado?? buenísimo', 'http://www.wired.com/2015/02/science-one-agrees-color-dress/', '', '2015-02-27 09:31:12'),
(237, 'eva', 'Fuentes de marcas conocidas', 'http://www.designbolts.com/2013/09/07/20-free-fonts-used-in-famous-brand-logos/', '', '2015-03-03 09:23:23'),
(238, 'eva', 'Hackdesign. Material imprescindible para diseñar sistemas', 'https://hackdesign.org/lessons', '', '2015-03-06 10:40:27'),
(239, 'eva', 'Utilidad para montar imagenes ISO en Windows 7', 'http://wincdemu.sysprogs.org/', '', '2015-03-25 18:06:50'),
(240, 'eva', 'Machine Learning Scripts and Frameworks', 'https://github.com/josephmisiti/awesome-machine-learning', '', '2015-03-28 01:46:23'),
(241, 'eva', 'ShadowExplorer para restaurar ficheros antiguos en Windows 7', 'http://www.shadowexplorer.com/downloads.html', '', '2015-03-29 03:42:30'),
(242, 'eva', 'Fix Trackpad on Lenovo with Ubuntu 14.04', 'http://www.evilcodingmonkey.com/2014/01/23/ubuntu-activate-multi-touch-on-elantech/', 'Esto ha funcionado', '2015-04-15 20:11:15'),
(243, 'eva', 'Data Recovery con Ubuntu', 'https://help.ubuntu.com/community/DataRecovery', '', '2015-04-15 20:42:28'),
(244, 'eva', 'Instrucciones para configurar NAS con el WD My Cloud', 'http://www.huffingtonpost.com/dulio-denis/wd-my-cloud-nas-on-ubuntu_b_5121961.html', '', '2015-04-17 18:34:37'),
(245, 'eva', 'Screensavers para el Nook', 'http://www.nook-look.com/nookfiles/index/6/page:1/sort:uploaded/direction:desc', '', '2015-04-20 08:03:51'),
(246, 'eva', 'WD Cloud - Optimization Instructions', 'http://community.wd.com/t5/WD-My-Cloud/before-you-pack-up-your-WD-and-return-it-let-s-talk-about/td-p/683307', '', '2015-04-20 11:22:12'),
(247, 'eva', 'WD Cloud - Optimization Instructions (otro)', 'http://www.elftronix.com/how-to-fix-wd-my-cloud-low-speed-problems-make-it-fast/', '', '2015-04-20 11:22:36'),
(248, 'eva', 'Review del WDMyCloud', 'http://www.thephoblographer.com/2014/01/11/review-wd-cloud-2tb-personal-cloud-storage/#.VTdmbSHtlBc', '', '2015-04-22 09:21:23'),
(249, 'eva', 'DIY Makers - en castellano', 'http://diymakers.es/', '', '2015-04-22 13:48:54'),
(252, 'eva', 'Useful Arithmetic Operators in MS Access', 'https://theaccessbuddy.wordpress.com/2012/10/14/7-useful-arithmetic-operators-in-ms-access-that-you-should-know-operator-types-', '', '2015-04-30 10:28:05'),
(253, 'eva', 'Useful Arithmetic Operators in MS Access', 'https://theaccessbuddy.wordpress.com/2012/10/14/7-useful-arithmetic-operators-in-ms-access-that-you-should-know-operator-types-', '', '2015-04-30 10:28:22'),
(254, 'eva', 'VBA Module with DateTime functions, very useful', 'https://msdn.microsoft.com/en-us/library/office/hh134613(v=office.14).aspx', '', '2015-04-30 11:02:36'),
(255, 'eva', 'Cómo es volar en Suites, las cabinas de súper lujo de Singapore Airlines', 'http://dereklow.co/what-its-like-to-fly-the-23000-singapore-airlines-suites-class/', '', '2015-05-06 07:12:31'),
(256, 'eva', 'Twinery, open source para escribir storyboards', 'http://twinery.org/', '', '2015-05-11 18:46:55'),
(257, 'eva', 'Usar DNI electrónico en Ubuntu con lector Woxter', 'http://www.ubuntu-guia.com/2014/04/instalar-dni-electronico-en-ubuntu.html', '', '2015-05-13 15:19:12'),
(258, 'eva', 'Robohub, excelente portal sobre robótica', 'http://robohub.org/ideahub-abb-launch-new-robotics-accelerator-programme/', '', '2015-05-18 08:00:20'),
(260, 'eva', 'Revisión ocular online Zeiss', 'http://www.zeiss.es/vision-care/es_es/better-vision/mejor-vision-con-zeiss/prueba-visual-en-linea-de-zeiss.html', '', '2015-06-04 15:14:14'),
(261, 'eva', 'Macrium, herramienta con versión gratis para clonar discos', 'http://macrium.com/', '', '2015-06-17 10:44:09'),
(262, 'eva', 'Tutorial de Wordpress, Drupal, Moodle', 'http://lawebmistress.org/', '', '2015-06-30 08:55:06'),
(263, 'eva', 'PDF Tools', 'http://smallpdf.com/', '', '2015-07-01 08:08:45'),
(264, 'eva', 'Criadero de pandas en Chengdu (fotos)', 'http://www.boredpanda.com/panda-daycare-nursery-chengdu-research-base-breeding/', '', '2015-07-07 10:47:39'),
(265, 'eva', 'Criadero de pandas en Chengdu (centro)', 'http://www.panda.org.cn/english/', '', '2015-07-07 10:48:07'),
(266, 'eva', 'Fitbit Data Export (ms azure)', 'http://fitbit-export.azurewebsites.net/', '', '2015-07-13 15:44:20'),
(267, 'eva', 'Fitbit API Documentation', 'https://wiki.fitbit.com/display/API/Fitbit+Resource+Access+API', '', '2015-07-14 07:44:56'),
(268, 'eva', 'Obtencion licencia OEM de Windows 8.1 en mi Lenovo', 'http://superuser.com/questions/637971/how-do-i-get-out-my-embedded-windows-8-key-from-a-linux-environment', '', '2015-08-08 18:34:20'),
(269, 'eva', 'Serious Games', 'http://www.ebgd.be/', '', '2015-09-18 16:45:26'),
(270, 'eva', 'Research Gate, montón de artículos científicos', 'https://www.researchgate.net', '', '2015-10-16 11:58:26'),
(271, 'eva', 'National Academies Press', 'http://www.nap.edu/', 'Repositorio de artículos científicos.', '2015-11-05 12:13:00'),
(272, 'eva', 'HashTab para Windows. Añade un tab a propiedades de fichero que contiene los hash calculados', 'http://implbits.com/products/hashtab/#', '', '2015-11-11 11:00:52'),
(273, 'eva', 'Estancias de recuperación postoperatoria - hotel Victoria en Caldes de Montbui', 'http://www.termesvictoria.com/ca-ES/estancia-de-recuperacion.aspx', 'Incluye curas diarias de enfermería', '2015-12-04 12:15:45'),
(274, 'eva', 'How to create a lean canvas model', 'http://xtensio.com/how-to-create-a-lean-canvas/', '', '2015-12-15 15:34:08'),
(275, 'eva', 'Arreglar el touchpad del lenovo z50-70 bajo ubuntu 14.04', 'http://askubuntu.com/questions/591671/touchpad-lenovo-z50-70-ubuntu-14-04/610575', 'El último comentario es el que funciona:\r\n\r\nDownload the file and then on terminal one by one line: https://bugs.launchpad.net/ubuntu/+source/linux/+bug/1407785/+attachment/4309044/+files/psmouse-elantech-x551c-G50-70.tar.gz\r\n\r\n\r\nsudo dkms ldtarball psmouse-elantech-x551c-G50-70.tar.gz\r\n\r\nsudo dkms install -m psmouse -v elantech-x551c-G50-70\r\n\r\nsudo rmmod psmouse\r\n\r\nsudo modprobe psmouse\r\n', '2016-01-26 12:09:35'),
(276, 'eva', 'Video sobre el Nuevo Futuro o Industrial Revolution 4.0', 'https://youtu.be/6ZOkoRuV1R0', '', '2016-04-20 10:22:13'),
(277, 'eva', 'Draw.io, herramienta gratuita online tipo Visio', 'https://www.draw.io/', '', '2016-04-21 10:32:59'),
(278, 'eva', 'Plano de cercanías de RENFE clicable', 'http://www.gencat.cat/rodalies/planol_regional.htm', 'Poniendo el cursor sobre el nombre de una estación se ven los servicios de ésta (incluyendo accesibilidad, ascensores).', '2016-04-24 08:06:48'),
(279, 'eva', 'Digital Globe API gratuita imágenes de satélite alta definición', 'http://explore.digitalglobe.com/high-resolution-satellite-maps-api-free.html', '', '2016-04-25 10:09:00'),
(280, 'eva', 'Trucos para imprimir modelos de Sketchup en impresoras 3D', 'http://iesmva3d.blogspot.de/2014/04/pasar-mi-diseno-de-sketchup-una.html', '', '2016-05-09 08:42:38'),
(281, 'eva', 'PDO as replacement for mysql functions en PHP', 'http://stackoverflow.com/questions/12859942/why-shouldnt-i-use-mysql-functions-in-php', 'En el centro del post hay un mini tutorial muy \r\nbueno de PDO.', '2016-05-20 11:05:46'),
(282, 'eva', 'Access Concatenate values from related records', 'http://allenbrowne.com/func-concat.html', 'Ah, esa sensación cuando tienes quieres \r\ndesnormalizar algo en Access y no hay manera de \r\nhacerlo vía query. Esta función te ayuda. Es \r\ngenial', '2016-05-31 15:12:15'),
(283, 'eva', 'Access Quotes within Quotes in Access queries', 'http://allenbrowne.com/casu-17.html', 'Todo lo que necesitas para entender cómo poner \r\ncomillas en tus queries en Access. Se entiende en \r\n5 minutos!', '2016-05-31 15:13:05'),
(284, 'eva', 'Responsive Design WWW Schools', 'http://www.w3schools.com/css/css_rwd_intro.asp', '', '2016-06-03 17:56:09'),
(285, 'eva', 'IBM Watson Self-Service', 'http://www.ibm.com/smarterplanet/us/en/ibmwatson/developercloud/services-catalog.html', '', '2016-06-07 07:52:00'),
(286, 'eva', 'Consejos para la autopublicación', 'http://www.zendalibros.com/diez-consejos-autopublicarse-no-morir-intento', '', '2016-06-10 09:27:22'),
(287, 'eva', 'Linguee - good translation resource', 'http://www.linguee.es/', 'Excellent for translations, because it gives you \r\nthe context (or examples) for each of the \r\nsuggestions', '2016-06-22 13:15:42'),
(288, 'eva', 'node.js export y require - todo lo que necesitas saber!', 'http://openmymind.net/2012/2/3/Node-Require-and-Exports/', '', '2016-07-05 07:20:47'),
(289, 'eva', 'Quitar drm kindle nuevas versions', 'https://www.mobileread.com/forums/showthread.php?t=283371', 'drm kindle ebook', '2018-08-12 19:30:38'),
(290, 'eva', 'Let\'s encrypt Hostinger CPanel', 'https://www.hostinger.com/tutorials/ssl/installing-ssl-letsencrypt', '', '2018-10-11 08:22:52'),
(291, 'eva', 'Let\'s encrypt Hostinger CPanel', 'https://www.hostinger.com/tutorials/ssl/installing-ssl-letsencrypt', '', '2018-10-11 08:22:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `userTable`
--

CREATE TABLE `userTable` (
  `userId` varchar(8) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `userTable`
--

INSERT INTO `userTable` (`userId`, `password`) VALUES
('eva', 'dea56e47f1c62c30b83b70eb281a6c39'),
('br', 'dea56e47f1c62c30b83b70eb281a6c39');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indices de la tabla `catlink`
--
ALTER TABLE `catlink`
  ADD PRIMARY KEY (`categoryId`,`linkId`);

--
-- Indices de la tabla `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`linkId`);

--
-- Indices de la tabla `userTable`
--
ALTER TABLE `userTable`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `link`
--
ALTER TABLE `link`
  MODIFY `linkId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=292;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
