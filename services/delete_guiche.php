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

        $gui_in_id = $_GET['gui_in_id'];
        $cad_tb_guiche = new cad_tb_user();
        
        if($Rs = $cad_tb_guiche->deletaGuiche($gui_in_id, $_SESSION['user_in_id']) == 'ERROR'){
            echo "<script type='text/javascript'> $('#modalDeletaGuicheFalha').modal('show');</script>";
        }else{
            echo "<script type='text/javascript'> $('#modalDeletaGuiche').modal('show');</script>";
        } 
    }
?>