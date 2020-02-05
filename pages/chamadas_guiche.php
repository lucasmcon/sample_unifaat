<?php 
    include('../services/glo_tb_atendimento.php');
	$glo_tb_atendimento = new glo_tb_atendimento();
    $Rs = $glo_tb_atendimento->buscaUltimaSenhaChamada();
    echo '<h1 style="font-size:70px">'.$Rs[0]['gui_st_desc'].'</h1>';
?>
    

                    
                