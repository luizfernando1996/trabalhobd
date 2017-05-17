<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
<Title>Cadastro de Auxiliar</Title>
<link rel="stylesheet"
	href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
<style>
.retiraQuebraDeLinha {
	white-space: nowrap;
}
</style>


</head>
<?php
$erro = null;
$valido = false;
// isset retorna false se o valor for null ou se a variavel não existir
if (isset ( $_REQUEST ["validar"] ) && $_REQUEST ["validar"] == true) {
	
	$MYSQL_HOST = 'mysql.hostinger.com.br';
	$MYSQL_USER = 'u114118567_banco';
	$MYSQL_PASSWORD = 'banco321';
	$MYSQL_DB_NAME = 'u114118567_banc2';
	
	$valido = true;
	try {
		$connection = new PDO ( 'mysql:host=' . $MYSQL_HOST . ';dbname=' . $MYSQL_DB_NAME, $MYSQL_USER, $MYSQL_PASSWORD );
		$connection->exec ( "set names utf8" );
	} catch ( PDOException $e ) {
		echo utf8_encode ( "Falha: " . $e->getMessage () );
		exit ();
	}
	
	$sql = "INSERT INTO jogador
                (Posicao, Nome, DataNasc, Camisa, NomeEquipe)
                VALUES (?, ?, ?, ?,?)";
	
	$stmt = $connection->prepare ( $sql );
	
	$stmt->bindParam ( 1, $_POST ["posicao"] );
	$stmt->bindParam ( 2, $_POST ["txtNomeJogador"] );
	$stmt->bindParam ( 3, $_POST ["dataNascimento"] );
	$stmt->bindParam ( 4, $_POST ["numeroCamisa"] );
	$stmt->bindParam ( 5, $_POST ["nomeEquipe"] );
	
	$stmt->execute ();
	
	if ($stmt->errorCode () != "00000") {
		$valido = false;
		$erro = "Erro código " . $stmt->errorCode () . ": ";
		$erro .= implode ( ", ", $stmt->errorInfo () );
	}
} else {
	if (isset ( $erro )) {
	}
}
?>
<body>



	<form name="tabelaJogador" method="post" action="?validar=true">
		<label><pre><h1>       Cadastro de Jogadores</h1></pre></label>
		<!-- Campo Nome -->
		<div class="retiraQuebraDeLinha">
			<label>Nome:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="txtNomeJogador"
				placeholder="Digite aqui o seu nome..."><br>
		</div>
		<!-- Campo Data Nascimento -->
		<label>Digite sua data de nascimento:</label> <input type="text"
			id="calendario" name="dataNascimento"><br>

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


		</select> <br> 
		<label><?php echo(utf8_encode('Número da camisa'))?></label>
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



</body>
</html>
<!-- Cada bloco de php é um arquivo, logo ele deve ser acessado 
através do include ou através de um objeto (somente nos casos em que o arquivo a ser acessado está contido 
no mesmo arquivo onde se declara o objeto). Desta forma, exceto no ultimo caso todos devem vir com a instrução include-->