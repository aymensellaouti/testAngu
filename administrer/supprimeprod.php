<?php

session_start();
if (isset($_SESSION['sehelheadmin'])){

include_once  'MC/instanceProduit.php';
include_once  'MC/instanceCategorie.php';

$repcat2=$produit->getProduitById($_GET['id']);
$prod=$repcat2->fetch();


if($produit->supprimerProduit($prod['code_produit']))
{
    unlink ("../produit/".$prod['image1']);
    unlink ("../produit/".$prod['image2']);
    $Msg= 'Suppression réalisée avec succés';
    $redirect="GestionProduit.php?Msg=".$Msg;;
}
else
{
    $err= 'Problème d\'execution';
    $redirect="GestionProduit.php?err=".$err;
}
}
else
{
    $redirect="../adconnecti.php";
}
include 'redirection.php';
?>