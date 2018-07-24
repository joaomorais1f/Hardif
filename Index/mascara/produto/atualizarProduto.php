<?php

require "../GBD/conexao.php";

$descricao = $_POST["descricao"];
$preco = $_POST["preco"];
$categoria = $_POST["Categoria"];
$id = $_POST["id"];

$imagem_tmp = $_FILES["imagemproduto"]["tmp_name"];
$imagem = basename($_FILES["imagemproduto"]["name"]);
$diretorio_mover = "Imagens/";
$diretorio = "Imagens/";

move_uploaded_file($imagem_tmp, $diretorio_mover. $imagem);
$diretorio_da_imagem = $diretorio. $imagem;

$comando = "UPDATE cadastroproduto
SET descricao = '$descricao', preco = '$preco' , categoria = '$categoria', imagem = '$diretorio_da_imagem'
WHERE IDproduto='$id'";

$retorno = mysqli_query($cnx, $comando);

if($retorno) {
	header("refresh:0.5; url=../administrador.php");
	echo "Foi ALTERADO com sucesso!";
} else {
	header( "location: ../administrador.php");
}

?>