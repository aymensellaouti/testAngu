Panier en php / ajax--------------------
Url     : http://codes-sources.commentcamarche.net/source/49322-panier-en-php-ajaxAuteur  : mehdi7604Date    : 02/08/2013
Licence :
=========

Ce document intitul� � Panier en php / ajax � issu de CommentCaMarche
(codes-sources.commentcamarche.net) est mis � disposition sous les termes de
la licence Creative Commons. Vous pouvez copier, modifier des copies de cette
source, dans les conditions fix�es par la licence, tant que cette note
appara�t clairement.

Description :
=============

Un jour, j'avais besoin d'un panier en php, j'avais recherch&eacute; sur CS, san
s trouver ce que je cherche ... finalement je l'ai fait &agrave; la main .
<br 
/>Je le poste pour ceux qui voudrons l'utiliser, mais surtout ajouter des foncti
onnalit&eacute;s et le reposter .
<br />
<br />Vous trouverez qqes explications dans les commentaires, cependant voici un courte description du contenu:
<br 
/>
<br />&lt;&lt;&lt; Panel.php &gt;&gt;&gt;
<br />C'est la repr&eacute;sentat
ion du panier, une fois cr&eacute;e il doit rester en session tant que vous avez
 
<br />	un session_start(); &agrave; l'entete de vos pages. (Un tableau en ses
sion) 
<br />
<br />Variables Trait&eacute;es : 
<br />		- R&eacute;ference :
 ref;
<br />		- Designation : label;
<br />		- Quantit&eacute; : qt;
<br />		
- Prix : price.
<br />Fonctions :
<br />______________________________________
____________________________
<br />Cr&eacute;ation du panier
<br />Si panier e
xistant retoune;
<br />Sinon cr&eacute;e la panier et retourne true;
<br />Uti
lisation --&gt; createPanel()
<br />___________________________________________
_______________________
<br />	+add($ref,$label,$qt,$price)
<br />		ajouter un
 article
<br />		@ref : code article
<br />		@$label : Designation
<br />		@$
qt : quantit&eacute;
<br />		@$price : prix
<br />
<br />____________________
______________________________________________
<br />
<br />Supression d'un ar
ticle

<ul><li>		@$ref : Reference de l'&eacute;l&eacute;ment &agrave; supprim
er;</li></ul>
<br />
<br />Utilisation --&gt; delete($ref){
<br />
<br />___
_______________________________________________________________
<br />
<br />m
odifier un article
<br />		@ref : Designation de l'&eacute;l&eacute;ment &agrav
e; modifier;
<br />		@qt : La nouvelle quantit&eacute;;
<br />
<br />Utilisat
ion --&gt; modifyQuantity($ref,$qt)
<br />_____________________________________
_____________________________
<br />Montant du panier
<br />		@return 
<br />
			$total : nombre r&eacute;el  ( montant global )
<br />
<br />Utilisation --
&gt; getGlobalAmount(){
<br />_________________________________________________
_________________
<br />Quantit&eacute; d'un &eacute;l&eacute;ment
<br />		@re
f : R&eacute;f&eacute;rence de l'&eacute;l&eacute;ment;
<br />		@return : 
<br
 />			$ret : quantit&eacute;;
<br />Utilisation --&gt; getQuantityByRef($ref)

<br />__________________________________________________________________
<br />
Prix d'un &eacute;l&eacute;ment
<br />		@ref : R&eacute;ference de l'&eacute;l&
eacute;ment;
<br />		@return : 
<br />			$ret : prix;
<br />Utilisation --&gt
; getPriceByRef($ref)
<br />___________________________________________________
_______________
<br />R&eacute;f&eacute;rence d'un &eacute;l&eacute;ment par sa
 position
<br />		@position : Position de l'&eacute;l&eacute;ment dans le table
au;
<br />		@return : 
<br />			$ret : la r&eacute;f&eacute;rence;
<br />Util
isation --&gt; getRefByPosition($position)
<br />______________________________
____________________________________
<br />Designation d'un &eacute;l&eacute;me
nt par sa position
<br />		@position : Position de l'&eacute;l&eacute;ment dans
 le tableau;
<br />		@return : 
<br />			$ret : la designation;
<br />Utilisa
tion --&gt; getLabelByPosition($position)
<br />_______________________________
___________________________________
<br />Quantit&eacute; d'un &eacute;l&eacute
;ment par sa position
<br />		@position : Position de l'&eacute;l&eacute;ment d
ans le tableau;
<br />		@return : 
<br />			$ret : la quantit&eacute;;
<br />
Utilisation --&gt; getQuantityByPosition($position)
<br />_____________________
_____________________________________________
<br />Prix d'un &eacute;l&eacute;
ment par sa position
<br />		@position : Position de l'&eacute;l&eacute;ment da
ns le tableau;
<br />		@return : 
<br />			$ret : le prix;
<br />Utilisation 
--&gt; getPriceByPosition($position)
<br />____________________________________
______________________________
<br />
<br />V&eacute;rifier si &eacute;l&eacut
e;ment est existant
<br />		@ref : R&eacute;ference de l'&eacute;l&eacute;ment;

<br />Utilisation --&gt; isInPanel($ref)
<br />______________________________
____________________________________
<br />Nombre d'&eacute;l&eacute;ments
<br
 />		@return : 
<br />			$ret : nombre d'&eacute;l&eacute;ments dans le panier;

<br />Utilisation --&gt; getSize()
<br />____________________________________
______________________________
<br />
<br />&lt;&lt;&lt; ajaxCaddie.php &gt;&g
t;&gt;
<br />
<br />Contient script et fonctions qui r&eacute;cup&egrave;rent 
les parametres du script Ajax, ( l'action et les parametres ) , effectue les op&
eacute;rations 
<br />demand&eacute;es ( ajout , suppression ) et retourne le c
ontenu mis &agrave; jour du panier .
<br />
<br />&lt;&lt;&lt; ajax/ajax_caddi
e.js &gt;&gt;&gt;
<br />C'est le script ajax, qui interroge ajaxcaddie.php ... 
je ne sais pas si c'est correcte ou non, mais pour chaque fonction, j'ai mis un 
CallBack .
