# phpMyAdmin MySQL-Dump
# version 2.2.6
# http://phpwizard.net/phpMyAdmin/
# http://www.phpmyadmin.net/ (download page)
#
# Sunucu:: localhost
# ��kt� Tarihi: A�ustos 01, 2006 at 03:20 PM
# Server s�r�m�: 3.23.49
# PHP S�r�m�: 4.2.0
# Veritaban� : `istakip`
# --------------------------------------------------------

#
# Tablo i�in tablo yap�s� `categories`
#

CREATE TABLE categories (
  catid int(11) NOT NULL auto_increment,
  catname varchar(255) default NULL,
  taskid varchar(11) default NULL,
  PRIMARY KEY  (catid)
) TYPE=MyISAM;

#
# Tablo d�k�m verisi `categories`
#

INSERT INTO categories VALUES (4, 'Demirba� Temini', NULL);
INSERT INTO categories VALUES (5, 'Ara� Temini', NULL);
INSERT INTO categories VALUES (6, 'Ofis Temini', NULL);
INSERT INTO categories VALUES (10, 'M�d�r Evi Temini', NULL);
INSERT INTO categories VALUES (8, 'Mali M��avirli�i', NULL);
INSERT INTO categories VALUES (9, 'Hukuk M��avirli�i', NULL);
INSERT INTO categories VALUES (11, 'Tadilat', NULL);
# --------------------------------------------------------

#
# Tablo i�in tablo yap�s� `dev_tasks`
#

CREATE TABLE dev_tasks (
  taskid mediumint(9) NOT NULL auto_increment,
  priority tinyint(4) NOT NULL default '0',
  title varchar(255) NOT NULL default '',
  description varchar(255) NOT NULL default '',
  open_date date default NULL,
  last_change timestamp(14) NOT NULL,
  deadline date NOT NULL default '0000-00-00',
  statusname varchar(15) NOT NULL default 'Received',
  catname varchar(100) NOT NULL default '',
  status varchar(5) NOT NULL default '0%',
  display char(1) NOT NULL default 'Y',
  personnel varchar(255) NOT NULL default '',
  manager varchar(255) NOT NULL default '',
  PRIMARY KEY  (taskid),
  KEY description (description),
  KEY open_date (open_date),
  KEY deadline (deadline),
  KEY catname (catname),
  KEY personnel (personnel)
) TYPE=MyISAM;

#
# Tablo d�k�m verisi `dev_tasks`
#

INSERT INTO dev_tasks VALUES (11, 1, 'DAM', 'Bu ofise ara� al�nacak en k�sa zamanda', '2006-08-01', 20060801113015, '2006-08-03', 'Received', 'Ara� Temini', '0%', 'Y', 'Mehmet', 'admin');
INSERT INTO dev_tasks VALUES (12, 2, 'ALG', 'Sd adas das das dasda', '2006-08-01', 20060801114543, '2006-08-28', 'Received', 'Mali M��avirli�i', '0%', 'Y', 'Canan', 'admin');
# --------------------------------------------------------

#
# Tablo i�in tablo yap�s� `history`
#

CREATE TABLE history (
  histid int(11) NOT NULL auto_increment,
  taskid varchar(255) default NULL,
  notes text,
  time_stamp timestamp(14) NOT NULL,
  PRIMARY KEY  (histid)
) TYPE=MyISAM;

#
# Tablo d�k�m verisi `history`
#

# --------------------------------------------------------

#
# Tablo i�in tablo yap�s� `ofisler`
#

CREATE TABLE ofisler (
  ofisid int(11) NOT NULL auto_increment,
  ofisulke varchar(80) default NULL,
  ofisname varchar(255) default NULL,
  ofiskod varchar(11) default NULL,
  PRIMARY KEY  (ofisid)
) TYPE=MyISAM;

#
# Tablo d�k�m verisi `ofisler`
#

