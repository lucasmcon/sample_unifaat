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

        $set_in_id = $_POST['set_in_id'];
        $set_st_desc = $_POST['set_st_desc'];
        $set_st_prefixo = $_POST['set_st_prefixo'];
        $set_in_edit = $_SESSION['user_in_id'];
        //$set_in_status = $_POST['set_in_status'] == 'Ativo' ? 1 : 0;

        $hora = $_POST['hora'];
        
        if($_POST['set_in_status'] == 'Ativo' && isset($_POST['somenteTransf'])){
            $set_in_status = 2;
        }else if($_POST['set_in_status'] == 'Ativo'){
            $set_in_status = 1;
        }else{
            $set_in_status = 0;
        }
       

        $cad_tb_setor = new cad_tb_user();

        $cad_tb_setor->editaSetor($set_in_id, $set_st_desc, $set_st_prefixo, $set_in_edit, $set_in_status);
        $cad_tb_setor->editaHorarioAtivo($set_in_id, $set_in_edit, $hora);

        echo "<script type='text/javascript'> $('#modalEditaSetor').modal('show');</script>";
    }
?>