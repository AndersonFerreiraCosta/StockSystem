<?php
	
include("utils.php");
include("conexao.php");

	
			// conexão ok e banco ok
			echo $_POST['nome'] = limpa_entrada($_POST['nome']);
			echo $_POST['usuario'] = limpa_entrada($_POST['usuario']);
			echo  $_POST['senha'] = limpa_entrada($_POST['senha']);
			
		
			
			
			
		
			
		
				
				$sql = "INSERT INTO recados(nome , login , senha)
						VALUES('{$_POST['nome']}',
							   '{$_POST['usuario']}',
							   '{$_POST['senha']};";
				
			
			
			
			if (!mysql_query($sql)) {
				die("Erro ao gravar recado!");
			} else {
				

				
				
				
				header("Location: index.html");
			}
			

?>