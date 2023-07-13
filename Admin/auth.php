<?php
session_start();

if(!isset($_SESSION["username"])){
    header("Location: login3.php?error=notloggedin");
    exit(); 
}
?>
