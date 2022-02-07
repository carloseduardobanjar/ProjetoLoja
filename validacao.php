<?php
	include("conexao.php");

	$login = $_POST['login'];
	$senha = $_POST['senha'];

	$consulta = "select * from usuario where login='$login' and senha=AES_ENCRYPT('$senha','token')";
	$resultado = mysqli_query($conexao,$consulta);

	$registro = mysqli_fetch_row($resultado);

	$codUsuario = $registro[0];
	$nome = $registro[1];

	$usuarioEncontrado = mysqli_affected_rows($conexao);

	if($usuarioEncontrado == 1)
	{
		session_start();
		$_SESSION['codigo'] = $codUsuario;
		header("Location: lista.php");
	}
	else
		echo "Usuário/Senha inválidos. Tente novamente. <a href='login.php'>Voltar</a>";
?>
