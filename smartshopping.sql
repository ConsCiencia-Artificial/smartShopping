-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30/04/2024 às 02:57
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `smartshopping`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_cadastro_loja`
--

CREATE TABLE `tb_cadastro_loja` (
  `codigo_loja` int(11) NOT NULL,
  `nome_loja` varchar(100) NOT NULL,
  `codigo_cnpj` char(14) NOT NULL,
  `nome_categoria_loja` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_cadastro_usuario`
--

CREATE TABLE `tb_cadastro_usuario` (
  `cd_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(100) NOT NULL,
  `email_usuario` varchar(100) NOT NULL,
  `senha_usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_cadastro_usuario`
--

INSERT INTO `tb_cadastro_usuario` (`cd_usuario`, `nome_usuario`, `email_usuario`, `senha_usuario`) VALUES
(1, 'thiago', 'thiago@smartshopping', '123456'),
(2, 'otho', 'otho.01@hotmail.com', '123'),
(3, 'otho.ribeiro@etec.sp.gov.br', 'otho.ribeiro@etec.sp.gov.br', '1234'),
(4, 'otho.ribeiro@etec.sp.gov.brr', 'otho.ribeiro@etec.sp.gov.brr', '1234');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_cadastro_loja`
--
ALTER TABLE `tb_cadastro_loja`
  ADD PRIMARY KEY (`codigo_loja`);

--
-- Índices de tabela `tb_cadastro_usuario`
--
ALTER TABLE `tb_cadastro_usuario`
  ADD PRIMARY KEY (`cd_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_cadastro_loja`
--
ALTER TABLE `tb_cadastro_loja`
  MODIFY `codigo_loja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_cadastro_usuario`
--
ALTER TABLE `tb_cadastro_usuario`
  MODIFY `cd_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
