# phpMyAdmin MySQL-Dump
# version 2.2.6
# http://phpwizard.net/phpMyAdmin/
# http://www.phpmyadmin.net/ (download page)
#
# Sunucu:: localhost
# Çýktý Tarihi: Aðustos 01, 2006 at 03:20 PM
# Server sürümü: 3.23.49
# PHP Sürümü: 4.2.0
# Veritabaný : `istakip`
# --------------------------------------------------------

#
# Tablo için tablo yapýsý `categories`
#

CREATE TABLE categories (
  catid int(11) NOT NULL auto_increment,
  catname varchar(255) default NULL,
  taskid varchar(11) default NULL,
  PRIMARY KEY  (catid)
) TYPE=MyISAM;

#
# Tablo döküm verisi `categories`
#

INSERT INTO categories VALUES (4, 'Demirbaþ Temini', NULL);
INSERT INTO categories VALUES (5, 'Araç Temini', NULL);
INSERT INTO categories VALUES (6, 'Ofis Temini', NULL);
INSERT INTO categories VALUES (10, 'Müdür Evi Temini', NULL);
INSERT INTO categories VALUES (8, 'Mali Müþavirliði', NULL);
INSERT INTO categories VALUES (9, 'Hukuk Müþavirliði', NULL);
INSERT INTO categories VALUES (11, 'Tadilat', NULL);
# --------------------------------------------------------

#
# Tablo için tablo yapýsý `dev_tasks`
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
# Tablo döküm verisi `dev_tasks`
#

INSERT INTO dev_tasks VALUES (11, 1, 'DAM', 'Bu ofise araç alýnacak en kýsa zamanda', '2006-08-01', 20060801113015, '2006-08-03', 'Received', 'Araç Temini', '0%', 'Y', 'Mehmet', 'admin');
INSERT INTO dev_tasks VALUES (12, 2, 'ALG', 'Sd adas das das dasda', '2006-08-01', 20060801114543, '2006-08-28', 'Received', 'Mali Müþavirliði', '0%', 'Y', 'Canan', 'admin');
# --------------------------------------------------------

#
# Tablo için tablo yapýsý `history`
#

CREATE TABLE history (
  histid int(11) NOT NULL auto_increment,
  taskid varchar(255) default NULL,
  notes text,
  time_stamp timestamp(14) NOT NULL,
  PRIMARY KEY  (histid)
) TYPE=MyISAM;

#
# Tablo döküm verisi `history`
#

# --------------------------------------------------------

#
# Tablo için tablo yapýsý `ofisler`
#

CREATE TABLE ofisler (
  ofisid int(11) NOT NULL auto_increment,
  ofisulke varchar(80) default NULL,
  ofisname varchar(255) default NULL,
  ofiskod varchar(11) default NULL,
  PRIMARY KEY  (ofisid)
) TYPE=MyISAM;

#
# Tablo döküm verisi `ofisler`
#

