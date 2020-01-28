<?php
/**
* Représentation graphique de la caddie
* Pour modifier l'apparence, modifiez le fichier css associé
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
