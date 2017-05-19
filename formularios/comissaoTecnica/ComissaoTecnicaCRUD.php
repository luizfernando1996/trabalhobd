<?php
//N�o consegui n�o incluir todo o caminho do arquivo

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
			$erro = "Erro c�digo " . $stmt->errorCode () . ": ";
			$erro .= implode ( ", ", $stmt->errorInfo () );
		}
	}
	public function lerComissaoTecnica() {
		// PDO � o objeto da classe base
		$sql = "SELECT * FROM comissaotecnica";
		// $rs-->result set
		$rs = $this->PDO->prepare ( $sql );
		if ($rs->execute ()) {
			// ::pegar algum campo estatico da classe PDO
			while ( $registro = $rs->fetch ( PDO::FETCH_OBJ ) ) {
				echo "<tr>";
				// o operador . � responsavel pela concatena��o
				// nomes das colunas do banco
				echo "<td>" . $registro->NomeEquipe . "</td>";
				echo "<td>" . $registro->NomeTecnico . "</td>";
				echo "<td>" . $registro->NomeAuxiliar . "</td>";
				
				// ser� utilizada no m�todo abaixo o de deletar e alterar
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
			echo "Falha na sele��o de usu�rios <br>";
		}
	}
	public function deletarComissaoTecnica($primaryKey) {
		$sql = ("DELETE FROM comissaotecnica where Nome=?");
		
		$stmt = $this->PDO->prepare ( $sql );
		$stmt->bindParam ( 1, $primaryKey [0] );
		$stmt->execute ();
		
		if ($stmt->errorCode () != "00000") {
			echo "Erro c�digo " . $stmt->errorCode () . ":";
			echo implode ( ",", $stmt->errorInfo () );
		} else
			echo "Sucesso : Comiss�o Tecnica removida com sucesso <br><br>";
	}
	public function consultarAuxiliar($primaryKey) {
		$sql = "SELECT * FROM comissaotecnica WHERE NomeEquipe = ?";
		$rs = $this->PDO->prepare ( $sql );
		
		$rs->bindParam ( 1, $primaryKey [0] );
		
		
		if ($rs->execute ()) {
			// rs->fetch captura cada linha da tabela, isto �, cada objeto jogador da tabela
			// e manda para $registro
			if ($registro = $rs->fetch ( PDO::FETCH_OBJ )) {
				// txtNomeJogador � o nome no formulario
				// enquanto $registro->Nome � o nome da coluna no banco
				$_POST ["txtNomeEquipe"] = $registro->NomeEquipe;
				$_POST ["txtNomeTecnico"] = $registro->NomeTecnico;
				$_POST ["txtNomeAuxiliar"] = $registro->NomeAuxiliar;
				
			} else
				$erro = "Registro n�o encontrado";
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
			$erro = "Erro c�digo " . $stmt->errorCode () . ": ";
			$erro .= implode ( ", ", $stmt->errorInfo () );
		}
		
		else
			echo utf8_encode("Altera��o realizada com sucesso");
	}
}

?>



