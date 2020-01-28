<?php
session_start();


if (isset($_SESSION['sehelheadmin'])){
   // die('indexadmin session ok ');
    include '/MC/instanceClient.php';
    include '/MC/instanceProduit.php';
    include '/MC/instanceCommande.php';

    $repNbProd=$produit->getNbProduit();
    $nbProd=$repNbProd->fetch();
    $repNbClient=$client->getNbClients();
    $nbClient=$repNbClient->fetch();
    $repNbCommandeEA=$commande->getNbCommandesEnAttente();
    $nbCommandeEA=$repNbCommandeEA->fetch();
    $repNbCommandeA=$commande->getNbCommandesAnnulee();
    $nbCommandeA=$repNbCommandeA->fetch();
    $repNbCommandeV=$commande->getNbCommandesValidees();
    $nbCommandeV=$repNbCommandeV->fetch();
    $replastCommandes=$commande->getLastCommandes(10);
    $lastComms=$replastCommandes->fetchAll(PDO::FETCH_OBJ);
    $repLastClients=$client->getLastClients(10);
    $lastCls=$repLastClients->fetchAll(PDO::FETCH_OBJ);
    $repLastProduits=$produit->getLastProd(10);
    $lastPros=$repLastProduits->fetchAll(PDO::FETCH_OBJ);
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tableau de bord SehelheTeshel</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <?php include_once 'nav.php';?>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Dashboard </h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
            </ol>
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-3">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-comments fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"><?= $nbProd['nbp']?></p>
                    <p class="announcement-text">Nombre de produit </p>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      Produits SehelheTeshel
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-check fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"><?= $nbClient['nbc']?></p>
                    <p class="announcement-text">Nombre de Clients</p>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      Clients SehelheTeshel
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="panel panel-danger">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-tasks fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"><?= $nbCommandeEA['nbcea']?></p>
                    <p class="announcement-text">Commandes en attentes</p>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      Commandes non traitées
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="panel panel-success">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-comments fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"><?= $nbCommandeV['nbcv']?></p>
                    <p class="announcement-text">Commandes traitées</p>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div><!-- /.row -->




          <div class="col-lg-6">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money"></i> Dernères commandes</h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped tablesorter">
                    <thead>
                      <tr>
                        <th>Code Commande <i class="fa fa-sort"></i></th>
                        <th>Passée le  <i class="fa fa-sort"></i></th>
                        <th>Nombre produit <i class="fa fa-sort"></i></th>
                        <th>Prix <i class="fa fa-sort"></i></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($lastComms as $comm): ?>
                    <?php
                    $nbProd=$commande->nbProdComm($comm->idCommande)->fetch();
                    $PT=$commande->prixProdComm($comm->idCommande)->fetch();
                    ?>
                    <tr>
                        <td><?=$comm->idCommande?></td>
                        <td><?=$comm->dateCommande ?></td>
                        <td><?=$nbProd['nbcommande']?></td>
                        <td><?=$PT['prixt']?> Dt</td>
                    </tr>
                    <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
                <div class="text-right">
                  <a href="GestionCommande.php">Voir toutes les commandes <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div>
          </div>

       <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-money"></i> Derniers Produits</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped tablesorter">
                            <thead>
                            <tr>
                                <th>Nom  <i class="fa fa-sort"></i></th>
                                <th>Prenom  <i class="fa fa-sort"></i></th>
                                <th>Email <i class="fa fa-sort"></i></th>
                                <th>gouvernorat <i class="fa fa-sort"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                       <?php foreach ($lastCls as $clt): ?>
                            <tr>
                                <td><?=$clt->nom_client?></td>
                                <td><?=$clt->prenom_client?></td>
                                <td><?=$clt->mail?></td>
                                <td><?=$clt->gouv?></td>
                            </tr>
                            <?php endforeach ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="text-right">
                        <a href="GestionClient.php">Voir tous les clients <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-money"></i> Derniers produits</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped tablesorter">
                            <thead>
                            <tr>
                                <th>Code  <i class="fa fa-sort"></i></th>
                                <th>nom  <i class="fa fa-sort"></i></th>
                                <th>Designation <i class="fa fa-sort"></i></th>
                                <th>Prix <i class="fa fa-sort"></i></th>
                                <th>Date Ajout <i class="fa fa-sort"></i></th>
                                <th>Stoch <i class="fa fa-sort"></i></th>
                                <th>Vendu <i class="fa fa-sort"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($lastPros as $lp): ?>
                                <tr>
                                    <td><?=$lp->code_produit?></td>
                                    <td><?=$lp->nom?></td>
                                    <td><?=$lp->designation?></td>
                                    <td><?=$lp->Prix?></td>
                                    <td><?=$lp->Date_ajout?></td>
                                    <td><?=$lp->stock?></td>
                                    <td><?=$lp->vendu?></td>
                                </tr>
                            <?php endforeach ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="text-right">
                        <a href="#">Voir tous les clients <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        </div><!-- /.row -->

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="js/morris/chart-data-morris.js"></script>
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>

  </body>
</html>
<?php
}
else
{
//  die('adconnecti');
  $redirect="../adconnecti.php";
  include 'redirection.php';
}
?>