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
        $user_in_id = $_SESSION['user_in_id'];
        
        if(isset($_POST['alt_guiche'])){
            $guiche = explode(' - ', $_POST['alt_guiche']);
            $gui_in_id = $guiche[0];
            $cad_tb_user->alteraGuiche($user_in_id, $gui_in_id);
        }

        if($_POST['user_st_senha'] != ''){
            $user_st_senha = $_POST['user_st_senha'];
            $cad_tb_user->editaMeusDados($user_in_id, $user_st_senha);
        }
        
        //$cad_tb_user->editaMeusDados($user_in_id, $user_st_senha);

        echo "<script type='text/javascript'> $('#modalEditaMeusDados').modal('show');</script>";
    }
?>