<?php
include ("../FileMySQL.php"); // <--Segue control e clique no caminho para ter certeza qe o caminho está correto
class CompeticaoEquipeClasseCrude extends ConectaAoMySql {
	private $primaryKey;
	public function inserirCompeticaoEquipe($posicao, $NomeEquipe, $NomeDaCompeticao, $Pontuacao, $GolsFavor, $golsContra) {
		$sql = "INSERT INTO competicaoequipe
                (Posicao, NomeEquipe, NomeDaCompeticao, Pontuacao, GolsFavor,GolsContra)
                VALUES (?, ?, ?, ?,?,?)";
		
		$stmt = $this->PDO->prepare ( $sql );
		
		$stmt->bindParam ( 1, $posicao );
		$stmt->bindParam ( 2, $NomeEquipe );
		$stmt->bindParam ( 3, $NomeDaCompeticao );
		$stmt->bindParam ( 4, $Pontuacao );
		$stmt->bindParam ( 5, $GolsFavor );
		$stmt->bindParam ( 6, $golsContra );
		$stmt->execute ();
		
		if ($stmt->errorCode () != "00000") {
			$valido = false;
			$erro = "Erro código " . $stmt->errorCode () . ": ";
			$erro .= implode ( ", ", $stmt->errorInfo () );
		}
	}
	public function lerCompeticaoEquipe() {
		// PDO é o objeto da classe base
		$sql = "SELECT * FROM competicaoequipe";
		// $rs-->result set
		$rs = $this->PDO->prepare ( $sql );
		if ($rs->execute ()) {
			// ::pegar algum campo estatico da classe PDO
			while ( $registro = $rs->fetch ( PDO::FETCH_OBJ ) ) {
				echo "<tr>";
				// o operador . é responsavel pela concatenação
				// nomes das colunas do banco
				echo "<td>" . $registro->Posicao . "</td>";
				echo "<td>" . $registro->NomeEquipe . "</td>";
				echo "<td>" . $registro->NomeDaCompeticao . "</td>";
				echo "<td>" . $registro->Pontuacao . "</td>";
				echo "<td>" . $registro->GolsFavor . "</td>";
				echo "<td>" . $registro->GolsContra . "</td>";
				// será utilizada no método abaixo o de deletar e alterar
				$primaryKey = array (
						$registro->NomeEquipe,
						$registro->NomeDaCompeticao 
				);
				
				echo "<td>" . "<a href='?excluir=true
                &NomeEquipe=" . $primaryKey [0] . "&NomeDaCompeticao=" . $primaryKey [1] . "'>Deletar</a>" . "</td>";
				echo "<td>" . "<a href='./CompeticaoUpdate.php?alterar=true
				&NomeEquipe=" . $primaryKey [0] . "&NomeDaCompeticao=" . $primaryKey [1] . "'>Alterar</a>", "</td>";
				
				echo "</tr>";
			}
		} else {
			echo "Falha na seleção de usuários <br>";
		}
	}
	public function deletarCompeticaoEquipe($primaryKey) {
		$sql = ("DELETE FROM competicaoequipe where NomeEquipe=? && NomeDaCompeticao=?");
		
		$stmt = $this->PDO->prepare ( $sql );
		$stmt->bindParam ( 1, $primaryKey [0] );
		$stmt->bindParam ( 2, $primaryKey [1] );
		$stmt->execute ();
		
		if ($stmt->errorCode () != "00000") {
			echo "Erro código " . $stmt->errorCode () . ":";
			echo implode ( ",", $stmt->errorInfo () );
		} else
			echo "Sucesso : equipe da competição removida com sucesso <br><br>";
	}
	public function consultarCompeticaoEquipe($primaryKey) {
		$sql = "SELECT * FROM competicaoequipe WHERE NomeEquipe	= ? && NomeDaCompeticao	= ?";
		$rs = $this->PDO->prepare ( $sql );
		
		$rs->bindParam ( 1, $primaryKey [0] );
		$rs->bindParam ( 2, $primaryKey [1] );
		if ($rs->execute ()) {
			// rs->fetch captura cada linha da tabela, isto é, cada objeto jogador da tabela
			// e manda para $registro
			if ($registro = $rs->fetch ( PDO::FETCH_OBJ )) {
				// txtNomeJogador é o nome no formulario
				// enquanto $registro->Nome é o nome da coluna no banco
				$_POST ["txtPosicao"] = $registro->Posicao;
				$_POST ["nomeEquipe"] = $registro->NomeEquipe;
				$_POST ["nomeCompeticao"] = $registro->NomeDaCompeticao;
				$_POST ["pontuacao"] = $registro->Pontuacao;
				$_POST ["golsFavor"] = $registro->GolsFavor;
				$_POST ["golsContra"] = $registro->GolsContra;
			} else
				$erro = "Registro não encontrado";
		} else
			$erro = "Falha na captura do registro";
	}
	public function alterarCompeticaoEquipe($primaryKey, $campos) {
		$sql = "UPDATE competicaoequipe SET 
		Posicao = ?, 
		NomeEquipe = ?, 
		NomeDaCompeticao = ?, 
		Pontuacao = ?, 
		GolsFavor = ?,
  		GolsContra = ?
		WHERE NomeEquipe= ? && NomeDaCompeticao = ?";
		
		$stmt = $this->PDO->prepare ( $sql );
		
		$stmt->bindParam ( 1, $campos [0] );
		$stmt->bindParam ( 2, $campos [1] );
		$stmt->bindParam ( 3, $campos [2] );
		$stmt->bindParam ( 4, $campos [3] );
		$stmt->bindParam ( 5, $campos [4] );
		$stmt->bindParam ( 6, $campos [5] );
		for($j=0;$j<6;$j++){
			echo $campos[j]+" ";
		}
		$stmt->bindParam ( 7, $primaryKey [0] );
		$stmt->bindParam ( 8, $primaryKey [1] );
		
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
