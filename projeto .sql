-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Nov-2021 às 00:17
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
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
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `nome_categoria` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`nome_categoria`) VALUES
('Todos'),
('Terror '),
('Ação'),
('Drama'),
('Documentário');

-- --------------------------------------------------------

--
-- Estrutura da tabela `filmes`
--

CREATE TABLE `filmes` (
  `id_filme` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` varchar(1000) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `imagem` blob NOT NULL,
  `video` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `filmes`
--

INSERT INTO `filmes` (`id_filme`, `titulo`, `descricao`, `categoria`, `imagem`, `video`) VALUES
(1, 'windows 7', ' O windows 7 está desatualizado porem ainda continua a ser usado por muita gente e muitas empresas não percas a oportunidade e ve o pequeno filme sobre o mesmo.', 'Terror', 0x77696e646f7773372e6a7067, 0x57696e646f7773203720426f6f742053637265656e5f76313434502e6d7034),
(2, 'windows 11', 'O windows 11 e a mais recente atualização da microsoft não percas a oportunidade e ve o filme de alguns dos wallpapers que estarão disponiveis', 'Documentário', 0x77696e646f77732d31312e6a7067, 0x57696e646f77732031312057616c6c70617065727320436f6c6c656374696f6e2077697468204c696e6b5f76313434502e6d7034);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `filmes`
--
ALTER TABLE `filmes`
  ADD PRIMARY KEY (`id_filme`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `filmes`
--
ALTER TABLE `filmes`
  MODIFY `id_filme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
