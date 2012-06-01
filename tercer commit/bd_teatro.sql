SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `mydb` ;
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Cargos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Cargos` (
  `idCargos` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `descripcion` VARCHAR(45) NULL ,
  PRIMARY KEY (`idCargos`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Participantes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Participantes` (
  `idParticipantes` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `apellido` VARCHAR(45) NULL ,
  `cargo` VARCHAR(45) NULL ,
  `Cargos_idCargos` INT NOT NULL ,
  PRIMARY KEY (`idParticipantes`) ,
  INDEX `fk_Participantes_Cargos1` (`Cargos_idCargos` ASC) ,
  CONSTRAINT `fk_Participantes_Cargos1`
    FOREIGN KEY (`Cargos_idCargos` )
    REFERENCES `mydb`.`Cargos` (`idCargos` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Obras`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Obras` (
  `idObras` INT NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(45) NULL ,
  `resena` VARCHAR(150) NULL ,
  `autor` VARCHAR(45) NULL ,
  `fecha_desde` DATE NULL ,
  `fecha_hasta` DATE NULL ,
  `puntaje` INT NULL ,
  `detalles_extra` VARCHAR(120) NULL ,
  `numeroSitios` VARCHAR(45) NULL ,
  `precio` DECIMAL(10,2) NULL ,
  `duracion` INT NULL ,
  `director` INT NOT NULL ,
  `afiche` VARCHAR(45) NULL ,
  PRIMARY KEY (`idObras`) ,
  INDEX `fk_Obras_Participantes1` (`director` ASC) ,
  CONSTRAINT `fk_Obras_Participantes1`
    FOREIGN KEY (`director` )
    REFERENCES `mydb`.`Participantes` (`idParticipantes` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Categorias`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Categorias` (
  `idCategorias` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `descripcion` VARCHAR(45) NULL ,
  PRIMARY KEY (`idCategorias`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Categorias_obras`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Categorias_obras` (
  `Categorias_idCategorias` INT NOT NULL ,
  `Obras_idObras` INT NOT NULL ,
  PRIMARY KEY (`Categorias_idCategorias`, `Obras_idObras`) ,
  INDEX `fk_Categorias_obras_Obras1` (`Obras_idObras` ASC) ,
  CONSTRAINT `fk_Categorias_obras_Categorias`
    FOREIGN KEY (`Categorias_idCategorias` )
    REFERENCES `mydb`.`Categorias` (`idCategorias` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Categorias_obras_Obras1`
    FOREIGN KEY (`Obras_idObras` )
    REFERENCES `mydb`.`Obras` (`idObras` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Roles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Roles` (
  `idRoles` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `descripcion` VARCHAR(45) NULL ,
  PRIMARY KEY (`idRoles`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Usuarios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Usuarios` (
  `idUsuarios` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `apellido1` VARCHAR(45) NULL ,
  `apellido2` VARCHAR(45) NULL ,
  `usuario` VARCHAR(45) NULL ,
  `clave` VARCHAR(45) NULL ,
  `estado` INT NULL ,
  `correo` VARCHAR(45) NULL ,
  `Roles_idRoles` INT NOT NULL ,
  PRIMARY KEY (`idUsuarios`) ,
  INDEX `fk_Usuarios_Roles1` (`Roles_idRoles` ASC) ,
  CONSTRAINT `fk_Usuarios_Roles1`
    FOREIGN KEY (`Roles_idRoles` )
    REFERENCES `mydb`.`Roles` (`idRoles` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Votaciones`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Votaciones` (
  `Usuarios_idUsuarios` INT NOT NULL ,
  `Obras_idObras` INT NOT NULL ,
  `fecha` DATE NULL ,
  `comentario` VARCHAR(120) NULL ,
  PRIMARY KEY (`Usuarios_idUsuarios`, `Obras_idObras`) ,
  INDEX `fk_Votaciones_Obras1` (`Obras_idObras` ASC) ,
  CONSTRAINT `fk_Votaciones_Usuarios1`
    FOREIGN KEY (`Usuarios_idUsuarios` )
    REFERENCES `mydb`.`Usuarios` (`idUsuarios` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Votaciones_Obras1`
    FOREIGN KEY (`Obras_idObras` )
    REFERENCES `mydb`.`Obras` (`idObras` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Obras_has_Participantes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Obras_has_Participantes` (
  `Obras_idObras` INT NOT NULL ,
  `Participantes_idParticipantes` INT NOT NULL ,
  `personaje` VARCHAR(45) NULL ,
  PRIMARY KEY (`Obras_idObras`, `Participantes_idParticipantes`) ,
  INDEX `fk_Obras_has_Participantes_Participantes1` (`Participantes_idParticipantes` ASC) ,
  INDEX `fk_Obras_has_Participantes_Obras1` (`Obras_idObras` ASC) ,
  CONSTRAINT `fk_Obras_has_Participantes_Obras1`
    FOREIGN KEY (`Obras_idObras` )
    REFERENCES `mydb`.`Obras` (`idObras` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Obras_has_Participantes_Participantes1`
    FOREIGN KEY (`Participantes_idParticipantes` )
    REFERENCES `mydb`.`Participantes` (`idParticipantes` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Horarios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Horarios` (
  `idHorarios` INT NOT NULL ,
  `horaInicio` TIME NULL ,
  `horaFin` TIME NULL ,
  PRIMARY KEY (`idHorarios`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Salas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Salas` (
  `idSalas` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `descripcion` VARCHAR(45) NULL ,
  PRIMARY KEY (`idSalas`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Obras_has_Horarios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Obras_has_Horarios` (
  `Obras_idObras` INT NOT NULL ,
  `Horarios_idHorarios` INT NOT NULL ,
  `dia` DATE NOT NULL ,
  `Salas_idSalas` INT NOT NULL ,
  PRIMARY KEY (`Obras_idObras`, `Horarios_idHorarios`, `dia`, `Salas_idSalas`) ,
  INDEX `fk_Obras_has_Horarios_Horarios1` (`Horarios_idHorarios` ASC) ,
  INDEX `fk_Obras_has_Horarios_Obras1` (`Obras_idObras` ASC) ,
  INDEX `fk_Obras_has_Horarios_Salas1` (`Salas_idSalas` ASC) ,
  CONSTRAINT `fk_Obras_has_Horarios_Obras1`
    FOREIGN KEY (`Obras_idObras` )
    REFERENCES `mydb`.`Obras` (`idObras` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Obras_has_Horarios_Horarios1`
    FOREIGN KEY (`Horarios_idHorarios` )
    REFERENCES `mydb`.`Horarios` (`idHorarios` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Obras_has_Horarios_Salas1`
    FOREIGN KEY (`Salas_idSalas` )
    REFERENCES `mydb`.`Salas` (`idSalas` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Temporadas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Temporadas` (
  `idTemporadas` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `descripcion` VARCHAR(45) NULL ,
  PRIMARY KEY (`idTemporadas`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Temporadas_has_Obras`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Temporadas_has_Obras` (
  `Temporadas_idTemporadas` INT NOT NULL ,
  `Obras_idObras` INT NOT NULL ,
  PRIMARY KEY (`Temporadas_idTemporadas`, `Obras_idObras`) ,
  INDEX `fk_Temporadas_has_Obras_Obras1` (`Obras_idObras` ASC) ,
  INDEX `fk_Temporadas_has_Obras_Temporadas1` (`Temporadas_idTemporadas` ASC) ,
  CONSTRAINT `fk_Temporadas_has_Obras_Temporadas1`
    FOREIGN KEY (`Temporadas_idTemporadas` )
    REFERENCES `mydb`.`Temporadas` (`idTemporadas` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Temporadas_has_Obras_Obras1`
    FOREIGN KEY (`Obras_idObras` )
    REFERENCES `mydb`.`Obras` (`idObras` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
