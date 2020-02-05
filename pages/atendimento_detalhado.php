<?php 
    if(!isset($_SESSION)){
        @session_start();    
    }
    if(!isset($_SESSION['login'])){
        session_destroy();
        header("Location: index.php"); exit;
    }

    include('../services/glo_tb_atendimento.php');

    date_default_timezone_set('America/Sao_Paulo'); 
    $i = 0; // indice do retorno, apenas estética, já que a consulta traz 1 linha.
    $at_in_id = $_GET['at_in_id'];
    $glo_tb_atendimento = new glo_tb_atendimento();
    $Rs = $glo_tb_atendimento->buscaAtendimentoDet($at_in_id);    

    $Rs_2 = $glo_tb_atendimento->buscaConfig();
    $obs = $Rs_2[$i]['config_in_limite_chamada'] < $Rs[$i]['at_in_tentativas'] ? ' - Limite de chamadas atingido' : '';

    $Rs_3 = $glo_tb_atendimento->buscaSetoresAtend();
    $countRs_3 = count($Rs_3);

    if($Rs[$i]['at_in_transf'] != ''){
        $Rs_4 = $glo_tb_atendimento->buscaAtendenteTransf($Rs[$i]['at_in_transf']);
        $atendenteTransf = $Rs_4[$i]['user_st_nome'];
    }else{
        $atendenteTransf = ' -- ';
    }
    
    //BOTAO COM URL DE INTEGRAÇÃO TEMPORÁRIO
    if($Rs[$i]['at_st_tipo'] == 'e' && $Rs[$i]['sol_st_documento'] != '' && $Rs[$i]['set_st_desc'] == 'Financeiro'){
        $btIntegracao = '<a class="btn btn-success" href="https://www.unifaat.com.br/admin/dashboard.php?wc=mensalidades%2Fhome&busca_ra='.$Rs[$i]['sol_st_documento'].'&busca_em_aberto=1" target="_blank"><i class="fa fa-dollar"></i> Mensalidades</a>';
    }else{
        $btIntegracao = ' ';
    }

    if($Rs[$i]['at_in_tentativas'] >= 1){
        $explodeLogin = explode('@', $Rs[$i]['user_st_login']);
        $user_retencao = $explodeLogin[0];

        if($Rs[$i]['at_st_tipo'] == 'e' && $Rs[$i]['sol_st_documento'] != ''){
            $btRetencao ='<div class="form group">';
            $btRetencao.= '<a class="btn btn-warning" style="margin-top:10px;" href="https://unifaat.vcosta.net/app/visualizar/historico_ext?id='.$Rs[$i]['sol_st_documento'].'&user='.$user_retencao.'" target="_blank"><i class="fa fa-anchor"></i> Retenção</a>';
            $btRetencao.='</div>';
        }else{
            $btRetencao = '';
        }
    }
      
    //Variavel com marcação dos botoes de finalizar e excluir só deverão ser exibidos quando as tentavias de chamada forem >= 1
    $btChamar = '<button type="submit" name="btChamar" id="btChamar" class="btn btn-primary"><i class="fa fa-comment"></i> Chamar</button> ';
    $btFinNComp = '<button type="submit" name="btFinalizar" id="btFinalizar" class="btn btn-success"><i class="fa fa-check"></i> Finalizar</button> ';
    $btFinNComp.= '<button type="submit" name="btNComp" id="btNComp" class="btn btn-danger"><i class="fa fa-map-marker"></i> Não compareceu</button>';
    $btFinNComp.= '&nbsp;'.$btIntegracao;



?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php 
        include('../etc/header.php'); 
        include('../services/modal.php');
    ?>
