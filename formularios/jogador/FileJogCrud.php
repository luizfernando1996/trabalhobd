<?php
include("../FileMySQL.php");//<--Segue control e clique no caminho para ter certeza qe o caminho está correto
class JogadorCrude extends ConectaAoMySql{
	
	public function inserirBanco($posicao,$nome, $date,$numero,$NomeEquipe) {
		$sql = "INSERT INTO jogador
                (Posicao, Nome, DataNasc, Camisa, NomeEquipe)
                VALUES (?, ?, ?, ?,?)";
		
		$stmt = $this->PDO->prepare ( $sql );
		
		$stmt->bindParam ( 1, $posicao);
		$stmt->bindParam ( 2, $nome);
		$stmt->bindParam ( 3, $date);
		$stmt->bindParam ( 4, $numero);
		$stmt->bindParam ( 5, $NomeEquipe );
		
		$stmt->execute ();
		
		if ($stmt->errorCode () != "00000") {
			$valido = false;
			$erro = "Erro código " . $stmt->errorCode () . ": ";
			$erro .= implode ( ", ", $stmt->errorInfo () );
		}
		
	}
}

?>
