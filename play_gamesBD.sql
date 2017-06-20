/*
SQLyog Community v12.4.1 (64 bit)
MySQL - 10.1.19-MariaDB : Database - play_games
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`play_games` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `play_games`;

/*Table structure for table `accesorio` */

DROP TABLE IF EXISTS `accesorio`;

CREATE TABLE `accesorio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  `descripcion` tinytext NOT NULL,
  `imagen` tinytext NOT NULL,
  `precio` int(11) NOT NULL,
  `rela_consola` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rela_consola2` (`rela_consola`),
  CONSTRAINT `fk_rela_consola2` FOREIGN KEY (`rela_consola`) REFERENCES `consola` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `accesorio` */

/*Table structure for table `consola` */

DROP TABLE IF EXISTS `consola`;

CREATE TABLE `consola` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `consola` */

/*Table structure for table `direccion` */

DROP TABLE IF EXISTS `direccion`;

CREATE TABLE `direccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` tinytext NOT NULL,
  `rela_persona` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rela_persona2` (`rela_persona`),
  CONSTRAINT `fk_rela_persona2` FOREIGN KEY (`rela_persona`) REFERENCES `persona` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `direccion` */

/*Table structure for table `figura_accion` */

DROP TABLE IF EXISTS `figura_accion`;

CREATE TABLE `figura_accion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `descripcion` tinytext NOT NULL,
  `precio` int(11) NOT NULL,
  `imagen` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `figura_accion` */

/*Table structure for table `genero` */

DROP TABLE IF EXISTS `genero`;

CREATE TABLE `genero` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `genero` */

/*Table structure for table `juego` */

DROP TABLE IF EXISTS `juego`;

CREATE TABLE `juego` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `descripcion` tinytext NOT NULL,
  `año` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `juego` */

/*Table structure for table `juego_consola` */

DROP TABLE IF EXISTS `juego_consola`;

CREATE TABLE `juego_consola` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `precio` int(11) NOT NULL,
  `link_youtube` text NOT NULL,
  `imagen` text NOT NULL,
  `rela_consola` int(11) NOT NULL,
  `rela_juego_genero` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rela_juego_genero` (`rela_juego_genero`),
  KEY `fk_rela_consola` (`rela_consola`),
  CONSTRAINT `fk_rela_consola` FOREIGN KEY (`rela_consola`) REFERENCES `consola` (`id`),
  CONSTRAINT `fk_rela_juego_genero` FOREIGN KEY (`rela_juego_genero`) REFERENCES `juego_genero` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `juego_consola` */

/*Table structure for table `juego_genero` */

DROP TABLE IF EXISTS `juego_genero`;

CREATE TABLE `juego_genero` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rela_genero` int(11) NOT NULL,
  `rela_juego` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rela_genero` (`rela_genero`),
  KEY `fk_rela_juego` (`rela_juego`),
  CONSTRAINT `fk_rela_genero` FOREIGN KEY (`rela_genero`) REFERENCES `genero` (`id`),
  CONSTRAINT `fk_rela_juego` FOREIGN KEY (`rela_juego`) REFERENCES `juego` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `juego_genero` */

/*Table structure for table `juego_pendiente` */

DROP TABLE IF EXISTS `juego_pendiente`;

CREATE TABLE `juego_pendiente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rela_juego_consola` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_juego_consola` (`rela_juego_consola`),
  CONSTRAINT `fk_juego_consola` FOREIGN KEY (`rela_juego_consola`) REFERENCES `juego_consola` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `juego_pendiente` */

/*Table structure for table `merchadeising` */

DROP TABLE IF EXISTS `merchadeising`;

CREATE TABLE `merchadeising` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  `descripcion` tinytext NOT NULL,
  `precio` int(20) NOT NULL,
  `imagen` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `merchadeising` */

/*Table structure for table `persona` */

DROP TABLE IF EXISTS `persona`;

CREATE TABLE `persona` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_apellido` varchar(25) NOT NULL,
  `dni` varchar(25) NOT NULL,
  `fecha_nac` date NOT NULL,
  `rela_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rela_usuario` (`rela_usuario`),
  CONSTRAINT `fk_rela_usuario` FOREIGN KEY (`rela_usuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `persona` */

/*Table structure for table `producto_accesorio` */

DROP TABLE IF EXISTS `producto_accesorio`;

CREATE TABLE `producto_accesorio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) NOT NULL,
  `rela_accesorio` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rela_accesorio` (`rela_accesorio`),
  CONSTRAINT `fk_rela_accesorio` FOREIGN KEY (`rela_accesorio`) REFERENCES `accesorio` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `producto_accesorio` */

/*Table structure for table `producto_consola` */

DROP TABLE IF EXISTS `producto_consola`;

CREATE TABLE `producto_consola` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) NOT NULL,
  `rela_consola` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rela_consola3` (`rela_consola`),
  CONSTRAINT `fk_rela_consola3` FOREIGN KEY (`rela_consola`) REFERENCES `consola` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `producto_consola` */

/*Table structure for table `producto_juegos` */

DROP TABLE IF EXISTS `producto_juegos`;

CREATE TABLE `producto_juegos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) NOT NULL,
  `rela_juego_pendiente` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rela_juego_pendiente` (`rela_juego_pendiente`),
  CONSTRAINT `fk_rela_juego_pendiente` FOREIGN KEY (`rela_juego_pendiente`) REFERENCES `juego_pendiente` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `producto_juegos` */

/*Table structure for table `producto_merchadeising` */

DROP TABLE IF EXISTS `producto_merchadeising`;

CREATE TABLE `producto_merchadeising` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) NOT NULL,
  `rela_merchadeising` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rela_merchadeising` (`rela_merchadeising`),
  CONSTRAINT `fk_rela_merchadeising` FOREIGN KEY (`rela_merchadeising`) REFERENCES `merchadeising` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `producto_merchadeising` */

/*Table structure for table `reserva` */

DROP TABLE IF EXISTS `reserva`;

CREATE TABLE `reserva` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rela_juego_consola` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rela_juego_consola` (`rela_juego_consola`),
  CONSTRAINT `fk_rela_juego_consola` FOREIGN KEY (`rela_juego_consola`) REFERENCES `juego_consola` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `reserva` */

/*Table structure for table `reserva_persona` */

DROP TABLE IF EXISTS `reserva_persona`;

CREATE TABLE `reserva_persona` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rela_persona` int(11) NOT NULL,
  `rela_reserva` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rela_persona3` (`rela_persona`),
  KEY `fk_rela_reserva` (`rela_reserva`),
  CONSTRAINT `fk_rela_persona3` FOREIGN KEY (`rela_persona`) REFERENCES `persona` (`id`),
  CONSTRAINT `fk_rela_reserva` FOREIGN KEY (`rela_reserva`) REFERENCES `reserva` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `reserva_persona` */

/*Table structure for table `telefono` */

DROP TABLE IF EXISTS `telefono`;

CREATE TABLE `telefono` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) NOT NULL,
  `rela_persona` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rela_persona` (`rela_persona`),
  CONSTRAINT `fk_rela_persona` FOREIGN KEY (`rela_persona`) REFERENCES `persona` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `telefono` */

/*Table structure for table `tipo_usuario` */

DROP TABLE IF EXISTS `tipo_usuario`;

CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tipo_usuario` */

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `rela_tipo_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rela_tipo_usuario` (`rela_tipo_usuario`),
  CONSTRAINT `fk_rela_tipo_usuario` FOREIGN KEY (`rela_tipo_usuario`) REFERENCES `tipo_usuario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
