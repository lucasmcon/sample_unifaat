<?php
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        session_destroy();
        header("Location: ../pages/index.php"); exit;
    }else{
        
        include('cad_tb_user.php');
        include('modal.php');
        $user_st_login = $_POST['login_recupera'];
    
        $cad_tb_user = new cad_tb_user;    
        $Rs = $cad_tb_user->recuperaSenha($user_st_login);
            
        if($Rs == 'ERROR'){
            echo "<script type='text/javascript'> $('#usuarioInexistente').modal('show');</script>";
        }else{
            $to = $user_st_login;
            $subject = "Recuperação de Senha";
            $txt = "Sua nova senha de acesso: ".$Rs[1];
            $headers = "From: unifaat@unifaat.edu.br\r\n";
            mail($to,$subject,$txt,$headers);
            echo "<script type='text/javascript'> $('#recuperaSenha').modal('show');</script>";
        }
    }
?>
