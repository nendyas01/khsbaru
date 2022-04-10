-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.14-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for khs
CREATE DATABASE IF NOT EXISTS `khs` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `khs`;

-- Dumping structure for table khs.tb_history_skkio
CREATE TABLE IF NOT EXISTS `tb_history_skkio` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SKKI_ID` int(100) NOT NULL,
  `AREA_KODE` int(100) NOT NULL,
  `SKKI_NILAI` decimal(50,0) NOT NULL DEFAULT 0,
  `SKKI_NO` varchar(100) NOT NULL DEFAULT '',
  `SKKI_JENIS` char(50) NOT NULL DEFAULT '',
  `SKKI_TANGGAL` int(11) NOT NULL DEFAULT 0,
  `DATE` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`ID`),
  KEY `area_kode` (`AREA_KODE`) USING BTREE,
  KEY `FK_tb_history_skkio_tb_skko_i` (`SKKI_ID`),
  CONSTRAINT `FK_tb_history_skkio_tb_skko_i` FOREIGN KEY (`SKKI_ID`) REFERENCES `tb_skko_i` (`SKKI_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table khs.tb_history_skkio: ~5 rows (approximately)
/*!40000 ALTER TABLE `tb_history_skkio` DISABLE KEYS */;
REPLACE INTO `tb_history_skkio` (`ID`, `SKKI_ID`, `AREA_KODE`, `SKKI_NILAI`, `SKKI_NO`, `SKKI_JENIS`, `SKKI_TANGGAL`, `DATE`) VALUES
	(144, 1, 54530, 2051487000, ' I/2020.M/0001-B2/0/U.BDG/REV02', 'SKKO', 2020, 1646196025),
	(145, 1, 54210, 2051487000, ' I/2020.M/0001-B2/0/U.BDG', 'SKKO', 2020, 1646196034),
	(146, 2, 54710, 3391327000, ' I/2020.M/0001-B2/0/U.BLG /revisi03', 'SKKI', 2020, 1646196149),
	(147, 3, 54420, 3732707000, ' I/2020.M/0001-B2/0/U.BTR ', 'SKKI', 2020, 1646196185),
	(148, 7, 54360, 123456577, ' I/2020.M/0001-B2/0/U.JTN/R03', 'SKKO', 2020, 1646198012);
/*!40000 ALTER TABLE `tb_history_skkio` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
