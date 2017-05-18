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
.wrapper {
	max-width: 1000px;
	width: 100%;
		margin-top: 0px;
	margin-left: 100px;
}
#formulario {
	left: 50px;
	top: 60px;

	width: 1000px;
	height: 600px;
	/*text-align: center;*/
	text-align: justify;
	
}
.footer {
	position: absolute top:50%;
	left: 25%;
	/*width: 1000px; /*Largura da imagem, n�o altere se n�o souber
                height:180px; Altura da imagem, n�o altere se n�o souber**/
	margin-top: 40px;
	margin-left: 20px;
}
#botao {
	width: 10px;
	height: 600px;
	text-align:center;
	background: #4f4f4f;
	font: 27px arial, verdana, helvetica, sans-serif;
	color: #ff9900; /*cor da letra*/
	margin-left: 300px;
	margin-top: 0px;
	width:700px;
}
/*----------------------------------------------COPIADO------------------------*/
#formularioInteiro {
padding:3px;
	margin-left: 115px;
	margin-top: 0px;
	width:700px;
	background: #4f4f4f;
	/* cor escura para o fundo do formul�rio */
	font: 20px arial, verdana, helvetica, sans-serif;
	/* o tamanho e o tipo da fonte no formul�rio */
	border-top: 8px solid #cfcfcf;
	/* borda superior de 8px solida na cor cinza clara 
no formul�rio */
	border-left: 8px solid #cfcfcf;
	/* a borda esquerda do formul�rio */
	border-right: 8px solid #696969;
	/* a borda direita do formul�rio */
	border-bottom: 8px solid #696969; * a borda inferior do formul�rio */
	border-collapse : collapse;
	/* retira as bordas duplas nas c�lulas da tabela */
	color: #ff9900; /* a cor laranja para as letras */
}

#tituloForm {
	width:715px;
	margin-left: 115px;
	margin-top: 50px;
	background: #000000;
	/* a cor preta para o fundo do t�tulo */
	padding: 3px;
	/* um afastamento de 3px */
	font: bold 30px arial, verdana, helvetica, sans-serif;
	/* letras em negrito com 15px e familia arial, verd....*/
	border-bottom: 1px solid #ff9900;
	/* uma borda inferior solida de 1px na cor laranja */
	color: #ff9900;
	text-align: center;
}
 #botaoEnviar {
 	margin-left: 150px;
	margin-top: 0px;
background:#000000; 
/* a cor do fundo do bot�o */

color:#ffffff; /* a cor das letras Enviar */
border:2px solid #ffffff;
/* uma borda de 2px solida branca no bot�o*/
}  
#inputs{
font: 15px arial, verdana, helvetica, sans-serif;
size:100px;
width: 500px;
height: 23px;
}
/*---------------------CSSS DA NAVEGA��O ------------------ */
	*{margin: 0; padding: 0;}

body{
font-family: arial, helvetica, sans-serif;
font-size: 12px;
}

