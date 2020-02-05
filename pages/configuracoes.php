<?php 
    if(!isset($_SESSION)){
        @session_start();    
    }
    if(!isset($_SESSION['login']) || $_SESSION['user_st_tipo'] == 'u'){
        session_destroy();
        header("Location: index.php"); exit;
    }

    include('../services/glo_tb_atendimento.php');
    $i = 0;
    $glo_tb_atendimento = new glo_tb_atendimento();
    $Rs = $glo_tb_atendimento->buscaConfig();
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
                            <h3 class="page-header">Configurações</h3>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <br>
                        <form action="../services/update_config.php" method="post">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Limite de chamadas para um atendimento:</label>    
                                            <input type="text" class="form-control" maxlength="1" required value="<?php echo $Rs[$i]['config_in_limite_chamada']; ?>" name="config_in_limite_chamada" id="config_in_limite_chamada">
                                            <br>
                                            <label>Tempo de espera na fila de chamadas simultâneas (segundos):</label>
                                            <input type="text" class="form-control" maxlength="2" required value="<?php echo $Rs[$i]['config_in_tempo_espera']; ?>" name="config_in_tempo_espera" id="config_in_limite_chamada">
                                    </div>
                                    <div class="col md-4">
                                        
                                    <div>
                                    <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary">Salvar</button>
                                    </div>
                                </div> 
                            </div>
                        </form>
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
