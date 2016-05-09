<?php

include ("conexao.php");

// conexão ok e banco ok
echo $_POST ['nome'] = $_POST ['nome'] ;
echo $_POST ['usuario'] = $_POST ['usuario'] ;
echo $_POST ['senha'] =   $_POST ['senha'] ;

$sql = "INSERT INTO recados(nome,login,senha)
						VALUES('{$_POST['nome']}',
							   '{$_POST['usuario']}',
							   '{$_POST['senha']};";

if (! mysql_query ( $sql )) {
	die ( "Erro ao gravar recado!" );
} else {
	
	header ( "Location: index.html" );
}

?>