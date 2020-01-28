<?php
/**
 * Created by PhpStorm.
 * User: aymen
 * Date: 22/02/16
 * Time: 14:46
 */

//include 'instanceProduit.php';
//echo "bjr test"."<br>";
include 'instanceCategorie.php';
//$monproduit=$produit->Recherche_produit(19);
$repcat=$categorie->listeCategories();
while($data=$repcat->fetch())
    echo $data['designation'].'<br>' ;
/*else
{
    echo $monproduit['nom'];
}
*/
?>
