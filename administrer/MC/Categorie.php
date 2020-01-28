<?php
/**
 * Created by PhpStorm.
 * User: aymen
 * Date: 22/02/16
 * Time: 12:02
 */


include_once  'cnxpdo.php';
class Categorie
{
    protected $bdd;
    public function __construct(){
        // die ('j instancie la cnx');
      //  $this->cnx=new cnxpdo();
       //  die ('je vais me connecter');
       // $this->bdd=$this->cnx->getConnection();
        // die('je me suis connecté ');
        $bdd=cnxpdo::getConnection();
        $this->bdd=$bdd;
    }

    public function listeCompleteCategories()
    {
        //    die('je vais lister les categories');

        $req=" select * from categorie" ;
        //  die ($req);
        $rep= $this->bdd->query($req);
        //$res=$rep->fetch();
        return $rep;
    }
    public function listeCategories()
    {
        $req=" select * from categorie where cat_m=0" ;
            $rep= $this->bdd->query($req);
        return $rep;
    }
    public function listeSousCategories($id)
    {
    $req=" select * from categorie where cat_m=".$id ;
    $rep= $this->bdd->query($req);
    return $rep;
    }

    public function getCategorieMere($id){
       // die('get categorie mere'.$id);
        $req=" select * from categorie where code_cat=".$id ;
        $rep= $this->bdd->query($req);
        return $rep;
    }

    public function getCategorie($id){
        $req=" select * from categorie where code_cat='".$id."'";
        $rep= $this->bdd->query($req);
        return $rep;

    }


    // ok    die('j ai constriot mon objet et ma cnxx');


    public function AjoutCategorie()
    {

        $req="INSERT INTO categorie (designation, cat_m, cat_fr) VALUES ('$this->des','$this->ccm','$this->cfr');";
        $rep=$this->bdd->exec($req);
        if ($rep)
            return true;
        return false ;
    }
    public function MAJcategorie($id)
    {
        $sql = "UPDATE `sehelhet_eshel`.`categorie` SET `designation`='$this->des',`cat_m`='$this->ccm',`cat_fr`='$this->cfr' WHERE `categorie`.`code_cat`=$id ";
       // die($sql);
        $rep=$this->bdd->exec($sql);
        if ($rep)
            return true;
        return false ;
    }

    public function supprimerCategorie($id)
    {

        $sql="delete from categorie where code_cat='".$id."'";
        $req=$this->bdd->exec($sql);
        if ($req)
            return true;
        return false ;
    }
}
?>