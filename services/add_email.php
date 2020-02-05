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

        $con_st_desc = $_POST['con_st_desc'];
        $con_st_email = $_POST['con_st_email'];
        $con_st_senha = $_POST['con_st_senha'];
        $con_st_smtp = $_POST['con_st_smtp'];
        $con_in_porta = $_POST['con_in_porta'];
        $con_in_tls = isset($_POST['con_in_tls']) ? 1 : 0;
        $con_in_cad = $_SESSION['user_in_id'];
        
    
        $cad_tb_user = new cad_tb_user();
    
        $cad_tb_user->cadastraEmail($con_st_desc, $con_st_email, $con_st_senha, $con_st_smtp, $con_in_porta, $con_in_tls, $con_in_cad);

        /*
        // ESTUDAR MANEIRA DE APLICAR ISSO NAS CONFIGURAÇÕES DO SSMTP E REVALIASES
        $fp = fopen('ssmtp.conf', 'w');
        $fcontent = 'root='.$con_st_email.PHP_EOL;
        $fcontent.= 'mailhub='.$con_st_smtp.':'.$con_in_porta.PHP_EOL;
        $fcontent.= 'AuthUser='.$con_st_email.PHP_EOL;
        $fcontent.= 'AuthPass='.$con_st_senha.PHP_EOL;
        $fcontent.= 'UseTLS='.$con_st_tls = $con_in_tls == 1 ? 'YES'.PHP_EOL : 'NO'.PHP_EOL;
        $fcontent.= 'UseSTARTTLS='.$con_st_tls;
    
        fwrite($fp, $fcontent);
        fclose($fp);

        */
        echo "<script type='text/javascript'> $('#modalCadastroEmailSucesso').modal('show');</script>";
    }
?>