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


/** Retourner le contenu formaté HTML de la caddie 
*
**/
var reqContent;
function getContent() {
	var url;
	url = "ajaxcaddie.php?action=getContent";
	reqContent=getXMLHttpRequest();
	reqContent.open("GET", url, true);
	reqContent.onreadystatechange = callBackContent;
	reqContent.send(null);
}

/** Vider le panier
*
**/
var reqClear;
function clearAll() {
	var url;
	url = "ajaxcaddie.php?action=clear";
	reqClear=getXMLHttpRequest();
	reqClear.open("GET", url, true);
	reqClear.onreadystatechange = callBackClear;
	reqClear.send(null);
}
/** Supprimer un article du panier
*	@param 
*			ref: référence de l'article
* 
**/

var reqDelete;
function deleteByRef(ref) {
	var url;
	url = "ajaxcaddie.php?action=delete&ref="+ref;
	reqDelete=getXMLHttpRequest();
	reqDelete.open("GET", url, true);
	reqDelete.onreadystatechange = callBackDelete;
	reqDelete.send(null);
}

/** ajouter un article au panier
*	@param 
*	ref : Reference de l'article
* 	label : désignation de l'article
*	qt : quantité
*	price : prix
*
**/
var reqAdd;
function add(ref,label,qt,price) {
	var url;
	url = "ajaxcaddie.php?action=add&ref=" +ref+"&label="+label+"&qt="+qt+"&price="+price;
	reqAdd=getXMLHttpRequest();
	reqAdd.open("GET", url, true);
	reqAdd.onreadystatechange = callBackAdd;
	reqAdd.send(null);
}

// Les callBack pour réponses ( voir plus haut) 

function callBackAdd() {
	if (reqAdd.readyState == 4) {
		if (reqAdd.status == 200) {
			document.getElementById("caddieContent").innerHTML = reqAdd.responseText;
		}
	}
}

function callBackContent() {
	if (reqContent.readyState == 4) {
		if (reqContent.status == 200) {
			document.getElementById("caddieContent").innerHTML = reqContent.responseText;
		}
	}
}

function callBackClear() {
	if (reqClear.readyState == 4) {
		if (reqClear.status == 200) {
			document.getElementById("caddieContent").innerHTML = reqClear.responseText;
		}
	}
}


function callBackDelete() {
	if (reqDelete.readyState == 4) {
		if (reqDelete.status == 200) {
			document.getElementById("caddieContent").innerHTML = reqDelete.responseText;
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
