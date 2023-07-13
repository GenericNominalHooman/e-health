<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"]."/projects_config.php");
require_once(E_HEALTH_DIR."/site_config.php");

?>
<?php
    require_once(COMPONENTS_DIR."/verify.php");
    $verificationBuilderObj = VerificationRulesBuilder::createNew();
    $verificationBuilderObj->setIsNotEmpty();
    $verificationBuilderObj->setMinLength(2);
    $verificationBuilderObj->setMaxLength(3);
    $verificationBuilderObj->isAString();
    $verificationObj = $verificationBuilderObj->build();
    d($verificationObj->verify("12"));
?>