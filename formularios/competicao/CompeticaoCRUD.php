
<?php
// Não consegui não incluir todo o caminho do arquivo
include ('../FileMySQL.php');
class CompeticaoCRUDClasse extends ConectaAoMySql {
	private $primaryKey;

	public function inserirCompeticao($nome, $abrangencia, $sistemaPontuacao, $serie, $nomeEntidade, $quantidadeDeJogos, $ano) {
		echo $nome . " " . $abrangencia . " " . $sistemaPontuacao . " " . $serie . " " . $nomeEntidade . " " . $quantidadeDeJogos . " " . $ano;
		
		$sql = "INSERT INTO competicao
                (Nome, Abrangencia, SistemaPontuacao, Serie, NomeEntidade, QuantidadeDeJogos, Ano)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
		
		$stmt = $this->PDO->prepare ( $sql );
		
		$stmt->bindParam ( 1, $nome );
		$stmt->bindParam ( 2, $abrangencia );
		$stmt->bindParam ( 3, $sistemaPontuacao );
		$stmt->bindParam ( 4, $serie );
		$stmt->bindParam ( 5, $nomeEntidade );
		$stmt->bindParam ( 6, $quantidadeDeJogos );
		$stmt->bindParam ( 7, $ano );
		$stmt->execute ();
		
		if ($stmt->errorCode () != "00000") {
			$valido = false;
			$erro = "Erro código " . $stmt->errorCode () . ": ";
			$erro .= implode ( ", ", $stmt->errorInfo () );
		}
	}
	public function lerAuxiliar() {
			// PDO é o objeto da classe base
		$sql = "SELECT * FROM competicao";
		// $rs-->result set
		$rs = $this->PDO->prepare ( $sql );
		if ($rs->execute ()) {
			// ::pegar algum campo estatico da classe PDO
			while ( $registro = $rs->fetch ( PDO::FETCH_OBJ ) ) {
				echo "<tr>";
				// o operador . é responsavel pela concatenação
				// nomes das colunas do banco
				echo "<td>" . $registro->Nome . "</td>";
				echo "<td>" . $registro->Abrangencia . "</td>";
				echo "<td>" . $registro->SistemaPontuacao . "</td>";
				echo "<td>" . $registro->Serie . "</td>";
				echo "<td>" . $registro->NomeEntidade . "</td>";
				echo "<td>" . $registro->QuantidadeDeJogos . "</td>";
				echo "<td>" . $registro->Ano . "</td>";
				echo "<td>" . $registro->ID . "</td>";
				
				// será utilizada no método abaixo o de deletar e alterar
				$primaryKey = array (
						$registro->ID 
				);
				
				echo "<td>" . "<a href='?excluir=true
                &id=" . $primaryKey [0] . "'>Deletar</a>" . "</td>";
				echo "<td>" . "<a href='./CompeticaoUpdate.php?alterar=true
				&id=" . $primaryKey [0] . "'>Alterar</a>". "</td>";
				
				echo "</tr>";
			}
		} else {
			echo "Falha na seleção de usuários <br>";
		}
	}
	public function deletarCompeticao($primaryKey) {
		$sql = ("DELETE FROM competicao where ID=?");
		
		$stmt = $this->PDO->prepare ( $sql );
		$stmt->bindParam ( 1, $primaryKey [0] );
		$stmt->execute ();
		
		if ($stmt->errorCode () != "00000") {
			echo "Erro código " . $stmt->errorCode () . ":";
			echo implode ( ",", $stmt->errorInfo () );
		} else
			echo "Sucesso  competicao removida com sucesso <br><br>";
	}
	public function consultarCompeticao($primaryKey) {
		$sql = "SELECT * FROM competicao WHERE ID = ?";
		$rs = $this->PDO->prepare ( $sql );
		
		$rs->bindParam ( 1, $primaryKey [0] );
		
		if ($rs->execute ()) {
			// rs->fetch captura cada linha da tabela, isto é, cada objeto jogador da tabela
			// e manda para $registro
			if ($registro = $rs->fetch ( PDO::FETCH_OBJ )) {
				// txtNomeJogador é o nome no formulario
				// enquanto $registro->Nome é o nome da coluna no banco
				$_POST ["txtNome"] = $registro->Nome;
				$_POST ["txtAbrangencia"] = $registro->Abrangencia;
				$_POST ["txtSistemaPontuacao"] = $registro->SistemaPontuacao;
				$_POST ["txtSerie"] = $registro->Serie;
				$_POST ["txtNomeEntidade"] = $registro->NomeEntidade;
				$_POST ["txtQuantidadeDeJogos"] = $registro->QuantidadeDeJogos;
				$_POST ["txtAno"] = $registro->Ano;
			} else
				$erro = "Registro não encontrado";
		} else
			$erro = "Falha na captura do registro";
	}
	public function alterarDadosCompeticao($primaryKey, $campos) {
		$sql = "UPDATE competicao SET
		Nome = ?,
		Abrangencia = ?,
		SistemaPontuacao =?,
		Serie = ?,
		NomeEntidade = ?,
		QuantidadeDeJogos = ?,
		Ano = ?
		WHERE ID = ?";

		$stmt = $this->PDO->prepare ( $sql );
		
		$stmt->bindParam ( 1, $campos [0] );
		$stmt->bindParam ( 2, $campos [1] );
		$stmt->bindParam ( 3, $campos [2] );
		$stmt->bindParam ( 4, $campos [3] );
		$stmt->bindParam ( 5, $campos [4] );
		$stmt->bindParam ( 6, $campos [5] );
		$stmt->bindParam ( 7, $campos [6] );
		$stmt->bindParam ( 8, $primaryKey [0] );
		
		$stmt->execute ();
		
		if ($stmt->errorCode () != "00000") {
			$valido = false;
			$erro = "Erro código " . $stmt->errorCode () . ": ";
			$erro .= implode ( ", ", $stmt->errorInfo () );
		} 
		else
			echo utf8_encode ( "Alteração realizada com sucesso" );
	}
}

?>


