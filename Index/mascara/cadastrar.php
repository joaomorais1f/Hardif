<!DOCTYPE html>
<html>
<head>
	<title> Cadastro </title>
	<meta charset="utf-8">
</head>
<body>
	<?php
	include'include.php';
	?>
	<h1> Cadastrar </h1>
	<form method="POST" action="" onSubmit="validacao ()">
		<label for="nome">Nome: </label>
		<input type="text" name="nome" id="nome" placeholder="Ex: João Schanoski"> <br>
		<label for="email">Email: </label>
		<input type="email" name="email" id="email" placeholder=" Ex: auladeweblegal@gmail.com"><br>
		<label for="senha">Senha: </label>
		<input id="senha" type="password" name="senha" size="20" onkeyup="checa_seguranca('senha', 'pass');"  /> <font size='1' face='Tahoma'> <div id="pass"> </div></font> 
		<label for="csenha"> Confirmar Senha: </label> 
		<input id="csenha" type="password" name="csenha"><br>

		<select name="sexo"> 
			<option value="A"> Selecione um Sexo </option>
			<option value="F">Feminino</option>
			<option value="M">Masculino</option>
		</select>
		<br>
		<label for="data">Data de Nascimento</label>
		<input type="text" name="data" id="data" data-mask="00/00/0000" placeholder="Ex: 03/05/1985"><br>
		<label for="cpf">CPF:</label>
		<input type="text" name="cpf" id="cpf" data-mask="000.000.000-00" placeholder="Ex: 123.456.789-10"> <br>
		<label for="tel">Telefone: </label>
		<input type="tel" name="telefone" id="tel" data-mask="(00) 0000-0000" placeholder="Ex: 50 1234-5678"> <br>
		<input type="submit" id="cadastrar" value="cadastrar">
	</form>


	<script src="jquery-3.3.1.min.js"></script>
	<script src="jquery.mask.js"></script>
	<script type="text/javascript" src="seguranca.js"></script>
	<br>
	<?php

	if (!empty($_POST)) {
	require 'GBD/conexao.php';
	foreach($_POST as $chave => $valor){

		$$chave = (trim(strip_tags($valor)));

	}
	$erro = false;
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
		echo "E-mail inválido <br>";
		$erro = true; 
	} else {
		$emailcorreto = $email;
	}
	if ((!filter_var($nome, FILTER_SANITIZE_STRING) || (strlen($nome) < 3))){
		echo "Nome Invalido <br>";
 		$erro = true;
	}else {
		$nomecorreto = $nome;
	}
	if ((!preg_match("/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}$/", $cpf)) || (strlen($cpf) < 11)) {
		echo "CPF invalido <br>";
		$erro = true;
	}	else {
		$CPFcorreto = $cpf;
	}
	
	 if ((!preg_match('^\(+[0-9]{2,3}\) [0-9]{4}-[0-9]{4}$^', $telefone)) || (strlen($telefone) < 10)) {
		echo "Numero de Telefone Invalido <br> ";
		$erro = true;
	}else {
		$telefonecorreto = $telefone;
	}

	if ((strlen($senha) < 8) || (strlen($senha) > 16)) {
		echo "Informe uma senha entre 8 e 16 caracteres <br>";
		$erro = true;
	}else {
		$senhacorreta = $senha;
	}
	if (!($csenha == $senha)) {
		echo "Por favor, confirme sua senha <br>";
		$erro = true;
	}else {
		$senhacorreta = $senha;
	}
	if (($sexo == "") || ($sexo == "A")){
		echo "Por favor, Selecione um sexo <br>";
		$erro = true;

	}else {
		$sexocorreto = $sexo;
	}
	$datan = explode("/",$data);
	$anoatual = date("Y");
	if (($datan[0] > 31) || ($datan[0] == 00) ||(($datan[1] > 12) || ($datan[1] == 00)) || (($datan[1] > 12) || ($datan[1] == 00)) || ($datan[2] > $anoatual) ) {
		 	echo "Data Invalida <br>"; 
		$erro = true;
	}else {
		$datacorreta = $datan[2]."-".$datan[1]."-".$datan[0];
	}

	if (!$erro) {
		$comando1 = "SELECT * FROM DadosUsuario WHERE email = '$emailcorreto'";
		$retorno1 = mysqli_query($cnx, $comando1);
		$registro = mysqli_fetch_assoc($retorno1);
		if($registro != null) {
			echo "email existente";
		} else {
		echo "<style> #a { color: green; } </style>";
		echo "<p id=a> Cadastrado com sucesso!!! </p>";
		$comando2 = "INSERT INTO DadosUsuario (nome,email,senha,sexo,data_nascimento,CPF,telefone) values ('$nomecorreto','$emailcorreto','$senhacorreta','$sexocorreto','$datacorreta','$CPFcorreto','$telefonecorreto')";
		$retorno2 = mysqli_query($cnx, $comando2);
		}
	}
}
	include'includer.php';
	?>
</body>
</html>