<?php
//N�o consegui n�o incluir todo o caminho do arquivo

include ('../FileMySQL.php');
class PartidaCRUDClasse extends ConectaAoMySql{
	private $primaryKey;
	
	public function inserirBanco($idEquipeArbitragem, $nomeEntidade, $data, $hora, $resultadoFinal, $equipeVencedora, $disputaDePenaltis, $golQualificado, $nomeCompeticao, $nomeEquipeMandante, $nomeEstadio, $nomeEquipeVisitante, $serieCompeticao, $anoCompeticao ){ 
		$sql = "INSERT INTO partida
                (IDEquipeArbitragem, NomeEntidade, Data, Hora, ResultadoFinal, EquipeVencedora, DisputaDePenaltis, GolQualificado, NomeCompeticao, NomeEquipeMandante, NomeEstadio, NomeEquipeVisitante, SerieCompeticao, AnoCompeticao )
                VALUES (?, ?, ? ,? ,? ,? ,? ,? ,? ,? , ?, ?,?,?)";
		
		$stmt = $this->PDO->prepare ( $sql );
		
		$stmt->bindParam ( 1, $idEquipeArbitragem );
		$stmt->bindParam ( 2, $nomeEntidade );
		$stmt->bindParam ( 3, $data );
		$stmt->bindParam ( 4, $hora );
		$stmt->bindParam ( 5, $resultadoFinal );
		$stmt->bindParam ( 6, $equipeVencedora );	
		$stmt->bindParam ( 7, $disputaDePenaltis );
		$stmt->bindParam ( 8, $golQualificado );
		$stmt->bindParam ( 9, $nomeCompeticao );
		$stmt->bindParam ( 10, $nomeEquipeMandante);
		$stmt->bindParam ( 11, $nomeEstadio );
		$stmt->bindParam ( 12, $nomeEquipeVisitante );
		$stmt->bindParam ( 13, $serieCompeticao);
		$stmt->bindParam ( 14, $anoCompeticao);
		
		echo $idEquipeArbitragem." ". $nomeEntidade." ". $data ." " . $hora. " ". $resultadoFinal. " ".
		$equipeVencedora." ". $disputaDePenaltis." ". $golQualificado." ". $nomeCompeticao." ". $nomeEquipeMandante
		." ". $nomeEstadio." ". $nomeEquipeVisitante  ." "  . $serieCompeticao ." " . $anoCompeticao;
		
		$stmt->execute ();
		
		if ($stmt->errorCode () != "00000") {
			$valido = false;
			$erro = "Erro c�digo " . $stmt->errorCode () . ": ";
			$erro .= implode ( ", ", $stmt->errorInfo () );
		}
	}
	public function lerPartida() {
		// PDO � o objeto da classe base
		$sql = "SELECT * FROM partida";
		// $rs-->result set
		$rs = $this->PDO->prepare ( $sql );
		if ($rs->execute ()) {
			// ::pegar algum campo estatico da classe PDO
			while ( $registro = $rs->fetch ( PDO::FETCH_OBJ ) ) {
				echo "<tr>";
				// o operador . � responsavel pela concatena��o
				// nomes das colunas do banco
				echo "<td>" . $registro->IDPartida . "</td>";
				echo "<td>" . $registro->IDEquipeArbitragem . "</td>";
				echo "<td>" . $registro->NomeEntidade . "</td>";
				echo "<td>" . $registro->Data . "</td>";
				echo "<td>" . $registro->Hora . "</td>";
				echo "<td>" . $registro->ResultadoFinal . "</td>";
				echo "<td>" . $registro->EquipeVencedora . "</td>";
				echo "<td>" . $registro->DisputaDePenaltis . "</td>";
				echo "<td>" . $registro->GolQualificado . "</td>";
				echo "<td>" . $registro->NomeCompeticao . "</td>";
				echo "<td>" . $registro->NomeEquipeMandante . "</td>";
				echo "<td>" . $registro->NomeEstadio . "</td>";
				echo "<td>" . $registro->NomeEquipeVisitante . "</td>";
				echo "<td>" . $registro->SerieCompeticao . "</td>";
				echo "<td>" . $registro->AnoCompeticao . "</td>";
				
				
				
				// ser� utilizada no m�todo abaixo o de deletar e alterar
				$primaryKey = array (
						$registro->IDPartida				
				);
				
				echo "<td>" . "<a href='?excluir=true
                &idPartida=" . $primaryKey [0] .
               "'>Deletar</a>" . "</td>";
				echo "<td>" . "<a href='./PartidaUpdate.php?alterar=true
				&idPartida=" . $primaryKey [0] .
				"'>Alterar</a>", "</td>";
				echo "</tr>";
			}
		} else {
			echo "Falha na sele��o de usu�rios <br>";
		}
	}
	public function deletarPartida($primaryKey) {
		$sql = ("DELETE FROM partida where IDPartida=?");
		
		$stmt = $this->PDO->prepare ( $sql );
		$stmt->bindParam ( 1, $primaryKey [0] );		
		$stmt->execute ();
		
		if ($stmt->errorCode () != "00000") {
			echo "Erro c�digo " . $stmt->errorCode () . ":";
			echo implode ( ",", $stmt->errorInfo () );
		} else
			echo "Sucesso : partida removida com sucesso <br><br>";
	}
	public function consultarPartida($primaryKey) {
		$sql = "SELECT * FROM partida WHERE IDPartida = ?";
		$rs = $this->PDO->prepare ( $sql );
		
		$rs->bindParam ( 1, $primaryKey [0] );
		
		
		if ($rs->execute ()) {
			// rs->fetch captura cada linha da tabela, isto �, cada objeto jogador da tabela
			// e manda para $registro
			if ($registro = $rs->fetch ( PDO::FETCH_OBJ )) {
				// txtNomeJogador � o nome no formulario
				// enquanto $registro->Nome � o nome da coluna no banco
				$_POST ["txtIDEquipeDeArbitragem"] = $registro->EquipeDeArbitragem;
				$_POST ["txtNomeEntidade"] = $registro->NomeEntidade;
				$_POST ["txtData"] = $registro->Data;
				$_POST ["txtHora"] = $registro->Hora;
				$_POST ["txtResultadoFinal"] = $registro->ResultadoFinal;
				$_POST ["txtEquipeVencedora"] = $registro->EquipeVencedora;
				$_POST ["txtDisputaDePenaltis"] = $registro->DisputaDePenaltis;
				$_POST ["txtGolQualificado"] = $registro->GolQualificado;
				$_POST ["txtNomeCompeticao"] = $registro->NomeCompeticao;
				$_POST ["txtNomeEquipeMandante"] = $registro->EquipeMandante;
				$_POST ["txtNomeEstadio"] = $registro->NomeEstadio;
				$_POST ["txtNomeEquipeVisitante"] = $registro->EquipeVisitante;
				$_POST ["txtSerieCompeticao"] = $registro->SerieCompeticao;
				$_POST ["txtAnoCompeticao"] = $registro->AnoCompeticao;
				
			} else
				$erro = "Registro n�o encontrado";
		} else
			$erro = "Falha na captura do registro";
	}
	public function alterarDadosPartida($primaryKey,$campos){
		
		$sql = "UPDATE partida SET
		IDEquipeArbitragem = ?,
		NomeEntidade = ?,
		Data = ?,
		Hora = ?,
		ResultadoFinal = ?,
		EquipeVencedora = ?,
		DisputaDePenaltis = ?,
		GolQualificado = ?,
		NomeCompeticao = ?,
		NomeEquipeMandante = ?,
		NomeEstadio = ?,
		NomeEquipeVisitante = ?,
		SerieCompeticao = ?,
		AnoCompeticao = ?		
		WHERE IDPartida = ?"; 
		
		
		$stmt = $this->PDO->prepare ( $sql );		
		
		$stmt->bindParam ( 1, $campos[0] );	
		$stmt->bindParam ( 2, $campos[1] );
		$stmt->bindParam ( 3, $campos[2] );
		$stmt->bindParam ( 4, $campos[3] );
		$stmt->bindParam ( 5, $campos[4] );
		$stmt->bindParam ( 6, $campos[5] );
		$stmt->bindParam ( 7, $campos[6] );
		$stmt->bindParam ( 8, $campos[7] );
		$stmt->bindParam ( 9, $campos[8] );
		$stmt->bindParam ( 10, $campos[9] );
		$stmt->bindParam ( 11, $campos[10] );
		$stmt->bindParam ( 12, $campos[11] );
		$stmt->bindParam ( 13, $campos[12] );
		$stmt->bindParam ( 14, $campos[13] );
		$stmt->bindParam ( 15, $primaryKey);
		$stmt->execute ();

		echo $primaryKey . " " . $campos[0] . " ". $campos[1] . " ". $campos[2] . " ". $campos[3] . " ".$campos[4] . " ".$campos[5] . " ".$campos[6] . " "
				.$campos[7] . " ".$campos[8] . " ".$campos[9] . " ".$campos[10] . " ".$campos[11];
		
		
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


