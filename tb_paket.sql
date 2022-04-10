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

-- Membuang data untuk tabel khs.tb_paket: ~15 rows (lebih kurang)
/*!40000 ALTER TABLE `tb_paket` DISABLE KEYS */;
INSERT INTO `tb_paket` (`PAKET_JENIS`, `PAKET_DESKRIPSI`, `SATUAN`, `PAKET_DESKRIPSI2`, `STATUS`) VALUES
	(1, 'DCFB(1B)', 'kms', '', 0),
	(2, 'DCFB(1M)', 'kms', '', 0),
	(3, 'DINAS', 'Buah', '', 0),
	(4, 'JARINGAN', 'Set', '', 0),
	(5, 'POT', 'kms', '', 0),
	(6, 'FG/TRR', 'Pelanggan', '', 0),
	(7, 'SSD', 'kms', '', 0),
	(8, 'PAKET 1 (SHIM, SMID, SJSD)', 'Kms', 'Bakul 1 Saluran Harapan  Impian Menegah (SHIM), Saluran Murni Indah Dunia (SMID), Saluran Jaya Selalu Dihati (SJSD)', 0),
	(9, 'BAKUL 2 (Jaringan, Dinas, POT)', 'Set', 'BAKUL 2 (Jaringan, Dinas, POT)', 0),
	(10, 'BAKUL 3 (SFRT, SHGT, YTY)', 'Kms', 'BAKUL 3 (SFRT, SHGT, YTY)', 0),
	(11, 'Bakul 4 (WERTY dan Mainan)', 'Pelanggan', 'Bakul 4 (WERTY dan Mainan)', 0),
	(12, 'JASA ASIK SSD', 'Lot', 'Pekerjaan asik di industri', 0),
	(13, 'PEKERJAAN MANUAL PAKET 1', 'Lot', 'PEKERJAAN MANUAL PAKET 1', 1),
	(14, 'PEKERJAAN MANUAL PAKET 2', 'Lot', 'PEKERJAAN MANUAL PAKET 2', 1),
	(15, 'PEKERJAAN MANUAL PAKET 3', 'Lot', 'PEKERJAAN MANUAL PAKET 3', 1);
/*!40000 ALTER TABLE `tb_paket` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
