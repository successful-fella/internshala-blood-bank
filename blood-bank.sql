-- Adminer 4.7.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `blood-bank`;
CREATE DATABASE `blood-bank` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `blood-bank`;

DROP TABLE IF EXISTS `blood_request_tracker`;
CREATE TABLE `blood_request_tracker` (
  `receiver_id` int(11) NOT NULL,
  `sample_id` bigint(20) NOT NULL,
  `date_requested` varchar(255) NOT NULL,
  UNIQUE KEY `receiver_id_sample_id` (`receiver_id`,`sample_id`),
  KEY `sample_id` (`sample_id`),
  CONSTRAINT `blood_request_tracker_ibfk_3` FOREIGN KEY (`receiver_id`) REFERENCES `receiver` (`receiver_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `blood_request_tracker_ibfk_4` FOREIGN KEY (`sample_id`) REFERENCES `blood_sample` (`sample_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `blood_sample`;
CREATE TABLE `blood_sample` (
  `sample_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `hospital_id` int(11) NOT NULL,
  `sample_name` varchar(255) NOT NULL,
  `sample_type` varchar(5) NOT NULL,
  `sample_rhd` varchar(5) NOT NULL,
  `date_added` varchar(255) NOT NULL,
  PRIMARY KEY (`sample_id`),
  KEY `hospital_id` (`hospital_id`),
  CONSTRAINT `blood_sample_ibfk_2` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`hospital_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `hospital`;
CREATE TABLE `hospital` (
  `hospital_id` int(11) NOT NULL AUTO_INCREMENT,
  `hospital_name` varchar(255) NOT NULL,
  `hospital_address` varchar(500) NOT NULL,
  `hospital_feature_image` varchar(255) DEFAULT NULL,
  `hospital_contact_email` varchar(255) NOT NULL,
  `hospital_password` char(60) NOT NULL,
  `date_added` varchar(255) NOT NULL,
  PRIMARY KEY (`hospital_id`),
  UNIQUE KEY `hospital_contact_email` (`hospital_contact_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `receiver`;
CREATE TABLE `receiver` (
  `receiver_id` int(11) NOT NULL AUTO_INCREMENT,
  `receiver_name` varchar(255) NOT NULL,
  `receiver_address` varchar(500) NOT NULL,
  `receiver_contact_email` varchar(255) NOT NULL,
  `receiver_blood_type` varchar(5) NOT NULL,
  `receiver_blood_rhd` varchar(5) NOT NULL,
  `receiver_password` char(60) NOT NULL,
  `date_added` varchar(255) NOT NULL,
  PRIMARY KEY (`receiver_id`),
  UNIQUE KEY `receiver_contact_email` (`receiver_contact_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2020-10-22 18:24:57