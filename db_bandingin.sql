/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.1.38-MariaDB : Database - db_bandingin
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `bnd_absen` */

DROP TABLE IF EXISTS `bnd_absen`;

CREATE TABLE `bnd_absen` (
  `abs_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `abs_peg_id` bigint(20) DEFAULT NULL,
  `abs_pra_id` bigint(2) DEFAULT NULL,
  `abs_jml_hadir` smallint(2) DEFAULT NULL,
  `abs_jml_tepat_waktu` smallint(2) DEFAULT NULL,
  PRIMARY KEY (`abs_id`),
  KEY `abs_peg_id` (`abs_peg_id`),
  KEY `ptj_absen_ibfk_3` (`abs_pra_id`),
  CONSTRAINT `bnd_absen_ibfk_1` FOREIGN KEY (`abs_peg_id`) REFERENCES `bnd_pegawai` (`peg_id`) ON DELETE SET NULL,
  CONSTRAINT `bnd_absen_ibfk_3` FOREIGN KEY (`abs_pra_id`) REFERENCES `bnd_periodeabsen` (`pra_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `bnd_absen` */

LOCK TABLES `bnd_absen` WRITE;

insert  into `bnd_absen`(`abs_id`,`abs_peg_id`,`abs_pra_id`,`abs_jml_hadir`,`abs_jml_tepat_waktu`) values (2,1,1,22,21),(3,1,7,22,21),(4,1,8,22,20),(5,1,9,22,21),(6,1,10,22,15),(7,1,11,20,20),(8,1,12,19,19),(9,2,8,22,18),(10,2,9,22,18),(11,1,10,23,19),(12,2,11,22,17),(13,2,12,20,15);

UNLOCK TABLES;

/*Table structure for table `bnd_gaji` */

DROP TABLE IF EXISTS `bnd_gaji`;

CREATE TABLE `bnd_gaji` (
  `gj_id` int(11) NOT NULL AUTO_INCREMENT,
  `gj_peg_id` int(11) DEFAULT NULL,
  `gj_pokok` int(11) DEFAULT NULL,
  `gj_makan` int(11) DEFAULT NULL,
  `gj_transport` int(11) DEFAULT NULL,
  `gj_lembur` int(11) DEFAULT NULL,
  PRIMARY KEY (`gj_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `bnd_gaji` */

LOCK TABLES `bnd_gaji` WRITE;

insert  into `bnd_gaji`(`gj_id`,`gj_peg_id`,`gj_pokok`,`gj_makan`,`gj_transport`,`gj_lembur`) values (1,1,2500000,500000,500000,20000),(2,2,3500000,600000,550000,30000);

UNLOCK TABLES;

/*Table structure for table `bnd_pegawai` */

DROP TABLE IF EXISTS `bnd_pegawai`;

CREATE TABLE `bnd_pegawai` (
  `peg_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `peg_nama` varchar(50) DEFAULT NULL,
  `peg_nip` varchar(30) DEFAULT NULL,
  `peg_tempat_lahir` varchar(50) DEFAULT NULL,
  `peg_tanggal_lahir` date DEFAULT NULL,
  `peg_jk` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `peg_agama` enum('Islam','Katholik','Protestan','Hindu','Budha','Kong Hu Chu','Lainnya') DEFAULT NULL,
  `peg_alamat` text,
  `peg_foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`peg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `bnd_pegawai` */

LOCK TABLES `bnd_pegawai` WRITE;

insert  into `bnd_pegawai`(`peg_id`,`peg_nama`,`peg_nip`,`peg_tempat_lahir`,`peg_tanggal_lahir`,`peg_jk`,`peg_agama`,`peg_alamat`,`peg_foto`) values (1,'Wilman Cahyadi','1412','afsaaf','2003-01-03','Laki-Laki','Islam','gafagsdg','1412.jpg'),(2,'Dadang Sunarto','14124','awewegds','2003-01-01','Laki-Laki','Islam','adgaesd','14124.jpg'),(3,'Rendi Rifandi','51232','asasfasf','2003-01-01','Laki-Laki','Islam','bagafafas','51232.jpg'),(4,'Rita Sumarna','14121','Bengkalis','2003-01-01','Perempuan','Islam',NULL,NULL),(7,'Jeni Arisani','14124','Sweden','2003-06-11','Perempuan','Islam',NULL,NULL);

UNLOCK TABLES;

/*Table structure for table `bnd_periodeabsen` */

DROP TABLE IF EXISTS `bnd_periodeabsen`;

CREATE TABLE `bnd_periodeabsen` (
  `pra_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `pra_bln` smallint(2) DEFAULT NULL,
  `pra_thn` year(4) DEFAULT NULL,
  `pra_jml_hr` smallint(2) DEFAULT NULL,
  PRIMARY KEY (`pra_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `bnd_periodeabsen` */

LOCK TABLES `bnd_periodeabsen` WRITE;

insert  into `bnd_periodeabsen`(`pra_id`,`pra_bln`,`pra_thn`,`pra_jml_hr`) values (1,1,2018,22),(3,1,2019,22),(4,2,2019,21),(5,4,2019,22),(6,3,2019,23),(7,5,2019,22),(8,6,2019,22),(9,7,2019,22),(10,8,2019,23),(11,9,2019,22),(12,10,2019,22),(13,11,2019,22),(14,12,2019,21);

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
