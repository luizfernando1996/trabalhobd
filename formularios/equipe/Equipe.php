<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
<Title>Cadastro de Equipe</Title>

<link rel="stylesheet"
	href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>

<style>

</style>


</head>
<?php
$erro = null;
$valido = false;
// isset retorna false se o valor for null ou se a variavel não existir
if (isset ( $_REQUEST ["validar"] ) && $_REQUEST ["validar"] == true) {
	
	include ('./EquipeCrud.php');
	
	$Robinho = new ClasseEquipeCrude();
	$nome = $_POST ["txtNomeJogador"];
	$estado= $_POST ["estado"];
	$nomeEstadio= $_POST ["nomeEstadio"];
	$nomeTecnico= $_POST ["nomeTecnico"];
$Robinho->inserirBanco($nome, $estado, $nomeEstadio, $nomeTecnico);
} else {
	if (isset ( $erro )) {
	}
}
?>
<body>


	<h1>
		<pre>     Cadastro de Equipes</pre>
	</h1>
	<form name="tabelaJogador" method="post" action="?validar=true">
		<!-- Campo Nome -->
		<div class="retiraQuebraDeLinha">
			<label>Nome:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" 	="required" name="txtNomeJogador"
				placeholder="Digite aqui o seu nome..."><br>
		</div>


		<!-- Campo Estado: -->
		<label><?php echo(utf8_encode('Estado:'))?></label>
		<!--  -->
		<select name="estado">

			<!-- Opção 1: -->
			<option
				<?php
				if (isset ( $_POST ["estado"] ) && $_POST ["estado"] == "Minas Gerais") {
					echo "selected";
				}
				?>>Minas Gerais</option>

			<!-- Opção 2: -->
			<option
				<?php
				if (isset ( $_POST ["estado"] ) && $_POST ["estado"] == "São Paulo") {
					echo "selected";
				}
				?>>São Paulo</option>

			<!-- Opção 3: -->
			<option
				<?php
				if (isset ( $_POST ['estado'] ) && $_POST ['estado'] == "Goias") {
					echo "selected";
				}
				?>>Goias(a)</option>


		</select> <br> <!-- br quebra linha -->

		<!-- Campo Nome da Equipe -->
			<label>Nome do estadio:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="nomeEstadio"
				placeholder="Digite o nome do estadio.."><br>
			
			<label>Nome do Tecnico:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="nomeTecnico"
				placeholder="Digite o nome do estadio.."><br>
		<br>

		<!--BOTOES PARA ENVIAR-->
		<input type="reset" value="Limpar os dados"> <input type="submit"
			value="Enviar os dados">
	</form>



</body>
</html>
