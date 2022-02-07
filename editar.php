<?php
	include("conexao.php");

	$id = $_GET["id"];
	
	$sqlSelect = "select * from aluno where id=$id";
	$resultado = mysqli_query($conexao,$sqlSelect);
	$registro = mysqli_fetch_row($resultado);

	$nome=$registro[1];
	$endereco=$registro[2];
	$sexo = $registro[3];
	$estado_civil = $registro[4];
	$materias = $registro[5];
	$auxMaterias = explode(",", $materias);
?>

<html>
<head></head>
<body>
	<form action="update.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
		Nome: <input type="text" name="nome" value="<?php echo $nome; ?>"> <br/>
		Endereço: <input type="text" name="endereco" value="<?php echo $endereco; ?>"> <br/>
		Sexo:
			<?php
				if($sexo == "F")
				{
			?>
					<input type="radio" name="sexo" value="F"  checked> Feminino
					<input type="radio" name="sexo" value="M"> Masculino <br/>
			<?php
				}
				else
				{
			?>
					<input type="radio" name="sexo" value="F"> Feminino
					<input type="radio" name="sexo" value="M" checked> Masculino <br/>
			<?php
				}
			?>			
		Estado civil:
			<select name="estado_civil">
			<?php 
				switch ($estado_civil) {
					case '1':
						echo "<option value='1' selected>Solteiro</option>";
						break;
					case '2':
						echo "<option value='2' selected>Casado</option>";
						break;
					case '3':
						echo "<option value='3' selected>Separado</option>";
						break;
					case '4':
						echo "<option value='4' selected>Viúva(o)</option>";
						break;
				}
			?>
				<option value="1">Solteiro</option>
				<option value="2">Casado</option>
				<option value="3">Separado</option>
				<option value="4">Viúva(o)</option>
			</select><br/>
		Matérias de interesse: 
			<?php
				if(in_array("matematica",$auxMaterias))
					echo "<input type='checkbox' name='materias[]'' value='matematica' checked/> Matemática";
				else 
					echo "<input type='checkbox' name='materias[]'' value='matematica'/> Matemática";
				if(in_array("biologia",$auxMaterias))
					echo "<input type='checkbox' name='materias[]'' value='biologia' checked/> Biologia";
				else 
					echo "<input type='checkbox' name='materias[]'' value='biologia'/> Biologia";
				if(in_array("historia",$auxMaterias))
					echo "<input type='checkbox' name='materias[]'' value='historia' checked/> História";
				else
					echo "<input type='checkbox' name='materias[]'' value='historia'/> História";
			?> <br/>
		Fotos: <input type="file" name="arquivo"> <br/>
		<input type="submit" value="Enviar">
	</form>
	<p><a href="excluir.php?id=<?php echo $id; ?>">Excluir cliente</a></p>
</body>
</html>
	

