<!DOCTYPE html>
<html>
<head>
	<title> Comprar produto </title>
</head>
<body>
	<?php
	include'include.php';
	?>

	<h1> login </h1>
	<form method="POST" action="validarcompra.php"> 
		<label for="email">Email: </label>
		<input type="email" name="email" id="email"> <br>
		<label for="senha">Senha: </label>
		<input id="csenha" type="password" name="csenha"> <br>
		<input type="submit" id="comprar" value="Comprar">
	</form>
	<p>Não possui cadastro? Então, clique <a href="cadastrar.php">aqui</a></p>
	<script src="jquery-3.3.1.min.js"></script>
	<script src="jquery.mask.js"></script>
	<?php
	include'includer.php';
	
	?>
</body>
</html>