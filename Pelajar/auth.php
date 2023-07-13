<?php
require_once(COMPONENTS_DIR."/header.php");

if(!isset($_SESSION["nokp"])){
    header("Location: login3.php?error=notloggedin");
    exit(); 
}
?>
