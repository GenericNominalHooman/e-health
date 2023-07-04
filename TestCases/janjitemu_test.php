<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"]."/e-health2/site_config.php");
?>
<?php
require_once(COMPONENTS_DIR."/config.php");
require_once(COMPONENTS_DIR."/models.php");
$dbObj = new Database();
$janjitemuModel = new JanjitemuModel($dbObj->getConnection());
d($janjitemuModel->getAllJanjitemu());
?>