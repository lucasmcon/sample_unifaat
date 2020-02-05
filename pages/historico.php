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
    $Rs = $glo_tb_atendimento->buscaAtendimentosFinalizados($_SESSION['user_in_id'], $_SESSION['user_st_tipo']);

    $Rs_2 = $glo_tb_atendimento->buscaSetoresAtend();
    $countRs_2 = count($Rs_2);

    $Rs_3 = $glo_tb_atendimento->buscaUsuariosAtivos();
    $countRs_3 = count($Rs_3);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include('../etc/header.php'); ?>
</head>
<body>
<script src="../js/dt_mask.js"></script>
    <div id="wrapper">
        <?php include('../etc/side_menu.php'); ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">Histórico</h3>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-2">
                        <label>Setor:</label>
                        <select required class="form-control" name="set_st_desc" id="set_st_desc"> 
                            <option value="">Selecione...</option> 
                            <?php
                                for($i=0; $i<$countRs_2; $i++){
                                    $selectContent = '<option>'.$Rs_2[$i]['set_in_id'].' - '.$Rs_2[$i]['set_st_desc'].'</option>';
                                    echo $selectContent;
                                }
                            ?>
                        </select>             
                    </div>
                    <!-- /.col-lg-4-->
                    <div class="col-lg-2">
                        <label>Atendente:</label>
                        <select required class="form-control" name="user_st_nome" id="user_st_nome"> 
                            <option value="">Selecione...</option> 
                            <?php
                                for($i=0; $i<$countRs_3; $i++){
                                    $selectContent = '<option>'.$Rs_3[$i]['user_in_id'].' - '.$Rs_3[$i]['user_st_nome'].'</option>';
                                    echo $selectContent;
                                }
                            ?>
                        </select>             
                    </div>
                    <!-- /.col-lg-4-->
                    <div class="col-lg-2">
                        <label for="dt_inicial">Data Inicial:</label> 
                        <input type="text>" class="form-control" placeholder="Ex: 01-01-2018" id="dt_inicial" name="dt_inicial">            
                    </div>
                    <!-- /.col-lg-4-->
                    <div class="col-lg-2">
                        <label for="dt_inicial">Data Final:</label> 
                        <input type="text>" class="form-control" placeholder="Ex: 01-01-2018" id="dt_final" name="dt_final">            
                    </div>
                    <!-- /.col-lg-4-->
                    <div style="margin-top:23px" class="col-lg-2">
                        <button type="button" id="btn_filtrar" name="btn_filtrar" class="btn btn-primary"><i class="fa fa-filter"></i> Filtrar</button>         
                    </div>
                    <!-- /.col-lg-4-->
                </div>
                <!-- /.row -->
                <div class="row">
                    <br>
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">
                                <strong>Histórico de atendimentos</strong>
                                <div class="panel-heading">
                                    <input type="text>" class="form-control" placeholder="Filtrar por Solicitante..." onkeyup="buscaHistorico()" id="inputBusca">
                                </div>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <?php

                                    ?>
                                    <table id="tableHistorico" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Atendimento</th>
                                                <th>Situação</th>
                                                <th>Solicitante</th>
                                                <th>Data</th>
                                                <th>Espera</th>
                                                <th>Atendimento</th>
                                                <th>Total</th>
                                                <th>Setor</th>
                                                <th>Atendente</th>
                                                <th>Obervação</th>
                                            </tr>
                                        </thead>
                                        <tbody id="filtroHistorico">
                                            <?php
                                                
                                                if($Rs != ''){
                                                    $rowsRs = count($Rs);    
                                                    for($i=0; $i<$rowsRs; $i++){

                                                        $situacao = $Rs[$i]['at_in_status'] == 3 ? array('Finalizado', 'success') : array('Não compareceu', 'warning');
                                                        $solicitante = $Rs[$i]['at_st_tipo'] == 'e' ? $Rs[$i]['sol_st_documento'] : $Rs[$i]['sol_st_nome'];

                                                        $dt_cad = date_create($Rs[$i]['at_dt_cad_diff']);
                                                        $dt_chamada = date_create($Rs[$i]['at_dt_chamada_diff']);
                                                        $dt_fin = date_create($Rs[$i]['at_dt_fin_diff']);
                                                        
                                                        $tempoEspera = date_diff($dt_cad, $dt_chamada)->format("%H:%I:%S");
                                                        $tempoAtendimento = date_diff($dt_chamada, $dt_fin)->format("%H:%I:%S");
                                                        $tempoTotal = date_diff($dt_cad, $dt_fin)->format("%H:%I:%S");

                                                        //$tempoEspera = $Rs[$i]['at_in_status'] == 'Não atribuída' ? $interval->format("%H:%I:%S") : ' -- ';

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
                                                }else{
                                                    $tableContent = '<tr><td colspan="6"></td></tr>';
                                                    echo $tableContent;
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <script src="../js/historico.js"></script>
    <?php include('../etc/footer.php'); ?>
</body>

</html>
