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
    <form action="teste.php" method="post">
        <label>RA</label>
        <input type="text" name="at_in_ra" id="at_in_ra">
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