<?php
// ca c'est la classe sp�cifique � la table personne 
//d'habitude chaque table � une classe qui lui est associ�
include_once  'cnxpdo.php';
class Commande
{
    protected $bdd;
    public function __construct(){
        $bdd=cnxpdo::getConnection();
        $this->bdd=$bdd;
    }


public function AjoutCommande()
{

$req="insert into commande (idClient,livraison) values ('".$this->idu."','".$this->livraison."')" ;
 //   die($req);
    $rep=$this->bdd->exec($req);

    $idu=$this->bdd->lastInsertId();
if ($rep)
return $idu;
return -1 ;
}
    public function MAJcommande()
    {
        $sql = "UPDATE `sehelhet_eshel`.`commande` SET `livraison` ='".$this->livraison."', dateLivraison='".$this->dateLivraison."', etat='".$this->etat."' WHERE `commande`.`idCommande`=".$_POST['id'];
        //die($sql);
        $rep=$this->bdd->exec($sql);
        if ($rep)
            return true;
        return false ;
    }


public function AjoutProdCommande($idcom,$idprod,$qte,$prixt){
    $req="insert into produitcommande (`id`, `idCom`, `idProd`, `qte`, `prixt`) values (null,'".$idcom."','".$idprod."','".$qte."','".$prixt."')" ;
    $rep=$this->bdd->exec($req);
}

public function getAllCommandes(){
    $req="select *  from commande" ;
           $rep= $this->bdd->query($req);
    return $rep ;
}

public function getCommandeById($id){
    $req="select * from commande where idCommande=".$id ;
    $rep= $this->bdd->query($req);
    return $rep ;
}

public function getNbCommandesEnAttente()
{
    $req="select count(*) as nbcea from commande where etat='En Attente'" ;
        $rep= $this->bdd->query($req);
    return $rep ;
}

    public function getProdCommandeById($id){
        $req="select *  from produitcommande where idCom=".$id ;
              $rep= $this->bdd->query($req);
        return $rep ;
    }

    public function getNbCommandesValidees()
    {
        $req="select count(*) as nbcv from commande where etat='Valide'" ;
        $rep= $this->bdd->query($req);
        return $rep ;
    }


    public function getNbCommandesAnnulee()
    {
        $req="select count(*) as nbca from commande where etat='Annulee'" ;
        $rep= $this->bdd->query($req);
        return $rep ;
    }

    public function getLastCommandes($nb){
        $req="select * from commande  ORDER BY dateCommande DESC LIMIT ".$nb."" ;
        $rep=$this->bdd->query($req);
        return $rep ;
    }

    public function nbProdComm($id){
        $req="select count(*) as nbcommande from produitcommande where idCom=".$id ;
        $rep= $this->bdd->query($req);
        return $rep ;

    }

    public function prixProdComm($id){
        $req="select sum(prixt) as prixt from produitcommande where idCom=".$id ;
        $rep= $this->bdd->query($req);
        return $rep ;

    }

    public function deCommProd($id){
        $sql="delete from produitcommande where idCom=".$id ;
        $req=$this->bdd->exec($sql);
        if ($req)
            return true;
        return false ;
    }

    public function delComm($id){

        $sql="delete from commande where idCommande=".$id ;
     //   die($sql);
        $req=$this->bdd->exec($sql);
        if ($req)
        {
            $this->deCommProd($id);
            return true;
        }
        return false ;
    }

}
?>