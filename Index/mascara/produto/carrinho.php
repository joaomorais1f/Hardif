<?php
	session_start();
	if(!isset($_SESSION["logado"])) {
		echo "<script> alert('Voce precisa estar logado para Comprar')</script>";
		header("refresh:1; ../cadastrar.php");
	} else {
	require "../GBD/conexao.php";

$id = $_GET["id"];

$comando = "SELECT * FROM cadastroproduto WHERE IDproduto = '$id'";
$retorno = mysqli_query($cnx, $comando);

$registro = mysqli_fetch_assoc($retorno);
	$_SESSION["compras"] += 1;
	$_SESSION["Total_compra"] += $registro["preco"];
	header("location: ../indexlogado.php");
}
?>