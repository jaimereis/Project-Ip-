-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20-Ago-2018 às 18:51
-- Versão do servidor: 10.1.24-MariaDB
-- PHP Version: 7.0.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ipe`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(300) DEFAULT NULL,
  `cpf_cnpj` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `localidade` varchar(100) DEFAULT NULL,
  `estado` varchar(15) DEFAULT NULL,
  `logradouro` varchar(100) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `telefone1` varchar(25) DEFAULT NULL,
  `telefone2` varchar(25) DEFAULT NULL,
  `usuarios_id` int(11) DEFAULT NULL,
  `dt_inserido` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status_cliente` char(1) DEFAULT '1' COMMENT '1 ativo 0 inativo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `cpf_cnpj`, `email`, `cep`, `localidade`, `estado`, `logradouro`, `bairro`, `numero`, `telefone1`, `telefone2`, `usuarios_id`, `dt_inserido`, `status_cliente`) VALUES
(39, 'jaime dos reis leles junior', '09340854632', 'junin317@gmail.com', '38414434', 'Uberlândia', 'MG', 'Rua Rio Tibre', 'Mansour', '351', '(34) 98824-9542', '', 1, '2018-08-19 04:05:54', '1'),
(40, 'marcela reis', '08547145698', 'marcela@gmail.com', '38413114', 'Uberlândia', 'MG', 'Avenida Presidente Kennedy', 'Vallee', '136', '(34) 98824-9966', '', 1, '2018-08-19 04:07:34', '1'),
(41, 'marcus vinicius', '36985214778', 'marcus@gmail.com', '38414456', 'Uberlândia', 'MG', 'Rua Rio Salado', 'Mansour', '369', '(34) 99874-5588', '', 1, '2018-08-19 04:08:43', '1'),
(42, 'diogo vinicius', '03698547888', 'diogo@gmail.com', '38413111', 'Uberlândia', 'MG', 'Avenida Indaiá', 'Planalto', '654', '(34) 98855-4477', '', 1, '2018-08-19 05:38:09', '1'),
(43, 'antonio marinho', '06985214777', 'antonio@gmail.com', '38414434', 'Uberlândia', 'MG', 'Rua Rio Tibre', 'Mansour', '369', '(34) 98855-6644', '', 1, '2018-08-19 18:39:38', '0'),
(44, 'maria amelia', '03985241236', 'maria@gmail.com', '38413111', 'Uberlândia', 'MG', 'Avenida Indaiá', 'Planalto', '369', '(34) 98855-6633', '', 1, '2018-08-19 23:02:17', '1'),
(45, 'maradona ribeiro ', '03652874125', 'maradona@gmail.com', '38413111', 'Uberlândia', 'MG', 'Avenida Indaiá', 'Planalto', '369', '(34) 95588-7744', '', 1, '2018-08-20 03:07:53', '1'),
(46, 'mariana dias ', '03625874144', 'mariana@gmail.com', '38413111', 'Uberlândia', 'MG', 'Avenida Indaiá', 'Planalto', '3698', '(34) 95566-3322', '', 1, '2018-08-20 13:17:48', '1'),
(47, 'mario josé alameda', '36985214778', 'mario@gmail.com', '38414434', 'Uberlândia', 'MG', 'Rua Rio Tibre', 'Mansour', '369', '(34) 98855-4433', '(34) 98855-6633', 1, '2018-08-20 13:32:52', '1'),
(48, 'frederico martins alameda', '36985214778', 'fredereico@gmail.com', '38414434', 'Uberlândia', 'MG', 'Rua Rio Tibre', 'Mansour', '369', '(34) 98824-9588', '(34) 98855-4477', 1, '2018-08-20 13:54:17', '1'),
(49, 'fernanda clara silva', '09876543211', 'fernanda@gmail.com', '38414434', 'Uberlândia', 'MG', 'Rua Rio Tibre', 'Mansour', '234', '(34) 98877-6655', '(34) 98824-3555', 1, '2018-08-20 14:13:14', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_venda`
--

CREATE TABLE `itens_venda` (
  `id` int(11) NOT NULL,
  `venda_id` int(11) DEFAULT NULL,
  `produto_id` int(11) DEFAULT NULL,
  `qtd` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `itens_venda`
--

INSERT INTO `itens_venda` (`id`, `venda_id`, `produto_id`, `qtd`) VALUES
(1, 1, 1, 3),
(2, 1, 2, 3),
(3, 1, 3, 1),
(4, 2, 2, 6),
(5, 2, 1, 3),
(6, 2, 4, 1),
(7, 3, 2, 3),
(8, 3, 3, 1),
(9, 4, 2, 3),
(10, 4, 3, 1),
(11, 5, 2, 3),
(12, 5, 3, 1),
(13, 6, 2, 3),
(14, 6, 3, 1),
(15, 7, 2, 3),
(16, 7, 3, 1),
(17, 8, 2, 3),
(18, 8, 3, 1),
(19, 9, 2, 3),
(20, 9, 3, 1),
(21, 10, 2, 3),
(22, 10, 3, 1),
(23, 11, 2, 3),
(24, 11, 3, 1),
(25, 12, 2, 3),
(26, 12, 3, 1),
(27, 13, 2, 3),
(28, 13, 3, 1),
(29, 14, 2, 3),
(30, 14, 3, 1),
(31, 15, 2, 3),
(32, 15, 3, 1),
(33, 16, 2, 3),
(34, 16, 3, 1),
(35, 17, 2, 3),
(36, 17, 3, 1),
(37, 18, 2, 3),
(38, 18, 3, 1),
(39, 19, 2, 3),
(40, 19, 3, 1),
(41, 20, 2, 3),
(42, 20, 3, 1),
(43, 21, 2, 3),
(44, 21, 3, 1),
(45, 22, 2, 3),
(46, 22, 3, 1),
(47, 23, 2, 3),
(48, 23, 3, 1),
(49, 24, 2, 3),
(50, 24, 3, 1),
(51, 25, 2, 3),
(52, 25, 3, 1),
(53, 25, 2, 5),
(54, 26, 1, 10),
(55, 27, 2, 3),
(56, 28, 4, 2),
(57, 29, 1, 2),
(58, 29, 3, 6),
(59, 30, 3, 2),
(60, 30, 1, 6),
(61, 31, 3, 6),
(62, 31, 1, 2),
(63, 32, 5, 20),
(64, 32, 2, 3),
(65, 33, 2, 5),
(66, 33, 5, 50),
(67, 34, 2, 3),
(68, 35, 3, 2),
(69, 35, 5, 1),
(70, 36, 6, 1),
(71, 36, 7, 1),
(72, 37, 7, 1),
(73, 38, 8, 1),
(74, 38, 7, 1),
(75, 39, 8, 1),
(76, 40, 9, 2),
(77, 40, 8, 1),
(78, 41, 9, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `referencia` int(11) DEFAULT NULL,
  `descricao` text,
  `marca` varchar(300) DEFAULT NULL,
  `preco` double DEFAULT NULL,
  `estoque` int(11) DEFAULT NULL,
  `unidade_de_venda` int(11) DEFAULT NULL,
  `status_produto` char(1) DEFAULT '1' COMMENT '1 Ativo 0 inativo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `referencia`, `descricao`, `marca`, `preco`, `estoque`, `unidade_de_venda`, `status_produto`) VALUES
(1, 132645987, 'arroz', 'vanconcelos', 8.9, 26, 1, '0'),
(2, 365686, 'Feijão', 'Vasconcelos', 30, 50, 1, '0'),
(3, 98565, 'Mostarda', 'Arisco', 30, 90, 1, '1'),
(4, 659844, 'Mouse', 'Microsoft', 60, 20, 1, '1'),
(5, 2656, 'teclado', 'microsoft', 20, 30, 1, '1'),
(6, 12355, 'monitor', 'dell', 500, 30, 1, '1'),
(7, 123565, 'tv ', 'lg', 600, 30, 1, '1'),
(8, 123456, 'pc gamer', 'dell', 800, 80, 1, '1'),
(9, 3234, 'cabo de rede', 'dell', 20, 100, 1, '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `login` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `perfil` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `password`, `perfil`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'ADMIN'),
(2, 'comun', 'e10adc3949ba59abbe56e057f20f883e', 'COMUN');

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `dt_venda` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`id`, `cliente_id`, `dt_venda`) VALUES
(1, 39, '2018-08-19 17:32:24'),
(2, 41, '2018-08-19 17:49:08'),
(3, 40, '2018-08-19 17:53:29'),
(4, 40, '2018-08-19 17:54:01'),
(5, 40, '2018-08-19 18:01:57'),
(6, 40, '2018-08-19 18:03:23'),
(7, 40, '2018-08-19 18:04:35'),
(8, 40, '2018-08-19 18:05:39'),
(9, 40, '2018-08-19 18:06:10'),
(10, 40, '2018-08-19 18:07:28'),
(11, 40, '2018-08-19 18:07:51'),
(12, 40, '2018-08-19 18:12:32'),
(13, 40, '2018-08-19 18:12:57'),
(14, 40, '2018-08-19 18:13:20'),
(15, 40, '2018-08-19 18:14:32'),
(16, 40, '2018-08-19 18:14:57'),
(17, 40, '2018-08-19 18:15:05'),
(18, 40, '2018-08-19 18:17:33'),
(19, 40, '2018-08-19 18:17:48'),
(20, 40, '2018-08-19 18:18:15'),
(21, 40, '2018-08-19 18:19:20'),
(22, 40, '2018-08-19 18:19:27'),
(23, 40, '2018-08-19 18:19:47'),
(24, 40, '2018-08-19 18:20:07'),
(25, 40, '2018-08-19 18:20:17'),
(26, 41, '2018-08-19 18:21:54'),
(27, 40, '2018-08-19 18:25:46'),
(28, 42, '2018-08-19 18:27:06'),
(29, 41, '2018-08-19 18:31:40'),
(30, 43, '2018-08-19 18:40:09'),
(31, 41, '2018-08-19 21:18:53'),
(32, 39, '2018-08-19 23:04:30'),
(33, 44, '2018-08-19 23:16:44'),
(34, 41, '2018-08-20 03:10:41'),
(35, 41, '2018-08-20 13:08:13'),
(36, 41, '2018-08-20 13:40:16'),
(37, 42, '2018-08-20 13:43:16'),
(38, 48, '2018-08-20 13:57:36'),
(39, 48, '2018-08-20 13:59:43'),
(40, 49, '2018-08-20 14:16:53'),
(41, 49, '2018-08-20 14:18:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itens_venda`
--
ALTER TABLE `itens_venda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_itens_venda_venda` (`venda_id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `itens_venda`
--
ALTER TABLE `itens_venda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `itens_venda`
--
ALTER TABLE `itens_venda`
  ADD CONSTRAINT `FK_itens_venda_venda` FOREIGN KEY (`venda_id`) REFERENCES `venda` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
