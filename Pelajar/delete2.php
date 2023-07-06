<?php 
//connect to database
require_once(COMPONENTS_DIR."/config.php");

//delete record from database

if (isset($_GET['id_janjitemu'])) {
	$query="DELETE FROM janjitemu WHERE id_janjitemu='".$_GET['id_janjitemu']."'";

	$sql=mysqli_query($conn,$query);
	echo "<script type='text/javascript'>alert('Data sedang diprose, Sila tunggu');location='display_pdf.php';</script>";

	/*echo "<script>alert('Data sedang diprose, Sila tunggu');</script>";
	header("Location: display_pdf.php");*/
}

else {
	"<script>alert('Data GAGAL diprose, Sila tunggu');</script>";
}




//Close MySQL connection
mysqli_close($conn);
?>