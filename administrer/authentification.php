<?php
include_once  'MC/instanceClient.php';
$json=array();
$json['flag']=false;
if (!isset($_SESSION)){
    session_start();
}

if(!isset($_POST['email']) || !isset($_POST['password']))
{
    $json['msg']="les données ne sont pas transmises";

/*if(isset($_SESSION['sehelheuser']))
{
    die('la session existe deja');
}*/
}
else{


    $client->mail=$_POST['email'];

    $client->pwd=$_POST['password'];
//die('email et pwd'.$client->mail.' et '.$client->pwd);

    $repcat=$client->authentification();

//die($repcat);

    $res=$repcat->fetch();
    if(!isset($res['code_client']))
    {
       $json['msg']="Vérifier vos données";
        //   die('non connecté');
    }
    else
    {
        //  $json['error']="false";
        if (!isset($_SESSION['sehelheuser'])){
            $_SESSION['sehelheuser']=array();
        }
        $_SESSION['sehelheuser']['code']=$res['code_client'];

        $_SESSION['sehelheuser']['nom']=$res['nom_client'];
        $_SESSION['sehelheuser']['prenom']=$res['prenom_client'];
        //  die ('bienvenu '.$_SESSION['sehelheuser']['nom'].' '.$_SESSION['sehelheuser']['prenom']);

         $json['flag']=true;
         $json['msg']="bienvenu".$_SESSION['sehelheuser']['nom'].' '.$_SESSION['sehelheuser']['prenom'];

        //      $err= 'Problème d\'execution';
    }



}

echo json_encode($json);

// include 'redirection.php';

?>
