-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 30-Jun-2016 às 23:16
-- Versão do servidor: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `curriculum_hipertec`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `sobreNome` varchar(45) DEFAULT NULL,
  `idade` int(11) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `nacionalidade` varchar(45) NOT NULL,
  `sexo` varchar(2) NOT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `linkedin` varchar(45) DEFAULT NULL,
  `facebook` varchar(45) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id`, `nome`, `sobreNome`, `idade`, `telefone`, `nacionalidade`, `sexo`, `foto`, `email`, `linkedin`, `facebook`, `cpf`) VALUES
(7, 'LEEUNG ALVES DE MENESES', NULL, 25, '85981200856', '', 'le', NULL, 'leeungalves@gmail.com', 'sdfa', NULL, '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `competencias`
--

CREATE TABLE `competencias` (
  `id` int(11) NOT NULL,
  `curso` varchar(45) NOT NULL,
  `instituicao` varchar(45) NOT NULL,
  `cargahoraria` int(11) NOT NULL,
  `nivel` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `curriculum_id` int(11) NOT NULL,
  `conclusao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curriculum`
--

CREATE TABLE `curriculum` (
  `id` int(11) NOT NULL,
  `aluno_id` int(11) NOT NULL,
  `resumo` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id` int(11) NOT NULL,
  `logradouro` varchar(45) NOT NULL,
  `numero` int(11) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `cep` varchar(45) DEFAULT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `aluno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='	';

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id`, `logradouro`, `numero`, `bairro`, `cidade`, `estado`, `cep`, `complemento`, `aluno`) VALUES
(1, 'RUA CORONEL MANOEL ALBANO', 989, 'mondubim', 'fortaeza', 'ce', '60762376', NULL, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `experiencias`
--

CREATE TABLE `experiencias` (
  `id` int(11) NOT NULL,
  `empresa` varchar(45) NOT NULL,
  `funcao` varchar(45) NOT NULL,
  `inicio` date NOT NULL,
  `fim` date DEFAULT NULL,
  `curriculum_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `informacaoadicional`
--

CREATE TABLE `informacaoadicional` (
  `id` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `curriculum_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `inscricaovaga`
--

CREATE TABLE `inscricaovaga` (
  `id` int(11) NOT NULL,
  `aluno` int(11) NOT NULL,
  `dataInscricao` date NOT NULL,
  `situacao` tinyint(1) NOT NULL DEFAULT '1',
  `vaga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vaga`
--

CREATE TABLE `vaga` (
  `id` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `descricao` longtext,
  `empresa` varchar(45) DEFAULT NULL,
  `postagem` date NOT NULL,
  `vencimento` date DEFAULT NULL,
  `situacao` tinyint(1) NOT NULL DEFAULT '1',
  `email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vaga`
--

INSERT INTO `vaga` (`id`, `titulo`, `descricao`, `empresa`, `postagem`, `vencimento`, `situacao`, `email`) VALUES
(1, 'TItulo vaga de teste', 'somtnet teste', 'Empresa teste', '2016-06-30', '2016-07-19', 1, 'leeungalves@gmail.com'),
(2, 'Desenvolvedor C++', 'Descrição da Vaga\r\n\r\nDesenvolvedor C++\r\n\r\nEscolaridade:\r\nCursando nível superior: Informática /Ciências da Computação/ Engenharia de Computação/TI.\r\n\r\nPrincipais Atividades:\r\n– Implementação de códigos seguindo padrões C++11/C++0x;\r\n– Integração entre softwares utilizando API RESTful;\r\n– Implementar testes unitários, integração e aceitação;\r\n\r\nRequisitos:\r\n– Conhecimento em desenvolvimento Android NDK e iOS Nativo (ObjC ou Swift).\r\n– Conhecimento em Object Pascal.', 'Casa Magalhães ', '2016-06-30', '2016-07-31', 1, 'casamagalhaes@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf_UNIQUE` (`cpf`);

--
-- Indexes for table `competencias`
--
ALTER TABLE `competencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_competencias_curriculum1_idx` (`curriculum_id`);

--
-- Indexes for table `curriculum`
--
ALTER TABLE `curriculum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_curriculum_aluno_idx` (`aluno_id`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_endereco_aluno1_idx` (`aluno`);

--
-- Indexes for table `experiencias`
--
ALTER TABLE `experiencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_experiencias_curriculum1_idx` (`curriculum_id`);

--
-- Indexes for table `informacaoadicional`
--
ALTER TABLE `informacaoadicional`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_informacaoAdicional_curriculum1_idx` (`curriculum_id`);

--
-- Indexes for table `inscricaovaga`
--
ALTER TABLE `inscricaovaga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_inscricaoVaga_aluno1_idx` (`aluno`),
  ADD KEY `fk_inscricaoVaga_vaga1_idx` (`vaga`);

--
-- Indexes for table `vaga`
--
ALTER TABLE `vaga`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `competencias`
--
ALTER TABLE `competencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `curriculum`
--
ALTER TABLE `curriculum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `experiencias`
--
ALTER TABLE `experiencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `informacaoadicional`
--
ALTER TABLE `informacaoadicional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inscricaovaga`
--
ALTER TABLE `inscricaovaga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vaga`
--
ALTER TABLE `vaga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `competencias`
--
ALTER TABLE `competencias`
  ADD CONSTRAINT `fk_competencias_curriculum1` FOREIGN KEY (`curriculum_id`) REFERENCES `curriculum` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `curriculum`
--
ALTER TABLE `curriculum`
  ADD CONSTRAINT `fk_curriculum_aluno` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `fk_endereco_aluno1` FOREIGN KEY (`aluno`) REFERENCES `aluno` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `experiencias`
--
ALTER TABLE `experiencias`
  ADD CONSTRAINT `fk_experiencias_curriculum1` FOREIGN KEY (`curriculum_id`) REFERENCES `curriculum` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `informacaoadicional`
--
ALTER TABLE `informacaoadicional`
  ADD CONSTRAINT `fk_informacaoAdicional_curriculum1` FOREIGN KEY (`curriculum_id`) REFERENCES `curriculum` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `inscricaovaga`
--
ALTER TABLE `inscricaovaga`
  ADD CONSTRAINT `fk_inscricaoVaga_aluno1` FOREIGN KEY (`aluno`) REFERENCES `aluno` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inscricaoVaga_vaga1` FOREIGN KEY (`vaga`) REFERENCES `vaga` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
