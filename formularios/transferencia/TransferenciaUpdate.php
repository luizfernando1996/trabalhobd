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

		<li><a href="./TransferenciaCadastrar">Cadastrar Transferencia</a></li>
		<li><a href="./TransferenciaConsulta.php">Consultar Transferencia</a></li>
	  		<li><a href="#">Alterar dados da transferencia</a>
			</li>
		<li><a href="../homeFormularios.php">Olhar outra tabela</a></li>
</ul>
</nav>
	</header>

<?php
$erro = null;
$valido = false;
include ('./FileJogCrud.php');
$Robinho = new JogadorCrude ();

// resposável por editar os dados carregados do else
if (isset ( $_POST ["primaryKey"] )) { // isset retorna false se o valor for null ou se a variavel não existir
	$primaryKey = explode ( "*", $_POST ["primaryKey"] );
	
	$campos = array (
			$_POST ["posicao"],
			$_POST ["txtNomeJogador"],
			$_POST ["dataNascimento"],
			$_POST ["numeroCamisa"],
			$_POST ["nomeEquipe"] 
	);
	
	$Robinho->alterarDadosJogador ( $primaryKey, $campos );
} // responsavel por receber todos os dados quando a pagina é carregada e apresentar ao usuario
else {
	$primaryKey = array (
			$_REQUEST ["camisa"],
			$_REQUEST ["nomeEquipe"] 
	);
	// Os campos do formulario ficam preenchidos com o valor
	// após o método consultar jogador ser executado através do metodo post do php
	$Robinho->consultarJogador ( $primaryKey );
}
?>



<body>

	<!-- estrutura fundamental por passar a primary key para o if-->


	<h1 id="tiloDoForm">
		<pre>     Editar dados das Transferencias</pre>
	</h1>
	<form id="formularioInter" name="tabelaJogador" method="post"
		action="?validar=true">
		
		<!-- Campo Numero da Camisa -->
		 <label><?php echo(utf8_encode('Número da camisa'))?></label>
		<input type="number" name="numeroCamisa"
			<?php if(isset($_POST ["numeroCamisa"])){echo "value='".$_POST ["numeroCamisa"]."'";}?>><br>
		
		<div class="retiraQuebraDeLinha">
			<label>Nome da Equipe:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="NomeEquipeAntiga"
				placeholder="Digite aqui o nome da equipe..."
				<?php if(isset($_POST ["NomeEquipeAntiga"])){echo "value='".$_POST ["NomeEquipeAntiga"]."'";}?>><br>
		</div>
		
				<div class="retiraQuebraDeLinha">
			<label>Nome da Equipe Futura:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="nomeEquipeFutura"
				placeholder="Digite aqui o nome da equipe futura..."
				<?php if(isset($_POST ["nomeEquipeFutura"])){echo "value='".$_POST ["nomeEquipeFutura"]."'";}?>><br>
		</div>
		<br>

		<!--BOTOES PARA ENVIAR-->
		<input id="botaoEnviar" type="reset" value="Limpar os dados"> <input
			id="botaoEnviar" type="submit" value="Alterar os dados">

		<!-- Botão invisivel responsavél por capturar as primaryKey e assim promover a edição dos dados -->
		<input type="hidden" name=primaryKey
			value="<?php
			if (isset ( $_REQUEST ["ID"] ))
				// nome dos campos do método ler jogadores no crude
				echo $_REQUEST ["ID"];
			else
				// nomes dos campos desta tabela
				echo $_POST ["numeroCamisa"] . "*" . $_POST ["nomeEquipe"] ;
			?>">
	</form>


	<a id="botao" href="./jogadorConsulta.php">Consultar Jogadores</a>
	<footer class="footer">
		<img class="footer" src="../utilitarios/figuras/rodape.png"
			alt="rodape">
	</footer>
	<!-- em estilo. é class e # é id -->
</body>
</html>