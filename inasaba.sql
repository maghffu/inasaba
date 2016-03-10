/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.47-0ubuntu0.14.04.1 : Database - inasaba
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`inasaba` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `inasaba`;

/*Table structure for table `artikel` */

DROP TABLE IF EXISTS `artikel`;

CREATE TABLE `artikel` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `judul_artikel` varchar(50) DEFAULT NULL,
  `isi` longtext,
  `tanggal_posting` date DEFAULT NULL,
  `id_kategori` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `artikel` */

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id_kategori` int(3) NOT NULL AUTO_INCREMENT,
  `judul_kategori` varchar(50) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

insert  into `kategori`(`id_kategori`,`judul_kategori`,`keterangan`) values (1,'Microsoft Word','Belajar Office, keren '),(2,'Corel Draw','Belajar Corel sangat menyenangkan'),(3,'Photoshop','photoshop asyik, keren dan pasti anda tertarik'),(4,'Pemrograman','Aku jenius karena belajar pemrograman'),(5,'Video Editing','Wuiih keren pastinya ilmu ini'),(6,'Auto cad','Jadi profesional dibingan arsitek, keren bro'),(7,'Microsoft Excel','Belajar Office, keren '),(8,'Microsoft PowerPoint','Belajar Office, keren ');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
