/*
SQLyog Enterprise - MySQL GUI v7.11 
MySQL - 5.6.21 : Database - cicrud
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`cicrud` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `cicrud`;

/*Table structure for table `curd` */

DROP TABLE IF EXISTS `curd`;

CREATE TABLE `curd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `facebook_link` varchar(255) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `curd` */

insert  into `curd`(`id`,`name`,`email`,`contact`,`facebook_link`,`created`) values (25,'vikramparihar','vicky_johanson@rediff.com','9022349606','asdasdasda','2017-10-14'),(26,'vikramparihar','vicky_johanson@rediff.com','9022349606','asdasd','2017-10-14'),(27,'vikram parihar','vicky_johanson@rediff.com','9022349606','asdasasd','2017-10-14'),(28,'vikramparihar','vicky_johanson@rediff.com','9022349606','twitter link','2017-10-14'),(29,'vikram parihar','vicky_johanson@rediff.com','9022349606','facebook link','2017-10-14'),(30,'jaya','vikram.parihar@mediatech.co.in','9022349606','facebook link','2017-10-14');

/*Table structure for table `datapenduduk` */

DROP TABLE IF EXISTS `datapenduduk`;

CREATE TABLE `datapenduduk` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `provinsi` varchar(30) NOT NULL,
  `jumlah` int(15) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `datapenduduk` */

insert  into `datapenduduk`(`id`,`provinsi`,`jumlah`) values (1,'Aceh',3930905),(2,'DIY',3450000),(3,'Jambi',2413846),(4,'Riau',4957627),(5,'Sumatera Barat',4248931),(6,'Sumatera Utara',11649655);

/*Table structure for table `project_requests` */

DROP TABLE IF EXISTS `project_requests`;

CREATE TABLE `project_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `month` varchar(100) DEFAULT NULL,
  `wordpress` int(11) DEFAULT NULL,
  `codeigniter` int(11) DEFAULT NULL,
  `highcharts` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `project_requests` */

insert  into `project_requests`(`id`,`month`,`wordpress`,`codeigniter`,`highcharts`) values (1,'Jan',4,5,7),(2,'Feb',5,2,8),(3,'Mar',6,3,9),(4,'Apr',2,6,6),(5,'May',5,7,7),(6,'Jun',7,1,10),(7,'Jul',2,2,9),(8,'Aug',1,6,7),(9,'Sep',6,6,6),(10,'Oct',7,4,9),(11,'Nov',3,6,8),(12,'Dec',4,3,4);

/*Table structure for table `tbl_barang` */

DROP TABLE IF EXISTS `tbl_barang`;

CREATE TABLE `tbl_barang` (
  `barang` varchar(255) NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_barang` */

insert  into `tbl_barang`(`barang`,`harga`) values ('Buku',50000),('Pulpen',2000);

/*Table structure for table `tbl_pendapatan` */

DROP TABLE IF EXISTS `tbl_pendapatan`;

CREATE TABLE `tbl_pendapatan` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `bulan` char(15) NOT NULL,
  `hasil` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_pendapatan` */

insert  into `tbl_pendapatan`(`id`,`tanggal`,`bulan`,`hasil`) values (1,'2013-01-01','Januari',30),(2,'2013-02-01','Februari',20),(3,'2013-03-01','Maret',90),(4,'2013-04-01','April',70),(5,'2013-05-01','Mei',20),(6,'2013-06-01','Juni',40),(8,'2013-07-01','Juli',90),(9,'2013-08-01','Agustus',10),(10,'2013-09-01','September',90),(11,'2013-10-01','Oktober',60),(12,'2013-11-01','November',90),(13,'2013-12-01','Desember',40);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`firstname`,`lastname`,`phone`,`email`) values (1,'fname 1','lname 1','(000)000-0000  ','name1@gmail.com               '),(2,'fname 2 edit','lname 2 edit','(000)000-0000','name2@gmail.com'),(3,'fname 3','lname 3','(000)000-0000','name2@gmail.com'),(4,'fname 4','lname 4 edit','(000)000-0000','name2@gmail.com'),(5,'fname 5','lname 5','(000)000-0000','name2@gmail.com'),(6,'fname 6','lname 6','(000)000-0000','name2@gmail.com'),(7,'fname 7','lname 7','(000)000-0000','name2@gmail.com'),(8,'fname 8','lname 8','(000)000-0000','name2@gmail.com'),(9,'fname 9','lname 9','(000)000-0000','name2@gmail.com'),(10,'fname 10','lname 10','(000)000-0000','name2@gmail.com'),(11,'fname 11','lname 11','(000)000-0000','name2@gmail.com'),(12,'fname 12 edit','lname 12 edit','(000)000-0000','name2@gmail.com'),(13,'fname 13','lname 13','(000)000-0000','name2@gmail.com'),(15,'fname 14','lname 14','(000)000-0014','name14@gmail.com');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
