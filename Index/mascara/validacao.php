<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>
<?php

	include'include.php';

if (!empty($_POST)) {
	/*$email = $_POST["email"];
	$nome = $_POST["nome"];
	$cpf = $_POST["cpf"];
	$tel = $_POST["telefone"];
	//validaemail($email);
	validanome($nome);*/

	foreach($_POST as $chave => $valor){

		$$chave = (trim(strip_tags($valor)));

	}
	$erro[] = array();
	$erro2[] = array();
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
		echo "E-mail inválido <br>";
		$erro[] = 1 ; 
	}
	if ((!filter_var($nome, FILTER_SANITIZE_STRING) || (strlen($nome) < 3))){
		echo "Nome Invalido <br>";
 		$erro[] = 1 ;
	}
	if ((!preg_match("/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}$/", $cpf)) || (strlen($cpf) < 11)) {
		echo "CPF invalido <br>";
		$erro[] = 1 ;
	}	
	
	 if ((!preg_match('^\(+[0-9]{2,3}\) [0-9]{4}-[0-9]{4}$^', $telefone)) || (strlen($telefone) < 10)) {
		echo "Numero de Telefone Invalido <br> ";
		$erro[] = 1 ;
	}

	if ((strlen($senha) < 8) || (strlen($senha) > 16)) {
		echo "Informe uma senha entre 8 e 16 caracteres <br>";
		$erro[] = 1 ;
	}
	if (!($csenha == $senha)) {
		echo "Por favor, confirme sua senha <br>";
		$erro[] = 1 ;
	}
	if (($sexo == "") || ($sexo == "A")){
		echo "Por favor, Selecione um sexo <br>";
		$erro[] = 1 ;

	}
	$datan = explode("/",$data);
	$anoatual = date("Y");
	if (($datan[0] > 31) || ($datan[0] == 00) ||(($datan[1] > 12) || ($datan[1] == 00)) || (($datan[1] > 12) || ($datan[1] == 00)) || ($datan[2] > $anoatual) ) {
		 	echo "Data Invalida <br>"; 
		$erro[] = 1 ;
	}
		for ($i = 0; $i < count($erro); $i++) {
			if ($erro[$i] != 1) {
				$erro2[$i] = $erro[$i]; 
			}
		}
	if ($erro == $erro2) {
		echo "<style> p { color: green; } </style>";
		echo "<p> Cadastrado com sucesso!!! </p>";
	}
	include 'includer.php';
}

?>