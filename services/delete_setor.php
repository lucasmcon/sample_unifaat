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

        $set_in_id = $_GET['set_in_id'];
        $cad_tb_setor = new cad_tb_user();

        if($cad_tb_setor->deletaSetor($set_in_id, $_SESSION['user_in_id']) == 'ERROR'){
            echo "<script type='text/javascript'> $('#modalDeletaSetorFalha').modal('show');</script>";
        }else{
            echo "<script type='text/javascript'> $('#modalDeletaSetor').modal('show');</script>";
        }
    }
?>