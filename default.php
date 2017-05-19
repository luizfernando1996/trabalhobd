<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>SISTEMA DE GERENCIAMENTO DE BANCO DE DADOS RELACIONAL SOBRE O
	FUTEBOL BRASILEIRO</title>

<style>

#centralizarModelo {
bakground:url(./figuras/modeloHome.png);
	left: 50px;
	top: 60px;
	margin-left:210px;
	margin-top:40px;
	background;
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
	/*Margem entre os objetos da pagina, neste caso entre o rodape
	e o modelo do workbench*/
	margin-top: 25px;
	margin-left: 20px;
}

/*---------------------CSSS DA NAVEGAÇÃO ------------------ */
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

<body class="wrapper">
	<header>
		<div>
			<img src="./formularios/utilitarios/figuras/Topo.png" alt="Home">
			
			<!--Menu principal-->
<nav>
  <ul class="menu">
		<li><a href="#">Home</a></li>
		<li><a href="formularios/homeFormularios.php">Formularios</a></li>
	  		<li><a href="Modelos/Modelos.php">Modelos</a>
<!-- 	         	<ul> -->
<!-- 	                  <li><a href="#">Web Design</a></li> -->
<!-- 	                  <li><a href="#">SEO</a></li> -->
<!-- 	                  <li><a href="#">Design</a></li>                     -->
<!-- 	       		</ul> -->
			</li>
		<li><a href="https://docs.google.com/document/d/1Up8rmrTuysbrhJQ4sY1zEkBtAPtxiWyrNkdkUzsPffo/edit">MiniMundo</a></li>
		<li><a href="#">Contato</a></li>                 
</ul>
</nav>
</div>

			<!--Menu principal-->
	</header>
			<img id="centralizarModelo" src="./formularios/utilitarios/figuras/modeloHome.png"
				alt="modeloHome">
        
<?php

// //Deve se utilizar o comando include ele é semelhante ao import
// include ('com/php/controller/crud/Auxiliar.php');
// // O nome de constantes não pode ter $
// $aux= new Auxiliar();
// $aux->mostrar();
?>
        <footer class="footer">
		<img class="footer" src="./formularios/utilitarios/figuras/rodape.png" alt="rodape">
	</footer>
</body>

</html>

<?php //include("com/php/controller/conexaoComBanco/ConectaAoMySQL.php"); ?>