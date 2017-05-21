<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
<Title>Cadastro de Partidas:</Title>


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
	
	include ("./PartidaCRUD.php");	
	$objAux = new PartidaCRUDClasse();
	$idEquipeArbitragem = $_POST ["txtIDEquipeArbitragem"];
	$nomeEntidade= $_POST ["txtNomeEntidade"];
	$data= $_POST ["txtData"];
	$hora= $_POST ["txtHora"];
	$resultadoFinal= $_POST ["txtResultadoFinal"];
	$equipeVencedora= $_POST ["txtEquipeVencedora"];
	if($_POST ["txtDisputaDePenaltis"]=="Sim")
		$_POST ["txtDisputaDePenaltis"]=1;
	else 
		$_POST ["txtDisputaDePenaltis"]=0;
	$disputaDePenaltis= $_POST ["txtDisputaDePenaltis"];
	if($_POST ["txtGolQualificado"]=="Sim")
		$_POST ["txtGolQualificado"]=1;
	else 
		$_POST ["txtGolQualificado"]=0;
	
	$golQualificado= $_POST ["txtGolQualificado"];
	$idCompeticao= $_POST ["txtIdCompeticao"];
	$nomeEquipeMandante= $_POST ["txtNomeEquipeMandante"];
	$nomeEstadio= $_POST ["txtNomeEstadio"];
	$nomeEquipeVisitante = $_POST ["txtNomeEquipeVisitante"];
	
	$objAux->inserirBanco ( $idEquipeArbitragem, $nomeEntidade, $data, $hora, $resultadoFinal,	$equipeVencedora, $disputaDePenaltis, $golQualificado,$idCompeticao,$nomeEquipeMandante, $nomeEstadio, $nomeEquipeVisitante);
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
	
		<li><a href="#">Partida</a></li>
		<li><a href="./PartidaConsulta.php">Consultar a Partida</a></li>
	  		<li><a href="./PartidaUpdate.php">Editar dados da Partida</a>
			</li>
		<li><a href="../homeFormularios.php">Olhar outra tabela</a></li>
</ul>
</nav>
	</header>

	<div id="tituloForm">Cadastro de Partidas</div>
	<form id="formularioInteiro" name="tabelaPartida" method="post"
		action="?validar=true">
		
		
		
		<!-- Campo IDEquipeDeArbitragem -->
		<div class="retiraQuebraDeLinha">
			<label>ID Equipe de Arbitragem:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required" name="txtIDEquipeArbitragem"
				placeholder="Digite o id da equipe de arbitragem..."><br>
				<br>
		</div>
		<!-- Campo Nome Entidade -->
			<div class="retiraQuebraDeLinha">
			<label>Nome Entidade:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required" name="txtNomeEntidade"
				placeholder="Digite o nome da entidade.."><br>
				<br>
		</div>	
		
		<!-- Campo Data-->
		<label>Digite a data da partida:</label> <input type="text"
			id="calendario" placeholder="Selecione a data ao lado"
			name="txtData"><br>

		<!-- Script do calendario abaixo -->
		<script>
