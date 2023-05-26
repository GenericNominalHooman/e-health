<?php

require_once("config.php");
session_start();

if(!isset($_SESSION["user_name"])){
	header("Location: urus2.php");
  }
else{

	$id_pelajar = $_GET['id_pelajar'];
	/*$descr = $_GET['descr'];*/

	$add_to_db = mysqli_query($conn,"UPDATE janjitemu SET status='Sah' WHERE id_pelajar='".$id_pelajar."'");

				if($add_to_db){	
					echo 'Saved!!';
					header("Location: urus.php");
				}
				else{
					echo "Query Error : " . "UPDATE janjitemu SET status='Sah' WHERE id_pelajar='".$id_pelajar."'" . "<br>" . mysqli_error($conn);
				}
	}

	ini_set('display_errors', true);
	error_reporting(E_ALL);  
         
?>