-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Nov-2018 às 02:24
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projeto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `cod_avaliacao` int(11) NOT NULL,
  `nome_avaliacao` varchar(50) DEFAULT NULL,
  `descricao_avaliacao` text,
  `data_avaliacao` date DEFAULT NULL,
  `curtidas` varchar(30) DEFAULT NULL,
  `descurtidas` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `imagem_avaliacao` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `avaliacao`
--

INSERT INTO `avaliacao` (`cod_avaliacao`, `nome_avaliacao`, `descricao_avaliacao`, `data_avaliacao`, `curtidas`, `descurtidas`, `imagem_avaliacao`) VALUES
(5, 'athirson', '<p>JOGO</p>\r\n', NULL, '3', '0', '<p><img alt=\"\" src=\"https://apollo2.dl.playstation.net/cdn/UP0006/CUSA11600_00/FREE_CONTENTFIy5ADhft4PGF8dAsQOH/PREVIEW_SCREENSHOT2_165862.jpg\" style=\"height:281px; width:500px\" /></p>\r\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastrar`
--

CREATE TABLE `cadastrar` (
  `cod_usuario` int(11) DEFAULT NULL,
  `cod_noticia` int(11) DEFAULT NULL,
  `cod_avaliacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE `comentario` (
  `cod_comentario` int(11) NOT NULL,
  `descricao_comentario` text CHARACTER SET utf8,
  `data_comentario` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curtida`
--

CREATE TABLE `curtida` (
  `cod_usuario` int(11) DEFAULT NULL,
  `cod_avaliacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `curtida`
--

INSERT INTO `curtida` (`cod_usuario`, `cod_avaliacao`) VALUES
(2, 2),
(2, 1),
(1, 2),
(1, 5),
(2, 5),
(4, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `descurtida`
--

CREATE TABLE `descurtida` (
  `cod_avaliacao` int(11) DEFAULT NULL,
  `cod_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticia`
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
-- Extraindo dados da tabela `noticia`
--

INSERT INTO `noticia` (`cod_noticia`, `data_noticia`, `status`, `titulo_noticia`, `qtd`, `descricao_noticia`) VALUES
(16, NULL, NULL, 'FINALMENTE! O GAMEPLAY DE RED DEAD REDEMPTION 2', NULL, 'Um imenso mundo para explorar e tambÃ©m sobreviver! Dividido entre tradiÃ§Ãµes antigas e um novo mundo moderno surgindo junto a desertos, florestas densas, montanhas e cidades densas.\r\n\r\nVocÃª poderÃ¡ firmar acampamentos com sua gangue, sua famÃ­lia, podendo comer, beber e jogar. DeverÃ¡ suprir seu acampamento com suprimentos, procurar por tesouros e muito mais!\r\n\r\nNeste novo Red Dead Redemption 2 vocÃª Ã© responsÃ¡vel pelo prÃ³prio destino, seus atos tem consequÃªncias!\r\n\r\nEntre cuidar do seu cavalo ou comprar outro, vocÃª poderÃ¡ adquirir e personalizar suas armas, equipamentos, ajudar a cidade ou se tornar o pior pesadelo do velho oeste.\r\n\r\nRed Dead Redemption 2 chegarÃ¡ dia 26 de outubro de 2018 para PlayStation 4 e Xbox One.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `cod_usuario` int(11) NOT NULL,
  `senha_usuario` varchar(15) DEFAULT NULL,
  `email_usuario` varchar(30) DEFAULT NULL,
  `nome_usuario` varchar(50) DEFAULT NULL,
  `tipo_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`cod_usuario`, `senha_usuario`, `email_usuario`, `nome_usuario`, `tipo_usuario`) VALUES
(1, '123', 'gabriel@gmail.com', 'Gabriel Sokacheski', 1),
(2, '123', 'athirson@gmail.com', 'Athirson', 1),
(3, 'senha', 'athirson@a', 'athirson', 1),
(4, 'senha', 'athirson@hotmail.com', 'athirson', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`cod_avaliacao`);

--
-- Indexes for table `cadastrar`
--
ALTER TABLE `cadastrar`
  ADD KEY `cod_usuario` (`cod_usuario`),
  ADD KEY `cod_noticia` (`cod_noticia`),
  ADD KEY `cod_avaliacao` (`cod_avaliacao`);

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`cod_comentario`);

--
-- Indexes for table `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`cod_noticia`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cod_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `cod_avaliacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `cod_comentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `noticia`
--
ALTER TABLE `noticia`
  MODIFY `cod_noticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cadastrar`
--
ALTER TABLE `cadastrar`
  ADD CONSTRAINT `cadastrar_ibfk_1` FOREIGN KEY (`cod_usuario`) REFERENCES `usuarios` (`cod_usuario`),
  ADD CONSTRAINT `cadastrar_ibfk_2` FOREIGN KEY (`cod_noticia`) REFERENCES `noticia` (`cod_noticia`),
  ADD CONSTRAINT `cadastrar_ibfk_3` FOREIGN KEY (`cod_avaliacao`) REFERENCES `avaliacao` (`cod_avaliacao`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
