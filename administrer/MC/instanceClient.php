<?php

//On commence par inclure la classe personne

include 'Client.php';
// on instancie un objet de cette classe
$client = new Client();
//$req="insert into client values ('','".$this->name."','".$this->age."','".$this->email."','".$this->adr."','".$this->fichier."','".$this->dn."','".$this->login."','".$this->pwd."') " ;
@$client->nom=$_POST['nomu'];
@$client->prenom=$_POST['prenomu'];
@$client->email=$_POST['emailu'];
@$client->gouv=$_POST['gouvu'];
@$client->adr=$_POST['adresseu'];
@$client->dn=$_POST['dn'];
@$client->login=$_POST['loginu'];
@$client->pwd=$_POST['pwd'];

//@$req="insert into personne values ('','".$_POST['nom']."','".$_POST['age']."','".$_POST['mail']."','".$_POST['adr']."','".$_FILES['fichier']['name']."','".$_POST['dn']."','".$_POST['login']."','".$_POST['pwd']."') " ;
?>