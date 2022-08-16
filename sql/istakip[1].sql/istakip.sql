-- phpMyAdmin SQL Dump
-- version 2.6.3-pl1
-- http://www.phpmyadmin.net
-- 
-- Sunucu: localhost
-- Çýktý Tarihi: Temmuz 31, 2006 at 09:49 PM
-- Server sürümü: 3.23.58
-- PHP Sürümü: 5.0.4
-- 
-- Veritabaný: `istakip`
-- 

-- --------------------------------------------------------

-- 
-- Tablo yapýsý : `categories`
-- 

CREATE TABLE `categories` (
  `catid` int(11) NOT NULL auto_increment,
  `catname` varchar(255) default NULL,
  `taskid` varchar(11) default NULL,
  PRIMARY KEY  (`catid`)
) TYPE=MyISAM AUTO_INCREMENT=4 ;

-- 
-- Tablo döküm verisi `categories`
-- 

INSERT INTO `categories` VALUES (1, 'Hat Kartý Çalýþmasý', NULL);
INSERT INTO `categories` VALUES (2, 'Bütçe Raporlarý', NULL);
INSERT INTO `categories` VALUES (3, 'Araç Kiralama', NULL);

-- --------------------------------------------------------

-- 
-- Tablo yapýsý : `dev_tasks`
-- 

CREATE TABLE `dev_tasks` (
  `taskid` mediumint(9) NOT NULL auto_increment,
  `priority` tinyint(4) NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `description` varchar(255) NOT NULL default '',
  `open_date` date default NULL,
  `last_change` timestamp(14) NOT NULL,
  `deadline` date NOT NULL default '0000-00-00',
  `statusname` varchar(15) NOT NULL default 'Received',
  `catname` varchar(100) NOT NULL default '',
  `status` varchar(5) NOT NULL default '0%',
  `display` char(1) NOT NULL default 'Y',
  `personnel` varchar(255) NOT NULL default '',
  `manager` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`taskid`),
  KEY `description` (`description`),
  KEY `open_date` (`open_date`),
  KEY `deadline` (`deadline`),
  KEY `catname` (`catname`),
  KEY `personnel` (`personnel`)
) TYPE=MyISAM AUTO_INCREMENT=11 ;

-- 
-- Tablo döküm verisi `dev_tasks`
-- 

INSERT INTO `dev_tasks` VALUES (1, 3, 'Verilerin Toplanmasý', 'Hat kartýna ait veriler toplanýp excel formatýnda kaydedilecek', '2006-07-30', '20060730205837', '2006-08-07', 'Complete', 'Hat Kartý Çalýþmasý', '100%', 'Y', 'Feridun', 'admin');
INSERT INTO `dev_tasks` VALUES (2, 3, 'Verilerin Toplanmasý', 'Hat kartýna ait veriler toplanýp excel formatýnda kaydedilecek', '2006-07-30', '20060730214725', '2006-08-07', 'In Progress', 'Hat Kartý Çalýþmasý', '25%', 'Y', 'Ali', 'admin');
INSERT INTO `dev_tasks` VALUES (3, 3, 'Verilerin Toplanmasý', 'Hat kartýna ait veriler toplanýp excel formatýnda kaydedilecek', '2006-07-30', '20060730172321', '2006-08-07', 'Cancelled', 'Hat Kartý Çalýþmasý', '0%', 'Y', 'Canan', 'admin');
INSERT INTO `dev_tasks` VALUES (4, 2, 'Yurt Dýþý Ofis Bütçeleri', 'Barcelona ofisinin bütçesi kontrol edilip eksikler varsa ilgili kuruma bildirilecek', '2006-07-30', '20060730154943', '2006-08-12', 'Received', 'Bütçe Raporlarý', '0%', 'Y', 'Mehmet', 'admin');
INSERT INTO `dev_tasks` VALUES (5, 4, 'Verilerin Toplanmasý', 'Veriler toplandýktan sonra en kýsa süre içinde veri tabanýna geçirilsin', '2006-07-30', '20060730161453', '2006-08-14', 'Received', 'Hat Kartý Çalýþmasý', '0%', 'Y', 'Feridun', 'admin');
INSERT INTO `dev_tasks` VALUES (6, 3, 'Verilerin Toplanmasý', 'Hat kartýna ait veriler toplanýp excel formatýnda kaydedilecek', '2006-07-30', '20060730173612', '2006-08-07', 'Cancelled', 'Hat Kartý Çalýþmasý', '0%', 'Y', 'Canan', 'admin');
INSERT INTO `dev_tasks` VALUES (7, 1, 'Veritabaný Tabloloarý', 'Hat Kartý için Veritabaný Tablolarý hemen bitsin', '2006-07-30', '20060730203447', '2006-07-30', 'Received', 'Hat Kartý Çalýþmasý', '0%', 'Y', 'Feridun', 'admin');
INSERT INTO `dev_tasks` VALUES (8, 1, 'durum', 'afdsfdsavregdv', '2006-07-31', '20060731084721', '2006-08-13', 'Received', 'Bütçe Raporlarý', '0%', 'Y', 'Mehmet', 'admin');
INSERT INTO `dev_tasks` VALUES (9, 3, 'LIS', 'LIS Müdürüne adi kiralama ile araç temini, 6 aylýk.', '2006-07-31', '20060731120620', '2006-08-01', 'Assigned', 'Araç Kiralama', '0%', 'Y', 'Fatma', 'admin');
INSERT INTO `dev_tasks` VALUES (10, 2, 'dsdss sdfs', 'sdfs fs dfsdfsdfs', '2006-07-31', '20060731165648', '2006-08-06', 'Received', 'Araç Kiralama', '0%', 'Y', 'Ali', 'admin');

