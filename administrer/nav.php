<?php
/**
 * Created by PhpStorm.
 * User: aymen
 * Date: 24/02/16
 * Time: 19:10
 */
?>
<!-- Sidebar -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">SehelheTeshel</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="DashBoard.php.html">SehelheTeshel Administration</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li class="active"><a href="indexAdmin.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="GestionClient.php"><i class="fa fa-bar-chart-o"></i> Gestion des clients</a></li>
            <li><a href="GestionCommande.php"><i class="fa fa-table"></i> Gestion des commandes </a></li>
            <li><a href="GestionProduit.php"><i class="fa fa-edit"></i> Gestion des produits </a></li>
            <li><a href="GestionCategorie.php"><i class="fa fa-font"></i> Gestion des catégories </a></li>
        </ul>


        <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?=$_SESSION['sehelheadmin']['prenom'] ?> <?=$_SESSION['sehelheadmin']['nom'] ?>  <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="indexAdmin.php"><i class="fa fa-user"></i> Dashboard</a></li>
                    <li class="divider"></li>
                    <li><a href="DeconnectAdmin.php"><i class="fa fa-power-off"></i> Deconnexion</a></li>
                </ul>
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>
