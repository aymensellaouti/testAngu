<?php
/**
 * Created by PhpStorm.
 * User: aymen
 * Date: 22/02/16
 * Time: 13:45
 */
class cnxpdo
{
    public function __Construct(){
        $this->hote="localhost";
        $this->bdname="sehelhet_eshel";
        $this->login="root";
        $this->pwd="";
    }

    static function getConnection(){
        try
        {
//    $DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
            $hote="localhost";
            $bdname="sehelhet_eshel";
            $login="root";
            $pwd="";
            $bdd = new PDO("mysql:host={$hote};dbname={$bdname};charset=utf8", $login, $pwd, array(PDO::MYSQL_ATTR_INIT_COMMAND=> 'SET NAMES UTF8'));
            return $bdd;
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
     //   die('je me suis connecté');
        return $bdd;
    }

}
/*
$reponse = $bdd->query('select * from produit');
while ($donnees = $reponse->fetch())
{
    echo($donnees['nom']."<br>");
}
*/