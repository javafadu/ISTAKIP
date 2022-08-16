-- phpMyAdmin SQL Dump
-- version 2.6.3-pl1
-- http://www.phpmyadmin.net
-- 
-- Sunucu: localhost
-- ��kt� Tarihi: Temmuz 31, 2006 at 09:49 PM
-- Server s�r�m�: 3.23.58
-- PHP S�r�m�: 5.0.4
-- 
-- Veritaban�: `istakip`
-- 

-- --------------------------------------------------------

-- 
-- Tablo yap�s� : `categories`
-- 

CREATE TABLE `categories` (
  `catid` int(11) NOT NULL auto_increment,
  `catname` varchar(255) default NULL,
  `taskid` varchar(11) default NULL,
  PRIMARY KEY  (`catid`)
) TYPE=MyISAM AUTO_INCREMENT=4 ;

-- 
-- Tablo d�k�m verisi `categories`
-- 

INSERT INTO `categories` VALUES (1, 'Hat Kart� �al��mas�', NULL);
INSERT INTO `categories` VALUES (2, 'B�t�e Raporlar�', NULL);
INSERT INTO `categories` VALUES (3, 'Ara� Kiralama', NULL);

-- --------------------------------------------------------

-- 
-- Tablo yap�s� : `dev_tasks`
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
-- Tablo d�k�m verisi `dev_tasks`
-- 

INSERT INTO `dev_tasks` VALUES (1, 3, 'Verilerin Toplanmas�', 'Hat kart�na ait veriler toplan�p excel format�nda kaydedilecek', '2006-07-30', '20060730205837', '2006-08-07', 'Complete', 'Hat Kart� �al��mas�', '100%', 'Y', 'Feridun', 'admin');
INSERT INTO `dev_tasks` VALUES (2, 3, 'Verilerin Toplanmas�', 'Hat kart�na ait veriler toplan�p excel format�nda kaydedilecek', '2006-07-30', '20060730214725', '2006-08-07', 'In Progress', 'Hat Kart� �al��mas�', '25%', 'Y', 'Ali', 'admin');
INSERT INTO `dev_tasks` VALUES (3, 3, 'Verilerin Toplanmas�', 'Hat kart�na ait veriler toplan�p excel format�nda kaydedilecek', '2006-07-30', '20060730172321', '2006-08-07', 'Cancelled', 'Hat Kart� �al��mas�', '0%', 'Y', 'Canan', 'admin');
INSERT INTO `dev_tasks` VALUES (4, 2, 'Yurt D��� Ofis B�t�eleri', 'Barcelona ofisinin b�t�esi kontrol edilip eksikler varsa ilgili kuruma bildirilecek', '2006-07-30', '20060730154943', '2006-08-12', 'Received', 'B�t�e Raporlar�', '0%', 'Y', 'Mehmet', 'admin');
INSERT INTO `dev_tasks` VALUES (5, 4, 'Verilerin Toplanmas�', 'Veriler topland�ktan sonra en k�sa s�re i�inde veri taban�na ge�irilsin', '2006-07-30', '20060730161453', '2006-08-14', 'Received', 'Hat Kart� �al��mas�', '0%', 'Y', 'Feridun', 'admin');
INSERT INTO `dev_tasks` VALUES (6, 3, 'Verilerin Toplanmas�', 'Hat kart�na ait veriler toplan�p excel format�nda kaydedilecek', '2006-07-30', '20060730173612', '2006-08-07', 'Cancelled', 'Hat Kart� �al��mas�', '0%', 'Y', 'Canan', 'admin');
INSERT INTO `dev_tasks` VALUES (7, 1, 'Veritaban� Tabloloar�', 'Hat Kart� i�in Veritaban� Tablolar� hemen bitsin', '2006-07-30', '20060730203447', '2006-07-30', 'Received', 'Hat Kart� �al��mas�', '0%', 'Y', 'Feridun', 'admin');
INSERT INTO `dev_tasks` VALUES (8, 1, 'durum', 'afdsfdsavregdv', '2006-07-31', '20060731084721', '2006-08-13', 'Received', 'B�t�e Raporlar�', '0%', 'Y', 'Mehmet', 'admin');
INSERT INTO `dev_tasks` VALUES (9, 3, 'LIS', 'LIS M�d�r�ne adi kiralama ile ara� temini, 6 ayl�k.', '2006-07-31', '20060731120620', '2006-08-01', 'Assigned', 'Ara� Kiralama', '0%', 'Y', 'Fatma', 'admin');
INSERT INTO `dev_tasks` VALUES (10, 2, 'dsdss sdfs', 'sdfs fs dfsdfsdfs', '2006-07-31', '20060731165648', '2006-08-06', 'Received', 'Ara� Kiralama', '0%', 'Y', 'Ali', 'admin');

