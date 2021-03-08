/*
SQLyog Community v12.3.3 (64 bit)
MySQL - 10.1.16-MariaDB : Database - panduistana3
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
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`id_admin`,`username`,`password`,`poto`,`owner`,`level`,`telp`,`alamat`,`email`,`id_parent`,`tgl`,`ip`,`mode`,`last_login`,`nip`,`sts_aktivasi`) values 
(2,'super','d5f7c193793bebc46740f05aed1f4cb2','2.gif','cepi cahyana',18,'085221288211','Subang','cv@dffdfd.h',NULL,NULL,NULL,1,NULL,'abi.cto','enable'),
(28,'admin','21232f297a57a5a743894a0e4a801fc3','20200409055718___180557_620.jpg','admin',18,'-',NULL,'mail@gmail.com',NULL,'2016-07-01 13:38:40',NULL,0,NULL,'pandu.pandang','enable'),
(33,'distributor','dd7bcee161192cb8fba765eb595eba87','33.jpg','Dsitributor',13,'085221288',NULL,'cahyanacepi@gmail.com',NULL,'2020-04-07 16:23:49',NULL,1,NULL,'1993','enable'),
(35,'verifikasi','f2a2dc9c8f00c0aff80756a667123372','20200417161756_35__50.jpg','verifikasi',12,'0852228',NULL,'',NULL,NULL,NULL,1,'0000-00-00 00:00:00','1992','enable'),
(37,'distribusi','d41d8cd98f00b204e9800998ecf8427e','20200409075504_37__50.jpg','distribusi',13,'3434',NULL,NULL,NULL,NULL,NULL,1,NULL,'1994','disable'),
(38,'kasetpres','534bda04c4600f33bddca29b0b5b3ade','20200504184837_38__41___14092018112255.jpg','KASETPRES',16,'-',NULL,'cahyanacepi@gmail.com',NULL,'2020-05-04 00:13:29',NULL,1,NULL,'1995','enable'),
(39,'pimpinan3','4adb41fef0b3e0c110d6f8c20eeb6c11','39.jpg','Pimpinan',28,'0000',NULL,'pimpinan3@gmail.com',NULL,'2020-05-20 17:29:52',NULL,1,NULL,'pimpinan','enable'),
(42,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,'Administrators',18,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'pandu.pandangd','enable'),
(43,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,'Administrator',29,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'pandu.pandangf','enable'),
(44,NULL,NULL,NULL,NULL,29,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'scan','enable'),
(45,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,'scan',29,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'scan2','enable'),
(46,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,'broadcast',30,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'broadcast','enable');

/*Table structure for table `broadcast_group` */

DROP TABLE IF EXISTS `broadcast_group`;

CREATE TABLE `broadcast_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `ket` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `broadcast_group` */

insert  into `broadcast_group`(`id`,`nama`,`ket`) values 
(4,'PIMPINAN LEMBAGA NEGARA',''),
(5,'lainnya','');

/*Table structure for table `broadcast_kontak` */

DROP TABLE IF EXISTS `broadcast_kontak`;

CREATE TABLE `broadcast_kontak` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_group` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `instansi` varchar(100) DEFAULT NULL,
  `hp` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `last` datetime DEFAULT NULL COMMENT 'last time send',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `broadcast_kontak` */

insert  into `broadcast_kontak`(`id`,`id_group`,`nama`,`jabatan`,`instansi`,`hp`,`email`,`last`) values 
(1,0,'cv','vb','fg','0666','ggg',NULL),
(2,4,'cv','vb','fg','0666','ggg','2020-12-11 15:26:48'),
(3,4,'cepi','IT','IT','085221288210','cahyanacepi@gmail.com',NULL);

/*Table structure for table `broadcast_pengaturan` */

DROP TABLE IF EXISTS `broadcast_pengaturan`;

