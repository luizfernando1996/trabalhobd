<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
<Title><?php utf8_encode("Atualização de dados das Entidades");?></Title>

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

		<li><a href="./Entidade.php">Entidade</a></li>
		<li><a href="./entidadeConsulta.php">Consultar Entidades</a></li>
	  		<li><a href="#">Alterar dados das Entidades</a>
			</li>
		<li><a href="../homeFormularios.php">Olhar outra tabela</a></li>
</ul>
</nav>
	</header>

<?php
$erro = null;
$valido = false;
include ('./EntidadeCrud.php');
$CBF= new EntidadeClasseCrude();

// resposável por editar os dados carregados do else
if (isset ( $_POST ["primaryKey"] )) { // isset retorna false se o valor for null ou se a variavel não existir
	$primaryKey = explode ( "*", $_POST ["primaryKey"] );
	$campos = array (
			$_POST ["txtNomeEntidade"],
			$_POST ["territorio"],
			$_POST ["tipoEntidade"]
	);
	$CBF->alterarDadosEntidades( $primaryKey, $campos );
} // responsavel por receber todos os dados quando a pagina é carregada e apresentar ao usuario
else {
	
	$primaryKey = array (
			$_REQUEST ["nome"]
	);
	// Os campos do formulario ficam preenchidos com o valor
	// após o método consultar jogador ser executado através do metodo post do php
	$CBF->lerEntidade( $primaryKey );
}
?>






<body>

	<!-- estrutura fundamental por passar a primary key para o if-->


	<h1 id="tiloDoForm">
		<pre>     Editar dados da Entidade</pre>
	</h1>
	<form id="formularioInter" name="tabelaJogador" method="post"
		action="?validar=true">
		<!-- Campo Nome -->
		<div class="retiraQuebraDeLinha">
			<label>Nome da Entidade:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="txtNomeEntidade"
				placeholder="Digite aqui o seu nome..."
				<?php if(isset($_POST ["txtNomeEntidade"])){echo "value='".$_POST ["txtNomeEntidade"]."'";}?>><br>
		</div>


		<!-- Campo territorio: -->
		<label><?php echo(utf8_encode('Territorio de Abragencia da Entidade:'))?></label>
		<!--  -->
		<select name="territorio">

			<!-- Opção 1: -->
			<option
				<?php
				if (isset ( $_POST ["territorio"] ) && $_POST ["territorio"] == "Federal") {
					echo "selected";
				}
				?>>Federal</option>

			<!-- Opção 2: -->
			<option
				<?php
				if (isset ( $_POST ["territorio"] ) && $_POST ["territorio"] == "Estadual") {
					echo "selected";
				}
				?>><?php echo utf8_encode("Estadual");?></option>

			<!-- Opção 3: -->
			<option
				<?php
				if (isset ( $_POST ["territorio"] ) && $_POST ["territorio"] == "Municipal") {
					echo "selected";
				}
				?>>Municipal</option>
		</select><br>
		
			<!-- Tipo -->
			<label>Tipo:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="tipoEntidade"
				placeholder="Digite o tipo da entidade.."
				<?php if(isset($_POST ["tipoEntidade"])){echo "value='".$_POST ["tipoEntidade"]."'";}?>
				><br>
				<br>

		<!-- Botão invisivel responsavél por capturar as primaryKey e assim promover a edição dos dados -->
		<input type="hidden" name=primaryKey
			value="<?php
			if (isset ( $_REQUEST ["nome"] ))
				// nome dos campos do método ler jogadores no crude
				echo $_REQUEST ["nome"] ;
			else
				// nomes dos campos desta tabela
				echo $_POST ["txtNomeEntidade"];
			?>">
			
		<!--BOTOES PARA ENVIAR-->
		<input id="botaoEnviar" type="reset" value="Limpar os dados"> <input
			id="botaoEnviar" type="submit" value="Alterar os dados">
	</form>


	<a id="botao" href="./entidadeConsulta.php">Consultar Entidades</a>
	<footer class="footer">
		<img class="footer" src="../utilitarios/figuras/rodape.png"
			alt="rodape">
	</footer>
	<!-- em estilo. é class e # é id -->
</body>
</html>