INSERT INTO ofisler VALUES (1, 'ALMANYA', 'BERLÝN', 'BER');
INSERT INTO ofisler VALUES (2, 'ALMANYA', 'STUTGART', 'STR');
INSERT INTO ofisler VALUES (3, 'ALMANYA', 'DÜSSELDORF', 'DUS');
INSERT INTO ofisler VALUES (4, 'ALMANYA', 'FRANKFURT', 'FRA');
INSERT INTO ofisler VALUES (5, 'ALMANYA', 'HAMBURG', 'HAM');
INSERT INTO ofisler VALUES (6, 'ALMANYA', 'HANNOVER', 'HAJ');
INSERT INTO ofisler VALUES (7, 'ALMANYA', 'KÖLN', 'CGN');
INSERT INTO ofisler VALUES (8, 'ALMANYA', 'MUNÝH', 'MUC');
INSERT INTO ofisler VALUES (9, 'ALMANYA', 'NÜRNBERG', 'NUE');
INSERT INTO ofisler VALUES (10, 'FRANSA', 'PARÝS', 'PAR');
INSERT INTO ofisler VALUES (11, 'FRANSA', 'NICE', 'NCE');
INSERT INTO ofisler VALUES (12, 'FRANSA', 'STRASBOURG', 'SXB');
INSERT INTO ofisler VALUES (13, 'FRANSA', 'LYON', 'LYS');
INSERT INTO ofisler VALUES (14, 'ÝSVÝÇRE', 'BASEL', 'BSL');
INSERT INTO ofisler VALUES (15, 'ÝSVÝÇRE', 'ZÜRÝH', 'ZRH');
INSERT INTO ofisler VALUES (16, 'ÝSVÝÇRE', 'CENEVRE', 'GVA');
INSERT INTO ofisler VALUES (17, 'UKRAYNA', 'ODESSA', 'ODS');
INSERT INTO ofisler VALUES (18, 'UKRAYNA', 'KÝEV', 'IEV');
INSERT INTO ofisler VALUES (19, 'UKRAYNA', 'SÝMFEROPOL', 'SIP');
INSERT INTO ofisler VALUES (20, 'UKRAYNA', 'DONETSK', 'DOK');
INSERT INTO ofisler VALUES (21, 'UKRAYNA', 'DNEPREPETROVSK', 'DNK');
INSERT INTO ofisler VALUES (22, 'ÝSPANYA', 'BARCELONA', 'BCN');
INSERT INTO ofisler VALUES (23, 'ÝSPANYA', 'MADRÝD', 'MAD');
INSERT INTO ofisler VALUES (24, 'ÝTALYA', 'MÝLANO', 'MIL');
INSERT INTO ofisler VALUES (25, 'ÝTALYA', 'ROMA', 'ROM');
INSERT INTO ofisler VALUES (26, 'ÝTALYA', 'VENEDÝK', 'VCE');
INSERT INTO ofisler VALUES (27, 'ÝNGÝLTERE', 'LONDRA', 'LON');
INSERT INTO ofisler VALUES (28, 'ÝNGÝLTERE', 'MANCHESTER', 'MAN');
INSERT INTO ofisler VALUES (29, 'RUSYA', 'MOSKOVA', 'MOW');
INSERT INTO ofisler VALUES (30, 'RUSYA', 'ROSTOV', 'ROV');
INSERT INTO ofisler VALUES (31, 'RUSYA', 'KAZAN', 'KZN');
INSERT INTO ofisler VALUES (32, 'RUSYA', 'ST.PETERSBURG', 'LED');
INSERT INTO ofisler VALUES (33, 'RUSYA', 'YEKATERINBURG', 'SVX');
INSERT INTO ofisler VALUES (34, 'BEYAZ RUSYA', 'MINSK', 'MSQ');
INSERT INTO ofisler VALUES (35, 'ARNAVUTLUK', 'TÝRAN', 'TIA');
INSERT INTO ofisler VALUES (36, 'AVUSTURYA', 'VÝYANA', 'VIE');
INSERT INTO ofisler VALUES (37, 'AZERBEYCAN', 'BAKÜ', 'BAK');
INSERT INTO ofisler VALUES (38, 'BELÇÝKA', 'BRÜKSEL', 'BRU');
INSERT INTO ofisler VALUES (39, 'BOSNA HERSEK', 'SARAYBOSNA', 'SJJ');
INSERT INTO ofisler VALUES (40, 'BULGARÝSTAN', 'SOFYA', 'SOF');
INSERT INTO ofisler VALUES (41, 'ÇEK CUMHURÝYETÝ', 'PRAG', 'PRG');
INSERT INTO ofisler VALUES (42, 'DANÝMARKA', 'KOPENHAG', 'CPH');
INSERT INTO ofisler VALUES (43, 'FÝNLANDÝYA', 'HELSÝNKÝ', 'HEL');
INSERT INTO ofisler VALUES (44, 'GÜRCÝSTAN', 'TÝFLÝS', 'TBS');
INSERT INTO ofisler VALUES (45, 'HIRVATÝSTAN', 'ZAGREP', 'ZAG');
INSERT INTO ofisler VALUES (46, 'HOLLANDA', 'AMSTERDAM', 'AMS');
INSERT INTO ofisler VALUES (47, 'ÝRLANDA', 'DUBLÝN', 'DUB');
INSERT INTO ofisler VALUES (48, 'ÝSVEÇ', 'STOKHOLM', 'STO');
INSERT INTO ofisler VALUES (49, 'KKTC', 'LEFKOÞE', 'ECN');
INSERT INTO ofisler VALUES (50, 'LÝTVANYA', 'RÝGA', 'RIX');
INSERT INTO ofisler VALUES (51, 'MACARÝSTAN', 'BUDAPEÞTE', 'BUD');
INSERT INTO ofisler VALUES (52, 'MAKEDONYA', 'ÜSKÜP', 'SKP');
INSERT INTO ofisler VALUES (53, 'MOLDOVA', 'KÝÞÝNEV', 'KIV');
INSERT INTO ofisler VALUES (54, 'NORVEÇ', 'OSLO', 'OSL');
INSERT INTO ofisler VALUES (55, 'POLONYA', 'VARÞOVA', 'WAW');
INSERT INTO ofisler VALUES (56, 'PORTEKÝZ', 'LÝZBON', 'LIS');
INSERT INTO ofisler VALUES (57, 'ROMANYA', 'BÜKREÞ', 'BUH');
INSERT INTO ofisler VALUES (58, 'SIRBÝSTAN', 'PRÝÞTÝNA', 'PRN');
INSERT INTO ofisler VALUES (59, 'SIRBÝSTAN', 'BELGRAD', 'BEG');
INSERT INTO ofisler VALUES (60, 'SLOVENYA', 'LUBLJANA', 'LJU');
INSERT INTO ofisler VALUES (61, 'YUNANÝSTAN', 'ATÝNA', 'ATH');
INSERT INTO ofisler VALUES (62, 'KAZAKÝSTAN', 'ALMATY', 'ALA');
INSERT INTO ofisler VALUES (63, 'KAZAKÝSTAN', 'ASTANA', 'TSE');
INSERT INTO ofisler VALUES (64, 'TÜRKMENÝSTAN', 'AÞKABAT', 'ASB');
INSERT INTO ofisler VALUES (65, 'KIRGIZÝSTAN', 'TAÞKENT', 'TAS');
INSERT INTO ofisler VALUES (66, 'ÖZBEKÝSTAN', 'BISHKEK', 'FRU');
INSERT INTO ofisler VALUES (67, 'TACÝKÝSTAN', 'DUÞANBE', 'DYU');
INSERT INTO ofisler VALUES (68, 'ÇÝN', 'BEIJING', 'PEK');
INSERT INTO ofisler VALUES (69, 'ÇÝN', 'ÞANGHAY', 'SHA');
INSERT INTO ofisler VALUES (70, 'ÇÝN', 'HONG KONG', 'HKG');
INSERT INTO ofisler VALUES (71, 'PAKÝSTAN', 'KARAÇÝ', 'KHI');
INSERT INTO ofisler VALUES (72, 'GÜNEY KORE', 'SEUL', 'SEL');
INSERT INTO ofisler VALUES (73, 'SÝNGAPUR', 'SÝNGAPUR', 'SIN');
INSERT INTO ofisler VALUES (74, 'JAPONYA', 'TOKYO', 'TYO');
INSERT INTO ofisler VALUES (76, 'TAYLAND', 'BANGKOK', 'BKK');
INSERT INTO ofisler VALUES (77, 'HÝNDÝSTAN', 'YENÝ DELHÝ', 'DEL');
INSERT INTO ofisler VALUES (78, 'HÝNDÝSTAN', 'BOMBAY', 'BOM');
INSERT INTO ofisler VALUES (79, 'ÜRDÜN', 'AMMAN', 'AMM');
INSERT INTO ofisler VALUES (80, 'BAHREYN', 'BAHREYN', 'BAH');
INSERT INTO ofisler VALUES (81, 'BÝRLEÞÝK ARAP EMÝRLÝKLERÝ', 'DUBAÝ', 'DXB');
INSERT INTO ofisler VALUES (82, 'BÝRLEÞÝK ARAP EMÝRLÝKLERÝ', 'ABU DHABI', 'AUH');
INSERT INTO ofisler VALUES (83, 'KATAR', 'DOHA', 'DOH');
INSERT INTO ofisler VALUES (84, 'KUVEYT', 'KUVEYT', 'KWI');
INSERT INTO ofisler VALUES (85, 'SUUDÝ ARABÝSTAN', 'RÝYAD', 'RUH');
INSERT INTO ofisler VALUES (86, 'SUUDÝ ARABÝSTAN', 'CÝDDE', 'JED');
INSERT INTO ofisler VALUES (87, 'SURÝYE', 'ÞAM', 'DAM');
INSERT INTO ofisler VALUES (88, 'ÝRAN', 'TAHRAN', 'THR');
INSERT INTO ofisler VALUES (89, 'ÝRAN', 'TEBRÝZ', 'TBZ');
INSERT INTO ofisler VALUES (90, 'ÝSRAÝL', 'TEL AVÝV', 'TLV');
INSERT INTO ofisler VALUES (91, 'LÜBNAN', 'BEYRUT', 'BEY');
INSERT INTO ofisler VALUES (92, 'UMMAN', 'MUSCAT', 'MCT');
INSERT INTO ofisler VALUES (93, 'YEMEN', 'SANAA', 'SAH');
INSERT INTO ofisler VALUES (94, 'CEZAYÝR', 'CEZAYÝR', 'ALG');
INSERT INTO ofisler VALUES (95, 'MISIR', 'KAHÝRE', 'CAI');
INSERT INTO ofisler VALUES (96, 'LÝBYA', 'TRÝPOLÝ', 'TIP');
INSERT INTO ofisler VALUES (97, 'TUNUS', 'TUNUS', 'TUN');
INSERT INTO ofisler VALUES (98, 'FAS', 'CASABLANCA', 'CAS');
INSERT INTO ofisler VALUES (99, 'ETÝYOPYA', 'ADDÝSABABA', 'ADD');
INSERT INTO ofisler VALUES (100, 'SUDAN', 'HARTUM', 'KRT');
INSERT INTO ofisler VALUES (101, 'NÝJERYA', 'LAGOS', 'LOS');
INSERT INTO ofisler VALUES (102, 'AMERÝKA BÝRLEÞÝK DEVLETLERÝ', 'NEW YORK', 'NYC');
INSERT INTO ofisler VALUES (103, 'AMERÝKA BÝRLEÞÝK DEVLETLERÝ', 'ÞÝKAGO', 'CHI');
# --------------------------------------------------------

