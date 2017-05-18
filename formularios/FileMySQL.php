<?php
//Não se pode ter muitas pastas porque o caminho fica gigantesco!!Então é isto ai!!Nunca crie muitas pastas
class ConectaAoMySql {
 	
	private $MYSQL_HOST = 'mysql.hostinger.com.br';
	private $MYSQL_USER = 'u114118567_banco';
	private $MYSQL_PASSWORD = 'banco321';
	private $MYSQL_DB_NAME = 'u114118567_banc2';
	public $mensagem = null;
	// Abaixo esta declarado um 'objeto' da classe PDO
	public $PDO;
	
	function __construct(){
		// O nome de constantes não pode ter $ e o comando define só pode ser usado dentro de escopos
		// define ( 'MYSQL_PASSWORD', 'banco321' );
		try {
			$this->PDO = new PDO ( 'mysql:host=' . $this->MYSQL_HOST . ';dbname=' . $this->MYSQL_DB_NAME, $this->MYSQL_USER, $this->MYSQL_PASSWORD );
			$this->PDO->exec ( "set names utf8" );
			$this->mensagem = "Acesso realizado no banco";
			echo $this->mensagem.'</br>';
		} catch ( PDOException $e ) {
			$this->mensagem = 'Erro ao conectar com o MySQL: ' . $e->getMessage ();
			echo $this->mensagem;
		}
	}
	
}
?>