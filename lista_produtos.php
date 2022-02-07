<?php
	include("conexao.php");

	$sqlSelect = "select * from produto order by descricao";
	$resultado = mysqli_query($conexao,$sqlSelect);
	$linhas = mysqli_num_rows($resultado);

	echo "<table>";
	echo "<tr>";
	echo "<th>Produto</th>";
	echo "<th>Valor Unit.</th>";
	echo "<th>Editar</th>";
	echo "<th>Excluir</th>";

	for($i = 0; $i < $linhas; $i++)
	{
		$registro = mysqli_fetch_row($resultado);
		$id = $registro[0];
		$descricao = $registro[1];
		$preco = $registro[2];

		echo "<tr>";
		echo "<td>$descricao</td>";
		echo "<td>R$ $preco</td>";
		echo "<td><a href='editar_produto.php?id=$id'>Editar</a></td>";
		echo "<td><a href='excluir_produto.php?id=$id'>Excluir</a></td>";
		echo "</tr>";
	}

	echo "</table>";
?>
<p>
	<a href="cadastro_produto.php">Cadastrar novo Produto</a>
</p>