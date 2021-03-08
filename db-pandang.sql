/*
SQLyog Community v12.3.3 (64 bit)
MySQL - 10.1.16-MariaDB : Database - pandangistana
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id_admin` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(35) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `poto` varchar(250) DEFAULT NULL,
  `owner` varchar(30) DEFAULT NULL,
  `level` int(11) DEFAULT '3',
  `telp` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `id_parent` int(11) DEFAULT NULL,
  `tgl` datetime DEFAULT NULL,
  `ip` varchar(25) DEFAULT NULL,
  `mode` int(11) DEFAULT '1',
  `last_login` datetime DEFAULT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `sts_aktivasi` enum('enable','disable') DEFAULT 'enable',
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`id_admin`,`username`,`password`,`poto`,`owner`,`level`,`telp`,`alamat`,`email`,`id_parent`,`tgl`,`ip`,`mode`,`last_login`,`nip`,`sts_aktivasi`) values 
(2,'super','d5f7c193793bebc46740f05aed1f4cb2','2.gif','cepi cahyana',1,'085221288211','Subang','cv@dffdfd.h',NULL,NULL,NULL,1,NULL,'2147483647','enable'),
(20,'admin','21232f297a57a5a743894a0e4a801fc3','20200409055718___180557_620.jpg','admin',3,'-',NULL,'mail@gmail.com',NULL,'2016-07-01 13:38:40',NULL,0,NULL,'pandu.pandang','enable'),
(33,'distributor','dd7bcee161192cb8fba765eb595eba87','33.jpg','Dsitributor',13,'085221288',NULL,'cahyanacepi@gmail.com',NULL,'2020-04-07 16:23:49',NULL,1,NULL,'1993','enable'),
(35,'verifikasi','f2a2dc9c8f00c0aff80756a667123372','20200417161756_35__50.jpg','verifikasi',12,'0852228',NULL,'',NULL,NULL,NULL,1,'0000-00-00 00:00:00','1992','enable'),
(37,'distribusi','d41d8cd98f00b204e9800998ecf8427e','20200409075504_37__50.jpg','distribusi',13,'3434',NULL,NULL,NULL,NULL,NULL,1,NULL,'1994','disable'),
(38,'kasetpres','534bda04c4600f33bddca29b0b5b3ade','20200504184837_38__41___14092018112255.jpg','KASETPRES',16,'-',NULL,'cahyanacepi@gmail.com',NULL,'2020-05-04 00:13:29',NULL,1,NULL,'1995','enable'),
(39,'pimpinan3','4adb41fef0b3e0c110d6f8c20eeb6c11','39.jpg','Pimpinan',16,'0000',NULL,'pimpinan3@gmail.com',NULL,'2020-05-20 17:29:52',NULL,1,NULL,'1996','enable');

/*Table structure for table `country` */

DROP TABLE IF EXISTS `country`;

CREATE TABLE `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(255) DEFAULT NULL,
  `country_code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=238 DEFAULT CHARSET=utf8;

/*Data for the table `country` */

insert  into `country`(`id`,`country_name`,`country_code`) values 
(1,'Albania','355'),
(2,'Algeria','213'),
(3,'American Samoa','1-684'),
(4,'Andorra','376'),
(5,'Angola','244'),
(6,'Anguilla','1-264'),
(7,'Antarctica','672'),
(8,'Antigua and Barbuda','1-268'),
(9,'Argentina','54'),
(10,'Armenia','374'),
(11,'Aruba','297'),
(12,'Australia','61'),
(13,'Austria','43'),
(14,'Azerbaijan','994'),
(15,'Bahamas','1-242'),
(16,'Bahrain','973'),
(17,'Bangladesh','880'),
(18,'Barbados','1-246'),
(19,'Belarus','375'),
(20,'Belgium','32'),
(21,'Belize','501'),
(22,'Benin','229'),
(23,'Bermuda','1-441'),
(24,'Bhutan','975'),
(25,'Bolivia','591'),
(26,'Bosnia and Herzegovina','387'),
(27,'Botswana','267'),
(28,'Brazil','55'),
(29,'British Indian Ocean Territory','246'),
(30,'British Virgin Islands','1-284'),
(31,'Brunei','673'),
(32,'Bulgaria','359'),
(33,'Burkina Faso','226'),
(34,'Burundi','257'),
(35,'Cambodia','855'),
(36,'Cameroon','237'),
(37,'Canada','1'),
(38,'Cape Verde','238'),
(39,'Cayman Islands','1-345'),
(40,'Central African Republic','236'),
(41,'Chad','235'),
(42,'Chile','56'),
(43,'China','86'),
(44,'Christmas Island','61'),
(45,'Cocos Islands','61'),
(46,'Colombia','57'),
(47,'Comoros','269'),
(48,'Cook Islands','682'),
(49,'Costa Rica','506'),
(50,'Croatia','385'),
(51,'Cuba','53'),
(52,'Curacao','599'),
(53,'Cyprus','357'),
(54,'Czech Republic','420'),
(55,'Democratic Republic of the Congo','243'),
(56,'Denmark','45'),
(57,'Djibouti','253'),
(58,'Dominica','1-767'),
(59,'East Timor','670'),
(60,'Ecuador','593'),
(61,'Egypt','20'),
(62,'El Salvador','503'),
(63,'Equatorial Guinea','240'),
(64,'Eritrea','291'),
(65,'Estonia','372'),
(66,'Ethiopia','251'),
(67,'Falkland Islands','500'),
(68,'Faroe Islands','298'),
(69,'Fiji','679'),
(70,'Finland','358'),
(71,'France','33'),
(72,'French Polynesia','689'),
(73,'Gabon','241'),
(74,'Gambia','220'),
(75,'Georgia','995'),
(76,'Germany','49'),
(77,'Ghana','233'),
(78,'Gibraltar','350'),
(79,'Greece','30'),
(80,'Greenland','299'),
(81,'Grenada','1-473'),
(82,'Guam','1-671'),
(83,'Guatemala','502'),
(84,'Guernsey','44-1481'),
(85,'Guinea','224'),
(86,'Guinea-Bissau','245'),
(87,'Guyana','592'),
(88,'Haiti','509'),
(89,'Honduras','504'),
(90,'Hong Kong','852'),
(91,'Hungary','36'),
(92,'Iceland','354'),
(93,'India','91'),
(94,'Indonesia','62'),
(95,'Iran','98'),
(96,'Iraq','964'),
(97,'Ireland','353'),
(98,'Israel','972'),
(99,'Italy','39'),
(100,'Ivory Coast','225'),
(101,'Jamaica','1-876'),
(102,'Japan','81'),
(103,'Jersey','44-1534'),
(104,'Jordan','962'),
(105,'Kazakhstan','7'),
(106,'Kenya','254'),
(107,'Kiribati','686'),
(108,'Kosovo','383'),
(109,'Kuwait','965'),
(110,'Kyrgyzstan','996'),
(111,'Laos','856'),
(112,'Latvia','371'),
(113,'Lebanon','961'),
(114,'Lesotho','266'),
(115,'Liberia','231'),
(116,'Libya','218'),
(117,'Liechtenstein','423'),
(118,'Lithuania','370'),
(119,'Luxembourg','352'),
(120,'Macau','853'),
(121,'Macedonia','389'),
(122,'Madagascar','261'),
(123,'Malawi','265'),
(124,'Malaysia','60'),
(125,'Maldives','960'),
(126,'Mali','223'),
(127,'Malta','356'),
(128,'Marshall Islands','692'),
(129,'Mauritania','222'),
(130,'Mauritius','230'),
(131,'Mayotte','262'),
(132,'Mexico','52'),
(133,'Micronesia','691'),
(134,'Moldova','373'),
(135,'Monaco','377'),
(136,'Mongolia','976'),
(137,'Montenegro','382'),
(138,'Montserrat','1-664'),
(139,'Morocco','212'),
(140,'Mozambique','258'),
(141,'Myanmar','95'),
(142,'Namibia','264'),
(143,'Nauru','674'),
(144,'Nepal','977'),
(145,'Netherlands','31'),
(146,'Netherlands Antilles','599'),
(147,'New Caledonia','687'),
(148,'New Zealand','64'),
(149,'Nicaragua','505'),
(150,'Niger','227'),
(151,'Nigeria','234'),
(152,'Niue','683'),
(153,'North Korea','850'),
(154,'Northern Mariana Islands','1-670'),
(155,'Norway','47'),
(156,'Oman','968'),
(157,'Pakistan','92'),
(158,'Palau','680'),
(159,'Palestine','970'),
(160,'Panama','507'),
(161,'Papua New Guinea','675'),
(162,'Paraguay','595'),
(163,'Peru','51'),
(164,'Philippines','63'),
(165,'Pitcairn','64'),
(166,'Poland','48'),
(167,'Portugal','351'),
(168,'Qatar','974'),
(169,'Republic of the Congo','242'),
(170,'Reunion','262'),
(171,'Romania','40'),
(172,'Russia','7'),
(173,'Rwanda','250'),
(174,'Saint Barthelemy','590'),
(175,'Saint Helena','290'),
(176,'Saint Kitts and Nevis','1-869'),
(177,'Saint Lucia','1-758'),
(178,'Saint Martin','590'),
(179,'Saint Pierre and Miquelon','508'),
(180,'Saint Vincent and the Grenadines','1-784'),
(181,'Samoa','685'),
(182,'San Marino','378'),
(183,'Sao Tome and Principe','239'),
(184,'Saudi Arabia','966'),
(185,'Senegal','221'),
(186,'Serbia','381'),
(187,'Seychelles','248'),
(188,'Sierra Leone','232'),
(189,'Singapore','65'),
(190,'Sint Maarten','1-721'),
(191,'Slovakia','421'),
(192,'Slovenia','386'),
(193,'Solomon Islands','677'),
(194,'Somalia','252'),
(195,'South Africa','27'),
(196,'South Korea','82'),
(197,'South Sudan','211'),
(198,'Spain','34'),
(199,'Sri Lanka','94'),
(200,'Sudan','249'),
(201,'Suriname','597'),
(202,'Svalbard and Jan Mayen','47'),
(203,'Swaziland','268'),
(204,'Sweden','46'),
(205,'Switzerland','41'),
(206,'Syria','963'),
(207,'Taiwan','886'),
(208,'Tajikistan','992'),
(209,'Tanzania','255'),
(210,'Thailand','66'),
(211,'Togo','228'),
(212,'Tokelau','690'),
(213,'Tonga','676'),
(214,'Trinidad and Tobago','1-868'),
(215,'Tunisia','216'),
(216,'Turkey','90'),
(217,'Turkmenistan','993'),
(218,'Turks and Caicos Islands','1-649'),
(219,'Tuvalu','688'),
(220,'U.S. Virgin Islands','1-340'),
(221,'Uganda','256'),
(222,'Ukraine','380'),
(223,'United Arab Emirates','971'),
(224,'United Kingdom','44'),
(225,'United States','1'),
(226,'Uruguay','598'),
(227,'Uzbekistan','998'),
(228,'Vanuatu','678'),
(229,'Vatican','379'),
(230,'Venezuela','58'),
(231,'Vietnam','84'),
(232,'Wallis and Futuna','681'),
(233,'Western Sahara','212'),
(234,'Yemen','967'),
(235,'Zambia','260'),
(236,'Zimbabwe','263'),
(237,'Afghanistan','93');

/*Table structure for table `data_persus` */

DROP TABLE IF EXISTS `data_persus`;

CREATE TABLE `data_persus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(100) DEFAULT NULL COMMENT 'kode otomatis',
  `nama` varchar(200) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `hp` varchar(20) DEFAULT NULL,
  `jml_pagi` int(11) DEFAULT NULL,
  `jml_sore` int(11) DEFAULT NULL,
  `sts_dispo` int(11) DEFAULT '2' COMMENT '1=sudah 2=belum 3=konsef',
  `sts_qrcode` int(11) DEFAULT '2' COMMENT '1=sudah 2=belum',
  `ket` text,
  `jenis_permohonan` tinyint(4) DEFAULT '2' COMMENT '2=persus 3=given',
  `diterima_tgl` datetime DEFAULT NULL,
  `diterima_oleh` varchar(100) DEFAULT NULL,
  `diterima_poto` varchar(100) DEFAULT NULL,
  `instansi` varchar(150) DEFAULT NULL,
  `notif` datetime DEFAULT NULL COMMENT 'jml kirim notifikasi',
  `_cid` int(11) DEFAULT NULL,
  `_ctime` datetime DEFAULT CURRENT_TIMESTAMP,
  `pengiriman` int(11) DEFAULT NULL COMMENT 'jnis penyerahan souvenir',
  `souvenir_1` int(11) DEFAULT NULL COMMENT 'vvip',
  `souvenir_2` int(11) DEFAULT NULL COMMENT 'vip',
  `souvenir_3` int(11) DEFAULT NULL COMMENT 'umum',
  `jadwal_distribusi` date DEFAULT NULL COMMENT 'if 0000-00-00=cetak label',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `data_persus` */

insert  into `data_persus`(`id`,`kode`,`nama`,`email`,`hp`,`jml_pagi`,`jml_sore`,`sts_dispo`,`sts_qrcode`,`ket`,`jenis_permohonan`,`diterima_tgl`,`diterima_oleh`,`diterima_poto`,`instansi`,`notif`,`_cid`,`_ctime`,`pengiriman`,`souvenir_1`,`souvenir_2`,`souvenir_3`,`jadwal_distribusi`) values 
(1,'5324695594','Bapak cv','cahyanacepi@gmail.com','085221288210',0,0,2,2,'tempat',2,'2020-08-20 12:38:52','Bapak cv',NULL,'',NULL,20,'2020-08-07 08:17:11',2,0,1,0,'2020-08-22'),
(2,'5974317563','Cepi cahyana','cahyanacepi@gmail.com','085221288210',0,0,2,2,'',2,NULL,NULL,NULL,'Kepala desa',NULL,20,'2020-08-20 12:44:21',NULL,1,2,3,'2020-08-22'),
(3,'2153896164','Bapak Sugeng Prayito','cahyanacepi@gmail.com','085221288210',0,0,2,2,'',2,NULL,NULL,NULL,'Kepala desa',NULL,20,'2020-08-20 12:58:22',NULL,5,6,2,'2020-08-23'),
(4,'8364453674','Cepi cahyana','cahyanacepi@gmail.com','085221288210',0,0,2,2,'',2,'2020-08-20 13:09:53','Cepi cahyana',NULL,'Kepala desa',NULL,20,'2020-08-20 13:05:12',2,0,1,0,'0000-00-00'),
(5,'2934747636','Bapak cv','cahyanacepi@gmail.com','085221288210',0,0,2,2,'',2,NULL,NULL,NULL,'',NULL,20,'2020-08-20 13:12:03',NULL,2,0,0,'2020-08-25'),
(6,'5693796241','Cepi cahyana','cahyanacepi@gmail.com','085221288210',0,0,2,2,'',2,NULL,NULL,NULL,'Kepala desa',NULL,20,'2020-08-20 13:14:21',NULL,0,1,0,'2020-08-26'),
(7,'6548573827','Cepi cahyana','cahyanacepi@gmail.com','085221288210',0,0,2,2,'',2,NULL,NULL,NULL,'Kepala desa',NULL,20,'2020-08-20 13:20:46',NULL,1,0,0,NULL),
(8,'6659938775','Bapak cv','cahyanacepi@gmail.com','085221288210',0,0,2,2,'',2,NULL,NULL,NULL,'',NULL,20,'2020-08-20 13:25:28',NULL,1,0,0,NULL),
(9,'4595276588','Cepi cahyana','cahyanacepi@gmail.com','085221288210',0,0,2,2,'',2,NULL,NULL,NULL,'',NULL,20,'2020-08-20 13:27:38',NULL,1,0,0,'2020-08-24');

/*Table structure for table `data_peserta` */

DROP TABLE IF EXISTS `data_peserta`;

CREATE TABLE `data_peserta` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nik` varchar(50) DEFAULT NULL,
  `kk` varchar(100) DEFAULT NULL,
  `tgl` datetime DEFAULT CURRENT_TIMESTAMP,
  `instansi` varchar(200) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `jk` varchar(1) DEFAULT NULL,
  `hp` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `alamat` varchar(350) DEFAULT NULL,
  `alasan_mengikuti` varchar(100) DEFAULT NULL,
  `foto` text,
  `foto_ktp` varchar(100) DEFAULT NULL,
  `foto_kk` varchar(100) DEFAULT NULL,
  `sts_kehadiran1` tinyint(4) DEFAULT '0' COMMENT '0=tidak 1=ya 2=hadir',
  `sts_kehadiran2` tinyint(4) DEFAULT '0' COMMENT '0=tidak 1=ya 2=hadir',
  `barcode1` varchar(50) DEFAULT NULL COMMENT 'barcode pagi',
  `barcode2` varchar(50) DEFAULT NULL COMMENT 'barcode sore',
  `barcode3` varchar(50) DEFAULT NULL COMMENT 'barcode rsuci',
  `jenis_acara` int(11) DEFAULT NULL COMMENT '1=pagi 2=sore 3=keduanya',
  `permohonan_awal` int(11) DEFAULT NULL COMMENT '1=pagi 2=sore 3=keduanya awal',
  `blok1` int(11) DEFAULT NULL,
  `blok2` int(11) DEFAULT NULL,
  `cekin1` varchar(20) DEFAULT NULL,
  `cekin2` varchar(20) DEFAULT NULL,
  `cekin3` varchar(20) DEFAULT NULL COMMENT 'cekin suci',
  `ket` text COMMENT 'class',
  `makan1` date DEFAULT NULL,
  `makan2` date NOT NULL,
  `sv1` date DEFAULT NULL,
  `sv2` date DEFAULT NULL,
  `pb1` date DEFAULT NULL,
  `pb2` date DEFAULT NULL,
  `no_surat` varchar(500) DEFAULT NULL,
  `gate` varchar(50) DEFAULT NULL,
  `rekap` tinyint(4) DEFAULT '0' COMMENT '0=ya 1=tidak',
  `id_kategory` tinyint(4) DEFAULT '1' COMMENT '1=umum 2=persus 3=given 4=acara suci',
  `_cid` int(11) DEFAULT NULL,
  `_ctime` datetime DEFAULT CURRENT_TIMESTAMP,
  `sts_acc` tinyint(4) DEFAULT '0' COMMENT '0=belum acc, 1=draft 2=fix 3=tolak',
  `sts_notif` tinyint(4) DEFAULT '0' COMMENT '1=sudah',
  `jadwal_distribusi` date DEFAULT NULL,
  `kode_persus` varchar(100) DEFAULT NULL,
  `id_kota` int(11) DEFAULT NULL,
  `id_provinsi` int(11) DEFAULT NULL,
  `diterima_oleh` varchar(100) DEFAULT NULL,
  `diterima_tgl` datetime DEFAULT NULL,
  `diterima_poto` varchar(100) DEFAULT NULL,
  `usia` int(11) DEFAULT NULL,
  `sts_verifikasi` tinyint(4) DEFAULT '0' COMMENT '0=belum 1=keep 2=finish',
  `id_alasan` int(11) DEFAULT NULL COMMENT 'alasan penolakan',
  `verifikator` int(11) DEFAULT NULL,
  `tgl_verifikasi` datetime DEFAULT NULL,
  `hps` tinyint(4) DEFAULT NULL COMMENT '1=hapus',
  `r_suci` tinyint(4) DEFAULT '2' COMMENT '1=ya',
  `sts_suci` tinyint(4) DEFAULT NULL COMMENT '1=ya 2=tolak',
  `join_url` text,
  PRIMARY KEY (`id`,`makan2`),
  KEY `id_peserta` (`id`,`sts_kehadiran2`,`barcode1`,`cekin1`,`nik`,`blok1`,`blok2`,`sts_acc`,`sts_notif`,`sts_verifikasi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `data_peserta` */

/*Table structure for table `data_peserta_rangkaian` */

DROP TABLE IF EXISTS `data_peserta_rangkaian`;

CREATE TABLE `data_peserta_rangkaian` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode_rangkaian` varchar(100) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `hp` varchar(20) DEFAULT NULL,
  `barcode` varchar(100) DEFAULT NULL,
  `sts_dispo` int(11) DEFAULT '2' COMMENT '1=sudah 2=belum 3=konsef',
  `sts_qrcode` int(11) DEFAULT '2' COMMENT '1=sudah 2=belum',
  `ket` text,
  `jenis_permohonan` tinyint(4) DEFAULT NULL,
  `diterima_tgl` datetime DEFAULT NULL,
  `diterima_oleh` varchar(100) DEFAULT NULL,
  `diterima_poto` varchar(100) DEFAULT NULL,
  `instansi` varchar(150) DEFAULT NULL,
  `_cid` int(11) DEFAULT NULL,
  `_ctime` datetime DEFAULT CURRENT_TIMESTAMP,
  `cekin` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `data_peserta_rangkaian` */

/*Table structure for table `data_rangkaian_acara` */

DROP TABLE IF EXISTS `data_rangkaian_acara`;

CREATE TABLE `data_rangkaian_acara` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(100) DEFAULT NULL COMMENT 'kode otomatis',
  `nama` varchar(200) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `hp` varchar(20) DEFAULT NULL,
  `jml` int(11) DEFAULT NULL COMMENT 'jml undangan awal',
  `sts_dispo` int(11) DEFAULT '2' COMMENT '1=sudah 2=belum 3=konsef',
  `sts_qrcode` int(11) DEFAULT '2' COMMENT '1=sudah 2=belum',
  `ket` text,
  `jenis_permohonan` tinyint(4) DEFAULT NULL,
  `diterima_tgl` datetime DEFAULT NULL,
  `diterima_oleh` varchar(100) DEFAULT NULL,
  `diterima_poto` varchar(100) DEFAULT NULL,
  `instansi` varchar(150) DEFAULT NULL,
  `_cid` int(11) DEFAULT NULL,
  `_ctime` datetime DEFAULT CURRENT_TIMESTAMP,
  `_uid` int(11) DEFAULT NULL,
  `_utime` datetime DEFAULT NULL,
  `notif` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `data_rangkaian_acara` */

/*Table structure for table `main_konfig` */

DROP TABLE IF EXISTS `main_konfig`;

CREATE TABLE `main_konfig` (
  `id_konfig` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `value` text,
  PRIMARY KEY (`id_konfig`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `main_konfig` */

insert  into `main_konfig`(`id_konfig`,`nama`,`value`) values 
(1,'Loggo','loggo.jpg'),
(2,'nama aplikasi','pandangISTANA'),
(3,'Tanggal Project','2020'),
(4,'query view','CREATE VIEW v_blok AS \r\nSELECT id,nama,jenis,color,target,\r\n(SELECT COUNT(*) FROM data_peserta WHERE blok1=tr_blok.id AND sts_acc!=3) AS jml\r\n FROM tr_blok WHERE jenis=1\r\n UNION ALL\r\n SELECT id,nama,jenis,color,target,\r\n(SELECT COUNT(*) FROM data_peserta WHERE blok2=tr_blok.id AND sts_acc!=3) AS jml\r\n FROM tr_blok WHERE jenis=2'),
(5,'Product By','Cepicahyana.com'),
(6,'Jenis Login','1'),
(8,'footer',''),
(7,'record log','1000');

/*Table structure for table `main_level` */

DROP TABLE IF EXISTS `main_level`;

CREATE TABLE `main_level` (
  `id_level` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) NOT NULL,
  `direct` text,
  `ket` text,
  PRIMARY KEY (`id_level`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `main_level` */

insert  into `main_level`(`id_level`,`nama`,`direct`,`ket`) values 
(1,'super','super','kelola keseluruhan'),
(2,'admin','data_dashboard','kelola data user'),
(3,'user','myevent/index','Penggunaan aplikasi'),
(12,'verifikator','verifikator','verifikator'),
(13,'distributor','distributor','Distributor'),
(14,'distributor_persus','distributor_persus','distributor_persus'),
(15,'inputor','inputor','inputor'),
(16,'leader','lead','lead'),
(17,'eksekutor','eksekutor',NULL);

/*Table structure for table `main_log` */

DROP TABLE IF EXISTS `main_log`;

CREATE TABLE `main_log` (
  `id_log` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_admin` int(11) DEFAULT NULL,
  `nama_user` varchar(56) DEFAULT NULL,
  `table_updated` varchar(25) DEFAULT NULL,
  `aksi` text,
  `tgl` datetime DEFAULT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `main_log` */

/*Table structure for table `main_menu` */

DROP TABLE IF EXISTS `main_menu`;

CREATE TABLE `main_menu` (
  `id_menu` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) DEFAULT NULL,
  `level` enum('1','2') DEFAULT NULL,
  `id_main` int(11) DEFAULT '0',
  `icon` varchar(25) DEFAULT NULL,
  `hak_akses` int(11) DEFAULT NULL,
  `link` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=MyISAM AUTO_INCREMENT=127 DEFAULT CHARSET=latin1;

/*Data for the table `main_menu` */

insert  into `main_menu`(`id_menu`,`nama`,`level`,`id_main`,`icon`,`hak_akses`,`link`) values 
(1,'Konfigurasi','1',0,'fa fa-cog',1,'super/konfig'),
(2,'User Group','1',0,'fa fa-users',1,'super/manajemen'),
(4,'Tracking Log','1',0,'fa fa-paw',1,'super/log'),
(3,'Data User','1',0,'fa fa-user',1,'super/data_user'),
(5,'Dashboard','1',0,'fa fa-dashboard',2,'data_dashboard'),
(7,'Event','1',1,'fa fa-calendar',3,'myevent'),
(118,'Permintaan Khusus/Given','1',0,'far fa-paper-plane',13,'penyerahan/persus'),
(100,'MyEvent','2',7,'fa fa-book',3,'myevent'),
(109,'Daftar Hadir','1',0,'fa fa-book',9,'operator/daftar_hadir'),
(12,'Create New','2',8,'fa fa-plus-square',3,'form'),
(13,'MyForm','2',8,'fa fa-files-o',3,'form/myform'),
(103,'Data User','1',0,'fa fa-user',2,'data_user'),
(105,'Data Event','1',0,'fa fa-trello',2,'data_event'),
(112,'Dashboard','1',0,'fa fa-home',12,'verifikator'),
(113,'Verifikasi','1',0,'far fa-paper-plane',12,'dispo_online'),
(114,'Dashboard','1',0,'fa fa-home',13,'distributor'),
(115,'Permohonan online','1',0,'far fa-paper-plane',13,'penyerahan'),
(116,'Dashboard','1',0,'fa fa-home',14,'distributor_persus'),
(117,'Penyerahan','1',0,'far fa-paper-plane',14,'distributor_persus/penyerahan'),
(119,'Rangkaian Acara lainnya','1',0,'far fa-paper-plane',13,'penyerahan/lainnya'),
(120,'Dashboard','1',0,'fas fa-home',16,'home'),
(121,'Upacara HUT RI','1',0,'fas fa-desktop',16,'lead/hutri'),
(122,'Jadwal Distribusi','1',0,'fas fa-desktop',16,'lead/jadwal'),
(123,'Mapping Blok','1',0,'fas fa-desktop',16,'lead/blok');

/*Table structure for table `pegawai` */

DROP TABLE IF EXISTS `pegawai`;

CREATE TABLE `pegawai` (
  `subbagian` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `jeniskelamin` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `insinduk` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `bagian` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `deputi` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `nipbaru` varchar(255) CHARACTER SET latin1 NOT NULL,
  `niplama` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `eselon` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `biro` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `nmpeg` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `satorg` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `inskerja` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `jabatanakhir` varchar(1024) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

/*Data for the table `pegawai` */

insert  into `pegawai`(`subbagian`,`jeniskelamin`,`insinduk`,`bagian`,`deputi`,`email`,`nipbaru`,`niplama`,`eselon`,`biro`,`nmpeg`,`satorg`,`foto`,`inskerja`,`jabatanakhir`) values 
('Subbagian Pengelolaan Pusat Jaringan Data','Laki-Laki','Kementerian Sekretariat Negara','Bagian Infrastruktur dan Layanan Teknologi Informasi','','mufti.rizal@setneg.go.id','198206082005011001','1996','IV.a.','Biro Informasi dan Teknologi','Mufti Rizal, S.Kom., M.T.I.','Sekretariat Kementerian','18000485015012018090733.jpg','Kementerian Sekretariat Negara','Kepala Subbagian Pengelolaan Pusat Jaringan Data, Bagian Infrastruktur dan Layanan Teknologi Informasi, Biro Informasi dan Teknologi, Sekretariat Kementerian Sekretariat Negara'),
('Subbagian Otomasi Perkantoran','Perempuan','Kementerian Sekretariat Negara','Bagian Aplikasi Sistem Informasi','','rinasagita5202@gmail.com','198410022008012001','180005202','IV.a.','Biro Informasi dan Teknologi','Rina Sagita Wardany, S.T.','Sekretariat Kementerian','18000520211012018090126.jpg','Kementerian Sekretariat Negara','Kepala Subbagian Otomasi Perkantoran, Bagian Aplikasi Sistem Informasi, Biro Informasi dan Teknologi, Sekretariat Kementerian Sekretariat Negara'),
('','Laki-Laki','Kementerian Sekretariat Negara','Bagian Aplikasi Sistem Informasi','','abichristianto@gmail.com','199107252018011003','180005872','','Biro Informasi dan Teknologi','Abi Christianto, S.Kom.','Sekretariat Kementerian','19910725201801100328032018030231.jpg','Kementerian Sekretariat Negara','Pranata Komputer Ahli Pertama pada  Biro Informasi dan Teknologi, Sekretariat Kementerian'),
(NULL,NULL,NULL,NULL,NULL,NULL,'','pandu.pandang',NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `tm_alasan_penolakan` */

DROP TABLE IF EXISTS `tm_alasan_penolakan`;

CREATE TABLE `tm_alasan_penolakan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `alasan` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tm_alasan_penolakan` */

insert  into `tm_alasan_penolakan`(`id`,`alasan`) values 
(1,'Quota Habis'),
(2,'Data tidak sesuai');

/*Table structure for table `tm_pengaturan` */

DROP TABLE IF EXISTS `tm_pengaturan`;

CREATE TABLE `tm_pengaturan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pengaturan` varchar(100) DEFAULT NULL,
  `val` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;

/*Data for the table `tm_pengaturan` */

insert  into `tm_pengaturan`(`id`,`pengaturan`,`val`) values 
(1,'Target harian','1000'),
(2,'user mail','pandang.istana@setneg.go.id'),
(3,'pass mail','Pd10@2020'),
(4,'from mail','pandang.istana@setneg.go.id'),
(5,'token wa','vndgliTQsgRyDOhoL1CldRcCQ0Xfs0zS20LE02w2NDLYXAsANtIBmCwSvuFL3v8x'),
(6,'api wa pesan biasa','https://kacangan.wablas.com/api/send-message'),
(7,'konten wa','_*Bukti Pengambilan Undangan HUTRI-75*_\nKepada Yth Bapak/ibu/Saudara:\n{nama}\nNIK : {nik}\nSelamat permohonan anda untuk menghadiri upacara HUT RI-75 di istana negara telah disetujui.\\\n\n_*Perolehan undangan :*_\n{acara_penaikan}\n{acara_penurunan}\n{acara_renungan}\n\n_*Undangan dapat diambil pada :*_\nhari {waktu_pengambilan}\npukul 08.30 - 16.00 WIB.\n\n_*Persyaratan pengambilan*_\n- membawa KTP/tanda pengenal asli sesuai yang anda daftarkan.\n- Menunjukan bukti notifikasi pengambilan yang telah kami kirimkan ke Email,whatsapp dan sms.\n- Jika Undangan tidak diambil  lebih dari 3 hari dari tanggal pengambilan maka otomatis dibatalkan.\n- Alamat pengambilan undangan :\n{icon1}Kantor Sekretariat Negara\n{icon2}Jl. Veteran No.17-18, RT.2/RW.3, Gambir, Kecamatan Gambir, Kota Jakarta Pusat.\n\nTerimakasih atas partisipasi anda.'),
(8,'konetn wa penolakan','_*Informasi Undangan HUT RI-75*_\nKepada Yth Bapak/ibu/Saudara:\n{nama}\nNIK : {nik}\nMohon maaf permohonan undangan anda untuk menghadiri rangkaian acara HUT RI-75 di istana negara _*ditolak*_ dikarenakan _*{alasan}*_.\r\n\nTerimakasih atas partisipasi anda.'),
(9,'konten sms ok','[HUTRI-75 ISTANA NEGARA] \nSlmt permohonan undangan anda telah diterima dgn jadwal ambil Hari {waktu_pengambilan}, mohon cek email dan Wa. thanks'),
(10,'konten sms ditolak','[INFO HUTRI-75 ISTANA NEGARA] \r\nmohon maaf permohonan undangan anda ditolak selengkapnya periksa email/ whatsapp anda. terimakasih'),
(11,'api sms','https://kacangan.wablas.com/api/sms/send'),
(12,'token sms','f3KemVwbEbw9p8Zgl0WQOyeHOcUoJQLoMMf8BhOpYCsGJ1K9yFq40HgUXzy5EPre'),
(13,'api wa document','https://kacangan.wablas.com/api/send-document'),
(14,'link gambar','http://localhost/pandangistana'),
(15,'isi konten wa registrasi','_*Informasi Undangan HUT RI-75*_\nTerimakasih pendaftaran anda akan kami proses untuk informasi selanjutnya kami akan sampaikan melalui email dan whatsapp. terimakasih'),
(16,'isi konten sms registrasi','[INFO HUTRI-75 ISTANA NEGARA] \nTerimakasih permohonan anda akan kami proses untuk info selanjutnya akan kami sampaikan melalui email dan WA.'),
(17,'isi konten email pendaftaran','<center> Konfirmasi Pendaftaran </center>\r\nSelamat permohonan anda telah masuk dengan data sebagai berikut:<br>\r\n<table>\r\n    <tr>\r\n        <td>Nama pemohon</td><td>: {nama}</td>\r\n    </tr>\r\n    <tr>\r\n        <td>jenis kelamin</td><td>: {jk}</td>\r\n    </tr>\r\n     <tr>\r\n        <td>NIK</td><td>: {nik}</td>\r\n    </tr>\r\n     <tr>\r\n        <td>KK</td><td>: {kk}</td>\r\n    </tr>\r\n     <tr>\r\n        <td>Email</td><td>: {email}</td>\r\n    </tr>\r\n     <tr>\r\n        <td>Nomor Hp</td><td>: {hp}</td>\r\n    </tr>\r\n    <tr>\r\n        <td>Permohonan Undangan</td><td>: {permohonan}</td>\r\n    </tr>\r\n    \r\n</table>\r\n\r\nMohon tunggu informasi selanjutnya yang akan kami kirimkan melalui email dan whatsapp. terimakasih'),
(18,'mail host','192.168.1.9'),
(19,'mail port','25'),
(20,'mail SMTPSecure ','tls'),
(21,'email inputan rangkaian','<center> <b>Konfirmasi Pendaftaran</b> </center>\r\nPermohonan {undangan} anda telah kami terima dan sedang kami proses dengan data sebagai berikut:<br>\r\n<table>\r\n\r\n    <tr>\r\n        <td>Nama pemohon</td><td>: {nama}</td>\r\n    </tr>  \r\n<tr>\r\n        <td>Instansi</td><td>: {instansi}</td>\r\n    </tr>\r\n     \r\n    <tr>\r\n        <td>Jumlah permohonan </td><td>: {jml} Undangan</td>\r\n    </tr>\r\n    <tr>\r\n        <td>Kode permohon</td><td>: {kode}</td>\r\n    </tr>  \r\n</table>\r\n\r\nMohon tunggu informasi selanjutnya yang akan kami kirimkan melalui email dan whatsapp. terimakasih'),
(22,'wa inputan rangkaian','[INFO HUTRI-75 ISTANA NEGARA] \r\nPermohonan {undangan} anda telah kami terima dan sedang diproses.\\untuk info selanjutnya akan kami sampaikan melalui email dan WA.'),
(23,'sms inputan rangkaian','[INFO HUTRI-75 ISTANA NEGARA] \r\nPermohonan {undangan} anda sedang kami proses. info selanjutnya akan kami sampaikan melalui email dan WA.'),
(24,'email inputan persus','<center> <b>Konfirmasi Pendaftaran</b> </center>\r\nPermohonan {undangan} anda telah kami terima dan sedang kami proses dengan data sebagai berikut:<br>\r\n<table>\r\n\r\n    <tr>\r\n        <td>Nama pemohon</td><td>: {nama}</td>\r\n    </tr>  \r\n<tr>\r\n        <td>Instansi</td><td>: {instansi}</td>\r\n    </tr>\r\n     \r\n    <tr>\r\n        <td>Jumlah permohonan Pagi</td><td>: {jml_pagi} Undangan</td>\r\n    </tr>\r\n <tr>\r\n        <td>Jumlah permohonan Sore</td><td>: {jml_sore} Undangan</td>\r\n    </tr>\r\n    <tr>\r\n        <td>Kode permohon</td><td>: {kode}</td>\r\n    </tr>  \r\n</table>\r\n\r\nMohon tunggu informasi selanjutnya yang akan kami kirimkan melalui email dan whatsapp. terimakasih'),
(25,'wa inputan persus','[INFO HUTRI-75 ISTANA NEGARA] \r\nPermohonan  {undangan} anda telah kami terima dan sedang diproses.\\untuk info selanjutnya akan kami sampaikan melalui email dan WA.'),
(26,'sms inputan persus','[INFO HUTRI-75 ISTANA NEGARA] \r\nPermohonan {undangan} anda sedang kami proses. info selanjutnya akan kami sampaikan melalui email dan WA.'),
(27,'konten wa penolakan permohonan kecuali r.suci','_*Informasi Undangan HUT RI-75*_\\\r\nKepada Yth Bapak/ibu/Saudara:\\\r\n{nama}\\\r\nNIK : {nik}\\\r\nMohon maaf permohonan anda untuk menghadiri upacara HUT RI-75 di istana negara _*ditolak*_ dikarenakan _*{alasan}*_.\\\r\n\\\r\nadapun permohonan anda yang kami setujui hanya undangan _*Renungan Suci*_.\\\r\nUntuk informasi pengambilan undangan renungan suci akan kami informasikan kembali melalui email & whatsapp anda.\\\r\nTerimakasih atas partisipasi anda.'),
(28,'konten sms ditolak kecuali suci','[INFO HUTRI-75 ISTANA NEGARA] \r\nKami telah mengirimkan informasi permohonan undangan anda silahkan periksa email/whatsapp anda. terimakasih'),
(29,'penolakan wa renungan suci saja','_*Informasi Undangan HUT RI-75*_\\\r\nKepada Yth Bapak/ibu/Saudara:\\\r\n{nama}\\\r\nNIK : {nik}\\\r\nMohon maaf permohonan undangan anda untuk menghadiri acara renungan suci HUT RI-75 di istana negara _*ditolak*_ dikarenakan _*{alasan}*_.\\\r\n\\\r\nTerimakasih atas partisipasi anda.'),
(30,'konten sms ditolak hanya suci','[INFO HUTRI-75 ISTANA NEGARA] \r\nmohon maaf permohonan undangan anda ditolak selengkapnya periksa email/ whatsapp anda. terimakasih'),
(31,'acara HUT RI ke','75'),
(32,'konten wa pengambilan persus ','_*Informasi Undangan HUT RI-75*_\nKepada Yth Bapak/Ibu/Saudara {nama} permohonan undangan anda telah selesai diproses, silahkan untuk melakukan pengambilan pada hari dan jam kerja.\n\n_*Data pemohon*_\nNama pemohon : {nama}\nInstansi : {instansi}\nJenis Permohonan : {jenis}\nKode pendaftaran : {kode}\n\nMohon tunjukan salah satu notifikasi pengambilan yang kami kirim melalui Email,whatsapp dan sms ketika \nmelakukan pengambilan undangan.\nterimakasih.'),
(33,'konten sms pengambilan persus ','[INFO HUTRI-75 ISTANA NEGARA] \r\nKepada Yth {nama} permohonan undangan telah selesai diproses silahkan melakukan pengambilan. terimakasih'),
(34,'namadatabase','pandangistana'),
(35,'url pandang','http://bifhex.com'),
(36,'strukture table view',' CREATE OR REPLACE VIEW `v_blok` AS SELECT\r\n*,\r\n  (SELECT\r\n     COUNT(0)\r\n   FROM `data_peserta`\r\n   WHERE ((`data_peserta`.`blok1` = `tr_blok`.`id`)\r\n          AND (`data_peserta`.`sts_acc` <> 3) AND hps IS NULL )) AS `jml`\r\nFROM `tr_blok`\r\nWHERE (`tr_blok`.`jenis` = 1)UNION ALL SELECT\r\n                                         *,\r\n                                         (SELECT\r\n                                            COUNT(0)\r\n                                          FROM `data_peserta`\r\n                                          WHERE ((`data_peserta`.`blok2` = `tr_blok`.`id`)\r\n                                                 AND (`data_peserta`.`sts_acc` <> 3) AND hps IS NULL)) AS `jml`\r\n                                       FROM `tr_blok`\r\n                                       WHERE (`tr_blok`.`jenis` = 2);\r\n\r\n\r\nCREATE OR REPLACE VIEW `v_distribusi` AS \r\nSELECT \'blok\' AS `blok`,\'jml\' AS `jml`,\'jadwal_distribusi\' AS `jadwal_distribusi`,\r\n\'jenis\' AS `jenis` UNION ALL SELECT `data_peserta`.`blok1` AS `blok`,COUNT(0) AS `jml`,\r\n`data_peserta`.`jadwal_distribusi` AS `jadwal_distribusi`,1 AS `1` FROM `data_peserta` \r\nWHERE ((`data_peserta`.`jadwal_distribusi` IS NOT NULL) AND (`data_peserta`.`sts_acc` = 2) \r\nAND `data_peserta`.`blok1` IN (SELECT `tr_blok`.`id` FROM `tr_blok` WHERE (`tr_blok`.`jenis` = 1))) \r\nGROUP BY `data_peserta`.`blok1`,`data_peserta`.`jadwal_distribusi` UNION ALL SELECT `data_peserta`.`blok2` AS `blok`,\r\nCOUNT(0) AS `jml`,`data_peserta`.`jadwal_distribusi` AS `jadwal_distribusi`,2 AS `2` FROM `data_peserta` \r\nWHERE ((`data_peserta`.`jadwal_distribusi` IS NOT NULL) AND (`data_peserta`.`sts_acc` = 2) AND `data_peserta`.`blok2` \r\nIN (SELECT `tr_blok`.`id` FROM `tr_blok` WHERE (`tr_blok`.`jenis` = 2))) GROUP BY `data_peserta`.`blok2`,`data_peserta`.`jadwal_distribusi`;\r\n\r\n\r\n\r\n\r\n\r\n CREATE OR REPLACE VIEW  `v_kab` AS \r\nSELECT\r\n  `wil_kabupaten`.`id_kab`   AS `id_kab`,\r\n  `wil_kabupaten`.`id_prov`  AS `id_prov`,\r\n  `wil_kabupaten`.`nama`     AS `nama`,\r\n  `wil_kabupaten`.`id_jenis` AS `id_jenis`,\r\n  (SELECT\r\n     COUNT(0)\r\n   FROM `data_peserta`\r\n   WHERE ((`data_peserta`.`id_kota` = `wil_kabupaten`.`id_kab`)\r\n          AND (`data_peserta`.`id_kategory` = 1)\r\n          AND (`data_peserta`.`jenis_acara` IN(1,2,3))\r\n          AND (`data_peserta`.`sts_acc` <> 3))) AS `jml`\r\nFROM `wil_kabupaten`;\r\n\r\n\r\n\r\n CREATE OR REPLACE VIEW  `v_prov` AS \r\nSELECT\r\n  `wil_provinsi`.`id_prov` AS `id_prov`,\r\n  `wil_provinsi`.`nama`    AS `nama`,\r\n  (SELECT\r\n     COUNT(0)                 AS `jml`\r\n   FROM `data_peserta`\r\n   WHERE ((`data_peserta`.`id_provinsi` = `wil_provinsi`.`id_prov`)\r\n          AND (`data_peserta`.`id_kategory` = 1)\r\n		  AND (`data_peserta`.`jenis_acara` IN(1,2,3))\r\n          AND (`data_peserta`.`sts_acc` <> 3))) AS `jml`\r\nFROM `wil_provinsi`;\r\n\r\n\r\n CREATE OR REPLACE VIEW  `v_peserta` AS \r\nSELECT *,\r\n  IF((`delimiter`.`jenis_acara` = 3),2,1) AS `jml_undangan`\r\nFROM `data_peserta` `delimiter`;\r\n\r\n\r\n\r\nCREATE OR REPLACE VIEW `v_country` AS \r\nSELECT\r\n *,\r\n  (SELECT\r\n    COUNT(*) \r\n   FROM `zoom_data`\r\n   WHERE `zoom_data`.`id_negara` = `country`.`id`) AS jml\r\n        FROM `country`'),
(37,'polder upload','../pandang/'),
(38,'link poto pegawai','https://simsdm.setneg.go.id/picture/gambar/'),
(39,'mode undangan','2'),
(40,'notif email souvenir','- Undangan dapat diambil pada :<br>\nhari {tgl_ambil} pukul 08.30 - 16.00 WIB<br>\nAlamat : Kantor Sekretariat Negara<br>\nJl. Veteran No.17-18, RT.2/RW.3, Gambir, Kecamatan Gambir, Kota Jakarta Pusat.<br>\n- Membawa KTP Asli atau tanda pengenal yang didaftarkan.<br>\n- Menunjukan email ini saat pengambilan.'),
(41,'notif wa souvenir','_*Bukti Pengambilan Souvenir HUTRI-75*_\nKepada Yth Bapak/ibu/Saudara:\n{nama}\nemail : {email}\nNomor Hp : {hp}\nkode registrasi : {kode}\n\n_*Perolehan   :*_\n{perolehan}\n\n_*Jadwal pengambilan :*_\nhari {waktu_pengambilan}\npukul 08.30 - 16.00 WIB.\n\n_*Persyaratan pengambilan*_\n- membawa KTP/tanda pengenal asli sesuai yang anda daftarkan.\n- Menunjukan bukti notifikasi pengambilan yang telah kami kirimkan ke Email,whatsapp dan sms.\n- Jika Undangan tidak diambil  lebih dari 3 hari dari tanggal pengambilan maka otomatis dibatalkan.\n- Alamat pengambilan undangan :\n{icon1}Kantor Sekretariat Negara\n{icon2}Jl. Veteran No.17-18, RT.2/RW.3, Gambir, Kecamatan Gambir, Kota Jakarta Pusat.\n\nTerimakasih atas partisipasi anda.'),
(42,'notif sms souvenir','[HUTRI-75 ISTANA NEGARA] \nInformasi pengambilan souvenir anda Hari {waktu_pengambilan}, mohon cek email dan Wa. thanks'),
(43,'mode scan souvenir','1'),
(44,'registrasi','open'),
(45,'zoom_api_key','RSD3UIdtQPyfCuxzd7AMgQ'),
(46,'zoom_api_secret','y51PpAKJMaa0E41q0TQuPL9OEt60FKPkkDAp'),
(48,'konten  email vcon given','Yth. {nama}<br>\n<br>\nA. Tata Tertib Mengikuti Rapat Koordinasi Terbatas Pelaksanaan Vaksinasi Penanggulangan Pademi Corona Virus Disease 2019 (COVID-19) melalui videoconference, yang akan di selenggarakan pada hari Kamis, 27 November 2020, pukul 13.30 WIB:<br>\n<br>\nDiharapkan untuk Gubernur, Sekretaris Daerah,Kepala Dinas Kesehatan dan Kepala Dinas Komunikasi dan Informatika dapat berada dalam satu ruangan dengan menerapkan protokol kesehatan\n<ol>\n <li>Room zoom Acara Rapat Koordinasi Terbatas Pelaksanaan Vaksinasi Penanggulangan Pademi Corona Virus Disease 2019 (COVID-19) melalui videoconference;</li>\n <li>Untuk kepentingan keamanan videoconference, diharapkan tidak menyebarluaskan ke pihak yang tidak berkepentingan e-mail blast yang berisi link join videoconference;</li>\n <li>Link join videoconference hanya berlaku untuk satu orang/user;</li>\n <li>Diharapkan mulai join videoconference 30 menit sebelum acara dimulai;</li>\n <li>Peserta videoconference diharapkan mengikuti dengan khidmat.</li>\n</ol>\nB. Link Join Videoconference (link)\"KLIK DISINI\"(unlink)<br>\n<br>\nAtas perhatiannya, kami ucapkan terima kasih.<br>\n<br>\n<br>\nSEKRETARIAT PRESIDEN'),
(49,'subject email vcon given','informasi {nama} ...'),
(50,'konten  email vcon online','<strong>Yth. {nama}</strong><br>\n<br>\nTata Tertib Mengikuti Upacara Peringatan HUT Ke-75 Kemerdekaan RI Tahun 2020 melalui <em>videoconference:</em>\n<ol>\n <li>Untuk kepentingan keamanan <em>videoconference</em>, email yang berisi <em>link join videoconference </em>diharapkan tidak disebarluaskan ke pihak yang tidak berkepentingan;</li>\n <li><em>Link videoconference</em> hanya berlaku untuk satu orang/<em>user</em>;</li>\n <li>Diharapkan mulai bergabung pada <em>videoconference</em> 30 menit sebelum acara dimulai;</li>\n <li>Peserta <em>videoconference</em> diharapkan mengikuti dengan khidmat;</li>\n <li>Saat mengikuti <em>videoconference</em> diharapkan berada ditempat yang baik dan kondusif;</li>\n <li>Diharapkan saat <em>join videoconference </em>mengenakan pakaian dari daerah masing-masing;</li>\n <li><em>Host </em>berhak mengeluarkan peserta dari <em>room videoconference</em> apabila dianggap menggangu khidmatnya pelaksanaan upacara.</li>\n</ol>\n<strong><em>Link Join Videoconference</em> akan kami kirim pada E-mail </strong>{email}<strong>.</strong><br>\n<br>\nAtas perhatiannya, kami ucapkan terima kasih.<br>\n<br>\n<strong>BIRO PROTOKOL, SEKRETARIAT PRESIDEN<br>\n<br>\n{link}<br>\n<br>\n(link)klik disini(unlink)</strong>'),
(51,'subject email vcon online','broadcast online {nama}'),
(52,'konten wa vcon given','_*TESTING*_\n\nYth. Bapak/Ibu/Sdr {nama}\ndata anda :\nnama : {nama}\nemail : {email}\ninstansi {instansi} \njabatan {jabatan } \nkota : {kota}\n\n\nDengan hormat kami sampaikan bahwa kami akan mengirimkan dua email: \n1. *Tata Tertib mengikuti Upacara* Peringatan HUT Ke-75 Kemerdekaan RI Tahun 2020 melalui _*Videoconference*_\n2. *Email Tata Cara dan Link mengikuti Upacara* Peringatan HUT Ke-75 Kemerdekaan RI Tahun 2020 melalui _*Videoconference*_\nMohon cek E-mail Bapak/Ibu/Sdr.\n\nAtas perhatian , kami ucapkan terima kasih.\n\n*Biro Protokol, Sekretariat Presiden*\n\n {link}\n'),
(53,'konten wa vcon online','Yth. Bapak/Ibu/Sdr/i\n\nTerima kasih telah mengakses website pandangistana.setneg.go.id\n\nSelamat, data permohonan Bapak/Ibu/Sdr/i telah kami terima\nSelanjutnya, kami akan kirimkan dua pemberitahuan melalui e-mail yang berisi:\n\n1. Tata Tertib mengikuti Upacara Peringatan HUT Ke-75 Kemerdekaan RI Tahun 2020 melalui videoconference;\n2. _Link Zoom Meeting_ untuk mengikuti Upacara Peringatan HUT Ke-75 Kemerdekaan RI Tahun 2020 melalui _videoconference._\n\nDengan hormat, dimohon berkenan membuka e-mail {email}\n\nAtas perhatiannya, kami ucapkan terima kasih.\n\n*BIRO PROTOKOL, SEKRETARIAT PRESIDEN*\n\n\n{link}\n\n(link)klik disini(unlink)'),
(54,'konten email registrasi vcon indonesia','terimakasih ya'),
(55,'konten WA registrasi vcon indonesia','terimakasih sudah mendaftar'),
(56,'konten email registrasi vcon - english','thanks ya'),
(57,'konten wa registrasi vcon - english','thanks for registration'),
(58,'konten subject email vcon online - english','subject english..'),
(59,'konten email vcon online - english','konten email english..<br>\n{link} (link)klik disini(unlink)'),
(60,'konten wa vcon online - english','_*TESTING ENGLISH*_\n\nYth. Bapak/Ibu/Sdr {nama}\ndata anda :\nnama : {nama}\nemail : {email}\nkota : {kota}\n\n\nDengan hormat kami sampaikan bahwa kami akan mengirimkan dua email: \n1. *Tata Tertib mengikuti Upacara* Peringatan HUT Ke-75 Kemerdekaan RI Tahun 2020 melalui _*Videoconference*_\n2. *Email Tata Cara dan Link mengikuti Upacara* Peringatan HUT Ke-75 Kemerdekaan RI Tahun 2020 melalui _*Videoconference*_\nMohon cek E-mail Bapak/Ibu/Sdr.\n\nAtas perhatian , kami ucapkan terima kasih.\n\n*Biro Protokol, Sekretariat Presiden*\n\n{link}\n\n(link)klik disini(unlink)'),
(61,'tahun kegiatan','2020'),
(62,'teks penutupan','Mohon maaf kuota telah terpenuhi, ikuti upacara peringatan HUT ke-75 Kemerdekaan RI melalui live streaming / youtube setpres / live TV'),
(63,'konten email sertifikat','mail english'),
(64,'wa sertifikat','wa sertfikat oke'),
(65,'poto tempate sertifikat Indonesia','4649_9597_sertifikat-web.jpg'),
(66,'subject email sertifikat - INDONESIA','subjek email ok..'),
(67,'konten email sertifikat - ENGLISH','mail english'),
(68,'subject email sertifikat  - ENGLISH','s en'),
(69,'konten wa sertifikat - ENGLISH','wa en'),
(70,'poto tempate sertifikat inggris','9597_sertifikat-web.jpg'),
(71,'subject email registrasi',NULL),
(72,'link undangan img - indo','3279_201117-R10453274-CEPI_CAHYANA-34271.pdf'),
(73,'konten wa undangan - indo','wa indonesia\n{link}'),
(74,'subject undangan email - ind','subject email - indonesia'),
(75,'konten undangan email - ind','email - engsdd<br>\r\n{link}<br>\r\n(link)link(unlink)'),
(76,'link undangan img - engl','2327_hijau.pdf'),
(77,'konten wa undangan - eng','wa - engsdd\n{link}\n(link)klik sini(unlink)'),
(78,'subject undangan email - eng','sub email - engsddd'),
(79,'konten undangan email - eng','email - engsdd<br>\n{link}<br>\n(link)link(unlink)'),
(80,'Subject email registrasi online - vicon',NULL),
(81,'esign id_subscriber: ','78553b75-ff38-4817-a207-d8077588f97c'),
(82,'esign passphrase :','#1234qwer*'),
(83,'esign link curl:','https://esign.dev.setneg.go.id/api/sign/pdf?'),
(84,'esign text :','Dokumen ini ditandatangani secara elektronik.'),
(85,'given = wa sertifikat','whatsapp content....'),
(86,'given = subject email seritikat','subject mail'),
(87,'given = isi email sertifikat','konten mail'),
(88,'given = poto template setifikat','2432_Capture.JPG');

/*Table structure for table `tm_website` */

DROP TABLE IF EXISTS `tm_website`;

CREATE TABLE `tm_website` (
  `id` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tm_website` */

insert  into `tm_website`(`id`,`nama`,`value`) values 
(1,'logo',''),
(2,'background home','20200809173344_2___8915088223.jpg'),
(3,'background register','20200811102829_3__03b0b84d-bdae-40d9-92c6-ddc75a96d08f.jpg&oke=ok'),
(4,'slider home 1','20200811102518_4___8915088223.jpg'),
(5,'slider home 2',''),
(6,'slider home 3',''),
(7,'slider home 4',''),
(8,'slider home 5','20200809173744_8___8915088223.jpg'),
(9,'slider registration 1','20200811102539_9___8915088223.jpg&oke=ok'),
(10,'slider registration 2','20200811103113_10__2_SEMARANG.png&oke=ok'),
(11,'slider registration 3','20200811103126_11__50.jpgrrrrrg&oke=okggg'),
(12,'slider registration 4 ',''),
(13,'slider registration 5',''),
(14,'video home','gggproklamasi.mp4'),
(15,'path upload','../pandang/web/'),
(16,'link akses','http://localhost/pandang/web/');

/*Table structure for table `tr_blok` */

DROP TABLE IF EXISTS `tr_blok`;

CREATE TABLE `tr_blok` (
  `id` int(10) unsigned NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jenis` tinyint(4) DEFAULT NULL COMMENT '1=pagi 2=sore',
  `color` varchar(20) DEFAULT NULL,
  `target` int(11) DEFAULT '1000',
  `peruntukan` int(11) DEFAULT '1' COMMENT '1=umum',
  `link_gelang` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tr_blok` */

insert  into `tr_blok`(`id`,`nama`,`jenis`,`color`,`target`,`peruntukan`,`link_gelang`) values 
(11,'A',1,'teal',500,0,'2.jpg'),
(12,'B',1,'green',1000,0,'2.jpg'),
(13,'C',1,'red',500,0,'2.jpg'),
(14,'D',1,'orange',1000,0,'2.jpg'),
(15,'E',1,'cyan',1000,0,'2.jpg'),
(16,'F',1,'deep-orange',1000,1,'2.jpg'),
(17,'G',1,'orange',1000,1,'2.jpg'),
(18,'H',1,'red',1000,1,'2.jpg'),
(19,'I',1,'teal',1000,1,'2.jpg'),
(20,'J',1,'green',1000,1,'2.jpg'),
(21,'K',1,'red',1000,1,'2.jpg'),
(22,'M',1,'brown',1000,0,'2.jpg'),
(30,'A',2,'green',1000,0,'2.jpg'),
(31,'B',2,'blue',1000,0,'2.jpg'),
(32,'C',2,'red',1000,0,'20200610085236_32__Capture_-_Copy.JPG'),
(33,'D',2,'green',1000,0,'2.jpg'),
(34,'E',2,'red',1000,0,'2.jpg'),
(35,'F',2,'blue',1000,1,'2.jpg'),
(36,'G',2,'red',1000,1,'2.jpg'),
(37,'H',2,'brown',1000,1,'2.jpg'),
(38,'I',2,'blue',1000,1,'2.jpg'),
(39,'J',2,'grey',1000,1,'2.jpg'),
(40,'K',2,'red',1000,1,'2.jpg'),
(41,'M',2,'pink',1000,0,'2.jpg');

/*Table structure for table `tr_kategory` */

DROP TABLE IF EXISTS `tr_kategory`;

CREATE TABLE `tr_kategory` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varbinary(100) DEFAULT NULL,
  `quota` int(11) DEFAULT NULL,
  `link_gelang` varchar(50) DEFAULT NULL,
  `kode_awal` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tr_kategory` */

insert  into `tr_kategory`(`id`,`nama`,`quota`,`link_gelang`,`kode_awal`) values 
(1,'Umum',NULL,'2.jpg',NULL),
(2,'Persus',NULL,'2.jpg',NULL),
(3,'Given',NULL,'2.jpg',NULL),
(4,'Renungan suci',78,'20200610095239_4__Capture_-_Copy.JPG','44'),
(5,'Penyerahan tanda kehormatan (TKRI)',109,'2.jpg','55'),
(6,'Pengukuhan Paskibra',108,'2.jpg','66'),
(7,'Santap siang kenegaraan',101,'2.jpg','77'),
(8,'Ramah tamah',109,'20200610090344_8__Capture_-_Copy.JPG','88');

/*Table structure for table `tr_pekerjaan` */

DROP TABLE IF EXISTS `tr_pekerjaan`;

CREATE TABLE `tr_pekerjaan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `urut` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `english` varchar(100) DEFAULT NULL,
  `sts` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tr_pekerjaan` */

insert  into `tr_pekerjaan`(`id`,`urut`,`nama`,`english`,`sts`) values 
(1,1,'ASN (Aparatur Sipil Negara)','State Civil Apparatus',NULL),
(2,2,'TNI','Army / Police',NULL),
(3,4,'Pegawai Swasta','Private Employees',NULL),
(4,5,'Wartawan','Reporter',NULL),
(5,7,'Lainnya','Other',NULL),
(6,6,'Pelajar / Mahasiswa','Student',NULL),
(7,3,'POLRI',NULL,NULL);

/*Table structure for table `tr_pengiriman` */

DROP TABLE IF EXISTS `tr_pengiriman`;

CREATE TABLE `tr_pengiriman` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `default` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tr_pengiriman` */

insert  into `tr_pengiriman`(`id`,`nama`,`default`) values 
(1,'expedisi',0),
(2,'PIC',1),
(3,'Caraka',0);

/*Table structure for table `tr_souvenir` */

DROP TABLE IF EXISTS `tr_souvenir`;

CREATE TABLE `tr_souvenir` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `jml` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tr_souvenir` */

insert  into `tr_souvenir`(`id`,`nama`,`jml`) values 
(1,'VVIP',101),
(2,'VIP',102),
(3,'UMUM',103),
(4,'Undangan Pagi',50),
(5,'Undangan Sore',60);

/*Table structure for table `wil_kabupaten` */

DROP TABLE IF EXISTS `wil_kabupaten`;

CREATE TABLE `wil_kabupaten` (
  `id_kab` char(4) NOT NULL,
  `id_prov` char(2) NOT NULL,
  `nama` tinytext NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `jml` int(11) DEFAULT '0' COMMENT 'jml pemohon',
  PRIMARY KEY (`id_kab`),
  KEY `id_kab` (`id_kab`,`id_prov`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `wil_kabupaten` */

insert  into `wil_kabupaten`(`id_kab`,`id_prov`,`nama`,`id_jenis`,`jml`) values 
('1101','11','KAB. ACEH SELATAN',1,0),
('1102','11','KAB. ACEH TENGGARA',1,0),
('1103','11','KAB. ACEH TIMUR',1,0),
('1104','11','KAB. ACEH TENGAH',1,0),
('1105','11','KAB. ACEH BARAT',1,0),
('1106','11','KAB. ACEH BESAR',1,0),
('1107','11','KAB. PIDIE',1,0),
('1108','11','KAB. ACEH UTARA',1,0),
('1109','11','KAB. SIMEULUE',1,0),
('1110','11','KAB. ACEH SINGKIL',1,0),
('1111','11','KAB. BIREUEN',1,0),
('1112','11','KAB. ACEH BARAT DAYA',1,0),
('1113','11','KAB. GAYO LUES',1,0),
('1114','11','KAB. ACEH JAYA',1,0),
('1115','11','KAB. NAGAN RAYA',1,0),
('1116','11','KAB. ACEH TAMIANG',1,0),
('1117','11','KAB. BENER MERIAH',1,0),
('1118','11','KAB. PIDIE JAYA',1,0),
('1171','11','KOTA BANDA ACEH',2,0),
('1172','11','KOTA SABANG',2,0),
('1173','11','KOTA LHOKSEUMAWE',2,0),
('1174','11','KOTA LANGSA',2,0),
('1175','11','KOTA SUBULUSSALAM',2,0),
('1201','12','KAB. TAPANULI TENGAH',1,0),
('1202','12','KAB. TAPANULI UTARA',1,0),
('1203','12','KAB. TAPANULI SELATAN',1,0),
('1204','12','KAB. NIAS',1,0),
('1205','12','KAB. LANGKAT',1,0),
('1206','12','KAB. KARO',1,0),
('1207','12','KAB. DELI SERDANG',1,0),
('1208','12','KAB. SIMALUNGUN',1,0),
('1209','12','KAB. ASAHAN',1,0),
('1210','12','KAB. LABUHANBATU',1,0),
('1211','12','KAB. DAIRI',1,0),
('1212','12','KAB. TOBA SAMOSIR',1,0),
('1213','12','KAB. MANDAILING NATAL',1,0),
('1214','12','KAB. NIAS SELATAN',1,0),
('1215','12','KAB. PAKPAK BHARAT',1,0),
('1216','12','KAB. HUMBANG HASUNDUTAN',1,0),
('1217','12','KAB. SAMOSIR',1,0),
('1218','12','KAB. SERDANG BEDAGAI',1,0),
('1219','12','KAB. BATU BARA',1,0),
('1220','12','KAB. PADANG LAWAS UTARA',1,0),
('1221','12','KAB. PADANG LAWAS',1,0),
('1222','12','KAB. LABUHANBATU SELATAN',1,0),
('1223','12','KAB. LABUHANBATU UTARA',1,0),
('1224','12','KAB. NIAS UTARA',1,0),
('1225','12','KAB. NIAS BARAT',1,0),
('1271','12','KOTA MEDAN',2,0),
('1272','12','KOTA PEMATANG SIANTAR',2,0),
('1273','12','KOTA SIBOLGA',2,0),
('1274','12','KOTA TANJUNG BALAI',2,0),
('1275','12','KOTA BINJAI',2,0),
('1276','12','KOTA TEBING TINGGI',2,0),
('1277','12','KOTA PADANGSIDIMPUAN',2,0),
('1278','12','KOTA GUNUNGSITOLI',2,0),
('1301','13','KAB. PESISIR SELATAN',1,0),
('1302','13','KAB. SOLOK',1,0),
('1303','13','KAB. SIJUNJUNG',1,0),
('1304','13','KAB. TANAH DATAR',1,0),
('1305','13','KAB. PADANG PARIAMAN',1,0),
('1306','13','KAB. AGAM',1,0),
('1307','13','KAB. LIMA PULUH KOTA',1,0),
('1308','13','KAB. PASAMAN',1,0),
('1309','13','KAB. KEPULAUAN MENTAWAI',1,0),
('1310','13','KAB. DHARMASRAYA',1,0),
('1311','13','KAB. SOLOK SELATAN',1,0),
('1312','13','KAB. PASAMAN BARAT',1,0),
('1371','13','KOTA PADANG',2,0),
('1372','13','KOTA SOLOK',2,0),
('1373','13','KOTA SAWAHLUNTO',2,0),
('1374','13','KOTA PADANG PANJANG',2,0),
('1375','13','KOTA BUKITTINGGI',2,0),
('1376','13','KOTA PAYAKUMBUH',2,0),
('1377','13','KOTA PARIAMAN',2,0),
('1401','14','KAB. KAMPAR',1,0),
('1402','14','KAB. INDRAGIRI HULU',1,0),
('1403','14','KAB. BENGKALIS',1,0),
('1404','14','KAB. INDRAGIRI HILIR',1,0),
('1405','14','KAB. PELALAWAN',1,0),
('1406','14','KAB. ROKAN HULU',1,0),
('1407','14','KAB. ROKAN HILIR',1,0),
('1408','14','KAB. SIAK',1,0),
('1409','14','KAB. KUANTAN SINGINGI',1,0),
('1410','14','KAB. KEPULAUAN MERANTI',1,0),
('1471','14','KOTA PEKANBARU',2,0),
('1472','14','KOTA DUMAI',2,0),
('1501','15','KAB. KERINCI',1,0),
('1502','15','KAB. MERANGIN',1,0),
('1503','15','KAB. SAROLANGUN',1,0),
('1504','15','KAB. BATANGHARI',1,0),
('1505','15','KAB. MUARO JAMBI',1,0),
('1506','15','KAB. TANJUNG JABUNG BARAT',1,0),
('1507','15','KAB. TANJUNG JABUNG TIMUR',1,0),
('1508','15','KAB. BUNGO',1,0),
('1509','15','KAB. TEBO',1,0),
('1571','15','KOTA JAMBI',2,0),
('1572','15','KOTA SUNGAI PENUH',2,0),
('1601','16','KAB. OGAN KOMERING ULU',1,0),
('1602','16','KAB. OGAN KOMERING ILIR',1,0),
('1603','16','KAB. MUARA ENIM',1,0),
('1604','16','KAB. LAHAT',1,0),
('1605','16','KAB. MUSI RAWAS',1,0),
('1606','16','KAB. MUSI BANYUASIN',1,0),
('1607','16','KAB. BANYUASIN',1,0),
('1608','16','KAB. OGAN KOMERING ULU TIMUR',1,0),
('1609','16','KAB. OGAN KOMERING ULU SELATAN',1,0),
('1610','16','KAB. OGAN ILIR',1,0),
('1611','16','KAB. EMPAT LAWANG',1,0),
('1612','16','KAB. PENUKAL ABAB LEMATANG ILIR',1,0),
('1613','16','KAB. MUSI RAWAS UTARA',1,0),
('1671','16','KOTA PALEMBANG',2,0),
('1672','16','KOTA PAGAR ALAM',2,0),
('1673','16','KOTA LUBUK LINGGAU',2,0),
('1674','16','KOTA PRABUMULIH',2,0),
('1701','17','KAB. BENGKULU SELATAN',1,0),
('1702','17','KAB. REJANG LEBONG',1,0),
('1703','17','KAB. BENGKULU UTARA',1,0),
('1704','17','KAB. KAUR',1,0),
('1705','17','KAB. SELUMA',1,0),
('1706','17','KAB. MUKO MUKO',1,0),
('1707','17','KAB. LEBONG',1,0),
('1708','17','KAB. KEPAHIANG',1,0),
('1709','17','KAB. BENGKULU TENGAH',1,0),
('1771','17','KOTA BENGKULU',2,0),
('1801','18','KAB. LAMPUNG SELATAN',1,0),
('1802','18','KAB. LAMPUNG TENGAH',1,0),
('1803','18','KAB. LAMPUNG UTARA',1,0),
('1804','18','KAB. LAMPUNG BARAT',1,0),
('1805','18','KAB. TULANG BAWANG',1,0),
('1806','18','KAB. TANGGAMUS',1,0),
('1807','18','KAB. LAMPUNG TIMUR',1,0),
('1808','18','KAB. WAY KANAN',1,0),
('1809','18','KAB. PESAWARAN',1,0),
('1810','18','KAB. PRINGSEWU',1,0),
('1811','18','KAB. MESUJI',1,0),
('1812','18','KAB. TULANG BAWANG BARAT',1,0),
('1813','18','KAB. PESISIR BARAT',1,0),
('1871','18','KOTA BANDAR LAMPUNG',2,0),
('1872','18','KOTA METRO',2,0),
('1901','19','KAB. BANGKA',1,0),
('1902','19','KAB. BELITUNG',1,0),
('1903','19','KAB. BANGKA SELATAN',1,0),
('1904','19','KAB. BANGKA TENGAH',1,0),
('1905','19','KAB. BANGKA BARAT',1,0),
('1906','19','KAB. BELITUNG TIMUR',1,0),
('1971','19','KOTA PANGKAL PINANG',2,0),
('2101','21','KAB. BINTAN',1,0),
('2102','21','KAB. KARIMUN',1,0),
('2103','21','KAB. NATUNA',1,0),
('2104','21','KAB. LINGGA',1,0),
('2105','21','KAB. KEPULAUAN ANAMBAS',1,0),
('2171','21','KOTA BATAM',2,0),
('2172','21','KOTA TANJUNG PINANG',2,0),
('3101','31','KAB. ADM. KEP. SERIBU',1,0),
('3171','31','KOTA ADM. JAKARTA PUSAT',2,0),
('3172','31','KOTA ADM. JAKARTA UTARA',2,0),
('3173','31','KOTA ADM. JAKARTA BARAT',2,0),
('3174','31','KOTA ADM. JAKARTA SELATAN',2,0),
('3175','31','KOTA ADM. JAKARTA TIMUR',2,0),
('3201','32','KAB. BOGOR',1,0),
('3202','32','KAB. SUKABUMI',1,0),
('3203','32','KAB. CIANJUR',1,0),
('3204','32','KAB. BANDUNG',1,0),
('3205','32','KAB. GARUT',1,0),
('3206','32','KAB. TASIKMALAYA',1,0),
('3207','32','KAB. CIAMIS',1,0),
('3208','32','KAB. KUNINGAN',1,0),
('3209','32','KAB. CIREBON',1,0),
('3210','32','KAB. MAJALENGKA',1,0),
('3211','32','KAB. SUMEDANG',1,0),
('3212','32','KAB. INDRAMAYU',1,0),
('3213','32','KAB. SUBANG',1,0),
('3214','32','KAB. PURWAKARTA',1,0),
('3215','32','KAB. KARAWANG',1,0),
('3216','32','KAB. BEKASI',1,0),
('3217','32','KAB. BANDUNG BARAT',1,0),
('3218','32','KAB. PANGANDARAN',1,0),
('3271','32','KOTA BOGOR',2,0),
('3272','32','KOTA SUKABUMI',2,0),
('3273','32','KOTA BANDUNG',2,0),
('3274','32','KOTA CIREBON',2,0),
('3275','32','KOTA BEKASI',2,0),
('3276','32','KOTA DEPOK',2,0),
('3277','32','KOTA CIMAHI',2,0),
('3278','32','KOTA TASIKMALAYA',2,0),
('3279','32','KOTA BANJAR',2,0),
('3301','33','KAB. CILACAP',1,0),
('3302','33','KAB. BANYUMAS',1,0),
('3303','33','KAB. PURBALINGGA',1,0),
('3304','33','KAB. BANJARNEGARA',1,0),
('3305','33','KAB. KEBUMEN',1,0),
('3306','33','KAB. PURWOREJO',1,0),
('3307','33','KAB. WONOSOBO',1,0),
('3308','33','KAB. MAGELANG',1,0),
('3309','33','KAB. BOYOLALI',1,0),
('3310','33','KAB. KLATEN',1,0),
('3311','33','KAB. SUKOHARJO',1,0),
('3312','33','KAB. WONOGIRI',1,0),
('3313','33','KAB. KARANGANYAR',1,0),
('3314','33','KAB. SRAGEN',1,0),
('3315','33','KAB. GROBOGAN',1,0),
('3316','33','KAB. BLORA',1,0),
('3317','33','KAB. REMBANG',1,0),
('3318','33','KAB. PATI',1,0),
('3319','33','KAB. KUDUS',1,0),
('3320','33','KAB. JEPARA',1,0),
('3321','33','KAB. DEMAK',1,0),
('3322','33','KAB. SEMARANG',1,0),
('3323','33','KAB. TEMANGGUNG',1,0),
('3324','33','KAB. KENDAL',1,0),
('3325','33','KAB. BATANG',1,0),
('3326','33','KAB. PEKALONGAN',1,0),
('3327','33','KAB. PEMALANG',1,0),
('3328','33','KAB. TEGAL',1,0),
('3329','33','KAB. BREBES',1,0),
('3371','33','KOTA MAGELANG',2,0),
('3372','33','KOTA SURAKARTA',2,0),
('3373','33','KOTA SALATIGA',2,0),
('3374','33','KOTA SEMARANG',2,0),
('3375','33','KOTA PEKALONGAN',2,0),
('3376','33','KOTA TEGAL',2,0),
('3401','34','KAB. KULON PROGO',1,0),
('3402','34','KAB. BANTUL',1,0),
('3403','34','KAB. GUNUNG KIDUL',1,0),
('3404','34','KAB. SLEMAN',1,0),
('3471','34','KOTA YOGYAKARTA',2,0),
('3501','35','KAB. PACITAN',1,0),
('3502','35','KAB. PONOROGO',1,0),
('3503','35','KAB. TRENGGALEK',1,0),
('3504','35','KAB. TULUNGAGUNG',1,0),
('3505','35','KAB. BLITAR',1,0),
('3506','35','KAB. KEDIRI',1,0),
('3507','35','KAB. MALANG',1,0),
('3508','35','KAB. LUMAJANG',1,0),
('3509','35','KAB. JEMBER',1,0),
('3510','35','KAB. BANYUWANGI',1,0),
('3511','35','KAB. BONDOWOSO',1,0),
('3512','35','KAB. SITUBONDO',1,0),
('3513','35','KAB. PROBOLINGGO',1,0),
('3514','35','KAB. PASURUAN',1,0),
('3515','35','KAB. SIDOARJO',1,0),
('3516','35','KAB. MOJOKERTO',1,0),
('3517','35','KAB. JOMBANG',1,0),
('3518','35','KAB. NGANJUK',1,0),
('3519','35','KAB. MADIUN',1,0),
('3520','35','KAB. MAGETAN',1,0),
('3521','35','KAB. NGAWI',1,0),
('3522','35','KAB. BOJONEGORO',1,0),
('3523','35','KAB. TUBAN',1,0),
('3524','35','KAB. LAMONGAN',1,0),
('3525','35','KAB. GRESIK',1,0),
('3526','35','KAB. BANGKALAN',1,0),
('3527','35','KAB. SAMPANG',1,0),
('3528','35','KAB. PAMEKASAN',1,0),
('3529','35','KAB. SUMENEP',1,0),
('3571','35','KOTA KEDIRI',2,0),
('3572','35','KOTA BLITAR',2,0),
('3573','35','KOTA MALANG',2,0),
('3574','35','KOTA PROBOLINGGO',2,0),
('3575','35','KOTA PASURUAN',2,0),
('3576','35','KOTA MOJOKERTO',2,0),
('3577','35','KOTA MADIUN',2,0),
('3578','35','KOTA SURABAYA',2,0),
('3579','35','KOTA BATU',2,0),
('3601','36','KAB. PANDEGLANG',1,0),
('3602','36','KAB. LEBAK',1,0),
('3603','36','KAB. TANGERANG',1,0),
('3604','36','KAB. SERANG',1,0),
('3671','36','KOTA TANGERANG',2,0),
('3672','36','KOTA CILEGON',2,0),
('3673','36','KOTA SERANG',2,0),
('3674','36','KOTA TANGERANG SELATAN',2,0),
('5101','51','KAB. JEMBRANA',1,0),
('5102','51','KAB. TABANAN',1,0),
('5103','51','KAB. BADUNG',1,0),
('5104','51','KAB. GIANYAR',1,0),
('5105','51','KAB. KLUNGKUNG',1,0),
('5106','51','KAB. BANGLI',1,0),
('5107','51','KAB. KARANGASEM',1,0),
('5108','51','KAB. BULELENG',1,0),
('5171','51','KOTA DENPASAR',2,0),
('5201','52','KAB. LOMBOK BARAT',1,0),
('5202','52','KAB. LOMBOK TENGAH',1,0),
('5203','52','KAB. LOMBOK TIMUR',1,0),
('5204','52','KAB. SUMBAWA',1,0),
('5205','52','KAB. DOMPU',1,0),
('5206','52','KAB. BIMA',1,0),
('5207','52','KAB. SUMBAWA BARAT',1,0),
('5208','52','KAB. LOMBOK UTARA',1,0),
('5271','52','KOTA MATARAM',2,0),
('5272','52','KOTA BIMA',2,0),
('5301','53','KAB. KUPANG',1,0),
('5302','53','KAB TIMOR TENGAH SELATAN',1,0),
('5303','53','KAB. TIMOR TENGAH UTARA',1,0),
('5304','53','KAB. BELU',1,0),
('5305','53','KAB. ALOR',1,0),
('5306','53','KAB. FLORES TIMUR',1,0),
('5307','53','KAB. SIKKA',1,0),
('5308','53','KAB. ENDE',1,0),
('5309','53','KAB. NGADA',1,0),
('5310','53','KAB. MANGGARAI',1,0),
('5311','53','KAB. SUMBA TIMUR',1,0),
('5312','53','KAB. SUMBA BARAT',1,0),
('5313','53','KAB. LEMBATA',1,0),
('5314','53','KAB. ROTE NDAO',1,0),
('5315','53','KAB. MANGGARAI BARAT',1,0),
('5316','53','KAB. NAGEKEO',1,0),
('5317','53','KAB. SUMBA TENGAH',1,0),
('5318','53','KAB. SUMBA BARAT DAYA',1,0),
('5319','53','KAB. MANGGARAI TIMUR',1,0),
('5320','53','KAB. SABU RAIJUA',1,0),
('5321','53','KAB. MALAKA',1,0),
('5371','53','KOTA KUPANG',2,0),
('6101','61','KAB. SAMBAS',1,0),
('6102','61','KAB. MEMPAWAH',1,0),
('6103','61','KAB. SANGGAU',1,0),
('6104','61','KAB. KETAPANG',1,0),
('6105','61','KAB. SINTANG',1,0),
('6106','61','KAB. KAPUAS HULU',1,0),
('6107','61','KAB. BENGKAYANG',1,0),
('6108','61','KAB. LANDAK',1,0),
('6109','61','KAB. SEKADAU',1,0),
('6110','61','KAB. MELAWI',1,0),
('6111','61','KAB. KAYONG UTARA',1,0),
('6112','61','KAB. KUBU RAYA',1,0),
('6171','61','KOTA PONTIANAK',2,0),
('6172','61','KOTA SINGKAWANG',2,0),
('6201','62','KAB. KOTAWARINGIN BARAT',1,0),
('6202','62','KAB. KOTAWARINGIN TIMUR',1,0),
('6203','62','KAB. KAPUAS',1,0),
('6204','62','KAB. BARITO SELATAN',1,0),
('6205','62','KAB. BARITO UTARA',1,0),
('6206','62','KAB. KATINGAN',1,0),
('6207','62','KAB. SERUYAN',1,0),
('6208','62','KAB. SUKAMARA',1,0),
('6209','62','KAB. LAMANDAU',1,0),
('6210','62','KAB. GUNUNG MAS',1,0),
('6211','62','KAB. PULANG PISAU',1,0),
('6212','62','KAB. MURUNG RAYA',1,0),
('6213','62','KAB. BARITO TIMUR',1,0),
('6271','62','KOTA PALANGKARAYA',2,0),
('6301','63','KAB. TANAH LAUT',1,0),
('6302','63','KAB. KOTABARU',1,0),
('6303','63','KAB. BANJAR',1,0),
('6304','63','KAB. BARITO KUALA',1,0),
('6305','63','KAB. TAPIN',1,0),
('6306','63','KAB. HULU SUNGAI SELATAN',1,0),
('6307','63','KAB. HULU SUNGAI TENGAH',1,0),
('6308','63','KAB. HULU SUNGAI UTARA',1,0),
('6309','63','KAB. TABALONG',1,0),
('6310','63','KAB. TANAH BUMBU',1,0),
('6311','63','KAB. BALANGAN',1,0),
('6371','63','KOTA BANJARMASIN',2,0),
('6372','63','KOTA BANJARBARU',2,0),
('6401','64','KAB. PASER',1,0),
('6402','64','KAB. KUTAI KARTANEGARA',1,0),
('6403','64','KAB. BERAU',1,0),
('6407','64','KAB. KUTAI BARAT',1,0),
('6408','64','KAB. KUTAI TIMUR',1,0),
('6409','64','KAB. PENAJAM PASER UTARA',1,0),
('6411','64','KAB. MAHAKAM ULU',1,0),
('6471','64','KOTA BALIKPAPAN',2,0),
('6472','64','KOTA SAMARINDA',2,0),
('6474','64','KOTA BONTANG',2,0),
('6501','65','KAB. BULUNGAN',1,0),
('6502','65','KAB. MALINAU',1,0),
('6503','65','KAB. NUNUKAN',1,0),
('6504','65','KAB. TANA TIDUNG',1,0),
('6571','65','KOTA TARAKAN',2,0),
('7101','71','KAB. BOLAANG MONGONDOW',1,0),
('7102','71','KAB. MINAHASA',1,0),
('7103','71','KAB. KEPULAUAN SANGIHE',1,0),
('7104','71','KAB. KEPULAUAN TALAUD',1,0),
('7105','71','KAB. MINAHASA SELATAN',1,0),
('7106','71','KAB. MINAHASA UTARA',1,0),
('7107','71','KAB. MINAHASA TENGGARA',1,0),
('7108','71','KAB. BOLAANG MONGONDOW UTARA',1,0),
('7109','71','KAB. KEP. SIAU TAGULANDANG BIARO',1,0),
('7110','71','KAB. BOLAANG MONGONDOW TIMUR',1,0),
('7111','71','KAB. BOLAANG MONGONDOW SELATAN',1,0),
('7171','71','KOTA MANADO',2,0),
('7172','71','KOTA BITUNG',2,0),
('7173','71','KOTA TOMOHON',2,0),
('7174','71','KOTA KOTAMOBAGU',2,0),
('7201','72','KAB. BANGGAI',1,0),
('7202','72','KAB. POSO',1,0),
('7203','72','KAB. DONGGALA',1,0),
('7204','72','KAB. TOLI TOLI',1,0),
('7205','72','KAB. BUOL',1,0),
('7206','72','KAB. MOROWALI',1,0),
('7207','72','KAB. BANGGAI KEPULAUAN',1,0),
('7208','72','KAB. PARIGI MOUTONG',1,0),
('7209','72','KAB. TOJO UNA UNA',1,0),
('7210','72','KAB. SIGI',1,0),
('7211','72','KAB. BANGGAI LAUT',1,0),
('7212','72','KAB. MOROWALI UTARA',1,0),
('7271','72','KOTA PALU',2,0),
('7301','73','KAB. KEPULAUAN SELAYAR',1,0),
('7302','73','KAB. BULUKUMBA',1,0),
('7303','73','KAB. BANTAENG',1,0),
('7304','73','KAB. JENEPONTO',1,0),
('7305','73','KAB. TAKALAR',1,0),
('7306','73','KAB. GOWA',1,0),
('7307','73','KAB. SINJAI',1,0),
('7308','73','KAB. BONE',1,0),
('7309','73','KAB. MAROS',1,0),
('7310','73','KAB. PANGKAJENE KEPULAUAN',1,0),
('7311','73','KAB. BARRU',1,0),
('7312','73','KAB. SOPPENG',1,0),
('7313','73','KAB. WAJO',1,0),
('7314','73','KAB. SIDENRENG RAPPANG',1,0),
('7315','73','KAB. PINRANG',1,0),
('7316','73','KAB. ENREKANG',1,0),
('7317','73','KAB. LUWU',1,0),
('7318','73','KAB. TANA TORAJA',1,0),
('7322','73','KAB. LUWU UTARA',1,0),
('7324','73','KAB. LUWU TIMUR',1,0),
('7326','73','KAB. TORAJA UTARA',1,0),
('7371','73','KOTA MAKASSAR',2,0),
('7372','73','KOTA PARE PARE',2,0),
('7373','73','KOTA PALOPO',2,0),
('7401','74','KAB. KOLAKA',1,0),
('7402','74','KAB. KONAWE',1,0),
('7403','74','KAB. MUNA',1,0),
('7404','74','KAB. BUTON',1,0),
('7405','74','KAB. KONAWE SELATAN',1,0),
('7406','74','KAB. BOMBANA',1,0),
('7407','74','KAB. WAKATOBI',1,0),
('7408','74','KAB. KOLAKA UTARA',1,0),
('7409','74','KAB. KONAWE UTARA',1,0),
('7410','74','KAB. BUTON UTARA',1,0),
('7411','74','KAB. KOLAKA TIMUR',1,0),
('7412','74','KAB. KONAWE KEPULAUAN',1,0),
('7413','74','KAB. MUNA BARAT',1,0),
('7414','74','KAB. BUTON TENGAH',1,0),
('7415','74','KAB. BUTON SELATAN',1,0),
('7471','74','KOTA KENDARI',2,0),
('7472','74','KOTA BAU BAU',2,0),
('7501','75','KAB. GORONTALO',1,0),
('7502','75','KAB. BOALEMO',1,0),
('7503','75','KAB. BONE BOLANGO',1,0),
('7504','75','KAB. PAHUWATO',1,0),
('7505','75','KAB. GORONTALO UTARA',1,0),
('7571','75','KOTA GORONTALO',2,0),
('7601','76','KAB. MAMUJU UTARA',1,0),
('7602','76','KAB. MAMUJU',1,0),
('7603','76','KAB. MAMASA',1,0),
('7604','76','KAB. POLEWALI MANDAR',1,0),
('7605','76','KAB. MAJENE',1,0),
('7606','76','KAB. MAMUJU TENGAH',1,0),
('8101','81','KAB. MALUKU TENGAH',1,0),
('8102','81','KAB. MALUKU TENGGARA',1,0),
('8103','81','KAB MALUKU TENGGARA BARAT',1,0),
('8104','81','KAB. BURU',1,0),
('8105','81','KAB. SERAM BAGIAN TIMUR',1,0),
('8106','81','KAB. SERAM BAGIAN BARAT',1,0),
('8107','81','KAB. KEPULAUAN ARU',1,0),
('8108','81','KAB. MALUKU BARAT DAYA',1,0),
('8109','81','KAB. BURU SELATAN',1,0),
('8171','81','KOTA AMBON',2,0),
('8172','81','KOTA TUAL',2,0),
('8201','82','KAB. HALMAHERA BARAT',1,0),
('8202','82','KAB. HALMAHERA TENGAH',1,0),
('8203','82','KAB. HALMAHERA UTARA',1,0),
('8204','82','KAB. HALMAHERA SELATAN',1,0),
('8205','82','KAB. KEPULAUAN SULA',1,0),
('8206','82','KAB. HALMAHERA TIMUR',1,0),
('8207','82','KAB. PULAU MOROTAI',1,0),
('8208','82','KAB. PULAU TALIABU',1,0),
('8271','82','KOTA TERNATE',2,0),
('8272','82','KOTA TIDORE KEPULAUAN',2,0),
('9101','91','KAB. MERAUKE',1,0),
('9102','91','KAB. JAYAWIJAYA',1,0),
('9103','91','KAB. JAYAPURA',1,0),
('9104','91','KAB. NABIRE',1,0),
('9105','91','KAB. KEPULAUAN YAPEN',1,0),
('9106','91','KAB. BIAK NUMFOR',1,0),
('9107','91','KAB. PUNCAK JAYA',1,0),
('9108','91','KAB. PANIAI',1,0),
('9109','91','KAB. MIMIKA',1,0),
('9110','91','KAB. SARMI',1,0),
('9111','91','KAB. KEEROM',1,0),
('9112','91','KAB PEGUNUNGAN BINTANG',1,0),
('9113','91','KAB. YAHUKIMO',1,0),
('9114','91','KAB. TOLIKARA',1,0),
('9115','91','KAB. WAROPEN',1,0),
('9116','91','KAB. BOVEN DIGOEL',1,0),
('9117','91','KAB. MAPPI',1,0),
('9118','91','KAB. ASMAT',1,0),
('9119','91','KAB. SUPIORI',1,0),
('9120','91','KAB. MAMBERAMO RAYA',1,0),
('9121','91','KAB. MAMBERAMO TENGAH',1,0),
('9122','91','KAB. YALIMO',1,0),
('9123','91','KAB. LANNY JAYA',1,0),
('9124','91','KAB. NDUGA',1,0),
('9125','91','KAB. PUNCAK',1,0),
('9126','91','KAB. DOGIYAI',1,0),
('9127','91','KAB. INTAN JAYA',1,0),
('9128','91','KAB. DEIYAI',1,0),
('9171','91','KOTA JAYAPURA',2,0),
('9201','92','KAB. SORONG',1,0),
('9202','92','KAB. MANOKWARI',1,0),
('9203','92','KAB. FAK FAK',1,0),
('9204','92','KAB. SORONG SELATAN',1,0),
('9205','92','KAB. RAJA AMPAT',1,0),
('9206','92','KAB. TELUK BINTUNI',1,0),
('9207','92','KAB. TELUK WONDAMA',1,0),
('9208','92','KAB. KAIMANA',1,0),
('9209','92','KAB. TAMBRAUW',1,0),
('9210','92','KAB. MAYBRAT',1,0),
('9211','92','KAB. MANOKWARI SELATAN',1,0),
('9212','92','KAB. PEGUNUNGAN ARFAK',1,0),
('9271','92','KOTA SORONG',2,0);

/*Table structure for table `wil_kecamatan` */

DROP TABLE IF EXISTS `wil_kecamatan`;

CREATE TABLE `wil_kecamatan` (
  `id_kec` char(6) NOT NULL,
  `id_kab` char(4) NOT NULL,
  `nama` tinytext NOT NULL,
  PRIMARY KEY (`id_kec`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `wil_kecamatan` */

insert  into `wil_kecamatan`(`id_kec`,`id_kab`,`nama`) values 
('110101','1101','Bakongan'),
('110102','1101','Kluet Utara'),
('110103','1101','Kluet Selatan'),
('110104','1101','Labuhan Haji'),
('110105','1101','Meukek'),
('110106','1101','Samadua'),
('110107','1101','Sawang'),
('110108','1101','Tapaktuan'),
('110109','1101','Trumon'),
('110110','1101','Pasi Raja'),
('110111','1101','Labuhan Haji Timur'),
('110112','1101','Labuhan Haji Barat'),
('110113','1101','Kluet Tengah'),
('110114','1101','Kluet Timur'),
('110115','1101','Bakongan Timur'),
('110116','1101','Trumon Timur'),
('110117','1101','Kota Bahagia'),
('110118','1101','Trumon Tengah'),
('110201','1102','Lawe Alas'),
('110202','1102','Lawe Sigala-Gala'),
('110203','1102','Bambel'),
('110204','1102','Babussalam'),
('110205','1102','Badar'),
('110206','1102','Babul Makmur'),
('110207','1102','Darul Hasanah'),
('110208','1102','Lawe Bulan'),
('110209','1102','Bukit Tusam'),
('110210','1102','Semadam'),
('110211','1102','Babul Rahmah'),
('110212','1102','Ketambe'),
('110213','1102','Deleng Pokhkisen'),
('110214','1102','Lawe Sumur'),
('110215','1102','Tanoh Alas'),
('110216','1102','Leuser'),
('110301','1103','Darul Aman'),
('110302','1103','Julok'),
('110303','1103','Idi Rayeuk'),
('110304','1103','Birem Bayeun'),
('110305','1103','Serbajadi'),
('110306','1103','Nurussalam'),
('110307','1103','Peureulak'),
('110308','1103','Rantau Selamat'),
('110309','1103','Simpang Ulim'),
('110310','1103','Rantau Peureulak'),
('110311','1103','Pante Bidari'),
('110312','1103','Madat'),
('110313','1103','Indra Makmu'),
('110314','1103','Idi Tunong'),
('110315','1103','Banda Alam'),
('110316','1103','Peudawa'),
('110317','1103','Peureulak Timur'),
('110318','1103','Peureulak Barat'),
('110319','1103','Sungai Raya'),
('110320','1103','Simpang Jernih'),
('110321','1103','Darul Ihsan'),
('110322','1103','Darul Falah'),
('110323','1103','Idi Timur'),
('110324','1103','Peunaron'),
('110401','1104','Linge'),
('110402','1104','Silih Nara'),
('110403','1104','Bebesen'),
('110407','1104','Pegasing'),
('110408','1104','Bintang'),
('110410','1104','Ketol'),
('110411','1104','Kebayakan'),
('110412','1104','Kute Panang'),
('110413','1104','Celala'),
('110417','1104','Laut Tawar'),
('110418','1104','Atu Lintang'),
('110419','1104','Jagong Jeget'),
('110420','1104','Bies'),
('110421','1104','Rusip Antara'),
('110501','1105','Johan Pahwalan'),
('110502','1105','Kaway XVI'),
('110503','1105','Sungai Mas'),
('110504','1105','Woyla'),
('110505','1105','Samatiga'),
('110506','1105','Bubon'),
('110507','1105','Arongan Lambalek'),
('110508','1105','Pante Ceureumen'),
('110509','1105','Meureubo'),
('110510','1105','Woyla Barat'),
('110511','1105','Woyla Timur'),
('110512','1105','Panton Reu'),
('110601','1106','Lhoong'),
('110602','1106','Lhoknga'),
('110603','1106','Indrapuri'),
('110604','1106','Seulimeum'),
('110605','1106','Montasik'),
('110606','1106','Sukamakmur'),
('110607','1106','Darul Imarah'),
('110608','1106','Peukan Bada'),
('110609','1106','Mesjid Raya'),
('110610','1106','Ingin Jaya'),
('110611','1106','Kuta Baro'),
('110612','1106','Darussalam'),
('110613','1106','Pulo Aceh'),
('110614','1106','Lembah Seulawah'),
('110615','1106','Kota Jantho'),
('110616','1106','Kota Cot Glie'),
('110617','1106','Kuta Malaka'),
('110618','1106','Simpang Tiga'),
('110619','1106','Darul Kamal'),
('110620','1106','Baitussalam'),
('110621','1106','Krueng Barona Jaya'),
('110622','1106','Leupung'),
('110623','1106','Blang Bintang'),
('110703','1107','Batee'),
('110704','1107','Delima'),
('110705','1107','Geumpang'),
('110706','1107','Geulumpang Tiga'),
('110707','1107','Indra Jaya'),
('110708','1107','Kembang Tanjong'),
('110709','1107','Kota Sigli'),
('110711','1107','Mila'),
('110712','1107','Muara Tiga'),
('110713','1107','Mutiara'),
('110714','1107','Padang Tiji'),
('110715','1107','Peukan Baro'),
('110716','1107','Pidie'),
('110717','1107','Sakti'),
('110718','1107','Simpang Tiga'),
('110719','1107','Tangse'),
('110721','1107','Tiro/Truseb'),
('110722','1107','Keumala'),
('110724','1107','Mutiara Timur'),
('110725','1107','Grong-grong'),
('110727','1107','Mane'),
('110729','1107','Glumpang Baro'),
('110731','1107','Titeue'),
('110801','1108','Baktiya'),
('110802','1108','Dewantara'),
('110803','1108','Kuta Makmur'),
('110804','1108','Lhoksukon'),
('110805','1108','Matangkuli'),
('110806','1108','Muara Batu'),
('110807','1108','Meurah Mulia'),
('110808','1108','Samudera'),
('110809','1108','Seunuddon'),
('110810','1108','Syamtalira Aron'),
('110811','1108','Syamtalira Bayu'),
('110812','1108','Tanah Luas'),
('110813','1108','Tanah Pasir'),
('110814','1108','T. Jambo Aye'),
('110815','1108','Sawang'),
('110816','1108','Nisam'),
('110817','1108','Cot Girek'),
('110818','1108','Langkahan'),
('110819','1108','Baktiya Barat'),
('110820','1108','Paya Bakong'),
('110821','1108','Nibong'),
('110822','1108','Simpang Kramat'),
('110823','1108','Lapang'),
('110824','1108','Pirak Timur'),
('110825','1108','Geuredong Pase'),
('110826','1108','Banda Baro'),
('110827','1108','Nisam Antara'),
('110901','1109','Simeulue Tengah'),
('110902','1109','Salang'),
('110903','1109','Teupah Barat'),
('110904','1109','Simeulue Timur'),
('110905','1109','Teluk Dalam'),
('110906','1109','Simeulue Barat'),
('110907','1109','Teupah Selatan'),
('110908','1109','Alapan'),
('110909','1109','Teupah Tengah'),
('110910','1109','Simeulue Cut'),
('111001','1110','Pulau Banyak'),
('111002','1110','Simpang Kanan'),
('111004','1110','Singkil'),
('111006','1110','Gunung Meriah'),
('111009','1110','Kota Baharu'),
('111010','1110','Singkil Utara'),
('111011','1110','Danau Paris'),
('111012','1110','Suro Makmur'),
('111013','1110','Singkohor'),
('111014','1110','Kuala Baru'),
('111016','1110','Pulau Banyak Barat'),
('111101','1111','Samalanga'),
('111102','1111','Jeunieb'),
('111103','1111','Peudada'),
('111104','1111','Jeumpa'),
('111105','1111','Peusangan'),
('111106','1111','Makmur'),
('111107','1111','Gandapura'),
('111108','1111','Pandrah'),
('111109','1111','Juli'),
('111110','1111','Jangka'),
('111111','1111','Simpang Mamplam'),
('111112','1111','Peulimbang'),
('111113','1111','Kota Juang'),
('111114','1111','Kuala'),
('111115','1111','Peusangan Siblah Krueng'),
('111116','1111','Peusangan Selatan'),
('111117','1111','Kuta Blang'),
('111201','1112','Blang Pidie'),
('111202','1112','Tangan-Tangan'),
('111203','1112','Manggeng'),
('111204','1112','Susoh'),
('111205','1112','Kuala Batee'),
('111206','1112','Babah Rot'),
('111207','1112','Setia'),
('111208','1112','Jeumpa'),
('111209','1112','Lembah Sabil'),
('111301','1113','Blangkejeren'),
('111302','1113','Kutapanjang'),
('111303','1113','Rikit Gaib'),
('111304','1113','Terangun'),
('111305','1113','Pining'),
('111306','1113','Blangpegayon'),
('111307','1113','Puteri Betung'),
('111308','1113','Dabun Gelang'),
('111309','1113','Blangjerango'),
('111310','1113','Teripe Jaya'),
('111311','1113','Pantan Cuaca'),
('111401','1114','Teunom'),
('111402','1114','Krueng Sabee'),
('111403','1114','Setia Bhakti'),
('111404','1114','Sampoiniet'),
('111405','1114','Jaya'),
('111406','1114','Panga'),
('111407','1114','Indra Jaya'),
('111408','1114','Darul Hikmah'),
('111409','1114','Pasie Raya'),
('111501','1115','Kuala'),
('111502','1115','Seunagan'),
('111503','1115','Seunagan Timur'),
('111504','1115','Beutong'),
('111505','1115','Darul Makmur'),
('111506','1115','Suka Makmue'),
('111507','1115','Kuala Pesisir'),
('111508','1115','Tadu Raya'),
('111509','1115','Tripa Makmur'),
('111510','1115','Beutong Ateuh Banggalang'),
('111601','1116','Manyak Payed'),
('111602','1116','Bendahara'),
('111603','1116','Karang Baru'),
('111604','1116','Seruway'),
('111605','1116','Kota Kualasinpang'),
('111606','1116','Kejuruan Muda'),
('111607','1116','Tamiang Hulu'),
('111608','1116','Rantau'),
('111609','1116','Banda Mulia'),
('111610','1116','Bandar Pusaka'),
('111611','1116','Tenggulun'),
('111612','1116','Sekerak'),
('111701','1117','Pintu Rime Gayo'),
('111702','1117','Permata'),
('111703','1117','Syiah Utama'),
('111704','1117','Bandar'),
('111705','1117','Bukit'),
('111706','1117','Wih Pesam'),
('111707','1117','Timang gajah'),
('111708','1117','Bener Kelipah'),
('111709','1117','Mesidah'),
('111710','1117','Gajah Putih'),
('111801','1118','Meureudu'),
('111802','1118','Ulim'),
('111803','1118','Jangka Buaya'),
('111804','1118','Bandar Dua'),
('111805','1118','Meurah Dua'),
('111806','1118','Bandar Baru'),
('111807','1118','Panteraja'),
('111808','1118','Trienggadeng'),
('117101','1171','Baiturrahman'),
('117102','1171','Kuta Alam'),
('117103','1171','Meuraxa'),
('117104','1171','Syiah Kuala'),
('117105','1171','Lueng Bata'),
('117106','1171','Kuta Raja'),
('117107','1171','Banda Raya'),
('117108','1171','Jaya Baru'),
('117109','1171','Ulee Kareng'),
('117201','1172','Sukakarya'),
('117202','1172','Sukajaya'),
('117301','1173','Muara Dua'),
('117302','1173','Banda Sakti'),
('117303','1173','Blang Mangat'),
('117304','1173','Muara Satu'),
('117401','1174','Langsa Timur'),
('117402','1174','Langsa Barat'),
('117403','1174','Langsa Kota'),
('117404','1174','Langsa Lama'),
('117405','1174','Langsa Baro'),
('117501','1175','Simpang Kiri'),
('117502','1175','Penanggalan'),
('117503','1175','Rundeng'),
('117504','1175','Sultan Daulat'),
('117505','1175','Longkib'),
('120101','1201','Barus'),
('120102','1201','Sorkam'),
('120103','1201','Pandan'),
('120104','1201','Pinangsori'),
('120105','1201','Manduamas'),
('120106','1201','Kolang'),
('120107','1201','Tapian Nauli'),
('120108','1201','Sibabangun'),
('120109','1201','Sosor Gadong'),
('120110','1201','Sorkam Barat'),
('120111','1201','Sirandorung'),
('120112','1201','Andam Dewi'),
('120113','1201','Sitahuis'),
('120114','1201','Tukka'),
('120115','1201','Badiri'),
('120116','1201','Pasaribu Tobing'),
('120117','1201','Barus Utara'),
('120118','1201','Suka Bangun'),
('120119','1201','Lumut'),
('120120','1201','Sarudik'),
('120201','1202','Tarutung'),
('120202','1202','Siatas Barita'),
('120203','1202','Adian Koting'),
('120204','1202','Sipoholon'),
('120205','1202','Pahae Julu'),
('120206','1202','Pahae Jae'),
('120207','1202','Simangumban'),
('120208','1202','Purba Tua'),
('120209','1202','Siborong-Borong'),
('120210','1202','Pagaran'),
('120211','1202','Parmonangan'),
('120212','1202','Sipahutar'),
('120213','1202','Pangaribuan'),
('120214','1202','Garoga'),
('120215','1202','Muara'),
('120301','1203','Angkola Barat'),
('120302','1203','Batang Toru'),
('120303','1203','Angkola Timur'),
('120304','1203','Sipirok'),
('120305','1203','Saipar Dolok Hole'),
('120306','1203','Angkola Selatan'),
('120307','1203','Batang Angkola'),
('120314','1203','Arse'),
('120320','1203','Marancar'),
('120321','1203','Sayur Matinggi'),
('120322','1203','Aek Bilah'),
('120329','1203','Muara Batang Toru'),
('120330','1203','Tano Tombangan Angkola'),
('120331','1203','Angkola Sangkunur'),
('120405','1204','Hiliduho'),
('120406','1204','Gido'),
('120410','1204','Idanogawo'),
('120411','1204','Bawolato'),
('120420','1204','Hiliserangkai'),
('120421','1204','Botomuzoi'),
('120427','1204','Ulugawo'),
('120428','1204','Ma\'u'),
('120429','1204','Somolo-molo'),
('120435','1204','Sogae\'adu'),
('120501','1205','Bahorok'),
('120502','1205','Salapian'),
('120503','1205','Kuala'),
('120504','1205','Sei Bingei'),
('120505','1205','Binjai'),
('120506','1205','Selesai'),
('120507','1205','Stabat'),
('120508','1205','Wampu'),
('120509','1205','Secanggang'),
('120510','1205','Hinai'),
('120511','1205','Tanjung Pura'),
('120512','1205','Padang Tualang'),
('120513','1205','Gebang'),
('120514','1205','Babalan'),
('120515','1205','Pangkalan Susu'),
('120516','1205','Besitang'),
('120517','1205','Sei Lepan'),
('120518','1205','Brandan Barat'),
('120519','1205','Batang Serangan'),
('120520','1205','Sawit Seberang'),
('120521','1205','Sirapit'),
('120522','1205','Kutambaru'),
('120523','1205','Pematang Jaya'),
('120601','1206','Kabanjahe'),
('120602','1206','Berastagi'),
('120603','1206','Barusjahe'),
('120604','1206','Tigapanah'),
('120605','1206','Merek'),
('120606','1206','Munte'),
('120607','1206','Juhar'),
('120608','1206','Tigabinanga'),
('120609','1206','Laubaleng'),
('120610','1206','Mardingding'),
('120611','1206','Payung'),
('120612','1206','Simpang Empat'),
('120613','1206','Kutabuluh'),
('120614','1206','Dolat Rayat'),
('120615','1206','Merdeka'),
('120616','1206','Naman Teran'),
('120617','1206','Tiganderket'),
('120701','1207','Gunung Meriah'),
('120702','1207','Tanjung Morawa'),
('120703','1207','Sibolangit'),
('120704','1207','Kutalimbaru'),
('120705','1207','Pancur Batu'),
('120706','1207','Namorambe'),
('120707','1207','Sibiru-biru'),
('120708','1207','STM Hilir'),
('120709','1207','Bangun Purba'),
('120719','1207','Galang'),
('120720','1207','STM Hulu'),
('120721','1207','Patumbak'),
('120722','1207','Deli Tua'),
('120723','1207','Sunggal'),
('120724','1207','Hamparan Perak'),
('120725','1207','Labuhan Deli'),
('120726','1207','Percut Sei Tuan'),
('120727','1207','Batang Kuis'),
('120728','1207','Lubuk Pakam'),
('120731','1207','Pagar Merbau'),
('120732','1207','Pantai Labu'),
('120733','1207','Beringin'),
('120801','1208','Siantar'),
('120802','1208','Gunung Malela'),
('120803','1208','Gunung Maligas'),
('120804','1208','Panei'),
('120805','1208','Panombeian Pane'),
('120806','1208','Jorlang Hataran'),
('120807','1208','Raya Kahean'),
('120808','1208','Bosar Maligas'),
('120809','1208','Sidamanik'),
('120810','1208','Pematang Sidamanik'),
('120811','1208','Tanah Jawa'),
('120812','1208','Hatonduhan'),
('120813','1208','Dolok Panribuan'),
('120814','1208','Purba'),
('120815','1208','Haranggaol Horison'),
('120816','1208','Girsang Sipangan Bolon'),
('120817','1208','Dolok Batu Nanggar'),
('120818','1208','Huta Bayu Raja'),
('120819','1208','Jawa Maraja Bah Jambi'),
('120820','1208','Dolok Pardamean'),
('120821','1208','Pematang Bandar'),
('120822','1208','Bandar Huluan'),
('120823','1208','Bandar'),
('120824','1208','Bandar Masilam'),
('120825','1208','Silimakuta'),
('120826','1208','Dolok Silau'),
('120827','1208','Silou Kahean'),
('120828','1208','Tapian Dolok'),
('120829','1208','Raya'),
('120830','1208','Ujung Padang'),
('120831','1208','Pamatang Silima Huta'),
('120908','1209','Meranti'),
('120909','1209','Air Joman'),
('120910','1209','Tanjung Balai'),
('120911','1209','Sei Kepayang'),
('120912','1209','Simpang Empat'),
('120913','1209','Air Batu'),
('120914','1209','Pulau Rakyat'),
('120915','1209','Bandar Pulau'),
('120916','1209','Buntu Pane'),
('120917','1209','Bandar Pasir Mandoge'),
('120918','1209','Aek Kuasan'),
('120919','1209','Kota Kisaran Barat'),
('120920','1209','Kota Kisaran Timur'),
('120921','1209','Aek Songsongan'),
('120922','1209','Rahunig'),
('120923','1209','Sei Dadap'),
('120924','1209','Sei Kepayang Barat'),
('120925','1209','Sei Kepayang Timur'),
('120926','1209','Tinggi Raja'),
('120927','1209','Setia Janji'),
('120928','1209','Silau Laut'),
('120929','1209','Rawang Panca Arga'),
('120930','1209','Pulo Bandring'),
('120931','1209','Teluk Dalam'),
('120932','1209','Aek Ledong'),
('121001','1210','Rantau Utara'),
('121002','1210','Rantau Selatan'),
('121007','1210','Bilah Barat'),
('121008','1210','Bilah Hilir'),
('121009','1210','Bilah Hulu'),
('121014','1210','Pangkatan'),
('121018','1210','Panai Tengah'),
('121019','1210','Panai Hilir'),
('121020','1210','Panai Hulu'),
('121101','1211','Sidikalang'),
('121102','1211','Sumbul'),
('121103','1211','Tigalingga'),
('121104','1211','Siempat Nempu'),
('121105','1211','Silima Pungga Punga'),
('121106','1211','Tanah Pinem'),
('121107','1211','Siempat Nempu Hulu'),
('121108','1211','Siempat Nempu Hilir'),
('121109','1211','Pegagan Hilir'),
('121110','1211','Parbuluan'),
('121111','1211','Lae Parira'),
('121112','1211','Gunung Sitember'),
('121113','1211','Brampu'),
('121114','1211','Silahisabungan'),
('121115','1211','Sitinjo'),
('121201','1212','Balige'),
('121202','1212','Laguboti'),
('121203','1212','Silaen'),
('121204','1212','Habinsaran'),
('121205','1212','Pintu Pohan Meranti'),
('121206','1212','Borbor'),
('121207','1212','Porsea'),
('121208','1212','Ajibata'),
('121209','1212','Lumban Julu'),
('121210','1212','Uluan'),
('121219','1212','Sigumpar'),
('121220','1212','Siantar Narumonda'),
('121221','1212','Nassau'),
('121222','1212','Tampahan'),
('121223','1212','Bonatua Lunasi'),
('121224','1212','Parmaksian'),
('121301','1213','Panyabungan'),
('121302','1213','Panyabungan Utara'),
('121303','1213','Panyabungan Timur'),
('121304','1213','Panyabungan Selatan'),
('121305','1213','Panyabungan Barat'),
('121306','1213','Siabu'),
('121307','1213','Bukit Malintang'),
('121308','1213','Kotanopan'),
('121309','1213','Lembah Sorik Marapi'),
('121310','1213','Tambangan'),
('121311','1213','Ulu Pungkut'),
('121312','1213','Muara Sipongi'),
('121313','1213','Batang Natal'),
('121314','1213','Lingga Bayu'),
('121315','1213','Batahan'),
('121316','1213','Natal'),
('121317','1213','Muara Batang Gadis'),
('121318','1213','Ranto Baek'),
('121319','1213','Huta Bargot'),
('121320','1213','Puncak Sorik Marapi'),
('121321','1213','Pakantan'),
('121322','1213','Sinunukan'),
('121323','1213','Naga Juang'),
('121401','1214','Lolomatua'),
('121402','1214','Gomo'),
('121403','1214','Lahusa'),
('121404','1214','Hibala'),
('121405','1214','Pulau-Pulau Batu'),
('121406','1214','Teluk Dalam'),
('121407','1214','Amandraya'),
('121408','1214','Lalowa\'u'),
('121409','1214','Susua'),
('121410','1214','Maniamolo'),
('121411','1214','Hilimegai'),
('121412','1214','Toma'),
('121413','1214','Mazino'),
('121414','1214','Umbunasi'),
('121415','1214','Aramo'),
('121416','1214','Pulau-Pulau Batu Timur'),
('121417','1214','Mazo'),
('121418','1214','Fanayama'),
('121419','1214','Ulunoyo'),
('121420','1214','Huruna'),
('121421','1214','O\'o\'u'),
('121422','1214','Onohazumba'),
('121423','1214','Hilisalawa\'ahe'),
('121424','1214','Ulususua'),
('121425','1214','Sidua\'ori'),
('121426','1214','Somambawa'),
('121427','1214','Boronadu'),
('121428','1214','Simuk'),
('121429','1214','Pulau-Pulau Batu Barat'),
('121430','1214','Pulau-Pulau Batu Utara'),
('121431','1214','Tanah Masa'),
('121501','1215','Sitelu Tali Urang Jehe'),
('121502','1215','Kerajaan'),
('121503','1215','Salak'),
('121504','1215','Sitelu Tali Urang Julu'),
('121505','1215','Pergetteng Getteng Sengkut'),
('121506','1215','Pagindar'),
('121507','1215','Tinada'),
('121508','1215','Siempat Rube'),
('121601','1216','Parlilitan'),
('121602','1216','Pollung'),
('121603','1216','Baktiraja'),
('121604','1216','Paranginan'),
('121605','1216','Lintong Nihuta'),
('121606','1216','Dolok Sanggul'),
('121607','1216','Sijamapolang'),
('121608','1216','Onan Ganjang'),
('121609','1216','Pakkat'),
('121610','1216','Tarabintang'),
('121701','1217','Simanindo'),
('121702','1217','Onan Runggu'),
('121703','1217','Nainggolan'),
('121704','1217','Palipi'),
('121705','1217','Harian'),
('121706','1217','Sianjar Mula Mula'),
('121707','1217','Ronggur Nihuta'),
('121708','1217','Pangururan'),
('121709','1217','Sitio-tio'),
('121801','1218','Pantai Cermin'),
('121802','1218','Perbaungan'),
('121803','1218','Teluk Mengkudu'),
('121804','1218','Sei. Rampah'),
('121805','1218','Tanjung Beringin'),
('121806','1218','Bandar Khalifah'),
('121807','1218','Dolok Merawan'),
('121808','1218','Sipispis'),
('121809','1218','Dolok Masihul'),
('121810','1218','Kotarih'),
('121811','1218','Silinda'),
('121812','1218','Serba Jadi'),
('121813','1218','Tebing Tinggi'),
('121814','1218','Pegajahan'),
('121815','1218','Sei Bamban'),
('121816','1218','Tebing Syahbandar'),
('121817','1218','Bintang Bayu'),
('121901','1219','Medang Deras'),
('121902','1219','Sei Suka'),
('121903','1219','Air Putih'),
('121904','1219','Lima Puluh'),
('121905','1219','Talawi'),
('121906','1219','Tanjung Tiram'),
('121907','1219','Sei Balai'),
('122001','1220','Dolok Sigompulon'),
('122002','1220','Dolok'),
('122003','1220','Halongonan'),
('122004','1220','Padang Bolak'),
('122005','1220','Padang Bolak Julu'),
('122006','1220','Portibi'),
('122007','1220','Batang Onang'),
('122008','1220','Simangambat'),
('122009','1220','Hulu Sihapas'),
('122101','1221','Sosopan'),
('122102','1221','Barumun Tengah'),
('122103','1221','Huristak'),
('122104','1221','Lubuk Barumun'),
('122105','1221','Huta Raja Tinggi'),
('122106','1221','Ulu Barumun'),
('122107','1221','Barumun'),
('122108','1221','Sosa'),
('122109','1221','Batang Lubu Sutam'),
('122110','1221','Barumun Selatan'),
('122111','1221','Aek Nabara Barumun'),
('122112','1221','Sihapas Barumun'),
('122201','1222','Kotapinang'),
('122202','1222','Kampung Rakyat'),
('122203','1222','Torgamba'),
('122204','1222','Sungai Kanan'),
('122205','1222','Silangkitang'),
('122301','1223','Kualuh Hulu'),
('122302','1223','Kualuh Leidong'),
('122303','1223','Kualuh Hilir'),
('122304','1223','Aek Kuo'),
('122305','1223','Marbau'),
('122306','1223','Na IX - X'),
('122307','1223','Aek Natas'),
('122308','1223','Kualuh Selatan'),
('122401','1224','Lotu'),
('122402','1224','Sawo'),
('122403','1224','Tuhemberua'),
('122404','1224','Sitolu Ori'),
('122405','1224','Namohalu Esiwa'),
('122406','1224','Alasa Talumuzoi'),
('122407','1224','Alasa'),
('122408','1224','Tugala Oyo'),
('122409','1224','Afulu'),
('122410','1224','Lahewa'),
('122411','1224','Lahewa Timur'),
('122501','1225','Lahomi'),
('122502','1225','Sirombu'),
('122503','1225','Mandrehe Barat'),
('122504','1225','Moro\'o'),
('122505','1225','Mandrehe'),
('122506','1225','Mandrehe Utara'),
('122507','1225','Lolofitu Moi'),
('122508','1225','Ulu Moro\'o'),
('127101','1271','Medan Kota'),
('127102','1271','Medan Sunggal'),
('127103','1271','Medan Helvetia'),
('127104','1271','Medan Denai'),
('127105','1271','Medan Barat'),
('127106','1271','Medan Deli'),
('127107','1271','Medan Tuntungan'),
('127108','1271','Medan Belawan'),
('127109','1271','Medan Amplas'),
('127110','1271','Medan Area'),
('127111','1271','Medan Johor'),
('127112','1271','Medan Marelan'),
('127113','1271','Medan Labuhan'),
('127114','1271','Medan Tembung'),
('127115','1271','Medan Maimun'),
('127116','1271','Medan Polonia'),
('127117','1271','Medan Baru'),
('127118','1271','Medan Perjuangan'),
('127119','1271','Medan Petisah'),
('127120','1271','Medan Timur'),
('127121','1271','Medan Selayang'),
('127201','1272','Siantar Timur'),
('127202','1272','Siantar Barat'),
('127203','1272','Siantar Utara'),
('127204','1272','Siantar Selatan'),
('127205','1272','Siantar Marihat'),
('127206','1272','Siantar Martoba'),
('127207','1272','Siantar Sitalasari'),
('127208','1272','Siantar Marimbun'),
('127301','1273','Sibolga Utara'),
('127302','1273','Sibolga Kota'),
('127303','1273','Sibolga Selatan'),
('127304','1273','Sibolga Sambas'),
('127401','1274','Tanjung Balai Selatan'),
('127402','1274','Tanjung Balai Utara'),
('127403','1274','Sei Tualang Raso'),
('127404','1274','Teluk Nibung'),
('127405','1274','Datuk Bandar'),
('127406','1274','Datuk Bandar Timur'),
('127501','1275','Binjai Utara'),
('127502','1275','Binjai Kota'),
('127503','1275','Binjai Barat'),
('127504','1275','Binjai Timur'),
('127505','1275','Binjai Selatan'),
('127601','1276','Padang Hulu'),
('127602','1276','Rambutan'),
('127603','1276','Padang Hilir'),
('127604','1276','Bajenis'),
('127605','1276','Tebing Tinggi Kota'),
('127701','1277','Padangsidimpuan Utara'),
('127702','1277','Padangsidimpuan Selatan'),
('127703','1277','Padangsidimpuan Batunadua'),
('127704','1277','Padangsidimpuan Hutaimbaru'),
('127705','1277','Padangsidimpuan Tenggara'),
('127706','1277','Padangsidimpuan Angkola Julu'),
('127801','1278','Gunungsitoli'),
('127802','1278','Gunungsitoli Selatan'),
('127803','1278','Gunungsitoli Utara'),
('127804','1278','Gunungsitoli Idanoi'),
('127805','1278','Gunungsitoli Alo\'oa'),
('127806','1278','Gunungsitoli Barat'),
('130101','1301','Pancung Soal'),
('130102','1301','Ranah Pesisir'),
('130103','1301','Lengayang'),
('130104','1301','Batang Kapas'),
('130105','1301','IV Jurai'),
('130106','1301','Bayang'),
('130107','1301','Koto XI Tarusan'),
('130108','1301','Sutera'),
('130109','1301','Linggo Sari Baganti'),
('130110','1301','Lunang'),
('130111','1301','Basa Ampek Balai Tapan'),
('130112','1301','IV Nagari Bayang Utara'),
('130113','1301','Airpura'),
('130114','1301','Ranah Ampek Hulu Tapan'),
('130115','1301','Silaut'),
('130203','1302','Pantai Cermin'),
('130204','1302','Lembah Gumanti'),
('130205','1302','Payung Sekaki'),
('130206','1302','Lembang Jaya'),
('130207','1302','Gunung Talang'),
('130208','1302','Bukit Sundi'),
('130209','1302','IX Koto Sungai Lasi'),
('130210','1302','Kubung'),
('130211','1302','X Koto Singkarak'),
('130212','1302','X Koto Diatas'),
('130213','1302','Junjung Sirih'),
('130217','1302','Hiliran Gumanti'),
('130218','1302','Tigo Lurah'),
('130219','1302','Danau Kembar'),
('130303','1303','Tanjung Gadang'),
('130304','1303','Sijunjung'),
('130305','1303','IV Nagari'),
('130306','1303','Kamang Baru'),
('130307','1303','Lubuak Tarok'),
('130308','1303','Koto VII'),
('130309','1303','Sumpur Kudus'),
('130310','1303','Kupitan'),
('130401','1304','X Koto'),
('130402','1304','Batipuh'),
('130403','1304','Rambatan'),
('130404','1304','Lima Kaum'),
('130405','1304','Tanjung Emas'),
('130406','1304','Lintau Buo'),
('130407','1304','Sungayang'),
('130408','1304','Sungai Tarab'),
('130409','1304','Pariangan'),
('130410','1304','Salimpauang'),
('130411','1304','Padang Ganting'),
('130412','1304','Tanjuang Baru'),
('130413','1304','Lintau Buo Utara'),
('130414','1304','Batipuah Selatan'),
('130501','1305','Lubuk Alung'),
('130502','1305','Batang Anai'),
('130503','1305','Nan Sabaris'),
('130504','1305','x Enam Lingkuang'),
('130505','1305','VII Koto Sungai Sarik'),
('130506','1305','V Koto Kampung Dalam'),
('130507','1305','Sungai Garingging'),
('130508','1305','Sungai Limau'),
('130509','1305','IV Koto Aur Malintang'),
('130510','1305','Ulakan Tapakih'),
('130511','1305','Sintuak Toboh Gadang'),
('130512','1305','Padang Sago'),
('130513','1305','Batang Gasan'),
('130514','1305','V Koto Timur'),
('130515','1305','x Kayu Tanam'),
('130516','1305','Patamuan'),
('130517','1305','Enam Lingkung'),
('130601','1306','Tanjung Mutiara'),
('130602','1306','Lubuk Basung'),
('130603','1306','Tanjung Raya'),
('130604','1306','Matur'),
('130605','1306','IV Koto'),
('130606','1306','Banuhampu'),
('130607','1306','Ampek Angkek'),
('130608','1306','Baso'),
('130609','1306','Tilatang Kamang'),
('130610','1306','Palupuh'),
('130611','1306','Pelembayan'),
('130612','1306','Sungai Pua'),
('130613','1306','Ampek Nagari'),
('130614','1306','Candung'),
('130615','1306','Kamang Magek'),
('130616','1306','Malalak'),
('130701','1307','Suliki'),
('130702','1307','Guguak'),
('130703','1307','Payakumbuh'),
('130704','1307','Luak'),
('130705','1307','Harau'),
('130706','1307','Pangkalan Koto Baru'),
('130707','1307','Kapur IX'),
('130708','1307','Gunuang Omeh'),
('130709','1307','Lareh Sago Halaban'),
('130710','1307','Situjuah Limo Nagari'),
('130711','1307','Mungka'),
('130712','1307','Bukik Barisan'),
('130713','1307','Akabiluru'),
('130804','1308','Bonjol'),
('130805','1308','Lubuk Sikaping'),
('130807','1308','Panti'),
('130808','1308','Mapat Tunggul'),
('130812','1308','Duo Koto'),
('130813','1308','Tigo Nagari'),
('130814','1308','Rao'),
('130815','1308','Mapat Tunggul Selatan'),
('130816','1308','Simpang Alahan Mati'),
('130817','1308','Padang Gelugur'),
('130818','1308','Rao Utara'),
('130819','1308','Rao Selatan'),
('130901','1309','Pagai Utara'),
('130902','1309','Sipora Selatan'),
('130903','1309','Siberut Selatan'),
('130904','1309','Siberut Utara'),
('130905','1309','Siberut Barat'),
('130906','1309','Siberut Barat Daya'),
('130907','1309','Siberut Tengah'),
('130908','1309','Sipora Utara'),
('130909','1309','Sikakap'),
('130910','1309','Pagai Selatan'),
('131001','1310','Koto Baru'),
('131002','1310','Pulau Punjung'),
('131003','1310','Sungai Rumbai'),
('131004','1310','Sitiung'),
('131005','1310','Sembilan Koto'),
('131006','1310','Timpeh'),
('131007','1310','Koto Salak'),
('131008','1310','Tiumang'),
('131009','1310','Padang Laweh'),
('131010','1310','Asam Jujuhan'),
('131011','1310','Koto Besar'),
('131101','1311','Sangir'),
('131102','1311','Sungai Pagu'),
('131103','1311','Koto Parik Gadang Diateh'),
('131104','1311','Sangir Jujuan'),
('131105','1311','Sangir Batang Hari'),
('131106','1311','Pauh Duo'),
('131107','1311','Sangir Balai Janggo'),
('131201','1312','Sungaiberemas'),
('131202','1312','Lembah Melintang'),
('131203','1312','Pasaman'),
('131204','1312','Talamau'),
('131205','1312','Kinali'),
('131206','1312','Gunungtuleh'),
('131207','1312','Ranah Batahan'),
('131208','1312','Koto Balingka'),
('131209','1312','Sungaiaur'),
('131210','1312','Luhak Nan Duo'),
('131211','1312','Sasak Ranah Pesisir'),
('137101','1371','Padang Selatan'),
('137102','1371','Padang Timur'),
('137103','1371','Padang Barat'),
('137104','1371','Padang Utara'),
('137105','1371','Bungus Teluk Kabung'),
('137106','1371','Lubuk Begalung'),
('137107','1371','Lubuk Kilangan'),
('137108','1371','Pauh'),
('137109','1371','Kuranji'),
('137110','1371','Nanggalo'),
('137111','1371','Koto Tangah'),
('137201','1372','Lubuk Sikarah'),
('137202','1372','Tanjung Harapan'),
('137301','1373','Lembah Segar'),
('137302','1373','Barangin'),
('137303','1373','Silungkang'),
('137304','1373','Talawi'),
('137401','1374','Padang Panjang Timur'),
('137402','1374','Padang Panjang Barat'),
('137501','1375','Guguak Panjang'),
('137502','1375','Mandiangin K. Selayan'),
('137503','1375','Aur Birugo Tigo Baleh'),
('137601','1376','Payakumbuh Barat'),
('137602','1376','Payakumbuh Utara'),
('137603','1376','Payakumbuh Timur'),
('137604','1376','Lamposi Tigo Nagori'),
('137605','1376','Payakumbuh Selatan'),
('137701','1377','Pariaman Tengah'),
('137702','1377','Pariaman Utara'),
('137703','1377','Pariaman Selatan'),
('137704','1377','Pariaman Timur'),
('140101','1401','Bangkinang Kota'),
('140102','1401','Kampar'),
('140103','1401','Tambang'),
('140104','1401','XIII Koto Kampar'),
('140105','1401','Kuok'),
('140106','1401','Siak Hulu'),
('140107','1401','Kampar Kiri'),
('140108','1401','Kampar Kiri Hilir'),
('140109','1401','Kampar Kiri Hulu'),
('140110','1401','Tapung'),
('140111','1401','Tapung Hilir'),
('140112','1401','Tapung Hulu'),
('140113','1401','Salo'),
('140114','1401','Rumbio Jaya'),
('140115','1401','Bangkinang'),
('140116','1401','Perhentian Raja'),
('140117','1401','Kampar Timur'),
('140118','1401','Kampar Utara'),
('140119','1401','Kampar Kiri Tengah'),
('140120','1401','Gunung Sahilan'),
('140121','1401','Koto Kampar Hulu'),
('140201','1402','Rengat'),
('140202','1402','Rengat Barat'),
('140203','1402','Kelayang'),
('140204','1402','Pasir Penyu'),
('140205','1402','Peranap'),
('140206','1402','Siberida'),
('140207','1402','Batang Cenaku'),
('140208','1402','Batang Gangsal'),
('140209','1402','Lirik'),
('140210','1402','Kuala Cenaku'),
('140211','1402','Sungai Lala'),
('140212','1402','Lubuk Batu Jaya'),
('140213','1402','Rakit Kulim'),
('140214','1402','Batang Peranap'),
('140301','1403','Bengkalis'),
('140302','1403','Bantan'),
('140303','1403','Bukit Batu'),
('140309','1403','Mandau'),
('140310','1403','Rupat'),
('140311','1403','Rupat Utara'),
('140312','1403','Siak Kecil'),
('140313','1403','Pinggir'),
('140401','1404','Reteh'),
('140402','1404','Enok'),
('140403','1404','Kuala Indragiri'),
('140404','1404','Tembilahan'),
('140405','1404','Tempuling'),
('140406','1404','Gaung Anak Serka'),
('140407','1404','Mandah'),
('140408','1404','Kateman'),
('140409','1404','Keritang'),
('140410','1404','Tanah Merah'),
('140411','1404','Batang Tuaka'),
('140412','1404','Gaung'),
('140413','1404','Tembilahan Hulu'),
('140414','1404','Kemuning'),
('140415','1404','Pelangiran'),
('140416','1404','Teluk Belengkong'),
('140417','1404','Pulau Burung'),
('140418','1404','Concong'),
('140419','1404','Kempas'),
('140420','1404','Sungai Batang'),
('140501','1405','Ukui'),
('140502','1405','Pangkalan Kerinci'),
('140503','1405','Pangkalan Kuras'),
('140504','1405','Pangkalan Lesung'),
('140505','1405','Langgam'),
('140506','1405','Pelalawan'),
('140507','1405','Kerumutan'),
('140508','1405','Bunut'),
('140509','1405','Teluk Meranti'),
('140510','1405','Kuala Kampar'),
('140511','1405','Bandar Sei Kijang'),
('140512','1405','Bandar Petalangan'),
('140601','1406','Ujung Batu'),
('140602','1406','Rokan IV Koto'),
('140603','1406','Rambah'),
('140604','1406','Tambusai'),
('140605','1406','Kepenuhan'),
('140606','1406','Kunto Darussalam'),
('140607','1406','Rambah Samo'),
('140608','1406','Rambah Hilir'),
('140609','1406','Tambusai Utara'),
('140610','1406','Bangun Purba'),
('140611','1406','Tandun'),
('140612','1406','Kabun'),
('140613','1406','Bonai Darussalam'),
('140614','1406','Pagaran Tapah Darussalam'),
('140615','1406','Kepenuhan Hulu'),
('140616','1406','Pendalian IV Koto'),
('140701','1407','Kubu'),
('140702','1407','Bangko'),
('140703','1407','Tanah Putih'),
('140704','1407','Rimba Melintang'),
('140705','1407','Bagan Sinembah'),
('140706','1407','Pasir Limau Kapas'),
('140707','1407','Sinaboi'),
('140708','1407','Pujud'),
('140709','1407','Tanah Putih Tanjung Melawan'),
('140710','1407','Bangko Pusako'),
('140711','1407','Simpang Kanan'),
('140712','1407','Batu Hampar'),
('140713','1407','Rantau Kopar'),
('140714','1407','Pekaitan'),
('140715','1407','Kubu Babussalam'),
('140801','1408','Siak'),
('140802','1408','Sungai Apit'),
('140803','1408','Minas'),
('140804','1408','Tualang'),
('140805','1408','Sungai Mandau'),
('140806','1408','Dayun'),
('140807','1408','Kerinci Kanan'),
('140808','1408','Bunga Raya'),
('140809','1408','Koto Gasib'),
('140810','1408','Kandis'),
('140811','1408','Lubuk Dalam'),
('140812','1408','Sabak Auh'),
('140813','1408','Mempura'),
('140814','1408','Pusako'),
('140901','1409','Kuantan Mudik'),
('140902','1409','Kuantan Tengah'),
('140903','1409','Singingi'),
('140904','1409','Kuantan Hilir'),
('140905','1409','Cerenti'),
('140906','1409','Benai'),
('140907','1409','Gunungtoar'),
('140908','1409','Singingi Hilir'),
('140909','1409','Pangean'),
('140910','1409','Logas Tanah Darat'),
('140911','1409','Inuman'),
('140912','1409','Hulu Kuantan'),
('140913','1409','Kuantan Hilir Seberang'),
('140914','1409','Sentajo Raya'),
('140915','1409','Pucuk Rantau'),
('141001','1410','Tebing Tinggi'),
('141002','1410','Rangsang Barat'),
('141003','1410','Rangsang'),
('141004','1410','Tebing Tinggi Barat'),
('141005','1410','Merbau'),
('141006','1410','Pulaumerbau'),
('141007','1410','Tebing Tinggi Timur'),
('141008','1410','Tasik Putri Puyu'),
('141009','1410','Rangsang Pesisir'),
('147101','1471','Sukajadi'),
('147102','1471','Pekanbaru Kota'),
('147103','1471','Sail'),
('147104','1471','Lima Puluh'),
('147105','1471','Senapelan'),
('147106','1471','Rumbai'),
('147107','1471','Bukit Raya'),
('147108','1471','Tampan'),
('147109','1471','Marpoyan Damai'),
('147110','1471','Tenayan Raya'),
('147111','1471','Payung Sekaki'),
('147112','1471','Rumbai Pesisir'),
('147201','1472','Dumai Barat'),
('147202','1472','Dumai Timur'),
('147203','1472','Bukit Kapur'),
('147204','1472','Sungai Sembilan'),
('147205','1472','Medang Kampai'),
('147206','1472','Dumai Kota'),
('147207','1472','Dumai Selatan'),
('150101','1501','Gunung Raya'),
('150102','1501','Danau Kerinci'),
('150104','1501','Sitinjau Laut'),
('150105','1501','Air Hangat'),
('150106','1501','Gunung Kerinci'),
('150107','1501','Batang Merangin'),
('150108','1501','Keliling Danau'),
('150109','1501','Kayu Aro'),
('150111','1501','Air Hangat Timur'),
('150115','1501','Gunung Tujuh'),
('150116','1501','Siulak'),
('150117','1501','Depati Tujuh'),
('150118','1501','Siulak Mukai'),
('150119','1501','Kayu Aro Barat'),
('150120','1501','Bukitkerman'),
('150121','1501','Air Hangat Barat'),
('150201','1502','Jangkat'),
('150202','1502','Bangko'),
('150203','1502','Muara Siau'),
('150204','1502','Sungai Manau'),
('150205','1502','Tabir'),
('150206','1502','Pamenang'),
('150207','1502','Tabir Ulu'),
('150208','1502','Tabir Selatan'),
('150209','1502','Lembah Masurai'),
('150210','1502','Bangko Barat'),
('150211','1502','Nalo Tatan'),
('150212','1502','Batang Masumai'),
('150213','1502','Pamenang Barat'),
('150214','1502','Tabir Ilir'),
('150215','1502','Tabir Timur'),
('150216','1502','Renah Pembarap'),
('150217','1502','Pangkalan Jambu'),
('150218','1502','Sungai Tenang'),
('150219','1502','Renah Pamenang'),
('150220','1502','Pamenang Selatan'),
('150221','1502','Margo Tabir'),
('150222','1502','Tabir Lintas'),
('150223','1502','Tabir Barat'),
('150224','1502','Tiang Pumpung'),
('150301','1503','Batang Asai'),
('150302','1503','Limun'),
('150303','1503','Sarolangun'),
('150304','1503','Pauh'),
('150305','1503','Pelawan'),
('150306','1503','Mandiangin'),
('150307','1503','Air Hitam'),
('150308','1503','Bathin VIII'),
('150309','1503','Singkut'),
('150310','1503','Cermin Nan Gedang'),
('150401','1504','Mersam'),
('150402','1504','Muara Tembesi'),
('150403','1504','Muara Bulian'),
('150404','1504','Batin XXIV'),
('150405','1504','Pemayung'),
('150406','1504','Maro Sebo Ulu'),
('150407','1504','Bajubang'),
('150408','1504','Maro Sebo Ilir'),
('150501','1505','Jambi Luar Kota'),
('150502','1505','Sekernan'),
('150503','1505','Kumpeh'),
('150504','1505','Maro Sebo'),
('150505','1505','Mestong'),
('150506','1505','Kumpeh Ulu'),
('150507','1505','Sungai Bahar'),
('150508','1505','Sungai Gelam'),
('150509','1505','Bahar Utara'),
('150510','1505','Bahar Selatan'),
('150511','1505','Taman Rajo'),
('150601','1506','Tungkal Ulu'),
('150602','1506','Tungkal Ilir'),
('150603','1506','Pengabuan'),
('150604','1506','Betara'),
('150605','1506','Merlung'),
('150606','1506','Tebing Tinggi'),
('150607','1506','Batang Asam'),
('150608','1506','Renah Mendaluh'),
('150609','1506','Muara Papalik'),
('150610','1506','Seberang Kota'),
('150611','1506','Bram Itam'),
('150612','1506','Kuala Betara'),
('150613','1506','Senyerang'),
('150701','1507','Muara Sabak Timur'),
('150702','1507','Nipah Panjang'),
('150703','1507','Mendahara'),
('150704','1507','Rantau Rasau'),
('150705','1507','S a d u'),
('150706','1507','Dendang'),
('150707','1507','Muara Sabak Barat'),
('150708','1507','Kuala Jambi'),
('150709','1507','Mendahara Ulu'),
('150710','1507','Geragai'),
('150711','1507','Berbak'),
('150801','1508','Tanah Tumbuh'),
('150802','1508','Rantau Pandan'),
('150803','1508','Pasar Muaro Bungo'),
('150804','1508','Jujuhan'),
('150805','1508','Tanah Sepenggal'),
('150806','1508','Pelepat'),
('150807','1508','Limbur Lubuk Mengkuang'),
('150808','1508','Muko-muko Bathin VII'),
('150809','1508','Pelepat Ilir'),
('150810','1508','Batin II Babeko'),
('150811','1508','Bathin III'),
('150812','1508','Bungo Dani'),
('150813','1508','Rimbo Tengah'),
('150814','1508','Bathin III Ulu'),
('150815','1508','Bathin II Pelayang'),
('150816','1508','Jujuhan Ilir'),
('150817','1508','Tanah Sepenggal Lintas'),
('150901','1509','Tebo Tengah'),
('150902','1509','Tebo Ilir'),
('150903','1509','Tebo Ulu'),
('150904','1509','Rimbo Bujang'),
('150905','1509','Sumay'),
('150906','1509','VII Koto'),
('150907','1509','Rimbo Ulu'),
('150908','1509','Rimbo Ilir'),
('150909','1509','Tengah Ilir'),
('150910','1509','Serai Serumpun'),
('150911','1509','VII Koto Ilir'),
('150912','1509','Muara Tabir'),
('157101','1571','Telanaipura'),
('157102','1571','Jambi Selatan'),
('157103','1571','Jambi Timur'),
('157104','1571','Pasar Jambi'),
('157105','1571','Pelayangan'),
('157106','1571','Danau Teluk'),
('157107','1571','Kota Baru'),
('157108','1571','Jelutung'),
('157201','1572','Sungai Penuh'),
('157202','1572','Pesisir Bukit'),
('157203','1572','Hamparan Rawang'),
('157204','1572','Tanah Kampung'),
('157205','1572','Kumun Debai'),
('157206','1572','Pondok Tinggi'),
('157207','1572','Koto Baru'),
('157208','1572','Sungai Bungkal'),
('160107','1601','Sosoh Buay Rayap'),
('160108','1601','Pengandonan'),
('160109','1601','Peninjauan'),
('160113','1601','Baturaja Barat'),
('160114','1601','Baturaja Timur'),
('160120','1601','Ulu Ogan'),
('160121','1601','Semidang Aji'),
('160122','1601','Lubuk Batang'),
('160128','1601','Lengkiti'),
('160129','1601','Sinar Peninjauan'),
('160130','1601','Lubuk Raja'),
('160131','1601','Muara Jaya'),
('160202','1602','Tanjung Lubuk'),
('160203','1602','Pedamaran'),
('160204','1602','Mesuji'),
('160205','1602','Kayu Agung'),
('160208','1602','Sirah Pulau Padang'),
('160211','1602','Tulung Selapan'),
('160212','1602','Pampangan'),
('160213','1602','Lempuing'),
('160214','1602','Air Sugihan'),
('160215','1602','Sungai Menang'),
('160217','1602','Jejawi'),
('160218','1602','Cengal'),
('160219','1602','Pangkalan Lampam'),
('160220','1602','Mesuji Makmur'),
('160221','1602','Mesuji Raya'),
('160222','1602','Lempuing Jaya'),
('160223','1602','Teluk Gelam'),
('160224','1602','Pedamaran Timur'),
('160301','1603','Tanjung Agung'),
('160302','1603','Muara Enim'),
('160303','1603','Rambang Dangku'),
('160304','1603','Gunung Megang'),
('160306','1603','Gelumbang'),
('160307','1603','Lawang Kidul'),
('160308','1603','Semende Darat Laut'),
('160309','1603','Semende Darat Tengah'),
('160310','1603','Semende Darat Ulu'),
('160311','1603','Ujan Mas'),
('160314','1603','Lubai'),
('160315','1603','Rambang'),
('160316','1603','Sungai Rotan'),
('160317','1603','Lembak'),
('160319','1603','Benakat'),
('160321','1603','Kelekar'),
('160322','1603','Muara Belida'),
('160323','1603','Belimbing'),
('160324','1603','Belida Darat'),
('160325','1603','Lubai Ulu'),
('160401','1604','Tanjungsakti Pumu'),
('160406','1604','Jarai'),
('160407','1604','Kota Agung'),
('160408','1604','Pulaupinang'),
('160409','1604','Merapi Barat'),
('160410','1604','Lahat'),
('160412','1604','Pajar Bulan'),
('160415','1604','Mulak Ulu'),
('160416','1604','Kikim Selatan'),
('160417','1604','Kikim Timur'),
('160418','1604','Kikim Tengah'),
('160419','1604','Kikim Barat'),
('160420','1604','Pseksu'),
('160421','1604','Gumay Talang'),
('160422','1604','Pagar Gunung'),
('160423','1604','Merapi Timur'),
('160424','1604','Tanjung Sakti Pumi'),
('160425','1604','Gumay Ulu'),
('160426','1604','Merapi Selatan'),
('160427','1604','Tanjungtebat'),
('160428','1604','Muarapayang'),
('160429','1604','Sukamerindu'),
('160501','1605','Tugumulyo'),
('160502','1605','Muara Lakitan'),
('160503','1605','Muara Kelingi'),
('160508','1605','Jayaloka'),
('160509','1605','Muara Beliti'),
('160510','1605','STL Ulu Terawas'),
('160511','1605','Selangit'),
('160512','1605','Megang Sakti'),
('160513','1605','Purwodadi'),
('160514','1605','BTS. Ulu'),
('160518','1605','Tiang Pumpung Kepungut'),
('160519','1605','Sumber Harta'),
('160520','1605','Tuah Negeri'),
('160521','1605','Suka Karya'),
('160601','1606','Sekayu'),
('160602','1606','Lais'),
('160603','1606','Sungai Keruh'),
('160604','1606','Batang Hari Leko'),
('160605','1606','Sanga Desa'),
('160606','1606','Babat Toman'),
('160607','1606','Sungai Lilin'),
('160608','1606','Keluang'),
('160609','1606','Bayung Lencir'),
('160610','1606','Plakat Tinggi'),
('160611','1606','Lalan'),
('160612','1606','Tungkal Jaya'),
('160613','1606','Lawang Wetan'),
('160614','1606','Babat Supat'),
('160701','1607','Banyuasin I'),
('160702','1607','Banyuasin II'),
('160703','1607','Banyuasin III'),
('160704','1607','Pulau Rimau'),
('160705','1607','Betung'),
('160706','1607','Rambutan'),
('160707','1607','Muara Padang'),
('160708','1607','Muara Telang'),
('160709','1607','Makarti Jaya'),
('160710','1607','Talang Kelapa'),
('160711','1607','Rantau Bayur'),
('160712','1607','Tanjung Lago'),
('160713','1607','Muara Sugihan'),
('160714','1607','Air Salek'),
('160715','1607','Tungkal Ilir'),
('160716','1607','Suak Tapeh'),
('160717','1607','Sembawa'),
('160718','1607','Sumber Marga Telang'),
('160719','1607','Air Kumbang'),
('160801','1608','Martapura'),
('160802','1608','Buay Madang'),
('160803','1608','Belitang'),
('160804','1608','Cempaka'),
('160805','1608','Buay Pemuka Peliung'),
('160806','1608','Madang Suku II'),
('160807','1608','Madang Suku I'),
('160808','1608','Semendawai Suku III'),
('160809','1608','Belitang II'),
('160810','1608','Belitang III'),
('160811','1608','Bunga Mayang'),
('160812','1608','Buay Madang Timur'),
('160813','1608','Madang Suku III'),
('160814','1608','Semendawai Barat'),
('160815','1608','Semendawai Timur'),
('160816','1608','Jayapura'),
('160817','1608','Belitang Jaya'),
('160818','1608','Belitang Madang Raya'),
('160819','1608','Belitang Mulya'),
('160820','1608','Buay Pemuka Bangsa Raja'),
('160901','1609','Muara Dua'),
('160902','1609','Pulau Beringin'),
('160903','1609','Banding Agung'),
('160904','1609','Muara Dua Kisam'),
('160905','1609','Simpang'),
('160906','1609','Buay Sandang Aji'),
('160907','1609','Buay Runjung'),
('160908','1609','Mekakau Ilir'),
('160909','1609','Buay Pemaca'),
('160910','1609','Kisam Tinggi'),
('160911','1609','Kisam Ilir'),
('160912','1609','Buay Pematang Ribu Ranau Tengah'),
('160913','1609','Warkuk Ranau Selatan'),
('160914','1609','Runjung Agung'),
('160915','1609','Sungai Are'),
('160916','1609','Sindang Danau'),
('160917','1609','Buana Pemaca'),
('160918','1609','Tiga Dihaji'),
('160919','1609','Buay Rawan'),
('161001','1610','Muara Kuang'),
('161002','1610','Tanjung Batu'),
('161003','1610','Tanjung Raja'),
('161004','1610','Indralaya'),
('161005','1610','Pemulutan'),
('161006','1610','Rantau Alai'),
('161007','1610','Indralaya Utara'),
('161008','1610','Indralaya Selatan'),
('161009','1610','Pemulutan Selatan'),
('161010','1610','Pemulutan Barat'),
('161011','1610','Rantau Panjang'),
('161012','1610','Sungai Pinang'),
('161013','1610','Kandis'),
('161014','1610','Rambang Kuang'),
('161015','1610','Lubuk Keliat'),
('161016','1610','Payaraman'),
('161101','1611','Muara Pinang'),
('161102','1611','Pendopo'),
('161103','1611','Ulu Musi'),
('161104','1611','Tebing Tinggi'),
('161105','1611','Lintang Kanan'),
('161106','1611','Talang Padang'),
('161107','1611','Pasemah Air Keruh'),
('161108','1611','Sikap Dalam'),
('161109','1611','Saling'),
('161110','1611','Pendopo Barat'),
('161201','1612','Talang Ubi'),
('161202','1612','Penukal Utara'),
('161203','1612','Penukal'),
('161204','1612','Abab'),
('161205','1612','Tanah Abang'),
('161301','1613','Rupit'),
('161302','1613','Rawas Ulu'),
('161303','1613','Nibung'),
('161304','1613','Rawas Ilir'),
('161305','1613','Karang Dapo'),
('161306','1613','Karang Jaya'),
('161307','1613','Ulu Rawas'),
('167101','1671','Ilir Barat II'),
('167102','1671','Seberang Ulu I'),
('167103','1671','Seberang Ulu II'),
('167104','1671','Ilir Barat I'),
('167105','1671','Ilir Timur I'),
('167106','1671','Ilir Timur II'),
('167107','1671','Sukarami'),
('167108','1671','Sako'),
('167109','1671','Kemuning'),
('167110','1671','Kalidoni'),
('167111','1671','Bukit Kecil'),
('167112','1671','Gandus'),
('167113','1671','Kertapati'),
('167114','1671','Plaju'),
('167115','1671','Alang-alang Lebar'),
('167116','1671','Sematang Borang'),
('167201','1672','Pagar Alam Utara'),
('167202','1672','Pagar Alam Selatan'),
('167203','1672','Dempo Utara'),
('167204','1672','Dempo Selatan'),
('167205','1672','Dempo Tengah'),
('167301','1673','Lubuk Linggau Timur I'),
('167302','1673','Lubuk Linggau Barat I'),
('167303','1673','Lubuk Linggau Selatan I'),
('167304','1673','Lubuk Linggau Utara I'),
('167305','1673','Lubuk Linggau Timur II'),
('167306','1673','Lubuk Linggau Barat II'),
('167307','1673','Lubuk Linggau Selatan II'),
('167308','1673','Lubuk Linggau Utara II'),
('167401','1674','Prabumulih Barat'),
('167402','1674','Prabumulih Timur'),
('167403','1674','Cambai'),
('167404','1674','Rambang Kpk Tengah'),
('167405','1674','Prabumulih Utara'),
('167406','1674','Prabumulih Selatan'),
('170101','1701','Kedurang'),
('170102','1701','Seginim'),
('170103','1701','Pino'),
('170104','1701','Manna'),
('170105','1701','Kota Manna'),
('170106','1701','Pino Raya'),
('170107','1701','Kedurang Ilir'),
('170108','1701','Air Nipis'),
('170109','1701','Ulu Manna'),
('170110','1701','Bunga Mas'),
('170111','1701','Pasar Manna'),
('170206','1702','Kota Padang'),
('170207','1702','Padang Ulak Tanding'),
('170208','1702','Sindang Kelingi'),
('170209','1702','Curup'),
('170210','1702','Bermani Ulu'),
('170211','1702','Selupu Rejang'),
('170216','1702','Curup Utara'),
('170217','1702','Curup Timur'),
('170218','1702','Curup Selatan'),
('170219','1702','Curup Tengah'),
('170220','1702','Binduriang'),
('170221','1702','Sindang Beliti Ulu'),
('170222','1702','Sindang Dataran'),
('170223','1702','Sindang Beliti Ilir'),
('170224','1702','Bermani Ulu Raya'),
('170301','1703','Enggano'),
('170306','1703','Kerkap'),
('170307','1703','Kota Arga Makmur'),
('170308','1703','Giri Mulya'),
('170309','1703','Padang Jaya'),
('170310','1703','Lais'),
('170311','1703','Batik Nau'),
('170312','1703','Ketahun'),
('170313','1703','Napal Putih'),
('170314','1703','Putri Hijau'),
('170315','1703','Air Besi'),
('170316','1703','Air Napal'),
('170319','1703','Hulu Palik'),
('170320','1703','Air Padang'),
('170321','1703','Arma Jaya'),
('170322','1703','Tanjung Agung Palik'),
('170323','1703','Ulok Kupai'),
('170401','1704','Kinal'),
('170402','1704','Tanjung Kemuning'),
('170403','1704','Kaur Utara'),
('170404','1704','Kaur Tengah'),
('170405','1704','Kaur Selatan'),
('170406','1704','Maje'),
('170407','1704','Nasal'),
('170408','1704','Semidang Gumay'),
('170409','1704','Kelam Tengah'),
('170410','1704','Luas'),
('170411','1704','Muara Sahung'),
('170412','1704','Tetap'),
('170413','1704','Lungkang Kule'),
('170414','1704','Padang Guci Hilir'),
('170415','1704','Padang Guci Hulu'),
('170501','1705','Sukaraja'),
('170502','1705','Seluma'),
('170503','1705','Talo'),
('170504','1705','Semidang Alas'),
('170505','1705','Semidang Alas Maras'),
('170506','1705','Air Periukan'),
('170507','1705','Lubuk Sandi'),
('170508','1705','Seluma Barat'),
('170509','1705','Seluma Timur'),
('170510','1705','Seluma Utara'),
('170511','1705','Seluma Selatan'),
('170512','1705','Talo Kecil'),
('170513','1705','Ulu Talo'),
('170514','1705','Ilir Talo'),
('170601','1706','Lubuk Pinang'),
('170602','1706','Kota Mukomuko'),
('170603','1706','Teras Terunjam'),
('170604','1706','Pondok Suguh'),
('170605','1706','Ipuh'),
('170606','1706','Malin Deman'),
('170607','1706','Air Rami'),
('170608','1706','Teramang Jaya'),
('170609','1706','Selagan Raya'),
('170610','1706','Penarik'),
('170611','1706','XIV Koto'),
('170612','1706','V Koto'),
('170613','1706','Air Majunto'),
('170614','1706','Air Dikit'),
('170615','1706','Sungai Rumbai'),
('170701','1707','Lebong Utara'),
('170702','1707','Lebong Atas'),
('170703','1707','Lebong Tengah'),
('170704','1707','Lebong Selatan'),
('170705','1707','Rimbo Pengadang'),
('170706','1707','Topos'),
('170707','1707','Bingin Kuning'),
('170708','1707','Lebong Sakti'),
('170709','1707','Pelabai'),
('170710','1707','Amen'),
('170711','1707','Uram Jaya'),
('170712','1707','Pinang Belapis'),
('170801','1708','Bermani Ilir'),
('170802','1708','Ujan Mas'),
('170803','1708','Tebat Karai'),
('170804','1708','Kepahiang'),
('170805','1708','Merigi'),
('170806','1708','Kebawetan'),
('170807','1708','Seberang Musi'),
('170808','1708','Muara Kemumu'),
('170901','1709','Karang Tinggi'),
('170902','1709','Talang Empat'),
('170903','1709','Pondok Kelapa'),
('170904','1709','Pematang Tiga'),
('170905','1709','Pagar Jati'),
('170906','1709','Taba Penanjung'),
('170907','1709','Merigi Kelindang'),
('170908','1709','Merigi Sakti'),
('170909','1709','Pondok Kubang'),
('170910','1709','Bang Haji'),
('177101','1771','Selebar'),
('177102','1771','Gading Cempaka'),
('177103','1771','Teluk Segara'),
('177104','1771','Muara Bangka Hulu'),
('177105','1771','Kampung Melayu'),
('177106','1771','Ratu Agung'),
('177107','1771','Ratu Samban'),
('177108','1771','Sungai Serut'),
('177109','1771','Singaran Pati'),
('180104','1801','Natar'),
('180105','1801','Tanjung Bintang'),
('180106','1801','Kalianda'),
('180107','1801','Sidomulyo'),
('180108','1801','Katibung'),
('180109','1801','Penengahan'),
('180110','1801','Palas'),
('180113','1801','Jati Agung'),
('180114','1801','Ketapang'),
('180115','1801','Sragi'),
('180116','1801','Raja Basa'),
('180117','1801','Candipuro'),
('180118','1801','Merbau Mataram'),
('180121','1801','Bakauheni'),
('180122','1801','Tanjung Sari'),
('180123','1801','Way Sulan'),
('180124','1801','Way Panji'),
('180201','1802','Kalirejo'),
('180202','1802','Bangun Rejo'),
('180203','1802','Padang Ratu'),
('180204','1802','Gunung Sugih'),
('180205','1802','Trimurjo'),
('180206','1802','Punggur'),
('180207','1802','Terbanggi Besar'),
('180208','1802','Seputih Raman'),
('180209','1802','Rumbia'),
('180210','1802','Seputih Banyak'),
('180211','1802','Seputih Mataram'),
('180212','1802','Seputih Surabaya'),
('180213','1802','Terusan Nunyai'),
('180214','1802','Bumi Ratu Nuban'),
('180215','1802','Bekri'),
('180216','1802','Seputih Agung'),
('180217','1802','Way Pangubuan'),
('180218','1802','Bandar Mataram'),
('180219','1802','Pubian'),
('180220','1802','Selagai Lingga'),
('180221','1802','Anak Tuha'),
('180222','1802','Sendang Agung'),
('180223','1802','Kota Gajah'),
('180224','1802','Bumi Nabung'),
('180225','1802','Way Seputih'),
('180226','1802','Bandar Surabaya'),
('180227','1802','Anak Ratu Aji'),
('180228','1802','Putra Rumbia'),
('180301','1803','Bukit Kemuning'),
('180302','1803','Kotabumi'),
('180303','1803','Sungkai Selatan'),
('180304','1803','Tanjung Raja'),
('180305','1803','Abung Timur'),
('180306','1803','Abung Barat'),
('180307','1803','Abung Selatan'),
('180308','1803','Sungkai Utara'),
('180309','1803','Kotabumi Utara'),
('180310','1803','Kotabumi Selatan'),
('180311','1803','Abung Tengah'),
('180312','1803','Abung Tinggi'),
('180313','1803','Abung Semuli'),
('180314','1803','Abung Surakarta'),
('180315','1803','Muara Sungkai'),
('180316','1803','Bunga Mayang'),
('180317','1803','Hulu Sungkai'),
('180318','1803','Sungkai Tengah'),
('180319','1803','Abung Pekurun'),
('180320','1803','Sungkai Jaya'),
('180321','1803','Sungkai Barat'),
('180322','1803','Abung Kunang'),
('180323','1803','Blambangan Pagar'),
('180404','1804','Balik Bukit'),
('180405','1804','Sumber Jaya'),
('180406','1804','Belalau'),
('180407','1804','Way Tenong'),
('180408','1804','Sekincau'),
('180409','1804','Suoh'),
('180410','1804','Batu Brak'),
('180411','1804','Sukau'),
('180415','1804','Gedung Surian'),
('180418','1804','Kebun Tebu'),
('180419','1804','Air Hitam'),
('180420','1804','Pagar Dewa'),
('180421','1804','Batu Ketulis'),
('180422','1804','Lumbok Seminung'),
('180423','1804','Bandar Negeri Suoh'),
('180502','1805','Menggala'),
('180506','1805','Gedung Aji'),
('180508','1805','Banjar Agung'),
('180511','1805','Gedung Meneng'),
('180512','1805','Rawa Jitu Selatan'),
('180513','1805','Penawar Tama'),
('180518','1805','Rawa Jitu Timur'),
('180520','1805','Banjar Margo'),
('180522','1805','Rawa Pitu'),
('180523','1805','Penawar Aji'),
('180525','1805','Dente Teladas'),
('180526','1805','Meraksa Aji'),
('180527','1805','Gedung Aji Baru'),
('180529','1805','Banjar Baru'),
('180530','1805','Menggala Timur'),
('180601','1806','Kota Agung'),
('180602','1806','Talang Padang'),
('180603','1806','Wonosobo'),
('180604','1806','Pulau Panggung'),
('180609','1806','Cukuh Balak'),
('180611','1806','Pugung'),
('180612','1806','Semaka'),
('180613','1806','Sumber Rejo'),
('180615','1806','Ulu Belu'),
('180616','1806','Pematang Sawa'),
('180617','1806','Klumbayan'),
('180618','1806','Kota Agung Barat'),
('180619','1806','Kota Agung Timur'),
('180620','1806','Gisting'),
('180621','1806','Gunung Alip'),
('180624','1806','Limau'),
('180625','1806','Bandar Negeri Semuong'),
('180626','1806','Air Naningan'),
('180627','1806','Bulok'),
('180628','1806','Klumbayan Barat'),
('180701','1807','Sukadana'),
('180702','1807','Labuhan Maringgai'),
('180703','1807','Jabung'),
('180704','1807','Pekalongan'),
('180705','1807','Sekampung'),
('180706','1807','Batanghari'),
('180707','1807','Way Jepara'),
('180708','1807','Purbolinggo'),
('180709','1807','Raman Utara'),
('180710','1807','Metro Kibang'),
('180711','1807','Marga Tiga'),
('180712','1807','Sekampung Udik'),
('180713','1807','Batanghari Nuban'),
('180714','1807','Bumi Agung'),
('180715','1807','Bandar Sribhawono'),
('180716','1807','Mataram Baru'),
('180717','1807','Melinting'),
('180718','1807','Gunung Pelindung'),
('180719','1807','Pasir Sakti'),
('180720','1807','Waway Karya'),
('180721','1807','Labuhan Ratu'),
('180722','1807','Braja Selebah'),
('180723','1807','Way Bungur'),
('180724','1807','Marga Sekampung'),
('180801','1808','Blambangan Umpu'),
('180802','1808','Kasui'),
('180803','1808','Banjit'),
('180804','1808','Baradatu'),
('180805','1808','Bahuga'),
('180806','1808','Pakuan Ratu'),
('180807','1808','Negeri Agung'),
('180808','1808','Way Tuba'),
('180809','1808','Rebang Tangkas'),
('180810','1808','Gunung Labuhan'),
('180811','1808','Negara Batin'),
('180812','1808','Negeri Besar'),
('180813','1808','Buay Bahuga'),
('180814','1808','Bumi Agung'),
('180901','1809','Gedong Tataan'),
('180902','1809','Negeri Katon'),
('180903','1809','Tegineneng'),
('180904','1809','Way Lima'),
('180905','1809','Padang Cermin'),
('180906','1809','Punduh Pidada'),
('180907','1809','Kedondong'),
('180908','1809','Marga Punduh'),
('180909','1809','Way Khilau'),
('181001','1810','Pringsewu'),
('181002','1810','Gading Rejo'),
('181003','1810','Ambarawa'),
('181004','1810','Pardasuka'),
('181005','1810','Pagelaran'),
('181006','1810','Banyumas'),
('181007','1810','Adiluwih'),
('181008','1810','Sukoharjo'),
('181009','1810','Pagelaran Utara'),
('181101','1811','Mesuji'),
('181102','1811','Mesuji Timur'),
('181103','1811','Rawa Jitu Utara'),
('181104','1811','Way Serdang'),
('181105','1811','Simpang Pematang'),
('181106','1811','Panca Jaya'),
('181107','1811','Tanjung Raya'),
('181201','1812','Tulang Bawang Tengah'),
('181202','1812','Tumijajar'),
('181203','1812','Tulang Bawang Udik'),
('181204','1812','Gunung Terang'),
('181205','1812','Gunung Agung'),
('181206','1812','Way Kenanga'),
('181207','1812','Lambu Kibang'),
('181208','1812','Pagar Dewa'),
('181301','1813','Pesisir Tengah'),
('181302','1813','Pesisir Selatan'),
('181303','1813','Lemong'),
('181304','1813','Pesisir Utara'),
('181305','1813','Karya Penggawa'),
('181306','1813','Pulaupisang'),
('181307','1813','Way Krui'),
('181308','1813','Krui Selatan'),
('181309','1813','Ngambur'),
('181310','1813','Bengkunat'),
('181311','1813','Bengkunat Belimbing'),
('187101','1871','Kedaton'),
('187102','1871','Sukarame'),
('187103','1871','Tanjungkarang Barat'),
('187104','1871','Panjang'),
('187105','1871','Tanjungkarang Timur'),
('187106','1871','Tanjungkarang Pusat'),
('187107','1871','Telukbetung Selatan'),
('187108','1871','Telukbetung Barat'),
('187109','1871','Telukbetung Utara'),
('187110','1871','Rajabasa'),
('187111','1871','Tanjung Senang'),
('187112','1871','Sukabumi'),
('187113','1871','Kemiling'),
('187114','1871','Labuhan Ratu'),
('187115','1871','Way Halim'),
('187116','1871','Langkapura'),
('187117','1871','Enggal'),
('187118','1871','Kedamaian'),
('187119','1871','Telukbetung Timur'),
('187120','1871','Bumi Waras'),
('187201','1872','Metro Pusat'),
('187202','1872','Metro Utara'),
('187203','1872','Metro Barat'),
('187204','1872','Metro Timur'),
('187205','1872','Metro Selatan'),
('190101','1901','Sungailiat'),
('190102','1901','Belinyu'),
('190103','1901','Merawang'),
('190104','1901','Mendo Barat'),
('190105','1901','Pemali'),
('190106','1901','Bakam'),
('190107','1901','Riau Silip'),
('190108','1901','Puding Besar'),
('190201','1902','Tanjung Pandan'),
('190202','1902','Membalong'),
('190203','1902','Selat Nasik'),
('190204','1902','Sijuk'),
('190205','1902','Badau'),
('190301','1903','Toboali'),
('190302','1903','Lepar Pongok'),
('190303','1903','Air Gegas'),
('190304','1903','Simpang Rimba'),
('190305','1903','Payung'),
('190306','1903','Tukak Sadai'),
('190307','1903','Pulaubesar'),
('190308','1903','Kepulauan Pongok'),
('190401','1904','Koba'),
('190402','1904','Pangkalan Baru'),
('190403','1904','Sungai Selan'),
('190404','1904','Simpang Katis'),
('190405','1904','Namang'),
('190406','1904','Lubuk Besar'),
('190501','1905','Mentok'),
('190502','1905','Simpang Teritip'),
('190503','1905','Jebus'),
('190504','1905','Kelapa'),
('190505','1905','Tempilang'),
('190506','1905','Parittiga'),
('190601','1906','Manggar'),
('190602','1906','Gantung'),
('190603','1906','Dendang'),
('190604','1906','Kelapa Kampit'),
('190605','1906','Damar'),
('190606','1906','Simpang Renggiang'),
('190607','1906','Simpang Pesak'),
('197101','1971','Bukitintan'),
('197102','1971','Taman Sari'),
('197103','1971','Pangkal Balam'),
('197104','1971','Rangkui'),
('197105','1971','Gerunggang'),
('197106','1971','Gabek'),
('197107','1971','Girimaya'),
('210104','2101','Gunung Kijang'),
('210106','2101','Bintan Timur'),
('210107','2101','Bintan Utara'),
('210108','2101','Teluk Bintan'),
('210109','2101','Tambelan'),
('210110','2101','Telok Sebong'),
('210112','2101','Toapaya'),
('210113','2101','Mantang'),
('210114','2101','Bintan Pesisir'),
('210115','2101','Seri Kuala Lobam'),
('210201','2102','Moro'),
('210202','2102','Kundur'),
('210203','2102','Karimun'),
('210204','2102','Meral'),
('210205','2102','Tebing'),
('210206','2102','Buru'),
('210207','2102','Kundur Utara'),
('210208','2102','Kundur Barat'),
('210209','2102','Durai'),
('210210','2102','Meral Barat'),
('210211','2102','Ungar'),
('210212','2102','Belat'),
('210304','2103','Midai'),
('210305','2103','Bunguran Barat'),
('210306','2103','Serasan'),
('210307','2103','Bunguran Timur'),
('210308','2103','Bunguran Utara'),
('210309','2103','Subi'),
('210310','2103','Pulau Laut'),
('210311','2103','Pulau Tiga'),
('210315','2103','Bunguran Timur Laut'),
('210316','2103','Bunguran Tengah'),
('210318','2103','Bunguran Selatan'),
('210319','2103','Serasan Timur'),
('210401','2104','Singkep'),
('210402','2104','Lingga'),
('210403','2104','Senayang'),
('210404','2104','Singkep Barat'),
('210405','2104','Lingga Utara'),
('210406','2104','Singkep Pesisir'),
('210407','2104','Lingga Timur'),
('210408','2104','Selayar'),
('210409','2104','Singkep Selatan'),
('210501','2105','Siantan'),
('210502','2105','Palmatak'),
('210503','2105','Siantan Timur'),
('210504','2105','Siantan Selatan'),
('210505','2105','Jemaja Timur'),
('210506','2105','Jemaja'),
('210507','2105','Siantan Tengah'),
('217101','2171','Belakang Padang'),
('217102','2171','Batu Ampar'),
('217103','2171','Sekupang'),
('217104','2171','Nongsa'),
('217105','2171','Bulang'),
('217106','2171','Lubuk Baja'),
('217107','2171','Sei Beduk'),
('217108','2171','Galang'),
('217109','2171','Bengkong'),
('217110','2171','Batam Kota'),
('217111','2171','Sagulung'),
('217112','2171','Batu Aji'),
('217201','2172','Tanjung Pinang Barat'),
('217202','2172','Tanjung Pinang Timur'),
('217203','2172','Tanjung Pinang Kota'),
('217204','2172','Bukit Bestari'),
('310101','3101','Kepulauan Seribu Utara'),
('310102','3101','Kepulauan Seribu Selatan.'),
('317101','3171','Gambir'),
('317102','3171','Sawah Besar'),
('317103','3171','Kemayoran'),
('317104','3171','Senen'),
('317105','3171','Cempaka Putih'),
('317106','3171','Menteng'),
('317107','3171','Tanah Abang'),
('317108','3171','Johar Baru'),
('317201','3172','Penjaringan'),
('317202','3172','Tanjung Priok'),
('317203','3172','Koja'),
('317204','3172','Cilincing'),
('317205','3172','Pademangan'),
('317206','3172','Kelapa Gading'),
('317301','3173','Cengkareng'),
('317302','3173','Grogol Petamburan'),
('317303','3173','Taman Sari'),
('317304','3173','Tambora'),
('317305','3173','Kebon Jeruk'),
('317306','3173','Kalideres'),
('317307','3173','Pal Merah'),
('317308','3173','Kembangan'),
('317401','3174','Tebet'),
('317402','3174','Setiabudi'),
('317403','3174','Mampang Prapatan'),
('317404','3174','Pasar Minggu'),
('317405','3174','Kebayoran Lama'),
('317406','3174','Cilandak'),
('317407','3174','Kebayoran Baru'),
('317408','3174','Pancoran'),
('317409','3174','Jagakarsa'),
('317410','3174','Pesanggrahan'),
('317501','3175','Matraman'),
('317502','3175','Pulogadung'),
('317503','3175','Jatinegara'),
('317504','3175','Kramatjati'),
('317505','3175','Pasar Rebo'),
('317506','3175','Cakung'),
('317507','3175','Duren Sawit'),
('317508','3175','Makasar'),
('317509','3175','Ciracas'),
('317510','3175','Cipayung'),
('320101','3201','Cibinong'),
('320102','3201','Gunung Putri'),
('320103','3201','Citeureup'),
('320104','3201','Sukaraja'),
('320105','3201','Babakan Madang'),
('320106','3201','Jonggol'),
('320107','3201','Cileungsi'),
('320108','3201','Cariu'),
('320109','3201','Sukamakmur'),
('320110','3201','Parung'),
('320111','3201','Gunung Sindur'),
('320112','3201','Kemang'),
('320113','3201','Bojong Gede'),
('320114','3201','Leuwiliang'),
('320115','3201','Ciampea'),
('320116','3201','Cibungbulang'),
('320117','3201','Pamijahan'),
('320118','3201','Rumpin'),
('320119','3201','Jasinga'),
('320120','3201','Parung Panjang'),
('320121','3201','Nanggung'),
('320122','3201','Cigudeg'),
('320123','3201','Tenjo'),
('320124','3201','Ciawi'),
('320125','3201','Cisarua'),
('320126','3201','Megamendung'),
('320127','3201','Caringin'),
('320128','3201','Cijeruk'),
('320129','3201','Ciomas'),
('320130','3201','Dramaga'),
('320131','3201','Tamansari'),
('320132','3201','Klapanunggal'),
('320133','3201','Ciseeng'),
('320134','3201','Ranca Bungur'),
('320135','3201','Sukajaya'),
('320136','3201','Tanjungsari'),
('320137','3201','Tajurhalang'),
('320138','3201','Cigombong'),
('320139','3201','Leuwisadeng'),
('320140','3201','Tenjolaya'),
('320201','3202','Pelabuhanratu'),
('320202','3202','Simpenan'),
('320203','3202','Cikakak'),
('320204','3202','Bantargadung'),
('320205','3202','Cisolok'),
('320206','3202','Cikidang'),
('320207','3202','Lengkong'),
('320208','3202','Jampang Tengah'),
('320209','3202','Warungkiara'),
('320210','3202','Cikembar'),
('320211','3202','Cibadak'),
('320212','3202','Nagrak'),
('320213','3202','Parungkuda'),
('320214','3202','Bojonggenteng'),
('320215','3202','Parakansalak'),
('320216','3202','Cicurug'),
('320217','3202','Cidahu'),
('320218','3202','Kalapanunggal'),
('320219','3202','Kabandungan'),
('320220','3202','Waluran'),
('320221','3202','Jampang Kulon'),
('320222','3202','Ciemas'),
('320223','3202','Kalibunder'),
('320224','3202','Surade'),
('320225','3202','Cibitung'),
('320226','3202','Ciracap'),
('320227','3202','Gunungguruh'),
('320228','3202','Cicantayan'),
('320229','3202','Cisaat'),
('320230','3202','Kadudampit'),
('320231','3202','Caringin'),
('320232','3202','Sukabumi'),
('320233','3202','Sukaraja'),
('320234','3202','Kebonpedes'),
('320235','3202','Cireunghas'),
('320236','3202','Sukalarang'),
('320237','3202','Pabuaran'),
('320238','3202','Purabaya'),
('320239','3202','Nyalindung'),
('320240','3202','Gegerbitung'),
('320241','3202','Sagaranten'),
('320242','3202','Curugkembar'),
('320243','3202','Cidolog'),
('320244','3202','Cidadap'),
('320245','3202','Tegalbuleud'),
('320246','3202','Cimanggu'),
('320247','3202','Ciambar'),
('320301','3203','Cianjur'),
('320302','3203','Warungkondang'),
('320303','3203','Cibeber'),
('320304','3203','Cilaku'),
('320305','3203','Ciranjang'),
('320306','3203','Bojongpicung'),
('320307','3203','Karangtengah'),
('320308','3203','Mande'),
('320309','3203','Sukaluyu'),
('320310','3203','Pacet'),
('320311','3203','Cugenang'),
('320312','3203','Cikalongkulon'),
('320313','3203','Sukaresmi'),
('320314','3203','Sukanagara'),
('320315','3203','Campaka'),
('320316','3203','Takokak'),
('320317','3203','Kadupandak'),
('320318','3203','Pagelaran'),
('320319','3203','Tanggeung'),
('320320','3203','Cibinong'),
('320321','3203','Sindangbarang'),
('320322','3203','Agrabinta'),
('320323','3203','Cidaun'),
('320324','3203','Naringgul'),
('320325','3203','Campakamulya'),
('320326','3203','Cikadu'),
('320327','3203','Gekbrong'),
('320328','3203','Cipanas'),
('320329','3203','Cijati'),
('320330','3203','Leles'),
('320331','3203','Haurwangi'),
('320332','3203','Pasirkuda'),
('320405','3204','Cileunyi'),
('320406','3204','Cimenyan'),
('320407','3204','Cilengkrang'),
('320408','3204','Bojongsoang'),
('320409','3204','Margahayu'),
('320410','3204','Margaasih'),
('320411','3204','Katapang'),
('320412','3204','Dayeuhkolot'),
('320413','3204','Banjaran'),
('320414','3204','Pameungpeuk'),
('320415','3204','Pangalengan'),
('320416','3204','Arjasari'),
('320417','3204','Cimaung'),
('320425','3204','Cicalengka'),
('320426','3204','Nagreg'),
('320427','3204','Cikancung'),
('320428','3204','Rancaekek'),
('320429','3204','Ciparay'),
('320430','3204','Pacet'),
('320431','3204','Kertasari'),
('320432','3204','Baleendah'),
('320433','3204','Majalaya'),
('320434','3204','Solokanjeruk'),
('320435','3204','Paseh'),
('320436','3204','Ibun'),
('320437','3204','Soreang'),
('320438','3204','Pasirjambu'),
('320439','3204','Ciwidey'),
('320440','3204','Rancabali'),
('320444','3204','Cangkuang'),
('320446','3204','Kutawaringin'),
('320501','3205','Garut Kota'),
('320502','3205','Karangpawitan'),
('320503','3205','Wanaraja'),
('320504','3205','Tarogong Kaler'),
('320505','3205','Tarogong Kidul'),
('320506','3205','Banyuresmi'),
('320507','3205','Samarang'),
('320508','3205','Pasirwangi'),
('320509','3205','Leles'),
('320510','3205','Kadungora'),
('320511','3205','Leuwigoong'),
('320512','3205','Cibatu'),
('320513','3205','Kersamanah'),
('320514','3205','Malangbong'),
('320515','3205','Sukawening'),
('320516','3205','Karangtengah'),
('320517','3205','Bayongbong'),
('320518','3205','Cigedug'),
('320519','3205','Cilawu'),
('320520','3205','Cisurupan'),
('320521','3205','Sukaresmi'),
('320522','3205','Cikajang'),
('320523','3205','Banjarwangi'),
('320524','3205','Singajaya'),
('320525','3205','Cihurip'),
('320526','3205','Peundeuy'),
('320527','3205','Pameungpeuk'),
('320528','3205','Cisompet'),
('320529','3205','Cibalong'),
('320530','3205','Cikelet'),
('320531','3205','Bungbulang'),
('320532','3205','Mekarmukti'),
('320533','3205','Pakenjeng'),
('320534','3205','Pamulihan'),
('320535','3205','Cisewu'),
('320536','3205','Caringin'),
('320537','3205','Talegong'),
('320538','3205','Bl. Limbangan'),
('320539','3205','Selaawi'),
('320540','3205','Cibiuk'),
('320541','3205','Pangatikan'),
('320542','3205','Sucinaraja'),
('320601','3206','Cipatujah'),
('320602','3206','Karangnunggal'),
('320603','3206','Cikalong'),
('320604','3206','Pancatengah'),
('320605','3206','Cikatomas'),
('320606','3206','Cibalong'),
('320607','3206','Parungponteng'),
('320608','3206','Bantarkalong'),
('320609','3206','Bojongasih'),
('320610','3206','Culamega'),
('320611','3206','Bojonggambir'),
('320612','3206','Sodonghilir'),
('320613','3206','Taraju'),
('320614','3206','Salawu'),
('320615','3206','Puspahiang'),
('320616','3206','Tanjungjaya'),
('320617','3206','Sukaraja'),
('320618','3206','Salopa'),
('320619','3206','Jatiwaras'),
('320620','3206','Cineam'),
('320621','3206','Karang Jaya'),
('320622','3206','Manonjaya'),
('320623','3206','Gunung Tanjung'),
('320624','3206','Singaparna'),
('320625','3206','Mangunreja'),
('320626','3206','Sukarame'),
('320627','3206','Cigalontang'),
('320628','3206','Leuwisari'),
('320629','3206','Padakembang'),
('320630','3206','Sariwangi'),
('320631','3206','Sukaratu'),
('320632','3206','Cisayong'),
('320633','3206','Sukahening'),
('320634','3206','Rajapolah'),
('320635','3206','Jamanis'),
('320636','3206','Ciawi'),
('320637','3206','Kadipaten'),
('320638','3206','Pagerageung'),
('320639','3206','Sukaresik'),
('320701','3207','Ciamis'),
('320702','3207','Cikoneng'),
('320703','3207','Cijeungjing'),
('320704','3207','Sadananya'),
('320705','3207','Cidolog'),
('320706','3207','Cihaurbeuti'),
('320707','3207','Panumbangan'),
('320708','3207','Panjalu'),
('320709','3207','Kawali'),
('320710','3207','Panawangan'),
('320711','3207','Cipaku'),
('320712','3207','Jatinagara'),
('320713','3207','Rajadesa'),
('320714','3207','Sukadana'),
('320715','3207','Rancah'),
('320716','3207','Tambaksari'),
('320717','3207','Lakbok'),
('320718','3207','Banjarsari'),
('320719','3207','Pamarican'),
('320729','3207','Cimaragas'),
('320730','3207','Cisaga'),
('320731','3207','Sindangkasih'),
('320732','3207','Baregbeg'),
('320733','3207','Sukamantri'),
('320734','3207','Lumbung'),
('320735','3207','Purwadadi'),
('320801','3208','Kadugede'),
('320802','3208','Ciniru'),
('320803','3208','Subang'),
('320804','3208','Ciwaru'),
('320805','3208','Cibingbin'),
('320806','3208','Luragung'),
('320807','3208','Lebakwangi'),
('320808','3208','Garawangi'),
('320809','3208','Kuningan'),
('320810','3208','Ciawigebang'),
('320811','3208','Cidahu'),
('320812','3208','Jalaksana'),
('320813','3208','Cilimus'),
('320814','3208','Mandirancan'),
('320815','3208','Selajambe'),
('320816','3208','Kramatmulya'),
('320817','3208','Darma'),
('320818','3208','Cigugur'),
('320819','3208','Pasawahan'),
('320820','3208','Nusaherang'),
('320821','3208','Cipicung'),
('320822','3208','Pancalang'),
('320823','3208','Japara'),
('320824','3208','Cimahi'),
('320825','3208','Cilebak'),
('320826','3208','Hantara'),
('320827','3208','Kalimanggis'),
('320828','3208','Cibeureum'),
('320829','3208','Karang Kancana'),
('320830','3208','Maleber'),
('320831','3208','Sindang Agung'),
('320832','3208','Cigandamekar'),
('320901','3209','Waled'),
('320902','3209','Ciledug'),
('320903','3209','Losari'),
('320904','3209','Pabedilan'),
('320905','3209','Babakan'),
('320906','3209','Karangsembung'),
('320907','3209','Lemahabang'),
('320908','3209','Susukan Lebak'),
('320909','3209','Sedong'),
('320910','3209','Astanajapura'),
('320911','3209','Pangenan'),
('320912','3209','Mundu'),
('320913','3209','Beber'),
('320914','3209','Talun'),
('320915','3209','Sumber'),
('320916','3209','Dukupuntang'),
('320917','3209','Palimanan'),
('320918','3209','Plumbon'),
('320919','3209','Weru'),
('320920','3209','Kedawung'),
('320921','3209','Gunung Jati'),
('320922','3209','Kapetakan'),
('320923','3209','Klangenan'),
('320924','3209','Arjawinangun'),
('320925','3209','Panguragan'),
('320926','3209','Ciwaringin'),
('320927','3209','Susukan'),
('320928','3209','Gegesik'),
('320929','3209','Kaliwedi'),
('320930','3209','Gebang'),
('320931','3209','Depok'),
('320932','3209','Pasaleman'),
('320933','3209','Pabuaran'),
('320934','3209','Karangwareng'),
('320935','3209','Tengah Tani'),
('320936','3209','Plered'),
('320937','3209','Gempol'),
('320938','3209','Greged'),
('320939','3209','Suranenggala'),
('320940','3209','Jamblang'),
('321001','3210','Lemahsugih'),
('321002','3210','Bantarujeg'),
('321003','3210','Cikijing'),
('321004','3210','Talaga'),
('321005','3210','Argapura'),
('321006','3210','Maja'),
('321007','3210','Majalengka'),
('321008','3210','Sukahaji'),
('321009','3210','Rajagaluh'),
('321010','3210','Leuwimunding'),
('321011','3210','Jatiwangi'),
('321012','3210','Dawuan'),
('321013','3210','Kadipaten'),
('321014','3210','Kertajati'),
('321015','3210','Jatitujuh'),
('321016','3210','Ligung'),
('321017','3210','Sumberjaya'),
('321018','3210','Panyingkiran'),
('321019','3210','Palasah'),
('321020','3210','Cigasong'),
('321021','3210','Sindangwangi'),
('321022','3210','Banjaran'),
('321023','3210','Cingambul'),
('321024','3210','Kasokandel'),
('321025','3210','Sindang'),
('321026','3210','Malausma'),
('321101','3211','Wado'),
('321102','3211','Jatinunggal'),
('321103','3211','Darmaraja'),
('321104','3211','Cibugel'),
('321105','3211','Cisitu'),
('321106','3211','Situraja'),
('321107','3211','Conggeang'),
('321108','3211','Paseh'),
('321109','3211','Surian'),
('321110','3211','Buahdua'),
('321111','3211','Tanjungsari'),
('321112','3211','Sukasari'),
('321113','3211','Pamulihan'),
('321114','3211','Cimanggung'),
('321115','3211','Jatinangor'),
('321116','3211','Rancakalong'),
('321117','3211','Sumedang Selatan'),
('321118','3211','Sumedang Utara'),
('321119','3211','Ganeas'),
('321120','3211','Tanjungkerta'),
('321121','3211','Tanjungmedar'),
('321122','3211','Cimalaka'),
('321123','3211','Cisarua'),
('321124','3211','Tomo'),
('321125','3211','Ujungjaya'),
('321126','3211','Jatigede'),
('321201','3212','Haurgeulis'),
('321202','3212','Kroya'),
('321203','3212','Gabuswetan'),
('321204','3212','Cikedung'),
('321205','3212','Lelea'),
('321206','3212','Bangodua'),
('321207','3212','Widasari'),
('321208','3212','Kertasemaya'),
('321209','3212','Krangkeng'),
('321210','3212','Karangampel'),
('321211','3212','Juntinyuat'),
('321212','3212','Sliyeg'),
('321213','3212','Jatibarang'),
('321214','3212','Balongan'),
('321215','3212','Indramayu'),
('321216','3212','Sindang'),
('321217','3212','Cantigi'),
('321218','3212','Lohbener'),
('321219','3212','Arahan'),
('321220','3212','Losarang'),
('321221','3212','Kandanghaur'),
('321222','3212','Bongas'),
('321223','3212','Anjatan'),
('321224','3212','Sukra'),
('321225','3212','Gantar'),
('321226','3212','Trisi'),
('321227','3212','Sukagumiwang'),
('321228','3212','Kedokan Bunder'),
('321229','3212','Pasekan'),
('321230','3212','Tukdana'),
('321231','3212','Patrol'),
('321301','3213','Sagalaherang'),
('321302','3213','Cisalak'),
('321303','3213','Subang'),
('321304','3213','Kalijati'),
('321305','3213','Pabuaran'),
('321306','3213','Purwadadi'),
('321307','3213','Pagaden'),
('321308','3213','Binong'),
('321309','3213','Ciasem'),
('321310','3213','Pusakanagara'),
('321311','3213','Pamanukan'),
('321312','3213','Jalancagak'),
('321313','3213','Blanakan'),
('321314','3213','Tanjungsiang'),
('321315','3213','Compreng'),
('321316','3213','Patokbeusi'),
('321317','3213','Cibogo'),
('321318','3213','Cipunagara'),
('321319','3213','Cijambe'),
('321320','3213','Cipeunduey'),
('321321','3213','Legonkulon'),
('321322','3213','Cikaum'),
('321323','3213','Serangpanjang'),
('321324','3213','Sukasari'),
('321325','3213','Tambakdahan'),
('321326','3213','Kasomalang'),
('321327','3213','Dawuan'),
('321328','3213','Pagaden Barat'),
('321329','3213','Ciater'),
('321330','3213','Pusakajaya'),
('321401','3214','Purwakarta'),
('321402','3214','Campaka'),
('321403','3214','Jatiluhur'),
('321404','3214','Plered'),
('321405','3214','Sukatani'),
('321406','3214','Darangdan'),
('321407','3214','Maniis'),
('321408','3214','Tegalwaru'),
('321409','3214','Wanayasa'),
('321410','3214','Pasawahan'),
('321411','3214','Bojong'),
('321412','3214','Babakancikao'),
('321413','3214','Bungursari'),
('321414','3214','Cibatu'),
('321415','3214','Sukasari'),
('321416','3214','Pondoksalam'),
('321417','3214','Kiarapedes'),
('321501','3215','Karawang Barat'),
('321502','3215','Pangkalan'),
('321503','3215','Telukjambe Timur'),
('321504','3215','Ciampel'),
('321505','3215','Klari'),
('321506','3215','Rengasdengklok'),
('321507','3215','Kutawaluya'),
('321508','3215','Batujaya'),
('321509','3215','Tirtajaya'),
('321510','3215','Pedes'),
('321511','3215','Cibuaya'),
('321512','3215','Pakisjaya'),
('321513','3215','Cikampek'),
('321514','3215','Jatisari'),
('321515','3215','Cilamaya Wetan'),
('321516','3215','Tirtamulya'),
('321517','3215','Telagasari'),
('321518','3215','Rawamerta'),
('321519','3215','Lemahabang'),
('321520','3215','Tempuran'),
('321521','3215','Majalaya'),
('321522','3215','Jayakerta'),
('321523','3215','Cilamaya Kulon'),
('321524','3215','Banyusari'),
('321525','3215','Kota Baru'),
('321526','3215','Karawang Timur'),
('321527','3215','Telukjambe Barat'),
('321528','3215','Tegalwaru'),
('321529','3215','Purwasari'),
('321530','3215','Cilebar'),
('321601','3216','Tarumajaya'),
('321602','3216','Babelan'),
('321603','3216','Sukawangi'),
('321604','3216','Tambelang'),
('321605','3216','Tambun Utara'),
('321606','3216','Tambun Selatan'),
('321607','3216','Cibitung'),
('321608','3216','Cikarang Barat'),
('321609','3216','Cikarang Utara'),
('321610','3216','Karang Bahagia'),
('321611','3216','Cikarang Timur'),
('321612','3216','Kedung Waringin'),
('321613','3216','Pebayuran'),
('321614','3216','Sukakarya'),
('321615','3216','Sukatani'),
('321616','3216','Cabangbungin'),
('321617','3216','Muaragembong'),
('321618','3216','Setu'),
('321619','3216','Cikarang Selatan'),
('321620','3216','Cikarang Pusat'),
('321621','3216','Serang Baru'),
('321622','3216','Cibarusah'),
('321623','3216','Bojongmangu'),
('321701','3217','Lembang'),
('321702','3217','Parongpong'),
('321703','3217','Cisarua'),
('321704','3217','Cikalongwetan'),
('321705','3217','Cipeundeuy'),
('321706','3217','Ngamprah'),
('321707','3217','Cipatat'),
('321708','3217','Padalarang'),
('321709','3217','Batujajar'),
('321710','3217','Cihampelas'),
('321711','3217','Cililin'),
('321712','3217','Cipongkor'),
('321713','3217','Rongga'),
('321714','3217','Sindangkerta'),
('321715','3217','Gununghalu'),
('321716','3217','Saguling'),
('321801','3218','Parigi'),
('321802','3218','Cijulang'),
('321803','3218','Cimerak'),
('321804','3218','Cigugur'),
('321805','3218','Langkaplancar'),
('321806','3218','Mangunjaya'),
('321807','3218','Padaherang'),
('321808','3218','Kalipucang'),
('321809','3218','Pangandaran'),
('321810','3218','Sidamulih'),
('327101','3271','Bogor Selatan'),
('327102','3271','Bogor Timur'),
('327103','3271','Bogor Tengah'),
('327104','3271','Bogor Barat'),
('327105','3271','Bogor Utara'),
('327106','3271','Tanah Sareal'),
('327201','3272','Gunung Puyuh'),
('327202','3272','Cikole'),
('327203','3272','Citamiang'),
('327204','3272','Warudoyong'),
('327205','3272','Baros'),
('327206','3272','Lembursitu'),
('327207','3272','Cibeureum'),
('327301','3273','Sukasari'),
('327302','3273','Coblong'),
('327303','3273','Babakan Ciparay'),
('327304','3273','Bojongloa Kaler'),
('327305','3273','Andir'),
('327306','3273','Cicendo'),
('327307','3273','Sukajadi'),
('327308','3273','Cidadap'),
('327309','3273','Bandung Wetan'),
('327310','3273','Astana Anyar'),
('327311','3273','Regol'),
('327312','3273','Batununggal'),
('327313','3273','Lengkong'),
('327314','3273','Cibeunying Kidul'),
('327315','3273','Bandung Kulon'),
('327316','3273','Kiaracondong'),
('327317','3273','Bojongloa Kidul'),
('327318','3273','Cibeunying Kaler'),
('327319','3273','Sumur Bandung'),
('327320','3273','Antapani'),
('327321','3273','Bandung Kidul'),
('327322','3273','Buahbatu'),
('327323','3273','Rancasari'),
('327324','3273','Arcamanik'),
('327325','3273','Cibiru'),
('327326','3273','Ujung Berung'),
('327327','3273','Gedebage'),
('327328','3273','Panyileukan'),
('327329','3273','Cinambo'),
('327330','3273','Mandalajati'),
('327401','3274','Kejaksan'),
('327402','3274','Lemah Wungkuk'),
('327403','3274','Harjamukti'),
('327404','3274','Pekalipan'),
('327405','3274','Kesambi'),
('327501','3275','Bekasi Timur'),
('327502','3275','Bekasi Barat'),
('327503','3275','Bekasi Utara'),
('327504','3275','Bekasi Selatan'),
('327505','3275','Rawa Lumbu'),
('327506','3275','Medan Satria'),
('327507','3275','Bantar Gebang'),
('327508','3275','Pondok Gede'),
('327509','3275','Jatiasih'),
('327510','3275','Jati Sempurna'),
('327511','3275','Mustika Jaya'),
('327512','3275','Pondok Melati'),
('327601','3276','Pancoran Mas'),
('327602','3276','Cimanggis'),
('327603','3276','Sawangan'),
('327604','3276','Limo'),
('327605','3276','Sukmajaya'),
('327606','3276','Beji'),
('327607','3276','Cipayung'),
('327608','3276','Cilodong'),
('327609','3276','Cinere'),
('327610','3276','Tapos'),
('327611','3276','Bojongsari'),
('327701','3277','Cimahi Selatan'),
('327702','3277','Cimahi Tengah'),
('327703','3277','Cimahi Utara'),
('327801','3278','Cihideung'),
('327802','3278','Cipedes'),
('327803','3278','Tawang'),
('327804','3278','Indihiang'),
('327805','3278','Kawalu'),
('327806','3278','Cibeureum'),
('327807','3278','Tamansari'),
('327808','3278','Mangkubumi'),
('327809','3278','Bungursari'),
('327810','3278','Purbaratu'),
('327901','3279','Banjar'),
('327902','3279','Pataruman'),
('327903','3279','Purwaharja'),
('327904','3279','Langensari'),
('330101','3301','Kedungreja'),
('330102','3301','Kesugihan'),
('330103','3301','Adipala'),
('330104','3301','Binangun'),
('330105','3301','Nusawungu'),
('330106','3301','Kroya'),
('330107','3301','Maos'),
('330108','3301','Jeruklegi'),
('330109','3301','Kawunganten'),
('330110','3301','Gandrungmangu'),
('330111','3301','Sidareja'),
('330112','3301','Karangpucung'),
('330113','3301','Cimanggu'),
('330114','3301','Majenang'),
('330115','3301','Wanareja'),
('330116','3301','Dayeuhluhur'),
('330117','3301','Sampang'),
('330118','3301','Cipari'),
('330119','3301','Patimuan'),
('330120','3301','Bantarsari'),
('330121','3301','Cilacap Selatan'),
('330122','3301','Cilacap Tengah'),
('330123','3301','Cilacap Utara'),
('330124','3301','Kampung Laut'),
('330201','3302','Lumbir'),
('330202','3302','Wangon'),
('330203','3302','Jatilawang'),
('330204','3302','Rawalo'),
('330205','3302','Kebasen'),
('330206','3302','Kemranjen'),
('330207','3302','Sumpiuh'),
('330208','3302','Tambak'),
('330209','3302','Somagede'),
('330210','3302','Kalibagor'),
('330211','3302','Banyumas'),
('330212','3302','Patikraja'),
('330213','3302','Purwojati'),
('330214','3302','Ajibarang'),
('330215','3302','Gumelar'),
('330216','3302','Pekuncen'),
('330217','3302','Cilongok'),
('330218','3302','Karanglewas'),
('330219','3302','Sokaraja'),
('330220','3302','Kembaran'),
('330221','3302','Sumbang'),
('330222','3302','Baturraden'),
('330223','3302','Kedungbanteng'),
('330224','3302','Purwokerto Selatan'),
('330225','3302','Purwokerto Barat'),
('330226','3302','Purwokerto Timur'),
('330227','3302','Purwokerto Utara'),
('330301','3303','Kemangkon'),
('330302','3303','Bukateja'),
('330303','3303','Kejobong'),
('330304','3303','Kaligondang'),
('330305','3303','Purbalingga'),
('330306','3303','Kalimanah'),
('330307','3303','Kutasari'),
('330308','3303','Mrebet'),
('330309','3303','Bobotsari'),
('330310','3303','Karangreja'),
('330311','3303','Karanganyar'),
('330312','3303','Karangmoncol'),
('330313','3303','Rembang'),
('330314','3303','Bojongsari'),
('330315','3303','Padamara'),
('330316','3303','Pengadegan'),
('330317','3303','Karangjambu'),
('330318','3303','Kertanegara'),
('330401','3304','Susukan'),
('330402','3304','Purworeja Klampok'),
('330403','3304','Mandiraja'),
('330404','3304','Purwanegara'),
('330405','3304','Bawang'),
('330406','3304','Banjarnegara'),
('330407','3304','Sigaluh'),
('330408','3304','Madukara'),
('330409','3304','Banjarmangu'),
('330410','3304','Wanadadi'),
('330411','3304','Rakit'),
('330412','3304','Punggelan'),
('330413','3304','Karangkobar'),
('330414','3304','Pagentan'),
('330415','3304','Pejawaran'),
('330416','3304','Batur'),
('330417','3304','Wanayasa'),
('330418','3304','Kalibening'),
('330419','3304','Pandanarum'),
('330420','3304','Pagedongan'),
('330501','3305','Ayah'),
('330502','3305','Buayan'),
('330503','3305','Puring'),
('330504','3305','Petanahan'),
('330505','3305','Klirong'),
('330506','3305','Buluspesantren'),
('330507','3305','Ambal'),
('330508','3305','Mirit'),
('330509','3305','Prembun'),
('330510','3305','Kutowinangun'),
('330511','3305','Alian'),
('330512','3305','Kebumen'),
('330513','3305','Pejagoan'),
('330514','3305','Sruweng'),
('330515','3305','Adimulyo'),
('330516','3305','Kuwarasan'),
('330517','3305','Rowokele'),
('330518','3305','Sempor'),
('330519','3305','Gombong'),
('330520','3305','Karanganyar'),
('330521','3305','Karanggayam'),
('330522','3305','Sadang'),
('330523','3305','Bonorowo'),
('330524','3305','Padureso'),
('330525','3305','Poncowarno'),
('330526','3305','Karangsambung'),
('330601','3306','Grabag'),
('330602','3306','Ngombol'),
('330603','3306','Purwodadi'),
('330604','3306','Bagelen'),
('330605','3306','Kaligesing'),
('330606','3306','Purworejo'),
('330607','3306','Banyuurip'),
('330608','3306','Bayan'),
('330609','3306','Kutoarjo'),
('330610','3306','Butuh'),
('330611','3306','Pituruh'),
('330612','3306','Kemiri'),
('330613','3306','Bruno'),
('330614','3306','Gebang'),
('330615','3306','Loano'),
('330616','3306','Bener'),
('330701','3307','Wadaslintang'),
('330702','3307','Kepil'),
('330703','3307','Sapuran'),
('330704','3307','Kaliwiro'),
('330705','3307','Leksono'),
('330706','3307','Selomerto'),
('330707','3307','Kalikajar'),
('330708','3307','Kertek'),
('330709','3307','Wonosobo'),
('330710','3307','Watumalang'),
('330711','3307','Mojotengah'),
('330712','3307','Garung'),
('330713','3307','Kejajar'),
('330714','3307','Sukoharjo'),
('330715','3307','Kalibawang'),
('330801','3308','Salaman'),
('330802','3308','Borobudur'),
('330803','3308','Ngluwar'),
('330804','3308','Salam'),
('330805','3308','Srumbung'),
('330806','3308','Dukun'),
('330807','3308','Sawangan'),
('330808','3308','Muntilan'),
('330809','3308','Mungkid'),
('330810','3308','Mertoyudan'),
('330811','3308','Tempuran'),
('330812','3308','Kajoran'),
('330813','3308','Kaliangkrik'),
('330814','3308','Bandongan'),
('330815','3308','Candimulyo'),
('330816','3308','Pakis'),
('330817','3308','Ngablak'),
('330818','3308','Grabag'),
('330819','3308','Tegalrejo'),
('330820','3308','Secang'),
('330821','3308','Windusari'),
('330901','3309','Selo'),
('330902','3309','Ampel'),
('330903','3309','Cepogo'),
('330904','3309','Musuk'),
('330905','3309','Boyolali'),
('330906','3309','Mojosongo'),
('330907','3309','Teras'),
('330908','3309','Sawit'),
('330909','3309','Banyudono'),
('330910','3309','Sambi'),
('330911','3309','Ngemplak'),
('330912','3309','Nogosari'),
('330913','3309','Simo'),
('330914','3309','Karanggede'),
('330915','3309','Klego'),
('330916','3309','Andong'),
('330917','3309','Kemusu'),
('330918','3309','Wonosegoro'),
('330919','3309','Juwangi'),
('331001','3310','Prambanan'),
('331002','3310','Gantiwarno'),
('331003','3310','Wedi'),
('331004','3310','Bayat'),
('331005','3310','Cawas'),
('331006','3310','Trucuk'),
('331007','3310','Kebonarum'),
('331008','3310','Jogonalan'),
('331009','3310','Manisrenggo'),
('331010','3310','Karangnongko'),
('331011','3310','Ceper'),
('331012','3310','Pedan'),
('331013','3310','Karangdowo'),
('331014','3310','Juwiring'),
('331015','3310','Wonosari'),
('331016','3310','Delanggu'),
('331017','3310','Polanharjo'),
('331018','3310','Karanganom'),
('331019','3310','Tulung'),
('331020','3310','Jatinom'),
('331021','3310','Kemalang'),
('331022','3310','Ngawen'),
('331023','3310','Kalikotes'),
('331024','3310','Klaten Utara'),
('331025','3310','Klaten Tengah'),
('331026','3310','Klaten Selatan'),
('331101','3311','Weru'),
('331102','3311','Bulu'),
('331103','3311','Tawangsari'),
('331104','3311','Sukoharjo'),
('331105','3311','Nguter'),
('331106','3311','Bendosari'),
('331107','3311','Polokarto'),
('331108','3311','Mojolaban'),
('331109','3311','Grogol'),
('331110','3311','Baki'),
('331111','3311','Gatak'),
('331112','3311','Kartasura'),
('331201','3312','Pracimantoro'),
('331202','3312','Giritontro'),
('331203','3312','Giriwoyo'),
('331204','3312','Batuwarno'),
('331205','3312','Tirtomoyo'),
('331206','3312','Nguntoronadi'),
('331207','3312','Baturetno'),
('331208','3312','Eromoko'),
('331209','3312','Wuryantoro'),
('331210','3312','Manyaran'),
('331211','3312','Selogiri'),
('331212','3312','Wonogiri'),
('331213','3312','Ngadirojo'),
('331214','3312','Sidoharjo'),
('331215','3312','Jatiroto'),
('331216','3312','Kismantoro'),
('331217','3312','Purwantoro'),
('331218','3312','Bulukerto'),
('331219','3312','Slogohimo'),
('331220','3312','Jatisrono'),
('331221','3312','Jatipurno'),
('331222','3312','Girimarto'),
('331223','3312','Karangtengah'),
('331224','3312','Paranggupito'),
('331225','3312','Puhpelem'),
('331301','3313','Jatipuro'),
('331302','3313','Jatiyoso'),
('331303','3313','Jumapolo'),
('331304','3313','Jumantono'),
('331305','3313','Matesih'),
('331306','3313','Tawangmangu'),
('331307','3313','Ngargoyoso'),
('331308','3313','Karangpandan'),
('331309','3313','Karanganyar'),
('331310','3313','Tasikmadu'),
('331311','3313','Jaten'),
('331312','3313','Colomadu'),
('331313','3313','Gondangrejo'),
('331314','3313','Kebakkramat'),
('331315','3313','Mojogedang'),
('331316','3313','Kerjo'),
('331317','3313','Jenawi'),
('331401','3314','Kalijambe'),
('331402','3314','Plupuh'),
('331403','3314','Masaran'),
('331404','3314','Kedawung'),
('331405','3314','Sambirejo'),
('331406','3314','Gondang'),
('331407','3314','Sambungmacan'),
('331408','3314','Ngrampal'),
('331409','3314','Karangmalang'),
('331410','3314','Sragen'),
('331411','3314','Sidoharjo'),
('331412','3314','Tanon'),
('331413','3314','Gemolong'),
('331414','3314','Miri'),
('331415','3314','Sumberlawang'),
('331416','3314','Mondokan'),
('331417','3314','Sukodono'),
('331418','3314','Gesi'),
('331419','3314','Tangen'),
('331420','3314','Jenar'),
('331501','3315','Kedungjati'),
('331502','3315','Karangrayung'),
('331503','3315','Penawangan'),
('331504','3315','Toroh'),
('331505','3315','Geyer'),
('331506','3315','Pulokulon'),
('331507','3315','Kradenan'),
('331508','3315','Gabus'),
('331509','3315','Ngaringan'),
('331510','3315','Wirosari'),
('331511','3315','Tawangharjo'),
('331512','3315','Grobogan'),
('331513','3315','Purwodadi'),
('331514','3315','Brati'),
('331515','3315','Klambu'),
('331516','3315','Godong'),
('331517','3315','Gubug'),
('331518','3315','Tegowanu'),
('331519','3315','Tanggungharjo'),
('331601','3316','Jati'),
('331602','3316','Randublatung'),
('331603','3316','Kradenan'),
('331604','3316','Kedungtuban'),
('331605','3316','Cepu'),
('331606','3316','Sambong'),
('331607','3316','Jiken'),
('331608','3316','Jepon'),
('331609','3316','Blora'),
('331610','3316','Tunjungan'),
('331611','3316','Banjarejo'),
('331612','3316','Ngawen'),
('331613','3316','Kunduran'),
('331614','3316','Todanan'),
('331615','3316','Bogorejo'),
('331616','3316','Japah'),
('331701','3317','Sumber'),
('331702','3317','Bulu'),
('331703','3317','Gunem'),
('331704','3317','Sale'),
('331705','3317','Sarang'),
('331706','3317','Sedan'),
('331707','3317','Pamotan'),
('331708','3317','Sulang'),
('331709','3317','Kaliori'),
('331710','3317','Rembang'),
('331711','3317','Pancur'),
('331712','3317','Kragan'),
('331713','3317','Sluke'),
('331714','3317','Lasem'),
('331801','3318','Sukolilo'),
('331802','3318','Kayen'),
('331803','3318','Tambakromo'),
('331804','3318','Winong'),
('331805','3318','Pucakwangi'),
('331806','3318','Jaken'),
('331807','3318','Batangan'),
('331808','3318','Juwana'),
('331809','3318','Jakenan'),
('331810','3318','Pati'),
('331811','3318','Gabus'),
('331812','3318','Margorejo'),
('331813','3318','Gembong'),
('331814','3318','Tlogowungu'),
('331815','3318','Wedarijaksa'),
('331816','3318','Margoyoso'),
('331817','3318','Gunungwungkal'),
('331818','3318','Cluwak'),
('331819','3318','Tayu'),
('331820','3318','Dukuhseti'),
('331821','3318','Trangkil'),
('331901','3319','Kaliwungu'),
('331902','3319','Kota Kudus'),
('331903','3319','Jati'),
('331904','3319','Undaan'),
('331905','3319','Mejobo'),
('331906','3319','Jekulo'),
('331907','3319','Bae'),
('331908','3319','Gebog'),
('331909','3319','Dawe'),
('332001','3320','Kedung'),
('332002','3320','Pecangaan'),
('332003','3320','Welahan'),
('332004','3320','Mayong'),
('332005','3320','Batealit'),
('332006','3320','Jepara'),
('332007','3320','Mlonggo'),
('332008','3320','Bangsri'),
('332009','3320','Keling'),
('332010','3320','Karimun Jawa'),
('332011','3320','Tahunan'),
('332012','3320','Nalumsari'),
('332013','3320','Kalinyamatan'),
('332014','3320','Kembang'),
('332015','3320','Pakis Aji'),
('332016','3320','Donorojo'),
('332101','3321','Mranggen'),
('332102','3321','Karangawen'),
('332103','3321','Guntur'),
('332104','3321','Sayung'),
('332105','3321','Karangtengah'),
('332106','3321','Wonosalam'),
('332107','3321','Dempet'),
('332108','3321','Gajah'),
('332109','3321','Karanganyar'),
('332110','3321','Mijen'),
('332111','3321','Demak'),
('332112','3321','Bonang'),
('332113','3321','Wedung'),
('332114','3321','Kebonagung'),
('332201','3322','Getasan'),
('332202','3322','Tengaran'),
('332203','3322','Susukan'),
('332204','3322','Suruh'),
('332205','3322','Pabelan'),
('332206','3322','Tuntang'),
('332207','3322','Banyubiru'),
('332208','3322','Jambu'),
('332209','3322','Sumowono'),
('332210','3322','Ambarawa'),
('332211','3322','Bawen'),
('332212','3322','Bringin'),
('332213','3322','Bergas'),
('332215','3322','Pringapus'),
('332216','3322','Bancak'),
('332217','3322','Kaliwungu'),
('332218','3322','Ungaran Barat'),
('332219','3322','Ungaran Timur'),
('332220','3322','Bandungan'),
('332301','3323','Bulu'),
('332302','3323','Tembarak'),
('332303','3323','Temanggung'),
('332304','3323','Pringsurat'),
('332305','3323','Kaloran'),
('332306','3323','Kandangan'),
('332307','3323','Kedu'),
('332308','3323','Parakan'),
('332309','3323','Ngadirejo'),
('332310','3323','Jumo'),
('332311','3323','Tretep'),
('332312','3323','Candiroto'),
('332313','3323','Kranggan'),
('332314','3323','Tlogomulyo'),
('332315','3323','Selopampang'),
('332316','3323','Bansari'),
('332317','3323','Kledung'),
('332318','3323','Bejen'),
('332319','3323','Wonoboyo'),
('332320','3323','Gemawang'),
('332401','3324','Plantungan'),
('332402','3324','Pageruyung'),
('332403','3324','Sukorejo'),
('332404','3324','Patean'),
('332405','3324','Singorojo'),
('332406','3324','Limbangan'),
('332407','3324','Boja'),
('332408','3324','Kaliwungu'),
('332409','3324','Brangsong'),
('332410','3324','Pegandon'),
('332411','3324','Gemuh'),
('332412','3324','Weleri'),
('332413','3324','Cepiring'),
('332414','3324','Patebon'),
('332415','3324','Kendal'),
('332416','3324','Rowosari'),
('332417','3324','Kangkung'),
('332418','3324','Ringinarum'),
('332419','3324','Ngampel'),
('332420','3324','Kaliwungu Selatan'),
('332501','3325','Wonotunggal'),
('332502','3325','Bandar'),
('332503','3325','Blado'),
('332504','3325','Reban'),
('332505','3325','Bawang'),
('332506','3325','Tersono'),
('332507','3325','Gringsing'),
('332508','3325','Limpung'),
('332509','3325','Subah'),
('332510','3325','Tulis'),
('332511','3325','Batang'),
('332512','3325','Warungasem'),
('332513','3325','Kandeman'),
('332514','3325','Pecalungan'),
('332515','3325','Banyuputih'),
('332601','3326','Kandangserang'),
('332602','3326','Paninggaran'),
('332603','3326','Lebakbarang'),
('332604','3326','Petungkriyono'),
('332605','3326','Talun'),
('332606','3326','Doro'),
('332607','3326','Karanganyar'),
('332608','3326','Kajen'),
('332609','3326','Kesesi'),
('332610','3326','Sragi'),
('332611','3326','Bojong'),
('332612','3326','Wonopringgo'),
('332613','3326','Kedungwuni'),
('332614','3326','Buaran'),
('332615','3326','Tirto'),
('332616','3326','Wiradesa'),
('332617','3326','Siwalan'),
('332618','3326','Karangdadap'),
('332619','3326','Wonokerto'),
('332701','3327','Moga'),
('332702','3327','Pulosari'),
('332703','3327','Belik'),
('332704','3327','Watukumpul'),
('332705','3327','Bodeh'),
('332706','3327','Bantarbolang'),
('332707','3327','Randudongkal'),
('332708','3327','Pemalang'),
('332709','3327','Taman'),
('332710','3327','Petarukan'),
('332711','3327','Ampelgading'),
('332712','3327','Comal'),
('332713','3327','Ulujami'),
('332714','3327','Warungpring'),
('332801','3328','Margasari'),
('332802','3328','Bumijawa'),
('332803','3328','Bojong'),
('332804','3328','Balapulang'),
('332805','3328','Pagerbarang'),
('332806','3328','Lebaksiu'),
('332807','3328','Jatinegara'),
('332808','3328','Kedungbanteng'),
('332809','3328','Pangkah'),
('332810','3328','Slawi'),
('332811','3328','Adiwerna'),
('332812','3328','Talang'),
('332813','3328','Dukuhturi'),
('332814','3328','Tarub'),
('332815','3328','Kramat'),
('332816','3328','Suradadi'),
('332817','3328','Warureja'),
('332818','3328','Dukuhwaru'),
('332901','3329','Salem'),
('332902','3329','Bantarkawung'),
('332903','3329','Bumiayu'),
('332904','3329','Paguyangan'),
('332905','3329','Sirampog'),
('332906','3329','Tonjong'),
('332907','3329','Jatibarang'),
('332908','3329','Wanasari'),
('332909','3329','Brebes'),
('332910','3329','Songgom'),
('332911','3329','Kersana'),
('332912','3329','Losari'),
('332913','3329','Tanjung'),
('332914','3329','Bulakamba'),
('332915','3329','Larangan'),
('332916','3329','Ketanggungan'),
('332917','3329','Banjarharjo'),
('337101','3371','Magelang Selatan'),
('337102','3371','Magelang Utara'),
('337103','3371','Magelang Tengah'),
('337201','3372','Laweyan'),
('337202','3372','Serengan'),
('337203','3372','Pasar Kliwon'),
('337204','3372','Jebres'),
('337205','3372','Banjarsari'),
('337301','3373','Sidorejo'),
('337302','3373','Tingkir'),
('337303','3373','Argomulyo'),
('337304','3373','Sidomukti'),
('337401','3374','Semarang Tengah'),
('337402','3374','Semarang Utara'),
('337403','3374','Semarang Timur'),
('337404','3374','Gayamsari'),
('337405','3374','Genuk'),
('337406','3374','Pedurungan'),
('337407','3374','Semarang Selatan'),
('337408','3374','Candisari'),
('337409','3374','Gajahmungkur'),
('337410','3374','Tembalang'),
('337411','3374','Banyumanik'),
('337412','3374','Gunungpati'),
('337413','3374','Semarang Barat'),
('337414','3374','Mijen'),
('337415','3374','Ngaliyan'),
('337416','3374','Tugu'),
('337501','3375','Pekalongan Barat'),
('337502','3375','Pekalongan Timur'),
('337503','3375','Pekalongan Utara'),
('337504','3375','Pekalongan Selatan'),
('337601','3376','Tegal Barat'),
('337602','3376','Tegal Timur'),
('337603','3376','Tegal Selatan'),
('337604','3376','Margadana'),
('340101','3401','Temon'),
('340102','3401','Wates'),
('340103','3401','Panjatan'),
('340104','3401','Galur'),
('340105','3401','Lendah'),
('340106','3401','Sentolo'),
('340107','3401','Pengasih'),
('340108','3401','Kokap'),
('340109','3401','Girimulyo'),
('340110','3401','Nanggulan'),
('340111','3401','Samigaluh'),
('340112','3401','Kalibawang'),
('340201','3402','Srandakan'),
('340202','3402','Sanden'),
('340203','3402','Kretek'),
('340204','3402','Pundong'),
('340205','3402','Bambang Lipuro'),
('340206','3402','Pandak'),
('340207','3402','Pajangan'),
('340208','3402','Bantul'),
('340209','3402','Jetis'),
('340210','3402','Imogiri'),
('340211','3402','Dlingo'),
('340212','3402','Banguntapan'),
('340213','3402','Pleret'),
('340214','3402','Piyungan'),
('340215','3402','Sewon'),
('340216','3402','Kasihan'),
('340217','3402','Sedayu'),
('340301','3403','Wonosari'),
('340302','3403','Nglipar'),
('340303','3403','Playen'),
('340304','3403','Patuk'),
('340305','3403','Paliyan'),
('340306','3403','Panggang'),
('340307','3403','Tepus'),
('340308','3403','Semanu'),
('340309','3403','Karangmojo'),
('340310','3403','Ponjong'),
('340311','3403','Rongkop'),
('340312','3403','Semin'),
('340313','3403','Ngawen'),
('340314','3403','Gedangsari'),
('340315','3403','Saptosari'),
('340316','3403','Girisubo'),
('340317','3403','Tanjungsari'),
('340318','3403','Purwosari'),
('340401','3404','Gamping'),
('340402','3404','Godean'),
('340403','3404','Moyudan'),
('340404','3404','Minggir'),
('340405','3404','Seyegan'),
('340406','3404','Mlati'),
('340407','3404','Depok'),
('340408','3404','Berbah'),
('340409','3404','Prambanan'),
('340410','3404','Kalasan'),
('340411','3404','Ngemplak'),
('340412','3404','Ngaglik'),
('340413','3404','Sleman'),
('340414','3404','Tempel'),
('340415','3404','Turi'),
('340416','3404','Pakem'),
('340417','3404','Cangkringan'),
('347101','3471','Tegalrejo'),
('347102','3471','Jetis'),
('347103','3471','Gondokusuman'),
('347104','3471','Danurejan'),
('347105','3471','Gedongtengen'),
('347106','3471','Ngampilan'),
('347107','3471','Wirobrajan'),
('347108','3471','Mantrijeron'),
('347109','3471','Kraton'),
('347110','3471','Gondomanan'),
('347111','3471','Pakualaman'),
('347112','3471','Mergangsan'),
('347113','3471','Umbulharjo'),
('347114','3471','Kotagede'),
('350101','3501','Donorojo'),
('350102','3501','Pringkuku'),
('350103','3501','Punung'),
('350104','3501','Pacitan'),
('350105','3501','Kebonagung'),
('350106','3501','Arjosari'),
('350107','3501','Nawangan'),
('350108','3501','Bandar'),
('350109','3501','Tegalombo'),
('350110','3501','Tulakan'),
('350111','3501','Ngadirojo'),
('350112','3501','Sudimoro'),
('350201','3502','Slahung'),
('350202','3502','Ngrayun'),
('350203','3502','Bungkal'),
('350204','3502','Sambit'),
('350205','3502','Sawoo'),
('350206','3502','Sooko'),
('350207','3502','Pulung'),
('350208','3502','Mlarak'),
('350209','3502','Jetis'),
('350210','3502','Siman'),
('350211','3502','Balong'),
('350212','3502','Kauman'),
('350213','3502','Badegan'),
('350214','3502','Sampung'),
('350215','3502','Sukorejo'),
('350216','3502','Babadan'),
('350217','3502','Ponorogo'),
('350218','3502','Jenangan'),
('350219','3502','Ngebel'),
('350220','3502','Jambon'),
('350221','3502','Pudak'),
('350301','3503','Panggul'),
('350302','3503','Munjungan'),
('350303','3503','Pule'),
('350304','3503','Dongko'),
('350305','3503','Tugu'),
('350306','3503','Karangan'),
('350307','3503','Kampak'),
('350308','3503','Watulimo'),
('350309','3503','Bendungan'),
('350310','3503','Gandusari'),
('350311','3503','Trenggalek'),
('350312','3503','Pogalan'),
('350313','3503','Durenan'),
('350314','3503','Suruh'),
('350401','3504','Tulungagung'),
('350402','3504','Boyolangu'),
('350403','3504','Kedungwaru'),
('350404','3504','Ngantru'),
('350405','3504','Kauman'),
('350406','3504','Pagerwojo'),
('350407','3504','Sendang'),
('350408','3504','Karangrejo'),
('350409','3504','Gondang'),
('350410','3504','Sumbergempol'),
('350411','3504','Ngunut'),
('350412','3504','Pucanglaban'),
('350413','3504','Rejotangan'),
('350414','3504','Kalidawir'),
('350415','3504','Besuki'),
('350416','3504','Campurdarat'),
('350417','3504','Bandung'),
('350418','3504','Pakel'),
('350419','3504','Tanggunggunung'),
('350501','3505','Wonodadi'),
('350502','3505','Udanawu'),
('350503','3505','Srengat'),
('350504','3505','Kademangan'),
('350505','3505','Bakung'),
('350506','3505','Ponggok'),
('350507','3505','Sanankulon'),
('350508','3505','Wonotirto'),
('350509','3505','Nglegok'),
('350510','3505','Kanigoro'),
('350511','3505','Garum'),
('350512','3505','Sutojayan'),
('350513','3505','Panggungrejo'),
('350514','3505','Talun'),
('350515','3505','Gandusari'),
('350516','3505','Binangun'),
('350517','3505','Wlingi'),
('350518','3505','Doko'),
('350519','3505','Kesamben'),
('350520','3505','Wates'),
('350521','3505','Selorejo'),
('350522','3505','Selopuro'),
('350601','3506','Semen'),
('350602','3506','Mojo'),
('350603','3506','Kras'),
('350604','3506','Ngadiluwih'),
('350605','3506','Kandat'),
('350606','3506','Wates'),
('350607','3506','Ngancar'),
('350608','3506','Puncu'),
('350609','3506','Plosoklaten'),
('350610','3506','Gurah'),
('350611','3506','Pagu'),
('350612','3506','Gampengrejo'),
('350613','3506','Grogol'),
('350614','3506','Papar'),
('350615','3506','Purwoasri'),
('350616','3506','Plemahan'),
('350617','3506','Pare'),
('350618','3506','Kepung'),
('350619','3506','Kandangan'),
('350620','3506','Tarokan'),
('350621','3506','Kunjang'),
('350622','3506','Banyakan'),
('350623','3506','Ringinrejo'),
('350624','3506','Kayen Kidul'),
('350625','3506','Ngasem'),
('350626','3506','Badas'),
('350701','3507','Donomulyo'),
('350702','3507','Pagak'),
('350703','3507','Bantur'),
('350704','3507','Sumbermanjing Wetan'),
('350705','3507','Dampit'),
('350706','3507','Ampelgading'),
('350707','3507','Poncokusumo'),
('350708','3507','Wajak'),
('350709','3507','Turen'),
('350710','3507','Gondanglegi'),
('350711','3507','Kalipare'),
('350712','3507','Sumberpucung'),
('350713','3507','Kepanjen'),
('350714','3507','Bululawang'),
('350715','3507','Tajinan'),
('350716','3507','Tumpang'),
('350717','3507','Jabung'),
('350718','3507','Pakis'),
('350719','3507','Pakisaji'),
('350720','3507','Ngajung'),
('350721','3507','Wagir'),
('350722','3507','Dau'),
('350723','3507','Karang Ploso'),
('350724','3507','Singosari'),
('350725','3507','Lawang'),
('350726','3507','Pujon'),
('350727','3507','Ngantang'),
('350728','3507','Kasembon'),
('350729','3507','Gedangan'),
('350730','3507','Tirtoyudo'),
('350731','3507','Kromengan'),
('350732','3507','Wonosari'),
('350733','3507','Pagelaran'),
('350801','3508','Tempursari'),
('350802','3508','Pronojiwo'),
('350803','3508','Candipuro'),
('350804','3508','Pasirian'),
('350805','3508','Tempeh'),
('350806','3508','Kunir'),
('350807','3508','Yosowilangun'),
('350808','3508','Rowokangkung'),
('350809','3508','Tekung'),
('350810','3508','Lumajang'),
('350811','3508','Pasrujambe'),
('350812','3508','Senduro'),
('350813','3508','Gucialit'),
('350814','3508','Padang'),
('350815','3508','Sukodono'),
('350816','3508','Kedungjajang'),
('350817','3508','Jatiroto'),
('350818','3508','Randuagung'),
('350819','3508','Klakah'),
('350820','3508','Ranuyoso'),
('350821','3508','Sumbersuko'),
('350901','3509','Jombang'),
('350902','3509','Kencong'),
('350903','3509','Sumberbaru'),
('350904','3509','Gumukmas'),
('350905','3509','Umbulsari'),
('350906','3509','Tanggul'),
('350907','3509','Semboro'),
('350908','3509','Puger'),
('350909','3509','Bangsalsari'),
('350910','3509','Balung'),
('350911','3509','Wuluhan'),
('350912','3509','Ambulu'),
('350913','3509','Rambipuji'),
('350914','3509','Panti'),
('350915','3509','Sukorambi'),
('350916','3509','Jenggawah'),
('350917','3509','Ajung'),
('350918','3509','Tempurejo'),
('350919','3509','Kaliwates'),
('350920','3509','Patrang'),
('350921','3509','Sumbersari'),
('350922','3509','Arjasa'),
('350923','3509','Mumbulsari'),
('350924','3509','Pakusari'),
('350925','3509','Jelbuk'),
('350926','3509','Mayang'),
('350927','3509','Kalisat'),
('350928','3509','Ledokombo'),
('350929','3509','Sukowono'),
('350930','3509','Silo'),
('350931','3509','Sumberjambe'),
('351001','3510','Pesanggaran'),
('351002','3510','Bangorejo'),
('351003','3510','Purwoharjo'),
('351004','3510','Tegaldlimo'),
('351005','3510','Muncar'),
('351006','3510','Cluring'),
('351007','3510','Gambiran'),
('351008','3510','Srono'),
('351009','3510','Genteng'),
('351010','3510','Glenmore'),
('351011','3510','Kalibaru'),
('351012','3510','Singojuruh'),
('351013','3510','Rogojampi'),
('351014','3510','Kabat'),
('351015','3510','Glagah'),
('351016','3510','Banyuwangi'),
('351017','3510','Giri'),
('351018','3510','Wongsorejo'),
('351019','3510','Songgon'),
('351020','3510','Sempu'),
('351021','3510','Kalipuro'),
('351022','3510','Siliragung'),
('351023','3510','Tegalsari'),
('351024','3510','Licin'),
('351101','3511','Maesan'),
('351102','3511','Tamanan'),
('351103','3511','Tlogosari'),
('351104','3511','Sukosari'),
('351105','3511','Pujer'),
('351106','3511','Grujugan'),
('351107','3511','Curahdami'),
('351108','3511','Tenggarang'),
('351109','3511','Wonosari'),
('351110','3511','Tapen'),
('351111','3511','Bondowoso'),
('351112','3511','Wringin'),
('351113','3511','Tegalampel'),
('351114','3511','Klabang'),
('351115','3511','Cermee'),
('351116','3511','Prajekan'),
('351117','3511','Pakem'),
('351118','3511','Sumberwringin'),
('351119','3511','Sempol'),
('351120','3511','Binakal'),
('351121','3511','Taman Krocok'),
('351122','3511','Botolinggo'),
('351123','3511','Jambesari Darus Sholah'),
('351201','3512','Jatibanteng'),
('351202','3512','Besuki'),
('351203','3512','Suboh'),
('351204','3512','Mlandingan'),
('351205','3512','Kendit'),
('351206','3512','Panarukan'),
('351207','3512','Situbondo'),
('351208','3512','Panji'),
('351209','3512','Mangaran'),
('351210','3512','Kapongan'),
('351211','3512','Arjasa'),
('351212','3512','Jangkar'),
('351213','3512','Asembagus'),
('351214','3512','Banyuputih'),
('351215','3512','Sumbermalang'),
('351216','3512','Banyuglugur'),
('351217','3512','Bungatan'),
('351301','3513','Sukapura'),
('351302','3513','Sumber'),
('351303','3513','Kuripan'),
('351304','3513','Bantaran'),
('351305','3513','Leces'),
('351306','3513','Banyuanyar'),
('351307','3513','Tiris'),
('351308','3513','Krucil'),
('351309','3513','Gading'),
('351310','3513','Pakuniran'),
('351311','3513','Kotaanyar'),
('351312','3513','Paiton'),
('351313','3513','Besuk'),
('351314','3513','Kraksaan'),
('351315','3513','Krejengan'),
('351316','3513','Pejarakan'),
('351317','3513','Maron'),
('351318','3513','Gending'),
('351319','3513','Dringu'),
('351320','3513','Tegalsiwalan'),
('351321','3513','Sumberasih'),
('351322','3513','Wonomerto'),
('351323','3513','Tongas'),
('351324','3513','Lumbang'),
('351401','3514','Purwodadi'),
('351402','3514','Tutur'),
('351403','3514','Puspo'),
('351404','3514','Lumbang'),
('351405','3514','Pasrepan'),
('351406','3514','Kejayan'),
('351407','3514','Wonorejo'),
('351408','3514','Purwosari'),
('351409','3514','Sukorejo'),
('351410','3514','Prigen'),
('351411','3514','Pandaan'),
('351412','3514','Gempol'),
('351413','3514','Beji'),
('351414','3514','Bangil'),
('351415','3514','Rembang'),
('351416','3514','Kraton'),
('351417','3514','Pohjentrek'),
('351418','3514','Gondangwetan'),
('351419','3514','Winongan'),
('351420','3514','Grati'),
('351421','3514','Nguling'),
('351422','3514','Lekok'),
('351423','3514','Rejoso'),
('351424','3514','Tosari'),
('351501','3515','Tarik'),
('351502','3515','Prambon'),
('351503','3515','Krembung'),
('351504','3515','Porong'),
('351505','3515','Jabon'),
('351506','3515','Tanggulangin'),
('351507','3515','Candi'),
('351508','3515','Sidoarjo'),
('351509','3515','Tulangan'),
('351510','3515','Wonoayu'),
('351511','3515','Krian'),
('351512','3515','Balongbendo'),
('351513','3515','Taman'),
('351514','3515','Sukodono'),
('351515','3515','Buduran'),
('351516','3515','Gedangan'),
('351517','3515','Sedati'),
('351518','3515','Waru'),
('351601','3516','Jatirejo'),
('351602','3516','Gondang'),
('351603','3516','Pacet'),
('351604','3516','Trawas'),
('351605','3516','Ngoro'),
('351606','3516','Pungging'),
('351607','3516','Kutorejo'),
('351608','3516','Mojosari'),
('351609','3516','Dlanggu'),
('351610','3516','Bangsal'),
('351611','3516','Puri'),
('351612','3516','Trowulan'),
('351613','3516','Sooko'),
('351614','3516','Gedeg'),
('351615','3516','Kemlagi'),
('351616','3516','Jetis'),
('351617','3516','Dawarblandong'),
('351618','3516','Mojoanyar'),
('351701','3517','Perak'),
('351702','3517','Gudo'),
('351703','3517','Ngoro'),
('351704','3517','Bareng'),
('351705','3517','Wonosalam'),
('351706','3517','Mojoagung'),
('351707','3517','Mojowarno'),
('351708','3517','Diwek'),
('351709','3517','Jombang'),
('351710','3517','Peterongan'),
('351711','3517','Sumobito'),
('351712','3517','Kesamben'),
('351713','3517','Tembelang'),
('351714','3517','Ploso'),
('351715','3517','Plandaan'),
('351716','3517','Kabuh'),
('351717','3517','Kudu'),
('351718','3517','Bandarkedungmulyo'),
('351719','3517','Jogoroto'),
('351720','3517','Megaluh'),
('351721','3517','Ngusikan'),
('351801','3518','Sawahan'),
('351802','3518','Ngetos'),
('351803','3518','Berbek'),
('351804','3518','Loceret'),
('351805','3518','Pace'),
('351806','3518','Prambon'),
('351807','3518','Ngronggot'),
('351808','3518','Kertosono'),
('351809','3518','Patianrowo'),
('351810','3518','Baron'),
('351811','3518','Tanjunganom'),
('351812','3518','Sukomoro'),
('351813','3518','Nganjuk'),
('351814','3518','Bagor'),
('351815','3518','Wilangan'),
('351816','3518','Rejoso'),
('351817','3518','Gondang'),
('351818','3518','Ngluyu'),
('351819','3518','Lengkong'),
('351820','3518','Jatikalen'),
('351901','3519','Kebon Sari'),
('351902','3519','Dolopo'),
('351903','3519','Geger'),
('351904','3519','Dagangan'),
('351905','3519','Kare'),
('351906','3519','Gemarang'),
('351907','3519','Wungu'),
('351908','3519','Madiun'),
('351909','3519','Jiwan'),
('351910','3519','Balerejo'),
('351911','3519','Mejayan'),
('351912','3519','Saradan'),
('351913','3519','Pilangkenceng'),
('351914','3519','Sawahan'),
('351915','3519','Wonoasri'),
('352001','3520','Poncol'),
('352002','3520','Parang'),
('352003','3520','Lembeyan'),
('352004','3520','Takeran'),
('352005','3520','Kawedanan'),
('352006','3520','Magetan'),
('352007','3520','Plaosan'),
('352008','3520','Panekan'),
('352009','3520','Sukomoro'),
('352010','3520','Bendo'),
('352011','3520','Maospati'),
('352012','3520','Barat'),
('352013','3520','Karangrejo'),
('352014','3520','Karas'),
('352015','3520','Kartoharjo'),
('352016','3520','Ngariboyo'),
('352017','3520','Nguntoronadi'),
('352018','3520','Sidorejo'),
('352101','3521','Sine'),
('352102','3521','Ngrambe'),
('352103','3521','Jogorogo'),
('352104','3521','Kendal'),
('352105','3521','Geneng'),
('352106','3521','Kwadungan'),
('352107','3521','Karangjati'),
('352108','3521','Padas'),
('352109','3521','Ngawi'),
('352110','3521','Paron'),
('352111','3521','Kedunggalar'),
('352112','3521','Widodaren'),
('352113','3521','Mantingan'),
('352114','3521','Pangkur'),
('352115','3521','Bringin'),
('352116','3521','Pitu'),
('352117','3521','Karanganyar'),
('352118','3521','Gerih'),
('352119','3521','Kasreman'),
('352201','3522','Ngraho'),
('352202','3522','Tambakrejo'),
('352203','3522','Ngambon'),
('352204','3522','Ngasem'),
('352205','3522','Bubulan'),
('352206','3522','Dander'),
('352207','3522','Sugihwaras'),
('352208','3522','Kedungadem'),
('352209','3522','Kepoh Baru'),
('352210','3522','Baureno'),
('352211','3522','Kanor'),
('352212','3522','Sumberejo'),
('352213','3522','Balen'),
('352214','3522','Kapas'),
('352215','3522','Bojonegoro'),
('352216','3522','Kalitidu'),
('352217','3522','Malo'),
('352218','3522','Purwosari'),
('352219','3522','Padangan'),
('352220','3522','Kasiman'),
('352221','3522','Temayang'),
('352222','3522','Margomulyo'),
('352223','3522','Trucuk'),
('352224','3522','Sukosewu'),
('352225','3522','Kedewan'),
('352226','3522','Gondang'),
('352227','3522','Sekar'),
('352228','3522','Gayam'),
('352301','3523','Kenduruan'),
('352302','3523','Jatirogo'),
('352303','3523','Bangilan'),
('352304','3523','Bancar'),
('352305','3523','Senori'),
('352306','3523','Tambakboyo'),
('352307','3523','Singgahan'),
('352308','3523','Kerek'),
('352309','3523','Parengan'),
('352310','3523','Montong'),
('352311','3523','Soko'),
('352312','3523','Jenu'),
('352313','3523','Merakurak'),
('352314','3523','Rengel'),
('352315','3523','Semanding'),
('352316','3523','Tuban'),
('352317','3523','Plumpang'),
('352318','3523','Palang'),
('352319','3523','Widang'),
('352320','3523','Grabagan'),
('352401','3524','Sukorame'),
('352402','3524','Bluluk'),
('352403','3524','Modo'),
('352404','3524','Ngimbang'),
('352405','3524','Babat'),
('352406','3524','Kedungpring'),
('352407','3524','Brondong'),
('352408','3524','Laren'),
('352409','3524','Sekaran'),
('352410','3524','Maduran'),
('352411','3524','Sambeng'),
('352412','3524','Sugio'),
('352413','3524','Pucuk'),
('352414','3524','Paciran'),
('352415','3524','Solokuro'),
('352416','3524','Mantup'),
('352417','3524','Sukodadi'),
('352418','3524','Karanggeneng'),
('352419','3524','Kembangbahu'),
('352420','3524','Kalitengah'),
('352421','3524','Turi'),
('352422','3524','Lamongan'),
('352423','3524','Tikung'),
('352424','3524','Karangbinangun'),
('352425','3524','Deket'),
('352426','3524','Glagah'),
('352427','3524','Sarirejo'),
('352501','3525','Dukun'),
('352502','3525','Balongpanggang'),
('352503','3525','Panceng'),
('352504','3525','Benjeng'),
('352505','3525','Duduksampeyan'),
('352506','3525','Wringinanom'),
('352507','3525','Ujungpangkah'),
('352508','3525','Kedamean'),
('352509','3525','Sidayu'),
('352510','3525','Manyar'),
('352511','3525','Cerme'),
('352512','3525','Bungah'),
('352513','3525','Menganti'),
('352514','3525','Kebomas'),
('352515','3525','Driyorejo'),
('352516','3525','Gresik'),
('352517','3525','Sangkapura'),
('352518','3525','Tambak'),
('352601','3526','Bangkalan'),
('352602','3526','Socah'),
('352603','3526','Burneh'),
('352604','3526','Kamal'),
('352605','3526','Arosbaya'),
('352606','3526','Geger'),
('352607','3526','Klampis'),
('352608','3526','Sepulu'),
('352609','3526','Tanjung Bumi'),
('352610','3526','Kokop'),
('352611','3526','Kwanyar'),
('352612','3526','Labang'),
('352613','3526','Tanah Merah'),
('352614','3526','Tragah'),
('352615','3526','Blega'),
('352616','3526','Modung'),
('352617','3526','Konang'),
('352618','3526','Galis'),
('352701','3527','Sreseh'),
('352702','3527','Torjun'),
('352703','3527','Sampang'),
('352704','3527','Camplong'),
('352705','3527','Omben'),
('352706','3527','Kedungdung'),
('352707','3527','Jrengik'),
('352708','3527','Tambelangan'),
('352709','3527','Banyuates'),
('352710','3527','Robatal'),
('352711','3527','Sokobanah'),
('352712','3527','Ketapang'),
('352713','3527','Pangarengan'),
('352714','3527','Karangpenang'),
('352801','3528','Tlanakan'),
('352802','3528','Pademawu'),
('352803','3528','Galis'),
('352804','3528','Pamekasan'),
('352805','3528','Proppo'),
('352806','3528','Palenga\"an'),
('352807','3528','Pegantenan'),
('352808','3528','Larangan'),
('352809','3528','Pakong'),
('352810','3528','Waru'),
('352811','3528','Batumarmar'),
('352812','3528','Kadur'),
('352813','3528','Pasean'),
('352901','3529','Kota Sumenep'),
('352902','3529','Kalianget'),
('352903','3529','Manding'),
('352904','3529','Talango'),
('352905','3529','Bluto'),
('352906','3529','Saronggi'),
('352907','3529','Lenteng'),
('352908','3529','Gili Ginting'),
('352909','3529','Guluk-Guluk'),
('352910','3529','Ganding'),
('352911','3529','Pragaan'),
('352912','3529','Ambunten'),
('352913','3529','Pasongsongan'),
('352914','3529','Dasuk'),
('352915','3529','Rubaru'),
('352916','3529','Batang Batang'),
('352917','3529','Batu Putih'),
('352918','3529','Dungkek'),
('352919','3529','Gapura'),
('352920','3529','Gayam'),
('352921','3529','Nonggunong'),
('352922','3529','Ra\"as'),
('352923','3529','Masalembu'),
('352924','3529','Arjasa'),
('352925','3529','Sapeken'),
('352926','3529','Batuan'),
('352927','3529','Kangayan'),
('357101','3571','Mojoroto'),
('357102','3571','Kota'),
('357103','3571','Pesantren'),
('357201','3572','Kepanjenkidul'),
('357202','3572','Sukorejo'),
('357203','3572','Sananwetan'),
('357301','3573','Blimbing'),
('357302','3573','Klojen'),
('357303','3573','Kedungkandang'),
('357304','3573','Sukun'),
('357305','3573','Lowokwaru'),
('357401','3574','Kademangan'),
('357402','3574','Wonoasih'),
('357403','3574','Mayangan'),
('357404','3574','Kanigaran'),
('357405','3574','Kedopak'),
('357501','3575','Gadingrejo'),
('357502','3575','Purworejo'),
('357503','3575','Bugul Kidul'),
('357504','3575','Panggungrejo'),
('357601','3576','Prajurit Kulon'),
('357602','3576','Magersari'),
('357701','3577','Kartoharjo'),
('357702','3577','Manguharjo'),
('357703','3577','Taman'),
('357801','3578','Karangpilang'),
('357802','3578','Wonocolo'),
('357803','3578','Rungkut'),
('357804','3578','Wonokromo'),
('357805','3578','Tegalsari'),
('357806','3578','Sawahan'),
('357807','3578','Genteng'),
('357808','3578','Gubeng'),
('357809','3578','Sukolilo'),
('357810','3578','Tambaksari'),
('357811','3578','Simokerto'),
('357812','3578','Pabean Cantikan'),
('357813','3578','Bubutan'),
('357814','3578','Tandes'),
('357815','3578','Krembangan'),
('357816','3578','Semampir'),
('357817','3578','Kenjeran'),
('357818','3578','Lakarsantri'),
('357819','3578','Benowo'),
('357820','3578','Wiyung'),
('357821','3578','Dukuhpakis'),
('357822','3578','Gayungan'),
('357823','3578','Jambangan'),
('357824','3578','Tenggilis Mejoyo'),
('357825','3578','Gunung Anyar'),
('357826','3578','Mulyorejo'),
('357827','3578','Sukomanunggal'),
('357828','3578','Asem Rowo'),
('357829','3578','Bulak'),
('357830','3578','Pakal'),
('357831','3578','Sambikerep'),
('357901','3579','Batu'),
('357902','3579','Bumiaji'),
('357903','3579','Junrejo'),
('360101','3601','Sumur'),
('360102','3601','Cimanggu'),
('360103','3601','Cibaliung'),
('360104','3601','Cikeusik'),
('360105','3601','Cigeulis'),
('360106','3601','Panimbang'),
('360107','3601','Angsana'),
('360108','3601','Munjul'),
('360109','3601','Pagelaran'),
('360110','3601','Bojong'),
('360111','3601','Picung'),
('360112','3601','Labuan'),
('360113','3601','Menes'),
('360114','3601','Saketi'),
('360115','3601','Cipeucang'),
('360116','3601','Jiput'),
('360117','3601','Mandalawangi'),
('360118','3601','Cimanuk'),
('360119','3601','Kaduhejo'),
('360120','3601','Banjar'),
('360121','3601','Pandeglang'),
('360122','3601','Cadasari'),
('360123','3601','Cisata'),
('360124','3601','Patia'),
('360125','3601','Karang Tanjung'),
('360126','3601','Cikedal'),
('360127','3601','Cibitung'),
('360128','3601','Carita'),
('360129','3601','Sukaresmi'),
('360130','3601','Mekarjaya'),
('360131','3601','Sindangresmi'),
('360132','3601','Pulosari'),
('360133','3601','Koroncong'),
('360134','3601','Majasari'),
('360135','3601','Sobang'),
('360201','3602','Malingping'),
('360202','3602','Panggarangan'),
('360203','3602','Bayah'),
('360204','3602','Cipanas'),
('360205','3602','Muncang'),
('360206','3602','Leuwidamar'),
('360207','3602','Bojongmanik'),
('360208','3602','Gunungkencana'),
('360209','3602','Banjarsari'),
('360210','3602','Cileles'),
('360211','3602','Cimarga'),
('360212','3602','Sajira'),
('360213','3602','Maja'),
('360214','3602','Rangkasbitung'),
('360215','3602','Warunggunung'),
('360216','3602','Cijaku'),
('360217','3602','Cikulur'),
('360218','3602','Cibadak'),
('360219','3602','Cibeber'),
('360220','3602','Cilograng'),
('360221','3602','Wanasalam'),
('360222','3602','Sobang'),
('360223','3602','Curug bitung'),
('360224','3602','Kalanganyar'),
('360225','3602','Lebakgedong'),
('360226','3602','Cihara'),
('360227','3602','Cirinten'),
('360228','3602','Cigemlong'),
('360301','3603','Balaraja'),
('360302','3603','Jayanti'),
('360303','3603','Tigaraksa'),
('360304','3603','Jambe'),
('360305','3603','Cisoka'),
('360306','3603','Kresek'),
('360307','3603','Kronjo'),
('360308','3603','Mauk'),
('360309','3603','Kemiri'),
('360310','3603','Sukadiri'),
('360311','3603','Rajeg'),
('360312','3603','Pasar Kemis'),
('360313','3603','Teluknaga'),
('360314','3603','Kosambi'),
('360315','3603','Pakuhaji'),
('360316','3603','Sepatan'),
('360317','3603','Curug'),
('360318','3603','Cikupa'),
('360319','3603','Panongan'),
('360320','3603','Legok'),
('360322','3603','Pagedangan'),
('360323','3603','Cisauk'),
('360327','3603','Sukamulya'),
('360328','3603','Kelapa Dua'),
('360329','3603','Sindang Jaya'),
('360330','3603','Sepatan Timur'),
('360331','3603','Solear'),
('360332','3603','Gunung Kaler'),
('360333','3603','Mekar Baru'),
('360405','3604','Kramatwatu'),
('360406','3604','Waringinkurung'),
('360407','3604','Bojonegara'),
('360408','3604','Pulo Ampel'),
('360409','3604','Ciruas'),
('360411','3604','Kragilan'),
('360412','3604','Pontang'),
('360413','3604','Tirtayasa'),
('360414','3604','Tanara'),
('360415','3604','Cikande'),
('360416','3604','Kibin'),
('360417','3604','Carenang'),
('360418','3604','Binuang'),
('360419','3604','Petir'),
('360420','3604','Tunjung Teja'),
('360422','3604','Baros'),
('360423','3604','Cikeusal'),
('360424','3604','Pamarayan'),
('360425','3604','Kopo'),
('360426','3604','Jawilan'),
('360427','3604','Ciomas'),
('360428','3604','Pabuaran'),
('360429','3604','Padarincang'),
('360430','3604','Anyar'),
('360431','3604','Cinangka'),
('360432','3604','Mancak'),
('360433','3604','Gunung Sari'),
('360434','3604','Bandung'),
('360435','3604','Lebak Wangi'),
('367101','3671','Tangerang'),
('367102','3671','Jatiuwung'),
('367103','3671','Batuceper'),
('367104','3671','Benda'),
('367105','3671','Cipondoh'),
('367106','3671','Ciledug'),
('367107','3671','Karawaci'),
('367108','3671','Periuk'),
('367109','3671','Cibodas'),
('367110','3671','Neglasari'),
('367111','3671','Pinang'),
('367112','3671','Karang Tengah'),
('367113','3671','Larangan'),
('367201','3672','Cibeber'),
('367202','3672','Cilegon'),
('367203','3672','Pulomerak'),
('367204','3672','Ciwandan'),
('367205','3672','Jombang'),
('367206','3672','Gerogol'),
('367207','3672','Purwakarta'),
('367208','3672','Citangkil'),
('367301','3673','Serang'),
('367302','3673','Kasemen'),
('367303','3673','Walantaka'),
('367304','3673','Curug'),
('367305','3673','Cipocok Jaya'),
('367306','3673','Taktakan'),
('367401','3674','Serpong'),
('367402','3674','Serpong Utara'),
('367403','3674','Pondok Aren'),
('367404','3674','Ciputat'),
('367405','3674','Ciputat Timur'),
('367406','3674','Pamulang'),
('367407','3674','Setu'),
('510101','5101','Negara'),
('510102','5101','Mendoyo'),
('510103','5101','Pekutatan'),
('510104','5101','Melaya'),
('510105','5101','Jembrana'),
('510201','5102','Selemadeg'),
('510202','5102','Salamadeg Timur'),
('510203','5102','Salemadeg Barat'),
('510204','5102','Kerambitan'),
('510205','5102','Tabanan'),
('510206','5102','Kediri'),
('510207','5102','Marga'),
('510208','5102','Penebel'),
('510209','5102','Baturiti'),
('510210','5102','Pupuan'),
('510301','5103','Kuta'),
('510302','5103','Mengwi'),
('510303','5103','Abiansemal'),
('510304','5103','Petang'),
('510305','5103','Kuta Selatan'),
('510306','5103','Kuta Utara'),
('510401','5104','Sukawati'),
('510402','5104','Blahbatuh'),
('510403','5104','Gianyar'),
('510404','5104','Tampaksiring'),
('510405','5104','Ubud'),
('510406','5104','Tegalallang'),
('510407','5104','Payangan'),
('510501','5105','Nusa Penida'),
('510502','5105','Banjarangkan'),
('510503','5105','Klungkung'),
('510504','5105','Dawan'),
('510601','5106','Susut'),
('510602','5106','Bangli'),
('510603','5106','Tembuku'),
('510604','5106','Kintamani'),
('510701','5107','Rendang'),
('510702','5107','Sidemen'),
('510703','5107','Manggis'),
('510704','5107','Karangasem'),
('510705','5107','Abang'),
('510706','5107','Bebandem'),
('510707','5107','Selat'),
('510708','5107','Kubu'),
('510801','5108','Gerokgak'),
('510802','5108','Seririt'),
('510803','5108','Busung biu'),
('510804','5108','Banjar'),
('510805','5108','Sukasada'),
('510806','5108','Buleleng'),
('510807','5108','Sawan'),
('510808','5108','Kubutambahan'),
('510809','5108','Tejakula'),
('517101','5171','Denpasar Selatan'),
('517102','5171','Denpasar Timur'),
('517103','5171','Denpasar Barat'),
('517104','5171','Denpasar Utara'),
('520101','5201','Gerung'),
('520102','5201','Kediri'),
('520103','5201','Narmada'),
('520107','5201','Sekotong'),
('520108','5201','Labuapi'),
('520109','5201','Gunungsari'),
('520112','5201','Lingsar'),
('520113','5201','Lembar'),
('520114','5201','Batu Layar'),
('520115','5201','Kuripan'),
('520201','5202','Praya'),
('520202','5202','Jonggat'),
('520203','5202','Batukliang'),
('520204','5202','Pujut'),
('520205','5202','Praya Barat'),
('520206','5202','Praya Timur'),
('520207','5202','Janapria'),
('520208','5202','Pringgarata'),
('520209','5202','Kopang'),
('520210','5202','Praya Tengah'),
('520211','5202','Praya Barat Daya'),
('520212','5202','Batukliang Utara'),
('520301','5203','Keruak'),
('520302','5203','Sakra'),
('520303','5203','Terara'),
('520304','5203','Sikur'),
('520305','5203','Masbagik'),
('520306','5203','Sukamulia'),
('520307','5203','Selong'),
('520308','5203','Pringgabaya'),
('520309','5203','Aikmel'),
('520310','5203','Sambelia'),
('520311','5203','Montong Gading'),
('520312','5203','Pringgasela'),
('520313','5203','Suralaga'),
('520314','5203','Wanasaba'),
('520315','5203','Sembalun'),
('520316','5203','Suwela'),
('520317','5203','Labuhan Haji'),
('520318','5203','Sakra Timur'),
('520319','5203','Sakra Barat'),
('520320','5203','Jerowaru'),
('520402','5204','Lunyuk'),
('520405','5204','Alas'),
('520406','5204','Utan'),
('520407','5204','Batu Lanteh'),
('520408','5204','Sumbawa'),
('520409','5204','Moyo Hilir'),
('520410','5204','Moyo Hulu'),
('520411','5204','Ropang'),
('520412','5204','Lape'),
('520413','5204','Plampang'),
('520414','5204','Empang'),
('520417','5204','Alas Barat'),
('520418','5204','Labuhan Badas'),
('520419','5204','Labangka'),
('520420','5204','Buer'),
('520421','5204','Rhee'),
('520422','5204','Unter Iwes'),
('520423','5204','Moyo Utara'),
('520424','5204','Maronge'),
('520425','5204','Tarano'),
('520426','5204','Lopok'),
('520427','5204','Lenangguar'),
('520428','5204','Orong Telu'),
('520429','5204','Lantung'),
('520501','5205','Dompu'),
('520502','5205','Kempo'),
('520503','5205','Hu\'u'),
('520504','5205','Kilo'),
('520505','5205','Woja'),
('520506','5205','Pekat'),
('520507','5205','Manggalewa'),
('520508','5205','Pajo'),
('520601','5206','Monta'),
('520602','5206','Bolo'),
('520603','5206','Woha'),
('520604','5206','Belo'),
('520605','5206','Wawo'),
('520606','5206','Sape'),
('520607','5206','Wera'),
('520608','5206','Donggo'),
('520609','5206','Sanggar'),
('520610','5206','Ambalawi'),
('520611','5206','Langgudu'),
('520612','5206','Lambu'),
('520613','5206','Madapangga'),
('520614','5206','Tambora'),
('520615','5206','Soromandi'),
('520616','5206','Parado'),
('520617','5206','Lambitu'),
('520618','5206','Palibelo'),
('520701','5207','Jereweh'),
('520702','5207','Taliwang'),
('520703','5207','Seteluk'),
('520704','5207','Sekongkang'),
('520705','5207','Brang Rea'),
('520706','5207','Poto Tano'),
('520707','5207','Brang Ene'),
('520708','5207','Maluk'),
('520801','5208','Tanjung'),
('520802','5208','Gangga'),
('520803','5208','Kayangan'),
('520804','5208','Bayan'),
('520805','5208','Pemenang'),
('527101','5271','Ampenan'),
('527102','5271','Mataram'),
('527103','5271','Cakranegara'),
('527104','5271','Sekarbela'),
('527105','5271','Selaprang'),
('527106','5271','Sandubaya'),
('527201','5272','RasanaE Barat'),
('527202','5272','RasanaE Timur'),
('527203','5272','Asakota'),
('527204','5272','Raba'),
('527205','5272','Mpunda'),
('530104','5301','Semau'),
('530105','5301','Kupang Barat'),
('530106','5301','Kupang Timur'),
('530107','5301','Sulamu'),
('530108','5301','Kupang Tengah'),
('530109','5301','Amarasi'),
('530110','5301','Fatuleu'),
('530111','5301','Takari'),
('530112','5301','Amfoang Selatan'),
('530113','5301','Amfoang Utara'),
('530116','5301','Nekamese'),
('530117','5301','Amarasi Barat'),
('530118','5301','Amarasi Selatan'),
('530119','5301','Amarasi Timur'),
('530120','5301','Amabi Oefeto Timur'),
('530121','5301','Amfoang Barat Daya'),
('530122','5301','Amfoang Barat Laut'),
('530123','5301','Semau Selatan'),
('530124','5301','Taebenu'),
('530125','5301','Amabi Oefeto'),
('530126','5301','Amfoang Timur'),
('530127','5301','Fatuleu Barat'),
('530128','5301','Fatuleu Tengah'),
('530130','5301','Amfoang Tengah'),
('530201','5302','Kota Soe'),
('530202','5302','Mollo Selatan'),
('530203','5302','Mollo Utara'),
('530204','5302','Amanuban Timur'),
('530205','5302','Amanuban Tengah'),
('530206','5302','Amanuban Selatan'),
('530207','5302','Amanuban Barat'),
('530208','5302','Amanatun Selatan'),
('530209','5302','Amanatun Utara'),
('530210','5302','KI\'E'),
('530211','5302','Kuanfatu'),
('530212','5302','Fatumnasi'),
('530213','5302','Polen'),
('530214','5302','Batu Putih'),
('530215','5302','Boking'),
('530216','5302','Toianas'),
('530217','5302','Nunkolo'),
('530218','5302','Oenino'),
('530219','5302','Kolbano'),
('530220','5302','Kot olin'),
('530221','5302','Kualin'),
('530222','5302','Mollo Barat'),
('530223','5302','Kok Baun'),
('530224','5302','Noebana'),
('530225','5302','Santian'),
('530226','5302','Noebeba'),
('530227','5302','Kuatnana'),
('530228','5302','Fautmolo'),
('530229','5302','Fatukopa'),
('530230','5302','Mollo Tengah'),
('530231','5302','Tobu'),
('530232','5302','Nunbena'),
('530301','5303','Miomafo Timur'),
('530302','5303','Miomafo Barat'),
('530303','5303','Biboki Selatan'),
('530304','5303','Noemuti'),
('530305','5303','Kota Kefamenanu'),
('530306','5303','Biboki Utara'),
('530307','5303','Biboki Anleu'),
('530308','5303','Insana'),
('530309','5303','Insana Utara'),
('530310','5303','Noemuti Timur'),
('530311','5303','Miomaffo Tengah'),
('530312','5303','Musi'),
('530313','5303','Mutis'),
('530314','5303','Bikomi Selatan'),
('530315','5303','Bikomi Tengah'),
('530316','5303','Bikomi Nilulat'),
('530317','5303','Bikomi Utara'),
('530318','5303','Naibenu'),
('530319','5303','Insana Fafinesu'),
('530320','5303','Insana Barat'),
('530321','5303','Insana Tengah'),
('530322','5303','Biboki Tan Pah'),
('530323','5303','Biboki Moenleu'),
('530324','5303','Biboki Feotleu'),
('530401','5304','Lamaknen'),
('530402','5304','TasifetoTimur'),
('530403','5304','Raihat'),
('530404','5304','Tasifeto Barat'),
('530405','5304','Kakuluk Mesak'),
('530412','5304','Kota Atambua'),
('530413','5304','Raimanuk'),
('530417','5304','Lasiolat'),
('530418','5304','Lamaknen Selatan'),
('530421','5304','Atambua Barat'),
('530422','5304','Atambua Selatan'),
('530423','5304','Nanaet Duabesi'),
('530501','5305','Teluk Mutiara'),
('530502','5305','Alor Barat Laut'),
('530503','5305','Alor Barat Daya'),
('530504','5305','Alor Selatan'),
('530505','5305','Alor Timur'),
('530506','5305','Pantar'),
('530507','5305','Alor Tengah Utara'),
('530508','5305','Alor Timur Laut'),
('530509','5305','Pantar Barat'),
('530510','5305','Kabola'),
('530511','5305','Pulau Pura'),
('530512','5305','Mataru'),
('530513','5305','Pureman'),
('530514','5305','Pantar Timur'),
('530515','5305','Lembur'),
('530516','5305','Pantar Tengah'),
('530517','5305','Pantar Baru Laut'),
('530601','5306','Wulanggitang'),
('530602','5306','Titehena'),
('530603','5306','Larantuka'),
('530604','5306','Ile Mandiri'),
('530605','5306','Tanjung Bunga'),
('530606','5306','Solor Barat'),
('530607','5306','Solor Timur'),
('530608','5306','Adonara Barat'),
('530609','5306','Wotan Ulumando'),
('530610','5306','Adonara Timur'),
('530611','5306','Kelubagolit'),
('530612','5306','Witihama'),
('530613','5306','Ile Boleng'),
('530614','5306','Demon Pagong'),
('530615','5306','Lewolema'),
('530616','5306','Ile Bura'),
('530617','5306','Adonara'),
('530618','5306','Adonara Tengah'),
('530619','5306','Solor Selatan'),
('530701','5307','Paga'),
('530702','5307','Mego'),
('530703','5307','Lela'),
('530704','5307','Nita'),
('530705','5307','Alok'),
('530706','5307','Palue'),
('530707','5307','Nelle'),
('530708','5307','Talibura'),
('530709','5307','Waigete'),
('530710','5307','Kewapante'),
('530711','5307','Bola'),
('530712','5307','Magepanda'),
('530713','5307','Waiblama'),
('530714','5307','Alok Barat'),
('530715','5307','Alok Timur'),
('530716','5307','Koting'),
('530717','5307','Tana Wawo'),
('530718','5307','Hewokloang'),
('530719','5307','Kangae'),
('530720','5307','Doreng'),
('530721','5307','Mapitara'),
('530801','5308','Nangapanda'),
('530802','5308','Pulau Ende'),
('530803','5308','Ende'),
('530804','5308','Ende Selatan'),
('530805','5308','Ndona'),
('530806','5308','Detusoko'),
('530807','5308','Wewaria'),
('530808','5308','Wolowaru'),
('530809','5308','Wolojita'),
('530810','5308','Maurole'),
('530811','5308','Maukaro'),
('530812','5308','Lio Timur'),
('530813','5308','Kota Baru'),
('530814','5308','Kelimutu'),
('530815','5308','Detukeli'),
('530816','5308','Ndona Timur'),
('530817','5308','Ndori'),
('530818','5308','Ende Utara'),
('530819','5308','Ende Tengah'),
('530820','5308','Ende Timur'),
('530821','5308','Lepembusu Kelisoke'),
('530901','5309','Aimere'),
('530902','5309','Golewa'),
('530906','5309','Bajawa'),
('530907','5309','Soa'),
('530909','5309','Riung'),
('530912','5309','Jerebuu'),
('530914','5309','Riung Barat'),
('530915','5309','Bajawa Utara'),
('530916','5309','Wolomeze'),
('530918','5309','Golewa Selatan'),
('530919','5309','Golewa Barat'),
('530920','5309','Inerie'),
('531001','5310','Wae Rii'),
('531003','5310','Ruteng'),
('531005','5310','Satar Mese'),
('531006','5310','Cibal'),
('531011','5310','Reok'),
('531012','5310','Langke Rembong'),
('531013','5310','Satar Mese Barat'),
('531014','5310','Rahong Utara'),
('531015','5310','Lelak'),
('531016','5310','Reok Barat'),
('531017','5310','Cibal barat'),
('531101','5311','Kota Waingapu'),
('531102','5311','Haharu'),
('531103','5311','Lewa'),
('531104','5311','Nggaha Ori Angu'),
('531105','5311','Tabundung'),
('531106','5311','Pinu Pahar'),
('531107','5311','Pandawai'),
('531108','5311','Umalulu'),
('531109','5311','Rindi'),
('531110','5311','Pahunga Lodu'),
('531111','5311','Wulla Waijelu'),
('531112','5311','Paberiwai'),
('531113','5311','Karera'),
('531114','5311','Kahaungu Eti'),
('531115','5311','Matawai La Pawu'),
('531116','5311','Kambera'),
('531117','5311','Kambata Mapambuhang'),
('531118','5311','Lewa Tidahu'),
('531119','5311','Katala Hamu Lingu'),
('531120','5311','Kanatang'),
('531121','5311','Ngadu Ngala'),
('531122','5311','Mahu'),
('531204','5312','Tana Righu'),
('531210','5312','Loli'),
('531211','5312','Wanokaka'),
('531212','5312','Lamboya'),
('531215','5312','Kota Waikabubak'),
('531218','5312','Laboya Barat'),
('531301','5313','Naga Wutung'),
('531302','5313','Atadei'),
('531303','5313','Ile Ape'),
('531304','5313','Lebatukan'),
('531305','5313','Nubatukan'),
('531306','5313','Omesuri'),
('531307','5313','Buyasuri'),
('531308','5313','Wulandoni'),
('531309','5313','Ile Ape Timur'),
('531401','5314','Rote Barat Daya'),
('531402','5314','Rote Barat Laut'),
('531403','5314','Lobalain'),
('531404','5314','Rote Tengah'),
('531405','5314','Pantai Baru'),
('531406','5314','Rote Timur'),
('531407','5314','Rote Barat'),
('531408','5314','Rote Selatan'),
('531409','5314','Ndao Nuse'),
('531410','5314','Landu Leko'),
('531501','5315','Macang Pacar'),
('531502','5315','Kuwus'),
('531503','5315','Lembor'),
('531504','5315','Sano Nggoang'),
('531505','5315','Komodo'),
('531506','5315','Boleng'),
('531507','5315','Welak'),
('531508','5315','Ndoso'),
('531509','5315','Lembor Selatan'),
('531510','5315','Mbeliling'),
('531601','5316','Aesesa'),
('531602','5316','Nangaroro'),
('531603','5316','Boawae'),
('531604','5316','Mauponggo'),
('531605','5316','Wolowae'),
('531606','5316','Keo Tengah'),
('531607','5316','Aesesa Selatan'),
('531701','5317','Katiku Tana'),
('531702','5317','Umbu Ratu Nggay Barat'),
('531703','5317','Mamboro'),
('531704','5317','Umbu Ratu Nggay'),
('531705','5317','Katiku Tana Selatan'),
('531801','5318','Loura'),
('531802','5318','Wewewa Utara'),
('531803','5318','Wewewa Timur'),
('531804','5318','Wewewa Barat'),
('531805','5318','Wewewa Selatan'),
('531806','5318','Kodi Bangedo'),
('531807','5318','Kodi'),
('531808','5318','Kodi Utara'),
('531809','5318','Kota Tambolaka'),
('531810','5318','Wewewa Tengah'),
('531811','5318','Kodi Balaghar'),
('531901','5319','Borong'),
('531902','5319','Poco Ranaka'),
('531903','5319','Lamba Leda'),
('531904','5319','Sambi Rampas'),
('531905','5319','Elar'),
('531906','5319','Kota Komba'),
('531907','5319','Rana Mese'),
('531908','5319','Poco Ranaka Timur'),
('531909','5319','Elar Selatan'),
('532001','5320','Sabu Barat'),
('532002','5320','Sabu Tengah'),
('532003','5320','Sabu Timur'),
('532004','5320','Sabu Liae'),
('532005','5320','Hawu Mehara'),
('532006','5320','Raijua'),
('532101','5321','Malaka Tengah'),
('532102','5321','Malaka Barat'),
('532103','5321','Wewiku'),
('532104','5321','Weliman'),
('532105','5321','Rinhat'),
('532106','5321','Io Kufeu'),
('532107','5321','Sasitamean'),
('532108','5321','Laenmanen'),
('532109','5321','Malaka Timur'),
('532110','5321','Kobalima Timur'),
('532111','5321','Kobalima'),
('532112','5321','Botin Leobele'),
('537101','5371','Alak'),
('537102','5371','Maulafa'),
('537103','5371','Kelapa Lima'),
('537104','5371','Oebobo'),
('537105','5371','Kota Raja'),
('537106','5371','Kota Lama'),
('610101','6101','Sambas'),
('610102','6101','Teluk Keramat'),
('610103','6101','Jawai'),
('610104','6101','Tebas'),
('610105','6101','Pemangkat'),
('610106','6101','Sejangkung'),
('610107','6101','Selakau'),
('610108','6101','Paloh'),
('610109','6101','Sajingan Besar'),
('610110','6101','Subah'),
('610111','6101','Galing'),
('610112','6101','Tekarang'),
('610113','6101','Semparuk'),
('610114','6101','Sajad'),
('610115','6101','Sebawi'),
('610116','6101','Jawai Selatan'),
('610117','6101','Tangaran'),
('610118','6101','Salatiga'),
('610119','6101','Selakau Timur'),
('610201','6102','Mempawah Hilir'),
('610206','6102','Toho'),
('610207','6102','Sungai Pinyuh'),
('610208','6102','Siantan'),
('610212','6102','Sungai Kunyit'),
('610215','6102','Segedong'),
('610216','6102','Anjongan'),
('610217','6102','Sadaniang'),
('610218','6102','Mempawah Timur'),
('610301','6103','Kapuas'),
('610302','6103','Mukok'),
('610303','6103','Noyan'),
('610304','6103','Jangkang'),
('610305','6103','Bonti'),
('610306','6103','Beduai'),
('610307','6103','Sekayam'),
('610308','6103','Kembayan'),
('610309','6103','Parindu'),
('610310','6103','Tayan Hulu'),
('610311','6103','Tayan Hilir'),
('610312','6103','Balai'),
('610313','6103','Toba'),
('610320','6103','Meliau'),
('610321','6103','Entikong'),
('610401','6104','Matan Hilir Utara'),
('610402','6104','Marau'),
('610403','6104','Manis Mata'),
('610404','6104','Kendawangan'),
('610405','6104','Sandai'),
('610407','6104','Sungai Laur'),
('610408','6104','Simpang Hulu'),
('610411','6104','Nanga Tayap'),
('610412','6104','Matan Hilir Selatan'),
('610413','6104','Tumbang Titi'),
('610414','6104','Jelai Hulu'),
('610416','6104','Delta Pawan'),
('610417','6104','Muara Pawan'),
('610418','6104','Benua Kayong'),
('610419','6104','Hulu Sungai'),
('610420','6104','Simpang Dua'),
('610421','6104','Air Upas'),
('610422','6104','Singkup'),
('610424','6104','Pemahan'),
('610425','6104','Sungai Melayu Rayak'),
('610501','6105','Sintang'),
('610502','6105','Tempunak'),
('610503','6105','Sepauk'),
('610504','6105','Ketungau Hilir'),
('610505','6105','Ketungau Tengah'),
('610506','6105','Ketungau Hulu'),
('610507','6105','Dedai'),
('610508','6105','Kayan Hilir'),
('610509','6105','Kayan Hulu'),
('610514','6105','Serawai'),
('610515','6105','Ambalau'),
('610519','6105','Kelam Permai'),
('610520','6105','Sungai Tebelian'),
('610521','6105','Binjai Hulu'),
('610601','6106','Putussibau Utara'),
('610602','6106','Bika'),
('610603','6106','Embaloh Hilir'),
('610604','6106','Embaloh Hulu'),
('610605','6106','Bunut Hilir'),
('610606','6106','Bunut Hulu'),
('610607','6106','Jongkong'),
('610608','6106','Hulu Gurung'),
('610609','6106','Selimbau'),
('610610','6106','Semitau'),
('610611','6106','Seberuang'),
('610612','6106','Batang Lupar'),
('610613','6106','Empanang'),
('610614','6106','Badau'),
('610615','6106','Silat Hilir'),
('610616','6106','Silat Hulu'),
('610617','6106','Putussibau Selatan'),
('610618','6106','Kalis'),
('610619','6106','Boyan Tanjung'),
('610620','6106','Mentebah'),
('610621','6106','Pengkadan'),
('610622','6106','Suhaid'),
('610623','6106','Puring Kencana'),
('610701','6107','Sungai Raya'),
('610702','6107','Samalantan'),
('610703','6107','Ledo'),
('610704','6107','Bengkayang'),
('610705','6107','Seluas'),
('610706','6107','Sanggau Ledo'),
('610707','6107','Jagoi Babang'),
('610708','6107','Monterado'),
('610709','6107','Teriak'),
('610710','6107','Suti Semarang'),
('610711','6107','Capkala'),
('610712','6107','Siding'),
('610713','6107','Lumar'),
('610714','6107','Sungai Betung'),
('610715','6107','Sungai Raya Kepulauan'),
('610716','6107','Lembah Bawang'),
('610717','6107','Tujuh Belas'),
('610801','6108','Ngabang'),
('610802','6108','Mempawah Hulu'),
('610803','6108','Menjalin'),
('610804','6108','Mandor'),
('610805','6108','Air Besar'),
('610806','6108','Menyuke'),
('610807','6108','Sengah Temila'),
('610808','6108','Meranti'),
('610809','6108','Kuala Behe'),
('610810','6108','Sebangki'),
('610811','6108','Jelimpo'),
('610812','6108','Banyuke Hulu'),
('610813','6108','Sompak'),
('610901','6109','Sekadau Hilir'),
('610902','6109','Sekadau Hulu'),
('610903','6109','Nanga Taman'),
('610904','6109','Nanga Mahap'),
('610905','6109','Belitang Hilir'),
('610906','6109','Belitang Hulu'),
('610907','6109','Belitang'),
('611001','6110','Belimbing'),
('611002','6110','Nanga Pinoh'),
('611003','6110','Ella Hilir'),
('611004','6110','Menukung'),
('611005','6110','Sayan'),
('611006','6110','Tanah Pinoh'),
('611007','6110','Sokan'),
('611008','6110','Pinoh Utara'),
('611009','6110','Pinoh Selatan'),
('611010','6110','Belimbing Hulu'),
('611011','6110','Tanah Pinoh Barat'),
('611101','6111','Sukadana'),
('611102','6111','Simpang Hilir'),
('611103','6111','Teluk Batang'),
('611104','6111','Pulau Maya'),
('611105','6111','Seponti'),
('611106','6111','Kepulauan Karimata'),
('611201','6112','Sungai Raya'),
('611202','6112','Kuala Mandor B'),
('611203','6112','Sungai Ambawang'),
('611204','6112','Terentang'),
('611205','6112','Batu Ampar'),
('611206','6112','Kubu'),
('611207','6112','Rasau Jaya'),
('611208','6112','Teluk Pakedai'),
('611209','6112','Sungai Kakap'),
('617101','6171','Pontianak Selatan'),
('617102','6171','Pontianak Timur'),
('617103','6171','Pontianak Barat'),
('617104','6171','Pontianak Utara'),
('617105','6171','Pontianak Kota'),
('617106','6171','Pontianak Tenggara'),
('617201','6172','Singkawang Tengah'),
('617202','6172','Singkawang Barat'),
('617203','6172','Singkawang Timur'),
('617204','6172','Singkawang Utara'),
('617205','6172','Singkawang Selatan'),
('620101','6201','Kumai'),
('620102','6201','Arut Selatan'),
('620103','6201','Kotawaringin Lama'),
('620104','6201','Arut Utara'),
('620105','6201','Pangkalan Lada'),
('620106','6201','Pangkalan Banteng'),
('620201','6202','Kota Besi'),
('620202','6202','Cempaga'),
('620203','6202','Mentaya Hulu'),
('620204','6202','Parenggean'),
('620205','6202','Baamang'),
('620206','6202','Mentawa Baru Ketapang'),
('620207','6202','Mentaya Hilir Utara'),
('620208','6202','Mentaya Hilir Selatan'),
('620209','6202','Pulau Hanaut'),
('620210','6202','Antang Kalang'),
('620211','6202','Teluk Sampit'),
('620212','6202','Seranau'),
('620213','6202','Cempaga Hulu'),
('620214','6202','Telawang'),
('620215','6202','Bukit Santuai'),
('620216','6202','Tualan Hulu'),
('620217','6202','Telaga Antang'),
('620301','6203','Selat'),
('620302','6203','Kapuas Hilir'),
('620303','6203','Kapuas Timur'),
('620304','6203','Kapuas Kuala'),
('620305','6203','Kapuas Barat'),
('620306','6203','Pulau Petak'),
('620307','6203','Kapuas Murung'),
('620308','6203','Basarang'),
('620309','6203','Mantangai'),
('620310','6203','Timpah'),
('620311','6203','Kapuas Tengah'),
('620312','6203','Kapuas Hulu'),
('620313','6203','Tamban Catur'),
('620314','6203','Pasak Talawang'),
('620315','6203','Mandau Talawang'),
('620316','6203','Dadahup'),
('620317','6203','Bataguh'),
('620401','6204','Jenamas'),
('620402','6204','Dusun Hilir'),
('620403','6204','Karau Kuala'),
('620404','6204','Dusun Utara'),
('620405','6204','Gn. Bintang Awai'),
('620406','6204','Dusun Selatan'),
('620501','6205','Montallat'),
('620502','6205','Gunung Timang'),
('620503','6205','Gunung Purei'),
('620504','6205','Teweh Timur'),
('620505','6205','Teweh Tengah'),
('620506','6205','Lahei'),
('620507','6205','Teweh Baru'),
('620508','6205','Teweh Selatan'),
('620509','6205','Lahei Barat'),
('620601','6206','Kampiang'),
('620602','6206','Katingan Hilir'),
('620603','6206','Tewang Sangalang Garing'),
('620604','6206','Pulau Malan'),
('620605','6206','Katingan Tengah'),
('620606','6206','Sanaman Mantikei'),
('620607','6206','Marikit'),
('620608','6206','Katingan Hulu'),
('620609','6206','Mendawai'),
('620610','6206','Katingan Kuala'),
('620611','6206','Tasik Payawan'),
('620612','6206','Petak Malai'),
('620613','6206','Bukit Raya'),
('620701','6207','Seruyan Hilir'),
('620702','6207','Seruyan Tengah'),
('620703','6207','Danau Sembuluh'),
('620704','6207','Hanau'),
('620705','6207','Seruyan Hulu'),
('620706','6207','Seruyan Hilir Timur'),
('620707','6207','Seruyan Raya'),
('620708','6207','Danau Seluluk'),
('620709','6207','Batu Ampar'),
('620710','6207','Suling Tambun'),
('620801','6208','Sukamara'),
('620802','6208','Jelai'),
('620803','6208','Balai Riam'),
('620804','6208','Pantai Lunci'),
('620805','6208','Permata Kecubung'),
('620901','6209','Lamandau'),
('620902','6209','Delang'),
('620903','6209','Bulik'),
('620904','6209','Bulik Timur'),
('620905','6209','Menthobi Raya'),
('620906','6209','Sematu Jaya'),
('620907','6209','Belantikan Raya'),
('620908','6209','Batang Kawa'),
('621001','6210','Sepang Simin'),
('621002','6210','Kurun'),
('621003','6210','Tewah'),
('621004','6210','Kahayan Hulu Utara'),
('621005','6210','Rungan'),
('621006','6210','Manuhing'),
('621007','6210','Mihing Raya'),
('621008','6210','Damang Batu'),
('621009','6210','Miri Manasa'),
('621010','6210','Rungan Hulu'),
('621011','6210','Mahuning Raya'),
('621012','6210','Rungan Barat'),
('621101','6211','Pandih Batu'),
('621102','6211','Kahayan Kuala'),
('621103','6211','Kahayan Tengah'),
('621104','6211','Banama Tingang'),
('621105','6211','Kahayan Hilir'),
('621106','6211','Maliku'),
('621107','6211','Jabiren'),
('621108','6211','Sebangau Kuala'),
('621201','6212','Murung'),
('621202','6212','Tanah Siang'),
('621203','6212','Laung Tuhup'),
('621204','6212','Permata Intan'),
('621205','6212','Sumber Barito'),
('621206','6212','Barito Tuhup Raya'),
('621207','6212','Tanah Siang Selatan'),
('621208','6212','Sungai Babuat'),
('621209','6212','Seribu Riam'),
('621210','6212','Uut Murung'),
('621301','6213','Dusun Timur'),
('621302','6213','Banua Lima'),
('621303','6213','Patangkep Tutui'),
('621304','6213','Awang'),
('621305','6213','Dusun Tengah'),
('621306','6213','Pematang Karau'),
('621307','6213','Paju Epat'),
('621308','6213','Raren Batuah'),
('621309','6213','Paku'),
('621310','6213','Karusen Janang'),
('627101','6271','Pahandut'),
('627102','6271','Bukit Batu'),
('627103','6271','Jekan Raya'),
('627104','6271','Sabangau'),
('627105','6271','Rakumpit'),
('630101','6301','Takisung'),
('630102','6301','Jorong'),
('630103','6301','Pelaihari'),
('630104','6301','Kurau'),
('630105','6301','Bati Bati'),
('630106','6301','Panyipatan'),
('630107','6301','Kintap'),
('630108','6301','Tambang Ulang'),
('630109','6301','Batu Ampar'),
('630110','6301','Bajuin'),
('630111','6301','Bumi Makmur'),
('630201','6302','Pulausembilan'),
('630202','6302','Pulaulaut Barat'),
('630203','6302','Pulaulaut Selatan'),
('630204','6302','Pulaulaut Timur'),
('630205','6302','Pulausebuku'),
('630206','6302','Pulaulaut Utara'),
('630207','6302','Kelumpang Selatan'),
('630208','6302','Kelumpang Hulu'),
('630209','6302','Kelumpang Tengah'),
('630210','6302','Kelumpang Utara'),
('630211','6302','Pamukan Selatan'),
('630212','6302','Sampanahan'),
('630213','6302','Pamukan Utara'),
('630214','6302','Hampang'),
('630215','6302','Sungaidurian'),
('630216','6302','Pulaulaut Tengah'),
('630217','6302','Kelumpang Hilir'),
('630218','6302','Kelumpang Barat'),
('630219','6302','Pamukan Barat'),
('630220','6302','Pulaulaut Kepulauan'),
('630221','6302','Pulaulaut Tanjung Selayar'),
('630301','6303','Aluh Aluh'),
('630302','6303','Kertak Hanyar'),
('630303','6303','Gambut'),
('630304','6303','Sungai Tabuk'),
('630305','6303','Martapura'),
('630306','6303','Karang Intan'),
('630307','6303','Astambul'),
('630308','6303','Simpang Empat'),
('630309','6303','Pengarom'),
('630310','6303','Sungai Pinang'),
('630311','6303','Aranio'),
('630312','6303','Mataraman'),
('630313','6303','Beruntung Baru'),
('630314','6303','Martapura Barat'),
('630315','6303','Martapura Timur'),
('630316','6303','Sambung Makmur'),
('630317','6303','Paramasan'),
('630318','6303','Telaga Bauntung'),
('630319','6303','Tatah Makmur'),
('630401','6304','Tabunganen'),
('630402','6304','Tamban'),
('630403','6304','Anjir Pasar'),
('630404','6304','Anjir Muara'),
('630405','6304','Alalak'),
('630406','6304','Mandastana'),
('630407','6304','Rantau Badauh'),
('630408','6304','Belawang'),
('630409','6304','Cerbon'),
('630410','6304','Bakumpai'),
('630411','6304','Kuripan'),
('630412','6304','Tabukan'),
('630413','6304','Mekarsari'),
('630414','6304','Barambai'),
('630415','6304','Marabahan'),
('630416','6304','Wanaraya'),
('630417','6304','Jejangkit'),
('630501','6305','Binuang'),
('630502','6305','Tapin Selatan'),
('630503','6305','Tapin Tengah'),
('630504','6305','Tapin Utara'),
('630505','6305','Candi Laras Selatan'),
('630506','6305','Candi Laras Utara'),
('630507','6305','Bakarangan'),
('630508','6305','Piani'),
('630509','6305','Bungur'),
('630510','6305','Lokpaikat'),
('630511','6305','Salam Babaris'),
('630512','6305','Hatungun'),
('630601','6306','Sungai Raya'),
('630602','6306','Padang Batung'),
('630603','6306','Telaga Langsat'),
('630604','6306','Angkinang'),
('630605','6306','Kandangan'),
('630606','6306','Simpur'),
('630607','6306','Daha Selatan'),
('630608','6306','Daha Utara'),
('630609','6306','Kalumpang'),
('630610','6306','Loksado'),
('630611','6306','Daha Barat'),
('630701','6307','Haruyan'),
('630702','6307','Batu Benawa'),
('630703','6307','Labuan Amas Selatan'),
('630704','6307','Labuan Amas Utara'),
('630705','6307','Pandawan'),
('630706','6307','Barabai'),
('630707','6307','Batang Alai Selatan'),
('630708','6307','Batang Alai Utara'),
('630709','6307','Hantakan'),
('630710','6307','Batang Alai Timur'),
('630711','6307','Limpasu'),
('630801','6308','Danau Panggang'),
('630802','6308','Babirik'),
('630803','6308','Sungai Pandan'),
('630804','6308','Amuntai Selatan'),
('630805','6308','Amuntai Tengah'),
('630806','6308','Amuntai Utara'),
('630807','6308','Banjang'),
('630808','6308','Haur Gading'),
('630809','6308','Paminggir'),
('630810','6308','Sungai Tabukan'),
('630901','6309','Banua Lawas'),
('630902','6309','Kelua'),
('630903','6309','Tanta'),
('630904','6309','Tanjung'),
('630905','6309','Haruai'),
('630906','6309','Murung Pudak'),
('630907','6309','Muara Uya'),
('630908','6309','Muara Harus'),
('630909','6309','Pugaan'),
('630910','6309','Upau'),
('630911','6309','Jaro'),
('630912','6309','Bintang Ara'),
('631001','6310','Batu Licin'),
('631002','6310','Kusan Hilir'),
('631003','6310','Sungai Loban'),
('631004','6310','Satui'),
('631005','6310','Kusan Hulu'),
('631006','6310','Simpang Empat'),
('631007','6310','Karang Bintang'),
('631008','6310','Mantewe'),
('631009','6310','Angsana'),
('631010','6310','Kuranji'),
('631101','6311','Juai'),
('631102','6311','Halong'),
('631103','6311','Awayan'),
('631104','6311','Batu Mandi'),
('631105','6311','Lampihong'),
('631106','6311','Paringin'),
('631107','6311','Paringin Selatan'),
('631108','6311','Tebing Tinggi'),
('637101','6371','Banjarmasin Selatan'),
('637102','6371','Banjarmasin Timur'),
('637103','6371','Banjarmasin Barat'),
('637104','6371','Banjarmasin Utara'),
('637105','6371','Banjarmasin Tengah'),
('637202','6372','Landasan Ulin'),
('637203','6372','Cempaka'),
('637204','6372','Banjarbaru Utara'),
('637205','6372','Banjarbaru Selatan'),
('637206','6372','Liang Anggang'),
('640101','6401','Batu Sopang'),
('640102','6401','Tanjung Harapan'),
('640103','6401','Pasir Balengkong'),
('640104','6401','Tanah Grogot'),
('640105','6401','Kuaro'),
('640106','6401','Long Ikis'),
('640107','6401','Muara Komam'),
('640108','6401','Long Kali'),
('640109','6401','Batu Engau'),
('640110','6401','Muara Samu'),
('640201','6402','Muara Muntai'),
('640202','6402','Loa Kulu'),
('640203','6402','Loa Janan'),
('640204','6402','Anggana'),
('640205','6402','Muara Badak'),
('640206','6402','Tenggarong'),
('640207','6402','Sebulu'),
('640208','6402','Kota Bangun'),
('640209','6402','Kenohan'),
('640210','6402','Kembang Janggut'),
('640211','6402','Muara Kaman'),
('640212','6402','Tabang'),
('640213','6402','Samboja'),
('640214','6402','Muara Jawa'),
('640215','6402','Sanga Sanga'),
('640216','6402','Tenggarong Seberang'),
('640217','6402','Marang Kayu'),
('640218','6402','Muara Wis'),
('640301','6403','Kelay'),
('640302','6403','Talisayan'),
('640303','6403','Sambaliung'),
('640304','6403','Segah'),
('640305','6403','Tanjung Redeb'),
('640306','6403','Gunung Tabur'),
('640307','6403','Pulau Derawan'),
('640308','6403','Biduk-Biduk'),
('640309','6403','Teluk Bayur'),
('640310','6403','Tabalar'),
('640311','6403','Maratua'),
('640312','6403','Batu Putih'),
('640313','6403','Biatan'),
('640705','6407','Long Iram'),
('640706','6407','Melak'),
('640707','6407','Barong Tongkok'),
('640708','6407','Damai'),
('640709','6407','Muara Lawa'),
('640710','6407','Muara Pahu'),
('640711','6407','Jempang'),
('640712','6407','Bongan'),
('640713','6407','Penyinggahan'),
('640714','6407','Bentian Besar'),
('640715','6407','Linggang Bigung'),
('640716','6407','Nyuatan'),
('640717','6407','Siluq Ngurai'),
('640718','6407','Mook Manaar Bulatn'),
('640719','6407','Tering'),
('640720','6407','Sekolaq Darat'),
('640801','6408','Muara Ancalong'),
('640802','6408','Muara Wahau'),
('640803','6408','Muara Bengkal'),
('640804','6408','Sangatta Utara'),
('640805','6408','Sangkulirang'),
('640806','6408','Busang'),
('640807','6408','Telen'),
('640808','6408','Kombeng'),
('640809','6408','Bengalon'),
('640810','6408','Kaliorang'),
('640811','6408','Sandaran'),
('640812','6408','Sangatta Selatan'),
('640813','6408','Teluk Pandan'),
('640814','6408','Rantau Pulung'),
('640815','6408','Kaubun'),
('640816','6408','Karangan'),
('640817','6408','Batu Ampar'),
('640818','6408','Long Mesangat'),
('640901','6409','Penajam'),
('640902','6409','Waru'),
('640903','6409','Babulu'),
('640904','6409','Sepaku'),
('641101','6411','Long Bagun'),
('641102','6411','Long Hubung'),
('641103','6411','Laham'),
('641104','6411','Long Apari'),
('641105','6411','Long Pahangai'),
('647101','6471','Balikpapan Timur'),
('647102','6471','Balikpapan Barat'),
('647103','6471','Balikpapan Utara'),
('647104','6471','Balikpapan Tengah'),
('647105','6471','Balikpapan Selatan'),
('647106','6471','Balikpapan Kota'),
('647201','6472','Palaran'),
('647202','6472','Samarinda Seberang'),
('647203','6472','Samarinda Ulu'),
('647204','6472','Samarinda Ilir'),
('647205','6472','Samarinda Utara'),
('647206','6472','Sungai Kunjang'),
('647207','6472','Sambutan'),
('647208','6472','Sungai Pinang'),
('647209','6472','Samarinda Kota'),
('647210','6472','Loa Janan Ilir'),
('647401','6474','Bontang Utara'),
('647402','6474','Bontang Selatan'),
('647403','6474','Bontang Barat'),
('650101','6501','Tanjung Palas'),
('650102','6501','Tanjung Palas Barat'),
('650103','6501','Tanjung Palas Utara'),
('650104','6501','Tanjung Palas Timur'),
('650105','6501','Tanjung Selor'),
('650106','6501','Tanjung Palas Tengah'),
('650107','6501','Peso'),
('650108','6501','Peso Hilir'),
('650109','6501','Sekatak'),
('650110','6501','Bunyu'),
('650201','6502','Mentarang'),
('650202','6502','Malinau Kota'),
('650203','6502','Pujungan'),
('650204','6502','Kayan Hilir'),
('650205','6502','Kayan Hulu'),
('650206','6502','Malinau Selatan'),
('650207','6502','Malinau Utara'),
('650208','6502','Malinau Barat'),
('650209','6502','Sungai Boh'),
('650210','6502','Kayan Selatan'),
('650211','6502','Bahau Hulu'),
('650212','6502','Mentarang Hulu'),
('650213','6502','Malinau Selatan Hilir'),
('650214','6502','Malinau Selatan Hulu'),
('650215','6502','Sungai Tubu'),
('650301','6503','Sebatik'),
('650302','6503','Nunukan'),
('650303','6503','Sembakung'),
('650304','6503','Lumbis'),
('650305','6503','Krayan'),
('650306','6503','Sebuku'),
('650307','6503','Krayan Selatan'),
('650308','6503','Sebatik Barat'),
('650309','6503','Nunukan Selatan'),
('650310','6503','Sebatik Timur'),
('650311','6503','Sebatik Utara'),
('650312','6503','Sebatik Tengah'),
('650313','6503','Sei Menggaris'),
('650314','6503','Tulin Onsoi'),
('650315','6503','Lumbis Ogong'),
('650316','6503','Sembakung Atulai'),
('650401','6504','Sesayap'),
('650402','6504','Sesayap Hilir'),
('650403','6504','Tana Lia'),
('650404','6504','Betayau'),
('650405','6504','Muruk Rian'),
('657101','6571','Tarakan Barat'),
('657102','6571','Tarakan Tengah'),
('657103','6571','Tarakan Timur'),
('657104','6571','Tarakan Utara'),
('710105','7101','Sang Tombolang'),
('710109','7101','Dumoga Barat'),
('710110','7101','Dumoga Timur'),
('710111','7101','Dumoga Utara'),
('710112','7101','Lolak'),
('710113','7101','Bolaang'),
('710114','7101','Lolayan'),
('710119','7101','Passi Barat'),
('710120','7101','Poigar'),
('710122','7101','Passi Timur'),
('710131','7101','Bolaang Timur'),
('710132','7101','Bilalang'),
('710133','7101','Dumoga'),
('710134','7101','Dumoga Tenggara'),
('710135','7101','Dumoga Tengah'),
('710201','7102','Tondano Barat'),
('710202','7102','Tondano Timur'),
('710203','7102','Eris'),
('710204','7102','Kombi'),
('710205','7102','Lembean Timur'),
('710206','7102','Kakas'),
('710207','7102','Tompaso'),
('710208','7102','Remboken'),
('710209','7102','Langowan Timur'),
('710210','7102','Langowan Barat'),
('710211','7102','Sonder'),
('710212','7102','Kawangkoan'),
('710213','7102','Pineleng'),
('710214','7102','Tombulu'),
('710215','7102','Tombariri'),
('710216','7102','Tondano Utara'),
('710217','7102','Langowan Selatan'),
('710218','7102','Tondano Selatan'),
('710219','7102','Langowan Utara'),
('710220','7102','Kakas Barat'),
('710221','7102','Kawangkoan Utara'),
('710222','7102','Kawangkoan Barat'),
('710223','7102','Mandolang'),
('710224','7102','Tombariri Timur'),
('710225','7102','Tompaso Barat'),
('710308','7103','Tabukan Utara'),
('710309','7103','Nusa Tabukan'),
('710310','7103','Manganitu Selatan'),
('710311','7103','Tatoareng'),
('710312','7103','Tamako'),
('710313','7103','Manganitu'),
('710314','7103','Tabukan Tengah'),
('710315','7103','Tabukan Selatan'),
('710316','7103','Kendahe'),
('710317','7103','Tahuna'),
('710319','7103','Tabukan Selatan Tengah'),
('710320','7103','Tabukan Selatan Tenggara'),
('710323','7103','Tahuna Barat'),
('710324','7103','Tahuna Timur'),
('710325','7103','Kepulauan Marore'),
('710401','7104','Lirung'),
('710402','7104','Beo'),
('710403','7104','Rainis'),
('710404','7104','Essang'),
('710405','7104','Nanusa'),
('710406','7104','Kabaruan'),
('710407','7104','Melonguane'),
('710408','7104','Gemeh'),
('710409','7104','Damau'),
('710410','7104','Tampan\' Amma'),
('710411','7104','Salibabu'),
('710412','7104','Kalongan'),
('710413','7104','Miangas'),
('710414','7104','Beo Utara'),
('710415','7104','Pulutan'),
('710416','7104','Melonguane Timur'),
('710417','7104','Moronge'),
('710418','7104','Beo Selatan'),
('710419','7104','Essang Selatan'),
('710501','7105','Modoinding'),
('710502','7105','Tompaso Baru'),
('710503','7105','Ranoyapo'),
('710507','7105','Motoling'),
('710508','7105','Sinonsayang'),
('710509','7105','Tenga'),
('710510','7105','Amurang'),
('710512','7105','Tumpaan'),
('710513','7105','Tareran'),
('710515','7105','Kumelembuai'),
('710516','7105','Maesaan'),
('710517','7105','Amurang Barat'),
('710518','7105','Amurang Timur'),
('710519','7105','Tatapaan'),
('710521','7105','Motoling Barat'),
('710522','7105','Motoling Timur'),
('710523','7105','Suluun Tareran'),
('710601','7106','Kema'),
('710602','7106','Kauditan'),
('710603','7106','Airmadidi'),
('710604','7106','Wori'),
('710605','7106','Dimembe'),
('710606','7106','Likupang Barat'),
('710607','7106','Likupang Timur'),
('710608','7106','Kalawat'),
('710609','7106','Talawaan'),
('710610','7106','Likupang Selatan'),
('710701','7107','Ratahan'),
('710702','7107','Pusomaen'),
('710703','7107','Belang'),
('710704','7107','Ratatotok'),
('710705','7107','Tombatu'),
('710706','7107','Touluaan'),
('710707','7107','Touluaan Selatan'),
('710708','7107','Silian Raya'),
('710709','7107','Tombatu Timur'),
('710710','7107','Tombatu Utara'),
('710711','7107','Pasan'),
('710712','7107','Ratahan Timur'),
('710801','7108','Sangkub'),
('710802','7108','Bintauna'),
('710803','7108','Bolangitang Timur'),
('710804','7108','Bolangitang Barat'),
('710805','7108','Kaidipang'),
('710806','7108','Pinogaluman'),
('710901','7109','Siau Timur'),
('710902','7109','Siau Barat'),
('710903','7109','Tagulandang'),
('710904','7109','Siau Timur Selatan'),
('710905','7109','Siau Barat Selatan'),
('710906','7109','Tagulandang Utara'),
('710907','7109','Biaro'),
('710908','7109','Siau Barat Utara'),
('710909','7109','Siau Tengah'),
('710910','7109','Tagulandang Selatan'),
('711001','7110','Tutuyan'),
('711002','7110','Kotabunan'),
('711003','7110','Nuangan'),
('711004','7110','Modayag'),
('711005','7110','Modayag Barat'),
('711101','7111','Bolaang Uki'),
('711102','7111','Posigadan'),
('711103','7111','Pinolosian'),
('711104','7111','Pinolosian Tengah'),
('711105','7111','Pinolosian Timur'),
('717101','7171','Bunaken'),
('717102','7171','Tuminiting'),
('717103','7171','Singkil'),
('717104','7171','Wenang'),
('717105','7171','Tikala'),
('717106','7171','Sario'),
('717107','7171','Wanea'),
('717108','7171','Mapanget'),
('717109','7171','Malalayang'),
('717110','7171','Bunaken Kepulauan'),
('717111','7171','Paal Dua'),
('717201','7172','Lembeh Selatan'),
('717202','7172','Madidir'),
('717203','7172','Ranowulu'),
('717204','7172','Aertembaga'),
('717205','7172','Matuari'),
('717206','7172','Girian'),
('717207','7172','Maesa'),
('717208','7172','Lembeh Utara'),
('717301','7173','Tomohon Selatan'),
('717302','7173','Tomohon Tengah'),
('717303','7173','Tomohon Utara'),
('717304','7173','Tomohon Barat'),
('717305','7173','Tomohon Timur'),
('717401','7174','Kotamobagu Utara'),
('717402','7174','Kotamobagu Timur'),
('717403','7174','Kotamobagu Selatan'),
('717404','7174','Kotamobagu Barat'),
('720101','7201','Batui'),
('720102','7201','Bunta'),
('720103','7201','Kintom'),
('720104','7201','Luwuk'),
('720105','7201','Lamala'),
('720106','7201','Balantak'),
('720107','7201','Pagimana'),
('720108','7201','Bualemo'),
('720109','7201','Toili'),
('720110','7201','Masama'),
('720111','7201','Luwuk Timur'),
('720112','7201','Toili Barat'),
('720113','7201','Nuhon'),
('720114','7201','Moilong'),
('720115','7201','Batui Selatan'),
('720116','7201','Lobu'),
('720117','7201','Simpang Raya'),
('720118','7201','Balantak Selatan'),
('720119','7201','Balantak Utara'),
('720120','7201','Luwuk Selatan'),
('720121','7201','Luwuk Utara'),
('720122','7201','Mantoh'),
('720123','7201','Nambo'),
('720201','7202','Poso Kota'),
('720202','7202','Poso Pesisir'),
('720203','7202','Lage'),
('720204','7202','Pamona Puselemba'),
('720205','7202','Pamona Timur'),
('720206','7202','Pamona Selatan'),
('720207','7202','Lore Utara'),
('720208','7202','Lore Tengah'),
('720209','7202','Lore Selatan'),
('720218','7202','Poso Pesisir Utara'),
('720219','7202','Poso Pesisir Selatan'),
('720220','7202','Pamona Barat'),
('720221','7202','Poso Kota Selatan'),
('720222','7202','Poso Kota Utara'),
('720223','7202','Lore Barat'),
('720224','7202','Lore Timur'),
('720225','7202','Lore Piore'),
('720226','7202','Pamona Tenggara'),
('720227','7202','Pamona Utara'),
('720304','7203','Rio Pakava'),
('720306','7203','Dampelas'),
('720308','7203','Banawa'),
('720309','7203','Labuan'),
('720310','7203','Sindue'),
('720311','7203','Sirenja'),
('720312','7203','Balaesang'),
('720314','7203','Sojol'),
('720318','7203','Banawa Selatan'),
('720319','7203','Tanantovea'),
('720321','7203','Panembani'),
('720324','7203','Sindue Tombusabora'),
('720325','7203','Sindue Tobata'),
('720327','7203','Banawa Tengah'),
('720330','7203','Sojol Utara'),
('720331','7203','Balaesang Tanjung'),
('720401','7204','Dampal Selatan'),
('720402','7204','Dampal Utara'),
('720403','7204','Dondo'),
('720404','7204','Basidondo'),
('720405','7204','Ogodeide'),
('720406','7204','Lampasio'),
('720407','7204','Baolan'),
('720408','7204','Galang'),
('720409','7204','Toli-Toli Utara'),
('720410','7204','Dako Pemean'),
('720501','7205','Momunu'),
('720502','7205','Lakea'),
('720503','7205','Bokat'),
('720504','7205','Bunobogu'),
('720505','7205','Paleleh'),
('720506','7205','Biau'),
('720507','7205','Tiloan'),
('720508','7205','Bukal'),
('720509','7205','Gadung'),
('720510','7205','Karamat'),
('720511','7205','Paleleh Barat'),
('720605','7206','Bungku Tengah'),
('720606','7206','Bungku Selatan'),
('720607','7206','Menui Kepulauan'),
('720608','7206','Bungku Barat'),
('720609','7206','Bumi Raya'),
('720610','7206','Bahodopi'),
('720612','7206','Wita Ponda'),
('720615','7206','Bungku Pesisir'),
('720618','7206','Bungku Timur'),
('720703','7207','Totikum'),
('720704','7207','Tinangkung'),
('720705','7207','Liang'),
('720706','7207','Bulagi'),
('720707','7207','Buko'),
('720709','7207','Bulagi Selatan'),
('720711','7207','Tinangkung Selatan'),
('720715','7207','Totikum Selatan'),
('720716','7207','Peling Tengah'),
('720717','7207','Bulagi Utara'),
('720718','7207','Buko Selatan'),
('720719','7207','Tinangkung Utara'),
('720801','7208','Parigi'),
('720802','7208','Ampibabo'),
('720803','7208','Tinombo'),
('720804','7208','Moutong'),
('720805','7208','Tomini'),
('720806','7208','Sausu'),
('720807','7208','Bolano Lambunu'),
('720808','7208','Kasimbar'),
('720809','7208','Torue'),
('720810','7208','Tinombo Selatan'),
('720811','7208','Parigi Selatan'),
('720812','7208','Mepanga'),
('720813','7208','Toribulu'),
('720814','7208','Taopa'),
('720815','7208','Balinggi'),
('720816','7208','Parigi Barat'),
('720817','7208','Siniu'),
('720818','7208','Palasa'),
('720819','7208','Parigi Utara'),
('720820','7208','Parigi Tengah'),
('720821','7208','Bolano'),
('720822','7208','Ongka Malino'),
('720823','7208','Sidoan'),
('720901','7209','Una Una'),
('720902','7209','Togean'),
('720903','7209','Walea Kepulauan'),
('720904','7209','Ampana Tete'),
('720905','7209','Ampana Kota'),
('720906','7209','Ulubongka'),
('720907','7209','Tojo Barat'),
('720908','7209','Tojo'),
('720909','7209','Walea Besar'),
('720910','7209','Ratolindo'),
('720911','7209','Batudaka'),
('720912','7209','Talatako'),
('721001','7210','Sigi Biromaru'),
('721002','7210','Palolo'),
('721003','7210','Nokilalaki'),
('721004','7210','Lindu'),
('721005','7210','Kulawi'),
('721006','7210','Kulawi Selatan'),
('721007','7210','Pipikoro'),
('721008','7210','Gumbasa'),
('721009','7210','Dolo Selatan'),
('721010','7210','Tanambulava'),
('721011','7210','Dolo Barat'),
('721012','7210','Dolo'),
('721013','7210','Kinovaro'),
('721014','7210','Marawola'),
('721015','7210','Marawola Barat'),
('721101','7211','Banggai'),
('721102','7211','Banggai Utara'),
('721103','7211','Bokan Kepulauan'),
('721104','7211','Bangkurung'),
('721105','7211','Labobo'),
('721106','7211','Banggai Selatan'),
('721107','7211','Banggai Tengah'),
('721201','7212','Petasia'),
('721202','7212','Petasia Timur'),
('721203','7212','Lembo Raya'),
('721204','7212','Lembo'),
('721205','7212','Mori Atas'),
('721206','7212','Mori Utara'),
('721207','7212','Soyo Jaya'),
('721208','7212','Bungku Utara'),
('721209','7212','Mamosalato'),
('727101','7271','Palu Timur'),
('727102','7271','Palu Barat'),
('727103','7271','Palu Selatan'),
('727104','7271','Palu Utara'),
('727105','7271','Ulujadi'),
('727106','7271','Tatanga'),
('727107','7271','Tawaeli'),
('727108','7271','Mantikulore'),
('730101','7301','Benteng'),
('730102','7301','Bontoharu'),
('730103','7301','Bontomatene'),
('730104','7301','Bontomanai'),
('730105','7301','Bontosikuyu'),
('730106','7301','Pasimasunggu'),
('730107','7301','Pasimarannu'),
('730108','7301','Taka Bonerate'),
('730109','7301','Pasilambena'),
('730110','7301','Pasimasunggu Timur'),
('730111','7301','Buki'),
('730201','7302','Gantorang'),
('730202','7302','Ujung Bulu'),
('730203','7302','Bonto Bahari'),
('730204','7302','Bonto Tiro'),
('730205','7302','Herlang'),
('730206','7302','Kajang'),
('730207','7302','Bulukumpa'),
('730208','7302','Kindang'),
('730209','7302','Ujungloe'),
('730210','7302','Rilauale'),
('730301','7303','Bissappu'),
('730302','7303','Bantaeng'),
('730303','7303','Eremerasa'),
('730304','7303','Tompo Bulu'),
('730305','7303','Pajukukang'),
('730306','7303','Uluere'),
('730307','7303','Gantarang Keke'),
('730308','7303','Sinoa'),
('730401','7304','Bangkala'),
('730402','7304','Tamalatea'),
('730403','7304','Binamu'),
('730404','7304','Batang'),
('730405','7304','Kelara'),
('730406','7304','Bangkala Barat'),
('730407','7304','Bontoramba'),
('730408','7304','Turatea'),
('730409','7304','Arungkeke'),
('730410','7304','Rumbia'),
('730411','7304','Tarowang'),
('730501','7305','Mappakasunggu'),
('730502','7305','Mangarabombang'),
('730503','7305','Polombangkeng Selatan'),
('730504','7305','Polombangkeng Utara'),
('730505','7305','Galesong Selatan'),
('730506','7305','Galesong Utara'),
('730507','7305','Pattallassang'),
('730508','7305','Sanrobone'),
('730509','7305','Galesong'),
('730601','7306','Bontonompo'),
('730602','7306','Bajeng'),
('730603','7306','Tompobullu'),
('730604','7306','Tinggimoncong'),
('730605','7306','Parangloe'),
('730606','7306','Bontomarannu'),
('730607','7306','Palangga'),
('730608','7306','Somba Upu'),
('730609','7306','Bungaya'),
('730610','7306','Tombolopao'),
('730611','7306','Biringbulu'),
('730612','7306','Barombong'),
('730613','7306','Pattalasang'),
('730614','7306','Manuju'),
('730615','7306','Bontolempangang'),
('730616','7306','Bontonompo Selatan'),
('730617','7306','Parigi'),
('730618','7306','Bajeng Barat'),
('730701','7307','Sinjai Barat'),
('730702','7307','Sinjai Selatan'),
('730703','7307','Sinjai Timur'),
('730704','7307','Sinjai Tengah'),
('730705','7307','Sinjai Utara'),
('730706','7307','Bulupoddo'),
('730707','7307','Sinjai Borong'),
('730708','7307','Tellu Limpoe'),
('730709','7307','Pulau Sembilan'),
('730801','7308','Bontocani'),
('730802','7308','Kahu'),
('730803','7308','Kajuara'),
('730804','7308','Salomekko'),
('730805','7308','Tonra'),
('730806','7308','Libureng'),
('730807','7308','Mare'),
('730808','7308','Sibulue'),
('730809','7308','Barebbo'),
('730810','7308','Cina'),
('730811','7308','Ponre'),
('730812','7308','Lappariaja'),
('730813','7308','Lamuru'),
('730814','7308','Ulaweng'),
('730815','7308','Palakka'),
('730816','7308','Awangpone'),
('730817','7308','Tellu Siattinge'),
('730818','7308','Ajangale'),
('730819','7308','Dua Boccoe'),
('730820','7308','Cenrana'),
('730821','7308','Tanete Riattang'),
('730822','7308','Tanete Riattang Barat'),
('730823','7308','Tanete Riattang Timur'),
('730824','7308','Amali'),
('730825','7308','Tellulimpoe'),
('730826','7308','Bengo'),
('730827','7308','Patimpeng'),
('730901','7309','Mandai'),
('730902','7309','Camba'),
('730903','7309','Bantimurung'),
('730904','7309','Maros Baru'),
('730905','7309','Bontoa'),
('730906','7309','Malllawa'),
('730907','7309','Tanralili'),
('730908','7309','Marusu'),
('730909','7309','Simbang'),
('730910','7309','Cenrana'),
('730911','7309','Tompobulu'),
('730912','7309','Lau'),
('730913','7309','Moncong Loe'),
('730914','7309','Turikale'),
('731001','7310','Liukang Tangaya'),
('731002','7310','Liukang Kalmas'),
('731003','7310','Liukang Tupabbiring'),
('731004','7310','Pangkajene'),
('731005','7310','Balocci'),
('731006','7310','Bungoro'),
('731007','7310','Labakkang'),
('731008','7310','Marang'),
('731009','7310','Segeri'),
('731010','7310','Minasa Tene'),
('731011','7310','Mandalle'),
('731012','7310','Tondong Tallasa'),
('731013','7310','Liukang Tupabbiring Utara'),
('731101','7311','Tanete Riaja'),
('731102','7311','Tanete Rilau'),
('731103','7311','Barru'),
('731104','7311','Soppeng Riaja'),
('731105','7311','Mallusetasi'),
('731106','7311','Pujananting'),
('731107','7311','Balusu'),
('731201','7312','Marioriwawo'),
('731202','7312','Liliraja'),
('731203','7312','Lilirilau'),
('731204','7312','Lalabata'),
('731205','7312','Marioriawa'),
('731206','7312','Donri Donri'),
('731207','7312','Ganra'),
('731208','7312','Citta'),
('731301','7313','Sabangparu'),
('731302','7313','Pammana'),
('731303','7313','Takkalalla'),
('731304','7313','Sajoanging'),
('731305','7313','Majauleng'),
('731306','7313','Tempe'),
('731307','7313','Belawa'),
('731308','7313','Tanasitolo'),
('731309','7313','Maniangpajo'),
('731310','7313','Pitumpanua'),
('731311','7313','Bola'),
('731312','7313','Penrang'),
('731313','7313','Gilireng'),
('731314','7313','Keera'),
('731401','7314','Panca Lautan'),
('731402','7314','Tellu Limpoe'),
('731403','7314','Watang Pulu'),
('731404','7314','Baranti'),
('731405','7314','Panca Rijang'),
('731406','7314','Kulo'),
('731407','7314','Maritengngae'),
('731408','7314','WT. Sidenreng'),
('731409','7314','Dua Pitue'),
('731410','7314','Pitu Riawa'),
('731411','7314','Pitu Raise'),
('731501','7315','Matirro Sompe'),
('731502','7315','Suppa'),
('731503','7315','Mattiro Bulu'),
('731504','7315','Watang Sawito'),
('731505','7315','Patampanua'),
('731506','7315','Duampanua'),
('731507','7315','Lembang'),
('731508','7315','Cempa'),
('731509','7315','Tiroang'),
('731510','7315','Lansirang'),
('731511','7315','Paleteang'),
('731512','7315','Batu Lappa'),
('731601','7316','Maiwa'),
('731602','7316','Enrekang'),
('731603','7316','Baraka'),
('731604','7316','Anggeraja'),
('731605','7316','Alla'),
('731606','7316','Bungin'),
('731607','7316','Cendana'),
('731608','7316','Curio'),
('731609','7316','Malua'),
('731610','7316','Buntu Batu'),
('731611','7316','Masalle'),
('731612','7316','Baroko'),
('731701','7317','Basse Sangtempe'),
('731702','7317','Larompong'),
('731703','7317','Suli'),
('731704','7317','Bajo'),
('731705','7317','Bua Ponrang'),
('731706','7317','Walenrang'),
('731707','7317','Belopa'),
('731708','7317','Bua'),
('731709','7317','Lamasi'),
('731710','7317','Larompong Selatan'),
('731711','7317','Ponrang'),
('731712','7317','Latimojong'),
('731713','7317','Kamanre'),
('731714','7317','Belopa Utara'),
('731715','7317','Walenrang Barat'),
('731716','7317','Walenrang Utara'),
('731717','7317','Walenrang Timur'),
('731718','7317','Lamasi Timur'),
('731719','7317','Suli Barat'),
('731720','7317','Bajo Barat'),
('731721','7317','Ponrang Selatan'),
('731722','7317','Basse Sangtempe Utara'),
('731801','7318','Saluputi'),
('731802','7318','Bittuang'),
('731803','7318','Bonggakaradeng'),
('731805','7318','Makale'),
('731809','7318','Simbuang'),
('731811','7318','Rantetayo'),
('731812','7318','Mengkendek'),
('731813','7318','Sangalla'),
('731819','7318','Gandangbatu Sillanan'),
('731820','7318','Rembon'),
('731827','7318','Makale Utara'),
('731828','7318','Mappak'),
('731829','7318','Makale Selatan'),
('731831','7318','Masanda'),
('731833','7318','Sangalla Selatan'),
('731834','7318','Sangalla Utara'),
('731835','7318','Malimbong Balepe'),
('731837','7318','Rano'),
('731838','7318','Kurra'),
('732201','7322','Malangke'),
('732202','7322','Bone Bone'),
('732203','7322','Masamba'),
('732204','7322','Sabbang'),
('732205','7322','Limbong'),
('732206','7322','Sukamaju'),
('732207','7322','Seko'),
('732208','7322','Malangke Barat'),
('732209','7322','Rampi'),
('732210','7322','Mappedeceng'),
('732211','7322','Baebunta'),
('732212','7322','Tana Lili'),
('732401','7324','Mangkutana'),
('732402','7324','Nuha'),
('732403','7324','Towuti'),
('732404','7324','Malili'),
('732405','7324','Angkona'),
('732406','7324','Wotu'),
('732407','7324','Burau'),
('732408','7324','Tomoni'),
('732409','7324','Tomoni Timur'),
('732410','7324','Kalaena'),
('732411','7324','Wasuponda'),
('732601','7326','Rantepao'),
('732602','7326','Sesean'),
('732603','7326','Nanggala'),
('732604','7326','Rindingallo'),
('732605','7326','Buntao'),
('732606','7326','Sa\'dan'),
('732607','7326','Sanggalangi'),
('732608','7326','Sopai'),
('732609','7326','Tikala'),
('732610','7326','Balusu'),
('732611','7326','Tallunglipu'),
('732612','7326','Dende\' Piongan Napo'),
('732613','7326','Buntu Pepasan'),
('732614','7326','Baruppu'),
('732615','7326','Kesu'),
('732616','7326','Tondon'),
('732617','7326','Bangkelekila'),
('732618','7326','Rantebua'),
('732619','7326','Sesean Suloara'),
('732620','7326','Kapala Pitu'),
('732621','7326','Awan Rante Karua'),
('737101','7371','Mariso'),
('737102','7371','Mamajang'),
('737103','7371','Makasar'),
('737104','7371','Ujung Pandang'),
('737105','7371','Wajo'),
('737106','7371','Bontoala'),
('737107','7371','Tallo'),
('737108','7371','Ujung Tanah'),
('737109','7371','Panakukkang'),
('737110','7371','Tamalate'),
('737111','7371','Biringkanaya'),
('737112','7371','Manggala'),
('737113','7371','Rappocini'),
('737114','7371','Tamalanrea'),
('737201','7372','Bacukiki'),
('737202','7372','Ujung'),
('737203','7372','Soreang'),
('737204','7372','Bacukiki Barat'),
('737301','7373','Wara'),
('737302','7373','Wara Utara'),
('737303','7373','Wara Selatan'),
('737304','7373','Telluwanua'),
('737305','7373','Wara Timur'),
('737306','7373','Wara Barat'),
('737307','7373','Sendana'),
('737308','7373','Mungkajang'),
('737309','7373','Bara'),
('740101','7401','Wundulako'),
('740104','7401','Kolaka'),
('740107','7401','Pomalaa'),
('740108','7401','Watubangga'),
('740110','7401','Wolo'),
('740112','7401','Baula'),
('740114','7401','Latambaga'),
('740118','7401','Tanggetada'),
('740120','7401','Samaturu'),
('740124','7401','Toari'),
('740125','7401','Polinggona'),
('740127','7401','Iwoimendaa'),
('740201','7402','Lambuya'),
('740202','7402','Unaaha'),
('740203','7402','Wawotobi'),
('740204','7402','Pondidaha'),
('740205','7402','Sampara'),
('740210','7402','Abuki'),
('740211','7402','Soropia'),
('740215','7402','Tongauna'),
('740216','7402','Latoma'),
('740217','7402','Puriala'),
('740218','7402','Uepai'),
('740219','7402','Wonggeduku'),
('740220','7402','Besulutu'),
('740221','7402','Bondoala'),
('740223','7402','Routa'),
('740224','7402','Anggaberi'),
('740225','7402','Meluhu'),
('740228','7402','Amonggedo'),
('740231','7402','Asinua'),
('740232','7402','Konawe'),
('740233','7402','Kapoiala'),
('740236','7402','Lalonggasumeeto'),
('740237','7402','Onembute'),
('740306','7403','Napabalano'),
('740307','7403','Maligano'),
('740313','7403','Wakorumba Selatan'),
('740314','7403','Lasalepa'),
('740315','7403','Batalaiwaru'),
('740316','7403','Katobu'),
('740317','7403','Duruka'),
('740318','7403','Lohia'),
('740319','7403','Watopute'),
('740320','7403','Kontunaga'),
('740323','7403','Kabangka'),
('740324','7403','Kabawo'),
('740325','7403','Parigi'),
('740326','7403','Bone'),
('740327','7403','Tongkuno'),
('740328','7403','Pasir Putih'),
('740330','7403','Kontu Kowuna'),
('740331','7403','Marobo'),
('740332','7403','Tongkuno Selatan'),
('740333','7403','Pasi Kolaga'),
('740334','7403','Batukara'),
('740337','7403','Towea'),
('740411','7404','Pasarwajo'),
('740422','7404','Kapontori'),
('740423','7404','Lasalimu'),
('740424','7404','Lasalimu Selatan'),
('740427','7404','Siotapina'),
('740428','7404','Wolowa'),
('740429','7404','Wabula'),
('740501','7405','Tinanggea'),
('740502','7405','Angata'),
('740503','7405','Andoolo'),
('740504','7405','Palangga'),
('740505','7405','Landono'),
('740506','7405','Lainea'),
('740507','7405','Konda'),
('740508','7405','Ranomeeto'),
('740509','7405','Kolono'),
('740510','7405','Moramo'),
('740511','7405','Laonti'),
('740512','7405','Lalembuu'),
('740513','7405','Benua'),
('740514','7405','Palangga Selatan'),
('740515','7405','Mowila'),
('740516','7405','Moramo Utara'),
('740517','7405','Buke'),
('740518','7405','Wolasi'),
('740519','7405','Laeya'),
('740520','7405','Baito'),
('740521','7405','Basala'),
('740522','7405','Ranomeeto Barat'),
('740601','7406','Poleang'),
('740602','7406','Poleang Timur'),
('740603','7406','Rarowatu'),
('740604','7406','Rumbia'),
('740605','7406','Kabaena'),
('740606','7406','Kabaena Timur'),
('740607','7406','Poleang Barat'),
('740608','7406','Mata Oleo'),
('740609','7406','Rarowatu Utara'),
('740610','7406','Poleang Utara'),
('740611','7406','Poleang Selatan'),
('740612','7406','Poleang Tenggara'),
('740613','7406','Kabaena Selatan'),
('740614','7406','Kabaena Barat'),
('740615','7406','Kabaena Utara'),
('740616','7406','Kabaena Tengah'),
('740617','7406','Kep. Masaloka Raya'),
('740618','7406','Rumbia Tengah'),
('740619','7406','Poleang Tengah'),
('740620','7406','Tontonunu'),
('740621','7406','Lantari Jaya'),
('740622','7406','Mata Usu'),
('740701','7407','Wangi-Wangi'),
('740702','7407','Kaledupa'),
('740703','7407','Tomia'),
('740704','7407','Binongko'),
('740705','7407','Wangi Wangi Selatan'),
('740706','7407','Kaledupa Selatan'),
('740707','7407','Tomia Timur'),
('740708','7407','Togo Binongko'),
('740801','7408','Lasusua'),
('740802','7408','Pakue'),
('740803','7408','Batu Putih'),
('740804','7408','Rante Angin'),
('740805','7408','Kodeoha'),
('740806','7408','Ngapa'),
('740807','7408','Wawo'),
('740808','7408','Lambai'),
('740809','7408','Watunohu'),
('740810','7408','Pakue Tengah'),
('740811','7408','Pakue Utara'),
('740812','7408','Porehu'),
('740813','7408','Tolala'),
('740814','7408','Tiwu'),
('740815','7408','Katoi'),
('740901','7409','Asera'),
('740902','7409','Wiwirano'),
('740903','7409','Langgikima'),
('740904','7409','Molawe'),
('740905','7409','Lasolo'),
('740906','7409','Lembo'),
('740907','7409','Sawa'),
('740908','7409','Oheo'),
('740909','7409','Andowia'),
('740910','7409','Motui'),
('741001','7410','Kulisusu'),
('741002','7410','Kambowa'),
('741003','7410','Bonegunu'),
('741004','7410','Kulisusu Barat'),
('741005','7410','Kulisusu Utara'),
('741006','7410','Wakorumba Utara'),
('741101','7411','Tirawuta'),
('741102','7411','Loea'),
('741103','7411','Ladongi'),
('741104','7411','Poli Polia'),
('741105','7411','Lambandia'),
('741106','7411','Lalolae'),
('741107','7411','Mowewe'),
('741108','7411','Uluiwoi'),
('741109','7411','Tinondo'),
('741110','7411','Aere'),
('741111','7411','Ueesi'),
('741112','7411','Dangia'),
('741201','7412','Wawonii Barat'),
('741202','7412','Wawonii Utara'),
('741203','7412','Wawonii Timur Laut'),
('741204','7412','Wawonii Timur'),
('741205','7412','Wawonii Tenggara'),
('741206','7412','Wawonii Selatan'),
('741207','7412','Wawonii Tengah'),
('741301','7413','Sawerigadi'),
('741302','7413','Barangka'),
('741303','7413','Lawa'),
('741304','7413','Wadaga'),
('741305','7413','Tiworo Selatan'),
('741306','7413','Maginti'),
('741307','7413','Tiworo Tengah'),
('741308','7413','Tiworo Utara'),
('741309','7413','Tiworo Kepulauan'),
('741310','7413','Kusambi'),
('741311','7413','Napano Kusambi'),
('741401','7414','Lakudo'),
('741402','7414','Mawasangka Timur'),
('741403','7414','Mawasangka Tengah'),
('741404','7414','Mawasangka'),
('741405','7414','Talaga Raya'),
('741406','7414','Gu'),
('741407','7414','Sangia Wambulu'),
('741501','7415','Batauga'),
('741502','7415','Sampolawa'),
('741503','7415','Lapandewa'),
('741504','7415','Batu Atas'),
('741505','7415','Siompu Barat'),
('741506','7415','Siompu'),
('741507','7415','Kadatua'),
('747101','7471','Mandonga'),
('747102','7471','Kendari'),
('747103','7471','Baruga'),
('747104','7471','Poasia'),
('747105','7471','Kendari Barat'),
('747106','7471','Abeli'),
('747107','7471','Wua-Wua'),
('747108','7471','Kadia'),
('747109','7471','Puuwatu'),
('747110','7471','Kambu'),
('747201','7472','Betoambari'),
('747202','7472','Wolio'),
('747203','7472','Sora Walio'),
('747204','7472','Bungi'),
('747205','7472','Kokalukuna'),
('747206','7472','Murhum'),
('747207','7472','Lea-Lea'),
('747208','7472','Batupoaro'),
('750101','7501','Limboto'),
('750102','7501','Telaga'),
('750103','7501','Batudaa'),
('750104','7501','Tibawa'),
('750105','7501','Batudaa Pantai'),
('750109','7501','Boliyohuto'),
('750110','7501','Telaga Biru'),
('750111','7501','Bongomeme'),
('750113','7501','Tolangohula'),
('750114','7501','Mootilango'),
('750116','7501','Pulubala'),
('750117','7501','Limboto Barat'),
('750118','7501','Tilango'),
('750119','7501','Tabongo'),
('750120','7501','Biluhu'),
('750121','7501','Asparaga'),
('750122','7501','Talaga Jaya'),
('750123','7501','Bilato'),
('750124','7501','Dungaliyo'),
('750201','7502','Paguyaman'),
('750202','7502','Wonosari'),
('750203','7502','Dulupi'),
('750204','7502','Tilamuta'),
('750205','7502','Mananggu'),
('750206','7502','Botumoita'),
('750207','7502','Paguyaman Pantai'),
('750301','7503','Tapa'),
('750302','7503','Kabila'),
('750303','7503','Suwawa'),
('750304','7503','Bonepantai'),
('750305','7503','Bulango Utara'),
('750306','7503','Tilongkabila'),
('750307','7503','Botupingge'),
('750308','7503','Kabila Bone'),
('750309','7503','Bone'),
('750310','7503','Bone Raya'),
('750311','7503','Suwawa Timur'),
('750312','7503','Suwawa Selatan'),
('750313','7503','Suwawa Tengah'),
('750314','7503','Bulango Ulu'),
('750315','7503','Bulango Selatan'),
('750316','7503','Bulango Timur'),
('750317','7503','Bulawa'),
('750318','7503','Pinogu'),
('750401','7504','Popayato'),
('750402','7504','Lemito'),
('750403','7504','Randangan'),
('750404','7504','Marisa'),
('750405','7504','Paguat'),
('750406','7504','Patilanggio'),
('750407','7504','Taluditi'),
('750408','7504','Dengilo'),
('750409','7504','Buntulia'),
('750410','7504','Duhiadaa'),
('750411','7504','Wanggarasi'),
('750412','7504','Popayato Timur'),
('750413','7504','Popayato Barat'),
('750501','7505','Atinggola'),
('750502','7505','Kwandang'),
('750503','7505','Anggrek'),
('750504','7505','Sumalata'),
('750505','7505','Tolinggula'),
('750506','7505','Gentuma Raya'),
('750507','7505','Tomolito'),
('750508','7505','Ponelo Kepulauan'),
('750509','7505','Monano'),
('750510','7505','Biau'),
('750511','7505','Sumalata Timur'),
('757101','7571','Kota Barat'),
('757102','7571','Kota Selatan'),
('757103','7571','Kota Utara'),
('757104','7571','Dungingi'),
('757105','7571','Kota Timur'),
('757106','7571','Kota Tengah'),
('757107','7571','Sipatana'),
('757108','7571','Dumbo Raya'),
('757109','7571','Hulonthalangi'),
('760101','7601','Bambalamotu'),
('760102','7601','Pasangkayu'),
('760103','7601','Baras'),
('760104','7601','Sarudu'),
('760105','7601','Dapurang'),
('760106','7601','Duripoku'),
('760107','7601','Bulu Taba'),
('760108','7601','Tikke Raya'),
('760109','7601','Pedongga'),
('760110','7601','Bambaira'),
('760111','7601','Sarjo'),
('760112','7601','Lariang'),
('760201','7602','Mamuju'),
('760202','7602','Tapalang'),
('760203','7602','Kalukku'),
('760204','7602','Kalumpang'),
('760207','7602','Papalang'),
('760208','7602','Sampaga'),
('760211','7602','Tommo'),
('760212','7602','Simboro dan Kepulauan'),
('760213','7602','Tapalang Barat'),
('760215','7602','Bonehau'),
('760216','7602','Kep. Bala Balakang'),
('760301','7603','Mambi'),
('760302','7603','Aralle'),
('760303','7603','Mamasa'),
('760304','7603','Pana'),
('760305','7603','Tabulahan'),
('760306','7603','Sumarorong'),
('760307','7603','Messawa'),
('760308','7603','Sesenapadang'),
('760309','7603','Tanduk Kalua'),
('760310','7603','Tabang'),
('760311','7603','Bambang'),
('760312','7603','Balla'),
('760313','7603','Nosu'),
('760314','7603','Tawalian'),
('760315','7603','Rantebulahan Timur'),
('760316','7603','Buntumalangka'),
('760317','7603','Mehalaan'),
('760401','7604','Tinambung'),
('760402','7604','Campalagian'),
('760403','7604','Wonomulyo'),
('760404','7604','Polewali'),
('760405','7604','Tutar'),
('760406','7604','Binuang'),
('760407','7604','Tapango'),
('760408','7604','Mapilli'),
('760409','7604','Matangnga'),
('760410','7604','Luyo'),
('760411','7604','Limboro'),
('760412','7604','Balanipa'),
('760413','7604','Anreapi'),
('760414','7604','Matakali'),
('760415','7604','Allu'),
('760416','7604','Bulo'),
('760501','7605','Banggae'),
('760502','7605','Pamboang'),
('760503','7605','Sendana'),
('760504','7605','Malunda'),
('760505','7605','Ulumanda'),
('760506','7605','Tammerodo Sendana'),
('760507','7605','Tubo Sendana'),
('760508','7605','Banggae Timur'),
('760601','7606','Tobadak'),
('760602','7606','Pangale'),
('760603','7606','Budong-Budong'),
('760604','7606','Topoyo'),
('760605','7606','Karossa'),
('810101','8101','Amahai'),
('810102','8101','Teon Nila Serua'),
('810106','8101','Seram Utara'),
('810109','8101','Banda'),
('810111','8101','Tehoru'),
('810112','8101','Saparua'),
('810113','8101','Pulau Haruku'),
('810114','8101','Salahutu'),
('810115','8101','Leihitu'),
('810116','8101','Nusa Laut'),
('810117','8101','Kota Masohi'),
('810120','8101','Seram Utara Barat'),
('810121','8101','Teluk Elpaputih'),
('810122','8101','Leihitu Barat'),
('810123','8101','Telutih'),
('810124','8101','Seram Utara Timur Seti'),
('810125','8101','Seram Utara Timur Kobi'),
('810126','8101','Saparua Timur'),
('810201','8102','Kei Kecil'),
('810203','8102','Kei Besar'),
('810204','8102','Kei Besar Selatan'),
('810205','8102','Kei Besar Utara Timur'),
('810213','8102','Kei Kecil Timur'),
('810214','8102','Kei Kecil Barat'),
('810215','8102','Manyeuw'),
('810216','8102','Hoat Sorbay'),
('810217','8102','Kei Besar Utara Barat'),
('810218','8102','Kei Besar Selatan Barat'),
('810219','8102','Kei Kecil Timur Selatan'),
('810301','8103','Tanimbar Selatan'),
('810302','8103','Selaru'),
('810303','8103','Wer Tamrian'),
('810304','8103','Wer Maktian'),
('810305','8103','Tanimbar Utara'),
('810306','8103','Yaru'),
('810307','8103','Wuar Labobar'),
('810308','8103','Kormomolin'),
('810309','8103','Nirunmas'),
('810318','8103','Molu Maru'),
('810401','8104','Namlea'),
('810402','8104','Air Buaya'),
('810403','8104','Waeapo'),
('810406','8104','Waplau'),
('810410','8104','Batabual'),
('810411','8104','Lolong Guba'),
('810412','8104','Waelata'),
('810413','8104','Fena Leisela'),
('810414','8104','Teluk Kaiely'),
('810415','8104','Lilialy'),
('810501','8105','Bula'),
('810502','8105','Seram Timur'),
('810503','8105','Werinama'),
('810504','8105','Pulau Gorom'),
('810505','8105','Wakate'),
('810506','8105','Tutuk Tolu'),
('810507','8105','Siwalalat'),
('810508','8105','Kilmury'),
('810509','8105','Pulau Panjang'),
('810510','8105','Teor'),
('810511','8105','Gorom Timur'),
('810512','8105','Bula Barat'),
('810513','8105','Kian Darat'),
('810514','8105','Siritaun Wida Timur'),
('810515','8105','Teluk Waru'),
('810601','8106','Kairatu'),
('810602','8106','Seram Barat'),
('810603','8106','Taniwel'),
('810604','8106','Huamual Belakang'),
('810605','8106','Amalatu'),
('810606','8106','Inamosol'),
('810607','8106','Kairatu Barat'),
('810608','8106','Huamual'),
('810609','8106','Kepulauan Manipa'),
('810610','8106','Taniwel Timur'),
('810611','8106','Elpaputih'),
('810701','8107','Pulau-Pulau Aru'),
('810702','8107','Aru Selatan'),
('810703','8107','Aru Tengah'),
('810704','8107','Aru Utara'),
('810705','8107','Aru Utara Timur Batuley'),
('810706','8107','Sir-Sir'),
('810707','8107','Aru Tengah Timur'),
('810708','8107','Aru Tengah Selatan'),
('810709','8107','Aru Selatan Timur'),
('810710','8107','Aru Selatan Utara'),
('810801','8108','Moa Lakor'),
('810802','8108','Damer'),
('810803','8108','Mndona Hiera'),
('810804','8108','Pulau-Pulau Babar'),
('810805','8108','Pulau-pulau Babar Timur'),
('810806','8108','Wetar'),
('810807','8108','Pulau-pulau Terselatan'),
('810808','8108','Pulau Leti'),
('810809','8108','Pulau Masela'),
('810810','8108','Dawelor Dawera'),
('810811','8108','Pulau Wetang'),
('810812','8108','Pulau Lakor'),
('810813','8108','Wetar Utara'),
('810814','8108','Wetar Barat'),
('810815','8108','Wetar Timur'),
('810816','8108','Kepulauan Romang'),
('810817','8108','Kisar Utara'),
('810901','8109','Namrole'),
('810902','8109','Waesama'),
('810903','8109','Ambalau'),
('810904','8109','Kepala Madan'),
('810905','8109','Leksula'),
('810906','8109','Fena Fafan'),
('817101','8171','Nusaniwe'),
('817102','8171','Sirimau'),
('817103','8171','Baguala'),
('817104','8171','Teluk Ambon'),
('817105','8171','Leitimur Selatan'),
('817201','8172','Pulau Dullah Utara'),
('817202','8172','Pulau Dullah Selatan'),
('817203','8172','Tayando Tam'),
('817204','8172','Pulau-Pulau Kur'),
('817205','8172','Kur Selatan'),
('820101','8201','Jailolo'),
('820102','8201','Loloda'),
('820103','8201','Ibu'),
('820104','8201','Sahu'),
('820105','8201','Jailolo Selatan'),
('820107','8201','Ibu Utara'),
('820108','8201','Ibu Selatan'),
('820109','8201','Sahu Timur'),
('820201','8202','Weda'),
('820202','8202','Patani'),
('820203','8202','Pulau Gebe'),
('820204','8202','Weda Utara'),
('820205','8202','Weda Selatan'),
('820206','8202','Patani Utara'),
('820207','8202','Weda Tengah'),
('820208','8202','Patani Barat'),
('820304','8203','Galela'),
('820305','8203','Tobelo'),
('820306','8203','Tobelo Selatan'),
('820307','8203','Kao'),
('820308','8203','Malifut'),
('820309','8203','Loloda Utara'),
('820310','8203','Tobelo Utara'),
('820311','8203','Tobelo Tengah'),
('820312','8203','Tobelo Timur'),
('820313','8203','Tobelo Barat'),
('820314','8203','Galela Barat'),
('820315','8203','Galela Utara'),
('820316','8203','Galela Selatan'),
('820319','8203','Loloda Kepulauan'),
('820320','8203','Kao Utara'),
('820321','8203','Kao Barat'),
('820322','8203','Kao Teluk'),
('820401','8204','Pulau Makian'),
('820402','8204','Kayoa'),
('820403','8204','Gane Timur'),
('820404','8204','Gane Barat'),
('820405','8204','Obi Selatan'),
('820406','8204','Obi'),
('820407','8204','Bacan Timur'),
('820408','8204','Bacan'),
('820409','8204','Bacan Barat'),
('820410','8204','Makian Barat'),
('820411','8204','Kayoa Barat'),
('820412','8204','Kayoa Selatan'),
('820413','8204','Kayoa Utara'),
('820414','8204','Bacan Barat Utara'),
('820415','8204','Kasiruta Barat'),
('820416','8204','Kasiruta Timur'),
('820417','8204','Bacan Selatan'),
('820418','8204','Kepulauan Botanglomang'),
('820419','8204','Mandioli Selatan'),
('820420','8204','Mandioli Utara'),
('820421','8204','Bacan Timur Selatan'),
('820422','8204','Bacan Timur Tengah'),
('820423','8204','Gane Barat Selatan'),
('820424','8204','Gane Barat Utara'),
('820425','8204','Kepulauan Joronga'),
('820426','8204','Gane Timur Selatan'),
('820427','8204','Gane Timur Tengah'),
('820428','8204','Obi Barat'),
('820429','8204','Obi Timur'),
('820430','8204','Obi Utara'),
('820501','8205','Mangoli Timur'),
('820502','8205','Sanana'),
('820503','8205','Sulabesi Barat'),
('820506','8205','Mangoli Barat'),
('820507','8205','Sulabesi Tengah'),
('820508','8205','Sulabesi Timur'),
('820509','8205','Sulabesi Selatan'),
('820510','8205','Mangoli Utara Timur'),
('820511','8205','Mangoli Tengah'),
('820512','8205','Mangoli Selatan'),
('820513','8205','Mangoli Utara'),
('820518','8205','Sanana Utara'),
('820601','8206','Wasile'),
('820602','8206','Maba'),
('820603','8206','Maba Selatan'),
('820604','8206','Wasile Selatan'),
('820605','8206','Wasile Tengah'),
('820606','8206','Wasile Utara'),
('820607','8206','Wasile Timur'),
('820608','8206','Maba Tengah'),
('820609','8206','Maba Utara'),
('820610','8206','Kota Maba'),
('820701','8207','Morotai Selatan'),
('820702','8207','Morotai Selatan Barat'),
('820703','8207','Morotai Jaya'),
('820704','8207','Morotai Utara'),
('820705','8207','Morotai Timur'),
('820801','8208','Taliabu Barat'),
('820802','8208','Taliabu Barat Laut'),
('820803','8208','Lede'),
('820804','8208','Taliabu Utara'),
('820805','8208','Taliabu Timur'),
('820806','8208','Taliabu Timur Selatan'),
('820807','8208','Taliabu Selatan'),
('820808','8208','Tabona'),
('827101','8271','Pulau Ternate'),
('827102','8271','Kota Ternate Selatan'),
('827103','8271','Kota Ternate Utara'),
('827104','8271','Pulau Moti'),
('827105','8271','Pulau Batang Dua'),
('827106','8271','Kota Ternate Tengah'),
('827107','8271','Pulau Hiri'),
('827201','8272','Tidore'),
('827202','8272','Oba Utara'),
('827203','8272','Oba'),
('827204','8272','Tidore Selatan'),
('827205','8272','Tidore Utara'),
('827206','8272','Oba Tengah'),
('827207','8272','Oba Selatan'),
('827208','8272','Tidore Timur'),
('910101','9101','Merauke'),
('910102','9101','Muting'),
('910103','9101','Okaba'),
('910104','9101','Kimaam'),
('910105','9101','Semangga'),
('910106','9101','Tanah Miring'),
('910107','9101','Jagebob'),
('910108','9101','Sota'),
('910109','9101','Ulilin'),
('910110','9101','Elikobal'),
('910111','9101','Kurik'),
('910112','9101','Naukenjerai'),
('910113','9101','Animha'),
('910114','9101','Malind'),
('910115','9101','Tubang'),
('910116','9101','Ngguti'),
('910117','9101','Kaptel'),
('910118','9101','Tabonji'),
('910119','9101','Waan'),
('910120','9101','Ilwayab'),
('910201','9102','Wamena'),
('910203','9102','Kurulu'),
('910204','9102','Asologaima'),
('910212','9102','Hubikosi'),
('910215','9102','Bolakme'),
('910225','9102','Walelagama'),
('910227','9102','Musatfak'),
('910228','9102','Wolo'),
('910229','9102','Asolokobal'),
('910234','9102','Pelebaga'),
('910235','9102','Yalengga'),
('910240','9102','Trikora'),
('910241','9102','Napua'),
('910242','9102','Walaik'),
('910243','9102','Wouma'),
('910244','9102','Hubikiak'),
('910245','9102','Ibele'),
('910246','9102','Taelarek'),
('910247','9102','Itlay Hisage'),
('910248','9102','Siepkosi'),
('910249','9102','Usilimo'),
('910250','9102','Wita Waya'),
('910251','9102','Libarek'),
('910252','9102','Wadangku'),
('910253','9102','Pisugi'),
('910254','9102','Koragi'),
('910255','9102','Tagime'),
('910256','9102','Molagalome'),
('910257','9102','Tagineri'),
('910258','9102','Silo Karno Doga'),
('910259','9102','Piramid'),
('910260','9102','Muliama'),
('910261','9102','Bugi'),
('910262','9102','Bpiri'),
('910263','9102','Welesi'),
('910264','9102','Asotipo'),
('910265','9102','Maima'),
('910266','9102','Popugoba'),
('910267','9102','Wame'),
('910268','9102','Wesaput'),
('910301','9103','Sentani'),
('910302','9103','Sentani Timur'),
('910303','9103','Depapre'),
('910304','9103','Sentani Barat'),
('910305','9103','Kemtuk'),
('910306','9103','Kemtuk Gresi'),
('910307','9103','Nimboran'),
('910308','9103','Nimbokrang'),
('910309','9103','Unurum Guay'),
('910310','9103','Demta'),
('910311','9103','Kaureh'),
('910312','9103','Ebungfa'),
('910313','9103','Waibu'),
('910314','9103','Nambluong'),
('910315','9103','Yapsi'),
('910316','9103','Airu'),
('910317','9103','Raveni Rara'),
('910318','9103','Gresi Selatan'),
('910319','9103','Yokari'),
('910401','9104','Nabire'),
('910402','9104','Napan'),
('910403','9104','Yaur'),
('910406','9104','Uwapa'),
('910407','9104','Wanggar'),
('910410','9104','Siriwo'),
('910411','9104','Makimi'),
('910412','9104','Teluk Umar'),
('910416','9104','Teluk Kimi'),
('910417','9104','Yaro'),
('910421','9104','Wapoga'),
('910422','9104','Nabire Barat'),
('910423','9104','Moora'),
('910424','9104','Dipa'),
('910425','9104','Menou'),
('910501','9105','Yapen Selatan'),
('910502','9105','Yapen Barat'),
('910503','9105','Yapen Timur'),
('910504','9105','Angkaisera'),
('910505','9105','Poom'),
('910506','9105','Kosiwo'),
('910507','9105','Yapen Utara'),
('910508','9105','Raimbawi'),
('910509','9105','Teluk Ampimoi'),
('910510','9105','Kepulauan Ambai'),
('910511','9105','Wonawa'),
('910512','9105','Windesi'),
('910513','9105','Pulau Kurudu'),
('910514','9105','Pulau Yerui'),
('910601','9106','Biak Kota'),
('910602','9106','Biak Utara'),
('910603','9106','Biak Timur'),
('910604','9106','Numfor Barat'),
('910605','9106','Numfor Timur'),
('910608','9106','Biak Barat'),
('910609','9106','Warsa'),
('910610','9106','Padaido'),
('910611','9106','Yendidori'),
('910612','9106','Samofa'),
('910613','9106','Yawosi'),
('910614','9106','Andey'),
('910615','9106','Swandiwe'),
('910616','9106','Bruyadori'),
('910617','9106','Orkeri'),
('910618','9106','Poiru'),
('910619','9106','Aimando Padaido'),
('910620','9106','Oridek'),
('910621','9106','Bondifuar'),
('910701','9107','Mulia'),
('910703','9107','Ilu'),
('910706','9107','Fawi'),
('910707','9107','Mewoluk'),
('910708','9107','Yamo'),
('910710','9107','Nume'),
('910711','9107','Torere'),
('910712','9107','Tingginambut'),
('910717','9107','Pagaleme'),
('910718','9107','Gurage'),
('910719','9107','Irimuli'),
('910720','9107','Muara'),
('910721','9107','Ilamburawi'),
('910722','9107','Yambi'),
('910723','9107','Lumo'),
('910724','9107','Molanikime'),
('910725','9107','Dokome'),
('910726','9107','Kalome'),
('910727','9107','Wanwi'),
('910728','9107','Yamoneri'),
('910729','9107','Waegi'),
('910730','9107','Nioga'),
('910731','9107','Gubume'),
('910732','9107','Taganombak'),
('910733','9107','Dagai'),
('910734','9107','Kiyage'),
('910801','9108','Paniai Timur'),
('910802','9108','Paniai Barat'),
('910804','9108','Aradide'),
('910807','9108','Bogabaida'),
('910809','9108','Bibida'),
('910812','9108','Dumadama'),
('910813','9108','Siriwo'),
('910819','9108','Kebo'),
('910820','9108','Yatamo'),
('910821','9108','Ekadide'),
('910901','9109','Mimika Baru'),
('910902','9109','Agimuga'),
('910903','9109','Mimika Timur'),
('910904','9109','Mimika Barat'),
('910905','9109','Jita'),
('910906','9109','Jila'),
('910907','9109','Mimika Timur Jauh'),
('910908','9109','Mimika Tengah'),
('910909','9109','Kuala Kencana'),
('910910','9109','Tembagapura'),
('910911','9109','Mimika Barat Jauh'),
('910912','9109','Mimika Barat Tengah'),
('910913','9109','Kwamki Narama'),
('910914','9109','Hoya'),
('910915','9109','Iwaka'),
('910916','9109','Wania'),
('910917','9109','Amar'),
('910918','9109','Alama'),
('911001','9110','Sarmi'),
('911002','9110','Tor Atas'),
('911003','9110','Pantai Barat'),
('911004','9110','Pantai Timur'),
('911005','9110','Bonggo'),
('911009','9110','Apawer Hulu'),
('911012','9110','Sarmi Selatan'),
('911013','9110','Sarmi Timur'),
('911014','9110','Pantai Timur Bagian Barat'),
('911015','9110','Bonggo Timur'),
('911101','9111','Waris'),
('911102','9111','Arso'),
('911103','9111','Senggi'),
('911104','9111','Web'),
('911105','9111','Skanto'),
('911106','9111','Arso Timur'),
('911107','9111','Towe'),
('911201','9112','Oksibil'),
('911202','9112','Kiwirok'),
('911203','9112','Okbibab'),
('911204','9112','Iwur'),
('911205','9112','Batom'),
('911206','9112','Borme'),
('911207','9112','Kiwirok Timur'),
('911208','9112','Aboy'),
('911209','9112','Pepera'),
('911210','9112','Bime'),
('911211','9112','Alemsom'),
('911212','9112','Okbape'),
('911213','9112','Kalomdol'),
('911214','9112','Oksop'),
('911215','9112','Serambakon'),
('911216','9112','Ok Aom'),
('911217','9112','Kawor'),
('911218','9112','Awinbon'),
('911219','9112','Tarup'),
('911220','9112','Okhika'),
('911221','9112','Oksamol'),
('911222','9112','Oklip'),
('911223','9112','Okbemtau'),
('911224','9112','Oksebang'),
('911225','9112','Okbab'),
('911226','9112','Batani'),
('911227','9112','Weime'),
('911228','9112','Murkim'),
('911229','9112','Mofinop'),
('911230','9112','Jetfa'),
('911231','9112','Teiraplu'),
('911232','9112','Eipumek'),
('911233','9112','Pamek'),
('911234','9112','Nongme'),
('911301','9113','Kurima'),
('911302','9113','Anggruk'),
('911303','9113','Ninia'),
('911306','9113','Silimo'),
('911307','9113','Samenage'),
('911308','9113','Nalca'),
('911309','9113','Dekai'),
('911310','9113','Obio'),
('911311','9113','Suru Suru'),
('911312','9113','Wusama'),
('911313','9113','Amuma'),
('911314','9113','Musaik'),
('911315','9113','Pasema'),
('911316','9113','Hogio'),
('911317','9113','Mugi'),
('911318','9113','Soba'),
('911319','9113','Werima'),
('911320','9113','Tangma'),
('911321','9113','Ukha'),
('911322','9113','Panggema'),
('911323','9113','Kosarek'),
('911324','9113','Nipsan'),
('911325','9113','Ubahak'),
('911326','9113','Pronggoli'),
('911327','9113','Walma'),
('911328','9113','Yahuliambut'),
('911329','9113','Hereapini'),
('911330','9113','Ubalihi'),
('911331','9113','Talambo'),
('911332','9113','Puldama'),
('911333','9113','Endomen'),
('911334','9113','Kona'),
('911335','9113','Dirwemna'),
('911336','9113','Holuon'),
('911337','9113','Lolat'),
('911338','9113','Soloikma'),
('911339','9113','Sela'),
('911340','9113','Korupun'),
('911341','9113','Langda'),
('911342','9113','Bomela'),
('911343','9113','Suntamon'),
('911344','9113','Seredela'),
('911345','9113','Sobaham'),
('911346','9113','Kabianggama'),
('911347','9113','Kwelemdua'),
('911348','9113','Kwikma'),
('911349','9113','Hilipuk'),
('911350','9113','Duram'),
('911351','9113','Yogosem'),
('911352','9113','Kayo'),
('911353','9113','Sumo'),
('911401','9114','Karubaga'),
('911402','9114','Bokondini'),
('911403','9114','Kanggime'),
('911404','9114','Kembu'),
('911405','9114','Goyage'),
('911406','9114','Wunim'),
('911407','9114','Wina'),
('911408','9114','Umagi'),
('911409','9114','Panaga'),
('911410','9114','Woniki'),
('911411','9114','Kubu'),
('911412','9114','Konda/ Kondaga'),
('911413','9114','Nelawi'),
('911414','9114','Kuari'),
('911415','9114','Bokoneri'),
('911416','9114','Bewani'),
('911418','9114','Nabunage'),
('911419','9114','Gilubandu'),
('911420','9114','Nunggawi'),
('911421','9114','Gundagi'),
('911422','9114','Numba'),
('911423','9114','Timori'),
('911424','9114','Dundu'),
('911425','9114','Geya'),
('911426','9114','Egiam'),
('911427','9114','Poganeri'),
('911428','9114','Kamboneri'),
('911429','9114','Airgaram'),
('911430','9114','Wari/Taiyeve II'),
('911431','9114','Dow'),
('911432','9114','Tagineri'),
('911433','9114','Yuneri'),
('911434','9114','Wakuwo'),
('911435','9114','Gika'),
('911436','9114','Telenggeme'),
('911437','9114','Anawi'),
('911438','9114','Wenam'),
('911439','9114','Wugi'),
('911440','9114','Danime'),
('911441','9114','Tagime'),
('911442','9114','Kai'),
('911443','9114','Aweku'),
('911444','9114','Bogonuk'),
('911445','9114','Li Anogomma'),
('911446','9114','Biuk'),
('911447','9114','Yuko'),
('911501','9115','Waropen Bawah'),
('911503','9115','Masirei'),
('911507','9115','Risei Sayati'),
('911508','9115','Urei Faisei'),
('911509','9115','Inggerus'),
('911510','9115','Kirihi'),
('911511','9115','Oudate'),
('911512','9115','Wapoga'),
('911513','9115','Demba'),
('911514','9115','Wonti'),
('911515','9115','Soyoi Mambai'),
('911601','9116','Mandobo'),
('911602','9116','Mindiptana'),
('911603','9116','Waropko'),
('911604','9116','Kouh'),
('911605','9116','Jair'),
('911606','9116','Bomakia'),
('911607','9116','Kombut'),
('911608','9116','Iniyandit'),
('911609','9116','Arimop'),
('911610','9116','Fofi'),
('911611','9116','Ambatkwi'),
('911612','9116','Manggelum'),
('911613','9116','Firiwage'),
('911614','9116','Yaniruma'),
('911615','9116','Subur'),
('911616','9116','Kombay'),
('911617','9116','Ninati'),
('911618','9116','Sesnuk'),
('911619','9116','Ki'),
('911620','9116','Kawagit'),
('911701','9117','Obaa'),
('911702','9117','Mambioman Bapai'),
('911703','9117','Citak-Mitak'),
('911704','9117','Edera'),
('911705','9117','Haju'),
('911706','9117','Assue'),
('911707','9117','Kaibar'),
('911708','9117','Passue'),
('911709','9117','Minyamur'),
('911710','9117','Venaha'),
('911711','9117','Syahcame'),
('911712','9117','Yakomi'),
('911713','9117','Bamgi'),
('911714','9117','Passue Bawah'),
('911715','9117','Ti Zain'),
('911801','9118','Agats'),
('911802','9118','Atsj'),
('911803','9118','Sawa Erma'),
('911804','9118','Akat'),
('911805','9118','Fayit'),
('911806','9118','Pantai Kasuari'),
('911807','9118','Suator'),
('911808','9118','Suru-suru'),
('911809','9118','Kolf Braza'),
('911810','9118','Unir Sirau'),
('911811','9118','Joerat'),
('911812','9118','Pulau Tiga'),
('911813','9118','Jetsy'),
('911814','9118','Der Koumur'),
('911815','9118','Kopay'),
('911816','9118','Safan'),
('911817','9118','Sirets'),
('911818','9118','Ayip'),
('911819','9118','Betcbamu'),
('911901','9119','Supiori Selatan'),
('911902','9119','Supiori Utara'),
('911903','9119','Supiori Timur'),
('911904','9119','Kepulauan Aruri'),
('911905','9119','Supiori Barat'),
('912001','9120','Mamberamo Tengah'),
('912002','9120','Mamberamo Hulu'),
('912003','9120','Rufaer'),
('912004','9120','Mamberamo Tengah Timur'),
('912005','9120','Mamberamo Hilir'),
('912006','9120','Waropen Atas'),
('912007','9120','Benuki'),
('912008','9120','Sawai'),
('912101','9121','Kobagma'),
('912102','9121','Kelila'),
('912103','9121','Eragayam'),
('912104','9121','Megambilis'),
('912105','9121','Ilugwa'),
('912201','9122','Elelim'),
('912202','9122','Apalapsili'),
('912203','9122','Abenaho'),
('912204','9122','Benawa'),
('912205','9122','Welarek'),
('912301','9123','Tiom'),
('912302','9123','Pirime'),
('912303','9123','Makki'),
('912304','9123','Gamelia'),
('912305','9123','Dimba'),
('912306','9123','Melagineri'),
('912307','9123','Balingga'),
('912308','9123','Tiomneri'),
('912309','9123','Kuyawage'),
('912310','9123','Poga'),
('912311','9123','Niname'),
('912312','9123','Nogi'),
('912313','9123','Yiginua'),
('912314','9123','Tiom Ollo'),
('912315','9123','Yugungwi'),
('912316','9123','Mokoni'),
('912317','9123','Wereka'),
('912318','9123','Milimbo'),
('912319','9123','Wiringgambut'),
('912320','9123','Gollo'),
('912321','9123','Awina'),
('912322','9123','Ayumnati'),
('912323','9123','Wano Barat'),
('912324','9123','Goa Balim'),
('912325','9123','Bruwa'),
('912326','9123','Balingga Barat'),
('912327','9123','Gupura'),
('912328','9123','Kolawa'),
('912329','9123','Gelok Beam'),
('912330','9123','Kuly Lanny'),
('912331','9123','Lannyna'),
('912332','9123','Karu'),
('912333','9123','Yiluk'),
('912334','9123','Guna'),
('912335','9123','Kelulome'),
('912336','9123','Nikogwe'),
('912337','9123','Muara'),
('912338','9123','Buguk Gona'),
('912339','9123','Melagi'),
('912401','9124','Kenyam'),
('912402','9124','Mapenduma'),
('912403','9124','Yigi'),
('912404','9124','Wosak'),
('912405','9124','Geselma'),
('912406','9124','Mugi'),
('912407','9124','Mbuwa'),
('912408','9124','Gearek'),
('912409','9124','Koroptak'),
('912410','9124','Kegayem'),
('912411','9124','Paro'),
('912412','9124','Mebarok'),
('912413','9124','Yenggelo'),
('912414','9124','Kilmid'),
('912415','9124','Alama'),
('912416','9124','Yal'),
('912417','9124','Mam'),
('912418','9124','Dal'),
('912419','9124','Nirkuri'),
('912420','9124','Inikgal'),
('912421','9124','Iniye'),
('912422','9124','Mbulmu Yalma'),
('912423','9124','Mbua Tengah'),
('912424','9124','Embetpen'),
('912425','9124','Kora'),
('912426','9124','Wusi'),
('912427','9124','Pija'),
('912428','9124','Moba'),
('912429','9124','Wutpaga'),
('912430','9124','Nenggeagin'),
('912431','9124','Krepkuri'),
('912432','9124','Pasir Putih'),
('912501','9125','Ilaga'),
('912502','9125','Wangbe'),
('912503','9125','Beoga'),
('912504','9125','Doufo'),
('912505','9125','Pogoma'),
('912506','9125','Sinak'),
('912507','9125','Agandugume'),
('912508','9125','Gome'),
('912601','9126','Kamu'),
('912602','9126','Mapia'),
('912603','9126','Piyaiye'),
('912604','9126','Kamu Utara'),
('912605','9126','Sukikai Selatan'),
('912606','9126','Mapia Barat'),
('912607','9126','Kamu Selatan'),
('912608','9126','Kamu Timur'),
('912609','9126','Mapia Tengah'),
('912610','9126','Dogiyai'),
('912701','9127','Sugapa'),
('912702','9127','Homeyo'),
('912703','9127','Wandai'),
('912704','9127','Biandoga'),
('912705','9127','Agisiga'),
('912706','9127','Hitadipa'),
('912707','9127','Ugimba'),
('912708','9127','Tomosiga'),
('912801','9128','Tigi'),
('912802','9128','Tigi Timur'),
('912803','9128','Bowobado'),
('912804','9128','Tigi Barat'),
('912805','9128','Kapiraya'),
('917101','9171','Jayapura Utara'),
('917102','9171','Jayapura Selatan'),
('917103','9171','Abepura'),
('917104','9171','Muara Tami'),
('917105','9171','Heram'),
('920101','9201','Makbon'),
('920104','9201','Beraur'),
('920105','9201','Salawati'),
('920106','9201','Seget'),
('920107','9201','Aimas'),
('920108','9201','Klamono'),
('920110','9201','Sayosa'),
('920112','9201','Segun'),
('920113','9201','Mayamuk'),
('920114','9201','Salawati Selatan'),
('920117','9201','Klabot'),
('920118','9201','Klawak'),
('920120','9201','Maudus'),
('920139','9201','Mariat'),
('920140','9201','Klaili'),
('920141','9201','Klaso'),
('920142','9201','Moisegen'),
('920203','9202','Warmare'),
('920204','9202','Prafi'),
('920205','9202','Masni'),
('920212','9202','Manokwari Barat'),
('920213','9202','Manokwari Timur'),
('920214','9202','Manokwari Utara'),
('920215','9202','Manokwari Selatan'),
('920217','9202','Tanah Rubuh'),
('920221','9202','Sidey'),
('920301','9203','Fak-Fak'),
('920302','9203','Fak-Fak Barat'),
('920303','9203','Fak-Fak Timur'),
('920304','9203','Kokas'),
('920305','9203','Fak-Fak Tengah'),
('920306','9203','Karas'),
('920307','9203','Bomberay'),
('920308','9203','Kramongmongga'),
('920309','9203','Teluk Patipi'),
('920310','9203','Pariwari'),
('920311','9203','Wartutin'),
('920312','9203','Fakfak Timur Tengah'),
('920313','9203','Arguni'),
('920314','9203','Mbahamdandara'),
('920315','9203','Kayauni'),
('920316','9203','Furwagi'),
('920317','9203','Tomage'),
('920401','9204','Teminabuan'),
('920404','9204','Inanwatan'),
('920406','9204','Sawiat'),
('920409','9204','Kokoda'),
('920410','9204','Moswaren'),
('920411','9204','Seremuk'),
('920412','9204','Wayer'),
('920414','9204','Kais'),
('920415','9204','Konda'),
('920420','9204','Matemani'),
('920421','9204','Kokoda Utara'),
('920422','9204','Saifi'),
('920424','9204','Fokour'),
('920501','9205','Misool (Misool Utara)'),
('920502','9205','Waigeo Utara'),
('920503','9205','Waigeo Selatan'),
('920504','9205','Salawati Utara'),
('920505','9205','Kepulauan Ayau'),
('920506','9205','Misool Timur'),
('920507','9205','Waigeo Barat'),
('920508','9205','Waigeo Timur'),
('920509','9205','Teluk Mayalibit'),
('920510','9205','Kofiau'),
('920511','9205','Meos Mansar'),
('920513','9205','Misool Selatan'),
('920514','9205','Warwarbomi'),
('920515','9205','Waigeo Barat Kepulauan'),
('920516','9205','Misool Barat'),
('920517','9205','Kepulauan Sembilan'),
('920518','9205','Kota Waisai'),
('920519','9205','Tiplol Mayalibit'),
('920520','9205','Batanta Utara'),
('920521','9205','Salawati Barat'),
('920522','9205','Salawati Tengah'),
('920523','9205','Supnin'),
('920524','9205','Ayau'),
('920525','9205','Batanta Selatan'),
('920601','9206','Bintuni'),
('920602','9206','Merdey'),
('920603','9206','Babo'),
('920604','9206','Aranday'),
('920605','9206','Moskona Selatan'),
('920606','9206','Moskona Utara'),
('920607','9206','Wamesa'),
('920608','9206','Fafurwar'),
('920609','9206','Tembuni'),
('920610','9206','Kuri'),
('920611','9206','Manimeri'),
('920612','9206','Tuhiba'),
('920613','9206','Dataran Beimes'),
('920614','9206','Sumuri'),
('920615','9206','Kaitaro'),
('920616','9206','Aroba'),
('920617','9206','Masyeta'),
('920618','9206','Biscoop'),
('920619','9206','Tomu'),
('920620','9206','Kamundan'),
('920621','9206','Weriagar'),
('920622','9206','Moskona Barat'),
('920623','9206','Meyado'),
('920624','9206','Moskona Timur'),
('920701','9207','Wasior'),
('920702','9207','Windesi'),
('920703','9207','Teluk Duairi'),
('920704','9207','Wondiboy'),
('920705','9207','Wamesa'),
('920706','9207','Rumberpon'),
('920707','9207','Naikere'),
('920708','9207','Rasiei'),
('920709','9207','Kuri Wamesa'),
('920710','9207','Roon'),
('920711','9207','Roswar'),
('920712','9207','Nikiwar'),
('920713','9207','Soug Jaya'),
('920801','9208','Kaimana'),
('920802','9208','Buruway'),
('920803','9208','Teluk Arguni Atas'),
('920804','9208','Teluk Etna'),
('920805','9208','Kambrau'),
('920806','9208','Teluk Arguni Bawah'),
('920807','9208','Yamor'),
('920901','9209','Fef'),
('920902','9209','Miyah'),
('920903','9209','Yembun'),
('920904','9209','Kwoor'),
('920905','9209','Sausapor'),
('920906','9209','Abun'),
('920907','9209','Syujak'),
('920908','9209','Moraid'),
('920909','9209','Kebar'),
('920910','9209','Amberbaken'),
('920911','9209','Senopi'),
('920912','9209','Mubrani'),
('920913','9209','Bikar'),
('920914','9209','Bamusbama'),
('920915','9209','Ases'),
('920916','9209','Miyah Selatan'),
('920917','9209','Ireres'),
('920918','9209','Tobouw'),
('920919','9209','Wilhem Roumbouts'),
('920920','9209','Tinggouw'),
('920921','9209','Kwesefo'),
('920922','9209','Mawabuan'),
('920923','9209','Kebar Timur'),
('920924','9209','Kebar Selatan'),
('920925','9209','Manekar'),
('920926','9209','Mpur'),
('920927','9209','Amberbaken Barat'),
('920928','9209','Kasi'),
('920929','9209','Selemkai'),
('921001','9210','Aifat'),
('921002','9210','Aifat Utara'),
('921003','9210','Aifat Timur'),
('921004','9210','Aifat Selatan'),
('921005','9210','Aitinyo Barat'),
('921006','9210','Aitinyo'),
('921007','9210','Aitinyo Utara'),
('921008','9210','Ayamaru'),
('921009','9210','Ayamaru Utara'),
('921010','9210','Ayamaru Timur'),
('921011','9210','Mare'),
('921012','9210','Aifat Timur Tengah'),
('921013','9210','Aifat Timur Jauh'),
('921014','9210','Aifat Timur Selatan'),
('921015','9210','Ayamaru Selatan'),
('921016','9210','Ayamaru Jaya'),
('921017','9210','Ayamaru Selatan Jaya'),
('921018','9210','Ayamaru Timur Selatan'),
('921019','9210','Ayamaru Utara Timur'),
('921020','9210','Ayamaru Tengah'),
('921021','9210','Ayamaru Barat'),
('921022','9210','Aitinyo Tengah'),
('921023','9210','Aitinyo Raya'),
('921024','9210','Mare Selatan'),
('921101','9211','Ransiki'),
('921102','9211','Oransbari'),
('921103','9211','Neney'),
('921104','9211','Dataran Isim'),
('921105','9211','Momi Waren'),
('921106','9211','Tahota'),
('921201','9212','Anggi'),
('921202','9212','Anggi Gida'),
('921203','9212','Membey'),
('921204','9212','Sururey'),
('921205','9212','Didohu'),
('921206','9212','Taige'),
('921207','9212','Catubouw'),
('921208','9212','Testega'),
('921209','9212','Minyambaouw'),
('921210','9212','Hingk'),
('927101','9271','Sorong'),
('927102','9271','Sorong Timur'),
('927103','9271','Sorong Barat'),
('927104','9271','Sorong Kepulauan'),
('927105','9271','Sorong Utara'),
('927106','9271','Sorong Manoi'),
('927107','9271','Sorong Kota'),
('927108','9271','Klaurung'),
('927109','9271','Malaimsimsa'),
('927110','9271','Maladum Mes');

/*Table structure for table `wil_provinsi` */

DROP TABLE IF EXISTS `wil_provinsi`;

CREATE TABLE `wil_provinsi` (
  `id_prov` char(2) NOT NULL,
  `nama` tinytext NOT NULL,
  `jml` int(11) DEFAULT NULL COMMENT 'jml_pemohon',
  PRIMARY KEY (`id_prov`),
  KEY `id_prov` (`id_prov`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `wil_provinsi` */

insert  into `wil_provinsi`(`id_prov`,`nama`,`jml`) values 
('11','Aceh',NULL),
('12','Sumatera Utara',NULL),
('13','Sumatera Barat',NULL),
('14','Riau',NULL),
('15','Jambi',NULL),
('16','Sumatera Selatan',NULL),
('17','Bengkulu',NULL),
('18','Lampung',NULL),
('19','Kepulauan Bangka Belitung',NULL),
('21','Kepulauan Riau',NULL),
('31','DKI Jakarta',NULL),
('32','Jawa Barat',NULL),
('33','Jawa Tengah',NULL),
('34','DI Yogyakarta',NULL),
('35','Jawa Timur',NULL),
('36','Banten',NULL),
('51','Bali',NULL),
('52','Nusa Tenggara Barat',NULL),
('53','Nusa Tenggara Timur',NULL),
('61','Kalimantan Barat',NULL),
('62','Kalimantan Tengah',NULL),
('63','Kalimantan Selatan',NULL),
('64','Kalimantan Timur',NULL),
('65','Kalimantan Utara',NULL),
('71','Sulawesi Utara',NULL),
('72','Sulawesi Tengah',NULL),
('73','Sulawesi Selatan',NULL),
('74','Sulawesi Tenggara',NULL),
('75','Gorontalo',NULL),
('76','Sulawesi Barat',NULL),
('81','Maluku',NULL),
('82','Maluku Utara',NULL),
('92','Papua',NULL),
('91','Papua Barat',NULL);

/*Table structure for table `zoom_akun` */

DROP TABLE IF EXISTS `zoom_akun`;

CREATE TABLE `zoom_akun` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `key` text,
  `secreet` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `zoom_akun` */

insert  into `zoom_akun`(`id`,`nama`,`key`,`secreet`) values 
(1,'APUNIR','RSD3UIdtQPyfCuxzd7AMgQ','y51PpAKJMaa0E41q0TQuPL9OEt60FKPkkDAp'),
(2,'BPMI Setpres','-alfwiCDS9yAwOokdjU3GQ','DIVRZnsfEGgjkLtsnLvx7Afl9R9jDSiSgeUF');

/*Table structure for table `zoom_data` */

DROP TABLE IF EXISTS `zoom_data`;

CREATE TABLE `zoom_data` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `jk` enum('l','p') DEFAULT NULL,
  `jabatan` varchar(150) DEFAULT NULL,
  `instansi` varchar(150) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `hp` varchar(15) DEFAULT NULL,
  `id_negara` int(11) DEFAULT NULL,
  `id_prov` int(11) DEFAULT NULL,
  `id_kab` int(11) DEFAULT NULL,
  `id_type` int(11) DEFAULT '2' COMMENT '1=given 2=online',
  `id_event` int(11) DEFAULT NULL,
  `cekin` datetime DEFAULT NULL,
  `registrant_id` varchar(100) DEFAULT NULL,
  `kota` varchar(40) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `id_pekerjaan` int(11) DEFAULT NULL,
  `pekerjaan_lainnya` varchar(100) DEFAULT NULL,
  `job_media` varchar(150) DEFAULT NULL COMMENT 'pekerjaan wartawan',
  `poto` varchar(250) DEFAULT NULL,
  `alasan_mengikuti` varchar(250) DEFAULT NULL,
  `durasi` int(11) DEFAULT '0',
  `_cid` int(11) DEFAULT NULL,
  `_ctime` datetime DEFAULT CURRENT_TIMESTAMP,
  `link_join` text,
  `esign` tinyint(4) DEFAULT '0',
  `join_url` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

/*Data for the table `zoom_data` */

insert  into `zoom_data`(`id`,`nama`,`jk`,`jabatan`,`instansi`,`email`,`hp`,`id_negara`,`id_prov`,`id_kab`,`id_type`,`id_event`,`cekin`,`registrant_id`,`kota`,`alamat`,`id_pekerjaan`,`pekerjaan_lainnya`,`job_media`,`poto`,`alasan_mengikuti`,`durasi`,`_cid`,`_ctime`,`link_join`,`esign`,`join_url`) values 
(2,'Cepi cahyana',NULL,'programmer','Kepala desa','cahyanacepi@gmail.com','085221288210',94,NULL,NULL,2,33,NULL,'5qXziSUhTcWek9Kyiwj34A','bogor','',NULL,NULL,NULL,NULL,NULL,0,20,'2020-08-19 18:40:23',NULL,1,'https://us02web.zoom.us/w/87505065183?tk=2IeyRcSNT8tfiG2otkiHwt-1heFRyXlYXYKRJRcsvjU.DQIAAAAUX7VU3xY1cVh6aVNVaFRjV2VrOUt5aXdqMzRBAAAAAAAAAAAAAAAAAAAAAAAAAAAA&pwd=TjV3cnl4aEJPcUY4S3pFWXBlc0MwQT09'),
(4,'Rahmat Gobel',NULL,NULL,NULL,'d3@ymail.com','081',94,NULL,NULL,2,33,NULL,'L0YQOg7USZO-3VzyW5qQew',NULL,'Jl. Kebon Sirih No. 14, Jakarta Pusat',5,'dfdfdf',NULL,NULL,NULL,0,20,'2020-10-31 19:06:59',NULL,0,'https://us02web.zoom.us/w/87505065183?tk=XwPmuYodA-hM8ShQhYp1CZulqbZ3SRX37tThLywK8Zw.DQIAAAAUX7VU3xZMMFlRT2c3VVNaTy0zVnp5VzVxUWV3AAAAAAAAAAAAAAAAAAAAAAAAAAAA&pwd=TjV3cnl4aEJPcUY4S3pFWXBlc0MwQT09'),
(8,'cepi cahyana',NULL,NULL,'','uar@gmail.com','06285238844',94,NULL,NULL,2,33,NULL,'GI3GDV1hSMumvxdEHlDl9g','','subamh',5,'kepala biro',NULL,NULL,NULL,0,20,'2020-10-31 19:26:06',NULL,0,'https://us02web.zoom.us/w/87505065183?tk=zZ5WenTtPLc7qiUu2RiMc7DMQ19gZo6ebBspuCQ08T8.DQIAAAAUX7VU3xZHSTNHRFYxaFNNdW12eGRFSGxEbDlnAAAAAAAAAAAAAAAAAAAAAAAAAAAA&pwd=TjV3cnl4aEJPcUY4S3pFWXBlc0MwQT09'),
(11,'dfdsf',NULL,NULL,'','a@gmail.com','01',94,NULL,NULL,2,33,NULL,'Ne0uVJFpQHKx85bNiBF34A','bdg','',5,'',NULL,NULL,NULL,0,20,'2020-11-27 17:42:30',NULL,0,'https://us02web.zoom.us/w/87505065183?tk=doMtfSLi6KWM2K4Av6Cb8Vwdxd9xFLS2_pDUhfWaQMU.DQIAAAAUX7VU3xZOZTB1VkpGcFFIS3g4NWJOaUJGMzRBAAAAAAAAAAAAAAAAAAAAAAAAAAAA&pwd=TjV3cnl4aEJPcUY4S3pFWXBlc0MwQT09'),
(12,'dfsd',NULL,NULL,'','b@gmail.com','02',94,NULL,NULL,2,33,NULL,'dqR8WPayRF6xP1hqXfSDIA','bdg','',5,'',NULL,NULL,NULL,0,20,'2020-11-27 17:42:30',NULL,0,'https://us02web.zoom.us/w/87505065183?tk=PzEIG8MI2Gc9DinuonMbeAuI-pJuBgYP8074cCs0a70.DQIAAAAUX7VU3xZkcVI4V1BheVJGNnhQMWhxWGZTRElBAAAAAAAAAAAAAAAAAAAAAAAAAAAA&pwd=TjV3cnl4aEJPcUY4S3pFWXBlc0MwQT09'),
(13,'dfdf',NULL,NULL,'','c@gmail.com','03',94,NULL,NULL,2,33,NULL,'qujEHy6ERjK4ktjbRPz7Mg','bdg','',5,'',NULL,NULL,NULL,0,20,'2020-11-27 17:42:30',NULL,0,'https://us02web.zoom.us/w/87505065183?tk=x7TZCQ4zKROC-awlzswPg2EiEVimNufFMWIkL2CGqeg.DQIAAAAUX7VU3xZxdWpFSHk2RVJqSzRrdGpiUlB6N01nAAAAAAAAAAAAAAAAAAAAAAAAAAAA&pwd=TjV3cnl4aEJPcUY4S3pFWXBlc0MwQT09'),
(14,'sdf',NULL,NULL,'','d@gmail.com','04',94,NULL,NULL,2,33,NULL,'JB7rWYf1RkCqBORyTfKU5Q','bdg','',5,'',NULL,NULL,NULL,0,20,'2020-11-27 17:42:30',NULL,0,'https://us02web.zoom.us/w/87505065183?tk=IMQCE9VCUOUL33LOxldj0xVALHsISBGoc5fIsK3aJ3U.DQIAAAAUX7VU3xZKQjdyV1lmMVJrQ3FCT1J5VGZLVTVRAAAAAAAAAAAAAAAAAAAAAAAAAAAA&pwd=TjV3cnl4aEJPcUY4S3pFWXBlc0MwQT09'),
(15,'sdf',NULL,NULL,'','e@gmail.com','05',94,NULL,NULL,2,33,NULL,'cmhBnMWVS7CMOlw6brWSEQ','bdg','',5,'',NULL,NULL,NULL,0,20,'2020-11-27 17:42:30',NULL,0,'https://us02web.zoom.us/w/87505065183?tk=MRyv5ruNW7_Usk8CSkaol-nQowQDJIY0gnAKAkga4nY.DQIAAAAUX7VU3xZjbWhCbk1XVlM3Q01PbHc2YnJXU0VRAAAAAAAAAAAAAAAAAAAAAAAAAAAA&pwd=TjV3cnl4aEJPcUY4S3pFWXBlc0MwQT09'),
(16,'hjhj',NULL,NULL,'','f@gmail.com','06',94,NULL,NULL,2,33,NULL,'v7jQCwrOQOu5GGl3765HdA','bdg','',5,'',NULL,NULL,NULL,0,20,'2020-11-27 17:42:30',NULL,0,'https://us02web.zoom.us/w/87505065183?tk=64waMXSFX8jYXS33hfWQJTVuni3FxHBR10XXSPQ7kRw.DQIAAAAUX7VU3xZ2N2pRQ3dyT1FPdTVHR2wzNzY1SGRBAAAAAAAAAAAAAAAAAAAAAAAAAAAA&pwd=TjV3cnl4aEJPcUY4S3pFWXBlc0MwQT09'),
(17,'ghj4tg',NULL,NULL,'','g@gmail.com','07',94,NULL,NULL,2,33,NULL,'Zyy8YyFTSCOfiZK9RW2-6Q','bdg','',5,'',NULL,NULL,NULL,0,20,'2020-11-27 17:42:30',NULL,0,'https://us02web.zoom.us/w/87505065183?tk=lS4HWd-_x5hjt91Bxy8onzAIm4zEqUHXr-TerYYsxLk.DQIAAAAUX7VU3xZaeXk4WXlGVFNDT2ZpWks5UlcyLTZRAAAAAAAAAAAAAAAAAAAAAAAAAAAA&pwd=TjV3cnl4aEJPcUY4S3pFWXBlc0MwQT09'),
(18,'ghj',NULL,NULL,'','h@gmail.com','08',94,NULL,NULL,2,33,NULL,'DmzzOQvpSy-hm2yk3rHnfQ','bdg','',5,'',NULL,NULL,NULL,0,20,'2020-11-27 17:42:30',NULL,0,'https://us02web.zoom.us/w/87505065183?tk=uUB6m8bu9-Xp5IQ24ZlpZjtVN4DVvnjq-LimcgzM4UE.DQIAAAAUX7VU3xZEbXp6T1F2cFN5LWhtMnlrM3JIbmZRAAAAAAAAAAAAAAAAAAAAAAAAAAAA&pwd=TjV3cnl4aEJPcUY4S3pFWXBlc0MwQT09'),
(19,'dfdhgj',NULL,NULL,'','i@gmail.com','09',94,NULL,NULL,2,33,NULL,'ATjvFK_0RBiMrW1SBtsTjQ','bdg','',5,'',NULL,NULL,NULL,0,20,'2020-11-27 17:42:30',NULL,0,''),
(20,'gdh',NULL,NULL,'','j@gmail.com','010',94,NULL,NULL,2,33,NULL,'VgzrupzRT5uNYP4Ru3t8pw','bdg','',5,'',NULL,NULL,NULL,0,20,'2020-11-27 17:42:30',NULL,0,''),
(21,'df',NULL,NULL,'','k@gmail.com','011',94,NULL,NULL,2,33,NULL,'gvzAzuqAQ_SxrFPbCVxSVA','bdg','',5,'',NULL,NULL,NULL,0,20,'2020-11-27 17:42:30',NULL,0,''),
(22,'dfg',NULL,NULL,'','l@gmail.com','012',94,NULL,NULL,2,33,NULL,'nSfMA69dQEiOGlm2c5i-qA','bdg','',5,'',NULL,NULL,NULL,0,20,'2020-11-27 17:42:30',NULL,0,''),
(23,'fgd',NULL,NULL,'','m@gmail.com','013',94,NULL,NULL,2,33,NULL,'-N2D4ivxSB-Rqi0BBN4XwA','bdg','',5,'',NULL,NULL,NULL,0,20,'2020-11-27 17:42:30',NULL,0,''),
(24,'dfg',NULL,NULL,'','mn@gmail.com','014',94,NULL,NULL,2,33,NULL,'bt4lnu5jR9ST9IuYKOT-yg','bdg','',5,'',NULL,NULL,NULL,0,20,'2020-11-27 17:42:30',NULL,0,''),
(25,'gdfgdf',NULL,NULL,'','n@gmail.com','015',94,NULL,NULL,2,33,NULL,'LQtx3opCRFKD95f2-o9imA','bdg','',5,'',NULL,NULL,NULL,0,20,'2020-11-27 17:42:30',NULL,0,''),
(26,'dfg',NULL,NULL,'','o@gmail.com','016',94,NULL,NULL,2,33,NULL,'Ee0fRO4cQVaKrt04AJUzEw','bdg','',5,'',NULL,NULL,NULL,0,20,'2020-11-27 17:42:30',NULL,0,''),
(27,'dfgdfg',NULL,NULL,'','p@gmail.com','017',94,NULL,NULL,2,33,NULL,'hopoMSNpREyDxpOp-k7gVg','bdg','',5,'',NULL,NULL,NULL,0,20,'2020-11-27 17:42:30',NULL,0,''),
(28,'dfgdfg',NULL,NULL,'','q@gmail.com','018',94,NULL,NULL,2,25,NULL,'RvWVKDgIQxiVqDQ-1rruNg','bdg','',5,'',NULL,NULL,NULL,0,20,'2020-11-27 17:42:30',NULL,0,''),
(29,'fgd',NULL,NULL,'','s@gmail.com','020',94,NULL,NULL,2,25,NULL,'c-TFUrWsS3ia0c_YvQJ3ew','bdg','',5,'',NULL,NULL,NULL,0,20,'2020-11-27 17:42:30',NULL,0,'https://us02web.zoom.us/w/82414235078?tk=-CowCSoXmkYsmZCHeu1f4yijXTT1ZcuFiqrJITM7cSc.DQIAAAATMEVtxhZjLVRGVXJXc1MzaWEwY19ZdlFKM2V3AAAAAAAAAAAAAAAAAAAAAAAAAAAA&pwd=S0cxVHdsTkRYR2dHNHYwdXR2Tmowdz09'),
(30,'fgd',NULL,NULL,'','t@mail.com','021',94,NULL,NULL,2,25,NULL,'C-hfnNvEQm22xgpVZzoM8w','bdg','',5,'',NULL,NULL,NULL,0,20,'2020-11-27 17:42:30',NULL,0,'https://us02web.zoom.us/w/82414235078?tk=aSnXqjlyuRR0hblFmMm5PnlyVzt7LMRE_mIYxKT0r_M.DQIAAAATMEVtxhZDLWhmbk52RVFtMjJ4Z3BWWnpvTTh3AAAAAAAAAAAAAAAAAAAAAAAAAAAA&pwd=S0cxVHdsTkRYR2dHNHYwdXR2Tmowdz09'),
(31,'fgd',NULL,NULL,'','ps@gmail.com','023',94,NULL,NULL,2,25,NULL,'gX_sDLpeTZ6uhzwwUDJ_cw','bdg','',5,'',NULL,NULL,NULL,0,20,'2020-11-27 17:42:30',NULL,0,'https://us02web.zoom.us/w/82414235078?tk=MQq7Kwey_cdKIlpNoEdmTbdjIxSEenzyVtXggXXPJE8.DQIAAAATMEVtxhZnWF9zRExwZVRaNnVoend3VURKX2N3AAAAAAAAAAAAAAAAAAAAAAAAAAAA&pwd=S0cxVHdsTkRYR2dHNHYwdXR2Tmowdz09'),
(32,'fgd',NULL,NULL,'','hh@gmail.com','024',94,NULL,NULL,2,25,NULL,'60xxze_MRB-D5ouEk9eP_A','bdg','',5,'',NULL,NULL,NULL,0,20,'2020-11-27 17:42:30',NULL,0,'https://us02web.zoom.us/w/82414235078?tk=P40p-yo7dJwup2KNaXakPMQZMM0-cw3D6TXqZCh4ryo.DQIAAAATMEVtxhY2MHh4emVfTVJCLUQ1b3VFazllUF9BAAAAAAAAAAAAAAAAAAAAAAAAAAAA&pwd=S0cxVHdsTkRYR2dHNHYwdXR2Tmowdz09'),
(33,'fgd',NULL,NULL,'','aa@gmail.com','025',94,NULL,NULL,2,25,NULL,'9Ll_Qvx1TWKiaO9rBCpJjQ','bdg','',5,'',NULL,NULL,NULL,0,20,'2020-11-27 17:42:30',NULL,0,'https://us02web.zoom.us/w/82414235078?tk=RvlTSklxYIW7ms89kai4aSfSw_yGuqA6F3Pe2XfvTY4.DQIAAAATMEVtxhY5TGxfUXZ4MVRXS2lhTzlyQkNwSmpRAAAAAAAAAAAAAAAAAAAAAAAAAAAA&pwd=S0cxVHdsTkRYR2dHNHYwdXR2Tmowdz09'),
(34,'dfgdfg',NULL,NULL,'','gg@gmail.com','026',94,NULL,NULL,2,25,NULL,'Yleq8WkYRO2BXGULmaFFIw','bdg','',5,'',NULL,NULL,NULL,0,20,'2020-11-27 17:42:30',NULL,0,'https://us02web.zoom.us/w/82414235078?tk=7NwRqn-gvPb57r8AMsey6WwjNGiHm4Cx9kGlHYni1Kc.DQIAAAATMEVtxhZZbGVxOFdrWVJPMkJYR1VMbWFGRkl3AAAAAAAAAAAAAAAAAAAAAAAAAAAA&pwd=S0cxVHdsTkRYR2dHNHYwdXR2Tmowdz09'),
(35,'dfg',NULL,NULL,'','uu@gmail.com','027',94,NULL,NULL,2,25,NULL,'fIKGA-KVT0qXqEMCNjMxkg','bdg','',5,'',NULL,NULL,NULL,0,20,'2020-11-27 17:42:31',NULL,0,'https://us02web.zoom.us/w/82414235078?tk=MGItrXGnihtD9kr_2e0RJjptnRpWDMvWfjNt6FgBIEM.DQIAAAATMEVtxhZmSUtHQS1LVlQwcVhxRU1DTmpNeGtnAAAAAAAAAAAAAAAAAAAAAAAAAAAA&pwd=S0cxVHdsTkRYR2dHNHYwdXR2Tmowdz09'),
(36,'df',NULL,NULL,'','io@gmail.com','028',94,NULL,NULL,2,25,NULL,'qjrjeT4-SOe6vV-BHmwYJQ','bdg','',5,'',NULL,NULL,NULL,0,20,'2020-11-27 17:42:31',NULL,0,'https://us02web.zoom.us/w/82414235078?tk=pgGgZkDQLxuTgJ0b72Mkq0xlUj9a2CwZ5TZa6gc74hs.DQIAAAATMEVtxhZxanJqZVQ0LVNPZTZ2Vi1CSG13WUpRAAAAAAAAAAAAAAAAAAAAAAAAAAAA&pwd=S0cxVHdsTkRYR2dHNHYwdXR2Tmowdz09'),
(37,'dfg',NULL,NULL,'','oo@gmail.com','029',94,NULL,NULL,2,25,NULL,'nZhmh3-XQV2A0xMMGWy4gw','bdg','',5,'',NULL,NULL,NULL,0,20,'2020-11-27 17:42:31',NULL,0,'https://us02web.zoom.us/w/82414235078?tk=DnD9SyF-ojbjRGlzPQUXOYVtoe0ajJCaA5pZXb_0U_c.DQIAAAATMEVtxhZuWmhtaDMtWFFWMkEweE1NR1d5NGd3AAAAAAAAAAAAAAAAAAAAAAAAAAAA&pwd=S0cxVHdsTkRYR2dHNHYwdXR2Tmowdz09'),
(38,'df',NULL,NULL,'','ii@gmail.com','030',94,NULL,NULL,2,25,NULL,'TdBE0ktAQ3SGXtJFLntBJA','bdg','',5,'',NULL,NULL,NULL,0,20,'2020-11-27 17:42:31',NULL,0,'https://us02web.zoom.us/w/82414235078?tk=DHzlPWy4NjnqEjLsUxuBAdy1YhQKr-B0HbyITraTtqc.DQIAAAATMEVtxhZUZEJFMGt0QVEzU0dYdEpGTG50QkpBAAAAAAAAAAAAAAAAAAAAAAAAAAAA&pwd=S0cxVHdsTkRYR2dHNHYwdXR2Tmowdz09'),
(39,'uarmo',NULL,NULL,NULL,'uarmore@gmail.com','88888',94,NULL,NULL,2,25,NULL,'yKULr6WwQICFpZ7JEZoTDg',NULL,'jnj',5,'uyu',NULL,NULL,NULL,0,20,'2020-11-27 17:52:15',NULL,0,''),
(40,'sssss',NULL,'TURKI','CV. DIVISION IT','23s@gmail.com','08522128 ',NULL,NULL,NULL,1,NULL,NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,0,NULL,'2020-11-28 11:58:30',NULL,0,NULL);

/*Table structure for table `zoom_event` */

DROP TABLE IF EXISTS `zoom_event`;

CREATE TABLE `zoom_event` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_akun` int(11) DEFAULT NULL,
  `kode` varchar(50) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `sts_aktivasi` tinyint(4) DEFAULT '1' COMMENT '1=aktif',
  `leng` int(11) DEFAULT NULL,
  `page` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

/*Data for the table `zoom_event` */

insert  into `zoom_event`(`id`,`id_akun`,`kode`,`title`,`sts_aktivasi`,`leng`,`page`) values 
(25,1,'82414235078','COBA APLIKASI PANDANG',1,30,1),
(33,1,'87505065183','MY MEETING',1,30,1);

/*Table structure for table `v_blok` */

DROP TABLE IF EXISTS `v_blok`;

/*!50001 DROP VIEW IF EXISTS `v_blok` */;
/*!50001 DROP TABLE IF EXISTS `v_blok` */;

/*!50001 CREATE TABLE  `v_blok`(
 `id` int(11) unsigned ,
 `nama` varchar(50) ,
 `jenis` tinyint(4) ,
 `color` varchar(20) ,
 `target` int(11) ,
 `peruntukan` int(11) ,
 `link_gelang` varchar(50) ,
 `jml` bigint(21) 
)*/;

/*Table structure for table `v_country` */

DROP TABLE IF EXISTS `v_country`;

/*!50001 DROP VIEW IF EXISTS `v_country` */;
/*!50001 DROP TABLE IF EXISTS `v_country` */;

/*!50001 CREATE TABLE  `v_country`(
 `id` int(11) ,
 `country_name` varchar(255) ,
 `country_code` varchar(255) ,
 `jml` bigint(21) 
)*/;

/*Table structure for table `v_distribusi` */

DROP TABLE IF EXISTS `v_distribusi`;

/*!50001 DROP VIEW IF EXISTS `v_distribusi` */;
/*!50001 DROP TABLE IF EXISTS `v_distribusi` */;

/*!50001 CREATE TABLE  `v_distribusi`(
 `blok` varchar(11) ,
 `jml` varbinary(20) ,
 `jadwal_distribusi` varchar(17) ,
 `jenis` varchar(20) 
)*/;

/*Table structure for table `v_kab` */

DROP TABLE IF EXISTS `v_kab`;

/*!50001 DROP VIEW IF EXISTS `v_kab` */;
/*!50001 DROP TABLE IF EXISTS `v_kab` */;

/*!50001 CREATE TABLE  `v_kab`(
 `id_kab` char(4) ,
 `id_prov` char(2) ,
 `nama` tinytext ,
 `id_jenis` int(11) ,
 `jml` bigint(21) 
)*/;

/*Table structure for table `v_peserta` */

DROP TABLE IF EXISTS `v_peserta`;

/*!50001 DROP VIEW IF EXISTS `v_peserta` */;
/*!50001 DROP TABLE IF EXISTS `v_peserta` */;

/*!50001 CREATE TABLE  `v_peserta`(
 `id` int(10) unsigned ,
 `nik` varchar(50) ,
 `kk` varchar(100) ,
 `tgl` datetime ,
 `instansi` varchar(200) ,
 `nama` varchar(200) ,
 `jk` varchar(1) ,
 `hp` varchar(20) ,
 `email` varchar(100) ,
 `alamat` varchar(350) ,
 `alasan_mengikuti` varchar(100) ,
 `foto` text ,
 `foto_ktp` varchar(100) ,
 `foto_kk` varchar(100) ,
 `sts_kehadiran1` tinyint(4) ,
 `sts_kehadiran2` tinyint(4) ,
 `barcode1` varchar(50) ,
 `barcode2` varchar(50) ,
 `barcode3` varchar(50) ,
 `jenis_acara` int(11) ,
 `permohonan_awal` int(11) ,
 `blok1` int(11) ,
 `blok2` int(11) ,
 `cekin1` varchar(20) ,
 `cekin2` varchar(20) ,
 `cekin3` varchar(20) ,
 `ket` text ,
 `makan1` date ,
 `makan2` date ,
 `sv1` date ,
 `sv2` date ,
 `pb1` date ,
 `pb2` date ,
 `no_surat` varchar(500) ,
 `gate` varchar(50) ,
 `rekap` tinyint(4) ,
 `id_kategory` tinyint(4) ,
 `_cid` int(11) ,
 `_ctime` datetime ,
 `sts_acc` tinyint(4) ,
 `sts_notif` tinyint(4) ,
 `jadwal_distribusi` date ,
 `kode_persus` varchar(100) ,
 `id_kota` int(11) ,
 `id_provinsi` int(11) ,
 `diterima_oleh` varchar(100) ,
 `diterima_tgl` datetime ,
 `diterima_poto` varchar(100) ,
 `usia` int(11) ,
 `sts_verifikasi` tinyint(4) ,
 `id_alasan` int(11) ,
 `verifikator` int(11) ,
 `tgl_verifikasi` datetime ,
 `hps` tinyint(4) ,
 `r_suci` tinyint(4) ,
 `sts_suci` tinyint(4) ,
 `jml_undangan` int(1) 
)*/;

/*Table structure for table `v_prov` */

DROP TABLE IF EXISTS `v_prov`;

/*!50001 DROP VIEW IF EXISTS `v_prov` */;
/*!50001 DROP TABLE IF EXISTS `v_prov` */;

/*!50001 CREATE TABLE  `v_prov`(
 `id_prov` char(2) ,
 `nama` tinytext ,
 `jml` bigint(21) 
)*/;

/*View structure for view v_blok */

/*!50001 DROP TABLE IF EXISTS `v_blok` */;
/*!50001 DROP VIEW IF EXISTS `v_blok` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_blok` AS select `tr_blok`.`id` AS `id`,`tr_blok`.`nama` AS `nama`,`tr_blok`.`jenis` AS `jenis`,`tr_blok`.`color` AS `color`,`tr_blok`.`target` AS `target`,`tr_blok`.`peruntukan` AS `peruntukan`,`tr_blok`.`link_gelang` AS `link_gelang`,(select count(0) from `data_peserta` where ((`data_peserta`.`blok1` = `tr_blok`.`id`) and (`data_peserta`.`sts_acc` <> 3) and isnull(`data_peserta`.`hps`))) AS `jml` from `tr_blok` where (`tr_blok`.`jenis` = 1) union all select `tr_blok`.`id` AS `id`,`tr_blok`.`nama` AS `nama`,`tr_blok`.`jenis` AS `jenis`,`tr_blok`.`color` AS `color`,`tr_blok`.`target` AS `target`,`tr_blok`.`peruntukan` AS `peruntukan`,`tr_blok`.`link_gelang` AS `link_gelang`,(select count(0) from `data_peserta` where ((`data_peserta`.`blok2` = `tr_blok`.`id`) and (`data_peserta`.`sts_acc` <> 3) and isnull(`data_peserta`.`hps`))) AS `jml` from `tr_blok` where (`tr_blok`.`jenis` = 2) */;

/*View structure for view v_country */

/*!50001 DROP TABLE IF EXISTS `v_country` */;
/*!50001 DROP VIEW IF EXISTS `v_country` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_country` AS select `country`.`id` AS `id`,`country`.`country_name` AS `country_name`,`country`.`country_code` AS `country_code`,(select count(0) from `zoom_data` where (`zoom_data`.`id_negara` = `country`.`id`)) AS `jml` from `country` */;

/*View structure for view v_distribusi */

/*!50001 DROP TABLE IF EXISTS `v_distribusi` */;
/*!50001 DROP VIEW IF EXISTS `v_distribusi` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_distribusi` AS select 'blok' AS `blok`,'jml' AS `jml`,'jadwal_distribusi' AS `jadwal_distribusi`,'jenis' AS `jenis` union all select `data_peserta`.`blok1` AS `blok`,count(0) AS `jml`,`data_peserta`.`jadwal_distribusi` AS `jadwal_distribusi`,1 AS `1` from `data_peserta` where ((`data_peserta`.`jadwal_distribusi` is not null) and (`data_peserta`.`sts_acc` = 2) and `data_peserta`.`blok1` in (select `tr_blok`.`id` from `tr_blok` where (`tr_blok`.`jenis` = 1)) and isnull(`data_peserta`.`hps`)) group by `data_peserta`.`blok1`,`data_peserta`.`jadwal_distribusi` union all select `data_peserta`.`blok2` AS `blok`,count(0) AS `jml`,`data_peserta`.`jadwal_distribusi` AS `jadwal_distribusi`,2 AS `2` from `data_peserta` where ((`data_peserta`.`jadwal_distribusi` is not null) and (`data_peserta`.`sts_acc` = 2) and `data_peserta`.`blok2` in (select `tr_blok`.`id` from `tr_blok` where (`tr_blok`.`jenis` = 2)) and isnull(`data_peserta`.`hps`)) group by `data_peserta`.`blok2`,`data_peserta`.`jadwal_distribusi` */;

/*View structure for view v_kab */

/*!50001 DROP TABLE IF EXISTS `v_kab` */;
/*!50001 DROP VIEW IF EXISTS `v_kab` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_kab` AS select `wil_kabupaten`.`id_kab` AS `id_kab`,`wil_kabupaten`.`id_prov` AS `id_prov`,`wil_kabupaten`.`nama` AS `nama`,`wil_kabupaten`.`id_jenis` AS `id_jenis`,(select count(0) from `data_peserta` where ((`data_peserta`.`id_kota` = `wil_kabupaten`.`id_kab`) and (`data_peserta`.`id_kategory` = 1) and (`data_peserta`.`jenis_acara` in (1,2,3)) and (`data_peserta`.`sts_acc` <> 3) and isnull(`data_peserta`.`hps`))) AS `jml` from `wil_kabupaten` */;

/*View structure for view v_peserta */

/*!50001 DROP TABLE IF EXISTS `v_peserta` */;
/*!50001 DROP VIEW IF EXISTS `v_peserta` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_peserta` AS select `delimiter`.`id` AS `id`,`delimiter`.`nik` AS `nik`,`delimiter`.`kk` AS `kk`,`delimiter`.`tgl` AS `tgl`,`delimiter`.`instansi` AS `instansi`,`delimiter`.`nama` AS `nama`,`delimiter`.`jk` AS `jk`,`delimiter`.`hp` AS `hp`,`delimiter`.`email` AS `email`,`delimiter`.`alamat` AS `alamat`,`delimiter`.`alasan_mengikuti` AS `alasan_mengikuti`,`delimiter`.`foto` AS `foto`,`delimiter`.`foto_ktp` AS `foto_ktp`,`delimiter`.`foto_kk` AS `foto_kk`,`delimiter`.`sts_kehadiran1` AS `sts_kehadiran1`,`delimiter`.`sts_kehadiran2` AS `sts_kehadiran2`,`delimiter`.`barcode1` AS `barcode1`,`delimiter`.`barcode2` AS `barcode2`,`delimiter`.`barcode3` AS `barcode3`,`delimiter`.`jenis_acara` AS `jenis_acara`,`delimiter`.`permohonan_awal` AS `permohonan_awal`,`delimiter`.`blok1` AS `blok1`,`delimiter`.`blok2` AS `blok2`,`delimiter`.`cekin1` AS `cekin1`,`delimiter`.`cekin2` AS `cekin2`,`delimiter`.`cekin3` AS `cekin3`,`delimiter`.`ket` AS `ket`,`delimiter`.`makan1` AS `makan1`,`delimiter`.`makan2` AS `makan2`,`delimiter`.`sv1` AS `sv1`,`delimiter`.`sv2` AS `sv2`,`delimiter`.`pb1` AS `pb1`,`delimiter`.`pb2` AS `pb2`,`delimiter`.`no_surat` AS `no_surat`,`delimiter`.`gate` AS `gate`,`delimiter`.`rekap` AS `rekap`,`delimiter`.`id_kategory` AS `id_kategory`,`delimiter`.`_cid` AS `_cid`,`delimiter`.`_ctime` AS `_ctime`,`delimiter`.`sts_acc` AS `sts_acc`,`delimiter`.`sts_notif` AS `sts_notif`,`delimiter`.`jadwal_distribusi` AS `jadwal_distribusi`,`delimiter`.`kode_persus` AS `kode_persus`,`delimiter`.`id_kota` AS `id_kota`,`delimiter`.`id_provinsi` AS `id_provinsi`,`delimiter`.`diterima_oleh` AS `diterima_oleh`,`delimiter`.`diterima_tgl` AS `diterima_tgl`,`delimiter`.`diterima_poto` AS `diterima_poto`,`delimiter`.`usia` AS `usia`,`delimiter`.`sts_verifikasi` AS `sts_verifikasi`,`delimiter`.`id_alasan` AS `id_alasan`,`delimiter`.`verifikator` AS `verifikator`,`delimiter`.`tgl_verifikasi` AS `tgl_verifikasi`,`delimiter`.`hps` AS `hps`,`delimiter`.`r_suci` AS `r_suci`,`delimiter`.`sts_suci` AS `sts_suci`,if((`delimiter`.`jenis_acara` = 3),2,1) AS `jml_undangan` from `data_peserta` `delimiter` */;

/*View structure for view v_prov */

/*!50001 DROP TABLE IF EXISTS `v_prov` */;
/*!50001 DROP VIEW IF EXISTS `v_prov` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_prov` AS select `wil_provinsi`.`id_prov` AS `id_prov`,`wil_provinsi`.`nama` AS `nama`,(select count(0) AS `jml` from `data_peserta` where ((`data_peserta`.`id_provinsi` = `wil_provinsi`.`id_prov`) and (`data_peserta`.`id_kategory` = 1) and (`data_peserta`.`jenis_acara` in (1,2,3)) and (`data_peserta`.`sts_acc` <> 3) and isnull(`data_peserta`.`hps`))) AS `jml` from `wil_provinsi` */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
