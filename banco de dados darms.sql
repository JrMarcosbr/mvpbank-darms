-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 25-Set-2022 às 00:06
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `darms`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_adm`
--

DROP TABLE IF EXISTS `tb_adm`;
CREATE TABLE IF NOT EXISTS `tb_adm` (
  `id_adm` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome_adm` varchar(300) DEFAULT NULL,
  `cpf_adm` varchar(20) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `endereco` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id_adm`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_adm`
--

INSERT INTO `tb_adm` (`id_adm`, `nome_adm`, `cpf_adm`, `estado`, `endereco`) VALUES
(1, 'Marcão junior ', '084.013.673-01', 'Ceará', 'Rua Ercilio, Martins, 565, canindé'),
(2, 'Marcos Antonio Júnior', '800.000.000-25', 'AP', 'ercilo martins, 565, apartamento, campinas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cartao`
--

DROP TABLE IF EXISTS `tb_cartao`;
CREATE TABLE IF NOT EXISTS `tb_cartao` (
  `id_cartao` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tb_cartao_id_user` int(5) UNSIGNED NOT NULL,
  `num_cartao` varchar(40) NOT NULL,
  `tipo_card` int(5) NOT NULL,
  `bandeira_cartao` int(1) UNSIGNED NOT NULL,
  `cvc_cartao` int(1) UNSIGNED NOT NULL,
  `tempo_validade` varchar(3) NOT NULL,
  `data_validade` varchar(20) NOT NULL,
  `situacao` int(1) UNSIGNED NOT NULL,
  `card_novo` int(1) NOT NULL,
  `justificativa` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_cartao`),
  KEY `tb_cartao_FKIndex1` (`tb_cartao_id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_cartao`
--

INSERT INTO `tb_cartao` (`id_cartao`, `tb_cartao_id_user`, `num_cartao`, `tipo_card`, `bandeira_cartao`, `cvc_cartao`, `tempo_validade`, `data_validade`, `situacao`, `card_novo`, `justificativa`) VALUES
(3, 6, '4515 1315 1436 1313', 0, 0, 326, '2', '23/10', 1, 1, 'vsdvsdv'),
(6, 6, '7246 4425 6511 1849', 1, 3, 213, '2', '09/2022', 2, 0, 'justificativajhkcaca'),
(7, 6, '5151 5161 6151 6123', 0, 1, 120, '4', '23/03', 2, 1, 'bfdfbdfb fbd fbdfbdfb dgd fbdbdfbdfbdfbdfbdbd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cliente`
--

DROP TABLE IF EXISTS `tb_cliente`;
CREATE TABLE IF NOT EXISTS `tb_cliente` (
  `id_user` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome_user` varchar(200) NOT NULL,
  `email_user` varchar(300) NOT NULL,
  `cpf_user` varchar(20) NOT NULL,
  `contato_user` varchar(30) NOT NULL,
  `tipo_conta` int(1) UNSIGNED NOT NULL,
  `foto_user` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_cliente`
--

INSERT INTO `tb_cliente` (`id_user`, `nome_user`, `email_user`, `cpf_user`, `contato_user`, `tipo_conta`, `foto_user`) VALUES
(2, 'bdsfbdf', 'marcosjorgejr1@gmail.com', '435.084.136-02', '85988406679', 0, ' '),
(6, 'Marcos Antonio Pereira Jorge Júnior', 'marcosjorgejr1@hotmail.com', '088.515.151-56', '(85)9 8840-6679', 0, 'image/DivinaPastora1.jpg'),
(8, 'Marcos Antonio Pereira Jorge Júnior', 'marcos.junior08@aluno.ifce.edu.br', '545.454.554-54', '(85)9 5541-1232', 1, 'image/segurança_de_rede.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_endereco`
--

DROP TABLE IF EXISTS `tb_endereco`;
CREATE TABLE IF NOT EXISTS `tb_endereco` (
  `id_endereco` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tb_end_id_user` int(5) UNSIGNED NOT NULL,
  `endereco_user` varchar(400) NOT NULL,
  PRIMARY KEY (`id_endereco`),
  KEY `tb_endereco_FKIndex1` (`tb_end_id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_endereco`
--

INSERT INTO `tb_endereco` (`id_endereco`, `tb_end_id_user`, `endereco_user`) VALUES
(3, 6, 'ercilo martins, 565, apartamento, campinas'),
(5, 8, 'ercilo martins, 565, apartamento, campinas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_login`
--

DROP TABLE IF EXISTS `tb_login`;
CREATE TABLE IF NOT EXISTS `tb_login` (
  `id_login` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tb_login_id_user` int(5) UNSIGNED NOT NULL,
  `senha__user` varchar(300) NOT NULL,
  PRIMARY KEY (`id_login`),
  KEY `tb_login_FKIndex1` (`tb_login_id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_login`
--

INSERT INTO `tb_login` (`id_login`, `tb_login_id_user`, `senha__user`) VALUES
(3, 6, '2a084e55c87b1ebcdaad1f62fdbbac8e'),
(5, 8, '30bb3825e8f631cc6075c0f87bb4978c');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_login_admin`
--

DROP TABLE IF EXISTS `tb_login_admin`;
CREATE TABLE IF NOT EXISTS `tb_login_admin` (
  `id_login` int(5) NOT NULL AUTO_INCREMENT,
  `usuario_adm` int(5) UNSIGNED NOT NULL,
  `senha_adm` varchar(300) NOT NULL,
  PRIMARY KEY (`id_login`),
  KEY `usuario_adm` (`usuario_adm`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_login_admin`
--

INSERT INTO `tb_login_admin` (`id_login`, `usuario_adm`, `senha_adm`) VALUES
(1, 1, '51cece00aed19468f18042ad0606a3d3'),
(2, 2, '21232f297a57a5a743894a0e4a801fc3');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_cartao`
--
ALTER TABLE `tb_cartao`
  ADD CONSTRAINT `tb_cartao_ibfk_1` FOREIGN KEY (`tb_cartao_id_user`) REFERENCES `tb_cliente` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_endereco`
--
ALTER TABLE `tb_endereco`
  ADD CONSTRAINT `tb_endereco_ibfk_1` FOREIGN KEY (`tb_end_id_user`) REFERENCES `tb_cliente` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_login`
--
ALTER TABLE `tb_login`
  ADD CONSTRAINT `tb_login_ibfk_1` FOREIGN KEY (`tb_login_id_user`) REFERENCES `tb_cliente` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_login_admin`
--
ALTER TABLE `tb_login_admin`
  ADD CONSTRAINT `tb_login_admin_ibfk_1` FOREIGN KEY (`usuario_adm`) REFERENCES `tb_adm` (`id_adm`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
