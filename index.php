<?php
	session_start();
	// scripts de criação de db e tabelas
	//include_once("criar_db.php");
	//include_once("criar_tabelas.php");
	
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title> Sistema de Leilão</title>
	</head>
	<body>
		<a href="index.php">Home | </a>
		<a href="produtos.php">Produtos | </a>
		<a href="lista.php">Lista de Lances realizados</a><br>
		<h1> Cadastro de Usuário</h1>
		<?php
			if(isset($_SESSION['msg']))
			{
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
			?>
		<form method="POST" action="processa.php">
			<label>Nome: </label>
			<input type="text" name="nome" placeholder="Digite seu nome"><br><br>
			
			<label>Idade: </label>
			<input type="number" name="idade" placeholder="Digite sua idade"><br><br>

			<input type="submit" value="Cadastrar">
		</form>
	</body>
</html>