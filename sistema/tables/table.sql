//TABLEA PROCEDIMENTOS

CREATE TABLE `dados`.`eletroterapeuticos` ( `id` INT NOT NULL AUTO_INCREMENT , `disfuncao` VARCHAR(255) NOT NULL , `equipamento` VARCHAR(255) NOT NULL , `parametros` VARCHAR(255) NOT NULL , `ativo` ENUM("s","n") NOT NULL , `intervalo` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
//TABELA USUARIOS

CREATE TABLE `dados`.`usuarios` ( `id` INT NOT NULL AUTO_INCREMENT , `nome` VARCHAR(255) NOT NULL , `email` VARCHAR(255) NOT NULL , `senha` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;