<?php 
    if(!isset($_SESSION)){
        @session_start();    
    }
    if(!isset($_SESSION['login'])){
        session_destroy();
        header("Location: index.php"); exit;
    }

    include('../services/glo_tb_atendimento.php');
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
                        <h3 class="page-header">Atendimentos</h3>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <br>
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">
                                <strong>Detalhes</button></strong>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Senha</th>
                                                <th>Data</th>
                                                <th>Espera</th>
                                                <th>Setor</th>
                                                <th>Dados</th>
                                                <th>Atendente</th>
                                                <th>Situação</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableContent">

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
    <script src="../js/atendimentos.js"></script>
    <?php include('../etc/footer.php'); ?>
</body>

</html>
