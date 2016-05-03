<?php
if(IsSet($_COOKIE["logado"])){}
else{
echo '<meta http-equiv="refresh" content="0;url=/">';
exit; 

}

if(isset($_GET['url'])){
  $url=$_GET['url'];
}
else {
  $url="";
}

$url=(empty($url))?"index":$url;


include 'application/controler/Produtos.php';
include 'application/controler/Categorias.php';
include 'application/controler/Retirantes.php';
include 'application/controler/Fornecedores.php';
include 'application/controler/Form.php';
include 'application/controler/Relatorios.php';
include 'application/controler/DB.php';

?>
<html>


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/logo.png">

    <title>Submarin - ADS</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/justified-nav.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->



<title>StockSystem</title>
<style type="text/css">
@import url("styles/index.css");
@import url("styles/menu.css");
#apDiv1 {
	position: absolute;
	width: 145px;
	height: 115px;
	z-index: 1;
	left: 1108px;
	top: 35px;
	visibility: inherit;
}
</style>
<script type="text/javascript" src="application/js/jquery.min.js"></script>
<script type="text/javascript" src="application/js/menu.js"></script>
<script type="text/javascript" src="application/js/functions.js"></script>
</head>


<body>

<div id="Full">
<div class="container">

    
      <div class="masthead">
        <h3 class="text-muted">
			<img src="assets/img/logo.png" height="80">
		</h3>
        <nav>
          <ul class="nav nav-justified">
          
            <li class=""><a href="main.php">Home</a></li>
            <li><a href="#">Produtos</a>
            <ul>
			<li><a href="main.php?url=categoria&acao=formcadastrocategoria">Cadastrar Categoria</a></li>
			<li><a href="main.php?url=produto&acao=formcadastro">Cadastrar Produtos</a></li>
			<li><a href="main.php?url=produto&acao=listar">Listar Produtos</a></li>
			<li><a href="main.php?url=categoria&acao=listar">Listar Categorias</a></li>
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
        </nav>
        
      </div>



  
  <p>&nbsp;</p>
  
  
  <div id="Content"><?php include 'application/view/'.$url.'.phtml'; ?></div>
</div>


</body>

</html>
