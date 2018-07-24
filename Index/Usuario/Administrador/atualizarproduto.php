<?php
session_start();
require '../../Banco de Dados/conexao.php';
$nome = $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST["decricao"];
$imagem_tmp = $_FILES["imagemproduto"]["tmp_name"];
$imagem = basename($_FILES["imagemproduto"]["name"]);
$diretorio_mover = "../../IMAGENS UPADAS/";
$diretorio = "../../IMAGENS UPADAS/";

move_uploaded_file($imagem_tmp, $diretorio_mover. $imagem);
$diretorio_da_imagem = $diretorio. $imagem;

$comando = "UPDATE cadastroproduto SET nome = '$nome', preco = '$preco', descricao = '$descricao', imagem = '$diretorio_da_imagem'";
$retorno = mysqli_query($cnx,$comando);


?>