<?php 
    if(!isset($_SESSION)){
        @session_start();    
    }
    if(!isset($_SESSION['login'])){
        session_destroy();
        header("Location: index.php"); exit;
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
<script src="../js/prefixo_mask.js"></script>
    <div id="wrapper">
        <?php include('../etc/side_menu.php'); ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><button class="btn btn-primary" onclick="window.location.href='guiches.php'"><i class="fa fa-arrow-left"></i> Voltar</button> Novo guichê</h3>
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
                                        <form action="../services/add_guiche.php" method="post" role="form">
                                            <div class="form-group">
                                                <label>Descrição:</label>
                                                <input class="form-control" name="gui_st_desc" placeholder="Ex: Guichê 01" required>
                                            </div>
                                            <button type="submit" id="btSalvar" class="btn btn-success">Salvar</button>  
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Situação:</label>
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
    <script src="../js/cad_usuario.js"></script>
    <?php include('../etc/footer.php'); ?>
</body>

</html>
