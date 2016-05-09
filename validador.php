<?php

	// inicia sessao
	session_start();
	
	// verifica se o usuario esta autenticado
	if (!isset($_SESSION['cod_usuario'])) {
		header("Location: index.php");
		die();
	}

?>