/*
SQLyog Enterprise v12.09 (64 bit)
MySQL - 10.1.40-MariaDB : Database - alumni
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`alumni` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `alumni`;

/*Table structure for table `hod_details` */

DROP TABLE IF EXISTS `hod_details`;

CREATE TABLE `hod_details` (
  `hid` int(11) NOT NULL AUTO_INCREMENT,
  `hod_name` varchar(100) NOT NULL,
  `hod_username` varchar(50) NOT NULL,
  `hod_password` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  PRIMARY KEY (`hid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `hod_details` */

insert  into `hod_details`(`hid`,`hod_name`,`hod_username`,`hod_password`,`department`) values (1,'Prof. Sunita Soni','Sunita','123','MCA'),(2,'Prof. Annie Bhattacharay','Annie','123','EEE');

/*Table structure for table `job_details` */

DROP TABLE IF EXISTS `job_details`;

CREATE TABLE `job_details` (
  `jobid` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `job_place` varchar(100) DEFAULT NULL,
  `job_title` varchar(100) DEFAULT NULL,
  `job_company` varchar(100) DEFAULT NULL,
  `start_date` varchar(20) DEFAULT NULL,
  `end_date` varchar(20) DEFAULT NULL,
  `package` varchar(100) DEFAULT NULL,
  `job_role` varchar(100) DEFAULT NULL,
  `remark` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`jobid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `job_details` */

insert  into `job_details`(`jobid`,`sid`,`type`,`job_place`,`job_title`,`job_company`,`start_date`,`end_date`,`package`,`job_role`,`remark`) values (3,1,'Business','raipur','md','enquero','2000','2018','2018','project incharge','abcd'),(4,24,'Business','banglore','phd','iit bombay','2021','2040','40000','lecturer',''),(5,18,'Business','Raipur','founder','intecho','2022','','','manager',''),(6,24,'Business','mh','phd','iit bombay','2021','2025','595555','lecturer','');

/*Table structure for table `student_details` */

DROP TABLE IF EXISTS `student_details`;

CREATE TABLE `student_details` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `rollno` bigint(20) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `batch` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `f_name` varchar(50) DEFAULT NULL,
  `dob` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) DEFAULT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

/*Data for the table `student_details` */

insert  into `student_details`(`sid`,`rollno`,`sname`,`branch`,`mobile`,`email`,`batch`,`gender`,`username`,`password`,`f_name`,`dob`,`address`,`city`,`state`,`country`,`image`) values (1,10001,'Amit','CSE','9898989898','na@na.com','2000','Male','10001','123','','','','','','','stu1.jpg'),(9,10004,'Praveen','MCA','','praveen324@gmail.com','2001','M','Praveen','123','  ','2019-04-29','','','','','MOTEE1.png'),(10,12,'Hulsee Devi Sahu','MBA','1234567897','hulsee@gmail.com','2015','Female','Hulsee123','123456','','','','','','','stu2.jpg'),(11,1001,'Rashmi Navlani','MCA','1234567891','rashmi@gmail.com','2016','Female','Rashmi111','12345','','','','','','','stu7.jpg'),(12,500102117014,'Pallavi Singh Bist','MCA','9778546321','pallavi@gmail.com','2017','Female','Pallavi111','123','','','','','','','stu5.jpg'),(14,123,'Raunak','mca','','','2013','M','Preet Sahu','rex','  ','1996-09-14','','','','','S.jpg'),(16,984224,'Motee Navlani','MCA','8982429882','moteeNavlani@gmail.com','2019','F','Motee','1234','Motee Ke papa','1996-05-19','Raipur','Raipur','C.G.','INDIA','MOTEE1.png'),(18,148487,'Preet Sahu','mca','983488394','preetsahu17@gmail.com','2017','M','preet','123','        ','2019-04-29','RAIPUR','','CG','INDIA','Preet111.jpg'),(19,83948,'jyoti ','mca','8982498298','joti@gmail.com','2000','F','Jyoti','123','xyz','2019-05-01','raipur','Raipur','cg','INDIA','stu5.jpg'),(21,889297,'ekta keshrwani','mca','9887372737','ekta89@gmail.com','2017','F','Ekta','123','xyz','2019-05-21','raipur','Raipur','cg','INDIA','stu6.jpg'),(22,978787,'hulsi sahu','mca','8878787889','hulsisahu78@gmail.com','2017','F','Hulsi','456','xyz','2019-04-30','raipur','Raipur','CG','INDIA','stu2.jpg'),(24,45,'Ankita Navlani','','8977675535','anki24@gmail.com','2017','M','ankita','123','      ','2019-05-09','raipur','raipur','cg','india','MOTEE1.png'),(27,8787,'Shubham Navlani','mca','8978675577','shubham78@gmail.com','2017','M','Shubham','124','  xyz','2019-05-13','raipur','raipur','cg','india','stu3.JPG');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
