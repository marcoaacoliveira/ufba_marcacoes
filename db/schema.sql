-- MySQL Script generated by MySQL Workbench
-- Sex 29 Abr 2016 16:04:26 BRT
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema marcacoes_ufba
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `marcacoes_ufba` ;

-- -----------------------------------------------------
-- Schema marcacoes_ufba
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `marcacoes_ufba` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `marcacoes_ufba` ;

-- -----------------------------------------------------
-- Table `marcacoes_ufba`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `marcacoes_ufba`.`users` ;

CREATE TABLE IF NOT EXISTS `marcacoes_ufba`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `login` VARCHAR(45) NULL COMMENT '',
  `email` VARCHAR(45) NULL COMMENT '',
  `cpf` VARCHAR(45) NULL COMMENT '',
  `phone` VARCHAR(45) NULL COMMENT '',
  `password` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `marcacoes_ufba`.`doctors`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `marcacoes_ufba`.`doctors` ;

CREATE TABLE IF NOT EXISTS `marcacoes_ufba`.`doctors` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `user_id` INT NOT NULL COMMENT '',
  `avaliable_days` VARCHAR(45) NULL COMMENT '',
  `avaliable_hour_begin` TIME NULL COMMENT '',
  `avaliable_hour_end` TIME NULL COMMENT '',
  PRIMARY KEY (`id`, `user_id`)  COMMENT '',
  INDEX `fk_doctors_users_idx` (`user_id` ASC)  COMMENT '',
  CONSTRAINT `fk_doctors_users`
  FOREIGN KEY (`user_id`)
  REFERENCES `marcacoes_ufba`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `marcacoes_ufba`.`clients`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `marcacoes_ufba`.`clients` ;

CREATE TABLE IF NOT EXISTS `marcacoes_ufba`.`clients` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `user_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id`, `user_id`)  COMMENT '',
  INDEX `fk_clients_users1_idx` (`user_id` ASC)  COMMENT '',
  CONSTRAINT `fk_clients_users1`
  FOREIGN KEY (`user_id`)
  REFERENCES `marcacoes_ufba`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `marcacoes_ufba`.`administrators`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `marcacoes_ufba`.`administrators` ;

CREATE TABLE IF NOT EXISTS `marcacoes_ufba`.`administrators` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `user_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id`, `user_id`)  COMMENT '',
  INDEX `fk_administrators_users1_idx` (`user_id` ASC)  COMMENT '',
  CONSTRAINT `fk_administrators_users1`
  FOREIGN KEY (`user_id`)
  REFERENCES `marcacoes_ufba`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `marcacoes_ufba`.`animals`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `marcacoes_ufba`.`animals` ;

CREATE TABLE IF NOT EXISTS `marcacoes_ufba`.`animals` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `client_id` INT NOT NULL COMMENT '',
  `name` VARCHAR(45) NULL COMMENT '',
  `race` VARCHAR(45) NULL COMMENT '',
  `birthday` DATE NULL COMMENT '',
  `type` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`id`, `client_id`)  COMMENT '',
  INDEX `fk_animals_clients1_idx` (`client_id` ASC)  COMMENT '',
  CONSTRAINT `fk_animals_clients1`
  FOREIGN KEY (`client_id`)
  REFERENCES `marcacoes_ufba`.`clients` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `marcacoes_ufba`.`appointments`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `marcacoes_ufba`.`appointments` ;

CREATE TABLE IF NOT EXISTS `marcacoes_ufba`.`appointments` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `client_id` INT NOT NULL COMMENT '',
  `doctor_id` INT NOT NULL COMMENT '',
  `animal_id` INT NOT NULL COMMENT '',
  `date` DATETIME NULL COMMENT '',
  `echiridion` VARCHAR(600) NULL COMMENT '',
  PRIMARY KEY (`id`, `client_id`, `doctor_id`, `animal_id`)  COMMENT '',
  INDEX `fk_appointment_clients1_idx` (`client_id` ASC)  COMMENT '',
  INDEX `fk_appointment_doctors1_idx` (`doctor_id` ASC)  COMMENT '',
  INDEX `fk_appointment_animals1_idx` (`animal_id` ASC)  COMMENT '',
  CONSTRAINT `fk_appointment_clients1`
  FOREIGN KEY (`client_id`)
  REFERENCES `marcacoes_ufba`.`clients` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_appointment_doctors1`
  FOREIGN KEY (`doctor_id`)
  REFERENCES `marcacoes_ufba`.`doctors` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_appointment_animals1`
  FOREIGN KEY (`animal_id`)
  REFERENCES `marcacoes_ufba`.`animals` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
