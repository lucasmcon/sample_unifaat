<?php 
    if(!isset($_SESSION)){
        @session_start();    
    }
    if(!isset($_SESSION['login']) || $_SESSION['user_st_tipo'] == 'u'){
        session_destroy();
        header("Location: index.php"); exit;
    }
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
                        <h3 class="page-header">Relatórios</h3>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-3 col-md-2">
                        <a href="tot_setor_fin.php" class="btn btn-primary">
                            <div class="row">
                                <div class="col-xs-12 text-center">
                                    <i class="fa fa-file-text-o fa-4x"></i>
                                </div>
                                <div class="col-xs-12 text-center">
                                    <br>
                                    <p>Total por Setores</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-6 col-sm-3 col-md-2">
                        <a href="tot_atendente_fin.php" class="btn btn-primary">
                            <div class="row">
                                <div class="col-xs-12 text-center">
                                    <i class="fa fa-file-text-o fa-4x"></i>
                                </div>
                                <div class="col-xs-12 text-center">
                                    <br>
                                    <p>Total por Atendentes</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- /. row -->
            </div>  
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <?php include('../etc/footer.php'); ?>
</body>

</html>
