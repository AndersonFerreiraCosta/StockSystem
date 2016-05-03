<?php
include '../controler/DB.php';
$tabela=strtolower($_GET['tabela']);
$remetente=strtolower($_GET['remetente']);
$where=strtolower($_POST['where']);
$DB=new DB();

	//"de para" com nomes das tabelas
		switch($tabela) {
		case produto:
			$newtable = 'srs_product';
			break;
		case categoria:
			$newtable = 'srs_category';
			break;
		case entrada:
			$newtable = 'srs_input';
			break;
		case saida:
			$newtable = 'srs_output';
			break;
		case retirante:
			$newtable = 'srs_requester';
			break;
		case fornecedor:
			$newtable = 'srs_supplier';
			break;
		}
		
		switch($remetente) {
		case produto:
			$newtabler = 'srs_product';
			break;
		case categoria:
			$newtabler = 'srs_category';
			break;
		case entrada:
			$newtabler = 'srs_input';
			break;
		case saida:
			$newtabler = 'srs_output';
			break;
		case retirante:
			$newtabler = 'srs_requester';
			break;
		case fornecedor:
			$newtabler = 'srs_supplier';
			break;
		}

$rows=$DB->ExecutaQuery("Select a.* from $newtable a join $newtabler b ON b.id = $where where $remetente=b.id");

while($row=mysql_fetch_array($rows)){
	
	echo '<option value="'.$row['id'].'">'.$row['nome'].'</option>';

	
}



?>