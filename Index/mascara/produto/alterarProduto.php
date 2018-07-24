<?php

require "../GBD/conexao.php";

$id = $_GET["id"];

$comando = "SELECT * FROM cadastroproduto WHERE IDproduto = '$id'";
$retorno = mysqli_query($cnx, $comando);

$registro = mysqli_fetch_assoc($retorno);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form action="atualizarProduto.php" method="POST" enctype="multipart/form-data">

	<input type="hidden" name="id" 
		value="<?php echo $registro["IDproduto"]; ?>">

	Descricao: <input type="text" name="descricao" 
		value="<?php echo $registro["descricao"]; ?>">
	Preco: <input type="number" name="preco" 
		value="<?php echo $registro["preco"];?>">
		Categoria <select name="Categoria">
		<option> Placa de Video</option>
		<option> Placa Mãe </option>
		<option> Memoria RAM </option>
	</select>
		 Imagem Produto <input type="file" name="imagemproduto" value="<?php echo "Imagens/".$registro["imagem"]; ?>">
	<button type="submit">vai!</button>
</form>


</body>
</html>