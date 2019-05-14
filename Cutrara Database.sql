-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema heroku_91ac43a3f6024e6
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema heroku_91ac43a3f6024e6
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `heroku_91ac43a3f6024e6` DEFAULT CHARACTER SET utf8 ;
USE `heroku_91ac43a3f6024e6` ;

-- -----------------------------------------------------
-- Table `heroku_91ac43a3f6024e6`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heroku_91ac43a3f6024e6`.`user` ;

CREATE TABLE IF NOT EXISTS `heroku_91ac43a3f6024e6`.`user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `firstname` VARCHAR(50) NOT NULL,
  `lastname` VARCHAR(50) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `email` ON `heroku_91ac43a3f6024e6`.`user` (`email` ASC) VISIBLE;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
