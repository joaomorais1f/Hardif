<?php
session_start();
require '../../Banco de Dados/conexao.php';
$id = $_GET["IDproduto"];
$comando = "SELECT * FROM cadastroproduto WHERE IDproduto = '$id'";
$retorno = mysqli_query($cnx,$comando);
$registro = mysqli_fetch_assoc($retorno);

if ((!empty($_POST)) && (!empty($_FILES))) {
$nome = $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$imagem_tmp = $_FILES["imagemproduto"]["tmp_name"];
$imagem = basename($_FILES["imagemproduto"]["name"]);
$diretorio_mover = "../../IMAGENS UPADAS/";
$diretorio = "../../IMAGENS UPADAS/";

move_uploaded_file($imagem_tmp, $diretorio_mover. $imagem);
$diretorio_da_imagem = $diretorio. $imagem;

$comando = "UPDATE cadastroproduto SET nome = '$nome', preco = '$preco', descricao = '$descricao', imagem = '$diretorio_da_imagem'
WHERE IDproduto = '$id'";
$retorno = mysqli_query($cnx,$comando);
if ($retorno) {
	echo "<script> alert('ALTERADO COM SUCESSO') </script>";
	header("refresh:0.1; adm.php");
} else {
	echo "<script> alert('ERRO AO ATUALIZAR PRODUTO')</script>";
	header('refresh:0.1; alterarproduto.php');
}
}
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cadastrar/Remover Produto </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	



	<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'>

	<!-- Animate.css -->
	<link rel="stylesheet" href="../../css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="../../css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="../../css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="../../css/magnific-popup.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="../../css/style.css">

	<!-- Modernizr JS -->
	<script src="../../js/modernizr-2.6.2.min.js"></script>
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
						<div id="fh5co-logo"><a href="adm.php">HardIF<span>.</span></a></div>
					</div>
					<div class="col-xs-12 text-center menu-1">
						<ul>
							<li><a href="adm.php">Home</a></li>
							<li><a href="adicionar_remover.php">Cadastrar Produto</a></li>
						</li>

						<!-- <li class="active"><a href="adicionar_remover.php">Alterar Dados Produto</a></li> -->

						<li><a href="../index1.php">Sair</a></li>
					</ul>
				</div>
			</div>
			
		</div>
	</nav>

	<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(../../Imagens_background/backplaca.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeInUp">
							<h1 class="mb30">Alterar Dados Produto</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	

	<div id="fh5co-contact">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-md-push-1 animate-box">
					
					<?php /*?><div class="fh5co-contact-info">
						<h3>Produtos</h3>
						
						</div> <? php */?>

					</div>
					<div class="col-md-6 animate-box">
						<h3>Alterar</h3>
						<form action="" method="POST" enctype="multipart/form-data">
							<div class="row form-group">
								<div class="col-md-6">
									<label for="nome">Nome</label>
									<input type="text" id="nome" name="nome" class="form-control" placeholder="Nome" 
									value="<?php echo $registro['nome'];?>">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label for="desc">Descrição</label>
									<input type="text" id="desc" name="descricao" class="form-control" placeholder="Descrição" 
									value="<?php echo $registro['descricao'];?>">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label for="preco">Preco</label>
									<input type="number" id="preco" name="preco"class="form-control" placeholder="Preco"
									value="<?php echo $registro['preco'];?>">
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-12">
									<label for="categoria">Categoria</label>
									<select name="categoria">
										<option class="form-control">Placa de Vídeo</option>
										<option class="form-control">Placa Mãe</option>
										<option class="form-control">Memória Ram</option>
									</select>
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-12">
									<label for="img">Imagem Do Produto</label>
									<input type="file" name="imagemproduto" class="form-control"
									value="<?php echo "../../IMAGENS UPADAS".$registro['imagem'];?>"><br>
									<button type="submit" class="btn btn-danger" >Cadastrar</button>
								</div>
							</div>

						</form>		
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
<script src="../../js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="../../js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="../../js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="../../js/jquery.waypoints.min.js"></script>
<!-- countTo -->
<script src="../../js/jquery.countTo.js"></script>
<!-- Magnific Popup -->
<script src="../../js/jquery.magnific-popup.min.js"></script>
<script src="../../js/magnific-popup-options.js"></script>
<!-- Main -->
<script src="../../js/main.js"></script>

</body>
</html>

