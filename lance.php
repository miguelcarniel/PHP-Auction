<?php
	session_start();
	include_once("conexao.php");
	$cod = filter_input(INPUT_GET, 'cod', FILTER_SANITIZE_NUMBER_INT);
	$result_item = "SELECT * FROM itens WHERE cod = '$cod'";
	$resultado_item = mysqli_query($conn, $result_item);
	$row_item = mysqli_fetch_assoc($resultado_item);
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
		<h1> Dê um lance</h1>
		<form method="POST" action="processalance.php">
			<input type="hidden" name="cod" value="<?php echo $row_item['cod']; ?>">

			<label>Item: </label>
			<input type="text" name="item" readonly value="<?php echo $row_item['item']; ?>"><br><br>
				
			<label>Lance: </label>
			<input type="number" name="valor" placeholder="Digite seu lance"><br><br>

			<input type="submit" value="Lance">
		</form>
	</body>
</html>