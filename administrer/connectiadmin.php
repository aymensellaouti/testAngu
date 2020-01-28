<?php
/**
 * Created by PhpStorm.
 * User: aymen
 * Date: 15/03/16
 * Time: 14:36
 */
if (!isset($_SESSION)){
    session_start();
}

if(!isset($_POST['logina']) || !isset($_POST['mdpa']))
{
    $Msg="les données ne sont pas transmises";
    $redirect="../adconnecti.php?msg=".$Msg;
}
else{
    include_once  'cnxpdo.php';
    $bdd=cnxpdo::getConnection();


    $req="select * from admin where login='".$_POST['logina']."' and mdp='".$_POST['mdpa']."' " ;
    //die($req);
    $rep= $bdd->query($req);
    $res=$rep->fetch();
    if(!isset($res['code_admin']))
    {
        $Msg="Login ou mot de passe erronnées";
        $redirect="../adconnecti.php?msg=".$Msg;
    }
    else
    {
        if (!isset($_SESSION['sehelheadmin'])){
            $_SESSION['sehelheadmin']=array();
        }
        $_SESSION['sehelheadmin']['code']=$res['code_admin'];

        $_SESSION['sehelheadmin']['nom']=$res['Nom'];
        $_SESSION['sehelheadmin']['prenom']=$res['prenom'];
     //    die ('bienvenu '.$_SESSION['sehelheadmin']['nom'].' '.$_SESSION['sehelheadmin']['prenom']);
        $redirect="indexAdmin.php";
     }
}
include 'redirection.php';
?>
