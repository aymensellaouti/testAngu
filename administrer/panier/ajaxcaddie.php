<?php
/**
* @autor Mahdi El Masaoudi
* Ce script récupère les parametres du script Ajax, ( l'action et les parametres ) , effectue les opérations 
* demandées ( ajout , suppression ) et retourne le contenu mis à jour du panier
*
**/
session_start();
require_once("panel.php");
createPanel();
if (isset($_GET['action']) && $_GET['action']!=""){
switch($_GET['action']){
	case 'add':
		if(isset($_GET['ref'])&&$_GET['ref']!="" && isset($_GET['label'])&& $_GET['label']!=""){
			$ref=addslashes($_GET['ref']);
			$label=addslashes($_GET['label']);
			(isset($_GET['qt'])&&$_GET['qt']!="")?$qt=addslashes($_GET['qt']):$qt="";
			(isset($_GET['price'])&&$_GET['price']!="")?$price=addslashes($_GET['price']):$price="";
			add($ref,$label,$qt,$price);
		}
	break;
	case 'delete':
	if(isset($_GET['ref'])&&$_GET['ref']!=""){
		$ref=addslashes($_GET['ref']);
		// on ne supprime l'article que s'il existe
		if(isInPanel($ref)){
			delete($ref);
		}
	}
	break;
	case 'getContent':
	// par défaut la fonction getHTMLContent s'execute ( voir en bas du code)
	break;
	case 'clear':
	for($i=0;$i<getSize();$i++)
		delete(getRefByPosition($i));
	break;
	default:
	// par défaut la fonction getHTMLContent s'execute ( voir en bas du code)
}
// retourner ( afficher grace à Ajax ) le contenu du panier
echo getHTMLContent();

}
// Fonction de récupération et formattage des données
function getHTMLContent(){
	$ret='<table border="0" width="100%">';
	for($i=0;$i<getSize();$i++){
		$ret.='<tr><td width="70%" align="left"><a href="#">'.getLabelByPosition($i).'</a></td><td width="20%">'.getPriceByPosition($i).' </td><td>&euro;</td><td><img src="images/delete_from_panier.png" onClick="deleteByRef(\''.getRefByPosition($i).'\')"></td>';
	}
	$ret.='<tr><td colspan="3"><hr></td></tr>';
	$ret.='<tr><td width="70%" align="left"><b>Articles : </b></td><td width="20%">'.getSize().'</td><td></td>';
	$ret.='<tr><td width="70%" align="left"><b>Total : </b></td><td width="20%">'.getGlobalAmount().'</td><td> &euro;</td><td></td>';
	$ret.='<tr><td colspan="3"><hr></td></tr>';
	$ret.="</table>";
	// message si panier vide
	if(getSize()=="0")
	$ret.='<br><img src="images/triangle.gif"/><a href="#">&nbsp;Panier vide</a>';
	// On donne la possibilité de vider seulement si le panier n'est pas vide
	if(getSize()!="0")
	$ret.='<br><img src="images/triangle.gif"/><a href="#" onClick="clearAll()">&nbsp;Vider votre panier</a>';
	if(getSize()!="0")
	$ret.='<br><img src="images/triangle.gif"/><a href="#">&nbsp;Valider commande</a>';
	return $ret;
}
?>
