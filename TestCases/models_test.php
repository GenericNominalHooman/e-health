<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"]."/hospital/site_config.php");
?>
<?php
require_once(COMPONENTS_DIR."/models.php");
require_once(COMPONENTS_DIR."/config.php");
$modelDatabaseObj = new Database();
$modelMysqliConn = $modelDatabaseObj->getConnection();
d($modelMysqliConn);
$userModelObj = new UserModel($modelMysqliConn);
d($userModelObj->getAllAdmin());
?>