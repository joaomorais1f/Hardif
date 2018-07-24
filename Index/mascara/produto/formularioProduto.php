<!DOCTYPE html>

<html>
<head>
	<title></title>
</head>
<body>
<form action="adicionarProduto.php" method="POST" enctype="multipart/form-data">
	Nome: <input type="text" name="nome">
	Descricao: <input type="text" name="descricao">
	Preco: <input type="number" name="preco">
	Categoria <select name="Categoria">
		<option> Placa de Video</option>
		<option> Placa Mãe </option>
		<option> Memoria RAM </option>
	</select>
	 Imagem Produto <input type="file" name="imagemproduto">
	<button type="submit">vai!</button>
</form>
</body>
</html>