-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Nov-2018 às 04:00
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
(5, 'dsadsad', '<p>sadadas</p>\r\n', NULL, '3', '1', '<p><img alt=\"\" src=\"http://media.contentapi.ea.com/content/www-easports/pt_BR/fifa/ultimate-team/news/2018/getting-started-with-fut-19/_jcr_content/imageShare.img.jpg\" style=\"height:100%; width:100%\" /></p>\r\n');

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

--
-- Extraindo dados da tabela `descurtida`
--

INSERT INTO `descurtida` (`cod_avaliacao`, `cod_usuario`) VALUES
(5, 3);

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
  `descricao_noticia` text,
  `imagem_noticia` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `noticia`
--

INSERT INTO `noticia` (`cod_noticia`, `data_noticia`, `status`, `titulo_noticia`, `qtd`, `descricao_noticia`, `imagem_noticia`) VALUES
(20, '0000-00-00', 1, 'Noticia 4', 0, '<p>as,anajsbajsb</p>\r\n', '<p><img alt=\"\" src=\"http://media.contentapi.ea.com/content/www-easports/pt_BR/fifa/ultimate-team/news/2018/getting-started-with-fut-19/_jcr_content/imageShare.img.jpg\" style=\"height:100%; width:100%\" /></p>\r\n'),
(21, '0000-00-00', 1, 'noticia 3', 0, '<p>sa.dmaskdnaskndsai</p>\r\n', '<p><img alt=\"\" src=\"https://data2.origin.com/content/dam/originx/web/app/games/battlefield/battlefield-1/screenshots/battlefield-1/1038423_screenhi_930x524_en_ww_gunfire_v1.jpg\" style=\"height:100%; width:100%\" /></p>\r\n');

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
(3, 'senha', 'athirson@hotmail.com', 'athirson', 1),
(4, 'senha', 'gabriel@hotmail.com', 'gabriel', 1),
(5, 'senha', 'carlos@hotmail.com', 'carlos', 1);

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
  MODIFY `cod_noticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
