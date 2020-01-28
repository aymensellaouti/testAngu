<?php
//On commence par inclure la classe personne
include 'Produit.php';
// on instancie un objet de cette classe
$produit = new Produit();
//die('j ai construit mon objet');
@$produit->codep = $_POST['codep'];
@$produit->nomp = $_POST['nomp'];
@$produit->desc = $_POST['desc'];
@$produit->des = $_POST['des'];
@$produit->stock = $_POST['stock'];
@$produit->im1= $_FILES['im1']['name'];
@$produit->im2= $_FILES['im2']['name'];
@$produit->video = $_POST['video'];
@$produit->code_cat=$_POST['code_cat'];
@$produit->code_sous_cat= $_POST['code_scat'];
@$produit->prix = $_POST['prix'];
@$produit->promo = $_POST['promo'];
@$produit->vendu = $_POST['vendu'];
?>