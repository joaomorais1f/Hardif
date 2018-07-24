<!DOCTYPE html>
<html>
<head>
	<title>index</title>
</head>
<body>
	<span> <a href="deslogar.php"> Sair </a> </span> <br>
	<span> <?php session_start(); if (isset($_SESSION["compras"])){ 
		echo "Número de Produtos = ".$_SESSION["compras"]."<br>";
		echo "Total a pagar = ".$_SESSION["Total_compra"];}
		else { echo "";}?></span>
	<?php

	require 'GBD/conexao.php';
	$comando = "SELECT * FROM cadastroproduto LIMIT 10";
	$retorno = mysqli_query($cnx, $comando);
	$produtos = array();
	while($registro = mysqli_fetch_assoc($retorno)) {
		$produtos[] = $registro;
	}
	?>
	<?php foreach ($produtos as $produto) : ?>
		<div class="produto">
			<img class="imagens"src="<?php echo "produto/".$produto['imagem'];?>">
			<p><?=$produto["nome"]?></p>
			<p><?=$produto["descricao"]?></p>
			<p><?=$produto["preco"]?> </p>
			<a href="produto/detalharProduto.php?id=<?=$produto["IDproduto"]?>">Ver mais!</a>
		</div>
	<?php endforeach; ?>




	
	<?php
	include'includer.php';
	?>
</body>
</html>