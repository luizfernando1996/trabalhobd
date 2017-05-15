<?php
//Não consegui não incluir todo o caminho do arquivo
include ("com/php/controller/conexaoComBanco/ConectaAoMySql.php");

class Partida extends ConectaAoMySql{
	public function mostrar() {
		echo $mensagem;
	}
}

?>
