<?php 
    if(!isset($_SESSION)){
        @session_start();    
    }
    if(!isset($_SESSION['login']) || $_SESSION['user_st_tipo'] == 'u'){
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
<script src="../js/dt_mask.js"></script>
    <div id="wrapper">
        <?php include('../etc/side_menu.php'); ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><button class="btn btn-primary" onclick="window.location.href='relatorio.php'"><i class="fa fa-arrow-left"></i> Voltar</button>
                        Relatórios - Atendimentos por setor</h3>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <form action="" method="post">
                            <div class="form-group col-md-3">
                                <label for="dt_inicial">Data Inicial:</label> 
                                <input type="text>" class="form-control" placeholder="Ex: 01-01-2018" id="dt_inicial" name="dt_inicial"> 
                                <br>
                                <label for="dt_final">Data Final:</label> 
                                <input type="text" class="form-control" placeholder="Ex: 01-01-2018" id="dt_final" name="dt_final">
                                <br>
                                <button type="button" id="btn_pesquisar" name="btn_pesquisar" class="btn btn-primary"><i class="fa fa-search"></i> Pesquisar</button>
                            </div>
                        </form>   
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Setor</th>
                                        <th>Quantidade</th>
                                    </tr>
                                </thead>
                                <tbody id="relTotalAtendFinSetor"> 
                                <!--   Resultado da pesquisa   -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->    
    <?php include('../etc/footer.php'); ?>
    <script src="../js/tot_setor_fin.js"></script>
</body>

</html>
