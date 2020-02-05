<?php
    include('../services/cad_tb_user.php');

    $cad_tb_user = new cad_tb_user();
    $Rs = $cad_tb_user->buscaSetoresAtivos();
    $rowsQtd = count($Rs);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/favi.png" type="image/x-icon"/>

    <title>Secretaria Unifaat</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- jQuery lib -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- jQuery Mask lib-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <!-- Ocultar barra de rolagem horizontal -->
    <style>
        body{
            overflow-x: hidden;
        }
        .form-control{
            font-size: 30px;
            height: 80px;
        }
        label{
            font-size: 30px;
        }
        .modal{
            top: 20%;
        }
        option{
            font-size: 50px;
        }

    </style>            
</head>
<body>
    <div id="wrapper">
        <div>
            <div class="row">
                <div class="col-lg-12">
                    <button onclick="window.location.href='senha.php'" class="btn btn-primary text-center"><i class="fa fa-arrow-left fa-5x"></i></button>
                    <h3 class="page-header text-center"><img src="../img/unifaat.png"></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                    <div class="text-center">
                        <label class="text-center">
                            <select class="form-control" id="setor" name="setor">
                                <option>Selecione o setor</option>
                                <?php
                                    for($i=0; $i<$rowsQtd; $i++){                                        
                                        date_default_timezone_set('America/Buenos_Aires'); 
                                        $diaSemana = date('w');
                                        $horaAtual = date('H:i:s');
                                        $horarioAtivo = $cad_tb_user->buscaHorarioAtivoSetor($Rs[$i]['set_in_id']);
                                        switch($diaSemana){

                                            case 1:
                                                if(strtotime($horaAtual) >= strtotime($horarioAtivo[0]['seg_hr_ini_1']) && strtotime($horaAtual) <= strtotime($horarioAtivo[0]['seg_hr_fin_1'])
                                                || strtotime($horaAtual) >= strtotime($horarioAtivo[0]['seg_hr_ini_2']) && strtotime($horaAtual) <= strtotime($horarioAtivo[0]['seg_hr_fin_2'])){
                                                    $selectContent = '<option>'.$Rs[$i]['set_in_id'].' - '.$Rs[$i]['set_st_desc'].'</option>';
                                                    echo $selectContent;
                                                }else{
                                                    $selectContent = '';
                                                    echo $selectContent;
                                                }
                                            break;
                                            
                                            case 2:
                                                if(strtotime($horaAtual) >= strtotime($horarioAtivo[0]['ter_hr_ini_1']) && strtotime($horaAtual) <= strtotime($horarioAtivo[0]['ter_hr_fin_1'])
                                                || strtotime($horaAtual) >= strtotime($horarioAtivo[0]['ter_hr_ini_2']) && strtotime($horaAtual) <= strtotime($horarioAtivo[0]['ter_hr_fin_2'])){
                                                    $selectContent = '<option>'.$Rs[$i]['set_in_id'].' - '.$Rs[$i]['set_st_desc'].'</option>';
                                                    echo $selectContent;
                                                }else{
                                                    $selectContent = '';
                                                    echo $selectContent;
                                                }
                                            break;
                                            
                                            case 3:
                                                if(strtotime($horaAtual) >= strtotime($horarioAtivo[0]['qua_hr_ini_1']) && strtotime($horaAtual) <= strtotime($horarioAtivo[0]['qua_hr_fin_1'])
                                                || strtotime($horaAtual) >= strtotime($horarioAtivo[0]['qua_hr_ini_2']) && strtotime($horaAtual) <= strtotime($horarioAtivo[0]['qua_hr_fin_2'])){
                                                    $selectContent = '<option>'.$Rs[$i]['set_in_id'].' - '.$Rs[$i]['set_st_desc'].'</option>';
                                                    echo $selectContent;
                                                }else{
                                                    $selectContent = '';
                                                    echo $selectContent;
                                                }
                                            break;
                                            
                                            case 4:
                                                if(strtotime($horaAtual) >= strtotime($horarioAtivo[0]['qui_hr_ini_1']) && strtotime($horaAtual) <= strtotime($horarioAtivo[0]['qui_hr_fin_1'])
                                                || strtotime($horaAtual) >= strtotime($horarioAtivo[0]['qui_hr_ini_2']) && strtotime($horaAtual) <= strtotime($horarioAtivo[0]['qui_hr_fin_2'])){
                                                    $selectContent = '<option>'.$Rs[$i]['set_in_id'].' - '.$Rs[$i]['set_st_desc'].'</option>';
                                                    echo $selectContent;
                                                }else{
                                                    $selectContent = '';
                                                    echo $selectContent;
                                                }
                                            break;
                                            
                                            case 5:
                                                if(strtotime($horaAtual) >= strtotime($horarioAtivo[0]['sex_hr_ini_1']) && strtotime($horaAtual) <= strtotime($horarioAtivo[0]['sex_hr_fin_1'])
                                                || strtotime($horaAtual) >= strtotime($horarioAtivo[0]['sex_hr_ini_2']) && strtotime($horaAtual) <= strtotime($horarioAtivo[0]['sex_hr_fin_2'])){
                                                    $selectContent = '<option>'.$Rs[$i]['set_in_id'].' - '.$Rs[$i]['set_st_desc'].'</option>';
                                                    echo $selectContent;
                                                }else{
                                                    $selectContent = '';
                                                    echo $selectContent;
                                                }
                                            break;
                                            
                                            case 6:
                                                if(strtotime($horaAtual) >= strtotime($horarioAtivo[0]['sab_hr_ini_1']) && strtotime($horaAtual) <= strtotime($horarioAtivo[0]['sab_hr_fin_1'])
                                                || strtotime($horaAtual) >= strtotime($horarioAtivo[0]['sab_hr_ini_2']) && strtotime($horaAtual) <= strtotime($horarioAtivo[0]['sab_hr_fin_2'])){
                                                    $selectContent = '<option>'.$Rs[$i]['set_in_id'].' - '.$Rs[$i]['set_st_desc'].'</option>';
                                                    echo $selectContent;
                                                }else{
                                                    $selectContent = '';
                                                    echo $selectContent;
                                                }
                                            break;
                                        }
                                    }
                                ?>
                            </select>  
                            <input type="number" style="margin-top:30px; margin-bottom:80px;" placeholder="Insira seu RA"class="form-control text-center" id="ra" name="ra">
                        </label>
                    </div>
                    <div class="row">
                        <div class="text-center">
                            <label class="text-center">
                                <button style="margin-right: 50px;" id="btGerarSenhaAluno" name="btGerarSenhaAluno" class="btn btn-primary text-center"><label>Gerar senha</label></button>
                            </label>
                            <label class="text-center">
                                <button id="btGerarSenhaAlunoPrior" name="btGerarSenhaAlunoPrior" class="btn btn-danger text-center"><label><i class="fa fa-wheelchair"></i> Senha prioritária</label></button>
                            </label>
                        </div>
                        <!-- /.col-lg-12-->
                    </div>
                    <!-- /.row -->
            <div class="row" style="margin-top:50px;">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <label>Seus dados</label>
                        </div>
                        <div class="panel-body">
                            <div class="row text-center">
                                <div class="col-lg-12">
                                    <form action="" method="post" role="form">
                                        <div id="resultBusca">
                                            <div class="form-group">
                                                <label>Nome:</label>
                                                <input class="form-control"  readonly="yes" id="nome_aluno" name="nome_aluno">
                                            </div>
                                            <div class="form-group">
                                                <label>Curso:</label>
                                                <input class="form-control" readonly="yes" id="curso" name="curso">
                                            </div>
                                        <div>
                                    </form> 
                                </div>
                                <!-- /.col-lg-12 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <!--
            <div class="row">
                <div class="text-center">
                <label class="text-center">
                    <button style="margin-right: 50px;" id="btGerarSenhaAluno" name="btGerarSenhaAluno" class="btn btn-primary text-center"><label>Gerar senha</label></button>
                </label>
                <label class="text-center">
                    <button id="btGerarSenhaAlunoPrior" name="btGerarSenhaAlunoPrior" class="btn btn-danger text-center"><label><i class="fa fa-wheelchair"></i> Senha prioritária</label></button>
                </label>
            </div>
            /.row -->
                                

        </div>
    </div>
    <!-- /#wrapper -->
    <!-- Modal  -->
    <div class="container">
        <div class="modal fade" id="selecioneSetor" data-keyboard="false" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title">ERRO</label>
                    </div>
                    <div class="modal-body">
                        <label>Selecione o setor</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Modal -->
    <!-- Modal  -->
    <div class="container">
        <div class="modal fade" id="informeRA" data-keyboard="false" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title">ERRO</label>
                    </div>
                    <div class="modal-body">
                        <label>Informe o seu RA</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Modal -->    
    <!-- Modal  -->
    <div class="container">
        <div class="modal fade" id="senhaGerada" data-keyboard="false" data-backdrop="static" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title">AGUARDE</label>
                    </div>
                    <div class="modal-body">
                        <label>Gerando senha...</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Modal -->
    <!-- Modal  -->
    <div class="container">
        <div class="modal fade" id="raNaoEncontrado" data-keyboard="false" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title">ERRO</label>
                    </div>
                    <div class="modal-body">
                        <label>RA não encontrado.</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Modal -->
    <!-- Modal  -->
    <div class="container">
        <div class="modal fade" id="falhaCon" data-keyboard="false" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title">ERRO - Sem conexão com a internet.</label>
                    </div>
                    <div class="modal-body">
                        <label>Solicite uma senha de "NÃO ALUNO". Redirecionando...</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Modal -->
    <script src="../js/senha_aluno.js"></script>
    <script src="../js/gerar_senha.js"></script>
    <?php include('../etc/footer.php'); ?>
</body>
</html>
