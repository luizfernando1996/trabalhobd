<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
<Title>Consultar todos as Comissoes Técnicas</Title>

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
		<li><a href="#">Consultar a Comissao Tecnica</a></li>
	  		<li><a href="./ComissaoTecnicaUpdate.php">Editar dados da Comissao Tecnica</a>
			</li>
		<li><a href="../homeFormularios.php">Olhar outra tabela</a></li>             
</ul>
</nav>
	</header>
	<table id="formularioInteiro3" border=1>
		<!-- Tr é a tag para linha no html -->
		<tr>		
			<th>Nome da Equipe</th>
			<th>Nome do Tecnico</th>
			<th>Nome do Auxiliar</th>
			<th>Deletar</th>			
			<th>Editar</th>		
		</tr>
<?php
include ('./ComissaoTecnicaCRUD.php');
$ler = new ComissaoTecnicaCRUDClasse();

if (isset ( $_REQUEST ["excluir"] ) && $_REQUEST ["excluir"] == true){
	$primaryKey=array($_REQUEST["nomeEquipe"]);
	$ler->deletarComissaoTecnica($primaryKey);
}
$ler->lerComissaoTecnica();
?>
</table>
<footer class="footer">
			<img class="footer" src="../utilitarios/figuras/rodape.png" alt="rodape">
	</footer><!-- em estilo. é class e # é id -->
</body>
</html>