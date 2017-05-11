<?php
//-->define( 'MYSQL_HOST', 'localhost' );<--
define('MYSQL_HOST','mysql.hostinger.com.br');
define( 'MYSQL_USER', 'jonathandr9@hotmail.com' );
define( 'MYSQL_PASSWORD', 'banco321' );
define( 'MYSQL_DB_NAME', 'bancoDados' );

try
{
	$PDO = new PDO( 'mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD );
	$PDO->exec("set names utf8");
	echo"Sucesso";
}
catch ( PDOException $e )
{
	echo 'Erro ao conectar com o MySQL: ' . $e-->getMessage();
}
?>


// $banco = "nome_do_banco_de_dados";
// $usuario = "nome_de_usuario_criado";
// $senha = "senha_atribuida_para_o_bd";
// $hostname = "servidor_de_banco_de_dados";
// $conn = mysql_connect ( $hostname, $usuario, $senha );
// mysql_select_db ( $banco ) or die ( "Não foi possível conectar ao banco MySQL" );
// if (! $conn) {
// 	echo "Não foi possível conectar ao banco MySQL.";
// 	exit ();
// } else {
// 	echo "Parabéns!! A conexão ao banco de dados ocorreu normalmente!";
// }
// mysql_close ();