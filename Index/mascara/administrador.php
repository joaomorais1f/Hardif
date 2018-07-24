<!DOCTYPE html>
<html>
<head>
	<title>index</title>
	<style type="text/css">
		
		.imagens {
			height: 100px;
			width: 100px;
		}
	</style>
</head>
<body>
	<?php
	include 'include.php';

?>

<?php

require 'GBD/conexao.php';
$comando = "SELECT * FROM cadastroproduto LIMIT 10";
$retorno = mysqli_query($cnx, $comando);
$produtos = array();
while($registro = mysqli_fetch_assoc($retorno)) {
	$produtos[] = $registro;
}
?>
<a href="produto/formularioProduto.php?">Adicionar Produto!</a>
<br>
<br>
<?php foreach ($produtos as $produto) : ?>
	<div class="produto">
		<img class="imagens"src="<?php echo "produto/".$produto['imagem'];?>">
		<p><?=$produto["nome"]?></p>
		<p><?=$produto["descricao"]?></p>
		<p><?=$produto["preco"]?> </p>
		<p><?=$produto["categoria"]?> </p>
		<a href="produto/detalharProduto.php?id=<?=$produto["IDproduto"]?>">Ver mais!</a>
		<a href="produto/alterarProduto.php?id=<?=$produto["IDproduto"]?>">Alterar!</a>
		<a href="produto/deletarProduto.php?id=<?=$produto["IDproduto"]?>">Deletar!</a>

	</div>
	<br>
	<br>
	<?php endforeach; ?>




	
<?php
include'includer.php';
?>
</body>
</html>