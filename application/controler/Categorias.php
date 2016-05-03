<?php

class Categorias {
	
	
	public $tabela;
	public $id;
	public $conexaoDB;
	public $quantidadeatual;

	
	#Construtor - Conecta e seleciona a tabela
	function __construct($tabela="categoria",$produto="0") {
		
		$this->conexaoDB=new DB();
		$this->tabela=$tabela;
		$produto=$this->conexaoDB->PesquisaUnica($this->tabela,$produto);

		}
	
	#Cadastra ou chama o o metodo para atualizacao dos produtos
	function Cadastrar($id=""){
		
		$funcao=(empty($id))?"Insert into":"Update";
		$where=(empty($id))?" ":" where id = $id";
		$dados=$_POST;
		
        $campos="";		
		foreach ($dados as $campo=>$valor){
			$campos.=$campo."='$valor', ";			
		}
		
		$campos=strip_tags($campos);
		$campos=substr($campos,0,-2);
		
		//teste:
		//echo "$funcao $this->tabela SET $campos $where";
		//die();

	//"de para" com nomes das tabelas
		switch($this->tabela) {
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
		
		$this->conexaoDB->ExecutaQuery("$funcao $newtable SET $campos $where");
		header("Location:main.php");
		
		
	}
	
	
	#Atualiza produto
	function Atualizar($id){
		
		
		$this->Cadastrar($id);
		
		
	}
	
	#Deleta produto
	function Deletar($id){
		
	//"de para" com nomes das tabelas
		switch($this->tabela) {
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
		
		$this->conexaoDB->ExecutaQuery("Delete from $newtable where id=$id");
		header("Location:main.php?url=$this->tabela&acao=listar");
	}
	
	
	#Lista produtos
	function Listar(){
		
		//"de para" com nomes das tabelas
		switch($this->tabela) {
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
		
		$produtos=$this->conexaoDB->PesquisaCampos("id,nome",$this->tabela);
		
		echo '<h1>Listando '.$this->tabela.'</h1><br><br>';
		echo '<table align="center">';
		//echo '<tr><td class="header">ID</td><td class="header">Nome</td><td></td><td></td></tr>';
		echo '<tr><td class="header">ID</td><td class="header">Nome</td><td></td></tr>';
		while($produto=mysql_fetch_array($produtos)){
			
			echo '<tr>';
			echo '<td>'.$produto['id'].'</td>';
			echo '<td>'.$produto['nome'].'</td>';
			echo '<td><a href="main.php?url='.$this->tabela.'&acao=formeditar&id='.$produto['id'].'">Editar</a></td>';
			//echo '<td><a href="main.php?url='.$this->tabela.'&acao=deletar&id='.$produto['id'].'">Excluir</a></td>';
			echo '</tr>';
		}
		echo '</table>';
	}
	
	function Entrada($produto,$quantidade){
		
		$dados=$_POST;
		foreach ($dados as $campo=>$valor){
		if($campo=='data'){
			$valor="NOW()";	
		}
			$campos.=$campo."='$valor' ,";			
		}
		
			//"de para" com nomes das tabelas
		switch($this->tabela) {
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
		
		$campos=strip_tags($campos);
		$campos=substr($campos,0,-2);
		$campos=str_replace("'NOW()'","NOW()",$campos);
		$id=mysql_insert_id($this->conexaoDB->ExecutaQuery("Insert into srs_input SET $campos"));
		$this->conexaoDB->ExecutaQuery("Update $newtable set estoque_atual=estoque_atual+$quantidade where id=$produto");
		header("Location:main.php");
				
		
	}
	
	function Saida($produto,$quantidade){
		
		if($this->quantidadeatual<$quantidade){
		echo 'A quantidade a Ser Retirada é maior do que a existente no estoque';
		exit();
		}
		else
		{
		$dados=$_POST;
		foreach ($dados as $campo=>$valor){
			if($campo=='data'){
			$valor="NOW()";	
		}	
			$campos.=$campo."='$valor' ,";			
		}
		
			//"de para" com nomes das tabelas
		switch($this->tabela) {
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
		
		$campos=strip_tags($campos);
		$campos=substr($campos,0,-2);
		$campos=str_replace("'NOW()'","NOW()",$campos);
		$id=mysql_insert_id($this->conexaoDB->ExecutaQuery("Insert into srs_output SET $campos"));
		$this->conexaoDB->ExecutaQuery("Update $newtable set estoque_atual=estoque_atual-$quantidade where id=$produto");
		}
		header("Location:main.php");
	}
	
	function EstoqueMinimo(){
	
		//"de para" com nomes das tabelas
		switch($this->tabela) {
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
	
	$sql="Select nome from $newtable where estoque_atual<=estoque_minimo";	
		
	$produtos=$this->conexaoDB->ExecutaQuery($sql);
	$nlinhas=$this->conexaoDB->Nlinhas($produtos);
		
	if($nlinhas>0){
		echo '<img src="img/alert.png"><br />';	
	    while($produto=mysql_fetch_array($produtos)) {

		   echo '<big><b><span style="color:red;">'.$produto['nome']." chegou ao estoque mínimo</span></b></big><br>";
	}
		
	}
	else {
		echo '<img src="img/ok.png" class="img">';
		echo 'Nenhum alerta para hoje';
	}
	}
}

?>