INSERT INTO ofisler VALUES (1, 'ALMANYA', 'BERL�N', 'BER');
INSERT INTO ofisler VALUES (2, 'ALMANYA', 'STUTGART', 'STR');
INSERT INTO ofisler VALUES (3, 'ALMANYA', 'D�SSELDORF', 'DUS');
INSERT INTO ofisler VALUES (4, 'ALMANYA', 'FRANKFURT', 'FRA');
INSERT INTO ofisler VALUES (5, 'ALMANYA', 'HAMBURG', 'HAM');
INSERT INTO ofisler VALUES (6, 'ALMANYA', 'HANNOVER', 'HAJ');
INSERT INTO ofisler VALUES (7, 'ALMANYA', 'K�LN', 'CGN');
INSERT INTO ofisler VALUES (8, 'ALMANYA', 'MUN�H', 'MUC');
INSERT INTO ofisler VALUES (9, 'ALMANYA', 'N�RNBERG', 'NUE');
INSERT INTO ofisler VALUES (10, 'FRANSA', 'PAR�S', 'PAR');
INSERT INTO ofisler VALUES (11, 'FRANSA', 'NICE', 'NCE');
INSERT INTO ofisler VALUES (12, 'FRANSA', 'STRASBOURG', 'SXB');
INSERT INTO ofisler VALUES (13, 'FRANSA', 'LYON', 'LYS');
INSERT INTO ofisler VALUES (14, '�SV��RE', 'BASEL', 'BSL');
INSERT INTO ofisler VALUES (15, '�SV��RE', 'Z�R�H', 'ZRH');
INSERT INTO ofisler VALUES (16, '�SV��RE', 'CENEVRE', 'GVA');
INSERT INTO ofisler VALUES (17, 'UKRAYNA', 'ODESSA', 'ODS');
INSERT INTO ofisler VALUES (18, 'UKRAYNA', 'K�EV', 'IEV');
INSERT INTO ofisler VALUES (19, 'UKRAYNA', 'S�MFEROPOL', 'SIP');
INSERT INTO ofisler VALUES (20, 'UKRAYNA', 'DONETSK', 'DOK');
INSERT INTO ofisler VALUES (21, 'UKRAYNA', 'DNEPREPETROVSK', 'DNK');
INSERT INTO ofisler VALUES (22, '�SPANYA', 'BARCELONA', 'BCN');
INSERT INTO ofisler VALUES (23, '�SPANYA', 'MADR�D', 'MAD');
INSERT INTO ofisler VALUES (24, '�TALYA', 'M�LANO', 'MIL');
INSERT INTO ofisler VALUES (25, '�TALYA', 'ROMA', 'ROM');
INSERT INTO ofisler VALUES (26, '�TALYA', 'VENED�K', 'VCE');
INSERT INTO ofisler VALUES (27, '�NG�LTERE', 'LONDRA', 'LON');
INSERT INTO ofisler VALUES (28, '�NG�LTERE', 'MANCHESTER', 'MAN');
INSERT INTO ofisler VALUES (29, 'RUSYA', 'MOSKOVA', 'MOW');
INSERT INTO ofisler VALUES (30, 'RUSYA', 'ROSTOV', 'ROV');
INSERT INTO ofisler VALUES (31, 'RUSYA', 'KAZAN', 'KZN');
INSERT INTO ofisler VALUES (32, 'RUSYA', 'ST.PETERSBURG', 'LED');
INSERT INTO ofisler VALUES (33, 'RUSYA', 'YEKATERINBURG', 'SVX');
INSERT INTO ofisler VALUES (34, 'BEYAZ RUSYA', 'MINSK', 'MSQ');
INSERT INTO ofisler VALUES (35, 'ARNAVUTLUK', 'T�RAN', 'TIA');
INSERT INTO ofisler VALUES (36, 'AVUSTURYA', 'V�YANA', 'VIE');
INSERT INTO ofisler VALUES (37, 'AZERBEYCAN', 'BAK�', 'BAK');
INSERT INTO ofisler VALUES (38, 'BEL��KA', 'BR�KSEL', 'BRU');
INSERT INTO ofisler VALUES (39, 'BOSNA HERSEK', 'SARAYBOSNA', 'SJJ');
INSERT INTO ofisler VALUES (40, 'BULGAR�STAN', 'SOFYA', 'SOF');
INSERT INTO ofisler VALUES (41, '�EK CUMHUR�YET�', 'PRAG', 'PRG');
INSERT INTO ofisler VALUES (42, 'DAN�MARKA', 'KOPENHAG', 'CPH');
INSERT INTO ofisler VALUES (43, 'F�NLAND�YA', 'HELS�NK�', 'HEL');
INSERT INTO ofisler VALUES (44, 'G�RC�STAN', 'T�FL�S', 'TBS');
INSERT INTO ofisler VALUES (45, 'HIRVAT�STAN', 'ZAGREP', 'ZAG');
INSERT INTO ofisler VALUES (46, 'HOLLANDA', 'AMSTERDAM', 'AMS');
INSERT INTO ofisler VALUES (47, '�RLANDA', 'DUBL�N', 'DUB');
INSERT INTO ofisler VALUES (48, '�SVE�', 'STOKHOLM', 'STO');
INSERT INTO ofisler VALUES (49, 'KKTC', 'LEFKO�E', 'ECN');
INSERT INTO ofisler VALUES (50, 'L�TVANYA', 'R�GA', 'RIX');
INSERT INTO ofisler VALUES (51, 'MACAR�STAN', 'BUDAPE�TE', 'BUD');
INSERT INTO ofisler VALUES (52, 'MAKEDONYA', '�SK�P', 'SKP');
INSERT INTO ofisler VALUES (53, 'MOLDOVA', 'K���NEV', 'KIV');
INSERT INTO ofisler VALUES (54, 'NORVE�', 'OSLO', 'OSL');
INSERT INTO ofisler VALUES (55, 'POLONYA', 'VAR�OVA', 'WAW');
INSERT INTO ofisler VALUES (56, 'PORTEK�Z', 'L�ZBON', 'LIS');
INSERT INTO ofisler VALUES (57, 'ROMANYA', 'B�KRE�', 'BUH');
INSERT INTO ofisler VALUES (58, 'SIRB�STAN', 'PR��T�NA', 'PRN');
INSERT INTO ofisler VALUES (59, 'SIRB�STAN', 'BELGRAD', 'BEG');
INSERT INTO ofisler VALUES (60, 'SLOVENYA', 'LUBLJANA', 'LJU');
INSERT INTO ofisler VALUES (61, 'YUNAN�STAN', 'AT�NA', 'ATH');
INSERT INTO ofisler VALUES (62, 'KAZAK�STAN', 'ALMATY', 'ALA');
INSERT INTO ofisler VALUES (63, 'KAZAK�STAN', 'ASTANA', 'TSE');
INSERT INTO ofisler VALUES (64, 'T�RKMEN�STAN', 'A�KABAT', 'ASB');
INSERT INTO ofisler VALUES (65, 'KIRGIZ�STAN', 'TA�KENT', 'TAS');
INSERT INTO ofisler VALUES (66, '�ZBEK�STAN', 'BISHKEK', 'FRU');
INSERT INTO ofisler VALUES (67, 'TAC�K�STAN', 'DU�ANBE', 'DYU');
INSERT INTO ofisler VALUES (68, '��N', 'BEIJING', 'PEK');
INSERT INTO ofisler VALUES (69, '��N', '�ANGHAY', 'SHA');
INSERT INTO ofisler VALUES (70, '��N', 'HONG KONG', 'HKG');
INSERT INTO ofisler VALUES (71, 'PAK�STAN', 'KARA��', 'KHI');
INSERT INTO ofisler VALUES (72, 'G�NEY KORE', 'SEUL', 'SEL');
INSERT INTO ofisler VALUES (73, 'S�NGAPUR', 'S�NGAPUR', 'SIN');
INSERT INTO ofisler VALUES (74, 'JAPONYA', 'TOKYO', 'TYO');
INSERT INTO ofisler VALUES (76, 'TAYLAND', 'BANGKOK', 'BKK');
INSERT INTO ofisler VALUES (77, 'H�ND�STAN', 'YEN� DELH�', 'DEL');
INSERT INTO ofisler VALUES (78, 'H�ND�STAN', 'BOMBAY', 'BOM');
INSERT INTO ofisler VALUES (79, '�RD�N', 'AMMAN', 'AMM');
INSERT INTO ofisler VALUES (80, 'BAHREYN', 'BAHREYN', 'BAH');
INSERT INTO ofisler VALUES (81, 'B�RLE��K ARAP EM�RL�KLER�', 'DUBA�', 'DXB');
INSERT INTO ofisler VALUES (82, 'B�RLE��K ARAP EM�RL�KLER�', 'ABU DHABI', 'AUH');
INSERT INTO ofisler VALUES (83, 'KATAR', 'DOHA', 'DOH');
INSERT INTO ofisler VALUES (84, 'KUVEYT', 'KUVEYT', 'KWI');
INSERT INTO ofisler VALUES (85, 'SUUD� ARAB�STAN', 'R�YAD', 'RUH');
INSERT INTO ofisler VALUES (86, 'SUUD� ARAB�STAN', 'C�DDE', 'JED');
INSERT INTO ofisler VALUES (87, 'SUR�YE', '�AM', 'DAM');
INSERT INTO ofisler VALUES (88, '�RAN', 'TAHRAN', 'THR');
INSERT INTO ofisler VALUES (89, '�RAN', 'TEBR�Z', 'TBZ');
INSERT INTO ofisler VALUES (90, '�SRA�L', 'TEL AV�V', 'TLV');
INSERT INTO ofisler VALUES (91, 'L�BNAN', 'BEYRUT', 'BEY');
INSERT INTO ofisler VALUES (92, 'UMMAN', 'MUSCAT', 'MCT');
INSERT INTO ofisler VALUES (93, 'YEMEN', 'SANAA', 'SAH');
INSERT INTO ofisler VALUES (94, 'CEZAY�R', 'CEZAY�R', 'ALG');
INSERT INTO ofisler VALUES (95, 'MISIR', 'KAH�RE', 'CAI');
INSERT INTO ofisler VALUES (96, 'L�BYA', 'TR�POL�', 'TIP');
INSERT INTO ofisler VALUES (97, 'TUNUS', 'TUNUS', 'TUN');
INSERT INTO ofisler VALUES (98, 'FAS', 'CASABLANCA', 'CAS');
INSERT INTO ofisler VALUES (99, 'ET�YOPYA', 'ADD�SABABA', 'ADD');
INSERT INTO ofisler VALUES (100, 'SUDAN', 'HARTUM', 'KRT');
INSERT INTO ofisler VALUES (101, 'N�JERYA', 'LAGOS', 'LOS');
INSERT INTO ofisler VALUES (102, 'AMER�KA B�RLE��K DEVLETLER�', 'NEW YORK', 'NYC');
INSERT INTO ofisler VALUES (103, 'AMER�KA B�RLE��K DEVLETLER�', '��KAGO', 'CHI');
# --------------------------------------------------------

