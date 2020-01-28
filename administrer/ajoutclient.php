<?php
session_start();
if (isset($_SESSION['sehelheadmin'])){
    // die('indexadmin session ok ');
include_once  'MC/instanceClient.php';



$repcat=$client->findClientByEmail($client->email);
$res=$repcat->fetch();


if ($res['code_client']==""&&$res['mail']=="")
{
    if($client->Ajout_client())
    {
        $Msg = 'ajout réalisé avec succés';
        $redirect="GestionClient.php";
    }
    else
    {
        $err= 'Problème d\'execution';
    }
}
else if ($res['mail']!="")
    {
        $message="MailExistant";
        echo 'mail existant';
        $redirect="AjouterClient.php?message=".$message;
    }


}
else
{
    $redirect="../adconnecti.php";
}
include 'redirection.php';
?>