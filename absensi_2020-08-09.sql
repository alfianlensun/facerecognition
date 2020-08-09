# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.5.4-MariaDB-1:10.5.4+maria~focal)
# Database: absensi
# Generation Time: 2020-08-09 07:15:33 +0000
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
	(2,'123123','$2y$10$wrXGl2ruqR308xrvvD11LOj8t/wAEK0NRocUvA2IJGnqJ5mWW99Za',3,'2020-08-08 04:09:30',1),
	(3,'0001293','$2y$10$LuYJ6pimSDyXMNX7Oo2dyeJyzP.FYhVw/RGwHDBiTGZaNB5wtX9t2',3,'2020-08-08 06:30:06',1);

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
	(1,1,'Al','1312312',1),
	(2,2,'blabla','123123',1);

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
	(1,'hahaha',0),
	(2,'wkwkwk',0),
	(3,'hahaha',0),
	(4,'hahaha',0),
	(5,'testiong',0),
	(6,'Kelas 1 ',0),
	(7,'TI-2',1);

/*!40000 ALTER TABLE `mst_kelas` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table mst_mahasiswa
# ------------------------------------------------------------

DROP TABLE IF EXISTS `mst_mahasiswa`;

CREATE TABLE `mst_mahasiswa` (
  `id_mst_mahasiswa` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_mst_auth` int(11) DEFAULT NULL,
  `id_mst_kelas` int(11) DEFAULT NULL,
  `nama_mahasiswa` varchar(100) DEFAULT NULL,
  `nim` varchar(100) DEFAULT NULL,
  `status_daftar_absensi` tinyint(2) NOT NULL DEFAULT 0,
  `active` tinyint(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_mst_mahasiswa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `mst_mahasiswa` WRITE;
/*!40000 ALTER TABLE `mst_mahasiswa` DISABLE KEYS */;

INSERT INTO `mst_mahasiswa` (`id_mst_mahasiswa`, `id_mst_auth`, `id_mst_kelas`, `nama_mahasiswa`, `nim`, `status_daftar_absensi`, `active`)
VALUES
	(1,2,7,'alfian lensun','123123',1,1),
	(2,3,7,'testting','0001293',1,1);

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
	(1,'sks',2,0),
	(2,'Pemrograman visual ',10,1);

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
	(1,'akakak',0),
	(2,'Semester 1',1),
	(3,'Semester 2',1);

/*!40000 ALTER TABLE `mst_semester` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table trx_absensi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `trx_absensi`;

CREATE TABLE `trx_absensi` (
  `id_trx_absensi` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_mst_mata_kuliah` int(11) DEFAULT NULL,
  `id_mst_mahasiswa` int(11) DEFAULT NULL,
  `tipe_absen` int(11) DEFAULT NULL,
  `jam_absen` datetime DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_trx_absensi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



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
	(1,2,'register1.jpg',1),
	(2,2,'register2.jpg',1),
	(3,2,'register3.jpg',1),
	(4,3,'register1.jpg',1),
	(5,3,'register2.jpg',1),
	(6,3,'register3.jpg',1);

/*!40000 ALTER TABLE `trx_facedata` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table trx_jadwal_kuliah
# ------------------------------------------------------------

DROP TABLE IF EXISTS `trx_jadwal_kuliah`;

CREATE TABLE `trx_jadwal_kuliah` (
  `id_trx_jadwal_kuliah` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_mst_mata_kuliah` int(11) DEFAULT NULL,
  `id_mst_kelas` int(11) DEFAULT NULL,
  `id_mst_dosen` int(11) DEFAULT NULL,
  `datetime_mulai` datetime DEFAULT NULL,
  `datetime_selesai` datetime DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_trx_jadwal_kuliah`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `trx_jadwal_kuliah` WRITE;
/*!40000 ALTER TABLE `trx_jadwal_kuliah` DISABLE KEYS */;

INSERT INTO `trx_jadwal_kuliah` (`id_trx_jadwal_kuliah`, `id_mst_mata_kuliah`, `id_mst_kelas`, `id_mst_dosen`, `datetime_mulai`, `datetime_selesai`, `active`)
VALUES
	(1,2,7,1,'2020-08-09 12:00:00','2020-08-09 15:00:00',1),
	(2,1,7,2,'2020-08-09 15:00:00','2020-08-09 20:00:00',1);

/*!40000 ALTER TABLE `trx_jadwal_kuliah` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
