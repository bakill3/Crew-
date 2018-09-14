-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14-Set-2018 às 20:10
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_project`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `barcos`
--

CREATE TABLE `barcos` (
  `id_barco` int(11) NOT NULL,
  `barco` int(11) NOT NULL,
  `contagem` int(11) NOT NULL DEFAULT '0',
  `maximo` int(50) NOT NULL DEFAULT '15'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `barcos`
--

INSERT INTO `barcos` (`id_barco`, `barco`, `contagem`, `maximo`) VALUES
(1, 1, 15, 25),
(2, 2, 28, 40),
(4, 5, 55, 100);

-- --------------------------------------------------------

--
-- Estrutura da tabela `barcos_txt`
--

CREATE TABLE `barcos_txt` (
  `id_barco_txt` int(11) NOT NULL,
  `barco_nome` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `barcos_txt`
--

INSERT INTO `barcos_txt` (`id_barco_txt`, `barco_nome`) VALUES
(1, 'Costa Victoria'),
(2, 'Costa Concordia'),
(5, 'Epic Norwegian');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `sobrenome` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `email`, `nome`, `sobrenome`, `password`, `role`) VALUES
(2, 'deostulti2@gmail.com', 'Gabriel', 'Brandao', '$2y$10$NpRf0sB/IJwJxobDlf9rGuZCzGzpeqim2PI1yLI2yZjMgwQtjX3zy', 2),
(4, 'admin@gmail.com', 'Proctos', 'Admin', '$2y$10$8RBRp5bv7i/9xfbhiks8GuStVwdDw/B.nBfCxqrjUN2pdYsIkYAdO', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barcos`
--
ALTER TABLE `barcos`
  ADD PRIMARY KEY (`id_barco`),
  ADD KEY `barco` (`barco`);

--
-- Indexes for table `barcos_txt`
--
ALTER TABLE `barcos_txt`
  ADD PRIMARY KEY (`id_barco_txt`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barcos`
--
ALTER TABLE `barcos`
  MODIFY `id_barco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `barcos_txt`
--
ALTER TABLE `barcos_txt`
  MODIFY `id_barco_txt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `barcos`
--
ALTER TABLE `barcos`
  ADD CONSTRAINT `barcos_ibfk_1` FOREIGN KEY (`barco`) REFERENCES `barcos_txt` (`id_barco_txt`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
