<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
<Title>Cadastro de Estadios</Title>

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
	
	include ('./FileEstadioCrude.php');
	
	$mineirao = new EstadioCrude();
	$NomeEstadio= $_POST ["txtNomeEstadio"];
	$capacidade= $_POST ["capacidade"];
	$cidade= $_POST ["cidade"];
	$estado= $_POST ["estado"];
	
	$mineirao->inserirBanco ( $NomeEstadio, $capacidade, $cidade, $estado);
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

		<li><a href="#">Estadio</a></li>
		<li><a href="./estadioConsulta.php">Consultar Estadios</a></li>
	  		<li><a href="./estadioUpdate.php">Alterar dados dos estadios</a>
			</li>
		<li><a href="../homeFormularios.php">Olhar outra tabela</a></li>
</ul>
</nav>
	</header>

	<div id="tituloForm">Cadastro de Estadios</div>
	<form id="formularioInteiro" name="tabelaJogador" method="post"
		action="?validar=true">
		<!-- Campo Nome -->

			<div id="retiraQuebraDeLinha">
			<label><?php echo utf8_encode("Nome do estádio:")?></label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required" name="txtNomeEstadio"
				placeholder="Digite aqui o nome..."><br>
		</div>
<br>

		<!-- Campacidade-->
		<div id="retiraQuebraDeLinha">
			<label>Capacidade:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required" name="capacidade"
				placeholder="Digite a capacidade do estadio..."><br>
		</div>
		
		<!-- Cidade-->
		<div id="retiraQuebraDeLinha">
			<label>Cidade:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required" name="cidade"
				placeholder="Digite a cidade do estadio..."><br>
		</div>
		
		<!-- Estado: -->
		<label><?php echo(utf8_encode('Estado:'))?></label>
		<!--  -->
		<select id="inputs" name="estado">

			<!-- Opção 1: -->
			<option
				<?php
				if (isset ( $_POST ["estado"] ) && $_POST ["estado"] == "Acre") {
					echo "selected";
				}
				?>>Acre</option>

			<!-- Opção 2: -->
			<option
				<?php
				if (isset ( $_POST ["estado"] ) && $_POST ["estado"] == utf8_encode("Alagoas") ){
					echo "selected";
				}
				?>><?php echo utf8_encode("Alagoas")?></option>

			<!-- Opção 3: -->
			<option
				<?php
				if (isset ( $_POST ['estado'] ) && $_POST ['estado'] == "Amapa") {
					echo "selected";
				}
				?>>Amapa</option>
				
				<!-- Opção 4: -->
			<option
				<?php
				if (isset ( $_POST ['estado'] ) && $_POST ['estado'] == "Amazonas") {
					echo "selected";
				}
				?>>Amazonas</option>
				
				<!-- Opção 5: -->
			<option
				<?php
				if (isset ( $_POST ['estado'] ) && $_POST ['estado'] == "Bahia") {
					echo "selected";
				}
				?>>Bahia</option>
				
				<!-- Opção 6: -->
			<option
				<?php
				if (isset ( $_POST ['estado'] ) && $_POST ['estado'] == "Ceara") {
					echo "selected";
				}
				?>>Ceara</option>
				
				<!-- Opção 7: -->
			<option
				<?php
				if (isset ( $_POST ['estado'] ) && $_POST ['estado'] == "Distrito Federal") {
					echo "selected";
				}
				?>>Distrito Federal</option>
				
				
				<!-- Opção 8: -->
			<option
				<?php
				if (isset ( $_POST ['estado'] ) && $_POST ['estado'] == "Espirito Santo") {
					echo "selected";
				}
				?>>Espirito Santo</option>
				
			<!-- Opção 9: -->
			<option
				<?php
				if (isset ( $_POST ["estado"] ) && $_POST ["estado"] == utf8_encode("Goiás") ){
					echo "selected";
				}
				?>><?php echo utf8_encode("Goiás")?></option>
			
				
				<!-- Opção 10: -->
			<option
				<?php
				if (isset ( $_POST ["estado"] ) && $_POST ["estado"] == utf8_encode("Maranhão") ){
					echo "selected";
				}
				?>><?php echo utf8_encode("Maranhão")?></option>
				
				<!-- Opção 11: -->
			<option
				<?php
				if (isset ( $_POST ["estado"] ) && $_POST ["estado"] == utf8_encode("Mato Grosso") ){
					echo "selected";
				}
				?>><?php echo utf8_encode("Mato Grosso")?></option>
				
				<!-- Opção 12: -->
			<option
				<?php
				if (isset ( $_POST ["estado"] ) && $_POST ["estado"] == utf8_encode("Mato Grosso do Sul") ){
					echo "selected";
				}
				?>><?php echo utf8_encode("Mato Grosso do Sul")?></option>
				
				<!-- Opção 13: -->
			<option
				<?php
				if (isset ( $_POST ["estado"] ) && $_POST ["estado"] == utf8_encode("Minas Gerais") ){
					echo "selected";
				}
				?>><?php echo utf8_encode("Minas Gerais")?></option>
				
				<!-- Opção 14: -->
			<option
				<?php
				if (isset ( $_POST ["estado"] ) && $_POST ["estado"] == utf8_encode("Pará") ){
					echo "selected";
				}
				?>><?php echo utf8_encode("Pará")?></option>
				
				<!-- Opção 15: -->
			<option
				<?php
				if (isset ( $_POST ["estado"] ) && $_POST ["estado"] == utf8_encode("Paraíba") ){
					echo "selected";
				}
				?>><?php echo utf8_encode("Paraíba")?></option>
				
				
				<!-- Opção 16: -->
			<option
				<?php
				if (isset ( $_POST ["estado"] ) && $_POST ["estado"] == utf8_encode("Paraná") ){
					echo "selected";
				}
				?>><?php echo utf8_encode("Paraná")?></option>
				
				<!-- Opção 17: -->
			<option
				<?php
				if (isset ( $_POST ["estado"] ) && $_POST ["estado"] == utf8_encode("Pernambuco") ){
					echo "selected";
				}
				?>><?php echo utf8_encode("Pernambuco")?></option>
				
				<!-- Opção 18: -->
			<option
				<?php
				if (isset ( $_POST ["estado"] ) && $_POST ["estado"] == utf8_encode("Piauí") ){
					echo "selected";
				}
				?>><?php echo utf8_encode("Piauí")?></option>
				
				
				<!-- Opção 19: -->
			<option
				<?php
				if (isset ( $_POST ["estado"] ) && $_POST ["estado"] == utf8_encode("Rio de Janeiro") ){
					echo "selected";
				}
				?>><?php echo utf8_encode("Rio de Janeiro")?></option>
				
				<!-- Opção 20: -->
			<option
				<?php
				if (isset ( $_POST ["estado"] ) && $_POST ["estado"] == utf8_encode("Rio Grande do Norte") ){
					echo "selected";
				}
				?>><?php echo utf8_encode("Rio Grande do Norte")?></option>
				
				<!-- Opção 21: -->
			<option
				<?php
				if (isset ( $_POST ["estado"] ) && $_POST ["estado"] == utf8_encode("Rio Grande do Sul") ){
					echo "selected";
				}
				?>><?php echo utf8_encode("Rio Grande do Sul")?></option>
				
				<!-- Opção 22: -->
			<option
				<?php
				if (isset ( $_POST ["estado"] ) && $_POST ["estado"] == utf8_encode("Rondônia") ){
					echo "selected";
				}
				?>><?php echo utf8_encode("Rondônia")?></option>
				
				<!-- Opção 23: -->
			<option
				<?php
				if (isset ( $_POST ["estado"] ) && $_POST ["estado"] == utf8_encode("Roraima") ){
					echo "selected";
				}
				?>><?php echo utf8_encode("Roraima")?></option>
				
				<!-- Opção 24: -->
			<option
				<?php
				if (isset ( $_POST ["estado"] ) && $_POST ["estado"] == utf8_encode("Santa Catarina") ){
					echo "selected";
				}
				?>><?php echo utf8_encode("Santa Catarina")?></option>
				
				<!-- Opção 25: -->
			<option
				<?php
				if (isset ( $_POST ["estado"] ) && $_POST ["estado"] == utf8_encode("São Paulo") ){
					echo "selected";
				}
				?>><?php echo utf8_encode("São Paulo")?></option>
				
				<!-- Opção 26: -->
			<option
				<?php
				if (isset ( $_POST ["estado"] ) && $_POST ["estado"] == utf8_encode("Sergipe") ){
					echo "selected";
				}
				?>><?php echo utf8_encode("Sergipe")?></option>
				
				<!-- Opção 27: -->
			<option
				<?php
				if (isset ( $_POST ["estado"] ) && $_POST ["estado"] == utf8_encode("Tocantins") ){
					echo "selected";
				}
				?>><?php echo utf8_encode("Tocantins")?></option>

		</select> 
		<br>
		
		<br>

		<!--BOTOES PARA ENVIAR-->
		<input id="botaoEnviar" type="reset" value="Limpar os dados"> <input id="botaoEnviar" type="submit"
			value="Enviar os dados">
	</form>

	<br>
	<a id="botao" href="./estadioConsulta.php">Consultar Estadios</a>
			<footer class="footer">
			<img class="footer" src="../utilitarios/figuras/rodape.png" alt="rodape">
	</footer><!-- em estilo. é class e # é id -->
</body>
</html>

<!-- Cada bloco de php é um arquivo, logo ele deve ser acessado 
através do include ou através de um objeto (somente nos casos em que o arquivo a ser acessado está contido 
no mesmo arquivo onde se declara o objeto). Desta forma, exceto no ultimo caso todos devem vir com a instrução include-->