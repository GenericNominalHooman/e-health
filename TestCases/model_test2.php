<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"]."/hospital/site_config.php");
?>
<?php
require(COMPONENTS_DIR."/models.php");
$modelsFactoryObj = new ModelsFactory();
$userModel = $modelsFactoryObj->createUserModel();
d($userModel->getGuruBertugasWhere('username', ''));
?>