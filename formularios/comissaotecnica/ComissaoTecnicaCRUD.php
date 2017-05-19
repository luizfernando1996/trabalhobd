<?php
//Não consegui não incluir todo o caminho do arquivo

include ('../FileMySQL.php');
class ComissaoTecnicaCRUDClasse extends ConectaAoMySql{
	private $primaryKey;
	
	public function inserirBanco($nomeEquipe, $nomeTecnico, $nomeAuxiliar ){
		$sql = "INSERT INTO comissaotecnica
                (NomeEquipe, NomeTecnico, NomeAuxiliar)
                VALUES (?, ?, ?)";
		
		$stmt = $this->PDO->prepare ( $sql );
		
		$stmt->bindParam ( 1, $nomeEquipe );
		$stmt->bindParam ( 2, $nomeTecnico );
		$stmt->bindParam ( 3, $nomeAuxiliar);
		$stmt->execute ();
		
		if ($stmt->errorCode () != "00000") {
			$valido = false;
			$erro = "Erro código " . $stmt->errorCode () . ": ";
			$erro .= implode ( ", ", $stmt->errorInfo () );
		}
	}
	public function lerComissaoTecnica() {
		// PDO é o objeto da classe base
		$sql = "SELECT * FROM comissaotecnica";
		// $rs-->result set
		$rs = $this->PDO->prepare ( $sql );
		if ($rs->execute ()) {
			// ::pegar algum campo estatico da classe PDO
			while ( $registro = $rs->fetch ( PDO::FETCH_OBJ ) ) {
				echo "<tr>";
				// o operador . é responsavel pela concatenação
				// nomes das colunas do banco
				echo "<td>" . $registro->NomeEquipe . "</td>";
				echo "<td>" . $registro->NomeTecnico . "</td>";
				echo "<td>" . $registro->NomeAuxiliar . "</td>";
				
				// será utilizada no método abaixo o de deletar e alterar
				$primaryKey = array (
						$registro->NomeEquipe
				);
				
				echo "<td>" . "<a href='?excluir=true
                &nomeEquipe=" . $primaryKey [0] .
                "'>Deletar</a>" . "</td>";
				echo "<td>" . "<a href='./ComissaoTecnicaUpdate.php?alterar=true
				&nomeEquipe=" . $primaryKey [0] .
				"'>Alterar</a>", "</td>";
				echo "</tr>";
			}
		} else {
			echo "Falha na seleção de usuários <br>";
		}
	}
	public function deletarComissaoTecnica($primaryKey) {
		$sql = ("DELETE FROM comissaotecnica where Nome=?");
		
		$stmt = $this->PDO->prepare ( $sql );
		$stmt->bindParam ( 1, $primaryKey [0] );
		$stmt->execute ();
		
		if ($stmt->errorCode () != "00000") {
			echo "Erro código " . $stmt->errorCode () . ":";
			echo implode ( ",", $stmt->errorInfo () );
		} else
			echo "Sucesso : Comissão Tecnica removida com sucesso <br><br>";
	}
	public function consultarAuxiliar($primaryKey) {
		$sql = "SELECT * FROM comissaotecnica WHERE NomeEquipe = ?";
		$rs = $this->PDO->prepare ( $sql );
		
		$rs->bindParam ( 1, $primaryKey [0] );
		
		
		if ($rs->execute ()) {
			// rs->fetch captura cada linha da tabela, isto é, cada objeto jogador da tabela
			// e manda para $registro
			if ($registro = $rs->fetch ( PDO::FETCH_OBJ )) {
				// txtNomeJogador é o nome no formulario
				// enquanto $registro->Nome é o nome da coluna no banco
				$_POST ["txtNomeEquipe"] = $registro->NomeEquipe;
				$_POST ["txtNomeTecnico"] = $registro->NomeTecnico;
				$_POST ["txtNomeAuxiliar"] = $registro->NomeAuxiliar;
				
			} else
				$erro = "Registro não encontrado";
		} else
			$erro = "Falha na captura do registro";
	}
	public function alterarDadosAuxiliar($primaryKey,$campos){
		
		$sql = "UPDATE comissaotecnica SET
		NomeEquipe = ?,
		NomeTecnico = ?,
		NomeAuxiliar = ?
		WHERE NomeEquipe = ?" ;
		
		$stmt = $this->PDO->prepare ( $sql );
		
		$stmt->bindParam ( 1, $campos[0] );
		$stmt->bindParam ( 2, $campos[1] );
		$stmt->bindParam ( 3, $campos[2]);
		$stmt->bindParam ( 4, $primaryKey);
		$stmt->execute ();
		
		if($stmt->errorCode()!="00000") {
			$valido = false;
			$erro = "Erro código " . $stmt->errorCode () . ": ";
			$erro .= implode ( ", ", $stmt->errorInfo () );
		}
		
		else
			echo utf8_encode("Alteração realizada com sucesso");
	}
}

?>



