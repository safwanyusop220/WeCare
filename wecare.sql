-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;




-- Dumping structure for table wecare.acceptjoblist
CREATE TABLE IF NOT EXISTS `acceptjoblist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplyDesc` varchar(50) DEFAULT NULL,
  `numPeople` varchar(50) DEFAULT NULL,
  `quarantineDuration` varchar(50) DEFAULT NULL,
  `requestBy` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `requestName` varchar(50) DEFAULT NULL,
  `requestPhone` varchar(50) DEFAULT NULL,
  `acceptBy` varchar(50) DEFAULT 'none',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table wecare.acceptjoblist: ~7 rows (approximately)
/*!40000 ALTER TABLE `acceptjoblist` DISABLE KEYS */;
INSERT INTO `acceptjoblist` (`id`, `supplyDesc`, `numPeople`, `quarantineDuration`, `requestBy`, `status`, `requestName`, `requestPhone`, `acceptBy`) VALUES
	(1, ' pills', '1 Person', '4 Days', '19', 'Approved', 'Abdillah Safwan', '0138469671', 'none'),
	(2, 'nasi ambeng', '3 Person', '2 Days', '10', 'Approved', 'Nur Afiqah', '0143256341', 'none'),
	(3, 'nasi ambeng', '3 Person', '2 Days', '10', 'Approved', 'Nur Afiqah', '0143256341', 'none'),
	(4, 'nasi ambeng', '3 Person', '2 Days', '10', 'Approved', 'Nur Afiqah', '0143256341', 'none'),
	(5, 'toiletries', '2 Person', '2 Days', '19', 'Approved', 'Abdillah Safwan', '0138469671', 'none'),
	(6, '   Groceries', '4 Person', '7 Days', '10', 'Approved', 'Nur Afiqah', '0143256341', 'none'),
	(7, '  Drinking Water', '4 Person', '2 Days', '10', 'Approved', 'Nur Afiqah', '0143256341', 'none');
/*!40000 ALTER TABLE `acceptjoblist` ENABLE KEYS */;

-- Dumping structure for table wecare.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table wecare.admin: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `email`, `password`) VALUES
	(1, 'admin@admin.com', 'abcd1234');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table wecare.request_supply
