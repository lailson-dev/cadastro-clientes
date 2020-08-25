<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Sistema de Cadastro de Clientes - PHP, MySQL, HTML, CSS & Bootstrap - Lailson Conceição</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/app.css">
</head>
<body>

	<section class="main__page">

		<div class="btn-group mt-5" role="group" aria-label="Exemplo básico">
		  <a href="/" class="btn btn-primary">Início</a>
		  <a href="/cadastrar" class="btn btn-primary">Cadastrar</a>
		</div>

		<!-- <div class="main__page-message">
			<span class="message__error">Ocorreu um erro ao cadastrar o cliente, tente novamente mais tarde.</span>
			<span class="message__success">Cliente cadastrado com sucesso!</span>
		</div> -->

		<?php require $layout->load(); ?>		

	</section>
</body>
</html>