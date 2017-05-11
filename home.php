<html lang="pt-br"><head>
        <meta charset="utf-8">
        <title>SISTEMA DE GERENCIAMENTO DE BANCO DE DADOS RELACIONAL SOBRE O FUTEBOL BRASILEIRO</title>
        
        <style>
            .centralizarModelo{
                position:absolute;        
                /*top:50%;*/
                left:25%;
                margin-top:00px;
                margin-left: 20px;
            }
             .wrapper{
                max-width: 1000px;
                width: 100%;
                margin: 0 auto;
           }
           .footer{
                position:absolute
                top:50%;
                left:25%;
                /*width: 1000px; /*Largura da imagem, não altere se não souber
                height:180px; Altura da imagem, não altere se não souber**/
                margin-top:250px;
                margin-left: 20px;
           }
        </style>

</head>
    
<body class="wrapper">
        <header>
            <div>
                <img src="com/figuras/Topo.png" alt="Home">
                <nav>
                        <a href="#">Home</a>
                        <a href="com/paginas/cadastrar/cadastrar.html">Cadastrar</a>
                        <a href="com/paginas/consultar/consultar.html">Consultar</a>
                </nav>
            </div>
        </header>
        <section>
            <article>
                <img class="centralizarModelo" src="com/paginas/home/modeloHome.png" alt="modeloHome">            
            </article>
            
        </section>
        <? include("com/php/controller/conexaoComBanco/ConectaAoMySQL.php"); ?>
        <footer class="footer">
            <img class="footer" src="com/Figuras/rodape.png" alt="rodape">
        </footer>

</body>
</html>