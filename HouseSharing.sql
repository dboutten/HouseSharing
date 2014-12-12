SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `housesharing` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `housesharing` ;


-- Table `housesharing`.`user`

CREATE TABLE IF NOT EXISTS `housesharing`.`user` (
  `iduser` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `prenom` VARCHAR(45) NOT NULL,
  `datenaissance` DATETIME NOT NULL,
  `telephone` VARCHAR(12) NULL,
  `mail` VARCHAR(45) NOT NULL,
  `identifiant` VARCHAR(45) NOT NULL,
  `mdp` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`iduser`))
ENGINE = InnoDB;



-- Table `housesharing`.`appartement`

CREATE TABLE IF NOT EXISTS `housesharing`.`appart` (
  `idappart` INT NOT NULL AUTO_INCREMENT,
  `adresse` TEXT NOT NULL,
  `taille` INT NOT NULL,
  `nombrepiece` INT NOT NULL,
  `iduser` INT NOT NULL,
  `ville` VARCHAR(45) NOT NULL,
  `nbrepers` INT NOT NULL,
  PRIMARY KEY (`idappart`),
  INDEX `fk_appart_user_idx` (`iduser` ASC))
ENGINE = InnoDB;



-- Table `housesharing`.`critere`

CREATE TABLE IF NOT EXISTS `housesharing`.`critere` (
  `idcritere` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `description` TEXT NOT NULL,
  `type` VARCHAR(45) NOT NULL,
  `idappart` INT NOT NULL,
  PRIMARY KEY (`idcritere`),
  INDEX `fk_critere_appart1_idx` (`idappart` ASC))
ENGINE = InnoDB;



-- Table `housesharing`.`disponibilites`

CREATE TABLE IF NOT EXISTS `housesharing`.`disponibilites` (
  `iddisponibilites` INT NOT NULL AUTO_INCREMENT,
  `datedebut` DATETIME NOT NULL,
  `datefin` DATE NOT NULL,
  `idappart` INT NOT NULL,
  PRIMARY KEY (`iddisponibilites`),
  INDEX `fk_disponibilites_appart1_idx` (`idappart` ASC))
ENGINE = InnoDB;



-- Table `housesharing`.`message`

CREATE TABLE IF NOT EXISTS `housesharing`.`message` (
  `idmessage` INT NOT NULL AUTO_INCREMENT,
  `iduserenvoie` INT NOT NULL,
  `iduserdestinataire` INT NOT NULL,
  `date` DATETIME NOT NULL,
  `titre` VARCHAR(45) NOT NULL,
  `text` LONGTEXT NOT NULL,
  PRIMARY KEY (`idmessage`),
  INDEX `fk_message_user1_idx` (`iduserenvoie` ASC),
  INDEX `fk_message_user2_idx` (`iduserdestinataire` ASC))
ENGINE = InnoDB;



-- Table `housesharing`.`forumpost`

CREATE TABLE IF NOT EXISTS `housesharing`.`forumpost` (
  `idforumpost` INT NOT NULL AUTO_INCREMENT,
  `titre` VARCHAR(45) NOT NULL,
  `contenu` LONGTEXT NOT NULL,
  `iduser` INT NOT NULL,
  `date` DATETIME NOT NULL,
  PRIMARY KEY (`idforumpost`),
  INDEX `fk_forumpremiermessage_user1_idx` (`iduser` ASC))
ENGINE = InnoDB;



-- Table `housesharing`.`forumresponse`

CREATE TABLE IF NOT EXISTS `housesharing`.`forumresponse` (
  `idforumresponse` INT NOT NULL AUTO_INCREMENT,
  `contenu` LONGTEXT NOT NULL,
  `date` DATETIME NOT NULL,
  `idforumpost` INT NOT NULL,
  `iduser` INT NOT NULL,
  PRIMARY KEY (`idforumresponse`),
  INDEX `fk_forumresponse_forumpost1_idx` (`idforumpost` ASC),
  INDEX `fk_forumresponse_user1_idx` (`iduser` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
