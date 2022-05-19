<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";

	$conn = mysqli_connect($servidor, $usuario, $senha);

	$sql = "CREATE DATABASE base_nivello";
	mysqli_query($conn, $sql);
?>