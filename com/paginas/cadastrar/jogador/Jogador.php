<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
<Title>Cadastro de Auxiliar</Title>
</head>
<?php
$erro = null;
$valido = false;

if ($valido == true) {
} else {
	if (isset ( $erro )) {
	}
}
?>
<body>
	<label>Cadastro de Jogadores:</label>
	<br>

	<form name="tabelaJogador" method="post" action="?validar=true">

		<label>Nome:</label> <input type="text" name="txtNomeJogador"
			placeholder="Digite aqui o seu nome..."><br> <label>Digite sua data
			de nascimento:</label> <input type="datetime" name="dataNascimento"><br>

		<label><?php echo(utf8_encode('Posição:'))?></label> <select
			name="posicao">
			<option <?php
			if (isset ( $_POST ["posicao"])&&$_POST["posicao"]=="Atacante") {
				echo "selected";
			}
			?>>Atacante</option>

			<option
				<?php
				if (isset($_POST["posicao"])&& $_POST["posicao"]=="Zagueiro(a)") {
					echo "selected";
// 					include ('com/paginas/cadastrar/jogador/verificaCamposJogador.php');
// 					$obj = new verificaCamposJogador ();
// 					$obj->verificaPosicao($_POST ["posicao"] );
				}
				?>>Zagueiro(a)</option>

			<option <?php
			if (isset ( $_POST ['posicao'] )&&$_POST['posicao']=="Goleiro(a)") {
				echo "selected";
			}
			?>>Goleiro(a)</option>


		</select> <br> <label><?php echo(utf8_encode('Número da camisa'))?></label>
		<input type="number" name="numeroCamisa"><br>

		<!--BOTOES PARA ENVIAR-->
		<input type="reset" value="Limpar os dados"> <input type="submit"
			value="Enviar os dados">
	</form>



</body>
</html>
<!-- Cada bloco de php é um arquivo, logo ele deve ser acessado 
através do include ou através de um objeto (somente nos casos em que o arquivo a ser acessado está contido 
no mesmo arquivo onde se declara o objeto). Desta forma, exceto no ultimo caso todos devem vir com a instrução include-->