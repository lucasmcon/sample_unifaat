<?php 
    if(!isset($_SESSION)){
        @session_start();    
    }
    if(!isset($_SESSION['login'])){
        session_destroy();
        header("Location: index.php"); exit;
    }
    include('../services/glo_tb_atendimento.php');

    $btPausar = '<button class="btn btn-primary"><i class="fa fa-pause"></i> Pausar atendimentos</button>';
    $brRetomar = '<button class="btn btn-primary"><i class="fa fa-play"></i> Retomar atendimentos</button>'
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include('../etc/header.php'); ?>
</head>
<body>
    <div id="wrapper">
        <?php include('../etc/side_menu.php'); ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">Meus atendimentos</h3>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <br>
                    <div class="col-lg-12">
                        <div class="panel panel-default">

                            <div class="panel-heading text-center">
                                <!--<button class="btn btn-primary"><i class="fa fa-pause"></i> Pausar atendimentos</button> -->
                                <!-- <strong>Histórico dos meus atendimentos</strong> -->
                                <div class="panel-heading">
                                    <input type="text>" class="form-control" placeholder="Filtrar por Solicitante..." onkeyup="buscaHistorico()" id="inputBusca">
                                </div>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <ul class="nav nav-pills">
                                    <li class="active"><a href="#pendentes" data-toggle="tab">Pendentes</a>
                                    </li>
                                    <li><a href="#finalizados" data-toggle="tab">Finalizados</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="pendentes">
                                        <div class="table-responsive">
                                            <table id="tableHistorico" class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Atendimento</th>
                                                        <th>Situação</th>
                                                        <th>Solicitante</th>
                                                        <th>Data</th>
                                                        <th>Setor</th>
                                                        <th>Ação</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $glo_tb_atendimento = new glo_tb_atendimento();
                                                        $Rs = $glo_tb_atendimento->buscaMeusAtendimentosPendentes($_SESSION['user_in_id'], $_SESSION['user_st_tipo']);
                                                        
                                                        if($Rs != ''){
                                                            $rowsRs = count($Rs);    
                                                            for($i=0; $i<$rowsRs; $i++){

                                                                $situacao = $Rs[$i]['at_in_status'] == 2 ? array('Em andamento', 'info') : array('Transferido', 'danger');
                                                                $solicitante = $Rs[$i]['at_st_tipo'] == 'e' ? $Rs[$i]['sol_st_documento'] : $Rs[$i]['sol_st_nome'];

                                                                $tableContent = '<tr>';
                                                                $tableContent.= '<td>'.$Rs[$i]['at_st_senha'].'</td>';
                                                                $tableContent.= '<td class="'.$situacao[1].'">'.$situacao[0].'</td>';
                                                                $tableContent.= '<td>'.$solicitante.'</td>';
                                                                $tableContent.= '<td>'.$Rs[$i]['at_dt_cad'].'</td>';
                                                                $tableContent.= '<td>'.$Rs[$i]['set_st_desc'].'</td>';
                                                                $tableContent.= '<td><a href="atendimento_detalhado.php?at_in_id='.$Rs[$i]['at_in_id'].'"><i class="fa fa-eye"></i> Visualizar</button>';

                                                                echo $tableContent;
                                                            }
                                                        }else{
                                                            $tableContent = '<tr><td colspan="7">Nenhum registro encontrado.</td></tr>';
                                                            echo $tableContent;
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.table-responsive -->
                                    </div>
                                    <div class="tab-pane fade" id="finalizados">
                                        <div class="table-responsive">
                                            <table id="tableHistorico" class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Atendimento</th>
                                                        <th>Situação</th>
                                                        <th>Solicitante</th>
                                                        <th>Data</th>
                                                        <th>Data Concl.</th>
                                                        <th>Setor</th>
                                                        <th>Obervação</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $glo_tb_atendimento = new glo_tb_atendimento();
                                                        $Rs = $glo_tb_atendimento->buscaMeusAtendimentosFinalizados($_SESSION['user_in_id'], $_SESSION['user_st_tipo']);
                                                        
                                                        if($Rs != ''){
                                                            $rowsRs = count($Rs);    
                                                            for($i=0; $i<$rowsRs; $i++){

                                                                $situacao = $Rs[$i]['at_in_status'] == 3 ? array('Finalizado', 'success') : array('Não compareceu', 'warning');
                                                                $solicitante = $Rs[$i]['at_st_tipo'] == 'e' ? $Rs[$i]['sol_st_documento'] : $Rs[$i]['sol_st_nome'];

                                                                $tableContent = '<tr>';
                                                                $tableContent.= '<td>'.$Rs[$i]['at_st_senha'].'</td>';
                                                                $tableContent.= '<td class="'.$situacao[1].'">'.$situacao[0].'</td>';
                                                                $tableContent.= '<td>'.$solicitante.'</td>';
                                                                $tableContent.= '<td>'.$Rs[$i]['at_dt_cad'].'</td>';
                                                                $tableContent.= '<td>'.$Rs[$i]['at_dt_fin'].'</td>';
                                                                $tableContent.= '<td>'.$Rs[$i]['set_st_desc'].'</td>';
                                                                $tableContent.= '<td>'.$Rs[$i]['at_st_obs'].'</td>';

                                                                echo $tableContent;
                                                            }
                                                        }else{
                                                            $tableContent = '<tr><td colspan="7">Nenhum registro encontrado.</td></tr>';
                                                            echo $tableContent;
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.table-responsive -->
                                    </div>
                                </div>
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
