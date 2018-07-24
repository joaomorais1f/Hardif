<?php

require "../GBD/conexao.php";

$comando = "SELECT * FROM cadastroproduto LIMIT 10";
$retorno = mysqli_query($cnx, $comando);
$produtos = array();
while($registro = mysqli_fetch_assoc($retorno)) {
	$produtos[] = $registro;
}


?>

<div id="adicionar">
	<a href="formularioProduto.php">Adicionar novo produto</a>
</div>

	<?php foreach ($produtos as $produto) : ?>
	<div class="produto">
		<img src="<?php echo $diretorio_da_imagem ;?>"
		<p><?=$produto["descricao"]?></p>
		<span><?=$produto["preco"]?> </span>
		<a href="detalharProduto.php?id=<?=$produto["IDproduto"]?>">Ver mais!</a>
	</div>
	<?php endforeach; ?>

