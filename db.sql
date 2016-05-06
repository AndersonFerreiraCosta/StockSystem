CREATE DATABASE IF NOT EXISTS `stocksystem` /*!40100 DEFAULT CHARACTER SET latin1 */;

CREATE TABLE IF NOT EXISTS `stocksystem`.`srs_category` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `nome` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `stocksystem`.`srs_input` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `data` datetime NOT NULL,
  `categoria` varchar(45) NOT NULL,
  `produto` int(10) unsigned NOT NULL,
  `fornecedor` int(10) unsigned NOT NULL,
  `quantidade` int(10) unsigned NOT NULL,
  `obs` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `stocksystem`.`srs_supplier` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `nome` text NOT NULL,
  `telefone` text,
  `estado` text,
  `cidade` text,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `stocksystem`.`srs_product` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `categoria` text,
  `nome` text NOT NULL,
  `estoque_minimo` int(10) unsigned NOT NULL default '0',
  `estoque_atual` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `stocksystem`.`srs_requester` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `nome` text NOT NULL,
  `empresa` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `stocksystem`.`srs_output` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `data` datetime NOT NULL,
  `categoria` varchar(45) NOT NULL,
  `produto` int(10) unsigned NOT NULL,
  `retirante` int(10) unsigned NOT NULL,
  `quantidade` int(10) unsigned NOT NULL,
  `obs` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `stocksystem`.`usuarios` (
  `cod_usuario` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `login` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`cod_usuario`))
ENGINE = InnoDB