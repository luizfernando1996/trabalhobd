<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Jogadores</title>

</head>

<body>
	<table border=1>
		<!-- Tr é a tag para linha no html -->
		<tr>
			<th>Nome</th>
			<!-- Th define o titulo da coluna -->
			<th>Data de Nascimento</th>
			<th><?php echo utf8_encode("Posição");?></th>
			<th>Numero da camisa</th>
			<th>Nome da equipe</th>
			<th>Deletar</th>			
			<th>Editar</th>
		
		</tr>
<?php
include ('./FileJogCrud.php');
$ler = new JogadorCrude ();

if (isset ( $_REQUEST ["excluir"] ) && $_REQUEST ["excluir"] == true){
	$primaryKey=array($_REQUEST["posicao"],$_REQUEST["nome"],$_REQUEST["datanasc"]);
	$ler->deletarJogador($primaryKey);
}
$ler->lerJogadores ();
?>
</table>
</body>




</html>