.menu{
list-style:none; 
border:1px solid #c0c0c0; 
float:left; 
}
.menu li{
position:relative; 
float:left; 
border-right:1px solid #c0c0c0;
}
.menu li a{color:#333; text-decoration:none; padding:5px 10px; display:block;}

.menu li a:hover{
background:#333; 
color:#fff; 
-moz-box-shadow:0 3px 10px 0 #CCC; 
-webkit-box-shadow:0 3px 10px 0 #ccc; 
text-shadow:0px 0px 5px #fff; 
}
.menu li  ul{
position:absolute; 
top:25px; 
left:0;
background-color:#fff; 
display:none;
}	
.menu li:hover ul, .menu li.over ul{display:block;}
.menu li ul li{
border:1px solid #c0c0c0; 
display:block; 
width:150px;
}
</style>


</head>
<?php
$erro = null;
$valido = false;
// isset retorna false se o valor for null ou se a variavel n�o existir
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
<body class="wraper">
	<header>
		<!-- cabe�alho -->
			<!-- O primeiro ponto � a pasta onde vc esta e o segundo � o numero maximo de pontos que � uma pasta acima -->
			<img src="../utilitarios/figuras/Topo.png" alt="topoHome">
			
			<nav>
  <ul class="menu">
  				<!-- ../ retorna uma pasta anterior-->

		<li><a href="../default.php">Home</a></li>
		<li><a href="formularios/homeFormularios.html">Formularios</a></li>
	  		<li><a href="../auxiliar/AuxiliarCad.php">Auxiliar</a>
	         	<ul>
	                  <li><a href="#">Web Design</a></li>
	                  <li><a href="#">SEO</a></li>
	                  <li><a href="#">Design</a></li>                    
	       		</ul>
			</li>
		<li><a href="#">Jogador</a></li>
		<li><a href="./equipe/Equipe.php">Equipe</a></li>                 
</ul>
</nav>
	</header>

	<div id="tituloForm">Cadastro de Jogadores</div>
	<form id="formularioInteiro" name="tabelaJogador" method="post"
		action="?validar=true">
		<!-- Campo Nome -->
		<div class="retiraQuebraDeLinha">
			<label>Nome:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required" name="txtNomeJogador"
				placeholder="Digite aqui o seu nome..."><br>
				<br>
		</div>
		<!-- Campo Data Nascimento -->
		<label>Digite sua data de nascimento:</label> <input type="text"
			id="calendario" placeholder="Selecione a data ao lado"
			name="dataNascimento"><br>

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
       dayNames: ['Domingo','Segunda','Ter�a','Quarta','Quinta','Sexta','S�bado','Domingo'],
       dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
       dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','S�b','Dom'],
       monthNames: ['Janeiro','Fevereiro','Mar�o','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
       monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
       
       //Apresenta os 31 dias do mes mais alguns dias do proximo m�s
       showOtherMonths: true,
       selectOtherMonths: true
    });    
});
</script>

<br>
		<!-- Campo Posicao: -->
		<label><?php echo(utf8_encode('Posi��o:'))?></label>
		<!--  -->
		<select id="inputs" name="posicao">

			<!-- Op��o 1: -->
			<option
				<?php
				if (isset ( $_POST ["posicao"] ) && $_POST ["posicao"] == "Atacante") {
					echo "selected";
				}
				?>>Atacante</option>

			<!-- Op��o 2: -->
			<option
				<?php
				if (isset ( $_POST ["posicao"] ) && $_POST ["posicao"] == "Zagueiro(a)") {
					echo "selected";
				}
				?>>Zagueiro(a)</option>

			<!-- Op��o 3: -->
			<option
				<?php
				if (isset ( $_POST ['posicao'] ) && $_POST ['posicao'] == "Goleiro(a)") {
					echo "selected";
				}
				?>>Goleiro(a)</option>

		</select> 
		<br>
		
		<br> <label><?php echo(utf8_encode('N�mero da camisa'))?></label>
		<input id="inputs" type="number" name="numeroCamisa"><br>
<br>
		<!-- Campo Nome da Equipe -->
		<div id="retiraQuebraDeLinha">
			<label>Nome da equipe:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required" name="nomeEquipe"
				placeholder="Digite o nome da equipe..."><br>
		</div>
		<br>

		<!--BOTOES PARA ENVIAR-->
		<input id="botaoEnviar" type="reset" value="Limpar os dados"> <input id="botaoEnviar" type="submit"
			value="Enviar os dados">
	</form>

	<br>
	<a id="botao" href="./jogadorConsulta.php">Consultar Jogadores</a>
			<footer class="footer">
			<img class="footer" src="../utilitarios/figuras/rodape.png" alt="rodape">
	</footer><!-- em estilo. � class e # � id -->
</body>
</html>

<!-- Cada bloco de php � um arquivo, logo ele deve ser acessado 
atrav�s do include ou atrav�s de um objeto (somente nos casos em que o arquivo a ser acessado est� contido 
no mesmo arquivo onde se declara o objeto). Desta forma, exceto no ultimo caso todos devem vir com a instru��o include-->