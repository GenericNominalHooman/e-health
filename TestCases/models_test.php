<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"]."/e-health/site_config.php");
?>
<?php
require_once(COMPONENTS_DIR."/models.php");
require_once(COMPONENTS_DIR."/config.php");
$modelDatabaseObj = new Database();
$modelMysqliConn = $modelDatabaseObj->getConnection();
d($modelMysqliConn);
$userModelObj = new LoginModel($modelMysqliConn);
d($userModelObj->getAllAdmin());
d($userModelObj->getAllGuru());
d($userModelObj->getAllWarden());
?>