<!DOCTYPE html>
<html>
<head>
	<title>index</title>
	<style type="text/css">
	.imagens {
		height:330px;
		width:200px;
	}
</style>
</head>
<body>
	<?php

	include 'include.php';
	?>
		<?php

		require 'GBD/conexao.php';
		$comando = "SELECT * FROM cadastroproduto";
		$retorno = mysqli_query($cnx, $comando);
		$produtos = array();
		while($registro = mysqli_fetch_assoc($retorno)) {
			$produtos[] = $registro;
		}
		?>
		<?php foreach ($produtos as $produto) : ?>
			<div class="produto">
				<img class="imagens"src="<?php echo "produto/".$produto['imagem'];?>">
				<p><?=$produto["descricao"]?></p>
				<p><?=$produto["preco"]?> </p>
				<p> <?=$produto["categoria"]?> </p>
				<a href="produto/detalharProduto.php?id=<?=$produto["IDproduto"]?>">Ver mais!</a>
			</div>
		<?php endforeach; ?>




		
		<?php
		include'includer.php';
		?>
	</body>
	</html>