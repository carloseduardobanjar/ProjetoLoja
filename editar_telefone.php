<?php
	include("conexao.php");

	$id = $_GET["id"];
	$idTel = $_GET["idTel"];
	
	$sqlSelect = "select * from aluno where id=$id";
	$resultado = mysqli_query($conexao,$sqlSelect);
	$registro = mysqli_fetch_row($resultado);

	$nome=$registro[1];

	$sqlTel = "select * from aluno_telefone where id_telefone=$idTel";
	$resultadoTel = mysqli_query($conexao,$sqlTel);
	$registroTel = mysqli_fetch_row($resultadoTel);

	$ddd = $registroTel[2];
	$telefone = $registroTel[3];
?>

<html>
<head></head>
<body>
	<form action="update_telefone.php?id=<?php echo $id; ?>&idTel=<?php echo $idTel; ?>" method="post">
		Cliente: <input type="text" value="<?php echo $nome; ?>" disabled="disabled"><br/><br/>
		DDD: <input type="text" value="<?php echo $ddd; ?>" size="3" maxlength="2" name="ddd"><br/>
		Telefone: <input type="text" value="<?php echo $telefone; ?>" size="11" maxlength="10" name="telefone"><br/><br/>
		<input type="submit" value="Atualizar">
	</form>
	<p><a href="cadastro_telefone.php?id=<?php echo $id; ?>">Cancelar</a></p>
</body>
</html>
	

