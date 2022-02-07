<?php
	include("conexao.php");

	$id = $_GET["id"];
	$sqlSelect = "select * from aluno where id=$id";
	$resultado = mysqli_query($conexao,$sqlSelect);
	$registro = mysqli_fetch_row($resultado);

	$nome=$registro[1];

	$sqlTel = "select * from aluno_telefone where id_aluno=$id";
	$resultadoTel = mysqli_query($conexao,$sqlTel);
	$linhasTel = mysqli_num_rows($resultadoTel);
?>
<html>
<head></head>
<body>
	<form action="insert_telefone.php?id=<?php echo $id; ?>" method="post">
		Cliente:<input type="text" value="<?php echo $nome; ?>" disabled="disabled"/></br></br>
		DDD: <input type="text" size="3" maxlength="2" name="ddd"/></br>
		Telefone: <input type="text" size="11" maxlength="10" name="telefone"/><br/><br/>
		<input type="submit" value="Cadastrar">		
	</form>
	<br/><br/>
	<?php
		echo "<table>";
		echo "<tr>";
		echo "<th>DDD</th>";
		echo "<th>Telefone</th>";
		echo "<th>Editar</th>";
		echo "<th>Excluir</th>";

		for($i = 0; $i < $linhasTel; $i++)
		{
			$registroTel = mysqli_fetch_row($resultadoTel);
			$idTel = $registroTel[0];
			$ddd = $registroTel[2];
			$telefone = $registroTel[3];

			echo "<tr>";
			echo "<td>$ddd</td>";
			echo "<td>$telefone</td>";
			echo "<td><a href='editar_telefone.php?id=$id&idTel=$idTel'>Editar</a></td>";
			echo "<td><a href='excluir_telefone.php?id=$id&idTel=$idTel'>Excluir</a></td>";
			echo "</tr>";
		}
		echo "</table>";
	?>
</body>
</html>
