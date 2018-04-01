-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 25, 2011 at 09:49 
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `guestbook`
--

CREATE TABLE IF NOT EXISTS `guestbook` (
  `id_gb` int(3) NOT NULL AUTO_INCREMENT,
  `tgl` datetime NOT NULL,
  `nama` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `pesan` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_gb`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=183 ;

--
-- Dumping data for table `guestbook`
--

INSERT INTO `guestbook` (`id_gb`, `tgl`, `nama`, `email`, `pesan`) VALUES
(169, '2009-06-28 13:09:40', 'Agus Sumarna', 'sumarna@yahoo.com', 'Halo dunia...!'),
(170, '2009-06-28 14:28:37', 'Asep Ruspayadi', 'asep@yahoo.com', 'Kang agus urang mancing yuuk di bendungan walahar...hehehe'),
(171, '2009-07-02 11:38:39', 'Dedi Ruswandi', 'dedi@yahoo.com', 'Wooi...kapan nech main ke Mts?'),
(172, '2009-07-04 15:24:02', 'Heti Purnamawati', 'heti@yahoo.com', 'Salam kenal juga yach...'),
(173, '2009-07-10 13:03:38', 'nana', 'nana@yahoo.com', 'Lagi latihan Paskibra... '),
(174, '2009-07-10 13:05:06', 'Nindya', 'naila@yahoo.com', 'haloo juga ah :D'),
(175, '2009-07-10 13:06:11', 'Agung Pramono', 'test@yahoo.com', 'Bah....apa pula ini....hahaha'),
(176, '2009-07-10 13:07:01', 'Didi Riyadi', 'didi@yahoo.com', 'yahoooooooo'),
(177, '2010-01-12 00:00:49', 'Naila', 'naila@yahoo.com', 'Halo apa kabar nech?'),
(178, '2010-01-13 00:01:18', 'Ucup', 'ucup@yahoo.com', 'hahaha'),
(179, '2010-01-06 00:01:56', 'Naila ', 'naila@yahoo.com', 'Hai agus apa kabar? :)'),
(180, '2010-01-07 00:02:21', 'Yhana', 'yhana@yahoo.com', 'Kapan nech ke gramedia lagi...heheh'),
(181, '2010-01-14 00:20:48', 'agus sumarna', 'agus@yahoo.com', 'duch, belum ada yang sms nech...huft'),
(182, '2010-01-15 00:21:03', 'Neisya', 'dendi@yahoo.com', 'emm...');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
