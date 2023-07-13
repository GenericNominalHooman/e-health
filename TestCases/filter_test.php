<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"]."/projects_config.php");
require_once(E_HEALTH_DIR."/site_config.php");

?>
<?php
require_once(COMPONENTS_DIR."/filter.php");
require_once(COMPONENTS_DIR."/models.php");

$modelsFactoryObj = new ModelsFactory();
$userModel = $modelsFactoryObj->createUserModel();
$adminEntries = $userModel->getAllAdmin();
d($adminEntries);
// echo('<br>$adminEntries[0]["id"]: '.$adminEntries[0]['id']);
// echo('<br>sizeof($adminEntries): '.sizeof($adminEntries));
// echo('<br>sizeof($adminEntries): '.sizeof($adminEntries));
$userModelFilteredObj = new SQLFilter($userModel->getAllAdmin());
d($userModelFilteredObj->where('password', "admin123")->where('id', '4')->get());
?>