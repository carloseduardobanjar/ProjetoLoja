<?php
	include("conexao.php");

	$id = $_GET["id"];
	$idVenda = $_GET["idVenda"];
	$codProduto = $_GET["codProduto"];

	$sqlDelete = "delete from item_venda where id_venda=$idVenda and id_produto=$codProduto";
	$resultado = mysqli_query($conexao,$sqlDelete);
	$linhasAfetadas = mysqli_affected_rows($conexao);

	if($linhasAfetadas == 1)
	{
		header("Location: cadastro_item_venda.php?id=$id&idVenda=$idVenda");
	}
	else
	{
		echo "Ocorreu um erro no cadastro.";
	}
?>