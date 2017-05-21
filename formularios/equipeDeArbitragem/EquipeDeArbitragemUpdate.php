<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
<Title><?php utf8_encode("Atualização de dados da Equipe de Arbitragem");?></Title>

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

		<li><a href="./EquipeDeArbitragem.php">Equipe De Arbitragem</a></li>
		<li><a href="./EquipeDeArbitragemConsulta.php">Consultar a Equipe De Arbitragem</a></li>
	  		<li><a href="#">Editar dados da Equipe De Arbitragem</a>
			</li>
		<li><a href="../homeFormularios.php">Olhar outra tabela</a></li>             
</ul>
</nav>
	</header>
<?php
$erro = null;
$valido = false;
include ('./EquipeDeArbitragemCRUD.php');
$objAux = new EquipeDeArbitragemCRUDClasse();

// resposável por editar os dados carregados do else
if (isset ( $_POST ["primaryKey"] )) {// isset retorna false se o valor for null ou se a variavel não existir
	$primaryKey = $_POST ["primaryKey"];
	$campos = array (
			$_POST ["txtNomeBandeirinha1"],
			$_POST ["txtNomeBandeirinha2"],
			$_POST ["txtNomeArbitro"],
			$_POST ["txtNomeQuartoArbitro"],
			$_POST ["txtNomeEntidade"],
			$_POST ["txtDelegado"]
	);	
	$objAux->alterarDadosEquipeDeArbitragem ( $primaryKey, $campos );
} // responsavel por receber todos os dados quando a pagina é carregada e apresentar ao usuario
else {
	$primaryKey = array (
			$_REQUEST ["id"]			
	);
	// Os campos do formulario ficam preenchidos com o valor
	// após o método consultar jogador ser executado através do metodo post do php
	$objAux->consultarEquipeDeArbitragem ( $primaryKey );
}
?>

<body>

	<!-- estrutura fundamental por passar a primary key para o if-->


	<h1 id="tituloDoForm">
		Editar dados de Equipes de Arbitragem
	</h1>
	<form id="formularioInter" name="tabelaEquipesDeArbitragem" method="post" action="?validar=true">
	
		<!-- Campo Bandeirinha1 -->
		<div class="retiraQuebraDeLinha">
			<label>Bandeirinha 1:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="txtNomeBandeirinha1"
				placeholder="Digite aqui o nome do bandeirinha1..."
				<?php if(isset($_POST ["txtNomeBandeirinha1"])){echo "value='".$_POST ["txtNomeBandeirinha1"]."'";}?>><br>
		</div>



		
		<!-- Campo Bandeirinha 2 -->
		<div id="retiraQuebraDeLinha">
			<label>Bandeirinha 2:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="txtNomeBandeirinha2"
				placeholder="Digite o nome do bandeirinha 2..."
				<?php if(isset($_POST ["txtNomeBandeirinha2"])){echo "value='".$_POST ["txtNomeBandeirinha2"]."'";}?>><br>
		</div>
		<br>]
		
		
		
		<!-- Campo Arbitro -->
		<div id="retiraQuebraDeLinha">
			<label>Arbitro:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="txtNomeArbitro"
				placeholder="Digite o nome do arbitro..."
				<?php if(isset($_POST ["txtNomeArbitro"])){echo "value='".$_POST ["txtNomeArbitro"]."'";}?>><br>
		</div>
		<br>
		
		
		<!-- Campo Quarto Arbitro -->
		<div id="retiraQuebraDeLinha">
			<label>Quarto Arbitro:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="txtNomeQuartoArbitro"
				placeholder="Digite o nome do quarto arbitro..."
				<?php if(isset($_POST ["txtNomeQuartoArbitro"])){echo "value='".$_POST ["txtNomeQuartoArbitro"]."'";}?>><br>
		</div>
		<br>
		
		
		<!-- Campo Entidade -->
		<div id="retiraQuebraDeLinha">
			<label>Entidade:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="txtNomeEntidade"
				placeholder="Digite o nome da entidade..."
				<?php if(isset($_POST ["txtNomeEntidade"])){echo "value='".$_POST ["txtNomeEntidade"]."'";}?>><br>
		</div>
		<br>
		
		
		<!-- Campo Delegado-->
		<div id="retiraQuebraDeLinha">
			<label>Delegado:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text"  name="txtDelegado"
				placeholder="Digite o nome do delegado..."
				<?php if(isset($_POST ["txtDelegado"])){echo "value='".$_POST ["txtDelegado"]."'";}?>><br>
		</div>
		<br>
		
		
		

		<!--BOTOES PARA ENVIAR-->
		<input id="botaoEnviar" type="reset" value="Limpar os dados"> <input  id="botaoEnviar" type="submit"
			value="Alterar os dados"> 
			
			<!-- Botão invisivel responsavél por capturar as primaryKey e assim promover a edição dos dados -->
			<input type="hidden" name=primaryKey
			value="<?php
			if (isset ( $_REQUEST ["id"] ))
				//nome dos campos do método ler jogadores no crude	
				echo $_REQUEST ["id"];
			else 
				//nomes dos campos desta tabela
				echo $_POST ["id"];
			?>">
	</form>


	<a id="botao" href="./EquipeDeArbitragemConsulta.php">Consultar Equipes De Arbitragem</a>
	
	<footer class="footer">
			<img class="footer" src="../utilitarios/figuras/rodape.png" alt="rodape">
	</footer><!-- em estilo. é class e # é id -->
</body>
</html>