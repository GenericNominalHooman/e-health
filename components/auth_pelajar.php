<?php
// Component function: Determine whether user has logged in or not and redirect them to their login page appropiately

// Import site config
require_once($_SERVER["DOCUMENT_ROOT"]."/hospital/site_config.php");
?>
<?php
session_start();
if(!isset($_SESSION["nokp"])){
    header("Location: login3.php?error=notloggedin");
    exit(); 
}
?>
