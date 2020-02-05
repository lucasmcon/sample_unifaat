<?php
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        session_destroy();
        header("Location: ../pages/index.php"); exit;
    }else{
        
        include('glo_tb_atendimento.php');
        $dt_inicial = $_POST['dt_inicial'];
        $dt_final = $_POST['dt_final'];

        $glo_tb_atendimento = new glo_tb_atendimento;    
        $Rs = $glo_tb_atendimento->relTotalAtendFinSetor($dt_inicial, $dt_final);
            
        if($Rs == ""){
            $ArrResult = '<tr class="odd gradeX">';
            $ArrResult.= '<td>Nenhum resultado encontrado.</td>';
            $ArrResult.= '<td> -- </td>';
            $ArrResult.= '</tr>';
            echo $ArrResult;
                
        }else{
            $NRows = count($Rs);
            for($i=0; $i<$NRows;$i++){
                $ArrResult = '<tr class="odd gradeX">';
                $ArrResult.= '<td>'.$Rs[$i]['set_st_desc'].'</td>';
                $ArrResult.= '<td>'.$Rs[$i]['at_qtd'].'</td>';
                $ArrResult.= '</tr>';
                echo $ArrResult;    
            }    
        }
    }
?>
