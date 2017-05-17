<?php
//Não consegui não incluir todo o caminho do arquivo
include ("com/php/controller/conexaoComBanco/ConectaAoMySql.php");

class Auxiliar extends ConectaAoMySql{
	
	function __construct(){
		
	}
	public function createAuxiliar() {
		echo $mensagem;
	}
}

?>
