<?php ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
<Title>Cadastro de Auxiliar</Title>
</head>

<body>

	<br>
	<form method="get" action="?">
		<!--CAMPOS DE ENTRADA-->
		<label>Nome:</label> <input type="text" name="campoNome"
			placeholder="Digite aqui o seu nome...">
		<!--Text box-->
		<br /> <br> <label>Digite sua data de nascimento:</label>
		<!--O campo abaixo eu que redigi...n�o sei o codigo correto para campos de data-->
		<input type="datetime" name="dataNascimento">
		<!--Depois tem que olhar na internet-->
		<br /> <br> <label>Tabela:</label> <input type="checkbox"
			name="jogador">Jogador
		<!--campo de checkagem enviam o resultado on-->
		<input type="checkbox" name="competicao">Competi��o <br /> <br> <label>Tabela:</label>
		<input type="radio" name="Jogador" value="M">Jogador <input
			type="radio" name="Jogador" value="M">Competi��o <br /> <br> <label>Posi��o:</label>
		<select name="campoEstadoCivil">
			<option value="atacante">Atacante</option>
			<option value="goleiro">Goleiro(a)</option>
			<option value="zagueiro">Zagueiro(a)</option>
		</select> <br />

		<!--BOTOES PARA ENVIAR-->
		<input type="reset" value="Limpar os dados"> <input type="submit"
			value="Enviar os dados">
	</form>

</body>
</html>