CREATE TABLE `broadcast_pengaturan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(250) DEFAULT NULL,
  `value` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `broadcast_pengaturan` */

insert  into `broadcast_pengaturan`(`id`,`nama`,`value`) values 
(1,'Url api whatsapp','https://kacangan.wablas.com/api/send-message'),
(2,'Token api whatsapp','f3KemVwbEbw9p8Zgl0WQOyeHOcUoJQLoMMf8BhOpYCsGJ1K9yFq40HgUXzy5EPre'),
(3,'konten whatsapp','Setiap kode dibawah ini yang disertakan pada isi pesan akan secara otomatis diganti dengan data masing-masing kontak yang dikirim:\nNama = {nama}\nJabatan = {jabatan}\nInstansi = {instansi}\nEmail = {email}\nHp = {hp}');

/*Table structure for table `data_acara` */

DROP TABLE IF EXISTS `data_acara`;

CREATE TABLE `data_acara` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(50) DEFAULT NULL,
  `id_acara` int(11) DEFAULT NULL COMMENT 'jenis undangan',
  `id_jenis_kegiatan` tinyint(100) DEFAULT '1',
  `acara` varchar(250) DEFAULT NULL,
  `perihal` varchar(250) DEFAULT NULL,
  `agenda` text,
  `agenda2` text,
  `agenda3` text,
  `agenda_english` varchar(200) DEFAULT NULL,
  `negara` varchar(200) DEFAULT NULL,
  `negara_english` varchar(200) DEFAULT NULL,
  `no_surat` varchar(250) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `jam` varchar(10) DEFAULT NULL,
  `tempat` text,
  `tempat_english` varchar(150) DEFAULT NULL,
  `isi_undangan` text,
  `pakaian_1` varchar(250) DEFAULT NULL COMMENT 'laki',
  `pakaian_2` varchar(250) DEFAULT NULL COMMENT 'wanita',
  `pakaian_3` varchar(250) DEFAULT NULL COMMENT 'tni/polri',
  `pakaian_1_english` varchar(250) DEFAULT NULL,
  `pakaian_2_english` varchar(250) DEFAULT NULL,
  `pakaian_3_english` varchar(250) DEFAULT NULL,
  `rsvp` text,
  `_cid` int(11) DEFAULT NULL,
  `_ctime` datetime DEFAULT CURRENT_TIMESTAMP,
  `_uid` int(11) DEFAULT NULL,
  `_utime` datetime DEFAULT NULL,
  `lampiran2` text,
  `lampiran3` text,
  `catatan_lampiran2` text,
  `catatan_lampiran3` text,
  `tembusan` text,
  `distribusi` text,
  `paraf_persetujuan` text,
  `ket_kedatangan` text,
  `jam_scand` varchar(10) DEFAULT '00:00',
  `count_peserta` int(11) DEFAULT NULL,
  `durasi` int(11) DEFAULT '1',
  `turut_mengundang` varchar(200) DEFAULT NULL,
  `konsep` varchar(50) DEFAULT NULL,
  `hasil` text,
  `jml_pendamping` tinyint(4) DEFAULT '0',
  `email_konfirmasi` text,
  `email_konfirmasi_english` text,
  `email_reschedule` text,
  `email_reschedule_english` text,
  `email_undangan` text,
  `email_undangan_english` text,
  `email_pembatalan` text,
  `email_pembatalan_english` text,
  `wa_konfirmasi` text,
  `wa_konfirmasi_english` text,
  `wa_reschedule` text,
  `wa_reschedule_english` text,
  `wa_undangan` text,
  `wa_undangan_english` text,
  `wa_pembatalan` text,
  `wa_pembatalan_english` text,
  `tamu1` varchar(100) DEFAULT NULL,
  `tamu2` varchar(100) DEFAULT NULL,
  `tamu1_english` varchar(100) DEFAULT NULL,
  `tamu2_english` varchar(100) DEFAULT NULL,
  `persetujuan` text,
  `ibu_negara` varchar(150) DEFAULT NULL,
  `ibu_negara_english` varchar(150) DEFAULT NULL,
  `nested` text COMMENT 'urutan kelompok jabatan',
  `file_surat` varchar(100) DEFAULT NULL,
  `ket` text COMMENT 'keterangan pada undangan cetak',
  `pejabat1` varchar(100) DEFAULT NULL,
  `pejabat2` varchar(100) DEFAULT NULL,
  `pejabat3` varchar(100) DEFAULT NULL,
  `pakaian_pejabat1` varchar(100) DEFAULT NULL,
  `pakaian_pejabat2` varchar(100) DEFAULT NULL,
  `pakaian_pejabat3` varchar(100) DEFAULT NULL,
  `sambutan` text,
  `akhiran_undangan` varchar(50) DEFAULT NULL,
  `ket_english` text,
  `template_1` text,
  `template_2` text,
  `penyelenggaraan` varchar(50) DEFAULT '["1"]',
  `email_subject` text,
  `redaksi_v1` text COMMENT 'template broadcast v1',
  `redaksi_v2` text,
  `redaksi_v3` text,
  `redaksi_aktif` varchar(10) DEFAULT NULL COMMENT 'redaksi briadcast yang dipilih',
  `eundangan` text,
  `eundangan_v1` text,
  `eundangan_v2` text,
  `eundangan_v3` text,
  `eundangan_aktif` varchar(10) DEFAULT NULL COMMENT 'redaksi undangan dipilih',
  `esertifikat` text,
  `esertifikat_v1` text,
  `esertifikat_v2` text,
  `esertifikat_v3` text,
  `esertifikat_aktif` varchar(10) DEFAULT NULL,
  `sts_vicon` tinyint(11) DEFAULT '0' COMMENT '1=geladi 2=on',
  `banner_email` text,
  PRIMARY KEY (`id`),
  KEY `kode` (`kode`,`id_acara`,`id_jenis_kegiatan`,`acara`,`perihal`,`no_surat`,`tgl`)
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=latin1;

/*Data for the table `data_acara` */

insert  into `data_acara`(`id`,`kode`,`id_acara`,`id_jenis_kegiatan`,`acara`,`perihal`,`agenda`,`agenda2`,`agenda3`,`agenda_english`,`negara`,`negara_english`,`no_surat`,`tgl`,`jam`,`tempat`,`tempat_english`,`isi_undangan`,`pakaian_1`,`pakaian_2`,`pakaian_3`,`pakaian_1_english`,`pakaian_2_english`,`pakaian_3_english`,`rsvp`,`_cid`,`_ctime`,`_uid`,`_utime`,`lampiran2`,`lampiran3`,`catatan_lampiran2`,`catatan_lampiran3`,`tembusan`,`distribusi`,`paraf_persetujuan`,`ket_kedatangan`,`jam_scand`,`count_peserta`,`durasi`,`turut_mengundang`,`konsep`,`hasil`,`jml_pendamping`,`email_konfirmasi`,`email_konfirmasi_english`,`email_reschedule`,`email_reschedule_english`,`email_undangan`,`email_undangan_english`,`email_pembatalan`,`email_pembatalan_english`,`wa_konfirmasi`,`wa_konfirmasi_english`,`wa_reschedule`,`wa_reschedule_english`,`wa_undangan`,`wa_undangan_english`,`wa_pembatalan`,`wa_pembatalan_english`,`tamu1`,`tamu2`,`tamu1_english`,`tamu2_english`,`persetujuan`,`ibu_negara`,`ibu_negara_english`,`nested`,`file_surat`,`ket`,`pejabat1`,`pejabat2`,`pejabat3`,`pakaian_pejabat1`,`pakaian_pejabat2`,`pakaian_pejabat3`,`sambutan`,`akhiran_undangan`,`ket_english`,`template_1`,`template_2`,`penyelenggaraan`,`email_subject`,`redaksi_v1`,`redaksi_v2`,`redaksi_v3`,`redaksi_aktif`,`eundangan`,`eundangan_v1`,`eundangan_v2`,`eundangan_v3`,`eundangan_aktif`,`esertifikat`,`esertifikat_v1`,`esertifikat_v2`,`esertifikat_v3`,`esertifikat_aktif`,`sts_vicon`,`banner_email`) values 
(1,'IYABF',1,1,NULL,'Undangan Rapat Koordinasi','Rakor ABC',NULL,NULL,NULL,NULL,NULL,'123/abc-07','2020-07-31','10:00','Ruang Rapat Kepala Sekretariat Presiden, Lt. 1, Jl. Veteran No. 16 Jakarta Pusat ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',20,'2020-06-24 23:18:50',20,'2020-07-09 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',33,1,NULL,NULL,NULL,2,'Yth. Bapak/Ibu<br>\nMohon izin menyampaikan Undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.',NULL,'',NULL,'',NULL,'',NULL,'cek wa gaes...',NULL,'',NULL,'',NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'files/2020/IYABF/surat_undangan.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(2,'IGNVC',5,6,NULL,NULL,'tes',NULL,NULL,NULL,NULL,NULL,NULL,'2020-06-25','10:00','Istana Negara, Jakarta',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',20,'2020-06-24 23:27:49',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',1,1,NULL,NULL,NULL,0,'&nbsp;<br>\nYth. Bapak/Ibu<br>\nMohon izin menyampaikan Undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol',NULL,'&nbsp;<br>\nYth. Bapak/Ibu<br>\nMohon izin menyampaikan Penundaan waktu acara undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.<br>\n ',NULL,'',NULL,'',NULL,'mohon periksa email',NULL,'',NULL,'',NULL,'',NULL,NULL,NULL,NULL,NULL,'{\"1\":\"1\"}',NULL,NULL,'[{\"id\":\"IT\"}]',NULL,'<ul>\n <li>Harap hadir 30 menit sebelum acara dimulai<br>\n dan undangan dibawa serta</li>\n <li>Konfirmasi kehadiran anda pada link yang telah<br>\n kami kirim melalui email</li>\n</ul>\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(6,'D2RQN',2,2,NULL,NULL,'dfdfdf',NULL,NULL,'dfdf','dfdf','dfdf',NULL,'2020-06-30','12:00','Istana Kepresidenan Bogor','Bogor Presidential Palace',NULL,'','','','','','',NULL,20,'2020-06-26 03:31:34',20,'2020-06-26 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',2,1,NULL,NULL,NULL,0,'Yth. Bapak/Ibu<br>\nMohon izin menyampaikan Undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.','','','',NULL,NULL,'','','','','','','','','','','dfdf','dfdf','dfdf','dfd','{\"1\":\"1\"}','Hj. Iriana Joko Widodo','Mrs. Iriana Joko Widodo','[{\"id\":\"IT\"}]',NULL,'<ul>\n <li>Harap hadir 30 menit sebelum acara dimulai<br>\n dan undangan dibawa serta</li>\n <li>Konfirmasi kehadiran anda pada link yang telah<br>\n kami kirim melalui email</li>\n</ul>\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\n <li>Please arrive 30 minutes in advance<br>\n and Bring this invitation</li>\n <li>Please confirm your presence on the link<br>\n that we sent via email</li>\n</ul>\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(7,'7R1LD',1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',20,'2020-06-29 02:56:50',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(9,'4DBJN',3,1,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',20,'2020-06-29 02:57:19',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'null',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(11,'L6N4G',2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,20,'2020-06-29 02:58:08',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'null','Hj. Iriana Joko Widodo','Mrs. Iriana Joko Widodo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(12,'QNFT2',1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',20,'2020-06-29 03:04:48',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(13,'ZNABX',1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',20,'2020-06-29 03:04:51',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(14,'6BJ27',1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',20,'2020-06-29 03:04:51',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(15,'W5JVQ',1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',20,'2020-06-29 03:04:52',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(16,'6PAX4',1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',20,'2020-06-29 03:04:52',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(17,'LMBZV',1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',20,'2020-06-29 03:04:53',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(18,'S1QY4',1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',20,'2020-06-29 03:04:53',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(19,'6GS1Q',1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',20,'2020-06-29 03:04:54',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(20,'C195K',1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',20,'2020-06-29 03:05:07',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(30,'UHMST',3,1,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',20,'2020-06-29 03:07:06',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'null',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(31,'XETD5',3,1,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',20,'2020-06-29 03:07:06',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'null',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(32,'GBDIC',3,1,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',20,'2020-06-29 03:07:07',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'null',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(33,'WZMP7',3,1,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',20,'2020-06-29 03:07:07',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'null',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(34,'4ZW5N',3,1,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',20,'2020-06-29 03:07:07',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'null',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(35,'JM3UA',3,1,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',20,'2020-06-29 03:07:07',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'null',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(36,'SJWBN',3,1,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',20,'2020-06-29 03:07:08',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'null',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(37,'JT76P',3,1,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',20,'2020-06-29 03:07:23',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'null',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(38,'5NBP7',3,1,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',20,'2020-06-29 03:07:25',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'null',NULL,NULL,'[]',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<p><span style=\"line-height:20px\">&nbsp;&nbsp; </span></p>\n\n<div style=\"text-align:center\"><span style=\"font-size:16px\"><span style=\"line-height:1\"><strong>MENTERI SEKRETARIS NEGARA</strong></span><br />\n<strong>REPUBLIK INDONESIA</strong></span></div>\n\n<div style=\"padding:5px; text-align:center\">mengharapkan dengan hormat Bapak/Ibu/Saudara<br />\n<span style=\"line-height:1\">pada acara</span></div>\n\n<div style=\"text-align:center\"><span style=\"line-height:1.2\"><strong><span style=\"font-size:16px\">PENGUCAPAN SUMPAH/JANJI<br />\nKETUA MAHKAMAH AGUNG</span><br />\n<span style=\"font-size:14px\">dan</span><br />\n<span style=\"font-size:16px\">HAKIM KONSTITUSI</span></strong><br />\n<span style=\"font-size:14px\"><strong>di Hadapan</strong></span><br />\n<span style=\"font-size:18px\"><strong>PRESIDEN REPUBLIK INDONESIA</strong></span><br />\n<br />\n&nbsp;hari kamis, tanggal 30 April 2020, pukul 09.30 WIB<br />\nbertempat di Istana Negara, Jakarta</span><br />\n&nbsp;</div>\n\n<table style=\"margin-left:100px\">\n	<tbody>\n		<tr>\n			<td style=\"vertical-align:top; width:305px\">\n			<table cellpadding=\"0\" cellspacing=\"0\">\n				<tbody>\n					<tr>\n						<td colspan=\"2\"><span style=\"font-size:11px\"><strong>Pakaian :<br />\n						Pejabat yang dilantik</strong></span></td>\n					</tr>\n					<tr>\n						<td style=\"width:100px\"><span style=\"line-height:0.5\"><span style=\"font-size:11px\">Ketua MA</span></span></td>\n						<td><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: Toga Hakim Agung</span></span></td>\n					</tr>\n					<tr>\n						<td style=\"width:100px\"><span style=\"line-height:0.5\"><span style=\"font-size:11px\">Hakim Konstitusi</span></span></td>\n						<td><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: Toga Hakim Konstiusi</span></span></td>\n					</tr>\n				</tbody>\n			</table>\n			</td>\n			<td style=\"vertical-align:top; width:270px\">\n			<table cellpadding=\"0\" cellspacing=\"0\" style=\"height:93px; width:207px\">\n				<tbody>\n					<tr>\n						<td colspan=\"2\" style=\"width:100px\"><span style=\"line-height:0.5\"><span style=\"font-size:11px\"><strong>Tamu undangan :</strong></span></span></td>\n					</tr>\n					<tr>\n						<td style=\"width:100px\"><span style=\"font-size:11px\"><span style=\"line-height:0.5\">Pria</span></span></td>\n						<td><span style=\"font-size:11px\"><span style=\"line-height:0.5\">:&nbsp;Batik</span></span></td>\n					</tr>\n					<tr>\n						<td style=\"width:100px\"><span style=\"line-height:0.5\"><span style=\"font-size:11px\">Wanita</span></span></td>\n						<td><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: Kebaya</span></span></td>\n					</tr>\n					<tr>\n						<td style=\"width:100px\"><span style=\"font-size:11px\"><span style=\"line-height:0.5\">TNI/POLRI</span></span></td>\n						<td><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: PDU-III</span></span></td>\n					</tr>\n				</tbody>\n			</table>\n			</td>\n		</tr>\n	</tbody>\n</table>\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(48,'4VEYJ',2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,20,'2020-06-29 03:18:59',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'null','Hj. Iriana Joko Widodo','Mrs. Iriana Joko Widodo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(49,'IVMTZ',2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,20,'2020-06-29 03:19:03',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'null','Hj. Iriana Joko Widodo','Mrs. Iriana Joko Widodo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(50,'X6VZU',2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,20,'2020-06-29 03:19:03',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'null','Hj. Iriana Joko Widodo','Mrs. Iriana Joko Widodo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(51,'FES15',2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,20,'2020-06-29 03:19:04',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'null','Hj. Iriana Joko Widodo','Mrs. Iriana Joko Widodo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(52,'8NVAF',2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,20,'2020-06-29 03:19:04',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'null','Hj. Iriana Joko Widodo','Mrs. Iriana Joko Widodo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(53,'2PY16',2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,20,'2020-06-29 03:19:04',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'null','Hj. Iriana Joko Widodo','Mrs. Iriana Joko Widodo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(54,'PZFGR',2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,20,'2020-06-29 03:19:05',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'null','Hj. Iriana Joko Widodo','Mrs. Iriana Joko Widodo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(55,'CYTA1',2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,20,'2020-06-29 03:19:07',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'null','Hj. Iriana Joko Widodo','Mrs. Iriana Joko Widodo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(56,'5MK9L',2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,20,'2020-06-29 03:19:15',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'null','Hj. Iriana Joko Widodo','Mrs. Iriana Joko Widodo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(63,'Q34ZP',1,1,NULL,'Undangan Rapat Koordinasi','LJH',NULL,NULL,NULL,NULL,NULL,'687T8O','2020-07-01','12:00','Ruang Rapat Kepala Sekretariat Presiden, Lt. 1, Jl. Veteran No. 16 Jakarta Pusat ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',20,'2020-06-30 14:05:18',20,'2020-07-01 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',38,1,NULL,NULL,NULL,2,'Yth. Bapak/Ibu<br>\nMohon izin menyampaikan Undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.',NULL,'Yth. Bapak/Ibu<br>\n<br>\nMenginformasikan kembali  <strong>ARAHAN TERBARU DARI PIMPINAN</strong> untuk Rapat Koordinasi Acara………..<br>\n(Hari,Tgl/Bulan/Tahun) yang semula akan dijadwalkan pada pukul…… <strong><em>DIMAJUKAN</em></strong>  menjadi pukul…….<br>\nUntuk tempat pelaksanaan rakor tidak ada perubahan<br>\nAtas perhatiannya kami ucapkan terimakasih<br>\n<br>\nProtokol Kepresidenan<br>\n ',NULL,'',NULL,'<span xss=removed><span xss=removed><span xss=removed>Yth. Bapak/Ibu</span></span></span><br>\n<br>\n<span xss=removed><span xss=removed><span xss=removed>Menginformasikan kembali <strong>ARAHAN TERBARU DARI PIMPINAN</strong> untuk Rapat Koordinasi Acara……….. </span></span></span><br>\n<span xss=removed><span xss=removed><span xss=removed>Yang semula akan dijadwalkan pada (Tgl/Bulan/Tahun) pukul……  <strong><em>DIBATALKAN</em></strong></span></span></span><br>\n<span xss=removed><span xss=removed><span xss=removed>Sampai dengan adanya arahan lebih lanjut</span></span></span><br>\n<span xss=removed><span xss=removed><span xss=removed>Atas perhatiannya kami ucapkan terimakasih</span></span></span><br>\n<br>\n<span xss=removed><span xss=removed><span xss=removed>Protokol Kepresidenan</span></span></span><br>\n ',NULL,'Yth. Bapak/Ibu<br>\n<br>\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\nAtas perhatiannya kami ucapkan terimakasih<br>\n<br>\nProtokol Kepresidenan',NULL,'Yth. Bapak/Ibu<br>\n<br>\nSehubungan dengan perubahan waktu terkait pelaksanaan Rapat Koordinasi yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\nAtas perhatiannya kami ucapkan terimakasih<br>\n<br>\nProtokol Kepresidenan<br>\n ',NULL,'',NULL,'<span xss=removed><span xss=removed><span xss=removed>Yth. Bapak/Ibu</span></span></span><br>\n<br>\n<span xss=removed><span xss=removed><span xss=removed>Sehubungan dengan dibatalkannya pelaksanaan Rapat Koordinasi yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.</span></span></span><br>\n<span xss=removed><span xss=removed><span xss=removed>Atas perhatiannya kami ucapkan terimakasih</span></span></span><br>\n<br>\n<span xss=removed><span xss=removed><span xss=removed>Protokol Kepresidenan</span></span></span><br>\n ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'files/2020/Q34ZP/surat_undangan.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(64,'R3FNX',1,1,NULL,'Undangan Rapat Koordinasi','pelantikan deni portal',NULL,NULL,NULL,NULL,NULL,'2','2020-07-01','15:00','Ruang Rapat Kepala Sekretariat Presiden, Lt. 1, Jl. Veteran No. 16 Jakarta Pusat ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',20,'2020-06-30 15:32:04',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',37,1,NULL,NULL,NULL,2,'Yth. Bapak/Ibu<br>\nMohon izin menyampaikan Undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.',NULL,'',NULL,'',NULL,'',NULL,'Selamat….<br>\nYth. Bapak/Ibu<br>\n<br>\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\nAtas perhatiannya kami ucapkan terimakasih<br>\n<br>\nProtokol Kepresidenan<br>\n ',NULL,'',NULL,'',NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'files/2020/R3FNX/surat_undangan.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(65,'NCMBW',1,1,NULL,'Undangan Rapat Koordinasi','Pelantikan Robi Sugara',NULL,NULL,NULL,NULL,NULL,'01','2020-07-01','15:45','Ruang Rapat Kepala Sekretariat Presiden, Lt. 2,  Jl. Veteran No. 16 Jakarta Pusat',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',20,'2020-06-30 15:34:46',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',60,1,NULL,NULL,NULL,2,'Yth. Bapak/Ibu<br>\nMohon izin menyampaikan Undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.',NULL,'',NULL,'',NULL,'',NULL,'Selamat….<br>\nYth. Bapak/Ibu<br>\n<br>\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\nAtas perhatiannya kami ucapkan terimakasih<br>\n<br>\nProtokol Kepresidenan<br>\n ',NULL,'',NULL,'',NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'files/2020/NCMBW/surat_undangan.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(67,'PF2W4',2,2,NULL,NULL,'',NULL,NULL,'','','',NULL,'2020-07-01','12:00','Istana Negara','Bogor Presidential Palace',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,20,'2020-07-01 01:07:05',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',NULL,1,NULL,NULL,NULL,0,'Yth. Bapak/Ibu<br>\nMohon izin menyampaikan Undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.','','','',NULL,NULL,'','','','','','','','','','','','','','','null','Hj. Iriana Joko Widodo','Mrs. Iriana Joko Widodo',NULL,NULL,'<ul>\n <li>Harap hadir 30 menit sebelum acara dimulai<br>\n dan undangan dibawa serta</li>\n <li>Konfirmasi kehadiran anda pada link yang telah<br>\n kami kirim melalui email</li>\n</ul>\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\n <li>Please arrive 30 minutes in advance<br>\n and Bring this invitation</li>\n <li>Please confirm your presence on the link<br>\n that we sent via email</li>\n</ul>\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(68,'49JTF',2,2,NULL,NULL,'Jamuan Santap Siang Kenegaraan',NULL,NULL,'a State Luncheon','Putra Mahkota Abu Dhabi Persatuan Emirat Arab','The Crown of Abu Dhabi of the United Arab Emirates',NULL,'2020-07-01','15:00','Istana Kepresidenan Bogor','Bogor Presidential Palace',NULL,'PSL','Pakaian Nasioanl','PDU-III','Dark Suit','National Dress','Servive Dress',NULL,20,'2020-07-01 01:32:29',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',126,1,NULL,NULL,NULL,0,'Yth. Bapak/Ibu<br>\nMohon izin menyampaikan Undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.','','acara ditunda','',NULL,NULL,'acara dibatalkan','','mohn cek email','','mhn cek email kembali','','','','mohon cek email kembali','','Sri Paduka Shikh Mohamed Bin Zayed Al Nahyan','','His Royal Highness Shikh Mohamed Bin Zayed Al Nahyan','','{\"1\":\"1\",\"2\":\"2\",\"3\":\"3\",\"4\":\"4\",\"5\":\"5\",\"6\":\"6\"}','Hj. Iriana Joko Widodo','Mrs. Iriana Joko Widodo','[{\"id\":\"\"},{\"id\":\"\"}]',NULL,'<ul>\n <li>Harap hadir 30 menit sebelum acara dimulai<br>\n dan undangan dibawa serta</li>\n <li>Konfirmasi kehadiran anda pada link yang telah<br>\n kami kirim melalui email</li>\n</ul>\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\n <li>Please arrive 30 minutes in advance<br>\n and Bring this invitation</li>\n <li>Please confirm your presence on the link<br>\n that we sent via email</li>\n</ul>\n','<p><span style=\"line-height:20px\">&nbsp;&nbsp; </span></p>\n\n<div style=\"text-align:center\"><span style=\"font-size:16px\"><span style=\"line-height:1\"><strong>MENTERI SEKRETARIS NEGARA</strong></span><br />\n<strong>REPUBLIK INDONESIA</strong></span></div>\n\n<div style=\"padding:5px; text-align:center\">mengharapkan dengan hormat Bapak/Ibu/Saudara<br />\n<span style=\"line-height:1\">pada acara</span></div>\n\n<div style=\"text-align:center\"><span style=\"line-height:1.2\"><strong><span style=\"font-size:16px\">PENGUCAPAN SUMPAH/JANJI<br />\nKETUA MAHKAMAH AGUNG</span><br />\n<span style=\"font-size:14px\">dan</span><br />\n<span style=\"font-size:16px\">HAKIM KONSTITUSI</span></strong><br />\n<span style=\"font-size:14px\"><strong>di Hadapan</strong></span><br />\n<span style=\"font-size:18px\"><strong>PRESIDEN REPUBLIK INDONESIA</strong></span><br />\n<br />\n&nbsp;hari kamis, tanggal 30 April 2020, pukul 09.30 WIB<br />\nbertempat di Istana Negara, Jakarta</span><br />\n&nbsp;</div>\n\n<table style=\"margin-left:100px\">\n	<tbody>\n		<tr>\n			<td style=\"vertical-align:top; width:305px\">\n			<table cellpadding=\"0\" cellspacing=\"0\">\n				<tbody>\n					<tr>\n						<td colspan=\"2\"><span style=\"font-size:11px\"><strong>Pakaian :<br />\n						Pejabat yang dilantik</strong></span></td>\n					</tr>\n					<tr>\n						<td style=\"width:100px\"><span style=\"line-height:0.5\"><span style=\"font-size:11px\">Ketua MA</span></span></td>\n						<td><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: Toga Hakim Agung</span></span></td>\n					</tr>\n					<tr>\n						<td style=\"width:100px\"><span style=\"line-height:0.5\"><span style=\"font-size:11px\">Hakim Konstitusi</span></span></td>\n						<td><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: Toga Hakim Konstiusi</span></span></td>\n					</tr>\n				</tbody>\n			</table>\n			</td>\n			<td style=\"vertical-align:top; width:270px\">\n			<table cellpadding=\"0\" cellspacing=\"0\" style=\"height:93px; width:207px\">\n				<tbody>\n					<tr>\n						<td colspan=\"2\" style=\"width:100px\"><span style=\"line-height:0.5\"><span style=\"font-size:11px\"><strong>Tamu undangan :</strong></span></span></td>\n					</tr>\n					<tr>\n						<td style=\"width:100px\"><span style=\"font-size:11px\"><span style=\"line-height:0.5\">Pria</span></span></td>\n						<td><span style=\"font-size:11px\"><span style=\"line-height:0.5\">:&nbsp;Batik</span></span></td>\n					</tr>\n					<tr>\n						<td style=\"width:100px\"><span style=\"line-height:0.5\"><span style=\"font-size:11px\">Wanita</span></span></td>\n						<td><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: Kebaya</span></span></td>\n					</tr>\n					<tr>\n						<td style=\"width:100px\"><span style=\"font-size:11px\"><span style=\"line-height:0.5\">TNI/POLRI</span></span></td>\n						<td><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: PDU-III</span></span></td>\n					</tr>\n				</tbody>\n			</table>\n			</td>\n		</tr>\n	</tbody>\n</table>\n','<p><span style=\"line-height:20px\">&nbsp;&nbsp; </span></p>\n\n<div style=\"text-align:center\"><span style=\"font-size:16px\"><span style=\"line-height:1\"><strong>MENTERI SEKRETARIS NEGARA</strong></span><br />\n<strong>REPUBLIK INDONESIA</strong></span></div>\n\n<div style=\"padding:5px; text-align:center\">mengharapkan dengan hormat Bapak/Ibu/Saudara<br />\n<span style=\"line-height:1\">pada acara</span></div>\n\n<div style=\"text-align:center\"><span style=\"line-height:1.2\"><strong><span style=\"font-size:16px\">PENGUCAPAN SUMPAH/JANJI<br />\nKETUA MAHKAMAH AGUNG</span><br />\n<span style=\"font-size:14px\">dan</span><br />\n<span style=\"font-size:16px\">HAKIM KONSTITUSI</span></strong><br />\n<span style=\"font-size:14px\"><strong>di Hadapan</strong></span><br />\n<span style=\"font-size:18px\"><strong>PRESIDEN REPUBLIK INDONESIA</strong></span><br />\n<br />\n&nbsp;hari kamis, tanggal 30 April 2020, pukul 09.30 WIB<br />\nbertempat di Istana Negara, Jakarta</span><br />\n&nbsp;</div>\n\n<table style=\"margin-left:100px\">\n	<tbody>\n		<tr>\n			<td style=\"vertical-align:top; width:305px\">\n			<table cellpadding=\"0\" cellspacing=\"0\">\n				<tbody>\n					<tr>\n						<td colspan=\"2\"><span style=\"font-size:11px\"><strong>Pakaian :<br />\n						Pejabat yang dilantik</strong></span></td>\n					</tr>\n					<tr>\n						<td style=\"width:100px\"><span style=\"line-height:0.5\"><span style=\"font-size:11px\">Ketua MA</span></span></td>\n						<td><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: Toga Hakim Agung</span></span></td>\n					</tr>\n					<tr>\n						<td style=\"width:100px\"><span style=\"line-height:0.5\"><span style=\"font-size:11px\">Hakim Konstitusi</span></span></td>\n						<td><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: Toga Hakim Konstiusi</span></span></td>\n					</tr>\n				</tbody>\n			</table>\n			</td>\n			<td style=\"vertical-align:top; width:270px\">\n			<table cellpadding=\"0\" cellspacing=\"0\" style=\"height:93px; width:207px\">\n				<tbody>\n					<tr>\n						<td colspan=\"2\" style=\"width:100px\"><span style=\"line-height:0.5\"><span style=\"font-size:11px\"><strong>Tamu undangan :</strong></span></span></td>\n					</tr>\n					<tr>\n						<td style=\"width:100px\"><span style=\"font-size:11px\"><span style=\"line-height:0.5\">Pria</span></span></td>\n						<td><span style=\"font-size:11px\"><span style=\"line-height:0.5\">:&nbsp;Batik</span></span></td>\n					</tr>\n					<tr>\n						<td style=\"width:100px\"><span style=\"line-height:0.5\"><span style=\"font-size:11px\">Wanita</span></span></td>\n						<td><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: Kebaya</span></span></td>\n					</tr>\n					<tr>\n						<td style=\"width:100px\"><span style=\"font-size:11px\"><span style=\"line-height:0.5\">TNI/POLRI</span></span></td>\n						<td><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: PDU-III</span></span></td>\n					</tr>\n				</tbody>\n			</table>\n			</td>\n		</tr>\n	</tbody>\n</table>\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(69,'TU47L',4,3,NULL,NULL,'Upacara Prasetya Perwira TNI-POLRI 2020','','',NULL,NULL,NULL,NULL,'2020-07-14','08:30','',NULL,NULL,'','','',NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',20,'2020-07-06 08:00:57',20,'2020-07-08 16:00:39',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',2,1,NULL,NULL,NULL,0,'Yth. Bapak/Ibu<br>\nMohon izin menyampaikan Undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.',NULL,'email reschedul',NULL,'',NULL,'emailbatal',NULL,'Selamat….<br>\nYth. Bapak/Ibu<br>\n<br>\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\nAtas perhatiannya kami ucapkan terimakasih<br>\n<br>\nProtokol Kepresidenan<br>\n ',NULL,'Selamat….<br>\nYth. Bapak/Ibu<br>\n<br>\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\nAtas perhatiannya kami ucapkan terimakasih<br>\n<br>\nProtokol Kepresidenan',NULL,'',NULL,'Selamat….<br>\nYth. Bapak/Ibu<br>\n<br>\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\nAtas perhatiannya kami ucapkan terimakasih<br>\n<br>\nProtokol Kepresidenan',NULL,NULL,NULL,NULL,NULL,'{\"1\":\"1\",\"2\":\"2\",\"3\":\"3\",\"4\":\"4\",\"5\":\"5\",\"6\":\"6\"}',NULL,NULL,'[{\"id\":\"KEPALA BAGIAN \"}]',NULL,NULL,'','','','','','','','Oleh',NULL,'<div style=\"margin-left:-20px; padding:5px; text-align:center\"><br />\n<span style=\"font-size:16px\"><span class=\"monotype\"><strong>MENTERI SEKRETARIS NEGARA&nbsp;REPUBLIK INDONESIA</strong></span></span><br />\n<span style=\"font-size:14px\"><span class=\"monotype\">dan</span></span><br />\n<span style=\"font-size:16px\"><span class=\"monotype\"><strong>Panglima Tentara Nasional Indonesia</strong></span></span><br />\n<span style=\"font-size:14px\"><span class=\"monotype\"><span style=\"line-height:1\">serta</span></span></span><br />\n<span style=\"font-size:16px\"><span class=\"monotype\"><span style=\"line-height:1\"><strong>Kepala Kepolisian Negara Republik Indonesia</strong></span></span></span><br />\n<span style=\"font-size:14px\"><span class=\"monotype\"><span style=\"line-height:1\">&nbsp; mengharap dengan hormat kehadiran Bapak/Ibu/Saudara<br />\npada upacara</span></span></span><br />\n<span style=\"font-size:16px\"><span class=\"monotype\"><span style=\"line-height:1\"><strong>Prasetya Perwira TNI-POLRI 2020</strong></span></span></span><br />\n<span style=\"font-size:14px\"><span class=\"monotype\"><span style=\"line-height:1\">oleh</span></span></span><br />\n<span style=\"font-size:20px\"><span class=\"monotype\"><span style=\"line-height:1\"><strong>Presiden Republik Indonesa</strong></span></span></span><br />\n<span style=\"font-size:14px\"><span class=\"monotype\"><span style=\"line-height:1\">&nbsp;</span>hari selasa, tanggal 14&nbsp;Juli 2020, pukul 08.30 WIB<br />\nbertempat di Istana Negara, Jakarta</span></span><br />\n&nbsp;</div>\n\n<table style=\"margin-left:110px\">\n	<tbody>\n		<tr>\n			<td style=\"vertical-align:top; width:270px\"><span style=\"line-height:1\"><span style=\"font-size:9px\">-&nbsp; Harap hadir pukul &hellip;. WIB sebelum acara dimulai<br />\n			&nbsp; &nbsp;untuk melaksanakan Rapid Test di ruang tunggu 05<br />\n			&nbsp; &nbsp;dan undangan harap dibawa</span><br />\n			<span style=\"font-size:9px\">-&nbsp; Undangan berlaku satu orang dan tidak dapat diwakilkan<br />\n			&nbsp;&nbsp; untuk Taruna yang akan dilantik dan tamu undangan<br />\n			&nbsp;&nbsp; wajib menggunakan masker kain</span><br />\n			<span style=\"font-size:9px\">-&nbsp; Harap jawaban telepon melalui :<br />\n			&nbsp;&nbsp; Sekretariat Akademi TNI&nbsp;<br />\n			&nbsp;&nbsp; Telp. (021-871864/ 48), (021-8452812) &nbsp;pswt: 1102&nbsp;<br />\n			&nbsp;&nbsp; Sekretariat Akademi Kepolisian<br />\n			&nbsp;&nbsp; Telp. (024-8310074)</span><br />\n			&nbsp;</span></td>\n			<td style=\"vertical-align:top; width:270px\"><br />\n			<br />\n			&nbsp;\n			<table cellpadding=\"0\" cellspacing=\"0\" style=\"height:93px; width:207px\">\n				<tbody>\n					<tr>\n						<td colspan=\"2\" style=\"width:100px\"><span style=\"font-size:9px\"><span style=\"line-height:0.5\"><strong>Tamu undangan :</strong></span></span></td>\n					</tr>\n					<tr>\n						<td style=\"width:100px\"><span style=\"font-size:9px\"><span style=\"line-height:0.5\">Pria</span></span></td>\n						<td><span style=\"font-size:9px\"><span style=\"line-height:0.5\">:&nbsp;PSL / Daerah</span></span></td>\n					</tr>\n					<tr>\n						<td style=\"width:100px\"><span style=\"font-size:9px\"><span style=\"line-height:0.5\">Wanita</span></span></td>\n						<td><span style=\"font-size:9px\"><span style=\"line-height:0.5\">:&nbsp;Pakaian Nasional / Daerah</span></span></td>\n					</tr>\n					<tr>\n						<td style=\"width:100px\"><span style=\"font-size:9px\"><span style=\"line-height:0.5\">TNI/POLRI</span></span></td>\n						<td><span style=\"font-size:9px\"><span style=\"line-height:0.5\">:&nbsp;PDU-III</span></span></td>\n					</tr>\n				</tbody>\n			</table>\n			</td>\n		</tr>\n	</tbody>\n</table>\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(70,'3VUCA',4,3,NULL,NULL,'PRASETYA PERWIRA<br>\nTENTARA NASIONAL INDONESIA DAN<br>\nKEPOLISIAN NEGARA REPUBLIK INDONESIA<br>\nTAHUN 2020','','',NULL,NULL,NULL,NULL,'2020-07-14','08:30','Istana Negara, Jakarta',NULL,NULL,'','','',NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',20,'2020-07-10 04:03:57',20,'2020-07-10 21:36:04',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',37,1,NULL,NULL,NULL,0,'Yth. Bapak/Ibu<br>\nMohon izin menyampaikan Undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.',NULL,'email reschedul',NULL,'',NULL,'emailbatal',NULL,'Selamat….<br>\nYth. Bapak/Ibu<br>\n<br>\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\nAtas perhatiannya kami ucapkan terimakasih<br>\n<br>\nProtokol Kepresidenan<br>\n ',NULL,'Selamat….<br>\nYth. Bapak/Ibu<br>\n<br>\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\nAtas perhatiannya kami ucapkan terimakasih<br>\n<br>\nProtokol Kepresidenan',NULL,'',NULL,'Selamat….<br>\nYth. Bapak/Ibu<br>\n<br>\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\nAtas perhatiannya kami ucapkan terimakasih<br>\n<br>\nProtokol Kepresidenan',NULL,NULL,NULL,NULL,NULL,'{\"1\":\"1\",\"3\":\"3\",\"4\":\"4\",\"5\":\"5\",\"6\":\"6\"}',NULL,NULL,'[]',NULL,NULL,'','','','','','','','Oleh',NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(73,'36L2K',2,2,NULL,NULL,'semangat',NULL,NULL,NULL,'Presiden Republik china',NULL,NULL,'2020-07-17','12:00','Istana Kepresidenan Bogor',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,20,'2020-07-11 07:49:58',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',1,1,NULL,NULL,NULL,0,'Yth. Bapak/Ibu<br>\nMohon izin menyampaikan Undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.','','','',NULL,NULL,'','','','','','','','','','','Yang Mulia Murica','Nyonya julana awada',NULL,NULL,'{\"1\":\"1\"}','Hj. Iriana Joko Widodo','Mrs. Iriana Joko Widodo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(74,'URDYC',3,5,NULL,NULL,'sss',NULL,NULL,NULL,NULL,NULL,NULL,'2020-07-16','10:00','Istana Negara, Jakarta',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',20,'2020-07-11 07:57:05',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',1,1,NULL,NULL,NULL,0,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,NULL,NULL,NULL,NULL,'{\"1\":\"1\"}',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(75,'C6TZ5',5,6,NULL,NULL,'sss',NULL,NULL,NULL,NULL,NULL,NULL,'2020-07-16','10:00','Istana Negara, Jakarta',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',20,'2020-07-11 08:01:39',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',1,1,NULL,NULL,NULL,0,' <br>\nYth. Bapak/Ibu<br>\nMohon izin menyampaikan Undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.<br>\n ',NULL,'&nbsp;<br>\nYth. Bapak/Ibu<br>\nMohon izin menyampaikan Penundaan waktu acara undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.<br>\n ',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,NULL,NULL,NULL,NULL,'{\"1\":\"1\"}',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(85,'L4RY7',1,1,NULL,'Undangan Rapat Koordinasi','semangat',NULL,NULL,NULL,NULL,NULL,'T2345UI','2020-07-15','10:00','Ruang Rapat Kepala Sekretariat Presiden, Lt. 1, Jl. Veteran No. 16 Jakarta Pusat ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',20,'2020-07-11 10:12:37',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',8,1,NULL,NULL,NULL,2,'Yth. Bapak/Ibu<br>\r\nMohon izin menyampaikan Undangan dengan agenda <strong>{agenda}</strong><br>\r\nHari,tanggal: {tgl}<br>\r\nPKL: {jam} WIB<br>\r\nAgenda: {agenda}<br>\r\nTempat Rapat: {tempat}<br>\r\nCtt:<br>\r\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\r\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\r\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\r\ndemikian,<br>\r\nTerima kasih Protokol Kepresidenan.',NULL,'email reschedul',NULL,'',NULL,'emailbatal',NULL,'Selamat….<br>\r\nYth. Bapak/Ibu<br>\r\n<br>\r\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\r\nAtas perhatiannya kami ucapkan terimakasih<br>\r\n<br>\r\nProtokol Kepresidenan<br>\r\n ',NULL,'Selamat….<br>\r\nYth. Bapak/Ibu<br>\r\n<br>\r\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\r\nAtas perhatiannya kami ucapkan terimakasih<br>\r\n<br>\r\nProtokol Kepresidenan',NULL,'',NULL,'Selamat….<br>\r\nYth. Bapak/Ibu<br>\r\n<br>\r\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\r\nAtas perhatiannya kami ucapkan terimakasih<br>\r\n<br>\r\nProtokol Kepresidenan',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'files/2020/L4RY7/surat_undangan.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(86,'RTH8X',4,4,NULL,NULL,'bary','','',NULL,NULL,NULL,NULL,'2020-07-16','10:00','Istana Negara, Jakarta',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',20,'2020-07-11 10:27:23',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',1,1,NULL,NULL,NULL,0,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,NULL,NULL,NULL,NULL,'{\"1\":\"1\",\"2\":\"2\"}',NULL,NULL,NULL,NULL,NULL,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(87,'MJ1GV',2,2,NULL,NULL,'semangat',NULL,NULL,NULL,'Presiden Republik china',NULL,NULL,'2020-07-11','12:00','Istana Kepresidenan Bogor',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,28,'2020-07-11 11:02:11',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',NULL,1,NULL,NULL,NULL,0,'Yth. Bapak/Ibu<br>\nMohon izin menyampaikan Undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.','','','',NULL,NULL,'','','','','','','','','','','Yang Mulia Murica','Nyonya julana awada',NULL,NULL,'{\"1\":\"1\",\"2\":\"2\"}','Hj. Iriana Joko Widodo','Mrs. Iriana Joko Widodo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(88,'TIPUJ',2,2,NULL,NULL,'Testing & Implementasi Aplikasi',NULL,NULL,NULL,'Presiden Republik china',NULL,NULL,'2020-07-17','12:00','Istana Kepresidenan Bogor',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,28,'2020-07-11 11:03:48',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',2,1,NULL,NULL,NULL,0,'Yth. Bapak/Ibu<br>\nMohon izin menyampaikan Undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.','','','',NULL,NULL,'','','fff','','','','','','','','Yang Mulia Murica','Nyonya julana awada',NULL,NULL,'{\"1\":\"1\",\"2\":\"2\"}','Hj. Iriana Joko Widodo','Mrs. Iriana Joko Widodo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(89,'XBYW7',4,3,NULL,NULL,'sdsdsd','','',NULL,NULL,NULL,NULL,'2020-07-17','10:00','Istana Negara, Jakarta',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',28,'2020-07-11 11:07:38',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',2,1,NULL,NULL,NULL,0,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,NULL,NULL,NULL,NULL,'{\"1\":\"1\"}',NULL,NULL,NULL,NULL,NULL,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(90,'EG5XL',3,5,NULL,NULL,'mamingan',NULL,NULL,NULL,NULL,NULL,NULL,'2020-07-11','10:00','Istana Negara, Jakarta',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',28,'2020-07-11 11:09:08',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',1,1,NULL,NULL,NULL,0,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,NULL,NULL,NULL,NULL,'{\"1\":\"1\"}',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(91,'5REVY',5,6,NULL,NULL,'ddfd',NULL,NULL,NULL,NULL,NULL,NULL,'2020-07-11','10:00','Istana Negara, Jakarta',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',28,'2020-07-11 11:10:05',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',6,1,NULL,NULL,NULL,0,' <br>\nYth. Bapak/Ibu<br>\nMohon izin menyampaikan Undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.<br>\n ',NULL,'&nbsp;<br>\nYth. Bapak/Ibu<br>\nMohon izin menyampaikan Penundaan waktu acara undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.<br>\n ',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,NULL,NULL,NULL,NULL,'{\"1\":\"1\"}',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(92,'AC6YL',2,2,NULL,NULL,'Testing & Implementasi Aplikasi',NULL,NULL,'test and imlemen system','Presiden Republik china',NULL,NULL,'2020-07-16','12:00','Istana Kepresidenan Bogor',NULL,NULL,'','','','','','',NULL,28,'2020-07-11 15:33:37',28,'2020-07-11 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',5,1,NULL,NULL,NULL,0,'Yth. Bapak/Ibu<br>\nMohon izin menyampaikan Undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.','','','',NULL,NULL,'','','','','','','','','','','Yang Mulia Murica','Nyonya julana awada',NULL,NULL,'null','Hj. Iriana Joko Widodo','Mrs. Iriana Joko Widodo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<div style=\"text-align:center\"><span class=\"monotype\"><span style=\"font-size:16px\"><span style=\"line-height:1\"><strong>MENTERI SEKRETARIS NEGARA</strong></span><br />\n<strong>REPUBLIK INDONESIA</strong></span></span><br />\n<span class=\"monotype\">mengharapkan dengan hormat Bapak/Ibu/Saudara<br />\n<span style=\"line-height:1\">pada acara</span></span><br />\n<span style=\"line-height:1.2\"><strong><span style=\"font-size:16px\">PENGUCAPAN SUMPAH/JANJI<br />\nKETUA MAHKAMAH AGUNG</span><br />\n<span style=\"font-size:14px\">dan</span><br />\n<span style=\"font-size:16px\">HAKIM KONSTITUSI</span></strong><br />\n<span style=\"font-size:14px\"><strong>di Hadapan</strong></span><br />\n<span style=\"font-size:18px\"><strong>PRESIDEN REPUBLIK INDONESIA</strong></span><br />\n<br />\n&nbsp;hari kamis, tanggal 30 April 2020, pukul 09.30 WIB<br />\nbertempat di Istana Negara, Jakarta</span><br />\n<br />\n&nbsp;</div>\n\n<table style=\"margin-left:100px\">\n	<tbody>\n		<tr>\n			<td style=\"vertical-align:top; width:305px\"><span style=\"font-size:11px\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Pakaian :<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Pejabat yang dilantik</strong></span><br />\n			<span style=\"line-height:0.5\"><span style=\"font-size:11px\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Ketua MA&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></span><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: Toga Hakim Agung</span></span><br />\n			<span style=\"line-height:0.5\"><span style=\"font-size:11px\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Hakim Konstitusi&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></span><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: Toga Hakim Konstiusi</span></span></td>\n			<td style=\"vertical-align:top; width:270px\"><span style=\"font-size:11px\"><strong>&nbsp; &nbsp; <span style=\"line-height:1\">&nbsp; &nbsp; &nbsp;</span></strong></span><span style=\"line-height:1\"><span style=\"font-size:11px\"><strong>Tamu undangan&nbsp; :&nbsp;</strong></span><br />\n			<span style=\"font-size:11px\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Pria&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Toga Hakim Agung</span><br />\n			<span style=\"font-size:11px\">&nbsp; &nbsp; &nbsp; &nbsp;<span style=\"line-height:1.2\"> &nbsp;Wanita&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Toga Hakim Konstiusi<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;TNI/POLRI&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: PDU-III</span></span></span></td>\n		</tr>\n	</tbody>\n</table>\n','<div style=\"text-align:center\"><span class=\"monotype\"><span style=\"font-size:16px\"><span style=\"line-height:1\"><strong>MENTERI SEKRETARIS NEGARA</strong></span><br />\n<strong>REPUBLIK INDONESIA</strong></span><br />\nmengharapkan dengan hormat Bapak/Ibu/Saudara<br />\n<span style=\"line-height:1\">pada acara</span></span><br />\n<span style=\"line-height:1.2\"><strong><span style=\"font-size:16px\"><span class=\"monotype\">PENGUCAPAN SUMPAH/JANJ</span>I<br />\nKETUA MAHKAMAH AGUNG</span><br />\n<span style=\"font-size:14px\">dan</span><br />\n<span style=\"font-size:16px\">HAKIM KONSTITUSI</span></strong><br />\n<span style=\"font-size:14px\"><strong>di Hadapan</strong></span><br />\n<span style=\"font-size:18px\"><strong>PRESIDEN REPUBLIK INDONESIA</strong></span><br />\n<br />\n&nbsp;hari kamis, tanggal 30 April 2020, pukul 09.30 WIB<br />\nbertempat di Istana Negara, Jakarta</span><br />\n<br />\n&nbsp;</div>\n\n<table style=\"margin-left:100px\">\n	<tbody>\n		<tr>\n			<td style=\"vertical-align:top; width:305px\"><span style=\"font-size:11px\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Pakaian :<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Pejabat yang dilantik</strong></span><br />\n			<span style=\"line-height:0.5\"><span style=\"font-size:11px\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Ketua MA&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></span><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: Toga Hakim Agung</span></span><br />\n			<span style=\"line-height:0.5\"><span style=\"font-size:11px\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Hakim Konstitusi&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></span><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: Toga Hakim Konstiusi</span></span></td>\n			<td style=\"vertical-align:top; width:270px\"><span style=\"font-size:11px\"><strong>&nbsp; &nbsp; <span style=\"line-height:1\">&nbsp; &nbsp; &nbsp;</span></strong></span><span style=\"line-height:1\"><span style=\"font-size:11px\"><strong>Tamu undangan&nbsp; :&nbsp;</strong></span><br />\n			<span style=\"font-size:11px\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Pria&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Toga Hakim Agung</span><br />\n			<span style=\"font-size:11px\">&nbsp; &nbsp; &nbsp; &nbsp;<span style=\"line-height:1.2\"> &nbsp;Wanita&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Toga Hakim Konstiusi<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;TNI/POLRI&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: PDU-III</span></span></span></td>\n		</tr>\n	</tbody>\n</table>\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(93,'62JTZ',1,1,NULL,'','',NULL,NULL,NULL,NULL,NULL,'wwww','2020-07-11','10:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',28,'2020-07-11 15:37:34',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',1,1,NULL,NULL,NULL,2,'Yth. Bapak/Ibu<br>\nMohon izin menyampaikan Undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.',NULL,'email reschedul',NULL,'',NULL,'emailbatal',NULL,'Selamat….<br>\nYth. Bapak/Ibu<br>\n<br>\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\nAtas perhatiannya kami ucapkan terimakasih<br>\n<br>\nProtokol Kepresidenan<br>\n ',NULL,'Selamat….<br>\nYth. Bapak/Ibu<br>\n<br>\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\nAtas perhatiannya kami ucapkan terimakasih<br>\n<br>\nProtokol Kepresidenan',NULL,'',NULL,'Selamat….<br>\nYth. Bapak/Ibu<br>\n<br>\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\nAtas perhatiannya kami ucapkan terimakasih<br>\n<br>\nProtokol Kepresidenan',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(94,'EHT6B',3,5,NULL,NULL,'ssss',NULL,NULL,NULL,NULL,NULL,NULL,'2020-07-12','10:00','Istana Negara, Jakarta',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',28,'2020-07-12 08:47:21',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',NULL,1,NULL,NULL,NULL,0,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,NULL,NULL,NULL,NULL,'{\"1\":\"1\"}',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(95,'3TE4M',3,5,NULL,NULL,'ddd',NULL,NULL,NULL,NULL,NULL,NULL,'2020-07-12','10:00','Istana Negara, Jakarta',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',28,'2020-07-12 08:48:13',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',NULL,1,NULL,NULL,NULL,0,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,NULL,NULL,NULL,NULL,'{\"1\":\"1\"}',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(96,'HM78T',3,5,NULL,NULL,'d',NULL,NULL,NULL,NULL,NULL,NULL,'2020-07-15','10:00','Istana Negara, Jakarta',NULL,NULL,'','','',NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',28,'2020-07-12 08:56:58',28,'2020-07-13 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',1,1,NULL,NULL,NULL,0,'Yth. Bapak/Ibu<br>\nMohon izin menyampaikan Undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.',NULL,'email reschedul',NULL,'',NULL,'emailbatal',NULL,'Selamat….<br>\nYth. Bapak/Ibu<br>\n<br>\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\nAtas perhatiannya kami ucapkan terimakasih<br>\n<br>\nProtokol Kepresidenan<br>\n ',NULL,'Selamat….<br>\nYth. Bapak/Ibu<br>\n<br>\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\nAtas perhatiannya kami ucapkan terimakasih<br>\n<br>\nProtokol Kepresidenan',NULL,'',NULL,'Selamat….<br>\nYth. Bapak/Ibu<br>\n<br>\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\nAtas perhatiannya kami ucapkan terimakasih<br>\n<br>\nProtokol Kepresidenan',NULL,NULL,NULL,NULL,NULL,'{\"2\":\"2\"}',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(97,'LWGJZ',4,3,NULL,NULL,'tes senin','','',NULL,NULL,NULL,NULL,'2020-07-17','23:55','Istana Negara, Jakarta',NULL,NULL,'','','',NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',28,'2020-07-12 10:57:57',28,'2020-07-15 11:33:23',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',13,1,NULL,NULL,NULL,0,'Yth. Bapak/Ibu<br>\nMohon izin menyampaikan Undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.',NULL,'email reschedul',NULL,'',NULL,'emailbatal',NULL,'Selamat….<br>\nYth. Bapak/Ibu<br>\n<br>\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\nAtas perhatiannya kami ucapkan terimakasih<br>\n<br>\nProtokol Kepresidenan<br>\n ',NULL,'Selamat….<br>\nYth. Bapak/Ibu<br>\n<br>\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\nAtas perhatiannya kami ucapkan terimakasih<br>\n<br>\nProtokol Kepresidenan',NULL,'',NULL,'Selamat….<br>\nYth. Bapak/Ibu<br>\n<br>\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\nAtas perhatiannya kami ucapkan terimakasih<br>\n<br>\nProtokol Kepresidenan',NULL,NULL,NULL,NULL,NULL,'{\"1\":\"1\"}',NULL,NULL,NULL,NULL,NULL,'','','','','','','','Oleh',NULL,'<div style=\"text-align:center\"><span class=\"monotype\"><span style=\"font-size:16px\"><strong>MENTERI SEKRETARIS NEGARA REPUBLIK INDONESIA</strong></span><br />\ndan<br />\n<span style=\"font-size:16px\"><strong>Panglima Tentara Nasional Indonesia</strong></span><br />\nserta<br />\n<span style=\"font-size:16px\"><strong>Kepala Kepolisian Negara Republik Indonesia<br />\nmengharapkan dengan hormat kehadiran Bapak/Ibu/Saudara</strong></span><br />\npada upacara<br />\n<span style=\"font-size:16px\"><strong>Prasetya Perwira TNI-POLRI 2020</strong></span><br />\noleh<br />\n<span style=\"font-size:18px\"><strong>Presiden Republik Indonesia</strong></span><br />\n&nbsp;hari selasa, tanggal 14 Juli 2020, pukul 08.30 WIB<br />\nbertempat di Istana Negara, Jakarta</span></div>\n\n<table style=\"margin-left:100px\">\n	<tbody>\n		<tr>\n			<td style=\"vertical-align:top; width:305px\"><span style=\"font-size:11px\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </strong></span><span style=\"font-size:9px\"><strong>&nbsp; &nbsp;-&nbsp;&nbsp;</strong>Harap hadir pukul ..... WIB sebelum acara dimulai<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; untuk melaksanakan Rapid Test di ruang tunggu 05<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; dan undangan haraf dibawa<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;-&nbsp; Undangan berlaku satu orang dan tidak dapat diwakilkan<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; untuk taruna yang akan dilantik dan tamu undangan<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; wajib menggunakan masker kain<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; -&nbsp; &nbsp;Harap jawaban telepon melalui :<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Sekretariat Akademi TNI<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Telp. (021-871864/48), (021-8452812) pwd: 1102&nbsp;<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Sekretarian Akademi Kepolisian<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Telp. (024-8310074)</span></td>\n			<td style=\"vertical-align:top; width:270px\"><span style=\"font-size:11px\"><strong>&nbsp; &nbsp;</strong></span><br />\n			<br />\n			<span style=\"font-size:10px\"><strong><span style=\"line-height:1\">&nbsp; &nbsp; &nbsp; </span></strong></span><span style=\"font-size:9px\"><strong><span style=\"line-height:1\">&nbsp; </span></strong><span style=\"line-height:1\"><strong>Tamu undangan&nbsp; :&nbsp;</strong><br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Pria&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : PSL / Daerah<br />\n			&nbsp; &nbsp; &nbsp; &nbsp;<span style=\"line-height:1.2\"> &nbsp;Wanita&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Pakaian Nasioanal / Daerah<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;TNI/POLRI&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: PDU-III</span></span></span></td>\n		</tr>\n	</tbody>\n</table>\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(98,'96HCM',1,1,NULL,'Undangan Rapat Koordinasi','semangat',NULL,NULL,NULL,NULL,NULL,'T2345UI','2020-07-13','10:00','Ruang Rapat Kepala Sekretariat Presiden, Lt. 1, Jl. Veteran No. 16 Jakarta Pusat ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',28,'2020-07-13 20:13:21',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',1,1,NULL,NULL,NULL,2,'Yth. Bapak/Ibu<br>\nMohon izin menyampaikan Undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.',NULL,'email reschedul',NULL,'',NULL,'emailbatal',NULL,'Selamat….<br>\nYth. Bapak/Ibu<br>\n<br>\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\nAtas perhatiannya kami ucapkan terimakasih<br>\n<br>\nProtokol Kepresidenan<br>\n ',NULL,'Selamat….<br>\nYth. Bapak/Ibu<br>\n<br>\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\nAtas perhatiannya kami ucapkan terimakasih<br>\n<br>\nProtokol Kepresidenan',NULL,'',NULL,'Selamat….<br>\nYth. Bapak/Ibu<br>\n<br>\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\nAtas perhatiannya kami ucapkan terimakasih<br>\n<br>\nProtokol Kepresidenan',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(99,'DBCTZ',4,3,NULL,NULL,'<h2 xss=removed>sdsdsd</h2>\n','','',NULL,NULL,NULL,NULL,'2020-07-24','10:00','Istana Negara, Jakarta',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',28,'2020-07-19 12:21:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',33,1,NULL,NULL,NULL,0,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,NULL,NULL,NULL,NULL,'{\"1\":\"1\"}',NULL,NULL,NULL,NULL,NULL,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(100,'13JUW',2,2,NULL,NULL,'sdsd',NULL,NULL,'sd','sd',NULL,NULL,'2020-07-31','12:00','Istana Kepresidenan Bogor',NULL,NULL,'','','','','','',NULL,28,'2020-07-19 12:23:59',28,'2020-07-19 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',3,1,NULL,NULL,NULL,0,'Yth. Bapak/Ibu<br>\nMohon izin menyampaikan Undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.','','','',NULL,NULL,'','','','','','','','','','','ssdd','sd',NULL,NULL,'{\"1\":\"1\"}','Hj. Iriana Joko Widodo','Mrs. Iriana Joko Widodo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(101,'SRXPJ',3,5,NULL,NULL,'ddd',NULL,NULL,NULL,NULL,NULL,NULL,'2020-07-19','10:00','Istana Negara, Jakarta',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',28,'2020-07-19 17:41:24',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',12,1,NULL,NULL,NULL,0,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,NULL,NULL,NULL,NULL,'{\"1\":\"1\"}',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(102,'W7REN',5,6,NULL,NULL,'sss',NULL,NULL,NULL,NULL,NULL,NULL,'2020-07-19','10:00','Istana Negara, Jakarta',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',28,'2020-07-19 17:41:50',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',3,1,NULL,NULL,NULL,0,' <br>\nYth. Bapak/Ibu<br>\nMohon izin menyampaikan Undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.<br>\n ',NULL,'&nbsp;<br>\nYth. Bapak/Ibu<br>\nMohon izin menyampaikan Penundaan waktu acara undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.<br>\n ',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,NULL,NULL,NULL,NULL,'null',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(103,'LCF4Z',1,1,NULL,'Undangan Rapat Koordinasi','sss',NULL,NULL,NULL,NULL,NULL,'sss','2020-07-19','10:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',28,'2020-07-19 17:46:17',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',12,1,NULL,NULL,NULL,2,'Yth. Bapak/Ibu<br>\nMohon izin menyampaikan Undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.',NULL,'email reschedul',NULL,'',NULL,'emailbatal',NULL,'Selamat….<br>\nYth. Bapak/Ibu<br>\n<br>\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\nAtas perhatiannya kami ucapkan terimakasih<br>\n<br>\nProtokol Kepresidenan<br>\n ',NULL,'Selamat….<br>\nYth. Bapak/Ibu<br>\n<br>\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\nAtas perhatiannya kami ucapkan terimakasih<br>\n<br>\nProtokol Kepresidenan',NULL,'',NULL,'Selamat….<br>\nYth. Bapak/Ibu<br>\n<br>\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\nAtas perhatiannya kami ucapkan terimakasih<br>\n<br>\nProtokol Kepresidenan',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(104,'64T7C',4,4,NULL,NULL,'ssss','','',NULL,NULL,NULL,NULL,'2020-08-13','10:00','Istana Negara, Jakarta',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',28,'2020-07-26 16:17:39',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',2,1,NULL,NULL,NULL,0,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,NULL,NULL,NULL,NULL,'{\"1\":\"1\"}',NULL,NULL,NULL,NULL,NULL,'','','','','','',NULL,NULL,NULL,'<div style=\"text-align:center\"><span class=\"monotype\"><span style=\"font-size:16px\"><strong>MENTERI SEKRETARIS NEGARA REPUBLIK INDONESIA</strong></span><br />\ndan<br />\n<span style=\"font-size:16px\"><strong>Panglima Tentara Nasional Indonesia</strong></span><br />\nserta<br />\n<span style=\"font-size:16px\"><strong>Kepala Kepolisian Negara Republik Indonesia<br />\nmengharapkan dengan hormat kehadiran Bapak/Ibu/Saudara</strong></span><br />\npada upacara<br />\n<span style=\"font-size:16px\"><strong>Prasetya Perwira TNI-POLRI 2020</strong></span><br />\noleh<br />\n<span style=\"font-size:18px\"><strong>Presiden Republik Indonesia</strong></span><br />\n&nbsp;hari selasa, tanggal 14 Juli 2020, pukul 08.30 WIB<br />\nbertempat di Istana Negara, Jakarta</span></div>\n\n<table style=\"margin-left:100px\">\n	<tbody>\n		<tr>\n			<td style=\"vertical-align:top; width:305px\"><span style=\"font-size:11px\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </strong></span><span style=\"font-size:9px\"><strong>&nbsp; &nbsp;-&nbsp;&nbsp;</strong>Harap hadir pukul ..... WIB sebelum acara dimulai<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; untuk melaksanakan Rapid Test di ruang tunggu 05<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; dan undangan haraf dibawa<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;-&nbsp; Undangan berlaku satu orang dan tidak dapat diwakilkan<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; untuk taruna yang akan dilantik dan tamu undangan<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; wajib menggunakan masker kain<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; -&nbsp; &nbsp;Harap jawaban telepon melalui :<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Sekretariat Akademi TNI<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Telp. (021-871864/48), (021-8452812) pwd: 1102&nbsp;<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Sekretarian Akademi Kepolisian<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Telp. (024-8310074)</span></td>\n			<td style=\"vertical-align:top; width:270px\"><span style=\"font-size:11px\"><strong>&nbsp; &nbsp;</strong></span><br />\n			<br />\n			<span style=\"font-size:10px\"><strong><span style=\"line-height:1\">&nbsp; &nbsp; &nbsp; </span></strong></span><span style=\"font-size:9px\"><strong><span style=\"line-height:1\">&nbsp; </span></strong><span style=\"line-height:1\"><strong>Tamu undangan&nbsp; :&nbsp;</strong><br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Pria&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : PSL / Daerah<br />\n			&nbsp; &nbsp; &nbsp; &nbsp;<span style=\"line-height:1.2\"> &nbsp;Wanita&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Pakaian Nasioanal / Daerah<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;TNI/POLRI&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: PDU-III</span></span></span></td>\n		</tr>\n	</tbody>\n</table>\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(105,'B45CL',5,6,NULL,NULL,'ddd',NULL,NULL,NULL,NULL,NULL,NULL,'2020-08-14','10:00','Istana Negara, Jakarta',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',28,'2020-07-26 16:24:38',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',1,1,NULL,NULL,NULL,0,' <br>\nYth. Bapak/Ibu<br>\nMohon izin menyampaikan Undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.<br>\n ',NULL,'&nbsp;<br>\nYth. Bapak/Ibu<br>\nMohon izin menyampaikan Penundaan waktu acara undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.<br>\n ',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,NULL,NULL,NULL,NULL,'{\"1\":\"1\"}',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(106,'EBYVC',3,5,NULL,NULL,'dddd',NULL,NULL,NULL,NULL,NULL,NULL,'2020-09-18','10:00','Istana Negara, Jakarta',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',28,'2020-07-26 16:26:42',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',1,1,NULL,NULL,NULL,0,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,NULL,NULL,NULL,NULL,'{\"1\":\"1\"}',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(107,'J4AKM',1,1,NULL,'Undangan Rapat Koordinasi','semangat',NULL,NULL,NULL,NULL,NULL,'T2345UI','2020-09-18','10:00','Ruang Rapat Kepala Sekretariat Presiden, Lt. 1, Jl. Veteran No. 16 Jakarta Pusat ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',28,'2020-07-26 16:31:04',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',2,1,NULL,NULL,NULL,2,'Yth. Bapak/Ibu<br>\nMohon izin menyampaikan Undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.',NULL,'email reschedul',NULL,'',NULL,'emailbatal',NULL,'Selamat….<br>\nYth. Bapak/Ibu<br>\n<br>\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\nAtas perhatiannya kami ucapkan terimakasih<br>\n<br>\nProtokol Kepresidenan<br>\n ',NULL,'Selamat….<br>\nYth. Bapak/Ibu<br>\n<br>\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\nAtas perhatiannya kami ucapkan terimakasih<br>\n<br>\nProtokol Kepresidenan',NULL,'',NULL,'Selamat….<br>\nYth. Bapak/Ibu<br>\n<br>\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\nAtas perhatiannya kami ucapkan terimakasih<br>\n<br>\nProtokol Kepresidenan',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(108,'QBV8K',5,6,NULL,NULL,'resss',NULL,NULL,NULL,NULL,NULL,NULL,'2020-08-14','10:00','Istana Negara, Jakarta',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',28,'2020-08-12 11:30:50',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',1,1,NULL,NULL,NULL,0,' <br>\nYth. Bapak/Ibu<br>\nMohon izin menyampaikan Undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.<br>\n ',NULL,'&nbsp;<br>\nYth. Bapak/Ibu<br>\nMohon izin menyampaikan Penundaan waktu acara undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.<br>\n ',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,NULL,NULL,NULL,NULL,'{\"1\":\"1\"}',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(109,'AV64F',2,2,NULL,NULL,'ddd',NULL,NULL,'ddd','dd',NULL,NULL,'2020-08-13','12:00','Istana Kepresidenan Bogor',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,28,'2020-08-13 10:51:46',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',1,1,NULL,NULL,NULL,0,'Yth. Bapak/Ibu<br>\nMohon izin menyampaikan Undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.','','','',NULL,NULL,'','','','','','','','','','','d','d',NULL,NULL,'{\"1\":\"1\"}','Hj. Iriana Joko Widodo','Mrs. Iriana Joko Widodo','[]',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(110,'YZT84',4,3,NULL,NULL,'dddd','','',NULL,NULL,NULL,NULL,'2020-08-25','10:00','Istana Negara, Jakarta',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',28,'2020-08-25 08:23:11',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',1,1,NULL,NULL,NULL,0,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,NULL,NULL,NULL,NULL,'{\"1\":\"1\"}',NULL,NULL,NULL,NULL,NULL,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(114,'PEJM7',1,1,NULL,'Undangan Rapat Koordinasi','TASYAKUR INDONESIA TERANG',NULL,NULL,NULL,NULL,NULL,'dddd','2020-09-30','10:00','Ruang Rapat Kepala Sekretariat Presiden, Lt. 1, Jl. Veteran No. 16 Jakarta Pusat ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',28,'2020-09-24 08:27:07',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',37,1,NULL,NULL,NULL,2,'Yth. Bapak/Ibu<br>\r\nMohon izin menyampaikan Undangan dengan agenda <strong>{agenda}</strong><br>\r\nHari,tanggal: {tgl}<br>\r\nPKL: {jam} WIB<br>\r\nAgenda: {agenda}<br>\r\nTempat Rapat: {tempat}<br>\r\nCtt:<br>\r\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\r\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\r\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\r\ndemikian,<br>\r\nTerima kasih Protokol Kepresidenan.',NULL,'email reschedul',NULL,'',NULL,'emailbatal',NULL,'Selamat….<br>\r\nYth. Bapak/Ibu<br>\r\n<br>\r\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\r\nAtas perhatiannya kami ucapkan terimakasih<br>\r\n<br>\r\nProtokol Kepresidenan<br>\r\n ',NULL,'Selamat….<br>\r\nYth. Bapak/Ibu<br>\r\n<br>\r\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\r\nAtas perhatiannya kami ucapkan terimakasih<br>\r\n<br>\r\nProtokol Kepresidenan',NULL,'',NULL,'Selamat….<br>\r\nYth. Bapak/Ibu<br>\r\n<br>\r\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\r\nAtas perhatiannya kami ucapkan terimakasih<br>\r\n<br>\r\nProtokol Kepresidenan',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'/files/2020/PEJM7/surat_undangan.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(115,'69SFE',2,2,NULL,NULL,'Grand opening',NULL,NULL,'a State Luncheon','Presiden Republik china',NULL,NULL,'2020-09-30','12:00','Istana Kepresidenan Bogor',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,28,'2020-09-26 17:02:07',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',2,1,NULL,NULL,NULL,0,'Yth. Bapak/Ibu<br>\nMohon izin menyampaikan Undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.','','','',NULL,NULL,'','','','','','','','','','','Yang Mulia Murica','Nyonya julana awada',NULL,NULL,'null','Hj. Iriana Joko Widodo','Mrs. Iriana Joko Widodo','[{\"id\":\"\"}]',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(116,'E5D4M',4,3,NULL,NULL,'oj','','',NULL,NULL,NULL,NULL,'2020-09-30','10:00','Istana Negara, Jakarta',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',28,'2020-09-27 09:24:57',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',NULL,1,NULL,NULL,NULL,0,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,NULL,NULL,NULL,NULL,'null',NULL,NULL,NULL,NULL,NULL,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(117,'YZ4Q1',3,5,NULL,NULL,'yyyyy',NULL,NULL,NULL,NULL,NULL,NULL,'2020-09-30','10:00','Istana Negara, Jakarta',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',28,'2020-09-27 09:35:08',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',NULL,1,NULL,NULL,NULL,0,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,NULL,NULL,NULL,NULL,'{\"1\":\"1\"}',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(118,'51KUD',3,5,NULL,NULL,'mamingan',NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-30','10:00','Istana Negara, Jakarta',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',28,'2020-10-09 18:16:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',NULL,1,NULL,NULL,NULL,0,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,NULL,NULL,NULL,NULL,'{\"1\":\"1\"}',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(119,'6KIGJ',4,3,NULL,NULL,'PENYERAHAN DAFTAR ISIAN PELAKSANAAN ANGGARAN (DIPA) DAN BUKU DAFTAR ALOKASI TRANSFER<br>\nKE DAERAH DAN DANA DESA TAHUN 2021','','',NULL,NULL,NULL,NULL,'2020-11-25','10:00','Istana Negara, Jakarta',NULL,NULL,'','','',NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',28,'2020-11-25 11:01:58',28,'2020-11-25 11:04:52',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',3,1,NULL,NULL,NULL,0,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,NULL,NULL,NULL,NULL,'{\"1\":\"1\"}',NULL,NULL,'[{\"id\":\"\"}]',NULL,NULL,'','','','','','','','Oleh',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(121,'235QM',4,4,NULL,NULL,'tes PT','','',NULL,NULL,NULL,NULL,'2020-11-02','10:00','Istana Negara, Jakarta',NULL,NULL,'','','',NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',28,'2020-11-29 05:57:31',28,'2020-12-10 22:18:12',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',95,1,NULL,NULL,NULL,0,'{nama}&nbsp;<br>\n{email}<br>\nsilahkan{link}<br>\n(link) KLIK DISINI(unlink)',NULL,'',NULL,'',NULL,'',NULL,'wa',NULL,'',NULL,'',NULL,'',NULL,NULL,NULL,NULL,NULL,'{\"1\":\"1\"}',NULL,NULL,'[{\"id\":\"\"},{\"id\":\"\"}]',NULL,NULL,'','','','','','','','Oleh',NULL,'<div style=\"text-align:center\"><span class=\"monotype\"><span style=\"font-size:16px\"><strong>MENTERI SEKRETARIS NEGARA REPUBLIK INDONESIA</strong></span><br />\ndan<br />\n<span style=\"font-size:16px\"><strong>Panglima Tentara Nasional Indonesia</strong></span><br />\nserta<br />\n<span style=\"font-size:16px\"><strong>Kepala Kepolisian Negara Republik Indonesia<br />\nmengharapkan dengan hormat kehadiran Bapak/Ibu/Saudara</strong></span><br />\npada upacara<br />\n<span style=\"font-size:16px\"><strong>Prasetya Perwira TNI-POLRI 2020</strong></span><br />\noleh<br />\n<span style=\"font-size:18px\"><strong>Presiden Republik Indonesia</strong></span><br />\n&nbsp;hari selasa, tanggal 14 Juli 2020, pukul 08.30 WIB<br />\nbertempat di Istana Negara, Jakarta</span></div>\n\n<table style=\"margin-left:100px\">\n	<tbody>\n		<tr>\n			<td style=\"vertical-align:top; width:305px\"><span style=\"font-size:11px\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </strong></span><span style=\"font-size:9px\"><strong>&nbsp; &nbsp;-&nbsp;&nbsp;</strong>Harap hadir pukul ..... WIB sebelum acara dimulai<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; untuk melaksanakan Rapid Test di ruang tunggu 05<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; dan undangan haraf dibawa<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;-&nbsp; Undangan berlaku satu orang dan tidak dapat diwakilkan<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; untuk taruna yang akan dilantik dan tamu undangan<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; wajib menggunakan masker kain<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; -&nbsp; &nbsp;Harap jawaban telepon melalui :<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Sekretariat Akademi TNI<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Telp. (021-871864/48), (021-8452812) pwd: 1102&nbsp;<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Sekretarian Akademi Kepolisian<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Telp. (024-8310074)</span></td>\n			<td style=\"vertical-align:top; width:270px\"><span style=\"font-size:11px\"><strong>&nbsp; &nbsp;</strong></span><br />\n			<br />\n			<span style=\"font-size:10px\"><strong><span style=\"line-height:1\">&nbsp; &nbsp; &nbsp; </span></strong></span><span style=\"font-size:9px\"><strong><span style=\"line-height:1\">&nbsp; </span></strong><span style=\"line-height:1\"><strong>Tamu undangan&nbsp; :&nbsp;</strong><br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Pria&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : PSL / Daerah<br />\n			&nbsp; &nbsp; &nbsp; &nbsp;<span style=\"line-height:1.2\"> &nbsp;Wanita&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Pakaian Nasioanal / Daerah<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;TNI/POLRI&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: PDU-III</span></span></span></td>\n		</tr>\n	</tbody>\n</table>\n',NULL,'[\"1\",\"2\"]','redaksi 1','{\"wa\":\"wa\",\"subject\":\"redaksi 1\",\"email\":\"{nama}&nbsp;<br>\\n{email}<br>\\nsilahkan{link}<br>\\n(link) KLIK DISINI(unlink)\"}','{\"wa\":\"wa\",\"subject\":\"redaksi 2\",\"email\":\"{nama}&nbsp;<br>\\n{email}<br>\\nsilahkan{link}<br>\\n(link) KLIK DISINI(unlink)\"}','{\"wa\":\"wa 3\",\"subject\":\"redaksi 3\",\"email\":\"{nama}\\u00a0<br>\\n{email}<br>\\nsilahkan{link}<br>\\n(link) KLIK DISINI(unlink)\"}','v1','{\"wa\":\"whatsapp undangan 1\",\"subject\":\"subjext undnagan 1\",\"email\":\"email undangan 1\",\"file\":\"9729_IMG_2562.JPG\"}','{\"wa\":\"whatsapp undangan 1\",\"subject\":\"subjext undnagan 1\",\"email\":\"email undangan 1\",\"file\":\"9729_IMG_2562.JPG\"}','{\"wa\":\"wa ke 2\",\"subject\":\"s 2\",\"email\":\"e 2\",\"file\":\"9417_alasam.JPG\"}','{\"wa\":\"konten 3\",\"subject\":\"sub 3\",\"email\":\"email 3\",\"file\":\"9816_ss.pdf\"}','v1','{\"wa\":\"sert 1\",\"subject\":\"s 1\",\"email\":\"sert 1\",\"file\":\"2348_1_MN3THT31eFOuEM6pnZMugw.jpeg\"}','{\"wa\":\"sert 1\",\"subject\":\"s 1\",\"email\":\"sert 1\",\"file\":\"2348_1_MN3THT31eFOuEM6pnZMugw.jpeg\"}','{\"wa\":\"okeyy 2\",\"subject\":\"versi 2...\",\"email\":\"versi...! 2\",\"file\":\"5294_1d750c7257f3918e65df2f05eb18aa32.jpg\"}','{\"wa\":\"33\",\"subject\":\"33\",\"email\":\"333\",\"file\":\"7112_img201808171512421.jpg\"}','v1',2,NULL),
(123,'6FQHG',4,3,NULL,NULL,'GELADI PELAKSANAAN PELANTIKAN, PEJABAT FUNGSIONAL, ADMINISTRATOR DAN PENGAWAS DI LINGKUNGAN KEMENSETNEG SESI 2GELADI PELAKSANAAN PELANTIKAN, PEJABAT FUNGSIONAL, ADMINISTRATOR DAN PENGAWAS DI LINGKUNGAN KEMENSETNEG SESI 2','','',NULL,NULL,NULL,NULL,'2020-12-23','10:00','Istana Negara, Jakarta',NULL,NULL,'','','',NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',28,'2020-12-09 15:32:17',28,'2020-12-21 15:08:29',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',15,1,NULL,NULL,NULL,0,'versi 3mail',NULL,'',NULL,'',NULL,'',NULL,'versi 3',NULL,'',NULL,'',NULL,'',NULL,NULL,NULL,NULL,NULL,'{\"1\":\"1\"}',NULL,NULL,'[{\"id\":\"\"}]','',NULL,'','','','','','',NULL,NULL,NULL,NULL,NULL,'[\"1\",\"2\"]','versi 3','{\"wa\":\"versi 1 wa\",\"subject\":\"versi 1 subject\",\"email\":\"versi 1 email\",\"file\":\"\"}','{\"wa\":\"versi 2\",\"subject\":\"versi 2\",\"email\":\"versi 2\",\"file\":\"\"}','{\"wa\":\"versi 3\",\"subject\":\"versi 3\",\"email\":\"versi 3mail\",\"file\":\"\"}','v3','{\"wa\":\"wa:1\",\"subject\":\"1\",\"email\":\"email:1\",\"file\":\"7781_2018-kia-rio-gt-line.jpg\"}','{\"wa\":\"wa:1\",\"subject\":\"1\",\"email\":\"email:1\",\"file\":\"7781_2018-kia-rio-gt-line.jpg\"}','{\"wa\":\"wa: 2\",\"subject\":\"s:2\",\"email\":\"email:2\",\"file\":\"\"}','{\"wa\":\"wa3\",\"subject\":\"wa3\",\"email\":\"wa3\",\"file\":\"\"}','v1','{\"wa\":\"wa:2\",\"subject\":\"s:2\",\"email\":\"m:2\",\"file\":\"\"}','{\"wa\":\"wa:1\",\"subject\":\"s:1\",\"email\":\"m:1\",\"file\":\"\"}','{\"wa\":\"wa:2\",\"subject\":\"s:2\",\"email\":\"m:2\",\"file\":\"\"}','{\"wa\":\"wa:3\",\"subject\":\"s:3\",\"email\":\"m:3\",\"file\":\"\"}','v2',2,'5946_hhh.jpeg'),
(126,'426PG',1,1,NULL,'Undangan Rapat Koordinasi','semangat',NULL,NULL,NULL,NULL,NULL,'T2345UI','2020-12-01','10:00','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',28,'2020-12-12 14:55:46',28,'2020-12-21 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',100,1,NULL,NULL,NULL,2,'op op o p op',NULL,'email reschedul',NULL,'',NULL,'emailbatal',NULL,'wa www wa',NULL,'Selamat….<br>\r\nYth. Bapak/Ibu<br>\r\n<br>\r\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\r\nAtas perhatiannya kami ucapkan terimakasih<br>\r\n<br>\r\nProtokol Kepresidenan',NULL,'',NULL,'Selamat….<br>\r\nYth. Bapak/Ibu<br>\r\n<br>\r\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\r\nAtas perhatiannya kami ucapkan terimakasih<br>\r\n<br>\r\nProtokol Kepresidenan',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'[\"1\",\"2\"]','konfirmasi','{\"wa\":\"wa www wa\",\"subject\":\"konfirmasi\",\"email\":\"op op o p op\",\"file\":\"\"}','{\"wa\":\"halo {nama}<br>\\nini\\u00a0tes notif wa rakor vicon<br>\\nlink konfirm {link}<br>\\nlink join {link_join}\",\"subject\":\"ss\",\"email\":\"<strong>Yth.{nama}<br>\\n{jabatan}{instansi}<\\/strong><br>\\n<br>\\nDengan hormat bersama ini kami sampaikan pemberitahuan untuk mohon kehadiran Bapak\\/Ibu\\/Saudara pada acara:<br>\\n<strong>{agenda}<\\/strong><br>\\nHari, tanggal:<strong>{tgl}<\\/strong><br>\\nWaktu: pukul<strong>{jam}WIB<\\/strong><br>\\nTempat:<strong>{tempat}<\\/strong><br>\\n<br>\\n<strong>Catatan:<\\/strong><br>\\n1. Notifikasi ini hanya sebagai pemberitahuan resmi;<br>\\n2. Undangan resmi akan kami kirim\\/dapat diambil di Biro Protokol, Sekretariat Presiden;<br>\\n3. Mohon untuk konfirmasi kehadiran melalui link :<strong>{link}<\\/strong><br>\\n4. Untuk informasi lebih lanjut dapat menghubungi melalui nomor whatsapp:<strong>+6281117081945\\u00a0<br>\\nLink join : (link) klik disini(unlink)<\\/strong>\",\"file\":\"\"}','{\"wa\":\"halo {nama}<br>\\ntes notif wa rakor hadir langsung\",\"subject\":\"null\",\"email\":\"null\",\"file\":\"\"}','v1','{\"wa\":\"ddd        dddd\",\"subject\":\"sss\",\"email\":\"dd            dddd\",\"file\":\"\"}','{\"wa\":\"dd\",\"subject\":\"ss\",\"email\":\"dddgggg\",\"file\":\"8178_avatar.jpg\"}',NULL,'{\"wa\":\"ddd        dddd\",\"subject\":\"sss\",\"email\":\"dd            dddd\",\"file\":\"\"}','v3','{\"wa\":\"\",\"subject\":\"ddd\",\"email\":\"ddd ddd      dd\",\"file\":\"\"}','{\"wa\":\"\",\"subject\":\"ddd\",\"email\":\"ddd ddd      dd\",\"file\":\"\"}',NULL,NULL,'v1',2,'2377_baju.jpg'),
(127,'BAIHN',5,6,NULL,NULL,'ah mantap',NULL,NULL,NULL,NULL,NULL,NULL,'2020-12-31','10:00','Istana Negara, Jakarta',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',28,'2020-12-19 14:55:22',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',2,1,NULL,NULL,NULL,0,' <br>\nYth. Bapak/Ibu<br>\nMohon izin menyampaikan Undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.<br>\n ',NULL,'&nbsp;<br>\nYth. Bapak/Ibu<br>\nMohon izin menyampaikan Penundaan waktu acara undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.<br>\n ',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,NULL,NULL,NULL,NULL,'{\"1\":\"1\"}',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'[\"1\"]',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(128,'7YKDN',5,6,NULL,NULL,'siap',NULL,NULL,NULL,NULL,NULL,NULL,'2020-12-01','10:00','Istana Negara, Jakarta',NULL,NULL,'',NULL,'',NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',28,'2020-12-19 16:10:19',28,'2020-12-21 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',24,1,NULL,NULL,NULL,0,'ndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\n<br>\n ',NULL,'&nbsp;<br>\nYth. Bapak/Ibu<br>\nMohon izin menyampaikan Penundaan waktu acara undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.<br>\n ',NULL,'',NULL,'',NULL,'ddd',NULL,'',NULL,'',NULL,'',NULL,NULL,NULL,NULL,NULL,'{\"1\":\"1\"}',NULL,NULL,NULL,'3419_dada+500gr.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'[\"1\",\"2\"]',' mbfgf','{\"wa\":\"ddd\",\"subject\":\" mbfgf\",\"email\":\"ndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI.\\u00a0Wikipedia<br>\\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI.\\u00a0Wikipedia<br>\\n<br>\\n\\u00a0\",\"file\":\"3419_dada+500gr.jpg\"}',NULL,'{\"wa\":\"okr deh\\n_*siap gass*_\\nmantap\",\"subject\":\" jhjhjh\",\"email\":\"cvbvbcb\",\"file\":\"\"}','v1','{\"wa\":\"\",\"subject\":\"d\",\"email\":\"\",\"file\":\"\"}','{\"wa\":\"eee\",\"subject\":\"eee\",\"email\":\"eee\",\"file\":\"7231_2018-kia-rio-gt-line2.jpg\"}','{\"wa\":\"\",\"subject\":\"d\",\"email\":\"\",\"file\":\"\"}',NULL,'v2',NULL,NULL,NULL,NULL,NULL,2,NULL),
(129,'XSV2B',3,5,NULL,NULL,'sdsdsdsd',NULL,NULL,NULL,NULL,NULL,NULL,'2020-12-09','10:00','Istana Negara, Jakarta',NULL,NULL,'','','',NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',28,'2020-12-19 20:38:44',28,'2020-12-21 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',17,1,NULL,NULL,NULL,0,'ndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\n<br>\n ',NULL,'',NULL,'',NULL,'',NULL,'ddf dfd f',NULL,'',NULL,'',NULL,'',NULL,NULL,NULL,NULL,NULL,'{\"1\":\"1\"}',NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'[\"1\",\"2\"]',' vnbnb','{\"wa\":\"\",\"subject\":\" sddsdsdsdsdsd sddsdd\",\"email\":\"ndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI.\\u00a0Wikipedia<br>\\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI.\\u00a0Wikipedia<br>\\n<br>\\n\\u00a0\",\"file\":\"\"}','{\"wa\":\"fgfgfgfg\",\"subject\":\" vnbnb\",\"email\":\"ndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI.\\u00a0Wikipedia<br>\\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI.\\u00a0Wikipedia<br>\\n<br>\\n\\u00a0\",\"file\":\"\"}','{\"wa\":\"ddf dfd f\",\"subject\":\" vnbnb\",\"email\":\"ndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI.\\u00a0Wikipedia<br>\\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI.\\u00a0Wikipedia<br>\\n<br>\\n\\u00a0\",\"file\":\"\"}','v3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),
(131,'LARQZ',2,2,NULL,NULL,'cvcv',NULL,NULL,'cvcv','cvcvc',NULL,NULL,'2020-12-15','12:00','Istana Kepresidenan Bogor',NULL,NULL,'','','','','','',NULL,28,'2020-12-20 05:47:28',28,'2020-12-20 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',15,1,NULL,NULL,NULL,0,'Yth. Bapak/Ibu<br>\nMohon izin menyampaikan Undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.','','','',NULL,NULL,'','','','','','','','','','','cvcv','cvcv',NULL,NULL,'{\"1\":\"1\"}','Hj. Iriana Joko Widodo','Mrs. Iriana Joko Widodo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'[\"1\",\"2\"]',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(132,'9S2UE',2,2,NULL,NULL,'Jamuan Makan siang',NULL,NULL,'a State Luncheon','cvcvc',NULL,NULL,'2020-12-21','12:00','Istana Kepresidenan Bogor',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,28,'2020-12-21 06:55:26',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',NULL,1,NULL,NULL,NULL,0,'Yth. Bapak/Ibu<br>\nMohon izin menyampaikan Undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.','','','',NULL,NULL,'','','','','','','','','','','Yang Mulia Murica','cvcv',NULL,NULL,'{\"1\":\"1\"}','Hj. Iriana Joko Widodo','Mrs. Iriana Joko Widodo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'[\"1\",\"2\"]',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(133,'5D4PK',1,1,NULL,'Undangan Rapat Koordinasi','Undangan Rapat Koordinasi',NULL,NULL,NULL,NULL,NULL,'T2345UI','2020-12-26','18:55','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',28,'2020-12-25 18:36:32',28,'2020-12-26 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',3,1,NULL,NULL,NULL,2,'',NULL,'email reschedul',NULL,'',NULL,'emailbatal',NULL,'',NULL,'Selamat….<br>\nYth. Bapak/Ibu<br>\n<br>\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\nAtas perhatiannya kami ucapkan terimakasih<br>\n<br>\nProtokol Kepresidenan',NULL,'',NULL,'Selamat….<br>\nYth. Bapak/Ibu<br>\n<br>\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\nAtas perhatiannya kami ucapkan terimakasih<br>\n<br>\nProtokol Kepresidenan',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'[\"1\",\"2\"]','',NULL,NULL,NULL,'v1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),
(134,'DH7CB',4,3,NULL,NULL,'Rapat koordinasi','','',NULL,NULL,NULL,NULL,'2021-01-09','10:00','Istana Negara, Jakarta',NULL,NULL,'','','',NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',28,'2020-12-31 15:09:44',28,'2021-01-07 05:48:22',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',7,1,NULL,NULL,NULL,0,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,NULL,NULL,NULL,NULL,'{\"1\":\"1\"}',NULL,NULL,'[{\"id\":\"\"}]','',NULL,'','','','','','',NULL,NULL,NULL,NULL,NULL,'[\"1\",\"2\"]','',NULL,NULL,NULL,'v1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(135,'A1YJ4',1,1,NULL,'Undangan Rapat Koordinasi','ccc',NULL,NULL,NULL,NULL,NULL,'cc','2021-01-07','10:00','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',28,'2021-01-03 08:06:23',28,'2021-01-07 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',17,1,NULL,NULL,NULL,2,'',NULL,'email reschedul',NULL,'',NULL,'emailbatal',NULL,'',NULL,'Selamat….<br>\nYth. Bapak/Ibu<br>\n<br>\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\nAtas perhatiannya kami ucapkan terimakasih<br>\n<br>\nProtokol Kepresidenan',NULL,'',NULL,'Selamat….<br>\nYth. Bapak/Ibu<br>\n<br>\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\nAtas perhatiannya kami ucapkan terimakasih<br>\n<br>\nProtokol Kepresidenan',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'[\"1\",\"2\"]','',NULL,NULL,NULL,'v2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(136,'M8XVR',2,2,NULL,NULL,'Jamuan Makan Malam',NULL,NULL,'a State Luncheon','Presiden Republik china',NULL,NULL,'2021-01-21','12:00','Istana Kepresidenan Bogor',NULL,NULL,'','','','','','',NULL,28,'2021-01-03 08:11:57',28,'2021-01-08 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',10,1,NULL,NULL,NULL,0,'ndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\n<br>\n ','','','',NULL,NULL,'','','fgfgfgfg','','','','','','','','cvcv','cvcv',NULL,NULL,'null','Hj. Iriana Joko Widodo','Mrs. Iriana Joko Widodo',NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'[\"1\",\"2\"]',' mbfgf','{\"wa\":\"okr deh\\n_*siap gass*_\\nmantap\",\"subject\":\" sds\",\"email\":\"dsdsd\",\"file\":\"\"}','{\"wa\":\"fgfgfgfg\",\"email\":\"ndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI.\\u00a0Wikipedia<br>\\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI.\\u00a0Wikipedia<br>\\n<br>\\n\\u00a0\",\"subject\":\" mbfgf\",\"file\":\"\"}','{\"wa\":\"ddf dfd f\",\"subject\":\" sddsdsdsdsdsd sddsdd\",\"email\":\"ndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI.\\u00a0Wikipedia<br>\\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI.\\u00a0Wikipedia<br>\\n<br>\\n\\u00a0\",\"file\":\"\"}','v2','{\"wa\":\"\",\"subject\":\"\",\"email\":\"\",\"file\":\"\"}',NULL,NULL,NULL,'v1','{\"wa\":\"\",\"subject\":\"e-sertifikat\",\"email\":\"\",\"file\":\"6541_001.jpg\"}','{\"wa\":\"\",\"subject\":\"e-sertifikat\",\"email\":\"\",\"file\":\"6541_001.jpg\"}',NULL,NULL,'v1',0,NULL),
(137,'8YCI3',4,3,NULL,NULL,'ssss','','',NULL,NULL,NULL,NULL,'2021-01-28','10:00','Istana Negara, Jakarta',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',28,'2021-01-25 17:56:34',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',3,1,NULL,NULL,NULL,0,'dgfdg',NULL,'',NULL,'',NULL,'',NULL,'okr deh\n_*siap gass*_\nmantap',NULL,'',NULL,'',NULL,'',NULL,NULL,NULL,NULL,NULL,'{\"1\":\"1\"}',NULL,NULL,NULL,'',NULL,'','','','','','',NULL,NULL,NULL,NULL,NULL,'[\"1\",\"2\"]',' dfgfgdfg','{\"wa\":\"okr deh\\n_*siap gass*_\\nmantap\",\"subject\":\" dfgfgdfg\",\"email\":\"dgfdg\",\"file\":\"\"}','{\"wa\":\"okr deh\\n_*siap gass*_\\nmantap\",\"subject\":\" sdsds\",\"email\":\"dsdsds\",\"file\":\"\"}','{\"wa\":\"fgfgfgfg\",\"subject\":\" sddsdsdsdsdsd sddsdd\",\"email\":\"ndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI.\\u00a0Wikipedia<br>\\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI.\\u00a0Wikipedia<br>\\n<br>\\n\\u00a0\",\"file\":\"\"}','v1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),
(138,'1GUT8',4,3,NULL,NULL,'xxx','','',NULL,NULL,NULL,NULL,'2021-03-11','10:00','Istana Negara, Jakarta',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',28,'2021-03-05 16:17:14',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'00:00',27,1,NULL,NULL,NULL,0,'ndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\n<br>\n ',NULL,'',NULL,'',NULL,'',NULL,'okr deh\n_*siap gass*_\nmantap',NULL,'',NULL,'',NULL,'',NULL,NULL,NULL,NULL,NULL,'{\"1\":\"1\"}',NULL,NULL,NULL,'',NULL,'','','','','','',NULL,NULL,NULL,NULL,NULL,'[\"1\"]',' sddsdsdsdsdsd sddsdd','{\"wa\":\"okr deh\\n_*siap gass*_\\nmantap\",\"email\":\"ndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI.\\u00a0Wikipedia<br>\\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI.\\u00a0Wikipedia<br>\\n<br>\\n\\u00a0\",\"subject\":\" sddsdsdsdsdsd sddsdd\",\"file\":\"\"}','{\"wa\":\"okr deh\\n_*siap gass*_\\nmantap\",\"subject\":\" mbfgf\",\"email\":\"ndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI.\\u00a0Wikipedia<br>\\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI.\\u00a0Wikipedia<br>\\n<br>\\n\\u00a0\",\"file\":\"\"}','{\"wa\":\"okr deh\\n_*siap gass*_\\nmantap\",\"email\":\"ndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI.\\u00a0Wikipedia<br>\\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI.\\u00a0Wikipedia<br>\\n<br>\\n\\u00a0\",\"subject\":\" vnbnb\",\"file\":\"\"}','v3','{\"wa\":\"\",\"subject\":\"\",\"email\":\"\",\"file\":\"\"}',NULL,NULL,NULL,'v1',NULL,NULL,NULL,NULL,NULL,0,NULL);

/*Table structure for table `data_broadcast` */

DROP TABLE IF EXISTS `data_broadcast`;

CREATE TABLE `data_broadcast` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject` text,
  `konten` text,
  `real` text,
  `type` tinyint(4) DEFAULT '1' COMMENT '1=email 2=wa',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `data_broadcast` */

