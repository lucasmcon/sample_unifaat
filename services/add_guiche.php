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

        $gui_st_desc = $_POST['gui_st_desc'];
        $user_in_id = $_SESSION['user_in_id'];
        $gui_in_status = $_POST['gui_in_status'] == 'Ativo' ? 1 : 0;


        $cad_tb_setor = new cad_tb_user();
        $cad_tb_setor->cadastraGuiche($gui_st_desc, $user_in_id, $gui_in_status);

        echo "<script type='text/javascript'> $('#modalCadastroGuicheSucesso').modal('show');</script>";
    }
?>