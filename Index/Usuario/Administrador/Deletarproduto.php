<?php
session_start();
require '../../Banco de Dados/conexao.php';
if (!empty($_GET)) {
$id = $_GET["IDproduto"];
$comando = "DELETE FROM cadastroproduto WHERE IDproduto = '$id'";
$retorno = mysqli_query($cnx,$comando);
if ($retorno) {
	header("location: adm.php");
} else {
	header("location: adm.php");
}
}
?>