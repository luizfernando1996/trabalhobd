<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
<Title><?php utf8_encode("Atualização de dados do Jogador");?></Title>

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

		<li><a href="./estadio.php">Estadio</a></li>
		<li><a href="./estadioConsulta.php">Consultar Estadios</a></li>
	  		<li><a href="#">Alterar dados dos estadios</a>
			</li>
		<li><a href="../homeFormularios.php">Olhar outra tabela</a></li>
</ul>
</nav>
	</header>

<?php
$erro = null;
$valido = false;
include ('./FileEstadioCrude.php');
$mineirao = new EstadioCrude();

// resposável por editar os dados carregados do else
if (isset ( $_POST ["primaryKey"] )) {// isset retorna false se o valor for null ou se a variavel não existir
	$primaryKey =$_POST ["primaryKey"] ;
	$campos = array (
			$_POST ["nomeEstadio"],
			$_POST ["capacidade"],
			$_POST ["cidade"],
			$_POST ["estado"],
	);
	$mineirao->alterarDadosEstadio( $primaryKey, $campos );
} // responsavel por receber todos os dados quando a pagina é carregada e apresentar ao usuario
else {
	$primaryKey = array (
			$_REQUEST ["nome"],
			
	);
	// Os campos do formulario ficam preenchidos com o valor
	// após o método consultar jogador ser executado através do metodo post do php
	$mineirao->consultarEstadio( $primaryKey );
}
?>
<body>

	<!-- estrutura fundamental por passar a primary key para o if-->


	<h1 id="tiloDoForm">
		<pre>     Editar dados dos Estadios</pre>
	</h1>
	<form id="formularioInter"name="tabelaJogador" method="post" action="?validar=true">
		<!-- Campo Nome -->
		<div class="retiraQuebraDeLinha">
			<label>Nome do Estadio:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="nomeEstadio"
				placeholder="Digite aqui o seu nome..."
				<?php if(isset($_POST ["nomeEstadio"])){echo "value='".$_POST ["nomeEstadio"]."'";}?>><br>
		</div>		
		<!-- Campacidade-->
		<div class="retiraQuebraDeLinha">
			<label>Capacidade:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="capacidade"
				placeholder="Digite aqui o seu nome..."
				<?php if(isset($_POST ["capacidade"])){echo "value='".$_POST ["capacidade"]."'";}?>><br>
		</div>

		<!-- Cidade-->
		<div id="retiraQuebraDeLinha">
			<label>Cidade:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required" name="cidade"
				placeholder="Digite a cidade do estadio..." 
				<?php if(isset($_POST ["cidade"])){echo "value='".$_POST ["cidade"]."'";}?>><br><br>
		</div>

		<!-- Estado: -->
		<label><?php echo(utf8_encode('Estado:'))?></label>
		<!--  -->
		<select id="inputs" name="estado">

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
				if (isset ( $_POST ["estado"] ) && $_POST ["estado"] == utf8_encode("São Paulo") ){
					echo "selected";
				}
				?>><?php echo utf8_encode("São Paulo")?></option>

			<!-- Opção 3: -->
			<option
				<?php
				if (isset ( $_POST ['estado'] ) && $_POST ['estado'] == "Bahia") {
					echo "selected";
				}
				?>>Bahia(a)</option>


		</select> <br> 

		<br>

		<!--BOTOES PARA ENVIAR-->
		<input id="botaoEnviar" type="reset" value="Limpar os dados"> <input id="botaoEnviar" type="submit"
			value="Alterar os dados"> 
			
			<!-- Botão invisivel responsavél por capturar as primaryKey e assim promover a edição dos dados -->
			<input type="hidden" name=primaryKey
			value="<?php
			if (isset ( $_REQUEST ["nome"] ))
				//nome dos campos do método ler jogadores no crude	
				echo $_REQUEST ["nome"];
			else 
				//nomes dos campos desta tabela
				echo $_POST ["nomeEstadio"] ;
			?>">
	</form>


	<a id="botao" href="./jogadorConsulta.php">Consultar Jogadores</a>
	<footer class="footer">
			<img class="footer" src="../utilitarios/figuras/rodape.png" alt="rodape">
	</footer><!-- em estilo. é class e # é id -->
</body>
</html>