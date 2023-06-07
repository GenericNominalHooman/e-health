<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"]."/hospital/site_config.php");
?>
<?php
require_once(COMPONENTS_DIR."/authenthicate.php");
$loginObj = new Login();
d($loginObj->authenticate('Guru Bertugas', 'kvgerik'));
?>