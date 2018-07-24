CREATE TABLE tblUsuario(
	CodCliente INT AUTO_INCREMENT,
	Nome VARCHAR(100) NOT NULL,
	Email VARCHAR(60) NOT NULL,
	Senha VARCHAR(16) NOT NULL,
	ConfirmarSenha VARCHAR(16) NOT NULL,
	CPF VARCHAR(14) NOT NULL,
	Pais VARCHAR(50) NOT NULL,
	endereco VARCHAR(100) NOT NULL,
	dtNasc DATE NOT NULL,
	PRIMARY KEY(CodCliente)
) engine = innodb;



CREATE TABLE tblPagamento(
	CodPagamento INT AUTO_INCREMENT,
	DescPagamento VARCHAR(100) NOT NULL,
	Quantidade INT NOT NULL,
	PRIMARY KEY(CodPagamento)
) engine = innodb;



CREATE TABLE tblCategoriaProduto(
	CodCategoria INT AUTO_INCREMENT,
	DescCategoria VARCHAR(100) NOT NULL,
	PRIMARY KEY(CodCategoria)
) engine = innodb;

INSERT INTO tblCategoriaProduto(CodCategoria,DescCategoria)
VALUES
(1,"Celular"),
(2,"Notebook"),
(3,"Tablet"),
(4,"Perifericos");

CREATE TABLE tblProduto(
	CodProduto INT AUTO_INCREMENT,
	CodCategoria INT NOT NULL,
	Imagem /VARBINARY(max)/  VARCHAR(50) NOT NULL,
	Preco VARCHAR(50) NOT NULL,
	NomeProduto VARCHAR(60) NOT NULL,
	DescricaoProduto VARCHAR(1000) NOT NULL,
	PRIMARY KEY(CodProduto),
	FOREIGN KEY(CodCategoria) REFERENCES tblCategoriaProduto(CodCategoria)
) engine = innodb;

CREATE TABLE tblPedido(
	CodPedido INT AUTO_INCREMENT,
	CodCliente INT NOT NULL,
	CodProduto INT NOT NULL,
	CodPagamento INT NOT NULL,
	dtNasc DATETIME NOT NULL,
	ValorTotPedido VARCHAR(50) NOT NULL,
	PRIMARY KEY(CodPedido),
	FOREIGN KEY(CodCliente) REFERENCES tblUsuario(CodCliente),
	FOREIGN KEY(CodProduto) REFERENCES tblProduto(CodProduto),
	FOREIGN KEY(CodPagamento) REFERENCES tblPagamento(CodPagamento)
) engine = innodb;

CREATE TABLE tblProdutoPedido(
	CodProdutoPedido INT AUTO_INCREMENT,
	CodProduto INT NOT NULL,
	CodPedido INT NOT NULL,
	PRIMARY KEY(CodProdutoPedido),
	FOREIGN KEY(CodPedido) REFERENCES tblPedido(CodPedido),
	FOREIGN KEY(CodProduto) REFERENCES tblProduto(CodProduto)
) engine = innodb;