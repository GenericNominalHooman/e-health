<?php
require_once(COMPONENTS_DIR."/config.php");
$query="SELECT * FROM janjitemu WHERE status='pending'" ;
$sql=mysqli_query($conn,$query);
	if($sql){
		echo "Record displayed succesfully";
		}
			else{
				echo "Error displaying record:".mysqli_error($conn);
				}
		?>
		