<?php
// ca c'est la classe sp�cifique � la table personne 
//d'habitude chaque table � une classe qui lui est associ�
include_once  'cnxpdo.php';
class Client
{
    protected $bdd;
    public function __construct(){
        $bdd=cnxpdo::getConnection();
        $this->bdd=$bdd;
    }

public function Ajout_client()
{

    $req="insert into client values ('','".$this->email."','".$this->pwd."','".$this->nom."','".$this->prenom."','".$this->adr."','".$this->dn."','".$this->login."','".$this->gouv."') " ;
    $rep=$this->bdd->exec($req);
    if ($rep)
        return true;
    return false ;
}

public function Sajel_client()
{
        $req="insert into client values ('','".$this->email."','".$this->pwd."','".$this->nom."','".$this->prenom."','".$this->adr."','".$this->dn."','".$this->login."','".$this->gouv."') " ;
        $rep=$this->bdd->exec($req);
        $lid=$this->bdd->lastInsertId();
        if ($rep)
            return $lid;
        return -1 ;
}

public function Modifier_client($id)
{
echo $sql="update client set nom_client='".$this->nom."', prenom_client='".$this->prenom."',mail='".$this->email."',gouv='".$this->gouv."',adresse='".$this->adr."',dateNaissance='".$this->dn."',login='".$this->login."' where code_client='".$id." '";
    $rep=$this->bdd->exec($sql);
    if ($rep)
        return true;
    return false ;
}


public function listeClients()
{
$req="select * from client" ;
    $rep=$this->bdd->query($req);
return $rep ;
}

    public function listeClientsGov($gov){
        $req="select * from client where gouv='".$gov."'";
       // die($req);
             $rep=$this->bdd->query($req);
        return $rep ;

    }
public function findClientByEmail($mail)
{
//   die('ici');
   $req="select * from client where mail='".$mail."'" ;
        $rep= $this->bdd->query($req);
   return $rep ;

}
public function Recherche_client()
{
    $req="select * from client where code_client='".$this->id."'" ;
          $rep= $this->bdd->query($req);
    return $rep ;
}

public function RechercheClientById($id)
 {
   $req="select * from client where code_client='".$id."'" ;
         $rep= $this->bdd->query($req);
   return $rep ;
 }


public function getNbClients()
{
        $req="select count(*) as nbc from client" ;
            $rep= $this->bdd->query($req);
        return $rep ;
}

public function SupprimerClientById($id)
 {
   $sql="delete from client where code_client='".$id."'";
     $req=$this->bdd->exec($sql);
     if ($req)
         return true;
     return false ;
 }


public function Supprimer_client()
 {
   $sql="delete from client where code_client='".$this->id."'";
   $req=$this->bdd->exec($sql);
   if ($req)
         return true;
   return false ;
}


public function authentification()
{
    $req="select * from client where mail='".$this->mail."' and mdp='".$this->pwd."' " ;
    //die($req);
        $rep= $this->bdd->query($req);
    return $rep ;
}

    public function getLastClients($nb){
        $req="select * from client  ORDER BY code_client DESC LIMIT ".$nb."" ;
        $rep=$this->bdd->query($req);
        return $rep ;
    }

    public function getNomClientById($id){
        $req="select * from client where code_client=".$id ;
             $rep=$this->bdd->query($req);
        $repclient=$rep->fetch();
        return $repclient['nom_client']." ".$repclient['prenom_client'] ;
    }


}
?>