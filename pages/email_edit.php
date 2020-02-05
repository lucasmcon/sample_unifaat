<?php 
    if(!isset($_SESSION)){
        @session_start();    
    }
    if(!isset($_SESSION['login'])){
        session_destroy();
        header("Location: index.php"); exit;
    }

    include('../services/cad_tb_user.php');

    $con_in_id = $_GET['con_in_id'];
    $cad_tb_user = new cad_tb_user();
    $i = 0;
    $Rs = $cad_tb_user->buscaEmail($con_in_id);

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
                        <h3 class="page-header"><button class="btn btn-primary" onclick="window.location.href='emails.php'"><i class="fa fa-arrow-left"></i> Voltar</button> Conta de e-mail</h3>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <strong>Formulário de cadastro</strong>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form action="../services/edit_email.php" method="post" role="form">
                                            <div class="form-group">
                                                <label>Descrição</label>
                                                <input class="form-control" name="con_st_desc" value="<?php echo $Rs[$i]['con_st_desc'];?>" placeholder="Ex: E-mail Financeiro" required>
                                            </div>
                                            <div class="form-group">
                                                <label>email:</label>
                                                <input class="form-control" type="email" name="con_st_email" value="<?php echo $Rs[$i]['con_st_email']; ?>" placeholder="Ex: contato@unifaat.edu.br" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Senha:</label>
                                                <input class="form-control" type="password" name="con_st_senha" value="<?php echo $Rs[$i]['con_st_senha'] ?>" id="con_st_senha" required>
                                            </div>
                                            <button type="submit" id="btSalvar" class="btn btn-primary">Salvar alterações</button>  
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>SMTP</label>
                                                <input class="form-control" type="text" name="con_st_smtp" id="con_st_smtp" value="<?php echo $Rs[$i]['con_st_smtp']; ?>" placeholder="smtp.office365.com" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Porta</label>
                                                <input class="form-control" type="text" name="con_in_porta" id="con_st_porta" value="<?php echo $Rs[$i]['con_in_porta']; ?>" placeholder="587" required>
                                            </div>
                                            </div>
                                            <div class="form-group">                                                
                                                <div class="checkbox">
                                                    <label>
                                                    <input type="checkbox" name="con_in_tls" value="1" <?php echo $checked = $Rs[$i]['con_in_tls'] == 1 ? 'checked' : ''; ?>>Usa TLS
                                                    </label>
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
    <?php include('../etc/footer.php'); ?>
</body>
</html>
