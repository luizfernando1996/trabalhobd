<?php
//Não consegui não incluir todo o caminho do arquivo
include ("com/php/controller/conexaoComBanco/ConectaAoMySql.php");

class Auxiliar extends ConectaAoMySql{
	public function mostrar() {
		echo $mensagem;
	}
}

?>
