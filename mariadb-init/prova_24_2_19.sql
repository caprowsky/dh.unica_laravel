-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 24, 2019 at 05:40 PM
-- Server version: 5.7.25-0ubuntu0.16.04.2
-- PHP Version: 7.2.11-4+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prova`
--

-- --------------------------------------------------------

--
-- Table structure for table `acapius`
--

CREATE TABLE `acapius` (
  `id` int(10) UNSIGNED NOT NULL,
  `de_id` int(10) UNSIGNED NOT NULL,
  `a_id` int(10) UNSIGNED NOT NULL,
  `tipo` int(2) NOT NULL DEFAULT '15',
  `descrizione` varchar(1023) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `acapius`
--

INSERT INTO `acapius` (`id`, `de_id`, `a_id`, `tipo`, `descrizione`, `created_at`, `updated_at`) VALUES
(27, 10, 8, 6, 'xyz', '2018-07-09 13:49:02', '2018-07-09 13:49:02'),
(28, 8, 10, 3, NULL, '2018-07-09 13:49:02', '2018-07-09 13:49:02'),
(29, 9, 8, 6, 'Seconda', '2018-07-11 13:44:12', '2018-07-11 13:44:12'),
(33, 1, 10, 14, 'cos', '2018-07-12 13:13:55', '2018-07-12 13:13:55'),
(34, 10, 8, 15, NULL, '2018-07-26 13:02:57', '2018-07-26 13:02:57'),
(35, 8, 10, 15, NULL, '2018-07-26 13:02:57', '2018-07-26 13:02:57');

-- --------------------------------------------------------

--
-- Table structure for table `acapius_esec`
--

CREATE TABLE `acapius_esec` (
  `id` int(10) UNSIGNED NOT NULL,
  `de_id` int(10) UNSIGNED NOT NULL,
  `a_id` int(10) UNSIGNED NOT NULL,
  `tipo` int(10) UNSIGNED NOT NULL,
  `descrizione` varchar(1023) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `acapius_esec`
--

INSERT INTO `acapius_esec` (`id`, `de_id`, `a_id`, `tipo`, `descrizione`, `created_at`, `updated_at`) VALUES
(5, 5, 1, 2, NULL, '2018-07-14 13:24:27', '2018-07-14 13:24:27'),
(6, 1, 5, 1, NULL, '2018-07-14 13:24:27', '2018-07-14 13:24:27'),
(7, 4, 5, 1, 'Dal 1994', '2018-09-16 13:49:14', '2018-09-16 13:49:14'),
(8, 5, 4, 2, 'Dal 1994', '2018-09-16 13:49:14', '2018-09-16 13:49:14');

-- --------------------------------------------------------

--
-- Table structure for table `acorradoris`
--

CREATE TABLE `acorradoris` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(31) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descrizione` varchar(1023) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_url` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `luogo_id` int(10) UNSIGNED NOT NULL,
  `luogo_note` varchar(1023) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `data_note` varchar(1023) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `acorradoris`
--

INSERT INTO `acorradoris` (`id`, `nome`, `data`, `descrizione`, `foto_url`, `luogo_id`, `luogo_note`, `created_at`, `updated_at`, `data_note`) VALUES
(1, 'Indefinito', NULL, 'Indefinitos', 'foto/acc1_foto', 1, NULL, '2017-09-21 13:44:29', '2018-10-18 14:39:27', 'Data non precisata'),
(2, 'Prova', NULL, 'Bahm', 'foto/acc2_foto', 10, NULL, '2017-10-07 12:44:25', '2018-10-19 12:10:40', NULL),
(3, 'U atru', '2018-01-31', 'ss', NULL, 1, 'Forse Trippoli', '2018-02-03 17:43:44', '2018-10-19 12:12:20', NULL),
(4, 'Sagra dell\'emigrato', '2018-01-30', NULL, NULL, 14, NULL, '2018-02-26 14:46:47', '2018-06-15 13:48:43', 'Mese incerto'),
(6, 'Festa', '2018-02-27', NULL, NULL, 16, NULL, '2018-03-13 15:23:19', '2018-03-13 15:23:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `colletzionis`
--

CREATE TABLE `colletzionis` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(31) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_note` varchar(1023) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descrizione` varchar(1023) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `luogo_id` int(10) UNSIGNED NOT NULL,
  `foto_url` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `luogo_note` varchar(1023) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colletzionis`
--

INSERT INTO `colletzionis` (`id`, `nome`, `data`, `data_note`, `descrizione`, `luogo_id`, `foto_url`, `luogo_note`, `created_at`, `updated_at`) VALUES
(1, 'Fondo Pirari', '2017-10-20', 'sss', 'Una bella collezione davvero', 10, 'foto/col1_foto', 'O forse bono', '2017-09-22 12:08:22', '2018-10-20 12:28:34'),
(2, 'Fondo Melari', NULL, NULL, 'Eh si', 2, NULL, NULL, '2017-09-29 12:50:29', '2017-12-23 13:58:55'),
(3, 'Fondo Tondo', NULL, NULL, NULL, 13, NULL, NULL, '2018-02-05 14:25:19', '2018-02-05 14:25:19');

-- --------------------------------------------------------

--
-- Table structure for table `documentus`
--

