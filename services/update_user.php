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

        $user_st_nome = $_POST['user_st_nome'];
        $user_st_login = $_POST['user_st_login'];
        $user_st_senha = $_POST['user_st_senha'];
        $user_in_cad = $_SESSION['user_in_id'];
        $user_in_status = $_POST['user_in_status'] == 'Ativo' ? 1 : 0;
        $setor = explode(' - ', $_POST['set_in_id']);
        $set_in_id = $setor[0];
        $user_st_tipo = $_POST['user_st_tipo'] == 'Administrador' ? 'a' : 'u';


        $cad_tb_user = new cad_tb_user();
        $cad_tb_user->cadastraUsuario($user_st_nome, $user_st_login, $user_st_senha, $user_in_cad, $user_in_status, $set_in_id, $user_st_tipo);

        echo "<script type='text/javascript'> $('#modalCadastroUsuarioSucesso').modal('show');</script>";
    }
?>