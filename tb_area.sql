-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 10.1.36-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win32
-- HeidiSQL Versi:               11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Membuang data untuk tabel khs.tb_area: ~19 rows (lebih kurang)
/*!40000 ALTER TABLE `tb_area` DISABLE KEYS */;
INSERT INTO `tb_area` (`AREA_KODE`, `AREA_NAMA`, `AREA_ZONE`) VALUES
	(54000, '	KANTOR DISTRIBUSI', 0),
	(54110, 'Gondangdia', 1),
	(54130, 'Kebon Kelapa', 1),
	(54210, 'Bendungan Hilir', 3),
	(54310, 'Senen', 2),
	(54330, 'Kampung Bali', 3),
	(54360, 'Kampung Rawa', 2),
	(54380, 'Jembatan Lima', 2),
	(54410, 'Tegal Alur', 1),
	(54420, 'Angke', 3),
	(54510, 'Cilincing', 2),
	(54530, 'Kelapa Gading Barat', 4),
	(54560, 'UV2M', 0),
	(54630, 'Pademangan Timur', 1),
	(54710, 'Cilandak Timur', 3),
	(54720, 'Manggarai', 4),
	(54730, 'Senayan', 4),
	(54740, 'jagakarsa', 4),
	(54999, 'ITS', 0);
/*!40000 ALTER TABLE `tb_area` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
