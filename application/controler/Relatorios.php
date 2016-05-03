<?php

class Relatorio extends Form   {
	
	
	

	public $conexaoDB;
	public $fieds;
	public $table;
	
	
	#Construtor - Conecta e seleciona a tabela
	function __construct($tabela) {
		$this->table=$tabela;
		$this->conexaoDB=new DB();
		$this->fields=$this->conexaoDB->ListarCampos($this->table);
	
	
	}
	
	
	
	function Visualizar($print="s") {
		
	
		$campos=substr($this->fields,0,-1);
		$campos=explode(',',$campos);
		echo '<h1>Relatório de '.$this->table.'</h1><br><br>';
		echo '<table><tr>';
		foreach ($campos as $campo) {
			$campo=str_replace("_"," ",$campo);
			echo '<td class="header">'.ucfirst($campo).'</td>';
			
		}
		echo '</tr>';
		$dados=$this->conexaoDB->PesquisaTabela($this->table);
		while($dado=mysql_fetch_object($dados)){
			
		echo '<tr>'	;
		
		foreach ($dado as $campo) {
			
			echo '<td>'.$campo.'</td>';
			
		}

		echo '</tr>';
			
		}
		
		echo '</table>';
		if($print=="n")
			echo '<br><a href="application/view/printrelatorio.php?acao=Visualizar&tabela='.$this->table.'"><img src="img/save.png" class="img">SALVAR PARA ARQUIVO</a>';
		else
			echo '<br><a href="#" onclick="window.print()">IMPRIMIR</a>';
		
		
	}
	
	
	function Entrada($datainicial, $datafinal,$print="s"){
		
		
		if(empty($datainicial) && empty($datafinal)){
			echo '<h1>Relatório de '.$this->table.'</h1><br><br>';	
			echo '<form action="main.php?url=relatorio&acao=entrada" method="post">';
			echo 'Data Inicial:	<input type="date" name="datainicial" /><br><br>';
			echo 'Data Final:	<input type="date" name="datafinal"/><br>';
			echo '<input type="Submit" value="Enviar" />';
			echo'</form>';
			
					
		}
		else{
			$datai =  $datainicial;
			$dataf =  $datafinal;
			$sql="Select date_format(e.data, '%d-%m-%Y - %H:%i') as data,  p.nome as produto, f.nome as fornecedor , e.quantidade, e.obs from srs_input e
			inner join srs_product p on e.produto=p.id
			left join srs_supplier f on f.id=e.fornecedor
			where date(e.data) between '$datai' and '$dataf'";
			
			echo '<h1>Relatório de '.$this->table.'</h1><br><br>';	
			echo '<table >';
			echo '<tr><td class="header" style="width:220px; padding:10px">Data / Hora</td><td class="header">Produto</td ><td class="header">Fornecedor</td><td class="header">Quantidade</td><td class="header">Observação</td></tr>';
			$dados=$this->conexaoDB->ExecutaQuery($sql);
			while($dado=mysql_fetch_object($dados)){
				
				echo '<tr>'	;
				
				foreach ($dado as $campo) {
					
					echo '<td style="padding:2px">'.$campo.'</td>';
					
				}
		
				echo '</tr>';
				
			}
			
			echo '</table>';
			if($print=="n")
				echo '<br><a href="application/view/printrelatorio.php?acao=Entrada&tabela='.$this->table.'&datainicial='.$datainicial.'&datafinal='.$datafinal.'"><img src="img/save.png" class="img">SALVAR PARA ARQUIVO</a>';
			else
				echo '<br><a href="#" onclick="window.print()">IMPRIMIR</a>';
		
			
		}
		
		
		
	}
	
function Saida($datainicial, $datafinal,$print="s"){
		
		
		if(empty($datainicial) && empty($datafinal)){
			echo '<h1>Relatório de '.$this->table.'</h1><br><br>';	
			echo '<form action="main.php?url=relatorio&acao=saida" method="post">';
			echo 'Data Inicial:	<input type="date" name="datainicial" /><br><br>';
			echo 'Data Final:	<input type="date" name="datafinal" /><br>';
			echo '<input type="Submit" value="Enviar" />';
			echo'</form>';
			
					
		}
		else{
			$datai= $datainicial;
			$dataf= $datafinal;
			$sql="Select date_format(s.data, '%d-%m-%Y - %H:%i') as data,  p.nome as produto, r.nome as retirante , s.quantidade, s.obs from srs_output s
			inner join srs_product p on s.produto=p.id
			left join srs_requester r on r.id=s.retirante
			where date(s.data) between '$datai' and '$dataf'";
			
			echo '<h1>Relatório de '.$this->table.'</h1><br><br>';	
			echo '<table >';
			echo '<tr><td class="header" style="width:220px; padding:10px">Data / Hora</td><td class="header">Produto</td ><td class="header">Retirante</td><td class="header">Quantidade</td><td class="header">Observação</td></tr>';
			$dados=$this->conexaoDB->ExecutaQuery($sql);
			while($dado=mysql_fetch_object($dados)){
				
				echo '<tr>'	;
				
				foreach ($dado as $campo) {
					
					echo '<td style="padding:2px">'.$campo.'</td>';
					
				}
		
				echo '</tr>';
				
			}
			
			echo '</table>';
			if($print=="n")
				echo '<br><a href="application/view/printrelatorio.php?acao=Entrada&tabela='.$this->table.'&datainicial='.$datainicial.'&datafinal='.$datafinal.'"><img src="img/save.png" class="img">SALVAR PARA ARQUIVO</a>';
			else
				echo '<br><a href="#" onclick="window.print()">IMPRIMIR</a>';
		
			
		}
		
		
		
	}
	
	
	
}

?>