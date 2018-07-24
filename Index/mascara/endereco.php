<!DOCTYPE html>
<html>
<head>
	<title> Confirmar Endereço</title>
	<meta charset="utf-8">
</head>
<body>
	<h1> Preencha com seu endereço </h1>
	<form action="validarendereco.php" method="POST">
			<label for="endereco"> Endereço </label>
		<input type="text" name="endereco" id='endereco' placeholder="Rua abcdefghj"> <br>
		<label for="numero"> Nº: </label>
		<input type="text" name="numero" id='numero' placeholder="46"> <br>
		<label for="cpf">CPF:</label>
		<input type="text" name="cpf" id="cpf" data-mask="000.000.000-00" placeholder="Ex: 123.456.789-10"> <br>
		<label for="cep"> CEP </label>
		<input type="text" name="cep" id="cep" data-mask="00000-000" placeholder="Ex.: 00000-000"> <br>
		<label for="tel">Telefone: </label>
		<input type="tel" name="telefone" id="tel" data-mask="(00) 0000-0000" placeholder="Ex: 50 1234-5678"> <br>
		<input type="submit" value="Confirmar">
	</form>

		<script src="jquery-3.3.1.min.js"></script>
	<script src="jquery.mask.js"></script>
</body>
</html>