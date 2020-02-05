<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST'){
    session_destroy();
    header("Location: ../pages/index.php"); exit;
}else{
    include('glo_tb_atendimento.php');
    $dt_inicial = $_POST['dt_inicial'];
    $dt_final = $_POST['dt_final'];

    $glo_tb_atendimento = new glo_tb_atendimento;    
    $Rs = $glo_tb_atendimento->relTotalAtendFinAtendenteV2($dt_inicial, $dt_final);
        
    if($Rs == ""){
        $ArrResult = '<tr class="odd gradeX">';
        $ArrResult.= '<td>Nenhum resultado encontrado.</td>';
        $ArrResult.= '<td> -- </td>';
        $ArrResult.= '</tr>';
        echo $ArrResult;
            
    }else{
        $NRows = count($Rs);
        
        for($i=0; $i<$NRows;$i++){
            
            $Rs_2 = $glo_tb_atendimento->buscaSetoresDescUser($Rs[$i]['at_in_atendente']);
           
            $atendente = $Rs[$i]['user_st_nome'];
            $ArrResult = '<tr class="odd gradeX">';
            $ArrResult.= '<td>'.$Rs[$i]['user_st_nome'].'</td>';
            $ArrResult.= '<td>'.$Rs[$i]['at_in_qtd'].'</td>';
            $ArrResult.= '<td>'.$Rs_2.'</td>';
            $ArrResult.= '</tr>';
            echo $ArrResult; 
        }
    }
}
?>
