<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health2/site_config.php");
?>
<?php
// Import redirect component
require_once(COMPONENTS_DIR."/redirect.php");
// Redirect with a message
Redirect::redirectWithMsg('redirect_test_end.php', 'This is a message sent via POST');
?>
