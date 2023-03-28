-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table ci4_penerbitan.tb_anggota
CREATE TABLE IF NOT EXISTS `tb_anggota` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nik` int DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama` varchar(60) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tmp_lahir` varchar(60) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jk` varchar(2) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_general_ci,
  `email` varchar(60) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `is_active` int DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table ci4_penerbitan.tb_anggota: ~4 rows (approximately)
INSERT INTO `tb_anggota` (`id`, `nik`, `password`, `nama`, `tmp_lahir`, `tgl_lahir`, `jk`, `alamat`, `email`, `created_at`, `is_active`) VALUES
	(1, 3456789, '$2y$10$LQY1G6bpjvOObOVp2uYD3u3/rQOQAHpMH4.lglzIS3T5j3WK5sxna', 'Nama Lengkap Anggota', 'Padang', '2023-02-01', 'L', 'Alamat Lengkap Anggota', 'tes@gmail.com', '2023-02-13 09:42:47', 1),
	(2, 543545, '$2y$10$3d7yYQ3YjJo3EA/YDONgd.3X5Bmeb1TPYoWJ2JMiRcG96uys69nSK', 'Nama Dosen 1', 'Padang', '2023-02-13', 'L', 'fdsfsd', 'rafaritonga211011@gmail.com', '2023-02-13 10:41:36', 1),
	(3, 546456546, '$2y$10$HAW4RnTW0P7Tc8jCmk/93egQsiPnMxqox91/imdcloxWEyUpwKa6m', 'regfdg', 'Padang', '2023-02-13', 'P', 'dgfdg', 'budiutama1928@gmail.com', '2023-02-13 10:43:41', 1),
	(4, 656546, '$2y$10$Vopvqq.9GuZeULBXgCC5ce6XN4c33MM98a3.G62FoPq0Ulgntlgfi', 'Nama Dosen 1', 'Padang', '2023-02-13', 'L', 'gfh', 'rafaritonga@gmail.com', '2023-02-13 10:46:11', 1);

-- Dumping structure for table ci4_penerbitan.tb_buku
CREATE TABLE IF NOT EXISTS `tb_buku` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_buku` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `judul_buku` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `penulis` int NOT NULL,
  `jenis_buku` int NOT NULL,
  `tahun_terbit` int DEFAULT NULL,
  `link_naskah` text COLLATE utf8mb4_general_ci,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `is_publis` int DEFAULT NULL,
  `cover` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table ci4_penerbitan.tb_buku: ~5 rows (approximately)
INSERT INTO `tb_buku` (`id`, `kode_buku`, `judul_buku`, `penulis`, `jenis_buku`, `tahun_terbit`, `link_naskah`, `created_at`, `is_publis`, `cover`) VALUES
	(1, 'B-1676265777', 'Judul Buku', 1, 1, 2023, 'jtiejtiji', '2023-02-13 12:23:14', 1, '1677035963_53bfb37743fff5b58305.png'),
	(2, 'B-1676265960', 'Judul Buku dua', 1, 2, 2023, 'kiejrt', '2023-02-13 12:26:14', 1, '1677036025_f0680691473e4ddb2929.png'),
	(3, 'B-1676265988', 'Judul Buku tiga', 1, 1, 2023, 'kiejrt', '2023-02-13 12:26:39', 1, NULL),
	(4, 'B-1676267051', 'Judul Buku Terbaruuu', 1, 2, 2023, 'kiejrt', '2023-02-13 12:44:35', NULL, NULL),
	(5, 'B-1676267087', 'Judul Buku Terbaruuu ya', 1, 2, 2023, 'kiejrt', '2023-02-13 12:44:53', NULL, NULL),
	(6, 'B-1677043378', 'Judul Bukugggg', 2, 1, 55, NULL, '2023-02-21 22:23:10', NULL, NULL);

-- Dumping structure for table ci4_penerbitan.tb_jenis_buku
CREATE TABLE IF NOT EXISTS `tb_jenis_buku` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenis` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table ci4_penerbitan.tb_jenis_buku: ~2 rows (approximately)
INSERT INTO `tb_jenis_buku` (`id`, `jenis`) VALUES
	(1, 'Fiksi'),
	(2, 'Non Fiksi');

-- Dumping structure for table ci4_penerbitan.tb_pembayaran
CREATE TABLE IF NOT EXISTS `tb_pembayaran` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_pengajuan` int DEFAULT NULL,
  `norek` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bank` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nm_penyetor` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `wkt_bayar` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jml_transfer` double DEFAULT NULL,
  `bukti` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ket` text COLLATE utf8mb4_general_ci,
  `stt_bukti` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table ci4_penerbitan.tb_pembayaran: ~3 rows (approximately)
INSERT INTO `tb_pembayaran` (`id`, `id_pengajuan`, `norek`, `bank`, `nm_penyetor`, `wkt_bayar`, `jml_transfer`, `bukti`, `ket`, `stt_bukti`) VALUES
	(2, 1, '9989', 'BSI', 'YAMIN', '9889', 8989898, '1676295213_b766e819ac7945e3f847.jpg', 'Buat Catatan Penolakan', 2),
	(3, 2, '89898', 'BSI', '8989', '998989', 19999, '1676297400_792f962543b7be2d6dbe.jpg', 'Buat Catatan Penolakan', 2),
	(4, 3, '75', 'BRI', 'YAMIN', '08.30 11-10-2023', 56000000, '1676391932_994ddd61e3283b0680b9.jpg', NULL, NULL);

-- Dumping structure for table ci4_penerbitan.tb_penerbitan
CREATE TABLE IF NOT EXISTS `tb_penerbitan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `buku_id` int NOT NULL,
  `kode_pengajuan` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgl_pengajuan` date DEFAULT NULL,
  `lama_pengajuan` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  `is_payment` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table ci4_penerbitan.tb_penerbitan: ~3 rows (approximately)
INSERT INTO `tb_penerbitan` (`id`, `user_id`, `buku_id`, `kode_pengajuan`, `tgl_pengajuan`, `lama_pengajuan`, `status`, `is_payment`) VALUES
	(1, 1, 1, 'P-1676282195', '2023-02-06', NULL, 3, 3),
	(2, 1, 2, 'P-1676282767', '2023-02-13', NULL, 3, 3),
	(3, 1, 3, 'P-1676282783', '2023-02-12', NULL, NULL, 2);

-- Dumping structure for table ci4_penerbitan.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `fullname` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `level_id` int NOT NULL,
  `is_active` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table ci4_penerbitan.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `email`, `password`, `fullname`, `level_id`, `is_active`) VALUES
	(1, 'admin', '$2y$10$LQY1G6bpjvOObOVp2uYD3u3/rQOQAHpMH4.lglzIS3T5j3WK5sxna', 'Widya Salsabillah', 1, 1),
	(2, 'pimpinan', '$2y$10$LQY1G6bpjvOObOVp2uYD3u3/rQOQAHpMH4.lglzIS3T5j3WK5sxna', 'Nama Pimpinan', 2, 1);

-- Dumping structure for table ci4_penerbitan.users_level
CREATE TABLE IF NOT EXISTS `users_level` (
  `id` int NOT NULL AUTO_INCREMENT,
  `level` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table ci4_penerbitan.users_level: ~2 rows (approximately)
INSERT INTO `users_level` (`id`, `level`) VALUES
	(1, 'Administrator'),
	(2, 'Pimpinan');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
