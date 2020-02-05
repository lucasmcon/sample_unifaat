<?php 
    if(!isset($_SESSION)){
        @session_start();    
    }
    if(!isset($_SESSION['login']) || $_SESSION['user_st_tipo'] == 'u'){
        session_destroy();
        header("Location: index.php"); exit;
    }

    include('../services/cad_tb_user.php');
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
                        <h3 class="page-header">Cadastro de Setores</h3>
                        <button class="btn btn-primary" onclick="window.location.href='cad_setor.php'"><i class="fa fa-plus"></i> Novo</button>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <br>
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">
                                <strong>Setores cadastrados</strong>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Cód.</th>
                                                <th>Descrição</th>
                                                <th>Prefixo de senha</th>
                                                <th>Data Cad.</th>
                                                <th>Data Edit.</th>
                                                <th>Situação</th>
                                                <th colspan="2">Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $cad_tb_user = new cad_tb_user();
                                                $Rs = $cad_tb_user->buscaSetores();
                                                
                                                if($Rs != ''){
                                                    $rowsRs = count($Rs);
                                                    
                                                    for($i=0; $i<$rowsRs; $i++){
    
                                                        //$set_in_status = $Rs[$i]['set_in_status'] == 1 ? array('Ativo', 'success') : array('Inativo', 'danger');

                                                        if($Rs[$i]['set_in_status'] == 1){
                                                            $set_in_status = array('Ativo', 'success');
                                                        }else if($Rs[$i]['set_in_status'] == 2){
                                                            $set_in_status = array('Ativo - Transferência', 'warning');
                                                        }else{
                                                            $set_in_status = array('Inativo', 'danger');
                                                        }


                                                        $tableContent ='<tr>';
                                                        $tableContent.= '<td>'.$Rs[$i]['set_in_id'].'</td>';
                                                        $tableContent.= '<td>'.$Rs[$i]['set_st_desc'].'</td>';
                                                        $tableContent.= '<td>'.$Rs[$i]['set_st_prefixo'].'</td>';
                                                        $tableContent.= '<td>'.$Rs[$i]['set_dt_cad'].'</td>';
                                                        $tableContent.= '<td>'.$Rs[$i]['set_dt_edit'].'</td>';
                                                        $tableContent.= '<td class="'.$set_in_status[1].'">'.$set_in_status[0].'</td>';
                                                        $tableContent.= '<td><a href="setor_edit.php?set_in_id='.$Rs[$i]['set_in_id'].'"><i class="fa fa-edit"></i> Editar</a></td>';
                                                        $tableContent.= '<td><a href="../services/delete_setor.php?set_in_id='.$Rs[$i]['set_in_id'].'"><i class="fa fa-trash-o"></i> Excluir</a></td>';
                                                        $tableContent.= '</tr>';

                                                        echo $tableContent;
                                                    }
                                                }else{
                                                    $tableContent = '<tr><td colspan="8">Nenhum resultado encontrado.</td></tr>';
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
    <?php include('../etc/footer.php'); ?>
</body>

</html>
