<!DOCTYPE HTML>
<?php
require '../../Banco de Dados/conexao.php';
session_start();
$id = $_GET["IDproduto"];
$comando = "SELECT * FROM CadastroProduto WHERE IDproduto = '$id'";
$retorno = mysqli_query($cnx,$comando);
$dados = mysqli_fetch_assoc($retorno);

?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="gettemplates.co" />

	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet"> -->
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="../../../asymmetry/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="../../../asymmetry/css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="../../../asymmetry/css/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="../../../asymmetry/css/bootstrap.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="../../../asymmetry/css/magnific-popup.css">
	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="../../../asymmetry/css/owl.carousel.min.css">
	<link rel="stylesheet" href="../../../asymmetry/css/owl.theme.default.min.css">
	<!-- Flexslider -->
	<link rel="stylesheet" href="../../../asymmetry/css/flexslider.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="../../../asymmetry/css/style.css">

	<!-- Modernizr JS -->
	<script src="../../../asymmetry/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
<![endif]-->

</head>
<body>

	<div class="gtco-loader"></div>
	
	<div id="page">
<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			<div class="row">
				<div class="col-sm-2 col-xs-12">
					<div id="gtco-logo"><a href="../logado.php">HardIF <em>.</em></a></div>
				</div>
				<div class="col-xs-10 text-right ">
					<ul>
						<li><a href="../logado.php">Home</a></li>

						<li><a href="../deslogar.php">Sair</a></li>
					</ul>
				</div>
			</div>
			
		</div>
	</nav>
		<div id="gtco-hero" class="js-fullheight"  data-section="home">
			<div class="flexslider js-fullheight">
				<ul class="slides">
					<li> <img src="<?php echo "../../IMAGENS BANNER".$dados['banner1']?>" class="banner">
					</li>
					<li> <img src="<?php echo "../../IMAGENS BANNER".$dados['banner2']?>" class="banner">
					</li>
					<li> <img src="<?php echo "../../IMAGENS BANNER".$dados['banner3']?>" class="banner">
						
					</li>
				</ul>
			</div>
		</div>

		<div class="gtco-section-overflow">

			<div class="gtco-section" id="gtco-services" data-section="services">
				<div class="gtco-container">
					<div class="row">
						<div class="col-md-6">
							<div class="gtco-heading">
								<h2 class="gtco-left"><?php echo $dados["nome"]?></h2>
								<h3><?php echo "R$ ".$dados["preco"];?></h3>
								 <a href="../carrinho.php"> <button class="btn-danger">Comprar</button> </a>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="row">

								<div class="col-md-12">
									<div class="feature-left">
										<div class="feature-copy">
											<h3>Caracteristicas</h3>
											<p><?php echo $dados["descricao"];?></p>
										</div>
									</div>
								</div>

									<div class="feature-left">
								
										<div class="feature-copy">
											<h3>Garantia</h3>
											<p>12 meses</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<footer id="gtco-footer" role="contentinfo">
			<div class="gtco-container">

				<div class="row copyright">
					<div class="col-md-12">
						<p class="pull-left">
							<small class="block">HardIF</small> 
							<small class="block">O melhor site para comprar peças e turbinar o seu PC!</small>
						</p>
						<p class="pull-right">
							<ul class="gtco-social-icons pull-right">
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
	<script src="../../../asymmetry/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="../../../asymmetry/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="../../../asymmetry/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="../../../asymmetry/js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="../../../asymmetry/js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="../../../asymmetry/js/jquery.countTo.js"></script>
	<!-- Flexslider -->
	<script src="../../../asymmetry/js/jquery.flexslider-min.js"></script>
	<!-- Magnific Popup -->
	<script src="../../../asymmetry/js/jquery.magnific-popup.min.js"></script>
	<script src="../../../asymmetry/js/magnific-popup-options.js"></script>
	<!-- Main -->
	<script src="../../../asymmetry/js/main.js"></script>

</body>
</html>