CREATE TABLE `documentus` (
  `id` int(10) UNSIGNED NOT NULL,
  `titolo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `titolo_alt` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soggetto` text COLLATE utf8mb4_unicode_ci,
  `descrizione` text COLLATE utf8mb4_unicode_ci,
  `data` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_note` varchar(1023) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `formato` varchar(1023) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identificatore` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lingua` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lingua_det` varchar(1023) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diritti` text COLLATE utf8mb4_unicode_ci,
  `file` text COLLATE utf8mb4_unicode_ci,
  `inizio` float DEFAULT NULL,
  `fine` float DEFAULT NULL,
  `created_id` int(10) UNSIGNED NOT NULL,
  `updated_id` int(10) UNSIGNED NOT NULL,
  `collezione_id` int(10) UNSIGNED NOT NULL,
  `evento_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documentus`
--

INSERT INTO `documentus` (`id`, `titolo`, `titolo_alt`, `soggetto`, `descrizione`, `data`, `data_note`, `tipo`, `formato`, `identificatore`, `lingua`, `lingua_det`, `diritti`, `file`, `inizio`, `fine`, `created_id`, `updated_id`, `collezione_id`, `evento_id`, `created_at`, `updated_at`) VALUES
(1, 'Sa cantada de s\'annu de s\'aciapa', 'Sa cantada|Una cantada|Ita cantadaWhen calling the paginate method, you will receive an instance of Illuminate\\Pagination\\LengthAwarePaginator. When calling the simplePaginate method, you will receive an instance of Illuminate\\Pagination\\Paginator. These objects provide several methods that describe the result set. In addition to these helpers methods, the paginator inst', NULL, 'When calling the paginate meeethod, you will receive an instance of Illuminate\\Pagination\\LengthAwarePaginator. When calling the simplePaginate method, you will receive an instance of Illuminate\\Pagination\\Paginator. These objects provide several methods that describe the result set. In addition to these helpers methods, the paginator instances are iterators and may be looped as an array. So, once you have retrieved the results, you may display the results and render the page links using Blade:', '2018-03-07', 'Prova d', 3, 'Fx', 'Iddwdtw', 'Lasx', 'Dd', 'Dirittusx', '', NULL, NULL, 1, 5, 2, 2, '2017-09-30 12:06:55', '2018-12-14 15:15:25'),
(8, 'Prova TextGrid', NULL, NULL, '{\r\n"class": "Literal",\r\n"Titoli alternativi": \r\n[\r\n	{\r\n	"LabelSubMetadato": "denominazione locale",\r\n	"wl": "ita",\r\n	"riferimento":"blabla",\r\n	"Campi":\r\n	[\r\n		{\r\n		"Text": "Sa cantada de no sciu ita",\r\n		"wl": "sro",\r\n		"Campi":\r\n		[{\r\n		"LabelSubMetadato":"Commento denominazione locale",\r\n		"Campi":\r\n		\r\n		[\r\n			{\r\n			"Text":"Denominazione emic utilizzata in un libretto contenente la trascrizione verbale della gara poetica",\r\n			"wl":"ita"\r\n			}\r\n									]\r\n									}\r\n								]\r\n							},\r\n							{\r\n			"LabelSubMetadato": "Traduzione",\r\n	"wl": "ita",\r\n	"Campi":\r\n	[\r\n				{\r\n	"Text": "Sardinian poetical duel Cagliari 1982 - Mutetada (part 1)",\r\n	"wl": "eng"\r\n									}\r\n								]\r\n							},\r\n							{\r\n			"LabelSubMetadato": "Denominazione file",\r\n	"wl": "ita",\r\n	"Campi":\r\n	[\r\n				{\r\n	"Text": "FPZ1_A0001_s1_Doc1-MutetadaParte1",\r\n	"wl": "mis"\r\n									}\r\n								]\r\n							}\r\n						]\r\n				}\r\n			]\r\n}', NULL, NULL, 3, NULL, NULL, 'ita,srd', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 2, '2018-03-08 14:18:02', '2018-09-22 11:54:00'),
(9, 'Prova20180507', NULL, NULL, NULL, '2018-05-07', NULL, 3, 'boh', NULL, 'sro', NULL, 'miei', NULL, NULL, NULL, 5, 1, 1, 5, '2018-05-07 15:15:44', '2018-10-09 10:58:21'),
(10, 'Derivato', NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, 'gdfgdfg', NULL, 5.2302, 30, 1, 1, 1, 1, '2018-07-02 12:44:13', '2018-11-27 16:01:20'),
(11, 'Sa cantada de s\'annu de s\'aciapa2', 'Sa cantada|Una cantada|Ita cantadaWhen calling the paginate method, you will receive an instance of Illuminate\\Pagination\\LengthAwarePaginator. When calling the simplePaginate method, you will receive an instance of Illuminate\\Pagination\\Paginator. These objects provide several methods that describe the result set. In addition to these helpers methods, the paginator inst', NULL, 'When calling the paginate method, you will receive an instance of Illuminate\\Pagination\\LengthAwarePaginator. When calling the simplePaginate method, you will receive an instance of Illuminate\\Pagination\\Paginator. These objects provide several methods that describe the result set. In addition to these helpers methods, the paginator instances are iterators and may be looped as an array. So, once you have retrieved the results, you may display the results and render the page links using Blade:', '2018-03-07', NULL, 1, 'Fx', 'Iddwdtw', 'Lasx', 'Dd', 'Dirittusx', NULL, NULL, NULL, 5, 5, 2, 2, '2018-10-23 17:18:57', '2018-10-23 17:18:57'),
(12, '{"@mul_l01":"Gara poetica campidanese Sestu S. Antonio 1982 - Mutetada (parte 2)"}', '[{".n":{"@ita":"Denominazione file","@eng":"File name"},".v":{".zxx_l01":"FPZ1_A0001_s1_Doc1-MutetadaParte1"}},{".n":{"@ita":"Denominazione locale","@eng":"Local name",".cfr":"bdi301-DBL"},".v":{"@eng":"Poetry contest concerning I do not know what","@sro_l01":"Sa cantada de no sciu ita"}}]', NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, '2018-11-03 14:24:05', '2018-11-19 13:01:28');

-- --------------------------------------------------------

--
-- Table structure for table `esecudoris`
--

CREATE TABLE `esecudoris` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cognome` varchar(31) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(1023) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sesso` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'U',
  `tipo` int(1) NOT NULL DEFAULT '0',
  `nascita` date DEFAULT NULL,
  `datan_note` varchar(1023) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `morte` date DEFAULT NULL,
  `datam_note` varchar(1023) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descrizione` varchar(1023) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_url` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `esecudoris`
--

INSERT INTO `esecudoris` (`id`, `nome`, `cognome`, `alias`, `sesso`, `tipo`, `nascita`, `datan_note`, `morte`, `datam_note`, `descrizione`, `foto_url`, `created_at`, `updated_at`) VALUES
(1, 'Gino', 'Tiddia', NULL, 'U', 0, '2018-06-05', 'Forse no', '1900-12-02', 'Forse si', NULL, 'foto/ese1_foto', '2017-09-24 08:12:44', '2018-10-19 12:34:43'),
(4, 'Lino', '-', 'Bellino Mei, Carlino Mele, Fabio Loi', 'F', 0, NULL, 'Prova', NULL, NULL, NULL, NULL, '2017-09-26 13:53:27', '2018-08-11 14:01:51'),
(5, 'Tenore "Santa Maria Bambina" de Silanos', '-', NULL, 'U', 1, '1916-02-05', NULL, '1998-02-05', NULL, NULL, NULL, '2018-02-05 14:07:52', '2018-07-12 13:52:24'),
(9, 'Novello', 'Nuovo', 'Noeddu Nou', 'U', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-16 13:27:52', '2018-07-16 13:27:52'),
(10, 'Aldo', 'Pittirra', NULL, 'U', 0, NULL, NULL, NULL, NULL, 'kjlò', NULL, '2018-07-25 13:26:00', '2018-08-06 13:00:39'),
(11, 'Rafieli', 'Cocu', 'Raffaele Cocco, Rafielo Coccu, Fieli Coco', 'U', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-25 13:26:29', '2018-07-25 13:26:29');

-- --------------------------------------------------------

--
-- Table structure for table `esec_documentu`
--

CREATE TABLE `esec_documentu` (
  `id` int(10) UNSIGNED NOT NULL,
  `ruolo` varchar(31) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descrizione` varchar(1023) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documento_id` int(10) UNSIGNED NOT NULL,
  `esecutore_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `esec_documentu`
--

INSERT INTO `esec_documentu` (`id`, `ruolo`, `descrizione`, `documento_id`, `esecutore_id`, `created_at`, `updated_at`) VALUES
(3, 'Autore', 'fgjhgjghj', 1, 1, '2018-09-06 12:29:45', '2018-09-06 12:29:45'),
(5, 'Non definito', 'Oi', 1, 10, '2018-09-06 12:33:17', '2018-09-06 12:33:17'),
(7, 'Editore', 'dgdsfgsdfg', 1, 10, '2018-09-06 12:33:49', '2018-09-06 12:33:49'),
(9, 'Autore', 'Così', 1, 5, '2018-09-06 12:44:07', '2018-09-10 10:29:05'),
(13, 'Creatore', 'Così', 9, 5, '2018-09-10 09:57:23', '2018-09-10 09:57:23'),
(14, 'Autore', 'Aici', 10, 1, '2018-09-13 13:03:59', '2018-09-13 13:03:59'),
(15, 'Creatore', NULL, 9, 1, '2018-09-13 13:36:27', '2018-09-13 13:36:27'),
(16, 'Contributore', NULL, 8, 1, '2018-11-10 16:40:34', '2018-11-10 16:40:34'),
(19, 'Non definito', 'tag[59.1590,32.2062,Forse]', 11, 4, '2019-01-13 13:12:22', '2019-01-14 13:15:00'),
(20, 'Non definito', 'tag[81.0484,25.0035]', 11, 1, '2019-01-13 13:12:35', '2019-01-13 13:12:35');

-- --------------------------------------------------------

--
-- Table structure for table `eventus`
--

CREATE TABLE `eventus` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inizio` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datai_note` varchar(1023) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fine` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dataf_note` varchar(1023) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descrizione` varchar(1023) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_url` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `luogo_id` int(10) UNSIGNED NOT NULL,
  `luogo_note` varchar(1023) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aggregatore_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `eventus`
--

INSERT INTO `eventus` (`id`, `nome`, `inizio`, `datai_note`, `fine`, `dataf_note`, `descrizione`, `foto_url`, `luogo_id`, `luogo_note`, `aggregatore_id`, `created_at`, `updated_at`) VALUES
(1, 'Prova', '2017-10-04', 'Prova i', NULL, 'Prova f', 'er', 'foto/eve1_foto', 11, NULL, 2, '2017-09-21 13:44:57', '2018-10-19 12:35:08'),
(2, 'Indefinito', '2018-01-02', NULL, '2018-01-03', NULL, NULL, NULL, 10, NULL, 1, '2018-01-02 15:36:55', '2018-01-02 17:19:41'),
(3, 'Festa', '2018-01-30', NULL, '2018-01-30', NULL, 'Pagu genti bona festa', NULL, 10, 'O forse Bolotana', 3, '2018-02-05 14:10:32', '2018-07-07 12:51:51'),
(4, 'Gara di Santa Barbara', '2018-01-30', NULL, '2018-01-30', NULL, 'gjh', NULL, 14, NULL, 4, '2018-02-26 14:45:40', '2018-02-26 14:50:36'),
(5, 'EventoProva20180507', '2018-05-03', NULL, '2018-05-17', NULL, NULL, NULL, 1, NULL, 1, '2018-05-07 15:17:35', '2018-05-07 15:36:08'),
(6, 'Prova2016', '2016-12-31', NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, '2018-09-30 13:27:38', '2018-09-30 13:29:47'),
(7, 'Prova2017', '2017-01-01', NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, '2018-09-30 13:29:18', '2018-09-30 13:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(10) UNSIGNED NOT NULL,
  `documento_id` int(10) UNSIGNED DEFAULT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `local` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `documento_id`, `filename`, `local`, `size`, `created_at`, `updated_at`, `created_id`) VALUES
(21, 8, '1Tem5CG1_16000.mp3', 'documentus/yl8ptY5vIqaAULMzz1FjkrvtxheDUufrNRLck2M0.mpga', 1883, '2018-03-08 14:18:22', '2018-03-08 14:18:22', 1),
(31, 9, 'PB1.wav', 'documentus/PtPXwmYeeluzx9P4oxxhQzrAdEXNCjO3grxgppCO.wav', 51, '2018-10-09 10:53:15', '2018-10-09 10:53:15', 1),
(39, 8, 'prova_json', 'documentus/9P1yAnomuM0pTvEmfNkIvTK9s4ZvjwRlj0WyofoR.txt', 0, '2018-10-09 11:41:31', '2018-10-09 11:41:31', 1),
(41, 12, 'orosA2_alAL.mp3', 'documentus/abyeBXzIkr2LHcatT3st8Ht4LXgOgQzU0pEgBZAi.mpga', 186, '2018-11-19 13:01:11', '2018-11-19 13:01:11', 1),
(44, 12, 'orosA2_tnContra.mp3', 'documentus/VEsdxrXw6xcAo1UjMvjvjIZ2J3PAB88NhtkWrCPH.mpga', 240, '2018-12-01 15:01:09', '2018-12-01 15:01:09', 1),
(45, 12, 'orosA2_tnMesuboghe.mp3', 'documentus/4Fu6BIaTmt4GUaTypVrJB0eeEm5wN71jcHPOBwRG.mpga', 240, '2018-12-01 15:01:09', '2018-12-01 15:01:09', 1),
(46, 12, 'orosA2_tnBoghe.mp3', 'documentus/3alI6SSdhlkqATISRY5P3i0Lx3ZDl0M8URY9r0ri.mpga', 240, '2018-12-01 15:01:09', '2018-12-01 15:01:09', 1),
(47, 12, 'orosA2_tnBassu.mp3', 'documentus/zmz2wSEV08aKg6Ry99fxHWZSTP6wUBACWw9pKFIA.mpga', 240, '2018-12-01 15:01:09', '2018-12-01 15:01:09', 1),
(49, 12, 'PitchMultiplo_PITCH(2).json', 'documentus/CDZ0NR6QoD2HvRyXVgIszaekEgpgZT5aX2JveQmg.txt', 28, '2018-12-02 14:29:17', '2018-12-02 14:29:17', 1),
(50, 1, 'SCHEDA partecipazione - compilabile.pdf', 'documentus/4IxxKB6wjq7vMum0PIb5RE9b5zVVHe75P8E7v7HF.pdf', 1316, '2018-12-14 15:15:04', '2018-12-14 15:15:04', 5),
(53, 11, 'lode-1.jpg', 'documentus/gZbp0F9PFdrJdy9ORwOMOZgEJfsLdgwUKW08e04H.jpeg', 454, '2019-01-12 16:09:39', '2019-01-12 16:09:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `intervals`
--

CREATE TABLE `intervals` (
  `id` int(10) UNSIGNED NOT NULL,
  `seq` int(10) UNSIGNED NOT NULL,
  `nota` text COLLATE utf8mb4_unicode_ci,
  `inizio` double UNSIGNED NOT NULL,
  `fine` double UNSIGNED NOT NULL,
  `tier_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `intervals`
--

INSERT INTO `intervals` (`id`, `seq`, `nota`, `inizio`, `fine`, `tier_id`) VALUES
(9095, 0, '1', 0.0805924414517339, 12.204109217134238, 75),
(9096, 1, '2', 13.41360894841501, 21.15226007759163, 75),
(9097, 2, '3', 22.39449907834742, 30.134989480078975, 75),
(9098, 3, '4', 31.13329851276802, 38.69016924629283, 75),
(9099, 4, '5', 39.71813631345862, 47.03169066296458, 75),
(9100, 5, '6', 48.15183512246411, 55.44901957648636, 75),
(9101, 6, '7', 56.83782966377481, 63.87639819480804, 75),
(9102, 7, '8', 63.87639819480804, 67.98948289695373, 75),
(9103, 8, '9', 69.04520595097767, 75.94019442138661, 75),
(9104, 9, '10', 77.01461312394997, 83.87757389183125, 75),
(9105, 10, '11', 84.87592264798138, 91.3721099201963, 75),
(9106, 11, '12', 91.3721099201963, 99.22089826352077, 75),
(9107, 12, '13', 100.24636317824577, 106.82587510645033, 75),
(9108, 13, '14', 107.90715366077292, 114.46111631455949, 75),
(9109, 14, '15', 115.51982888743213, 122.11315890559989, 75),
(9110, 15, '16', 123.07084507489995, 129.73179814414075, 75),
(9111, 16, '17', 130.563144003855, 137.1791936447119, 75),
(9112, 17, '18', 138.06196475626285, 144.5925462553862, 75),
(9113, 18, '19', 145.47339814101022, 151.86069990954707, 75),
(9114, 19, '20', 152.56076684618787, 159.05267793597525, 75),
(9115, 20, '21', 159.05267793597525, 166.69569941378847, 75),
(9116, 21, '22', 166.69569941378847, 173.9640456002793, 75),
(9117, 22, '23', 175.07949322196575, 181.51434561634957, 75),
(9118, 23, '24', 182.47217174789375, 188.8627659504222, 75),
(9119, 24, '25', 189.98297560660552, 196.4949383718235, 75),
(9120, 25, '26', 197.37030419119768, 203.9014141206872, 75),
(9121, 26, '27', 204.78970487684765, 211.39872069018796, 75),
(9122, 27, '28', 212.25198917787853, 218.71817753749244, 75),
(9123, 28, '29', 219.58581320978598, 226.0435801125388, 75),
(9124, 29, '30', 226.94796309233362, 233.3084881304367, 75),
(9125, 30, '31', 233.93839514565272, 240.6523914762873, 75),
(9126, 0, '1', 0.0805924414517339, 4.281837159108231, 76),
(9127, 1, '1b', 4.281837159108231, 7.8975802556046935, 76),
(9128, 2, '2', 8.937211330666893, 12.204109217134238, 76),
(9129, 3, '1', 13.41360894841501, 16.82848352387382, 76),
(9130, 4, '2', 16.82848352387382, 21.15226007759163, 76),
(9131, 5, '1', 22.39449907834742, 25.559749503089712, 76),
(9132, 6, '2', 25.559749503089712, 30.134989480078975, 76),
(9133, 7, '1', 31.13329851276802, 34.16879970171301, 76),
(9134, 8, '2', 34.16879970171301, 38.69016924629283, 76),
(9135, 9, '1', 39.71813631345862, 42.91948032792684, 76),
(9136, 10, '2', 42.91948032792684, 47.03169066296458, 76),
(9137, 11, '1', 48.15183512246411, 51.329564867730944, 76),
(9138, 12, '2', 51.329564867730944, 55.44901957648636, 76),
(9139, 13, '1', 56.83782966377481, 59.91619841549721, 76),
(9140, 14, '2', 59.91619841549721, 63.87639819480804, 76),
(9141, 15, '2', 63.87639819480804, 67.98948289695373, 76),
(9142, 16, '1', 69.04520595097767, 71.78280683132392, 76),
(9143, 17, '2', 71.78280683132392, 75.94019442138661, 76),
(9144, 18, '1', 77.01461312394997, 79.66964269966043, 76),
(9145, 19, '2', 79.66964269966043, 83.87757389183125, 76),
(9146, 20, '1', 84.87592264798138, 87.81290371304053, 76),
(9147, 21, '2', 87.81290371304053, 91.3721099201963, 76),
(9148, 22, '1', 91.3721099201963, 95.31608143246926, 76),
(9149, 23, '2', 96.43758028967837, 99.22089826352077, 76),
(9150, 24, '1', 100.24636317824577, 103.0871291428282, 76),
(9151, 25, '2', 103.0871291428282, 106.82587510645033, 76),
(9152, 26, '1', 107.90715366077292, 110.8024832669552, 76),
(9153, 27, '2', 110.8024832669552, 114.46111631455949, 76),
(9154, 28, '1', 115.51982888743213, 118.33631854642287, 76),
(9155, 29, '2', 118.33631854642287, 122.11315890559989, 76),
(9156, 30, '1', 123.07084507489995, 125.88844120750278, 76),
(9157, 31, '2', 125.88844120750278, 129.73179814414075, 76),
(9158, 32, '1', 130.563144003855, 133.2609216503248, 76),
(9159, 33, '2', 133.2609216503248, 137.1791936447119, 76),
(9160, 34, '1', 138.06196475626285, 140.87318606660315, 76),
(9161, 35, '2', 140.87318606660315, 144.5925462553862, 76),
(9162, 36, '1', 145.47339814101022, 148.11908744186246, 76),
(9163, 37, '2', 148.11908744186246, 151.86069990954707, 76),
(9164, 38, '1', 152.56076684618787, 155.43270735271287, 76),
(9165, 39, '2', 155.43270735271287, 159.05267793597525, 76),
(9166, 40, '1', 159.05267793597525, 162.97942792659728, 76),
(9167, 41, '2', 163.8897668167561, 166.69569941378847, 76),
(9168, 42, '1', 166.69569941378847, 170.43518183862543, 76),
(9169, 43, '2', 170.43518183862543, 173.9640456002793, 76),
(9170, 44, '1', 175.07949322196575, 177.76964937663283, 76),
(9171, 45, '2', 177.76964937663283, 181.51434561634957, 76),
(9172, 46, '1', 182.47217174789375, 185.43473769846625, 76),
(9173, 47, '2', 185.43473769846625, 188.8627659504222, 76),
(9174, 48, '1', 189.98297560660552, 192.76355691731118, 76),
(9175, 49, '2', 192.76355691731118, 196.4949383718235, 76),
(9176, 50, '1', 197.37030419119768, 200.11718413225623, 76),
(9177, 51, '2', 200.11718413225623, 203.9014141206872, 76),
(9178, 52, '1', 204.78970487684765, 207.54490142758237, 76),
(9179, 53, '2', 207.54490142758237, 211.39872069018796, 76),
(9180, 54, '1', 212.25198917787853, 214.88709873425503, 76),
(9181, 55, '2', 214.88709873425503, 218.71817753749244, 76),
(9182, 56, '1', 219.58581320978598, 222.1953637877759, 76),
(9183, 57, '2', 222.1953637877759, 226.0435801125388, 76),
(9184, 58, '1', 226.94796309233362, 230.1082667739497, 76),
(9185, 59, '2', 230.1082667739497, 233.3084881304367, 76),
(9186, 60, '1', 233.93839514565272, 236.79113766022297, 76),
(9187, 61, '2', 236.79113766022297, 240.6523914762873, 76),
(9188, 0, '1', 0.0805924414517339, 4.281837159108231, 77),
(9189, 1, '2', 4.281837159108231, 7.8975802556046935, 77),
(9190, 2, '1', 8.937211330666893, 12.204109217134238, 77),
(9191, 3, '1', 13.41360894841501, 16.82848352387382, 77),
(9192, 4, '2', 16.82848352387382, 21.15226007759163, 77),
(9193, 5, '1', 22.39449907834742, 25.559749503089712, 77),
(9194, 6, '2', 25.559749503089712, 30.134989480078975, 77),
(9195, 7, '1', 31.13329851276802, 34.16879970171301, 77),
(9196, 8, '2', 34.16879970171301, 38.69016924629283, 77),
(9197, 9, '1', 39.71813631345862, 42.91948032792684, 77),
(9198, 10, '2', 42.91948032792684, 47.03169066296458, 77),
(9199, 11, '1', 48.15183512246411, 51.329564867730944, 77),
(9200, 12, '2', 51.329564867730944, 55.44901957648636, 77),
(9201, 13, '1', 56.83782966377481, 59.91619841549721, 77),
(9202, 14, '2', 59.91619841549721, 63.87639819480804, 77),
(9203, 15, '2', 63.87639819480804, 67.98948289695373, 77),
(9204, 16, '1', 69.04520595097767, 71.78280683132392, 77),
(9205, 17, '2', 71.78280683132392, 75.94019442138661, 77),
(9206, 18, '1', 77.01461312394997, 79.66964269966043, 77),
(9207, 19, '2', 79.66964269966043, 83.87757389183125, 77),
(9208, 20, '1', 84.87592264798138, 87.81290371304053, 77),
(9209, 21, '2', 87.81290371304053, 91.3721099201963, 77),
(9210, 22, '2', 91.3721099201963, 95.31608143246926, 77),
(9211, 23, '1', 96.43758028967837, 99.22089826352077, 77),
(9212, 24, '1', 100.24636317824577, 103.0871291428282, 77),
(9213, 25, '2', 103.0871291428282, 106.82587510645033, 77),
(9214, 26, '1', 107.90715366077292, 110.8024832669552, 77),
(9215, 27, '2', 110.8024832669552, 114.46111631455949, 77),
(9216, 28, '1', 115.51982888743213, 118.33631854642287, 77),
(9217, 29, '2', 118.33631854642287, 122.11315890559989, 77),
(9218, 30, '1', 123.07084507489995, 125.88844120750278, 77),
(9219, 31, '2', 125.88844120750278, 129.73179814414075, 77),
(9220, 32, '1', 130.563144003855, 133.2609216503248, 77),
(9221, 33, '2', 133.2609216503248, 137.1791936447119, 77),
(9222, 34, '1', 138.06196475626285, 140.87318606660315, 77),
(9223, 35, '2', 140.87318606660315, 144.5925462553862, 77),
(9224, 36, '1', 145.47339814101022, 148.11908744186246, 77),
(9225, 37, '2', 148.11908744186246, 151.86069990954707, 77),
(9226, 38, '1', 152.56076684618787, 155.43270735271287, 77),
(9227, 39, '2', 155.43270735271287, 159.05267793597525, 77),
(9228, 40, '2', 159.05267793597525, 162.97942792659728, 77),
(9229, 41, '1', 163.8897668167561, 166.69569941378847, 77),
(9230, 42, '2', 166.69569941378847, 170.43518183862543, 77),
(9231, 43, '2', 170.43518183862543, 173.9640456002793, 77),
(9232, 44, '1', 175.07949322196575, 177.76964937663283, 77),
(9233, 45, '2', 177.76964937663283, 181.51434561634957, 77),
(9234, 46, '1', 182.47217174789375, 185.43473769846625, 77),
(9235, 47, '2', 185.43473769846625, 188.8627659504222, 77),
(9236, 48, '1', 189.98297560660552, 192.76355691731118, 77),
(9237, 49, '2', 192.76355691731118, 196.4949383718235, 77),
(9238, 50, '1', 197.37030419119768, 200.11718413225623, 77),
(9239, 51, '2', 200.11718413225623, 203.9014141206872, 77),
(9240, 52, '1', 204.78970487684765, 207.54490142758237, 77),
(9241, 53, '2', 207.54490142758237, 211.39872069018796, 77),
(9242, 54, '1', 212.25198917787853, 214.88709873425503, 77),
(9243, 55, '2', 214.88709873425503, 218.71817753749244, 77),
(9244, 56, '1', 219.58581320978598, 222.1953637877759, 77),
(9245, 57, '2', 222.1953637877759, 226.0435801125388, 77),
(9246, 58, '1', 226.94796309233362, 230.1082667739497, 77),
(9247, 59, '2', 230.1082667739497, 233.3084881304367, 77),
(9248, 60, '1', 233.93839514565272, 236.79113766022297, 77),
(9249, 61, '2', 236.79113766022297, 240.6523914762873, 77),
(9250, 0, 'A totus a bastai', 0.0805924414517339, 4.281837159108231, 78),
(9251, 1, 'A totus a bastai', 4.281837159108231, 7.8975802556046935, 78),
(9252, 2, 'deu seu su pastori', 8.937211330666893, 12.204109217134238, 78),
(9253, 3, 'Ca m’est vantu e onori ', 13.41360894841501, 16.82848352387382, 78),
(9254, 4, 'e ca sce[be]rau apu s’a[r]ti', 16.82848352387382, 21.15226007759163, 78),
(9255, 5, 'Produsu casu e lati ', 22.39449907834742, 25.559749503089712, 78),
(9256, 6, 'finsas ca no seu confusu', 25.559749503089712, 30.134989480078975, 78),
(9257, 7, 'Lati e lana produsu ', 31.13329851276802, 34.16879970171301, 78),
(9258, 8, 'e po candu pagu scabullu', 34.16879970171301, 38.69016924629283, 78),
(9259, 9, 'Is brabeis  mias  mullu ', 39.71813631345862, 42.91948032792684, 78),
(9260, 10, 'e ddas arrispetu is leis', 42.91948032792684, 47.03169066296458, 78),
(9261, 11, 'E mi mullu is brabeis', 48.15183512246411, 51.329564867730944, 78),
(9262, 12, 'e ca a tui no arrispetu', 51.329564867730944, 55.44901957648636, 78),
(9263, 13, 'E ca mi mullu is brabeis ', 56.83782966377481, 59.91619841549721, 78),
(9264, 14, 'e ca is leis arrispetu', 59.91619841549721, 63.87639819480804, 78),
(9265, 15, 'no seu che a tui agricoltori', 63.87639819480804, 67.98948289695373, 78),
(9266, 16, 'Ca ses unu usurpadori', 69.04520595097767, 71.78280683132392, 78),
(9267, 17, 'e creis de te[nn]i su diritu', 71.78280683132392, 75.94019442138661, 78),
(9268, 18, 'Fais pagai caru s’afitu', 77.01461312394997, 79.66964269966043, 78),
(9269, 19, 'ca ndi b]olis sempri guadangiai', 79.66964269966043, 83.87757389183125, 78),
(9270, 20, 'Caru afitu fais pagai', 84.87592264798138, 87.81290371304053, 78),
(9271, 21, 'e po cussu ses arricu', 87.81290371304053, 91.3721099201963, 78),
(9272, 22, 'E deu abarru piticu', 91.3721099201963, 95.31608143246926, 78),
(9273, 23, 'chi deu seu su pastori', 96.43758028967837, 99.22089826352077, 78),
(9274, 24, 'Ca po mei est vant[u] e onori', 100.24636317824577, 103.0871291428282, 78),
(9275, 25, 'ca deu fatzu cuss’a[r]ti', 103.0871291428282, 106.82587510645033, 78),
(9276, 26, 'Ca prodùxiu lana e lati', 107.90715366077292, 110.8024832669552, 78),
(9277, 27, 'e ca no aba[rr]u persuasu', 110.8024832669552, 114.46111631455949, 78),
(9278, 28, 'De lati fatzu su casu ', 115.51982888743213, 118.33631854642287, 78),
(9279, 29, 'e sa vida mi condullu', 118.33631854642287, 122.11315890559989, 78),
(9280, 30, 'Is brabeis mias mi mullu ', 123.07084507489995, 125.88844120750278, 78),
(9281, 31, 'e ddas arrispetu is leis', 125.88844120750278, 129.73179814414075, 78),
(9282, 32, 'E ca mi mullu is brabeis', 130.563144003855, 133.2609216503248, 78),
(9283, 33, 'no seu che tui agricoltori', 133.2609216503248, 137.1791936447119, 78),
(9284, 34, 'Poita ses usurpadori ', 138.06196475626285, 140.87318606660315, 78),
(9285, 35, 'e ca creis de te[nn]i diritu', 140.87318606660315, 144.5925462553862, 78),
(9286, 36, 'Fais pagai caru s’afitu', 145.47339814101022, 148.11908744186246, 78),
(9287, 37, 'poita ti [b]o[l]is arricai', 148.11908744186246, 151.86069990954707, 78),
(9288, 38, 'Afitu caru fais pagai ', 152.56076684618787, 155.43270735271287, 78),
(9289, 39, 'ma ses bocendu a mei', 155.43270735271287, 159.05267793597525, 78),
(9290, 40, 'De Deus est sa brebei', 159.05267793597525, 162.97942792659728, 78),
(9291, 41, 'E arrespundi t’ia a podi ', 163.8897668167561, 166.69569941378847, 78),
(9292, 42, 'E paga paga cun lodi', 166.69569941378847, 170.43518183862543, 78),
(9293, 43, 'e abarra arrall’arralla', 170.43518183862543, 173.9640456002793, 78),
(9294, 44, 'Tui piga bai e marra', 175.07949322196575, 177.76964937663283, 78),
(9295, 45, 'ca ddu depis a mei', 177.76964937663283, 181.51434561634957, 78),
(9296, 46, 'Poita ca custu agricoltori', 182.47217174789375, 185.43473769846625, 78),
(9297, 47, '(e) s’est postu in confusio[n]i', 185.43473769846625, 188.8627659504222, 78),
(9298, 48, '(E) at nau in su saltu ', 189.98297560660552, 192.76355691731118, 78),
(9299, 49, 'ca si ponit a girai', 192.76355691731118, 196.4949383718235, 78),
(9300, 50, 'Perou tui cun mei ', 197.37030419119768, 200.11718413225623, 78),
(9301, 51, 'depis giai atenzio[n]i', 200.11718413225623, 203.9014141206872, 78),
(9302, 52, 'Su castiador[i] [d]e su sa[l]tu ', 204.78970487684765, 207.54490142758237, 78),
(9303, 53, 'tui circa ’e arrispetai', 207.54490142758237, 211.39872069018796, 78),
(9304, 54, 'Ariseu in cresia', 212.25198917787853, 214.88709873425503, 78),
(9305, 55, 's’or[a] [d]e sa comunio[n]i', 214.88709873425503, 218.71817753749244, 78),
(9306, 56, 'E deu in sa bìngia tua', 219.58581320978598, 222.1953637877759, 78),
(9307, 57, 's’axina ti-ndi segai', 222.1953637877759, 226.0435801125388, 78),
(9308, 58, 'Ocannu no ndi prenis', 226.94796309233362, 230.1082667739497, 78),
(9309, 59, 'de cert’unu cupo[n]i', 230.1082667739497, 233.3084881304367, 78),
(9310, 60, 'Solu unu tanti po missa', 233.93839514565272, 236.79113766022297, 78),
(9311, 61, 'fortzis ti nd[i] ap[u] a lassai', 236.79113766022297, 240.6523914762873, 78),
(9312, 0, 'At', 58.3611721943835, 58.637236335667005, 79),
(9313, 1, 'pf', 59.67284178895938, 240.83619047619047, 79),
(9314, 0, 'l', 0.0805924414517339, 4.281837159108231, 80),
(9315, 1, 'rptn', 4.281837159108231, 8.937211330666893, 80),
(9316, 2, 'de', 8.937211330666893, 31.13329851276802, 80),
(9317, 3, 'rt', 31.13329851276802, 34.16879970171301, 80),
(9318, 4, 'de', 34.16879970171301, 48.15183512246411, 80),
(9319, 5, 'rt', 48.15183512246411, 51.329564867730944, 80),
(9320, 6, 'de', 51.329564867730944, 56.83782966377481, 80),
(9321, 7, 'rptnV', 56.83782966377481, 63.87639819480804, 80),
(9322, 8, 'de', 63.87639819480804, 84.87592264798138, 80),
(9323, 9, 'rt', 84.87592264798138, 87.81290371304053, 80),
(9324, 10, 'de', 87.81290371304053, 96.43758028967837, 80),
(9325, 11, 'rp', 96.43758028967837, 110.8024832669552, 80),
(9326, 12, 'rpI', 110.8024832669552, 115.51982888743213, 80),
(9327, 13, 'rpRV', 115.51982888743213, 118.33631854642287, 80),
(9328, 14, 'rpI', 118.33631854642287, 123.07084507489995, 80),
(9329, 15, 'rpR', 123.07084507489995, 125.88844120750278, 80),
(9330, 16, 'rp', 125.88844120750278, 138.06196475626285, 80),
(9331, 17, 'rpV', 138.06196475626285, 145.47339814101022, 80),
(9332, 18, 'rp', 145.47339814101022, 148.11908744186246, 80),
(9333, 19, 'rpV', 148.11908744186246, 152.56076684618787, 80),
(9334, 20, 'rp', 152.56076684618787, 155.43270735271287, 80),
(9335, 21, 'de', 155.43270735271287, 177.76964937663283, 80),
(9336, 22, 'c', 177.76964937663283, 182.47217174789375, 80),
(9337, 23, 'cu', 182.47217174789375, 240.83619047619047, 80),
(9338, 0, 'vedo un errore nell\'interpretazione metrica', 56.83782966377481, 67.98948289695373, 81),
(9339, 1, 'errore pronuncia', 69.8177945835021, 70.66237083532933, 81),
(9340, 2, 'riepilogo', 96.43758028967837, 138.09037096995874, 81),
(9341, 3, 'poco definito', 138.09037096995874, 138.16144790053406, 81),
(9342, 4, '....', 138.73842564461722, 138.88718315215087, 81),
(9343, 5, 'irregolare ', 140.87318606660315, 144.5925462553862, 81),
(9344, 6, 'metricamente incerto', 182.47217174789375, 185.43473769846625, 81),
(9345, 7, '??', 230.82099321159254, 230.90375165051822, 81),
(15157, 1, 'Torrada v. 1 [Sterrina v. 1]', 0.7494521314277557, 4.77292894380614, 313),
(15158, 2, 'Torrada v. 2 [Cobertantza v. 1]', 4.77292894380614, 10.058611116562972, 313),
(15159, 3, 'Torrada v. 3 [Cobertantza v. 2]', 10.595628157099114, 16.467227479189525, 313),
(15160, 4, 'Torrada v. 4 [Sterrina v. 2] (Err)', 16.914534227213874, 23.89425507296305, 313),
(15161, 5, 'Torrada v. 1 [Sterrina v. 2]', 27.835867405113717, 32.07287820012152, 313),
(15162, 6, 'Torrada v. 2 [Cobertantza v. 2] (Arr)', 32.07287820012152, 37.32227703546154, 313),
(15163, 7, 'Torrada v. 3 [Cobertantza v. 1]', 37.73707362896719, 43.567557110054295, 313),
(15164, 8, 'Torrada v. 4 [Sterrina v. 3]', 44.19187617428911, 48.95145585051952, 313),
(15165, 9, 'Sterrina v. 1', 56.095764487027395, 60.82333274299595, 313),
(15166, 10, 'Sterrina v. 2', 61.83126229153446, 66.5737702976204, 313),
(15167, 11, 'Sterrina v. 3', 67.7080531788335, 71.41463280894281, 313),
(15168, 12, 'Sterrina v. 4', 71.96043195008292, 76.58561763144269, 313),
(15169, 13, 'Sterrina v. 5', 78.55697744390447, 83.22648319423104, 313),
(15170, 14, 'Sterrina v. 6', 83.74670489670252, 88.14283461342448, 313),
(15171, 15, 'Sterrina v. 7', 88.89467368888134, 93.33811522040342, 313),
(15172, 16, 'Sterrina v. 8', 93.84207999467267, 101.50933762956727, 313),
(15173, 17, 'Torrada v. 1 [Sterrina v. 1]', 111.7530181297789, 115.99607639056195, 313),
(15174, 18, 'Torrada v. 2 [Cobertantza v. 1]', 116.76947252653332, 121.5977802025968, 313),
(15175, 19, 'Torrada v. 3 [Cobertantza v. 2]', 122.10174497686604, 127.36898971438984, 313),
(15176, 20, 'Torrada v. 1 [Sterrina v. 2]', 136.91714994740417, 141.9878017305785, 313),
(15177, 21, 'Torrada v. 2 [Cobertantza v. 2] (Arr)', 142.50802343305, 146.92990790405764, 313),
(15178, 22, 'Torrada v. 3 [Cobertantza v. 1]', 147.1881613432089, 152.50603427742388, 313),
(15179, 23, 'Torrada v. 4 [Sterrina v. 3]', 152.93171617560665, 156.96975216528665, 313),
(15180, 24, 'Sterrina v. 1', 166.78893679943596, 170.68706295730377, 313),
(15181, 25, 'Sterrina v. 2', 170.68706295730377, 174.15774569432205, 313),
(15182, 26, 'Sterrina v. 3', 174.6104434426288, 178.72244798974828, 313),
(15183, 27, 'Sterrina v. 4', 179.32692272783214, 182.64670621541487, 313),
(15184, 28, 'Sterrina v. 5', 183.17748870949538, 187.04428197628206, 313),
(15185, 29, 'Sterrina v. 6', 187.51584213076825, 190.98652486778653, 313),
(15186, 30, 'Sterrina v. 7', 191.44185868716497, 194.64846773767098, 313),
(15187, 31, 'Sterrina v. 8', 194.64846773767098, 197.74190235110035, 313),
(15188, 32, 'Torrada v. 1 [Sterrina v. 1]', 209.1419925900602, 212.12225276641286, 313),
(15189, 33, 'Torrada v. 2 [Cobertantza v. 1]', 212.12225276641286, 215.82016211792606, 313),
(15190, 34, 'Torrada v. 3 [Cobertantza v. 2]', 215.94496448398556, 219.54768406425995, 313),
(15191, 35, 'Torrada v. 1 [Sterrina v. 2]', 230.50849848521756, 233.76472973594215, 313),
(15192, 36, 'Torrada v. 2 [Cobertantza v. 2]', 233.76472973594215, 237.43049823902436, 313),
(15193, 37, 'Torrada v. 3 [Cobertantza v. 1]', 237.7888839496087, 241.19486632136946, 313),
(15194, 38, 'Sterrina v. 1', 252.01229879016816, 256.0111288240564, 313),
(15195, 39, 'Sterrina v. 2', 256.57700099866327, 262.38662199129334, 313),
(15196, 40, 'Sterrina v. 3', 263.38632949976545, 269.74647525107474, 313),
(15197, 41, 'Sterrina v. 4', 269.74647525107474, 272.6135609357493, 313),
(15198, 42, 'Sterrina v. 5', 273.3491947627382, 277.1216759267837, 313),
(15199, 43, 'Sterrina v. 6', 277.84371698274424, 282.1820703213966, 313),
(15200, 44, 'Sterrina v. 7', 282.8422545251046, 287.0108462113749, 313),
(15201, 45, 'Sterrina v. 8', 287.0108462113749, 290.6775703079911, 313),
(15202, 46, 'Sterrina v. 9', 291.30002970005864, 294.4123266603962, 313),
(15203, 47, 'Sterrina v. 10', 294.4123266603962, 298.01504617205967, 313),
(15204, 48, 'Sterrina v. 1 (Fin)', 299.4666788599481, 302.84304950176886, 313),
(15205, 49, 'Torrada v. 1 [Sterrina v. 1]', 309.80018842409606, 314.50469055691684, 313),
(15206, 50, 'Torrada v. 2 [Cobertantza v. 1]', 314.976250711403, 320.15617603352297, 313),
(15207, 51, 'Torrada v. 3 [Cobertantza v. 2]', 320.6088737818297, 325.08277785777193, 313),
(15208, 52, 'Torrada v. 4 [Sterrina v. 2]', 326.0824853852826, 329.40314661320696, 313),
(15209, 53, 'Torrada v. 1 [Sterrina v. 2]', 336.5670215323385, 341.00352641356693, 313),
(15210, 54, 'Torrada v. 2 [Cobertantza v. 2] (Arr)', 341.21101288154085, 345.9861046922083, 313),
(15211, 55, 'Torrada v. 3 [Cobertantza v. 1]', 346.1065865296991, 350.2468846860877, 313),
(15212, 56, 'Torrada v. 4 [Sterrina v. 3]', 351.0018202784442, 354.46371244828543, 313),
(15213, 57, 'Sterrina v. 1', 365.8572078799476, 374.08026093327214, 313),
(15214, 58, 'Sterrina v. 2', 375.2273538988052, 380.13509331687465, 313),
(15215, 59, 'Sterrina v. 3', 380.96503918877033, 385.4165670471199, 313),
(15216, 60, 'Sterrina v. 4', 386.1899257004772, 390.735765589724, 313),
(15217, 61, 'Sterrina v. 5', 391.2108376555921, 395.4360166397883, 313),
(15218, 62, 'Sterrina v. 6', 396.28482491786343, 401.58516105428805, 313),
(15219, 63, 'Sterrina v. 7', 402.3045685601787, 406.92585807414326, 313),
(15220, 64, 'Sterrina v. 8', 406.92585807414326, 410.3965408111616, 313),
(15221, 65, 'Sterrina v. 1 (Fin)', 411.05124603092867, 415.38959945220154, 313),
(15222, 66, 'Torrada v. 1 [Sterrina v. 1]', 422.31210252005866, 428.1710763646701, 313),
(15223, 67, 'Torrada v. 2 [Cobertantza v. 1]', 428.4917372697207, 433.52799971963316, 313),
(15224, 68, 'Torrada v. 3 [Cobertantza v. 2]', 434.09387190501656, 439.55936939089986, 313),
(15225, 69, 'Torrada v. 4 [Sterrina v. 2]', 440.46476488751335, 445.1992288385546, 313),
(15226, 70, 'Torrada v. 1 [Sterrina v. 2]', 451.1696197395283, 455.12524604069864, 313),
(15227, 71, 'Torrada v. 2 [Cobertantza v. 2] (Arr)', 455.12524604069864, 460.0323655644144, 313),
(15228, 72, 'Torrada v. 3 [Cobertantza v. 1]', 460.5010318018411, 465.23549575288234, 313),
(15229, 73, 'Torrada v. 4 [Sterrina v. 3]', 466.7307986874487, 471.10687692108047, 313),
(15230, 74, 'Sterrina v. 1', 481.5916355907727, 486.45813638507, 313),
(15231, 75, 'Sterrina v. 2', 487.7973672238108, 492.5418622272797, 313),
(15232, 76, 'Sterrina v. 3', 493.9376802845588, 498.4835201738055, 313),
(15233, 77, 'Sterrina v. 4', 499.1391021838986, 503.33127195728065, 313),
(15234, 78, 'Sterrina v. 5', 504.38285110178487, 508.68347971069875, 313),
(15235, 79, 'Sterrina v. 6', 509.287076708441, 513.040695538151, 313),
(15236, 80, 'Sterrina v. 7', 513.680810190203, 516.1715226961846, 313),
(15237, 81, 'Sterrina v. 8', 516.1715226961846, 519.7365174641002, 313),
(15238, 82, 'Torrada v. 1 [Sterrina v. 1]', 531.7648104648326, 536.0142419166169, 313),
(15239, 83, 'Torrada v. 2 [Cobertantza v. 1]', 536.4858020711031, 540.8241554923759, 313),
(15240, 84, 'Torrada v. 3 [Cobertantza v. 2]', 541.4277524901182, 545.8497776811179, 313),
(15241, 85, 'Torrada v. 1 [Sterrina v. 2]', 556.9756391061612, 561.6912406510229, 313),
(15242, 86, 'Torrada v. 2 [Cobertantza v. 2] (Arr)', 562.5023241167391, 567.3372496489866, 313),
(15243, 87, 'Torrada v. 3 [Cobertantza v. 1]', 567.9974338652672, 572.9582466904617, 313),
(15244, 88, 'Torrada v. 4 [Sterrina v. 3]', 573.9626698195173, 578.5650969273022, 313),
(15245, 89, 'Sterrina v. 1', 586.7771616428936, 590.8325789714746, 313),
(15246, 90, 'Sterrina v. 2', 591.6379593501865, 595.7216702880366, 313),
(15247, 91, 'Sterrina v. 3', 596.4855977383043, 600.0703336027565, 313),
(15248, 92, 'Sterrina v. 4', 600.5701873665118, 603.886025982869, 313),
(15249, 93, 'Sterrina v. 5', 604.565395620265, 608.4276920295048, 313),
(15250, 94, 'Sterrina v. 6', 609.0454358318817, 612.5349809750793, 313),
(15251, 95, 'Sterrina v. 7', 612.9499539110271, 616.2767561391194, 313),
(15252, 96, 'Sterrina v. 8', 616.2767561391194, 619.848332249162, 313),
(15253, 97, 'Torrada v. 1 [Sterrina v. 1]', 631.2150280127637, 634.2693506951179, 313),
(15254, 98, 'Torrada v. 2 [Cobertantza v. 1]', 634.2693506951179, 638.3527002903746, 313),
(15255, 99, 'Torrada v. 3 [Cobertantza v. 2]', 638.8601242476204, 642.3117348520589, 313),
(15256, 100, 'Torrada v. 1 [Sterrina v. 2]', 652.8399038790013, 656.7064419313426, 313),
(15257, 101, 'Torrada v. 2 [Cobertantza v. 2] (Arr)', 656.940449529958, 660.3877261140011, 313),
(15258, 102, 'Torrada v. 3 [Cobertantza v. 1]', 660.8812007307808, 664.8284062474922, 313),
(15259, 103, 'Sterrina v. 2', 676.4640070636219, 682.2086077694081, 313),
(15260, 104, 'Sterrina v. 3', 682.9703402567866, 687.2407545957309, 313),
(15261, 105, 'Sterrina v. 4', 687.2407545957309, 691.5226097514326, 313),
(15262, 106, 'Sterrina v. 5', 692.6928061915002, 696.8827783982717, 313),
(15263, 107, 'Sterrina v. 6', 697.4080370276203, 702.4582596534343, 313),
(15264, 108, 'Sterrina v. 7', 703.2605670245828, 706.7781148248745, 313),
(15265, 109, 'Sterrina v. 8', 707.0060685455151, 710.4557428918545, 313),
(15266, 110, 'Sterrina v. 1 (Fin)', 712.9962288977738, 718.434354983224, 313),
(15267, 111, 'Torrada v. 1 [Sterrina v. 1]', 722.41099116559, 728.5451952450069, 313),
(15268, 112, 'Torrada v. 2 [Cobertantza v. 1]', 728.7393841969374, 733.1064696226423, 313),
(15269, 113, 'Torrada v. 3 [Cobertantza v. 2]', 733.8609658698202, 738.514058054389, 313),
(15270, 114, 'Torrada v. 4 [Sterrina v. 2]', 739.4194535510024, 743.1164851621741, 313),
(15271, 115, 'Torrada v. 1 [Sterrina v. 2] (Err)', 750.1962532323688, 753.2829821327509, 313),
(15272, 116, 'Torrada v. 2 [Sterrina v. 2]', 753.2829821327509, 757.5505762243945, 313),
(15273, 117, 'Torrada v. 3 [Cobertantza v. 2] (Arr)', 757.5505762243945, 762.1524970244394, 313),
(15274, 118, 'Torrada v. 4 [Cobertantza v. 1]', 762.7771802242726, 767.0169170060719, 313),
(15275, 119, 'Torrada v. 5 [Sterrina v. 3]', 767.7808444563395, 771.3098702247554, 313),
(15276, 120, 'Sterrina v. 1', 779.5356357496933, 785.4530922841883, 313),
(15277, 121, 'Sterrina v. 2', 786.6998051648932, 792.4438467886814, 313),
(15278, 122, 'Sterrina v. 3', 793.8726002541667, 799.0408995473352, 313),
(15279, 123, 'Sterrina v. 4', 799.780503973962, 804.5809863466313, 313),
(15280, 124, 'Sterrina v. 5', 805.3921581320299, 810.4754882777086, 313),
(15281, 125, 'Sterrina v. 6', 811.2395040476584, 817.4971072976899, 313),
(15282, 126, 'Sterrina v. 7', 818.2516035448679, 823.0620661076136, 313),
(15283, 127, 'Sterrina v. 8', 823.0620661076136, 827.8436860741034, 313),
(15284, 128, 'Sterrina v. 1 (Fin)', 829.494146614805, 834.5738556753095, 313),
(15285, 129, 'Torrada v. 1 [Sterrina v. 1]', 840.4320420458063, 847.1020955560712, 313),
(15286, 130, 'Torrada v. 2 [Cobertantza v. 1]', 847.5547933043779, 852.6112342959743, 313),
(15287, 131, 'Torrada v. 3 [Cobertantza v. 2]', 853.2242624968063, 858.866315820307, 313),
(15288, 132, 'Torrada v. 4 [Sterrina v. 2]', 860.1395282374198, 866.6681165513859, 313),
(15289, 133, 'Torrada v. 1 [Sterrina v. 2]', 870.6547693099725, 875.6710785908843, 313),
(15290, 134, 'Torrada v. 2 [Cobertantza v. 2] (Arr)', 875.6710785908843, 881.141176382924, 313),
(15291, 135, 'Torrada v. 3 [Cobertantza v. 1]', 881.7070485683074, 886.9130726738348, 313),
(15292, 136, 'Torrada v. 4 [Sterrina v. 3]', 888.3168322343298, 892.7982232448396, 313),
(15293, 137, 'Sterrina v. 1', 898.7823129513266, 903.0929450538454, 313),
(15294, 138, 'Sterrina v. 2', 905.059086018447, 909.8098950664578, 313),
(15295, 139, 'Sterrina v. 3', 911.0128628934839, 914.7511177538121, 313),
(15296, 140, 'Sterrina v. 4', 915.5919017189378, 919.9651802807272, 313),
(15297, 141, 'Sterrina v. 5', 921.2069535215282, 925.323336514591, 313),
(15298, 142, 'Sterrina v. 6', 926.590606576256, 930.7819647189457, 313),
(15299, 143, 'Sterrina v. 7', 931.5580729944463, 935.046801549866, 313),
(15300, 144, 'Sterrina v. 8', 935.046801549866, 939.6153072236343, 313),
(15301, 145, 'Torrada v. 1 [Sterrina v. 1]', 952.0989258145466, 956.7224237154236, 313),
(15302, 146, 'Torrada v. 2 [Cobertantza v. 1]', 958.4594177792997, 963.5149820774305, 313),
(15303, 147, 'Torrada v. 3 [Cobertantza v. 2]', 964.2846227839686, 970.5892217767735, 313),
(15304, 148, 'Torrada v. 1 [Sterrina v. 2]', 981.1344426546356, 985.8334324205468, 313),
(15305, 149, 'Torrada v. 2 [Cobertantza v. 2] (Arr)', 986.9583066036246, 991.5128668714237, 313),
(15306, 150, 'Torrada v. 3 [Cobertantza v. 1]', 991.92352394475, 996.3660868289146, 313),
(15307, 151, 'Sterrina v. Crai', 1011.9731346033437, 1026.4387508882116, 313),
(15308, 152, 'Sterrina v. 1', 1027.6459448836963, 1031.6134042118372, 313),
(15309, 153, 'Sterrina v. 2', 1032.5501870101787, 1038.1873886531102, 313),
(15310, 154, 'Sterrina v. 3', 1039.194319527579, 1043.2780304654293, 313),
(15311, 155, 'Sterrina v. 4', 1044.6078301010803, 1048.3369433522753, 313),
(15312, 156, 'Sterrina v. 5', 1049.3682525932418, 1054.1608073012642, 313),
(15313, 157, 'Sterrina v. 6', 1055.4709536372427, 1058.7153675690633, 313),
(15314, 158, 'Sterrina v. 7', 1059.4246843320811, 1062.7410567807667, 313),
(15315, 159, 'Sterrina v. 8', 1062.7410567807667, 1068.9567818304715, 313),
(15316, 160, 'Torrada v. 1 [Sterrina v. 1]', 1076.9622514482871, 1080.2914661389598, 313),
(15317, 161, 'Torrada v. 2 [Cobertantza v. 1]', 1081.1265428775498, 1084.896959427613, 313),
(15318, 162, 'Torrada v. 3 [Cobertantza v. 2]', 1085.2871471684648, 1090.3935755934986, 313),
(15319, 163, 'Torrada v. 1 [Sterrina v. 2]', 1099.9585710071615, 1103.614260567376, 313),
(15320, 164, 'Torrada v. 2 [Cobertantza v. 2]', 1104.3403743086214, 1108.1977363723183, 313),
(15321, 165, 'Torrada v. 3 [Cobertantza v. 1]', 1108.3580668248437, 1114.903321769112, 313),
(15322, 166, 'Sterrina v. 1', 1126.737618938784, 1133.0411716640542, 313),
(15323, 167, 'Sterrina v. 2', 1133.9277047544883, 1140.3224997944994, 313),
(15324, 168, 'Sterrina v. 3', 1141.2731822132953, 1146.1077713942138, 313),
(15325, 169, 'Sterrina v. 4', 1147.0198538455818, 1153.6832175510451, 313),
(15326, 170, 'Sterrina v. 5', 1155.9583304214989, 1162.1465167338777, 313),
(15327, 171, 'Sterrina v. 6', 1162.1465167338777, 1167.6295547903421, 313),
(15328, 172, 'Sterrina v. 7', 1168.7235743487502, 1173.1845334101893, 313),
(15329, 173, 'Sterrina v. 8', 1173.8994392870306, 1182.4853468337426, 313),
(15330, 174, 'Sterrina v. 1 (Fin)', 1182.4853468337426, 1186.7451772404124, 313),
(15331, 175, 'Torrada v. 1 [Sterrina v. 1]', 1193.9876493509248, 1198.4955440422095, 313),
(15332, 176, 'Torrada v. 2 [Cobertantza v. 1]', 1198.4955440422095, 1204.1098441928482, 313),
(15333, 177, 'Torrada v. 3 [Cobertantza v. 2]', 1204.8336602774966, 1209.4314564995254, 313),
(15334, 178, 'Torrada v. 4 [Sterrina v. 2]', 1210.4207667216294, 1215.852639827898, 313),
(15335, 179, 'Torrada v. 1 [Sterrina v. 2]', 1221.002251434618, 1225.6553436191869, 313),
(15336, 180, 'Torrada v. 2 [Cobertantza v. 2] (Arr)', 1225.6553436191869, 1231.4932583317257, 313),
(15337, 181, 'Torrada v. 3 [Cobertantza v. 1]', 1231.9836808923912, 1237.287525140135, 313),
(15338, 182, 'Torrada v. 4 [Sterrina v. 3]', 1237.8816909347875, 1242.870797369251, 313),
(15339, 183, 'Sterrina v. 1', 1251.3229070182638, 1260.7198943569636, 313),
(15340, 184, 'Sterrina v. 2', 1261.8799323369994, 1268.251369041876, 313),
(15341, 185, 'Sterrina v. 3', 1269.2043598991165, 1274.8782973230852, 313),
(15342, 186, 'Sterrina v. 4', 1275.6249465473145, 1280.7547322084454, 313),
(15343, 187, 'Sterrina v. 5', 1281.5658156741615, 1286.4134540622792, 313),
(15344, 188, 'Sterrina v. 6', 1287.2245375279956, 1293.5424866542573, 313),
(15345, 189, 'Sterrina v. 7', 1294.410157338512, 1303.9783016718427, 313),
(15346, 190, 'Sterrina v. 1 (Fin)', 1304.6950731066615, 1311.3570105993256, 313),
(15347, 191, 'Torrada v. 1 [Sterrina v. 1]', 1315.4108892697477, 1320.2029331428807, 313),
(15348, 192, 'Torrada v. 2 [Cobertantza v. 1]', 1320.2029331428807, 1325.0647183356236, 313),
(15349, 193, 'Torrada v. 3 [Cobertantza v. 2]', 1325.668315333365, 1332.7794424630026, 313),
(15350, 194, 'Torrada v. 4 [Sterrina v. 2]', 1333.164914631669, 1338.7293244545951, 313),
(15351, 195, 'Torrada v. 1 [Sterrina v. 2]', 1342.8224665955272, 1347.4386246463278, 313),
(15352, 196, 'Torrada v. 2 [Cobertantza v. 2] (Arr)', 1347.655542317391, 1352.1165013788216, 313),
(15353, 197, 'Torrada v. 3 [Cobertantza v. 1]', 1352.6589576385154, 1357.3011868568835, 313),
(15354, 198, 'Torrada v. 4 [Sterrina v. 3]', 1357.8481966360864, 1364.6224387578063, 313),
(15355, 1, 'Intervento Bàsciu e contra', 14.784813316473633, 27.609518530960393, 314),
(15356, 2, 'Intervento Bàsciu e contra', 41.928040810918986, 52.97197941866221, 314),
(15357, 3, 'Intervento Bàsciu e contra', 100.10099735253274, 111.18402564270072, 314),
(15358, 4, 'Intervento Bàsciu e contra', 126.41183590066112, 137.2009355117907, 314),
(15359, 5, 'Intervento Bàsciu e contra', 151.34914738105184, 164.21671196482723, 314),
(15360, 6, 'Intervento Bàsciu e contra', 197.97544813182748, 208.99109334062464, 314),
(15361, 7, 'Intervento Bàsciu e contra', 219.54768406425995, 230.50849848521756, 314),
(15362, 8, 'Intervento Bàsciu e contra', 241.35503950173955, 251.74822510868498, 314),
(15363, 9, 'Intervento Bàsciu e contra', 298.01504617205967, 309.2064511764752, 314),
(15364, 10, 'Intervento Bàsciu e contra', 325.08277785777193, 336.38739027847083, 314),
(15365, 11, 'Intervento Bàsciu e contra', 409.530454130077, 421.7650927408547, 314),
(15366, 12, 'Intervento Bàsciu e contra', 438.42762502013306, 450.75464680358044, 314),
(15367, 13, 'Intervento Bàsciu e contra', 464.9907417173947, 476.7655987749146, 314),
(15368, 14, 'Intervento Bàsciu e contra', 519.8726137411804, 530.7893554049101, 314),
(15369, 15, 'Intervento Bàsciu e contra', 545.9440897120152, 557.2301240224806, 314),
(15370, 16, 'Intervento Bàsciu e contra', 572.6045765745971, 583.9289383097971, 314),
(15371, 17, 'Intervento Bàsciu e contra', 620.0929025473544, 631.2150280127637, 314),
(15372, 18, 'Intervento Bàsciu e contra', 664.9604430907484, 674.6368574608049, 314),
(15373, 19, 'Intervento Bàsciu e contra', 710.4557428918545, 721.9015048634996, 314),
(15374, 20, 'Intervento Bàsciu e contra', 738.5965961741108, 749.4979067585821, 314),
(15375, 21, 'Intervento Bàsciu e contra', 766.8583423664059, 778.1646169816061, 314),
(15376, 22, 'Intervento Bàsciu e contra', 827.6079059968604, 840.1302435469352, 314),
(15377, 23, 'Intervento Bàsciu e contra', 857.8760394958861, 869.8944666984287, 314),
(15378, 24, 'Intervento Bàsciu e contra', 886.541210898501, 898.0256073827135, 314),
(15379, 25, 'Intervento Bàsciu e contra', 939.3598382496153, 950.8224767798428, 314),
(15380, 26, 'Intervento Bàsciu e contra', 969.0177531180325, 980.5558961471423, 314),
(15381, 27, 'Intervento Bàsciu e contra', 996.4495599286265, 1007.9261447045394, 314),
(15382, 28, 'Intervento Bàsciu e contra', 1015.0189920593866, 1026.4387508882116, 314),
(15383, 29, 'Intervento Bàsciu e contra', 1065.7690351861452, 1076.3770860616864, 314),
(15384, 30, 'Intervento Bàsciu e contra', 1089.4368765279432, 1099.7698964559772, 314),
(15385, 31, 'Intervento Bàsciu e contra', 1111.791024749503, 1122.6054367999964, 314),
(15386, 32, 'Intervento Bàsciu e contra', 1181.7480307248163, 1193.6194225924257, 314),
(15387, 33, 'Intervento Bàsciu e contra', 1209.5209682130892, 1220.5212600770421, 314),
(15388, 34, 'Intervento Bàsciu e contra', 1236.3726955903849, 1247.5015180863054, 314),
(15389, 35, 'Intervento Bàsciu e contra', 1302.6579332392814, 1314.9785925857793, 314),
(15390, 36, 'Intervento Bàsciu e contra', 1330.2188708241476, 1342.2188695977861, 314),
(15391, 37, 'Intervento Bàsciu e contra', 1356.783680334501, 1368.6881586560296, 314),
(15392, 1, 'Torrada n. 1', 0.7494521314277557, 27.609518530960393, 315),
(15393, 2, 'Torrada n. 2', 27.835867405113717, 52.97197941866221, 315),
(15394, 3, 'Torrada n. 1', 111.7530181297789, 136.91714994740417, 315),
(15395, 4, 'Torrada n. 2', 136.91714994740417, 164.21671196482723, 315),
(15396, 5, 'Torrada n. 1', 209.1419925900602, 230.50849848521756, 315),
(15397, 6, 'Torrada n. 2', 230.50849848521756, 251.74822510868498, 315),
(15398, 7, 'Torrada n. 1', 309.80018842409606, 336.5670215323385, 315),
(15399, 8, 'Torrada n. 2', 336.5670215323385, 361.5188544586748, 315),
(15400, 9, 'Torrada n. 1', 422.31210252005866, 450.75464680358044, 315),
(15401, 10, 'Torrada n. 2', 451.1696197395283, 476.7655987749146, 315),
(15402, 11, 'Torrada n. 1', 531.7648104648326, 556.9756391061612, 315),
(15403, 12, 'Torrada n. 2', 556.9756391061612, 583.9289383097971, 315),
(15404, 13, 'Torrada n. 1', 631.2150280127637, 652.8399038790013, 315),
(15405, 14, 'Torrada n. 2', 652.8399038790013, 674.6368574608049, 315),
(15406, 15, 'Torrada n. 1', 722.41099116559, 750.1962532323688, 315),
(15407, 16, 'Torrada n. 2', 750.1962532323688, 778.1646169816061, 315),
(15408, 17, 'Torrada n. 1', 840.4320420458063, 870.6547693099725, 315),
(15409, 18, 'Torrada n. 2', 870.6547693099725, 898.0256073827135, 315),
(15410, 19, 'Torrada n. 1', 952.0989258145466, 980.5558961471423, 315),
(15411, 20, 'Torrada n. 2', 981.1344426546356, 1007.0932733061862, 315),
(15412, 21, 'Torrada n. 1', 1076.3770860616864, 1099.7698964559772, 315),
(15413, 22, 'Torrada n. 2', 1099.9585710071615, 1122.6054367999964, 315),
(15414, 23, 'Torrada n. 1', 1193.9876493509248, 1220.5212600770421, 315),
(15415, 24, 'Torrada n. 2', 1221.002251434618, 1247.5015180863054, 315),
(15416, 25, 'Torrada n. 1', 1315.4108892697477, 1342.2188695977861, 315),
(15417, 26, 'Torrada n. 2', 1342.8224665955272, 1368.6881586560296, 315),
(15418, 1, 'Cobertantza', 0.7494521314277557, 52.97197941866221, 316),
(15419, 2, 'Sterrina', 56.095764487027395, 111.18402564270072, 316),
(15420, 3, 'Cobertantza', 111.7530181297789, 164.21671196482723, 316),
(15421, 4, 'Sterrina', 166.78893679943596, 208.99109334062464, 316),
(15422, 5, 'Cobertantza', 209.1419925900602, 251.74822510868498, 316),
(15423, 6, 'Sterrina', 252.01229879016816, 309.2064511764752, 316),
(15424, 7, 'Cobertantza', 309.80018842409606, 361.5188544586748, 316),
(15425, 8, 'Sterrina', 365.8572078799476, 422.31210252005866, 316),
(15426, 9, 'Cobertantza', 422.31210252005866, 476.7655987749146, 316),
(15427, 10, 'Sterrina', 481.5916355907727, 530.7893554049101, 316),
(15428, 11, 'Cobertantza', 531.7648104648326, 583.9289383097971, 316),
(15429, 12, 'Sterrina', 586.7771616428936, 631.2150280127637, 316),
(15430, 13, 'Cobertantza', 631.2150280127637, 674.6368574608049, 316),
(15431, 14, 'Sterrina', 676.4640070636219, 721.9015048634996, 316),
(15432, 15, 'Cobertantza', 722.41099116559, 778.7811395025153, 316),
(15433, 16, 'Sterrina', 779.5356357496933, 840.1302435469352, 316),
(15434, 17, 'Cobertantza', 840.4320420458063, 898.0256073827135, 316),
(15435, 18, 'Sterrina', 898.7823129513266, 952.0989258145466, 316),
(15436, 19, 'Cobertantza', 952.0989258145466, 1007.9261447045394, 316),
(15437, 20, 'Sterrina', 1027.6459448836963, 1076.3770860616864, 316),
(15438, 21, 'Cobertantza', 1076.9622514482871, 1122.6054367999964, 316),
(15439, 22, 'Sterrina', 1126.737618938784, 1193.6194225924257, 316),
(15440, 23, 'Cobertantza', 1193.9876493509248, 1247.8693321567578, 316),
(15441, 24, 'Sterrina', 1251.3229070182638, 1314.9785925857793, 316),
(15442, 25, 'Cobertantza', 1315.4108892697477, 1368.6881586560296, 316),
(15443, 1, 'Mutetu longu n. 17', 0, 53.21567768710068, 317),
(15444, 2, 'Mutetu longu n. 18', 56.095764487027395, 156.96975216528665, 317),
(15445, 3, 'Mutetu longu n. 19', 166.78893679943596, 251.74822510868498, 317),
(15446, 4, 'Mutetu longu n. 20', 252.01229879016816, 361.5188544586748, 317),
(15447, 5, 'Mutetu longu n. 21', 365.8572078799476, 476.7655987749146, 317),
(15448, 6, 'Mutetu longu n. 22', 477.2903479640908, 583.9289383097971, 317),
(15449, 7, 'Mutetu longu n. 23', 586.7771616428936, 674.6368574608049, 317),
(15450, 8, 'Mutetu longu n. 24', 676.4640070636219, 778.7811395025153, 317),
(15451, 9, 'Mutetu longu n. 25', 779.5356357496933, 898.0256073827135, 317),
(15452, 10, 'Mutetu longu n. 26', 898.7823129513266, 1007.9261447045394, 317),
(15453, 11, 'Mutetu longu n. 27', 1011.9731346033437, 1122.6054367999964, 317),
(15454, 12, 'Mutetu longu n. 28', 1126.737618938784, 1247.8693321567578, 317),
(15455, 13, 'Mutetu longu n. 29', 1251.3229070182638, 1368.9535302474492, 317),
(15456, 1, 'Poeta improvvisatore n. 1 (Emanuele Saba [Mutetu longu])', 0, 53.21567768710068, 318),
(15457, 2, 'Poeta improvvisatore n. 2 (Antonio Crisioni [Mutetu longu])', 56.095764487027395, 164.21671196482723, 318),
(15458, 3, 'Poeta improvvisatore n. 3 (Giovanni Broi [Mutetu longu])', 166.78893679943596, 251.74822510868498, 318),
(15459, 4, 'Poeta improvvisatore n. 4 (Raffaele Cocco [Mutetu longu])', 252.01229879016816, 361.5188544586748, 318),
(15460, 5, 'Poeta improvvisatore n. 1 (Emanuele Saba [Mutetu longu])', 365.8572078799476, 476.7655987749146, 318),
(15461, 6, 'Poeta improvvisatore n. 2 (Antonio Crisioni [Mutetu longu])', 481.5916355907727, 583.9289383097971, 318),
(15462, 7, 'Poeta improvvisatore n. 3 (Giovanni Broi [Mutetu longu])', 586.7771616428936, 674.6368574608049, 318),
(15463, 8, 'Poeta improvvisatore n. 4 (Raffaele Cocco [Mutetu longu])', 676.4640070636219, 778.7811395025153, 318),
(15464, 9, 'Poeta improvvisatore n. 1 (Emanuele Saba [Mutetu longu])', 779.5356357496933, 898.0256073827135, 318),
(15465, 10, 'Poeta improvvisatore n. 2 (Antonio Crisioni [Mutetu longu])', 898.7823129513266, 1007.9261447045394, 318),
(15466, 11, 'Poeta improvvisatore n. 3 (Giovanni Broi [Mutetu longu])', 1011.9731346033437, 1122.6054367999964, 318),
(15467, 12, 'Poeta improvvisatore n. 4 (Raffaele Cocco [Mutetu longu])', 1126.728187735694, 1247.867460148937, 318),
(15468, 13, 'Poeta improvvisatore n. 1 (Emanuele Saba [Mutetu longu])', 1251.3229070182638, 1368.9535302474492, 318),
(15469, 1, 'Giru de sèlliu', 898.7823129513266, 1368.9535302474492, 320),
(15470, 1, 'ma è errore??', 233.76472973594215, 237.43049823902436, 321),
(15471, 1, 'Mutetada - parte 2', 0, 1368.9535302474492, 322),
(15472, 1, 'Aldo Pittirra (Contra)', 14.784813316473633, 27.609518530960393, 323),
(15473, 2, 'Aldo Pittirra (Contra)', 41.928040810918986, 52.97197941866221, 323),
(15474, 3, 'Aldo Pittirra (Contra)', 100.10099735253274, 111.18402564270072, 323),
(15475, 4, 'Aldo Pittirra (Contra)', 126.41183590066112, 137.2009355117907, 323),
(15476, 5, 'Aldo Pittirra (Contra)', 151.34914738105184, 164.21671196482723, 323),
(15477, 6, 'Aldo Pittirra (Contra)', 197.97544813182748, 208.99109334062464, 323),
(15478, 7, 'Aldo Pittirra (Contra)', 219.54768406425995, 230.50849848521756, 323),
(15479, 8, 'Aldo Pittirra (Contra)', 241.35503950173955, 251.74822510868498, 323),
(15480, 9, 'Aldo Pittirra (Contra)', 298.01504617205967, 309.2064511764752, 323),
(15481, 10, 'Aldo Pittirra (Contra)', 325.08277785777193, 336.38739027847083, 323),
(15482, 11, 'Aldo Pittirra (Contra)', 409.530454130077, 421.7650927408547, 323),
(15483, 12, 'Aldo Pittirra (Contra)', 438.42762502013306, 450.75464680358044, 323),
(15484, 13, 'Aldo Pittirra (Contra)', 464.9907417173947, 476.7655987749146, 323),
(15485, 14, 'Aldo Pittirra (Contra)', 519.8726137411804, 530.7893554049101, 323),
(15486, 15, 'Aldo Pittirra (Contra)', 545.9440897120152, 557.2301240224806, 323),
(15487, 16, 'Aldo Pittirra (Contra)', 572.6045765745971, 583.9289383097971, 323),
(15488, 17, 'Aldo Pittirra (Contra)', 620.0929025473544, 631.2150280127637, 323),
(15489, 18, 'Aldo Pittirra (Contra)', 664.9604430907484, 674.6368574608049, 323),
(15490, 19, 'Aldo Pittirra (Contra)', 710.4557428918545, 721.9015048634996, 323),
(15491, 20, 'Aldo Pittirra (Contra)', 738.5965961741108, 749.4979067585821, 323),
(15492, 21, 'Aldo Pittirra (Contra)', 766.8583423664059, 778.1646169816061, 323),
(15493, 22, 'Aldo Pittirra (Contra)', 827.6079059968604, 840.1302435469352, 323),
(15494, 23, 'Aldo Pittirra (Contra)', 857.8760394958861, 869.8944666984287, 323),
(15495, 24, 'Aldo Pittirra (Contra)', 886.541210898501, 898.0256073827135, 323),
(15496, 25, 'Aldo Pittirra (Contra)', 939.3598382496153, 950.8224767798428, 323),
(15497, 26, 'Aldo Pittirra (Contra)', 969.0177531180325, 980.5558961471423, 323),
(15498, 27, 'Aldo Pittirra (Contra)', 996.4495599286265, 1007.9261447045394, 323),
(15499, 28, 'Aldo Pittirra (Contra)', 1015.0189920593866, 1026.4387508882116, 323),
(15500, 29, 'Aldo Pittirra (Contra)', 1065.7690351861452, 1076.3770860616864, 323),
(15501, 30, 'Aldo Pittirra (Contra)', 1089.4368765279432, 1099.7698964559772, 323),
(15502, 31, 'Aldo Pittirra (Contra)', 1111.791024749503, 1122.6054367999964, 323),
(15503, 32, 'Aldo Pittirra (Contra)', 1181.7480307248163, 1193.6194225924257, 323),
(15504, 33, 'Aldo Pittirra (Contra)', 1209.5209682130892, 1220.5212600770421, 323),
(15505, 34, 'Aldo Pittirra (Contra)', 1236.3726955903849, 1247.5015180863054, 323),
(15506, 35, 'Aldo Pittirra (Contra)', 1302.6579332392814, 1314.9785925857793, 323),
(15507, 36, 'Aldo Pittirra (Contra)', 1330.2188708241476, 1342.2188695977861, 323),
(15508, 37, 'Aldo Pittirra (Contra)', 1356.783680334501, 1368.6881586560296, 323),
(15509, 1, 'Emanuele Saba (Mutetu longu)', 0, 53.21567768710068, 324),
(15510, 2, 'Emanuele Saba (Mutetu longu)', 365.8572078799476, 476.7655987749146, 324),
(15511, 3, 'Emanuele Saba (Mutetu longu)', 779.5356357496933, 898.0256073827135, 324),
(15512, 4, 'Emanuele Saba (Mutetu longu)', 1251.3229070182638, 1368.9535302474492, 324),
(15513, 1, 'Antonio Crisioni (Mutetu longu)', 56.095764487027395, 164.21671196482723, 325),
(15514, 2, 'Antonio Crisioni (Mutetu longu)', 481.5916355907727, 583.9289383097971, 325),
(15515, 3, 'Antonio Crisioni (Mutetu longu)', 898.7823129513266, 1007.9261447045394, 325),
(15516, 1, 'Giovanni Broi (Mutetu longu)', 166.78893679943596, 251.74822510868498, 326),
(15517, 2, 'Giovanni Broi (Mutetu longu)', 586.7771616428936, 674.6368574608049, 326),
(15518, 3, 'Giovanni Broi (Mutetu longu)', 1011.9731346033437, 1122.6054367999964, 326),
(15519, 1, 'Raffaele Cocco (Mutetu longu)', 252.01229879016816, 361.5188544586748, 327),
(15520, 2, 'Raffaele Cocco (Mutetu longu)', 676.4640070636219, 778.7811395025153, 327),
(15521, 3, 'Raffaele Cocco (Mutetu longu)', 1126.728187735694, 1247.867460148937, 327),
(15522, 1, 'Torrada v. 1 [Sterrina v. 1]', 0.7494521314277557, 4.77292894380614, 328),
(15523, 2, 'Torrada v. 2 [Cobertantza v. 1]', 4.77292894380614, 10.058611116562972, 328),
(15524, 3, 'Torrada v. 3 [Cobertantza v. 2]', 10.595628157099114, 16.467227479189525, 328),
(15525, 4, 'Torrada v. 4 [Sterrina v. 2] (Err)', 16.914534227213874, 23.89425507296305, 328),
(15526, 5, 'Torrada v. 1 [Sterrina v. 2]', 27.835867405113717, 32.07287820012152, 328),
(15527, 6, 'Torrada v. 2 [Cobertantza v. 2] (Arr)', 32.07287820012152, 37.32227703546154, 328),
(15528, 7, 'Torrada v. 3 [Cobertantza v. 1]', 37.73707362896719, 43.567557110054295, 328),
(15529, 8, 'Torrada v. 4 [Sterrina v. 3]', 44.19187617428911, 48.95145585051952, 328),
(15530, 9, 'Sterrina v. 1', 56.095764487027395, 60.82333274299595, 328),
(15531, 10, 'Sterrina v. 2', 61.83126229153446, 66.5737702976204, 328),
(15532, 11, 'Sterrina v. 3', 67.7080531788335, 71.41463280894281, 328),
(15533, 12, 'Sterrina v. 4', 71.96043195008292, 76.58561763144269, 328),
(15534, 13, 'Sterrina v. 5', 78.55697744390447, 83.22648319423104, 328),
(15535, 14, 'Sterrina v. 6', 83.74670489670252, 88.14283461342448, 328),
(15536, 15, 'Sterrina v. 7', 88.89467368888134, 93.33811522040342, 328),
(15537, 16, 'Sterrina v. 8', 93.84207999467267, 101.50933762956727, 328),
(15538, 17, 'Torrada v. 1 [Sterrina v. 1]', 111.7530181297789, 115.99607639056195, 328),
(15539, 18, 'Torrada v. 2 [Cobertantza v. 1]', 116.76947252653332, 121.5977802025968, 328),
(15540, 19, 'Torrada v. 3 [Cobertantza v. 2]', 122.10174497686604, 127.36898971438984, 328),
(15541, 20, 'Torrada v. 1 [Sterrina v. 2]', 136.91714994740417, 141.9878017305785, 328),
(15542, 21, 'Torrada v. 2 [Cobertantza v. 2] (Arr)', 142.50802343305, 146.92990790405764, 328),
(15543, 22, 'Torrada v. 3 [Cobertantza v. 1]', 147.1881613432089, 152.50603427742388, 328),
(15544, 23, 'Torrada v. 4 [Sterrina v. 3]', 152.93171617560665, 156.96975216528665, 328),
(15545, 24, 'Sterrina v. 1', 166.78893679943596, 170.68706295730377, 328),
(15546, 25, 'Sterrina v. 2', 170.68706295730377, 174.15774569432205, 328),
(15547, 26, 'Sterrina v. 3', 174.6104434426288, 178.72244798974828, 328),
(15548, 27, 'Sterrina v. 4', 179.32692272783214, 182.64670621541487, 328),
(15549, 28, 'Sterrina v. 5', 183.17748870949538, 187.04428197628206, 328),
(15550, 29, 'Sterrina v. 6', 187.51584213076825, 190.98652486778653, 328),
(15551, 30, 'Sterrina v. 7', 191.44185868716497, 194.64846773767098, 328),
(15552, 31, 'Sterrina v. 8', 194.64846773767098, 197.74190235110035, 328),
(15553, 32, 'Torrada v. 1 [Sterrina v. 1]', 209.1419925900602, 212.12225276641286, 328),
(15554, 33, 'Torrada v. 2 [Cobertantza v. 1]', 212.12225276641286, 215.82016211792606, 328),
(15555, 34, 'Torrada v. 3 [Cobertantza v. 2]', 215.94496448398556, 219.54768406425995, 328),
(15556, 35, 'Torrada v. 1 [Sterrina v. 2]', 230.50849848521756, 233.76472973594215, 328),
(15557, 36, 'Torrada v. 2 [Cobertantza v. 2]', 233.76472973594215, 237.43049823902436, 328),
(15558, 37, 'Torrada v. 3 [Cobertantza v. 1]', 237.7888839496087, 241.19486632136946, 328),
(15559, 38, 'Sterrina v. 1', 252.01229879016816, 256.0111288240564, 328),
(15560, 39, 'Sterrina v. 2', 256.57700099866327, 262.38662199129334, 328),
(15561, 40, 'Sterrina v. 3', 263.38632949976545, 269.74647525107474, 328),
(15562, 41, 'Sterrina v. 4', 269.74647525107474, 272.6135609357493, 328),
(15563, 42, 'Sterrina v. 5', 273.3491947627382, 277.1216759267837, 328),
(15564, 43, 'Sterrina v. 6', 277.84371698274424, 282.1820703213966, 328),
(15565, 44, 'Sterrina v. 7', 282.8422545251046, 287.0108462113749, 328),
(15566, 45, 'Sterrina v. 8', 287.0108462113749, 290.6775703079911, 328),
(15567, 46, 'Sterrina v. 9', 291.30002970005864, 294.4123266603962, 328),
(15568, 47, 'Sterrina v. 10', 294.4123266603962, 298.01504617205967, 328),
(15569, 48, 'Sterrina v. 1 (Fin)', 299.4666788599481, 302.84304950176886, 328),
(15570, 49, 'Torrada v. 1 [Sterrina v. 1]', 309.80018842409606, 314.50469055691684, 328),
(15571, 50, 'Torrada v. 2 [Cobertantza v. 1]', 314.976250711403, 320.15617603352297, 328),
(15572, 51, 'Torrada v. 3 [Cobertantza v. 2]', 320.6088737818297, 325.08277785777193, 328),
(15573, 52, 'Torrada v. 4 [Sterrina v. 2]', 326.0824853852826, 329.40314661320696, 328),
(15574, 53, 'Torrada v. 1 [Sterrina v. 2]', 336.5670215323385, 341.00352641356693, 328),
(15575, 54, 'Torrada v. 2 [Cobertantza v. 2] (Arr)', 341.21101288154085, 345.9861046922083, 328),
(15576, 55, 'Torrada v. 3 [Cobertantza v. 1]', 346.1065865296991, 350.2468846860877, 328);
INSERT INTO `intervals` (`id`, `seq`, `nota`, `inizio`, `fine`, `tier_id`) VALUES
(15577, 56, 'Torrada v. 4 [Sterrina v. 3]', 351.0018202784442, 354.46371244828543, 328),
(15578, 57, 'Sterrina v. 1', 365.8572078799476, 374.08026093327214, 328),
(15579, 58, 'Sterrina v. 2', 375.2273538988052, 380.13509331687465, 328),
(15580, 59, 'Sterrina v. 3', 380.96503918877033, 385.4165670471199, 328),
(15581, 60, 'Sterrina v. 4', 386.1899257004772, 390.735765589724, 328),
(15582, 61, 'Sterrina v. 5', 391.2108376555921, 395.4360166397883, 328),
(15583, 62, 'Sterrina v. 6', 396.28482491786343, 401.58516105428805, 328),
(15584, 63, 'Sterrina v. 7', 402.3045685601787, 406.92585807414326, 328),
(15585, 64, 'Sterrina v. 8', 406.92585807414326, 410.3965408111616, 328),
(15586, 65, 'Sterrina v. 1 (Fin)', 411.05124603092867, 415.38959945220154, 328),
(15587, 66, 'Torrada v. 1 [Sterrina v. 1]', 422.31210252005866, 428.1710763646701, 328),
(15588, 67, 'Torrada v. 2 [Cobertantza v. 1]', 428.4917372697207, 433.52799971963316, 328),
(15589, 68, 'Torrada v. 3 [Cobertantza v. 2]', 434.09387190501656, 439.55936939089986, 328),
(15590, 69, 'Torrada v. 4 [Sterrina v. 2]', 440.46476488751335, 445.1992288385546, 328),
(15591, 70, 'Torrada v. 1 [Sterrina v. 2]', 451.1696197395283, 455.12524604069864, 328),
(15592, 71, 'Torrada v. 2 [Cobertantza v. 2] (Arr)', 455.12524604069864, 460.0323655644144, 328),
(15593, 72, 'Torrada v. 3 [Cobertantza v. 1]', 460.5010318018411, 465.23549575288234, 328),
(15594, 73, 'Torrada v. 4 [Sterrina v. 3]', 466.7307986874487, 471.10687692108047, 328),
(15595, 74, 'Sterrina v. 1', 481.5916355907727, 486.45813638507, 328),
(15596, 75, 'Sterrina v. 2', 487.7973672238108, 492.5418622272797, 328),
(15597, 76, 'Sterrina v. 3', 493.9376802845588, 498.4835201738055, 328),
(15598, 77, 'Sterrina v. 4', 499.1391021838986, 503.33127195728065, 328),
(15599, 78, 'Sterrina v. 5', 504.38285110178487, 508.68347971069875, 328),
(15600, 79, 'Sterrina v. 6', 509.287076708441, 513.040695538151, 328),
(15601, 80, 'Sterrina v. 7', 513.680810190203, 516.1715226961846, 328),
(15602, 81, 'Sterrina v. 8', 516.1715226961846, 519.7365174641002, 328),
(15603, 82, 'Torrada v. 1 [Sterrina v. 1]', 531.7648104648326, 536.0142419166169, 328),
(15604, 83, 'Torrada v. 2 [Cobertantza v. 1]', 536.4858020711031, 540.8241554923759, 328),
(15605, 84, 'Torrada v. 3 [Cobertantza v. 2]', 541.4277524901182, 545.8497776811179, 328),
(15606, 85, 'Torrada v. 1 [Sterrina v. 2]', 556.9756391061612, 561.6912406510229, 328),
(15607, 86, 'Torrada v. 2 [Cobertantza v. 2] (Arr)', 562.5023241167391, 567.3372496489866, 328),
(15608, 87, 'Torrada v. 3 [Cobertantza v. 1]', 567.9974338652672, 572.9582466904617, 328),
(15609, 88, 'Torrada v. 4 [Sterrina v. 3]', 573.9626698195173, 578.5650969273022, 328),
(15610, 89, 'Sterrina v. 1', 586.7771616428936, 590.8325789714746, 328),
(15611, 90, 'Sterrina v. 2', 591.6379593501865, 595.7216702880366, 328),
(15612, 91, 'Sterrina v. 3', 596.4855977383043, 600.0703336027565, 328),
(15613, 92, 'Sterrina v. 4', 600.5701873665118, 603.886025982869, 328),
(15614, 93, 'Sterrina v. 5', 604.565395620265, 608.4276920295048, 328),
(15615, 94, 'Sterrina v. 6', 609.0454358318817, 612.5349809750793, 328),
(15616, 95, 'Sterrina v. 7', 612.9499539110271, 616.2767561391194, 328),
(15617, 96, 'Sterrina v. 8', 616.2767561391194, 619.848332249162, 328),
(15618, 97, 'Torrada v. 1 [Sterrina v. 1]', 631.2150280127637, 634.2693506951179, 328),
(15619, 98, 'Torrada v. 2 [Cobertantza v. 1]', 634.2693506951179, 638.3527002903746, 328),
(15620, 99, 'Torrada v. 3 [Cobertantza v. 2]', 638.8601242476204, 642.3117348520589, 328),
(15621, 100, 'Torrada v. 1 [Sterrina v. 2]', 652.8399038790013, 656.7064419313426, 328),
(15622, 101, 'Torrada v. 2 [Cobertantza v. 2] (Arr)', 656.940449529958, 660.3877261140011, 328),
(15623, 102, 'Torrada v. 3 [Cobertantza v. 1]', 660.8812007307808, 664.8284062474922, 328),
(15624, 103, 'Sterrina v. 2', 676.4640070636219, 682.2086077694081, 328),
(15625, 104, 'Sterrina v. 3', 682.9703402567866, 687.2407545957309, 328),
(15626, 105, 'Sterrina v. 4', 687.2407545957309, 691.5226097514326, 328),
(15627, 106, 'Sterrina v. 5', 692.6928061915002, 696.8827783982717, 328),
(15628, 107, 'Sterrina v. 6', 697.4080370276203, 702.4582596534343, 328),
(15629, 108, 'Sterrina v. 7', 703.2605670245828, 706.7781148248745, 328),
(15630, 109, 'Sterrina v. 8', 707.0060685455151, 710.4557428918545, 328),
(15631, 110, 'Sterrina v. 1 (Fin)', 712.9962288977738, 718.434354983224, 328),
(15632, 111, 'Torrada v. 1 [Sterrina v. 1]', 722.41099116559, 728.5451952450069, 328),
(15633, 112, 'Torrada v. 2 [Cobertantza v. 1]', 728.7393841969374, 733.1064696226423, 328),
(15634, 113, 'Torrada v. 3 [Cobertantza v. 2]', 733.8609658698202, 738.514058054389, 328),
(15635, 114, 'Torrada v. 4 [Sterrina v. 2]', 739.4194535510024, 743.1164851621741, 328),
(15636, 115, 'Torrada v. 1 [Sterrina v. 2] (Err)', 750.1962532323688, 753.2829821327509, 328),
(15637, 116, 'Torrada v. 2 [Sterrina v. 2]', 753.2829821327509, 757.5505762243945, 328),
(15638, 117, 'Torrada v. 3 [Cobertantza v. 2] (Arr)', 757.5505762243945, 762.1524970244394, 328),
(15639, 118, 'Torrada v. 4 [Cobertantza v. 1]', 762.7771802242726, 767.0169170060719, 328),
(15640, 119, 'Torrada v. 5 [Sterrina v. 3]', 767.7808444563395, 771.3098702247554, 328),
(15641, 120, 'Sterrina v. 1', 779.5356357496933, 785.4530922841883, 328),
(15642, 121, 'Sterrina v. 2', 786.6998051648932, 792.4438467886814, 328),
(15643, 122, 'Sterrina v. 3', 793.8726002541667, 799.0408995473352, 328),
(15644, 123, 'Sterrina v. 4', 799.780503973962, 804.5809863466313, 328),
(15645, 124, 'Sterrina v. 5', 805.3921581320299, 810.4754882777086, 328),
(15646, 125, 'Sterrina v. 6', 811.2395040476584, 817.4971072976899, 328),
(15647, 126, 'Sterrina v. 7', 818.2516035448679, 823.0620661076136, 328),
(15648, 127, 'Sterrina v. 8', 823.0620661076136, 827.8436860741034, 328),
(15649, 128, 'Sterrina v. 1 (Fin)', 829.494146614805, 834.5738556753095, 328),
(15650, 129, 'Torrada v. 1 [Sterrina v. 1]', 840.4320420458063, 847.1020955560712, 328),
(15651, 130, 'Torrada v. 2 [Cobertantza v. 1]', 847.5547933043779, 852.6112342959743, 328),
(15652, 131, 'Torrada v. 3 [Cobertantza v. 2]', 853.2242624968063, 858.866315820307, 328),
(15653, 132, 'Torrada v. 4 [Sterrina v. 2]', 860.1395282374198, 866.6681165513859, 328),
(15654, 133, 'Torrada v. 1 [Sterrina v. 2]', 870.6547693099725, 875.6710785908843, 328),
(15655, 134, 'Torrada v. 2 [Cobertantza v. 2] (Arr)', 875.6710785908843, 881.141176382924, 328),
(15656, 135, 'Torrada v. 3 [Cobertantza v. 1]', 881.7070485683074, 886.9130726738348, 328),
(15657, 136, 'Torrada v. 4 [Sterrina v. 3]', 888.3168322343298, 892.7982232448396, 328),
(15658, 137, 'Sterrina v. 1', 898.7823129513266, 903.0929450538454, 328),
(15659, 138, 'Sterrina v. 2', 905.059086018447, 909.8098950664578, 328),
(15660, 139, 'Sterrina v. 3', 911.0128628934839, 914.7511177538121, 328),
(15661, 140, 'Sterrina v. 4', 915.5919017189378, 919.9651802807272, 328),
(15662, 141, 'Sterrina v. 5', 921.2069535215282, 925.323336514591, 328),
(15663, 142, 'Sterrina v. 6', 926.590606576256, 930.7819647189457, 328),
(15664, 143, 'Sterrina v. 7', 931.5580729944463, 935.046801549866, 328),
(15665, 144, 'Sterrina v. 8', 935.046801549866, 939.6153072236343, 328),
(15666, 145, 'Torrada v. 1 [Sterrina v. 1]', 952.0989258145466, 956.7224237154236, 328),
(15667, 146, 'Torrada v. 2 [Cobertantza v. 1]', 958.4594177792997, 963.5149820774305, 328),
(15668, 147, 'Torrada v. 3 [Cobertantza v. 2]', 964.2846227839686, 970.5892217767735, 328),
(15669, 148, 'Torrada v. 1 [Sterrina v. 2]', 981.1344426546356, 985.8334324205468, 328),
(15670, 149, 'Torrada v. 2 [Cobertantza v. 2] (Arr)', 986.9583066036246, 991.5128668714237, 328),
(15671, 150, 'Torrada v. 3 [Cobertantza v. 1]', 991.92352394475, 996.3660868289146, 328),
(15672, 151, 'Sterrina v. Crai', 1011.9731346033437, 1026.4387508882116, 328),
(15673, 152, 'Sterrina v. 1', 1027.6459448836963, 1031.6134042118372, 328),
(15674, 153, 'Sterrina v. 2', 1032.5501870101787, 1038.1873886531102, 328),
(15675, 154, 'Sterrina v. 3', 1039.194319527579, 1043.2780304654293, 328),
(15676, 155, 'Sterrina v. 4', 1044.6078301010803, 1048.3369433522753, 328),
(15677, 156, 'Sterrina v. 5', 1049.3682525932418, 1054.1608073012642, 328),
(15678, 157, 'Sterrina v. 6', 1055.4709536372427, 1058.7153675690633, 328),
(15679, 158, 'Sterrina v. 7', 1059.4246843320811, 1062.7410567807667, 328),
(15680, 159, 'Sterrina v. 8', 1062.7410567807667, 1068.9567818304715, 328),
(15681, 160, 'Torrada v. 1 [Sterrina v. 1]', 1076.9622514482871, 1080.2914661389598, 328),
(15682, 161, 'Torrada v. 2 [Cobertantza v. 1]', 1081.1265428775498, 1084.896959427613, 328),
(15683, 162, 'Torrada v. 3 [Cobertantza v. 2]', 1085.2871471684648, 1090.3935755934986, 328),
(15684, 163, 'Torrada v. 1 [Sterrina v. 2]', 1099.9585710071615, 1103.614260567376, 328),
(15685, 164, 'Torrada v. 2 [Cobertantza v. 2]', 1104.3403743086214, 1108.1977363723183, 328),
(15686, 165, 'Torrada v. 3 [Cobertantza v. 1]', 1108.3580668248437, 1114.903321769112, 328),
(15687, 166, 'Sterrina v. 1', 1126.737618938784, 1133.0411716640542, 328),
(15688, 167, 'Sterrina v. 2', 1133.9277047544883, 1140.3224997944994, 328),
(15689, 168, 'Sterrina v. 3', 1141.2731822132953, 1146.1077713942138, 328),
(15690, 169, 'Sterrina v. 4', 1147.0198538455818, 1153.6832175510451, 328),
(15691, 170, 'Sterrina v. 5', 1155.9583304214989, 1162.1465167338777, 328),
(15692, 171, 'Sterrina v. 6', 1162.1465167338777, 1167.6295547903421, 328),
(15693, 172, 'Sterrina v. 7', 1168.7235743487502, 1173.1845334101893, 328),
(15694, 173, 'Sterrina v. 8', 1173.8994392870306, 1182.4853468337426, 328),
(15695, 174, 'Sterrina v. 1 (Fin)', 1182.4853468337426, 1186.7451772404124, 328),
(15696, 175, 'Torrada v. 1 [Sterrina v. 1]', 1193.9876493509248, 1198.4955440422095, 328),
(15697, 176, 'Torrada v. 2 [Cobertantza v. 1]', 1198.4955440422095, 1204.1098441928482, 328),
(15698, 177, 'Torrada v. 3 [Cobertantza v. 2]', 1204.8336602774966, 1209.4314564995254, 328),
(15699, 178, 'Torrada v. 4 [Sterrina v. 2]', 1210.4207667216294, 1215.852639827898, 328),
(15700, 179, 'Torrada v. 1 [Sterrina v. 2]', 1221.002251434618, 1225.6553436191869, 328),
(15701, 180, 'Torrada v. 2 [Cobertantza v. 2] (Arr)', 1225.6553436191869, 1231.4932583317257, 328),
(15702, 181, 'Torrada v. 3 [Cobertantza v. 1]', 1231.9836808923912, 1237.287525140135, 328),
(15703, 182, 'Torrada v. 4 [Sterrina v. 3]', 1237.8816909347875, 1242.870797369251, 328),
(15704, 183, 'Sterrina v. 1', 1251.3229070182638, 1260.7198943569636, 328),
(15705, 184, 'Sterrina v. 2', 1261.8799323369994, 1268.251369041876, 328),
(15706, 185, 'Sterrina v. 3', 1269.2043598991165, 1274.8782973230852, 328),
(15707, 186, 'Sterrina v. 4', 1275.6249465473145, 1280.7547322084454, 328),
(15708, 187, 'Sterrina v. 5', 1281.5658156741615, 1286.4134540622792, 328),
(15709, 188, 'Sterrina v. 6', 1287.2245375279956, 1293.5424866542573, 328),
(15710, 189, 'Sterrina v. 7', 1294.410157338512, 1303.9783016718427, 328),
(15711, 190, 'Sterrina v. 1 (Fin)', 1304.6950731066615, 1311.3570105993256, 328),
(15712, 191, 'Torrada v. 1 [Sterrina v. 1]', 1315.4108892697477, 1320.2029331428807, 328),
(15713, 192, 'Torrada v. 2 [Cobertantza v. 1]', 1320.2029331428807, 1325.0647183356236, 328),
(15714, 193, 'Torrada v. 3 [Cobertantza v. 2]', 1325.668315333365, 1332.7794424630026, 328),
(15715, 194, 'Torrada v. 4 [Sterrina v. 2]', 1333.164914631669, 1338.7293244545951, 328),
(15716, 195, 'Torrada v. 1 [Sterrina v. 2]', 1342.8224665955272, 1347.4386246463278, 328),
(15717, 196, 'Torrada v. 2 [Cobertantza v. 2] (Arr)', 1347.655542317391, 1352.1165013788216, 328),
(15718, 197, 'Torrada v. 3 [Cobertantza v. 1]', 1352.6589576385154, 1357.3011868568835, 328),
(15719, 198, 'Torrada v. 4 [Sterrina v. 3]', 1357.8481966360864, 1364.6224387578063, 328),
(15720, 1, 'Intervento Bàsciu e contra', 14.784813316473633, 27.609518530960393, 329),
(15721, 2, 'Intervento Bàsciu e contra', 41.928040810918986, 52.97197941866221, 329),
(15722, 3, 'Intervento Bàsciu e contra', 100.10099735253274, 111.18402564270072, 329),
(15723, 4, 'Intervento Bàsciu e contra', 126.41183590066112, 137.2009355117907, 329),
(15724, 5, 'Intervento Bàsciu e contra', 151.34914738105184, 164.21671196482723, 329),
(15725, 6, 'Intervento Bàsciu e contra', 197.97544813182748, 208.99109334062464, 329),
(15726, 7, 'Intervento Bàsciu e contra', 219.54768406425995, 230.50849848521756, 329),
(15727, 8, 'Intervento Bàsciu e contra', 241.35503950173955, 251.74822510868498, 329),
(15728, 9, 'Intervento Bàsciu e contra', 298.01504617205967, 309.2064511764752, 329),
(15729, 10, 'Intervento Bàsciu e contra', 325.08277785777193, 336.38739027847083, 329),
(15730, 11, 'Intervento Bàsciu e contra', 409.530454130077, 421.7650927408547, 329),
(15731, 12, 'Intervento Bàsciu e contra', 438.42762502013306, 450.75464680358044, 329),
(15732, 13, 'Intervento Bàsciu e contra', 464.9907417173947, 476.7655987749146, 329),
(15733, 14, 'Intervento Bàsciu e contra', 519.8726137411804, 530.7893554049101, 329),
(15734, 15, 'Intervento Bàsciu e contra', 545.9440897120152, 557.2301240224806, 329),
(15735, 16, 'Intervento Bàsciu e contra', 572.6045765745971, 583.9289383097971, 329),
(15736, 17, 'Intervento Bàsciu e contra', 620.0929025473544, 631.2150280127637, 329),
(15737, 18, 'Intervento Bàsciu e contra', 664.9604430907484, 674.6368574608049, 329),
(15738, 19, 'Intervento Bàsciu e contra', 710.4557428918545, 721.9015048634996, 329),
(15739, 20, 'Intervento Bàsciu e contra', 738.5965961741108, 749.4979067585821, 329),
(15740, 21, 'Intervento Bàsciu e contra', 766.8583423664059, 778.1646169816061, 329),
(15741, 22, 'Intervento Bàsciu e contra', 827.6079059968604, 840.1302435469352, 329),
(15742, 23, 'Intervento Bàsciu e contra', 857.8760394958861, 869.8944666984287, 329),
(15743, 24, 'Intervento Bàsciu e contra', 886.541210898501, 898.0256073827135, 329),
(15744, 25, 'Intervento Bàsciu e contra', 939.3598382496153, 950.8224767798428, 329),
(15745, 26, 'Intervento Bàsciu e contra', 969.0177531180325, 980.5558961471423, 329),
(15746, 27, 'Intervento Bàsciu e contra', 996.4495599286265, 1007.9261447045394, 329),
(15747, 28, 'Intervento Bàsciu e contra', 1015.0189920593866, 1026.4387508882116, 329),
(15748, 29, 'Intervento Bàsciu e contra', 1065.7690351861452, 1076.3770860616864, 329),
(15749, 30, 'Intervento Bàsciu e contra', 1089.4368765279432, 1099.7698964559772, 329),
(15750, 31, 'Intervento Bàsciu e contra', 1111.791024749503, 1122.6054367999964, 329),
(15751, 32, 'Intervento Bàsciu e contra', 1181.7480307248163, 1193.6194225924257, 329),
(15752, 33, 'Intervento Bàsciu e contra', 1209.5209682130892, 1220.5212600770421, 329),
(15753, 34, 'Intervento Bàsciu e contra', 1236.3726955903849, 1247.5015180863054, 329),
(15754, 35, 'Intervento Bàsciu e contra', 1302.6579332392814, 1314.9785925857793, 329),
(15755, 36, 'Intervento Bàsciu e contra', 1330.2188708241476, 1342.2188695977861, 329),
(15756, 37, 'Intervento Bàsciu e contra', 1356.783680334501, 1368.6881586560296, 329),
(15757, 1, 'Torrada n. 1', 0.7494521314277557, 27.609518530960393, 330),
(15758, 2, 'Torrada n. 2', 27.835867405113717, 52.97197941866221, 330),
(15759, 3, 'Torrada n. 1', 111.7530181297789, 136.91714994740417, 330),
(15760, 4, 'Torrada n. 2', 136.91714994740417, 164.21671196482723, 330),
(15761, 5, 'Torrada n. 1', 209.1419925900602, 230.50849848521756, 330),
(15762, 6, 'Torrada n. 2', 230.50849848521756, 251.74822510868498, 330),
(15763, 7, 'Torrada n. 1', 309.80018842409606, 336.5670215323385, 330),
(15764, 8, 'Torrada n. 2', 336.5670215323385, 361.5188544586748, 330),
(15765, 9, 'Torrada n. 1', 422.31210252005866, 450.75464680358044, 330),
(15766, 10, 'Torrada n. 2', 451.1696197395283, 476.7655987749146, 330),
(15767, 11, 'Torrada n. 1', 531.7648104648326, 556.9756391061612, 330),
(15768, 12, 'Torrada n. 2', 556.9756391061612, 583.9289383097971, 330),
(15769, 13, 'Torrada n. 1', 631.2150280127637, 652.8399038790013, 330),
(15770, 14, 'Torrada n. 2', 652.8399038790013, 674.6368574608049, 330),
(15771, 15, 'Torrada n. 1', 722.41099116559, 750.1962532323688, 330),
(15772, 16, 'Torrada n. 2', 750.1962532323688, 778.1646169816061, 330),
(15773, 17, 'Torrada n. 1', 840.4320420458063, 870.6547693099725, 330),
(15774, 18, 'Torrada n. 2', 870.6547693099725, 898.0256073827135, 330),
(15775, 19, 'Torrada n. 1', 952.0989258145466, 980.5558961471423, 330),
(15776, 20, 'Torrada n. 2', 981.1344426546356, 1007.0932733061862, 330),
(15777, 21, 'Torrada n. 1', 1076.3770860616864, 1099.7698964559772, 330),
(15778, 22, 'Torrada n. 2', 1099.9585710071615, 1122.6054367999964, 330),
(15779, 23, 'Torrada n. 1', 1193.9876493509248, 1220.5212600770421, 330),
(15780, 24, 'Torrada n. 2', 1221.002251434618, 1247.5015180863054, 330),
(15781, 25, 'Torrada n. 1', 1315.4108892697477, 1342.2188695977861, 330),
(15782, 26, 'Torrada n. 2', 1342.8224665955272, 1368.6881586560296, 330),
(15783, 1, 'Cobertantza', 0.7494521314277557, 52.97197941866221, 331),
(15784, 2, 'Sterrina', 56.095764487027395, 111.18402564270072, 331),
(15785, 3, 'Cobertantza', 111.7530181297789, 164.21671196482723, 331),
(15786, 4, 'Sterrina', 166.78893679943596, 208.99109334062464, 331),
(15787, 5, 'Cobertantza', 209.1419925900602, 251.74822510868498, 331),
(15788, 6, 'Sterrina', 252.01229879016816, 309.2064511764752, 331),
(15789, 7, 'Cobertantza', 309.80018842409606, 361.5188544586748, 331),
(15790, 8, 'Sterrina', 365.8572078799476, 422.31210252005866, 331),
(15791, 9, 'Cobertantza', 422.31210252005866, 476.7655987749146, 331),
(15792, 10, 'Sterrina', 481.5916355907727, 530.7893554049101, 331),
(15793, 11, 'Cobertantza', 531.7648104648326, 583.9289383097971, 331),
(15794, 12, 'Sterrina', 586.7771616428936, 631.2150280127637, 331),
(15795, 13, 'Cobertantza', 631.2150280127637, 674.6368574608049, 331),
(15796, 14, 'Sterrina', 676.4640070636219, 721.9015048634996, 331),
(15797, 15, 'Cobertantza', 722.41099116559, 778.7811395025153, 331),
(15798, 16, 'Sterrina', 779.5356357496933, 840.1302435469352, 331),
(15799, 17, 'Cobertantza', 840.4320420458063, 898.0256073827135, 331),
(15800, 18, 'Sterrina', 898.7823129513266, 952.0989258145466, 331),
(15801, 19, 'Cobertantza', 952.0989258145466, 1007.9261447045394, 331),
(15802, 20, 'Sterrina', 1027.6459448836963, 1076.3770860616864, 331),
(15803, 21, 'Cobertantza', 1076.9622514482871, 1122.6054367999964, 331),
(15804, 22, 'Sterrina', 1126.737618938784, 1193.6194225924257, 331),
(15805, 23, 'Cobertantza', 1193.9876493509248, 1247.8693321567578, 331),
(15806, 24, 'Sterrina', 1251.3229070182638, 1314.9785925857793, 331),
(15807, 25, 'Cobertantza', 1315.4108892697477, 1368.6881586560296, 331),
(15808, 1, 'Mutetu longu n. 17', 0, 53.21567768710068, 332),
(15809, 2, 'Mutetu longu n. 18', 56.095764487027395, 156.96975216528665, 332),
(15810, 3, 'Mutetu longu n. 19', 166.78893679943596, 251.74822510868498, 332),
(15811, 4, 'Mutetu longu n. 20', 252.01229879016816, 361.5188544586748, 332),
(15812, 5, 'Mutetu longu n. 21', 365.8572078799476, 476.7655987749146, 332),
(15813, 6, 'Mutetu longu n. 22', 477.2903479640908, 583.9289383097971, 332),
(15814, 7, 'Mutetu longu n. 23', 586.7771616428936, 674.6368574608049, 332),
(15815, 8, 'Mutetu longu n. 24', 676.4640070636219, 778.7811395025153, 332),
(15816, 9, 'Mutetu longu n. 25', 779.5356357496933, 898.0256073827135, 332),
(15817, 10, 'Mutetu longu n. 26', 898.7823129513266, 1007.9261447045394, 332),
(15818, 11, 'Mutetu longu n. 27', 1011.9731346033437, 1122.6054367999964, 332),
(15819, 12, 'Mutetu longu n. 28', 1126.737618938784, 1247.8693321567578, 332),
(15820, 13, 'Mutetu longu n. 29', 1251.3229070182638, 1368.9535302474492, 332),
(15821, 1, 'Poeta improvvisatore n. 1 (Emanuele Saba [Mutetu longu])', 0, 53.21567768710068, 333),
(15822, 2, 'Poeta improvvisatore n. 2 (Antonio Crisioni [Mutetu longu])', 56.095764487027395, 164.21671196482723, 333),
(15823, 3, 'Poeta improvvisatore n. 3 (Giovanni Broi [Mutetu longu])', 166.78893679943596, 251.74822510868498, 333),
(15824, 4, 'Poeta improvvisatore n. 4 (Raffaele Cocco [Mutetu longu])', 252.01229879016816, 361.5188544586748, 333),
(15825, 5, 'Poeta improvvisatore n. 1 (Emanuele Saba [Mutetu longu])', 365.8572078799476, 476.7655987749146, 333),
(15826, 6, 'Poeta improvvisatore n. 2 (Antonio Crisioni [Mutetu longu])', 481.5916355907727, 583.9289383097971, 333),
(15827, 7, 'Poeta improvvisatore n. 3 (Giovanni Broi [Mutetu longu])', 586.7771616428936, 674.6368574608049, 333),
(15828, 8, 'Poeta improvvisatore n. 4 (Raffaele Cocco [Mutetu longu])', 676.4640070636219, 778.7811395025153, 333),
(15829, 9, 'Poeta improvvisatore n. 1 (Emanuele Saba [Mutetu longu])', 779.5356357496933, 898.0256073827135, 333),
(15830, 10, 'Poeta improvvisatore n. 2 (Antonio Crisioni [Mutetu longu])', 898.7823129513266, 1007.9261447045394, 333),
(15831, 11, 'Poeta improvvisatore n. 3 (Giovanni Broi [Mutetu longu])', 1011.9731346033437, 1122.6054367999964, 333),
(15832, 12, 'Poeta improvvisatore n. 4 (Raffaele Cocco [Mutetu longu])', 1126.728187735694, 1247.867460148937, 333),
(15833, 13, 'Poeta improvvisatore n. 1 (Emanuele Saba [Mutetu longu])', 1251.3229070182638, 1368.9535302474492, 333),
(15834, 1, 's', 898.7823129513266, 1368.9535302474492, 335),
(15835, 1, 'Aldo Pittirra (Contra)', 14.784813316473633, 27.609518530960393, 336),
(15836, 2, 'Aldo Pittirra (Contra)', 41.928040810918986, 52.97197941866221, 336),
(15837, 3, 'Aldo Pittirra (Contra)', 100.10099735253274, 111.18402564270072, 336),
(15838, 4, 'Aldo Pittirra (Contra)', 126.41183590066112, 137.2009355117907, 336),
(15839, 5, 'Aldo Pittirra (Contra)', 151.34914738105184, 164.21671196482723, 336),
(15840, 6, 'Aldo Pittirra (Contra)', 197.97544813182748, 208.99109334062464, 336),
(15841, 7, 'Aldo Pittirra (Contra)', 219.54768406425995, 230.50849848521756, 336),
(15842, 8, 'Aldo Pittirra (Contra)', 241.35503950173955, 251.74822510868498, 336),
(15843, 9, 'Aldo Pittirra (Contra)', 298.01504617205967, 309.2064511764752, 336),
(15844, 10, 'Aldo Pittirra (Contra)', 325.08277785777193, 336.38739027847083, 336),
(15845, 11, 'Aldo Pittirra (Contra)', 409.530454130077, 421.7650927408547, 336),
(15846, 12, 'Aldo Pittirra (Contra)', 438.42762502013306, 450.75464680358044, 336),
(15847, 13, 'Aldo Pittirra (Contra)', 464.9907417173947, 476.7655987749146, 336),
(15848, 14, 'Aldo Pittirra (Contra)', 519.8726137411804, 530.7893554049101, 336),
(15849, 15, 'Aldo Pittirra (Contra)', 545.9440897120152, 557.2301240224806, 336),
(15850, 16, 'Aldo Pittirra (Contra)', 572.6045765745971, 583.9289383097971, 336),
(15851, 17, 'Aldo Pittirra (Contra)', 620.0929025473544, 631.2150280127637, 336),
(15852, 18, 'Aldo Pittirra (Contra)', 664.9604430907484, 674.6368574608049, 336),
(15853, 19, 'Aldo Pittirra (Contra)', 710.4557428918545, 721.9015048634996, 336),
(15854, 20, 'Aldo Pittirra (Contra)', 738.5965961741108, 749.4979067585821, 336),
(15855, 21, 'Aldo Pittirra (Contra)', 766.8583423664059, 778.1646169816061, 336),
(15856, 22, 'Aldo Pittirra (Contra)', 827.6079059968604, 840.1302435469352, 336),
(15857, 23, 'Aldo Pittirra (Contra)', 857.8760394958861, 869.8944666984287, 336),
(15858, 24, 'Aldo Pittirra (Contra)', 886.541210898501, 898.0256073827135, 336),
(15859, 25, 'Aldo Pittirra (Contra)', 939.3598382496153, 950.8224767798428, 336),
(15860, 26, 'Aldo Pittirra (Contra)', 969.0177531180325, 980.5558961471423, 336),
(15861, 27, 'Aldo Pittirra (Contra)', 996.4495599286265, 1007.9261447045394, 336),
(15862, 28, 'Aldo Pittirra (Contra)', 1015.0189920593866, 1026.4387508882116, 336),
(15863, 29, 'Aldo Pittirra (Contra)', 1065.7690351861452, 1076.3770860616864, 336),
(15864, 30, 'Aldo Pittirra (Contra)', 1089.4368765279432, 1099.7698964559772, 336),
(15865, 31, 'Aldo Pittirra (Contra)', 1111.791024749503, 1122.6054367999964, 336),
(15866, 32, 'Aldo Pittirra (Contra)', 1181.7480307248163, 1193.6194225924257, 336),
(15867, 33, 'Aldo Pittirra (Contra)', 1209.5209682130892, 1220.5212600770421, 336),
(15868, 34, 'Aldo Pittirra (Contra)', 1236.3726955903849, 1247.5015180863054, 336),
(15869, 35, 'Aldo Pittirra (Contra)', 1302.6579332392814, 1314.9785925857793, 336),
(15870, 36, 'Aldo Pittirra (Contra)', 1330.2188708241476, 1342.2188695977861, 336),
(15871, 37, 'Aldo Pittirra (Contra)', 1356.783680334501, 1368.6881586560296, 336),
(15872, 1, 'Emanuele Saba (Mutetu longu)', 0, 53.21567768710068, 337),
(15873, 2, 'Emanuele Saba (Mutetu longu)', 365.8572078799476, 476.7655987749146, 337),
(15874, 3, 'Emanuele Saba (Mutetu longu)', 779.5356357496933, 898.0256073827135, 337),
(15875, 4, 'Emanuele Saba (Mutetu longu)', 1251.3229070182638, 1368.9535302474492, 337),
(15876, 1, 'Antonio Crisioni (Mutetu longu)', 56.095764487027395, 164.21671196482723, 338),
(15877, 2, 'Antonio Crisioni (Mutetu longu)', 481.5916355907727, 583.9289383097971, 338),
(15878, 3, 'Antonio Crisioni (Mutetu longu)', 898.7823129513266, 1007.9261447045394, 338),
(15879, 1, 'Giovanni Broi (Mutetu longu)', 166.78893679943596, 251.74822510868498, 339),
(15880, 2, 'Giovanni Broi (Mutetu longu)', 586.7771616428936, 674.6368574608049, 339),
(15881, 3, 'Giovanni Broi (Mutetu longu)', 1011.9731346033437, 1122.6054367999964, 339),
(15882, 1, 'Raffaele Cocco (Mutetu longu)', 252.01229879016816, 361.5188544586748, 340),
(15883, 2, 'Raffaele Cocco (Mutetu longu)', 676.4640070636219, 778.7811395025153, 340),
(15884, 3, 'Raffaele Cocco (Mutetu longu)', 1126.728187735694, 1247.867460148937, 340);

-- --------------------------------------------------------

--
-- Table structure for table `logus`
--

CREATE TABLE `logus` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(63) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `descrizione` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logus`
--

INSERT INTO `logus` (`id`, `nome`, `lat`, `lng`, `descrizione`, `created_at`, `updated_at`) VALUES
(1, 'Non precisato', 0, 0, 'Indefinito', '2017-09-21 13:28:05', '2018-02-03 17:40:27'),
(2, 'Bitti, Province of Nuoro, Italy', 40.48052879999999, 9.38873030000002, NULL, '2017-09-22 13:18:09', '2018-02-03 17:41:10'),
(10, 'Bosa, Province of Oristano, Italy', 40.2952312, 8.503665800000022, NULL, '2017-12-23 13:57:25', '2018-01-02 15:34:27'),
(11, 'Gericomio', 41.918373, 12.835534999999936, NULL, '2018-01-28 08:23:18', '2018-03-30 12:18:10'),
(12, 'Matzaco, Mexico', 18.5583275, -98.4911065, NULL, '2018-01-28 08:24:05', '2018-02-03 17:41:03'),
(13, 'Teulada, Province of Cagliari, Italy', 38.9732933, 8.726092699999981, NULL, '2018-02-05 14:25:17', '2018-02-05 14:25:17'),
(14, 'Sinnai, Province of Cagliari, Italy', 39.30287939999999, 9.198013400000036, NULL, '2018-02-26 14:45:30', '2018-03-20 15:03:40'),
(15, 'Tempio Pausania, Province of Olbia-Tempio, Italy', 40.8994485, 9.12347950000003, NULL, '2018-02-26 14:49:51', '2018-03-20 15:03:50'),
(16, 'Sirri, Province of Carbonia-Iglesias, Italy', 39.197149, 8.550558000000024, NULL, '2018-03-13 15:21:05', '2018-03-13 15:21:05'),
(17, 'Corongiu, Province of Carbonia-Iglesias, Italy', 39.2364248, 8.56059920000007, NULL, '2018-03-13 15:21:33', '2018-03-13 15:21:33'),
(18, 'Is Sabas, Province of Carbonia-Iglesias, Italy', 39.1175804, 8.71387900000002, NULL, '2018-03-13 15:22:36', '2018-03-13 15:22:36'),
(19, 'Cagliari', 0, 0, 'Studio Ignazio', '2018-05-07 15:19:02', '2018-05-07 15:19:02');

-- --------------------------------------------------------

--
-- Table structure for table `logus_esec`
--

CREATE TABLE `logus_esec` (
  `id` int(10) UNSIGNED NOT NULL,
  `luogo_id` int(10) UNSIGNED NOT NULL,
  `esecutore_id` int(10) UNSIGNED NOT NULL,
  `descrizione` varchar(1023) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logus_esec`
--

INSERT INTO `logus_esec` (`id`, `luogo_id`, `esecutore_id`, `descrizione`, `created_at`, `updated_at`) VALUES
(2, 11, 1, 'Da bambino', '2018-07-16 13:10:03', '2018-07-16 13:10:03'),
(3, 10, 1, 'Dopo', '2018-07-16 13:12:31', '2018-07-16 13:12:31'),
(4, 14, 1, 'Luogo di morte', '2018-07-16 13:15:15', '2018-07-16 13:15:15'),
(5, 14, 9, 'Luogo di nascita', '2018-07-16 13:28:45', '2018-07-16 13:28:45'),
(6, 16, 9, 'Luogo di morte', '2018-07-16 13:29:01', '2018-07-16 13:29:01'),
(7, 11, 4, NULL, '2018-08-06 13:02:39', '2018-08-06 13:02:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_09_14_150813_create_logu_table', 1),
(4, '2017_09_14_151254_create_esecudori_table', 1),
(5, '2017_09_20_130827_acorradori', 1),
(6, '2017_09_21_151819_create_eventu_table', 1),
(7, '2017_09_22_140044_colletzioni', 2),
(8, '2017_09_24_101345_partecipat', 3),
(9, '2017_09_27_142131_documentus', 4),
(10, '2017_12_27_164746_create_files_table', 5),
(11, '2018_01_04_155036_create_tier_table', 6),
(12, '2018_01_04_155057_create_interval_table', 6),
(13, '2018_01_04_174631_create_acapiu_table', 7),
(14, '2018_04_07_154559_create_queries_table', 8),
(15, '2018_04_21_151344_add_cosa_to_users_table', 9),
(16, '2018_04_21_161042_create_permission_tables', 9),
(17, '2018_07_12_160333_create_acapiu_esec_table', 10),
(18, '2018_07_15_151945_create_logus_esec_table', 11),
(19, '2018_08_13_145728_create__esec_documentu', 12),
(20, '2019_02_04_170418_create_verify_users_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_id`, `model_type`) VALUES
(2, 1, 'App\\User'),
(1, 4, 'App\\User'),
(2, 5, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `partecipant`
--

CREATE TABLE `partecipant` (
  `id` int(10) UNSIGNED NOT NULL,
  `ruolo` varchar(31) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descrizione` varchar(1023) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `evento_id` int(10) UNSIGNED NOT NULL,
  `esecutore_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partecipant`
--

INSERT INTO `partecipant` (`id`, `ruolo`, `descrizione`, `evento_id`, `esecutore_id`, `created_at`, `updated_at`) VALUES
(24, 'Contra', NULL, 1, 1, '2017-10-08 05:21:00', '2017-10-08 05:21:00'),
(29, 'Mescitore', NULL, 3, 5, '2018-02-05 14:10:45', '2018-02-05 14:10:45'),
(30, 'Ghitarra', NULL, 1, 5, '2018-02-13 14:16:18', '2018-02-13 14:16:18'),
(32, 'Buffone', NULL, 2, 4, '2018-03-28 15:34:54', '2018-03-28 15:34:54'),
(33, 'Cantadori', NULL, 4, 1, '2018-04-24 10:38:19', '2018-04-24 10:38:19'),
(34, 'nessuno', 'bello', 5, 4, '2018-05-07 15:30:55', '2018-05-07 15:30:55');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'edit users', 'web', '2018-05-02 07:43:24', '2018-05-02 07:43:24'),
(2, 'delete users', 'web', '2018-05-02 07:43:24', '2018-05-02 07:43:24'),
(3, 'add users', 'web', '2018-05-02 07:43:24', '2018-05-02 07:43:24'),
(4, 'edit rows', 'web', '2018-05-02 07:43:24', '2018-05-02 07:43:24'),
(5, 'delete rows', 'web', '2018-05-02 07:43:24', '2018-05-02 07:43:24'),
(6, 'add rows', 'web', '2018-05-02 07:43:24', '2018-05-02 07:43:24');

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(31) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descrizione` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `query` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` int(10) UNSIGNED NOT NULL,
  `tabella` varchar(31) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`id`, `nome`, `descrizione`, `query`, `tipo`, `tabella`, `created_id`, `created_at`, `updated_at`) VALUES
(7, 'Collezione', 'Una prova bella', '{"condition":"AND","rules":[{"id":"titolo","field":"titolo","type":"string","input":"text","operator":"contains","value":"cantada"},{"id":"collezione_id","field":"collezione_id","type":"subquery","operator":"in","value":{"condition":"AND","rules":[{"id":"nome","field":"nome","type":"string","input":"text","operator":"contains","value":"ondo"}],"subquery_id":"builder_subquery_0"},"table":"ColletzioniModel"}]}', 0, 'documentus', 1, '2018-04-19 13:56:25', '2018-04-20 13:19:22'),
(8, 'Annotazioni - Pastore', 'Una prova', '{"condition":"AND","rules":[{"id":"tier_id","field":"tier_id","type":"subquery","operator":"in","value":{"condition":"AND","rules":[{"id":"documento_id","field":"documento_id","type":"subquery","operator":"in","value":{"condition":"AND","rules":[{"id":"evento_id","field":"evento_id","type":"subquery","operator":"in","value":{"condition":"AND","rules":[{"id":"luogo_id","field":"luogo_id","type":"subquery","operator":"in","value":{"condition":"AND","rules":[{"id":"nome","field":"nome","type":"string","input":"text","operator":"contains","value":"Cagliari"}],"subquery_id":"builder_subquery_1_subquery_0_subquery_0_subquery_0"},"table":"LoguModel"},{"id":"ruolo","field":"ruolo","type":"string","input":"text","operator":"equal","value":"cantadori"}],"subquery_id":"builder_subquery_1_subquery_0_subquery_0"},"table":"EventuModel"}],"subquery_id":"builder_subquery_1_subquery_0"},"table":"DocumentuModel"}],"subquery_id":"builder_subquery_1"},"table":"TierModel"},{"id":"nota","field":"nota","type":"string","input":"text","operator":"contains","value":"pastori"}]}', 0, 'intervals', 1, '2018-04-24 10:41:55', '2018-04-24 10:41:55'),
(9, 'Prova 2', 'Mutetadas cun Saba fundadori', '{"condition":"AND","rules":[{"id":"seq","field":"seq","type":"integer","input":"text","operator":"equal","value":"1"},{"id":"nota","field":"nota","type":"string","input":"text","operator":"contains","value":"Saba"},{"id":"tier_id","field":"tier_id","type":"subquery","operator":"in","value":{"condition":"AND","rules":[{"id":"nome","field":"nome","type":"string","input":"text","operator":"contains","value":"ciclo"},{"id":"nome","field":"nome","type":"string","input":"text","operator":"contains","value":"mutetada"}],"subquery_id":"builder_subquery_0"},"table":"TierModel"}]}', 0, 'intervals', 1, '2018-08-01 08:15:47', '2018-08-01 08:15:47'),
(10, 'Annotazione', NULL, '{"condition":"AND","rules":[{"id":"agenti","field":"agenti","type":"subquery","operator":"in","value":{"condition":"AND","rules":[{"id":"esecutore_id","field":"esecutore_id","type":"subquery","operator":"in","value":{"condition":"AND","rules":[{"id":"cognome","field":"cognome","type":"string","input":"text","operator":"equal","value":"Tiddia"}],"subquery_id":"builder_subquery_0_subquery_0"},"table":"EsecudoriModel"}],"subquery_id":"builder_subquery_0"},"table":"EsecDocumentuModel"},{"id":"tier","field":"tier","type":"subquery","operator":"in","value":{"condition":"AND","rules":[{"id":"annotazione","field":"annotazione","type":"subquery","operator":"in","value":{"condition":"AND","rules":[{"id":"nota","field":"nota","type":"string","input":"text","operator":"contains","value":"ori"}],"subquery_id":"builder_subquery_1_subquery_0"},"table":"IntervalModel"}],"subquery_id":"builder_subquery_1"},"table":"TierModel"}]}', 0, 'documentus', 1, '2018-11-10 16:39:47', '2018-11-10 16:39:47');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'editor', 'web', '2018-05-02 07:43:24', '2018-05-02 07:43:24'),
(2, 'super-admin', 'web', '2018-05-02 07:43:24', '2018-05-02 07:43:24');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(4, 1),
(5, 1),
(6, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tiers`
--

CREATE TABLE `tiers` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descrizione` varchar(1023) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inizio` double UNSIGNED NOT NULL,
  `fine` double UNSIGNED NOT NULL,
  `documento_id` int(10) UNSIGNED NOT NULL,
  `esecutore_id` int(10) UNSIGNED DEFAULT NULL,
  `created_id` int(10) UNSIGNED NOT NULL,
  `updated_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tiers`
--

INSERT INTO `tiers` (`id`, `nome`, `descrizione`, `inizio`, `fine`, `documento_id`, `esecutore_id`, `created_id`, `updated_id`, `created_at`, `updated_at`) VALUES
(75, 'tierV', NULL, 0, 240.83619047619047, 8, NULL, 1, 1, '2018-07-17 13:35:22', '2018-07-17 13:35:22'),
(76, 'tierE', NULL, 0, 240.83619047619047, 8, NULL, 1, 1, '2018-07-17 13:35:22', '2018-07-17 13:35:22'),
(77, 'tierEM', NULL, 0, 240.83619047619047, 8, NULL, 1, 1, '2018-07-17 13:35:22', '2018-07-17 13:35:22'),
(78, 'tierTXT', NULL, 0, 240.83619047619047, 8, NULL, 1, 1, '2018-07-17 13:35:22', '2018-07-17 13:35:22'),
(79, 'tierRV', NULL, 0, 240.83619047619047, 8, NULL, 1, 1, '2018-07-17 13:35:23', '2018-07-17 13:35:23'),
(80, 'tierTIP', NULL, 0, 240.83619047619047, 8, NULL, 1, 1, '2018-07-17 13:35:23', '2018-07-17 13:35:23'),
(81, 'tierNOTE', NULL, 0, 240.83619047619047, 8, NULL, 1, 1, '2018-07-17 13:35:23', '2018-07-17 13:35:23'),
(313, 'Verso_MutetuLongu', NULL, 0, 1368.9535302474492, 10, NULL, 1, 1, '2018-07-25 14:11:20', '2018-07-25 14:11:20'),
(314, 'Accompagnamento_BasciuContra', NULL, 0, 1368.9535302474492, 10, NULL, 1, 1, '2018-07-25 14:11:21', '2018-07-25 14:11:21'),
(315, 'SezioneSub1_MutetuLongu', NULL, 0, 1368.9535302474492, 10, NULL, 1, 1, '2018-07-25 14:11:21', '2018-07-25 14:11:21'),
(316, 'Sezione_MutetuLongu', NULL, 0, 1368.9535302474492, 10, NULL, 1, 1, '2018-07-25 14:11:21', '2018-07-25 14:11:21'),
(317, 'Ordine_Mutetada', NULL, 0, 1368.9535302474492, 10, NULL, 1, 1, '2018-07-25 14:11:21', '2018-07-25 14:11:21'),
(318, 'Ciclo_PoetiImprovvisatori_Mutetada', NULL, 0, 1368.9535302474492, 10, NULL, 1, 1, '2018-07-25 14:11:21', '2018-07-25 14:11:21'),
(319, 'Modo_Versu', NULL, 0, 1368.9535302474492, 10, NULL, 1, 1, '2018-07-25 14:11:21', '2018-07-25 14:11:21'),
(320, 'Fasi_Mutetada', NULL, 0, 1368.9535302474492, 10, NULL, 1, 1, '2018-07-25 14:11:21', '2018-07-25 14:11:21'),
(321, 'Note', NULL, 0, 1368.9535302474492, 10, NULL, 1, 1, '2018-07-25 14:11:21', '2018-07-25 14:11:21'),
(322, 'Doc', NULL, 0, 1368.9535302474492, 10, NULL, 1, 1, '2018-07-25 14:11:22', '2018-07-25 14:11:22'),
(323, 'Accompagnatore_V_Contra_Aldo Pittirra_TE', NULL, 0, 1368.9535302474492, 10, 10, 1, 1, '2018-07-25 14:11:22', '2018-07-25 14:11:22'),
(324, 'PoetaImprovvisatore_Emanuele Saba_TE', NULL, 0, 1368.9535302474492, 10, NULL, 1, 1, '2018-07-25 14:11:22', '2018-07-25 14:11:22'),
(325, 'PoetaImprovvisatore_Antonio Crisioni_TE', NULL, 0, 1368.9535302474492, 10, NULL, 1, 1, '2018-07-25 14:11:22', '2018-07-25 14:11:22'),
(326, 'PoetaImprovvisatore_Giovanni Broi_TE', NULL, 0, 1368.9535302474492, 10, NULL, 1, 1, '2018-07-25 14:11:22', '2018-07-25 14:11:22'),
(327, 'PoetaImprovvisatore_Raffaele Cocco_TE', NULL, 0, 1368.9535302474492, 10, 11, 1, 1, '2018-07-25 14:11:22', '2018-07-25 14:11:22'),
(328, 'Verso_MutetuLongu', NULL, 0, 1368.9535302474492, 1, NULL, 1, 1, '2018-08-01 12:16:48', '2018-08-01 12:16:48'),
(329, 'Accompagnamento_BasciuContra', NULL, 0, 1368.9535302474492, 1, NULL, 1, 1, '2018-08-01 12:16:49', '2018-08-01 12:16:49'),
(330, 'SezioneSub1_MutetuLongu', NULL, 0, 1368.9535302474492, 1, NULL, 1, 1, '2018-08-01 12:16:49', '2018-08-01 12:16:49'),
(331, 'Sezione_MutetuLongu', NULL, 0, 1368.9535302474492, 1, NULL, 1, 1, '2018-08-01 12:16:49', '2018-08-01 12:16:49'),
(332, 'Ordine_Mutetada', NULL, 0, 1368.9535302474492, 1, NULL, 1, 1, '2018-08-01 12:16:49', '2018-08-01 12:16:49'),
(333, 'Ciclo_PoetiImprovvisatori_Mutetada', NULL, 0, 1368.9535302474492, 1, NULL, 1, 1, '2018-08-01 12:16:49', '2018-08-01 12:16:49'),
(334, 'Modo_Versu', NULL, 0, 1368.9535302474492, 1, NULL, 1, 1, '2018-08-01 12:16:50', '2018-08-01 12:16:50'),
(335, 'Fasi_Mutetada', NULL, 0, 1368.9535302474492, 1, NULL, 1, 1, '2018-08-01 12:16:50', '2018-08-01 12:16:50'),
(336, 'Accompagnatore_V_Contra_Aldo Pittirra_TE', NULL, 0, 1368.9535302474492, 1, 10, 1, 1, '2018-08-01 12:16:50', '2018-08-01 12:16:50'),
(337, 'PoetaImprovvisatore_Emanuele Saba_TE', NULL, 0, 1368.9535302474492, 1, NULL, 1, 1, '2018-08-01 12:16:50', '2018-08-01 12:16:50'),
(338, 'PoetaImprovvisatore_Antonio Crisioni_TE', NULL, 0, 1368.9535302474492, 1, NULL, 1, 1, '2018-08-01 12:16:50', '2018-08-01 12:16:50'),
(339, 'PoetaImprovvisatore_Giovanni Broi_TE', NULL, 0, 1368.9535302474492, 1, NULL, 1, 1, '2018-08-01 12:16:50', '2018-08-01 12:16:50'),
(340, 'PoetaImprovvisatore_Raffaele Cocco_TE', NULL, 0, 1368.9535302474492, 1, 11, 1, 1, '2018-08-01 12:16:50', '2018-08-01 12:16:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `verified`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Franciscu', 'francesco.capuzzi@gmail.com', '$2y$10$PLt8onuJ/ScywhJSsvt3weiABRmkJmmqqGvStVxP6IULEr68G8jPG', 1, 'bqsrUgos7ebKXXNEjExj12PhtyK0ofcItVKmWn5Q9CdOcubE6WAdztYQfzZq', '2017-09-26 11:31:30', '2017-09-26 11:31:30'),
(4, 'Giuannix', 'sgiuanni@giuanni.it', '$2y$10$22lWc7i9IpJF/9FSRx5bQOdlebl6ph95fVTui3FCsOD8xBkWP6rBK', 0, 'wFCzXTWlqgh4MYhom5u7o1IWmHkIH96VvFvOOza9lWAxMQxwTgZK2J8YCNWQ', '2018-05-02 07:53:35', '2018-06-23 13:33:51'),
(5, 'prova', 'admin@admin.it', '$2y$10$6DzLn7f407MheihgXcPv1OmibzyZ.rJ4/mVybCWFm3dqL6QMg4XfK', 1, 'QRJrxLN7n9DYvquiwZvAq9m5ysIF6TrvuxrettKEyT4X4L8xc12i4UYYku3P', '2018-05-07 14:12:42', '2018-05-07 14:12:42'),
(37, 'Gigi', 'f.capuzzi@tiscali.it', '$2y$10$j8lRBqeSHr/cc5I8p2gUouszJEp.kymDkBoWf.vgacSz5WTpTlgAi', 1, 'vBpkUakOwp5LyeJDE8vd5Nj0iAOjgguKSoNQZX9ebxa2npPQ5hyt6xN5hfeb', '2019-02-18 13:49:21', '2019-02-18 13:50:22');

-- --------------------------------------------------------

--
-- Table structure for table `verify_users`
--

CREATE TABLE `verify_users` (
  `user_id` int(11) NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `verify_users`
--

INSERT INTO `verify_users` (`user_id`, `token`, `created_at`, `updated_at`) VALUES
(7, '89wzIU0ZskYLUIvd0ND0z3zGBjUuEDQdoMEVF71r', '2019-02-17 13:52:48', '2019-02-17 13:52:48'),
(8, 'QJZ9OTCqBYVLa6T0ajL79ouudJ5WAVZDWAmmyQpu', '2019-02-17 13:54:54', '2019-02-17 13:54:54'),
(9, '1vRwVTRDFGqVygB5ipDj7Hw8wSAQYNwnskgczs84', '2019-02-17 13:59:23', '2019-02-17 13:59:23'),
(10, 'sbNV4a2xyZtYtJNjB8kpHhHWdGNsfTpN34rw4uLQ', '2019-02-17 13:59:59', '2019-02-17 13:59:59'),
(11, 'xpn08ol2FcVIqqSZOKFTafErpbUzl1pJJUyfy5wq', '2019-02-17 14:08:42', '2019-02-17 14:08:42'),
(12, 'nXVtosHYHLmivRtTLE6khKYmxrbzjPjz1E1h2tkx', '2019-02-17 14:10:31', '2019-02-17 14:10:31'),
(13, 'UoxXLYQmzAMYqRjkeg3SLOOVivEgEqZ9NSjJv0xc', '2019-02-17 14:48:22', '2019-02-17 14:48:22'),
(14, 'pwDxbhK4aRESGTa90Xk8iwMlnsYo93VXpbd60NkP', '2019-02-17 14:53:15', '2019-02-17 14:53:15'),
(15, 'd3X6KI5PTfZK4dsRCnw2Um3wkrMQ8wg2nnD6OGbt', '2019-02-17 15:01:51', '2019-02-17 15:01:51'),
(16, 'G7i09OT8EXfydmcplScPnVTB9SvNqVHlbazMkUq5', '2019-02-17 15:03:56', '2019-02-17 15:03:56'),
(17, 'OTydkwZepQTnxsRalCDtsQqRPz3OFXeDFYqL7eeA', '2019-02-17 15:09:45', '2019-02-17 15:09:45'),
(18, 'bUEtyw2a6k2C8Y1aolHODfQPlkE0pOd7hJiiZB7P', '2019-02-18 13:08:32', '2019-02-18 13:08:32'),
(19, 'TJnOy8uI8EeWzCOZF1C63DafbtRfJBYvkllVlutb', '2019-02-18 13:13:21', '2019-02-18 13:13:21'),
(20, 'yMv9nYuNzZgPfRfnLkcac8AuZ0hRbKfcj8NYzaXV', '2019-02-18 13:19:01', '2019-02-18 13:19:01'),
(21, 'Gk33yGTlMBajuLo4yGlY9WIouTuh5QhEZTzhIGzf', '2019-02-18 13:21:23', '2019-02-18 13:21:23'),
(22, '8JVo4gobN5WN4odJyDM9nfYUQcZMdoCAaJwLvL8k', '2019-02-18 13:23:03', '2019-02-18 13:23:03'),
(23, 'nOUYllI5mmXUi2qi4RfADI1oJu2kSt3BmCRRoCKs', '2019-02-18 13:25:07', '2019-02-18 13:25:07'),
(24, 'lUDlltWCcBFFe90LFrieOd9z1Twv8WTNEXe5qisO', '2019-02-18 13:26:20', '2019-02-18 13:26:20'),
(25, 'Ir1u8sBKhP5GwFdvrCwmdkYptbphgXqmOGdY05BZ', '2019-02-18 13:27:51', '2019-02-18 13:27:51'),
(26, '6728VmZLEsIgGsqxkGyDcAOQxgJ2MXnGcV90eRV2', '2019-02-18 13:28:24', '2019-02-18 13:28:24'),
(27, 'lXHiAG8zCOPWZ7z8y5ioZbwsnJkdiSNVIFH2c9JX', '2019-02-18 13:30:41', '2019-02-18 13:30:41'),
(28, '7oSrC3T3zLjlGZR651PpBQz1rEgXWT8D5bbvCSLB', '2019-02-18 13:36:13', '2019-02-18 13:36:13'),
(29, 'RO0ZGmdlInk5VjaNa28S4RNShFxz6YEQtxEL8Wmy', '2019-02-18 13:36:57', '2019-02-18 13:36:57'),
(30, 'znH3uGs1IFNLgYlZYFrpjWXU2f7FQz27Ke9X8e0O', '2019-02-18 13:37:23', '2019-02-18 13:37:23'),
(31, 'KebA7FSnunAUK5SBTqTy1kPMR9ThGwOCwMW8w9pj', '2019-02-18 13:38:08', '2019-02-18 13:38:08'),
(32, 'cloLJK0BPk6SDEuda1CyGyXAR4Eb1XKCMIeHCBvc', '2019-02-18 13:40:00', '2019-02-18 13:40:00'),
(33, 'HDfqsuh7l1e8HkBFhxR4lfx3Hsx22TCMRPhFlaxV', '2019-02-18 13:41:20', '2019-02-18 13:41:20'),
(34, 'Zhi7SJal1t6J5jepPOuqrhk4cFfc1yVmBLUiwdG8', '2019-02-18 13:43:28', '2019-02-18 13:43:28'),
(35, 'sVourPCZYhCScEwU8kDOgF1z6mWLefG8ZcSiqx5f', '2019-02-18 13:44:54', '2019-02-18 13:44:54'),
(36, 'ZreiwFbYwJWJZO2wOs7YfBiJka73lh14LzXFoy3V', '2019-02-18 13:46:21', '2019-02-18 13:46:21'),
(37, 'DWqy4hcJOjwgslnOn4062xpuJb5mzE27YulKXUzT', '2019-02-18 13:49:21', '2019-02-18 13:49:21'),
(38, 'NgG4yO3hxhx5zouynPjFpNpI6sfxGRC4QRMELXkW', '2019-02-18 13:51:52', '2019-02-18 13:51:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acapius`
--
ALTER TABLE `acapius`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acapiu_de_id_foreign` (`de_id`),
  ADD KEY `acapiu_a_id_foreign` (`a_id`);

--
-- Indexes for table `acapius_esec`
--
ALTER TABLE `acapius_esec`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acapius_esec_de_id_foreign` (`de_id`),
  ADD KEY `acapius_esec_a_id_foreign` (`a_id`);

--
-- Indexes for table `acorradoris`
--
ALTER TABLE `acorradoris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acorradoris_luogo_id_foreign` (`luogo_id`);

--
-- Indexes for table `colletzionis`
--
ALTER TABLE `colletzionis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `colletzionis_luogo_id_foreign` (`luogo_id`);

--
-- Indexes for table `documentus`
--
ALTER TABLE `documentus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documentus_evento_id_foreign` (`evento_id`),
  ADD KEY `documentus_collezione_id_foreign` (`collezione_id`);

--
-- Indexes for table `esecudoris`
--
ALTER TABLE `esecudoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `esec_documentu`
--
ALTER TABLE `esec_documentu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `esec_documentu_documento_id_foreign` (`documento_id`),
  ADD KEY `esec_documentu_esecutore_id_foreign` (`esecutore_id`);

--
-- Indexes for table `eventus`
--
ALTER TABLE `eventus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eventus_luogo_id_foreign` (`luogo_id`),
  ADD KEY `eventus_aggregatore_id_foreign` (`aggregatore_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `files_documentu_id_foreign` (`documento_id`);

--
-- Indexes for table `intervals`
--
ALTER TABLE `intervals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `intervals_tier_id_foreign` (`tier_id`);

--
-- Indexes for table `logus`
--
ALTER TABLE `logus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logus_esec`
--
ALTER TABLE `logus_esec`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logus_esec_luogo_id_foreign` (`luogo_id`),
  ADD KEY `logus_esec_esecutore_id_foreign` (`esecutore_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `partecipant`
--
ALTER TABLE `partecipant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partecipant_evento_id_foreign` (`evento_id`),
  ADD KEY `partecipant_esecutore_id_foreign` (`esecutore_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `queries_created_id_foreign` (`created_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `tiers`
--
ALTER TABLE `tiers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tiers_documentu_id_foreign` (`documento_id`),
  ADD KEY `tiers_created_id_foreign` (`created_id`),
  ADD KEY `tiers_updated_id_foreign` (`updated_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acapius`
--
ALTER TABLE `acapius`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `acapius_esec`
--
ALTER TABLE `acapius_esec`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `acorradoris`
--
ALTER TABLE `acorradoris`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `colletzionis`
--
ALTER TABLE `colletzionis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `documentus`
--
ALTER TABLE `documentus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `esecudoris`
--
ALTER TABLE `esecudoris`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `esec_documentu`
--
ALTER TABLE `esec_documentu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `eventus`
--
ALTER TABLE `eventus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `intervals`
--
ALTER TABLE `intervals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15885;
--
-- AUTO_INCREMENT for table `logus`
--
ALTER TABLE `logus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `logus_esec`
--
ALTER TABLE `logus_esec`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `partecipant`
--
ALTER TABLE `partecipant`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tiers`
--
ALTER TABLE `tiers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=341;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `acapius`
--
ALTER TABLE `acapius`
  ADD CONSTRAINT `acapiu_a_id_foreign` FOREIGN KEY (`a_id`) REFERENCES `documentus` (`id`),
  ADD CONSTRAINT `acapiu_de_id_foreign` FOREIGN KEY (`de_id`) REFERENCES `documentus` (`id`);

--
-- Constraints for table `acapius_esec`
--
ALTER TABLE `acapius_esec`
  ADD CONSTRAINT `acapius_esec_a_id_foreign` FOREIGN KEY (`a_id`) REFERENCES `esecudoris` (`id`),
  ADD CONSTRAINT `acapius_esec_de_id_foreign` FOREIGN KEY (`de_id`) REFERENCES `esecudoris` (`id`);

--
-- Constraints for table `acorradoris`
--
ALTER TABLE `acorradoris`
  ADD CONSTRAINT `acorradoris_luogo_id_foreign` FOREIGN KEY (`luogo_id`) REFERENCES `logus` (`id`);

--
-- Constraints for table `colletzionis`
--
ALTER TABLE `colletzionis`
  ADD CONSTRAINT `colletzionis_luogo_id_foreign` FOREIGN KEY (`luogo_id`) REFERENCES `logus` (`id`);

--
-- Constraints for table `documentus`
--
ALTER TABLE `documentus`
  ADD CONSTRAINT `documentus_collezione_id_foreign` FOREIGN KEY (`collezione_id`) REFERENCES `colletzionis` (`id`),
  ADD CONSTRAINT `documentus_evento_id_foreign` FOREIGN KEY (`evento_id`) REFERENCES `eventus` (`id`);

--
-- Constraints for table `esec_documentu`
--
ALTER TABLE `esec_documentu`
  ADD CONSTRAINT `esec_documentu_documento_id_foreign` FOREIGN KEY (`documento_id`) REFERENCES `documentus` (`id`),
  ADD CONSTRAINT `esec_documentu_esecutore_id_foreign` FOREIGN KEY (`esecutore_id`) REFERENCES `esecudoris` (`id`);

--
-- Constraints for table `eventus`
--
ALTER TABLE `eventus`
  ADD CONSTRAINT `eventus_aggregatore_id_foreign` FOREIGN KEY (`aggregatore_id`) REFERENCES `acorradoris` (`id`),
  ADD CONSTRAINT `eventus_luogo_id_foreign` FOREIGN KEY (`luogo_id`) REFERENCES `logus` (`id`);

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_documentu_id_foreign` FOREIGN KEY (`documento_id`) REFERENCES `documentus` (`id`);

--
-- Constraints for table `intervals`
--
ALTER TABLE `intervals`
  ADD CONSTRAINT `intervals_tier_id_foreign` FOREIGN KEY (`tier_id`) REFERENCES `tiers` (`id`);

--
-- Constraints for table `logus_esec`
--
ALTER TABLE `logus_esec`
  ADD CONSTRAINT `logus_esec_esecutore_id_foreign` FOREIGN KEY (`esecutore_id`) REFERENCES `esecudoris` (`id`),
  ADD CONSTRAINT `logus_esec_luogo_id_foreign` FOREIGN KEY (`luogo_id`) REFERENCES `logus` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `partecipant`
--
ALTER TABLE `partecipant`
  ADD CONSTRAINT `partecipant_esecutore_id_foreign` FOREIGN KEY (`esecutore_id`) REFERENCES `esecudoris` (`id`),
  ADD CONSTRAINT `partecipant_evento_id_foreign` FOREIGN KEY (`evento_id`) REFERENCES `eventus` (`id`);

--
-- Constraints for table `queries`
--
ALTER TABLE `queries`
  ADD CONSTRAINT `queries_created_id_foreign` FOREIGN KEY (`created_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tiers`
--
ALTER TABLE `tiers`
  ADD CONSTRAINT `tiers_created_id_foreign` FOREIGN KEY (`created_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tiers_documentu_id_foreign` FOREIGN KEY (`documento_id`) REFERENCES `documentus` (`id`),
  ADD CONSTRAINT `tiers_updated_id_foreign` FOREIGN KEY (`updated_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
