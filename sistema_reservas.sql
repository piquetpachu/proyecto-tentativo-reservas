-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.32-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.7.0.6850
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para sistema_reservas
CREATE DATABASE IF NOT EXISTS `sistema_reservas` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `sistema_reservas`;

-- Volcando estructura para tabla sistema_reservas.espacio
CREATE TABLE IF NOT EXISTS `espacio` (
  `id_espacio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `ubicacion` varchar(150) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  PRIMARY KEY (`id_espacio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla sistema_reservas.espacio: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sistema_reservas.reserva
CREATE TABLE IF NOT EXISTS `reserva` (
  `id_reserva` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `motivo` varchar(255) DEFAULT NULL,
  `cantidad_personas` int(11) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `espacio_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_reserva`),
  KEY `usuario_id` (`usuario_id`),
  KEY `espacio_id` (`espacio_id`),
  CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`espacio_id`) REFERENCES `espacio` (`id_espacio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla sistema_reservas.reserva: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sistema_reservas.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `rol` varchar(50) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla sistema_reservas.usuario: ~4 rows (aproximadamente)
INSERT IGNORE INTO `usuario` (`id_usuario`, `nombre`, `email`, `password`, `rol`, `telefono`, `direccion`) VALUES
	(3, 'pachu', 'pachu@ejemplo.com', '$2y$10$qiiQXIVedNcQVN3Dpj3bwu10PcINP8GA3oz9p2SjipdQiUNBIwIbK', 'usuario', '12345678', 'mi casita'),
	(4, 'nacho', 'nacho@ejemplo.com', '$2y$10$e/dyr4/fdEknLJ8SmeRjaOOM5s.jfWhZIbEpw25eLTzwi2A5qgg0G', 'admin', '12345678', 'qsyo toy re loko'),
	(5, 'caroo', 'caroo@ejemplo.com', '$2y$10$KDRHx9BnLA2vsFuxoVhrl.z4DdARVUrQAGiTx7sE9e34p2rdgPm7K', 'admin', '12345678', 'asilo de viejas'),
	(6, 'luciano', 'luciano@ejemplo.com', '$2y$10$eDkC8NQnOHPqTo0u6fL3Su1S2pFoA/pXKDZbjZg3krU2sNuOqh/xG', 'admin', '12213453', 'kancun'),
	(7, 'pepe', 'pepe@ejemplo.com', '$2y$10$CpU6nHYXNJuKH.OD1lcAkOlwa5sxE9UtCCW9zIpzxdpP6qNArsAKO', 'usuario', '12213453', 'pepecity');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
