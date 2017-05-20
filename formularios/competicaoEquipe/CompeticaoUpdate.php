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

		<li><a href="./CompeticaoEquipeCadastrar.php">Cadastrar CompeticaoEquipe</a></li>
		<li><a href="./CompeticaoConsulta.php">Consultar CompeticaoEquipe</a></li>
	  		<li><a href="#">Alterar dados da CompeticaoEquipe</a>
			</li>
		<li><a href="../homeFormularios.php">Olhar outra tabela</a></li>
</ul>
</nav>
	</header>

<?php
$erro = null;
$valido = false;
include ('./CompeticaoEquipeCrud.php');
$brasileiraoCruzeiro = new CompeticaoEquipeClasseCrude();

// resposável por editar os dados carregados do else
if (isset ( $_POST ["primaryKey"] )) { // isset retorna false se o valor for null ou se a variavel não existir
	$primaryKey = explode ( "*", $_POST ["primaryKey"] );
	
	$campos = array (
			$_POST ["txtPosicao"],
			$_POST ["nomeEquipe"],
			$_POST ["nomeCompeticao"],
			$_POST ["pontuacao"],
			$_POST ["golsFavor"] ,
			$_POST ["golsContra"] 
	);
	for($j=0;$j<6;$j++){
		echo $campos[j]+" ";
	}
	echo "<br>";
	$brasileiraoCruzeiro->alterarCompeticaoEquipe( $primaryKey, $campos );
} // responsavel por receber todos os dados quando a pagina é carregada e apresentar ao usuario
else {
	$primaryKey = array (
			$_REQUEST ["NomeEquipe"],
			$_REQUEST ["NomeDaCompeticao"] 
	);
	// Os campos do formulario ficam preenchidos com o valor
	// após o método consultar jogador ser executado através do metodo post do php
	$brasileiraoCruzeiro->consultarCompeticaoEquipe($primaryKey );
}
?>



<body>

	<!-- estrutura fundamental por passar a primary key para o if-->


	<h1 id="tiloDoForm">
		<pre>     <?php echo utf8_encode("Editar dados de Competição Equipe")?></pre>
	</h1>
	<form id="formularioInter" name="tabelaJogador" method="post"
		action="?validar=true">
		
		<!-- Campo Posicao -->
		<div class="retiraQuebraDeLinha">
			<label>Posicao:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="txtPosicao"
				placeholder=<?php echo utf8_encode("Digite aqui a posição...")?>
				<?php if(isset($_POST ["txtPosicao"])){echo "value='".$_POST ["txtPosicao"]."'";}?>><br>
		</div>

		<!-- Campo Nome da Equipe -->
		<div id="retiraQuebraDeLinha">
			<label>Nome da equipe:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="nomeEquipe"
				placeholder="Digite o nome da equipe..."
				<?php if(isset($_POST ["nomeEquipe"])){echo "value='".$_POST ["nomeEquipe"]."'";}?>><br>
				
			<label><?php echo utf8_encode("Nome da competição:")?></label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="nomeCompeticao"
				<?php if(isset($_POST ["nomeCompeticao"])){echo "value='".$_POST ["nomeCompeticao"]."'";}?>><br>
				
				
				<label><?php echo utf8_encode("Pontuação:")?></label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="pontuacao"
				<?php if(isset($_POST ["pontuacao"])){echo "value='".$_POST ["pontuacao"]."'";}?>><br>
		</div>
		
		
		<br> <label><?php echo(utf8_encode('Gols a favor'))?></label>
		<input type="number" name="golsFavor"
			<?php if(isset($_POST ["golsFavor"])){echo "value='".$_POST ["golsFavor"]."'";}?>><br>
			
		
		<br> <label><?php echo(utf8_encode('Gols contra'))?></label>
		<input type="number" name="golsContra"
			<?php if(isset($_POST ["golsContra"])){echo "value='".$_POST ["golsContra"]."'";}?>><br>
				
		<!--BOTOES PARA ENVIAR-->
		<input id="botaoEnviar" type="reset" value="Limpar os dados"> <input
			id="botaoEnviar" type="submit" value="Alterar os dados">

		<!-- Botão invisivel responsavél por capturar as primaryKey e assim promover a edição dos dados -->
		<input type="hidden" name=primaryKey
			value="<?php
			if (isset ( $_REQUEST ["camisa"] ) && isset ( $_REQUEST ["nomeEquipe"] ))
				// nome dos campos do método ler jogadores no crude
				echo $_REQUEST ["NomeEquipe"] . "*" . $_REQUEST ["NomeDaCompeticao"];
			else
				// nomes dos campos desta tabela
				echo $_POST ["nomeEquipe"] . "*" . $_POST ["nomeCompeticao"] ;
			?>">
				
	</form>


	<a id="botao" href="./CompeticaoConsulta.php">Consultar Jogadores</a>
	<footer class="footer">
		<img class="footer" src="../utilitarios/figuras/rodape.png"
			alt="rodape">
	</footer>
	<!-- em estilo. é class e # é id -->
</body>
</html>