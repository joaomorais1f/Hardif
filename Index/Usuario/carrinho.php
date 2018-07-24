<?php session_start(); ?>
<!DOCTYPE HTML>
<?php
require '../Banco de Dados/conexao.php';

$id = $_SESSION["logado"];
$_SESSION["logado"] = $id;
$total = 0;
if (!isset($_SESSION["carrinho"])) {
	$_SESSION["carrinho"] = array();
}

if (!empty($_GET)) {
	$id = $_GET["IDproduto"];

	if (!in_array($id, $_SESSION["carrinho"])) {
		$_SESSION["carrinho"][] = $id;
	}

	//header("location: logado.php");
} else {
	//header("location: logado.php");
}



?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Carrinho</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'>


	<link rel="stylesheet" href="../css/animate.css">

	<link rel="stylesheet" href="../css/icomoon.css">

	<link rel="stylesheet" href="../css/bootstrap.css">

	<link rel="stylesheet" href="../css/magnific-popup.css">

	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/cssindex.css">
	<script src="../js/modernizr-2.6.2.min.js"></script>


</head>
<body>
	<div class="fh5co-loader"></div>
	<div id="page">
		<nav class="fh5co-nav" role="navigation">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 text-center">
						<div id="fh5co-logo"><a href="logado.php">HardIF<span>.</span></a></div>
					</div>
					<center><div>
						<form action="busca.php" method="POST">
							<input id="barra" type="text" name="Procurar" placeholder="BUSCAR">
							<button class="btn btn-primary" style="width: 8%; background-color: transparent; border-color:white;">Buscar</button>

						</form>
						<br>

					</div></center>
					<div class="col-xs-12 text-center menu-1">
						<ul>
							<li class=""><a href="logado.php">Home</a></li>
							<li class=""><a href="conta.php">Conta</a></li>
							<li class=""><a href="alterardados.php">Alterar Dados</a></li>
							<li class="active"> <a href="carrinho.php">Carrinho</a></li>
							<li><a href="deslogar.php">Sair</a></li>
						</ul>
					</div>
				</div>

			</div>
		</nav>

		<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(../Imagens_background/carrinho.gif);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-md-offset-0 text-center">
						<div class="display-t">
							<div class="display-tc animate-box" data-animate-effect="fadeInUp">
								<h1 class="mb30">Seu carrinho!</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		<div id="fh5co-counter">
			<div class="container">

				<div class="row animate-box" data-animate-effect="fadeInUp">
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
						<span>Produto</span>
						<?php

						//var_dump($_SESSION["carrinho"]);


						for ($i = 0; $i < count($_SESSION["carrinho"]); $i++) {
							$produto_comprado = $_SESSION["carrinho"][$i];
							$comando = "SELECT * FROM CadastroProduto WHERE IDproduto = '$produto_comprado'";
							$retorno = mysqli_query($cnx,$comando);
							if (!$retorno) {
								header("location: logado.php");
							} else {
								$produto = mysqli_fetch_assoc($retorno);
								$total = $total = $produto["preco"];
								//$insert = "INSERT INTO pedido (total) VALUES('$total')";
								//$return = mysqli_query($cnx,$insert);

						?>

						<figure class="placas" >
							<img src="<?="../IMAGENS UPADAS".$produto['imagem']?>" height="175px">
							<p>
								<p><?=$produto["nome"]?></p>
								<p>R$<?=$produto["preco"]?></p>
								<button class="btn-danger"><a href="deletarprodutocarrinho.php?IDproduto=<?=$produto['IDproduto']?>" style="color:white">Remover</a></button>
							</p>
						</figure>
						<?php  } } ?>
					</div>
				</div>
			</div>
			<div class="row animate-box" data-animate-effect="fadeInUp">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<p>R$<?=$total ?></p>
					<button class="btn btn-danger">Comprar</button>

				</div>
			</div>
			<footer id="fh5co-footer" role="contentinfo">
				<div class="container">
					<div class="row row-pb-md">
						<div class="col-md-4 fh5co-widget ">
							<h3>HardIF</h3>
							<p>O melhor site para comprar peças e turbinar o seu PC!</p>
						</div>
						<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 ">
							<ul class="fh5co-footer-links">
								<li><a href="#">Se</a></li>
								<li><a href="#">Tu</a></li>
								<li><a href="#">Fremes</a></li>
								<li><a href="#">Diante</a></li>
								<li><a href="#">O</a></li>
							</ul>
						</div>

						<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 ">
							<ul class="fh5co-footer-links">
								<li><a href="#">Mercado</a></li>
								<li><a href="#">Clamando</a></li>
								<li><a href="#">Pela</a></li>
								<li><a href="#">Regulamentação</a></li>
								<li><a href="#">do</a></li>
							</ul>
						</div>

						<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 ">
							<ul class="fh5co-footer-links">
								<li><a href="#">Estado</a></li>
								<li><a href="#">Para</a></li>
								<li><a href="#">Trás</a></li>
								<li><a href="#">Inditoso</a></li>
								<li><a href="#">Esquerdista</a></li>
							</ul>
						</div>
					</div>

					<div class="row copyright">
						<div class="col-md-12 text-center">
							<ul class="fh5co-social-icons">
								<li><a href="https://twitter.com/brunoschanoski"><i class="icon-twitter"></i></a></li>
								<li><a href="https://facebook.com/brunoschanoski"><i class="icon-facebook"></i></a></li>

							</ul>
						</p>
					</div>
				</div>

			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>

	<!-- jQuery -->
	<script src="../js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="../js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="../js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="../js/jquery.waypoints.min.js"></script>
	<!-- countTo -->
	<script src="../js/jquery.countTo.js"></script>
	<!-- Magnific Popup -->
	<script src="../js/jquery.magnific-popup.min.js"></script>
	<script src="../js/magnific-popup-options.js"></script>
	<!-- Main -->
	<script src="../js/main.js"></script>

</body>
</html>

