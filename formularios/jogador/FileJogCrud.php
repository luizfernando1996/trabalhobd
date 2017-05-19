<?php
include ("../FileMySQL.php"); // <--Segue control e clique no caminho para ter certeza qe o caminho está correto

class JogadorCrude extends ConectaAoMySql {
	private $primaryKey;
	
	public function inserirBanco($posicao, $nome, $date, $numero, $NomeEquipe) {
		$sql = "INSERT INTO jogador
                (Posicao, Nome, DataNasc, Camisa, NomeEquipe)
                VALUES (?, ?, ?, ?,?)";
		
		$stmt = $this->PDO->prepare ( $sql );
		
		$stmt->bindParam ( 1, $posicao );
		$stmt->bindParam ( 2, $nome );
		$stmt->bindParam ( 3, $date );
		$stmt->bindParam ( 4, $numero );
		$stmt->bindParam ( 5, $NomeEquipe );
		
		$stmt->execute ();
		
		if ($stmt->errorCode () != "00000") {
			$valido = false;
			$erro = "Erro código " . $stmt->errorCode () . ": ";
			$erro .= implode ( ", ", $stmt->errorInfo () );
		}
	}
	public function lerJogadores() {
		// PDO é o objeto da classe base
		$sql = "SELECT * FROM jogador";
		// $rs-->result set
		$rs = $this->PDO->prepare ( $sql );
		if ($rs->execute ()) {
			// ::pegar algum campo estatico da classe PDO
			while ( $registro = $rs->fetch ( PDO::FETCH_OBJ ) ) {
				echo "<tr>";
				// o operador . é responsavel pela concatenação
				// nomes das colunas do banco
				echo "<td>" . $registro->Nome . "</td>";
				echo "<td>" . $registro->DataNasc . "</td>";
				echo "<td>" . $registro->Posicao . "</td>";
				echo "<td>" . $registro->Camisa . "</td>";
				echo "<td>" . $registro->NomeEquipe . "</td>";
				// será utilizada no método abaixo o de deletar e alterar
				$primaryKey = array (
						$registro->Posicao,
						$registro->Nome,
						$registro->DataNasc 
				);
				
				echo "<td>" . "<a href='?excluir=true
                &posicao=" . $primaryKey [0] . 
				"&nome=" . $primaryKey [1] . 
				"&datanasc=" . $primaryKey [2] . "'>Deletar</a>" . "</td>";
				echo "<td>" . "<a href='./jogadorUpdate.php?alterar=true
				&posicao=" . $primaryKey [0] . 
				"&nome=" . $primaryKey [1] . 
				"&datanasc=" . $primaryKey [2] .  "'>Alterar</a>", "</td>";
				
				echo "</tr>";
			}
		} else {
			echo "Falha na seleção de usuários <br>";
		}
	}
	public function deletarJogador($primaryKey) {
		$sql = ("DELETE FROM jogador where Posicao=? && Nome=? &&DataNasc=?");
		
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
	public function consultarJogador($primaryKey) {
		$sql = "SELECT * FROM jogador WHERE Posicao= ? && Nome = ? && DataNasc= ?";
		$rs = $this->PDO->prepare ( $sql );
		
		$rs->bindParam ( 1, $primaryKey [0] );
		$rs->bindParam ( 2, $primaryKey [1] );
		$rs->bindParam ( 3, $primaryKey [2] );
		
		if ($rs->execute ()) {
			// rs->fetch captura cada linha da tabela, isto é, cada objeto jogador da tabela
			// e manda para $registro
			if ($registro = $rs->fetch ( PDO::FETCH_OBJ )) {
				// txtNomeJogador é o nome no formulario
				// enquanto $registro->Nome é o nome da coluna no banco
				$_POST ["txtNomeJogador"] = $registro->Nome;
				$_POST ["dataNascimento"] = $registro->DataNasc; 				
				$_POST ["posicao"] = $registro->Posicao;
				$_POST ["numeroCamisa"] = $registro->Camisa;
				$_POST ["nomeEquipe"] = $registro->NomeEquipe;
			} else
				$erro = "Registro não encontrado";
		} else
			$erro = "Falha na captura do registro";
	}
	public function alterarDadosJogador($primaryKey,$campos){
		
		$sql = "UPDATE jogador SET 
		Posicao = ?, 
		Nome = ?, 
		DataNasc = ?, 
		Camisa = ?, 
		NomeEquipe = ? 
		WHERE Posicao= ? && Nome = ? && DataNasc= ?" ;
		
		$stmt = $this->PDO->prepare ( $sql );
		
		$stmt->bindParam ( 1, $campos[0] );
		$stmt->bindParam ( 2, $campos[1] );
		$stmt->bindParam ( 3, $campos[2] );
		$stmt->bindParam ( 4, $campos[3] );
		$stmt->bindParam ( 5, $campos[4] );
		$stmt->bindParam ( 6, $primaryKey [0] );
		$stmt->bindParam ( 7, $primaryKey [1] );
		$stmt->bindParam ( 8, $primaryKey [2] );
		
		$stmt->execute ();
		if($stmt->errorCode()!="00000") {
			$valido = false;
			$erro = "Erro código " . $stmt->errorCode () . ": ";
			$erro .= implode ( ", ", $stmt->errorInfo () );
		}
		else 
		{
			echo utf8_encode("Alteração realizada com sucesso");
		}
	}
}

?>
