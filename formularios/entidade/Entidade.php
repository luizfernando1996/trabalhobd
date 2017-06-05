<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
<Title>Cadastro de Entidades</Title>

<link rel="stylesheet"
	href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>

<style></style>
<link rel="stylesheet" type="text/css" href="../estilos.css">

</head>
<?php
$erro = null;
$valido = false;
// isset retorna false se o valor for null ou se a variavel não existir
if (isset ( $_REQUEST ["validar"] ) && $_REQUEST ["validar"] == true) {
	
	include ('./EntidadeCrud.php');
	
	$CBF = new EntidadeClasseCrude();
	$nomeEntidade= $_POST ["nomeEntidade"];
	$territorio= $_POST ["territorio"];
	$presidente= $_POST ["presidente"];
	$CBF->inserirBanco($nomeEntidade, $territorio, $presidente);
} else {
	if (isset ( $erro )) {
	}
}
?>
<body class="wraper">
	<header>
		<!-- cabeçalho -->
			<!-- O primeiro ponto é a pasta onde vc esta e o segundo é o numero maximo de pontos que é uma pasta acima -->
			<img src="../utilitarios/figuras/Topo.png" alt="topoHome">
			
			<nav>
  <ul class="menu">
  				<!-- ../ retorna uma pasta anterior-->

		<li><a href="#">Entidade</a></li>
		<li><a href="./entidadeConsulta.php">Consultar Entidades</a></li>
	  		<li><a href="./entidadeUpdate.php">Alterar dados das Entidades</a>
			</li>
		<li><a href="../homeFormularios.php">Olhar outra tabela</a></li>
</ul>
</nav>
	</header>

	<div id="tituloForm">Cadastro de Entidades</div>
	<form id="formularioInteiro" name="tabelaJogador" method="post"
		action="?validar=true">
		<!-- Campo Nome -->
		<div class="retiraQuebraDeLinha">
			<label>Nome da Entidade:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required" name="nomeEntidade"
				placeholder="Digite aqui o nome da equipe..."><br>
				<br>
		</div>
<!-- Terriorio da Abragencia: -->
		<label><?php echo(utf8_encode('Informe o territorio:'))?></label>
		<!--  -->
		<select name="territorio">

			<!-- Opção 1: -->
			<option
				<?php
				if (isset ( $_POST ["territorio"] ) && $_POST ["territorio"] == "Federal") {
					echo "selected";
				}
				?>><?php echo(utf8_encode("Federal")); ?>	</option>

			<!-- Opção 2: -->
			<option
				<?php
				if (isset ( $_POST ["territorio"] ) && $_POST ["territorio"] == "Estadual") {
					echo "selected";
				}
				?>><?php echo(utf8_encode("Estadual")); ?></option>

			<!-- Opção 3: -->
			<option
				<?php
				if (isset ( $_POST ['territorio'] ) && $_POST ['territorio'] == "Municipal") {
					echo "selected";
				}
				?>>Municipal</option>


		</select> <br> <!-- br quebra linha -->

		<!-- Presidente -->
			<label>Presidente:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="presidente"
				placeholder="Digite o presidente da entidade.."><br>
			
		<!--BOTOES PARA ENVIAR-->
		<input id="botaoEnviar" type="reset" value="Limpar os dados"> <input id="botaoEnviar" type="submit"
			value="Enviar os dados">
	</form>

	<br>
	<a id="botao" href="./entidadeConsulta.php">Consultar Entidades</a>
			<footer class="footer">
			<img class="footer" src="../utilitarios/figuras/rodape.png" alt="rodape">
	</footer><!-- em estilo. é class e # é id -->
</body>
</html>