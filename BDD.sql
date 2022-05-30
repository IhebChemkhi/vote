-- MySQL Script generated by MySQL Workbench
-- Mon May 30 22:10:03 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema vote
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema vote
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `vote` ;
USE `vote` ;

-- -----------------------------------------------------
-- Table `vote`.`t_vote_vote`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vote`.`t_vote_vote` (
  `vote_id` INT NOT NULL AUTO_INCREMENT,
  `vote_etat` CHAR(1) NOT NULL,
  `vote_urlPublic` VARCHAR(145) NOT NULL,
  `vote_urlPrive` VARCHAR(145) NOT NULL,
  PRIMARY KEY (`vote_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `vote`.`t_choix_cho`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vote`.`t_choix_cho` (
  `cho_id` INT NOT NULL AUTO_INCREMENT,
  `cho_nom` VARCHAR(45) NOT NULL,
  `vote_id` INT NOT NULL,
  PRIMARY KEY (`cho_id`),
  INDEX `fk_t_choix_cho_t_vote_vote_idx` (`vote_id` ASC),
  CONSTRAINT `fk_t_choix_cho_t_vote_vote`
    FOREIGN KEY (`vote_id`)
    REFERENCES `vote`.`t_vote_vote` (`vote_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `vote`.`t_appreciation_app`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vote`.`t_appreciation_app` (
  `app_id` INT NOT NULL AUTO_INCREMENT,
  `app_choix` VARCHAR(45) NOT NULL,
  `cho_id` INT NOT NULL,
  PRIMARY KEY (`app_id`),
  INDEX `fk_t_appreciation_app_t_choix_cho1_idx` (`cho_id` ASC),
  CONSTRAINT `fk_t_appreciation_app_t_choix_cho1`
    FOREIGN KEY (`cho_id`)
    REFERENCES `vote`.`t_choix_cho` (`cho_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
