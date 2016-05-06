<?php
error_reporting(0);
ini_set('display_errors', 0);

// conexao ao banco
$conexao = mysql_connect("localhost", "root", "");

if ($conexao) {

	if (!mysql_select_db("stocksystem")) {
		die("Erro ao selecionar o banco de dados.");
	};
	
} else {
	die("Erro ao conectar ao banco.");
}

?>