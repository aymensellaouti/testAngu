<?php
session_start();
if (isset($_SESSION['sehelheadmin'])){
// die('indexadmin session ok ');
    ?>

    <?php
require 'Panier.php';
$panier = new Panier();
include 'MC/instanceProduit.php';
$repcat=$produit->listeProduits();
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

<body>

<div id="wrapper">

    <?php include_once 'nav.php';?>
<div class="col-lg-6">
    <h2>Gestion des produits</h2>
    <h3> <a href="ajoutProduit.php" >
            <button type="button" class="btn btn-info"><i class="fa fa-plus-circle"></i> Ajouter </button>
        </a></h3>
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
                <td colspan="2">Opérations <i class="fa fa-sort"></i></td>
                <th>Code produit <i class="fa fa-sort"></i></th>
                <th>Nom <i class="fa fa-sort"></i></th>
                <th>Designation <i class="fa fa-sort"></i></th>
                <th>Description <i class="fa fa-sort"></i></th>
                <th>Stock <i class="fa fa-sort"></i></th>
                <th>image1 <i class="fa fa-sort"></i></th>
                <th>image2 <i class="fa fa-sort"></i></th>
                <th>Vidéo <i class="fa fa-sort"></i></th>
                <th>Catégorie <i class="fa fa-sort"></i></th>
                <th>Sous Catégorie <i class="fa fa-sort"></i></th>
                <th>Prix <i class="fa fa-sort"></i></th>
                <th>Promotion <i class="fa fa-sort"></i></th>
                <th>Date Ajout <i class="fa fa-sort"></i></th>
                <th>Nombre d'articles vendu <i class="fa fa-sort"></i></th>
            </tr>
            </thead>
            <tbody>
            <?php  while($produits=$repcat->fetch()){ ?>
            <tr>

                <td><a href="majProduit.php?id=<?php echo $produits['code_produit']; ?>" >
                        <button type="button" class="btn btn-success"><i class="fa fa-pencil-square-o"></i> Editer </button>
                    </a></td>
                <!-- la fonction javascript confirm permet de verifier si le user confirme ou pas la supprimer -->
                <td><a href="supprimeprod.php?id=<?php echo $produits['code_produit']; ?>" onclick="if(!confirm('voulez vous supprimer'))return false;">
                        <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i> Supprimer</button>
                    </a></td>
                <td><?php echo $produits['code_produit']; ?> </td>
                <td><?php echo $produits['nom']; ?> </td>
                <td><?php echo $produits['designation']; ?></td>
                <td><?php echo $produits['description']; ?></td>
                <td><?php echo $produits['stock']; ?></td>
                <td><?php echo $produits['image1']; ?></td>
                <td><?php echo $produits['image2']; ?></td>
                <td><?php echo $produits['video']; ?></td>
                <td><?php echo $produits['categ']; ?></td>
                <td><?php echo $produits['sous_cat'];?></td>
                <td><?php echo $produits['Prix']; ?></td>
                <td><?php echo $produits['promotion'];?></td>
                <td><?php echo $produits['Date_ajout'];?></td>
                <td><?php echo $produits['vendu']; ?></td>
            </tr>
            <?php
            }
            //$repcat->closeCursor();
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