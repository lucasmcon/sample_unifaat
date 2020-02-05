<?php 
    if(!isset($_SESSION)){
        @session_start();    
    }
    if(!isset($_SESSION['login'])){
        session_destroy();
        header("Location: index.php"); exit;
    }

    include('../services/cad_tb_user.php');

    $cad_tb_setor = new cad_tb_user();
    $Rs = $cad_tb_setor->listaSetores();
    $rowsRs = count($Rs);

    $Rs_2 = $cad_tb_setor->buscaGuiches();
    $rowsRs_2 = count($Rs_2);

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
                        <h3 class="page-header"><button class="btn btn-primary" onclick="window.location.href='usuarios.php'"><i class="fa fa-arrow-left"></i> Voltar</button> Novo usuário</h3>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <strong>Formulário de cadastro</strong>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form action="../services/add_user.php" method="post" role="form">
                                            <div class="form-group">
                                                <label>Nome completo:</label>
                                                <input class="form-control" name="user_st_nome" placeholder="Ex: João Silva" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Login (e-mail):</label>
                                                <input class="form-control" type="email" name="user_st_login" placeholder="Ex: joao.silva@unifaat.edu.br" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Senha:</label>
                                                <input class="form-control" type="password" name="user_st_senha" id="user_st_senha" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Confirmar senha:</label>
                                                <input class="form-control" type="password" name="user_confirma_senha" id="user_confirma_senha">
                                            </div>

                                            <button type="submit" id="btSalvar" class="btn btn-success">Salvar</button>  
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Situação:</label>
                                                <select required class="form-control" name="user_in_status">   
                                                    <option value="">Selecione...</option>
                                                    <option>Ativo</option>
                                                    <option>Inativo</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Tipo de usuário:</label>
                                                <select required class="form-control" name="user_st_tipo">
                                                    <option value="">Selecione...</option> 
                                                    <option>Administrador</option>
                                                    <option>Atendente</option>
                                                    <option>Supervisor</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Guichê:</label>
                                                <select required class="form-control" name="gui_in_id">
                                                    <option value="">Selecione...</option> 
                                                    <?php
                                                        for($i=0; $i<$rowsRs_2; $i++){
                                                            $selectContent = '<option>'.$Rs_2[$i]['gui_in_id'].' - '.$Rs_2[$i]['gui_st_desc'].'</option>';
                                                            echo $selectContent;
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Selecione os Setores:</label>                                                
                                                <?php
                                                    for($i=0; $i<$rowsRs; $i++){
                                                        $checkboxSetor = '<div class="checkbox">';
                                                        $checkboxSetor.= '<label>';
                                                        $checkboxSetor.= '<input type="checkbox" name="setorCheckBox[]" value="'.$Rs[$i]['set_in_id'].'">'.$Rs[$i]['set_in_id'].' - '.$Rs[$i]['set_st_desc'];
                                                        $checkboxSetor.= '</label>';
                                                        $checkboxSetor.= '</div>';
                                                        echo $checkboxSetor;
                                                    }
                                                ?>

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
