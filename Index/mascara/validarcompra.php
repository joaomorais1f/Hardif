<?php
session_start();
require 'GBD/conexao.php';
if (!empty($_POST)) {

	$senha = $_POST["csenha"];
	$email = $_POST["email"];

// LOGANDO O USUÁRIO
	$comando2 = "SELECT * FROM DadosUsuario WHERE email = '$email' AND senha='$senha'";
	$retorno = mysqli_query($cnx, $comando2);
	$registro = mysqli_fetch_assoc($retorno);
	$emailadmin = "admin@admin.com";
	$senhaadmin = "administrador";
	if ($email == $emailadmin && $senha == $senhaadmin) {
		echo "Administrador";
		header("refresh:1; administrador.php");
	} elseif($registro == null) {
		echo "Usuario ou Senha incorreto!";
	} else  {
		echo "bem vindo   ". $registro["nome"];
		$_SESSION["logado"] = $email;
		header("refresh:1; indexlogado.php");
	}
}
?>