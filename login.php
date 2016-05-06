<?php

if (!empty($_POST)) {
	
	// conexao com BD
	include("conexao.php");

	// receber variaveis do post
	$usuario = $_POST["usuario"];
	$senha = md5($_POST["senha"]);
	
	// verificar se existe usuario+senha procurado
	$sql = "SELECT * FROM usuarios WHERE login='{$usuario}' AND senha='{$senha}';";
	
	$resultado = mysql_query($sql);
 	$validado = mysql_num_rows($resultado);
	
 	// verificar resultado da validação
 	if ($validado == true) {
 		
 		// iniciar sessão
 		session_start();
 		
 		// puxar dados do resultado do BD
 		$dados = mysql_fetch_array($resultado);
 		
 		// grava na sessão
 		$_SESSION['cod_usuario'] = $dados['cod_usuario'];
 		$_SESSION['nome'] = $dados['nome'];
 		$_SESSION['login'] = $dados['login'];
 		
 		// redireciona pra listagem
 		header("Location: main.php");
 		
 	} else {
 		header("Location: index.html");
 	}
	
} else {
	header("Location: index.html");
}

?>