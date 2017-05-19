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
		else 
			echo "Cadastro efetuado com sucesso";
		
	}
	public function lerEquipes(){
		
		// PDO é o objeto da classe base
		$sql = "SELECT * FROM equipe";
		
		// $rs-->result set
		$rs = $this->PDO->prepare ( $sql );
		
		if ($rs->execute ()) {
			
			// ::pegar algum campo estatico da classe PDO
			while ( $registro = $rs->fetch ( PDO::FETCH_OBJ ) ) {
				echo "<tr>";
				
				// o operador . é responsavel pela concatenação
				// nomes das colunas do banco
				
				echo "<td>" . $registro->Nome . "</td>";
				echo "<td>" . $registro->Estado . "</td>";
				echo "<td>" . $registro->NomeEstadio . "</td>";
				echo "<td>" . $registro->NomeTecnico . "</td>";
				// será utilizada no método abaixo o de deletar e alterar
				
				$primaryKey = array (
						$registro->Estado,
						$registro->NomeEstadio,
						$registro->NomeTecnico
				);
				
				echo "<td>" . "<a href='?excluir=true
                &estado=" . $primaryKey [0] .
                "&nomeEstadio=" . $primaryKey [1] .
                "&nomeTecnico=" . $primaryKey [2] . "'>Deletar</a>" . "</td>";
				echo "<td>" . "<a href='./jogadorUpdate.php?alterar=true
				&estado=" . $primaryKey [0] .
				"&nomeEstadio=" . $primaryKey [1] .
				"&nomeTecnico=" . $primaryKey [2] .  "'>Alterar</a>", "</td>";
				
				echo "</tr>";
			}
		} else {
			echo "Falha na seleção de usuários <br>";
		}
	}
	public function deletarEquipe($primaryKey){
		$sql = ("DELETE FROM equipe where Estado=? && NomeEstadio=? &&NomeTecnico=?");
		
		$stmt = $this->PDO->prepare ( $sql );
		$stmt->bindParam ( 1, $primaryKey [0] );
		$stmt->bindParam ( 2, $primaryKey [1] );
		$stmt->bindParam ( 3, $primaryKey [2] );
		$stmt->execute ();
		
		if ($stmt->errorCode () != "00000") {
			echo "Erro código " . $stmt->errorCode () . ":";
			echo implode ( ",", $stmt->errorInfo () );
		} else
			echo "Sucesso : jogador removido com sucesso <br><br>";
	}


}

?>




?>