<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include('../etc/header.php'); ?>
    <script src="jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script>
        var intervalo = setInterval(function() { $('#status').load('status_tabela.php'); }, 100);
    </script>
</head>
<body>
    <div id="wrapper">
        <?php include('../etc/side_menu.php'); ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">Internet Status</h3>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div clss="col-lg-12">
                        <div id="status"></div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <?php include('../etc/footer.php'); ?>
</body>

</html>
