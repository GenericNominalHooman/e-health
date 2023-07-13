<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"]."/projects_config.php");
require_once(E_HEALTH_DIR."/site_config.php");

?>
<?php
require(COMPONENTS_DIR."/models.php");
$modelsFactoryObj = new ModelsFactory();
$userModel = $modelsFactoryObj->createUserModel();
d($userModel->getGuruBertugasWhere('username', ''));
?>