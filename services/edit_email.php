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

        include('cad_tb_user.php');
        include('modal.php');

        $cad_tb_user = new cad_tb_user();

        $con_st_desc = $_POST['con_st_desc'];
        $con_st_email = $_POST['con_st_email'];
        $con_st_senha = $_POST['con_st_senha'];
        $con_st_smtp = $_POST['con_st_smtp'];
        $con_in_porta = $_POST['con_in_porta'];
        $con_in_tls = isset($_POST['con_in_tls']) ? 1 : 0;
        $con_in_edit = $_SESSION['user_in_id'];

        $cad_tb_user->editaEmail($con_st_desc, $con_st_email, $con_st_senha, $con_st_smtp, $con_in_porta, $con_in_tls, $con_in_edit);

        echo "<script type='text/javascript'> $('#modalEditaEmail').modal('show');</script>";
    }
?>