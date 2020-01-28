<?php

//On commence par inclure la classe personne

include 'Categorie.php';
// on instancie un objet de cette classe
$categorie = new Categorie();
//$req="insert into client values ('','".$this->name."','".$this->age."','".$this->email."','".$this->adr."','".$this->fichier."','".$this->dn."','".$this->login."','".$this->pwd."') " ;

@$categorie->cc= $_POST['codecat'];
@$categorie->des= $_POST['des'];
@$categorie->ccm = $_POST['codecatm'];
@$categorie->cfr = $_POST['catfr'];


?>