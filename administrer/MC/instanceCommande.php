<?php

//On commence par inclure la classe personne

include 'Commande.php';
// on instancie un objet de cette classe
$commande = new Commande();
//$req="insert into client values ('','".$this->name."','".$this->age."','".$this->email."','".$this->adr."','".$this->fichier."','".$this->dn."','".$this->login."','".$this->pwd."') " ;

@$commande->idc= $_GET['idc'];

@$commande->idu= $_SESSION['sehelheuser']['code'];

@$commande->etat = $_POST['etat'];

@$commande->dateLivraison = $_POST['dateLivraison'];
//die($_POST['dateLivraison']);

@$commande->livraison = $_POST['livraison'];

?>