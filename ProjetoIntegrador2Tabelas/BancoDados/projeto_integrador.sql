-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Jul-2021 às 23:30
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto_integrador`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `disfuncao`
--

CREATE TABLE `disfuncao` (
  `id_disfuncao` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `disfuncao`
--

INSERT INTO `disfuncao` (`id_disfuncao`, `nome`) VALUES
(77, 'FLACIDEZ CUTÂNEA'),
(78, 'FIBROEDEMA GELÓIDE (CELULITE)'),
(79, 'ESTRIAS'),
(80, 'LIPODISTROFIA(GORDURA LOCALIZADA)'),
(81, 'HPERPIGMENTAÇÃO (MANCHAS)'),
(82, 'LINHAS DE EXPRESSÃO E RUGAS'),
(83, 'FORTALECIMENTO MUSCULAR');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disfuncao_tratamento`
--

CREATE TABLE `disfuncao_tratamento` (
  `id_disfuncao_tratamento` int(11) NOT NULL,
  `id_disfuncao` int(11) NOT NULL,
  `id_tratamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `disfuncao_tratamento`
--

INSERT INTO `disfuncao_tratamento` (`id_disfuncao_tratamento`, `id_disfuncao`, `id_tratamento`) VALUES
(69, 77, 39),
(70, 77, 40),
(71, 78, 41),
(72, 79, 42),
(73, 80, 43),
(74, 81, 44),
(75, 82, 45),
(76, 83, 46);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tratamento`
--

CREATE TABLE `tratamento` (
  `id_tratamento` int(11) NOT NULL,
  `equipamento` varchar(255) NOT NULL,
  `parametros` varchar(255) NOT NULL,
  `intervalo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tratamento`
--

INSERT INTO `tratamento` (`id_tratamento`, `equipamento`, `parametros`, `intervalo`) VALUES
(39, 'RÁDIOFREQUÊNCIA', '40-42°C, 10 MIN POR HEMIFACE, 2.5MhZ', 'MIN 15 DIAS'),
(40, 'MICROCORRENTES', '50-500 uA, 10 MIN REGIÃO', '2-3/SEMANA'),
(41, 'ULTRASOM', '3MhZ, 2,5w/cm2, CONTÍNUO (FEG FLÁCIDA), PULSADO (FEG COMPACTA), tempo= área/ERA', '2/SEMANA'),
(42, 'MICROGALVÂNICA', '100-150 mA', '7 dias'),
(43, 'ENDERMOLOGIA', 'CONTÍNUO ou PULSADO, 80-100mmHg, 5-10 MIN POR REGIÃO', '2-3/SEMANA'),
(44, 'LED ', 'AZUL (450-495nm), VERDE (495-570nm), ÂMBAR (570-590nm) 7-10 MIN', '2/SEMANA'),
(45, 'MICROGALVÂNICA', '70-100mA', '7 dias'),
(46, 'CORRENTE RUSSA', '30hZ, rise 2s, on 6s, decay 2s, off20s. sincronizado, 40 MIN', '2/SEMANA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `senha`) VALUES
(16, 'Teste', 'teste@teste', '$2y$10$oijAABYRJgoL5nBokgeiaOBc.G14T3vlhBFltLnNARRyahY.6liz6');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `disfuncao`
--
ALTER TABLE `disfuncao`
  ADD PRIMARY KEY (`id_disfuncao`);

--
-- Índices para tabela `disfuncao_tratamento`
--
ALTER TABLE `disfuncao_tratamento`
  ADD PRIMARY KEY (`id_disfuncao_tratamento`),
  ADD KEY `id_disfuncao` (`id_disfuncao`),
  ADD KEY `id_tratamento` (`id_tratamento`);

--
-- Índices para tabela `tratamento`
--
ALTER TABLE `tratamento`
  ADD PRIMARY KEY (`id_tratamento`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `disfuncao`
--
ALTER TABLE `disfuncao`
  MODIFY `id_disfuncao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de tabela `disfuncao_tratamento`
--
ALTER TABLE `disfuncao_tratamento`
  MODIFY `id_disfuncao_tratamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de tabela `tratamento`
--
ALTER TABLE `tratamento`
  MODIFY `id_tratamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `disfuncao_tratamento`
--
ALTER TABLE `disfuncao_tratamento`
  ADD CONSTRAINT `id_disfuncao` FOREIGN KEY (`id_disfuncao`) REFERENCES `disfuncao` (`id_disfuncao`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_tratamento` FOREIGN KEY (`id_tratamento`) REFERENCES `tratamento` (`id_tratamento`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
