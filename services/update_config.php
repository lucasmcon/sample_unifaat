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
        include('modal.php');

        $config_in_limite_chamada = $_POST['config_in_limite_chamada'];
        $config_in_tempo_espera = $_POST['config_in_tempo_espera'];

        $glo_tb_atendimento = new glo_tb_atendimento();
        $glo_tb_atendimento->updateConfig($config_in_limite_chamada, $config_in_tempo_espera);

        echo "<script type='text/javascript'> $('#modalUpdateConfig').modal('show');</script>"; // CRIAR ESSE MODAL
    }
?>