<?php
// Component function: Determine whether user has logged in or not and redirect them to their login page appropiately

// Import site config
require_once($_SERVER["DOCUMENT_ROOT"]."/e-health/site_config.php");
?>
<?php
if (session_status() == 1) {
    session_start();
} 
if(!isset($_SESSION["username"])){
    header("Location: index2.php?error=notloggedin");
    exit(); 
}
?>
