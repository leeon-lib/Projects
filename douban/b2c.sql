-- MySQL Script generated by MySQL Workbench
-- Wed Jun 24 09:45:24 2015
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema b2c
-- -----------------------------------------------------
-- B2C商城

-- -----------------------------------------------------
-- Schema b2c
--
-- B2C商城
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `b2c` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `b2c` ;

-- -----------------------------------------------------
-- Table `b2c`.`group`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `b2c`.`group` (
  `gid` TINYINT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '部门id，主键',
  `gname` CHAR(10) NOT NULL DEFAULT '' COMMENT '部门名称',
  `pid` TINYINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '父级部门id',
  PRIMARY KEY (`gid`),
  UNIQUE INDEX `gid_UNIQUE` (`gid` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `b2c`.`role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `b2c`.`role` (
  `rid` SMALLINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '角色id',
  `rname` CHAR(20) NOT NULL DEFAULT '' COMMENT '角色名称',
  `group_gid` TINYINT UNSIGNED NOT NULL COMMENT '所属部门id',
  PRIMARY KEY (`rid`),
  UNIQUE INDEX `rid_UNIQUE` (`rid` ASC),
  INDEX `fk_role_group1_idx` (`group_gid` ASC),
  CONSTRAINT `fk_role_group1`
    FOREIGN KEY (`group_gid`)
    REFERENCES `b2c`.`group` (`gid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `b2c`.`admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `b2c`.`admin` (
  `aid` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '主键，管理员id',
  `username` CHAR(30) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` CHAR(32) NOT NULL DEFAULT '' COMMENT '密码',
  `mail` CHAR(50) NOT NULL DEFAULT '' COMMENT '管理员邮箱',
  `is_lock` TINYINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '账号状态，是否被锁定。 0为正常，1为已锁定',
  `last_login` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '上次登录时间',
  `group_gid` TINYINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '所属部门id',
  `role_rid` SMALLINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '所属角色id',
  PRIMARY KEY (`aid`),
  INDEX `fk_admin_group_idx` (`group_gid` ASC),
  INDEX `fk_admin_role1_idx` (`role_rid` ASC),
  CONSTRAINT `fk_admin_group`
    FOREIGN KEY (`group_gid`)
    REFERENCES `b2c`.`group` (`gid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_admin_role1`
    FOREIGN KEY (`role_rid`)
    REFERENCES `b2c`.`role` (`rid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `b2c`.`attribute`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `b2c`.`attribute` (
  `attrid` INT UNSIGNED NOT NULL DEFAULT 0,
  `attr_name` CHAR(20) NOT NULL DEFAULT '' COMMENT '属性名称',
  PRIMARY KEY (`attrid`),
  UNIQUE INDEX `attrid_UNIQUE` (`attrid` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `b2c`.`actions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `b2c`.`actions` (
  `acid` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `action` CHAR(30) NOT NULL DEFAULT '' COMMENT '功能动作名称',
  PRIMARY KEY (`acid`),
  UNIQUE INDEX `acid_UNIQUE` (`acid` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `b2c`.`group_action`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `b2c`.`group_action` (
  `gaid` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `group_gid` TINYINT UNSIGNED NOT NULL DEFAULT 0,
  `actions_acid` INT UNSIGNED NOT NULL DEFAULT 0,
  INDEX `fk_group_action_group1_idx` (`group_gid` ASC),
  INDEX `fk_group_action_actions1_idx` (`actions_acid` ASC),
  PRIMARY KEY (`gaid`),
  UNIQUE INDEX `gaid_UNIQUE` (`gaid` ASC),
  CONSTRAINT `fk_group_action_group1`
    FOREIGN KEY (`group_gid`)
    REFERENCES `b2c`.`group` (`gid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_group_action_actions1`
    FOREIGN KEY (`actions_acid`)
    REFERENCES `b2c`.`actions` (`acid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `b2c`.`category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `b2c`.`category` (
  `cid` SMALLINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '分类id',
  `cname` CHAR(20) NULL DEFAULT '' COMMENT '分类名称',
  `pid` SMALLINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '父级分类id',
  PRIMARY KEY (`cid`),
  UNIQUE INDEX `cid_UNIQUE` (`cid` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `b2c`.`category_attr`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `b2c`.`category_attr` (
  `id` INT NOT NULL,
  `category_cid` SMALLINT UNSIGNED NOT NULL COMMENT '分类id',
  `attribute_attrid` INT UNSIGNED NOT NULL COMMENT '属性id',
  PRIMARY KEY (`id`),
  INDEX `fk_category_attr_category1_idx` (`category_cid` ASC),
  INDEX `fk_category_attr_attribute1_idx` (`attribute_attrid` ASC),
  CONSTRAINT `fk_category_attr_category1`
    FOREIGN KEY (`category_cid`)
    REFERENCES `b2c`.`category` (`cid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_category_attr_attribute1`
    FOREIGN KEY (`attribute_attrid`)
    REFERENCES `b2c`.`attribute` (`attrid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
