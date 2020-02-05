<?php
	include('../services/glo_tb_atendimento.php');
	$glo_tb_atendimento = new glo_tb_atendimento();
			
	$Rs = $glo_tb_atendimento->buscaHisticoSenhaChamada();
	
	if(is_array($Rs)){
		$NRows = count($Rs);

		for($i=0; $i<$NRows; $i++){
			$ArrResult = '<tr class="odd gradeX">';
			$ArrResult.= '<td><h1 style="font-size:40px">'.$Rs[$i]['at_st_senha'].' - '.$Rs[$i]['at_dt_chamada'].'</h1></td>';
			$ArrResult.= '<td><h1 style="font-size:40px">'.$Rs[$i]['gui_st_desc'].'</h1></td>';
			$ArrResult.= '</tr>';
			echo $ArrResult;   
		}
	}
	
?>
                    
                