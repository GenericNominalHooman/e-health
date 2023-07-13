<?php
// Component function: Determine whether user has logged in or not and redirect them to their login page appropiately

// Import site config
require_once($_SERVER["DOCUMENT_ROOT"]."/projects_config.php");
require_once(E_HEALTH_DIR."/site_config.php");

?>
<?php
if (session_status() == 1) {
    session_start();
} 
if(!isset($_SESSION["username"])){
    header("Location: login3.php?error=notloggedin");
    exit(); 
}
?>
