
--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id_u` int(11) NOT NULL AUTO_INCREMENT,
  `rg_u` int(11) NOT NULL DEFAULT '2',
  `name_u` text NOT NULL,
  `ap_u` text NOT NULL,
  `av_u` text NOT NULL,
  `pass_u` text NOT NULL,
  `sexo_u` text NOT NULL,
  `pais_u` text NOT NULL,
  `mail_u` text NOT NULL,
  `nick_u` text NOT NULL,
  `freg_u` text NOT NULL,
  `hace_u` text NOT NULL,
  `on_u` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_u`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id_ct` int(11) NOT NULL AUTO_INCREMENT,
  `name_ct` text NOT NULL,
  `desc_ct` text NOT NULL,
  `seo_ct` text NOT NULL,
  `color_ct` text NOT NULL,
  `icon_ct` text NOT NULL,
  PRIMARY KEY (`id_ct`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_ct`, `name_ct`, `desc_ct`, `seo_ct`, `color_ct`, `icon_ct`) VALUES
(1, 'Entretenimiento', 'Entretenimiento para el coco.', 'entretenimiento', 'red', ''),
(2, 'Tecnologia', 'Todo sobre Tecnologia', 'tecnologia', 'red', ''),
(3, 'Investigaciones', 'investigaciones', 'investigaciones', 'red', ''),
(4, 'Proyectos', 'Proyectos de toda clase', 'proyectos', 'red', ''),
(5, 'Wortit', 'todo sobre Wortit', 'wortit', 'red', ''),
(6, 'Internacional', 'Lo Internacional', 'internacional', 'red', ''),
(7, 'Informatica', 'Informacion sobre el mundo de la informatica', 'informatica', 'red', ''),
(8, 'Programacion', 'programacion web', 'programacion', 'red', ''),
(9, 'Lectura', 'lectura', 'lectura', 'red', ''),
(10, 'Musica', 'music', 'music', 'blue', ''),
(11, 'Farandula', 'farandula', 'farandula', 'green', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coments`
--

CREATE TABLE IF NOT EXISTS `coments` (
  `id_co` int(11) NOT NULL AUTO_INCREMENT,
  `u_co` text NOT NULL,
  `con_co` text NOT NULL,
  `f_co` text NOT NULL,
  `h_co` text NOT NULL,
  `post_co` text NOT NULL,
  `activo_co` text NOT NULL,
  PRIMARY KEY (`id_co`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `coments`

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `name_c` text NOT NULL,
  `lema_c` text NOT NULL,
  `logo_c` text NOT NULL,
  `url_c` text NOT NULL,
  `id_c` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_c`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `config`
--

INSERT INTO `config` (`name_c`, `lema_c`, `logo_c`, `url_c`, `id_c`) VALUES
('Puntoceroc', 'Mundo', 'http://puntoceroc.com/i/pluswort.png', 'http://puntoceroc.com/', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

CREATE TABLE IF NOT EXISTS `visitas` (
  `id_v` int(255) NOT NULL AUTO_INCREMENT,
  `u_v` text NOT NULL,
  `ip_v` text NOT NULL,
  `f_v` text NOT NULL,
  `h_v` text NOT NULL,
  PRIMARY KEY (`id_v`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wposts`
--

CREATE TABLE IF NOT EXISTS `wposts` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `title_post` text,
  `seo_post` text NOT NULL,
  `cont_post` text,
  `cat_post` text NOT NULL,
  `tags_post` text NOT NULL,
  `id_usuario` text,
  `b_post` text NOT NULL,
  `fecha_post` text,
  `hace_post` text,
  PRIMARY KEY (`id_post`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