insert  into `data_broadcast`(`id`,`subject`,`konten`,`real`,`type`) values 
(4,'whatsapp','okr deh\n_*siap gass*_\nmantap','okr deh<br>\n<strong>siap gass</strong><br>\nmantap',2),
(5,'whatsapp','fgfgfgfg','fgfgfgfg',2),
(6,'whatsapp','ddf dfd f','ddf dfd f',2),
(7,'whatsapp','mantap','mantap',2),
(8,'cepi cahyana','dfdfdf<br>\n<strong>dfdfdfeeddd</strong>','dfdfdf<br>\n<strong>dfdfdfeeddd</strong>',1),
(9,' sdsds','dsdsds','dsdsds',1),
(10,' sds','dsdsd','dsdsd',1),
(11,' sdfgfdg','fgfdgfdg','fgfdgfdg',1),
(12,' dfgfgdfg','dgfdg','dgfdg',1),
(13,' mbbnbn','fgfgfg','fgfgfg',1),
(14,' zxcxzc','vbvbvb','vbvbvb',1),
(15,' jhjhjh','cvbvbcb','cvbvbcb',1),
(16,' 4tggfg','fgfg5gfg','fgfg5gfg',1),
(17,' mbfgf','ndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\n<br>\n ','ndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\n<br>\n ',1),
(18,' vnbnb','ndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\n<br>\n ','ndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\n<br>\n ',1),
(19,' sddsdsdsdsdsd sddsdd','ndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\n<br>\n ','ndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\nndeks Harga Saham Global merupakan salah satu indeks pasar saham yang digunakan oleh Bursa Efek Indonesia. IHSG diperkenalkan pertama kali pada tanggal 1 April 1983 sebagai indikator pergerakan harga saham di BEJ. Indeks ini mencakup pergerakan harga seluruh saham biasa dan saham preferen yang tercatat di BEI. Wikipedia<br>\n<br>\n ',1);

/*Table structure for table `data_file` */

DROP TABLE IF EXISTS `data_file`;

CREATE TABLE `data_file` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode_acara` varchar(50) DEFAULT NULL,
  `kode_qr` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `file` varchar(150) DEFAULT NULL,
  `type` tinyint(4) DEFAULT '1' COMMENT '1=bahan materi 2=hasil',
  `_ctime` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

/*Data for the table `data_file` */

insert  into `data_file`(`id`,`kode_acara`,`kode_qr`,`nama`,`file`,`type`,`_ctime`) values 
(1,'R3FNX','R3FNX-ZK028','Deni portal','files/2020/R3FNX/file/R3FNX___01072020023425.jpg',1,NULL),
(2,'NCMBW','NCMBW-HI022','Ujang','files/2020/NCMBW/file/NCMBW___01072020025128.jpg',1,NULL),
(3,'VLEBK','VLEBK-KX028','file','files/2020/VLEBK/file/VLEBK___01072020111833.xlsx',1,NULL),
(4,'IYABF','IYABF-QM033','paparan 1','files/2020/IYABF/file/IYABF___09072020125831.pdf',1,NULL),
(5,'IYABF','IYABF-QM033','qqqqqqqq','files/2020/IYABF/file/IYABF___09072020130950.pdf',1,NULL),
(6,'VLEBK','VLEBK-ZN085','bahan','files/2020/VLEBK/file/VLEBK___10072020171056.pdf',1,NULL),
(7,'VLEBK','VLEBK-ZN085','bahan 2','files/2020/VLEBK/file/VLEBK___10072020171452.pdf',1,NULL),
(8,'VLEBK','VLEBK-ZN085','panjang','files/2020/VLEBK/file/VLEBK___10072020171548.pdf',1,NULL),
(16,'H3NJQ','H3NJQ-EJ008','template 1','files/2020/H3NJQ/file/H3NJQ___10072020230450.jpg',1,NULL),
(17,'H3NJQ','H3NJQ-EJ008','template 1','files/2020/H3NJQ/file/H3NJQ___10072020230457.jpg',1,NULL),
(18,'H3NJQ','H3NJQ-EJ008','template 1','files/2020/H3NJQ/file/H3NJQ___10072020230504.jpg',1,NULL),
(19,'H3NJQ','H3NJQ-EJ008','ddd','files/2020/H3NJQ/file/H3NJQ___10072020230512.jpg',1,NULL),
(26,'H3NJQ','H3NJQ-EJ008','template 1','files/2020/H3NJQ/file/H3NJQ___10072020232128.jpg',1,NULL),
(28,'H3NJQ','H3NJQ-BA020','template 1','files/2020/H3NJQ/file/H3NJQ___11072020074210.jpg',1,NULL),
(30,'H3NJQ','H3NJQ-BA020','template 1','files/2020/H3NJQ/file/H3NJQ___11072020074400.jpg',1,NULL),
(32,'RX289','RX289-VI001','template 1','2020/RX289/file/RX289___11072020094727.jpg',1,NULL),
(33,'RX289','RX289-VI001','KOSTGSV','2020/RX289/file/RX289___11072020094742.jpg',1,NULL),
(34,'RX289','RX289-VI001','template 1','2020/RX289/file/RX289___11072020095157.jpg',1,NULL),
(35,'RX289','RX289-VI001','template 1','2020/RX289/file/RX289___11072020095204.png',1,NULL),
(37,'RX289','RX289-VI001','template 1','2020/RX289/file/RX289___11072020095303.xlsx',1,NULL),
(41,'L4RY7','L4RY7-HY001','KOSTGSV','files/2020/L4RY7/file/L4RY7___11072020102539.jpg',1,NULL),
(45,'PEJM7','PEJM7-PZ002','ddd','files/2020/PEJM7/file/PEJM7___24092020192540.jpg',1,NULL),
(46,'426PG','426PG-RJ002','template 1','files/2020/426PG/file/426PG___12122020174902.jpg',1,NULL),
(47,'426PG','426PG-CU050','Cepi Cahyana','files/2020/426PG/file/426PG___15122020151802.jpg',1,NULL),
(49,'426PG','admin','KOSTGSV','files/2020/426PG/file/426PG___26122020165159.png',2,'2020-12-26 16:51:59');

/*Table structure for table `data_group` */

DROP TABLE IF EXISTS `data_group`;

CREATE TABLE `data_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `ket` text,
  `urut` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `data_group` */

insert  into `data_group`(`id`,`nama`,`ket`,`urut`) values 
(4,'PIMPINAN LEMBAGA NEGARA','',NULL),
(5,'LAINNYA',NULL,NULL),
(6,'INSTANSI',NULL,NULL),
(7,'xxxx','',NULL),
(8,'ttttt','',NULL),
(9,'trtrtrt','',NULL),
(10,'werwrewr','',NULL),
(11,'aaa','',NULL);

/*Table structure for table `data_kontak` */

DROP TABLE IF EXISTS `data_kontak`;

