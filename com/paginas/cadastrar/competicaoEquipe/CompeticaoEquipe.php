<?php
//N�o consegui n�o incluir todo o caminho do arquivo
include ("com/php/controller/conexaoComBanco/ConectaAoMySql.php");

class CompeticaoEquipe extends ConectaAoMySql{
	public function mostrar() {
		echo $mensagem;
	}
}

?>
