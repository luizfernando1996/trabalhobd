<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
<Title>Cadastro de Competicao</Title>

<link rel="stylesheet"
	href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>

<style></style>
<link rel="stylesheet" type="text/css" href="../estilos.css">]


</head>
<?php
$erro = null;
$valido = false;
// isset retorna false se o valor for null ou se a variavel não existir
if (isset ( $_REQUEST ["validar"] ) && $_REQUEST ["validar"] == true) {
	
	include ("./CompeticaoCRUD.php");	
	$brasileirao = new CompeticaoCRUDClasse();
	$nome = $_POST ["txtNomeEquipe"];
	$abrangencia = $_POST ["txtAbrangencia"];
	$sistemaPontuacao = $_POST ["txtSistemaPontuacao"];
	$serie = $_POST ["txtSerie"];
	$nomeEntidade = $_POST ["txtNomeEntidade"];
	$quantidadeDeJogos = $_POST ["txtQuantidadeDeJogos"];
	$ano = $_POST ["txtAno"];
	echo $nome. " ".$abrangencia. " ".$sistemaPontuacao . " " . $serie . " " . $nomeEntidade . " " . $quantidadeDeJogos. " " .$ano;
	$brasileirao->inserirCompeticao( $nome, $abrangencia,$sistemaPontuacao,$serie,$nomeEntidade,$quantidadeDeJogos,$ano );
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

		<li><a href="#">Competicao</a></li>
		<li><a href="./CompeticaoConsulta.php"><?php echo utf8_encode("Consultar Competição")?></a></li>
	  		<li><a href="./CompeticaoUpdate.php"><?php echo utf8_encode("Editar dados de Competicao")?></a>
			</li>
		<li><a href="../homeFormularios.php">Olhar outra tabela</a></li>
</ul>
</nav>
	</header>

	<div id="tituloForm"><?php echo utf8_encode("Cadastro de Competição")?></div>
	<form id="formularioInteiro" name="tabelaCompeticao" method="post"
		action="?validar=true">
		<!-- Campo Nome -->
		<div class="retiraQuebraDeLinha">
			<label>Nome:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required" name="txtNome"
				placeholder="Digite aqui o nome da competicao..."><br>
				<br>
		</div>
		<!-- Campo Abrangencia -->
			<div class="retiraQuebraDeLinha">
			<label>Abrangencia:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required" name="txtAbrangencia"
				placeholder="Digite a abrangencia da competicao.."><br>
				<br>
		</div>
		<br>
		
		
		<!-- Campo Sistema de Pontacao -->
			<div class="retiraQuebraDeLinha">
			<label>Sistema de Pontuacao:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required" name="txtSistemaPontuacao"
				placeholder="Digite o sistema de pontuacao.."><br>
				<br>
		</div>
		<br>		
		
		
		<!-- Campo Serie -->
			<div class="retiraQuebraDeLinha">
			<label>Serie:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required" name="txtSerie"
				placeholder="Digite a serie.."><br>
				<br>
		</div>
		<br>	
		
		
		
		<!-- Campo Nome Entidade -->
			<div class="retiraQuebraDeLinha">
			<label>Nome Entidade:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required" name="txtNomeEntidade"
				placeholder="Digite a entidade.."><br>
				<br>
		</div>
		<br>	
		
		
		<!-- Campo Quantidade de Jogos -->
			<div class="retiraQuebraDeLinha">
			<label>Quantidade de Jogos:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required" name="txtQuantidadeDeJogos"
				placeholder="Digite a quantidade de jogos.."><br>
				<br>
		</div>	
		
		
		<!-- Campo Ano -->
			<div class="retiraQuebraDeLinha">
			<label>Ano:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required" name="txtAno"
				placeholder="Digite o ano.."><br>
				<br>
		</div>
		

		<!--BOTOES PARA ENVIAR-->
		<input id="botaoEnviar" type="reset" value="Limpar os dados"> <input id="botaoEnviar" type="submit"
			value="Enviar os dados">
	</form>

	<br>	
	
	<a id="botao" href="./CompeticaoConsulta.php"><?php echo utf8_encode("Consultar Competições")?></a>
			<footer class="footer">
			<img class="footer" src="../utilitarios/figuras/rodape.png" alt="rodape">
	</footer><!-- em estilo. é class e # é id -->
</body>
</html>

<!-- Cada bloco de php é um arquivo, logo ele deve ser acessado 
através do include ou através de um objeto (somente nos casos em que o arquivo a ser acessado está contido 
no mesmo arquivo onde se declara o objeto). Desta forma, exceto no ultimo caso todos devem vir com a instrução include-->
