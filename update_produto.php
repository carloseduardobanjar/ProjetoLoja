<?php
	include("conexao.php");
	$id = $_GET["id"];

	$descricao = $_POST["descricao"];
	$valor = $_POST["valor"];

	$sqlUpdate = "update produto set descricao='$descricao',valor=$valor where id=$id";
	$resultado = mysqli_query($conexao,$sqlUpdate);
	$linhasAfetadas = mysqli_affected_rows($conexao);

	if($linhasAfetadas == 1)
	{
		header("Location: lista_produtos.php");
	}
	else
	{
		echo "Ocorreu um erro na atualização.";
	}
?>