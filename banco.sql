create database `teste-rte`;

use `teste-rte`;

create table `pessoa`
(
    `id_pessoa` int primary key AUTO_INCREMENT,
    `pessoa` varchar(30)
);

create table `filho`
(
    `id_filho` int primary key AUTO_INCREMENT,
    `id_pessoa` int,
    `nome` varchar(30),
    CONSTRAINT `fk_IdPessoa` FOREIGN KEY(`id_pessoa`) REFERENCES `pessoa` (`id_pessoa`) ON DELETE CASCADE ON UPDATE CASCADE
);









