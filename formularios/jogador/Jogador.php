<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
<Title>Cadastro de Jogador</Title>

<link rel="stylesheet"
	href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>

<style>

</style>


</head>
<?php
$erro = null;
$valido = false;
// isset retorna false se o valor for null ou se a variavel não existir
if (isset ( $_REQUEST ["validar"] ) && $_REQUEST ["validar"] == true) {
	
	include ('./FileJogCrud.php');
	
	$Robinho = new JogadorCrude ();
	$posicao = $_POST ["posicao"];
	$nome = $_POST ["txtNomeJogador"];
	$date = $_POST ["dataNascimento"];
	$numero = $_POST ["numeroCamisa"];
	$NomeEquipe = $_POST ["nomeEquipe"];
	$Robinho->inserirBanco ( $posicao, $nome, $date, $numero, $NomeEquipe );
} else {
	if (isset ( $erro )) {
	}
}
?>
<body>


	<h1>
		<pre>     Cadastro de Jogadores</pre>
	</h1>
	<form name="tabelaJogador" method="post" action="?validar=true">
		<!-- Campo Nome -->
		<div class="retiraQuebraDeLinha">
			<label>Nome:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="txtNomeJogador"
				placeholder="Digite aqui o seu nome..."><br>
		</div>
		<!-- Campo Data Nascimento -->
		<label>Digite sua data de nascimento:</label> 
		<input type="text" id="calendario" placeholder="Selecione a data ao lado" name="dataNascimento"><br>
		
<!-- Script do calendario abaixo -->
		<script>
$(function() {
	
	//Apresenta o calendario
    $( "#calendario" ).datepicker({
        
    	//Apresenta o icone do calendario
        showOn: "button",
        buttonImage: "calendario.png",
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


		<!-- Campo Posicao: -->
		<label><?php echo(utf8_encode('Posição:'))?></label>
		<!--  -->
		<select name="posicao">

			<!-- Opção 1: -->
			<option
				<?php
				if (isset ( $_POST ["posicao"] ) && $_POST ["posicao"] == "Atacante") {
					echo "selected";
				}
				?>>Atacante</option>

			<!-- Opção 2: -->
			<option
				<?php
				if (isset ( $_POST ["posicao"] ) && $_POST ["posicao"] == "Zagueiro(a)") {
					echo "selected";
				}
				?>>Zagueiro(a)</option>

			<!-- Opção 3: -->
			<option
				<?php
				if (isset ( $_POST ['posicao'] ) && $_POST ['posicao'] == "Goleiro(a)") {
					echo "selected";
				}
				?>>Goleiro(a)</option>


		</select> <br> <label><?php echo(utf8_encode('Número da camisa'))?></label>
		<input type="number" name="numeroCamisa"><br>

		<!-- Campo Nome da Equipe -->
		<div id="retiraQuebraDeLinha">
			<label>Nome da equipe:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="nomeEquipe"
				placeholder="Digite o nome da equipe..."><br>
		</div>
		<br>

		<!--BOTOES PARA ENVIAR-->
		<input type="reset" value="Limpar os dados"> <input type="submit"
			value="Enviar os dados">
	</form>


<a href="./jogadorConsulta.php">Consultar Jogadores</a>
</body>
</html>

<!-- Cada bloco de php é um arquivo, logo ele deve ser acessado 
através do include ou através de um objeto (somente nos casos em que o arquivo a ser acessado está contido 
no mesmo arquivo onde se declara o objeto). Desta forma, exceto no ultimo caso todos devem vir com a instrução include-->