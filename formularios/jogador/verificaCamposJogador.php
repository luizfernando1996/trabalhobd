<?php
class verificaCamposJogador {
	// Ingenuinamente atribui $_POST como parametro o que щ muito errado porque $_POST щ uma super variavel, щ uma instruчуo do php
	public function verificaPosicao($g) {
		echo "sa".$g;
		if (isset ( $g )) {
			if ($g == "Atacante") {
				echo "selected";
			} else if ($g == "Goleiro(a)") {
				echo "selected";
			} else if ($g == "Zagueiro(a)") {
				echo "selected";
			}
		}
	}
}
?>