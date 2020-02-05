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
        //$at_st_obs = $_POST['obs'];
        $user_in_id = $_SESSION['user_in_id'];
        
        if(isset($_POST['obs'])){
            $at_st_obs = $_POST['obs'];
        }
        
        if(isset($_POST['set_in_transf'])){
            $set_transf = explode(' - ', $_POST['set_in_transf']);
            $set_in_transf = $set_transf[0];
        }

        $glo_tb_atendimento = new glo_tb_atendimento();
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
    <!-- ./ Modal -->
    <!-- Modal: Chamada de atendimento -->
    <div class="container">
        <div class="modal fade" id="finalizaAtendimento" data-keyboard="false" data-backdrop="static" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Atendimentos</h4>
                    </div>
                    <div class="modal-body">
                        <p>Atendimento finalizado com sucesso.</p>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-primary"  href="../pages/atendimentos.php"><b>Ok</b></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Modal -->
    <!-- Modal: Chamada de atendimento -->
    <div class="container">
        <div class="modal fade" id="transfereAtendimento" data-keyboard="false" data-backdrop="static" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Atendimentos</h4>
                    </div>
                    <div class="modal-body">
                        <p>Atendimento transferido com sucesso.</p>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-primary"  href="../pages/atendimentos.php"><b>Ok</b></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Modal -->

</body>
<?php
        if(isset($_POST['btChamar'])){
            echo "<script type='text/javascript'> $('#chamaAtendimento').modal('show');</script>";
            $glo_tb_atendimento->chamaAtendimento($at_in_id, $user_in_id); 
                   
        }else if(isset($_POST['btFinalizar'])){
            if($_POST['at_st_tipo'] == 'Visitante'){
                $at_st_nome = $_POST['at_st_nome'];
                $at_st_documento = $_POST['at_st_documento'];

                $glo_tb_atendimento->atualizaDadosVisitante($at_in_id, $at_st_nome, $at_st_documento);
            }
            $glo_tb_atendimento->finalizaAtendimento($at_in_id, $user_in_id, $at_st_obs);
            echo "<script type='text/javascript'> $('#finalizaAtendimento').modal('show');</script>";
        }else if(isset($_POST['btNComp'])){
            $glo_tb_atendimento->naoComparaceuAtendimento($at_in_id, $user_in_id);
            echo "<script type='text/javascript'> $('#finalizaAtendimento').modal('show');</script>";       
        }else{
            $glo_tb_atendimento->transfereAtendimento($at_in_id, $user_in_id, $set_in_transf, $at_st_obs);
            echo "<script type='text/javascript'> $('#transfereAtendimento').modal('show');</script>";
        }
    }
?>