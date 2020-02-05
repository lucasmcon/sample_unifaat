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
        <?php include('../etc/header.php') ?>
    </head>
    <body>
        <script>
            var refresh = setInterval(function() { 
                $('#refresh_atendimentos').load('main_atendimentos.php'); 
                $('#refresh_transferidos').load('main_transferidos.php');

                //NOTIFICAÇÃO DE NOVAS CHAMADAS NO TITULO DA PAGINA
                var contAtendNovo = document.getElementById('contNovo').innerHTML;
                var contAtendTransf = document.getElementById('contTransf').innerHTML;
                var qtdAtendNovo = contAtendNovo == '0' ? 0 : parseInt(contAtendNovo);
                var qtdAendTransf = contAtendNovo == '0' ? 0 : parseInt(contAtendTransf);
                var totalAtend = qtdAtendNovo + qtdAendTransf;

                document.title = totalAtend == 0 ? 'Secretaria Unifaat' : '('+totalAtend+') Secretaria Unifaat';

            }, 200);
        </script>
        <div id="wrapper">
            <?php include('../etc/side_menu.php'); ?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <span class="page-header"><br><br></span>
                        </div>
                        <div class="col-lg-5 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-ticket fa-5x"></i>
                                        </div>
                                            <div id="refresh_atendimentos">
                                            <!-- ############################################################################# -->
                                            <!-- Informações da div serão carregadas a partir do arquivo main_atendimentos.php -->
                                            <!-- ############################################################################# -->
                                            </div>
                                    </div>
                                </div>
                                <a href="atendimentos.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">Ver Detalhes</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-arrows-h fa-5x"></i>
                                        </div>
                                            <div id="refresh_transferidos">
                                            <!-- ############################################################################# -->
                                            <!-- Informações da div serão carregadas a partir do arquivo main_atendimentos.php -->
                                            <!-- ############################################################################# -->
                                            </div>
                                    </div>
                                </div>
                                <a href="atendimentos.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">Ver Detalhes</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
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
