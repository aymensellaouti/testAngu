<?php
session_start();
if (isset($_SESSION['sehelheadmin'])){
include_once  'MC/instanceProduit.php';
include_once  'MC/instanceCategorie.php';
$repcat=$categorie->getCategorieMere($produit->code_sous_cat);
$cat=$repcat->fetch();
$produit->code_sous_cat =$cat['code_cat'];
$produit->code_cat =$cat['cat_m'];
if ($produit->Ajout_produit())
{   //.$produit->codep

    copy($_FILES['im1']['tmp_name'],'docs/'.$_FILES['im1']['name']);
    copy($_FILES['im2']['tmp_name'],'docs/'.$_FILES['im2']['name']);
    echo 'ajout réalisé avec succés';
    $redirect="GestionProduit.php";
}
else
    echo 'Problème d\'execution';

}
else
{
    $redirect="../adconnecti.php";
}

include 'redirection.php';
?>