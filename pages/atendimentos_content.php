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

    $glo_tb_atendimento = new glo_tb_atendimento();
    
    $Rs = $glo_tb_atendimento->buscaAtendimentos($_SESSION['user_in_id'], $_SESSION['user_st_tipo']);
    
    if($Rs != ''){                                                    
        $rowsRs = count($Rs);
        
        for($i=0; $i<$rowsRs; $i++){
            
            $current_date = date_create(date('Y-m-d H:i:s', time()));
            $dt_cad = date_create($Rs[$i]['at_dt_cad_diff']);

            if($Rs[$i]['at_in_status'] == 2){
                $dt_chamada = date_create($Rs[$i]['at_dt_chamada_diff']);
                $interval = date_diff($dt_cad, $dt_chamada)->format("%H:%I:%S");
                $status = array('Em andamento', 'info');
            }else if($Rs[$i]['at_in_status'] == 1){
                $interval = date_diff($current_date, $dt_cad)->format("%H:%I:%S");
                $status = array('Pendente', 'warning');
            }else{
                $dt_chamada = date_create($Rs[$i]['at_dt_chamada_diff']);
                $interval = date_diff($dt_cad, $dt_chamada)->format("%H:%I:%S");
                $status = array('Transferido', 'danger');
            }

            $td = $Rs[$i]['at_in_prioridade'] == 1 ? '<td class="danger"><i class="fa fa-wheelchair"></i>' : '<td>';

            $set_in_id = $Rs[$i]['set_in_id'];
            $set_in_transf = $Rs[$i]['set_in_transf'];

            $arrSetor = $glo_tb_atendimento->buscaSetoresUser($_SESSION['user_in_id']);

            if($set_in_id != $set_in_transf && $set_in_transf != '' && !in_array($set_in_transf, $arrSetor)){
                $teste = ' -- ';
                $acao = '<td> -- </td>';
            }else{
                $teste = 'VISUALIZAR';
                $acao = '<td><a href="atendimento_detalhado.php?at_in_id='.$Rs[$i]['at_in_id'].'"><i class="fa fa-eye"></i> Visualizar</a>'; 
                //$acao = '<td><button class="btn btn-primary" onclick="window.location.href=\'atendimento_detalhado.php?at_in_id='.$Rs[$i]['at_in_id'].'\'"><i class="fa fa-eye"></i> Novo</button></td>';
                
            }

            $tableContent = '<tr>';
            $tableContent.= $td.' '.$Rs[$i]['at_st_senha'].'</td>';
            $tableContent.= '<td id="dtCad">'.$Rs[$i]['at_dt_cad'].'</td>';
            $tableContent.= '<td>'.$interval.'</td>';
            $tableContent.= '<td>'.$Rs[$i]['set_st_desc'].'</td>';
            $tableContent.= '<td>'.$Rs[$i]['sol_st_documento'].'</td>';
            $tableContent.= '<td>'.$Rs[$i]['at_st_atendente'].'</td>';
            $tableContent.= '<td class="'.$status[1].'">'.$status[0].'</td>';
            $tableContent.= $acao;

            echo $tableContent;
        }
    }else{
        $tableContent = '<tr><td colspan="8">Nenhum resultado encontrado.</td></tr>';
        echo $tableContent;
    }
?>
