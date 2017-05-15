<?php
class bancoMySql {
	
	// O nome de constantes não pode ter $
	private const MYSQL_HOST = 'mysql.hostinger.com.br';
	private const MYSQL_USER = 'u114118567_banco';
	private const MYSQL_PASSWORD = 'banco321';
	private const MYSQL_DB_NAME = 'u114118567_banc2';
	
	
	public function connect() {
		try {
			$PDO = new PDO ( 'mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD );
			$PDO->exec ( "set names utf8" );
			echo "Acesso realizado no banco";
		} catch ( PDOException $e ) {
			echo 'Erro ao conectar com o MySQL: ' . $e -- > getMessage ();
		}
	}
	
}
?>