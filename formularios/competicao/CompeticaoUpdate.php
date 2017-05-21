<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
<Title>Atualização de dados de Competicao</Title>

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

		<li><a href="./Competicao.php">Competicao</a></li>
		<li><a href="./CompeticaoConsulta.php">Consultar a Competicao</a></li>
	  		<li><a href="#">Editar dados de Competicao</a>
			</li>
		<li><a href="../homeFormularios.php">Olhar outra tabela</a></li>             
</ul>
</nav>
	</header>
<?php
$erro = null;
$valido = false;
include ('./CompeticaoCRUD.php');
$objAux = new CompeticaoCRUDClasse();

// resposável por editar os dados carregados do else
if (isset ( $_POST ["primaryKey"] )) {// isset retorna false se o valor for null ou se a variavel não existir
	$primaryKey = explode ( "*", $_POST ["primaryKey"] );
	$campos = array (
			$_POST ["txtNome"],
			$_POST ["txtAbrangencia"],
			$_POST ["txtSistemaPontuacao"],
			$_POST ["txtSerie"],
			$_POST ["txtNomeEntidade"],
			$_POST ["txtQuantidadeDeJogos"],
			$_POST ["txtAno"]
	);
	
	$objAux->alterarDadosCompeticao ( $primaryKey, $campos );
	
} // responsavel por receber todos os dados quando a pagina é carregada e apresentar ao usuario
else {
	$primaryKey = array (
			$_REQUEST ["id"],
	);
	// Os campos do formulario ficam preenchidos com o valor
	// após o método consultar jogador ser executado através do metodo post do php
	$objAux->consultarCompeticao( $primaryKey );
}
?>
<body>

	<!-- estrutura fundamental por passar a primary key para o if-->


	<h1 id="tituloDoForm">
		<?php echo utf8_encode("<br>Editar dados de Competições")?>
	</h1>
	<form id="formularioInter" name="tabelaCompeticao" method="post" action="?validar=true">
	
	
		<!-- Campo Nome -->
		<div class="retiraQuebraDeLinha">
			<label>Nome:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="txtNome"
				placeholder="Digite aqui o nome..."
				<?php if(isset($_POST ["txtNome"])){echo "value='".$_POST ["txtNome"]."'";}?>><br>
		</div>



		
		<!-- Campo Abrangencia-->
		<div id="retiraQuebraDeLinha">
			<label>Abrangencia:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="txtAbrangencia"
				placeholder="Digite a abrangencia..."
				<?php if(isset($_POST ["txtAbrangencia"])){echo "value='".$_POST ["txtAbrangencia"]."'";}?>><br>
		</div>
		<br>
		
		
		<!-- Campo Sistema de Pontuacao-->
		<div id="retiraQuebraDeLinha">
			<label>Sistema de Pontuacao:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="txtSistemaPontuacao"
				placeholder="Digite o sistema de pontuacao..."
				<?php if(isset($_POST ["txtSistemaPontuacao"])){echo "value='".$_POST ["txtSistemaPontuacao"]."'";}?>><br>
		</div>
		<br>
		
		
		<!-- Campo Serie-->
		<div id="retiraQuebraDeLinha">
			<label>Serie :</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="txtSerie"
				placeholder="Digite a serie..."
				<?php if(isset($_POST ["txtSerie"])){echo "value='".$_POST ["txtSerie"]."'";}?>><br>
		</div>
		<br>
		
		
		<!-- Campo Nome Entidade-->
		<div id="retiraQuebraDeLinha">
			<label>Nome Entidade:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="txtNomeEntidade"
				placeholder="entidade regulamentadora..."
				<?php if(isset($_POST ["txtNomeEntidade"])){echo "value='".$_POST ["txtNomeEntidade"]."'";}?>><br>
		</div>
		<br>
		
		
		<!-- Campo Quantidade de Jogos-->
		<div id="retiraQuebraDeLinha">
			<label>Quantidade de jogos:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="txtQuantidadeDeJogos"
				placeholder="Digite a qtde de jogos..."
				<?php if(isset($_POST ["txtQuantidadeDeJogos"])){echo "value='".$_POST ["txtQuantidadeDeJogos"]."'";}?>><br>
		</div>
		<br>
		
		
		<!-- Campo Ano-->
		<div id="retiraQuebraDeLinha">
			<label>Ano:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="txtAno"
				placeholder="Digite o ano..."
				<?php if(isset($_POST ["txtAno"])){echo "value='".$_POST ["txtAno"]."'";}?>><br>
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


	<a id="botao" href="./CompeticaoConsulta.php">Consultar Competicoes</a>
	
	<footer class="footer">
			<img class="footer" src="../utilitarios/figuras/rodape.png" alt="rodape">
	</footer><!-- em estilo. é class e # é id -->
</body>
</html>
