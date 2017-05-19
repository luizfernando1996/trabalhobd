
-- MySQL Script generated by MySQL Workbench
-- Sun May 14 00:37:09 2017
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Entidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Entidade` (
  `Nome` VARCHAR(50) NOT NULL,
  `TerritorioDeAbrangencia` VARCHAR(10) NULL,
  `Tipo` VARCHAR(50) NULL,
  PRIMARY KEY (`Nome`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Competicao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Competicao` (
  `Nome` VARCHAR(30) NOT NULL,
  `Abrangencia` VARCHAR(8) NULL,
  `SistemaPontuacao` VARCHAR(15) NULL,
  `Serie` CHAR(1) NULL COMMENT 'Chave primaria é sublinhada e estrangeira não. ',
  `NomeEntidade` VARCHAR(20) NOT NULL,
  `QuantidadeDeJogos` INT NULL,
  `Ano` DATE NOT NULL,
  PRIMARY KEY (`Nome`, `Ano`),
  INDEX `FkNomeEntidade_idx` (`NomeEntidade` ASC),
  CONSTRAINT `FkNomeEntidadeComp`
    FOREIGN KEY (`NomeEntidade`)
    REFERENCES `mydb`.`Entidade` (`Nome`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Estadio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Estadio` (
  `Nome` VARCHAR(50) NOT NULL,
  `Capacidade` INT NULL,
  `Cidade` VARCHAR(30) NULL,
  `Estado` VARCHAR(20) NULL,
  PRIMARY KEY (`Nome`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Auxiliar`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Auxiliar` (
  `Nome` VARCHAR(50) NOT NULL,
  `ComissaoTecnicaEquipe` VARCHAR(45) NULL,
  PRIMARY KEY (`Nome`),
  INDEX `FkComissaoEquipe_idx` (`ComissaoTecnicaEquipe` ASC),
  CONSTRAINT `FkComissaoEquipeAux`
    FOREIGN KEY (`ComissaoTecnicaEquipe`)
    REFERENCES `mydb`.`ComissaoTecnica` (`NomeEquipe`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`ComissaoTecnica`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`ComissaoTecnica` (
  `NomeEquipe` VARCHAR(45) NOT NULL,
  `NomeTecnico` VARCHAR(50) NOT NULL,
  `NomeAuxiliar` VARCHAR(50) NULL,
  INDEX `FkNomeEquipe_idx` (`NomeEquipe` ASC),
  INDEX `FkNomeTecnico_idx` (`NomeTecnico` ASC),
  INDEX `FkNomeAuxiliar_idx` (`NomeAuxiliar` ASC),
  PRIMARY KEY (`NomeEquipe`),
  CONSTRAINT `FkNomeEquipeCT`
    FOREIGN KEY (`NomeEquipe`)
    REFERENCES `mydb`.`Equipe` (`Nome`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FkNomeTecnicoCT`
    FOREIGN KEY (`NomeTecnico`)
    REFERENCES `mydb`.`Tecnico` (`Nome`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FkNomeAuxiliarCT`
    FOREIGN KEY (`NomeAuxiliar`)
    REFERENCES `mydb`.`Auxiliar` (`Nome`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Tecnico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Tecnico` (
  `Nome` VARCHAR(50) NOT NULL,
  `Equipe` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Nome`, `Equipe`),
  INDEX `FkNomeComissaoTecEqui_idx` (`Equipe` ASC),
  CONSTRAINT `FkNomeComissaoTecEqui`
    FOREIGN KEY (`Equipe`)
    REFERENCES `mydb`.`ComissaoTecnica` (`NomeEquipe`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Equipe`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Equipe` (
  `Nome` VARCHAR(45) NOT NULL,
  `Estado` VARCHAR(20) NULL,
  `NomeEstadio` VARCHAR(50) NOT NULL,
  `NomeTecnico` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`Nome`),
  INDEX `FkNomeEstadio_idx` (`NomeEstadio` ASC),
  INDEX `FkNomeTecnico_idx` (`NomeTecnico` ASC),
  CONSTRAINT `FkNomeEstadioEquipe`
    FOREIGN KEY (`NomeEstadio`)
    REFERENCES `mydb`.`Estadio` (`Nome`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FkNomeTecnicoEquipe`
    FOREIGN KEY (`NomeTecnico`)
    REFERENCES `mydb`.`Tecnico` (`Nome`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`EquipeDeArbitragem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`EquipeDeArbitragem` (
  `Id` INT NOT NULL,
  `NomeBanderinha1` VARCHAR(50) NOT NULL,
  `NomeBandeirinha2` VARCHAR(50) NULL,
  `NomeArbitro` VARCHAR(50) NULL,
  `NomeQuartoArbitro` VARCHAR(50) NULL,
  `NomeEntidade` VARCHAR(50) NOT NULL,
  `Delegado` VARCHAR(50) NULL,
  PRIMARY KEY (`Id`),
  INDEX `FkNomeEntidade_idx` (`NomeEntidade` ASC),
  CONSTRAINT `FkNomeEntidadeEquipeDeArbritragem`
    FOREIGN KEY (`NomeEntidade`)
    REFERENCES `mydb`.`Entidade` (`Nome`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Partida`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Partida` (
  `IDPartida` INT NOT NULL,
  `IDEquipeArbitragem` INT NOT NULL,
  `NomeEntidade` VARCHAR(50) NOT NULL,
  `Data` DATE NULL,
  `Hora` TIME NULL,
  `ResultadoFinal` VARCHAR(5) NULL COMMENT 'Resultado dos gols da partida.\nEstá tendo problema com gols marcados e sofridos.',
  `EquipeVencedora` VARCHAR(45) NULL,
  `DisputaDePenaltis` TINYINT(1) NULL DEFAULT 0,
  `GolQualificado` TINYINT(1) NULL DEFAULT 0,
  `NomeCompeticao` VARCHAR(30) NULL,
  `NomeEquipe` VARCHAR(45) NOT NULL,
  `NomeEstadio` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`IDPartida`),
  INDEX `FkNomeEntindade_idx` (`NomeEntidade` ASC),
  INDEX `FkNomeCompeticao_idx` (`NomeCompeticao` ASC),
  INDEX `FkNomeEquipe_idx` (`NomeEquipe` ASC),
  INDEX `FkEquipeDeArbitragem_idx` (`IDEquipeArbitragem` ASC),
  INDEX `FkNomeEstadio_idx` (`NomeEstadio` ASC),
  CONSTRAINT `FkNomeEntindadePartida`
    FOREIGN KEY (`NomeEntidade`)
    REFERENCES `mydb`.`Entidade` (`Nome`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FkNomeCompeticaoPartida`
    FOREIGN KEY (`NomeCompeticao`)
    REFERENCES `mydb`.`Competicao` (`Nome`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FkNomeEquipePartida`
    FOREIGN KEY (`NomeEquipe`)
    REFERENCES `mydb`.`Equipe` (`Nome`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FkIdEquipeDeArbitragemPartida`
    FOREIGN KEY (`IDEquipeArbitragem`)
    REFERENCES `mydb`.`EquipeDeArbitragem` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FkNomeEstadioPartida`
    FOREIGN KEY (`NomeEstadio`)
    REFERENCES `mydb`.`Estadio` (`Nome`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Jogador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Jogador` (
  `Posicao` VARCHAR(15) NULL,
  `Nome` VARCHAR(50) NULL,
  `DataNasc` DATE NULL,
  `Camisa` INT(3) NOT NULL,
  `NomeEquipe` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Camisa`, `NomeEquipe`),
  INDEX `FkEquipe_idx` (`NomeEquipe` ASC),
  CONSTRAINT `FkEquipeJogador`
    FOREIGN KEY (`NomeEquipe`)
    REFERENCES `mydb`.`Equipe` (`Nome`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`CompeticaoEquipe`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`CompeticaoEquipe` (
  `Posicao` INT(2) NULL,
  `NomeEquipe` VARCHAR(45) NOT NULL,
  `NomeDaCompeticao` VARCHAR(30) NOT NULL,
  `Pontuacao` INT(3) NULL,
  `GolsFavor` INT(2) NULL,
  `GolsContra` INT(2) NULL,
  INDEX `FkNomeEquipe_idx` (`NomeEquipe` ASC),
  INDEX `FkNomeCompeticao_idx` (`NomeDaCompeticao` ASC),
  PRIMARY KEY (`NomeEquipe`, `NomeDaCompeticao`),
  CONSTRAINT `FkNomeEquipeCompEqui`
    FOREIGN KEY (`NomeEquipe`)
    REFERENCES `mydb`.`Equipe` (`Nome`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FkNomeCompeticaoCompEqui`
    FOREIGN KEY (`NomeDaCompeticao`)
    REFERENCES `mydb`.`Competicao` (`Nome`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Transferencias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Transferencias` (
  `Camisa` INT(3) NOT NULL,
  `NomeEquipe$` VARCHAR(30) NOT NULL,
  `EquipeTransfereJogadorcol` VARCHAR(45) NULL,
  `JogadorNomeEquipeAnterior` VARCHAR(45) NULL,
  `ID` INT NOT NULL,
  INDEX `FkNomeEquipe_idx` (`NomeEquipe$` ASC),
  INDEX `FkCamisa_idx` (`Camisa` ASC),
  INDEX `FkNomeEquipeJogadorAtual_idx` (`JogadorNomeEquipeAnterior` ASC),
  PRIMARY KEY (`ID`),
  CONSTRAINT `FkNomeEquipeETJ`
    FOREIGN KEY (`NomeEquipe$`)
    REFERENCES `mydb`.`Equipe` (`Nome`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FkCamisaETJ`
    FOREIGN KEY (`Camisa`)
    REFERENCES `mydb`.`Jogador` (`Camisa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FkNomeEquipeJogadorAnteriorETJ`
    FOREIGN KEY (`JogadorNomeEquipeAnterior`)
    REFERENCES `mydb`.`Jogador` (`NomeEquipe`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

















