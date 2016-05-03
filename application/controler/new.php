
<?php

$campo = 'produto';
$combos = array('','produto','remetente');
if(array_search($campo,$combos)==FALSE){
					
					$campo=str_replace("_"," ",$campo);
					
						echo '<tr><td>'.ucfirst($campo)."</td><td><input type='text' name='$campo' value=''></td></tr> \n";	
					
				}
?>