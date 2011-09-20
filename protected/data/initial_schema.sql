SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `phpnrio2011` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `phpnrio2011` ;

-- -----------------------------------------------------
-- Table `phpnrio2011`.`speaker`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `phpnrio2011`.`speaker` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(50) NOT NULL ,
  `description` VARCHAR(250) NULL ,
  `twitter` VARCHAR(30) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `twitter_UNIQUE` (`twitter` ASC) ,
  UNIQUE INDEX `nome_UNIQUE` (`name` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `phpnrio2011`.`presentation`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `phpnrio2011`.`presentation` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(100) NOT NULL ,
  `description` TEXT NOT NULL ,
  `begin` DATETIME NULL ,
  `end` DATETIME NULL ,
  `speaker_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `titulo_UNIQUE` (`title` ASC) ,
  INDEX `fk_presentations_speakers` (`speaker_id` ASC) ,
  CONSTRAINT `fk_presentations_speakers`
    FOREIGN KEY (`speaker_id` )
    REFERENCES `phpnrio2011`.`speaker` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `phpnrio2011`.`user`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `phpnrio2011`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(50) NOT NULL ,
  `email` VARCHAR(50) NOT NULL ,
  `username` VARCHAR(25) NOT NULL ,
  `password` VARCHAR(40) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `phpnrio2011`.`news`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `phpnrio2011`.`news` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(50) NOT NULL ,
  `short_desc` VARCHAR(100) NOT NULL ,
  `text` TEXT NOT NULL ,
  `author` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_news_user1` (`author` ASC) ,
  CONSTRAINT `fk_news_user1`
    FOREIGN KEY (`author` )
    REFERENCES `phpnrio2011`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `phpnrio2011`.`team_member`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `phpnrio2011`.`team_member` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(50) NOT NULL ,
  `description` VARCHAR(250) NULL ,
  `team_member_col` VARCHAR(50) NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `phpnrio2011`.`sponsor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `phpnrio2011`.`sponsor` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(50) NOT NULL ,
  `description` VARCHAR(250) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `phpnrio2011`.`user`
-- -----------------------------------------------------
START TRANSACTION;
USE `phpnrio2011`;
INSERT INTO `phpnrio2011`.`user` (`id`, `name`, `email`, `username`, `password`) VALUES (NULL, 'Igor Santos', 'igorsantos07@phprio.org', 'igorsantos07', '7c222fb2927d828af22f592134e8932480637c0d');
INSERT INTO `phpnrio2011`.`user` (`id`, `name`, `email`, `username`, `password`) VALUES (NULL, 'Valéria Parajara', 'valeriaparajara@phprio.org', 'valeriaparajara', '7c222fb2927d828af22f592134e8932480637c0d');
INSERT INTO `phpnrio2011`.`user` (`id`, `name`, `email`, `username`, `password`) VALUES (NULL, 'Raphael Almeida', 'raphael.dealmeida@phprio.org', 'jaguarnet7', '7c222fb2927d828af22f592134e8932480637c0d');

COMMIT;
