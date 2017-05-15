<?php
//Não consegui não incluir todo o caminho do arquivo
include ("com/php/controller/conexaoComBanco/ConectaAoMySql.php");

class Entidade extends ConectaAoMySql{
	public function mostrar() {
		echo $mensagem;
	}
}

?>
