<?php
/**
* Repr�sentation graphique de la caddie
* Pour modifier l'apparence, modifiez le fichier css associ�
**/
//session_start();
require_once("panel.php");
createPanel();
?>
<script type="text/javascript" src="ajax/ajax_caddie.js"></script>
<div id="caddie">
<div id="caddieContent" >
<script type="text/javascript">
getContent();
</script>
</div>
</div>
