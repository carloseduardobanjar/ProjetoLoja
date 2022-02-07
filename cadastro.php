<html>
<head></head>
<body>
	<form action="insert.php" method="post">
		Nome: <input type="text" name="nome"> <br/>
		Endereço: <input type="text" name="endereco"> <br/>
		Sexo:
			<input type="radio" name="sexo" value="F"> Feminino
			<input type="radio" name="sexo" value="M"> Masculino <br/>
		Estado civil:
			<select name="estado_civil">
				<option selected>Selecione o Estado Civil</option>
				<option value="1">Solteiro</option>
				<option value="2">Casado</option>
				<option value="3">Separado</option>
				<option value="4">Viúva(o)</option>
			</select><br/>
		Matérias de interesse:
			<input type="checkbox" name="materias[]" value="matematica"/> Matemática
			<input type="checkbox" name="materias[]" value="biologia"/> Biologia
			<input type="checkbox" name="materias[]" value="historia"/> História<br/>
		<input type="submit" value="Enviar">
	</form>
</body>
</html>