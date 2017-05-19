<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
<Title>Cadastro de Comiss�o Tecnica</Title>

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
		// isset retorna false se o valor for null ou se a variavel n�o existir
		if (isset ( $_REQUEST ["validar"] ) && $_REQUEST ["validar"] == true) {
						include ("./ComissaoTecnicaCRUD.php");
			$objAuxiliar = new ComissaoTecnicaCRUDClasse();
			$nomeEquipe = $_POST ["txtNomeEquipe"];
			$nomeTecnico= $_POST ["txtNomeTecnico"];
			$nomeAuxiliar = $_POST["txtNomeAuxiliar"];
			$objAuxiliar->inserirBanco ( $nomeEquipe, $nomeTecnico,$nomeAuxiliar );
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

		<li><a href="#">Comiss�o Tecnica</a></li>
		<li><a href="./ComissaoTecnicaConsulta.php">Consultar a Comiss�o T�cnica</a></li>
	  		<li><a href="./ComissaoTecnicaUpdate.php">Editar dados da Comiss�o T�cnica</a>
			</li>
		<li><a href="../homeFormularios.php">Olhar outra tabela</a></li>
</ul>
</nav>
	</header>

	<div id="tituloForm">Cadastro de Comiss�o T�cnica</div>
	<form id="formularioInteiro" name="tabelaComissaoTecnica" method="post"
		action="?validar=true">
		<!-- Campo NomeEquipe -->
		<div class="retiraQuebraDeLinha">
			<label>Nome da Equipe:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required" name="txtNomeEquipe"
				placeholder="Digite aqui a equipe..."><br>
				<br>
		</div>
		<!-- Campo NomeTecnico -->
			<div class="retiraQuebraDeLinha">
			<label>Nome do Tecnico:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required" name="txtNomeTecnico"
				placeholder="Digite o nome do tecnico.."><br>
				<br>
		</div>
		
		</div>
		<!-- Campo NomeAuxiliar -->
			<div class="retiraQuebraDeLinha">
			<label>Nome do Auxiliar:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required" name="txtNomeAuxiliar"
				placeholder="Digite o nome do auxiliar.."><br>
				<br>
		</div>		


<br>	

		<!--BOTOES PARA ENVIAR-->
		<input id="botaoEnviar" type="reset" value="Limpar os dados"> <input id="botaoEnviar" type="submit"
			value="Enviar os dados">
	</form>

	<br>
	<a id="botao" href="./ComissaoTecnicaConsulta.php">Consultar Comiss�es T�cnicas</a>
			<footer class="footer">
			<img class="footer" src="../utilitarios/figuras/rodape.png" alt="rodape">
	</footer><!-- em estilo. � class e # � id -->
</body>
</html>

<!-- Cada bloco de php � um arquivo, logo ele deve ser acessado 
atrav�s do include ou atrav�s de um objeto (somente nos casos em que o arquivo a ser acessado est� contido 
no mesmo arquivo onde se declara o objeto). Desta forma, exceto no ultimo caso todos devem vir com a instru��o include-->