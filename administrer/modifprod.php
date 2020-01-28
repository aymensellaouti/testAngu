<?php
session_start();
if (isset($_SESSION['sehelheadmin'])){


include_once  'MC/instanceProduit.php';
include_once  'MC/instanceCategorie.php';

$repcat2=$produit->getProduitById($_POST['codep']);
$prod=$repcat2->fetch();
//die($prod['image1']);
//die($produit->im1);
//die($_FILES['im1']['tmp_name']);
//die('data divers du prod'.$produit->nomp.$produit->desc.'sous categorie = '.$produit->code_sous_cat);
//die('le code categorie est :'.$produit->code_sous_cat. 'quelques autres données'.$produit->nomp);
$repcat=$categorie->getCategorieMere($produit->code_sous_cat);
$cat=$repcat->fetch();

//die('la catégorie est : '.$cat['code_cat']. 'sous catégorie est :'.$cat['cat_m']);
$produit->code_sous_cat =$cat['code_cat'];
$produit->code_cat =$cat['cat_m'];
$i1=1;
$i2=1;
if (empty ($_FILES['im1']['name'])){
    echo ('im1 est vide');
    $produit->im1=$prod['image1'];
    echo($prod['image1']);
    $i1=0;
    echo $i1;
//    die('test absence de la première image');
}
else{
    $produit->im1=$produit->nomp.$produit->im1;
}
if (empty ($_FILES['im2']['name'])){
    echo ('im2 est vide');
    $produit->im2=$prod['image2'];
    echo($prod['image2']);
    $i2=0;
//    die('test absence de la deuxième image');
}
else
{
    $produit->im2=$produit->nomp.$produit->im2;
}

if($produit->MAJproduit())
{
    if($i1>0)

    copy($_FILES['im1']['tmp_name'],'../produit/'.$_POST['nomp'].$_FILES['im1']['name']);

    if($i2>0)
    copy($_FILES['im2']['tmp_name'],'../produit/'.$_POST['nomp'].$_FILES['im2']['name']);

    $Msg= 'Modification réalisée avec succés';
    $redirect="GestionProduit.php?Msg=".$Msg;
}
else
{
    $err='Problème lors de la modification';
    $redirect="GestionCategorie.php?err=".$err;
}

}
else
{
    $redirect="../adconnecti.php";
}
include 'redirection.php';
?>