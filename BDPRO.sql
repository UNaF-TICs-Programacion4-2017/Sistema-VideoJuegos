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
CREATE DATABASE /*!32312 IF NOT EXISTS*/`play_games` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;

USE `play_games`;

/*Table structure for table `consola` */

DROP TABLE IF EXISTS `consola`;

CREATE TABLE `consola` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `consola` */

insert  into `consola`(`id`,`descripcion`) values 
(1,'Play Station 3'),
(2,'Play Station 4'),
(3,'XBOX 360'),
(4,'XBOX ONE'),
(5,'Nintendo Switch'),
(6,'Nintendo Wii');

/*Table structure for table `genero` */

DROP TABLE IF EXISTS `genero`;

CREATE TABLE `genero` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `genero` */

insert  into `genero`(`id`,`descripcion`) values 
(1,'Accion'),
(2,'Accion-Aventura'),
(3,'Aventura'),
(4,'Juego de Rol'),
(5,'Simulacion'),
(6,'Estrategia'),
(7,'Deporte'),
(8,'Carrera'),
(9,'MMO'),
(10,'SandBox'),
(11,'Musical'),
(12,'Terror');

/*Table structure for table `persona` */

DROP TABLE IF EXISTS `persona`;

CREATE TABLE `persona` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_apellido` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `dni` decimal(15,0) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` decimal(15,0) NOT NULL,
  `direccion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `rela_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuario` (`rela_usuario`),
  CONSTRAINT `fk_usuario` FOREIGN KEY (`rela_usuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `persona` */

insert  into `persona`(`id`,`nombre_apellido`,`dni`,`fecha_nacimiento`,`email`,`telefono`,`direccion`,`rela_usuario`) values 
(1,'Pablo Britez',654652,'1996-12-12','lkjdalskd@gmail.com',1231231,'saldasdasd',2),
(6,'Administrador',39720155,'1984-01-27','admin@gmail.com',3704525546,'adasdadad',7),
(7,'Osvaldo Vallone',39720155,'1996-08-13','osvaldovallone@outlook.com',3704825012,'AzcuÃ©naga 990',8);

/*Table structure for table `producto` */

DROP TABLE IF EXISTS `producto`;

CREATE TABLE `producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `descripcion` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `anio` varchar(5) COLLATE utf8_spanish_ci DEFAULT NULL,
  `link_youtube` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rela_tipo_producto` int(11) DEFAULT NULL,
  `rela_genero` int(11) DEFAULT NULL,
  `rela_consola` int(11) DEFAULT NULL,
  `fechaingreso` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `imagen` varchar(450) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rela_tipo_producto` (`rela_tipo_producto`),
  KEY `rela_genero` (`rela_genero`),
  KEY `rela_consola` (`rela_consola`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `producto` */

insert  into `producto`(`id`,`cantidad`,`precio`,`descripcion`,`nombre`,`anio`,`link_youtube`,`rela_tipo_producto`,`rela_genero`,`rela_consola`,`fechaingreso`,`imagen`) values 
(28,'3',1330,'Futbol','Pes 2017','2016','www.youtube.com',4,3,2,'2017-06-28',NULL),
(29,'6',1200,'asdasdasda','Gear or War','2016','adasda',4,2,4,'2017-06-28',NULL),
(31,'5',1300,'adasdasdsdsdadasd','God of War III','2016','www.youtube.com',4,2,4,'2017-06-28',''),
(32,'5',1200,'Futbol.','FIFA 2016','2016','www.youtube.com',4,7,1,'2017-06-28','ImgProd/fifa-2016-trucos-600x480.jpg'),
(36,'3',7000,'Consola.','XBOX 360','2015','www.youtube.com',1,0,0,'2017-06-28','ImgProd/Xbox-360-Consoles-Infobox.png'),
(38,'6',400,'Funda Cool.','Funda XBOX 360','2016','www.youtube.com',3,0,3,'2017-06-28','ImgProd/Xbox-360-Consoles-Infobox.png'),
(42,'4',600,'Una mierda para frikis.','Super Man','2015','',5,0,0,'2017-06-28','ImgProd/Xbox-360-Consoles-Infobox.png'),
(44,'3',400,'Jostick RE PRO <3','Jostick XBOX 360','2015','www.youtube.com',3,0,3,'2017-06-28','ImgProd/556932e3-5fb4-40e9-a868-450606fd1a8c.jpg'),
(45,'4',500,'Jostick SUPER PRO OMG!!','Jostick PlayStation 4','2016','www.youtube.com',3,0,2,'2017-06-28','ImgProd/skin-joystick-playstation-4-dj.jpg'),
(46,'6',1200,'SUPER PRO!!! <3','Halo 2','2015','www.youtube.com',4,2,4,'2017-06-29','ImgProd/maxresdefault.jpg'),
(47,'5',500,'SUPER PRO DE NINTENDO.','Super Mario KART','2016','www.youtube.com',4,8,6,'2017-06-29','ImgProd/Wallpaper_MKWii.jpg'),
(48,'6',400,'No sirve.','Cubo Rubik','2015','',2,0,0,'2017-06-29','ImgProd/Rubik\'s_cube.svg.png');

/*Table structure for table `tipo_producto` */

DROP TABLE IF EXISTS `tipo_producto`;

CREATE TABLE `tipo_producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tipo_producto` */

insert  into `tipo_producto`(`id`,`nombre`) values 
(1,'Consola'),
(2,'Merchandising'),
(3,'Accesorio'),
(4,'Juego'),
(5,'Figura de Accion');

/*Table structure for table `tipo_user` */

DROP TABLE IF EXISTS `tipo_user`;

CREATE TABLE `tipo_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tipo_user` */

insert  into `tipo_user`(`id`,`descripcion`) values 
(1,'Cliente'),
(2,'ADM');

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rela_tipo_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rela_tipo_user` (`rela_tipo_user`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`rela_tipo_user`) REFERENCES `tipo_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `usuario` */

insert  into `usuario`(`id`,`nombre`,`password`,`rela_tipo_user`) values 
(2,'PabloGay','12345',1),
(7,'Admin','admin123',2),
(8,'Baldito','balditofutbolclub',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