-- --------------------------------------------------------

-- 
-- Tablo yap�s� : `history`
-- 

CREATE TABLE `history` (
  `histid` int(11) NOT NULL auto_increment,
  `taskid` varchar(255) default NULL,
  `notes` text,
  `time_stamp` timestamp(14) NOT NULL,
  PRIMARY KEY  (`histid`)
) TYPE=MyISAM AUTO_INCREMENT=11 ;

-- 
-- Tablo d�k�m verisi `history`
-- 

INSERT INTO `history` VALUES (1, '1', '�� Al�nm��t�r, bir iki g�n i�inde �al��maya ba�lanacakt�r', '20060730155207');
INSERT INTO `history` VALUES (2, '1', '�al��maya ba�lad�m', '20060730155335');
INSERT INTO `history` VALUES (3, '5', 'Bu i�i almam i�in �nceki i�imin bitmesi gerekiyor, bir ka� hafta i�inde bu i�i al�cam', '20060730170838');
INSERT INTO `history` VALUES (4, '3', 'Bu g�revi �imdilik yapam�yorum iptal etme durumunday�m', '20060730172321');
INSERT INTO `history` VALUES (5, '6', 'Bu gorevi simdilik yapamacagim icin iptal etmek durumundayim', '20060730173612');
INSERT INTO `history` VALUES (6, '1', 'G�revi G�rd�m', '20060730183310');
INSERT INTO `history` VALUES (7, '1', 'G�revin yar�s�n� tamamlad�m', '20060730191039');
INSERT INTO `history` VALUES (8, '1', 'G�rev Bitmi�tir', '20060730205837');
INSERT INTO `history` VALUES (9, '2', 'Bu g�revle �u an u�ra�maktay�m', '20060730214725');
INSERT INTO `history` VALUES (10, '9', 'g�rd�m', '20060731120620');

-- --------------------------------------------------------

-- 
-- Tablo yap�s� : `users`
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
-- Tablo d�k�m verisi `users`
-- 

INSERT INTO `users` VALUES ('admin', 'hipolat@thy.com', '21232f297a57a5a743894a0e4a801fc3', 'Halil �brahim Polat', 'Destek M�d�r�', '02122121212', NULL, 'A', NULL);
INSERT INTO `users` VALUES ('testuser', 'testuser@uremail.com', '5d9c68c6c50ed3d02a2fcf54f63993b6', 'Test Eden', NULL, NULL, NULL, '2', NULL);
INSERT INTO `users` VALUES ('Mehmet', 'makalin@thy.com', '62b987cf52d2808721b4376709423d01', 'Mehmet Akal�n', 'uzman', '05055274476', '', '2', '');
INSERT INTO `users` VALUES ('Feridun', 'feridun@matengs.com', '62b987cf52d2808721b4376709423d01', 'Feridun �z�elik', 'uzman yard�mc�s�', '05386815549', '', '2', '');
INSERT INTO `users` VALUES ('Ali', 'aliaydin1985@yahoo.com', 'ac22f22a45ba74daf694acf6929ecebe', 'Ali Ayd�n', 'uzman yard�mc�s�', '05052771748', '', '2', '');
INSERT INTO `users` VALUES ('Canan', 'deneme1@matengs.com', 'dc1714869a2af733da31b239db90a49c', 'Canan Soyisim', 'uzman yard�mc�s�', '012345676', '', '2', '');
INSERT INTO `users` VALUES ('Asli', 'aeren@thy.com', '1c5587e4bf3fe2a9d9a831bc8edf0a7e', 'Asl� Turan', 'uzman', '012345676', '', '2', '');
INSERT INTO `users` VALUES ('Fatma', 'fbogaz@thy.com', '713f57e42e1c8002bc921d9a98a18cfa', 'Fatma Bogaz', 'uzman', '012345678', '', '2', '');
