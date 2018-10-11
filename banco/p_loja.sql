-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11-Out-2018 às 23:48
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `p_loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `nivel` enum('1','0') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`idadmin`, `nome`, `usuario`, `email`, `senha`, `image`, `nivel`) VALUES
(1, 'val', 'val', 'val@gmail.com', 'val', 'avatar2.png', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `idproduto` int(11) DEFAULT NULL,
  `categoria` varchar(45) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `idproduto`, `categoria`, `image`) VALUES
(51, NULL, 'Infantil', '940063001537982048.jpg'),
(52, NULL, 'Feminino', '92123700 1537982057.png'),
(53, NULL, 'Masculino', '0.16865600 1537982065.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `idcontato` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `assunto` varchar(100) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `mensagem` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`idcontato`, `nome`, `assunto`, `telefone`, `email`, `mensagem`) VALUES
(1, 'valeria', 'site', '134678765432', 'valeriaana123@gmail.com', 'gostei'),
(2, 'valeria', 'site', '134678765432', 'valeriaana123@gmail.com', 'gostei');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cor`
--

CREATE TABLE `cor` (
  `idcor` int(11) NOT NULL,
  `idproduto` int(11) DEFAULT NULL,
  `cor` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cor`
--

INSERT INTO `cor` (`idcor`, `idproduto`, `cor`) VALUES
(27, NULL, 'Cinza'),
(28, NULL, 'Preto'),
(29, NULL, 'Branco'),
(30, NULL, 'Azul'),
(31, NULL, 'Vermelho');

-- --------------------------------------------------------

--
-- Estrutura da tabela `img`
--

CREATE TABLE `img` (
  `idimg` int(11) NOT NULL,
  `idproduto` int(11) DEFAULT NULL,
  `img1` varchar(50) DEFAULT NULL,
  `img2` varchar(100) NOT NULL,
  `img3` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `img`
--

INSERT INTO `img` (`idimg`, `idproduto`, `img1`, `img2`, `img3`) VALUES
(56, 29, '7a7777b5.jpg', '82f81247.jpg', '0e4e92c8.jpg'),
(57, 30, '8977a602.jpg', '8f9dc3c7.jpg', 'e2e70ad5.jpg'),
(58, 31, '72fd0d9c.jpg', 'd26bf3a1.jpg', 'ea691185.jpg'),
(59, 32, '28b3636a.jpg', 'a86c8716.jpg', '72b703ad.jpg'),
(60, 33, 'ce5f165b.jpg', '50d2ed52.jpg', 'cc774ecc.jpg'),
(61, 34, '98699564.jpg', 'c710890a.jpg', '0555015a.jpg'),
(62, 35, 'bb9578c1.jpg', '521faebd.jpg', 'e80698f1.jpg'),
(63, 36, 'c5047d81.jpg', 'aa46ad49.jpg', 'b26956cd.jpg'),
(64, 37, 'f129cf05.jpg', '5a5da619.jpg', 'fdc67dac.jpg'),
(65, 38, '9c449ba7.jpg', 'f0ce917d.jpg', 'df375e06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacao`
--

CREATE TABLE `notificacao` (
  `idnotificacao` int(11) NOT NULL,
  `status` enum('1','0') DEFAULT NULL,
  `idcontato` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `notificacao`
--

INSERT INTO `notificacao` (`idnotificacao`, `status`, `idcontato`) VALUES
(1, '0', 1),
(2, '0', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `idproduto` int(11) NOT NULL,
  `idcategoria` int(11) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `preco` double DEFAULT NULL,
  `descricao` text,
  `quantidade` int(11) DEFAULT NULL,
  `categoria` varchar(45) DEFAULT NULL,
  `cor` varchar(100) NOT NULL,
  `tamanho` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `reviews` enum('1','0') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idproduto`, `idcategoria`, `nome`, `preco`, `descricao`, `quantidade`, `categoria`, `cor`, `tamanho`, `img`, `reviews`) VALUES
(29, NULL, 'CalÃ§a', 200, '100% algodao, importado', 2, 'Feminino', 'Cinza', 'P', '7a7777b5.jpg', NULL),
(30, NULL, 'Moletom', 80, 'Importado, marca NIKE Original', 5, 'Feminino', 'Vermelho', 'PP', '8977a602.jpg', NULL),
(31, NULL, 'Saia', 30, 'Listra branca ao lado', 3, 'Feminino', 'Preto', 'M', '72fd0d9c.jpg', NULL),
(32, NULL, 'Short', 45, 'Poliesportivo', 3, 'Feminino', 'Branco', 'P', '28b3636a.jpg', NULL),
(33, NULL, 'Vestido luxo', 150, 'Luxuoso, Bordado a mao', 5, 'Infantil', 'Preto', '3', 'ce5f165b.jpg', NULL),
(34, NULL, 'Bermuda Esportiva', 130, 'Esportivo luxuoso', 3, 'Infantil', 'Cinza', '3', '98699564.jpg', NULL),
(35, NULL, 'Polo esportiva', 100, 'Florada', 4, 'Masculino', 'Cinza', 'G', 'bb9578c1.jpg', NULL),
(36, NULL, 'Social', 200, 'Alta qualidade', 10, 'Masculino', 'Vermelho', 'G', 'c5047d81.jpg', NULL),
(37, NULL, 'CalÃ§a basica', 80, 'Basica', 14, 'Masculino', 'Preto', 'M', 'f129cf05.jpg', NULL),
(38, NULL, 'Blusinha', 150, 'lindo', 4, 'Infantil', 'Branco', '3', '9c449ba7.jpg', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tamanho`
--

CREATE TABLE `tamanho` (
  `idtamanho` int(11) NOT NULL,
  `idproduto` int(11) DEFAULT NULL,
  `tamanho` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tamanho`
--

INSERT INTO `tamanho` (`idtamanho`, `idproduto`, `tamanho`) VALUES
(31, NULL, 'P'),
(32, NULL, 'PP'),
(33, NULL, '3'),
(34, NULL, 'M'),
(35, NULL, 'G'),
(36, NULL, '10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `cpf` int(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`cpf`, `usuario`, `email`, `senha`) VALUES
(23456789, 'nd', 'valeriaana123@gmail.com', 'nd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`),
  ADD KEY `Categoria_idx` (`idproduto`);

--
-- Indexes for table `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`idcontato`);

--
-- Indexes for table `cor`
--
ALTER TABLE `cor`
  ADD PRIMARY KEY (`idcor`),
  ADD KEY `Cores_idx` (`idproduto`);

--
-- Indexes for table `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`idimg`),
  ADD KEY `Imgs_idx` (`idproduto`);

--
-- Indexes for table `notificacao`
--
ALTER TABLE `notificacao`
  ADD PRIMARY KEY (`idnotificacao`),
  ADD KEY `Notificacao_idx` (`idcontato`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idproduto`),
  ADD KEY `Categoria_idx` (`idcategoria`);

--
-- Indexes for table `tamanho`
--
ALTER TABLE `tamanho`
  ADD PRIMARY KEY (`idtamanho`),
  ADD KEY `Taman_idx` (`idproduto`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`cpf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `contato`
--
ALTER TABLE `contato`
  MODIFY `idcontato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cor`
--
ALTER TABLE `cor`
  MODIFY `idcor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `img`
--
ALTER TABLE `img`
  MODIFY `idimg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `notificacao`
--
ALTER TABLE `notificacao`
  MODIFY `idnotificacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `idproduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tamanho`
--
ALTER TABLE `tamanho`
  MODIFY `idtamanho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `Caateg` FOREIGN KEY (`idproduto`) REFERENCES `produto` (`idproduto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `cor`
--
ALTER TABLE `cor`
  ADD CONSTRAINT `Cores` FOREIGN KEY (`idproduto`) REFERENCES `produto` (`idproduto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `img`
--
ALTER TABLE `img`
  ADD CONSTRAINT `Imgs` FOREIGN KEY (`idproduto`) REFERENCES `produto` (`idproduto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `notificacao`
--
ALTER TABLE `notificacao`
  ADD CONSTRAINT `Notificacao` FOREIGN KEY (`idcontato`) REFERENCES `contato` (`idcontato`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `Categoria` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tamanho`
--
ALTER TABLE `tamanho`
  ADD CONSTRAINT `Taman` FOREIGN KEY (`idproduto`) REFERENCES `produto` (`idproduto`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
