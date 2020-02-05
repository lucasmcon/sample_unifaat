<?php
    if(!isset($_SESSION)){
        @session_start();    
    }
    if(!isset($_SESSION['login'])){
        session_destroy();
        header("Location: ../pages/index.php"); exit;
    }

    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        session_destroy();
        header("Location: ../pages/index.php"); exit;
    }else{

        include('glo_tb_atendimento.php');
        //include('modal.php');

        $at_in_id = $_POST['at_in_id'];
        $user_in_id = $_SESSION['user_in_id'];
       
        $glo_tb_atendimento = new glo_tb_atendimento();
        $glo_tb_atendimento->chamaAtendimento($at_in_id, $user_in_id); 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Secretaria Unifaat</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="icon" href="img/favi.png" type="image/x-icon"/>
</head>
<body>
<!-- Modal: Chamada de atendimento -->
<div class="container">
    <div class="modal fade" id="chamaAtendimento" data-keyboard="false" data-backdrop="static" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Atendimentos</h4>
                </div>
                <div class="modal-body">
                    <p>A senha foi chamada...</p>
                </div>
               <div class="modal-footer">
                    <a class="btn btn-primary"  href="../pages/atendimento_detalhado.php?at_in_id=<?php echo $at_in_id ?>"><b>Ok</b></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo "<script type='text/javascript'> $('#chamaAtendimento').modal('show');</script>"; ?>
</body>