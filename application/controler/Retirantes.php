<?php

class Retirantes extends Produtos   {
	
	
	public $tabela;
	public $id;
	public $conexaoDB;
	
	#Construtor - Conecta e seleciona a tabela
	function __construct() {
		
		$this->conexaoDB=new DB();
		$this->tabela="retirante";
	
	}
	
	
	
	
}

?>