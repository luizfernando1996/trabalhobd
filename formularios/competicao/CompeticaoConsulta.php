<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
<Title><?php echo utf8_encode("Consultar todos as Competicoes")?></Title>

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

		<li><a href="./Competicao.php">Competicao</a></li>
		<li><a href="#">Consultar a competicao</a></li>
	  		<li><a href="./CompeticaoUpdate.php">Editar dados da competicao</a>
			</li>
		<li><a href="../homeFormularios.php">Olhar outra tabela</a></li>             
</ul>
</nav>
	</header>
	<table id="formularioInteiro3" border=1>
		<!-- Tr é a tag para linha no html -->
		<tr>		
			<th>Nome</th>
			<th>Abrangencia</th>
			<th>SistemaPontuacao</th>
			<th>Serie</th>
			<th>NomeEntidade</th>
			<th>QuantidadeDeJogos</th>
			<th>Ano</th>
			<th>Deletar</th>			
			<th>Editar</th>		
		</tr>
<?php
include ('./CompeticaoCRUD.php');
$ler = new CompeticaoCRUDClasse ();

if (isset ( $_REQUEST ["excluir"] ) && $_REQUEST ["excluir"] == true){
	$primaryKey=array($_REQUEST["nome"],$_REQUEST["serie"],$_REQUEST["ano"]);
	$ler->deletarCompeticao($primaryKey);
}
$ler->lerAuxiliar();
?>
</table>
<footer class="footer">
			<img class="footer" src="../utilitarios/figuras/rodape.png" alt="rodape">
	</footer><!-- em estilo. é class e # é id -->
</body>
</html>