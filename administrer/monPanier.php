<?php
/**
 * Created by PhpStorm.
 * User: aymen
 * Date: 08/03/16
 * Time: 18:15
 */
include_once 'MC/instanceProduit.php';
session_start();
//var_dump($_SESSION);

$keys=array_keys($_SESSION['monPanier']);

if (!empty($keys))
{
$ids='('.implode(',',$keys).')';
//var_dump($ids);
$products=$produit->getProduitsByIds($ids)->fetchAll(PDO::FETCH_OBJ);
}
else
{
    $products=array();
}
foreach ($products as $product):

 echo $product->designation.'<br>';

endforeach

?>
