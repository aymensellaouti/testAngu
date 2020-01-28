<?php
session_start();
if (isset($_SESSION['sehelheadmin'])){
include_once '/MC/instanceCategorie.php';

$repcat=$categorie->listeCategories();
$repcatbyid=$categorie->getCategorieMere($_GET['id']);
$thiscat=$repcatbyid->fetch();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ajout Catégorie</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">


    <!-- Bootstrap Extended -->
    <link href="../common/bootstrap/extend/jasny-fileupload/css/fileupload.css" rel="stylesheet">
    <link href="../common/bootstrap/extend/bootstrap-wysihtml5/css/bootstrap-wysihtml5-0.0.2.css" rel="stylesheet">

</head>

<body>

<div id="wrapper">

<?php include_once 'nav.php';?>

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1>Modifier Catégorie </h1>
                <ol class="breadcrumb">
                    <li><a href="GestionCategorie.php"><i class="icon-dashboard"></i> Gestion Catégories</a></li>
                    <li class="active"><i class="icon-file-alt"></i>Modifier Catégorie</li>
                </ol>
            </div>
        </div><!-- /.row -->
        <div class="row">


            <div class="col-lg-9">

                <form role="form" action="modifcat.php" method="post">
                    <input type="hidden" value="<?php echo $_GET['id'] ;?>" name="id">
                    <div class="form-group">
                        <label>Designation</label>
                        <input class="form-control" name="des" value="<?php echo $thiscat['designation']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Catégorie</label>
                        <select class="form-control" name="codecatm">
                            <?php
                            $repcatbyid2=$categorie->getCategorieMere($thiscat['cat_m']);
                            $thiscat2=$repcatbyid2->fetch();
                            ?>
                            <option value="<?php echo $thiscat['cat_m']; ?>"><?php echo $thiscat2['designation']; ?></option>
                            <option value="0">C'est une catégorie mére</option>
                            <?php  while($categories=$repcat->fetch()){
                        ?>
                            <option value="<?php echo $categories['code_cat']; ?>"><?php echo $categories['designation']; ?></option>
                        <?php
                        }
                        //$repcat->closeCursor();
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nom Catégorie en Français</label>
                        <input name="catfr" class="form-control" value="<?php echo $thiscat['cat_fr']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
            </div>
        </div>
    </div><!-- /#page-wrapper -->



</div><!-- /#wrapper -->

<!-- JavaScript -->
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.js"></script>

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