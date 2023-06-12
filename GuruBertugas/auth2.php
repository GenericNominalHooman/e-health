<?php
session_start();

if(!isset($_SESSION["nokp"])){
    header("Location: index2.php?error=notloggedin");
    exit(); 
}
?>
