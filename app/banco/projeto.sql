-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 29/10/2018 às 11:36
-- Versão do servidor: 5.7.21-0ubuntu0.16.04.1
-- Versão do PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `cod_avaliacao` int(11) NOT NULL,
  `nome_avaliacao` varchar(50) DEFAULT NULL,
  `descricao_avaliacao` text,
  `data_avaliacao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastrar`
--

CREATE TABLE `cadastrar` (
  `cod_usuario` int(11) DEFAULT NULL,
  `cod_noticia` int(11) DEFAULT NULL,
  `cod_avaliacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentario`
--

CREATE TABLE `comentario` (
  `cod_comentario` int(11) NOT NULL,
  `descricao_comentario` text CHARACTER SET utf8,
  `data_comentario` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `noticia`
--

CREATE TABLE `noticia` (
  `cod_noticia` int(11) NOT NULL,
  `data_noticia` date DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `titulo_noticia` varchar(100) DEFAULT NULL,
  `qtd` tinyint(4) DEFAULT NULL,
  `descricao_noticia` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `noticia`
--

INSERT INTO `noticia` (`cod_noticia`, `data_noticia`, `status`, `titulo_noticia`, `qtd`, `descricao_noticia`) VALUES
(16, NULL, NULL, 'FINALMENTE! O GAMEPLAY DE RED DEAD REDEMPTION 2', NULL, 'Um imenso mundo para explorar e tambÃ©m sobreviver! Dividido entre tradiÃ§Ãµes antigas e um novo mundo moderno surgindo junto a desertos, florestas densas, montanhas e cidades densas.\r\n\r\nVocÃª poderÃ¡ firmar acampamentos com sua gangue, sua famÃ­lia, podendo comer, beber e jogar. DeverÃ¡ suprir seu acampamento com suprimentos, procurar por tesouros e muito mais!\r\n\r\nNeste novo Red Dead Redemption 2 vocÃª Ã© responsÃ¡vel pelo prÃ³prio destino, seus atos tem consequÃªncias!\r\n\r\nEntre cuidar do seu cavalo ou comprar outro, vocÃª poderÃ¡ adquirir e personalizar suas armas, equipamentos, ajudar a cidade ou se tornar o pior pesadelo do velho oeste.\r\n\r\nRed Dead Redemption 2 chegarÃ¡ dia 26 de outubro de 2018 para PlayStation 4 e Xbox One.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `cod_usuario` int(11) NOT NULL,
  `senha_usuario` varchar(15) DEFAULT NULL,
  `email_usuario` varchar(30) DEFAULT NULL,
  `nome_usuario` varchar(50) DEFAULT NULL,
  `tipo_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`cod_avaliacao`);

--
-- Índices de tabela `cadastrar`
--
ALTER TABLE `cadastrar`
  ADD KEY `cod_usuario` (`cod_usuario`),
  ADD KEY `cod_noticia` (`cod_noticia`),
  ADD KEY `cod_avaliacao` (`cod_avaliacao`);

--
-- Índices de tabela `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`cod_comentario`);

--
-- Índices de tabela `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`cod_noticia`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod_usuario`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `cod_avaliacao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `comentario`
--
ALTER TABLE `comentario`
  MODIFY `cod_comentario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `noticia`
--
ALTER TABLE `noticia`
  MODIFY `cod_noticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `cadastrar`
--
ALTER TABLE `cadastrar`
  ADD CONSTRAINT `cadastrar_ibfk_1` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`cod_usuario`),
  ADD CONSTRAINT `cadastrar_ibfk_2` FOREIGN KEY (`cod_noticia`) REFERENCES `noticia` (`cod_noticia`),
  ADD CONSTRAINT `cadastrar_ibfk_3` FOREIGN KEY (`cod_avaliacao`) REFERENCES `avaliacao` (`cod_avaliacao`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
