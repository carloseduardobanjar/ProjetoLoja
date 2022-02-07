<?php
	include("conexao.php");
	$id = $_GET["id"];

	$ddd = $_POST["ddd"];
	$telefone = $_POST["telefone"];

	$sqlInsert = "insert into aluno_telefone (id_aluno, ddd, telefone) values ($id, '$ddd', '$telefone')";
	$resultado = mysqli_query($conexao,$sqlInsert);
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
