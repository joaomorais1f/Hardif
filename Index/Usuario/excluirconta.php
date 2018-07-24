<?php
require '../Banco de Dados/conexao.php';
session_start();
$id = $_SESSION["logado"];
$comando ="DELETE FROM DadosUsuario WHERE IDUsuario = '$id'";
$retorno = mysqli_query($cnx,$comando);
session_unset($_SESSION["logado"]);
session_destroy();
if ($retorno) {
	echo "<script> alert(CONTA EXCLUIDA COM ISSO) </style>";
	header("refresh:0.1; index1.php");
} else {
	header("location: conta.php");
}

?>