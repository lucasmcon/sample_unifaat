<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/favi.png" type="image/x-icon"/>

    <title>Secretaria Unifaat</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- jQuery lib -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- jQuery Mask lib-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <!-- Arquivo de audio da chamada -->
    <audio id="audioChamada"><source src="../audio/chamada3.mp3" type="audio/mpeg"></audio>
    <!-- Ocultar barra de rolagem horizontal -->
    <style>
        body { 
            overflow-x: hidden;
            margin-top: 30px;
        }

        div#wrapper{
            margin-left: 5px;
            
        }

        div#panel_historico{
            margin-right: 10px;
        }
    
    </style>                         
</head>
<body>
    <div id="wrapper">
        <div>
            <div class="row">
                <div class="col-lg-12">
                    <!--<h3 class="page-header text-center"><img src="../img/unifaat.png"></h3>-->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">
                            <h1>SENHA</h1>
                        </div>
                        <div class="panel-body text-center">
                            <div id="refreshSenha"><!-- Aqui carrega a senha--></div>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">
                            <h1>SOLICITANTE</h1>
                        </div>
                        <div class="panel-body text-center">
                            <div id="refreshSolicitante"><!-- Aqui carrega a senha--></div>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">
                            <h1>GUICHÊ</h1>
                        </div>
                        <div class="panel-body text-center">
                            <div id="refreshGuiche"><!-- Aqui carrega a senha--></div>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="panel panel-green" id="panel_historico">
                        <div class="panel-heading text-center">
                            <h1>HISTÓRICO</h1>
                        </div>
                        <div class="panel-body">
                        <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover text">
                                    <thead>
                                        <tr>
                                            <th class="success"><h1>Senha</h1></th>
                                            <th class="success"><h1>Guichê</h1></th>
                                        </tr>
                                    </thead>
                                    <tbody id="refreshHistorico">
                                    <!-- Carrega historico de chamadas -->
                                    </tbody>
                                </table>
                        </div>
                    </div>
                <!-- /.col-lg-12 -->
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
            <div class="row">
            
            </div>
            <!-- /.row -->
        </div>
        
    </div>
    <!-- /#wrapper -->
    <!-- Modal  -->
    <div class="container">
        <div class="modal fade" id="carregarHistorico" data-keyboard="false" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title">AVISO</h1>
                    </div>
                    <div class="modal-body">
                        <h3>Tela de chamadas carregada com sucesso.</h3>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" name="ok" id="ok">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Modal -->
    <script src="../js/chamada.js"></script>
    <?php include('../etc/footer.php'); ?>
</body>
</html>
