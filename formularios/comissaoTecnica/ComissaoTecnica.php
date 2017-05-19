<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
<Title>Cadastro de Comissão Tecnica</Title>

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
		<!-- cabeçalho -->
			<!-- O primeiro ponto é a pasta onde vc esta e o segundo é o numero maximo de pontos que é uma pasta acima -->
			<img src="../utilitarios/figuras/Topo.png" alt="topoHome">
			
			<nav>
  <ul class="menu">
  				<!-- ../ retorna uma pasta anterior-->

		<li><a href="#">Comissão Tecnica</a></li>
		<li><a href="./ComissaoTecnicaConsulta.php">Consultar a Comissão Técnica</a></li>
	  		<li><a href="./ComissaoTecnicaUpdate.php">Editar dados da Comissão Técnica</a>
			</li>
		<li><a href="../homeFormularios.php">Olhar outra tabela</a></li>
</ul>
</nav>
	</header>

	<div id="tituloForm">Cadastro de Comissão Técnica</div>
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
	<a id="botao" href="./ComissaoTecnicaConsulta.php">Consultar Comissões Técnicas</a>
			<footer class="footer">
			<img class="footer" src="../utilitarios/figuras/rodape.png" alt="rodape">
	</footer><!-- em estilo. é class e # é id -->
</body>
</html>

<!-- Cada bloco de php é um arquivo, logo ele deve ser acessado 
através do include ou através de um objeto (somente nos casos em que o arquivo a ser acessado está contido 
no mesmo arquivo onde se declara o objeto). Desta forma, exceto no ultimo caso todos devem vir com a instrução include-->