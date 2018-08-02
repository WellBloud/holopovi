-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `event`;
CREATE TABLE `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `album` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `happened_on` date NOT NULL,
  `icon_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3BAE0AA754B9D732` (`icon_id`),
  CONSTRAINT `FK_3BAE0AA754B9D732` FOREIGN KEY (`icon_id`) REFERENCES `icon` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `event` (`id`, `title`, `album`, `description`, `happened_on`, `icon_id`) VALUES
(1,	'První setkání',	'2004_setkani',	'<p>Poprvé jsme se uviděli při nástupu do prváku na <a href=\"http://www.gml.cz/\" target=\"_blank\"><abbr title=\"Gymnázium Matyáše Lercha\">GML</abbr></a>. Tehdy jsme ale vypadali jako pořádný paka</p>',	'2004-09-01',	1),
(2,	'Lyžák v prváku',	'2005_lyzak',	'<p>První flirtování v podobě shazování druhého z lyží započalo již zde.</p>',	'2005-02-25',	2),
(3,	'Bílá prodloužená',	'2005_bila_prodlouzena',	'<p>Ó ano, i my jsme se učili tancovat. Vyvrcholením tohoto marného snažení byla dechberoucí podívaná, určená především pro nostalgické vzpomínky rodičů a posměch přihlížejících.</p>',	'2005-11-24',	1),
(4,	'Začátek chození',	'',	'<p>Dohromady jsme se dali na konci třeťáku, při úmorných studiích na <a href=\"http://www.gml.cz/\" target=\"_blank\"><abbr title=\"Gymnázium Matyáše Lercha\">GML</abbr></a>.</p>',	'2007-02-28',	2),
(5,	'Pařba ve 14ce',	'2007_14ka',	'<p>Jeden z mnoha večerů strávených kdesi ve městě...</p>',	'2007-05-10',	1),
(6,	'Výlet do Olomouce',	'2005_olomouc',	NULL,	'2007-05-21',	2),
(7,	'Markétka skáče z letadla',	'2007_seskok',	NULL,	'2007-07-02',	1),
(8,	'MHD Selfie',	'2007_mhd',	'<p>Ještě než to bylo cool...</p>',	'2007-08-18',	1),
(9,	'Silvestr 2007',	'2007_silvestr',	NULL,	'2007-12-31',	2),
(10,	'Stužkovák',	'2008_stuzkovak',	NULL,	'2008-04-08',	1),
(11,	'Poslední zvonění',	'2008_posledni_zvoneni',	NULL,	'2008-04-30',	1),
(12,	'Svatba Míšy a Verči',	'2008_svatba_misy',	NULL,	'2008-06-15',	1),
(13,	'Výlet do Alp s Ráčkovic famílií',	'2008_alpy',	'<p>Celodenní procházka po okraji Alp.</p>',	'2008-10-11',	2),
(14,	'Alpská lyžovačka s Lukášem a Marky',	'2009_alpy_italie',	'<p>Sice padaly laviny, ale o to to byl větší zážitek</p>',	'2009-03-28',	2),
(15,	'Svoboďáček s Kubou a Jančou',	'2009_svobodacek',	'<p>S <a href=\"http://jancaakubaseberou.cz/\" target=\"_blank\">Kubou a Jančou</a></p>',	'2009-12-27',	1),
(16,	'Silvestr 2009',	'2009_silvestr',	NULL,	'2009-12-31',	1),
(17,	'Joey',	'2010_joey',	NULL,	'2010-02-28',	1),
(18,	'Svatba Káji a Ľubky',	'2010_svatby',	NULL,	'2010-04-24',	1),
(19,	'Tatry',	'2010_tatry',	NULL,	'2010-08-01',	2),
(20,	'Víkend na Balatóně',	'2010_balaton',	NULL,	'2010-09-16',	2),
(21,	'Joey pod vánočním stromečkem',	'',	'<p><iframe width=\"462\" height=\"260\" src=\"https://www.youtube.com/embed/yk4zlZx3Yws?rel=0&amp;showinfo=0\" frameborder=\"0\" allowfullscreen></iframe></p>',	'2010-12-24',	3),
(22,	'Koncert kapely The Hiccups',	'2011_marky_koncert',	NULL,	'2011-03-24',	1),
(23,	'Dovolená Itálie',	'2011_italie',	NULL,	'2011-07-31',	2),
(24,	'Jízda Brnem na bruslích',	'2011_jizda_brnem',	NULL,	'2011-08-15',	1),
(25,	'Míša',	'2011_misa',	NULL,	'2011-10-03',	1),
(26,	'Míša a Joey se perou o dobroty',	'',	'<p><iframe width=\"462\" height=\"260\" src=\"https://www.youtube.com/embed/dCaMkikHu9A?rel=0&amp;showinfo=0\" frameborder=\"0\" allowfullscreen></iframe></p>',	'2011-11-24',	3),
(27,	'Silvestr 2011',	'2011_silvestr',	NULL,	'2011-12-31',	2),
(28,	'Čekání na jaro',	'2012_zima',	NULL,	'2012-02-15',	1),
(29,	'Lasergame',	'2012_lasergame',	NULL,	'2012-04-06',	1),
(30,	'Koncert kapely T-Pack',	'2012_tpack',	'<p>Vinohradský druhý ročník hudebního odpoledne \"mladých kapel\"</p>',	'2012-06-23',	1),
(31,	'Naši kluci',	'2012_kluci',	NULL,	'2012-07-13',	1),
(32,	'Koncert kapely The Hiccups',	'2012_marky_koncert2',	NULL,	'2012-07-14',	1),
(33,	'Dovolená v Egyptě',	'2012_egypt',	NULL,	'2012-07-23',	2),
(34,	'Putování slováckým vinohradem',	'2012_burcak',	NULL,	'2012-10-13',	1),
(35,	'Francouzské Alpy',	'2013_alpy',	NULL,	'2013-01-25',	2),
(36,	'Zasnoubení',	'2013_zasnoubeni',	'<p>Odhodlal jsem se do toho prásknout...</p>',	'2013-11-30',	1),
(37,	'Svatební Futurum',	'2014_futurum',	NULL,	'2014-02-22',	1),
(38,	'Předsvatební focení',	'2014_predsvatebni',	NULL,	'2014-07-05',	1),
(39,	'Svatba',	'',	'<p>A už jsme oficiálně svoji...</p><p>Fotky jsou v naší galerii.</p>\r\n        <p>\r\n            <iframe width=\"462\" height=\"260\" src=\"https://www.youtube.com/embed/PAR_n_z7_7k?rel=0&amp;showinfo=0\" frameborder=\"0\" allowfullscreen></iframe>\r\n        </p>',	'2014-07-12',	3),
(40,	'Svatební cesta',	'',	'<p>Líbánky jsme si užívali na Krétě, fotek je moc a tak jsou v galerii.</p>',	'2014-08-21',	2),
(41,	'Momentky z bruslí',	'2014_brusle',	NULL,	'2014-09-28',	1),
(42,	'Pečeme Angry Muffins',	'2014_muffin',	NULL,	'2014-12-05',	1),
(43,	'Silvestr 2014 v Beskydech',	'2014_silvestr',	NULL,	'2014-12-31',	2),
(44,	'Zájezd do Paříže',	'2015_pariz',	'<p>Vyhráli jsme v tombole zájezd, tak jsme si to za to kilo za lístky náramně užili.</p>',	'2015-09-25',	2),
(45,	'U rajhradského rybníka',	'2016_rajhrad_rybnik',	NULL,	'2016-03-27',	1),
(46,	'Narození Verunky',	'2017_narozeni_verunky',	'Tak se nám konečně narodila naše holčička. Jestli jí chcete něco vzkázat, můžete jí napsat na <a href=\"mailto:verca.holopova@gmail.com\">verca.holopova@gmail.com</a> :-)',	'2017-03-14',	1),
(47,	'Návštěvy v porodnici',	'2017_navstevy_porodnice',	NULL,	'2017-03-16',	1),
(48,	'Rodinné focení',	'2017_foceni_verunka',	'Verunka má 5 měsíců',	'2017-08-15',	1),
(49,	'Plavání s Verunkou',	'',	'<p>První společné skotačení v bazénu</p>\r\n        <p>\r\n            <iframe width=\"462\" height=\"260\" src=\"https://www.youtube.com/embed/cMfzHPlrgaM\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>\r\n        </p>\r\n        <p>\r\n            <iframe width=\"462\" height=\"260\" src=\"https://www.youtube.com/embed/t7t4a10ZjK8\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>\r\n        </p>',	'2018-01-30',	3),
(50,	'Další focení s bříškem',	'2018_foceni_brisko',	'<p>Verča má 11 měsíců a bráška bude za 3 měsíce na světě</p>',	'2018-02-18',	1);

DROP TABLE IF EXISTS `icon`;
CREATE TABLE `icon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `icon` (`id`, `name`) VALUES
(1,	'picture'),
(2,	'location'),
(3,	'movie');

-- 2018-08-02 18:37:23