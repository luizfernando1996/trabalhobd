<?php
//Não consegui não incluir todo o caminho do arquivo

include ('../FileMySQL.php');
class AuxiliarCRUDClasse extends ConectaAoMySql{
	private $primaryKey;
	
	public function inserirBanco($nome, $comissaoTecnicaEquipe ){ 
		$sql = "INSERT INTO auxiliar
                (Nome, ComissaoTecnicaEquipe)
                VALUES (?, ?)";
		
		$stmt = $this->PDO->prepare ( $sql );
		
		$stmt->bindParam ( 1, $nome );
		$stmt->bindParam ( 2, $comissaoTecnicaEquipe );	
		$stmt->execute ();
		
		if ($stmt->errorCode () != "00000") {
			$valido = false;
			$erro = "Erro código " . $stmt->errorCode () . ": ";
			$erro .= implode ( ", ", $stmt->errorInfo () );
		}
	}
	public function lerAuxiliar() {
		// PDO é o objeto da classe base
		$sql = "SELECT * FROM auxiliar";
		// $rs-->result set
		$rs = $this->PDO->prepare ( $sql );
		if ($rs->execute ()) {
			// ::pegar algum campo estatico da classe PDO
			while ( $registro = $rs->fetch ( PDO::FETCH_OBJ ) ) {
				echo "<tr>";
				// o operador . é responsavel pela concatenação
				// nomes das colunas do banco
				echo "<td>" . $registro->Nome . "</td>";
				echo "<td>" . $registro->ComissaoTecnicaEquipe . "</td>";
				
				// será utilizada no método abaixo o de deletar e alterar
				$primaryKey = array (
						$registro->Nome					
				);
				
				echo "<td>" . "<a href='?excluir=true
                &nome=" . $primaryKey [0] .
               "'>Deletar</a>" . "</td>";
				echo "<td>" . "<a href='./AuxiliarUpdate.php?alterar=true
				&nome=" . $primaryKey [0] .
				"'>Alterar</a>", "</td>";
				echo "</tr>";
			}
		} else {
			echo "Falha na seleção de usuários <br>";
		}
	}
	public function deletarAuxiliar($primaryKey) {
		$sql = ("DELETE FROM auxiliar where Nome=?");
		
		$stmt = $this->PDO->prepare ( $sql );
		$stmt->bindParam ( 1, $primaryKey [0] );		
		$stmt->execute ();
		
		if ($stmt->errorCode () != "00000") {
			echo "Erro código " . $stmt->errorCode () . ":";
			echo implode ( ",", $stmt->errorInfo () );
		} else
			echo "Sucesso : auxiliar removido com sucesso <br><br>";
	}
	public function consultarAuxiliar($primaryKey) {
		$sql = "SELECT * FROM auxiliar WHERE Nome = ?";
		$rs = $this->PDO->prepare ( $sql );
		
		$rs->bindParam ( 1, $primaryKey [0] );
		
		
		if ($rs->execute ()) {
			// rs->fetch captura cada linha da tabela, isto é, cada objeto jogador da tabela
			// e manda para $registro
			if ($registro = $rs->fetch ( PDO::FETCH_OBJ )) {
				// txtNomeJogador é o nome no formulario
				// enquanto $registro->Nome é o nome da coluna no banco
				$_POST ["txtNomeAuxiliar"] = $registro->Nome;
				$_POST ["txtNomeEquipe"] = $registro->ComissaoTecnicaEquipe;
				
			} else
				$erro = "Registro não encontrado";
		} else
			$erro = "Falha na captura do registro";
	}
	public function alterarDadosAuxiliar($primaryKey,$campos){
		
		$sql = "UPDATE auxiliar SET
		Nome = ?,
		ComissaoTecnicaEquipe = ?		
		WHERE Nome = ?" ;
		
		$stmt = $this->PDO->prepare ( $sql );		
		
		$stmt->bindParam ( 1, $campos[0] );	
		$stmt->bindParam ( 2, $campos[1] );	
		$stmt->bindParam ( 3, $primaryKey);
		$stmt->execute ();
		
		if($stmt->errorCode()!="00000") {
			$valido = false;
			$erro = "Erro código " . $stmt->errorCode () . ": ";
			$erro .= implode ( ", ", $stmt->errorInfo () );
		}		
		else
			echo "Alteração realizada com sucesso";
	}
}

?>


