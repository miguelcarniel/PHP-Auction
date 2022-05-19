<?php
	session_start();
	include_once("conexao.php");

	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$idade = filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_NUMBER_INT);

	if ($idade >= 18)
	{
		$result_usuario = "INSERT INTO usuarios (nome, idade) VALUES ('$nome', '$idade')";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
	}
	if(mysqli_insert_id($conn))
	{
		header("Location: produtos.php");
	} else
	{
		$_SESSION['msg'] = "<p style='color=red;'>Desculpe. Você precisa ter mais de 18 anos para acessar o leilão.</p>";
		header("Location: index.php");
	}
?>