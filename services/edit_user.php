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

        $user_in_id = $_POST['user_in_id'];
        $user_st_nome = $_POST['user_st_nome'];
        $user_st_login = $_POST['user_st_login'];
        $confirma_senha = $_POST['user_confirma_senha'];
        $user_st_senha = $confirma_senha ? sha1(md5($_POST['user_st_senha'])) : $_POST['user_st_senha'];
        $user_in_edit = $_SESSION['user_in_id'];
        $user_in_status = $_POST['user_in_status'] == 'Ativo' ? 1 : 0;
        $guiche = explode(' - ', $_POST['gui_in_id']);
        $gui_in_id = $guiche[0];
        $set_in_id = isset($_POST['setorCheckBox']) ? $_POST['setorCheckBox'] : '';
        //$user_st_tipo = $_POST['user_st_tipo'] == 'Administrador' ? 'a' : 'u';

        switch($_POST['user_st_tipo']){
            case 'Administrador':
                $user_st_tipo = 'a';
                break;
            case 'Atendente': 
                $user_st_tipo = 'u';
                break;
            case 'Supervisor':
                $user_st_tipo = 's';
                break;
        }

        $cad_tb_user = new cad_tb_user();
        $cad_tb_user->editaUsuario($user_in_id, $user_st_nome, $user_st_login, $user_st_senha, $user_in_edit, $user_in_status, $gui_in_id, $set_in_id, $user_st_tipo);

        echo "<script type='text/javascript'> $('#modalEditaUsuario').modal('show');</script>";
    }
?>