<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"]."/hospital/site_config.php");
?>
<?php
// Import database.php for making sql query
require_once(COMPONENTS_DIR."/models.php");
$modelFactoryObj = new ModelsFactory();
$userModel = $modelFactoryObj->createUserModel();
var_dump($userModel->getAllAdmin());
var_dump($userModel->getAllAdmin());
?>