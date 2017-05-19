<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
<Title>Cadastro de Jogador</Title>

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
	
	include ("./AuxiliarCRUD.php");	
	$objAuxiliar = new AuxiliarCRUDClasse();
	$nome = $_POST ["txtNomeAuxiliar"];
	$NomeEquipe= $_POST ["txtNomeEquipe"];	
	echo $nome;
	echo $NomeEquipe;
	
	//$objAuxiliar->inserirBanco ( $nome, $NomeEquipe );
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

		<li><a href="../default.php">Home</a></li>
		<li><a href="formularios/homeFormularios.html">Formularios</a></li>
	  		<li><a href="../auxiliar/AuxiliarCad.php">Auxiliar</a>
			</li>
		<li><a href="#">Jogador</a></li>
		<li><a href="./equipe/Equipe.php">Equipe</a></li>                 
</ul>
</nav>
	</header>

	<div id="tituloForm">Cadastro de Auxiliares</div>
	<form id="formularioInteiro" name="tabelaAuxiliar" method="post"
		action="?validar=true">
		<!-- Campo Nome -->
		<div class="retiraQuebraDeLinha">
			<label>Nome:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required" name="txtNomeAuxiliar"
				placeholder="Digite aqui o seu nome..."><br>
				<br>
		</div>
		<!-- Campo ComissaoTecnicaEquipe -->
			<div class="retiraQuebraDeLinha">
			<label>Nome da Equipe:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required" name="txtNomeEquipe"
				placeholder="Digite o nome da equipe.."><br>
				<br>
		</div>	


<br>	

		<!--BOTOES PARA ENVIAR-->
		<input id="botaoEnviar" type="reset" value="Limpar os dados"> <input id="botaoEnviar" type="submit"
			value="Enviar os dados">
	</form>

	<br>
	<a id="botao" href="./AuxiliarConsulta.php">Consultar Auxiliares</a>
			<footer class="footer">
			<img class="footer" src="../utilitarios/figuras/rodape.png" alt="rodape">
	</footer><!-- em estilo. é class e # é id -->
</body>
</html>

<!-- Cada bloco de php é um arquivo, logo ele deve ser acessado 
através do include ou através de um objeto (somente nos casos em que o arquivo a ser acessado está contido 
no mesmo arquivo onde se declara o objeto). Desta forma, exceto no ultimo caso todos devem vir com a instrução include-->