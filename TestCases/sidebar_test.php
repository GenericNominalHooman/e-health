<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health/site_config.php");
?>
<?php
// Import header
require_once(COMPONENTS_DIR . "/header.php");
// Import sidebar(Please uncomment the appropiate user sidebar for your page)
// require_once(TEMPLATES_DIR . "/sidebar_pentadbir.php"); // Pentadbir sidebar
// require_once(TEMPLATES_DIR . "/sidebar_warden.php"); // Warden sidebar
// require_once(TEMPLATES_DIR . "/sidebar_guest.php"); // Warden sidebar
 require_once(TEMPLATES_DIR . "/sidebar_guru.php"); // Guru sidebar
?>

<!-- CONTENT HERE -->
Hey this is some content
<!-- END CONTENT -->

<?php
// Import header
require_once(COMPONENTS_DIR . "/footer.php");
?>
