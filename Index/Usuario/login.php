<?php
	if (!empty($_POST)) {
	session_start();
	require '../Banco de Dados/conexao.php';
	$senha_login = $_POST["senha_login"];
	$email_login = $_POST["email_login"];

// LOGANDO O USUÁRIO
	$comando = "SELECT * FROM DadosUsuario WHERE email = '$email_login' AND senha='$senha_login'";
	$retorno = mysqli_query($cnx, $comando);
	$registro = mysqli_fetch_assoc($retorno);
	$emailadmin = "admin@admin.com";
	$senhaadmin = "administrador";
	if ($email_login == $emailadmin && $senha_login == $senhaadmin) {
		$_SESSION["logadm"] = true;
		header("location: Administrador/adm.php");
	} elseif($registro == null) {
		echo "<script> alert('Usuario ou Senha incorreto!') </script>";
		header("refresh:0.1; LoginCadastrar.php");
	} else  {
		$_SESSION["logado"] = $registro["IDUsuario"];
		header("location: logado.php");
	}
}
?>