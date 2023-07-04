<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health2/site_config.php");
?>
<?php
require_once(COMPONENTS_DIR."/verification.php");

$dbObj = new Database();
$loginModel = new LoginModel($dbObj->getConnection());
$profilModel = new ProfilModel($dbObj->getConnection());
$messageHandlerObj = new MessageHandler();
$verificationObj = new Verification($messageHandlerObj, $loginModel, $profilModel);
d($verificationObj->isNameExist("Pelajar 2"));
d($verificationObj->isKPExist(123));
?>