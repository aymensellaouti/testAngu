<?php
session_start();
if (isset($_SESSION['sehelheadmin'])) {
    include_once 'MC/instanceCategorie.php';


    if ($categorie->MAJcategorie($_POST['id'])) {
        echo 'ajout réalisé avec succés';
        $Msg = "ajout réalisé avec succés";
        $redirect = "GestionCategorie.php?Msg=" . $Msg;
    } else {
        $err = 'Problème lors de la modification';
        $redirect = "GestionCategorie.php?err=" . $err;
    }

} else {
//  die('adconnecti');
    $redirect = "../adconnecti.php";
}
include 'redirection.php';
?>