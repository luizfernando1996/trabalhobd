<?php
include ("../FileMySQL.php"); // <--Segue control e clique no caminho para ter certeza qe o caminho está correto
class Transferencia_Crude extends ConectaAoMySql {
	private $primaryKey;
	public function inserirTransferencia($camisa, $nomeEquipeAtual, $nomeEquipeFutura ) {
		$sql = "INSERT INTO transferencias
                (Camisa, NomeEquipe, EquipeTransfereJogadorcol)
                VALUES (?, ?, ?)";
		
		$stmt = $this->PDO->prepare ( $sql );
		
		$stmt->bindParam ( 1, $camisa);
		$stmt->bindParam ( 2, $nomeEquipeAtual);
		$stmt->bindParam ( 3, $nomeEquipeFutura);
		
		$stmt->execute ();
		
		if ($stmt->errorCode () != "00000") {
			$valido = false;
			$erro = "Erro código " . $stmt->errorCode () . ": ";
			$erro .= implode ( ", ", $stmt->errorInfo () );
		}
	}
	public function lerTransferencias() {
		// PDO é o objeto da classe base
		$sql = "SELECT * FROM transferencias";
		// $rs-->result set
		$rs = $this->PDO->prepare ( $sql );
		if ($rs->execute ()) {
			// ::pegar algum campo estatico da classe PDO
			while ( $registro = $rs->fetch ( PDO::FETCH_OBJ ) ) {
				echo "<tr>";
				// o operador . é responsavel pela concatenação
				// nomes das colunas do banco
				echo "<td>" . $registro->Camisa. "</td>";
				echo "<td>" . $registro->NomeEquipe. "</td>";
				echo "<td>" . $registro->EquipeTransfereJogadorcol. "</td>";
				// será utilizada no método abaixo o de deletar e alterar
				$primaryKey = array (
						$registro->ID
				);
				
				echo "<td>" . "<a href='?excluir=true&id=" . $primaryKey [0]  ."'>Deletar</a>" . "</td>";
				echo "<td>" . "<a href='./TransferenciaUpdate.php?alterar=true&id=" . $primaryKey [0] . "'>Alterar</a>", "</td>";
				
				echo "</tr>";
			}
		} else {
			echo "Falha na seleção de usuários <br>";
		}
	}
	public function deletarTransferencia($primaryKey) {
		$sql = ("DELETE FROM transferencias WHERE ID=?");
		
		$stmt = $this->PDO->prepare ( $sql );
		$stmt->bindParam ( 1, $primaryKey [0] );
		$stmt->execute ();
		
		if ($stmt->errorCode () != "00000") {
			echo "Erro código " . $stmt->errorCode () . ":";
			echo implode ( ",", $stmt->errorInfo () );
		} else
			echo "Sucesso : transferencia removida com sucesso <br><br>";
	}
	public function consultarTransferencia($primaryKey) {
		$sql = "SELECT * FROM transferencias WHERE ID= ? ";
		$rs = $this->PDO->prepare ( $sql );
		
		$rs->bindParam ( 1, $primaryKey [0] );
		
		if ($rs->execute ()) {
			// rs->fetch captura cada linha da tabela, isto é, cada objeto jogador da tabela
			// e manda para $registro
			if ($registro = $rs->fetch ( PDO::FETCH_OBJ )) {
				// txtNomeJogador é o nome no formulario
				// enquanto $registro->Nome é o nome da coluna no banco
				$_POST ["numeroCamisa"] = $registro->Camisa;
				$_POST ["NomeEquipeAntiga"] = $registro->NomeEquipe;
				$_POST ["nomeEquipeFutura"] = $registro->EquipeTransfereJogadorcol;
			} else
				$erro = "Registro não encontrado";
		} else
			$erro = "Falha na captura do registro";
	}
	public function alterarDadosTransferencia($primaryKey, $campos) {
		$sql = "UPDATE transferencias SET 
		Camisa = ?, 
		NomeEquipe = ?, 
		EquipeTransfereJogadorcol = ? 
		WHERE ID = ? ";
		
		$stmt = $this->PDO->prepare ( $sql );
		
		$stmt->bindParam ( 1, $campos [0] );
		$stmt->bindParam ( 2, $campos [1] );
		$stmt->bindParam ( 3, $campos [2] );
		
		$stmt->bindParam ( 4, $primaryKey [0] );
		
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
