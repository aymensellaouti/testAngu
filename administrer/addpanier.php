<?php
/**
 * Created by PhpStorm.
 * User: aymen
 * Date: 08/03/16
 * Time: 17:55
 */
require_once 'Panier.php';
$panier = new Panier();
include '/MC/instanceProduit.php';
if(isset($_GET['id'])){
    $product=$produit->getProduitById($_GET['id']);
    if(empty($product)){
        die("ce produit n'exist pas");
    }
    $panier->add($_GET['id']);
    die('le produit a bien été ajouté');
}
else
{
    die("ce produit n'existe pas");
}

?>