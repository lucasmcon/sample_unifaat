<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php 
        include('../etc/header.php'); 
    ?>  
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><button class="btn btn-primary" onclick="window.location.href='index.php'"><i class="fa fa-arrow-left"></i> Voltar</button> Recuperação de senha</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="../services/recupera_senha.php" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <label>Informe seu login:</label>
                                    <input class="form-control" placeholder="login" name="login_recupera" type="email" autofocus>
                                </div>
                                
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-primary btn-block">Recuperar </button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('../etc/footer.php'); ?>
</body>
</html>
