<!DOCTYPE html>
<html>
<head>
	<title> Cadastro </title>
</head>
<body>
	<h1> Cadastrar </h1>
		<form method="POST" action="validacao.php" onSubmit="validacao()">
		<label for="nome">Nome: </label>
		<input type="text" name="nome" id="nome" placeholder="Ex: João Schanoski">
		<label for="email">Email: </label>
		<input type="email" name="email" id="email" placeholder=" Ex: auladeweblegal@gmail.com">
		<label for="senha">Senha: </label>
		<input id="senha" type="password" name="senha" size="20" onkeyup="checa_seguranca('senha', 'pass');"  /> <font size='1' face='Tahoma'> <div id="pass"> </div></font>
		<label for="csenha"> Confirmar Senha: </label> 
		<input id="csenha" type="password" name="csenha">

		<select>
			<option> Selecione um Sexo </option>
			<option>Feminino</option>
			<option>Masculino</option>
		</select>
		<label for="data">Data de Nascimento</label>
		<input type="text" name="data" id="data" data-mask="00/00/0000" placeholder="Ex: 03/05/1985">
		<label for="cpf">CPF:</label>
		<input type="text" name="cpf" id="cpf" data-mask="000.000.000-00" placeholder="Ex: 123.456.789-10">
		<label for="tel">Telefone: </label>
		<input type="tel" name="telefone" id="tel" data-mask="(00) 0000-0000" placeholder="Ex: 50 1234-5678">
		<input type="submit" id="cadastrar" value="cadastrar">
	</form>

	<script src="jquery-3.3.1.min.js"></script>
	<script src="jquery.mask.js"></script>
</body>
</html>