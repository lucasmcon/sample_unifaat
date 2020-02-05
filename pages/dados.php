<?php 
    if(!isset($_SESSION)){
        @session_start();    
    }
    if(!isset($_SESSION['login'])){
        session_destroy();
        header("Location: index.php"); exit;
    }

    include('../services/cad_tb_user.php');

    $user_in_id = $_SESSION['user_in_id'];
    $cad_tb_user = new cad_tb_user();
    
    $Rs = $cad_tb_user->listaSetores();
    $rowsRs = count($Rs);

    $Rs_2 = $cad_tb_user->buscaUsuario($user_in_id);
    $qtdUser = count($Rs_2);

    $Rs_3 = $cad_tb_user->buscaGuichesAtivos();
    $rowsRs_3 = count($Rs_3);

    $situacao = $Rs_2[0]['user_in_status'] == 1 ? 'Ativo' : 'Inativo';
    //$tipo = $Rs_2[0]['user_st_tipo'] == 'a' ? 'Administrador' : 'Atendente';
    switch($Rs_2[0]['user_st_tipo']){
        case 'a':
            $tipo = 'Administrador';
            break;
        case 's':
            $tipo = 'Supervisor';
            break;
        case 'u':
            $tipo = 'Atendente';
        break;
    }

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php 
        include('../etc/header.php'); 
        include('../services/modal.php');
    ?>
</head>
<body>
    <div id="wrapper">
        <?php include('../etc/side_menu.php'); ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><button class="btn btn-primary" onclick="window.location.href='main.php'"><i class="fa fa-arrow-left"></i> Voltar</button> Meus dados</h3>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">
                                <strong>Alteração de senha</strong>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form action="../services/edit_meus_dados.php" method="post" role="form">
                                            <div class="form-group">
                                                <label>Cód. Usuário</label>
                                                <input class="form-control" name="user_in_id" readonly="yes" value="<?php echo $user_in_id; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Nome completo:</label>
                                                <input class="form-control" name="user_st_nome" readonly="yes" value="<?php echo $Rs_2[0]['user_st_nome'];?>"required>
                                            </div>
                                            <div class="form-group">
                                                <label>Login:</label>
                                                <input class="form-control" name="user_st_login" readonly="yes" value="<?php echo $Rs_2[0]['user_st_login'];?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                        <input type="checkbox" id="altSenha" value=""> Alterar senha
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label>Nova senha:</label>
                                                <input class="form-control" readonly="yes" type="password" name="user_st_senha" id="user_st_senha">
                                            </div>
                                            <div class="form-group">
                                                <label>Confirmar senha:</label>
                                                <input class="form-control" readonly="yes" type="password" name="user_confirma_senha" id="user_confirma_senha">
                                            </div>

                                            <button type="submit" id="btSalvar" class="btn btn-primary">Salvar alterações</button>  
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Setores atribuídos:</label>
                                                <input class="form-control" name="set_st_desc" readonly="yes" value="<?php
                                                    //echo $Rs_2[0]['set_st_desc'];
                                                    for($i=0; $i<$qtdUser; $i++){
                                                        $setores = $Rs_2[$i]['set_st_desc'].'; ';
                                                        echo $setores;
                                                    }
                                                ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Tipo:</label>
                                                <input class="form-control" readonly="yes" value="<?php echo $tipo; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Guichê atual:</label>
                                                <input class="form-control" name="user_in_status" readonly="yes" value="<?php echo $Rs_2[0]['gui_st_desc']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    <input type="checkbox" id="altGuiche" value=""> Alterar guichê
                                                </label>
                                                <select disabled required class="form-control" id="alt_guiche" name="alt_guiche">
                                                    <option value="">Selecione...</option> 
                                                    <?php
                                                        
                                                        for($i=0; $i<$rowsRs_3; $i++){
                                                            $selectContent = '<option>'.$Rs_3[$i]['gui_in_id'].' - '.$Rs_3[$i]['gui_st_desc'].'</option>';
                                                            echo $selectContent;
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Situação</label>
                                                <input class="form-control" name="user_in_status" readonly="yes" value="<?php echo $situacao; ?>">
                                            </div>
                                        </form>
                                        
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                </div>
                                <!-- /.row (nested) -->
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
    <script src="../js/password_confirm.js"></script>
    <?php include('../etc/footer.php'); ?>
</body>

</html>
