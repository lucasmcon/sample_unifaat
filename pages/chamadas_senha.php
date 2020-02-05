<?php 
    include('../services/glo_tb_atendimento.php');
	$glo_tb_atendimento = new glo_tb_atendimento();
    $Rs = $glo_tb_atendimento->buscaUltimaSenhaChamada();
    echo '<h1 style="font-size:70px" id="senhaChamada">'.$Rs[0]['at_st_senha'].'</h1><div style="display:none;" id="tentativaChamada">'.$Rs[0]['at_in_tentativas'].'</div>';
?>
    
                    
