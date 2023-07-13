<?php

require_once("config.php");
session_start();



	$id_janjitemu = $_GET['id_janjitemu'];

$add_to_db = mysqli_query($conn,"UPDATE janjitemu SET status='Tidak Sah'  WHERE id_janjitemu='".$id_janjitemu."'");
	
			if($add_to_db){	
			  echo "Saved!!";
			  header("Location: urus2.php");
			}
			else{
			  echo "Query Error : " . "UPDATE leaves SET status='Tidak Sah'  WHERE id_janjitemu='".$id_janjitemu."'" . "<br>" . mysqli_error($conn);
			}
	//}

	ini_set('display_errors', true);
	error_reporting(E_ALL);  
		 
?>

