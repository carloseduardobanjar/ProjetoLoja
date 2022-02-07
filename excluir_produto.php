<?php
	include("conexao.php");
	$id=$_GET["id"];

	$sqlDelete = "delete from produto where id=$id";
	$resultado = mysqli_query($conexao,$sqlDelete);

	$linhasAfetadas = mysqli_affected_rows($conexao);

	if($linhasAfetadas == 1)
	{
		header("Location: lista_produtos.php");
	}
	else
	{
		echo "Ocorreu um erro na exclusão.";
	}
?>