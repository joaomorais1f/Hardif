<?php

require "../GBD/conexao.php";

$descricao = $_POST["descricao"];
$preco = $_POST["preco"];
$categoria = $_POST["Categoria"];
$nome = $_POST["nome"];

$imagem_tmp = $_FILES["imagemproduto"]["tmp_name"];
$imagem = basename($_FILES["imagemproduto"]["name"]);
$diretorio_mover = "Imagens/";
$diretorio = "Imagens/";

move_uploaded_file($imagem_tmp, $diretorio_mover. $imagem);
$diretorio_da_imagem = $diretorio. $imagem;
$comando = "INSERT INTO cadastroproduto (nome,descricao, preco,categoria,imagem)
	values ('$nome','$descricao', '$preco','$categoria','$diretorio_da_imagem')";

$retorno = mysqli_query($cnx, $comando);

if($retorno) {
	header("refresh:0.5; url=../administrador.php");
	echo "Foi inserido com sucesso!";
} else {
	echo "Errou!";
}


?>