CREATE TABLE `data_kontak` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_group` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `instansi` varchar(100) DEFAULT NULL,
  `hp` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `kelompok` varchar(200) DEFAULT NULL COMMENT 'kelompok jabatan',
  `poto` text,
  `urut` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=latin1;

/*Data for the table `data_kontak` */

insert  into `data_kontak`(`id`,`id_group`,`nama`,`jabatan`,`instansi`,`hp`,`email`,`kelompok`,`poto`,`urut`) values 
(18,4,'Bapak H. Bambang Soesatyo, SE., MBA','Ketua Majelis Permusyawaratan Rakyat Republik Indonesia','Ketua MPR','1','123',NULL,NULL,4),
(19,4,'Bapak Dr. H. Ahmad Basarah,MH.','Wakil Ketua Majelis Permusyawaratan Rakyat Republik Indonesia','WAKIL MPR','2','124',NULL,NULL,1),
(20,4,'Bapak H. Ahmad Muzani','Wakil Ketua Majelis Permusyawaratan Rakyat Republik Indonesia','','3','125',NULL,NULL,7),
(21,4,'Ibu Lestari Moerdijat, S.S.,MM.','Wakil Ketua Majelis Permusyawaratan Rakyat Republik Indonesia','','4','126',NULL,'poto___03012021081825.jpg',2),
(22,4,'Bapak H. Jazilul Fawaid, SQ.,MA.','Wakil Ketua Majelis Permusyawaratan Rakyat Republik Indonesia','','5','127',NULL,NULL,6),
(23,4,'Bapak Dr. H. Sjarifuddin Hasan, S.E.,MM.','Wakil Ketua Majelis Permusyawaratan Rakyat Republik Indonesia','','6','128',NULL,NULL,8),
(24,4,'Bapak Dr. H. Muhammad Hidayat Nur Wahid, MA.','Wakil Ketua Majelis Permusyawaratan Rakyat Republik Indonesia','','7','129',NULL,NULL,9),
(25,4,'Bapak Dr. (H.C.) Zulkifli Hasan, SE,MM','Wakil Ketua Majelis Permusyawaratan Rakyat Republik Indonesia','','8','130',NULL,NULL,3),
(26,4,'Bapak H. Arsul Sani, S.H.,M.Si.,Pr.M.','Wakil Ketua Majelis Permusyawaratan Rakyat Republik Indonesia','','9','131',NULL,NULL,11),
(27,4,'Bapak Prof.Dr.Ir. Fadel Muhammad ','Wakil Ketua Majelis Permusyawaratan Rakyat Republik Indonesia','','10','132',NULL,NULL,13),
(28,4,'Ibu Puan Maharani ','Ketua Dewan Perwakilan Rakyat Republik Indonesia','KETUA DPR','11','133',NULL,NULL,5),
(29,4,'Bapak Aziz Syamsuddin ','Wakil Ketua Dewan Perwakilan Rakyat Republik Indonesia','','12','134',NULL,NULL,14),
(30,4,'Bapak Sufmi Dasco Ahmad ','Wakil Ketua Dewan Perwakilan Rakyat Republik Indonesia','','13','135',NULL,NULL,15),
(31,4,'Bapak Muhaimin Iskandar ','Wakil Ketua Dewan Perwakilan Rakyat Republik Indonesia','','14','136',NULL,NULL,16),
(32,4,'Bapak Rachmat Gobel ','Wakil Ketua Dewan Perwakilan Rakyat Republik Indonesia','','15','137',NULL,NULL,17),
(33,4,'Bapak Ir. H. AA. La Nyalla Mahmud Mattalitti ','Ketua Dewan Perwakilan Daerah Republik Indonesia','','16','138',NULL,NULL,19),
(34,4,'Bapak Dr. Nono Sampono, M.Si.','Wakil Ketua Dewan Perwakilan Daerah Republik Indonesia','','17','139',NULL,NULL,12),
(35,4,'Bapak Dr. Mahyudin, S.T., M.M.','Wakil Ketua Dewan Perwakilan Daerah Republik Indonesia','','18','140',NULL,NULL,26),
(36,4,'Bapak Sultan Bakhtiar Najamudin, S.Sos., M.Si.','Wakil Ketua Dewan Perwakilan Daerah Republik Indonesia','','19','141',NULL,NULL,27),
(37,4,'Bapak Dr. Agung Firman Sampurna, CSFA.','Ketua Badan Pemeriksa Keuangan Republik Indonesia','','20','142',NULL,NULL,10),
(38,4,'Bapak Dr. Agus Joko Pramono, M.Acc., Ak., CA., CSFA., CPA.','Wakil Ketua Badan Pemeriksa Keuangan Republik Indonesia','','21','143',NULL,NULL,18),
(39,4,'Bapak Dr. H. M. Syarifuddin, S.H, M.H.','Ketua Mahkamah Agung Republik Indonesia','','22','144',NULL,NULL,20),
(40,4,'Bapak Dr. H. Sunarto, S.H., M.H.','Wakil Ketua Mahkamah Agung Republik Indonesia Bidang Non Yudisial','','23','145',NULL,NULL,24),
(41,4,'Bapak Dr. Anwar Usman, S.H., M.H.','Ketua Mahkamah Konstitusi Republik Indonesia','','24','146',NULL,NULL,21),
(42,4,'Bapak Prof. Dr. Aswanto, S.H., M.Si., DFM. ','Wakil Ketua Mahkamah Konstitusi Republik Indonesia','','25','147',NULL,NULL,22),
(43,4,'Bapak Dr. Jaja Ahmad Jayus, S.H., M.Hum.','Ketua Komisi Yudisial Republik Indonesia','','26','148',NULL,NULL,23),
(44,4,'Bapak Drs. H. Maradaman Harahap, S.H., M.H.','Wakil Ketua Komisi Yudisial Republik Indonesia','','27','149',NULL,NULL,25),
(46,5,'Bapak Dr. H. Ahmad Basarah,MH.','Wakil Ketua Majelis Permusyawaratan Rakyat Republik Indonesia','WAKIL MPR','2','124',NULL,'poto___11122020064116.jpg',6),
(47,5,'Bapak cepicahyana','','Ketua MPR','1','cahyanacepi@gmail.com',NULL,'poto___03012021082411.jpg',1),
(49,5,'Bapak H. Ahmad Muzani','Wakil Ketua Majelis Permusyawaratan Rakyat Republik Indonesia','','3','125',NULL,NULL,5),
(50,5,'Bapak H. Jazilul Fawaid, SQ.,MA.','Wakil Ketua Majelis Permusyawaratan Rakyat Republik Indonesia','','5','127',NULL,NULL,7),
(51,5,'Bapak cepicahyana','','Ketua MPR','1','cahyanacepi@gmail.com',NULL,'poto___03012021082411.jpg',4),
(52,5,'Bapak Sug','programmer','Kepala desa','221288210','cahyanpi@gmail.com',NULL,NULL,3),
(53,5,'Bapak  A','Wakil Ketua Majelis Permusyawaratan Rakyat Republik IndonesiaWakil ','','6','128@mil.com',NULL,'poto___07012021062006.jpg',2),
(54,5,'Bapak Dr. (H.C.) Zulkifli Hasan, SE,MM','Wakil Ketua Majelis Permusyawaratan Rakyat Republik Indonesia','','8','130',NULL,NULL,10),
(55,5,'Bapak Dr. H. Muhammad Hidayat Nur Wahid, MA.','Wakil Ketua Majelis Permusyawaratan Rakyat Republik Indonesia','','7','129',NULL,NULL,8),
(56,5,'Ibu Puan Maharani ','Ketua Dewan Perwakilan Rakyat Republik Indonesia','KETUA DPR','11','133',NULL,NULL,9),
(57,5,'Bapak Aziz Syamsuddin ','Wakil Ketua Dewan Perwakilan Rakyat Republik Indonesia','','12','134',NULL,'poto___10122020224052.jpg',11),
(58,5,'Bapak H. Arsul Sani, S.H.,M.Si.,Pr.M.','Wakil Ketua Majelis Permusyawaratan Rakyat Republik Indonesia','','9','131',NULL,NULL,12),
(59,5,'Bapak Prof.Dr.Ir. Fadel Muhammad ','Wakil Ketua Majelis Permusyawaratan Rakyat Republik Indonesia','','10','132',NULL,NULL,13),
(60,5,'Ibu Lestari Moerdijat, S.S.,MM.','Wakil Ketua Majelis Permusyawaratan Rakyat Republik Indonesia','','4','126',NULL,'poto___11122020082320.jpg',14),
(62,5,'Bapak Sufmi Dasco Ahmad ','Wakil Ketua Dewan Perwakilan Rakyat Republik Indonesia','','13','135',NULL,NULL,15),
(63,5,'Bapak Muhaimin Iskandar ','Wakil Ketua Dewan Perwakilan Rakyat Republik Indonesia','','14','136',NULL,NULL,17),
(64,5,'Bapak Rachmat Gobel ','Wakil Ketua Dewan Perwakilan Rakyat Republik Indonesia','','15','137',NULL,NULL,16),
(65,5,'Bapak Ir. H. AA. La Nyalla Mahmud Mattalitti ','Ketua Dewan Perwakilan Daerah Republik Indonesia','','16','138',NULL,NULL,18),
(66,5,'Bapak Dr. Nono Sampono, M.Si.','Wakil Ketua Dewan Perwakilan Daerah Republik Indonesia','','17','139',NULL,NULL,19),
(67,5,'Bapak Dr. Mahyudin, S.T., M.M.','Wakil Ketua Dewan Perwakilan Daerah Republik Indonesia','','18','140',NULL,NULL,20),
(68,5,'Bapak Sultan Bakhtiar Najamudin, S.Sos., M.Si.','Wakil Ketua Dewan Perwakilan Daerah Republik Indonesia','','19','141',NULL,NULL,21),
(69,5,'Bapak Dr. Agung Firman Sampurna, CSFA.','Ketua Badan Pemeriksa Keuangan Republik Indonesia','','20','142',NULL,NULL,22),
(70,5,'Bapak Dr. Agus Joko Pramono, M.Acc., Ak., CA., CSFA., CPA.','Wakil Ketua Badan Pemeriksa Keuangan Republik Indonesia','','21','143',NULL,NULL,23),
(71,5,'Bapak Dr. H. M. Syarifuddin, S.H, M.H.','Ketua Mahkamah Agung Republik Indonesia','','22','144',NULL,'poto___10122020222910.jpg',25),
(72,5,'Bapak Dr. H. Sunarto, S.H., M.H.','Wakil Ketua Mahkamah Agung Republik Indonesia Bidang Non Yudisial','','23','145',NULL,NULL,26),
(73,5,'Bapak Dr. Anwar Usman, S.H., M.H.','Ketua Mahkamah Konstitusi Republik Indonesia','','24','146',NULL,NULL,24),
(74,5,'Bapak Prof. Dr. Aswanto, S.H., M.Si., DFM. ','Wakil Ketua Mahkamah Konstitusi Republik Indonesia','','25','147',NULL,NULL,27),
(75,5,'Bapak Dr. Jaja Ahmad Jayus, S.H., M.Hum.','Ketua Komisi Yudisial Republik Indonesia','','26','148',NULL,NULL,28),
(76,5,'Bapak Drs. H. Maradaman Harahap, S.H., M.H.','Wakil Ketua Komisi Yudisial Republik Indonesia','','27','149',NULL,NULL,29),
(77,5,'','','kampr','0909','jhjhu@jjh.com',NULL,'poto___03012021065004.jpg',43),
(78,5,'Bapak Sug','programmer','Kepala desa','221288210','cahyanpi@gmail.com',NULL,'poto___15122020170348.jpg',30),
(79,5,'model majalah','om','om','0999999','modemlakk@mail.com',NULL,NULL,31),
(80,5,'','','kadin','08522','sdsd@gmail.com',NULL,'poto___12122020180429.jpg',48),
(81,5,'','','Kepala desa','085221288210','uarmoure@gmail.com',NULL,NULL,42),
(82,5,'cepi cahyana','porgrammer','Dinas Pendidikan','085221288210','cahyanacepi@gmail.com',NULL,'poto___31122020152312.jpeg',44),
(83,5,'','','WAKIL MPR','243343434343434','124@mail.com',NULL,'poto___03012021053744.jpg',45),
(84,5,'Zainurahman herry firmasnyah S,IH Mkk','Zainurahman herry firmasnyah S,IH Mkk','Zainurahman herry firmasnyah S,IH Mkk','088888888888','zaiheryf@gmail.com',NULL,'poto___16122020095646.jpg',32),
(85,5,'','','divi','08683333','sss@gmail.com',NULL,'poto___03012021053757.jpg',49),
(86,5,'Cepi cahyana.SKOM','programmer','instas','085221233333','cahya3nacepi@gmail.com',NULL,NULL,34),
(87,5,'Sistem Informasi','Anggota DPR RI','WAKIL MPR','585555555555','uarmores@gmail.com',NULL,NULL,33),
(88,5,'asasas','asasas','divi','332323232333','utefefd@gmai.com',NULL,NULL,35),
(89,5,'Cepi cahyana','programmer','divi','085221288244','cahyffffanacepi@gmail.com',NULL,NULL,37),
(90,5,'Cepi cahyana','programmer','CV. DIVISION IT','085511111111','cahyanacepi@gmail.com',NULL,'poto___16122020214026.png',38),
(91,5,'DIAN','OPR','DINKES','0999999999999','dian@mail.com',NULL,'poto___19122020191839.png',39),
(92,5,'EVI','PA','DISHUB','0222222222222','evi@mail.com',NULL,NULL,36),
(93,5,'DINA','AVB','DISBUD','078787878787','dina@mail.com',NULL,NULL,40),
(94,5,'','','asassa','034343','sasas',NULL,NULL,50),
(95,5,'akuyyy','acssd','sdsd','0852222','cahya@mai.com',NULL,'poto___21122020063237.jpg',46),
(96,5,'vcvcvcv','sdsd','sdsd','0852222eee','cahwwwya@mai.com',NULL,NULL,41),
(97,5,'','','Kepala desa','085221288210','uarmoure@gmail.com',NULL,'poto___03012021081838.jpg',51),
(100,5,'','','Menteri Pendidikan','085221288210666','uarmoure@gmail.com',NULL,NULL,47),
(101,7,'cepi cahyana','porgrammer','Dinas Pendidikan','085221288210','cahyanacepi@gmail.com',NULL,NULL,NULL),
(102,8,'cv','IT','IT','85221288210','cahyanacpi@gmail.com',NULL,NULL,NULL),
(106,10,'cv','IT','IT','085221288210','cahyanacpi@gmail.com',NULL,NULL,NULL);

/*Table structure for table `data_peserta` */

DROP TABLE IF EXISTS `data_peserta`;

CREATE TABLE `data_peserta` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode_acara` varchar(10) DEFAULT NULL,
  `qr` varchar(20) DEFAULT NULL,
  `qr_utama` varchar(20) DEFAULT NULL,
  `jenis_undangan` tinyint(4) DEFAULT '1' COMMENT '1=indo 2=eng',
  `kelompok` varchar(200) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `jabatan` varchar(200) DEFAULT NULL,
  `instansi` varchar(200) DEFAULT NULL,
  `alamat` text,
  `blok` varchar(200) DEFAULT NULL,
  `hp` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `sts_ikutserta` tinyint(4) DEFAULT '1' COMMENT '1=blm konfirm 2=hadir 3=tidak akan',
  `sts_kehadiran` tinyint(4) DEFAULT '2' COMMENT '1=hadir 2=tidak',
  `alasan` varchar(250) DEFAULT NULL,
  `cekin` datetime DEFAULT NULL,
  `_cid` int(11) DEFAULT NULL,
  `_ctime` datetime DEFAULT CURRENT_TIMESTAMP,
  `_uid` int(11) DEFAULT NULL,
  `_utime` datetime DEFAULT NULL,
  `gate` varchar(50) DEFAULT NULL,
  `berlaku` tinyint(4) DEFAULT '1',
  `cetak` varchar(10) DEFAULT NULL,
  `broadcast` tinyint(4) DEFAULT '2' COMMENT '1=sudah 2=belum',
  `hapus` tinyint(4) NOT NULL DEFAULT '0',
  `sts_peserta` tinyint(4) DEFAULT '1',
  `jml_und` tinyint(4) DEFAULT '1' COMMENT 'jumlah undangan rakor',
  `kolektif` int(11) DEFAULT '1' COMMENT '1',
  `link_join` text COMMENT 'link zoom',
  `registrant_id` varchar(100) DEFAULT NULL COMMENT 'id reg zoom',
  `j_kehadiran` tinyint(4) DEFAULT '1' COMMENT '2 =vikon 1=hadir',
  `id_meeting` varchar(100) DEFAULT NULL,
  `poto` text,
  `nama_vicon` varchar(120) DEFAULT NULL,
  `sts_eundangan` tinyint(4) DEFAULT '0' COMMENT 'send undangan sttus',
  `sts_esertifikat` tinyint(4) DEFAULT '0',
  `durasi` int(11) DEFAULT '0',
  `ttd_gladi` tinyint(4) DEFAULT '0' COMMENT '1=sudah ttd',
  `ttd` tinyint(4) DEFAULT '0' COMMENT '1=sudah ttd',
  `sapa` varchar(150) DEFAULT NULL COMMENT 'kata sapaan saat scan tamu',
  `jointime_gladi` datetime DEFAULT NULL,
  `jointime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`kode_acara`,`qr`,`qr_utama`,`jenis_undangan`,`kelompok`,`nama`,`jabatan`,`instansi`,`hp`,`email`,`sts_ikutserta`,`sts_kehadiran`,`cekin`,`broadcast`,`sts_peserta`)
) ENGINE=InnoDB AUTO_INCREMENT=323 DEFAULT CHARSET=latin1;

/*Data for the table `data_peserta` */

insert  into `data_peserta`(`id`,`kode_acara`,`qr`,`qr_utama`,`jenis_undangan`,`kelompok`,`nama`,`jabatan`,`instansi`,`alamat`,`blok`,`hp`,`email`,`sts_ikutserta`,`sts_kehadiran`,`alasan`,`cekin`,`_cid`,`_ctime`,`_uid`,`_utime`,`gate`,`berlaku`,`cetak`,`broadcast`,`hapus`,`sts_peserta`,`jml_und`,`kolektif`,`link_join`,`registrant_id`,`j_kehadiran`,`id_meeting`,`poto`,`nama_vicon`,`sts_eundangan`,`sts_esertifikat`,`durasi`,`ttd_gladi`,`ttd`,`sapa`,`jointime_gladi`,`jointime`) values 
(1,'PEJM7','PEJM7-HI022','PEJM7-HI022',1,NULL,'','','KETUA DPR',NULL,NULL,'085221288210','cahyanacepi@gmail.com',1,2,NULL,NULL,28,'2020-09-25 15:51:56',28,NULL,NULL,1,NULL,1,0,2,2,1,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL),
(9,'PEJM7','PEJM7-SE031','PEJM7-HI022',1,NULL,'Cepi cahyana.S.SI','programmer web','KETUA DPR',NULL,NULL,'085221288210','cahyanacepi@gmail.com',1,2,NULL,NULL,28,'2020-09-26 08:00:58',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,0,0,NULL,NULL,NULL),
(12,'PEJM7','PEJM7-VK034','PEJM7-VK034',1,NULL,NULL,NULL,'instas',NULL,NULL,'445454545454','1234585@sdsd.com',2,2,NULL,NULL,28,'2020-09-26 10:15:14',NULL,NULL,NULL,1,NULL,1,1,2,1,1,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,0,0,NULL,NULL,NULL),
(13,'PEJM7','PEJM7-ZI035','PEJM7-ZI035',1,NULL,NULL,NULL,'divi',NULL,NULL,'08683333','sss@gmail.com',2,2,NULL,NULL,28,'2020-09-26 10:53:50',28,NULL,NULL,1,NULL,2,0,2,1,1,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,0,0,NULL,NULL,NULL),
(14,'PEJM7','PEJM7-KW036','PEJM7-KW036',1,NULL,NULL,NULL,'division',NULL,NULL,'0343355555','okey@okey.com',1,2,NULL,NULL,28,'2020-09-26 10:53:50',28,NULL,NULL,1,NULL,2,0,2,1,1,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,0,0,NULL,NULL,NULL),
(15,'PEJM7','PEJM7-MY037','PEJM7-VK034',1,NULL,'Cepi cahyana.SKOM','programmer','instas',NULL,NULL,'085221233333','cahya3nacepi@gmail.com',2,2,NULL,NULL,28,'2020-09-26 14:06:25',28,NULL,NULL,1,NULL,1,0,2,1,1,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,0,0,NULL,NULL,NULL),
(17,'69SFE','69SFE-KQ002','69SFE-KQ002',1,'','Bapak Sug','programmer','Kepala desa',NULL,NULL,'221288210','cahyanpi@gmail.com',2,2,NULL,NULL,28,'2020-09-27 07:55:41',28,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,0,0,NULL,NULL,NULL),
(18,'6KIGJ','6KIGJ-ZF001','6KIGJ-ZF001',NULL,'','','','divi',NULL,NULL,'08683333','sss@gmail.com',1,2,NULL,NULL,28,'2020-11-25 11:02:09',NULL,NULL,NULL,1,NULL,2,0,2,1,1,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,0,0,NULL,NULL,NULL),
(19,'6KIGJ','6KIGJ-NG002','6KIGJ-NG002',NULL,'','Cepi cahyana.SKOM','programmer','instas',NULL,NULL,'085221233333','cahya3nacepi@gmail.com',1,2,NULL,NULL,28,'2020-11-25 11:02:09',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,0,0,NULL,NULL,NULL),
(20,'6KIGJ','6KIGJ-PR003','6KIGJ-PR003',NULL,'','Bapak Sug','programmer','Kepala desa',NULL,NULL,'221288210','cahyanpi@gmail.com',1,2,NULL,NULL,28,'2020-11-25 11:02:10',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,0,0,NULL,NULL,NULL),
(48,'235QM','235QM-VS030','235QM-VS030',NULL,'','Bapak H. Bambang Soesatyo, SE., MBA','Ketua Majelis Permusyawaratan Rakyat Republik Indonesia','Ketua MPR',NULL,NULL,'1','123',2,2,NULL,NULL,28,'2020-12-07 19:47:45',28,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,'','poto___09122020055141.jpg','',0,0,0,0,0,'Welcome',NULL,NULL),
(49,'235QM','235QM-NV032','235QM-NV032',NULL,'','Bapak H. Ahmad Muzani','Wakil Ketua Majelis Permusyawaratan Rakyat Republik Indonesia','',NULL,NULL,'3','125',1,2,NULL,NULL,28,'2020-12-07 19:47:46',28,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,'','poto___11122020074557.jpg',NULL,0,0,0,0,0,NULL,NULL,NULL),
(50,'235QM','235QM-MF033','235QM-MF033',NULL,'','Ibu Lestari Moerdijat, S.S.,MM.','Wakil Ketua Majelis Permusyawaratan Rakyat Republik Indonesia','',NULL,NULL,'4','126',1,2,NULL,NULL,28,'2020-12-07 19:47:47',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,'poto___11122020082320.jpg',NULL,0,0,0,0,0,NULL,NULL,NULL),
(51,'235QM','235QM-EX034','235QM-EX034',NULL,'','Bapak H. Jazilul Fawaid, SQ.,MA.','Wakil Ketua Majelis Permusyawaratan Rakyat Republik Indonesia','',NULL,NULL,'5','127',1,2,NULL,NULL,28,'2020-12-07 19:47:47',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),
(53,'235QM','235QM-IS036','235QM-IS036',NULL,'','Bapak Dr. H. Muhammad Hidayat Nur Wahid, MA.','Wakil Ketua Majelis Permusyawaratan Rakyat Republik Indonesia','',NULL,NULL,'7','129',1,2,NULL,NULL,28,'2020-12-07 19:47:47',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),
(54,'235QM','235QM-GU037','235QM-GU037',NULL,'','Bapak Dr. (H.C.) Zulkifli Hasan, SE,MM','Wakil Ketua Majelis Permusyawaratan Rakyat Republik Indonesia','',NULL,NULL,'8','130',1,2,NULL,NULL,28,'2020-12-07 19:47:48',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),
(55,'235QM','235QM-FV038','235QM-FV038',NULL,'','Bapak H. Arsul Sani, S.H.,M.Si.,Pr.M.','Wakil Ketua Majelis Permusyawaratan Rakyat Republik Indonesia','',NULL,NULL,'9','131',1,2,NULL,NULL,28,'2020-12-07 19:47:48',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),
(56,'235QM','235QM-NV039','235QM-NV039',NULL,'','Bapak Prof.Dr.Ir. Fadel Muhammad ','Wakil Ketua Majelis Permusyawaratan Rakyat Republik Indonesia','',NULL,NULL,'10','132',1,2,NULL,NULL,28,'2020-12-07 19:47:48',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),
(57,'235QM','235QM-WM040','235QM-WM040',NULL,'','Ibu Puan Maharani ','Ketua Dewan Perwakilan Rakyat Republik Indonesia','KETUA DPR',NULL,NULL,'11','133',1,2,NULL,NULL,28,'2020-12-07 19:47:48',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),
(58,'235QM','235QM-JU041','235QM-JU041',NULL,'','Bapak Aziz Syamsuddin ','Wakil Ketua Dewan Perwakilan Rakyat Republik Indonesia','',NULL,NULL,'12','134',1,2,NULL,NULL,28,'2020-12-07 19:47:49',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),
(59,'235QM','235QM-WI042','235QM-WI042',NULL,'','Bapak Sufmi Dasco Ahmad ','Wakil Ketua Dewan Perwakilan Rakyat Republik Indonesia','',NULL,NULL,'13','135',1,2,NULL,NULL,28,'2020-12-07 19:47:49',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),
(60,'235QM','235QM-VF043','235QM-VF043',NULL,'','Bapak Muhaimin Iskandar ','Wakil Ketua Dewan Perwakilan Rakyat Republik Indonesia','',NULL,NULL,'14','136',1,2,NULL,NULL,28,'2020-12-07 19:47:49',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),
(61,'235QM','235QM-NC044','235QM-NC044',NULL,'','Bapak Rachmat Gobel ','Wakil Ketua Dewan Perwakilan Rakyat Republik Indonesia','',NULL,NULL,'15','137',1,2,NULL,NULL,28,'2020-12-07 19:47:50',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),
(62,'235QM','235QM-ZJ045','235QM-ZJ045',NULL,'','Bapak Ir. H. AA. La Nyalla Mahmud Mattalitti ','Ketua Dewan Perwakilan Daerah Republik Indonesia','',NULL,NULL,'16','138',1,2,NULL,NULL,28,'2020-12-07 19:47:50',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),
(63,'235QM','235QM-MF046','235QM-MF046',NULL,'','Bapak Dr. Nono Sampono, M.Si.','Wakil Ketua Dewan Perwakilan Daerah Republik Indonesia','',NULL,NULL,'17','139',1,2,NULL,NULL,28,'2020-12-07 19:47:50',28,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,'',NULL,'',0,0,0,0,0,NULL,NULL,NULL),
(64,'235QM','235QM-XL047','235QM-XL047',NULL,'','Bapak Dr. Mahyudin, S.T., M.M.','Wakil Ketua Dewan Perwakilan Daerah Republik Indonesia','',NULL,NULL,'18','140',1,2,NULL,NULL,28,'2020-12-07 19:47:51',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),
(65,'235QM','235QM-WB048','235QM-WB048',NULL,'','Bapak Sultan Bakhtiar Najamudin, S.Sos., M.Si.','Wakil Ketua Dewan Perwakilan Daerah Republik Indonesia','',NULL,NULL,'19','141',1,2,NULL,NULL,28,'2020-12-07 19:47:51',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),
(66,'235QM','235QM-AT049','235QM-AT049',NULL,'','Bapak Dr. Agung Firman Sampurna, CSFA.','Ketua Badan Pemeriksa Keuangan Republik Indonesia','',NULL,NULL,'20','142',1,2,NULL,NULL,28,'2020-12-07 19:47:51',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),
(67,'235QM','235QM-SX050','235QM-SX050',NULL,'','Bapak Dr. Agus Joko Pramono, M.Acc., Ak., CA., CSFA., CPA.','Wakil Ketua Badan Pemeriksa Keuangan Republik Indonesia','',NULL,NULL,'21','143',1,2,NULL,NULL,28,'2020-12-07 19:47:51',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),
(68,'235QM','235QM-PI051','235QM-PI051',NULL,'','Bapak Dr. H. M. Syarifuddin, S.H, M.H.','Ketua Mahkamah Agung Republik Indonesia','',NULL,NULL,'22','144',1,2,NULL,NULL,28,'2020-12-07 19:47:51',28,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,'','poto___10122020222910.jpg','',0,0,0,0,0,NULL,NULL,NULL),
(69,'235QM','235QM-WV052','235QM-WV052',NULL,'','Bapak Dr. H. Sunarto, S.H., M.H.','Wakil Ketua Mahkamah Agung Republik Indonesia Bidang Non Yudisial','',NULL,NULL,'23','145',1,2,NULL,NULL,28,'2020-12-07 19:47:52',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),
(70,'235QM','235QM-KQ053','235QM-KQ053',NULL,'','Bapak Dr. Anwar Usman, S.H., M.H.','Ketua Mahkamah Konstitusi Republik Indonesia','',NULL,NULL,'24','146',1,2,NULL,NULL,28,'2020-12-07 19:47:52',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),
(71,'235QM','235QM-KI054','235QM-KI054',NULL,'','Bapak Prof. Dr. Aswanto, S.H., M.Si., DFM. ','Wakil Ketua Mahkamah Konstitusi Republik Indonesia','',NULL,NULL,'25','147',1,2,NULL,NULL,28,'2020-12-07 19:47:52',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),
(72,'235QM','235QM-RG055','235QM-RG055',NULL,'','Bapak Dr. Jaja Ahmad Jayus, S.H., M.Hum.','Ketua Komisi Yudisial Republik Indonesia','',NULL,NULL,'26','148',1,2,NULL,NULL,28,'2020-12-07 19:47:53',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),
(73,'235QM','235QM-ZV056','235QM-ZV056',NULL,'','Bapak Drs. H. Maradaman Harahap, S.H., M.H.','Wakil Ketua Komisi Yudisial Republik Indonesia','',NULL,NULL,'27','149',1,2,NULL,NULL,28,'2020-12-07 19:47:53',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),
(101,'235QM','235QM-RZ085','235QM-RZ085',1,NULL,'Bapak Andi','','dinas',NULL,NULL,'085221288','acepi@mail.com',2,1,NULL,NULL,28,'2020-12-10 20:31:03',NULL,NULL,NULL,1,NULL,2,0,1,1,1,'https://us02web.zoom.us/w/82381051468?tk=huMS9hpKE5ZjDuVqmU5yXpV4UzenqXwp1FsxYbwAFO0.DQIAAAATLksWTBZfTDA4SzVpbVF6YU1Wd3k5MTBIckJ3AAAAAAAAAAAAAAAAAAAAAAAAAAAA&pwd=RUIyZ01EajZVdkxKM1cyNUxRL2N4QT09','_L08K5imQzaMVwy910HrBw',2,'82381051468',NULL,'',0,0,0,1,1,NULL,'2020-12-10 20:45:53','2020-12-10 21:13:02'),
(107,'235QM','235QM-HS091','235QM-HS091',1,'','Bapak Maman Suwarman','Ketua Komunitas Petani Indonesia','CV. DIVISION IT',NULL,NULL,'085555','sss@mail.com',1,2,NULL,NULL,28,'2020-12-10 22:49:42',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,'poto___10122020224052.jpg',NULL,0,0,0,0,0,NULL,NULL,NULL),
(114,'426PG','426PG-RJ002','426PG-RJ002',1,NULL,NULL,NULL,'dinas',NULL,NULL,'085221288210','acepi@mail.com',2,2,NULL,NULL,28,'2020-12-12 16:07:18',28,NULL,NULL,1,NULL,1,1,2,1,1,NULL,NULL,2,NULL,NULL,NULL,0,0,0,0,0,'Welcome',NULL,NULL),
(116,'426PG','426PG-EA004','426PG-EA004',1,NULL,NULL,NULL,'dinas',NULL,NULL,'085221288210','cahyanacepi@gmail.com',2,2,NULL,NULL,28,'2020-12-12 18:42:06',28,NULL,NULL,1,NULL,1,1,2,2,1,'','QitVsiglR6S-iKgM6tRE0g',2,'82381051468',NULL,NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(132,'426PG','426PG-UE027','426PG-UE027',1,NULL,NULL,NULL,'CV. DIVISION IT',NULL,NULL,'085555','sss@mail.com',2,2,NULL,NULL,28,'2020-12-14 15:38:12',28,NULL,NULL,1,NULL,1,1,2,2,1,NULL,NULL,2,'82381051468',NULL,NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(137,'426PG','426PG-ZC032','426PG-ZC032',1,NULL,NULL,NULL,'CV. DIVISION IT',NULL,NULL,'085555','sss@mail.com',2,2,NULL,NULL,28,'2020-12-14 17:33:31',NULL,NULL,NULL,1,NULL,1,1,2,1,1,NULL,NULL,1,'82381051468',NULL,NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(139,'426PG','426PG-UC034','426PG-UC034',1,NULL,NULL,NULL,'CV. DIVISION IT',NULL,NULL,'085555','sss@mail.com',2,2,NULL,NULL,28,'2020-12-14 17:41:37',NULL,NULL,NULL,1,NULL,1,1,2,1,1,NULL,NULL,1,'82381051468',NULL,NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(147,'426PG','426PG-YW042','426PG-YW042',1,NULL,NULL,NULL,'CV. DIVISION IT',NULL,NULL,'085555','sss@mail.com',2,2,NULL,NULL,28,'2020-12-14 18:11:51',NULL,NULL,NULL,1,NULL,1,1,2,1,1,NULL,NULL,2,NULL,NULL,NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(149,'426PG','426PG-LJ044','426PG-LJ044',1,NULL,NULL,NULL,'CV. DIVISION IT',NULL,NULL,'085555','sss@mail.com',2,2,NULL,NULL,28,'2020-12-14 18:12:42',NULL,NULL,NULL,1,NULL,1,1,2,1,1,NULL,NULL,2,'82381051468',NULL,NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(151,'426PG','426PG-SE046','426PG-SE046',1,NULL,NULL,NULL,'WAKIL MPR',NULL,NULL,'232333333 ','124@mail.com',2,2,NULL,NULL,28,'2020-12-14 20:07:10',NULL,NULL,NULL,1,NULL,1,1,2,1,1,NULL,NULL,2,'82381051468',NULL,NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(155,'426PG','426PG-CU050','426PG-CU050',1,NULL,NULL,NULL,'CV. DIVISION IT',NULL,NULL,'085555','sss@mail.com',2,2,NULL,NULL,28,'2020-12-15 07:57:16',28,NULL,NULL,1,NULL,1,1,2,2,1,NULL,NULL,2,'82381051468',NULL,NULL,0,0,0,0,0,'Welcome',NULL,NULL),
(162,'426PG','426PG-GL055','426PG-GL055',1,NULL,NULL,NULL,'divi',NULL,NULL,'08683333','sss@gmail.com',2,2,NULL,NULL,28,'2020-12-15 20:44:19',28,NULL,NULL,1,NULL,1,1,2,1,1,NULL,NULL,1,'',NULL,'',0,0,0,0,0,NULL,NULL,NULL),
(167,'6FQHG','6FQHG-AI008','6FQHG-AI008',1,'','cepi','IT','swasta',NULL,NULL,'085221288210','cahyanacepi@gmail.com',1,2,NULL,NULL,28,'2020-12-16 09:23:22',28,NULL,NULL,1,NULL,1,0,1,1,1,'','4mI1ciwgRXqRf3MH8xaYlQ',2,'85935674073','poto___16122020214026.png','',1,0,0,0,0,NULL,NULL,NULL),
(171,'426PG','426PG-PG061','426PG-PG061',1,NULL,NULL,NULL,'CV. DIVISION IT',NULL,NULL,'085221288210','cahyanacepi@gmail.com',2,2,NULL,NULL,28,'2020-12-16 13:46:08',NULL,NULL,NULL,1,NULL,1,1,2,1,1,'','QitVsiglR6S-iKgM6tRE0g',2,'82381051468',NULL,NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(192,'426PG','426PG-HU091','426PG-HU091',1,NULL,NULL,NULL,'kadin',NULL,NULL,'08522','sdsd@gmail.com',2,2,NULL,NULL,28,'2020-12-16 18:23:16',NULL,NULL,NULL,1,NULL,1,1,2,2,1,NULL,NULL,2,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),
(196,'6FQHG','6FQHG-GE010','6FQHG-GE010',1,'','DIAN','OPR','DINKES',NULL,NULL,'0999999999999','dian@mail.com',1,2,NULL,NULL,28,'2020-12-17 06:34:10',NULL,NULL,NULL,1,NULL,1,0,1,1,1,'','ETqZqKrNQK6ykJ4RGf7_8g',2,'85935674073',NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),
(197,'6FQHG','6FQHG-FN011','6FQHG-FN011',1,'','EVI','PA','DISHUB',NULL,NULL,'0222222222222','evi@mail.com',1,2,NULL,NULL,28,'2020-12-17 06:34:10',NULL,NULL,NULL,1,NULL,1,0,1,1,1,NULL,NULL,2,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),
(198,'6FQHG','6FQHG-SE012','6FQHG-SE012',1,'','DINA','AVB','DISBUD',NULL,NULL,'078787878787','dina@mail.com',1,2,NULL,NULL,28,'2020-12-17 06:34:10',NULL,NULL,NULL,1,NULL,1,0,1,1,1,NULL,NULL,2,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),
(199,'BAIHN','BAIHN-UQ001','BAIHN-UQ001',1,NULL,'Bapak ','programmer','Kepala desa',NULL,NULL,'085221288210','cahyanacepi@gmail.com',1,2,NULL,NULL,28,'2020-12-19 14:56:28',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),
(200,'BAIHN','BAIHN-XH002','BAIHN-XH002',1,NULL,'uarmo','porgrammer','CV. DIVISION IT',NULL,NULL,'085511111111','uarmore@gmail.com',1,2,NULL,NULL,28,'2020-12-19 15:06:24',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,'',NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(201,'7YKDN','7YKDN-VF001','7YKDN-VF001',1,'','uarmo','porgrammer','CV. DIVISION IT',NULL,NULL,'085511111111','uarmore@gmail.com',2,1,NULL,NULL,28,'2020-12-19 16:26:18',28,NULL,NULL,1,NULL,2,0,1,1,1,'','Vphf6L5IT-asA-7U5OQuWA',2,'82381051468','','',0,0,0,1,1,'Selamat datang','2020-12-19 17:03:18','2020-12-19 17:03:45'),
(212,'6FQHG','6FQHG-DU013','6FQHG-DU013',1,'','','','divi',NULL,NULL,'08683333','sss@gmail.com',1,2,NULL,NULL,28,'2020-12-19 16:57:54',NULL,NULL,NULL,1,NULL,2,0,2,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),
(213,'6FQHG','6FQHG-TZ014','6FQHG-TZ014',1,'','Cepi cahyana.SKOM','programmer','instas',NULL,NULL,'085221233333','cahya3nacepi@gmail.com',1,2,NULL,NULL,28,'2020-12-19 16:57:55',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),
(214,'6FQHG','6FQHG-FH015','6FQHG-FH015',1,'','Bapak Sug','programmer','Kepala desa',NULL,NULL,'221288210','cahyanpi@gmail.com',1,2,NULL,NULL,28,'2020-12-19 16:57:55',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),
(221,'7YKDN','7YKDN-VJ018','7YKDN-VJ018',1,'','DIAN','OPR','DINKES',NULL,NULL,'0999999999999','dian@mail.com',1,2,NULL,NULL,28,'2020-12-19 17:02:39',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,'poto___19122020191839.png',NULL,0,0,0,0,0,NULL,NULL,NULL),
(222,'7YKDN','7YKDN-LV019','7YKDN-LV019',1,'','EVI','PA','DISHUB',NULL,NULL,'0222222222222','evi@mail.com',1,2,NULL,NULL,28,'2020-12-19 17:02:40',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),
(223,'7YKDN','7YKDN-LR020','7YKDN-LR020',1,'','DINA','AVB','DISBUD',NULL,NULL,'078787878787','dina@mail.com',1,2,NULL,NULL,28,'2020-12-19 17:02:40',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),
(225,'7YKDN','7YKDN-MD024','7YKDN-MD024',1,'','48','programmer','divi',NULL,NULL,'08683333','sss@gmail.com',1,2,NULL,NULL,28,'2020-12-19 20:54:12',28,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,2,NULL,'','',0,0,0,0,0,'Selamat datang',NULL,NULL),
(239,'XSV2B','XSV2B-ER015','XSV2B-ER015',1,'','DIAN','OPR','DINKES',NULL,NULL,'0999999999999','dian@mail.com',1,2,NULL,NULL,28,'2020-12-19 21:03:40',28,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,2,NULL,NULL,'',0,0,0,0,0,NULL,NULL,NULL),
(240,'XSV2B','XSV2B-FL016','XSV2B-FL016',1,'','EVI','PA','DISHUB',NULL,NULL,'0222222222222','evi@mail.com',1,2,NULL,NULL,28,'2020-12-19 21:03:40',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),
(241,'XSV2B','XSV2B-VY017','XSV2B-VY017',1,'','DINA','AVB','DISBUD',NULL,NULL,'078787878787','dina@mail.com',1,2,NULL,NULL,28,'2020-12-19 21:03:40',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),
(251,'426PG','426PG-GR100','426PG-GR100',1,NULL,NULL,NULL,'asassa',NULL,NULL,'034343','sasas',1,2,NULL,NULL,28,'2020-12-21 06:24:24',NULL,NULL,NULL,1,NULL,2,0,2,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),
(256,'LARQZ','LARQZ-YC014','LARQZ-YC014',1,'','akuyyy','acssd','sdsd',NULL,NULL,'0852222','cahya@mai.com',1,2,NULL,NULL,28,'2020-12-21 06:32:02',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,'poto___21122020063237.jpg',NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(257,'LARQZ','LARQZ-PG015','LARQZ-PG015',1,'','vcvcvcv','sdsd','sdsd',NULL,NULL,'0852222eee','cahwwwya@mai.com',1,2,NULL,NULL,28,'2020-12-21 06:32:02',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(258,'5D4PK','5D4PK-BK001','5D4PK-BK001',1,NULL,NULL,NULL,'CV. DIVISION IT',NULL,NULL,'085221288210','uarmore@gmail.com',2,2,NULL,NULL,28,'2020-12-25 18:36:47',NULL,NULL,NULL,1,NULL,1,1,2,1,1,NULL,NULL,2,'87350731686',NULL,NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(260,'5D4PK','5D4PK-BD003','5D4PK-BK001',1,NULL,'Cepi cahyana','programmer','CV. DIVISION IT',NULL,NULL,'085221288210','cahyanacepi@gmail.com',2,2,NULL,NULL,28,'2020-12-26 17:27:43',NULL,NULL,NULL,1,NULL,1,0,2,1,1,'https://us02web.zoom.us/w/87350731686?tk=xIQJZsJ72WHNS2GRg1_J03Ky6koY4TarEA4UJfVxhrc.DQIAAAAUVoJjphZhOS05MXVGb1I5V0FtcHdjY2U3RHd3AAAAAAAAAAAAAAAAAAAAAAAAAAAA&pwd=SWdrUzFTb3BYeHF6V3g2VjZwdzhWQT09','a9-91uFoR9WAmpwcce7Dww',2,'87350731686',NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),
(284,'M8XVR','M8XVR-ZP009','M8XVR-ZP009',1,'','Cepi cahyana','programmer','Kepala desa',NULL,NULL,'085221288210','uarmoure@gmail.com',1,2,NULL,NULL,28,'2021-01-03 08:14:15',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(285,'M8XVR','M8XVR-SM010','M8XVR-SM010',1,'','','','Ketua MPR',NULL,NULL,'1','cahyanacepi@gmail.com',1,2,NULL,NULL,28,'2021-01-03 08:14:16',NULL,NULL,NULL,1,NULL,2,0,2,1,1,NULL,NULL,1,NULL,'poto___09122020055141.jpg',NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(290,'DH7CB','DH7CB-XV006','DH7CB-XV006',1,'','Bapak cepicahyana','','Ketua MPR',NULL,NULL,'1','cahyanacepi@gmail.com',1,2,NULL,NULL,28,'2021-01-03 08:18:56',28,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,'','poto___03012021082411.jpg','',0,0,0,0,0,'Selamat datang',NULL,NULL),
(291,'DH7CB','DH7CB-HN007','DH7CB-HN007',1,'','Cepi cahyana','programmer','Kepala desa',NULL,NULL,'085221288210','uarmoure@gmail.com',1,2,NULL,NULL,28,'2021-01-03 08:18:57',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,'poto___03012021081838.jpg',NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(292,'A1YJ4','A1YJ4-FC017','A1YJ4-FC017',1,NULL,NULL,NULL,'Kepala desa',NULL,NULL,'085221288210','uarmoure@gmail.com',1,2,NULL,NULL,28,'2021-01-03 09:06:07',NULL,NULL,NULL,1,NULL,2,0,2,1,1,NULL,NULL,2,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL),
(295,'8YCI3','8YCI3-JB003','8YCI3-JB003',1,NULL,'cepi cahyana','porgrammer','Dinas Pendidikan',NULL,NULL,'085221288210','cahyanacepi@gmail.com',1,2,NULL,NULL,28,'2021-01-25 17:59:15',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,'','',0,0,0,0,0,'Selamat datang',NULL,NULL),
(296,'1GUT8','1GUT8-FD001','1GUT8-FD001',1,'','Bapak Dr. H. Ahmad Basarah,MH.','Wakil Ketua Majelis Permusyawaratan Rakyat Republik Indonesia','WAKIL MPR',NULL,NULL,'2','124',1,2,NULL,NULL,28,'2021-03-05 16:37:48',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(297,'1GUT8','1GUT8-WM002','1GUT8-WM002',1,'','Ibu Lestari Moerdijat, S.S.,MM.','Wakil Ketua Majelis Permusyawaratan Rakyat Republik Indonesia','',NULL,NULL,'4','126',1,2,NULL,NULL,28,'2021-03-05 16:37:49',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,'poto___03012021081825.jpg',NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(298,'1GUT8','1GUT8-VJ003','1GUT8-VJ003',1,'','Bapak Dr. (H.C.) Zulkifli Hasan, SE,MM','Wakil Ketua Majelis Permusyawaratan Rakyat Republik Indonesia','',NULL,NULL,'8','130',1,2,NULL,NULL,28,'2021-03-05 16:37:49',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(299,'1GUT8','1GUT8-JL004','1GUT8-JL004',1,'','Bapak H. Bambang Soesatyo, SE., MBA','Ketua Majelis Permusyawaratan Rakyat Republik Indonesia','Ketua MPR',NULL,NULL,'1','123',1,2,NULL,NULL,28,'2021-03-05 16:37:49',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(300,'1GUT8','1GUT8-RW005','1GUT8-RW005',1,'','Ibu Puan Maharani ','Ketua Dewan Perwakilan Rakyat Republik Indonesia','KETUA DPR',NULL,NULL,'11','133',1,2,NULL,NULL,28,'2021-03-05 16:37:49',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(301,'1GUT8','1GUT8-WK006','1GUT8-WK006',1,'','Bapak H. Jazilul Fawaid, SQ.,MA.','Wakil Ketua Majelis Permusyawaratan Rakyat Republik Indonesia','',NULL,NULL,'5','127',1,2,NULL,NULL,28,'2021-03-05 16:37:49',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(302,'1GUT8','1GUT8-AV007','1GUT8-AV007',1,'','Bapak H. Ahmad Muzani','Wakil Ketua Majelis Permusyawaratan Rakyat Republik Indonesia','',NULL,NULL,'3','125',1,2,NULL,NULL,28,'2021-03-05 16:37:50',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(303,'1GUT8','1GUT8-HL008','1GUT8-HL008',1,'','Bapak Dr. H. Sjarifuddin Hasan, S.E.,MM.','Wakil Ketua Majelis Permusyawaratan Rakyat Republik Indonesia','',NULL,NULL,'6','128',1,2,NULL,NULL,28,'2021-03-05 16:37:50',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(304,'1GUT8','1GUT8-ND009','1GUT8-ND009',1,'','Bapak Dr. H. Muhammad Hidayat Nur Wahid, MA.','Wakil Ketua Majelis Permusyawaratan Rakyat Republik Indonesia','',NULL,NULL,'7','129',1,2,NULL,NULL,28,'2021-03-05 16:37:50',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(305,'1GUT8','1GUT8-NS010','1GUT8-NS010',1,'','Bapak Dr. Agung Firman Sampurna, CSFA.','Ketua Badan Pemeriksa Keuangan Republik Indonesia','',NULL,NULL,'20','142',1,2,NULL,NULL,28,'2021-03-05 16:37:50',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(306,'1GUT8','1GUT8-MX011','1GUT8-MX011',1,'','Bapak H. Arsul Sani, S.H.,M.Si.,Pr.M.','Wakil Ketua Majelis Permusyawaratan Rakyat Republik Indonesia','',NULL,NULL,'9','131',1,2,NULL,NULL,28,'2021-03-05 16:37:51',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(307,'1GUT8','1GUT8-UK012','1GUT8-UK012',1,'','Bapak Dr. Nono Sampono, M.Si.','Wakil Ketua Dewan Perwakilan Daerah Republik Indonesia','',NULL,NULL,'17','139',1,2,NULL,NULL,28,'2021-03-05 16:37:51',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(308,'1GUT8','1GUT8-MV013','1GUT8-MV013',1,'','Bapak Prof.Dr.Ir. Fadel Muhammad ','Wakil Ketua Majelis Permusyawaratan Rakyat Republik Indonesia','',NULL,NULL,'10','132',1,2,NULL,NULL,28,'2021-03-05 16:37:51',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(309,'1GUT8','1GUT8-JQ014','1GUT8-JQ014',1,'','Bapak Aziz Syamsuddin ','Wakil Ketua Dewan Perwakilan Rakyat Republik Indonesia','',NULL,NULL,'12','134',1,2,NULL,NULL,28,'2021-03-05 16:37:51',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(310,'1GUT8','1GUT8-VB015','1GUT8-VB015',1,'','Bapak Sufmi Dasco Ahmad ','Wakil Ketua Dewan Perwakilan Rakyat Republik Indonesia','',NULL,NULL,'13','135',1,2,NULL,NULL,28,'2021-03-05 16:37:51',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(311,'1GUT8','1GUT8-RU016','1GUT8-RU016',1,'','Bapak Muhaimin Iskandar ','Wakil Ketua Dewan Perwakilan Rakyat Republik Indonesia','',NULL,NULL,'14','136',1,2,NULL,NULL,28,'2021-03-05 16:37:52',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(312,'1GUT8','1GUT8-FG017','1GUT8-FG017',1,'','Bapak Rachmat Gobel ','Wakil Ketua Dewan Perwakilan Rakyat Republik Indonesia','',NULL,NULL,'15','137',1,2,NULL,NULL,28,'2021-03-05 16:37:52',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(313,'1GUT8','1GUT8-XM018','1GUT8-XM018',1,'','Bapak Dr. Agus Joko Pramono, M.Acc., Ak., CA., CSFA., CPA.','Wakil Ketua Badan Pemeriksa Keuangan Republik Indonesia','',NULL,NULL,'21','143',1,2,NULL,NULL,28,'2021-03-05 16:37:52',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(314,'1GUT8','1GUT8-ZL019','1GUT8-ZL019',1,'','Bapak Ir. H. AA. La Nyalla Mahmud Mattalitti ','Ketua Dewan Perwakilan Daerah Republik Indonesia','',NULL,NULL,'16','138',1,2,NULL,NULL,28,'2021-03-05 16:37:53',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(315,'1GUT8','1GUT8-SU020','1GUT8-SU020',1,'','Bapak Dr. H. M. Syarifuddin, S.H, M.H.','Ketua Mahkamah Agung Republik Indonesia','',NULL,NULL,'22','144',1,2,NULL,NULL,28,'2021-03-05 16:37:53',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(316,'1GUT8','1GUT8-QX021','1GUT8-QX021',1,'','Bapak Dr. Anwar Usman, S.H., M.H.','Ketua Mahkamah Konstitusi Republik Indonesia','',NULL,NULL,'24','146',1,2,NULL,NULL,28,'2021-03-05 16:37:53',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(317,'1GUT8','1GUT8-WJ022','1GUT8-WJ022',1,'','Bapak Prof. Dr. Aswanto, S.H., M.Si., DFM. ','Wakil Ketua Mahkamah Konstitusi Republik Indonesia','',NULL,NULL,'25','147',1,2,NULL,NULL,28,'2021-03-05 16:37:53',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(318,'1GUT8','1GUT8-KI023','1GUT8-KI023',1,'','Bapak Dr. Jaja Ahmad Jayus, S.H., M.Hum.','Ketua Komisi Yudisial Republik Indonesia','',NULL,NULL,'26','148',1,2,NULL,NULL,28,'2021-03-05 16:37:53',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(319,'1GUT8','1GUT8-CY024','1GUT8-CY024',1,'','Bapak Dr. H. Sunarto, S.H., M.H.','Wakil Ketua Mahkamah Agung Republik Indonesia Bidang Non Yudisial','',NULL,NULL,'23','145',1,2,NULL,NULL,28,'2021-03-05 16:37:53',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(320,'1GUT8','1GUT8-PS025','1GUT8-PS025',1,'','Bapak Drs. H. Maradaman Harahap, S.H., M.H.','Wakil Ketua Komisi Yudisial Republik Indonesia','',NULL,NULL,'27','149',1,2,NULL,NULL,28,'2021-03-05 16:37:54',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(321,'1GUT8','1GUT8-PW026','1GUT8-PW026',1,'','Bapak Dr. Mahyudin, S.T., M.M.','Wakil Ketua Dewan Perwakilan Daerah Republik Indonesia','',NULL,NULL,'18','140',1,2,NULL,NULL,28,'2021-03-05 16:37:54',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,'Selamat datang',NULL,NULL),
(322,'1GUT8','1GUT8-LP027','1GUT8-LP027',1,'','Bapak Sultan Bakhtiar Najamudin, S.Sos., M.Si.','Wakil Ketua Dewan Perwakilan Daerah Republik Indonesia','',NULL,NULL,'19','141',1,2,NULL,NULL,28,'2021-03-05 16:37:54',NULL,NULL,NULL,1,NULL,2,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,0,0,0,0,0,'Selamat datang',NULL,NULL);

/*Table structure for table `data_peserta_scan` */

DROP TABLE IF EXISTS `data_peserta_scan`;

CREATE TABLE `data_peserta_scan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode_acara` varchar(10) DEFAULT NULL,
  `qr` varchar(20) DEFAULT NULL,
  `qr_utama` varchar(20) DEFAULT NULL,
  `jenis_undangan` tinyint(4) DEFAULT '1' COMMENT '1=indo 2=eng',
  `kelompok` varchar(200) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `jabatan` varchar(200) DEFAULT NULL,
  `instansi` varchar(200) DEFAULT NULL,
  `alamat` text,
  `blok` varchar(200) DEFAULT NULL,
  `hp` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `sts_ikutserta` tinyint(4) DEFAULT '1' COMMENT '1=blm konfirm 2=hadir 3=tidak akan',
  `sts_kehadiran` tinyint(4) DEFAULT '2' COMMENT '1=hadir 2=tidak',
  `alasan` varchar(250) DEFAULT NULL,
  `cekin` text,
  `_cid` int(11) DEFAULT NULL,
  `_ctime` datetime DEFAULT CURRENT_TIMESTAMP,
  `_uid` int(11) DEFAULT NULL,
  `_utime` datetime DEFAULT NULL,
  `gate` varchar(50) DEFAULT NULL,
  `berlaku` tinyint(4) DEFAULT '1',
  `cetak` varchar(10) DEFAULT NULL,
  `broadcast` tinyint(4) DEFAULT '2' COMMENT '1=sudah 2=belum',
  `hapus` tinyint(4) NOT NULL DEFAULT '0',
  `sts_peserta` tinyint(4) DEFAULT '1',
  `jml_und` tinyint(4) DEFAULT '1' COMMENT 'jumlah undangan rakor',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `data_peserta_scan` */

/*Table structure for table `file_peserta` */

DROP TABLE IF EXISTS `file_peserta`;

CREATE TABLE `file_peserta` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode_acara` varchar(50) DEFAULT NULL,
  `id_acara` int(11) DEFAULT NULL,
  `nama_file` varchar(250) DEFAULT NULL,
  `ket` varchar(250) DEFAULT NULL,
  `title` text,
  `peserta` text,
  `jml_peserta` int(11) DEFAULT NULL,
  `_cid` int(11) DEFAULT NULL,
  `_ctime` datetime DEFAULT CURRENT_TIMESTAMP,
  `_uid` int(11) DEFAULT NULL,
  `_utime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `file_peserta` */

/*Table structure for table `main_konfig` */

DROP TABLE IF EXISTS `main_konfig`;

CREATE TABLE `main_konfig` (
  `id_konfig` int(10) unsigned NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `value` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `main_konfig` */

insert  into `main_konfig`(`id_konfig`,`nama`,`value`) values 
(1,'Loggo','loggo.jpg'),
(2,'nama aplikasi','Pandu'),
(3,'Tanggal Project','2020'),
(4,'Klien','-'),
(5,'Product By','-'),
(6,'Jenis Login','1'),
(8,'footer','copyright © '),
(7,'record log','1000'),
(11,'versi',NULL),
(12,'tahun kegiatan',NULL),
(0,NULL,'CREATE  VIEW v_peserta AS\r\nSELECT * FROM data_peserta \r\nUNION ALL\r\nSELECT * FROM data_peserta_scan');

/*Table structure for table `main_level` */

DROP TABLE IF EXISTS `main_level`;

CREATE TABLE `main_level` (
  `id_level` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) NOT NULL,
  `direct` text,
  `ket` text,
  `control` text,
  PRIMARY KEY (`id_level`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

/*Data for the table `main_level` */

insert  into `main_level`(`id_level`,`nama`,`direct`,`ket`,`control`) values 
(1,'super','super','kelola keseluruhan',NULL),
(2,'administrator','dashboard/index','administrator',NULL),
(18,'admin','dashboard','admin',NULL),
(29,'scan','login/login_acara',NULL,NULL),
(28,'pimpinan','dashboard',NULL,NULL),
(30,'broadcast','broadcast',NULL,NULL);

/*Table structure for table `main_log` */

DROP TABLE IF EXISTS `main_log`;

CREATE TABLE `main_log` (
  `id_log` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_admin` int(11) DEFAULT NULL,
  `nama_user` varchar(56) DEFAULT NULL,
  `table_updated` varchar(25) DEFAULT NULL,
  `aksi` text NOT NULL,
  `tgl` datetime DEFAULT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=MyISAM AUTO_INCREMENT=3250 DEFAULT CHARSET=latin1;

