<?php
session_start();
if (isset($_SESSION['sehelheadmin'])){

include_once 'MC/instanceCategorie.php';

$repcat=$categorie->listeCategories();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blank Page - SB Admin</title>

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
                <h1>Ajout Produit </h1>
                <ol class="breadcrumb">
                    <li><a href="GestionProduit.php"><i class="icon-dashboard"></i> Gestion Produit</a></li>
                    <li class="active"><i class="icon-file-alt"></i>Ajout Produit</li>
                </ol>
            </div>
        </div><!-- /.row -->
        <div class="row">


            <div class="col-lg-9">

                <form role="form" action="ajoutprod.php" enctype="multipart/form-data" method="post">

                    <div class="form-group">
                        <label>Nom Produit</label>
                        <input class="form-control" name="nomp">
                    </div>
                    <div class="form-group">
                        <label>Designation</label>
                        <input class="form-control" name="des">
                    </div>
                    <div class="form-group">
                        <label>Catégorie</label>
                        <select class="form-control" name="code_scat">
                        <?php  while($categories=$repcat->fetch()){
                        $repcatsc=$categorie->listeSousCategories($categories['code_cat']);
                        while($souscat=$repcatsc->fetch()){
                        ?>
                            <option value="<?php echo $souscat['code_cat']; ?>"><?php echo $souscat['designation']; ?></option>
                        <?php
                        }
                        }
                        //$repcat->closeCursor();
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Stock</label>
                        <input name="stock" class="form-control" type="number">
                    </div>
                    <div class="form-group">
                        <label>Prix</label>
                        <input class="form-control" name="prix" type="number">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="3" name="desc"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Promotion</label>
                        <input class="form-control" name="promo" type="number" >
                    </div>
                    <label>Image 1</label>
                    <div class="form-group input-group">
                        <input type="file" class="form-control" name="im1" required="true">
                             <span class="input-group-btn">
                                   <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                             </span>
                    </div>
                    <label>Image 2</label>
                    <div class="form-group input-group">
                        <input type="file" class="form-control" name="im2" required="true">
                             <span class="input-group-btn">
                                   <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                             </span>
                    </div>
                    <div class="form-group">
                        <label>Video Produit</label>
                        <input class="form-control" name="video">
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