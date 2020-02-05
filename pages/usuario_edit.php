<?php 
    if(!isset($_SESSION)){
        @session_start();    
    }
    if(!isset($_SESSION['login'])){
        session_destroy();
        header("Location: index.php"); exit;
    }

    include('../services/cad_tb_user.php');

    $user_in_id = $_GET['user_in_id'];
    $cad_tb_user = new cad_tb_user();
    
    $Rs = $cad_tb_user->listaSetores();
    $qtdSetor = $Rs == '' ? '' : count($Rs);

    $Rs_2 = $cad_tb_user->buscaUsuario($user_in_id);
    $qtdUser = count($Rs_2);

    $Rs_3 = $cad_tb_user->buscaGuiches();
    $qtdGuiche = count($Rs_3);

    $situacao = $Rs_2[0]['user_in_status'] == 1 ? 'Ativo' : 'Inativo';
    //$tipo = $Rs_2[0]['user_st_tipo'] == 'a' ? 'Administrador' : 'Atendente';
    switch($Rs_2[0]['user_st_tipo']){
		
		case 'a':
			$tipo = 'Administrador';
			break;
		
		case 'u':
			$tipo = 'Atendente';
			break;
			
        case 's': 
            $tipo = 'Supervisor';
			break;
	}

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
                        <h3 class="page-header"><button class="btn btn-primary" onclick="window.location.href='usuarios.php'"><i class="fa fa-arrow-left"></i> Voltar</button> Editar usuário</h3>
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
                                        <form action="../services/edit_user.php" method="post" role="form">
                                            <div class="form-group">
                                                <label>Cód. Usuário</label>
                                                <input class="form-control" name="user_in_id" readonly="yes" value="<?php echo $user_in_id; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Situação:</label>
                                                <input class="form-control" readonly="yes" readonly="yes" value="<?php echo $situacao; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Nome completo:</label>
                                                <input class="form-control" name="user_st_nome" placeholder="Ex: João Silva" value="<?php echo $Rs_2[0]['user_st_nome'];?>"required>
                                            </div>
                                            <div class="form-group">
                                                <label>Login:</label>
                                                <input class="form-control" name="user_st_login" placeholder="Ex: joao.silva" value="<?php echo $Rs_2[0]['user_st_login'];?>" required>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="checkSenha">Nova senha
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label>Senha:</label>
                                                <input class="form-control" readonly="yes" type="password" name="user_st_senha" id="user_st_senha" value="<?php echo $Rs_2[0]['user_st_senha'];?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Confirmar senha:</label>
                                                <input class="form-control" readonly="yes" type="password" name="user_confirma_senha" id="user_confirma_senha">
                                            </div>

                                            <button type="submit" id="btSalvar" class="btn btn-primary">Salvar alterações</button>  
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Setores atrbuídos:</label>
                                                <input class="form-control" readonly="yes" readonly="yes" value="<?php 
                                                    for($i=0; $i<$qtdUser; $i++){
                                                        $setores = $Rs_2[$i]['set_st_desc'].'; ';
                                                        echo $setores;
                                                    }
                                                ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Tipo:</label>
                                                <input class="form-control" readonly="yes" readonly="yes" value="<?php echo $tipo; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Guichê:</label>
                                                <input class="form-control" readonly="yes" readonly="yes" value="<?php echo $Rs_2[0]['gui_st_desc']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Editar situação:</label>
                                                <select required class="form-control" name="user_in_status">   
                                                    <option value="">Selecione...</option>
                                                    <option>Ativo</option>
                                                    <option>Inativo</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Tipo de usuário:</label>
                                                <select required class="form-control" name="user_st_tipo"> 
                                                    <option value="">Selecione...</option> 
                                                    <option>Administrador</option>
                                                    <option>Atendente</option>
                                                    <option>Supervisor</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Selecione o guichê:</label>
                                                <select required class="form-control" name="gui_in_id"> 
                                                    <option value="">Selecione...</option> 
                                                    <?php
                                                        for($i=0; $i<$qtdGuiche; $i++){
                                                            $selectContent = '<option>'.$Rs_3[$i]['gui_in_id'].' - '.$Rs_3[$i]['gui_st_desc'].'</option>';
                                                            echo $selectContent;
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="checkbox-group required">
                                                <label>Selecione os setores (opcional):</label>                                                
                                                <?php
                                                    for($i=0; $i<$qtdSetor; $i++){
                                                        $checkboxSetor = '<div class="checkbox">';
                                                        $checkboxSetor.= '<label>';
                                                        $checkboxSetor.= '<input type="checkbox" name="setorCheckBox[]" value="'.$Rs[$i]['set_in_id'].'">'.$Rs[$i]['set_in_id'].' - '.$Rs[$i]['set_st_desc'];
                                                        $checkboxSetor.= '</label>';
                                                        $checkboxSetor.= '</div>';
                                                        echo $checkboxSetor;
                                                    }
                                                ?>  
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
    <script src="../js/usuario_edit.js"></script>
    <?php include('../etc/footer.php'); ?>
</body>

</html>
