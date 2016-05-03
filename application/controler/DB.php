<?php

class DB {
	
	private $server;
	private $db;
	private$user;
	private $pass;
	public $conexao;
	public $baseurl;
	
	function __construct() {
	
		
		
		$this->server="localhost";
		$this->db="stocksystem";
		$this->user="root";
		$this->pass="";
		$this->Conectar();
		
	}
	
	
	
	function Conectar(){
		
		$this->conexao=mysql_connect($this->server,$this->user,$this->pass) or die('Erro ao se conectar');
		mysql_select_db($this->db,$this->conexao) or die('Erro ao selecionar a DB');
		
	}
	
	
	function PesquisaTabela($tabela){
	
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
	
		if($tabela != 'produto'){
			return mysql_query("Select * from $newtable");
		}else{
			return mysql_query("Select a.id, b.nome as Categoria, a.nome, a.estoque_minimo, a.estoque_atual from srs_product a left join srs_category b on b.id = a.categoria or b.nome = a.categoria order by b.nome, a.nome");
		}
	}
	
	function PesquisaCampos($campos, $tabela){
		
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
		
		return mysql_query("Select $campos from $newtable");
	}
	
	function PesquisaUnica($tabela,$id="0"){

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

        //echo "Select * from $tabela where id=$id";
	
		return(mysql_fetch_array(mysql_query("Select * from $newtable where id=$id")));
	}
	
	
	function ExecutaQuery($query){
		
		return mysql_query($query);
	}
	
	function Nlinhas($query){
		return mysql_num_rows($query);
		
	}
	
	function ListarCampos($tabela)
	{
		
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
		
	$result = mysql_query("SHOW COLUMNS FROM ".$newtable);
	 
	$field = "";
	while($resultado=mysql_fetch_array($result)) {
		//print_r($resultado);
		
	 	foreach($resultado as $campo=>$valor){
	 		
	 		if($campo=='0')
	 		$field.=$valor.",";
	 	}
	 	
	 }
	return $field;
	}
	

}

?>