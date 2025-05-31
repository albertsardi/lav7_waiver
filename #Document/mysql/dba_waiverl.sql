/*
SQLyog Community v11.01 (64 bit)
MySQL - 5.5.5-10.4.27-MariaDB : Database - waiver
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`waiver` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `waiver`;

/*Table structure for table `carts` */

DROP TABLE IF EXISTS `carts`;

CREATE TABLE `carts` (
  `id` int(20) NOT NULL,
  `prouduct_id` int(20) NOT NULL,
  `customer_id` int(20) NOT NULL,
  `weight` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `carts` */

/*Table structure for table `cities` */

DROP TABLE IF EXISTS `cities`;

CREATE TABLE `cities` (
  `id` int(5) NOT NULL,
  `province_id` int(5) DEFAULT NULL,
  `city_id` int(5) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `cities` */

/*Table structure for table `customers` */

DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL DEFAULT '',
  `email` varchar(25) NOT NULL DEFAULT '',
  `email_verified_at` timestamp NOT NULL DEFAULT curdate(),
  `password` varchar(25) NOT NULL DEFAULT '',
  `remember_token` varchar(25) NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `customers` */

insert  into `customers`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values (1,'customer1','','2025-05-28 00:00:00','','','2025-05-28 00:00:00','2025-05-28 00:00:00');

/*Table structure for table `invoices` */

DROP TABLE IF EXISTS `invoices`;

CREATE TABLE `invoices` (
  `id` int(20) NOT NULL,
  `invoice` varchar(20) DEFAULT NULL,
  `customer_id` int(5) DEFAULT NULL,
  `courier` varchar(20) DEFAULT NULL,
  `service` varchar(20) DEFAULT NULL,
  `cost_courier` int(12) DEFAULT NULL,
  `wight` int(5) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `phone` int(5) DEFAULT NULL,
  `province` int(5) DEFAULT NULL,
  `city` int(5) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `grand_total` int(12) DEFAULT NULL,
  `snap_token` varchar(20) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `invoices` */

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(12) NOT NULL,
  `invoice` varchar(15) NOT NULL DEFAULT '',
  `product_id` int(12) DEFAULT NULL,
  `product_name` varchar(25) NOT NULL DEFAULT '',
  `image` varchar(25) NOT NULL DEFAULT '',
  `qty` int(11) DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `orders` */

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `sid` varchar(6) DEFAULT NULL,
  `id` bigint(20) NOT NULL,
  `image` varchar(25) DEFAULT NULL,
  `title` varchar(25) DEFAULT NULL,
  `slug` varchar(25) DEFAULT NULL,
  `category_id` int(12) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `weight` int(10) DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `discount` decimal(12,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `products` */

insert  into `products`(`sid`,`id`,`image`,`title`,`slug`,`category_id`,`content`,`weight`,`price`,`discount`,`created_at`,`updated_at`) values (NULL,0,'product1.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `provinces` */

DROP TABLE IF EXISTS `provinces`;

CREATE TABLE `provinces` (
  `id` int(5) NOT NULL,
  `province_id` int(5) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `provinces` */

/*Table structure for table `test` */

DROP TABLE IF EXISTS `test`;

CREATE TABLE `test` (
  `Name` varchar(50) DEFAULT NULL,
  `Profession` varchar(50) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `Age` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `test` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL DEFAULT '',
  `email` varchar(25) NOT NULL DEFAULT '',
  `email_verified_at` timestamp NOT NULL DEFAULT curdate(),
  `password` varchar(25) NOT NULL DEFAULT '',
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `avatar` varchar(25) NOT NULL DEFAULT '',
  `remember_token` varchar(25) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT curdate(),
  `updated_at` timestamp NOT NULL DEFAULT curdate(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
