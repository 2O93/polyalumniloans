/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.1.26-MariaDB : Database - polyalumniloans
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`polyalumniloans` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `polyalumniloans`;

/*Table structure for table `activitylog` */

DROP TABLE IF EXISTS `activitylog`;

CREATE TABLE `activitylog` (
  `act_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `details` text NOT NULL,
  `act_date` datetime NOT NULL,
  PRIMARY KEY (`act_id`),
  KEY `username` (`username`),
  CONSTRAINT `activitylog_ibfk_1` FOREIGN KEY (`username`) REFERENCES `staff` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `activitylog` */

insert  into `activitylog`(`act_id`,`username`,`details`,`act_date`) values (1,'Maliyoni','trial addition','2017-11-23 14:54:04');

/*Table structure for table `apps_admission` */

DROP TABLE IF EXISTS `apps_admission`;

CREATE TABLE `apps_admission` (
  `serial_no` int(15) NOT NULL,
  `admission_year` year(4) NOT NULL,
  `reg_number` varchar(20) NOT NULL,
  `year_of_study` tinyint(4) NOT NULL,
  `program` int(5) NOT NULL,
  `faculty` int(5) NOT NULL,
  PRIMARY KEY (`serial_no`),
  KEY `program` (`program`),
  KEY `faculty` (`faculty`),
  KEY `regnum` (`reg_number`),
  CONSTRAINT `apps_admission_ibfk_2` FOREIGN KEY (`program`) REFERENCES `program` (`prog_id`),
  CONSTRAINT `apps_admission_ibfk_3` FOREIGN KEY (`faculty`) REFERENCES `faculty` (`faculty_id`),
  CONSTRAINT `apps_admission_ibfk_4` FOREIGN KEY (`serial_no`) REFERENCES `apps_personal` (`serial_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `apps_admission` */

insert  into `apps_admission`(`serial_no`,`admission_year`,`reg_number`,`year_of_study`,`program`,`faculty`) values (2,2013,'EBS/13/PE/012',2,14,5),(5,2014,'TED/14/PE/021',2,15,5),(236,2011,'BIT/11/NE/005',4,3,1),(350,2012,'BIS/12/NE/001',4,4,1),(484,2011,'BLE/11/NE/020',5,7,2),(554,2012,'BBA/12/NE/004',3,12,4);

/*Table structure for table `apps_dependants` */

DROP TABLE IF EXISTS `apps_dependants`;

CREATE TABLE `apps_dependants` (
  `serial_no` int(15) NOT NULL,
  `dependant_name` varchar(20) NOT NULL,
  `school` varchar(20) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL,
  `annual_fees` double DEFAULT NULL,
  PRIMARY KEY (`serial_no`,`dependant_name`),
  CONSTRAINT `apps_dependants_ibfk_1` FOREIGN KEY (`serial_no`) REFERENCES `apps_personal` (`serial_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `apps_dependants` */

insert  into `apps_dependants`(`serial_no`,`dependant_name`,`school`,`level`,`annual_fees`) values (2,'Steve Kamuloni','BSS','MSCE',320000),(5,'Daniel Mwakanema','Mary Mount','Certificate',150000),(236,'Wezzie Chongwe','Dunlop tyres','Technician',200000),(350,'Jerry','Kasungu','Form 2',150000.12),(350,'Thomus','Private','Form 3',150000.12),(484,'Geofreys Bodza','MCA','ACCA Diploma',500000),(554,'Maupo Beleko','Poly','Year0',400000.45);

/*Table structure for table `apps_education` */

DROP TABLE IF EXISTS `apps_education`;

CREATE TABLE `apps_education` (
  `serial_no` int(15) NOT NULL,
  `primary_schools` text,
  `primary_fees` double NOT NULL,
  `primary_completion` year(4) NOT NULL,
  `secondary_schools` text,
  `secondary_fees` double NOT NULL,
  `secondary_completion` year(4) NOT NULL,
  `alevel_schools` text,
  `alevel_fees` double DEFAULT NULL,
  `alevel_completion` year(4) DEFAULT NULL,
  `primary_schools_no` tinyint(4) DEFAULT NULL,
  `secondary_schools_no` tinyint(4) DEFAULT NULL,
  `alevel_schools_no` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`serial_no`),
  CONSTRAINT `apps_education_ibfk_1` FOREIGN KEY (`serial_no`) REFERENCES `apps_personal` (`serial_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `apps_education` */

insert  into `apps_education`(`serial_no`,`primary_schools`,`primary_fees`,`primary_completion`,`secondary_schools`,`secondary_fees`,`secondary_completion`,`alevel_schools`,`alevel_fees`,`alevel_completion`,`primary_schools_no`,`secondary_schools_no`,`alevel_schools_no`) values (2,'Kongwe 1,\r\nMponela 2,\r\nChidothi.',40000,2005,'Robert Blake,\r\nDowa.',78000,2012,'',0,0000,3,2,0),(5,'Kaps,\r\nMtunthama.',80000,2007,'Chilamiramadzi',90000,2013,'',0,0000,2,1,0),(236,'Malembo 1,\r\nKazumba,\r\nLifidzi.',0,2006,'Robert Blake',150000,2010,'',0,0000,3,2,0),(350,'Kongwe 1,\r\nMsalura,\r\nGuilime Girls,\r\nChidothi Christian.',6500.23,2006,'Lilongwe Girls',18000,2011,'',0,0000,4,1,0),(484,'Kasakula,\r\nKasangadzi,\r\nKalindangoma.',0,2002,'Robert Blake,\r\nRobert Laws,\r\nWilliam Murray.',35000,2007,'',0,0000,3,3,0),(554,'Kongwe 1,\r\nChidothi,\r\nLinga,\r\nMponela 1.',0,2005,'Kamuzu Academy',350000,2010,'',0,0000,4,1,0);

/*Table structure for table `apps_father` */

DROP TABLE IF EXISTS `apps_father`;

CREATE TABLE `apps_father` (
  `serial_no` int(15) NOT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `surname` varchar(20) NOT NULL,
  `other_names` varchar(100) DEFAULT NULL,
  `profession` varchar(100) DEFAULT NULL,
  `dob` date NOT NULL,
  `education` enum('Primary','Secondary','Certificate','Diploma','Advanced Diploma','Graduate Diploma','Bachelors','Masters','PhD','Professor','Uneducated') NOT NULL,
  `address` varchar(60) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `employer_business` varchar(100) DEFAULT NULL,
  `residential_address` varchar(100) DEFAULT NULL,
  `monthly_income` double DEFAULT NULL,
  `other_income` double DEFAULT NULL,
  `district` int(14) DEFAULT NULL,
  `life` enum('Deceased','Living') NOT NULL,
  `origin_district` int(14) DEFAULT NULL,
  `origin_place` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`serial_no`),
  KEY `district` (`district`),
  KEY `origin_district` (`origin_district`),
  CONSTRAINT `apps_father_ibfk_2` FOREIGN KEY (`district`) REFERENCES `district` (`district_id`),
  CONSTRAINT `apps_father_ibfk_3` FOREIGN KEY (`origin_district`) REFERENCES `district` (`district_id`),
  CONSTRAINT `apps_father_ibfk_4` FOREIGN KEY (`serial_no`) REFERENCES `apps_personal` (`serial_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `apps_father` */

insert  into `apps_father`(`serial_no`,`firstname`,`surname`,`other_names`,`profession`,`dob`,`education`,`address`,`phone`,`mobile`,`email`,`employer_business`,`residential_address`,`monthly_income`,`other_income`,`district`,`life`,`origin_district`,`origin_place`) values (2,'Martin','Msendema','Henz','Lecturer','1972-10-05','Masters','P/Bag 303, Chichiri, Blantyre 54','123456789','','martin@pops.com','Unima','Poly Village',250000,200000,4,'Living',11,'Salamba'),(5,'Zikani','Mkandawire','Dikisoni','Driver','1990-05-21','Certificate','P/Bag 33, Chichiri, Blantyre 4','+524879652','','zikky@mhub.db','Rab processors','Chigumula',302000.9,120000.34,12,'Living',14,'Damiyano'),(236,'Yamikani','Nyirenda','','Farmer','1972-05-13','Secondary','P/Bag 254, Lilongwe','+2657754894','','pcdad@mail.who','Subsinstence Farming','Malembo',12000,5000,9,'Living',13,'Che Musa'),(350,'Sydon','Sichinga','','Farmer','1967-05-25','Secondary','Box 2, Nkhatabay','+2657754894','','ss@n.v','Selling Crops','Chintheche',0,0,19,'Deceased',19,'Chintheche'),(484,'Blessings','Chenjerani','Sajiwa','Teacher','1959-08-26','Advanced Diploma','P/Bag 2, Lilongwe','0993780045','0447854952','madaspops@loans.get','Malawi Government','Balaka',189486.15,54782.36,1,'Living',18,'Safusa'),(554,'Marion','Ghambi','Maliyoni','Student','1992-10-11','Diploma','P/Bag 303 Chichiri, Blantyre 3','0884104106','','maliyoni@loves.muva','Poly','Pa Campus',50000.05,12000.3,9,'Living',25,'origin_place');

/*Table structure for table `apps_guarantor` */

DROP TABLE IF EXISTS `apps_guarantor`;

CREATE TABLE `apps_guarantor` (
  `serial_no` int(15) NOT NULL,
  `name` varchar(60) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `residence` varchar(60) NOT NULL,
  PRIMARY KEY (`serial_no`),
  CONSTRAINT `apps_guarantor_ibfk_1` FOREIGN KEY (`serial_no`) REFERENCES `apps_personal` (`serial_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `apps_guarantor` */

insert  into `apps_guarantor`(`serial_no`,`name`,`phone`,`mobile`,`residence`) values (2,'Alice Mkamanga','+652487269','+6854478454','Chipoka'),(5,'Debora Chitsulo','+256844785216','+245879854614','Area 23'),(236,'Maliyoni Muva','0991784475','1234567','Bunda'),(350,'Chisomo Kalumbe','+265884453507','','Blantyre'),(484,'Paulos Nyirenda','0888824787','0999924787','Malawi SDNP Room 51'),(554,'Chisomo Kalumbe','+265884453507','0993480047','Mandala');

/*Table structure for table `apps_loan_app` */

DROP TABLE IF EXISTS `apps_loan_app`;

CREATE TABLE `apps_loan_app` (
  `serial_no` int(15) NOT NULL,
  `tuition` double NOT NULL,
  `upkeep` double NOT NULL,
  `total_loan` double NOT NULL,
  PRIMARY KEY (`serial_no`),
  CONSTRAINT `apps_loan_app_ibfk_1` FOREIGN KEY (`serial_no`) REFERENCES `apps_personal` (`serial_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `apps_loan_app` */

insert  into `apps_loan_app`(`serial_no`,`tuition`,`upkeep`,`total_loan`) values (2,350000,120000,470000),(5,400000,89000,489000),(236,350000,120000,470000),(350,350000.45,80000.67,430001.12),(484,350000.2,100000.03,450000.23),(554,350000,150000.12,500000.12);

/*Table structure for table `apps_mother` */

DROP TABLE IF EXISTS `apps_mother`;

CREATE TABLE `apps_mother` (
  `serial_no` int(15) NOT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `surname` varchar(20) NOT NULL,
  `other_names` varchar(100) DEFAULT NULL,
  `profession` varchar(100) DEFAULT NULL,
  `dob` date NOT NULL,
  `education` enum('Primary','Secondary','Certificate','Diploma','Advanced Diploma','Graduate Diploma','Bachelors','Masters','Phd','Professor','Uneducated') NOT NULL,
  `address` varchar(60) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `employer_business` varchar(100) DEFAULT NULL,
  `residential_address` varchar(100) DEFAULT NULL,
  `monthly_income` double DEFAULT NULL,
  `other_income` double DEFAULT NULL,
  `district` int(14) DEFAULT NULL,
  `life` enum('Deceased','Living') NOT NULL,
  `origin_district` int(14) DEFAULT NULL,
  `origin_place` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`serial_no`),
  KEY `district` (`district`),
  KEY `origin_district` (`origin_district`),
  CONSTRAINT `apps_mother_ibfk_2` FOREIGN KEY (`district`) REFERENCES `district` (`district_id`),
  CONSTRAINT `apps_mother_ibfk_3` FOREIGN KEY (`origin_district`) REFERENCES `district` (`district_id`),
  CONSTRAINT `apps_mother_ibfk_4` FOREIGN KEY (`serial_no`) REFERENCES `apps_personal` (`serial_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `apps_mother` */

insert  into `apps_mother`(`serial_no`,`firstname`,`surname`,`other_names`,`profession`,`dob`,`education`,`address`,`phone`,`mobile`,`email`,`employer_business`,`residential_address`,`monthly_income`,`other_income`,`district`,`life`,`origin_district`,`origin_place`) values (2,'Sibonjire','Jere','William','Student','1988-09-17','Phd','P.O. Box 22 Machinga','+255897452','','maother@you.net','Monocotyledon chremetor','Blantyre',350000,80000,16,'Living',21,'Kameza'),(5,'Mercy','Manjandimo','Lucy','Student','1992-07-15','Advanced Diploma','P.O. Box 56 Chichiri','+548778996225','','mercy@me.net','Poly','Poly',78400,14000,5,'Living',22,'Balaza'),(236,'Charity','Gwedeza','Tadala','Graduate','1992-03-24','Bachelors','P/Bag 254, Lilongwe','0993480047','','tadala@mail.tr','Polytechnic','Ndirande',50000,5000,2,'Living',21,'Mandala'),(350,'Grace','Bandawe','','Farmer','1969-04-13','Advanced Diploma','Box 2, Nkhatabay','','','ss@n.v','Selling Crops','Chintheche',0,0,19,'Living',19,'Chintheche'),(484,'Felistas','Somanje','','Pharmacist','1993-10-14','Bachelors','College of Medicine, P.O. Box 22, Blantyre','0889785418','0887456874','felie@mahope.not','University of Malawi','Mandala',235041.25,150871.65,10,'Living',16,'Zinenani'),(554,'Tadala','Sato','Linda','Student','1994-04-12','Bachelors','P/Bag 303 Chichiri, Blantyre 3','+265884179525','','tadlee6@gmail.com','The Polytechnic','Chichiri',50000.1,15000.5,2,'Living',20,'origin_place');

/*Table structure for table `apps_personal` */

DROP TABLE IF EXISTS `apps_personal`;

CREATE TABLE `apps_personal` (
  `serial_no` int(15) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `other_names` varchar(100) DEFAULT NULL,
  `gender` enum('M','F') NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `district` int(11) NOT NULL,
  `township` varchar(50) DEFAULT NULL,
  `village` varchar(50) DEFAULT NULL,
  `dob` date NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`serial_no`),
  KEY `district` (`district`),
  CONSTRAINT `apps_personal_ibfk_1` FOREIGN KEY (`district`) REFERENCES `district` (`district_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `apps_personal` */

insert  into `apps_personal`(`serial_no`,`firstname`,`surname`,`other_names`,`gender`,`address`,`phone`,`mobile`,`email`,`district`,`township`,`village`,`dob`,`password`) values (2,'Washington','Kampaliro','Promise','M','Box 22, Ntchisi','+265993878954','','wash@g.com',23,'Malomo','Visaza','2010-05-10',NULL),(5,'Luciano','Mickman','James','M','P.O. Box 25, Chitawira','+265994321548','0993570004','lucie@gmail.com',23,'Malomo','Kadiwa','1990-05-20',NULL),(236,'Precious','Chakwera','Pule','M','P/Bag 2, Lilongwe','+265881474747','0111222333','pch@mail.net',11,'Malembo','Salamba','1995-10-16',NULL),(350,'Esther','Banda','Vwiya','F','Nkhoma University, P.O. Box 22, Lilongwe','+265881760662','','bandaestherr@gmail.com',19,'Chintheche','Makosana','1992-08-31',NULL),(484,'Madalitso','Chenjerani','Jamusi','M','Robert Blake, P/Bag 3, Dowa','+265998748516','0887459861','madachenjera@blakeboys.emdub',7,'Kongwe','Kalinda','1990-06-30',NULL),(554,'Chimwemwe','Muva','Beatrice','F','P/Bag 303 Chichiri, Blantyre 3','+265884785123','','muva@mrsneba.mp',2,'Ndirande','Namiwawa','1994-11-13',NULL);

/*Table structure for table `apps_residential` */

DROP TABLE IF EXISTS `apps_residential`;

CREATE TABLE `apps_residential` (
  `serial_no` int(15) NOT NULL,
  `district` int(15) NOT NULL,
  `res_phone` varchar(20) DEFAULT NULL,
  `next_of_kin` varchar(60) NOT NULL,
  `place_name` varchar(60) NOT NULL,
  `next_of_kin_occupation` varchar(60) DEFAULT NULL,
  `next_of_kin_relation` enum('Sibling','Cousin','Nephew','Niece','Child','Parent','Uncle','Aunt','Spouse','Legal Guardian','In-law','Step-parent','Other') NOT NULL,
  `next_of_kin_location` varchar(60) NOT NULL,
  PRIMARY KEY (`serial_no`),
  KEY `district` (`district`),
  CONSTRAINT `apps_residential_ibfk_2` FOREIGN KEY (`district`) REFERENCES `district` (`district_id`),
  CONSTRAINT `apps_residential_ibfk_3` FOREIGN KEY (`serial_no`) REFERENCES `apps_personal` (`serial_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `apps_residential` */

insert  into `apps_residential`(`serial_no`,`district`,`res_phone`,`next_of_kin`,`place_name`,`next_of_kin_occupation`,`next_of_kin_relation`,`next_of_kin_location`) values (2,9,'01789208','Macdolnald Kapsata','Falls','Procurement','Cousin','Chilobwe'),(5,12,'01789415','Feliyano Mickman','Chitawira','Student','Legal Guardian','Naperi'),(236,6,'01635487','Mr Lazarus','Chimbiya','Politician','Uncle','Nyambadwe'),(350,26,'+265444875126','Chisomo Kalumbe','Msalura','Student','Spouse','Blantyre'),(484,1,'01368456','TSE Katsulukuta','Chikondi Stop over','Reverend','Uncle','Mchinji'),(554,26,'+265993457789','Mr Banda','Malimba','Teacher','Uncle','Blantyre');

/*Table structure for table `apps_siblings` */

DROP TABLE IF EXISTS `apps_siblings`;

CREATE TABLE `apps_siblings` (
  `serial_no` int(15) NOT NULL,
  `sibling_name` varchar(20) NOT NULL,
  `school` varchar(20) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL,
  `annual_fees` double DEFAULT NULL,
  PRIMARY KEY (`serial_no`,`sibling_name`),
  CONSTRAINT `apps_siblings_ibfk_1` FOREIGN KEY (`serial_no`) REFERENCES `apps_personal` (`serial_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `apps_siblings` */

insert  into `apps_siblings`(`serial_no`,`sibling_name`,`school`,`level`,`annual_fees`) values (2,'Makidonadi','Kabula Agency','Graduate Diploma',120000),(5,'Liness ','Poly','Third year',60000),(236,'Naomi','The Polytechnic','2nd Year',400000),(350,'Angella','CU','4th year',500000.01),(350,'Chisomo','Bunda','Year0',350000.26),(484,'Emmanuel','Saint Andrews','Form 5',1023400.22),(484,'Joy Mbuna','Kalibu Academy','Form 4',782325.5),(554,'Chisomo','Malawi SDNP','Network Engineer',0.02);

/*Table structure for table `apps_social` */

DROP TABLE IF EXISTS `apps_social`;

CREATE TABLE `apps_social` (
  `serial_no` int(15) NOT NULL,
  `fathers_children` tinyint(2) DEFAULT NULL,
  `mothers_children` tinyint(2) DEFAULT NULL,
  `parents_together` enum('Yes','No') DEFAULT NULL,
  `apps_stay` enum('Father','Mother','Other') DEFAULT NULL,
  `residence` enum('Rented','Owned','Employers','Other') DEFAULT NULL,
  `house` enum('Permanent','Semi Permanent') DEFAULT NULL,
  `house_rooms` tinyint(4) DEFAULT NULL,
  `household_expenditure` double DEFAULT NULL,
  `medical_care` enum('Private Missionary','Private Commercial','Insurance Cover','District Public Hospital','Other') DEFAULT NULL,
  `apps_reason` text NOT NULL,
  `apps_background` text NOT NULL,
  PRIMARY KEY (`serial_no`),
  CONSTRAINT `apps_social_ibfk_1` FOREIGN KEY (`serial_no`) REFERENCES `apps_personal` (`serial_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `apps_social` */

insert  into `apps_social`(`serial_no`,`fathers_children`,`mothers_children`,`parents_together`,`apps_stay`,`residence`,`house`,`house_rooms`,`household_expenditure`,`medical_care`,`apps_reason`,`apps_background`) values (2,4,4,'Yes','','Employers','Semi Permanent',4,150000.51,'Private Missionary','Ndine needy','Kwinako Inkatchipa'),(5,3,3,'Yes','','Employers','Semi Permanent',7,320450,'Private Missionary','Malawi wavuta','Bola Nthawi ya kamuzu'),(236,5,4,'No','Mother','Rented','Permanent',7,320000,'District Public Hospital','We cannot possibly afford to pay','Before the fees were affordable'),(350,4,5,'No','Mother','Owned','Permanent',4,130000.45,'District Public Hospital','Ndine nide','Been Sponsored'),(484,3,3,'Yes','','Rented','Permanent',6,0,'Insurance Cover','Ndine needy wa desperate','Kwinako Inkatchipa'),(554,1,3,'Yes','','Employers','Semi Permanent',7,150000.32,'Private Missionary','We need it','Get tha degree');

/*Table structure for table `apps_sponsors` */

DROP TABLE IF EXISTS `apps_sponsors`;

CREATE TABLE `apps_sponsors` (
  `serial_no` int(15) NOT NULL,
  `primary_sponsor` enum('Parent or Guardian','External or Scholarship') NOT NULL,
  `secondary_sponsor` enum('Parent or Guardian','External or Scholarship') NOT NULL,
  `alevel_sponsor` enum('Parent or Guardian','External or Scholarship') DEFAULT NULL,
  `current_sponsor` enum('Self','Parent or Guardian','External or Scholarship') DEFAULT NULL,
  `guardian_sponsor` varchar(20) DEFAULT NULL,
  `scholarship` text,
  PRIMARY KEY (`serial_no`),
  CONSTRAINT `apps_sponsors_ibfk_1` FOREIGN KEY (`serial_no`) REFERENCES `apps_personal` (`serial_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `apps_sponsors` */

insert  into `apps_sponsors`(`serial_no`,`primary_sponsor`,`secondary_sponsor`,`alevel_sponsor`,`current_sponsor`,`guardian_sponsor`,`scholarship`) values (2,'Parent or Guardian','Parent or Guardian','','Parent or Guardian','',''),(5,'Parent or Guardian','External or Scholarship','','Parent or Guardian','',''),(236,'Parent or Guardian','Parent or Guardian','','Self','',''),(350,'Parent or Guardian','Parent or Guardian','','External or Scholarship','',''),(484,'Parent or Guardian','Parent or Guardian','','Parent or Guardian','',''),(554,'Parent or Guardian','Parent or Guardian','Parent or Guardian','','Parent','');

/*Table structure for table `beneficiary` */

DROP TABLE IF EXISTS `beneficiary`;

CREATE TABLE `beneficiary` (
  `serial_no` int(15) NOT NULL,
  `current_address` varchar(100) NOT NULL,
  `current_phone` varchar(20) NOT NULL,
  `current_mobile` varchar(20) DEFAULT NULL,
  `mature_date` date NOT NULL,
  `paid_amount` double DEFAULT NULL,
  `last_paid_amount` double DEFAULT NULL,
  `last_paid` date DEFAULT NULL,
  `outstanding_balance` double NOT NULL,
  `loan_grant` double NOT NULL,
  PRIMARY KEY (`serial_no`),
  CONSTRAINT `beneficiary_ibfk_1` FOREIGN KEY (`serial_no`) REFERENCES `apps_personal` (`serial_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `beneficiary` */

insert  into `beneficiary`(`serial_no`,`current_address`,`current_phone`,`current_mobile`,`mature_date`,`paid_amount`,`last_paid_amount`,`last_paid`,`outstanding_balance`,`loan_grant`) values (350,'Nkhoma University, P.O. Box 22, Lilongwe','+265881760662','','2019-10-04',NULL,NULL,NULL,279800,280000),(484,'Robert Blake, P/Bag 3, Dowa','+265998748516','0887459861','2019-11-03',NULL,NULL,NULL,199800,200000);

/*Table structure for table `department` */

DROP TABLE IF EXISTS `department`;

CREATE TABLE `department` (
  `dept_id` int(5) NOT NULL AUTO_INCREMENT,
  `dept_code` varchar(10) NOT NULL,
  `dept_name` varchar(100) NOT NULL,
  `faculty` int(5) NOT NULL,
  PRIMARY KEY (`dept_id`),
  KEY `faculty` (`faculty`),
  CONSTRAINT `department_ibfk_1` FOREIGN KEY (`faculty`) REFERENCES `faculty` (`faculty_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `department` */

insert  into `department`(`dept_id`,`dept_code`,`dept_name`,`faculty`) values (1,'EH','Environmental Health',1),(2,'CIT','Computing and Information Technology',1),(3,'PBS','Physics and Biochemical Sciences',1),(4,'MAT','Mathematics and Statistics',1),(5,'ARC','Architecture',2),(6,'LAND','Land Surveying and Physical Planning',2),(8,'QS','Quantity Surveying and Land Economy',2),(9,'ACC','Accountancy',4),(10,'ADM','Business Administration',4),(11,'MAN','Management Studies',4),(12,'JOURN','Journalism',5),(13,'LANG','Language and Communication',5),(14,'TED','Technical Education',5),(15,'MEC','Mechanical Engineering',3),(16,'MINE','Mining Engineering',3),(17,'CIV','Civil Engineering',3),(18,'ELE','Electrical Engineering',3);

/*Table structure for table `district` */

DROP TABLE IF EXISTS `district`;

CREATE TABLE `district` (
  `district_id` int(14) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `region` enum('Nothern','Central','Southern') NOT NULL,
  PRIMARY KEY (`district_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Data for the table `district` */

insert  into `district`(`district_id`,`name`,`region`) values (1,'Balaka','Southern'),(2,'Blantyre','Southern'),(3,'Chikwawa','Southern'),(4,'Chiradzulu','Southern'),(5,'Chitipa','Nothern'),(6,'Dedza','Central'),(7,'Dowa','Central'),(8,'Karonga','Nothern'),(9,'Kasungu','Central'),(10,'Likoma','Nothern'),(11,'Lilongwe','Central'),(12,'Machinga','Southern'),(13,'Mangochi','Southern'),(14,'Mchinji','Central'),(15,'Mulanje','Southern'),(16,'Mwanza','Southern'),(17,'Mzimba','Nothern'),(18,'Neno','Southern'),(19,'Nkhata Bay','Nothern'),(20,'Nkhotakota','Central'),(21,'Nsanje','Southern'),(22,'Ntcheu','Central'),(23,'Ntchisi','Central'),(24,'Phalombe','Southern'),(25,'Rumphi','Nothern'),(26,'Salima','Central'),(27,'Thyolo','Southern'),(28,'Zomba','Southern');

/*Table structure for table `faculty` */

DROP TABLE IF EXISTS `faculty`;

CREATE TABLE `faculty` (
  `faculty_id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`faculty_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `faculty` */

insert  into `faculty`(`faculty_id`,`name`) values (1,'Applied Sciences'),(2,'Built Environment'),(3,'Engineering'),(4,'Commerce'),(5,'Education and Media Studies');

/*Table structure for table `program` */

DROP TABLE IF EXISTS `program`;

CREATE TABLE `program` (
  `prog_id` int(5) NOT NULL AUTO_INCREMENT,
  `prog_code` varchar(10) NOT NULL,
  `prog_name` varchar(200) NOT NULL,
  `dept_id` int(5) NOT NULL,
  PRIMARY KEY (`prog_id`),
  KEY `department_id` (`dept_id`),
  CONSTRAINT `program_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `program` */

insert  into `program`(`prog_id`,`prog_code`,`prog_name`,`dept_id`) values (1,'EH','Bachelor of Science in Environmental Health - 4 years',1),(2,'EST','Bachelor of Science in Environmental Science and Technology - 4 years',3),(3,'BIT','Bachelor of Science in Information Technology - 4 years',2),(4,'BIS','Bachelor of Science in Management Information Systems - 4 years',2),(5,'MSE','Bachelor of Science in Mathematical Science Education - 4 years',4),(6,'BARC','Bachelor of Science in Architectural Studies - 4 years',5),(7,'BLE','Bachelor of Science in Land Economy - 5 years',8),(8,'BLS','Bachelor of Science in Land Surveying - 5 years',6),(9,'BPP','Bachelor of Science in Physical Planning - 5 years',6),(10,'BQS','Bachelor of Science in Quantity Surveying - 5 years',8),(11,'BAC','Bachelor of Accountancy - 4 years',9),(12,'BBA','Bachelor of Business Administration - 4 years',10),(13,'BBC','Bachelor of Arts (Business Communication) - 4 years',13),(14,'EBS','Bachelor of Education (Business Studies) - 4 years',13),(15,'TED','Bachelor of Education/Science (Technical) - 4 years',14),(16,'BAJ','Bachelor of Arts in Journalism - 4 years',12),(17,'BAE','Bachelor of Automobile Engineering (Hons) - 5 years',15),(18,'BCET','Bachelor of Civil Engineering (Transportation) (Hons) - 5 years',17),(19,'BCEW','Bachelor of Civil Engineering (Water) (Hons) - 5 years',17),(20,'BCES','Bachelor of Civil Engineering (Structures) (Hons) - 5 years',17),(21,'BEEE','Bachelor of Electrical and Electronics Engineering (Hons) - 5 years',18),(22,'BECE','Bachelor of Electronics and Computer Engineering (Hons) - 5 years',18),(23,'BETE','Bachelor of Electronics and Telecommunication Engineering (Hons) - 5 years',18),(24,'BEEN','Bachelor of Energy Engineering (Hons) - 5 years',16),(25,'BIE','Bachelor of Industrial Engineering (Hons) - 5 years',16),(26,'BME','Bachelor of Mechanical Engineering (Hons) 5 years',15);

/*Table structure for table `registered_apps` */

DROP TABLE IF EXISTS `registered_apps`;

CREATE TABLE `registered_apps` (
  `serial_no` int(14) NOT NULL,
  `reg_number` varchar(20) NOT NULL,
  PRIMARY KEY (`serial_no`),
  KEY `reg_number` (`reg_number`),
  CONSTRAINT `registered_apps_ibfk_1` FOREIGN KEY (`serial_no`) REFERENCES `apps_personal` (`serial_no`),
  CONSTRAINT `registered_apps_ibfk_2` FOREIGN KEY (`reg_number`) REFERENCES `apps_admission` (`reg_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `registered_apps` */

insert  into `registered_apps`(`serial_no`,`reg_number`) values (2,'EBS/13/PE/012'),(5,'TED/14/PE/021');

/*Table structure for table `scores` */

DROP TABLE IF EXISTS `scores`;

CREATE TABLE `scores` (
  `serial_no` int(14) NOT NULL,
  `total_score` double DEFAULT NULL,
  `repeat_score` double DEFAULT NULL,
  `registered_score` double DEFAULT NULL,
  `gender_score` double DEFAULT NULL,
  `income_score` double DEFAULT NULL,
  `expen_score` double DEFAULT NULL,
  `credibility_score` double DEFAULT NULL,
  PRIMARY KEY (`serial_no`),
  CONSTRAINT `scores_ibfk_1` FOREIGN KEY (`serial_no`) REFERENCES `apps_personal` (`serial_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `scores` */

insert  into `scores`(`serial_no`,`total_score`,`repeat_score`,`registered_score`,`gender_score`,`income_score`,`expen_score`,`credibility_score`) values (2,5.5,0,0,0.8,0.1,4,0.6),(5,5.4,0,0,0.8,1,3,0.6),(236,8.8,0,1,0.8,5,2,0),(350,11,0,1,1,5,4,0),(484,6.5,0,1,0.8,0.1,4,0.6),(554,11,0,1,1,5,4,0);

/*Table structure for table `staff` */

DROP TABLE IF EXISTS `staff`;

CREATE TABLE `staff` (
  `staff_id` int(5) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `mobile_number` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `position` enum('board_member','data_entry','user') NOT NULL,
  `serial_no` int(15) DEFAULT NULL,
  PRIMARY KEY (`staff_id`),
  UNIQUE KEY `usernames` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `staff` */

insert  into `staff`(`staff_id`,`firstname`,`surname`,`username`,`password`,`phone_number`,`mobile_number`,`email`,`address`,`position`,`serial_no`) values (1,'Chisomo','Kalumbe','2093','e10adc3949ba59abbe56e057f20f883e','+265993480047','+26584453507','chisomokalumbe@outlook.com','P/Bag 303, Chichiri, Blantyre 4','board_member',NULL),(2,'Marion','Ghambi','Maliyoni','e10adc3949ba59abbe56e057f20f883e','+265999999999','+265888888888','muva@me.bae','Mpingwe G02','data_entry',NULL),(3,'Chimwemwe','Muva','BaeMuva','e10adc3949ba59abbe56e057f20f883e','+265888777888','','muva@neba.bae','Sports Council','user',554),(5,'Vwiyanipo','Nyachinga','Nyachinga','e10adc3949ba59abbe56e057f20f883e','+265881760662','+26584453507','bandaestherr@gmail.com','P/Bag 303, Chichiri, Blantyre 4','board_member',NULL),(6,'Maliyoni','Ghambi','marrion','e10adc3949ba59abbe56e057f20f883e','0881450999','+8147852344','marrion@poly.ac.mw','P/Bag 303, Chichiri, Blantyre 6','data_entry',NULL),(7,'Luciano','Mickman','Lusiyano','81dc9bdb52d04dc20036dbd8313ed055','+265994321548','0993570004','lucie@gmail.com','P.O. Box 25, Chitawira','user',5),(9,'Esther','Banda','A Val','e10adc3949ba59abbe56e057f20f883e','+265881760662','','bandaestherr@gmail.com','Nkhoma University, P.O. Box 22, Lilongwe','user',350);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
