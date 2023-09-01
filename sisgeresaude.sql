-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Set-2023 às 19:34
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sisgeresaude`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agentescomusaude`
--

CREATE TABLE `agentescomusaude` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `matricula` varchar(20) DEFAULT NULL,
  `equipe` enum('Asteca','Dumont','Veteranos','Força do Amanhã') DEFAULT NULL,
  `cpffunc` varchar(14) DEFAULT NULL,
  `rgfunc` varchar(12) DEFAULT NULL,
  `datanascimento` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `sexo` enum('Feminino','Masculino','Outro') DEFAULT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `tiposanguineo` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `consulta`
--

CREATE TABLE `consulta` (
  `id` int(11) NOT NULL,
  `nomepaciente` varchar(100) DEFAULT NULL,
  `cpfpaciente` varchar(14) DEFAULT NULL,
  `numcartaosus` varchar(15) DEFAULT NULL,
  `motivoconsulta` varchar(200) DEFAULT NULL,
  `profissionalsolicitante` varchar(100) DEFAULT NULL,
  `dataconsulta` date DEFAULT NULL,
  `horaconsulta` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `enfermeiros`
--

CREATE TABLE `enfermeiros` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `matricula` varchar(20) DEFAULT NULL,
  `COREN` varchar(20) DEFAULT NULL,
  `equipe` enum('Asteca','Dumont','Veteranos','Força do Amanhã') DEFAULT NULL,
  `cpffunc` varchar(14) DEFAULT NULL,
  `rgfunc` varchar(12) DEFAULT NULL,
  `datanascimento` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `sexo` enum('Feminino','Masculino','Outro') DEFAULT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `tiposanguineo` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `exames`
--

CREATE TABLE `exames` (
  `id` int(11) NOT NULL,
  `nomepaciente` varchar(50) DEFAULT NULL,
  `tipoexame` varchar(100) DEFAULT NULL,
  `dataexame` date DEFAULT NULL,
  `dataprevisao` date DEFAULT NULL,
  `pronto` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `exames`
--

INSERT INTO `exames` (`id`, `nomepaciente`, `tipoexame`, `dataexame`, `dataprevisao`, `pronto`) VALUES
(1, 'Marina Diamantes', 'Ultrasonografia', '2023-09-01', NULL, 0),
(4, 'Dolores Santana Milkov', 'Eletrocefalograma', '2023-09-01', NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `matricula` varchar(20) DEFAULT NULL,
  `equipe` varchar(50) DEFAULT NULL,
  `cpffunc` varchar(14) DEFAULT NULL,
  `rgfunc` varchar(12) DEFAULT NULL,
  `datanascimento` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `sexo` enum('Feminino','Masculino','Outro') DEFAULT NULL,
  `enderecofunc` varchar(200) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `statusfunc` enum('Ativo','Inativo') DEFAULT NULL,
  `tiposanguineo` varchar(5) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `tipo`, `nome`, `matricula`, `equipe`, `cpffunc`, `rgfunc`, `datanascimento`, `email`, `sexo`, `enderecofunc`, `telefone`, `statusfunc`, `tiposanguineo`, `senha`) VALUES
(1, 'medico', 'Maria Silva Pereira', 'med12023', 'Asteca', '123.456.789-00', '46.125.809-2', '1985-11-10', 'dramariaspereira@email.com', 'Feminino', 'Avenida RJ, 201, rio de janeiro, RJ, Brasil', '(21)9876-5412', 'Ativo', 'AB', '$2y$10$rU5BONOjwRh3KnRGMxnVGOeV.Dm4mwLVUURO9pnJ9alpurI5aLDCG'),
(2, 'enfermeiro', 'Abelardo Di Bragança', 'enf223', 'Dumont', '321.456.789-00', '26.864.182-1', '1992-08-07', 'abeldb@email.com', 'Masculino', 'Avenida Luz, 202, rio de janeiro, RJ, Brasil', '(21) 99666-1712', 'Ativo', 'O+', '$2y$10$vZFQfSEUQeF6KxInL8eYluBu.0TY1QxDIZL.NvrG/pxDPNSaNGIkK'),
(3, 'agentescomusaude', 'Orlando Souza Cruise', 'ag323', 'Força do amanhã', '129.451.651-55', '54.169.081-4', '2001-01-02', 'cruise.orlando@email.com', 'Masculino', 'Rua dos pinhais azuis, 2477, rio de janeiro, RJ, Brasil', '(21) 97163-2857', 'Ativo', 'O-', '$2y$10$DtKu0qaA08RNOmAXubV7c.0EOqjXOKdnUcIwfklcHiGQ7OCG5N7YW'),
(4, 'medico', 'Pamela Lorde de François', 'med423', 'Veteranos', '838.206.464-77', '94.523.632-3', '1997-04-04', 'doutorapamelalf@email.com', 'Feminino', 'Rua do colegio, 789, rio de janeiro, RJ, Brasil.', '(21) 97632-0071', 'Ativo', 'A-', '$2y$10$1rupdRwkxng6nPduwnFHPOXgZwAHJ6t2OrqmYbjBnTWSzKTYrLPwm'),
(5, 'enfermeiro', 'Aurora Santos Luz', 'en523', 'Asteca', '414.987.997-44', '62.565.267-8', '1978-06-08', 'auroraenfermeira@email.com', 'Feminino', 'Rua Cristo amado, 33, rio de janeiro, RJ, Brasil', '(24) 97411-7797', 'Ativo', 'B+', '$2y$10$N5TEZGNQ5wBWIBbhAZQMi.girJuvOjuv8r5E/RDeLfOl0wGybh4AO'),
(6, 'agentescomusaude', 'João Benjamin dos Anjos', 'ag623', 'Força do amanhã', '269.756.066-17', '65.816.446-6', '1969-09-10', 'joaodosanjos@email.com', 'Masculino', 'Rua das palmeiras, 1001, rio de janeiro, RJ, Brasil.', '(22) 99803-1055', 'Ativo', 'A+', '$2y$10$SEw8QLSb4bwCFf2Y..xgXuu./YMsFsU0KiANnZWw92nOuPCkXrwai'),
(9, 'medico', 'Augusto César Lovato', 'med723', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$B8qtDLzhSV6eKwh9kPAliOkH3VZQv0Pa4A4g9v45f6BlNIFKnP186'),
(10, 'enfermeiro', 'Selena Maria ', 'enf823', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$gDZfFYI5blAlO/QkEWS0VOHprYXk3tnaHi54clQ6Pj97pp/9RLPIu'),
(11, 'agentescomusaude', 'Demetrio Devonne', 'ag923', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$ADc3nKSsZzMM0vx0Nx2xWOa7.iPxP5DfX3BHvpWH1bexuQmHK3q3C'),
(12, 'medico', 'Seokjin Park', 'med1023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$KBIpsCeuc5u3nhHtwrCuhO3Sjga/jXtMqy9DM1N9r//MFS9mlQYWy'),
(13, 'enfermeiro', 'Florence da Costa', 'enf1123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$P2KZ31hvc9x6L3f1PVff5.YRb8Wt0ww2QCYqtR5YIjCGgClCyb5Ki');

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicos`
--

CREATE TABLE `medicos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `matricula` varchar(20) DEFAULT NULL,
  `CRM` varchar(20) DEFAULT NULL,
  `equipe` enum('Asteca','Dumont','Veteranos','Força do Amanhã') DEFAULT NULL,
  `cpffunc` varchar(14) DEFAULT NULL,
  `rgfunc` varchar(12) DEFAULT NULL,
  `datanascimento` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `sexo` enum('Feminino','Masculino','Outro') DEFAULT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `tiposanguineo` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `niveisacesso`
--

CREATE TABLE `niveisacesso` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `descricao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `niveisacesso`
--

INSERT INTO `niveisacesso` (`id`, `tipo`, `descricao`) VALUES
(1, 'medico', 'Médico com acesso a todo o histórico e gerenciamento do paciente, marcação de consultas e exames.'),
(2, 'enfermeiro', 'Enfermeiro com acesso ao histórico do paciente e possibilidade de marcar consultas e ver resultado de exames.'),
(3, 'agentescomusaude', 'Agente de Saúde com permissão para cadastrar pacientes e ver resultado de exames.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `nomepaciente` varchar(100) DEFAULT NULL,
  `cpfpaciente` varchar(14) DEFAULT NULL,
  `rgpaciente` varchar(12) DEFAULT NULL,
  `enderecopaciente` varchar(100) DEFAULT NULL,
  `datanascimento` date DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `numcartaosus` varchar(15) DEFAULT NULL,
  `equipe` varchar(50) DEFAULT NULL,
  `nomemae` varchar(100) DEFAULT NULL,
  `nomepai` varchar(100) DEFAULT NULL,
  `raca` varchar(50) DEFAULT NULL,
  `sexo` enum('Feminino','Masculino','Outro') DEFAULT NULL,
  `tiposanguineo` varchar(5) DEFAULT NULL,
  `nacionalidade` enum('Brasileira','Estrangeira') DEFAULT NULL,
  `statuspac` enum('Ativo','Inativo') DEFAULT NULL,
  `doencapreexis` enum('Sim','Não') DEFAULT NULL,
  `detalhesdoenca` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `pacientes`
--

INSERT INTO `pacientes` (`id`, `nomepaciente`, `cpfpaciente`, `rgpaciente`, `enderecopaciente`, `datanascimento`, `telefone`, `email`, `numcartaosus`, `equipe`, `nomemae`, `nomepai`, `raca`, `sexo`, `tiposanguineo`, `nacionalidade`, `statuspac`, `doencapreexis`, `detalhesdoenca`) VALUES
(1, 'Dolores Santana Milkov', '170.272.660-67', '37.150.923-3', 'Avenida morada dos servos, 727, campo pequeno, rio de janeiro, RJ, Brasil', '1988-01-10', '219234-5678', 'lolamilkov@email.com', 'S-36075', 'Dumont', 'Jessica Santana', 'Vladymir Milkov', 'Branca', 'Feminino', 'AB', 'Brasileira', 'Ativo', 'Sim', 'Diabetes'),
(2, 'Marina Diamantes', '878.864.790-09', '85.824.730-6', 'Avenida primadona, 2008, rio de janeiro, rj, Brasil', '2005-02-05', '(21) 3372-7025', 'maridias@email.com', 'S-26099', 'Asteca', 'Paula Diamantes', 'Paolo Diamantes', 'Branca', 'Feminino', 'O-', 'Brasileira', 'Ativo', 'Não', NULL),
(3, 'Melanie Martinez', '845.864.677-38', '62.984.233-4', 'Rua ABC, 2010, rio de janeiro, RJ, Brasil', '1999-11-20', '(21) 3656-1500', 'melmar@email.com', 'S-12375', 'Força do Amanhã', 'Mariah Martinez', 'João Martinez', 'Branca', 'Outro', 'A-', 'Brasileira', 'Ativo', 'Sim', 'Hipertensão'),
(8, 'Rachel Braz Prucho', '94306185710', '213835526', 'Rua das palmeiras, 98, rio de janeiro, rj', '1962-01-23', '(21) 97353-0118', 'rbp.rachel2email.com', 'S-20214', 'Veteranos', 'Josefina Braz', 'Roberto Prucho', 'Preta', '', 'AB', 'Brasileira', 'Ativo', 'Sim', 'Tuberculose');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agentescomusaude`
--
ALTER TABLE `agentescomusaude`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `enfermeiros`
--
ALTER TABLE `enfermeiros`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `exames`
--
ALTER TABLE `exames`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `niveisacesso`
--
ALTER TABLE `niveisacesso`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agentescomusaude`
--
ALTER TABLE `agentescomusaude`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `enfermeiros`
--
ALTER TABLE `enfermeiros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `exames`
--
ALTER TABLE `exames`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `niveisacesso`
--
ALTER TABLE `niveisacesso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
