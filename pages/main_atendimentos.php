<div class="col-xs-9 text-right">
    <?php 
		if(!isset($_SESSION)){
			@session_start();    
		}
		if(!isset($_SESSION['login'])){
			session_destroy();
			header("Location: index.php"); exit;
		}	
        include('../services/glo_tb_atendimento.php');
		$glo_tb_atendimento = new glo_tb_atendimento();
		$i = 0;		
		
		$Total = $glo_tb_atendimento->contAtendAbertos($_SESSION['user_in_id'], $_SESSION['user_st_tipo']);  
        echo '<div id="contNovo" class="huge">'.$Total[$i]['at_in_id'].'</div>'; 
    ?>
    <div>Novos Atendimentos</div>
</div>
                    
                