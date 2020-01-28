<?php
session_start();
if (isset($_SESSION['sehelheadmin'])){
// die('indexadmin session ok ');
    ?>
<!DOCTYPE html>
<html lang="fr">
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
include 'MC/instanceCategorie.php';
$repcat=$categorie->listeCompleteCategories();
?>
<body>

<div id="wrapper">

    <!-- Sidebar -->
    <?php include_once 'nav.php';?>
<div class="col-lg-6">
    <h2>Gestion des categories</h2>
    <h3><a href="ajoutCategorie.php">

            <button type="button" class="btn btn-info"><i class="fa fa-plus-circle"></i> Ajouter </button>

        </a> </h3>
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
                <th colspan="2">Opérations <i class="fa fa-sort"></i></th>
                <th>Code categorie <i class="fa fa-sort"></i></th>
                <th>Designation <i class="fa fa-sort"></i></th>
                <th>Catéorie mére <i class="fa fa-sort"></i></th>
                <th>Catégorie Français <i class="fa fa-sort"></i></th>
            </tr>
            </thead>
            <tbody>
            <?php  while($categories=$repcat->fetch()){ ?>
            <tr>
                <td><a href="modifCategorie.php?id=<?php echo $categories['code_cat']; ?>" target="_blank">
                        <button type="button" class="btn btn-success"><i class="fa fa-pencil-square-o"></i> Editer </button>
                    </a></td>
                <!-- la fonction javascript confirm permet de verifier si le user confirme ou pas la supprimer -->
                <td><a href="supprimecat.php?id=<?php echo $categories['code_cat']; ?>" onclick="if(!confirm('voulez vous supprimer'))return false;">
                        <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i> Supprimer</button>
                    </a></td>
                <td><?php echo $categories['code_cat']; ?> </td>
                <td><?php echo $categories['designation']; ?> </td>
                <td><?php echo $categories['cat_m']; ?></td>
                <td><?php echo $categories['cat_fr']; ?></td>

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