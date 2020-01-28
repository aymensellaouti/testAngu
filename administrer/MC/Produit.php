<?php
/**
 * Created by PhpStorm.
 * User: aymen
 * Date: 22/02/16
 * Time: 12:02
 */

// ca c'est la classe sp�cifique � la table personne
//d'habitude chaque table � une classe qui lui est associ�
include_once  'cnxpdo.php';
class Produit
{
    protected $bdd;
    public function __construct(){
        //$this->cnx=cnxpdo();
        //$this->bdd=$this->cnx->getConnection();
        $bdd=cnxpdo::getConnection();
        $this->bdd=$bdd;
    // ok    die('j ai constriot mon objet et ma cnxx');
    }

    public function Ajout_produit()
    {
        $this->im1=$this->nomp.$this->im1;
        $this->im2=$this->nomp.$this->im2;
      // die('je vais ajouter le produit');
            $req="INSERT INTO produit (nom,description,designation, stock, image1,image2,video,categ,sous_cat,Prix,promotion,vendu)
VALUES ('$this->nomp','$this->desc','$this->des', '$this->stock' , '$this->im1' ,'$this->im2','$this->video','$this->code_cat','$this->code_sous_cat','$this->prix','$this->promo',0);";
        //die($req);
        $rep=$this->bdd->exec($req);
        if ($rep)
            return true;
        return false ;
    }

    public function MAJproduit()
    {
        $sql = "UPDATE `produit` SET `nom`='$this->nomp',`description`='$this->desc',`designation`='$this->des',`stock`='$this->stock',`image1`='$this->im1',`image2`='$this->im2',`video`='$this->video',`vendu`='$this->vendu',`categ`='$this->code_cat',`sous_cat`='$this->code_sous_cat',`Prix`='$this->prix',`promotion`='$this->promo' WHERE `code_produit`='$this->codep'";
//        die($sql);
        $rep=$this->bdd->exec($sql);
        if ($rep)
            return true;
        return false ;
    }


    public function listeProduits()
    {

        $req=" select * from produit" ;
                $rep= $this->bdd->query($req);
        return $rep ;
    }


    public function getProduitsByIds($ids)
    {
        $req="select * from produit where code_produit IN  ". $ids." " ;
        $rep=$this->bdd->query($req);
        return $rep ;
    }

    public function getProduitById($id)
    {
        $req="select * from produit where code_produit= ".$id." " ;
        $rep=$this->bdd->query($req);
        return $rep ;
    }

    public function supprimerProduit($id)
    {

        $sql="delete from produit where code_produit='".$id."'";
        $req=$this->bdd->exec($sql);
        if ($req)
            return true;
        return false ;
    }

    public function getLastProduit($id_categ)
    {
        $req="select * from produit where categ= ".$id_categ." ORDER BY Date_ajout DESC LIMIT 4" ;
             $rep=$this->bdd->query($req);
        return $rep ;
    }

    public function getPlusVendus($nb)
    {
        $req="select * from produit ORDER BY vendu, Date_ajout DESC LIMIT ".$nb."" ;
//        die($req);
        $rep=$this->bdd->query($req);
        return $rep ;
    }

    public function getLastProduitCatNb($id_categ,$nb)
    {
        $req="select * from produit where categ = ".$id_categ." ORDER BY Date_ajout DESC LIMIT ".$nb."" ;
//        die($req);
        $rep=$this->bdd->query($req);
        return $rep ;
    }

    public function getLastProduitSousCatNb($id_categ,$nb)
    {
        $req="select * from produit where sous_cat= ".$id_categ." ORDER BY Date_ajout DESC LIMIT ".$nb."" ;
//        die($req);
        $rep=$this->bdd->query($req);
        return $rep ;
    }

    public function getCatProduit($id_categ)
    {
        $req="select * from produit where categ= ".$id_categ." ORDER BY Date_ajout DESC" ;
        $rep=$this->bdd->query($req);
        return $rep ;
    }

    public function getSousCatProduit($id_categ)
    {
        $req="select * from produit where sous_cat= ".$id_categ." ORDER BY Date_ajout DESC" ;
        $rep=$this->bdd->query($req);
        return $rep ;
    }

    public function getNbProduit()
    {
        $req="select count(code_produit) as nbp from produit" ;
             $rep=$this->bdd->query($req);
        return $rep ;
    }

    public function getLastProd($nb)
    {
        $req="select * from produit ORDER BY Date_ajout DESC LIMIT ".$nb ;
        $rep=$this->bdd->query($req);
        return $rep ;
    }

    public function getNomProduitById($id){
        $req="select * from produit where code_produit=".$id ;
             $rep=$this->bdd->query($req);
        return $rep->fetch()['nom'] ;
    }

}
?>