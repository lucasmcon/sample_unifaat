<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST'){
    session_destroy();
    header("Location: ../pages/index.php"); exit;
}else{
    include('glo_tb_atendimento.php');
    
    if($_POST['set_st_desc'] == ''){
        $set_in_id = '';
    }else{
        $arrSet = explode(' - ', $_POST['set_st_desc']);
        $set_in_id = $arrSet[0];
    }

    if($_POST['user_st_nome'] == ''){
        $user_in_id = '';
    }else{
        $arrUser = explode(' - ', $_POST['user_st_nome']);
        $user_in_id = $arrUser[0];
    }

    
    $dt_inicial = $_POST['dt_inicial'];
    $dt_final = $_POST['dt_final'];

    $glo_tb_atendimento = new glo_tb_atendimento;    
    $Rs = $glo_tb_atendimento->buscaAtendimentosFinalizadosComFiltros($set_in_id, $user_in_id, $dt_inicial, $dt_final);
        
    if($Rs == ""){
        $ArrResult = '<tr class="odd gradeX">';
        $ArrResult.= '<td>Nenhum resultado encontrado.</td>';
        $ArrResult.= '<td> -- </td>';
        $ArrResult.= '</tr>';
        echo $ArrResult;
            
    }else{
        $NRows = count($Rs);
        for($i=0; $i<$NRows;$i++){

            $situacao = $Rs[$i]['at_in_status'] == 3 ? array('Finalizado', 'success') : array('Não compareceu', 'warning');
            $solicitante = $Rs[$i]['at_st_tipo'] == 'e' ? $Rs[$i]['sol_st_documento'] : $Rs[$i]['sol_st_nome'];
            $dt_cad = date_create($Rs[$i]['at_dt_cad_diff']);
            $dt_chamada = date_create($Rs[$i]['at_dt_chamada_diff']);
            $dt_fin = date_create($Rs[$i]['at_dt_fin_diff']);
            
            $tempoEspera = date_diff($dt_cad, $dt_chamada)->format("%H:%I:%S");
            $tempoAtendimento = date_diff($dt_chamada, $dt_fin)->format("%H:%I:%S");
            $tempoTotal = date_diff($dt_cad, $dt_fin)->format("%H:%I:%S");

            $set_st_desc = $Rs[$i]['set_st_transf'] == ' -- ' ? $Rs[$i]['set_st_desc'] : $Rs[$i]['set_st_transf'];

            $tableContent = '<tr>';
            $tableContent.= '<td>'.$Rs[$i]['at_st_senha'].'</td>';
            $tableContent.= '<td class="'.$situacao[1].'">'.$situacao[0].'</td>';
            $tableContent.= '<td>'.$solicitante.'</td>';
            $tableContent.= '<td>'.$Rs[$i]['at_dt_cad'].'</td>';
            $tableContent.= '<td>'.$tempoEspera.'</td>';
            $tableContent.= '<td>'.$tempoAtendimento.'</td>';
            $tableContent.= '<td>'.$tempoTotal.'</td>';
            $tableContent.= '<td>'.$set_st_desc.'</td>';
            $tableContent.= '<td>'.$Rs[$i]['at_st_atendente'].'</td>';
            $tableContent.= '<td>'.$Rs[$i]['at_st_obs'].'</td>';
            $tableContent.= '</tr>';
            echo $tableContent;    
        }    
    }
}
?>
