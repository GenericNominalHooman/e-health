 
<?php
    // Import site config
    require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health2/site_config.php");
?>
<?php
// Remove all session variables
session_start();
session_unset();
// Redirect the user back to index page
header("Location:".SITE_URL."/index.php");
?>