<?php
session_start();
if (isset($_SESSION['sehelheadmin'])){
// die('indexadmin session ok ');
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
    <!-- Bootstrap -->

    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
</head>
<?php
include 'MC/instanceClient.php';
include 'MC/instanceProduit.php';
include 'MC/instanceCommande.php';
$repcomm=$commande->getAllCommandes();
$allCommandes=$repcomm->fetchAll(PDO::FETCH_OBJ);
?>
<body>

<div id="wrapper">

    <?php include_once 'nav.php';?>
<div class="col-lg-6">
    <h2>Gestion des commandes</h2>

    <?php if (isset($_GET['Msg'])){ ?>
        <div class="alert alert-dismissable alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <?php echo $_GET['Msg'] ; ?>
        </div>
    <?php } ?>
    <?php if (isset($_GET['err'])){ ?>
        <div class="alert alert-dismissable alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <?php echo $_GET['err'] ; ?>
        </div>
    <?php } ?>

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped tablesorter">
            <thead>
            <tr>
                <td colspan="3">Opérations <i class="fa fa-sort"></i></td>
                <th>Code commande <i class="fa fa-sort"></i></th>
                <th>Client  <i class="fa fa-sort"></i></th>
                <th>Date Commande <i class="fa fa-sort"></i></th>
                <th>Etat Commande <i class="fa fa-sort"></i></th>
                <th>Date livraison <i class="fa fa-sort"></i></th>
                <th>Type livraison <i class="fa fa-sort"></i></th>
            </tr>
            </thead>
            <tbody>
            <?php  foreach ($allCommandes as $thiscomm): ?>
            <tr>
                <td><a class="btn-success" href="detailCommande.php?id=<?php echo $thiscomm->idCommande; ?>" >
                        <button type="button" class="btn btn-success"><i class="fa fa-align-justify"></i> Détails commande</button>
                    </a></td>
                <td><a class="btn-success" href="modifierCommande.php?id=<?php echo $thiscomm->idCommande; ?>" >
                        <button type="button" class="btn btn-info"><i class="fa fa-pencil-square-o"></i> Modifier commande</button>
                </a></td>
                <!-- la fonction javascript confirm permet de verifier si le user confirme ou pas la supprimer -->
                <td><a href="supprimecommande.php?id=<?php echo $thiscomm->idCommande ?>" onclick="if(!confirm('voulez vous supprimer'))return false;">
                        <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i> Supprimer</button>
                    </a>
                </td>
                <td><?=$thiscomm->idCommande ?> </td>
                <td><?php echo $client->getNomClientById($thiscomm->idClient) ?></td>
                <td><?php echo $thiscomm->dateCommande ?></td>
                <td><?php echo $thiscomm->etat?> </td>
                <td><?php echo $thiscomm->dateLivraison?> </td>
                <td><?php echo $thiscomm->livraison?> </td>
            </tr>
            <?php
            endforeach
            ?>
            </tbody>
        </table>
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
else
{
//  die('adconnecti');
    $redirect="../adconnecti.php";
    include 'redirection.php';
}
?>