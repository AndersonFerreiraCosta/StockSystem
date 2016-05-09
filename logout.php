<?php

	// finaliza sessao
	session_start();
	session_destroy();
	unset($_SESSION);
	
	// redireciona
	header("Location: index.php");

?>
