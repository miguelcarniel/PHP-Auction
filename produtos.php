<?php
	session_start();
	include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Sistema de Leilão</title>		
	</head>
	<body>
		<a href="index.php">Home | </a>
		<a href="produtos.php">Produtos | </a>
		<a href="lista.php">Lista de Lances realizados</a><br>
		<h1>Listar Produtos</h1>

		<?php
			if(isset($_SESSION['msg']))
			{
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}		
			$result_usuarios = "SELECT * FROM usuarios ORDER BY id DESC LIMIT 1";
			$resultado_usuarios = mysqli_query($conn, $result_usuarios);
			$row_usuarios = mysqli_fetch_assoc($resultado_usuarios);

			$result_item = "SELECT * FROM itens";
			$resultado_item = mysqli_query($conn, $result_item);
			echo "Usuário logado: <br>";
			echo "ID: " . $row_usuarios['id'] .  " | ";
			echo "Usuário: " . $row_usuarios['nome'] .  " |<br><br><hr> ";
			while($row_item = mysqli_fetch_assoc($resultado_item))
			{
				echo "Código: " . $row_item['cod'] . " |<br> ";
				echo "Item: " . $row_item['item'] . "<br>";
				echo "<a href='lance.php?cod=" . $row_item['cod'] . "'>Dar lance</a><br><hr>";			
			}
		?>		
	</body>
</html>