<?php
	session_start();
	include_once("conexao.php");
	
	$cod = filter_input(INPUT_POST, 'cod', FILTER_SANITIZE_NUMBER_INT);
	$item = filter_input(INPUT_POST, 'item', FILTER_SANITIZE_STRING);
	$valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_NUMBER_INT);

	$result_item = "SELECT * FROM itens WHERE cod = $cod";
	$resultado_item = mysqli_query($conn, $result_item);
	$row_item = mysqli_fetch_assoc($resultado_item);

	$result_lances = "SELECT * FROM lances";
	$resultado_lances = mysqli_query($conn, $result_lances);
	$row_lances = mysqli_fetch_assoc($resultado_lances);

	$result_usuarios = "SELECT * FROM usuarios ORDER BY id DESC LIMIT 1";
	$resultado_usuarios = mysqli_query($conn, $result_usuarios);
	$row_usuarios = mysqli_fetch_assoc($resultado_usuarios);
	$id = $row_usuarios['id'];
	$nome = $row_usuarios['nome'];

	if ($valor > $row_item['valor_min'])
	{
		$result_item = "UPDATE itens SET valor='$valor', valor_min='$valor' WHERE cod='$cod'";
		$resultado_item = mysqli_query($conn, $result_item);

		$result_lances = "INSERT INTO lances (id_user, nome_user, item_desejado, valor_lance) VALUES ('$id', '$nome', '$item', '$valor')";
		$resultado_lances = mysqli_query($conn, $result_lances);

		$_SESSION['msg'] = "<p style='color=green;'>Parabéns. Lance realizado com sucesso!.</p>";
		header("Location: produtos.php");
	}else
	{
		$_SESSION['msg'] = "<p style='color=red;'>Desculpe. Lance não pode ser aceito.</p>";
		header("Location: produtos.php");
	}
?>