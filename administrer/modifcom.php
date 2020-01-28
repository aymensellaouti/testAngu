<?php
session_start();
if (isset($_SESSION['sehelheadmin'])) {
    include_once 'MC/instanceCommande.php';


    if ($commande->MAJcommande()) {
        $Msg = "Modification réalisée avec succés";
        $redirect = "GestionCommande.php?Msg=".$Msg;
    } else {
        $err = 'Problème lors de la modification';
        $redirect = "GestionCommande.php?err=".$err;
    }

} else {
    $redirect = "../adconnecti.php";
}
include 'redirection.php';
?>