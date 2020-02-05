<?php 
    include('../services/glo_tb_atendimento.php');
	$glo_tb_atendimento = new glo_tb_atendimento();
        
    $Rs = $glo_tb_atendimento->buscaUltimaSenhaChamada();
?>
    <h1 id="solicitanteChamada"><?php echo $Rs[0]['sol_st_nome']; ?></h1>
                    
                