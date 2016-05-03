	function Ajax(remetente,destinatario,tabela){
		
	 
      $('select[@name='+destinatario+']').html('<option value="sda">Aguarde....</option>');
   // alert('enviando'+document.getElementById(remetente).value);
      
        $.ajax({
        	type: 'POST',
        	url: 'application/model/Ajax.php?tabela='+tabela+'&remetente='+remetente,
        	data: 'where='+document.getElementById(remetente).value,
        	//beforeSend: function(){ alert('enviando'+remetente);},
        	success: 
        		function(resposta){  
        			$('select[@name='+destinatario+']').html(resposta);
   
        				}
  
       
  
        } );
  
      
		
	}

