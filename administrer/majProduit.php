<?php
/**
 * Created by PhpStorm.
 * User: aymen
 * Date: 22/02/16
 * Time: 17:50
 */
session_start();
if (isset($_SESSION['sehelheadmin'])){

include_once  'MC/instanceProduit.php';
include_once  'MC/instanceCategorie.php';
$repcat=$categorie->listeCategories();
$repcat2=$produit->getProduitById($_GET['id']);
$prod=$repcat2->fetch();
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
                <h1>Modifier Produit </h1>
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="icon-dashboard"></i> Gestion Produit</a></li>
                    <li class="active"><i class="icon-file-alt"></i>Modifier Produit</li>
                </ol>
            </div>
        </div><!-- /.row -->
        <div class="row">


            <div class="col-lg-9">

                <form role="form" action="modifprod.php" enctype="multipart/form-data" method="post">
                    <input class="form-control" name="codep" value="<?php echo $_GET['id'] ?>" type="hidden">
                    <div class="form-group">
                        <label>Nom Produit</label>
                        <input class="form-control" name="nomp" value="<?php echo $prod['nom'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Designation</label>
                        <input class="form-control" value="<?php echo $prod['designation'] ?>" name="des">
                    </div>
                    <div class="form-group">
                        <label>Catégorie</label>
                        <?php
                        $repcatDM= $categorie->getCategorieMere($prod['sous_cat']);

                       // die('sous gategorie est : '.$prod['sous_cat']);
                        $catdes=$repcatDM->fetch();
                        // die('designation de la sous catégorie est '.$catdes['designation']);
                        ?>
                        <select class="form-control" name="code_scat">
                            <option selected value="<?php echo $prod['sous_cat']; ?>"><?php echo $catdes['designation'] ; ?></option>
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
                        <input name="stock" class="form-control" value="<?php echo $prod['stock'] ?>" type="number" >
                    </div>
                    <div class="form-group">
                        <label>Prix</label>
                        <input class="form-control" name="prix" value="<?php echo $prod['nom'] ?>" type="number">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="3" name="desc"><?php echo $prod['description'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Promotion</label>
                        <input class="form-control" name="promo" value="<?php echo $prod['promotion'] ?>" type="number" >
                    </div>
                    <label>Image 1</label>
                    <div class="form-group input-group">
                        <img src="../produit/<?php echo $prod['image1'] ; ?>" height="120" width="120" />
                        <input type="file" class="form-control" name="im1" >
                             <span class="input-group-btn">
                                   <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                             </span>
                    </div>
                    <label>Image 2</label>
                    <img src="../produit/<?php echo $prod['image2'] ; ?>" height="120" width="120" />
                    <div class="form-group input-group">
                        <input type="file" class="form-control" name="im2" >
                             <span class="input-group-btn">
                                   <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                             </span>
                    </div>
                    <div class="form-group">
                        <label>Vendu</label>
                        <input class="form-control" name="vendu" value="<?php echo $prod['vendu'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Video Produit</label>
                        <input class="form-control" name="video" value="<?php echo $prod['video'] ?>">
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