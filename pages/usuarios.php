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
                        <h3 class="page-header">Cadastro de Usuários</h3>
                        <button class="btn btn-primary" onclick="window.location.href='cad_usuario.php'"><i class="fa fa-plus"></i> Novo</button>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <br>
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">
                                <strong>Usuários cadastrados</strong>
                                <div class="panel-heading">
                                    <input type="text>" class="form-control" placeholder="Filtrar por Nome..." onkeyup="filtraUsuario()" id="inputBusca">
                                </div>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="tableUsuarios" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Cód.</th>
                                                <th>Nome</th>
                                                <th>Login</th>
                                                <th>Data Cad.</th>
                                                <th>Data Edit.</th>
                                                <th>Guiche</th>
                                                
                                                <th>Situação</th>
                                                <th colspan="2">Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $cad_tb_user = new cad_tb_user();
                                                $Rs = $cad_tb_user->buscaUsuarios();
                                                $rowsRs = count($Rs);

                                                for($i=0; $i<$rowsRs; $i++){

                                                    $user_st_tipo = $Rs[$i]['user_st_tipo'] == 'a' ? 'info' : '';
                                                    $user_in_status = $Rs[$i]['user_in_status'] == 1 ? array('Ativo', 'success') : array('Inativo', 'danger');

                                                    $tableContent ='<tr>';
                                                    $tableContent.= '<td>'.$Rs[$i]['user_in_id'].'</td>';
                                                    $tableContent.= '<td class="'.$user_st_tipo.'">'.$Rs[$i]['user_st_nome'].'</td>';
                                                    $tableContent.= '<td>'.$Rs[$i]['user_st_login'].'</td>';
                                                    $tableContent.= '<td>'.$Rs[$i]['user_dt_cad'].'</td>';
                                                    $tableContent.= '<td>'.$Rs[$i]['user_dt_edit'].'</td>';
                                                    $tableContent.= '<td>'.$Rs[$i]['gui_st_desc'].'</td>';
                                                    
                                                    $tableContent.= '<td class="'.$user_in_status[1].'">'.$user_in_status[0].'</td>';
                                                    $tableContent.= '<td><a href="usuario_edit.php?user_in_id='.$Rs[$i]['user_in_id'].'"><i class="fa fa-edit"></i> Editar</a></td>';
                                                    $tableContent.= '<td><a href="../services/delete_user.php?user_in_id='.$Rs[$i]['user_in_id'].'"><i class="fa fa-trash-o"></i> Excluir</a></td>';
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
                    <!-- /.col-lg-6 -->
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
