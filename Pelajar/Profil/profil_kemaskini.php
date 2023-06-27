<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health/site_config.php");
?>
<?php
require_once(COMPONENTS_DIR."/models.php");;
require_once(COMPONENTS_DIR."/redirect.php");;
require_once(COMPONENTS_DIR."/verification.php");;
$dbObj = new Database();
$loginModelObj = new LoginModel($dbObj->getConnection());
$profilModelObj = new ProfilModel($dbObj->getConnection());

// Check POST login info
if(isset($_POST["update_profil"])){
    // Check whether user has conflicting data inserted
    
    
    // Update login and profil table

}else{ // User access through GET method
    Redirect::redirectWithMsg("Location: ".PELAJAR_URL, "Sila login dahulu.");
}

?>