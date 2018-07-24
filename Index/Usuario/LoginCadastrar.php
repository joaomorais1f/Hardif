<?php
if (!empty($_POST)) {
	session_start();
	require '../Banco de Dados/conexao.php';
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
		$enderecoerro = "Endereço Inválido ";
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
	if ($csenha != $senha) {
		$errosenha =  "Por favor, confirme sua senha <br>";
		$erro = true;
	}else {
		$senhacorreta = $senha;
	}
	/*if (($sexo == "") || ($sexo == "A")){
		echo "Por favor, Selecione um sexo <br>";
		$erro = true;

	}else {
		$sexocorreto = $sexo;
	}
	$datan = explode("/",$data);
	$anoatual = date("Y");
	if (($datan[0] > 31) || ($datan[0] == 00) ||(($datan[1] > 12) || ($datan[1] == 00)) || (($datan[1] > 12) || ($datan[1] == 00)) || ($datan[2] > $anoatual) ) {
		 	echo "Data Invalida <br>"; 
		$erro = true;
	}else {
		$datacorreta = $datan[2]."-".$datan[1]."-".$datan[0];
	}*/

	if (!$erro) {
		$comando1 = "SELECT * FROM DadosUsuario WHERE email = '$emailcorreto'";
		$retorno1 = mysqli_query($cnx, $comando1);
		$registro = mysqli_fetch_assoc($retorno1);
		if($registro != null) {
			echo " <script> alert('EMAIL JA CADASTRADO') </script>";
		} else {
		/*echo "<style> #a { color: green; } </style>";
		echo "<p id=a> Cadastrado com sucesso!!! </p>";*/
		$comando2 = "INSERT INTO DadosUsuario (nome,email,senha,CPF,telefone,endereco) values ('$nomecorreto','$emailcorreto','$senhacorreta','$CPFcorreto','$telefonecorreto','$enderecocorreto')";
		$retorno2 = mysqli_query($cnx, $comando2);
	} 


}


} 
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> Cadastro/Login</title>
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
						<div id="fh5co-logo"><a href="index1.php">HardIF<span>.</span></a></div>
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
							<li><a href="index1.php">Home</a></li>

						</li>

						
						<li class="active"><a href="LoginCadastrar.php">Cadastrar/Entrar</a></li>

						
					</ul>
				</div>
			</div>
			
		</div>
	</nav>

	<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(../Imagens_background/shen.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeInUp">
							<h1 class="mb30">Cadastre-se ou Entre</h1>
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
					
					<div class="fh5co-contact-info">
						<h3>Informações</h3>
						<ul>
							<li class="address">Av. João Olímpio de Oliveira <br>1561 - Vila Asem, Itapetininga - SP<br> 18202-000</li>
							<li class="phone"><a href="tel://1234567920">+55 (15)997307115</a></li>
							<li class="email"><a href="mailto:info@yoursite.com">brunoschanoski@gmail.com <br> ifsp.joaov@gmail.com</a></li>

						</ul>
					</div>

				</div>
				<div class="col-md-6 animate-box">
					<h3>Entre</h3>
					<form action="login.php" method="POST">

						<div class="row form-group">
							<div class="col-md-12">
								<label for="email_login">Email</label>
								<input type="email" id="email_login" class="form-control" placeholder="Email" name="email_login">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label for="senha_login">Senha</label>
								<input type="password" id="senha_login" class="form-control" placeholder="Senha" name="senha_login">
							</div>
						</div>
						<div class="form-group">
							<input type="submit" value="Login" class="btn btn-primary">
						</div>

					</form>		
				</div>
			</div>
			
		</div>
	</div>
	
	

	<div id="fh5co-contact">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-md-push-1 animate-box">
					
					<div class="fh5co-contact-info">
						<h3>Já posso dizer que será <br>Bem-vindo?</h3>
						
					</div>

				</div>
				<div class="col-md-6 animate-box">
					<h3>Cadastrar</h3>
					<form action="" method="POST">
						<div class="row form-group">
							<div class="col-md-6">
								<label for="nome">Nome</label>
								<input type="text" id="nome" class="form-control" placeholder="Nome" name="nome">
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
								<input type="text" id="email" class="form-control" placeholder="Email" name="email">
								<?php  
								if (!empty($_POST)) {
									if(isset($emailerro)) { 
										echo "<p class='erro'>".$emailerro."</p>";
									}
								}
								?>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label for="endereco">Endereco</label>
								<input type="text" id="endereco" class="form-control" placeholder="Endereco" name="endereco">
								<?php
								
								if (!empty($_POST)) {
									if(isset($enderecoerro)) { 
										echo "<p class='erro'>".$enderecoerro."</p>";
									} 
								}
								?>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label for="Senha">Senha</label>
								<input type="password" id="Senha" class="form-control" placeholder="Senha" name="senha">
								<?php
								
								if (!empty($_POST)) {
									if(isset($senhaerro)) { 
										echo "<p class='erro'>".$senhaerro."</p>";
									} 
								}
								?>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<label for="csenha">Confirmar Senha</label>
								<input type="password" id="csenha" class="form-control" placeholder="Confirmar Senha" name="csenha">
								<?php
								
								if (!empty($_POST)) {
									if(isset($errosenha)) { 
										echo "<p class='erro'>".$errosenha."</p>";
									} 
								}
								?>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label for="cpf">CPF</label>
								<input name="cpf" id="cpf"  class="form-control" placeholder="CPF" data-mask="000.000.000-00">
								<?php
								
								if (!empty($_POST)) {
									if(isset($cpferro)) { 
										echo "<p class='erro'>".$cpferro."</p>";
									} 
								}
								?>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<label for="tel">Telefone</label>
								<input name="telefone" id="tel"  class="form-control" placeholder="Telefone" data-mask="(00) 0000-0000">
								<?php
								
								if (!empty($_POST)) {
									if(isset($telefoneerro)) { 
										echo "<p class='erro'>".$telefoneerro."</p>";
									} 
								}
								?>
							</div>
						</div>
						<div class="form-group">
							<input type="submit" value="Cadastrar" class="btn btn-primary">
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

