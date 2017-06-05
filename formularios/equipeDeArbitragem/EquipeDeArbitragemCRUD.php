<?php
//Não consegui não incluir todo o caminho do arquivo

include ('../FileMySQL.php');
class EquipeDeArbitragemCRUDClasse extends ConectaAoMySql{
	private $primaryKey;
	
	public function inserirBanco($nomeBandeirinha1, $nomeBandeirinha2, $nomeArbitro, $nomeQuartoArbitro, $nomeEntidade, $delegado, $nomeCompeticao, $anoCompeticao, $numeroJogo){ 
		$sql = "INSERT INTO equipedearbitragem
                (NomeBandeirinha1, NomeBandeirinha2, NomeArbitro, NomeQuartoArbitro, NomeEntidade, Delegado, NomeCompeticao, AnoCompeticao, NumeroJogo)
                VALUES (?, ?, ? , ?, ?, ?, ?, ?, ? )";
		
		$stmt = $this->PDO->prepare ( $sql );
		
		$stmt->bindParam ( 1, $nomeBandeirinha1 );
		$stmt->bindParam ( 2, $nomeBandeirinha2 );
		$stmt->bindParam ( 3, $nomeArbitro );
		$stmt->bindParam ( 4, $nomeQuartoArbitro );
		$stmt->bindParam ( 5, $nomeEntidade );
		$stmt->bindParam ( 6, $delegado );
		$stmt->bindParam ( 7, $nomeCompeticao );
		$stmt->bindParam ( 8, $anoCompeticao );
		$stmt->bindParam ( 9, $numeroJogo );
		$stmt->execute ();
		
		if ($stmt->errorCode () != "00000") {
			$valido = false;
			$erro = "Erro código " . $stmt->errorCode () . ": ";
			$erro .= implode ( ", ", $stmt->errorInfo () );
		}
	}
	public function lerEquipeDeArbitragem() {
		// PDO é o objeto da classe base
		$sql = "SELECT * FROM equipedearbitragem";
		// $rs-->result set
		$rs = $this->PDO->prepare ( $sql );
		if ($rs->execute ()) {
			// ::pegar algum campo estatico da classe PDO
			while ( $registro = $rs->fetch ( PDO::FETCH_OBJ ) ) {
				echo "<tr>";
				// o operador . é responsavel pela concatenação
				// nomes das colunas do banco
				
				echo "<td>" . $registro->NomeBandeirinha1 . "</td>";
				echo "<td>" . $registro->NomeBandeirinha2 . "</td>";
				echo "<td>" . $registro->NomeArbitro . "</td>";
				echo "<td>" . $registro->NomeQuartoArbitro . "</td>";
				echo "<td>" . $registro->NomeEntidade . "</td>";
				echo "<td>" . $registro->Delegado . "</td>";
				echo "<td>" . $registro->NomeCompeticao . "</td>";
				echo "<td>" . $registro->AnoCompeticao . "</td>";
				echo "<td>" . $registro->NumeroJogo . "</td>";
				
				
				// será utilizada no método abaixo o de deletar e alterar
				$primaryKey = array (
						$registro->NomeCompeticao,
						$registro->AnoCompeticao,
						$registro->NumeroJogo
				);
				
				echo "<td>" . "<a href='?excluir=true
                &nomeCompeticao=" . $primaryKey [0] ."&anoCompeticao". $primaryKey[1]."&numeroJogo". $primaryKey[2].
               "'>Deletar</a>" . "</td>";
				echo "<td>" . "<a href='./EquipeDeArbitragemUpdate.php?alterar=true
				&nomeCompeticao=" . $primaryKey [0] ."&anoCompeticao". $primaryKey[1]."&numeroJogo". $primaryKey[2].
				"'>Alterar</a>", "</td>";
				echo "</tr>";
			}
		} else {
			echo "Falha na seleção de usuários <br>";
		}
	}
	public function deletarEquipeDeArbitragem($primaryKey) {
		$sql = ("DELETE FROM equipedearbitragem where NomeCompeticao = ?, AnoCompeticao = ?, NumeroJogo = ? ");
		
		$stmt = $this->PDO->prepare ( $sql );
		$stmt->bindParam ( 1, $primaryKey [0] );
		$stmt->bindParam ( 2, $primaryKey [1] );
		$stmt->bindParam ( 3, $primaryKey [2] );
		$stmt->execute ();
		
		if ($stmt->errorCode () != "00000") {
			echo "Erro código " . $stmt->errorCode () . ":";
			echo implode ( ",", $stmt->errorInfo () );
		} else
			echo "Sucesso : equipe de arbitragem removida com sucesso <br><br>";
	}
	public function consultarEquipeDeArbitragem($primaryKey) {
		$sql = "SELECT * FROM equipedearbitragem WHERE NomeCompeticao = ?, AnoCompeticao = ?, NumeroJogo = ? ";
		$rs = $this->PDO->prepare ( $sql );
		
		$stmt->bindParam ( 1, $primaryKey [0] );
		$stmt->bindParam ( 2, $primaryKey [1] );
		$stmt->bindParam ( 3, $primaryKey [2] );
		
		
		if ($rs->execute ()) {
			// rs->fetch captura cada linha da tabela, isto é, cada objeto jogador da tabela
			// e manda para $registro
			if ($registro = $rs->fetch ( PDO::FETCH_OBJ )) {
				// txtNomeJogador é o nome no formulario
				// enquanto $registro->Nome é o nome da coluna no banco
				$_POST ["txtNomeBandeirinha1"] = $registro->NomeBandeirinha1;
				$_POST ["txtNomeBandeirinha2"] = $registro->NomeBandeirinha2;
				$_POST ["txtNomeArbitro"] 		= $registro->NomeArbitro;
				$_POST ["txtNomeQuartoArbrito"] = $registro->NomeQuartoArbitro;
				$_POST ["txtNomeEntidade"] = $registro->NomeEntidade;
				$_POST ["txtDelegado"] = $registro->Delegado;
				$_POST ["txtNomeCompeticao"] = $registro->NomeCompeticao;
				$_POST ["txtAnoCompeticao"] = $registro->AnoCompeticao;
				$_POST ["txtNumeroJogo"] = $registro->NumeroJogo;
				
			} else
				$erro = "Registro não encontrado";
		} else
			$erro = "Falha na captura do registro";
	}
	public function alterarDadosEquipeDeArbitragem($primaryKey,$campos){
		
		$sql = "UPDATE equipedearbitragem SET
		NomeBandeirinha1 = ?,
		NomeBandeirinha2 = ?,
		NomeArbitro = ?,
		NomeQuartoArbitro = ?,
		NomeEntidade = ?,
		Delegado = ? ,
		NomeCompeticao = ?,
		AnoCompeticao = ?,
		NumeroJogo = ?	
		WHERE NomeCompeticao = ?, AnoCompeticao = ?, NumeroJogo = ?" ;
		
		$stmt = $this->PDO->prepare ( $sql );		
		
		$stmt->bindParam ( 1, $campos[0] );	
		$stmt->bindParam ( 2, $campos[1] );	
		$stmt->bindParam ( 3, $campos[2]);
		$stmt->bindParam ( 4, $campos[3]);
		$stmt->bindParam ( 5, $campos[4]);
		$stmt->bindParam ( 6, $campos[5]);
		$stmt->bindParam ( 7, $campos[6]);
		$stmt->bindParam ( 8, $campos[7]);
		$stmt->bindParam ( 9, $campos[8]);
		$stmt->bindParam ( 10, $primaryKey[0]);
		$stmt->bindParam ( 11, $primaryKey[1]);
		$stmt->bindParam ( 12, $primaryKey[2]);
		
		
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


