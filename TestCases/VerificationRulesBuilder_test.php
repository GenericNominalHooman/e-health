<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"]."/projects_config.php");
require_once(E_HEALTH_DIR."/site_config.php");

?>
<?php
    require_once(COMPONENTS_DIR."/verify.php");
    $verifyObj = VerificationRulesBuilder::createNew();
    $verifyObj->setIsNotEmpty();
    $verifyObj->setMinLength(100);
    $verifyObj->setMaxLength(120);
    $verifyObjClone = $verifyObj->clone();
    $verifyObjClone->setMaxLength(200);
    d($verifyObj);
    d($verifyObjClone);
?>