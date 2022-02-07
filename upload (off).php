<?php
	$id = $_GET["id"];
	$arquivo = $_FILES["arquivo"];
	$extensao = substr($arquivo["name"], -4);
	$nomeArquivo = "http://localhost/Kadu/cadastro/upload-images/" . $id . $extensao;
	if(move_uploaded_file($arquivo["tmp_name"], $nomeArquivo))
	{
		echo "O arquivo ".$arquivo["name"] ." foi enviado com sucesso! <br><br>";
	}
	else
	{
		echo "Ocorreu um erro no upload. Tente novamente.";
	}
?>

