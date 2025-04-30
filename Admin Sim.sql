/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.4.32-MariaDB : Database - crud1
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`crud1` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `crud1`;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `userid` bigint(20) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `users` */

insert  into `users`(`userid`,`fname`,`lname`,`email`,`pass`) values (2,'Lance','Fired','lancefired@gmail.com','$2y$10$4fOaBGeVBW2YwlpFhzKBeeSCEzBsidj86UC/KBdVWi/qeoJD79qCK'),(3,'Noe','Asumbra','noeasumbra@gmail.com','$2y$10$cvYDO1BlSfvNrv0f5nSb.udPTC87DpxiB1/Bx7mpL339u00yXZney'),(4,'Rhenard','Popatco','seishin@gmail.com','$2y$10$DWD2Odov0hXQlQDvqnqSzuTGvsOmOrOcHslyQnB/P3YkW1eyDQWaq'),(5,'James','Mapagmahal','james@gmail.com','$2y$10$d1vVK7xYSb2fJa/AUFt/l.hDj5IT90ihHsRVzh.5MUJ39rCPFV58O'),(6,'tungtungtung','sahur','sahurtung@gmail.com','$2y$10$0hStc9acvZosAsGJZdWXVu0HIe1VN8zP6iY1t2AR5ghIoFHSCmQeq');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
