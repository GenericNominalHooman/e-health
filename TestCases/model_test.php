<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"]."/projects_config.php");
require_once(E_HEALTH_DIR."/site_config.php");

?>
<?php
// Import database.php for making sql query
require_once(COMPONENTS_DIR."/models.php");
$modelFactoryObj = new ModelsFactory();
$userModel = $modelFactoryObj->createUserModel();
var_dump($userModel->getAllAdmin());
var_dump($userModel->getAllAdmin());
?>