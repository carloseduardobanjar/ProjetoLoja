<?php
	include("conexao.php");

	$id = $_GET["id"];
	$idVenda = $_GET["idVenda"];

	$sqlSelect = "select * from aluno where id=$id";
	$resultado = mysqli_query($conexao,$sqlSelect);
	$registro = mysqli_fetch_row($resultado);

	$nome = $registro[1];
	$endereco = $registro[2];

	$sqlProduto = "select * from produto order by descricao";
	$resultadoProduto = mysqli_query($conexao,$sqlProduto);
	$linhas = mysqli_num_rows($resultadoProduto);

	$sqlItem = "select * from item_venda iv inner join produto p on p.id=iv.id_produto where id_venda=$idVenda";
	$resultadoItem = mysqli_query($conexao,$sqlItem);
	$linhasItem = mysqli_num_rows($resultadoItem);
?>
<html>
<head></head>
<body>
	<form action="insert_item_venda.php?id=<?php echo $id; ?>&idVenda=<?php echo $idVenda; ?>" method="post">
		Cliente: <input type="text" value="<?php echo $nome; ?>" disabled="disabled"/></br></br>
		Endereço: <input type="text" name="endereco" value="<?php echo $endereco; ?>" disabled="disabled"/></br></br>
		Produto: 
		<select name="produto">
		<?php
			for($i=0; $i < $linhas; $i++)
			{
				$registroProduto = mysqli_fetch_row($resultadoProduto);
				$codProduto = $registroProduto[0];
				$descricao = $registroProduto[1];
				$valor = $registroProduto[2];
				echo "<option value='$codProduto'>$descricao - R$ $valor</option>";
			}
		?>
		</select></br>
		Quantidade:<input type="text" name="quantidade"/></br></br>
		<p><a href="lista_produtos.php">Gostaria de acrescentar algum produto a lista?</a></p>
		<input type="submit" value="Inserir Produto">
	</form></br></br>
	</br></br>
	<p><a href="lista.php">Voltar para lista</a></p>
</body>
</html>
<?php
	echo "<table>";
	echo "<tr>";
	echo "<th>Produto</th>";
	echo "<th>Quantidade</th>";
	echo "<th>Valor do Item</th>";
	echo "<th>Subtotal</th>";
	echo "<th>Excluir</th>";

	$total = 0;

	for($x = 0; $x < $linhasItem; $x++)
	{
		$registroItem = mysqli_fetch_row($resultadoItem);
		$quantidadeItem = $registroItem[2];
		$codProdutoItem = $registroItem[3];
		$descricaoItem = $registroItem[4];
		$valorItem = $registroItem[5];
		$subTotalItem = $quantidadeItem * $valorItem;
		$total = $total + $subTotalItem;

		echo "<tr>";
		echo "<td>$descricaoItem</td>";
		echo "<td>$quantidadeItem</td>";
		echo "<td>R$ $valorItem</td>";
		echo "<td>R$ $subTotalItem</td>";
		echo "<td><a href='excluir_item_venda.php?id=$id&idVenda=$idVenda&codProduto=$codProdutoItem'>Excluir</a></td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "</br></br>";
	echo "Total da compra: R$" . $total;
?>

