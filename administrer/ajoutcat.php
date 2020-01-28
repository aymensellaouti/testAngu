<?php
/**
 * Created by PhpStorm.
 * User: aymen
 * Date: 23/02/16
 * Time: 16:24
 */
session_start();
if (isset($_SESSION['sehelheadmin'])){
    // die('indexadmin session ok ');
include_once  'MC/instanceClient.php';
//die($produit->im1);
//die($_FILES['im1']['tmp_name']);
//die('data divers du prod'.$produit->nomp.$produit->desc.'sous categorie = '.$produit->code_sous_cat);
//die('la catégorie est : '.$cat['code_cat']. 'sous catégorie est :'.$cat['cat_m']);
if ($categorie->AjoutCategorie())
{   //.$produit->codep

    $Msg = 'ajout réalisé avec succés';
    $redirect="GestionCategorie.php?Msg=".$Msg;
}
else
{
    $err='Problème lors de l\'ajout';
    $redirect="GestionCategorie.php?err=".$err;
}


}
else
{
//  die('adconnecti');
    $redirect="../adconnecti.php";

}
include 'redirection.php';
?>