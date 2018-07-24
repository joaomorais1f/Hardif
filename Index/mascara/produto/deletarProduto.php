<?php
require "../GBD/conexao.php";

$id = $_GET["id"];

$comando = "DELETE FROM cadastroproduto WHERE IDproduto = $id";

$retorno = mysqli_query($cnx, $comando); 

if($retorno) {
	header("refresh:0.5; url=../administrador.php");
	echo "Foi excluido com sucesso!";
} else {
	echo "Errou!";
}
?>