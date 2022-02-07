<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$banco = "teste_php";

	$conexao = mysqli_connect($servidor,$usuario,$senha);
	if(!$conexao)
		die("Não foi possível conectar" .mysqli_connect_erros());

	mysqli_select_db($conexao,$banco) or die("Erro ao selecionar banco ".mysqli_connect_error());
?>