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
</style>

</head>

<body class="wrapper">
	<header>
		<div>
			<img src="com/figuras/Topo.png" alt="Home">

			<nav>
				<a href="#">Home</a> <a
					href="formularios/homeFormularios.html">Formularios</a> <a
					href="com/paginas/consultar/home/consultar.html">Consultar</a>
			</nav>

		</div>
	</header>
	<section>
		<article>
			<img class="centralizarModelo" src="com/paginas/home/modeloHome.png"
				alt="modeloHome">
		</article>
	</section>

        
<?php

// //Deve se utilizar o comando include ele é semelhante ao import
// include ('com/php/controller/crud/Auxiliar.php');
// // O nome de constantes não pode ter $
// $aux= new Auxiliar();
// $aux->mostrar();
?>
        <footer class="footer">
		<img class="footer" src="com/figuras/rodape.png" alt="rodape">
	</footer>
</body>

</html>

<?php //include("com/php/controller/conexaoComBanco/ConectaAoMySQL.php"); ?>