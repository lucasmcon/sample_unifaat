<?php 
    if(!isset($_SESSION)){
        @session_start();    
    }
    if(!isset($_SESSION['login'])){
        session_destroy();
        header("Location: index.php"); exit;
    }

    include('../services/cad_tb_user.php');

    $set_in_id = $_GET['set_in_id'];
    $set_in_edit = $_SESSION['user_in_id'];
    $cad_tb_setor = new cad_tb_user();
    
    $Rs = $cad_tb_setor->buscaSetor($set_in_id);
    $situacao = $Rs[0]['set_in_status'] == 1 ? 'Ativo' : 'Inativo';

    $Rs_2 = $cad_tb_setor->buscaHorarioAtivoSetor($set_in_id);
    
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
<script src="../js/prefixo_mask.js"></script>
    <div id="wrapper">
        <?php include('../etc/side_menu.php'); ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><button class="btn btn-primary" onclick="window.location.href='setores.php'"><i class="fa fa-arrow-left"></i> Voltar</button> Editar usuário</h3>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <strong>Dados do usuário</strong>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form action="../services/edit_setor.php" method="post" role="form">
                                            <div class="form-group">
                                                <label>Cód. Setor:</label>
                                                <input class="form-control" name="set_in_id" readonly="yes" value="<?php echo $Rs[0]['set_in_id']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Descrição:</label>
                                                <input class="form-control" name="set_st_desc" value="<?php echo $Rs[0]['set_st_desc']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Prefixo de senha:</label>
                                                <input class="form-control" onkeyup="this.value = this.value.toUpperCase();" name="set_st_prefixo" id="set_st_prefixo" value="<?php echo $Rs[0]['set_st_prefixo']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Horário ativo</label> (Informar horários de início e término de atendimento):
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Seg. ini 1:</label>
                                                    <input class="form-control" name="hora[]" id="seg_hr_ini_1" value="<?php echo $Rs_2[0]['seg_hr_ini_1']; ?>" required> 
                                                    <label>Seg. term 1:</label>
                                                    <input class="form-control" name="hora[]" id="seg_hr_fin_1" value="<?php echo $Rs_2[0]['seg_hr_fin_1']; ?>" required>
                                                    <label>Seg. ini 2:</label>
                                                    <input class="form-control" name="hora[]" id="seg_hr_ini_2" value="<?php echo $Rs_2[0]['seg_hr_ini_2']; ?>" required> 
                                                    <label>Seg. term 2:</label>
                                                    <input class="form-control" name="hora[]" id="seg_hr_fin_2" value="<?php echo $Rs_2[0]['seg_hr_fin_2']; ?>" required> 
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Ter. ini 1:</label>
                                                    <input class="form-control" name="hora[]" id="ter_hr_ini_1" value="<?php echo $Rs_2[0]['ter_hr_ini_1']; ?>" required> 
                                                    <label>Ter. term 1:</label>
                                                    <input class="form-control" name="hora[]" id="ter_hr_fin_1" value="<?php echo $Rs_2[0]['ter_hr_fin_1']; ?>" required>
                                                    <label>Ter. ini 2:</label>
                                                    <input class="form-control" name="hora[]" id="ter_hr_ini_2" value="<?php echo $Rs_2[0]['ter_hr_ini_2']; ?>" required> 
                                                    <label>Ter. term 2:</label>
                                                    <input class="form-control" name="hora[]" id="ter_hr_fin_2" value="<?php echo $Rs_2[0]['ter_hr_fin_2']; ?>" required> 
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Qua. ini 1:</label>
                                                    <input class="form-control" name="hora[]" id="qua_hr_ini_1" value="<?php echo $Rs_2[0]['qua_hr_ini_1']; ?>" required> 
                                                    <label>Qua. term 1:</label>
                                                    <input class="form-control" name="hora[]" id="qua_hr_fin_1" value="<?php echo $Rs_2[0]['qua_hr_fin_1']; ?>" required>
                                                    <label>Qua. ini 2:</label>
                                                    <input class="form-control" name="hora[]" id="qua_hr_ini_2" value="<?php echo $Rs_2[0]['qua_hr_ini_2']; ?>" required> 
                                                    <label>Qua. term 2:</label>
                                                    <input class="form-control" name="hora[]" id="qua_hr_fin_2" value="<?php echo $Rs_2[0]['qua_hr_fin_2']; ?>" required> 
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Qui. ini 1:</label>
                                                    <input class="form-control" name="hora[]" id="qui_hr_ini_1" value="<?php echo $Rs_2[0]['qui_hr_ini_1']; ?>" required> 
                                                    <label>Qui. term 1:</label>
                                                    <input class="form-control" name="hora[]" id="qui_hr_fin_1" value="<?php echo $Rs_2[0]['qui_hr_fin_1']; ?>" required>
                                                    <label>Qui. ini 2:</label>
                                                    <input class="form-control" name="hora[]" id="qui_hr_ini_2" value="<?php echo $Rs_2[0]['qui_hr_ini_2']; ?>" required> 
                                                    <label>Qui. term 2:</label>
                                                    <input class="form-control" name="hora[]" id="qui_hr_fin_2" value="<?php echo $Rs_2[0]['qui_hr_fin_2']; ?>" required> 
                                                </div>
                                            </div>
                                            <button type="submit" id="btSalvar" class="btn btn-primary">Salvar alterações</button>  
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Situação</label>
                                                <input class="form-control" readonly="yes" readonly="yes" value="<?php echo $situacao; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    <input type="checkbox" id="somenteTransf" name="somenteTransf" value="somenteTransf"> Somente transferência
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label>Editar situação:</label>
                                                <select required class="form-control" name="set_in_status" style="margin-bottom:85px;">   
                                                    <option value="">Selecione...</option>
                                                    <option>Ativo</option>
                                                    <option>Inativo</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Sex. ini 1:</label>
                                                    <input class="form-control" name="hora[]" id="sex_hr_ini_1" value="<?php echo $Rs_2[0]['sex_hr_ini_1']; ?>" required> 
                                                    <label>Sex. term 1:</label>
                                                    <input class="form-control" name="hora[]" id="sex_hr_fin_1" value="<?php echo $Rs_2[0]['sex_hr_fin_1']; ?>" required>
                                                    <label>Sex. ini 2:</label>
                                                    <input class="form-control" name="hora[]" id="sex_hr_ini_2" value="<?php echo $Rs_2[0]['sex_hr_ini_2']; ?>" required> 
                                                    <label>Sex. term 2:</label>
                                                    <input class="form-control" name="hora[]" id="sex_hr_fin_2" value="<?php echo $Rs_2[0]['sex_hr_fin_2']; ?>" required> 
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Sab. ini 1:</label>
                                                    <input class="form-control" name="hora[]" id="sab_hr_ini_1" value="<?php echo $Rs_2[0]['sab_hr_ini_1']; ?>" required> 
                                                    <label>Sab. term 1:</label>
                                                    <input class="form-control" name="hora[]" id="sab_hr_fin_1" value="<?php echo $Rs_2[0]['sab_hr_fin_1']; ?>" required>
                                                    <label>Sab. ini 2:</label>
                                                    <input class="form-control" name="hora[]" id="sab_hr_ini_2" value="<?php echo $Rs_2[0]['sab_hr_ini_2']; ?>" required> 
                                                    <label>Sab. term 2:</label>
                                                    <input class="form-control" name="hora[]" id="sab_hr_fin_2" value="<?php echo $Rs_2[0]['sab_hr_fin_2']; ?>" required> 
                                                </div>
                                            </div>
                                        </form>
                                        
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

        <!-- Modal  -->
        <div class="container">
        <div class="modal fade" id="segErro01" data-keyboard="false" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title">ERRO - Segunda-feira</label>
                    </div>
                    <div class="modal-body">
                        <label>O horário de início 1 não pode ser MAIOR que o horário de término 1.</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Modal -->

    <!-- Modal  -->
    <div class="container">
        <div class="modal fade" id="segErro02" data-keyboard="false" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title">ERRO - Segunda-feira</label>
                    </div>
                    <div class="modal-body">
                        <label>O horário de inínio 2 não pode ser MENOR que o horário de término 1.</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Modal -->

    <!-- Modal  -->
    <div class="container">
        <div class="modal fade" id="segErro03" data-keyboard="false" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title">ERRO - Segunda-feira</label>
                    </div>
                    <div class="modal-body">
                        <label>O horário de inínio 2 não pode ser maior que o horário de término 2.</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Modal -->
    <!-- ##################################### -->
    <!-- Modal  -->
    <div class="container">
        <div class="modal fade" id="terErro01" data-keyboard="false" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title">ERRO - Terça-feira</label>
                    </div>
                    <div class="modal-body">
                        <label>O horário de início 1 não pode ser MAIOR que o horário de término 1.</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Modal -->

    <!-- Modal  -->
    <div class="container">
        <div class="modal fade" id="terErro02" data-keyboard="false" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title">ERRO - Terça-feira</label>
                    </div>
                    <div class="modal-body">
                        <label>O horário de inínio 2 não pode ser MENOR que o horário de término 1.</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Modal -->

    <!-- Modal  -->
    <div class="container">
        <div class="modal fade" id="terErro03" data-keyboard="false" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title">ERRO - Terça-feira</label>
                    </div>
                    <div class="modal-body">
                        <label>O horário de inínio 2 não pode ser maior que o horário de término 2.</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Modal -->
    <!-- ##################################### -->
    <!-- Modal  -->
    <div class="container">
        <div class="modal fade" id="quaErro01" data-keyboard="false" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title">ERRO - Quarta-feira</label>
                    </div>
                    <div class="modal-body">
                        <label>O horário de início 1 não pode ser MAIOR que o horário de término 1.</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Modal -->
    <!-- Modal  -->
    <div class="container">
        <div class="modal fade" id="quaErro02" data-keyboard="false" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title">ERRO - Quarta-feira</label>
                    </div>
                    <div class="modal-body">
                        <label>O horário de inínio 2 não pode ser MENOR que o horário de término 1.</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Modal -->
    <!-- Modal  -->
    <div class="container">
        <div class="modal fade" id="quaErro03" data-keyboard="false" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title">ERRO - Quarta-feira</label>
                    </div>
                    <div class="modal-body">
                        <label>O horário de inínio 2 não pode ser maior que o horário de término 2.</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Modal -->
    <!-- ##################################### -->
    <!-- Modal  -->
    <div class="container">
        <div class="modal fade" id="quaErro01" data-keyboard="false" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title">ERRO - Quarta-feira</label>
                    </div>
                    <div class="modal-body">
                        <label>O horário de início 1 não pode ser MAIOR que o horário de término 1.</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Modal -->
    <!-- Modal  -->
    <div class="container">
        <div class="modal fade" id="quaErro02" data-keyboard="false" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title">ERRO - Quarta-feira</label>
                    </div>
                    <div class="modal-body">
                        <label>O horário de inínio 2 não pode ser MENOR que o horário de término 1.</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Modal -->
    <!-- Modal  -->
    <div class="container">
        <div class="modal fade" id="quaErro03" data-keyboard="false" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title">ERRO - Quarta-feira</label>
                    </div>
                    <div class="modal-body">
                        <label>O horário de inínio 2 não pode ser maior que o horário de término 2.</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Modal -->
    <!-- ##################################### -->
    <!-- Modal  -->
    <div class="container">
        <div class="modal fade" id="quiErro01" data-keyboard="false" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title">ERRO - Quinta-feira</label>
                    </div>
                    <div class="modal-body">
                        <label>O horário de início 1 não pode ser MAIOR que o horário de término 1.</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Modal -->
    <!-- Modal  -->
    <div class="container">
        <div class="modal fade" id="quiErro02" data-keyboard="false" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title">ERRO - Quinta-feira</label>
                    </div>
                    <div class="modal-body">
                        <label>O horário de inínio 2 não pode ser MENOR que o horário de término 1.</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Modal -->
    <!-- Modal  -->
    <div class="container">
        <div class="modal fade" id="quiErro03" data-keyboard="false" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title">ERRO - Quinta-feira</label>
                    </div>
                    <div class="modal-body">
                        <label>O horário de inínio 2 não pode ser maior que o horário de término 2.</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Modal -->
    <!-- ##################################### -->
    <!-- Modal  -->
    <div class="container">
        <div class="modal fade" id="sexErro01" data-keyboard="false" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title">ERRO - Sexta-feira</label>
                    </div>
                    <div class="modal-body">
                        <label>O horário de início 1 não pode ser MAIOR que o horário de término 1.</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Modal -->
    <!-- Modal  -->
    <div class="container">
        <div class="modal fade" id="sexErro02" data-keyboard="false" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title">ERRO - Sexta-feira</label>
                    </div>
                    <div class="modal-body">
                        <label>O horário de inínio 2 não pode ser MENOR que o horário de término 1.</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Modal -->
    <!-- Modal  -->
    <div class="container">
        <div class="modal fade" id="sexErro03" data-keyboard="false" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title">ERRO - Sexta-feira</label>
                    </div>
                    <div class="modal-body">
                        <label>O horário de inínio 2 não pode ser maior que o horário de término 2.</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Modal -->
    <!-- ##################################### -->
    <!-- Modal  -->
    <div class="container">
        <div class="modal fade" id="sabErro01" data-keyboard="false" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title">ERRO - Sábado</label>
                    </div>
                    <div class="modal-body">
                        <label>O horário de início 1 não pode ser MAIOR que o horário de término 1.</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Modal -->
    <!-- Modal  -->
    <div class="container">
        <div class="modal fade" id="sabErro02" data-keyboard="false" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title">ERRO - Sábado</label>
                    </div>
                    <div class="modal-body">
                        <label>O horário de inínio 2 não pode ser MENOR que o horário de término 1.</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Modal -->
    <!-- Modal  -->
    <div class="container">
        <div class="modal fade" id="sabErro03" data-keyboard="false" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title">ERRO - Sábado</label>
                    </div>
                    <div class="modal-body">
                        <label>O horário de inínio 2 não pode ser maior que o horário de término 2.</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Modal -->
    <!-- ##################################### -->

    <script src="../js/valida_horarios.js"></script>
    <script src="../js/cad_usuario.js"></script>
    <?php include('../etc/footer.php'); ?>
</body>

</html>
