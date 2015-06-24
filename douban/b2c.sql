-- MySQL Script generated by MySQL Workbench
-- Wed Jun 24 15:46:29 2015
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
  PRIMARY KEY (`gid`))
ENGINE = MyISAM
COMMENT = '部门表';


-- -----------------------------------------------------
-- Table `b2c`.`role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `b2c`.`role` (
  `rid` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '角色id',
  `rname` CHAR(20) NOT NULL DEFAULT '' COMMENT '角色名称',
  `group_gid` TINYINT UNSIGNED NOT NULL COMMENT '所属部门id',
  PRIMARY KEY (`rid`),
  INDEX `fk_role_group1_idx` (`group_gid` ASC))
ENGINE = MyISAM
COMMENT = '角色表';


-- -----------------------------------------------------
-- Table `b2c`.`admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `b2c`.`admin` (
  `aid` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键，管理员id',
  `username` CHAR(30) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` CHAR(32) NOT NULL DEFAULT '' COMMENT '密码',
  `mail` CHAR(50) NOT NULL DEFAULT '' COMMENT '管理员邮箱',
  `is_lock` TINYINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '账号状态，是否被锁定。 0为正常，1为已锁定',
  `last_login` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '上次登录时间',
  `real_name` CHAR(10) NOT NULL DEFAULT '' COMMENT '真实姓名',
  `phone` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '电话',
  `group_gid` TINYINT UNSIGNED NOT NULL COMMENT '部门id',
  `role_rid` SMALLINT UNSIGNED NOT NULL COMMENT '角色id',
  PRIMARY KEY (`aid`),
  INDEX `fk_admin_group1_idx` (`group_gid` ASC),
  INDEX `fk_admin_role1_idx` (`role_rid` ASC))
ENGINE = MyISAM
COMMENT = '管理员表';


-- -----------------------------------------------------
-- Table `b2c`.`attribute`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `b2c`.`attribute` (
  `attrid` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `attr_name` CHAR(20) NOT NULL DEFAULT '' COMMENT '属性名称',
  `key_char` CHAR(10) NOT NULL DEFAULT '' COMMENT '索引字母',
  PRIMARY KEY (`attrid`))
ENGINE = MyISAM
COMMENT = '属性表';


-- -----------------------------------------------------
-- Table `b2c`.`actions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `b2c`.`actions` (
  `acid` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `action` CHAR(30) NOT NULL DEFAULT '' COMMENT '功能动作名称',
  PRIMARY KEY (`acid`))
ENGINE = MyISAM
COMMENT = '系统功能动作表';


-- -----------------------------------------------------
-- Table `b2c`.`group_action`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `b2c`.`group_action` (
  `gaid` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `group_gid` TINYINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '部门id',
  `actions_acid` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '功能动作id',
  INDEX `fk_group_action_group1_idx` (`group_gid` ASC),
  INDEX `fk_group_action_actions1_idx` (`actions_acid` ASC),
  PRIMARY KEY (`gaid`))
ENGINE = MyISAM
COMMENT = '部门权限表';


-- -----------------------------------------------------
-- Table `b2c`.`category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `b2c`.`category` (
  `cid` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `cname` CHAR(20) NOT NULL DEFAULT '' COMMENT '分类名称',
  `key_char` CHAR(10) NOT NULL DEFAULT '' COMMENT '索引字母',
  `pid` SMALLINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '父级分类id',
  PRIMARY KEY (`cid`))
ENGINE = MyISAM
COMMENT = '分类表';


-- -----------------------------------------------------
-- Table `b2c`.`category_attr`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `b2c`.`category_attr` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_cid` SMALLINT UNSIGNED NOT NULL COMMENT '分类id',
  `attribute_attrid` INT UNSIGNED NOT NULL COMMENT '属性id',
  PRIMARY KEY (`id`),
  INDEX `fk_category_attr_category1_idx` (`category_cid` ASC),
  INDEX `fk_category_attr_attribute1_idx` (`attribute_attrid` ASC))
ENGINE = MyISAM;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
