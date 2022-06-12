/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 10.4.17-MariaDB : Database - bdbarberia
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bdbarberia` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `bdbarberia`;

/*Table structure for table `tbladmin` */

DROP TABLE IF EXISTS `tbladmin`;

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `nombreAdmin` varchar(50) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `telefono` bigint(15) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `contraseña` varchar(100) DEFAULT NULL,
  `fecharegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbladmin` */

insert  into `tbladmin`(`ID`,`nombreAdmin`,`usuario`,`telefono`,`correo`,`contraseña`,`fecharegistro`) values 
(10,'Barber Shop Daniela','daniela',60606060,'k@gmail.com','+DgYu0+fAIL0hWqdBapJ0Q==','2022-06-08 21:31:10');

/*Table structure for table `tblcitas` */

DROP TABLE IF EXISTS `tblcitas`;

CREATE TABLE `tblcitas` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `no_citas` varchar(80) DEFAULT NULL,
  `nombre` varchar(120) DEFAULT NULL,
  `correo` varchar(120) DEFAULT NULL,
  `telefono` bigint(11) DEFAULT NULL,
  `dia_cita` varchar(120) DEFAULT NULL,
  `hora_cita` varchar(120) DEFAULT NULL,
  `servicios` varchar(120) DEFAULT NULL,
  `fecha_aceptar` timestamp NULL DEFAULT current_timestamp(),
  `observacion` varchar(250) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `fecha_coment` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;

/*Data for the table `tblcitas` */

/*Table structure for table `tblclientes` */

DROP TABLE IF EXISTS `tblclientes`;

CREATE TABLE `tblclientes` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(120) DEFAULT NULL,
  `correo` varchar(200) DEFAULT NULL,
  `telefono` bigint(11) DEFAULT NULL,
  `genero` enum('Mujer','Hombre','No definido') DEFAULT NULL,
  `detalles` mediumtext DEFAULT NULL,
  `creacion_cita` timestamp NULL DEFAULT current_timestamp(),
  `actualizacion_cita` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `tblclientes` */

/*Table structure for table `tblfactura` */

DROP TABLE IF EXISTS `tblfactura`;

CREATE TABLE `tblfactura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `Id_servicio` int(11) DEFAULT NULL,
  `id_facturacion` int(11) DEFAULT NULL,
  `fecha_facturacion` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

/*Data for the table `tblfactura` */

insert  into `tblfactura`(`id`,`id_usuario`,`Id_servicio`,`id_facturacion`,`fecha_facturacion`) values 
(34,1,2,418825264,'2022-06-09 20:45:00');

/*Table structure for table `tblpagina` */

DROP TABLE IF EXISTS `tblpagina`;

CREATE TABLE `tblpagina` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `tipo_pag` varchar(200) DEFAULT NULL,
  `titulo_pag` mediumtext DEFAULT NULL,
  `descripcion_pag` mediumtext DEFAULT NULL,
  `correo_electronico` varchar(200) DEFAULT NULL,
  `no_telefono` bigint(10) DEFAULT NULL,
  `actualizacion_cita` date DEFAULT NULL,
  `tiempo` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tblpagina` */

insert  into `tblpagina`(`ID`,`tipo_pag`,`titulo_pag`,`descripcion_pag`,`correo_electronico`,`no_telefono`,`actualizacion_cita`,`tiempo`) values 
(1,'aboutus','Acerca de nosotros','<span style=\"color: rgb(153, 153, 153);\">Barbería Daniela es una empresa FAMILIAR 100% SALVADOREÑA, que inicio sus operaciones en el año 2019. Nacida de un sueño, nuestra barbería está fundamentada en la PASIÓN por el oficio y en el deseo de aportar a los hombres que entran por nuestra puerta una experiencia gratificante al ofrecerle los servicios de la barbería clásica, pero siempre aportando ideas frescas y modernas, en un ambiente de amistad, alegría y respeto. Nuestro equipo es AUTÉNTICO, como nos ves es como somos. Estamos ampliamente calificados y enfocados en la satisfacción del cliente ya sea en el corte de cabello, el arreglo de la barba o el afeitado clásico, siempre teniendo presente el trato intachable al cliente.</span>',NULL,NULL,NULL,''),
(2,'contactus','Contacto','        								        								        								        								        								                                        Santa Ana, Col. El palmar','stylemrtnz@gmail.com',60503894,NULL,'09:00 am a 7:00 pm');

/*Table structure for table `tblservicios` */

DROP TABLE IF EXISTS `tblservicios`;

CREATE TABLE `tblservicios` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_servicio` varchar(200) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `tblservicios` */

insert  into `tblservicios`(`ID`,`nombre_servicio`,`precio`,`fecha_creacion`) values 
(1,'Corte normal cabello',3,'2019-07-25 11:22:38'),
(2,'Corte de barba',2,'2019-07-25 11:22:53'),
(4,'Diseño de barba',3,'2022-06-08 11:22:13'),
(20,'Difuminado de barba',2,'2022-06-08 11:24:04'),
(21,'Tinte de barba',8,'2022-06-08 11:28:56'),
(22,'Afeitado con navaja',4,'2022-06-08 11:31:35'),
(23,'Corte de cabello + linea',3,'2022-06-08 12:13:03'),
(24,'Corte desde la doble cero',3,'2022-06-08 12:14:06');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
