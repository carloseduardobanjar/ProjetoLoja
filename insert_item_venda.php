<?php
	include("conexao.php");

	$id = $_GET["id"];
	$idVenda = $_GET["idVenda"];

	$produto = $_POST["produto"];
	$quantidade = $_POST["quantidade"];

	$sqlInsert = "insert into item_venda (id_venda,id_produto,quantidade) values ($idVenda,$produto,$quantidade)";
	$resultado = mysqli_query($conexao,$sqlInsert);
	$linhasAfetadas = mysqli_affected_rows($conexao);


	if($linhasAfetadas == 1)
	{
		echo "Item de venda cadastrado com sucesso! </br></br>";
		echo "<a href='cadastro_item_venda.php?id=$id&idVenda=$idVenda'>Cadastrar mais itens</a>";
	}
	else
	{
		echo "Ocorreu um erro no cadastro.";
	}
?>