<?php
	include("conexao.php");

	$id = $_GET["id"];
	$sqlSelect = "select * from aluno where id=$id";
	$resultado = mysqli_query($conexao, $sqlSelect);
	$registro = mysqli_fetch_row($resultado);
	$foto = $registro[6];
	unlink($foto);

	$sqlDelete = "delete from aluno where id=$id";

	$resultado = mysqli_query($conexao, $sqlDelete);	
	
	$linhasAfetadas = mysqli_affected_rows($conexao);

	if($linhasAfetadas == 1)
	{
		echo "Cliente excluído com sucesso!";
		echo "<a href='lista.php'>Voltar para lista</a>";
	}
	else
	{
		echo "Ocorreu um erro na exclusão do cliente.";
	}
	
?>
