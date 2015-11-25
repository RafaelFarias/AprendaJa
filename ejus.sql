-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18-Out-2015 às 05:41
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ejus`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `processo`
--

CREATE TABLE IF NOT EXISTS `processo` (
  `nr_processo` int(11) NOT NULL,
  `dt_inicial` varchar(100) NOT NULL,
  `ds_um` text NOT NULL,
  `ds_dois` text NOT NULL,
  `ds_processo` varchar(250) NOT NULL,
  `fl_processo` enum('A','C') NOT NULL COMMENT 'A = Andamento; C = Concluido',
  `nr_prazo` int(10) NOT NULL,
  `id_processo` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_processo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabela de Processo' AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `processo`
--

INSERT INTO `processo` (`nr_processo`, `dt_inicial`, `ds_um`, `ds_dois`, `ds_processo`, `fl_processo`, `nr_prazo`, `id_processo`) VALUES
(100, '08/15/2015', 'Jessica ', 'Accacio', 'Não quis casar!', 'A', 10, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
