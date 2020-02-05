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
                        <h3 class="panel-title text-center"><!--<img src="../img/unifaat.png"/>--></h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="../services/login.php" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="e-mail" name="login" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="senha" name="senha" type="password" value="">
                                    <!--<a style="margin-top:5px" onclick="window.location.href='recupera_senha.php'" class="btn btn-outline btn-primary btn-xs"><i class="fa fa-key"></i> Esqueci a senha</a>-->
                                </div>  
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-primary btn-block">Login </button>
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
