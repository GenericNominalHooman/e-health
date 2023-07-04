<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health2/site_config.php");
?>
<?php
// Import header
require_once(COMPONENTS_DIR . "/header.php");
// Import sidebar(Please uncomment the appropiate user sidebar for your page)
// require_once(TEMPLATE_DIR . "/sidebar2_guest.php"); // Guest sidebar
require_once(TEMPLATE_DIR . "/sidebar2_pelajar.php"); // Pelajar sidebar
// require_once(TEMPLATE_DIR . "/sidebar2_pentadbir.php"); // Pentadbir sidebar
// require_once(TEMPLATE_DIR . "/sidebar2_warden.php"); // Warden sidebar
// require_once(TEMPLATE_DIR . "/sidebar2_guru.php"); // Guru sidebar
?>

<!-- CONTENT HERE -->
Hey this is some content
<!-- END CONTENT -->

<?php
// Import header
require_once(COMPONENTS_DIR . "/footer.php");
?>
