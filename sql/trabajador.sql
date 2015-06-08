CREATE TABLE IF NOT EXISTS `trabajador`(
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dni` char(8) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `correo` char(50) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp  NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp  NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
);