#
# Tablo i�in tablo yap�s� `users`
#

CREATE TABLE users (
  username varchar(255) default NULL,
  email varchar(255) NOT NULL default '',
  password varchar(255) default NULL,
  realname varchar(255) default NULL,
  location varchar(255) default NULL,
  workphone varchar(255) default NULL,
  department varchar(255) default NULL,
  userlevel varchar(5) default '2',
  vcode varchar(255) default NULL,
  PRIMARY KEY  (email)
) TYPE=MyISAM;

#
# Tablo d�k�m verisi `users`
#

INSERT INTO users VALUES ('admin', 'hipolat@thy.com', '21232f297a57a5a743894a0e4a801fc3', 'Halil �brahim Polat', 'Destek M�d�r�', '02122121212', NULL, 'A', NULL);
INSERT INTO users VALUES ('testuser', 'testuser@uremail.com', '5d9c68c6c50ed3d02a2fcf54f63993b6', 'Test Eden', NULL, NULL, NULL, '2', NULL);
INSERT INTO users VALUES ('Mehmet', 'makalin@thy.com', '62b987cf52d2808721b4376709423d01', 'Mehmet Akal�n', 'uzman', '05055274476', '', '2', '');
INSERT INTO users VALUES ('Feridun', 'feridun@matengs.com', '62b987cf52d2808721b4376709423d01', 'Feridun �z�elik', 'uzman yard�mc�s�', '05386815549', '', '2', '');
INSERT INTO users VALUES ('Ali', 'aliaydin1985@yahoo.com', 'ac22f22a45ba74daf694acf6929ecebe', 'Ali Ayd�n', 'uzman yard�mc�s�', '05052771748', '', '2', '');
INSERT INTO users VALUES ('Canan', 'deneme1@matengs.com', 'dc1714869a2af733da31b239db90a49c', 'Canan Soyisim', 'uzman yard�mc�s�', '012345676', '', '2', '');
INSERT INTO users VALUES ('Asli', 'aeren@thy.com', '1c5587e4bf3fe2a9d9a831bc8edf0a7e', 'Asl� Turan', 'uzman', '012345676', '', '2', '');
INSERT INTO users VALUES ('Fatma', 'fbogaz@thy.com', '713f57e42e1c8002bc921d9a98a18cfa', 'Fatma Bogaz', 'uzman', '012345678', '', '2', '');

