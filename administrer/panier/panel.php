<?php
/**
	@author : Mahdi El Masaoudi
				http://pages.usherbrooke.ca/mel
				
	Script de cr�ation d'un panier, une fois cr�� il doit rester en session tant que vous avez 
	un session_start(); � l'entete de vos pages.
	Trois propri�t�s sont trait�es :
		- R�ference : ref;
		- Designation : label;
		- Quantit� : qt;
		- Prix : price.
**/
/*****************************************************************************************************************************/
/** createPanel
* 
* Si panier existant retoune;
* Sinon cr�e la panier et retourne true;
**/
function createPanel(){
$ret=false;

if (isset( $_SESSION['panel']))
 $ret = true;
else
{

  $_SESSION['panel']=array();
  $_SESSION['panel']['ref'] = array();
  $_SESSION['panel']['label'] = array();
  $_SESSION['panel']['qt'] = array();      
  $_SESSION['panel']['price'] = array();
  $ret=true;
}
return $ret;
}

/** ajouter un article
*		@ref : code article
*		@$label : Designation
*		@$qt : quantit�
*		@$price : prix
**/
function add($ref,$label,$qt,$price){

if (createPanel())
{
$positionOfProduct = array_search($ref,  $_SESSION['panel']['ref']);
	
  if ($positionOfProduct !== false)
  {
   $_SESSION['panel']['qt'][$positionOfProduct] += $qt ;
  }
  else
  {
   array_push( $_SESSION['panel']['ref'],$ref);
   array_push( $_SESSION['panel']['label'],$label);
   array_push( $_SESSION['panel']['qt'],$qt); 
   array_push( $_SESSION['panel']['price'],$price);
  }

}

else
  echo "Erreur, veuillez recommencer...";
}

/**
* Supression d'un article
*		@$ref : Reference de l'�l�ment � supprimer;
**/
function delete($ref){

if (createPanel())
{
  $temp=array();
  $temp['ref']=array();
  $temp['label'] = array();
  $temp['qt'] = array();      
  $temp['price'] = array();
  for($i = 0; $i < count($_SESSION['panel']['ref']); $i++) 
  {
   if ($_SESSION['panel']['ref'][$i] !== $ref)
   {
    array_push( $temp['ref'],$_SESSION['panel']['ref'][$i]);
	array_push( $temp['label'],$_SESSION['panel']['label'][$i]);
    array_push( $temp['qt'],$_SESSION['panel']['qt'][$i]); 
    array_push( $temp['price'],$_SESSION['panel']['price'][$i]);
   }
      
  }
      
   
$_SESSION['panel'] =  $temp;
unset($temp);      
       
}
else
  echo "Erreur, veuillez recommencer...";
}

/**
* modifier un article
* 		@ref : Designation de l'�l�ment � modifier;
*		@qt : La nouvelle quantit�;
**/
function modifyQuantity($ref,$qt){
if (createPanel())
{

  if ($qt > 0)
  {
   $positionOfProduct = array_search($label,  $_SESSION['panel']['ref']);
            
   if ($positionOfProduct !== false)
   {
    $_SESSION['panel']['qt'][$positionOfProduct] = $qt ;
   }
  }
  else
   delete($ref);
      
}
else
  echo "Erreur, veuillez recommencer ...";
}

/** Montant du panier
*		@return 
*			$total : nombre r�el  ( montant global )
**/
function getGlobalAmount(){

$total=0;

  for($i = 0; $i < count($_SESSION['panel']['ref']); $i++) 
  {            
   $total += $_SESSION['panel']['qt'][$i] * $_SESSION['panel']['price'][$i]; 
  }
      
return $total;
}
/** Quantit� d'un �l�ment
*		@ref : R�f�rence de l'�l�ment;
*		@return : 
*			$ret : quantit�;
*
**/
function getQuantityByRef($ref){
$ret=0;
if (createPanel())
{
  if ($ref)
  {
   $positionOfProduct = array_search($ref,  $_SESSION['panel']['ref']);
            
   if ($positionOfProduct !== false)
   {
    $ret=$_SESSION['panel']['qt'][$positionOfProduct];
   }
  }
  else
   delete($ref);
      
}
	return $ret;
} 
/** Prix d'un �l�ment
*		@ref : R�ference de l'�l�ment;
*		@return : 
*			$ret : prix;
*
**/
function getPriceByRef($ref){
$ret=0;
if (createPanel())
{
  if ($ref)
  {
   $positionOfProduct = array_search($ref,  $_SESSION['panel']['ref']);
            
   if ($positionOfProduct !== false)
   {
    $ret=$_SESSION['panel']['price'][$positionOfProduct]*$_SESSION['panel']['qt'][$positionOfProduct];
   }
  }
  else
   delete($label);
      
}
	return $ret;

} 

/** R�f�rence d'un �l�ment par sa position
*		@position : Position de l'�l�ment dans le tableau;
*		@return : 
*			$ret : la r�f�rence;
*
**/
function getRefByPosition($position){
$ret="";
if (createPanel())
{   
    $ret=$_SESSION['panel']['ref'][$position];     
}
	return $ret;

}

/** Designation d'un �l�ment par sa position
*		@position : Position de l'�l�ment dans le tableau;
*		@return : 
*			$ret : la designation;
*
**/
function getLabelByPosition($position){
$ret="";
if (createPanel())
{   
    $ret=$_SESSION['panel']['label'][$position];     
}
	return $ret;

}

/** Quantit� d'un �l�ment par sa position
*		@position : Position de l'�l�ment dans le tableau;
*		@return : 
*			$ret : la quantit�;
*
**/
function getQuantityByPosition($position){
$ret=0;
if (createPanel())
{   
    $ret=$_SESSION['panel']['qt'][$position];     
}
	return $ret;

}

/** Prix d'un �l�ment par sa position
*		@position : Position de l'�l�ment dans le tableau;
*		@return : 
*			$ret : le prix;
*
**/
function getPriceByPosition($position){
$ret=0;
if (createPanel())
{   
    $ret=$_SESSION['panel']['price'][$position] * $_SESSION['panel']['qt'][$position];     
}
	return $ret;

}


/**
* V�rifier si �l�ment est existant
* 		@ref : R�ference de l'�l�ment;
**/
function isInPanel($ref){
if (createPanel())
{

  if ($ref!="")
  {
   $positionOfProduct = array_search($ref,  $_SESSION['panel']['ref']);
            
   if ($positionOfProduct !== false)
   {
    return true;
   }
  }
  else
   return false;
      
}
else
  return false;
}



/** Nombre d'�l�ments
*		@return : 
*			$ret : nombre d'�l�ments dans le panier;
*
**/
function getSize(){
	return count($_SESSION['panel']['ref']);
}
?>

