<?php
	include("conexao.php");
	$id = $_GET["id"];

	$sqlSelect = "select * from produto where id=$id";
	$resultado = mysqli_query($conexao,$sqlSelect);
	$registro = mysqli_fetch_row($resultado);

	$descricao = $registro[1];
	$valor = $registro[2];
?>
<html>
<head></head>
<body>
	<form action="update_produto.php?id=<?php echo $id; ?>" method="post">
		Descricao: <input type="text" name="descricao" value="<?php echo $descricao; ?>"> <br/>
		Preco: <input type="text" name="valor" value="<?php echo $valor; ?>"> <br/><br/>
		<input type="submit" value="Salvar">
	</form>
	<p><a href="lista_produtos.php">Voltar</a></p>
</body>
</html>