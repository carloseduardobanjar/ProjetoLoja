<?php
	include("conexao.php");

	$id = $_GET["id"];
	$idTel = $_GET["idTel"];

	$sqlDelete = "delete from aluno_telefone where id_telefone=$idTel";
	$resultado = mysqli_query($conexao, $sqlDelete);
	$linhasAfetadas = mysqli_affected_rows($conexao);

	if($linhasAfetadas == 1)
	{
		header("Location: cadastro_telefone.php?id=$id");
	}
	else
	{
		echo "Ocorreu um erro no cadastro.";
	}
?>