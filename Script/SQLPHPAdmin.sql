-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14-Maio-2017 às 03:45
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `auxiliar`
--

CREATE TABLE `auxiliar` (
  `Nome` varchar(50) NOT NULL,
  `ComissaoTecnicaEquipe` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comissaotecnica`
--

CREATE TABLE `comissaotecnica` (
  `NomeEquipe` varchar(45) NOT NULL,
  `NomeTecnico` varchar(50) NOT NULL,
  `NomeAuxiliar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `competicao`
--

CREATE TABLE `competicao` (
  `Nome` varchar(30) NOT NULL,
  `Abrangencia` varchar(8) DEFAULT NULL,
  `SistemaPontuacao` varchar(15) DEFAULT NULL,
  `Serie` char(1) DEFAULT NULL COMMENT 'Chave primaria é sublinhada e estrangeira não. ',
  `NomeEntidade` varchar(20) NOT NULL,
  `QuantidadeDeJogos` int(11) DEFAULT NULL,
  `Ano` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `competicaoequipe`
--

CREATE TABLE `competicaoequipe` (
  `Posicao` int(2) DEFAULT NULL,
  `NomeEquipe` varchar(45) NOT NULL,
  `NomeDaCompeticao` varchar(30) NOT NULL,
  `Pontuacao` int(3) DEFAULT NULL,
  `GolsFavor` int(2) DEFAULT NULL,
  `GolsContra` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `entidade`
--

CREATE TABLE `entidade` (
  `Nome` varchar(50) NOT NULL,
  `TerritorioDeAbrangencia` varchar(10) DEFAULT NULL,
  `Tipo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipe`
--

CREATE TABLE `equipe` (
  `Nome` varchar(45) NOT NULL,
  `Estado` varchar(20) DEFAULT NULL,
  `NomeEstadio` varchar(50) NOT NULL,
  `NomeTecnico` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipedearbitragem`
--

CREATE TABLE `equipedearbitragem` (
  `Id` int(11) NOT NULL,
  `NomeBanderinha1` varchar(50) NOT NULL,
  `NomeBandeirinha2` varchar(50) DEFAULT NULL,
  `NomeArbitro` varchar(50) DEFAULT NULL,
  `NomeQuartoArbitro` varchar(50) DEFAULT NULL,
  `NomeEntidade` varchar(50) NOT NULL,
  `Delegado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estadio`
--

CREATE TABLE `estadio` (
  `Nome` varchar(50) NOT NULL,
  `Capacidade` int(11) DEFAULT NULL,
  `Cidade` varchar(30) DEFAULT NULL,
  `Estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogador`
--

CREATE TABLE `jogador` (
  `Posicao` varchar(15) DEFAULT NULL,
  `Nome` varchar(50) DEFAULT NULL,
  `DataNasc` date DEFAULT NULL,
  `Camisa` int(3) NOT NULL,
  `NomeEquipe` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `partida`
--

CREATE TABLE `partida` (
  `IDPartida` int(11) NOT NULL,
  `IDEquipeArbitragem` int(11) NOT NULL,
  `NomeEntidade` varchar(50) NOT NULL,
  `Data` date DEFAULT NULL,
  `Hora` time DEFAULT NULL,
  `ResultadoFinal` varchar(5) DEFAULT NULL COMMENT 'Resultado dos gols da partida.\nEstá tendo problema com gols marcados e sofridos.',
  `EquipeVencedora` varchar(45) DEFAULT NULL,
  `DisputaDePenaltis` tinyint(1) DEFAULT '0',
  `GolQualificado` tinyint(1) DEFAULT '0',
  `NomeCompeticao` varchar(30) DEFAULT NULL,
  `NomeEquipe` varchar(45) NOT NULL,
  `NomeEstadio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tecnico`
--

CREATE TABLE `tecnico` (
  `Nome` varchar(50) NOT NULL,
  `Equipe` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `transferencias`
--

CREATE TABLE `transferencias` (
  `Camisa` int(3) NOT NULL,
  `NomeEquipe$` varchar(30) NOT NULL,
  `EquipeTransfereJogadorcol` varchar(45) DEFAULT NULL,
  `JogadorNomeEquipeAnterior` varchar(45) DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auxiliar`
--
ALTER TABLE `auxiliar`
  ADD PRIMARY KEY (`Nome`),
  ADD KEY `FkComissaoEquipe_idx` (`ComissaoTecnicaEquipe`);

--
-- Indexes for table `comissaotecnica`
--
ALTER TABLE `comissaotecnica`
  ADD PRIMARY KEY (`NomeEquipe`),
  ADD KEY `FkNomeEquipe_idx` (`NomeEquipe`),
  ADD KEY `FkNomeTecnico_idx` (`NomeTecnico`),
  ADD KEY `FkNomeAuxiliar_idx` (`NomeAuxiliar`);

--
-- Indexes for table `competicao`
--
ALTER TABLE `competicao`
  ADD PRIMARY KEY (`Nome`,`Ano`),
  ADD KEY `FkNomeEntidade_idx` (`NomeEntidade`);

--
-- Indexes for table `competicaoequipe`
--
ALTER TABLE `competicaoequipe`
  ADD PRIMARY KEY (`NomeEquipe`,`NomeDaCompeticao`),
  ADD KEY `FkNomeEquipe_idx` (`NomeEquipe`),
  ADD KEY `FkNomeCompeticao_idx` (`NomeDaCompeticao`);

--
-- Indexes for table `entidade`
--
ALTER TABLE `entidade`
  ADD PRIMARY KEY (`Nome`);

--
-- Indexes for table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`Nome`),
  ADD KEY `FkNomeEstadio_idx` (`NomeEstadio`),
  ADD KEY `FkNomeTecnico_idx` (`NomeTecnico`);

--
-- Indexes for table `equipedearbitragem`
--
ALTER TABLE `equipedearbitragem`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FkNomeEntidade_idx` (`NomeEntidade`);

--
-- Indexes for table `estadio`
--
ALTER TABLE `estadio`
  ADD PRIMARY KEY (`Nome`);

--
-- Indexes for table `jogador`
--
ALTER TABLE `jogador`
  ADD PRIMARY KEY (`Camisa`,`NomeEquipe`),
  ADD KEY `FkEquipe_idx` (`NomeEquipe`);

--
-- Indexes for table `partida`
--
ALTER TABLE `partida`
  ADD PRIMARY KEY (`IDPartida`),
  ADD KEY `FkNomeEntindade_idx` (`NomeEntidade`),
  ADD KEY `FkNomeCompeticao_idx` (`NomeCompeticao`),
  ADD KEY `FkNomeEquipe_idx` (`NomeEquipe`),
  ADD KEY `FkEquipeDeArbitragem_idx` (`IDEquipeArbitragem`),
  ADD KEY `FkNomeEstadio_idx` (`NomeEstadio`);

--
-- Indexes for table `tecnico`
--
ALTER TABLE `tecnico`
  ADD PRIMARY KEY (`Nome`,`Equipe`),
  ADD KEY `FkNomeComissaoTecEqui_idx` (`Equipe`);

--
-- Indexes for table `transferencias`
--
ALTER TABLE `transferencias`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FkNomeEquipe_idx` (`NomeEquipe$`),
  ADD KEY `FkCamisa_idx` (`Camisa`),
  ADD KEY `FkNomeEquipeJogadorAtual_idx` (`JogadorNomeEquipeAnterior`);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `auxiliar`
--
ALTER TABLE `auxiliar`
  ADD CONSTRAINT `FkComissaoEquipeAux` FOREIGN KEY (`ComissaoTecnicaEquipe`) REFERENCES `comissaotecnica` (`NomeEquipe`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `comissaotecnica`
--
ALTER TABLE `comissaotecnica`
  ADD CONSTRAINT `FkNomeAuxiliarCT` FOREIGN KEY (`NomeAuxiliar`) REFERENCES `auxiliar` (`Nome`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FkNomeEquipeCT` FOREIGN KEY (`NomeEquipe`) REFERENCES `equipe` (`Nome`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FkNomeTecnicoCT` FOREIGN KEY (`NomeTecnico`) REFERENCES `tecnico` (`Nome`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `competicao`
--
ALTER TABLE `competicao`
  ADD CONSTRAINT `FkNomeEntidadeComp` FOREIGN KEY (`NomeEntidade`) REFERENCES `entidade` (`Nome`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `competicaoequipe`
--
ALTER TABLE `competicaoequipe`
  ADD CONSTRAINT `FkNomeCompeticaoCompEqui` FOREIGN KEY (`NomeDaCompeticao`) REFERENCES `competicao` (`Nome`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FkNomeEquipeCompEqui` FOREIGN KEY (`NomeEquipe`) REFERENCES `equipe` (`Nome`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `equipe`
--
ALTER TABLE `equipe`
  ADD CONSTRAINT `FkNomeEstadioEquipe` FOREIGN KEY (`NomeEstadio`) REFERENCES `estadio` (`Nome`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FkNomeTecnicoEquipe` FOREIGN KEY (`NomeTecnico`) REFERENCES `tecnico` (`Nome`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `equipedearbitragem`
--
ALTER TABLE `equipedearbitragem`
  ADD CONSTRAINT `FkNomeEntidadeEquipeDeArbritragem` FOREIGN KEY (`NomeEntidade`) REFERENCES `entidade` (`Nome`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `jogador`
--
ALTER TABLE `jogador`
  ADD CONSTRAINT `FkEquipeJogador` FOREIGN KEY (`NomeEquipe`) REFERENCES `equipe` (`Nome`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `partida`
--
ALTER TABLE `partida`
  ADD CONSTRAINT `FkIdEquipeDeArbitragemPartida` FOREIGN KEY (`IDEquipeArbitragem`) REFERENCES `equipedearbitragem` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FkNomeCompeticaoPartida` FOREIGN KEY (`NomeCompeticao`) REFERENCES `competicao` (`Nome`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FkNomeEntindadePartida` FOREIGN KEY (`NomeEntidade`) REFERENCES `entidade` (`Nome`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FkNomeEquipePartida` FOREIGN KEY (`NomeEquipe`) REFERENCES `equipe` (`Nome`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FkNomeEstadioPartida` FOREIGN KEY (`NomeEstadio`) REFERENCES `estadio` (`Nome`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tecnico`
--
ALTER TABLE `tecnico`
  ADD CONSTRAINT `FkNomeComissaoTecEqui` FOREIGN KEY (`Equipe`) REFERENCES `comissaotecnica` (`NomeEquipe`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `transferencias`
--
ALTER TABLE `transferencias`
  ADD CONSTRAINT `FkCamisaETJ` FOREIGN KEY (`Camisa`) REFERENCES `jogador` (`Camisa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FkNomeEquipeETJ` FOREIGN KEY (`NomeEquipe$`) REFERENCES `equipe` (`Nome`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FkNomeEquipeJogadorAnteriorETJ` FOREIGN KEY (`JogadorNomeEquipeAnterior`) REFERENCES `jogador` (`NomeEquipe`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