-- --------------------------------------------------------

-- 
-- Tablo yapýsý : `history`
-- 

CREATE TABLE `history` (
  `histid` int(11) NOT NULL auto_increment,
  `taskid` varchar(255) default NULL,
  `notes` text,
  `time_stamp` timestamp(14) NOT NULL,
  PRIMARY KEY  (`histid`)
) TYPE=MyISAM AUTO_INCREMENT=11 ;

-- 
-- Tablo döküm verisi `history`
-- 

INSERT INTO `history` VALUES (1, '1', 'Ýþ Alýnmýþtýr, bir iki gün içinde çalýþmaya baþlanacaktýr', '20060730155207');
INSERT INTO `history` VALUES (2, '1', 'Çalýþmaya baþladým', '20060730155335');
INSERT INTO `history` VALUES (3, '5', 'Bu iþi almam için önceki iþimin bitmesi gerekiyor, bir kaç hafta içinde bu iþi alýcam', '20060730170838');
INSERT INTO `history` VALUES (4, '3', 'Bu görevi þimdilik yapamýyorum iptal etme durumundayým', '20060730172321');
INSERT INTO `history` VALUES (5, '6', 'Bu gorevi simdilik yapamacagim icin iptal etmek durumundayim', '20060730173612');
INSERT INTO `history` VALUES (6, '1', 'Görevi Gördüm', '20060730183310');
INSERT INTO `history` VALUES (7, '1', 'Görevin yarýsýný tamamladým', '20060730191039');
INSERT INTO `history` VALUES (8, '1', 'Görev Bitmiþtir', '20060730205837');
INSERT INTO `history` VALUES (9, '2', 'Bu görevle þu an uðraþmaktayým', '20060730214725');
INSERT INTO `history` VALUES (10, '9', 'gördüm', '20060731120620');

-- --------------------------------------------------------

-- 
-- Tablo yapýsý : `users`
-- 

CREATE TABLE `users` (
  `username` varchar(255) default NULL,
  `email` varchar(255) NOT NULL default '',
  `password` varchar(255) default NULL,
  `realname` varchar(255) default NULL,
  `location` varchar(255) default NULL,
  `workphone` varchar(255) default NULL,
  `department` varchar(255) default NULL,
  `userlevel` varchar(5) default '2',
  `vcode` varchar(255) default NULL,
  PRIMARY KEY  (`email`)
) TYPE=MyISAM;

-- 
-- Tablo döküm verisi `users`
-- 

INSERT INTO `users` VALUES ('admin', 'hipolat@thy.com', '21232f297a57a5a743894a0e4a801fc3', 'Halil Ýbrahim Polat', 'Destek Müdürü', '02122121212', NULL, 'A', NULL);
INSERT INTO `users` VALUES ('testuser', 'testuser@uremail.com', '5d9c68c6c50ed3d02a2fcf54f63993b6', 'Test Eden', NULL, NULL, NULL, '2', NULL);
INSERT INTO `users` VALUES ('Mehmet', 'makalin@thy.com', '62b987cf52d2808721b4376709423d01', 'Mehmet Akalýn', 'uzman', '05055274476', '', '2', '');
INSERT INTO `users` VALUES ('Feridun', 'feridun@matengs.com', '62b987cf52d2808721b4376709423d01', 'Feridun Özçelik', 'uzman yardýmcýsý', '05386815549', '', '2', '');
INSERT INTO `users` VALUES ('Ali', 'aliaydin1985@yahoo.com', 'ac22f22a45ba74daf694acf6929ecebe', 'Ali Aydýn', 'uzman yardýmcýsý', '05052771748', '', '2', '');
INSERT INTO `users` VALUES ('Canan', 'deneme1@matengs.com', 'dc1714869a2af733da31b239db90a49c', 'Canan Soyisim', 'uzman yardýmcýsý', '012345676', '', '2', '');
INSERT INTO `users` VALUES ('Asli', 'aeren@thy.com', '1c5587e4bf3fe2a9d9a831bc8edf0a7e', 'Aslý Turan', 'uzman', '012345676', '', '2', '');
INSERT INTO `users` VALUES ('Fatma', 'fbogaz@thy.com', '713f57e42e1c8002bc921d9a98a18cfa', 'Fatma Bogaz', 'uzman', '012345678', '', '2', '');
