<?php session_start();
require '../Banco de Dados/conexao.php';
if (isset($_SESSION["logado"])) {
	$id = $_SESSION["logado"];
	$comando = "SELECT * FROM DadosUsuario WHERE IDUsuario = '$id'";
	$retorno = mysqli_query($cnx,$comando);
	$registro = mysqli_fetch_assoc($retorno);
//$_SESSION["logado"] = $id;
} else {
	header("location: index1.php");
}
/*$comando1 = "SELECT * FROM CadastroProduto";
$retorno1 = mysqli_query($cnx,$comando1);
$produto = array();
while ($registro1 = mysqli_fetch_assoc($retorno)) {
	$produto[] = $registro1; 
}*/

?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Home </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'>

	<!-- Animate.css -->
	<link rel="stylesheet" href="../css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="../css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="../css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="../css/magnific-popup.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/cssindex.css">
	<!-- Modernizr JS -->
	<script src="../js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
<![endif]-->

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
							<li class="active"><a href="logado.php">Home</a></li>
							<li><a href="conta.php">Conta</a></li>
							<li><a href="alterardados.php">Alterar Dados</a></li>
							<li><a href="carrinho.php">Carrinho</a></li>
							<li><a href="deslogar.php">Sair</a></li>
						</ul>
					</div>
				</div>

			</div>
		</nav>

		<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(../Imagens_background/assassins.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-md-offset-0 text-center">
						<div class="display-t">
							<div class="display-tc animate-box" data-animate-effect="fadeInUp">
								<h1 class="mb30">Bem-vindo, <?php echo $registro["nome"];?> </h1>
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
						<span>HardIF</span>
						<h2>Placas de Vídeo</h2>
						<?php 
						$comando = "SELECT * FROM CadastroProduto WHERE idcategoria = 1";
						$retorno = mysqli_query($cnx,$comando);
						while ($produto = mysqli_fetch_assoc($retorno)) {
							//$_SESSION["excluir"] = $produto["IDproduto"]; 
							?>	
							<figure class="placas" >
								<img src="<?php echo "../IMAGENS UPADAS".$produto['imagem']?>" height="175px">
								<p>
									<p><?=$produto["nome"]?></p>
									<button class="btn-danger"><a href="administrador/Detalharprodutologado.php?IDproduto=<?php echo $produto['IDproduto']?>" style="color:white">Ver mais...</button>
										<button class="btn-danger"><a href="carrinho.php?IDproduto=<?php echo $produto['IDproduto']?>" style="color:white">Comprar...</button>

										</p>
									</figure>
								<?php } ?>
							</div>
						</div>
					</div>
					<div id="fh5co-blog" class="fh5co-bg-section">
						<div class="container">
							<div class="row animate-box row-pb-md" data-animate-effect="fadeInUp">
								<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
									<span>HardIF</span>
									<h2>Memória RAM</h2>
									<?php 
									$comando = "SELECT * FROM CadastroProduto WHERE idcategoria = 3";
									$retorno = mysqli_query($cnx,$comando);
									while ($produto = mysqli_fetch_assoc($retorno)) {

										?>	
										<figure class="placas" >
											<img src="<?php echo "../IMAGENS UPADAS".$produto['imagem']?>" height="175px">
											<p>
												<p><?=$produto["nome"]?></p>
												<button class="btn-danger"><a href="Administrador/Detalharprodutologado.php?IDproduto=<?php echo $produto['IDproduto']?>" style="color:white">Ver mais...</button>
													<button class="btn-danger"><a href="carrinho.php?IDproduto=<?php echo $produto['IDproduto']?>" style="color:white">Comprar...</button>

													</p>
												</figure>
											<?php } ?>

										</div>

									</div>
								</div>
								<div id="fh5co-started">
									<div class="container">
										<div class="row animate-box">
											<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
												<span>HardIF</span>
												<h2>Placa Mãe</h2>
												<?php 
												$comando = "SELECT * FROM CadastroProduto WHERE idcategoria = 2";
												$retorno = mysqli_query($cnx,$comando);
												while ($produto = mysqli_fetch_assoc($retorno)) {
													$_SESSION["excluir"] = $produto["IDproduto"]; 
													?>	
													<figure class="placas" >
														<img src="<?php echo "../IMAGENS UPADAS".$produto['imagem']?>" height="175px">
														<p>
															<p><?=$produto["nome"]?></p>
															<button class="btn-danger"><a href="Administrador/Detalharprodutologado.php?IDproduto=<?php echo $produto['IDproduto']?>" style="color:white">Ver mais...</button>
																<button class="btn-danger"><a href="carrinho.php?IDproduto=<?php echo $produto['IDproduto'];?>" style="color:white">Comprar...</button>

																</p>
															</figure>
														<?php } ?>
													</div>
												</div>
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

