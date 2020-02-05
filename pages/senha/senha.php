<?php
    $tipo = isset($_POST['btAluno']) ? 'e' : 'v';

    if($tipo=='e'){
        header('Location: aluno.php');
    }else{
        header('Location: visitante.php');
    }


?>