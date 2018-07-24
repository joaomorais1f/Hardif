<?php
if (!empty($_POST)) {
	foreach($_POST as $chave => $valor){

		$$chave = (trim(strip_tags($valor)));

	}

	if ((!preg_match("/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}$/", $cpf)) || (strlen($cpf) < 11)) {
		echo "CPF invalido <br>";
	}

	if ((!preg_match("/^[0-9]{5}-[0-9]{3}$/", $cep)) || (strlen($cep) < 8)) {
		echo "CEP inválido <br>";

		if ((!preg_match('^\(+[0-9]{2,3}\) [0-9]{4}-[0-9]{4}$^', $telefone)) || (strlen($telefone) < 10)) {
			echo "Numero de Telefone Invalido <br> ";
		}
		if ((!isset($numero) || (!is_numeric($numero)) || strlen($numero) == 0)) {
			echo "Informe o numero de sua residencia <br> ";

		}
		/*$datan = explode("/",$data);
		$anoatual = date("Y");
	if (($datan[0] > 31) || ($datan[0] == 00) ||(($datan[1] > 12) || ($datan[1] == 00)) || (($datan[1] > 12) || ($datan[1] == 00)) || ($datan[2] > $anoatual)) {
		 	echo "Informe uma data nascimento valida <br>"; 
		 }*/
		 if ((!filter_var($endereco, FILTER_SANITIZE_STRING) || strlen($endereco) == 0)) {
		 	echo "Endereco Invalido <br>";
		 }
		}
	}
		?>