</head>
<body>
    <div id="wrapper">
        <?php include('../etc/side_menu.php'); ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><button class="btn btn-primary" onclick="window.location.href='atendimentos.php'"><i class="fa fa-arrow-left"></i> Voltar</button><div class="text-center"></div></h3>
                        
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">
                                <strong>Detalhes do atendimento</strong>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form action="../services/update_atendimento.php" method="post" role="form">
                                            <div class="form-group">
                                                <label>Cód. Interno</label>
                                                <input class="form-control" name="at_in_id" id="at_in_id" readonly="yes" value="<?php echo $Rs[$i]['at_in_id']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Senha</label>
                                                <input class="form-control" name="at_st_senha" readonly="yes" value="<?php echo $Rs[$i]['at_st_senha']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Data Solicitação:</label>
                                                <input class="form-control" name="at_dt_cad" readonly="yes" value="<?php echo $Rs[$i]['at_dt_cad']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Tipo:</label>
                                                <input class="form-control" id="at_st_tipo" name="at_st_tipo" readonly="yes" value="<?php echo $tipo = $Rs[$i]['at_st_tipo'] == 'e' ? 'Estudante' : 'Visitante'?>" >
                                            </div>
                                            <div class="form-group">
                                                <label>Tentativas:</label>
                                                <input class="form-control" id="at_in_tentativas" readonly="yes" value="<?php echo $Rs[$i]['at_in_tentativas']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Transferido por:</label>
                                                <input class="form-control" readonly="yes" value="<?php echo $atendenteTransf; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Observações:</label>
                                                <textarea id="obs" name="obs" readonly="yes" class="form-control" rows="4"><?php echo $Rs[$i]['at_st_obs'].$obs; ?></textarea>
                                            </div>
                                            <?php 
                                                //Botões para chamar, finalizar e exlcuir atendimento
                                                echo $button = $Rs[$i]['at_in_tentativas'] <= $Rs_2[$i]['config_in_limite_chamada'] ? $btChamar : '';
                                                echo $buttons = $Rs[$i]['at_in_tentativas'] >= 1 ? $btFinNComp.$btRetencao : ''; 
                                            ?>
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Setor:</label>
                                                <input class="form-control" readonly="yes" readonly="yes" value="<?php echo $Rs[$i]['set_st_desc']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Situação:</label>
                                                <input class="form-control" readonly="yes" readonly="yes" value="<?php echo $Rs[$i]['at_in_status']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Tempo de espera:</label>
                                                <!--<input class="form-control" name="at_dt_cad" readonly="yes" value="<?php //echo $tempoEspera;?>"> -->
                                                <div id="tempoEspera"></div>
                                            </div>
                                            <label>
                                                <?php $disabled = $Rs[$i]['at_st_tipo'] == 'e' ? 'disabled' : ' '; ?>
                                                    <input type="checkbox" id="preencherDados" <?php echo $disabled; ?> value=""> Informar dados Visitante
                                                </label>
                                            <div class="form-group">
                                                <label><?php echo $label_dados = $Rs[$i]['at_st_tipo'] == 'e' ? 'RA' : 'CPF'; ?>:</label>
                                                <input class="form-control" required id="at_st_documento" name="at_st_documento" readonly="yes" readonly="yes" value="<?php echo $Rs[$i]['sol_st_documento'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Solicitante:</label>
                                                <input class="form-control" required readonly="yes" id="at_st_nome" name="at_st_nome" value="<?php echo $Rs[$i]['sol_st_nome'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    <input type="checkbox" id="transferir" value=""> Transferir atendimento
                                                </label>
                                                <br>
                                                <label>Setor:</label>
                                                <select disabled required class="form-control" id="set_in_transf" name="set_in_transf">
                                                    <option value="">Selecione...</option> 
                                                    <?php
                                                        
                                                        for($i=0; $i<$countRs_3; $i++){
                                                            $selectContent = '<option>'.$Rs_3[$i]['set_in_id'].' - '.$Rs_3[$i]['set_st_desc'].'</option>';
                                                            echo $selectContent;
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="btTransf" id="btTransf" disabled class="btn btn-primary"><i class="fa fa-arrows-h"></i> Transferir</button>
                                            </div>
                                        </form>
                                        <script>
                                            $('#btChamar').click(function(){
                                                $('#senhaFilaEspera').modal('show');
                                            })
                                        </script>
                                        <script src="../js/atendimento.js"></script>
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
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
            </div>
            <!-- /.container-fluid -->
            
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- Modal: Chamada de atendimento -->
    <div class="container">
        <div class="modal fade" id="senhaFilaEspera" data-keyboard="false" data-backdrop="static" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Atendimentos</h4>
                    </div>
                    <div class="modal-body">
                        <p>Aguarde, a senha foi para fila de espera e será chamada em alguns segundos.</p>
                    </div>
                    <div class="modal-footer">
                    <!--<a class="btn btn-primary"  href="../pages/atendimento_detalhado.php?at_in_id=""><b>Ok</b></a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Modal -->
        <!-- Modal: Dados visitante inválidos -->
        <div class="container">
        <div class="modal fade" id="dadosVisitanteInvalidos" data-keyboard="false" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">ERRO: Atendimentos</h4>
                    </div>
                    <div class="modal-body">
                        <p>Preencha os dados do Visitante corretamente.</p>
                    </div>
                    <div class="modal-footer">
                    <!--<a class="btn btn-primary"  href="../pages/atendimento_detalhado.php?at_in_id=""><b>Ok</b></a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Modal -->
    <script src="../js/atendimento_detalhado.js"></script>
    <?php include('../etc/footer.php'); ?>
</body>

</html>
