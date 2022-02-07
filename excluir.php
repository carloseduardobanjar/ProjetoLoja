<?php
	include("conexao.php");

	$id = $_GET["id"];
	$sqlSelect = "select * from aluno where id=$id";
	$resultado = mysqli_query($conexao, $sqlSelect);
	$registro = mysqli_fetch_row($resultado);
	$nome = $registro[1];
?>
<html>
<head></head>
<body>
	Deseja excluir o cliente <?php echo $nome; ?>? <br/><br/>
	<a href="lista.php">Não</a> <br/><br/>
	<a href="delete.php?id=<?php echo $id; ?>">Sim</a>
</body>
</html>