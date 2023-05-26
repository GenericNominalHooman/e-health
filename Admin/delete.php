<?php 
//connect to database
include("config.php");

//delete record from database

if (isset($_GET['id_janjitemu'])) {
	$query="DELETE FROM janjitemu WHERE id_janjitemu='".$_GET['id_janjitemu']."'";

	$sql=mysqli_query($conn,$query);

    echo "<script type='text/javascript'>alert('Data sedang diproses, Sila tunggu');location='dashboard.php';</script>";
}
else {
    echo "<script type='text/javascript'>alert('Data gagal diproses, Sila tunggu');location='dashboard.php';</script>";
}



//Close MySQL connection
mysqli_close($conn);
?>