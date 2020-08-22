# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.5.5-MariaDB-1:10.5.5+maria~focal)
# Database: absensi
# Generation Time: 2020-08-22 09:10:05 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table mst_auth
# ------------------------------------------------------------

DROP TABLE IF EXISTS `mst_auth`;

CREATE TABLE `mst_auth` (
  `id_mst_auth` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` int(11) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `active` tinyint(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_mst_auth`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `mst_auth` WRITE;
/*!40000 ALTER TABLE `mst_auth` DISABLE KEYS */;

INSERT INTO `mst_auth` (`id_mst_auth`, `username`, `password`, `user_type`, `date_created`, `active`)
VALUES
	(1,'admin','$2y$10$ep5pmCLTQi9XETqAD2O7l.bSmfHtXw.3prGyT.YUGLzzhK19eqPn.',1,'2020-08-08 01:10:25',1),
	(2,NULL,NULL,NULL,'2020-08-18 14:33:12',1),
	(3,'15024092','$2y$10$XbC8Iz.e0jAArGdS0ad4P.LQUJCAqmlYTnduqj8Pj2OidmXJw4oqm',3,'2020-08-20 12:49:35',0),
	(4,'196412161991032001','$2y$10$V970syUPnuOI9OGE024okeTTdRQrZV9K4XtNBrBtQkACntNznUZVK',2,'2020-08-21 09:17:46',0),
	(5,'15024092','$2y$10$FJbn3iPEZOqNN.MGXOETJOHG2kwqhCY52nsrLUGa2HANWXb0HLTOm',3,'2020-08-20 12:49:42',0),
	(6,'19024001','$2y$10$qP8M15Yq7lWI8mLEFO7PtevmoOamvP/.in0O78udrqttu1r/bW3.G',3,'2020-08-20 12:55:35',1),
	(7,'19024002','$2y$10$CfOIL8RU2p.l.mZMCIqsGu3IhOlNL5cdxzYY2HZROslXv5sXPm6/K',3,'2020-08-20 12:59:35',1),
	(8,'19024003','$2y$10$kGiXN/CXMvSzOoVNwaSjGuk/ein6X/j3d4dM/Gi4C91/fR0.h6MDq',2,'2020-08-20 13:03:28',1),
	(9,'19024004','$2y$10$v.4qkSMFD9qNYqoEGiv9Se6Uz1mppi6Wv1e8ezJWuvHfn3u4WPYb2',2,'2020-08-20 13:03:41',1),
	(10,'19024005','$2y$10$uNEKTU1MNrIRZGAVjeztiOsIbvumQ4z9gmmkFJqgUH296TRYY7TPW',2,'2020-08-20 13:03:20',1),
	(11,'19024006','$2y$10$wmCfQFLxdIAG3E2wt4B3DekBRR1eXA0aDb25mJ6fNsLKW.Knxt/Ni',3,'2020-08-20 13:04:32',1),
	(12,'19024007','$2y$10$NJRs/hLMOMZDPo4dqQeWxeP7YzdZsTBEG0rMWP8XiZRidtfNTyJVi',3,'2020-08-20 13:05:23',1),
	(13,'19024008','$2y$10$MqoMobQQq/pgpT/RFKY5qu/af8IFgV95d/B8G7cqTQP7Rf2.vTdYO',3,'2020-08-20 13:07:21',1),
	(14,'19024009','$2y$10$gB2G3JZDXvE8Xo5xjIRWruz7jRoHvwZGNHTrJzvhK2Ghqkf7R/XNm',3,'2020-08-20 13:09:07',1),
	(15,'19024011','$2y$10$Ypz3vB7aBR5pav8jr8bWO.Z/lKt/xMi0PFOnMUevUfn5sNN6.l.lO',3,'2020-08-20 13:38:17',1),
	(16,'19024012','$2y$10$Vp7CtjpndFD9B46jF5T8t.CbnH/S0H3aKEFE8skUsf48GkDzJL6q2',3,'2020-08-20 13:39:11',1),
	(17,'19024013','$2y$10$z6Q4ljpU.2ETiNyLKzX5WOswsAHhDfU4rVzu0iz2SosGwZbd0NBjm',3,'2020-08-20 13:40:19',1),
	(18,'15024092','$2y$10$DEjBL3mlZpYDoRvZbsLlaO5iL3X0hWJX1f74OQyL57pKFvKedt9AC',3,'2020-08-21 15:51:59',1);

/*!40000 ALTER TABLE `mst_auth` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table mst_dosen
# ------------------------------------------------------------

DROP TABLE IF EXISTS `mst_dosen`;

CREATE TABLE `mst_dosen` (
  `id_mst_dosen` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_mst_auth` int(11) DEFAULT NULL,
  `nama_dosen` varchar(100) DEFAULT NULL,
  `nip` varchar(100) DEFAULT NULL,
  `active` tinyint(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_mst_dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `mst_dosen` WRITE;
/*!40000 ALTER TABLE `mst_dosen` DISABLE KEYS */;

INSERT INTO `mst_dosen` (`id_mst_dosen`, `id_mst_auth`, `nama_dosen`, `nip`, `active`)
VALUES
	(1,4,'Marike A S Kondoy, SST.MT','196412161991032001',0);

/*!40000 ALTER TABLE `mst_dosen` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table mst_kelas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `mst_kelas`;

CREATE TABLE `mst_kelas` (
  `id_mst_kelas` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(100) DEFAULT NULL,
  `active` tinyint(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_mst_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `mst_kelas` WRITE;
/*!40000 ALTER TABLE `mst_kelas` DISABLE KEYS */;

INSERT INTO `mst_kelas` (`id_mst_kelas`, `nama_kelas`, `active`)
VALUES
	(1,'Semester 3 TI-1',1),
	(2,'Semester 3 TI-2',1),
	(3,'Semester 3 TI-3',1),
	(4,'Semester 3 TI-4',1);

/*!40000 ALTER TABLE `mst_kelas` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table mst_mahasiswa
# ------------------------------------------------------------

DROP TABLE IF EXISTS `mst_mahasiswa`;

CREATE TABLE `mst_mahasiswa` (
  `id_mst_mahasiswa` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_mst_auth` int(11) DEFAULT NULL,
  `id_mst_kelas` int(11) NOT NULL DEFAULT 0,
  `id_mst_semester` int(11) NOT NULL DEFAULT 0,
  `nama_mahasiswa` varchar(100) DEFAULT NULL,
  `nim` varchar(100) DEFAULT NULL,
  `status_daftar_absensi` tinyint(2) NOT NULL DEFAULT 0,
  `active` tinyint(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_mst_mahasiswa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `mst_mahasiswa` WRITE;
/*!40000 ALTER TABLE `mst_mahasiswa` DISABLE KEYS */;

INSERT INTO `mst_mahasiswa` (`id_mst_mahasiswa`, `id_mst_auth`, `id_mst_kelas`, `id_mst_semester`, `nama_mahasiswa`, `nim`, `status_daftar_absensi`, `active`)
VALUES
	(1,3,1,1,'Rianto Manutur','15024092',1,0),
	(2,5,2,2,'Rianto Manutur','15024092',0,0),
	(3,6,1,3,'Cahya J. Londo','19024001',0,1),
	(4,7,1,3,'Natacia CH. Arunda','19024002',0,1),
	(5,8,1,3,'Michael Binowo','19024003',0,1),
	(6,9,1,3,'Roanlifi F.P. Dalantang','19024004',0,1),
	(7,10,1,3,'Lidya Lemangga','19024005',0,1),
	(8,11,1,3,'Fareen M.S. Kolamus','19024006',0,1),
	(9,12,1,3,'Jefferson M. Wilar','19024007',0,1),
	(10,13,1,3,'Harvey E. Kanalung','19024008',0,1),
	(11,14,1,3,'Lendrigo F. Rahamis','19024009',0,1),
	(12,15,1,3,'Julianto M. Wongkar','19024011',0,1),
	(13,16,1,3,'Bagus Putra Wiyadi','19024012',0,1),
	(14,17,1,3,'Alfian M. J. Andries','19024013',0,1),
	(15,18,4,1,'Rianto manutur','15024092',0,1);

/*!40000 ALTER TABLE `mst_mahasiswa` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table mst_mata_kuliah
# ------------------------------------------------------------

DROP TABLE IF EXISTS `mst_mata_kuliah`;

CREATE TABLE `mst_mata_kuliah` (
  `id_mst_mata_kuliah` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama_mata_kuliah` varchar(100) DEFAULT NULL,
  `sks` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_mst_mata_kuliah`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `mst_mata_kuliah` WRITE;
/*!40000 ALTER TABLE `mst_mata_kuliah` DISABLE KEYS */;

INSERT INTO `mst_mata_kuliah` (`id_mst_mata_kuliah`, `nama_mata_kuliah`, `sks`, `active`)
VALUES
	(1,'Pemograman Web',4,1);

/*!40000 ALTER TABLE `mst_mata_kuliah` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table mst_semester
# ------------------------------------------------------------

DROP TABLE IF EXISTS `mst_semester`;

CREATE TABLE `mst_semester` (
  `id_mst_semester` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama_semester` varchar(100) DEFAULT NULL,
  `active` tinyint(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_mst_semester`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `mst_semester` WRITE;
/*!40000 ALTER TABLE `mst_semester` DISABLE KEYS */;

INSERT INTO `mst_semester` (`id_mst_semester`, `nama_semester`, `active`)
VALUES
	(1,'Semester 7',1),
	(2,'Semester 5',1),
	(3,'Semester 3',1);

/*!40000 ALTER TABLE `mst_semester` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table trx_absensi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `trx_absensi`;

CREATE TABLE `trx_absensi` (
  `id_trx_absensi` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_mst_kelas` int(11) DEFAULT NULL,
  `id_mst_mata_kuliah` int(11) DEFAULT NULL,
  `id_mst_mahasiswa` int(11) DEFAULT NULL,
  `tipe_absen` int(11) DEFAULT NULL,
  `jam_absen` datetime DEFAULT NULL,
  `filename` text DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_trx_absensi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `trx_absensi` WRITE;
/*!40000 ALTER TABLE `trx_absensi` DISABLE KEYS */;

INSERT INTO `trx_absensi` (`id_trx_absensi`, `id_mst_kelas`, `id_mst_mata_kuliah`, `id_mst_mahasiswa`, `tipe_absen`, `jam_absen`, `filename`, `date_created`)
VALUES
	(1,1,1,1,1,'2020-08-20 07:26:16','absensi-1597908376.jpg','2020-08-20 07:26:16'),
	(2,1,1,1,1,'2020-08-20 08:47:03','absensi-1597913223.jpg','2020-08-20 08:47:03'),
	(3,1,1,1,1,'2020-08-20 08:47:16','absensi-1597913236.jpg','2020-08-20 08:47:16'),
	(4,1,1,1,1,'2020-08-20 08:47:27','absensi-1597913247.jpg','2020-08-20 08:47:27'),
	(5,1,1,1,1,'2020-08-20 08:47:39','absensi-1597913259.jpg','2020-08-20 08:47:39'),
	(6,1,1,1,1,'2020-08-20 08:47:51','absensi-1597913271.jpg','2020-08-20 08:47:51'),
	(7,1,1,1,1,'2020-08-20 08:48:02','absensi-1597913282.jpg','2020-08-20 08:48:02'),
	(8,1,1,1,1,'2020-08-20 08:48:13','absensi-1597913293.jpg','2020-08-20 08:48:13'),
	(9,1,1,1,1,'2020-08-20 11:18:13','absensi-1597922293.jpg','2020-08-20 11:18:13'),
	(10,1,1,1,1,'2020-08-20 11:18:33','absensi-1597922313.jpg','2020-08-20 11:18:33'),
	(11,1,1,1,1,'2020-08-20 11:18:48','absensi-1597922328.jpg','2020-08-20 11:18:48'),
	(12,1,1,1,1,'2020-08-20 11:30:46','absensi-1597923046.jpg','2020-08-20 11:30:46');

/*!40000 ALTER TABLE `trx_absensi` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table trx_facedata
# ------------------------------------------------------------

DROP TABLE IF EXISTS `trx_facedata`;

CREATE TABLE `trx_facedata` (
  `id_trx_facedata` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_mst_auth` int(11) DEFAULT NULL,
  `filename` text DEFAULT NULL,
  `active` tinyint(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_trx_facedata`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `trx_facedata` WRITE;
/*!40000 ALTER TABLE `trx_facedata` DISABLE KEYS */;

INSERT INTO `trx_facedata` (`id_trx_facedata`, `id_mst_auth`, `filename`, `active`)
VALUES
	(1,3,'register1.jpg',1),
	(2,3,'register2.jpg',1),
	(3,3,'register3.jpg',1);

/*!40000 ALTER TABLE `trx_facedata` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table trx_jadwal_kuliah
# ------------------------------------------------------------

DROP TABLE IF EXISTS `trx_jadwal_kuliah`;

CREATE TABLE `trx_jadwal_kuliah` (
  `id_trx_jadwal_kuliah` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_mst_semester` int(11) DEFAULT NULL,
  `id_mst_mata_kuliah` int(11) DEFAULT NULL,
  `id_mst_kelas` int(11) DEFAULT NULL,
  `id_mst_dosen` int(11) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_trx_jadwal_kuliah`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `trx_jadwal_kuliah` WRITE;
/*!40000 ALTER TABLE `trx_jadwal_kuliah` DISABLE KEYS */;

INSERT INTO `trx_jadwal_kuliah` (`id_trx_jadwal_kuliah`, `id_mst_semester`, `id_mst_mata_kuliah`, `id_mst_kelas`, `id_mst_dosen`, `day`, `jam_mulai`, `jam_selesai`, `active`)
VALUES
	(1,1,1,1,1,4,'14:00:00','16:00:00',0),
	(2,2,1,2,1,4,'19:00:00','20:00:00',0);

/*!40000 ALTER TABLE `trx_jadwal_kuliah` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
