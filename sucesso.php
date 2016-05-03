<?php
if(IsSet($_COOKIE["logado"])){}
else{
echo '<meta http-equiv="refresh" content="0;url=/">';
exit; 

}
?>

<html>
<head>
<html>
<head>
<title>ALMOXARIFADO</title>
<style type="text/css">
@import url("styles/index.css");
@import url("styles/menu.css");
</style>
<script type="text/javascript" src="application/js/jquery.min.js"></script>
<script type="text/javascript" src="application/js/menu.js"></script>
<script type="text/javascript" src="application/js/functions.js"></script>

</head>
<body>
<form action="cadastro.php" method="post">
<div id="Full">
<div id="Logo"><big><b>CONTROLE DE ESTOQUE</b></big>
<img src="img/logo-kanui.png" alt="Kanui" width="150" height="40" align="left"> <!-- LOGO KANUI -->
<img src="img/logo-tricae.png" alt="Kanui" width="150" height="40" align="right"> <!-- LOGO TRICAE --></div>
	<div id="Menu">
	<ul id="jsddm">
	<li><a href="main.php">Inicio</a>		
	</li>
	<li><a href="#">Produtos</a>
		<ul>
			<li><a href="main.php?url=produto&acao=formcadastrocategoria">Cadastrar Categoria</a></li>
			<li><a href="main.php?url=produto&acao=formcadastro">Cadastrar Produtos</a></li>
			<li><a href="main.php?url=produto&acao=listar">Listar Produtos</a></li>
		</ul>
	</li>
	<li><a href="#">Estoque</a>
		<ul>
			<li><a href="main.php?url=estoque&acao=formcadastroentrada">Entrada de Material</a></li>
			<li><a href="main.php?url=estoque&acao=formcadastrosaida">Saida de Material</a></li>
		</ul>
	</li>
	<li><a href="#">Fornecedores</a>
		<ul>
			<li><a href="main.php?url=fornecedor&acao=formcadastro">Cadastrar Fornecedor</a></li>
			<li><a href="main.php?url=fornecedor&acao=listar">Listar Fornecedores</a></li>
		</ul>
	</li>
	<li><a href="#">Retirantes</a>
		<ul>
			<li><a href="main.php?url=retirante&acao=formcadastro">Cadastrar Retirante</a></li>
			<li><a href="main.php?url=retirante&acao=listar">Listar Retirantes</a></li>
		</ul>
	</li>
	<li><a href="#">Relatórios</a>
		<ul>
			<li><a href="main.php?url=relatorio&acao=produto">Produtos</a></li>
			<li><a href="main.php?url=relatorio&acao=fornecedor">Fornecedores</a></li>
			<li><a href="main.php?url=relatorio&acao=retirante">Retirantes</a></li>
			<li><a href="main.php?url=relatorio&acao=entrada">Entrada</a></li>
			<li><a href="main.php?url=relatorio&acao=saida">Saida</a></li>
		</ul>
	</li>
	<li><a href="#">Usuários</a>
		<ul>
			<li><a href="usuario.php">Cadastrar</a></li>
			</ul>
	</li>
	<li><a href="logout.php">logout</a>		
	</li>
	
</ul>
</div>
	<br>
	<br>
	<br>
	<br>
	<center>
	<b> Usuário cadastrado com sucesso </b>
	</center>
</ul>
</body>
</html>