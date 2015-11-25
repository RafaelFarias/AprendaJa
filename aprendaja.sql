-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21-Nov-2015 às 21:00
-- Versão do servidor: 5.5.44
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aprendaja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aulas`
--

CREATE TABLE IF NOT EXISTS `aulas` (
  `id_aula` int(11) NOT NULL,
  `nm_titulo_aula` varchar(100) COLLATE utf8_bin NOT NULL,
  `ds_descricao_aula` text COLLATE utf8_bin NOT NULL,
  `fl_status_aula` enum('A','F','C','S') COLLATE utf8_bin NOT NULL COMMENT 'A = ABERTA; F = FECHADA; C = CONCLUIDA; S = SUSPENDIDA',
  `nr_valor_aula` float NOT NULL,
  `qt_vagas` int(100) NOT NULL,
  `dt_aula` varchar(100) COLLATE utf8_bin NOT NULL,
  `id_professor` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `aulas`
--

INSERT INTO `aulas` (`id_aula`, `nm_titulo_aula`, `ds_descricao_aula`, `fl_status_aula`, `nr_valor_aula`, `qt_vagas`, `dt_aula`, `id_professor`) VALUES
(1, 'PHP Orientado à Objetos', 'jkjkjukjka sasduajkdhaada a dasda', 'A', 500, 15, '21/11/2015', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aula_usuario`
--

CREATE TABLE IF NOT EXISTS `aula_usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_aula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nm_usuario` varchar(100) NOT NULL,
  `ds_email` varchar(100) NOT NULL,
  `nr_senha` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nm_usuario`, `ds_email`, `nr_senha`) VALUES
(2, 'Rogerio Nunes', 'rogerio@gmail.com', '123'),
(3, 'Accacio Valente', 'a@gmail.com', '123'),
(4, '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`id_aula`);

--
-- Indexes for table `aula_usuario`
--
ALTER TABLE `aula_usuario`
  ADD PRIMARY KEY (`id_usuario`,`id_aula`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aulas`
--
ALTER TABLE `aulas`
  MODIFY `id_aula` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
