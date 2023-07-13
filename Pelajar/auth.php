<?php
session_start();

if(!isset($_SESSION["nokp"])){
    header("Location: login3.php?error=notloggedin");
    exit(); 
}
?>
