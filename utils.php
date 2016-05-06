<?php

function limpa_entrada($input) {
	$input = mysql_real_escape_string($input);
	$input = htmlspecialchars($input, ENT_IGNORE, 'utf-8');
	$input = strip_tags($input);
	$input = stripslashes($input);
	return $input;
}


?>