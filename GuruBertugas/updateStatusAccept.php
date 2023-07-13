<?php

require_once("config.php");
session_start();

/*if(!isset($_SESSION["user_name"])){
	header("Location: urus2.php");
  }
else{*/

	$id_janjitemu = $_GET['id_janjitemu'];
	/*$descr = $_GET['descr'];*/

	$add_to_db = mysqli_query($conn,"UPDATE janjitemu SET status='Sah' WHERE id_janjitemu='".$id_janjitemu."'");

				if($add_to_db){	
					echo 'SELECT * FROM janjitemu;';
					header("Location: urus2.php");
				}
				else{
					echo "Query Error : " . "UPDATE janjitemu SET status='Sah' WHERE id_janjitemu='".$id_janjitemu."'" . "<br>" . mysqli_error($conn);
				}
	/*}*/

	ini_set('display_errors', true);
	error_reporting(E_ALL);  
         
?>