<?php

require "../GBD/conexao.php";

$id = $_GET["id"];

$comando = "SELECT * FROM cadastroproduto WHERE IDproduto = $id";
$retorno = mysqli_query($cnx, $comando);

$registro = mysqli_fetch_assoc($retorno);
?>
<!DOCTYPE html>
<html>
<head>
	<title> Detalhes do Produto</title>
	<style type="text/css">
		.imagens {
			height:400px;
			width: 400px;
		}
	</style>
</head>
<body>
<div id="produto">
	<img class="imagens" src="<?php echo $registro["imagem"];?>">
	<p><?php echo " <strong> Nome do Produto </strong>"."<br>".$registro["nome"]?></p>
	<p><?php echo " <strong> Nome do Produto </strong>"."<br>".$registro["IDproduto"]?></p>
	<p><?php echo "<strong> Preço </strong> "." <br> R$ ".$registro["preco"]?></p>
	<p><?php echo "<strong> Descrição</strong>". "<br>".$registro["descricao"]?></p>
	</div>
	<form action="carrinho.php">
	<input type="hidden" name="id" value="<?php echo $registro["IDproduto"]; ?>">
	<input type="submit" value="Comprar/Adicionar ao carrinho">
	</form>
</body>
</html>
