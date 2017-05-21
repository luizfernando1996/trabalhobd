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
						$registro->Nome
				);
				
				echo "<td>" . "<a href='?excluir=true
                &nome=" . $primaryKey [0] ."'>Deletar</a>" . "</td>";
				echo "<td>" . "<a href='./equipeUpdate.php?alterar=true
				&nome=" . $primaryKey [0] .  "'>Alterar</a>", "</td>";
				
				echo "</tr>";
			}
		} else {
			echo "Falha na seleção de usuários <br>";
		}
	}
	public function deletarEquipe($primaryKey){
		$sql = ("DELETE FROM equipe where Nome=? ");
		
		$stmt = $this->PDO->prepare ( $sql );
		$stmt->bindParam ( 1, $primaryKey [0] );
		$stmt->execute ();
		
		if ($stmt->errorCode () != "00000") {
			echo "Erro código " . $stmt->errorCode () . ":";
			echo implode ( ",", $stmt->errorInfo () );
		} else
			echo "Sucesso equipe removida com sucesso <br><br>";
	}
	public function lerEquipe($primaryKey){
		$sql = "SELECT * FROM equipe WHERE Nome= ? ";
	
		$rs = $this->PDO->prepare ( $sql );
		
		$rs->bindParam ( 1, $primaryKey[0] );
		
		if ($rs->execute ()) {
			// rs->fetch captura cada linha da tabela, isto é, cada objeto jogador da tabela
			// e manda para $registro
			if ($registro = $rs->fetch ( PDO::FETCH_OBJ )) {
				// txtNomeJogador é o nome no formulario
				// enquanto $registro->Nome é o nome da coluna no banco
				$_POST ["txtNomeEquipe"] = $registro->Nome;
				$_POST["campoEstado"] = $registro->Estado;
				//echo $_POST["estadoCampo"];
				$_POST ["nomeEstadio"] = $registro->NomeEstadio;
				$_POST ["nomeTecnico"] = $registro->NomeTecnico;
			} else
				$erro = "Registro não encontrado";
		} else
			$erro = "Falha na captura do registro";
	}
	public function alterarDadosEquipes($primaryKey,$campos){
		$sql = "UPDATE equipe SET
		Nome = ?,
		Estado = ?,
		NomeEstadio = ?,
		NomeTecnico = ?
		WHERE Nome= ?";
		
		$stmt = $this->PDO->prepare ( $sql );
		
		$stmt->bindParam ( 1, $campos [0] );
		$stmt->bindParam ( 2, $campos [1] );
		$stmt->bindParam ( 3, $campos [2] );
		$stmt->bindParam ( 4, $campos [3] );
		$stmt->bindParam ( 5, $primaryKey [0] );
		
		$stmt->execute ();
		if ($stmt->errorCode () != "00000") {
			$valido = false;
			$erro = "Erro código " . $stmt->errorCode () . ": ";
			$erro .= implode ( ", ", $stmt->errorInfo () );
		} else {
			echo utf8_encode ( "Alteração realizada com sucesso" );
		}
	}

}

?>




?>