<?php 
    if(!isset($_SESSION)){
        @session_start();    
    }
    if(!isset($_SESSION['login'])){
        session_destroy();
        header("Location: index.php"); exit;
    }
?>
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="main.php"><!--<img src="../img/menu_uf.png">-->commented img</a>
    </div>
    <!-- /.navbar-header -->      
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="main.php"><i class="fa fa-home fa-fw"></i> Home</a>
                </li>
                <li>
                    <a href="meus_atend.php"><i class="fa fa-info-circle fa-fw"></i> Meus atendimentos</a>
                </li>
                <li>
                    <a href="historico.php"><i class="fa fa-history fa-fw"></i> Histórico</a>
                </li>
                <?php
                    if($_SESSION['user_st_tipo'] == 'a' || $_SESSION['user_st_tipo'] == 's'){
                        $admin ='<li>																					     ';
                        $admin.='    <a href="#"><i class="fa fa-plus fa-fw"></i> Cadastros<span class="fa arrow"></span></a>';
                        $admin.='    <ul class="nav nav-second-level">                                                       ';
                        $admin.='        <li>                                                                                ';
                        $admin.='            <a href="usuarios.php"><i class="fa fa-users"></i> Usuários</a>                 ';
                        $admin.='        </li>                                                                               ';
                        $admin.='        <li>                                                                                ';
                        $admin.='            <a href="setores.php"><i class="fa fa-university"></i> Setores</a>              ';
                        $admin.='        </li>                                                                               ';
                        $admin.='        <li>                                                                                ';
                        $admin.='            <a href="guiches.php"><i class="fa fa-cubes"></i> Guichês</a>                   ';
                        $admin.='        </li>                                                                               ';
                        $admin.='        <li>                                                                                ';
                        $admin.='            <a href="emails.php"><i class="fa fa-envelope"></i> E-mails</a>              ';
                        $admin.='        </li>                                                                               ';
                        $admin.='    </ul>                                                                                   ';
                        $admin.='    <!-- /.nav-second-level -->                                                             ';
                        $admin.='</li>                                                                                       ';
                        $admin.='<li>                                                                                        ';
                        $admin.='    <a href="relatorio.php"><i class="fa fa-paste"></i> Relatórios</a>                      ';
                        $admin.='</li>																						 ';
                        //$admin.='<li>                                                                                        ';
                        //$admin.='    <a href="agendamentos.php"><i class="fa fa-calendar"></i> Agendamentos</a>              ';
                        //$admin.='</li>																					   ';
                        $admin.='<li>                                                                                        ';
                        $admin.='    <a href="configuracoes.php"><i class="fa fa-gear"></i> Configuracoes</a>                ';
                        $admin.='</li>	                                                                                     ';
                        echo $admin;
                    }
                ?>
                <li>
                    <a href="dados.php"><i class="fa fa-user fa-fw"></i> Meus dados</a>
                </li>
                <li>
                    <a href="../services/logout.php"><i class="fa fa-sign-out"></i> Sair</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
<!-- Page Content -->