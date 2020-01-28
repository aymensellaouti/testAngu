<?php
if(isset($redirect)){
ob_clean();
header('Location: '.$redirect);
}elseif(isset($redirect_refresh)){
$tmp=ob_get_contents();
ob_clean();
header('Refresh: 4;URL='.$redirect_refresh);
echo $tmp;
}else{
// rien du tout ...
}
?>