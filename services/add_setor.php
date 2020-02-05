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

        $set_st_desc = $_POST['set_st_desc'];
        $set_in_cad = $_SESSION['user_in_id'];
        $set_st_prefixo = $_POST['set_st_prefixo'];

        $hora = $_POST['hora'];

        //$set_in_status = $_POST['set_in_status'] == 'Ativo' ? 1 : 0;

        if($_POST['set_in_status'] == 'Ativo' && isset($_POST['somenteTransf'])){
            $set_in_status = 2;
        }else if($_POST['set_in_status'] == 'Ativo'){
            $set_in_status = 1;
        }else{
            $set_in_status = 0;
        }

        //print_r($hora);

        $cad_tb_setor = new cad_tb_user();
        $cad_tb_setor->cadastraSetor($set_st_desc, $set_in_cad, $set_in_status, $set_st_prefixo);
        
        $set_last_id  = $cad_tb_setor->getSetLastId();
        $cad_tb_setor->cadastraHorarioAtivo($set_last_id[0]['set_in_id'], $set_in_cad, $hora);

        echo "<script type='text/javascript'> $('#modalCadastroSetorSucesso').modal('show');</script>";
    }
?>