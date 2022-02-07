<?php
	include("conexao.php");

	$id = $_GET["id"];
	$nome = $_POST["nome"];
	$endereco = $_POST["endereco"];
	$sexo = $_POST["sexo"];
	$estado_civil = $_POST["estado_civil"];
	$materias = $_POST["materias"];
	$auxMaterias = implode(",", $materias);
	$arquivo = $_FILES["arquivo"];
	$extensao = substr($arquivo["name"], -4);
	$nomeArquivo = "upload-images/" . $id . $extensao;

	if(move_uploaded_file($arquivo["tmp_name"], $nomeArquivo))
	{
		$comando = "update aluno set nome ='$nome', endereco='$endereco', sexo='$sexo', estado_civil='$estado_civil', materias='$auxMaterias', foto='$nomeArquivo' where id=$id";
		$resultado = mysqli_query($conexao, $comando);
		header("Location: lista.php");
	}

	else
	{
		echo "Ocorreu um erro no upload. Tente novamente.";
	}
	
	/*$linhasAfetadas = mysqli_affected_rows($conexao);

	if($linhasAfetadas == 1)
	{
		echo "Cliente atualizado com sucesso!";
		echo "<a href='lista.php'>Voltar para lista</a>";
	}
	else
	{
		echo "Ocorreu um erro na atualização.";
	}*/
?>