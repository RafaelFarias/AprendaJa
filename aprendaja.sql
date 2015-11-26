-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26-Nov-2015 às 13:07
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

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
  `id_aula` int(11) NOT NULL AUTO_INCREMENT,
  `nm_titulo_aula` varchar(100) COLLATE utf8_bin NOT NULL,
  `ds_descricao_aula` text COLLATE utf8_bin NOT NULL,
  `fl_status_aula` enum('A','F','C','S') COLLATE utf8_bin NOT NULL COMMENT 'A = ABERTA; F = FECHADA; C = CONCLUIDA; S = SUSPENDIDA',
  `nr_valor_aula` float NOT NULL,
  `qt_vagas` int(100) NOT NULL,
  `dt_aula` varchar(100) COLLATE utf8_bin NOT NULL,
  `id_professor` int(11) NOT NULL,
  `duracao` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_aula`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `aulas`
--

INSERT INTO `aulas` (`id_aula`, `nm_titulo_aula`, `ds_descricao_aula`, `fl_status_aula`, `nr_valor_aula`, `qt_vagas`, `dt_aula`, `id_professor`, `duracao`) VALUES
(8, 'DESENVOLVIMENTO WEB COM PHP', '<ul>\r\n	<li>Introdu&ccedil;&atilde;o a HTML;</li>\r\n	<li>Por que aprender HTML antes de PHP?;</li>\r\n	<li>Linguagem de marca&ccedil;&atilde;o;</li>\r\n	<li>Linguagem Interpretada pelo pr&oacute;prio browser;</li>\r\n	<li>Modelo Cliente / Servidor;</li>\r\n	<li>Casos especiais: Firefox | Netscape | MS Explorer;</li>\r\n	<li>Extens&atilde;o de um novo documento: .HTML;</li>\r\n	<li>Vendo um documento HTML;</li>\r\n	<li>Conceito de tags e de documento bem formado;</li>\r\n	<li><em>Texto Modificado e Exibido em It&aacute;lico&nbsp;</em>;</li>\r\n	<li>Modificando par&acirc;metros de tags;</li>\r\n	<li>Base de um Documento;</li>\r\n	<li>Definindo o documento principal: ;</li>\r\n	<li>Dando um t&iacute;tulo para o documento:&nbsp;;</li>\r\n	<li>Definindo o corpo principal:&nbsp;;</li>\r\n	<li>Alterando a cor de fundo: atributo bgcolor;</li>\r\n	<li>Escrevendo dados num documento;</li>\r\n	<li>Liga&ccedil;&otilde;es entre P&aacute;ginas;</li>\r\n	<li>Conceitos de links entre p&aacute;ginas;</li>\r\n	<li>Inserindo Imagens e Tabelas;</li>\r\n	<li>Alterando o alinhamento de uma c&eacute;lula;</li>\r\n	<li>Formul&aacute;rios e Trabalhando com dados em HTML;</li>\r\n	<li>Criando um campo de senha;</li>\r\n	<li>Caixas de sele&ccedil;&atilde;o e Caixas de texto e Janelas;</li>\r\n	<li>Linguagem Interpretada e Modelo Cliente/Servidor;</li>\r\n	<li>Diferen&ccedil;as entre PHP e JavaScript;</li>\r\n	<li>Servidor Web e Casos espec&iacute;ficos: Apache e MS IIS;</li>\r\n	<li>Visualiza&ccedil;&atilde;o dos resultados e Onde colocar o c&oacute;digo;</li>\r\n	<li>Mesclando PHP com HTML;</li>\r\n	<li>As tags especiais e Declara&ccedil;&atilde;o de vari&aacute;veis;</li>\r\n	<li>Trabalhando com Vetores e Comando de atribui&ccedil;&atilde;o;</li>\r\n	<li>Imprimindo conte&uacute;do na tela e Operadores matem&aacute;ticos;</li>\r\n	<li>Operadores relacionais e Operadores l&oacute;gicos;</li>\r\n	<li>Operador de concatena&ccedil;&atilde;o de strings;</li>\r\n	<li>Bloco de Comandos e O condicional;</li>\r\n	<li>O condicional switch e Repeti&ccedil;&atilde;o usando while;</li>\r\n	<li>Desvio incondicional: return e Declarando uma fun&ccedil;&atilde;o;</li>\r\n	<li>Chamando uma fun&ccedil;&atilde;o;</li>\r\n	<li>Incluindo ArquivosEnviando dados entre arquivos;</li>\r\n	<li>Cabe&ccedil;alho de um formul&aacute;rio;</li>\r\n	<li>Manuseando as informa&ccedil;&otilde;es passadas;</li>\r\n	<li>Vari&aacute;veis e O atalho e Fun&ccedil;&otilde;es de Acesso a Bancos de Dados;</li>\r\n	<li>Conectando com um banco de dados;</li>\r\n	<li>Criando e executando uma consulta de dados;</li>\r\n	<li>Tratando o retorno de uma consulta;</li>\r\n	<li>Gerenciamento de Sess&otilde;es e Orienta&ccedil;&atilde;o a Objetos;</li>\r\n	<li>Classe e Objeto e Criando um objeto;</li>\r\n	<li>Atributo e Estado e M&eacute;todo e A&ccedil;&atilde;o;</li>\r\n	<li>M&eacute;todos Est&aacute;ticos e Express&otilde;es Regulares;</li>\r\n	<li>Caracteres Normais e Caracteres Especiais;</li>\r\n	<li>Controlando o Upload de Arquivos e Tratamento de Exce&ccedil;&otilde;es.</li>\r\n</ul>\r\n', 'A', 800, 20, '01/01/2015', 5, '60 dias');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aula_usuario`
--

CREATE TABLE IF NOT EXISTS `aula_usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_aula` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`,`id_aula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) COLLATE utf8_bin NOT NULL,
  `data_hora` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `logs`
--

INSERT INTO `logs` (`id`, `login`, `data_hora`) VALUES
(1, 'rogerionunes90@gmail.com', '26/11/2015 01:03:06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nm_usuario` varchar(100) NOT NULL,
  `ds_email` varchar(100) NOT NULL,
  `nr_senha` varchar(100) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nm_usuario`, `ds_email`, `nr_senha`) VALUES
(2, 'Rogerio Nunes', 'rogerio@gmail.com', '123'),
(3, 'Accacio Valente', 'a@gmail.com', '123'),
(4, '', '', ''),
(5, 'Rogerio Nunes', 'rogerionunes90@gmail.com', '123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
