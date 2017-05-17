<?php
//Não consegui não incluir todo o caminho do arquivo
include ("com/php/controller/conexaoComBanco/ConectaAoMySql.php");

class JogadorCrud extends ConectaAoMySql{
	public function inserirBanco($nome,$date,$posicao,$numero) {
		echo $mensagem;
		$sql="INSERT INTO jogador (Posicao,Nome,DataNasc,Camisa,NomeEquipe) VALUES (?,?,?,?)";
		
		$stmt=$PDO->prepare($sql);
		
		$stmt->bindParam(1, $nome);
		$stmt->bindParam(2, $date);
		$stmt->bindParam(3, $posicao);
		$stmt->bindParam(4, $numero);
		
		$stmt->execute();
		
		if($stmt->errorCode() != "00000")
		{
			$valido = false;
			$erro = "Erro código " . $stmt->errorCode() . ": ";
			$erro .= implode(", ", $stmt->errorInfo());
		}
	}
}

?>
