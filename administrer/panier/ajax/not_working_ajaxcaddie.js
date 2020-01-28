/**
* @author Mahdi El Masaoudi
*			http://pages.usherbrooke.ca/mel
* @methods
* 			add(ref,label,qt,price);
*			delete(ref);
*			clear();
*			getContent();
* 
**/
var req; // pour retourner un contenu du panier

/** Retourner le contenu formaté HTML de la caddie 
*
**/

function getContent(){
	var url; // url de requete à formuler
	url = "ajaxcaddie.php?action=getContent";
	req=getXMLHttpRequest();
	req.open("GET", url, true);
	req.onreadystatechange = callBack();
	req.send(null);
}

/** Vider le panier
*
**/

function clearAll() {
	var url; // url de requete à formuler
	url = "ajaxcaddie.php?action=clear";
	req=getXMLHttpRequest();
	req.open("GET", url, true);
	req.onreadystatechange = callBack();
	req.send(null);
	
}

/** Supprimer un article du panier
*	@param 
*			ref: référence de l'article
* 
**/

function deleteByRef(ref){
	var url; // url de requete à formuler
	url = "ajaxcaddie.php?action=delete&ref=" + ref;
	req=getXMLHttpRequest();
	req.open("GET", url, true);
	req.onreadystatechange = callBack();
	req.send(null);
}


/** ajouter un article au panier
*	@param 
*	ref : Reference de l'article
* 	label : désignation de l'article
*	qt : quantité
*	price : prix
*
**/


function add(ref,label,qt,price){
	var url; // url de requete à formuler
	url = "ajaxcaddie.php?action=add&ref=" +ref+"&label="+label+"&qt="+qt+"&price="+price;
	req=getXMLHttpRequest();
	req.open("GET", url, true);
	req.onreadystatechange = callBack();
	req.send(null);	
}


function callBack() {
	alert(req.readyState);
	//alert(req.status);
	if (req.readyState == 4) {
		if (req.status == 200) {
			// On récupère la réponse de la page php, et on actualise le contenu du div de la caddie
			document.getElementById("caddieContent").innerHTML = req.responseText;
		}
	}

}

// fonction retournant l'objet XMLHttpRequest adéquat en fonction du navigateur

function getXMLHttpRequest()
{
var req = false;

try
{
   req=new XMLHttpRequest();
}

catch(e)
{
   try
   {
      req=new ActiveXObject("Msxml2.XMLHTTP");
   }
   catch (e)
   {
      try
      {
         req = new ActiveXObject("Microsoft.XMLHTTP");
      }
      catch(e)
      {
         req = false;
      }
   }
}

return req;

}
