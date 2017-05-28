<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
<Title><?php utf8_encode("Atualização de dados do Técnico");?></Title>

<link rel="stylesheet"
	href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>

<style></style>
<link rel="stylesheet" type="text/css" href="../estilos.css">
<link rel="stylesheet" type="text/css" href="../consulta.css">


</head>

<body class="wraper">
	<header>
		<!-- cabeçalho -->
			<!-- O primeiro ponto é a pasta onde vc esta e o segundo é o numero maximo de pontos que é uma pasta acima -->
			<img src="../utilitarios/figuras/Topo.png" alt="topoHome">
			
			<nav>
  <ul class="menu">
  				<!-- ../ retorna uma pasta anterior-->

		<li><a href="./Tecnico.php">Tecnico</a></li>
		<li><a href="./TecnicoConsulta.php">Consultar Tecnicos</a></li>
	  		<li><a href="#">Alterar dados dos tecnicos</a>
			</li>
		<li><a href="../homeFormularios.php">Olhar outra tabela</a></li>
</ul>
</nav>
	</header>

<?php
$erro = null;
$valido = false;
include ('./TecnicoCRUD.php');
$objTec = new TecnicoCRUDClasse();

// resposável por editar os dados carregados do else
if (isset ( $_POST ["primaryKey"] )) {// isset retorna false se o valor for null ou se a variavel não existir
	$primaryKey = explode ( "*", $_POST ["primaryKey"] );
	$campos = array (
			$_POST ["txtNome"],			
			$_POST ["txtEquipe"] 
	);
	$objTec->alterarDadosTecnico ( $primaryKey, $campos );
} // responsavel por receber todos os dados quando a pagina é carregada e apresentar ao usuario
else {
	$primaryKey = array (
			$_REQUEST ["nome"],
			$_REQUEST ["equipe"]
			
	);
	// Os campos do formulario ficam preenchidos com o valor
	// após o método consultar tecnico ser executado através do metodo post do php
	$objTec->consultarTecnico ( $primaryKey );
}
?>
<body>

	<!-- estrutura fundamental por passar a primary key para o if-->


	<h1 id="tiloDoForm">
		<pre>     Editar dados de Tecnicos</pre>
	</h1>
	<form id="formularioInter"name="tabelaTecnico" method="post" action="?validar=true">
		<!-- Campo Nome -->
		<div class="retiraQuebraDeLinha">
			<label>Nome:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="txtNome"
				placeholder="Digite aqui o  nome do tecnico..."
				<?php if(isset($_POST ["txtNome"])){echo "value='".$_POST ["txtNome"]."'";}?>><br>

		</div>

		<!-- Campo Nome da Equipe -->
		<div id="retiraQuebraDeLinha">
			<label>Nome da equipe:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="txtEquipe"
				placeholder="Digite o nome da equipe..."
				<?php if(isset($_POST ["txtEquipe"])){echo "value='".$_POST ["txtEquipe"]."'";}?>><br>
		</div>
		<br>

		<!--BOTOES PARA ENVIAR-->
		<input id="botaoEnviar" type="reset" value="Limpar os dados"> <input id="botaoEnviar" type="submit"
			value="Alterar os dados"> 
			
			<!-- Botão invisivel responsavél por capturar as primaryKey e assim promover a edição dos dados -->
			<input type="hidden" name=primaryKey
			value="<?php
			if (isset ( $_REQUEST ["nome"] ) && isset ( $_REQUEST ["equipe"] ))
				//nome dos campos do método ler tecnicos no crude	
				echo $_REQUEST ["nome"] . "*" . $_REQUEST ["equipe"];
			else 
				//nomes dos campos desta tabela
				echo $_POST ["txtNome"] . "*" . $_POST["txtEquipe"];
			?>">
	</form>
<br>
<br>
	<a id="botao" href="./TecnicoConsulta.php">Consultar Tecnicos</a>
	<footer class="footer">
			<img class="footer" src="../utilitarios/figuras/rodape.png" alt="rodape">
	</footer><!-- em estilo. é class e # é id -->
</body>
</html>