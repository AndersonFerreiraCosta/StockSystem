<?php
/* Tratando erros qualquer duvida consulte link http://www.rafaelbiriba.com/2009/02/27/php-ocultando-erros-de-codigo.html*/
error_reporting(0);
ini_set(“display_errors”, 0 );
?>
<?php


class Form {
	
	public $table;
	public $conexaoDB;
	public $fields;
	
	
	function __construct($table){
		
		$this->table=$table;
		$this->conexaoDB=new DB();
		$this->fields=$this->conexaoDB->ListarCampos($this->table);
		
		
	}
	
	function FormCadastro($url,$action,$combos="",$ajax=array()){
		
		//$form->FormCadastro('produto','entrada','categoria,produto,fornecedor',
	    //array('remetentecategoria'=>'categoria','destinatariocategoria'=>'produto','tabelacategoria'=>'produto');
		
		$url=(empty($url))?$this->table:$url;
		$campos=substr($this->fields,0,-1);
		$campos=explode(',',$campos);
		$combos=explode(',',$combos);
		
		//print_r($ajax).'<br>';
		
		echo '<h1>Cadastro de '.$this->table.'</h1>';
		echo '<form action="main.php?url='.$url.'&acao='.$action.'" method="post">'; 
		echo '<table>';
		foreach ($campos as $campo) {
			
		
			$valor=($campo=='data')?date('d/m/Y'):'';
			if($campo<>'id' and $campo<>'estoque_atual' and $campo<>'estoque_minimo'){
			
				//'<br>'.$campo.'<br>'; print_r($combos).'<br>';echo '<br>'; print_r($ajax).'<br>';

				if(array_search($campo,$combos)==FALSE){
					//echo $url;
					
					if($campo!='categoria'){
					
						if($campo <> 'obs'){
							$campo=str_replace("_"," ",$campo);
							echo '<tr><td>'.ucfirst($campo)."</td><td><input type='text' name='$campo' value='$valor' aria-required='true' required='' class='required'></td></tr> \n";	
						}else{
							$campo=str_replace("_"," ",$campo);
							echo '<tr><td>'.ucfirst($campo)."</td><td><input type='text' name='$campo' value='$valor'></td></tr> \n";	
						}
					} else {
						$js="";
						
						echo '<tr><td>'.ucfirst($campo).'</td><td>';
						$this->Combo($campo,$campo,'id','nome',$js);
						echo '</td></tr>';
					}
				}
				else {
					if(array_search($campo,$ajax)==FALSE)
					{
						$js="";
					} else {
						if($campo=='produto'){
							$js="";
						}else{
							$js='onChange=\'Ajax("'.$ajax['remetente'.$campo].'","'.$ajax['destinatario'.$campo].'","'.$ajax['tabela'.$campo].'")\'';
						}
					}
					echo '<tr><td>'.ucfirst($campo).'</td><td>';
					$this->Combo($campo,$campo,'id','nome',$js);
					echo '</td></tr>';
						
					
				}
			}
		}
		echo '<tr><td><input type="submit" value="Enviar"></td></tr>';
		echo '</table>';	
		echo '</form>';	
	
	}
	
/*			 FormEditar("editar",$id,"categoria,''");*/
	function FormEditar($action,$id,$combos,$block="",$ajax=array()){
	
	
		$produto=$this->conexaoDB->PesquisaUnica($this->table,$id);	
		$combos=explode(',',$combos);
		$campos=substr($this->fields,0,-1);
		$campos=explode(',',$campos);
		
		echo '<h1>Atualização de '.$this->table.'</h1>';
		echo '<form action="main.php?url='.$this->table.'&acao='.$action.'&id='.$id.'" method="post">'; 
		echo '<table>';
		
		foreach ($campos as $campo) 
		{
			
			if($campo<>'id' and $campo<>'estoque_atual' and $campo<>'estoque_minimo')
			
			{
				if(array_search($campo,$combos)==FALSE)
				{
						if($campo == 'categoria' ){
							$js="";
						
							echo '<tr><td>'.ucfirst($campo).'</td><td>';
							$this->Combo($campo,$campo,'id','nome',$js);
							echo '</td></tr>';
						}else{
							$campotxt=str_replace("_"," ",$campo);
							echo '<tr><td>'.ucfirst($campotxt)."</td><td><input type='text' name='$campo' value='$produto[$campo]'></td></tr>";
						}
				} else {
					
						if(array_search($campo,$ajax)==FALSE)
						{
								
								$js="";
						} else {
								
								$js="onChange='Ajax(\"categoria\",\"produto\",\"produto\")'";
						}
						echo '<tr><td>'.ucfirst($campo).'</td><td>';
						$this->Combo($campo,$campo,'id','nome',$js,$produto[$campo]);
						echo '</td></tr>';
					
				}
			}
		}
		
		echo '<tr><td><input type="submit" value="Enviar"></td></tr>';
		echo '</table>';	
		echo '</form>';	
	}
	
	
	function Combo($tabela,$nome,$value,$option,$script,$where=""){
		
		if(!empty($where)){
			$values=$this->conexaoDB->PesquisaUnica($tabela,$where);
			$opt='<option value="'.$values[$value].'">'.$values[$option].'</option>';	
			
		}
		else{
			$opt='<option value="" selected="selected"></option>';
		}
		
		$values=$this->conexaoDB->PesquisaTabela($tabela,$where);
		
		echo '<select name="'.$nome.'" '.$script.' id="'.$nome.'" aria-required="true" required="" class="required">';
		echo $opt;	
		while($row=mysql_fetch_array($values)){
			
			echo '<option value="'.$row[$value].'">'.$row[$option].'</option>\n';
		}
		
		echo '</select>';
		
	}
	
	function ConverteDataInput($data){
		
		$novadata=split("[-,/,\]",$data);
		$novadata=$novadata[2]."-".$novadata[1]."-".$novadata[0];
		return $novadata;
	}
	

}

?>