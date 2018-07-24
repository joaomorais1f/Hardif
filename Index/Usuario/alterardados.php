<?php
require '../Banco de Dados/conexao.php';
session_start();
//$_SESSION["logado"] = true;
if (isset($_SESSION["logado"])) {
	$id = $_SESSION["logado"];
	$comando = "SELECT * FROM DadosUsuario WHERE IDUsuario = '$id'";
	$retorno = mysqli_query($cnx,$comando);
	$registro = mysqli_fetch_assoc($retorno);
} else {
	header("location: index1.php");
}

if (!empty($_POST)) {
	foreach($_POST as $chave => $valor){

		$$chave = (trim(strip_tags($valor)));

	}
	$erro = false;
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$emailerro =  "E-mail inválido <br>";
		$erro = true; 
	} else {
		$emailcorreto = $email;
	}
	if ((!filter_var($endereco, FILTER_SANITIZE_STRING))) {
		$enderecoerro = "Nao informe TAGS html, css ou de outra linguagem ";
		$erro = true;
	} else {
		$enderecocorreto = $endereco;
	}

	if ((!filter_var($nome, FILTER_SANITIZE_STRING) || (strlen($nome) < 3))){
		$nomeerro =  "Nome Invalido <br>";
		$erro = true;
	}else {
		$nomecorreto = $nome;
	}
	if ((!preg_match("/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}$/", $cpf)) || (strlen($cpf) < 11)) {
		$cpferro =  "CPF invalido <br>";
		$erro = true;
	}	else {
		$CPFcorreto = $cpf;
	}
	
	if ((!preg_match('^\(+[0-9]{2,3}\) [0-9]{4}-[0-9]{4}$^', $telefone)) || (strlen($telefone) < 10)) {
		$telefoneerro =  "Numero de Telefone Invalido <br> ";
		$erro = true;
	}else {
		$telefonecorreto = $telefone;
	}

	if ((strlen($senha) < 8) || (strlen($senha) > 16)) {
		$senhaerro =  "Informe uma senha entre 8 e 16 caracteres <br>";
		$erro = true;
	}else {
		$senhacorreta = $senha;
	}
	if (!($csenha == $senha)) {
		$senha2erro =  "Por favor, confirme sua senha <br>";
		$erro = true;
	}else {
		$senhacorreta = $senha;
	}


	if (!$erro) {
		$comando1 = "SELECT * FROM DadosUsuario WHERE email = '$emailcorreto'";
		$retorno1 = mysqli_query($cnx, $comando1);
		$registro1 = mysqli_fetch_assoc($retorno1);
		if($registro1 == $emailcorreto) {
			echo "";
		} elseif ($registro1 != null && $registro1 == $emailcorreto)  {
			echo " <script> alert('EMAIL JA CADASTRADO, Tente novamente') </script>";
			header("refresh:0.3; alterardados.php");
		} else {
		$comando2 = "UPDATE DadosUsuario SET nome = '$nomecorreto' , email = '$emailcorreto', endereco = '$enderecocorreto',
		CPF = '$CPFcorreto',telefone = '$telefonecorreto', senha = '$senhacorreta' WHERE IDUsuario = '$id'"; 
		$retorno2 = mysqli_query($cnx, $comando2);
		header("refresh:0.3; alterardados.php");
		echo "<script> alert ('DADOS ALTERADOS COM SUCESSO')</script>";
	}
}
}


?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Alterar Dados Usuario</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />
	

	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

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
	<link rel="stylesheet" href="../css/cssindex.css">
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
						<form action="" method="POST">
							<input id="barra" type="text" name="Procurar" placeholder="BUSCAR">
							<button class="btn btn-primary" style="width: 8%; background-color: transparent; border-color:white;">Buscar</button>

						</form>
						<br>

					</div></center>
					<div class="col-xs-12 text-center menu-1">
						<ul>
							<li><a href="logado.php">Home</a></li>

						</li>
						<li><a href="conta.php">Conta</a></li>						
						<li class="active"><a href="alterardados.php">Alterar Dados</a></li>
						<li><a href="carrinho.php">Carrinho</a></li>
						<li><a href="deslogar.php">Sair</a></li>
					</ul>
				</div>
			</div>
			
		</div>
	</nav>

	<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(../Imagens_background/backalterar.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeInUp">
							<h1 class="mb30">Alterar Dados</h1>
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
						<h3>Alterar Dados</h3>
						
						</div> <?php */?>

					</div>
					<div class="col-md-6 animate-box">
						<h3>Alterar Dados</h3>
						<form action="" method="POST">
							<div class="row form-group">
								<div class="col-md-6">
									<label for="fname">Nome</label>
									<input type="text" id="nome" class="form-control" name="nome" placeholder="Nome" value="<?php echo $registro['nome'];?>">
																	<?php
								
								if (!empty($_POST)) {
									if(isset($nomeerro)) { 
										echo "<p class='erro'>".$nomeerro."</p>";
									} 
								} 
								?>
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label for="email">Email</label>
									<input type="text" id="email" class="form-control" name="email"placeholder="Email" value="<?php echo $registro['email'];?>">
																	<?php
								
								if (!empty($_POST)) {
									if(isset($nomeerro)) { 
										echo "<p class='erro'>".$nomeerro."</p>";
									} 
								} 
								?>
								</div>

							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label for="endereco">Endereço</label>
									<input type="text" id="endereco" class="form-control" name="endereco"placeholder="Endereco" value="<?php echo $registro['endereco'];?>">
																	<?php
								
								if (!empty($_POST)) {
									if(isset($nomeerro)) { 
										echo "<p class='erro'>".$nomeerro."</p>";
									} 
								} 
								?>
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-12">
									<label for="Senha">Senha</label>
									<input type="text" id="Senha" class="form-control" name="senha"placeholder="Senha" value="<?php echo $registro['senha'];?>">
																	<?php
								
								if (!empty($_POST)) {
									if(isset($nomeerro)) { 
										echo "<p class='erro'>".$nomeerro."</p>";
									} 
								} 
								?>
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-12">
									<label for="csenha">Confirmar Senha</label>
									<input type="password" id="csenha" class="form-control" name="csenha"placeholder="Confirmar Senha">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label for="cpf">CPF</label>
									<input name="cpf" id="cpf"  class="form-control" name="cpf" data-mask="000.000.000-00"laceholder="CPF" value="<?php echo $registro['CPF'];?>">
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-12">
									<label for="tel">Telefone</label>
									<input name="telefone" id="tel"  class="form-control" data-mask="(00) 0000-0000"name="telefone"placeholder="Telefone" value="<?php echo $registro['telefone'];?>">
								</div>
							</div>
							<div class="form-group">
								<input type="submit" value="Alterar" class="btn btn-primary">
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


<script src="../js/jquery.mask.js"></script>
</body>
</html>