#
# Tablo için tablo yapýsý `users`
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
# Tablo döküm verisi `users`
#

INSERT INTO users VALUES ('admin', 'hipolat@thy.com', '21232f297a57a5a743894a0e4a801fc3', 'Halil Ýbrahim Polat', 'Destek Müdürü', '02122121212', NULL, 'A', NULL);
INSERT INTO users VALUES ('testuser', 'testuser@uremail.com', '5d9c68c6c50ed3d02a2fcf54f63993b6', 'Test Eden', NULL, NULL, NULL, '2', NULL);
INSERT INTO users VALUES ('Mehmet', 'makalin@thy.com', '62b987cf52d2808721b4376709423d01', 'Mehmet Akalýn', 'uzman', '05055274476', '', '2', '');
INSERT INTO users VALUES ('Feridun', 'feridun@matengs.com', '62b987cf52d2808721b4376709423d01', 'Feridun Özçelik', 'uzman yardýmcýsý', '05386815549', '', '2', '');
INSERT INTO users VALUES ('Ali', 'aliaydin1985@yahoo.com', 'ac22f22a45ba74daf694acf6929ecebe', 'Ali Aydýn', 'uzman yardýmcýsý', '05052771748', '', '2', '');
INSERT INTO users VALUES ('Canan', 'deneme1@matengs.com', 'dc1714869a2af733da31b239db90a49c', 'Canan Soyisim', 'uzman yardýmcýsý', '012345676', '', '2', '');
INSERT INTO users VALUES ('Asli', 'aeren@thy.com', '1c5587e4bf3fe2a9d9a831bc8edf0a7e', 'Aslý Turan', 'uzman', '012345676', '', '2', '');
INSERT INTO users VALUES ('Fatma', 'fbogaz@thy.com', '713f57e42e1c8002bc921d9a98a18cfa', 'Fatma Bogaz', 'uzman', '012345678', '', '2', '');

