<?php
	include("conexao.php");

	$descricao = $_POST["descricao"];
	$preco = $_POST["preco"];

	$sqlInsert = "insert into produto (descricao,valor) values ('$descricao',$preco)";
	$resultado = mysqli_query($conexao,$sqlInsert);
	$linhasAfetadas = mysqli_affected_rows($conexao);

	if($linhasAfetadas == 1)
	{
		header("Location: lista_produtos.php");
	}
	else
	{
		echo "Ocorreu um erro no cadastro.";
	}
?>