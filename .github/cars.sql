DROP DATABASE IF EXISTS cars;
CREATE DATABASE IF NOT EXISTS cars;
USE cars;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL UNIQUE,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `car`;
CREATE TABLE IF NOT EXISTS `car` (
  `renavam` bigint NOT NULL,
  `carName` varchar(50) NOT NULL,
  `color` varchar(20) NOT NULL,
  `typeCarId` int NOT NULL,
  PRIMARY KEY (`renavam`),
  KEY `typeCarId` (`typeCarId`)
);

DROP TABLE IF EXISTS `typecar`;
CREATE TABLE IF NOT EXISTS `typecar` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `typecar` (`id`, `description`) VALUES
(1, 'SUV'),
(2, 'Sedan'),
(3, 'Hatchback'),
(4, 'Convertible'),
(5, 'Sport Car'),
(6, 'Pickup');

ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`typeCarId`) REFERENCES `typecar` (`id`);
COMMIT;
