<!DOCTYPE html>

<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>SISTEMA DE GERENCIAMENTO DE BANCO DE DADOS RELACIONAL SOBRE O
	FUTEBOL BRASILEIRO</title>

<style>
.centralizarModelo {
	position: absolute;
	/*top:50%;*/
	left: 25%;
	margin-top: 00px;
	margin-left: 20px;
}

.wrapper {
	max-width: 1000px;
	width: 100%;
	margin: 0 auto;
}

.footer {
	position: absolute top:50%;
	left: 25%;
	/*width: 1000px; /*Largura da imagem, não altere se não souber
                height:180px; Altura da imagem, não altere se não souber**/
	margin-top: 250px;
	margin-left: 20px;
}
/*---------------------CSSS DA NAVEGAÇÃO ------------------ */
* {
	margin: 0;
	padding: 0;
}

body {
	font-family: arial, helvetica, sans-serif;
	font-size: 12px;
}

.menu {
	list-style: none;
	border: 1px solid #c0c0c0;
	float: left;
}

.menu li {
	position: relative;
	float: left;
	border-right: 1px solid #c0c0c0;
}

.menu li a {
	color: #333;
	text-decoration: none;
	padding: 5px 10px;
	display: block;
}

.menu li a:hover {
	background: #333;
	color: #fff;
	-moz-box-shadow: 0 3px 10px 0 #CCC;
	-webkit-box-shadow: 0 3px 10px 0 #ccc;
	text-shadow: 0px 0px 5px #fff;
}

.menu li  ul {
	position: absolute;
	top: 25px;
	left: 0;
	background-color: #fff;
	display: none;
}

.menu li:hover ul, .menu li.over ul {
	display: block;
}

.menu li ul li {
	border: 1px solid #c0c0c0;
	display: block;
	width: 150px;
}
</style>

</head>

<body class="wrapper">
	<header>
		<!-- cabeçalho -->
		<!-- O primeiro ponto é a pasta onde vc esta e o segundo é o numero maximo de pontos que é uma pasta acima -->
		<img src="./utilitarios/figuras/Topo.png" alt="topoHome">

		<nav>
			<ul class="menu">
				<!-- ../ retorna uma pasta anterior-->
				<li><a href="../default.php">Home</a></li>
				<li><a href="./auxiliar/Auxiliar.php">Auxiliar</a></li>
				<li><a href="./comissaoTecnica/ComissaoTecnica.php">ComissaoTecnica</a></li>
				<li><a href="./competicao/Competicao.php">Competicao</a></li>
				<li><a href="./competicaoEquipe/CompeticaoEquipe.php">CompeticaoEquipe</a></li>
				<li><a href="./equipe/Equipe.php">Equipe</a></li>
				<li><a href="./entidade/Entidade.php">Entidade</a></li>
				<li><a href="./equipeDeArbitragem/EquipeDeArbitragem.php">EquipeDeArbitragem</a></li>
				<li><a href="./estadio/estadio.php">Estadio</a></li>
				<li><a href="#">Restante das tabelas</a>
					<ul>
						<li><a href="./jogador/Jogador.php">Jogador</a></li>
						<li><a href="./partida/Partida.php">Partida</a></li>
						<li><a href="./tecnico/Tecnico.php">Tecnico</a></li>
						<li><a href="./transferencia/Transferencias.php">Transferencias</a></li>
					</ul>
			
			</ul>
		</nav>
	</header>


	<footer class="footer">
		<img class="footer" src="./utilitarios/figuras/rodape.png"
			alt="rodape">
	</footer>
</body>
</html>