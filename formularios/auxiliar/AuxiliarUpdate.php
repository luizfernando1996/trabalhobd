<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
<Title><?php utf8_encode("Atualização de dados do Auxiliar");?></Title>

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

		<li><a href="./Auxiliar.php">Auxiliar</a></li>
		<li><a href="./AuxiliarConsulta.php">Consultar o auxiliar</a></li>
	  		<li><a href="#">Editar dados do auxiliar</a>
			</li>
		<li><a href="../homeFormularios.php">Olhar outra tabela</a></li>             
</ul>
</nav>
	</header>
<?php
$erro = null;
$valido = false;
include ('./AuxiliarCRUD.php');
$objAux = new AuxiliarCRUDClasse();

// resposável por editar os dados carregados do else
if (isset ( $_POST ["primaryKey"] )) {// isset retorna false se o valor for null ou se a variavel não existir
	$primaryKey = $_POST ["primaryKey"];
	$campos = array (
			$_POST ["txtNomeAuxiliar"],
			$_POST ["txtNomeEquipe"]			
	);
	
	$objAux->alterarDadosAuxiliar ( $primaryKey, $campos );
} // responsavel por receber todos os dados quando a pagina é carregada e apresentar ao usuario
else {
	$primaryKey = array (
			
			$_REQUEST ["nome"]
			
	);
	// Os campos do formulario ficam preenchidos com o valor
	// após o método consultar jogador ser executado através do metodo post do php
	$objAux->consultarAuxiliar ( $primaryKey );
}
?>
<body>

	<!-- estrutura fundamental por passar a primary key para o if-->

<br><br>
	<h1 id="tiloDoForm">
		Editar dados de Auxiliares
	</h1>
	<form id="formularioInter" name="tabelaAuxiliares" method="post" action="?validar=true">
		<!-- Campo Nome -->
		<div class="retiraQuebraDeLinha">
			<label>Nome:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="txtNomeAuxiliar"
				placeholder="Digite aqui o seu nome..."
				<?php if(isset($_POST ["txtNomeAuxiliar"])){echo "value='".$_POST ["txtNomeAuxiliar"]."'";}?>><br>
		</div>



		
		<!-- Campo Nome da Equipe -->
		<div id="retiraQuebraDeLinha">
			<label>Nome da equipe:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="txtNomeEquipe"
				placeholder="Digite o nome da equipe..."
				<?php if(isset($_POST ["txtNomeEquipe"])){echo "value='".$_POST ["txtNomeEquipe"]."'";}?>><br>
		</div>
		<br>

		<!--BOTOES PARA ENVIAR-->
		<input id="botaoEnviar" type="reset" value="Limpar os dados"> <input  id="botaoEnviar" type="submit"
			value="Alterar os dados"> 
			
			<!-- Botão invisivel responsavél por capturar as primaryKey e assim promover a edição dos dados -->
			<input type="hidden" name=primaryKey
			value="<?php
			if (isset ( $_REQUEST ["nome"] ))
				//nome dos campos do método ler jogadores no crude	
				echo $_REQUEST ["nome"];
			else 
				//nomes dos campos desta tabela
				echo $_POST ["txtNomeAuxiliar"];
			?>">
	</form>


	<a id="botao" href="./AuxiliarConsulta.php">Consultar Auxiliares</a>
	
	<footer class="footer">
			<img class="footer" src="../utilitarios/figuras/rodape.png" alt="rodape">
	</footer><!-- em estilo. é class e # é id -->
</body>
</html>