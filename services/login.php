<?php

    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        session_destroy();
        header("Location: ../pages/index.php"); exit;
    }else{
        session_start();
        include('modal.php');
        include('cad_tb_user.php');

        if(isset($_POST['login']) && isset($_POST['senha'])){

            $login = $_POST['login'];
            $senha = sha1(md5($_POST['senha']));

            $cad_tb_user = new cad_tb_user();

            $Rs = $cad_tb_user->verifLogin($login, $senha);

            if($Rs){
                $_SESSION['login'] = $login;
                $_SESSION['nome'] = $Rs[0]['user_st_nome'];
                $_SESSION['user_in_id'] = $Rs[0]['user_in_id'];
                $_SESSION['user_st_tipo'] = $Rs[0]['user_st_tipo'];
                //$_SESSION['set_in_id'] = $Rs[0]['set_in_id'];

                echo "<script type='text/javascript'> $('#modalLoginSucesso').modal('show');</script>";
            }else{
                echo "<script type='text/javascript'> $('#modalValidacao').modal('show');</script>";
            }
        } 
    }
?>