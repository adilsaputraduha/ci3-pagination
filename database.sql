/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.13-MariaDB : Database - db_penjualan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_penjualan` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id_kategory` int(11) NOT NULL AUTO_INCREMENT,
  `kategory` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kategory`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `kategori` */

insert  into `kategori`(`id_kategory`,`kategory`) values 
(1,'Minuman'),
(2,'Alat Tulis'),
(3,'Sembako'),
(4,'Makanan Ringan'),
(5,'Obat-obatan');

/*Table structure for table `penjualan` */

DROP TABLE IF EXISTS `penjualan`;

CREATE TABLE `penjualan` (
  `id_penjualan` char(10) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `jumlah_beli` int(11) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `tgl_penjualan` date DEFAULT NULL,
  PRIMARY KEY (`id_penjualan`),
  KEY `id_product` (`id_product`),
  CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `produk` (`id_produk`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `penjualan` */

insert  into `penjualan`(`id_penjualan`,`id_product`,`jumlah_beli`,`diskon`,`tgl_penjualan`) values 
('J-00001',1,5,0,'2020-08-13'),
('J-00002',2,3,0,'2020-08-13'),
('J-00003',3,1,10,'2020-08-13'),
('J-00004',4,2,0,'2020-08-13'),
('J-00005',5,2,0,'2020-08-09'),
('J-00006',1,1,10,'2020-08-09'),
('J-00007',2,2,0,'2020-08-09'),
('J-00008',3,4,5,'2020-08-09'),
('J-00009',1,2,0,'2020-08-09'),
('J-00010',4,2,0,'2020-08-19'),
('J-00011',2,1,0,'2020-08-19'),
('J-00012',5,1,0,'2020-08-19'),
('J-00013',2,2,0,'2020-08-19'),
('J-00014',4,5,10,'2020-08-19'),
('J-00015',1,1,0,'2020-08-19');

/*Table structure for table `produk` */

DROP TABLE IF EXISTS `produk`;

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(50) DEFAULT NULL,
  `id_kategory` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT 0,
  `satuan` char(15) DEFAULT NULL,
  `harga_satuan` int(11) DEFAULT 0,
  PRIMARY KEY (`id_produk`),
  KEY `id_kategory` (`id_kategory`),
  CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategory`) REFERENCES `kategori` (`id_kategory`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `produk` */

insert  into `produk`(`id_produk`,`nama_produk`,`id_kategory`,`stok`,`satuan`,`harga_satuan`) values 
(1,'Air Mineral Aqua 600 ml',1,100,'Botol',3000),
(2,'Qtela Singkong',4,50,'Bungkus',5000),
(3,'Chitatos',4,100,'Bungkus',4500),
(4,'Paramex',5,100,'Kotak',2500),
(5,'Minyak Bimoli 500 ml',3,100,'Pack',12000),
(6,'Wafer Tanggo',4,100,'Bungkus',2000);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
