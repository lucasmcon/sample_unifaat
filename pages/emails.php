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
                        <h3 class="page-header">Cadastro de e-mails automáticos</h3>
                        <button class="btn btn-primary" onclick="window.location.href='cad_email.php'"><i class="fa fa-plus"></i> Novo</button>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <br>
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">
                                <strong>Conta cadastrada</strong>

                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="tableUsuarios" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Descrição</th>
                                                <th>E-mail</th>
                                                <th>Data Cad.</th>
                                                <th>Cadastrado por</th>
                                                <th>Data Edit.</th>
                                                <th>Editado por</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $cad_tb_user = new cad_tb_user;
                                                $Rs = $cad_tb_user->buscaEmailCadastrado();
                                                $rowsRs = count($Rs);

                                                for($i=0; $i<$rowsRs; $i++){
                                                    $tableContent = '<tr>';
                                                    $tableContent.= '<td>'.$Rs[$i]['con_st_desc'].'</td>';
                                                    $tableContent.= '<td>'.$Rs[$i]['con_st_email'].'</td>';
                                                    $tableContent.= '<td>'.$Rs[$i]['con_dt_cad'].'</td>';
                                                    $tableContent.= '<td>'.$Rs[$i]['user_st_cad'].'</td>';
                                                    $tableContent.= '<td>'.$Rs[$i]['con_dt_edit'].'</td>';
                                                    $tableContent.= '<td>'.$Rs[$i]['user_st_edit'].'</td>';
                                                    $tableContent.= '<td><a href="email_edit.php?con_in_id='.$Rs[$i]['con_in_id'].'"><i class="fa fa-edit"></i> Editar</a></td>';
                                                    $tableContent.= '</tr>';

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
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <br>
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">
                                <strong>Mensagens cadastradas</strong>

                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="tableUsuarios" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Descrição</th>
                                                <th>E-mail</th>
                                                <th>Data Cad.</th>
                                                <th>Cadastrado por</th>
                                                <th>Data Edit.</th>
                                                <th>Editado por</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $cad_tb_user = new cad_tb_user;
                                                $Rs = $cad_tb_user->buscaEmailCadastrado();
                                                $rowsRs = count($Rs);

                                                for($i=0; $i<$rowsRs; $i++){
                                                    $tableContent = '<tr>';
                                                    $tableContent.= '<td>'.$Rs[$i]['con_st_desc'].'</td>';
                                                    $tableContent.= '<td>'.$Rs[$i]['con_st_email'].'</td>';
                                                    $tableContent.= '<td>'.$Rs[$i]['con_dt_cad'].'</td>';
                                                    $tableContent.= '<td>'.$Rs[$i]['user_st_cad'].'</td>';
                                                    $tableContent.= '<td>'.$Rs[$i]['con_dt_edit'].'</td>';
                                                    $tableContent.= '<td>'.$Rs[$i]['user_st_edit'].'</td>';
                                                    $tableContent.= '<td><a href="email_edit.php?con_in_id='.$Rs[$i]['con_in_id'].'"><i class="fa fa-edit"></i> Editar</a></td>';
                                                    $tableContent.= '</tr>';

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
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <script src="../js/usuarios.js"></script>
    <?php include('../etc/footer.php'); ?>
</body>

</html>
