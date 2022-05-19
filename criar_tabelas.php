<?php
	include_once("conexao.php");

	//criando tabela itens
	$sql = "CREATE TABLE itens (
		cod INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		item VARCHAR(30) NOT NULL,
		valor FLOAT(10) NOT NULL,
		valor_min FLOAT(10) NOT NULL
		)";
	mysqli_query($conn, $sql);

	//atribuindo alguns itens
	$result_item = "INSERT INTO itens (item, valor, valor_min) VALUES ('Quadro Monalisa', '8000', '8000')";
	$resultado_item = mysqli_query($conn, $result_item);
	$result_item = "INSERT INTO itens (item, valor, valor_min) VALUES ('Fiat Uno 93 1.0', '3000', '3000')";
	$resultado_item = mysqli_query($conn, $result_item);
	$result_item = "INSERT INTO itens (item, valor, valor_min) VALUES ('Bicicleta Caloi a26 18 marchas', '700', '700')";
	$resultado_item = mysqli_query($conn, $result_item);
	$result_item = "INSERT INTO itens (item, valor, valor_min) VALUES ('Barco de pesca', '2000', '2000')";
	$resultado_item = mysqli_query($conn, $result_item);

	//criando tabela usuarios
	$sql_usuarios = "CREATE TABLE usuarios (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		nome VARCHAR(30) NOT NULL,
		idade INT(3) NOT NULL
		)";
	mysqli_query($conn, $sql_usuarios);

	//criando tabela lances
	$sql_lances = "CREATE TABLE lances (
		id_user INT(6) UNSIGNED,
		nome_user VARCHAR(30) NOT NULL,
		item_desejado VARCHAR(30) NOT NULL,
		valor_lance FLOAT(10) NOT NULL
		)";
	mysqli_query($conn, $sql_lances);
?>