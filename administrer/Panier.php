<?php
/**
 * Created by PhpStorm.
 * User: aymen
 * Date: 08/03/16
 * Time: 16:58
 */

class Panier {

    public function __construct()
    {
        if (!isset($_SESSION)){
          //  die('pas de session');
            session_start();
        }
        if (!isset($_SESSION['monPanier'])){
            $_SESSION['monPanier']= array();

         //  die('je viens de creer mon panier');
        }

        if(isset($_GET['del'])){
            $this->del($_GET['del']);
        }

        if(isset($_GET['mp'])){
            if(isset($_SESSION['monPanier'][$_GET['id']])&&($_SESSION['monPanier'][$_GET['id']]>1)){
                $_SESSION['monPanier'][$_GET['id']]--;
            }
        }
        if(isset($_GET['pp'])){
                if(isset($_SESSION['monPanier'][$_GET['id']])){
                    $_SESSION['monPanier'][$_GET['id']]++;
                }
        }
    }

    public function total($produit){
    $total=0;
        $keys=array_keys($_SESSION['monPanier']);

        if (!empty($keys))
        {
//            die('je suis ici');
            $ids='('.implode(',',$keys).')';
//var_dump($ids);
            $products=$produit->getProduitsByIds($ids)->fetchAll(PDO::FETCH_OBJ);
        }
        else
        {
            $products=array();
        }
        foreach ($products as $product ){
            $total+= $product->Prix*$_SESSION['monPanier'][$product->code_produit];
        }
        return $total;
    }

    public function add($produitId){
        if (isset($_SESSION['monPanier'][$produitId])){
            $_SESSION['monPanier'][$produitId]++;
        }else{
            $_SESSION['monPanier'][$produitId]=1;
        }
    }

    public function addqte($produitId){
        if (isset($_SESSION['monPanier'][$produitId])){
            $_SESSION['monPanier'][$produitId]++;
        }else{
            $_SESSION['monPanier'][$produitId]=1;
        }
    }

    public function delqte($produitId){
        if (isset($_SESSION['monPanier'][$produitId])){
            $_SESSION['monPanier'][$produitId]++;
        }else{
            $_SESSION['monPanier'][$produitId]=1;
        }
    }

    public function del($produitId){
      unset($_SESSION['monPanier'][$produitId]);
    }

    public function count(){
        return(array_sum($_SESSION['monPanier']));
    }

} 