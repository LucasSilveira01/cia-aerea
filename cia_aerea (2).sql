-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Jul-2022 às 00:47
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cia_aerea`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aeroporto`
--

CREATE TABLE `aeroporto` (
  `CodAeroporto` int(11) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Cidade` varchar(255) NOT NULL,
  `Estado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aeroporto`
--

INSERT INTO `aeroporto` (`CodAeroporto`, `Nome`, `Cidade`, `Estado`) VALUES
(1, 'Aeroporto Internacional de Belo Horizonte-Confins', 'Belo Horizonte', 'Minas Gerais'),
(2, 'Aeroporto de Congonhas', 'São Paulo', 'São Paulo'),
(3, 'Aeporto Santos-Dumon', 'Rio de Janeiro', 'Rio de Janeiro'),
(4, 'Aeroporto Internacional de Salvador', 'Salvador', 'Bahia'),
(5, 'Aeroporto Internacional do Recife-Guararapes', 'Recife', 'Pernambuco');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aviao`
--

CREATE TABLE `aviao` (
  `CodAviao` int(11) NOT NULL,
  `QtLugares` int(11) NOT NULL,
  `Tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aviao`
--

INSERT INTO `aviao` (`CodAviao`, `QtLugares`, `Tipo`) VALUES
(1, 4, 'Simples'),
(2, 1, 'Particular'),
(3, 10, 'Comercial'),
(4, 5, 'Comercial'),
(5, 3, 'Jatos de grande porte');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `Cpf` int(11) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Passageiro` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`Cpf`, `Nome`, `Passageiro`) VALUES
(1231231, 'Lucas', 1),
(1121141231, 'Alanis Viana', 0),
(1131241531, 'Matheus Freire', 0),
(1324567897, 'Lucas da Silveira', 1),
(1327123121, 'André Oliveira', 1),
(2131451424, 'Luísa Oliveira', 1);

--
-- Acionadores `cliente`
--
DELIMITER $$
CREATE TRIGGER `cliente_passageiro` BEFORE INSERT ON `cliente` FOR EACH ROW if(NEW.Passageiro = True) THEN
   insert into Passageiro values(NEW.Cpf, New.Nome);
end if
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `compras`
--

CREATE TABLE `compras` (
  `Cpf` int(11) NOT NULL,
  `CodTicket` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `compras`
--

INSERT INTO `compras` (`Cpf`, `CodTicket`, `id`) VALUES
(1327123121, 2, 1),
(1324567897, 1, 2),
(2131451424, 3, 3),
(1131241531, 5, 4),
(1121141231, 4, 5),
(1231231, 0, 52);

-- --------------------------------------------------------

--
-- Estrutura da tabela `passageiro`
--

CREATE TABLE `passageiro` (
  `Cpf` int(11) NOT NULL,
  `Nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `passageiro`
--

INSERT INTO `passageiro` (`Cpf`, `Nome`) VALUES
(1231231, 'Lucas'),
(41231123, 'LuanF'),
(1324567897, 'Lucas da Silveira'),
(1327123121, 'André Oliveira'),
(1435612531, 'Luan Felipe'),
(1562871026, 'Marcos Silva'),
(2131451424, 'Luísa Oliveira');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ticket`
--

CREATE TABLE `ticket` (
  `CodTicket` int(11) NOT NULL,
  `Comprador` int(11) DEFAULT NULL,
  `Passageiro` int(11) DEFAULT NULL,
  `CodVoo` int(11) DEFAULT NULL,
  `poltrona` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ticket`
--

INSERT INTO `ticket` (`CodTicket`, `Comprador`, `Passageiro`, `CodVoo`, `poltrona`) VALUES
(0, 1231231, 41231123, 2, 2),
(1, 1324567897, 1324567897, 1, 1),
(2, 1327123121, 1327123121, 2, 1),
(3, 2131451424, 2131451424, 4, 3),
(4, 1121141231, 1562871026, 5, 1),
(5, 1131241531, 1435612531, 3, 1);

--
-- Acionadores `ticket`
--
DELIMITER $$
CREATE TRIGGER `ticket_compra` AFTER INSERT ON `ticket` FOR EACH ROW insert into compras(`CodTicket`, `Cpf`) values(NEW.CodTicket, NEW.Comprador)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `voo`
--

CREATE TABLE `voo` (
  `CodVoo` int(11) NOT NULL,
  `AeroportoPartida` int(11) DEFAULT NULL,
  `DataPartida` date NOT NULL,
  `HoraPartida` time(6) NOT NULL,
  `AeroportoChegada` int(11) DEFAULT NULL,
  `DataChegada` date NOT NULL,
  `HoraChegada` time(6) NOT NULL,
  `CodAviao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `voo`
--

INSERT INTO `voo` (`CodVoo`, `AeroportoPartida`, `DataPartida`, `HoraPartida`, `AeroportoChegada`, `DataChegada`, `HoraChegada`, `CodAviao`) VALUES
(1, 1, '2022-06-25', '12:47:01.000000', 3, '2022-06-25', '13:47:01.000000', 1),
(2, 2, '2022-06-26', '09:51:22.000000', 4, '2022-06-26', '13:47:59.000000', 2),
(3, 3, '2022-06-26', '13:48:39.000000', 5, '2022-06-26', '15:48:39.000000', 5),
(4, 4, '2022-06-27', '23:49:20.000000', 1, '2022-06-28', '03:49:20.000000', 1),
(5, 5, '2022-06-28', '14:50:10.000000', 2, '2022-06-29', '18:50:10.000000', 3);

--
-- Acionadores `voo`
--
DELIMITER $$
CREATE TRIGGER `Data_trigger` BEFORE INSERT ON `voo` FOR EACH ROW if(date_format(NEW.DataPartida, '%m-%d-%Y') < date_format(SYSDATE(), '%m-%d-%Y')) THEN
	SIGNAL SQLSTATE '45012' SET MESSAGE_TEXT = 'A data de partida não pode ser anterior ao dia atual';
end if
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `hora_chegada` BEFORE INSERT ON `voo` FOR EACH ROW if(date_format(NEW.DataPartida, '%m-%d-%Y') = date_format(NEW.DataChegada, '%m-%d-%Y')) THEN
	if(NEW.HoraPartida > NEW.HoraChegada) THEN
		SIGNAL SQLSTATE '45001' SET MESSAGE_TEXT = 'A Hora de chegada não pode ser menor do que a hora de partida';
    end if;
end if
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `lugares_trigger` BEFORE INSERT ON `voo` FOR EACH ROW if((select aviao.QtLugares from aviao where CodAviao = NEW.CodAviao) <= (select count(*) from voo where voo.CodAviao = NEW.CodAviao)) THEN
		SIGNAL SQLSTATE '45002' SET MESSAGE_TEXT = 'A quantidade máxima já foi atingida';
end if
$$
DELIMITER ;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aeroporto`
--
ALTER TABLE `aeroporto`
  ADD PRIMARY KEY (`CodAeroporto`);

--
-- Índices para tabela `aviao`
--
ALTER TABLE `aviao`
  ADD PRIMARY KEY (`CodAviao`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Cpf`);

--
-- Índices para tabela `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `passageiro`
--
ALTER TABLE `passageiro`
  ADD PRIMARY KEY (`Cpf`);

--
-- Índices para tabela `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`CodTicket`),
  ADD KEY `ticket_passageiro_fk` (`Passageiro`),
  ADD KEY `ticket_comprador_fk` (`Comprador`),
  ADD KEY `ticket_voo_fk` (`CodVoo`);

--
-- Índices para tabela `voo`
--
ALTER TABLE `voo`
  ADD PRIMARY KEY (`CodVoo`) USING BTREE,
  ADD KEY `voo_aeropartida_fk` (`AeroportoPartida`),
  ADD KEY `voo_aerochegada_fk` (`AeroportoChegada`),
  ADD KEY `voo_aviao_fk` (`CodAviao`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_comprador_fk` FOREIGN KEY (`Comprador`) REFERENCES `cliente` (`Cpf`),
  ADD CONSTRAINT `ticket_passageiro_fk` FOREIGN KEY (`Passageiro`) REFERENCES `passageiro` (`Cpf`),
  ADD CONSTRAINT `ticket_voo_fk` FOREIGN KEY (`CodVoo`) REFERENCES `voo` (`CodVoo`);

--
-- Limitadores para a tabela `voo`
--
ALTER TABLE `voo`
  ADD CONSTRAINT `voo_aerochegada_fk` FOREIGN KEY (`AeroportoChegada`) REFERENCES `aeroporto` (`CodAeroporto`),
  ADD CONSTRAINT `voo_aeropartida_fk` FOREIGN KEY (`AeroportoPartida`) REFERENCES `aeroporto` (`CodAeroporto`),
  ADD CONSTRAINT `voo_aviao_fk` FOREIGN KEY (`CodAviao`) REFERENCES `aviao` (`CodAviao`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
