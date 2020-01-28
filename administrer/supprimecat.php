<?php
session_start();
if (isset($_SESSION['sehelheadmin'])){
include_once  'MC/instanceCategorie.php';

if($categorie->supprimerCategorie($_GET['id']))
{
    $Msg= 'Suppression réalisée avec succés';
    $redirect="GestionCategorie.php?Msg=".$Msg;;
}
else
{
    $err= 'Problème d\'execution';
    $redirect="GestionCategorie.php?err=".$err;
}
}
else
{
    $redirect="../adconnecti.php";
}
include 'redirection.php';
?>