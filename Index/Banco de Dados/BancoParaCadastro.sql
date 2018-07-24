CREATE DATABASE loja;

USE loja;

CREATE TABLE DadosUsuario (
	IDUsuario INT AUTO_INCREMENT,
	nome VARCHAR(60),
	email VARCHAR(60),
	senha VARCHAR(16),
	CPF VARCHAR(15),
	telefone VARCHAR(15),
	endereco VARCHAR(100),
	PRIMARY KEY (IDUsuario)

) engine = innodb;

CREATE TABLE categoria (
	idcategoria INT AUTO_INCREMENT,
	descategoria VARCHAR(100) NOT NULL,
	PRIMARY KEY (idcategoria)
) engine = innodb;

INSERT INTO categoria (idcategoria,descategoria) 
VALUES 
(1,'Placa de Video'),
(2,'Placa Mae'),
(3,'Memoria RAM');


CREATE TABLE CadastroProduto (
	IDproduto INT AUTO_INCREMENT,
	nome VARCHAR (60),
	preco DOUBLE,
	idcategoria INT NOT NULL,
	descricao VARCHAR(1000),
	imagem VARCHAR(100),
	banner1 VARCHAR(100),
	banner2 VARCHAR(100),
	banner3 VARCHAR(100),
	PRIMARY KEY (IDproduto),
	FOREIGN KEY (idcategoria) REFERENCES categoria(idcategoria)

) engine = innodb;









