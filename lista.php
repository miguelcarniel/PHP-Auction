<?php
	include_once("conexao.php");

	$filtro_sql="";

	if ($_POST != NULL)
	{
		$filtro = $_POST["filtro"];
		$filtro_sql = "WHERE nome_user LIKE '%$filtro%'
						OR item_desejado LIKE '%$filtro%'";
	}
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
		<h1> Lista de lances</h1>
		<form method="post">
			Filtrar
			<input type="text" name="filtro" placeholder="Digite o nome ou o produto">
			<input type="submit" value="OK">
		</form>
		<br><br>
		<table border="1">
			<tr>
				<th>ID Usuário</th>
				<th>Nome</th>
				<th>Item</th>
				<th>Lance</th>
			</tr>
		
		<?php
			$sql = "SELECT * 
					FROM lances 
					$filtro_sql 
					ORDER BY valor_lance 
					DESC";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
	   			while($row = $result->fetch_assoc()) 
	   			{
	   				$id_user = $row["id_user"];
	   				$nome_user = $row["nome_user"];
	   				$item_desejado = $row["item_desejado"];
	   				$valor_lance = $row["valor_lance"];
	    			echo "<tr>
							<th>$id_user</th>
							<th>$nome_user</th>
							<th>$item_desejado</th>
							<th>$valor_lance</th>
						</tr>";
				}
			} else 
			{
	  			echo "0 results";
			}
		?>
		</table>
	</body>
</html>