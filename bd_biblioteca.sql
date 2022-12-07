-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04-Nov-2016 às 21:20
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `id_admin` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `funcao` varchar(300) NOT NULL,
  `senha` varchar(300) NOT NULL,
  `username` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`id_admin`, `nome`, `funcao`, `senha`, `username`) VALUES
(1, 'camila yumi koike', 'professor', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `id_aluno` int(11) NOT NULL,
  `matricula` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `serie` varchar(30) NOT NULL,
  `data_validade` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id_aluno`, `matricula`, `nome`, `serie`, `data_validade`) VALUES
(2, 1, 'ccc', '3 Ano E.F', '2016-11-26'),
(3, 2, 'asd', '6 Ano E.F', '2016-12-02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimos`
--

CREATE TABLE `emprestimos` (
  `id_emprestimo` int(11) NOT NULL,
  `id_aluno_FK` int(11) NOT NULL,
  `id_livro_FK` int(11) NOT NULL,
  `data_emprestimo` date NOT NULL,
  `data_devolucao` date NOT NULL,
  `ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `emprestimos`
--

INSERT INTO `emprestimos` (`id_emprestimo`, `id_aluno_FK`, `id_livro_FK`, `data_emprestimo`, `data_devolucao`, `ativo`) VALUES
(1, 2, 11, '2016-11-04', '2016-11-11', 0),
(2, 2, 12, '2016-11-04', '2016-11-11', 0),
(4, 2, 10, '2016-11-04', '2016-11-11', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `id_livro` int(11) NOT NULL,
  `titulo` varchar(300) NOT NULL,
  `autores` varchar(300) NOT NULL,
  `classificacao` varchar(300) NOT NULL,
  `ano` int(11) DEFAULT NULL,
  `numero` int(11) NOT NULL,
  `pag_reg` int(11) NOT NULL,
  `edicao` int(11) DEFAULT NULL,
  `exemplares` int(11) NOT NULL,
  `disponivel` int(11) NOT NULL,
  `volume` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id_livro`, `titulo`, `autores`, `classificacao`, `ano`, `numero`, `pag_reg`, `edicao`, `exemplares`, `disponivel`, `volume`) VALUES
(10, 'joaninha', 'fernanda', 'fada', 2015, 1, 2, 2, 2, 2, 2),
(11, 'Livro 2', 'JoÃ£o', 'contos', 0, 123, 98, 0, 4, 4, 0),
(12, 'asd', 'Asd', 'sdf', 231, 12321, 123, 23, 3, 3, 3),
(13, 'sAS', 'Sas', 'aWE', 21, 23, 23, 23, 3, 3, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id_aluno`),
  ADD UNIQUE KEY `matricula` (`matricula`);

--
-- Indexes for table `emprestimos`
--
ALTER TABLE `emprestimos`
  ADD PRIMARY KEY (`id_emprestimo`),
  ADD KEY `id_aluno_FK` (`id_aluno_FK`),
  ADD KEY `id_livro_FK` (`id_livro_FK`);

--
-- Indexes for table `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id_livro`),
  ADD UNIQUE KEY `numero` (`numero`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `emprestimos`
--
ALTER TABLE `emprestimos`
  MODIFY `id_emprestimo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `livros`
--
ALTER TABLE `livros`
  MODIFY `id_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `emprestimos`
--
ALTER TABLE `emprestimos`
  ADD CONSTRAINT `emprestimos_ibfk_1` FOREIGN KEY (`id_aluno_FK`) REFERENCES `alunos` (`id_aluno`),
  ADD CONSTRAINT `emprestimos_ibfk_2` FOREIGN KEY (`id_livro_FK`) REFERENCES `livros` (`id_livro`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
