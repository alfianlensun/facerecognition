# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.5.4-MariaDB-1:10.5.4+maria~focal)
# Database: absensi
# Generation Time: 2020-08-18 14:34:31 +0000
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
	(2,NULL,NULL,NULL,'2020-08-18 14:33:12',1);

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



# Dump of table mst_kelas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `mst_kelas`;

CREATE TABLE `mst_kelas` (
  `id_mst_kelas` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(100) DEFAULT NULL,
  `active` tinyint(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_mst_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



# Dump of table mst_mahasiswa
# ------------------------------------------------------------

DROP TABLE IF EXISTS `mst_mahasiswa`;

CREATE TABLE `mst_mahasiswa` (
  `id_mst_mahasiswa` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_mst_auth` int(11) DEFAULT NULL,
  `id_mst_kelas` int(11) DEFAULT NULL,
  `id_mst_semester` int(11) DEFAULT NULL,
  `nama_mahasiswa` varchar(100) DEFAULT NULL,
  `nim` varchar(100) DEFAULT NULL,
  `status_daftar_absensi` tinyint(2) NOT NULL DEFAULT 0,
  `active` tinyint(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_mst_mahasiswa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



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



# Dump of table mst_semester
# ------------------------------------------------------------

DROP TABLE IF EXISTS `mst_semester`;

CREATE TABLE `mst_semester` (
  `id_mst_semester` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama_semester` varchar(100) DEFAULT NULL,
  `active` tinyint(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_mst_semester`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



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




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