CREATE TABLE IF NOT EXISTS `request_supply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `requestName` varchar(50) DEFAULT NULL,
  `supplyDesc` varchar(50) DEFAULT NULL,
  `numPeople` varchar(50) DEFAULT NULL,
  `quarantineDuration` varchar(50) DEFAULT NULL,
  `requestBy` varchar(50) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Pending',
  `requestPhone` varchar(50) DEFAULT NULL,
  `jobStatus` varchar(50) DEFAULT 'Pending',
  `acceptBy` varchar(50) DEFAULT 'none',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

-- Dumping data for table wecare.request_supply: ~20 rows (approximately)
/*!40000 ALTER TABLE `request_supply` DISABLE KEYS */;
INSERT INTO `request_supply` (`id`, `requestName`, `supplyDesc`, `numPeople`, `quarantineDuration`, `requestBy`, `location`, `status`, `requestPhone`, `jobStatus`, `acceptBy`) VALUES
	(21, 'Nur Afiqah', 'nasi ambeng', '3 Person', '2 Days', '10', 'the height residence', 'Approved', '0143256341', 'Accepted', 'none'),
	(22, 'Nur Afiqah', ' nak nasi kfc', '1 Person', ' 9 Days', '10', 'pangsapuri sri utama', 'Reject', '0143256341', 'Pending', 'none'),
	(23, 'Abdillah Safwan', '  nak ayam masak merah', '2 Person', '2 Days', '19', 'pangsapuri sri utama', 'Reject', '0138469671', 'Pending', 'none'),
	(24, 'Abdillah Safwan', ' pills', '1 Person', '4 Days', '19', 'pangsapuri sri utama', 'Approved', '0138469671', 'Accepted', 'none'),
	(25, 'Abdillah Safwan', ' Drinking Water', '4 Person', '7 Days', '19', 'pangsapuri sri utama', 'Approved', '0138469671', 'Pending', 'none'),
	(26, 'Abdillah Safwan', 'toiletries', '2 Person', '2 Days', '19', 'pangsapuri sri utama', 'Approved', '0138469671', 'Accepted', '1'),
	(27, 'Nur Afiqah', '   Groceries', '4 Person', '7 Days', '10', 'pangsapuri sri utama', 'Approved', '0143256341', 'Accepted', '1'),
	(28, 'Nur Afiqah', '  Drinking Water', '4 Person', '2 Days', '10', 'pangsapuri sri utama', 'Approved', '0143256341', 'Accepted', '1'),
	(29, 'Zaki Armindo', '   Covid Test Kit', '4 Person', '7 Days', '21', 'utem lestari', 'Approved', '01574829412', 'Pending', 'none'),
	(30, 'Muhd Ridhwan', '  Eggs and instant noodle supply', '5 Person', '5 Days', '23', 'Jalan TU 35, 75450 Ayer Keroh, Melaka', 'Approved', '0174657431', 'Pending', 'none'),
	(31, 'Ahmad Nabil', '  Rice supply', '5 Person', '4 Days', '24', 'Jln PK 34, Kawasan Perindustrian Krubong', 'Approved', '0158674731', 'Pending', 'none'),
	(32, 'Ahmad Nabil', '  Covid Test Kit', '4 Person', '7 Days', '24', 'Jln PK 34, Kawasan Perindustrian Krubong', 'Approved', '0158674731', 'Pending', 'none'),
	(33, 'Abdillah Safwan', '  Mask Supply', '2 Person', '5 Days', '19', '8, Jalan Merdeka 14, Taman Merdeka', 'Approved', '0138469671', 'Pending', 'none'),
	(34, 'Putra Alif', ' Disinfectant & Cleaning Supply', '1 Person', '7 Days', '22', 'ixora condominium', 'Pending', '0157643741', 'Pending', 'none'),
	(35, 'Putra Alif', '  medication supply', '5 Person', '4 Days', '22', 'ixora condominium', 'Pending', '0157643741', 'Pending', 'none'),
	(36, 'Nur Afiqah', ' Paracetamol', '4 Person', '7 Days', '10', 'pangsapuri sri utama', 'Pending', '0143256341', 'Pending', 'none'),
	(37, 'Cecilia Chong Ching Nee', '  Disinfectant and cleaning supply', '1 Person', '3 Days', '26', '2042, Jalan Angkasa Nuri 26, Taman Angkasa Nuri', 'Pending', '0193746141', 'Pending', 'none'),
	(38, 'Ahmad Firdaus', ' Hand Sanitizer Supply', '3 Person', '6 Days', '25', '3172, Jalan Enggang 6, Taman Enggang', 'Pending', '01658385823', 'Pending', 'none'),
	(39, 'Ahmad Firdaus', '  Covid Test Kit', '6 Person', '1 Days', '25', '3172, Jalan Enggang 6, Taman Enggang', 'Approved', '01658385823', 'Pending', 'none'),
	(40, 'syafiq muda', ' mask supply', '6 Person', '5 Days', '27', 'utem lestari', 'Approved', '0138469671', 'Pending', 'none');
/*!40000 ALTER TABLE `request_supply` ENABLE KEYS */;

-- Dumping structure for table wecare.supplylist
CREATE TABLE IF NOT EXISTS `supplylist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `requestName` varchar(50) DEFAULT NULL,
  `supplyDesc` varchar(50) DEFAULT NULL,
  `numPeople` varchar(50) DEFAULT NULL,
  `quarantineDuration` varchar(50) DEFAULT NULL,
  `requestBy` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `requestPhone` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table wecare.supplylist: ~11 rows (approximately)
