<?php
/**
 * Created by PhpStorm.
 * User: aymen
 * Date: 23/02/16
 * Time: 16:24
 */
session_start();
if (isset($_SESSION['sehelheadmin'])){
ob_start();
include_once  'MC/instanceClient.php';


if($client->SupprimerClientById($_GET['id']))
{
    $Msg= 'Suppression réalisée avec succés';
    $redirect="GestionClient.php?Msg=".$Msg;
}
else
{
    $err= 'Problème d\'execution';
    $redirect="GestionClient.php?err=".$err;
}
}
else
{
//  die('adconnecti');
    $redirect="../adconnecti.php";

}
include 'redirection.php';
?>