$(function() {
	
	//Apresenta o calendario
    $("#calendario" ).datepicker({
        
    	//Apresenta o icone do calendario
        showOn: "button",
        buttonImage: "../utilitarios/mes/calendar.png",
        buttonImageOnly: true,
        showButtonPanel:true,
        
        //Permite que o usuario selecione o mes e o ano
        changeMonth: true,
        changeYear: true,
        
        //Formata a data
        dateFormat: 'yy-mm-dd',
        
       //Traduzindo o calendario
       dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
       dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
       dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
       monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
       monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
       
       //Apresenta os 31 dias do mes mais alguns dias do proximo més
       showOtherMonths: true,
       selectOtherMonths: true
    });    
});
</script>
<br>
		
	<!-- Campo Hora -->
			<div class="retiraQuebraDeLinha">
			<label>Hora:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="time" required="required" name="txtHora"
				placeholder="Digite a hora da partida.."><br>
				<br>
		</div>
		<br>
		
		<!-- Campo Resultado Final -->
			<div class="retiraQuebraDeLinha">
			<label>Resultado Final:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required" name="txtResultadoFinal"
				placeholder="Mandante x Visitante.."><br>
				<br>
		</div>
		
		<!-- Campo Equipe Vencedora -->
			<div class="retiraQuebraDeLinha">
			<label>Equipe Vencedora:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required" name="txtEquipeVencedora"
				placeholder="Digite o nome da equipe vencedora.."><br>
				<br>
		</div>
		
		
		
		<!-- Campo Dispulta de Penaltis: -->
		<label><?php echo(utf8_encode('Disputa de Penaltis:'))?></label>
		<!--  -->
		<select id="inputs" name="txtDisputaDePenaltis">

			<!-- Opção 1: -->
			<option
				<?php
				if (isset ( $_POST ["txtDisputaDePenaltis"] ) && $_POST ["txtDisputaDePenaltis"] == "Sim") {
					echo "selected";
				}
				?>>Sim</option>

			<!-- Opção 2: -->
			<option
				<?php
				if (isset ( $_POST ["txtDisputaDePenaltis"] ) && $_POST ["txtDisputaDePenaltis"] == utf8_encode("Não") ){
					echo "selected";
				}
				?>><?php echo utf8_encode("Não")?></option>		
				
		</select> 
		<br>
		<br>
		
		<!-- Campo Gol Qualificado: -->
		
		<label><?php echo(utf8_encode('Gol Qualificado:'))?></label>
		<!-- Opção 1 -->
		<select id="inputs" name="txtGolQualificado">

			<!-- Opção 1: -->
			<option
				<?php
				if (isset ( $_POST ["txtGolQualificado"] ) && $_POST ["txtGolQualificado"] == "Sim") {
					echo "selected";
				}
				?>>Sim</option>

			<!-- Opção 2: -->
			<option
				<?php
				if (isset ( $_POST ["txtGolQualificado"] ) && $_POST ["txtGolQualificado"] == utf8_encode("Não") ){
					echo "selected";
				}
				?>><?php echo utf8_encode("Não")?></option>			
				
		</select> 
		<br>
		<br>
		
		<!-- Campo ID da Competição -->
		<br>
			<div class="retiraQuebraDeLinha">
			<label><?php echo utf8_encode(" ID Competição:")?>:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required" name="txtIdCompeticao"
				placeholder="Digite o id da competicao.."><br>
				<br>
		</div>
		
		<!-- Campo Equipe Mandante -->
			<div class="retiraQuebraDeLinha">
			<label>Equipe Mandante:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required" name="txtNomeEquipeMandante"
				placeholder="Digite o nome da equipe mandante.."><br>
				<br>
		</div>
		
		<!-- Campo Equipe Visitante -->
			<div class="retiraQuebraDeLinha">
			<label>Equipe Visitante:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required" name="txtNomeEquipeVisitante"
				placeholder="Digite o nome da equipe visitante.."><br>
				<br>
		</div>		
		
		
		
		<!-- Campo Estadio -->
			<div class="retiraQuebraDeLinha">
			<label>Estadio:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required" name="txtNomeEstadio"
				placeholder="Digite o nome do estadio.."><br>
				<br>
		</div>
		
		
		
		
		
<br>	

		<!--BOTOES PARA ENVIAR-->
		<input id="botaoEnviar" type="reset" value="Limpar os dados"> <input id="botaoEnviar" type="submit"
			value="Enviar os dados">
	</form>

	<br>
	<a id="botao" href="./PartidaConsulta.php">Consultar Partidas</a>
			<footer class="footer">
			<img class="footer" src="../utilitarios/figuras/rodape.png" alt="rodape">
	</footer><!-- em estilo. é class e # é id -->
</body>
</html>

<!-- Cada bloco de php é um arquivo, logo ele deve ser acessado 
através do include ou através de um objeto (somente nos casos em que o arquivo a ser acessado está contido 
no mesmo arquivo onde se declara o objeto). Desta forma, exceto no ultimo caso todos devem vir com a instrução include-->