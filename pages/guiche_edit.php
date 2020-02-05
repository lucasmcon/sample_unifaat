<?php 
    if(!isset($_SESSION)){
        @session_start();    
    }
    if(!isset($_SESSION['login'])){
        session_destroy();
        header("Location: index.php"); exit;
    }

    include('../services/cad_tb_user.php');

    $gui_in_id = $_GET['gui_in_id'];
    $gui_in_edit = $_SESSION['user_in_id'];
    $cad_tb_setor = new cad_tb_user();
    
    $Rs = $cad_tb_setor->buscaGuiche($gui_in_id);
    $situacao = $Rs[0]['gui_in_status'] == 1 ? 'Ativo' : 'Inativo';
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
                        <h3 class="page-header"><button class="btn btn-primary" onclick="window.location.href='guiches.php'"><i class="fa fa-arrow-left"></i> Voltar</button> Editar guichê</h3>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <strong>Dados do guichê</strong>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form action="../services/edit_guiche.php" method="post" role="form">
                                            <div class="form-group">
                                                <label>Cód. Guichê:</label>
                                                <input class="form-control" name="gui_in_id" readonly="yes" value="<?php echo $Rs[0]['gui_in_id']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Descrição:</label>
                                                <input class="form-control" name="gui_st_desc" value="<?php echo $Rs[0]['gui_st_desc']; ?>">
                                            </div>
                                            <button type="submit" id="btSalvar" class="btn btn-primary">Salvar alterações</button>  
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Situação</label>
                                                <input class="form-control" readonly="yes" value="<?php echo $situacao; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Editar situação:</label>
                                                <select required class="form-control" name="gui_in_status">   
                                                    <option value="">Selecione...</option>
                                                    <option>Ativo</option>
                                                    <option>Inativo</option>
                                                </select>
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
    <?php include('../etc/footer.php'); ?>
</body>

</html>
