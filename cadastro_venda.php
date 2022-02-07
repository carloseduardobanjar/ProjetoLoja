<?php
	include("conexao.php");

	$id = $_GET["id"];
	$sqlSelect = "select * from aluno where id=$id";
	$resultado = mysqli_query($conexao,$sqlSelect);
	$registro = mysqli_fetch_row($resultado);

	$nome = $registro[1];
	$endereco = $registro [2];
?>
<html>
<head></head>
<body>
	<form action="insert_venda.php?id=<?php echo $id; ?>" method="post">
		Cliente:<input type="text" value="<?php echo $nome; ?>" disabled="disabled"/></br></br>
		Endereço: <input type="text" name="endereco" value="<?php echo $endereco; ?>" disabled="disabled"/><br/><br/>
		<input type="submit" value="Cadastrar">	
	</form>
	<p><a href="lista.php">Voltar para lista</a></p>
</body>
</html>