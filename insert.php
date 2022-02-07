<?php
	include("conexao.php");

	$nome = $_POST["nome"];
	$endereco = $_POST["endereco"];
	$sexo = $_POST["sexo"];
	$estado_civil = $_POST["estado_civil"];
	$materias = $_POST["materias"];
	$auxMaterias = implode(",", $materias);

	$sqlInsert = "insert into aluno (nome, endereco, sexo, estado_civil, materias) values ('$nome', '$endereco', '$sexo', '$estado_civil','$auxMaterias')";
	$resultado = mysqli_query($conexao, $sqlInsert);
	$linhasAfetadas = mysqli_affected_rows($conexao);

	if($linhasAfetadas == 1)
	{
		echo "Cliente cadastrado com sucesso!";
		echo "<a href='lista.php'>Voltar para lista</a>";
	}
	else
	{
		echo "Ocorreu um erro no cadastro.";
	}
?>