/*!40000 ALTER TABLE `supplylist` DISABLE KEYS */;
INSERT INTO `supplylist` (`id`, `requestName`, `supplyDesc`, `numPeople`, `quarantineDuration`, `requestBy`, `status`, `requestPhone`) VALUES
	(1, NULL, 'nasi ambeng', '3 Person', '2 Days', '10', 'Pending', NULL),
	(2, 'Nur Afiqah', '   Groceries', '4 Person', '7 Days', '10', 'Pending', '0143256341'),
	(3, 'Muhd Ridhwan', '  Eggs and instant noodle supply', '5 Person', '5 Days', '23', 'Pending', '0174657431'),
	(4, 'Zaki Armindo', '   Covid Test Kit', '4 Person', '7 Days', '21', 'Pending', '01574829412'),
	(5, 'Abdillah Safwan', ' Drinking Water', '4 Person', '7 Days', '19', 'Pending', '0138469671'),
	(6, 'Ahmad Nabil', '  Rice supply', '5 Person', '4 Days', '24', 'Pending', '0158674731'),
	(7, 'Nur Afiqah', '  Drinking Water', '4 Person', '2 Days', '10', 'Pending', '0143256341'),
	(8, 'Abdillah Safwan', '  Mask Supply', '2 Person', '5 Days', '19', 'Pending', '0138469671'),
	(9, 'Ahmad Nabil', '  Covid Test Kit', '4 Person', '7 Days', '24', 'Pending', '0158674731'),
	(10, 'syafiq muda', ' mask supply', '6 Person', '5 Days', '27', 'Pending', '0138469671'),
	(11, 'Ahmad Firdaus', '  Covid Test Kit', '6 Person', '1 Days', '25', 'Pending', '01658385823');
/*!40000 ALTER TABLE `supplylist` ENABLE KEYS */;

-- Dumping structure for table wecare.user
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(100) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `acc_number` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user',
  `location` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table wecare.user: ~10 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`user_id`, `fullname`, `password`, `email`, `phone`, `age`, `gender`, `acc_number`, `bank`, `role`, `location`) VALUES
	(10, 'Nur Afiqah', 'abcd1234', 'fiqa@gmail.com', '0143256341', NULL, 'female', NULL, NULL, 'user', 'pangsapuri sri utama'),
	(11, 'azri awi', 'abcd1234', 'azriAwi@gmail.com', '0187848263', NULL, 'male', NULL, NULL, 'user', 'The Height Residence'),
	(19, 'Abdillah Safwan', 'abcd1234', 'safwan@gmail.com', '0138469671', NULL, 'male', NULL, NULL, 'user', '8, Jalan Merdeka 14, Taman Merdeka'),
	(21, 'Zaki Armindo', 'abcd1234', 'zaki@gmail.com', '01574829412', NULL, 'male', NULL, NULL, 'user', 'utem lestari'),
	(22, 'Putra Alif', 'abcd1234', 'alif@gmail.com', '0157643741', NULL, 'male', NULL, NULL, 'user', 'ixora condominium'),
	(23, 'Muhd Ridhwan', 'abcd1234', 'ridhwan@gmail.com', '0174657431', NULL, 'male', NULL, NULL, 'user', 'Jalan TU 35, 75450 Ayer Keroh, Melaka'),
	(24, 'Ahmad Nabil', 'abcd1234', 'nabil@gmail.com', '0158674731', NULL, NULL, NULL, NULL, 'user', 'Jln PK 34, Kawasan Perindustrian Krubong'),
	(25, 'Ahmad Firdaus', 'abcd1234', 'firdaus@gmail.com', '01658385823', NULL, 'male', NULL, NULL, 'user', '3172, Jalan Enggang 6, Taman Enggang'),
	(26, 'Cecilia Chong Ching Nee', 'abcd1234', 'cecilia@gmail.com', '0193746141', NULL, 'female', NULL, NULL, 'user', '2042, Jalan Angkasa Nuri 26, Taman Angkasa Nuri'),
	(27, 'syafiq muda', 'abcd1234', 'syafiq@gmail.com', '0138469671', NULL, 'male', NULL, NULL, 'user', 'the height residence');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table wecare.volunteer
CREATE TABLE IF NOT EXISTS `volunteer` (
  `volunteerId` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`volunteerId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table wecare.volunteer: ~1 rows (approximately)
/*!40000 ALTER TABLE `volunteer` DISABLE KEYS */;
INSERT INTO `volunteer` (`volunteerId`, `fullname`, `phone`, `email`, `password`) VALUES
	(1, 'Mudh fahmi', '0138469671', 'fahmi@gmail.com', 'abcd1234'),
	(2, 'Ahmad Hazim', '0158362513', 'hazim@gmail.com', 'abcd1234');
/*!40000 ALTER TABLE `volunteer` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
