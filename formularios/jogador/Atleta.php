<?php 
class Jogador{
	
	private $Nome;
	private $DataNascimento;
	private $Posicao;
	private $NumeroCamisa;
	private $NomeEquipe;
	
	public function __construct($nome,$DataNascimento,$posicao,$numerooCamisa,$NomeEquipe){		
		$this->Nome=$nome;
		$this->DataNascimento=$DataNascimento;
		$this->Posicao=$posicao;
		$this->NumeroCamisa=$numerooCamisa;
		$this->NomeEquipe=$NomeEquipe;	
	}
	
	
}
?>