/*Data for the table `main_log` */

insert  into `main_log`(`id_log`,`id_admin`,`nama_user`,`table_updated`,`aksi`,`tgl`) values 
(3249,14,'Administrator','Login','Login','2020-06-22 10:51:24'),
(3248,14,'Administrator','Login','Login','2020-06-22 10:47:16'),
(3115,14,'Administrator','Login','Login','2020-06-05 15:27:30'),
(2738,14,'Administrator','Login','Login','2020-06-05 14:57:22'),
(1415,14,'Administrator','Login','Login','2020-06-05 13:17:57'),
(7,14,'Administrator','Login','Login','2020-04-16 05:55:55'),
(8,14,'Administrator','Login','Login','2020-04-16 06:31:57'),
(9,14,'Administrator','Login','Login','2020-04-16 06:32:28'),
(10,14,'Administrator','Login','Login','2020-04-16 17:35:49'),
(11,14,'Administrator','Login','Login','2020-04-17 07:17:38'),
(12,14,'Administrator','Login','Login','2020-04-17 07:36:29'),
(13,14,'Administrator','Login','Login','2020-05-09 14:12:01'),
(14,14,'Administrator','Login','Login','2020-05-10 19:37:18'),
(15,14,'Administrator','Login','Login','2020-05-11 08:48:36'),
(16,14,'Administrator','Login','Login','2020-05-12 17:09:05'),
(17,14,'Administrator','Login','Login','2020-05-19 12:45:48'),
(18,14,'Administrator','Login','Login','2020-05-20 12:32:29'),
(19,14,'Administrator','Login','Login','2020-05-20 12:45:41'),
(20,14,'Administrator','Login','Login','2020-05-20 13:41:54'),
(21,14,'Administrator','Login','Login','2020-05-20 14:35:24'),
(22,14,'Administrator','Login','Login','2020-05-20 15:58:07'),
(23,14,'Administrator','Login','Login','2020-05-20 16:01:02'),
(24,14,'Administrator','Login','Login','2020-05-20 16:08:12'),
(25,14,'Administrator','Login','Login','2020-05-20 16:08:41'),
(26,14,'Administrator','Login','Login','2020-05-20 16:09:52'),
(27,14,'Administrator','Login','Login','2020-05-20 16:11:55'),
(28,14,'Administrator','Login','Login','2020-05-20 16:14:21'),
(29,14,'Administrator','Login','Login','2020-05-20 16:15:11'),
(30,14,'Administrator','Login','Login','2020-05-20 16:18:18'),
(31,14,'Administrator','Login','Login','2020-05-20 16:18:18'),
(32,14,'Administrator','Login','Login','2020-05-20 16:18:18'),
(33,14,'Administrator','Login','Login','2020-05-20 16:18:23'),
(34,14,'Administrator','Login','Login','2020-05-20 16:18:27'),
(35,14,'Administrator','Login','Login','2020-05-20 16:18:40'),
(36,14,'Administrator','Login','Login','2020-05-20 16:18:46'),
(37,14,'Administrator','Login','Login','2020-05-20 16:18:46'),
(38,14,'Administrator','Login','Login','2020-05-20 16:18:47'),
(39,14,'Administrator','Login','Login','2020-05-20 16:18:50'),
(40,14,'Administrator','Login','Login','2020-05-20 16:18:54'),
(41,14,'Administrator','Login','Login','2020-05-20 16:18:58'),
(42,14,'Administrator','Login','Login','2020-05-20 16:19:02'),
(43,14,'Administrator','Login','Login','2020-05-20 16:19:09'),
(44,14,'Administrator','Login','Login','2020-05-20 16:19:13'),
(45,14,'Administrator','Login','Login','2020-05-20 16:19:14'),
(46,14,'Administrator','Login','Login','2020-05-20 16:19:18'),
(47,14,'Administrator','Login','Login','2020-05-20 16:19:23'),
(48,14,'Administrator','Login','Login','2020-05-20 16:20:05'),
(49,14,'Administrator','Login','Login','2020-05-20 16:20:05'),
(50,14,'Administrator','Login','Login','2020-05-20 16:20:05'),
(51,14,'Administrator','Login','Login','2020-05-20 16:20:05'),
(52,14,'Administrator','Login','Login','2020-05-20 16:20:05'),
(53,14,'Administrator','Login','Login','2020-05-20 16:20:06'),
(54,14,'Administrator','Login','Login','2020-05-20 16:20:07'),
(55,14,'Administrator','Login','Login','2020-05-20 16:20:08'),
(56,14,'Administrator','Login','Login','2020-05-20 16:20:09'),
(57,14,'Administrator','Login','Login','2020-05-20 16:20:15'),
(58,14,'Administrator','Login','Login','2020-05-20 16:20:15'),
(59,14,'Administrator','Login','Login','2020-05-20 16:20:16'),
(60,14,'Administrator','Login','Login','2020-05-20 16:20:20'),
(61,14,'Administrator','Login','Login','2020-05-20 16:20:21'),
(62,14,'Administrator','Login','Login','2020-05-20 16:20:22'),
(63,14,'Administrator','Login','Login','2020-05-20 16:20:24'),
(64,14,'Administrator','Login','Login','2020-05-20 16:20:25'),
(65,14,'Administrator','Login','Login','2020-05-20 16:20:27'),
(66,14,'Administrator','Login','Login','2020-05-20 16:20:30'),
(67,14,'Administrator','Login','Login','2020-05-20 16:20:31'),
(68,14,'Administrator','Login','Login','2020-05-20 16:20:32'),
(69,14,'Administrator','Login','Login','2020-05-20 16:20:35'),
(70,14,'Administrator','Login','Login','2020-05-20 16:20:37'),
(71,14,'Administrator','Login','Login','2020-05-20 16:20:38'),
(72,14,'Administrator','Login','Login','2020-05-20 16:20:40'),
(73,14,'Administrator','Login','Login','2020-05-20 16:20:42'),
(74,14,'Administrator','Login','Login','2020-05-20 16:20:43'),
(75,14,'Administrator','Login','Login','2020-05-20 16:20:45'),
(76,14,'Administrator','Login','Login','2020-05-20 16:20:46'),
(77,14,'Administrator','Login','Login','2020-05-20 16:20:48'),
(78,14,'Administrator','Login','Login','2020-05-20 16:20:50'),
(79,14,'Administrator','Login','Login','2020-05-20 16:20:51'),
(80,14,'Administrator','Login','Login','2020-05-20 16:20:53'),
(81,14,'Administrator','Login','Login','2020-05-20 16:20:53'),
(82,14,'Administrator','Login','Login','2020-05-20 16:20:56'),
(83,14,'Administrator','Login','Login','2020-05-20 16:20:57'),
(84,14,'Administrator','Login','Login','2020-05-20 16:20:58'),
(85,14,'Administrator','Login','Login','2020-05-20 16:20:58'),
(86,14,'Administrator','Login','Login','2020-05-20 16:21:03'),
(87,14,'Administrator','Login','Login','2020-05-20 16:21:04'),
(88,14,'Administrator','Login','Login','2020-05-20 16:21:05'),
(89,14,'Administrator','Login','Login','2020-05-20 16:21:07'),
(90,14,'Administrator','Login','Login','2020-05-20 16:21:08'),
(91,14,'Administrator','Login','Login','2020-05-20 16:21:11'),
(92,14,'Administrator','Login','Login','2020-05-20 16:21:33'),
(93,14,'Administrator','Login','Login','2020-05-20 16:21:34'),
(94,14,'Administrator','Login','Login','2020-05-20 16:21:34'),
(95,14,'Administrator','Login','Login','2020-05-20 16:21:43'),
(96,14,'Administrator','Login','Login','2020-05-20 16:21:45'),
(97,14,'Administrator','Login','Login','2020-05-20 16:21:46'),
(98,14,'Administrator','Login','Login','2020-05-20 16:21:48'),
(99,14,'Administrator','Login','Login','2020-05-20 16:21:52'),
(100,14,'Administrator','Login','Login','2020-05-20 16:22:21'),
(101,14,'Administrator','Login','Login','2020-05-20 16:23:04'),
(102,14,'Administrator','Login','Login','2020-05-20 16:23:36'),
(103,14,'Administrator','Login','Login','2020-05-20 16:23:52'),
(104,14,'Administrator','Login','Login','2020-05-20 16:24:00'),
(105,14,'Administrator','Login','Login','2020-05-20 16:24:18'),
(106,14,'Administrator','Login','Login','2020-05-20 16:24:35'),
(107,14,'Administrator','Login','Login','2020-05-20 16:24:39'),
(108,14,'Administrator','Login','Login','2020-05-20 16:24:39'),
(109,14,'Administrator','Login','Login','2020-05-20 16:24:44'),
(110,14,'Administrator','Login','Login','2020-05-20 16:24:44'),
(111,14,'Administrator','Login','Login','2020-05-20 16:24:45'),
(112,14,'Administrator','Login','Login','2020-05-20 16:24:45'),
(113,14,'Administrator','Login','Login','2020-05-20 16:24:45'),
(114,14,'Administrator','Login','Login','2020-05-20 16:24:45'),
(115,14,'Administrator','Login','Login','2020-05-20 16:24:45'),
(116,14,'Administrator','Login','Login','2020-05-20 16:24:50'),
(117,14,'Administrator','Login','Login','2020-05-20 16:24:50'),
(118,14,'Administrator','Login','Login','2020-05-20 16:24:50'),
(119,14,'Administrator','Login','Login','2020-05-20 16:24:51'),
(120,14,'Administrator','Login','Login','2020-05-20 16:24:51'),
(121,14,'Administrator','Login','Login','2020-05-20 16:24:51'),
(122,14,'Administrator','Login','Login','2020-05-20 16:24:52'),
(123,14,'Administrator','Login','Login','2020-05-20 16:24:52'),
(124,14,'Administrator','Login','Login','2020-05-20 16:24:54'),
(125,14,'Administrator','Login','Login','2020-05-20 16:24:55'),
(126,14,'Administrator','Login','Login','2020-05-20 16:24:56'),
(127,14,'Administrator','Login','Login','2020-05-20 16:24:56'),
(128,14,'Administrator','Login','Login','2020-05-20 16:24:57'),
(129,14,'Administrator','Login','Login','2020-05-20 16:24:57'),
(130,14,'Administrator','Login','Login','2020-05-20 16:24:57'),
(131,14,'Administrator','Login','Login','2020-05-20 16:24:59'),
(132,14,'Administrator','Login','Login','2020-05-20 16:24:59'),
(133,14,'Administrator','Login','Login','2020-05-20 16:25:00'),
(134,14,'Administrator','Login','Login','2020-05-20 16:25:00'),
(135,14,'Administrator','Login','Login','2020-05-20 16:25:01'),
(136,14,'Administrator','Login','Login','2020-05-20 16:25:02'),
(137,14,'Administrator','Login','Login','2020-05-20 16:25:03'),
(138,14,'Administrator','Login','Login','2020-05-20 16:25:04'),
(139,14,'Administrator','Login','Login','2020-05-20 16:25:05'),
(140,14,'Administrator','Login','Login','2020-05-20 16:25:05'),
(141,14,'Administrator','Login','Login','2020-05-20 16:25:06'),
(142,14,'Administrator','Login','Login','2020-05-20 16:25:06'),
(143,14,'Administrator','Login','Login','2020-05-20 16:25:07'),
(144,14,'Administrator','Login','Login','2020-05-20 16:25:12'),
(145,14,'Administrator','Login','Login','2020-05-20 16:25:13'),
(146,14,'Administrator','Login','Login','2020-05-20 16:25:14'),
(147,14,'Administrator','Login','Login','2020-05-20 16:25:14'),
(148,14,'Administrator','Login','Login','2020-05-20 16:25:15'),
(149,14,'Administrator','Login','Login','2020-05-20 16:25:28'),
(150,14,'Administrator','Login','Login','2020-05-20 16:26:12'),
(151,14,'Administrator','Login','Login','2020-05-20 16:26:12'),
(152,14,'Administrator','Login','Login','2020-05-20 16:26:13'),
(153,14,'Administrator','Login','Login','2020-05-20 16:26:13'),
(154,14,'Administrator','Login','Login','2020-05-20 16:26:13'),
(155,14,'Administrator','Login','Login','2020-05-20 16:26:17'),
(156,14,'Administrator','Login','Login','2020-05-20 16:26:17'),
(157,14,'Administrator','Login','Login','2020-05-20 16:26:20'),
(158,14,'Administrator','Login','Login','2020-05-20 16:26:20'),
(159,14,'Administrator','Login','Login','2020-05-20 16:26:22'),
(160,14,'Administrator','Login','Login','2020-05-20 16:26:23'),
(161,14,'Administrator','Login','Login','2020-05-20 16:26:23'),
(162,14,'Administrator','Login','Login','2020-05-20 16:26:23'),
(163,14,'Administrator','Login','Login','2020-05-20 16:26:23'),
(164,14,'Administrator','Login','Login','2020-05-20 16:26:24'),
(165,14,'Administrator','Login','Login','2020-05-20 16:26:24'),
(166,14,'Administrator','Login','Login','2020-05-20 16:26:24'),
(167,14,'Administrator','Login','Login','2020-05-20 16:26:25'),
(168,14,'Administrator','Login','Login','2020-05-20 16:26:25'),
(169,14,'Administrator','Login','Login','2020-05-20 16:26:27'),
(170,14,'Administrator','Login','Login','2020-05-20 16:26:28'),
(171,14,'Administrator','Login','Login','2020-05-20 16:26:28'),
(172,14,'Administrator','Login','Login','2020-05-20 16:26:30'),
(173,14,'Administrator','Login','Login','2020-05-20 16:26:30'),
(174,14,'Administrator','Login','Login','2020-05-20 16:26:30'),
(175,14,'Administrator','Login','Login','2020-05-20 16:26:30'),
(176,14,'Administrator','Login','Login','2020-05-20 16:26:32'),
(177,14,'Administrator','Login','Login','2020-05-20 16:26:32'),
(178,14,'Administrator','Login','Login','2020-05-20 16:26:33'),
(179,14,'Administrator','Login','Login','2020-05-20 16:26:34'),
(180,14,'Administrator','Login','Login','2020-05-20 16:26:34'),
(181,14,'Administrator','Login','Login','2020-05-20 16:26:36'),
(182,14,'Administrator','Login','Login','2020-05-20 16:26:36'),
(183,14,'Administrator','Login','Login','2020-05-20 16:26:37'),
(184,14,'Administrator','Login','Login','2020-05-20 16:26:37'),
(185,14,'Administrator','Login','Login','2020-05-20 16:26:38'),
(186,14,'Administrator','Login','Login','2020-05-20 16:26:38'),
(187,14,'Administrator','Login','Login','2020-05-20 16:26:39'),
(188,14,'Administrator','Login','Login','2020-05-20 16:26:39'),
(189,14,'Administrator','Login','Login','2020-05-20 16:26:39'),
(190,14,'Administrator','Login','Login','2020-05-20 16:26:41'),
(191,14,'Administrator','Login','Login','2020-05-20 16:26:43'),
(192,14,'Administrator','Login','Login','2020-05-20 16:26:43'),
(193,14,'Administrator','Login','Login','2020-05-20 16:26:45'),
(194,14,'Administrator','Login','Login','2020-05-20 16:26:46'),
(195,14,'Administrator','Login','Login','2020-05-20 16:26:46'),
(196,14,'Administrator','Login','Login','2020-05-20 16:26:46'),
(197,14,'Administrator','Login','Login','2020-05-20 16:26:46'),
(198,14,'Administrator','Login','Login','2020-05-20 16:26:47'),
(199,14,'Administrator','Login','Login','2020-05-20 16:26:47'),
(200,14,'Administrator','Login','Login','2020-05-20 16:26:48'),
(201,14,'Administrator','Login','Login','2020-05-20 16:26:48'),
(202,14,'Administrator','Login','Login','2020-05-20 16:26:50'),
(203,14,'Administrator','Login','Login','2020-05-20 16:26:51'),
(204,14,'Administrator','Login','Login','2020-05-20 16:26:52'),
(205,14,'Administrator','Login','Login','2020-05-20 16:26:53'),
(206,14,'Administrator','Login','Login','2020-05-20 16:26:53'),
(207,14,'Administrator','Login','Login','2020-05-20 16:26:53'),
(208,14,'Administrator','Login','Login','2020-05-20 16:26:54'),
(209,14,'Administrator','Login','Login','2020-05-20 16:26:54'),
(210,14,'Administrator','Login','Login','2020-05-20 16:26:54'),
(211,14,'Administrator','Login','Login','2020-05-20 16:26:56'),
(212,14,'Administrator','Login','Login','2020-05-20 16:26:57'),
(213,14,'Administrator','Login','Login','2020-05-20 16:26:58'),
(214,14,'Administrator','Login','Login','2020-05-20 16:26:59'),
(215,14,'Administrator','Login','Login','2020-05-20 16:26:59'),
(216,14,'Administrator','Login','Login','2020-05-20 16:26:59'),
(217,14,'Administrator','Login','Login','2020-05-20 16:27:00'),
(218,14,'Administrator','Login','Login','2020-05-20 16:27:01'),
(219,14,'Administrator','Login','Login','2020-05-20 16:27:01'),
(220,14,'Administrator','Login','Login','2020-05-20 16:27:02'),
(221,14,'Administrator','Login','Login','2020-05-20 16:27:02'),
(222,14,'Administrator','Login','Login','2020-05-20 16:27:04'),
(223,14,'Administrator','Login','Login','2020-05-20 16:27:04'),
(224,14,'Administrator','Login','Login','2020-05-20 16:27:04'),
(225,14,'Administrator','Login','Login','2020-05-20 16:27:04'),
(226,14,'Administrator','Login','Login','2020-05-20 16:27:05'),
(227,14,'Administrator','Login','Login','2020-05-20 16:27:07'),
(228,14,'Administrator','Login','Login','2020-05-20 16:27:07'),
(229,14,'Administrator','Login','Login','2020-05-20 16:27:07'),
(230,14,'Administrator','Login','Login','2020-05-20 16:27:09'),
(231,14,'Administrator','Login','Login','2020-05-20 16:27:10'),
(232,14,'Administrator','Login','Login','2020-05-20 16:27:11'),
(233,14,'Administrator','Login','Login','2020-05-20 16:27:11'),
(234,14,'Administrator','Login','Login','2020-05-20 16:27:11'),
(235,14,'Administrator','Login','Login','2020-05-20 16:27:12'),
(236,14,'Administrator','Login','Login','2020-05-20 16:27:13'),
(237,14,'Administrator','Login','Login','2020-05-20 16:27:13'),
(238,14,'Administrator','Login','Login','2020-05-20 16:27:13'),
(239,14,'Administrator','Login','Login','2020-05-20 16:27:15'),
(240,14,'Administrator','Login','Login','2020-05-20 16:27:16'),
(241,14,'Administrator','Login','Login','2020-05-20 16:27:17'),
(242,14,'Administrator','Login','Login','2020-05-20 16:27:17'),
(243,14,'Administrator','Login','Login','2020-05-20 16:27:19'),
(244,14,'Administrator','Login','Login','2020-05-20 16:27:19'),
(245,14,'Administrator','Login','Login','2020-05-20 16:27:19'),
(246,14,'Administrator','Login','Login','2020-05-20 16:27:19'),
(247,14,'Administrator','Login','Login','2020-05-20 16:27:20'),
(248,14,'Administrator','Login','Login','2020-05-20 16:27:20'),
(249,14,'Administrator','Login','Login','2020-05-20 16:27:22'),
(250,14,'Administrator','Login','Login','2020-05-20 16:27:23'),
(251,14,'Administrator','Login','Login','2020-05-20 16:27:25'),
(252,14,'Administrator','Login','Login','2020-05-20 16:27:25'),
(253,14,'Administrator','Login','Login','2020-05-20 16:27:25'),
(254,14,'Administrator','Login','Login','2020-05-20 16:27:25'),
(255,14,'Administrator','Login','Login','2020-05-20 16:27:25'),
(256,14,'Administrator','Login','Login','2020-05-20 16:27:26'),
(257,14,'Administrator','Login','Login','2020-05-20 16:27:28'),
(258,14,'Administrator','Login','Login','2020-05-20 16:27:28'),
(259,14,'Administrator','Login','Login','2020-05-20 16:27:29'),
(260,14,'Administrator','Login','Login','2020-05-20 16:27:30'),
(261,14,'Administrator','Login','Login','2020-05-20 16:27:31'),
(262,14,'Administrator','Login','Login','2020-05-20 16:27:31'),
(263,14,'Administrator','Login','Login','2020-05-20 16:27:31'),
(264,14,'Administrator','Login','Login','2020-05-20 16:27:31'),
(265,14,'Administrator','Login','Login','2020-05-20 16:27:33'),
(266,14,'Administrator','Login','Login','2020-05-20 16:27:33'),
(267,14,'Administrator','Login','Login','2020-05-20 16:27:34'),
(268,14,'Administrator','Login','Login','2020-05-20 16:27:35'),
(269,14,'Administrator','Login','Login','2020-05-20 16:27:36'),
(270,14,'Administrator','Login','Login','2020-05-20 16:27:36'),
(271,14,'Administrator','Login','Login','2020-05-20 16:27:37'),
(272,14,'Administrator','Login','Login','2020-05-20 16:27:37'),
(273,14,'Administrator','Login','Login','2020-05-20 16:27:38'),
(274,14,'Administrator','Login','Login','2020-05-20 16:27:39'),
(275,14,'Administrator','Login','Login','2020-05-20 16:27:40'),
(276,14,'Administrator','Login','Login','2020-05-20 16:27:40'),
(277,14,'Administrator','Login','Login','2020-05-20 16:27:40'),
(278,14,'Administrator','Login','Login','2020-05-20 16:27:41'),
(279,14,'Administrator','Login','Login','2020-05-20 16:27:43'),
(280,14,'Administrator','Login','Login','2020-05-20 16:27:43'),
(281,14,'Administrator','Login','Login','2020-05-20 16:27:44'),
(282,14,'Administrator','Login','Login','2020-05-20 16:27:44'),
(283,14,'Administrator','Login','Login','2020-05-20 16:27:45'),
(284,14,'Administrator','Login','Login','2020-05-20 16:27:46'),
(285,14,'Administrator','Login','Login','2020-05-20 16:27:46'),
(286,14,'Administrator','Login','Login','2020-05-20 16:27:46'),
(287,14,'Administrator','Login','Login','2020-05-20 16:27:48'),
(288,14,'Administrator','Login','Login','2020-05-20 16:27:49'),
(289,14,'Administrator','Login','Login','2020-05-20 16:27:49'),
(290,14,'Administrator','Login','Login','2020-05-20 16:27:49'),
(291,14,'Administrator','Login','Login','2020-05-20 16:27:51'),
(292,14,'Administrator','Login','Login','2020-05-20 16:27:51'),
(293,14,'Administrator','Login','Login','2020-05-20 16:27:52'),
(294,14,'Administrator','Login','Login','2020-05-20 16:27:52'),
(295,14,'Administrator','Login','Login','2020-05-20 16:27:52'),
(296,14,'Administrator','Login','Login','2020-05-20 16:27:54'),
(297,14,'Administrator','Login','Login','2020-05-20 16:27:54'),
(298,14,'Administrator','Login','Login','2020-05-20 16:27:55'),
(299,14,'Administrator','Login','Login','2020-05-20 16:27:55'),
(300,14,'Administrator','Login','Login','2020-05-20 16:27:56'),
(301,14,'Administrator','Login','Login','2020-05-20 16:27:58'),
(302,14,'Administrator','Login','Login','2020-05-20 16:27:59'),
(303,14,'Administrator','Login','Login','2020-05-20 16:28:00'),
(304,14,'Administrator','Login','Login','2020-05-20 16:28:00'),
(305,14,'Administrator','Login','Login','2020-05-20 16:28:00'),
(306,14,'Administrator','Login','Login','2020-05-20 16:28:00'),
(307,14,'Administrator','Login','Login','2020-05-20 16:28:01'),
(308,14,'Administrator','Login','Login','2020-05-20 16:28:02'),
(309,14,'Administrator','Login','Login','2020-05-20 16:28:05'),
(310,14,'Administrator','Login','Login','2020-05-20 16:28:05'),
(311,14,'Administrator','Login','Login','2020-05-20 16:28:06'),
(312,14,'Administrator','Login','Login','2020-05-20 16:28:06'),
(313,14,'Administrator','Login','Login','2020-05-20 16:28:06'),
(314,14,'Administrator','Login','Login','2020-05-20 16:28:07'),
(315,14,'Administrator','Login','Login','2020-05-20 16:28:08'),
(316,14,'Administrator','Login','Login','2020-05-20 16:28:08'),
(317,14,'Administrator','Login','Login','2020-05-20 16:28:08'),
(318,14,'Administrator','Login','Login','2020-05-20 16:28:11'),
(319,14,'Administrator','Login','Login','2020-05-20 16:28:11'),
(320,14,'Administrator','Login','Login','2020-05-20 16:28:12'),
(321,14,'Administrator','Login','Login','2020-05-20 16:28:12'),
(322,14,'Administrator','Login','Login','2020-05-20 16:28:13'),
(323,14,'Administrator','Login','Login','2020-05-20 16:28:14'),
(324,14,'Administrator','Login','Login','2020-05-20 16:28:15'),
(325,14,'Administrator','Login','Login','2020-05-20 16:28:15'),
(326,14,'Administrator','Login','Login','2020-05-20 16:28:15'),
(327,14,'Administrator','Login','Login','2020-05-20 16:28:16'),
(328,14,'Administrator','Login','Login','2020-05-20 16:28:17'),
(329,14,'Administrator','Login','Login','2020-05-20 16:28:20'),
(330,14,'Administrator','Login','Login','2020-05-20 16:28:22'),
(331,14,'Administrator','Login','Login','2020-05-20 16:28:26'),
(332,14,'Administrator','Login','Login','2020-05-20 16:28:28'),
(333,14,'Administrator','Login','Login','2020-05-20 16:28:28'),
(334,14,'Administrator','Login','Login','2020-05-20 16:28:28'),
(335,14,'Administrator','Login','Login','2020-05-20 16:28:28'),
(336,14,'Administrator','Login','Login','2020-05-20 16:28:29'),
(337,14,'Administrator','Login','Login','2020-05-20 16:28:34'),
(338,14,'Administrator','Login','Login','2020-05-20 16:28:34'),
(339,14,'Administrator','Login','Login','2020-05-20 16:28:34'),
(340,14,'Administrator','Login','Login','2020-05-20 16:28:38'),
(341,14,'Administrator','Login','Login','2020-05-20 16:28:39'),
(342,14,'Administrator','Login','Login','2020-05-20 16:28:39'),
(343,14,'Administrator','Login','Login','2020-05-20 16:28:39'),
(344,14,'Administrator','Login','Login','2020-05-20 16:28:40'),
(345,14,'Administrator','Login','Login','2020-05-20 16:28:40'),
(346,14,'Administrator','Login','Login','2020-05-20 16:28:41'),
(347,14,'Administrator','Login','Login','2020-05-20 16:28:41'),
(348,14,'Administrator','Login','Login','2020-05-20 16:28:50'),
(349,14,'Administrator','Login','Login','2020-05-20 16:28:50'),
(350,14,'Administrator','Login','Login','2020-05-20 16:28:51'),
(351,14,'Administrator','Login','Login','2020-05-20 16:28:51'),
(352,14,'Administrator','Login','Login','2020-05-20 16:28:52'),
(353,14,'Administrator','Login','Login','2020-05-20 16:28:52'),
(354,14,'Administrator','Login','Login','2020-05-20 16:28:53'),
(355,14,'Administrator','Login','Login','2020-05-20 16:28:54'),
(356,14,'Administrator','Login','Login','2020-05-20 16:28:55'),
(357,14,'Administrator','Login','Login','2020-05-20 16:28:56'),
(358,14,'Administrator','Login','Login','2020-05-20 16:28:57'),
(359,14,'Administrator','Login','Login','2020-05-20 16:28:57'),
(360,14,'Administrator','Login','Login','2020-05-20 16:28:58'),
(361,14,'Administrator','Login','Login','2020-05-20 16:28:58'),
(362,14,'Administrator','Login','Login','2020-05-20 16:28:59'),
(363,14,'Administrator','Login','Login','2020-05-20 16:28:59'),
(364,14,'Administrator','Login','Login','2020-05-20 16:28:59'),
(365,14,'Administrator','Login','Login','2020-05-20 16:29:01'),
(366,14,'Administrator','Login','Login','2020-05-20 16:29:03'),
(367,14,'Administrator','Login','Login','2020-05-20 16:29:04'),
(368,14,'Administrator','Login','Login','2020-05-20 16:29:05'),
(369,14,'Administrator','Login','Login','2020-05-20 16:29:06'),
(370,14,'Administrator','Login','Login','2020-05-20 16:29:07'),
(371,14,'Administrator','Login','Login','2020-05-20 16:29:10'),
(372,14,'Administrator','Login','Login','2020-05-20 16:29:10'),
(373,14,'Administrator','Login','Login','2020-05-20 16:29:11'),
(374,14,'Administrator','Login','Login','2020-05-20 16:29:12'),
(375,14,'Administrator','Login','Login','2020-05-20 16:29:19'),
(376,14,'Administrator','Login','Login','2020-05-20 16:29:19'),
(377,14,'Administrator','Login','Login','2020-05-20 16:29:23'),
(378,14,'Administrator','Login','Login','2020-05-20 16:29:24'),
(379,14,'Administrator','Login','Login','2020-05-20 16:29:24'),
(380,14,'Administrator','Login','Login','2020-05-20 16:29:25'),
(381,14,'Administrator','Login','Login','2020-05-20 16:29:26'),
(382,14,'Administrator','Login','Login','2020-05-20 16:29:27'),
(383,14,'Administrator','Login','Login','2020-05-20 16:29:29'),
(384,14,'Administrator','Login','Login','2020-05-20 16:29:30'),
(385,14,'Administrator','Login','Login','2020-05-20 16:29:31'),
(386,14,'Administrator','Login','Login','2020-05-20 16:29:31'),
(387,14,'Administrator','Login','Login','2020-05-20 16:29:31'),
(388,14,'Administrator','Login','Login','2020-05-20 16:29:31'),
(389,14,'Administrator','Login','Login','2020-05-20 16:29:31'),
(390,14,'Administrator','Login','Login','2020-05-20 16:29:31'),
(391,14,'Administrator','Login','Login','2020-05-20 16:29:32'),
(392,14,'Administrator','Login','Login','2020-05-20 16:29:35'),
(393,14,'Administrator','Login','Login','2020-05-20 16:29:35'),
(394,14,'Administrator','Login','Login','2020-05-20 16:29:36'),
(395,14,'Administrator','Login','Login','2020-05-20 16:29:36'),
(396,14,'Administrator','Login','Login','2020-05-20 16:29:36'),
(397,14,'Administrator','Login','Login','2020-05-20 16:29:36'),
(398,14,'Administrator','Login','Login','2020-05-20 16:29:37'),
(399,14,'Administrator','Login','Login','2020-05-20 16:29:37'),
(400,14,'Administrator','Login','Login','2020-05-20 16:29:38'),
(401,14,'Administrator','Login','Login','2020-05-20 16:29:40'),
(402,14,'Administrator','Login','Login','2020-05-20 16:29:42'),
(403,14,'Administrator','Login','Login','2020-05-20 16:29:42'),
(404,14,'Administrator','Login','Login','2020-05-20 16:29:42'),
(405,14,'Administrator','Login','Login','2020-05-20 16:29:42'),
(406,14,'Administrator','Login','Login','2020-05-20 16:29:42'),
(407,14,'Administrator','Login','Login','2020-05-20 16:29:42'),
(408,14,'Administrator','Login','Login','2020-05-20 16:29:43'),
(409,14,'Administrator','Login','Login','2020-05-20 16:29:44'),
(410,14,'Administrator','Login','Login','2020-05-20 16:29:47'),
(411,14,'Administrator','Login','Login','2020-05-20 16:29:47'),
(412,14,'Administrator','Login','Login','2020-05-20 16:29:47'),
(413,14,'Administrator','Login','Login','2020-05-20 16:29:48'),
(414,14,'Administrator','Login','Login','2020-05-20 16:29:48'),
(415,14,'Administrator','Login','Login','2020-05-20 16:29:48'),
(416,14,'Administrator','Login','Login','2020-05-20 16:29:49'),
(417,14,'Administrator','Login','Login','2020-05-20 16:29:49'),
(418,14,'Administrator','Login','Login','2020-05-20 16:29:50'),
(419,14,'Administrator','Login','Login','2020-05-20 16:29:52'),
(420,14,'Administrator','Login','Login','2020-05-20 16:29:53'),
(421,14,'Administrator','Login','Login','2020-05-20 16:29:53'),
(422,14,'Administrator','Login','Login','2020-05-20 16:29:53'),
(423,14,'Administrator','Login','Login','2020-05-20 16:29:54'),
(424,14,'Administrator','Login','Login','2020-05-20 16:29:54'),
(425,14,'Administrator','Login','Login','2020-05-20 16:29:55'),
(426,14,'Administrator','Login','Login','2020-05-20 16:29:56'),
(427,14,'Administrator','Login','Login','2020-05-20 16:29:56'),
(428,14,'Administrator','Login','Login','2020-05-20 16:29:58'),
(429,14,'Administrator','Login','Login','2020-05-20 16:29:58'),
(430,14,'Administrator','Login','Login','2020-05-20 16:29:59'),
(431,14,'Administrator','Login','Login','2020-05-20 16:29:59'),
(432,14,'Administrator','Login','Login','2020-05-20 16:29:59'),
(433,14,'Administrator','Login','Login','2020-05-20 16:30:00'),
(434,14,'Administrator','Login','Login','2020-05-20 16:30:02'),
(435,14,'Administrator','Login','Login','2020-05-20 16:30:02'),
(436,14,'Administrator','Login','Login','2020-05-20 16:30:03'),
(437,14,'Administrator','Login','Login','2020-05-20 16:30:04'),
(438,14,'Administrator','Login','Login','2020-05-20 16:30:05'),
(439,14,'Administrator','Login','Login','2020-05-20 16:30:05'),
(440,14,'Administrator','Login','Login','2020-05-20 16:30:06'),
(441,14,'Administrator','Login','Login','2020-05-20 16:30:06'),
(442,14,'Administrator','Login','Login','2020-05-20 16:30:08'),
(443,14,'Administrator','Login','Login','2020-05-20 16:30:09'),
(444,14,'Administrator','Login','Login','2020-05-20 16:30:09'),
(445,14,'Administrator','Login','Login','2020-05-20 16:30:10'),
(446,14,'Administrator','Login','Login','2020-05-20 16:30:11'),
(447,14,'Administrator','Login','Login','2020-05-20 16:30:12'),
(448,14,'Administrator','Login','Login','2020-05-20 16:30:12'),
(449,14,'Administrator','Login','Login','2020-05-20 16:30:12'),
(450,14,'Administrator','Login','Login','2020-05-20 16:30:12'),
(451,14,'Administrator','Login','Login','2020-05-20 16:30:15'),
(452,14,'Administrator','Login','Login','2020-05-20 16:30:19'),
(453,14,'Administrator','Login','Login','2020-05-20 16:30:19'),
(454,14,'Administrator','Login','Login','2020-05-20 16:30:20'),
(455,14,'Administrator','Login','Login','2020-05-20 16:30:22'),
(456,14,'Administrator','Login','Login','2020-05-20 16:30:22'),
(457,14,'Administrator','Login','Login','2020-05-20 16:30:22'),
(458,14,'Administrator','Login','Login','2020-05-20 16:30:30'),
(459,14,'Administrator','Login','Login','2020-05-20 16:30:30'),
(460,14,'Administrator','Login','Login','2020-05-20 16:30:31'),
(461,14,'Administrator','Login','Login','2020-05-20 16:30:32'),
(462,14,'Administrator','Login','Login','2020-05-20 16:30:39'),
(463,14,'Administrator','Login','Login','2020-05-20 16:30:40'),
(464,14,'Administrator','Login','Login','2020-05-20 16:30:43'),
(465,14,'Administrator','Login','Login','2020-05-20 16:30:43'),
(466,14,'Administrator','Login','Login','2020-05-20 16:30:43'),
(467,14,'Administrator','Login','Login','2020-05-20 16:30:43'),
(468,14,'Administrator','Login','Login','2020-05-20 16:30:49'),
(469,14,'Administrator','Login','Login','2020-05-20 16:30:49'),
(470,14,'Administrator','Login','Login','2020-05-20 16:30:50'),
(471,14,'Administrator','Login','Login','2020-05-20 16:30:50'),
(472,14,'Administrator','Login','Login','2020-05-20 16:30:51'),
(473,14,'Administrator','Login','Login','2020-05-20 16:30:51'),
(474,14,'Administrator','Login','Login','2020-05-20 16:30:51'),
(475,14,'Administrator','Login','Login','2020-05-20 16:30:56'),
(476,14,'Administrator','Login','Login','2020-05-20 16:30:57'),
(477,14,'Administrator','Login','Login','2020-05-20 16:30:57'),
(478,14,'Administrator','Login','Login','2020-05-20 16:30:57'),
(479,14,'Administrator','Login','Login','2020-05-20 16:30:58'),
(480,14,'Administrator','Login','Login','2020-05-20 16:31:00'),
(481,14,'Administrator','Login','Login','2020-05-20 16:31:00'),
(482,14,'Administrator','Login','Login','2020-05-20 16:31:01'),
(483,14,'Administrator','Login','Login','2020-05-20 16:31:02'),
(484,14,'Administrator','Login','Login','2020-05-20 16:31:02'),
(485,14,'Administrator','Login','Login','2020-05-20 16:31:04'),
(486,14,'Administrator','Login','Login','2020-05-20 16:31:04'),
(487,14,'Administrator','Login','Login','2020-05-20 16:31:04'),
(488,14,'Administrator','Login','Login','2020-05-20 16:31:05'),
(489,14,'Administrator','Login','Login','2020-05-20 16:31:05'),
(490,14,'Administrator','Login','Login','2020-05-20 16:31:06'),
(491,14,'Administrator','Login','Login','2020-05-20 16:31:06'),
(492,14,'Administrator','Login','Login','2020-05-20 16:31:07'),
(493,14,'Administrator','Login','Login','2020-05-20 16:31:08'),
(494,14,'Administrator','Login','Login','2020-05-20 16:31:09'),
(495,14,'Administrator','Login','Login','2020-05-20 16:31:10'),
(496,14,'Administrator','Login','Login','2020-05-20 16:31:11'),
(497,14,'Administrator','Login','Login','2020-05-20 16:31:11'),
(498,14,'Administrator','Login','Login','2020-05-20 16:31:11'),
(499,14,'Administrator','Login','Login','2020-05-20 16:31:12'),
(500,14,'Administrator','Login','Login','2020-05-20 16:31:13'),
(501,14,'Administrator','Login','Login','2020-05-20 16:31:13'),
(502,14,'Administrator','Login','Login','2020-05-20 16:31:15'),
(503,14,'Administrator','Login','Login','2020-05-20 16:31:16'),
(504,14,'Administrator','Login','Login','2020-05-20 16:31:16'),
(505,14,'Administrator','Login','Login','2020-05-20 16:31:16'),
(506,14,'Administrator','Login','Login','2020-05-20 16:31:17'),
(507,14,'Administrator','Login','Login','2020-05-20 16:31:17'),
(508,14,'Administrator','Login','Login','2020-05-20 16:31:18'),
(509,14,'Administrator','Login','Login','2020-05-20 16:31:19'),
(510,14,'Administrator','Login','Login','2020-05-20 16:31:19'),
(511,14,'Administrator','Login','Login','2020-05-20 16:31:21'),
(512,14,'Administrator','Login','Login','2020-05-20 16:31:22'),
(513,14,'Administrator','Login','Login','2020-05-20 16:31:22'),
(514,14,'Administrator','Login','Login','2020-05-20 16:31:22'),
(515,14,'Administrator','Login','Login','2020-05-20 16:31:23'),
(516,14,'Administrator','Login','Login','2020-05-20 16:31:23'),
(517,14,'Administrator','Login','Login','2020-05-20 16:31:24'),
(518,14,'Administrator','Login','Login','2020-05-20 16:31:25'),
(519,14,'Administrator','Login','Login','2020-05-20 16:31:25'),
(520,14,'Administrator','Login','Login','2020-05-20 16:31:26'),
(521,14,'Administrator','Login','Login','2020-05-20 16:31:27'),
(522,14,'Administrator','Login','Login','2020-05-20 16:31:28'),
(523,14,'Administrator','Login','Login','2020-05-20 16:31:28'),
(524,14,'Administrator','Login','Login','2020-05-20 16:31:30'),
(525,14,'Administrator','Login','Login','2020-05-20 16:31:30'),
(526,14,'Administrator','Login','Login','2020-05-20 16:31:31'),
(527,14,'Administrator','Login','Login','2020-05-20 16:31:31'),
(528,14,'Administrator','Login','Login','2020-05-20 16:31:32'),
(529,14,'Administrator','Login','Login','2020-05-20 16:31:32'),
(530,14,'Administrator','Login','Login','2020-05-20 16:31:33'),
(531,14,'Administrator','Login','Login','2020-05-20 16:31:33'),
(532,14,'Administrator','Login','Login','2020-05-20 16:31:35'),
(533,14,'Administrator','Login','Login','2020-05-20 16:31:35'),
(534,14,'Administrator','Login','Login','2020-05-20 16:31:36'),
(535,14,'Administrator','Login','Login','2020-05-20 16:31:37'),
(536,14,'Administrator','Login','Login','2020-05-20 16:31:37'),
(537,14,'Administrator','Login','Login','2020-05-20 16:31:38'),
(538,14,'Administrator','Login','Login','2020-05-20 16:31:38'),
(539,14,'Administrator','Login','Login','2020-05-20 16:31:39'),
(540,14,'Administrator','Login','Login','2020-05-20 16:31:39'),
(541,14,'Administrator','Login','Login','2020-05-20 16:31:41'),
(542,14,'Administrator','Login','Login','2020-05-20 16:31:42'),
(543,14,'Administrator','Login','Login','2020-05-20 16:31:42'),
(544,14,'Administrator','Login','Login','2020-05-20 16:31:43'),
(545,14,'Administrator','Login','Login','2020-05-20 16:31:43'),
(546,14,'Administrator','Login','Login','2020-05-20 16:31:44'),
(547,14,'Administrator','Login','Login','2020-05-20 16:31:44'),
(548,14,'Administrator','Login','Login','2020-05-20 16:31:45'),
(549,14,'Administrator','Login','Login','2020-05-20 16:31:46'),
(550,14,'Administrator','Login','Login','2020-05-20 16:31:47'),
(551,14,'Administrator','Login','Login','2020-05-20 16:31:48'),
(552,14,'Administrator','Login','Login','2020-05-20 16:31:49'),
(553,14,'Administrator','Login','Login','2020-05-20 16:31:49'),
(554,14,'Administrator','Login','Login','2020-05-20 16:31:49'),
(555,14,'Administrator','Login','Login','2020-05-20 16:31:50'),
(556,14,'Administrator','Login','Login','2020-05-20 16:31:52'),
(557,14,'Administrator','Login','Login','2020-05-20 16:31:52'),
(558,14,'Administrator','Login','Login','2020-05-20 16:31:52'),
(559,14,'Administrator','Login','Login','2020-05-20 16:31:53'),
(560,14,'Administrator','Login','Login','2020-05-20 16:31:54'),
(561,14,'Administrator','Login','Login','2020-05-20 16:31:55'),
(562,14,'Administrator','Login','Login','2020-05-20 16:31:55'),
(563,14,'Administrator','Login','Login','2020-05-20 16:31:57'),
(564,14,'Administrator','Login','Login','2020-05-20 16:31:57'),
(565,14,'Administrator','Login','Login','2020-05-20 16:31:58'),
(566,14,'Administrator','Login','Login','2020-05-20 16:31:59'),
(567,14,'Administrator','Login','Login','2020-05-20 16:31:59'),
(568,14,'Administrator','Login','Login','2020-05-20 16:32:00'),
(569,14,'Administrator','Login','Login','2020-05-20 16:32:01'),
(570,14,'Administrator','Login','Login','2020-05-20 16:32:01'),
(571,14,'Administrator','Login','Login','2020-05-20 16:32:04'),
(572,14,'Administrator','Login','Login','2020-05-20 16:32:06'),
(573,14,'Administrator','Login','Login','2020-05-20 16:32:06'),
(574,14,'Administrator','Login','Login','2020-05-20 16:32:06'),
(575,14,'Administrator','Login','Login','2020-05-20 16:32:07'),
(576,14,'Administrator','Login','Login','2020-05-20 16:32:07'),
(577,14,'Administrator','Login','Login','2020-05-20 16:32:08'),
(578,14,'Administrator','Login','Login','2020-05-20 16:32:09'),
(579,14,'Administrator','Login','Login','2020-05-20 16:32:10'),
(580,14,'Administrator','Login','Login','2020-05-20 16:32:13'),
(581,14,'Administrator','Login','Login','2020-05-20 16:32:13'),
(582,14,'Administrator','Login','Login','2020-05-20 16:32:15'),
(583,14,'Administrator','Login','Login','2020-05-20 16:32:21'),
(584,14,'Administrator','Login','Login','2020-05-20 16:32:22'),
(585,14,'Administrator','Login','Login','2020-05-20 16:32:36'),
(586,14,'Administrator','Login','Login','2020-05-20 16:32:36'),
(587,14,'Administrator','Login','Login','2020-05-20 16:32:37'),
(588,14,'Administrator','Login','Login','2020-05-20 16:32:37'),
(589,14,'Administrator','Login','Login','2020-05-20 16:32:43'),
(590,14,'Administrator','Login','Login','2020-05-20 16:32:44'),
(591,14,'Administrator','Login','Login','2020-05-20 16:32:45'),
(592,14,'Administrator','Login','Login','2020-05-20 16:32:45'),
(593,14,'Administrator','Login','Login','2020-05-20 16:32:53'),
(594,14,'Administrator','Login','Login','2020-05-20 16:32:53'),
(595,14,'Administrator','Login','Login','2020-05-20 16:33:00'),
(596,14,'Administrator','Login','Login','2020-05-20 16:33:00'),
(597,14,'Administrator','Login','Login','2020-05-20 16:33:03'),
(598,14,'Administrator','Login','Login','2020-05-20 16:33:05'),
(599,14,'Administrator','Login','Login','2020-05-20 16:33:06'),
(600,14,'Administrator','Login','Login','2020-05-20 16:33:10'),
(601,14,'Administrator','Login','Login','2020-05-20 16:33:11'),
(602,14,'Administrator','Login','Login','2020-05-20 16:33:16'),
(603,14,'Administrator','Login','Login','2020-05-20 16:33:20'),
(604,14,'Administrator','Login','Login','2020-05-20 16:33:20'),
(605,14,'Administrator','Login','Login','2020-05-20 16:33:21'),
(606,14,'Administrator','Login','Login','2020-05-20 16:35:44'),
(607,14,'Administrator','Login','Login','2020-05-20 16:35:46'),
(608,14,'Administrator','Login','Login','2020-05-20 16:35:56'),
(609,14,'Administrator','Login','Login','2020-05-20 16:36:00'),
(610,14,'Administrator','Login','Login','2020-05-20 16:36:02'),
(611,14,'Administrator','Login','Login','2020-05-20 16:36:02'),
(612,14,'Administrator','Login','Login','2020-05-20 16:36:02'),
(613,14,'Administrator','Login','Login','2020-05-20 16:36:02'),
(614,14,'Administrator','Login','Login','2020-05-20 16:36:03'),
(615,14,'Administrator','Login','Login','2020-05-20 16:36:03'),
(616,14,'Administrator','Login','Login','2020-05-20 16:36:05'),
(617,14,'Administrator','Login','Login','2020-05-20 16:36:05'),
(618,14,'Administrator','Login','Login','2020-05-20 16:36:08'),
(619,14,'Administrator','Login','Login','2020-05-20 16:36:09'),
(620,14,'Administrator','Login','Login','2020-05-20 16:36:09'),
(621,14,'Administrator','Login','Login','2020-05-20 16:36:09'),
(622,14,'Administrator','Login','Login','2020-05-20 16:36:09'),
(623,14,'Administrator','Login','Login','2020-05-20 16:36:10'),
(624,14,'Administrator','Login','Login','2020-05-20 16:36:10'),
(625,14,'Administrator','Login','Login','2020-05-20 16:36:10'),
(626,14,'Administrator','Login','Login','2020-05-20 16:36:13'),
(627,14,'Administrator','Login','Login','2020-05-20 16:36:14'),
(628,14,'Administrator','Login','Login','2020-05-20 16:36:15'),
(629,14,'Administrator','Login','Login','2020-05-20 16:36:15'),
(630,14,'Administrator','Login','Login','2020-05-20 16:36:15'),
(631,14,'Administrator','Login','Login','2020-05-20 16:36:16'),
(632,14,'Administrator','Login','Login','2020-05-20 16:36:16'),
(633,14,'Administrator','Login','Login','2020-05-20 16:36:18'),
(634,14,'Administrator','Login','Login','2020-05-20 16:36:18'),
(635,14,'Administrator','Login','Login','2020-05-20 16:36:20'),
(636,14,'Administrator','Login','Login','2020-05-20 16:36:20'),
(637,14,'Administrator','Login','Login','2020-05-20 16:36:21'),
(638,14,'Administrator','Login','Login','2020-05-20 16:36:21'),
(639,14,'Administrator','Login','Login','2020-05-20 16:36:22'),
(640,14,'Administrator','Login','Login','2020-05-20 16:36:23'),
(641,14,'Administrator','Login','Login','2020-05-20 16:36:26'),
(642,14,'Administrator','Login','Login','2020-05-20 16:36:32'),
(643,14,'Administrator','Login','Login','2020-05-20 16:36:32'),
(644,14,'Administrator','Login','Login','2020-05-20 16:36:33'),
(645,14,'Administrator','Login','Login','2020-05-20 16:36:33'),
(646,14,'Administrator','Login','Login','2020-05-20 16:36:33'),
(647,14,'Administrator','Login','Login','2020-05-20 16:36:38'),
(648,14,'Administrator','Login','Login','2020-05-20 16:37:50'),
(649,14,'Administrator','Login','Login','2020-05-20 16:37:51'),
(650,14,'Administrator','Login','Login','2020-05-20 16:37:59'),
(651,14,'Administrator','Login','Login','2020-05-20 16:38:00'),
(652,14,'Administrator','Login','Login','2020-05-20 16:38:01'),
(653,14,'Administrator','Login','Login','2020-05-20 16:38:02'),
(654,14,'Administrator','Login','Login','2020-05-20 16:38:12'),
(655,14,'Administrator','Login','Login','2020-05-20 16:39:58'),
(656,14,'Administrator','Login','Login','2020-05-20 16:39:58'),
(657,14,'Administrator','Login','Login','2020-05-20 16:40:09'),
(658,14,'Administrator','Login','Login','2020-05-20 16:40:36'),
(659,14,'Administrator','Login','Login','2020-05-20 16:40:36'),
(660,14,'Administrator','Login','Login','2020-05-20 16:40:36'),
(661,14,'Administrator','Login','Login','2020-05-20 16:40:36'),
(662,14,'Administrator','Login','Login','2020-05-20 16:40:36'),
(663,14,'Administrator','Login','Login','2020-05-20 16:40:37'),
(664,14,'Administrator','Login','Login','2020-05-20 16:40:37'),
(665,14,'Administrator','Login','Login','2020-05-20 16:40:38'),
(666,14,'Administrator','Login','Login','2020-05-20 16:40:39'),
(667,14,'Administrator','Login','Login','2020-05-20 16:40:41'),
(668,14,'Administrator','Login','Login','2020-05-20 16:40:41'),
(669,14,'Administrator','Login','Login','2020-05-20 16:40:42'),
(670,14,'Administrator','Login','Login','2020-05-20 16:40:42'),
(671,14,'Administrator','Login','Login','2020-05-20 16:40:42'),
(672,14,'Administrator','Login','Login','2020-05-20 16:40:43'),
(673,14,'Administrator','Login','Login','2020-05-20 16:40:43'),
(674,14,'Administrator','Login','Login','2020-05-20 16:40:44'),
(675,14,'Administrator','Login','Login','2020-05-20 16:40:44'),
(676,14,'Administrator','Login','Login','2020-05-20 16:40:48'),
(677,14,'Administrator','Login','Login','2020-05-20 16:40:49'),
(678,14,'Administrator','Login','Login','2020-05-20 16:40:49'),
(679,14,'Administrator','Login','Login','2020-05-20 16:40:55'),
(680,14,'Administrator','Login','Login','2020-05-20 16:40:58'),
(681,14,'Administrator','Login','Login','2020-05-20 16:40:58'),
(682,14,'Administrator','Login','Login','2020-05-20 16:41:28'),
(683,14,'Administrator','Login','Login','2020-05-20 16:41:34'),
(684,14,'Administrator','Login','Login','2020-05-20 16:43:42'),
(685,14,'Administrator','Login','Login','2020-05-20 16:43:47'),
(686,14,'Administrator','Login','Login','2020-05-20 16:43:52'),
(687,14,'Administrator','Login','Login','2020-05-20 16:52:30'),
(688,14,'Administrator','Login','Login','2020-05-20 16:52:36'),
(689,14,'Administrator','Login','Login','2020-05-20 17:02:54'),
(690,14,'Administrator','Login','Login','2020-05-20 17:02:54'),
(691,14,'Administrator','Login','Login','2020-05-20 17:02:59'),
(692,14,'Administrator','Login','Login','2020-05-20 17:03:00'),
(693,14,'Administrator','Login','Login','2020-05-20 17:03:06'),
(694,14,'Administrator','Login','Login','2020-05-20 17:03:27'),
(695,14,'Administrator','Login','Login','2020-05-20 17:03:31'),
(696,14,'Administrator','Login','Login','2020-05-20 17:03:32'),
(697,14,'Administrator','Login','Login','2020-05-20 17:03:33'),
(698,14,'Administrator','Login','Login','2020-05-20 17:03:36'),
(699,14,'Administrator','Login','Login','2020-05-20 17:03:38'),
(700,14,'Administrator','Login','Login','2020-05-20 17:03:41'),
(701,14,'Administrator','Login','Login','2020-05-20 17:03:44'),
(702,14,'Administrator','Login','Login','2020-05-20 17:03:47'),
(703,14,'Administrator','Login','Login','2020-05-20 17:03:48'),
(704,14,'Administrator','Login','Login','2020-05-20 17:03:50'),
(705,14,'Administrator','Login','Login','2020-05-20 17:03:52'),
(706,14,'Administrator','Login','Login','2020-05-20 17:03:53'),
(707,14,'Administrator','Login','Login','2020-05-20 17:03:56'),
(708,14,'Administrator','Login','Login','2020-05-20 17:03:59'),
(709,14,'Administrator','Login','Login','2020-05-20 17:04:02'),
(710,14,'Administrator','Login','Login','2020-05-20 17:04:05'),
(711,14,'Administrator','Login','Login','2020-05-20 17:04:07'),
(712,14,'Administrator','Login','Login','2020-05-20 17:04:07'),
(713,14,'Administrator','Login','Login','2020-05-20 17:04:11'),
(714,14,'Administrator','Login','Login','2020-05-20 17:04:13'),
(715,14,'Administrator','Login','Login','2020-05-20 17:04:19'),
(716,14,'Administrator','Login','Login','2020-05-20 17:04:19'),
(717,14,'Administrator','Login','Login','2020-05-20 17:04:19'),
(718,14,'Administrator','Login','Login','2020-05-20 17:04:24'),
(719,14,'Administrator','Login','Login','2020-05-20 17:04:25'),
(720,14,'Administrator','Login','Login','2020-05-20 17:04:25'),
(721,14,'Administrator','Login','Login','2020-05-20 17:04:30'),
(722,14,'Administrator','Login','Login','2020-05-20 17:04:31'),
(723,14,'Administrator','Login','Login','2020-05-20 17:04:34'),
(724,14,'Administrator','Login','Login','2020-05-20 17:04:37'),
(725,14,'Administrator','Login','Login','2020-05-20 17:04:38'),
(726,14,'Administrator','Login','Login','2020-05-20 17:04:39'),
(727,14,'Administrator','Login','Login','2020-05-20 17:04:42'),
(728,14,'Administrator','Login','Login','2020-05-20 17:04:44'),
(729,14,'Administrator','Login','Login','2020-05-20 17:04:45'),
(730,14,'Administrator','Login','Login','2020-05-20 17:04:48'),
(731,14,'Administrator','Login','Login','2020-05-20 17:04:50'),
(732,14,'Administrator','Login','Login','2020-05-20 17:04:51'),
(733,14,'Administrator','Login','Login','2020-05-20 17:04:55'),
(734,14,'Administrator','Login','Login','2020-05-20 17:04:56'),
(735,14,'Administrator','Login','Login','2020-05-20 17:04:57'),
(736,14,'Administrator','Login','Login','2020-05-20 17:05:01'),
(737,14,'Administrator','Login','Login','2020-05-20 17:05:02'),
(738,14,'Administrator','Login','Login','2020-05-20 17:05:06'),
(739,14,'Administrator','Login','Login','2020-05-20 17:05:08'),
(740,14,'Administrator','Login','Login','2020-05-20 17:05:08'),
(741,14,'Administrator','Login','Login','2020-05-20 17:05:11'),
(742,14,'Administrator','Login','Login','2020-05-20 17:05:14'),
(743,14,'Administrator','Login','Login','2020-05-20 17:05:17'),
(744,14,'Administrator','Login','Login','2020-05-20 17:05:17'),
(745,14,'Administrator','Login','Login','2020-05-20 17:05:20'),
(746,14,'Administrator','Login','Login','2020-05-20 17:05:23'),
(747,14,'Administrator','Login','Login','2020-05-20 17:05:23'),
(748,14,'Administrator','Login','Login','2020-05-20 17:05:26'),
(749,14,'Administrator','Login','Login','2020-05-20 17:05:29'),
(750,14,'Administrator','Login','Login','2020-05-20 17:05:33'),
(751,14,'Administrator','Login','Login','2020-05-20 17:05:34'),
(752,14,'Administrator','Login','Login','2020-05-20 17:05:38'),
(753,14,'Administrator','Login','Login','2020-05-20 17:05:39'),
(754,14,'Administrator','Login','Login','2020-05-20 17:05:39'),
(755,14,'Administrator','Login','Login','2020-05-20 17:05:44'),
(756,14,'Administrator','Login','Login','2020-05-20 17:05:46'),
(757,14,'Administrator','Login','Login','2020-05-20 17:05:47'),
(758,14,'Administrator','Login','Login','2020-05-20 17:05:50'),
(759,14,'Administrator','Login','Login','2020-05-20 17:05:51'),
(760,14,'Administrator','Login','Login','2020-05-20 17:05:52'),
(761,14,'Administrator','Login','Login','2020-05-20 17:05:59'),
(762,14,'Administrator','Login','Login','2020-05-20 17:06:00'),
(763,14,'Administrator','Login','Login','2020-05-20 17:06:02'),
(764,14,'Administrator','Login','Login','2020-05-20 17:06:06'),
(765,14,'Administrator','Login','Login','2020-05-20 17:06:08'),
(766,14,'Administrator','Login','Login','2020-05-20 17:06:13'),
(767,14,'Administrator','Login','Login','2020-05-20 17:06:16'),
(768,14,'Administrator','Login','Login','2020-05-20 17:06:18'),
(769,14,'Administrator','Login','Login','2020-05-20 17:06:22'),
(770,14,'Administrator','Login','Login','2020-05-20 17:06:27'),
(771,14,'Administrator','Login','Login','2020-05-20 17:06:28'),
(772,14,'Administrator','Login','Login','2020-05-20 17:06:32'),
(773,14,'Administrator','Login','Login','2020-05-20 17:06:33'),
(774,14,'Administrator','Login','Login','2020-05-20 17:17:11'),
(775,14,'Administrator','Login','Login','2020-05-20 17:17:17'),
(776,14,'Administrator','Login','Login','2020-05-20 17:17:18'),
(777,14,'Administrator','Login','Login','2020-05-20 17:17:23'),
(778,14,'Administrator','Login','Login','2020-05-20 17:18:07'),
(779,14,'Administrator','Login','Login','2020-05-20 17:18:13'),
(780,14,'Administrator','Login','Login','2020-05-20 17:18:15'),
(781,14,'Administrator','Login','Login','2020-05-20 17:18:21'),
(782,14,'Administrator','Login','Login','2020-05-20 17:18:26'),
(783,14,'Administrator','Login','Login','2020-05-20 17:18:27'),
(784,14,'Administrator','Login','Login','2020-05-20 17:18:31'),
(785,14,'Administrator','Login','Login','2020-05-20 17:18:37'),
(786,14,'Administrator','Login','Login','2020-05-20 17:18:38'),
(787,14,'Administrator','Login','Login','2020-05-20 17:18:43'),
(788,14,'Administrator','Login','Login','2020-05-20 17:18:44'),
(789,14,'Administrator','Login','Login','2020-05-20 17:18:51'),
(790,14,'Administrator','Login','Login','2020-05-20 17:18:55'),
(791,14,'Administrator','Login','Login','2020-05-20 17:18:57'),
(792,14,'Administrator','Login','Login','2020-05-20 17:19:01'),
(793,14,'Administrator','Login','Login','2020-05-20 17:19:07'),
(794,14,'Administrator','Login','Login','2020-05-20 17:19:13'),
(795,14,'Administrator','Login','Login','2020-05-20 17:19:15'),
(796,14,'Administrator','Login','Login','2020-05-20 17:19:20'),
(797,14,'Administrator','Login','Login','2020-05-20 17:19:21'),
(798,14,'Administrator','Login','Login','2020-05-20 17:19:22'),
(799,14,'Administrator','Login','Login','2020-05-20 17:19:27'),
(800,14,'Administrator','Login','Login','2020-05-20 17:19:31'),
(801,14,'Administrator','Login','Login','2020-05-20 17:19:34'),
(802,14,'Administrator','Login','Login','2020-05-20 17:19:36'),
(803,14,'Administrator','Login','Login','2020-05-20 17:19:39'),
(804,14,'Administrator','Login','Login','2020-05-20 17:19:41'),
(805,14,'Administrator','Login','Login','2020-05-20 17:19:49'),
(806,14,'Administrator','Login','Login','2020-05-20 17:19:50'),
(807,14,'Administrator','Login','Login','2020-05-20 17:19:56'),
(808,14,'Administrator','Login','Login','2020-05-20 17:19:59'),
(809,14,'Administrator','Login','Login','2020-05-20 17:20:03'),
(810,14,'Administrator','Login','Login','2020-05-20 17:20:09'),
(811,14,'Administrator','Login','Login','2020-05-20 17:20:13'),
(812,14,'Administrator','Login','Login','2020-05-20 17:20:13'),
(813,14,'Administrator','Login','Login','2020-05-20 17:20:21'),
(814,14,'Administrator','Login','Login','2020-05-20 17:20:22'),
(815,14,'Administrator','Login','Login','2020-05-20 17:20:24'),
(816,14,'Administrator','Login','Login','2020-05-20 17:20:28'),
(817,14,'Administrator','Login','Login','2020-05-20 17:20:29'),
(818,14,'Administrator','Login','Login','2020-05-20 17:20:30'),
(819,14,'Administrator','Login','Login','2020-05-20 17:20:34'),
(820,14,'Administrator','Login','Login','2020-05-20 17:20:34'),
(821,14,'Administrator','Login','Login','2020-05-20 17:20:37'),
(822,14,'Administrator','Login','Login','2020-05-20 17:20:42'),
(823,14,'Administrator','Login','Login','2020-05-20 17:20:44'),
(824,14,'Administrator','Login','Login','2020-05-20 17:20:45'),
(825,14,'Administrator','Login','Login','2020-05-20 17:20:48'),
(826,14,'Administrator','Login','Login','2020-05-20 17:20:53'),
(827,14,'Administrator','Login','Login','2020-05-20 17:21:06'),
(828,14,'Administrator','Login','Login','2020-05-20 17:21:38'),
(829,14,'Administrator','Login','Login','2020-05-20 17:21:39'),
(830,14,'Administrator','Login','Login','2020-05-20 17:21:43'),
(831,14,'Administrator','Login','Login','2020-05-20 17:21:44'),
(832,14,'Administrator','Login','Login','2020-05-20 17:21:49'),
(833,14,'Administrator','Login','Login','2020-05-20 17:21:50'),
(834,14,'Administrator','Login','Login','2020-05-20 17:21:54'),
(835,14,'Administrator','Login','Login','2020-05-20 17:21:56'),
(836,14,'Administrator','Login','Login','2020-05-20 17:22:56'),
(837,14,'Administrator','Login','Login','2020-05-20 17:22:57'),
(838,14,'Administrator','Login','Login','2020-05-20 17:22:57'),
(839,14,'Administrator','Login','Login','2020-05-20 17:22:58'),
(840,14,'Administrator','Login','Login','2020-05-20 17:23:02'),
(841,14,'Administrator','Login','Login','2020-05-20 17:23:02'),
(842,14,'Administrator','Login','Login','2020-05-20 17:23:03'),
(843,14,'Administrator','Login','Login','2020-05-20 17:23:03'),
(844,14,'Administrator','Login','Login','2020-05-20 17:23:08'),
(845,14,'Administrator','Login','Login','2020-05-20 17:23:08'),
(846,14,'Administrator','Login','Login','2020-05-20 17:23:08'),
(847,14,'Administrator','Login','Login','2020-05-20 17:23:10'),
(848,14,'Administrator','Login','Login','2020-05-20 17:23:13'),
(849,14,'Administrator','Login','Login','2020-05-20 17:23:13'),
(850,14,'Administrator','Login','Login','2020-05-20 17:23:14'),
(851,14,'Administrator','Login','Login','2020-05-20 17:23:15'),
(852,14,'Administrator','Login','Login','2020-05-20 17:23:18'),
(853,14,'Administrator','Login','Login','2020-05-20 17:23:18'),
(854,14,'Administrator','Login','Login','2020-05-20 17:23:21'),
(855,14,'Administrator','Login','Login','2020-05-20 17:23:21'),
(856,14,'Administrator','Login','Login','2020-05-20 17:23:24'),
(857,14,'Administrator','Login','Login','2020-05-20 17:23:25'),
(858,14,'Administrator','Login','Login','2020-05-20 17:23:26'),
(859,14,'Administrator','Login','Login','2020-05-20 17:23:27'),
(860,14,'Administrator','Login','Login','2020-05-20 17:23:30'),
(861,14,'Administrator','Login','Login','2020-05-20 17:23:30'),
(862,14,'Administrator','Login','Login','2020-05-20 17:23:32'),
(863,14,'Administrator','Login','Login','2020-05-20 17:23:33'),
(864,14,'Administrator','Login','Login','2020-05-20 17:23:35'),
(865,14,'Administrator','Login','Login','2020-05-20 17:23:36'),
(866,14,'Administrator','Login','Login','2020-05-20 17:23:37'),
(867,14,'Administrator','Login','Login','2020-05-20 17:23:40'),
(868,14,'Administrator','Login','Login','2020-05-20 17:23:40'),
(869,14,'Administrator','Login','Login','2020-05-20 17:23:41'),
(870,14,'Administrator','Login','Login','2020-05-20 17:23:42'),
(871,14,'Administrator','Login','Login','2020-05-20 17:23:46'),
(872,14,'Administrator','Login','Login','2020-05-20 17:23:46'),
(873,14,'Administrator','Login','Login','2020-05-20 17:23:46'),
(874,14,'Administrator','Login','Login','2020-05-20 17:23:47'),
(875,14,'Administrator','Login','Login','2020-05-20 17:23:52'),
(876,14,'Administrator','Login','Login','2020-05-20 17:23:53'),
(877,14,'Administrator','Login','Login','2020-05-20 17:23:53'),
(878,14,'Administrator','Login','Login','2020-05-20 17:23:54'),
(879,14,'Administrator','Login','Login','2020-05-20 17:23:57'),
(880,14,'Administrator','Login','Login','2020-05-20 17:23:58'),
(881,14,'Administrator','Login','Login','2020-05-20 17:23:58'),
(882,14,'Administrator','Login','Login','2020-05-20 17:23:59'),
(883,14,'Administrator','Login','Login','2020-05-20 17:23:59'),
(884,14,'Administrator','Login','Login','2020-05-20 17:24:03'),
(885,14,'Administrator','Login','Login','2020-05-20 17:24:03'),
(886,14,'Administrator','Login','Login','2020-05-20 17:24:04'),
(887,14,'Administrator','Login','Login','2020-05-20 17:24:04'),
(888,14,'Administrator','Login','Login','2020-05-20 17:24:05'),
(889,14,'Administrator','Login','Login','2020-05-20 17:24:08'),
(890,14,'Administrator','Login','Login','2020-05-20 17:24:09'),
(891,14,'Administrator','Login','Login','2020-05-20 17:24:09'),
(892,14,'Administrator','Login','Login','2020-05-20 17:24:10'),
(893,14,'Administrator','Login','Login','2020-05-20 17:24:11'),
(894,14,'Administrator','Login','Login','2020-05-20 17:24:13'),
(895,14,'Administrator','Login','Login','2020-05-20 17:24:14'),
(896,14,'Administrator','Login','Login','2020-05-20 17:24:15'),
(897,14,'Administrator','Login','Login','2020-05-20 17:24:15'),
(898,14,'Administrator','Login','Login','2020-05-20 17:24:16'),
(899,14,'Administrator','Login','Login','2020-05-20 17:24:18'),
(900,14,'Administrator','Login','Login','2020-05-20 17:24:19'),
(901,14,'Administrator','Login','Login','2020-05-20 17:24:20'),
(902,14,'Administrator','Login','Login','2020-05-20 17:24:21'),
(903,14,'Administrator','Login','Login','2020-05-20 17:24:23'),
(904,14,'Administrator','Login','Login','2020-05-20 17:24:24'),
(905,14,'Administrator','Login','Login','2020-05-20 17:24:24'),
(906,14,'Administrator','Login','Login','2020-05-20 17:24:26'),
(907,14,'Administrator','Login','Login','2020-05-20 17:24:26'),
(908,14,'Administrator','Login','Login','2020-05-20 17:24:28'),
(909,14,'Administrator','Login','Login','2020-05-20 17:24:30'),
(910,14,'Administrator','Login','Login','2020-05-20 17:24:30'),
(911,14,'Administrator','Login','Login','2020-05-20 17:24:31'),
(912,14,'Administrator','Login','Login','2020-05-20 17:24:32'),
(913,14,'Administrator','Login','Login','2020-05-20 17:24:34'),
(914,14,'Administrator','Login','Login','2020-05-20 17:24:35'),
(915,14,'Administrator','Login','Login','2020-05-20 17:24:35'),
(916,14,'Administrator','Login','Login','2020-05-20 17:24:37'),
(917,14,'Administrator','Login','Login','2020-05-20 17:24:38'),
(918,14,'Administrator','Login','Login','2020-05-20 17:24:40'),
(919,14,'Administrator','Login','Login','2020-05-20 17:24:40'),
(920,14,'Administrator','Login','Login','2020-05-20 17:24:41'),
(921,14,'Administrator','Login','Login','2020-05-20 17:24:43'),
(922,14,'Administrator','Login','Login','2020-05-20 17:24:43'),
(923,14,'Administrator','Login','Login','2020-05-20 17:24:45'),
(924,14,'Administrator','Login','Login','2020-05-20 17:24:46'),
(925,14,'Administrator','Login','Login','2020-05-20 17:24:47'),
(926,14,'Administrator','Login','Login','2020-05-20 17:24:48'),
(927,14,'Administrator','Login','Login','2020-05-20 17:24:49'),
(928,14,'Administrator','Login','Login','2020-05-20 17:24:53'),
(929,14,'Administrator','Login','Login','2020-05-20 17:24:53'),
(930,14,'Administrator','Login','Login','2020-05-20 17:24:54'),
(931,14,'Administrator','Login','Login','2020-05-20 17:24:55'),
(932,14,'Administrator','Login','Login','2020-05-20 17:24:59'),
(933,14,'Administrator','Login','Login','2020-05-20 17:25:00'),
(934,14,'Administrator','Login','Login','2020-05-20 17:25:11'),
(935,14,'Administrator','Login','Login','2020-05-20 17:25:11'),
(936,14,'Administrator','Login','Login','2020-05-20 17:25:17'),
(937,14,'Administrator','Login','Login','2020-05-20 17:25:19'),
(938,14,'Administrator','Login','Login','2020-05-20 17:25:19'),
(939,14,'Administrator','Login','Login','2020-05-20 17:25:20'),
(940,14,'Administrator','Login','Login','2020-05-20 17:25:21'),
(941,14,'Administrator','Login','Login','2020-05-20 17:25:21'),
(942,14,'Administrator','Login','Login','2020-05-20 17:25:25'),
(943,14,'Administrator','Login','Login','2020-05-20 17:25:25'),
(944,14,'Administrator','Login','Login','2020-05-20 17:25:26'),
(945,14,'Administrator','Login','Login','2020-05-20 17:25:26'),
(946,14,'Administrator','Login','Login','2020-05-20 17:25:26'),
(947,14,'Administrator','Login','Login','2020-05-20 17:25:27'),
(948,14,'Administrator','Login','Login','2020-05-20 17:25:33'),
(949,14,'Administrator','Login','Login','2020-05-20 17:25:33'),
(950,14,'Administrator','Login','Login','2020-05-20 17:25:43'),
(951,14,'Administrator','Login','Login','2020-05-20 17:25:50'),
(952,14,'Administrator','Login','Login','2020-05-20 17:25:52'),
(953,14,'Administrator','Login','Login','2020-05-20 17:25:58'),
(954,14,'Administrator','Login','Login','2020-05-20 17:26:07'),
(955,14,'Administrator','Login','Login','2020-05-20 17:30:40'),
(956,14,'Administrator','Login','Login','2020-05-20 17:30:40'),
(957,14,'Administrator','Login','Login','2020-05-20 17:30:42'),
(958,14,'Administrator','Login','Login','2020-05-20 17:30:42'),
(959,14,'Administrator','Login','Login','2020-05-20 17:30:43'),
(960,14,'Administrator','Login','Login','2020-05-20 17:30:43'),
(961,14,'Administrator','Login','Login','2020-05-20 17:30:45'),
(962,14,'Administrator','Login','Login','2020-05-20 17:30:45'),
(963,14,'Administrator','Login','Login','2020-05-20 17:30:48'),
(964,14,'Administrator','Login','Login','2020-05-20 17:30:48'),
(965,14,'Administrator','Login','Login','2020-05-20 17:30:49'),
(966,14,'Administrator','Login','Login','2020-05-20 17:30:50'),
(967,14,'Administrator','Login','Login','2020-05-20 17:30:50'),
(968,14,'Administrator','Login','Login','2020-05-20 17:30:51'),
(969,14,'Administrator','Login','Login','2020-05-20 17:30:51'),
(970,14,'Administrator','Login','Login','2020-05-20 17:30:53'),
(971,14,'Administrator','Login','Login','2020-05-20 17:30:53'),
(972,14,'Administrator','Login','Login','2020-05-20 17:30:54'),
(973,14,'Administrator','Login','Login','2020-05-20 17:30:56'),
(974,14,'Administrator','Login','Login','2020-05-20 17:30:56'),
(975,14,'Administrator','Login','Login','2020-05-20 17:30:56'),
(976,14,'Administrator','Login','Login','2020-05-20 17:30:56'),
(977,14,'Administrator','Login','Login','2020-05-20 17:30:56'),
(978,14,'Administrator','Login','Login','2020-05-20 17:30:58'),
(979,14,'Administrator','Login','Login','2020-05-20 17:30:59'),
(980,14,'Administrator','Login','Login','2020-05-20 17:30:59'),
(981,14,'Administrator','Login','Login','2020-05-20 17:31:01'),
(982,14,'Administrator','Login','Login','2020-05-20 17:31:03'),
(983,14,'Administrator','Login','Login','2020-05-20 17:31:04'),
(984,14,'Administrator','Login','Login','2020-05-20 17:31:10'),
(985,14,'Administrator','Login','Login','2020-05-20 17:31:10'),
(986,14,'Administrator','Login','Login','2020-05-20 17:31:11'),
(987,14,'Administrator','Login','Login','2020-05-20 17:31:11'),
(988,14,'Administrator','Login','Login','2020-05-20 17:31:11'),
(989,14,'Administrator','Login','Login','2020-05-20 17:36:19'),
(990,14,'Administrator','Login','Login','2020-05-20 17:36:19'),
(991,14,'Administrator','Login','Login','2020-05-20 17:36:19'),
(992,14,'Administrator','Login','Login','2020-05-20 17:36:19'),
(993,14,'Administrator','Login','Login','2020-05-20 17:36:19'),
(994,14,'Administrator','Login','Login','2020-05-20 17:36:19'),
(995,14,'Administrator','Login','Login','2020-05-20 17:36:19'),
(996,14,'Administrator','Login','Login','2020-05-20 17:36:19'),
(997,14,'Administrator','Login','Login','2020-05-22 12:32:38'),
(998,14,'Administrator','Login','Login','2020-05-22 15:16:09'),
(999,14,'Administrator','Login','Login','2020-05-22 16:40:45'),
(1000,14,'Administrator','Login','Login','2020-05-26 09:46:15'),
(1001,14,'Administrator','Login','Login','2020-05-31 11:20:37'),
(1142,14,'Administrator','Login','Login','2020-06-05 13:10:32');

