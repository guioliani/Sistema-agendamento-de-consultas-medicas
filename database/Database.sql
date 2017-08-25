-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25-Ago-2017 às 23:58
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nivel` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`id`, `nome`, `email`, `senha`, `foto`, `nivel`, `status`) VALUES
(1, 'Suporte', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '', 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `id_medico` int(11) NOT NULL,
  `nome_medico` varchar(255) NOT NULL,
  `idade` int(11) NOT NULL,
  `sexo` varchar(5) NOT NULL,
  `endereco_consulta` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `estado` varchar(5) NOT NULL,
  `especializacao` varchar(255) NOT NULL,
  `numregistro` varchar(255) NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `agenda`
--

INSERT INTO `agenda` (`id`, `id_medico`, `nome_medico`, `idade`, `sexo`, `endereco_consulta`, `telefone`, `estado`, `especializacao`, `numregistro`, `valor`, `data`, `hora`, `status`) VALUES
(1, 1, 'jose dos santos', 0, 'm', 'avenida nao sei asdasdasdasd', '515151519', 'SP', 'cardiologista', '628181', '250', '2017-06-30', '12:17:00', 0),
(2, 2, 'antonio dos santos', 39, 'm', 'avenida nao sei', '61502588', 'RJ', 'cardiologista', '628181', '251', '2017-06-25', '15:30:00', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `codigo_senha`
--

CREATE TABLE `codigo_senha` (
  `id` int(11) NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `codigo_senha`
--

INSERT INTO `codigo_senha` (`id`, `codigo`, `data`) VALUES
(1, 'Z3VpbGhlcm1lYWd1dG9saUBnbWFpbC5jb20=', '2017-06-18 18:37:43'),
(2, 'Z3VpbGhlcm1lYWd1dG9saUBnbWFpbC5jb20=', '2017-06-18 18:41:13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `consulta_m`
--

CREATE TABLE `consulta_m` (
  `id` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_medico` int(11) NOT NULL,
  `nome_medico` varchar(255) NOT NULL,
  `tipoprof` varchar(255) NOT NULL,
  `end_consulta` varchar(255) NOT NULL,
  `nome_paciente` varchar(255) NOT NULL,
  `telefone_paciente` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `consulta_m`
--

INSERT INTO `consulta_m` (`id`, `id_paciente`, `id_medico`, `nome_medico`, `tipoprof`, `end_consulta`, `nome_paciente`, `telefone_paciente`, `data`, `hora`, `status`) VALUES
(39, 1, 1, 'jose dos santos', 'cardiologista', 'avenida nao sei asdasdasdasd', 'Guilherme agutoli oliani', '55555', '2017-06-25', '15:17:00', 1),
(40, 1, 1, 'antonio dos santos', 'cardiologista', 'avenida nao sei', 'Guilherme agutoli oliani', '55555', '2017-06-25', '15:30:00', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem_enviada`
--

CREATE TABLE `mensagem_enviada` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(255) NOT NULL,
  `email_usuario` varchar(255) NOT NULL,
  `mensagem` text NOT NULL,
  `status` int(11) NOT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `mensagem_enviada`
--

INSERT INTO `mensagem_enviada` (`id`, `id_usuario`, `nome_usuario`, `email_usuario`, `mensagem`, `status`, `nivel`) VALUES
(1, 1, 'Guilherme agutoli oliani', 'guilhermeagutoli@gmail.com', 'mensagem teste enviado pelo painel administrador', 1, 1),
(2, 1, 'Guilherme agutoli oliani', 'guilhermeagutoli@gmail.com', 'mensagem teste enviado pelo painel administrador', 0, 1),
(3, 1, 'Guilherme agutoli oliani', 'guilhermeagutoli@gmail.com', 'mensagem teste enviado pelo painel administrador', 0, 1),
(4, 1, 'Guilherme agutoli oliani', 'guilhermeagutoli@gmail.com', 'mensagem enviado pelo painel administrador', 0, 1),
(5, 1, 'Guilherme agutoli oliani', 'guilhermeagutoli@gmail.com', 'mensagem nivel 2 resposta', 0, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `suporte`
--

CREATE TABLE `suporte` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `mensagem` text NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `suporte`
--

INSERT INTO `suporte` (`id`, `id_usuario`, `mensagem`, `nome`, `email`, `data`, `status`) VALUES
(3, 1, 'mensagem nivel 1 teste', 'Guilherme agutoli oliani', 'guilhermeagutoli@gmail.com', '2017-06-05 19:01:14', 1),
(4, 2, 'mensagem nivel 2 teste', 'jose dos santos', 'jose@jose.com', '2017-05-21 23:02:35', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_n`
--

CREATE TABLE `usuarios_n` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `idade` int(11) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `foto` varchar(40) NOT NULL,
  `nivel` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios_n`
--

INSERT INTO `usuarios_n` (`id`, `nome`, `email`, `idade`, `sexo`, `estado`, `telefone`, `endereco`, `senha`, `foto`, `nivel`, `status`) VALUES
(1, 'Guilherme agutoli oliani', 'guilhermeagutoli@gmail.com', 21, 'm', 'Selecione...', '55555', 'avenida francisco taques', '1a8d3178c4773b56eaa7da312f4af279', 'ba2dd1278fb93e04d1e0a747ac806f16.jpg', 1, 1),
(2, 'jose', 'jose@email.com', 34, 'm', 'SP', '54546464', 'avenida nao sei', '25f9e794323b453885f5181f1b624d0b', '', 1, 0),
(4, 'maria', 'maria@hotmail.com', 55, 'on', 'DF', '254625', 'nao sei 123', '25f9e794323b453885f5181f1b624d0b', 'f26adb1f52018bb90cc60b05bc8fc583.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_prof`
--

CREATE TABLE `usuarios_prof` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `idade` int(11) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `cpf` varchar(100) NOT NULL,
  `numreg` varchar(100) NOT NULL,
  `tipoprof` varchar(100) NOT NULL,
  `especializacao` varchar(255) NOT NULL,
  `valorconsulta` decimal(10,0) NOT NULL,
  `inicio` time NOT NULL,
  `termino` time NOT NULL,
  `senha` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nivel` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios_prof`
--

INSERT INTO `usuarios_prof` (`id`, `nome`, `email`, `idade`, `sexo`, `estado`, `telefone`, `endereco`, `cpf`, `numreg`, `tipoprof`, `especializacao`, `valorconsulta`, `inicio`, `termino`, `senha`, `foto`, `nivel`, `status`) VALUES
(1, 'jose dos santos', 'jose@jose.com', 39, 'on', 'PB', '2694961621', 'avenida nao sei', '6818181', '628181', 'medico', 'cardiologista', '100', '09:30:00', '15:30:00', '25f9e794323b453885f5181f1b624d0b', '', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `codigo_senha`
--
ALTER TABLE `codigo_senha`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consulta_m`
--
ALTER TABLE `consulta_m`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mensagem_enviada`
--
ALTER TABLE `mensagem_enviada`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suporte`
--
ALTER TABLE `suporte`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios_n`
--
ALTER TABLE `usuarios_n`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios_prof`
--
ALTER TABLE `usuarios_prof`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `codigo_senha`
--
ALTER TABLE `codigo_senha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `consulta_m`
--
ALTER TABLE `consulta_m`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `mensagem_enviada`
--
ALTER TABLE `mensagem_enviada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `suporte`
--
ALTER TABLE `suporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usuarios_n`
--
ALTER TABLE `usuarios_n`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usuarios_prof`
--
ALTER TABLE `usuarios_prof`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
