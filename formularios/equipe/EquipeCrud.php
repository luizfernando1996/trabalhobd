<?php 


include("../FileMySQL.php");//<--Segue control e clique no caminho para ter certeza qe o caminho está correto
class ClasseEquipeCrude extends ConectaAoMySql{
	
	public function inserirBanco($nome,$estado, $nomeEstadio,$nomeTecnico) {
		$sql = "INSERT INTO equipe
                (Nome, Estado, NomeEstadio, NomeTecnico)
                VALUES (?, ?, ?, ?)";
		
		$stmt = $this->PDO->prepare ( $sql );
		
		$stmt->bindParam ( 1, $nome);
		$stmt->bindParam ( 2, $estado);
		$stmt->bindParam ( 3, $nomeEstadio);
		$stmt->bindParam ( 4, $nomeTecnico);
		
		$stmt->execute ();
		
		if ($stmt->errorCode () != "00000") {
			$valido = false;
			$erro = "Erro código " . $stmt->errorCode () . ": ";
			$erro .= implode ( ", ", $stmt->errorInfo () );
		}
		
	}
}

?>




?>