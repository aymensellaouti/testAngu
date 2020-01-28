<?php
session_start();
if (isset($_SESSION['sehelheadmin'])){

ob_start();
include_once  'MC/instanceClient.php';

$repcat=$client->RechercheClientById($_GET['cle']);
$thisClient=$repcat->fetch();
$repcatmail=$client->findClientByEmail($client->email);
$resmail=$repcatmail->fetch();

if($thisClient['mail']==$client->email)
{
  //  die('le mail n a pas été modifié');
    if ($client->Modifier_client($_GET['cle']))
    {
        $redirect="GestionClient.php";
    }
    else
    {
        echo 'Problème d\'execution';
    }
}
else
{  //    die('le mail  a été modifié');
    if ($resmail['code_client']==""&&$resmail['mail']=="")
    {   //  die('le mail  a  été modifié et il n existe pas dans la base on va donc insérer');
        if($client->Modifier_client($_GET['cle']))
        {
            $Msg = 'Modification réalisée avec succés';
            $redirect="GestionClient.php?Msg=".$Msg;
        }
        else
        {
            echo 'Problème d\'execution';
            $redirect="GestionClient.php"."&err=".$err;
        }
    }
    else if ($resmail['mail']!="")
    {
      //  die('le mail  a  été modifié et il existe dans la base on va donc pas insérer et on va retourner un message d erreur avec le code '.$thisClient['code_client']);
        $message="MailExistant";
      //  echo 'mail existant';
        $redirect="modifClient.php?id=".$thisClient['code_client']."&message=".$message;
    }

}

}
else
{
//  die('adconnecti');
    $redirect="../adconnecti.php";

}

include 'redirection.php';
?>