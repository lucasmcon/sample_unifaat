<?php
    include('../../services/cad_tb_user.php');

    $cad_tb_user = new cad_tb_user();
    $Rs = $cad_tb_user->buscaSetores();
    $rowsQtd = count($Rs);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="teste2.php" method="post">
        <label>CPF</label>
        <input type="text" name="sol_st_documento" id="sol_st_documento">
        <label>Nome</label>
        <input type="text" name="sol_st_nome" id="sol_st_nome">
        <select id="set_in_id" name="set_in_id">
            <?php
                for($i=0; $i<$rowsQtd; $i++){
                    $selectContent = '<option>'.$Rs[$i]['set_in_id'].' - '.$Rs[$i]['set_st_desc'].'</option>';
                    echo $selectContent;
                }
            ?>
        </select>
        <button id="btGerarSenha" name="btGerarSenha" type="submit">Gerar senha</button>
    </form>
</body>
</html>