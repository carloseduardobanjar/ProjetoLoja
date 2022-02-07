<?php
	include("conexao.php");

	$id = $_GET["id"];
	$sqlInsert = "insert into venda (id_aluno) values ($id)";
	$resultado = mysqli_query($conexao,$sqlInsert);
	$linhasAfetadas = mysqli_affected_rows($conexao);

	$sqlSelect = "select max(id) as id from venda where id_aluno=$id";
	$resultadoSelect = mysqli_query($conexao,$sqlSelect);
	$registroSelect = mysqli_fetch_row($resultadoSelect);

	$idVenda = $registroSelect[0];

	if($linhasAfetadas == 1)
	{
		header("Location: cadastro_item_venda.php?id=$id&idVenda=$idVenda");
	}
	else
	{
		echo "Ocorreu um erro no cadastro.";
	}
?>