/*Table structure for table `main_menu` */

DROP TABLE IF EXISTS `main_menu`;

CREATE TABLE `main_menu` (
  `id_menu` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(250) DEFAULT NULL,
  `level` enum('1','2') DEFAULT NULL,
  `id_main` int(11) DEFAULT '0',
  `icon` varchar(250) DEFAULT NULL,
  `hak_akses` int(11) DEFAULT NULL,
  `link` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=MyISAM AUTO_INCREMENT=2823 DEFAULT CHARSET=latin1;

/*Data for the table `main_menu` */

insert  into `main_menu`(`id_menu`,`nama`,`level`,`id_main`,`icon`,`hak_akses`,`link`) values 
(1,'Konfigurasi','1',0,'fa fa-cog',1,'super/konfig'),
(2,'User Group','1',0,'fa fa-users',1,'super/manajemen'),
(4,'Tracking Log','1',0,'fa fa-paw',1,'super/log'),
(3,'Data User','1',0,'fa fa-user',1,'super/data_user'),
(5,'Control System','1',0,'fa fa-check-square-o',1,'super/control_sys');

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
('Subbagian Pengelolaan Pusat Jaringan Data','Laki-Laki','Kementerian Sekretariat Negara','Bagian Infrastruktur dan Layanan Teknologi Informasi','','mufti.rizal@setneg.go.id','198206082005011001','broadcast','IV.a.','Biro Informasi dan Teknologi','Mufti Rizal, S.Kom., M.T.I.','Sekretariat Kementerian','18000485015012018090733.jpg','Kementerian Sekretariat Negara','Kepala Subbagian Pengelolaan Pusat Jaringan Data, Bagian Infrastruktur dan Layanan Teknologi Informasi, Biro Informasi dan Teknologi, Sekretariat Kementerian Sekretariat Negara'),
('Subbagian Otomasi Perkantoran','Perempuan','Kementerian Sekretariat Negara','Bagian Aplikasi Sistem Informasi','','rinasagita5202@gmail.com','198410022008012001','pimpinan','IV.a.','Biro Informasi dan Teknologi','Rina Sagita Wardany, S.T.','Sekretariat Kementerian','18000520211012018090126.jpg','Kementerian Sekretariat Negara','Kepala Subbagian Otomasi Perkantoran, Bagian Aplikasi Sistem Informasi, Biro Informasi dan Teknologi, Sekretariat Kementerian Sekretariat Negara'),
('','Laki-Laki','Kementerian Sekretariat Negara','Bagian Aplikasi Sistem Informasi','','abichristianto@gmail.com','199107252018011003','180005872','','Biro Informasi dan Teknologi','Abi Christianto, S.Kom.','Sekretariat Kementerian','19910725201801100328032018030231.jpg','Kementerian Sekretariat Negara','Pranata Komputer Ahli Pertama pada  Biro Informasi dan Teknologi, Sekretariat Kementerian'),
(NULL,NULL,NULL,NULL,NULL,NULL,'','pandu.pandang',NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `pengaturan` */

DROP TABLE IF EXISTS `pengaturan`;

CREATE TABLE `pengaturan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_pengaturan` varchar(35) DEFAULT NULL,
  `val` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `pengaturan` */

insert  into `pengaturan`(`id`,`nama_pengaturan`,`val`) values 
(1,'alamat url publik','http://localhost/pandudepan'),
(2,'capchat','9CAEE30F-28BF4B25-89FD28B7-66D4CA38'),
(3,'alamat api whatsapp biasa','https://selo.wablas.com/api/send-message'),
(4,'token api whatsapp','cYY9OTs9v4N9C64X0CSoVtehGDDRV03pv6gYO0MZXgSb2txbiqYCVaGEGWvxmP1Xd'),
(5,'Mail Host','192.168.1.9'),
(7,'footer','protokol kepresidenan<br>sekretariat negara'),
(8,'Mail Port','25'),
(9,'mail SMTPSecure ','tls'),
(10,'api whatsapp documen','https://selo.wablas.com/api/send-document'),
(11,'ig','pandu'),
(12,'fungsi aplikasi','ISTANA NEGARA'),
(13,'wa notifikasi umum','Mohon periksan email anda.'),
(14,'wa notifikasi umum english','Please check your mail'),
(15,'js','chanel.js'),
(16,'pajak','15'),
(6,'KLIENT','Sekretariat Negara'),
(17,'tahun kegiatan','2020'),
(18,'Nama Aplikasi','PANDU ACARA'),
(19,'from_email','no-replay@setneg.go.id'),
(20,'smtp_user','pandu@setneg.go.id'),
(21,'pass mail','Pd10@2020'),
(22,'Bapak','Ir. Joko Widodo'),
(23,'ibu negara english','Mrs. Iriana Joko Widodo'),
(24,'ibu negara','Hj. Iriana Joko Widodo'),
(25,'path upload','D:\\SERVER\\htdocs\\pandu\\'),
(26,'link foto pegawai','https://simsdm.setneg.go.id/picture/gambar/'),
(27,'esign id_subscriber: ','78553b75-ff38-4817-a207-d8077588f97c'),
(28,'esign passphrase :','#1234qwer*'),
(29,'esign link curl:','https://esign.dev.setneg.go.id/api/sign/pdf?'),
(30,'esign text :','Dokumen ini ditandatangani secara elektronik.');

/*Table structure for table `template_undangan` */

DROP TABLE IF EXISTS `template_undangan`;

CREATE TABLE `template_undangan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_acara` int(11) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `poto` varchar(100) DEFAULT NULL,
  `isi` text,
  `isi_inggris` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `template_undangan` */

insert  into `template_undangan`(`id`,`id_acara`,`nama`,`poto`,`isi`,`isi_inggris`) values 
(1,2,'ccc','temp___06072020122232.jpg','<div style=\"text-align:center\"><span class=\"monotype\"><span style=\"font-size:16px\"><span style=\"line-height:1\"><strong>MENTERI SEKRETARIS NEGARA</strong></span><br />\n<strong>REPUBLIK INDONESIA</strong></span></span><br />\nmengharapkan dengan hormat Bapak/Ibu/Saudara<br />\n<span style=\"line-height:1\">pada acara</span><br />\n<span style=\"line-height:1.2\"><strong><span style=\"font-size:16px\">PENGUCAPAN SUMPAH/JANJI<br />\nKETUA MAHKAMAH AGUNG</span><br />\n<span style=\"font-size:14px\">dan</span><br />\n<span style=\"font-size:16px\">HAKIM KONSTITUSI</span></strong><br />\n<span style=\"font-size:14px\"><strong>di Hadapan</strong></span><br />\n<span style=\"font-size:18px\"><strong>PRESIDEN REPUBLIK INDONESIA</strong></span><br />\n<br />\n&nbsp;hari kamis, tanggal 30 April 2020, pukul 09.30 WIB<br />\nbertempat di Istana Negara, Jakarta</span><br />\n<br />\n&nbsp;</div>\n\n<table style=\"margin-left:100px\">\n	<tbody>\n		<tr>\n			<td style=\"vertical-align:top; width:305px\"><span style=\"font-size:11px\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Pakaian :<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Pejabat yang dilantik</strong></span><br />\n			<span style=\"line-height:0.5\"><span style=\"font-size:11px\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Ketua MA&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></span><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: Toga Hakim Agung</span></span><br />\n			<span style=\"line-height:0.5\"><span style=\"font-size:11px\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Hakim Konstitusi&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></span><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: Toga Hakim Konstiusi</span></span></td>\n			<td style=\"vertical-align:top; width:270px\"><span style=\"font-size:11px\"><strong>&nbsp; &nbsp; <span style=\"line-height:1\">&nbsp; &nbsp; &nbsp;</span></strong></span><span style=\"line-height:1\"><span style=\"font-size:11px\"><strong>Tamu undangan&nbsp; :&nbsp;</strong></span><br />\n			<span style=\"font-size:11px\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Pria&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Toga Hakim Agung</span><br />\n			<span style=\"font-size:11px\">&nbsp; &nbsp; &nbsp; &nbsp;<span style=\"line-height:1.2\"> &nbsp;Wanita&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Toga Hakim Konstiusi<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;TNI/POLRI&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: PDU-III</span></span></span></td>\n		</tr>\n	</tbody>\n</table>\n','<div style=\"text-align:center\"><span style=\"font-size:16px\"><span style=\"line-height:1\"><strong>MENTERI SEKRETARIS NEGARA</strong></span><br />\n<strong>REPUBLIK INDONESIA</strong></span><br />\nmengharapkan dengan hormat Bapak/Ibu/Saudara<br />\n<span style=\"line-height:1\">pada acara</span><br />\n<span style=\"line-height:1.2\"><strong><span style=\"font-size:16px\">PENGUCAPAN SUMPAH/JANJI<br />\nKETUA MAHKAMAH AGUNG</span><br />\n<span style=\"font-size:14px\">dan</span><br />\n<span style=\"font-size:16px\">HAKIM KONSTITUSI</span></strong><br />\n<span style=\"font-size:14px\"><strong>di Hadapan</strong></span><br />\n<span style=\"font-size:18px\"><strong>PRESIDEN REPUBLIK INDONESIA</strong></span><br />\n<br />\n&nbsp;hari kamis, tanggal 30 April 2020, pukul 09.30 WIB<br />\nbertempat di Istana Negara, Jakarta</span><br />\n<br />\n&nbsp;</div>\n\n<table style=\"margin-left:100px\">\n	<tbody>\n		<tr>\n			<td style=\"vertical-align:top; width:305px\"><span style=\"font-size:11px\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Pakaian :<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Pejabat yang dilantik</strong></span><br />\n			<span style=\"line-height:0.5\"><span style=\"font-size:11px\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Ketua MA&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></span><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: Toga Hakim Agung</span></span><br />\n			<span style=\"line-height:0.5\"><span style=\"font-size:11px\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Hakim Konstitusi&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></span><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: Toga Hakim Konstiusi</span></span></td>\n			<td style=\"vertical-align:top; width:270px\"><span style=\"font-size:11px\"><strong>&nbsp; &nbsp; <span style=\"line-height:1\">&nbsp; &nbsp; &nbsp;</span></strong></span><span style=\"line-height:1\"><span style=\"font-size:11px\"><strong>Tamu undangan&nbsp; :&nbsp;</strong></span><br />\n			<span style=\"font-size:11px\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Pria&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Toga Hakim Agung</span><br />\n			<span style=\"font-size:11px\">&nbsp; &nbsp; &nbsp; &nbsp;<span style=\"line-height:1.2\"> &nbsp;Wanita&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Toga Hakim Konstiusi<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;TNI/POLRI&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: PDU-III</span></span></span></td>\n		</tr>\n	</tbody>\n</table>\n'),
(9,4,'habis',NULL,'<div style=\"text-align:center\"><span class=\"monotype\"><span style=\"font-size:16px\"><strong>MENTERI SEKRETARIS NEGARA REPUBLIK INDONESIA</strong></span><br />\ndan<br />\n<span style=\"font-size:16px\"><strong>Panglima Tentara Nasional Indonesia</strong></span><br />\nserta<br />\n<span style=\"font-size:16px\"><strong>Kepala Kepolisian Negara Republik Indonesia<br />\nmengharapkan dengan hormat kehadiran Bapak/Ibu/Saudara</strong></span><br />\npada upacara<br />\n<span style=\"font-size:16px\"><strong>Prasetya Perwira TNI-POLRI 2020</strong></span><br />\noleh<br />\n<span style=\"font-size:18px\"><strong>Presiden Republik Indonesia</strong></span><br />\n&nbsp;hari selasa, tanggal 14 Juli 2020, pukul 08.30 WIB<br />\nbertempat di Istana Negara, Jakarta</span></div>\n\n<table style=\"margin-left:100px\">\n	<tbody>\n		<tr>\n			<td style=\"vertical-align:top; width:305px\"><span style=\"font-size:11px\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </strong></span><span style=\"font-size:9px\"><strong>&nbsp; &nbsp;-&nbsp;&nbsp;</strong>Harap hadir pukul ..... WIB sebelum acara dimulai<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; untuk melaksanakan Rapid Test di ruang tunggu 05<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; dan undangan haraf dibawa<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;-&nbsp; Undangan berlaku satu orang dan tidak dapat diwakilkan<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; untuk taruna yang akan dilantik dan tamu undangan<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; wajib menggunakan masker kain<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; -&nbsp; &nbsp;Harap jawaban telepon melalui :<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Sekretariat Akademi TNI<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Telp. (021-871864/48), (021-8452812) pwd: 1102&nbsp;<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Sekretarian Akademi Kepolisian<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Telp. (024-8310074)</span></td>\n			<td style=\"vertical-align:top; width:270px\"><span style=\"font-size:11px\"><strong>&nbsp; &nbsp;</strong></span><br />\n			<br />\n			<span style=\"font-size:10px\"><strong><span style=\"line-height:1\">&nbsp; &nbsp; &nbsp; </span></strong></span><span style=\"font-size:9px\"><strong><span style=\"line-height:1\">&nbsp; </span></strong><span style=\"line-height:1\"><strong>Tamu undangan&nbsp; :&nbsp;</strong><br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Pria&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : PSL / Daerah<br />\n			&nbsp; &nbsp; &nbsp; &nbsp;<span style=\"line-height:1.2\"> &nbsp;Wanita&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Pakaian Nasioanal / Daerah<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;TNI/POLRI&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: PDU-III</span></span></span></td>\n		</tr>\n	</tbody>\n</table>\n',NULL),
(12,3,'temp 1',NULL,'<div style=\"text-align:center\"><span style=\"font-size:16px\"><span style=\"line-height:1\"><strong>MENTERI SEKRETARIS NEGARA</strong></span><br />\n<strong>REPUBLIK INDONESIA</strong></span><br />\nmengharapkan dengan hormat Bapak/Ibu/Saudara<br />\n<span style=\"line-height:1\">pada acara</span><br />\n<span style=\"line-height:1.2\"><strong><span style=\"font-size:16px\">PENGUCAPAN SUMPAH/JANJI<br />\nKETUA MAHKAMAH AGUNG</span><br />\n<span style=\"font-size:14px\">dan</span><br />\n<span style=\"font-size:16px\">HAKIM KONSTITUSI</span></strong><br />\n<span style=\"font-size:14px\"><strong>di Hadapan</strong></span><br />\n<span style=\"font-size:18px\"><strong>PRESIDEN REPUBLIK INDONESIA</strong></span><br />\n<br />\n&nbsp;hari kamis, tanggal 30 April 2020, pukul 09.30 WIB<br />\nbertempat di Istana Negara, Jakarta</span><br />\n<br />\n&nbsp;</div>\n\n<table style=\"margin-left:100px\">\n	<tbody>\n		<tr>\n			<td style=\"vertical-align:top; width:305px\"><span style=\"font-size:11px\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Pakaian :<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Pejabat yang dilantik</strong></span><br />\n			<span style=\"line-height:0.5\"><span style=\"font-size:11px\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Ketua MA&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></span><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: Toga Hakim Agung</span></span><br />\n			<span style=\"line-height:0.5\"><span style=\"font-size:11px\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Hakim Konstitusi&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></span><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: Toga Hakim Konstiusi</span></span></td>\n			<td style=\"vertical-align:top; width:270px\"><span style=\"font-size:11px\"><strong>&nbsp; &nbsp; <span style=\"line-height:1\">&nbsp; &nbsp; &nbsp;</span></strong></span><span style=\"line-height:1\"><span style=\"font-size:11px\"><strong>Tamu undangan&nbsp; :&nbsp;</strong></span><br />\n			<span style=\"font-size:11px\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Pria&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Toga Hakim Agung</span><br />\n			<span style=\"font-size:11px\">&nbsp; &nbsp; &nbsp; &nbsp;<span style=\"line-height:1.2\"> &nbsp;Wanita&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Toga Hakim Konstiusi<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;TNI/POLRI&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: PDU-III</span></span></span></td>\n		</tr>\n	</tbody>\n</table>\n',NULL),
(13,3,'temp1',NULL,'<div style=\"text-align:center\"><span class=\"monotype\"><span style=\"font-size:16px\"><strong>MENTERI SEKRETARIS NEGARA REPUBLIK INDONESIA</strong></span><br />\ndan<br />\n<span style=\"font-size:16px\"><strong>Panglima Tentara Nasional Indonesia</strong></span><br />\nserta<br />\n<span style=\"font-size:16px\"><strong>Kepala Kepolisian Negara Republik Indonesia<br />\nmengharapkan dengan hormat kehadiran Bapak/Ibu/Saudara</strong></span><br />\npada upacara<br />\n<span style=\"font-size:16px\"><strong>Prasetya Perwira TNI-POLRI 2020</strong></span><br />\noleh<br />\n<span style=\"font-size:18px\"><strong>Presiden Republik Indonesia</strong></span><br />\n&nbsp;hari selasa, tanggal 14 Juli 2020, pukul 08.30 WIB<br />\nbertempat di Istana Negara, Jakarta</span></div>\n\n<table style=\"margin-left:100px\">\n	<tbody>\n		<tr>\n			<td style=\"vertical-align:top; width:305px\"><span style=\"font-size:11px\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </strong></span><span style=\"font-size:9px\"><strong>&nbsp; &nbsp;-&nbsp;&nbsp;</strong>Harap hadir pukul ..... WIB sebelum acara dimulai<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; untuk melaksanakan Rapid Test di ruang tunggu 05<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; dan undangan haraf dibawa<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;-&nbsp; Undangan berlaku satu orang dan tidak dapat diwakilkan<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; untuk taruna yang akan dilantik dan tamu undangan<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; wajib menggunakan masker kain<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; -&nbsp; &nbsp;Harap jawaban telepon melalui :<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Sekretariat Akademi TNI<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Telp. (021-871864/48), (021-8452812) pwd: 1102&nbsp;<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Sekretarian Akademi Kepolisian<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Telp. (024-8310074)</span></td>\n			<td style=\"vertical-align:top; width:270px\"><span style=\"font-size:11px\"><strong>&nbsp; &nbsp;</strong></span><br />\n			<br />\n			<span style=\"font-size:10px\"><strong><span style=\"line-height:1\">&nbsp; &nbsp; &nbsp; </span></strong></span><span style=\"font-size:9px\"><strong><span style=\"line-height:1\">&nbsp; </span></strong><span style=\"line-height:1\"><strong>Tamu undangan&nbsp; :&nbsp;</strong><br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Pria&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : PSL / Daerah<br />\n			&nbsp; &nbsp; &nbsp; &nbsp;<span style=\"line-height:1.2\"> &nbsp;Wanita&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Pakaian Nasioanal / Daerah<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;TNI/POLRI&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: PDU-III</span></span></span></td>\n		</tr>\n	</tbody>\n</table>\n',NULL),
(14,3,'ibn',NULL,'ibn',NULL),
(15,5,'sdsdsd',NULL,'<p><span style=\"line-height:20px\">&nbsp;&nbsp; </span></p>\n\n<div style=\"text-align:center\"><span style=\"font-size:16px\"><span style=\"line-height:1\"><strong>MENTERI SEKRETARIS NEGARA</strong></span><br />\n<strong>REPUBLIK INDONESIA</strong></span></div>\n\n<div style=\"padding:5px; text-align:center\">mengharapkan dengan hormat Bapak/Ibu/Saudara<br />\n<span style=\"line-height:1\">pada acara</span></div>\n\n<div style=\"text-align:center\"><span style=\"line-height:1.2\"><strong><span style=\"font-size:16px\">PENGUCAPAN SUMPAH/JANJI<br />\nKETUA MAHKAMAH AGUNG</span><br />\n<span style=\"font-size:14px\">dan</span><br />\n<span style=\"font-size:16px\">HAKIM KONSTITUSI</span></strong><br />\n<span style=\"font-size:14px\"><strong>di Hadapan</strong></span><br />\n<span style=\"font-size:18px\"><strong>PRESIDEN REPUBLIK INDONESIA</strong></span><br />\n<br />\n&nbsp;hari kamis, tanggal 30 April 2020, pukul 09.30 WIB<br />\nbertempat di Istana Negara, Jakarta</span><br />\n&nbsp;</div>\n\n<table style=\"margin-left:100px\">\n	<tbody>\n		<tr>\n			<td style=\"vertical-align:top; width:305px\">\n			<table cellpadding=\"0\" cellspacing=\"0\">\n				<tbody>\n					<tr>\n						<td colspan=\"2\"><span style=\"font-size:11px\"><strong>Pakaian :<br />\n						Pejabat yang dilantik</strong></span></td>\n					</tr>\n					<tr>\n						<td style=\"width:100px\"><span style=\"line-height:0.5\"><span style=\"font-size:11px\">Ketua MA</span></span></td>\n						<td><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: Toga Hakim Agung</span></span></td>\n					</tr>\n					<tr>\n						<td style=\"width:100px\"><span style=\"line-height:0.5\"><span style=\"font-size:11px\">Hakim Konstitusi</span></span></td>\n						<td><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: Toga Hakim Konstiusi</span></span></td>\n					</tr>\n				</tbody>\n			</table>\n			</td>\n			<td style=\"vertical-align:top; width:270px\">\n			<table cellpadding=\"0\" cellspacing=\"0\" style=\"height:93px; width:207px\">\n				<tbody>\n					<tr>\n						<td colspan=\"2\" style=\"width:100px\"><span style=\"line-height:0.5\"><span style=\"font-size:11px\"><strong>Tamu undangan :</strong></span></span></td>\n					</tr>\n					<tr>\n						<td style=\"width:100px\"><span style=\"font-size:11px\"><span style=\"line-height:0.5\">Pria</span></span></td>\n						<td><span style=\"font-size:11px\"><span style=\"line-height:0.5\">:&nbsp;Batik</span></span></td>\n					</tr>\n					<tr>\n						<td style=\"width:100px\"><span style=\"line-height:0.5\"><span style=\"font-size:11px\">Wanita</span></span></td>\n						<td><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: Kebaya</span></span></td>\n					</tr>\n					<tr>\n						<td style=\"width:100px\"><span style=\"font-size:11px\"><span style=\"line-height:0.5\">TNI/POLRI</span></span></td>\n						<td><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: PDU-III</span></span></td>\n					</tr>\n				</tbody>\n			</table>\n			</td>\n		</tr>\n	</tbody>\n</table>\n',NULL),
(16,6,'credensial','temp___06072020223946.jpg','<p><span style=\"line-height:20px\">&nbsp;&nbsp; </span></p>\n\n<div style=\"text-align:center\"><span style=\"font-size:16px\"><span style=\"line-height:1\"><strong>MENTERI SEKRETARIS NEGARA</strong></span><br />\n<strong>REPUBLIK INDONESIA</strong></span></div>\n\n<div style=\"padding:5px; text-align:center\">mengharapkan dengan hormat Bapak/Ibu/Saudara<br />\n<span style=\"line-height:1\">pada acara</span></div>\n\n<div style=\"text-align:center\"><span style=\"line-height:1.2\"><strong><span style=\"font-size:16px\">PENGUCAPAN SUMPAH/JANJI<br />\nKETUA MAHKAMAH AGUNG</span><br />\n<span style=\"font-size:14px\">dan</span><br />\n<span style=\"font-size:16px\">HAKIM KONSTITUSI</span></strong><br />\n<span style=\"font-size:14px\"><strong>di Hadapan</strong></span><br />\n<span style=\"font-size:18px\"><strong>PRESIDEN REPUBLIK INDONESIA</strong></span><br />\n<br />\n&nbsp;hari kamis, tanggal 30 April 2020, pukul 09.30 WIB<br />\nbertempat di Istana Negara, Jakarta</span><br />\n&nbsp;</div>\n\n<table style=\"margin-left:100px\">\n	<tbody>\n		<tr>\n			<td style=\"vertical-align:top; width:305px\">\n			<table cellpadding=\"0\" cellspacing=\"0\">\n				<tbody>\n					<tr>\n						<td colspan=\"2\"><span style=\"font-size:11px\"><strong>Pakaian :<br />\n						Pejabat yang dilantik</strong></span></td>\n					</tr>\n					<tr>\n						<td style=\"width:100px\"><span style=\"line-height:0.5\"><span style=\"font-size:11px\">Ketua MA</span></span></td>\n						<td><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: Toga Hakim Agung</span></span></td>\n					</tr>\n					<tr>\n						<td style=\"width:100px\"><span style=\"line-height:0.5\"><span style=\"font-size:11px\">Hakim Konstitusi</span></span></td>\n						<td><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: Toga Hakim Konstiusi</span></span></td>\n					</tr>\n				</tbody>\n			</table>\n			</td>\n			<td style=\"vertical-align:top; width:270px\">\n			<table cellpadding=\"0\" cellspacing=\"0\" style=\"height:93px; width:207px\">\n				<tbody>\n					<tr>\n						<td colspan=\"2\" style=\"width:100px\"><span style=\"line-height:0.5\"><span style=\"font-size:11px\"><strong>Tamu undangan :</strong></span></span></td>\n					</tr>\n					<tr>\n						<td style=\"width:100px\"><span style=\"font-size:11px\"><span style=\"line-height:0.5\">Pria</span></span></td>\n						<td><span style=\"font-size:11px\"><span style=\"line-height:0.5\">:&nbsp;Batik</span></span></td>\n					</tr>\n					<tr>\n						<td style=\"width:100px\"><span style=\"line-height:0.5\"><span style=\"font-size:11px\">Wanita</span></span></td>\n						<td><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: Kebaya</span></span></td>\n					</tr>\n					<tr>\n						<td style=\"width:100px\"><span style=\"font-size:11px\"><span style=\"line-height:0.5\">TNI/POLRI</span></span></td>\n						<td><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: PDU-III</span></span></td>\n					</tr>\n				</tbody>\n			</table>\n			</td>\n		</tr>\n	</tbody>\n</table>\n',NULL),
(18,2,'baru',NULL,'<p><span style=\"line-height:20px\">&nbsp;&nbsp; </span></p>\n\n<div style=\"text-align:center\"><span style=\"font-size:16px\"><span style=\"line-height:1\"><strong>MENTERI SEKRETARIS NEGARA</strong></span><br />\n<strong>REPUBLIK INDONESIA</strong></span></div>\n\n<div style=\"padding:5px; text-align:center\">mengharapkan dengan hormat Bapak/Ibu/Saudara<br />\n<span style=\"line-height:1\">pada acara</span></div>\n\n<div style=\"text-align:center\"><span style=\"line-height:1.2\"><strong><span style=\"font-size:16px\">PENGUCAPAN SUMPAH/JANJI<br />\nKETUA MAHKAMAH AGUNG</span><br />\n<span style=\"font-size:14px\">dan</span><br />\n<span style=\"font-size:16px\">HAKIM KONSTITUSI</span></strong><br />\n<span style=\"font-size:14px\"><strong>di Hadapan</strong></span><br />\n<span style=\"font-size:18px\"><strong>PRESIDEN REPUBLIK INDONESIA</strong></span><br />\n<br />\n&nbsp;hari kamis, tanggal 30 April 2020, pukul 09.30 WIB<br />\nbertempat di Istana Negara, Jakarta</span><br />\n&nbsp;</div>\n\n<table style=\"margin-left:100px\">\n	<tbody>\n		<tr>\n			<td style=\"vertical-align:top; width:305px\">\n			<table cellpadding=\"0\" cellspacing=\"0\">\n				<tbody>\n					<tr>\n						<td colspan=\"2\"><span style=\"font-size:11px\"><strong>Pakaian :<br />\n						Pejabat yang dilantik</strong></span></td>\n					</tr>\n					<tr>\n						<td style=\"width:100px\"><span style=\"line-height:0.5\"><span style=\"font-size:11px\">Ketua MA</span></span></td>\n						<td><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: Toga Hakim Agung</span></span></td>\n					</tr>\n					<tr>\n						<td style=\"width:100px\"><span style=\"line-height:0.5\"><span style=\"font-size:11px\">Hakim Konstitusi</span></span></td>\n						<td><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: Toga Hakim Konstiusi</span></span></td>\n					</tr>\n				</tbody>\n			</table>\n			</td>\n			<td style=\"vertical-align:top; width:270px\">\n			<table cellpadding=\"0\" cellspacing=\"0\" style=\"height:93px; width:207px\">\n				<tbody>\n					<tr>\n						<td colspan=\"2\" style=\"width:100px\"><span style=\"line-height:0.5\"><span style=\"font-size:11px\"><strong>Tamu undangan :</strong></span></span></td>\n					</tr>\n					<tr>\n						<td style=\"width:100px\"><span style=\"font-size:11px\"><span style=\"line-height:0.5\">Pria</span></span></td>\n						<td><span style=\"font-size:11px\"><span style=\"line-height:0.5\">:&nbsp;Batik</span></span></td>\n					</tr>\n					<tr>\n						<td style=\"width:100px\"><span style=\"line-height:0.5\"><span style=\"font-size:11px\">Wanita</span></span></td>\n						<td><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: Kebaya</span></span></td>\n					</tr>\n					<tr>\n						<td style=\"width:100px\"><span style=\"font-size:11px\"><span style=\"line-height:0.5\">TNI/POLRI</span></span></td>\n						<td><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: PDU-III</span></span></td>\n					</tr>\n				</tbody>\n			</table>\n			</td>\n		</tr>\n	</tbody>\n</table>\n','<p><span style=\"line-height:20px\">&nbsp;&nbsp; </span></p>\n\n<div style=\"text-align:center\"><span class=\"monotype\"><span style=\"font-size:16px\"><span style=\"line-height:1\"><strong>MENTERI SEKRETARIS NEGARA</strong></span><br />\n<strong>REPUBLIK INDONESIA</strong></span></span></div>\n\n<div style=\"padding:5px; text-align:center\">mengharapkan dengan hormat Bapak/Ibu/Saudara<br />\n<span style=\"line-height:1\">pada acara</span></div>\n\n<div style=\"text-align:center\"><span style=\"line-height:1.2\"><strong><span style=\"font-size:16px\">PENGUCAPAN SUMPAH/JANJI<br />\nKETUA MAHKAMAH AGUNG</span><br />\n<span style=\"font-size:14px\">dan</span><br />\n<span style=\"font-size:16px\">HAKIM KONSTITUSI</span></strong><br />\n<span style=\"font-size:14px\"><strong>di Hadapan</strong></span><br />\n<span style=\"font-size:18px\"><strong>PRESIDEN REPUBLIK INDONESIA</strong></span><br />\n<br />\n&nbsp;hari kamis, tanggal 30 April 2020, pukul 09.30 WIB<br />\nbertempat di Istana Negara, Jakarta</span><br />\n&nbsp;</div>\n\n<table style=\"margin-left:100px\">\n	<tbody>\n		<tr>\n			<td style=\"vertical-align:top; width:305px\">\n			<table cellpadding=\"0\" cellspacing=\"0\">\n				<tbody>\n					<tr>\n						<td colspan=\"2\"><span style=\"font-size:11px\"><strong>Pakaian :<br />\n						Pejabat yang dilantik</strong></span></td>\n					</tr>\n					<tr>\n						<td style=\"width:100px\"><span style=\"line-height:0.5\"><span style=\"font-size:11px\">Ketua MA</span></span></td>\n						<td><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: Toga Hakim Agung</span></span></td>\n					</tr>\n					<tr>\n						<td style=\"width:100px\"><span style=\"line-height:0.5\"><span style=\"font-size:11px\">Hakim Konstitusi</span></span></td>\n						<td><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: Toga Hakim Konstiusi</span></span></td>\n					</tr>\n				</tbody>\n			</table>\n			</td>\n			<td style=\"vertical-align:top; width:270px\">\n			<table cellpadding=\"0\" cellspacing=\"0\" style=\"height:93px; width:207px\">\n				<tbody>\n					<tr>\n						<td colspan=\"2\" style=\"width:100px\"><span style=\"line-height:0.5\"><span style=\"font-size:11px\"><strong>Tamu undangan :</strong></span></span></td>\n					</tr>\n					<tr>\n						<td style=\"width:100px\"><span style=\"font-size:11px\"><span style=\"line-height:0.5\">Pria</span></span></td>\n						<td><span style=\"font-size:11px\"><span style=\"line-height:0.5\">:&nbsp;Batik</span></span></td>\n					</tr>\n					<tr>\n						<td style=\"width:100px\"><span style=\"line-height:0.5\"><span style=\"font-size:11px\">Wanita</span></span></td>\n						<td><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: Kebaya</span></span></td>\n					</tr>\n					<tr>\n						<td style=\"width:100px\"><span style=\"font-size:11px\"><span style=\"line-height:0.5\">TNI/POLRI</span></span></td>\n						<td><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: PDU-III</span></span></td>\n					</tr>\n				</tbody>\n			</table>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(19,5,'fdf',NULL,'fvb',NULL),
(20,2,'ok',NULL,'<div style=\"text-align:center\"><span class=\"monotype\"><span style=\"font-size:16px\"><span style=\"line-height:1\"><strong>MENTERI SEKRETARIS NEGARA</strong></span><br />\n<strong>REPUBLIK INDONESIA</strong></span></span><br />\n<span class=\"monotype\">mengharapkan dengan hormat Bapak/Ibu/Saudara<br />\n<span style=\"line-height:1\">pada acara</span></span><br />\n<span style=\"line-height:1.2\"><strong><span style=\"font-size:16px\">PENGUCAPAN SUMPAH/JANJI<br />\nKETUA MAHKAMAH AGUNG</span><br />\n<span style=\"font-size:14px\">dan</span><br />\n<span style=\"font-size:16px\">HAKIM KONSTITUSI</span></strong><br />\n<span style=\"font-size:14px\"><strong>di Hadapan</strong></span><br />\n<span style=\"font-size:18px\"><strong>PRESIDEN REPUBLIK INDONESIA</strong></span><br />\n<br />\n&nbsp;hari kamis, tanggal 30 April 2020, pukul 09.30 WIB<br />\nbertempat di Istana Negara, Jakarta</span><br />\n<br />\n&nbsp;</div>\n\n<table style=\"margin-left:100px\">\n	<tbody>\n		<tr>\n			<td style=\"vertical-align:top; width:305px\"><span style=\"font-size:11px\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Pakaian :<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Pejabat yang dilantik</strong></span><br />\n			<span style=\"line-height:0.5\"><span style=\"font-size:11px\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Ketua MA&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></span><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: Toga Hakim Agung</span></span><br />\n			<span style=\"line-height:0.5\"><span style=\"font-size:11px\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Hakim Konstitusi&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></span><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: Toga Hakim Konstiusi</span></span></td>\n			<td style=\"vertical-align:top; width:270px\"><span style=\"font-size:11px\"><strong>&nbsp; &nbsp; <span style=\"line-height:1\">&nbsp; &nbsp; &nbsp;</span></strong></span><span style=\"line-height:1\"><span style=\"font-size:11px\"><strong>Tamu undangan&nbsp; :&nbsp;</strong></span><br />\n			<span style=\"font-size:11px\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Pria&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Toga Hakim Agung</span><br />\n			<span style=\"font-size:11px\">&nbsp; &nbsp; &nbsp; &nbsp;<span style=\"line-height:1.2\"> &nbsp;Wanita&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Toga Hakim Konstiusi<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;TNI/POLRI&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: PDU-III</span></span></span></td>\n		</tr>\n	</tbody>\n</table>\n','<div style=\"text-align:center\"><span class=\"monotype\"><span style=\"font-size:16px\"><span style=\"line-height:1\"><strong>MENTERI SEKRETARIS NEGARA</strong></span><br />\n<strong>REPUBLIK INDONESIA</strong></span></span><br />\nmengharapkan dengan hormat Bapak/Ibu/Saudara<br />\n<span style=\"line-height:1\">pada acara</span><br />\n<span style=\"line-height:1.2\"><strong><span style=\"font-size:16px\">PENGUCAPAN SUMPAH/JANJI<br />\nKETUA MAHKAMAH AGUNG</span><br />\n<span style=\"font-size:14px\">dan</span><br />\n<span style=\"font-size:16px\">HAKIM KONSTITUSI</span></strong><br />\n<span style=\"font-size:14px\"><strong>di Hadapan</strong></span><br />\n<span style=\"font-size:18px\"><strong>PRESIDEN REPUBLIK INDONESIA</strong></span><br />\n<br />\n&nbsp;hari kamis, tanggal 30 April 2020, pukul 09.30 WIB<br />\nbertempat di Istana Negara, Jakarta</span><br />\n<br />\n&nbsp;</div>\n\n<table style=\"margin-left:100px\">\n	<tbody>\n		<tr>\n			<td style=\"vertical-align:top; width:305px\"><span style=\"font-size:11px\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Pakaian :<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Pejabat yang dilantik</strong></span><br />\n			<span style=\"line-height:0.5\"><span style=\"font-size:11px\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Ketua MA&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></span><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: Toga Hakim Agung</span></span><br />\n			<span style=\"line-height:0.5\"><span style=\"font-size:11px\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Hakim Konstitusi&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></span><span style=\"line-height:0.5\"><span style=\"font-size:11px\">: Toga Hakim Konstiusi</span></span></td>\n			<td style=\"vertical-align:top; width:270px\"><span style=\"font-size:11px\"><strong>&nbsp; &nbsp; <span style=\"line-height:1\">&nbsp; &nbsp; &nbsp;</span></strong></span><span style=\"line-height:1\"><span style=\"font-size:11px\"><strong>Tamu undangan&nbsp; :&nbsp;</strong></span><br />\n			<span style=\"font-size:11px\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Pria&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Toga Hakim Agung</span><br />\n			<span style=\"font-size:11px\">&nbsp; &nbsp; &nbsp; &nbsp;<span style=\"line-height:1.2\"> &nbsp;Wanita&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Toga Hakim Konstiusi<br />\n			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;TNI/POLRI&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: PDU-III</span></span></span></td>\n		</tr>\n	</tbody>\n</table>\n');

/*Table structure for table `tm_persetujuan` */

DROP TABLE IF EXISTS `tm_persetujuan`;

CREATE TABLE `tm_persetujuan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode_acara` varchar(25) DEFAULT NULL,
  `id_pejabat` int(11) DEFAULT NULL,
  `sts` tinyint(4) DEFAULT '1' COMMENT '1=revisi 2=approve',
  `ket` text,
  `tgl` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tm_persetujuan` */

/*Table structure for table `tr_jenis_kegiatan` */

DROP TABLE IF EXISTS `tr_jenis_kegiatan`;

CREATE TABLE `tr_jenis_kegiatan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) DEFAULT NULL,
  `id_undangan` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tr_jenis_kegiatan` */

insert  into `tr_jenis_kegiatan`(`id`,`nama`,`id_undangan`) values 
(1,'Rakor',1),
(2,'Tamu Negara',2),
(3,'Acara Besar',4),
(4,'Pelantikan',4),
(5,'IBN',3),
(6,'Credential',5);

/*Table structure for table `tr_jenis_undangan` */

DROP TABLE IF EXISTS `tr_jenis_undangan`;

CREATE TABLE `tr_jenis_undangan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `alias` varchar(100) DEFAULT NULL,
  `_cid` int(11) DEFAULT NULL,
  `_ctime` datetime DEFAULT CURRENT_TIMESTAMP,
  `module` varchar(50) DEFAULT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `pimpinan` varchar(50) DEFAULT NULL,
  `isi_undangan` text,
  `lampiran2` text,
  `tempat` text,
  `ket_kedatangan` text,
  `paraf_persetujuan` text,
  `css` varchar(100) DEFAULT NULL,
  `distribusi` text,
  `presiden` varchar(150) DEFAULT NULL,
  `ibn` varchar(150) DEFAULT NULL,
  `rsvp` text,
  `email_konfirmasi` text,
  `email_konfirmasi_english` text,
  `email_reschedule` text,
  `email_reschedule_english` text,
  `email_undangan` text,
  `email_pembatalan` text,
  `email_pembatalan_english` text,
  `wa_konfirmasi` text,
  `wa_konfirmasi_english` text,
  `wa_reschedule` text,
  `wa_reschedule_english` text,
  `wa_undangan` text,
  `wa_undangan_english` text,
  `wa_pembatalan` text,
  `wa_pembatalan_english` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tr_jenis_undangan` */

insert  into `tr_jenis_undangan`(`id`,`nama`,`alias`,`_cid`,`_ctime`,`module`,`no_surat`,`pimpinan`,`isi_undangan`,`lampiran2`,`tempat`,`ket_kedatangan`,`paraf_persetujuan`,`css`,`distribusi`,`presiden`,`ibn`,`rsvp`,`email_konfirmasi`,`email_konfirmasi_english`,`email_reschedule`,`email_reschedule_english`,`email_undangan`,`email_pembatalan`,`email_pembatalan_english`,`wa_konfirmasi`,`wa_konfirmasi_english`,`wa_reschedule`,`wa_reschedule_english`,`wa_undangan`,`wa_undangan_english`,`wa_pembatalan`,`wa_pembatalan_english`) values 
(1,'UNDANGAN RAKOR','Rakor',NULL,'2020-01-16 07:41:50','und_rakor','R- {agenda} /Setpres/D-1/KK.04.00/{bln}/{tahun}','Rika kiswardani',' <table style=\"max-width:400px\" cellpadding=0 cellspacing=0>\r\n    <tr>\r\n    <td colspan=\"2\" style=\"background-color:#EEE;\">\r\n    <img  style=\"border-top-left-radius:15px;border-top-right-radius:15px\" src=\"\'.base_url().\'plug/img/banner2.JPG\" width=\"100%\"   alt=\"E-receipt\"  class=\"CToWUd a6T\" tabindex=\"0\"><div class=\"a6S\" dir=\"ltr\" style=\"opacity: 1; left: 745px; top: 101px;\"><div id=\":rt\" class=\"T-I J-J5-Ji aQv T-I-ax7 L3 a5q\" role=\"button\" tabindex=\"0\" aria-label=\"Download lampiran \" data-tooltip-class=\"a1V\" data-tooltip=\"Download\"><div class=\"aSK J-J5-Ji aYr\"></div></div></div>\r\n     <center>\r\n     <span style=\"font-size:16\"><b> INFORMASI PENGAMBILAN UNDANGAN</b></span>\r\n     <hr width=\"90%\">\r\n     </center>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n    <td align=\"left\" valign=\"top\" style=\"background-color:#EEE;padding:10px\"> \r\n     <span style=\"font-size:11px;color:#9e9e9e;line-height:16px\">Nama Pemohon :</span><br>\r\n      <span style=\"font-size:13px;line-height:16px;font-weight:bold;color:black\">\'.$nama.\'</span> <br>\r\n      \r\n      <span style=\"font-size:11px;color:#9e9e9e;line-height:16px\">NIK :</span><br>\r\n      <span style=\"font-size:13px;line-height:16px;font-weight:bold;color:black\">\'.$nik.\'</span> <br>\r\n      \r\n      <span style=\"font-size:11px;color:#9e9e9e;line-height:16px\">Lembaga / instansi:</span><br>\r\n      <span style=\"font-size:13px;line-height:16px;color:black\"><b>\'.$lembaga.\'</b></span> <br>\r\n     <br>\r\n        <b style=\"font-size:12px;font-weight:bold;color:teal;\"> PEROLEHAN UNDANGAN</b><br>\r\n      \r\n      <span style=\"font-size:13px;line-height:16px; color:black\">Undangan Pagi : \'.$blok_pagi.\'</span> <br> \r\n    \r\n      <span style=\"font-size:13px;line-height:16px; color:black\">Undangan Sore : \'.$blok_sore.\'</span> <br>\r\n     \r\n     \r\n    </td> <td style=\"background-color:#EEE\"><center>\r\n    \r\n                 \r\n                 <img src=\"\'.base_url().\'qr/\'.$nik.\'.png\" width=\"150px\"><br>\r\n                 </center>\r\n    </td>\r\n    </tr>\r\n    <tr>\r\n    <td colspan=\"2\"  style=\"background-color:#EEE;padding:10px\"> \r\n   <div>  <b style=\"font-size:12px;font-weight:bold;color:teal;\"> INFORMASI PENGAMBILAN UNDANGAN</b><br> \r\n     <span style=\"font-size:13px;color:black;line-height:16px\"> - Undangan dapat diambil pada hari   \'.$tgl_ambil.\' pukul 08.30 - 16.00 WIB </span><br>\r\n    <span style=\"font-size:13px;color:black;line-height:16px\"> - Membawa KTP Asli. </span><br>\r\n        <span style=\"font-size:13px;color:black;line-height:16px\"> - Menunjukan email ini saat pengambilan. </span><br>\r\n        </div>\r\n    </td>\r\n    </tr>\r\n    </table>\r\n    ','<strong>KELENGKAPAN DATA ACARA YANG PERLU DIPERSIAPKAN DAN DIBAWA OLEH PANITIA PADA SAAT RAPAT KOORINASI :</strong>\n<ol>\n <li> </li>\n <li> </li>\n <li> </li>\n <li> </li>\n <li> </li>\n</ol>\n',NULL,'Harap hadir 30 menit sebelum acra dimulai dan undangan dibawa serta<br>\r\nDimohon konfirmasi kehadiran melalui telepon : 021-23545001 ext. 7235','[\"Kepala Sekretariat Presiden\",\"Deputi Bid. Protokol, Pers dan Media, Setpres\",\"Kepala biro protokol\",\"Kabag Undangan dan Adm. Protokol\",\"Kasubag Penyiapan Undangan\"]','col-blue','Distribusi undangan dilakukan dengan mengirimkan undangan langsung kepada pejabat terkait serta melalui fax, email dan group whatsapp protokol seluruh Lembaga Negara, Kementerian dan LPNK pada tanggal .......... s.d ..........',NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>','Yth. Bapak/Ibu<br>\nMohon izin menyampaikan Undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.','Yth. Bapak/Ibu<br>\r\nMohon izin menyampaikan Undangan Rapat Koordinasi <br>\r\nHari,tanggal: {tgl}<br>\r\nPKL: {jam} WIB<br>\r\nAgenda: {agenda}<br>\r\nTempat Rapat: {tempat}<br>\r\nCtt:<br>\r\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\r\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\r\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\r\ndemikian,<br>\r\nTerima kasih Protokol Kepresidenan.','email reschedul',NULL,'','emailbatal',NULL,'Selamat&hellip;.<br>\nYth. Bapak/Ibu<br>\n<br>\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\nAtas perhatiannya kami ucapkan terimakasih<br>\n<br>\nProtokol Kepresidenan<br>\n ',NULL,'Selamat&hellip;.<br>\nYth. Bapak/Ibu<br>\n<br>\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\nAtas perhatiannya kami ucapkan terimakasih<br>\n<br>\nProtokol Kepresidenan',NULL,'',NULL,'Selamat&hellip;.<br>\nYth. Bapak/Ibu<br>\n<br>\nSehubungan dengan Rapat Koordinasi terkait kegiatan yang akan dihadiri oleh Presiden Republik Indonesia, dengan ini kami informasikan bahwa kami telah mengirimkan undangan resmi melalui E-Mail. Mohon kiranya Bapak/Ibu dapat membuka E-Mail yang dimaksud.<br>\nAtas perhatiannya kami ucapkan terimakasih<br>\n<br>\nProtokol Kepresidenan',NULL),
(2,'UNDANGAN PRESIDEN','Presiden',NULL,'2020-01-16 07:42:03','und_presiden',NULL,NULL,NULL,NULL,'HJ. IRIANA JOKO WIDODO','Harap hadir 30 menit sebelum acra dimulai dan undangan dibawa serta<br>\nDimohon konfirmasi kehadiran melalui telepon : 021-23545001 ext. 7235','[\"Kepala Sekretariat Presiden\",\"Deputi Bid. Protokol, Pers dan Media, Setpres\",\"Kepala biro protokol\",\"Kabag Undangan dan Adm. Protokol\",\"Kasubag Penyiapan Undangan\"]','col-pink','Distribusi undangan dilakukan dengan mengirimkan undangan langsung kepada pejabat terkait serta melalui fax, email dan group whatsapp protokol seluruh Lembaga Negara, Kementerian dan LPNK pada tanggal 10 Februari 2020 s.d 10 Februari 2020',NULL,'Istana Negara, Jakarta','<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>','Yth. Bapak/Ibu<br>\nMohon izin menyampaikan Undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.',NULL,'',NULL,'','',NULL,'',NULL,'',NULL,'',NULL,'',NULL),
(3,'UNDANGAN IBN','IBN',NULL,'2020-01-16 07:42:12','und_ibn',NULL,NULL,NULL,NULL,'Istana Negara, Jakarta','Harap hadir 30 menit sebelum acra dimulai dan undangan dibawa serta<br>\r\nDimohon konfirmasi kehadiran melalui telepon : 021-23545001 ext. 7235','[\"Kepala Sekretariat Presiden\",\"Deputi Bid. Protokol, Pers dan Media, Setpres\",\"Kepala biro protokol\",\"Kabag Undangan dan Adm. Protokol\",\"Kasubag Penyiapan Undangan\"]','col-green','Distribusi undangan dilakukan dengan mengirimkan undangan langsung kepada pejabat terkait serta melalui fax, email dan group whatsapp protokol seluruh Lembaga Negara, Kementerian dan LPNK pada tanggal ...... s.d ........',NULL,'HJ. IRIANA JOKO WIDODO','<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(4,'UNDANGAN KEMENTERIAN','Mensesneg',NULL,'2020-01-16 07:42:22','und_mensesneg',NULL,NULL,NULL,NULL,'Istana Negara, Jakarta','Harap hadir 30 menit sebelum acra dimulai<br>\ndan undangan dibawa serta<br>\nHarap jawaban telepon melalui:<br>\nSdri Fina : 0812222222<br>\nSdri Dian : 0810000000','[\"Kepala Sekretariat Presiden\",\"Deputi Bid. Protokol, Pers dan Media, Setpres\",\"Kepala biro protokol\",\"Kabag Undangan dan Adm. Protokol\",\"Kasubag Penyiapan Undangan\"]','col-lime','Distribusi undangan dilakukan dengan mengirimkan undangan langsung kepada pejabat terkait serta melalui fax, email dan group whatsapp protokol seluruh Lembaga Negara, Kementerian dan LPNK pada tanggal 10 Februari 2020 s.d 10 Februari 2020',NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>','',NULL,'',NULL,'','',NULL,'',NULL,'',NULL,'',NULL,'',NULL),
(5,'UNDANGAN SETPRES','Kasetpres',NULL,'2020-01-16 07:42:28','und_kasetpres',NULL,NULL,NULL,NULL,NULL,'Harap hadir 30 menit sebelum acra dimulai dan undangan dibawa serta<br>\r\nDimohon konfirmasi kehadiran melalui telepon : 021-23545001 ext. 7235','[\"Kepala Sekretariat Presiden\",\"Deputi Bid. Protokol, Pers dan Media, Setpres\",\"Kepala biro protokol\",\"Kabag Undangan dan Adm. Protokol\",\"Kasubag Penyiapan Undangan\"]','col-deep-orange','Distribusi undangan dilakukan dengan mengirimkan undangan langsung kepada pejabat terkait serta melalui fax, email dan group whatsapp protokol seluruh Lembaga Negara, Kementerian dan LPNK pada tanggal 10 Februari 2020 s.d 10 Februari 2020',NULL,NULL,'<ul>\r\n	<li>Harap hadir 30 menit sebelum acara dimulai dan undangan dibawa serta</li>\r\n	<li>Konfirmasi kehadiran anda pada link yang telah kami kirim melalui email</li>\r\n</ul>','&nbsp;<br>\nYth. Bapak/Ibu<br>\nMohon izin menyampaikan Undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.<br>\n ',NULL,'&nbsp;<br>\nYth. Bapak/Ibu<br>\nMohon izin menyampaikan Penundaan waktu acara undangan dengan agenda <strong>{agenda}</strong><br>\nHari,tanggal: {tgl}<br>\nPKL: {jam} WIB<br>\nAgenda: {agenda}<br>\nTempat Rapat: {tempat}<br>\nCtt:<br>\n1. Mohon untuk konfirmasi kehadiran di link berikut : {link}<br>\n2. Mohon kehadiran Pejabat/Ketua Panitia terkait (Minimal Eselon I/Eselon II, Direktur , Pamen, dan didampingi 1 Orang Staf saja) atau yang bisa mengambil keputusan pada rapat dimaksud.<br>\nCatatan Tambahan : Panitia acara/pemrakarsa acara tidak di perkenankan membawa tas , hanya membawa bahan bahan paparan , nama yg ikut rapat dan jabatannya agar di infokan segera mungkin ke protokol<br>\ndemikian,<br>\nTerima kasih Protokol Kepresidenan.<br>\n ',NULL,'','',NULL,'',NULL,'',NULL,'',NULL,'',NULL);

/*Table structure for table `tr_persetujuan` */

DROP TABLE IF EXISTS `tr_persetujuan`;

CREATE TABLE `tr_persetujuan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `urut` int(11) DEFAULT NULL,
  `pejabat` varchar(200) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `hp` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tr_persetujuan` */

insert  into `tr_persetujuan`(`id`,`urut`,`pejabat`,`nama`,`email`,`hp`) values 
(1,1,'Kepala Sekretaris Presiden',NULL,'cahyanacepi@gmail.com',NULL),
(2,2,'Dirjen Protokol dan Konsuler, Kemlu/ KPN',NULL,'cahyanacepi@gmail.com',NULL),
(3,3,'Deputi Bidang Protokol, Pers dan Media',NULL,'cahyanacepi@gmail.com',NULL),
(4,4,'Kepala Biro Protokol',NULL,'cahyanacepi@gmail.com',NULL),
(5,5,'Kepala Bagian Undangan dan Administrasi Protokol',NULL,'cahyanacepi@gmail.com',NULL),
(6,6,'Kasubbag Penyiapan Undangan',NULL,'cahyanacepi@gmail.com',NULL);

/*Table structure for table `tr_tempat_rakor` */

DROP TABLE IF EXISTS `tr_tempat_rakor`;

CREATE TABLE `tr_tempat_rakor` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=185 DEFAULT CHARSET=latin1;

/*Data for the table `tr_tempat_rakor` */

insert  into `tr_tempat_rakor`(`id`,`nama`) values 
(1,'Ruang Rapat Kepala Sekretariat Presiden, Lt. 2,  Jl. Veteran No. 16 Jakarta Pusat'),
(20,'Ruang Rapat Kepala Sekretariat Presiden, Lt. 1, Jl. Veteran No. 16 Jakarta Pusat '),
(169,NULL),
(170,NULL),
(171,NULL),
(172,NULL),
(173,NULL),
(174,NULL),
(175,NULL),
(176,NULL),
(177,NULL),
(178,NULL),
(179,NULL),
(180,NULL);

/*Table structure for table `versi` */

DROP TABLE IF EXISTS `versi`;

CREATE TABLE `versi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `versi` varchar(150) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `judul` varchar(250) DEFAULT NULL,
  `deskripsi` text,
  `poto` varchar(250) DEFAULT NULL,
  `file` varchar(250) DEFAULT NULL,
  `panduan` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `versi` */

insert  into `versi`(`id`,`versi`,`tgl`,`judul`,`deskripsi`,`poto`,`file`,`panduan`) values 
(2,'123','0000-00-00','Perbaikan bug','ah mantap','poto___09122020080047.JPG','file___09122020080047.pdf','panduan___09122020080047.pdf'),
(3,'123','2020-12-09','Penambahan vicon','ddd','poto___09122020082343.JPG','file123___09122020082343.pdf','panduan123___09122020082343.pdf');

/*Table structure for table `zoom_akun` */

DROP TABLE IF EXISTS `zoom_akun`;

CREATE TABLE `zoom_akun` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `key` text,
  `secreet` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `zoom_akun` */

insert  into `zoom_akun`(`id`,`nama`,`key`,`secreet`) values 
(1,'APUNIR','RSD3UIdtQPyfCuxzd7AMgQ','y51PpAKJMaa0E41q0TQuPL9OEt60FKPkkDAp'),
(2,'BPMI Setpres','-alfwiCDS9yAwOokdjU3GQ','DIVRZnsfEGgjkLtsnLvx7Afl9R9jDSiSgeUF'),
(3,'priwardhana','uIdmknW3SqGkQtJC7LfdfA','Ek5NIACTVFKGJRzaCiTRksAoiS6gMxa8fzA0');

/*Table structure for table `zoom_room` */

DROP TABLE IF EXISTS `zoom_room`;

CREATE TABLE `zoom_room` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode_acara` varchar(50) DEFAULT NULL,
  `id_akun` int(11) DEFAULT NULL,
  `kode` varchar(100) DEFAULT NULL,
  `nama` varchar(250) DEFAULT NULL,
  `sts_aktivasi` tinyint(4) DEFAULT '1',
  `leng` int(11) DEFAULT NULL,
  `page` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `zoom_room` */

insert  into `zoom_room`(`id`,`kode_acara`,`id_akun`,`kode`,`nama`,`sts_aktivasi`,`leng`,`page`) values 
(2,'235QM',1,'82414235078','COBA APLIKASI PANDANG',1,1,2),
(6,'235QM',1,'82381051468','percobaan pandang',1,20,1),
(8,'6FQHG',1,'82381051468','vicon',1,20,1),
(10,'426PG',1,'82381051468','vicon',1,NULL,NULL),
(11,'7YKDN',1,'82381051468','82381051468',1,20,1),
(12,'6FQHG',3,'85935674073','priwardhana',1,NULL,NULL),
(13,'5D4PK',1,'87350731686','Uji coba',1,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
