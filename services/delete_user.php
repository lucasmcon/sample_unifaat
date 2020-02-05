<?php
    if(!isset($_SESSION)){
        @session_start();    
    }
    if(!isset($_SESSION['login'])){
        session_destroy();
        header("Location: ../pages/index.php"); exit;
    }

    if ($_SERVER['REQUEST_METHOD'] != 'GET') {
        session_destroy();
        header("Location: ../pages/index.php"); exit;
    }else{

        include('cad_tb_user.php');
        include('modal.php');

        $user_in_id = $_GET['user_in_id'];



        $cad_tb_user = new cad_tb_user();
        $cad_tb_user->deletaUsuario($user_in_id, $_SESSION['user_in_id']);

        echo "<script type='text/javascript'> $('#modalDeletaUsuario').modal('show');</script>";
    }
?>