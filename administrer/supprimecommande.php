<?php
/**
 * Created by PhpStorm.
 * User: aymen
 * Date: 17/03/16
 * Time: 09:47
 */

session_start();
if (isset($_SESSION['sehelheadmin'])){

    if(isset($_GET['id'])){


    include_once  'MC/instanceCommande.php';


    if($commande->delComm($_GET['id']))
    {
        $Msg= 'Suppression réalisée avec succés';
        $redirect="GestionCommande.php?Msg=".$Msg;;
    }
    else
    {
        $err= 'Problème d\'execution';
        $redirect="GestionCommande.php?err=".$err;
    }
  }
    else{
        $err= 'Veuillez Sélectionner le produit  supprimer';
        $redirect="GestionCommande.php?err=".$err;
    }
  }
else
{
    $redirect="../adconnecti.php";
}
include 'redirection.php';
?>