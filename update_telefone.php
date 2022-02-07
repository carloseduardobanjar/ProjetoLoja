<?php
	include("conexao.php");

	$id = $_GET["id"];
	$idTel = $_GET["idTel"];

	$ddd = $_POST["ddd"];
	$telefone = $_POST["telefone"];

	$sqlUpdate = "update aluno_telefone set ddd='$ddd', telefone='$telefone' where id_telefone=$idTel";
	$resultado = mysqli_query($conexao, $sqlUpdate);
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