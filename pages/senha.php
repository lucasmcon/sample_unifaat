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
    <audio id="audioChamada"><source src="../audio/chamada2.wav" type="audio/mpeg"></audio>
    <!-- Ocultar barra de rolagem horizontal -->
    <style>
        body{
            overflow-x: hidden;
        }
    </style>   
</head>
<body>
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header text-center"><img src="../img/unifaat.png"></h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div>
            <div id="bt">
                <div class="text-center" style="margin-top: 150px;">
                    <button style="width: 100%; height: 300px;" type="button" onclick="window.location.href='senha_aluno.php'"class="btn btn-primary"><i class="fa fa-graduation-cap fa-5x"></i><h1>Aluno</h1></button>
                </div>
                <div class="text-center" style="margin-top: 150px;">
                    <button style="width: 100%; height: 300px;" type="button" onclick="window.location.href='senha_visitante.php'"class="btn btn-primary"><i class="fa fa-users fa-5x"></i><h1>Não Aluno</h1></button>
                </div> 
            </div>
            <!-- /.col-lg-12-->
        </div>
    </div>
    <!-- /.row -->
    </div>
    <?php include('../etc/footer.php'); ?>
</body>
</html>
