<?php 
    if(!isset($_SESSION)){
        @session_start();    
    }
    if(!isset($_SESSION['login'])){
        session_destroy();
        header("Location: index.php"); exit;
    }

    include('../services/glo_tb_atendimento.php');

    date_default_timezone_set('America/Sao_Paulo'); 
    $i = 0; // indice do retorno, apenas estética, já que a consulta traz 1 linha.
    $at_in_id = $_GET['at_in_id'];
    $glo_tb_atendimento = new glo_tb_atendimento();
    $Rs = $glo_tb_atendimento->buscaAtendimentoDet($at_in_id);

	$current_date = date_create(date('Y-m-d H:i:s', time()));
    $dt_cad = date_create($Rs[$i]['at_dt_cad_diff']);
	
	
	if($Rs[$i]['at_in_status'] == 'Em andamento'){
			$dt_chamada = date_create($Rs[$i]['at_dt_chamada_diff']);
			$tempoEspera = date_diff($dt_cad, $dt_chamada)->format("%H:%I:%S");
	}else{
			$tempoEspera = date_diff($current_date, $dt_cad)->format("%H:%I:%S");
	}
   
    echo '<input class="form-control" name="at_dt_cad" readonly="yes" value="'.$tempoEspera.'">';
?>