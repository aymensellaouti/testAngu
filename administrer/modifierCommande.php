<?php
session_start();
if (isset($_SESSION['sehelheadmin'])){
    if(isset($_GET['id'])){


    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Dashboard SehelheTeshel</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">

        <!-- Add custom CSS here -->
        <link href="css/sb-admin.css" rel="stylesheet">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <!-- Page Specific CSS -->
        <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
    </head>
    <?php
    include 'MC/instanceClient.php';
    include 'MC/instanceProduit.php';
    include 'MC/instanceCommande.php';
    $repcomm=$commande->getCommandeById($_GET['id']);
    $thiscomm=$repcomm->fetch(PDO::FETCH_OBJ);
    $repProduitsCommande=$commande->getProdCommandeById($thiscomm->idCommande);
    $produitsCommande=$repProduitsCommande->fetchAll(PDO::FETCH_OBJ);

    ?>
    <body>

    <div id="wrapper">

        <?php include_once 'nav.php';?>
<div id="page-wrapper"
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><a href="GestionCommande.php"><i class="icon-dashboard"></i> Gestion Commandes</a></li>
                    <li class="active"><i class="icon-file-alt"></i>Modifier commande</li>
                </ol>
            </div>
        </div><!-- /.row -->

        <div class="col-lg-6">
            <h2>Commande <?=$_GET['id']?> </h2>
<form action="modifcom.php" method="post">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped tablesorter">
                    <tbody>
                        <tr>
                            <td>Client</td>
                            <td><?php echo $client->getNomClientById($thiscomm->idClient) ?></td>
                        <tr>
                        <tr>
                            <td>Date de commande</td>
                            <td><?php echo $thiscomm->dateCommande ?></td>
                        </tr>
                        <tr>
                            <td>Etat de la commande</td>
                            <td>
                                <select class="form-control" name="etat">
                                    <option><?php echo $thiscomm->etat?></option>
                                    <option>En Attente</option>
                                    <option>Valide</option>
                                    <option>Annulee</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Date de livraison de la commande</td>
                            <td><input type="date" name="dateLivraison" value="<?php echo $thiscomm->dateLivraison?>"> </td>
                        </tr>
                            <td>Méthode de livraison</td>
                            <td>
                                <select class="form-control" name="livraison">
                                    <option><?php echo $thiscomm->livraison?></option>
                                    <option>Domicile</option>
                                    <option>Bureau</option>
                                </select>
                             </td>
                        </tr>
                    </tbody>
                </table>
             <input type="hidden" value="<?=$_GET['id']?>" name="id">
             <input type="submit" class="btn-info">
             </form>
             </div>

            </div>

        </div>
        </div>
    </div><!-- /.row -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>

    </body>
    </html>
<?php
    }
    else{
        $err="Commande innexistante";
        $redirect="GestionCommande.php?err=".$err;
        include 'redirection.php';

    }
}
else
{
//  die('adconnecti');
    $redirect="../adconnecti.php";
    include 'redirection.php';
}
?>