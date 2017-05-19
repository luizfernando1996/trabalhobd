
<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
<Title>Atualização de dados do Auxiliar</Title>

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
		
		<li><a href="./ComissaoTecnica.php">Comissao Tecnica</a></li>
		<li><a href="./ComissaoTecnicaConsulta.php">Consultar a Comissao Tecnica</a></li>
		<li><a href="#">Editar dados da Comissao Tecnica</a>
		</li>
		<li><a href="../homeFormularios.php">Olhar outra tabela</a></li>
		</ul>
		</nav>
		</header>
		<?php
		$erro = null;
		$valido = false;
		include ('./ComissaoTecnicaCRUD.php');
		$objAux = new ComissaoTecnicaCRUDClasse();
		
		// resposável por editar os dados carregados do else
		if (isset ( $_POST ["primaryKey"] )) {// isset retorna false se o valor for null ou se a variavel não existir
			$primaryKey = $_POST ["primaryKey"];
			$campos = array (
					$_POST ["txtNomeEquipe"],
					$_POST ["txtNomeTecnico"],
					$_POST ["txtNomeAuxiliar"]
			);
			
			$objAux->alterarDadosAuxiliar ( $primaryKey, $campos );
		} // responsavel por receber todos os dados quando a pagina é carregada e apresentar ao usuario
		else {
			$primaryKey = array (
					
					$_REQUEST ["nomeEquipe"]
					
			);
			// Os campos do formulario ficam preenchidos com o valor
			// após o método consultar jogador ser executado através do metodo post do php
			$objAux->consultarAuxiliar ( $primaryKey );
		}
		?>
<body>

	<!-- estrutura fundamental por passar a primary key para o if-->


	<h1 id="tituloDoForm">
		Editar dados de Comissao Tecnica
	</h1>
	<form id="formularioInter" name="tabelaComissaoTecnica" method="post" action="?validar=true">
		<!-- Campo Nome da Equipe -->
		<div class="retiraQuebraDeLinha">
			<label>Nome da Equipe:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="txtNomeEquipe"
				placeholder="Digite aqui o nome da equipe..."
				<?php if(isset($_POST ["txtNomeEquipe"])){echo "value='".$_POST ["txtNomeEquipe"]."'";}?>><br>
		</div>



		
		<!-- Campo Nome do Tecnico -->
		<div id="retiraQuebraDeLinha">
			<label>Nome do Tecnico:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="txtNomeTecnico"
				placeholder="Digite o nome do tecnico..."
				<?php if(isset($_POST ["txtNomeTecnico"])){echo "value='".$_POST ["txtNomeTecnico"]."'";}?>><br>
		</div>
		<br>
		
		
		
			<!-- Campo Nome do Auxiliar -->
		<div id="retiraQuebraDeLinha">
			<label>Nome do Auxiliar:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="txtNomeAuxiliar"
				placeholder="Digite o nome do auxiliar..."
				<?php if(isset($_POST ["txtNomeAuxiliar"])){echo "value='".$_POST ["txtNomeAuxiliar"]."'";}?>><br>
		</div>
		<br>

		<!--BOTOES PARA ENVIAR-->
		<input id="botaoEnviar" type="reset" value="Limpar os dados"> <input  id="botaoEnviar" type="submit"
			value="Alterar os dados"> 
			
			<!-- Botão invisivel responsavél por capturar as primaryKey e assim promover a edição dos dados -->
			<input type="hidden" name=primaryKey
			value="<?php
			if (isset ( $_REQUEST ["nomeEquipe"] ))
				//nome dos campos do método ler jogadores no crude	
				echo $_REQUEST ["nomeEquipe"];
			else 
				//nomes dos campos desta tabela
				echo $_POST ["txtNomeEquipe"];
			?>">
	</form>


	<a id="botao" href="./ComissaoTecnicaConsulta.php">Consultar Comissoes Tecnicas</a>
	
	<footer class="footer">
			<img class="footer" src="../utilitarios/figuras/rodape.png" alt="rodape">
	</footer><!-- em estilo. é class e # é id -->
</body>
</html>