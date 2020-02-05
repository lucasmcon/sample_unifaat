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
<script src="../js/cpf_mask.js"></script>
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
                        <input type="text" pattern="[0-9]*" inputmode="numeric" style="margin-top:30px;" maxlength="14" placeholder="CPF (opcional)"class="form-control text-center" id="cpf" name="cpf">
                    </label>
                </div>
                <!-- /.col-lg-12-->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="text-center">
                    <label class="text-center">
                        <button style="margin-top:70px; margin-right: 50px;" id="btGerarSenhaVisitante" name="btGerarSenhaVisitante" class="btn btn-primary text-center"><label>Gerar senha</label></button>
                    </label>
                    <label class="text-center">
                        <button style="margin-top:70px;" id="btGerarSenhaVisitantePrior" name="btGerarSenhaVisitantePrior" class="btn btn-danger text-center"><label><i class="fa fa-wheelchair"></i> Senha prioritária</label></button>
                    </label>
                </div>
            </div>
            <!-- /.row -->
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
        <div class="modal fade" id="informeCPF" data-keyboard="false" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title">ERRO</label>
                    </div>
                    <div class="modal-body">
                        <label>Informe o seu CPF</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Modal -->
    <!-- Modal  -->
    <div class="container">
        <div class="modal fade" id="cpfInvalido" data-keyboard="false" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title">ERRO</label>
                    </div>
                    <div class="modal-body">
                        <label>CPF Inválido</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Modal -->    
    <!-- Modal  -->
    <div class="container">
        <div class="modal fade" id="informeNome" data-keyboard="false" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title">ERRO</label>
                    </div>
                    <div class="modal-body">
                        <label>Informe seu primeiro nome</label>
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
                        <label class="modal-title">AVISO</label>
                    </div>
                    <div class="modal-body">
                        <label>Aguarde, gerando senha...</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Modal -->
    <script src="../js/senha_visitante.js"></script>
    <script src="../js/gerar_senha.js"></script>
    <?php include('../etc/footer.php'); ?>
</body>
</html>
