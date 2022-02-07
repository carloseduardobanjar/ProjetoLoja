<?php
	session_start();

	if(isset($_SESSION['codigo']))
	{
		include("conexao.php");

		$codUsuario = $_SESSION['codigo'];
		$consulta2 = "select * from usuario where cod_usuario=$codUsuario";
		$resultado2 = mysqli_query($conexao,$consulta2);
		$registro2 = mysqli_fetch_row($resultado2);
		$nomeUsuario = $registro2[1];

		echo "<h3>Seja bem vindo(a), " . $nomeUsuario . "! </h3>";
		echo "<h5><a href='logoff.php'>Clique aqui para sair.</a></h5>";
		$consulta = "select * from aluno";
		$resultado = mysqli_query($conexao,$consulta);
		$linhas = mysqli_num_rows($resultado);

		echo "<table>";
		echo "<tr>";
		echo "<th>Nome</th>";
		echo "<th>Endereço</th>";
		echo "<th>Sexo</th>";
		echo "<th>Estado civil</th>";
		echo "<th>Matérias de interesse</th>";
		echo "<th>Telefone</th>";
		echo "<th>Venda</th>";
		echo "<th>Excluir?</th>";
		echo "<th>Foto</th>";

		for($i=0; $i < $linhas; $i++)
		{
			$registro = mysqli_fetch_row($resultado);
			$id = $registro[0];
			$nome = $registro[1];
			$endereco = $registro[2];
			$sexo = $registro[3];
			$estado_civil = $registro[4];
			$materias = $registro[5];
			$foto = $registro[6];

			echo "<tr>";
			echo "<td><a href='editar.php?id=$id'>$nome</a></td>";
			echo "<td>$endereco</td>";
			echo "<td>$sexo</td>";
			echo "<td>$estado_civil</td>";
			echo "<td>$materias</td>";
			echo "<td><a href='cadastro_telefone.php?id=$id'>Cadastrar/Editar</a></td>";
			echo "<td><a href='cadastro_venda.php?id=$id'>Cadastrar Venda</a></td>";
			echo "<td><a href='excluir.php?id=$id'>Excluir</a></td>";
			echo "<td><img src=$foto width=50px height=50px></td>";
			echo "</tr>";
		}

		echo "</table>";
	}
	else
	{
		header("Location: login.php");
	}
?>
